<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>MABSAR | الروحانيات</title>

    <!-- خط عربي -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Cinzel:wght@600;700;800&display=swap"
          rel="stylesheet">

    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>

/* =========================================================
   MABSAR | TEAN
   التصميم الرئيسي
========================================================= */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Cairo', sans-serif;
}

html {
    scroll-behavior: smooth;
}

body {
    min-height: 100vh;
    color: #e5e7eb;
    background-color: #000000;

    background-image:
        radial-gradient(
            circle at 50% 12%,
            #150529 0%,
            #08030f 42%,
            #020106 72%,
            #000000 100%
        );

    display: flex;
    flex-direction: column;
    align-items: center;

    padding-bottom: 80px;

    overflow-x: hidden;
}


/* =========================================================
   الإضاءة العامة
========================================================= */

body::before {
    content: "";

    position: fixed;

    width: 600px;
    height: 600px;

    top: -300px;
    left: 50%;

    transform: translateX(-50%);

    background: radial-gradient(
        circle,
        rgba(138, 43, 226, 0.16),
        transparent 70%
    );

    pointer-events: none;

    z-index: -1;
}


/* =========================================================
   الشريط العلوي
========================================================= */

.top-nav-bar {
    width: 90%;
    max-width: 1100px;

    display: flex;
    justify-content: flex-start;
    align-items: center;

    padding-top: 25px;
}


/* =========================================================
   زر العودة للرئيسية
========================================================= */

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

    font-weight: 700;

    text-decoration: none;

    display: inline-flex;

    align-items: center;

    gap: 8px;

    transition: all 0.3s ease;

    box-shadow:
        0 0 15px rgba(212, 175, 55, 0.15);
}

.home-back-btn i {
    font-size: 1rem;
}

.home-back-btn:hover {
    background: #d4af37;

    color: #000000;

    transform: translateY(-2px);

    box-shadow:
        0 0 25px rgba(212, 175, 55, 0.7);
}


/* =========================================================
   رأس الصفحة
========================================================= */

.hero-header {
    width: 100%;

    display: flex;

    flex-direction: column;

    align-items: center;

    text-align: center;

    padding:
        15px
        20px
        10px;
}


/* =========================================================
   شعار MABSAR
========================================================= */

.mobsar-brand-wrapper {

    display: inline-flex;

    flex-direction: column;

    align-items: center;

    position: relative;

    padding:
        22px
        55px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(30, 10, 50, 0.95) 0%,
            rgba(5, 2, 10, 0.98) 80%
        );

    border:
        1px solid
        rgba(212, 175, 55, 0.4);

    box-shadow:
        0 0 50px
        rgba(138, 43, 226, 0.35),

        inset 0 0 25px
        rgba(212, 175, 55, 0.25);

    animation:
        magicGlow 3s infinite alternate;
}


/* =========================================================
   حركة الإضاءة
========================================================= */

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


/* =========================================================
   أيقونة العين
========================================================= */

.hero-eye-icon {

    font-size: 5rem;

    color: #d4af37;

    filter:
        drop-shadow(
            0 0 20px
            rgba(212, 175, 55, 0.7)
        );

    margin-bottom: -4px;

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


/* =========================================================
   اسم MABSAR
========================================================= */

.big-mobsar-title {

    font-family: 'Cinzel', serif;

    font-style: italic;

    font-weight: 800;

    font-size: 5.2rem;

    letter-spacing: 6px;

    transform: skewX(-8deg);

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

    filter:
        drop-shadow(
            0 0 20px
            rgba(138, 43, 226, 0.6)
        );
}


/* =========================================================
   الخط المضيء
========================================================= */

.massive-glow-line {

    width: min(400px, 80vw);

    height: 3px;

    margin:
        18px
        auto
        10px;

    border-radius: 50%;

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
}


/* =========================================================
   عنوان الروحانيات
========================================================= */

.sub-title {

    color: #d4af37;

    font-size: 2.3rem;

    font-weight: 800;

    margin-top: 5px;

    text-shadow:
        0 0 20px
        rgba(212, 175, 55, 0.5);
}


/* =========================================================
   وصف الصفحة
========================================================= */

.page-description {

    max-width: 850px;

    margin-top: 8px;

    color: #d8b4fe;

    font-size: 1.05rem;

    line-height: 1.8;

    text-shadow:
        0 0 10px
        rgba(138, 43, 226, 0.35);
}


/* =========================================================
   حاوية الكروت
========================================================= */

.spiritual-cards-container {

    width: 90%;

    max-width: 1100px;

    margin-top: 25px;

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 22px;
}


/* =========================================================
   الكرت الأساسي
========================================================= */

.spiritual-card {

    position: relative;

    min-height: 170px;

    padding: 25px;

    border-radius: 22px;

    text-decoration: none;

    color: #ffffff;

    display: flex;

    align-items: center;

    gap: 20px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(15, 6, 26, 0.97),
            rgba(3, 1, 6, 0.99)
        );

    border:
        1px solid
        rgba(212, 175, 55, 0.35);

    box-shadow:

        0 20px 50px
        rgba(0, 0, 0, 0.95),

        0 0 30px
        rgba(138, 43, 226, 0.15),

        inset 0 0 25px
        rgba(212, 175, 55, 0.08);

    transition:
        transform 0.35s ease,
        border-color 0.35s ease,
        box-shadow 0.35s ease;
}


