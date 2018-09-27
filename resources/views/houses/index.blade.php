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
                      <th style="width:20%;">House Name</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
				  @foreach($houses as $house)
                    <tr>
                      <td>{{ $house -> name }}</td>
                      <td>{{ $house -> address }}</td>
                    </tr>
				  @endforeach	
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
@stop
