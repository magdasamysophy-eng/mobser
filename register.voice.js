"use strict";

/* =========================================
   MOBSAR - REGISTER VOICE
   البلوك 1: الأساس + الصوت + الميكروفون
   ========================================= */

const LANG = "ar-EG";

let recognition = null;
let voiceStarted = false;
let isListening = false;
let isSpeaking = false;

let currentField = null;
let mode = "idle";

let waitingRegistrationAnswer = false;
let waitingFieldConfirmation = false;
let waitingNextConfirmation = false;

let pendingField = null;
let pendingFieldValue = "";

const fields = {
    username: "اسم المستخدم",
    password: "كلمة المرور",
    role: "نوع المستخدم",
    enable_spiritual: "صفحة الروحانيات",
    full_name: "الاسم الكامل",
    age: "العمر",
    phone: "رقم الهاتف"
};

const fieldOrder = [
    "username",
    "password",
    "role",
    "enable_spiritual",
    "full_name",
    "age",
    "phone"
];

const pages = {
    home: "index.php",
    register: "register.php",
    tasks: "tasks.php",
    evaluation: "evaluation.php",
    schedule: "schedule.php",
    communication: "communication.php",
    files: "files.php",
    visual: "visual-assistant.php",
    team: "team.php",
    employees: "employees.php",
    settings: "settings.php",
    mobsarAI: "mobsar-ai.php"
};


/* =========================================
   تنظيف الكلام
   ========================================= */

function normalize(text) {
    return String(text || "")
        .toLowerCase()
        .trim()
        .replace(/[إأآا]/g, "ا")
        .replace(/ة/g, "ه")
        .replace(/ى/g, "ي")
        .replace(/[ًٌٍَُِّْـ]/g, "")
        .replace(/[؟?!.,،]/g, " ")
        .replace(/\s+/g, " ");
}


/* =========================================
   تحويل الأرقام العربية
   ========================================= */

function nums(text) {
    return String(text || "")
        .replace(/[٠-٩]/g, d =>
            String("٠١٢٣٤٥٦٧٨٩".indexOf(d))
        )
        .replace(/[^0-9]/g, "");
}


/* =========================================
   عدد الكلمات
   ========================================= */

function wordCount(text) {
    return normalize(text)
        .split(" ")
        .filter(Boolean)
        .length;
}


/* =========================================
   قراءة قيمة الحقل
   ========================================= */

function value(id) {
    const el = document.getElementById(id);
    return el ? el.value : "";
}


/* =========================================
   وضع قيمة داخل الحقل
   ========================================= */

function setValue(id, val) {
    const el = document.getElementById(id);
    if (!el) return;

    el.value = val;
    el.dispatchEvent(new Event("input", { bubbles: true }));
    el.dispatchEvent(new Event("change", { bubbles: true }));
}


/* =========================================
   الكلام
   ========================================= */

function speak(text, callback = null) {
    if (!text) return;

    isSpeaking = true;

    try {
        if (recognition) {
            recognition.stop();
        }
    } catch (e) {}

    window.speechSynthesis.cancel();

    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = LANG;
    utterance.rate = 0.92;
    utterance.pitch = 1;

    utterance.onend = () => {
        isSpeaking = false;

        if (typeof callback === "function") {
            callback();
        }

        setTimeout(() => {
            if (voiceStarted && !isSpeaking) {
                startRecognition();
            }
        }, 350);
    };

    utterance.onerror = () => {
        isSpeaking = false;

        if (typeof callback === "function") {
            callback();
        }

        setTimeout(() => {
            if (voiceStarted && !isSpeaking) {
                startRecognition();
            }
        }, 350);
    };

    window.speechSynthesis.speak(utterance);
}


/* =========================================
   إنشاء التعرف الصوتي
   ========================================= */

