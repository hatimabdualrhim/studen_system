<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطلاب المسجلين</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>عرض الطلاب المسجلين</h1>
        <p class="subtitle">جميع الطلاب الذين تم تسجيلهم في النظام</p>

        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>اسم الطالب</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الطالب</th>
                        <th>السنة الدراسي</th>
                        <th>اسم الدفعة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $file = "students.txt";

                    if (file_exists($file) && filesize($file) > 0) {
                        $students = file($file, FILE_IGNORE_NEW_LINES);

                        foreach ($students as $student) {
                            $data = explode("|", $student);

                            if (count($data) == 5) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($data[0]) . "</td>";
                                echo "<td>" . htmlspecialchars($data[1]) . "</td>";
                                echo "<td>" . htmlspecialchars($data[2]) . "</td>";
                                echo "<td>" . htmlspecialchars($data[3]) . "</td>";
                                echo "<td>" . htmlspecialchars($data[4]) . "</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>لا يوجد طلاب مسجلون حتى الآن</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="links">
            <a href="index.html">العودة إلى نموذج التسجيل</a>
        </div>
    </div>

</body>
</html>