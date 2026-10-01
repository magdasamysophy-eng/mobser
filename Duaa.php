<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موسوعة مبصر - صفحة الأدعية</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
            overflow-x: hidden; cursor: pointer; /* مؤشر يوضح أن الصفحة تفاعلية بالكامل بالضغط */
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
        
        .supplications-container { width: 90%; max-width: 900px; display: flex; flex-direction: column; gap: 22px; margin-top: 25px; }
        
        .card-box {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 30px rgba(138, 43, 226, 0.15), inset 0 0 25px rgba(212, 175, 55, 0.08);
            transition: 0.3s; position: relative;
        }
        .card-box:hover { border-color: rgba(212, 175, 55, 0.7); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.98), 0 0 40px rgba(212, 175, 55, 0.25); transform: translateY(-2px); }
        
        .supplication-text {
            font-size: 1.35rem; color: #ffffff; line-height: 1.9; font-weight: 600; margin-bottom: 18px; text-align: right;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        
        .supplication-footer {
            display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(212, 175, 55, 0.2);
            padding-top: 15px; font-size: 0.95rem;
        }
        
        .source-badge {
            background: rgba(138, 43, 226, 0.2); color: #e9d5ff; border: 1px solid #8b5cf6;
            padding: 5px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 700;
            box-shadow: 0 0 10px rgba(139, 92, 246, 0.2);
        }
        
        .card-actions { display: flex; gap: 12px; align-items: center; }
        
        .counter-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000000; border: none;
            padding: 8px 16px; border-radius: 10px; font-weight: 700; font-size: 0.95rem; cursor: pointer;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3); transition: 0.3s; display: inline-flex; align-items: center; gap: 6px;
        }
        .counter-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); transform: scale(1.05); box-shadow: 0 0 20px rgba(212, 175, 55, 0.6); }

        .section-category-title {
            color: #d4af37; font-size: 1.5rem; margin: 25px 0 10px 0; font-weight: 700; text-align: right;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3); padding-bottom: 8px; width: 100%;
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
        }

        /* تنبيه بصري خفيف جداً يوضح تفعيل الاستماع بالضغط */
        .click-hint-banner {
            position: fixed; bottom: 15px; left: 50%; transform: translateX(-50%);
            background: rgba(15, 6, 26, 0.9); border: 1px solid #d4af37; padding: 8px 20px;
            border-radius: 20px; color: #d8b4fe; font-size: 0.9rem; font-weight: 600;
            box-shadow: 0 0 15px rgba(138, 43, 226, 0.3); z-index: 1000; pointer-events: none;
        }
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
        <div class="sub-title" onmouseenter="speakQuick('موسوعة الأدعية الشاملة')">موسوعة الأدعية الشاملة</div>
    </div>

    <div class="click-hint-banner">
        <i class="fa-solid fa-hand-pointer" style="color: #d4af37;"></i> اضغطي في أي مكان بالشاشة لتفعيل المساعد الصوتي وتلقي الأوامر فوراً
    </div>

    <div class="supplications-container">
        
        <!-- أدعية القرآن الكريم -->
        <div class="section-category-title" onmouseenter="speakQuick('أدعية القرآن الكريم')"><i class="fa-solid fa-book-quran"></i> أدعية القرآن الكريم</div>
        
        <div class="card-box" onmouseenter="speakQuick('رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ')">
            <div class="supplication-text">رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ</div>
            <div class="supplication-footer">
                <span class="source-badge">سورة البقرة - آية 201</span>
                <div class="card-actions">
                    <span style="color: #d8b4fe;">التكرار: <span class="counter-value">1</span></span>
                    <button type="button" class="counter-btn" onclick="incrementCount(this)"><i class="fa-solid fa-plus"></i> قريت</button>
                </div>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakQuick('رَبَّنَا لَا تُزِغْ قُلُوبَنَا بَعْدَ إِذْ هَدَيْتَنَا وَهَبْ لَنَا مِنْ لَدُنْكَ رَحْمَةً')">
            <div class="supplication-text">رَبَّنَا لَا تُزِغْ قُلُوبَنَا بَعْدَ إِذْ هَدَيْتَنَا وَهَبْ لَنَا مِنْ لَدُنْكَ رَحْمَةً ۚ إِنَّكَ أَنْتَ الْوَهَّابُ</div>
            <div class="supplication-footer">
                <span class="source-badge">سورة آل عمران - آية 8</span>
                <div class="card-actions">
                    <span style="color: #d8b4fe;">التكرار: <span class="counter-value">1</span></span>
                    <button type="button" class="counter-btn" onclick="incrementCount(this)"><i class="fa-solid fa-plus"></i> قريت</button>
                </div>
            </div>
        </div>

        <!-- أدعية الأنبياء -->
        <div class="section-category-title" onmouseenter="speakQuick('أدعية الأنبياء والمرسلين')"><i class="fa-solid fa-user-tie"></i> أدعية الأنبياء والمرسلين</div>

        <div class="card-box" onmouseenter="speakQuick('لَّا إِلَهَ إِلَّا أَنتَ سُبْحَانَكَ إِنِّي كُنتُ مِنَ الظَّالِمِينَ')">
            <div class="supplication-text">لَّا إِلَهَ إِلَّا أَنتَ سُبْحَانَكَ إِنِّي كُنتُ مِنَ الظَّالِمِينَ</div>
            <div class="supplication-footer">
                <span class="source-badge">دعاء نبي الله يونس عليه السلام</span>
                <div class="card-actions">
                    <span style="color: #d8b4fe;">التكرار: <span class="counter-value">1</span></span>
                    <button type="button" class="counter-btn" onclick="incrementCount(this)"><i class="fa-solid fa-plus"></i> قريت</button>
                </div>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakQuick('رَبِّ هَبْ لِي مِنَ الصَّالِحِينَ')">
            <div class="supplication-text">رَبِّ هَبْ لِي مِنَ الصَّالِحِينَ</div>
            <div class="supplication-footer">
                <span class="source-badge">دعاء نبي الله إبراهيم عليه السلام</span>
                <div class="card-actions">
                    <span style="color: #d8b4fe;">التكرار: <span class="counter-value">1</span></span>
                    <button type="button" class="counter-btn" onclick="incrementCount(this)"><i class="fa-solid fa-plus"></i> قريت</button>
                </div>
            </div>
        </div>

        <!-- الأدعية المأثورة -->
        <div class="section-category-title" onmouseenter="speakQuick('الأدعية النبوية والمأثورة')"><i class="fa-solid fa-star-and-crescent"></i> الأدعية النبوية والمأثورة</div>

        <div class="card-box" onmouseenter="speakQuick('اللَّهُمَّ إِنِّى أَعُوذُ بِكَ مِنَ الْعَجْزِ وَالْكَسَلِ')">
            <div class="supplication-text">اللَّهُمَّ إِنِّى أَعُوذُ بِكَ مِنَ الْعَجْزِ وَالْكَسَلِ، وَالْجُبْنِ وَالْهَرَمِ، وَأَعُوذُ بِكَ مِنْ عَذَابِ الْقَبْرِ</div>
            <div class="supplication-footer">
                <span class="source-badge">صحيح البخاري ومسلم</span>
                <div class="card-actions">
                    <span style="color: #d8b4fe;">التكرار: <span class="counter-value">1</span></span>
                    <button type="button" class="counter-btn" onclick="incrementCount(this)"><i class="fa-solid fa-plus"></i> قريت</button>
                </div>
            </div>
        </div>

    </div>

