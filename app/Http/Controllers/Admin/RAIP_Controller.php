<?php

namespace App\Http\Controllers\Admin;

use App\Companyprofile;
use App\Workactivity;
use App\Ra_impplan;
use App\Ra_plan;
use App\Bizsafe;
use App\Hazard;
use App\Riskassessment;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class RAIP_Controller extends Controller
{
    /**
     * Display a list of ra to be selected to create raregister
     *
     * @return view
     */
    public function index()
    {
        return view('admin/RAIP_inventory');
    }
    /**
     * Display a listing all Raregisters
     *
     * @return view
     */
    public function cindex()
    {
        return view('admin/Create_RAIP');
    }
    /**
     * Generate print preview
     *
     * @return view
     */
    public function RAIPDoc($id)
    {
        $inv=Ra_impplan::where('id',$id)->first();
        $comp=Companyprofile::first();
        $bizsafe=Bizsafe::where('companyprofile_id',22)->first(['effectivedate']);
        return view('admin/raRegisterDoc',compact('inv','comp','bizsafe'));
    }

    /**
    * raregister page to update stateofwork and remarks
    */
    public function RAIP($id)
    {
        $inv=Ra_impplan::where('id',$id)->first();
        $comp=Companyprofile::first();
        $bizsafe=Bizsafe::where('companyprofile_id',22)->first(['effectivedate']);
        $was=Workactivity::all();   
        $rl =Riskassessment::pluck('riskleader');
        $am= Riskassessment::pluck('approvingmanager');
        return view('admin.raImpPlan',compact('inv','comp','bizsafe','was','rl','am'));
    }

    public function data()
    {
        $tables = Riskassessment::where('status','approved')->get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        return DataTables::of($tables)
            ->addColumn('select','<input type="checkbox" name="select[]" value="" class="square select"/>')
            ->rawColumns(['select'])
            ->make(true);
    }

    /*
        ->addColumn('view', '<a class="view" href="{{URL::to(admin/invOfWorkAct)}}">View</a>')
        ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
        ->addColumn('archive','<a class="archive" href="{{URL::to(admin/invOfWorkAct)}}">Archive</a>')
        ->rawColumns(['view','delete','archive'])
    */

    public function datainventory()
    {
        $tables = Ra_impplan::get(['id','project_name','created_at']);
        return DataTables::of($tables)
        ->addColumn('view', '<a class="view" href="javascript:;">View</a>')
        ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
        ->addColumn('archive','<a class="archive" href="javascript:;">Archive</a>')
        ->rawColumns(['view','delete','archive'])
        ->make(true);
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'risklocation' => 'required',
            'riskprocess' => 'required',
            'updated_at' => 'required',
            'riskleader' => 'required',
            'approvingmanager' => 'required',
            'status' => 'required',
        ];

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return $validator->errors()->all();
        }

        $table = Riskassessment::find($id);
        $table->update($request->except('_token'));
        return 'success';

    }

    public function updateSowRemarks(Request $request)
    {
        $rules = [
            'effectivedate' => 'required|date',
        ];

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return $validator->errors()->all();
        }
        $table = Bizsafe::where('companyprofile_id',$request->input('companyprofile_id'));
        $table->update(['effectivedate' => $request->input('effectivedate')]);
        $statusCount = count($request->input('id'));//an array of status of work 
        if($statusCount > 0){
            for ($i = 0; $i < $statusCount; $i++){
                $id=(int)$request->input('id.'.$i);
                $tableup=Ra_risk::find($id);
                $tableup->statusofwork= $request->input('statusofwork.'.$i);
                $tableup->remark = $request->input('remark.'.$i);
                $tableup->save();
            }
        } 
        return redirect()->route('admin.ra.index')->with("success","The RA Register has been updated successfully");

    }

    public function destroy($id)
    {
        $row=Ra_impplan::find($id);
        $row->ra_plan()->delete();
        $row->delete();
        return $row->id;
    }


    public function processRAIP(Request  $request)
    {
        
        $selCount = count($request->input('select'));
        $project_name= $request->input('project_name');
        if($selCount>0){
            $inv=Ra_impplan::create([ 'project_name'=>$project_name]);
            for ($i = 0; $i < $selCount; $i++){
                $inv->ra_plan()->create(['riskassessment_id'=>$request->input('select.'.$i)]);
            }
        }
        return redirect()->route('admin.RAIP',['id'=>$inv->id])->with('success','successfully created');
    }


    public function buttonData(Request $request)
    {
        if ($request->jobButton!=null) {
            $tables=Riskassessment::where('status',$request->jobButton)->get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        }else {
            $tables=Riskassessment::where('status','approved')->get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        }

        return Datatables::of($tables)
            ->addColumn('select','<input type="checkbox" name="select[]" value="" class="square select"/>')
            ->rawColumns(['select'])
            ->make(true);
    }
}
