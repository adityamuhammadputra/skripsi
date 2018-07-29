<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content')
<div class="row">
  <div class="hidden-xs hidden-sm">
    <div class="col-md-4">
      <ul class="timeline timeline-inverse">
        <!-- timeline time label -->
        <li class="time-label">
              <span class="bg-aqua">
                Kiriman Anda
              </span>
        </li>
        @foreach($datasaya as $ds)  
        <li>
          <i class="{{ $ds->icon }}"></i>
          <div class="timeline-item" style="background:white;">
            <span class="time"><i class="fa fa-clock-o"></i> {{ $ds->created_at->diffForHumans() }} </span>
            <h3 class="timeline-header"><a href="{{ action('InfoController@show', $ds) }}">{{ $ds->title}}</a></h3>
            <div class="timeline-body">
              <p class="text-justify">
                  {{ str_limit(strip_tags($ds->content), 300) }}
                  @if (strlen(strip_tags($ds->content)) > 300)
                    <a href="{{ action('InfoController@show', $ds) }}" ><i class="readmore"> Lanjutkan Membaca ...</i></a>
                  @endif
              </p>
              
            </div>
            
          </div>
        </li>
        @endforeach
        <li>
          <i class="fa fa-clock-o bg-gray"></i>
        </li>
        
      </ul>
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
      @foreach($data as $d)    
      <div class="box box2">
        <div class="box-body box-body-custom">
          <div class="post">
            <div class="title-info">
                <a href="{{ action('InfoController@show', $d) }}" class="title">{{ $d->title}} </a>  
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
                    <i class="fa fa-clock-o"></i> {{ $d->created_at->diffForHumans() }} - Diposting oleh <a href="{{ action('ProfileController@show', $d->user->email) }}">{{ $d->user->name }}</a>
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
                <table class="pull-right box-hp">
                  <tr>
                      <td class="mailbox-star" data-value="{{$d->id}}">
                        @if(!$d->likecek->isEmpty())
                          <i class="fa fa-star text-red"></i> 
                        @else
                          <i class="fa fa-star"></i> 
                        @endif
                      </td> 
                      <td class="btn-nopadding btn btn-box-tool"><a onclick="showlike({{ $d->id }})">{{ $d->infolike->count() }} Suka</a> </td>
                      @include('layouts.form.formLike')

                      <td class="btn-nopadding btn btn-box-tool" data-widget="collapse"> | <i class="fa fa-comment"></i> {{ $d->infocomment->count() }} Komentar</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>                            
        </div>
      </div>      
      @endforeach
    </div>
  </div>
</div>
<div class="flash-message"></div>
@include('layouts.form.formInfo')

@push('scripts')

    $(document).on('click', ".mailbox-star", function (e) {
      e.preventDefault();
      var info_id = $(this).data('value');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{ url('info/like') }}",
        type: "POST",
        data: {info_id:info_id},
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
      $('#modal-form').modal('show');
      $('#modal-form form')[0].reset();
      $('.modal-title').text('Buat Baru');
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
            $('.modal-title').text('Edit Data');

            $('#id').val(data.id);
            $('#category_id').val(data.category_id);
            $('#title').val(data.title);
            $('#content').val(data.content);
          },

          error: function () {
              alert("Data tidak ada");
          }

      });
    }
    
    $(function () {
      //$('#modal-form form').on('submit', function (e) {
        $('#modal-form form').validator().on('submit', function (e) {

          if (!e.isDefaultPrevented()) {
              var id = $('#id').val();
              if (save_method == 'add') url = "{{ url('info') }}"; //ini yang memisahkan antara update edit
              else url = "{{ url('info') . '/'}}" + id;
              
              $.ajax({
                  url: url,
                  type: "POST",
                  // data: $('#modal-form form').serialize(),
                  data:new FormData($('#modal-form form')[0]),
                  contentType: false,
                  processData: false,
                                      
                  success: function (e) {
                      $('#modal-form').modal('hide');
                      $("#contact-table").load(" #contact-table");  
                      $('div.flash-message').html(e);
                  },
                  error: function () {
                      alert('Oops! error!');
                      $('div.flash-message').html(e);
                  }
              });
          return false;
        }
      });
    });

    function deleteData(id) {
      // var popup = confirm("apakah anda yakin akan menghapus data?");
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
              url: "{{ url('info')}}/" + id,
              type: "POST",
              data: {'_method': 'DELETE','_token': csrf_token
              },
              success: function(data) {
                  $("#contact-table").load(" #contact-table");  
                  $('div.flash-message').html(data);
                  

              },
              error: function () {
                  swal({
                      title:'opss..',
                      text: 'Maaf error',
                      type:'error',
                      timer: 2000
                  })
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
@endpush
@endsection