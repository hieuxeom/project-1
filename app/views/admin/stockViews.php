<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php" ?>
        <div class="py-3">

            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title pb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php echo BASEPATH . "/admin/products/add" ?>" class="btn btn-success "
                                   data-toggle="modal">
                                    <i class="fa-solid fa-plus text-white"></i>
                                    <span class="text-white">Thêm</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Lần cập nhật gần nhất</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listProducts as $product) {
                            echo "
                                    <tr>
                                        <td>$product[prod_id]</td>
                                        <td>$product[prod_name]</td>
                                        <td>$product[quantity]</td>
                                        <td>$product[last_update]</td>
                                        <td>" . ($product["quantity"] == 0 ?  "Hết hàng" : ($product["quantity"] < 50 ? "Sắp hết" : "Bình thường")) . "</td>
                                        <td>
                                            <a href='" . BASEPATH . "/admin/stocks/edit?productId=$product[prod_id]" . "' class=' me-2'><i class='fa-solid fa-pen-to-square'></i></a>
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