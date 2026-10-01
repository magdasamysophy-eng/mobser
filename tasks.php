<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "mobsar_db";

$conn = new mysqli($host, $username_db, $password_db, $dbname);
$conn->set_charset("utf8");

$current_user_id = 1; 

// معالجة تغيير حالة المهمة إلى "منجزة"
if (isset($_GET['complete_id'])) {
    $complete_id = intval($_GET['complete_id']);
    $conn->query("UPDATE tasks SET task_status = 'منجزة' WHERE id = $complete_id AND user_id = $current_user_id");
    header("Location: tasks.php");
    exit();
}

// معالجة حذف مهمة
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM tasks WHERE id = $delete_id AND user_id = $current_user_id");
    header("Location: tasks.php");
    exit();
}

// معالجة إضافة مهمة جديدة
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task_btn'])) {
    $task_title = $conn->real_escape_string($_POST['task_title']);
    $task_status = $conn->real_escape_string($_POST['task_status']); 
    $sender_type = $conn->real_escape_string($_POST['sender_type']); 

    $sql = "INSERT INTO tasks (user_id, task_title, task_status, sender_type) VALUES ($current_user_id, '$task_title', '$task_status', '$sender_type')";
    $conn->query($sql);
    header("Location: tasks.php");
    exit();
}

