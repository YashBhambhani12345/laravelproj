<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\recordModel;
use App\Models\insertModel;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use PDF; 
use Illuminate\Support\Facades\View;

class AjaxController extends Controller
{

    public function ajaxform(Request $request) {
        $insertData = [];
        $insertData['name'] = $request->name;
        $insertData['email'] = $request->email;
        $insertData['password'] = $request->psw;
        User::create($insertData);
        return response()->json(['result' => 'Data Inserted']);
    }

    
    public function showdata(){
        return view('show');
    }




    public function fetchdata()
    {
        $data = User::all();
        return response()->json(["data"=>$data,"result" => 'Data Passed']);

    }




    public function updateajax($id){
        $record = User::find($id);
        return view('updateajaxform')->with('record',$record);
    }




    public function ajaxedit(Request $request){
        $updateData = [];
        $updateData['name'] = $request->name;
        $updateData['email'] = $request->email;
        $updateData['password'] = $request->password;
        User::where('id',$request->id)->update($updateData);   
        return response()->json(['result' => 'Updated']);
    }



    public function search(Request $request){
        $query = $request->input('query');
        $suggestions = User::where('name', 'like', $query . '%')->get();
        return response()->json(['data' => $suggestions]);
    }

    public function search2(Request $request){
        $query = $request->input('query');
        $suggestions = User::where('name', 'like', $query . '%')->where('id', '>', $request->limit)->get();        
        return response()->json(['data' => $suggestions]);
    }


    public function recordpage(Request $request){
        $res = User::take($request->limit)->get();
        return response()->json(['rec' => $res]);
    }

    public function pagedata1(Request $request){
        $res = User::where('id', '>=', 1)->take($request->limit)->get();
        return response()->json(['ans1' => $res]);
    }


    public function pagedata2(Request $request){
        $res = User::where('id', '>=', $request->limit+1)->take($request->limit)->get();
        return response()->json(['ans2' => $res]);
    }


    public function pagedata3(Request $request){
        $res = User::where('id', '>=', $request->limit+$request->limit+1)->take($request->limit)->get();
        return response()->json(['ans3' => $res]);
    }



}
