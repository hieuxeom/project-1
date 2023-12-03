<main class="container-fluid flex flex-col items-center bg-">
    <div id="hero-section" class="container-xl d-flex py-5">
        <div class="w-1-2 d-flex flex-column gap-2">
            <div class="header-text">
                <h1 class="display-1 text-helvetica text-uppercase text-bold">ShopBake</h1>
                <h2 class="text-helvetica">Đưa vị ngọt lên môi</h2>
            </div>
            <div class="text-box">
                <p>ShopBake cung cấp sỉ & lẻ các loại bánh, kẹo.</p>
                <p>ShopBake cũng nhận làm bánh sinh nhật, bánh custom theo
                    ý khách hàng.</p>
                <br>
                <p>Liên hệ ngay để biết thêm thông tin chi tiết khách hàng nhé ^^</p>
            </div>
            <div class="button-box d-flex flex-row gap-3">
                <a href="#" class="button button-primary-fill text-large">Liên hệ ngay</a>
                <a href="#" class="button button-primary-outline text-large">Xem sản phẩm</a>
            </div>
        </div>
        <div class="w-1-2 d-flex justify-content-center align-items-center">
            <img class="container-fluid" src="<?php echo BASEPATH . "/public/img/hero.png" ?>" alt="">
        </div>
    </div>
    <div id="best-sell-section"
         class="container-xl d-flex flex-column justify-content-center align-items-center my-5">
        <div class="container-fluid">
            <h1 class="heading-1 text-helvetica text-center text-uppercase">Sản phẩm bán chạy</h1>
        </div>
        <div class="container-fluid mt-5 row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 p-0 justify-content-center">
            <?php
            foreach ($listTopBestSeller as $product) {
                echo "<div class='card w-1-4'>
                <div class='d-flex justify-content-center align-items-center p-2'>
                    <img src='$product[img_path]' class='card-img-top' alt='...'>
                </div>
                <div class='card-body'>
                    <h5 class='card-title text-truncate'>$product[prod_name]</h5>
                    <p class='card-text'>($product[views] lượt xem)</p>
                    <div class='d-flex justify-content-between align-items-center'>
                        <a href='" . BASEPATH . "/product/details/$product[prod_id]' class='btn btn-primary'>Xem sản phẩm</a>
                        <p class='m-0 text-super-large text-bold color-primary'>" . number_format($product["prod_price"], thousands_separator: ".",decimal_separator: ",") . "đ</p>
                    </div>
                </div>
            </div>";
            }
            ?>
        </div>
    </div>
    <div id="faq-section" class="container-xl d-flex flex-column my-5">
        <div class="container-fluid">
            <h1 class="heading-1 text-helvetica text-center text-uppercase">Câu hỏi thường gặp</h1>
        </div>
        <div class="py-3" id="faq-container">
            <div class="faq-item">
                <div data-answer="1"
                     class="question d-flex justify-content-between align-items-center py-3 cursor-pointer">
                    <p class="text-super-large color-primary text-bold m-0">Tôi có thể xem lịch sử mua hàng của mình không?</p>
                    <i class="fa-solid fa-chevron-up color-primary"></i>
                </div>
                <div id="answer1" class="answer pb-16">
                    <p class="text-normal">Có, bạn có thể xem lịch sử dụng hàng của mình tại đây: <a href="<?php echo BASEPATH ?>/user/orderHistory" class="btn btn-secondary btn-sm">Xem lịch sử mua hàng</a></p>
                </div>
            </div>
            <div class="faq-item">
                <div data-answer="1"
                     class="question d-flex justify-content-between align-items-center py-3 cursor-pointer">
                    <p class="text-super-large color-primary text-bold m-0">Tôi có thể xem lịch sử bình luận của mình không?</p>
                    <i class="fa-solid fa-chevron-up color-primary"></i>
                </div>
                <div id="answer1" class="answer pb-16">
                    <p class="text-normal">Có, bạn có thể xem lịch sử bình luận của mình tại đây: <a href="<?php echo BASEPATH ?>/user/commentHistory" class="btn btn-secondary btn-sm">Xem lịch sử bình luận</a></p>
                </div>
            </div>
        </div>
    </div>
</main>