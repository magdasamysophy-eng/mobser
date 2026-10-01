<?php
/*
====================================================
 MOBSAR - الصفحة الرئيسية
====================================================

لو التسجيل عندك بيحفظ تفعيل الروحانيات في Session
استخدمي:

$_SESSION['spiritual_enabled'] = true;

ولو غير مفعلة:

$_SESSION['spiritual_enabled'] = false;

====================================================
*/

session_start();

/* هل الروحانيات مفعلة؟ */
$spiritualEnabled =
    isset($_SESSION['spiritual_enabled']) &&
    $_SESSION['spiritual_enabled'] === true;

/*
   مؤقتًا لو لسه مش موصلة التسجيل بالـ Session،
   خليها true للتجربة.
   
   بعد ما تربطي صفحة التسجيل احذفي السطر التالي:
*/
// $spiritualEnabled = true;

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>MOBSAR | مبصر</title>


<style>

/* ==================================================
   RESET
================================================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}


html{
    scroll-behavior:smooth;
}


body{

    min-height:100vh;

    background:

        radial-gradient(
            circle at 50% 10%,
            rgba(112,55,155,.20),
            transparent 32%
        ),

        radial-gradient(
            circle at 80% 80%,
            rgba(79,35,112,.12),
            transparent 30%
        ),

        #030304;

    color:#fff;

    font-family:
        Arial,
        Tahoma,
        sans-serif;

    overflow-x:hidden;
}


/* ==================================================
   NAVBAR
================================================== */

.navbar{

    position:fixed;

    top:0;
    right:0;
    left:0;

    height:88px;

    z-index:1000;

    display:flex;

    align-items:center;

    justify-content:space-between;

    padding:
        0 45px;

    background:
        rgba(3,3,4,.90);

    border-bottom:
        1px solid
        rgba(218,183,91,.22);

    backdrop-filter:
        blur(14px);

    box-shadow:
        0 5px 30px
        rgba(0,0,0,.35);
}


/* ==================================================
   NAV LOGO
================================================== */

.nav-logo{

    display:flex;

    align-items:center;

    gap:14px;

    cursor:pointer;
}


.nav-eye{

    width:52px;

    height:32px;

    border:
        2px solid
        #b879e8;

    border-radius:
        75% 12%;

    transform:
        rotate(-7deg);

    position:relative;

    box-shadow:

        0 0 12px
        rgba(184,121,232,.8),

        0 0 28px
        rgba(139,67,192,.35);
}


.nav-eye::before{

    content:"";

    position:absolute;

    width:18px;

    height:18px;

    border-radius:50%;

    left:15px;

    top:5px;

    background:

        radial-gradient(
            circle,
            #fff 0%,
            #c78bf2 25%,
            #8e42c4 60%,
            #14081c 100%
        );

    box-shadow:
        0 0 12px
        #b879e8;
}


.nav-eye::after{

    content:"";

    position:absolute;

    width:5px;

    height:5px;

    background:#050505;

    border-radius:50%;

    left:22px;

    top:12px;
}


.nav-brand{

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:30px;

    font-weight:bold;

    font-style:italic;

    letter-spacing:2px;

    color:#e1bf69;

    text-shadow:
        0 0 8px
        rgba(225,191,105,.18);
}


/* ==================================================
   NAV LINKS
================================================== */

.nav-links{

    display:flex;

    align-items:center;

    gap:10px;
}


.nav-link{

    background:transparent;

    border:0;

    color:#cfc4d4;

    font-size:15px;

    padding:10px 15px;

    border-radius:20px;

    cursor:pointer;

    transition:.25s;
}


.nav-link:hover{

    color:#e1bf69;

    background:
        rgba(184,121,232,.08);
}


/* ==================================================
   زر الصوت
================================================== */

.voice-button{

    width:46px;

    height:46px;

    border-radius:50%;

    border:
        1px solid
        rgba(225,191,105,.55);

    background:
        rgba(225,191,105,.07);

    color:#e1bf69;

    cursor:pointer;

    font-size:19px;

    transition:.25s;
}


