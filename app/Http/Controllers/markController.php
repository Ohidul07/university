<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\course;
use App\models\Sms\Student;
use App\Examination;
use App\Mark;
use Auth;

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
                if($course->CourseType->course_type == 'Theory'){

                return view('marks.mark_entry',compact('students','examination','course'));
                }else if($course->CourseType->course_type == 'Lab'){


                return view('marks.mark_entry_lab',compact('students','examination','course'));

                }else{
                    return redirect()->back()
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Some Thing Wrong');
                }
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


    public function store(Request $request)
    {
        $data = $request->all();
        $count = count($data['student_id']);
        $exam_id = $data['examination_id'];
        $course_id = $data['course_id'];

        for($i=0;$i<$count;$i++)
        {
            $markUpdate = Mark::where('student_id',$data['student_id'][$i])->where('examination_id',$exam_id)->where('course_id',$course_id)->first();
            if($markUpdate !=null)
            {
                $markUpdate->internal_mark = $data['internal_mark'][$i];
                $markUpdate->external_mark = $data['external_mark'][$i];
                $markUpdate->third_examiner_mark = $data['third_examiner_mark'][$i];
                $markUpdate->class_test = $data['class_test'][$i];
                $markUpdate->attendence = $data['attendence'][$i];
                $markUpdate->updated_by = Auth::user()->id;
                $markUpdate->created_by = Auth::user()->id;

                $markUpdate->update();
            }else
            {
                $mark = new Mark;
                $mark->student_id = $data['student_id'][$i];
                $mark->course_id = $data['course_id'];
                $mark->examination_id = $data['examination_id'];
                $mark->internal_mark = $data['internal_mark'][$i];
                $mark->external_mark = $data['external_mark'][$i];
                $mark->third_examiner_mark = $data['third_examiner_mark'][$i];
                $mark->class_test = $data['class_test'][$i];
                $mark->attendence = $data['attendence'][$i];
                $mark->created_by = Auth::user()->id;
                $mark->updated_by = Auth::user()->id;
                $mark->teacher_id = Auth::user()->id;

                $mark->save();

                
            }
        }

        
            return redirect()->back()
            ->with('alert.status', 'success')
            ->with('alert.message', 'Successfully Saved.');
       
    }


    public function lab_store(Request $request)
    {
        $data = $request->all();
        $count = count($data['student_id']);
        $exam_id = $data['examination_id'];
        $course_id = $data['course_id'];

        for($i=0;$i<$count;$i++)
        {
            $markUpdate = Mark::where('student_id',$data['student_id'][$i])->where('examination_id',$exam_id)->where('course_id',$course_id)->first();
            if($markUpdate !=null)
            {
                $markUpdate->lab_performance = $data['lab_performance'][$i];
                $markUpdate->lab_attendence = $data['lab_attendence'][$i];
                $markUpdate->lab_final = $data['lab_final'][$i];
                $markUpdate->lab_quiz = $data['lab_quiz'][$i];
                $markUpdate->lab_viva = $data['lab_viva'][$i];
                $markUpdate->updated_by = Auth::user()->id;
                $markUpdate->created_by = Auth::user()->id;

                $markUpdate->update();
            }else
            {
                $mark = new Mark;
                $mark->student_id = $data['student_id'][$i];
                $mark->course_id = $data['course_id'];
                $mark->examination_id = $data['examination_id'];
                $mark->lab_performance = $data['lab_performance'][$i];
                $mark->lab_attendence = $data['lab_attendence'][$i];
                $mark->lab_final = $data['lab_final'][$i];
                $mark->lab_quiz = $data['lab_quiz'][$i];
                $mark->lab_viva = $data['lab_viva'][$i];
                $mark->created_by = Auth::user()->id;
                $mark->updated_by = Auth::user()->id;
                $mark->teacher_id = Auth::user()->id;

                $mark->save();

                
            }
        }

        
            return redirect()->back()
            ->with('alert.status', 'success')
            ->with('alert.message', 'Successfully Saved.');
       
    }


    public function marks_show_by_exam($id)
    {
        
    }

    public function marks_show_by_exam_and_course()
    {
        $select_exams=Examination::all();
        $select_courses=Course::all();
        return view('marks.marks_show_by_exam_and_course',compact('select_exams','select_courses'));
        
    }

    public function marks_show()
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
                if($course->CourseType->course_type == 'Theory'){

                return view('marks.mark_show_theory',compact('students','examination','course'));
                }else if($course->CourseType->course_type == 'Lab'){


                return view('marks.mark_show_lab',compact('students','examination','course'));

                }else{
                    return redirect()->back()
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Some Thing Wrong');
                }
            }else
            {
                return redirect()->back()
                ->with('alert.status', 'danger')
                ->with('alert.message', 'This course is not in this exam');
            }
        }else if($_GET["exam"] !=null && $_GET["course"]==null){

        }
        else
        {
         return redirect()->back()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'You have to select exam and course first');
        }
        

    }

    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
