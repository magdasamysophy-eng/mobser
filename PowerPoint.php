<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>MABSAR | PowerPoint</title>

<style>

/* =====================================
   BASIC
===================================== */

* {
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: "Segoe UI", Tahoma, Arial, sans-serif;
    background: #e7eaee;
    color: #222;
    overflow: hidden;
}


/* =====================================
   HEADER
===================================== */

.ppt-header {

    height: 56px;

    background: #b7472a;

    color: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 16px;

    position: relative;

    box-shadow: 0 2px 5px rgba(0,0,0,.20);

    z-index: 10;
}


.ppt-brand {

    display: flex;

    align-items: center;

    gap: 9px;

    font-size: 16px;

    font-weight: 800;
}


.ppt-icon {

    width: 34px;

    height: 34px;

    background: white;

    color: #b7472a;

    border-radius: 5px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 21px;

    font-weight: 900;
}


.document-name {

    position: absolute;

    left: 50%;

    transform: translateX(-50%);

    font-size: 15px;

    font-weight: 700;

    white-space: nowrap;
}


.ppt-home {

    text-decoration: none;

    color: #b7472a;

    background: white;

    padding: 7px 14px;

    border-radius: 5px;

    font-size: 13px;

    font-weight: 800;

    transition: .2s;
}


.ppt-home:hover,
.ppt-home:focus {

    background: #ffe9e2;

}


/* =====================================
   TABS
===================================== */

.ppt-tabs {

    height: 40px;

    background: white;

    border-bottom: 1px solid #d0d4d9;

    display: flex;

    align-items: stretch;

    padding-right: 10px;

    gap: 2px;

    overflow-x: auto;
}


.ppt-tab {

    min-width: 82px;

    border: none;

    background: transparent;

    padding: 0 12px;

    font-family: inherit;

    font-size: 13px;

    font-weight: 800;

    color: #333;

    cursor: pointer;

    position: relative;

    white-space: nowrap;
}


.ppt-tab:hover,
.ppt-tab:focus {

    background: #f7f1ef;

    outline: none;
}


.ppt-tab.active {

    color: #b7472a;

}


.ppt-tab.active::after {

    content: "";

    position: absolute;

    bottom: 0;

    right: 9px;

    left: 9px;

    height: 3px;

    background: #b7472a;

    border-radius: 3px 3px 0 0;
}


/* =====================================
   SMALL RIBBON
===================================== */

.ppt-ribbon {

    height: 86px;

    background: white;

    border-bottom: 1px solid #cfd3d8;

    display: flex;

    align-items: stretch;

    padding: 4px 8px;

    gap: 2px;

    overflow-x: auto;

    overflow-y: hidden;
}


.ribbon-group {

    min-width: max-content;

    padding: 2px 7px;

    border-left: 1px solid #e1e3e6;

    display: flex;

    flex-direction: column;

    justify-content: space-between;
}


.ribbon-buttons {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 3px;

    flex-wrap: nowrap;
}


/* =====================================
   BUTTON
===================================== */

.ribbon-button {

    min-width: 58px;

    height: 57px;

    border: 1px solid transparent;

    background: white;

    border-radius: 4px;

    font-family: inherit;

    font-size: 11px;

    font-weight: 800;

    color: #333;

    cursor: pointer;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    gap: 3px;

    padding: 3px 5px;

    white-space: nowrap;

    transition: .15s;
}


.ribbon-button:hover {

    background: #fff4f0;

    border-color: #dfaa9a;
}


.ribbon-button:focus-visible {

    outline: 2px solid #e26f50;

    outline-offset: 1px;
}


.button-icon {

    font-size: 19px;

    line-height: 20px;
}


.group-title {

    text-align: center;

    color: #666;

    font-size: 10px;

    font-weight: 800;

    line-height: 12px;
}


/* =====================================
   FONT CONTROLS
===================================== */

.font-group {

    min-width: 190px;
}


.font-buttons {

    gap: 4px;

    flex-wrap: wrap;
}


.ribbon-select {

    height: 27px;

    border: 1px solid #c8cdd2;

    border-radius: 3px;

    background: white;

    padding: 0 6px;

    font-family: inherit;

    font-size: 11px;

    font-weight: 700;

}


.format-button {

    width: 29px;

    height: 27px;

    border: 1px solid #c8cdd2;

    border-radius: 3px;

    background: white;

    font-size: 14px;

    font-weight: 800;

    cursor: pointer;
}


.format-button:hover {

    background: #fff4f0;

}


/* =====================================
   WORKSPACE
===================================== */

.ppt-workspace {

    height: calc(100vh - 222px);

    display: flex;

    background: #e5e8ec;

    overflow: hidden;
}


/* =====================================
   SLIDES PANEL
===================================== */

.slides-panel {

    width: 190px;

    flex-shrink: 0;

    background: #f7f8fa;

    border-left: 1px solid #cdd2d7;

    padding: 10px;

    overflow-y: auto;
}


.slides-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 10px;

    font-size: 14px;

    font-weight: 900;

    color: #333;
}


.slide-add-small {

    width: 29px;

    height: 29px;

    border: none;

    border-radius: 4px;

    background: #b7472a;

    color: white;

    font-size: 19px;

    font-weight: 900;

    cursor: pointer;
}


.slide-thumbnail {

    width: 100%;

    aspect-ratio: 16 / 9;

    background: white;

    border: 2px solid transparent;

    border-radius: 4px;

    margin-bottom: 9px;

    position: relative;

    cursor: pointer;

    box-shadow: 0 1px 5px rgba(0,0,0,.14);

    overflow: hidden;
}


.slide-thumbnail.active {

    border-color: #b7472a;

}


.slide-number {

    position: absolute;

    bottom: 3px;

    right: 5px;

    font-size: 9px;

    font-weight: 700;

    color: #777;
}


.thumbnail-title {

    position: absolute;

    top: 25%;

    right: 7%;

    left: 7%;

    text-align: center;

    font-size: 9px;

    color: #444;

    font-weight: 800;
}


.thumbnail-subtitle {

    position: absolute;

    top: 48%;

    right: 10%;

    left: 10%;

    text-align: center;

    font-size: 6px;

    color: #777;
}


/* =====================================
   SLIDE AREA
===================================== */

.slide-area {

    flex: 1;

    min-width: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e5e8ec;

    overflow: auto;

    padding: 25px;
}


.slide-stage {

    width: min(1100px, 90%);

    aspect-ratio: 16 / 9;

    background: white;

    box-shadow: 0 4px 18px rgba(0,0,0,.22);

    position: relative;

    overflow: hidden;
}


.slide-content {

    position: absolute;

    inset: 0;

    padding: 55px;

    background: white;
}


.slide-title {

    font-size: 42px;

    font-weight: 800;

    color: #222;

    text-align: center;

    margin-top: 90px;

    outline: none;
}


.slide-subtitle {

    font-size: 21px;

    font-weight: 600;

    color: #666;

    text-align: center;

    margin-top: 25px;

    outline: none;
}


.slide-title:focus,
.slide-subtitle:focus {

    outline: 2px dashed #b7472a;

    outline-offset: 5px;
}


/* =====================================
   STATUS BAR
===================================== */

.ppt-status {

    height: 40px;

    background: #b7472a;

    color: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 14px;

    font-size: 12px;

    font-weight: 700;
}


.status-section {

    display: flex;

    align-items: center;

    gap: 18px;
}


/* =====================================
   MOBILE
===================================== */

@media (max-width: 800px) {

    .document-name {
        display: none;
    }

    .ppt-ribbon {
        height: 82px;
    }

    .ribbon-button {
        min-width: 52px;
        height: 54px;
        font-size: 10px;
    }

    .button-icon {
        font-size: 17px;
    }

    .slides-panel {
        width: 145px;
    }

    .slide-area {
        padding: 12px;
    }

    .slide-title {
        font-size: 28px;
        margin-top: 50px;
    }

    .slide-subtitle {
        font-size: 15px;
    }

}

