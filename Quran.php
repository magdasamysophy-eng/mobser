
<?php

if (isset($_GET['quran_audio'])) {

    $audioUrl = 'https://cdn.islamic.network/quran/audio-surah/192/ar.abdulbasit/1.mp3';

    $ch = curl_init($audioUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

    $audioData = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

    curl_close($ch);

    if ($audioData === false || $httpCode < 200 || $httpCode >= 300) {
        http_response_code(502);
        exit('تعذر جلب ملف التلاوة');
    }

    header('Content-Type: ' . ($contentType ?: 'audio/mpeg'));
    header('Content-Length: ' . strlen($audioData));

    echo $audioData;
    exit;
}

?>
<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>مبصر | المصحف الشريف</title>

</head>

<body>

<div class="quran-page">

    <!-- ==============================
         HEADER
    =============================== -->

    <header class="quran-header">

        <a href="team.php" class="home-btn">
            ⟵ العودة للروحانيات
        </a>

        <div class="brand">

            <div class="brand-eye">
                ◉
            </div>

            <div class="brand-name">
                MABSAR
            </div>

        </div>

        <div class="header-title">

            <span class="small-title">
                مبصر
            </span>

            <h1>
                المصحف الشريف
            </h1>

            <p>
                القرآن الكريم بالرسم العثماني
            </p>

        </div>

    </header>


    <main class="quran-container">
        <!-- ==============================
             SEARCH
        =============================== -->

        <section class="search-section">

            <div class="section-title">

                <div class="title-icon">
                    🔎
                </div>

                <div>

                    <h2>
                        البحث في القرآن الكريم
                    </h2>

                    <p>
                        ابحث باسم السورة أو رقمها
                    </p>

                </div>

            </div>


            <div class="search-box">

                <input
                    type="text"
                    id="quranSearch"
                    placeholder="اكتب اسم السورة أو رقمها..."
                >

                <button type="button">
                    بحث
                </button>

            </div>

        </section>


        <!-- ==============================
             SURAH LIST
        =============================== -->

        <section class="surah-section">

            <div class="section-heading">

                <div>

                    <span>
                        فهرس القرآن الكريم
                    </span>

                    <h2>
                        سور القرآن الكريم
                    </h2>

                </div>

                <div class="surah-count">
                    114 سورة
                </div>

            </div>


            <div class="surah-grid">
<!-- سورة الفاتحة -->

                <button class="surah-card active">

                    <span class="surah-number">
                        1
                    </span>

                    <span class="surah-content">

                        <strong>
                            الفاتحة
                        </strong>

                        <small>
                            مكية • 7 آيات
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


                <!-- سورة البقرة -->

                <button class="surah-card">

                    <span class="surah-number">
                        2
                    </span>

                    <span class="surah-content">

                        <strong>
                            البقرة
                        </strong>

                        <small>
                            مدنية • 286 آية
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


                <!-- آل عمران -->

                <button class="surah-card">

                    <span class="surah-number">
                        3
                    </span>

                    <span class="surah-content">

                        <strong>
                            آل عمران
                        </strong>

                        <small>
                            مدنية • 200 آية
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


                <!-- النساء -->

                <button class="surah-card">

                    <span class="surah-number">
                        4
                    </span>

                    <span class="surah-content">

                        <strong>
                            النساء
                        </strong>

                        <small>
                            مدنية • 176 آية
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


                <!-- المائدة -->

                <button class="surah-card">

                    <span class="surah-number">
                        5
                    </span>

                    <span class="surah-content">

                        <strong>
                            المائدة
                        </strong>

                        <small>
                            مدنية • 120 آية
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


                <!-- الأنعام -->

                <button class="surah-card">

                    <span class="surah-number">
                        6
                    </span>

                    <span class="surah-content">

                        <strong>
                            الأنعام
                        </strong>

                        <small>
                            مكية • 165 آية
                        </small>

                    </span>

                    <span class="surah-arrow">
                        ←
                    </span>

                </button>


            </div>

        </section>

        <!-- ==============================
             MUSHAF
        =============================== -->

        <section class="mushaf-area">


            <!-- معلومات السورة -->

            <div class="surah-info-bar">

                <div class="surah-main-info">

                    <span class="surah-label">
                        السورة الحالية
                    </span>

                    <h2>
                        سورة الفاتحة
                    </h2>

                    <div class="surah-meta">

                        <span>
                            رقم السورة: 1
                        </span>

                        <span>
                            مكية
                        </span>

                        <span>
                            7 آيات
                        </span>

                    </div>

                </div>


                <div class="surah-decoration">

                    <span>
                        ✦
                    </span>

                    <strong>
                        بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                    </strong>

                    <span>
                        ✦
                    </span>

                </div>

            </div>


            <!-- صفحة المصحف -->

            <div class="mushaf-card">

                <div class="mushaf-top-decoration">
                    ۞
                </div>


                <div class="mushaf-page">

                    <div class="page-border">


                        <div class="page-header">

                            <span>
                                سُورَةُ الْفَاتِحَةِ
                            </span>

                            <span>
                                مَكِّيَّة
                            </span>

                        </div>


                        <div class="quran-text">

                            <p>

                                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                                <span class="ayah-number">﴿١﴾</span>

                                الْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ
                                <span class="ayah-number">﴿٢﴾</span>

                                الرَّحْمَٰنِ الرَّحِيمِ
                                <span class="ayah-number">﴿٣﴾</span>

                                مَالِكِ يَوْمِ الدِّينِ
                                <span class="ayah-number">﴿٤﴾</span>

                                إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ
                                <span class="ayah-number">﴿٥﴾</span>

                                اهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ
                                <span class="ayah-number">﴿٦﴾</span>

                                صِرَاطَ الَّذِينَ أَنْعَمْتَ عَلَيْهِمْ
                                غَيْرِ الْمَغْضُوبِ عَلَيْهِمْ
                                وَلَا الضَّالِّينَ
                                <span class="ayah-number">﴿٧﴾</span>

                            </p>

                        </div>


                        <div class="page-number">
                            ١
                        </div>


                    </div>

                </div>


                <div class="mushaf-bottom-decoration">
                    ۞
                </div>

            </div>
            <!-- ==============================
                 NAVIGATION
            =============================== -->

            <div class="mushaf-navigation">

                <button class="nav-btn">
                    → السورة السابقة
                </button>

                <div class="page-indicator">

                    <span>
                        الصفحة
                    </span>

                    <strong>
                        ١
                    </strong>

                    <span>
                        من ٦٠٤
                    </span>

                </div>

                <button class="nav-btn">
                    السورة التالية ←
                </button>

            </div>

        </section>

        <!-- ==============================
             QURAN INFORMATION
        =============================== -->

        <section class="quran-information">


            <div class="info-tabs">

                <button class="info-tab active">
                    التفسير
                </button>

                <button class="info-tab">
                    معاني الآيات
                </button>

                <button class="info-tab">
                    معلومات السورة
                </button>

            </div>


            <!-- ==========================
                 TAFSIR
            =========================== -->

            <div class="info-panel">

                <div class="panel-icon">
                    📖
                </div>

                <div class="panel-content">

                    <span class="panel-label">
                        تفسير القرآن الكريم
                    </span>

                    <h2>
                        تفسير سورة الفاتحة
                    </h2>

                    <div class="verse-box">


<div class="tafsir-controls">

    <button type="button" id="previousTafsirAyah">
        الآية السابقة
    </button>

    <select id="tafsirAyahSelector">
        <option value="1">الآية 1</option>
    </select>

    <button type="button" id="nextTafsirAyah">
        الآية التالية
    </button>

    <button type="button" id="fullSurahTafsir">
        تفسير السورة كاملة
    </button>

</div>

                        <div class="verse-title">
                            الآية الأولى
                        </div>

                        <p class="verse-text">
                            بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                        </p>

                    </div>

                    <div class="tafsir-text">

                        <h3>
                            التفسير
                        </h3>

                        <p>
                            يُعرض هنا تفسير الآية من مصدر التفسير
                            المعتمد الذي سيتم ربطه بالصفحة.
                        </p>

                    </div>

                </div>

            </div>


            <!-- ==========================
                 MEANINGS
            =========================== -->

            <div class="info-panel">

                <div class="panel-icon">
                    💡
                </div>

                <div class="panel-content">

                    <span class="panel-label">
                        معاني الآيات
                    </span>

                    <h2>
                        معنى الآية
                    </h2>

                    <div class="meaning-box">

                        <p>
                            سيتم عرض معنى الآية بصورة واضحة
                            ومبسطة من المصدر المعتمد.
                        </p>

                    </div>

                </div>

            </div>


            <!-- ==========================
                 SURAH INFORMATION
            =========================== -->

            <div class="surah-details">

                <div class="detail-title">

                    <span>
                        ✦
                    </span>

                    <h2>
                        معلومات السورة
                    </h2>

                </div>


                <div class="details-grid">


                    <div class="detail-card">

                        <span>
                            اسم السورة
                        </span>

                        <strong>
                            الفاتحة
                        </strong>

                    </div>


                    <div class="detail-card">

                        <span>
                            ترتيب السورة
                        </span>

                        <strong>
                            1
                        </strong>

                    </div>


                    <div class="detail-card">

                        <span>
                            عدد الآيات
                        </span>

                        <strong>
                            7
                        </strong>

                    </div>


                    <div class="detail-card">

                        <span>
                            نوع السورة
                        </span>

                        <strong>
                            مكية
                        </strong>

                    </div>


                    <div class="detail-card">

                        <span>
                            عدد الكلمات
                        </span>

                        <strong>
                            29
                        </strong>

                    </div>


                    <div class="detail-card">

                        <span>
                            عدد الحروف
                        </span>

                        <strong>
                            139
                        </strong>

                    </div>


                </div>


                <div class="revelation-box">

                    <h3>
                        معلومات النزول
                    </h3>

                    <p>
                        سيتم عرض معلومات النزول المعتمدة
                        من مصدر موثوق عند ربط بيانات السورة.
                    </p>

                </div>

            </div>

        </section>
        <!-- ==============================
             RECITATION
        =============================== -->

        <section class="recitation-section">

            <div class="recitation-header">

                <div class="recitation-icon">
                    ▶
                </div>

                <div>

                    <span>
                        التلاوة
                    </span>

                    <h2>
                        سورة الفاتحة
                    </h2>

                </div>

            </div>


            <div class="recitation-player">


                <button class="play-button"
                        type="button"
                        aria-label="تشغيل التلاوة">

                    ▶

                </button>


                <div class="audio-information">

                    <strong>
                        عبد الباسط عبد الصمد
                    </strong>

                    <span>
                        تلاوة القرآن الكريم
                    </span>

                </div>


                <div class="audio-progress">

                    <div class="progress-line">

                        <span></span>

                    </div>

                    <div class="audio-time">

                        <span>
                            00:00
                        </span>

                        <span>
                            00:00
                        </span>

                    </div>

                </div>


                <button class="volume-button"
                        type="button"
                        aria-label="الصوت">

                    🔊

                </button>


            </div>

        </section>
        <!-- ==============================
             ACCESSIBILITY
        =============================== -->

        <section class="accessibility-section">

            <div class="accessibility-card">

                <div class="accessibility-icon">
                    ♿
                </div>

                <div>

                    <h3>
                        المصحف مناسب للمستخدم الكفيف
                    </h3>

                    <p>
                        يمكن التحكم في المصحف باستخدام
                        الأزرار والأوامر الصوتية.
                    </p>

                </div>

            </div>

        </section>


    </main>


    <!-- ==============================
         FOOTER
    =============================== -->

    <footer class="quran-footer">

        <div class="footer-logo">
            MABSAR
        </div>

        <p>
            المصحف الشريف
        </p>

        <span>
            مبصر — تسهيل الوصول إلى القرآن الكريم
        </span>

    </footer>


</div>


<!-- ==================================================
     CSS يبدأ هنا
================================================== -->

<style>

    /* =====================================================
   MABSAR — QURAN PAGE
   CSS PART 9
===================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    direction: rtl;

    font-family:
        Tahoma,
        Arial,
        sans-serif;

    min-height: 100vh;

    background:
        radial-gradient(
            circle at 85% 10%,
            rgba(106, 53, 150, 0.35),
            transparent 32%
        ),
        radial-gradient(
            circle at 10% 85%,
            rgba(202, 166, 255, 0.12),
            transparent 30%
        ),
        #07050a;

    color: #ffffff;
}


/* =====================================================
   PAGE
===================================================== */

.quran-page {
    width: 100%;
    min-height: 100vh;
    overflow: hidden;
}


/* =====================================================
   HEADER
===================================================== */

.quran-header {

    min-height: 175px;

    padding: 30px 5%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(53, 18, 77, 0.96),
            rgba(17, 8, 25, 0.98)
        );

    border-bottom:
        1px solid
        rgba(202, 166, 255, 0.18);

    box-shadow:
        0 15px 50px
        rgba(0, 0, 0, 0.45);
}


/* =====================================================
   HOME BUTTON
===================================================== */

.home-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 12px 18px;

    border-radius: 12px;

    text-decoration: none;

    color: #f1dc9a;

    background:
        rgba(202, 166, 255, 0.07);

    border:
        1px solid
        rgba(202, 166, 255, 0.25);

    transition: 0.3s ease;

    white-space: nowrap;
}

.home-btn:hover {

    transform: translateY(-3px);

    color: #ffffff;

    background:
        rgba(202, 166, 255, 0.16);

    border-color:
        rgba(241, 220, 154, 0.55);

    box-shadow:
        0 8px 25px
        rgba(202, 166, 255, 0.14);
}


/* =====================================================
   BRAND
===================================================== */

.brand {

    display: flex;

    align-items: center;

    gap: 12px;

    color: #f1dc9a;
}


.brand-eye {

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    border:
        2px solid
        #f1dc9a;

    border-radius: 50%;

    color: #f1dc9a;

    font-size: 21px;

    box-shadow:
        0 0 20px
        rgba(241, 220, 154, 0.20);
}


.brand-name {

    font-size: 22px;

    font-weight: bold;

    letter-spacing: 3px;
}


/* =====================================================
   HEADER TITLE
===================================================== */

.header-title {

    flex: 1;

    text-align: center;
}


.small-title {

    color: #caa6ff;

    font-size: 15px;
}


.header-title h1 {

    margin-top: 6px;

    color: #f1dc9a;

    font-size: 36px;

    text-shadow:
        0 0 22px
        rgba(241, 220, 154, 0.16);
}


.header-title p {

    margin-top: 8px;

    color: #bdb3c6;

    font-size: 14px;
}


/* =====================================================
   MAIN CONTAINER
===================================================== */

.quran-container {

    width: min(1400px, 92%);

    margin: auto;

    padding:
        45px
        0
        80px;
}

/* =====================================================
   SEARCH SECTION
===================================================== */

.search-section {

    margin-bottom: 45px;

    padding: 25px;

    border-radius: 20px;

    background:
        linear-gradient(
            145deg,
            rgba(53, 18, 77, 0.72),
            rgba(18, 9, 27, 0.86)
        );

    border:
        1px solid
        rgba(202, 166, 255, 0.15);

    box-shadow:
        0 15px 45px
        rgba(0, 0, 0, 0.25);
}


