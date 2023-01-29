<?php

include "DataBase.php";

if (isset($_REQUEST['insertBtn']) == true) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['gender'];
    $a = new DataBase();
    $a->insert('office', ['Name' => $name, 'Email' => $email, 'Password' => $password, 'PhoneNo' => $phone, 'Gender' => $gender]);
    if ($a == true) {
        header("location:Index.php");
    }
} elseif (isset($_REQUEST['editId']) == true) {
    $id = $_REQUEST['editId'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['gender'];
    $a = new DataBase();
    $a->update('office', ['Name' => $name, 'Email' => $email, 'Password' => $password, 'PhoneNo' => $phone, 'Gender' => $gender], $id);
    if ($a == true) {
        header("location:ReadData.php");
    }
} else if (isset($_GET['deleteid']) == true) {
    $id = $_GET['deleteid'];
    $a = new DataBase();
    $a->delete('office', $id);
    if ($a == true) {
        header('location:ReadData.php');
    }
}
?>
