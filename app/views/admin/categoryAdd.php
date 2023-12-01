<main class="container-fluid">
    <div class="container-lg py-5">
        <form action="<?php echo BASEPATH . "/admin/categories/add" ?>" method="post"  class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="category_name">Tên danh mục</label>
                <input type="text" class="form-control" name="category_name" value="">
            </div>
            <div class="form-group">
                <label for="category_desc">Mô tả danh mục</label>
                <textarea class="form-control" name="category_desc" id="" cols="30" rows="4"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Thêm" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>