// جلب المهام الخاصة بالمستخدم
$tasks_result = $conn->query("SELECT * FROM tasks WHERE user_id = $current_user_id ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - صفحة المهام </title>
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
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.15);
        }
        .home-back-btn:hover, .chat-nav-btn:hover { background: #d4af37; color: #000000; box-shadow: 0 0 25px rgba(212, 175, 55, 0.7); transform: translateY(-2px); }
        .hero-header { text-align: center; padding: 10px 20px 5px 20px; width: 100%; display: flex; flex-direction: column; align-items: center; }
        .mobsar-brand-wrapper { 
            display: inline-flex; flex-direction: column; align-items: center; position: relative; padding: 25px 50px; 
            border-radius: 50%;
            background: radial-gradient(circle, rgba(30, 10, 50, 0.9) 0%, rgba(5, 2, 10, 0.98) 80%);
            box-shadow: 0 0 50px rgba(138, 43, 226, 0.35), inset 0 0 25px rgba(212, 175, 55, 0.25);
            border: 1px solid rgba(212, 175, 55, 0.4);
            animation: magicGlow 3s infinite alternate;
        }
        @keyframes magicGlow {
            0% { box-shadow: 0 0 25px rgba(138, 43, 226, 0.3), inset 0 0 15px rgba(212, 175, 55, 0.15); border-color: rgba(212, 175, 55, 0.3); }
            100% { box-shadow: 0 0 60px rgba(212, 175, 55, 0.5), inset 0 0 30px rgba(138, 43, 226, 0.5); border-color: rgba(212, 175, 55, 0.8); }
        }
        .hero-eye-icon { font-size: 5.8rem; color: #d4af37; filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.7)); margin-bottom: -2px; animation: eyeFloat 2.5s infinite alternate; }
        @keyframes eyeFloat { from { transform: translateY(0) scale(1); } to { transform: translateY(-6px) scale(1.05); } }
        .big-mobsar-title { 
            font-family: 'Cinzel', serif; font-style: italic; font-weight: 800; font-size: 5.5rem; 
            background: linear-gradient(135deg, #ffffff, #d4af37, #b19cd9, #ffffff); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 6px; 
            transform: skewX(-8deg); filter: drop-shadow(0 0 20px rgba(138, 43, 226, 0.6));
        }
        .massive-glow-line {
            width: 400px; height: 3px;
            background: linear-gradient(90deg, transparent, #d4af37, #8a2be2, transparent);
            box-shadow: 0 0 25px #8a2be2, 0 0 15px #d4af37;
            margin: 20px auto 12px auto; border-radius: 50%;
        }
        .sub-title { font-size: 2.3rem; color: #d4af37; margin-top: 5px; font-weight: 700; text-shadow: 0 0 20px rgba(212, 175, 55, 0.5); }
        .global-command-mic-container { margin: 15px 0 10px 0; display: flex; flex-direction: column; align-items: center; gap: 12px; }
        .big-command-mic-btn {
            width: 80px; height: 80px; background: radial-gradient(circle, #1a0833 0%, #05010a 100%);
            border: 2px solid #d4af37; border-radius: 50%; color: #d4af37; font-size: 2rem; cursor: pointer;
            box-shadow: 0 0 30px rgba(138, 43, 226, 0.5), inset 0 0 15px rgba(212, 175, 55, 0.3);
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .big-command-mic-btn:hover { transform: scale(1.1); background: #260c4d; color: #fff; box-shadow: 0 0 40px rgba(212, 175, 55, 0.7); }
        .big-command-mic-btn.listening { background: #000; color: #ef4444; border-color: #ef4444; animation: bigMicPulse 0.5s infinite alternate; }
        @keyframes bigMicPulse { from { transform: scale(1); box-shadow: 0 0 20px #ef4444; } to { transform: scale(1.15); box-shadow: 0 0 40px #ef4444; } }
        .command-mic-label { font-size: 1.05rem; color: #c084fc; font-weight: 600; text-shadow: 0 0 10px rgba(138, 43, 226, 0.5); }
        .main-tasks-container { width: 90%; max-width: 1100px; display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-top: 15px; }
        @media(max-width: 768px) { .main-tasks-container { grid-template-columns: 1fr; } }
        .card-box {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 30px rgba(138, 43, 226, 0.15), inset 0 0 25px rgba(212, 175, 55, 0.08);
            transition: 0.3s;
        }
        .card-box:hover { border-color: rgba(212, 175, 55, 0.7); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.98), 0 0 40px rgba(212, 175, 55, 0.25); }
        .card-box h3 {
            color: #fff; font-size: 1.35rem; margin-bottom: 20px; text-align: right;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .form-group { margin-bottom: 18px; position: relative; }
        .form-group label { display: block; margin-bottom: 5px; color: #d4af37; font-weight: 600; font-size: 0.98rem; }
        .input-wrapper { position: relative; display: flex; align-items: center; }
        .form-control, .form-select {
            width: 100%; padding: 14px 45px 14px 18px; background: #000000;
            border: 1px solid rgba(212, 175, 55, 0.4); border-radius: 12px; color: #fff; font-size: 1.05rem; transition: 0.3s;
        }
        .form-select { padding-right: 18px; cursor: pointer; }
        .form-control:focus, .form-select:focus { outline: none; border-color: #d4af37; box-shadow: 0 0 20px rgba(212, 175, 55, 0.5), inset 0 0 10px rgba(138, 43, 226, 0.3); background: #05010a; }
        .field-mic-btn {
            position: absolute; right: 12px; background: #0a0314; border: 1px solid rgba(212,175,55,0.4); border-radius: 50%; width: 32px; height: 32px; color: #d4af37;
            font-size: 0.95rem; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center;
        }
        .field-mic-btn:hover { background: #d4af37; color: #000; transform: scale(1.15); box-shadow: 0 0 15px #d4af37; }
        .field-mic-btn.listening { color: #fff; background: #ef4444; border-color: #fff; animation: pulseMic 0.5s infinite; }
        .submit-task-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000000; border: none;
            width: 100%; padding: 14px; border-radius: 12px; font-weight: 700; font-size: 1.15rem; cursor: pointer;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3); transition: 0.3s; margin-top: 10px;
        }
        .submit-task-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); transform: scale(1.02); box-shadow: 0 0 25px rgba(212, 175, 55, 0.6); }
        .tasks-table-wrapper { width: 100%; overflow-x: auto; max-height: 330px; overflow-y: auto; }
        .tasks-table { width: 100%; border-collapse: collapse; text-align: right; }
        .tasks-table th { background: #0d041a; color: #d4af37; padding: 12px; font-size: 0.95rem; border-bottom: 2px solid rgba(212,175,55,0.4); position: sticky; top: 0; z-index: 10; }
        .tasks-table td { padding: 12px; border-bottom: 1px solid rgba(255,255,255,0.06); font-size: 0.95rem; color: #e5e7eb; vertical-align: middle; }
        .tasks-table tr:hover { background: rgba(212, 175, 55, 0.05); }
        .task-badge { padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; display: inline-block; }
        .badge-waiting { background: rgba(59, 130, 246, 0.2); color: #93c5fd; border: 1px solid #3b82f6; box-shadow: 0 0 10px rgba(59,130,246,0.2); }
        .badge-upcoming { background: rgba(212, 175, 55, 0.2); color: #fef08a; border: 1px solid #d4af37; box-shadow: 0 0 10px rgba(212,175,55,0.2); }
        .badge-done { background: rgba(34, 197, 94, 0.2); color: #86efac; border: 1px solid #22c55e; box-shadow: 0 0 10px rgba(34,197,94,0.2); }
        .badge-manager { background: rgba(139, 92, 246, 0.25); color: #e9d5ff; border: 1px solid #8b5cf6; font-size: 0.7rem; margin-bottom: 4px; display: block; width: fit-content; }
        .actions-cell { display: flex; gap: 8px; align-items: center; }
        .action-done-btn {
            background: rgba(34, 197, 94, 0.2); border: 1px solid #22c55e; color: #86efac;
            padding: 6px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 4px; transition: 0.3s;
        }
        .action-done-btn:hover { background: #22c55e; color: #000; box-shadow: 0 0 15px rgba(34,197,94,0.7); }
        .action-delete-btn {
            background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #fca5a5;
            padding: 6px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 4px; transition: 0.3s;
        }
        .action-delete-btn:hover { background: #ef4444; color: #fff; box-shadow: 0 0 15px rgba(239,68,68,0.7); }
        .chat-bridge-box {
            grid-column: span 2; background: radial-gradient(circle, rgba(30, 10, 50, 0.7) 0%, #030107 100%);
            border: 2px dashed rgba(212, 175, 55, 0.5); border-radius: 20px; padding: 20px; text-align: center;
            display: flex; flex-direction: column; align-items: center; gap: 12px; box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
        }
        .chat-bridge-box h4 { color: #fef08a; font-size: 1.3rem; font-weight: 700; text-shadow: 0 0 10px rgba(212,175,55,0.5); }
        .chat-bridge-box p { color: #d8b4fe; font-size: 1.05rem; }
        .global-voice-widget {
            position: fixed; bottom: 25px; left: 25px; background: rgba(5, 1, 10, 0.95);
            border: 2px solid #d4af37; padding: 14px 22px; border-radius: 35px; color: #d4af37; font-weight: 700;
            box-shadow: 0 0 30px rgba(138, 43, 226, 0.5); display: flex; align-items: center; gap: 12px; z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .global-voice-widget i { font-size: 1.4rem; color: #ef4444; animation: pulseMic 0.9s infinite; }
        @keyframes pulseMic { 0% { transform: scale(1); opacity: 0.7; } 50% { transform: scale(1.4); opacity: 1; } 100% { transform: scale(1); opacity: 0.7; } }
    </style>







</head>
<body>
    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseenter="speakQuick('العودة للصفحة الرئيسية')" onclick="goToHome(event)">
            <i class="fa-solid fa-house"></i> الصفحة الرئيسية
        </a>
        <a href="communication.php" class="chat-nav-btn" onmouseenter="speakQuick('الانتقال لصفحة التواصل')" onclick="goToCommunication(event)">
            <i class="fa-solid fa-comments"></i> صفحة التواصل <i class="fa-solid fa-bolt" style="color: #d4af37;"></i>
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick('صفحة المهام ')">صفحة المهام </div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onmouseenter="speakQuick('المساعد الصوتي لأوامر التنقل السريع')" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي سريع">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseenter="speakQuick('قل: وديني الصفحة الرئيسية، أو وديني صفحة التواصل')">اضغط وقل: وديني الصفحة الرئيسية أو وديني صفحة التواصل</span>
        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">مبصر يتألق وجاهز...</span>
    </div>

    <div class="main-tasks-container">
        
        <!-- صندوق إضافة مهمة جديدة -->
        <div class="card-box" onmouseenter="speakQuick('إضافة مهمة جديدة')">
            <h3 onmouseenter="speakQuick('إضافة مهمة جديدة')">إضافة مهمة جديدة <i class="fa-solid fa-plus-circle" style="color: #d4af37;"></i></h3>
            <form action="" method="POST" id="taskForm">
                <input type="hidden" name="sender_type" id="sender_type" value="شخصي">
                
                <div class="form-group">
                    <label onmouseenter="speakQuick('عنوان المهمة')"> المهمة و تفاصيلها</label>
                    <div class="input-wrapper">
                        <input type="text" name="task_title" id="task_title" class="form-control" required placeholder="اكتب اسم المهمة..." onfocus="speakQuick('عنوان المهمة')" onmouseenter="speakQuick('خانة عنوان المهمة')" data-label="عنوان المهمة">
                        <button type="button" class="field-mic-btn" id="mic_task_title" onmouseenter="speakQuick('زر إدخال صوتي لعنوان المهمة')" onclick="recordToField('task_title', 'عنوان المهمة')" title="سجل بصوتك"><i class="fa-solid fa-microphone"></i></button>
                    </div>
                </div>

                <div class="form-group">
                    <label onmouseenter="speakQuick('حالة المهمة')">حالة المهمة (انتظار / قادمة / منجزة)</label>
                    <div class="input-wrapper">
                        <select name="task_status" id="task_status" class="form-select" onfocus="speakQuick('حالة المهمة')" onmouseenter="speakQuick('قائمة اختيار حالة المهمة')">
                            <option value="انتظار">انتظار</option>
                            <option value="قادمة" selected>قادمة</option>
                            <option value="منجزة">منجزة</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="add_task_btn" class="submit-task-btn" onmouseenter="speakQuick('زر حفظ المهمة الجديدة')">حفظ المهمة في السجل</button>
            </form>
        </div>

        <!-- جدول المهام الحالية والمحفوظة -->
        <div class="card-box" onmouseenter="speakQuick('المهام المحفوظة والحالية')">
            <h3 onmouseenter="speakQuick('المهام المحفوظة والحالية')">المهام المحفوظة الحالية <i class="fa-solid fa-list-check" style="color: #d4af37;"></i></h3>
            <div class="tasks-table-wrapper" id="tasksListArea">
                <?php if ($tasks_result && $tasks_result->num_rows > 0): ?>
                    <table class="tasks-table">
                        <thead>
                            <tr>
                                <th>المهمة</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $tasks_result->fetch_assoc()): ?>
                                <tr>
                                    <td onmouseenter="speakQuick('مهمة: <?php echo $row['task_title']; ?>')">
                                        <?php if($row['sender_type'] == 'مدير'): ?>
                                            <span class="task-badge badge-manager"><i class="fa-solid fa-user-tie"></i> من المدير</span>
                                        <?php endif; ?>
                                        <strong><?php echo htmlspecialchars($row['task_title']); ?></strong>
                                    </td>
                                    <td>
                                        <?php 
                                            $st = $row['task_status'];
                                            $badge_class = 'badge-upcoming';
                                            if($st == 'انتظار') $badge_class = 'badge-waiting';
                                            elseif($st == 'منجزة') $badge_class = 'badge-done';
                                        ?>
                                        <span class="task-badge <?php echo $badge_class; ?>" onmouseenter="speakQuick('الحالة: <?php echo $st; ?>')">
                                            <?php echo htmlspecialchars($st); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            <?php if($st != 'منجزة'): ?>
                                                <a href="tasks.php?complete_id=<?php echo $row['id']; ?>" class="action-done-btn" onmouseenter="speakQuick('تم الإنجاز بنجاح')" title="تم الإنجاز بنجاح">
                                                    <i class="fa-solid fa-check"></i> إنجاز
                                                </a>
                                            <?php else: ?>
                                                <span style="color: #86efac; font-size: 0.8rem;"><i class="fa-solid fa-circle-check"></i> منجزة</span>
                                            <?php endif; ?>
                                            
                                            <a href="tasks.php?delete_id=<?php echo $row['id']; ?>" class="action-delete-btn" onmouseenter="speakQuick('حذف المهمة')" onclick="return confirm('هل أنت متأكد من حذف هذه المهمة؟');" title="حذف المهمة">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p style="text-align: center; color: #d8b4fe; padding: 30px;" onmouseenter="speakQuick('لا توجد مهام محفوظة حالياً')">لا توجد مهام محفوظة حالياً. أضف مهمتك الأولى الآن!</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- جسر التواصل الذكي -->
        <div class="chat-bridge-box" onmouseenter="speakQuick('صفحة التواصل')">
            <h4><i class="fa-solid fa-comments" style="color: #d4af37;"></i> صفحة التواصل</h4>
            <p>أي مهمة يرسلها المدير من صفحة التواصل ستظهر هنا فوراً في جدول المهام !</p>
            <a href="communication.php" class="home-back-btn" onmouseenter="speakQuick('فتح صفحة التواصل الآن')" onclick="goToCommunication(event)" style="background: #150529; border-color: #d4af37;">
                <i class="fa-solid fa-paper-plane"></i> الانتقال إلى صفحة التواصل
            </a>
        </div>

    </div>

<script>
(function () {

    // ==========================================
    // MOBSAR - TASKS VOICE
    // PART 1 / 3
    // ==========================================

    let recognition = null;
    let voiceStarted = false;
    let listening = false;
    let speaking = false;
    let voiceMode = "normal";

    let selectedTask = null;
    let lastTaskName = "";
    let lastMessage = "";

    // ------------------------------------------
    // تنظيف الكلام
    // ------------------------------------------

    function clean(text) {
        return String(text || "")
            .trim()
            .toLowerCase()
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .replace(/[؟?!.,،؛:]/g, "")
            .replace(/أ|إ|آ/g, "ا")
            .replace(/ة/g, "ه")
            .replace(/\s+/g, " ");
    }

    function has(text, words) {
        const value = clean(text);

        for (let i = 0; i < words.length; i++) {
            if (value.includes(clean(words[i]))) {
                return true;
            }
        }

        return false;
    }

    // ------------------------------------------
    // الصوت
    // ------------------------------------------

    function speak(text, callback) {

        if (!text) return;

        lastMessage = text;
        speaking = true;

        if (recognition && listening) {
            try {
                recognition.stop();
            } catch (e) {}
        }

        listening = false;

        try {
            speechSynthesis.cancel();
        } catch (e) {}

        const msg =
            new SpeechSynthesisUtterance(text);

        msg.lang = "ar-EG";
        msg.rate = 0.9;
        msg.pitch = 1;

        msg.onend = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            if (voiceStarted) {
                setTimeout(startListening, 350);
            }
        };

        msg.onerror = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            if (voiceStarted) {
                setTimeout(startListening, 350);
            }
        };

        speechSynthesis.speak(msg);
    }

    window.speakText = speak;
    window.speakQuick = speak;

    // ------------------------------------------
    // عناصر الصفحة
    // ------------------------------------------

    function taskInput() {
        return document.getElementById("task_title");
    }

    function taskStatus() {
        return document.getElementById("task_status");
    }

    function taskForm() {
        return document.getElementById("taskForm");
    }

    function saveButton() {

        const form = taskForm();

        if (!form) return null;

        return form.querySelector(
            'button[type="submit"], input[type="submit"], .submit-task-btn'
        );
    }

    // ------------------------------------------
    // Speech Recognition
    // ------------------------------------------

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (SpeechRecognition) {

        recognition = new SpeechRecognition();

        recognition.lang = "ar-EG";
        recognition.continuous = true;
        recognition.interimResults = false;
        recognition.maxAlternatives = 5;

        recognition.onstart = function () {

            listening = true;

            console.log(
                "MOBSAR: بدأ الاستماع"
            );

            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {
                status.textContent =
                    "أستمع إليك...";
            }
        };

        recognition.onresult = function (event) {

            for (
                let i = event.resultIndex;
                i < event.results.length;
                i++
            ) {

                if (
                    !event.results[i].isFinal
                ) {
                    continue;
                }

                const text =
                    event.results[i][0]
                        .transcript
                        .trim();

                if (!text) continue;

                console.log(
                    "MOBSAR SAID:",
                    text
                );

                handleVoiceCommand(text);
            }
        };

        recognition.onerror = function (event) {

            console.log(
                "MOBSAR VOICE ERROR:",
                event.error
            );

            listening = false;

            if (
                event.error === "not-allowed" ||
                event.error === "service-not-allowed"
            ) {

                voiceStarted = false;

                speak(
                    "يجب السماح للمتصفح باستخدام الميكروفون."
                );

                return;
            }

            if (voiceStarted && !speaking) {
                setTimeout(
                    startListening,
                    700
                );
            }
        };

        recognition.onend = function () {

            listening = false;

            console.log(
                "MOBSAR: انتهى الاستماع"
            );

            if (
                voiceStarted &&
                !speaking
            ) {

                setTimeout(
                    startListening,
                    500
                );
            }
        };
    }

    function startListening() {

        if (!recognition) return;

        if (!voiceStarted) return;

        if (listening) return;

        if (speaking) return;

        try {
            recognition.start();
        } catch (e) {
            console.log(
                "Recognition already running"
            );
        }
    }

    function startVoice() {

        voiceStarted = true;

        startListening();
    }

    window.startMobsarVoice = startVoice;
    window.runGlobalVoiceCommand = startVoice;

    // ------------------------------------------
    // إيقاف الصوت
    // ------------------------------------------

    function stopVoice() {

        voiceStarted = false;
        listening = false;

        try {
            recognition.stop();
        } catch (e) {}

        try {
            speechSynthesis.cancel();
        } catch (e) {}
    }

    window.stopMobsarVoice = stopVoice;

    // ------------------------------------------
    // قراءة جدول المهام
    // ------------------------------------------

    function getTasks() {

        const rows =
            document.querySelectorAll(
                ".tasks-table tbody tr"
            );

        const tasks = [];

        rows.forEach(function (row) {

            const nameElement =
                row.querySelector("strong");

            if (!nameElement) return;

            const statusElement =
                row.querySelector(".task-badge");

            const doneButton =
                row.querySelector(
                    ".action-done-btn"
                );

            const deleteButton =
                row.querySelector(
                    ".action-delete-btn"
                );

            tasks.push({

                name:
                    nameElement.textContent.trim(),

                status:
                    statusElement
                        ? statusElement.textContent.trim()
                        : "غير محددة",

                row: row,

                doneButton:
                    doneButton,

                deleteButton:
                    deleteButton
            });
        });

        return tasks;
    }

    function findTask(name) {

        const search = clean(name);

        if (!search) return null;

        const tasks = getTasks();

        // تطابق كامل
        for (let i = 0; i < tasks.length; i++) {

            if (
                clean(tasks[i].name) === search
            ) {
                return tasks[i];
            }
        }

        // تطابق جزئي
        for (let i = 0; i < tasks.length; i++) {

            const current =
                clean(tasks[i].name);

            if (
                current.includes(search) ||
                search.includes(current)
            ) {
                return tasks[i];
            }
        }

        return null;
    }

    // ------------------------------------------
    // بدء إضافة مهمة
    // ------------------------------------------

    function addTask() {

        const input = taskInput();

        if (!input) {

            speak(
                "لم أجد خانة كتابة اسم المهمة."
            );

            return;
        }

        voiceMode =
            "waiting_task_name";

        input.value = "";
        input.focus();

        speak(
            "حاضر. قولي اسم المهمة."
        );
    }

    // ------------------------------------------
    // استقبال اسم المهمة
    // ------------------------------------------

    function receiveTaskName(text) {

        const input = taskInput();

        if (!input) {

            voiceMode = "normal";

            speak(
                "لم أجد خانة اسم المهمة."
            );

            return;
        }

        const name = text.trim();

        if (!name) return;

        input.value = name;

        lastTaskName = name;

        voiceMode =
            "confirm_task_name";

        speak(
            "اسم المهمة هو " +
            name +
            ". هل هذا صحيح؟ قولي نعم أو لا."
        );
    }

    // ------------------------------------------
    // تأكيد الاسم
    // ------------------------------------------

    function confirmTaskName(text) {

        const value = clean(text);

        if (
            value === "نعم" ||
            value === "ايوه" ||
            value === "اه" ||
            value.includes("صحيح") ||
            value.includes("تمام")
        ) {

            voiceMode =
                "waiting_status";

            speak(
                "تمام. قولي حالة المهمة: انتظار، قادمة، أو منجزة."
            );

            return;
        }

        if (
            value === "لا" ||
            value === "لا مش صحيح" ||
            value.includes("غلط")
        ) {

            const input = taskInput();

            if (input) {
                input.value = "";
                input.focus();
            }

            voiceMode =
                "waiting_task_name";

            speak(
                "تمام. قولي اسم المهمة مرة أخرى."
            );

            return;
        }

        speak(
            "قولي نعم إذا كان الاسم صحيحًا، أو لا لإعادة الاسم."
        );
    }





// ==========================================
    // PART 2 / 3
    // ==========================================

    // ------------------------------------------
    // اختيار حالة المهمة
    // ------------------------------------------

    function chooseStatus(text) {

        const value = clean(text);

        let wanted = "";

        if (
            value.includes("انتظار") ||
            value.includes("منتظر")
        ) {

            wanted = "انتظار";

        } else if (
            value.includes("قادمه") ||
            value.includes("قادم") ||
            value.includes("جايه") ||
            value.includes("جاي")
        ) {

            wanted = "قادمة";

        } else if (
            value.includes("منجز") ||
            value.includes("منجزه") ||
            value.includes("مكتمل") ||
            value.includes("مكتمله") ||
            value.includes("خلص")
        ) {

            wanted = "منجزة";
        }

        if (!wanted) {

            speak(
                "لم أفهم الحالة. قولي انتظار، قادمة، أو منجزة."
            );

            return;
        }

        const select = taskStatus();

        if (!select) {

            speak(
                "لم أجد قائمة حالة المهمة."
            );

            voiceMode = "normal";

            return;
        }

        let found = false;

        for (
            let i = 0;
            i < select.options.length;
            i++
        ) {

            const option =
                select.options[i];

            const optionText =
                clean(option.textContent);

            const optionValue =
                clean(option.value);

            if (
                optionText.includes(
                    clean(wanted)
                ) ||
                optionValue.includes(
                    clean(wanted)
                )
            ) {

                select.selectedIndex = i;

                select.dispatchEvent(
                    new Event(
                        "change",
                        {
                            bubbles: true
                        }
                    )
                );

                found = true;

                break;
            }
        }

        if (!found) {

            speak(
                "لم أجد حالة " +
                wanted +
                " في القائمة."
            );

            return;
        }

        voiceMode =
            "save_confirmation";

        speak(
            "تم اختيار حالة " +
            wanted +
            ". هل تريدين حفظ المهمة؟"
        );
    }

    // ------------------------------------------
    // تأكيد الحفظ
    // ------------------------------------------

    function confirmSave(text) {

        const value = clean(text);

        if (
            value.includes("احفظ") ||
            value.includes("حفظ") ||
            value === "نعم" ||
            value === "ايوه" ||
            value === "اه" ||
            value.includes("تمام")
        ) {

            saveTask();

            return;
        }

        if (
            value === "لا" ||
            value.includes("الغاء") ||
            value.includes("مش عايز") ||
            value.includes("مش عايزه")
        ) {

            voiceMode = "normal";

            speak(
                "تمام، لم يتم حفظ المهمة."
            );

            return;
        }

        speak(
            "قولي احفظ المهمة أو قولي لا."
        );
    }

    // ------------------------------------------
    // حفظ المهمة
    // ------------------------------------------

    function saveTask() {

        const form = taskForm();
        const input = taskInput();

        if (!form) {

            speak(
                "لم أجد نموذج حفظ المهمة."
            );

            voiceMode = "normal";

            return;
        }

        if (
            !input ||
            !input.value.trim()
        ) {

            voiceMode =
                "waiting_task_name";

            speak(
                "لم يتم كتابة اسم المهمة. قولي اسم المهمة."
            );

            return;
        }

        voiceMode = "normal";

        speak(
            "تم الحفظ، جاري تسجيل المهمة."
        );

        setTimeout(function () {

            const button =
                saveButton();

            if (button) {

                button.click();

            } else {

                form.submit();
            }

        }, 500);
    }

    // ------------------------------------------
    // قراءة كل المهام
    // ------------------------------------------

    function readTasks() {

        const tasks = getTasks();

        if (!tasks.length) {

            speak(
                "لا توجد مهام محفوظة حاليًا."
            );

            return;
        }

        let message =
            "عندك " +
            tasks.length +
            " مهام محفوظة. ";

        tasks.forEach(function (task, index) {

            message +=
                "المهمة رقم " +
                (index + 1) +
                ": " +
                task.name +
                ". الحالة: " +
                task.status +
                ". ";
        });

        speak(message);
    }

    // ------------------------------------------
    // قراءة المهام غير المنجزة
    // ------------------------------------------

    function readUnfinished() {

        const tasks = getTasks();

        const unfinished =
            tasks.filter(function (task) {

                const status =
                    clean(task.status);

                return !(
                    status.includes("منجز") ||
                    status.includes("مكتمل") ||
                    status.includes("خلص")
                );
            });

        if (!unfinished.length) {

            speak(
                "لا توجد مهام غير منجزة."
            );

            return;
        }

        let message =
            "المهام غير المنجزة هي: ";

        unfinished.forEach(function (task) {

            message +=
                task.name +
                ". حالتها " +
                task.status +
                ". ";
        });

        speak(message);
    }

    // ------------------------------------------
    // حذف مهمة
    // ------------------------------------------

    function deleteTask(text) {

        let name = text
            .replace(/احذف/g, "")
            .replace(/المهمه/g, "")
            .replace(/المهمة/g, "")
            .trim();

        if (!name) {

            voiceMode =
                "waiting_delete_task";

            speak(
                "قولي اسم المهمة التي تريدين حذفها."
            );

            return;
        }

        const task =
            findTask(name);

        if (!task) {

            speak(
                "لم أجد مهمة بهذا الاسم."
            );

            return;
        }

        if (!task.deleteButton) {

            speak(
                "وجدت المهمة، لكن زر الحذف غير موجود."
            );

            return;
        }

        selectedTask = task;

        voiceMode =
            "delete_confirmation";

        speak(
            "وجدت مهمة " +
            task.name +
            ". هل تريدين حذفها؟"
        );
    }

    // ------------------------------------------
    // تأكيد الحذف
    // ------------------------------------------

    function confirmDelete(text) {

        const value = clean(text);

        if (
            value === "نعم" ||
            value === "ايوه" ||
            value === "اه" ||
            value.includes("تمام")
        ) {

            if (
                selectedTask &&
                selectedTask.deleteButton
            ) {

                const name =
                    selectedTask.name;

                speak(
                    "حاضر، جاري حذف مهمة " +
                    name,
                    function () {

                        selectedTask
                            .deleteButton
                            .click();

                        selectedTask = null;
                        voiceMode = "normal";
                    }
                );
            }

            return;
        }

        if (
            value === "لا" ||
            value.includes("الغاء")
        ) {

            selectedTask = null;

            voiceMode = "normal";

            speak(
                "تم إلغاء الحذف."
            );

            return;
        }

        speak(
            "قولي نعم للحذف أو لا للإلغاء."
        );
    }

    // ------------------------------------------
    // إنجاز مهمة
    // ------------------------------------------

    function completeTask(text) {

        let name = text
            .replace(/انجز/g, "")
            .replace(/أنجز/g, "")
            .replace(/المهمه/g, "")
            .replace(/المهمة/g, "")
            .trim();

        if (!name) {

            voiceMode =
                "waiting_complete_task";

            speak(
                "قولي اسم المهمة التي تريدين إنجازها."
            );

            return;
        }

        const task =
            findTask(name);

        if (!task) {

            speak(
                "لم أجد هذه المهمة."
            );

            return;
        }

        if (!task.doneButton) {

            speak(
                "وجدت المهمة، لكن زر الإنجاز غير موجود."
            );

            return;
        }

        selectedTask = task;

        voiceMode =
            "complete_confirmation";

        speak(
            "وجدت مهمة " +
            task.name +
            ". هل تريدين تحويلها إلى منجزة؟"
        );
    }

    // ------------------------------------------
    // تأكيد الإنجاز
    // ------------------------------------------

    function confirmComplete(text) {

        const value = clean(text);

        if (
            value === "نعم" ||
            value === "ايوه" ||
            value === "اه" ||
            value.includes("تمام")
        ) {

            if (
                selectedTask &&
                selectedTask.doneButton
            ) {

                const name =
                    selectedTask.name;

                speak(
                    "تم إنجاز مهمة " +
                    name,
                    function () {

                        selectedTask
                            .doneButton
                            .click();

                        selectedTask = null;

                        voiceMode =
                            "normal";
                    }
                );
            }

            return;
        }

        if (
            value === "لا" ||
            value.includes("الغاء")
        ) {

            selectedTask = null;

            voiceMode = "normal";

            speak(
                "تم إلغاء الأمر."
            );

            return;
        }

        speak(
            "قولي نعم للتأكيد أو لا للإلغاء."
        );
    }

    // ------------------------------------------
    // تكرار
    // ------------------------------------------

    function repeatLast() {

        if (lastMessage) {

            speak(lastMessage);

            return;
        }

        if (lastTaskName) {

            speak(
                "اسم المهمة هو " +
                lastTaskName
            );

            return;
        }

        speak(
            "لا يوجد شيء أعيده."
        );
    }

    // ------------------------------------------
    // الصفحة دي بتاعت إيه؟
    // ------------------------------------------

    function whatPage() {

        speak(
            "أنت الآن في صفحة المهام في مبصر. من هنا يمكنك إضافة المهام وحفظها وقراءة المهام وتعديلها وإنجازها وحذفها."
        );
    }

    // ------------------------------------------
    // الأوامر
    // ------------------------------------------

    function commands() {

        speak(
            "يمكنك أن تقولي: أضف مهمة، إضافة مهمة جديدة، اكتب مهمة، أضف مهمة جديدة، اقرأ المهام، اقرأ جدول المهام، ما هي المهام، احفظ المهمة، احذف المهمة، أنجز المهمة، كرر، أو قولي الصفحة دي بتاعت إيه."
        );
    }
    // ==========================================
    // PART 3 / 3
    // ==========================================

    // ------------------------------------------
    // التنقل
    // ------------------------------------------

    function goTo(page, name) {

        voiceMode = "normal";

        speak(
            "حاضر، جارٍ الانتقال إلى " + name,
            function () {

                setTimeout(function () {

                    window.location.href =
                        page;

                }, 400);
            }
        );
    }

    function navigation(text) {

        const value = clean(text);

        if (
            has(value, [
                "الرئيسيه",
                "الصفحه الرئيسيه",
                "الصفحة الرئيسية",
                "الرئيسية"
            ])
        ) {

            goTo(
                "index.php",
                "الصفحة الرئيسية"
            );

            return true;
        }

        if (
            has(value, [
                "التسجيل",
                "صفحه التسجيل",
                "صفحة التسجيل",
                "انشاء حساب",
                "إنشاء حساب"
            ])
        ) {

            goTo(
                "register.php",
                "صفحة التسجيل"
            );

            return true;
        }

        if (
            has(value, [
                "التقييم",
                "الإنجازات",
                "الانجازات"
            ])
        ) {

            goTo(
                "evaluation.php",
                "صفحة التقييم والإنجازات"
            );

            return true;
        }

        if (
            has(value, [
                "التقويم",
                "المواعيد",
                "الأخبار",
                "الاخبار",
                "الجدول"
            ])
        ) {

            goTo(
                "schedule.php",
                "صفحة التقويم والمواعيد والأخبار"
            );

            return true;
        }

        if (
            has(value, [
                "الموظفين",
                "الموظفين والمدير",
                "المدير والموظفين"
            ])
        ) {

            goTo(
                "employees.php",
                "صفحة الموظفين والمدير"
            );

            return true;
        }

        if (
            has(value, [
                "الروحانيات",
                "صفحة الروحانيات"
            ])
        ) {

            goTo(
                "team.php",
                "صفحة الروحانيات"
            );

            return true;
        }

        if (
            has(value, [
                "الاعدادات",
                "الإعدادات",
                "صفحه الاعدادات"
            ])
        ) {

            goTo(
                "settings.php",
                "صفحة الإعدادات"
            );

            return true;
        }

        return false;
    }

    // ------------------------------------------
    // الأمر الرئيسي
    // ------------------------------------------

    function handleVoiceCommand(text) {

        if (!text) return;

        const value = clean(text);

        console.log(
            "MOBSAR COMMAND = ",
            text
        );

        // ======================================
        // أوضاع الحوار
        // ======================================

        if (
            voiceMode ===
            "waiting_task_name"
        ) {

            receiveTaskName(text);

            return;
        }

        if (
            voiceMode ===
            "confirm_task_name"
        ) {

            confirmTaskName(text);

            return;
        }

        if (
            voiceMode ===
            "waiting_status"
        ) {

            chooseStatus(text);

            return;
        }

        if (
            voiceMode ===
            "save_confirmation"
        ) {

            confirmSave(text);

            return;
        }

        if (
            voiceMode ===
            "waiting_delete_task"
        ) {

            deleteTask(text);

            return;
        }

        if (
            voiceMode ===
            "delete_confirmation"
        ) {

            confirmDelete(text);

            return;
        }

        if (
            voiceMode ===
            "waiting_complete_task"
        ) {

            completeTask(text);

            return;
        }

        if (
            voiceMode ===
            "complete_confirmation"
        ) {

            confirmComplete(text);

            return;
        }

        // ======================================
        // إضافة مهمة
        // ======================================

        if (
            (
                value.includes("مهمه") ||
                value.includes("مهمة")
            ) &&
            (
                value.includes("اضف") ||
                value.includes("اضافه") ||
                value.includes("اكتب") ||
                value.includes("جديده") ||
                value.includes("عايز") ||
                value.includes("عايزه") ||
                value.includes("عايزين")
            )
        ) {

            addTask();

            return;
        }

        if (
            value === "اضف مهمه" ||
            value === "اضف مهمة" ||
            value === "مهمه جديده" ||
            value === "مهمة جديدة" ||
            value === "اكتب مهمه" ||
            value === "اكتب مهمة"
        ) {

            addTask();

            return;
        }

        // ======================================
        // قراءة المهام
        // ======================================

        if (
            has(value, [
                "اقرالي المهام",
                "اقرألي المهام",
                "اقرا المهام",
                "اقرأ المهام",
                "اقرالي جدول المهام",
                "اقرألي جدول المهام",
                "اقرا جدول المهام",
                "اقرأ جدول المهام",
                "ايه هي المهام",
                "ايه المهام",
                "ما هي المهام",
                "المهام المحفوظه",
                "المهام المحفوظة",
                "المهام الموجوده",
                "المهام الموجودة"
            ])
        ) {

            readTasks();

            return;
        }

        // ======================================
        // المهام غير المنجزة
        // ======================================

        if (
            has(value, [
                "المهام غير المنجزة",
                "المهام الغير منجزة",
                "المهام اللي لسه",
                "المهام المتبقيه",
                "المهام المتبقية"
            ])
        ) {

            readUnfinished();

            return;
        }

        // ======================================
        // احفظ
        // ======================================

        if (
            has(value, [
                "احفظ المهمة",
                "احفظ المهمه",
                "حفظ المهمة",
                "حفظ المهمه",
                "احفظها"
            ])
        ) {

            saveTask();

            return;
        }

        // ======================================
        // حذف
        // ======================================

        if (
            has(value, [
                "احذف المهمة",
                "احذف المهمه",
                "حذف المهمة",
                "حذف المهمه"
            ])
        ) {

            deleteTask(text);

            return;
        }

        // ======================================
        // إنجاز
        // ======================================

        if (
            has(value, [
                "انجز المهمة",
                "أنجز المهمة",
                "انجز المهمه",
                "أنجز المهمه",
                "انجاز المهمة",
                "إنجاز المهمة"
            ])
        ) {

            completeTask(text);

            return;
        }

        // ======================================
        // تكرار
        // ======================================

        if (
            has(value, [
                "كرر",
                "عيد",
                "اعيد",
                "أعيد",
                "كرر الكلام",
                "كرر الكلام تاني"
            ])
        ) {

            repeatLast();

            return;
        }

        // ======================================
        // الصفحة دي بتاعت إيه؟
        // ======================================

        if (
            has(value, [
                "الصفحه دي بتاعت ايه",
                "الصفحة دي بتاعت إيه",
                "دي صفحه ايه",
                "دي صفحة ايه",
                "انا فين",
                "أنا فين",
                "اين انا",
                "أين أنا",
                "ايه الصفحه دي",
                "ما هي الصفحة"
            ])
        ) {

            whatPage();

            return;
        }

        // ======================================
        // الأوامر
        // ======================================

        if (
            has(value, [
                "ايه الاوامر",
                "إيه الأوامر",
                "ما هي الاوامر",
                "ما هي الأوامر",
                "الاوامر",
                "الأوامر",
                "قولي الاوامر",
                "قولى الاوامر"
            ])
        ) {

            commands();

            return;
        }

        // ======================================
        // التنقل
        // ======================================

        if (navigation(text)) {
            return;
        }

        // ======================================
        // لم أفهم
        // ======================================

        speak(
            "لم أفهم الأمر. يمكنك أن تقولي أضف مهمة، اقرأ المهام، احفظ المهمة، احذف المهمة، أنجز المهمة، أو قولي إيه الأوامر."
        );
    }

    // ------------------------------------------
    // جعل الأمر متاحًا للصفحات الأخرى
    // ------------------------------------------

    window.mobsarVoiceCommand =
        handleVoiceCommand;

    // ------------------------------------------
    // أول ضغطة
    // ------------------------------------------

    let startedByClick = false;

    document.addEventListener(
        "click",
        function () {

            if (startedByClick) return;

            startedByClick = true;

            if (!voiceStarted) {

                voiceStarted = true;

                speak(
                    "مرحبًا بك في مبصر. أنت الآن في صفحة المهام. يمكنك أن تقولي أضف مهمة."
                );
            }

        },
        {
            once: true
        }
    );

    // ------------------------------------------
    // زر الميكروفون لو موجود
    // ------------------------------------------

    const mic =
        document.getElementById(
            "commandMicBtn"
        );

    if (mic) {

        mic.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

                voiceStarted = true;

                startListening();
            }
        );
    }

    // ------------------------------------------
    // جاهزية الصفحة
    // ------------------------------------------

    window.addEventListener(
        "load",
        function () {

            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {

                status.textContent =
                    "الصوت جاهز";
            }

            console.log(
                "MOBSAR TASKS VOICE READY"
            );
        }
    );

})();
</script>
  
</body>
</body>
</html>