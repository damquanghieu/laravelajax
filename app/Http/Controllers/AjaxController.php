<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ajax;
use DB;


class AjaxController extends Controller
{
   function getData()
   {
   		$data = ajax::all();

   		return view('show',compact('data'));



   }
   function testajax(Request $request){

   		$ajax = new ajax;
         $ajax -> content = $request-> website;
         $ajax ->save();

   		$data = DB::table('ajax')->get();
        // $data = ajax::all();
         //$data = array_reverse($datas);
         
   		return $data;

   }
}
