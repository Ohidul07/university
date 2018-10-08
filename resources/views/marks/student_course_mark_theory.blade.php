@extends('layouts.master')
@section('content')
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title" style="text-align: center;">Examination : {{$examinfos->title}}</h5>
              <h5 class="panel-title" style="text-align: center;">Student ID:{{$infos->student_id}}</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                   <li><a data-action="reload"></a></li>
                </ul>
              </div>
            </div>
            <?php $helper = new \App\Lib\Helper; ?>
            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th>Course Code</th>
                  <th>Course Type</th>
                  <th>Credit</th>
                  <th>CGPA</th>
                </tr>
              </thead>
              <tbody>
               @foreach($studentCourses as $studentCourse)
                <tr>
                  <td>{{ $studentCourse->Course->title }}</td>
                  <td>{{ $studentCourse->Course->course_code }}</td>
                  <td>{{ $studentCourse->Course->CourseType->course_type }}</td>
                  <td>{{ $studentCourse->Course->course_credit }}</td>
                  <td>{{$helper->GPA($student_id,$studentCourse->Course->CourseType->course_type,$exam_id,$studentCourse->Course->id)}}</td>
                  
                  
                </tr>
               
                @endforeach
              </tbody>
            </table>
          </div>
@endsection
