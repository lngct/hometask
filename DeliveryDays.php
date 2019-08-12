<?php
$mysqli = new Mysqli('localhost', 'root', 'ui7zHPxw', 'hometask');
$ratetype = ($_POST['ratetype']);

if($ratetype) {
    $query = $mysqli->query("SELECT dlvr_days FROM rates WHERE rate_type=('$ratetype');");
    while($row = $query->fetch_assoc()){
        $result=$row['dlvr_days'];
    }
}
else
    $result = 'Не удалось извлечь данные';
echo json_encode($result);
