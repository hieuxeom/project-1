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
                            echo "
                                    <tr>
                                        <td>$cart[cart_id]</td>
                                        <td>$cart[username]</td>
                                        <td>$cart[cart_total]</td>
                                        <td>$cart[status]</td>
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