.voice-button:hover{

    transform:scale(1.06);

    box-shadow:
        0 0 18px
        rgba(225,191,105,.25);
}


.voice-button.active{

    color:#fff;

    border-color:#b879e8;

    background:
        rgba(184,121,232,.15);

    box-shadow:
        0 0 20px
        rgba(184,121,232,.35);
}


/* ==================================================
   MAIN
================================================== */

main{

    width:100%;

    min-height:100vh;

    padding:
        125px 40px 60px;
}


/* ==================================================
   HEADER
================================================== */

.hero{

    text-align:center;

    margin-bottom:55px;
}


.hero-eye{

    width:115px;

    height:68px;

    margin:
        0 auto 20px;

    border:
        4px solid
        #b879e8;

    border-radius:
        75% 12%;

    transform:
        rotate(-7deg);

    position:relative;

    box-shadow:

        0 0 22px
        rgba(184,121,232,.9),

        0 0 55px
        rgba(139,67,192,.35);
}


.hero-eye::before{

    content:"";

    position:absolute;

    width:38px;

    height:38px;

    border-radius:50%;

    left:34px;

    top:12px;

    background:

        radial-gradient(
            circle,
            #fff 0%,
            #e0b8ff 20%,
            #a84be3 55%,
            #21082d 100%
        );

    box-shadow:

        0 0 20px
        #c27bf4,

        0 0 45px
        rgba(184,121,232,.7);
}


.hero-eye::after{

    content:"";

    position:absolute;

    width:10px;

    height:10px;

    border-radius:50%;

    background:#030303;

    left:48px;

    top:26px;
}


/* ==================================================
   BRAND
================================================== */

.hero-brand{

    display:inline-block;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:
        clamp(65px,9vw,115px);

    font-weight:bold;

    font-style:italic;

    letter-spacing:5px;

    color:#e1bf69;

    transform:
        skewX(-7deg)
        rotate(-2deg);

    text-shadow:
        0 0 12px
        rgba(225,191,105,.25);

    position:relative;
}


/* الخط الذهبي */

.hero-brand::after{

    content:"";

    position:absolute;

    right:4%;

    left:4%;

    bottom:-12px;

    height:3px;

    border-radius:10px;

    background:#e1bf69;

    box-shadow:
        0 0 10px
        rgba(225,191,105,.35);
}


.hero-message{

    margin-top:30px;

    color:#bcaec4;

    font-size:18px;
}


/* ==================================================
   CARDS GRID
================================================== */

.cards{

    width:min(
        1250px,
        100%
    );

    margin:auto;

    display:grid;

    grid-template-columns:
        repeat(3,1fr);

    gap:22px;
}


/* ==================================================
   CARD
================================================== */

.card{

    min-height:190px;

    position:relative;

    overflow:hidden;

    border-radius:24px;

    border:
        1px solid
        rgba(184,121,232,.22);

    background:

        linear-gradient(
            145deg,
            rgba(184,121,232,.09),
            rgba(255,255,255,.015)
        );

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    text-align:center;

    padding:25px;

    cursor:pointer;

    transition:

        transform .25s ease,

        border-color .25s ease,

        box-shadow .25s ease,

        background .25s ease;
}


.card::before{

    content:"";

    position:absolute;

    width:170px;

    height:170px;

    border-radius:50%;

    background:
        rgba(184,121,232,.08);

    filter:blur(25px);

    top:-80px;

    left:-70px;

    transition:.3s;
}


.card:hover{

    transform:
        translateY(-7px);

    border-color:
        rgba(225,191,105,.65);

    background:

        linear-gradient(
            145deg,
            rgba(184,121,232,.15),
            rgba(225,191,105,.035)
        );

    box-shadow:

        0 15px 40px
        rgba(0,0,0,.45),

        0 0 25px
        rgba(184,121,232,.12);
}


.card:hover::before{

    transform:
        scale(1.5);
}


/* ==================================================
   CARD ICON
================================================== */