</style>
</head>

<body>


<!-- HEADER -->

<header class="ppt-header">

    <div class="ppt-brand">

        <div class="ppt-icon">
            P
        </div>

        <span>
            MABSAR | PowerPoint
        </span>

    </div>


    <div class="document-name">
        عرض تقديمي جديد
    </div>


    <a
        href="index.php"
        class="ppt-home">

        الرئيسية

    </a>

</header>


<!-- TABS -->

<nav class="ppt-tabs">

    <button class="ppt-tab active">
        الصفحة الرئيسية
    </button>

    <button class="ppt-tab">
        إدراج
    </button>

    <button class="ppt-tab">
        تصميم
    </button>

    <button class="ppt-tab">
        انتقالات
    </button>

    <button class="ppt-tab">
        حركات
    </button>

    <button class="ppt-tab">
        عرض الشرائح
    </button>

    <button class="ppt-tab">
        مراجعة
    </button>

    <button class="ppt-tab">
        عرض
    </button>

</nav>


<!-- RIBBON -->

<section class="ppt-ribbon">


    <!-- الشرائح -->

    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button class="ribbon-button">

                <span class="button-icon">➕</span>

                <span>شريحة جديدة</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">📑</span>

                <span>تكرار</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">🗑️</span>

                <span>حذف</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">▦</span>

                <span>تخطيط</span>

            </button>

        </div>

        <div class="group-title">
            الشرائح
        </div>

    </div>


    <!-- تنسيق الخط -->

    <div class="ribbon-group font-group">

        <div class="ribbon-buttons">

            <select class="ribbon-select">

                <option>Arial</option>

                <option>Calibri</option>

                <option>Tahoma</option>

                <option>Times New Roman</option>

            </select>


            <select class="ribbon-select">

                <option>18</option>

                <option>20</option>

                <option>24</option>

                <option>28</option>

                <option>32</option>

                <option>36</option>

                <option>44</option>

            </select>


            <button class="format-button">
                <b>B</b>
            </button>


            <button class="format-button">
                <i>I</i>
            </button>


            <button class="format-button">
                <u>U</u>
            </button>

        </div>

        <div class="group-title">
            الخط
        </div>

    </div>


    <!-- إدراج -->

    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button class="ribbon-button">

                <span class="button-icon">T</span>

                <span>نص</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">🖼️</span>

                <span>صورة</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">🎬</span>

                <span>فيديو</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">▦</span>

                <span>جدول</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">📊</span>

                <span>مخطط</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">◇</span>

                <span>أشكال</span>

            </button>

        </div>

        <div class="group-title">
            إدراج
        </div>

    </div>


    <!-- محاذاة -->

    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button class="ribbon-button">

                <span class="button-icon">⬅</span>

                <span>يسار</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">↔</span>

                <span>توسيط</span>

            </button>


            <button class="ribbon-button">

                <span class="button-icon">➡</span>

                <span>يمين</span>

            </button>

        </div>

        <div class="group-title">
            فقرة
        </div>

    </div>


</section>

<!-- =====================================
     PART 2
     SLIDES WORKSPACE
===================================== -->

<main class="ppt-workspace">


    <!-- =================================
         SLIDES PANEL
    ================================= -->

    <aside class="slides-panel">


        <div class="slides-header">

            <span>
                الشرائح
            </span>


            <button
                class="slide-add-small"
                id="smallAddSlideBtn"
                aria-label="إضافة شريحة">

                +

            </button>

        </div>


        <!-- قائمة الشرائح -->

        <div id="slidesList">


            <!-- الشريحة الأولى -->

            <div
                class="slide-thumbnail active"
                data-slide="1"
                tabindex="0"
                aria-label="الشريحة الأولى">


                <div class="thumbnail-title">

                    عنوان العرض

                </div>


                <div class="thumbnail-subtitle">

                    العنوان الفرعي

                </div>


                <span class="slide-number">

                    1

                </span>


            </div>


        </div>


    </aside>



    <!-- =================================
         MAIN SLIDE AREA
    ================================= -->

    <section class="slide-area">


        <div
            class="slide-stage"
            id="slideStage">


            <!-- الشريحة الحالية -->

            <div
                class="slide-content"
                id="currentSlide"
                data-slide-type="title">


                <!-- العنوان -->

                <div
                    class="slide-title"
                    id="slideTitle"
                    contenteditable="true"
                    spellcheck="false">

                    عنوان العرض

                </div>


                <!-- العنوان الفرعي -->

                <div
                    class="slide-subtitle"
                    id="slideSubtitle"
                    contenteditable="true"
                    spellcheck="false">

                    العنوان الفرعي

                </div>


            </div>


        </div>


    </section>


</main>



<!-- =====================================
     STATUS BAR
===================================== -->

<footer class="ppt-status">


    <div class="status-section">


        <span id="slideCounter">

            الشريحة 1 من 1

        </span>


        <span>

            العربية

        </span>


    </div>


    <div class="status-section">


        <span id="voiceStatus">

            🎙️ الاستماع الصوتي جاهز

        </span>


        <span>

            عرض عادي

        </span>


        <span>

            100%

        </span>


    </div>


</footer>
<!-- =====================================
     PART 3
     SLIDE LAYOUTS + TRANSITIONS
===================================== -->


<!-- =====================================
     HIDDEN LAYOUT PANEL
===================================== -->

<div
    id="layoutPanel"
    class="ppt-floating-panel">


    <div class="panel-header">

        <strong>
            تخطيط الشريحة
        </strong>

        <button
            type="button"
            class="panel-close"
            id="closeLayoutPanel">

            ×

        </button>

    </div>


    <div class="layout-grid">


        <button
            class="layout-option"
            data-layout="title">

            <span class="layout-preview title-preview">

                <b></b>

                <i></i>

            </span>

            <strong>
                عنوان
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="title-content">

            <span class="layout-preview title-content-preview">

                <b></b>

                <i></i>

                <i></i>

            </span>

            <strong>
                عنوان ومحتوى
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="two-content">

            <span class="layout-preview two-content-preview">

                <b></b>

                <i></i>

                <i></i>

            </span>

            <strong>
                محتويان
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="image">

            <span class="layout-preview image-preview">

                <b></b>

                <i></i>

            </span>

            <strong>
                صورة
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="video">

            <span class="layout-preview video-preview">

                <b></b>

                <i></i>

            </span>

            <strong>
                فيديو
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="table">

            <span class="layout-preview table-preview">

                <b></b>

                <i></i>

                <i></i>

                <i></i>

            </span>

            <strong>
                جدول
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="chart">

            <span class="layout-preview chart-preview">

                <b></b>

                <i></i>

                <i></i>

                <i></i>

            </span>

            <strong>
                مخطط
            </strong>

        </button>


        <button
            class="layout-option"
            data-layout="blank">

            <span class="layout-preview blank-preview">

            </span>

            <strong>
                فارغة
            </strong>

        </button>


    </div>

</div>



<!-- =====================================
     TRANSITION PANEL
===================================== -->

<div
    id="transitionPanel"
    class="ppt-floating-panel">


    <div class="panel-header">

        <strong>
            انتقالات الشرائح
        </strong>

        <button
            type="button"
            class="panel-close"
            id="closeTransitionPanel">

            ×

        </button>

    </div>


    <div class="setting-row">

        <label for="transitionType">

            نوع الانتقال

        </label>


        <select id="transitionType">

            <option value="none">
                بدون انتقال
            </option>

            <option value="fade">
                تلاشي
            </option>

            <option value="slide">
                انزلاق
            </option>

            <option value="push">
                دفع
            </option>

            <option value="zoom">
                تكبير
            </option>

        </select>

    </div>


    <div class="setting-row">

        <label for="transitionDuration">

            مدة الانتقال

        </label>


        <div class="number-control">

            <input
                type="number"
                id="transitionDuration"
                min="0.2"
                max="10"
                step="0.1"
                value="1">


            <span>
                ثانية
            </span>

        </div>

    </div>


    <div class="setting-row">

        <label for="autoSlideTime">

            الانتقال التلقائي

        </label>


        <div class="number-control">

            <input
                type="number"
                id="autoSlideTime"
                min="0"
                max="300"
                value="5">


            <span>
                ثانية
            </span>

        </div>

    </div>


    <div class="panel-actions">

        <button
            id="applyTransitionBtn"
            class="panel-main-button">

            تطبيق على الشريحة

        </button>


        <button
            id="applyAllTransitionBtn"
            class="panel-secondary-button">

            تطبيق على كل الشرائح

        </button>

    </div>

