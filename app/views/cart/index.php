<?php
print_r($cartData); echo "<br>";
print_r($showCart); 
$total=$showCart[0]['prod_price']*$showCart[0]['quantity'];
echo "Tổng tiền: " .$total;