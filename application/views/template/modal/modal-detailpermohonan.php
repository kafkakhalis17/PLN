<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Detail Pemohonan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <div class="loading-image loading-modal text-center">
              <img src="<?= base_url('assets/images/loading-img.gif')?>" alt="">
            </div>
            <div id="detail-data">
             
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="modal-footer-permohonan">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" id="btn-validasibayar" onclick="unverifikasi()">Tolak Data</button>
        <button class="btn btn-primary" id="btn-validasibayar" onclick="verifikasi()"> Verifikasi Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
