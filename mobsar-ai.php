<?php

/* =====================================================
   PART 4 - REAL WEB SEARCH
   Purili - No API Key
   ===================================================== */

if (
    $_SERVER["REQUEST_METHOD"] === "POST"
    && isset($_POST["mobsar_search"])
) {

    header("Content-Type: application/json; charset=UTF-8");

    $query = trim($_POST["mobsar_search"]);


    if ($query === "") {

        echo json_encode([
            "success" => false,
            "message" => "لم يتم إرسال السؤال"
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }


    $url =
        "https://puri.li/api/search?q=" .
        urlencode($query);


    $ch = curl_init($url);


    curl_setopt(
        $ch,
        CURLOPT_RETURNTRANSFER,
        true
    );


    curl_setopt(
        $ch,
        CURLOPT_TIMEOUT,
        20
    );


    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        [
            "Accept: application/json"
        ]
    );


    $response = curl_exec($ch);

    $httpCode = curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );

    curl_close($ch);


    if (
        $response === false ||
        $httpCode < 200 ||
        $httpCode >= 300
    ) {

        echo json_encode([
            "success" => false,
            "message" => "تعذر الاتصال بمحرك البحث"
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }


    $data = json_decode(
        $response,
        true
    );


    if (!is_array($data)) {

        echo json_encode([
            "success" => false,
            "message" => "نتيجة البحث غير صالحة"
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }


    echo json_encode([
        "success" => true,
        "results" => $data["results"] ?? []
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>MOBSAR AI | مبصر AI</title>

    <!-- Cairo + Cinzel -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Cinzel:wght@700;800&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Cairo', sans-serif;
}


/* ======================================================
   BODY
====================================================== */

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


/* ======================================================
   TOP NAVIGATION
====================================================== */

.top-nav-bar {

    width: 90%;

    max-width: 1100px;

    display: flex;

    justify-content: space-between;

    padding: 25px 0 0 0;

    align-items: center;
}


.home-back-btn,
.chat-nav-btn {

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
        0 0 15px rgba(212, 175, 55, 0.15);
}


.home-back-btn:hover,
.chat-nav-btn:hover {

    background: #d4af37;

    color: #000000;

    box-shadow:
        0 0 25px rgba(212, 175, 55, 0.7);

    transform: translateY(-2px);
}


/* ======================================================
   HERO
====================================================== */

.hero-header {

    text-align: center;

    padding: 10px 20px 5px 20px;

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

    padding: 25px 50px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(30, 10, 50, 0.9) 0%,
            rgba(5, 2, 10, 0.98) 80%
        );

    box-shadow:
        0 0 50px rgba(138, 43, 226, 0.35),
        inset 0 0 25px rgba(212, 175, 55, 0.25);

    border:
        1px solid rgba(212, 175, 55, 0.4);

    animation:
        magicGlow 3s infinite alternate;
}


@keyframes magicGlow {

    0% {

        box-shadow:
            0 0 25px rgba(138, 43, 226, 0.3),
            inset 0 0 15px rgba(212, 175, 55, 0.15);

        border-color:
            rgba(212, 175, 55, 0.3);
    }

    100% {

        box-shadow:
            0 0 60px rgba(212, 175, 55, 0.5),
            inset 0 0 30px rgba(138, 43, 226, 0.5);

        border-color:
            rgba(212, 175, 55, 0.8);
    }
}


.hero-eye-icon {

    font-size: 5.8rem;

    color: #d4af37;

    filter:
        drop-shadow(
            0 0 20px rgba(212, 175, 55, 0.7)
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
            0 0 20px rgba(138, 43, 226, 0.6)
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
        0 0 20px rgba(212, 175, 55, 0.5);
}


/* ======================================================
   CHAT CONTAINER
====================================================== */

.ai-chat-container {

    width: 90%;

    max-width: 1100px;

    margin-top: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(15, 6, 26, 0.96),
            rgba(3, 1, 6, 0.99)
        );

    backdrop-filter: blur(20px);

    border:
        1px solid rgba(212, 175, 55, 0.45);

    border-radius: 22px;

    box-shadow:

        0 20px 60px rgba(0, 0, 0, 0.95),

        0 0 40px rgba(138, 43, 226, 0.18),

        inset 0 0 30px rgba(212, 175, 55, 0.06);

    overflow: hidden;
}


/* ======================================================
   CHAT HEADER
====================================================== */

.ai-chat-header {

    padding: 18px 25px;

    background:
        linear-gradient(
            135deg,
            rgba(30, 10, 50, 0.95),
            rgba(5, 2, 10, 0.98)
        );

    border-bottom:
        1px solid rgba(212, 175, 55, 0.3);

    color: #d4af37;

    font-size: 1.35rem;

    font-weight: 700;

    display: flex;

    justify-content: space-between;

    align-items: center;
}


.ai-chat-title {

    display: flex;

    align-items: center;

    gap: 10px;
}


.ai-chat-title i {

    color: #d4af37;

    filter:
        drop-shadow(
            0 0 10px rgba(212, 175, 55, 0.7)
        );
}


.ai-online {

    color: #86efac;

    font-size: 0.9rem;

    display: flex;

    align-items: center;

    gap: 6px;
}


.ai-online i {

    color: #22c55e;

    font-size: 0.6rem;

    filter:
        drop-shadow(
            0 0 7px #22c55e
        );
}


/* ======================================================
   MESSAGES AREA
====================================================== */

.ai-chat-messages {

    min-height: 430px;

    max-height: 560px;

    overflow-y: auto;

    padding: 25px;

    display: flex;

    flex-direction: column;

    gap: 18px;

    scroll-behavior: smooth;
}


/* Scrollbar */

.ai-chat-messages::-webkit-scrollbar {

    width: 7px;
}


.ai-chat-messages::-webkit-scrollbar-track {

    background: #05010a;
}


.ai-chat-messages::-webkit-scrollbar-thumb {

    background: #d4af37;

    border-radius: 10px;
}


/* ======================================================
   MESSAGE
====================================================== */

.chat-message {

    display: flex;

    align-items: flex-start;

    gap: 12px;

    max-width: 82%;

    animation:
        messageAppear 0.35s ease;
}


@keyframes messageAppear {

    from {

        opacity: 0;

        transform:
            translateY(10px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


/* ======================================================
   MOBSAR MESSAGE
====================================================== */

.mobsar-message {

    align-self: flex-start;

    flex-direction: row;
}


.message-icon {

    min-width: 45px;

    height: 45px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            #241044,
            #05010a
        );

    border:
        1px solid #d4af37;

    color: #d4af37;

    display: flex;

    align-items: center;

    justify-content: center;

    box-shadow:
        0 0 18px rgba(212, 175, 55, 0.25);
}


.message-content {

    background:
        linear-gradient(
            135deg,
            rgba(30, 10, 50, 0.9),
            rgba(8, 3, 15, 0.95)
        );

    border:
        1px solid rgba(212, 175, 55, 0.3);

    border-radius:
        5px 18px 18px 18px;

    padding:
        12px 17px;

    box-shadow:
        0 0 20px rgba(138, 43, 226, 0.12);
}


.message-name {

    color: #d4af37;

    font-size: 0.85rem;

    font-weight: 700;

    margin-bottom: 5px;
}


.message-text {

    color: #f3f4f6;

    font-size: 1.05rem;

    line-height: 1.8;

    word-wrap: break-word;
}


/* ======================================================
   USER MESSAGE
====================================================== */

.user-message {

    align-self: flex-end;

    flex-direction: row-reverse;
}


.user-message .message-content {

    background:
        linear-gradient(
            135deg,
            rgba(76, 29, 149, 0.45),
            rgba(15, 6, 26, 0.95)
        );

    border:
        1px solid rgba(192, 132, 252, 0.4);

    border-radius:
        18px 5px 18px 18px;

    text-align: right;
}


.user-message .message-icon {

    color: #c084fc;

    border-color: #8a2be2;
}


.user-message .message-name {

    color: #c084fc;
}


/* ======================================================
   VOICE STATUS
====================================================== */

.global-voice-widget {

    position: fixed;

    bottom: 25px;

    left: 25px;

    background:
        rgba(5, 1, 10, 0.95);

    border:
        2px solid #d4af37;

    padding:
        14px 22px;

    border-radius: 35px;

    color: #d4af37;

    font-weight: 700;

    box-shadow:
        0 0 30px rgba(138, 43, 226, 0.5);

    display: flex;

    align-items: center;

    gap: 12px;

    z-index: 1000;

    backdrop-filter: blur(10px);
}


.global-voice-widget i {

    font-size: 1.4rem;

    color: #ef4444;

    animation:
        pulseMic 0.9s infinite;
}


@keyframes pulseMic {

    0% {

        transform: scale(1);

        opacity: 0.7;
    }

    50% {

        transform: scale(1.4);

        opacity: 1;
    }

    100% {

        transform: scale(1);

        opacity: 0.7;
    }
}


/* ======================================================
   RESPONSIVE
====================================================== */

@media(max-width: 768px) {

    .top-nav-bar {

        width: 94%;
    }


    .home-back-btn,
    .chat-nav-btn {

        padding:
            9px 12px;

        font-size:
            0.85rem;
    }


    .big-mobsar-title {

        font-size:
            3.4rem;
    }


    .hero-eye-icon {

        font-size:
            4.5rem;
    }


    .massive-glow-line {

        width:
            80%;
    }


    .sub-title {

        font-size:
            1.7rem;
    }


    .ai-chat-container {

        width:
            94%;
    }


    .ai-chat-messages {

        min-height:
            380px;

        max-height:
            500px;

        padding:
            15px;
    }


    .chat-message {

        max-width:
            92%;
    }


    .message-text {

        font-size:
            0.95rem;
    }


    .global-voice-widget {

        left:
            50%;

        transform:
            translateX(-50%);

        bottom:
            15px;

        white-space:
            nowrap;

        font-size:
            0.85rem;
    }
}

</style>

</head>


<body>


<!-- =====================================================
     TOP NAVIGATION
====================================================== -->

<div class="top-nav-bar">

    <a href="index.php"
       class="home-back-btn"
       onmouseenter="speakQuick('العودة للصفحة الرئيسية')">

        <i class="fa-solid fa-house"></i>

        الصفحة الرئيسية

    </a>


    <a href="communication.php"
       class="chat-nav-btn"
       onmouseenter="speakQuick('الانتقال لصفحة التواصل')">

        <i class="fa-solid fa-comments"></i>

        صفحة التواصل

        <i class="fa-solid fa-bolt"
           style="color:#d4af37;"></i>

    </a>

</div>


<!-- =====================================================
     HERO HEADER
====================================================== -->

<div class="hero-header">


    <div class="mobsar-brand-wrapper"
         onmouseenter="speakQuick('مبصر')">

        <i class="fa-solid fa-eye hero-eye-icon"></i>

        <h1 class="big-mobsar-title">
            MOBSAR
        </h1>

    </div>


    <div class="massive-glow-line"></div>


    <div class="sub-title"
         onmouseenter="speakQuick('مبصر AI')">

        مبصر AI

    </div>

</div>


<!-- =====================================================
     MOBSAR AI CHAT
====================================================== -->

<div class="ai-chat-container">


    <!-- Chat Header -->

    <div class="ai-chat-header">


        <div class="ai-chat-title">

            <i class="fa-solid fa-robot"></i>

            مبصر AI

        </div>


        <div class="ai-online">

            <i class="fa-solid fa-circle"></i>

            جاهز

        </div>


    </div>


    <!-- Messages -->

    <div class="ai-chat-messages"
         id="aiChatMessages">


        <!-- MOBSAR FIRST MESSAGE -->

        <div class="chat-message mobsar-message">


            <div class="message-icon">

                <i class="fa-solid fa-eye"></i>

            </div>


            <div class="message-content">


                <div class="message-name">

                    مبصر AI

                </div>


                <div class="message-text">

                    مرحبًا بك في مبصر AI

                </div>


            </div>


        </div>


        <!-- MOBSAR SECOND MESSAGE -->

        <div class="chat-message mobsar-message">


            <div class="message-icon">

                <i class="fa-solid fa-eye"></i>

            </div>


            <div class="message-content">


                <div class="message-name">

                    مبصر AI

                </div>


                <div class="message-text">

                    أنا جاهز لاستماع أوامرك

                </div>


            </div>


        </div>


    </div>

</div>


<!-- =====================================================
     VOICE STATUS
====================================================== -->

<div class="global-voice-widget">

    <i class="fa-solid fa-microphone"></i>

    <span id="voiceStatusText">

        مبصر جاهز لاستماع أوامرك

    </span>

</div>



<script>

    
/* =====================================================
   PART 1 - MOBSAR AI VOICE
   ===================================================== */

let isSpeaking = false;


/* -----------------------------------------
   إضافة رسالة للشات
   ----------------------------------------- */

function addMessage(type, text) {

    const chat =
        document.querySelector(".ai-chat-messages");

    if (!chat) return;

    const message =
        document.createElement("div");

    message.className =
        type === "user"
            ? "chat-message user-message"
            : "chat-message mobsar-message";

    message.textContent = text;

    chat.appendChild(message);

    chat.scrollTop =
        chat.scrollHeight;
}


/* -----------------------------------------
   مبصر يتكلم
   المايك OFF أثناء الكلام
   ----------------------------------------- */

function speakMobsar(text) {

    if (!text) return;


    /* تأكيد إيقاف المايك */

    if (
        typeof stopListening === "function"
    ) {

        stopListening();
    }


    isSpeaking = true;


    /* إلغاء أي كلام سابق */

    window.speechSynthesis.cancel();


    const speech =
        new SpeechSynthesisUtterance(text);


    speech.lang = "ar-EG";

    speech.rate = 0.9;

    speech.pitch = 1;


    /* -------------------------------------
       أثناء كلام مبصر
       ------------------------------------- */

    speech.onstart = function () {

        isSpeaking = true;

        if (
            typeof stopListening === "function"
        ) {

            stopListening();
        }

        console.log(
            "MOBSAR SPEAKING - MIC OFF"
        );
    };


    /* -------------------------------------
       بعد انتهاء كلام مبصر
       ------------------------------------- */

    speech.onend = function () {

        isSpeaking = false;

        console.log(
            "MOBSAR FINISHED SPEAKING"
        );


        /*
         * ننتظر شوية بعد انتهاء الصوت
         * حتى لا يلتقط المايك آخر كلمة
         * قالها مبصر.
         */

        setTimeout(
            function () {

                if (!isSpeaking) {

                    startListening();

                    console.log(
                        "MOBSAR MICROPHONE ON"
                    );
                }

            },
            1000
        );
    };


    /* -------------------------------------
       لو حصل خطأ
       ------------------------------------- */

    speech.onerror = function () {

        isSpeaking = false;


        setTimeout(
            function () {

                if (!isSpeaking) {

                    startListening();

                }

            },
            1000
        );
    };


    window.speechSynthesis.speak(
        speech
    );
}


/* -----------------------------------------
   تشغيل مبصر
   ----------------------------------------- */

function startMobsarAI() {

    const welcome =
        "مرحبًا بك في مبصر AI";


    addMessage(
        "mobsar",
        welcome
    );


    speakMobsar(
        welcome
    );


    setTimeout(
        function () {

            if (isSpeaking) return;


            const ready =
                "أنا جاهز لاستماع أوامرك";


            addMessage(
                "mobsar",
                ready
            );


            speakMobsar(
                ready
            );

        },
        2500
    );
}


/* -----------------------------------------
   تشغيل الصفحة
   ----------------------------------------- */

window.addEventListener(
    "load",
    startMobsarAI
);

    /* SCRIPT 1 */
    /* =====================================================
   PART 2 - CONTINUOUS MICROPHONE
   ===================================================== */

let recognition = null;

let isListening = false;


/* -----------------------------------------
   إنشاء الميكروفون
   ----------------------------------------- */

function setupMicrophone() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if (!SpeechRecognition) {

        addMessage(
            "mobsar",
            "المتصفح لا يدعم تشغيل المايك الصوتي."
        );

        return;
    }


    recognition =
        new SpeechRecognition();


    recognition.lang =
        "ar-EG";


    recognition.continuous =
        true;


    recognition.interimResults =
        false;


    recognition.maxAlternatives =
        1;


    /* -------------------------------------
       بدأ الاستماع
       ------------------------------------- */

    recognition.onstart =
        function () {

            isListening =
                true;


            console.log(
                "MOBSAR MICROPHONE ON"
            );
        };


    /* -------------------------------------
       انتهى الاستماع
       ------------------------------------- */

    recognition.onend =
        function () {

            isListening =
                false;


            console.log(
                "MOBSAR MICROPHONE OFF"
            );


            /*
             * لو مبصر مش بيتكلم،
             * نرجع نشغل المايك.
             */

            if (!isSpeaking) {

                setTimeout(
                    function () {

                        startListening();

                    },
                    400
                );
            }
        };


    /* -------------------------------------
       خطأ في المايك
       ------------------------------------- */

    recognition.onerror =
        function (event) {

            isListening =
                false;


            console.log(
                "MIC ERROR:",
                event.error
            );
        };


    /* -------------------------------------
       نتيجة الكلام
       ------------------------------------- */

    recognition.onresult =
        function (event) {

            /*
             * Part 3 هو المسؤول عن
             * معالجة الكلام.
             */

            if (
                typeof handleRecognitionResult ===
                "function"
            ) {

                handleRecognitionResult(
                    event
                );

            }
        };
}


/* -----------------------------------------
   تشغيل الميكروفون
   ----------------------------------------- */

function startListening() {

    if (
        !recognition ||
        isListening ||
        isSpeaking
    ) {

        return;
    }


    try {

        recognition.start();

    } catch (error) {

        console.log(
            "MIC START:",
            error
        );
    }
}


/* -----------------------------------------
   إيقاف الميكروفون
   ----------------------------------------- */

function stopListening() {

    if (
        recognition &&
        isListening
    ) {

        try {

            recognition.stop();

        } catch (error) {

            console.log(
                "MIC STOP:",
                error
            );
        }
    }
}


/* -----------------------------------------
   إنشاء الميكروفون بعد فتح الصفحة
   ----------------------------------------- */

setTimeout(
    function () {

        setupMicrophone();


        /*
         * ننتظر انتهاء الترحيب
         * ثم نبدأ الاستماع.
         */

        setTimeout(
            function () {

                if (!isSpeaking) {

                    startListening();

                }

            },
            4000
        );

    },
    4000
);

    /* SCRIPT 2 */
    /* =====================================================
   PART 3 - MOBSAR KNOWLEDGE + SMART ROUTING
   ===================================================== */


/* -----------------------------------------
   تطبيع الكلام العربي
   ----------------------------------------- */

function normalizeArabic(text) {

    return text
        .toLowerCase()
        .replace(/[ًٌٍَُِّْـ]/g, "")
        .replace(/[أإآ]/g, "ا")
        .replace(/ة/g, "ه")
        .replace(/ى/g, "ي")
        .replace(/[؟?!،,]/g, " ")
        .replace(/\s+/g, " ")
        .trim();
}


/* -----------------------------------------
   معلومات مبصر
   ----------------------------------------- */

function getMobsarAnswer(text) {

    const q = normalizeArabic(text);


    /* =====================================
       السلام عليكم
       ===================================== */

    if (
        q.includes("السلام عليكم") ||
        q.includes("سلام عليكم")
    ) {

        return "وعليكم السلام ورحمة الله وبركاته";
    }


    /* =====================================
       معنى كلمة مبصر
       ===================================== */

    if (
        q.includes("معنى كلمة مبصر") ||
        q.includes("معنى كلمه مبصر") ||
        q.includes("ما معنى كلمة مبصر") ||
        q.includes("ما معنى كلمه مبصر") ||
        q.includes("ما معني كلمة مبصر") ||
        q.includes("ما معني كلمه مبصر") ||
        q.includes("معنى مبصر") ||
        q.includes("معني مبصر") ||
        q.includes("ما معنى مبصر") ||
        q.includes("ما معني مبصر") ||
        q.includes("يعني ايه مبصر") ||
        q.includes("يعني ايه كلمة مبصر") ||
        q.includes("يعني ايه كلمه مبصر")
    ) {

        return `
كلمة مبصر تعني في اللغة الشخص الذي يستطيع الرؤية، وهي من الفعل أبصر، أي رأى الشيء وأدركه.

وكلمة مبصر لا تعني فقط القدرة على النظر، ولكن يمكن أن ترتبط أيضًا بمعنى الإدراك والفهم والانتباه إلى الأشياء.

وفي مشروعنا تم اختيار اسم مبصر لأنه يعبر عن فكرة الوصول إلى المعلومات وفهمها والتعامل معها بطريقة أسهل.

إذن عندما نسأل: ما معنى كلمة مبصر؟ فنحن نتحدث عن معنى الكلمة نفسها، وليس عن البرنامج.

أما مشروع مبصر فهو يستخدم هذا الاسم ليعبر عن هدفه في مساعدة المستخدم على الوصول إلى المعلومات والخدمات الرقمية بطريقة أكثر سهولة.
        `.trim();
    }

/* =====================================
   دكتور أحمد الحوفي
   ===================================== */

if (
    q.includes("من هو دكتور احمد الحوفي") ||
    q.includes("مين دكتور احمد الحوفي") ||
    q.includes("احكيلي عن دكتور احمد الحوفي") ||
    q.includes("ماذا تعرف عن دكتور احمد الحوفي") ||
    q.includes("دكتور احمد الحوفي") ||
    q.includes("رسالة شكر لدكتور احمد الحوفي") ||
    q.includes("شكرا لدكتور احمد الحوفي")
) {
    return `
دكتور أحمد الحوفي من الأشخاص الذين تركوا أثرًا جميلًا ومميزًا في رحلتي التعليمية.

كان من الأشخاص الذين لم يكتفوا بتقديم المعلومة، بل كانوا يهتمون فعلًا بأن تصل المعلومة للطالب بشكل واضح، وأن يفهمها ويستفيد منها.

تعلمنا منه الكثير، واكتسبنا خبرات ومعلومات ستظل معنا حتى بعد انتهاء الرحلة.

وأكثر ما يميز هذه الرحلة بالنسبة لي هو أننا لم نشعر أننا مجرد طلاب نتلقى الدروس، بل شعرنا أننا وسط أشخاص يهتمون بنا وبمستقبلنا، ويشجعوننا على التعلم والاستمرار.

دكتور أحمد الحوفي، شكرًا من القلب على كل معلومة قدمتها لنا، وعلى كل وقت ومجهود بذلته من أجلنا، وعلى كل تشجيع ودعم قدمته لنا.

يمكن أن تنتهي الأيام والدروس، لكن أثر الأشخاص الجميلين لا ينتهي.

شكرًا لك دكتور أحمد الحوفي، وربنا يجزيك عنا كل خير.
    `.trim();
}










/* =====================================
   رحلة ماجدة مع معهد أكسفورد
   ===================================== */

if (
    q.includes("رحلة ماجدة مع اكسفورد") ||
    q.includes("رحلة ماجدة في اكسفورد") ||
    q.includes("رحلة ماجدة مع معهد اكسفورد") ||
    q.includes("احكيلي عن رحلة ماجدة") ||
    q.includes("احكيلي عن رحلة ماجدة مع اكسفورد") ||
    q.includes("ما هي رحلة ماجدة مع اكسفورد") ||
    q.includes("ايه هي رحلة ماجدة مع اكسفورد") ||
    q.includes("ماذا تقول ماجدة عن اكسفورد") ||
    q.includes("رسالة ماجدة لاكسفورد") ||
    q.includes("رسالة ماجدة لمعهد اكسفورد") ||
    q.includes("رسالة وداع لاكسفورد") ||
    q.includes("احكيلي عن رحلة اكسفورد") ||
    q.includes("رحلة اكسفورد") ||
    q.includes("ما هي اكسفورد") ||
    q.includes("ايه هي اكسفورد") ||
    q.includes("ما هو معهد اكسفورد") ||
    q.includes("ايه هو معهد اكسفورد")
) {
    return `
رحلة ماجدة سامي مع معهد أكسفورد لم تكن مجرد رحلة تعليمية، بل كانت واحدة من أجمل التجارب والذكريات التي ستظل موجودة في قلبي.

في أكسفورد لم نتعلم فقط، ولكن عشنا أيامًا مليئة بالضحك والفرحة واللعب والمواقف الجميلة والصداقة والتجارب الجديدة.

كان المعهد بالنسبة لنا أكثر من مكان نتعلم فيه، فقد شعرنا فيه أننا وسط عائلة، ووجدنا أشخاصًا قدموا لنا الدعم والتشجيع والاهتمام.

وأحب أن أوجه شكري لكل شخص كان جزءًا من هذه الرحلة.

شكرًا للأستاذ أحمد الحداد، مدير المعهد، على دعمه واهتمامه بالطلاب، وعلى كونه من الأشخاص الذين كان لهم دور مهم في هذه الرحلة.

وشكرًا لميس سمر، وميس بسمة، ودكتورة إيمان نصير،وميس شمس ودكتور بهاء، ودكتور أحمد الحوفي، على كل مجهود بذلوه معنا، وعلى كل معلومة حاولوا إيصالها لنا، وعلى خبراتهم وطريقتهم الجميلة في التعامل معنا.

وشكر خاص لدكتور أحمد الحوفي، لأن مجهوده معنا كان شيئًا أشعر أنه أكبر من أي كلام يمكن أن يوصف به. تعلمنا منه الكثير، وشجعنا على الاستمرار والتعلم، وترك لنا خبرة وذكريات جميلة ستظل معنا.

وشكرًا لكل شخص في معهد أكسفورد، سواء ذكرنا اسمه أم لا، لأن كل شخص كان له بصمته الخاصة في هذه الرحلة.

وشكرًا لأصدقائي، وخصوصًا رفيقة دربي شهد، ولكل شخص تعرفت عليه في هذه الفترة، ومنهم مروة صديقتي، وكل شخص جعل هذه الأيام أجمل.

لا أعرف هل ستجمعنا الأيام مرة أخرى أم لا.

ربما نلتقي من جديد، وربما تأخذنا الحياة إلى أماكن مختلفة، وربما نلتقي يومًا وكأننا أشخاص لم نعرف بعضنا من قبل.

لكن مهما حدث، ستظل الذكريات موجودة.

ستظل الضحكات والمواقف والأيام الجميلة محفورة في ذاكرتي.

وستظل رحلة أكسفورد واحدة من أجمل الرحلات والتجارب التي عشتها، وسأظل فخورة أنني كنت جزءًا منها، وفخورة بكل شخص قابلته فيها.

سأفتقدكم، وسأفتقد أصدقائي، وسأفتقد تلك الأيام التي ربما لم نكن نعرف وقتها أنها ستصبح يومًا من أجمل ذكرياتنا.

شكرًا أكسفورد على كل شيء.

وشكرًا لكل شخص جعل هذه الرحلة تستحق أن تُحكى.

رسالة من الطالبة:
ماجدة سامي.
    `.trim();
}




    /* =====================================
     
    
    
    ما هو مشروع مبصر؟
       ===================================== */

    if (
        q.includes("ما هو مشروع مبصر") ||
        q.includes("ما هو برنامج مبصر") ||
        q.includes("ما هو مبصر") ||
        q.includes("ايه هو مشروع مبصر") ||
        q.includes("ايه هو برنامج مبصر") ||
        q.includes("ايه هو مبصر") ||
        q.includes("اي هو مشروع مبصر") ||
        q.includes("اي هو برنامج مبصر") ||
        q.includes("اي هو مبصر")
    ) {

        return `
مشروع مبصر هو مشروع مساعد رقمي صوتي يهدف إلى مساعدة الأشخاص المكفوفين أو ضعاف البصر في التعامل مع المعلومات والمهام والخدمات الرقمية بطريقة أسهل وأكثر استقلالية.

فكرة المشروع تعتمد على جعل الصوت وسيلة أساسية للتفاعل مع النظام.

فبدل أن يكون المستخدم مضطرًا إلى الاعتماد بشكل كامل على الكتابة أو الماوس، يستطيع التحدث إلى مبصر، ومبصر يستطيع فهم الكلام والرد عليه وتنفيذ الأوامر المناسبة.

المشروع عبارة عن مجموعة من الصفحات والخدمات التي تعمل معًا داخل نظام واحد.

ومن أهم الصفحات صفحة التسجيل، وصفحة المهام، وصفحة الجدول والمواعيد، وصفحة الإعدادات، وصفحة التقييم والإنجازات، وصفحة التواصل، وصفحة الموظفين والمدير، وصفحة إدارة الملفات والتنبيهات، وصفحة المساعد البصري، بالإضافة إلى قسم الروحانيات وصفحة مبصر AI.

الهدف الأساسي من المشروع هو تسهيل الوصول إلى المعلومات والخدمات الرقمية، وجعل التفاعل مع النظام أكثر اعتمادًا على الصوت.

ومبصر AI هو الجزء الذكي الصوتي الذي يستطيع المستخدم التحدث معه وطرح الأسئلة عليه، ثم يظهر الرد في المحادثة ويتم نطقه للمستخدم.
        `.trim();
    }


    /* =====================================
       ماذا يفعل برنامج مبصر؟
       ===================================== */

    if (
        q.includes("مبصر بيعمل ايه") ||
        q.includes("مبصر بيعمل اي") ||
        q.includes("مبصر ده بيعمل ايه") ||
        q.includes("مبصر ده بيعمل اي") ||
        q.includes("برنامج مبصر بيعمل ايه") ||
        q.includes("برنامج مبصر ده بيعمل ايه") ||
        q.includes("ماذا يفعل مبصر") ||
        q.includes("ايه وظيفة مبصر") ||
        q.includes("وظيفة مبصر ايه")
    ) {

        return `
مبصر يساعد المستخدم في التعامل مع مجموعة من الخدمات والمهام الرقمية باستخدام الصوت والتفاعل المباشر.

من خلال المشروع يستطيع المستخدم إنشاء حساب، ومتابعة المهام، ومتابعة المواعيد والجدول، ومراجعة الإنجازات والتقارير، والتواصل داخل النظام، والتعامل مع الوظائف الخاصة بالمدير والموظفين.

كما يحتوي المشروع على المساعد البصري الذي يعتمد على الكاميرا للمساعدة في قراءة النصوص والتعرف على الأشياء.

ويحتوي أيضًا على قسم الروحانيات، بالإضافة إلى مبصر AI الذي يسمح للمستخدم بالتحدث مع المساعد وطرح الأسئلة عليه.

ومن أهم أفكار مبصر أن المستخدم يستطيع استخدام الأوامر الصوتية للوصول إلى الصفحات والخدمات بدل البحث عنها يدويًا.

وباختصار، مبصر يحاول جعل استخدام الخدمات والمعلومات الرقمية أكثر سهولة للمستخدم الكفيف أو ضعيف البصر.
        `.trim();
    }


    /* =====================================
       موسوعة مبصر
       ===================================== */

    if (
        q.includes("موسوعة مبصر") ||
        q.includes("موسوعه مبصر") ||
        q.includes("ايه هي موسوعة مبصر") ||
        q.includes("ايه هي موسوعه مبصر") ||
        q.includes("ما هي موسوعة مبصر") ||
        q.includes("ما هي موسوعه مبصر")
    ) {

        return `
موسوعة مبصر هي فكرة تجمع مجموعة من المعلومات والخدمات داخل مشروع مبصر في نظام واحد.

المشروع لا يعتمد على وظيفة واحدة فقط، ولكنه يحتوي على مجموعة من الصفحات التي تخدم احتياجات مختلفة للمستخدم.

من هذه الصفحات التسجيل، والمهام، والإعدادات، والجدول والمواعيد، والتقييم والإنجازات، والتواصل، والموظفين والمدير، وإدارة الملفات والتنبيهات، والمساعد البصري، ومبصر AI.

كما يحتوي قسم الروحانيات TEAN.php على ستة أقسام رئيسية، وهي القرآن الكريم، والأذكار، والأحاديث النبوية، والأدعية، والصلاة والعبادات، وقصص الأنبياء.

أما مبصر AI فهو المساعد الصوتي الذي يستطيع المستخدم التحدث معه وطرح الأسئلة عليه.

وبذلك يمكن اعتبار موسوعة مبصر مجموعة متكاملة من الخدمات والمعلومات والوظائف الموجودة داخل المشروع.
        `.trim();
    }


    /* =====================================
       صفحات مبصر
       ===================================== */

    if (
        q.includes("صفحات مبصر") ||
        q.includes("صفحات مشروع مبصر") ||
        q.includes("ما هي صفحات مبصر") ||
        q.includes("ايه صفحات مبصر") ||
        q.includes("ايه هي صفحات مبصر")
    ) {

        return `
مشروع مبصر يحتوي على مجموعة من الصفحات.

صفحة التسجيل register.php لإنشاء الحساب.

صفحة المهام tasks.php لإدارة المهام ومتابعتها.

صفحة الروحانيات TEAN.php وتحتوي على القرآن الكريم والأذكار والأحاديث النبوية والأدعية والصلاة والعبادات وقصص الأنبياء.

صفحة الإعدادات settings.php لإعدادات المستخدم.

صفحة الجدول schedule.php للتقويم والمواعيد.

صفحة التقييم والإنجازات evaluation.php لعرض الإنجازات والتقارير.

صفحة التواصل communication.php للتواصل داخل النظام.

صفحة notificationc.php للوظائف المتعلقة بإدارة الملفات والتنبيهات.

صفحة الموظفين employees.php للوظائف المتعلقة بالمدير والموظفين.

صفحة المساعد البصري visual-assistant.php للمساعدة باستخدام الكاميرا وقراءة النصوص والتعرف على الأشياء.

وصفحة مبصر AI للمحادثة الصوتية والرد على الأسئلة والبحث عن المعلومات.
        `.trim();
    }


    /* =====================================
       لو السؤال مش عن مبصر
       ===================================== */

    return null;
}


/* -----------------------------------------
   معالجة كلام المستخدم
   ----------------------------------------- */

function processUserSpeech(text) {

    if (!text) return;


    const localAnswer =
        getMobsarAnswer(text);


    /* سؤال عن مبصر */

    if (localAnswer) {

        addMessage(
            "mobsar",
            localAnswer
        );


        speakMobsar(
            localAnswer
        );


        return;
    }


    /* =====================================
       أي سؤال عام
       يذهب مباشرة للبحث الحقيقي
       ===================================== */

    if (
        typeof performRealSearch ===
        "function"
    ) {

        performRealSearch(
            text
        );

    }

}


/* -----------------------------------------
   استقبال نتيجة الميكروفون
   ----------------------------------------- */

function handleRecognitionResult(event) {

    const result =
        event.results[
            event.results.length - 1
        ];


    if (!result) return;


    const text =
        result[0]
            .transcript
            .trim();


    if (!text) return;


    addMessage(
        "user",
        text
    );


    console.log(
        "USER:",
        text
    );


    processUserSpeech(
        text
    );
}


/* -----------------------------------------
   ربط الميكروفون بالمعالجة
   ----------------------------------------- */

function connectRecognitionHandler() {

    if (!recognition) return;


    recognition.onresult =
        function(event) {

            handleRecognitionResult(
                event
            );

        };


    console.log(
        "MOBSAR VOICE HANDLER READY"
    );
}


/* -----------------------------------------
   انتظار إنشاء recognition
   ----------------------------------------- */

const mobsarRecognitionConnector =
    setInterval(
        function() {

            if (recognition) {

                connectRecognitionHandler();

                clearInterval(
                    mobsarRecognitionConnector
                );

            }

        },
        300
    );
    /* SCRIPT 3 */


    /* =====================================================
   PART 4 - MOBSAR SMART WEB SEARCH
   ===================================================== */

async function performRealSearch(query) {

    if (!query || isSpeaking) return;

    query = query.trim();

    console.log("SEARCH QUERY:", query);

    const searchingMessage =
        "جاري البحث عن إجابة لسؤالك...";

    addMessage("mobsar", searchingMessage);

    speakMobsar(searchingMessage);


    try {

        /*
         * البحث أولاً في ويكيبيديا العربية
         * بدون API Key
         */

        const url =
            "https://ar.wikipedia.org/api/rest_v1/page/summary/" +
            encodeURIComponent(query);

        const response =
            await fetch(url, {
                method: "GET"
            });


        if (response.ok) {

            const data =
                await response.json();


            if (
                data &&
                data.extract &&
                data.extract.trim()
            ) {

                const answer =
                    data.extract.trim();


                addMessage(
                    "mobsar",
                    answer
                );


                speakSearchResult(
                    "",
                    answer
                );


                return;
            }
        }


        /*
         * لو ويكيبيديا لم تجد الإجابة
         * نستخدم بحث ويكيبيديا نفسه
         */

        const searchURL =
            "https://ar.wikipedia.org/w/api.php" +
            "?action=query" +
            "&list=search" +
            "&srsearch=" +
            encodeURIComponent(query) +
            "&format=json" +
            "&origin=*";


        const searchResponse =
            await fetch(searchURL);


        if (!searchResponse.ok) {
            throw new Error(
                "Wikipedia search failed"
            );
        }


        const searchData =
            await searchResponse.json();


        if (
            searchData.query &&
            searchData.query.search &&
            searchData.query.search.length > 0
        ) {

            const result =
                searchData.query.search[0];


            const title =
                result.title ||
                "نتيجة البحث";


            const snippet =
                result.snippet
                    ? result.snippet
                        .replace(/<[^>]*>/g, "")
                        .trim()
                    : "";


            const answer =
                title +
                (snippet
                    ? "\n" + snippet
                    : "");


            addMessage(
                "mobsar",
                answer
            );


            speakSearchResult(
                title,
                snippet
            );


            return;
        }


        /*
         * لم نجد نتيجة
         */

        const noResult =
            "لم أجد معلومات كافية عن هذا السؤال. يمكنك صياغة السؤال بطريقة أخرى.";


        addMessage(
            "mobsar",
            noResult
        );


        speakMobsar(
            noResult
        );


    } catch (error) {

        console.error(
            "SEARCH ERROR:",
            error
        );


        const errorMessage =
            "حصلت مشكلة أثناء البحث. حاول مرة أخرى.";


        addMessage(
            "mobsar",
            errorMessage
        );


        speakMobsar(
            errorMessage
        );
    }
}

/* =====================================================
   PART 5 - MOBSAR SEARCH RESULT VOICE
   ===================================================== */

function speakSearchResult(
    title,
    description
) {

    let answer = "";


    if (title) {

        answer +=
            title.trim() + ". ";
    }


    if (description) {

        answer +=
            description.trim();
    }


    /*
     * تنظيف نتيجة البحث
     */

    answer =
        answer
            .replace(/<[^>]*>/g, "")
            .replace(/https?:\/\/\S+/gi, "")
            .replace(/\[\d+\]/g, "")
            .replace(/\s+/g, " ")
            .trim();


    if (!answer) {

        answer =
            "وجدت نتيجة مرتبطة بسؤالك.";
    }


    /*
     * النطق
     */

    speakMobsar(
        answer
    );
}

</script>
</body>
</html>

</body>

</html>