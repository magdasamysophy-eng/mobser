<?php
// camera.php
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MOBSAR | الكاميرا</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Cinzel:wght@600;700;800&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
           TOP NAVIGATION
        ========================= */

        .top-nav-bar {
            width: 90%;
            max-width: 1100px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 25px 0 0 0;
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

        /* =========================
           HERO
        ========================= */

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

            border: 1px solid rgba(212, 175, 55, 0.4);

            animation: magicGlow 3s infinite alternate;
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

        /* =========================
           MAIN CAMERA AREA
        ========================= */

        .camera-container {

            width: 90%;
            max-width: 1100px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 25px;

            margin-top: 25px;
        }

        /* =========================
           CARD
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
                1px solid rgba(212, 175, 55, 0.35);

            border-radius: 22px;

            padding: 25px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.95),
                0 0 30px rgba(138, 43, 226, 0.15),
                inset 0 0 25px rgba(212, 175, 55, 0.08);

            transition: 0.3s;
        }

        .card-box:hover {

            border-color:
                rgba(212, 175, 55, 0.7);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.98),
                0 0 40px rgba(212, 175, 55, 0.25);
        }

        .card-box h3 {

            color: #fff;

            font-size: 1.35rem;

            margin-bottom: 20px;

            text-align: right;

            border-bottom:
                1px solid rgba(212, 175, 55, 0.2);

            padding-bottom: 10px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        /* =========================
           CAMERA PREVIEW
        ========================= */

        .camera-preview {

            width: 100%;

            height: 280px;

            background:
                radial-gradient(
                    circle,
                    #150529,
                    #030107
                );

            border:
                1px solid rgba(212, 175, 55, 0.3);

            border-radius: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            position: relative;
        }

        #cameraVideo {

            width: 100%;
            height: 100%;

            object-fit: cover;

            display: none;

            border-radius: 18px;
        }

        .camera-placeholder {

            text-align: center;

            color: #d8b4fe;
        }

        .camera-placeholder i {

            font-size: 4rem;

            color: #d4af37;

            margin-bottom: 12px;

            filter:
                drop-shadow(
                    0 0 15px rgba(212, 175, 55, 0.5)
                );
        }

        .camera-placeholder p {

            font-size: 1rem;

            color: #d8b4fe;
        }

        /* =========================
           BUTTONS
        ========================= */

        .camera-buttons {

            display: flex;

            flex-direction: column;

            gap: 14px;

            margin-top: 20px;
        }

        .camera-btn {

            width: 100%;

            padding: 16px;

            border-radius: 14px;

            border: 1px solid #d4af37;

            background:
                linear-gradient(
                    135deg,
                    #12051f,
                    #030107
                );

            color: #d4af37;

            font-size: 1.15rem;

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;

            box-shadow:
                0 0 18px rgba(212, 175, 55, 0.12);
        }

        .camera-btn:hover {

            background: #d4af37;

            color: #000;

            transform: translateY(-2px);

            box-shadow:
                0 0 25px rgba(212, 175, 55, 0.6);
        }

        .camera-btn i {

            margin-left: 8px;
        }

        /* =========================
           CAPTURED IMAGE
        ========================= */

        .captured-image-area {

            display: none;

            margin-top: 18px;

            text-align: center;
        }

        .captured-image-area h4 {

            color: #d4af37;

            margin-bottom: 12px;
        }

        #capturedImage {

            width: 100%;

            max-height: 280px;

            object-fit: contain;

            border-radius: 15px;

            border:
                1px solid rgba(212, 175, 55, 0.4);

            background: #000;
        }

        /* =========================
           TEXT READER
        ========================= */

        .text-reader-box {

            grid-column: span 2;
        }

        .text-reader-description {

            color: #d8b4fe;

            font-size: 1rem;

            margin-bottom: 15px;

            text-align: right;
        }

        #textReaderBox {

            width: 100%;

            min-height: 180px;

            resize: vertical;

            padding: 18px;

            background: #000;

            color: #fff;

            border:
                1px solid rgba(212, 175, 55, 0.4);

            border-radius: 14px;

            outline: none;

            font-size: 1.05rem;

            line-height: 1.8;
        }

        #textReaderBox:focus {

            border-color: #d4af37;

            box-shadow:
                0 0 20px rgba(212, 175, 55, 0.25);
        }

        #textReaderBox::placeholder {

            color: #806d8d;
        }

        .text-reader-buttons {

            display: flex;

            gap: 14px;

            margin-top: 15px;
        }

        .text-reader-buttons .camera-btn {

            flex: 1;
        }

        /* =========================
           FOOTER
        ========================= */

        .camera-footer {

            margin-top: 35px;

            color: #806d8d;

            font-size: 0.85rem;

            text-align: center;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 768px) {

            .camera-container {

                grid-template-columns: 1fr;
            }

            .text-reader-box {

                grid-column: span 1;
            }

            .big-mobsar-title {

                font-size: 4rem;
            }

            .hero-eye-icon {

                font-size: 4.5rem;
            }

            .massive-glow-line {

                width: 80%;
            }

            .sub-title {

                font-size: 1.8rem;
            }

            .text-reader-buttons {

                flex-direction: column;
            }
        }

        @media(max-width: 480px) {

            .top-nav-bar {

                width: 92%;
            }

            .home-back-btn,
            .chat-nav-btn {

                padding: 10px 12px;

                font-size: 0.85rem;
            }

            .mobsar-brand-wrapper {

                padding: 20px 30px;
            }

            .big-mobsar-title {

                font-size: 3rem;

                letter-spacing: 3px;
            }

            .camera-container {

                width: 92%;
            }
        }

    </style>

