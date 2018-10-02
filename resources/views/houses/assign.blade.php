@extends('layouts.default')
@section('content')
<style>
ul.sortable {
    padding-bottom: 15px;
}

ul.sortable li:last-child {
    margin-bottom: 0px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0px;
}

.text-row {
    padding: 4px 5px;
    margin: 20px;
    background: #fff;
    box-sizing: border-box;
    border-radius: 3px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    white-space: normal;
    line-height: 5px;
	width:60%;
}

.ui-sortable-placeholder {
    visibility: inherit !important;
    background: transparent;
    border: #666 2px dashed;
}
</style>
<script>
	$(function() {
		var memberUrl = '/member/family';
		var orderUrl = '/member/order';
		$('ul[id^="sort"]').sortable(
				{
					connectWith : ".sortable",
					receive : function(e, ui) {
						var memberId = $(ui.item).data("member-id");
						var familyId = $(ui.item).parent(".sortable").data("family-id");
						$.ajax({
							url : memberUrl + '/' + memberId + '/'
									+ familyId,
							success : function(response) {
							}
						});
					},
					stop: function(event, ui) {
						var memberId = $(ui.item).data("member-id");
						var order = ui.item.index();
						order = order + 1;
						$.ajax({
							url : orderUrl + '/' + memberId + '/'
									+ order,
							success : function(response) {
							}
						});						
					}					
				}).disableSelection();
	});
</script>
<section class="wrapper">
<div class="row mt">
@for($i=1; $i<4; $i++)
	  <div class="col-md-4 col-sm-4 mb">	
		<div class="green-panel pn" style="height:400px !important;">
		  <div class="green-header">
			<h5>{{ 'FAMILY '.$i }}</h5>
		  </div>
		  <div align="center">
			<ul class="sortable ui-sortable" id="{{ 'sort'.$i }}" data-family-id="{{ $i }}">
				@if(! empty($families[$i])) 
					@foreach ($families[$i] as $member) 																					
						<li class="text-row ui-sortable-handle" data-member-id="{{ $member -> id }}" >{{ $member -> name }}</li>											
					@endforeach
				@endif
			</ul>			
		  </div>			
		</div>	
	  </div>
@endfor
</div>
</section>
<div align="center">
	<a href="/house/{{$house->id}}" class="btn btn-primary"><i class="fa fa-long-arrow-left"></i>&nbsp;Go Back</a>
</div>
@stop
