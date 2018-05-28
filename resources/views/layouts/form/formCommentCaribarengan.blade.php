<div id="form">
    <form method="post" data-toogle="validator" class="form-horzontal">
        {{ csrf_field() }} 
        {{method_field ('POST')}} 
        <input type="hidden" name="id" id="id">              
        <!-- <input type="hidden" name="barengan_id" value="{{$d->id}}" id="barengan_id">               -->
        <input class="form-control input-sm" type="text" placeholder="Type a comment" name="comment" id="comment">
        <button type="submit" class="btn btn-primary btn-sm pull-right">Kirim</button>
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
    $(document).on('submit','#form form',function (e) {
      if (!e.isDefaultPrevented()) {
        // var id = $('#barengan_id').val();
        // url = "{{ url('caribarengan')}}/" + id + "/comment";  
        url= '{{route('caribarengancomment.store',$d)}}';          
        $.ajax({
          url: url,
          type: "POST",
          data: $('#form form').serialize(),
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