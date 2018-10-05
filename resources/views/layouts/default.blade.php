<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<section id="container">
@if(Auth::check())
	@include('includes.header')
    <aside>
      <div id="sidebar" class="nav-collapse ">
			@include('includes.sidebar')
      </div>
	</aside>
@endif
	<section id="main-content">
      <section class="wrapper">
            @yield('content')
      </section>
	</section>  	
</div>
</body>
<footer>
<a href="https://seal.beyondsecurity.com/vulnerability-scanner-verification/kannurtown.website"><img src="https://seal.beyondsecurity.com/verification-images/kannurtown.website/vulnerability-scanner-2.gif" alt="Website Security Test" border="0"></a>
</footer>
</html>
