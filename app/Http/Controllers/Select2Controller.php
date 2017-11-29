<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Client;
use App\User;

class Select2Controller extends Controller
{
    public function select2Client(Request $request){
    	$data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Client::where('name','LIKE',"%$search%")
            		->get();
        }
        else{
            $data = Client::all();
            
        }
        return response()->json($data);
    }


    public function select2ProjectManager(Request $request){
    	$data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = User::with('roles')
            		->whereHas('roles', function($query){
            			$query->where('id', '=', 3);
            		})
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        else{
            $data = User::with('roles')
            		->whereHas('roles', function($query){
            			$query->where('id', '=', 3);
            		})
            		->get();
            
        }
        return response()->json($data);
    }
}
