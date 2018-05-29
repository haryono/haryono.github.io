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


class TestController extends Controller
{
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ra = Riskassessment::where('id', $id)->first();
        $id = $id;
        return view('admin.edit', compact('ra', 'id'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$user = Sentinel::getUser();
        $request->validate([
            'company_name'=>'required',
            'company_initial'=> 'required'
        ]);
        $ra=Riskassessment::find($id)->update($request->all());
        	// Prepare the success message
    	    $success = trans('users/message.success.update');
    	    //Activity log for update account
    	    activity($user->full_name)
    	        ->performedOn($user)
    	        ->causedBy($user)
    	        ->log( $user->first_name .'User updated company profile for'. $request->company_initial );
        	return redirect('test1')->with('success', 'New support ticket has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ra = Riskassessment::find($id);
        $ra->delete();

        return redirect('test1')->with('success', 'Ticket has been deleted!!');
    }
}