.section-title {

    display: flex;

    align-items: center;

    gap: 15px;

    margin-bottom: 20px;
}


.title-icon {

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 14px;

    background:
        rgba(202, 166, 255, 0.10);

    color: #f1dc9a;

    font-size: 21px;
}


.section-title h2 {

    color: #f1dc9a;

    font-size: 21px;
}


.section-title p {

    margin-top: 5px;

    color: #99909f;

    font-size: 13px;
}


/* =====================================================
   SEARCH BOX
===================================================== */

.search-box {

    display: flex;

    gap: 12px;
}


.search-box input {

    flex: 1;

    min-width: 0;

    padding: 15px 18px;

    border-radius: 12px;

    outline: none;

    border:
        1px solid
        rgba(202, 166, 255, 0.18);

    background:
        rgba(0, 0, 0, 0.28);

    color: #ffffff;

    font-size: 15px;
}


.search-box input::placeholder {

    color: #817788;
}


.search-box input:focus {

    border-color:
        rgba(202, 166, 255, 0.60);

    box-shadow:
        0 0 18px
        rgba(202, 166, 255, 0.08);
}


.search-box button {

    min-width: 110px;

    padding: 0 20px;

    border: none;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            #caa6ff,
            #8756b8
        );

    color: #170b22;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
}


.search-box button:hover {

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px
        rgba(202, 166, 255, 0.20);
}


/* =====================================================
   SURAH SECTION
===================================================== */

.surah-section {

    margin-bottom: 55px;
}


.section-heading {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    margin-bottom: 22px;
}


.section-heading > div:first-child span {

    color: #caa6ff;

    font-size: 13px;
}


.section-heading h2 {

    margin-top: 6px;

    color: #f1dc9a;

    font-size: 28px;
}


.surah-count {

    padding: 9px 16px;

    border-radius: 20px;

    color: #f1dc9a;

    background:
        rgba(241, 220, 154, 0.07);

    border:
        1px solid
        rgba(241, 220, 154, 0.18);
}


/* =====================================================
   SURAH GRID
===================================================== */

.surah-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 15px;
}


.surah-card {

    position: relative;

    min-height: 95px;

    padding: 16px;

    display: flex;

    align-items: center;

    gap: 15px;

    border:
        1px solid
        rgba(202, 166, 255, 0.13);

    border-radius: 16px;

    background:
        linear-gradient(
            145deg,
            rgba(43, 19, 59, 0.85),
            rgba(15, 8, 23, 0.93)
        );

    color: #ffffff;

    cursor: pointer;

    text-align: right;

    transition: 0.3s ease;
}


.surah-card:hover {

    transform:
        translateY(-4px);

    border-color:
        rgba(241, 220, 154, 0.45);

    box-shadow:
        0 12px 30px
        rgba(0, 0, 0, 0.35);
}


.surah-card.active {

    border-color:
        rgba(202, 166, 255, 0.75);

    box-shadow:
        0 0 25px
        rgba(202, 166, 255, 0.10);
}


/* =====================================================
   SURAH NUMBER
===================================================== */

.surah-number {

    width: 45px;
    height: 45px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    color: #f1dc9a;

    background:
        rgba(241, 220, 154, 0.05);

    border:
        1px solid
        rgba(241, 220, 154, 0.35);

    font-weight: bold;
}


/* =====================================================
   SURAH CONTENT
===================================================== */

.surah-content {

    flex: 1;
}


.surah-content strong {

    display: block;

    color: #ffffff;

    font-size: 18px;
}


.surah-content small {

    display: block;

    margin-top: 6px;

    color: #918697;

    font-size: 12px;
}


.surah-arrow {

    color: #caa6ff;

    font-size: 18px;
}
/* =====================================================
   MUSHAF AREA
===================================================== */

.mushaf-area {

    margin-top: 55px;
}


/* =====================================================
   SURAH INFO BAR
===================================================== */

.surah-info-bar {

    padding: 25px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    border-radius:
        20px
        20px
        0
        0;

    background:
        linear-gradient(
            135deg,
            rgba(53, 18, 77, 0.92),
            rgba(15, 8, 24, 0.98)
        );

    border:
        1px solid
        rgba(202, 166, 255, 0.16);
}


.surah-label {

    color: #958a9f;

    font-size: 13px;
}


.surah-main-info h2 {

    margin:
        7px
        0
        10px;

    color: #f1dc9a;

    font-size: 28px;
}


.surah-meta {

    display: flex;

    flex-wrap: wrap;

    gap: 8px;
}


.surah-meta span {

    padding: 6px 11px;

    border-radius: 15px;

    background:
        rgba(202, 166, 255, 0.08);

    color: #cfc5d7;

    font-size: 12px;
}


/* =====================================================
   SURAH DECORATION
===================================================== */

.surah-decoration {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 12px;

    color: #f1dc9a;

    font-family:
        "Times New Roman",
        serif;

    font-size: 17px;

    text-align: center;
}


/* =====================================================
   MUSHAF CARD
===================================================== */

.mushaf-card {

    padding: 25px;

    background:
        linear-gradient(
            145deg,
            #24162c,
            #0d080f
        );

    border-left:
        1px solid
        rgba(241, 220, 154, 0.12);

    border-right:
        1px solid
        rgba(241, 220, 154, 0.12);
}


.mushaf-top-decoration,
.mushaf-bottom-decoration {

    padding: 5px;

    text-align: center;

    color: #d8b85e;

    font-size: 27px;
}


/* =====================================================
   MUSHAF PAGE
===================================================== */

.mushaf-page {

    max-width: 900px;

    margin: auto;

    padding: 18px;

    background:
        radial-gradient(
            circle at center,
            rgba(255,255,255,0.35),
            transparent 70%
        ),
        #eee5c9;

    box-shadow:
        0 18px 50px
        rgba(0, 0, 0, 0.45);
}


.page-border {

    position: relative;

    min-height: 700px;

    padding:
        45px
        55px;

    border:
        4px double
        #8c7135;

    outline:
        1px solid
        rgba(140, 113, 53, 0.35);

    outline-offset:
        -12px;

    color: #292018;
}


/* =====================================================
   PAGE HEADER
===================================================== */

.page-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    padding-bottom: 15px;

    margin-bottom: 35px;

    border-bottom:
        1px solid
        rgba(108, 82, 35, 0.35);

    color: #5d4822;

    font-family:
        "Times New Roman",
        serif;

    font-size: 15px;
}


/* =====================================================
   QURAN TEXT
===================================================== */

.quran-text {

    text-align: center;

    font-family:
        "Amiri",
        "Traditional Arabic",
        "Times New Roman",
        serif;

    font-size: 28px;

    line-height: 2.75;

    color: #241d16;
}


.quran-text p {

    margin: 0;
}


/* =====================================================
   AYAH NUMBER
===================================================== */

.ayah-number {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    margin:
        0
        4px;

    color: #795a20;

    font-size: 21px;

    font-family:
        "Times New Roman",
        serif;
}


/* =====================================================
   PAGE NUMBER
===================================================== */

.page-number {

    position: absolute;

    bottom: 22px;

    left: 50%;

    transform:
        translateX(-50%);

    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;

    justify-content: center;

    border:
        1px solid
        #8c7135;

    border-radius: 50%;

    color: #6f5424;

    font-family:
        "Times New Roman",
        serif;
}

/* =====================================================
   MUSHAF NAVIGATION
===================================================== */

.mushaf-navigation {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 18px;

    padding: 20px;

    background:
        rgba(10, 6, 14, 0.96);

    border-radius:
        0
        0
        20px
        20px;
}


.nav-btn {

    padding:
        12px
        20px;

    border:
        1px solid
        rgba(202, 166, 255, 0.20);

    border-radius: 10px;

    background:
        rgba(202, 166, 255, 0.06);

    color: #ddd4e5;

    cursor: pointer;

    transition: 0.3s;
}


.nav-btn:hover {

    transform:
        translateY(-2px);

    color: #f1dc9a;

    border-color:
        rgba(202, 166, 255, 0.60);
}


/* =====================================================
   PAGE INDICATOR
===================================================== */

.page-indicator {

    min-width: 130px;

    padding:
        10px
        15px;

    text-align: center;

    border-radius: 12px;

    background:
        rgba(241, 220, 154, 0.06);

    border:
        1px solid
        rgba(241, 220, 154, 0.16);

    color: #a69aa9;

    font-size: 12px;
}


.page-indicator strong {

    margin:
        0
        5px;

    color: #f1dc9a;

    font-size: 18px;
}


/* =====================================================
   INFORMATION
===================================================== */

.quran-information {

    margin-top: 55px;
}


/* =====================================================
   TABS
===================================================== */

.info-tabs {

    display: flex;

    gap: 10px;

    margin-bottom: 18px;

    overflow-x: auto;
}


.info-tab {

    flex: 1;

    min-width: 150px;

    padding: 15px;

    border:
        1px solid
        rgba(202, 166, 255, 0.15);

    border-radius:
        12px
        12px
        0
        0;

    background:
        rgba(53, 18, 77, 0.55);

    color: #bdb3c6;

    cursor: pointer;

    font-size: 15px;

    transition: 0.3s;
}


.info-tab:hover {

    color: #f1dc9a;
}


.info-tab.active {

    color: #f1dc9a;

    border-color:
        rgba(202, 166, 255, 0.60);

    background:
        rgba(202, 166, 255, 0.12);
}


/* =====================================================
   INFO PANEL
===================================================== */

.info-panel {

    display: flex;

    gap: 20px;

    padding: 26px;

    margin-bottom: 15px;

    border-radius: 18px;

    background:
        linear-gradient(
            145deg,
            rgba(43, 19, 59, 0.82),
            rgba(13, 7, 19, 0.92)
        );

    border:
        1px solid
        rgba(202, 166, 255, 0.13);
}


.panel-icon {

    width: 55px;
    height: 55px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 15px;

    background:
        rgba(241, 220, 154, 0.08);

    font-size: 25px;
}


.panel-content {

    flex: 1;
}


.panel-label {

    color: #a097a7;

    font-size: 12px;
}


.info-panel h2 {

    margin:
        7px
        0
        15px;

    color: #f1dc9a;

    font-size: 22px;
}


.verse-box {

    padding: 18px;

    border-radius: 13px;

    background:
        rgba(241, 220, 154, 0.05);

    border:
        1px solid
        rgba(241, 220, 154, 0.10);
}


.verse-title {

    color: #caa6ff;

    font-size: 12px;

    margin-bottom: 10px;
}


.verse-text {

    color: #f1dc9a;

    font-family:
        "Amiri",
        "Traditional Arabic",
        serif;

    font-size: 23px;

    line-height: 2;
}


.tafsir-text {

    margin-top: 20px;
}


.tafsir-text h3 {

    color: #caa6ff;

    margin-bottom: 8px;
}


.tafsir-text p {

    color: #c2b9c8;

    line-height: 2;
}


.meaning-box {

    padding: 20px;

    border-radius: 13px;

    background:
        rgba(202, 166, 255, 0.05);

    border-right:
        3px solid
        #caa6ff;
}


.meaning-box p {

    color: #c8bfce;

    line-height: 2;
}


/* =====================================================
   PART 13
   معلومات السورة
===================================================== */

.surah-details {
    margin-top: 25px;
    padding: 25px;
    background: rgba(20, 10, 35, 0.88);
    border: 1px solid rgba(212, 175, 55, 0.35);
    border-radius: 20px;
}

.detail-title {
    text-align: center;
    color: #f1dc9a;
    font-size: 24px;
    margin-bottom: 22px;
    font-weight: bold;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.detail-card {
    min-height: 100px;
    padding: 18px;
    border-radius: 15px;
    background: linear-gradient(
        145deg,
        rgba(53, 18, 77, 0.95),
        rgba(15, 8, 25, 0.95)
    );
    border: 1px solid rgba(202, 166, 255, 0.25);
    text-align: center;
    transition: 0.3s ease;
}

.detail-card:hover {
    transform: translateY(-5px);
    border-color: #d4af37;
    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.15);
}

.detail-label {
    display: block;
    color: #caa6ff;
    font-size: 15px;
    margin-bottom: 10px;
}

.detail-value {
    display: block;
    color: #f1dc9a;
    font-size: 20px;
    font-weight: bold;
}

.revelation-box {
    margin-top: 20px;
    padding: 20px;
    border-radius: 16px;
    background: rgba(212, 175, 55, 0.07);
    border: 1px solid rgba(212, 175, 55, 0.3);
    text-align: center;
}

.revelation-title {
    color: #f1dc9a;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.revelation-text {
    color: #eee;
    font-size: 16px;
    line-height: 2;
}
/* =====================================================
   PART 14
   قسم التلاوة
===================================================== */

.recitation-section {
    margin-top: 25px;
    padding: 30px;
    border-radius: 22px;
    background:
        radial-gradient(
            circle at center,
            rgba(100, 50, 140, 0.22),
            rgba(10, 5, 18, 0.95)
        );
    border: 1px solid rgba(202, 166, 255, 0.3);
    text-align: center;
}

.recitation-title {
    color: #f1dc9a;
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 8px;
}

.reciter-name {
    color: #caa6ff;
    font-size: 17px;
    margin-bottom: 25px;
}

.recitation-player {
    max-width: 700px;
    margin: auto;
    padding: 20px;
    background: rgba(0, 0, 0, 0.35);
    border-radius: 18px;
    border: 1px solid rgba(212, 175, 55, 0.25);
}

.recitation-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.recitation-btn {
    border: none;
    border-radius: 50%;
    width: 65px;
    height: 65px;
    background: linear-gradient(
        145deg,
        #d4af37,
        #9f7c16
    );
    color: #12091b;
    font-size: 25px;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 5px 20px rgba(212, 175, 55, 0.25);
}

.recitation-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 8px 30px rgba(212, 175, 55, 0.4);
}

.recitation-status {
    margin-top: 18px;
    color: #ddd;
    font-size: 15px;
}

.audio-progress {
    width: 100%;
    height: 8px;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.12);
}

.audio-progress-bar {
    width: 0%;
    height: 100%;
    background: linear-gradient(
        90deg,
        #9f7c16,
        #f1dc9a
    );
    border-radius: 10px;
    transition: width 0.2s linear;
}

.audio-time {
    display: flex;
    justify-content: space-between;
    margin-top: 8px;
    color: #aaa;
    font-size: 13px;
}
/* =====================================================
   PART 15
   Accessibility + Footer
===================================================== */

.accessibility-section {
    margin-top: 25px;
    padding: 25px;
    border-radius: 20px;
    background: rgba(20, 10, 35, 0.88);
    border: 1px solid rgba(202, 166, 255, 0.25);
}

.accessibility-title {
    text-align: center;
    color: #f1dc9a;
    font-size: 23px;
    font-weight: bold;
    margin-bottom: 20px;
}

.accessibility-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.accessibility-card {
    padding: 20px;
    border-radius: 16px;
    background: linear-gradient(
        145deg,
        rgba(53, 18, 77, 0.9),
        rgba(10, 5, 18, 0.95)
    );
    border: 1px solid rgba(202, 166, 255, 0.22);
    text-align: center;
    transition: 0.3s ease;
}

