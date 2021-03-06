<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content')
<div class="row">
  <div class="">
    <div class="col-md-4 col-md-4 hidden-xs hidden-sm">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Rumah Singgaah Anda</h3>
        </div>
        @foreach($datasaya as $s)
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Deskripsi</strong>
          <p class="text-muted">
            {{$s->content}}
          </p>
          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

          <p class="text-muted">{{$s->lokasi}}</p>

          <hr>

          <strong><i class="fa fa-star margin-r-5"></i> Ratting Ulasan</strong>

          <p>
              {!! str_repeat('<i class="fa fa-star text-red" aria-hidden="true"></i>', $s->singgahcomment->pluck('ratting')->avg() ) !!}
              {!! str_repeat('<i class="fa fa-star-o text-red" aria-hidden="true"></i>', 5 - $s->singgahcomment->pluck('ratting')->avg() ) !!}
              {{$s->singgahcomment->pluck('ratting')->avg()}}
          </p>

          <hr>

          <strong><i class="fa fa-file-text-o margin-r-5"></i> Ulasan</strong>
          @foreach($s->singgahcomment as $sc)
          <p>
            {{$sc->comment}}
          </p>
          @endforeach
        </div>
        <!-- /.box-body -->
      </div>
      @endforeach
      
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-atas">
      <div class="box-header box1 with-border">
        <h3 class="box-title">
          <button class="btn btn-primary pull-right" onclick="addForm()"> <i class="fa fa-plus"></i> </button>          
        </h3>
        <div class="box-tools pull-right">
          <form method="get" class="custom-search navbar-form navbar-left">
            <input class="form-control" type="text" id="q" name="q" value="{{ request()->get('q') }}" placeholder="Cari Rumah Singgah">
          </form>
        </div>
      </div>
    <div>
    <div id="contact-table">
      <div class="box box2">
        <div class="box-body box-body-custom">
          <div class="post">
            <div class="user-block">
              <img class="img-circle" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">
              <span class="username">
                <?php $email = Crypt::encrypt($d->user->email) ?>
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
              <span class="description"><i class="fa fa-hashtag" title="Sebagai"></i>  {{$d->category}} - <i class="fa fa-clock-o"></i> {{$d->created_at->diffForHumans()}}</span>
            </div>        
            <p>
              {{ $d->content }}            
            </p>
            <div class="box box-default box-costum-collapse">
              <div class="box-header with-border" style="padding:0px;">
                <a class="label label-primary" title="Kota"><i class="fa fa-map-marker"></i> {{$d->lokasi }}</a>
                <a class="label label-primary" title="Kontak"><i class="fa fa-phone-square"></i> {{$d->contact }}</a>
                <table class="pull-right">
                  <tr>
                      {{-- <td class="mailbox-star" data-value="{{$d->id}}">
                          @if(!$d->likecek->isEmpty())
                            <i class="fa fa-star text-red"></i> 
                          @else
                            <i class="fa fa-star"></i> 
                          @endif
                      </td>  --}}
                      {{-- <td><a onclick="showlike({{ $d->id }})" id="coba">{{ $d->singgahlike->count() }} Suka</a> </td> --}}
                      {{-- @include('layouts.form.formLike') --}}

                      {{-- <td class="btn-nopadding btn btn-box-tool" data-widget="collapse"> | <i class="fa fa-comment"></i> {{ $d->singgahcomment->count() }} </td> --}}
                      <td>
                        {!! str_repeat('<i class="fa fa-star text-red" aria-hidden="true"></i>', $d->singgahcomment->pluck('ratting')->avg() ) !!}
                        {!! str_repeat('<i class="fa fa-star-o text-red" aria-hidden="true"></i>', 5 - $d->singgahcomment->pluck('ratting')->avg() ) !!}
                        {{$d->singgahcomment->pluck('ratting')->avg()}}
                      </td>
                  </tr>
                </table>
              </div>
              <div class="box-body" style="padding:0px;">
                <div class="box-komentar">
                  @include('layouts.form.formRatting')
                  <div id="box-komentar">
                  @foreach($d->singgahcomment()->get() as $c)
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
                        <span class="description descriptionkoment"> 
                          <p>
                            {!! str_repeat('<i class="fa fa-star text-red" aria-hidden="true"></i>', $c->ratting) !!}
                            {!! str_repeat('<i class="fa fa-star-o text-red" aria-hidden="true"></i>', 5 - $c->ratting) !!}
                          </p>
                        </span>
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
    </div>
  </div>
</div>
@include('layouts.form.formSinggah')

@push('scripts')

       $(document).on('click', ".mailbox-star", function (e) {
        e.preventDefault();
        var singgah_id = $(this).data('value');
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
          url: "{{ url('singgah/like') }}",
          type: "POST",
          data: {singgah_id:singgah_id},
            success: function (data) {
              $("#contact-table").load(" #contact-table");  
              $('div.flash-message').html(data);
            },
            error: function () {
              alert('Oops! error!');
            }
          });

        
      });

    function showlike(id)
    {
      $.ajax({
        url: "{{ url('singgah/like')}}/" + id, //menampilkan data dari controller edit
        type: "GET",
        dataType: "JSON",
        success: function (data) {
          $('#modal-like').modal('show');
          $('.modal-title').text('Menyukai ini');

          var arrayLength = data.length;
            var d = [];
            $("#modal-like .modal-body").html(""); 
            var newRowContent = [];
            for (var i = 0; i < arrayLength; i++) {
                newRowContent = "<tr>";
                newRowContent += "<td style='padding:8px 4px'>";
                newRowContent += "<a href='{{ url('profile') }}/"+data[i].user.email+"'>";
                newRowContent += "<img class='img-circle' width='30px' height='30px' src='{{ asset('storage') }}/"+ data[i].user.avatar + "'></td>";
                newRowContent += "<td><b>"+ data[i].user.name +"</b></a></td>";
                newRowContent += "<tr>";
            $("#modal-like .modal-body").append(newRowContent); 
            }
        },
        error: function () {
          alert("Data tidak ada");
        }
  
      });
    }

    
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
        url: "{{ url('singgah')}}/" + id + "/edit", //menampilkan data dari controller edit
        type: "GET",
        dataType: "JSON",
        success: function (data) {
          $('#modal-form').modal('show');
          $('.modal-title').text('Ubah Data');
  
          $('#id').val(data.id);
          $('#user_id').val(data.user_id);
          $('#lokasi').val(data.lokasi);
          $('#content').val(data.content);
          $('#contact').val(data.contact);
          $('#category').val(data.category);
  
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
              url: "{{ url('singgah')}}/" + id,
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
          if (save_method == 'add') url = "{{ url('singgah') }}"; //ini yang memisahkan antara update delete
          else url = "{{ url('singgah') . '/'}}" + id;        
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
      title: 'Hapus Ulasan',
      text: "Apakah Anda Yakin Akan Menghapus Ulasan Ini ?",
      type:'warning',
      showCancelButton:true,
      cancelButtonColor:'#d33',
      confirmButtonColor:'#3085d6',
      confirmButtonText:'Ya, Hapus saja!',
      cancelButtonText:'Batal'
    }).then(function(result){
      if(result.value){                
        $.ajax({
        
          url: "{{ url('singgahcomment')}}/"+id,         
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
    $('#form form')[0].reset();
      $(document).on('submit','#form form',function (e) {
        if (!e.isDefaultPrevented()) {
          var singgahId = $(this).data('id');
          url = "{{ url('singgah')}}/" + singgahId + "/comment";  
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
                $("#contact-table").load(document.URL + " #contact-table");
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