</head>

<body>

    <!-- =========================
         TOP NAVIGATION
    ========================= -->

    <div class="top-nav-bar">

        <a href="index.php" class="home-back-btn">
            <i class="fa-solid fa-house"></i>
            الصفحة الرئيسية
        </a>

        <a href="communication.php" class="chat-nav-btn">
            <i class="fa-solid fa-comments"></i>
            صفحة التواصل
            <i class="fa-solid fa-bolt"></i>
        </a>

    </div>


    <!-- =========================
         HERO
    ========================= -->

    <div class="hero-header">

        <div class="mobsar-brand-wrapper">

            <i class="fa-solid fa-eye hero-eye-icon"></i>

            <h1 class="big-mobsar-title">
                MOBSAR
            </h1>

        </div>

        <div class="massive-glow-line"></div>

        <div class="sub-title">
            الكاميرا
        </div>

    </div>


    <!-- =========================
         CAMERA CONTENT
    ========================= -->

    <div class="camera-container">


        <!-- =====================
             CAMERA CARD
        ====================== -->

        <div class="card-box">

            <h3>

                <span>
                    الكاميرا
                </span>

                <i
                    class="fa-solid fa-camera"
                    style="color:#d4af37;">
                </i>

            </h3>


            <div class="camera-preview">

                <video
                    id="cameraVideo"
                    autoplay
                    playsinline>
                </video>


                <div
                    class="camera-placeholder"
                    id="cameraPlaceholder">

                    <i class="fa-solid fa-camera"></i>

                    <p>
                        اضغط على «فتح الكاميرا» لتشغيل الكاميرا
                    </p>

                </div>

            </div>


            <div class="camera-buttons">

                <button
                    type="button"
                    class="camera-btn"
                    id="openCameraBtn">

                    <i class="fa-solid fa-video"></i>

                    فتح الكاميرا

                </button>


                <button
                    type="button"
                    class="camera-btn"
                    id="captureBtn">

                    <i class="fa-solid fa-camera"></i>

                    التقاط الصورة

                </button>

            </div>


            <div
                class="captured-image-area"
                id="capturedImageArea">

                <h4>
                    الصورة الملتقطة
                </h4>

                <img
                    id="capturedImage"
                    alt="الصورة الملتقطة">

            </div>

        </div>


        <!-- =====================
             TEXT READER
        ====================== -->

        <div class="card-box text-reader-box">

            <h3>

                <span>
                    قارئ النصوص
                </span>

                <i
                    class="fa-solid fa-file-lines"
                    style="color:#d4af37;">
                </i>

            </h3>


            <p class="text-reader-description">
                ضع هنا النص الذي تريد قراءته أو النص الذي قمت بنسخه.
            </p>


            <textarea
                id="textReaderBox"
                placeholder="اكتب أو الصق النص هنا..."></textarea>


            <div class="text-reader-buttons">

                <button
                    type="button"
                    class="camera-btn"
                    id="readTextBtn">

                    <i class="fa-solid fa-book-open"></i>

                    قراءة النص

                </button>


                <button
                    type="button"
                    class="camera-btn"
                    id="clearTextBtn">

                    <i class="fa-solid fa-eraser"></i>

                    مسح النص

                </button>

            </div>

        </div>

    </div>


    <!-- =========================
         FOOTER
    ========================= -->

    <div class="camera-footer">

        MOBSAR © 2026 — المساعد البصري

    </div>


    <!--
        Part 2:
        JavaScript
        هنا هنضيف سكريبت الكاميرا
        والتقاط الصورة
        وقراءة النص
        ومسح النص
    -->




<script type="module">

/* =========================================================
   MOBSAR CAMERA AI
   Florence-2 + English → Arabic Translation
   ========================================================= */

import {
    Florence2ForConditionalGeneration,
    AutoProcessor,
    RawImage,
    pipeline,
    env
} from "https://cdn.jsdelivr.net/npm/@huggingface/transformers@3.8.1";


/* =========================================================
   CACHE
   ========================================================= */

env.useBrowserCache = true;
env.useWasmCache = true;


/* =========================================================
   MODELS
   ========================================================= */

const VISION_MODEL = "onnx-community/Florence-2-base-ft";
const TRANSLATION_MODEL = "Xenova/opus-mt-en-ar";


/* =========================================================
   VARIABLES
   ========================================================= */

let processor = null;
let visionModel = null;
let translator = null;

let visionPromise = null;
let translationPromise = null;

let cameraStream = null;


/* =========================================================
   ELEMENTS
   ========================================================= */

const video = document.getElementById("cameraVideo");
const placeholder = document.getElementById("cameraPlaceholder");

const openCameraBtn = document.getElementById("openCameraBtn");
const captureBtn = document.getElementById("captureBtn");

const capturedImageArea =
    document.getElementById("capturedImageArea");

const capturedImage =
    document.getElementById("capturedImage");

const textReaderBox =
    document.getElementById("textReaderBox");

const readTextBtn =
    document.getElementById("readTextBtn");

const clearTextBtn =
    document.getElementById("clearTextBtn");


