<?php
$imefajla = $_POST['fajl'];
 
   header('Content-Disposition: inline; filename="'.$imefajla.'"');
      header('Content-Type: application/pdf');
      header('Content-Length: '.filesize($imefajla));
      readfile($imefajla);
?>