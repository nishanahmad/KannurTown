@extends('layouts.default')
@section('content')
@if (session('error'))
<script>	
	bootbox.alert({
		message: "Cannot delete houses with members present!!",
	});
</script>
@endif
@if (session('success'))
<script>	
	BootstrapAlert.success({
		title: "Success!",
		message: '{{ session("success") }}'
	});
</script>
@endif    
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$(".changeName").click(function(){
			bootbox.prompt("Enter the new name for this house", function(result){
				$.ajax({
					url: '/houses/updateName',
					type: 'POST',
					data: {_token: CSRF_TOKEN, name:result, id:{{$house -> id }} },
					dataType: 'JSON',
					success: function (data) {
						if(data.status == 'success')
							$("#name").load(" #name");
						else
							bootbox.alert('Cannot update address. Please contact admin !!!');						
					}
				});				
			});
		});
		
		$(".changeAddress").click(function(){
			bootbox.prompt("Enter the new address for this house", function(result){
				$.ajax({
					url: '/houses/updateAddress',
					type: 'POST',
					data: {_token: CSRF_TOKEN, address:result, id:{{$house -> id }} },
					dataType: 'JSON',
					success: function (data) {
						if(data.status == 'success')
							$("#address").load(" #address");
						else
							bootbox.alert('Cannot update address. Please contact admin !!!');
					}
				});				
			});
		});		
   });    
</script>
<section class="wrapper">
	<h2 style="color:black;"><i class="fa fa-home"></i>&nbsp;<label id="name">{{$house -> name}}</label>&nbsp;&nbsp;&nbsp;<a href="#" class="changeName"><i class="fa fa-pencil" style="color:black;"></i></a></h2>
	<h3 style="margin-left:1.5em;color:black;"><label id="address">{{$house -> address}}</label>&nbsp;&nbsp;&nbsp;<a href="#" class="changeAddress"><i class="fa fa-pencil" style="color:black;"></i></a></h3>
	@if (isset($families))
	@foreach ($families as $members)
		<div class="row mt">
			<div class="content-panel">
				<h4><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Family {{ $members[0] -> family_id }}</h4>
				<section id="unseen">
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th width="2%;"></th>
								<th width="20%;">&nbsp;&nbsp;Name</th>
								<th width="10%;">Category</th>
								<th width="10%;">Profession</th>
								<th width="10%;">Education</th>
								<th width="5%;">Earning</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($members as $member)
							<tr>
								<td><a href="/members/{{ $member -> id }}"><i class="fa fa-pencil"></i></a></td>
								<td>{{ $member -> name}}</td>
								<td>{{ $member -> category}}</td>
								<td>{{ $member -> profession}}</td>
								<td>{{ $member -> education}}</td>
								@if($member -> earning)
								<td><i class="fa fa-check" style="color:#32CD32;"></i></td>
								@else
								<td></td>
								@endif
								<td>{{ $member -> remarks}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</section>
			</div>
		</div>
	@endforeach
	@endif
</section>
<div align="center">
<br/>
<div style="margin-left:35%;float:left;">
	<a  href="/members/create/" class="btn btn-theme03"><i class="fa fa-user"></i>  New Member</a>&nbsp;&nbsp;
	@if (isset($families))
		<a  href="/houses/assign/{{ $house -> id }}" class="btn btn-theme"><i class="fa fa-exchange"></i>  ReAssign Family</a>
	@endif
</div>
<div style="margin-left:1%;float:left;">
	<form id="delete_form" action="{{ url('/houses/'.$house->id)}}" method="post">
		{!! method_field('delete') !!}
		{!! csrf_field() !!}
		<button type="submit" class="btn btn-danger" id="delete">Delete House</button>	
	</form>
</div>
<div class="clearfix"></div>
@if (isset($families))
	<br/><br/><br/>
	<a href="/houses" class="btn btn-primary"><i class="fa fa-long-arrow-left"></i>&nbsp;Back to list</a>
	<br/><br/><br/>	
@endif	
<script>
$('#delete').click(function () {
	event.preventDefault();
	bootbox.confirm({
		message: "Are you sure you want to delete this house?",
		buttons: {
			confirm: {
				label: 'Yes',
				className: 'btn-success'
			},
			cancel: {
				label: 'No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if(result == false)
				return true;
			else
				$("#delete_form").submit();
		}
	});
});
</script>
</div>
@stop