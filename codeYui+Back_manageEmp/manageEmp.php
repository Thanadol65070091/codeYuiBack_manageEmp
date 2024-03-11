<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .head {
            background-color: #FFC6BB;
            width: 100%;
            height: 76px;
            margin: 0px;
            padding: 24px 0px 0px 10px;
        }
        
        body {
            margin: 0%;
            background-color: #FFFAF7;
            font-family: "Kanit", sans-serif;
            font-weight: 400;
        }
        
        .box {
            margin: 50px 50px 100px 200px;
            margin-bottom: 50px;
        }
        
        button {
            float: right;
            border-radius: 20px;
            border: none;
            height: 30px;
            justify-content: center;
            align-items: center;
            margin: 4px;
        }
        
        #xxx {
            justify-content: center;
            align-items: center;
            padding: 10px;
            height: 50px;
        }
        
        .sbox {
            align-items: left;
            width: 1000px;
            margin-left: 30px;
        }
        
        table {
            background-color: #FFDAD3;
            float: left;
            border-radius: 10px;
            width: 100%;
        
        }
        
        th {
            border-bottom: solid 1px #760120;
            text-align: center;
        }
        
        td {
            text-align: center;
        }
        
        #th_num,
        #td_num {
            width: 10%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        #th_name {
            width: 30%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        #th_job,
        #td_job {
            width: 20%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        #th_tel,
        #td_tel {
            width: 20%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        #td_name {
            padding-left: 30px;
        }
        
        #viewinfo {
            background-color: #F6A6A5;
        }
        
        .delete {
            background-color: #F64141;
            cursor: pointer;
        }
        
        i {
            color: #000000;
            font-size: 20px;
        }
        
        #arrow {
            float: left;
            background-color: #FFC6BB;
            margin-top: 13px;
        }
        
        h1 {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="head">
        <button id="arrow"><a href="home_manager.html" style="text-decoration:none; color: #000;">
                <i class="fa-solid fa-arrow-left"></i></a>
        </button>
        <h1 style="padding: 30px; margin: 0%;">จัดการพนักงาน</h1>
    </div>
    <div class="box">
        <div id="xxx">
            <h2 style="float: left;">รายชื่อพนักงานทั้งหมด</h2>
            <button id="add" style="background-color: #A6D4D4; margin: 27px 300px 10px 10px; width: 110px;"><a href="addEmp.php" style="text-decoration:none; color: #000;">เพิ่มพนักงาน</a></button>
        </div>
        <div class="sbox">
            <table>
                <tr>
                    <th id="th_num">ลำดับ</th>
                    <th id="th_name">ชื่อ-นามสกุล</th>
                    <th id="th_job">ตำแหน่ง</th>
                    <th id="th_tel">เบอร์โทร</th>
                </tr>
                <tbody>
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

                    $sql = "SELECT id, FirstName, LastName, Position, Tel FROM employee";

                    $result = $db->query($sql);

                    // เก็บลำดับ
                    $counter = 1;

                    // แสดงข้อมูล
                    while ($row = $result->fetchArray()) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$row['FirstName']} {$row['LastName']}</td>";
                        echo "<td>{$row['Position']}</td>";
                        echo "<td>{$row['Tel']}</td>";
                        echo "<td>";
                        echo "<div class='bn'>";
                        echo "<button class='delete' data-id='{$row['id']}' style='width: 38px;'>ลบ</button>";
                        echo "<button id='viewinfo' style='width: 65px;'><a href='infoEmp.php?id={$row['id']}' style='text-decoration:none; color: #000;'>ดูข้อมูล</a></button>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                        // เพิ่มลำดับขึ้นเรื่อยๆ
                        $counter++;
                    }

                    $db->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".delete").click(function () {
                var id = $(this).data('id');
                var row = $(this).closest("tr");
                if (confirm("คุณแน่ใจหรือไม่ที่ต้องการลบข้อมูลของพนักงานคนนี้?")) {
                    $.post("delete_employee.php", { id: id }, function (data, status) {
                        alert(data);
                        if (data.includes("ลบข้อมูลเรียบร้อยแล้ว")) {
                            row.remove();
                            updateEmployeeOrder();
                        }
                    });
                }
            });
        });

    // อัพเดทลำดับในตารางแบบเรียลไทม์
    function updateEmployeeOrder() {
        var counter = 0;
        $('table tbody tr').each(function() {
            $(this).find('td:first').text(counter);
            counter++;
        });
    }
    </script>

</body>
</html>


