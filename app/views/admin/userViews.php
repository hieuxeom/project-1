<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#" class="nav-link active">Quản lí Users</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Profile</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Messages</a>
            </li>
        </ul>
        <div class="py-3">
            <table>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <!--                        <div class="table-title">-->
                        <!--                            <div class="row">-->
                        <!--                                <div class="col-sm-6">-->
                        <!--                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i-->
                        <!--                                                class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>-->
                        <!--                                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i-->
                        <!--                                                class="material-icons">&#xE15C;</i> <span>Delete</span></a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>Tên đăng nhập</th>
                                <th>Họ và tên</th>
                                <th>Địa chỉ</th>
                                <th>Quyền</th>
                                <th>Ngày đăng ký</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($listUsers as $user) {
                                    echo "
                                    <tr>
                                        <td>$user[user_id]</td>
                                        <td>$user[email]</td>
                                        <td>$user[username]</td>
                                        <td>$user[fullname]</td>
                                        <td>$user[address]</td>
                                        <td>$user[role]</td>
                                        <td>$user[regis_date]</td>
                                        <td class='d-flex gap-3'>
                                            <a href='" . BASEPATH . "/admin/users/edit?userId=$user[user_id]" . "' class='edit' data-toggle='modal'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='" . BASEPATH . "/admin/users/delete?userId=$user[user_id]" . "' class='delete' data-toggle='modal'><i class='fa-solid fa-trash'></i></a>
                                            <a href='" . BASEPATH . "/admin/users/banned?userId=$user[user_id]" . "' class='banned' data-toggle='modal'><i class='fa-solid fa-ban'></i></a>
                                        </td>
                                    </tr>
                                    ";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </table>
        </div>
    </div>

</main>