<?php
require_once __DIR__ . '/Departments.php';
require_once __DIR__ . '/database.php';

// eseguo la query tramite prepare per questioni di sicurezza
$sql = $conn->prepare("SELECT * FROM `departments` WHERE `id`=?");
$sql->bind_param("d", $id);
// inizializzo $id che tramite get mi darà l'id da index.php
$id = $_GET['id'];
// Eseguo la query e la inserisco nella variabile result
$sql->execute();
$result = $sql->get_result();

// se result è ok e le righe sono superiori a zero,  
// per ogni riga inserisco il risultato all'interno dell'array di oggetti
if($result && $result->num_rows > 0) {
    $departments = [];
    while($row = $result->fetch_assoc()) {
        $new_department = new Departments();
        $new_department->name = $row['name'];
        $new_department->website = $row['website'];
        $new_department->address = $row['address'];
        $new_department->phone = $row['phone'];
        $new_department->email = $row['email'];
        $new_department->head_of_department = $row['head_of_department'];
        $departments[] = $new_department;
    }
} elseif($result) {
    echo 'There are no results';
} else {
    echo 'Query error';
    die();
}
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
    <!-- Creo la lista con i dati del dipartimento selezionato -->
    <?php foreach($departments as $department) { ?>
        <ul>
            <li>Name: <?php echo $department->name; ?></li>
            <li>Address: <?php echo $department->address; ?></li>
            <li>Email: <?php echo $department->email; ?></li>
            <li>Website:  <?php echo $department->website; ?></li>
        </ul>
    <?php } ?>
</body>
</html>