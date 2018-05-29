<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\models\semester;
use App\CourseType;
use App\course;
use Auth;
class courseController extends Controller
{
 
    public function index()
    {
        //
    }

    public function create()
    {
        
        $programmes = Programme::all();
        $semesters = semester::all();
        $course_types = CourseType::all();

        return view("courses.create",compact('programmes','semesters','course_types'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_code' => 'required',
            'course_credit' => 'required',
            'semester' => 'required',
            'course_type' => 'required',
            'programme_type' => 'required',
        ]);
        $userId = Auth::user()->id;

        $data=$request->all();
        $coursedata=new course();

        $coursedata->title=$data['title'];
        $coursedata->course_code=$data['course_code'];
        $coursedata->course_credit=$data['course_credit'];
        $coursedata->semester=$data['semester'];
        $coursedata->course_type=$data['course_type'];
        $coursedata->programme_type=$data['programme_type'];
        $coursedata->course_syllabus=$data['course_syllabus'];
        $coursedata->created_by=$userId;
        $coursedata->updated_by=$userId;
        if($coursedata->save()){
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


    public function course_informations( )
    {
        $courses=course::all();
        return view('courses.course_informations',compact('courses'));
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
