@extends('layouts.default')
@section('content')
<div class="row">
	  <div class="col-lg-9 main-chart">
		<div class="row mt">
		  <!-- SERVER STATUS PANELS -->
		  <div class="col-md-4 col-sm-4 mb">
			<div class="grey-panel pn donut-chart">
			  <div class="grey-header">
				<h5>SERVER LOAD</h5>
			  </div>
			  <canvas id="serverstatus01" height="120" width="120"></canvas>
			  <div class="row">
				<div class="col-sm-6 col-xs-6 goleft">
				  <p>Usage<br/>Increase:</p>
				</div>
				<div class="col-sm-6 col-xs-6">
				  <h2>21%</h2>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	<!-- RIGHT SIDEBAR CONTENT -->
	<div class="col-lg-3 ds">
	<div class="donut-main">
	  <h4>COMPLETED ACTIONS & PROGRESS</h4>
	  <canvas id="newchart" height="130" width="130"></canvas>
	  <script>
		var doughnutData = [{
			value: 70,
			color: "#4ECDC4"
		  },
		  {
			value: 30,
			color: "#fdfdfd"
		  }
		];
		var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
	  </script>
	</div>
	</div>
</div>
@stop
