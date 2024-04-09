<?php
$telegramToken = '7120591600:AAGprfaAwBjtXb5RUQDpB-Hwj3xTVx__akM';
$chatId = '-1002143684829';

$sub1 = $_POST['sub1'];
$keyword = $_POST['keyword'];
$gclid = $_POST['gclid'];
$summa = $_POST['summa'];
$credit = $_POST['credit'];
$phone = $_POST['phone'];
$choose = $_POST['choose'];

// Сообщение для отправки в Telegram
$telegramMessage = "Sub1: $sub1\nkeyword: $keyword\ngclid: $gclid\nСумма: $summa\nТелефон: $phone\nНаличие кредита: $credit\nКак связаться: $choose";

// URL для отправки сообщения в Telegram
$telegramApiUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";

// Параметры для запроса
$telegramParams = [
    'chat_id' => $chatId,
    'text' => $telegramMessage,
];

// Используем cURL для отправки запроса
$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($telegramParams));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
curl_close($ch);

$redirectUrl = 'thanks.html';
header('Location: ' . $redirectUrl, true, 302);
exit;
?>