<div class="modal fade" id="inputTagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Input Tagihan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="<?= base_url('Tagihan/inputTagihan');?>" method="post">
        <table class="modal-table">
          <tr>
            <td><label>ID Pelanggan</label></td>
            <td>
              <select name="pelanggan" id="caripelanggan">
              <?php foreach ($Pelanggan as $p) {?>
                <option value="<?= $p->id_pelanggan?>"><?= $p->nomor_kwh?></option>
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Bulan</label></td>
            <td>
              <select name="bulan" id="">
                <option value="Jan">January</option>
                <option value="Feb">Febuary</option>
                <option value="Mar">March</option>
                <option value="Apr">April</option>
                <option value="May">May</option>
                <option value="Jun">June</option>
                <option value="Jul">July</option>
                <option value="Aug">August</option>
                <option value="Sep">September</option>
                <option value="OCt">October</option>
                <option value="Nov">November</option>
                <option value="Dec">December</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Tahun</label></td>
            <td>
              <select name="tahun" class="tahun" width="120px">
              
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="">Meter Awal</label></td>
            <td>
              <input type="number" name="m-awal" id="">
            </td>
          </tr>
          <tr>
            <td><label for="">Meter Akhir</label></td>
            <td>
              <input type="number" name="m-akhir" id="">
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