function createRecognition() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        speak("عذرًا، المتصفح الحالي لا يدعم التعرف الصوتي.");
        return null;
    }

    const r = new SpeechRecognition();

    r.lang = LANG;
    r.continuous = true;
    r.interimResults = false;
    r.maxAlternatives = 3;

    r.onstart = () => {
        isListening = true;
        updateVoiceState();
    };

    r.onend = () => {
        isListening = false;
        updateVoiceState();

        if (
            voiceStarted &&
            !isSpeaking
        ) {
            setTimeout(() => {
                startRecognition();
            }, 500);
        }
    };

    r.onerror = event => {
        isListening = false;
        updateVoiceState();

        if (
            event.error !== "not-allowed" &&
            event.error !== "service-not-allowed" &&
            voiceStarted &&
            !isSpeaking
        ) {
            setTimeout(() => {
                startRecognition();
            }, 700);
        }
    };

    r.onresult = event => {

        for (
            let i = event.resultIndex;
            i < event.results.length;
            i++
        ) {

            if (!event.results[i].isFinal) continue;

            const text = event.results[i][0].transcript.trim();

            if (text) {
                processCommand(text);
            }
        }
    };

    return r;
}


/* =========================================
   بدء الميكروفون
   ========================================= */

function startRecognition() {

    if (!recognition) {
        recognition = createRecognition();
    }

    if (!recognition || isSpeaking) return;

    try {
        recognition.start();
    } catch (e) {
        // الميكروفون شغال بالفعل
    }
}


/* =========================================
   إعادة تشغيل الميكروفون
   ========================================= */

function restartRecognition() {

    if (!voiceStarted || isSpeaking) return;

    try {
        recognition.stop();
    } catch (e) {}

    setTimeout(() => {
        startRecognition();
    }, 400);
}


/* =========================================
   حالة الصوت على الصفحة
   ========================================= */

function updateVoiceState() {

    const status = document.getElementById("voice-status");

    if (!status) return;

    if (isListening) {
        status.textContent = "🎙️ مبصر يستمع الآن";
        status.classList.add("listening");
    } else {
        status.textContent = "🎙️ مبصر جاهز للاستماع";
        status.classList.remove("listening");
    }
}




/* =========================================
   البلوك 2: أول كليك + ألوان الحقول
   ========================================= */

function startVoice() {

    if (voiceStarted) {
        startRecognition();
        return;
    }

    voiceStarted = true;

    if (!recognition) {
        recognition = createRecognition();
    }

    speak(
        "مرحبًا بك في مبصر. أنا جاهز لاستماع أوامرك. هل تريد التسجيل الآن؟",
        () => {
            waitingRegistrationAnswer = true;
            mode = "registration-question";
        }
    );
}


/* =========================================
   أول تفاعل مع الصفحة
   ========================================= */

document.addEventListener("click", function () {

    if (!voiceStarted) {
        startVoice();
    }

}, { once: true });


document.addEventListener("keydown", function () {

    if (!voiceStarted) {
        startVoice();
    }

}, { once: true });


/* =========================================
   تنسيق الحقول من JavaScript
   ========================================= */

function styleField(id, state) {

    const el = document.getElementById(id);

    if (!el) return;

    el.style.transition = "all 0.25s ease";
    el.style.borderRadius = "12px";
    el.style.borderWidth = "2px";

    if (state === "empty") {

        el.style.backgroundColor = "#ffd6d6";
        el.style.borderColor = "#e53935";

    } else if (state === "active") {

        el.style.backgroundColor = "#fff3b0";
        el.style.borderColor = "#e0b400";

    } else if (state === "complete") {

        el.style.backgroundColor = "#d9f7df";
        el.style.borderColor = "#28a745";

    } else if (state === "error") {

        el.style.backgroundColor = "#ffb3b3";
        el.style.borderColor = "#c62828";
    }
}


/* =========================================
   تحديث ألوان كل الحقول
   ========================================= */

function updateFieldColors() {

    fieldOrder.forEach(field => {

        const el = document.getElementById(field);

        if (!el) return;

        const val = value(field).trim();

        if (field === currentField) {

            styleField(field, "active");

        } else if (val !== "") {

            styleField(field, "complete");

        } else {

            styleField(field, "empty");
        }
    });
}


/* =========================================
   تحديث الألوان بعد تحميل الصفحة
   ========================================= */

window.addEventListener("DOMContentLoaded", () => {

    updateFieldColors();

});


/* =========================================
   البلوك 3: التسجيل خطوة بخطوة
   ========================================= */

function explainRegistration() {

    speak(
        "التسجيل في مبصر بسيط. هنمشي خطوة خطوة. " +
        "هطلب منك اسم المستخدم، ثم كلمة المرور، " +
        "ثم نوع المستخدم، ثم صفحة الروحانيات، " +
        "ثم الاسم الكامل، والعمر، ورقم الهاتف."
    );
}