/* =========================================================
   AI RESULT AREA
   ========================================================= */

let aiArea = document.getElementById("aiCameraResult");

if (!aiArea) {

    aiArea = document.createElement("div");

    aiArea.id = "aiCameraResult";

    aiArea.innerHTML = `
        <div style="
            margin-top:25px;
            padding:20px;
            border-radius:20px;
            background:rgba(20,10,35,.85);
            border:1px solid rgba(202,166,255,.35);
            box-shadow:0 0 25px rgba(202,166,255,.15);
        ">

            <h3 style="
                color:#f1dc9a;
                text-align:center;
                margin-bottom:15px;
            ">
                ماذا أمامي؟
            </h3>

            <div id="aiStatus"
                 style="
                    color:#caa6ff;
                    text-align:center;
                    margin-bottom:15px;
                 ">
            </div>

            <div id="aiResultText"
                 dir="rtl"
                 style="
                    color:white;
                    line-height:2;
                    font-size:18px;
                    text-align:right;
                 ">
            </div>

        </div>
    `;

    document
        .querySelector(".camera-container")
        ?.appendChild(aiArea);
}


const aiStatus =
    document.getElementById("aiStatus");

const aiResultText =
    document.getElementById("aiResultText");


/* =========================================================
   WHAT IN FRONT BUTTON
   ========================================================= */

let whatInFrontBtn =
    document.getElementById("whatInFrontBtn");

if (!whatInFrontBtn) {

    whatInFrontBtn = document.createElement("button");

    whatInFrontBtn.type = "button";
    whatInFrontBtn.id = "whatInFrontBtn";
    whatInFrontBtn.className = "camera-btn";

    whatInFrontBtn.textContent = "ماذا أمامي؟";

    whatInFrontBtn.style.marginTop = "15px";

    document
        .querySelector(".camera-buttons")
        ?.appendChild(whatInFrontBtn);
}


/* =========================================================
   STATUS
   ========================================================= */

function setStatus(text) {

    if (aiStatus) {
        aiStatus.textContent = text;
    }
}


/* =========================================================
   SPEAK
   ========================================================= */

function speakArabic(text) {

    if (!text || !text.trim()) return;

    window.speechSynthesis.cancel();

    const utterance =
        new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-EG";
    utterance.rate = 0.78;
    utterance.pitch = 1;
    utterance.volume = 1;

    window.speechSynthesis.speak(utterance);
}


/* =========================================================
   OPEN CAMERA
   ========================================================= */

async function openCamera() {

    try {

        if (cameraStream) {
            return;
        }

        cameraStream =
            await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: "environment",
                    width: {
                        ideal: 1280
                    },
                    height: {
                        ideal: 720
                    }
                },
                audio: false
            });

        video.srcObject = cameraStream;

        video.style.display = "block";

        if (placeholder) {
            placeholder.style.display = "none";
        }

        await video.play();

    } catch (error) {

        console.error(error);

        setStatus("تعذر فتح الكاميرا.");

        speakArabic(
            "تعذر فتح الكاميرا. تأكدي من السماح للمتصفح باستخدام الكاميرا."
        );
    }
}


/* =========================================================
   CLOSE CAMERA
   ========================================================= */

function stopCamera() {

    if (cameraStream) {

        cameraStream
            .getTracks()
            .forEach(track => track.stop());

        cameraStream = null;
    }

    if (video) {

        video.pause();
        video.srcObject = null;
        video.style.display = "none";
    }

    if (placeholder) {
        placeholder.style.display = "flex";
    }
}


/* =========================================================
   CAPTURE IMAGE
   ========================================================= */

function captureImage() {

    if (!cameraStream) {

        speakArabic("افتحي الكاميرا أولاً.");
        return null;
    }

    if (!video.videoWidth || !video.videoHeight) {

        speakArabic("الكاميرا لم تصبح جاهزة بعد.");
        return null;
    }


    const canvas =
        document.createElement("canvas");


    /*
       نقلل حجم الصورة قبل إرسالها للنموذج
       لتقليل الحمل على الموبايل.
    */

    const maxSize = 768;

    let width = video.videoWidth;
    let height = video.videoHeight;

    if (width > height) {

        if (width > maxSize) {
            height =
                Math.round(
                    height * maxSize / width
                );

            width = maxSize;
        }

    } else {

        if (height > maxSize) {
            width =
                Math.round(
                    width * maxSize / height
                );

            height = maxSize;
        }
    }


    canvas.width = width;
    canvas.height = height;


    const ctx =
        canvas.getContext("2d");

    ctx.drawImage(
        video,
        0,
        0,
        width,
        height
    );


    const imageURL =
        canvas.toDataURL(
            "image/jpeg",
            0.82
        );


    capturedImage.src = imageURL;

    capturedImageArea.style.display = "block";


    return imageURL;
}


/* =========================================================
   LOAD VISION MODEL
   ========================================================= */

async function loadVisionModel() {

    if (processor && visionModel) {
        return;
    }

    if (visionPromise) {
        return visionPromise;
    }


    visionPromise = (async () => {

        setStatus(
            "يتم تجهيز تحليل الصورة لأول مرة..."
        );


        processor =
            await AutoProcessor.from_pretrained(
                VISION_MODEL
            );


        visionModel =
            await Florence2ForConditionalGeneration
                .from_pretrained(
                    VISION_MODEL,
                    {
                        dtype: "q4"
                    }
                );

    })();


    try {

        await visionPromise;

    } finally {

        visionPromise = null;
    }
}


