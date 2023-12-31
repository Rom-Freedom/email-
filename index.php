<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sennding letters by email</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){  
            $('#btn_submit').click(function(){   // to commit a click on a buton
                var user_name = $('#user_name').val(); //to get value user
                var user_email = $('#user_email').val();
                var user_phone = $('#user_phone').val();
                var text_comment = $('#text_comment').val();
                var re_em = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i; //regular expression for email
                var ru_nu = /^[\d\+][\d\(\)\ -]{10,14}\d$/;  //regular expression for phone

                if(user_name == ''){
                    document.getElementById('user_name').style.borderColor = 'red';
                }else{
                    document.getElementById('user_name').style.borderColor = 'green';
                }

                if(user_email == '' || !re_em.test(user_email)){
                    document.getElementById('user_email').style.borderColor = 'red';
                }else{
                    document.getElementById('user_email').style.borderColor = 'green';
                }

                if(user_phone == ''|| !re_nu.test(user_phone)){
                    document.getElementById('user_phone').style.borderColor = 'red';
                }else{
                    document.getElementById('user_phone').style.borderColor = 'green';
                }

                if(text_comment == ''){
                    document.getElementById('text_comment').style.borderColor = 'red';
                }else{
                    document.getElementById('text_comment').style.borderColor = 'green';
                }

                $.ajax({
                    url: "action_php",
                    type: "post",
                    dataType: "json",
                    data: {
                        "user_name": user_name,
                        "user_email": user_email,
                        "user_phone": user_phone,
                        "text_comment": text_comment
                    },
                    // to get responce from a server
                    success: function(data){
                        $('.messages').html(data.reset);
                    }
                })
            });
        });
    </script>
</head>


<body>
    <div class="container">
        <div class="left">
            <br>
            <div class="message"></div>
            <br>

            <div class="header">
                <h2 class="animation a1">Добро пожаловать!</h2>
                <h4 class="animation a2">Напишите Ваше письмо</h4>
            </div>

            <div class="form">
                <input type="text" class="form-field animation a1" id="user_name" placeholder="Введите Ваше имя:">
                <input type="text" class="form-field animation a2" id="user_email" placeholder="Введите Ваш e-mail:">
                <input type="text" class="form-field animation a3" id="user_phone" placeholder="+79814125678">
                <textarea id="text_comment" class="form-field animation a4" type="text" placeholder="Напишите Ваше письмо"></textarea>
                <button class="animation a5" id="btn_submit">Отправить</button>
            </div>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>