<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name   = trim($_POST["name"]);
    $email  = trim($_POST["email"]);
    $id = trim($_POST["id"]);
    $academicyear= trim($_POST["academicyear"]);
    $batch  = trim($_POST["batch"]);

 
    if (empty($name) || empty($email) || empty($id) || empty($academicyear) || empty($batch)) {
        die(" جميع الحقول مطلوبة. <br><a href='index.php'>العودة للنموذج</a>");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(" البريد الإلكتروني غير صحيح. <br><a href='index.php'>العودة للنموذج</a>");
    }

    $studentData = $name . "|" . $email . "|" . $id . "|" . $academicyear . "|" . $batch . PHP_EOL;


    file_put_contents("students.txt", $studentData, FILE_APPEND);

} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم التسجيل</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container success-box">
        <h1>✅ تم تسجيل الطالب بنجاح</h1>
        <p>تم حفظ بيانات الطالب في النظام.</p>

        <div class="links">
            <a href="index.html">تسجيل طالب جديد</a>
            <a href="students.php">عرض الطلاب المسجلين</a>
        </div>
    </div>

</body>
</html>