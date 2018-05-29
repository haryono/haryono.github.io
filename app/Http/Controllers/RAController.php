<?php

namespace App\Http\Controllers;

use Activation;
use App\Http\Requests;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\FrontendRequest;
use App\Mail\Register;
use App\User;
use App\Riskassessment;
use App\Salesperson;
use App\Consultant;
use App\Bizsafe;
use App\Member;
use App\Mgmtrep;
use App\Manager;
use App\Ramember;
use App\Riskmember;
use App\Hazard;
use App\Raleader;
use App\Approvingmanager;
use App\Companyprofile;
use App\Standard;
use App\Workactivitylist;
use App\Workactivity;
use App\Raprocesse;
use App\Industry;
use App\Task;
use App\Additional_risk_control;
use App\Existing_risk_control;
use App\Hazardlist;
use App\Possible_accident;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Reminder;
use Validator;
use Sentinel;
use URL;
use View;
use App\Mail\Contact;
use App\Mail\ContactUser;
use App\Mail\ForgotPassword ;
use PDF;


class RAController extends JoshController
{
	/**
	* addNewCompany
	*/
	public function addNewCompany()
	{
	    $industrys = Industry::all();
	    return view('admin.addNewCompany',compact('industrys'));
	}

	/**
	* newRA
	*/
	public function newRA(User $user)
	{
		$pas = Possible_accident::all();
		$hls = Hazardlist::all();
		$ercs = Existing_risk_control::all();
		$ascs = Additional_risk_control::all();
		$was = Workactivitylist::all();
	    $cps =  Companyprofile::all();
	    $user = Sentinel::getUser();
	    $raprocesses = Raprocesse::all();
	    $amlists = Approvingmanager::all();
	    return view('admin.newRA',compact('cps','user','raprocesses','pas','hls','ercs','ascs','was','amlists'));
	}

	/**
	* add New RA into database
	*/
	public function addNewRA(Request $request)
	{

	    $rules = [
	        'form_effective_date' => 'required|date',
	        'riskprocess' => 'required|not_in:0',
	        'risklocation' => 'required',
	        'riskleader' => 'required|not_in:0',
	        'riskmember' => 'required|not_in:0',
	        'expirydate' =>'required',
	        'created_at' => 'required',
	        'updated_at' => 'required',
	        'approvingmanager' => 'required|not_in:0',
	        
	        //workactivity
	        'work_activity_name.*' => 'required|not_in:0',
	        //hazard
	        'hazard.*' => 'required|not_in:0',
	        'possible_accident.*' => 'required|not_in:0',
	        'existing_risk_control.*' => 'required|not_in:0',
	        'severity.*' => 'required|not_in:0',
	        'likelihood.*' => 'required|not_in:0',
	        'actionofficer.*' =>'required|not_in:0',
	        'additional_risk_control.*' => 'required|not_in:0',
	        'others.*' => 'required',
	        'severity2.*' => 'required|not_in:0',
	        'likelihood2.*' => 'required|not_in:0',
	        'duedate.*' => 'required|not_in:0',
	        'remarks.*' => 'required|not_in:0',  
	    ];

	    // Create a new validator instance from our validation rules
	    $validator = Validator::make($request->all(), $rules);

	    // If validation fails, we'll exit the operation now.
	    if ($validator->fails()) {

	        // Redirect to the ra page  
	        return redirect()->route('newRA')->withInput()->withErrors($validator);

	    }else
	    {
	        $newrisk = new Riskassessment($request->only(['form_effective_date','ref_no','riskprocess','risklocation','riskleader','expirydate','created_at','updated_at'])); 
	        $newrisk->save();                

	        $activityCount = count($request->input('work_activity_name'));//an array of activity 
	        $hazardCount = count($request->input('hazard'));// an array of hazard
	        //add dynamic salesperson details $request->input('work_activity_name.'.$i)
	        if($activityCount > 0){
	            for ($i = 0; $i < $activityCount; $i++){
	                $newrisk->workactivity()->create(['work_activity_name' => $request->input('work_activity_name.'.$i)]);
	            }
	        } 

	        if($hazardCount >0){
	        	for ($f = 0; $f < $hazardCount; $f++){
	        		$hazard = new Hazard($request->only(['hazard.'.$f,'possible_accident.'.$f,'existing_risk_control.'.$f,'severity.'.$f,'likelihood.'.$f,'actionofficer.'.$f,'additional_risk_control.'.$f,'others.'.$f,'severity2.'.$f,'likelihood2.'.$f,'duedate.'.$f,'remarks.'.$f]));
	        	}
	        }

	        $user = Sentinel::getUser();
	        // Was the ra updated?
	        if ($newrisk->save()) {
	            // Prepare the success message
	            $success = trans('users/message.success.update');
	            //Activity log for update account
	            activity($user->full_name)
	                ->performedOn($user)
	                ->causedBy($user)
	                ->log( $user->first_name .'User created new risk for'. $request->company_initial );
	            // Redirect to the ra page
	            return redirect()->route('newRA')->with('success', $success);
	        }
	    }

	}

