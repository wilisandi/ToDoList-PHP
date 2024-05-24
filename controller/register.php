<?php
session_start();
include 'controller.php';

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";

$global =  $controller->Register($name, $email, $password,$confirm_password);
if ($global->status == 200) {
    header("Location:../login.php?email=".$email);
} else {
    $_SESSION["errors"] = $global->message;
    header("Location:../register.php?name=".$name."&email=".$email."&password=".$password."&confirm_password=".$confirm_password);
}
