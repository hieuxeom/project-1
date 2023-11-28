<?php
require_once "./app/views/base/footer.php";
?>

<script>
    const envVars = {
        apiUrl: 'http://localhost/project-1',
    };
</script>


<?php
if (strpos($_SERVER["REQUEST_URI"], "/home")) {
    echo "<script src='" . BASEPATH . "/public/scripts/home.js" . "'></script>";

}
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], "/product")) {
    echo "<script src='" . BASEPATH . "/public/scripts/product.js" . "'></script>";

}
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], '/auth')) {
    echo "<script src='" . BASEPATH . "/public/scripts/auth.js" . "'></script>";
} ?>

<?php
if (strpos($_SERVER["REQUEST_URI"], '/cart')) {
    echo "<script src='" . BASEPATH . "/public/scripts/cart.js" . "'></script>";
} ?>
</body>
</html>