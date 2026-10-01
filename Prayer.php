<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موسوعة مبصر - الصلاة والعبادة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
            overflow-x: hidden; cursor: pointer;
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
        
        .prayer-container { width: 90%; max-width: 900px; display: flex; flex-direction: column; gap: 22px; margin-top: 25px; }
        .card-box {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 30px rgba(138, 43, 226, 0.15), inset 0 0 25px rgba(212, 175, 55, 0.08);
            transition: 0.3s; position: relative;
        }
        .card-box:hover { border-color: rgba(212, 175, 55, 0.7); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.98), 0 0 40px rgba(212, 175, 55, 0.25); transform: translateY(-2px); }
        
        .section-category-title { color: #d4af37; font-size: 1.5rem; margin: 25px 0 10px 0; font-weight: 700; text-align: right; border-bottom: 2px solid rgba(212, 175, 55, 0.3); padding-bottom: 8px; width: 100%; text-shadow: 0 0 10px rgba(212, 175, 55, 0.3); }
        
        /* مواقيت الصلاة الحية */
        .timings-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 15px; margin-top: 15px; }
        .timing-card { background: rgba(20, 10, 35, 0.8); border: 1px solid rgba(212, 175, 55, 0.3); border-radius: 15px; padding: 15px; text-align: center; }
        .timing-name { font-size: 1.1rem; color: #d4af37; font-weight: 700; margin-bottom: 5px; }
        .timing-time { font-size: 1.3rem; color: #ffffff; font-weight: 800; }
        
        /* جدول المتابعة والسنن */
        .tracker-row { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid rgba(212, 175, 55, 0.15); }
        .tracker-title { font-size: 1.2rem; color: #ffffff; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        .action-btn { background: rgba(138, 43, 226, 0.2); border: 1px solid #d4af37; color: #d4af37; padding: 8px 16px; border-radius: 12px; cursor: pointer; font-weight: 700; transition: 0.3s; }
        .action-btn.done { background: #22c55e; color: #000; border-color: #22c55e; }
        
        .prayer-details-text { font-size: 1.2rem; color: #ffffff; line-height: 1.9; font-weight: 600; text-align: right; margin-bottom: 15px; }
        .click-hint-banner { position: fixed; bottom: 15px; left: 50%; transform: translateX(-50%); background: rgba(15, 6, 26, 0.9); border: 1px solid #d4af37; padding: 8px 20px; border-radius: 20px; color: #d8b4fe; font-size: 0.9rem; font-weight: 600; box-shadow: 0 0 15px rgba(138, 43, 226, 0.3); z-index: 1000; pointer-events: none; }
    </style>
</head>
<body>
    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseenter="speakQuick('الصفحة الرئيسية')" onclick="navigateDirect(event, 'index.php', 'جاري الانتقال للصفحة الرئيسية')">
            <i class="fa-solid fa-house"></i> الصفحة الرئيسية
        </a>
        <a href="communication.php" class="chat-nav-btn" onmouseenter="speakQuick('صفحة التواصل')" onclick="navigateDirect(event, 'communication.php', 'جاري الانتقال لصفحة التواصل')">
            <i class="fa-solid fa-comments"></i> صفحة التواصل
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick('قسم الصلاة والعبادة ومواقيت الصلاة الحية')">قسم الصلاة والعبادة ومواقيت الصلاة الحية</div>
    </div>

    <div class="prayer-container">

        <!-- مواقيت الصلاة الحية من النت -->
        <div class="section-category-title" onmouseenter="speakQuick('مواقيت الصلاة الحية لليوم')">
            <i class="fa-solid fa-clock"></i> مواقيت الصلاة اليومية (تحديث مباشر من الويب)
        </div>
        <div class="card-box">
            <div id="prayer-times-box" class="timings-grid">
                <div class="timing-card"><div class="timing-name">الفجر</div><div class="timing-time" id="t-fajr">جاري الجلب...</div></div>
                <div class="timing-card"><div class="timing-name">الشروق</div><div class="timing-time" id="t-sunrise">جاري الجلب...</div></div>
                <div class="timing-card"><div class="timing-name">الظهر</div><div class="timing-time" id="t-dhuhr">جاري الجلب...</div></div>
                <div class="timing-card"><div class="timing-name">العصر</div><div class="timing-time" id="t-asr">جاري الجلب...</div></div>
                <div class="timing-card"><div class="timing-name">المغرب</div><div class="timing-time" id="t-maghrib">جاري الجلب...</div></div>
                <div class="timing-card"><div class="timing-name">العشاء</div><div class="timing-time" id="t-isha">جاري الجلب...</div></div>
            </div>
        </div>

        <!-- جدول متابعة الصلوات المفروضة والسنن والرواتب -->
        <div class="section-category-title" onmouseenter="speakQuick('جدول متابعة الصلوات والسنن والرواتب')">
            <i class="fa-solid fa-clipboard-check"></i> جدول متابعة الصلوات والسنن والرواتب اليومية
        </div>
        <div class="card-box" onmouseenter="speakCardText(this)">
            <div class="tracker-row">
                <div class="tracker-title"><i class="fa-solid fa-circle-check" style="color: #d4af37;"></i> صلاة الفجر (مع سنتها القبلية: ركعتان)</div>
                <button class="action-btn" onclick="togglePrayerStatus(this, 'صلاة الفجر مع سنتها')">تم الأداء</button>
            </div>
            <div class="tracker-row">
                <div class="tracker-title"><i class="fa-solid fa-circle-check" style="color: #d4af37;"></i> صلاة الظهر (مع رواتبها: 4 قبلية و2 بعدية)</div>
                <button class="action-btn" onclick="togglePrayerStatus(this, 'صلاة الظهر ورواتبها')">تم الأداء</button>
            </div>
            <div class="tracker-row">
                <div class="tracker-title"><i class="fa-solid fa-circle-check" style="color: #d4af37;"></i> صلاة العصر (بدون سنة راتبة بعدية)</div>
                <button class="action-btn" onclick="togglePrayerStatus(this, 'صلاة العصر')">تم الأداء</button>
            </div>
            <div class="tracker-row">
                <div class="tracker-title"><i class="fa-solid fa-circle-check" style="color: #d4af37;"></i> صلاة المغرب (مع سنتها البعدية: ركعتان)</div>
                <button class="action-btn" onclick="togglePrayerStatus(this, 'صلاة المغرب مع سنتها')">تم الأداء</button>
            </div>
            <div class="tracker-row">
                <div class="tracker-title"><i class="fa-solid fa-circle-check" style="color: #d4af37;"></i> صلاة العشاء (مع سنتها البعدية: ركعتان + الشتر والوتر)</div>
                <button class="action-btn" onclick="togglePrayerStatus(this, 'صلاة العشاء والوتر')">تم الأداء</button>
            </div>
        </div>

        <!-- كيفية وأحكام الصلاة وما يُقال في الركعات -->
        <div class="section-category-title" onmouseenter="speakQuick('كيفية الصلاة وأحكامها وما يُقال في كل ركعة')">
            <i class="fa-solid fa-book-open-reader"></i> كيفية الصلاة خطوة بخطوة وما يُقال في الركعات
        </div>
        
        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="prayer-details-text">
                <strong>1. الاستعداد والتوجه:</strong> استقبال القبلة بالبدن والقلب، وتكبير الإحرام (الله أكبر) مع رفع اليدين حذو المنكبين.<br>
                <strong>2. دعاء الاستفتاح:</strong> «سُبْحَانَكَ اللَّهُمَّ وَبِحَمْدِكَ، وَتَبَارَكَ اسْمُكَ، وَتَعَالَى جَدُّكَ، وَلَا إِلَهَ غَيْرُكَ»، ثم التعوذ والبسملة.<br>
                <strong>3. قراءة الفاتحة وما تيسر:</strong> قراءة سورة الفاتحة في كل ركعة، فقول «آمين»، ثم قراءة ما تيسر من القرآن في الركعتين الأوليين.<br>
                <strong>4. الركوع والاعتدال:</strong> التكبير للركوع، ووضع اليدين على الركبتين، وقول «سُبْحَانَ رَبِّيَ الْعَظِيمِ» ثلاثاً، ثم الرفع والاعتدال مع قول «سَمِعَ اللَّهُ لِمَنْ حَمِدَهُ، رَبَّنَا وَلَكَ الْحَمْدُ».<br>
                <strong>5. السجود الأول والثاني:</strong> التكبير والسجود على الأعضاء السبعة مع قول «سُبْحَانَ رَبِّيَ الْأَعْلَى» ثلاثاً، والجلوس بين السجدتين بقول «رَبِّ اغْفِرْ لِي».<br>
                <strong>6. التشهد الأخير والسلام:</strong> الجلوس للتشهد الأخير وقراءة التحيات لله، والصلاة الإبراهيمية، ثم التيمين عن اليمين وعن اليسار بـ «السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللَّهِ».
            </div>
            <div class="hadith-footer" style="margin-top: 10px; display: flex; justify-content: space-between; color: #9ca3af; font-size: 0.9rem;">
                <span class="source-badge" style="color: #d4af37;">أحكام الصلاة الصحيحة</span>
                <span><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

    </div>

    <div class="click-hint-banner">
        <i class="fa-solid fa-microphone-lines" style="color: #d4af37;"></i> المساعد الصوتي مستعد لتلقي الأوامر والتنقل بين الصفحات بشكل دائم
    </div>






<script>
/* =========================================================
   MOBSAR - PART 1
   المحرك الأساسي للصوت
   ========================================================= */

(function () {

    "use strict";

    /* =====================================================
       Speech Recognition
       ===================================================== */

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        console.error(
            "MOBSAR: المتصفح لا يدعم التعرف على الصوت."
        );
        return;
    }

    const recognition = new SpeechRecognition();

    recognition.lang = "ar-EG";
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.maxAlternatives = 5;


    /* =====================================================
       حالة النظام
       ===================================================== */

    let systemStarted = false;
    let speaking = false;
    let startingRecognition = false;


    /* =====================================================
       الأجزاء المتخصصة
       Part 2-1 / Part 2-2 / Part C ...
       ===================================================== */

    const commandHandlers = [];


    function addCommandHandler(handler) {

        if (typeof handler === "function") {
            commandHandlers.push(handler);
        }

    }


    /* =====================================================
       تنظيف الكلام العربي
       ===================================================== */

    function normalize(text) {

        return String(text || "")
            .toLowerCase()
            .trim()

            .replace(/[إأآا]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")

            .replace(/[ًٌٍَُِّْـ]/g, "")

            .replace(/[؟?!،,.]/g, " ")

            .replace(/\s+/g, " ")
            .trim();
    }


    /* =====================================================
       الكلام
       ===================================================== */

    function speak(text, callback) {

        if (!text) {
            if (callback) callback();
            return;
        }

        speaking = true;

        try {
            recognition.stop();
        } catch (e) {}

        window.speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.92;
        utterance.pitch = 1;

        utterance.onend = function () {

            speaking = false;

            if (callback) {
                callback();
            }

            /*
             * بعد الكلام يرجع يسمع تلقائيًا
             */
            setTimeout(function () {

                if (systemStarted) {
                    startListening();
                }

            }, 400);
        };

        utterance.onerror = function () {

            speaking = false;

            if (callback) {
                callback();
            }

            setTimeout(function () {

                if (systemStarted) {
                    startListening();
                }

            }, 400);
        };

        window.speechSynthesis.speak(utterance);
    }


    /* =====================================================
       تشغيل الاستماع
       ===================================================== */

    function startListening() {

        if (!systemStarted) return;

        if (speaking) return;

        if (startingRecognition) return;

        startingRecognition = true;

        try {

            recognition.start();

        } catch (error) {

            /*
             * لو الميكروفون شغال أصلًا
             * لا نعتبرها مشكلة
             */

            if (
                !String(error.message || "")
                    .toLowerCase()
                    .includes("already started")
            ) {
                console.log(
                    "MOBSAR microphone:",
                    error.message
                );
            }
        }

        setTimeout(function () {
            startingRecognition = false;
        }, 500);
    }


    /* =====================================================
       تشغيل النظام لأول مرة
       أول ضغطة/لمسة في الصفحة
       ===================================================== */

    function startSystem() {

        if (systemStarted) return;

        systemStarted = true;

        speak(
            "السلام عليكم ورحمة الله وبركاته. " +
            "مرحبًا بكِ في قسم الصلاة والعبادات ومواقيت الصلاة. " +
            "أنا مبصر، وجاهزة لسماع أوامركِ. " +
            "يمكنكِ أن تطلبي مواقيت الصلاة، " +
            "أو تسجيلي أنكِ صليتِ صلاة معينة، " +
            "أو تقولي كيفية الصلاة أو علمني كيف أصلي. " +
            "وسأفتح لكِ الجزء المطلوب وأبدأ معكِ مباشرة."
        );
    }


    /* =====================================================
       أول تفاعل مع الصفحة
       ===================================================== */

    document.addEventListener(
        "click",
        startSystem,
        {
            once: true,
            passive: true
        }
    );

    document.addEventListener(
        "touchstart",
        startSystem,
        {
            once: true,
            passive: true
        }
    );


    /* =====================================================
       استقبال الكلام
       ===================================================== */

    recognition.onresult = function (event) {

        if (!systemStarted || speaking) {
            return;
        }

        for (
            let i = event.resultIndex;
            i < event.results.length;
            i++
        ) {

            if (!event.results[i].isFinal) {
                continue;
            }

            const transcript =
                event.results[i][0].transcript.trim();

            if (!transcript) {
                continue;
            }

            console.log(
                "MOBSAR:",
                transcript
            );

            handleVoiceCommand(transcript);
        }
    };


    /* =====================================================
       موزع الأوامر
       ===================================================== */

    function handleVoiceCommand(rawText) {

        const text = normalize(rawText);

        if (!text) return;


        /* -------------------------------------------------
           السلام
           ------------------------------------------------- */

        if (
            text.includes("السلام عليكم") ||
            text.includes("سلام عليكم")
        ) {

            speak(
                "وعليكم السلام ورحمة الله وبركاته"
            );

            return;
        }


        /* -------------------------------------------------
           هل مبصر شغال؟
           ------------------------------------------------- */

        if (
            text === "مبصر" ||
            text.includes("انت شغال") ||
            text.includes("هل انت شغال") ||
            text.includes("انت موجود") ||
            text.includes("هل انت موجود")
        ) {

            speak(
                "أيوه، أنا شغالة وجاهزة لسماع أوامركِ."
            );

            return;
        }


        /* =================================================
           هنا الجزء المهم جدًا
           =================================================

           Part 1 لا يقول:
           "تم التعرف على الأمر"

           Part 1 يرسل الأمر للأجزاء المتخصصة.

           لو Part 2-1 فهمه:
           ينفذه ويقول الرد المناسب.

           لو Part 2-2 فهمه:
           يفتح كيفية الصلاة ويبدأ التعليم.

           وهكذا.
           ================================================= */

        for (
            let i = 0;
            i < commandHandlers.length;
            i++
        ) {

            try {

                const handled =
                    commandHandlers[i](rawText, text);

                if (handled === true) {
                    return;
                }

            } catch (error) {

                console.error(
                    "MOBSAR command handler error:",
                    error
                );

            }
        }


        /* -------------------------------------------------
           أمر غير معروف
           ------------------------------------------------- */

        speak(
            "معلش، مش فاهمة الأمر ده. " +
            "ممكن تقولي الأمر بطريقة تانية؟"
        );
    }


    /* =====================================================
       لو الاستماع توقف
       يرجع يشتغل تلقائيًا
       ===================================================== */

    recognition.onend = function () {

        startingRecognition = false;

        if (
            systemStarted &&
            !speaking
        ) {

            setTimeout(
                startListening,
                300
            );
        }
    };


    /* =====================================================
       أخطاء الميكروفون
       ===================================================== */

    recognition.onerror = function (event) {

        startingRecognition = false;

        console.log(
            "MOBSAR Speech Error:",
            event.error
        );

        /*
         * لا نتكلم هنا حتى لا ندخل
         * في حلقة كلام/استماع.
         */
    };


    /* =====================================================
       تحميل مواقيت الصلاة
       ===================================================== */

    function loadPrayerTimes() {

        function fetchPrayerTimes(
            latitude,
            longitude
        ) {

            const url =
                "https://api.aladhan.com/v1/timings" +
                "?latitude=" + latitude +
                "&longitude=" + longitude +
                "&method=5";

            fetch(url)

                .then(function (response) {
                    return response.json();
                })

                .then(function (data) {

                    if (
                        !data ||
                        !data.data ||
                        !data.data.timings
                    ) {
                        throw new Error(
                            "بيانات المواقيت غير متاحة"
                        );
                    }

                    const timings =
                        data.data.timings;

                    const mapping = {
                        "t-fajr": timings.Fajr,
                        "t-sunrise": timings.Sunrise,
                        "t-dhuhr": timings.Dhuhr,
                        "t-asr": timings.Asr,
                        "t-maghrib": timings.Maghrib,
                        "t-isha": timings.Isha
                    };

                    Object.keys(mapping).forEach(
                        function (id) {

                            const element =
                                document.getElementById(id);

                            if (element) {

                                element.textContent =
                                    mapping[id];

                            }
                        }
                    );

                })

                .catch(function (error) {

                    console.error(
                        "MOBSAR Prayer Times:",
                        error
                    );

                });
        }


        /*
         * نستخدم موقع الجهاز إن كان متاحًا.
         * ولو غير متاح نستخدم القاهرة كاحتياطي.
         */

        if (
            navigator.geolocation
        ) {

            navigator.geolocation.getCurrentPosition(

                function (position) {

                    fetchPrayerTimes(
                        position.coords.latitude,
                        position.coords.longitude
                    );

                },

                function () {

                    fetchPrayerTimes(
                        30.0444,
                        31.2357
                    );

                },

                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 300000
                }
            );

        } else {

            fetchPrayerTimes(
                30.0444,
                31.2357
            );
        }
    }


    /* =====================================================
       واجهة Part 1 للأجزاء الأخرى
       ===================================================== */

    window.MobsarPrayer = {

        speak: speak,

        normalize: normalize,

        startListening: startListening,

        addCommandHandler: addCommandHandler,

        getPrayerTimes: loadPrayerTimes,

        isStarted: function () {
            return systemStarted;
        }
    };


    /* =====================================================
       تشغيل جلب المواقيت
       ===================================================== */

    loadPrayerTimes();


    console.log(
        "MOBSAR Part 1 الأساسي جاهز."
    );

})();
</script>




<script>
/* =========================================================
   MOBSAR - PART 2-1
   مواقيت الصلاة + جدول المتابعة + تسجيل أداء الصلاة
   متوافق مع PART 1 الأساسي
   ========================================================= */

(function () {

    "use strict";

    /* =====================================================
       التأكد من وجود PART 1
       ===================================================== */

    if (!window.MobsarPrayer) {
        console.error(
            "MOBSAR Part 2-1: Part 1 الأساسي غير موجود."
        );
        return;
    }

    const Voice = window.MobsarPrayer;


    /* =====================================================
       الصلوات الموجودة في الصفحة
       ===================================================== */

    const prayers = {

        "الفجر": "t-fajr",

        "الشروق": "t-sunrise",

        "الظهر": "t-dhuhr",

        "العصر": "t-asr",

        "المغرب": "t-maghrib",

        "العشاء": "t-isha"

    };


    /* =====================================================
       تنظيف الكلام
       ===================================================== */

    function clean(text) {

        return Voice.normalize(
            text || ""
        );

    }


    /* =====================================================
       الحصول على وقت الصلاة من الصفحة
       ===================================================== */

    function getPrayerTime(name) {

        const id = prayers[name];

        if (!id) {
            return null;
        }

        const element =
            document.getElementById(id);

        if (!element) {
            return null;
        }

        const time =
            element.textContent.trim();

        if (
            !time ||
            time.includes("جاري") ||
            time.includes("تحميل")
        ) {
            return null;
        }

        return time;

    }


    /* =====================================================
       العثور على كارت المواقيت
       ===================================================== */

    function getTimingCard(name) {

        const cards =
            document.querySelectorAll(
                ".timing-card"
            );

        for (const card of cards) {

            const cardText =
                clean(card.textContent);

            if (
                cardText.includes(
                    clean(name)
                )
            ) {

                return card;

            }

        }

        return null;

    }


    /* =====================================================
       إبراز كارت الصلاة المطلوبة
       ===================================================== */

    function showPrayerTiming(name) {

        const card =
            getTimingCard(name);

        if (!card) {
            return;
        }

        card.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });

        card.classList.add(
            "mobsar-selected-prayer-time"
        );

        setTimeout(function () {

            card.classList.remove(
                "mobsar-selected-prayer-time"
            );

        }, 5000);

    }


    /* =====================================================
       قراءة موعد صلاة معينة
       ===================================================== */

    function sayPrayerTime(name) {

        const time =
            getPrayerTime(name);

        if (!time) {

            Voice.speak(
                "وقت صلاة " +
                name +
                " لسه بيتم تحميله، حاولي تاني بعد شوية."
            );

            return;
        }

        /*
         * نجيب كارت الصلاة قدام المستخدم
         */
        showPrayerTiming(name);

        /*
         * قراءة الوقت الحقيقي الموجود في الصفحة
         */
        Voice.speak(
            "صلاة " +
            name +
            " اليوم الساعة " +
            time +
            "."
        );

    }


    /* =====================================================
       قراءة جميع مواقيت الصلاة
       ===================================================== */

    function sayAllPrayerTimes() {

        const names = [

            "الفجر",

            "الشروق",

            "الظهر",

            "العصر",

            "المغرب",

            "العشاء"

        ];

        const result = [];


        names.forEach(function (name) {

            const time =
                getPrayerTime(name);

            if (time) {

                result.push(
                    name +
                    " الساعة " +
                    time
                );

            }

        });


        /*
         * إظهار قسم المواقيت
         */

        const timingSection =
            document.querySelector(
                ".timings-grid"
            );

        if (timingSection) {

            timingSection.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });

        }


        if (!result.length) {

            Voice.speak(
                "مواقيت الصلاة لسه بتتحمل، حاولي تاني بعد شوية."
            );

            return;

        }


        /*
         * قراءة المواقيت
         */

        Voice.speak(
            "مواقيت الصلاة اليوم: " +
            result.join("، ") +
            "."
        );

    }


    /* =====================================================
       إيجاد صف الصلاة داخل جدول المتابعة
       ===================================================== */

    function getPrayerRow(name) {

        const rows =
            document.querySelectorAll(
                ".tracker-row"
            );


        for (const row of rows) {

            const rowText =
                clean(row.textContent);

            if (
                rowText.includes(
                    clean(name)
                )
            ) {

                return row;

            }

        }

        return null;

    }


    /* =====================================================
       عرض جدول المتابعة بالكامل
       ===================================================== */

    function showPrayerTable() {

        const rows =
            document.querySelectorAll(
                ".tracker-row"
            );


        if (!rows.length) {

            Voice.speak(
                "مش لاقية جدول متابعة الصلوات في الصفحة."
            );

            return;

        }


        /*
         * مهم جدًا:
         * لا نخفي أي صلاة.
         */

        rows.forEach(function (row) {

            row.style.display = "";

        });


        /*
         * نجيب بداية الجدول قدام المستخدم
         */

        rows[0].scrollIntoView({
            behavior: "smooth",
            block: "start"
        });


        Voice.speak(
            "ده جدول متابعة الصلوات والسنن والرواتب اليومية."
        );

    }


    /* =====================================================
       تسجيل أداء صلاة معينة
       ===================================================== */

    function markPrayerDone(name) {

        const row =
            getPrayerRow(name);


        if (!row) {

            Voice.speak(
                "مش لاقية صلاة " +
                name +
                " في جدول المتابعة."
            );

            return;

        }


        /*
         * الجدول كله يفضل ظاهر
         */

        document
            .querySelectorAll(".tracker-row")
            .forEach(function (otherRow) {

                otherRow.style.display = "";

            });


        /*
         * نجيب صف الصلاة المطلوبة قدام المستخدم
         */

        row.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });


        /*
         * تحديد صف الصلاة
         */

        row.classList.add(
            "mobsar-prayer-completed"
        );


        /* =================================================
           زر "تم الأداء" الموجود أصلًا
           ================================================= */

        const button =
            row.querySelector(
                ".action-btn"
            );


        if (button) {

            /*
             * نشغل وظيفة الصفحة الأصلية
             */
            button.click();


            /*
             * نخلي الزر واضح كمكتمل
             */

            button.classList.add(
                "mobsar-done-button"
            );


            /*
             * إضافة "تم بنجاح" مرة واحدة
             */

            let successText =
                row.querySelector(
                    ".mobsar-success-text"
                );


            if (!successText) {

                successText =
                    document.createElement(
                        "span"
                    );

                successText.className =
                    "mobsar-success-text";

                successText.textContent =
                    "تم بنجاح ✓";


                button.insertAdjacentElement(
                    "afterend",
                    successText
                );

            }

        }


        /* =================================================
           الرد الصوتي
           ================================================= */

        Voice.speak(

            "بارك الله فيكِ، أحسنتِ، " +
            "في ميزان حسناتكِ. " +

            "تم تسجيل صلاة " +
            name +
            " بنجاح. " +

            "أنا جاهزة لاستماع أوامر أخرى."

        );

    }


    /* =====================================================
       التعرف على أن السؤال عن موعد صلاة
       ===================================================== */

    function isTimeQuestion(text) {

        const words = [

            "وقت",

            "موعد",

            "مواعيد",

            "امتى",

            "متى",

            "الساعة كام",

            "هيبدأ امتى",

            "تبدأ امتى",

            "هياذن امتى",

            "ياذن امتى",

            "اذان",

            "أذان",

            "ميعاد",

            "بتبدأ امتى",

            "هيكون الساعة كام"

        ];


        return words.some(function (word) {

            return text.includes(
                clean(word)
            );

        });

    }


    /* =====================================================
       أوامر PART 2-1
       ===================================================== */

    Voice.addCommandHandler(function (
        rawText
    ) {

        const text =
            clean(rawText);


        /* =================================================
           1 - جميع مواقيت الصلاة
           ================================================= */

        if (

            text.includes(
                "مواقيت الصلاة"
            ) ||

            text.includes(
                "مواعيد الصلاة"
            ) ||

            text === "الصلاة"

        ) {

            sayAllPrayerTimes();

            return true;

        }


        /* =================================================
           2 - سؤال عن صلاة معينة
           ================================================= */

        for (
            const name of Object.keys(prayers)
        ) {

            const prayerName =
                clean(name);


            const mentionsPrayer =

                text.includes(
                    prayerName
                ) ||

                text.includes(
                    "صلاة " +
                    prayerName
                );


            if (!mentionsPrayer) {
                continue;
            }


            /*
             * لو السؤال عن موعدها
             */

            if (
                isTimeQuestion(text)
            ) {

                sayPrayerTime(name);

                return true;

            }

        }


        /* =================================================
           3 - جدول متابعة الصلوات
           ================================================= */

        if (

            text.includes(
                "جدول متابعة الصلوات"
            ) ||

            text.includes(
                "جدول متابعة الصلاة"
            ) ||

            text.includes(
                "متابعة الصلوات"
            ) ||

            text.includes(
                "جدول الصلوات"
            ) ||

            text.includes(
                "جدول المتابعة"
            )

        ) {

            showPrayerTable();

            return true;

        }


        /* =================================================
           4 - صليت الفجر
           ================================================= */

        if (

            text.includes(
                "صليت الفجر"
            ) ||

            text.includes(
                "خلصت الفجر"
            ) ||

            text.includes(
                "انتهيت من الفجر"
            )

        ) {

            markPrayerDone(
                "الفجر"
            );

            return true;

        }


        /* =================================================
           5 - صليت الظهر
           ================================================= */

        if (

            text.includes(
                "صليت الظهر"
            ) ||

            text.includes(
                "خلصت الظهر"
            ) ||

            text.includes(
                "انتهيت من الظهر"
            )

        ) {

            markPrayerDone(
                "الظهر"
            );

            return true;

        }


        /* =================================================
           6 - صليت العصر
           ================================================= */

        if (

            text.includes(
                "صليت العصر"
            ) ||

            text.includes(
                "خلصت العصر"
            ) ||

            text.includes(
                "انتهيت من العصر"
            )

        ) {

            markPrayerDone(
                "العصر"
            );

            return true;

        }


        /* =================================================
           7 - صليت المغرب
           ================================================= */

        if (

            text.includes(
                "صليت المغرب"
            ) ||

            text.includes(
                "خلصت المغرب"
            ) ||

            text.includes(
                "انتهيت من المغرب"
            )

        ) {

            markPrayerDone(
                "المغرب"
            );

            return true;

        }


        /* =================================================
           8 - صليت العشاء
           ================================================= */

        if (

            text.includes(
                "صليت العشاء"
            ) ||

            text.includes(
                "خلصت العشاء"
            ) ||

            text.includes(
                "انتهيت من العشاء"
            )

        ) {

            markPrayerDone(
                "العشاء"
            );

            return true;

        }


        /*
         * الأمر مش خاص بـ Part 2-1
         * نسيبه للجزء اللي بعده.
         */

        return false;

    });


    /* =====================================================
       CSS
       ===================================================== */

    const style =
        document.createElement(
            "style"
        );


    style.textContent = `

        /* الصف بعد تسجيل الصلاة */

        .mobsar-prayer-completed {

            background:
                rgba(46, 160, 67, 0.18)
                !important;

            border-color:
                #35c759 !important;

            box-shadow:
                0 0 15px
                rgba(53, 199, 89, 0.35)
                !important;

        }


        /* زر تم الأداء */

        .mobsar-done-button {

            background:
                #35c759 !important;

            border-color:
                #35c759 !important;

        }


        /* تم بنجاح */

        .mobsar-success-text {

            display:
                inline-block;

            margin-right:
                10px;

            color:
                #35c759;

            font-weight:
                bold;

            font-size:
                14px;

        }


        /* كارت الصلاة المطلوبة */

        .mobsar-selected-prayer-time {

            transform:
                scale(1.03);

            box-shadow:
                0 0 20px
                rgba(225, 191, 105, 0.75)
                !important;

            border-color:
                #e1bf69 !important;

        }

    `;


    document.head.appendChild(
        style
    );


    console.log(
        "MOBSAR Part 2-1 جاهز ومتوافق مع Part 1."
    );


})();
</script>

