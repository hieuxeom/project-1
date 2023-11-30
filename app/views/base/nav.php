<nav class="container-fluid d-flex justify-content-center shadow-xl ">
    <div class="container-lg d-flex justify-content-between">
        <div class="nav-brand">
            <img class="logo" src="<?php echo BASEPATH . "/public/img/horizontal_title.png" ?>" alt="">
        </div>
        <div class="nav-direct d-flex justify-content-center align-items-center gap-3">
            <?php if (strpos($_SERVER["REQUEST_URI"], '/auth') == false) {
                echo "<a href='" . BASEPATH . "/home' class='button button-primary-noborder'>Trang chủ</a>
                    <a href='" . BASEPATH . "/about' class='button button-primary-noborder'>Giới thiệu</a>
            <a href='" . BASEPATH . "/product' class='button button-primary-noborder'>Sản phẩm</a>";
            } ?>
        </div>
        <div class="nav-action d-flex justify-content-center align-items-center gap-2">
            <?php
            if ($_SESSION['is_login'] == 1) {

                echo "
            <div class='d-flex justify-content-center align-items-center gap-3'>
                <a href='" . BASEPATH . "/user'><i class='color-primary fa-solid fa-user'></i></a>
                <a href='" . BASEPATH . "/cart'><i class='color-primary fa-solid fa-cart-shopping'></i></a>" .($_SESSION["role"] == "admin" ? "<a href='" . BASEPATH . "/admin'><i class='color-primary fa-solid fa-shield'></i></a>" : "" )
                ."
            </div>
            <a href='" . BASEPATH . "/auth/logout' class='btn btn-outline-primary m-0' role='button'>Đăng xuất</a>
            ";


            } else {
                echo "<a href='" . BASEPATH . "/auth/register' class='btn btn-outline-primary m-0' role='button'>Đăng ký</a>
            <a href='" . BASEPATH . "/auth/login' class='btn btn-primary m-0' role='button'>Đăng nhập</a>";
            }
            ?>
        </div>
    </div>
</nav>