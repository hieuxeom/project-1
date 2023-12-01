<main class="container-fluid">
    <div class="container-xl py-3">
        <div class="py-3">
            <h2 class="heading-2">Tất cả đánh giá của sản phẩm:</h2>
            <h2 class="heading-2"><?php echo $productData["prod_name"] ?></h2>
        </div>
        <div class="bg-white p-3 round-16 shadow-sm">

            <div class="d-flex flex-column gap-2">
                <div class="w-full d-flex justify-content-between align-items-center">
                    <p class="m-0 text-small text-decoration-none badge bg-secondary px-3 py-2 ">4/5 Điểm đánh giá (9999 Lượt đánh giá)</p>
                    <a href="<?php echo BASEPATH . "/product/details/$productData[prod_id]"?>" class="m-0 text-normal text-decoration-none btn btn-primary">Quay lại trang sản phẩm</a>
                </div>
                <?php
                foreach ($listRateData as $rate) {
                    echo "<div id='rateId=$rate[rate_id]' class='d-flex flex-start shadow-sm round-8 p-3' style='background: var(--rose-50)'>
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
    </div>

</main>