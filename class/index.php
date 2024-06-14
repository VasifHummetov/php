<?php






//
//class A
//{
//    public function __call(string $name, array $arguments)
//    {
//        var_dump($name, $arguments);
//    }
//}
//
//
//$a = new A();
//
//$a->whereEmail('Vasif', 'Ehmed');


//require_once "Controller/HomeController.php";
//require_once "Html/HomeController.php";
//
//echo \Controller\test();


//function test($a, $b)
//{
//    return $a + $b;
//}
//
//
////echo test();
//
////echo call_user_func_array('test', [5,10]);
//
//
//class Product
//{
//    public function username()
//    {
//        return "USERNAME";
//    }
//}
//
//
////[$class, $method] = [User::class, 'username'];
//
////echo (new $class)->$method();
//
////echo call_user_func_array([new $class, $method], []);
//
//
//
//
//class Model
//{
//    public function getTable()
//    {
//        return "MODEL TABLE";
//    }
//}
//
//class DB extends Model
//{
//    protected ?string $model = "DATABASE";
//
//    public function getTable()
//    {
//        return parent::getTable();
//    }
//}
//
//class User extends DB {
//    public string $fullName = "Vasif Hummetov";
//
//    public static string $age = "27";
//
//    const CONNECTION = "mysql";
//
//    public function getConnection()
//    {
////        return $this->fullName;
////        return User::CONNECTION;
//        return self::CONNECTION;
//    }
//
//    public static function getAge()
//    {
//        return self::$age;
//    }
//
//    public function getTable()
//    {
//        return "aaa";
//    }
//}


//$a = new User();


//$user->create([
//
//]);
//
//echo User::getAge();
//
//echo $user->getAge();

//echo $user->fullName;

//echo $user->getTable();
//echo $user->getConnection();

//echo User::CONNECTION;

//echo User::$age;


//function create(User $user): User
//{
//    return $user;
//}

//abstract class Animal
//{
//    public $voice = "";
//
//    public function makeSound() {
//        echo "NESE";
//    }
//
//    abstract public function test($a, $b): string;
////    public function makeSound() {
////        echo "HAMHAM";
////    }
//}
//
//
//class Bird extends Animal implements Fly
//{
//    public function makeSound()
//    {
//        echo "";
//    }
//
//    public function test($a, $b): string
//    {
//        return "";
//    }
//}
//
//class Dog extends Animal {
//
//    public function test($a, $b): string
//    {
//        return "";
//    }
//}
//
//$bird = new Bird();
//$dog = new Dog();

//$dog->makeSound();

//$bird->makeSound();

//interface Animal
//{
//    public function makeSound();
//}
//
//interface Fly
//{
//    public function flying();
//}
//
//
//class Dog implements Animal, Fly {
//
//    public function makeSound()
//    {
//        // TODO: Implement makeSound() method.
//    }
//
//    public function flying()
//    {
//        // TODO: Implement flying() method.
//    }
//}

//interface Animal
//{
//    public function makeSound();
//}
//
//
//trait MakeSound
//{
//    public function makeSound()
//    {
//
//    }
//}
//
//class Dog implements Animal {
//    use MakeSound;
//}


//class A
//{
//   use F;
//}
//
//class B {
//    function c()
//    {
//        //
//    }
//}
//
//class E
//{
//    function c()
//    {
//        //
//    }
//}
//
//
//trait F
//{
//
//
//    function b()
//    {
//
//    }
//}


























