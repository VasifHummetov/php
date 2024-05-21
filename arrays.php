<?php

/*
 * Arraylərin Təyini
 * PHP-də arraylər array() funksiyası və ya qısa sintaksis ([]) ilə təyin edilə bilər.
 */

// array() funksiyası ilə təyin etmək
$fruits = array("apple", "banana", "cherry");

// Qısa sintaksis ilə təyin etmək
$vegetables = ["carrot", "potato", "tomato"];



/*
 * Array Növləri
 * PHP-də arraylər iki əsas növə bölünür: indeksli arraylər və assosiativ arraylər.
 */

// İndeksli Arraylər: İndekslər rəqəmlərdir və dəyərlər sıralı şəkildə saxlanır.

$colors = ["red", "green", "blue"];
echo $colors[0]; // Çap ediləcək: red

//Assosiativ Arraylər: İndekslər mətn (string) dəyəridir və dəyərlər açar-dəyər cütləri şəklində saxlanır.

$ages = ["Ali" => 25, "Veli" => 30, "Ayşe" => 28];
echo $ages["Veli"]; // Çap ediləcək: 30

// Çoxölçülü arraylər, arraylərin içində arraylərin saxlanmasına imkan verir.

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $matrix[1][2]; // Çap ediləcək: 6


/*
 * Arraylərin Ölçüsünü Müəyyən Etmək
 * Arrayin ölçüsünü (elementlərin sayını) müəyyən etmək üçün count() funksiyasından istifadə olunur.
 */


$colors = ["red", "green", "blue"];
echo count($colors); // Çap ediləcək: 3


/*
 * Arrayə Yeni Element Əlavə Etmək
 * Arrayin sonuna yeni element əlavə etmək üçün [] operatorundan istifadə edə bilərsiniz.
 */

$fruits = ["apple", "banana"];
$fruits[] = "cherry";
print_r($fruits); // Çap ediləcək: Array ( [0] => apple [1] => banana [2] => cherry )

