/* =========================================
   بدء التسجيل
   ========================================= */

function beginRegistration() {

    waitingRegistrationAnswer = false;
    waitingFieldConfirmation = false;
    waitingNextConfirmation = false;

    mode = "registration";

    currentField = "username";

    updateFieldColors();

    ask("username");
}


/* =========================================
   سؤال عن الحقل
   ========================================= */

function ask(field) {

    currentField = field;

    mode = "entering-field";

    updateFieldColors();

    if (field === "username") {

        speak("قولي اسم المستخدم. أنا سامعك.");

    } else if (field === "password") {

        speak("قولي كلمة المرور. أنا سامعك.");

    } else if (field === "role") {

        speak("قولي مدير أو موظف. اختاري.");

    } else if (field === "enable_spiritual") {

        speak(
            "هل تريدين تفعيل صفحة الروحانيات؟ " +
            "تحتوي على القرآن والمصحف والأذكار والمحتوى الروحاني. قولي نعم أو لا."
        );

    } else if (field === "full_name") {

        speak("قولي الاسم الكامل، مثل ماجدة سامي. أنا سامعك.");

    } else if (field === "age") {

        speak("قولي العمر. أنا سامعك.");

    } else if (field === "phone") {

        speak("قولي رقم الهاتف المكون من أحد عشر رقمًا. أنا سامعك.");
    }
}


/* =========================================
   قراءة الحقل
   ========================================= */

function readField(field) {

    const v = value(field);

    if (!v) {

        speak("الحقل فارغ.");

        return;
    }

    if (field === "password") {

        speak("كلمة المرور موجودة، ولن أقرأها حفاظًا على الخصوصية.");

        return;
    }

    speak(
        "قيمة " +
        fields[field] +
        " هي " +
        v
    );
}


/* =========================================
   تعديل الحقل
   ========================================= */

function editField(field) {

    currentField = field;

    setValue(field, "");

    waitingFieldConfirmation = false;
    waitingNextConfirmation = false;

    styleField(field, "active");

    speak(
        "تمام، هنعدل " +
        fields[field] +
        ". أنا سامعك. قولي القيمة مرة أخرى."
    );
}


/* =========================================
   تأكيد القيمة
   ========================================= */

function confirmFieldValue(field, val) {

    pendingField = field;
    pendingFieldValue = val;

    waitingFieldConfirmation = true;
    waitingNextConfirmation = false;

    if (field === "password") {

        speak(
            "سمعت كلمة المرور. لن أكررها حفاظًا على الخصوصية. هل القيمة صحيحة أم تريدين التعديل؟"
        );

    } else {

        speak(
            "سمعت: " +
            val +
            ". هل القيمة صحيحة أم تريدين التعديل؟"
        );
    }
}


/* =========================================
   الحقل التالي
   ========================================= */

function moveToNextField() {

    const index = fieldOrder.indexOf(currentField);

    if (index === -1) return;

    const next = fieldOrder[index + 1];

    if (!next) {

        reviewData();

        return;
    }

    waitingFieldConfirmation = false;
    waitingNextConfirmation = true;

    pendingField = next;

    speak(
        "تم تأكيد " +
        fields[currentField] +
        ". هل تريدين الانتقال إلى " +
        fields[next] +
        "؟"
    );
}


/* =========================================
   معالجة تأكيد القيمة
   ========================================= */

function handleFieldConfirmation(text) {

    const t = normalize(text);

    if (!waitingFieldConfirmation) return false;

    if (
        t.includes("نعم") ||
        t === "صح" ||
        t.includes("صحيح") ||
        t.includes("تمام") ||
        t.includes("مظبوط")
    ) {

        const field = pendingField;

        waitingFieldConfirmation = false;

        styleField(field, "complete");

        moveToNextField();

        return true;
    }


    if (
        t === "لا" ||
        t.includes("غلط") ||
        t.includes("خطا") ||
        t.includes("عدل") ||
        t.includes("تعديل")
    ) {

        const field = pendingField;

        waitingFieldConfirmation = false;

        editField(field);

        return true;
    }

    speak("قولي نعم للتأكيد أو لا للتعديل.");

    return true;
}


