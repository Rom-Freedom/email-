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

if(empty($errors)){
    $messange = "ФИО пользователя: " . $_POST['user_name'] . "<br/>";
    $messange = "Email пользователя: " . $_POST['user_email'] . "<br/>";
    $messange = "Номер тедефона пользователя: " . $_POST['user_phone'] . "<br/>";
    $messange = "Текст письма пользователя: " . $_POST['text_comment'];
    send_mail($messange);
    $msg_box = "<span style='color: green:'>Сообщение успешно отправлено!</span>";
}else{
    $msg_box = "";
    foreach($errors as $one_error){
        $msg_box .= "<span style='color: red;/>$one_error</span><br/>";
    }
}