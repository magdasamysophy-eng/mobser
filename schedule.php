<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "mubasser_db";

$conn = new mysqli($host, $username_db, $password_db, $dbname);
if (!$conn->connect_error) {
    $conn->set_charset("utf8");

    // معالجة حفظ المنبه عند الإرسال
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['alarm_title'])) {
        $a_title = trim($_POST['alarm_title']);
        $a_time = trim($_POST['alarm_time']);
        if (!empty($a_title) && !empty($a_time)) {
            $stmt = $conn->prepare("INSERT INTO alarms (alarm_title, alarm_time) VALUES (?, ?)");
            $stmt->bind_param("ss", $a_title, $a_time);
            $stmt->execute();
            $stmt->close();
            header("Location: schedule.php");
            exit();
        }
    }

    // حذف منبه
    if (isset($_GET['delete_alarm'])) {
        $del_id = intval($_GET['delete_alarm']);
        $conn->query("DELETE FROM alarms WHERE id = $del_id");
        header("Location: schedule.php");
        exit();
    }

    // جلب المنبهات النشطة من قاعدة البيانات
    $alarms_list = [];
    $res_alarms = $conn->query("SELECT * FROM alarms ORDER BY alarm_time ASC");
    if ($res_alarms) { while ($r = $res_alarms->fetch_assoc()) { $alarms_list[] = $r; } }

    // جلب أحدث الأخبار الحصرية الحقيقية
    $news_list = [];
    $res_news = $conn->query("SELECT * FROM breaking_news ORDER BY id DESC LIMIT 1");
    if ($res_news) { while ($rn = $res_news->fetch_assoc()) { $news_list[] = $rn; } }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - التقويم والمواعيد والأخبار الذكية</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cinzel:ital,wght@1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
            overflow-x: hidden;
        }
        .top-nav-bar { width: 90%; max-width: 1100px; display: flex; justify-content: space-between; padding: 25px 0 0 0; align-items: center; }
        .home-back-btn, .tasks-nav-btn {
            background: linear-gradient(135deg, #090314, #020104); border: 1px solid #d4af37; color: #d4af37;
            padding: 12px 22px; border-radius: 14px; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.25);
        }
        .home-back-btn:hover, .tasks-nav-btn:hover { background: #d4af37; color: #000000; box-shadow: 0 0 35px rgba(212, 175, 55, 0.8); transform: translateY(-2px); }
        
        .hero-header { text-align: center; padding: 10px 20px 5px 20px; width: 100%; display: flex; flex-direction: column; align-items: center; }
        .mobsar-brand-wrapper { 
            display: inline-flex; flex-direction: column; align-items: center; position: relative; padding: 25px 50px; 
            border-radius: 50%;
            background: radial-gradient(circle, rgba(40, 15, 70, 0.95) 0%, rgba(5, 2, 10, 0.98) 80%);
            box-shadow: 0 0 60px rgba(138, 43, 226, 0.5), inset 0 0 30px rgba(212, 175, 55, 0.4);
            border: 1px solid rgba(212, 175, 55, 0.6);
            animation: magicGlow 3s infinite alternate;
        }
        @keyframes magicGlow {
            0% { box-shadow: 0 0 35px rgba(138, 43, 226, 0.4), inset 0 0 20px rgba(212, 175, 55, 0.25); border-color: rgba(212, 175, 55, 0.4); }
            100% { box-shadow: 0 0 70px rgba(212, 175, 55, 0.8), inset 0 0 40px rgba(138, 43, 226, 0.7); border-color: rgba(212, 175, 55, 1); }
        }
        .hero-eye-icon { font-size: 5.8rem; color: #d4af37; filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.9)); margin-bottom: -2px; animation: eyeFloat 2.5s infinite alternate; }
        @keyframes eyeFloat { from { transform: translateY(0) scale(1); } to { transform: translateY(-6px) scale(1.05); } }
        
        .big-mobsar-title { 
            font-family: 'Cinzel', serif; font-style: italic; font-weight: 800; font-size: 5.5rem; 
            background: linear-gradient(135deg, #ffffff, #d4af37, #b19cd9, #ffffff); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 6px; 
            transform: skewX(-8deg); filter: drop-shadow(0 0 25px rgba(138, 43, 226, 0.8));
        }
        .massive-glow-line {
            width: 400px; height: 3px;
            background: linear-gradient(90deg, transparent, #d4af37, #8a2be2, transparent);
            box-shadow: 0 0 30px #8a2be2, 0 0 20px #d4af37;
            margin: 20px auto 12px auto; border-radius: 50%;
        }
        .sub-title { font-size: 2.3rem; color: #d4af37; margin-top: 5px; font-weight: 700; text-shadow: 0 0 25px rgba(212, 175, 55, 0.7); }

        .global-command-mic-container { margin: 15px 0 10px 0; display: flex; flex-direction: column; align-items: center; gap: 12px; }
        .big-command-mic-btn {
            width: 80px; height: 80px; background: radial-gradient(circle, #2a0b4d 0%, #05010a 100%);
            border: 2px solid #d4af37; border-radius: 50%; color: #d4af37; font-size: 2rem; cursor: pointer;
            box-shadow: 0 0 40px rgba(138, 43, 226, 0.7), inset 0 0 20px rgba(212, 175, 55, 0.5);
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .big-command-mic-btn:hover { transform: scale(1.1); background: #3b106e; color: #fff; box-shadow: 0 0 50px rgba(212, 175, 55, 0.9); }
        .command-mic-label { font-size: 1.05rem; color: #d8b4fe; font-weight: 600; text-shadow: 0 0 15px rgba(138, 43, 226, 0.7); }

        .live-clock-banner {
            background: linear-gradient(135deg, rgba(35, 12, 65, 0.95), rgba(10, 3, 20, 0.98));
            border: 2px solid #d4af37; border-radius: 20px; padding: 12px 30px; margin: 15px 0;
            font-size: 1.8rem; font-weight: 800; color: #fde047; box-shadow: 0 0 35px rgba(212, 175, 55, 0.4);
            display: inline-flex; align-items: center; gap: 15px; text-shadow: 0 0 15px rgba(253, 224, 71, 0.6);
            cursor: pointer; transition: 0.3s;
        }
        .live-clock-banner:hover { transform: scale(1.03); background: rgba(50, 18, 90, 0.95); }

        .schedule-main-container { width: 90%; max-width: 1100px; margin-top: 10px; display: flex; flex-direction: column; gap: 25px; }
        .schedule-grid-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; }
        @media(max-width: 900px) { .schedule-grid-layout { grid-template-columns: 1fr; } }

        .schedule-box {
            background: linear-gradient(135deg, rgba(25, 10, 45, 0.95), rgba(5, 2, 10, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.5); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 35px rgba(138, 43, 226, 0.3);
        }
        .schedule-box h3 { font-size: 1.4rem; color: #d4af37; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(212, 175, 55, 0.3); padding-bottom: 10px; text-shadow: 0 0 10px rgba(212,175,55,0.4); }

        .calendar-header-title { text-align: center; font-size: 1.3rem; color: #fde047; margin-bottom: 15px; font-weight: 700; }
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; text-align: center; }
        .cal-day-name { font-size: 0.85rem; color: #d8b4fe; font-weight: 700; padding: 8px 0; background: rgba(138, 43, 226, 0.2); border-radius: 8px; }
        .cal-date-cell { padding: 10px 0; background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 8px; font-size: 0.9rem; color: #fff; transition: 0.3s; cursor: pointer; }
        .cal-date-cell:hover { border-color: #d4af37; background: rgba(212, 175, 55, 0.2); }
        .cal-date-cell.today { background: #d4af37; color: #000; font-weight: 800; box-shadow: 0 0 15px #d4af37; }

        .form-group { margin-bottom: 15px; }
        .form-group label { display: flex; justify-content: space-between; align-items: center; color: #d8b4fe; margin-bottom: 6px; font-weight: 600; font-size: 0.95rem; }
        .input-group-with-mic { display: flex; gap: 8px; align-items: center; }
        .form-control {
            width: 100%; padding: 11px; border-radius: 12px; background: #000; border: 1px solid rgba(212, 175, 55, 0.5);
            color: #fff; font-size: 0.95rem; outline: none; transition: 0.3s;
        }
        .form-control:focus { border-color: #d4af37; box-shadow: 0 0 20px rgba(212, 175, 55, 0.5); }

        .input-mic-btn {
            background: linear-gradient(135deg, #2a0b4d, #05010a); border: 1px solid #d4af37; color: #d4af37;
            padding: 10px 14px; border-radius: 12px; cursor: pointer; transition: 0.3s; font-size: 1.1rem;
        }
        .input-mic-btn:hover { background: #d4af37; color: #000; box-shadow: 0 0 15px #d4af37; }

        .submit-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000; border: none;
            padding: 12px 25px; border-radius: 12px; font-weight: 700; font-size: 1.05rem; cursor: pointer;
            width: 100%; transition: 0.3s; box-shadow: 0 5px 25px rgba(212, 175, 55, 0.4); display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none;
        }
        .submit-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); box-shadow: 0 0 35px rgba(212, 175, 55, 0.8); transform: translateY(-2px); }

        .alarms-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .alarms-table th, .alarms-table td { padding: 10px; text-align: right; border-bottom: 1px solid rgba(212, 175, 55, 0.2); font-size: 0.9rem; color: #fff; }
        .alarms-table th { color: #d4af37; }

        .breaking-news-ticker {
            background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; border-radius: 15px; padding: 15px 20px;
            margin-top: 25px; width: 90%; max-width: 1100px; display: flex; align-items: center; gap: 15px;
            box-shadow: 0 0 25px rgba(239, 68, 68, 0.3);
        }
        .breaking-badge { background: #ef4444; color: #fff; padding: 5px 12px; border-radius: 10px; font-weight: 800; font-size: 0.85rem; animation: pulseNews 1s infinite; }
        @keyframes pulseNews { 0% { opacity: 0.8; } 50% { opacity: 1; transform: scale(1.05); } 100% { opacity: 0.8; } }
        .news-text { font-size: 1.05rem; color: #fca5a5; font-weight: 600; }

        .global-voice-widget {
            position: fixed; bottom: 25px; left: 25px; background: rgba(15, 5, 30, 0.95);
            border: 2px solid #d4af37; padding: 14px 22px; border-radius: 35px; color: #d4af37; font-weight: 700;
            box-shadow: 0 0 40px rgba(138, 43, 226, 0.7); display: flex; align-items: center; gap: 12px; z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .global-voice-widget i { font-size: 1.4rem; color: #ef4444; animation: pulseMic 0.9s infinite; }
        @keyframes pulseMic { 0% { transform: scale(1); opacity: 0.7; } 50% { transform: scale(1.4); opacity: 1; } 100% { transform: scale(1); opacity: 0.7; } }
    </style>
</head>
<body>
    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseover="speakQuick('زر الصفحة الرئيسية')" onclick="goToPage(event, 'index.php', 'جارٍ الآن الانتقال للصفحة الرئيسية فوراً')">
            <i class="fa-solid fa-house"></i> الصفحة الرئيسية
        </a>
        <a href="tasks.php" class="tasks-nav-btn" onmouseover="speakQuick('زر صفحة المهام')" onclick="goToPage(event, 'tasks.php', 'جارٍ الآن الانتقال لصفحة المهام')">
            <i class="fa-solid fa-list-check"></i> صفحة المهام <i class="fa-solid fa-bolt" style="color: #d4af37;"></i>
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseover="speakQuick('منصة مبصر، التقويم والمواعيد والأخبار الذكية')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseover="speakQuick('صفحة التقويم والمواعيد والأخبار')">التقويم والمواعيد والأخبار</div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseover="speakQuick('اضغط على المايك وقل، اذهب للصفحة الرئيسية أو اضبط منبه')">اضغط وقل: (اذهب للصفحة الرئيسية) أو (اضبط منبه)</span>
        </div>

        <div class="live-clock-banner" id="liveClockDisplay" onclick="speakCurrentTime()" onmouseover="speakQuick('الساعة الآن الحية، اضغط لقراءتها')">
            <i class="fa-solid fa-clock" style="color: #d4af37;"></i> <span id="clockText">02:15:50 ص</span>
        </div>
    </div>

    <div class="breaking-news-ticker" onmouseover="speakNewsItem()">
        <span class="breaking-badge"><i class="fa-solid fa-bolt"></i> عاجل وحصري</span>
        <div class="news-text" id="breakingNewsContent">
            <?php if (!empty($news_list)): ?>
                <?php echo htmlspecialchars($news_list[0]['news_content']); ?>
            <?php else: ?>
                عاجل وحصري: حالة الطقس اليوم مستقرة مع درجات حرارة معتدلة في كافة أنحاء الجمهورية.
            <?php endif; ?>
        </div>
    </div>

    <div class="schedule-main-container">
        <div class="schedule-grid-layout">
            
            <div class="schedule-box">
                <h3 onmouseover="speakQuick('تقويم الشهر الحالي')">
                    <span><i class="fa-solid fa-calendar-days"></i> تقويم الشهر الحالي</span>
                    <button type="button" class="input-mic-btn" onclick="speakCurrentDate()" title="ما هو اليوم وتاريخ اليوم؟"><i class="fa-solid fa-microphone"></i></button>
                </h3>
                <div class="calendar-header-title" id="monthYearTitle" onmouseover="speakQuick('سبتمبر 2026')">سبتمبر 2026</div>
                <div class="calendar-grid">
                    <div class="cal-day-name">سبت</div>
                    <div class="cal-day-name">أحد</div>
                    <div class="cal-day-name">إثنين</div>
                    <div class="cal-day-name">ثلاثاء</div>
                    <div class="cal-day-name">أربعاء</div>
                    <div class="cal-day-name">خميس</div>
                    <div class="cal-day-name">جمعة</div>
                    <?php 
                        $today_date = 8; 
                        for($i=1; $i<=30; $i++):
                            $is_today = ($i == $today_date) ? 'today' : '';
                    ?>
                        <div class="cal-date-cell <?php echo $is_today; ?>" onmouseover="speakQuick('يوم <?php echo $i; ?>')"><?php echo $i; ?></div>
                    <?php endfor; ?>
                </div>

                <div style="margin-top: 20px;">
                    <a href="index.php" class="submit-btn" onmouseover="speakQuick('زر الانتقال إلى الصفحة الرئيسية')" onclick="goToPage(event, 'index.php', 'جارٍ الآن الانتقال إلى الصفحة الرئيسية')">
                        <i class="fa-solid fa-house"></i> الانتقال إلى الصفحة الرئيسية
                    </a>
                </div>
            </div>

            <div class="schedule-box">
                <h3 onmouseover="speakQuick('إدارة المنبهات والمواعيد الصوتية')">
                    <span><i class="fa-solid fa-bell"></i> إدارة المنبهات والمواعيد</span>
                </h3>
                <form action="schedule.php" method="POST" id="alarmForm">
                    <div class="form-group">
                        <label onmouseover="speakQuick('عنوان المنبه أو سبب التنبيه')"><span>عنوان المنبه أو الموعد:</span></label>
                        <div class="input-group-with-mic">
                            <input type="text" id="alarmTitleInput" name="alarm_title" class="form-control" placeholder="أدخل سبب التنبيه (مثال: موعد الاجتماع)..." required onfocus="speakQuick('أدخل سبب التنبيه هنا')">
                            <button type="button" class="input-mic-btn" onclick="startFieldVoiceInput('alarmTitleInput', 'عنوان المنبه')" title="انطق عنوان المنبه"><i class="fa-solid fa-microphone"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label onmouseover="speakQuick('وقت المنبه')"><span>وقت المنبه:</span></label>
                        <div class="input-group-with-mic">
                            <input type="time" id="alarmTimeInput" name="alarm_time" class="form-control" required onfocus="speakQuick('حدد وقت المنبه')">
                            <button type="button" class="input-mic-btn" onclick="startFieldVoiceInput('alarmTimeInput', 'وقت المنبه')" title="انطق وقت المنبه"><i class="fa-solid fa-microphone"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn" onmouseover="speakQuick('زر حفظ وتفعيل المنبه تلقائياً')" onclick="confirmAlarmSave(event)">
                        <i class="fa-solid fa-clock-rotate-left"></i> حفظ المنبه وتفعيله تلقائياً
                    </button>
                </form>

                <div style="margin-top: 20px; max-height: 160px; overflow-y: auto;">
                    <table class="alarms-table">
                        <thead>
                            <tr>
                                <th>سبب التنبيه</th>
                                <th>الوقت</th>
                                <th>الحالة</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alarms_list)): ?>
                                <?php foreach($alarms_list as $alm): ?>
                                    <tr onmouseover="speakQuick('منبه: <?php echo htmlspecialchars($alm['alarm_title']); ?> في تمام الساعة <?php echo $alm['alarm_time']; ?>')">
                                        <td><strong><?php echo htmlspecialchars($alm['alarm_title']); ?></strong></td>
                                        <td><span style="color: #fde047; font-weight: 700;"><?php echo $alm['alarm_time']; ?></span></td>
                                        <td><span style="color: #86efac; font-size: 0.8rem;"><i class="fa-solid fa-circle-check"></i> نشط وحقيقي</span></td>
                                        <td>
                                            <a href="schedule.php?delete_alarm=<?php echo $alm['id']; ?>" onmouseover="speakQuick('حذف المنبه')" style="color: #ef4444;" title="حذف المنبه"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; color: #a78bfa; padding: 15px;" onmouseover="speakQuick('لا توجد منبهات مفعلة حالياً')">لا توجد منبهات مفعلة حالياً. أضيفي منبهك الأول!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div id="alarmPopupModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); z-index:9999; justify-content:center; align-items:center;">
        <div style="background:linear-gradient(135deg, #2a0b4d, #05010a); border:2px solid #ef4444; border-radius:20px; padding:30px; text-align:center; max-width:450px; width:90%; box-shadow:0 0 50px rgba(239,68,68,0.8);">
            <i class="fa-solid fa-bell-slash" style="font-size:4rem; color:#ef4444; margin-bottom:15px; animation: pulseMic 0.8s infinite;"></i>
            <h2 style="color:#fde047; margin-bottom:10px;">تنبيه موعد هام!</h2>
            <p id="alarmPopupText" style="color:#fff; font-size:1.2rem; margin-bottom:20px; font-weight:700;"></p>
            <button onclick="dismissAlarm()" style="background:#ef4444; color:#fff; border:none; padding:12px 30px; border-radius:12px; font-size:1.1rem; font-weight:800; cursor:pointer; box-shadow:0 0 20px #ef4444;">إيقاف وإغلاق المنبه</button>
        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">نظام الساعة الحقيقية والمنبه التلقائي يعمل في الخلفية بكفاءة...</span>
    </div>

<script>

let lastSpokenText = "";
let alarmRingingActive = false;
let alarmSoundInterval = null;

let voiceStarted = false;
let isSpeaking = false;
let recognitionRunning = false;

let currentVoiceMode = "";

let alarmData = {
    title: "",
    time: ""
};


// ==========================================
// التعرف على الصوت
// ==========================================

const SpeechRecognition =
    window.SpeechRecognition ||
    window.webkitSpeechRecognition;

let recognition = null;


if (SpeechRecognition) {

    recognition = new SpeechRecognition();

    recognition.lang = "ar-EG";
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.maxAlternatives = 5;


    recognition.onstart = function () {

        recognitionRunning = true;

        updateVoiceStatus(
            "جاري الاستماع..."
        );

    };


    recognition.onresult = function (event) {

        recognitionRunning = false;

        let transcript = "";

        for (
            let i = 0;
            i < event.results.length;
            i++
        ) {

            transcript +=
                event.results[i][0].transcript + " ";

        }


        transcript = transcript.trim();


        if (transcript !== "") {

            console.log(
                "Voice:",
                transcript
            );

            updateVoiceStatus(
                "تم سماع: " + transcript
            );

            processVoiceCommand(
                transcript
            );

        }

    };


    recognition.onerror = function (event) {

        recognitionRunning = false;

        console.log(
            "Voice error:",
            event.error
        );

        updateVoiceStatus(
            "لم أستطع سماع الأمر."
        );

    };


    recognition.onend = function () {

        recognitionRunning = false;

        if (
            voiceStarted &&
            !isSpeaking &&
            !alarmRingingActive
        ) {

            setTimeout(
                function () {

                    startListening();

                },
                500
            );

        }

    };

}


// ==========================================
// تنظيف الكلام
// ==========================================

function normalizeCommand(text) {

    return text
        .toLowerCase()
        .trim()
        .replace(/[؟?!.,،]/g, "")
        .replace(/أ/g, "ا")
        .replace(/إ/g, "ا")
        .replace(/آ/g, "ا")
        .replace(/ة/g, "ه");

}


// ==========================================
// تحديث حالة الصوت
// ==========================================

function updateVoiceStatus(text) {

    const statusEl =
        document.getElementById(
            "voiceStatusText"
        );

    if (statusEl) {

        statusEl.innerText = text;

    }

}


// ==========================================
// الكلام
// ==========================================

function speakQuick(
    text,
    callback = null
) {

    if (!("speechSynthesis" in window)) {

        if (callback) callback();

        return;

    }


    if (
        text === lastSpokenText &&
        !alarmRingingActive
    ) {

        if (callback) callback();

        return;

    }


    isSpeaking = true;

    stopListening();

    window.speechSynthesis.cancel();


    const utterance =
        new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-EG";
    utterance.rate = 0.9;
    utterance.pitch = 1;
    utterance.volume = 1;


    updateVoiceStatus(text);


    utterance.onend = function () {

        isSpeaking = false;

        lastSpokenText = text;

        setTimeout(
            function () {

                lastSpokenText = "";

            },
            2500
        );


        if (callback) callback();

    };


    utterance.onerror = function () {

        isSpeaking = false;

        if (callback) callback();

    };


    window.speechSynthesis.speak(
        utterance
    );

}


// ==========================================
// بدء الاستماع
// ==========================================

function startListening() {

    if (!recognition) {

        speakQuick(
            "المتصفح لا يدعم التعرف على الصوت."
        );

        return;

    }


    if (isSpeaking) return;

    if (recognitionRunning) return;

    if (alarmRingingActive) return;


    try {

        recognition.start();

    }

    catch (error) {

        console.log(
            "Recognition start:",
            error
        );

    }

}


// ==========================================
// إيقاف الاستماع أثناء الكلام
// ==========================================

function stopListening() {

    if (!recognition) return;

    if (!recognitionRunning) return;


    try {

        recognition.stop();

    }

    catch (error) {

        console.log(
            "Recognition stop:",
            error
        );

    }

}


// ==========================================
// أول لمسة في الصفحة
// ==========================================

function startVoiceAssistant() {

    if (voiceStarted) return;

    voiceStarted = true;


    speakQuick(
        "مرحباً بك في صفحة المواعيد والأخبار في نظام مبصر. " +
        "أنا جاهز لمساعدتك. " +
        "يمكنك أن تقولي الساعة كام، النهارده كام، اقرأ التقويم، " +
        "اقرأ الأخبار، اقرأ المنبهات المحفوظة، أو إضافة منبه جديد. " +
        "ويمكنك أيضاً أن تقولي وديني لأي صفحة.",
        function () {

            startListening();

        }
    );

}


let firstPageClick = true;


document.addEventListener(
    "click",
    function () {

        if (!firstPageClick) return;

        firstPageClick = false;

        startVoiceAssistant();

    }
);
// ==========================================
// الساعة الحالية بالثواني
// ==========================================

function speakCurrentTime() {

    const now = new Date();

    let hours = now.getHours();

    const minutes = now.getMinutes();

    const seconds = now.getSeconds();


    const period =
        hours >= 12
            ? "مساءً"
            : "صباحاً";


    hours = hours % 12;

    hours = hours
        ? hours
        : 12;


    const minuteText =
        minutes === 0
            ? "بالضبط"
            : minutes + " دقيقة";


    const secondText =
        seconds === 0
            ? ""
            : " و " + seconds + " ثانية";


    const text =
        "الساعة الآن " +
        hours +
        " و " +
        minuteText +
        secondText +
        " " +
        period;


    speakQuick(
        text,
        function () {

            startListening();

        }
    );

}


// ==========================================
// التاريخ الحقيقي الحالي
// ==========================================

function speakCurrentDate() {

    const now = new Date();


    const days = [
        "الأحد",
        "الإثنين",
        "الثلاثاء",
        "الأربعاء",
        "الخميس",
        "الجمعة",
        "السبت"
    ];


    const months = [
        "يناير",
        "فبراير",
        "مارس",
        "أبريل",
        "مايو",
        "يونيو",
        "يوليو",
        "أغسطس",
        "سبتمبر",
        "أكتوبر",
        "نوفمبر",
        "ديسمبر"
    ];


    const dayName =
        days[now.getDay()];


    const dayNumber =
        now.getDate();


    const monthName =
        months[now.getMonth()];


    const year =
        now.getFullYear();


    const text =
        "النهارده " +
        dayName +
        "، الموافق " +
        dayNumber +
        " من شهر " +
        monthName +
        " سنة " +
        year;


    speakQuick(
        text,
        function () {

            startListening();

        }
    );

}


// ==========================================
// إنشاء نص التقويم الشهري الحالي
// ==========================================

function buildMonthlyCalendarText() {

    const now = new Date();

    const year =
        now.getFullYear();

    const month =
        now.getMonth();


    const monthNames = [
        "يناير",
        "فبراير",
        "مارس",
        "أبريل",
        "مايو",
        "يونيو",
        "يوليو",
        "أغسطس",
        "سبتمبر",
        "أكتوبر",
        "نوفمبر",
        "ديسمبر"
    ];


    const dayNames = [
        "الأحد",
        "الإثنين",
        "الثلاثاء",
        "الأربعاء",
        "الخميس",
        "الجمعة",
        "السبت"
    ];


    const daysInMonth =
        new Date(
            year,
            month + 1,
            0
        ).getDate();


    let result =
        "التقويم الشهري لشهر " +
        monthNames[month] +
        " سنة " +
        year +
        ". ";


    for (
        let day = 1;
        day <= daysInMonth;
        day++
    ) {

        const date =
            new Date(
                year,
                month,
                day
            );


        result +=
            "يوم " +
            day +
            "، " +
            dayNames[date.getDay()] +
            ". ";

    }


    return result;

}


// ==========================================
// قراءة التقويم الشهري
// ==========================================

function speakMonthlyCalendar() {

    const calendarText =
        buildMonthlyCalendarText();


    speakQuick(
        calendarText,
        function () {

            startListening();

        }
    );

}

// ==========================================
// جلب المنبهات الموجودة من قاعدة البيانات
// ==========================================

const savedAlarms = <?php
echo json_encode(
    $alarms_list ?? [],
    JSON_UNESCAPED_UNICODE |
    JSON_UNESCAPED_SLASHES
);
?>;


// ==========================================
// قراءة المنبهات المحفوظة
// ==========================================

function speakSavedAlarms() {

    if (
        !Array.isArray(savedAlarms) ||
        savedAlarms.length === 0
    ) {

        speakQuick(
            "لا يوجد عندك أي منبهات محفوظة حالياً.",
            function () {

                startListening();

            }
        );

        return;

    }


    let text =
        "عندك " +
        savedAlarms.length +
        " منبه محفوظ. ";


    savedAlarms.forEach(
        function (alarm, index) {

            const title =
                alarm.alarm_title ||
                "منبه بدون عنوان";


            const time =
                alarm.alarm_time ||
                "وقت غير محدد";


            text +=
                "المنبه رقم " +
                (index + 1) +
                ": " +
                title +
                "، في الساعة " +
                time +
                ". ";

        }
    );


    speakQuick(
        text,
        function () {

            startListening();

        }
    );

}


// ==========================================
// قراءة المنبهات المفعلة
// ==========================================

function speakActiveAlarms() {

    if (
        !Array.isArray(savedAlarms) ||
        savedAlarms.length === 0
    ) {

        speakQuick(
            "لا يوجد عندك منبهات محفوظة حالياً.",
            function () {

                startListening();

            }
        );

        return;

    }


    /*
     * لو قاعدة البيانات عندك فيها عمود حالة
     * هنحاول نقرأ المنبهات المفعلة فقط.
     * ولو مفيش عمود حالة، هنعتبر المنبهات
     * الموجودة في القائمة الحالية هي المنبهات المضبوطة.
     */

    const active =
        savedAlarms.filter(
            function (alarm) {

                if (
                    alarm.status !== undefined
                ) {

                    return (
                        String(
                            alarm.status
                        ).toLowerCase() !==
                        "inactive"
                    );

                }


                if (
                    alarm.active !== undefined
                ) {

                    return (
                        alarm.active == 1 ||
                        alarm.active === true ||
                        alarm.active === "1"
                    );

                }


                return true;

            }
        );


    if (active.length === 0) {

        speakQuick(
            "لا يوجد عندك منبهات مفعلة حالياً.",
            function () {

                startListening();

            }
        );

        return;

    }


    let text =
        "المنبهات المفعلة عندك: ";


    active.forEach(
        function (alarm, index) {

            text +=
                "المنبه " +
                (index + 1) +
                ": " +
                (alarm.alarm_title || "بدون عنوان") +
                "، الساعة " +
                (alarm.alarm_time || "غير محددة") +
                ". ";

        }
    );


    speakQuick(
        text,
        function () {

            startListening();

        }
    );

}


// ==========================================
// بدء إضافة منبه
// ==========================================

function startNewAlarm() {

    const titleInput =
        document.getElementById(
            "alarmTitleInput"
        );


    const timeInput =
        document.getElementById(
            "alarmTimeInput"
        );


    if (
        !titleInput ||
        !timeInput
    ) {

        speakQuick(
            "لم أجد حقول إضافة المنبه في الصفحة."
        );

        return;

    }


    alarmData.title = "";

    alarmData.time = "";

    currentVoiceMode =
        "alarm_title";


    speakQuick(
        "تمام، هنضيف منبه جديد. " +
        "قولي عنوان المنبه.",
        function () {

            startListening();

        }
    );

}


// ==========================================
// تحويل الساعة المنطوقة إلى رقم
// ==========================================

function numberFromArabicWord(text) {

    const numbers = {

        "واحد": 1,
        "اتنين": 2,
        "اثنين": 2,
        "تلاته": 3,
        "ثلاثه": 3,
        "اربعه": 4,
        "خمسه": 5,
        "سته": 6,
        "سبعه": 7,
        "تمانيه": 8,
        "ثمانيه": 8,
        "تسعه": 9,
        "عشره": 10,
        "حداشر": 11,
        "احداشر": 11,
        "اتناشر": 12,
        "اثناشر": 12

    };


    for (
        const word in numbers
    ) {

        if (
            text.includes(word)
        ) {

            return numbers[word];

        }

    }


    return null;

}


// ==========================================
// استخراج وقت المنبه
// ==========================================

function extractAlarmTime(text) {

    const clean =
        normalizeCommand(text);


    let hour = null;

    let minute = 0;


    const digital =
        clean.match(
            /\b([0-9]{1,2})(?::([0-9]{1,2}))?\b/
        );


    if (digital) {

        hour =
            parseInt(
                digital[1]
            );


        if (digital[2]) {

            minute =
                parseInt(
                    digital[2]
                );

        }

    }


    if (hour === null) {

        hour =
            numberFromArabicWord(
                clean
            );

    }


    if (
        hour === null ||
        hour < 1 ||
        hour > 12
    ) {

        return null;

    }


    const isPM =
        clean.includes("مساء") ||
        clean.includes("بالليل") ||
        clean.includes("ليل");


    const isAM =
        clean.includes("صباح") ||
        clean.includes("الصبح");


    if (
        isPM &&
        hour < 12
    ) {

        hour += 12;

    }


    if (
        isAM &&
        hour === 12
    ) {

        hour = 0;

    }


    return (
        String(hour).padStart(2, "0") +
        ":" +
        String(minute).padStart(2, "0")
    );

}


// ==========================================
// معالجة خطوات إضافة المنبه
// ==========================================

function processAlarmCommand(text) {

    if (
        currentVoiceMode ===
        "alarm_title"
    ) {

        alarmData.title =
            text;


        currentVoiceMode =
            "alarm_time";


        speakQuick(
            "تم تسجيل عنوان المنبه. " +
            "قولي وقت المنبه، مثلاً ثمانية صباحاً أو ثمانية مساءً.",
            function () {

                startListening();

            }
        );


        return true;

    }


    if (
        currentVoiceMode ===
        "alarm_time"
    ) {

        const time =
            extractAlarmTime(text);


        if (!time) {

            speakQuick(
                "لم أفهم وقت المنبه. " +
                "قولي الساعة بشكل واضح.",
                function () {

                    startListening();

                }
            );

            return true;

        }


        alarmData.time =
            time;


        currentVoiceMode = "";


        const titleInput =
            document.getElementById(
                "alarmTitleInput"
            );


        const timeInput =
            document.getElementById(
                "alarmTimeInput"
            );


        const alarmForm =
            document.getElementById(
                "alarmForm"
            );


        if (
            !titleInput ||
            !timeInput ||
            !alarmForm
        ) {

            speakQuick(
                "لم أجد نموذج حفظ المنبه."
            );

            return true;

        }


        titleInput.value =
            alarmData.title;


        timeInput.value =
            alarmData.time;


        speakQuick(
            "المنبه بعنوان " +
            alarmData.title +
            " مضبوط على الساعة " +
            alarmData.time +
            ". جاري حفظ المنبه.",
            function () {

                setTimeout(
                    function () {

                        alarmForm.submit();

                    },
                    700
                );

            }
        );


        return true;

    }


    return false;

}
// ==========================================
// قراءة الأخبار
// ==========================================

function speakNewsItem() {

    const newsElement =
        document.getElementById(
            "breakingNewsContent"
        );


    if (!newsElement) {

        speakQuick(
            "لا توجد أخبار متاحة حالياً.",
            function () {

                startListening();

            }
        );

        return;

    }


    const news =
        newsElement.innerText.trim();


    if (!news) {

        speakQuick(
            "لا توجد أخبار متاحة حالياً.",
            function () {

                startListening();

            }
        );

        return;

    }


    speakQuick(
        "الأخبار الموجودة حالياً: " +
        news,
        function () {

            startListening();

        }
    );

}


// ==========================================
// قراءة بيانات التقويم الموجودة في الصفحة
// ==========================================

function speakPageCalendar() {

    let content = "";


    const selectors = [
        ".calendar",
        ".calendar-container",
        ".calendar-card",
        ".schedule",
        ".schedule-card",
        ".appointment",
        ".appointments",
        ".events",
        ".event"
    ];


    selectors.forEach(
        function (selector) {

            document
                .querySelectorAll(selector)
                .forEach(
                    function (element) {

                        const text =
                            element.innerText.trim();


                        if (
                            text &&
                            !content.includes(text)
                        ) {

                            content +=
                                text + " ";

                        }

                    }
                );

        }
    );


    if (!content) {

        speakMonthlyCalendar();

        return;

    }


    speakQuick(
        "بيانات التقويم والمواعيد الموجودة في الصفحة: " +
        content,
        function () {

            startListening();

        }
    );

}


// ==========================================
// معرفة الصفحة الحالية
// ==========================================

function speakCurrentPage() {

    const title =
        document.title ||
        "";


    const path =
        window.location.pathname;


    let pageName =
        "صفحة المواعيد والأخبار";


    if (
        path.includes("index.php")
    ) {

        pageName =
            "الصفحة الرئيسية";

    }

    else if (
        path.includes("tasks.php")
    ) {

        pageName =
            "صفحة المهام";

    }

    else if (
        path.includes("evaluation.php")
    ) {

        pageName =
            "صفحة التقييم والإنجازات";

    }

    else if (
        path.includes("communication.php")
    ) {

        pageName =
            "صفحة التواصل";

    }

    else if (
        path.includes("settings.php")
    ) {

        pageName =
            "صفحة الإعدادات";

    }

    else if (
        path.includes("TEAN.php")
    ) {

        pageName =
            "صفحة الروحانيات";

    }

    else if (
        path.includes("employees.php")
    ) {

        pageName =
            "صفحة الموظفين والمدير";

    }

    else if (
        path.includes("notificationc.php")
    ) {

        pageName =
            "صفحة إدارة الملفات";

    }


    speakQuick(
        "أنتِ الآن في " +
        pageName +
        ".",
        function () {

            startListening();

        }
    );

}
// ==========================================
// الانتقال لصفحة
// ==========================================

function goToPage(
    url,
    message
) {

    speakQuick(
        message,
        function () {

            window.location.href =
                url;

        }
    );

}


// ==========================================
// الرئيسية
// ==========================================

function goHome() {

    goToPage(
        "index.php",
        "حاضر، هوديك للصفحة الرئيسية."
    );

}


// ==========================================
// المهام
// ==========================================

function goTasks() {

    goToPage(
        "tasks.php",
        "حاضر، هوديك لصفحة المهام."
    );

}


// ==========================================
// التقييم والإنجازات
// ==========================================

function goEvaluation() {

    goToPage(
        "evaluation.php",
        "حاضر، هوديك لصفحة التقييم والإنجازات."
    );

}


// ==========================================
// التواصل
// ==========================================

function goCommunication() {

    goToPage(
        "communication.php",
        "حاضر، هوديك لصفحة التواصل."
    );

}


// ==========================================
// إدارة الملفات
// ==========================================

function goFiles() {

    goToPage(
        "notificationc.php",
        "حاضر، هوديك لإدارة الملفات."
    );

}


// ==========================================
// الإعدادات
// ==========================================

function goSettings() {

    goToPage(
        "settings.php",
        "حاضر، هوديك لصفحة الإعدادات."
    );

}


// ==========================================
// الروحانيات
// ==========================================

function goSpirituality() {

    goToPage(
        "TEAN.php",
        "حاضر، هوديك لصفحة الروحانيات."
    );

}


// ==========================================
// الموظفين والمدير
// ==========================================

function goEmployees() {

    goToPage(
        "employees.php",
        "حاضر، هوديك لصفحة الموظفين والمدير."
    );

}


// ==========================================
// المساعد البصري
// ==========================================

function goVisualAssistant() {

    const links =
        document.querySelectorAll("a");


    for (
        let i = 0;
        i < links.length;
        i++
    ) {

        const linkText =
            normalizeCommand(
                links[i].innerText || ""
            );


        if (
            linkText.includes(
                "المساعد البصري"
            ) ||
            linkText.includes(
                "مساعد بصري"
            )
        ) {

            goToPage(
                links[i].href,
                "حاضر، هوديك للمساعد البصري."
            );

            return;

        }

    }


    speakQuick(
        "لم أجد رابط المساعد البصري في الصفحة."
    );

}


// ==========================================
// تسجيل
// ==========================================

function goRegister() {

    goToPage(
        "register.php",
        "حاضر، هوديك لصفحة التسجيل."
    );

}


// ==========================================
// المواعيد
// ==========================================

function goSchedule() {

    speakQuick(
        "أنتِ بالفعل في صفحة المواعيد والأخبار.",
        function () {

            startListening();

        }
    );

}
// ==========================================
// تنفيذ الأمر الصوتي
// ==========================================

function processVoiceCommand(command) {

    const text =
        normalizeCommand(command);


    console.log(
        "Command:",
        text
    );


    // ----------------------------------------
    // لو بنضيف منبه
    // ----------------------------------------

    if (
        currentVoiceMode !== ""
    ) {

        if (
            processAlarmCommand(text)
        ) {

            return;

        }

    }


    // ----------------------------------------
    // الرئيسية
    // ----------------------------------------

    if (
        text.includes("الصفحه الرئيسيه") ||
        text.includes("صفحه الرئيسيه") ||
        text.includes("الرئيسيه") ||
        text.includes("الرئيسية") ||
        text.includes("وديني للصفحه الرئيسيه") ||
        text.includes("وديني للصفحة الرئيسية") ||
        text.includes("روح للصفحه الرئيسيه")
    ) {

        goHome();

        return;

    }


    // ----------------------------------------
    // المهام
    // ----------------------------------------

    if (
        text.includes("صفحه المهام") ||
        text.includes("صفحة المهام") ||
        text.includes("المهام") ||
        text.includes("وديني للمهام")
    ) {

        goTasks();

        return;

    }


    // ----------------------------------------
    // التقييم والإنجازات
    // ----------------------------------------

    if (
        text.includes("صفحه التقييم") ||
        text.includes("التقييم") ||
        text.includes("الانجازات") ||
        text.includes("تقييم الانجازات")
    ) {

        goEvaluation();

        return;

    }


    // ----------------------------------------
    // التواصل
    // ----------------------------------------

    if (
        text.includes("صفحه التواصل") ||
        text.includes("التواصل") ||
        text.includes("وديني للتواصل")
    ) {

        goCommunication();

        return;

    }


    // ----------------------------------------
    // إدارة الملفات
    // ----------------------------------------

    if (
        text.includes("اداره الملفات") ||
        text.includes("إدارة الملفات") ||
        text.includes("الملفات")
    ) {

        goFiles();

        return;

    }


    // ----------------------------------------
    // المساعد البصري
    // ----------------------------------------

    if (
        text.includes("المساعد البصري") ||
        text.includes("مساعد بصري") ||
        text.includes("المساعد البصرى")
    ) {

        goVisualAssistant();

        return;

    }


    // ----------------------------------------
    // الإعدادات
    // ----------------------------------------

    if (
        text.includes("صفحه الاعدادات") ||
        text.includes("صفحة الإعدادات") ||
        text.includes("الاعدادات") ||
        text.includes("الإعدادات")
    ) {

        goSettings();

        return;

    }


    // ----------------------------------------
    // الروحانيات
    // ----------------------------------------

    if (
        text.includes("صفحه الروحانيات") ||
        text.includes("الروحانيات") ||
        text.includes("تايم") ||
        text.includes("time")
    ) {

        goSpirituality();

        return;

    }


    // ----------------------------------------
    // الموظفين والمدير
    // ----------------------------------------

    if (
        text.includes("الموظفين والمدير") ||
        text.includes("الموظفين و المدير") ||
        text.includes("صفحه الموظفين") ||
        text.includes("الموظفين") ||
        text.includes("المدير")
    ) {

        goEmployees();

        return;

    }


    // ----------------------------------------
    // التسجيل
    // ----------------------------------------

    if (
        text.includes("صفحه التسجيل") ||
        text.includes("صفحة التسجيل") ||
        text.includes("التسجيل") ||
        text.includes("سجلني")
    ) {

        goRegister();

        return;

    }


    // ----------------------------------------
    // المواعيد
    // ----------------------------------------

    if (
        text.includes("صفحه المواعيد") ||
        text.includes("صفحة المواعيد") ||
        text.includes("المواعيد")
    ) {

        goSchedule();

        return;

    }


    // ----------------------------------------
    // الساعة
    // ----------------------------------------

    if (
        text.includes("الساعه كام") ||
        text.includes("الساعة كام") ||
        text.includes("الوقت كام") ||
        text.includes("اقرا لي الساعه") ||
        text.includes("اقرالي الساعه") ||
        text.includes("اقرا الساعة")
    ) {

        speakCurrentTime();

        return;

    }


    // ----------------------------------------
    // التاريخ
    // ----------------------------------------

    if (
        text.includes("النهارده كام") ||
        text.includes("النهارده ايه") ||
        text.includes("تاريخ النهارده") ||
        text.includes("التاريخ كام") ||
        text.includes("اقرا التاريخ") ||
        text.includes("اقرالي التاريخ")
    ) {

        speakCurrentDate();

        return;

    }


    // ----------------------------------------
    // التقويم الشهري
    // ----------------------------------------

    if (
        text.includes("التقويم الشهري") ||
        text.includes("اقرا التقويم الشهري") ||
        text.includes("اقرالي التقويم الشهري") ||
        text.includes("اقرا التقويم كله") ||
        text.includes("التقويم كله")
    ) {

        speakMonthlyCalendar();

        return;

    }


    // ----------------------------------------
    // التقويم الموجود في الصفحة
    // ----------------------------------------

    if (
        text.includes("اقرا التقويم") ||
        text.includes("اقرالي التقويم") ||
        text.includes("اقرا المواعيد")
    ) {

        speakPageCalendar();

        return;

    }


    // ----------------------------------------
    // الأخبار
    // ----------------------------------------

    if (
        text.includes("اقرا الاخبار") ||
        text.includes("اقرالي الاخبار") ||
        text.includes("الاخبار") ||
        text.includes("الخبر")
    ) {

        speakNewsItem();

        return;

    }


    // ----------------------------------------
    // المنبهات المحفوظة
    // ----------------------------------------

    if (
        text.includes("اقرا المنبهات") ||
        text.includes("اقرالي المنبهات") ||
        text.includes("المنبهات المحفوظه") ||
        text.includes("المنبهات المحفوظة") ||
        text.includes("عندي منبهات ايه") ||
        text.includes("عندي منبهات") ||
        text.includes("ايه المنبهات عندي") ||
        text.includes("المنبهات المضبوطه") ||
        text.includes("المنبهات المفعله")
    ) {

        speakSavedAlarms();

        return;

    }


    // ----------------------------------------
    // المنبهات المفعلة
    // ----------------------------------------

    if (
        text.includes("اقرا المنبهات المفعله") ||
        text.includes("اقرالي المنبهات المفعله") ||
        text.includes("ايه المنبهات المفعله")
    ) {

        speakActiveAlarms();

        return;

    }


    // ----------------------------------------
    // إضافة منبه
    // ----------------------------------------

    if (
        text.includes("اضف منبه") ||
        text.includes("اضافه منبه") ||
        text.includes("اضيف منبه") ||
        text.includes("عايز منبه") ||
        text.includes("عاوزه منبه") ||
        text.includes("عايز اضيف منبه") ||
        text.includes("عاوزه اضيف منبه") ||
        text.includes("منبه جديد") ||
        text.includes("ضبط منبه")
    ) {

        startNewAlarm();

        return;

    }


    // ----------------------------------------
    // إيقاف المنبه
    // ----------------------------------------

    if (
        text.includes("اقفل المنبه") ||
        text.includes("اوقف المنبه") ||
        text.includes("اسكت المنبه") ||
        text.includes("وقف المنبه")
    ) {

        dismissAlarm();

        speakQuick(
            "تم إيقاف المنبه.",
            function () {

                startListening();

            }
        );

        return;

    }


    // ----------------------------------------
    // أنا في صفحة إيه؟
    // ----------------------------------------

    if (
        text.includes("انا في صفحه ايه") ||
        text.includes("انا في صفحة ايه") ||
        text.includes("الصفحه دي بتاعت ايه") ||
        text.includes("صفحه دي ايه") ||
        text.includes("انا فين")
    ) {

        speakCurrentPage();

        return;

    }


    // ----------------------------------------
    // أمر غير معروف
    // ----------------------------------------

    speakQuick(
        "معلش، لم أفهم الأمر. " +
        "ممكن تقولي الساعة كام، النهارده كام، " +
        "اقرأ التقويم، اقرأ الأخبار، اقرأ المنبهات، " +
        "إضافة منبه، أو وديني لأي صفحة.",
        function () {

            startListening();

        }
    );

}


// ==========================================
// الساعة والمنبهات الحقيقية
// ==========================================

function updateLiveClock() {

    const now =
        new Date();


    let hours =
        now.getHours();


    const minutes =
        now.getMinutes();


    const seconds =
        now.getSeconds();


    const ampm =
        hours >= 12
            ? "م"
            : "ص";


    let displayHours =
        hours % 12;


    displayHours =
        displayHours
            ? displayHours
            : 12;


    const formattedMin =
        minutes < 10
            ? "0" + minutes
            : minutes;


    const formattedSec =
        seconds < 10
            ? "0" + seconds
            : seconds;


    const clockText =
        displayHours +
        ":" +
        formattedMin +
        ":" +
        formattedSec +
        " " +
        ampm;


    const clockElement =
        document.getElementById(
            "clockText"
        );


    if (clockElement) {

        clockElement.innerText =
            clockText;

    }


    const currentTimeFormat =
        (hours < 10 ? "0" : "") +
        hours +
        ":" +
        (minutes < 10 ? "0" : "") +
        minutes;


    <?php if (!empty($alarms_list)): ?>

        <?php foreach($alarms_list as $alm): ?>

            if (
                currentTimeFormat ===
                "<?php echo substr($alm['alarm_time'], 0, 5); ?>"
                &&
                seconds === 0
                &&
                !alarmRingingActive
            ) {

                triggerAlarmRinging(
                    "<?php echo htmlspecialchars($alm['alarm_title'], ENT_QUOTES); ?>",
                    "<?php echo $alm['alarm_time']; ?>"
                );

            }

        <?php endforeach; ?>

    <?php endif; ?>

}


// ==========================================
// تشغيل المنبه
// ==========================================

function triggerAlarmRinging(
    title,
    time
) {

    alarmRingingActive = true;


    const alertMsg =
        "تنبيه هام جداً: حان الآن موعد " +
        title +
        " في تمام الساعة " +
        time;


    const popupText =
        document.getElementById(
            "alarmPopupText"
        );


    const popupModal =
        document.getElementById(
            "alarmPopupModal"
        );


    if (popupText) {

        popupText.innerText =
            alertMsg;

    }


    if (popupModal) {

        popupModal.style.display =
            "flex";

    }


    speakTextForced(
        alertMsg
    );


    alarmSoundInterval =
        setInterval(
            function () {

                if (
                    alarmRingingActive
                ) {

                    speakTextForced(
                        alertMsg
                    );

                }

            },
            6000
        );

}


// ==========================================
// إيقاف المنبه
// ==========================================

function dismissAlarm() {

    alarmRingingActive = false;


    if (alarmSoundInterval) {

        clearInterval(
            alarmSoundInterval
        );

        alarmSoundInterval = null;

    }


    if (
        "speechSynthesis" in window
    ) {

        window.speechSynthesis.cancel();

    }


    const popupModal =
        document.getElementById(
            "alarmPopupModal"
        );


    if (popupModal) {

        popupModal.style.display =
            "none";

    }

}


// ==========================================
// تشغيل الساعة باستمرار
// ==========================================

setInterval(
    updateLiveClock,
    1000
);


updateLiveClock();


// ==========================================
// جاهزية الصفحة
// ==========================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        console.log(
            "MABSAR Schedule Voice System Ready"
        );

    }
);

</script>

</body>
</html>