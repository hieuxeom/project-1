<main class="container-fluid">
    <div class="bg-white container-lg py-5">
        <?php require_once "./app/views/admin/head_tabs.php"?>
        <div class="py-3">
            <table>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Bình luận</th>
                                <th>Người bình luận</th>
                                <th>Tên sản phẩm</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listComments as $comment) {
                                echo "
                                    <tr>
                                        <td>$comment[comment_text]</td>
                                        <td>$comment[username]</td>
                                        <td>$comment[prod_name]</td>
                                        <td>$comment[comment_time]</td>
                                        <td class='d-flex gap-3'>
                                            <a href='" . BASEPATH . "/product/details/$comment[prod_id]#cmtId=$comment[comment_id]' class='edit' data-toggle='modal'><i class='fa-solid fa-eye'></i></a>
                                            <a href='" . BASEPATH . "/admin/comments/delete?commentId=$comment[comment_id]' class='delete' data-toggle='modal'><i class='fa-solid fa-trash'></i></a>
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