/* =========================================================
   LOAD TRANSLATOR
   ========================================================= */

async function loadTranslator() {

    if (translator) {
        return translator;
    }

    if (translationPromise) {
        return translationPromise;
    }


    translationPromise = (async () => {

        translator =
            await pipeline(
                "translation",
                TRANSLATION_MODEL,
                {
                    dtype: "q4"
                }
            );

        return translator;

    })();


    try {

        return await translationPromise;

    } finally {

        translationPromise = null;
    }
}


/* =========================================================
   GET FULL IMAGE DESCRIPTION
   ========================================================= */

async function getImageDescription(imageURL) {

    await loadVisionModel();


    setStatus(
        "جاري التعرف على الصورة..."
    );


    const image =
        await RawImage.fromURL(imageURL);


    const task =
        "<MORE_DETAILED_CAPTION>";


    const prompts =
        processor.construct_prompts(task);


    const inputs =
        await processor(
            image,
            prompts
        );


    const generatedIds =
        await visionModel.generate({
            ...inputs,
            max_new_tokens: 120
        });


    const generatedText =
        processor.batch_decode(
            generatedIds,
            {
                skip_special_tokens: false
            }
        )[0];


    const result =
        processor.post_process_generation(
            generatedText,
            task
        );


    let description =
        result[task] || "";


    /*
       تنظيف بسيط فقط.
       لا نختصر الوصف.
    */

    description =
        description
            .replace(/<[^>]*>/g, "")
            .replace(/\s+/g, " ")
            .trim();


    return description;
}


/* =========================================================
   TRANSLATE FULL DESCRIPTION
   ========================================================= */

async function translateToArabic(text) {

    if (!text || !text.trim()) {
        return "";
    }


    const translatorInstance =
        await loadTranslator();


    setStatus(
        "جاري تحويل الوصف إلى العربية..."
    );


    const output =
        await translatorInstance(
            text,
            {
                max_new_tokens: 140
            }
        );


    if (
        Array.isArray(output) &&
        output.length > 0 &&
        output[0].translation_text
    ) {

        return output[0]
            .translation_text
            .trim();
    }


    return text;
}


/* =========================================================
   ANALYZE IMAGE
   ========================================================= */

async function analyzeImage() {

    if (!capturedImage.src) {

        speakArabic(
            "التقطي صورة أولاً."
        );

        return;
    }


    /*
       منع الضغط أكثر من مرة أثناء التحليل
    */

    if (whatInFrontBtn.disabled) {
        return;
    }


    whatInFrontBtn.disabled = true;


    try {

        setStatus(
            "جاري تحليل الصورة..."
        );

        aiResultText.textContent = "";


        /*
           1 - Florence يحلل الصورة
        */

        const englishDescription =
            await getImageDescription(
                capturedImage.src
            );


        if (!englishDescription) {

            throw new Error(
                "لم يتم الحصول على وصف للصورة."
            );
        }


        /*
           2 - ترجمة الوصف الكامل للعربي
        */

        const arabicDescription =
            await translateToArabic(
                englishDescription
            );


        /*
           3 - عرض الوصف كامل
        */

        aiResultText.textContent =
            arabicDescription ||
            englishDescription;


        setStatus(
            "تم التعرف على الصورة."
        );


        /*
           4 - قراءة الوصف العربي كامل
        */

        speakArabic(
            arabicDescription ||
            englishDescription
        );


    } catch (error) {

        console.error(
            "MOBSAR AI ERROR:",
            error
        );


        setStatus(
            "حدث خطأ أثناء تحليل الصورة."
        );


        aiResultText.textContent =
            "تعذر تحليل الصورة حالياً.";


        speakArabic(
            "تعذر تحليل الصورة حالياً. حاولي مرة أخرى."
        );

    } finally {

        whatInFrontBtn.disabled = false;
    }
}


/* =========================================================
   READ TEXT
   ========================================================= */

function readText() {

    const text =
        textReaderBox?.value?.trim();


    if (!text) {

        speakArabic(
            "لا يوجد نص لقراءته."
        );

        return;
    }


    speakArabic(text);
}


/* =========================================================
   CLEAR TEXT
   ========================================================= */

function clearText() {

    if (textReaderBox) {
        textReaderBox.value = "";
    }


    window.speechSynthesis.cancel();


    speakArabic(
        "تم مسح النص."
    );
}


/* =========================================================
   EVENTS
   ========================================================= */

openCameraBtn?.addEventListener(
    "click",
    openCamera
);


captureBtn?.addEventListener(
    "click",
    captureImage
);


whatInFrontBtn?.addEventListener(
    "click",
    analyzeImage
);


readTextBtn?.addEventListener(
    "click",
    readText
);


clearTextBtn?.addEventListener(
    "click",
    clearText
);


/* =========================================================
   PAGE CLEANUP
   ========================================================= */

window.addEventListener(
    "beforeunload",
    () => {

        stopCamera();

        window.speechSynthesis.cancel();
    }
);


/* =========================================================
   GLOBAL ACCESS
   مهم للأوامر الصوتية لاحقاً
   ========================================================= */

window.openMobsarCamera =
    openCamera;

window.captureMobsarImage =
    captureImage;

window.analyzeMobsarImage =
    analyzeImage;

window.stopMobsarCamera =
    stopCamera;

