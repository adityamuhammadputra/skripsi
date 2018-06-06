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
            <li><a><button type="submit" class="btn btn-primary-outline btn-xs"> <i class="fa fa-times"></i> Hapus Post</button></a></li>
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