@extends('layouts.master')
@section('content')
<div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Edit Teacher Information</h5>
            </div>

            <div class="panel-body">
              {!! Form::open(['url'=>route('teacher-update',['id'=>$user->id]),'method'=>'POST', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                      <input type="file" class="file-styled" name="photo_url">
                    </div>
                    @if($teacher->photo_url != null)
                    <img style="height: 200px;width: 200px;text-align: center; " src="{{ url('images/'.$teacher->photo_url) }}">
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
                      @if($teacher->gender == 'male')
                      <input type="radio" name="gender" value='male' checked="checked">
                      @else
                      <input type="radio" name="gender" value='male' >
                      @endif
                      Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                      @if($teacher->gender == 'female')
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
                    <label class="control-label col-lg-2">Designation</label>
                    <div class="col-lg-10">
                        <select name="designation" class="form-control">
                            <option value="">Select</option>
                            @if($teacher->designation == 'lecturer')
                            <option value="lecturer" selected>Lecturer</option>
                            @else
                           <option value="lecturer">Lecturer</option>
                            @endif
                            @if($teacher->designation == 'assistant_professor')
                            <option value="assistant_professor" selected>Assistant Professor</option>
                            @else
                           <option value="assistant_professor">Assistant Professor</option>
                            @endif
                            @if($teacher->designation == 'associate_professor')
                            <option value="associate_professor" selected>Associate Professor</option>
                            @else
                           <option value="associate_professor">Associate Professor</option>
                            @endif
                            @if($teacher->designation == 'professor')
                            <option value="professor" selected>Professor</option>
                            @else
                           <option value="professor">Professor</option>
                            @endif 
                        </select>
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-2">Mobile No</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  value="{{$teacher->mobile_no}}" name="mobile_no" placeholder="Enter Mobile No">
                    </div>
                    @if ($errors->has('mobile_no'))
                      <span class="help-block">
                          <strong>{{ $errors->first('mobile_no') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">About Teacher</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="{{$teacher->write_cv}}" name="write_cv" placeholder="Write something about himself">
                    </div>
                    @if ($errors->has('write_cv'))
                      <span class="help-block">
                          <strong>{{ $errors->first('write_cv') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">CV</label>
                    <div class="col-lg-10">
                      <input type="file" class="file-styled" name="cv_url">
                    </div>
                    @if($teacher->cv_url != '')
                    <a href="">download cv</a>
                    @endif
                  </div>
                 </fieldset>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
@endsection