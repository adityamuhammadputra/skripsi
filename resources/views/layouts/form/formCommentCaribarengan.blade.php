<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="form">
    <form method="post" data-barengan="{{$d->id}}">
        {{method_field ('POST')}} 
        <div class="styled-input">
          <input class="input inputkoment" type="text" placeholder="Tulis Komentar ..." name="comment" id="comment">
          <span></span> 
          <button type="submit" class="btn btn-default pull-right btn-custom-komen"><i class="fa fa-chevron-circle-right"></i></button>
        </div>        
    </form>
</div>


<script src="{{asset('js/jquery-1-11-0.js')}}"></script>

<script>

function deleteComment(id) {
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
  $('#form form')[0].reset();
    $(document).on('submit','#form form',function (e) {
      if (!e.isDefaultPrevented()) {
        // var id = $('#barengan_id').val();
        var barenganId = $(this).data('barengan');
        console.log(barenganId);
        url = "{{ url('caribarengan')}}/" + barenganId + "/comment";  
        //url= '{{route('caribarengancomment.store',$d)}}';  
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
  });
</script>

