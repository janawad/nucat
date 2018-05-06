<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$file_name");

header("Pragma: no-cache");

header("Expires: 0"); 

?>

<?php echo $table; ?> 