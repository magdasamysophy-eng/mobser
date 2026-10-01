<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "mobsar_db";

$current_user_id = 1;

$waiting_count = 0;
$upcoming_count = 0;
$completed_count = 0;
$tasks_list = [];

$conn = new mysqli($host, $username_db, $password_db, $dbname);
if (!$conn->connect_error) {
    $conn->set_charset("utf8");

    $res = $conn->query("SELECT COUNT(*) as cnt FROM tasks WHERE user_id = $current_user_id AND task_status = 'انتظار'");
    if ($res) { $waiting_count = $res->fetch_assoc()['cnt']; }

    $res = $conn->query("SELECT COUNT(*) as cnt FROM tasks WHERE user_id = $current_user_id AND task_status = 'قادمة'");
    if ($res) { $upcoming_count = $res->fetch_assoc()['cnt']; }

    $res = $conn->query("SELECT COUNT(*) as cnt FROM tasks WHERE user_id = $current_user_id AND task_status = 'منجزة'");
    if ($res) { $completed_count = $res->fetch_assoc()['cnt']; }

    $tasks_result = $conn->query("SELECT * FROM tasks WHERE user_id = $current_user_id ORDER BY id DESC");
    if ($tasks_result) {
        while ($row = $tasks_result->fetch_assoc()) {
            $tasks_list[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - القييم والإنجازات </title>
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

        .evolution-layout-container { width: 90%; max-width: 1100px; margin-top: 20px; display: flex; flex-direction: column; gap: 25px; }
        
        .stats-cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .stat-card {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 30px rgba(138, 43, 226, 0.15); display: flex; align-items: center; justify-content: space-between;
            transition: 0.3s;
        }
        .stat-card:hover { border-color: rgba(212, 175, 55, 0.7); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.98), 0 0 40px rgba(212, 175, 55, 0.25); transform: translateY(-3px); }
        .stat-info h3 { font-size: 1.1rem; color: #d4af37; margin-bottom: 8px; font-weight: 600; }
        .stat-info .stat-number { font-size: 2.8rem; font-weight: 900; color: #ffffff; text-shadow: 0 0 15px rgba(212, 175, 55, 0.5); }
        .stat-icon-box {
            width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 2rem; background: radial-gradient(circle, #1a0833 0%, #05010a 100%); border: 1px solid #d4af37; color: #d4af37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        }

        .voice-query-card {
            background: radial-gradient(circle, rgba(30, 10, 50, 0.7) 0%, #030107 100%);
            border: 2px dashed rgba(212, 175, 55, 0.5); border-radius: 22px; padding: 25px; text-align: center;
            display: flex; flex-direction: column; align-items: center; gap: 12px; box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
        }
        .voice-query-card h4 { color: #fef08a; font-size: 1.35rem; font-weight: 700; text-shadow: 0 0 10px rgba(212,175,55,0.5); }
        .voice-query-card p { color: #d8b4fe; font-size: 1.05rem; }
        .query-mic-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000000; border: none;
            padding: 12px 30px; border-radius: 14px; font-weight: 700; font-size: 1.1rem; cursor: pointer;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3); transition: 0.3s; display: inline-flex; align-items: center; gap: 10px;
        }
        .query-mic-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); transform: scale(1.05); box-shadow: 0 0 25px rgba(212, 175, 55, 0.6); }

        .stream-section-wrapper {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95);
        }
        .section-header-title {
            font-size: 1.35rem; color: #d4af37; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 12px; font-weight: 700;
        }
        .tasks-stream-list { display: flex; flex-direction: column; gap: 12px; max-height: 400px; overflow-y: auto; }
        .stream-item {
            background: #000000; border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 14px; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center;
            transition: 0.2s;
        }
        .stream-item:hover { border-color: #d4af37; background: rgba(212, 175, 55, 0.04); }
        .stream-item-content h4 { color: #fff; font-size: 1.1rem; margin-bottom: 4px; font-weight: 700; }
        .stream-item-content p { color: #d8b4fe; font-size: 0.9rem; }
        
        .badge-status { padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; }
        .badge-waiting { background: rgba(59, 130, 246, 0.2); color: #93c5fd; border: 1px solid #3b82f6; }
        .badge-upcoming { background: rgba(212, 175, 55, 0.2); color: #fef08a; border: 1px solid #d4af37; }
        .badge-completed { background: rgba(34, 197, 94, 0.2); color: #86efac; border: 1px solid #22c55e; }

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
        <a href="tasks.php" class="chat-nav-btn" onmouseenter="speakQuick('الانتقال لصفحة المهام')" onclick="goToTasks(event)">
            <i class="fa-solid fa-list-check"></i> صفحة المهام <i class="fa-solid fa-bolt" style="color: #d4af37;"></i>
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick(' التقييم والانجازات')">االتقييم
            لإنجازات  </div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onmouseenter="speakQuick('المساعد الصوتي لأوامر التنقل السريع')" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي سريع">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseenter="speakQuick('اضغط وقل: وديني الصفحة الرئيسية')">اضغط وقل: (وديني الصفحة الرئيسية)</span>
        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">صفحة الإنجازات جاهزة ومضيئة بالكامل...</span>
    </div>

    <div class="evolution-layout-container">
        
        <div class="stats-cards-grid">
            <div class="stat-card" onmouseenter="speakQuick('مهام قيد الانتظار: <?php echo $waiting_count; ?>')">
                <div class="stat-info">
                    <h3>قيد الانتظار</h3>
                    <div class="stat-number"><?php echo $waiting_count; ?></div>
                </div>
                <div class="stat-icon-box"><i class="fa-solid fa-clock-rotate-left"></i></div>
            </div>

            <div class="stat-card" onmouseenter="speakQuick('مهام قادمة: <?php echo $upcoming_count; ?>')">
                <div class="stat-info">
                    <h3>مهام قادمة</h3>
                    <div class="stat-number"><?php echo $upcoming_count; ?></div>
                </div>
                <div class="stat-icon-box"><i class="fa-solid fa-calendar-days"></i></div>
            </div>

            <div class="stat-card" onmouseenter="speakQuick('مهام منجزة: <?php echo $completed_count; ?>')">
                <div class="stat-info">
                    <h3>مهام منجزة</h3>
                    <div class="stat-number"><?php echo $completed_count; ?></div>
                </div>
                <div class="stat-icon-box"><i class="fa-solid fa-circle-check"></i></div>
            </div>
        </div>

        <div class="voice-query-card" onmouseenter="speakQuick('اسأل المساعد عن مهام الأسبوع أو الشهر أو السنة')">
            <h4 onmouseenter="speakQuick('المساعد الصوتي الذكي للفترات الزمنية')"><i class="fa-solid fa-wand-magic-sparkles"></i> المساعد الصوتي الذكي للفترات الزمنية</h4>
            <p onmouseenter="speakQuick('اضغط الميكروفون وقل: مهام الأسبوع، مهام الشهر، أو مهام السنة')">اضغط الميكروفون وقل: (مهام الأسبوع)، (مهام الشهر)، أو (مهام السنة) ليتم الرد عليك صوتياً وتلخيصها!</p>
            <button type="button" class="query-mic-btn" id="queryMicBtn" onclick="runPeriodVoiceQuery()">
                <i class="fa-solid fa-microphone"></i> اسأل عن المهام بالفترة الزمنية
            </button>
        </div>

        <div class="stream-section-wrapper">
            <div class="section-header-title" onmouseenter="speakQuick('جميع المهام والإنجازات المسجلة')">
                <i class="fa-solid fa-chart-line"></i> جميع المهام والإنجازات الخاصة بكِ (<?php echo count($tasks_list); ?> مهمة مسجلة)
            </div>
            <div class="tasks-stream-list">
                <?php if (!empty($tasks_list)): ?>
                    <?php foreach ($tasks_list as $task): ?>
                        <div class="stream-item">
                            <div class="stream-item-content">
                                <h4 onmouseenter="speakQuick('مهمة: <?php echo htmlspecialchars($task['task_title']); ?>')"><?php echo htmlspecialchars($task['task_title']); ?></h4>
                                <p><?php echo isset($task['sender_type']) && $task['sender_type'] == 'مدير' ? 'مهمة مرسلة من الإدارة' : 'مهمة مسجلة شخصياً'; ?></p>
                            </div>
                            <div>
                                <?php if ($task['task_status'] === 'انتظار'): ?>
                                    <span class="badge-status badge-waiting"><i class="fa-solid fa-clock"></i> انتظار</span>
                                <?php elseif ($task['task_status'] === 'قادمة'): ?>
                                    <span class="badge-status badge-upcoming"><i class="fa-solid fa-calendar"></i> قادمة</span>
                                <?php else: ?>
                                    <span class="badge-status badge-completed"><i class="fa-solid fa-check"></i> منجزة</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; color: #a78bfa; padding: 25px;">لا توجد مهام مسجلة حالياً.</div>
                <?php endif; ?>
            </div>
        </div>

    </div>
    
<script>
(function () {

    // ==========================================
    // MOBSAR - EVALUATION / ACHIEVEMENTS VOICE
    // PART 1 / 3
    // ==========================================

    let recognition = null;
    let voiceStarted = false;
    let listening = false;
    let speaking = false;
    let restarting = false;

    let lastMessage = "";

    // ==========================================
    // تنظيف الكلام
    // ==========================================

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

    // ==========================================
    // الكلام
    // ==========================================

    function speakQuick(text, afterSpeak) {

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
            window.speechSynthesis.cancel();
        } catch (e) {}

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-SA";
        utterance.rate = 1.0;
        utterance.pitch = 1;

        const statusEl =
            document.getElementById(
                "voiceStatusText"
            );

        if (statusEl) {
            statusEl.innerText = text;
        }

        utterance.onend = function () {

            speaking = false;

            if (
                typeof afterSpeak ===
                "function"
            ) {
                afterSpeak();
            }

            if (voiceStarted) {
                setTimeout(
                    startListening,
                    400
                );
            }
        };

        utterance.onerror = function () {

            speaking = false;

            if (
                typeof afterSpeak ===
                "function"
            ) {
                afterSpeak();
            }

            if (voiceStarted) {
                setTimeout(
                    startListening,
                    400
                );
            }
        };

        window.speechSynthesis.speak(
            utterance
        );
    }

    window.speakQuick = speakQuick;
    window.speakText = speakQuick;

    // ==========================================
    // التعرف على الصوت
    // ==========================================

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (SpeechRecognition) {

        recognition =
            new SpeechRecognition();

        recognition.lang = "ar-SA";
        recognition.continuous = true;
        recognition.interimResults = false;
        recognition.maxAlternatives = 5;

        recognition.onstart = function () {

            listening = true;
            restarting = false;

            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {
                status.innerText =
                    "أستمع إليك...";
            }

            console.log(
                "MOBSAR EVALUATION: LISTENING"
            );
        };

        recognition.onresult =
            function (event) {

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
                        "MOBSAR EVALUATION COMMAND:",
                        text
                    );

                    handleVoiceCommand(text);
                }
            };

        recognition.onerror =
            function (event) {

                console.log(
                    "VOICE ERROR:",
                    event.error
                );

                listening = false;

                if (
                    event.error ===
                        "not-allowed" ||
                    event.error ===
                        "service-not-allowed"
                ) {

                    voiceStarted = false;

                    speakQuick(
                        "يجب السماح للمتصفح باستخدام الميكروفون."
                    );

                    return;
                }

                if (
                    voiceStarted &&
                    !speaking
                ) {

                    restartListening();
                }
            };

        recognition.onend =
            function () {

                listening = false;

                console.log(
                    "MOBSAR EVALUATION: END"
                );

                if (
                    voiceStarted &&
                    !speaking
                ) {

                    restartListening();
                }
            };
    }

    // ==========================================
    // بدء الاستماع
    // ==========================================

    function startListening() {

        if (!recognition) return;

        if (!voiceStarted) return;

        if (listening) return;

        if (speaking) return;

        try {

            recognition.start();

        } catch (e) {

            console.log(
                "Recognition already active"
            );
        }
    }

    function restartListening() {

        if (!voiceStarted) return;

        if (listening) return;

        if (speaking) return;

        if (restarting) return;

        restarting = true;

        setTimeout(function () {

            restarting = false;

            startListening();

        }, 700);
    }

    function startVoiceSystem() {

        voiceStarted = true;

        startListening();
    }

    window.startMobsarVoice =
        startVoiceSystem;

    window.runGlobalVoiceCommand =
        startVoiceSystem;

    // ==========================================
    // إيقاف النظام
    // ==========================================

    function stopVoiceSystem() {

        voiceStarted = false;
        listening = false;
        restarting = false;

        try {
            if (recognition) {
                recognition.stop();
            }
        } catch (e) {}

        try {
            window.speechSynthesis.cancel();
        } catch (e) {}
    }

    window.stopMobsarVoice =
        stopVoiceSystem;

    // ==========================================
    // قراءة النصوص الموجودة في الصفحة
    // ==========================================

    function getPageTexts() {

        const elements =
            document.querySelectorAll(
                ".achievement-card, " +
                ".achievement, " +
                ".evaluation-card, " +
                ".stat-card, " +
                ".card"
            );

        const result = [];

        elements.forEach(function (element) {

            const text =
                element.innerText.trim();

            if (
                text &&
                text.length < 500
            ) {
                result.push(text);
            }
        });

        return result;
    }

    // ==========================================
    // استخراج الأرقام من كرو الإنجازات
    // ==========================================

    function getAchievementNumbers() {

        const cards =
            document.querySelectorAll(
                ".achievement-card, " +
                ".achievement, " +
                ".evaluation-card, " +
                ".stat-card"
            );

        const data = [];

        cards.forEach(function (card) {

            const text =
                card.innerText.trim();

            if (!text) return;

            const numbers =
                text.match(/\d+/g);

            data.push({

                text: text,

                numbers:
                    numbers || []
            });
        });

        return data;
    }

    // ==========================================
    // قراءة الإنجازات
    // ==========================================

    function readAchievements() {

        const cards =
            getPageTexts();

        if (!cards.length) {

            speakQuick(
                "لا توجد بيانات إنجازات ظاهرة حاليًا في الصفحة."
            );

            return;
        }

        let message =
            "إليك الإنجازات الموجودة في صفحة تقييم الإنجازات. ";

        cards.forEach(function (text, index) {

            message +=
                "الإنجاز رقم " +
                (index + 1) +
                ": " +
                text +
                ". ";
        });

        speakQuick(message);
    }

    // ==========================================
    // قراءة مهام معينة من الصفحة
    // ==========================================

    function readByKeyword(keywords, emptyMessage) {

        const elements =
            document.querySelectorAll(
                ".achievement-card, " +
                ".achievement, " +
                ".evaluation-card, " +
                ".stat-card, " +
                ".card, " +
                "tr"
            );

        const found = [];

        elements.forEach(function (element) {

            const text =
                element.innerText.trim();

            if (!text) return;

            const value = clean(text);

            for (
                let i = 0;
                i < keywords.length;
                i++
            ) {

                if (
                    value.includes(
                        clean(keywords[i])
                    )
                ) {

                    if (
                        !found.includes(text)
                    ) {
                        found.push(text);
                    }

                    break;
                }
            }
        });

        if (!found.length) {

            speakQuick(emptyMessage);

            return;
        }

        let message = "";

        found.forEach(function (item) {

            message += item + ". ";
        });

        speakQuick(message);
    }
    // ==========================================
    // PART 2 / 3
    // ==========================================

    // ==========================================
    // مهام الأسبوع
    // ==========================================

    function readWeekTasks() {

        readByKeyword(
            [
                "مهام الاسبوع",
                "مهام الأسبوع",
                "اسبوع",
                "الأسبوع"
            ],
            "لا توجد بيانات ظاهرة عن مهام الأسبوع."
        );
    }

    // ==========================================
    // مهام الشهر
    // ==========================================

    function readMonthTasks() {

        readByKeyword(
            [
                "مهام الشهر",
                "الشهر",
                "شهر"
            ],
            "لا توجد بيانات ظاهرة عن مهام الشهر."
        );
    }

    // ==========================================
    // مهام السنة
    // ==========================================

    function readYearTasks() {

        readByKeyword(
            [
                "مهام السنة",
                "مهام العام",
                "السنة",
                "العام"
            ],
            "لا توجد بيانات ظاهرة عن مهام السنة."
        );
    }

    // ==========================================
    // قيد الانتظار
    // ==========================================

    function readWaitingTasks() {

        readByKeyword(
            [
                "قيد الانتظار",
                "انتظار",
                "منتظرة",
                "منتظر"
            ],
            "عدد المهام قيد الانتظار صفر."
        );
    }

    // ==========================================
    // المهام القادمة
    // ==========================================

    function readComingTasks() {

        readByKeyword(
            [
                "مهام قادمة",
                "قادمة",
                "قادم",
                "جاية",
                "جايه"
            ],
            "عدد المهام القادمة صفر."
        );
    }

    // ==========================================
    // المهام المنجزة
    // ==========================================

    function readCompletedTasks() {

        readByKeyword(
            [
                "مهام منجزة",
                "منجزة",
                "منجز",
                "مكتملة",
                "مكتمل"
            ],
            "عدد المهام المنجزة صفر."
        );
    }

    // ==========================================
    // جميع المهام
    // ==========================================

    function readAllTasks() {

        const rows =
            document.querySelectorAll(
                "table tbody tr"
            );

        const cards =
            document.querySelectorAll(
                ".task-card, " +
                ".achievement-card, " +
                ".achievement, " +
                ".evaluation-card"
            );

        const items = [];

        rows.forEach(function (row) {

            const text =
                row.innerText.trim();

            if (
                text &&
                !items.includes(text)
            ) {
                items.push(text);
            }
        });

        cards.forEach(function (card) {

            const text =
                card.innerText.trim();

            if (
                text &&
                !items.includes(text)
            ) {
                items.push(text);
            }
        });

        if (!items.length) {

            speakQuick(
                "لا توجد مهام ظاهرة حاليًا."
            );

            return;
        }

        let message =
            "جميع المهام الموجودة لديك هي: ";

        items.forEach(function (item, index) {

            message +=
                "المهمة رقم " +
                (index + 1) +
                ": " +
                item +
                ". ";
        });

        speakQuick(message);
    }

    // ==========================================
    // الصفحة بتاعت إيه؟
    // ==========================================

    function whatPage() {

        speakQuick(
            "أنت الآن في صفحة تقييم الإنجازات. هذه الصفحة تعرض إنجازاتك وإحصائيات المهام وحالات المهام."
        );
    }

    // ==========================================
    // الأوامر
    // ==========================================

    function readCommands() {

        speakQuick(
            "يمكنك أن تقولي: اقرألي الإنجازات، ما هي الإنجازات، اقرألي كل المهام، مهام الأسبوع، مهام الشهر، مهام السنة، المهام قيد الانتظار، المهام القادمة، المهام المنجزة، أو قولي وديني للصفحة الرئيسية أو وديني لصفحة المهام أو أي صفحة أخرى."
        );
    }

    // ==========================================
    // تكرار آخر رد
    // ==========================================

    function repeatLast() {

        if (lastMessage) {

            speakQuick(lastMessage);

        } else {

            speakQuick(
                "لا يوجد رد سابق لأكرره."
            );
        }
    }

    // ==========================================
    // الانتقال بين الصفحات
    // ==========================================

    function navigateTo(page, name) {

        speakQuick(
            "حاضر، جارٍ الانتقال إلى " +
            name,
            function () {

                setTimeout(function () {

                    window.location.href =
                        page;

                }, 400);
            }
        );
    }

    function handleNavigation(text) {

        const value = clean(text);

        // --------------------------------------
        // الرئيسية
        // --------------------------------------

        if (
            has(value, [
                "وديني الصفحة الرئيسية",
                "روح للصفحة الرئيسية",
                "اذهب للصفحة الرئيسية",
                "الصفحة الرئيسية",
                "الرئيسية",
                "رئيسية"
            ])
        ) {

            navigateTo(
                "index.php",
                "الصفحة الرئيسية"
            );

            return true;
        }

        // --------------------------------------
        // التسجيل
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة التسجيل",
                "صفحة التسجيل",
                "التسجيل",
                "انشاء حساب",
                "إنشاء حساب"
            ])
        ) {

            navigateTo(
                "register.php",
                "صفحة التسجيل"
            );

            return true;
        }

        // --------------------------------------
        // المهام
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة المهام",
                "صفحة المهام",
                "المهام",
                "للمهام"
            ])
        ) {

            navigateTo(
                "tasks.php",
                "صفحة المهام"
            );

            return true;
        }

        // --------------------------------------
        // التواصل
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة التواصل",
                "صفحة التواصل",
                "التواصل"
            ])
        ) {

            navigateTo(
                "communication.php",
                "صفحة التواصل"
            );

            return true;
        }

        // --------------------------------------
        // التقويم
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة التقويم",
                "صفحة التقويم",
                "التقويم",
                "المواعيد",
                "الجدول"
            ])
        ) {

            navigateTo(
                "schedule.php",
                "صفحة التقويم والمواعيد"
            );

            return true;
        }

        // --------------------------------------
        // الموظفين
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة الموظفين",
                "صفحة الموظفين",
                "الموظفين والمدير",
                "الموظفين"
            ])
        ) {

            navigateTo(
                "employees.php",
                "صفحة الموظفين والمدير"
            );

            return true;
        }

        // --------------------------------------
        // الروحانيات
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة الروحانيات",
                "صفحة الروحانيات",
                "الروحانيات"
            ])
        ) {

            navigateTo(
                "team.php",
                "صفحة الروحانيات"
            );

            return true;
        }

        // --------------------------------------
        // الإعدادات
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة الاعدادات",
                "صفحة الاعدادات",
                "الإعدادات",
                "الاعدادات"
            ])
        ) {

            navigateTo(
                "settings.php",
                "صفحة الإعدادات"
            );

            return true;
        }

        // --------------------------------------
        // الإشعارات / إدارة الملفات
        // --------------------------------------

        if (
            has(value, [
                "وديني صفحة الملفات",
                "صفحة  ادارة الملفات",
                " ادارةالملفات",
                " ادارة الملفات"
            ])
        ) {

            navigateTo(
                "notificationc.php",
                "صفحة  ادارة الملفات"
            );

            return true;
        }

        return false;
    }

