<?php

setcookie("Session", "", time()-3600, "/");

header("Location: http://reportesgpm.ga");
die();
?>

