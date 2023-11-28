<main class="container-fluid">
    <div class="container-lg py-5">
        <form action="<?php echo BASEPATH . "/admin/vouchers/add" ?>" method="post"  class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="category_name">Mã</label>
                <input type="text" class="form-control" name="voucher_id">
            </div>
            <div class="form-group">
                <label for="voucher_discount">Giảm giá (%)</label>
                <input type="number" class="form-control" name="voucher_discount">
            </div>
            <div class="form-group">
                <label for="voucher_desc">Mô tả</label>
                <input type="text" class="form-control" name="voucher_desc">
            </div>
            <div class="form-group">
                <label for="valid_from">Bắt đầu</label>
                <input type="datetime-local" class="form-control" name="valid_from">
            </div>
            <div class="form-group">
                <label for="valid_to">Kết thúc</label>
                <input type="datetime-local" class="form-control" name="valid_to">
            </div>
            <div class="form-group">
                <label for="max_uses">Lượt dùng tối đa</label>
                <input type="number" class="form-control" name="max_uses">
            </div>
            <div class="form-group">
                <label for="type">Loại mã</label>
                <select class="form-control" name="type">
                    <option value="ship">Phí vận chuyển</option>
                    <option value="product">Sản phẩm</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Thêm" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>