/* =========================================================
   إضاءة داخلية للكرت
========================================================= */

.spiritual-card::before {

    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    top: -100px;
    left: -80px;

    background:
        radial-gradient(
            circle,
            rgba(138, 43, 226, 0.18),
            transparent 70%
        );

    pointer-events: none;
}


/* =========================================================
   تأثير الكرت
========================================================= */

.spiritual-card:hover {

    transform:
        translateY(-6px);

    border-color:
        rgba(212, 175, 55, 0.8);

    box-shadow:

        0 25px 60px
        rgba(0, 0, 0, 0.98),

        0 0 40px
        rgba(212, 175, 55, 0.25),

        inset 0 0 30px
        rgba(138, 43, 226, 0.12);
}


/* =========================================================
   أيقونة الكرت
========================================================= */

.card-icon {

    flex-shrink: 0;

    width: 72px;

    height: 72px;

    border-radius: 20px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #d4af37;

    font-size: 2rem;

    background:
        radial-gradient(
            circle,
            rgba(138, 43, 226, 0.25),
            rgba(5, 1, 10, 0.95)
        );

    border:
        1px solid
        rgba(212, 175, 55, 0.45);

    box-shadow:

        0 0 20px
        rgba(138, 43, 226, 0.25),

        inset 0 0 15px
        rgba(212, 175, 55, 0.1);

    transition:
        transform 0.3s ease,
        color 0.3s ease,
        box-shadow 0.3s ease;
}


.spiritual-card:hover .card-icon {

    transform:
        scale(1.08)
        rotate(-3deg);

    color: #fff4b0;

    box-shadow:

        0 0 25px
        rgba(212, 175, 55, 0.45),

        inset 0 0 20px
        rgba(138, 43, 226, 0.2);
}


/* =========================================================
   محتوى الكرت
========================================================= */

.card-content {

    flex: 1;

    min-width: 0;
}


.card-content h2 {

    color: #ffffff;

    font-size: 1.35rem;

    font-weight: 800;

    margin-bottom: 8px;

    text-shadow:
        0 0 12px
        rgba(138, 43, 226, 0.4);
}


.card-content p {

    color: #d8b4fe;

    font-size: 0.95rem;

    line-height: 1.8;
}


/* =========================================================
   سهم الدخول
========================================================= */

.card-arrow {

    flex-shrink: 0;

    width: 42px;

    height: 42px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #d4af37;

    border:
        1px solid
        rgba(212, 175, 55, 0.4);

    background:
        rgba(10, 3, 20, 0.8);

    transition:
        all 0.3s ease;
}


.spiritual-card:hover .card-arrow {

    background: #d4af37;

    color: #000000;

    transform:
        translateX(-4px);

    box-shadow:
        0 0 18px
        rgba(212, 175, 55, 0.6);
}


/* =========================================================
   تمييز بسيط لكل قسم
========================================================= */

.quran-card .card-icon {
    color: #f4d77b;
}

.azkar-card .card-icon {
    color: #c9a7ff;
}

.hadith-card .card-icon {
    color: #e8c76a;
}

.duaa-card .card-icon {
    color: #d8b4fe;
}

.prayer-card .card-icon {
    color: #f6dc8c;
}

.prophets-card .card-icon {
    color: #c7a7ff;
}


/* =========================================================
   حالة الصوت
========================================================= */

.global-voice-widget {

    position: fixed;

    bottom: 22px;

    left: 25px;

    background:
        rgba(5, 1, 10, 0.95);

    border:
        2px solid #d4af37;

    padding:
        12px 20px;

    border-radius: 35px;

    color: #d4af37;

    font-weight: 700;

    box-shadow:
        0 0 30px
        rgba(138, 43, 226, 0.5);

    display: flex;

    align-items: center;

    gap: 10px;

    z-index: 1000;

    backdrop-filter: blur(10px);
}


