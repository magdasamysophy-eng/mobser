<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>MOBSAR - مبصر</title>

<style>

/* =========================
   الأساس
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    overflow:hidden;

    background:
        radial-gradient(
            circle at center,
            #32164d 0%,
            #11091a 52%,
            #020204 100%
        );

    color:white;
    font-family:Arial,Tahoma,sans-serif;
}


/* =========================
   الـ NAVBAR
========================= */

.navbar{

    position:fixed;

    top:0;
    right:0;
    left:0;

    height:75px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:18px;

    z-index:100;

    background:rgba(8,5,12,.88);

    border-bottom:1px solid
        rgba(220,185,90,.25);

    backdrop-filter:blur(8px);
}


/* أزرار الـ Navbar */

.nav-btn{

    min-width:150px;

    padding:13px 25px;

    border:1px solid
        rgba(224,188,92,.5);

    border-radius:30px;

    background:
        rgba(224,188,92,.07);

    color:#e5c878;

    font-size:17px;

    cursor:pointer;

    transition:.25s;

    box-shadow:
        0 0 12px
        rgba(224,188,92,.06);
}


.nav-btn:hover{

    background:
        rgba(224,188,92,.16);

    transform:
        translateY(-2px);

    box-shadow:
        0 0 20px
        rgba(224,188,92,.18);
}


.nav-btn:active{

    transform:scale(.96);

}


/* =========================
   الشاشة
========================= */

.screen{

    width:100%;
    height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    position:relative;

    padding-top:75px;
}


/* =========================
   الحلقات
========================= */

.rings{

    width:500px;
    height:500px;

    position:absolute;

    display:flex;

    align-items:center;
    justify-content:center;
}


.ring{

    position:absolute;

    border-radius:50%;

    border:1px solid
        rgba(220,180,75,.32);

    box-shadow:
        0 0 18px
        rgba(220,180,75,.06);

    animation:
        pulse 6s ease-in-out infinite;
}


.r1{
    width:500px;
    height:500px;
}

.r2{
    width:405px;
    height:405px;
    animation-delay:.3s;
}

.r3{
    width:315px;
    height:315px;
    animation-delay:.6s;
}

.r4{
    width:235px;
    height:235px;
    animation-delay:.9s;
}


@keyframes pulse{

    0%,100%{
        transform:scale(1);
        opacity:.5;
    }

    50%{
        transform:scale(1.018);
        opacity:.85;
    }

}


/* =========================
   المحتوى
========================= */

.center{

    position:relative;

    z-index:10;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;
}


/* =========================
   العين
========================= */

.eye{

    width:90px;
    height:52px;

    border:3px solid #d9b85e;

    border-radius:75% 12%;

    transform:rotate(-7deg);

    position:relative;

    margin-bottom:18px;

    opacity:.9;

}


.eye::before{

    content:"";

    position:absolute;

    width:27px;
    height:27px;

    border-radius:50%;

    left:28px;
    top:9px;

    background:
        radial-gradient(
            circle,
            #fff 0%,
            #d9b85e 25%,
            #8652ad 65%,
            #160a21 100%
        );

    box-shadow:
        0 0 10px
        rgba(220,185,95,.35);
}


.eye::after{

    content:"";

    position:absolute;

    width:8px;
    height:8px;

    background:#08040b;

    border-radius:50%;

    left:38px;
    top:18px;
}


/* =========================
   MOBSAR
========================= */

.brand{

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:
        clamp(58px,9vw,100px);

    font-weight:600;

    font-style:italic;

    letter-spacing:5px;

    color:#e5c878;

    transform:
        skewX(-7deg)
        rotate(-2deg);

    line-height:1;

    text-shadow:
        0 0 8px
        rgba(229,200,120,.18);

    user-select:none;
}


/* =========================
   حالة الصوت
========================= */

.status{

    position:fixed;

    bottom:25px;

    left:50%;

    transform:translateX(-50%);

    color:#aa98b7;

    font-size:13px;

    white-space:nowrap;

    z-index:50;
}


.dot{

    display:inline-block;

    width:7px;
    height:7px;

    border-radius:50%;

    margin-left:7px;

    background:#d9b85e;

    box-shadow:
        0 0 8px #d9b85e;
}


/* أثناء الاستماع */

body.listening .dot{

    animation:
        listenPulse .6s infinite alternate;
}


@keyframes listenPulse{

    from{
        transform:scale(1);
    }

    to{
        transform:scale(1.7);
    }

}


