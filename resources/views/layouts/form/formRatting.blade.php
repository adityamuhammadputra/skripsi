<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="form">
    <form method="post" data-id="{{$d->id}}" class="rating">
        {{ method_field('POST') }}
        <div class="styled-input">
          <select id="example" name="ratting">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
          <input class="input inputkoment" type="text" placeholder="Tulis Ulasan ..." name="comment" id="comment">

          <span></span> 
          <button type="submit" class="btn btn-default pull-right btn-custom-komen"><i class="fa fa-chevron-circle-right"></i></button>
        </div>   
        
        
        
    </form>
</div>
<script>
  $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars'
      });
   });

   
</script>



