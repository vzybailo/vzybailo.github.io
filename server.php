<?php


    $name = $_POST['user-name'];
    $email = $_POST['user-mail'];
    $message = $_POST['message'];


    $mail_message = '
    <html>
        <head>
            <title>Заявка с сайта</title>
        </head>
        <body>
            <h2>Заказ</h2>
            <ul>
                <li>Имя: ' . $name . '</li>
                <li>Email: ' . $email . '</li>
                <li>Сообщение: ' . $message . '</li>
            </ul>
        </body>
    </html>    
    ';

    $headers = "From: Администратор сайта <admin@vental.com>\r\n".
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";

    $mail = mail('vental@bk.ru', 'Заказ', $mail_message, $headers);

    $data = [];

    if ($mail) {
        $data['status'] = "OK";
        $data['mes'] = "Письмо успешно отправлено";
    }else{
        $data['status'] = "NO";
        $data['mes'] = "На сервере произошла ошибка";
    }

    echo json_encode($data);


?>



