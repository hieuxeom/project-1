<main class="container-fluid">
    <div class="container-lg py-5">
        <form action="<?php echo BASEPATH . "/admin/users/banned?userId=$_GET[userId]" ?>" method="post"
              class="d-flex flex-column gap-3 w-auto bg-white p-3 round-8 shadow-sm">
            <div class="form-group">
                <label for="reason">Lý do khóa tài khoản</label>
                <textarea class="form-control" name="reason" rows="4"><?php echo $reasonBanned ?? "" ?></textarea>
            </div>
            <div class="form-group d-flex gap-3">
                <input type="submit" name='btn-lock' value="Khóa" class="btn btn-primary w-full">
                <?php if (isset($reasonBanned)) {
                    echo "<input type='submit' name='btn-unlock' value='Mở khóa' class='btn btn-secondary w-full'>";
                }?>
            </div>
        </form>
    </div>
</main>