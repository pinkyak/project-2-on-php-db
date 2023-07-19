<?php
namespace classes;
abstract class Human implements IHuman {
    private string $name;
    private int $age;

    // private static int $objCounter = 0; 

    const INFO_TEMPLATE = "Name: %s , age: %d";
    // const OBJECT_COUNTER_MASSADGE = "Obj counter is: %d";

    public function getInfo(): string {
        return sprintf(self::INFO_TEMPLATE, $this->name, $this->age);
    }

    // public final static function getObjCounter(): int{
    //     return self::$objCounter;
    // }

    // public static function pretyPrintOfObjCounter(): void{
    //     echo sprintf(self::OBJECT_COUNTER_MASSADGE, self::$objCounter).PHP_EOL;
    // }
    public function __construct($name , $age){
        $this->name = $name;
        $this->age = $age;
        // self::$objCounter++;
    }
}