	/**
	* add New RADoc
	*/
	public function addNewRADoc(User $user)
	{
		$raleader = Raleader::first();
	    $cp = Companyprofile::first();
	    $rms = Riskmember::take(5)->get();
	    $ra = Riskassessment::first();
	    $ras = Riskassessment::all();
	    $haz = Hazard::first();
	    $user = Sentinel::getUser();
	    $job = Approvingmanager::where('manager_name','keny')->first();
	    return view('admin.addNewRADoc',compact('cp','rms','user','ra','job','raleader','ras','haz'));
	}



	public function downloadWorkAct()
    {
    	$pdf = PDF::loadView('admin.invOfWorkAct');
		return $pdf->download('workact.pdf');

    }

	/**
	* add raRegister
	*/
	public function raRegister(User $user)
	{
	    $user = Sentinel::getUser();
	    $countries = $this->countries;
	    return view('admin.raRegister',compact('user','countries'));
	}

	/**
	* add raRegisterDoc
	*/
	public function raRegisterDoc(User $user)
	{
	    $user = Sentinel::getUser();
	    $countries = $this->countries;
	    return view('admin.raRegisterDoc',compact('user','countries'));
	}

	/**
	* add raImpPlan
	*/
	public function raImpPlan(User $user)
	{
	    $user = Sentinel::getUser();
	    $countries = $this->countries;
	    return view('admin.raImpPlan',compact('user','countries'));
	}

	/**
	* add raImpPlanDoc
	*/
	public function raImpPlanDoc(User $user)
	{
	    $user = Sentinel::getUser();
	    $countries = $this->countries;
	    return view('admin.raImpPlanDoc',compact('user','countries'));
	}

	/**
	* add riskMgmtPlan
	*/
	public function riskMgmtPlan(User $user)
	{
	    $user = Sentinel::getUser();
	    $countries = $this->countries;
	    return view('admin.riskMgmtPlan',compact('user','countries'));
	}

    public function downloadPDF()
    {
    	$raleader = Raleader::first();
	    $cp = Companyprofile::first();
	    $rms = Riskmember::take(5)->get();
	    $ra = Riskassessment::first();
	    $ras = Riskassessment::all();
	    $haz = Hazard::first();
	    $user = Sentinel::getUser();
	    $job = Approvingmanager::where('manager_name','keny')->first();
    	$pdf = PDF::loadView('admin.addNewRADoc',compact('cp','rms','user','ra','job','raleader','ras','haz'));
		return $pdf->download('invoice.pdf');

    }

