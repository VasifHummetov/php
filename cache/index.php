<?php

require_once 'helpers.php';


// burda deyerleri deyisib yoxlaya bilersiz

$products = cache()->remember('products',20, function () {
    return 'test';
});

echo $products;


