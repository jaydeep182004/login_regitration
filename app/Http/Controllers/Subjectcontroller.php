<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class Subjectcontroller extends Controller
{
    public function sub_form(){
        return view('subject.sub_form');
    }

    public function subjectform(request $request){
        $data=new Subject();
        $data->std=$request['std'];
        $checkbox=$request['Ten'];
        $data->Ten = implode(',', $checkbox);
        $check=$request['Twelve'];
        $data->twelve = implode(',', $check);
        $data->save();
        return view('subject.sub_form');
    }
}
