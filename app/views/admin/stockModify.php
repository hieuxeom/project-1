<main class="container-fluid">
    <div class="container-lg py-5">
        <form action="<?php echo BASEPATH . "/admin/update?for=stocks&id=$modifyData[prod_id]" ?>" method="post"  class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="img_path">Cập nhật số lượng</label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $modifyData["quantity"] ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Sửa" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>