<?php

namespace App\Http\Controllers;
use App\Companyprofile;
use App\Riskassessment;

use Illuminate\Http\Request;
use PDF;
use DB;

class HomeController extends Controller
{
    public function downloadPDF()
    {
        $pdf = PDF::loadView('swppdf.pdfView');
        return $pdf->download('invoice.pdf');
    }

    public function SafeWorkProcedure()
    {

        $pdf = PDF::loadView('swppdf.SafeWorkProcedure',compact('ra','cp'));
        return $pdf->download('SafeWorkProcedure.pdf',compact('ra','cp'));
    }

    /**
        * Show the application dashboard.
        *
        * @return \Illuminate\Http\Response
        */
       public function pdfview(Request $request)
       {
           $ra = Riskassessment::first();
           $cp = Companyprofile::first();
           $items = Companyprofile::get();
           view()->share('cp',$cp);
           view()->share('ra',$ra);
           view()->share('items',$items);
           if($request->has('download')){
               $pdf = PDF::loadView('swppdf.pdfview2');
               return $pdf->download('pdfview.pdf');
           }


           return view('swppdf.pdfview2');
       }

}