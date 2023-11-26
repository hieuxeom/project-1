<?php
    $head_list = [
        "Members" => "users",
        "Danh mục" => "categories",
        "Sản phẩm" => "products",
        "Bình luận" => "comments"
    ]
?>

<ul class="nav nav-tabs">
    <?php
        foreach ($head_list as $item_key => $item_value ) {
            echo "<li class='nav-item'>
                    <a href='". BASEPATH ."/admin/$item_value' class='nav-link ". (strpos($_SERVER["REQUEST_URI"], $item_value) ? "active": "") ."'>$item_key</a>
                  </li>";
        }
    ?>

</ul>