<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MABSAR | الإعدادات</title>


    <!-- =========================
         بداية الـ Style
         ========================= -->

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
        }


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

            justify-content: space-between;

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
                0 0 15px rgba(212,175,55,0.15);
        }


        .home-back-btn:hover {

            background: #d4af37;

            color: #000000;

            box-shadow:
                0 0 25px rgba(212,175,55,0.7);

            transform: translateY(-2px);
        }


        /* =========================
           رأس الصفحة
           ========================= */

        .hero-header {

            text-align: center;

            padding: 10px 20px 5px 20px;

            width: 100%;

            display: flex;

            flex-direction: column;

            align-items: center;
        }


        /* =========================
           شكل MABSAR
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
                    rgba(30,10,50,0.9) 0%,
                    rgba(5,2,10,0.98) 80%
                );

            box-shadow:
                0 0 50px rgba(138,43,226,0.35),
                inset 0 0 25px rgba(212,175,55,0.25);

            border: 1px solid rgba(212,175,55,0.4);

            animation: magicGlow 3s infinite alternate;
        }


        @keyframes magicGlow {

            0% {

                box-shadow:
                    0 0 25px rgba(138,43,226,0.3),
                    inset 0 0 15px rgba(212,175,55,0.15);

                border-color:
                    rgba(212,175,55,0.3);
            }

            100% {

                box-shadow:
                    0 0 60px rgba(212,175,55,0.5),
                    inset 0 0 30px rgba(138,43,226,0.5);

                border-color:
                    rgba(212,175,55,0.8);
            }
        }


        .hero-eye-icon {

            font-size: 5.8rem;

            color: #d4af37;

            filter:
                drop-shadow(
                    0 0 20px rgba(212,175,55,0.7)
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

            transform: skewX(-8deg);

            filter:
                drop-shadow(
                    0 0 20px rgba(138,43,226,0.6)
                );
        }


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

            margin: 20px auto 12px auto;

            border-radius: 50%;
        }


        .sub-title {

            font-size: 2.3rem;

            color: #d4af37;

            margin-top: 5px;

            font-weight: 700;

            text-shadow:
                0 0 20px rgba(212,175,55,0.5);
        }


        /* =========================
           كروت الإعدادات
           ========================= */

        .settings-container {

            width: 90%;

            max-width: 1100px;

            display: flex;

            flex-direction: column;

            gap: 20px;

            margin-top: 25px;
        }


        .setting-card {

            width: 100%;

            background:
                linear-gradient(
                    135deg,
                    rgba(15,6,26,0.95),
                    rgba(3,1,6,0.98)
                );

            backdrop-filter: blur(20px);

            border: 1px solid rgba(212,175,55,0.35);

            border-radius: 22px;

            padding: 25px;

            box-shadow:
                0 20px 50px rgba(0,0,0,0.95),
                0 0 30px rgba(138,43,226,0.15),
                inset 0 0 25px rgba(212,175,55,0.08);

            transition: 0.3s;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        .setting-card:hover {

            border-color:
                rgba(212,175,55,0.7);

            box-shadow:
                0 25px 60px rgba(0,0,0,0.98),
                0 0 40px rgba(212,175,55,0.25);
        }


        .setting-content {

            flex: 1;

            text-align: right;
        }


        .setting-content h2 {

            color: #ffffff;

            font-size: 1.35rem;

            margin-bottom: 8px;
        }


        .setting-content p {

            color: #d8b4fe;

            font-size: 1rem;
        }


        .setting-icon {

            width: 65px;

            height: 65px;

            min-width: 65px;

            border-radius: 18px;

            background: #0d041a;

            border: 1px solid #d4af37;

            color: #d4af37;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 2rem;

            box-shadow:
                0 0 20px rgba(212,175,55,0.15);
        }


        /* =========================
           أزرار الإعدادات
           ========================= */

        .setting-btn {

            background:
                linear-gradient(
                    135deg,
                    #d4af37,
                    #997515
                );

            color: #000000;

            border: none;

            padding: 12px 22px;

            border-radius: 12px;

            font-weight: 700;

            font-size: 1rem;

            cursor: pointer;

            transition: 0.3s;

            min-width: 100px;
        }


        .setting-btn:hover {

            background:
                linear-gradient(
                    135deg,
                    #fffbe6,
                    #d4af37
                );

            transform: scale(1.02);

            box-shadow:
                0 0 25px rgba(212,175,55,0.6);
        }


        /* =========================
           سرعات الصوت
           ========================= */

        .speed-buttons {

            display: flex;

            gap: 8px;

            margin-top: 12px;

            justify-content: flex-start;
        }


        .speed-btn {

            background: #0d041a;

            border: 1px solid #d4af37;

            color: #d4af37;

            padding: 8px 15px;

            border-radius: 9px;

            cursor: pointer;

            transition: 0.3s;
        }


        .speed-btn:hover {

            background: #d4af37;

            color: #000000;
        }


        .speed-btn.active {

            background: #d4af37;

            color: #000000;

            font-weight: 700;
        }


        /* =========================
           الموبايل
           ========================= */

        @media(max-width: 768px) {

            .big-mobsar-title {

                font-size: 4rem;
            }


            .massive-glow-line {

                width: 280px;
            }


            .setting-card {

                padding: 20px;

                flex-wrap: wrap;
            }


            .setting-content {

                min-width: calc(100% - 85px);
            }


            .setting-btn {

                width: 100%;

                margin-top: 10px;
            }
        }


        @media(max-width: 480px) {

            .big-mobsar-title {

                font-size: 3rem;

                letter-spacing: 3px;
            }


            .hero-eye-icon {

                font-size: 4.5rem;
            }


            .sub-title {

                font-size: 1.8rem;
            }


            .mobsar-brand-wrapper {

                padding: 20px 25px;
            }


            .speed-buttons {

                flex-wrap: wrap;
            }
        }

    </style>


</head>


<body>


    <!-- =========================
         زر العودة للرئيسية
         ========================= -->

    <div class="top-nav-bar">

        <a href="index.php" class="home-back-btn">
            🏠 العودة للرئيسية
        </a>

    </div>


    <!-- =========================
         رأس الصفحة
         ========================= -->

    <header class="hero-header">

        <div class="mobsar-brand-wrapper">

            <div class="hero-eye-icon">
                👁
            </div>

            <div class="big-mobsar-title">
                MABSAR
            </div>

        </div>


        <div class="massive-glow-line"></div>


        <h1 class="sub-title">
            الإعدادات
        </h1>

    </header>


    <!-- =========================
         الإعدادات
         ========================= -->

    <main class="settings-container">


        <!-- 1 - القراءة الصوتية -->

        <section class="setting-card">

            <div class="setting-icon">
                🔊
            </div>

            <div class="setting-content">

                <h2>
                    القراءة الصوتية
                </h2>

                <p id="voiceText">
                    مفعلة
                </p>

            </div>

            <button
                class="setting-btn"
                id="voiceToggle"
                onclick="toggleVoice()">

                إيقاف

            </button>

        </section>


        <!-- 2 - القراءة عند اللمس -->

        <section class="setting-card">

            <div class="setting-icon">
                👆
            </div>

            <div class="setting-content">

                <h2>
                    القراءة عند اللمس
                </h2>

                <p id="touchText">
                    مفعلة
                </p>

            </div>

            <button
                class="setting-btn"
                id="touchToggle"
                onclick="toggleTouch()">

                إيقاف

            </button>

        </section>


        <!-- 3 - التباين العالي -->

        <section class="setting-card">

            <div class="setting-icon">
                ◐
            </div>

            <div class="setting-content">

                <h2>
                    التباين العالي
                </h2>

                <p id="contrastText">
                    موقفة
                </p>

            </div>

            <button
                class="setting-btn"
                id="contrastToggle"
                onclick="toggleContrast()">

                تفعيل

            </button>

        </section>


        <!-- 4 - سرعة الصوت -->

        <section class="setting-card">

            <div class="setting-icon">
                🔊
            </div>

            <div class="setting-content">

                <h2>
                    سرعة الصوت
                </h2>

                <p id="speedText">
                    متوسطة
                </p>


                <div class="speed-buttons">

                    <button
                        class="speed-btn"
                        onclick="setSpeed(0.7,'بطيئة',this)">
                        بطيئة
                    </button>

                    <button
                        class="speed-btn active"
                        onclick="setSpeed(1,'متوسطة',this)">
                        متوسطة
                    </button>

                    <button
                        class="speed-btn"
                        onclick="setSpeed(1.3,'سريعة',this)">
                        سريعة
                    </button>

                </div>

            </div>

        </section>


    </main>
<script>

let voiceEnabled = true;
let touchEnabled = true;
let highContrast = false;

let speechRate = 1;

let voiceStarted = false;
let isSpeaking = false;
let waitingForAnswer = false;

let currentQuestion = "";
let settingsMode = false;

let recognition = null;
let recognitionRunning = false;


// ======================================
// تهيئة التعرف على الصوت
// ======================================

const SpeechRecognition =
    window.SpeechRecognition ||
    window.webkitSpeechRecognition;

if (SpeechRecognition) {

    recognition = new SpeechRecognition();

    recognition.lang = "ar-EG";
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.maxAlternatives = 5;


    recognition.onstart = function () {

        recognitionRunning = true;

        console.log("Voice recognition started");

    };


    recognition.onresult = function (event) {

        recognitionRunning = false;

        let command = "";

        for (let i = 0; i < event.results.length; i++) {

            command += event.results[i][0].transcript + " ";

        }

        command = command.trim();

        console.log("User said:", command);

        if (command !== "") {

            processVoiceCommand(command);

        }

    };


    recognition.onerror = function (event) {

        recognitionRunning = false;

        console.log(
            "Speech recognition error:",
            event.error
        );

    };


    recognition.onend = function () {

        recognitionRunning = false;

        console.log("Voice recognition ended");

        /*
         * لو مفيش سؤال منتظر إجابة،
         * نرجع نستمع للأوامر بشكل طبيعي.
         */

        if (
            voiceStarted &&
            !isSpeaking &&
            !waitingForAnswer
        ) {

            setTimeout(function () {

                startListening();

            }, 400);

        }

    };

}


// ======================================
// تنظيف الكلام قبل المقارنة
// ======================================

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


// ======================================
// تشغيل الصوت
// ======================================

function speak(text, callback = null) {

    if (!window.speechSynthesis) {

        if (callback) {
            callback();
        }

        return;

    }

    isSpeaking = true;

    /*
     * نوقف التعرف أثناء كلام المساعد
     * حتى لا يسمع المساعد صوته.
     */

    stopListening();

    window.speechSynthesis.cancel();

    const utterance =
        new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-EG";

    utterance.rate = speechRate;

    utterance.pitch = 1;

    utterance.volume = 1;


    utterance.onend = function () {

        isSpeaking = false;

        if (callback) {

            callback();

        }

    };


    utterance.onerror = function () {

        isSpeaking = false;

        if (callback) {

            callback();

        }

    };


    window.speechSynthesis.speak(utterance);

}


// ======================================
// تشغيل الاستماع
// ======================================

function startListening() {

    if (!recognition) {

        speak(
            "المتصفح لا يدعم التعرف على الصوت."
        );

        return;

    }


    if (isSpeaking) {
        return;
    }


    if (recognitionRunning) {
        return;
    }


    try {

        recognition.start();

    }

    catch (error) {

        console.log(
            "Recognition start error:",
            error
        );

    }

}


// ======================================
// إيقاف الاستماع
// ======================================

function stopListening() {

    if (!recognition) {
        return;
    }

    if (!recognitionRunning) {
        return;
    }


    try {

        recognition.stop();

    }

    catch (error) {

        console.log(
            "Recognition stop error:",
            error
        );

    }

}


// ======================================
// أول ضغطة في الصفحة
// ======================================

function startVoiceFromUser() {

    if (voiceStarted) {
        return;
    }


    voiceStarted = true;


    speak(
        "مرحبًا بك في إعدادات نظام مبصر. " +
        "أنا جاهز لمساعدتك في تغيير الإعدادات أو الانتقال بين صفحات النظام.",
        function () {

            startSettingsMode();

        }
    );

}


// ======================================
// منع أول ضغطة من تنفيذ قراءة بطاقة
// ======================================

let firstClickConsumed = false;


document.addEventListener(
    "click",
    function () {

        if (voiceStarted) {
            return;
        }


        firstClickConsumed = true;

        startVoiceFromUser();


        setTimeout(function () {

            firstClickConsumed = false;

        }, 100);

    },
    {
        once: true
    }
);
// ======================================
// بداية وضع الإعدادات
// ======================================

function startSettingsMode() {

    settingsMode = true;

    waitingForAnswer = true;

    currentQuestion = "main";


    speak(
        "أنت الآن في صفحة الإعدادات. " +
        "يمكنك تغيير القراءة الصوتية، " +
        "القراءة عند اللمس، " +
        "التباين العالي، أو سرعة الصوت. " +
        "هل تريد تغيير الإعدادات؟ قولي نعم أو لا.",
        function () {

            startListening();

        }
    );

}


// ======================================
// تشغيل وإيقاف القراءة الصوتية
// ======================================

function toggleVoice() {

    voiceEnabled = !voiceEnabled;


    const text =
        document.getElementById("voiceText");

    const button =
        document.getElementById("voiceToggle");


    if (voiceEnabled) {

        if (text) {
            text.textContent = "مفعلة";
        }

        if (button) {
            button.textContent = "إيقاف";
        }


        speak(
            "تم تفعيل القراءة الصوتية."
        );

    }

    else {

        if (text) {
            text.textContent = "موقفة";
        }

        if (button) {
            button.textContent = "تفعيل";
        }


        speak(
            "تم إيقاف القراءة الصوتية."
        );

    }

}


// ======================================
// تشغيل وإيقاف القراءة عند اللمس
// ======================================

function toggleTouch() {

    touchEnabled = !touchEnabled;


    const text =
        document.getElementById("touchText");

    const button =
        document.getElementById("touchToggle");


    if (touchEnabled) {

        if (text) {
            text.textContent = "مفعلة";
        }

        if (button) {
            button.textContent = "إيقاف";
        }


        speak(
            "تم تفعيل القراءة عند اللمس."
        );

    }

    else {

        if (text) {
            text.textContent = "موقفة";
        }

        if (button) {
            button.textContent = "تفعيل";
        }


        speak(
            "تم إيقاف القراءة عند اللمس."
        );

    }

}


// ======================================
// التباين العالي
// ======================================

function toggleContrast() {

    highContrast = !highContrast;


    const text =
        document.getElementById("contrastText");

    const button =
        document.getElementById("contrastToggle");


    if (highContrast) {

        document.body.classList.add(
            "high-contrast"
        );


        if (text) {
            text.textContent = "مفعلة";
        }


        if (button) {
            button.textContent = "إيقاف";
        }


        speak(
            "تم تفعيل التباين العالي."
        );

    }

    else {

        document.body.classList.remove(
            "high-contrast"
        );


        if (text) {
            text.textContent = "موقفة";
        }


        if (button) {
            button.textContent = "تفعيل";
        }


        speak(
            "تم إيقاف التباين العالي."
        );

    }

}


// ======================================
// سرعة الصوت
// ======================================

function setSpeed(rate, name, button) {

    speechRate = rate;


    const speedText =
        document.getElementById("speedText");


    if (speedText) {

        speedText.textContent = name;

    }


    document
        .querySelectorAll(".speed-btn")
        .forEach(function (btn) {

            btn.classList.remove("active");

        });


    if (button) {

        button.classList.add("active");

    }


    speak(
        "تم تغيير سرعة الصوت إلى " + name + "."
    );

}


// ======================================
// قراءة محتويات صفحة الإعدادات
// ======================================

function readSettingsPage() {

    const voiceStatus =
        voiceEnabled
            ? "القراءة الصوتية مفعلة."
            : "القراءة الصوتية موقفة.";


    const touchStatus =
        touchEnabled
            ? "القراءة عند اللمس مفعلة."
            : "القراءة عند اللمس موقفة.";


    const contrastStatus =
        highContrast
            ? "التباين العالي مفعل."
            : "التباين العالي موقّف.";


    const speedStatus =
        speechRate <= 0.7
            ? "سرعة الصوت بطيئة."
            : speechRate >= 1.3
                ? "سرعة الصوت سريعة."
                : "سرعة الصوت متوسطة.";


    speak(
        "محتويات صفحة الإعدادات. " +
        voiceStatus + " " +
        touchStatus + " " +
        contrastStatus + " " +
        speedStatus,
        function () {

            if (voiceStarted) {

                startListening();

            }

        }
    );

}


// ======================================
// معالجة إجابة إعدادات الصوت
// ======================================

function handleSettingsAnswer(text) {

    if (currentQuestion === "main") {

        if (
            text.includes("نعم") ||
            text.includes("ايوه") ||
            text.includes("اه") ||
            text.includes("عايز") ||
            text.includes("عاوزه")
        ) {

            waitingForAnswer = true;

            currentQuestion = "voice";


            speak(
                "هل تريد القراءة الصوتية مفعلة أم موقفة؟ " +
                "قولي مفعلة أو موقفة.",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("لا") ||
            text.includes("مش عايز") ||
            text.includes("مش عايزه")
        ) {

            waitingForAnswer = false;

            currentQuestion = "";

            speak(
                "تمام. أنا جاهز لأي أمر آخر.",
                function () {

                    startListening();

                }
            );

            return;

        }

    }


    // ==================================
    // إعداد القراءة الصوتية
    // ==================================

    if (currentQuestion === "voice") {

        if (
            text.includes("مفعله") ||
            text.includes("مفعل") ||
            text.includes("تشغيل") ||
            text.includes("شغل")
        ) {

            voiceEnabled = true;


            const voiceText =
                document.getElementById("voiceText");

            const voiceButton =
                document.getElementById("voiceToggle");


            if (voiceText) {
                voiceText.textContent = "مفعلة";
            }


            if (voiceButton) {
                voiceButton.textContent = "إيقاف";
            }


            currentQuestion = "touch";


            speak(
                "تم تفعيل القراءة الصوتية. " +
                "هل تريد القراءة عند اللمس مفعلة أم موقفة؟",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("موقفه") ||
            text.includes("موقوف") ||
            text.includes("ايقاف") ||
            text.includes("اقفل")
        ) {

            voiceEnabled = false;


            const voiceText =
                document.getElementById("voiceText");

            const voiceButton =
                document.getElementById("voiceToggle");


            if (voiceText) {
                voiceText.textContent = "موقفة";
            }


            if (voiceButton) {
                voiceButton.textContent = "تفعيل";
            }


            currentQuestion = "touch";


            speak(
                "تم إيقاف القراءة الصوتية. " +
                "هل تريد القراءة عند اللمس مفعلة أم موقفة؟",
                function () {

                    startListening();

                }
            );

            return;

        }

    }


    // ==================================
    // إعداد القراءة عند اللمس
    // ==================================

    if (currentQuestion === "touch") {

        if (
            text.includes("مفعله") ||
            text.includes("مفعل") ||
            text.includes("تشغيل") ||
            text.includes("شغل")
        ) {

            touchEnabled = true;


            const touchText =
                document.getElementById("touchText");

            const touchButton =
                document.getElementById("touchToggle");


            if (touchText) {
                touchText.textContent = "مفعلة";
            }


            if (touchButton) {
                touchButton.textContent = "إيقاف";
            }


            currentQuestion = "contrast";


            speak(
                "تم تفعيل القراءة عند اللمس. " +
                "هل تريد التباين العالي مفعلاً أم موقوفاً؟",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("موقفه") ||
            text.includes("موقوف") ||
            text.includes("ايقاف") ||
            text.includes("اقفل")
        ) {

            touchEnabled = false;


            const touchText =
                document.getElementById("touchText");

            const touchButton =
                document.getElementById("touchToggle");


            if (touchText) {
                touchText.textContent = "موقفة";
            }


            if (touchButton) {
                touchButton.textContent = "تفعيل";
            }


            currentQuestion = "contrast";


            speak(
                "تم إيقاف القراءة عند اللمس. " +
                "هل تريد التباين العالي مفعلاً أم موقوفاً؟",
                function () {

                    startListening();

                }
            );

            return;

        }

    }
    // ============================================
    // التباين العالي
    // ============================================

    if (currentQuestion === "contrast") {

        if (
            text.includes("مفعل") ||
            text.includes("مفعله") ||
            text.includes("تشغيل") ||
            text.includes("شغل")
        ) {

            highContrast = true;

            document.body.classList.add(
                "high-contrast"
            );


            const contrastText =
                document.getElementById("contrastText");

            const contrastButton =
                document.getElementById("contrastToggle");


            if (contrastText) {
                contrastText.textContent = "مفعلة";
            }


            if (contrastButton) {
                contrastButton.textContent = "إيقاف";
            }


            currentQuestion = "speed";


            speak(
                "تم تفعيل التباين العالي. " +
                "ما سرعة الصوت التي تريدها؟ " +
                "بطيئة، متوسطة، أم سريعة؟",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("موقف") ||
            text.includes("موقوف") ||
            text.includes("ايقاف") ||
            text.includes("اقفل")
        ) {

            highContrast = false;

            document.body.classList.remove(
                "high-contrast"
            );


            const contrastText =
                document.getElementById("contrastText");

            const contrastButton =
                document.getElementById("contrastToggle");


            if (contrastText) {
                contrastText.textContent = "موقفة";
            }


            if (contrastButton) {
                contrastButton.textContent = "تفعيل";
            }


            currentQuestion = "speed";


            speak(
                "تم إيقاف التباين العالي. " +
                "ما سرعة الصوت التي تريدها؟ " +
                "بطيئة، متوسطة، أم سريعة؟",
                function () {

                    startListening();

                }
            );

            return;

        }

    }


    // ============================================
    // سرعة الصوت
    // ============================================

    if (currentQuestion === "speed") {

        if (
            text.includes("بطيئه") ||
            text.includes("بطيء") ||
            text.includes("بطيئ")
        ) {

            speechRate = 0.7;


            const speedText =
                document.getElementById("speedText");

            if (speedText) {
                speedText.textContent = "بطيئة";
            }


            currentQuestion = "finish";


            speak(
                "تم اختيار السرعة البطيئة. " +
                "هل تريد حفظ هذه الإعدادات؟ قولي نعم أو لا.",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("متوسطه") ||
            text.includes("متوسط") ||
            text.includes("عادي")
        ) {

            speechRate = 1;


            const speedText =
                document.getElementById("speedText");

            if (speedText) {
                speedText.textContent = "متوسطة";
            }


            currentQuestion = "finish";


            speak(
                "تم اختيار السرعة المتوسطة. " +
                "هل تريد حفظ هذه الإعدادات؟ قولي نعم أو لا.",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("سريعه") ||
            text.includes("سريع")
        ) {

            speechRate = 1.3;


            const speedText =
                document.getElementById("speedText");

            if (speedText) {
                speedText.textContent = "سريعة";
            }


            currentQuestion = "finish";


            speak(
                "تم اختيار السرعة السريعة. " +
                "هل تريد حفظ هذه الإعدادات؟ قولي نعم أو لا.",
                function () {

                    startListening();

                }
            );

            return;

        }

    }


    // ============================================
    // إنهاء تغيير الإعدادات
    // ============================================

    if (currentQuestion === "finish") {

        if (
            text.includes("نعم") ||
            text.includes("ايوه") ||
            text.includes("اه")
        ) {

            waitingForAnswer = false;

            currentQuestion = "";


            speak(
                "تم حفظ الإعدادات بنجاح. " +
                "القراءة الصوتية " +
                (voiceEnabled ? "مفعلة. " : "موقفة. ") +
                "القراءة عند اللمس " +
                (touchEnabled ? "مفعلة. " : "موقفة. ") +
                "والتباين العالي " +
                (highContrast ? "مفعل. " : "موقوف. ") +
                "أنا جاهز لأمر آخر.",
                function () {

                    startListening();

                }
            );

            return;

        }


        if (
            text.includes("لا") ||
            text.includes("مش عايز") ||
            text.includes("مش عايزه")
        ) {

            waitingForAnswer = false;

            currentQuestion = "";


            speak(
                "تمام. الإعدادات كما هي. أنا جاهز لأمر آخر.",
                function () {

                    startListening();

                }
            );

            return;

        }

    }


    // ============================================
    // قراءة الصفحة
    // ============================================

    if (
        text.includes("اقرا لي محتويات الصفحة") ||
        text.includes("اقرالي محتويات الصفحة") ||
        text.includes("اقرا محتويات الصفحة") ||
        text.includes("محتويات الصفحة") ||
        text.includes("اقرا الصفحة")
    ) {

        waitingForAnswer = false;

        currentQuestion = "";

        readSettingsPage();

        return;

    }


    // ============================================
    // فتح الإعدادات
    // ============================================

    if (
        text.includes("صفحة الإعدادات") ||
        text.includes("صفحة الاعدادات") ||
        text.includes("صفحه الاعدادات") ||
        text.includes("الاعدادات") ||
        text.includes("الإعدادات")
    ) {

        speak(
            "أنت بالفعل في صفحة الإعدادات."
        );

        return;

    }


    // ============================================
    // الصفحة الرئيسية
    // ============================================

    if (
        text.includes("الصفحة الرئيسية") ||
        text.includes("صفحة الرئيسية") ||
        text.includes("صفحه الرئيسية") ||
        text.includes("الرئيسية") ||
        text.includes("الرئيسيه") ||
        text.includes("افتح الرئيسية") ||
        text.includes("وديني الرئيسية") ||
        text.includes("وديني للصفحة الرئيسية") ||
        text.includes("روح للصفحة الرئيسية")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ للصفحة الرئيسية.",
            function () {

                window.location.href =
                    "index.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة المهام
    // ============================================

    if (
        text.includes("صفحة المهام") ||
        text.includes("صفحه المهام") ||
        text.includes("المهام") ||
        text.includes("افتح المهام") ||
        text.includes("وديني المهام") ||
        text.includes("وديني لصفحة المهام") ||
        text.includes("روح لصفحة المهام")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة المهام.",
            function () {

                window.location.href =
                    "tasks.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة الموظفين والمدير
    // ============================================

    if (
        text.includes("صفحة الموظفين والمدير") ||
        text.includes("صفحه الموظفين والمدير") ||
        text.includes("الموظفين والمدير") ||
        text.includes("الموظفين و المدير") ||
        text.includes("صفحة الموظفين") ||
        text.includes("الموظفين") ||
        text.includes("المدير")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة الموظفين والمدير.",
            function () {

                window.location.href =
                    "employees.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة التواصل
    // ============================================

    if (
        text.includes("صفحة التواصل") ||
        text.includes("صفحه التواصل") ||
        text.includes("التواصل") ||
        text.includes("افتح التواصل") ||
        text.includes("وديني التواصل") ||
        text.includes("وديني لصفحة التواصل")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة التواصل.",
            function () {

                window.location.href =
                    "communication.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة الروحانيات
    // ============================================

    if (
        text.includes("صفحة الروحانيات") ||
        text.includes("صفحه الروحانيات") ||
        text.includes("الروحانيات") ||
        text.includes("افتح الروحانيات") ||
        text.includes("وديني الروحانيات") ||
        text.includes("تايم") ||
        text.includes("time")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة الروحانيات.",
            function () {

                window.location.href =
                    "TEAN.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة المواعيد والجدول
    // ============================================

    if (
        text.includes("صفحة المواعيد") ||
        text.includes("صفحه المواعيد") ||
        text.includes("المواعيد") ||
        text.includes("الجدول") ||
        text.includes("الجدول والمواعيد")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة المواعيد والجدول.",
            function () {

                window.location.href =
                    "schedule.php";

            }
        );

        return;

    }


    // ============================================
    // صفحة التقييم
    // ============================================

    if (
        text.includes("صفحة التقييم") ||
        text.includes("صفحه التقييم") ||
        text.includes("التقييم") ||
        text.includes("الإنجازات") ||
        text.includes("الانجازات")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لصفحة التقييم والإنجازات.",
            function () {

                window.location.href =
                    "evaluation.php";

            }
        );

        return;

    }


    // ============================================
    // إدارة الملفات
    // ============================================

    if (
        text.includes("إدارة الملفات") ||
        text.includes("ادارة الملفات") ||
        text.includes("صفحة الملفات") ||
        text.includes("الملفات") ||
        text.includes("الإشعارات") ||
        text.includes("الاشعارات")
    ) {

        waitingForAnswer = false;

        speak(
            "حاضر، هوديكِ لإدارة الملفات.",
            function () {

                window.location.href =
                    "notificationc.php";

            }
        );

        return;

    }


    // ============================================
    // تغيير الإعدادات
    // ============================================

    if (
        text.includes("غير الإعدادات") ||
        text.includes("غير الاعدادات") ||
        text.includes("عايز اغير الاعدادات") ||
        text.includes("عاوزه اغير الاعدادات") ||
        text.includes("تغيير الإعدادات") ||
        text.includes("تغيير الاعدادات")
    ) {

        startSettingsMode();

        return;

    }


    // ============================================
    // أوامر تشغيل/إيقاف مباشرة
    // ============================================

    if (
        text.includes("شغل القراءة الصوتية") ||
        text.includes("فعل القراءة الصوتية")
    ) {

        if (!voiceEnabled) {

            toggleVoice();

        }

        else {

            speak(
                "القراءة الصوتية مفعلة بالفعل."
            );

        }

        return;

    }


    if (
        text.includes("اقفل القراءة الصوتية") ||
        text.includes("وقف القراءة الصوتية") ||
        text.includes("ايقاف القراءة الصوتية")
    ) {

        if (voiceEnabled) {

            toggleVoice();

        }

        else {

            speak(
                "القراءة الصوتية موقفة بالفعل."
            );

        }

        return;

    }


    // ============================================
    // السرعة مباشرة
    // ============================================

    if (
        text.includes("سرعة الصوت بطيئة") ||
        text.includes("الصوت بطيء")
    ) {

        speechRate = 0.7;

        document.getElementById(
            "speedText"
        ).textContent = "بطيئة";

        speak(
            "تم ضبط سرعة الصوت على بطيئة."
        );

        return;

    }


    if (
        text.includes("سرعة الصوت متوسطة") ||
        text.includes("الصوت متوسط")
    ) {

        speechRate = 1;

        document.getElementById(
            "speedText"
        ).textContent = "متوسطة";

        speak(
            "تم ضبط سرعة الصوت على متوسطة."
        );

        return;

    }


    if (
        text.includes("سرعة الصوت سريعة") ||
        text.includes("الصوت سريع")
    ) {

        speechRate = 1.3;

        document.getElementById(
            "speedText"
        ).textContent = "سريعة";

        speak(
            "تم ضبط سرعة الصوت على سريعة."
        );

        return;

    }


    // ============================================
    // لم يتم فهم الأمر
    // ============================================

    speak(
        "معلش، لم أفهم الأمر. " +
        "ممكن تقولي وديني للصفحة الرئيسية، " +
        "أو صفحة المهام، " +
        "أو الموظفين والمدير، " +
        "أو التواصل، " +
        "أو الإعدادات."
    );

}


// ============================================
// تشغيل أوامر الصوت
// ============================================

function processVoiceCommand(command) {

    const text = normalizeCommand(command);

    console.log(
        "Normalized command:",
        text
    );


    /*
     * لو إحنا داخلين في سؤال من أسئلة
     * الإعدادات، نخلي الإجابة تروح
     * لمعالج الإعدادات.
     *
     * لكن أوامر التنقل تفضل مسموحة
     * في أي وقت.
     */

    if (waitingForAnswer) {

        if (
            text.includes("الصفحه الرئيسيه") ||
            text.includes("صفحة المهام") ||
            text.includes("صفحه المهام") ||
            text.includes("الموظفين") ||
            text.includes("التواصل") ||
            text.includes("الروحانيات") ||
            text.includes("المواعيد")
        ) {

            // نسمح بالتنقل حتى أثناء الإعدادات

        }

        else {

            handleSettingsAnswer(text);

            return;

        }

    }


    /*
     * الأوامر العامة والتنقل
     */

    if (
        text.includes("الصفحه الرئيسيه") ||
        text.includes("الصفحة الرئيسية") ||
        text.includes("صفحة المهام") ||
        text.includes("صفحه المهام") ||
        text.includes("المهام") ||
        text.includes("الموظفين") ||
        text.includes("المدير") ||
        text.includes("التواصل") ||
        text.includes("الروحانيات") ||
        text.includes("المواعيد") ||
        text.includes("الجدول") ||
        text.includes("التقييم") ||
        text.includes("الانجازات") ||
        text.includes("الملفات") ||
        text.includes("الاشعارات") ||
        text.includes("الإعدادات") ||
        text.includes("الاعدادات") ||
        text.includes("غير الاعدادات") ||
        text.includes("اقرا لي محتويات الصفحة") ||
        text.includes("محتويات الصفحة") ||
        text.includes("سرعة الصوت")
    ) {

        /*
         * نرسل الأمر مرة ثانية للمعالج
         * وهو سيحدد الصفحة أو الإعداد المطلوب.
         */

        handleSettingsAnswer(text);

        return;

    }


    /*
     * لو مفيش سؤال منتظر،
     * نرسل الأمر مباشرة.
     */

    handleSettingsAnswer(text);

}


// ======================================
// جاهزية الصفحة
// ======================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        console.log(
            "MABSAR Settings Ready"
        );

    }
);

</script>
</body>
</html>