</div>



<!-- =====================================
     ANIMATION PANEL
===================================== -->

<div
    id="animationPanel"
    class="ppt-floating-panel">


    <div class="panel-header">

        <strong>
            حركات العناصر
        </strong>


        <button
            type="button"
            class="panel-close"
            id="closeAnimationPanel">

            ×

        </button>

    </div>


    <div class="setting-row">

        <label for="animationType">

            نوع الحركة

        </label>


        <select id="animationType">

            <option value="none">
                بدون حركة
            </option>

            <option value="fade">
                ظهور تدريجي
            </option>

            <option value="slide">
                دخول من الجانب
            </option>

            <option value="zoom">
                تكبير
            </option>

            <option value="bounce">
                ارتداد
            </option>

        </select>

    </div>


    <div class="setting-row">

        <label for="animationDuration">

            مدة الحركة

        </label>


        <div class="number-control">

            <input
                type="number"
                id="animationDuration"
                min="0.2"
                max="10"
                step="0.1"
                value="1">


            <span>
                ثانية
            </span>

        </div>

    </div>


    <div class="panel-actions">

        <button
            id="applyAnimationBtn"
            class="panel-main-button">

            تطبيق الحركة

        </button>

    </div>

</div>



<!-- =====================================
     INSERT IMAGE
===================================== -->

<input
    type="file"
    id="imageFileInput"
    accept="image/*"
    hidden>



<!-- =====================================
     INSERT VIDEO
===================================== -->

<input
    type="file"
    id="videoFileInput"
    accept="video/*"
    hidden>



<!-- =====================================
     INSERT AUDIO
===================================== -->

<input
    type="file"
    id="audioFileInput"
    accept="audio/*"
    hidden>



<!-- =====================================
     EXTRA CSS
===================================== -->

<style>


/* =====================================
   FLOATING PANELS
===================================== */

.ppt-floating-panel {

    display: none;

    position: fixed;

    top: 150px;

    right: 50%;

    transform: translateX(50%);

    width: 390px;

    max-width: 92vw;

    max-height: 75vh;

    overflow-y: auto;

    background: #ffffff;

    border: 1px solid #c9ced4;

    border-radius: 8px;

    box-shadow: 0 8px 30px rgba(0,0,0,.25);

    z-index: 1000;

    padding: 14px;

}


.ppt-floating-panel.open {

    display: block;

}


/* =====================================
   PANEL HEADER
===================================== */

.panel-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    border-bottom: 1px solid #e1e4e7;

    padding-bottom: 10px;

    margin-bottom: 12px;

    font-size: 16px;

}


.panel-close {

    width: 30px;

    height: 30px;

    border: none;

    border-radius: 4px;

    background: #f1f2f4;

    color: #444;

    font-size: 20px;

    font-weight: 800;

    cursor: pointer;

}


.panel-close:hover {

    background: #f0d8d0;

}


/* =====================================
   LAYOUT GRID
===================================== */

.layout-grid {

    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 9px;

}


.layout-option {

    border: 1px solid #d7dadd;

    background: white;

    border-radius: 6px;

    padding: 8px 5px;

    min-height: 105px;

    cursor: pointer;

    font-family: inherit;

    color: #333;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: space-between;

    gap: 7px;

}


.layout-option:hover {

    border-color: #b7472a;

    background: #fff8f5;

}


.layout-option:focus-visible {

    outline: 2px solid #b7472a;

}


/* =====================================
   MINI LAYOUT PREVIEWS
===================================== */

.layout-preview {

    width: 76px;

    height: 45px;

    background: white;

    border: 1px solid #bfc4c9;

    position: relative;

    overflow: hidden;

}


.layout-preview b,
.layout-preview i {

    position: absolute;

    display: block;

    background: #b7472a;

}


.layout-preview b {

    height: 4px;

}


.layout-preview i {

    height: 5px;

    background: #bfc4c9;

}


/* TITLE */

.title-preview b {

    width: 55px;

    top: 15px;

    right: 10px;

}


.title-preview i {

    width: 35px;

    top: 27px;

    right: 20px;

}


/* TITLE CONTENT */

.title-content-preview b {

    width: 55px;

    top: 6px;

    right: 10px;

}


.title-content-preview i:first-of-type {

    width: 52px;

    height: 23px;

    top: 16px;

    right: 8px;

}


.title-content-preview i:last-of-type {

    width: 8px;

    height: 23px;

    top: 16px;

    left: 8px;

}


/* TWO CONTENT */

.two-content-preview b {

    width: 55px;

    top: 5px;

    right: 10px;

}


.two-content-preview i:first-of-type {

    width: 25px;

    height: 25px;

    top: 15px;

    right: 8px;

}


.two-content-preview i:last-of-type {

    width: 25px;

    height: 25px;

    top: 15px;

    left: 8px;

}


/* IMAGE */

.image-preview b {

    width: 55px;

    top: 5px;

    right: 10px;

}


.image-preview i {

    width: 55px;

    height: 25px;

    top: 15px;

    right: 10px;

    background: #dfe3e7;

}


/* VIDEO */

.video-preview b {

    width: 55px;

    top: 5px;

    right: 10px;

}


.video-preview i {

    width: 55px;

    height: 25px;

    top: 15px;

    right: 10px;

    background: #333;

}


/* TABLE */

.table-preview b {

    width: 55px;

    top: 4px;

    right: 10px;

}


.table-preview i {

    width: 15px;

    height: 25px;

    top: 14px;

    background: #d9dde1;

}


.table-preview i:nth-of-type(1) {

    right: 10px;

}


.table-preview i:nth-of-type(2) {

    right: 28px;

}


.table-preview i:nth-of-type(3) {

    right: 46px;

}


/* CHART */

.chart-preview b {

    width: 55px;

    top: 5px;

    right: 10px;

}


.chart-preview i {

    bottom: 5px;

    width: 8px;

    background: #b7472a;

}


.chart-preview i:nth-of-type(1) {

    height: 13px;

    right: 12px;

}


.chart-preview i:nth-of-type(2) {

    height: 23px;

    right: 26px;

}


.chart-preview i:nth-of-type(3) {

    height: 31px;

    right: 40px;

}


/* BLANK */

.blank-preview {

    background: white;

}


/* =====================================
   SETTINGS
===================================== */

.setting-row {

    display: flex;

    flex-direction: column;

    gap: 6px;

    margin-bottom: 13px;

}


.setting-row label {

    font-size: 13px;

    font-weight: 800;

    color: #444;

}


.setting-row select,
.setting-row input {

    width: 100%;

    height: 36px;

    border: 1px solid #c9ced3;

    border-radius: 4px;

    background: white;

    padding: 0 9px;

    font-family: inherit;

    font-size: 13px;

    font-weight: 600;

}


.number-control {

    display: flex;

    align-items: center;

    gap: 7px;

}


.number-control input {

    flex: 1;

}


.number-control span {

    font-size: 12px;

    font-weight: 700;

    color: #666;

    white-space: nowrap;

}


/* =====================================
   PANEL BUTTONS
===================================== */

.panel-actions {

    display: flex;

    gap: 8px;

    margin-top: 15px;

}


.panel-actions button {

    flex: 1;

    min-height: 38px;

    border-radius: 5px;

    font-family: inherit;

    font-size: 12px;

    font-weight: 800;

    cursor: pointer;

}


