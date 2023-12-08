<main class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 p-5">
    <div class="container-lg">
        <div class="row d-flex justify-content-center">
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
            </div>
        </div>
    </div>
</main>