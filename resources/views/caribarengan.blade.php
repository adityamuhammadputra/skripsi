<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content')
<div class = "row">
  <div class="hidden-xs hidden-sm">
    <div class="col-md-4" id="calendar">
      @include('layouts.partials._calendarbarengan')
    </div>
  </div>
  <div class="col-md-8">
  <!-- About Me Box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">
          <button class="btn btn-primary pull-right" style="margin-top: -8px;" onclick="addForm()">Tambah barengan</button>
        </h3>
        <div class="box-tools pull-right">
          <form class="custom-search navbar-form navbar-left">
            <input type="text" name="search" placeholder="Cari Post ... ">
          </form>
        </div>
      </div>

    <!-- /.box-header -->
      <div class="box-body" id="contact-table">
       @foreach($caribarengan as $d)
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $d->user->avatar ) }}" alt="user image">

            <span class="username">
              <a href="#">{{$d->user->name }} </a>
              @if(Auth::user()->name ==$d->user->name )
              <a onclick="editForm('{{$d->id }}')" class ="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"> </i> Edit </a>
              <a onclick="deleteData(<?php echo $d->id ?>)" class ="btn btn-warning btn-xs"><i class="glyphicon glyphicon-trash">
              </i> Delete </a>
              @endif


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
              (5)</a>
            </li>
          </ul>

          <form method="post" action="">
            {{ csrf_field() }}

            <input class="form-control input-sm" type="text" placeholder="Type a comment" name="comment" id="comment">
            <input type="submit" class="btn btn-primary btn-sm pull-right" value="komen">
          </form>
        </div>                 
        @endforeach
      </div>
      @include('layouts.form.formCaribarengan')
    </div>
  </div>
</div>

<script>
  function addForm() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();
    $('.modal-title').text('Tambah Data');
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
        $('.modal-title').text('Edit Data');

        $('#id').val(data.id);
        $('#user_id').val(data.user_id);
        $('#category_id').val(data.category_id);
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
    var popup = confirm("apakah anda yakin akan menghapus data?");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup == true){                
      $.ajax({
        url: "{{ url('caribarengan')}}/" + id,
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

  //untuk menambah data atay edit data
  $(function () {
    $('#modal-form form').on('submit', function (e) {
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('caribarengan') }}"; //ini yang memisahkan antara update delete
        else url = "{{ url('caribarengan') . '/'}}" + id;
        
        $.ajax({
          url: url,
          type: "POST",
          data: $('#modal-form form').serialize(),

            success: function ($data) {
              $('#modal-form').modal('hide');
              $("#contact-table").load(" #contact-table");
              $("#calendar").load(" #calendar");
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
</script>
@endsection