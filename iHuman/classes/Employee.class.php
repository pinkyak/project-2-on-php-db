<?php
namespace classes;

class Employee extends Human {
    private string $department;
    private float $salary;

    const DB_NAME = '../haman.db';

    const RESULT_MASSADGE = ", department: %s , salary: %d";
    public function getInfo(): string {
        $result = parent::getInfo();
        return $result.sprintf(self::RESULT_MASSADGE, $this->department, $this->salary);
    }
    
    public function __construct($name , $age , $department , $salary){
        parent::__construct($name, $age);
        $this->department = $department;
        $this->salary = $salary;
    }
    
}
