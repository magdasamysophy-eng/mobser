<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MOBSAR | إدارة الملفات</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Cinzel:wght@700;800&display=swap"
        rel="stylesheet"
    >
<style>
/* =====================================================
   MOBSAR | إدارة الملفات
   notificationc.php
===================================================== */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Cairo', sans-serif;
}


/* =========================
   الصفحة
========================= */

body {
    background-color: #000000;

    background-image:
        radial-gradient(
            circle at 50% 15%,
            #150529 0%,
            #05020a 50%,
            #000000 90%
        );

    min-height: 100vh;

    color: #e5e7eb;

    display: flex;
    flex-direction: column;
    align-items: center;

    padding-bottom: 70px;

    overflow-x: hidden;
}


/* =========================
   الشريط العلوي
========================= */

.top-nav-bar {

    width: 90%;
    max-width: 1100px;

    display: flex;

    justify-content: flex-start;

    padding: 25px 0 0 0;

    align-items: center;
}


.home-back-btn {

    background:
        linear-gradient(
            135deg,
            #090314,
            #020104
        );

    border: 1px solid #d4af37;

    color: #d4af37;

    padding: 12px 22px;

    border-radius: 14px;

    font-weight: 600;

    text-decoration: none;

    display: inline-flex;

    align-items: center;

    gap: 8px;

    transition: 0.3s;

    box-shadow:
        0 0 15px
        rgba(212, 175, 55, 0.15);
}


.home-back-btn:hover {

    background: #d4af37;

    color: #000000;

    box-shadow:
        0 0 25px
        rgba(212, 175, 55, 0.7);

    transform:
        translateY(-2px);
}


/* =========================
   رأس الصفحة
========================= */

.hero-header {

    text-align: center;

    padding:
        10px 20px 5px 20px;

    width: 100%;

    display: flex;

    flex-direction: column;

    align-items: center;
}


/* =========================
   لوجو مبصر
========================= */

.mobsar-brand-wrapper {

    display: inline-flex;

    flex-direction: column;

    align-items: center;

    position: relative;

    padding: 25px 50px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(30, 10, 50, 0.9) 0%,
            rgba(5, 2, 10, 0.98) 80%
        );

    box-shadow:
        0 0 50px
        rgba(138, 43, 226, 0.35),

        inset 0 0 25px
        rgba(212, 175, 55, 0.25);

    border:
        1px solid
        rgba(212, 175, 55, 0.4);

    animation:
        magicGlow 3s infinite alternate;
}


/* =========================
   إضاءة اللوجو
========================= */

@keyframes magicGlow {

    0% {

        box-shadow:
            0 0 25px
            rgba(138, 43, 226, 0.3),

            inset 0 0 15px
            rgba(212, 175, 55, 0.15);

        border-color:
            rgba(212, 175, 55, 0.3);
    }


    100% {

        box-shadow:
            0 0 60px
            rgba(212, 175, 55, 0.5),

            inset 0 0 30px
            rgba(138, 43, 226, 0.5);

        border-color:
            rgba(212, 175, 55, 0.8);
    }
}


/* =========================
   العين
========================= */

.hero-eye-icon {

    font-size: 5.8rem;

    color: #d4af37;

    filter:
        drop-shadow(
            0 0 20px
            rgba(212, 175, 55, 0.7)
        );

    margin-bottom: -2px;

    animation:
        eyeFloat 2.5s infinite alternate;
}


@keyframes eyeFloat {

    from {

        transform:
            translateY(0)
            scale(1);
    }


    to {

        transform:
            translateY(-6px)
            scale(1.05);
    }
}


/* =========================
   اسم MOBSAR
========================= */

.big-mobsar-title {

    font-family: 'Cinzel', serif;

    font-style: italic;

    font-weight: 800;

    font-size: 5.5rem;

    background:
        linear-gradient(
            135deg,
            #ffffff,
            #d4af37,
            #b19cd9,
            #ffffff
        );

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;

    letter-spacing: 6px;

    transform:
        skewX(-8deg);

    filter:
        drop-shadow(
            0 0 20px
            rgba(138, 43, 226, 0.6)
        );
}


