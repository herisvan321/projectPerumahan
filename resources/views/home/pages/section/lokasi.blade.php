@extends('home.pages.template')
@section('mainhome')
<style type="text/css">
	.isi li{
		list-style: none;
		font-size: 14px;
		border-bottom: 1px solid #000;
		margin-left: -5px;
	}
</style>
<section id="pagetitle" class="pagetitle dark secondary-color-bg" style="background-image:url({{asset('/img/header.jpg')}});">
	<div class="container">
		<h1 class="pagetitle-title heading">Lokasi. </h1>	
</div>
</section>
<div id="main" class="main" >
	<div class="container">
		<section id="" class="" style="padding:10px; background: #fff">
			<h2>Alamat Kantor Pemasaran Al Azam Property</h2>
			<p>Jl. Raya Kurao No 243, RT. 003, RW. 019, Kel. Surou Gadang, Kec. Naggalo, Kota Padang </p>
			<p>Kode Pos 25146</p>
			<p>
				<h3>Lokasi Perumahan Pertama</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.37608574501!2d100.38235131475354!3d-0.853083299377667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwNTEnMTEuMSJTIDEwMMKwMjMnMDQuMyJF!5e0!3m2!1sen!2sid!4v1563871285630!5m2!1sen!2sid" style="width: 100%; height: 500px;" frameborder="0" style="border:0" allowfullscreen></iframe> <br>
				<h3>Lokasi Perumahan Kedua</h3> 
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.37608574501!2d100.38235131475354!3d-0.853083299377667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwNTEnMTEuMSJTIDEwMMKwMjMnMDQuMyJF!5e0!3m2!1sen!2sid!4v1563871166926!5m2!1sen!2sid" style="width: 100%; height: 500px;" frameborder="0" style="border:0" allowfullscreen></iframe>
			</p>
		</section>
	</div>
</div>
@endsection