<?php
/**
 * Created by PhpStorm.
 * User: caizhili
 * Date: 15/12/13
 * Time: 下午4:03
 */
header('Content-type:text/html;charset="UTF-8" ');

$db = new PDO('mysql:dbname=sign_library;host=localhost', 'root', 'mysql');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $_POST["user"];
$pwd = $_POST["pwd"];
$uuid = $_POST["uuid"];
$local = "http://127.0.0.1/ios/require/";

$query = "SELECT * FROM `user` WHERE `ID` = \"{$user}\" and `pwd` = \"{$pwd}\"";

try {
    $db->query("set names 'utf8'");
    $pdoStatement = $db->query($query);
    if($pdoStatement->rowCount() == 0) {
        $res["0"] = array();
        echo json_encode($res);
    } else {
        $info = $pdoStatement->fetch();
        $res["1"] = [
            "name" => $info["name"],
            "intro" => $info["intro"],
            "sex" => $info["sex"],
            "id" => $info["ID"],
            "img" => $local.$info["img"]
        ];
        //$db->query("insert")

        echo json_encode($res);
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}
?>