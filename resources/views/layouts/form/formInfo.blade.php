
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" data-toogle="validator" class="form-horzontal" id="form" enctype="multipart/form-data">
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
                    <select name="category_id" class="input" required>
                        <option value="1">Gunung</option>
                        <option value="2">Pantai</option>
                        <option value="3">Goa</option>
                        <option value="4">Wisata Pulau</option>
                        <option value="5">Air Terjun</option>
                    </select>
                    <label>Kategori</label>
                    <span></span> 
                </div>          
            </div>     
            <div class="form-group">
              <div class="styled-input">
                <input type="text" class="input" name="title" id="title" required/>
                <label>Judul</label>
                <span></span> 
                <span class="help-block with-errors"></span>
              </div>          
            </div>
            
            <div class="form-group">
              <div class="styled-input wide">
                <textarea name="content" class="textarea" id="content" required></textarea>
                <label>Deskripsi</label>
                <span></span> 
                <span class="help-block with-errors"></span>
              </div>
            </div>

            <div class="form-group">
                <div class="styled-input">
                  <input type="file" class="input" name="images" id="images" required/>
                  <label>Gambar</label>
                  <span></span> 
                  <span class="help-block with-errors"></span>
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
  