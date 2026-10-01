<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MABSAR | Word</title>

<style>

/* =========================================
   GENERAL
========================================= */

* {
    box-sizing: border-box;
}

html,
body {
    margin: 0;
    padding: 0;
    width: 100%;
    min-height: 100%;
}

body {
    font-family: Arial, Tahoma, sans-serif;
    background: #dfe8f5;
    color: #222;
    overflow-x: hidden;
}


/* =========================================
   TOP HEADER
========================================= */

.word-header {
    width: 100%;
    min-height: 58px;

    background: #185abd;
    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 8px 18px;

    border-bottom: 1px solid #0d3f88;

    direction: rtl;
}


/* Word title */

.word-title {
    display: flex;
    align-items: center;
    gap: 10px;

    font-size: 18px;
    font-weight: bold;

    white-space: nowrap;
}


/* Word icon */

.word-icon {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;
    color: #185abd;

    border-radius: 5px;

    font-size: 22px;
    font-weight: bold;

    box-shadow:
        0 2px 5px rgba(0, 0, 0, 0.18);
}


/* Document title */

.document-title {
    font-size: 15px;
    font-weight: 500;

    opacity: 0.95;
}


/* Home button */

.home-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    text-decoration: none;

    background: #ffffff;
    color: #185abd;

    padding: 8px 16px;

    border-radius: 5px;

    font-size: 13px;
    font-weight: bold;

    border: 1px solid #ffffff;

    transition: 0.2s ease;
}

.home-button:hover {
    background: #eaf2ff;
    color: #124a9c;
}


/* =========================================
   TABS
========================================= */

.word-tabs {
    width: 100%;
    height: 46px;

    background: #185abd;

    display: flex;
    align-items: center;

    padding: 0 12px;

    gap: 2px;

    border-bottom: 1px solid #0d3f88;

    direction: rtl;

    overflow-x: auto;
}

.word-tabs::-webkit-scrollbar {
    height: 3px;
}

.word-tabs button {
    height: 46px;

    padding: 0 18px;

    border: none;

    background: transparent;

    color: #ffffff;

    font-family: inherit;
    font-size: 13px;

    cursor: pointer;

    white-space: nowrap;

    transition: 0.2s ease;
}

.word-tabs button:hover {
    background: rgba(255, 255, 255, 0.15);
}

.word-tabs button.active {
    background: #ffffff;
    color: #185abd;

    font-weight: bold;

    border-radius: 5px 5px 0 0;
}


/* =========================================
   RIBBON
========================================= */

.word-ribbon {
    width: 100%;
    min-height: 108px;

    background: #f4f8fd;

    border-bottom: 1px solid #b9cce5;

    display: flex;
    align-items: stretch;

    padding: 8px 12px;

    gap: 8px;

    direction: rtl;

    overflow-x: auto;
}

.word-ribbon::-webkit-scrollbar {
    height: 5px;
}

.word-ribbon::-webkit-scrollbar-thumb {
    background: #185abd;
    border-radius: 5px;
}


/* Ribbon group */

.ribbon-group {
    min-width: 145px;

    padding: 3px 10px 5px;

    border-left: 1px solid #c8d7ea;

    display: flex;
    flex-direction: column;

    justify-content: space-between;
}

.ribbon-group:last-child {
    border-left: none;
}


/* Group title */

.group-title {
    text-align: center;

    color: #185abd;

    font-size: 11px;
    font-weight: bold;

    margin-top: 4px;
}


/* Ribbon buttons */

.ribbon-buttons {
    display: flex;
    align-items: center;
    justify-content: center;

    flex-wrap: wrap;

    gap: 5px;

    margin-top: 8px;
}


/* Normal button */

.ribbon-buttons button {
    min-height: 30px;

    padding: 6px 9px;

    background: #ffffff;

    color: #174a87;

    border: 1px solid #b7c9df;

    border-radius: 4px;

    font-family: inherit;
    font-size: 11px;

    cursor: pointer;

    transition: 0.2s ease;
}

.ribbon-buttons button:hover {
    background: #dceaff;

    border-color: #185abd;

    color: #0e3f86;
}

.ribbon-buttons button:active {
    background: #c9ddf8;
}


/* Select */

