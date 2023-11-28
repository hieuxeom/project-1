<?php
$shipCost = 35000;
$discountCost = 0;
$viewMode = ($_SESSION["role"] == "admin") && ($cartData["user_id"] != $_SESSION["user_id"]) ? 0 : 1;

?>

<main class="container-fluid">
    <div class="container-lg py-3">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="bg-white p-3 round-8">
                    <div>
                        <h2 class="heading-2">Giỏ hàng</h2>
                        <input type="hidden" id="cartId" value="<?php echo $cartData["cart_id"]; ?>">
                    </div>
                    <div>
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($cartItems as $item) {
                                        echo "<tr class=''>
                                        <td>
                                            <div class='d-flex align-items-center gap-3'>
                                                <img width='20%' src='$item[img_path]' alt=''>
                                                <p class='text-normal text-break m-0 text-bold'>$item[prod_name]</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='d-flex align-items-center gap-1'>";
                                        if ($viewMode) {
                                            echo "<button class='input-group-text bg-third color-white minus'
                                                onclick='minusQuantity($item[prod_id])'>-
                                                </button>";
                                        }

                                        echo "<input type='text' class='text-center form-control quantity-input' value='$item[quantity]' id='prodId=$item[prod_id]' " . (!$viewMode ? "disabled" : "") . ">";

                                        if ($viewMode) {
                                            echo "<button class='input-group-text bg-third color-white'
                                                        onclick='addQuantity($item[prod_id])'>+
                                                </button>";
                                        }

                                        echo "
                                            </div>
                                        </td>
                                        <td>
                                            <p class='text-normal text-bold m-0'>" . number_format((int)$item["prod_price"] * (int)$item["quantity"], thousands_separator: ".", decimal_separator: ",") . "đ</p>
                                        </td>
                                        <td>
                                            <a href='#' class='btn btn-primary'>Xóa</a>
                                        </td>
                                    </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="bg-white p-3 round-8">
                    <div>
                        <h2 class="heading-2 text-center">Tạm tính</h2>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <form action="<?php echo BASEPATH ?>/cart/voucher" method="post"
                              class="d-flex flex-column gap-1">
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control" name="voucher_code"
                                       placeholder="Nhập mã khuyến mãi"
                                       value="<?php echo $cartData["voucher_id"] ?>" <?php echo !$viewMode ? "readonly" : "" ?>>
                            </div>
                            <?php

                            echo $viewMode ? "<div class='form-group'>
                                <input type='submit' class='form-control btn btn-secondary' value='Áp dụng'>
                            </div>" : ""; ?>
                        </form>
                        <hr>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Tạm tính</p>
                                <p class="text-bold text-normal m-0"
                                   id="preBill"><?php echo number_format($cartData["cart_total"], thousands_separator: ".", decimal_separator: ",") ?>
                                    đ</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Giảm giá</p>
                                <?php
                                if (isset($voucherData) && $voucherData["type"] == "product") {
                                    $discountCost = $cartData["cart_total"] * $voucherData["voucher_discount"] / 100;
                                    echo "<p class='text-bold text-normal m-0' id='discountCost'><strong class='me-1'>(-$voucherData[voucher_discount]%)</strong>" . (number_format($discountCost, thousands_separator: ".", decimal_separator: ",")) . "đ</p>";
                                } else {
                                    echo "<p class='text-bold text-normal m-0' id='discountCost'>" . number_format($discountCost, thousands_separator: ".", decimal_separator: ",") . "đ</p>";
                                }
                                ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Phí vận chuyển</p>
                                <?php
                                if (isset($voucherData) && $voucherData["type"] == "ship") {
                                    $shipCost = 0;
                                    echo "<p class='text-bold text-normal m-0' id='discountCost'>" . number_format($shipCost, thousands_separator: ".", decimal_separator: ",") . "đ</p>";
                                } else {
                                    echo "<p class='text-bold text-normal m-0' id='discountCost'>" . number_format($shipCost, thousands_separator: ".", decimal_separator: ",") . "đ</p>";
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-normal m-0" id="">Tổng tiền</p>
                                <p class="text-bold text-super-large m-0"
                                   id="shipCost"><?php echo number_format($cartData["cart_total"] - $discountCost + $shipCost, thousands_separator: ".", decimal_separator: ",") ?>
                                    đ</p>
                            </div>
                        </div>
                        <div>
                            <?php
                            echo $viewMode ? "<a href='#' class='w-full btn btn-primary btn-lg'>Thanh toán</a>" : "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