.accessibility-card:hover {
    transform: translateY(-4px);
    border-color: #d4af37;
    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.12);
}

.accessibility-icon {
    font-size: 30px;
    margin-bottom: 10px;
    color: #f1dc9a;
}

.accessibility-card h3 {
    color: #f1dc9a;
    font-size: 18px;
    margin-bottom: 8px;
}

.accessibility-card p {
    color: #ccc;
    font-size: 14px;
    line-height: 1.8;
    margin: 0;
}


/* =====================================================
   FOOTER
===================================================== */

.quran-footer {
    margin-top: 35px;
    padding: 25px 15px;
    text-align: center;
    border-top: 1px solid rgba(212, 175, 55, 0.25);
    color: #aaa;
}

.footer-brand {
    color: #f1dc9a;
    font-size: 21px;
    font-weight: bold;
    margin-bottom: 8px;
}

.footer-text {
    font-size: 14px;
    line-height: 1.8;
}

.footer-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.footer-links a {
    color: #caa6ff;
    text-decoration: none;
    transition: 0.3s ease;
}

.footer-links a:hover {
    color: #f1dc9a;
}


/* =====================================================
   GENERAL FOCUS
===================================================== */

button:focus,
a:focus,
input:focus {
    outline: 2px solid #f1dc9a;
    outline-offset: 3px;
}

::selection {
    background: #d4af37;
    color: #160b20;
}


/* =====================================================
   PART 16
   RESPONSIVE DESIGN
===================================================== */

@media (max-width: 992px) {

    .quran-container {
        width: 94%;
    }

    .details-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .accessibility-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .surah-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .quran-header {
        padding: 18px;
    }

    .header-title h1 {
        font-size: 28px;
    }

    .mushaf-page {
        padding: 35px 25px;
    }
}


/* =====================================================
   TABLET
===================================================== */

@media (max-width: 768px) {

    .quran-page {
        overflow-x: hidden;
    }

    .quran-header {
        flex-direction: column;
        gap: 18px;
        text-align: center;
    }

    .home-btn {
        align-self: flex-start;
    }

    .brand {
        order: 1;
    }

    .header-title {
        order: 2;
    }

    .quran-container {
        width: 95%;
        margin: 20px auto;
    }

    .search-box {
        flex-direction: column;
    }

    .search-box input {
        width: 100%;
    }

    .search-btn {
        width: 100%;
    }

    .surah-grid {
        grid-template-columns: 1fr;
    }

    .details-grid {
        grid-template-columns: 1fr;
    }

    .accessibility-grid {
        grid-template-columns: 1fr;
    }

    .mushaf-page {
        min-height: 600px;
        padding: 30px 18px;
    }

    .quran-text {
        font-size: 29px;
        line-height: 2.4;
    }

    .mushaf-navigation {
        flex-direction: column;
        gap: 12px;
    }

    .nav-btn {
        width: 100%;
    }

    .recitation-player {
        width: 100%;
    }
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 480px) {

    body {
        font-size: 14px;
    }

    .quran-container {
        width: 96%;
    }

    .quran-header {
        padding: 15px 10px;
    }

    .home-btn {
        font-size: 13px;
        padding: 9px 13px;
    }

    .brand-name {
        font-size: 22px;
    }

    .header-title h1 {
        font-size: 23px;
    }

    .header-title p {
        font-size: 13px;
    }

    .search-section {
        padding: 18px 14px;
    }

    .search-title {
        font-size: 20px;
    }

    .surah-section {
        padding: 18px 12px;
    }

    .section-title {
        font-size: 21px;
    }

    .surah-card {
        padding: 16px;
    }

    .surah-number {
        width: 42px;
        height: 42px;
        font-size: 15px;
    }

    .surah-name {
        font-size: 19px;
    }

    .surah-meta {
        font-size: 12px;
    }

    .mushaf-section {
        padding: 12px;
    }

    .surah-info-bar {
        padding: 15px 10px;
    }

    .current-surah-name {
        font-size: 21px;
    }

    .mushaf-page {
        min-height: 520px;
        padding: 25px 12px;
        border-radius: 8px;
    }

    .mushaf-border {
        padding: 20px 10px;
    }

    .basmala {
        font-size: 25px;
        margin-bottom: 25px;
    }

    .quran-text {
        font-size: 25px;
        line-height: 2.3;
    }

    .ayah-number {
        font-size: 13px;
        margin: 0 2px;
    }

    .page-number {
        font-size: 12px;
    }

    .info-tabs {
        gap: 7px;
    }

    .info-tab {
        padding: 10px 12px;
        font-size: 13px;
    }

    .info-panel {
        padding: 17px 13px;
    }

    .detail-title {
        font-size: 21px;
    }

    .detail-value {
        font-size: 18px;
    }

    .recitation-section {
        padding: 22px 13px;
    }

    .recitation-title {
        font-size: 21px;
    }

    .recitation-btn {
        width: 58px;
        height: 58px;
    }

    .accessibility-section {
        padding: 20px 13px;
    }

    .accessibility-title {
        font-size: 20px;
    }

    .footer-links {
        flex-direction: column;
        gap: 10px;
    }
}


/* =====================================================
   VERY SMALL SCREENS
===================================================== */

@media (max-width: 350px) {

    .quran-text {
        font-size: 22px;
        line-height: 2.2;
    }

    .basmala {
        font-size: 22px;
    }

    .header-title h1 {
        font-size: 20px;
    }

    .brand-name {
        font-size: 19px;
    }
}

/* =====================================================
   PART 17
   FINAL PAGE
===================================================== */

/* منع تحديد النصوص غير الضرورية */
.home-btn,
.recitation-btn,
.nav-btn,
.info-tab,
.search-btn {
    -webkit-tap-highlight-color: transparent;
}

/* تحسين اللمس على الموبايل */
button,
a {
    touch-action: manipulation;
}

/* منع خروج العناصر خارج الشاشة */
img,
video,
audio {
    max-width: 100%;
}

/* =====================================================
   END OF QURAN PAGE
===================================================== */
/* =========================================================
   TAFSIR CONTROLS
========================================================= */

.tafsir-controls {
    display: grid;
    grid-template-columns: 1fr 1.2fr 1fr;
    gap: 12px;
    margin: 22px 0 10px;
    direction: rtl;
}

.tafsir-controls button,
.tafsir-controls select {
    min-height: 48px;
    padding: 10px 16px;
    border-radius: 14px;
    border: 1px solid rgba(202, 166, 255, 0.35);
    background: linear-gradient(
        135deg,
        rgba(55, 25, 75, 0.95),
        rgba(20, 10, 30, 0.98)
    );
    color: #ffffff;
    font-family: inherit;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
}

.tafsir-controls button:hover,
.tafsir-controls select:hover {
    border-color: #f1dc9a;
    color: #f1dc9a;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(202, 166, 255, 0.18);
}

.tafsir-controls button:active {
    transform: scale(0.97);
}

/* زر تفسير السورة كاملة */
#fullSurahTafsir {
    grid-column: 1 / -1;
    background: linear-gradient(
        135deg,
        #3d1b55,
        #1b0d27
    );
    border-color: rgba(241, 220, 154, 0.45);
    color: #f1dc9a;
    font-weight: bold;
}

#fullSurahTafsir:hover {
    background: linear-gradient(
        135deg,
        #51236d,
        #241032
    );
    box-shadow: 0 0 22px rgba(241, 220, 154, 0.2);
}

/* القائمة */
.tafsir-controls select {
    text-align: center;
    outline: none;
}

.tafsir-controls select option {
    background: #170b22;
    color: #ffffff;
}

/* الموبايل */
@media (max-width: 700px) {

    .tafsir-controls {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .tafsir-controls select {
        grid-column: 1 / -1;
        grid-row: 1;
    }

    .tafsir-controls button {
        font-size: 14px;
        padding: 10px 8px;
    }

    #fullSurahTafsir {
        grid-column: 1 / -1;
    }
}








body.quran-recitation-mode > * {
    display: none !important;
}

body.quran-recitation-mode .mushaf-area {
    display: block !important;
}

body.quran-recitation-mode .mushaf-area {
    position: fixed;
    inset: 0;
    z-index: 99999;
    width: 100vw;
    height: 100vh;
    overflow-y: auto;
    background: #f4ecd8;
}

/* =====================================================
   MUSHAF TEXT ONLY
   لا يغير حجم ورقة المصحف
===================================================== */

.mushaf-page .quran-text {
    font-weight: 700;
    font-size: 32px;
    line-height: 2.8;
    text-align: center;
    direction: rtl;
}

.mushaf-page .ayah {
    font-weight: 700;
    font-size: 32px;
    line-height: 2.8;
    text-align: center;
}

.mushaf-page .ayah-text {
    font-weight: 700;
    font-size: 32px;
    line-height: 2.8;
    text-align: center;
}

.mushaf-page .ayah-number {
    font-weight: 700;
}

</style>








<!-- =====================================================
     QURAN PART 2 START
     تحميل وعرض السور الـ114
===================================================== -->

<script>

(function () {

    "use strict";

    const SURAH_API =
        "https://api.alquran.cloud/v1/surah";

    let allSurahs = [];

    let currentSurahNumber = 1;


    /* =========================================
       تحميل السور
    ========================================= */

    async function loadAllSurahs() {

        const grid =
            document.querySelector(".surah-grid");

        if (!grid) {

            console.warn(
                "⚠️ لم يتم العثور على .surah-grid"
            );

            return;
        }


        try {

            grid.innerHTML =
                '<div class="surah-loading">جاري تحميل السور...</div>';


            const response =
                await fetch(SURAH_API);


            if (!response.ok) {

                throw new Error(
                    "فشل الاتصال بمصدر السور"
                );

            }


            const result =
                await response.json();


            if (
                !result ||
                !Array.isArray(result.data)
            ) {

                throw new Error(
                    "بيانات السور غير صحيحة"
                );

            }


            allSurahs =
                result.data;


            renderSurahs();

            updateSurahCount();

            selectSurahByNumber(1);


            console.log(
                "✅ تم تحميل جميع السور:",
                allSurahs.length
            );

        }

        catch (error) {

            console.error(
                "❌ خطأ تحميل السور:",
                error
            );


            grid.innerHTML =
                '<div class="surah-loading">تعذر تحميل السور.</div>';

        }

    }


    /* =========================================
       عرض السور
    ========================================= */

    function renderSurahs() {

        const grid =
            document.querySelector(".surah-grid");

        if (!grid) return;


        grid.innerHTML = "";


        allSurahs.forEach(function (surah) {

            const card =
                document.createElement("button");


            card.type =
                "button";


            card.className =
                "surah-card";


            card.dataset.surahNumber =
                surah.number;


            card.innerHTML = `

                <span class="surah-card-number">
                    ${convertToArabicNumbers(surah.number)}
                </span>

                <span class="surah-card-name">
                    ${surah.name || ""}
                </span>

                <span class="surah-card-english">
                    ${surah.englishName || ""}
                </span>

                <span class="surah-card-meta">
                    ${convertToArabicNumbers(surah.numberOfAyahs || 0)} آية
                </span>

            `;


            card.addEventListener(
                "click",
                function () {

                    selectSurahByNumber(
                        surah.number
                    );

                }
            );


            grid.appendChild(card);

        });


        highlightCurrentSurah();

    }


    /* =========================================
       اختيار سورة
    ========================================= */

    function selectSurahByNumber(number) {

        number =
            Number(number);


        if (
            !number ||
            number < 1 ||
            number > 114
        ) {

            return;

        }


        currentSurahNumber =
            number;


        highlightCurrentSurah();


        const selectedSurah =
            allSurahs.find(
                function (surah) {

                    return Number(surah.number) ===
                        currentSurahNumber;

                }
            );


        if (selectedSurah) {

            console.log(
                "📖 السورة الحالية:",
                selectedSurah.name
            );

        }

    }


    /* =========================================
       تمييز السورة الحالية
    ========================================= */

    function highlightCurrentSurah() {

        const cards =
            document.querySelectorAll(
                ".surah-card"
            );


        cards.forEach(function (card) {

            const number =
                Number(
                    card.dataset.surahNumber
                );


            card.classList.toggle(
                "active",
                number === currentSurahNumber
            );

        });

    }


    /* =========================================
       عدد السور
    ========================================= */

    function updateSurahCount() {

        const elements =
            document.querySelectorAll(
                ".surah-count"
            );


        elements.forEach(function (element) {

            element.textContent =
                convertToArabicNumbers(
                    allSurahs.length
                );

        });

    }


    /* =========================================
       الأرقام العربية
    ========================================= */

    function convertToArabicNumbers(number) {

        return String(number)
            .replace(/0/g, "٠")
            .replace(/1/g, "١")
            .replace(/2/g, "٢")
            .replace(/3/g, "٣")
            .replace(/4/g, "٤")
            .replace(/5/g, "٥")
            .replace(/6/g, "٦")
            .replace(/7/g, "٧")
            .replace(/8/g, "٨")
            .replace(/9/g, "٩");

    }


    /* =========================================
       بيانات السور للأجزاء القادمة
    ========================================= */

    function getAllSurahs() {

        return allSurahs;

    }


    function getCurrentSurah() {

        return allSurahs.find(
            function (surah) {

                return Number(surah.number) ===
                    currentSurahNumber;

            }
        ) || null;

    }


    function getCurrentSurahNumber() {

        return currentSurahNumber;

    }


    /* =========================================
       إعادة تحميل السور
    ========================================= */

    function reload() {

        loadAllSurahs();

    }


    /* =========================================
       تشغيل Part 2
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            loadAllSurahs();

        }
    );


    /* =========================================
       API
    ========================================= */

    window.QuranData = {

        getAllSurahs:
            getAllSurahs,

        getCurrentSurah:
            getCurrentSurah,

        getCurrentSurahNumber:
            getCurrentSurahNumber,

        selectSurah:
            selectSurahByNumber,

        reload:
            reload

    };


    console.log(
        "✅ QURAN PART 2 READY"
    );

})();

</script>

<!-- =====================================================
     QURAN PART 2 END
===================================================== -->




<!-- =====================================================
     QURAN PART 3 START
     تحميل بيانات السورة وآياتها
===================================================== -->

<script>

