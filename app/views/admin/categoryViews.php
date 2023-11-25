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
                                <th>ID Danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả danh mục</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listCategories as $category) {
                                echo "
                                    <tr>
                                        <td>$category[category_id]</td>
                                        <td>$category[category_name]</td>
                                        <td>$category[category_desc]</td>
                                        <td class='d-flex gap-3'>
                                            <a href='" . BASEPATH . "/admin/categories/edit?categoryId=$category[category_id]" . "' class='edit' data-toggle='modal'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='" . BASEPATH . "/admin/delete?for=products&id=$category[category_id]" . "' class='delete' data-toggle='modal'><i class='fa-solid fa-trash'></i></a>
                                            <a href='" . BASEPATH . "/admin/products/banned?productId=$category[category_id]" . "' class='banned' data-toggle='modal'><i class='fa-solid fa-ban'></i></a>
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