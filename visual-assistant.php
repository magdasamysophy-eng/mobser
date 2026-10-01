


<?php
// visual-assistant.php
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>MOBSAR | المساعد البصري</title>


    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet"
    >


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Cinzel:wght@600;700&display=swap"
        rel="stylesheet"
    >


<style>

/* =====================================================
                    GENERAL
   ===================================================== */

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


/* =====================================================
                    TOP NAV
   ===================================================== */

.top-nav-bar {

    width: 90%;

    max-width: 1100px;

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding-top: 25px;
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
        0 0 15px
        rgba(212,175,55,0.15);
}


.home-back-btn:hover,
.chat-nav-btn:hover {

    background: #d4af37;

    color: #000000;

    box-shadow:
        0 0 25px
        rgba(212,175,55,0.7);

    transform: translateY(-2px);
}


/* =====================================================
                    HERO
   ===================================================== */

.hero-header {

    text-align: center;

    padding:
        10px 20px 5px;

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
            rgba(30,10,50,0.9) 0%,
            rgba(5,2,10,0.98) 80%
        );

    box-shadow:

        0 0 50px
        rgba(138,43,226,0.35),

        inset 0 0 25px
        rgba(212,175,55,0.25);

    border:
        1px solid
        rgba(212,175,55,0.4);

    animation:
        magicGlow 3s infinite alternate;
}


@keyframes magicGlow {

    0% {

        box-shadow:

            0 0 25px
            rgba(138,43,226,0.3),

            inset 0 0 15px
            rgba(212,175,55,0.15);

        border-color:
            rgba(212,175,55,0.3);
    }


    100% {

        box-shadow:

            0 0 60px
            rgba(212,175,55,0.5),

            inset 0 0 30px
            rgba(138,43,226,0.5);

        border-color:
            rgba(212,175,55,0.8);
    }
}


