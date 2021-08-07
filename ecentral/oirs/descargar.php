<?php
header('Content-disposition: attachment; filename='.$_GET["archivo"]);
header('Content-type: image/jpeg ');
readfile('uploads/'.$_GET["archivo"]);
?>