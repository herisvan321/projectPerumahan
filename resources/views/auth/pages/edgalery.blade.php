@extends('auth.template')
@section('mainhome')
<div class="container-fluid" >
  <div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Form Type Rumah</h3>
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
            <div class=" col-md-8">
            <form action="{{url('/index/'.$data->id.'/galery/edit')}}" method="post" enctype="multipart/form-data">
              @csrf @method('put')
                <label>Judul :</label>
                <input type="text" name="judul" class="form-control" placeholder="Enter judul maksimal 100 karakter " value="{{$data->judul}}" required maxlength="100">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" >{{$data->deskripsi}}</textarea>
                <label>Isi</label>
                <textarea name="isi" id="ckeditor" class="ckeditor" >{{$data->isi}}</textarea>
                <label>Gambar</label>
                <input type="file" @change="onFileChange" name="file" class="form-control" accept="image/*">
                <i style="color: red">Ressolusi gambar width : 1620 Height : 947</i>
                <br>
                <input type="submit" value="Submit" class="btn btn-danger">
            </form>
          </div>
           <div class="col-md-4">
            <div id="preview">
              <h4>preview :</h4>
              <img v-if="url" :src="url" style="width: 100%;max-height: 400px;" />
              <img v-else src="{{asset('/upload/galery/'.$data->file)}}" style="width: 100%;max-height: 400px;" />
            </div>
          </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection