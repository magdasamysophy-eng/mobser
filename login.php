<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "mobsar_db";

$conn = new mysqli($host, $username_db, $password_db, $dbname);
$conn->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_btn'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $conn->real_escape_string($_POST['role']);
    $enable_spiritual = $conn->real_escape_string($_POST['enable_spiritual']);
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $age = intval($_POST['age']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "INSERT INTO users (username, password, role, enable_spiritual, full_name, age, phone) 
            VALUES ('$username', '$password', '$role', '$enable_spiritual', '$full_name', $age, '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('تم تسجيل الحساب بنجاح!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('حدث خطأ أثناء التسجيل: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - التسجيل</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cinzel:ital,wght@1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Cairo', sans-serif;
}

body {
    background:
        radial-gradient(circle at 50% 8%, rgba(126, 34, 206, 0.25), transparent 35%),
        radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.08), transparent 30%),
        #010003;
    min-height: 100vh;
    color: #f3f4f6;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-bottom: 70px;
}

/* =========================
   شريط الصفحة
========================= */

.top-nav-bar {
    width: 90%;
    max-width: 1100px;
    display: flex;
    justify-content: flex-start;
    padding: 25px 0 0;
}

.home-back-btn {
    background: rgba(10, 2, 18, 0.96);
    border: 1px solid #d4af37;
    color: #d4af37;
    padding: 12px 24px;
    border-radius: 14px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
    box-shadow: 0 0 18px rgba(212, 175, 55, 0.3);
}

.home-back-btn:hover {
    background: #d4af37;
    color: #030105;
    transform: translateY(-2px);
    box-shadow: 0 0 30px rgba(212, 175, 55, 0.8);
}

/* =========================
   رأس MOBSAR
========================= */

.hero-header {
    text-align: center;
    padding: 25px 20px 10px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.mobsar-brand-wrapper {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    padding: 25px 55px;
    border-radius: 50%;
    background:
        radial-gradient(
            circle,
            rgba(126, 34, 206, 0.20) 0%,
            rgba(5, 0, 10, 0.9) 70%
        );
    border: 2px solid rgba(212, 175, 55, 0.55);
    box-shadow:
        0 0 45px rgba(126, 34, 206, 0.45),
        inset 0 0 30px rgba(212, 175, 55, 0.25);
    animation: brandGlow 3s infinite alternate;
}

@keyframes brandGlow {
    from {
        box-shadow:
            0 0 35px rgba(126, 34, 206, 0.35),
            inset 0 0 20px rgba(212, 175, 55, 0.2);
    }

    to {
        box-shadow:
            0 0 70px rgba(212, 175, 55, 0.55),
            inset 0 0 45px rgba(126, 34, 206, 0.5);
    }
}

.hero-eye-icon {
    font-size: 5.8rem;
    color: #f3e8ff;
    filter:
        drop-shadow(0 0 25px rgba(233, 213, 255, 0.9))
        drop-shadow(0 0 60px rgba(126, 34, 206, 0.8));
    animation: eyeFloat 2.5s infinite alternate;
}

@keyframes eyeFloat {
    from {
        transform: translateY(0) scale(1);
    }

    to {
        transform: translateY(-5px) scale(1.05);
    }
}

.big-mobsar-title {
    font-family: 'Cinzel', serif;
    font-style: italic;
    font-weight: 800;
    font-size: 6rem;
    background:
        linear-gradient(
            135deg,
            #ffffff,
            #fef08a,
            #d4af37,
            #996515
        );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: 6px;
    transform: skewX(-10deg);
    filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.8));
}

.massive-glow-line {
    width: min(450px, 80%);
    height: 5px;
    background:
        linear-gradient(
            90deg,
            transparent,
            #d4af37,
            #f3e8ff,
            #d4af37,
            transparent
        );
    box-shadow:
        0 0 25px #d4af37,
        0 0 55px #7e22ce;
    margin: 20px auto 12px;
    border-radius: 50%;
}