/* =========================================
   معالجة الانتقال للحقل التالي
   ========================================= */

function handleNextConfirmation(text) {

    const t = normalize(text);

    if (!waitingNextConfirmation) return false;

    if (
        t.includes("نعم") ||
        t === "ايوه" ||
        t === "ايوا" ||
        t.includes("تمام")
    ) {

        const next = pendingField;

        waitingNextConfirmation = false;

        ask(next);

        return true;
    }

    if (
        t === "لا" ||
        t.includes("مش دلوقتي")
    ) {

        waitingNextConfirmation = false;

        speak(
            "تمام، هنفضل عند " +
            fields[currentField] +
            "."
        );

        return true;
    }

    speak("قولي نعم للانتقال أو لا للبقاء في نفس المكان.");

    return true;
}


/* =========================================
   البلوك 4: استقبال بيانات الحقول
   ========================================= */

function handleField(field, rawValue) {

    let v = String(rawValue || "").trim();

    if (!v) {

        styleField(field, "error");

        speak("لم أسمع القيمة. قوليها مرة أخرى.");

        return;
    }


    /* اسم المستخدم */

    if (field === "username") {

        if (v.length < 2) {

            styleField(field, "error");

            speak("اسم المستخدم قصير جدًا. قولي اسم المستخدم مرة أخرى.");

            return;
        }

        setValue(field, v);

        confirmFieldValue(field, v);

        return;
    }


    /* كلمة المرور */

    if (field === "password") {

        if (v.length < 4) {

            styleField(field, "error");

            speak("كلمة المرور قصيرة جدًا. قولي كلمة مرور أقوى.");

            return;
        }

        setValue(field, v);

        confirmFieldValue(field, v);

        return;
    }


    /* نوع المستخدم */

    if (field === "role") {

        const t = normalize(v);

        if (
            t.includes("مدير")
        ) {

            setValue(field, "manager");

            confirmFieldValue(field, "مدير");

            return;
        }

        if (
            t.includes("موظف")
        ) {

            setValue(field, "employee");

            confirmFieldValue(field, "موظف");

            return;
        }

        styleField(field, "error");

        speak("قولي مدير أو موظف فقط.");

        return;
    }


    /* صفحة الروحانيات */

    if (field === "enable_spiritual") {

        const t = normalize(v);

        if (
            t === "نعم" ||
            t.includes("ايوه") ||
            t.includes("ايوا") ||
            t.includes("عايز") ||
            t.includes("اريد")
        ) {

            setValue(field, "1");

            confirmFieldValue(field, "نعم، تفعيل صفحة الروحانيات");

            return;
        }

        if (
            t === "لا" ||
            t.includes("مش عايز") ||
            t.includes("لا اريد")
        ) {

            setValue(field, "0");

            confirmFieldValue(field, "لا، عدم تفعيل صفحة الروحانيات");

            return;
        }

        styleField(field, "error");

        speak("قولي نعم أو لا.");

        return;
    }


    /* الاسم الكامل */

    if (field === "full_name") {

        const clean = v.replace(/\s+/g, " ").trim();

        if (wordCount(clean) < 2) {

            styleField(field, "error");

            speak(
                "قولي الاسم الكامل، ويكون على الأقل كلمتين، مثل ماجدة سامي."
            );

            return;
        }

        setValue(field, clean);

        confirmFieldValue(field, clean);

        return;
    }


    /* العمر */

    if (field === "age") {

        const n = nums(v);

        if (!n) {

            styleField(field, "error");

            speak("لم أتعرف على العمر. قولي العمر مرة أخرى.");

            return;
        }

        const age = parseInt(n, 10);

        if (
            !Number.isFinite(age) ||
            age < 1 ||
            age > 120
        ) {

            styleField(field, "error");

            speak("العمر غير صحيح. قولي العمر مرة أخرى.");

            return;
        }

        setValue(field, age);

        confirmFieldValue(field, String(age));

        return;
    }


    /* الهاتف */

    if (field === "phone") {

        const phone = nums(v);

        if (phone.length !== 11) {

            styleField(field, "error");

            speak(
                "رقم الهاتف يجب أن يكون مكونًا من أحد عشر رقمًا. قولي الرقم مرة أخرى."
            );

            return;
        }

        setValue(field, phone);

        confirmFieldValue(field, phone);

        return;
    }
}