.global-voice-widget i {

    font-size: 1.3rem;

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
        transform: scale(1.35);
        opacity: 1;
    }

    100% {
        transform: scale(1);
        opacity: 0.7;
    }
}


/* =========================================================
   الموبايل
========================================================= */

@media (max-width: 768px) {

    .top-nav-bar {
        width: 92%;
        padding-top: 18px;
    }

    .home-back-btn {
        padding: 10px 15px;
        font-size: 0.9rem;
    }

    .mobsar-brand-wrapper {
        padding: 18px 35px;
    }

    .hero-eye-icon {
        font-size: 4rem;
    }

    .big-mobsar-title {
        font-size: 3.5rem;
        letter-spacing: 4px;
    }

    .sub-title {
        font-size: 1.8rem;
    }

    .page-description {
        font-size: 0.9rem;
        padding: 0 10px;
    }

    .spiritual-cards-container {
        width: 92%;
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .spiritual-card {
        min-height: 145px;
        padding: 20px;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        font-size: 1.7rem;
    }

    .card-content h2 {
        font-size: 1.15rem;
    }

    .card-content p {
        font-size: 0.85rem;
    }

    .global-voice-widget {
        left: 12px;
        bottom: 12px;
        padding: 9px 14px;
        font-size: 0.82rem;
    }
}


/* =========================================================
   شاشات صغيرة جدًا
========================================================= */

@media (max-width: 420px) {

    .big-mobsar-title {
        font-size: 2.8rem;
        letter-spacing: 3px;
    }

    .hero-eye-icon {
        font-size: 3.3rem;
    }

    .mobsar-brand-wrapper {
        padding: 16px 25px;
    }

    .spiritual-card {
        gap: 12px;
        padding: 16px;
    }

    .card-icon {
        width: 54px;
        height: 54px;
        font-size: 1.5rem;
        border-radius: 16px;
    }

    .card-content h2 {
        font-size: 1.05rem;
    }

    .card-content p {
        font-size: 0.78rem;
        line-height: 1.6;
    }

    .card-arrow {
        width: 35px;
        height: 35px;
    }
}

</style>

</head>

<body>

    <!-- =========================
         شريط التنقل
    ========================== -->

    <div class="top-nav-bar">

        <a href="index.php"
           class="home-back-btn">

            <i class="fa-solid fa-house"></i>

            <span>العودة للصفحة الرئيسية</span>

        </a>

    </div>


    <!-- =========================
         رأس الصفحة
    ========================== -->

    <header class="hero-header">

        <div class="mobsar-brand-wrapper">

            <div class="hero-eye-icon">
                <i class="fa-solid fa-eye"></i>
            </div>

            <div class="big-mobsar-title">
                MABSAR
            </div>

        </div>


        <div class="massive-glow-line"></div>


        <h1 class="sub-title">
            الروحانيات
        </h1>

        <p class="page-description">
            عالم متكامل من القرآن والأذكار والأحاديث والأدعية والصلاة وقصص الأنبياء
        </p>

    </header>


    <!-- =========================
         الكروت الستة
    ========================== -->

    <main class="spiritual-cards-container">


        <!-- الكرت الأول -->

        <a href="Quran.php"
           class="spiritual-card quran-card">

            <div class="card-icon">
                <i class="fa-solid fa-book-quran"></i>
            </div>

            <div class="card-content">

                <h2>
                    المصحف الشريف
                </h2>

                <p>
                    القرآن الكريم كاملًا مع التفسير والتلاوة بالتجويد
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


        <!-- الكرت الثاني -->

        <a href="Azkar.php"
           class="spiritual-card azkar-card">

            <div class="card-icon">
                <i class="fa-solid fa-sun"></i>
            </div>

            <div class="card-content">

                <h2>
                    الأذكار
                </h2>

                <p>
                    أذكار الصباح والمساء والنوم والاستيقاظ وباقي الأذكار
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


        <!-- الكرت الثالث -->

        <a href="Hadith.php"
           class="spiritual-card hadith-card">

            <div class="card-icon">
                <i class="fa-solid fa-scroll"></i>
            </div>

            <div class="card-content">

                <h2>
                    الأحاديث النبوية
                </h2>

                <p>
                    الأحاديث النبوية مع الراوي والمصدر والشرح والفوائد
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


        <!-- الكرت الرابع -->

        <a href="Duaa.php"
           class="spiritual-card duaa-card">

            <div class="card-icon">
                <i class="fa-solid fa-hands-praying"></i>
            </div>

            <div class="card-content">

                <h2>
                    الأدعية
                </h2>

                <p>
                    الأدعية المأثورة وأدعية القرآن والأنبياء وغيرها
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


        <!-- الكرت الخامس -->

        <a href="Prayer.php"
           class="spiritual-card prayer-card">

            <div class="card-icon">
                <i class="fa-solid fa-mosque"></i>
            </div>

            <div class="card-content">

                <h2>
                    الصلاة والعبادات
                </h2>

                <p>
                    مواقيت الصلاة والمتابعة والسنن والرواتب وكيفية الصلاة
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


        <!-- الكرت السادس -->

        <a href="Prophets.php"
           class="spiritual-card prophets-card">

            <div class="card-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div class="card-content">

                <h2>
                    قصص الأنبياء
                </h2>

                <p>
                    قصص الأنبياء والأحداث والعبر والفوائد والمصادر
                </p>

            </div>

            <div class="card-arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </div>

        </a>


    </main>


    <!-- =========================
         حالة الصوت
    ========================== -->

    <div class="global-voice-widget">

        <i class="fa-solid fa-microphone"></i>

        <span>
            الاستماع الصوتي جاهز
        </span>

    </div>

<script>
/* =====================================================
   TEAN - PART 1
   محرك الصوت + التحكم في الميكروفون
   ===================================================== */

(function () {

    let recognition = null;
    let listening = false;
    let speaking = false;
    let keepListening = true;

    const voiceWidget =
        document.querySelector(".global-voice-widget");

    const voiceStatus =
        voiceWidget ? voiceWidget.querySelector("span") : null;


    function cleanText(text) {
        return String(text || "").trim();
    }


    function setVoiceStatus(text) {

        if (voiceStatus) {
            voiceStatus.textContent = text;
        }

        console.log(text);
    }


    /* =====================================================
       تشغيل كلام مبصر
       ===================================================== */

    function speak(text, callback) {

        speaking = true;

        /* اقفل المايك فورًا */
        stopListening();

        setVoiceStatus(
            "🔊 مبصر يتحدث... الميكروفون مغلق"
        );


        window.speechSynthesis.cancel();


        const utterance =
            new SpeechSynthesisUtterance(cleanText(text));

        utterance.lang = "ar-EG";
        utterance.rate = 1.05;
        utterance.pitch = 1;


        /* أثناء بداية الكلام */
        utterance.onstart = function () {

            speaking = true;

            stopListening();

            setVoiceStatus(
                "🔊 مبصر يتحدث... الميكروفون مغلق"
            );
        };


        /* بعد انتهاء الكلام */
        utterance.onend = function () {

            speaking = false;

            setVoiceStatus(
                "🎙️ انتهى الكلام، يمكنك التحدث الآن"
            );


            setTimeout(function () {

                if (typeof callback === "function") {
                    callback();
                }

                if (keepListening && !speaking) {
                    startListening();
                }

            }, 300);
        };


        /* في حالة حدوث خطأ */
        utterance.onerror = function () {

            speaking = false;

            setVoiceStatus(
                "🎙️ يمكنك التحدث الآن"
            );


            setTimeout(function () {

                if (typeof callback === "function") {
                    callback();
                }

                if (keepListening && !speaking) {
                    startListening();
                }

            }, 300);
        };


        window.speechSynthesis.speak(utterance);
    }


    /* =====================================================
       تشغيل الميكروفون
       ===================================================== */

    function startListening() {

        if (!recognition) {
            return;
        }

        if (speaking) {
            return;
        }

        if (listening) {
            return;
        }


        try {

            recognition.start();

        } catch (error) {

            console.log(
                "الميكروفون يعمل بالفعل أو لم يجهز بعد"
            );
        }
    }


    /* =====================================================
       إيقاف الميكروفون
       ===================================================== */

    function stopListening() {

        listening = false;

        if (recognition) {

            try {
                recognition.stop();
            } catch (error) {
                console.log("إيقاف الميكروفون");
            }

        }
    }


    /* =====================================================
       Speech Recognition
       ===================================================== */

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if (SpeechRecognition) {

        recognition = new SpeechRecognition();

        recognition.lang = "ar-EG";

        recognition.continuous = true;

        recognition.interimResults = false;

        recognition.maxAlternatives = 3;


        recognition.onstart = function () {

            if (speaking) {
                stopListening();
                return;
            }

            listening = true;

            setVoiceStatus(
                "🎙️ الميكروفون مفتوح... استمع"
            );
        };


        recognition.onresult = function (event) {

            if (speaking) {
                return;
            }


            const result =
                event.results[event.results.length - 1];

            if (!result || !result[0]) {
                return;
            }


            const text =
                result[0].transcript.trim();


            if (!text) {
                return;
            }


            console.log(
                "🎤 المستخدم قال:",
                text
            );


            if (
                window.TEANVoice &&
                typeof window.TEANVoice.handle === "function"
            ) {

                window.TEANVoice.handle(text);

            }

        };


        recognition.onend = function () {

            listening = false;


            /*
             * ممنوع نفتح المايك أثناء كلام مبصر
             */

            if (speaking) {
                return;
            }


            if (keepListening) {

                setTimeout(function () {

                    if (!speaking) {
                        startListening();
                    }

                }, 400);

            }

        };


        recognition.onerror = function (event) {

            listening = false;

            console.log(
                "Speech Recognition:",
                event.error
            );


            if (
                event.error === "not-allowed" ||
                event.error === "service-not-allowed"
            ) {

                setVoiceStatus(
                    "⚠️ اسمحي للمتصفح باستخدام الميكروفون"
                );

                return;
            }


            if (!speaking && keepListening) {

                setTimeout(function () {
                    startListening();
                }, 700);

            }

        };

    } else {

        setVoiceStatus(
            "⚠️ المتصفح لا يدعم التحكم الصوتي"
        );

    }


    /* =====================================================
       أول تفاعل مع الصفحة
       ===================================================== */

    document.addEventListener(
        "click",
        function () {

            if (!speaking) {
                startListening();
            }

        },
        { once: true }
    );


    document.addEventListener(
        "touchstart",
        function () {

            if (!speaking) {
                startListening();
            }

        },
        { once: true }
    );


    /* =====================================================
       النظام العام للأوامر
       ===================================================== */

    window.TEANVoice = {

        speak: speak,

        startListening: startListening,

        stopListening: stopListening,

        cleanText: cleanText,

        isListening: function () {
            return listening;
        },

        isSpeaking: function () {
            return speaking;
        },

        handle: function (text) {

            console.log(
                "الأمر الصوتي:",
                text
            );

        }

    };


})();
</script>





<script>
/* =====================================================
   TEAN - PART 2
   الترحيب + معرفة الصفحة الحالية
   ===================================================== */

(function () {

    let welcomeDone = false;


    function normalize(text) {

        return String(text || "")
            .toLowerCase()
            .replace(/[إأآ]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .trim();

    }


    function welcome() {

        if (welcomeDone) {
            return;
        }

        welcomeDone = true;


        window.TEANVoice.speak(
            "مرحبًا بك في صفحة الروحانيات من مبصر. " +
            "هذه الصفحة تجمع المصحف الشريف، والأذكار، " +
            "والأحاديث النبوية، والأدعية، والصلاة والعبادات، " +
            "وقصص الأنبياء. يمكنك استخدام صوتك للتنقل بين الصفحات."
        );

    }


    /* =====================================================
       معرفة الصفحة الحالية
       ===================================================== */

    function whereAmI() {

        window.TEANVoice.speak(
            "أنت الآن في صفحة الروحانيات من مبصر."
        );

    }


    /* =====================================================
       شرح الصفحة
       ===================================================== */

    function explainPage() {

        window.TEANVoice.speak(
            "أنت في صفحة الروحانيات. " +
            "يمكنك من هنا الوصول إلى ستة أقسام: " +
            "المصحف الشريف، الأذكار، الأحاديث النبوية، " +
            "الأدعية، الصلاة والعبادات، وقصص الأنبياء."
        );

    }


    /* =====================================================
       أوامر Part 2
       ===================================================== */

    function handlePart2(text) {

        const command = normalize(text);


        /* أنا فين؟ */

        if (
            command === "انا فين" ||
            command.includes("انا في صفحه ايه") ||
            command.includes("انا في صفحة ايه") ||
            command.includes("انا فين دلوقتي") ||
            command.includes("فين انا")
        ) {

            whereAmI();

            return true;
        }


        /* الصفحة دي بتعمل إيه؟ */

        if (
            command.includes("الصفحه دي بتعمل ايه") ||
            command.includes("الصفحة دي بتعمل ايه") ||
            command.includes("الصفحه دي بتاعت ايه") ||
            command.includes("الصفحة دي بتاعت ايه") ||
            command.includes("اشرحلي الصفحه") ||
            command.includes("اقرا الصفحه")
        ) {

            explainPage();

            return true;
        }


        return false;
    }


    /* =====================================================
       ربط Part 2 بمحرك Part 1
       ===================================================== */

    const previousHandler =
        window.TEANVoice.handle;


    window.TEANVoice.handle = function (text) {


        const handled =
            handlePart2(text);


        if (handled) {
            return;
        }


        if (typeof previousHandler === "function") {
            previousHandler(text);
        }

    };


    window.addEventListener(
        "load",
        function () {

            setTimeout(function () {

                welcome();

            }, 1200);

        }
    );


    /*
       لو المتصفح منع الترحيب التلقائي،
       أول ضغطة تشغله.
    */

    document.addEventListener(
        "click",
        function () {
            welcome();
        },
        { once: true }
    );


    document.addEventListener(
        "touchstart",
        function () {
            welcome();
        },
        { once: true }
    );


})();
</script>

<script>
/* =====================================================
   TEAN - PART 2
   الترحيب + معرفة الصفحة الحالية
   ===================================================== */

(function () {

    let welcomeDone = false;


    function normalize(text) {

        return String(text || "")
            .toLowerCase()
            .replace(/[إأآ]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .trim();

    }


    function welcome() {

        if (welcomeDone) {
            return;
        }

        welcomeDone = true;


        window.TEANVoice.speak(
            "مرحبًا بك في صفحة الروحانيات من مبصر. " +
            "هذه الصفحة تجمع المصحف الشريف، والأذكار، " +
            "والأحاديث النبوية، والأدعية، والصلاة والعبادات، " +
            "وقصص الأنبياء. يمكنك استخدام صوتك للتنقل بين الصفحات."
        );

    }


    /* =====================================================
       معرفة الصفحة الحالية
       ===================================================== */

    function whereAmI() {

        window.TEANVoice.speak(
            "أنت الآن في صفحة الروحانيات من مبصر."
        );

    }


    /* =====================================================
       شرح الصفحة
       ===================================================== */

    function explainPage() {

        window.TEANVoice.speak(
            "أنت في صفحة الروحانيات. " +
            "يمكنك من هنا الوصول إلى ستة أقسام: " +
            "المصحف الشريف، الأذكار، الأحاديث النبوية، " +
            "الأدعية، الصلاة والعبادات، وقصص الأنبياء."
        );

    }


    /* =====================================================
       أوامر Part 2
       ===================================================== */

    function handlePart2(text) {

        const command = normalize(text);


        /* أنا فين؟ */

        if (
            command === "انا فين" ||
            command.includes("انا في صفحه ايه") ||
            command.includes("انا في صفحة ايه") ||
            command.includes("انا فين دلوقتي") ||
            command.includes("فين انا")
        ) {

            whereAmI();

            return true;
        }


        /* الصفحة دي بتعمل إيه؟ */

        if (
            command.includes("الصفحه دي بتعمل ايه") ||
            command.includes("الصفحة دي بتعمل ايه") ||
            command.includes("الصفحه دي بتاعت ايه") ||
            command.includes("الصفحة دي بتاعت ايه") ||
            command.includes("اشرحلي الصفحه") ||
            command.includes("اقرا الصفحه")
        ) {

            explainPage();

            return true;
        }


        return false;
    }


    /* =====================================================
       ربط Part 2 بمحرك Part 1
       ===================================================== */

    const previousHandler =
        window.TEANVoice.handle;


    window.TEANVoice.handle = function (text) {


        const handled =
            handlePart2(text);


        if (handled) {
            return;
        }


        if (typeof previousHandler === "function") {
            previousHandler(text);
        }

    };


    window.addEventListener(
        "load",
        function () {

            setTimeout(function () {

                welcome();

            }, 1200);

        }
    );


    /*
       لو المتصفح منع الترحيب التلقائي،
       أول ضغطة تشغله.
    */

    document.addEventListener(
        "click",
        function () {
            welcome();
        },
        { once: true }
    );


    document.addEventListener(
        "touchstart",
        function () {
            welcome();
        },
        { once: true }
    );


})();
</script>

<script>
/* =====================================================
   TEAN - PART 3
   فتح أقسام الروحانيات الستة
   ===================================================== */

(function () {


    function normalize(text) {

        return String(text || "")
            .toLowerCase()
            .replace(/[إأآ]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .trim();

    }


    function openPage(page, message) {

        /*
         * speak في Part 1 يقفل المايك
         * ويعيده بعد انتهاء الكلام
         */

        window.TEANVoice.speak(
            message,
            function () {

                window.location.href = page;

            }
        );

    }


    function handlePart3(text) {

        const command = normalize(text);


        /* ==============================
           المصحف الشريف
           ============================== */

        if (
            command.includes("افتح المصحف") ||
            command.includes("افتح القران") ||
            command.includes("المصحف الشريف") ||
            command.includes("صفحه المصحف") ||
            command.includes("وديني للمصحف")
        ) {

            openPage(
                "Quran.php",
                "حاضر، جاري فتح المصحف الشريف."
            );

            return true;
        }


        /* ==============================
           الأذكار
           ============================== */

        if (
            command.includes("افتح الاذكار") ||
            command.includes("الاذكار") ||
            command.includes("صفحه الاذكار") ||
            command.includes("وديني للاذكار")
        ) {

            openPage(
                "Azkar.php",
                "حاضر، جاري فتح الأذكار."
            );

            return true;
        }


        /* ==============================
           الأحاديث
           ============================== */

        if (
            command.includes("افتح الاحاديث") ||
            command.includes("الاحاديث النبويه") ||
            command.includes("صفحه الاحاديث") ||
            command.includes("وديني للاحاديث")
        ) {

            openPage(
                "Hadith.php",
                "حاضر، جاري فتح الأحاديث النبوية."
            );

            return true;
        }


        /* ==============================
           الأدعية
           ============================== */

        if (
            command.includes("افتح الادعيه") ||
            command.includes("الادعيه") ||
            command.includes("صفحه الادعيه") ||
            command.includes("وديني للادعيه")
        ) {

            openPage(
                "Duaa.php",
                "حاضر، جاري فتح الأدعية."
            );

            return true;
        }


        /* ==============================
           الصلاة والعبادات
           ============================== */

        if (
            command.includes("افتح الصلاه") ||
            command.includes("الصلاه والعبادات") ||
            command.includes("صفحه الصلاه") ||
            command.includes("وديني للصلاه")
        ) {

            openPage(
                "Prayer.php",
                "حاضر، جاري فتح صفحة الصلاة والعبادات."
            );

            return true;
        }


        /* ==============================
           قصص الأنبياء
           ============================== */

        if (
            command.includes("افتح قصص الانبياء") ||
            command.includes("قصص الانبياء") ||
            command.includes("صفحه قصص الانبياء") ||
            command.includes("وديني لقصص الانبياء")
        ) {

            openPage(
                "Prophets.php",
                "حاضر، جاري فتح قصص الأنبياء."
            );

            return true;
        }


        return false;
    }


    /* =====================================================
       ربط Part 3 بالـ Handler السابق
       ===================================================== */

    const previousHandler =
        window.TEANVoice.handle;


    window.TEANVoice.handle = function (text) {


        const handled =
            handlePart3(text);


        if (handled) {
            return;
        }


        if (typeof previousHandler === "function") {
            previousHandler(text);
        }

    };


    window.TEANVoice.handlePart3 =
        handlePart3;


})();
</script>

<script>
/* =====================================================
   MABSAR - PART 4
   فتح باقي صفحات مبصر بالصوت
   ===================================================== */

(function () {


    function normalize(text) {

        return String(text || "")
            .toLowerCase()
            .replace(/[إأآ]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .trim();

    }


    function openPage(page, message) {

        window.TEANVoice.speak(
            message,
            function () {

                window.location.href = page;

            }
        );

    }


    function handlePart4(text) {

        const command = normalize(text);


        /* ================================================
           الرئيسية / القائمة الرئيسية
           ================================================ */

        if (
            command.includes("الصفحه الرئيسيه") ||
            command.includes("الرئيسيه") ||
            command.includes("القائمه الرئيسيه") ||
            command.includes("افتح الرئيسيه") ||
            command.includes("وديني للرئيسيه") ||
            command.includes("وديني الصفحه الرئيسيه")
        ) {

            openPage(
                "index.php",
                "حاضر، جاري فتح الصفحة الرئيسية."
            );

            return true;
        }


        /* ================================================
           التسجيل
           ================================================ */

        if (
            command.includes("افتح التسجيل") ||
            command.includes("صفحه التسجيل") ||
            command.includes("وديني للتسجيل") ||
            command === "التسجيل" ||
            command.includes("حساب جديد") ||
            command.includes("انشاء حساب")
        ) {

            openPage(
                "register.php",
                "حاضر، جاري فتح صفحة التسجيل."
            );

            return true;
        }


        /* ================================================
           المهام
           ================================================ */

        if (
            command.includes("افتح المهام") ||
            command.includes("صفحه المهام") ||
            command.includes("وديني للمهام") ||
            command === "المهام" ||
            command.includes("قائمه المهام")
        ) {

            openPage(
                "tasks.php",
                "حاضر، جاري فتح صفحة المهام."
            );

            return true;
        }


        /* ================================================
           إدارة الملفات
           ================================================ */

        if (
            command.includes("اداره الملفات") ||
            command.includes("الملفات") ||
            command.includes("ملفاتي") ||
            command.includes("افتح اداره الملفات") ||
            command.includes("صفحه الملفات") ||
            command.includes("وديني لاداره الملفات")
        ) {

            openPage(
                "notifications.php",
                "حاضر، جاري فتح إدارة الملفات."
            );

            return true;
        }


        /* ================================================
           المساعد البصري
           ================================================ */

        if (
            command.includes("المساعد البصري") ||
            command.includes("مساعد بصري") ||
            command.includes("افتح المساعد البصري") ||
            command.includes("صفحه المساعد البصري") ||
            command.includes("وديني للمساعد البصري")
        ) {

            openPage(
                "visual-assistant.php",
                "حاضر، جاري فتح المساعد البصري."
            );

            return true;
        }


        /* ================================================
           الإعدادات
           ================================================ */

        if (
            command.includes("افتح الاعدادات") ||
            command.includes("الاعدادات") ||
            command.includes("صفحه الاعدادات") ||
            command.includes("وديني للاعدادات")
        ) {

            openPage(
                "settings.php",
                "حاضر، جاري فتح الإعدادات."
            );

            return true;
        }


        /* ================================================
           الموظفين والمدير
           ================================================ */

        if (
            command.includes("الموظفين") ||
            command.includes("الموظفين والمدير") ||
            command.includes("المدير والموظفين") ||
            command.includes("صفحه الموظفين") ||
            command.includes("افتح الموظفين") ||
            command.includes("وديني للموظفين") ||
            command.includes("اداره الموظفين")
        ) {

            openPage(
                "employees.php",
                "حاضر، جاري فتح صفحة الموظفين والمدير."
            );

            return true;
        }


        /* ================================================
           التواصل
           ================================================ */

        if (
            command.includes("التواصل") ||
            command.includes("مدير التواصل") ||
            command.includes("اداره التواصل") ||
            command.includes("صفحه التواصل") ||
            command.includes("افتح التواصل") ||
            command.includes("وديني للتواصل")
        ) {

            openPage(
                "communication.php",
                "حاضر، جاري فتح صفحة التواصل."
            );

            return true;
        }


        /* ================================================
           التقييم والإنجازات
           ================================================ */

        if (
            command.includes("التقييم") ||
            command.includes("الانجازات") ||
            command.includes("التقييم والانجازات") ||
            command.includes("الانجازات والتقييم") ||
            command.includes("صفحه التقييم") ||
            command.includes("افتح التقييم") ||
            command.includes("وديني للتقييم") ||
            command.includes("التقارير")
        ) {

            openPage(
                "evaluation.php",
                "حاضر، جاري فتح صفحة التقييم والإنجازات والتقارير."
            );

            return true;
        }


        /* ================================================
           تقويم المواعيد والأخبار
           ================================================ */

        if (
            command.includes("التقويم") ||
            command.includes("تقويم المواعيد") ||
            command.includes("المواعيد") ||
            command.includes("الاخبار") ||
            command.includes("المواعيد والاخبار") ||
            command.includes("تقويم المواعيد والاخبار") ||
            command.includes("صفحه المواعيد") ||
            command.includes("افتح التقويم") ||
            command.includes("وديني للتقويم")
        ) {

            openPage(
                "schedule.php",
                "حاضر، جاري فتح تقويم المواعيد والأخبار."
            );

            return true;
        }


        /* ================================================
           Excel
           ================================================ */

        if (
            command.includes("افتح اكسل") ||
            command.includes("اكسل") ||
            command.includes("صفحه اكسل")
        ) {

            openPage(
                "Excel.php",
                "حاضر، جاري فتح إكسل."
            );

            return true;
        }


        /* ================================================
           Word
           ================================================ */

        if (
            command.includes("افتح وورد") ||
            command === "وورد" ||
            command.includes("صفحه وورد")
        ) {

            openPage(
                "Word.php",
                "حاضر، جاري فتح وورد."
            );

            return true;
        }


        /* ================================================
           PowerPoint
           ================================================ */

        if (
            command.includes("افتح باوربوينت") ||
            command === "باوربوينت" ||
            command.includes("صفحه باوربوينت")
        ) {

            openPage(
                "PowerPoint.php",
                "حاضر، جاري فتح باوربوينت."
            );

            return true;
        }


        return false;
    }


    /* =====================================================
       ربط Part 4 بالـ Parts السابقة
       ===================================================== */

    const previousHandler =
        window.TEANVoice.handle;


    window.TEANVoice.handle = function (text) {


        const handled =
            handlePart4(text);


        if (handled) {
            return;
        }


        if (typeof previousHandler === "function") {
            previousHandler(text);
        }

    };


    window.TEANVoice.handlePart4 =
        handlePart4;


})();
</script>



</body>

</html>