(function () {

    "use strict";

    const API =
        "https://api.alquran.cloud/v1/surah/";

    let currentSurahData = null;


    /* =========================================
       تحميل بيانات السورة
    ========================================= */

    async function loadSurah(number) {

        number = Number(number);

        if (number < 1 || number > 114) {
            return;
        }

        console.log("📖 جاري تحميل السورة رقم:", number);

        try {

            const response = await fetch(
                API + number + "/quran-uthmani"
            );

            if (!response.ok) {
                throw new Error("فشل تحميل السورة");
            }

            const result = await response.json();

            if (!result.data) {
                throw new Error("لا توجد بيانات للسورة");
            }

            currentSurahData = result.data;

            console.log(
                "✅ تم تحميل:",
                currentSurahData.name
            );

            showSurahData();

        } catch (error) {

            console.error(
                "❌ خطأ Part 3:",
                error
            );

        }

    }


    /* =========================================
       عرض بيانات السورة
    ========================================= */

    function showSurahData() {

        if (!currentSurahData) {
            return;
        }


        /* اسم السورة */

        const title =
            document.querySelector(
                ".surah-main-info h2"
            );

        if (title) {

            title.textContent =
                currentSurahData.name;

        }


        /* عدد الآيات */

        const count =
            document.querySelector(
                ".surah-ayah-count"
            );

        if (count) {

            count.textContent =
                toArabicNumbers(
                    currentSurahData.numberOfAyahs
                );

        }


        /* رقم السورة */

        const number =
            document.querySelector(
                ".surah-number"
            );

        if (number) {

            number.textContent =
                toArabicNumbers(
                    currentSurahData.number
                );

        }


        /* عرض الآيات */

        showAyahs();

    }


    /* =========================================
       عرض الآيات
    ========================================= */

    function showAyahs() {

        const container =
            document.querySelector(
                ".quran-text"
            );

        if (!container) {

            console.warn(
                "⚠️ لم يتم العثور على .quran-text"
            );

            return;
        }


        container.innerHTML = "";


        currentSurahData.ayahs.forEach(
            function (ayah) {

                const element =
                    document.createElement("div");

                element.className = "ayah";


                element.innerHTML = `

                    <span class="ayah-text">
                        ${ayah.text}
                    </span>

                    <span class="ayah-number">
                        ${toArabicNumbers(
                            ayah.numberInSurah
                        )}
                    </span>

                `;


                container.appendChild(
                    element
                );

            }
        );


        console.log(
            "✅ تم عرض",
            currentSurahData.ayahs.length,
            "آية"
        );

    }


    /* =========================================
       مراقبة اختيار السور
       بدون تعديل Part 2
    ========================================= */

    document.addEventListener(
        "click",
        function (event) {

            const card =
                event.target.closest(
                    ".surah-card"
                );


            if (!card) {
                return;
            }


            const number =
                card.dataset.surahNumber;


            if (!number) {
                return;
            }


            loadSurah(number);

        }
    );


    /* =========================================
       تشغيل السورة الأولى
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            setTimeout(
                function () {

                    loadSurah(1);

                },
                800
            );

        }
    );


    /* =========================================
       تحويل الأرقام
    ========================================= */

    function toArabicNumbers(number) {

        return String(number)
            .replace(/0/g, "٠")
            .replace(/1/g, "١")
            .replace(/2/g, "٢")
            .replace(/3/g, "٣")
            .replace(/4/g, "٤")
            .replace(/5/g, "٥")
            .replace(/6/g, "٦")
            .replace(/7/g, "٧")
            .replace(/8/g, "٨")
            .replace(/9/g, "٩");

    }


    /* =========================================
       API للأجزاء القادمة
    ========================================= */

    window.QuranContent = {

        getCurrentSurah: function () {

            return currentSurahData;

        },

        getAyahs: function () {

            return currentSurahData
                ? currentSurahData.ayahs
                : [];

        },

        loadSurah: loadSurah

    };


    console.log(
        "✅ QURAN PART 3 READY"
    );

})();

</script>

<!-- =====================================================
     QURAN PART 3 END
===================================================== -->



<!-- =====================================================
     QURAN PART 4 START
     تحديث بيانات السورة بالكامل
===================================================== -->

<script>

(function () {

    "use strict";

    const SURAH_API =
        "https://api.alquran.cloud/v1/surah/";

    let currentSurahNumber = 1;
    let currentSurah = null;


    /* =========================================
       تحميل بيانات السورة
    ========================================= */

    async function getSurah(number) {

        number = Number(number);

        if (number < 1 || number > 114) {
            return null;
        }

        try {

            const response =
                await fetch(
                    SURAH_API + number
                );

            if (!response.ok) {
                throw new Error(
                    "فشل تحميل معلومات السورة"
                );
            }

            const result =
                await response.json();

            if (!result.data) {
                throw new Error(
                    "بيانات السورة غير موجودة"
                );
            }

            return result.data;

        } catch (error) {

            console.error(
                "❌ Quran Part 4:",
                error
            );

            return null;
        }
    }


    /* =========================================
       تحديث كل البيانات
    ========================================= */

    async function updateEverything(number) {

        number = Number(number);

        const surah =
            await getSurah(number);

        if (!surah) {
            return;
        }

        currentSurahNumber = number;
        currentSurah = surah;


        /* =====================================
           اسم السورة الرئيسي
        ===================================== */

        document
            .querySelectorAll(
                ".surah-main-info h2"
            )
            .forEach(function (element) {

                element.textContent =
                    surah.name || "";

            });


        /* =====================================
           تحديث بيانات شريط السورة
        ===================================== */

        const metaSpans =
            document.querySelectorAll(
                ".surah-main-info .surah-meta span"
            );


        if (metaSpans.length > 0) {

            metaSpans.forEach(
                function (element, index) {

                    const text =
                        element.textContent.trim();

                    /*
                     * نحافظ على الكلمات الموجودة
                     * ونغير الأرقام حسب المحتوى
                     */

                    if (
                        text.includes("آية") ||
                        text.includes("اية")
                    ) {

                        element.textContent =
                            arabicNumbers(
                                surah.numberOfAyahs
                            ) + " آية";

                    }

                    else if (
                        text.includes("مكية") ||
                        text.includes("مدنية")
                    ) {

                        element.textContent =
                            getRevelationArabic(
                                surah.revelationType
                            );

                    }

                    else if (
                        text.includes("سورة") ||
                        text.includes("رقم")
                    ) {

                        element.textContent =
                            "سورة رقم " +
                            arabicNumbers(
                                surah.number
                            );

                    }

                }
            );

        }


        /* =====================================
           عنوان الصفحة
        ===================================== */

        document
            .querySelectorAll(
                ".mushaf-page .page-header span"
            )
            .forEach(function (element) {

                /*
                 * لو العنصر مخصص لاسم السورة
                 */

                if (
                    element.dataset.info ===
                    "surah-name"
                ) {

                    element.textContent =
                        surah.name;

                }

            });


        /* =====================================
           عناصر تحمل data-surah-info
        ===================================== */

        document
            .querySelectorAll(
                "[data-surah-info]"
            )
            .forEach(function (element) {

                const type =
                    element.dataset.surahInfo;


                if (type === "name") {

                    element.textContent =
                        surah.name || "";

                }


                if (type === "number") {

                    element.textContent =
                        arabicNumbers(
                            surah.number
                        );

                }


                if (type === "ayahs") {

                    element.textContent =
                        arabicNumbers(
                            surah.numberOfAyahs
                        );

                }


                if (type === "revelation") {

                    element.textContent =
                        getRevelationArabic(
                            surah.revelationType
                        );

                }

            });


        /* =====================================
           بطاقات التفاصيل
        ===================================== */

        updateDetailCards(surah);


        /* =====================================
           صندوق النزول
        ===================================== */

        updateRevelationBox(surah);


        /* =====================================
           عنوان التلاوة
        ===================================== */

        document
            .querySelectorAll(
                ".recitation-header h2"
            )
            .forEach(function (element) {

                element.textContent =
                    "تلاوة سورة " +
                    surah.name;

            });


        console.log(
            "✅ تم تحديث كل بيانات:",
            surah.name
        );

    }


    /* =========================================
       بطاقات التفاصيل
    ========================================= */

    function updateDetailCards(surah) {

        const cards =
            document.querySelectorAll(
                ".details-grid .detail-card"
            );


        cards.forEach(function (card) {

            const text =
                card.textContent.trim();


            /*
             * عدد الآيات
             */

            if (
                text.includes("عدد الآيات") ||
                text.includes("الآيات")
            ) {

                updateCardValue(
                    card,
                    arabicNumbers(
                        surah.numberOfAyahs
                    )
                );

            }


            /*
             * رقم السورة
             */

            else if (
                text.includes("رقم السورة")
            ) {

                updateCardValue(
                    card,
                    arabicNumbers(
                        surah.number
                    )
                );

            }


            /*
             * نوع السورة
             */

            else if (
                text.includes("نوع السورة") ||
                text.includes("نوع")
            ) {

                updateCardValue(
                    card,
                    getRevelationArabic(
                        surah.revelationType
                    )
                );

            }


            /*
             * اسم السورة
             */

            else if (
                text.includes("اسم السورة")
            ) {

                updateCardValue(
                    card,
                    surah.name
                );

            }

        });

    }


    /* =========================================
       تحديث قيمة الكارت
    ========================================= */

    function updateCardValue(card, value) {

        /*
         * نحاول تحديث العنصر الموجود
         * داخل الكارت بدل حذف التصميم
         */

        const valueElement =
            card.querySelector(
                ".detail-value, .value, strong, span:last-child"
            );


        if (valueElement) {

            valueElement.textContent =
                value;

        }

    }


    /* =========================================
       صندوق النزول
    ========================================= */

    function updateRevelationBox(surah) {

        const boxes =
            document.querySelectorAll(
                ".revelation-box"
            );


        boxes.forEach(function (box) {

            const type =
                getRevelationArabic(
                    surah.revelationType
                );


            const paragraph =
                box.querySelector("p");


            if (paragraph) {

                paragraph.textContent =
                    "سورة " +
                    surah.name +
                    " سورة " +
                    type +
                    "، وعدد آياتها " +
                    arabicNumbers(
                        surah.numberOfAyahs
                    ) +
                    " آية.";

            }

        });

    }


    /* =========================================
       مكية / مدنية
    ========================================= */

    function getRevelationArabic(type) {

        if (
            String(type).toLowerCase()
            === "meccan"
        ) {

            return "مكية";

        }

        return "مدنية";

    }


    /* =========================================
       الأرقام العربية
    ========================================= */

    function arabicNumbers(number) {

        return String(number)
            .replace(/0/g, "٠")
            .replace(/1/g, "١")
            .replace(/2/g, "٢")
            .replace(/3/g, "٣")
            .replace(/4/g, "٤")
            .replace(/5/g, "٥")
            .replace(/6/g, "٦")
            .replace(/7/g, "٧")
            .replace(/8/g, "٨")
            .replace(/9/g, "٩");

    }


    /* =========================================
       مراقبة اختيار السورة
    ========================================= */

    document.addEventListener(
        "click",
        function (event) {

            const card =
                event.target.closest(
                    ".surah-card"
                );


            if (!card) {
                return;
            }


            const number =
                card.dataset.surahNumber;


            if (number) {

                updateEverything(
                    number
                );

            }

        }
    );


    /* =========================================
       تشغيل أول سورة
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            setTimeout(
                function () {

                    updateEverything(1);

                },
                1000
            );

        }
    );


    /* =========================================
       API
    ========================================= */

    window.QuranPart4 = {

        getSurah:
            getSurah,

        updateEverything:
            updateEverything,

        getCurrentSurah:
            function () {

                return currentSurah;

            },

        getCurrentSurahNumber:
            function () {

                return currentSurahNumber;

            }

    };


    console.log(
        "✅ QURAN PART 4 READY"
    );

})();

</script>

<!-- =====================================================
     QURAN PART 4 END
===================================================== -->



<script>
/* =========================================================
   QURAN PART 5 — REAL TAFSIR + AYAH NAVIGATION
   ========================================================= */