window.readMobsarText =
    readText;

window.clearMobsarText =
    clearText;


</script>
<script>
/* =========================================================
   PART 3-A
   MOBSAR VOICE + CAMERA COMMANDS
========================================================= */

(function () {
    "use strict";

    let recognition = null;
    let listening = false;
    let started = false;

    /* =========================
       صوت مبصر
    ========================= */

    window.mobsarSpeak = function (text, callback) {

        if (!("speechSynthesis" in window)) {
            if (callback) callback();
            return;
        }

        speechSynthesis.cancel();

        const voice = new SpeechSynthesisUtterance(text);

        voice.lang = "ar-EG";
        voice.rate = 0.85;
        voice.pitch = 1;

        voice.onend = function () {
            if (callback) callback();
        };

        speechSynthesis.speak(voice);
    };


    /* =========================
       تنظيف الأمر
    ========================= */

    function cleanCommand(text) {

        return text
            .toLowerCase()
            .trim()
            .replace(/[؟?!.,،؛:]/g, "")
            .replace(/\s+/g, " ");
    }


    /* =========================
       تشغيل التعرف على الصوت
    ========================= */

    function createRecognition() {

        const SpeechRecognition =
            window.SpeechRecognition ||
            window.webkitSpeechRecognition;

        if (!SpeechRecognition) {

            mobsarSpeak(
                "عذراً، التعرف على الصوت غير مدعوم في هذا المتصفح."
            );

            return null;
        }

        const rec = new SpeechRecognition();

        rec.lang = "ar-EG";
        rec.continuous = true;
        rec.interimResults = false;
        rec.maxAlternatives = 5;


        rec.onstart = function () {
            listening = true;
            console.log("MOBSAR listening...");
        };


        rec.onresult = function (event) {

            const result =
                event.results[event.results.length - 1];

            if (!result || !result[0]) return;

            const text =
                result[0].transcript;

            console.log("MOBSAR heard:", text);

            window.handleMobsarVoiceCommand(text);
        };


        rec.onerror = function (event) {

            console.log(
                "Speech recognition error:",
                event.error
            );
        };


        rec.onend = function () {

            listening = false;

            if (started) {

                setTimeout(function () {

                    try {
                        rec.start();
                    } catch (e) {
                        console.log(e);
                    }

                }, 300);
            }
        };

        return rec;
    }


    /* =========================
       بدء الاستماع
    ========================= */

    window.mobsarStartListening = function () {

        if (listening) return;

        if (!recognition) {
            recognition = createRecognition();
        }

        if (!recognition) return;

        started = true;

        try {
            recognition.start();
        } catch (e) {
            console.log(e);
        }
    };


    /* =========================
       إيقاف الاستماع
    ========================= */

    window.mobsarStopListening = function () {

        started = false;
        listening = false;

        if (recognition) {

            try {
                recognition.stop();
            } catch (e) {
                console.log(e);
            }
        }
    };


    /* =========================
       فتح الكاميرا
    ========================= */

    function openCameraCommand() {

        if (
            typeof window.openMobsarCamera ===
            "function"
        ) {

            window.openMobsarCamera();

            mobsarSpeak(
                "تم فتح الكاميرا."
            );

            return true;
        }

        mobsarSpeak(
            "لم أستطع تشغيل الكاميرا."
        );

        return true;
    }


    /* =========================
       التقاط الصورة
    ========================= */

    function captureCommand() {

        if (
            typeof window.captureMobsarImage ===
            "function"
        ) {

            window.captureMobsarImage();

            mobsarSpeak(
                "لقد التقطت صورة."
            );

            return true;
        }

        mobsarSpeak(
            "لم أستطع التقاط الصورة."
        );

        return true;
    }


    /* =========================
       تحليل الصورة
    ========================= */

    function analyzeCommand() {

        if (
            typeof window.analyzeMobsarImage ===
            "function"
        ) {

            mobsarSpeak(
                "سمعتك. انتظر قليلاً، سوف أحلل الصورة الآن، وبعدها سوف أقرأ لك ما الموجود فيها.",
                function () {

                    window.analyzeMobsarImage();

                }
            );

            return true;
        }

        mobsarSpeak(
            "لا أستطيع تحليل الصورة حالياً."
        );

        return true;
    }


    /* =========================
       الأوامر الأساسية
    ========================= */

    window.handleMobsarVoiceCommand =
        function (text) {

            const command =
                cleanCommand(text);


            if (!command) return;

/* =========================
   إغلاق الكاميرا
========================= */

if (
    command.includes("اقفل الكاميرا") ||
    command.includes("قفل الكاميرا") ||
    command.includes("اغلق الكاميرا") ||
    command.includes("إغلق الكاميرا") ||
    command.includes("وقف الكاميرا")
) {

    if (
        typeof window.stopMobsarCamera === "function"
    ) {

        window.stopMobsarCamera();

        mobsarSpeak(
            "تم إغلاق الكاميرا."
        );

    } else {

        mobsarSpeak(
            "لم أستطع إغلاق الكاميرا."
        );

    }

    return;
}
            /* السلام عليكم */

            if (
                command.includes("السلام عليكم") ||
                command.includes("سلام عليكم")
            ) {

                mobsarSpeak(
                    "وعليكم السلام ورحمة الله وبركاته. أهلاً بك، عايز إيه؟"
                );

                return;
            }


            /* فتح الكاميرا */

            if (
                command.includes("افتح الكاميرا") ||
                command.includes("فتح الكاميرا") ||
                command.includes("شغل الكاميرا") ||
                command.includes("شغلي الكاميرا") ||
                command.includes("افتح لي الكاميرا") ||
                command.includes("عايز افتح الكاميرا") ||
                command.includes("أنا عايز افتح الكاميرا") ||
                command.includes("انا عايز افتح الكاميرا")
            ) {

                openCameraCommand();
                return;
            }


            /* التقاط الصورة */

            if (
                command.includes("التقط صورة") ||
                command.includes("التقطلي صورة") ||
                command.includes("خد صورة") ||
                command.includes("خدلي صورة") ||
                command.includes("التقاط صورة") ||
                command.includes("صور") ||
                command.includes("صوري")
            ) {

                captureCommand();
                return;
            }


            /* ماذا أمامي */

            if (
                command.includes("ماذا أمامي") ||
                command.includes("ماذا امامي") ||
                command.includes("ايه اللي قدامي") ||
                command.includes("إيه اللي قدامي") ||
                command.includes("انت شايف ايه") ||
                command.includes("إنت شايف إيه") ||
                command.includes("ماذا ترى") ||
                command.includes("اشرحلي الصورة") ||
                command.includes("اشرح الصورة") ||
                command.includes("وصفلي الصورة") ||
                command.includes("صفلي الصورة") ||
                command.includes("حلل الصورة") ||
                command.includes("حلللي الصورة") ||
                command.includes("ايه الموجود في الصورة") ||
                command.includes("إيه الموجود في الصورة") ||
                command.includes("الصورة فيها ايه") ||
                command.includes("الصورة فيها إيه") ||
                command.includes("ماذا يوجد في الصورة") ||
                command.includes("قوللي ايه اللي في الصورة") ||
                command.includes("قولي إيه اللي في الصورة")
            ) {

                analyzeCommand();
                return;
            }


            /* باقي الأوامر في Part 3-B */

            if (
                typeof window.handleMobsarPart3B ===
                "function"
            ) {

                if (
                    window.handleMobsarPart3B(command)
                ) {
                    return;
                }
            }


            /* التنقل في Part 4 */

            if (
                typeof window.handleMobsarNavigation ===
                "function"
            ) {

                window.handleMobsarNavigation(command);
            }
        };


    /* =========================
       أول Click يبدأ الصوت
       بدون ميكروفون ظاهر
    ========================= */

    document.addEventListener(
        "click",
        function () {

            if (started) return;

            mobsarSpeak(
                "أهلاً بك في مبصر. أنا جاهز، قل لي ماذا تريد.",
                function () {
                    window.mobsarStartListening();
                }
            );

        },
        {
            once: true,
            capture: true
        }
    );

})();
</script>


