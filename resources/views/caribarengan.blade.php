<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content')
<div class = "row">
  <div class="hidden-xs hidden-sm">
    <div class="col-md-4">
      <div id='calendar'></div>
    </div>
  </div>
  <div class="col-md-8">
  <!-- About Me Box -->
    <div class="box box-atas">
      <div class="box-header box1 with-border">
        <h3 class="box-title">
          <button class="btn btn-primary pull-right" style="margin-top: -8px;" onclick="addForm()">Tambah barengan</button>
        </h3>
        <div class="box-tools pull-right">
          <form class="custom-search navbar-form navbar-left">
            <input type="text" name="search" placeholder="Cari Post ... ">
          </form>
        </div>
      </div>
    <div>
    <div id="contact-table">
      @foreach($barengan as $d)    
      <div class="box box2">
      <!-- /.box-header -->
        <div class="box-body box-body-custom">
          <div class="post">
            <div class="user-block">
              <img class="img-circle" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
              <span class="username">
                <a href="#">{{$d->user->name }} </a>  
                @if(Auth::user()->name ==$d->user->name )
                <div class="btn-group pull-right custom-curret nav-right1">
                  <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a onclick="editForm('{{$d->id }}')" class="pointer-jempol"> <i class="fa fa-pencil-square-o"></i> Edit Post</a></li>
                    <li><a onclick="deleteData('{{$d->id }}')" class="pointer-jempol"> <i class="fa fa-times-circle"></i> Hapus Post</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" class="pointer-jempol"><i class="fa fa-exclamation-circle"></i> Laporkan</a></li>
                  </ul>
                </div>
                @endif
              </span>
              <span class="description"><i class="fa fa-location-arrow" title="tujuan"></i>  {{$d->tujuan}} - <i class="fa fa-clock-o"></i> {{$d->created_at->diffForHumans()}}</span>
            </div>        
            <p>
              {{ $d->content }}            
            </p>
            <ul class="list-inline">
              <li class="pull-left">
                <a class="label label-primary" title="Tempat Meeting Point"><i class="fa fa-map-marker"></i> {{$d->mepo }}</a>
                <a class="label label-primary" title="Waktu"><i class="fa fa-calendar"></i> {{$d->mulai }} - {{$d->akhir }}</a>
              </li>
              <li class="pull-right">
                <a href="#" class="link-black"><i class="fa fa-comments-o margin-r-5"></i> 
                  10
                </a>
                <button class="button-komen">komentar</button>
              </li>              
            </ul>                       
          </div>                            
        </div>
        <div class="box-komentar" style="display:none";>
            @include('layouts.form.formCommentCaribarengan')
            @foreach($d->barengancomments as $c)
              <div class="komentar-post">
                <div class="user-block">
                  <img class="img-circle" src="{{ asset('storage/' . $c->user->avatar ) }}" alt="user image">
                  
                  <span class="username usernamekoment">
                    <a href="#">{{$c->user->name }} </a>  
                    @if(Auth::user()->name ==$c->user->name )
                    
                    <div class="btn-group custom-curret nav-right-koment pull-right">
                      <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a onclick="deleteComment('{{$c->id }}')" class="pointer-jempol"><i class="fa fa-times-circle"></i> Hapus Komentar</a></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" class="pointer-jempol"><i class="fa fa-exclamation-circle"></i> Laporkan komentar</a></li>
                      </ul>
                    </div>
                    @endif
                  </span>
                  <span class="description descriptionkoment"><i class="fa fa-clock-o"></i> {{$c->created_at->diffForHumans()}}</span>
                </div>                 
                <p>{{ $c->comment }}</p>
              </div>
            @endforeach
        </div>
      </div>      
      @endforeach
    </div>
  </div>
</div>
@include('layouts.form.formCaribarengan')

<script>
  $(document).ready(function(){
      $(".button-komen").click(function(){
          $(".box-komentar").toggle();
      });
  });
</script>
@endsection