<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\Semester;
use App\Session;
use App\Year;
use Auth;
use App\Examination;


class examController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        $programmes=Programme::all();
        $semesters=Semester::all();
        $sessions=Session::all();
        $years=Year::all();
        return view('examinations.create',compact('programmes','semesters','sessions','years'));
    }


    public function store(Request $request)
    {
        $request->validate([
           
           'title'=>'required',
           'programme_type'=>'required',
           'session'=>'required',
           'year'=>'required',
           'semester'=>'required',
        ]);

        $userId=Auth::user()->id;

        $data=$request->all();

        $examdata=new Examination();
        $examdata->title=$data['title'];
        $examdata->programme_type=$data['programme_type'];
        $examdata->session=$data['session'];
        $examdata->year=$data['year'];
        $examdata->semester=$data['semester'];
        $examdata->created_by=$userId;
        $examdata->updated_by=$userId;

        if($examdata->save()){
            return redirect()->back()
            ->with('alert.status', 'success')
            ->with('alert.message', 'Successfully Saved.');
        }
        else{
            return redirect()->back()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Try Again.');
        }

    }


    public function exam_informations()
    {
        $examinfos=Examination::all();
         return view('examinations.exam_informations',compact('examinfos'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