<script>
/* =========================================================
   PART 3-B
   CAMERA + TEXT + EXTRA COMMANDS
========================================================= */

(function () {
    "use strict";


    /* =========================
       قراءة النص
    ========================= */

    window.handleMobsarPart3B =
        function (command) {


            /* السلام عليكم */

            if (
                command.includes("السلام عليكم") ||
                command.includes("سلام عليكم")
            ) {

                window.mobsarSpeak(
                    "وعليكم السلام ورحمة الله وبركاته. أهلاً بك، عايز إيه؟"
                );

                return true;
            }


            /* =========================
               إغلاق الكاميرا
            ========================= */

            if (
                command.includes("اقفل الكاميرا") ||
                command.includes("قفل الكاميرا") ||
                command.includes("اغلق الكاميرا") ||
                command.includes("إغلق الكاميرا") ||
                command.includes("وقف الكاميرا")
            ) {

                if (
                    typeof window.stopMobsarCamera ===
                    "function"
                ) {

                    window.stopMobsarCamera();

                    window.mobsarSpeak(
                        "تم إغلاق الكاميرا."
                    );
                }

                return true;
            }


            /* =========================
               قراءة النص
            ========================= */

            if (
                command.includes("اقرأ النص") ||
                command.includes("اقرا النص") ||
                command.includes("قراءة النص") ||
                command.includes("اقرأ البوست") ||
                command.includes("اقرا البوست") ||
                command.includes("قراءة البوست") ||
                command.includes("أنا عايز أقرأ البوست") ||
                command.includes("انا عايز اقرا البوست") ||
                command.includes("اقرأ الكلام") ||
                command.includes("اقرا الكلام") ||
                command.includes("اقرأ المكتوب") ||
                command.includes("اقرا المكتوب")
            ) {

                if (
                    typeof window.readMobsarText ===
                    "function"
                ) {

                    window.readMobsarText();

                } else if (
                    typeof window.mobsarReadText ===
                    "function"
                ) {

                    window.mobsarReadText();

                }

                return true;
            }


            /* =========================
               مسح النص
            ========================= */

            if (
                command.includes("امسح النص") ||
                command.includes("مسح النص") ||
                command.includes("امسح الكلام") ||
                command.includes("امسح البوست") ||
                command.includes("امسح المكتوب")
            ) {

                if (
                    typeof window.clearMobsarText ===
                    "function"
                ) {

                    window.clearMobsarText();

                } else if (
                    typeof window.mobsarClearText ===
                    "function"
                ) {

                    window.mobsarClearText();

                }

                return true;
            }


            /* =========================
               فين الصورة؟
            ========================= */

            if (
                command.includes("فين الصورة") ||
                command.includes("الصورة فين") ||
                command.includes("أين الصورة") ||
                command.includes("اين الصورة")
            ) {

                if (
                    window.mobsarAnalysisInProgress === true
                ) {

                    window.mobsarSpeak(
                        "انتظر قليلاً، أنا بحلل الصورة الآن."
                    );

                } else {

                    window.mobsarSpeak(
                        "الصورة الملتقطة موجودة في قسم الصورة الملتقطة."
                    );
                }

                return true;
            }


            return false;
        };

})();
</script>

