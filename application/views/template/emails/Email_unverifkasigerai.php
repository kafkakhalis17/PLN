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
      <td style="padding:20px 20px 10px 20px;"><span style="font-size:24px;font-family:Arial,Helvetica,sans-serif;font-weight:bold">Verifikasi Kerja Sama Gagal</span></td>
      </tr>
      <tr>
         <td style="padding-left:20px;">
            <p style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">
               Pendaftaran Gerai anda baru saja gagal dibuat <br>
               dengan Penanggung Jawab atas nama <b><?= $namapenaggungjawab ?></b>, berikut detail data anda,
               data anda tidak memenuhi persyaratan yang telah dispakati.
            </p>
            <table style="font-size:14px;font-family:Arial,Helvetica,sans-serif;">
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Nama Gerai</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $namagerai ?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Nama Penanggung Jawab</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $namapenaggungjawab ?></td>
               </tr>
               <tr>
                  <td style="padding:20px 0px 0px 20px;">Alamat Gerai</td>
                  <td style="padding:20px 0px 0px 20px;"><?= $alamat?></td>
               </tr> 
            </table>
         </td>
         <tr>
            <td style="padding-left:20px;">
               <h5>Silakan Hubungi layanan kami untuk informasi lebih lanjut</h5>
            </td>
         </tr>
      </tr>
   </table>
</body>
</html>