/* =========================
   الموبايل
========================= */

@media(max-width:600px){

    .navbar{

        height:68px;

        gap:8px;
    }

    .nav-btn{

        min-width:125px;

        padding:10px 12px;

        font-size:15px;
    }

    .screen{
        padding-top:68px;
    }

    .rings{

        width:350px;
        height:350px;
    }

    .r1{
        width:350px;
        height:350px;
    }

    .r2{
        width:285px;
        height:285px;
    }

    .r3{
        width:220px;
        height:220px;
    }

    .r4{
        width:165px;
        height:165px;
    }

    .brand{
        font-size:58px;
        letter-spacing:3px;
    }

    .eye{
        width:68px;
        height:40px;
    }

    .eye::before{
        width:21px;
        height:21px;

        left:21px;
        top:7px;
    }

    .eye::after{
        width:6px;
        height:6px;

        left:29px;
        top:14px;
    }

}

</style>
</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">


    <button
        class="nav-btn"
        data-speak="التسجيل"
        onclick="goRegister()"
    >
        التسجيل
    </button>


    <button
        class="nav-btn"
        data-speak="الصفحة الاقسام
        onclick="goHome()"
    >
        الاقسام
    </button>


</nav>



<!-- =========================
     الصفحة
========================= -->

<div class="screen">


    <div class="rings">

        <div class="ring r1"></div>
        <div class="ring r2"></div>
        <div class="ring r3"></div>
        <div class="ring r4"></div>

    </div>


    <div class="center">


        <!-- العين -->

        <div
            class="eye"
            data-speak="مبصر"
        ></div>


        <!-- اللوجو -->

        <div
            class="brand"
            data-speak="مبصر"
        >
            MOBSAR
        </div>


    </div>


</div>


<!-- حالة الصوت -->

<div
    class="status"
    id="status"
>
    <span class="dot"></span>
    اضغطي أي مكان للتحدث
</div>



<script>

/* =================================================
   التنقل المباشر
================================================= */

function goRegister(){

    speak(
        "سوف أنتقل إلى صفحة التسجيل الآن.",
        function(){

            window.location.href =
                "register.php";

        }
    );

}


function goHome(){

    speak(
        "سوف أنتقل إلى الصفحة الاقسام",
        function(){

            window.location.href =
                "home.php";

        }
    );

}


/* =================================================
   الكلام
================================================= */

let speaking = false;


function speak(text, callback=null){

    if(!window.speechSynthesis){

        if(callback)
            callback();

        return;
    }


    speechSynthesis.cancel();


    const voice =
        new SpeechSynthesisUtterance(text);


    voice.lang="ar-EG";

    voice.rate=1.1;

    voice.pitch=1;

    voice.volume=1;


    speaking=true;


    setStatus(
        "مبصر يتحدث..."
    );


    voice.onend=function(){

        speaking=false;


        if(callback){

            setTimeout(
                callback,
                80
            );

        }
        else{

            setStatus(
                "اضغطي أي مكان للتحدث"
            );

        }

    };


    speechSynthesis.speak(voice);

}


/* =================================================
   حالة الصفحة
================================================= */

function setStatus(text){

    document.getElementById(
        "status"
    ).innerHTML=

        '<span class="dot"></span>'+
        text;

}


/* =================================================
   التعرف على الصوت
================================================= */

let recognition=null;

let listening=false;

let voiceStarted=false;


/* إنشاء التعرف */

function setupVoice(){

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if(!SpeechRecognition){

        setStatus(
            "استخدمي Chrome للتعرف على الصوت"
        );

        return false;
    }


    recognition =
        new SpeechRecognition();


    recognition.lang="ar-EG";


    recognition.continuous=false;


    recognition.interimResults=false;


    recognition.maxAlternatives=3;


    recognition.onstart=function(){

        listening=true;

        document.body.classList.add(
            "listening"
        );

        setStatus(
            "أستمع إليك..."
        );

    };


    recognition.onresult=function(event){

        listening=false;

        document.body.classList.remove(
            "listening"
        );


        const text =
            event.results[0][0]
            .transcript
            .trim()
            .toLowerCase();


        console.log(
            "MOBSAR:",
            text
        );


        handleVoiceCommand(
            text
        );

    };


    recognition.onerror=function(event){

        listening=false;

        document.body.classList.remove(
            "listening"
        );


        console.log(
            "Voice error:",
            event.error
        );


        if(
            event.error==="no-speech"
        ){

            speak(
                "عذرًا، لم أسمعك. اضغطي مرة أخرى وتحدثي.",
                null
            );

            return;
        }


        if(
            event.error==="not-allowed"
        ){

            setStatus(
                "اسمحي للمتصفح باستخدام الميكروفون"
            );

            return;
        }


        setStatus(
            "اضغطي أي مكان للتحدث"
        );

    };


    recognition.onend=function(){

        listening=false;

        document.body.classList.remove(
            "listening"
        );

    };


    return true;

}


