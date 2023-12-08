<main class="container-fluid p-4">
    <div class="container-xl">
        <form action="<?php echo BASEPATH ?>/cart/payment/success" method="post" class="d-flex gap-3">
            <input class="form-control" type="hidden" name="cart_id"
                   value="<?php echo $cartData["cart_id"] ?>">
            <input class="form-control" type="hidden" name="cart_total"
                   value="<?php echo $cartTotal ?>">
            <div class="bg-white round-8 p-3 w-full my-2">
                <h3 class="heading-3">Thông tin nhận hàng</h3>
                <div class="d-flex flex-column justify-content-center gap-2">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input class="form-control" type="text" id="fullnameInput" name="fullname"
                               value="<?php echo $userInfo["fullname"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" id="emailInput" name="email"
                               value="<?php echo $userInfo["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" type="text" id="addressInput" name="address"
                               value="<?php echo $userInfo["address"] ?>">
                    </div>
                </div>
            </div>
            <div class="bg-white round-8 p-3 w-full my-2">
                <h3 class="heading-3">Thanh toán đơn hàng</h3>
                <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                    <div class="form-group col-4">
                        <img class="w-full" src="<?php echo BASEPATH ?>/public/img/qrcode.jpg" alt="qr_code">
                    </div>
                    <div class="form-group col-12">
                        <input id="submitButton" class="form-control btn btn-primary" type="submit"
                               value="Kiểm tra thanh toán">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
