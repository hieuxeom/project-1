<nav class="w-screen flex justify-center shadow-bottom-normal">
    <div class="w-fix flex justify-between ">
        <div class="nav-brand">
            <img class="logo" src="<?php echo BASEPATH . "/public/img/horizontal_title.png" ?>" alt="">
        </div>
        <div class="nav-direct d-flex justify-content-center align-items-center gap-3">
            <?php if (strpos($_SERVER["REQUEST_URI"], '/auth') == false) {
                echo "<a href='#' class='button button-primary-noborder'>Trang chủ</a>
                    <a href='#' class='button button-primary-noborder'>Giới thiệu</a>
            <a href='#' class='button button-primary-noborder'>Sản phẩm</a>";
            }?>
        </div>
        <div class="nav-action d-flex">
            <a href="#" class="button button-primary-noborder">Đăng ký</a>
            <a href="#" class="button button-primary-fill">Đăng nhập</a>
        </div>
    </div>
</nav>