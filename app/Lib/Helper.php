<?php

namespace App\Lib;
use App\Mark;
use App\Examination;
use App\course;
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


        if($mark_type == 'lab_performance')
        {
            $mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
            if($mark!=null)
            {
                return $mark->lab_performance;
            }else
            {
                return 0;
            }
        }


        if($mark_type == 'lab_attendence')
        {
            $mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
            if($mark!=null)
            {
                return $mark->lab_attendence;
            }else
            {
                return 0;
            }
        }


        if($mark_type == 'lab_final')
        {
            $mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
            if($mark!=null)
            {
                return $mark->lab_final;
            }else
            {
                return 0;
            }
        }


        if($mark_type == 'lab_quiz')
        {
            $mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
            if($mark!=null)
            {
                return $mark->lab_quiz;
            }else
            {
                return 0;
            }
        }


        if($mark_type == 'lab_viva')
        {
            $mark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
            if($mark!=null)
            {
                return $mark->lab_viva;
            }else
            {
                return 0;
            }
        }
    }

    public function totalMark($student_id,$course_type,$examination_id,$course_id)
    {
        $course = course::find($course_id);

        $exammark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        if($exammark==null)
        {
            return 0;
        }
        if($course_type=='Theory')
        {
            $third_examiner_mark= $exammark->third_examiner_mark;
            $internal_mark= $exammark->internal_mark;
            $external_mark= $exammark->external_mark;
            $class_test= $exammark->class_test;
            $attendence= $exammark->attendence;
            if($third_examiner_mark ==0)
            {
                $theory = ($internal_mark+$external_mark)/2;
            }else
            {
                $internal = abs($third_examiner_mark - $internal_mark);
                $external = abs($third_examiner_mark - $external_mark);

                if($internal < $external)
                {
                    $theory = ($third_examiner_mark+$internal_mark)/2;
                }else
                {
                    $theory = ($third_examiner_mark+$external_mark)/2; 
                }
            }

            $mark = $theory+$class_test+$attendence;
            return $mark;

        }
        else{

            $lab_performance=$exammark->lab_performance;
            $lab_attendence=$exammark->lab_attendence;
            $lab_final=$exammark->lab_final;
            $lab_quiz=$exammark->lab_quiz;
            $lab_viva=$exammark->lab_viva;

            $mark= $lab_performance+$lab_attendence+$lab_final+$lab_quiz+$lab_viva;
            return $mark;

        }
    }

    public function GPA($student_id,$course_type,$examination_id,$course_id)
    {
        $course = course::find($course_id);

        $exammark = Mark::where('student_id',$student_id)->where('examination_id',$examination_id)->where('course_id',$course_id)->first();
        
        if($exammark==null)
        {
            return 0;
        }
        if($course_type=='Theory')
        {
            $third_examiner_mark= $exammark->third_examiner_mark;
            $internal_mark= $exammark->internal_mark;
            $external_mark= $exammark->external_mark;
            $class_test= $exammark->class_test;
            $attendence= $exammark->attendence;
            if($third_examiner_mark ==0)
            {
                $theory = ($internal_mark+$external_mark)/2;
            }else
            {
                $internal = abs($third_examiner_mark - $internal_mark);
                $external = abs($third_examiner_mark - $external_mark);

                if($internal < $external)
                {
                    $theory = ($third_examiner_mark+$internal_mark)/2;
                }else
                {
                    $theory = ($third_examiner_mark+$external_mark)/2; 
                }
            }

            $mark = $theory+$class_test+$attendence;

        }
        else{

            $lab_performance=$exammark->lab_performance;
            $lab_attendence=$exammark->lab_attendence;
            $lab_final=$exammark->lab_final;
            $lab_quiz=$exammark->lab_quiz;
            $lab_viva=$exammark->lab_viva;

            $mark= $lab_performance+$lab_attendence+$lab_final+$lab_quiz+$lab_viva;

        }

        if($mark >=80)
        {
            return '4.00';
        }
        else if($mark < 80 && $mark >=75)
        {
            return '3.75';
        }
        else if($mark < 75 && $mark >=70)
        {
            return '3.50';
        }
        else if($mark < 70 && $mark >=65)
        {
            return '3.25';
        }
        else if($mark < 65 && $mark >=60)
        {
            return '3.00';
        }
        else if($mark < 60 && $mark >=55)
        {
            return '2.75';
        }
        else if($mark < 55 && $mark >=50)
        {
            return '2.50';
        }
        else if($mark < 50 && $mark >=45)
        {
            return '2.25';
        }
        else if($mark < 45 && $mark >=40)
        {
            return '2.00';
        }
        else
        {
            return '00';
        }
    }

}