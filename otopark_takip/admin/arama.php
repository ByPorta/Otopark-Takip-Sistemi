<?php 

    session_start();
    require_once("inc/vt.php");
    if(isset($_POST["klinik_adi"])){
        $json = array();
        sorgu("INSERT INTO klinik(klinikad,yetkili,tel,adres,durum) VALUES('".$_POST["klinik_adi"]."','".$_POST["klinik_yetkili"]."','".$_POST["klinik_tel"]."','".$_POST["klinik_adres"]."','0')",$_SESSION['musteri']);
        $query2 = sorgu("SELECT kid AS id, klinikad AS klinikadi FROM klinik ORDER BY klinikad ASC",$_SESSION['musteri']);
        while($geciciDizi = mysqli_fetch_assoc($query2)){
            $json[]= $geciciDizi;
        }
        echo json_encode($json);
    }
?>