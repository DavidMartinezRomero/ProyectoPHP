<?php

session_start();
session_destroy();

echo '<script>
setTimeout(function(){ document.location.href="index.php"; }, 000);
</script>';

?>