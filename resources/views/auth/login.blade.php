@extends('layouts.default')
@section('content')
  <div id="login-page">

  <div class="panel-heading">
		@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach
		@if (session('status'))
			<div class="alert alert-danger">
				{{ session('status') }}
			</div>
		@endif
	</div>  

    <div class="container">
      <form class="form-login" role="form" method="POST" action="{{ route('login') }}">
	  {{ csrf_field() }}
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
		  <br/><br/>
          <input type="text" name="email" required class="form-control" placeholder="Email" autofocus>
          <br/><br/>
          <input type="password" name="password" required class="form-control" placeholder="Password">
		  <br/><br/><br/><br/><br/><br/><br/><br/>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>
      </form>
    </div>
  </div>
