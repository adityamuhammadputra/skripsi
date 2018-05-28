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
        <div class="box-body">
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
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
          <!-- /.user-block -->
        
            <p>
            {{ $d->content }}
            
            </p>
            <ul class="list-inline">
            <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a>
              </li>
              <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
            </ul>

            @include('layouts.form.formCommentCaribarengan')
            @foreach($d->barengancomments as $c)
              {{$c->comment}}

                                   
              <a onclick="deleteComment('{{$c->id }}')" class="pointer-jempol"> <i class="fa fa-times-circle"></i> Hapus komen</a>
            @endforeach
          </div>                 
        </div>
      </div>      
      @endforeach
    </div>
  </div>
</div>
@include('layouts.form.formCaribarengan')

@endsection