.hero-eye-icon {

    font-size: 5.8rem;

    color: #d4af37;

    filter:
        drop-shadow(
            0 0 20px
            rgba(212,175,55,0.7)
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

    transform:
        skewX(-8deg);

    filter:
        drop-shadow(
            0 0 20px
            rgba(138,43,226,0.6)
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

    margin:
        20px auto 12px;

    border-radius: 50%;
}


.sub-title {

    font-size: 2.3rem;

    color: #d4af37;

    margin-top: 5px;

    font-weight: 700;

    text-shadow:
        0 0 20px
        rgba(212,175,55,0.5);
}


/* =====================================================
                 MAIN CARDS
   ===================================================== */

.main-tasks-container {

    width: 90%;

    max-width: 1100px;

    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 25px;

    margin-top: 25px;
}


/* =====================================================
                    CARD
   ===================================================== */

.card-box {

    background:
        linear-gradient(
            135deg,
            rgba(15,6,26,0.95),
            rgba(3,1,6,0.98)
        );

    backdrop-filter: blur(20px);

    border:
        1px solid
        rgba(212,175,55,0.35);

    border-radius: 22px;

    padding: 30px;

    min-height: 330px;

    box-shadow:

        0 20px 50px
        rgba(0,0,0,0.95),

        0 0 30px
        rgba(138,43,226,0.15),

        inset 0 0 25px
        rgba(212,175,55,0.08);

    transition: 0.3s;

    cursor: pointer;
}


.card-box:hover {

    border-color:
        rgba(212,175,55,0.7);

    box-shadow:

        0 25px 60px
        rgba(0,0,0,0.98),

        0 0 40px
        rgba(212,175,55,0.25);

    transform:
        translateY(-5px);
}


/* =====================================================
                 CARD TITLE
   ===================================================== */

.card-box h3 {

    color: #ffffff;

    font-size: 1.4rem;

    margin-bottom: 25px;

    text-align: right;

    border-bottom:
        1px solid
        rgba(212,175,55,0.2);

    padding-bottom: 12px;

    display: flex;

    justify-content: space-between;

    align-items: center;
}


/* =====================================================
              CARD CONTENT
   ===================================================== */

.visual-card-content {

    min-height: 220px;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    text-align: center;
}


/* =====================================================
                  ICON
   ===================================================== */

.visual-icon {

    width: 105px;

    height: 105px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    color: #d4af37;

    font-size: 3.3rem;

    margin-bottom: 18px;

    background:
        radial-gradient(
            circle,
            #1a0833 0%,
            #05010a 100%
        );

    border:
        2px solid
        rgba(212,175,55,0.55);

    box-shadow:

        0 0 30px
        rgba(138,43,226,0.35),

        inset 0 0 15px
        rgba(212,175,55,0.2);

    transition: 0.3s;
}


.card-box:hover .visual-icon {

    transform:
        scale(1.08);

    color: #ffffff;

    border-color:
        #d4af37;

    box-shadow:

        0 0 40px
        rgba(212,175,55,0.5),

        inset 0 0 20px
        rgba(138,43,226,0.4);
}


/* =====================================================
                  CARD TEXT
   ===================================================== */

.visual-card-content h4 {

    color: #fef08a;

    font-size: 1.45rem;

    font-weight: 700;

    margin-bottom: 10px;
}


.visual-card-content p {

    color: #d8b4fe;

    font-size: 1rem;

    line-height: 1.9;

    margin: 0;

    max-width: 430px;
}


/* =====================================================
                  OPEN BUTTON
   ===================================================== */

.visual-open-btn {

    margin-top: 20px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    padding:
        10px 22px;

    border:
        1px solid
        rgba(212,175,55,0.55);

    border-radius: 10px;

    color: #d4af37;

    background:
        rgba(5,1,10,0.75);

    font-size: 0.9rem;

    font-weight: 700;

    transition: 0.3s;
}


.card-box:hover .visual-open-btn {

    background:
        #d4af37;

    color: #000000;

    box-shadow:
        0 0 15px
        rgba(212,175,55,0.45);
}


/* =====================================================
                    FOOTER
   ===================================================== */

.page-footer {

    margin-top: 45px;

    color: #6b5a73;

    font-size: 0.85rem;

    text-align: center;
}


/* =====================================================
                  RESPONSIVE
   ===================================================== */

@media(max-width: 768px) {

    .main-tasks-container {

        grid-template-columns:
            1fr;

        width: 92%;
    }


    .big-mobsar-title {

        font-size:
            3.8rem;

        letter-spacing:
            3px;
    }


    .hero-eye-icon {

        font-size:
            4.5rem;
    }


    .mobsar-brand-wrapper {

        padding:
            20px 35px;
    }


    .massive-glow-line {

        width:
            280px;
    }


    .sub-title {

        font-size:
            1.8rem;
    }

}


@media(max-width: 480px) {

    .top-nav-bar {

        width:
            92%;
    }


    .home-back-btn,
    .chat-nav-btn {

        padding:
            10px 12px;

        font-size:
            0.78rem;
    }


    .big-mobsar-title {

        font-size:
            2.9rem;
    }


    .hero-eye-icon {

        font-size:
            3.7rem;
    }


    .massive-glow-line {

        width:
            220px;
    }


    .sub-title {

        font-size:
            1.5rem;
    }


    .card-box {

        padding:
            20px;

        min-height:
            300px;
    }

}

</style>

</head>


<body>


<!-- =====================================================
                       TOP NAV
     ===================================================== -->

<div class="top-nav-bar">


    <a
        href="index.php"
        class="home-back-btn"
        onmouseenter="speakQuick('العودة للصفحة الرئيسية')"
        onclick="goToHome(event)"
    >

        <i class="fa-solid fa-house"></i>

        الصفحة الرئيسية

    </a>


    <a
        href="communication.php"
        class="chat-nav-btn"
        onmouseenter="speakQuick('الانتقال لصفحة التواصل')"
        onclick="goToCommunication(event)"
    >

        <i class="fa-solid fa-comments"></i>

        صفحة التواصل

        <i
            class="fa-solid fa-bolt"
            style="color:#d4af37;"
        ></i>

    </a>


</div>



<!-- =====================================================
                         HERO
     ===================================================== -->

<div class="hero-header">


    <div
        class="mobsar-brand-wrapper"
        onmouseenter="speakQuick('مبصر')"
    >

        <i
            class="fa-solid fa-eye hero-eye-icon"
        ></i>


        <h1 class="big-mobsar-title">

            MOBSAR

        </h1>

    </div>


    <div class="massive-glow-line"></div>


    <div
        class="sub-title"
        onmouseenter="speakQuick('المساعد البصري')"
    >

        المساعد البصري

    </div>


</div>



<!-- =====================================================
                     MAIN CARDS
     ===================================================== -->

<div class="main-tasks-container">


    <!-- ================= AI ================= -->

    <div
        class="card-box"
        onclick="openVisualPage('mobsar-ai.php')"
        onmouseenter="speakQuick('مبصر للذكاء الاصطناعي')"
    >

        <h3>

            <span>
                MOBSAR AI
            </span>

            <i
                class="fa-solid fa-robot"
                style="color:#d4af37;"
            ></i>

        </h3>


        <div class="visual-card-content">


            <div class="visual-icon">

                <i
                    class="fa-solid fa-robot"
                ></i>

            </div>


            <h4>

                MOBSAR AI

            </h4>


            <p>

                مساعد مبصر الذكي للمحادثة
                وطرح الأسئلة والحصول على المساعدة.

            </p>


            <div class="visual-open-btn">

                فتح

                <i
                    class="fa-solid fa-arrow-left"
                ></i>

            </div>


        </div>

    </div>



    <!-- ================= CAMERA ================= -->

    <div
        class="card-box"
        onclick="openVisualPage('camera.php')"
        onmouseenter="speakQuick('الكاميرا')"
    >

        <h3>

            <span>
                الكاميرا
            </span>

            <i
                class="fa-solid fa-camera"
                style="color:#d4af37;"
            ></i>

        </h3>


        <div class="visual-card-content">


            <div class="visual-icon">

                <i
                    class="fa-solid fa-camera"
                ></i>

            </div>


            <h4>

                الكاميرا

            </h4>


            <p>

                افتح الكاميرا لاستخدام
                المساعدة البصرية وقراءة النصوص.

            </p>


            <div class="visual-open-btn">

                فتح

                <i
                    class="fa-solid fa-arrow-left"
                ></i>

            </div>


        </div>

    </div>


</div>



<!-- =====================================================
                       FOOTER
     ===================================================== -->

<div class="page-footer">

    MOBSAR © 2026

</div>



<!-- =====================================================
              هنا يبدأ SCRIPT بتاعك القديم
     
              حطي السكريبت القديم كما هو
              بدون تغيير أي سطر.
     ===================================================== -->

<script>

/*
    الصق هنا SCRIPT القديم بالكامل
    كما كان عندك بالضبط.

    لا تغيري:
    - أسماء الدوال
    - IDs
    - أوامر الصوت
    - openVisualPage
    - goToHome
    - goToCommunication
    - speakQuick
    - أي وظائف أخرى موجودة عندك
*/

</script>




    <script>









// ==========================================
// MOBSAR - VISUAL ASSISTANT
// PART 1 - VOICE + GREETING
// ==========================================

(function () {

    let recognition = null;
    let voiceStarted = false;
    let listening = false;
    let speaking = false;

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

    function speak(text, callback) {

        if (!text) return;

        speaking = true;

        // إيقاف الميكروفون أثناء كلام المساعد
        if (recognition && listening) {
            try {
                recognition.stop();
            } catch (e) {}
        }

        listening = false;

        try {
            speechSynthesis.cancel();
        } catch (e) {}

        const message =
            new SpeechSynthesisUtterance(text);

        message.lang = "ar-EG";
        message.rate = 0.9;
        message.pitch = 1;

        message.onend = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            // تشغيل الميكروفون بعد انتهاء الكلام
            if (voiceStarted) {
                setTimeout(startListening, 400);
            }
        };

        message.onerror = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            if (voiceStarted) {
                setTimeout(startListening, 400);
            }
        };

        speechSynthesis.speak(message);
    }

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

            console.log("MOBSAR: الميكروفون يعمل");
        };

        recognition.onerror = function (event) {

            listening = false;

            console.log(
                "MOBSAR VOICE ERROR:",
                event.error
            );

            if (
                event.error === "not-allowed" ||
                event.error === "service-not-allowed"
            ) {

                voiceStarted = false;

                speak(
                    "يجب السماح للمتصفح باستخدام الميكروفون."
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
                "MOBSAR: التعرف يعمل بالفعل"
            );
        }
    }

    function startVoice() {

        if (voiceStarted) return;

        voiceStarted = true;

        startListening();
    }

    // أول ضغطة تشغل الصوت والترحيب
    document.addEventListener(
        "click",
        function () {

            if (!voiceStarted) {

                startVoice();

                speak(
                    "مرحبًا بك في صفحة المساعد البصري"
                );
            }

        },
        { once: true }
    );



// ==========================================
// PART 2 - VISUAL ASSISTANT NAVIGATION
// ==========================================

    function goToPage(file, pageName) {

        speak(
            "جاري الانتقال إلى صفحة " + pageName,
            function () {

                window.location.href = file;

            }
        );
    }

    function openMobsarAI() {

        goToPage(
            "mobsar-ai.php",
            "مبصر آي آي"
        );
    }

    function openImageAnalysis() {

        goToPage(
            "image-analysis.php",
            "تحليل الصور"
        );
    }

    function openFileReader() {

        goToPage(
            "file-reader.php",
            "قارئ الملفات"
        );
    }

    function openVideoAnalysis() {

        goToPage(
            "video-analysis.php",
            "تحليل الفيديو"
        );
    }

    function openTextReader() {

        goToPage(
            "text-reader.php",
            "قارئ النصوص"
        );
    }

    function openCamera() {

        goToPage(
            "camera.php",
            "الكاميرا"
        );
    }


// ==========================================
// PART 3 - VOICE COMMANDS
// ==========================================

    function handleVoiceCommand(text) {

        const command = clean(text);

        console.log(
            "MOBSAR SAID:",
            command
        );

        // ------------------------------
        // MOBSAR AI
        // ------------------------------

        if (
            has(command, [
                "افتح ai",
                "افتحلي ai",
                "اديني ai",
                "هاتلي ai",
                "عايز ai",
                "عايزه ai",
                "عايزة ai",
                "مساعد ai",
                "مبصر ai",
                "مبصر اي اي",
                "اي اي"
            ])
        ) {

            openMobsarAI();
            return;
        }

        // ------------------------------
        // تحليل الصور
        // ------------------------------

        if (
            has(command, [
                "افتح تحليل الصور",
                "افتحلي تحليل الصور",
                "اديني تحليل الصور",
                "هاتلي تحليل الصور",
                "عايز تحليل الصور",
                "عايزه تحليل الصور",
                "عايزة تحليل الصور",
                "افتح تحليل صورة",
                "افتحلي تحليل صورة",
                "عايز تحليل صورة",
                "عايزه تحليل صورة",
                "عايزة تحليل صورة",
                "احلل صورة",
                "حلل صورة"
            ])
        ) {

            openImageAnalysis();
            return;
        }

        // ------------------------------
        // قارئ الملفات
        // ------------------------------

        if (
            has(command, [
                "افتح قارئ الملفات",
                "افتحلي قارئ الملفات",
                "اديني قارئ الملفات",
                "هاتلي قارئ الملفات",
                "عايز قارئ الملفات",
                "عايزه قارئ الملفات",
                "عايزة قارئ الملفات",
                "اقرا الملفات",
                "اقرالي الملفات",
                "قارئ الملفات"
            ])
        ) {

            openFileReader();
            return;
        }

        // ------------------------------
        // تحليل الفيديو
        // ------------------------------

        if (
            has(command, [
                "افتح تحليل الفيديو",
                "افتحلي تحليل الفيديو",
                "اديني تحليل الفيديو",
                "هاتلي تحليل الفيديو",
                "عايز تحليل الفيديو",
                "عايزه تحليل الفيديو",
                "عايزة تحليل الفيديو",
                "اقرا تحليل الفيديو",
                "اقرالي تحليل الفيديو",
                "احلل الفيديو",
                "حلل الفيديو"
            ])
        ) {

            openVideoAnalysis();
            return;
        }

        // ------------------------------
        // قارئ النصوص
        // ------------------------------

        if (
            has(command, [
                "افتح قارئ النصوص",
                "افتحلي قارئ النصوص",
                "اديني قارئ النصوص",
                "هاتلي قارئ النصوص",
                "عايز قارئ النصوص",
                "عايزه قارئ النصوص",
                "عايزة قارئ النصوص",
                "اقرا النصوص",
                "اقرالي النصوص",
                "قارئ النصوص"
            ])
        ) {

            openTextReader();
            return;
        }

        // ------------------------------
        // الكاميرا
        // ------------------------------

        if (
            has(command, [
                "افتح الكاميرا",
                "افتحلي الكاميرا",
                "اديني الكاميرا",
                "هاتلي الكاميرا",
                "عايز الكاميرا",
                "عايزه الكاميرا",
                "عايزة الكاميرا",
                "شغل الكاميرا",
                "شغللي الكاميرا"
            ])
        ) {

            openCamera();
            return;
        }

        // ------------------------------
        // الصفحة الحالية
        // ------------------------------

        if (
            has(command, [
                "الصفحه دي بتاعت ايه",
                "الصفحة دي بتاعت ايه",
                "دي بتاعت ايه",
                "ايه الصفحه دي",
                "ايه الصفحة دي"
            ])
        ) {

            speak(
                "دي صفحة المساعد البصري في مبصر. " +
                "من خلالها تقدر تستخدم أدوات تحليل الصور " +
                "والفيديو وقراءة الملفات والنصوص والكاميرا."
            );

            return;
        }
/* =====================================================
   باقي صفحات مبصر
   ===================================================== */

/* الرئيسية */
if (has(command, [
    "افتح الرئيسية",
    "افتحلي الرئيسية",
    "وديني للرئيسية",
    "وديني الرئيسية",
    "اديني الرئيسية",
    "هاتلي الرئيسية",
    "روح للرئيسية",
    "ارجع للرئيسية",
    "الصفحة الرئيسية",
    "الرئيسية"
])) {
    goToPage("index.php", "الرئيسية");
    return;
}


/* التسجيل */
if (has(command, [
    "افتح التسجيل",
    "افتحلي التسجيل",
    "وديني للتسجيل",
    "وديني التسجيل",
    "اديني التسجيل",
    "هاتلي التسجيل",
    "روح للتسجيل",
    "صفحة التسجيل",
    "التسجيل"
])) {
    goToPage("register.php", "التسجيل");
    return;
}


/* المهام */
if (has(command, [
    "افتح المهام",
    "افتحلي المهام",
    "وديني للمهام",
    "وديني المهام",
    "اديني المهام",
    "هاتلي المهام",
    "روح للمهام",
    "صفحة المهام",
    "المهام"
])) {
    goToPage("tasks.php", "المهام");
    return;
}


/* الروحانيات */
if (has(command, [
    "افتح الروحانيات",
    "افتحلي الروحانيات",
    "وديني للروحانيات",
    "وديني الروحانيات",
    "اديني الروحانيات",
    "هاتلي الروحانيات",
    "روح للروحانيات",
    "صفحة الروحانيات",
    "الروحانيات"
])) {
    goToPage("team.php", "الروحانيات");
    return;
}


/* الإعدادات */
if (has(command, [
    "افتح الإعدادات",
    "افتحلي الإعدادات",
    "وديني للإعدادات",
    "وديني الإعدادات",
    "اديني الإعدادات",
    "هاتلي الإعدادات",
    "روح للإعدادات",
    "صفحة الإعدادات",
    "الإعدادات"
])) {
    goToPage("settings.php", "الإعدادات");
    return;
}


/* الجدول والمواعيد */
if (has(command, [
    "افتح الجدول",
    "افتحلي الجدول",
    "وديني للجدول",
    "وديني الجدول",
    "اديني الجدول",
    "هاتلي الجدول",
    "افتح المواعيد",
    "وديني للمواعيد",
    "صفحة المواعيد",
    "صفحة الجدول",
    "الجدول",
    "المواعيد"
])) {
    goToPage("schedule.php", "الجدول والمواعيد");
    return;
}


/* الإنجازات والتقارير */
if (has(command, [
    "افتح الإنجازات",
    "افتحلي الإنجازات",
    "وديني للإنجازات",
    "وديني الإنجازات",
    "اديني الإنجازات",
    "هاتلي الإنجازات",
    "افتح التقارير",
    "وديني للتقارير",
    "صفحة الإنجازات",
    "صفحة التقارير",
    "الإنجازات",
    "التقارير"
])) {
    goToPage("evaluation.php", "الإنجازات والتقارير");
    return;
}


/* التواصل */
if (has(command, [
    "افتح التواصل",
    "افتحلي التواصل",
    "وديني للتواصل",
    "وديني التواصل",
    "اديني التواصل",
    "هاتلي التواصل",
    "روح للتواصل",
    "صفحة التواصل",
    "التواصل"
])) {
    goToPage("communications.php", "التواصل");
    return;
}


/* إدارة الملفات */
if (has(command, [
    "افتح إدارة الملفات",
    "افتحلي إدارة الملفات",
    "وديني لإدارة الملفات",
    "وديني إدارة الملفات",
    "اديني إدارة الملفات",
    "هاتلي إدارة الملفات",
    "روح لإدارة الملفات",
    "صفحة إدارة الملفات",
    "إدارة الملفات",
    "ادارة الملفات"
])) {
    goToPage("notifications.php", "إدارة الملفات");
    return;
}


/* الموظفين والمدير */
if (has(command, [
    "افتح الموظفين",
    "افتحلي الموظفين",
    "وديني للموظفين",
    "وديني الموظفين",
    "اديني الموظفين",
    "هاتلي الموظفين",
    "صفحة الموظفين",
    "افتح المدير والموظفين",
    "افتح الموظفين والمدير",
    "الموظفين",
    "المدير والموظفين"
])) {
    goToPage("employees.php", "الموظفين والمدير");
    return;
}
        // ------------------------------
        // السلام عليكم
        // ------------------------------

        if (
            has(command, [
                "السلام عليكم",
                "السلام عليكم ورحمه الله",
                "السلام عليكم ورحمة الله"
            ])
        ) {

            speak(
                "وعليكم السلام ورحمة الله وبركاته"
            );

            return;
        }

        // ------------------------------
        // أمر غير معروف
        // ------------------------------

        speak(
            "لم أفهم الأمر، حاول مرة أخرى"
        );
    }

    // ==========================================
    // استقبال الكلام من الميكروفون
    // ==========================================

    if (recognition) {

        recognition.onresult = function (event) {

            for (
                let i = event.resultIndex;
                i < event.results.length;
                i++
            ) {

                if (!event.results[i].isFinal) {
                    continue;
                }

                const text =
                    event.results[i][0]
                        .transcript
                        .trim();

                if (!text) continue;

                handleVoiceCommand(text);
            }
        };
    }

    // ==========================================
    // الدوال المتاحة للصفحة
    // ==========================================

    window.speakText = speak;
    window.speakQuick = speak;

    window.startMobsarVoice = startVoice;
    window.runGlobalVoiceCommand = startVoice;

    window.handleVoiceCommand =
        handleVoiceCommand;

    window.openMobsarAI =
        openMobsarAI;

    window.openImageAnalysis =
        openImageAnalysis;

    window.openFileReader =
        openFileReader;

    window.openVideoAnalysis =
        openVideoAnalysis;

    window.openTextReader =
        openTextReader;

    window.openCamera =
        openCamera;



        
})();

        
    </script>









</body>
</html>