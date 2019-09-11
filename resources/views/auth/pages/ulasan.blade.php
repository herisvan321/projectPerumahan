@extends('auth.template')
@section('mainhome')
<div class="container-fluid" >
  <div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Form Ulasan</h3>
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah data</button>
                <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah data</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class=" col-md-8">
            <form action="{{url('/index/ulasan')}}" method="post" enctype="multipart/form-data">
              @csrf
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Enter Nama" required maxlength="100">
                <label>Ulasan</label>
                <textarea name="isi" id="ckeditor" class="ckeditor" ></textarea>
                <label>Gambar</label>
                <input type="file" @change="onFileChange" name="file" accept="image/*" class="form-control" required>
                <br>
                <input type="submit" value="Submit" class="btn btn-danger">
            </form>
          </div>
           <div class="col-md-4">
            <div id="preview" >
              <h4>preview :</h4>
              <img v-if="url" :src="url" style="width: 100%;max-height: 400px;" />
            </div>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
          <div class=" col-md-12">
             <div class="container-fluid"><br><br>
            <table class="table table-striped table-bordered datatable" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>nama</th>
                  <th>Foto</th>
                  <th>Ulasan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php($no=1)
              @foreach($data as $dt)
               <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->nama}}</td>
                <td>
                  <img src="{{asset('/upload/ulasan/'.$dt->file)}}" style="width: 200px; height: 100px;">
                </td>
                <td>
                  {!!$dt->isi!!}
                </td>
                <td>
                  <form action="{{url('/index/'.$dt->id.'/ulasan/delete')}}" method="post">
                    @csrf @method('delete')
                    <a href="{{url('/index/'.$dt->id.'/ulasan/edit')}}" class="btn btn-info">Edit</a>
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