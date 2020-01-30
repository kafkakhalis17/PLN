`<div class="modal fade" id="updatePenggunaanbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Penggunaan Baru</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="<?= base_url('Penggunaan/updatePenggunaan');?>" method="post" id="FormPeggunaan">
      <center><span id="pesan"></span></center>
        <table class="modal-table">
          <tr>
            <td><label>ID Pelanggan</label></td>
            <td>
              <select name="pelanggan" class="searchpelanggan searchpenggunaan form-control" style="width:110%">
              <option  value="" disabled selected>Select your option</option>
              <?php foreach ($idPelanggan as $p) {?>
                <option value="<?= $p->id_pelanggan?>"><?= $p->nomor_kwh?></option>
              <?php } ?>
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
            <td><label for="">Bulan</label></td>
            <td>
              <select class="form-control" name="bulan" id="">
              <?php
                $date = new DateTime();
                $monthname = $date->format('F');
                $year = $date->format('Y');
                echo("<option selected value='{$monthname}'>{$monthname}</option>");
              ?>
                <option class="bulan" value="January">January</option>
                <option class="bulan" value="Febuary">Febuary</option>
                <option class="bulan" value="March">March</option>
                <option class="bulan" value="April">April</option>
                <option class="bulan" value="May">May</option>
                <option class="bulan" value="June">June</option>
                <option class="bulan" value="July">July</option>
                <option class="bulan" value="August">August</option>
                <option class="bulan" value="September">September</option>
                <option class="bulan" value="October">October</option>
                <option class="bulan" value="November">November</option>
                <option class="bulan" value="December">December</option>
              </select>
            </td>
          </tr>
         
          <tr>
            <td><label for="">Meter Awal</label></td>
            <td>
              <input type="hidden" name="m-awal" id="m_awal">
              <span  id="m_awalt"></span>
            </td>
          </tr>
          <tr>
            <td><label for="">Meter Akhir</label></td>
            <td>
              <input class="form-control" type="number" name="m-akhir" id="m_akhir">
            </td>
          </tr>
        </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button class="btn btn-input" id="submit-penggunaanbaru" name="submit" type="button" >Tambah</button>
    </div>
    </form>
  </div>
</div>
</div>`