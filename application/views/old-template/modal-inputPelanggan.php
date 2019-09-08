<div id="modal" class="modal" role="dialog">
	<!-- konten modal-->
	<div class="modal-context">
		<!-- heading modal -->
		<span class="close" onclick="CloseModal()">&times;</span>
		<!-- body modal -->
   
		<div class="table-box">
			<form method="Post" action="<?php echo base_url('Pelanggan/input');?>">
				<table class="t-form">
					<tr>	
						<td>No KWH</td>
						<td><input type="text" name="Kwh"></td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td><input type="text" name="nama-p"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>
							<textarea name="alamat" cols="26" rows="3"></textarea>
						</td>
					</tr>
					<tr>
						<td>Gol Tarif</td>
						<td>
							<select name="tarif" id="">
								<?php foreach ($tarif as $t) {?>
									<option value="<?= $t->id_tarif;?>"><?= $t->tarifperkwh;?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Input"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
