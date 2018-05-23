<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form method="post" data-toogle="validator" class="form-horzontal" id="form">
        {{csrf_field()}}
        {{method_field ('POST')}} 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="category_id">Masukan Kategori</label>
            <select name="category_id" id="" class="form-control">
              <option disabled selected>----Silahkan Pilih----</option>
              @foreach ($categories as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
              @endforeach
            </select>
            @if($errors->has('category_id'))
              <span class="help-block">
                <p>{{ $errors->first('category_id') }}</p>
              </span>
            @endif
          </div>

          <div class="form-group">
            <label for="tujuan">Masukan Tujuan Anda</label>
            <input type="text" class="form-control" name="tujuan" id="tujuan">
            <span class="help-block with-errors"></span>            
          </div>

          <div class="form-group">
            <label for="mepo">Tempat Meeting Point</label>
            <input type="text" class="form-control" name="mepo" id="mepo" >
            <span class="help-block with-errors"></span>            
          </div>

          <div class="form-group">
            <label for="mulai">Tanggal Berangkat</label>
            <input type="date" class="form-control" name="mulai" id="mulai">
            <span class="help-block with-errors"></span>   
          </div>

          <div class="form-group">
            <label for="akhir">Tanggal Pulang</label>
            <input type="date" class="form-control" name="akhir" id="akhir" >
            <span class="help-block with-errors"></span> 
          </div>

          <div class="form-group">
            <label for="contact">Kontak</label>
            <input type="text" class="form-control" name="contact" id="contact">
            <span class="help-block with-errors"></span> 
          </div>

          <div class="form-group">
            <label for="content">Masukan Deskripsi</label>
            <textarea name="content" class="form-control" id="content"></textarea>
            <span class="help-block with-errors"></span>            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-save" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>