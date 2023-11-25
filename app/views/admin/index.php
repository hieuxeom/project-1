<main class="container-fluid">
    <div class="bg-white container-lg pt-5">
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
                            <tr>
                                <td>1</td>
                                <td>thomashardy@mail.com</td>
                                <td>thomashardy</td>
                                <td>Thomas Hardy</td>
                                <td>89 Chiaroscuro Rd, Portland, USA</td>
                                <td>Member</td>
                                <td>12/12/2023</td>
                                <td class="d-flex gap-3">
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </table>
        </div>
    </div>

</main>