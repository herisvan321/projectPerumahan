@extends('home.pages.template')
@section('mainhome')
<style type="text/css">
	.isi li{
		list-style: none;
		font-size: 14px;
		border-bottom: 1px solid #dfdfdf;
		margin-left: -5px;
	}
</style>
<section id="pagetitle" class="pagetitle dark secondary-color-bg" style="background-image:url({{asset('/img/header.jpg')}});">
	<div class="container">
		<h1 class="pagetitle-title heading">Harga. </h1>	
</div>
</section>
<div id="main" class="main" >
	<div class="container"  >
		<section id="" class="">
			<div class="w3-row-padding" >
				@foreach($data as $dat)
				<div class="w3-col m3 " style="margin-bottom: 15px;">
					<div id="rpt_pricr" class="rpt_plans rpt_6_plans rpt_style_basic">
				<div class="page-content">
					<div class=" rpt_xxsm_price rpt_sm_features"><div class="rpt_plan   rpt_plan_0  "
					><div class="rpt_title rpt_title_0">{{$dat->judul}}</div><div class="rpt_head rpt_head_0">
					<div class="rpt_price rpt_price_0"><span class="rpt_currency">Rp.</span>{{$dat->harga}}</div></div>
					<div class="rpt_features rpt_features_0 isi">
						{!!$dat->isi!!}
					</div>
					<a target="_self" style="background:#a800ff;" class="rpt_foot rpt_foot_0"></a></div>
				</div>
				</div>
				<div style="clear:both;">
				</div>
			</div>
				</div>
				@endforeach
			</div>
			
	</section>
	</div>
</div>
@endsection