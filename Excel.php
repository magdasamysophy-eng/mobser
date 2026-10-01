<?php
require_once 'DB.php';

/* =========================================================
   Excel.php
   PART 1
   PHP + Database
   ========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json; charset=utf-8');

    $action = $_POST['action'] ?? '';

    try {

        /* =========================
           SAVE EXCEL
           ========================= */

        if ($action === 'save_excel') {

            $documentName = trim($_POST['document_name'] ?? '');
            $documentData = $_POST['document_data'] ?? '{}';

            if ($documentName === '') {

                echo json_encode([
                    'success' => false,
                    'message' => 'اسم الملف مطلوب.'
                ], JSON_UNESCAPED_UNICODE);

                exit;
            }

            $userId = 1;

            $sql = "
                INSERT INTO mabsar_office_documents
                (
                    user_id,
                    document_type,
                    document_name,
                    document_data
                )
                VALUES
                (
                    :user_id,
                    'Excel',
                    :document_name,
                    :document_data
                )
            ";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':user_id' => $userId,
                ':document_name' => $documentName,
                ':document_data' => $documentData
            ]);

            echo json_encode([
                'success' => true,
                'message' => 'تم حفظ ملف Excel بنجاح.',
                'id' => $pdo->lastInsertId()
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }


        /* =========================
           GET FILES
           ========================= */

        if ($action === 'get_excel_files') {

            $userId = 1;

            $stmt = $pdo->prepare("
                SELECT
                    id,
                    document_name,
                    created_at,
                    updated_at
                FROM mabsar_office_documents
                WHERE user_id = :user_id
                AND document_type = 'Excel'
                ORDER BY id DESC
            ");

            $stmt->execute([
                ':user_id' => $userId
            ]);

            echo json_encode([
                'success' => true,
                'files' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }


        /* =========================
           OPEN FILE
           ========================= */

        if ($action === 'open_excel') {

            $id = intval($_POST['id'] ?? 0);

            $stmt = $pdo->prepare("
                SELECT
                    id,
                    document_name,
                    document_data
                FROM mabsar_office_documents
                WHERE id = :id
                AND document_type = 'Excel'
                LIMIT 1
            ");

            $stmt->execute([
                ':id' => $id
            ]);

            $file = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$file) {

                echo json_encode([
                    'success' => false,
                    'message' => 'الملف غير موجود.'
                ], JSON_UNESCAPED_UNICODE);

                exit;
            }

            echo json_encode([
                'success' => true,
                'file' => $file
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }


        /* =========================
           DELETE FILE
           ========================= */

        if ($action === 'delete_excel') {

            $id = intval($_POST['id'] ?? 0);

            $stmt = $pdo->prepare("
                DELETE FROM mabsar_office_documents
                WHERE id = :id
                AND document_type = 'Excel'
            ");

            $stmt->execute([
                ':id' => $id
            ]);

            echo json_encode([
                'success' => true,
                'message' => 'تم حذف الملف.'
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }


        echo json_encode([
            'success' => false,
            'message' => 'أمر غير معروف.'
        ], JSON_UNESCAPED_UNICODE);

        exit;

    } catch (Throwable $e) {

        echo json_encode([
            'success' => false,
            'message' => 'حدث خطأ: ' . $e->getMessage()
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>MOBSAR | Excel</title>

<style>

/* =========================================================
   PART 2
   Excel Design
   ========================================================= */

* {
    box-sizing: border-box;
}

html,
body {
    margin: 0;
    padding: 0;
    width: 100%;
    min-height: 100%;
    font-family: Tahoma, Arial, sans-serif;
    background: #f3f3f3;
    color: #222;
}

body {
    overflow-x: hidden;
}


/* =========================
   TOP BAR
   ========================= */

.excel-topbar {

    height: 58px;

    background: #217346;

    color: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 15px;

    box-shadow:
        0 2px 8px rgba(0,0,0,.25);

    position: sticky;

    top: 0;

    z-index: 1000;
}


.excel-brand {

    display: flex;

    align-items: center;

    gap: 10px;

    font-size: 19px;

    font-weight: bold;
}


.excel-logo {

    width: 34px;

    height: 34px;

    background: white;

    color: #217346;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 5px;

    font-size: 22px;

    font-weight: bold;
}


.home-btn {

    border: none;

    background: rgba(255,255,255,.15);

    color: white;

    padding: 9px 15px;

    border-radius: 7px;

    cursor: pointer;

    font-family: inherit;

    font-size: 14px;

    transition: .2s;
}


.home-btn:hover {

    background: rgba(255,255,255,.28);

}


/* =========================
   TABS
   ========================= */

.excel-tabs {

    background: #f7f7f7;

    display: flex;

    gap: 3px;

    padding: 7px 10px;

    border-bottom: 1px solid #ccc;

    overflow-x: auto;

    direction: rtl;
}


.excel-tab {

    border: none;

    background: transparent;

    padding: 8px 15px;

    cursor: pointer;

    font-family: inherit;

    color: #444;

    border-radius: 5px;
}


.excel-tab:hover {

    background: #e3e3e3;
}


.excel-tab.active {

    background: #dff0e5;

    color: #217346;

    font-weight: bold;
}


/* =========================
   RIBBON
   ========================= */

.ribbon {

    background: #fff;

    min-height: 90px;

    border-bottom: 1px solid #ccc;

    display: flex;

    align-items: center;

    gap: 15px;

    padding: 10px;

    overflow-x: auto;
}


.ribbon-group {

    display: flex;

    flex-direction: column;

    align-items: center;

    gap: 5px;

    min-width: 75px;

    border-left: 1px solid #ddd;

    padding-left: 12px;
}


.ribbon-buttons {

    display: flex;

    gap: 4px;

    flex-wrap: wrap;

    justify-content: center;
}


.ribbon-btn {

    border: 1px solid #ddd;

    background: #fff;

    min-width: 38px;

    min-height: 32px;

    border-radius: 4px;

    cursor: pointer;

    font-family: inherit;

}


.ribbon-btn:hover {

    background: #eaf4ed;

    border-color: #217346;
}


.ribbon-label {

    font-size: 11px;

    color: #555;
}

</style>
<style>

/* =========================================================
   PART 3
   Formula Bar + Workspace
   ========================================================= */

.formula-area {

    height: 42px;

    background: #f8f8f8;

    border-bottom: 1px solid #ccc;

    display: flex;

    align-items: center;

    gap: 8px;

    padding: 5px 10px;
}


.cell-name {

    width: 75px;

    height: 30px;

    border: 1px solid #bbb;

    background: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: bold;

    direction: ltr;
}


.fx {

    font-weight: bold;

    color: #217346;

    font-size: 18px;
}


.formula-input {

    flex: 1;

    height: 30px;

    border: 1px solid #bbb;

    padding: 5px 10px;

    direction: ltr;

    font-family: Arial;
}


/* =========================
   WORKSPACE
   ========================= */

.excel-workspace {

    width: 100%;

    overflow: auto;

    background: #d9d9d9;

    height: calc(100vh - 250px);

    direction: ltr;
}


.excel-table {

    border-collapse: collapse;

    background: white;

    min-width: 900px;
}


.excel-table th {

    background: #f1f1f1;

    border: 1px solid #bbb;

    height: 30px;

    min-width: 100px;

    text-align: center;

    font-weight: bold;

    position: sticky;

    top: 0;

    z-index: 5;
}


.excel-table th.row-number {

    min-width: 45px;

    width: 45px;

    left: 0;

    z-index: 10;
}


.excel-table td {

    border: 1px solid #d0d0d0;

    min-width: 100px;

    height: 32px;

    padding: 5px 8px;

    background: white;

    outline: none;

    direction: rtl;

    text-align: right;
}


.excel-table td.selected-cell {

    outline: 2px solid #217346;

    outline-offset: -2px;

    background: #f2faf5;
}


.excel-table td:focus {

    outline: 2px solid #217346;

    outline-offset: -2px;
}


.row-number {

    background: #f1f1f1 !important;

    text-align: center !important;

    direction: ltr !important;

    color: #555;

    font-weight: bold;
}


/* =========================
   SHEET BAR
   ========================= */

.sheet-bar {

    height: 38px;

    background: #f4f4f4;

    border-top: 1px solid #ccc;

    display: flex;

    align-items: center;

    gap: 8px;

    padding: 4px 10px;

    direction: ltr;
}


.sheet {

    background: white;

    border: 1px solid #bbb;

    border-bottom: 3px solid #217346;

    padding: 6px 20px;

    border-radius: 5px 5px 0 0;

    font-size: 13px;
}


.add-sheet {

    border: none;

    background: transparent;

    font-size: 22px;

    cursor: pointer;

    color: #217346;
}


/* =========================
   STATUS
   ========================= */

.status-bar {

    height: 30px;

    background: #217346;

    color: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 12px;

    font-size: 12px;
}


.voice-status {

    display: flex;

    align-items: center;

    gap: 6px;
}


.status-dot {

    width: 9px;

    height: 9px;

    border-radius: 50%;

    background: #8aff9c;

    display: inline-block;
}


/* =========================
   NOTIFICATION
   ========================= */

.excel-notification {

    position: fixed;

    top: 70px;

    left: 50%;

    transform: translateX(-50%);

    min-width: 250px;

    max-width: 90%;

    background: #217346;

    color: white;

    padding: 12px 18px;

    border-radius: 7px;

    text-align: center;

    font-size: 14px;

    z-index: 5000;

    display: none;

    box-shadow: 0 5px 20px rgba(0,0,0,.25);
}


/* =========================
   RESPONSIVE
   ========================= */

@media (max-width: 700px) {

    .excel-brand {

        font-size: 15px;
    }

    .ribbon {

        min-height: 75px;
    }

    .excel-workspace {

        height: calc(100vh - 225px);
    }

}

</style>

</head>

<body>
    <!-- =========================================================
     PART 4
     Excel Interface
     ========================================================= -->

<header class="excel-topbar">

    <div class="excel-brand">

        <div class="excel-logo">X</div>

        <span>MOBSAR | Excel</span>

    </div>


    <button
        class="home-btn"
        id="homeBtn"
        type="button">

        🏠 الرئيسية

    </button>

</header>


<nav class="excel-tabs">

    <button class="excel-tab active">Home</button>

    <button class="excel-tab">Insert</button>

    <button class="excel-tab">Page Layout</button>

    <button class="excel-tab">Formulas</button>

    <button class="excel-tab">Data</button>

    <button class="excel-tab">Review</button>

    <button class="excel-tab">View</button>

</nav>


<section class="ribbon">


    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button
                class="ribbon-btn"
                id="copyBtn">
                نسخ
            </button>

            <button
                class="ribbon-btn"
                id="pasteBtn">
                لصق
            </button>

        </div>

        <div class="ribbon-label">
            الحافظة
        </div>

    </div>


    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button
                class="ribbon-btn"
                id="boldBtn">
                <b>B</b>
            </button>

            <button
                class="ribbon-btn"
                id="italicBtn">
                <i>I</i>
            </button>

            <button
                class="ribbon-btn"
                id="underlineBtn">
                <u>U</u>
            </button>

        </div>

        <div class="ribbon-label">
            الخط
        </div>

    </div>


    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button
                class="ribbon-btn"
                id="alignRightBtn">
                يمين
            </button>

            <button
                class="ribbon-btn"
                id="alignCenterBtn">
                وسط
            </button>

            <button
                class="ribbon-btn"
                id="alignLeftBtn">
                شمال
            </button>

        </div>

        <div class="ribbon-label">
            المحاذاة
        </div>

    </div>


    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button
                class="ribbon-btn"
                id="createTableBtn">
                جدول
            </button>

            <button
                class="ribbon-btn"
                id="deleteBtn">
                حذف
            </button>

            <button
                class="ribbon-btn"
                id="printBtn">
                طباعة
            </button>

        </div>

        <div class="ribbon-label">
            أدوات
        </div>

    </div>


    <div class="ribbon-group">

        <div class="ribbon-buttons">

            <button
                class="ribbon-btn"
                id="saveBtn">
                حفظ
            </button>

            <button
                class="ribbon-btn"
                id="openBtn">
                فتح
            </button>

        </div>

        <div class="ribbon-label">
            الملفات
        </div>

    </div>

</section>


<section class="formula-area">

    <div
        class="cell-name"
        id="currentCellName">
        A1
    </div>

    <div class="fx">fx</div>

    <input
        type="text"
        class="formula-input"
        id="formulaInput"
        placeholder="اكتب قيمة الخلية أو المعادلة">

</section>


<div class="excel-workspace">

    <table
        class="excel-table"
        id="excelTable">

        <thead id="excelHead"></thead>

        <tbody id="excelBody"></tbody>

    </table>

</div>


<div class="sheet-bar">

    <div class="sheet">
        Sheet1
    </div>

    <button
        class="add-sheet"
        id="addSheetBtn">
        +
    </button>

</div>


<div class="status-bar">

    <div id="statusText">
        جاهز
    </div>

    <div class="voice-status">

        <span
            class="status-dot">
        </span>

        <span id="voiceStatus">
            اضغط في أي مكان لتفعيل الصوت
        </span>

    </div>

</div>


<div
    class="excel-notification"
    id="notification">
</div>




<script>
/* =========================================================
   MOBSAR EXCEL — PART 1
   Voice Engine + Continuous Listening
   ========================================================= */

(function () {
    "use strict";

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        console.error("المتصفح لا يدعم Speech Recognition.");
        return;
    }

    const App = window.ExcelApp = window.ExcelApp || {};

    App.handlers = App.handlers || {};

    App.register = function (name, handler) {
        App.handlers[name] = handler;
    };

    App.speaking = false;
    App.listening = false;
    App.activated = false;
    App.processing = false;

    App.clean = function (text) {
        return String(text || "")
            .toLowerCase()
            .trim()
            .replace(/[إأآا]/g, "ا")
            .replace(/ة/g, "ه")
            .replace(/ى/g, "ي")
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .replace(/\s+/g, " ");
    };

    App.status = function (text) {
        const el = document.getElementById("voiceStatus");
        if (el) el.textContent = text;
    };

    App.say = function (text) {
        if (!text) return;

        if (App.recognition) {
            try {
                App.recognition.abort();
            } catch (e) {}
        }

        App.speaking = true;
        App.status("مبصر يتحدث...");

        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = "ar-EG";
        utterance.rate = 0.92;
        utterance.pitch = 1;

        utterance.onend = function () {
            App.speaking = false;
            App.status("مبصر يستمع...");

            setTimeout(function () {
                App.startListening();
            }, 250);
        };

        utterance.onerror = function () {
            App.speaking = false;
            App.startListening();
        };

        window.speechSynthesis.cancel();
        window.speechSynthesis.speak(utterance);
    };

    App.speak = App.say;

    App.dispatch = function (text) {
        if (!text || App.processing) return;

        App.processing = true;

        const handlers =
            Object.keys(App.handlers);

        for (const name of handlers) {
            try {
                const handled =
                    App.handlers[name](text);

                if (handled === true) {
                    break;
                }
            } catch (error) {
                console.error(
                    "MOBSAR handler error:",
                    name,
                    error
                );
            }
        }

        setTimeout(function () {
            App.processing = false;
        }, 150);
    };

    App.recognition =
        new SpeechRecognition();

    App.recognition.lang = "ar-EG";
    App.recognition.continuous = true;
    App.recognition.interimResults = false;
    App.recognition.maxAlternatives = 3;

    App.recognition.onstart = function () {
        App.listening = true;
        App.status("مبصر يستمع...");
    };

    App.recognition.onresult = function (event) {

        if (App.speaking) return;

        for (
            let i = event.resultIndex;
            i < event.results.length;
            i++
        ) {
            if (
                event.results[i].isFinal
            ) {
                const text =
                    event.results[i][0].transcript
                        .trim();

                if (text) {
                    console.log(
                        "MOBSAR:",
                        text
                    );

                    App.dispatch(text);
                }
            }
        }
    };

    App.recognition.onerror = function (event) {

        console.log(
            "Voice error:",
            event.error
        );

        if (
            event.error === "not-allowed" ||
            event.error === "service-not-allowed"
        ) {
            App.status(
                "اسمحي للمتصفح باستخدام الميكروفون"
            );
        }
    };

    App.recognition.onend = function () {

        App.listening = false;

        if (
            App.activated &&
            !App.speaking
        ) {
            setTimeout(function () {
                App.startListening();
            }, 300);
        }
    };

    App.startListening = function () {

        if (!App.activated) return;
        if (App.speaking) return;

        try {
            App.recognition.start();
        } catch (e) {}
    };

    App.activate = function () {

        if (App.activated) return;

        App.activated = true;

        App.status("جاري تشغيل الميكروفون...");

        setTimeout(function () {

            App.say(
                "مرحبًا بك في Excel مبصر. يمكنك إنشاء جدول أو قول إنشاء جدول."
            );

        }, 500);
    };

    document.addEventListener(
        "pointerdown",
        function () {
            App.activate();
        },
        {
            once: true,
            passive: true
        }
    );

    window.addEventListener(
        "load",
        function () {

            setTimeout(function () {

                if (!App.activated) {
                    App.status(
                        "اضغط في أي مكان لتفعيل الصوت"
                    );
                }

            }, 500);

        }
    );

})();
</script>


<script>
/* =========================================================
   MOBSAR EXCEL — PART 2
   Greeting + Excel Explanation
   ========================================================= */

(function () {
    "use strict";

    if (!window.ExcelApp) return;

    function clean(text) {
        return window.ExcelApp.clean(text);
    }

    function handler(rawText) {

        const text = clean(rawText);

        if (
            text === "السلام عليكم" ||
            text.includes("السلام عليكم")
        ) {
            window.ExcelApp.say(
                "وعليكم السلام ورحمة الله وبركاته."
            );

            return true;
        }

        if (
            text.includes("يعني ايه اكسل") ||
            text.includes("يعني اي اكسل") ||
            text.includes("ما هو اكسل") ||
            text.includes("ايه هو اكسل")
        ) {

            window.ExcelApp.say(
                "Excel هو برنامج لتنظيم البيانات في صفوف وأعمدة، ويمكن استخدامه للحسابات والجداول والمرتبات والضرائب والعلاوات."
            );

            return true;
        }

        return false;
    }

    window.ExcelApp.register(
        "excel-greetings",
        handler
    );

})();
</script>




<script>
/* =========================================================
   MOBSAR EXCEL — PART 3
   Global Page Navigation
   ========================================================= */

(function () {
    "use strict";

    if (!window.ExcelApp) return;

    const pages = [

        {
            names: [
                "الرئيسيه",
                "الرئيسية",
                "اندكس",
                "index",
                "هوم",
                "الصفحه الرئيسيه"
            ],
            file: "index.php",
            title: "الرئيسية"
        },

        {
            names: [
                "التسجيل",
                "تسجيل",
                "register"
            ],
            file: "register.php",
            title: "التسجيل"
        },

        {
            names: [
                "المهام",
                "تاسكس",
                "تاكسيز",
                "tasks"
            ],
            file: "tasks.php",
            title: "المهام"
        },

        {
            names: [
                "التقييم",
                "الانجازات",
                "الإنجازات"
            ],
            file: "evaluation.php",
            title: "التقييم والإنجازات"
        },

        {
            names: [
                "المواعيد",
                "المواعيد والتقويم",
                "المواعيد",
                "اجندة"
            ],
            file: "appointments.php",
            title: "المواعيد"
        },

        {
            names: [
                "التواصل",
                "اتصال",
                "communication"
            ],
            file: "communication.php",
            title: "التواصل"
        },

        {
            names: [
                "اداره الملفات",
                "إدارة الملفات",
                "الملفات",
                "files"
            ],
            file: "files.php",
            title: "إدارة الملفات"
        },

        {
            names: [
                "الاشعارات",
                "الإشعارات",
                "نوتيفيكيشن",
                "notifications"
            ],
            file: "notifications.php",
            title: "الإشعارات"
        },

        {
            names: [
                "المثال البصري",
                "مثال بصري",
                "visual"
            ],
            file: "visual-example.php",
            title: "المثال البصري"
        },

        {
            names: [
                "الموظفين",
                "الموظفين والمدير",
                "الموظفين المدير"
            ],
            file: "employees.php",
            title: "الموظفين"
        },

        {
            names: [
                "روحانيات",
                "روحانيه",
                "الروحانيات"
            ],
            file: "spiritual.php",
            title: "الروحانيات"
        },

        {
            names: [
                "الاعدادات",
                "الإعدادات",
                "settings"
            ],
            file: "settings.php",
            title: "الإعدادات"
        },

        {
            names: [
                "المصحف",
                "القران",
                "القرآن",
                "quran"
            ],
            file: "Quran.php",
            title: "المصحف"
        },

        {
            names: [
                "الاذكار",
                "الأذكار",
                "azkar"
            ],
            file: "Azkar.php",
            title: "الأذكار"
        },

        {
            names: [
                "الدعاء",
                "الادعية",
                "الأدعية"
            ],
            file: "Duaa.php",
            title: "الدعاء"
        },

        {
            names: [
                "الاحاديث",
                "الأحاديث",
                "حديث"
            ],
            file: "Hadith.php",
            title: "الأحاديث"
        },

        {
            names: [
                "الصلاه",
                "الصلاة",
                "prayer"
            ],
            file: "Prayer.php",
            title: "الصلاة"
        },

        {
            names: [
                "قصص الانبياء",
                "قصص الأنبياء",
                "الانبياء"
            ],
            file: "Prophets.php",
            title: "قصص الأنبياء"
        },

        {
            names: [
                "الوورد",
                "ورد",
                "word"
            ],
            file: "word.php",
            title: "Word"
        },

        {
            names: [
                "الباوربوينت",
                "باوربوينت",
                "powerpoint"
            ],
            file: "powerpoint.php",
            title: "PowerPoint"
        },

        {
            names: [
                "الاكسل",
                "إكسل",
                "اكسل",
                "excel"
            ],
            file: "excel.php",
            title: "Excel"
        },

        {
            names: [
                "الفريق",
                "team"
            ],
            file: "team.php",
            title: "الفريق"
        },

        {
            names: [
                "مبصر اي اي",
                "مبصر ai",
                "mobsar ai"
            ],
            file: "mobsar-ai.php",
            title: "MOBSAR AI"
        }
    ];

    function normalize(text) {
        return window.ExcelApp.clean(text)
            .replace(/\s+/g, " ");
    }

    function findPage(text) {

        const value =
            normalize(text);

        for (const page of pages) {

            for (const name of page.names) {

                if (
                    value.includes(
                        normalize(name)
                    )
                ) {
                    return page;
                }
            }
        }

        return null;
    }

    function handler(rawText) {

        const text =
            normalize(rawText);

        if (
            !(
                text.includes("افتح") ||
                text.includes("اذهب") ||
                text.includes("روح") ||
                text.includes("انتقل") ||
                text.includes("ادخل")
            )
        ) {
            return false;
        }

        const page =
            findPage(text);

        if (!page) return false;

        window.ExcelApp.say(
            "حاضر، سأفتح صفحة " +
            page.title
        );

        setTimeout(function () {

            window.location.href =
                page.file;

        }, 700);

        return true;
    }

    window.ExcelApp.register(
        "mobsar-navigation",
        handler
    );

    window.MobsarPages = pages;

})();
</script>






<script>
/* =========================================================
   MOBSAR EXCEL — PART 4
   Excel Grid Engine
   ========================================================= */

(function () {
    "use strict";

    if (!window.ExcelApp) return;

    const ROWS = 30;
    const COLS = 30;

    function columnName(number) {

        let name = "";
        let n = number + 1;

        while (n > 0) {

            const remainder =
                (n - 1) % 26;

            name =
                String.fromCharCode(
                    65 + remainder
                ) + name;

            n =
                Math.floor(
                    (n - 1) / 26
                );
        }

        return name;
    }

    function createGrid() {

        const head =
            document.getElementById(
                "excelHead"
            );

        const body =
            document.getElementById(
                "excelBody"
            );

        if (!head || !body) return;

        head.innerHTML = "";
        body.innerHTML = "";

        const headerRow =
            document.createElement("tr");

        const corner =
            document.createElement("th");

        corner.textContent = "#";
        headerRow.appendChild(corner);

        for (
            let c = 0;
            c < COLS;
            c++
        ) {

            const th =
                document.createElement("th");

            th.textContent =
                columnName(c);

            headerRow.appendChild(th);
        }

        head.appendChild(headerRow);

        for (
            let r = 0;
            r < ROWS;
            r++
        ) {

            const row =
                document.createElement("tr");

            const number =
                document.createElement("th");

            number.textContent =
                r + 1;

            row.appendChild(number);

            for (
                let c = 0;
                c < COLS;
                c++
            ) {

                const td =
                    document.createElement("td");

                td.contentEditable = "true";

                td.dataset.row = r;
                td.dataset.col = c;

                row.appendChild(td);
            }

            body.appendChild(row);
        }
    }

    function selectCell(cell) {

        document.querySelectorAll(
            "#excelBody td.selected"
        ).forEach(function (item) {
            item.classList.remove("selected");
        });

        if (!cell) return;

        cell.classList.add("selected");

        const row =
            Number(cell.dataset.row) + 1;

        const col =
            columnName(
                Number(cell.dataset.col)
            );

        const name =
            document.getElementById(
                "currentCellName"
            );

        if (name) {
            name.textContent =
                col + row;
        }

        const formula =
            document.getElementById(
                "formulaInput"
            );

        if (formula) {
            formula.value =
                cell.textContent;
        }
    }

    document.addEventListener(
        "click",
        function (event) {

            const cell =
                event.target.closest(
                    "#excelBody td"
                );

            if (cell) {
                selectCell(cell);
            }
        }
    );

    window.ExcelCore = {
        createGrid: createGrid,
        selectCell: selectCell,
        columnName: columnName
    };

    window.addEventListener(
        "load",
        function () {
            createGrid();
        }
    );

})();
</script>


<script>
/* =========================================================
   MOBSAR EXCEL - PART 5A
   إنشاء الجدول + إضافة الأعمدة واحدًا واحدًا بالتأكيد
   ========================================================= */

window.ExcelTable = window.ExcelTable || {};

(function () {
    "use strict";

    const state = {
        mode: "idle",

        columns: [],
        rowsCount: 0,

        pendingColumnName: "",
        pendingColumnNumber: 1,

        currentRow: 1,
        pendingRowData: null,
        waitingRowReview: false,
        waitingNextRow: false
    };

    /* =====================================================
       الكلام
       ===================================================== */

    function speak(text) {

        if (
            window.ExcelApp &&
            typeof window.ExcelApp.speak === "function"
        ) {
            window.ExcelApp.speak(text);
            return;
        }

        if ("speechSynthesis" in window) {

            speechSynthesis.cancel();

            const utterance =
                new SpeechSynthesisUtterance(text);

            utterance.lang = "ar-EG";
            utterance.rate = 0.95;

            speechSynthesis.speak(utterance);
        }
    }

    /* =====================================================
       تنظيف الكلام
       ===================================================== */

    function clean(text) {

        return String(text || "")
            .trim()
            .replace(/[؟?!.,،؛:]/g, "")
            .replace(/\s+/g, " ")
            .toLowerCase();
    }

    /* =====================================================
       نعم
       ===================================================== */

    function isYes(text) {

        const value = clean(text);

        return [
            "نعم",
            "ايوه",
            "أيوه",
            "أيوة",
            "اه",
            "آه",
            "اجل",
            "أجل",
            "تمام",
            "صح",
            "صحيح",
            "موافق",
            "موافقة"
        ].includes(value);
    }

    /* =====================================================
       لا
       ===================================================== */

    function isNo(text) {

        const value = clean(text);

        return [
            "لا",
            "لأ",
            "لاء",
            "مش عايز",
            "مش عايزة",
            "لا أريد"
        ].includes(value);
    }

    /* =====================================================
       إلغاء
       ===================================================== */

    function isCancel(text) {

        const value = clean(text);

        return [
            "إلغاء",
            "الغاء",
            "الغى",
            "ألغي",
            "الغي",
            "إلغاء العمود",
            "الغاء العمود"
        ].includes(value);
    }

    /* =====================================================
       تغيير حالة النظام
       ===================================================== */

    function setMode(mode) {

        state.mode = mode;
    }

    /* =====================================================
       إنشاء رأس الجدول
       ===================================================== */

    function renderHeader() {

        const head =
            document.getElementById("excelHead");

        if (!head) return;

        head.innerHTML = "";

        const tr =
            document.createElement("tr");

        /* رقم الصف/العمود */

        const numberCell =
            document.createElement("th");

        numberCell.textContent = "#";

        tr.appendChild(numberCell);

        /* الأعمدة */

        state.columns.forEach(function (column) {

            const th =
                document.createElement("th");

            th.textContent = column;

            th.contentEditable = "true";

            if (/[\u0600-\u06FF]/.test(column)) {

                th.dir = "rtl";
                th.style.textAlign = "right";

            } else {

                th.dir = "ltr";
                th.style.textAlign = "left";
            }

            tr.appendChild(th);
        });

        head.appendChild(tr);
    }

    /* =====================================================
       إنشاء الصفوف
       ===================================================== */

    function renderRows() {

        const body =
            document.getElementById("excelBody");

        if (!body) return;

        body.innerHTML = "";

        const numberOfRows =
            Math.max(1, state.rowsCount || 1);

        for (
            let rowIndex = 1;
            rowIndex <= numberOfRows;
            rowIndex++
        ) {

            const tr =
                document.createElement("tr");

            const rowNumber =
                document.createElement("th");

            rowNumber.textContent =
                rowIndex;

            tr.appendChild(rowNumber);

            state.columns.forEach(function () {

                const td =
                    document.createElement("td");

                td.contentEditable = "true";

                td.textContent = "";

                tr.appendChild(td);
            });

            body.appendChild(tr);
        }
    }

    /* =====================================================
       إنشاء الجدول كاملًا
       ===================================================== */

    function renderTable() {

        renderHeader();
        renderRows();
    }

    /* =====================================================
       بداية إنشاء الجدول
       ===================================================== */

    function startCreate() {

        state.mode = "confirm-create";

        state.columns = [];
        state.rowsCount = 0;
        state.pendingColumnName = "";
        state.pendingColumnNumber = 1;
        state.currentRow = 1;
        state.pendingRowData = null;

        const head =
            document.getElementById("excelHead");

        const body =
            document.getElementById("excelBody");

        if (head) head.innerHTML = "";

        if (body) body.innerHTML = "";

        speak(
            "هل تريد إنشاء جدول؟ قولي نعم أو لا."
        );
    }

    /* =====================================================
       تأكيد إنشاء الجدول
       ===================================================== */

    function confirmCreate(text) {

        if (isYes(text)) {

            state.mode =
                "waiting-column-name";

            state.pendingColumnNumber = 1;

            speak(
                "تمام. العمود الأول، ما الاسم الذي تريد كتابته فيه؟"
            );

            return true;
        }

        if (isNo(text) || isCancel(text)) {

            state.mode = "idle";

            speak(
                "تمام، لم يتم إنشاء الجدول."
            );

            return true;
        }

        speak(
            "قولي نعم لإنشاء الجدول أو لا للإلغاء."
        );

        return true;
    }

    /* =====================================================
       استقبال اسم العمود
       ===================================================== */

    function receiveColumnName(text) {

        const name =
            String(text || "").trim();

        if (!name) {

            speak(
                "لم أسمع اسم العمود. قولي اسم العمود مرة أخرى."
            );

            return true;
        }

        state.pendingColumnName = name;

        state.mode =
            "confirm-column";

        speak(
            "هل تريد تسمية العمود " +
            state.pendingColumnNumber +
            " «" +
            name +
            "»؟ قولي نعم أو لا."
        );

        return true;
    }

    /* =====================================================
       تأكيد اسم العمود
       ===================================================== */

    function confirmColumn(text) {

        if (isYes(text)) {

            const name =
                state.pendingColumnName;

            state.columns.push(name);

            /*
             * نكتب العمود فورًا أمام المستخدم
             */
            renderHeader();

            const columnNumber =
                state.columns.length;

            state.pendingColumnName = "";

            state.pendingColumnNumber =
                columnNumber + 1;

            state.mode =
                "ask-add-column";

            speak(
                "تم إضافة العمود " +
                columnNumber +
                " «" +
                name +
                "». هل تريد إضافة عمود آخر؟ قولي نعم أو لا."
            );

            return true;
        }

        if (isNo(text) || isCancel(text)) {

            state.pendingColumnName = "";

            state.mode =
                "waiting-column-name";

            speak(
                "تمام، لم يتم إضافة هذا العمود. قولي اسم العمود مرة أخرى."
            );

            return true;
        }

        speak(
            "قولي نعم لتأكيد اسم العمود أو لا لإلغائه."
        );

        return true;
    }

    /* =====================================================
       سؤال إضافة عمود آخر
       ===================================================== */

    function askAddColumn(text) {

        if (isYes(text)) {

            state.pendingColumnNumber =
                state.columns.length + 1;

            state.mode =
                "waiting-column-name";

            speak(
                "تمام. العمود " +
                state.pendingColumnNumber +
                "، ما الاسم الذي تريد كتابته فيه؟"
            );

            return true;
        }

        if (isNo(text) || isCancel(text)) {

            if (state.columns.length === 0) {

                state.pendingColumnNumber = 1;

                state.mode =
                    "waiting-column-name";

                speak(
                    "لازم يكون هناك عمود واحد على الأقل. قولي اسم العمود الأول."
                );

                return true;
            }

            /*
             * لا نضيف أي عمود.
             * ننتقل مباشرة للصفوف.
             */

            state.mode =
                "starting-rows";

            state.rowsCount = 1;

            renderTable();

            speak(
                "تمام، تم الانتهاء من الأعمدة. جاري الآن كتابة الصفوف."
            );

            setTimeout(function () {

                state.currentRow = 1;

                state.mode =
                    "waiting-row-data";

                speak(
                    "الصف الأول. قولي البيانات التي تريد كتابتها."
                );

            }, 900);

            return true;
        }

        speak(
            "قولي نعم لإضافة عمود آخر أو لا للانتقال إلى الصفوف."
        );

        return true;
    }

    /* =====================================================
       استقبال أوامر Part 5
       ===================================================== */

    function handleSetup(text) {

        const mode =
            state.mode;

        if (mode === "confirm-create") {

            return confirmCreate(text);
        }

        if (mode === "waiting-column-name") {

            return receiveColumnName(text);
        }

        if (mode === "confirm-column") {

            return confirmColumn(text);
        }

        if (mode === "ask-add-column") {

            return askAddColumn(text);
        }

        return false;
    }

    /* =====================================================
       واجهة ExcelTable
       ===================================================== */

    window.ExcelTable.state =
        state;

    window.ExcelTable.startCreate =
        startCreate;

    window.ExcelTable.handleSetup =
        handleSetup;

    window.ExcelTable.render =
        renderTable;

    window.ExcelTable._state = {

        get mode() {
            return state.mode;
        },

        set mode(value) {
            state.mode = value;
        },

        get columns() {
            return state.columns;
        },

        set columns(value) {
            state.columns = value;
        },

        get rowsCount() {
            return state.rowsCount;
        },

        set rowsCount(value) {
            state.rowsCount = value;
        },

        get currentRow() {
            return state.currentRow;
        },

        set currentRow(value) {
            state.currentRow = value;
        },

        get pendingColumnName() {
            return state.pendingColumnName;
        },

        set pendingColumnName(value) {
            state.pendingColumnName = value;
        },

        get pendingColumnNumber() {
            return state.pendingColumnNumber;
        },

        set pendingColumnNumber(value) {
            state.pendingColumnNumber = value;
        },

        get pendingRowData() {
            return state.pendingRowData;
        },

        set pendingRowData(value) {
            state.pendingRowData = value;
        },

        get waitingRowReview() {
            return state.waitingRowReview;
        },

        set waitingRowReview(value) {
            state.waitingRowReview = value;
        },

        get waitingNextRow() {
            return state.waitingNextRow;
        },

        set waitingNextRow(value) {
            state.waitingNextRow = value;
        }
    };

    /* =====================================================
       تسجيله في نظام الصوت الأساسي
       ===================================================== */

    if (
        window.ExcelApp &&
        typeof window.ExcelApp.register === "function"
    ) {

        window.ExcelApp.register(
            "excel-part-5-setup",
            function (text) {

                return handleSetup(text);
            }
        );
    }

    /* =====================================================
       أمر إنشاء جدول
       ===================================================== */

    if (
        window.ExcelApp &&
        typeof window.ExcelApp.register === "function"
    ) {

        window.ExcelApp.register(
            "excel-create-table",
            function (text) {

                const value =
                    clean(text);

                if (
                    value === "إنشاء جدول" ||
                    value === "انشاء جدول" ||
                    value === "اعملي جدول" ||
                    value === "اعمل جدول" ||
                    value === "إنشاء الجدول" ||
                    value === "انشاء الجدول"
                ) {

                    startCreate();

                    return true;
                }

                return false;
            }
        );
    }

})();
</script>


<script>
/* =========================================================
   MOBSAR EXCEL - PART 5B
   كتابة الصفوف عمودًا عمودًا مع تأكيد كل قيمة
   ========================================================= */

(function () {
    "use strict";

    const app = window.ExcelApp || {};
    const table = window.ExcelTable || {};

    function speak(text) {
        if (typeof app.speak === "function") {
            app.speak(text);
            return;
        }

        if ("speechSynthesis" in window) {
            speechSynthesis.cancel();

            const u = new SpeechSynthesisUtterance(text);
            u.lang = "ar-EG";
            u.rate = 0.95;

            speechSynthesis.speak(u);
        }
    }

    function clean(text) {
        return String(text || "")
            .trim()
            .replace(/[؟?!.,،؛:]/g, "")
            .replace(/\s+/g, " ")
            .toLowerCase();
    }

    function yes(text) {
        return [
            "نعم",
            "ايوه",
            "أيوه",
            "أيوة",
            "اه",
            "آه",
            "اجل",
            "أجل",
            "تمام",
            "صح",
            "صحيح",
            "موافق",
            "موافقة"
        ].includes(clean(text));
    }

    function no(text) {
        return [
            "لا",
            "لأ",
            "لاء",
            "مش عايز",
            "مش عايزة"
        ].includes(clean(text));
    }

    function cancel(text) {
        return [
            "إلغاء",
            "الغاء",
            "الغى",
            "ألغي",
            "الغي"
        ].includes(clean(text));
    }

    /* =====================================================
       الوصول إلى حالة Part 5A
       ===================================================== */

    function getState() {
        if (table._state) {
            return table._state;
        }

        if (table.state) {
            return table.state;
        }

        return null;
    }

    function getColumns() {
        const state = getState();

        if (!state) return [];

        if (Array.isArray(state.columns)) {
            return state.columns;
        }

        return [];
    }

    function setMode(mode) {
        const state = getState();

        if (!state) return;

        state.mode = mode;
    }

    function getMode() {
        const state = getState();

        if (!state) return "idle";

        return state.mode || "idle";
    }

    /* =====================================================
       إنشاء الصفوف
       ===================================================== */

    function ensureRow(rowNumber) {

        const body =
            document.getElementById("excelBody");

        if (!body) return null;

        let rows =
            body.querySelectorAll("tr");

        /*
         * لو الصف المطلوب غير موجود، ننشئه.
         */

        while (rows.length < rowNumber) {

            const tr =
                document.createElement("tr");

            const th =
                document.createElement("th");

            th.textContent =
                rows.length + 1;

            tr.appendChild(th);

            getColumns().forEach(function () {

                const td =
                    document.createElement("td");

                td.contentEditable = "true";
                td.textContent = "";

                tr.appendChild(td);
            });

            body.appendChild(tr);

            rows =
                body.querySelectorAll("tr");
        }

        return rows[rowNumber - 1];
    }

    /* =====================================================
       كتابة قيمة في خلية محددة
       ===================================================== */

    function writeCell(
        rowNumber,
        columnIndex,
        value
    ) {

        const tr =
            ensureRow(rowNumber);

        if (!tr) return;

        const cells =
            tr.querySelectorAll("td");

        const cell =
            cells[columnIndex];

        if (!cell) return;

        cell.textContent =
            value;

        if (/[\u0600-\u06FF]/.test(value)) {

            cell.dir = "rtl";
            cell.style.textAlign = "right";

        } else {

            cell.dir = "ltr";
            cell.style.textAlign = "left";
        }
    }

    /* =====================================================
       بدء الصف الأول
       ===================================================== */

    function startRows() {

        const state = getState();

        if (!state) return;

        const columns =
            getColumns();

        if (!columns.length) {

            speak(
                "لا يوجد أعمدة. يجب إنشاء عمود أولًا."
            );

            return;
        }

        state.currentRow = 1;
        state.currentColumn = 0;
        state.pendingCellValue = "";
        state.waitingCellReview = false;

        ensureRow(1);

        setMode("waiting-cell-value");

        askForCurrentCell();
    }

    /* =====================================================
       سؤال القيمة الحالية
       ===================================================== */

    function askForCurrentCell() {

        const state = getState();

        if (!state) return;

        const columns =
            getColumns();

        const row =
            state.currentRow || 1;

        const columnIndex =
            state.currentColumn || 0;

        const column =
            columns[columnIndex];

        if (!column) {
            finishCurrentRow();
            return;
        }

        speak(
            "الصف " +
            row +
            ". ابدئي بالعمود «" +
            column +
            "». هتكتبي فيه إيه؟"
        );
    }

    /* =====================================================
       استقبال قيمة الخلية
       ===================================================== */

    function receiveCellValue(text) {

        const state = getState();

        if (!state) return;

        const value =
            String(text || "").trim();

        if (!value) {

            speak(
                "لم أسمع القيمة. قولي القيمة مرة أخرى."
            );

            return;
        }

        state.pendingCellValue =
            value;

        state.waitingCellReview =
            true;

        setMode("confirm-cell");

        const columns =
            getColumns();

        const column =
            columns[state.currentColumn];

        speak(
            "العمود «" +
            column +
            "»، والقيمة «" +
            value +
            "». هل القيمة صحيحة؟ قولي نعم أو لا."
        );
    }

    /* =====================================================
       تأكيد قيمة الخلية
       ===================================================== */

    function confirmCell(text) {

        const state = getState();

        if (!state) return;

        const columns =
            getColumns();

        const row =
            state.currentRow || 1;

        const columnIndex =
            state.currentColumn || 0;

        const column =
            columns[columnIndex];

        if (yes(text)) {

            /*
             * هنا فقط نكتب القيمة في الجدول.
             */

            writeCell(
                row,
                columnIndex,
                state.pendingCellValue
            );

            state.waitingCellReview =
                false;

            state.pendingCellValue =
                "";

            state.currentColumn =
                columnIndex + 1;

            /*
             * لو لسه فيه أعمدة
             */

            if (
                state.currentColumn <
                columns.length
            ) {

                setMode("waiting-cell-value");

                const nextColumn =
                    columns[state.currentColumn];

                speak(
                    "تمت كتابة «" +
                    column +
                    "». الآن العمود «" +
                    nextColumn +
                    "». هتكتبي فيه إيه؟"
                );

                return;
            }

            /*
             * خلصنا كل أعمدة الصف.
             */

            finishCurrentRow();

            return;
        }

        if (no(text) || cancel(text)) {

            state.pendingCellValue =
                "";

            state.waitingCellReview =
                false;

            setMode("waiting-cell-value");

            speak(
                "تمام، لم يتم كتابة القيمة. قولي القيمة الصحيحة للعمود «" +
                column +
                "»."
            );

            return;
        }

        speak(
            "قولي نعم إذا كانت القيمة صحيحة أو لا لإعادة كتابتها."
        );
    }

    /* =====================================================
       انتهاء الصف
       ===================================================== */

    function finishCurrentRow() {

        const state = getState();

        if (!state) return;

        const row =
            state.currentRow || 1;

        state.currentColumn = 0;
        state.pendingCellValue = "";
        state.waitingCellReview = false;

        setMode("ask-next-row");

        speak(
            "تم الانتهاء من الصف " +
            row +
            ". هل تريد إضافة صف آخر؟ قولي نعم أو لا."
        );
    }

    /* =====================================================
       إضافة صف جديد
       ===================================================== */

    function handleNextRow(text) {

        const state = getState();

        if (!state) return;

        if (yes(text)) {

            state.currentRow =
                (state.currentRow || 1) + 1;

            state.currentColumn = 0;
            state.pendingCellValue = "";

            ensureRow(
                state.currentRow
            );

            setMode("waiting-cell-value");

            askForCurrentCell();

            return;
        }

        if (no(text) || cancel(text)) {

            setMode("finished");

            speak(
                "تمام. تم الانتهاء من كتابة الجدول."
            );

            return;
        }

        speak(
            "قولي نعم لإضافة صف آخر أو لا لإنهاء الجدول."
        );
    }

    /* =====================================================
       تشغيل كتابة الصفوف بعد Part 5A
       ===================================================== */

    function startRowsIfNeeded() {

        const state = getState();

        if (!state) return;

        if (
            state.mode === "starting-rows"
        ) {

            startRows();

            return true;
        }

        return false;
    }

    /* =====================================================
       الموزع
       ===================================================== */

    function handle(text) {

        const mode =
            getMode();

        /*
         * لو Part 5A خلص الأعمدة
         */

        if (mode === "starting-rows") {

            startRows();

            return true;
        }

        /*
         * استقبال قيمة الخلية
         */

        if (mode === "waiting-row-data") {

            /*
             * دعم احتياطي لو Part 5A القديم
             * أرسل هذا الوضع.
             */

            startRows();

            return true;
        }

        if (mode === "waiting-cell-value") {

            receiveCellValue(text);

            return true;
        }

        /*
         * تأكيد قيمة الخلية
         */

        if (mode === "confirm-cell") {

            confirmCell(text);

            return true;
        }

        /*
         * سؤال صف جديد
         */

        if (mode === "ask-next-row") {

            handleNextRow(text);

            return true;
        }

        return false;
    }

    /* =====================================================
       تعديل مهم:
       السماح لـ Part 5A باستدعاء بدء الصفوف
       ===================================================== */

    window.ExcelTable.startRows =
        startRows;

    window.ExcelTable.handleRows =
        handle;

    window.ExcelTable._rowWriter = {
        writeCell: writeCell,
        ensureRow: ensureRow,
        startRows: startRows
    };

    /* =====================================================
       تسجيله في ExcelApp
       ===================================================== */

    if (
        typeof app.register === "function"
    ) {

        app.register(
            "excel-part-5-rows",
            function (text) {

                return handle(text);
            }
        );
    }

    /* =====================================================
       مراقبة انتقال Part 5A إلى الصفوف
       ===================================================== */

    let lastMode = "";

    setInterval(function () {

        const state = getState();

        if (!state) return;

        const currentMode =
            state.mode;

        if (
            currentMode ===
            "starting-rows" &&
            lastMode !==
            "starting-rows"
        ) {

            setTimeout(function () {

                /*
                 * نمنع تكرار التشغيل
                 */

                if (
                    getMode() ===
                    "starting-rows"
                ) {
                    startRows();
                }

            }, 300);
        }

        lastMode =
            currentMode;

    }, 250);

})();
</script>

<script>
/* =========================================================
   MOBSAR EXCEL - PART 6
   قراءة + البحث + تعديل + حذف
   ========================================================= */

(function () {
    "use strict";

    const app = window.ExcelApp || {};

    function speak(text) {
        if (typeof app.speak === "function") {
            app.speak(text);
            return;
        }

        if ("speechSynthesis" in window) {
            speechSynthesis.cancel();

            const u = new SpeechSynthesisUtterance(text);
            u.lang = "ar-EG";
            u.rate = 0.95;

            speechSynthesis.speak(u);
        }
    }

    function clean(text) {
        return String(text || "")
            .trim()
            .replace(/[؟?!.,،؛:]/g, "")
            .replace(/\s+/g, " ")
            .toLowerCase();
    }

    /* =====================================================
       الأعمدة
       ===================================================== */

    function getColumns() {
        const table = window.ExcelTable || {};

        if (
            table._state &&
            Array.isArray(table._state.columns)
        ) {
            return table._state.columns;
        }

        if (
            table.state &&
            Array.isArray(table.state.columns)
        ) {
            return table.state.columns;
        }

        return [];
    }

    /* =====================================================
       الصفوف
       ===================================================== */

    function getRows() {
        const body =
            document.getElementById("excelBody");

        if (!body) return [];

        return Array.from(
            body.querySelectorAll("tr")
        );
    }

    /* =====================================================
       البحث عن عمود
       ===================================================== */

    function findColumn(name) {

        const columns = getColumns();
        const wanted = clean(name);

        return columns.findIndex(function (column) {

            const current =
                clean(column);

            return (
                current === wanted ||
                current.replace(/^ال/, "") ===
                wanted.replace(/^ال/, "")
            );
        });
    }

    /* =====================================================
       قراءة الجدول كله
       ===================================================== */

    function readTable() {

        const columns = getColumns();
        const rows = getRows();

        if (!columns.length) {
            speak("لا يوجد أعمدة في الجدول.");
            return true;
        }

        if (!rows.length) {
            speak("لا يوجد صفوف في الجدول.");
            return true;
        }

        let result =
            "محتويات الجدول. ";

        let found = false;

        rows.forEach(function (row, rowIndex) {

            const cells =
                row.querySelectorAll("td");

            const values = [];

            columns.forEach(function (column, index) {

                const cell =
                    cells[index];

                if (!cell) return;

                const value =
                    cell.textContent.trim();

                if (value) {
                    values.push(
                        column +
                        ": " +
                        value
                    );
                }
            });

            if (values.length) {

                found = true;

                result +=
                    "الصف " +
                    (rowIndex + 1) +
                    ": " +
                    values.join("، ") +
                    ". ";
            }
        });

        if (!found) {
            speak("الجدول فارغ.");
            return true;
        }

        speak(result);

        return true;
    }

    /* =====================================================
       قراءة عمود
       ===================================================== */

    function readColumn(columnName) {

        const index =
            findColumn(columnName);

        if (index === -1) {

            speak(
                "مش لاقي عمود اسمه " +
                columnName
            );

            return true;
        }

        const columns =
            getColumns();

        const rows =
            getRows();

        let result =
            "عمود " +
            columns[index] +
            ". ";

        let found = false;

        rows.forEach(function (row, rowIndex) {

            const cells =
                row.querySelectorAll("td");

            const cell =
                cells[index];

            if (!cell) return;

            const value =
                cell.textContent.trim();

            if (value) {

                found = true;

                result +=
                    "الصف " +
                    (rowIndex + 1) +
                    ": " +
                    value +
                    ". ";
            }
        });

        if (!found) {

            speak(
                "عمود " +
                columns[index] +
                " فارغ."
            );

            return true;
        }

        speak(result);

        return true;
    }

    /* =====================================================
       البحث عن شخص / قيمة
       ===================================================== */

    function findPerson(name) {

        const wanted =
            clean(name);

        const rows =
            getRows();

        for (
            let rowIndex = 0;
            rowIndex < rows.length;
            rowIndex++
        ) {

            const cells =
                rows[rowIndex]
                    .querySelectorAll("td");

            for (
                let columnIndex = 0;
                columnIndex < cells.length;
                columnIndex++
            ) {

                const value =
                    clean(
                        cells[columnIndex]
                            .textContent
                    );

                if (
                    value === wanted ||
                    value.includes(wanted)
                ) {

                    return {
                        rowIndex,
                        cells
                    };
                }
            }
        }

        return null;
    }

    /* =====================================================
       قراءة بيانات شخص
       ===================================================== */

    function readPerson(name) {

        const result =
            findPerson(name);

        if (!result) {

            speak(
                "مش لاقي " +
                name +
                " في الجدول."
            );

            return true;
        }

        const columns =
            getColumns();

        const values = [];

        columns.forEach(function (column, index) {

            const cell =
                result.cells[index];

            if (!cell) return;

            const value =
                cell.textContent.trim();

            if (value) {

                values.push(
                    column +
                    ": " +
                    value
                );
            }
        });

        if (!values.length) {

            speak(
                "صف " +
                name +
                " فارغ."
            );

            return true;
        }

        speak(
            "بيانات " +
            name +
            ": " +
            values.join("، ") +
            "."
        );

        return true;
    }

    /* =====================================================
       قراءة قيمة شخص في عمود
       ===================================================== */

    function readPersonColumn(
        person,
        columnName
    ) {

        const result =
            findPerson(person);

        if (!result) {

            speak(
                "مش لاقي " +
                person +
                " في الجدول."
            );

            return true;
        }

        const index =
            findColumn(columnName);

        if (index === -1) {

            speak(
                "مش لاقي عمود اسمه " +
                columnName
            );

            return true;
        }

        const cell =
            result.cells[index];

        const value =
            cell
                ? cell.textContent.trim()
                : "";

        if (!value) {

            speak(
                "مفيش قيمة مسجلة لـ " +
                person +
                " في عمود " +
                columnName
            );

            return true;
        }

        speak(
            person +
            "، " +
            columnName +
            ": " +
            value
        );

        return true;
    }

    /* =====================================================
       تعديل قيمة
       مثال:
       عدل مرتب أحمد إلى 5000
       ===================================================== */

    function editCell(
        person,
        columnName,
        newValue
    ) {

        const result =
            findPerson(person);

        if (!result) {

            speak(
                "مش لاقي " +
                person +
                " في الجدول."
            );

            return true;
        }

        const columnIndex =
            findColumn(columnName);

        if (columnIndex === -1) {

            speak(
                "مش لاقي عمود " +
                columnName
            );

            return true;
        }

        const cell =
            result.cells[columnIndex];

        if (!cell) return true;

        cell.textContent =
            newValue;

        if (
            /[\u0600-\u06FF]/.test(newValue)
        ) {

            cell.dir = "rtl";
            cell.style.textAlign = "right";

        } else {

            cell.dir = "ltr";
            cell.style.textAlign = "left";
        }

        speak(
            "تم تعديل " +
            columnName +
            " لـ " +
            person +
            " إلى " +
            newValue
        );

        return true;
    }

    /* =====================================================
       حذف صف
       ===================================================== */

    function deletePerson(name) {

        const result =
            findPerson(name);

        if (!result) {

            speak(
                "مش لاقي " +
                name +
                " في الجدول."
            );

            return true;
        }

        const rows =
            getRows();

        const row =
            rows[result.rowIndex];

        if (row) {
            row.remove();
        }

        renumberRows();

        speak(
            "تم حذف صف " +
            name
        );

        return true;
    }

    /* =====================================================
       إعادة ترقيم الصفوف
       ===================================================== */

    function renumberRows() {

        const rows =
            getRows();

        rows.forEach(function (row, index) {

            const th =
                row.querySelector("th");

            if (th) {
                th.textContent =
                    index + 1;
            }
        });
    }

    /* =====================================================
       حذف عمود
       ===================================================== */

    function deleteColumn(columnName) {

        const index =
            findColumn(columnName);

        if (index === -1) {

            speak(
                "مش لاقي عمود اسمه " +
                columnName
            );

            return true;
        }

        const columns =
            getColumns();

        const deletedName =
            columns[index];

        /* رأس العمود */

        const head =
            document.getElementById("excelHead");

        if (head) {

            const headerRow =
                head.querySelector("tr");

            if (
                headerRow &&
                headerRow.children[index + 1]
            ) {

                headerRow
                    .children[index + 1]
                    .remove();
            }
        }

        /* خلايا العمود */

        getRows().forEach(function (row) {

            const cells =
                row.querySelectorAll("td");

            if (cells[index]) {
                cells[index].remove();
            }
        });

        columns.splice(index, 1);

        speak(
            "تم حذف العمود " +
            deletedName
        );

        return true;
    }

    /* =====================================================
       قراءة أوامر صوتية
       ===================================================== */

    function handleRead(text) {

        const original =
            String(text || "").trim();

        const value =
            clean(original);

        /* قراءة الجدول */

        if (
            value === "اقرالي الجدول" ||
            value === "اقرأ لي الجدول" ||
            value === "اقرأ الجدول" ||
            value === "اقرالي الجدول كله" ||
            value === "اقرأ الجدول كله"
        ) {

            return readTable();
        }

        /* قراءة عمود */

        let match =
            original.match(
                /^(?:اقرالي|اقرأ لي|اقرأ)\s+(?:عمود|العمود)\s+(.+)$/i
            );

        if (match) {

            return readColumn(
                match[1].trim()
            );
        }

        /* قراءة بيانات شخص */

        match =
            original.match(
                /^(?:اقرالي|اقرأ لي|اقرأ)\s+(?:بيانات|اسم)\s+(.+)$/i
            );

        if (match) {

            return readPerson(
                match[1].trim()
            );
        }

        /* قيمة شخص في عمود */

        match =
            original.match(
                /^(.+?)\s+(مرتبه|راتبه|درجته|مصاريفه|علاوته|نتيجته)\s+(?:كام|كم)$/i
            );

        if (match) {

            const person =
                match[1].trim();

            const word =
                clean(match[2]);

            let column = "";

            if (
                word === "مرتبه" ||
                word === "راتبه"
            ) {
                column = "المرتب";
            }

            else if (word === "درجته") {
                column = "الدرجة";
            }

            else if (word === "مصاريفه") {
                column = "المصاريف";
            }

            else if (word === "علاوته") {
                column = "العلاوة";
            }

            else if (word === "نتيجته") {
                column = "النتيجة";
            }

            if (column) {

                return readPersonColumn(
                    person,
                    column
                );
            }
        }

        return false;
    }

    /* =====================================================
       أوامر التعديل والحذف
       ===================================================== */

    function handleEdit(text) {

        const original =
            String(text || "").trim();

        let match =
            original.match(
                /^عدل\s+(.+?)\s+(?:لـ|ل|في)\s+(.+?)\s+(?:إلى|الى)\s+(.+)$/i
            );

        if (match) {

            return editCell(
                match[2].trim(),
                match[1].trim(),
                match[3].trim()
            );
        }

        match =
            original.match(
                /^غير\s+(.+?)\s+(?:لـ|ل|في)\s+(.+?)\s+(?:إلى|الى)\s+(.+)$/i
            );

        if (match) {

            return editCell(
                match[2].trim(),
                match[1].trim(),
                match[3].trim()
            );
        }

        /* حذف صف */

        match =
            original.match(
                /^(?:احذف|امسح)\s+(?:صف\s+)?(.+)$/i
            );

        if (match) {

            const target =
                match[1].trim();

            /*
             * لو قال "احذف العمود..."
             * نتركه لأمر حذف العمود.
             */

            if (
                /^ال?عمود/i.test(target)
            ) {
                return false;
            }

            return deletePerson(target);
        }

        /* حذف عمود */

        match =
            original.match(
                /^(?:احذف|امسح)\s+(?:ال?عمود)\s+(.+)$/i
            );

        if (match) {

            return deleteColumn(
                match[1].trim()
            );
        }

        return false;
    }

    /* =====================================================
       التسجيل
       ===================================================== */

    if (
        typeof app.register === "function"
    ) {

        app.register(
            "excel-part-6",
            function (text) {

                if (handleRead(text)) {
                    return true;
                }

                if (handleEdit(text)) {
                    return true;
                }

                return false;
            }
        );
    }

    /* =====================================================
       إتاحة الدوال للأجزاء التالية
       ===================================================== */

    window.ExcelPart6 = {
        readTable,
        readColumn,
        readPerson,
        readPersonColumn,
        editCell,
        deletePerson,
        deleteColumn,
        findPerson,
        findColumn
    };

})();
</script>



<script>
/* =========================================================
   MOBSAR EXCEL — PART 7
   الحسابات + الدوال + الجمع والطرح والضريبة
   ========================================================= */

(function () {
    "use strict";

    const App = window.ExcelApp;
    const Table = window.ExcelTable;

    if (!App || !Table) {
        console.error("MOBSAR Excel Part 7: Parts 1-6 must be loaded first.");
        return;
    }

    function speak(text) {
        if (typeof App.speak === "function") {
            App.speak(text);
        } else if ("speechSynthesis" in window) {
            speechSynthesis.cancel();
            const u = new SpeechSynthesisUtterance(text);
            u.lang = "ar-EG";
            speechSynthesis.speak(u);
        }
    }

    function clean(text) {
        return String(text || "")
            .trim()
            .replace(/[؟?!،,.]/g, "")
            .replace(/\s+/g, " ")
            .toLowerCase();
    }

    function getState() {
        return Table._state || Table.state || {};
    }

    function getColumns() {
        const state = getState();
        return Array.isArray(state.columns) ? state.columns : [];
    }

    function getRows() {
        return Array.from(
            document.querySelectorAll("#excelBody tr")
        );
    }

    function findColumnIndex(name) {
        const wanted = clean(name);

        return getColumns().findIndex(col =>
            clean(col) === wanted
        );
    }

    function getCellValue(row, index) {
        const cells = row.querySelectorAll("td[data-col]");
        const cell = Array.from(cells).find(
            td => Number(td.dataset.col) === index
        );

        return cell ? cell.textContent.trim() : "";
    }

    function numberValue(value) {
        if (value === null || value === undefined) return 0;

        let text = String(value)
            .replace(/,/g, "")
            .replace(/[^\d.-]/g, "");

        const n = Number(text);

        return Number.isFinite(n) ? n : 0;
    }

    function columnValues(columnName) {
        const index = findColumnIndex(columnName);

        if (index < 0) {
            return null;
        }

        const values = [];

        getRows().forEach(row => {
            const value = getCellValue(row, index);

            if (value !== "") {
                values.push(numberValue(value));
            }
        });

        return values;
    }

    function sumColumn(columnName) {
        const values = columnValues(columnName);

        if (!values) {
            speak("مش لاقية العمود «" + columnName + "» في الجدول.");
            return;
        }

        const total = values.reduce((a, b) => a + b, 0);

        speak(
            "مجموع عمود «" +
            columnName +
            "» هو " +
            total
        );
    }

    function averageColumn(columnName) {
        const values = columnValues(columnName);

        if (!values || values.length === 0) {
            speak("مش لاقية أرقام في العمود «" + columnName + "».");
            return;
        }

        const total = values.reduce((a, b) => a + b, 0);
        const average = total / values.length;

        speak(
            "متوسط عمود «" +
            columnName +
            "» هو " +
            Number(average.toFixed(2))
        );
    }

    function maxColumn(columnName) {
        const values = columnValues(columnName);

        if (!values || values.length === 0) {
            speak("مش لاقية أرقام في العمود «" + columnName + "».");
            return;
        }

        speak(
            "أكبر قيمة في عمود «" +
            columnName +
            "» هي " +
            Math.max(...values)
        );
    }

    function minColumn(columnName) {
        const values = columnValues(columnName);

        if (!values || values.length === 0) {
            speak("مش لاقية أرقام في العمود «" + columnName + "».");
            return;
        }

        speak(
            "أصغر قيمة في عمود «" +
            columnName +
            "» هي " +
            Math.min(...values)
        );
    }

    function countColumn(columnName) {
        const values = columnValues(columnName);

        if (!values) {
            speak("مش لاقية العمود «" + columnName + "».");
            return;
        }

        speak(
            "عدد القيم في عمود «" +
            columnName +
            "» هو " +
            values.length
        );
    }

    function calculateExpression(expression) {

        let exp = expression
            .replace(/زائد/g, "+")
            .replace(/جمع/g, "+")
            .replace(/ناقص/g, "-")
            .replace(/طرح/g, "-")
            .replace(/ضرب/g, "*")
            .replace(/في/g, "*")
            .replace(/قسمة/g, "/")
            .replace(/على/g, "/")
            .replace(/÷/g, "/")
            .replace(/×/g, "*");

        exp = exp.replace(/[^0-9+\-*/().\s]/g, "");

        if (!exp) {
            speak("مش قادرة أتعرف على العملية الحسابية.");
            return;
        }

        try {

            const result = Function(
                '"use strict"; return (' + exp + ')'
            )();

            if (!Number.isFinite(result)) {
                speak("نتيجة العملية غير صالحة.");
                return;
            }

            speak("النتيجة هي " + result);

        } catch (error) {
            speak("حصل خطأ في العملية الحسابية.");
        }
    }

    function calculateTax(text) {

        const match = text.match(
            /ضريبة\s+(\d+(?:\.\d+)?)\s*(?:%|في المية|بالمية)?/
        );

        if (!match) {
            speak("قولي مثلًا: احسبلي ضريبة 15 في المية.");
            return;
        }

        const percent = Number(match[1]);

        speak(
            "نسبة الضريبة هي " +
            percent +
            " في المية. قولي المبلغ."
        );

        window.ExcelTableTaxWaiting = {
            percent: percent
        };
    }

    function finishTax(amountText) {

        const data = window.ExcelTableTaxWaiting;

        if (!data) return false;

        const amount = numberValue(amountText);

        if (!amount) {
            speak("قولي المبلغ بالأرقام.");
            return true;
        }

        const tax = amount * data.percent / 100;
        const total = amount + tax;

        speak(
            "قيمة الضريبة " +
            tax +
            ". والإجمالي بعد الضريبة " +
            total
        );

        delete window.ExcelTableTaxWaiting;

        return true;
    }

    function listFunctions() {

        speak(
            "الدوال الموجودة عندي حاليًا هي: " +
            "الجمع، الطرح، الضرب، القسمة، " +
            "مجموع عمود، متوسط عمود، أكبر قيمة، " +
            "أصغر قيمة، عدد القيم، وحساب الضريبة. " +
            "وكمان أقدر أحسب عمليات بالأرقام."
        );
    }

    function handle(text) {

        const original = String(text || "");
        const t = clean(original);

        /* -----------------------------------------
           هل يوجد انتظار لمبلغ الضريبة؟
           ----------------------------------------- */

        if (window.ExcelTableTaxWaiting) {
            return finishTax(original);
        }

        /* -----------------------------------------
           سؤال: إيه الدوال؟
           ----------------------------------------- */

        if (
            t.includes("ايه الدوال") ||
            t.includes("ما هي الدوال") ||
            t.includes("ايه الوظائف") ||
            t.includes("الدوال الموجودة") ||
            t.includes("الدوال عندك") ||
            t.includes("عندك دوال ايه") ||
            t.includes("ما الدوال")
        ) {
            listFunctions();
            return true;
        }

        /* -----------------------------------------
           عمليات مباشرة
           ----------------------------------------- */

        if (
            t.startsWith("احسبلي") ||
            t.startsWith("احسب لي") ||
            t.startsWith("احسب")
        ) {

            if (
                t.includes("ضريبة")
            ) {
                calculateTax(t);
                return true;
            }

            if (
                t.includes("مجموع") ||
                t.includes("جمع")
            ) {
                const match = original.match(
                    /(?:مجموع|جمع)(?:لي| لي)?\s+(?:عمود\s+)?(.+)/i
                );

                if (match) {
                    sumColumn(match[1].trim());
                    return true;
                }
            }

            const expression = original
                .replace(/احسبلي/gi, "")
                .replace(/احسب لي/gi, "")
                .replace(/احسب/gi, "")
                .trim();

            calculateExpression(expression);
            return true;
        }

        /* -----------------------------------------
           مجموع عمود
           ----------------------------------------- */

        let match = original.match(
            /(?:اقرأ|احسب|اعمل|اعملي)?\s*(?:مجموع|جمع)\s+(?:عمود\s+)?(.+)/i
        );

        if (match) {
            sumColumn(match[1].trim());
            return true;
        }

        /* -----------------------------------------
           متوسط
           ----------------------------------------- */

        match = original.match(
            /(?:متوسط|معدل)\s+(?:عمود\s+)?(.+)/i
        );

        if (match) {
            averageColumn(match[1].trim());
            return true;
        }

        /* -----------------------------------------
           أكبر قيمة
           ----------------------------------------- */

        match = original.match(
            /(?:اكبر|أكبر)\s+(?:قيمة\s+)?(?:في\s+)?(?:عمود\s+)?(.+)/i
        );

        if (match) {
            maxColumn(match[1].trim());
            return true;
        }

        /* -----------------------------------------
           أصغر قيمة
           ----------------------------------------- */

        match = original.match(
            /(?:اصغر|أصغر)\s+(?:قيمة\s+)?(?:في\s+)?(?:عمود\s+)?(.+)/i
        );

        if (match) {
            minColumn(match[1].trim());
            return true;
        }

        /* -----------------------------------------
           عدد القيم
           ----------------------------------------- */

        match = original.match(
            /(?:عدد|احسب عدد)\s+(?:القيم\s+في\s+)?(?:عمود\s+)?(.+)/i
        );

        if (match) {
            countColumn(match[1].trim());
            return true;
        }

        /* -----------------------------------------
           جمع رقمين / طرح / ضرب / قسمة
           ----------------------------------------- */

        if (
            /\d/.test(t) &&
            (
                t.includes("زائد") ||
                t.includes("جمع") ||
                t.includes("ناقص") ||
                t.includes("طرح") ||
                t.includes("ضرب") ||
                t.includes("في") ||
                t.includes("قسمة") ||
                t.includes("على")
            )
        ) {
            calculateExpression(original);
            return true;
        }

        return false;
    }

    window.ExcelPart7 = {
        handle: handle,
        sumColumn: sumColumn,
        averageColumn: averageColumn,
        maxColumn: maxColumn,
        minColumn: minColumn,
        countColumn: countColumn,
        calculateExpression: calculateExpression
    };

    if (typeof App.register === "function") {
        App.register(
            "excel-part-7",
            handle
        );
    }

})();
</script>

<script>
/* =========================================================
   MOBSAR EXCEL — PART 8
   التنسيق + الألوان + حجم الخط + Bold + Italic
   تحديد الجدول + الحفظ
   ========================================================= */

(function () {
    "use strict";

    const App = window.ExcelApp;
    const Table = window.ExcelTable;

    if (!App || !Table) {
        console.error("MOBSAR Excel Part 8: Parts 1-7 must be loaded first.");
        return;
    }

    let pendingAction = null;

    function speak(text) {
        if (typeof App.speak === "function") {
            App.speak(text);
        } else if ("speechSynthesis" in window) {
            speechSynthesis.cancel();

            const u = new SpeechSynthesisUtterance(text);
            u.lang = "ar-EG";

            speechSynthesis.speak(u);
        }
    }

    function clean(text) {
        return String(text || "")
            .trim()
            .replace(/[؟?!،,.]/g, "")
            .replace(/\s+/g, " ")
            .toLowerCase();
    }

    function tableElement() {
        return document.getElementById("excelTable");
    }

    function allCells() {
        const table = tableElement();

        if (!table) return [];

        return Array.from(
            table.querySelectorAll("th, td")
        );
    }

    function applyToCells(callback) {
        allCells().forEach(callback);
    }

    function isYes(text) {
        const t = clean(text);

        return [
            "نعم",
            "ايوه",
            "أيوه",
            "اه",
            "آه",
            "موافق",
            "تمام",
            "صح"
        ].includes(t);
    }

    function isNo(text) {
        const t = clean(text);

        return [
            "لا",
            "لأ",
            "مش",
            "الغاء",
            "إلغاء"
        ].includes(t);
    }

    /* =========================================
       تأكيد الأوامر
       ========================================= */

    function askConfirmation(action, question) {

        pendingAction = action;

        speak(question);
    }

    function handleConfirmation(text) {

        if (!pendingAction) return false;

        if (isYes(text)) {

            const action = pendingAction;

            pendingAction = null;

            action();

            return true;
        }

        if (isNo(text)) {

            pendingAction = null;

            speak("تمام، ألغيت الأمر.");

            return true;
        }

        speak("قولي نعم أو لا.");

        return true;
    }

    /* =========================================
       Bold
       ========================================= */

    function boldAll() {

        applyToCells(cell => {
            cell.style.fontWeight = "bold";
        });

        speak("تم جعل الجدول كله بولد.");
    }

    function boldHeaders() {

        const table = tableElement();

        if (!table) return;

        table.querySelectorAll("th").forEach(cell => {
            cell.style.fontWeight = "bold";
        });

        speak("تم جعل عناوين الجدول بولد.");
    }

    function normalFont() {

        applyToCells(cell => {
            cell.style.fontWeight = "normal";
        });

        speak("تم إلغاء البولِد.");
    }

    /* =========================================
       Italic
       ========================================= */

    function italicAll() {

        applyToCells(cell => {
            cell.style.fontStyle = "italic";
        });

        speak("تم جعل الخط مائلًا.");
    }

    function underlineAll() {

        applyToCells(cell => {
            cell.style.textDecoration = "underline";
        });

        speak("تم وضع خط تحت النص.");
    }

    /* =========================================
       حجم الخط
       ========================================= */

    function setFontSize(size) {

        size = Number(size);

        if (!Number.isFinite(size)) {
            speak("قولي حجم الخط بالأرقام.");
            return;
        }

        if (size < 8 || size > 72) {
            speak("اختاري حجم خط بين 8 و72.");
            return;
        }

        applyToCells(cell => {
            cell.style.fontSize = size + "px";
        });

        speak(
            "تم تغيير حجم الخط إلى " +
            size
        );
    }

    /* =========================================
       ألوان
       ========================================= */

    const colors = {

        "احمر": "#ff0000",
        "أحمر": "#ff0000",

        "اخضر": "#00a000",
        "أخضر": "#00a000",

        "ازرق": "#0066ff",
        "أزرق": "#0066ff",

        "اصفر": "#ffd700",
        "أصفر": "#ffd700",

        "برتقالي": "#ff8800",

        "بنفسجي": "#8000ff",

        "وردي": "#ff69b4",

        "اسود": "#000000",
        "أسود": "#000000",

        "ابيض": "#ffffff",
        "أبيض": "#ffffff",

        "رمادي": "#808080",

        "بني": "#8b4513"
    };

    function colorAll(colorName) {

        const key = clean(colorName);
        const color = colors[key];

        if (!color) {

            speak(
                "الألوان المتاحة عندي: " +
                "أحمر، أخضر، أزرق، أصفر، برتقالي، " +
                "بنفسجي، وردي، أسود، أبيض ورمادي."
            );

            return;
        }

        applyToCells(cell => {
            cell.style.color = color;
        });

        speak(
            "تم تلوين النص باللون " +
            colorName
        );
    }

    function askColor() {

        pendingAction = function (text) {

            colorAll(text);

        };

        pendingAction.type = "color";

        speak(
            "عايزة لون إيه؟ " +
            "قولي أحمر أو أخضر أو أزرق أو أصفر أو برتقالي أو بنفسجي أو وردي أو أسود أو أبيض أو رمادي."
        );
    }

    /* =========================================
       لون خلفية الجدول
       ========================================= */

    function backgroundColor(colorName) {

        const key = clean(colorName);
        const color = colors[key];

        if (!color) {
            speak("قولي اسم لون صحيح.");
            return;
        }

        applyToCells(cell => {
            cell.style.backgroundColor = color;
        });

        speak(
            "تم تغيير لون خلفية الجدول إلى " +
            colorName
        );
    }

    function askBackgroundColor() {

        pendingAction = function (text) {
            backgroundColor(text);
        };

        pendingAction.type = "background-color";

        speak("عايزة لون خلفية الجدول إيه؟");
    }

    /* =========================================
       تحديد الجدول
       ========================================= */

    function selectTable() {

        const table = tableElement();

        if (!table) {
            speak("الجدول مش موجود.");
            return;
        }

        const range = document.createRange();

        range.selectNodeContents(table);

        const selection = window.getSelection();

        selection.removeAllRanges();

        selection.addRange(range);

        speak("تم تحديد الجدول.");
    }

    function clearSelection() {

        const selection = window.getSelection();

        if (selection) {
            selection.removeAllRanges();
        }

        speak("تم إلغاء تحديد الجدول.");
    }

    /* =========================================
       محاذاة
       ========================================= */

    function alignCenter() {

        applyToCells(cell => {
            cell.style.textAlign = "center";
        });

        speak("تم توسيط الجدول.");
    }

    function alignRight() {

        applyToCells(cell => {
            cell.style.textAlign = "right";
        });

        speak("تمت محاذاة الجدول لليمين.");
    }

    function alignLeft() {

        applyToCells(cell => {
            cell.style.textAlign = "left";
        });

        speak("تمت محاذاة الجدول لليسار.");
    }

    /* =========================================
       حدود الجدول
       ========================================= */

    function addBorders() {

        applyToCells(cell => {
            cell.style.border = "1px solid #888";
        });

        speak("تم إضافة حدود للجدول.");
    }

    function removeBorders() {

        applyToCells(cell => {
            cell.style.border = "";
        });

        speak("تم إزالة حدود الجدول.");
    }

    /* =========================================
       إعادة التنسيق
       ========================================= */

    function resetFormatting() {

        applyToCells(cell => {

            cell.style.fontWeight = "";
            cell.style.fontStyle = "";
            cell.style.textDecoration = "";
            cell.style.fontSize = "";
            cell.style.color = "";
            cell.style.backgroundColor = "";
            cell.style.textAlign = "";

        });

        speak("تمت إعادة تنسيق الجدول للوضع الافتراضي.");
    }

    /* =========================================
       حفظ
       ========================================= */

    function saveExcel() {

        const table = tableElement();

        if (!table) {
            speak("مش لاقية الجدول.");
            return;
        }

        const html =
            "<html><head><meta charset='UTF-8'></head>" +
            "<body>" +
            table.outerHTML +
            "</body></html>";

        const blob = new Blob(
            [html],
            {
                type: "application/vnd.ms-excel"
            }
        );

        const url = URL.createObjectURL(blob);

        const a = document.createElement("a");

        a.href = url;
        a.download = "MOBSAR-Excel.xls";

        document.body.appendChild(a);

        a.click();

        a.remove();

        setTimeout(() => {
            URL.revokeObjectURL(url);
        }, 1000);

        speak("تم حفظ جدول Excel.");
    }

    /* =========================================
       الأوامر الصوتية
       ========================================= */

    function handle(text) {

        const original = String(text || "");
        const t = clean(original);

        /* -------------------------------------
           لو فيه سؤال منتظر
           ------------------------------------- */

        if (pendingAction) {

            /*
             * سؤال نعم/لا
             */
            if (
                pendingAction === "CONFIRM_TABLE_COLOR" ||
                pendingAction === "CONFIRM_SELECTION"
            ) {
                return handleConfirmation(text);
            }

            /*
             * انتظار اسم اللون
             */
            if (
                pendingAction.type === "color" ||
                pendingAction.type === "background-color"
            ) {

                const action = pendingAction;

                pendingAction = null;

                action(original);

                return true;
            }
        }

        /* -------------------------------------
           بولد
           ------------------------------------- */

        if (
            t === "بولد" ||
            t.includes("خلي الخط بولد") ||
            t.includes("اعمله بولد") ||
            t.includes("خليه بولد") ||
            t.includes("الخط بولد")
        ) {
            boldAll();
            return true;
        }

        /* -------------------------------------
           العناوين بولد
           ------------------------------------- */

        if (
            t.includes("العناوين بولد") ||
            t.includes("خلي العناوين بولد") ||
            t.includes("اعمل العناوين بولد")
        ) {
            boldHeaders();
            return true;
        }

        /* -------------------------------------
           إلغاء بولد
           ------------------------------------- */

        if (
            t.includes("الغى البول") ||
            t.includes("الغي البول") ||
            t.includes("شيل البول")
        ) {
            normalFont();
            return true;
        }

        /* -------------------------------------
           Italic
           ------------------------------------- */

        if (
            t.includes("ايتاليك") ||
            t.includes("مائل") ||
            t.includes("خط مائل")
        ) {
            italicAll();
            return true;
        }

        /* -------------------------------------
           Underline
           ------------------------------------- */

        if (
            t.includes("تحته خط") ||
            t.includes("خط تحت")
        ) {
            underlineAll();
            return true;
        }

        /* -------------------------------------
           حجم الخط
           ------------------------------------- */

        let match = original.match(
            /(?:حجم الخط|فونت سايز|font size|كبر الخط|خلي حجم الخط)\s*(\d+)/i
        );

        if (match) {

            setFontSize(match[1]);

            return true;
        }

        /* -------------------------------------
           "كبر الخط"
           ------------------------------------- */

        if (
            t === "كبر الخط" ||
            t.includes("كبر الفونت")
        ) {

            setFontSize(20);

            return true;
        }

        /* -------------------------------------
           لون النص
           ------------------------------------- */

        if (
            t.includes("لون الخط") ||
            t.includes("لون النص") ||
            t.includes("لوني الخط") ||
            t.includes("لون الجدول")
        ) {

            askColor();

            return true;
        }

        /* -------------------------------------
           لون خلفية
           ------------------------------------- */

        if (
            t.includes("لون الخلفية") ||
            t.includes("خلفية الجدول") ||
            t.includes("لون خلفيه")
        ) {

            askBackgroundColor();

            return true;
        }

        /* -------------------------------------
           تحديد الجدول
           ------------------------------------- */

        if (
            t.includes("تحديد الجدول") ||
            t.includes("حدد الجدول") ||
            t.includes("حددي الجدول")
        ) {

            pendingAction = "CONFIRM_SELECTION";

            speak(
                "هل تريدين تحديد الجدول؟ قولي نعم أو لا."
            );

            return true;
        }

        /* -------------------------------------
           تحديد مباشر
           ------------------------------------- */

        if (
            t === "نعم" &&
            pendingAction === "CONFIRM_SELECTION"
        ) {

            pendingAction = null;

            selectTable();

            return true;
        }

        /* -------------------------------------
           إلغاء التحديد
           ------------------------------------- */

        if (
            t.includes("الغى التحديد") ||
            t.includes("الغي التحديد") ||
            t.includes("شيل التحديد")
        ) {

            clearSelection();

            return true;
        }

        /* -------------------------------------
           توسيط
           ------------------------------------- */

        if (
            t.includes("وسطي الجدول") ||
            t.includes("وسط الجدول") ||
            t.includes("خليه في النص") ||
            t.includes("خليه بالنص")
        ) {

            alignCenter();

            return true;
        }

        /* -------------------------------------
           يمين
           ------------------------------------- */

        if (
            t.includes("خليه يمين") ||
            t.includes("على اليمين")
        ) {

            alignRight();

            return true;
        }

        /* -------------------------------------
           يسار
           ------------------------------------- */

        if (
            t.includes("خليه شمال") ||
            t.includes("على الشمال") ||
            t.includes("على اليسار")
        ) {

            alignLeft();

            return true;
        }

        /* -------------------------------------
           الحدود
           ------------------------------------- */

        if (
            t.includes("اعمل حدود") ||
            t.includes("ضيف حدود") ||
            t.includes("حدود للجدول")
        ) {

            addBorders();

            return true;
        }

        if (
            t.includes("شيل الحدود") ||
            t.includes("احذف الحدود")
        ) {

            removeBorders();

            return true;
        }

        /* -------------------------------------
           إعادة التنسيق
           ------------------------------------- */

        if (
            t.includes("ارجع التنسيق") ||
            t.includes("إعادة التنسيق") ||
            t.includes("اعادة التنسيق") ||
            t.includes("رجع التنسيق")
        ) {

            resetFormatting();

            return true;
        }

        /* -------------------------------------
           حفظ
           ------------------------------------- */

        if (
            t.includes("احفظ الجدول") ||
            t.includes("احفظ الاكسل") ||
            t.includes("احفظ الملف") ||
            t === "احفظ"
        ) {

            saveExcel();

            return true;
        }

        return false;
    }

    window.ExcelPart8 = {
        handle: handle,
        boldAll: boldAll,
        boldHeaders: boldHeaders,
        setFontSize: setFontSize,
        colorAll: colorAll,
        backgroundColor: backgroundColor,
        selectTable: selectTable,
        saveExcel: saveExcel
    };

    if (typeof App.register === "function") {
        App.register(
            "excel-part-8",
            handle
        );
    }

})();
</script>

</body>

</html>