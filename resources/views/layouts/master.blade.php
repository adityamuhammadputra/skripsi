
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <!-- <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> -->
</head>
<style>
    #result {
      position: absolute;
      width: 262px;
      max-width: 870px;
      overflow-y: auto;
      max-height: 400px;
      box-sizing: border-box;
      z-index: 1001;
      top: 42px;
      margin-left: -20px;
    }
    .link-class:hover{
      background-color:#f1f1f1;
    }
    .list-group-item-custom{
      padding:5px 6px;
    }
    .list-group-item-custom a{
      text-decoration:none;
      cursor:pointer;
    }

    .list-group-item-custom .text-blue{
      position: relative;
      left: 5px;
      top: -10px;
      font-size: 15px;
      font-weight: 510;
    }
    .list-group-item-custom .text-muted{
      position: absolute;
      left: 55px;
      top: 22px;
    }
    </style>
<body class="hold-transition fixed layout-top-nav">
<div class="wrapper">

  <header class="main-header costum-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{route('home')}}" class="navbar-brand"><b class ="f-brand"><i class="fa fa-paw"></i></b></a>

        </div>

        <div class="collapse navbar-collapse pull-left f-color1" style="display: block!important;">
          <div id="sidebar-menu">
            <ul class="f-color1 nav navbar-nav active-menu hidden-xs">
              <li><a href="{{route('caribarengan.index')}}"><i class="fa fa-users fa-size-15"></i> Barengan</a></li>
              <li><a href="{{ route('singgah.index') }}"><i class="fa fa-home fa-size-15"></i> Singgah</a></li>
              <li><a href="{{ route('info.index') }}"><i class="fa fa-info-circle fa-size-15"></i> Info</a></li>
            </ul>
            <nav class="icon-bar nav active-menu visible-xs bottom" >
              <li><a href="{{route('home')}}"><i class="fa fa-globe"></i></a></li>
              <li><a href="{{route('caribarengan.index')}}"><i class="fa fa-users"></i></a> </li>
              <li><a href="{{ route('singgah.index') }}"><i class="fa fa-home"></i></a> </li>
              <li><a href="{{ route('info.index') }}"><i class="fa fa-info-circle"></i></a> </li>
              <li><a href="#"><i class="fa fa-user"></i></a> </li>
            </nav>
          </div>
          
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <form class="custom-search navbar-form navbar-left">
            <input type="text" name="search" id="search" onClick="fungsiklik()" placeholder="Cari User..">
            <ul class="list-group" id="result"></ul>
          </form>
          <ul class="nav navbar-nav f-color2">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle  hidden-xs" data-toggle="dropdown" >
                <i class="fa fa-envelope fa-size-15"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="" class="img-circle img" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown">
                <i class="fa fa-bell fa-size-15"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <li class="dropdown">

              <a href="#" class="dropdown-toggle hidden-xs hidden-sm custom-margin" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-circle custom-img-icon" alt="User Image"> {{ Auth::user()->name }}
              </a>
              <a href="#" class="dropdown-toggle visible-sm visible-xs" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-circle custom-img-icon-hp"  alt="User Image">
              </a>
              <ul class="dropdown-menu" role="menu">
                <!-- <li>
                  <a href="{{ route('tentang') }}"><i class="fa fa-user-circle-o"></i>Profile</a>
                </li> -->
                <li class="hidden-md hidden-lg"><a href="{{route('calendar')}}"><i class="fa fa-calendar"></i>Jadwal Kamu</a></li>
                <li class="hidden-md hidden-lg"><a href="{{url('singgahme')}}"><i class="fa fa-home"></i>Rumah Singgah Kamu</a></li>
                <li class="hidden-md hidden-lg"><a href="{{url('infome')}}"><i class="fa fa-info-circle"></i>Info Wisata Kamu</a></li>
                <!-- menu mobile -->
                <li class="divider hidden-md hidden-lg"></li>
                <li class="">
                  <a href="{{ route('tentang') }}"><i class="fa fa-user-circle"></i>Tentang saya</a>
                </li>
                <li class="">
                  <a href="{{ route('galeri') }}"><i class="fa fa-image"></i>Galeri saya</a>
                </li>
                <li class="divider hidden-md hidden-lg"></li>
                <li class="hidden-md hidden-lg">
                  <a href="#">
                    <i class="fa fa-envelope fa-size-15"></i>
                    Pesan <span class="label label-success pull-right">4</span>
                  </a>
                </li>
                <li class="hidden-md hidden-lg">
                  <a href="#">
                    <i class="fa fa-bell fa-size-15"></i>
                    Notifikasi <span class="label label-warning pull-right">12</span>
                  </a>
                </li>
                <!-- end mobile -->
                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="fa fa-lock"></i>
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>
  <!-- Full Width Column -->
  <div class="container-custom">
    <div class="container">
      <!-- alert -->
      @include('layouts.partials._alert')
      <div class="flash-message"></div>
    
      <!-- loadinganimation -->
      @include('layouts.partials.loadrubi')
      
      @yield('content')
        
      <div class="ganjalbottom visible-xs visible-sm"></div>
    </div>
  </div>
</div>

</body>


<script src="{{asset('js/app.js')}}"></script>

<script>
    function fungsiklik(){
      // $('#search').hide();
    }
    $(document).ready(function(){
      $.ajaxSetup({ cache: false });
      $('#search').keyup(function(){
       $('#result').html('');
       $('#state').val('');
     
       var searchField = $('#search').val();
     
       var expression = new RegExp(searchField, "i");
       $.getJSON('{{ route('seacrh') }}', function(data) {
        $.each(data, function(key, value){
          var img = value.email;
          console.log(img);
         if (value.name.search(expression) != -1 || value.name.search(expression) != -1)
          {
            $('#result').append('<li class="list-group-item list-group-item-custom link-class"><a href ="{{ action('ProfileController@showuser',"")}}/'+value.email+'"><img src="{{ asset('storage')}}/'+value.avatar+'" height="40" width="40" /> <span class="text-blue">'+value.name+'</span> <span class="text-muted">'+value.pekerjaan+'</span></a></li>');
          }
         // console.log(searchField);
         if(searchField == 0)
         {
           $("#result").html('');
         }
     
        });   
       });
      });
      
      $('#result').on('click', 'li', function() {
       var click_text = $(this).text().split('|');
       $('#search').val($.trim(click_text[0]));
       $("#result").html('');
      });
     });
</script>

<script>@stack('scripts')</script>
<script>@stack('script-src')</script>
</html>