<script>
(function () {
    "use strict";

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        console.error("المتصفح لا يدعم التعرف على الصوت");
        return;
    }

    let recognition = null;
    let started = false;
    let firstStarted = false;
    let isSpeaking = false;

    // ==========================================
    // نظام استقبال الأوامر من السكريبتات الأخرى
    // ==========================================
    const handlers = [];

    function addHandler(handler) {
        if (typeof handler === "function") {
            handlers.push(handler);
        }
    }

    // ==========================================
    // توحيد الكلام العربي
    // ==========================================
    function normalize(text) {
        return String(text || "")
            .toLowerCase()
            .trim()
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .replace(/[إأآا]/g, "ا")
            .replace(/ة/g, "ه")
            .replace(/ى/g, "ي")
            .replace(/ؤ/g, "و")
            .replace(/ئ/g, "ي");
    }

    // ==========================================
    // إنشاء الميكروفون
    // ==========================================
    function createRecognition() {

        recognition = new SpeechRecognition();

        recognition.lang = "ar-EG";
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.maxAlternatives = 5;

        recognition.onstart = function () {
            console.log("🎙️ مبصر يستمع الآن...");
        };

        recognition.onresult = function (event) {

            if (isSpeaking) return;

            const text =
                event.results[0][0].transcript.trim();

            console.log("🎙️ مبصر سمع:", text);

            // أولاً: إرسال الكلام إلى أوامر الصفحات
            // والأدعية وغيرها
            for (const handler of handlers) {

                try {

                    if (handler(text) === true) {
                        return;
                    }

                } catch (error) {

                    console.error(
                        "خطأ داخل أمر صوتي:",
                        error
                    );

                }
            }

            // ======================================
            // أوامر عامة
            // ======================================

            const command = normalize(text);

            if (
                command.includes("السلام عليكم") ||
                command.includes("سلام عليكم")
            ) {

                speak(
                    "وعليكم السلام ورحمة الله وبركاته."
                );

                return;
            }
        };

        recognition.onend = function () {

            console.log("🎙️ انتهى الاستماع");

            if (started && !isSpeaking) {

                setTimeout(
                    startListening,
                    500
                );

            }
        };

        recognition.onerror = function (event) {

            console.log(
                "🎙️ خطأ:",
                event.error
            );

            if (
                started &&
                !isSpeaking &&
                event.error !== "not-allowed" &&
                event.error !== "service-not-allowed"
            ) {

                setTimeout(
                    startListening,
                    1000
                );

            }
        };
    }

    // ==========================================
    // تشغيل الميكروفون
    // ==========================================
    function startListening() {

        if (!recognition) {
            createRecognition();
        }

        if (!started) return;
        if (isSpeaking) return;

        try {

            recognition.start();

            console.log(
                "🎙️ تشغيل الميكروفون"
            );

        } catch (e) {

            console.log(
                "🎙️ الميكروفون يعمل بالفعل"
            );

        }
    }

    // ==========================================
    // الكلام
    // ==========================================
    function speak(text) {

        if (!text) return;

        isSpeaking = true;

        if (recognition) {

            try {
                recognition.stop();
            } catch (e) {}

        }

        window.speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.9;
        utterance.pitch = 1;

        utterance.onstart = function () {

            console.log(
                "🔊 مبصر يتحدث..."
            );

        };

        utterance.onend = function () {

            isSpeaking = false;

            console.log(
                "🔊 انتهى الكلام"
            );

            if (started) {

                setTimeout(
                    startListening,
                    500
                );

            }
        };

        window.speechSynthesis.speak(
            utterance
        );
    }

    // ==========================================
    // أول ضغطة في الصفحة
    // ==========================================
    document.addEventListener(
        "click",
        function () {

            if (firstStarted) return;

            firstStarted = true;
            started = true;

            speak(
                "السلام عليكم ورحمة الله وبركاته. " +
                "مرحبا بك في الصفحة الإدارية. " +
                "مبصر معك، ويمكنك الآن التحدث بالأوامر الصوتية."
            );

        },
        true
    );

    // ==========================================
    // الواجهة العامة
    // ==========================================
    window.MobsarVoiceCore = {

        speak: speak,

        normalize: normalize,

        addHandler: addHandler,

        start: function () {

            started = true;

            startListening();

        },

        stop: function () {

            started = false;
            isSpeaking = false;

            if (recognition) {

                try {
                    recognition.stop();
                } catch (e) {}

            }

            window.speechSynthesis.cancel();

        },

        isSpeaking: function () {

            return isSpeaking;

        }

    };

    console.log(
        "✅ مبصر الصوتي جاهز + نظام الأوامر جاهز"
    );

})();
</script>

