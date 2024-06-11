<?php
#[Attribute]
class Group
{
    public function ddd()
    {
        echo "ssss";
    }
}

#[Group]
class A extends C
{
    const SITE = "https://big.az";

    public function __construct()
    {
    }

    public function c()
    {

    }
}

class C
{
    public $name;
}

$reflection = new ReflectionClass(A::class);

//foreach ($reflection->getAttributes() as $reflectionAttribute) {
//    $attributeInstance = $reflectionAttribute->newInstance();
//    $attributeInstance->ddd();
//}


//foreach ($reflection->getMethods() as $reflectionMethod) {
//    var_dump($reflectionMethod->getName());
//}

//echo $reflection->getConstant('SITE');

//$reflectionConstant = new ReflectionClassConstant(new A(), 'SITE');
//
//var_dump($reflectionConstant->getValue());


//foreach ($reflection->getConstants() as $reflectionConstant) {
//    var_dump($reflectionConstant);
//}


//var_dump($reflection->getConstructor());

//var_dump($reflection->getName());
//var_dump($reflection->getShortName());
//var_dump($reflection->getParentClass());
//var_dump($reflection->getProperty('name'));
//var_dump($reflection->hasProperty('name'));


//class Foo {
//    public function bar() {
//
//    }
//}
//
//$methodInfo = ReflectionMethod::createFromMethodName('Foo::bar');
//var_dump($methodInfo);

function exampleFunction($a, $b, ...$c) {
    // Function body
}

$reflectionFunction = new ReflectionFunction('exampleFunction');
$params = $reflectionFunction->getParameters();

foreach ($params as $param) {
    echo "Parameter: " . $param->getName() . "\n";
    echo "Is Variadic: " . ($param->isVariadic() ? 'Yes' : 'No') . "\n";
    echo "\n";
}