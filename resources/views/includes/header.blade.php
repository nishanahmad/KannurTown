<header class="header black-bg">
  <div class="sidebar-toggle-box">
	<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>  
  <a href="{{ url('home') }}" class="logo"><b>Kannur<span>Town</span></b></a>

  
  <div class="nav notify-row" id="top_menu">
	<!--  notification start -->
	<ul class="nav top-menu">
	  <!-- notification dropdown start-->
	  <li id="header_notification_bar" class="dropdown">
		<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
		  <i class="fa fa-bell-o"></i>
		  <span class="badge bg-theme">1</span>
		  </a>
		<ul class="dropdown-menu extended notification">
		  <div class="notify-arrow notify-arrow-green"></div>
		  <li>
			<p class="green">You have 1 new notifications</p>
		  </li>
		  <li>
			<a href="index.html#">
			  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
			  Server Overloaded.
			  <span class="small italic">4 mins.</span>
			  </a>
		  </li>
			<a href="index.html#">See all notifications</a>
		  </li>
		</ul>
	  </li>
	  <!-- notification dropdown end -->
	</ul>
	<!--  notification end -->
  </div>
  <div class="top-menu">
	<ul class="nav pull-right top-menu">
	  <li><a class="logout" <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
	  </li>
	</ul>
  </div>
</header>