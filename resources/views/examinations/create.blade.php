@extends('layouts.master')
@section('content')
<div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Add Examination Information</h5>
              @if(session()->has('alert.message'))
            <div class="alert alert-{{ session('alert.status') }} no-border">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">{{ session('alert.message') }}</span> 
            </div>
            @endif
            </div>

            <div class="panel-body">
              {!! Form::open(['url'=>route('examination_store'),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Examination Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="title" placeholder="Enter Examination Name" value="">
                      @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
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


                  <div class="form-group">
                    <label class="control-label col-lg-2">Session</label>
                    <div class="col-lg-10">
                        <select name="session" class="form-control">
                            
                            <option value="">Select Session</option>
					       @foreach($sessions as $session)
                            <option value="{{$session->id}}">{{$session->session}}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('session'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('session') }}</strong>
                              </span>
                            @endif
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2">Year</label>
                    <div class="col-lg-10">
                        <select name="year" class="form-control">
                            
                            <option value="">Select Year</option>
							             @foreach($years as $year)
                            <option value="{{$year->id}}">{{$year->year}}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('year'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('year') }}</strong>
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
                  
                 </fieldset>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
@endsection