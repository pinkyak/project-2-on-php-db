<?php
spl_autoload_register(function($class){
    $filename = __DIR__.'//../'.str_replace('\\' , '/', $class).'.class.php';
    require_once $filename;
});

use classes\Employee;
use classes\Counteragent;
use classes\HumanProcessor;

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['formEmployee'])){
        humanEmployee();
    }
    if(isset($_POST['formCounteragent'])){
        humanCounteragent();
    }
}
function humanEmployee(): void{
        $name = $_POST['name'];
        $age = $_POST['age'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
    if(!empty($name) && !empty($age) && !empty($department) && !empty($salary)){
        $employee = new Employee($name,$age,$department,$salary);
        displayHuman($employee);
    }else{
        $errMsg = 'Заполните все поля!';
        echo $errMsg;
    }
}
function humanCounteragent(): void{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $account = $_POST['account'];
    

    if(!empty($name) && !empty($age) && !empty($department) && !empty($salary) && !empty($account)){
        $counteragent = new Counteragent($name , $age , $department , $salary, $account);
        displayHuman($counteragent);
    }else{
        $errMsg = 'Заполните все поля!';
        echo $errMsg;
    }
}

function displayHuman($info){
    $humanProcessor = new HumanProcessor();
    $humanProcessor->process($info);
}