(function () {

    const SURAH_API = "https://api.alquran.cloud/v1/surah/";
    const UTHMANI_API = "https://api.alquran.cloud/v1/surah/";
    const TAFSIR_API = "https://api.alquran.cloud/v1/ayah/";
    const FULL_TAFSIR_API = "https://api.alquran.cloud/v1/surah/";

    let currentSurahNumber = 1;
    let currentSurahName = "الفاتحة";

    let currentAyahs = [];
    let currentAyahNumber = 1;


    /* =====================================================
       GET SURAH DATA
       ===================================================== */

    async function getSurahData(surahNumber) {

        const response = await fetch(
            SURAH_API + surahNumber
        );

        const result = await response.json();

        if (!result || result.code !== 200) {
            throw new Error("تعذر تحميل بيانات السورة");
        }

        return result.data;
    }


    /* =====================================================
       GET UTHMANI AYahs
       ===================================================== */

    async function getSurahAyahs(surahNumber) {

        const response = await fetch(
            UTHMANI_API +
            surahNumber +
            "/quran-uthmani"
        );

        const result = await response.json();

        if (!result || result.code !== 200) {
            throw new Error("تعذر تحميل آيات السورة");
        }

        return result.data.ayahs;
    }


    /* =====================================================
       UPDATE TAFSIR TITLES
       ===================================================== */

    function updateTafsirTitles() {

        const titleText =
            "تفسير سورة " + currentSurahName;


        /* العنوان الرئيسي */

        document
            .querySelectorAll(
                ".tafsir-title, .tafsir-header h2, .full-tafsir-title"
            )
            .forEach(function (element) {

                element.textContent = titleText;

            });


        /* أي عنوان فيه تفسير سورة */

        document
            .querySelectorAll(
                ".info-panel h2"
            )
            .forEach(function (element) {

                if (
                    element.textContent.includes("تفسير")
                ) {

                    element.textContent = titleText;

                }

            });


        /* عنوان تفسير الآية */

        document
            .querySelectorAll(
                ".verse-title, .tafsir-ayah-title"
            )
            .forEach(function (element) {

                element.textContent =
                    "تفسير الآية رقم " +
                    currentAyahNumber;

            });

    }


    /* =====================================================
       UPDATE AYAH SELECTOR
       ===================================================== */

    function updateAyahSelector() {

        const selector =
            document.getElementById(
                "tafsirAyahSelector"
            );

        if (!selector) return;


        selector.innerHTML = "";


        currentAyahs.forEach(function (ayah) {

            const option =
                document.createElement("option");

            option.value =
                ayah.numberInSurah;

            option.textContent =
                "الآية " +
                ayah.numberInSurah;


            selector.appendChild(option);

        });


        selector.value =
            currentAyahNumber;

    }


    /* =====================================================
       GET CURRENT AYAH
       ===================================================== */

    function getCurrentAyah() {

        return currentAyahs.find(
            function (ayah) {

                return (
                    ayah.numberInSurah ===
                    currentAyahNumber
                );

            }
        );

    }


    /* =====================================================
       LOAD REAL JALALAYN TAFSIR
       ===================================================== */

    async function loadAyahTafsir() {

        const ayah =
            getCurrentAyah();

        if (!ayah) return;


        try {

            const response =
                await fetch(
                    TAFSIR_API +
                    currentSurahNumber +
                    ":" +
                    currentAyahNumber +
                    "/ar.jalalayn"
                );


            const result =
                await response.json();


            let tafsirText = "";


            if (
                result &&
                result.code === 200 &&
                result.data
            ) {

                tafsirText =
                    result.data.text;

            }


            /* عرض التفسير */

            const tafsirElements =
                document.querySelectorAll(
                    ".tafsir-text, .tafsir-content"
                );


            tafsirElements.forEach(
                function (element) {

                    element.textContent =
                        tafsirText ||
                        "لم يتم العثور على تفسير لهذه الآية.";

                }
            );


            /* عنوان الآية */

            document
                .querySelectorAll(
                    ".verse-title, .tafsir-ayah-title"
                )
                .forEach(function (element) {

                    element.textContent =
                        "تفسير الآية " +
                        currentAyahNumber +
                        " من سورة " +
                        currentSurahName;

                });


            /* نص الآية */

            document
                .querySelectorAll(
                    ".verse-text"
                )
                .forEach(function (element) {

                    element.textContent =
                        ayah.text;

                });


        } catch (error) {

            console.error(
                "Tafsir error:",
                error
            );

        }

    }


    /* =====================================================
       LOAD REAL MUYASSAR MEANING
       ===================================================== */

    async function loadAyahMeaning() {

        try {

            const response =
                await fetch(
                    TAFSIR_API +
                    currentSurahNumber +
                    ":" +
                    currentAyahNumber +
                    "/ar.muyassar"
                );


            const result =
                await response.json();


            let meaningText = "";


            if (
                result &&
                result.code === 200 &&
                result.data
            ) {

                meaningText =
                    result.data.text;

            }


            document
                .querySelectorAll(
                    ".meaning-text, .meaning-content"
                )
                .forEach(function (element) {

                    element.textContent =
                        meaningText ||
                        "لم يتم العثور على معنى الآية.";

                });


        } catch (error) {

            console.error(
                "Meaning error:",
                error
            );

        }

    }


    /* =====================================================
       LOAD CURRENT AYAH
       ===================================================== */

    async function loadCurrentAyah() {

        updateTafsirTitles();

        updateAyahSelector();

        await loadAyahTafsir();

        await loadAyahMeaning();

    }


    /* =====================================================
       SELECT AYAH
       ===================================================== */

    async function selectTafsirAyah(
        ayahNumber
    ) {

        ayahNumber =
            Number(ayahNumber);


        if (
            ayahNumber < 1 ||
            ayahNumber > currentAyahs.length
        ) {

            return;

        }


        currentAyahNumber =
            ayahNumber;


        await loadCurrentAyah();

    }


    /* =====================================================
       PREVIOUS AYAH
       ===================================================== */

    async function previousTafsirAyah() {

        if (
            currentAyahNumber > 1
        ) {

            currentAyahNumber--;

            await loadCurrentAyah();

        }

    }


    /* =====================================================
       NEXT AYAH
       ===================================================== */

    async function nextTafsirAyah() {

        if (
            currentAyahNumber <
            currentAyahs.length
        ) {

            currentAyahNumber++;

            await loadCurrentAyah();

        }

    }


    /* =====================================================
       SHOW FULL SURAH TAFSIR
       ===================================================== */

    async function showFullSurahTafsir() {

        try {

            const response =
                await fetch(
                    FULL_TAFSIR_API +
                    currentSurahNumber +
                    "/ar.jalalayn"
                );


            const result =
                await response.json();


            if (
                !result ||
                result.code !== 200
            ) {

                throw new Error(
                    "تعذر تحميل تفسير السورة"
                );

            }


            const ayahs =
                result.data.ayahs || [];


            let fullText = "";


            ayahs.forEach(
                function (ayah) {

                    fullText +=
                        "الآية " +
                        ayah.numberInSurah +
                        "\n\n";

                    fullText +=
                        ayah.text;

                    fullText +=
                        "\n\n";

                }
            );


            /* البحث عن منطقة التفسير الكامل */

            let container =
                document.querySelector(
                    ".full-surah-tafsir"
                );


            if (!container) {

                container =
                    document.querySelector(
                        "#fullSurahTafsirContent"
                    );

            }


            if (!container) {

                container =
                    document.querySelector(
                        ".full-tafsir-content"
                    );

            }


            /*
             لو مفيش عنصر مخصص،
             هنستخدم أول info-panel فيها كلمة تفسير
            */

            if (!container) {

                const panels =
                    document.querySelectorAll(
                        ".info-panel"
                    );


                for (
                    let i = 0;
                    i < panels.length;
                    i++
                ) {

                    const heading =
                        panels[i]
                            .querySelector("h2");


                    if (
                        heading &&
                        heading.textContent
                            .includes("تفسير")
                    ) {

                        container =
                            panels[i];

                        break;

                    }

                }

            }


            if (container) {

                /*
                 نمسح النص التجريبي
                 */

                const oldTexts =
                    container.querySelectorAll(
                        ".tafsir-text, .tafsir-content, p"
                    );


                oldTexts.forEach(
                    function (element) {

                        element.textContent = "";

                    }
                );


                let fullBox =
                    container.querySelector(
                        ".generated-full-tafsir"
                    );


                if (!fullBox) {

                    fullBox =
                        document.createElement(
                            "div"
                        );

                    fullBox.className =
                        "generated-full-tafsir";


                    container.appendChild(
                        fullBox
                    );

                }


                fullBox.textContent =
                    fullText;


                /*
                 نخلي قسم التفسير ظاهر
                */

                container.style.display =
                    "block";


                container.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

            }


            /*
             تحديث العنوان
            */

            document
                .querySelectorAll(
                    ".tafsir-title, .tafsir-header h2, .full-tafsir-title"
                )
                .forEach(function (element) {

                    element.textContent =
                        "تفسير سورة " +
                        currentSurahName;

                });


        } catch (error) {

            console.error(
                "Full Tafsir Error:",
                error
            );

        }

    }


    /* =====================================================
       LOAD SURAH
       ===================================================== */

    async function loadSurah(
        surahNumber
    ) {

        try {

            const surah =
                await getSurahData(
                    surahNumber
                );


            currentSurahNumber =
                surah.number;


            currentSurahName =
                surah.name;


            currentAyahs =
                await getSurahAyahs(
                    surahNumber
                );


            currentAyahNumber = 1;


            updateTafsirTitles();

            updateAyahSelector();

            await loadCurrentAyah();


        } catch (error) {

            console.error(
                "Quran Part 5 Error:",
                error
            );

        }

    }


    /* =====================================================
       BUTTON EVENTS
       ===================================================== */

    document.addEventListener(
        "click",
        function (event) {


            /* الآية السابقة */

            if (
                event.target.closest(
                    "#previousTafsirAyah"
                )
            ) {

                previousTafsirAyah();

            }


            /* الآية التالية */

            if (
                event.target.closest(
                    "#nextTafsirAyah"
                )
            ) {

                nextTafsirAyah();

            }


            /* تفسير السورة كاملة */

            if (
                event.target.closest(
                    "#fullSurahTafsir"
                )
            ) {

                showFullSurahTafsir();

            }


            /* اختيار آية */

            if (
                event.target.closest(
                    "#tafsirAyahSelector"
                )
            ) {

                const selector =
                    event.target.closest(
                        "#tafsirAyahSelector"
                    );


                selector.onchange =
                    function () {

                        selectTafsirAyah(
                            selector.value
                        );

                    };

            }

        }
    );


    /* =====================================================
       CONNECT WITH SURAH CARDS
       ===================================================== */

    document.addEventListener(
        "click",
        function (event) {

            const card =
                event.target.closest(
                    "[data-surah-number]"
                );


            if (!card) return;


            const number =
                Number(
                    card.dataset.surahNumber
                );


            if (
                number >= 1 &&
                number <= 114
            ) {

                loadSurah(number);

            }

        }
    );


    /* =====================================================
       START WITH AL-FATIHA
       ===================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            setTimeout(
                function () {

                    loadSurah(1);

                },
                800
            );

        }
    );


    /* =====================================================
       PUBLIC API
       ===================================================== */

    window.QuranTafsir = {

        loadSurah:
            loadSurah,

        selectAyah:
            selectTafsirAyah,

        previousAyah:
            previousTafsirAyah,

        nextAyah:
            nextTafsirAyah,

        fullSurahTafsir:
            showFullSurahTafsir

    };


})();

/* =========================================================
   QURAN PART 5 — END
   ========================================================= */
</script>









<script>
/* =========================================================
   QURAN PART 6
   تلاوة الشيخ عبد الباسط عبد الصمد
   ========================================================= */

(function () {

    /* -----------------------------------------------------
       إعدادات الصوت
       ----------------------------------------------------- */

    const RECITATION_BASE_URL =
        "https://server7.mp3quran.net/basit/";

    let currentSurahNumber = 1;
    let currentSurahName = "الفاتحة";

    let quranAudio = null;


    /* -----------------------------------------------------
       إنشاء مشغل الصوت
       ----------------------------------------------------- */

    function createAudioPlayer() {

        if (quranAudio) {
            return quranAudio;
        }

        quranAudio =
            document.createElement("audio");

        quranAudio.id =
            "abdulBasitAudio";

        quranAudio.preload =
            "metadata";

        quranAudio.controls =
            false;

        document.body.appendChild(
            quranAudio
        );

        return quranAudio;
    }


    /* -----------------------------------------------------
       تكوين رابط السورة
       ----------------------------------------------------- */

    function getSurahAudioURL(
        surahNumber
    ) {

        const number =
            String(surahNumber)
                .padStart(3, "0");

        return (
            RECITATION_BASE_URL +
            number +
            ".mp3"
        );

    }


    /* -----------------------------------------------------
       تحديث اسم السورة
       ----------------------------------------------------- */

    function updateRecitationTitle() {

        document
            .querySelectorAll(
                ".recitation-header h2"
            )
            .forEach(function (element) {

                element.textContent =
                    "تلاوة سورة " +
                    currentSurahName;

            });

    }


    /* -----------------------------------------------------
       تحميل سورة جديدة
       ----------------------------------------------------- */

    function loadRecitation(
        surahNumber,
        surahName
    ) {

        surahNumber =
            Number(surahNumber);

        if (
            surahNumber < 1 ||
            surahNumber > 114
        ) {
            return;
        }


        currentSurahNumber =
            surahNumber;


        if (surahName) {

            currentSurahName =
                surahName;

        }


        const audio =
            createAudioPlayer();


        /*
         إيقاف السورة القديمة
        */

        audio.pause();


        /*
         تصفير الوقت
        */

        audio.currentTime = 0;


        /*
         وضع رابط السورة الجديدة
        */

        audio.src =
            getSurahAudioURL(
                currentSurahNumber
            );


        audio.load();


        updateRecitationTitle();


        updatePlayButton(
            false
        );

    }


    /* -----------------------------------------------------
       تشغيل التلاوة
       ----------------------------------------------------- */

    async function playRecitation() {

        const audio =
            createAudioPlayer();


        if (
            !audio.src ||
            currentSurahNumber < 1
        ) {

            loadRecitation(
                currentSurahNumber,
                currentSurahName
            );

        }


        try {

            await audio.play();

            updatePlayButton(
                true
            );

        } catch (error) {

            console.error(
                "Abdul Basit audio error:",
                error
            );

        }

    }


    /* -----------------------------------------------------
       إيقاف التلاوة
       ----------------------------------------------------- */

    function pauseRecitation() {

        if (!quranAudio) {
            return;
        }

        quranAudio.pause();

        updatePlayButton(
            false
        );

    }


    /* -----------------------------------------------------
       إيقاف وإرجاع للبداية
       ----------------------------------------------------- */

    function stopRecitation() {

        if (!quranAudio) {
            return;
        }

        quranAudio.pause();

        quranAudio.currentTime =
            0;

        updatePlayButton(
            false
        );

    }


    /* -----------------------------------------------------
       تحديث زر التشغيل
       ----------------------------------------------------- */

    function updatePlayButton(
        playing
    ) {

        document
            .querySelectorAll(
                ".play-button"
            )
            .forEach(function (button) {

                if (playing) {

                    button.textContent =
                        "⏸";

                    button.setAttribute(
                        "aria-label",
                        "إيقاف التلاوة"
                    );

                } else {

                    button.textContent =
                        "▶";

                    button.setAttribute(
                        "aria-label",
                        "تشغيل التلاوة"
                    );

                }

            });

    }


    /* -----------------------------------------------------
       زر التشغيل
       ----------------------------------------------------- */

    document.addEventListener(
        "click",
        function (event) {

            const button =
                event.target.closest(
                    ".play-button"
                );


            if (!button) {
                return;
            }


            if (
                quranAudio &&
                !quranAudio.paused
            ) {

                pauseRecitation();

            } else {

                playRecitation();

            }

        }
    );


    /* -----------------------------------------------------
       عند انتهاء السورة
       ----------------------------------------------------- */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            const audio =
                createAudioPlayer();


            audio.addEventListener(
                "ended",
                function () {

                    updatePlayButton(
                        false
                    );

                }
            );

        }
    );


    /* -----------------------------------------------------
       متابعة اختيار السورة
       ----------------------------------------------------- */

    document.addEventListener(
        "click",
        function (event) {

            const card =
                event.target.closest(
                    "[data-surah-number]"
                );


            if (!card) {
                return;
            }


            const number =
                Number(
                    card.dataset.surahNumber
                );


            if (
                number < 1 ||
                number > 114
            ) {
                return;
            }


            /*
             اسم السورة من الكارت
            */

            let name = "";


            const nameElement =
                card.querySelector(
                    "h2, h3, .surah-name, .surah-title"
                );


            if (nameElement) {

                name =
                    nameElement.textContent
                        .trim();

            }


            /*
             لو الاسم مش موجود في الكارت،
             نحاول نجيبه من QuranData
            */

            if (
                !name &&
                window.QuranData &&
                typeof window.QuranData
                    .getAllSurahs === "function"
            ) {

                const surahs =
                    window.QuranData
                        .getAllSurahs();


                const selected =
                    surahs.find(
                        function (surah) {

                            return (
                                Number(surah.number) ===
                                number
                            );

                        }
                    );


                if (selected) {

                    name =
                        selected.name;

                }

            }


            loadRecitation(
                number,
                name
            );

        }
    );


    /* -----------------------------------------------------
       تحميل الفاتحة كبداية
       ----------------------------------------------------- */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            setTimeout(
                function () {

                    loadRecitation(
                        1,
                        "الفاتحة"
                    );

                },
                1000
            );

        }
    );


    /* -----------------------------------------------------
       API عامة لاستخدامها بعدين
       ----------------------------------------------------- */

    window.QuranRecitation = {

        load:
            loadRecitation,

        play:
            playRecitation,

        pause:
            pauseRecitation,

        stop:
            stopRecitation,

        getCurrentSurah:
            function () {

                return {
                    number:
                        currentSurahNumber,

                    name:
                        currentSurahName
                };

            }

    };


})();

/* =========================================================
   QURAN PART 6 — END
   ========================================================= */
</script>





