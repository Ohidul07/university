@extends('layouts.master')
@section('content')
<div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Add Course Information</h5>
              @if(session()->has('alert.message'))
            <div class="alert alert-{{ session('alert.status') }} no-border">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">{{ session('alert.message') }}</span> 
            </div>
            @endif
            </div>
            
            <div class="panel-body">
              {!! Form::open(['url'=>route('course_store'),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Course Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="title" placeholder="Enter Course Name" value="">
                      @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2">Course Code</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="course_code" placeholder="Enter Course Code" value="">
                      @if ($errors->has('course_code'))
                      <span class="help-block">
                          <strong>{{ $errors->first('course_code') }}</strong>
                      </span>
                    @endif
                    </div> 
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Course Type</label>
                    <div class="col-lg-10">
                        <select name="course_type" class="form-control">
                            <option value="" >Select Course Type</option>
                           @foreach($course_types as $course_type)
                            <option value="{{$course_type->id}}">{{$course_type->course_type}}</option>
                            @endforeach 
                        </select>
                        @if ($errors->has('course_type'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('course_type') }}</strong>
                              </span>
                            @endif
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Course Credit</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="course_credit" placeholder="Enter Course Credit" value="">
                       @if ($errors->has('course_credit'))
                      <span class="help-block">
                          <strong>{{ $errors->first('course_credit') }}</strong>
                      </span>
                    @endif
                    </div>  
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Course Syllabus</label>
                    <div class="col-lg-10">
                      <textarea type="text" class="form-control" name="course_syllabus" placeholder="Enter Course Syllabus" value="" >  </textarea>
                       @if ($errors->has('course_syllabus'))
                      <span class="help-block">
                          <strong>{{ $errors->first('course_syllabus') }}</strong>
                      </span>
                    @endif
                    </div>   
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Semester</label>
                    <div class="col-lg-10">
                        <select name="semester" class="form-control">
                            <option value="">Select Semester</option>
                            @foreach($semesters as $semester)
                            <option value="{{$semester->id}}">{{$semester->semester_id}}</option>
                            @endforeach   
                        </select>
                        @if ($errors->has('semester'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('semester') }}</strong>
                              </span>
                            @endif
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Programme Type</label>
                    <div class="col-lg-10">
                        <select name="programme_type" class="form-control">
                            
                            <option value="">Select Programme</option>
							             @foreach($programmes as $programme)
                            <option value="{{$programme->id}}">{{$programme->programme_type}}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('programme_type'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('programme_type') }}</strong>
                              </span>
                            @endif
                      </div>
                  </div>
                  
                 </fieldset>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
@endsection