<script>
/* =========================================================
   PART 4-A
   MAIN PAGE NAVIGATION
========================================================= */

(function () {
    "use strict";


    function go(page, message) {

        window.mobsarSpeak(
            message,
            function () {
                window.location.href = page;
            }
        );
    }


    window.handleMobsarNavigation =
        function (command) {


            /* الرئيسية */

            if (
                command.includes("الرئيسية") ||
                command.includes("الصفحة الرئيسية") ||
                command.includes("الصفحه الرئيسيه") ||
                command.includes("الصفحة الاولى") ||
                command.includes("الصفحه الاولى") ||
                command.includes("ارجع للرئيسية") ||
                command.includes("ارجع للصفحة الرئيسية")
            ) {

                go(
                    "index.php",
                    "حاضر، سأفتح الصفحة الرئيسية."
                );

                return true;
            }


            /* التسجيل */

            if (
                command.includes("التسجيل") ||
                command.includes("صفحة التسجيل") ||
                command.includes("صفحه التسجيل") ||
                command.includes("عايز اسجل") ||
                command.includes("اريد التسجيل")
            ) {

                go(
                    "register.php",
                    "حاضر، سأفتح صفحة التسجيل."
                );

                return true;
            }


            /* المهام */

            if (
                command.includes("المهام") ||
                command.includes("صفحة المهام") ||
                command.includes("صفحه المهام") ||
                command.includes("افتح المهام") ||
                command.includes("وديني للمهام")
            ) {

                go(
                    "tasks.php",
                    "حاضر، سأفتح صفحة المهام."
                );

                return true;
            }


            /* الإعدادات */

            if (
                command.includes("الإعدادات") ||
                command.includes("الاعدادات") ||
                command.includes("صفحة الإعدادات") ||
                command.includes("صفحة الاعدادات")
            ) {

                go(
                    "settings.php",
                    "حاضر، سأفتح صفحة الإعدادات."
                );

                return true;
            }


            /* الجدول والمواعيد */

            if (
                command.includes("الجدول") ||
                command.includes("المواعيد") ||
                command.includes("التقويم") ||
                command.includes("صفحة المواعيد")
            ) {

                go(
                    "schedule.php",
                    "حاضر، سأفتح الجدول والمواعيد."
                );

                return true;
            }


            /* الإشعارات */

            if (
                command.includes("الإشعارات") ||
                command.includes("الاشعارات") ||
                command.includes("صفحة الإشعارات") ||
                command.includes("صفحة الاشعارات")
            ) {

                go(
                    "notificationc.php",
                    "حاضر، سأفتح صفحة الإشعارات."
                );

                return true;
            }


            /* التقييم */

            if (
                command.includes("التقييم") ||
                command.includes("الإنجازات") ||
                command.includes("الانجازات") ||
                command.includes("التقارير")
            ) {

                go(
                    "evaluation.php",
                    "حاضر، سأفتح صفحة التقييم والإنجازات."
                );

                return true;
            }


            /* الموظفين */

            if (
                command.includes("الموظفين") ||
                command.includes("صفحة الموظفين")
            ) {

                go(
                    "employees.php",
                    "حاضر، سأفتح صفحة الموظفين."
                );

                return true;
            }


            /* التواصل */

            if (
                command.includes("التواصل") ||
                command.includes("صفحة التواصل") ||
                command.includes("المحادثات")
            ) {

                go(
                    "communication.php",
                    "حاضر، سأفتح صفحة التواصل."
                );

                return true;
            }


            /* المساعد البصري */

            if (
                command.includes("المساعد البصري") ||
                command.includes("المساعد البصرى") ||
                command.includes("صفحة المساعد البصري")
            ) {

                go(
                    "visual-assistant.php",
                    "حاضر، سأفتح المساعد البصري."
                );

                return true;
            }


            return false;
        };

})();
</script>



<script>
/* =========================================================
   PART 4-B
   EXTRA PAGE NAVIGATION
========================================================= */

