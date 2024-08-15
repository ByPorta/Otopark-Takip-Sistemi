<?php  require 'header.php'; ?>

<br>


<table class="table table-dark text-center" >
  <thead>
    <tr>
      <th scope="col">SIRA NO</th>
      <th scope="col">PLAKA</th>
      <th scope="col">ARAC KAT </th>
      <th scope="col">ARAC BLOK</th>
      <th scope="col">ARAÇ GİRİŞ TARİHİ</th>
      <th scope="col">ARAÇ ÇIKIŞ TARİHİ</th>
      <th scope="col">KAYIT EDEN PERSONEL</th>
      
    </tr>
  </thead>





  <?php  
   $kaydet = $db ->query('SELECT 
   arac_kayit.*, kullanici_giris.adsoyad AS user_name, otopark_havuz.giriscikis AS durum
   FROM otopark_havuz 
   INNER JOIN arac_kayit ON arac_kayit.arac_id = otopark_havuz.arac_id
   INNER JOIN kullanici_giris ON kullanici_giris.id = otopark_havuz.kullanici_id
   ORDER BY otopark_havuz.giriscikis DESC 
   ');
   $sira = 0;
   foreach ($kaydet as $kayit) {
     $sira++;
    $id = $kayit['arac_id'];
    $plaka = $kayit['arac_plaka'];
    $kat = $kayit['arac_kat'];
    $blok = $kayit['arac_blok'];
    $giris_tarihi = $kayit['arac_giris_tarih'];
    $cikis_tarih = $kayit['arac_cikis_tarih'];
    $user_name = $kayit['user_name'];
   
   
  ?>
  <tbody> 
 
  <tr>
    <th class="<?php echo ($kayit['durum'] == 0 ) ? "bg-danger":"bg-success"; ?>" ><?php echo $sira ?></th> 
      <td><?php echo $plaka ?></td>
      <td><?php echo $kat ?></td>
      <td><?php echo $blok ?></td>
      <td><?php echo $giris_tarihi ?></td>
      <td><?php if ($kayit['arac_cikis_tarih']=="") {
        echo '<b style="color:red;">HENÜZ ARAÇ ÇIKIŞ YAPMADI</b>';
      }else{
         echo $cikis_tarih ;
      } ?></td>
      <td><?php echo $user_name ?></td>
      <td><a class="btn btn-primary" href="duzenle.php?id=<?php echo $id ?>" role="button">DÜZENLE</a></td>
      <td><a class="btn btn-success" href="araccikis.php?id=<?php echo $id ?>" role="button">ARAÇ ÇIKIŞ</a></td>
      <td><a class="btn btn-danger" href="sil.php?id=<?php echo $id ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
    </tr>
    
  </tbody>
  <?php }
   ?>
</table>





<?php  require 'footer.php'; ?>