@extends('layouts.master')
@section('content')
	  <div class="content">
	    <div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Lab Marks Entry</h6>
				<div class="heading-elements">
					<ul class="icons-list">
	            		<li><a data-action="reload"></a></li>
	            	</ul>
	        	</div>
	        	@if(session()->has('alert.message'))
	            <div class="alert alert-{{ session('alert.status') }} no-border">
	                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
	                <span class="text-semibold">{{ session('alert.message') }}</span> 
	            </div>
	            @endif
			</div>
		    <?php $helper = new \App\Lib\Helper; ?>
	        <div class="panel-body">
	        	{!! Form::open(['url'=>route('lab_marks_store'),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
	        		<div class="row">
						<div class="col-md-1">
	                        <div class="form-group">
	                            <label>Student Id</label>
	                        </div>
						</div>
						<div class="col-md-2">
	                        <div class="form-group">
	                            <label>Lab Performance</label>
	                        </div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
	                            <label>Lab Attendence</label>
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <label>Lab Final</label>
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <label>Quiz</label>
	                        </div>

						</div>
						<div class="col-md-1">
							<div class="form-group">
	                           <label>Viva</label>
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                           <label>Total</label>
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                           <label>GPA</label>
	                        </div>
						</div>
					</div>
					<?php $i=0;?>
					 <input type="hidden" name="course_id" class="form-control" placeholder="Student Id"  value="{{ $course->id}}">
					 <input type="hidden" name="examination_id" class="form-control" placeholder="Student Id"  value="{{ $examination->id}}">
					@foreach($students as $student)
					<div class="row">
						<div class="col-md-1">
	                        <div class="form-group">
	                            <input type="text" name="" class="form-control" placeholder="Student Id" disabled value="{{ $student->student_id}}">
	                            <input type="hidden" name="student_id[]" class="form-control" placeholder="Student Id" value="{{ $student->id}}">
	                        </div>
						</div>
						<div class="col-md-2">
	                        <div class="form-group">
	                            <input type="text" name="lab_performance[]" class="form-control" placeholder="Lab Performance" disabled value="{{$helper->mark($student->id,'lab_performance',$examination->id,$course->id)}}">
	                        </div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_attendence[]" placeholder="Lab Attendence" disabled value="{{$helper->mark($student->id,'lab_attendence',$examination->id,$course->id)}}" >
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_final[]" placeholder="Lab Final" disabled value="{{$helper->mark($student->id,'lab_final',$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_quiz[]" placeholder="Lab Quiz" disabled value="{{$helper->mark($student->id,'lab_quiz',$examination->id,$course->id)}}">
	                        </div>

						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_viva[]" placeholder="Lab Viva" disabled value="{{$helper->mark($student->id,'lab_viva',$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_viva[]" placeholder="Attendence" disabled value="{{$helper->totalMark($student->id,$course->CourseType->course_type,$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="lab_viva[]" placeholder="Attendence" disabled value="{{$helper->GPA($student->id,$course->CourseType->course_type,$examination->id,$course->id)}}">
	                        </div>
						</div>
					</div>
					<?php $i = $i+1;?>
					@endforeach
	            {!! Form::close() !!}
		    </div>
		</div>
	  </div>
@endsection