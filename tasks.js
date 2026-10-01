/* =========================
   PART 1
   الترحيب + معلومات الصفحات
   ========================= */



(function () {
    "use strict";

    let recognition = null;
    let voiceReady = false;
    let listening = false;
    let speaking = false;
    let voiceEnabled = false;
    let restarting = false;

    const RESTART_DELAY = 700;


    /* =========================
       الصفحات
       ========================= */

    const pages = {

        "الرئيسية": "index.php",
        "الصفحة الرئيسية": "index.php",
        "اندكس": "index.php",
        "index": "index.php",

        "الأقسام": "home.php",
        "الاقسام": "home.php",
        "صفحة الأقسام": "home.php",
        "صفحة الاقسام": "home.php",

        "التسجيل": "register.php",
        "صفحة التسجيل": "register.php",
        "register": "register.php",

        "المهام": "tasks.php",

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

        "التواصل": "communications.php",

        "إدارة الملفات": "notifications.php",
        "ادارة الملفات": "notifications.php",
        "الملفات": "notifications.php",

        "المساعد البصري": "visual-assistant.php",
        "المساعد": "visual-assistant.php",

        "الروحانيات": "team.php",
        "روحانيات": "team.php",

        "الموظفون والمدير": "employees.php",
        "الموظفين والمدير": "employees.php",
        "الموظفين": "employees.php",
        "الموظفون": "employees.php",
        "المدير": "employees.php",

        "الإعدادات": "settings.php",
        "الاعدادات": "settings.php",

        "مبصر AI": "mobsar-ai.php",
        "مبصر ai": "mobsar-ai.php",

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
        "powerpoint": "PowerPoint.php"
    };


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
        "الموظفون والمدير",
        "الإعدادات",
        "مبصر AI",
        "الكاميرا",
        "Excel",
        "Word",
        "PowerPoint"
    ];


    /* =========================
       معرفة الصفحة الحالية
       ========================= */

    function getCurrentPageName() {

        const file =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        const names = {

            "index.php": "الرئيسية",
            "home.php": "الأقسام",

            "register.php": "التسجيل",
            "tasks.php": "المهام",
            "evaluation.php": "تقييم الإنجازات",

            "schedule.php":
                "التقويم والمواعيد والأخبار",

            "communication.php":
                "التواصل",

            "notifications.php":
                "إدارة الملفات",

            "visual-assistant.php":
                "المساعد البصري",

            "team.php":
                "الروحانيات",

            "employees.php":
                "الموظفون والمدير",

            "settings.php":
                "الإعدادات",

            "mobsar-ai.php":
                "مبصر AI",

            "camera.php":
                "الكاميرا",

            "excel.php":
                "Excel",

            "word.php":
                "Word",

            "powerpoint.php":
                "PowerPoint"
        };

        return names[file] || "الصفحة الحالية";
    }


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
       الكلام
       ========================= */

    function speak(text, callback) {

        if (!window.speechSynthesis) {

            if (callback) callback();

            return;
        }

        speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 1;
        utterance.pitch = 1;
        utterance.volume = 1;

        speaking = true;

        updateStatus("مبصر يتحدث...");

        utterance.onend = function () {

            speaking = false;

            updateStatus("أستمع إليك...");

            if (callback) {

                setTimeout(callback, 100);

            } else if (voiceEnabled) {

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
            document.getElementById("voiceStatus");

        if (!status) return;

        status.innerHTML =
            '<span class="status-dot"></span> ' +
            text;
    }


    /* =========================
       فتح الصفحة
       ========================= */

    function goToPage(file, pageName) {

        const currentFile =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        if (currentFile === file.toLowerCase()) {

            speak(
                "أنتِ بالفعل في صفحة " +
                pageName
            );

            return;
        }

        window.location.href = file;
    }


    /* =========================
       البحث العام عن الصفحة
       ========================= */

    function findPage(command) {

        command = cleanText(command);

        const keys =
            Object.keys(pages)
                .sort(function (a, b) {
                    return b.length - a.length;
                });

        for (let i = 0; i < keys.length; i++) {

            const key =
                cleanText(keys[i]);

            if (command.includes(key)) {

                return {
                    file: pages[keys[i]],
                    name: getNameFromFile(
                        pages[keys[i]]
                    )
                };
            }
        }

        return null;
    }


    function getNameFromFile(file) {

        const names = {

            "index.php": "الرئيسية",
            "home.php": "الأقسام",
            "register.php": "التسجيل",
            "tasks.php": "المهام",
            "evaluation.php": "تقييم الإنجازات",

            "schedule.php":
                "التقويم والمواعيد والأخبار",

            "communication.php":
                "التواصل",

            "notifications.php":
                "إدارة الملفات",

            "visual-assistant.php":
                "المساعد البصري",

            "team.php":
                "الروحانيات",

            "employees.php":
                "الموظفون والمدير",

            "settings.php":
                "الإعدادات",

            "mobsar-ai.php":
                "مبصر AI",

            "camera.php":
                "الكاميرا",

            "Excel.php":
                "Excel",

            "Word.php":
                "Word",

            "PowerPoint.php":
                "PowerPoint"
        };

        return names[file] || "الصفحة المطلوبة";
    }


    /* =========================
       تنفيذ الأوامر
       ========================= */

    function handleCommand(command) {

        command = cleanText(command);

        if (!command) {

            restartListening();

            return;
        }

        console.log(
            "MOBSAR VOICE:",
            command
        );

if (
    command.includes("السلام عليكم") ||
    command.includes("سلام عليكم")
) {

    speak(
        "وعليكم السلام ورحمة الله وبركاته، أهلاً وسهلاً بكِ في مبصر."
    );

    return;
}


/* =========================
   أنا فين؟
   ========================= */

if (
    command.includes("انا فين") ||
    command.includes("فين انا") ||
    command.includes("اين انا") ||
    command.includes("اسم الصفحة") ||
    command.includes("اسم الصفحه")
) {

    speak(
        "أنتِ الآن في صفحة " +
        getCurrentPageName()
    );

    return;
}


/* =========================
   قائمة الصفحات
   ========================= */

if (
    command.includes("قائمة الصفحات") ||
    command.includes("قائمه الصفحات") ||
    command.includes("قائمة الصفحات الموجودة") ||
    command.includes("قائمه الصفحات الموجوده") ||
    command.includes("الصفحات الموجودة") ||
    command.includes("الصفحات الموجوده") ||
    command.includes("الصفحات المتاحة") ||
    command.includes("الصفحات المتاحه") ||
    command === "الصفحات"
) {

    speak(
        "الصفحات المتاحة هي: " +
        pageNames.join("، ")
    );

    return;
}

/* =========================
   PART 2
   الصفحات الأساسية
   ========================= */


/* الرئيسية */

if (
    command.includes("الرئيسية") ||
    command.includes("الصفحة الرئيسية") ||
    command.includes("صفحة الرئيسية") ||
    command.includes("افتح الرئيسية") ||
    command.includes("افتح الصفحة الرئيسية") ||
    command.includes("وديني للرئيسية") ||
    command.includes("وديني للصفحة الرئيسية") ||
    command.includes("اذهب للرئيسية") ||
    command.includes("اذهب للصفحة الرئيسية") ||
    command.includes("روح للرئيسية") ||
    command.includes("روح للصفحة الرئيسية") ||
    command.includes("أديني الرئيسية") ||
    command.includes("اديني الرئيسية")
) {

    goToPage(
        "index.php",
        "الرئيسية"
    );

    return;
}


/* الأقسام */

if (
    command.includes("الأقسام") ||
    command.includes("الاقسام") ||
    command.includes("صفحة الأقسام") ||
    command.includes("صفحة الاقسام") ||
    command.includes("افتح الأقسام") ||
    command.includes("افتح الاقسام") ||
    command.includes("وديني للأقسام") ||
    command.includes("وديني للاقسام") ||
    command.includes("اذهب للأقسام") ||
    command.includes("اذهب للاقسام") ||
    command.includes("روح للأقسام") ||
    command.includes("روح للاقسام") ||
    command === "الأقسام" ||
    command === "الاقسام"
) {

    goToPage(
        "home.php",
        "الأقسام"
    );

    return;
}


/* التسجيل */

if (
    command.includes("التسجيل") ||
    command.includes("تسجيل") ||
    command.includes("صفحة التسجيل") ||
    command.includes("افتح التسجيل") ||
    command.includes("وديني للتسجيل") ||
    command.includes("اذهب للتسجيل") ||
    command.includes("روح للتسجيل") ||
    command.includes("أديني التسجيل") ||
    command.includes("اديني التسجيل")
) {

    goToPage(
        "register.php",
        "التسجيل"
    );

    return;
}


/* المهام */

if (
    command.includes("المهام") ||
    command.includes("مهام") ||
    command.includes("مهمة") ||
    command.includes("مهمه") ||
    command.includes("صفحة المهام") ||
    command.includes("افتح المهام") ||
    command.includes("وديني للمهام") ||
    command.includes("اذهب للمهام") ||
    command.includes("روح للمهام") ||
    command.includes("أديني المهام") ||
    command.includes("اديني المهام")
) {

    goToPage(
        "tasks.php",
        "المهام"
    );

    return;
}


/* تقييم الإنجازات */

if (
    command.includes("تقييم الإنجازات") ||
    command.includes("تقييم الانجازات") ||
    command.includes("الإنجازات") ||
    command.includes("الانجازات") ||
    command.includes("صفحة التقييم") ||
    command.includes("افتح التقييم") ||
    command.includes("افتح الإنجازات") ||
    command.includes("افتح الانجازات") ||
    command.includes("وديني للتقييم") ||
    command.includes("اذهب للتقييم") ||
    command.includes("روح للتقييم")
) {

    goToPage(
        "evaluation.php",
        "تقييم الإنجازات"
    );

    return;
}


/* التقويم والمواعيد والأخبار */

if (
    command.includes("التقويم والمواعيد والأخبار") ||
    command.includes("التقويم والمواعيد") ||
    command.includes("المواعيد") ||
    command.includes("التقويم") ||
    command.includes("الأخبار") ||
    command.includes("الاخبار") ||
    command.includes("صفحة المواعيد") ||
    command.includes("افتح المواعيد") ||
    command.includes("افتح التقويم") ||
    command.includes("وديني للمواعيد") ||
    command.includes("اذهب للمواعيد") ||
    command.includes("روح للمواعيد")
) {

    goToPage(
        "schedule.php",
        "التقويم والمواعيد والأخبار"
    );

    return;
}

/* =========================
   PART 3
   الصفحات الإدارية
   ========================= */


/* التواصل */

if (
    command.includes("التواصل") ||
    command.includes("صفحة التواصل") ||
    command.includes("افتح التواصل") ||
    command.includes("وديني للتواصل") ||
    command.includes("اذهب للتواصل") ||
    command.includes("روح للتواصل") ||
    command.includes("أديني التواصل") ||
    command.includes("اديني التواصل")
) {

    goToPage(
        "communication.php",
        "التواصل"
    );

    return;
}


/* إدارة الملفات */

if (
    command.includes("إدارة الملفات") ||
    command.includes("ادارة الملفات") ||
    command.includes("الملفات") ||
    command.includes("صفحة الملفات") ||
    command.includes("افتح الملفات") ||
    command.includes("افتح إدارة الملفات") ||
    command.includes("وديني لإدارة الملفات") ||
    command.includes("وديني لادارة الملفات") ||
    command.includes("اذهب لإدارة الملفات") ||
    command.includes("روح لإدارة الملفات")
) {

    goToPage(
        "notifications.php",
        "إدارة الملفات"
    );

    return;
}


/* المساعد البصري */

if (
    command.includes("المساعد البصري") ||
    command.includes("المساعد") ||
    command.includes("صفحة المساعد") ||
    command.includes("افتح المساعد") ||
    command.includes("وديني للمساعد") ||
    command.includes("اذهب للمساعد") ||
    command.includes("روح للمساعد")
) {

    goToPage(
        "visual-assistant.php",
        "المساعد البصري"
    );

    return;
}


/* الروحانيات */

if (
    command.includes("الروحانيات") ||
    command.includes("روحانيات") ||
    command.includes("صفحة الروحانيات") ||
    command.includes("افتح الروحانيات") ||
    command.includes("وديني للروحانيات") ||
    command.includes("اذهب للروحانيات") ||
    command.includes("روح للروحانيات")
) {

    goToPage(
        "team.php",
        "الروحانيات"
    );

    return;
}


/* الموظفون والمدير */

if (
    command.includes("الموظفين والمدير") ||
    command.includes("الموظفون والمدير") ||
    command.includes("الموظفين") ||
    command.includes("الموظفون") ||
    command.includes("موظفين") ||
    command.includes("المدير") ||
    command.includes("مدير") ||
    command.includes("صفحة الموظفين")
) {

    goToPage(
        "employees.php",
        "الموظفين والمدير"
    );

    return;
}


/* الإعدادات */

if (
    command.includes("الإعدادات") ||
    command.includes("الاعدادات") ||
    command.includes("اعدادات") ||
    command.includes("صفحة الإعدادات") ||
    command.includes("افتح الإعدادات") ||
    command.includes("وديني للإعدادات") ||
    command.includes("اذهب للإعدادات") ||
    command.includes("روح للإعدادات")
) {

    goToPage(
        "settings.php",
        "الإعدادات"
    );

    return;
}

/* =========================
   PART 4
   أدوات مبصر
   ========================= */


/* مبصر AI */

if (
    command.includes("مبصر ai") ||
    command.includes("مبصر اي اي") ||
    command.includes("مبصر الذكي") ||
    command.includes("صفحة مبصر ai") ||
    command.includes("افتح مبصر ai") ||
    command.includes("وديني مبصر ai") ||
    command.includes("اذهب لمبصر ai") ||
    command.includes("روح لمبصر ai")
) {

    goToPage(
        "mobsar-ai.php",
        "مبصر AI"
    );

    return;
}


/* الكاميرا */

if (
    command.includes("الكاميرا") ||
    command.includes("كاميرا") ||
    command.includes("صفحة الكاميرا") ||
    command.includes("افتح الكاميرا") ||
    command.includes("وديني للكاميرا") ||
    command.includes("اذهب للكاميرا") ||
    command.includes("روح للكاميرا")
) {

    goToPage(
        "camera.php",
        "الكاميرا"
    );

    return;
}


/* Excel */

if (
    command.includes("اكسل") ||
    command.includes("إكسل") ||
    command.includes("excel") ||
    command.includes("برنامج الاكسل") ||
    command.includes("برنامج الإكسل") ||
    command.includes("صفحة اكسل") ||
    command.includes("افتح اكسل") ||
    command.includes("وديني اكسل") ||
    command.includes("اذهب لاكسل") ||
    command.includes("روح لاكسل") ||
    command.includes("اعمل جدول") ||
    command.includes("اعمل جداول")
) {

    goToPage(
        "Excel.php",
        "Excel"
    );

    return;
}


/* Word */

if (
    command.includes("وورد") ||
    command.includes("ورد") ||
    command.includes("word") ||
    command.includes("برنامج الوورد") ||
    command.includes("برنامج الورد") ||
    command.includes("صفحة وورد") ||
    command.includes("افتح وورد") ||
    command.includes("وديني وورد") ||
    command.includes("اذهب لوورد") ||
    command.includes("روح لوورد")
) {

    goToPage(
        "Word.php",
        "Word"
    );

    return;
}


/* PowerPoint */

if (
    command.includes("باوربوينت") ||
    command.includes("باور بوينت") ||
    command.includes("بوربوينت") ||
    command.includes("powerpoint") ||
    command.includes("presentation") ||
    command.includes("برزنتيشن") ||
    command.includes("بريزنتيشن") ||
    command.includes("صفحة الباوربوينت") ||
    command.includes("افتح الباوربوينت") ||
    command.includes("وديني الباوربوينت") ||
    command.includes("اذهب للباوربوينت") ||
    command.includes("روح للباوربوينت")
) {

    goToPage(
        "PowerPoint.php",
        "PowerPoint"
    );

    return;
}

/* =========================
           البحث العام
           ========================= */

        const page =
            findPage(command);

        if (page) {

            goToPage(
                page.file,
                page.name
            );

            return;
        }


        /* =========================
           الأمر غير مفهوم
           ========================= */

        speak(
            "عذرًا، لم أفهم الأمر."
        );
    }


    /* =========================
       بدء الاستماع
       ========================= */

    function startListening() {

        if (!recognition) return;

        if (!voiceEnabled) return;

        if (listening) return;

        if (speaking) return;

        try {

            recognition.start();

        } catch (error) {

            console.log(
                "MOBSAR start error:",
                error
            );
        }
    }


    /* =========================
       إعادة الاستماع
       ========================= */

    function restartListening() {

        if (!voiceEnabled) return;

        if (restarting) return;

        restarting = true;

        setTimeout(function () {

            restarting = false;

            if (
                !speaking &&
                voiceEnabled
            ) {

                startListening();
            }

        }, RESTART_DELAY);
    }


    /* =========================
       إعداد التعرف على الصوت
       ========================= */

    function setupRecognition() {

        const SpeechRecognition =
            window.SpeechRecognition ||
            window.webkitSpeechRecognition;

        if (!SpeechRecognition) {

            updateStatus(
                "المتصفح لا يدعم التعرف على الصوت"
            );

            return false;
        }

        recognition =
            new SpeechRecognition();

        recognition.lang = "ar-EG";

        recognition.continuous = false;

        recognition.interimResults = false;

        recognition.maxAlternatives = 3;


        recognition.onstart = function () {

            listening = true;

            document.body.classList.add(
                "listening"
            );

            updateStatus(
                "أستمع إليك..."
            );
        };


        recognition.onresult =
            function (event) {

                listening = false;

                document.body.classList.remove(
                    "listening"
                );

                const text =
                    event.results[0][0]
                        .transcript
                        .trim();

                console.log(
                    "MOBSAR RESULT:",
                    text
                );

                handleCommand(text);
            };


        recognition.onerror =
            function (event) {

                listening = false;

                document.body.classList.remove(
                    "listening"
                );

                console.log(
                    "MOBSAR voice error:",
                    event.error
                );

                if (
                    event.error ===
                    "not-allowed"
                ) {

                    voiceEnabled = false;

                    updateStatus(
                        "اسمحي للمتصفح باستخدام الميكروفون"
                    );

                    return;
                }

                if (
                    event.error ===
                    "service-not-allowed"
                ) {

                    voiceEnabled = false;

                    updateStatus(
                        "التعرف على الصوت غير مسموح"
                    );

                    return;
                }

                if (voiceEnabled) {

                    restartListening();
                }
            };


        recognition.onend =
            function () {

                listening = false;

                document.body.classList.remove(
                    "listening"
                );

                if (
                    voiceEnabled &&
                    !speaking
                ) {

                    restartListening();
                }
            };

        return true;
    }


    /* =========================
       تشغيل الصوت
       ========================= */

    function enableVoice() {

        if (!voiceReady) {

            voiceReady =
                setupRecognition();

            if (!voiceReady) {
                return;
            }
        }

        voiceEnabled = true;

        updateStatus(
            "المساعد الصوتي يعمل"
        );

        speak(
            "مرحبًا بك في مبصر. " +
            "أنت الآن في صفحة " +
            getCurrentPageName() +
            ". أخبرني كيف أساعدك."
        );
    }


    /* =========================
       إيقاف الصوت
       ========================= */

    function disableVoice() {

        voiceEnabled = false;

        listening = false;

        if (recognition) {

            try {
                recognition.stop();
            } catch (e) {}
        }

        if (window.speechSynthesis) {

            speechSynthesis.cancel();
        }

        speaking = false;

        document.body.classList.remove(
            "listening"
        );

        updateStatus(
            "المساعد الصوتي متوقف"
        );
    }


    /* =========================
       التحكم من الصفحات
       ========================= */

    window.MOBSARVoice = {

        start: enableVoice,

        stop: disableVoice,

        listen: startListening,

        command: handleCommand
    };


    /* =========================
       التفعيل باللمس
       ========================= */

    function activateVoice() {

        if (!voiceEnabled) {

            enableVoice();

            return;
        }

        startListening();
    }


    document.addEventListener(
        "click",
        activateVoice,
        { once: true }
    );


    document.addEventListener(
        "touchstart",
        activateVoice,
        { once: true }
    );



    
})();