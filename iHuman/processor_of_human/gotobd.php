<?php
$lines = file('result.txt');
$lastLine = trim(end($lines));

// Разделение строки на значения
$values = explode(',', $lastLine);

if (count($values) === 4 || count($values) === 5) {
    // Извлечение значений
    $name = getValue($values[0], 'Name:');
    $age = getValue($values[1], 'age:');
    $department = getValue($values[2], 'department:');
    $salary = getValue($values[3], 'salary:');

    // Подключение к базе данных
    if (count($values) === 5) {
        $account = getValue($values[4], 'account:');
        $db = new SQLite3('counteragent.db');
        $db->exec("CREATE TABLE IF NOT EXISTS employees (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            age INTEGER,
            department TEXT,
            salary REAL,
            account TEXT
        )");
        $db->exec("INSERT INTO employees (name, age, department, salary, account) VALUES ('$name', $age, '$department', $salary, $account)");
    } else {
        $db = new SQLite3('employees.db');
        $db->exec("CREATE TABLE IF NOT EXISTS employees (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            age INTEGER,
            department TEXT,
            salary REAL
        )");
        $db->exec("INSERT INTO employees (name, age, department, salary) VALUES ('$name', $age, '$department', $salary)");
    }
    $db->close();
} else {
    echo "Неверный формат данных в файле.";
}

function getValue($value, $prefix)
{
    $trimmedValue = trim($value);
    $prefixLength = strlen($prefix);
    return trim(substr($trimmedValue, $prefixLength));
}
 
?> 