@extends('layouts.master')
@section('content')
	  <div class="content">
	    <div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Marks Entry</h6>
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
	        	{!! Form::open(['url'=>route('marks_store'),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
	        		<div class="row">
						<div class="col-md-2">
	                        <div class="form-group">
	                            <label>Student Id</label>
	                        </div>
						</div>
						<div class="col-md-2">
	                        <div class="form-group">
	                            <label>Internal Marks</label>
	                        </div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
	                            <label>External Marks</label>
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <label>Third Examiner</label>
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <label>Class Test</label>
	                        </div>

						</div>
						<div class="col-md-1">
							<div class="form-group">
	                           <label>Attendence</label>
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
						<div class="col-md-2">
	                        <div class="form-group">
	                            <input type="text" name="" class="form-control" placeholder="Student Id" disabled value="{{ $student->student_id}}">
	                            <input type="hidden" name="student_id[]" class="form-control" placeholder="Student Id" value="{{ $student->id}}">
	                        </div>
						</div>
						<div class="col-md-2">
	                        <div class="form-group">
	                            <input type="text" name="internal_mark[]" class="form-control" placeholder="Internal Marks" disabled value="{{$helper->mark($student->id,'internal_mark',$examination->id,$course->id)}}">
	                        </div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" name="external_mark[]" placeholder="External Marks" disabled value="{{$helper->mark($student->id,'external_mark',$examination->id,$course->id)}}" >
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" name="third_examiner_mark[]" placeholder="Third Examiner" disabled value="{{$helper->mark($student->id,'third_examiner_mark',$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="class_test[]" placeholder="Class Test" disabled value="{{$helper->mark($student->id,'class_test',$examination->id,$course->id)}}">
	                        </div>

						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="attendence[]" placeholder="Attendence" disabled value="{{$helper->mark($student->id,'attendence',$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="attendence[]" placeholder="Attendence" disabled value="{{$helper->totalMark($student->id,$course->CourseType->course_type,$examination->id,$course->id)}}">
	                        </div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
	                            <input type="text" class="form-control" name="attendence[]" placeholder="Attendence" disabled value="{{$helper->GPA($student->id,$course->CourseType->course_type,$examination->id,$course->id)}}">
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