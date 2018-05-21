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
 @foreach($students as $student)
  	<tr>
  		<td>{{ $student->first_name }}</td>
  		<td>{{ $student->second_name }}</td>
  		<td>{{ $student->email }}</td>
      <td><a href="{{ route('student-edit',['id' => $student->id]) }}">Edit</a></td>
      <td><a href="{{ route('student-view',['id' => $student->id]) }}">View</a></td>
      <td><a href="{{ route('student-delete',['id' => $student->id]) }}">Delete</a></td>
  	</tr>
    @endforeach
  </tbody>
</table>
@endsection
