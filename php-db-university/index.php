<?php
require_once __DIR__ . '/Departments.php';
require_once __DIR__ . '/database.php';

// query per il database
$sql = 'SELECT * FROM `departments`';
$result = $conn->query($sql);

// se result è ok e le righe sono superiori a zero,  
// per ogni riga inserisco il risultato all'interno dell'array di oggetti
if($result && $result->num_rows > 0) {
    $departments = [];
    while($row = $result->fetch_assoc()) {
        $department = new Departments();
        $department->id = $row['id'];
        $department->name = $row['name'];
        $departments[] = $department;
    }
} elseif($result) {
    echo 'There are no results';
} else {
    echo 'Query error';
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Creo la lista con tutti i dipartimenti -->
    <ul>
        <?php foreach($departments as $department) {?>
            <li><a href="department-details.php?id=<?php echo $department->id;?>"><?php echo $department->name;?></a></li>
        <?php }?>
    </ul>
</body>
</html>