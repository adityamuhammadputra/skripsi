    <div class="col-md-2">

        <!-- Profile Image -->
        
        <div class="box">
            <div class="box-body box-profile">
                <div class ="sampul" style="background:{{ Auth::user()->name }};">
                    <img class="img-responsive img-thumbnail img-rounded" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ Auth::user()->name }} </h3>

                    <p class="text-muted text-center">Mahasiswa</p>
                    <div class="sosmed">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a> 
                        <a href="#"><i class="fa fa-instagram"></i></a> 
                        <a href="#"><i class="fa fa-google"></i></a> 
                    </div>
                    
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
                
                <a href="{{route('tentang')}}" class="btn btn-primary col-md-5"><b><i class="fa fa-user"></i> Tentang</b></a>
                <a href="{{route('galeri')}}" class="btn btn-primary col-md-5 pull-right"><b><i class="fa fa-image"></i> Galery</b></a>
                
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

        
    </div>
    