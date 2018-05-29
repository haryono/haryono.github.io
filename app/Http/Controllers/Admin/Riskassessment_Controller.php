<?php

namespace App\Http\Controllers\Admin;

use App\Companyprofile;
use App\Workactivity;
use App\Inv_of_work;
use App\Work_risk;
use App\Riskassessment;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class Riskassessment_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('admin.Riskassessment');
    }

    public function data()
    {
        $tables = Riskassessment::get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        return DataTables::of($tables)
            ->addColumn('toapprove', '<a class="toapprove" href="javascript:;">Click to approve</a>')
            ->addColumn('edit', '<a class="edit" href="javascript:;">Edit</a>')
            ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
            ->rawColumns(['toapprove','edit','delete'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            Riskassessment::create($request->except('_token'));
        }
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

    public function destroy($id)
    {
        $row=Riskassessment::find($id);
        $row->delete();
        return $row->id;
    }

    public function approve($id)
    {
        Riskassessment::where('id', $id)->update(array('status' => 'approved'));
        return 'success';
    }

    public function reject($id)
    {
        Riskassessment::where('id', $id)->update(array('status' => 'rejected'));
        return $row->id;
    }

    public function processRA(Request  $request)
    {
        
        $selCount = count($request->input('select'));
        $project_name= $request->input('project_name');
        if($selCount>0){
            $inv=Inv_of_work::create([ 'project_name'=>$project_name]);
            for ($i = 0; $i < $selCount; $i++){
                $inv->work_risk()->create(['riskassessment_id'=>$request->input('select.'.$i)]);
            }
        }
        return redirect()->route('admin.invOfWorkAct');
    }




    public function buttonData(Request $request)
    {
        if ($request->jobButton!=null) {
            $tables=Riskassessment::where('status',$request->jobButton)->get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        }else {
            $tables =Riskassessment::get(['id','risklocation', 'riskprocess','updated_at','riskleader','approvingmanager','status']);
        }

        return Datatables::of($tables)
            ->addColumn('toapprove', '<a class="toapprove" href="javascript:;">Click to approve</a>')
            ->addColumn('edit', '<a class="edit" href="javascript:;">Edit</a>')
            ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
            ->rawColumns(['toapprove','edit','delete'])
            ->make(true);
    }
}
