<?php

session_start();
include 'controller.php';

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$global =  $controller->Login($email, $password);
if ($global->status == 200) {
    $_SESSION["login"] = true;
    $_SESSION["nama"] = $global->data->name;
    header("Location:../index.php");
} else {
    $response = base64_encode(json_encode($global));
    $_SESSION["errors"] = $global->message;
    header("Location:../login.php");
}
