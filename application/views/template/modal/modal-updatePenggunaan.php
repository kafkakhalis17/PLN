<?php foreach ($penggunaan as $p) {?>
<div class="modal fade" id="UpMember<?php echo $p->id_penggunaan; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('penggunaan/Update');?>" method="post">
					<table class="modal-table">
						<input autocomplete="off" type="hidden" name="id" value="<?php echo $p->id_penggunaan ?>">
						<tr>
							<td><label>Nama Siswa</label></td>
							<td><input autocomplete="off" type="text" name="nama" value="<?= $p->nama_penggunaan?>"></td>
						</tr>
						<tr>
							<td><label for="">No KWh</label></td>
							<td>
								<input type="text" name="kwh" value="<?= $p->nomor_kwh?>">
							</td>
						</tr>
						<tr>
							<td><label for="">Alamat</label></td>
							<td>
								<textarea name="alamat" id="" cols="30" rows="4"><?= $p->alamat?></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="">Jenis Tarif</label>
							</td>
							<td>
								<select name="tarif" id="">
									<?php 
                              foreach ($tarif as $t) {
                                 if ($t->id_tarif===$p->id_tarif) {
                                 echo "<option selected value=".$p->id_tarif.">$t->daya</option>";
                                 }else {
                                 echo "<option value=".$t->id_tarif.">$t->daya</option>";
                                 }
                              }
                           ?>
								</select>
							</td>
						</tr>
					</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input class="btn btn-input" name="update" type="submit" value="Update">
			</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
