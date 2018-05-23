<style>

.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9;
    background: url(images/Preloader_3.gif) center no-repeat white;
    opacity: 0.9;

}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> -->


<div class="se-pre-con"></div>

<script>
	$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
});
</script>
