<?php
require_once "./app/views/base/footer.php";
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], "/home")) {
    echo "<script src='" . BASEPATH . "/public/scripts/home.js" . "'></script>";

}
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], '/auth')) {
    echo "<script src='" . BASEPATH . "/public/scripts/auth.js" . "'></script>";
} ?>
</body>
</html>