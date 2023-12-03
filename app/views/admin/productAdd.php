<main class="container-fluid">
    <div class="container-lg py-5">
        <form action="<?php echo BASEPATH . "/admin/products/add" ?>" method="post"
              class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="prod_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="prod_name" value="">
            </div>
            <div class="form-group">
                <label for="prod_desc">Mô tả sản phẩm</label>
                <textarea class="form-control" name="prod_desc" id="" cols="30" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="prod_price">Giá</label>
                <input type="text" class="form-control" name="prod_price" value="">
            </div>
            <div class="form-group">
                <label for="prod_price">Số lượng</label>
                <input type="text" class="form-control" name="quantity" value="">
            </div>
            <div class="form-group">
                <label for="img_path">Link ảnh sản phẩm</label>
                <input type="text" class="form-control" name="img_path" value="">
            </div>
            <div class="form-group">
                <label for="category_id">Sản phẩm bán chạy</label>
                <select class="form-control" name="best_sell">
                    <option value='0'>Không</option>
                    ";
                    <option value='1'>Có</option>
                    ";
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục sản phẩm</label>
                <select class="form-control" name="category_id">
                    <?php
                    foreach ($listCategories as $category) {
                        echo "<option value='$category[category_id]'>$category[category_name]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Thêm" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>