/* =========================================
   مراجعة البيانات
   ========================================= */

function reviewData() {

    mode = "review";

    currentField = null;

    updateFieldColors();

    const username = value("username");
    const role = value("role");
    const spiritual = value("enable_spiritual");
    const fullName = value("full_name");
    const age = value("age");
    const phone = value("phone");

    const roleText =
        role === "manager"
            ? "مدير"
            : role === "employee"
                ? "موظف"
                : "غير محدد";

    const spiritualText =
        spiritual === "1"
            ? "مفعلة"
            : "غير مفعلة";

    speak(
        "تم إدخال البيانات. " +
        "اسم المستخدم: " + username + ". " +
        "نوع المستخدم: " + roleText + ". " +
        "صفحة الروحانيات: " + spiritualText + ". " +
        "الاسم الكامل: " + fullName + ". " +
        "العمر: " + age + ". " +
        "رقم الهاتف: " + phone + ". " +
        "كلمة المرور لن أقرأها حفاظًا على الخصوصية. " +
        "هل تريدين حفظ الحساب؟"
    );
}


/* =========================================
   تأكيد الحفظ
   ========================================= */

function handleSaveConfirmation(text) {

    const t = normalize(text);

    if (
        t.includes("نعم") ||
        t.includes("احفظ") ||
        t.includes("حفظ") ||
        t.includes("سجل")
    ) {

        submitAccount();

        return true;
    }

    if (
        t === "لا" ||
        t.includes("مش عايز")
    ) {

        speak(
            "تمام، لن أحفظ الحساب الآن. أنا جاهز لاستماع أوامرك."
        );

        mode = "idle";

        restartRecognition();

        return true;
    }

    speak("قولي نعم للحفظ أو لا لعدم الحفظ.");

    return true;
}


/* =========================================
   البلوك 5: عرض البيانات + التنقل
   ========================================= */

function findButton(text) {

    const buttons = Array.from(
        document.querySelectorAll("button, a")
    );

    const wanted = normalize(text);

    return buttons.find(btn =>
        normalize(btn.textContent).includes(wanted)
    );
}


/* =========================================
   عرض بيانات الحساب
   ========================================= */

function showProfile() {

    const button =
        document.querySelector(
            '[onclick*="showProfile"], .profile-btn'
        ) ||
        findButton("عرض بيانات الحساب الشخصية") ||
        findButton("عرض بيانات الحساب");

    if (button) {

        button.click();

    } else {

        const drawer =
            document.querySelector(".profile-drawer-content") ||
            document.querySelector(".profile-drawer");

        if (drawer) {
            drawer.style.display = "block";
        }
    }

    setTimeout(() => {

        const drawer =
            document.querySelector(".profile-drawer-content") ||
            document.querySelector(".profile-drawer");

        if (drawer) {

            drawer.style.width = "100%";
            drawer.style.maxWidth = "100%";
            drawer.style.minHeight = "80vh";
            drawer.style.padding = "30px";
            drawer.style.fontSize = "20px";
            drawer.style.display = "block";
            drawer.style.boxSizing = "border-box";
            drawer.style.position = "relative";
            drawer.style.zIndex = "9999";
            drawer.style.borderRadius = "20px";

        }

        const username = value("username");
        const role = value("role");
        const spiritual = value("enable_spiritual");
        const fullName = value("full_name");
        const age = value("age");
        const phone = value("phone");

        const roleText =
            role === "manager"
                ? "مدير"
                : role === "employee"
                    ? "موظف"
                    : role;

        const spiritualText =
            spiritual === "1"
                ? "مفعلة"
                : spiritual === "0"
                    ? "غير مفعلة"
                    : "غير محددة";

        speak(
            "بيانات الحساب. " +
            "اسم المستخدم: " + (username || "غير متوفر") + ". " +
            "نوع المستخدم: " + (roleText || "غير متوفر") + ". " +
            "صفحة الروحانيات: " + spiritualText + ". " +
            "الاسم الكامل: " + (fullName || "غير متوفر") + ". " +
            "العمر: " + (age || "غير متوفر") + ". " +
            "رقم الهاتف: " + (phone || "غير متوفر") + "."
        );

    }, 500);
}


/* =========================================
   الصفحة الحالية
   ========================================= */