(function () {
    "use strict";


    const oldNavigation =
        window.handleMobsarNavigation;


    function openPage(page, message) {

        window.mobsarSpeak(
            message,
            function () {
                window.location.href = page;
            }
        );
    }


    window.handleMobsarNavigation =
        function (command) {


            /* =========================
               MOBSAR AI
            ========================= */

            if (
                command.includes("الذكاء الاصطناعي") ||
                command.includes("مبصر ai") ||
                command.includes("مبصر للذكاء") ||
                command.includes("صفحة الذكاء الاصطناعي")
            ) {

                openPage(
                    "mobsar-ai.php",
                    "حاضر، سأفتح مبصر للذكاء الاصطناعي."
                );

                return true;
            }


            /* =========================
               صفحة الكاميرا
               
               ملاحظة:
               لا نستخدم "افتح الكاميرا" هنا
               حتى لا تتعارض مع تشغيل الكاميرا.
            ========================= */

            if (
                command.includes("افتح صفحة الكاميرا") ||
                command.includes("افتح صفحه الكاميرا") ||
                command.includes("صفحة الكاميرا") ||
                command.includes("وديني لصفحة الكاميرا")
            ) {

                openPage(
                    "camera.php",
                    "حاضر، سأفتح صفحة الكاميرا."
                );

                return true;
            }


            /* =========================
               تحليل الصور
            ========================= */

            if (
                command.includes("تحليل الصور") ||
                command.includes("تحليل صورة") ||
                command.includes("صفحة تحليل الصور")
            ) {

                openPage(
                    "image-analysis.php",
                    "حاضر، سأفتح صفحة تحليل الصور."
                );

                return true;
            }


            /* =========================
               Excel
            ========================= */

            if (
                command.includes("اكسل") ||
                command.includes("إكسل") ||
                command.includes("excel") ||
                command.includes("صفحة الاكسل")
            ) {

                openPage(
                    "Excel.php",
                    "حاضر، سأفتح صفحة إكسل."
                );

                return true;
            }


            /* =========================
               Word
            ========================= */

            if (
                command.includes("وورد") ||
                command.includes("word") ||
                command.includes("صفحة الوورد")
            ) {

                openPage(
                    "Word.php",
                    "حاضر، سأفتح صفحة وورد."
                );

                return true;
            }


            /* =========================
               PowerPoint
            ========================= */

            if (
                command.includes("باوربوينت") ||
                command.includes("باور بوينت") ||
                command.includes("powerpoint") ||
                command.includes("صفحة الباوربوينت")
            ) {

                openPage(
                    "PowerPoint.php",
                    "حاضر، سأفتح صفحة باوربوينت."
                );

                return true;
            }


            /* =========================
               الروحانيات
            ========================= */

            if (
                command.includes("الروحانيات") ||
                command.includes("روحانيات") ||
                command.includes("صفحة الروحانيات")
            ) {

                openPage(
                    "team.php",
                    "حاضر، سأفتح صفحة الروحانيات."
                );

                return true;
            }


            /* =========================
               المصحف
            ========================= */

            if (
                command.includes("المصحف") ||
                command.includes("المصحف الشريف") ||
                command.includes("القرآن") ||
                command.includes("القران")
            ) {

                openPage(
                    "Quran.php",
                    "حاضر، سأفتح المصحف الشريف."
                );

                return true;
            }


            /* =========================
               الأذكار
            ========================= */

            if (
                command.includes("الأذكار") ||
                command.includes("الاذكار") ||
                command.includes("اذكار")
            ) {

                openPage(
                    "Azkar.php",
                    "حاضر، سأفتح الأذكار."
                );

                return true;
            }


            /* =========================
               الأحاديث
            ========================= */

            if (
                command.includes("الأحاديث") ||
                command.includes("الاحاديث") ||
                command.includes("الأحاديث النبوية") ||
                command.includes("الاحاديث النبوية")
            ) {

                openPage(
                    "Hadith.php",
                    "حاضر، سأفتح الأحاديث النبوية."
                );

                return true;
            }


            /* =========================
               الأدعية
            ========================= */

            if (
                command.includes("الأدعية") ||
                command.includes("الادعية") ||
                command.includes("الدعاء")
            ) {

                openPage(
                    "Duaa.php",
                    "حاضر، سأفتح الأدعية."
                );

                return true;
            }


            /* =========================
               الصلاة والعبادات
            ========================= */

            if (
                command.includes("الصلاة") ||
                command.includes("الصلاه") ||
                command.includes("العبادات") ||
                command.includes("الصلاة والعبادات")
            ) {

                openPage(
                    "Prayer.php",
                    "حاضر، سأفتح صفحة الصلاة والعبادات."
                );

                return true;
            }


            /* =========================
               قصص الأنبياء
            ========================= */

            if (
                command.includes("قصص الأنبياء") ||
                command.includes("قصص الانبياء") ||
                command.includes("الأنبياء") ||
                command.includes("الانبياء")
            ) {

                openPage(
                    "Prophets.php",
                    "حاضر، سأفتح قصص الأنبياء."
                );

                return true;
            }


            /* =========================
               نرجع لـ Part 4-A
            ========================= */

            if (
                typeof oldNavigation ===
                "function"
            ) {

                return oldNavigation(command);
            }


            return false;
        };

})();







/* =========================
   قراءة أي عنصر عند مرور الماوس
========================= */

document.addEventListener("mouseover", function (event) {

    const element = event.target;

    // تجاهل العناصر الصغيرة أو غير المهمة
    if (
        !element ||
        element === document.body ||
        element === document.documentElement
    ) {
        return;
    }

    // العناصر التي نريد قراءتها
    const text = element.innerText || element.getAttribute("aria-label");

    if (!text || !text.trim()) {
        return;
    }

    // منع تكرار نفس الكلام
    if (element.dataset.mobsarLastText === text.trim()) {
        return;
    }

    element.dataset.mobsarLastText = text.trim();

    // إيقاف الكلام السابق
    speechSynthesis.cancel();

    // قراءة العنصر
    if (typeof window.mobsarSpeak === "function") {
        window.mobsarSpeak(text.trim());
    }
});





</script>
    
</body>

</html>