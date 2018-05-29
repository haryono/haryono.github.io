<?php

namespace App\Http\Controllers\Admin;

use App\Possible_accident;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PossibleAccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('admin.possible_accident');
    }

    public function data()
    {
        $tables = Possible_accident::get(['id','name', 'created_at','updated_at','deleted_at']);
        return DataTables::of($tables)
            ->addColumn('edit', '<a class="edit" href="javascript:;">Edit</a>')
            ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
            ->rawColumns(['edit','delete'])
            ->make(true);
    }

    public function store(Request $request)
    {
        
        Possible_accident::create($request->except('_token'));
        return view('admin.possible_accident');
    }

    public function update(Request $request, $id)
    {
        $rules = [

            'name' => 'required',
            
        ];

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return $validator->errors()->all();
        }

        $table = Possible_accident::find($id);
        $table->update($request->except('_token'));
        return 'success';

    }

    public function destroy($id)
    {
        $row=Possible_accident::find($id);
        $row->delete();
        return $row->id;
    }

    public function approve($id)
    {
        Possible_accident::where('id', $id)->update(array('status' => 'approved'));
        return 'success';
    }

    public function reject($id)
    {
        Possible_accident::where('id', $id)->update(array('status' => 'rejected'));
        return $row->id;
    }

/* refer to editable_table
    public function buttonData(Request $request)
    {
        if ($request->jobButton!=null) {
            $tables=Possible_accident::where('status',$request->jobButton)->get(['id', 'company_name', 'company_initial', 'company_reg_no', 'status']);
        }else {
            $tables =Possible_accident::get(['id', 'company_name', 'company_initial', 'company_reg_no', 'status']);
        }

        return Datatables::of($tables)
            ->addColumn('toapprove', '<a class="toapprove" href="javascript:;">Click to approve</a>')
            ->addColumn('edit', '<a class="edit" href="javascript:;">Edit</a>')
            ->addColumn('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
            ->addColumn('select','<input type="checkbox" name="select" class="square"/>')
            ->rawColumns(['toapprove','edit','delete','select'])
            ->make(true);
    }
*/
}
