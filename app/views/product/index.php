<main class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 p-5">
    <div class="search-box container-lg">
        <form action="<?php echo BASEPATH ?>/product" class="row">
            <div class="form-group col-lg-10 col-sm-12 p-1">
                <input class="form-control " type="text" name="search_key" id="searchBox">
            </div>
            <div class="form-group col-lg-2 col-sm-12 p-1">
                <input class="form-control btn btn-primary" type="submit" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <!--    filter categories -->
    <div class="container-lg d-flex justify-content-center align-items-center">
        <div class="button-group d-flex flex-wrap justify-content-center align-items-center gap-2">
            <?php
            foreach ($listCategories as $category) {
                echo "<a href='" . BASEPATH . "/product?filter=$category[category_id]' class='btn btn-outline-primary'>$category[category_name]</a>";
            }
            ?>
        </div>
    </div>
    <!--    show product list -->
    <div class="container-lg row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 justify-content-start">
        <?php
        foreach ($listProducts as $product) {
            if (!$product["is_delete"]) {
                echo "<div class='card'>
            <div class='w-full d-flex justify-content-center align-items-center p-2'>
                <img src='$product[img_path]' class='card-img-top' alt='...'>
            </div>
            <div class='card-body'>
                <h5 class='card-title text-truncate'>$product[prod_name]</h5>
                <p class='card-text'>($product[views] lượt xem)</p>
                <div class='row justify-content-between align-items-center'>
                    <a href='" . BASEPATH . "/product/details/$product[prod_id]' class='btn btn-primary col-xl-6 col-lg-12'>Xem sản phẩm</a>
                    <p class='m-0 text-super-large text-bold color-primary col-xl-6 col-lg-12 text-center'>" . number_format($product["prod_price"], thousands_separator: ".", decimal_separator: ",") . "đ</p>
                </div>
            </div>
        </div>";
            }
        }
        ?>
</main>
