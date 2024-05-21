<?php

/*
 * PHP-də dəyişənlər $ işarəsi ilə başlayır və ardından dəyişənin adı gəlir.
 *  Dəyişən adları hərf və ya alt çizgi (_) ilə başlamalıdır, rəqəmlə başlamamalıdır.
 */
$name = "Ali"; // $name dəyişəninə "Ali" dəyərini veririk
$age = 25;     // $age dəyişəninə 25 dəyərini veririk


/*
 * Dəyişkənlər böyük və kiçik hərflərə duyarlıdır.
 * $var ve $Var tam başqa başqa dəyişkənlər və fərqli dəyərlərə malikdir
 */
$var = "Vasif";

$Var = "Ceyhun";

/*
 * PHP dinamik tipləmə dəstəkləyir, yəni dəyişənin tipi avtomatik olaraq ona təyin edilən dəyərə əsasən müəyyən edilir.
 *  PHP-də əsas dəyişən tipləri bunlardır:
 */
$text = "HEllo"; // string

$is_admin = true; // boolean

$number = 123; // integer

$price = 19.99; // float

$colors = array("red", "green", "blue"); // array

class Car {
    public $model;
    public function __construct($model) {
        $this->model = $model;
    }
}

$myCar = new Car("Toyota"); // object

$unset_var = NULL; // null

/*
 *  Dəyişənlərin Silsiləsi və Global Dəyişənlər
    PHP-də dəyişənlərin fəaliyyət dairəsi (scope) onların təyin olunduğu yerə əsaslanır.
    Əsasən, dəyişənlər funksiyalar daxilində və xaricində fərqli şəkildə işləyir.
 */

function test() {
    $localVar = "I am local";
    echo $localVar;
}

test(); // "I am local" çap ediləcək
//echo $localVar; // Ekrana cap etdirdiyimizde Xəta: undefined variable $localVar

/*
 * Global (Qlobal) Dəyişənlər: Funksiya xaricində təyin olunan dəyişənlər bütün skript ərzində əlçatandır.
 * Lakin, bu dəyişənləri funksiyalar daxilində istifadə etmək üçün global açar sözündən istifadə edilməlidir.
 */

$globalVar = "I am global";

function test2() {
    global $globalVar;
    echo $globalVar;
}

test2(); // "I am global" çap ediləcək


/*
 * Statik Dəyişənlər: Funksiya daxilində təyin olunur, lakin funksiyanın çağırışları arasında dəyərini saxlayır.
 */

function test3() {
    static $count = 0;
    $count++;
    echo $count;
}

test3(); // 1 çap ediləcək
test3(); // 2 çap ediləcək

?>