<?php

require_once 'helpers.php';


// burda deyerleri deyisib yoxlaya bilersiz

$products = cache('products', 10, function () {
    return ['h'];
});

var_dump($products);