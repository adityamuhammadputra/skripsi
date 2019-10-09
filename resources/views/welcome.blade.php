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
              <form method="get" class="custom-search navbar-form navbar-left">
                <input class="form-control" type="text" id="q" name="q" value="{{ request()->get('q') }}" placeholder="Cari Kiriman">
              </form>
        </div>
      </div>
      <div id="modal-form" style="padding:10px;">
        <form method="POST">
          {{ csrf_field() }}{{ method_field('POST') }}
          <input type="hidden" name="id" id="id">          
          <div class="form-group has-feedback {{ $errors->has('content') ? 'has-error' : '' }}">
            <textarea name="content" id="content" class="form-control" onclick="addForm()"></textarea>
            @if($errors->has('content'))
              <span class="help-block">
                <p>{{ $errors->first('content') }}</p>
              </span>
            @endif
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-chevron-circle-right"></i> Kirim</button>
          </div>
        </form>
      </div>
      <!-- /.box-header -->
      <div id="contact-table" class="infinite-scroll">
        @if($datapost->count() > 0)
        @foreach($datapost as $d)    
        <div class="box box2">
          <div class="box-body box-body-custom">
            <div class="post">
              <div class="user-block">
                <img class="img-circle" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
                <span class="username">
                   <!-- $email = Crypt::encrypt($d->user->email)  -->
                  <a href="{{ action('ProfileController@show', $d->user->email) }}">{{$d->user->name }} </a>  
                  <div class="btn-group pull-right custom-curret nav-right1">
                    <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="fa fa-ellipsis-h"></span>
                    </button>
                    <ul class="dropdown-menu">
                      @if(Auth::user()->name ==$d->user->name )
                        <li><a onclick="editForm('{{$d->id }}')" class="pointer-jempol"> <i class="fa fa-pencil-square-o"></i> Edit Kiriman</a></li>
                        <li><a onclick="deleteData('{{$d->id }}')" class="pointer-jempol"> <i class="fa fa-times-circle"></i> Hapus Kiriman</a></li>
                        <li role="separator" class="divider"></li>
                      @endif
                      <li><a href="#" class="pointer-jempol"><i class="fa fa-exclamation-circle"></i> Laporkan Kiriman</a></li>
                    </ul>
                  </div>
                </span>
                <span class="description"><i class="fa fa-clock-o"></i> {{$d->created_at->diffForHumans()}}</span>
              </div>        
              <p>
                {{ $d->content }}            
              </p>
              <div class="box box-default box-costum-collapse">
                <div class="box-header with-border" style="padding:0px;">
                  <table class="pull-right box-hp">
                     <tr>
                      <td class="mailbox-star" data-value="{{$d->id}}">
                        @if(!$d->likes->isEmpty())
                          <i class="fa fa-star text-red"></i> 
                        @else
                          <i class="fa fa-star"></i> 
                        @endif
                      </td> 
                      <td class="btn-nopadding btn btn-box-tool"><a onclick="showlike({{ $d->id }})">{{ $d->likes->count() }} Menyukai</a> </td>
                      @include('layouts.form.formLike')
                      <td class="btn-nopadding btn btn-box-tool" data-widget="collapse"> | <i class="fa fa-comment"></i> {{ $d->comments->count() }} Komentar</td>
                  </tr>
                  </table>
                </div>
                <div class="box-body" style="padding:0px;">
                  <div class="box-komentar">
                    @include('layouts.form.formComment')
                    <div id="box-komentar">
                    @foreach($d->comments as $c)
                      <div class="komentar-post"> 
                        <div class="user-block">
                          <img class="img-circle" src="{{ asset('storage/' . $c->user->avatar ) }}" alt="user image">
                          <span class="username usernamekoment">
                            <a href="{{ action('ProfileController@show', $c->user->email) }}">{{$c->user->name }} </a>  
                            <div class="btn-group custom-curret nav-right-koment pull-right">
                              <button type="button" class="btn btn-primary-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-ellipsis-h"></span>
                              </button>
                              <ul class="dropdown-menu">
                                @if(Auth::user()->name ==$c->user->name )
                                <li><a onclick="deleteComment('{{$c->id }}')" class="pointer-jempol"><i class="fa fa-times-circle"></i> Hapus Komentar</a></a></li>
                                <li role="separator" class="divider"></li>
                                @endif
                                <li><a href="#" class="pointer-jempol"><i class="fa fa-exclamation-circle"></i> Laporkan komentar</a></li>
                              </ul>
                            </div>
                          </span>
                          <span class="description descriptionkoment"><i class="fa fa-clock-o"></i> {{$c->created_at->diffForHumans()}}</span>
                        </div>                 
                        <p>{{ $c->comment }}</p>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>                            
          </div>
        </div>      
        @endforeach
        @else
        <div class="box box2">
            <div class="box-body box-body-custom text-center">
                <h3><i class="fa fa-warning text-info"></i> Data yang anda cari tidak ada <i class="fa fa-warning text-info"></i></h3>
                <p>Silahkan masukan kata kunci lain</p>
            </div>
        </div>
        @endif
        {{ $datapost->links() }}
      </div>

    <!-- /.box-body -->
    </div>
  </div>
