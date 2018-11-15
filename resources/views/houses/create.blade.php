@extends('layouts.default')
@section('content')
@if (session('error'))
<script>	
	bootbox.alert({
		message: '{{ session("error") }}'
	});
</script>
@endif
<section class="wrapper">
	<h2><i class="fa fa-home" style="margin-right:.5em;"></i>New House</h3>
	<div class="row mt">
		<div class="col-lg-8">
			<div class="form-panel">
				<h4 class="mb"><i class="fa fa-angle-right" style="margin-right:.5em;"></i>Enter details</h4>
				<form class="form-horizontal style-form"  action="/houses" method="post">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Address</label>
						<div class="col-sm-8">
							<input type="text" name="address" class="form-control" required>
						</div>
					</div>					
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Create</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@stop