/* =========================
   الخط المضيء
========================= */

.massive-glow-line {

    width: 400px;

    height: 3px;

    background:
        linear-gradient(
            90deg,
            transparent,
            #d4af37,
            #8a2be2,
            transparent
        );

    box-shadow:
        0 0 25px #8a2be2,
        0 0 15px #d4af37;

    margin:
        20px auto 12px auto;

    border-radius: 50%;
}


/* =========================
   عنوان إدارة الملفات
========================= */

.sub-title {

    font-size: 2.3rem;

    color: #d4af37;

    margin-top: 5px;

    font-weight: 700;

    text-shadow:
        0 0 20px
        rgba(212, 175, 55, 0.5);
}


/* =========================
   الكروت الثلاثة
========================= */

.main-tasks-container {

    width: 90%;

    max-width: 1100px;

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 25px;

    margin-top: 35px;
}


/* =========================
   الكارت
========================= */

.card-box {

    background:
        linear-gradient(
            135deg,
            rgba(15, 6, 26, 0.95),
            rgba(3, 1, 6, 0.98)
        );

    backdrop-filter: blur(20px);

    border:
        1px solid
        rgba(212, 175, 55, 0.35);

    border-radius: 22px;

    padding: 35px 25px;

    min-height: 260px;

    text-align: center;

    cursor: pointer;

    box-shadow:
        0 20px 50px
        rgba(0, 0, 0, 0.95),

        0 0 30px
        rgba(138, 43, 226, 0.15),

        inset 0 0 25px
        rgba(212, 175, 55, 0.08);

    transition: 0.3s;
}


.card-box:hover {

    transform:
        translateY(-7px);

    border-color:
        rgba(212, 175, 55, 0.7);

    box-shadow:
        0 25px 60px
        rgba(0, 0, 0, 0.98),

        0 0 40px
        rgba(212, 175, 55, 0.25);
}


/* =========================
   أيقونة البرنامج
========================= */

.file-icon {

    font-size: 5rem;

    margin-bottom: 20px;

    filter:
        drop-shadow(
            0 0 15px
            rgba(212, 175, 55, 0.3)
        );
}


/* =========================
   عنوان الكارت
========================= */

.card-box h3 {

    color: #ffffff;

    font-size: 1.7rem;

    margin-bottom: 15px;

    border-bottom:
        1px solid
        rgba(212, 175, 55, 0.2);

    padding-bottom: 12px;
}


/* =========================
   وصف الكارت
========================= */

.card-box p {

    color: #d8b4fe;

    font-size: 1.05rem;

    line-height: 1.8;
}


/* =========================
   زر فتح البرنامج
========================= */

.open-file-btn {

    margin-top: 20px;

    background:
        linear-gradient(
            135deg,
            #d4af37,
            #997515
        );

    color: #000000;

    border: none;

    padding: 11px 25px;

    border-radius: 12px;

    font-weight: 700;

    font-size: 1rem;

    cursor: pointer;

    transition: 0.3s;

    box-shadow:
        0 5px 20px
        rgba(212, 175, 55, 0.3);
}


.open-file-btn:hover {

    background:
        linear-gradient(
            135deg,
            #fffbe6,
            #d4af37
        );

    transform:
        scale(1.04);

    box-shadow:
        0 0 25px
        rgba(212, 175, 55, 0.6);
}


/* =========================
   التركيز بالكيبورد
========================= */

.card-box:focus {

    outline: 2px solid #d4af37;

    outline-offset: 4px;
}


/* =========================
   الموبايل
========================= */

@media(max-width: 900px) {

    .main-tasks-container {

        grid-template-columns:
            repeat(2, 1fr);
    }
}


@media(max-width: 600px) {

    .top-nav-bar {

        width: 90%;
    }


    .hero-header {

        padding-top: 5px;
    }


    .mobsar-brand-wrapper {

        padding: 20px 35px;
    }


    .hero-eye-icon {

        font-size: 4.5rem;
    }


    .big-mobsar-title {

        font-size: 3.5rem;

        letter-spacing: 4px;
    }


    .massive-glow-line {

        width: 260px;
    }


    .sub-title {

        font-size: 1.8rem;
    }


    .main-tasks-container {

        grid-template-columns: 1fr;

        width: 90%;
    }


    .card-box {

        min-height: 230px;
    }
}

    </style>
