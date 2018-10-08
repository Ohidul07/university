@extends('layouts.master')
@section('content')
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title" style="text-align: center;">Student ID: {{$infos->student_id}}</h5>
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
                  <th>Exam Name</th>
                  <th>Programme Type</th>
                  <th>Session</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>CGPA</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($examinfos as $examinfo)
                <?php $count = 0;?>
                @foreach($studentExams as $studentExam)
				
                @if($studentExam->examination_id == $examinfo->id)
                <?php $count = $count+1;?>
                @if($count == 1)
                <tr>
                  <td>{{ $examinfo->title }}</td>
                  <td>{{ $examinfo->Programme->programme_type }}</td>
                  <td>{{ $examinfo->Session->session }}</td>
                  <td>{{ $examinfo->Year->year }}</td>
                  <td>{{ $examinfo->Semester->semester_id }}</td>
                  <td>{{ $helper->examcgpa($infos->user_id,$examinfo->id) }}</td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="{{url('student/course/mark/details?'.'examination='.$examinfo->id.'&'.'student='.$infos->user_id)}}">View Details</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
@endsection
