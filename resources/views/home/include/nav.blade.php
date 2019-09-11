<ul id="menu-main" class="menu-main">
	<li id="menu-item-2148" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item">
		<a href="{{url('/')}}">
			<span class="menu-link">
				<span class="menu-title">Home</span>
			</span>
		</a>
	</li>
	<li id="menu-item-2145" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-has-children ">
		<a href="#">
			<span class="menu-link">
				<span class="menu-title">TYPE</span>
			</span>
		</a>
		<ul  class="sub-menu">
			@php($type = DB::table('type_rumah_models')->orderBy('judul', 'desc')->get())
			@foreach($type as $ty)
			<li  class="menu-item menu-item-type-post_type menu-item-object-page">
				<a href="{{url('/detail/type/'.$ty->slug)}}">
					<span class="menu-link">
						<span class="menu-title">{{$ty->judul}}</span>
					</span>
				</a>
			</li>
			@endforeach
		</ul>
	</li>
	<li id="menu-item-2234" class="menu-item menu-item-type-post_type menu-item-object-page">
		<a href="{{url('/harga')}}">
			<span class="menu-link">
				<span class="menu-title">Harga</span>
			</span>
		</a>
	</li>
	<li id="menu-item-2147" class="menu-item menu-item-type-custom menu-item-object-custom">
		<a href="{{url('/kontak')}}">
			<span class="menu-link">
				<span class="menu-title">Kontak</span>
			</span>
		</a>
	</li>
	<li id="menu-item-2559" class="menu-item menu-item-type-post_type menu-item-object-page">
		<a href="{{url('/lokasi')}}">
			<span class="menu-link">
				<span class="menu-title">Lokasi</span>
			</span>
		</a>
	</li>
</ul>