.card-icon{

    width:65px;

    height:65px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:20px;

    margin-bottom:18px;

    color:#d3a6f0;

    border:
        1px solid
        rgba(184,121,232,.35);

    background:
        rgba(184,121,232,.08);

    font-size:27px;

    transition:.25s;
}


.card:hover .card-icon{

    color:#e1bf69;

    border-color:
        rgba(225,191,105,.55);

    box-shadow:
        0 0 20px
        rgba(225,191,105,.12);
}


/* ==================================================
   CARD TITLE
================================================== */

.card-title{

    position:relative;

    z-index:2;

    color:#f1eaf4;

    font-size:23px;

    font-weight:bold;

    line-height:1.5;
}


.card-subtitle{

    position:relative;

    z-index:2;

    color:#988c9f;

    font-size:13px;

    margin-top:7px;

    line-height:1.5;
}


/* ==================================================
   CARD NUMBER
================================================== */

.card-number{

    position:absolute;

    top:15px;

    right:18px;

    color:
        rgba(225,191,105,.38);

    font-size:13px;

    font-weight:bold;
}


/* ==================================================
   SPIRITUAL CARD
================================================== */

.spiritual{

    border-color:
        rgba(225,191,105,.28);
}


/* ==================================================
   STATUS
================================================== */

.voice-status{

    position:fixed;

    bottom:22px;

    left:50%;

    transform:
        translateX(-50%);

    z-index:2000;

    padding:
        9px 18px;

    border-radius:25px;

    background:
        rgba(8,7,10,.9);

    border:
        1px solid
        rgba(184,121,232,.2);

    color:#bbaec3;

    font-size:13px;

    opacity:.9;
}


.status-dot{

    display:inline-block;

    width:7px;

    height:7px;

    border-radius:50%;

    margin-left:7px;

    background:#777;

}


body.listening .status-dot{

    background:#b879e8;

    box-shadow:
        0 0 12px
        #b879e8;

    animation:
        listeningPulse .6s infinite alternate;
}


@keyframes listeningPulse{

    from{
        transform:scale(1);
    }

    to{
        transform:scale(1.7);
    }
}


/* ==================================================
   RESPONSIVE
================================================== */

@media(max-width:950px){

    .cards{

        grid-template-columns:
            repeat(2,1fr);
    }

}


@media(max-width:650px){

    .navbar{

        height:75px;

        padding:
            0 15px;
    }


    .nav-links{

        display:none;
    }


    .nav-brand{

        font-size:24px;
    }


    main{

        padding:
            105px 15px 70px;
    }


    .cards{

        grid-template-columns:1fr;

        gap:16px;
    }


    .card{

        min-height:160px;
    }


    .card-title{

        font-size:22px;
    }


    .hero{

        margin-bottom:40px;
    }

}

</style>

</head>


<body>


<!-- ==================================================
     NAVBAR
================================================== -->

<nav class="navbar">


    <div
        class="nav-logo"
        data-speak="مبصر"
        onclick="speakText('مبصر')"
    >

        <div class="nav-eye"></div>

        <div class="nav-brand">
            MOBSAR
        </div>

    </div>


    <div class="nav-links">


        <button
            class="nav-link"
            data-speak="الرئيسية"
            onclick="goPage('home.php','سوف أبقى في الصفحة الرئيسية')"
        >
            الرئيسية
        </button>


        <button
            class="nav-link"
            data-speak="التسجيل"
            onclick="goPage('register.php','سوف أنتقل إلى صفحة التسجيل الآن')"
        >
            التسجيل
        </button>


    </div>


    <button
        id="voiceButton"
        class="voice-button"
        aria-label="تشغيل المساعد الصوتي"
        onclick="toggleVoice()"
    >
        🎙
    </button>


</nav>



<!-- ==================================================
     MAIN
================================================== -->