// ==========================================
    // PART 3 / 3
    // ==========================================

    function handleVoiceCommand(text) {

        if (!text) return;

        const value = clean(text);

        console.log(
            "MOBSAR EVALUATION:",
            text
        );

        // ======================================
        // اقرأ الإنجازات
        // ======================================

        if (
            has(value, [
                "اقرالي الانجازات",
                "اقرألي الانجازات",
                "اقرا الانجازات",
                "اقرأ الانجازات",
                "ما هي الانجازات",
                "ايه الانجازات",
                "ايه هي الانجازات",
                "الانجازات كلها",
                "كل الانجازات"
            ])
        ) {

            readAchievements();

            return;
        }

        // ======================================
        // المهام قيد الانتظار
        // ======================================

        if (
            has(value, [
                "المهام قيد الانتظار",
                "مهام قيد الانتظار",
                "المهام في الانتظار",
                "مهام الانتظار",
                "المهام المنتظرة"
            ])
        ) {

            readWaitingTasks();

            return;
        }

        // ======================================
        // المهام القادمة
        // ======================================

        if (
            has(value, [
                "المهام القادمة",
                "مهام قادمة",
                "المهام القادمه",
                "مهام القادمه"
            ])
        ) {

            readComingTasks();

            return;
        }

        // ======================================
        // المهام المنجزة
        // ======================================

        if (
            has(value, [
                "المهام المنجزة",
                "مهام منجزة",
                "المهام المكتملة",
                "مهام مكتملة",
                "الانجازات المنجزة"
            ])
        ) {

            readCompletedTasks();

            return;
        }

        // ======================================
        // مهام الأسبوع
        // ======================================

        if (
            has(value, [
                "مهام الاسبوع",
                "مهام الأسبوع",
                "المهام هذا الاسبوع",
                "المهام هذا الأسبوع",
                "اسبوع"
            ])
        ) {

            readWeekTasks();

            return;
        }

        // ======================================
        // مهام الشهر
        // ======================================

        if (
            has(value, [
                "مهام الشهر",
                "المهام هذا الشهر",
                "شهر",
                "الشهر"
            ])
        ) {

            readMonthTasks();

            return;
        }

        // ======================================
        // مهام السنة
        // ======================================

        if (
            has(value, [
                "مهام السنة",
                "المهام هذه السنة",
                "مهام العام",
                "هذا العام",
                "السنة",
                "العام"
            ])
        ) {

            readYearTasks();

            return;
        }

        // ======================================
        // كل المهام
        // ======================================

        if (
            has(value, [
                "اقرالي كل المهام",
                "اقرألي كل المهام",
                "اقرا كل المهام",
                "اقرأ كل المهام",
                "جميع المهام",
                "كل المهام",
                "ما هي جميع المهام",
                "ايه جميع المهام",
                "ايه المهام اللي عندي",
                "المهام اللي عندي"
            ])
        ) {

            readAllTasks();

            return;
        }

        // ======================================
        // الصفحة دي بتاعت إيه؟
        // ======================================

        if (
            has(value, [
                "الصفحة دي بتاعت ايه",
                "الصفحه دي بتاعت ايه",
                "دي صفحة ايه",
                "دي صفحه ايه",
                "انا فين",
                "أنا فين",
                "اين انا",
                "أين أنا"
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
                "قولي الاوامر",
                "قولي الأوامر",
                "الأوامر",
                "الاوامر"
            ])
        ) {

            readCommands();

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
                "كرر الكلام"
            ])
        ) {

            repeatLast();

            return;
        }

        // ======================================
        // التنقل
        // ======================================

        if (
            handleNavigation(text)
        ) {

            return;
        }

        // ======================================
        // لم أفهم
        // ======================================

        speakQuick(
            "لم أفهم الأمر. يمكنك أن تقولي اقرألي الإنجازات، اقرألي كل المهام، مهام الأسبوع، مهام الشهر، مهام السنة، أو قولي إيه الأوامر."
        );
    }

    // ==========================================
    // إتاحة الأمر للنظام العام
    // ==========================================

    window.mobsarVoiceCommand =
        handleVoiceCommand;

    // ==========================================
    // أول تفاعل في الصفحة
    // مفيش زر مايك
    // ==========================================

    let firstInteraction = false;

    function activateVoicePage() {

        if (firstInteraction) return;

        firstInteraction = true;

        voiceStarted = true;

        speakQuick(
            "مرحبًا بك في صفحة تقييم الإنجازات. يمكنك أن تقولي اقرألي الإنجازات أو اقرألي المهام أو اسأليني عن مهام الأسبوع أو الشهر أو السنة."
        );
    }

    document.addEventListener(
        "click",
        activateVoicePage,
        {
            once: true
        }
    );

    document.addEventListener(
        "touchstart",
        activateVoicePage,
        {
            once: true,
            passive: true
        }
    );

    // ==========================================
    // جاهزية الصفحة
    // ==========================================

    window.addEventListener(
        "load",
        function () {

            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {

                status.innerText =
                    "الصوت جاهز";
            }

            console.log(
                "MOBSAR EVALUATION VOICE READY"
            );
        }
    );

})();
</script>
    
</body>
</body>
</html>