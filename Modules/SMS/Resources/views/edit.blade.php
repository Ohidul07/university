@extends('layouts.master')
@section('content')
<div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Edit Student Information</h5>
            </div>

            <div class="panel-body">
              {!! Form::open(['url'=>route('student-update',['id'=>$user->id]),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                      <input type="file" class="file-styled" name="photo_url">
                    </div>
                    @if($student->photo_url != null)
                    <img style="height: 200px;width: 200px;text-align: center; " src="{{ url('images/'.$student->photo_url) }}">
                    @endif
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label col-lg-2">First Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}">
                    </div>
                    @if ($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                    @endif
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2">Second Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="second_name" placeholder="Enter Second Name" value="{{ $user->second_name }}">
                    </div>
                    @if ($errors->has('second_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('second_name') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                    </div>
                    @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Gender</label>
                    <div class="col-lg-10">
                      @if($student->gender == 'male')
                      <input type="radio" name="gender" value='male' checked="checked">
                      @else
                      <input type="radio" name="gender" value='male' >
                      @endif
                      Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                      @if($student->gender == 'female')
                      <input type="radio" name="gender" value='female' checked="checked">
                      @else
                      <input type="radio" name="gender" value='female' >
                      @endif
                      Female
                    </div>
                    @if ($errors->has('gender'))
                      <span class="help-block">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Student ID</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  value="{{$student->student_id}}" name="student_id" placeholder="Enter Student Id">
                    </div>
                    @if ($errors->has('student_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('student_id') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Mobile No</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  value="{{$student->mobile_no}}" name="mobile_no" placeholder="Enter Mobile No">
                    </div>
                    @if ($errors->has('mobile_no'))
                      <span class="help-block">
                          <strong>{{ $errors->first('mobile_no') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Present Adddress</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="{{$student->present_address}}" name="present_address" placeholder="Enter Present Address">
                    </div>
                    @if ($errors->has('present_address'))
                      <span class="help-block">
                          <strong>{{ $errors->first('present_address') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Permanent Adddress</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="{{$student->permanent_address}}" name="permanent_address" placeholder="Enter Permanent Adddress">
                    </div>
                    @if ($errors->has('permanent_address'))
                      <span class="help-block">
                          <strong>{{ $errors->first('permanent_address') }}</strong>
                      </span>
                    @endif
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Parents Mobile No</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  value="{{$student->parents_mobile_no}}" name="parents_mobile_no" placeholder="Enter Parents Mobile No">
                    </div>
                    @if ($errors->has('parents_mobile_no'))
                      <span class="help-block">
                          <strong>{{ $errors->first('parents_mobile_no') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Start Date</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="{{$student->start_date}}"  name="start_date" placeholder="Enter Start Date">
                    </div>
                    @if ($errors->has('start_date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('start_date') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">End Date</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="{{$student->end_date}}"  name="end_date" placeholder="Enter End Date">
                    </div>
                    @if ($errors->has('end_date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('end_date') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Programme Type</label>
                    <div class="col-lg-10">
                        <select name="programme_type" class="form-control">
                            <option value="">Select Programme</option>
                            @if($student->programme_type == 'bsc')
                            <option value="bsc" selected>BSc(Engg)</option>
                            @else
                            <option value="bsc">BSc(Engg)</option>
                            @endif
                            @if($student->programme_type == 'msc')
                            <option value="msc" selected>MSc(Engg)</option>
                            @else
                            <option value="msc">MSc(Engg)</option>

                            @endif
                           
                        </select>
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