function currentPageName() {

    const file =
        window.location.pathname
            .split("/")
            .pop()
            .toLowerCase();

    const names = {
        "index.php": "الرئيسية",
        "register.php": "التسجيل",
        "tasks.php": "المهام",
        "evaluation.php": "تقييم الإنجازات",
        "schedule.php": "المواعيد",
        "communication.php": "التواصل",
        "files.php": "إدارة الملفات",
        "visual-assistant.php": "المساعد البصري",
        "team.php": "الروحانيات",
        "employees.php": "الموظفين",
        "settings.php": "الإعدادات",
        "mobsar-ai.php": "مبصر AI"
    };

    return names[file] || "هذه الصفحة";
}


/* =========================================
   الصفحات المتاحة
   ========================================= */

function listPages() {

    speak(
        "الصفحات المتاحة هي: " +
        "الرئيسية، التسجيل، المهام، تقييم الإنجازات، " +
        "المواعيد، التواصل، إدارة الملفات، المساعد البصري، " +
        "الروحانيات، الموظفين، الإعدادات، ومبصر AI."
    );
}


/* =========================================
   التنقل
   ========================================= */

function goToPage(pageName) {

    const p = normalize(pageName);

    let target = null;
    let name = null;

    if (
        p.includes("الرئيسيه") ||
        p.includes("الرئيسية") ||
        p === "الرئيسيه"
    ) {
        target = pages.home;
        name = "الرئيسية";

    } else if (
        p.includes("التسجيل") ||
        p.includes("سجل")
    ) {
        target = pages.register;
        name = "التسجيل";

    } else if (
        p.includes("المهام")
    ) {
        target = pages.tasks;
        name = "المهام";

    } else if (
        p.includes("تقييم") ||
        p.includes("الانجازات") ||
        p.includes("الإنجازات")
    ) {
        target = pages.evaluation;
        name = "تقييم الإنجازات";

    } else if (
        p.includes("المواعيد")
    ) {
        target = pages.schedule;
        name = "المواعيد";

    } else if (
        p.includes("التواصل")
    ) {
        target = pages.communication;
        name = "التواصل";

    } else if (
        p.includes("اداره الملفات") ||
        p.includes("إدارة الملفات") ||
        p.includes("الملفات")
    ) {
        target = pages.files;
        name = "إدارة الملفات";

    } else if (
        p.includes("المساعد البصري") ||
        p.includes("مثال بصري")
    ) {
        target = pages.visual;
        name = "المساعد البصري";

    } else if (
        p.includes("الروحانيات") ||
        p.includes("روحانيات")
    ) {
        target = pages.team;
        name = "الروحانيات";

    } else if (
        p.includes("الموظفين") ||
        p.includes("موظفين")
    ) {
        target = pages.employees;
        name = "الموظفين";

    } else if (
        p.includes("الاعدادات") ||
        p.includes("الإعدادات")
    ) {
        target = pages.settings;
        name = "الإعدادات";

    } else if (
        p.includes("مبصر ai") ||
        p.includes("مبصر اي") ||
        p.includes("مبصر الذكي")
    ) {
        target = pages.mobsarAI;
        name = "مبصر AI";
    }

    if (!target) return false;

    speak(
        "حاضر. جار فتح صفحة " + name + ".",
        () => {
            window.location.href = target;
        }
    );

    return true;
}


/* =========================================
   أوامر التنقل
   ========================================= */

function navigationCommand(text) {

    const t = normalize(text);

    if (
        t.includes("الصفحات المتاحة") ||
        t.includes("ايه الصفحات") ||
        t.includes("ما هي الصفحات")
    ) {

        listPages();

        return true;
    }


    if (
        t.includes("انا فين") ||
        t.includes("أين انا") ||
        t.includes("فين انا")
    ) {

        speak(
            "أنت الآن في صفحة " +
            currentPageName() +
            "."
        );

        return true;
    }


    if (
        t.includes("عرضلي") ||
        t.includes("اعرضلي") ||
        t.includes("عرض بيانات الحساب") ||
        t.includes("بيانات الحساب")
    ) {

        showProfile();

        return true;
    }


    if (
        t.includes("افتح") ||
        t.includes("اذهب") ||
        t.includes("روح") ||
        t.includes("انتقل") ||
        t.includes("دخول")
    ) {

        return goToPage(t);
    }

    return false;
}


