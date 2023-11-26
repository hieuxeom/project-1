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
                                    <a href="<?php echo BASEPATH . "/admin/categories/add" ?>" class="btn btn-success "
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
                                        <td>
                                            <a href='" . BASEPATH . "/admin/categories/edit?categoryId=$category[category_id]' class=' me-2'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='" . BASEPATH . "/admin/categories/delete?categoryId=$category[category_id]' class='me-2'><i class='fa-solid fa-trash'></i></a>
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