.sub-title {
    font-size: 3rem;
    color: #fce7f3;
    margin-top: 5px;
    font-weight: 700;
    text-shadow: 0 0 30px rgba(212, 175, 55, 0.8);
}

/* =========================
   إخفاء جميع عناصر الميكروفون
   الصوت يعمل من JavaScript بدون ظهور مايك
========================= */

.global-command-mic-container,
.global-voice-widget,
.field-mic-btn,
.confirm-mic-btn {
    display: none !important;
}

/* =========================
   شبكة البيانات
========================= */

.main-grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    width: 90%;
    max-width: 1100px;
    margin-top: 25px;
}

.card-box {
    background:
        linear-gradient(
            145deg,
            rgba(8, 2, 16, 0.98),
            rgba(3, 0, 7, 0.98)
        );
    backdrop-filter: blur(16px);
    border: 1px solid rgba(126, 34, 206, 0.45);
    border-radius: 22px;
    padding: 25px;
    box-shadow:
        0 15px 45px rgba(0, 0, 0, 0.98),
        inset 0 0 30px rgba(35, 5, 58, 0.7);
    transition: 0.3s;
}

.card-box:hover {
    border-color: rgba(212, 175, 55, 0.55);
    box-shadow:
        0 18px 50px rgba(0, 0, 0, 1),
        0 0 25px rgba(126, 34, 206, 0.25),
        inset 0 0 35px rgba(35, 5, 58, 0.8);
}

.card-box h3 {
    color: #fff;
    font-size: 1.4rem;
    margin-bottom: 20px;
    text-align: right;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    padding-bottom: 10px;
}

/* =========================
   الحقول
========================= */

.form-group {
    margin-bottom: 18px;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 7px;
    color: #d4af37;
    font-weight: 700;
    font-size: 0.98rem;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    background: rgba(2, 0, 4, 0.96);
    border: 1px solid rgba(126, 34, 206, 0.55);
    border-radius: 12px;
    color: #fff;
    font-size: 1.05rem;
    transition: 0.3s;
}

.form-control::placeholder {
    color: rgba(255,255,255,0.35);
}

.form-control:focus {
    outline: none;
    border-color: #d4af37;
    box-shadow:
        0 0 20px rgba(212, 175, 55, 0.55),
        inset 0 0 10px rgba(126, 34, 206, 0.15);
    background: rgba(3, 0, 6, 0.99);
}

/* إخفاء أي زر ميكروفون حتى لو بقي في HTML */
.field-mic-btn,
.confirm-mic-btn {
    display: none !important;
}

/* =========================
   إظهار كلمة المرور
========================= */

.toggle-password-icon {
    position: absolute;
    left: 15px;
    cursor: pointer;
    color: #d4af37;
    font-size: 1.25rem;
    transition: 0.3s;
}

.toggle-password-icon:hover {
    color: #fff;
    transform: scale(1.08);
}

/* =========================
   الأزرار السفلية
========================= */

.submit-container {
    grid-column: span 1 / -1;
    text-align: center;
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: center;
}

.action-buttons-row {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    align-items: center;
}