</head>

<body>

    <!-- =========================
         زر العودة للرئيسية
    ========================== -->

    <div class="top-nav-bar">

        <a href="index.php" class="home-back-btn">
            🏠 العودة للرئيسية
        </a>

    </div>


    <!-- =========================
         رأس الصفحة
    ========================== -->

    <header class="hero-header">

        <div class="mobsar-brand-wrapper">

            <div class="hero-eye-icon">
                👁
            </div>

            <div class="big-mobsar-title">
                MOBSAR
            </div>

            <div class="massive-glow-line"></div>

        </div>

        <h1 class="sub-title">
            إدارة الملفات
        </h1>

    </header>


    <!-- =========================
         كروت البرامج
    ========================== -->

    <main class="main-tasks-container">


        <!-- Excel -->

        <div
            class="card-box"
            onclick="openProgram('Excel.php')"
            tabindex="0"
        >

            <div class="file-icon">
                📊
            </div>

            <h3>
                Excel
            </h3>

            <p>
                إنشاء الجداول والبيانات وتنظيمها
                باستخدام الأوامر الصوتية.
            </p>

            <button
                type="button"
                class="open-file-btn"
                onclick="event.stopPropagation(); openProgram('Excel.php')"
            >
                فتح Excel
            </button>

        </div>


        <!-- Word -->

        <div
            class="card-box"
            onclick="openProgram('Word.php')"
            tabindex="0"
        >

            <div class="file-icon">
                📝
            </div>

            <h3>
                Word
            </h3>

            <p>
                إنشاء وتعديل المستندات والكتابة
                باستخدام الأوامر الصوتية.
            </p>

            <button
                type="button"
                class="open-file-btn"
                onclick="event.stopPropagation(); openProgram('Word.php')"
            >
                فتح Word
            </button>

        </div>


        <!-- PowerPoint -->

        <div
            class="card-box"
            onclick="openProgram('PowerPoint.php')"
            tabindex="0"
        >

            <div class="file-icon">
                📽️
            </div>

            <h3>
                PowerPoint
            </h3>

            <p>
                إنشاء العروض التقديمية وإضافة
                الشرائح باستخدام الأوامر الصوتية.
            </p>

            <button
                type="button"
                class="open-file-btn"
                onclick="event.stopPropagation(); openProgram('PowerPoint.php')"
            >
                فتح PowerPoint
            </button>

        </div>


    </main>
<script>
/* =====================================================
   MOBSAR
   إدارة الملفات - الجزء الأول
   محرك الصوت
===================================================== */

