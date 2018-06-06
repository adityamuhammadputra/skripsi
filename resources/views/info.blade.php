<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content')
<div class="row">
  <div class="hidden-xs hidden-sm">
    <div class="col-md-4">
      <div id='calendar'></div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-atas">
      <div class="box-header box1 with-border">
        <h3 class="box-title">
          <button class="btn btn-primary pull-right" onclick="addForm()"> <i class="fa fa-plus"></i> </button>          
        </h3>
        <div class="box-tools pull-right">
          <form class="custom-search navbar-form navbar-left" method="GET" action="/searchBarengan">
            <input type="text" name="search" placeholder="Cari Post ... ">
          </form>
        </div>
      </div>
    <div>
    <div id="contact-table">
      @foreach($info as $d)    
      <div class="box box2">
        <div class="box-body box-body-custom">
          <div class="post">
            <div class="title-info">
                <a href="#" class="title">{{ $d->title}} </a>  
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
                <div class="info-by">
                    <i class="fa fa-clock-o"></i> {{$d->created_at->diffForHumans()}} - DIposting oleh <a href="#">{{ $d->user->name }}</a>
                </div>
            </div>
            
            <div class="col-md-6 img-info">
                <img class="rounded-square img-responsive" src="{{ asset($d->images) }}" alt=""> 
            </div>        
            <p class="text-justify">
                {{ str_limit(strip_tags($d->content), 800) }}
                @if (strlen(strip_tags($d->content)) > 800)
                  <a href="{{ action('InfoController@show', $d) }}" ><i class="readmore"> Lanjutkan Membaca ...</i></a>
                @endif
            </p>
            <div class="box box-default box-costum-collapse">
              <div class="box-header with-border" style="padding:0px;">
                <a class="label label-primary" title="Tempat Meeting Point"><i class="fa fa-map-marker"></i> {{$d->category->name }}</a>
                <div class="pull-right">
                  <a class="btn-nopadding btn btn-box-tool" href="{{ action('InfoController@show', $d) }}"><i class="fa fa-comment"></i> 10
                  </a>
                </div>
              </div>
              {{--  <div class="box-body" style="padding:0px;">
                <div class="box-komentar">
                  @include('layouts.form.formCommentCaribarengan')
                  <div id="box-komentar">
                  @foreach($infocomments as $c)
                    <div class="komentar-post"> 
                      <div class="user-block">
                        <img class="img-circle" src="{{ asset('storage/' . $c->user->avatar ) }}" alt="user image">
                        <span class="username usernamekoment">
                          <a href="#">{{$c->user->name }} </a>  
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
              </div>  --}}
            </div>
          </div>                            
        </div>
      </div>      
      @endforeach
    </div>
  </div>
</div>
@include('layouts.form.formInfo')

@push('scripts')
    //script caribarengan
    function addForm() {
      save_method = "add";
      $('input[name=_method]').val('POST');
      $('#modal-form').modal('show');
      $('#modal-form form')[0].reset();
      $('.modal-title').text('Buat Kiriman Baru');
    }
  
    function editForm(id) {
      save_method = 'edit';
      $('input[name=_method]').val('PATCH');
      $('#modal-form form')[0].reset();
      $.ajax({
        url: "{{ url('info')}}/" + id + "/edit", //menampilkan data dari controller edit
        type: "GET",
        dataType: "JSON",
        success: function (data) {
          $('#modal-form').modal('show');
          $('.modal-title').text('Ubah Data');
  
          $('#id').val(data.id);
          $('#user_id').val(data.user_id);
          $('#title').val(data.title);
          $('#content').val(data.content);
          $('#category').val(data.category);
  
        },
        error: function () {
          alert("Data tidak ada");
        }
  
      });
    }
  
    function deleteData(id) {
      var popup = confirm("apakah anda yakin akan menghapus data?");
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      if(popup == true){                
        $.ajax({
          url: "{{ url('info')}}/" + id,
          type: "POST",
          data: {'_method': 'DELETE','_token': csrf_token
        },
        success: function(data) {
          $("#contact-table").load(" #contact-table");
          $('#alert-success').html('show');
        },
        error: function () {
          alert("Opppps gagal");
        }
      })
      }
    }
  
    $(function () {
      $('#form form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
          var id = $('#id').val();
          if (save_method == 'add') url = "{{ url('info') }}"; //ini yang memisahkan antara update delete
          else url = "{{ url('info') . '/'}}" + id;        
          $.ajax({
            url: url,
            type: "POST",
            //data: $('#modal-form form').serialize(),
            data:new FormData($('$form form')[0]),
            contentType: false,
            processData: false,
              success: function ($data) {
                $('#modal-form').modal('hide');
                // $("#contact-table").load(document.URL + '" #contact-table"');
                $("#contact-table").load(" #contact-table");  
                $('#alert-success').html('show');
              },
              error: function () {
                alert('Oops! error!');
              }
            });
          return false;
        }
      });
    });

  //proses komentar
    {{--  function deleteComment(id) {
      var popup = confirm("apakah anda yakin akan menghapus data?");
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      if(popup == true){                
        $.ajax({
         
          url: "{{ url('caribarengancomment')}}/"+id,         
          type: "POST",
          data: {'_method': 'DELETE','_token': csrf_token
        },
        success: function(data) {
          $("#contact-table").load(" #contact-table");
          $('#alert-success').html('show');
  
        },
        error: function () {
          alert("Opppps gagal");
        }
      })
      }
    }
  
   $(function () {
    $('input[name=_method]').val('POST');
    //$('#form form')[0].reset();
      $(document).on('submit','#form form',function (e) {
        if (!e.isDefaultPrevented()) {
          var barenganId = $(this).data('barengan');
          url = "{{ url('caribarengan')}}/" + barenganId + "/comment";  
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
                $('#alert-success').html('show');
              },
              error: function () {
                alert('Oops! error!');
              }
            });
          return false;
        }
      });
    });  --}}

    //loadscroll
    
    @endpush
@endsection