<?php
print_r($modifyData);
?>

<main class="container-fluid">
    <div class="container-lg py-5">
        <!--        <form action="--><?php //echo BASEPATH . "/admin/test" ?><!--" method="post"-->
        <form action="<?php echo BASEPATH . "/admin/update?for=categories&id=$modifyData[category_id]" ?>" method="post"  class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="category_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="category_name" value="<?php echo $modifyData["category_name"] ?>">
            </div>
            <div class="form-group">
                <label for="category_desc">Mô tả sản phẩm</label>
                <textarea class="form-control" name="category_desc" id="" cols="30" rows="4"><?php echo $modifyData["category_desc"]?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Sửa" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>