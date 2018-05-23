@extends('layouts.master')

@section('content')
<div class = "row">
    <div class="hidden-xs hidden-sm">
        @include('layouts.profile')
    </div>
    
    <div class="col-md-8">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Koleksi Saya</h3>
            </div>
            <div class="box-body">
                <div class="col-sm-6">
                    <img class="img-responsive" src="http://www.nationsonline.org/gallery/Indonesia/Borobudur-Sunrise-and-Merapi-Volcano-.jpg" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <div class="row">
                    <div class="col-sm-6">
                        <img class="img-responsive" src="http://cdn2.tstatic.net/travel/foto/bank/images/indonesia_20170208_165933.jpg" alt="Photo">
                        <br>
                        <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQglbu21DT9U28TXA72zMAK8-OrzWTMgggAdAQ0Yj4wvM9vratYUw" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7bhCx0LA9oV6CO-itM1fAyHmRofDEvR1JjH__7oFcJk5N40X7" alt="Photo">
                        <br>
                        <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHMRMVS7v-4NoIwLZDxPNyF4fNLUSKkz3jSmjZB8C1ChxeV3f4" alt="Photo">
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection