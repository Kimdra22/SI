<?php

  require("database.php");

  if(isset($_POST['pemilik'])){
      $pk = $_POST['pk'];
      $pemilik = $_POST['pemilik'];
      $ktp = $_POST['ktp'];
      $stnk = $_POST['stnk'];
      $bpkb = $_POST['bpkb'];
      $scktp = $_POST['scktp'];
      $scstnk = $_POST['scstnk'];
      $scbpkb = $_POST['scbpkb'];
      $sql = "UPDATE tb_pajak SET tb_pajak.`pemilik` = '$pemilik', tb_pajak.`ktp` = '$ktp', tb_pajak.`stnk` = '$stnk', tb_pajak.`bpkb` = '$bpkb', tb_pajak.`scktp` = '$scktp', tb_pajak.`scstnk` = '$scstnk', tb_pajak.`scbpkb` = '$scbpkb' WHERE tb_pajak.`pk` = '$pk'";
      if(mysqli_query($db,$sql)){
        echo "Berhasil memperbaharui Data";
      }else{
        echo "Error memperbaharui Data".mysqli_error($conn);
      }
  }

?>