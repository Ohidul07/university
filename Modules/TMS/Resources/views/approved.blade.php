@extends('layouts.master')
@section('content')
<table class='table'>
   <thead>
	<tr>
		<th>First Name</th>
		<th>Second Name</th>
		<th>Email</th>
    <th>Action</th>
	</tr>
  </thead>	
  <tbody>
 @foreach($teachers as $teacher)
  	<tr>
  		<td>{{ $teacher->first_name }}</td>
  		<td>{{ $teacher->second_name }}</td>
  		<td>{{ $teacher->email }}</td>
      <td><a href="{{ route('teacher-edit',['id'=>$teacher->id]) }}">Edit</a></td>
      <td><a href="{{ route('teacher-view',['id'=>$teacher->id]) }}">View</a></td>
      <td><a href="{{ route('teacher-delete',['id'=>$teacher->id]) }}">Delete</a></td>
  	</tr>
    @endforeach
  </tbody>
</table>
@endsection