/* =========================================
   البلوك 6: الحفظ + المعالج الرئيسي
   ========================================= */


/* =========================================
   حفظ الحساب
   ========================================= */

function submitAccount() {

    mode = "saving";

    speak(
        "تمام. سأحفظ الحساب الآن.",
        () => {

            const form = document.getElementById("regForm");

            if (!form) {

                speak(
                    "لم أجد نموذج التسجيل في الصفحة."
                );

                mode = "idle";
                restartRecognition();

                return;
            }

            const submitButton =
                form.querySelector(
                    'button[type="submit"][name="submit_btn"]'
                ) ||
                form.querySelector(
                    'button[type="submit"]'
                ) ||
                form.querySelector(
                    'input[type="submit"]'
                );

            if (submitButton) {

                submitButton.click();

                setTimeout(() => {

                    createSaveMessage();

                    speak(
                        "تم إرسال بيانات التسجيل. أنا جاهز لاستماع أوامرك."
                    );

                    mode = "idle";
                    restartRecognition();

                }, 1000);

            } else {

                speak(
                    "لم أجد زر الحفظ في نموذج التسجيل."
                );

                mode = "idle";
                restartRecognition();
            }
        }
    );
}


/* =========================================
   رسالة حفظ داخل الصفحة
   بدون alert
   ========================================= */

function createSaveMessage() {

    let box =
        document.getElementById("mobsar-save-status");

    if (!box) {

        box = document.createElement("div");

        box.id = "mobsar-save-status";

        document.body.appendChild(box);
    }

    box.textContent =
        "✓ تم إرسال بيانات الحساب. يمكنك متابعة استخدام مبصر.";

    box.style.position = "fixed";
    box.style.top = "20px";
    box.style.left = "20px";
    box.style.right = "20px";
    box.style.zIndex = "99999";
    box.style.padding = "18px";
    box.style.borderRadius = "16px";
    box.style.background = "#d9f7df";
    box.style.border = "2px solid #28a745";
    box.style.fontSize = "20px";
    box.style.textAlign = "center";
    box.style.boxShadow = "0 8px 25px rgba(0,0,0,.25)";

    setTimeout(() => {

        if (box) {
            box.remove();
        }

    }, 6000);
}


/* =========================================
   حذف الحساب
   ========================================= */

function deleteAccount() {

    const button =
        document.querySelector(".delete-account-btn") ||
        findButton("حذف الحساب");

    if (!button) {

        speak("لم أجد زر حذف الحساب.");

        return;
    }

    speak(
        "سيتم فتح خيار حذف الحساب. تأكدي قبل تنفيذ الحذف.",
        () => {
            button.click();
        }
    );
}


/* =========================================
   رسالة السلام
   ========================================= */

function handleGreeting(text) {

    const t = normalize(text);

    if (
        t.includes("السلام عليكم") ||
        t.includes("سلام عليكم")
    ) {

        speak(
            "وعليكم السلام ورحمة الله وبركاته. مرحبًا بك في مبصر، أنا جاهز لاستماع أوامرك."
        );

        return true;
    }

    return false;
}


/* =========================================
   سؤال التسجيل الأول
   ========================================= */

function handleRegistrationQuestion(text) {

    if (!waitingRegistrationAnswer) {
        return false;
    }

    const t = normalize(text);

    if (
        t.includes("نعم") ||
        t.includes("ايوه") ||
        t.includes("ايوا") ||
        t.includes("عايز") ||
        t.includes("اريد") ||
        t.includes("سجل")
    ) {

        waitingRegistrationAnswer = false;

        speak(
            "تمام. هنبدأ التسجيل خطوة خطوة.",
            () => {
                beginRegistration();
            }
        );

        return true;
    }


    if (
        t === "لا" ||
        t.includes("مش عايز") ||
        t.includes("ليس الان") ||
        t.includes("مش دلوقتي")
    ) {

        waitingRegistrationAnswer = false;

        mode = "idle";

        speak(
            "تمام، لن نسجل حسابًا الآن. أنا جاهز لاستماع أوامرك."
        );

        return true;
    }


    speak(
        "قولي نعم لو تريدين التسجيل، أو لا لو مش عايزة تسجلي الآن."
    );

    return true;
}


