<main class="container-fluid d-flex justify-content-center align-items-center">
    <div class="bg-white p-3 my-5">
        <div>
            <h2 class="heading-2">Đăng ký</h2>
            <p class="text-small">Đăng ký để trở thành thành viên và nhận các đặc quyền riêng nhé!</p>
        </div>
        <hr class="w-1-4">
        <form action="<?php echo BASEPATH ?>/auth/register" method="post" class="d-flex flex-column gap-3">
            <div class="form-group d-flex flex-column gap-2">
                <label for="fullname">Họ và tên:</label>
                <input name="fullname" type="text" class="form-control rounded-2" id="fullname">
                <div class="invalid-feedback">
                    Họ và tên không được chứa kí tự đặc biệt
                </div>
            </div>
            <div class="form-group d-flex flex-column gap-2">
                <label for="username">Tên đăng nhập</label>
                <input name="username" type="text" class="form-control rounded-2" id="username">
                <div class="invalid-feedback">
                    Tên đăng nhập phải chứa ít nhất 4 - 30 kí tự
                </div>
            </div>
            <div class="form-group d-flex flex-column gap-2">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control rounded-2" id="email">
                <div class="invalid-feedback">
                    Email không hợp lệ, vui lòng thử lại
                </div>
            </div>
            <div class="row row-cols-lg-2">
                <div class="col form-group d-flex flex-column gap-2">
                    <label for="password">Mật khẩu</label>
                    <input name="password" type="password" class="form-control rounded-2" id="password">
                    <div class="invalid-feedback">
                        Mật khẩu phải chứa ít nhất:
                        <br>
                        - 1 Kí tự đặc biệt
                        <br>
                        - 1 Số
                        <br>
                        - 1 Kí tự in hoa
                    </div>
                </div>
                <div class="col form-group d-flex flex-column gap-2">
                    <label for="repassword">Nhập lại Mật khẩu</label>
                    <input name="repassword" type="password" class="form-control rounded-2" id="repassword">
                    <div class="invalid-feedback">
                        Mật khẩu không giống, vui lòng thử lại
                    </div>
                </div>
            </div
            <div class="form-group d-flex justify-content-end">
                <input id="registerSubmit" type="submit" class="btn btn-primary" value="Đăng ký">
            </div>
        </form>
    </div>
</main>
