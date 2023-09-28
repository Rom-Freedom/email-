<?php
$msg_box = "";
$errors = array(); //box to collect errors
if($_POST['user_name'] == "") $errors[] = "Поле имени не заполнено!";
if(($_POST['user_email'] == "") || (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) == false)){
    $errors[] = "Поду email не заполнено!";
}
if(($_POST['user_phone'] == "") || strlen($_POST['user_phone']) <12 ){
    $errors[] = "Поле номер телефона не корректно!";
}
if($_POST['text_comment'] == "") $errors[] = "Поле текст не заполнено!";