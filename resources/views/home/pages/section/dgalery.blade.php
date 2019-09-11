@extends('home.pages.template')
@section('mainhome')
<section id="pagetitle" class="pagetitle dark secondary-color-bg" style="background-image:url({{asset('/img/header.jpg')}});">
	<div class="container">
		<h1 class="pagetitle-title heading">{{$data->judul}}</h1>	
</div>
</section>
<div id="main" class="main" style="background: #fff;">
	<div class="container">
		<img src="{{asset('/upload/galery/'.$data->file)}}" class="single-image wp-post-image" alt="image" style="width: 100%; height:600px">		<section id="content" class="content">
			<div id="post-2576" class="post-2576 cpo_portfolio type-cpo_portfolio status-publish has-post-thumbnail hentry post-has-thumbnail">
				<div class="page-content">
					{!! $data->isi !!}
				</div>
			</div>
			<div id="comments" class="comments">
		
</div>				
</section>
@include('home.include.menuright')

		<div class="clear"></div>
	</div>
</div>
@endsection