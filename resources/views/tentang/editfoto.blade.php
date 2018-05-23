@extends('layouts.master')

@section('content')
<div class = "row">
     <div class="hidden-xs hidden-sm">
        @include('layouts.profile')
    </div>
    
    <div class="col-md-9">

          <!-- /.box -->
        <!-- About Me Box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tentang Saya</h3>
            </div>
        <!-- /.box-header -->
            <div class="box col-md-4 visible-xs visible-sm">
                <div class="box-body box-profile ">
                    <div class ="sampul" style="background:{{ Auth::user()->name }};">
                        <h4 class="text-center">{{ Auth::user()->name}}</h4>
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> <!-- Jangan lupa multiprat -->
						{{csrf_field()}}
                            <img class="profile-user-img img-responsive img-circle" src="https://cdn4.iconfinder.com/data/icons/backpack-traveler-explorer/269/backpacker-self-traveler-003-512.png" alt="User profile picture">
                        </form>
                        <p class="text-muted text-center">Mahasiswa</p>

                    </div>         
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                </div>
                
            </div>
            
            <div class="box">
                <div class="box-body">
                    <div class="col-md-8">
                    <strong><i class="fa fa-name margin-r-5"></i> Username</strong>

                    <p class="text-muted">
                        {{ Auth::user()->name}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-mail margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-play margin-r-5"></i> Hobby</strong>

                    <p>
                    <span class="label label-danger">Main PS</span>
                    <span class="label label-primary">Main Wanita</span>
                    <span class="label label-warning">Main-Main</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Bio</strong>

                    <p>Yang penting makan udah alhamdulillah kok hehehe</p>
                    </div>

                    <div class="col-md-4 visible-md visible-lg">
                        <div class ="sampul" style="background:{{ Auth::user()->name }};">
                            <h4 class="text-center">{{ Auth::user()->name}}</h4>
                            <img class="profile-user-img img-responsive img-circle" src="https://cdn4.iconfinder.com/data/icons/backpack-traveler-explorer/269/backpacker-self-traveler-003-512.png" alt="User profile picture">
                            <p class="text-muted text-center">Mahasiswa</p>
                        </div>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                    
                    </div>
                </div>            
            </div>
        
        </div>
    </div>
</div>
@endsection