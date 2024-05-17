<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Result;
use App\Models\Subject;

class Resultcontroller extends Controller
{
    public function resultForm(Request $request){
        $sub = Subject::all();
        $result=Result::all();
        $std = $request->input('std');

        $query = Student::query();

        if ($std != "") {
            $query->where('stander', 'LIKE', "%$std");
        }

        $data = $query->get();

        return view('result.result_form', compact('data', 'sub', 'std','result'));
    }
    public function rform(request $request){

        
        $result = new Result();
        // if($request['stander']){
            $result->name = $request['name'];
            $result->stander = $request['stander'];
            // $result->dob = $request['dob'];
            $marks = $request['mark'];
            $result->mark = implode(",", $marks);
           
            $result->save();

            return back();
        // }  
    }

    public function result($id){
        $result =Result::find($id);
        // echo"<pre>";
        // print_r($result);
        // exit;
        $data=Subject::all();
        $result=compact('result','data');
        return view('result.resultcard')->with( $result);
    }
    
}
