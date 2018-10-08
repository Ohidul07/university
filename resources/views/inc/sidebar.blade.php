<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<li class="active"><a href="{{ url('dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
					<li>
						<a href="#"><i class="icon-stack2"></i> <span>SMS</span></a>
						<ul>
							<li><a href="{{ url('sms/approved-student') }}">Approved Student</a></li>
							<li><a href="{{ url('sms/pending-student')}}">Pending Student</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-copy"></i> <span>TMS</span></a>
						<ul>
							<li><a href="{{ url('tms/approved-teacher') }}">Approved Teacher</a></li>
							<li><a href="{{ url('tms/pending-teacher') }}" id="layout3">Pending Teacher</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-stack"></i> <span>COURSES</span></a>
						<ul>
							<li><a href="{{ url('/courses') }}">Add Course</a></li>
							<li><a href="{{ url('/courses/informations') }}">Course Informations</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-stack"></i> <span>EXAMINATIONS</span></a>
						<ul>
							<li><a href="{{ url('/examinations') }}">Add Examination</a></li>
							<li><a href="{{ url('/examinations/informations') }}">Examination Informations</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-stack"></i> <span>MARKS</span></a>
						<ul>
							<li><a href="{{ url('/marks') }}">Marks Entry</a></li>
							<li><a href="{{ url('/marks_show_by_exam_and_course') }}">Marks Show</a></li>
							<li><a href="{{ url('/search_student') }}">Search A Student</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>