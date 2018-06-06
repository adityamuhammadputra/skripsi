<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="form">
    <form method="post" data-singgah="{{$d->id}}">
        {{method_field ('POST')}} 
        <div class="styled-input">
          <input class="input inputkoment" type="text" placeholder="Tulis Komentar ..." name="comment" id="comment">
          <span></span> 
          <button type="submit" class="btn btn-default pull-right btn-custom-komen"><i class="fa fa-chevron-circle-right"></i></button>
        </div>        
    </form>
</div>

