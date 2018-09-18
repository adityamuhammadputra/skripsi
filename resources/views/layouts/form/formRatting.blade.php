<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .rating { 
  border: none;
  float: left;
    top: 10px;
    position: relative;
    left: -10px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 2px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > input:checked ~ label, .rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
    color: #fb503b !important;
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<div id="form">
    <form method="post" data-id="{{$d->id}}">
        {{ method_field('POST') }}
        <div class="col-md-12">
          <fieldset class="rating">
            <input type="radio" id="star5" name="ratting" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input type="radio" id="star4half" name="ratting" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
            <input type="radio" id="star4" name="ratting" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input type="radio" id="star3half" name="ratting" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
            <input type="radio" id="star3" name="ratting" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input type="radio" id="star2half" name="ratting" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
            <input type="radio" id="star2" name="ratting" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input type="radio" id="star1half" name="ratting" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
            <input type="radio" id="star1" name="ratting" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            <input type="radio" id="starhalf" name="ratting" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
          </fieldset>
        </div>
       
        <div class="styled-input">
          
          <input class="input inputkoment" type="text" placeholder="Tulis Ulasan ..." name="comment" id="comment">

          <span></span> 
          <button type="submit" class="btn btn-default pull-right btn-custom-komen"><i class="fa fa-chevron-circle-right"></i></button>
        </div>   
        
        
        
    </form>
</div>




