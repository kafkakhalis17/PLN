<div class="modal fade" id="inputMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pelanggan/input');?>" method="post">
          <table class="modal-table">
            <tr>
              <td><label>No KWh</label></td>
              <td><input autocomplete="off" type="text" name="kwh"></td>
            </tr>
            <tr>
              <td><label>Nama Pelanggan</label></td>
              <td><input autocomplete="off" type="text" name="nama"></td>
            </tr>
            <tr>
              <td><label for="">Alamat</label></td>
              <td>
               <textarea name="alamat" id="" cols="40" rows="4"></textarea>
              </td>
            </tr>
            <tr>
              <td><label for="">Jenis Tarif</label></td>
              <td>
                <select name="tarif" id="">
                <?php foreach($tarif as $t){?>
                  <option value="<?= $t->id_tarif?>"><?= $t->daya?></option>
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