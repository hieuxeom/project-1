<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php"?>
        <div class="py-3">
            <table>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title pb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="<?php echo BASEPATH . "/admin/products/add"?>" class="btn btn-success " data-toggle="modal">
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
                                <th>Mô tả sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Lượt xem</th>
                                <th>Link ảnh sản phẩm</th>
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
                                        <td>$product[prod_desc]</td>
                                        <td>$product[prod_price]</td>
                                        <td>$product[category_id]</td>
                                        <td>$product[views]</td>
                                        <td>$product[img_path]</td>
                                        <td class='d-flex gap-3'>
                                            <a href='" . BASEPATH . "/admin/products/edit?productId=$product[prod_id]" . "' class='edit' data-toggle='modal'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='" . BASEPATH . "/admin/products/delete?productId=$product[prod_id]" . "' class='delete' data-toggle='modal'><i class='fa-solid fa-trash'></i></a>
                                        </td>
                                    </tr>
                                    ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </table>
        </div>
    </div>

</main>