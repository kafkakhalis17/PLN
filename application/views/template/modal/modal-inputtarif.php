<div class="modal fade" id="inputTagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Input Tarif</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="<?= base_url('Tarif/inputtarif');?>" method="post">
        <table class="modal-table">
          <tr>
            <td><label>Golongan</label></td>
            <td>
                <input type="text" name="golongan" id="" class="form-control">
            </td>
          </tr>
          <tr>
            <td><label for="">Daya</label></td>
            <td>
             <input type="number" name="daya" class="form-control">
            </td>
          </tr>
          <tr>
            <td><label for="">Tarif Per KWh</label></td>
            <td>
              <input class="form-control" type="text" name="tarif" id="">
            </td>
          </tr>
          <tr>
            <td><label for="">Harga Pasang</label></td>
            <td>
              <input  class="form-control" type="number" name="harga_pasang" id="">
            </td>
          </tr>
          <tr>
            <td><label for="">Harga Jaminan</label></td>
            <td>
             <select name="jaminan" id="" class="form-control">
              <?php foreach ($jaminan as $d) {?>
                  <option value="<?= $d->id_harga_jaminan?>"><?=$d->golongan_jaminan.':'. $d->harga_jaminan?></option>
              <?php } ?> 
             </select>
            </td>
          </tr>
        </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <input class="btn btn-input" name="submit" type="submit" value="Tambah">
    </div>
    </form>
  </div>
</div>
</div>