.panel-main-button {

    border: none;

    background: #b7472a;

    color: white;

}


.panel-main-button:hover {

    background: #96391f;

}


.panel-secondary-button {

    border: 1px solid #b7472a;

    background: white;

    color: #b7472a;

}


.panel-secondary-button:hover {

    background: #fff2ed;

}


/* =====================================
   SMALL SCREENS
===================================== */

@media (max-width: 600px) {

    .layout-grid {

        grid-template-columns: repeat(2, 1fr);

    }

    .ppt-floating-panel {

        top: 110px;

    }

}

</style>



<!-- =====================================
     PART 4
     EXTRA DESIGN + VOICE STATUS
===================================== -->


<!-- =====================================
     VOICE COMMAND STATUS
===================================== -->

<div
    id="voiceCommandStatus"
    class="voice-command-status"
    aria-live="polite">

    <span class="voice-status-icon">
        🎙️
    </span>

    <span id="voiceCommandText">
        الاستماع الصوتي جاهز
    </span>

</div>



<!-- =====================================
     OBJECT INFO
===================================== -->

<div
    id="objectInfoPanel"
    class="object-info-panel">


    <div class="object-info-title">

        <span>
            العنصر المحدد
        </span>


        <button
            id="closeObjectInfo"
            type="button">

            ×

        </button>

    </div>


    <div id="objectInfoContent">

        لم يتم تحديد أي عنصر.

    </div>


</div>



<!-- =====================================
     SLIDE REVIEW
===================================== -->

<div
    id="reviewPanel"
    class="ppt-review-panel">


    <div class="review-header">

        <strong>
            مراجعة الشريحة
        </strong>


        <button
            id="closeReviewPanel"
            type="button">

            ×

        </button>

    </div>


    <div
        id="reviewContent"
        class="review-content">

        لا توجد مراجعة بعد.

    </div>

</div>



<!-- =====================================
     PRESENTATION MODE
===================================== -->

<div
    id="presentationMode"
    class="presentation-mode">


    <div
        id="presentationSlide"
        class="presentation-slide">


        <div
            id="presentationContent"
            class="presentation-content">

        </div>


    </div>



    <!-- CONTROLS -->

    <div class="presentation-controls">


        <button
            id="presentationPrevious"
            aria-label="الشريحة السابقة">

            ◀

        </button>


        <span id="presentationCounter">

            1 / 1

        </span>


        <button
            id="presentationNext"
            aria-label="الشريحة التالية">

            ▶

        </button>


        <button
            id="presentationPause"
            aria-label="إيقاف العرض">

            ⏸

        </button>


        <button
            id="presentationExit"
            aria-label="الخروج من العرض">

            ✕

        </button>


    </div>

</div>



<!-- =====================================
     FINAL CSS
===================================== -->

<style>


/* =====================================
   VOICE STATUS
===================================== */

.voice-command-status {

    position: fixed;

    bottom: 52px;

    left: 50%;

    transform: translateX(-50%);

    min-width: 230px;

    max-width: 80%;

    padding: 8px 15px;

    background: rgba(255,255,255,.96);

    border: 1px solid #d0d4d8;

    border-radius: 20px;

    box-shadow: 0 3px 12px rgba(0,0,0,.15);

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    font-size: 12px;

    font-weight: 800;

    color: #444;

    z-index: 500;

}


.voice-status-icon {

    font-size: 17px;

}


.voice-command-status.listening {

    border-color: #b7472a;

    color: #b7472a;

}


/* =====================================
   OBJECT INFO
===================================== */

.object-info-panel {

    display: none;

    position: fixed;

    left: 20px;

    bottom: 55px;

    width: 260px;

    max-width: calc(100vw - 40px);

    background: white;

    border: 1px solid #cfd3d8;

    border-radius: 7px;

    box-shadow: 0 5px 20px rgba(0,0,0,.20);

    z-index: 600;

    overflow: hidden;

}


.object-info-panel.open {

    display: block;

}


.object-info-title {

    height: 42px;

    padding: 0 12px;

    background: #f4f5f6;

    border-bottom: 1px solid #ddd;

    display: flex;

    align-items: center;

    justify-content: space-between;

    font-size: 13px;

    font-weight: 900;

}


.object-info-title button {

    border: none;

    background: transparent;

    font-size: 21px;

    cursor: pointer;

}


#objectInfoContent {

    padding: 14px;

    font-size: 12px;

    line-height: 1.8;

    color: #555;

}


/* =====================================
   REVIEW PANEL
===================================== */

.ppt-review-panel {

    display: none;

    position: fixed;

    top: 130px;

    right: 50%;

    transform: translateX(50%);

    width: 420px;

    max-width: 90vw;

    max-height: 65vh;

    background: white;

    border: 1px solid #cbd0d5;

    border-radius: 8px;

    box-shadow: 0 8px 28px rgba(0,0,0,.25);

    z-index: 900;

    overflow: hidden;

}


.ppt-review-panel.open {

    display: block;

}


.review-header {

    height: 46px;

    background: #f5f6f7;

    border-bottom: 1px solid #ddd;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 14px;

    font-size: 14px;

}


.review-header button {

    border: none;

    background: transparent;

    font-size: 21px;

    font-weight: 800;

    cursor: pointer;

}


.review-content {

    padding: 15px;

    max-height: 55vh;

    overflow-y: auto;

    font-size: 13px;

    line-height: 1.9;

    color: #444;

}


/* =====================================
   PRESENTATION MODE
===================================== */

.presentation-mode {

    display: none;

    position: fixed;

    inset: 0;

    background: #000;

    z-index: 5000;

}


.presentation-mode.active {

    display: flex;

    align-items: center;

    justify-content: center;

}


.presentation-slide {

    width: 100vw;

    height: 100vh;

    background: white;

    position: relative;

    overflow: hidden;

}


.presentation-content {

    position: absolute;

    inset: 0;

}


/* =====================================
   PRESENTATION CONTROLS
===================================== */

.presentation-controls {

    position: fixed;

    bottom: 18px;

    left: 50%;

    transform: translateX(-50%);

    display: flex;

    align-items: center;

    gap: 8px;

    padding: 8px 12px;

    background: rgba(0,0,0,.72);

    border-radius: 25px;

    opacity: .35;

    transition: .2s;

}


.presentation-controls:hover {

    opacity: 1;

}


.presentation-controls button {

    width: 38px;

    height: 32px;

    border: none;

    border-radius: 5px;

    background: white;

    color: #333;

    font-size: 15px;

    font-weight: 900;

    cursor: pointer;

}


.presentation-controls button:hover {

    background: #ffe8e0;

}


.presentation-controls button:focus-visible {

    outline: 2px solid #ff8c6c;

}


#presentationCounter {

    color: white;

    font-size: 12px;

    font-weight: 800;

    min-width: 45px;

    text-align: center;

}


/* =====================================
   ANIMATION CLASSES
===================================== */

.slide-animation-fade {

    animation: slideFade .7s ease;

}


.slide-animation-slide {

    animation: slideIn .7s ease;

}


.slide-animation-zoom {

    animation: slideZoom .7s ease;

}


@keyframes slideFade {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }

}


