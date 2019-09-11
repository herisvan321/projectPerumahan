@extends('auth.template')
@section('mainhome')
<div class="container-fluid">

	     <div class="col-md-12" >
	        <div class="panel panel-info">
	            <div class="panel-heading ui-draggable-handle">
	               <i class="fa fa-bar-chart-o"></i> {{$pesan}} Perbulan
	            </div>
	            <div class="panel-body">
	            			<div class="col-md-3" >
			<form action="{{url('/index/statistik/'.$slug)}}" method="get">
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
	            </div>
	            <div class="panel-body list-group">
	               @foreach($data as $linkk)
	               <a href="#" class="list-group-item"><span class="fa fa-circle-o"></span> {{$linkk->link}} 
	                    <span class="badge badge-default">{{$linkk->tambah}}</span>
	                </a>
	                @endforeach
	            </div>
	        </div>
		</div>
</div>
@endsection