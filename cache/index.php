<?php

require_once 'helpers.php';


// burda deyerleri deyisib yoxlaya bilersiz

$products = cache()->remember('products',60, function () {
    return file_get_contents('https://big.az');
});


//echo $products;


