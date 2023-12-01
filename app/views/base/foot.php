<?php
require_once "./app/views/base/footer.php";
?>

<script>
    const envVars = {
        apiUrl: '<?php echo BASEPATH ?>',
    };
</script>


<?php
if (strpos($_SERVER["REQUEST_URI"], "home")) {
    echo "<script src='" . BASEPATH . "/public/scripts/home.js" . "'></script>";

}
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], "product")) {
    echo "<script src='" . BASEPATH . "/public/scripts/product.js" . "'></script>";

}
?>

<?php
if (strpos($_SERVER["REQUEST_URI"], 'auth')) {
    echo "<script src='" . BASEPATH . "/public/scripts/auth.js" . "'></script>";
} ?>

<?php
if (strpos($_SERVER["REQUEST_URI"], 'cart')) {
    echo "<script src='" . BASEPATH . "/public/scripts/cart.js" . "'></script>";
} ?>


<?php
if (strpos($_SERVER["REQUEST_URI"], 'user')) {
    echo "<script src='" . BASEPATH . "/public/scripts/profile.js" . "'></script>";
} ?>

<?php
if (strpos($_SERVER["REQUEST_URI"], 'payment')) {
    echo "<script src='" . BASEPATH . "/public/scripts/payment.js" . "'></script>";
} ?>
</body>
</html>