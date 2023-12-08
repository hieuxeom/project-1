<?php
$head_list = [
    "Members" => "users",
    "Danh mục" => "categories",
    "Sản phẩm" => "products",
    "Kho" => "stocks",
    "Bình luận" => "comments",
    "Đánh giá" => "rates",
    "Giỏ hàng/Đơn hàng" => "carts",
    "Voucher" => "vouchers",
]
?>

<div>
    <div class="row row-cols-xxl-4 row-cols-md-2 g-2 mb-3">
        <div class="mx-1 col d-flex flex-column bg-third px-3 py-2 round-8">
            <h2 class="m-0 heading-3 color-white">Tổng số đơn hàng</h2>
            <h1 class="m-0 text-display text-helvetica color-white"><?php echo $analyticsArray["totalOrders"] ?></h1>
        </div>
        <div class="mx-1 col d-flex flex-column bg-third px-3 py-2 round-8 ">
            <h2 class="m-0 heading-3 color-white">Tổng số đăng kí mới</h2>
            <h1 class="m-0 text-display text-helvetica color-white"><?php echo $analyticsArray["totalUsers"] ?></h1>
        </div>
        <div class="mx-1 col d-flex flex-column bg-third px-3 py-2 round-8 ">
            <h2 class="m-0 heading-3 color-white">Tổng số tiền hàng bán được</h2>
            <h1 class="m-0 text-display text-helvetica color-white"><?php echo number_format($analyticsArray["totalRevenue"], thousands_separator: ".", decimal_separator: ",") ?>
                đ</h1>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <?php
        foreach ($head_list as $item_key => $item_value) {
            echo "<li class='nav-item'>
                    <a href='" . BASEPATH . "/admin/$item_value' class='nav-link color-primary " . (strpos($_SERVER["REQUEST_URI"], $item_value) ? "active" : "") . "'>$item_key</a>
                  </li>";
        }
        ?>

    </ul>
</div>