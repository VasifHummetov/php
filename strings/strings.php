<?php

/*
 * Stringlər, mətn məlumatlarını saxlamaq və işləmək üçün istifadə olunan dəyişənlərdir.
 * PHP-də stringlər çox geniş şəkildə istifadə olunur və müxtəlif funksionallıqlara malikdir.
 * Bu məqalədə, PHP-də stringlərin əsas xüsusiyyətlərini, təyin edilməsini, istifadəsini və string manipulyasiyası üsullarını öyrənəcəyik.
 *
 * Stringlərin Təyini
 * PHP-də stringlər tək (' ') və ya ikiqat (" ") dırnaq işarələri ilə təyin edilə bilər.
 */

$singleQuoted = 'Bu bir stringdir';
$doubleQuoted = "Bu da bir stringdir";

/*
 * İkiqat Tırnaq və Tək Tırnaq Fərqləri
 * İkiqat tırnaq işarələri içərisində dəyişənlərin dəyəri avtomatik olaraq əvəz olunur, tək tırnaq işarələrində isə bu baş vermir.
 */

$name = "Ali";
echo 'Salam, $name'; // Çap ediləcək: Salam, $name
echo "Salam, $name"; // Çap ediləcək: Salam, Ali

/*
 * Stringlərin Uzanlığı
 * Stringlərin uzunluğunu müəyyən etmək üçün strlen() funksiyasından istifadə olunur.
 */

$text = "Hello, World!";
echo strlen($text); // Çap ediləcək: 13

/*
 * Stringlərin Birləşdirilməsi
 * Stringləri birləşdirmək üçün nöqtə (.) operatorundan istifadə olunur.
 */

$firstName = "Ali";
$lastName = "Veli";
$fullName = $firstName . " " . $lastName;
echo $fullName; // Çap ediləcək: Ali Veli


/*
 * Stringlərin Ayırd Edilməsi
 * Stringləri müəyyən bir hissədə ayırmaq üçün explode() və implode() funksiyalarından istifadə olunur.
 *
 * JAVASCRIPT de split() ve join() funcksiyalarinin oxsaridir
 */

// explode() nümunəsi
$text = "red,green,blue";
$colors = explode(",", $text);
print_r($colors); // Çap ediləcək: Array ( [0] => red [1] => green [2] => blue )

// implode() nümunəsi
$colorsArray = array("red", "green", "blue");
$colorsString = implode("-", $colorsArray);
echo $colorsString; // Çap ediləcək: red-green-blue


/*
 * Stringlərin Axtarışı və Dəyişdirilməsi
 * String daxilində müəyyən bir ifadəni axtarmaq üçün strpos(), əvəz etmək üçün isə str_replace() funksiyalarından istifadə olunur.
 */

// strpos() nümunəsi
$text = "Hello, World!";
$position = strpos($text, "World");
echo $position; // Çap ediləcək: 7

// str_replace() nümunəsi
$text = "Hello, World!";
$newText = str_replace("World", "PHP", $text);
echo $newText; // Çap ediləcək: Hello, PHP!


/*
 * Stringləri Böyük və Kiçik Hərflərə Çevirmək
 * Stringləri böyük və ya kiçik hərflərə çevirmək üçün strtoupper() və strtolower() funksiyalarından istifadə olunur.
 */

$text = "Hello, World!";
$upperText = strtoupper($text);
$lowerText = strtolower($text);
echo $upperText; // Çap ediləcək: HELLO, WORLD!
echo $lowerText; // Çap ediləcək: hello, world!


/*
 * Stringin Bir Hissəsini Çıxarmaq
 * Stringin bir hissəsini çıxarmaq üçün substr() funksiyasından istifadə olunur.
 */


$text = "Hello, World!";
$subText = substr($text, 7, 5);
echo $subText; // Çap ediləcək: World


/*
 * Stringin Baş və Son Boşluqlarını Silmək
 * Stringin baş və son boşluqlarını silmək üçün trim() funksiyasından istifadə olunur.
 */


$text = "  Hello, World!  ";
$trimmedText = trim($text);
echo $trimmedText; // Çap ediləcək: Hello, World!

/*
 * Stringləri Təhlükəsizləşdirmək
 * Xüsusilə veb inkişafında, istifadəçi tərəfindən daxil edilən məlumatları təhlükəsizləşdirmək üçün htmlspecialchars() və addslashes() funksiyalarından istifadə olunur.
 */

// htmlspecialchars() nümunəsi
$htmlString = "<script>alert('Hello');</script>";
$safeString = htmlspecialchars($htmlString);
echo $safeString; // Çap ediləcək: &lt;script&gt;alert('Hello');&lt;/script&gt;

// addslashes() nümunəsi
$unsafeString = "O'Reilly";
$safeString = addslashes($unsafeString);
echo $safeString; // Çap ediləcək: O\'Reilly






















