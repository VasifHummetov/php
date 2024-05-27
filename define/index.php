<?php


/*
 * Sabitlərin Təyin Edilməsi
 * PHP-də sabitləri təyin etmək üçün define() funksiyasından istifadə olunur.
 * Sabitlərin adı böyük hərflərlə yazılır və sabitlər dəyişməz olduğu üçün, adətən proqram boyunca eyni qalır.
 */

define("SITE_NAME", "My Website");
define("SITE_URL", "https://www.example.com");

/*
 * Sabitlərə Müraciət
 * Sabitlər bir dəfə təyin edildikdən sonra onların dəyərinə müraciət etmək üçün sabit adı birbaşa istifadə olunur,
 * $ işarəsi istifadə edilmir.
 */

echo SITE_NAME; // Nəticə: My Website
echo SITE_URL;  // Nəticə: https://www.example.com

/*
 * Sabitlərin Üstünlükləri
 * Dəyişməzlik: Sabitlər bir dəfə təyin edildikdən sonra dəyişdirilə bilməz. Bu, müəyyən dəyərlərin səhvən dəyişdirilməsinin qarşısını alır.
 * Performans: Sabitlər dəyərləri dəyişmədiyi üçün, proqramın işləmə sürətinə müsbət təsir göstərə bilər.
 * Oxunaqlılıq: Sabit adları ilə proqramın müxtəlif hissələrində eyni dəyərlərə müraciət etmək proqramın oxunaqlığını artırır.
 */

//--------------------------------------------------------------------------------------------------------------------//

/*
 * PHP-də Sabitlərin Xüsusiyyətləri
 * Case-Sensitive: PHP-də sabit adları case-sensitive-dir, yəni böyük və kiçik hərflər fərqli olaraq qəbul edilir.
 * Lakin define() funksiyasının üçüncü parametri vasitəsilə bu davranış dəyişdirilə bilər.
 */

define("GREETING", "Hello World!", true); // case-insensitive, amma PHP 7.2 versiyasindan sonra true ozelliyi silinib
echo greeting; // Nəticə: Hello World!


// Sabit Dizilər: PHP 7 və daha yeni versiyalarda, sabitlərə dizi dəyərləri təyin etmək mümkündür.

define("COLORS", [
    "red",
    "green",
    "blue"
]);

echo COLORS[1]; // Nəticə: green

/*
 * Magic Constants: PHP-də öncədən təyin edilmiş bəzi sabitlər var ki, bunlar "magic constants" adlanır.
 *  Məsələn, __LINE__, __FILE__, __DIR__ və s.
 */

echo "Bu kod " . __LINE__ . " sətrində yerləşir."; // Nəticə: Bu kod 56 sətrində yerləşir.

echo "Bu kod " . __FILE__ . " da yerləşir";

echo "Bu kod ". __DIR__ . "qovluqda yerləşir";


