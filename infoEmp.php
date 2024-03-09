<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information of Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .head {
            background-color: #FFD2A8;
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
            margin: 50px 200px 100px 200px;
        }

        .sbox {
            background-color: #FFE0C4;
            width: 800px;
            height: 380px;
            border-radius: 20px;
        }

        #job {
            float: right;
            background-color: #cd7e56;
            margin: 20px 40px 40px 40px;
            width: 180px;
            height: 50px;
            border-radius: 25px;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: aliceblue;
        }

        .buttons {
            float: right;
            margin: 20px 350px 20px 10px;
            padding: 20px;
        }

        #edit {
            background-color: #F9EE99;
            border-radius: 30px;
            border: none;
            padding: 10px 20px 10px 20px;
        }

        #submit {
            background-color: #6BDBC4;
            border-radius: 30px;
            border: none;
            padding: 10px 20px 10px 20px;
        }

        i {
            color: #000000;
            font-size: 20px;
        }

        #arrow {
            float: left;
            background-color: #FFD2A8;
            margin-top: 14px;
            border: none;
        }

        h1 {
            display: inline;
        }

        label {
            float: right;
        }

        #jobx {
            float: left;
            margin-left: 16px;
        }

        #info {
            padding-left: 17px;
            margin: 10px 0px 10px 20px;
        }

        tr {
            height: 45px;
        }

        td {
            width: 145px;
        }
    </style>
</head>

<body>
    <div class="head">
        <button id="arrow"><a
                href="manageEmp.php" style="text-decoration:none; color: #000;">
                <i class="fa-solid fa-arrow-left"></i></a>
        </button>
        <h1 style="padding: 30px; margin: 0%;">ข้อมูลพนักงาน</h1>
    </div>
    <div class="box">
        <?php
        // Check if employee ID is set
        if (isset($_GET['id'])) {

            // 1. Connect to the database
            class MyDB extends SQLite3
            {
                function __construct()
                {
                    $this->open('employee.db');
                }
            }
            // 2. Open database
            $db = new MyDB();
            if (!$db) {
                echo $db->lastErrorMsg();
            }
            // 3. Create SQL query to retrieve employee data by ID
            $id = $_GET['id'];
            $sql = "SELECT * FROM employee WHERE id = $id";
            // 4. Retrieve data
            $result = $db->query($sql);
            // 5. Check if data exists
            if ($row = $result->fetchArray()) {
                // 6. Assign data to variables
                $firstName = $row['FirstName'];
                $lastName = $row['LastName'];
                $nickName = $row['NickName'];
                $tel = $row['Tel'];
                $username = $row['Username'];
                $password = $row['Password'];
                $position = $row['Position'];
            } else {
                echo "ไม่พบข้อมูลพนักงาน";
            }
            // 7. Close database connection
            $db->close();
        }
        ?>

        <div class="sbox">
            <div style="height: 50px;">
                <div id="job">
                    <p><label for='job' id="jobx">ตำแหน่ง : </label></p>
                    <p><?php echo isset($position) ? $position : ''; ?></p>
                </div>
            </div>
            <table>
                <tr>
                    <td id="infox"><label for='FirstName'>ชื่อ : </label></td>
                    <td id="info"><?php echo isset($firstName) ? $firstName : ''; ?></td>
                </tr>
                <tr>
                    <td id="infox"><label for='LastName'>นามสกุล : </label></td>
                    <td id="info"><?php echo isset($lastName) ? $lastName : ''; ?></td>
                </tr>
                <tr>
                    <td id="infox"><label for='NickName'>ชื่อเล่น : </label></td>
                    <td id="info"><?php echo isset($nickName) ? $nickName : ''; ?></td>
                </tr>
                <tr>
                    <td id="infox"><label for='Tel'>เบอร์โทรติดต่อ : </label></td>
                    <td id="info"><?php echo isset($tel) ? $tel : ''; ?></td>
                </tr>
                <tr>
                    <td id="infox"><label for='Username'>ชื่อผู้ใช้ : </label></td>
                    <td id="info"><?php echo isset($username) ? $username : ''; ?></td>
                </tr>
                <tr>
                    <td id="infox"><label for='Password'>รหัสผ่าน : </label></td>
                    <td id="info"><?php echo isset($password) ? $password : ''; ?></td>
                </tr>
            </table>
        </div>
        <div class="buttons">
            <button id="edit"><a href="editInfo.php?id=<?php echo isset($id) ? $id : ''; ?>"
                    style="text-decoration:none; color: #000;">แก้ไขข้อมูล</button>
        </div>
    </div>
</body>

</html>
