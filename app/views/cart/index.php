<main class="container-fluid">
    <div class="container-lg py-3">
        <div class="row">
            <div class="col-8">
                <div class="bg-white p-3 round-8">
                    <div>
                        <h2 class="heading-2">Giỏ hàng</h2>
                        <input type="hidden" id="cartId" value="<?php echo $cartData["cart_id"];?>">
                    </div>
                    <div>
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($cartItems as $item) {
                                        echo " <tr class=''>
                                        <td>
                                            <div class='d-flex align-items-center gap-3'>
                                                <img width='20%' src='$item[img_path]' alt=''>
                                                <p class='text-normal text-break m-0 text-bold'>$item[prod_name]</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='d-flex align-items-center gap-1'>
                                                <button class='input-group-text bg-third color-white minus'
                                                onclick='minusQuantity($item[prod_id])'>-
                                                </button>
                                                <input type='text' class='text-center form-control quantity-input' value='$item[quantity]'
                                                       id='prodId=$item[prod_id]'>
                                                <button class='input-group-text bg-third color-white'
                                                        onclick='addQuantity($item[prod_id])'>+
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <p class='text-normal text-bold m-0'>" . ((int)$item["prod_price"] * (int)$item["quantity"]) . "đ</p>
                                        </td>
                                        <td>
                                            <a href='#' class='btn btn-primary'>Xóa</a>
                                        </td>
                                    </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-white p-3 round-8">
                    <div>
                        <h2 class="heading-2 text-center">Tạm tính</h2>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <form action="#" class="d-flex flex-column gap-1">
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control" placeholder="Nhập mã khuyến mãi">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-secondary" value="Áp dụng">
                            </div>
                        </form>
                        <hr>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Tạm tính</p>
                                <p class="text-bold text-normal m-0" id="preBill">100.000đ</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Giảm giá</p>
                                <p class="text-bold text-normal m-0" id="discountCost">0đ</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-small m-0" id="">Phí vận chuyển</p>
                                <p class="text-bold text-normal m-0" id="shipCost">100.000đ</p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-normal m-0" id="">Tổng tiền</p>
                                <p class="text-bold text-super-large m-0" id="shipCost">100.000đ</p>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="w-full btn btn-primary btn-lg">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
