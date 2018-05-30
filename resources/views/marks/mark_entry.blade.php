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
			</div>

	        <div class="panel-body">
	        	<form action="#">
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
						<div class="col-md-2">
							<div class="form-group">
	                            <label>Class Test</label>
	                        </div>

						</div>
						<div class="col-md-2">
							<div class="form-group">
	                           <label>Attendence</label>
	                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
	                        <div class="form-group">
	                            <input type="text" class="form-control" placeholder="Student Id">
	                        </div>
						</div>
						<div class="col-md-2">
	                        <div class="form-group">
	                            <input type="text" class="form-control" placeholder="Internal Marks">
	                        </div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" placeholder="External Marks">
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" placeholder="Third Examiner">
	                        </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" placeholder="Class Test">
	                        </div>

						</div>
						<div class="col-md-2">
							<div class="form-group">
	                            <input type="text" class="form-control" placeholder="Attendence">
	                        </div>
						</div>
					</div>

	                <div class="text-right">
	                	<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
	                </div>
	            </form>
		    </div>
		</div>
	  </div>
@endsection