	/**
	* test2
	*/
	public function test2(Request $request)
	{

	    $rules = [
	        'company_initial' => 'required',
	        'company_name' => 'required|unique:companyprofiles',
	        'company_reg_no' => 'required|unique:companyprofiles',
	        'ind' => 'required|not_in:0',
	        'address' =>'required',
	        'country' => 'required',
	        'name' => 'required',
	        'email' => 'required|email',
	        'postal_code' => 'required|digits:6',
	        // validate dynamic consultant and salesperson
	        'salesperson_name.*' => 'required',
	        'consultant_name.*' => 'required',
	        'service_type.*' => 'required',
	        'commence_date.*' => 'required|date',
	        'expiry_date.*' => 'required|date',
	        'service_type2.*' =>'required',
	        'commence_date2.*' => 'required|date',
	        'expiry_date2.*' => 'required|date',
	        //if bizsafe is checked all below are required
	        
	        'bizsafe' => 'sometimes',
	        'contract_date' => 'required_with:bizsafe,date',
	        'bizsafe_lvl' => 'required_with:bizsafe,not_in:0',
	        'contract_type' => 'required_with:bizsafe,not_in:0',
	        '3yearsupports' => 'required_with:bizsafe,on',
	        '3yrs_supexpdate' => 'required_with:bizsafe,date',
	        'scopeofwork' => 'required_with:bizsafe,on',
	        'effectivedate' => 'required_with:bizsafe,date',
	        'compdate' => 'required_with:bizsafe,date',
	        // validate dynamic reg, member, approver
	        'rep_name.*' => 'required_with:bizsafe,on',
	        'rep_designation.*' => 'required_with:bizsafe,on',
	        'rep_email.*' => 'required_with:bizsafe,email',
	        //'rep_signature.*' => 'required_with:bizsafe,image',
	        'member_name.*' => 'required_with:bizsafe,on',
	        'member_designation.*' => 'required_with:bizsafe,on',
	        'member_email.*' => 'required_with:bizsafe,email',
	        //'member_signature.*' => 'required_with:bizsafe,image',
	        'manager_name.*' => 'required_with:bizsafe,on',
	        'manager_designation.*' => 'required_with:bizsafe,on',
	        'manager_email.*' => 'required_with:bizsafe,email',
	        //'manager_signature.*' => 'required_with:bizsafe,image',
	        //std is checked for all the below
	        'standards' => 'sometimes',
	        'stdcontract_date' => 'required_with:standards,Date',
	        'stdtype' => 'required_with:standards,String',
	        'stdTypeOfMgmtSys' => 'required_with:standards,String',
	        'stdTOA' => 'required_with:standards,String',
	        'preaudit' => 'required_with:standards,String',
	        'preauditsupduedate' => 'required_with:standards,Date',
	        'natureofbusiness' => 'required_with:standards,String',
	        'jobscopedescription' => 'required_with:standards,String',
	        'eacode' => 'required_with:standards,String',
	        'noofsite' => 'required_with:standards,Numeric',
	        //Dynamic Sites
	        'siteaddress' => 'required_with:standards,String',
	        'totalnoofsite' => 'required_with:standards,Numeric',
	        'stdaddress' => 'required_with:standards,String',
	        'stdmessage' => 'required_with:standards,String',
	        //end of dynamic sites
	        'smtNoFT' => 'required_with:standards,Numeric',
	        'smtNoPT' => 'required_with:standards,Numeric',
	        'smtNo' => 'required_with:standards,Numeric',
	        'mgmtNoFT' => 'required_with:standards,Numeric',
	        'mgmtNoPT' => 'required_with:standards,Numeric',
	        'mgmtNo' => 'required_with:standards,Numeric',
	        'admNoFT' => 'required_with:standards,Numeric',
	        'admNoPT' => 'required_with:standards,Numeric',
	        'admNo' => 'required_with:standards,Numeric',
	        'manSVCNoFT' => 'required_with:standards,Numeric',
	        'manSVCNoPT' => 'required_with:standards,Numeric',
	        'manSVCNo' => 'required_with:standards,Numeric',
	        'osNoFT' => 'required_with:standards,Numeric',
	        'osNoPT' => 'required_with:standards,Numeric',
	        'osNo' => 'required_with:standards,Numeric',
	        'tastaffroles' => 'required_with:standards,String',
	        'qctNoFT' => 'required_with:standards,Numeric',
	        'qctNoPT' => 'required_with:standards,Numeric',
	        'qctNo' => 'required_with:standards,Numeric',
	        'swNoFT' => 'required_with:standards,Numeric',
	        'swNoPT' => 'required_with:standards,Numeric',
	        'swNo' => 'required_with:standards,Numeric',
	        'othersNoFT' => 'required_with:standards,Numeric',
	        'othersNoPT' => 'required_with:standards,Numeric',
	        'othersNo' => 'required_with:standards,Numeric',
	        'ssNoFT' => 'required_with:standards,Numeric',
	        'ssNoPT' => 'required_with:standards,Numeric',
	        'ssNo' => 'required_with:standards,Numeric',
	        'noofsubcon' => 'required_with:standards,Numeric',
	        'totalworksubcon' => 'required_with:standards,Numeric',
	        'workcarriedout' => 'required_with:standards,Numeric',
	        'typeofworksubcon' => 'required_with:standards,String',
	        // validate dynamic reg, member, approver
	        'rep_namestd.*' => 'required_with:standards,String',
	        'rep_designationstd.*' => 'required_with:standards,String',
	        'rep_emailstd.*' => 'required_with:standards,Email',
	        //'rep_signaturestd.*' => 'required_with:standards,Image',
	        'member_namestd.*' => 'required_with:standards,String',
	        'member_designationstd.*' => 'required_with:standards,String',
	        'member_emailstd.*' => 'required_with:standards,Email',
	        //'member_signaturestd.*' => 'required_with:standards,Image',
	        'manager_namestd.*' => 'required_with:standards,String',
	        'manager_designationstd.*' => 'required_with:standards,String',
	        'manager_emailstd.*' => 'required_with:standards,Email',
	        //'manager_signaturestd.*' => 'required_with:standards,Image',
	        
	    ];

	    // Create a new validator instance from our validation rules
	    $validator = Validator::make($request->all(), $rules);

	    // If validation fails, we'll exit the operation now.
	    if ($validator->fails()) {

	        // Redirect to the ra page  
	        return redirect()->route('admin.addNewCompany')->withInput()->withErrors($validator);

	    }else
	    {
	        $compProfile = new Companyprofile($request->only(['company_initial', 'company_name', 'company_reg_no', 'company_logo', 'ind', 'address', 'country', 'name', 'designation', 'mobile_no', 'email', 'telephone_no', 'postal_code','address2' ,'country2', 'name2', 'designation2', 'mobile_no2','email2', 'telephone_no2', 'postal_code2'])); 
	        $compProfile->save();                

	        $salesCount = count($request->input('salesperson_name'));//an array of sales person name
	        $consultantsCount = count($request->input('consultant_name'));//an array of consultant name
	        $regCount = count($request->input('rep_name'));//an array of reg name
	        $memberCount = count($request->input('member_name'));//an array of member name
	        $managerCount = count($request->input('manager_name'));//an array of manager name

	        //add dynamic salesperson details
	        if($salesCount > 0){
	            for ($i = 0; $i < $salesCount; $i++){
	                $compProfile->salesperson()->create(['salesperson_name' => $request->input('salesperson_name.'.$i),'service_type' => $request->input('service_type.'.$i),'commence_date' => $request->input('commence_date.'.$i), 'expiry_date' => $request->input('expiry_date.'.$i)]);
	            }
	        }

	        //add dynamic consultants details
	        if($consultantsCount > 0){
	            for ($x = 0; $x < $consultantsCount; $x++){
	                $compProfile->consultant()->create(['consultant_name' => $request->input('consultant_name.'.$x),'service_type2' => $request->input('service_type2.'.$x),'commence_date2' => $request->input('commence_date2.'.$x), 'expiry_date2' => $request->input('expiry_date2.'.$x)]);
	            }
	        }
	        
	        // if bizsafe is on then add
	        if($request->has('bizsafe')){
	            $compProfile->bizsafe()->create(['contract_date' => $request->input('contract_date'),'bizsafe_lvl' => $request->input('bizsafe_lvl'),'contract_type' => $request->input('contract_type'), '3yearsupports' => $request->input('3yearsupports'),'3yrs_supexpdate' => $request->input('3yrs_supexpdate'),'scopeofwork' => $request->input('scopeofwork'),'effectivedate' => $request->input('effectivedate'),'compdate' => $request->input('compdate')]);
	            // add reg, member, manager of bizsafe section
	            $bizsafe = Bizsafe::latest()->first();    
	            $bizid = $bizsafe->id;             
	            if($regCount > 0){
	                for ($a = 0; $a < $regCount; $a++){
	                    $mgmtrep = New Raleader(['bizsafe_id' => $bizid, 'rep_name' => $request->input('rep_name.'.$a),'rep_designation' => $request->input('rep_designation.'.$a),'rep_email' => $request->input('rep_email.'.$a), 'rep_signature' => $request->input('rep_signature.'.$a)]);
	                    $mgmtrep->save();
	                }
	            }
	            if($memberCount > 0){
	                for ($b = 0; $b < $memberCount; $b++){
	                    $member = New Ramember(['bizsafe_id' => $bizid,'member_name' => $request->input('member_name.'.$b),'member_designation' => $request->input('member_designation.'.$b),'member_email' => $request->input('member_email.'.$b), 'member_signature' => $request->input('member_signature.'.$b)]);
	                    //$fompProfile->bizsafe()->member()->create(['member_name' => $request->input('member_name.'.$b),'member_designation' => $request->input('member_designation.'.$b),'member_email' => $request->input('member_email.'.$b), 'member_signature' => $request->input('member_signature.'.$b)]);
	                    $member->save();
	                }
	            }
	            if($managerCount > 0){
	                for ($c = 0; $c < $managerCount; $c++){
	                    $manager = New Approvingmanager(['bizsafe_id' => $bizid,'manager_name' => $request->input('manager_name.'.$c),'manager_designation' => $request->input('manager_designation.'.$c),'manager_email' => $request->input('manager_email.'.$c), 'manager_signature' => $request->input('manager_signature.'.$c)]);
	                    //$compProfile->bizsafe()->manager()->create(['manager_name' => $request->input('manager_name.'.$f),'manager_designation' => $request->input('manager_designation.'.$f),'manager_email' => $request->input('manager_email.'.$f), 'manager_signature' => $request->input('manager_signature.'.$f)]);
	                    $manager->save();
	                }
	            }
	        }

	        $user = Sentinel::getUser();

	        // of standard is on then add
	        $stdRepCount = count($request->input('rep_namestd'));//an array of reg name
	        $stdMemberCount = count($request->input('member_namestd'));//an array of member name
	        $stdManagerCount = count($request->input('manager_namestd'));//an array of manager name

	        if($request->has('standards')){
	            $compProfile->standard()->create(['stdcontract_date'=> $request->input('stdcontract_date'),'stdtype'=> $request->input('stdtype'),'stdTypeOfMgmtSys'=> $request->input('stdTypeOfMgmtSys'),'stdTOA'=> $request->input('stdTOA'),'preaudit'=> $request->input('preaudit'),'preauditsupduedate'=> $request->input('preauditsupduedate'),'natureofbusiness'=> $request->input('natureofbusiness'),'jobscopedescription'=> $request->input('jobscopedescription'),'eacode'=> $request->input('eacode'),'noofsite'=> $request->input('noofsite'),'smtNoFT'=> $request->input('smtNoFT'),'smtNoPT'=> $request->input('smtNoPT'),'smtNo'=> $request->input('smtNo'),'mgmtNoFT'=> $request->input('mgmtNoFT'),'mgmtNoPT'=> $request->input('mgmtNoPT'),'mgmtNo'=> $request->input('mgmtNo'),'admNoFT'=> $request->input('admNoFT'),'admNoPT'=> $request->input('admNoPT'),'admNo'=> $request->input('admNo'),'manSVCNoFT'=> $request->input('manSVCNoFT'),'manSVCNoPT'=> $request->input('manSVCNoPT'),'manSVCNo'=> $request->input('manSVCNo'),'osNoFT'=> $request->input('osNoFT'),'osNoPT'=> $request->input('osNoPT'),'osNo'=> $request->input('osNo'),'tastaffroles'=> $request->input('tastaffroles'),'qctNoFT'=> $request->input('qctNoFT'),'qctNoPT'=> $request->input('qctNoPT'),'qctNo'=> $request->input('qctNo'),'swNoFT'=> $request->input('swNoFT'),'swNoPT'=> $request->input('swNoPT'),'swNo'=> $request->input('swNo'),'othersNoFT'=> $request->input('othersNoFT'),'othersNoPT'=> $request->input('othersNoPT'),'othersNo'=> $request->input('othersNo'),'ssNoFT'=> $request->input('ssNoFT'),'ssNoPT'=> $request->input('ssNoPT'),'ssNo'=> $request->input('ssNo'),'noofsubcon'=> $request->input('noofsubcon'),'totalworksubcon'=> $request->input('totalworksubcon'),'workcarriedout'=> $request->input('workcarriedout'),'typeofworksubcon'=> $request->input('typeofworksubcon')]);
	            // add reg, member, manager of bizsafe section
	            $stdsafe = Standard::latest()->first();    
	            $standardid = $stdsafe->id;             
	            if($stdRepCount > 0){
	                for ($d = 0; $d < $stdRepCount; $d++){
	                    $mgmtrep = New Mgmtrep(['standard_id' => $standardid, 'rep_namestd' => $request->input('rep_namestd.'.$d),'rep_designationstd' => $request->input('rep_designationstd.'.$d),'rep_emailstd' => $request->input('rep_emailstd.'.$d), 'rep_signaturestd' => $request->input('rep_signaturestd.'.$d)]);
	                    $mgmtrep->save();
	                }
	            }
	            if($stdMemberCount > 0){
	                for ($e = 0; $e < $stdMemberCount; $e++){
	                    $member = New Member(['standard_id' => $standardid,'member_namestd' => $request->input('member_namestd.'.$e),'member_designationstd' => $request->input('member_designationstd.'.$e),'member_emailstd' => $request->input('member_emailstd.'.$e), 'member_signaturestd' => $request->input('member_signaturestd.'.$e)]);
	                    //$compProfile->bizsafe()->member()->create(['member_name' => $request->input('member_name.'.$e),'member_designation' => $request->input('member_designation.'.$e),'member_email' => $request->input('member_email.'.$e), 'member_signature' => $request->input('member_signature.'.$e)]);
	                    $member->save();
	                }
	            }
	            if($stdManagerCount > 0){
	                for ($f = 0; $f < $stdManagerCount; $f++){
	                    $manager = New Manager(['standard_id' => $standardid,'manager_namestd' => $request->input('manager_namestd.'.$f),'manager_designationstd' => $request->input('manager_designationstd.'.$f),'manager_emailstd' => $request->input('manager_emailstd.'.$f), 'manager_signaturestd' => $request->input('manager_signaturestd.'.$f)]);
	                    //$compProfile->bizsafe()->manager()->create(['manager_name' => $request->input('manager_name.'.$f),'manager_designation' => $request->input('manager_designation.'.$f),'manager_email' => $request->input('manager_email.'.$f), 'manager_signature' => $request->input('manager_signature.'.$f)]);
	                    $manager->save();
	                }
	            }
	        }
	        

	        // is new image uploaded?
	        /*
	        if ($file = $request->file('complogo')) {
	            $extension = $file->extension()?: 'png';
	            $folderName = '/uploads/users/';
	            $destinationPath = public_path() . $folderName;
	            $safeName = str_random(10) . '.' . $extension;
	            $file->move($destinationPath, $safeName);

	            //delete old pic if exists
	            if (File::exists(public_path() . $folderName . $user->pic)) {
	                File::delete(public_path() . $folderName . $user->pic);
	            }
	            //save new file path into db
	            $ra->company_logo = $safeName;


	        }*/

	        // Was the ra updated?
	        if ($compProfile->save()) {
	            // Prepare the success message
	            $success = trans('users/message.success.update');
	            //Activity log for update account
	            activity($user->full_name)
	                ->performedOn($user)
	                ->causedBy($user)
	                ->log( $user->first_name .'User created new risk for'. $request->company_initial );
	            // Redirect to the ra page
	            return view('admin.viewCompany')->with('success', $success);
	        }
	    }

	}

}
