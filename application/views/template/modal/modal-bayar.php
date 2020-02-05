<div class="modal fade" id="Bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pembayaran/input');?>" method="post">
                <h5><b><span>No.KWH </span><span class="Kwht"></span></b></h5></td>
            <table class="table">
                <tr>
                    <td>Nama Pelanggan</td>
                    <td><span class="Name"></span></td>
                </tr>
                 <tr>
                    <td><label for="">Data Pembayaran</label></td>
                <td>
                   <table height="60px">
                    <thead>
                      <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                      </tr>
                      </thead>
                      <tbody id="Data-bayar">

                      </tbody>
                   </table>
                </td>
                </tr>
                <tr>
                    <td><label>Jenis Tarif</label></td>
                    <td>
                      <span id="jTarif"></span>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td><span id="tanggal-b"></span></td>
                </tr>
                <tr>
                    <td><label>Biaya Admin</label></td>
                    <td><span id="B-admin">Rp. 2500</span></td>
                </tr>
          </table>
        <h3><label>Total Bayar &nbsp;</label><span id="modal-total-bayar"></span></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary" id="btn-validasibayar" type="button" value="Bayar">
      </div>
      </form>
    </div>
  </div>
</div>
