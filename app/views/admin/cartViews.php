<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php" ?>
        <div class="py-3">

            <div class="table-responsive">
                <div class="table-wrapper">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID Giỏ hàng</th>
                            <th>Chủ giỏ hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listCarts as $cart) {
                            switch ($cart["status"]) {
                                case "active":
                                    $status = "Giỏ hàng";
                                    $textCss = "bg-third";
                                    break;
                                case "order_wait":
                                    $status = "Đang chờ thanh toán";
                                    $textCss = "bg-wait";
                                    break;
                                case "order_success":
                                    $status = "Đã thanh toán";
                                    $textCss = "bg-success";
                                    break;
                                case "order_fail":
                                    $status = "Thanh toán thất bại";
                                    $textCss = "bg-fail";
                                    break;
                                default:
                                    $status = "Giỏ hàng";
                                    $textCss = "bg-third";
                                    break;
                            }
                            echo "
                                    <tr>
                                        <td>$cart[cart_id]</td>
                                        <td>$cart[username]</td>
                                        <td>" . number_format($cart["cart_total"], thousands_separator: ".", decimal_separator: ",") . "đ</td>
                                        <td>
                                        <span class='badge $textCss'>
                                                $status
                                        </span>
                                        </td>
                                        <td>
                                            <a href='" . BASEPATH . "/cart?cartId=$cart[cart_id]' class='me-2'><i class='fa-solid fa-eye'></i></a>
                                        </td>
                                    </tr>
                                    ";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>