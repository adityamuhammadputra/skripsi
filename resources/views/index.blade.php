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
	    <div class="collapse navbar-collapse pull-right" id="navMain">
	      <ul class="nav navbar-nav pull-right">
	        <li><a class="page-scroll" href="#page-top">Beranda</a></li>
	        <li><a class="page-scroll" href="#about">Tentang</a></li>
	        <li><a class="page-scroll" href="#bergabung">Bergabung</a></li>
	        <li><a class="btn btn1" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Login</a></li> 
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
								<div class="col-md-3 col-xs-3">													
									<img src="images/data.png" class="img img-responsive" width="100px;">
								</div>							
								<div class="col-md-9 col-sm-9 col-xs-9">	
									<h3 class="textabout"><p class="p7">Data Karyawan</p> Pengelolaan data karyawan yang baik perlu dilakukan agar data penting seperti ID-Karyawan, Nama, Alamat, Jabatan, Nomor HP tersimpan didatabase. Guna sewaktu-waktu data dibutuhkan kembali dapat digunakan kapan saja. <br>
									User biasa hanya bisa melihat data, Untuk pengelolaan data hanya bisa dilakukan Oleh Admin agar data tetap aman</h3>
								</div>	
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="col-md-3 col-xs-3">													
									<img src="images/absensi.jpg" class="img img-responsive" width="100px;">
								</div>							
								<div class="col-md-9 col-sm-9 col-xs-9">	
									<h3 class="textabout"><p class="p7">Data Absensi</p> Sistem Absensi memang merupakan aset penting dari perusahaan atau instansi untuk mengatur dan juga memantau kedisiplinan para karyawan. Semakin banyak jumlah karyawan suatu perusahaan, maka akan sangat sulit bagi pihak HR untuk memantau tiap-tiap individu yang berbeda secara langsung apalagi jumlah staff HR tidak sebanyak jumlah karyawan yang ada. </h3>
								</div>
                            </div>
                            <div class="col-md-4 col-sm-12">
								<div class="col-md-3 col-xs-3">													
									<img src="images/absensi.jpg" class="img img-responsive" width="100px;">
								</div>							
								<div class="col-md-9 col-sm-9 col-xs-9">	
									<h3 class="textabout"><p class="p7">Data Absensi</p> Sistem Absensi memang merupakan aset penting dari perusahaan atau instansi untuk mengatur dan juga memantau kedisiplinan para karyawan. Semakin banyak jumlah karyawan suatu perusahaan, maka akan sangat sulit bagi pihak HR untuk memantau tiap-tiap individu yang berbeda secara langsung apalagi jumlah staff HR tidak sebanyak jumlah karyawan yang ada. </h3>
								</div>
							</div>
						</div>					
				</div>				
			</div>			
		</div>
    </section>

    <section id="bergabung" class="galery-section">
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
	</section>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    Lupa Password ?
                                </a>
                                                               
                            </div>
                        </div>
					   </div>
				   </form>
				</div>
			</div>
		</div>
    

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
