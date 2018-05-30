@extends('layouts.master')
@section('content')
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Examination Informations</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                   <li><a data-action="reload"></a></li>
                </ul>
              </div>
            </div>
            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>Exam Name</th>
                  <th>Programme Type</th>
                  <th>Session</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($examinfos as $examinfo)
                <tr>
                  <td>{{ $examinfo->title }}</td>
                  <td>{{ $examinfo->Programme->programme_type }}</td>
                  <td>{{ $examinfo->Session->session }}</td>
                  <td>{{ $examinfo->Year->year }}</td>
                  <td>{{ $examinfo->Semester->semester_id }}</td>
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