.profile-drawer-toggle {
    background: rgba(10, 2, 18, 0.96);
    border: 1px solid #7e22ce;
    color: #fef08a;
    padding: 14px 28px;
    border-radius: 16px;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 0 25px rgba(126, 34, 206, 0.45);
    transition: 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.profile-drawer-toggle:hover {
    background: #581c87;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 0 30px rgba(212, 175, 55, 0.75);
}

.delete-account-btn {
    background: rgba(20, 2, 5, 0.96);
    border: 1px solid #ef4444;
    color: #fca5a5;
    padding: 14px 28px;
    border-radius: 16px;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 0 25px rgba(239, 68, 68, 0.25);
    transition: 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.delete-account-btn:hover {
    background: #991b1b;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 0 35px rgba(239, 68, 68, 0.7);
}

/* =========================
   تأكيد الحذف
========================= */

.confirm-delete-box {
    display: none;
    width: 100%;
    max-width: 520px;
    background: rgba(25, 3, 8, 0.98);
    border: 2px solid #ef4444;
    border-radius: 16px;
    padding: 22px;
    margin-top: 12px;
    box-shadow: 0 0 35px rgba(239, 68, 68, 0.5);
    text-align: center;
    animation: fadeInDown 0.3s ease;
}

.confirm-delete-box p {
    color: #fca5a5;
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.confirm-btns-row {
    display: flex;
    gap: 12px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.confirm-yes-btn {
    background: #ef4444;
    color: #fff;
    border: none;
    padding: 10px 22px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

.confirm-yes-btn:hover {
    background: #dc2626;
    box-shadow: 0 0 15px #ef4444;
}

.confirm-no-btn {
    background: #334155;
    color: #fff;
    border: none;
    padding: 10px 22px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

.confirm-no-btn:hover {
    background: #475569;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* =========================
   زر التسجيل
========================= */

.submit-btn {
    background:
        linear-gradient(
            135deg,
            #d4af37,
            #996515
        );
    color: #010003;
    border: none;
    padding: 15px 45px;
    border-radius: 14px;
    font-weight: 800;
    font-size: 1.25rem;
    cursor: pointer;
    box-shadow: 0 5px 25px rgba(212, 175, 55, 0.55);
    transition: 0.3s;
}

.submit-btn:hover {
    background:
        linear-gradient(
            135deg,
            #fffbe6,
            #d4af37
        );
    transform: scale(1.05);
    box-shadow: 0 8px 35px rgba(212, 175, 55, 0.8);
}

/* =========================
   بيانات الحساب الشخصية
========================= */

.profile-drawer-content {
    width: 100%;
    max-width: 1100px;
    background: rgba(3, 0, 6, 0.98);
    border: 2px solid #d4af37;
    border-radius: 20px;
    padding: 25px;
    margin-top: 15px;
    box-shadow:
        0 12px 35px rgba(0,0,0,0.85),
        0 0 25px rgba(212,175,55,0.18);
    display: none;
    text-align: right;
}

.profile-drawer-content h4 {
    color: #d4af37;
    font-size: 1.45rem;
    margin-bottom: 15px;
    border-bottom: 1px solid rgba(212,175,55,0.3);
    padding-bottom: 8px;
}

.profile-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    font-size: 1.1rem;
}

.profile-info-item span {
    color: #c084fc;
    font-weight: 700;
}

/* =========================
   الموبايل
========================= */

@media (max-width: 768px) {

    .main-grid-container {
        grid-template-columns: 1fr;
        width: 94%;
        gap: 18px;
    }

    .big-mobsar-title {
        font-size: 3.7rem;
        letter-spacing: 3px;
    }

    .hero-eye-icon {
        font-size: 4.5rem;
    }

    .mobsar-brand-wrapper {
        padding: 20px 35px;
    }

    .sub-title {
        font-size: 2.2rem;
    }

    .massive-glow-line {
        width: 75%;
    }

    .card-box {
        padding: 20px;
    }

    .profile-info-grid {
        grid-template-columns: 1fr;
    }

    .home-back-btn {
        padding: 10px 16px;
        font-size: 0.9rem;
    }
}

@media (max-width: 450px) {

    .top-nav-bar {
        width: 94%;
    }

    .big-mobsar-title {
        font-size: 2.9rem;
    }

    .hero-eye-icon {
        font-size: 3.7rem;
    }

    .mobsar-brand-wrapper {
        padding: 18px 28px;
    }

    .sub-title {
        font-size: 1.9rem;
    }

    .submit-btn {
        width: 100%;
        padding: 14px 20px;
    }

    .action-buttons-row {
        flex-direction: column;
    }

    .profile-drawer-toggle,
    .delete-account-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

</head>
<body>

    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseenter="speakQuick('العودة للصفحة الرئيسية')" onclick="goToHome(event)">
            <i class="fa-solid fa-house"></i> العودة للصفحة الرئيسية
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick('التسجيل')">التسجيل</div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onmouseenter="speakQuick('المساعد الصوتي الذكي للأوامر السريعة')" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي سريع">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseenter="speakQuick('اضغط وتكلم، مثل: وديني الصفحة الرئيسية')">اضغط وتكلم لتنفيذ الأمر فوراً</span>
        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">مبصر جاهز وسريع...</span>
    </div>

    <form action="" method="POST" class="main-grid-container" id="regForm">
        <div class="card-box" onmouseenter="speakQuick('بيانات الحساب')">
            <h3>بيانات الحساب</h3>
            
            <div class="form-group">
                <label onmouseenter="speakQuick('اسم المستخدم')">اسم المستخدم</label>
                <div class="input-wrapper">
                    <input type="text" name="username" id="username" class="form-control" required placeholder="أدخل اسم المستخدم" onfocus="speakQuick('اسم المستخدم')" onmouseenter="speakQuick('خانة اسم المستخدم')" data-label="اسم المستخدم">
                    <button type="button" class="field-mic-btn" id="mic_username" onmouseenter="speakQuick('زر إدخال صوتي لاسم المستخدم')" onclick="recordToField('username', 'اسم المستخدم')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>

            <div class="form-group">
                <label onmouseenter="speakQuick('كلمة المرور')">كلمة المرور</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" class="form-control" required placeholder="********" onfocus="speakQuick('كلمة المرور')" onmouseenter="speakQuick('خانة كلمة المرور')" data-label="كلمة المرور">
                    <button type="button" class="field-mic-btn" id="mic_password" style="right: 48px;" onmouseenter="speakQuick('زر إدخال صوتي لكلمة المرور')" onclick="recordToField('password', 'كلمة المرور')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                    <i class="fa-solid fa-eye toggle-password-icon" id="eyeToggle" onmouseenter="speakQuick('زر إظهار أو إخفاء كلمة المرور')" onclick="togglePasswordVisibility()"></i>
                </div>
            </div>

            <div class="form-group">
                <label onmouseenter="speakQuick('نوع المستخدم')">نوع المستخدم (مدير / موظف)</label>
                <div class="input-wrapper">
                    <input type="text" name="role" id="role" class="form-control" required placeholder="مدير أو موظف" onfocus="speakQuick('نوع المستخدم')" onmouseenter="speakQuick('خانة نوع المستخدم')" data-label="نوع المستخدم">
                    <button type="button" class="field-mic-btn" id="mic_role" onmouseenter="speakQuick('زر إدخال صوتي لنوع المستخدم')" onclick="recordToField('role', 'نوع المستخدم')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>

            <div class="form-group">
                <label onmouseenter="speakQuick('صفحة الروحانيات')">صفحة الروحانيات (نعم / لا)</label>
                <div class="input-wrapper">
                    <input type="text" name="enable_spiritual" id="enable_spiritual" class="form-control" required placeholder="نعم أو لا" onfocus="speakQuick('صفحة الروحانيات')" onmouseenter="speakQuick('خانة صفحة الروحانيات')" data-label="صفحة الروحانيات">
                    <button type="button" class="field-mic-btn" id="mic_enable_spiritual" onmouseenter="speakQuick('زر إدخال صوتي لصفحة الروحانيات')" onclick="recordToField('enable_spiritual', 'صفحة الروحانيات')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakQuick('البيانات الشخصية')">
            <h3>البيانات الشخصية</h3>
            
            <div class="form-group">
                <label onmouseenter="speakQuick('الاسم الكامل')">الاسم الكامل</label>
                <div class="input-wrapper">
                    <input type="text" name="full_name" id="full_name" class="form-control" required placeholder="أدخل اسمك" onfocus="speakQuick('الاسم الكامل')" onmouseenter="speakQuick('خانة الاسم الكامل')" data-label="الاسم الكامل">
                    <button type="button" class="field-mic-btn" id="mic_full_name" onmouseenter="speakQuick('زر إدخال صوتي للاسم الكامل')" onclick="recordToField('full_name', 'الاسم الكامل')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>

            <div class="form-group">
                <label onmouseenter="speakQuick('العمر')">العمر</label>
                <div class="input-wrapper">
                    <input type="number" name="age" id="age" class="form-control" required placeholder="أدخل عمرك" onfocus="speakQuick('العمر')" onmouseenter="speakQuick('خانة العمر')" data-label="العمر">
                    <button type="button" class="field-mic-btn" id="mic_age" onmouseenter="speakQuick('زر إدخال صوتي للعمر')" onclick="recordToField('age', 'العمر')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>

            <div class="form-group">
                <label onmouseenter="speakQuick('رقم الهاتف')">رقم الهاتف</label>
                <div class="input-wrapper">
                    <input type="tel" name="phone" id="phone" class="form-control" required placeholder="أدخل رقم الهاتف" onfocus="speakQuick('رقم الهاتف')" onmouseenter="speakQuick('خانة رقم الهاتف')" data-label="رقم الهاتف">
                    <button type="button" class="field-mic-btn" id="mic_phone" onmouseenter="speakQuick('زر إدخال صوتي لرقم الهاتف')" onclick="recordToField('phone', 'رقم الهاتف')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                </div>
            </div>
        </div>

        <div class="submit-container">
            <div class="action-buttons-row">
                <button type="button" class="profile-drawer-toggle" onmouseenter="speakQuick('عرض بيانات الحساب الشخصية')" onclick="toggleProfileDrawer()">
                    <i class="fa-solid fa-id-card"></i> عرض بيانات الحساب الشخصية
                </button>

                <button type="button" class="delete-account-btn" onmouseenter="speakQuick('حذف الحساب')" onclick="showDeleteConfirmBox()">
                    <i class="fa-solid fa-trash-can"></i> حذف الحساب
                </button>
            </div>

            <div id="confirmDeleteBox" class="confirm-delete-box">
                <p>هل أنت متأكد من رغبتك في حذف الحساب؟</p>
                <div class="confirm-btns-row">
                    <button type="button" class="confirm-yes-btn" onclick="executeDeleteAccount()">نعم، احذف</button>
                    <button type="button" class="confirm-no-btn" onclick="hideDeleteConfirmBox()">تراجع</button>
                    <button type="button" class="confirm-mic-btn" id="confirmMicBtn" onmouseenter="speakQuick('مايك تأكيد الحذف الصوتي، قل: آه احذف الحساب، أو لا ما تحذفش')" onclick="listenDeleteVoiceConfirmation()" title="تحدث لتأكيد أو إلغاء الحذف">
                        <i class="fa-solid fa-microphone"></i>
                    </button>
                </div>
            </div>

            <div id="profileDrawer" class="profile-drawer-content">
                <h4>إليك مراجعة البيانات المدخلة</h4>
                <div class="profile-info-grid">
                    <div class="profile-info-item"><span>الاسم:</span> <span id="p_full_name">فارغ</span></div>
                    <div class="profile-info-item"><span>اسم المستخدم:</span> <span id="p_username">فارغ</span></div>
                    <div class="profile-info-item"><span>العمر:</span> <span id="p_age">فارغ</span></div>
                    <div class="profile-info-item"><span>رقم الهاتف:</span> <span id="p_phone">فارغ</span></div>
                    <div class="profile-info-item"><span>نوع المستخدم:</span> <span id="p_role">فارغ</span></div>
                    <div class="profile-info-item"><span>صفحة الروحانيات:</span> <span id="p_enable_spiritual">فارغ</span></div>
                </div>
            </div>

            <button type="submit" name="submit_btn" class="submit-btn" onmouseenter="speakQuick('زر تسجيل الحساب')" style="margin-top: 15px;">تسجيل الحساب</button>
        </div>
    </form>
    
<script src="js/register.voice.js"></script>

</body>
</html>