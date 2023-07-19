<?php
$msg = 'ваша запись успешно добавлена в ФАЙЛ! <br>
Проверьте содержимое данных и отправте их на сервер <br>';
echo $msg.'<br>';
$filename = 'result.txt';

function getLastEntryFromFile($filename) {
    $lines = file($filename);
    $lastEntry = end($lines);
    return $lastEntry;
}
$lastEntry = getLastEntryFromFile($filename);
echo $lastEntry."<hr>";
function deleteEntryFromFile($filename){
    $lines = file($filename);
    array_pop($lines);
    file_put_contents($filename , implode('', $lines));
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['GoBack']){
        deleteEntryFromFile($filename);
        header('Location: ../index.php');
        exit();
    }
    if($_POST['GOBD']){
        require('gotobd.php');
        header('Location: ../index.php');
        exit();
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBack</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method='post'>
    <input type="submit" name='GOBD' value="Отправить данные на сервер">
    <input type="submit" name='GoBack'value="Вернуться назад">
</form>
</body>
</html>