<script>
(function () {
    "use strict";

    if (!window.MobsarVoiceCore) {
        console.error("❌ الجزء الأول من مبصر غير موجود");
        return;
    }

    if (typeof MobsarVoiceCore.addHandler !== "function") {
        console.error("❌ الجزء الأول لا يحتوي على addHandler");
        return;
    }

    // ==================================================
    // الحالة الحالية
    // ==================================================

    let selectedSection = null;

    let cards = [];
    let currentIndex = 0;

    let groups = [];
    let currentGroupIndex = 0;

    let waitingForAnswer = false;
    let questionStarted = false;

    // ==================================================
    // أسماء الأقسام الرئيسية
    // ==================================================

    const mainSections = [
        {
            index: 0,
            name: "أدعية القرآن الكريم"
        },
        {
            index: 1,
            name: "أدعية الأنبياء والمرسلين"
        },
        {
            index: 2,
            name: "الأدعية النبوية والمأثورة"
        }
    ];

    // ==================================================
    // CSS
    // ==================================================

    const style = document.createElement("style");

    style.textContent = `

        .mobsar-current-duaa {
            background: rgba(255, 215, 0, 0.90) !important;
            border: 2px solid #ffd700 !important;
            box-shadow:
                0 0 30px rgba(255, 215, 0, 0.70) !important;

            transform: scale(1.02);

            position: relative;
            z-index: 50;

            transition: all 0.4s ease;
        }

        .mobsar-read-duaa {
            background:
                rgba(76, 175, 80, 0.28) !important;

            border:
                2px solid rgba(76, 175, 80, 0.40) !important;

            opacity: 0.65;

            transition: all 0.4s ease;
        }

        .mobsar-other-duaa {
            opacity: 0.08 !important;
            filter: blur(0.2px);
            transition: all 0.4s ease;
        }

    `;

    document.head.appendChild(style);

    // ==================================================
    // جلب عناوين الأقسام من الصفحة
    // ==================================================

    function getSectionTitles() {

        return Array.from(
            document.querySelectorAll(
                ".section-category-title"
            )
        );

    }

    // ==================================================
    // جلب البطاقات الموجودة تحت قسم معين
    // ==================================================

    function getCardsForSection(sectionIndex) {

        const titles =
            getSectionTitles();

        const title =
            titles[sectionIndex];

        if (!title) {
            return [];
        }

        const result = [];

        let element =
            title.nextElementSibling;

        while (element) {

            if (
                element.classList &&
                element.classList.contains(
                    "section-category-title"
                )
            ) {
                break;
            }

            if (
                element.classList &&
                element.classList.contains(
                    "card-box"
                )
            ) {
                result.push(element);
            }

            element =
                element.nextElementSibling;
        }

        return result;
    }

    // ==================================================
    // الحصول على اسم الجزء من البطاقة
    // ==================================================

    function getPartName(card) {

        const source =
            card.querySelector(
                ".source-badge"
            );

        if (source) {

            return source.textContent
                .trim();

        }

        return "هذا الجزء";
    }

    // ==================================================
    // تقسيم بطاقات القسم إلى أجزاء
    //
    // مثال:
    //
    // سورة البقرة
    // سورة البقرة
    // سورة آل عمران
    //
    // تصبح:
    //
    // الجزء 1 = سورة البقرة
    // الجزء 2 = سورة آل عمران
    // ==================================================

    function buildGroups(sectionCards) {

        const result = [];

        let currentGroup = null;

        sectionCards.forEach(function (card) {

            const name =
                getPartName(card);

            if (
                !currentGroup ||
                currentGroup.name !== name
            ) {

                currentGroup = {
                    name: name,
                    cards: []
                };

                result.push(
                    currentGroup
                );
            }

            currentGroup.cards.push(
                card
            );

        });

        return result;
    }

    // ==================================================
    // تجهيز شكل الصفحة
    // ==================================================

    function prepareVisuals() {

        document
            .querySelectorAll(".card-box")
            .forEach(function (card) {

                card.classList.remove(
                    "mobsar-current-duaa",
                    "mobsar-read-duaa",
                    "mobsar-other-duaa"
                );

            });

        cards.forEach(function (card, index) {

            if (index !== currentIndex) {

                card.classList.add(
                    "mobsar-other-duaa"
                );

            }

        });

    }

    // ==================================================
    // اختيار القسم الرئيسي
    // ==================================================

    function chooseMainSection(index) {

        const sectionCards =
            getCardsForSection(index);

        if (!sectionCards.length) {

            MobsarVoiceCore.speak(
                "عذرًا، لا توجد أدعية موجودة في هذا القسم."
            );

            return;
        }

        selectedSection = index;

        groups =
            buildGroups(sectionCards);

        currentGroupIndex = 0;

        cards =
            groups[0].cards;

        currentIndex = 0;

        waitingForAnswer = false;

        prepareVisuals();

        MobsarVoiceCore.speak(
            "تم اختيار " +
            mainSections[index].name +
            ". يوجد في هذا القسم " +
            groups.length +
            " أجزاء."
        );

        setTimeout(function () {

            readCurrentDuaa();

        }, 2200);
    }

    // ==================================================
    // قراءة الدعاء الحالي
    // ==================================================

    function readCurrentDuaa() {

        if (
            !cards.length ||
            currentIndex >= cards.length
        ) {

            finishCurrentGroup();

            return;
        }

        const card =
            cards[currentIndex];

        const textElement =
            card.querySelector(
                ".supplication-text"
            );

        if (!textElement) {

            currentIndex++;

            readCurrentDuaa();

            return;
        }

        const duaa =
            textElement.textContent
                .trim();

        // إزالة الحالة من كل البطاقات
        cards.forEach(function (item) {

            item.classList.remove(
                "mobsar-current-duaa"
            );

        });

        // البطاقات السابقة = مقروءة
        cards.forEach(function (item, index) {

            if (index < currentIndex) {

                item.classList.add(
                    "mobsar-read-duaa"
                );

            }

        });

        // الحالية فقط = أصفر
        card.classList.remove(
            "mobsar-other-duaa"
        );

        card.classList.add(
            "mobsar-current-duaa"
        );

        // ==================================================
        // رفع الدعاء لأعلى الشاشة
        // ==================================================

        card.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

        waitingForAnswer = false;

        // ==================================================
        // قراءة الدعاء
        // ==================================================

        MobsarVoiceCore.speak(
            duaa
        );

        // بعد انتهاء القراءة نسأل
        waitForSpeechEnd(function () {

            waitingForAnswer = true;

            MobsarVoiceCore.speak(
                "هل قرأتِ؟ قولي نعم أو قرأت، أو قولي لا أو عيد."
            );

        });

    }

    // ==================================================
    // انتظار انتهاء الكلام
    // ==================================================

    function waitForSpeechEnd(callback) {

        const timer =
            setInterval(function () {

                if (
                    !MobsarVoiceCore.isSpeaking()
                ) {

                    clearInterval(timer);

                    setTimeout(
                        callback,
                        500
                    );

                }

            }, 250);

    }

    // ==================================================
    // نعم / قرأت
    // ==================================================

    function markAsRead() {

        if (!waitingForAnswer) {
            return;
        }

        const card =
            cards[currentIndex];

        if (card) {

            card.classList.remove(
                "mobsar-current-duaa",
                "mobsar-other-duaa"
            );

            card.classList.add(
                "mobsar-read-duaa"
            );

        }

        currentIndex++;

        waitingForAnswer = false;

        // ==================================================
        // يوجد دعاء آخر في نفس الجزء
        // ==================================================

        if (
            currentIndex < cards.length
        ) {

            setTimeout(function () {

                readCurrentDuaa();

            }, 500);

            return;
        }

        // ==================================================
        // انتهى الجزء بالكامل
        // ==================================================

        finishCurrentGroup();

    }

    // ==================================================
    // إنهاء جزء
    // ==================================================

    function finishCurrentGroup() {

        waitingForAnswer = false;

        MobsarVoiceCore.speak(
            "بارك الله فيك."
        );

        currentGroupIndex++;

        // ==================================================
        // يوجد جزء آخر في نفس القسم
        // ==================================================

        if (
            currentGroupIndex < groups.length
        ) {

            setTimeout(function () {

                cards =
                    groups[
                        currentGroupIndex
                    ].cards;

                currentIndex = 0;

                prepareVisuals();

                MobsarVoiceCore.speak(
                    "ننتقل الآن إلى " +
                    groups[
                        currentGroupIndex
                    ].name
                );

                waitForSpeechEnd(
                    function () {

                        readCurrentDuaa();

                    }
                );

            }, 1800);

            return;
        }

        // ==================================================
        // انتهى القسم كله
        // ==================================================

        setTimeout(function () {

            MobsarVoiceCore.speak(
                "انتهت جميع الأدعية في " +
                mainSections[
                    selectedSection
                ].name +
                ". بارك الله فيك."
            );

            cards = [];
            groups = [];

            currentIndex = 0;
            currentGroupIndex = 0;

            selectedSection = null;

        }, 1200);

    }

    // ==================================================
    // إعادة الدعاء
    // ==================================================

    function repeatCurrent() {

        if (!waitingForAnswer) {
            return;
        }

        waitingForAnswer = false;

        readCurrentDuaa();

    }

    // ==================================================
    // معرفة الأدعية والأجزاء الموجودة
    // ==================================================

    function tellAvailableDuaa() {

        let answer =
            "الأقسام الموجودة هي: ";

        answer +=
            "أدعية القرآن الكريم، " +
            "وأدعية الأنبياء والمرسلين، " +
            "والأدعية النبوية والمأثورة.";

        // ------------------------------------------
        // إضافة أجزاء القرآن الموجودة فعلًا
        // ------------------------------------------

        const quranCards =
            getCardsForSection(0);

        if (quranCards.length) {

            const quranGroups =
                buildGroups(quranCards);

            answer +=
                " وفي أدعية القرآن الكريم يوجد: ";

            quranGroups.forEach(
                function (group, index) {

                    if (index > 0) {
                        answer += "، ";
                    }

                    answer += group.name;

                }
            );

            answer += ".";
        }

        MobsarVoiceCore.speak(
            answer
        );

    }

    // ==================================================
    // سؤال الأقسام في البداية
    // ==================================================

    function askForSection() {

        if (questionStarted) {
            return;
        }

        questionStarted = true;

        MobsarVoiceCore.speak(
            "هل تريدين قراءة أدعية القرآن الكريم، " +
            "أم أدعية الأنبياء والمرسلين، " +
            "أم الأدعية النبوية والمأثورة؟"
        );

    }

    // ==================================================
    // الأوامر الصوتية
    // ==================================================

    MobsarVoiceCore.addHandler(
        function (originalText) {

            const command =
                MobsarVoiceCore.normalize(
                    originalText
                );

            console.log(
                "📖 أمر الأدعية:",
                command
            );

            // ------------------------------------------
            // ما الأدعية الموجودة؟
            // ------------------------------------------

            if (
                command.includes(
                    "ايه الادعيه الموجوده"
                ) ||
                command.includes(
                    "ما الادعيه الموجوده"
                ) ||
                command.includes(
                    "الادعيه الموجوده"
                ) ||
                command.includes(
                    "ايه الموجود"
                ) ||
                command.includes(
                    "الموجود ايه"
                )
            ) {

                tellAvailableDuaa();

                return true;
            }

            // ------------------------------------------
            // أدعية القرآن
            // ------------------------------------------

            if (
                command.includes("قران") ||
                command.includes("قراني") ||
                command.includes(
                    "ادعيه القران"
                ) ||
                command.includes(
                    "دعاء القران"
                )
            ) {

                chooseMainSection(0);

                return true;
            }

            // ------------------------------------------
            // أدعية الأنبياء والمرسلين
            // ------------------------------------------

            if (
                command.includes("انبياء") ||
                command.includes("المرسلين") ||
                command.includes(
                    "ادعيه الانبياء"
                ) ||
                command.includes(
                    "دعاء الانبياء"
                )
            ) {

                chooseMainSection(1);

                return true;
            }

            // ------------------------------------------
            // الأدعية النبوية والمأثورة
            // ------------------------------------------

            if (
                command.includes("نبويه") ||
                command.includes("ماثوره") ||
                command.includes("ماثوره")
            ) {

                chooseMainSection(2);

                return true;
            }

            // ------------------------------------------
            // نعم / قرأت / قريت
            // ------------------------------------------

            if (
                command === "نعم" ||
                command.includes("قرات") ||
                command.includes("قريت") ||
                command.includes("خلصت")
            ) {

                markAsRead();

                return true;
            }

            // ------------------------------------------
            // لا / عيد
            // ------------------------------------------

            if (
                command === "لا" ||
                command.includes("عيد") ||
                command.includes("اعيد") ||
                command.includes("اعد")
            ) {

                repeatCurrent();

                return true;
            }

            return false;

        }
    );

    // ==================================================
    // تشغيل سؤال الأقسام بعد انتهاء ترحيب الجزء الأول
    // ==================================================

    const starter =
        setInterval(function () {

            if (
                window.MobsarVoiceCore &&
                !MobsarVoiceCore.isSpeaking()
            ) {

                clearInterval(starter);

                setTimeout(
                    askForSection,
                    700
                );

            }

        }, 300);

    console.log(
        "✅ الجزء الثاني: قارئ الأدعية + الأقسام + الأجزاء جاهز"
    );

})();
</script>








