@extends('auth.template')
@section('mainhome')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Form Slide Show</h3>
                <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>        
                    <ul class="dropdown-menu">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                    </ul>                                        
                </li>                                        
            </ul>    
            </div>
            <div class="panel-body" id="app">
          <div class=" col-md-6">
            <form action="{{url('/index/slideshow')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="container-fluid">
                <label>Judul :</label>
                <input type="text" name="judul" class="form-control" placeholder="Enter judul maksimal 100 karakter " required maxlength="100">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="8" class="form-control" required placeholder="Enter deskripsi maksimal 191 karakter " maxlength="191"></textarea>
                <label>Gambar</label>
                <input type="file" @change="onFileChange" name="file" class="form-control" accept="image/*" required>
                <i style="color: red">Ressolusi gambar width : 1620 Height : 947</i>
                <br>
                <input type="submit" value="Submit" class="btn btn-danger">
              </div>
            </form>

          </div>
          <div class="col-md-6">
            <div id="preview" >
              <h4>preview :</h4>
              <img v-if="url" :src="url" style="width: 100%;max-height: 400px;" />
            </div>
          </div>
           
          <div class=" col-md-12">
             <div class="container-fluid"><br><br>
            <table class="table table-striped table-bordered datatable" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi </th>
                  <th>Gambar</th>
                  <th>Tgl Post</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @php($no=1)
              @foreach($data as $dt)
               <tr>
               	<td>{{$no++}}</td>
               	<td>{{$dt->judul}}</td>
               	<td>{{$dt->deskripsi}}</td>
               	<td>
               		<img src="{{asset('/upload/slide/'.$dt->file)}}" style="width: 200px; height: 100px;">
               	</td>
               	<td>
               		{{date('d F Y', strtotime($dt->created_at))}}
               	</td>
               	<td>
               		<form action="{{url('/index/'.$dt->id.'/slideshow/delete')}}" method="post">
               			@csrf @method('delete')
               			<a href="{{url('/index/'.$dt->id.'/slideshow/edit')}}" class="btn btn-info">Edit</a>
               			<button class="btn btn-danger" type="submit">Hapus</button>
               		</form>
               	</td>
               </tr>
               @endforeach
              </tbody>
            </table>
        </div>
          </div>
           
            </div>
        </div>
    </div>
  </div>
</div>
@endsection