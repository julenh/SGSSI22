<?php 
include "config.php";
session_start();
session_destroy();
echo '<script>
        alert("Has cerrado la sesión");
        window.location = "index.php";
        </script>';
?>

