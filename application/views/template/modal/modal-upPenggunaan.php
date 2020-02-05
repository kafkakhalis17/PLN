<?php foreach ($penggunaan as $p) {?>
<div class="modal fade" id="upPenggunaan<?=$p->id_penggunaan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Penggunaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Penggunaan/update');?>" method="post">
					<table class="modal-table">
						<input type="hidden" name="id" value="<?= $p->id_penggunaan?>">
						<tr>
							<td><label>ID Pelanggan</label></td>
							<td>
								<select name="pelanggan" id="caripelanggan">
									<?php foreach ($Pelanggan as $pl) {
                              if ($p->id_pelanggan == $pl->id_pelanggan) {?>
									      <option selected value="<?= $p->id_pelanggan?>"><?= $pl->nomor_kwh?></option>
                           <?php 
                              } 
                              else {
                                 echo "<option  value='{$pl->id_pelanggan}'>{$pl->nomor_kwh}</option>";
                              }
                           }
                           ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="">Bulan</label></td>
							<td>
								<select name="bulan" id="select-bulan">
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
								<select name="tahun" class="tahun" width="120px">

								</select>
							</td>
						</tr>
						<tr>
							<td><label for="">Meter Awal</label></td>
							<td>
								<input type="number" name="m-awal" value="<?= $p->meter_awal?>">
							</td>
						</tr>
						<tr>
							<td><label for="">Meter Akhir</label></td>
							<td>
								<input type="number" name="m-akhir" value="<?= $p->meter_akhir?>">
							</td>
						</tr>
					</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input class="btn btn-input" name="submit" type="submit" value="Update">
			</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