/* =========================================
   الأوامر الخاصة بالتسجيل
   ========================================= */

function registrationCommand(text) {

    if (waitingFieldConfirmation) {

        return handleFieldConfirmation(text);
    }

    if (waitingNextConfirmation) {

        return handleNextConfirmation(text);
    }

    if (mode === "review") {

        return handleSaveConfirmation(text);
    }

    if (
        mode === "entering-field" &&
        currentField
    ) {

        const t = normalize(text);

        /*
           أوامر عامة مسموحة أثناء التسجيل
        */

        if (
            t.includes("انا فين") ||
            t.includes("الصفحات المتاحة") ||
            t.includes("عرضلي")
        ) {

            return navigationCommand(text);
        }

        handleField(currentField, text);

        return true;
    }

    return false;
}


/* =========================================
   المعالج الرئيسي لكل كلام المستخدم
   ========================================= */

function processCommand(text) {

    const t = normalize(text);

    if (!t) return;


    /* السلام */

    if (handleGreeting(text)) {
        return;
    }


    /* سؤال التسجيل الأول */

    if (handleRegistrationQuestion(text)) {
        return;
    }


    /* تأكيد الحقل */

    if (waitingFieldConfirmation) {

        handleFieldConfirmation(text);

        return;
    }


    /* الانتقال للحقل التالي */

    if (waitingNextConfirmation) {

        handleNextConfirmation(text);

        return;
    }


    /* مراجعة وحفظ */

    if (mode === "review") {

        handleSaveConfirmation(text);

        return;
    }


    /* أوامر الحذف */

    if (
        t.includes("احذف الحساب") ||
        t.includes("حذف الحساب")
    ) {

        deleteAccount();

        return;
    }


    /* أوامر التسجيل */

    if (
        mode === "entering-field"
    ) {

        registrationCommand(text);

        return;
    }


    /* الأوامر العامة */

    if (navigationCommand(text)) {
        return;
    }


    /* فتح صفحة التسجيل */

    if (
        t.includes("تسجيل الحساب") ||
        t.includes("سجل حساب") ||
        t.includes("ابدأ التسجيل")
    ) {

        beginRegistration();

        return;
    }


    /* لو مش معروف */

    speak(
        "لم أفهم الأمر. يمكنك قول: عرضلي، أنا فين، الصفحات المتاحة، افتح صفحة المهام، إدارة الملفات، أو ابدأ التسجيل."
    );
}


/* =========================================
   أمر عالمي يمكن استدعاؤه من أي سكريبت
   ========================================= */

window.runGlobalVoiceCommand = function(text) {

    processCommand(text);

};


/* =========================================
   تسجيل قيمة في حقل من سكريبت آخر
   ========================================= */

window.recordToField = function(field, val) {

    if (!fields[field]) return;

    handleField(field, val);

};


/* =========================================
   إظهار / إخفاء كلمة المرور
   ========================================= */

window.togglePasswordVisibility = function() {

    const input =
        document.getElementById("password");

    if (!input) return;

    input.type =
        input.type === "password"
            ? "text"
            : "password";
};


/* =========================================
   الذهاب للرئيسية
   ========================================= */

window.goToHome = function() {

    window.location.href = pages.home;

};


/* =========================================
   تشغيل الصوت من زر موجود في الصفحة
   ========================================= */

window.toggleVoice = function() {

    if (!voiceStarted) {

        startVoice();

        return;
    }

    if (isListening) {

        try {
            recognition.stop();
        } catch (e) {}

        isListening = false;
        updateVoiceState();

    } else {

        startRecognition();
    }
};


/* =========================================
   عند التركيز على حقل
   ========================================= */

document.addEventListener("focusin", event => {

    const id = event.target?.id;

    if (!fields[id]) return;

    currentField = id;

    updateFieldColors();

});


/* =========================================
   قبل مغادرة الصفحة
   ========================================= */

window.addEventListener("beforeunload", () => {

    voiceStarted = false;

    try {
        if (recognition) {
            recognition.stop();
        }
    } catch (e) {}

    window.speechSynthesis.cancel();

});


/* =========================================
   تشغيل الألوان بعد تحميل الصفحة
   ========================================= */

window.addEventListener("load", () => {

    updateFieldColors();

});