<main>


    <!-- ==================================================
         HERO
    ================================================== -->

    <section class="hero">


        <div
            class="hero-eye"
            data-speak="مبصر"
        ></div>


        <div
            class="hero-brand"
            data-speak="مبصر"
        >
            MOBSAR
        </div>


        <div
            class="hero-message"
            data-speak="أخبرني كيف أساعدك"
        >
            أخبرني كيف أساعدك
        </div>


    </section>



    <!-- ==================================================
         CARDS
    ================================================== -->

    <section class="cards">


        <!-- 1 المهام -->

        <div
            class="card"
            data-command="المهام"
            data-speak="المهام"
            onclick="openCard('tasks.php','سوف أنتقل إلى المهام الآن')"
        >

            <span class="card-number">
                01
            </span>

            <div class="card-icon">
                ✓
            </div>

            <div class="card-title">
                المهام
            </div>

            <div class="card-subtitle">
                إدارة ومتابعة المهام
            </div>

        </div>



        <!-- 2 التقييم والإنجازات -->

        <div
            class="card"
            data-command="التقييم والإنجازات"
            data-speak="التقييم والإنجازات"
            onclick="openCard('evaluation.php','سوف أنتقل إلى التقييم والإنجازات الآن')"
        >

            <span class="card-number">
                02
            </span>

            <div class="card-icon">
                ★
            </div>

            <div class="card-title">
                التقييم والإنجازات
            </div>

            <div class="card-subtitle">
                متابعة التقييم والإنجاز
            </div>

        </div>



        <!-- 3 التقييم والمواعيد والأخبار -->

        <div
            class="card"
            data-command="التقويم والمواعيد والأخبار"
            data-speak="التقويم والمواعيد والأخبار"
            onclick="openCard('schedule.php','سوف أنتقل إلى التقويم والمواعيد والأخبار الآن')"
        >

            <span class="card-number">
                03
            </span>

            <div class="card-icon">
                🗓
            </div>

            <div class="card-title">
                التقويم والمواعيد والأخبار
            </div>

            <div class="card-subtitle">
                مواعيد + منبه + أخبار
            </div>

        </div>



        <!-- 4 التواصل -->

        <div
            class="card"
            data-command="التواصل"
            data-speak="التواصل"
            onclick="openCard('communication.php','سوف أنتقل إلى التواصل الآن')"
        >

            <span class="card-number">
                04
            </span>

            <div class="card-icon">
                💬
            </div>

            <div class="card-title">
                التواصل
            </div>

            <div class="card-subtitle">
                بين المدير والموظف
            </div>

        </div>



        <!-- 5 الإشعارات -->

        <div
            class="card"
            data-command="ادارة الملفات"
            data-speak="ادارة الملفات"
            onclick="openCard('notifications.php','سوف أنتقل إلى ادارة الملفات الآن')"
        >

            <span class="card-number">
                05
            </span>

            <div class="card-icon">
                🔔
            </div>

            <div class="card-title">
                ادارة الملفات
            </div>

            <div class="card-subtitle">
                ادارة الملفات  الشغل 
            </div>

        </div>



        <!-- 6 المساعد البصري -->

        <div
            class="card"
            data-command="المساعد البصري"
            data-speak="المساعد البصري"
            onclick="openCard('visual-assistant.php','سوف أنتقل إلى المساعد البصري الآن')"
        >

            <span class="card-number">
                06
            </span>

            <div class="card-icon">
                👁
            </div>

            <div class="card-title">
                المساعد البصري
            </div>

            <div class="card-subtitle">
                المساعدة والتعرف البصري
            </div>

        </div>



<?php if($spiritualEnabled): ?>

        <!-- 7 الروحانيات -->

        <div
            class="card spiritual"
            data-command="الروحانيات"
            data-speak="الروحانيات"
            onclick="openCard('spiritual.php','سوف أنتقل إلى صفحة الروحانيات الآن')"
        >

            <span class="card-number">
                07
            </span>

            <div class="card-icon">
                ✦
            </div>

            <div class="card-title">
                الروحانيات
            </div>

            <div class="card-subtitle">
                الصفحة الروحانية
            </div>

        </div>

