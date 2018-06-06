    <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ asset('storage/' . auth()->user()->avatar) }}') center center;">
              <h4 class="widget-user-username">{{ Auth::user()->name }} </h4>
              <h6 class="widget-user-desc">{{ Auth::user()->pekerjaan}}</h6>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="sosmed">
                    <a href="#"><i class="fa fa-facebook"></i></a> 
                    <a href="#"><i class="fa fa-twitter"></i></a> 
                    <a href="#"><i class="fa fa-instagram"></i></a> 
                    <a href="#"><i class="fa fa-google"></i></a> 
                </div>
                {{-- <div class="row">
                    <div class="col-sm-4 col-xs-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">SALES</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">13,000</h5>
                            <span class="description-text">FOLLOWERS</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">PRODUCTS</span>
                        </div>
                    </div>
                </div> --}}
                <hr class="line-profile">
                <a href="{{route('tentang')}}" class="btn btn-primary btn-flat col-md-5"><b><i class="fa fa-user"></i> Tentang</b></a>
                <a href="{{route('galeri')}}" class="btn btn-primary btn-flat col-md-5 pull-right"><b><i class="fa fa-image"></i> Galery</b></a>
              <!-- /.row -->
            </div>
        </div>       
    </div>
    