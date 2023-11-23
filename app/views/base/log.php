<script>
    document.title = 'Thông báo';
</script>

<main class="container-fluid d-flex flex-column justify-content-center align-items-center" style="min-height: 75vh" id="log-section">
    <div class="container d-flex justify-content-center align-items-center h-75">
        <div class="d-flex flex-column justify-content-center align-items-center gap-2 w-100">
            <div class="w-100">
                <h1 class="text-display-large text-center text-helvetica text-bold"><?php
                    echo $status ?? "000";
                    ?>
                </h1>
            </div>
            <div class="d-flex flex-column">
                <h2 class="heading-2 text-helvetica text-center text-bold"><?php echo $status_code ?? ""; ?></h2>
                <p class="m-0 text-super-large text-center">
                    <?php
                    if (is_array($message)) {
                        print_r($message) ?? "";
                    } else {
                        echo  $message ?? "";
                    }
                    ?></p>
                <br>

            </div>
            <a href="<?php echo $url_back ?? BASEPATH . "/home" ?>" class="btn btn-primary btn-lg"><?php echo $btn_title ?? "Quay lại trang chủ" ?></a>
            <p class="m-0 text-small text-center">Hosted by Tran Ngoc Hieu - PS35703</p>
        </div>
    </div>

</main>