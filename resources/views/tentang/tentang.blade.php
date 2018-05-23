@extends('layouts.master')

@section('content')
<div class = "row">
     
  
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
               <a type="button" class="icon-change-foto" data-toggle="modal" data-target="#modal-edit-foto">
                    <i class="fa fa-camera" data-toggle="tooltip" title="Ubah-foto sampul & profile"></i>
                </a>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ asset('storage/' . auth()->user()->avatar) }}') center center;">
              <h4 class="widget-user-username">{{ Auth::user()->name }} </h4>
              <h6 class="widget-user-desc">{{ Auth::user()->pekerjaan}}</h6>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="sosmed">
                    <a href="#"><i class="fa fa-facebook"></i></a> 
                    <a href="#"><i class="fa fa-twitter"></i></a> 
                    <a href="#"><i class="fa fa-instagram"></i></a> 
                    <a href="#"><i class="fa fa-google"></i></a> 
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">SALES</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">13,000</h5>
                            <span class="description-text">FOLLOWERS</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">PRODUCTS</span>
                        </div>
                    </div>
                </div>
                <hr class"hidden-xs">
                <a href="{{route('tentang')}}" class="btn btn-primary col-md-5"><b><i class="fa fa-user"></i> Tentang</b></a>
                <a href="{{route('galeri')}}" class="btn btn-primary col-md-5 pull-right"><b><i class="fa fa-image"></i> Galery</b></a>
               
              <!-- /.row -->
            </div>
        </div>       
    </div>
    
    <div class="col-md-8">

          <!-- /.box -->
        <!-- About Me Box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tentang</h3>
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-sm btn-default " data-toggle="modal" data-target="#modal-edit-tentang">
                        <i class ="fa fa-pencil text-red"></i> Ubah profile
                    </button>
                </div>
                 
            </div> 
             <div class="box">
                <div class="box-body hr-tentang">
                    <strong><i class="fa fa-user margin-r-5"></i> Username</strong>

                    <p class="text-muted">
                        {{ Auth::user()->name}}
                    </p>
                    
                    <hr>
                    
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                    <p class="text-blue">
                        {{ Auth::user()->email}}
                    </p>
                    <hr>
                    
                    <strong><i class="fa fa-book margin-r-5"></i> Pekerjaan</strong>
                    <p class="text-muted">
                        {{ Auth::user()->pekerjaan}}
                    </p>
                    <hr>
                    
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                    <p class="text-muted">
                        {{ Auth::user()->alamat}}
                    </p>
                    <hr>

                    <strong><i class="fa fa-play margin-r-5"></i> Hobby</strong>
                    <p>
                    <span class="label label-danger"> {{ Auth::user()->hobby}}</span>
                    </p>
                    <hr>

                    <strong><i class="fa fa-address-book-o margin-r-5"></i> Kontak</strong>
                    <p>
                    <span class="label label-primary"> {{ Auth::user()->contact}}</span>
                    </p>
                    <hr>
                    
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Bio</strong>
                    <div class="attachment">{{ Auth::user()->bio}}</div>

                   
                </div>            
            </div>
        
        </div>
    </div>
</div>
<!-- Modal edit Foto-->
<div class="modal fade" id="modal-edit-foto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> <!-- Jangan lupa multiprat -->
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Pilih Foto:</label>
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" width="100">
                            <input type="file" name="avatar" class="form-control" value="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<!-- /.modal-->

<!-- Modal edit tentang-->
<div class="modal fade" id="modal-edit-tentang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Edit</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="">
                    {{csrf_field()}}
                    <div class = "box-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{old('pekerjaan') ?? auth()->user()->pekerjaan }}">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="hobby">
                                <option selected value="{{old('name') ?? auth()->user()->agama }}">{{old('agama') ?? auth()->user()->agama }}</option>
                                <option value="islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="agama" id="agama" value=""> -->
                        </div>
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input type="text" class="form-control" name="hobby" id="hobby" value="{{old('hobby') ?? auth()->user()->hobby }}">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="contact" id="contact" value="{{old('contact') ?? auth()->user()->contact }}">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{old('alamat') ?? auth()->user()->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" class="form-control" id="bio">{{old('bio') ?? auth()->user()->bio }}</textarea>
                        </div>
                    </div>
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<!-- /.modal-->

@endsection