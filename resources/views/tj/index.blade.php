@extends('layouts.default')
@section('content')
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h2 style="margin-left:30px;"><i class="fa fa-home"></i> Tahrik E Jadid</h2>
			  <br/><br/>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
					  <th style="width:7%;">
                      <th style="width:20%;">Name</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
				  @foreach($list as $tj)
                    <tr>
					  <td align="center"><a href="{{ url('house/'.$tj->id) }}" class="btn btn-theme" style="padding: 0px 15px;font-size: 13px;">View</a></td>
                      <td>{{ $tj -> member -> name }}</td>
                      <td>{{ $tj -> amount }}</td>
                    </tr>
				  @endforeach	
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
@stop