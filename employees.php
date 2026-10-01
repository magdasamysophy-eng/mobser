<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "mobsar_db";

$conn = new mysqli($host, $username_db, $password_db, $dbname);
if (!$conn->connect_error) {
    $conn->set_charset("utf8");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);

        if (!empty($name)) {
            $stmt = $conn->prepare("INSERT INTO employees (name, email, role) VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $name, $email, $role);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: employees.php");
            exit();
        }
    }

    if (isset($_GET['delete_id'])) {
        $del_id = intval($_GET['delete_id']);
        $conn->query("DELETE FROM employees WHERE id = $del_id");
        header("Location: employees.php");
        exit();
    }

    $employees_list = [];
    $emp_result = $conn->query("SELECT * FROM employees ORDER BY id DESC");
    if ($emp_result) {
        while ($row = $emp_result->fetch_assoc()) {
            $employees_list[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - صفحة الموظفون والمدير</title>
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
        .home-back-btn, .chat-nav-btn {
            background: linear-gradient(135deg, #090314, #020104); border: 1px solid #d4af37; color: #d4af37;
            padding: 12px 22px; border-radius: 14px; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.25);
        }
        .home-back-btn:hover, .chat-nav-btn:hover { background: #d4af37; color: #000000; box-shadow: 0 0 35px rgba(212, 175, 55, 0.8); transform: translateY(-2px); }
        
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

        .tasks-main-container { width: 90%; max-width: 1100px; margin-top: 20px; display: flex; flex-direction: column; gap: 25px; }
        .tasks-grid-layout { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 25px; }
        @media(max-width: 900px) { .tasks-grid-layout { grid-template-columns: 1fr; } }

        .tasks-box {
            background: linear-gradient(135deg, rgba(25, 10, 45, 0.95), rgba(5, 2, 10, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.5); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 35px rgba(138, 43, 226, 0.3);
        }
        .tasks-box h3 { font-size: 1.4rem; color: #d4af37; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(212, 175, 55, 0.3); padding-bottom: 10px; text-shadow: 0 0 10px rgba(212,175,55,0.4); }

        .tasks-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .tasks-table th, .tasks-table td { padding: 12px; text-align: right; border-bottom: 1px solid rgba(212, 175, 55, 0.2); }
        .tasks-table th { color: #d4af37; font-size: 0.95rem; }
        .tasks-table td { color: #fff; font-size: 0.9rem; }

        .badge-status { padding: 5px 12px; border-radius: 15px; font-size: 0.75rem; font-weight: 700; display: inline-block; }
        .badge-active { background: rgba(34, 197, 94, 0.3); color: #86efac; border: 1px solid #22c55e; box-shadow: 0 0 10px rgba(34,197,94,0.4); }
        .badge-break { background: rgba(234, 179, 8, 0.3); color: #fde047; border: 1px solid #eab308; box-shadow: 0 0 10px rgba(234,179,8,0.4); }
        .badge-vacation { background: rgba(59, 130, 246, 0.3); color: #93c5fd; border: 1px solid #3b82f6; box-shadow: 0 0 10px rgba(59,130,246,0.4); }
        .badge-new { background: rgba(168, 85, 247, 0.3); color: #e9d5ff; border: 1px solid #a855f7; box-shadow: 0 0 10px rgba(168,85,247,0.4); }

        .form-group { margin-bottom: 15px; }
        .form-group label { display: flex; justify-content: space-between; align-items: center; color: #d8b4fe; margin-bottom: 6px; font-weight: 600; font-size: 0.95rem; }
        
        .input-with-mic-wrapper { position: relative; width: 100%; }
        .form-control {
            width: 100%; padding: 11px 45px 11px 11px; border-radius: 12px; background: #000; border: 1px solid rgba(212, 175, 55, 0.5);
            color: #fff; font-size: 0.95rem; outline: none; transition: 0.3s;
        }
        .form-control:focus { border-color: #d4af37; box-shadow: 0 0 20px rgba(212, 175, 55, 0.5); }
        
        .input-inner-mic-btn {
            position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
            background: rgba(138, 43, 226, 0.2); border: 1px solid #d4af37; color: #d4af37;
            width: 32px; height: 32px; border-radius: 50%; cursor: pointer; display: inline-flex;
            align-items: center; justify-content: center; font-size: 0.9rem; transition: 0.3s;
            box-shadow: 0 0 10px rgba(212,175,55,0.3);
        }
        .input-inner-mic-btn:hover { background: #d4af37; color: #000; transform: translateY(-50%) scale(1.15); box-shadow: 0 0 15px #d4af37; }

        .mini-mic-btn {
            background: rgba(138, 43, 226, 0.2); border: 1px solid #d4af37; color: #d4af37;
            width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: inline-flex;
            align-items: center; justify-content: center; font-size: 0.85rem; transition: 0.3s;
            box-shadow: 0 0 10px rgba(212,175,55,0.3);
        }
        .mini-mic-btn:hover { background: #d4af37; color: #000; transform: scale(1.15); box-shadow: 0 0 15px #d4af37; }

        .submit-task-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000; border: none;
            padding: 12px 25px; border-radius: 12px; font-weight: 700; font-size: 1.05rem; cursor: pointer;
            width: 100%; transition: 0.3s; box-shadow: 0 5px 25px rgba(212, 175, 55, 0.4); display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .submit-task-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); box-shadow: 0 0 35px rgba(212, 175, 55, 0.8); transform: translateY(-2px); }

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
<body onmouseover="handleAutoSpeech(event)">

    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseover="speakQuick('زر الصفحة الرئيسية')" onclick="goToPage(event, 'index.php', 'جارٍ الآن الذهاب للصفحة الرئيسية')">
            <i class="fa-solid fa-house"></i> الصفحة الرئيسية
        </a>
        <a href="tasks.php" class="chat-nav-btn" onmouseover="speakQuick('زر صفحة المهام')" onclick="goToPage(event, 'tasks.php', 'جارٍ الآن الذهاب لصفحة المهام')">
            <i class="fa-solid fa-list-check"></i> صفحة المهام <i class="fa-solid fa-bolt" style="color: #d4af37;"></i>
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseover="speakQuick('منصة مبصر، صفحة الموظفون والمدير')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title">صفحة الموظفون والمدير</div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي سري">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseover="speakQuick('اضغط على المايك وقل، وديني الصفحة الرئيسية، أو، وديني صفحة المهام')">اضغط وقل: (وديني الصفحة الرئيسية) أو (وديني صفحة المهام)</span>
        </div>
    </div>
    <div class="tasks-main-container">
        <div class="tasks-grid-layout">
            
            <div class="tasks-box">
                <h3 onmouseover="speakQuick('عرض قائمة الموظفين والمديرين المسجلين')">
                    <span><i class="fa-solid fa-users-gear"></i> عرض قائمة الموظفين</span>
                    <button type="button" class="mini-mic-btn" onclick="speakQuick('عرض قائمة الموظفين والمديرين المسجلين في النظام')" title="قراءة العنوان"><i class="fa-solid fa-volume-high"></i></button>
                </h3>
                <div style="max-height: 380px; overflow-y: auto;">
                    <table class="tasks-table">
                        <thead>
                            <tr>
                                <th>الاسم الكامل</th>
                                <th>البريد الإلكتروني</th>
                                <th>الحالة / الوظيفة</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($employees_list)): ?>
                                <?php foreach ($employees_list as $emp): ?>
                                    <tr onmouseover="speakQuick('الموظف: <?php echo htmlspecialchars($emp['name']); ?>، البريد: <?php echo htmlspecialchars($emp['email']); ?>، الحالة: <?php echo htmlspecialchars($emp['role']); ?>')">
                                        <td><strong><?php echo htmlspecialchars($emp['name']); ?></strong></td>
                                        <td><span style="font-size: 0.85rem; color: #d8b4fe;"><?php echo htmlspecialchars($emp['email']); ?></span></td>
                                        <td>
                                            <?php 
                                                $role_val = $emp['role'];
                                                $b_class = 'badge-active';
                                                if($role_val == 'في استراحة') $b_class = 'badge-break';
                                                elseif($role_val == 'إجازة' || $role_val == 'واخد إجازة') $b_class = 'badge-vacation';
                                                elseif($role_val == 'مستجد') $b_class = 'badge-new';
                                            ?>
                                            <span class="badge-status <?php echo $b_class; ?>"><?php echo htmlspecialchars($role_val); ?></span>
                                        </td>
                                        <td>
                                            <a href="employees.php?delete_id=<?php echo $emp['id']; ?>" onmouseover="speakQuick('حذف السجل')" onclick="return confirm('هل أنتِ متأكدة من حذف هذا السجل؟')" style="color: #ef4444; font-size: 1.1rem;" title="حذف">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; color: #a78bfa; padding: 25px;" onmouseover="speakQuick('لا توجد سجلات للموظفين حالياً')">لا توجد سجلات للموظفين حالياً. أضيفي موظفاً أو مديراً جديداً من النموذج المجاور!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tasks-box">
                <h3 onmouseover="speakQuick('إضافة موظف أو مدير جديد')">
                    <span><i class="fa-solid fa-user-plus"></i> إضافة موظف أو مدير جديد</span>
                    <button type="button" class="mini-mic-btn" onclick="speakQuick('نموذج إضافة موظف أو مدير جديد للنظام')" title="قراءة العنوان"><i class="fa-solid fa-volume-high"></i></button>
                </h3>
                <form action="employees.php" method="POST">
                    
                    <div class="form-group">
                        <label onmouseover="speakQuick('حقل الاسم الكامل')">
                            <span>الاسم الكامل:</span>
                        </label>
                        <div class="input-with-mic-wrapper">
                            <input type="text" id="empNameInput" name="name" class="form-control" placeholder="أدخل الاسم الكامل..." required onfocus="speakQuick('أدخل الاسم الكامل هنا')">
                            <button type="button" class="input-inner-mic-btn" onclick="fillInputByVoice('empNameInput', 'الاسم الكامل')" title="إملاء بالصوت"><i class="fa-solid fa-microphone"></i></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label onmouseover="speakQuick('حقل البريد الإلكتروني')">
                            <span>البريد الإلكتروني:</span>
                        </label>
                        <div class="input-with-mic-wrapper">
                            <input type="email" id="empEmailInput" name="email" class="form-control" placeholder="example@mobsar.com" required onfocus="speakQuick('أدخل البريد الإلكتروني هنا')">
                            <button type="button" class="input-inner-mic-btn" onclick="fillInputByVoice('empEmailInput', 'البريد الإلكتروني')" title="إملاء بالصوت"><i class="fa-solid fa-microphone"></i></button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label onmouseover="speakQuick('حقل حالة الوظيفة أو المسمى')">
                            <span>حالة الوظيفة أو المسمى:</span>
                            <button type="button" class="mini-mic-btn" onclick="speakQuick('اختر حالة الوظيفة، نشط، في استراحة، إجازة، مستجد، أو مدير النظام')" title="استماع الخيارات"><i class="fa-solid fa-volume-high"></i></button>
                        </label>
                        <select name="role" class="form-control" onfocus="speakQuick('اختر حالة الموظف')">
                            <option value="نشط">نشط</option>
                            <option value="في استراحة">في استراحة</option>
                            <option value="إجازة">إجازة</option>
                            <option value="مستجد">مستجد</option>
                            <option value="مدير">مدير النظام</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-task-btn" onmouseover="speakQuick('زر حفظ الموظف في القائمة')" title="حفظ">
                        <i class="fa-solid fa-floppy-disk"></i> حفظ الموظف في القائمة
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">وضع الإتاحة الصوتية وقراءة المؤشر مفعل بكفاءة...</span>
    </div>

<script>
    

/* =========================================
   MOBSAR - EMPLOYEES VOICE SYSTEM
   PART 1
   نظام الموظفين بالصوت
========================================= */

let recognition = null;

let voiceSystemStarted = false;
let isListening = false;
let isSpeaking = false;

let currentVoiceMode = "command";

let newEmployee = {
    name: "",
    email: "",
    status: ""
};


/* =========================================
   عناصر الصفحة
========================================= */

function getNameInput() {
    return document.getElementById("empNameInput");
}

function getEmailInput() {
    return document.getElementById("empEmailInput");
}

function getRoleSelect() {
    return document.querySelector('select[name="role"]');
}

function getStatusText() {
    return document.getElementById("voiceStatusText");
}


/* =========================================
   تحديث حالة الصوت
========================================= */

function updateVoiceStatus(text) {

    let status = getStatusText();

    if (status) {
        status.innerText = text;
    }
}


/* =========================================
   قراءة النص
   مهم جداً:
   نوقف المايك أثناء الكلام
========================================= */

function speakQuick(text, callback) {

    isSpeaking = true;

    if (recognition) {
        try {
            recognition.stop();
        } catch (e) {}
    }

    isListening = false;

    if (!window.speechSynthesis) {

        isSpeaking = false;

        if (callback) {
            callback();
        }

        return;
    }

    window.speechSynthesis.cancel();

    let utterance =
        new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-SA";
    utterance.rate = 1.0;
    utterance.pitch = 1.05;

    utterance.onend = function () {

        isSpeaking = false;

        if (callback) {
            setTimeout(callback, 250);
        }
    };

    utterance.onerror = function () {

        isSpeaking = false;

        if (callback) {
            setTimeout(callback, 250);
        }
    };

    window.speechSynthesis.speak(utterance);
}


/* =========================================
   تنظيف الكلام
========================================= */

function normalizeCommand(text) {

    if (!text) {
        return "";
    }

    return text
        .toLowerCase()
        .trim()
        .replace(/[؟?!،,.]/g, "")
        .replace(/\s+/g, " ");
}


/* =========================================
   إنشاء Speech Recognition
========================================= */

function createRecognition() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {

        alert(
            "متصفحك لا يدعم التعرف الصوتي. استخدمي Google Chrome."
        );

        return null;
    }

    let rec = new SpeechRecognition();

    rec.lang = "ar-SA";

    rec.continuous = false;

    rec.interimResults = false;

    rec.maxAlternatives = 1;


    rec.onstart = function () {

        isListening = true;

        let btn =
            document.getElementById("commandMicBtn");

        if (btn) {
            btn.style.borderColor = "#22c55e";
        }

        updateVoiceStatus(
            "جاري الاستماع... قولي أمرك"
        );
    };


    rec.onresult = function (event) {

        isListening = false;

        let text =
            event.results[0][0].transcript;

        text = normalizeCommand(text);

        updateVoiceStatus(
            "تم سماع: " + text
        );

        processVoiceCommand(text);
    };


    rec.onerror = function (event) {

        isListening = false;

        console.log(
            "VOICE ERROR:",
            event.error
        );

        let btn =
            document.getElementById("commandMicBtn");

        if (btn) {
            btn.style.borderColor = "#d4af37";
        }

        if (
            voiceSystemStarted &&
            !isSpeaking
        ) {

            setTimeout(function () {

                startListening();

            }, 500);
        }
    };


    rec.onend = function () {

        isListening = false;

        let btn =
            document.getElementById("commandMicBtn");

        if (btn) {
            btn.style.borderColor = "#d4af37";
        }

        /*
           لو لسه النظام شغال
           ومفيش كلام بيتقال
           نرجع نسمع
        */

        if (
            voiceSystemStarted &&
            !isSpeaking &&
            currentVoiceMode !== "waiting"
        ) {

            setTimeout(function () {

                if (
                    voiceSystemStarted &&
                    !isSpeaking &&
                    !isListening
                ) {

                    startListening();
                }

            }, 400);
        }
    };


    return rec;
}


/* =========================================
   تشغيل الاستماع
========================================= */

function startListening() {

    if (!voiceSystemStarted) {
        return;
    }

    if (isSpeaking) {
        return;
    }

    if (isListening) {
        return;
    }

    if (!recognition) {
        recognition = createRecognition();
    }

    if (!recognition) {
        return;
    }

    try {

        recognition.start();

    } catch (error) {

        console.log(
            "Recognition start:",
            error
        );

        setTimeout(function () {

            if (
                voiceSystemStarted &&
                !isSpeaking &&
                !isListening
            ) {

                try {
                    recognition.start();
                } catch (e) {}

            }

        }, 700);
    }
}


/* =========================================
   تشغيل النظام أول مرة
========================================= */

function startVoiceSystem() {

    if (voiceSystemStarted) {
        return;
    }

    voiceSystemStarted = true;

    currentVoiceMode = "command";

    speakQuick(
        "مرحباً بك في صفحة الموظفين والمدير في مبصر. أنا جاهز، قولي أمرك.",
        function () {
            startListening();
        }
    );
}


/* =========================================
   تشغيل الصوت بأول تفاعل
========================================= */

function activateVoiceOnFirstInteraction() {

    if (!voiceSystemStarted) {
        startVoiceSystem();
    }
}


/* =========================================
   أول لمسة
========================================= */

document.addEventListener(
    "touchstart",
    activateVoiceOnFirstInteraction,
    {
        once: true
    }
);


/* =========================================
   أول ضغطة كيبورد
========================================= */

document.addEventListener(
    "keydown",
    activateVoiceOnFirstInteraction,
    {
        once: true
    }
);


/* =========================================
   الانتقال لأي صفحة
========================================= */

function goToPage(
    event,
    url,
    message
) {

    if (event) {
        event.preventDefault();
    }

    voiceSystemStarted = false;

    if (recognition) {

        try {
            recognition.stop();
        } catch (e) {}

    }

    speakQuick(
        message || "جارٍ الانتقال",
        function () {

            window.location.href = url;

        }
    );
}


/* =========================================
   أوامر التنقل لكل صفحات مبصر
========================================= */

function handleNavigationCommand(command) {

    command =
        normalizeCommand(command);


    /* الرئيسية */

    if (
        command.includes("الصفحة الرئيسية") ||
        command.includes("الصفحة الأساسيه") ||
        command.includes("الصفحة الاساسية") ||
        command.includes("الصفحة الأساسية") ||
        command.includes("الرئيسية") ||
        command.includes("رئيسية") ||
        command.includes("الصفحه الرئيسيه") ||
        command.includes("الاساسية")
    ) {

        goToPage(
            null,
            "index.php",
            "جارٍ الآن الذهاب إلى الصفحة الرئيسية"
        );

        return true;
    }


    /* المهام */

    if (
        command.includes("صفحة المهام") ||
        command.includes("صفحه المهام") ||
        command.includes("المهام") ||
        command.includes("المهام")
    ) {

        goToPage(
            null,
            "tasks.php",
            "جارٍ الآن الذهاب إلى صفحة المهام"
        );

        return true;
    }


    /* التقييم والإنجازات */

    if (
        command.includes("صفحة التقييم") ||
        command.includes("التقييم") ||
        command.includes("الإنجازات") ||
        command.includes("الانجازات") ||
        command.includes("الإنجاز") ||
        command.includes("الانجاز")
    ) {

        goToPage(
            null,
            "evaluation.php",
            "جارٍ الآن الذهاب إلى صفحة التقييم والإنجازات"
        );

        return true;
    }


    /* التواصل */

    if (
        command.includes("صفحة التواصل") ||
        command.includes("التواصل") ||
        command.includes("المراسلات") ||
        command.includes("الرسائل")
    ) {

        goToPage(
            null,
            "communication.php",
            "جارٍ الآن الذهاب إلى صفحة التواصل"
        );

        return true;
    }


    /* الموظفين */

    if (
        command.includes("") ||
        command.includes("ا") ||
        command.includes("ا") ||
        command.includes("ا") ||
        command.includes("ا")
    ) {

        goToPage(
            null,
            "employees.php",
            ""
        );

        return true;
    }


    /* الإعدادات */

    if (
        command.includes("صفحة الإعدادات") ||
        command.includes("صفحه الاعدادات") ||
        command.includes("الإعدادات") ||
        command.includes("الاعدادات") ||
        command.includes("إعدادات")
    ) {

        goToPage(
            null,
            "settings.php",
            "جارٍ الآن الذهاب إلى صفحة الإعدادات"
        );

        return true;
    }


    /* الجدول والمواعيد والأخبار */

    if (
        command.includes("صفحة الجدول") ||
        command.includes("الجدول") ||
        command.includes("المواعيد") ||
        command.includes("صفحة المواعيد") ||
        command.includes("الأخبار") ||
        command.includes("الاخبار") ||
        command.includes("صفحة الأخبار")
    ) {

        goToPage(
            null,
            "schedule.php",
            "جارٍ الآن الذهاب إلى صفحة الجدول والمواعيد والأخبار"
        );

        return true;
    }


    /* الروحانيات */

    if (
        command.includes("صفحة الروحانيات") ||
        command.includes("الروحانيات") ||
        command.includes("روحانيات")
    ) {

        goToPage(
            null,
            "team.php",
            "جارٍ الآن الذهاب إلى صفحة الروحانيات"
        );

        return true;
    }


    /* إدارة الملفات */

    if (
        command.includes("صفحة إدارة الملفات") ||
        command.includes("ادارة الملفات") ||
        command.includes("إدارة الملفات") ||
        command.includes("الملفات") ||
        command.includes("صفحة الملفات")
    ) {

        goToPage(
            null,
            "notifications.php",
            "جارٍ الآن الذهاب إلى صفحة إدارة الملفات"
        );

        return true;
    }


    return false;
}


/* =========================================
   تجهيز إضافة موظف
========================================= */

function startAddEmployee() {

    newEmployee = {
        name: "",
        email: "",
        status: ""
    };

    currentVoiceMode = "employee_name";

    let input = getNameInput();

    if (input) {

        input.value = "";

        input.focus();
    }

    speakQuick(
        "تمام. هنضيف موظف جديد. قولي الاسم الكامل.",
        function () {

            if (input) {
                input.focus();
            }

            startListening();
        }
    );
}


/* =========================================
   استقبال اسم الموظف
========================================= */

function handleEmployeeName(text) {

    text =
        text.trim();

    if (!text) {

        speakQuick(
            "مسمعتش الاسم. قولي الاسم الكامل مرة تانية.",
            function () {
                startListening();
            }
        );

        return;
    }


    newEmployee.name = text;


    let input =
        getNameInput();

    if (input) {

        input.value =
            newEmployee.name;

        input.focus();

        input.dispatchEvent(
            new Event(
                "input",
                {
                    bubbles: true
                }
            )
        );
    }


    currentVoiceMode =
        "confirm_name";


    speakQuick(
        "الاسم هو " +
        newEmployee.name +
        ". هل الاسم صحيح؟ قولي نعم أو لا.",
        function () {

            startListening();

        }
    );
}


/* =========================================
   تأكيد الاسم
========================================= */

function handleNameConfirmation(text) {

    text =
        normalizeCommand(text);


    if (
        text.includes("نعم") ||
        text.includes("ايوه") ||
        text.includes("أيوه") ||
        text.includes("صح") ||
        text.includes("صحيح") ||
        text.includes("تمام")
    ) {

        let generatedEmail =
            generateEmailFromArabicName(
                newEmployee.name
            );

        newEmployee.email =
            generatedEmail;


        let emailInput =
            getEmailInput();

        if (emailInput) {

            emailInput.value =
                generatedEmail;

            emailInput.focus();

            emailInput.dispatchEvent(
                new Event(
                    "input",
                    {
                        bubbles: true
                    }
                )
            );
        }


        currentVoiceMode =
            "employee_email";


        speakQuick(
            "تمام. البريد المقترح هو " +
            generatedEmail +
            ". هل تريدين استخدامه؟ قولي نعم أو لا.",
            function () {

                startListening();

            }
        );

        return;
    }


    if (
        text.includes("لا") ||
        text.includes("غلط") ||
        text.includes("خطأ")
    ) {

        currentVoiceMode =
            "employee_name";

        let input =
            getNameInput();

        if (input) {

            input.value = "";

            input.focus();
        }

        speakQuick(
            "تمام. قولي الاسم الصحيح مرة تانية.",
            function () {

                if (input) {
                    input.focus();
                }

                startListening();

            }
        );

        return;
    }


    speakQuick(
        "قولي نعم لو الاسم صحيح، أو لا لو عايزة تغييره.",
        function () {
            startListening();
        }
    );
}


/* =========================================
   إنشاء بريد إلكتروني من الاسم
========================================= */

function generateEmailFromArabicName(name) {

    let englishName =
        arabicToEnglish(name);

    englishName =
        englishName
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, ".")
            .replace(/^\.+|\.+$/g, "");


    if (!englishName) {

        englishName =
            "employee";
    }


    return (
        englishName +
        "@mobsar.com"
    );
}


/* =========================================
   تحويل عربي إلى إنجليزي
========================================= */

function arabicToEnglish(text) {

    const map = {

        "ا": "a",
        "أ": "a",
        "إ": "e",
        "آ": "a",
        "ب": "b",
        "ت": "t",
        "ث": "th",
        "ج": "g",
        "ح": "h",
        "خ": "kh",
        "د": "d",
        "ذ": "dh",
        "ر": "r",
        "ز": "z",
        "س": "s",
        "ش": "sh",
        "ص": "s",
        "ض": "d",
        "ط": "t",
        "ظ": "z",
        "ع": "a",
        "غ": "gh",
        "ف": "f",
        "ق": "q",
        "ك": "k",
        "ل": "l",
        "م": "m",
        "ن": "n",
        "ه": "h",
        "و": "w",
        "ي": "y",
        "ى": "a",
        "ة": "a"
    };


    let result = "";

    for (
        let i = 0;
        i < text.length;
        i++
    ) {

        let char =
            text[i];

        if (
            map[char] !== undefined
        ) {

            result +=
                map[char];

        } else if (
            /[a-zA-Z0-9 ]/.test(char)
        ) {

            result +=
                char;

        } else {

            result +=
                " ";
        }
    }


    return result;
}
/* =========================================
   MOBSAR - EMPLOYEES VOICE SYSTEM
   PART 2-A
========================================= */


/* =========================================
   تأكيد البريد الإلكتروني
========================================= */

function handleEmailConfirmation(text) {

    text = normalizeCommand(text);

    if (
        text.includes("نعم") ||
        text.includes("ايوه") ||
        text.includes("أيوه") ||
        text.includes("صح") ||
        text.includes("تمام")
    ) {

        currentVoiceMode = "employee_status";

        let role = getRoleSelect();

        if (role) {
            role.focus();
        }

        speakQuick(
            "تمام. اختاري حالة الموظف: نشط، في استراحة، أو إجازة.",
            function () {

                if (role) {
                    role.focus();
                }

                startListening();
            }
        );

        return;
    }


    if (
        text.includes("لا") ||
        text.includes("غلط") ||
        text.includes("خطأ")
    ) {

        currentVoiceMode = "custom_email";

        let input = getEmailInput();

        if (input) {

            input.value = "";
            input.focus();
        }

        speakQuick(
            "تمام. قولي البريد الإلكتروني الذي تريدين استخدامه.",
            function () {

                if (input) {
                    input.focus();
                }

                startListening();
            }
        );

        return;
    }


    speakQuick(
        "قولي نعم لاستخدام البريد المقترح، أو لا لتغييره.",
        function () {
            startListening();
        }
    );
}


/* =========================================
   البريد المخصص
========================================= */

function handleCustomEmail(text) {

    let email =
        text
            .replace(/\s+/g, "")
            .replace(/آت/g, "@")
            .replace(/ات/g, "@")
            .replace(/ايت/g, "@")
            .replace(/نقطة/g, ".")
            .replace(/نقطه/g, ".")
            .replace(/دوت/g, ".")
            .replace(/dot/g, ".")
            .toLowerCase();


    if (!email.includes("@")) {
        email += "@mobsar.com";
    }


    newEmployee.email = email;


    let input = getEmailInput();

    if (input) {

        input.value = email;
        input.focus();

        input.dispatchEvent(
            new Event("input", {
                bubbles: true
            })
        );
    }


    currentVoiceMode = "employee_status";


    let role = getRoleSelect();

    if (role) {
        role.focus();
    }


    speakQuick(
        "تم تسجيل البريد. الآن اختاري حالة الموظف: نشط، في استراحة، أو إجازة.",
        function () {

            if (role) {
                role.focus();
            }

            startListening();
        }
    );
}


/* =========================================
   اختيار حالة الموظف
========================================= */

function handleEmployeeStatus(text) {

    text = normalizeCommand(text);

    let selectedStatus = "";


    if (
        text.includes("نشط") ||
        text.includes("نشطة")
    ) {

        selectedStatus = "نشط";

    } else if (
        text.includes("استراحة") ||
        text.includes("راحة")
    ) {

        selectedStatus = "في استراحة";

    } else if (
        text.includes("إجازة") ||
        text.includes("اجازة")
    ) {

        selectedStatus = "إجازة";
    }


    if (!selectedStatus) {

        speakQuick(
            "معلش، اختاري حالة الموظف: نشط، في استراحة، أو إجازة.",
            function () {
                startListening();
            }
        );

        return;
    }


    newEmployee.status = selectedStatus;


    let role = getRoleSelect();

    if (role) {

        role.value = selectedStatus;

        role.dispatchEvent(
            new Event("change", {
                bubbles: true
            })
        );

        role.focus();
    }


    currentVoiceMode = "confirm_employee";


    speakQuick(
        "بيانات الموظف هي: الاسم " +
        newEmployee.name +
        "، البريد الإلكتروني " +
        newEmployee.email +
        "، والحالة " +
        newEmployee.status +
        ". هل البيانات كلها صحيحة؟ قولي نعم أو لا.",
        function () {
            startListening();
        }
    );
}


/* =========================================
   تأكيد البيانات بالكامل
========================================= */

function handleEmployeeConfirmation(text) {

    text = normalizeCommand(text);


    if (
        text.includes("نعم") ||
        text.includes("ايوه") ||
        text.includes("أيوه") ||
        text.includes("صح") ||
        text.includes("صحيح") ||
        text.includes("تمام")
    ) {

        saveEmployee();

        return;
    }


    if (
        text.includes("لا") ||
        text.includes("غلط") ||
        text.includes("خطأ")
    ) {

        speakQuick(
            "تمام، لم يتم الحفظ. قولي أضف موظف لإعادة إدخال البيانات.",
            function () {

                resetEmployeeVoice();
                startListening();

            }
        );

        return;
    }


    speakQuick(
        "قولي نعم للحفظ أو لا لإلغاء الحفظ.",
        function () {
            startListening();
        }
    );
}


/* =========================================
   حفظ الموظف
========================================= */

function saveEmployee() {

    let nameInput = getNameInput();
    let emailInput = getEmailInput();
    let roleSelect = getRoleSelect();


    if (nameInput) {
        nameInput.value = newEmployee.name;
    }

    if (emailInput) {
        emailInput.value = newEmployee.email;
    }

    if (roleSelect) {
        roleSelect.value = newEmployee.status;
    }


    localStorage.setItem(
        "mobsar_employee_saved",
        "1"
    );


    currentVoiceMode = "waiting";
    voiceSystemStarted = false;


    speakQuick(
        "تمام. جاري حفظ الموظف.",
        function () {

            let form =
                document.querySelector(
                    'form[action="employees.php"][method="POST"]'
                );


            if (!form) {

                form =
                    document.querySelector(
                        'form[method="POST"]'
                    );
            }


            if (!form) {

                speakQuick(
                    "مش لاقي نموذج حفظ الموظف في الصفحة."
                );

                currentVoiceMode = "command";
                voiceSystemStarted = true;

                startListening();

                return;
            }


            form.submit();
        }
    );
}


/* =========================================
   MOBSAR - EMPLOYEES VOICE SYSTEM
   PART 2-B
   الجزء الأخير + أساس تشغيل السكريبت
========================================= */


/* =========================================
   بعد إعادة تحميل الصفحة
   تأكيد نجاح الحفظ
========================================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        let saved =
            localStorage.getItem(
                "mobsar_employee_saved"
            );


        if (saved === "1") {

            localStorage.removeItem(
                "mobsar_employee_saved"
            );


            setTimeout(
                function () {

                    voiceSystemStarted = true;
                    currentVoiceMode = "command";


                    speakQuick(
                        "تم حفظ الموظف بنجاح. أنا جاهز، استمعي لأمر آخر.",
                        function () {

                            startListening();

                        }
                    );

                },
                700
            );
        }
    }
);


/* =========================================
   إعادة ضبط عملية الموظف
========================================= */

function resetEmployeeVoice() {

    newEmployee = {
        name: "",
        email: "",
        status: ""
    };

    currentVoiceMode = "command";
}


/* =========================================
   قراءة الموظفين الموجودين
   من الجدول الموجود فعلاً
========================================= */

function readEmployees() {

    currentVoiceMode = "waiting";


    speakQuick(
        "لحظة، جاري قراءة الموظفين الموجودين.",
        function () {

            let rows =
                document.querySelectorAll(
                    ".tasks-table tbody tr"
                );


            let employees = [];


            rows.forEach(
                function (row) {

                    let cells =
                        row.querySelectorAll("td");


                    if (cells.length >= 3) {

                        let name =
                            cells[0]
                                .innerText
                                .trim();

                        let email =
                            cells[1]
                                .innerText
                                .trim();

                        let status =
                            cells[2]
                                .innerText
                                .trim();


                        if (
                            name &&
                            !name.includes(
                                "لا توجد سجلات"
                            )
                        ) {

                            employees.push({
                                name: name,
                                email: email,
                                status: status
                            });
                        }
                    }
                }
            );


            if (employees.length === 0) {

                speakQuick(
                    "لا يوجد موظفون مسجلون حالياً.",
                    function () {

                        currentVoiceMode =
                            "command";

                        startListening();
                    }
                );

                return;
            }


            let text =
                "الموظفون الموجودون عندك هم: ";


            employees.forEach(
                function (
                    employee,
                    index
                ) {

                    text +=
                        "الموظف رقم " +
                        (index + 1) +
                        ": " +
                        employee.name +
                        "، البريد " +
                        employee.email +
                        "، الحالة " +
                        employee.status;


                    if (
                        index <
                        employees.length - 1
                    ) {

                        text += "، ";
                    }
                }
            );


            currentVoiceMode = "command";


            speakQuick(
                text,
                function () {
                    startListening();
                }
            );
        }
    );
}


/* =========================================
   معالجة كل أمر صوتي
========================================= */

function processVoiceCommand(command) {

    command =
        normalizeCommand(command);


    if (!command) {

        startListening();

        return;
    }


    console.log(
        "VOICE COMMAND:",
        command
    );


    /* ================================
       مراحل إضافة الموظف
    ================================= */

    if (
        currentVoiceMode ===
        "employee_name"
    ) {

        handleEmployeeName(command);
        return;
    }


    if (
        currentVoiceMode ===
        "confirm_name"
    ) {

        handleNameConfirmation(command);
        return;
    }


    if (
        currentVoiceMode ===
        "employee_email"
    ) {

        handleEmailConfirmation(command);
        return;
    }


    if (
        currentVoiceMode ===
        "custom_email"
    ) {

        handleCustomEmail(command);
        return;
    }


    if (
        currentVoiceMode ===
        "employee_status"
    ) {

        handleEmployeeStatus(command);
        return;
    }


    if (
        currentVoiceMode ===
        "confirm_employee"
    ) {

        handleEmployeeConfirmation(command);
        return;
    }


    if (
        currentVoiceMode ===
        "waiting"
    ) {

        return;
    }


    /* ================================
       موظف آخر
    ================================= */

    if (
        command.includes("أضف موظف آخر") ||
        command.includes("اضف موظف اخر") ||
        command.includes("أضف موظف تاني") ||
        command.includes("اضف موظف تاني") ||
        command.includes("موظف تاني") ||
        command.includes("موظف ثاني")
    ) {

        startAddEmployee();
        return;
    }


    /* ================================
       إضافة موظف
    ================================= */

    if (
        command.includes("أضف موظف") ||
        command.includes("اضف موظف") ||
        command.includes("إضافة موظف") ||
        command.includes("اضافة موظف") ||
        command.includes("موظف جديد")
    ) {

        startAddEmployee();
        return;
    }


    /* ================================
       قراءة الموظفين
    ================================= */

    if (
        command.includes("اقرألي جميع الموظفين") ||
        command.includes("اقريلي جميع الموظفين") ||
        command.includes("اقرأ جميع الموظفين") ||
        command.includes("اقري جميع الموظفين") ||
        command.includes("اقرأ الموظفين") ||
        command.includes("اقري الموظفين") ||
        command.includes("قولي الموظفين") ||
        command.includes("قولي كل الموظفين") ||
        command.includes("كل الموظفين") ||
        command.includes("الموظفين الموجودين") ||
        command.includes("الموظفين عندك") ||
        command.includes("قائمة الموظفين") ||
        command.includes("قولي قائمة الموظفين") ||
        command.includes("وريلي الموظفين")
    ) {

        readEmployees();
        return;
    }


    /* ================================
       التنقل لكل صفحات مبصر
    ================================= */

    if (
        handleNavigationCommand(command)
    ) {

        return;
    }


    /* ================================
       أمر غير معروف
    ================================= */

    speakQuick(
        "معلش، مش فاهم الأمر. قولي أضف موظف، قولي قائمة الموظفين، أو قولي وديني لاسم الصفحة.",
        function () {

            startListening();
        }
    );
}


/* =========================================
   تشغيل المايك يدويًا
========================================= */

function runGlobalVoiceCommand() {

    voiceSystemStarted = true;

    currentVoiceMode = "command";

    startListening();
}


/* =========================================
   زر المايك
========================================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        let commandBtn =
            document.getElementById(
                "commandMicBtn"
            );


        if (commandBtn) {

            commandBtn.onclick =
                function (event) {

                    if (event) {
                        event.preventDefault();
                    }


                    if (
                        !voiceSystemStarted
                    ) {

                        startVoiceSystem();

                    } else {

                        startListening();
                    }
                };
        }
    }
);


/* =========================================
   قراءة الأزرار والروابط
========================================= */

function handleAutoSpeech(event) {

    if (!event) {
        return;
    }


    let target =
        event.target;


    if (!target) {
        return;
    }


    /*
       روابط A عندك فيها onmouseover بالفعل،
       لذلك لا نكرر الكلام.
    */

    if (
        target.tagName === "A" &&
        target.getAttribute("onmouseover")
    ) {

        return;
    }


    /*
       قراءة الزر لو عنده title
    */

    if (
        target.tagName === "BUTTON" &&
        target.getAttribute("title")
    ) {

        speakQuick(
            target.getAttribute("title")
        );
    }
}


/* =========================================
   تعبئة الخانات يدويًا بالصوت
========================================= */

function fillInputByVoice(
    inputId,
    fieldName
) {

    let input =
        document.getElementById(
            inputId
        );


    if (!input) {
        return;
    }


    currentVoiceMode =
        "waiting";


    if (recognition) {

        try {
            recognition.stop();
        } catch (e) {}
    }


    input.focus();


    speakQuick(
        "تفضلي، انطقي " +
        fieldName,
        function () {

            currentVoiceMode =
                "manual_input";


            startManualInputRecognition(
                inputId,
                fieldName
            );
        }
    );
}


/* =========================================
   التعرف على الإدخال اليدوي
========================================= */

function startManualInputRecognition(
    inputId,
    fieldName
) {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if (!SpeechRecognition) {
        return;
    }


    let fieldRecognition =
        new SpeechRecognition();


    fieldRecognition.lang =
        "ar-SA";

    fieldRecognition.continuous =
        false;

    fieldRecognition.interimResults =
        false;


    fieldRecognition.onresult =
        function (event) {

            let text =
                event.results[0][0]
                    .transcript
                    .trim();


            let input =
                document.getElementById(
                    inputId
                );


            if (input) {

                input.value =
                    text;

                input.focus();

                input.dispatchEvent(
                    new Event(
                        "input",
                        {
                            bubbles: true
                        }
                    )
                );
            }


            currentVoiceMode =
                "command";


            speakQuick(
                "تم كتابة " +
                fieldName +
                ".",
                function () {

                    if (
                        voiceSystemStarted
                    ) {

                        startListening();
                    }
                }
            );
        };


    fieldRecognition.onerror =
        function () {

            currentVoiceMode =
                "command";

            if (
                voiceSystemStarted
            ) {

                startListening();
            }
        };


    try {

        fieldRecognition.start();

    } catch (e) {

        console.log(
            "Manual recognition error:",
            e
        );

        currentVoiceMode =
            "command";

        startListening();
    }
}


/* =========================================
   الأساس النهائي للسكريبت
   تشغيل النظام + تنظيف الصفحة
========================================= */

(function initializeMobsarVoiceSystem() {

    console.log(
        "MOBSAR Voice System Loaded Successfully"
    );


    /*
       التأكد إن النظام يبدأ بالحالة الصحيحة
    */

    voiceSystemStarted = false;

    isListening = false;

    isSpeaking = false;

    currentVoiceMode = "command";


    /*
       لو الصفحة فيها زر المايك
       نجهزه بدون تشغيل المايك تلقائياً
       إلا بعد أول تفاعل
    */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            let btn =
                document.getElementById(
                    "commandMicBtn"
                );


            if (btn) {

                btn.setAttribute(
                    "aria-label",
                    "تشغيل الأوامر الصوتية"
                );
            }
        }
    );

})();


/* =========================================
   تنظيف النظام عند مغادرة الصفحة
========================================= */

window.addEventListener(
    "beforeunload",
    function () {

        voiceSystemStarted =
            false;

        isListening =
            false;

        isSpeaking =
            false;


        if (recognition) {

            try {
                recognition.stop();
            } catch (e) {}
        }


        if (
            window.speechSynthesis
        ) {

            window.speechSynthesis.cancel();
        }
    }
);

/* =========================================================
   تشغيل مبصر من أول ضغطة على الشاشة
   بدون الحاجة للضغط على زر المايك الرئيسي
   ========================================================= */

(function () {

    let screenVoiceStarted = false;

    function startFromFirstScreenClick(event) {

        // لو النظام اشتغل قبل كده، ما نعملش حاجة
        if (screenVoiceStarted || voiceSystemStarted) {
            return;
        }

        screenVoiceStarted = true;

        // إلغاء وظيفة زر المايك الرئيسي فقط
        const mainMic = document.getElementById("commandMicBtn");

        if (mainMic) {
            mainMic.onclick = function (e) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            };

            mainMic.disabled = true;
            mainMic.style.pointerEvents = "none";
            mainMic.style.opacity = "0.45";
        }

        // تشغيل نظام الصوت الموجود بالفعل عندنا
        if (typeof startVoiceSystem === "function") {
            startVoiceSystem();
        }

        // إزالة مستمع البداية بعد أول ضغطة
        document.removeEventListener("click", startFromFirstScreenClick, true);
        document.removeEventListener("touchstart", startFromFirstScreenClick, true);
    }

    // أول ضغطة في أي مكان في الشاشة
    document.addEventListener(
        "click",
        startFromFirstScreenClick,
        true
    );

    document.addEventListener(
        "touchstart",
        startFromFirstScreenClick,
        true
    );

})();

/* =========================================
   نهاية Part 2-B
========================================= */

</script>

</body>
</body>
</html>