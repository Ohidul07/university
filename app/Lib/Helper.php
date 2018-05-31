<?php

namespace App\Lib;
use App\Mark;
class Helper
{
    public function mark($student_id,$mark_type,$examination_id,$course_id)
    {
        if($mark_type == 'internal_mark')
        {
        	$mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        	if($mark!=null)
        	{
        		return $mark->internal_mark;
        	}else
        	{
        		return 0;
        	}
        }

        if($mark_type == 'external_mark')
        {
        	$mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        	if($mark!=null)
        	{
        		return $mark->external_mark;
        	}else
        	{
        		return 0;
        	}
        }


        if($mark_type == 'third_examiner_mark')
        {
        	$mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        	if($mark!=null)
        	{
        		return $mark->third_examiner_mark;
        	}else
        	{
        		return 0;
        	}
        }


        if($mark_type == 'class_test')
        {
        	$mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        	if($mark!=null)
        	{
        		return $mark->class_test;
        	}else
        	{
        		return 0;
        	}
        }


        if($mark_type == 'attendence')
        {
        	$mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        	if($mark!=null)
        	{
        		return $mark->attendence;
        	}else
        	{
        		return 0;
        	}
        }
    }

}