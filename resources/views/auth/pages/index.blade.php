@extends('auth.template')
@section('mainhome')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-3">
	        <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-tasks"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{@count($slideshow)}}</div>
                    <div class="widget-title">Total</div>
                    <div class="widget-subtitle">Slide Show</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
            </div>
	    </div>
	    <div class="col-md-3">
	        <div class="widget widget-default widget-item-icon" >
	            <div class="widget-item-left">
	                <span class="fa fa-briefcase"></span>
	            </div>                             
	            <div class="widget-data">
	                <div class="widget-int num-count">{{@count($type)}}</div>
	                <div class="widget-title">Total</div>
	                <div class="widget-subtitle">Type Rumah</div>
	            </div>      
	            <div class="widget-controls">                                
	                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
	            </div>
	        </div>     
	    </div>
	    <div class="col-md-3">
	        <div class="widget widget-default widget-item-icon" >
	            <div class="widget-item-left">
	                <span class="fa fa-picture-o"></span>
	            </div>
	            <div class="widget-data">
	                <div class="widget-int num-count">{{@count($galery)}}</div>
	                <div class="widget-title">Total</div>
	                <div class="widget-subtitle">Galery</div>
	            </div>
	            <div class="widget-controls">                                
	                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
	            </div>                            
	        </div>  
	    </div>
	    <div class="col-md-3">
	        <div class="widget widget-default widget-padding-sm">
	            <div class="widget-big-int plugin-clock">00:00</div>
	            <div class="widget-subtitle plugin-date">Loading...</div>
	            <div class="widget-controls">                                
	                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
	            </div>                            
	            <div class="widget-buttons widget-c3">
	                <div class="col">
	                    <a href="#"><span class="fa fa-clock-o"></span></a>
	                </div>
	                <div class="col">
	                    <a href="#"><span class="fa fa-bell"></span></a>
	                </div>
	                <div class="col">
	                    <a href="#"><span class="fa fa-calendar"></span></a>
	                </div>
	            </div>                            
	        </div>   
	    </div>
	     <div class="col-md-12" >
	     		
	     	 <div class="col-md-12">
		        <div class="panel panel-info">
		            <div class="panel-heading ui-draggable-handle">
		               <i class="fa fa-bar-chart-o"></i> Visitor
		            </div>
		            <div class="panel-body">
		            </div>
		            <div class="panel-body list-group">
		<div class="col-md-3" >
			<form action="{{url('/index')}}" method="get">
				@csrf
				<select class="form-control" name="cari" onchange="this.form.submit()">
					@php($bulan = '')
					@foreach($datacombo as $datac)
            			<option value="{{ $datac->tahun }}-{{ sprintf('%02s', $datac->bulan) }}" <?php if($datac->tahun.'-'.sprintf('%02s', $datac->bulan) == $cekbulanvalue) echo 'selected="selected"'; ?>>
            				  @if($datac->bulan == '1')
			                    @php($bulan = 'Januari')
			                  @elseif($datac->bulan == '2')
			                    @php($bulan = 'Februari')
			                  @elseif($datac->bulan == '3')
			                    @php($bulan = 'Maret')
			                  @elseif($datac->bulan == '4')
			                    @php($bulan = 'April')
			                  @elseif($datac->bulan == '5')
			                    @php($bulan = 'Mai')
			                  @elseif($datac->bulan == '6')
			                    @php($bulan = 'Juni')
			                  @elseif($datac->bulan == '7')
			                    @php($bulan = 'Juli')
			                  @elseif($datac->bulan == '8')
			                    @php($bulan = 'Agustus')
			                  @elseif($datac->bulan == '9')
			                    @php($bulan = 'Sebtember')
			                  @elseif($datac->bulan == '10')
			                    @php($bulan = 'Oktober')
			                  @elseif($datac->bulan == '11')
			                    @php($bulan = 'November')
			                  @elseif($datac->bulan == '12')
			                    @php($bulan = 'Desember')
			                  @endif
            				{{ $bulan }} {{ $datac->tahun }}
            			</option>
        			@endforeach
				</select>
			</form>
		</div>
		<div class="col-md-3"></div>
		<br><br><br>
		               <div id="curve_chart" style="width: 100%; height: 350px"></div>
		                   <script type="text/javascript">
							      google.charts.load('current', {'packages':['corechart']});
							      google.charts.setOnLoadCallback(drawChart);

							      function drawChart() {
							        var data = google.visualization.arrayToDataTable([
							          ['tanggal', 'Link', 'Order'],
							          <?php foreach($cekbulan as $cb){ ?>
							          <?php 
							          	$link = DB::Table('visitor_models')
							          	->where('created_at', 'LIKE', '%'.$cb->tgl.'%')
							          	->where('jenis', 0)->get();

							          	$order = DB::Table('visitor_models')
							          	->where('created_at', 'LIKE', '%'.$cb->tgl.'%')
							          	->where('jenis', 1)->get();

							            $tahun = date('Y', strtotime($cb->tgl));
						                $bulan = date('m', strtotime($cb->tgl)) - 1;
						                $hari  = date('d', strtotime($cb->tgl)); 
						               ?>
							          [new Date(<?= $tahun.', '.$bulan.', '.$hari ?>),  <?= count($link) ?>,   <?= count($order) ?>],
							          <?php } ?>
							        ]);

							        var options = {
							          title: 'Visitor',
							          curveType: 'function',
							          legend: { position: 'bottom' },

							            vAxis: {
							              title: 'Jumlah',  scaleType: 'log' ,minValue: 0,
							              ticks: [0,50000]
							            },
							            pointSize: 5,
        								lineWidth: 3,
							        };

							        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

							        chart.draw(data, options);
							      }
							  </script>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-6">
			        <div class="panel panel-info">
			            <div class="panel-heading ui-draggable-handle">
			               <i class="fa fa-bar-chart-o"></i> Link Hari Ini
			            </div>
			            <div class="panel-body">
			            </div>
			            <div class="panel-body list-group">
			               @foreach($visitor as $linkk)
			               <a href="#" class="list-group-item"><span class="fa fa-circle-o"></span> {{$linkk->link}} 
			                    <span class="badge badge-default">{{$linkk->tambah}}</span>
			                </a>
			                @endforeach
			            </div>
			        </div>
			</div>
			<div class="col-md-6">
			        <div class="panel panel-info">
			            <div class="panel-heading ui-draggable-handle">
			               <i class="fa fa-bar-chart-o"></i> Order Hari Ini
			            </div>
			            <div class="panel-body">
			            </div>
			            <div class="panel-body list-group">
			                @foreach($order1 as $or1)
			               <a href="#" class="list-group-item"><span class="fa fa-circle-o"></span> {{$or1->link}} 
			                    <span class="badge badge-default">{{$or1->tambah}}</span>
			                </a>
			                @endforeach
			            </div>
			        </div>
			</div>
	</div>
</div>
@endsection