<!-- =========================================================
     PART 2-2
     تعليم كيفية الصلاة خطوة بخطوة
     ========================================================= -->

<style>
.mobsar-step-current {
    background: rgba(255, 215, 0, 0.22) !important;
    border: 2px solid #ffd700 !important;
    border-radius: 12px;
    padding: 8px 12px;
    transition: all 0.3s ease;
}

.mobsar-step-finished {
    background: rgba(46, 204, 113, 0.18) !important;
    border: 2px solid #2ecc71 !important;
    border-radius: 12px;
    padding: 8px 12px;
}

.mobsar-step-finished strong {
    color: #2ecc71;
}
</style>

<script>
(function () {

    const Voice = window.MobsarPrayer;

    if (!Voice) {
        console.error("MobsarPrayer غير موجود. تأكدي أن Part 1 موجود قبله.");
        return;
    }

    let steps = [];
    let currentStep = 0;

    /*
     * الحالات:
     *
     * null
     * = مش في وضع التعليم
     *
     * "understanding"
     * = شرح الخطوة انتهى وننتظر:
     *   تمام / فهمت / أعيد
     *
     * "next"
     * = المستخدم فهم الخطوة وننتظر:
     *   نعم / لا
     */
    let teachingState = null;


    /* =========================================================
       تنظيف النص
       ========================================================= */

    function clean(text) {
        return Voice.normalize(text || "")
            .replace(/[؟?!،,.]/g, " ")
            .replace(/\s+/g, " ")
            .trim();
    }


    /* =========================================================
       جمع خطوات الصلاة من الصفحة نفسها
       بدون كتابة محتوى الخطوات داخل JavaScript
       ========================================================= */

    function collectPrayerSteps() {

        const container =
            document.querySelector(".prayer-details-text");

        if (!container) {
            return [];
        }

        const result = [];

        const headings =
            container.querySelectorAll("strong");

        headings.forEach((heading, index) => {

            let fullText = heading.innerText.trim();

            let node = heading.nextSibling;

            while (node) {

                if (
                    node.nodeType === Node.ELEMENT_NODE &&
                    node.tagName.toLowerCase() === "strong"
                ) {
                    break;
                }

                if (node.textContent) {
                    fullText += " " + node.textContent.trim();
                }

                node = node.nextSibling;
            }

            fullText = fullText
                .replace(/\s+/g, " ")
                .trim();

            if (fullText) {

                result.push({
                    number: index + 1,
                    element: heading,
                    text: fullText
                });
            }
        });

        return result;
    }


    /* =========================================================
       إخفاء أي تمييز قديم
       ========================================================= */

    function clearAllStepStyles() {

        steps.forEach(step => {

            step.element.classList.remove(
                "mobsar-step-current",
                "mobsar-step-finished"
            );
        });
    }


    /* =========================================================
       تمييز الخطوة الحالية
       ========================================================= */

    function highlightCurrentStep() {

        steps.forEach((step, index) => {

            step.element.classList.remove(
                "mobsar-step-current"
            );

            if (index < currentStep) {

                step.element.classList.add(
                    "mobsar-step-finished"
                );
            }
        });

        if (steps[currentStep]) {

            steps[currentStep].element.classList.add(
                "mobsar-step-current"
            );

            steps[currentStep].element.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }
    }


    /* =========================================================
       قراءة الخطوة الحالية
       ========================================================= */

    function readCurrentStep() {

        if (!steps[currentStep]) {
            finishTeaching();
            return;
        }

        teachingState = "understanding";

        highlightCurrentStep();

        const step = steps[currentStep];

        Voice.speak(
            "الخطوة رقم " +
            step.number +
            ". " +
            step.text +
            ". هل فهمتِ الخطوة أم أعيدها؟",
            null
        );
    }


    /* =========================================================
       إعادة نفس الخطوة
       ========================================================= */

    function repeatCurrentStep() {

        if (!steps[currentStep]) {
            return;
        }

        readCurrentStep();
    }


    /* =========================================================
       سؤال الانتقال للخطوة التالية
       ========================================================= */

    function askToMoveNext() {

        teachingState = "next";

        Voice.speak(
            "هل أنتقل إلى الخطوة التالية؟ قولي نعم أو لا.",
            null
        );
    }


    /* =========================================================
       الانتقال للخطوة التالية
       ========================================================= */

    function moveToNextStep() {

        currentStep++;

        if (currentStep >= steps.length) {

            finishTeaching();
            return;
        }

        readCurrentStep();
    }


    /* =========================================================
       إنهاء التعليم
       ========================================================= */

    function finishTeaching() {

        if (steps.length) {

            steps.forEach(step => {

                step.element.classList.remove(
                    "mobsar-step-current"
                );

                step.element.classList.add(
                    "mobsar-step-finished"
                );
            });
        }

        teachingState = null;

        Voice.speak(
            "بارك الله فيكِ. تم الانتهاء من جميع خطوات كيفية الصلاة. أنا جاهزة لاستماع أوامر أخرى.",
            null
        );
    }


    /* =========================================================
       بدء تعليم الصلاة
       ========================================================= */

    function startPrayerTeaching() {

        steps = collectPrayerSteps();

        if (!steps.length) {

            Voice.speak(
                "لم أجد خطوات كيفية الصلاة في الصفحة.",
                null
            );

            return;
        }

        currentStep = 0;

        teachingState = null;

        clearAllStepStyles();

        const section =
            document.querySelector(".prayer-details-text");

        if (section) {

            section.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        }

        setTimeout(() => {

            readCurrentStep();

        }, 500);
    }


    /* =========================================================
       التعرف على أوامر بدء تعليم الصلاة
       ========================================================= */

    function isPrayerTeachingCommand(text) {

        const phrases = [

            "كيفية الصلاة",
            "كيف اصلي",
            "كيف أصلي",

            "ازاي اصلي",
            "ازاى اصلي",
            "إزاي أصلي",
            "ازاي أصلي",

            "علمني الصلاة",
            "علمني اصلي",
            "علمني أصلي",

            "علمني ازاي اصلي",
            "علمني ازاى اصلي",
            "علمني إزاي أصلي",

            "عاوزة اتعلم الصلاة",
            "عايزة اتعلم الصلاة",
            "عاوزة أتعلم الصلاة",
            "عايزة أتعلم الصلاة",

            "اتعلم الصلاة",
            "أتعلم الصلاة",

            "طريقة الصلاة",
            "طريقه الصلاة",

            "خطوات الصلاة",

            "علمني طريقة الصلاة",
            "علمني طريقه الصلاة",

            "علمني خطوات الصلاة"
        ];

        return phrases.some(phrase => {

            return text.includes(clean(phrase));
        });
    }


    /* =========================================================
       أوامر التأكيد
       ========================================================= */

    function isYes(text) {

        const words = [

            "نعم",
            "ايوه",
            "أيوه",
            "اه",
            "آه",
            "تمام",
            "اكمل",
            "أكمل",
            "كمل",
            "كملي",
            "جاهزة",
            "جاهز",
            "موافق",
            "موافقة"
        ];

        return words.some(word =>
            text === clean(word) ||
            text.includes(" " + clean(word) + " ")
        );
    }


    /* =========================================================
       أوامر الرفض
       ========================================================= */

    function isNo(text) {

        const words = [

            "لا",
            "لأ",
            "لاء",
            "مش دلوقتي",
            "مش عايزة",
            "لا مش عايزة",
            "لا لا"
        ];

        return words.some(word =>
            text === clean(word) ||
            text.includes(" " + clean(word) + " ")
        );
    }


    /* =========================================================
       أوامر إعادة الخطوة
       ========================================================= */

    function isRepeat(text) {

        const words = [

            "اعيد",
            "أعيد",
            "عيد",
            "عيدها",
            "اعيدها",
            "أعيدها",
            "كرر",
            "كررها",
            "ممكن تعيد",
            "ممكن تعيدها",
            "عيد الخطوة",
            "اعيد الخطوة",
            "أعيد الخطوة"
        ];

        return words.some(word =>
            text.includes(clean(word))
        );
    }


    /* =========================================================
       تسجيل أوامر Part 2-2
       ========================================================= */

    Voice.addCommandHandler(function (rawText) {

        const text = clean(rawText);

        if (!text) {
            return false;
        }


        /* -----------------------------------------------------
           أولاً:
           لو لسنا داخل التعليم
           ابحث عن أمر بدء تعليم الصلاة
           ----------------------------------------------------- */

        if (!teachingState) {

            if (isPrayerTeachingCommand(text)) {

                startPrayerTeaching();

                return true;
            }

            return false;
        }


        /* =====================================================
           الحالة الأولى:
           انتهيت من شرح الخطوة
           ننتظر:
           فهمت / تمام / أعيد
           ===================================================== */

        if (teachingState === "understanding") {

            /*
             * لو قالت أعيد
             */
            if (isRepeat(text)) {

                repeatCurrentStep();

                return true;
            }


            /*
             * لو قالت تمام / فهمت
             *
             * لا ننتقل فورًا.
             * أولاً نسألها هل تريد الانتقال.
             */
            if (
                isYes(text) ||
                text.includes("فهمت") ||
                text.includes("سمعت")
            ) {

                askToMoveNext();

                return true;
            }


            /*
             * أي أمر آخر:
             *
             * نخرج من وضع التعليم
             * ونسمح لباقي أوامر مبصر بالتعامل معه.
             */
            teachingState = null;

            return false;
        }


        /* =====================================================
           الحالة الثانية:
           سألنا:
           هل أنتقل إلى الخطوة التالية؟
           ===================================================== */

        if (teachingState === "next") {

            /*
             * نعم
             */
            if (isYes(text)) {

                moveToNextStep();

                return true;
            }


            /*
             * لا
             *
             * لا ننتقل للخطوة التالية.
             * نرجع للسؤال عن الخطوة الحالية.
             */
            if (isNo(text)) {

                teachingState = "understanding";

                Voice.speak(
                    "حاضر. سنبقى في الخطوة الحالية. هل تريدين أن أعيد الخطوة؟",
                    null
                );

                return true;
            }


            /*
             * أي أمر آخر:
             *
             * نخرج من وضع التعليم فورًا
             * ونمرره لباقي أوامر مبصر.
             */
            teachingState = null;

            return false;
        }


        return false;

    });


})();
</script>