(function () {

    "use strict";

    let recognition = null;

    let voiceStarted = false;
    let listening = false;
    let speaking = false;

    let firstInteractionDone = false;


    /* =========================
       Speech Recognition
    ========================= */

    function getSpeechRecognition() {

        return window.SpeechRecognition ||
               window.webkitSpeechRecognition ||
               null;

    }


    /* =========================
       تنظيف الكلام
    ========================= */

    function cleanCommand(text) {

        return String(text || "")
            .trim()
            .toLowerCase()

            .replace(/[إأآ]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")

            .replace(/[ًٌٍَُِّْـ]/g, "")

            .replace(/[؟?!.,،]/g, " ")

            .replace(/\s+/g, " ")
            .trim();

    }


    /* =========================
       إيقاف المايك
    ========================= */

    function stopListening() {

        if (!recognition) return;

        try {
            recognition.stop();
        } catch (error) {}

        listening = false;

    }


    /* =========================
       تشغيل المايك
    ========================= */

    function startListening() {

        if (!recognition) return;

        if (!voiceStarted) return;

        if (listening) return;

        if (speaking) return;


        try {

            recognition.start();

            listening = true;

        } catch (error) {

            listening = false;

        }

    }


    /* =========================
       الكلام
    ========================= */

    function speak(text, callback) {

        if (!text) return;


        stopListening();


        if (!window.speechSynthesis) {

            if (typeof callback === "function") {
                callback();
            }

            return;

        }


        speaking = true;

        window.speechSynthesis.cancel();


        const voice = new SpeechSynthesisUtterance(text);

        voice.lang = "ar-EG";

        voice.rate = 0.9;

        voice.pitch = 1;


        voice.onend = function () {

            speaking = false;


            if (typeof callback === "function") {
                callback();
            }


            setTimeout(function () {

                startListening();

            }, 250);

        };


        voice.onerror = function () {

            speaking = false;


            if (typeof callback === "function") {
                callback();
            }


            setTimeout(function () {

                startListening();

            }, 250);

        };


        window.speechSynthesis.speak(voice);

    }


    /* =========================
       إنشاء نظام التعرف
    ========================= */

    function setupRecognition() {

        const Recognition = getSpeechRecognition();


        if (!Recognition) {

            console.log(
                "Speech Recognition غير مدعوم في هذا المتصفح."
            );

            return false;

        }


        recognition = new Recognition();


        recognition.lang = "ar-EG";

        recognition.continuous = false;

        recognition.interimResults = false;

        recognition.maxAlternatives = 8;


        recognition.onstart = function () {

            listening = true;

        };


        recognition.onresult = function (event) {

            listening = false;


            if (
                !event.results ||
                !event.results[0] ||
                !event.results[0][0]
            ) {
                return;
            }


            const text =
                event.results[0][0].transcript;


            console.log(
                "MOBSAR COMMAND:",
                text
            );


            if (
                typeof window.handleMubCommand === "function"
            ) {

                window.handleMubCommand(text);

            }

        };


        recognition.onerror = function (event) {

            listening = false;


            console.log(
                "MOBSAR VOICE ERROR:",
                event.error
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


        recognition.onend = function () {

            listening = false;


            if (
                voiceStarted &&
                !speaking
            ) {

                setTimeout(
                    startListening,
                    350
                );

            }

        };


        return true;

    }


    /* =========================
       أول تفاعل
    ========================= */

    function startMubasarVoice() {

        if (voiceStarted) {

            startListening();

            return;

        }


        if (!setupRecognition()) {

            speak(
                "التعرف على الصوت غير مدعوم في هذا المتصفح."
            );

            return;

        }


        voiceStarted = true;


        if (!firstInteractionDone) {

            firstInteractionDone = true;


            speak(
                "مرحبًا بك في صفحة إدارة الملفات في مبصر. كيف يمكنني مساعدتك؟"
            );

        } else {

            startListening();

        }

    }


    /* =========================
       تصدير الدوال
    ========================= */

    window.startMubasarVoice =
        startMubasarVoice;


    window.startMubListening =
        startListening;


    window.stopMubListening =
        stopListening;


    window.mubSpeak =
        speak;


    window.cleanMubCommand =
        cleanCommand;


    /* =========================
       أول كليك أو لمس
    ========================= */

    document.addEventListener(
        "click",
        function () {

            startMubasarVoice();

        },
        {
            once: true
        }
    );


    document.addEventListener(
        "touchstart",
        function () {

            startMubasarVoice();

        },
        {
            once: true,
            passive: true
        }
    );


})();
</script>
<script>
/* =====================================================
   MOBSAR - PART TWO
   التنقل بين جميع صفحات مبصر
===================================================== */

const pages = {

    "الرئيسية": "index.php",
    "التسجيل": "register.php",
    "المهام": "tasks.php",
    "تقييم الإنجازات": "evaluation.php",
    "التقويم والمواعيد والأخبار": "schedule.php",
    "التواصل": "communication.php",
    "إدارة الملفات": "notifications.php",
    "المساعد البصري": "visual-assistant.php",
    "الروحانيات": "team.php",
    "الموظفون والمدير": "Employee.php",
    "الإعدادات": "settings.php",

    "Excel": "Excel.php",
    "Word": "Word.php",
    "PowerPoint": "PowerPoint.php"
};


/* =====================================================
   فتح الصفحة
===================================================== */

function openMubsarPage(page, message) {

    if (!page) return;

    if (
        typeof mubSpeak === "function" &&
        message
    ) {

        mubSpeak(message, function () {

            window.location.href = page;

        });

    } else {

        window.location.href = page;

    }
}


/* =====================================================
   فتح الصفحات
===================================================== */

function goHome() {
    openMubsarPage(
        pages["الرئيسية"],
        "تمام، جاري فتح الصفحة الرئيسية."
    );
}

function goRegister() {
    openMubsarPage(
        pages["التسجيل"],
        "تمام، جاري فتح صفحة التسجيل."
    );
}

function goTasks() {
    openMubsarPage(
        pages["المهام"],
        "تمام، جاري فتح صفحة المهام."
    );
}

function goEvaluation() {
    openMubsarPage(
        pages["تقييم الإنجازات"],
        "تمام، جاري فتح صفحة تقييم الإنجازات."
    );
}

function goSchedule() {
    openMubsarPage(
        pages["التقويم والمواعيد والأخبار"],
        "تمام، جاري فتح صفحة التقويم والمواعيد والأخبار."
    );
}

function goCommunication() {
    openMubsarPage(
        pages["التواصل"],
        "تمام، جاري فتح صفحة التواصل."
    );
}

function goFiles() {
    openMubsarPage(
        pages["إدارة الملفات"],
        "تمام، جاري فتح صفحة إدارة الملفات."
    );
}

function goVisualAssistant() {
    openMubsarPage(
        pages["المساعد البصري"],
        "تمام، جاري فتح المساعد البصري."
    );
}

function goSpiritual() {
    openMubsarPage(
        pages["الروحانيات"],
        "تمام، جاري فتح صفحة الروحانيات."
    );
}

function goEmployees() {
    openMubsarPage(
        pages["الموظفون والمدير"],
        "تمام، جاري فتح صفحة الموظفين والمدير."
    );
}

function goSettings() {
    openMubsarPage(
        pages["الإعدادات"],
        "تمام، جاري فتح صفحة الإعدادات."
    );
}

function goExcel() {
    openMubsarPage(
        pages["Excel"],
        "تمام، جاري فتح برنامج Excel."
    );
}

function goWord() {
    openMubsarPage(
        pages["Word"],
        "تمام، جاري فتح برنامج Word."
    );
}

function goPowerPoint() {
    openMubsarPage(
        pages["PowerPoint"],
        "تمام، جاري فتح برنامج PowerPoint."
    );
}


/* =====================================================
   تنظيف الكلام
===================================================== */

function normalizeCommand(text) {

    return String(text || "")
        .trim()
        .toLowerCase()
        .replace(/[إأآ]/g, "ا")
        .replace(/ى/g, "ي")
        .replace(/ة/g, "ه")
        .replace(/[ًٌٍَُِّْـ]/g, "")
        .replace(/[؟?!.,،]/g, " ")
        .replace(/\s+/g, " ")
        .trim();
}


/* =====================================================
   البحث داخل الأوامر
===================================================== */

function hasCommand(text, commands) {

    return commands.some(function(command) {

        return text.includes(
            normalizeCommand(command)
        );

    });
}


/* =====================================================
   استقبال الأمر الصوتي
===================================================== */

window.handleMubCommand = function(originalText) {

    const text = normalizeCommand(originalText);

    console.log(
        "MOBSAR COMMAND:",
        text
    );

    if (!text) return;


    /* =================================================
       معرفة الصفحة الحالية
    ================================================= */

    if (
        hasCommand(text, [

            "انا فين",
            "فين انا",
            "انا فين دلوقتي",
            "مكاني فين",
            "قولي انا فين",
            "انا موجود فين",
            "ايه الصفحه اللي انا فيها",
            "ايه الصفحة اللي انا فيها",
            "الصفحه الحاليه",
            "الصفحة الحالية"

        ])
    ) {

        mubSpeak(
            "أنت الآن في صفحة إدارة الملفات."
        );

        return;
    }


    /* =================================================
       الأوامر المتاحة
    ================================================= */

    if (
        hasCommand(text, [

            "ايه الاوامر",
            "إيه الأوامر",
            "ما هي الاوامر",
            "قولي الاوامر",
            "قولي الأوامر",
            "ايه الاوامر المطلوبه",
            "ايه الاوامر المطلوبة",
            "ايه اللي اقدر اعمله",
            "ممكن اعمل ايه",
            "قولي اقدر اعمل ايه",
            "اعمل ايه هنا",
            "ازاي استخدم الصفحه",
            "كيف استخدم الصفحة"

        ])
    ) {

        mubSpeak(
            "يمكنك الانتقال إلى الرئيسية، التسجيل، المهام، تقييم الإنجازات، التقويم والمواعيد والأخبار، التواصل، إدارة الملفات، المساعد البصري، الروحانيات، الموظفين والمدير، والإعدادات. ويمكنك أيضًا فتح Excel أو Word أو PowerPoint."
        );

        return;
    }


    /* =================================================
       الرئيسية
    ================================================= */

    if (
        hasCommand(text, [

            "الرئيسيه",
            "الرئيسية",
            "الصفحه الرئيسيه",
            "الصفحة الرئيسية",
            "اندكس",
            "index",

            "افتح الرئيسية",
            "افتح الرئيسيه",
            "افتح الصفحة الرئيسية",
            "افتح الصفحه الرئيسيه",

            "وديني للرئيسية",
            "وديني للرئيسيه",
            "وديني للصفحة الرئيسية",
            "وديني للصفحه الرئيسيه",

            "روح للرئيسية",
            "روح للرئيسيه",

            "عايز الرئيسية",
            "عايزه الرئيسية",
            "عايز الصفحة الرئيسية",
            "عايزه الصفحة الرئيسية",

            "اذهب للرئيسية",
            "ارجع للرئيسية",
            "رجعني للرئيسية"

        ])
    ) {

        goHome();
        return;
    }


    /* =================================================
       التسجيل
    ================================================= */

    if (
        hasCommand(text, [

            "التسجيل",
            "صفحة التسجيل",
            "الصفحه بتاعت التسجيل",
            "التسجيل الجديد",

            "افتح التسجيل",
            "افتح صفحة التسجيل",

            "وديني للتسجيل",
            "وديني لصفحة التسجيل",

            "روح للتسجيل",

            "عايز التسجيل",
            "عايزه التسجيل",

            "سجلني",

            "اذهب للتسجيل",

            "register"

        ])
    ) {

        goRegister();
        return;
    }


    /* =================================================
       المهام
    ================================================= */

    if (
        hasCommand(text, [

            "المهام",
            "صفحة المهام",
            "صفحه المهام",
            "الصفحه بتاعت المهام",

            "افتح المهام",
            "افتح صفحة المهام",

            "وديني للمهام",
            "وديني لصفحة المهام",

            "روح للمهام",

            "عايز المهام",
            "عايزه المهام",

            "الشغل",
            "صفحة الشغل",
            "صفحه الشغل",

            "اذهب للمهام"

        ])
    ) {

        goTasks();
        return;
    }


    /* =================================================
       تقييم الإنجازات
    ================================================= */

    if (
        hasCommand(text, [

            "التقييم",
            "تقييم",

            "الانجازات",
            "الإنجازات",
            "انجازات",

            "تقييم الإنجازات",
            "تقييم الانجازات",

            "صفحة التقييم",
            "صفحه التقييم",

            "صفحة الإنجازات",
            "صفحه الانجازات",

            "افتح التقييم",
            "افتح الإنجازات",

            "وديني للتقييم",
            "وديني للإنجازات",

            "روح للتقييم",
            "روح للإنجازات",

            "عايز التقييم",
            "عايزه التقييم",

            "عايز الإنجازات",
            "عايزه الإنجازات",

            "اذهب للتقييم"

        ])
    ) {

        goEvaluation();
        return;
    }


    /* =================================================
       التقويم والمواعيد والأخبار
    ================================================= */

    if (
        hasCommand(text, [

            "التقويم",

            "صفحة التقويم",
            "صفحه التقويم",

            "المواعيد",
            "مواعيد",

            "صفحة المواعيد",
            "صفحه المواعيد",

            "الاخبار",
            "الأخبار",
            "اخبار",

            "صفحة الأخبار",
            "صفحه الاخبار",

            "التقويم والمواعيد",
            "التقويم والمواعيد والأخبار",
            "التقويم والمواعيد والاخبار",

            "مواعيد الأخبار",
            "المواعيد والأخبار",

            "صفحة التقويم والمواعيد والأخبار",

            "افتح التقويم",
            "افتح المواعيد",
            "افتح الأخبار",

            "وديني للتقويم",
            "وديني للمواعيد",
            "وديني للأخبار",

            "روح للتقويم",
            "روح للمواعيد",
            "روح للأخبار",

            "عايز التقويم",
            "عايزه التقويم",

            "عايز المواعيد",
            "عايزه المواعيد"

        ])
    ) {

        goSchedule();
        return;
    }


    /* =================================================
       التواصل
    ================================================= */

    if (
        hasCommand(text, [

            "التواصل",
            "صفحة التواصل",
            "صفحه التواصل",

            "افتح التواصل",

            "وديني للتواصل",
            "وديني لصفحة التواصل",

            "روح للتواصل",

            "عايز التواصل",
            "عايزه التواصل",

            "اذهب للتواصل"

        ])
    ) {

        goCommunication();
        return;
    }


    /* =================================================
       إدارة الملفات
    ================================================= */

    if (
        hasCommand(text, [

            "ادارة الملفات",
            "إدارة الملفات",
            "صفحة إدارة الملفات",
            "صفحه اداره الملفات",

            "الملفات",
            "صفحة الملفات",

            "افتح إدارة الملفات",
            "افتح ادارة الملفات",

            "وديني لإدارة الملفات",
            "وديني لادارة الملفات",

            "روح لإدارة الملفات",
            "روح لادارة الملفات",

            "عايز إدارة الملفات",
            "عايزه إدارة الملفات"

        ])
    ) {

        goFiles();
        return;
    }


    /* =================================================
       المساعد البصري
    ================================================= */

    if (
        hasCommand(text, [

            "المساعد البصري",
            "المساعد البصريه",

            "صفحة المساعد البصري",
            "صفحه المساعد البصري",

            "المساعد",

            "افتح المساعد",
            "افتح المساعد البصري",

            "وديني للمساعد",
            "وديني للمساعد البصري",

            "روح للمساعد",
            "روح للمساعد البصري",

            "عايز المساعد",
            "عايزه المساعد"

        ])
    ) {

        goVisualAssistant();
        return;
    }


    /* =================================================
       الروحانيات
       الملف: team.php
    ================================================= */

    if (
        hasCommand(text, [

            "الروحانيات",
            "روحانيات",

            "صفحة الروحانيات",
            "صفحه الروحانيات",

            "افتح الروحانيات",
            "افتح صفحة الروحانيات",

            "وديني للروحانيات",
            "وديني لصفحة الروحانيات",

            "روح للروحانيات",

            "عايز الروحانيات",
            "عايزه الروحانيات",

            "اذهب للروحانيات",

            "تيم",
            "team"

        ])
    ) {

        goSpiritual();
        return;
    }


    /* =================================================
       الموظفون والمدير
       الملف: Employee.php
    ================================================= */

    if (
        hasCommand(text, [

            "الموظفون والمدير",
            "الموظفين والمدير",

            "الموظفين",
            "الموظفون",

            "صفحة الموظفين",
            "صفحه الموظفين",

            "صفحة الموظفين والمدير",
            "صفحه الموظفين والمدير",

            "افتح الموظفين",
            "افتح الموظفين والمدير",

            "وديني للموظفين",
            "وديني للموظفين والمدير",

            "روح للموظفين",
            "روح للموظفين والمدير",

            "عايز الموظفين",
            "عايزه الموظفين",

            "اذهب للموظفين",

            "employee"

        ])
    ) {

        goEmployees();
        return;
    }


    /* =================================================
       الإعدادات
    ================================================= */

    if (
        hasCommand(text, [

            "الإعدادات",
            "الاعدادات",
            "اعدادات",

            "صفحة الإعدادات",
            "صفحه الاعدادات",

            "افتح الإعدادات",
            "افتح الاعدادات",

            "وديني للإعدادات",
            "وديني للاعدادات",

            "روح للإعدادات",
            "روح للاعدادات",

            "عايز الإعدادات",
            "عايزه الإعدادات",

            "اذهب للإعدادات"

        ])
    ) {

        goSettings();
        return;
    }


    /* =================================================
       EXCEL
    ================================================= */

    if (
        hasCommand(text, [

            "اكسل",
            "الاكسل",
            "الإكسل",
            "excel",

            "افتح اكسل",
            "افتح الاكسل",
            "افتح الإكسل",

            "افتح برنامج اكسل",
            "افتح برنامج الاكسل",

            "برنامج اكسل",
            "برنامج الاكسل",

            "وديني لاكسل",
            "وديني للاكسل",

            "روح لاكسل",
            "روح للاكسل",

            "عايز اكسل",
            "عايزه اكسل"

        ])
    ) {

        goExcel();
        return;
    }


    /* =================================================
       WORD
    ================================================= */

    if (
        hasCommand(text, [

            "ورد",
            "وورد",
            "الورد",
            "الوورد",
            "word",

            "افتح ورد",
            "افتح وورد",
            "افتح الورد",
            "افتح الوورد",

            "افتح برنامج ورد",
            "افتح برنامج وورد",

            "برنامج ورد",
            "برنامج وورد",

            "وديني لورد",
            "وديني لوورد",

            "روح لورد",
            "روح لوورد",

            "عايز ورد",
            "عايزه ورد",
            "عايز وورد",
            "عايزه وورد"

        ])
    ) {

        goWord();
        return;
    }


    /* =================================================
       POWERPOINT
       موسع جدًا لمنع مشكلة "مش فاهم الأمر"
    ================================================= */

    if (
        hasCommand(text, [

            "باوربوينت",
            "باور بوينت",
            "الباوربوينت",
            "الباور بوينت",

            "باوربونت",
            "باور بونت",
            "الباوربونت",
            "الباور بونت",

            "powerpoint",
            "power point",

            "برنامج باوربوينت",
            "برنامج باور بوينت",
            "برنامج باوربونت",
            "برنامج باور بونت",

            "افتح باوربوينت",
            "افتح باور بوينت",
            "افتح باوربونت",
            "افتح باور بونت",

            "افتح الباوربوينت",
            "افتح الباور بوينت",
            "افتح الباوربونت",
            "افتح الباور بونت",

            "افتح برنامج باوربوينت",
            "افتح برنامج باور بوينت",
            "افتح برنامج باوربونت",
            "افتح برنامج باور بونت",

            "وديني لباوربوينت",
            "وديني لباور بوينت",
            "وديني لباوربونت",
            "وديني لباور بونت",

            "روح لباوربوينت",
            "روح لباور بوينت",

            "عايز باوربوينت",
            "عايزه باوربوينت",
            "عايز باور بوينت",
            "عايزه باور بوينت"

        ])
    ) {

        goPowerPoint();
        return;
    }


    /* =================================================
       أمر تنقل بدون تحديد الصفحة
    ================================================= */

    if (
        text.includes("وديني") ||
        text.includes("روح") ||
        text.includes("اذهب") ||
        text.includes("عايز اروح") ||
        text.includes("عايزه اروح")
    ) {

        mubSpeak(
            "قولي اسم الصفحة اللي عايزة تروحي لها، مثل الرئيسية أو المهام أو التقييم أو التقويم أو التواصل أو إدارة الملفات أو المساعد البصري أو الروحانيات أو الموظفين أو الإعدادات."
        );

        return;
    }


    /* =================================================
       أمر غير مفهوم
    ================================================= */

    mubSpeak(
        "مش فاهم الأمر. قولي إيه الأوامر عشان أقول لك الأوامر المتاحة."
    );

};


/* =====================================================
   دعم الكيبورد للكروت
===================================================== */

document.addEventListener(
    "keydown",
    function(event) {

        const card =
            event.target.closest(".card-box");

        if (!card) return;

        if (
            event.key === "Enter" ||
            event.key === " "
        ) {

            event.preventDefault();

            card.click();
        }

    }
);

</script>



    <!-- =========================
         JavaScript
    ========================== -->

    <script>

        function openProgram(page) {

            window.location.href = page;

        }

    </script>


</body>

</html>