<?php endif; ?>



        <!-- 8 الموظفون والمدير -->

        <div
            class="card"
            data-command="الموظفون والمدير"
            data-speak="الموظفون والمدير"
            onclick="openCard('employees.php','سوف أنتقل إلى الموظفين والمدير الآن')"
        >

            <span class="card-number">
                08
            </span>

            <div class="card-icon">
                👥
            </div>

            <div class="card-title">
                الموظفون والمدير
            </div>

            <div class="card-subtitle">
                إدارة بيانات الموظفين والمدير
            </div>

        </div>



        <!-- 9 إدارة الفريق -->

        <div
            class="card"
            data-command="تاروحنيات"
            data-speak="الروحنيات"
            onclick="openCard('team.php','سوف أنتقل إلى  الروحنيات الآن')"
        >

            <span class="card-number">
                09
            </span>

            <div class="card-icon">
                ◈
            </div>

            <div class="card-title">
                 الروحنيات
            </div>

            <div class="card-subtitle">
                القران  والاذكار
            </div>

        </div>



        <!-- 10 الإعدادات -->

        <div
            class="card"
            data-command="الإعدادات"
            data-speak="الإعدادات"
            onclick="openCard('settings.php','سوف أنتقل إلى الإعدادات الآن')"
        >

            <span class="card-number">
                10
            </span>

            <div class="card-icon">
                ⚙
            </div>

            <div class="card-title">
                الإعدادات
            </div>

            <div class="card-subtitle">
                إعدادات مبصر
            </div>

        </div>


    </section>

</main>



<!-- ==================================================
     حالة الصوت
================================================== -->

<div
    class="voice-status"
    id="voiceStatus"
>

    <span class="status-dot"></span>

    اضغط 🎙 لتفعيل المساعد الصوتي

</div>
<script>

/* ==================================================
   MOBSAR VOICE ONLY
   لا يتم تغيير أي شيء في التصميم
================================================== */

let recognition = null;
let listening = false;
let speaking = false;
let voiceEnabled = false;
let firstInteraction = false;
let hoverTimer = null;
let lastHoverText = "";
let lastHoverTime = 0;


/* ==================================================
   اختيار صوت عربي
================================================== */

function getArabicVoice(){

    const voices = speechSynthesis.getVoices();

    return voices.find(
        voice =>
            voice.lang &&
            voice.lang.toLowerCase().startsWith("ar")
    ) || null;
}


/* ==================================================
   الكلام
================================================== */

function speakText(text, callback = null){

    if(!window.speechSynthesis){
        if(callback) callback();
        return;
    }

    speechSynthesis.cancel();

    const utterance =
        new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-EG";

    const arabicVoice = getArabicVoice();

    if(arabicVoice){
        utterance.voice = arabicVoice;
    }

    /* سرعة الصوت */
    utterance.rate = 1.12;

    utterance.pitch = 1;

    utterance.volume = 1;

    speaking = true;

    utterance.onend = function(){

        speaking = false;

        if(callback){
            setTimeout(callback, 80);
        }

    };

    speechSynthesis.speak(utterance);
}


/* ==================================================
   التعرف على الصوت
================================================== */

function setupRecognition(){

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if(!SpeechRecognition){

        setStatus(
            "التعرف الصوتي غير متاح في هذا المتصفح"
        );

        return false;
    }

    recognition =
        new SpeechRecognition();

    recognition.lang = "ar-EG";

    recognition.continuous = false;

    recognition.interimResults = false;

    recognition.maxAlternatives = 3;


    recognition.onstart = function(){

        listening = true;

        document.body.classList.add(
            "listening"
        );

        setStatus(
            "أستمع إليك..."
        );
    };


    recognition.onresult = function(event){

        listening = false;

        document.body.classList.remove(
            "listening"
        );

        const text =
            event.results[0][0]
            .transcript
            .trim();

        handleCommand(text);
    };


    recognition.onerror = function(event){

        listening = false;

        document.body.classList.remove(
            "listening"
        );

        if(event.error === "no-speech"){

            speakText(
                "لم أسمعك، أخبرني مرة أخرى.",
                listen
            );

            return;
        }

        if(event.error === "not-allowed"){

            setStatus(
                "اسمحي للمتصفح باستخدام الميكروفون"
            );

            return;
        }

        setStatus(
            "أخبرني كيف أساعدك"
        );
    };


    recognition.onend = function(){

        listening = false;

        document.body.classList.remove(
            "listening"
        );
    };

    return true;
}