<!-- =========================================================
     PART 3
     التنقل الصوتي بين جميع صفحات MOBSAR
     
     مهم:
     هذا الجزء إضافة فقط.
     لا يحذف ولا يستبدل أي JavaScript موجود.
     ========================================================= -->

<script>
(function () {

    const Voice = window.MobsarPrayer;

    if (!Voice) {
        console.error("MobsarPrayer غير موجود. تأكدي أن Part 1 موجود أولاً.");
        return;
    }


    /* =========================================================
       صفحات MOBSAR

       غيّري أسماء الملفات هنا فقط إذا كانت ملفات مشروعك
       لها أسماء مختلفة.
       ========================================================= */

    const pages = [

        {
            name: "الرئيسية",
            file: "index.php",

            aliases: [
                "الرئيسية",
                "الصفحة الرئيسية",
                "الصفحه الرئيسية",
                "الصفحة الرئيسيه",
                "الرئيسه",
                "افتح الرئيسية",
                "افتح الصفحة الرئيسية",
                "روحي للرئيسية",
                "روح للرئيسية",
                "اذهب للرئيسية",
                "اذهب للصفحة الرئيسية"
            ]
        },

        {
            name: "التسجيل",
            file: "register.php",

            aliases: [
                "التسجيل",
                "صفحة التسجيل",
                "التسجيل الجديد",
                "افتح التسجيل",
                "روحي للتسجيل",
                "روح للتسجيل",
                "اذهب للتسجيل"
            ]
        },

        {
            name: "المهام",
            file: "tasks.php",

            aliases: [
                "المهام",
                "صفحة المهام",
                "افتح المهام",
                "روحي للمهام",
                "روح للمهام",
                "اذهب للمهام"
            ]
        },

        {
            name: "التقييم والإنجازات",
            file: "evaluation.php",

            aliases: [
                "التقييم",
                "التقييم والإنجازات",
                "الإنجازات",
                "الانجازات",
                "صفحة التقييم",
                "صفحة الإنجازات",
                "افتح التقييم",
                "افتح الإنجازات",
                "روحي للتقييم",
                "روحي للإنجازات",
                "اذهب للتقييم"
            ]
        },

        {
            name: "المواعيد",
            file: "appointments.php",

            aliases: [
                "المواعيد",
                "صفحة المواعيد",
                "افتح المواعيد",
                "روحي للمواعيد",
                "روح للمواعيد",
                "اذهب للمواعيد"
            ]
        },

        {
            name: "التواصل",
            file: "communication.php",

            aliases: [
                "التواصل",
                "صفحة التواصل",
                "التواصل معنا",
                "اتصل بنا",
                "افتح التواصل",
                "روحي للتواصل",
                "روح للتواصل",
                "اذهب للتواصل"
            ]
        },

        {
            name: "إدارة الملفات",
            file: "files.php",

            aliases: [
                "إدارة الملفات",
                "ادارة الملفات",
                "الملفات",
                "ملفات",
                "صفحة الملفات",
                "افتح إدارة الملفات",
                "افتح الملفات",
                "روحي لإدارة الملفات",
                "اذهب لإدارة الملفات"
            ]
        },

        {
            name: "المثال البصري",
            file: "visual-example.php",

            aliases: [
                "المثال البصري",
                "المثال البصري مبصر",
                "المثال",
                "الواجهة البصرية",
                "افتح المثال البصري",
                "روحي للمثال البصري",
                "اذهب للمثال البصري"
            ]
        },

        {
            name: "الموظفين والمدير",
            file: "employees.php",

            aliases: [
                "الموظفين",
                "الموظفون",
                "الموظفين والمدير",
                "الموظفون والمدير",
                "صفحة الموظفين",
                "صفحة المدير",
                "افتح الموظفين",
                "افتح الموظفين والمدير",
                "روحي للموظفين",
                "اذهب للموظفين"
            ]
        },

        {
            name: "الروحانيات",
            file: "spiritual.php",

            aliases: [
                "الروحانيات",
                "روحانيات",
                "قسم الروحانيات",
                "الروحانيات والدين",
                "افتح الروحانيات",
                "روحي للروحانيات",
                "روح للروحانيات",
                "اذهب للروحانيات"
            ]
        },

        {
            name: "الدين",
            file: "religion.php",

            aliases: [
                "الدين",
                "قسم الدين",
                "الصفحة الدينية",
                "افتح الدين",
                "روحي للدين",
                "روح للدين",
                "اذهب للدين"
            ]
        },

        {
            name: "الأهداف الرئيسية",
            file: "main-goals.php",

            aliases: [
                "الأهداف الرئيسية",
                "الاهداف الرئيسية",
                "الأهداف",
                "الاهداف",
                "أهدافي",
                "اهدافي",
                "افتح الأهداف الرئيسية",
                "افتح الأهداف",
                "روحي للأهداف",
                "اذهب للأهداف"
            ]
        },

        {
            name: "السعادة الأسرية",
            file: "family-happiness.php",

            aliases: [
                "السعادة الأسرية",
                "السعاده الاسرية",
                "السعادة الاسرية",
                "السعادة العائلية",
                "الأسرة",
                "الاسرة",
                "افتح السعادة الأسرية",
                "روحي للسعادة الأسرية",
                "اذهب للسعادة الأسرية"
            ]
        },

        {
            name: "الإعدادات",
            file: "settings.php",

            aliases: [
                "الإعدادات",
                "الاعدادات",
                "الإعداد",
                "الاعداد",
                "صفحة الإعدادات",
                "افتح الإعدادات",
                "روحي للإعدادات",
                "روح للإعدادات",
                "اذهب للإعدادات"
            ]
        },

        {
            name: "الصلاة والعبادات",
            file: "prayer.php",

            aliases: [
                "الصلاة",
                "قسم الصلاة",
                "الصلاة والعبادات",
                "قسم الصلاة والعبادات",
                "العبادات",
                "مواقيت الصلاة",
                "افتح الصلاة",
                "افتح قسم الصلاة",
                "روحي للصلاة",
                "اذهب للصلاة"
            ]
        }

    ];


    /* =========================================================
       تنظيف الأمر الصوتي
       ========================================================= */

    function clean(text) {

        return Voice.normalize(text || "")
            .replace(/[؟?!،,.]/g, " ")
            .replace(/\s+/g, " ")
            .trim();
    }


    /* =========================================================
       البحث عن الصفحة المطلوبة
       ========================================================= */

    function findPage(text) {

        const command = clean(text);

        /*
         * نرتب الأسماء من الأطول للأقصر
         * حتى لا يتم التقاط كلمة عامة قبل الاسم الكامل.
         */

        const sortedPages = [...pages].sort((a, b) => {

            const aLength =
                Math.max(
                    a.name.length,
                    ...a.aliases.map(x => x.length)
                );

            const bLength =
                Math.max(
                    b.name.length,
                    ...b.aliases.map(x => x.length)
                );

            return bLength - aLength;
        });


        for (const page of sortedPages) {

            const allNames = [
                page.name,
                ...page.aliases
            ];

            for (const alias of allNames) {

                const phrase = clean(alias);

                if (
                    command === phrase ||
                    command.includes(phrase)
                ) {
                    return page;
                }
            }
        }

        return null;
    }


    /* =========================================================
       فتح الصفحة
       ========================================================= */

    function openPage(page) {

        if (!page) {
            return false;
        }

        const currentFile =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        const targetFile =
            page.file.toLowerCase();


        /*
         * لو المستخدم بالفعل في الصفحة المطلوبة
         */

        if (currentFile === targetFile) {

            Voice.speak(
                "أنتِ بالفعل في صفحة " +
                page.name +
                ".",
                null
            );

            return true;
        }


        /*
         * الانتقال الحقيقي للصفحة
         */

        Voice.speak(
            "حاضر، جاري فتح صفحة " +
            page.name +
            ".",
            function () {

                window.location.href = page.file;
            }
        );

        return true;
    }


    /* =========================================================
       أمر: أنا فين؟
       ========================================================= */

    function answerCurrentPage() {

        const currentFile =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();


        const page = pages.find(p =>
            p.file.toLowerCase() === currentFile
        );


        if (page) {

            Voice.speak(
                "أنتِ الآن في صفحة " +
                page.name +
                ".",
                null
            );

        } else {

            Voice.speak(
                "أنتِ الآن في صفحة غير مسجلة عندي.",
                null
            );
        }

        return true;
    }


    /* =========================================================
       أمر: الصفحات المتاحة
       ========================================================= */

    function listAvailablePages() {

        const names =
            pages.map(page => page.name);


        let text =
            "الصفحات المتاحة هي: " +
            names.join("، ") +
            ".";


        Voice.speak(text, null);

        return true;
    }


    /* =========================================================
       أمر الرجوع
       ========================================================= */

    function goBack() {

        if (window.history.length > 1) {

            Voice.speak(
                "حاضر، سأرجع للصفحة السابقة.",
                function () {

                    window.history.back();
                }
            );

        } else {

            Voice.speak(
                "لا توجد صفحة سابقة للرجوع إليها.",
                null
            );
        }

        return true;
    }


    /* =========================================================
       تسجيل Part 3 داخل محرك الصوت
       ========================================================= */

    Voice.addCommandHandler(function (rawText) {

        const text = clean(rawText);

        if (!text) {
            return false;
        }


        /* -----------------------------------------------------
           أنا فين؟
           ----------------------------------------------------- */

        if (
            text === "انا فين" ||
            text.includes("انا فين") ||
            text.includes("أين أنا") ||
            text.includes("فين انا")
        ) {

            return answerCurrentPage();
        }


        /* -----------------------------------------------------
           الصفحات المتاحة
           ----------------------------------------------------- */

        if (
            text.includes("الصفحات المتاحة") ||
            text.includes("ايه الصفحات") ||
            text.includes("اي الصفحات") ||
            text.includes("ما هي الصفحات") ||
            text.includes("ما هي الصفحات المتاحة") ||
            text.includes("الصفحات اللي عندك")
        ) {

            return listAvailablePages();
        }


        /* -----------------------------------------------------
           الرجوع
           ----------------------------------------------------- */

        if (
            text === "ارجع" ||
            text === "رجوع" ||
            text === "ارجعي" ||
            text.includes("ارجع للصفحة السابقة") ||
            text.includes("ارجعي للصفحة السابقة")
        ) {

            return goBack();
        }


        /* -----------------------------------------------------
           فتح صفحة معينة
           ----------------------------------------------------- */

        const page = findPage(text);

        if (page) {

            return openPage(page);
        }


        /*
         * الأمر ليس من اختصاص Part 3.
         *
         * نرجع false حتى تقدر أي أجزاء أخرى
         * في MOBSAR تتعامل معه.
         */

        return false;

    });


    console.log(
        "MOBSAR Part 3 navigation loaded successfully."
    );

})();
</script>

</body>
</html>