<script>
(function () {
    "use strict";

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        alert("المتصفح لا يدعم التعرف على الصوت");
        return;
    }

    let recognition = null;
    let started = false;
    let isSpeaking = false;
    let recognitionRunning = false;

    // كل الأجزاء تستخدم نفس النظام
    const handlers = [];


    /* =====================================
       توحيد الكلام
       ===================================== */

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


    /* =====================================
       هل التلاوة شغالة؟
       ===================================== */

    function isQuranPlaying() {

        const audio =
            document.getElementById(
                "abdulBasitAudio"
            );

        if (!audio) return false;

        return !audio.paused && !audio.ended;
    }


    /* =====================================
       إيقاف المايك مؤقتًا
       ===================================== */

    function stopListening() {

        if (!recognition) return;

        try {
            recognition.stop();
        } catch (e) {}

        recognitionRunning = false;
    }


    /* =====================================
       تشغيل المايك
       ===================================== */

    function startListening() {

        if (!started) return;

        if (!recognition) {
            createRecognition();
        }

        if (recognitionRunning) return;

        try {

            recognition.start();

            console.log(
                "🎙️ مبصر يستمع..."
            );

        } catch (e) {

            setTimeout(function () {

                if (
                    started &&
                    !recognitionRunning
                ) {

                    try {
                        recognition.start();
                    } catch (e) {}

                }

            }, 300);
        }
    }


    /* =====================================
       كلام مبصر
       ===================================== */

    function speak(text) {

        if (!text) return;

        isSpeaking = true;

        /*
         * أثناء كلام مبصر:
         * المايك مقفول.
         */

        stopListening();


        window.speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.9;
        utterance.pitch = 1;


        utterance.onend = function () {

            isSpeaking = false;

            /*
             * بمجرد انتهاء كلام مبصر:
             * المايك يفتح فورًا.
             */

            if (started) {

                setTimeout(
                    startListening,
                    100
                );

            }
        };


        utterance.onerror = function () {

            isSpeaking = false;

            if (started) {

                setTimeout(
                    startListening,
                    100
                );

            }
        };


        window.speechSynthesis.speak(
            utterance
        );
    }


    /* =====================================
       إيقاف كل الأصوات
       ===================================== */

    function stopAllSound() {

        // إيقاف صوت مبصر
        if (
            "speechSynthesis" in window
        ) {

            window.speechSynthesis.cancel();

        }

        isSpeaking = false;


        // إيقاف تلاوة الشيخ
        const audio =
            document.getElementById(
                "abdulBasitAudio"
            );

        if (audio) {

            try {

                audio.pause();
                audio.currentTime = 0;

            } catch (e) {}

        }


        // لو Part 6 موجود
        if (
            window.QuranRecitation &&
            typeof window.QuranRecitation.pause ===
            "function"
        ) {

            try {
                window.QuranRecitation.pause();
            } catch (e) {}

        }


        /*
         * بعد الكليك:
         * المايك يفتح فورًا.
         */

        if (started) {

            setTimeout(
                startListening,
                100
            );

        }
    }


    /* =====================================
       إنشاء التعرف على الصوت
       ===================================== */

    function createRecognition() {

        recognition =
            new SpeechRecognition();

        recognition.lang = "ar-EG";

        recognition.continuous = false;

        recognition.interimResults = false;

        recognition.maxAlternatives = 5;


        recognition.onstart = function () {

            recognitionRunning = true;

            console.log(
                "🎙️ المايك مفتوح"
            );
        };


        recognition.onresult = function (event) {

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


            console.log(
                "🎙️ مبصر سمع:",
                text
            );


            /*
             * احتياطي:
             * لو حصلت نتيجة رغم إن الصوت شغال،
             * نتجاهلها.
             */

            if (
                isSpeaking ||
                isQuranPlaying()
            ) {

                return;
            }


            /*
             * إرسال الأمر لكل الأجزاء.
             */

            for (const handler of handlers) {

                try {

                    const handled =
                        handler(text);

                    if (handled === true) {
                        return;
                    }

                } catch (error) {

                    console.error(
                        "خطأ في أمر صوتي:",
                        error
                    );

                }
            }
        };


        recognition.onend = function () {

            recognitionRunning = false;


            /*
             * لو النظام شغال ومفيش صوت:
             * رجّع المايك.
             */

            if (
                started &&
                !isSpeaking &&
                !isQuranPlaying()
            ) {

                setTimeout(
                    startListening,
                    100
                );

            }
        };


        recognition.onerror = function (event) {

            recognitionRunning = false;

            console.log(
                "🎙️ خطأ الميكروفون:",
                event.error
            );


            if (
                !started ||
                event.error === "not-allowed" ||
                event.error === "service-not-allowed"
            ) {

                return;
            }


            if (
                !isSpeaking &&
                !isQuranPlaying()
            ) {

                setTimeout(
                    startListening,
                    500
                );

            }
        };
    }


    /* =====================================
       إضافة أوامر الأجزاء الأخرى
       ===================================== */

    function addHandler(handler) {

        if (
            typeof handler === "function"
        ) {

            handlers.push(handler);

            console.log(
                "✅ تم توصيل أمر صوتي جديد"
            );
        }
    }


    /* =====================================
       أول كليك
       ===================================== */

    document.addEventListener(
        "click",
        function () {

            /*
             * لو مبصر أو الشيخ بيتكلم:
             * الكليك يوقف كل الأصوات.
             */

            if (
                isSpeaking ||
                isQuranPlaying()
            ) {

                stopAllSound();

                return;
            }


            /*
             * أول كليك يبدأ النظام.
             */

            if (!started) {

                started = true;

                speak(
                    "مرحبا بك في مبصر، مبصر"
                );

            }

        }
    );


    /* =====================================
       النظام المشترك
       ===================================== */

    window.MobsarVoiceCore = {

        start: function () {

            started = true;

            startListening();

        },


        stop: function () {

            started = false;

            stopListening();

            window.speechSynthesis.cancel();

        },


        speak: speak,

        normalize: normalize,

        addHandler: addHandler,

        getRecognition: function () {

            return recognition;

        },

        stopAllSound: stopAllSound

    };


    console.log(
        "✅ MOBSAR Part 1 جاهز بالنظام الجديد"
    );

})();
</script>





<!-- =========================
     MOBSAR - PART التحكم في الصوت والقراءة
     ========================= -->

<style>
/* الزر الجانبي */
#mobsarSoundBar {
    position: fixed;
    top: 0;
    right: 0;
    width: 48px;
    height: 100vh;

    background: linear-gradient(
        180deg,
        #b879e8,
        #6f3c91,
        #24132f
    );

    border-left: 2px solid #e1bf69;

    display: flex;
    align-items: center;
    justify-content: center;

    z-index: 99999;
}

/* زر إيقاف الصوت */
#mobsarStopSound {
    width: 40px;
    height: 130px;

    border: 1px solid #e1bf69;
    border-radius: 20px;

    background: rgba(0,0,0,0.35);
    color: #e1bf69;

    font-size: 22px;
    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;

    writing-mode: vertical-rl;

    transition: 0.2s;
}

#mobsarStopSound:hover {
    background: rgba(225,191,105,0.18);
    transform: scale(1.03);
}

#mobsarStopSound.active {
    background: rgba(225,191,105,0.25);
}

/* مساحة الصفحة لا تتغطى بالزر */
body {
    padding-right: 48px;
}
</style>


<!-- =========================
     الشريط الجانبي
     ========================= -->

<div id="mobsarSoundBar">

    <button
        id="mobsarStopSound"
        type="button"
        title="إيقاف الصوت"
        aria-label="إيقاف الصوت">

        🔇
        إيقاف الصوت

    </button>

</div>


<script>
(function () {

    "use strict";

    /* =========================================
       حالة القراءة
       ========================================= */

    let mouseReadingEnabled = true;
    let lastReadText = "";
    let lastReadTime = 0;


    /* =========================================
       تطبيع النص
       ========================================= */

    function cleanText(text) {

        return String(text || "")
            .replace(/\s+/g, " ")
            .trim();

    }


    /* =========================================
       إيقاف كل الأصوات
       ========================================= */

    function stopAllMobsarAudio() {

        /* إيقاف كلام مبصر */
        if ("speechSynthesis" in window) {
            window.speechSynthesis.cancel();
        }


        /* إيقاف تلاوة القرآن */
        if (
            window.QuranRecitation &&
            typeof window.QuranRecitation.pause === "function"
        ) {

            try {
                window.QuranRecitation.pause();
            } catch (e) {}

        }


        /* احتياطي لو مشغل التلاوة موجود في الصفحة */
        const audio =
            document.getElementById("abdulBasitAudio");

        if (audio) {

            try {
                audio.pause();
                audio.currentTime = 0;
            } catch (e) {}

        }


        /* أي عناصر audio أخرى */
        document
            .querySelectorAll("audio")
            .forEach(function (item) {

                try {
                    item.pause();
                } catch (e) {}

            });


        console.log("🔇 مبصر: تم إيقاف الصوت");
    }


    /* =========================================
       قراءة النص
       ========================================= */

    function readText(text) {

        if (!mouseReadingEnabled) return;

        text = cleanText(text);

        if (!text) return;

        /*
         منع تكرار نفس النص بسرعة
        */

        const now = Date.now();

        if (
            text === lastReadText &&
            now - lastReadTime < 1200
        ) {
            return;
        }

        lastReadText = text;
        lastReadTime = now;


        if (!("speechSynthesis" in window)) {
            return;
        }


        window.speechSynthesis.cancel();


        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.9;
        utterance.pitch = 1;


        window.speechSynthesis.speak(utterance);

    }


    /* =========================================
       تحديد النص المناسب للعنصر
       ========================================= */

    function getReadableText(element) {

        if (!element) return "";


        /*
         الأولوية لـ data-read
        */

        if (element.dataset && element.dataset.read) {

            return cleanText(
                element.dataset.read
            );

        }


        /*
         aria-label
        */

        const aria =
            element.getAttribute("aria-label");

        if (aria) {
            return cleanText(aria);
        }


        /*
         title
        */

        const title =
            element.getAttribute("title");

        if (title) {
            return cleanText(title);
        }


        /*
         placeholder
        */

        if (
            element.tagName === "INPUT" ||
            element.tagName === "TEXTAREA"
        ) {

            const placeholder =
                element.getAttribute("placeholder");

            if (placeholder) {
                return cleanText(placeholder);
            }

        }


        /*
         النص الموجود داخل العنصر
        */

        return cleanText(
            element.innerText ||
            element.textContent ||
            ""
        );

    }


    /* =========================================
       العناصر التي يمكن قراءتها
       ========================================= */

    const readableSelector = [

        "button",
        "a",
        "h1",
        "h2",
        "h3",
        "h4",

        ".surah-card",
        ".ayah",
        ".ayah-text",

        ".info-panel",
        ".tafsir-text",
        ".tafsir-content",

        ".surah-main-info",
        ".revelation-box",

        "[data-read]"

    ].join(",");


    /* =========================================
       قراءة عند مرور الماوس
       ========================================= */

    document.addEventListener(
        "mouseover",
        function (event) {

            if (!mouseReadingEnabled) return;


            const element =
                event.target.closest(
                    readableSelector
                );


            if (!element) return;


            /*
             منع قراءة عناصر داخل عنصر أكبر
             بشكل متكرر
            */

            if (
                element.closest("#mobsarSoundBar")
            ) {
                return;
            }


            const text =
                getReadableText(element);


            if (!text) return;


            readText(text);

        },
        true
    );


    /* =========================================
       زر إيقاف الصوت
       ========================================= */

    const stopButton =
        document.getElementById(
            "mobsarStopSound"
        );


    if (stopButton) {

        stopButton.addEventListener(
            "click",
            function (event) {

                event.preventDefault();
                event.stopPropagation();


                stopAllMobsarAudio();


                stopButton.classList.add(
                    "active"
                );


                setTimeout(function () {

                    stopButton.classList.remove(
                        "active"
                    );

                }, 300);

            }
        );

    }


    /* =========================================
       إتاحة التحكم من باقي أجزاء مبصر
       ========================================= */

    window.MobsarMouseReader = {

        read: readText,

        stop: stopAllMobsarAudio,

        enable: function () {
            mouseReadingEnabled = true;
        },

        disable: function () {
            mouseReadingEnabled = false;
            stopAllMobsarAudio();
        }

    };


    console.log(
        "✅ MOBSAR Mouse Reader جاهز"
    );

})();
</script>


<script>
(function () {
    "use strict";

    if (!window.MobsarVoiceCore) {
        console.error("❌ Part 1 غير موجود");
        return;
    }

    const voice = window.MobsarVoiceCore;

    let waitingForConfirmation = false;
    let pendingSurah = null;

    function normalize(text) {
        return voice.normalize(text);
    }

    function findSurah(text) {

        const t = normalize(text);

        if (
            t.includes("الفاتحه") ||
            t.includes("فاتحه")
        ) {
            return {
                number: 1,
                name: "الفاتحة"
            };
        }

        if (
            window.QuranData &&
            typeof window.QuranData.getAllSurahs === "function"
        ) {

            const surahs =
                window.QuranData.getAllSurahs();

            if (Array.isArray(surahs)) {

                for (const surah of surahs) {

                    const name =
                        normalize(surah.name || "");

                    if (
                        name &&
                        t.includes(name)
                    ) {
                        return {
                            number: surah.number,
                            name: surah.name
                        };
                    }
                }
            }
        }

        return null;
    }

    function isOpenCommand(text) {

        const t = normalize(text);

        const commands = [
            "افتح",
            "افتحي",
            "افتحلي",
            "اقرا",
            "اقرالي",
            "شغل",
            "شغلي",
            "شغللي",
            "عايز",
            "عايزه",
            "اريد",
            "ممكن"
        ];

        return commands.some(function (command) {
            return t.includes(normalize(command));
        });
    }

    function openSurah(surah) {

        if (
            window.QuranData &&
            typeof window.QuranData.selectSurah === "function"
        ) {
            window.QuranData.selectSurah(
                surah.number
            );
        }

        if (
            window.QuranContent &&
            typeof window.QuranContent.loadSurah === "function"
        ) {
            window.QuranContent.loadSurah(
                surah.number
            );
        }

        if (
            window.QuranPart4 &&
            typeof window.QuranPart4.updateEverything === "function"
        ) {
            window.QuranPart4.updateEverything(
                surah.number
            );
        }

        if (
            window.QuranRecitation &&
            typeof window.QuranRecitation.load === "function"
        ) {
            window.QuranRecitation.load(
                surah.number,
                surah.name
            );
        }

        const mushaf =
            document.querySelector(".mushaf-page");

        if (mushaf) {
            mushaf.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        }
    }

    function startRecitationImmediately(surah) {

        console.log(
            "🔊 تشغيل فوري:",
            surah.name
        );

        if (
            window.QuranRecitation &&
            typeof window.QuranRecitation.load === "function"
        ) {
            window.QuranRecitation.load(
                surah.number,
                surah.name
            );
        }

        // تشغيل فوري
        if (
            window.QuranRecitation &&
            typeof window.QuranRecitation.play === "function"
        ) {
            window.QuranRecitation.play();
        }
    }

    voice.addHandler(function (text) {

        const t = normalize(text);

        console.log(
            "🟣 Part 2 سمع:",
            text
        );

        // السلام
        if (
            t.includes("السلام عليكم")
        ) {

            voice.speak(
                "وعليكم السلام ورحمة الله وبركاته"
            );

            return true;
        }

        // =========================
        // نعم / لا
        // =========================

        if (waitingForConfirmation) {

            if (
                t === "نعم" ||
                t === "ايوه" ||
                t === "اه" ||
                t.includes("ايوه")
            ) {

                const surah =
                    pendingSurah;

                waitingForConfirmation = false;
                pendingSurah = null;

                // ⭐ التلاوة تبدأ فورًا
                startRecitationImmediately(surah);

                // وبعدها الكلام
                voice.speak(
                    "حاضر، تلاوة سورة " +
                    surah.name +
                    " بصوت القارئ عبد الباسط عبد الصمد."
                );

                return true;
            }

            if (
                t === "لا"
            ) {

                waitingForConfirmation = false;
                pendingSurah = null;

                voice.speak("تمام.");

                return true;
            }

            voice.speak(
                "قولي نعم أو لا."
            );

            return true;
        }

        // =========================
        // فتح السورة
        // =========================

        if (isOpenCommand(text)) {

            const surah =
                findSurah(text);

            if (!surah) {

                voice.speak(
                    "اسم السورة إيه؟"
                );

                return true;
            }

            pendingSurah = surah;
            waitingForConfirmation = true;

            openSurah(surah);

            voice.speak(
                "هل تريدين تلاوة سورة " +
                surah.name +
                " بصوت القارئ عبد الباسط عبد الصمد؟ قولي نعم أو لا."
            );

            return true;
        }

        return false;
    });

    console.log(
        "✅ Part 2: تشغيل التلاوة فور سماع نعم"
    );

})();
</script>









