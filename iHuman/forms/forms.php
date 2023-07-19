<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['human'])){
        $selectedPage = $_POST['human'];
    
        switch($selectedPage){
            case 'employee':
                header('Location: employee.form.php');
                exit();
            case 'counteragent':
                header('Location: counteragent.form.php');
                exit();
        }
    }
}