.ribbon-buttons select {
    min-height: 30px;

    max-width: 125px;

    padding: 5px 7px;

    background: #ffffff;

    color: #333;

    border: 1px solid #b7c9df;

    border-radius: 4px;

    font-family: inherit;
    font-size: 11px;

    cursor: pointer;

    outline: none;
}

.ribbon-buttons select:focus {
    border-color: #185abd;

    box-shadow:
        0 0 0 2px rgba(24, 90, 189, 0.12);
}


/* =========================================
   RULER
========================================= */

.ruler {
    width: 100%;
    height: 31px;

    background: #eaf1f9;

    border-bottom: 1px solid #b9cce5;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 55px;

    color: #4f6580;

    font-size: 10px;

    direction: ltr;

    overflow: hidden;

    position: relative;
}

.ruler::before {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: 4px;

    height: 1px;

    background: #a9bdd6;
}


/* =========================================
   WORKSPACE
========================================= */

.word-workspace {
    width: 100%;
    min-height: calc(100vh - 248px);

    background: #dce6f2;

    padding: 30px 20px 50px;

    display: flex;
    justify-content: center;
    align-items: flex-start;

    overflow: auto;
}


/* =========================================
   WORD PAGE
========================================= */

.word-page {
    width: 794px;
    min-height: 1123px;

    background: #ffffff;

    padding: 75px 70px;

    box-shadow:
        0 3px 12px rgba(0, 0, 0, 0.25);

    direction: rtl;

    position: relative;
}


/* =========================================
   DOCUMENT EDITOR
========================================= */

.document-editor {
    width: 100%;
    min-height: 970px;

    background: #ffffff;

    outline: none;

    color: #222222;

    font-family: Arial, Tahoma, sans-serif;

    font-size: 16px;

    line-height: 1.8;

    text-align: right;

    direction: rtl;

    cursor: text;

    white-space: pre-wrap;

    word-wrap: break-word;
}

.document-editor:focus {
    outline: none;
}


/* Placeholder */

.document-editor:empty::before {
    content: "ابدئي الكتابة هنا...";

    color: #aaaaaa;

    pointer-events: none;
}


/* =========================================
   STATUS BAR
========================================= */

.word-status-bar {
    width: 100%;
    height: 36px;

    background: #185abd;

    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 15px;

    font-size: 11px;

    direction: rtl;

    border-top: 1px solid #0d3f88;
}


/* Status sections */

.status-right,
.status-center,
.status-left {
    display: flex;
    align-items: center;

    gap: 14px;
}


/* Status buttons */

.status-left button {
    width: 25px;
    height: 25px;

    border: none;

    background: transparent;

    color: #ffffff;

    font-size: 17px;

    border-radius: 4px;

    cursor: pointer;
}

.status-left button:hover {
    background: rgba(255, 255, 255, 0.15);
}


/* =========================================
   SCROLLBARS
========================================= */

::-webkit-scrollbar {
    width: 9px;
    height: 9px;
}

::-webkit-scrollbar-track {
    background: #dbe5f1;
}

::-webkit-scrollbar-thumb {
    background: #7da2d1;

    border-radius: 8px;
}

