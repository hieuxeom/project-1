<main class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 p-5">
    <div class="search-box container-lg">
        <form action="<?php echo BASEPATH ?>/product" class="d-flex gap-3 justify-content-center">
            <div class="form-group d-flex gap-3 justify-content-center w-3-4 align-items-center">
                <input class="form-control" type="text" name="search_key" id="searchBox">
                <input class="form-control btn button-primary-fill" type="submit" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <!--    filter categories -->
    <div class="container-lg d-flex justify-content-center align-items-center">
        <div class="button-group d-flex justify-content-center align-items-center gap-2">
            <?php
//                    print_r($listCategories);
                foreach ($listCategories as $category) {
                    echo "<a href='". BASEPATH . "/product?filter=$category[category_id]' class='btn btn-outline-primary'>$category[category_name]</a>";
            }
            ?>
        </div>
    </div>
    <!--    show product list -->
    <div class="container-lg row row-cols-4 justify-content-center">
        <?php 
            foreach ($listProducts as $product) {
                echo "<div class='card w-1-4'>
            <div class='w-full d-flex justify-content-center align-items-center p-2'>
                <img src='$product[img_path]' class='card-img-top' alt='...'>
            </div>
            <div class='card-body'>
                <h5 class='card-title text-truncate'>$product[prod_name]</h5>
                <p class='card-text'>($product[views] lượt xem)</p>
                <div class='d-flex justify-content-between align-items-center'>
                    <a href='". BASEPATH ."/product/details/$product[prod_id]' class='btn btn-primary'>Xem sản phẩm</a>
                    <p class='m-0 text-super-large text-bold color-primary'>$product[prod_price]đ</p>
                </div>
            </div>
        </div>";
            }
        ?>
<!--        <div class='card w-1-4'>-->
<!--            <div class='w-full d-flex justify-content-center align-items-center p-2'>-->
<!--                <img src='--><?php //echo BASEPATH . '/public/img/test-img.png' ?><!--' class='card-img-top' alt='...'>-->
<!--            </div>-->
<!--            <div class='card-body'>-->
<!--                <h5 class='card-title text-truncate'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.-->
<!--                    Aliquam-->
<!--                    consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu-->
<!--                    facilisis lectus</h5>-->
<!--                <p class='card-text'>(999 lượt xem)</p>-->
<!--                <div class='d-flex justify-content-between align-items-center'>-->
<!--                    <a href='#' class='btn btn-primary'>Xem sản phẩm</a>-->
<!--                    <p class='m-0 text-super-large text-bold color-primary'>100.000đ</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</main>
