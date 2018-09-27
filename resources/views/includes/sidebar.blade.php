<ul class="sidebar-menu" id="nav-accordion">
  <p class="centered"><a href="profile.html"><img src="{{ asset('images/ui-nishan.jpg') }}" class="img-circle" width="80"></a></p>
  <h5 class="centered">Nishan Ahmed</h5>
  <li class="sub-menu">
	<a href="javascript:;">
	  <i class="fa fa-home"></i>
	  <span>Houses</span>
	  </a>
	<ul class="sub">
	  <li><a href="{{ url('houses/index') }}">List Houses</a></li>
	  <li><a href="{{ url('houses/create') }}">New House</a></li>
	</ul>
  </li>
  <li class="sub-menu">
	<a href="javascript:;">
	  <i class="fa fa-user"></i>
	  <span>Members</span>
	  </a>
	<ul class="sub">
	  <li><a href="{{ url('members/index') }}">List Members</a></li>
	  <li><a href="{{ url('members/create') }}">New Member</a></li>
	</ul>
  </li>
</ul>