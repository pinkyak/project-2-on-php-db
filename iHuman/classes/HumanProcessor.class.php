<?php
namespace classes;
class HumanProcessor {
    const EMPLOYEE_FILE_NAME = 'result.txt';

    public function process(IHuman $human){
        $info = $human->getInfo();
        $filename = self::EMPLOYEE_FILE_NAME;
        $succsess = $this->save($filename, $info);

        if($succsess){
            header('Location: goback.php');
            exit();
        }else{
            echo 'Ошибка при добовлении записи!';
        }
    }

    private function save($filename, $info){
        $newline = PHP_EOL;
        $succsess = file_put_contents($filename, $info.$newline , FILE_APPEND);
        return ($succsess !== false);
    }
}