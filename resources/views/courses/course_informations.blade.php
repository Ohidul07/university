@extends('layouts.master')
@section('content')
<table class='table'>
   <thead>
  <tr>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Course Credit</th>
    <th>Course Type</th>
    <th>Course Syllabus</th>
    <th>Semester</th>
    <th>Programme Type</th>
  </tr>
  </thead>  
  <tbody>
@foreach($courses as $course)
    <tr>
      <td>{{ $course->course_code }}</td>
        <td>{{ $course->title }}</td>
        <td>{{ $course->course_credit }}</td>
        <td>{{ $course->CourseType->course_type }}</td>
        <td>{{ $course->course_syllabus }}</td>
        <td>{{ $course->Semester->semester_id }}</td>
        <td>{{ $course->ProgrammeType->programme_type }}</td>
    </tr>
@endforeach    
  </tbody>
</table>  
@endsection