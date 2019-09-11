@extends('auth.template')
@section('mainhome')
<div class="container-fluid" >
  <div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Form Harga Rumah</h3>
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
            <div class=" col-md-12">
            <form action="{{url('/index/'.$cekdata->id.'/harga/edit')}}" method="post" enctype="multipart/form-data">
              @csrf @method('put')
                <label>Judul :</label>
                <input type="text" name="judul" class="form-control" placeholder="Enter judul maksimal 100 karakter " value="{{$cekdata->judul}}" required maxlength="100">
                <label>Harga :</label>
                <input type="text" name="harga" value="{{$cekdata->harga}}" class="form-control" placeholder="Enter Harga" required maxlength="100">
                <label>Deskripsi</label>
                <textarea name="isi" id="ckeditor" class="ckeditor" >{{$cekdata->isi}}</textarea>
                <br>
                <input type="submit" value="Submit" class="btn btn-danger">
            </form>
          </div>
          </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection