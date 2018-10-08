<div id="sidebar" class="nav-collapse ">
	<ul class="sidebar-menu" id="nav-accordion">
	  <p class="centered"><a href="profile.html"><img src="{{ asset('images/ui-nishan.jpg') }}" class="img-circle" width="80"></a></p>
	  <h5 class="centered">Nishan Ahmed</h5>
	  <li class="mt">
		<a class="{{ Request::is('/') || Request::is('home') ? 'active' : '' }}" href="/home">
		  <i class="fa fa-dashboard"></i>
		  <span>Dashboard</span>
		  </a>
	  </li>	  	  
	  <li class="sub-menu">
		<a href="javascript:;" class="{{ Request::is('houses*') ? 'active' : '' }}">
		  <i class="fa fa-home"></i>
		  <span>Houses</span>
		  </a>
		<ul class="sub">
		  <li class="{{ Request::is('houses') ? 'active' : '' }}"><a href="{{ url('houses') }}">List Houses</a></li>
		  <li><a href="{{ url('houses/create') }}">New House</a></li>
		</ul>
	  </li>
	  <li class="sub-menu">
		<a href="javascript:;" class="{{ Request::is('members*') ? 'active' : '' }}">
		  <i class="fa fa-user"></i>
		  <span>Members</span>
		  </a>
		<ul class="sub">
		  <li><a href="{{ url('members/') }}">All Members</a></li>
		  <li><a href="{{ url('tj/') }}">Thahrik-E-Jadid Members</a></li>
		  <li><a href="{{ url('wj/') }}">Waqf-E-Jadid Members</a></li>
		</ul>
	  </li>
	</ul>
</div>