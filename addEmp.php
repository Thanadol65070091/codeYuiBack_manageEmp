<?php
    // มีการส่งข้อมูลแบบ POST มามั้ย
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = new SQLite3('employee.db');
        if (!$db) {
            die($db->lastErrorMsg());
        }

        // รับค่าจากฟอร์ม
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $NickName = $_POST['NickName'];
        $Tel = $_POST['Tel'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $Position = $_POST['Position'];

        $sql = "INSERT INTO employee (FirstName, LastName, NickName, Tel, Username, Password, Position) 
                VALUES ('$FirstName', '$LastName', '$NickName', '$Tel', '$Username', '$Password', '$Position')";

        $result = $db->exec($sql);

        if ($result) {
            header("Location: manageEmp.php");
            exit();
        } else {
            echo "มีข้อผิดพลาดเกิดขึ้น";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 400;
            margin: 0%;
            background-color: #FFFAF7;
        }

        .box {
            margin: 50px 180px 10px 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .sbox {
            background-color: #FFDAD3;
            width: 800px;
            height: 440px;
            border-radius: 20px;
        }

        #info {
            margin-left: 40px;
        }

        .buttons {
            float: right;
            margin: 0px 350px 20px 10px;
            padding: 20px;
        }

        #submit {
            background-color: #6BDBC4;
            border-radius: 30px;
            border: none;
            width: 65px; height: 35px;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 0px;
            cursor: pointer;
        }

        input {
            border-radius: 20px;
            height: 25px;
            border-color: #F6A6A5;
            padding-left: 10px;
            margin: 10px 0px 10px 10px;

        }

        select {
            background-color: #F6A6A5;
            border: none;
            color: aliceblue;
            font-size: medium;
        }

        select#Position {
            background-color: #F6A6A5;
            border: none;
            color: aliceblue;
            font-size: medium;
            border-radius: 20px;
            height: 25px;
            padding-left: 10px;
            margin: 10px 0px 10px 10px;
        }
        select#Position option {
            background-color: #F6A6A5;
            color: aliceblue;
        }

        td {
            width: 110px;
        }

        label {
            float: right;
        }

        #jobx {
            float: left;
            margin-left: 16px;
        }
    </style>
</head>

<body>
    <div class="head" style="background-color: #FFC6BB; width: 100%; height: 100px; margin: 0%;">
        <h1 style="padding: 30px; margin: 0%;">เพิ่มพนักงาน</h1>
    </div>
    <div class="box">
        <div class="sbox">
            <form id="info" method="post" action="addEmp.php" onsubmit="return validateForm()">
                <table>
                    <tr>
                        <td><label for='Position'>ตำแหน่ง : </label></td>
                        <td>
                            <select id="Position" name="Position">
                                <option value="พนักงาน">พนักงาน</option>
                                <option value="พ่อครัว">พ่อครัว</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='FirstName'>ชื่อ : </label></td>
                        <td><input type="text" id="FirstName" name="FirstName"></td>
                    </tr>
                    <tr>
                        <td><label for='LastName'>นามสกุล : </label></td>
                        <td><input type="text" id="LastName" name="LastName"></td>
                    </tr>
                    <tr>
                        <td><label for='NickName'>ชื่อเล่น : </label></td>
                        <td><input type="text" id="NickName" name="NickName"></td>
                    </tr>
                    <tr>
                        <td><label for='Tel'>เบอร์โทรติดต่อ : </label></td>
                        <td><input type="text" id="Tel" name="Tel"></td>
                    </tr>
                    <tr>
                        <td><label for='Username'>ชื่อผู้ใช้ : </label></td>
                        <td><input type="text" id="Username" name="Username"></td>
                    </tr>
                    <tr>
                        <td><label for='Password'>รหัสผ่าน : </label></td>
                        <td><input type="text" id="Password" name="Password"></td>
                    </tr>
                </table>

                <div class="buttons">
                    <button id="submit" type="submit">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var firstName = document.getElementById("FirstName").value;
            var lastName = document.getElementById("LastName").value;
            var nickName = document.getElementById("NickName").value;
            var tel = document.getElementById("Tel").value;
            var username = document.getElementById("Username").value;
            var password = document.getElementById("Password").value;
            var position = document.getElementById("Position").value;

            if (firstName == "" || lastName == "" || nickName == "" || tel == "" || username == "" || password == "" || position == "") {
                alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                return false;
            }
            alert("เพิ่มพนักงานสำเร็จ");
            return true;
        }
    </script>
</body>
</html>