</div>

@push('script-src')

@endpush
@push('scripts')
$('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="images/gif-load.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });

    $(document).on('click', ".mailbox-star", function (e) {
      e.preventDefault();
      var post_id = $(this).data('value');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{ url('home/like') }}",
        type: "POST",
        data: {post_id:post_id},
          success: function (data) {
            $("#contact-table").load(" #contact-table");  
            $('div.flash-message').html(data);
          },
          error: function () {
            alert('Oops! error!');
          }
        });

     
    });

  function addForm() {
    save_method = "add";
    $('input[name=_method]').val('POST');
  }
  $(function () {
    $('#modal-form form').on('submit', function (e) {
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ route('home.store') }}"; //ini yang memisahkan antara update delete
        else url = "{{ url('home') . '/'}}" + id;        
        $.ajax({
          url: url,
          type: "POST",
          data: $('#modal-form form').serialize(),
            success: function (data) {
              $('#modal-form').modal('hide');
              // $("#contact-table").load(document.URL + '" #contact-table"');
              $("#contact-table").load(" #contact-table");  
              $('div.flash-message').html(data);
              $('#modal-form form')[0].reset();
              
            },
            error: function () {
              alert('Oops! error!');
            }
          });
        return false;
      }
    });
  });

  function editForm(id) {
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#modal-form form')[0].reset();
    $.ajax({
        url: "{{ url('home')}}/" + id + "/edit", //menampilkan data dari controller edit
        type: "GET",
        dataType: "JSON",
        success: function (data) {
          
          $('#id').val(data.id);
          $('#content').val(data.content);
          $("#content").focus();
        },

        error: function () {
            alert("Data tidak ada");
        }

    });
  }

  function deleteData(id) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
      title: 'Hapus kiriman',
      text: "Apakah Anda Yakin Akan Menghapus Kiriman Ini ?",
      type:'warning',
      showCancelButton:true,
      cancelButtonColor:'#d33',
      confirmButtonColor:'#3085d6',
      confirmButtonText:'Ya, Hapus saja!',
      cancelButtonText:'Batal'
    }).then(function(result){
      if(result.value){                
        $.ajax({
            url: "{{ url('home')}}/" + id,
            type: "POST",
            data: {'_method': 'DELETE','_token': csrf_token
          },
          success: function(data) {
            $("#contact-table").load(" #contact-table");
            $('div.flash-message').html(data);
            $('#modal-form form')[0].reset();

          },
          error: function () {
            alert("Opppps gagal");
          }
        });
      }
      else{
        swal({
          title:'Ya..',
          text: 'anda tidak jadi mengahpus',
          type:'error',
          timer: 2000
        })
      }    
   });
  }

  function deleteComment(id) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
      title: 'Hapus Komentar',
      text: "Apakah Anda Yakin Akan Menghapus Komentar Ini ?",
      type:'warning',
      showCancelButton:true,
      cancelButtonColor:'#d33',
      confirmButtonColor:'#3085d6',
      confirmButtonText:'Ya, Hapus saja!',
      cancelButtonText:'Batal'
    }).then(function(result){
      if(result.value){                
        $.ajax({
        
          url: "{{ url('homecomment')}}/"+id,         
          type: "POST",
          data: {'_method': 'DELETE','_token': csrf_token
        },
        success: function(data) {
          $("#contact-table").load(" #contact-table");
          $('div.flash-message').html(data);
          $('#form form')[0].reset();

        },
        error: function () {
          alert("Opppps gagal");
        }
      })
      }
    })
  }

 $(function () {
  $('input[name=_method]').val('POST');
    $(document).on('submit','#form form',function (e) {
      if (!e.isDefaultPrevented()) {
        var Id = $(this).data('id');
        url = "{{ url('home')}}/" + Id + "/comment";  
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });        
        $.ajax({
          url: url,
          type: "POST",
          data: $(this).serialize(),
            success: function(data) {
              $("#contact-table").load(" #contact-table");
              {{-- $("#contact-table").load(document.URL + '" #contact-table"'); --}}
              $('#form form')[0].reset();
              $('div.flash-message').html(data);
            },
            error: function () {
              alert('Oops! error!');
            }
          });
        return false;
      }
    });
  });

   
@endpush
@endsection