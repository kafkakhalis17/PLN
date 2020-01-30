<div class="modal fade" id="inputPenggunaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Input Data Penggunaan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="<?= base_url('Penggunaan/inputNewPenggunaan');?>" method="post">
        <table class="modal-table">
          <tr>
            <td><label>ID Pelanggan</label></td>
            <td>
            <select  name="pelanggan" class="searchpelanggan form-control" style="width:110%">
              <?php foreach ($Pelanggan as $p) {?>
                <option value="<?= $p->id_pelanggan?>"><?= $p->nomor_kwh?></option>
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Bulan</label></td>
            <td>
              <select class="form-control" name="bulan" id="">
                <option value="January">January</option>
                <option value="Febuary">Febuary</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Tahun</label></td>
            <td>
              <select name="tahun" class="tahun form-control" width="120px">
              
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Meter Awal</label></td>
            <td>
              <input class="form-control" type="number" name="m-awal" id="">
            </td>
          </tr>
          <tr>
            <td><label for="">Meter Akhir</label></td>
            <td>
              <input class="form-control" type="number" name="m-akhir" id="">
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