<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <table style="width:538px;" align="center" cellspacing="0" cellpadding="0">
      <tr>
         <td style="background: rgb(0,255,132); background: linear-gradient(121deg, rgba(0,255,132,1) 0%, rgba(0,121,218,1) 100%); padding:10px"><img width="40px"  src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" alt=""></td>
      </tr>
      <tr>
         <td style="padding:20px 20px 10px 20px;"><span style="font-size:24px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Invoice Pembayaran</span></td>
      </tr>
      <tr>
         <td style="padding-left:20px;">
            <p style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">
               Pendaftaran pasang baru anda baru saja di konfirmasi <br>
               dengan pelanggan atas nama <b><?= $namapelanggan?></b>, berikut <br> 
               adalah data pemasangan dan total harga yang akan diproses.
            </p>
            <table style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">
               <tr>
                  <td style="padding:20px 0px 0px 20px;">ID PMH PLG</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $idpelanggan ?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Nama Pemohon</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $namapemohon?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Nama Pelanggan</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $namapelanggan?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Alamat Pelanggan</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $alamat?>,<?= $kelurahan?> <?= $kecamatan?>, <?= $kota?> <?= $provinsi?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Peruntukan</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $peruntukan?></td>
               </tr> 
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Keperluan</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $keperluan?></td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td style="padding:20px 20px 10px 20px;"><span style="font-size:24px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Detail Bayar</span></td>
      </tr>
      <tr>
         <td>
            <table style="margin-left:20px">
               <tr>
                  <td style="padding-right:35px">
                      <span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">Rupiah Biaya penyambungan</span>
                  </td>
                  <td><span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">Rp. <?= $hargapasang?></span></td>
               </tr>
               <tr>
                  <td style="padding-right:35px">
                      <span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">Rupiah Jaminan Langganan (900 x 72)</span>
                  </td>
                  <td><span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">Rp. <?= $hargajaminan?></span></td>
               </tr>
               <tr>
                  <td style="padding-right:35px">
                      <span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Estimasi Total yang harus dibayar</span>
                  </td>
                  <td><span style="font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Rp. <?= $hargatotal?></span></td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td style="padding:20px 20px 10px 20px;"><span style="font-size:24px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Kode Bayar</span><div style="margin-top:20px; font-size:24px;font-family:Arial,Helvetica,sans-serif;font-weight:bold"><?= $kodeunik?></div></td>
      </tr>
   </table>
   <!-- <table style="width:538px;background-color:#393836" align="center" cellspacing="0" cellpadding="0">
	<tbody><tr>
		<td style="height:65px;background-color:#171a21;border-bottom:1px solid #4d4b48">
			<img src="https://ci3.googleusercontent.com/proxy/ZknE9zkOuJ1Vmc90WHsXDefxBUQ4Du5mkvk-T6wLJiUYmPo4FD9I4KHsayEpR2G4Qd7LolqgKDZnjFWpdFFPAD-jS8JnYwA37My11emoAb7Pphg41j6nidayv4-iGTvk-hQ=s0-d-e1-ft#https://steamstore-a.akamaihd.net/public/images/email/email_header_logo.png?v=1" width="538" height="65" alt="Steam" class="CToWUd">
		</td>
	</tr>
	<tr>
		<td bgcolor="#17212e">
			<table width="470" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-left:5px;padding-right:5px;padding-bottom:10px">

				<tbody><tr bgcolor="#17212e">
					<td style="padding-top:32px">
					<span style="font-size:24px;color:#66c0f4;font-family:Arial,Helvetica,sans-serif;font-weight:bold">
						Hello <a href="mailto:khaliskafka17@gmail.com" target="_blank">khaliskafka17@gmail.com</a>					</span><br>
					</td>
				</tr>

				<tr>
					<td style="padding-top:12px;font-size:17px;color:#c6d4df;font-family:Arial,Helvetica,sans-serif;font-weight:bold">
						Here is the code you need to change your Steam login credentials:					</td>
				</tr>

				<tr>
					<td style="padding-top:24px;padding-bottom:24px">
						<div>
							<span style="font-size:24px;color:#66c0f4;font-family:Arial,Helvetica,sans-serif;font-weight:bold">N5CR2</span>
							
						</div>
					</td>
				</tr>

				<tr bgcolor="#121a25">
					<td style="padding:20px;font-size:12px;line-height:17px;color:#c6d4df;font-family:Arial,Helvetica,sans-serif">
						If you are not trying to change your Steam login credentials, please ignore this email. It is possible that another user entered their login information incorrectly.					</td>
				</tr>

				<tr>
					<td style="font-size:12px;color:#6d7880;padding-top:16px;padding-bottom:60px">
						The Steam Support Team<br>
						<a style="color:#8f98a0" href="https://help.steampowered.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://help.steampowered.com/&amp;source=gmail&amp;ust=1579152311218000&amp;usg=AFQjCNGYaCXFekp1daV0N8pDuw9yCq95nQ">https://help.steampowered.com/</a><br>
					</td>
				</tr>

			</tbody></table>
		</td>
	</tr>

	<tr style="background-color:#000000">
		<td style="padding:12px 24px">
			<table cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td width="92">
						<img src="https://ci3.googleusercontent.com/proxy/RTke79cAfws0xTKKV-UlcUM23VNQPTyq8DTMQvxn2_-fQqsuC2mLlStLZpFMkLphPfm4Kk4vATlMgFZPxydM7owdSuTUYlB8rmj5kjybdbtvZuYtDkhWsg=s0-d-e1-ft#https://steamstore-a.akamaihd.net/public/images/logo_valve_footer.jpg" width="92" height="26" alt="Valve®" class="CToWUd">
					</td>
					<td style="font-size:11px;color:#595959;padding-left:12px">
						© Valve Corporation.  PO Box 1688 Bellevue, WA 98009.<br>
						All rights reserved. All trademarks are property of their respective owners in the US and other countries.					</td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table> -->
</body>
</html>