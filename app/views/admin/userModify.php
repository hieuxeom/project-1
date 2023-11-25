<?php
print_r($modifyData);
?>

<main class="container-fluid">
    <div class="container-lg py-5">
<!--        <form action="--><?php //echo BASEPATH . "/admin/test" ?><!--" method="post"-->
        <form action="<?php echo BASEPATH . "/admin/update?for=users&id=$modifyData[user_id]" ?>" method="post"
              class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $modifyData["email"] ?>">
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" value="<?php echo $modifyData["username"] ?>">
            </div>
            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $modifyData["fullname"] ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="<?php echo $modifyData["address"] ?>">
            </div>
            <div class="form-group">
                <label for="">Quyền</label>
                <select class="form-control" name="role">
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Sửa" class="btn btn-primary w-full">
            </div>
        </form>
    </div>
</main>