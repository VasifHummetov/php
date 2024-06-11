<?php

require_once 'helpers.php';


// burda deyerleri deyisib yoxlaya bilersiz

$products = cache('products', 10, function () {
//    return file_get_contents('https://big.az');
    return []; // mixed  value
});

echo $products;