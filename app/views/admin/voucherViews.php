<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php" ?>
        <div class="py-3">

            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title pb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php echo BASEPATH . "/admin/vouchers/add" ?>" class="btn btn-success "
                                   data-toggle="modal">
                                    <i class="fa-solid fa-plus text-white"></i>
                                    <span class="text-white">Tạo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Voucher Code</th>
                            <th>Giảm giá</th>
                            <th>Mô tả</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Lượt dùng tối đa</th>
                            <th>Lượt dùng còn lại</th>
                            <th>Loại voucher</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listVouchers as $voucher) {
                            echo "
                                    <tr>
                                        <td>$voucher[voucher_id]</td>
                                        <td>$voucher[voucher_discount]</td>
                                        <td>$voucher[voucher_desc]</td>
                                        <td>$voucher[valid_from]</td>
                                        <td>$voucher[valid_to]</td>
                                        <td>$voucher[max_uses]</td>
                                        <td>$voucher[remaining_uses]</td>
                                        <td>$voucher[type]</td>
                                        <td>
                                            <a href='" . BASEPATH . "/admin/vouchers/edit?voucherId=$voucher[voucher_id]' class='me-2'><i class='fa-solid fa-pen-to-square'></i></a>
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