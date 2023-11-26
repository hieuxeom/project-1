<?php
?>
<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php" ?>
        <div class="py-3">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Sao</th>
                            <th>Đánh giá</th>
                            <th>Người đánh giá</th>
                            <th>Sản phẩm</th>
                            <th>Thời gian</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listRates as $rate) {
                            echo "
                                    <tr>
                                        <td>$rate[rate_star]</td>
                                        <td>$rate[rate_text]</td>
                                        <td>$rate[username]</td>
                                        <td>$rate[prod_name]</td>
                                        <td>$rate[rate_date]</td>
                                        <td>
                                            <a href='" . BASEPATH . "/product/details/$rate[prod_id]#cmtId=$rate[rate_id]' class='me-2'><i class='fa-solid fa-eye'></i></a>
                                            <a href='" . BASEPATH . "/admin/rates/delete?rateId=$rate[rate_id]' class='me-2'><i class='fa-solid fa-trash'></i></a>
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