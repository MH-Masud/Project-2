<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function index()
    {
    	$divisions = DB::table('countries')->get();
    	return view('welcome',compact('divisions'));
    }

    public function division(Request $request)
    {
    	$id = $request->input('id');
    	$districts = DB::table('dividions')
    	               ->where('country_id',$id)
    	               ->get();
    	// dd($districts) ;
    	foreach ($districts as $district) {
    		
    		echo '<option value="'.$district->id.'">'.$district->name.'</option>';
    	}
    }
    public function thana(Request $request)
    {
    	$id  = $request->input('id');
    	$thans = DB::table('districts')
    	        ->where('division_id',$id)
    	        ->get();
    	foreach ($thans as $than) {
    		
    		echo '<option value="'.$than->id.'">'.$than->name.'</option>';
    	}
    }
}
