@extends('layouts.master')
@section('content')
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Course Informations</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="reload"></a></li>
                        </ul>
                      </div>
            </div>


            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Course Credit</th>
                  <th>Course Type</th>
                  <th>Course Syllabus</th>
                  <th>Semester</th>
                  <th>Programme Type</th>
                  <th class="text-center">Actions</th>
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
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-plus-circle2"></i>Add</a></li>
                          <li><a href="#"><i class="icon-pencil7"></i>Edit</a></li>
                          <li><a href="#"><i class="icon-bin"></i>Delete</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
@endsection