<?php


function test($a, $b)
{
    return $a + $b;
}


//echo test();

echo call_user_func_array('test', [5,10]);


class Product
{
    public function username()
    {
        return "USERNAME";
    }
}


//[$class, $method] = [User::class, 'username'];

//echo (new $class)->$method();

//echo call_user_func_array([new $class, $method], []);




class Model
{
    public function getTable()
    {
        return "MODEL TABLE";
    }
}

class DB extends Model
{
    protected ?string $model = "DATABASE";

    public function getTable()
    {
        return parent::getTable();
    }
}

class User extends DB {
    public string $fullName = "Vasif Hummetov";

    public static string $age = "27";

    const CONNECTION = "mysql";

    public function getConnection()
    {
//        return $this->fullName;
//        return User::CONNECTION;
        return self::CONNECTION;
    }

    public static function getAge()
    {
        return self::$age;
    }

    public function getTable()
    {
        return parent::getTable();
    }
}


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





