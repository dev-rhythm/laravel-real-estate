<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManageApi;
use Auth;
use Validator;

class ManageApiController extends Controller
{
    
    public function create(){

    	return view('frontend.manage-api.index');
    }


    public function store(Request $request){

    	$validator = Validator::make($request->all(), [ 
    		'api_key' => 'required',
            'api_id' => 'required'
    	]);

		if ($validator->fails()) { 
			return redirect()->back()->withErrors($validator)->withInput();
		}

    	$chkPrev = ManageApi::where(['user_id' => Auth::user()->id, 'api_id' => $request->api_id])->first();

    	if(empty($chkPrev)){

	        $newApi = new ManageApi();
	        $newApi->user_id  = Auth::user()->id;
	        $newApi->api_id  = $request->api_id;
	        $newApi->api_key  = trim($request->api_key);
	        $newApi->save();
        	
        	return redirect()->back()->with('success', 'API Key saved successfully');

    	}else{

    		$chkPrev->api_id  = $request->api_id;
	        $chkPrev->api_key  = trim($request->api_key);
	        $chkPrev->save();

    		return redirect()->back()->with('success', 'API Key updated successfully'); 
    	}

    }
}
