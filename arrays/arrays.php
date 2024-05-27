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


/*
 * Arraylərdən Elementləri Silmək
 * Arraydən müəyyən bir elementi silmək üçün unset() funksiyasından istifadə olunur.
 */
$fruits = ["apple", "banana", "cherry"];
unset($fruits[1]);
print_r($fruits); // Çap ediləcək: Array ( [0] => apple [2] => cherry )


/*
 * Arrayləri Birləşdirmək
 * İki və ya daha çox arrayi birləşdirmək üçün array_merge() funksiyasından istifadə olunur.
 */
$array1 = ["a", "b", "c"];
$array2 = ["d", "e"];
$mergedArray = array_merge($array1, $array2);
print_r($mergedArray); // Çap ediləcək: Array ( [0] => a [1] => b [2] => c [3] => d [4] => e )

/*
 * Arrayi Sıralamaq
 * Arrayi sıralamaq üçün sort(), rsort(), asort(), ksort() və digər funksiyalardan istifadə olunur.
 */
$numbers = [4, 2, 8, 6];
sort($numbers);
print_r($numbers); // Çap ediləcək: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )

$ages = ["Ali" => 25, "Veli" => 30, "Ayşe" => 28];
asort($ages);
print_r($ages); // Çap ediləcək: Array ( [Ali] => 25 [Ayşe] => 28 [Veli] => 30 )


/*
 * Array elementləri üzərində dövr etmək üçün foreach() dövrü çox istifadə olunur.
 */
$fruits = ["apple", "banana", "cherry"];
foreach ($fruits as $fruit) {
    echo $fruit . " ";
}
// Çap ediləcək: apple banana cherry


// Assosiativ arraylər üçün açar və dəyəri əldə etmək:
$ages = ["Ali" => 25, "Veli" => 30, "Ayşe" => 28];
foreach ($ages as $name => $age) {
    echo "$name is $age years old. ";
}

// array_push(): Arrayin sonuna bir və ya bir neçə element əlavə edir
$stack = ["orange", "banana"];
array_push($stack, "apple", "raspberry");
print_r($stack); // Çap ediləcək: Array ( [0] => orange [1] => banana [2] => apple [3] => raspberry )


// array_pop(): Arrayin sonundakı elementi silir və qaytarır.
$stack = ["orange", "banana", "apple"];
$fruit = array_pop($stack);
print_r($stack); // Çap ediləcək: Array ( [0] => orange [1] => banana )
echo $fruit;    // Çap ediləcək: apple


// array_shift(): Arrayin başındakı elementi silir və qaytarır.
$queue = ["orange", "banana", "apple"];
$fruit = array_shift($queue);
print_r($queue); // Çap ediləcək: Array ( [0] => banana [1] => apple )
echo $fruit;    // Çap ediləcək: orange


// array_unshift(): Arrayin başına bir və ya bir neçə element əlavə edir.
$queue = ["banana", "apple"];
array_unshift($queue, "orange", "lemon");
print_r($queue); // Çap ediləcək: Array ( [0] => orange [1] => lemon [2] => banana [3] => apple )


//in_array() funksiyası array daxilində müəyyən bir dəyərin olub-olmadığını yoxlayır.
$fruits = ["apple", "banana", "cherry"];

if (in_array("banana", $fruits)) {
    echo "Banana arraydə mövcuddur.";
} else {
    echo "Banana arraydə mövcud deyil.";
}
// Çap ediləcək: Banana arraydə mövcuddur.


/*
 * array_count_values() funksiyası, bir arraydəki dəyərlərin sayını hesablamaq üçün istifadə olunur.
 * Bu funksiya, dəyərləri açar və onların sayını dəyər olaraq qaytaran yeni bir assosiativ array yaradır.
 */

$fruits = ["apple", "banana", "orange", "apple", "banana", "apple"];
$counts = array_count_values($fruits);
print_r($counts);


// array_values: Bu funksiya bir array-dəki bütün dəyərləri nömrələrinin indekslədiyi bir array kimi qaytarır, əsas açarları ləğv edərək
$array = array("göy", "qırmızı", "yaşıl");
$v = array_values($array);
print_r($v);

//array_keys: Bu funksiya bir array-dəki bütün açarları nömrələrinin indekslədiyi bir array kimi qaytarır.
$array = array("rəng" => "göy", "ölçü" => "orta", "şəkil" => "kvadrat");
$keys = array_keys($array);
print_r($keys);

/*
 * extract() funksiyası, bir associative array-dəki elementləri müəyyən edilmiş adlar ilə dəyişənlərə çıxarır.
 *  Məsələn, bir array-dəki "key" => "dəyər" cütlüklərini dəyişənlər kimi daxil edir.
 */

//extract numunesi
$melumatlar = array(
    "ad" => "Məmməd",
    "soyad" => "Əliyev",
    "yas" => 30
);

// extract() funksiyası ilə array-dəki məlumatlar dəyişənlərə çıxarılır
extract($melumatlar);

// artıq məlumatlar dəyişənlərdə mövcuddur
echo $ad; // Məmməd
echo $soyad; // Əliyev
echo $yas; // 30


//compact numunesi

$ad = "Məmməd";
$soyad = "Əliyev";
$yas = 30;

// compact() funksiyası ilə müəyyən edilmiş dəyişənlərin dəyərləri ilə yeni bir array yaradılır
$melumatlar = compact("ad", "soyad", "yas");

print_r($melumatlar);