<script>
(function () {
    "use strict";

    if (!window.MobsarVoiceCore) {
        console.error("❌ Part 1 غير موجود");
        return;
    }

    const voice = window.MobsarVoiceCore;

    let waitingForInfoConfirmation = false;
    let pendingInfoSurah = null;

    function normalize(text) {
        return voice.normalize(text);
    }

    // ==========================================
    // البحث عن السورة
    // ==========================================

    function findSurah(text) {

        const t = normalize(text);

        if (
            t.includes("الفاتحه") ||
            t.includes("فاتحه")
        ) {
            return {
                number: 1,
                name: "الفاتحة"
            };
        }

        if (
            window.QuranData &&
            typeof window.QuranData.getAllSurahs === "function"
        ) {

            const surahs =
                window.QuranData.getAllSurahs();

            if (Array.isArray(surahs)) {

                for (const surah of surahs) {

                    const name =
                        normalize(surah.name || "");

                    if (
                        name &&
                        t.includes(name)
                    ) {
                        return {
                            number: surah.number,
                            name: surah.name
                        };
                    }
                }
            }
        }

        return null;
    }

    // ==========================================
    // أمر المعلومات
    // ==========================================

    function isInfoCommand(text) {

        const t = normalize(text);

        return (
            t.includes("معلومات") ||
            t.includes("معلومات عن") ||
            t.includes("تفاصيل") ||
            t.includes("تفاصيل عن") ||
            t.includes("بيانات") ||
            t.includes("اعرف معلومات")
        );
    }

    // ==========================================
    // تحديد قسم المعلومات الحقيقي
    // ==========================================

    function getInfoSection() {

        // أهم جزء: العناصر التي Part 4 بيحدثها
        const infoItems =
            Array.from(
                document.querySelectorAll(
                    "[data-surah-info]"
                )
            );

        if (infoItems.length > 0) {

            /*
             * نحاول الوصول لأقرب حاوية تحتوي
             * على جميع بيانات السورة.
             */

            let candidates = [];

            infoItems.forEach(function (item) {

                let parent = item.parentElement;

                for (let i = 0; i < 6 && parent; i++) {

                    if (
                        parent.querySelectorAll(
                            "[data-surah-info]"
                        ).length === infoItems.length
                    ) {
                        candidates.push(parent);
                    }

                    parent = parent.parentElement;
                }
            });

            if (candidates.length > 0) {

                // نختار أصغر حاوية مشتركة مناسبة
                candidates.sort(function (a, b) {
                    return (
                        a.querySelectorAll("*").length -
                        b.querySelectorAll("*").length
                    );
                });

                return candidates[0];
            }

            return infoItems[0].parentElement;
        }

        // بدائل من تركيب الصفحة الموجود
        const selectors = [
            ".details-grid",
            ".surah-details",
            ".surah-information",
            ".surah-info",
            ".information-section",
            ".info-section"
        ];

        for (const selector of selectors) {

            const element =
                document.querySelector(selector);

            if (element) {
                return element;
            }
        }

        return null;
    }

    // ==========================================
    // إخفاء باقي أجزاء المحتوى
    // ==========================================

    function showOnlyInformation(infoSection) {

        if (!infoSection) return;

        /*
         * نبحث عن أقسام الصفحة الرئيسية فقط،
         * حتى لا نخفي عناصر داخل قسم المعلومات نفسه.
         */

        const mainSections =
            Array.from(
                document.querySelectorAll(
                    "main > section, main > article, " +
                    ".page-section, .content-section"
                )
            );

        mainSections.forEach(function (section) {

            if (
                section === infoSection ||
                section.contains(infoSection) ||
                infoSection.contains(section)
            ) {
                section.style.display = "";
            } else {
                section.style.display = "none";
            }
        });

        /*
         * لو قسم المعلومات موجود داخل عنصر أكبر،
         * نظهر الحاوية الخاصة به.
         */

        infoSection.style.display = "";

        /*
         * نضمن عدم إخفائه بسبب display سابق.
         */

        infoSection.hidden = false;
        infoSection.removeAttribute("hidden");

        /*
         * رفع القسم لأعلى الشاشة.
         */

        setTimeout(function () {

            infoSection.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });

            window.scrollTo({
                top: Math.max(
                    0,
                    infoSection.getBoundingClientRect().top +
                    window.scrollY -
                    10
                ),
                behavior: "smooth"
            });

        }, 100);
    }

    // ==========================================
    // استخراج كل المعلومات الموجودة داخل القسم
    // ==========================================

    function collectAllInformation(infoSection, surah) {

        if (!infoSection) return "";

        const pieces = [];

        function add(text) {

            if (!text) return;

            text = text
                .replace(/\s+/g, " ")
                .trim();

            if (!text) return;

            if (!pieces.includes(text)) {
                pieces.push(text);
            }
        }

        // --------------------------------------
        // أولًا: عناصر data-surah-info
        // --------------------------------------

        const infoItems =
            infoSection.querySelectorAll(
                "[data-surah-info]"
            );

        infoItems.forEach(function (item) {

            const value =
                item.textContent.trim();

            const type =
                (
                    item.getAttribute(
                        "data-surah-info"
                    ) || ""
                ).toLowerCase();

            if (!value) return;

            if (type === "name") {
                add("اسم السورة: " + value);
            }

            else if (type === "number") {
                add("رقم السورة: " + value);
            }

            else if (type === "ayahs") {
                add("عدد الآيات: " + value);
            }

            else if (type === "revelation") {
                add("نوع السورة: " + value);
            }

            else {
                add(value);
            }
        });

        // --------------------------------------
        // ثانيًا: كل مربعات التفاصيل
        // --------------------------------------

        const cards =
            infoSection.querySelectorAll(
                ".detail-card, .info-card, .stat-card, " +
                ".surah-detail-card, .card"
            );

        cards.forEach(function (card) {

            const text =
                card.textContent
                    .replace(/\s+/g, " ")
                    .trim();

            add(text);
        });

        // --------------------------------------
        // ثالثًا: النصوص داخل قسم المعلومات
        // --------------------------------------

        const textElements =
            infoSection.querySelectorAll(
                "h1, h2, h3, h4, p, li, strong, " +
                "[data-info], [data-value]"
            );

        textElements.forEach(function (element) {

            const text =
                element.textContent
                    .replace(/\s+/g, " ")
                    .trim();

            add(text);
        });

        // --------------------------------------
        // رابعًا: صندوق معلومات النزول
        // --------------------------------------

        const revelation =
            infoSection.querySelector(
                ".revelation-box, .revelation-info"
            );

        if (revelation) {
            add(
                revelation.textContent
                    .replace(/\s+/g, " ")
                    .trim()
            );
        }

        // --------------------------------------
        // لو البيانات الأساسية لم تظهر
        // --------------------------------------

        if (pieces.length === 0 && surah) {

            add(
                "اسم السورة: " +
                surah.name
            );

            add(
                "رقم السورة: " +
                surah.number
            );
        }

        return pieces.join(". ");
    }

    // ==========================================
    // عرض وقراءة المعلومات
    // ==========================================

    function readSurahInformation(surah) {

        // Part 4 يحدث بيانات السورة
        if (
            window.QuranPart4 &&
            typeof window.QuranPart4.updateEverything ===
            "function"
        ) {

            window.QuranPart4.updateEverything(
                surah.number
            );
        }

        /*
         * ننتظر Part 4 حتى يخلص تحديث الـ DOM
         */
        setTimeout(function () {

            const infoSection =
                getInfoSection();

            if (!infoSection) {

                voice.speak(
                    "لم أجد قسم معلومات السورة في الصفحة."
                );

                return;
            }

            // نظهر المعلومات فقط
            showOnlyInformation(
                infoSection
            );

            /*
             * ننتظر قليلًا حتى يظهر القسم
             * ثم نجمع البيانات.
             */
            setTimeout(function () {

                const information =
                    collectAllInformation(
                        infoSection,
                        surah
                    );

                console.log(
                    "📚 المعلومات التي سيقرأها مبصر:",
                    information
                );

                if (!information) {

                    voice.speak(
                        "لا توجد معلومات متاحة حاليًا عن سورة " +
                        surah.name
                    );

                    return;
                }

                /*
                 * القراءة الكاملة.
                 *
                 * voice.speak في Part 1
                 * يوقف الميكروفون أثناء الكلام،
                 * ثم يعيده بعد انتهاء الكلام.
                 */

                voice.speak(
                    "معلومات سورة " +
                    surah.name +
                    ". " +
                    information
                );

            }, 400);

        }, 1000);
    }

    // ==========================================
    // ربط Part 3 بالميكروفون الأساسي
    // ==========================================

    voice.addHandler(function (text) {

        const t = normalize(text);

        console.log(
            "🟢 Part 3 استلم:",
            text
        );

        // --------------------------------------
        // انتظار نعم / لا
        // --------------------------------------

        if (waitingForInfoConfirmation) {

            if (
                t === "نعم" ||
                t === "ايوه" ||
                t === "اه" ||
                t.includes("ايوه")
            ) {

                const surah =
                    pendingInfoSurah;

                waitingForInfoConfirmation = false;
                pendingInfoSurah = null;

                readSurahInformation(
                    surah
                );

                return true;
            }

            if (t === "لا") {

                waitingForInfoConfirmation = false;
                pendingInfoSurah = null;

                voice.speak("تمام.");

                return true;
            }

            voice.speak(
                "قولي نعم أو لا."
            );

            return true;
        }

        // --------------------------------------
        // أمر معلومات سورة
        // --------------------------------------

        if (isInfoCommand(text)) {

            const surah =
                findSurah(text);

            if (!surah) {

                voice.speak(
                    "اسم السورة إيه؟"
                );

                return true;
            }

            pendingInfoSurah = surah;
            waitingForInfoConfirmation = true;

            voice.speak(
                "هل تريدين معلومات سورة " +
                surah.name +
                "؟ قولي نعم أو لا."
            );

            return true;
        }

        return false;
    });

    console.log(
        "✅ Part 3 جاهز: معلومات كاملة + عرض القسم فقط"
    );

})();
</script>






