<?php
namespace classes;
class Counteragent extends Employee {
    private int $account;

    const ACCOUNT_MASSADGE = ", account: %d";

    public function getInfo(): string {
        $result = parent::getInfo();
        return $result.sprintf(self::ACCOUNT_MASSADGE, $this->account);
    }

    public function __construct($name , $age , $department , $salary, $account){
        parent::__construct($name , $age, $department, $salary);
        $this->account = $account;      
    }
}
