<main class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 p-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-xl-4">
                <div class="w-full p-3 bg-white round-8 mb-3">
                    <div class="w-full rounded-pill overflow-hidden border border-2 mb-3">
                        <img class="w-full"
                             src="https://scontent.fsgn13-4.fna.fbcdn.net/v/t39.30808-6/402530771_871725331024171_4896839698034318938_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEET_yiGCFL6isHoMcm0-psJUZ0us9n7gMlRnS6z2fuA-mmU3aLsDeTrf4sSIhwg4LMrFS4Kig1MfTu23jAbsw7&_nc_ohc=D7p0W_6VGqYAX_w9M6r&_nc_zt=23&_nc_ht=scontent.fsgn13-4.fna&oh=00_AfDg1zln1PwjPrId_UZexO3y1129dbgZwElFI3j8X7AX8g&oe=656A4BE2"
                             alt="">
                    </div>
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="text-center">
                            <h3 class="m-0 heading-3"><?php echo $userInfo["fullname"] ?></h3>
                            <p class="m-0 text-normal">@<?php echo $userInfo["username"] ?></p>
                        </div>
                        <div class="w-full d-flex justify-content-between align-items-center">
                            <p class="m-0 text-bold text-small">Email</p>
                            <p class="m-0 text-small"><?php echo $userInfo["email"] ?></p>
                        </div>
                        <div class="w-full d-flex justify-content-between align-items-center">
                            <p class="m-0 text-bold text-small">Đơn hàng đã hoàn thành</p>
                            <p class="m-0 text-small">0</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-1">
                    <div class="d-flex align-items-center gap-1 w-full p-3 bg-white round-8 shadow-sm">
                        <a href="<?php echo BASEPATH ?>/user/changePwd" class="w-full text-decoration-none text-dark text-bold"><i class="me-2 fa-solid fa-lock"></i>Đổi mật khẩu</a>
                    </div>
                    <div class="d-flex align-items-center gap-1 w-full p-3 bg-white round-8 shadow-sm">
                        <a href="<?php echo BASEPATH ?>/user/orderHistory" class="w-full text-decoration-none text-dark text-bold"><i class="me-2 fa-solid fa-clock-rotate-left"></i>Lịch sử mua hàng</a>
                    </div>
                    <div class="d-flex align-items-center gap-1 w-full p-3 bg-white round-8 shadow-sm">
                        <a href="<?php echo BASEPATH ?>/user/commentHistory" class="w-full text-decoration-none text-dark text-bold"><i class="me-2 fa-solid fa-star"></i>Lịch sử bình luận</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="w-full p-3 bg-white round-8">
                    <div class="d-flex justify-content-between align-items-content">
                        <h3 class="heading-3">Đổi mật khẩu</h3>
                        <h3 class="heading-3"><?php echo $errorLog ?? "" ?></h3>
                    </div>
                    <div>
                        <form action="<?php echo BASEPATH . "/user/changePwd" ?>" method="post"
                              class="d-flex flex-column gap-3 w-full">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                                <input class="form-control" type="password" name="old_password" placeholder="Mật khẩu cũ">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="new_password" placeholder="Mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="renew_password"
                                       placeholder="Nhập lại mật khẩu mới">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="otp_code" placeholder="Mã OTP">
                                </div>
                                <div class="col-lg-3">
                                    <button id="getOTP" type="button" class="form-control btn btn-primary"
                                            onclick="sendOTP(<?php echo $_SESSION["user_id"] ?>)">Lấy mã OTP
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary" type="submit" value="Đổi mật khẩu">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>