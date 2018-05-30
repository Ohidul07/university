<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\course;
use App\models\Sms\Student;
use App\Examination;

class markController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function select_exam()
    {
        $select_exams=Examination::all();
        $select_courses=Course::all();
        return view('marks.select_exam',compact('select_exams','select_courses'));
    }

    public function mark_entry()
    {

        if($_GET["exam"] !=null && $_GET["course"] !=null)
        {

            $exam_id = $_GET["exam"];
            $course_id = $_GET["course"];

            $course = course::find($course_id);
            $examination = Examination::find($exam_id);
            if($course->semester == $examination->semester)
            {
                $students=Student::where('session',$examination->session)->where('semester',$examination->semester)->get();

                return view('marks.mark_entry',compact('students'));
            }else
            {
                return redirect()->back()
                ->with('alert.status', 'danger')
                ->with('alert.message', 'This course is not in this exam');
            }
        }else
        {
         return redirect()->back()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'You have to select exam and course first');
        }
        

    }


    public function mark_show()
    {
         return view('marks.marks_show');

    }

    public function store(Request $request)
    {
        //
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
