@extends('layouts.master')

@section('content')
<div class = "row">
  <div class="hidden-xs hidden-sm">
    @include('layouts.profile')
  </div>
  <div class="col-md-8">
    <div class="box">

      <div class="box-header with-border">
          <h3 class="box-title">Beranda</h3>
          <div class="box-tools pull-right">
              <form class="custom-search navbar-form navbar-left">
                  <input type="text" name="search" placeholder="Cari Post ... ">
              </form>
        </div>
      </div>

      <form method="post" action="{{ route('home.store') }}" class="">
      	{{ csrf_field() }}
        <div class="form-group has-feedback {{ $errors->has('content') ? 'has-error' : '' }}">
          <textarea name="content" id="content" class="form-control"></textarea>
          @if($errors->has('content'))
            <span class="help-block">
              <p>{{ $errors->first('content') }}</p>
            </span>
          @endif
        </div>
        <div class="form-group">
	        <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
      </form>

      <!-- /.box-header -->
      <div class="box-body datapost endless-pagination" data-next-page="{{ $datapost->nextPageUrl() }}">
      		@foreach($datapost as $d)
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
              
                  <span class="username">
                    <a href="#">{{$d->user->name }} </a>
                    <form method = "POST" action="{{route('home.destroy', $d)}}">
					          {{ csrf_field() }}
					          {{ method_field('DELETE') }}
                    
                    
                      <!-- <a type="submit" class=""></a> -->
                      @if(Auth::user()->name ==$d->user->name )
                        <div class="btn-group pull-right custom-curret">
                          <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a><button type="submit" class="btn btn-primary-outline btn-xs"> <i class="fa fa-times-circle"></i> Hapus Post</button></a></li>
                            <li><a href="#">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Laporkan</a></li>
                          </ul>
                        </div>
                      @endif
                    </form>

                   
                  </span>
              <span class="description">{{$d->created_at->diffForHumans()}}</span>
            </div>
            <!-- /.user-block -->
            <p>
             {{ $d->content }}
             
             
            </p>
            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
              </li>
              <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                  (5)</a></li>
            </ul>
             @foreach($d->comments as $c)
              <div class="box-body post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $c->user->avatar ) }}" alt="user image">
                  
                      <span class="username">
                        <a href="#">{{$c->user->name }} </a>
                        <form method = "POST" action="{{route('home.comment.destroy',$c)}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if(Auth::user()->name ==$c->user->name )
                          <div class="btn-group pull-right custom-curret">
                            <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a><button type="submit" class="btn btn-primary-outline btn-xs"> <i class="fa fa-times"></i> Hapus Komentar</button></a></li>
                              <li><a href="#">Edit</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#">Laporkan</a></li>
                            </ul>
                          </div>
                        @endif
                        </form>
                      </span>
                  <span class="description">{{$c->created_at->diffForHumans()}}</span>
                </div>
                <p>
                  {{ $c->comment }}
                </p>
            </div>
            @endforeach     
            <form method="post" action="{{ route('home.comment.store',$d) }}">
					    {{ csrf_field() }}
            
              <input class="form-control input-sm" type="text" placeholder="Type a comment" name="comment" id="comment">
              <input type="submit" class="btn btn-primary btn-sm pull-right" value="komen">
            </form>
          </div>                 
          @endforeach
          {{--{!! $datapost->render() !!}--}}
      </div>

    <!-- /.box-body -->
    </div>
  </div>
</div>
@include('layouts.partials.loadrubi')
<script>
  $(document).ready(function() {

    $(window).scroll(fetchPosts);

    function fetchPosts() {

        var page = $('.endless-pagination').data('next-page');
          

        if(page !== null) {
            clearTimeout( $.data( this, "scrollCheck" ) );
            $.data( this, "scrollCheck", setTimeout(function() {
        

                var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                if(scroll_position_for_posts_load >= $(document).height()) {
                    $('.se-pre-con').show()

                    $.get(page, function(data){

                        $('.datapost').append(data.datapost);

                        $('.endless-pagination').data('next-page', data.next_page);

                        $('.se-pre-con').fadeOut("slow");
                    });
                    
                }

            }, 350))

        }
    }

})
</script>
@endsection