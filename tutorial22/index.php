<!DOCTYPE html>
<html>
<body>

<?php
        $servername = "localhost";
        $username = "admin";
        $password = "12345";
        $dbname = "SensitiveDaten";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("awww");
        }
        $sql = $conn->prepare("SELECT Username, Password FROM users WHERE Username=? AND Password=?");
        $sql->bind_param("ss", $_POST["username"], $_POST["passwort"]);
        $sql->execute();
        $sql->bind_result($res_user, $res_pass);
        while ($sql->fetch())
        {
            echo $res_user . " - " . $res_pass;
        }
        $sql->close();
?>
<form action="sqli.php" method=""post">
    Username: <input type="text" name="username"/>
    Passwort: <input type="text" name="passwort"/>
    <input type="submit" value="Einloggen" name="submit"/>
</form>

</body>
</html>