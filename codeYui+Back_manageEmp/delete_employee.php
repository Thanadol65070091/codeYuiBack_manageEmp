<?php
// 1. Connect to Database 
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('employee.db');
    }
}

// 2. Open Database 
$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Convert to integer to prevent SQL Injection

    $sql = "DELETE FROM employee WHERE id = $id";

    $result = $db->exec($sql);

    if ($result) {
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "ไม่สามารถลบข้อมูลได้";
    }

    $db->close();
}
?>
