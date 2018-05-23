@extends('layouts.master')

@section('content')
<div class = "row">
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- <a type="button" class="icon-change-foto" data-toggle="modal" data-target="#modal-edit-foto">
                <i class="fa fa-camera" data-toggle="tooltip" title="Ubah-foto sampul & profile"></i>
            </a> -->
        <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ asset('storage/' . auth()->user()->avatar) }}') center center;">
            <h4 class="widget-user-username">{{ Auth::user()->name }} </h4>
            <h6 class="widget-user-desc">Web Designer</h6>
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
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tentang</h3>
                 <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-tentang">
                    Ubah Tentang
                </button> -->
            </div> 
            <div class="box">
                <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i> Username</strong>

                    <p class="text-muted">
                        {{ Auth::user()->name}}
                    </p>
                    <hr>
                    <strong><i class="fa fa-email margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        {{ Auth::user()->email}}
                    </p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

                    <p class="text-muted">
                        {{ Auth::user()->pendidikan}}
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

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Bio</strong>

                    <div class="attachment">{{ Auth::user()->bio}}</div>

                   
                </div>            
            </div>
        
        </div>
    </div>
    <div class="col-md-8">
           <!-- @include('galeri') -->
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
                            <label for="pendidikan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="{{old('name') ?? auth()->user()->pekerjaan }}">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="hobby">
                                <option selected value="{{old('name') ?? auth()->user()->agama }}">{{old('name') ?? auth()->user()->agama }}</option>
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
                            <input type="text" class="form-control" name="hobby" id="hobby" value="{{old('name') ?? auth()->user()->hobby }}">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" value="{{old('name') ?? auth()->user()->concact }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" class="form-control" id="bio">{{old('name') ?? auth()->user()->bio }}</textarea>
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