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
      @foreach($barengan as $d)    
      <div class="box box2">
        <div class="box-body box-body-custom">
          <div class="post">
            <div class="user-block">
              <img class="img-circle" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
              <span class="username">
                <a href="{{ action('ProfileController@show', $d->user->email) }}">{{ $d->user->name}}</a> 
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
              <span class="description"><i class="fa fa-location-arrow" title="tujuan"></i>  {{$d->tujuan}} - <i class="fa fa-clock-o"></i> {{$d->created_at->diffForHumans()}}</span>
            </div>        
            <p>
              {{ $d->content }}            
            </p>
            <div class="box box-default box-costum-collapse">
              <div class="box-header with-border" style="padding:0px;">
                <a class="label label-primary" title="Tempat Meeting Point"><i class="fa fa-map-marker"></i> {{$d->mepo }}</a>
                <a class="label label-primary" title="Waktu"><i class="fa fa-calendar"></i> {{$d->mulai }} - {{$d->akhir }}</a>
  
                <div class="pull-right">
                  <a class="btn-nopadding btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i> 0
                  </a>
                </div>
              </div>
              <div class="box-body" style="padding:0px;">
                <div class="box-komentar">
                  @include('layouts.form.formComment')
                  <div id="box-komentar">
                  @foreach($d->barengancomments as $c)
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
    </div>
  </div>
</div>
@include('layouts.form.formCaribarengan')

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
        url: "{{ url('caribarengan')}}/" + id + "/edit", //menampilkan data dari controller edit
        type: "GET",
        dataType: "JSON",
        success: function (data) {
          $('#modal-form').modal('show');
          $('.modal-title').text('Ubah Data');
  
          $('#id').val(data.id);
          $('#user_id').val(data.user_id);
          $('#tujuan').val(data.tujuan);
          $('#mepo').val(data.mepo);
          $('#mulai').val(data.mulai);
          $('#akhir').val(data.akhir);
          $('#contact').val(data.contact);
          $('#content').val(data.content);
  
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
              url: "{{ url('caribarengan')}}/" + id,
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
  
    $(function () {
      $('#modal-form form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
          var id = $('#id').val();
          if (save_method == 'add') url = "{{ route('caribarengan.store') }}"; //ini yang memisahkan antara update delete
          else url = "{{ url('caribarengan') . '/'}}" + id;        
          $.ajax({
            url: url,
            type: "POST",
            data: $('#modal-form form').serialize(),
              success: function (data) {
                $('#modal-form').modal('hide');
                // $("#contact-table").load(document.URL + '" #contact-table"');
                $("#contact-table").load(" #contact-table");  
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

  //proses komentar
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
        
          url: "{{ url('caribarengancomment')}}/"+id,         
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
          var barenganId = $(this).data('id');
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

    //loadscroll
    
    @endpush
@endsection