@keyframes slideIn {

    from {
        opacity: 0;
        transform: translateX(80px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }

}


@keyframes slideZoom {

    from {
        opacity: 0;
        transform: scale(.92);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }

}


/* =====================================
   RESPONSIVE
===================================== */

@media (max-width: 600px) {

    .voice-command-status {

        bottom: 48px;

        min-width: 190px;

        font-size: 11px;

    }


    .ppt-review-panel {

        top: 105px;

        width: 94vw;

    }


    .object-info-panel {

        left: 10px;

        bottom: 50px;

    }


    .presentation-controls {

        bottom: 10px;

    }

}

</style>



<!-- =====================================
     END OF POWERPOINT STRUCTURE
===================================== -->

<script>
(function () {
    "use strict";

    let recognition = null;
    let listening = false;
    let keepListening = true;
    let speaking = false;

    const voiceStatus = document.getElementById("voiceStatus");
    const voiceCommandText = document.getElementById("voiceCommandText");

    const handlers = [];

    function cleanText(text) {
        return String(text || "")
            .trim()
            .replace(/[؟?!.,،]/g, "")
            .toLowerCase();
    }

    function speak(text, callback) {

        if (!text) return;

        keepListening = false;

        if (recognition && listening) {
            try {
                recognition.stop();
            } catch (e) {}
        }

        speaking = true;

        window.speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 1.15;
        utterance.pitch = 1;

        utterance.onend = function () {

            speaking = false;

            setTimeout(function () {

                keepListening = true;

                startListening();

                if (callback) {
                    callback();
                }

            }, 100);

        };

        utterance.onerror = function () {

            speaking = false;

            keepListening = true;

            startListening();

            if (callback) {
                callback();
            }

        };

        window.speechSynthesis.speak(utterance);
    }

    function startListening() {

        keepListening = true;

        if (!recognition || listening || speaking) {
            return;
        }

        try {
            recognition.start();
        } catch (e) {}
    }

    function stopListening() {

        keepListening = false;

        if (recognition) {
            try {
                recognition.stop();
            } catch (e) {}
        }
    }

    function addHandler(handler) {
        if (typeof handler === "function") {
            handlers.push(handler);
        }
    }

    function handleVoiceCommand(text) {

        for (let i = 0; i < handlers.length; i++) {

            try {

                const handled =
                    handlers[i](text);

                if (handled === true) {
                    return true;
                }

            } catch (error) {
                console.error(error);
            }
        }

        return false;
    }

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (SpeechRecognition) {

        recognition =
            new SpeechRecognition();

        recognition.lang = "ar-EG";
        recognition.continuous = true;
        recognition.interimResults = false;
        recognition.maxAlternatives = 3;

        recognition.onstart = function () {

            listening = true;

            if (voiceStatus) {
                voiceStatus.textContent =
                    "🎙️ الاستماع الصوتي يعمل";
            }
        };

        recognition.onresult = function (event) {

            if (speaking) return;

            const result =
                event.results[
                    event.results.length - 1
                ];

            const text =
                result[0].transcript.trim();

            if (!text) return;

            if (voiceCommandText) {
                voiceCommandText.textContent =
                    text;
            }

            handleVoiceCommand(text);
        };

        recognition.onend = function () {

            listening = false;

            if (keepListening && !speaking) {

                setTimeout(function () {
                    startListening();
                }, 200);

            }
        };

        recognition.onerror = function (event) {

            listening = false;

            console.log(
                "Speech error:",
                event.error
            );

            if (keepListening && !speaking) {

                setTimeout(function () {
                    startListening();
                }, 500);

            }
        };

    } else {

        if (voiceStatus) {
            voiceStatus.textContent =
                "المتصفح لا يدعم التعرف الصوتي";
        }
    }

    window.MabsarPPT = {

        speak: speak,

        startListening: startListening,

        stopListening: stopListening,

        addHandler: addHandler,

        cleanText: cleanText,

        handleVoiceCommand: handleVoiceCommand,

        isSpeaking: function () {
            return speaking;
        },

        isListening: function () {
            return listening;
        }
    };

})();
</script>



<script>
(function () {
    "use strict";

    let mode = "start";

    function clean(text) {
        return window.MabsarPPT.cleanText(text);
    }

    function yes(text) {

        text = clean(text);

        return (
            text === "نعم" ||
            text === "ايوه" ||
            text === "أيوه" ||
            text === "اه" ||
            text === "آه" ||
            text.includes("نعم عايزة") ||
            text.includes("ايوه عايزة")
        );
    }

    function no(text) {

        text = clean(text);

        return (
            text === "لا" ||
            text === "لأ" ||
            text === "لا مش عايزة" ||
            text === "مش عايزة" ||
            text.includes("ليس الآن")
        );
    }

    function welcome() {

        mode = "create";

        window.MabsarPPT.speak(
            "مرحبًا بكِ في برنامج PowerPoint من مبصر. " +
            "هل تريدين إنشاء عرض تقديمي؟"
        );
    }

    window.MabsarPPT.addHandler(function (text) {

        if (mode === "create") {

            if (yes(text)) {

                mode = "ready";

                window.MabsarPPT.speak(
                    "تمام. سنبدأ إنشاء العرض التقديمي. " +
                    "قولي نعم إذا كنتِ جاهزة، أو لا إذا كنتِ تريدين الانتظار."
                );

                return true;
            }

            if (no(text)) {

                mode = "commands";

                window.MabsarPPT.speak(
                    "تمام. أنا جاهز لسماع أوامر أخرى. " +
                    "قولي الأمر الذي تريدينه."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "لم أفهم الإجابة. " +
                "قولي نعم لإنشاء عرض تقديمي، أو لا للأوامر الأخرى."
            );

            return true;
        }

        if (mode === "ready") {

            if (yes(text)) {

                mode = "writing";

                window.MabsarPPT.speak(
                    "ممتاز. أنا جاهز للكتابة. " +
                    "قولي عنوان العرض."
                );

                return true;
            }

            if (no(text)) {

                mode = "waiting";

                window.MabsarPPT.speak(
                    "تمام. خدي وقتك. " +
                    "لما تكوني جاهزة قولي نعم، وأنا هكمل معاكي."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "قولي نعم إذا كنتِ جاهزة، أو لا إذا كنتِ تريدين الانتظار."
            );

            return true;
        }

        if (mode === "waiting") {

            if (yes(text)) {

                mode = "writing";

                window.MabsarPPT.speak(
                    "تمام. أنا جاهز. قولي عنوان العرض."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "تمام، خدي وقتك. أنا في انتظارك."
            );

            return true;
        }

        return false;
    });

    window.PPTConversation = {

        getMode: function () {
            return mode;
        },

        setMode: function (newMode) {
            mode = newMode;
        },

        yes: yes,

        no: no
    };

    setTimeout(function () {

        welcome();

        setTimeout(function () {
            window.MabsarPPT.startListening();
        }, 1500);

    }, 1000);

})();
</script>

<script>
(function () {
    "use strict";

    function command(text) {
        return window.MabsarPPT.cleanText(text);
    }

    function openPage(file, name) {

        window.MabsarPPT.speak(
            "تمام. جاري فتح " + name,
            function () {

                setTimeout(function () {
                    window.location.href = file;
                }, 100);

            }
        );
    }

    window.MabsarPPT.addHandler(function (text) {

        const c = command(text);

        if (
            c.includes("الصفحة الرئيسية") ||
            c.includes("الرئيسية") ||
            c.includes("افتح الرئيسية") ||
            c.includes("وديني الرئيسية") ||
            c.includes("اذهب للرئيسية")
        ) {

            openPage(
                "index.php",
                "الصفحة الرئيسية"
            );

            return true;
        }

        if (
            c.includes("التسجيل") ||
            c.includes("صفحة التسجيل") ||
            c.includes("افتح التسجيل")
        ) {

            openPage(
                "register.php",
                "صفحة التسجيل"
            );

            return true;
        }

        if (
            c.includes("المهام") ||
            c.includes("صفحة المهام")
        ) {

            openPage(
                "tasks.php",
                "صفحة المهام"
            );

            return true;
        }

        if (
            c.includes("اكسل") ||
            c.includes("excel")
        ) {

            openPage(
                "Excel.php",
                "صفحة Excel"
            );

            return true;
        }

        if (
            c.includes("وورد") ||
            c.includes("word")
        ) {

            openPage(
                "Word.php",
                "صفحة Word"
            );

            return true;
        }

        if (
            c.includes("باوربوينت") ||
            c.includes("powerpoint")
        ) {

            openPage(
                "PowerPoint.php",
                "صفحة PowerPoint"
            );

            return true;
        }

        if (
            c.includes("إدارة الملفات") ||
            c.includes("ادارة الملفات") ||
            c.includes("الملفات")
        ) {

            openPage(
                "notifications.php",
                "إدارة الملفات"
            );

            return true;
        }

        if (
            c.includes("التقييم") ||
            c.includes("الإنجازات") ||
            c.includes("الانجازات")
        ) {

            openPage(
                "evaluation.php",
                "صفحة التقييم والإنجازات"
            );

            return true;
        }

        if (
            c.includes("الجدول") ||
            c.includes("المواعيد") ||
            c.includes("الأخبار") ||
            c.includes("الاخبار")
        ) {

            openPage(
                "schedule.php",
                "صفحة الجدول والمواعيد"
            );

            return true;
        }

        if (
            c.includes("الموظفين") ||
            c.includes("المدير")
        ) {

            openPage(
                "employees.php",
                "صفحة الموظفين والمدير"
            );

            return true;
        }

        if (
            c.includes("الإعدادات") ||
            c.includes("الاعدادات")
        ) {

            openPage(
                "settings.php",
                "صفحة الإعدادات"
            );

            return true;
        }

        if (
            c.includes("الروحانيات")
        ) {

            openPage(
                "TEAN.php",
                "صفحة الروحانيات"
            );

            return true;
        }

        return false;
    });

})();
</script>
<script>
(function () {
    "use strict";

    window.MabsarPPT.addHandler(function (text) {

        const c =
            window.MabsarPPT.cleanText(text);

        if (
            c.includes("انا فين") ||
            c.includes("أنا فين") ||
            c.includes("فين انا")
        ) {

            window.MabsarPPT.speak(
                "أنتِ الآن في برنامج PowerPoint من مبصر. " +
                "البرنامج مخصص لإنشاء العروض التقديمية. " +
                "يمكنك إنشاء عدة شرائح، وكتابة النصوص، " +
                "وإضافة الصور والفيديوهات والجداول والمخططات والأشكال، " +
                "ثم تشغيل العرض التقديمي."
            );

            return true;
        }

        if (
            c.includes("صفحة ايه دي") ||
            c.includes("صفحة إيه دي") ||
            c.includes("دي صفحة ايه") ||
            c.includes("دي صفحة إيه")
        ) {

            window.MabsarPPT.speak(
                "أنتِ الآن في صفحة PowerPoint من مبصر. " +
                "تستخدم هذه الصفحة لإنشاء عروض تقديمية متعددة الشرائح، " +
                "وإضافة النصوص والصور والفيديوهات والجداول والمخططات والأشكال."
            );

            return true;
        }

        if (
            c.includes("الصفحة دي بتعمل ايه") ||
            c.includes("الصفحة دي بتعمل إيه") ||
            c.includes("ماذا تفعل الصفحة")
        ) {

            window.MabsarPPT.speak(
                "صفحة PowerPoint تسمح لكِ بإنشاء عرض تقديمي كامل. " +
                "يمكنك إضافة الشرائح، وكتابة النصوص، " +
                "وإضافة الصور والفيديوهات والجداول والمخططات والأشكال، " +
                "والتحكم في تنسيق العرض وتشغيله."
            );

            return true;
        }

        if (
            c.includes("البرنامج ده بتاع ايه") ||
            c.includes("البرنامج ده بتاع إيه") ||
            c.includes("باوربوينت بيعمل ايه") ||
            c.includes("باوربوينت بيعمل إيه")
        ) {

            window.MabsarPPT.speak(
                "PowerPoint هو برنامج لإنشاء العروض التقديمية. " +
                "ومن خلال مبصر يمكنك التحكم فيه بالصوت أو بالأزرار، " +
                "وإنشاء الشرائح وإضافة النصوص والصور والفيديوهات والجداول والمخططات."
            );

            return true;
        }

        return false;
    });

})();
</script>

<script>
(function () {
    "use strict";

    let slides = [];

    let currentIndex = 0;

    function createSlide(type) {

        const slide = {

            id: Date.now(),

            type: type || "title-content",

            title: "",

            subtitle: "",

            content: "",

            image: "",

            video: "",

            table: [],

            chart: null,

            shapes: [],

            transition: "none",

            animation: "none"
        };

        slides.push(slide);

        currentIndex =
            slides.length - 1;

        render();

        return slide;
    }

    function getCurrentSlide() {

        return slides[currentIndex];
    }

    function render() {

        const list =
            document.getElementById("slidesList");

        const current =
            document.getElementById("currentSlide");

        const counter =
            document.getElementById("slideCounter");

        if (!list || !current) return;

        list.innerHTML = "";

        slides.forEach(function (slide, index) {

            const thumb =
                document.createElement("div");

            thumb.className =
                "slide-thumbnail";

            if (index === currentIndex) {
                thumb.classList.add("active");
            }

            thumb.dataset.slide = index + 1;

            thumb.innerHTML =
                "<div class='thumbnail-title'>" +
                (slide.title || "شريحة جديدة") +
                "</div>" +
                "<div class='thumbnail-subtitle'>" +
                (slide.content || "") +
                "</div>" +
                "<span class='slide-number'>" +
                (index + 1) +
                "</span>";

            thumb.addEventListener(
                "click",
                function () {

                    currentIndex = index;

                    render();
                }
            );

            list.appendChild(thumb);
        });

        current.innerHTML = "";

        const title =
            document.createElement("div");

        title.className = "slide-title";

        title.contentEditable = true;

        title.textContent =
            getCurrentSlide().title ||
            "عنوان العرض";

        title.addEventListener(
            "input",
            function () {

                getCurrentSlide().title =
                    title.textContent;

                updateThumbnail();
            }
        );

        current.appendChild(title);

        const content =
            document.createElement("div");

        content.className =
            "slide-body";

        content.contentEditable = true;

        content.textContent =
            getCurrentSlide().content || "";

        content.addEventListener(
            "input",
            function () {

                getCurrentSlide().content =
                    content.textContent;

                updateThumbnail();
            }
        );

        current.appendChild(content);

        if (counter) {

            counter.textContent =
                "الشريحة " +
                (currentIndex + 1) +
                " من " +
                slides.length;
        }
    }

    function updateThumbnail() {

        const item =
            document.querySelector(
                ".slide-thumbnail.active"
            );

        if (!item) return;

        const slide =
            getCurrentSlide();

        const title =
            item.querySelector(
                ".thumbnail-title"
            );

        const subtitle =
            item.querySelector(
                ".thumbnail-subtitle"
            );

        if (title) {
            title.textContent =
                slide.title || "شريحة جديدة";
        }

        if (subtitle) {
            subtitle.textContent =
                slide.content || "";
        }
    }

    function addSlide(type) {

        createSlide(
            type || "title-content"
        );

        window.MabsarPPT.speak(
            "تمت إضافة شريحة جديدة."
        );
    }

    function deleteSlide() {

        if (slides.length <= 1) {

            window.MabsarPPT.speak(
                "لا يمكن حذف الشريحة الوحيدة."
            );

            return;
        }

        slides.splice(
            currentIndex,
            1
        );

        if (
            currentIndex >= slides.length
        ) {
            currentIndex =
                slides.length - 1;
        }

        render();

        window.MabsarPPT.speak(
            "تم حذف الشريحة."
        );
    }

    function duplicateSlide() {

        const source =
            getCurrentSlide();

        const copy =
            JSON.parse(
                JSON.stringify(source)
            );

        copy.id = Date.now();

        slides.splice(
            currentIndex + 1,
            0,
            copy
        );

        currentIndex++;

        render();

        window.MabsarPPT.speak(
            "تم تكرار الشريحة."
        );
    }

    window.PPTCore = {

        createSlide,

        addSlide,

        deleteSlide,

        duplicateSlide,

        getCurrentSlide,

        getSlides: function () {
            return slides;
        },

        getCurrentIndex: function () {
            return currentIndex;
        },

        setCurrentIndex: function (index) {

            if (
                index >= 0 &&
                index < slides.length
            ) {

                currentIndex = index;

                render();
            }
        },

        render
    };

    createSlide("title-content");

})();
</script>
<script>
(function () {
    "use strict";

    let step = "title";

    function yes(text) {
        const c = window.MabsarPPT.cleanText(text);

        return (
            c === "نعم" ||
            c === "ايوه" ||
            c === "أيوه" ||
            c === "اه" ||
            c === "آه" ||
            c.includes("صح") ||
            c.includes("صحيح")
        );
    }

    function no(text) {
        const c = window.MabsarPPT.cleanText(text);

        return (
            c === "لا" ||
            c === "لأ" ||
            c.includes("غلط") ||
            c.includes("مش صح")
        );
    }

    function askTitle() {

        step = "title";

        window.PPTConversation.setMode("writing");

        window.MabsarPPT.speak(
            "قولي عنوان العرض."
        );
    }

    function askContent() {

        step = "content";

        window.MabsarPPT.speak(
            "ممتاز. قولي النص الذي تريدين كتابته داخل الشريحة."
        );
    }

    window.MabsarPPT.addHandler(function (text) {

        const mode =
            window.PPTConversation.getMode();

        if (mode !== "writing" &&
            step !== "add-slide-confirm") {
            return false;
        }

        /*
        =========================================
        العنوان
        =========================================
        */

        if (step === "title") {

            const slide =
                window.PPTCore.getCurrentSlide();

            slide.title = text;

            window.PPTCore.render();

            step = "confirm-title";

            window.MabsarPPT.speak(
                "كتبت: " +
                text +
                ". هل هذا صحيح؟"
            );

            return true;
        }

        /*
        =========================================
        تأكيد العنوان
        =========================================
        */

        if (step === "confirm-title") {

            if (yes(text)) {

                askContent();

                return true;
            }

            if (no(text)) {

                step = "correct-title";

                window.MabsarPPT.speak(
                    "تمام. قولي العنوان الصحيح."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "قولي نعم إذا كان صحيحًا، أو لا للتعديل."
            );

            return true;
        }

        /*
        =========================================
        تصحيح العنوان
        =========================================
        */

        if (step === "correct-title") {

            const slide =
                window.PPTCore.getCurrentSlide();

            slide.title = text;

            window.PPTCore.render();

            step = "confirm-title";

            window.MabsarPPT.speak(
                "تم تعديل العنوان إلى: " +
                text +
                ". هل هذا صحيح؟"
            );

            return true;
        }

        /*
        =========================================
        محتوى الشريحة
        =========================================
        */

        if (step === "content") {

            const slide =
                window.PPTCore.getCurrentSlide();

            slide.content = text;

            window.PPTCore.render();

            step = "confirm-content";

            window.MabsarPPT.speak(
                "كتبت: " +
                text +
                ". هل هذا صحيح؟"
            );

            return true;
        }

        /*
        =========================================
        تأكيد المحتوى
        =========================================
        */

        if (step === "confirm-content") {

            if (yes(text)) {

                step = "add-slide-confirm";

                window.PPTConversation.setMode(
                    "commands"
                );

                window.MabsarPPT.speak(
                    "ممتاز. تم حفظ محتوى الشريحة. " +
                    "هل تريدين إضافة شريحة أخرى؟ قولي نعم أو لا."
                );

                return true;
            }

            if (no(text)) {

                step = "correct-content";

                window.MabsarPPT.speak(
                    "تمام. قولي النص الصحيح."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "قولي نعم إذا كان النص صحيحًا، أو لا للتعديل."
            );

            return true;
        }

        /*
        =========================================
        تصحيح المحتوى
        =========================================
        */

        if (step === "correct-content") {

            const slide =
                window.PPTCore.getCurrentSlide();

            slide.content = text;

            window.PPTCore.render();

            step = "confirm-content";

            window.MabsarPPT.speak(
                "تم تعديل النص. هل أصبح صحيحًا؟"
            );

            return true;
        }

        /*
        =========================================
        إضافة شريحة
        =========================================
        */

        if (step === "add-slide-confirm") {

            if (yes(text)) {

                window.PPTCore.addSlide(
                    "title-content"
                );

                step = "title";

                window.PPTConversation.setMode(
                    "writing"
                );

                window.MabsarPPT.speak(
                    "تمام. تمت إضافة شريحة جديدة حقيقية. " +
                    "قولي عنوان الشريحة الجديدة."
                );

                return true;
            }

            if (no(text)) {

                step = "finished";

                window.PPTConversation.setMode(
                    "commands"
                );

                window.MabsarPPT.speak(
                    "تمام. مش هنضيف شريحة جديدة. " +
                    "أنا جاهز لأي أمر تاني."
                );

                return true;
            }

            window.MabsarPPT.speak(
                "قولي نعم لإضافة شريحة جديدة، أو لا لعدم إضافة شريحة."
            );

            return true;
        }

        return false;
    });

    window.PPTWriting = {

        start: function () {
            step = "title";
            window.PPTConversation.setMode("writing");
            askTitle();
        },

        getStep: function () {
            return step;
        }
    };

})();
</script>
<script>
(function () {
    "use strict";

    function addNewSlide() {

        if (!window.PPTCore) return;

        window.PPTCore.addSlide(
            "title-content"
        );

        if (window.PPTWriting) {
            window.PPTWriting.start();
        }
    }

    /*
    =========================================
    زرار إضافة شريحة
    =========================================
    */

    const buttons = [
        document.getElementById("smallAddSlideBtn")
    ];

    buttons.forEach(function (button) {

        if (!button) return;

        button.addEventListener(
            "click",
            function () {

                addNewSlide();
            }
        );
    });

    /*
    =========================================
    الأمر الصوتي
    =========================================
    */

    window.MabsarPPT.addHandler(
        function (text) {

            const c =
                window.MabsarPPT.cleanText(text);

            if (
                c.includes("شريحة جديدة") ||
                c.includes("اعمل شريحة جديدة") ||
                c.includes("اعملي شريحة جديدة") ||
                c.includes("ضيف شريحة") ||
                c.includes("أضيف شريحة") ||
                c.includes("اضيف شريحة")
            ) {

                addNewSlide();

                window.MabsarPPT.speak(
                    "تمت إضافة شريحة جديدة. قولي عنوانها."
                );

                return true;
            }

            return false;
        }
    );

})();
</script>
<script>
(function () {
    "use strict";

    function changeLayout(type, name) {

        const slide =
            window.PPTCore.getCurrentSlide();

        if (!slide) return;

        slide.type = type;

        window.PPTCore.render();

        window.MabsarPPT.speak(
            "تم اختيار تخطيط " + name
        );
    }

    window.MabsarPPT.addHandler(
        function (text) {

            const c =
                window.MabsarPPT.cleanText(text);

            if (
                c.includes("شريحة فارغة")
            ) {

                changeLayout(
                    "blank",
                    "فارغ"
                );

                return true;
            }

            if (
                c.includes("شريحة صورة") ||
                c.includes("شريحة للصور")
            ) {

                changeLayout(
                    "image",
                    "الصورة"
                );

                return true;
            }

            if (
                c.includes("شريحة فيديو")
            ) {

                changeLayout(
                    "video",
                    "الفيديو"
                );

                return true;
            }

            if (
                c.includes("شريحة جدول")
            ) {

                changeLayout(
                    "table",
                    "الجدول"
                );

                return true;
            }

            if (
                c.includes("شريحة مخطط")
            ) {

                changeLayout(
                    "chart",
                    "المخطط"
                );

                return true;
            }

            return false;
        }
    );

})();
</script>
<script>
(function () {
    "use strict";

    function openInput(id) {

        const input =
            document.getElementById(id);

        if (input) {
            input.click();
            return true;
        }

        return false;
    }

    /*
    =========================================
    الصورة
    =========================================
    */

    const imageInput =
        document.getElementById(
            "imageFileInput"
        );

    if (imageInput) {

        imageInput.addEventListener(
            "change",
            function () {

                const file =
                    imageInput.files[0];

                if (!file) return;

                const reader =
                    new FileReader();

                reader.onload =
                    function (event) {

                        const slide =
                            window.PPTCore
                                .getCurrentSlide();

                        slide.image =
                            event.target.result;

                        window.PPTCore.render();

                        window.MabsarPPT.speak(
                            "تمت إضافة الصورة إلى الشريحة."
                        );
                    };

                reader.readAsDataURL(file);
            }
        );
    }

    /*
    =========================================
    الفيديو
    =========================================
    */

    const videoInput =
        document.getElementById(
            "videoFileInput"
        );

    if (videoInput) {

        videoInput.addEventListener(
            "change",
            function () {

                const file =
                    videoInput.files[0];

                if (!file) return;

                const slide =
                    window.PPTCore.getCurrentSlide();

                slide.video =
                    URL.createObjectURL(file);

                window.PPTCore.render();

                window.MabsarPPT.speak(
                    "تمت إضافة الفيديو إلى الشريحة."
                );
            }
        );
    }

    /*
    =========================================
    الأوامر الصوتية
    =========================================
    */

    window.MabsarPPT.addHandler(
        function (text) {

            const c =
                window.MabsarPPT.cleanText(text);

            if (
                c.includes("أضيفي صورة") ||
                c.includes("اضيفي صورة") ||
                c.includes("أضيف صورة") ||
                c.includes("اضيف صورة")
            ) {

                openInput(
                    "imageFileInput"
                );

                return true;
            }

            if (
                c.includes("أضيفي فيديو") ||
                c.includes("اضيفي فيديو") ||
                c.includes("أضيف فيديو") ||
                c.includes("اضيف فيديو")
            ) {

                openInput(
                    "videoFileInput"
                );

                return true;
            }

            return false;
        }
    );

})();
</script>


<script>
(function () {
    "use strict";

    function createRealTable(
        rows,
        columns
    ) {

        const slide =
            window.PPTCore.getCurrentSlide();

        if (!slide) return;

        slide.table = [];

        for (
            let r = 0;
            r < rows;
            r++
        ) {

            const row = [];

            for (
                let c = 0;
                c < columns;
                c++
            ) {

                row.push("");
            }

            slide.table.push(row);
        }

        renderTable();

        window.MabsarPPT.speak(
            "تم إنشاء جدول من " +
            rows +
            " صفوف و" +
            columns +
            " أعمدة."
        );
    }

    function renderTable() {

        const slide =
            window.PPTCore.getCurrentSlide();

        const stage =
            document.getElementById(
                "currentSlide"
            );

        if (!slide || !stage) return;

        if (!slide.table ||
            !slide.table.length) {
            return;
        }

        const table =
            document.createElement("table");

        table.className =
            "ppt-real-table";

        slide.table.forEach(
            function (row, r) {

                const tr =
                    document.createElement("tr");

                row.forEach(
                    function (value, c) {

                        const td =
                            document.createElement(
                                "td"
                            );

                        td.contentEditable =
                            "true";

                        td.textContent =
                            value;

                        td.addEventListener(
                            "input",
                            function () {

                                slide.table[r][c] =
                                    td.textContent;
                            }
                        );

                        tr.appendChild(td);
                    }
                );

                table.appendChild(tr);
            }
        );

        stage.appendChild(table);
    }

    window.PPTObjects =
        window.PPTObjects || {};

    window.PPTObjects.createTable =
        function () {

            createRealTable(3, 3);
        };

    window.MabsarPPT.addHandler(
        function (text) {

            const c =
                window.MabsarPPT.cleanText(text);

            if (
                c.includes("اعملي جدول") ||
                c.includes("اعمل جدول")
            ) {

                let rows = 3;
                let columns = 3;

                const rowMatch =
                    c.match(
                        /(\d+)\s*(?:صف|صفوف)/
                    );

                const columnMatch =
                    c.match(
                        /(\d+)\s*(?:عمود|أعمدة|اعمدة)/
                    );

                if (rowMatch) {
                    rows =
                        parseInt(
                            rowMatch[1]
                        );
                }

                if (columnMatch) {
                    columns =
                        parseInt(
                            columnMatch[1]
                        );
                }

                createRealTable(
                    rows,
                    columns
                );

                return true;
            }

            return false;
        }
    );

})();
</script>
<script>
(function () {
    "use strict";

    /*
    =========================================
    مخطط بسيط حقيقي داخل الشريحة
    =========================================
    */

    function createChart(data) {

        const slide =
            window.PPTCore.getCurrentSlide();

        if (!slide) return;

        slide.chart = data;

        const stage =
            document.getElementById(
                "currentSlide"
            );

        if (!stage) return;

        const old =
            stage.querySelector(
                ".ppt-real-chart"
            );

        if (old) {
            old.remove();
        }

        const chart =
            document.createElement(
                "div"
            );

        chart.className =
            "ppt-real-chart";

        data.forEach(function (item) {

            const bar =
                document.createElement(
                    "div"
                );

            bar.className =
                "chart-bar";

            bar.style.height =
                Math.max(
                    10,
                    Number(item.value) || 0
                ) + "%";

            const label =
                document.createElement(
                    "span"
                );

            label.textContent =
                item.name +
                " " +
                item.value +
                "%";

            bar.appendChild(label);

            chart.appendChild(bar);
        });

        stage.appendChild(chart);
    }

    window.PPTObjects =
        window.PPTObjects || {};

    window.PPTObjects.createChart =
        function () {

            createChart([
                {
                    name: "مشروع 1",
                    value: 70
                },
                {
                    name: "مشروع 2",
                    value: 50
                },
                {
                    name: "مشروع 3",
                    value: 90
                }
            ]);

            window.MabsarPPT.speak(
                "تم إنشاء المخطط."
            );
        };

    /*
    =========================================
    أوامر المخطط
    =========================================
    */

    window.MabsarPPT.addHandler(
        function (text) {

            const c =
                window.MabsarPPT.cleanText(text);

            if (
                c.includes("اعملي مخطط") ||
                c.includes("اعمل مخطط") ||
                c.includes("مخطط رسم بياني")
            ) {

                window.PPTObjects
                    .createChart();

                return true;
            }

            /*
            ================================
            التنسيق
            ================================
            */

            if (
                c.includes("خلي الخط bold") ||
                c.includes("خلي الخط عريض") ||
                c.includes("خط عريض")
            ) {

                document.execCommand(
                    "bold"
                );

                window.MabsarPPT.speak(
                    "تم جعل الخط عريضًا."
                );

                return true;
            }

            if (
                c.includes("خلي الخط مائل") ||
                c.includes("خط مائل")
            ) {

                document.execCommand(
                    "italic"
                );

                window.MabsarPPT.speak(
                    "تم جعل الخط مائلًا."
                );

                return true;
            }

            if (
                c.includes("حطي خط تحته") ||
                c.includes("تحته خط")
            ) {

                document.execCommand(
                    "underline"
                );

                window.MabsarPPT.speak(
                    "تم وضع خط تحت النص."
                );

                return true;
            }

            /*
            ================================
            المحاذاة
            ================================
            */

            if (
                c.includes("توسيط") ||
                c.includes("خليه في النص")
            ) {

                document.execCommand(
                    "justifyCenter"
                );

                window.MabsarPPT.speak(
                    "تم توسيط النص."
                );

                return true;
            }

            if (
                c.includes("محاذاة يمين") ||
                c === "يمين"
            ) {

                document.execCommand(
                    "justifyRight"
                );

                window.MabsarPPT.speak(
                    "تمت محاذاة النص إلى اليمين."
                );

                return true;
            }

            if (
                c.includes("محاذاة يسار") ||
                c === "يسار"
            ) {

                document.execCommand(
                    "justifyLeft"
                );

                window.MabsarPPT.speak(
                    "تمت محاذاة النص إلى اليسار."
                );

                return true;
            }

            return false;
        }
    );

})();
</script>
</body>
</html>