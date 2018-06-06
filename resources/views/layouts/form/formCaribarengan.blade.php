
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" data-toogle="validator" class="form-horzontal" id="form">
        {{csrf_field()}}
        {{method_field ('POST')}} 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title warna" id="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">          
          <div class="form-group">
            <div class="styled-input">
              <input type="text" class="input" name="tujuan" id="tujuan" required/>
              <label>Tempat Tujuan</label>
              <span></span> 
            </div>          
          </div>
          <div class="form-group">
            <div class="styled-input">
              <input type="text" class="input" name="mepo" id="mepo" required/>
              <label>Tempat Meeting Point</label>
              <span></span> 
            </div>          
          </div>
          <div class="form-group">
            <div class="styled-input50">
              <input type="date" class="input" name="mulai" id="mulai" required/>
              <label class="labeldate">Tanggal Mulai</label>
              <span></span> 
            </div>          
          </div>
          <div class="form-group">
            <div class="styled-input50">
              <input type="date" class="input" name="akhir" id="akhir" required/>
              <label>Tanggal Selesai</label>
              <span></span> 
            </div>          
          </div>
          <div class="form-group">
            <div class="styled-input">
              <input type="text" class="input"  name="contact" id="contact" required/>
              <label>Kontak</label>
              <span></span> 
            </div>          
          </div>

          <div class="form-group">
            <div class="styled-input wide">
              <textarea required name="content" class="textarea" id="content"></textarea>
              <label>Deskripsi</label>
              <span></span> 
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-save" data-dismiss="modal"> <i class="fa fa-times-circle"></i> Batal</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-chevron-circle-right"></i> Kirim</button>
          </div>
        </div>        
      </form>
    </div>
  </div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>
