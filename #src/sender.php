<?
header("Access-Control-Allow-Origin: *"); 
// HTTP_ORIGIN
// REMOTE_ADDR
// REQUEST_METHOD
// print_r(json_encode($_SERVER));

if (
    ($_SERVER["HTTP_ORIGIN"] !== "https://localhost:3000")&&
    ($_SERVER["HTTP_ORIGIN"] !== "https://ipoteka-strah.ru") 
    
    ) {
        http_response_code(403);
        die($_SERVER["HTTP_ORIGIN"]); 
    }


    $to = 'rudikov-web@yandex.ru,ipoteka-strah@yandex.ru,osago.inbox@yandex.ru'; 
    $subject = 'Обращение с сайта ИПОТЕЧНОЕ СТРАХОВАНИЕ';
    $message = '
                <html>
                    <head>
                        <title>'.$_REQUEST["msg"].'</title>
                    </head>
                    <body>
                        <p>ФИО: '.$_REQUEST['name'].'</p>
                        // <p>Дата рождения: '.$_REQUEST['date-birth'].'</p>
                        <p>Пол: '.$_REQUEST['gender'].'</p>
                        // <p>Паспортные данные: '.$_REQUEST['passport'].'</p>
                        // <p>Адрес по прописке: '.$_REQUEST['registered-address'].'</p>
						// 						<p>Дата начала страхования: '.$_REQUEST['start-date'].'</p>
						// 						<p>Дата окончания страхования: '.$_REQUEST['end-date'].'</p>
												<p>Банк: '.$_REQUEST['bank'].'</p> 
												<p>Остаток долга: '.$_REQUEST['balance-owed'].'</p> 
												// <p>Процентная ставка: '.$_REQUEST['interest-rate'].'</p> 
												// <p>Адрес обьекта страхования: '.$_REQUEST['object-address'].'</p> 
												// <p>Харрактеристики обьекта: '.$_REQUEST['object-characteristics'].'</p> 
												// <p>Номер кредитного договора: '.$_REQUEST['agreement-number'].'</p> 
												// <p>Дата начала действия кредитного договора: '.$_REQUEST['start-date-agreement'].'</p> 
                        <p>Телефон: '.$_REQUEST['tel'].'</p> 
                        <p>e-mail: '.$_REQUEST['mail'].'</p>                                     
                    </body>
                </html>'; 
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Заявка с сайта ИПОТЕЧНОЕ СТРАХОВАНИЕ <noreply@ipoteka-strah.ru/>\r\n";
        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            die(array());
        } else {
            http_response_code(403);
            die(array());
        }



?>