<script>
(function () {
    "use strict";

    if (!window.MobsarVoiceCore) {
        console.log("❌ MobsarVoiceCore غير موجود");
        return;
    }

    let pendingSurah = null;
    let tafsirMode = false;
    let waitingReadType = false;
    let waitingAyahNumber = false;

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

    function findSurah(text) {
        const t = normalize(text);

        if (
            window.QuranData &&
            typeof window.QuranData.getAllSurahs === "function"
        ) {
            const list = window.QuranData.getAllSurahs();

            if (Array.isArray(list)) {
                for (const s of list) {
                    const name = normalize(s.name || "");

                    if (name && t.includes(name)) {
                        return {
                            number: s.number,
                            name: s.name
                        };
                    }
                }
            }
        }

        if (t.includes("الفاتحه") || t.includes("فاتحه")) {
            return {
                number: 1,
                name: "الفاتحة"
            };
        }

        return null;
    }

    function findTafsirBox() {
        const selectors = [
            ".full-surah-tafsir",
            "#fullSurahTafsirContent",
            ".full-tafsir-content",
            ".generated-full-tafsir"
        ];

        for (const selector of selectors) {
            const el = document.querySelector(selector);

            if (el && el.innerText.trim()) {
                return el;
            }
        }

        return null;
    }

    function findTafsirSection() {
        const box = findTafsirBox();

        if (!box) return null;

        return (
            box.closest(".info-panel") ||
            box.closest(".card") ||
            box.closest("section") ||
            box.parentElement ||
            box
        );
    }

    function showOnlyTafsir() {
        const section = findTafsirSection();

        if (!section) return;

        document.querySelectorAll(
            "main > section, main > article, " +
            ".page-section, .content-section"
        ).forEach(function (el) {

            if (el.contains(section) || section.contains(el)) {
                el.style.display = "";
            } else {
                el.style.display = "none";
            }
        });

        section.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    }

    async function loadFullTafsir(surah) {

        /*
         * نخلي جزء التفسير الموجود عندك
         * هو اللي يجيب التفسير الكامل.
         */
        if (
            window.QuranTafsir &&
            typeof window.QuranTafsir.loadSurah === "function"
        ) {
            await window.QuranTafsir.loadSurah(
                surah.number
            );
        }

        if (
            window.QuranTafsir &&
            typeof window.QuranTafsir.fullSurahTafsir === "function"
        ) {
            await window.QuranTafsir.fullSurahTafsir();
        }

        /*
         * نستنى لحد ما النص نفسه يظهر فعليًا.
         */
        let attempts = 0;

        return new Promise(function (resolve) {

            const timer = setInterval(function () {

                attempts++;

                const box = findTafsirBox();

                if (
                    box &&
                    box.innerText.trim().length > 20
                ) {
                    clearInterval(timer);

                    showOnlyTafsir();

                    resolve(box);
                    return;
                }

                if (attempts >= 30) {
                    clearInterval(timer);
                    resolve(null);
                }

            }, 500);
        });
    }

    async function startTafsir(surah) {

        pendingSurah = surah;
        tafsirMode = true;
        waitingReadType = true;
        waitingAyahNumber = false;

        const box = await loadFullTafsir(surah);

        if (!box) {
            window.MobsarVoiceCore.speak(
                "التفسير اتحط في الصفحة، لكن مش قادر أوصل للنص لقراءته."
            );
            return;
        }

        window.MobsarVoiceCore.speak(
            "هل تريدين قراءة تفسير آية أم تفسير السورة كاملة؟ قولي آية أو سورة كاملة."
        );
    }

    function getAyahNumber(text) {

        const numbers = {
            "الاولي": 1,
            "الاولى": 1,
            "الاول": 1,
            "واحد": 1,
            "اول": 1,

            "الثانيه": 2,
            "الثانية": 2,
            "الثاني": 2,
            "اتنين": 2,
            "اثنين": 2,

            "الثالثه": 3,
            "الثالثة": 3,
            "الثالث": 3,
            "تلاته": 3,
            "ثلاثه": 3,

            "الرابعه": 4,
            "الرابعة": 4,
            "الرابع": 4,
            "اربعه": 4,
            "أربعة": 4,

            "الخامسه": 5,
            "الخامسة": 5,
            "الخامس": 5,
            "خمسه": 5,

            "السادسه": 6,
            "السادسة": 6,
            "السادس": 6,
            "سته": 6,
            "ستة": 6,

            "السابعه": 7,
            "السابعة": 7,
            "السابع": 7,
            "سبعه": 7,

            "الثامنه": 8,
            "الثامنة": 8,
            "الثامن": 8,
            "تمانيه": 8,
            "ثمانيه": 8,

            "التاسعه": 9,
            "التاسعة": 9,
            "التاسع": 9,
            "تسعه": 9,

            "العاشره": 10,
            "العاشرة": 10,
            "العاشر": 10,
            "عشره": 10
        };

        const t = normalize(text);

        const digit = t.match(/\b([0-9]{1,3})\b/);

        if (digit) {
            return Number(digit[1]);
        }

        for (const word in numbers) {
            if (t.includes(normalize(word))) {
                return numbers[word];
            }
        }

        return null;
    }

    async function readAyahTafsir(number) {

        if (!pendingSurah) return;

        const surahNumber = pendingSurah.number;

        /*
         * نستخدم دالة التفسير الموجودة أصلًا عندك.
         */
        if (
            window.QuranTafsir &&
            typeof window.QuranTafsir.loadSurah === "function"
        ) {
            await window.QuranTafsir.loadSurah(
                surahNumber
            );
        }

        if (
            window.QuranTafsir &&
            typeof window.QuranTafsir.selectAyah === "function"
        ) {
            await window.QuranTafsir.selectAyah(
                number
            );
        }

        /*
         * ننتظر النص الذي أنشأه Part 5.
         */
        let attempts = 0;

        const timer = setInterval(function () {

            attempts++;

            const box =
                document.querySelector(".tafsir-text") ||
                document.querySelector(".tafsir-content");

            if (
                box &&
                box.innerText.trim().length > 10
            ) {
                clearInterval(timer);

                box.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

                window.MobsarVoiceCore.speak(
                    box.innerText.trim()
                );
            }

            if (attempts >= 20) {
                clearInterval(timer);
            }

        }, 400);
    }

    window.MobsarVoiceCore.addHandler(async function (text) {

        const t = normalize(text);

        /*
         * أولًا: أمر تفسير سورة
         */
        if (
            !tafsirMode &&
            (
                t.includes("تفسير") ||
                t.includes("فسر") ||
                t.includes("شرح")
            )
        ) {

            const surah = findSurah(text);

            if (!surah) {
                window.MobsarVoiceCore.speak(
                    "اسم السورة إيه؟"
                );
                return true;
            }

            pendingSurah = surah;

            window.MobsarVoiceCore.speak(
                "هل تريدين تفسير سورة " +
                surah.name +
                "؟ قولي نعم أو لا."
            );

            tafsirMode = true;
            waitingReadType = false;

            return true;
        }

        /*
         * تأكيد فتح التفسير
         */
        if (
            tafsirMode &&
            pendingSurah &&
            !waitingReadType &&
            !waitingAyahNumber &&
            (
                t === "نعم" ||
                t.includes("ايوه") ||
                t === "اه"
            )
        ) {

            waitingReadType = true;

            await loadFullTafsir(pendingSurah);

            window.MobsarVoiceCore.speak(
                "هل تريدين قراءة تفسير آية أم تفسير السورة كاملة؟ قولي آية أو سورة كاملة."
            );

            return true;
        }

        /*
         * رفض التفسير
         */
        if (
            tafsirMode &&
            (
                t === "لا" ||
                t.includes("لأ")
            )
        ) {

            tafsirMode = false;
            waitingReadType = false;
            waitingAyahNumber = false;
            pendingSurah = null;

            window.MobsarVoiceCore.speak("تمام.");

            return true;
        }

        /*
         * اختيار السورة كاملة
         */
        if (
            waitingReadType &&
            (
                t.includes("سوره كامله") ||
                t.includes("السوره كامله") ||
                t.includes("سورة كاملة") ||
                t.includes("السوره") ||
                t === "سوره"
            )
        ) {

            waitingReadType = false;

            const box = findTafsirBox();

            if (box && box.innerText.trim()) {

                showOnlyTafsir();

                window.MobsarVoiceCore.speak(
                    box.innerText.trim()
                );

            } else {

                window.MobsarVoiceCore.speak(
                    "لحظة، لسه بجهز تفسير السورة."
                );

            }

            return true;
        }

        /*
         * اختيار آية
         */
        if (
            waitingReadType &&
            (
                t.includes("ايه") ||
                t.includes("اية")
            )
        ) {

            waitingReadType = false;
            waitingAyahNumber = true;

            window.MobsarVoiceCore.speak(
                "تمام. قولي رقم الآية اللي عايزة تفسيرها."
            );

            return true;
        }

        /*
         * رقم الآية
         */
        if (waitingAyahNumber) {

            const number = getAyahNumber(text);

            if (!number) {
                window.MobsarVoiceCore.speak(
                    "قولي رقم الآية، مثل الآية الأولى أو الثانية."
                );
                return true;
            }

            waitingAyahNumber = false;

            await readAyahTafsir(number);

            return true;
        }

        return false;
    });

    console.log(
        "✅ نظام حوار التفسير الكامل جاهز"
    );

})();
</script>




<script>
/* =====================================================
   MOBSAR NAVIGATION - PART 1
   خريطة صفحات مبصر
   ===================================================== */

(function () {
    "use strict";

    window.MobsarNavigation = {

        pages: {

            الرئيسية: {
                file: "index.php",
                name: "الرئيسية",
                aliases: [
                    "الرئيسية",
                    "الصفحة الرئيسية",
                    "الصفحه الرئيسية",
                    "اندكس",
                    "index"
                ]
            },

            التسجيل: {
                file: "register.php",
                name: "التسجيل",
                aliases: [
                    "التسجيل",
                    "صفحة التسجيل",
                    "تسجيل",
                    "التسجيل الجديد",
                    "register"
                ]
            },

            المهام: {
                file: "tasks.php",
                name: "المهام",
                aliases: [
                    "المهام",
                    "مهام",
                    "مهمة",
                    "صفحة المهام"
                ]
            },

            التقييم: {
                file: "evaluation.php",
                name: "تقييم الإنجازات",
                aliases: [
                    "تقييم الإنجازات",
                    "تقييم الانجازات",
                    "الإنجازات",
                    "الانجازات",
                    "التقييم",
                    "صفحة التقييم"
                ]
            },

            المواعيد: {
                file: "schedule.php",
                name: "التقويم والمواعيد والأخبار",
                aliases: [
                    "المواعيد",
                    "التقويم",
                    "الأخبار",
                    "الاخبار",
                    "التقويم والمواعيد",
                    "التقويم والمواعيد والأخبار"
                ]
            },

            التواصل: {
                file: "communication.php",
                name: "التواصل",
                aliases: [
                    "التواصل",
                    "صفحة التواصل"
                ]
            },

            الملفات: {
                file: "notifications.php",
                name: "إدارة الملفات",
                aliases: [
                    "إدارة الملفات",
                    "ادارة الملفات",
                    "الملفات",
                    "صفحة الملفات"
                ]
            },

            المساعد: {
                file: "visual-assistant.php",
                name: "المساعد البصري",
                aliases: [
                    "المساعد البصري",
                    "المساعد",
                    "المساعد البصري"
                ]
            },

            الروحانيات: {
                file: "team.php",
                name: "الروحانيات",
                aliases: [
                    "الروحانيات",
                    "روحانيات",
                    "صفحة الروحانيات"
                ]
            },

            الموظفين: {
                file: "employees.php",
                name: "الموظفون والمدير",
                aliases: [
                    "الموظفين",
                    "الموظفون",
                    "الموظفين والمدير",
                    "الموظفون والمدير",
                    "المدير",
                    "صفحة الموظفين"
                ]
            },

            الإعدادات: {
                file: "settings.php",
                name: "الإعدادات",
                aliases: [
                    "الإعدادات",
                    "الاعدادات",
                    "اعدادات",
                    "صفحة الإعدادات"
                ]
            },

            excel: {
                file: "excel.php",
                name: "Excel",
                aliases: [
                    "اكسل",
                    "إكسل",
                    "excel",
                    "برنامج اكسل"
                ]
            },

            word: {
                file: "word.php",
                name: "Word",
                aliases: [
                    "وورد",
                    "ورد",
                    "word",
                    "برنامج وورد"
                ]
            },

            powerpoint: {
                file: "powerpoint.php",
                name: "PowerPoint",
                aliases: [
                    "باوربوينت",
                    "باور بوينت",
                    "بوربوينت",
                    "powerpoint",
                    "برزنتيشن"
                ]
            },

            القرآن: {
                file: "Quran.php",
                name: "القرآن",
                aliases: [
                    "القرآن",
                    "القران",
                    "المصحف",
                    "صفحة القرآن",
                    "صفحة القران",
                    "صفحة المصحف"
                ]
            },

            الأذكار: {
                file: "Azkar.php",
                name: "الأذكار",
                aliases: [
                    "الأذكار",
                    "الاذكار",
                    "ذكر",
                    "أذكار",
                    "صفحة الأذكار"
                ]
            },

            الأحاديث: {
                file: "Hadith.php",
                name: "الأحاديث",
                aliases: [
                    "الأحاديث",
                    "الاحاديث",
                    "حديث",
                    "أحاديث",
                    "صفحة الأحاديث"
                ]
            },

            الدعاء: {
                file: "Duaa.php",
                name: "الدعاء",
                aliases: [
                    "الدعاء",
                    "دعاء",
                    "الأدعية",
                    "الادعية",
                    "صفحة الدعاء"
                ]
            },

            الصلاة: {
                file: "Prayer.php",
                name: "الصلاة",
                aliases: [
                    "الصلاة",
                    "الصلاه",
                    "مواقيت الصلاة",
                    "صفحة الصلاة"
                ]
            },

            الأنبياء: {
                file: "Prophets.php",
                name: "قصص الأنبياء",
                aliases: [
                    "الأنبياء",
                    "الانبياء",
                    "قصص الأنبياء",
                    "قصص الانبياء",
                    "صفحة الأنبياء"
                ]
            }

        }

    };

})();
</script>

<script>
/* =====================================================
   MOBSAR NAVIGATION - PART 2
   البحث الذكي عن الصفحة
   ===================================================== */

(function () {
    "use strict";

    if (!window.MobsarNavigation) return;

    function normalize(text) {

        if (window.MobsarVoiceCore &&
            typeof window.MobsarVoiceCore.normalize === "function") {

            return window.MobsarVoiceCore.normalize(text);
        }

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


    function findPage(command) {

        const text = normalize(command);

        const pages =
            window.MobsarNavigation.pages;

        const keys = Object.keys(pages);

        for (const key of keys) {

            const page = pages[key];

            for (const alias of page.aliases) {

                if (
                    text.includes(
                        normalize(alias)
                    )
                ) {

                    return page;
                }
            }
        }

        return null;
    }


    window.MobsarNavigation.normalize =
        normalize;

    window.MobsarNavigation.findPage =
        findPage;


    console.log(
        "✅ MOBSAR NAVIGATION PART 2 READY"
    );

})();
</script>






<script>
/* =====================================================
   MOBSAR NAVIGATION - PART 3
   تنفيذ الانتقال
   ===================================================== */

(function () {
    "use strict";

    if (!window.MobsarNavigation) return;

    function getCurrentFile() {

        return window.location.pathname
            .split("/")
            .pop()
            .toLowerCase();
    }


    function goToPage(page) {

        if (!page) return false;

        const current =
            getCurrentFile();

        if (
            current ===
            page.file.toLowerCase()
        ) {

            if (
                window.MobsarVoiceCore &&
                typeof window.MobsarVoiceCore.speak === "function"
            ) {

                window.MobsarVoiceCore.speak(
                    "أنت بالفعل في صفحة " +
                    page.name
                );

            }

            return true;
        }


        window.location.href =
            page.file;

        return true;
    }


    window.MobsarNavigation.getCurrentFile =
        getCurrentFile;

    window.MobsarNavigation.goToPage =
        goToPage;


    console.log(
        "✅ MOBSAR NAVIGATION PART 3 READY"
    );

})();
</script>









<script>
/* =====================================================
   MOBSAR NAVIGATION - PART 4
   أوامر التنقل الصوتية
   ===================================================== */

(function () {
    "use strict";

    function normalize(text) {

        if (
            window.MobsarNavigation &&
            typeof window.MobsarNavigation.normalize === "function"
        ) {
            return window.MobsarNavigation.normalize(text);
        }

        return String(text || "")
            .toLowerCase()
            .trim();
    }


    function isNavigationCommand(text) {

        const words = [
            "افتح",
            "اذهب",
            "روح",
            "وديني",
            "انقلني",
            "انتقل",
            "هات",
            "اعرض"
        ];

        return words.some(function (word) {

            return text.includes(
                normalize(word)
            );

        });
    }


    function handleNavigation(command) {

        const text =
            normalize(command);

        if (!text) return false;


        /* =====================================
           الرئيسية
           ===================================== */

        if (
            text === "الرئيسيه" ||
            text === "الصفحه الرئيسيه" ||
            text.includes("افتح الرئيسيه") ||
            text.includes("افتح الصفحه الرئيسيه") ||
            text.includes("اذهب للرئيسيه") ||
            text.includes("اذهب للصفحه الرئيسيه") ||
            text.includes("روح للرئيسيه") ||
            text.includes("روح للصفحه الرئيسيه") ||
            text.includes("وديني للرئيسيه") ||
            text.includes("وديني للصفحه الرئيسيه")
        ) {

            return window.MobsarNavigation.goToPage(
                window.MobsarNavigation.pages["الرئيسية"]
            );
        }


        /* =====================================
           لو المستخدم قال اسم الصفحة مباشرة
           ===================================== */

        const page =
            window.MobsarNavigation.findPage(
                text
            );


        if (!page) {
            return false;
        }


        /*
         * لو الكلام مجرد "القرآن" أو "المهام"
         * نسمح به.
         *
         * ولو جملة طويلة، نسمح فقط لو
         * فيها فعل تنقل.
         */

        const isOnlyPageName =
            text === normalize(page.name) ||
            page.aliases.some(function (alias) {
                return text === normalize(alias);
            });


        if (
            !isOnlyPageName &&
            !isNavigationCommand(text)
        ) {
            return false;
        }


        return window.MobsarNavigation.goToPage(
            page
        );
    }


    /* =====================================
       توصيله بالميكروفون الأساسي
       ===================================== */

    function connect() {

        if (
            !window.MobsarVoiceCore ||
            typeof window.MobsarVoiceCore.addHandler !== "function"
        ) {

            console.warn(
                "⚠️ MobsarVoiceCore غير جاهز"
            );

            return;
        }


        window.MobsarVoiceCore.addHandler(
            handleNavigation
        );


        console.log(
            "✅ تم توصيل أوامر التنقل بنظام مبصر الأساسي"
        );
    }


    if (
        window.MobsarVoiceCore
    ) {

        connect();

    } else {

        window.addEventListener(
            "load",
            connect,
            { once: true }
        );

    }

})();
</script>





</body>
</html>