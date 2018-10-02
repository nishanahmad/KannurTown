@extends('layouts.default')
@section('content')
<section class="wrapper">
	<h2><i class="fa fa-home"></i>&nbsp;{{$house -> name}}</h2>
	<h3 style="margin-left:1.5em">{{$house -> address}}</h3>
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
								<th width="10%;">Tehrik-E-Jadid</th>
								<th width="10%;">Waqf-E-Jadid</th>
								<th width="5%;">Earning</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($members as $member)
							<tr>
								<td><a href="/member/{{ $member -> id }}"><i class="fa fa-pencil"></i></a></td>
								<td>{{ $member -> name}}</td>
								<td>{{ $member -> category}}</td>
								<td>{{ $member -> profession}}</td>
								<td>{{ $member -> education}}</td>
								<td>{{ $member -> tj}}</td>
								<td>{{ $member -> wj}}</td>
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
</section>
<div align="center">
<br/>
<a  href="/members/create/" class="btn btn-theme03"><i class="fa fa-user"></i>  New Member</a>&nbsp;&nbsp;
<a  href="/house/assign/{{ $house -> id }}" class="btn btn-theme"><i class="fa fa-exchange"></i>  ReAssign Family</a>
<br/><br/>
</div>
@stop