/* =================================================
   الاستماع
================================================= */

function listen(){

    if(!recognition)
        return;


    if(listening)
        return;


    if(speaking)
        return;


    try{

        recognition.start();

    }
    catch(error){

        console.log(error);

    }

}


/* =================================================
   أوامر الصوت
================================================= */

function handleVoiceCommand(command){

    command =
        command
        .replace(/[؟?!،.]/g,"")
        .trim();


    /* التسجيل */

    if(
        command.includes("تسجيل") ||
        command.includes("التسجيل") ||
        command.includes("سجلني") ||
        command.includes("صفحة التسجيل")
    ){

        goRegister();

        return;
    }


    /* الرئيسية / Home */

    if(
        command.includes("وديني الصفحة الرئيسية") ||
        command.includes("وديني للصفحة الرئيسية") ||
        command.includes("اذهب للصفحة الرئيسية") ||
        command.includes("روح للصفحة الرئيسية") ||
        command.includes("افتح الصفحة الرئيسية") ||
        command.includes("الصفحة الرئيسية") ||
        command.includes("رئيسية") ||
        command.includes("هوم") ||
        command.includes("home")
    ){

        goHome();

        return;
    }


    /* أمر غير مفهوم */

    speak(
        "عذرًا، لم أفهمك. يمكنك قول: وديني الصفحة الرئيسية، أو صفحة التسجيل."
    );

}


/* =================================================
   الترحيب عند فتح الصفحة
================================================= */

let welcomePlayed=false;


function playWelcome(){

    if(welcomePlayed)
        return;


    welcomePlayed=true;


    if(!window.speechSynthesis){

        setStatus(
            "استخدمي Chrome للتعرف على الصوت"
        );

        return;
    }


    speak(
        "مرحبًا بك في MABSAR، أخبرني كيف أساعدك"
    );

}


/* =================================================
   أول ضغطة في أي مكان
================================================= */

document.addEventListener(
    "click",
    function(event){

        /*
           أزرار الـ Navbar لها أوامرها الخاصة.
        */

        if(
            event.target.closest(".nav-btn")
        ){

            return;
        }


        /*
           أول ضغطة عشوائية تشغل الترحيب
           ثم تجهز الميكروفون.
        */

        if(!voiceStarted){

            voiceStarted=true;


            if(
                setupVoice()
            ){

                speak(
                    "مرحبًا بك في MABSAR، أخبرني كيف أساعدك",
                    function(){

                        listen();

                    }
                );

            }

        }
        else{

            listen();

        }

    }
);


/* =================================================
   تشغيل الترحيب عند فتح الصفحة
================================================= */

window.addEventListener(
    "load",
    function(){

        setTimeout(
            function(){

                /*
                   المتصفح قد يمنع الصوت التلقائي.
                   لذلك نحاول تشغيله فورًا،
                   وأول ضغطة في أي مكان تعتبر بديلًا.
                */

                if(
                    !welcomePlayed
                ){

                    playWelcome();

                }

            },
            300
        );

    }
);


/* =================================================
   قراءة الأزرار واللوجو بالماوس
================================================= */

let lastHover="";


document.querySelectorAll(
    "[data-speak]"
).forEach(
    function(element){

        element.addEventListener(
            "mouseenter",
            function(){

                const text =
                    this.getAttribute(
                        "data-speak"
                    );


                if(!text)
                    return;


                if(text===lastHover)
                    return;


                lastHover=text;


                if(!speaking){

                    speak(text);

                }


                setTimeout(
                    function(){

                        lastHover="";

                    },
                    1000
                );

            }
        );


        /*
           دعم اللمس في الموبايل
        */

        element.addEventListener(
            "touchstart",
            function(){

                const text =
                    this.getAttribute(
                        "data-speak"
                    );


                if(
                    text &&
                    !speaking
                ){

                    speak(text);

                }

            },
            {
                passive:true
            }
        );

    }
);

</script>
<script src="js/voice.js"></script>


</body>
</html>