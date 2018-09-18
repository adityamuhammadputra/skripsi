<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
	  <div class="container">
	    <div class="navbar-header">
	      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">	  		
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>	    
	  		</button>
	      	<a class="navbar-brand page-scroll" href="#page-top"><b class="p2"><i class="fa fa-paw"></i></b></a>
	    </div>
	    <div class="collapse navbar-collapse" id="navMain">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a class="page-scroll" href="#page-top">Beranda</a></li>
            <li><a class="page-scroll" href="#about">Tentang</a></li>
            <li><a class="page-scroll" href="{{ route('login') }}">Login</a></li>
            <li><a class="page-scroll" href="{{ route('register') }}">Bergabung</a></li>
	      </ul>
	    </div>
	  </div>
    </div>
    <section id="intro" class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
					<p class="p3">Dunia <a class="p1">Seluas</a></p><br>
					<p class="p4">Kaki <a class="p1">Melangkah</a></p>
				</div>				
			</div>			
		</div>		
    </section>
    
    <section id="about" class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="p5">Tentang</h2>
					<hr class="hr">
					<br>
						<div class="row">
							<div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <p class="icon-custom"><i class="fa fa-info-circle"></i></p>
								    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">	
									    <h3 class="textabout"><p class="p7 text-center">Info Wisata</p> Kadang anda bingung ingin berlibur kemana? mungkin Rekomendasi Info Wisata disini bisa anda jadikan pertimbangan. Anda juga bisa memberi ulasan atau menulis cerita anda sendiri yang bisa jadi referensi untuk yang lain </h3>
								    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <p class="icon-custom"><i class="fa fa-home"></i></p>
								    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">	
									    <h3 class="textabout"><p class="p7 text-center">Rumah Singgah</p> Bila anda sedang melakukan perjalanan jauh dan anda butuh rumah singgah, Coba cari disini ! Selain itu anda juga bisa menjadi penyedia rumah singgah dan berbagi kehangatan rumah anda dengan teman baru anda  </h3>
								    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <p class="icon-custom"><i class="fa fa-users"></i></p>
								    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">	
									    <h3 class="textabout"><p class="p7 text-center">Cari Barengan</p>  Pernah suatu hari anda saat anda ingin melakukan pertualangan hebat tetapi membutuhkan teman agar tidak membosankan ? Coba cari barengan perjalanan anda disini. Anda akan mendapatkan teman baru disini</h3>
								    </div>
                                </div>
                            </div>
                            
							
						</div>					
				</div>				
			</div>			
		</div>
    </section>
    <br><br><br><br>

    {{-- <section id="bergabung" class="galery-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="p5">Bergabung</h2>
					<hr class="hr">
				</div>
			</div>
		<div class="container">
			<div class="row">
	        	<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="text" class="input" id="name" name="name" value="{{ old('name') }}" />
                                    <label>Nama</label>
                                    <span></span> 
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div> 
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="email" class="input" id="email" name="email" value="{{ old('email') }}" />
                                    <label>Email</label>
                                    <span></span> 
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div> 
                            </div>
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="password" class="input" id="password" name="password" value="{{ old('password') }}"  />
                                    <label>Password</label>
                                    <span></span> 
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div> 
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="password" class="input" id="password-confirm" name="password_confirmation"  />
                                    <label>Konfirmasi Password</label>
                                    <span></span> 
                                </div> 
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-sign-in"></i> Daftar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
		
	</div>
	</section> --}}
    
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
				<div class="modal-content ">
			      <div class="modal-header ">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel"><p class="p1">Silahkan Login</p></h4>
			      </div>
                    <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

				      <div class="modal-body ">
				      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus/>
                                <label>Email</label>
                                <span></span> 
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required />
                                <label>Password</label>
                                <span></span> 
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Biarkan saya tetap masuk
                                    </label>
                                </div>
                            </div>
                        </div>
                      </div>
					  <div class="modal-footer">
					        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    Lupa Password ?
                                </a>
                            </div>
					   </div>
				   </form>
				</div>
			</div>
		</div> --}}
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

 $(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
    });
    </script>
</body>
</html>