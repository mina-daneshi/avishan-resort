<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname      = htmlspecialchars(trim($_POST['fullname'] ?? 'ثبت‌نشده'));
    $phone         = htmlspecialchars(trim($_POST['phone'] ?? 'ثبت‌نشده'));
    $check_in      = htmlspecialchars(trim($_POST['check_in'] ?? 'ثبت‌نشده'));
    $stay_duration = htmlspecialchars(trim($_POST['stay_duration'] ?? 'ثبت‌نشده'));
    $room_count    = htmlspecialchars(trim($_POST['room_count'] ?? 'ثبت‌نشده'));
    $guests_count  = htmlspecialchars(trim($_POST['guests_count'] ?? 'ثبت‌نشده'));
    $notes         = htmlspecialchars(trim($_POST['notes'] ?? 'ندارد'));
    
    date_default_timezone_set('Asia/Tehran');
    $created_at = date("Y-m-d H:i:s");

    $entry = "========================================\n";
    $entry .= "زمان ثبت رزرو: " . $created_at . "\n";
    $entry .= "نام و نام خانوادگی: " . $fullname . "\n";
    $entry .= "شماره همراه: " . $phone . "\n";
    $entry .= "تاریخ ورود: " . $check_in . "\n";
    $entry .= "مدت اقامت: " . $stay_duration . " شب\n";
    $entry .= "تعداد اتاق: " . $room_count . "\n";
    $entry .= "تعداد نفرات: " . $guests_count . "\n";
    $entry .= "توضیحات: " . $notes . "\n";
    $entry .= "========================================\n\n";

    $file_path = __DIR__ . '/reservations.txt';

    file_put_contents($file_path, $entry, FILE_APPEND | LOCK_EX);

    ?>
    <!DOCTYPE html>
    <html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ثبت موفق رزرو</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="menu-body">
        <div class="confirm-card">
            <h2>درخواست شما ثبت شد!</h2>
            <p>
           آقا/خانم<strong><?php echo $fullname; ?></strong> عزیز، درخواست اقامت شما دریافت گردید.<br>
                میزبان اقامتگاه به‌زودی جهت هماهنگی نهایی با شماره <strong><?php echo $phone; ?></strong> تماس خواهد گرفت.
            </p>
            <a href="reserve.html" class="btn-return">بازگشت به صفحه رزرو</a>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: reserve.html");
    exit();
}
?>