/* ==================================================
   الحالة
================================================== */

function setStatus(text){

    const status =
        document.getElementById(
            "voiceStatus"
        );

    if(status){

        status.innerHTML =
            '<span class="status-dot"></span>' +
            text;
    }
}


/* ==================================================
   الاستماع
================================================== */

function listen(){

    if(!voiceEnabled) return;

    if(!recognition) return;

    if(listening) return;

    if(speaking) return;

    try{

        recognition.start();

    }catch(error){

        console.log(error);

    }
}


/* ==================================================
   تشغيل المساعد
================================================== */

function startAssistant(){

    if(!recognition){

        if(!setupRecognition())
            return;
    }

    voiceEnabled = true;

    const button =
        document.getElementById(
            "voiceButton"
        );

    if(button){

        button.classList.add(
            "active"
        );
    }

    speakText(
        "مرحبًا بك في الصفحة الرئيسية لمبصر، أخبرني كيف أساعدك.",
        function(){

            listen();

        }
    );
}


/* ==================================================
   زر الصوت
================================================== */

function toggleVoice(){

    startAssistant();

}


/* ==================================================
   أول ضغطة فقط
================================================== */

document.addEventListener(
    "click",
    function(event){

        /*
          لا نكرر رسالة الترحيب
          لو المستخدم ضغط على كارت
          أو زر معين.
        */

        if(firstInteraction)
            return;

        firstInteraction = true;

        startAssistant();

    }
);


/* ==================================================
   فتح الصفحة عند الضغط فقط
================================================== */

function openCard(page, message){

    speakText(
        message,
        function(){

            window.location.href = page;

        }
    );
}


function goPage(page, message){

    openCard(
        page,
        message
    );
}


/* ==================================================
   تنظيف الكلام
================================================== */

function cleanText(text){

    return text
        .toLowerCase()
        .replace(/[؟?!،.]/g, "")
        .trim();
}


/* ==================================================
   الأوامر الصوتية
================================================== */

