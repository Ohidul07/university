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
							<h5 class="panel-title">Search A Student Information</h5>

							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>
							
						<div class="content">

						<div class="panel-body">

							{!! Form::open(['url'=>route('show_student_cgpa'),'method'=>'GET', 'enctype' =>"multipart/form-data",'files' => true,'class' => 'form-horizontal']) !!}
								<fieldset class="content-group">

									<div class="form-group">
										<label class="control-label col-lg-2">Student Id</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="student_id" placeholder="Enter Student Id">
										</div>
									</div>	
								</fieldset>
					    </div>
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
								{!! Form::close() !!}
						</div>
					</div>
@endsection