@extends('layouts.master')
@section('content')
<div class="panel panel-flat">
						<div class="panel-heading">
							@if(session()->has('alert.message'))
					        <div class="alert alert-{{ session('alert.status') }} no-border">
					            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
					            <span class="text-semibold">{{ session('alert.message') }}</span> 
					        </div>
					        @endif
							<h5 class="panel-title">Marks Entry</h5>

							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

							<form class="form-horizontal" action="{{ url('/marks_entry') }}" method="GET">
							
								<fieldset class="content-group">

									<div class="form-group">
										<label class="control-label col-lg-2">Select Exam</label>
										<div class="col-lg-10">
											<select name="exam" class="form-control">
			                                    <option value="">Select Semester</option>
			                                    @foreach($select_exams as $select_exam)
													<option value="{{ $select_exam->id}}">{{ $select_exam->title }} {{ $select_exam->Semester->year }} {{ $select_exam->Semester->semester }} {{ $select_exam->Year->year }}</option>
												@endforeach
			                                </select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Select Course</label>
										<div class="col-lg-10">
											<select name="course" class="form-control">
			                                    <option value="">Select Course</option>
			                                    @foreach($select_courses as $select_course)
			                                    <option value="{{ $select_course->id}}">{{ $select_course->course_code}}</option>
												@endforeach
			                                </select>
										</div>
									</div>
								</fieldset>

								
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
@endsection