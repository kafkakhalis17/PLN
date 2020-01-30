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
              <td><input class="form-control" type="text" name="kwh" id="" maxlength="12"></td>
            </tr>
            <tr>
              <td>NPWP</td>
              <td><input type="text" name="npwp" class="form-control"></td>
            </tr>
            <tr>
              <td>NO KTP</td>
              <td><input type="text" maxlength="15" name="noktp" class="form-control"></td>
            </tr>
            <tr>
              <td>No Telp</td>
              <td><input type="text" maxlength="15" name="telp1" class="form-control"></td>
            </tr>
            <tr>
              <td>No Telp 2</td>
              <td><input type="text" maxlength="15" name="telp2" class="form-control"></td>
            </tr>
            <tr>
              <td><label>Nama Pelanggan</label></td>
              <td><input class="form-control" autocomplete="off" type="text" name="nama"></td>
            </tr>
          <tr>
              <td><label for="">Alamat</label></td>
              <td>
               <textarea class="form-control" name="alamat" id="" cols="40" rows="4"></textarea>
              </td>
            </tr>
            <tr>
              <td><label for="">Jenis Tarif</label></td>
              <td>
                <select class="form-control" name="tarif" id="">
                <?php foreach($tarif as $t){?>
                  <option value="<?= $t->id_tarif?>"><?= $t->daya?></option>
                <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="">Peruntukan</label></td>
              <td>
                <select class="form-control" name="peruntukan" id="">
                <?php foreach($peruntukan as $p){?>
                  <option value="<?= $p->id_peruntukan?>"><?= $p->peruntukan?></option>
                <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="">Status</label></td>
              <td>
                <select class="form-control" name="status" id=""> 
                  <option value="1">Aktif</option>
                  <option value="400">Putus</option>
                </select>
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary btn-input" name="submit" type="submit" value="Tambah">
      </div>
      </form>
    </div>
  </div>
</div>