function handleCommand(command){

    const text =
        cleanText(command);


    /* المهام */

    if(
        text.includes("المهام") ||
        text === "مهام" ||
        text === "مهمة"
    ){

        openCard(
            "tasks.php",
            "سوف أنتقل إلى المهام الآن"
        );

        return;
    }


    /* التقييم والإنجازات */

    if(
        text.includes("التقييم والإنجازات") ||
        text.includes("التقييم والانجازات") ||
        (
            text.includes("التقييم") &&
            text.includes("إنجاز")
        )
    ){

        openCard(
            "evaluation.php",
            "سوف أنتقل إلى التقييم والإنجازات الآن"
        );

        return;
    }


    /* المواعيد والأخبار */

    if(
        text.includes("المواعيد") ||
        text.includes("موعد") ||
        text.includes("الأخبار") ||
        text.includes("الاخبار") ||
        text.includes("المنبه")
    ){

        openCard(
            "schedule.php",
            "سوف أنتقل إلى التقييم والمواعيد والأخبار الآن"
        );

        return;
    }


    /* التواصل */

    if(
        text.includes("التواصل") ||
        text.includes("تواصل")
    ){

        openCard(
            "communication.php",
            "سوف أنتقل إلى التواصل الآن"
        );

        return;
    }


    /* الإشعارات */

    if(
        text.includes("الإشعارات") ||
        text.includes("الاشعارات") ||
        text.includes("إشعارات")
    ){

        openCard(
            "notifications.php",
            "سوف أنتقل إلى الإشعارات الآن"
        );

        return;
    }


    /* المساعد البصري */

    if(
        text.includes("المساعد البصري") ||
        text.includes("المساعد البصرى") ||
        text.includes("بصري")
    ){

        openCard(
            "visual-assistant.php",
            "سوف أنتقل إلى المساعد البصري الآن"
        );

        return;
    }


    /* الروحانيات */

    if(
        text.includes("الروحانيات") ||
        text.includes("روحانيات")
    ){

        <?php if($spiritualEnabled): ?>

        openCard(
            "spiritual.php",
            "سوف أنتقل إلى صفحة الروحانيات الآن"
        );

        <?php else: ?>

        speakText(
            "صفحة الروحانيات غير مفعلة في حسابك.",
            listen
        );

        <?php endif; ?>

        return;
    }


    /* الموظفون والمدير */

    if(
        text.includes("الموظفون") ||
        text.includes("الموظفين") ||
        text.includes("المدير والموظف")
    ){

        openCard(
            "employees.php",
            "سوف أنتقل إلى الموظفين والمدير الآن"
        );

        return;
    }


    /* إدارة الفريق */

    if(
        text.includes("إدارة الفريق") ||
        text.includes("ادارة الفريق") ||
        text === "الفريق"
    ){

        openCard(
            "team.php",
            "سوف أنتقل إلى إدارة الفريق الآن"
        );

        return;
    }


    /* الإعدادات */

    if(
        text.includes("الإعدادات") ||
        text.includes("الاعدادات") ||
        text.includes("إعدادات")
    ){

        openCard(
            "settings.php",
            "سوف أنتقل إلى الإعدادات الآن"
        );

        return;
    }


    /* الرئيسية */

    if(
        text.includes("الصفحة الرئيسية") ||
        text === "الرئيسية"
    ){

        speakText(
            "أنت بالفعل في الصفحة الرئيسية.",
            listen
        );

        return;
    }


    /* لم يفهم */

    speakText(
        "لم أفهم طلبك، أخبرني باسم الصفحة التي تريدها.",
        listen
    );
}


/* ==================================================
   الماوس على الكارت
   يقرأ اسم الكارت فقط
   ولا يفتح الصفحة
================================================== */

document
.querySelectorAll(
    ".card[data-speak]"
)
.forEach(function(card){

    card.addEventListener(
        "mouseenter",
        function(){

            const text =
                this.getAttribute(
                    "data-speak"
                );

            if(!text)
                return;

            const now = Date.now();

            if(
                lastHoverText === text &&
                now - lastHoverTime < 1000
            ){

                return;
            }

            lastHoverText = text;

            lastHoverTime = now;

            clearTimeout(
                hoverTimer
            );

            hoverTimer =
                setTimeout(
                    function(){

                        /*
                           مهم:
                           هنا يقرأ الاسم فقط
                           ولا يقول هل تريد الدخول
                        */

                        speakText(text);

                    },
                    150
                );
        }
    );


    card.addEventListener(
        "mouseleave",
        function(){

            clearTimeout(
                hoverTimer
            );

        }
    );

});


/* ==================================================
   الماوس على أزرار الـ Navbar
================================================== */

document
.querySelectorAll(
    ".nav-link[data-speak]"
)
.forEach(function(item){

    item.addEventListener(
        "mouseenter",
        function(){

            const text =
                this.getAttribute(
                    "data-speak"
                );

            if(!text)
                return;

            clearTimeout(
                hoverTimer
            );

            hoverTimer =
                setTimeout(
                    function(){

                        speakText(text);

                    },
                    150
                );
        }
    );


    item.addEventListener(
        "mouseleave",
        function(){

            clearTimeout(
                hoverTimer
            );

        }
    );

});


/* ==================================================
   تحميل الأصوات العربية
================================================== */

if(window.speechSynthesis){

    speechSynthesis.onvoiceschanged =
        function(){

            speechSynthesis.getVoices();

        };
}

</script>


<script src="js/voice.js"></script>








</body>
</html>


