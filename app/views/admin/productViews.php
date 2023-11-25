<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#" class="nav-link active">Quản lí User</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Quản lí đơn hàng</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Quản lí cc</a>
            </li>
        </ul>
        <div class="py-3">
            <table>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title pb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-success " data-toggle="modal">
                                        <i class="fa-solid fa-plus text-white"></i>
                                        <span class="text-white">New</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID Sản phẩm</th>
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
                                            <a href='" . BASEPATH . "/admin/delete?for=products&id=$product[prod_id]" . "' class='delete' data-toggle='modal'><i class='fa-solid fa-trash'></i></a>
                                            <a href='" . BASEPATH . "/admin/products/banned?productId=$product[prod_id]" . "' class='banned' data-toggle='modal'><i class='fa-solid fa-ban'></i></a>
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