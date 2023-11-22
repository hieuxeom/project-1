<?php
print_r($productData);
echo "<br>";
print_r($listRateData); 
echo "<br>";
print_r($listComment); 

print_r($rateScore);
echo "<br>";

foreach($rateScore as $sp){
    $tb=array_sum($sp)/count($sp);
}
echo "Đánh giá tb: ".$tb;