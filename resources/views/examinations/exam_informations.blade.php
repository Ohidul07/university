@extends('layouts.master')
@section('content')
<table class='table'>
   <thead>
  <tr>
    <th>Exam Name</th>
    <th>Programme Type</th>
    <th>Session</th>
    <th>Year</th>
    <th>Semester</th>
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
    </tr>
@endforeach    
  </tbody>
</table>  
@endsection