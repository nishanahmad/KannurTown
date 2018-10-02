@extends('layouts.default')
@section('content')
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Houses</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
					  <th style="width:7%;">
                      <th style="width:20%;">House Name</th>
                      <th>Address</th>
					  <th>Family Head</th>
                    </tr>
                  </thead>
                  <tbody>
				  @foreach($houses as $house)
                    <tr>
					  <td align="center"><a href="{{ url('house/'.$house->id) }}" class="btn btn-theme" style="padding: 0px 15px;font-size: 13px;">View</a></td>
                      <td>{{ $house -> name }}</td>
                      <td>{{ $house -> address }}</td>
					  @if(isset($houseMap[$house->id]))
						<td>{{ $houseMap[$house->id] }}</td>
					 @else
						 <td></td>
					 @endif
                    </tr>
				  @endforeach	
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
@stop
