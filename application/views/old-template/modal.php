<?php foreach ($t_perangkat as $p) {?>

<div id="update<?php echo $p ->kode_perangkat?>" class="modal" role="dialog">
    <!-- konten modal-->
    <div class="modal-perangkat">
        <!-- heading modal -->
        <span class="close" onclick="CloseModal()">&times;</span>
        <!-- body modals -->

        <form id="form-update<?php echo $p ->id_m_perangkat?>" action="<?php echo site_url('update/perangkat/'.$p ->id_m_perangkat)?>"
            method="post">
            <span><strong>UPDATE</strong> Perangkat</span>

            <table class="form-item">
                <tr>
                    <td>
                        ID Perangkat
                    </td>
                    <td>
                        <span>
                            <?php echo $p->kode_perangkat?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Vendor
                    </td>
                    <td>

                        <select id="Nama_vendor" name="Nama_vendor" class="drop-item">
                            <?php foreach ($m_vendor as $v) { ?>
                            <option value="<?php echo $v ->id_vendor ?>">
                                <?php echo $v->nama_vendor; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>
                        <select id="Nama_branch" name="Nama_branch" class="drop-item">
                            <?php foreach ($m_branch as $v) { ?>
                            <option value="<?php echo $v ->id_branch ?>">
                                <?php echo $v->nama_branch; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ID ATM</td>
                    <td>
                        <select name="id_atm" id="id_atm" class="drop-item">
                            <?php foreach ($m_atm as $v) { ?>
                            <option value="<?php echo $v ->id_atm ?>">
                                <?php echo $v->id_atm; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>
                        Region
                    </td>
                    <td>
                        <select id="region" name="region" class="drop-item">
                            <?php
								foreach ($m_region as $v){
									echo "<option value= $v->id_region> $v->nama_region </option>";	
								}
							?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Perangkat
                    </td>
                    <td>
                        <input id="namaperangkat" type="text" name="jenisperangkat" value="<?php echo $p->jenis_perangkat?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        PIC
                    </td>
                    <td>
                        <input type="text" name="pic" value=" <?php echo $p->pic?>">
                    </td>
                </tr>
                <tr>
                    <td>Kontak PIC</td>
                    <td><textarea name="k_pic" id="pic" cols="22" rows="4"><?php echo $p->kontak_pic?></textarea></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit" value="Submit" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>



<!-- ASSIGN -->


<?php foreach ($t_perangkat as $tv) { ?>
<div id="assign<?php echo $tv->kode_perangkat ?>" class="modal" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">ASSIGN</h4>
                <span class="close" onclick="CloseModal()">&times;</span>

            </div>
            <!-- body modal -->

            <form class="form-upt" action="<?php echo base_url(). 'main/insert_data'; ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <table>
                            <tr>
                                <td colspan="1"><input type="hidden" name="id" class="form-control" value="<?php echo $tv->id_lokasi_perangkat ?>"></td>
                            </tr>
                            <tr>
                                <td> <label>Nama Perangkat</label></td>
                                <td><span>
                                        <?php echo $tv->nama_perangkat ?></span></td>
                            </tr>
                            <tr>
                                <td> <label>vendor lama</label></td>
                                <td><span>
                                        <?php echo $tv->nama_vendor ?></span></td>
                            </tr>
                            <tr>
                                <td><label>pic lama</label> </td>
                                <td><span>
                                        <?php echo $tv->pic ?></span></td>
                            </tr>
                            <tr>
                                <td><label>region lama</label> </td>
                                <td> <span>
                                        <?php echo $tv->region ?></span></td>
                            </tr>
                            <tr>
                                <td><label>tgl perpindahan</label></td>
                                <td> <input type="date" name="tgl" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>vendor baru</label></td>
                                <td><input type="text" name="vb" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>region baru</label></td>
                                <td><select name="rb" class="dropp-item">
                                        <?php foreach ($m_region as $tv) { ?>
                                        <option value="<?php echo $tv->nama_region ?>">
                                            <?php echo $tv->nama_region; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>pic baru</label></td>
                                <td><input type="text" name="pb" class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn upt-btn btn-success" value="Simpan"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>