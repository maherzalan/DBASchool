<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_token = $_POST["api_token"];
    $sender = $_POST["sender"];
    $mobile = $_POST["mobile"];
    $type = $_POST["type"];
    $text = $_POST["text"];

    // بناء الرابط بناءً على البيانات المدخلة
    $url = "http://hotsms.ps/sendbulksms.php?api_token=$api_token&sender=$sender&mobile=$mobile&type=$type&text=$text";

    // إرسال الطلب باستخدام cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // عرض الاستجابة
    echo "استجابة الخادم: " . $response;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إرسال رسالة</title>
</head>
<body>
    <form action="send_sms.php" method="post">
        <label for="api_token">API Token:</label>
        <input type="text" name="api_token" required><br><br>
        
        <label for="sender">المرسل:</label>
        <input type="text" name="sender" required><br><br>
        
        <label for="mobile">الرقم المستلم:</label>
        <input type="text" name="mobile" required><br><br>
        
        <label for="type">نوع الرسالة:</label>
        <input type="text" name="type" required><br><br>
        
        <label for="text">نص الرسالة:</label>
        <input type="text" name="text" required><br><br>
        
        <input type="submit" value="إرسال الرسالة">
    </form>
</body>
</html>