<main class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 p-5">
    <div class="container-lg row row-cols-xl-2 row-cols-lg-1 round-16">
        <div class="bg-white d-flex justify-content-center align-items-center p-5">
            <!--            <img src="--><?php //echo BASEPATH . "/public/img/test-img.png" ?><!--" alt="">-->
            <img src="<?php echo $productData["img_path"] ?>" alt="">
        </div>
        <div class="p-3 d-flex flex-column gap-3" style="background-color: var(--purple-100)">
            <div class="product-header d-flex flex-column gap-2">
                <h2 class="heading-2"><?php echo $productData["prod_name"] ?></h2>
                <div>
                    <a href="#" class="text-decoration-none badge rounded-pill px-3 py-2 bg-secondary"><p
                                class="color-white m-0 text-small"><?php echo $productData["category_name"] ?></p></a>
                    <a href="#" class="text-decoration-none badge rounded-pill px-3 py-2 bg-secondary"><p
                                class="color-white m-0 text-small">4/5 Điểm đánh giá (9999 Lượt đánh giá)</p></a>
                    <a href="#" class="text-decoration-none badge rounded-pill px-3 py-2 bg-secondary"><i
                                class="text-small color-white fa-regular fa-bookmark"></i></a>
                </div>
            </div>
            <div class="d-flex flex-column">
                <p class="text-super-large text-bold m-0">Giá:</p>
                <h1 class="heading-1 text-helvetica color-primary m-0"><?php echo $productData["prod_price"] ?>đ</h1>
            </div>
            <div class="d-flex flex-column">
                <p class="text-super-large text-bold m-0">Số lượng:</p>
                <div class="d-flex align-items-center gap-3">
                    <div class="w-1-5 input-group">
                        <button class="input-group-text bg-third color-white" id="">-</button>
                        <input type="text" class="text-center form-control" value="0">
                        <button class="input-group-text bg-third color-white" id="">+</button>
                    </div>
                    <p class="m-0 text-small">(<strong>999</strong> sản phẩm có sẵn)</p>
                </div>
            </div>
            <div class="pt-3">
                <button class="btn btn-primary btn-lg rounded-pill d-flex gap-2 align-items-center">
                    <i class="color-white text-normal fa-solid fa-cart-plus"></i>
                    Thêm sản phẩm vào giỏ hàng
                </button>
            </div>
        </div>
    </div>
    <div class="container-lg d-flex flex-column gap-3 px-4 py-3 bg-white round-16">
        <h3 class="heading-3 m-0">Mô tả sản phẩm</h3>
        <p class="m-0 text-normal"><?php echo $productData["prod_desc"] ?></p>

    </div>
    <div class="container-lg bg-white d-flex flex-column gap-3 px-4 py-3 round-16">
        <div class="w-full d-flex justify-content-between align-items-center">
            <h3 class="heading-3 m-0">Đánh giá sản phẩm</h3>
            <a href="#" class="m-0 text-small text-decoration-none badge bg-secondary  px-3 py-2 ">4/5 Điểm đánh giá
                (9999 Lượt đánh giá)</a>
        </div>

        <?php
        foreach ($listRateData as $rate) {
            echo "<div class='d-flex flex-start shadow-sm round-8 p-3' style='background: var(--rose-50)'>
                <div class='w-full d-flex flex-column gap-2'>
                    <div class='d-flex justify-content-between align-items-center'>
                        <div class='d-flex align-items-center gap-2'>
                            <p class=' text-normal fw-bold mb-1'>$rate[username]</p>
                            <span class='badge bg-primary d-flex justify-content-center align-items-center'>$rate[rate_star] <i
                                        class='color-white ps-1 fa-solid fa-star'></i></span>
                        </div>
                        <div class=''>
                            <p class='m-0' style='color: var(--text-dark-500)'>
                                $rate[rate_date]
                            </p>
                        </div>
                    </div>
                    <p class='m-0'>
                        $rate[rate_text]
                    </p>
                </div>
            </div>";
        } ?>
    </div>
    </div>
    <div class="container-lg bg-white d-flex flex-column gap-3 px-4 py-3 round-16">
        <div class="w-full d-flex justify-content-between align-items-center">
            <h3 class="heading-3 m-0">Bình luận sản phẩm</h3>
        </div>
        <div id="comment-form">
            <form action="<?php echo BASEPATH . "/comment?productId=$productData[prod_id]" ?>" method="post"
                  class="d-flex flex-column gap-2 justify-content-end">
                <textarea class="form-control position-relative" name="comment_text" id="" rows="5"></textarea>
                <input class="btn btn-primary" type="submit" value="Bình luận">

            </form>
        </div>
        <?php
        foreach ($listComment as $comment) {
            echo "<div id='cmtId=$comment[comment_id]' class='d-flex flex-start shadow-sm round-8 p-3' style='background: var(--rose-50)'>
            <div class='w-full d-flex flex-column gap-2'>
                <div class='d-flex justify-content-between align-items-center'>
                    <div class='d-flex align-items-center gap-2'>
                        <p class=' text-normal fw-bold mb-1'>$comment[username]</p>
                    </div>
                    <div class=''>
                        <p class='m-0' style='color: var(--text-dark-500)'>
                            $comment[comment_time]
                        </p>
                    </div>
                </div>
                <p class='m-0'>$comment[comment_text]</p>
            </div>
        </div>
            ";
        }
        ?>

    </div>
</main>
