<style>

#bgl{
    /* background:blue no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: 100%; */

  position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: white;
    z-index: 10;
    /* opacity:0.9; */

}
    #spinner {
  margin: 100px auto;
  width: 50px;
  height: 40px;
  text-align: center;
  font-size: 10px;

   position:fixed;
            left:0;
            top:0;
            right:0;
            bottom:0px;
            margin:auto;

            

    

}

#spinner > div {
  background-color: red;
  height: 100%;
  width: 6px;
  display: inline-block;
  
  -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
  animation: sk-stretchdelay 1.2s infinite ease-in-out;
  opacity:0.9;
}

#spinner .rect2 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}

#spinner .rect3 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

#spinner .rect4 {
  -webkit-animation-delay: -0.9s;
  animation-delay: -0.9s;
}

#spinner .rect5 {
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}

@-webkit-keyframes sk-stretchdelay {
  0%, 40%, 100% { -webkit-transform: scaleY(0.4) }  
  20% { -webkit-transform: scaleY(1.0) }
}

@keyframes sk-stretchdelay {
  0%, 40%, 100% { 
    transform: scaleY(0.4);
    -webkit-transform: scaleY(0.4);
  }  20% { 
    transform: scaleY(1.0);
    -webkit-transform: scaleY(1.0);
  }
}
</style>
  <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/e8IFn7z4dBw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
<div id="bgl">
    <div id="spinner" class="">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
    <script>
      var spinner = document.getElementById('spinner');
      var bgl = document.getElementById('bgl');
      

      window.addEventListener('load',function(){
        spinner.style.display ="none";
        bgl.style.display ="none";
        
      });
    </script>