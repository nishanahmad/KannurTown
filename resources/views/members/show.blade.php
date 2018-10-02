@extends('layouts.default')
@section('content')
<section class="wrapper">
	<h2><i class="fa fa-user"></i>&nbsp;{{$member -> name}}</h2>
	<h3 style="margin-left:1.5em">{{$member -> category}}</h3>
	<div class="content-panel">
		<form class="form-horizontal">
			<div class="form-group" style="margin-left:1.5em">
				<label for="house" class="control-label col-xs-2">House</label>
				<div class="col-xs-10">
					<p class="form-control-static">{{ $member -> house -> name .' , '. $member -> house -> address}}</p>
				</div>
			</div>
		</form>
	</div>
</section>
<div align="center">
<br/>
<a  href="/members/create/" class="btn btn-theme"><i class="fa fa-user"></i>  New Member</a>&nbsp;&nbsp;
<br/><br/>
</div>

@stop