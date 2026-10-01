(function () {
    "use strict";

    let recognition = null;
    let voiceReady = false;
    let voiceEnabled = false;
    let listening = false;
    let speaking = false;
    let restarting = false;

    const RESTART_DELAY = 700;


    /* =========================
       الصفحات
       ========================= */

    const pages = {

        "الرئيسية": "index.php",
        "الصفحة الرئيسية": "index.php",
        "صفحة الرئيسية": "index.php",

        "الأقسام": "home.php",
        "الاقسام": "home.php",
        "صفحة الأقسام": "home.php",
        "صفحة الاقسام": "home.php",

        "التسجيل": "register.php",
        "تسجيل": "register.php",
        "صفحة التسجيل": "register.php",

        "المهام": "tasks.php",
        "مهام": "tasks.php",

        "تقييم الإنجازات": "evaluation.php",
        "تقييم الانجازات": "evaluation.php",
        "الإنجازات": "evaluation.php",
        "الانجازات": "evaluation.php",

        "التقويم والمواعيد والأخبار": "schedule.php",
        "التقويم والمواعيد": "schedule.php",
        "المواعيد": "schedule.php",
        "التقويم": "schedule.php",
        "الأخبار": "schedule.php",
        "الاخبار": "schedule.php",

        "التواصل": "communication.php",
        "صفحة التواصل": "communication.php",

        "إدارة الملفات": "notifications.php",
        "ادارة الملفات": "notifications.php",
        "الملفات": "notifications.php",

        "المساعد البصري": "visual-assistant.php",
        "المساعد": "visual-assistant.php",

        "الروحانيات": "team.php",
        "روحانيات": "team.php",

        "الموظفين والمدير": "employees.php",
        "الموظفون والمدير": "employees.php",
        "الموظفين": "employees.php",
        "الموظفون": "employees.php",
        "المدير": "employees.php",

        "الإعدادات": "settings.php",
        "الاعدادات": "settings.php",

        "مبصر ai": "mobsar-ai.php",
        "مبصر اي": "mobsar-ai.php",
        "مبصر اي اي": "mobsar-ai.php",
        "مبصر الذكي": "mobsar-ai.php",

        "الكاميرا": "camera.php",
        "كاميرا": "camera.php",

        "اكسل": "Excel.php",
        "إكسل": "Excel.php",
        "excel": "Excel.php",

        "وورد": "Word.php",
        "ورد": "Word.php",
        "word": "Word.php",

        "باوربوينت": "PowerPoint.php",
        "باور بوينت": "PowerPoint.php",
        "بوربوينت": "PowerPoint.php",
        "powerpoint": "PowerPoint.php",

        "المصحف الشريف": "Quran.php",
        "المصحف": "Quran.php",
        "القرآن الكريم": "Quran.php",
        "القرآن": "Quran.php",
        "القران الكريم": "Quran.php",
        "القران": "Quran.php",

        "الأذكار": "Azkar.php",
        "الاذكار": "Azkar.php",
        "أذكار": "Azkar.php",
        "اذكار": "Azkar.php",

        "الأدعية": "Duaa.php",
        "الادعية": "Duaa.php",
        "أدعية": "Duaa.php",
        "ادعية": "Duaa.php",
        "دعاء": "Duaa.php",

        "الأحاديث النبوية": "Hadith.php",
        "الاحاديث النبوية": "Hadith.php",
        "الأحاديث": "Hadith.php",
        "الاحاديث": "Hadith.php",
        "أحاديث": "Hadith.php",

        "الصلاة والعبادات": "Prayer.php",
        "الصلاة": "Prayer.php",
        "العبادات": "Prayer.php",
        "صلوات العبادة": "Prayer.php",

        "قصص الأنبياء": "Prophets.php",
        "قصص الانبياء": "Prophets.php",
        "الأنبياء": "Prophets.php",
        "الانبياء": "Prophets.php"
    };


    /* =========================
       أسماء الصفحات
       ========================= */

    const pageNames = [
        "الرئيسية",
        "الأقسام",
        "التسجيل",
        "المهام",
        "تقييم الإنجازات",
        "التقويم والمواعيد والأخبار",
        "التواصل",
        "إدارة الملفات",
        "المساعد البصري",
        "الروحانيات",
        "الموظفين والمدير",
        "الإعدادات",
        "مبصر AI",
        "الكاميرا",
        "Excel",
        "Word",
        "PowerPoint",
        "المصحف الشريف",
        "الأذكار",
        "الأدعية",
        "الأحاديث النبوية",
        "الصلاة والعبادات",
        "قصص الأنبياء"
    ];


    /* =========================
       تنظيف الكلام
       ========================= */

    function cleanText(text) {

        return String(text || "")
            .toLowerCase()
            .replace(/[ًٌٍَُِْـ]/g, "")
            .replace(/[؟?!،,.]/g, "")
            .replace(/\s+/g, " ")
            .trim();
    }


    /* =========================
       الصفحة الحالية
       ========================= */

    function getCurrentPageName() {

        const file =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        const currentPages = {

            "index.php": "الرئيسية",
            "home.php": "الأقسام",
            "register.php": "التسجيل",
            "tasks.php": "المهام",
            "evaluation.php": "تقييم الإنجازات",
            "schedule.php": "التقويم والمواعيد والأخبار",

            "communication.php": "التواصل",
            "communication.php": "التواصل",

            "notifications.php": "إدارة الملفات",
            "visual-assistant.php": "المساعد البصري",
            "team.php": "الروحانيات",
            "employees.php": "الموظفين والمدير",
            "settings.php": "الإعدادات",

            "mobsar-ai.php": "مبصر AI",
            "camera.php": "الكاميرا",

            "excel.php": "Excel",
            "word.php": "Word",
            "powerpoint.php": "PowerPoint",

            "quran.php": "المصحف الشريف",
            "azkar.php": "الأذكار",
            "duaa.php": "الأدعية",
            "hadith.php": "الأحاديث النبوية",
            "prayer.php": "الصلاة والعبادات",
            "prophets.php": "قصص الأنبياء"
        };

        return currentPages[file] || "غير معروفة";
    }


    /* =========================
       النطق
       ========================= */

    function speak(text) {

        if (!window.speechSynthesis) {
            return;
        }

        speaking = true;

        speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.95;
        utterance.pitch = 1;

        utterance.onend = function () {

            speaking = false;

            if (voiceEnabled) {
                restartListening();
            }
        };

        utterance.onerror = function () {

            speaking = false;

            if (voiceEnabled) {
                restartListening();
            }
        };

        speechSynthesis.speak(utterance);
    }


    /* =========================
       حالة الصوت
       ========================= */

    function updateStatus(text) {

        const status =
            document.getElementById("voice-status");

        if (status) {
            status.textContent = text;
        }
    }


    /* =========================
       الانتقال
       ========================= */

    function goToPage(file, name) {

        updateStatus(
            "سوف أنتقل إلى " + name
        );

        window.location.href = file;
    }


    /* =========================
       البحث عن الصفحة
       ========================= */

    function findPage(text) {

        const command = cleanText(text);

        const keys = Object.keys(pages)
            .sort(function (a, b) {
                return cleanText(b).length - cleanText(a).length;
            });

        for (const key of keys) {

            const cleanKey = cleanText(key);

            if (command.includes(cleanKey)) {
                return {
                    file: pages[key],
                    name: getPageDisplayName(pages[key])
                };
            }
        }

        return null;
    }


    /* =========================
       الاسم الظاهر للصفحة
       ========================= */

    function getPageDisplayName(file) {

        const names = {

            "index.php": "الرئيسية",
            "home.php": "الأقسام",
            "register.php": "التسجيل",
            "tasks.php": "المهام",
            "evaluation.php": "تقييم الإنجازات",
            "schedule.php": "التقويم والمواعيد والأخبار",
            "communication.php": "التواصل",
            "notifications.php": "إدارة الملفات",
            "visual-assistant.php": "المساعد البصري",
            "team.php": "الروحانيات",
            "employees.php": "الموظفين والمدير",
            "settings.php": "الإعدادات",
            "mobsar-ai.php": "مبصر AI",
            "camera.php": "الكاميرا",

            "Excel.php": "Excel",
            "Word.php": "Word",
            "PowerPoint.php": "PowerPoint",

            "Quran.php": "المصحف الشريف",
            "Azkar.php": "الأذكار",
            "Duaa.php": "الأدعية",
            "Hadith.php": "الأحاديث النبوية",
            "Prayer.php": "الصلاة والعبادات",
            "Prophets.php": "قصص الأنبياء"
        };

        return names[file] || "الصفحة المطلوبة";
    }


    /* =========================
       تنفيذ الأوامر
       ========================= */

    function handleCommand(rawText) {

        const text = cleanText(rawText);

        if (!text) {
            return;
        }


        /* =========================
           تحية
           ========================= */

        if (
            text.includes("السلام عليكم") ||
            text.includes("السلام عليكم ورحمة الله") ||
            text.includes("السلام عليكم ورحمه الله") ||
            text === "سلام عليكم" ||
            text === "السلام"
        ) {

            speak(
                "وعليكم السلام ورحمة الله وبركاته، أهلاً بك في مبصر."
            );

            return;
        }


        /* =========================
           مرحبا
           ========================= */

        if (
            text === "اهلا" ||
            text === "أهلا" ||
            text.includes("اهلا يا مبصر") ||
            text.includes("مرحبا") ||
            text.includes("هاي") ||
            text.includes("hello")
        ) {

            speak(
                "أهلاً وسهلاً بك، أنا مبصر وجاهز لمساعدتك."
            );

            return;
        }


        /* =========================
           أنا فين؟
           ========================= */

        if (
            text.includes("انا فين") ||
            text.includes("فين انا") ||
            text.includes("اين انا") ||
            text.includes("أين أنا") ||
            text.includes("اسم الصفحة") ||
            text.includes("اسم الصفحه") ||
            text.includes("دي صفحة ايه") ||
            text.includes("دي صفحه ايه") ||
            text.includes("هذه صفحة ايه") ||
            text.includes("انا في صفحة")
        ) {

            const currentPage =
                getCurrentPageName();

            if (currentPage === "غير معروفة") {

                speak(
                    "أنت حاليًا في صفحة غير معروفة."
                );

            } else {

                speak(
                    "أنت حاليًا في صفحة " +
                    currentPage +
                    "."
                );
            }

            return;
        }


        /* =========================
           الصفحات المتاحة
           ========================= */

        if (
            text.includes("قائمة الصفحات") ||
            text.includes("قائمه الصفحات") ||
            text.includes("الصفحات المتاحة") ||
            text.includes("الصفحات المتاحه") ||
            text.includes("الصفحات الموجودة") ||
            text.includes("الصفحات الموجوده") ||
            text.includes("ايه الصفحات") ||
            text.includes("ما هي الصفحات") ||
            text.includes("ما هي الصفحات الموجودة")
        ) {

            speak(
                "الصفحات المتاحة هي: " +
                pageNames.join("، ")
            );

            return;
        }


        /* =========================
           الرئيسية
           ========================= */

        if (
            text.includes("الصفحة الرئيسية") ||
            text.includes("صفحة الرئيسية") ||
            text.includes("روح الرئيسية") ||
            text.includes("اذهب للرئيسية") ||
            text.includes("اذهب الى الرئيسية") ||
            text.includes("افتح الرئيسية") ||
            text.includes("افتح الصفحة الرئيسية") ||
            text.includes("رجعني للرئيسية") ||
            text.includes("ارجع للرئيسية")
        ) {

            speakAndGo(
                "index.php",
                "الرئيسية"
            );

            return;
        }


        /* =========================
           الأقسام
           ========================= */

        if (
            text.includes("الأقسام") ||
            text.includes("الاقسام") ||
            text.includes("افتح الأقسام") ||
            text.includes("افتح الاقسام") ||
            text.includes("اذهب للأقسام") ||
            text.includes("اذهب الى الأقسام") ||
            text.includes("روح للأقسام")
        ) {

            speakAndGo(
                "home.php",
                "الأقسام"
            );

            return;
        }


        /* =========================
           التسجيل
           ========================= */

        if (
            text.includes("التسجيل") ||
            text.includes("تسجيل") ||
            text.includes("افتح التسجيل") ||
            text.includes("صفحة التسجيل") ||
            text.includes("روح للتسجيل") ||
            text.includes("اذهب للتسجيل") ||
            text.includes("اذهب الى التسجيل")
        ) {

            speakAndGo(
                "register.php",
                "التسجيل"
            );

            return;
        }


        /* =========================
           المهام
           ========================= */

        if (
            text.includes("المهام") ||
            text.includes("مهام") ||
            text.includes("افتح المهام") ||
            text.includes("صفحة المهام") ||
            text.includes("روح للمهام") ||
            text.includes("اذهب للمهام") ||
            text.includes("اذهب الى المهام")
        ) {

            speakAndGo(
                "tasks.php",
                "المهام"
            );

            return;
        }


        /* =========================
           تقييم الإنجازات
           ========================= */

        if (
            text.includes("تقييم الإنجازات") ||
            text.includes("تقييم الانجازات") ||
            text.includes("الإنجازات") ||
            text.includes("الانجازات") ||
            text.includes("افتح تقييم الإنجازات") ||
            text.includes("صفحة الإنجازات") ||
            text.includes("صفحة الانجازات") ||
            text.includes("روح للإنجازات") ||
            text.includes("اذهب للإنجازات")
        ) {

            speakAndGo(
                "evaluation.php",
                "تقييم الإنجازات"
            );

            return;
        }


        /* =========================
           التقويم والمواعيد والأخبار
           ========================= */

        if (
            text.includes("التقويم والمواعيد والأخبار") ||
            text.includes("التقويم والمواعيد والاخبار") ||
            text.includes("التقويم والمواعيد") ||
            text.includes("المواعيد") ||
            text.includes("التقويم") ||
            text.includes("الأخبار") ||
            text.includes("الاخبار") ||
            text.includes("افتح المواعيد") ||
            text.includes("افتح التقويم") ||
            text.includes("افتح الأخبار") ||
            text.includes("افتح الاخبار")
        ) {

            speakAndGo(
                "schedule.php",
                "التقويم والمواعيد والأخبار"
            );

            return;
        }


        /* =========================
           التواصل
           ========================= */

        if (
            text.includes("التواصل") ||
            text.includes("صفحة التواصل") ||
            text.includes("افتح التواصل") ||
            text.includes("روح للتواصل") ||
            text.includes("اذهب للتواصل") ||
            text.includes("اذهب الى التواصل")
        ) {

            speakAndGo(
                "communication.php",
                "التواصل"
            );

            return;
        }


        /* =========================
           إدارة الملفات
           ========================= */

        if (
            text.includes("إدارة الملفات") ||
            text.includes("ادارة الملفات") ||
            text.includes("إدارة الملف") ||
            text.includes("ادارة الملف") ||
            text.includes("الملفات") ||
            text.includes("افتح إدارة الملفات") ||
            text.includes("افتح الملفات") ||
            text.includes("روح للملفات") ||
            text.includes("اذهب للملفات")
        ) {

            speakAndGo(
                "notifications.php",
                "إدارة الملفات"
            );

            return;
        }


        /* =========================
           المساعد البصري
           ========================= */

        if (
            text.includes("المساعد البصري") ||
            text.includes("المساعد البصرى") ||
            text.includes("افتح المساعد البصري") ||
            text.includes("افتح المساعد") ||
            text.includes("روح للمساعد البصري") ||
            text.includes("اذهب للمساعد البصري")
        ) {

            speakAndGo(
                "visual-assistant.php",
                "المساعد البصري"
            );

            return;
        }


        /* =========================
           الروحانيات
           ========================= */

        if (
            text.includes("الروحانيات") ||
            text.includes("روحانيات") ||
            text.includes("افتح الروحانيات") ||
            text.includes("افتح روحانيات") ||
            text.includes("روح للروحانيات") ||
            text.includes("اذهب للروحانيات") ||
            text.includes("اذهب الى الروحانيات")
        ) {

            speakAndGo(
                "team.php",
                "الروحانيات"
            );

            return;
        }


        /* =========================
           الموظفين والمدير
           ========================= */

        if (
            text.includes("الموظفين والمدير") ||
            text.includes("الموظفون والمدير") ||
            text.includes("الموظفين") ||
            text.includes("الموظفون") ||
            text.includes("المدير") ||
            text.includes("افتح الموظفين") ||
            text.includes("افتح المدير") ||
            text.includes("روح للموظفين") ||
            text.includes("اذهب للموظفين")
        ) {

            speakAndGo(
                "employees.php",
                "الموظفين والمدير"
            );

            return;
        }


        /* =========================
           الإعدادات
           ========================= */

        if (
            text.includes("الإعدادات") ||
            text.includes("الاعدادات") ||
            text.includes("افتح الإعدادات") ||
            text.includes("افتح الاعدادات") ||
            text.includes("روح للإعدادات") ||
            text.includes("روح للاعدادات") ||
            text.includes("اذهب للإعدادات") ||
            text.includes("اذهب للاعدادات")
        ) {

            speakAndGo(
                "settings.php",
                "الإعدادات"
            );

            return;
        }


        /* =========================
           مبصر AI
           ========================= */

        if (
            text.includes("مبصر ai") ||
            text.includes("مبصر اي") ||
            text.includes("مبصر اى") ||
            text.includes("مبصر اي اي") ||
            text.includes("مبصر الذكي") ||
            text.includes("مبصر الذكى") ||
            text.includes("مبصر الذكاء الاصطناعي") ||
            text.includes("مبصر الذكاء الاصطناعى") ||
            text.includes("افتح مبصر اي") ||
            text.includes("افتح مبصر ai") ||
            text.includes("افتح مبصر الذكي") ||
            text.includes("روح لمبصر اي") ||
            text.includes("اذهب لمبصر اي")
        ) {

            speakAndGo(
                "mobsar-ai.php",
                "مبصر AI"
            );

            return;
        }


        /* =========================
           الكاميرا
           ========================= */

        if (
            text.includes("الكاميرا") ||
            text.includes("كاميرا") ||
            text.includes("افتح الكاميرا") ||
            text.includes("افتح كاميرا") ||
            text.includes("روح للكاميرا") ||
            text.includes("اذهب للكاميرا")
        ) {

            speakAndGo(
                "camera.php",
                "الكاميرا"
            );

            return;
        }


        /* =========================
           Excel
           ========================= */

        if (
            text.includes("اكسل") ||
            text.includes("إكسل") ||
            text.includes("excel") ||
            text.includes("افتح اكسل") ||
            text.includes("افتح إكسل") ||
            text.includes("روح لاكسل") ||
            text.includes("اذهب لاكسل")
        ) {

            speakAndGo(
                "Excel.php",
                "Excel"
            );

            return;
        }


        /* =========================
           Word
           ========================= */

        if (
            text.includes("وورد") ||
            text.includes("ورد") ||
            text.includes("word") ||
            text.includes("افتح وورد") ||
            text.includes("افتح ورد") ||
            text.includes("روح للوورد") ||
            text.includes("اذهب للوورد")
        ) {

            speakAndGo(
                "Word.php",
                "Word"
            );

            return;
        }


        /* =========================
           PowerPoint
           ========================= */

        if (
            text.includes("باوربوينت") ||
            text.includes("باور بوينت") ||
            text.includes("بوربوينت") ||
            text.includes("powerpoint") ||
            text.includes("افتح باوربوينت") ||
            text.includes("افتح باور بوينت") ||
            text.includes("روح للباوربوينت") ||
            text.includes("اذهب للباوربوينت")
        ) {

            speakAndGo(
                "PowerPoint.php",
                "PowerPoint"
            );

            return;
        }


        /* =========================
           المصحف الشريف
           ========================= */

        if (
            text.includes("المصحف الشريف") ||
            text.includes("المصحف") ||
            text.includes("القرآن الكريم") ||
            text.includes("القران الكريم") ||
            text.includes("القرآن") ||
            text.includes("القران") ||
            text.includes("افتح المصحف") ||
            text.includes("افتح القرآن") ||
            text.includes("افتح القران") ||
            text.includes("روح للمصحف") ||
            text.includes("اذهب للمصحف")
        ) {

            speakAndGo(
                "Quran.php",
                "المصحف الشريف"
            );

            return;
        }


        /* =========================
           الأذكار
           ========================= */

        if (
            text.includes("الأذكار") ||
            text.includes("الاذكار") ||
            text.includes("أذكار") ||
            text.includes("اذكار") ||
            text.includes("افتح الأذكار") ||
            text.includes("افتح الاذكار") ||
            text.includes("روح للأذكار") ||
            text.includes("اذهب للأذكار")
        ) {

            speakAndGo(
                "Azkar.php",
                "الأذكار"
            );

            return;
        }


        /* =========================
           الأدعية
           ========================= */

        if (
            text.includes("الأدعية") ||
            text.includes("الادعية") ||
            text.includes("أدعية") ||
            text.includes("ادعية") ||
            text.includes("دعاء") ||
            text.includes("افتح الأدعية") ||
            text.includes("افتح الادعية") ||
            text.includes("افتح الدعاء") ||
            text.includes("روح للأدعية") ||
            text.includes("اذهب للأدعية")
        ) {

            speakAndGo(
                "Duaa.php",
                "الأدعية"
            );

            return;
        }


        /* =========================
           الأحاديث النبوية
           ========================= */

        if (
            text.includes("الأحاديث النبوية") ||
            text.includes("الاحاديث النبوية") ||
            text.includes("الأحاديث") ||
            text.includes("الاحاديث") ||
            text.includes("أحاديث") ||
            text.includes("احاديث") ||
            text.includes("افتح الأحاديث") ||
            text.includes("افتح الاحاديث") ||
            text.includes("روح للأحاديث") ||
            text.includes("اذهب للأحاديث")
        ) {

            speakAndGo(
                "Hadith.php",
                "الأحاديث النبوية"
            );

            return;
        }


        /* =========================
           الصلاة والعبادات
           ========================= */

        if (
            text.includes("الصلاة والعبادات") ||
            text.includes("الصلاه والعبادات") ||
            text.includes("الصلاة") ||
            text.includes("الصلاه") ||
            text.includes("العبادات") ||
            text.includes("العبادات") ||
            text.includes("افتح الصلاة") ||
            text.includes("افتح العبادات") ||
            text.includes("روح للصلاة") ||
            text.includes("اذهب للصلاة")
        ) {

            speakAndGo(
                "Prayer.php",
                "الصلاة والعبادات"
            );

            return;
        }


        /* =========================
           قصص الأنبياء
           ========================= */

        if (
            text.includes("قصص الأنبياء") ||
            text.includes("قصص الانبياء") ||
            text.includes("الأنبياء") ||
            text.includes("الانبياء") ||
            text.includes("قصص النبياء") ||
            text.includes("افتح قصص الأنبياء") ||
            text.includes("افتح قصص الانبياء") ||
            text.includes("روح لقصص الأنبياء") ||
            text.includes("اذهب لقصص الأنبياء")
        ) {

            speakAndGo(
                "Prophets.php",
                "قصص الأنبياء"
            );

            return;
        }


        /* =========================
           فتح سورة البقرة
           ========================= */

        if (
            text.includes("افتح سورة البقرة") ||
            text.includes("افتح سوره البقره") ||
            text.includes("سورة البقرة") ||
            text.includes("سوره البقره") ||
            text.includes("البقرة") ||
            text.includes("البقره")
        ) {

            speak(
                "حاضر، سوف أفتح سورة البقرة."
            );

            setTimeout(function () {

                window.location.href =
                    "Quran.php";

            }, 400);

            return;
        }


        /* =========================
           أمر تشغيل التلاوة
           ========================= */

        if (
            text.includes("شغل التلاوة") ||
            text.includes("شغل التلاوه") ||
            text.includes("شغل القرآن") ||
            text.includes("شغل القران") ||
            text.includes("ابدأ التلاوة") ||
            text.includes("ابدأ التلاوه")
        ) {

            speak(
                "حاضر، سأحاول تشغيل التلاوة."
            );

            setTimeout(function () {

                const playButton =
                    document.querySelector(
                        "[data-action='play'], .play-button, #playButton"
                    );

                if (playButton) {
                    playButton.click();
                }

            }, 500);

            return;
        }

        /* =========================
           لو الأمر غير معروف
           ========================= */

        speak(
            "عذرًا، لم أفهم الأمر. يمكنك قول اسم الصفحة أو قول قائمة الصفحات."
        );
    }


    /* =========================
       الكلام ثم الانتقال
       ========================= */

    function speakAndGo(file, name) {

        speak(
            "حاضر، سوف أنتقل فورًا إلى " +
            name +
            "."
        );

        setTimeout(function () {

            goToPage(file, name);

        }, 450);
    }


    /* =========================
       إعادة تشغيل الاستماع
       ========================= */

    function restartListening() {

        if (
            !voiceEnabled ||
            speaking ||
            restarting ||
            !recognition
        ) {
            return;
        }

        restarting = true;

        setTimeout(function () {

            restarting = false;

            try {

                recognition.start();

            } catch (error) {

                // الميكروفون يعمل بالفعل
            }

        }, RESTART_DELAY);
    }


    /* =========================
       تشغيل التعرف على الكلام
       ========================= */

    function setupRecognition() {

        const SpeechRecognition =
            window.SpeechRecognition ||
            window.webkitSpeechRecognition;

        if (!SpeechRecognition) {

            updateStatus(
                "المتصفح لا يدعم التعرف على الصوت."
            );

            return;
        }


        recognition =
            new SpeechRecognition();


        recognition.lang = "ar-EG";

        recognition.continuous = true;

        recognition.interimResults = false;

        recognition.maxAlternatives = 3;


        /* =========================
           عند بدء الاستماع
           ========================= */

        recognition.onstart = function () {

            listening = true;

            updateStatus(
                "مبصر يستمع..."
            );

            const button =
                document.getElementById("voiceButton");

            if (button) {

                button.classList.add(
                    "listening"
                );
            }
        };


        /* =========================
           عند الحصول على الكلام
           ========================= */

        recognition.onresult = function (event) {

            if (speaking) {
                return;
            }

            const result =
                event.results[
                    event.results.length - 1
                ];

            if (!result) {
                return;
            }


            let transcript = "";


            for (
                let i = 0;
                i < result.length;
                i++
            ) {

                if (result[i].transcript) {

                    transcript +=
                        result[i].transcript + " ";
                }
            }


            transcript =
                transcript.trim();


            if (!transcript) {
                return;
            }


            updateStatus(
                "سمعت: " + transcript
            );


            handleCommand(
                transcript
            );
        };


        /* =========================
           انتهاء الاستماع
           ========================= */

        recognition.onend = function () {

            listening = false;

            const button =
                document.getElementById("voiceButton");

            if (button) {

                button.classList.remove(
                    "listening"
                );
            }


            if (
                voiceEnabled &&
                !speaking
            ) {

                restartListening();
            }
        };


        /* =========================
           خطأ في الميكروفون
           ========================= */

        recognition.onerror = function (event) {

            listening = false;


            const error =
                event.error || "";


            if (
                error === "not-allowed" ||
                error === "service-not-allowed"
            ) {

                updateStatus(
                    "اسمحي للمتصفح باستخدام الميكروفون."
                );

                voiceEnabled = false;

                return;
            }


            if (error === "no-speech") {

                updateStatus(
                    "مبصر جاهز للاستماع..."
                );
            }


            if (
                voiceEnabled &&
                !speaking
            ) {

                restartListening();
            }
        };
    }


    /* =========================
       بدء الصوت
       ========================= */

    function startVoice() {

        if (!recognition) {

            setupRecognition();
        }


        if (!recognition) {
            return;
        }


        voiceEnabled = true;


        try {

            recognition.start();

        } catch (error) {

            // الاستماع يعمل بالفعل
        }
    }


    /* =========================
       إيقاف الصوت
       ========================= */

    function stopVoice() {

        voiceEnabled = false;

        listening = false;

        restarting = false;


        if (recognition) {

            try {

                recognition.stop();

            } catch (error) {}
        }


        if (window.speechSynthesis) {

            speechSynthesis.cancel();
        }


        updateStatus(
            "تم إيقاف المساعد الصوتي."
        );


        const button =
            document.getElementById("voiceButton");

        if (button) {

            button.classList.remove(
                "listening"
            );
        }
    }


    /* =========================
       تبديل الصوت
       ========================= */

    function toggleVoice() {

        if (voiceEnabled) {

            stopVoice();

        } else {

            startVoice();
        }
    }


    /* =========================
       أول ضغطة / لمسة
       ========================= */

    function activateVoiceOnce() {

        if (voiceReady) {
            return;
        }


        voiceReady = true;


        startVoice();
    }


    /* =========================
       ربط زر الصوت
       ========================= */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            setupRecognition();


            const button =
                document.getElementById(
                    "voiceButton"
                );


            if (button) {

                button.addEventListener(
                    "click",
                    function (event) {

                        event.preventDefault();

                        toggleVoice();
                    }
                );
            }


            /* =====================
               أول تفاعل مع الصفحة
               ===================== */

            document.addEventListener(
                "click",
                function firstInteraction() {

                    activateVoiceOnce();

                    document.removeEventListener(
                        "click",
                        firstInteraction
                    );

                },
                {
                    once: true,
                    passive: true
                }
            );


            document.addEventListener(
                "touchstart",
                function firstTouch() {

                    activateVoiceOnce();

                    document.removeEventListener(
                        "touchstart",
                        firstTouch
                    );

                },
                {
                    once: true,
                    passive: true
                }
            );
        }
    );


    /* =========================
       إتاحة الأوامر للصفحة
       ========================= */

    window.MOBSARVoice = {

        start: startVoice,

        stop: stopVoice,

        toggle: toggleVoice,

        listen: startVoice,

        handleCommand: handleCommand,

        getCurrentPage:
            getCurrentPageName
    };


})();