<script>
(function () {
    "use strict";

    if (!window.MobsarVoiceCore) {
        console.error("❌ الجزء الأول من مبصر غير موجود");
        return;
    }

    if (typeof MobsarVoiceCore.addHandler !== "function") {
        console.error("❌ الجزء الأول لا يحتوي على addHandler");
        return;
    }

    // ==================================================
    // صفحات مبصر
    // ==================================================

    const pages = [

        {
            file: "index.php",
            names: [
                "الرئيسية",
                "الصفحه الرئيسيه",
                "الصفحة الرئيسية",
                "الصفحه الاساسيه",
                "الصفحة الاساسية"
            ]
        },

        {
            file: "tasks.php",
            names: [
                "المهام",
                "صفحه المهام",
                "صفحة المهام",
                "افتح المهام",
                "اذهب للمهام"
            ]
        },

        {
            file: "register.php",
            names: [
                "التسجيل",
                "التسجيل",
                "صفحه التسجيل",
                "صفحة التسجيل",
                "افتح التسجيل"
            ]
        },

        {
            file: "team.php",
            names: [
                "الروحانيات",
                "روحانيات",
                "صفحه الروحانيات",
                "صفحة الروحانيات",
                "افتح الروحانيات"
            ]
        },

        {
            file: "Prophets.php",
            names: [
                "الانبياء",
                "الأنبياء",
                "صفحه الانبياء",
                "صفحة الأنبياء",
                "افتح الانبياء"
            ]
        },

        {
            file: "Duaa.php",
            names: [
                "الادعيه",
                "الأدعية",
                "الدعاء",
                "صفحه الادعيه",
                "صفحة الأدعية",
                "افتح الادعيه"
            ]
        },

        {
            file: "Quran.php",
            names: [
                "القران",
                "القرآن",
                "صفحه القران",
                "صفحة القرآن",
                "افتح القران"
            ]
        },

        {
            file: "Hadith.php",
            names: [
                "الاحاديث",
                "الأحاديث",
                "الحديث",
                "صفحه الاحاديث",
                "صفحة الأحاديث",
                "افتح الاحاديث"
            ]
        },

        {
            file: "Prayer.php",
            names: [
                "الصلاه",
                "الصلاة",
                "مواعيد الصلاة",
                "المواعيد",
                "صفحه الصلاة",
                "افتح الصلاة"
            ]
        },

        {
            file: "excel.php",
            names: [
                "اكسل",
                "الإكسل",
                "ملفات اكسل",
                "صفحه اكسل",
                "افتح اكسل"
            ]
        },

        {
            file: "word.php",
            names: [
                "وورد",
                "ملفات وورد",
                "صفحه وورد",
                "افتح وورد"
            ]
        },

        {
            file: "powerpoint.php",
            names: [
                "باوربوينت",
                "الباوربوينت",
                "ملفات باوربوينت",
                "صفحه باوربوينت",
                "افتح باوربوينت"
            ]
        },

        {
            file: "mosa.php",
            names: [
                "موسى",
                "مبصر موسى",
                "صفحه موسى",
                "افتح موسى"
            ]
        },

        {
            file: "communication.php",
            names: [
                "التواصل",
                "صفحه التواصل",
                "صفحة التواصل",
                "الاتصال",
                "افتح التواصل"
            ]
        }

    ];

    // ==================================================
    // معرفة الصفحة الحالية
    // ==================================================

    function getCurrentPage() {

        const currentFile =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        for (let i = 0; i < pages.length; i++) {

            if (
                pages[i].file.toLowerCase()
                === currentFile
            ) {
                return pages[i];
            }

        }

        return null;
    }

    // ==================================================
    // الذهاب إلى صفحة
    // ==================================================

    function goToPage(page) {

        if (!page) return;

        const current =
            getCurrentPage();

        if (
            current &&
            current.file.toLowerCase()
            === page.file.toLowerCase()
        ) {

            MobsarVoiceCore.speak(
                "أنتِ بالفعل في " +
                page.names[0]
            );

            return;
        }

        MobsarVoiceCore.speak(
            "جاري الانتقال إلى " +
            page.names[0]
        );

        setTimeout(function () {

            window.location.href =
                page.file;

        }, 1200);
    }

    // ==================================================
    // البحث عن الصفحة من الأمر
    // ==================================================

    function findPage(command) {

        for (const page of pages) {

            for (const name of page.names) {

                const normalizedName =
                    MobsarVoiceCore.normalize(
                        name
                    );

                if (
                    command.includes(
                        normalizedName
                    )
                ) {

                    return page;

                }

            }

        }

        return null;
    }

    // ==================================================
    // قول اسم الصفحة الحالية
    // ==================================================

    function tellCurrentPage() {

        const current =
            getCurrentPage();

        if (!current) {

            MobsarVoiceCore.speak(
                "لا أستطيع تحديد الصفحة الحالية."
            );

            return;
        }

        MobsarVoiceCore.speak(
            "أنتِ الآن في " +
            current.names[0]
        );
    }

    // ==================================================
    // عرض الصفحات المتاحة صوتيًا
    // ==================================================

    function tellAvailablePages() {

        MobsarVoiceCore.speak(
            "الصفحات المتاحة هي: " +
            "الرئيسية، المهام، التسجيل، " +
            "الروحانيات، الأنبياء، الأدعية، " +
            "القرآن، الأحاديث، الصلاة، " +
            "التواصل، وملفات إكسل ووورد وباوربوينت."
        );

    }

    // ==================================================
    // الأوامر الصوتية
    // ==================================================

    MobsarVoiceCore.addHandler(
        function (originalText) {

            const command =
                MobsarVoiceCore.normalize(
                    originalText
                );

            console.log(
                "🧭 أمر التنقل:",
                command
            );

            // ------------------------------------------
            // أنا فين؟
            // ------------------------------------------

            if (
                command.includes(
                    "انا فين"
                ) ||
                command.includes(
                    "انا في اي صفحه"
                ) ||
                command.includes(
                    "الصفحه اللي انا فيها"
                ) ||
                command.includes(
                    "ايه الصفحه"
                )
            ) {

                tellCurrentPage();

                return true;
            }

            // ------------------------------------------
            // الصفحات المتاحة
            // ------------------------------------------

            if (
                command.includes(
                    "الصفحات المتاحه"
                ) ||
                command.includes(
                    "ايه الصفحات"
                ) ||
                command.includes(
                    "الصفحات الموجوده"
                ) ||
                command.includes(
                    "الصفحات"
                )
            ) {

                tellAvailablePages();

                return true;
            }

            // ------------------------------------------
            // الرئيسية
            // ------------------------------------------

            if (
                command.includes(
                    "الصفحه الرئيسيه"
                ) ||
                command.includes(
                    "الرئيسيه"
                ) ||
                command.includes(
                    "الرئيسيه"
                )
            ) {

                goToPage(
                    pages[0]
                );

                return true;
            }

            // ------------------------------------------
            // البحث عن صفحة
            // ------------------------------------------

            const page =
                findPage(command);

            if (page) {

                goToPage(page);

                return true;
            }

            return false;

        }
    );

    console.log(
        "✅ الجزء الثالث: التنقل بين صفحات مبصر جاهز"
    );

})();
</script>


</body>
</html>