::-webkit-scrollbar-thumb:hover {
    background: #185abd;
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 900px) {

    .word-header {
        padding: 8px 10px;
    }

    .document-title {
        display: none;
    }

    .word-page {
        width: 700px;

        min-height: 990px;

        padding: 55px 50px;
    }

    .word-workspace {
        justify-content: flex-start;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 600px) {

    .word-header {
        min-height: 55px;
    }

    .word-title {
        font-size: 14px;
    }

    .word-icon {
        width: 30px;
        height: 30px;

        font-size: 18px;
    }

    .home-button {
        padding: 7px 10px;

        font-size: 11px;
    }


    .word-tabs {
        justify-content: flex-start;
    }

    .word-tabs button {
        padding: 0 12px;

        font-size: 11px;
    }


    .word-ribbon {
        min-height: 105px;
    }


    .word-page {
        width: 600px;

        min-height: 900px;

        padding: 45px 40px;
    }


    .document-editor {
        min-height: 800px;

        font-size: 15px;
    }


    .word-status-bar {
        font-size: 10px;

        padding: 0 8px;
    }

}


/* =========================================
   TOUCH
========================================= */

button,
select,
a {
    -webkit-tap-highlight-color: transparent;
}

button:focus,
select:focus,
a:focus {
    outline: 2px solid #7da2d1;

    outline-offset: 2px;
}

</style>

    <!-- هنضيف CSS هنا في الجزء القادم -->
</head>

<body>

    <!-- ================================
         الشريط العلوي
    ================================= -->

    <header class="word-header">

        <div class="word-title">
            <span class="word-icon">W</span>
            <span>MABSAR | Word</span>
        </div>

        <div class="document-title">
            مستند جديد
        </div>

        <a href="index.php" class="home-button">
            الرئيسية
        </a>

    </header>


    <!-- ================================
         التبويبات
    ================================= -->

    <nav class="word-tabs">

        <button>ملف</button>
        <button class="active">الصفحة الرئيسية</button>
        <button>إدراج</button>
        <button>تخطيط</button>
        <button>مراجعة</button>
        <button>عرض</button>

    </nav>


    <!-- ================================
         شريط الأدوات
    ================================= -->

    <section class="word-ribbon">

        <!-- الحافظة -->

        <div class="ribbon-group">

            <div class="group-title">
                الحافظة
            </div>

            <div class="ribbon-buttons">

                <button title="لصق">
                    لصق
                </button>

                <button title="قص">
                    قص
                </button>

                <button title="نسخ">
                    نسخ
                </button>

            </div>

        </div>


        <!-- الخط -->

        <div class="ribbon-group">

            <div class="group-title">
                الخط
            </div>

            <div class="ribbon-buttons">

                <select>
                    <option>Arial</option>
                    <option>Tahoma</option>
                    <option>Times New Roman</option>
                    <option>Calibri</option>
                </select>

                <select>
                    <option>12</option>
                    <option>14</option>
                    <option>16</option>
                    <option>18</option>
                    <option>20</option>
                    <option>24</option>
                </select>

                <button>
                    عريض
                </button>

                <button>
                    مائل
                </button>

                <button>
                    تحته خط
                </button>

            </div>

        </div>


        <!-- الفقرة -->

        <div class="ribbon-group">

            <div class="group-title">
                فقرة
            </div>

            <div class="ribbon-buttons">

                <button>
                    محاذاة يمين
                </button>

                <button>
                    توسيط
                </button>

                <button>
                    محاذاة يسار
                </button>

                <button>
                    قائمة
                </button>

            </div>

        </div>


        <!-- التحرير -->

        <div class="ribbon-group">

            <div class="group-title">
                تحرير
            </div>

            <div class="ribbon-buttons">

                <button>
                    بحث
                </button>

                <button>
                    استبدال
                </button>

            </div>

        </div>

    </section>


    <!-- ================================
         المسطرة
    ================================= -->

    <div class="ruler">

        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
        <span>6</span>
        <span>7</span>
        <span>8</span>
        <span>9</span>
        <span>10</span>

    </div>


    <!-- ================================
         منطقة العمل
    ================================= -->

    <main class="word-workspace">

        <!-- ورقة Word -->

        <div class="word-page">

            <div
                class="document-editor"
                contenteditable="true"
                spellcheck="false"
            >

            </div>

        </div>

    </main>


    <!-- ================================
         الشريط السفلي
    ================================= -->

    <footer class="word-status-bar">

        <div class="status-right">

            <span>
                صفحة 1 من 1
            </span>

            <span>
                عدد الكلمات: 0
            </span>

        </div>


        <div class="status-center">

            <span>
                العربية
            </span>

        </div>


        <div class="status-left">

            <button>
                −
            </button>

            <span>
                100%
            </span>

            <button>
                +
            </button>

        </div>

    </footer>

<script>
(function () {
    "use strict";

    window.WordApp = window.WordApp || {};

    const App = window.WordApp;

    App.recognition = null;
    App.isListening = false;
    App.isSpeaking = false;
    App.state = "CREATE_QUESTION";
    App.lastWrittenText = "";
    App.lastConfirmedText = "";
    App.documentStarted = false;

    App.speak = function (text, callback) {

        App.isSpeaking = true;

        if (App.recognition) {
            try {
                App.recognition.stop();
            } catch (e) {}
        }

        window.speechSynthesis.cancel();

        const utterance = new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.9;
        utterance.pitch = 1;

        utterance.onend = function () {

            App.isSpeaking = false;

            if (typeof callback === "function") {
                callback();
            }

            setTimeout(function () {
                App.startListening();
            }, 400);
        };

        utterance.onerror = function () {

            App.isSpeaking = false;

            if (typeof callback === "function") {
                callback();
            }

            setTimeout(function () {
                App.startListening();
            }, 400);
        };

        window.speechSynthesis.speak(utterance);
    };


    App.initRecognition = function () {

        const SpeechRecognition =
            window.SpeechRecognition ||
            window.webkitSpeechRecognition;

        if (!SpeechRecognition) {

            alert("المتصفح لا يدعم التعرف على الصوت.");

            return;
        }

        App.recognition = new SpeechRecognition();

        App.recognition.lang = "ar-EG";

        App.recognition.continuous = true;

        App.recognition.interimResults = false;

        App.recognition.maxAlternatives = 3;


        App.recognition.onstart = function () {

            App.isListening = true;

            console.log("الميكروفون يعمل");
        };


        App.recognition.onresult = function (event) {

            if (App.isSpeaking) return;

            const result =
                event.results[event.results.length - 1];

            if (!result || !result[0]) return;

            const text =
                result[0].transcript.trim();

            if (!text) return;

            console.log("الكلام:", text);

            App.handleSpeech(text);
        };


        App.recognition.onerror = function (event) {

            console.log(
                "Speech Error:",
                event.error
            );

            App.isListening = false;

            if (
                event.error === "not-allowed" ||
                event.error === "service-not-allowed"
            ) {
                return;
            }

            setTimeout(function () {

                if (!App.isSpeaking) {
                    App.startListening();
                }

            }, 700);
        };


        App.recognition.onend = function () {

            App.isListening = false;

            if (!App.isSpeaking) {

                setTimeout(function () {
                    App.startListening();
                }, 500);
            }
        };
    };


    App.startListening = function () {

        if (!App.recognition) return;

        if (App.isSpeaking) return;

        if (App.isListening) return;

        try {

            App.recognition.start();

        } catch (error) {

            console.log("Listening:", error);

        }
    };


    App.stopListening = function () {

        if (!App.recognition) return;

        try {
            App.recognition.stop();
        } catch (e) {}

        App.isListening = false;
    };


    App.normalize = function (text) {

        return text
            .toLowerCase()
            .replace(/[؟?!.,،]/g, "")
            .replace(/\s+/g, " ")
            .trim();
    };


    App.isYes = function (text) {

        const t = App.normalize(text);

        return (
            t === "نعم" ||
            t === "اه" ||
            t === "آه" ||
            t === "أيوه" ||
            t === "ايوه" ||
            t === "أجل" ||
            t === "اجل" ||
            t.includes("نعم")
        );
    };


    App.isNo = function (text) {

        const t = App.normalize(text);

        return (
            t === "لا" ||
            t === "لأ" ||
            t === "لا لا" ||
            t === "مش" ||
            t === "غير صحيح" ||
            t === "خطأ" ||
            t === "غلط" ||
            t.includes("لا")
        );
    };


    App.handleSpeech = function (text) {

        console.log(
            "STATE:",
            App.state,
            "TEXT:",
            text
        );

        // سيتم وضع منطق الأوامر في Part 2 وPart 3
        App.processCommand(text);
    };


    App.processCommand = function (text) {

        console.log("الأمر:", text);
    };


    App.initRecognition();


    window.addEventListener("load", function () {

        setTimeout(function () {

            App.speak(
                "مرحبًا بكم في برنامج وورد من مبصر. هل تريدين إنشاء مستند؟ قولي نعم أو لا."
            );

        }, 800);

    });


    // الضغط في أي مكان لتفعيل الميكروفون
    document.addEventListener("click", function () {

        if (!App.isSpeaking) {
            App.startListening();
        }

    });


})();
</script>



<script>
(function () {

    "use strict";

    const App = window.WordApp;

    if (!App) return;


    App.writeText = function (text) {

        const editor =
            document.querySelector(".document-editor");

        if (!editor) return;

        editor.focus();

        const newText = document.createTextNode(text);

        editor.appendChild(newText);

        editor.appendChild(
            document.createElement("br")
        );

        App.lastWrittenText = text;
    };


    App.replaceLastText = function (text) {

        const editor =
            document.querySelector(".document-editor");

        if (!editor) return;

        if (!App.lastWrittenText) {

            App.writeText(text);

            return;
        }

        const oldText = App.lastWrittenText;

        const nodes = Array.from(editor.childNodes);

        for (let i = nodes.length - 1; i >= 0; i--) {

            const node = nodes[i];

            if (
                node.nodeType === Node.TEXT_NODE &&
                node.textContent.trim() === oldText.trim()
            ) {

                node.textContent = text;

                App.lastWrittenText = text;

                return;
            }
        }

        App.writeText(text);
    };


    App.askForCorrection = function () {

        App.state = "CORRECTION";

        App.speak(
            "حسنًا، النص غير صحيح. قولي النص الصحيح وسأستبدل النص السابق."
        );
    };


    App.startWriting = function () {

        App.state = "WRITING";

        App.documentStarted = true;

        App.speak(
            "جاري الكتابة الآن. أنا جاهزة، قولي النص الذي تريدين كتابته."
        );
    };


    App.askTextConfirmation = function (text) {

        App.state = "CONFIRM_TEXT";

        App.lastWrittenText = text;

        App.speak(
            "كتبت: " +
            text +
            ". هل النص صحيح أم لا؟ قولي نعم أو لا."
        );
    };


    App.finishWriting = function () {

        App.state = "FINISHED_QUESTION";

        App.speak(
            "تمام. هل خلصتِ المستند؟ قولي نعم أو لا."
        );
    };


    App.handleSpeech = function (text) {

        console.log(
            "STATE:",
            App.state,
            "TEXT:",
            text
        );


        // =========================
        // الأوامر العامة أولًا
        // =========================

        if (
            App.isNavigationCommand(text)
        ) {

            App.executeNavigation(text);

            return;
        }


        // =========================
        // سؤال إنشاء المستند
        // =========================

        if (App.state === "CREATE_QUESTION") {

            if (App.isYes(text)) {

                App.state = "READY_QUESTION";

                App.speak(
                    "تم إنشاء مستند جديد. هل أنتِ جاهزة للكتابة؟ قولي نعم أو لا."
                );

                return;
            }


            if (App.isNo(text)) {

                App.state = "WAITING_COMMAND";

                App.speak(
                    "حسنًا، لن ننشئ مستندًا الآن. أنا جاهزة لأي أمر آخر."
                );

                return;
            }


            App.speak(
                "لم أفهم الإجابة. قولي نعم لإنشاء مستند، أو لا لعدم إنشاء المستند."
            );

            return;
        }


        // =========================
        // هل أنتِ جاهزة؟
        // =========================

        if (App.state === "READY_QUESTION") {

            if (App.isYes(text)) {

                App.startWriting();

                return;
            }


            if (App.isNo(text)) {

                App.state = "WAITING_COMMAND";

                App.speak(
                    "حسنًا، لن نبدأ الكتابة الآن. أنا جاهزة لأي أمر آخر."
                );

                return;
            }


            App.speak(
                "قولي نعم إذا كنتِ جاهزة للكتابة، أو لا."
            );

            return;
        }


        // =========================
        // تأكيد النص
        // =========================

        if (App.state === "CONFIRM_TEXT") {

            if (App.isYes(text)) {

                App.lastConfirmedText =
                    App.lastWrittenText;

                App.state = "WRITING";

                App.speak(
                    "تمام، تم اعتماد النص. قولي النص التالي."
                );

                return;
            }


            if (App.isNo(text)) {

                App.askForCorrection();

                return;
            }


            App.speak(
                "قولي نعم إذا كان النص صحيحًا، أو لا إذا كان النص يحتاج إلى تعديل."
            );

            return;
        }


        // =========================
        // انتظار النص الصحيح
        // =========================

        if (App.state === "CORRECTION") {

            if (
                App.isYes(text) ||
                App.isNo(text)
            ) {

                App.speak(
                    "قولي النص الصحيح الذي تريدين استبداله."
                );

                return;
            }


            App.replaceLastText(text);

            App.lastWrittenText = text;

            App.state = "CONFIRM_TEXT";

            App.speak(
                "عدلت النص إلى: " +
                text +
                ". هل النص صحيح أم لا؟ قولي نعم أو لا."
            );

            return;
        }


        // =========================
        // أثناء الكتابة
        // =========================

        if (App.state === "WRITING") {

            const normalized =
                App.normalize(text);


            if (
                normalized === "خلصت" ||
                normalized === "انتهيت" ||
                normalized === "خلصت الكتابة" ||
                normalized === "انتهيت من الكتابة"
            ) {

                App.finishWriting();

                return;
            }


            if (
                normalized === "كمل" ||
                normalized === "كملي" ||
                normalized === "تابع"
            ) {

                App.speak(
                    "تمام، كملي وأنا أكتب."
                );

                return;
            }


            App.writeText(text);

            App.askTextConfirmation(text);

            return;
        }


        // =========================
        // انتهيت من المستند
        // =========================

        if (App.state === "FINISHED_QUESTION") {

            if (App.isYes(text)) {

                App.state = "SAVE_QUESTION";

                App.speak(
                    "ممتاز. هل تريدين حفظ المستند؟ قولي نعم أو لا."
                );

                return;
            }


            if (App.isNo(text)) {

                App.state = "WRITING";

                App.speak(
                    "حسنًا. يمكنك الاستمرار في تعديل المستند أو إضافة نص جديد."
                );

                return;
            }


            App.speak(
                "قولي نعم إذا كنتِ خلصتِ المستند، أو لا للاستمرار في الكتابة."
            );

            return;
        }


        // =========================
        // لو لا يوجد سيناريو حالي
        // =========================

        App.processCommand(text);

    };


})();
</script>

<script>
(function () {

    "use strict";

    const App = window.WordApp;

    if (!App) return;


    App.pages = {

        "الرئيسية": "index.php",

        "الصفحة الرئيسية": "index.php",

        "إدارة الملفات": "notificationc.php",

        "الملفات": "notificationc.php",

        "المهام": "tasks.php",

        "إكسل": "Excel.php",

        "excel": "Excel.php",

        "وورد": "Word.php",

        "word": "Word.php",

        "باوربوينت": "PowerPoint.php",

        "التقييم": "evaluation.php",

        "الإنجازات": "evaluation.php",

        "الجدول": "schedule.php",

        "المواعيد": "schedule.php",

        "الموظفين": "employees.php",

        "المدير": "employees.php",

        "الإعدادات": "settings.php",

        "الروحانيات": "TEAN.php",

        "المساعد البصري": "visual-assistant.php",

        "التواصل": "communication.php"

    };


    App.isNavigationCommand = function (text) {

        const t = App.normalize(text);


        const words = [
            "افتح",
            "افتحي",
            "وديني",
            "اذهب",
            "روحي",
            "روح",
            "انتقل",
            "انتقلي"
        ];


        const hasNavigationWord =
            words.some(function (word) {

                return t.includes(word);

            });


        if (!hasNavigationWord) {
            return false;
        }


        return (
            t.includes("الرئيسية") ||
            t.includes("إدارة الملفات") ||
            t.includes("الملفات") ||
            t.includes("المهام") ||
            t.includes("إكسل") ||
            t.includes("excel") ||
            t.includes("وورد") ||
            t.includes("word") ||
            t.includes("باوربوينت") ||
            t.includes("التقييم") ||
            t.includes("الإنجازات") ||
            t.includes("الجدول") ||
            t.includes("المواعيد") ||
            t.includes("الموظفين") ||
            t.includes("المدير") ||
            t.includes("الإعدادات") ||
            t.includes("الروحانيات") ||
            t.includes("المساعد البصري") ||
            t.includes("التواصل")
        );
    };


    App.getNavigationPage = function (text) {

        const t = App.normalize(text);


        if (t.includes("الرئيسية")) {
            return "index.php";
        }


        if (
            t.includes("إدارة الملفات") ||
            t.includes("الملفات")
        ) {
            return "notifications.php";
        }


        if (t.includes("المهام")) {
            return "tasks.php";
        }


        if (
            t.includes("إكسل") ||
            t.includes("excel")
        ) {
            return "Excel.php";
        }


        if (
            t.includes("وورد") ||
            t.includes("word")
        ) {
            return "Word.php";
        }


        if (t.includes("باوربوينت")) {
            return "PowerPoint.php";
        }


        if (
            t.includes("التقييم") ||
            t.includes("الإنجازات")
        ) {
            return "evaluation.php";
        }


        if (
            t.includes("الجدول") ||
            t.includes("المواعيد")
        ) {
            return "schedule.php";
        }


        if (
            t.includes("الموظفين") ||
            t.includes("المدير")
        ) {
            return "employees.php";
        }


        if (t.includes("الإعدادات")) {
            return "settings.php";
        }


        if (t.includes("الروحانيات")) {
            return "TEAN.php";
        }


        if (t.includes("المساعد البصري")) {
            return "visual-assistant.php";
        }


        if (t.includes("التواصل")) {
            return "communication.php";
        }


        return null;
    };


    App.executeNavigation = function (text) {

        const page =
            App.getNavigationPage(text);


        if (!page) {

            App.speak(
                "لم أتعرف على الصفحة المطلوبة."
            );

            return;
        }


        let pageName = "الصفحة المطلوبة";


        if (page === "index.php") {
            pageName = "الصفحة الرئيسية";
        }

        else if (page === "notificationc.php") {
            pageName = "إدارة الملفات";
        }

        else if (page === "tasks.php") {
            pageName = "المهام";
        }

        else if (page === "Excel.php") {
            pageName = "إكسل";
        }

        else if (page === "Word.php") {
            pageName = "وورد";
        }

        else if (page === "PowerPoint.php") {
            pageName = "باوربوينت";
        }

        else if (page === "evaluation.php") {
            pageName = "التقييم";
        }

        else if (page === "schedule.php") {
            pageName = "الجدول والمواعيد";
        }

        else if (page === "employees.php") {
            pageName = "الموظفين والمدير";
        }

        else if (page === "settings.php") {
            pageName = "الإعدادات";
        }

        else if (page === "TEAN.php") {
            pageName = "الروحانيات";
        }

        else if (page === "visual-assistant.php") {
            pageName = "المساعد البصري";
        }

        else if (page === "communication.php") {
            pageName = "التواصل";
        }


        App.speak(
            "حسنًا، سأفتح " +
            pageName +
            "."
        );


        setTimeout(function () {

            window.location.href = page;

        }, 1200);

    };


    // =========================
    // سؤال: الصفحة دي بتعمل إيه؟
    // =========================

    App.explainPage = function () {

        App.speak(
            "هذه صفحة وورد من مبصر. تستخدمينها لإنشاء المستندات وكتابة النصوص وتعديلها وحفظها باستخدام الأوامر الصوتية."
        );

    };


    // =========================
    // استبدال processCommand
    // =========================

    const oldProcessCommand =
        App.processCommand;


    App.processCommand = function (text) {

        const t = App.normalize(text);


        if (
            t.includes("الصفحة دي بتعمل ايه") ||
            t.includes("الصفحة دي بتعمل إيه") ||
            t.includes("ما هي الصفحة") ||
            t.includes("الصفحة دي ايه")
        ) {

            App.explainPage();

            return;
        }


        if (
            t.includes("افتح الصفحة الرئيسية") ||
            t.includes("وديني الصفحة الرئيسية") ||
            t.includes("افتح إدارة الملفات") ||
            t.includes("وديني إدارة الملفات") ||
            t.includes("افتح المهام") ||
            t.includes("وديني المهام")
        ) {

            App.executeNavigation(text);

            return;
        }


        if (typeof oldProcessCommand === "function") {
            oldProcessCommand(text);
        }

    };


})();
</script>


<script>
(function () {

    "use strict";

    const App = window.WordApp;

    if (!App) return;


    App.getDocumentText = function () {

        const editor =
            document.querySelector(".document-editor");

        if (!editor) return "";

        return editor.innerText.trim();
    };


    App.saveDocument = function () {

        const text =
            App.getDocumentText();


        if (!text) {

            App.speak(
                "المستند فارغ، لا يوجد نص لحفظه."
            );

            return;
        }


        App.speak(
            "حسنًا، جاري حفظ المستند."
        );


        // سيتم ربط MySQL هنا
        // في الجزء الخاص بالـ PHP والحفظ


        setTimeout(function () {

            App.speak(
                "تم تجهيز المستند للحفظ بنجاح."
            );

            App.state = "WAITING_COMMAND";

        }, 1200);

    };


    // =========================
    // سؤال الحفظ
    // =========================

    const oldHandleSpeech =
        App.handleSpeech;


    App.handleSpeech = function (text) {

        if (
            App.state === "SAVE_QUESTION"
        ) {

            if (App.isYes(text)) {

                App.saveDocument();

                return;
            }


            if (App.isNo(text)) {

                App.state = "WAITING_COMMAND";

                App.speak(
                    "حسنًا، لن أحفظ المستند الآن. أنا جاهزة لأي أمر آخر."
                );

                return;
            }


            App.speak(
                "قولي نعم لحفظ المستند، أو لا لعدم حفظه الآن."
            );

            return;
        }


        if (typeof oldHandleSpeech === "function") {
            oldHandleSpeech(text);
        }

    };


    // =========================
    // قراءة أزرار الصفحة
    // =========================

    document.addEventListener(
        "click",
        function (event) {

            const button =
                event.target.closest(
                    "button, a, select"
                );


            if (!button) return;


            if (App.isSpeaking) return;


            let name =
                button.innerText ||
                button.getAttribute("title") ||
                button.getAttribute("aria-label") ||
                "";


            name = name.trim();


            if (!name) return;


            let explanation = "";


            if (
                name.includes("الرئيسية")
            ) {

                explanation =
                    "هذا الزر يفتح الصفحة الرئيسية.";
            }


            else if (
                name.includes("حفظ")
            ) {

                explanation =
                    "هذا الزر يستخدم لحفظ المستند.";
            }


            else if (
                name.includes("نسخ")
            ) {

                explanation =
                    "هذا الزر يستخدم لنسخ النص المحدد.";
            }


            else if (
                name.includes("قص")
            ) {

                explanation =
                    "هذا الزر يستخدم لقص النص المحدد.";
            }


            else if (
                name.includes("لصق")
            ) {

                explanation =
                    "هذا الزر يستخدم للصق النص.";
            }


            else if (
                name.includes("بحث")
            ) {

                explanation =
                    "هذا الزر يستخدم للبحث داخل المستند.";
            }


            else {

                explanation =
                    "هذا الزر هو " +
                    name +
                    ".";
            }


            App.speak(
                name +
                ". " +
                explanation
            );

        },
        true
    );


    // =========================
    // أوامر إضافية
    // =========================

    const oldProcess =
        App.processCommand;


    App.processCommand = function (text) {

        const t =
            App.normalize(text);


        if (
            t.includes("احذف آخر") ||
            t.includes("امسح آخر")
        ) {

            const editor =
                document.querySelector(
                    ".document-editor"
                );


            if (
                editor &&
                App.lastWrittenText
            ) {

                const nodes =
                    Array.from(
                        editor.childNodes
                    );


                for (
                    let i = nodes.length - 1;
                    i >= 0;
                    i--
                ) {

                    if (
                        nodes[i].nodeType ===
                        Node.TEXT_NODE &&
                        nodes[i].textContent.trim() ===
                        App.lastWrittenText.trim()
                    ) {

                        editor.removeChild(
                            nodes[i]
                        );

                        App.speak(
                            "تم حذف آخر نص."
                        );

                        App.lastWrittenText = "";

                        App.state = "WRITING";

                        return;
                    }
                }
            }


            App.speak(
                "لا يوجد نص أخير لحذفه."
            );

            return;
        }


        if (
            t.includes("ابدأ من جديد") ||
            t.includes("اعملي جدول جديد") ||
            t.includes("مستند جديد")
        ) {

            const editor =
                document.querySelector(
                    ".document-editor"
                );


            if (editor) {
                editor.innerHTML = "";
            }


            App.lastWrittenText = "";

            App.lastConfirmedText = "";

            App.documentStarted = true;

            App.state = "WRITING";


            App.speak(
                "تم بدء مستند جديد. قولي النص الذي تريدين كتابته."
            );

            return;
        }


        if (
            t.includes("خلصت") ||
            t.includes("انتهيت")
        ) {

            App.finishWriting();

            return;
        }


        if (
            typeof oldProcess ===
            "function"
        ) {

            oldProcess(text);
        }

    };


})();
</script>
</body>

</html>