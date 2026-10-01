<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موسوعة قصص الأنبياء والرسل - مبصر</title>
    <!-- مكتبة الأيقونات والخطوط -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
            overflow-x: hidden;
        }
        .top-nav-bar { width: 90%; max-width: 1200px; display: flex; justify-content: space-between; padding: 25px 0 0 0; align-items: center; }
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
        
        /* شبكة الكروت للقصص */
        .stories-container { width: 90%; max-width: 1200px; display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px; margin-top: 25px; }
        .story-card-box {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 20px; padding: 22px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.95), 0 0 20px rgba(138, 43, 226, 0.15);
            transition: 0.3s; cursor: pointer; display: flex; flex-direction: column; justify-content: space-between;
        }
        .story-card-box:hover { border-color: rgba(212, 175, 55, 0.8); transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.98), 0 0 35px rgba(212, 175, 55, 0.3); }
        .story-card-title {
            color: #fef08a; font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 8px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .story-card-title i { color: #d4af37; font-size: 1.1rem; }
        .story-card-snippet { color: #d8b4fe; font-size: 0.95rem; line-height: 1.7; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .full-story-content { display: none; margin-top: 10px; color: #e5e7eb; font-size: 1.02rem; line-height: 1.9; border-top: 1px dashed rgba(212,175,55,0.3); padding-top: 12px; text-align: justify; }
        .story-action-btn {
            background: linear-gradient(135deg, #d4af37, #997515); color: #000000; border: none;
            width: 100%; padding: 10px; border-radius: 10px; font-weight: 700; font-size: 0.95rem; cursor: pointer;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2); transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .story-action-btn:hover { background: linear-gradient(135deg, #fffbe6, #d4af37); box-shadow: 0 0 20px rgba(212, 175, 55, 0.6); }

        .global-voice-widget {
            position: fixed; bottom: 25px; left: 25px; background: rgba(5, 1, 10, 0.95);
            border: 2px solid #d4af37; padding: 14px 22px; border-radius: 35px; color: #d4af37; font-weight: 700;
            box-shadow: 0 0 30px rgba(138, 43, 226, 0.5); display: flex; align-items: center; gap: 12px; z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .global-voice-widget i { font-size: 1.4rem; color: #ef4444; animation: pulseMic 0.9s infinite; }
        @keyframes pulseMic { 0% { transform: scale(1); opacity: 0.7; } 50% { transform: scale(1.4); opacity: 1; } 100% { transform: scale(1); opacity: 0.7; } }
    </style>
</head>
<body>

<div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseenter="speakQuick('العودة للصفحة الرئيسية')" onclick="goToHome(event)">
            <i class="fa-solid fa-house"></i> الصفحة الرئيسية
        </a>
        <a href="tasks.php" class="chat-nav-btn" onmouseenter="speakQuick('الانتقال لصفحة المهام')" onclick="goToTasks(event)">
            <i class="fa-solid fa-list-check"></i> صفحة المهام <i class="fa-solid fa-bolt" style="color: #d4af37;"></i>
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick('موسوعة قصص الأنبياء والصحابة')">موسوعة قصص الأنبياء والصحابة</div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">مبصر يستمع لأوامر القصص والتنقل...</span>
    </div>

    <!-- شبكة كروت القصص المتكاملة -->
    <div class="stories-container" id="storiesGrid">

        <!-- قصة آدم عليه السلام -->
        <div class="story-card-box" id="card-adam" onclick="toggleAndReadStory('adam', 'قصة سيدنا آدم أبو البشر عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا آدم عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة خلق أبي البشر آدم عليه السلام، وسجود الملائكة، وتكريم الله له، ووسوسة إبليس والهبوط إلى الأرض لتعميرها.
                </div>
                <div class="full-story-content" id="content-adam">
                    تُعتبر قصة آدم عليه السلام البداية الكبرى لمسيرة البشرية. خلق الله تعالى آدم بيده ونفخ فيه من روحه، وأسجد له ملائكته إكراماً وتعظيماً. أسكن الله آدم وزوجه حواء الجنة، وأباح لهما التمتع بطيباتها ونهاهما عن شجرة واحدة. وسوس إبليس لهما فأكلا منها، فتلقى آدم من ربه كلمات فتاب عليه. هبط آدم إلى الأرض لتبدأ رحلة الاستخلاف والتعمير والإنجاب، ولتكون مدرسة الإيمان والتوحيد.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('adam', 'قصة سيدنا آدم أبو البشر عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة إبراهيم عليه السلام -->
        <div class="story-card-box" id="card-ibrahim" onclick="toggleAndReadStory('ibrahim', 'قصة خليل الرحمن سيدنا إبراهيم عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا إبراهيم عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة خليل الرحمن وحطمه للأصنام، ومواجهته للطاغية النمرود، والمعجزة العظيمة في النار، وبناء الكعبة المشرفة.
                </div>
                <div class="full-story-content" id="content-ibrahim">
                    خليل الرحمن إبراهيم عليه السلام نشأ وسط قوم يعبدون الأصنام. حطم الأصنام بيمينه ليقيم الحجة على قومه، فألقاه النمرود في النار العظيمة فجعلها الله برداً وسلاماً عليه. ابتلاه ربه بابتلاءات كبرى وأمره بذبح ولده إسماعيل ففداه الله بذبح عظيم، وبنى إبراهيم وابنه قواعد البيت العتيق (الكعبة المشرفة) لتبقى مزاراً للتوحيد الخالص.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('ibrahim', 'قصة خليل الرحمن سيدنا إبراهيم عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة موسى عليه السلام -->
        <div class="story-card-box" id="card-mousa" onclick="toggleAndReadStory('mousa', 'قصة كليم الله سيدنا موسى عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا موسى عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة كليم الله في قصر فرعون، وعصاه المباركة، وشق البحر الأحمر، وإنجاء بني إسرائيل من الطغيان.
                </div>
                <div class="full-story-content" id="content-mousa">
                    وُلد موسى عليه السلام في عام التقتيل، فألقته أمه في اليم ليصل إلى قصر فرعون مربياً ومؤدباً. كلمه الله تكليماً على طور سيناء وأعطاه العصا واليد البيضاء آيات بينات. دعا فرعون وجنوده فأهلكهم الله غرقاً في البحر وأنجى موسى ومن معه من المؤمنين لتستمر رسالة الحق.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('mousa', 'قصة كليم الله سيدنا موسى عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة محمد صلى الله عليه وسلم -->
        <div class="story-card-box" id="card-muhammad" onclick="toggleAndReadStory('muhammad', 'قصة خاتم الأنبياء والمرسلين سيدنا محمد صلى الله عليه وسلم')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا محمد صلى الله عليه وسلم</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة خاتم الأنبياء والمرسلين، ونزول الوحي في غار حراء، ونشر الإسلام ورحمة للعالمين.
                </div>
                <div class="full-story-content" id="content-muhammad">
                    خاتم الأنبياء والمرسلين سيدنا محمد صلى الله عليه وسلم، وُلد يتيماً وعُرف بالصادق الأمين. بعثه الله بالهدى ودين الحق وعمره أربعون عاماً فأنزل عليه القرآن الكريم نوراً ومبيناً. عانى أذى المشركين فهاجر إلى المدينة وأسس دولة العدل والإيمان، وفتح مكة فاتحاً ومبشراً حتى أتم الله به النعمة على البشرية جمعاء.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('muhammad', 'قصة خاتم الأنبياء والمرسلين سيدنا محمد صلى الله عليه وسلم')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة عيسى عليه السلام -->
        <div class="story-card-box" id="card-issa" onclick="toggleAndReadStory('issa', 'قصة روح الله نبي الله عيسى عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا عيسى عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة ميلاد العذراء مريم لابنها عيسى المسيح آية للعالمين ومعجزاته بإذن الله.
                </div>
                <div class="full-story-content" id="content-issa">
                    نبي الله ورسوله عيسى ابن مريم عليه السلام، كلمة الله ألقاها إلى مريم وروح منه. تكلم في المهد صبياً، وأبرئ الأكمه والأبرص وأحيي الموتى بإذن الله. أيدهُ الله بالإنجيل وحقائق الإيمان، ومكر به أعداؤه فرفعه الله إليه طاهراً مطهراً ليكون آية للعالمين.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('issa', 'قصة روح الله نبي الله عيسى عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة نوح عليه السلام -->
        <div class="story-card-box" id="card-nouh" onclick="toggleAndReadStory('nouh', 'قصة نبي الله نوح عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا نوح عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة شيخ المرسلين ودعوته قومه ألف سنة إلا خمسين عاماً، وبناء الفلك والطوفان العظيم.
                </div>
                <div class="full-story-content" id="content-nouh">
                    دعا نوح عليه السلام قومه ليل ونهار سراً وعلانية لمدة ألف سنة إلا خمسين عاماً فلم يزيدهم دعاؤه إلا فراراً. أمر الله نوحاً بناء الفلك بأعيننا ووحينا، فلما جاء أمرنا وفار التنور حمل فيها من كل زوجين اثنين ومن آمن. أغرق الطوفان المكذبين ونجا نوح ومن معه في الفلك المشحون.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('nouh', 'قصة نبي الله نوح عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة يوسف عليه السلام -->
        <div class="story-card-box" id="card-youssef" onclick="toggleAndReadStory('youssef', 'قصة الصديق نبي الله يوسف عليه السلام')">
            <div>
                <div class="story-card-title">
                    <span>قصة سيدنا يوسف عليه السلام</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة أحسن القصص، إلقاؤه في الجب، صبره في السجن، وتوليه خزائن مصر وتأويل الرؤى.
                </div>
                <div class="full-story-content" id="content-youssef">
                    تلك هي أحسن القصص، رؤيا الكواكب الساجدة وإلقاء الإخوة ليوسف في غيابات الجُبّ. بيع في مصر فاستقر في بيت العزيز، وابتلي باختبار العفاف فصبر ودخل السجن سنين عديدة. فسر رؤيا الملك فخرج كريماً وتولى خزائن مصر، حتى اجتمع شمله بأبويه وإخوته وتحققت رؤياه صدقاً وعدلاً.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('youssef', 'قصة الصديق نبي الله يوسف عليه السلام')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

        <!-- قصة عمر بن الخطاب رضي الله عنه -->
        <div class="story-card-box" id="card-omar" onclick="toggleAndReadStory('omar', 'قصة الفاروق عمر بن الخطاب رضي الله عنه')">
            <div>
                <div class="story-card-title">
                    <span>قصة عمر بن الخطاب رضي الله عنه</span>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="story-card-snippet">
                    قصة إسلام الفاروق أمير المؤمنين، عدله الساطع، وقوة الحق في عهده الزاهر.
                </div>
                <div class="full-story-content" id="content-omar">
                    الفاروق عمر بن الخطاب رضي الله عنه، القوي الأمين الذي أعز الله به الإسلام. كان إسلامه فتحاً وهجرته عزاً. تولى الخلافة فأقام العدل حتى ضرب به المثل في النزاهة وحماية الرعية، واتسعت في عهده رقعة الإسلام وانشر الأمن والأمان والعدل المطلق.
                </div>
            </div>
            <button class="story-action-btn" onclick="event.stopPropagation(); toggleAndReadStory('omar', 'قصة الفاروق عمر بن الخطاب رضي الله عنه')">
                <i class="fa-solid fa-volume-high"></i> اقرأ القصة صوتياً
            </button>
        </div>

    </div>





<script>
/* =========================================================
   MOBSAR - PROPHETS & COMPANIONS
   PART ONE
   الصوت + الترحيب + الميكروفون + الأوامر العامة
   ========================================================= */

(function () {
    "use strict";

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    let recognition = null;

    let systemStarted = false;
    let speaking = false;
    let startingRecognition = false;

    // لمنع تكرار تشغيل المايك بسبب أكثر من حدث
    let restartTimer = null;

    // يمنع أن نفس اللمسة تعمل كليك عادي بعد إيقاف الكلام
    let blockedClickAfterStop = false;

    // الأوامر التي ستضاف في Part Two وغيره
    const commandHandlers = [];


    /* =========================================================
       1) فحص دعم المتصفح
       ========================================================= */

    if (!SpeechRecognition) {
        console.warn("Speech Recognition غير مدعوم في هذا المتصفح.");
    } else {

        recognition = new SpeechRecognition();

        recognition.lang = "ar-EG";
        recognition.continuous = true;
        recognition.interimResults = false;
        recognition.maxAlternatives = 5;


        /* =====================================================
           عندما يصل أمر صوتي
           ===================================================== */

        recognition.onresult = function (event) {

            for (let i = event.resultIndex; i < event.results.length; i++) {

                if (!event.results[i].isFinal) continue;

                const transcript =
                    event.results[i][0].transcript.trim();

                if (!transcript) continue;

                console.log("🎙️ الأمر:", transcript);

                handleVoiceCommand(transcript);
            }
        };


        /* =====================================================
           عندما يتوقف المايك
           ===================================================== */

        recognition.onend = function () {

            startingRecognition = false;

            if (
                systemStarted &&
                !speaking
            ) {
                scheduleRestartListening();
            }
        };


        /* =====================================================
           أخطاء المايك
           ===================================================== */

        recognition.onerror = function (event) {

            startingRecognition = false;

            console.log("🎙️ Speech Error:", event.error);

            if (event.error === "not-allowed") {

                updateStatus(
                    "الميكروفون يحتاج إلى السماح من المتصفح."
                );

                return;
            }

            if (
                event.error === "aborted" ||
                event.error === "no-speech"
            ) {
                return;
            }

            if (systemStarted && !speaking) {
                scheduleRestartListening();
            }
        };
    }


    /* =========================================================
       2) تنظيف النص العربي
       ========================================================= */

    function normalize(text) {

        return String(text || "")
            .toLowerCase()

            // إزالة التشكيل
            .replace(/[\u064B-\u065F\u0670]/g, "")

            // توحيد الهمزات
            .replace(/[أإآ]/g, "ا")

            // توحيد التاء المربوطة
            .replace(/ة/g, "ه")

            // إزالة علامات الترقيم
            .replace(/[،؛؟?!.,:;'"“”«»()[\]{}]/g, " ")

            // مسافات
            .replace(/\s+/g, " ")

            .trim();
    }


    /* =========================================================
       3) تحديث حالة الصوت على الشاشة
       ========================================================= */

    function updateStatus(text) {

        const status =
            document.getElementById("voiceStatusText");

        if (status) {
            status.textContent = text;
        }
    }


    /* =========================================================
       4) تشغيل الميكروفون
       ========================================================= */

    function startListening() {

        if (!recognition) return;

        if (!systemStarted) return;

        if (speaking) return;

        if (startingRecognition) return;

        startingRecognition = true;

        try {

            recognition.start();

            updateStatus(
                "مبصر يستمع لأوامرك..."
            );

            console.log("🎙️ المايك يعمل");

        } catch (error) {

            startingRecognition = false;

            console.log(
                "الميكروفون يعمل بالفعل أو يحتاج إعادة تشغيل.",
                error
            );
        }
    }


    /* =========================================================
       5) إعادة تشغيل الميكروفون بعد توقفه
       ========================================================= */

    function scheduleRestartListening() {

        clearTimeout(restartTimer);

        restartTimer = setTimeout(function () {

            if (
                systemStarted &&
                !speaking
            ) {
                startListening();
            }

        }, 300);
    }


    /* =========================================================
       6) إيقاف الميكروفون مؤقتًا أثناء الكلام
       ========================================================= */

    function stopListening() {

        if (!recognition) return;

        try {
            recognition.stop();
        } catch (error) {
            console.log("تعذر إيقاف المايك:", error);
        }

        startingRecognition = false;
    }


    /* =========================================================
       7) الكلام
       ========================================================= */

    function speak(text, callback) {

        if (!text) {
            if (typeof callback === "function") {
                callback();
            }
            return;
        }

        // إيقاف الميكروفون أثناء الكلام
        stopListening();

        // إلغاء أي كلام سابق
        window.speechSynthesis.cancel();

        speaking = true;

        updateStatus(
            "مبصر يتحدث... اضغطي في أي مكان لإيقاف الكلام."
        );

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";

        utterance.rate = 0.9;

        utterance.pitch = 1;


        utterance.onend = function () {

            speaking = false;

            updateStatus(
                "مبصر يستمع لأوامرك..."
            );

            if (typeof callback === "function") {
                callback();
            }

            // بعد انتهاء الكلام يرجع المايك
            if (systemStarted) {
                scheduleRestartListening();
            }
        };


        utterance.onerror = function () {

            speaking = false;

            updateStatus(
                "مبصر يستمع لأوامرك..."
            );

            if (typeof callback === "function") {
                callback();
            }

            if (systemStarted) {
                scheduleRestartListening();
            }
        };


        window.speechSynthesis.speak(utterance);
    }


    /* =========================================================
       8) إيقاف الكلام فورًا وتشغيل المايك
       ========================================================= */

    function stopSpeakingAndListen() {

        // لو مش بيتكلم مفيش حاجة نوقفها
        if (!speaking) return false;

        console.log(
            "🛑 تم إيقاف كلام مبصر بالكليك"
        );

        // إيقاف الكلام فورًا
        window.speechSynthesis.cancel();

        speaking = false;

        // منع الكليك الحالي من تشغيل أي زر أو كارت
        blockedClickAfterStop = true;

        updateStatus(
            "مبصر يستمع لأوامرك..."
        );

        // تشغيل المايك من جديد
        setTimeout(function () {

            if (systemStarted) {
                startListening();
            }

        }, 150);

        return true;
    }


    /* =========================================================
       9) الكليك العام في الصفحة
       
       مهم جدًا:
       لو مبصر بيتكلم + المستخدم ضغط أي مكان
       -----------------------------------------
       يوقف الكلام
       يلغي التلاوة
       يشغل المايك
       يمنع الكليك من تنفيذ أي زر
       ========================================================= */

    document.addEventListener(
        "pointerdown",
        function (event) {

            if (!speaking) return;

            console.log(
                "👆 كليك أثناء الكلام → إيقاف مبصر"
            );

            // منع الكليك من الوصول للكروت والأزرار
            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

            // إيقاف الكلام وتشغيل المايك
            stopSpeakingAndListen();

        },
        true
    );


    /* =========================================================
       10) منع click الناتج عن نفس اللمسة
       ========================================================= */

    document.addEventListener(
        "click",
        function (event) {

            if (blockedClickAfterStop) {

                event.preventDefault();
                event.stopPropagation();
                event.stopImmediatePropagation();

                blockedClickAfterStop = false;
            }

        },
        true
    );


    /* =========================================================
       11) إضافة أمر صوتي من الأجزاء التالية
       ========================================================= */

    function addCommandHandler(handler) {

        if (typeof handler !== "function") return;

        commandHandlers.push(handler);
    }


    /* =========================================================
       12) موزع الأوامر
       ========================================================= */

    function handleVoiceCommand(command) {

        const normalizedCommand =
            normalize(command);

        console.log(
            "📌 الأمر بعد التنظيف:",
            normalizedCommand
        );

        if (!normalizedCommand) return;


        for (const handler of commandHandlers) {

            try {

                const handled =
                    handler(
                        normalizedCommand,
                        command
                    );

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


        // لو مفيش جزء تاني تعامل مع الأمر
        speak(
            "معلش، مش فاهمة الأمر ده. جربي تقولي الأمر بطريقة تانية."
        );
    }


    /* =========================================================
       13) الترحيب
       ========================================================= */

    function startMobsarPage() {

        if (systemStarted) return;

        systemStarted = true;

        updateStatus(
            "مبصر يبدأ التشغيل..."
        );


        speak(
            "مرحبًا بكِ في صفحة قصص الأنبياء والصحابة. أنا مبصر، جاهزة لمساعدتكِ."
        );
    }


    /* =========================================================
       14) أول ضغطة في الصفحة
       
       أول تفاعل:
       الترحيب يبدأ
       وبعده المايك
       ========================================================= */

    document.addEventListener(
        "pointerdown",
        function () {

            if (!systemStarted) {
                startMobsarPage();
            }

        },
        false
    );


    /* =========================================================
       15) السلام عليكم
       ========================================================= */

    addCommandHandler(function (command) {

        if (
            command.includes("السلام عليكم") ||
            command.includes("سلام عليكم")
        ) {

            speak(
                "وعليكم السلام ورحمة الله وبركاته"
            );

            return true;
        }

        return false;
    });


    /* =========================================================
       16) واجهة MOBSAR لباقي الأجزاء
       ========================================================= */

    window.MobsarProphets = {

        speak: speak,

        normalize: normalize,

        startListening: startListening,

        stopListening: stopListening,

        addCommandHandler: addCommandHandler,

        handleVoiceCommand: handleVoiceCommand,

        isStarted: function () {
            return systemStarted;
        },

        isSpeaking: function () {
            return speaking;
        },

        stopSpeaking: stopSpeakingAndListen

    };


    console.log(
        "✅ MOBSAR Part One جاهز"
    );

})();
</script>


    <script>
/* =========================================================
   MOBSAR - PART TWO
   قصص الأنبياء والصحابة
   ========================================================= */

(function () {
    "use strict";

    const Voice = window.MobsarProphets;

    if (!Voice) {
        console.error("Part One غير موجود.");
        return;
    }


    /* =========================================================
       بيانات القصص
       ========================================================= */

    const stories = {

        adam: {
            card: "card-adam",
            content: "content-adam",
            title: "قصة سيدنا آدم عليه السلام",

            names: [
                "ادم",
                "سيدنا ادم",
                "قصة ادم",
                "قصة سيدنا ادم",
                "قصص ادم",
                "قصص سيدنا ادم",
                "قراءة ادم",
                "قراءة سيدنا ادم",
                "قراءة قصة ادم",
                "قراءة قصة سيدنا ادم",
                "اقرا ادم",
                "اقرأ ادم",
                "اقرا سيدنا ادم",
                "اقرأ سيدنا ادم",
                "اقرا قصة ادم",
                "اقرأ قصة ادم",
                "اقرا قصة سيدنا ادم",
                "اقرأ قصة سيدنا ادم"
            ]
        },

        ibrahim: {
            card: "card-ibrahim",
            content: "content-ibrahim",
            title: "قصة سيدنا إبراهيم عليه السلام",

            names: [
                "ابراهيم",
                "سيدنا ابراهيم",
                "قصة ابراهيم",
                "قصة سيدنا ابراهيم",
                "قصص ابراهيم",
                "قصص سيدنا ابراهيم",
                "قراءة ابراهيم",
                "قراءة سيدنا ابراهيم",
                "قراءة قصة ابراهيم",
                "قراءة قصة سيدنا ابراهيم",
                "اقرا ابراهيم",
                "اقرأ ابراهيم",
                "اقرا سيدنا ابراهيم",
                "اقرأ سيدنا ابراهيم",
                "اقرا قصة ابراهيم",
                "اقرأ قصة ابراهيم",
                "اقرا قصة سيدنا ابراهيم",
                "اقرأ قصة سيدنا ابراهيم"
            ]
        },

        mousa: {
            card: "card-mousa",
            content: "content-mousa",
            title: "قصة سيدنا موسى عليه السلام",

            names: [
                "موسى",
                "موسي",
                "سيدنا موسى",
                "سيدنا موسي",
                "قصة موسى",
                "قصة موسي",
                "قصة سيدنا موسى",
                "قصة سيدنا موسي",
                "قصص موسى",
                "قصص سيدنا موسى",
                "قراءة موسى",
                "قراءة سيدنا موسى",
                "اقرا موسى",
                "اقرأ موسى",
                "اقرا سيدنا موسى",
                "اقرأ سيدنا موسى",
                "اقرا قصة موسى",
                "اقرأ قصة موسى"
            ]
        },

        muhammad: {
            card: "card-muhammad",
            content: "content-muhammad",
            title: "قصة سيدنا محمد صلى الله عليه وسلم",

            names: [
                "محمد",
                "سيدنا محمد",
                "قصة محمد",
                "قصة سيدنا محمد",
                "قصص محمد",
                "قصص سيدنا محمد",
                "قراءة محمد",
                "قراءة سيدنا محمد",
                "اقرا محمد",
                "اقرأ محمد",
                "اقرا سيدنا محمد",
                "اقرأ سيدنا محمد",
                "اقرا قصة محمد",
                "اقرأ قصة محمد",
                "اقرا قصة سيدنا محمد",
                "اقرأ قصة سيدنا محمد"
            ]
        },

        issa: {
            card: "card-issa",
            content: "content-issa",
            title: "قصة سيدنا عيسى عليه السلام",

            names: [
                "عيسى",
                "عيسي",
                "سيدنا عيسى",
                "سيدنا عيسي",
                "قصة عيسى",
                "قصة عيسي",
                "قصة سيدنا عيسى",
                "قصص عيسى",
                "قصص سيدنا عيسى",
                "قراءة عيسى",
                "قراءة سيدنا عيسى",
                "اقرا عيسى",
                "اقرأ عيسى",
                "اقرا سيدنا عيسى",
                "اقرأ سيدنا عيسى",
                "اقرا قصة عيسى",
                "اقرأ قصة عيسى"
            ]
        },

        nouh: {
            card: "card-nouh",
            content: "content-nouh",
            title: "قصة سيدنا نوح عليه السلام",

            names: [
                "نوح",
                "سيدنا نوح",
                "قصة نوح",
                "قصة سيدنا نوح",
                "قصص نوح",
                "قصص سيدنا نوح",
                "قراءة نوح",
                "قراءة سيدنا نوح",
                "اقرا نوح",
                "اقرأ نوح",
                "اقرا سيدنا نوح",
                "اقرأ سيدنا نوح",
                "اقرا قصة نوح",
                "اقرأ قصة نوح",
                "اقرا قصة سيدنا نوح",
                "اقرأ قصة سيدنا نوح"
            ]
        },

        youssef: {
            card: "card-youssef",
            content: "content-youssef",
            title: "قصة سيدنا يوسف عليه السلام",

            names: [
                "يوسف",
                "سيدنا يوسف",
                "قصة يوسف",
                "قصة سيدنا يوسف",
                "قصص يوسف",
                "قصص سيدنا يوسف",
                "قراءة يوسف",
                "قراءة سيدنا يوسف",
                "اقرا يوسف",
                "اقرأ يوسف",
                "اقرا سيدنا يوسف",
                "اقرأ سيدنا يوسف",
                "اقرا قصة يوسف",
                "اقرأ قصة يوسف",
                "اقرا قصة سيدنا يوسف",
                "اقرأ قصة سيدنا يوسف"
            ]
        },

        omar: {
            card: "card-omar",
            content: "content-omar",
            title: "قصة عمر بن الخطاب رضي الله عنه",

            names: [
                "عمر",
                "عمر بن الخطاب",
                "سيدنا عمر",
                "قصة عمر",
                "قصة عمر بن الخطاب",
                "قصص عمر",
                "قصص عمر بن الخطاب",
                "قراءة عمر",
                "قراءة قصة عمر",
                "قراءة قصة عمر بن الخطاب",
                "اقرا عمر",
                "اقرأ عمر",
                "اقرا قصة عمر",
                "اقرأ قصة عمر",
                "اقرا قصة عمر بن الخطاب",
                "اقرأ قصة عمر بن الخطاب"
            ]
        }
    };


    /* =========================================================
       الحالة
       ========================================================= */

    let pendingStory = null;
    let readingStory = false;
    let readingParts = [];
    let currentPart = 0;


    /* =========================================================
       CSS للتحديد أثناء القراءة
       ========================================================= */

    const style = document.createElement("style");

    style.textContent = `

        #storiesGrid.mobsar-single-story-mode
        .story-card-box:not(.mobsar-story-active) {
            display: none !important;
        }

        #storiesGrid .mobsar-story-active {
            display: block !important;
            transform: scale(1.02);
            transition: transform .3s ease;
        }

        .mobsar-reading-part {
            padding: 6px 10px;
            margin: 4px 0;
            border-radius: 8px;
            transition: all .2s ease;
        }

        .mobsar-reading-part.active {
            background: rgba(225, 191, 105, .35);
            border-right: 4px solid #e1bf69;
            box-shadow: 0 0 12px rgba(225, 191, 105, .25);
        }

        .mobsar-story-reading {
            box-shadow: 0 0 25px rgba(225, 191, 105, .4);
        }
    `;

    document.head.appendChild(style);


    /* =========================================================
       تنظيف النص
       ========================================================= */

    function normalize(text) {

        return Voice.normalize(text)
            .replace(/عليه السلام/g, "")
            .replace(/صلى الله عليه وسلم/g, "")
            .replace(/رضي الله عنه/g, "")
            .replace(/\s+/g, " ")
            .trim();
    }


    /* =========================================================
       البحث الذكي عن القصة
       ========================================================= */

    function findStory(command) {

        const text = normalize(command);

        /*
         * آدم
         */
        if (
            text.includes("ادم") &&
            !text.includes("ابراهيم") &&
            !text.includes("موسى") &&
            !text.includes("محمد") &&
            !text.includes("عيسى") &&
            !text.includes("نوح") &&
            !text.includes("يوسف")
        ) {
            return "adam";
        }

        /*
         * إبراهيم
         */
        if (text.includes("ابراهيم")) {
            return "ibrahim";
        }

        /*
         * موسى
         */
        if (
            text.includes("موسى") ||
            text.includes("موسي")
        ) {
            return "mousa";
        }

        /*
         * محمد
         */
        if (text.includes("محمد")) {
            return "muhammad";
        }

        /*
         * عيسى
         */
        if (
            text.includes("عيسى") ||
            text.includes("عيسي")
        ) {
            return "issa";
        }

        /*
         * نوح
         */
        if (text.includes("نوح")) {
            return "nouh";
        }

        /*
         * يوسف
         */
        if (text.includes("يوسف")) {
            return "youssef";
        }

        /*
         * عمر
         */
        if (
            text.includes("عمر") ||
            text.includes("عمر بن الخطاب")
        ) {
            return "omar";
        }

        return null;
    }


    /* =========================================================
       فتح كارت واحد فقط
       ========================================================= */

    function openStoryCard(key) {

        const story = stories[key];

        if (!story) return false;

        const grid =
            document.getElementById("storiesGrid");

        const card =
            document.getElementById(story.card);

        const content =
            document.getElementById(story.content);

        if (!grid || !card || !content) {
            return false;
        }


        /*
         * إزالة أي وضع قديم
         */

        grid.classList.remove(
            "mobsar-single-story-mode"
        );


        document
            .querySelectorAll(".mobsar-story-active")
            .forEach(function (element) {
                element.classList.remove(
                    "mobsar-story-active"
                );
            });


        /*
         * فتح القصة المطلوبة
         */

        grid.classList.add(
            "mobsar-single-story-mode"
        );

        card.classList.add(
            "mobsar-story-active"
        );


        content.style.display = "block";


        card.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });


        return true;
    }


    /* =========================================================
       تجهيز النص إلى أجزاء
       ========================================================= */

    function prepareStoryParts(content) {

        /*
         * نحاول تقسيم القصة حسب الفقرات
         */

        let parts = Array.from(
            content.querySelectorAll("p")
        );


        /*
         * لو مفيش p، نستخدم النص الموجود
         */

        if (!parts.length) {

            const text =
                content.innerText.trim();

            if (!text) return [];

            parts = text
                .split(/\n+/)
                .map(function (part) {
                    return part.trim();
                })
                .filter(Boolean);
        }


        /*
         * تحويل الأجزاء إلى عناصر قابلة للتحديد
         */

        const result = [];


        parts.forEach(function (part) {

            let text = "";

            if (typeof part === "string") {
                text = part;
            } else {
                text = part.innerText.trim();
            }

            if (!text) return;

            result.push({
                element:
                    typeof part === "string"
                        ? null
                        : part,
                text: text
            });
        });


        /*
         * لو الـ DOM فيه فقرات فعلًا
         * نستخدمها مباشرة
         */

        result.forEach(function (part) {

            if (part.element) {

                part.element.classList.add(
                    "mobsar-reading-part"
                );
            }
        });


        return result;
    }


    /* =========================================================
       تمييز الجزء الحالي
       ========================================================= */

    function highlightPart(index) {

        readingParts.forEach(function (part, i) {

            if (!part.element) return;

            if (i === index) {

                part.element.classList.add(
                    "active"
                );

                part.element.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });

            } else {

                part.element.classList.remove(
                    "active"
                );
            }
        });
    }


    /* =========================================================
       تنظيف التحديد
       ========================================================= */

    function clearHighlights() {

        document
            .querySelectorAll(".mobsar-reading-part")
            .forEach(function (element) {

                element.classList.remove("active");

            });
    }


    /* =========================================================
       قراءة القصة جزءًا جزءًا
       ========================================================= */

    function readStory(key) {

        const story = stories[key];

        if (!story) return;


        const card =
            document.getElementById(story.card);

        const content =
            document.getElementById(story.content);

        if (!card || !content) return;


        readingParts =
            prepareStoryParts(content);


        if (!readingParts.length) {

            Voice.speak(
                "عذرًا، لم أجد نص القصة."
            );

            return;
        }


        readingStory = true;

        currentPart = 0;

        card.classList.add(
            "mobsar-story-reading"
        );


        readNextPart(key);
    }


    /* =========================================================
       قراءة الجزء التالي
       ========================================================= */

    function readNextPart(key) {

        /*
         * لو حصل إيقاف بالكليك
         * Part One أوقف الكلام
         * وهنا لا نكمل الجزء التالي
         */

        if (!readingStory) {
            return;
        }


        if (currentPart >= readingParts.length) {

            finishStory();

            return;
        }


        const part =
            readingParts[currentPart];


        highlightPart(currentPart);


        /*
         * مهم:
         * نستخدم Voice.speak حتى تظل قاعدة
         * الكليك الموجودة في Part One شغالة.
         */

        Voice.speak(
            part.text,
            function () {

                if (!readingStory) {
                    return;
                }

                currentPart++;

                readNextPart(key);
            }
        );
    }


    /* =========================================================
       إنهاء القصة
       ========================================================= */

    function finishStory() {

        readingStory = false;

        clearHighlights();


        document
            .querySelectorAll(".mobsar-story-reading")
            .forEach(function (card) {

                card.classList.remove(
                    "mobsar-story-reading"
                );
            });


        const grid =
            document.getElementById("storiesGrid");

        if (grid) {

            grid.classList.remove(
                "mobsar-single-story-mode"
            );
        }


        document
            .querySelectorAll(".mobsar-story-active")
            .forEach(function (card) {

                card.classList.remove(
                    "mobsar-story-active"
                );
            });


        pendingStory = null;

        readingParts = [];

        currentPart = 0;

        /*
         * Part One يعيد تشغيل المايك
         * بعد انتهاء Voice.speak().
         */
    }


    /* =========================================================
       نعم / لا
       ========================================================= */

    Voice.addCommandHandler(function (command) {

        if (!pendingStory) {
            return false;
        }


        const text =
            normalize(command);


        /*
         * نعم
         */

        if (
            text === "نعم" ||
            text === "ايوه" ||
            text === "ايوا" ||
            text === "اه" ||
            text === "اها" ||
            text.includes("نعم اريد") ||
            text.includes("ايوه اريد")
        ) {

            const key =
                pendingStory;

            pendingStory = null;

            readStory(key);

            return true;
        }


        /*
         * لا
         */

        if (
            text === "لا" ||
            text.includes("مش عايزه") ||
            text.includes("مش عايز") ||
            text.includes("مش دلوقتي")
        ) {

            pendingStory = null;

            Voice.speak(
                "حاضر، لن أبدأ القراءة الآن."
            );

            return true;
        }


        /*
         * أمر آخر:
         * نخرج من حالة التأكيد
         */

        pendingStory = null;

        return false;
    });


    /* =========================================================
       أوامر القصص
       ========================================================= */

    Voice.addCommandHandler(function (command) {

        /*
         * لو إحنا بنقرأ حاليًا،
         * ما نبدأش قصة جديدة من نفس النتيجة.
         */

        if (readingStory) {
            return false;
        }


        const key =
            findStory(command);


        if (!key) {
            return false;
        }


        const story =
            stories[key];


        if (!openStoryCard(key)) {
            return true;
        }


        pendingStory = key;


        Voice.speak(
            "هل تريدين قراءة " +
            story.title +
            "؟ قولي نعم أو لا."
        );


        return true;
    });


    /* =========================================================
       قراءة اسم الكارت عند مرور الماوس
       ========================================================= */

    Object.keys(stories).forEach(function (key) {

        const story =
            stories[key];

        const card =
            document.getElementById(story.card);

        if (!card) return;


        let lastSpeak = 0;


        card.addEventListener(
            "mouseenter",
            function () {

                /*
                 * لا نقطع قراءة القصة بسبب الماوس
                 */

                if (Voice.isSpeaking()) {
                    return;
                }


                const now =
                    Date.now();


                if (
                    now - lastSpeak < 800
                ) {
                    return;
                }


                lastSpeak = now;


                Voice.speak(
                    story.title
                );
            }
        );

    });


    console.log(
        "✅ Part Two جاهز: التعرف على أسماء القصص + التحديد أثناء القراءة"
    );

})();
</script>



<script>
/* =========================================================
   MOBSAR - PART THREE
   أوامر التنقل بين صفحات MOBSAR
   ========================================================= */

(function () {
    "use strict";

    const Voice = window.MobsarProphets;

    if (!Voice) {
        console.error("Mobsar Part One غير موجود.");
        return;
    }


    /* =========================================================
       صفحات MOBSAR
       ========================================================= */

    const pages = {

        home: {
            file: "index.php",
            names: [
                "الرئيسية",
                "الصفحة الرئيسية",
                "الصفحه الرئيسيه",
                "البيت"
            ]
        },

        register: {
            file: "register.php",
            names: [
                "التسجيل",
                "صفحة التسجيل",
                "التسجيل الجديد",
                "انشاء حساب",
                "إنشاء حساب"
            ]
        },

        tasks: {
            file: "tasks.php",
            names: [
                "المهام",
                "صفحة المهام",
                "قائمة المهام",
                "المهمات"
            ]
        },

        evaluation: {
            file: "evaluation.php",
            names: [
                "التقييم",
                "الإنجازات",
                "الانجازات",
                "التقييم والانجازات",
                "التقييم والإنجازات"
            ]
        },

        schedule: {
            file: "schedule.php",
            names: [
                "المواعيد",
                "صفحة المواعيد",
                "الموعد",
                "المواعيد الخاصة بي"
            ]
        },

        communication: {
            file: "communication.php",
            names: [
                "التواصل",
                "صفحة التواصل",
                "التواصل معنا"
            ]
        },

        notifications: {
            file: "notifications.php",
            names: [
                "إدارة الملفات",
                "ادارة الملفات",
                "الملفات",
                "صفحة الملفات"
            ]
        },

        visual: {
            file: "visual-assistant.php",
            names: [
                "المساعد البصري",
                "المساعد البصري",
                "مثال بصري",
                "البصري"
            ]
        },

        team: {
            file: "team.php",
            names: [
                "الفريق",
                "صفحة الفريق"
            ]
        },

        employees: {
            file: "employees.php",
            names: [
                "الموظفين",
                "الموظفون",
                "الموظفين والمدير",
                "الموظفون والمدير",
                "صفحة الموظفين"
            ]
        },

        settings: {
            file: "settings.php",
            names: [
                "الإعدادات",
                "الاعدادات",
                "صفحة الإعدادات"
            ]
        },

        excel: {
            file: "excel.php",
            names: [
                "اكسل",
                "إكسل",
                "excel"
            ]
        },

        word: {
            file: "word.php",
            names: [
                "وورد",
                "ورد",
                "word"
            ]
        },

        powerpoint: {
            file: "powerpoint.php",
            names: [
                "باوربوينت",
                "باور بوينت",
                "powerpoint"
            ]
        },

        quran: {
            file: "Quran.php",
            names: [
                "القرآن",
                "القران",
                "صفحة القرآن",
                "المصحف"
            ]
        },

        azkar: {
            file: "Azkar.php",
            names: [
                "الأذكار",
                "الاذكار",
                "أذكار",
                "اذكار"
            ]
        },

        hadith: {
            file: "Hadith.php",
            names: [
                "الحديث",
                "الأحاديث",
                "الاحاديث"
            ]
        },

        duaa: {
            file: "Duaa.php",
            names: [
                "الدعاء",
                "الأدعية",
                "الادعية"
            ]
        },

        prayer: {
            file: "Prayer.php",
            names: [
                "الصلاة",
                "الصلاه",
                "صفحة الصلاة"
            ]
        },

        prophets: {
            file: "Prophets.php",
            names: [
                "قصص الأنبياء",
                "قصص الانبياء",
                "الأنبياء",
                "الانبياء",
                "قصص الصحابة",
                "قصص الأنبياء والصحابة"
            ]
        }
    };


    /* =========================================================
       تنظيف الكلام
       ========================================================= */

    function clean(text) {

        return Voice.normalize(text)
            .replace(/\s+/g, " ")
            .trim();
    }


    /* =========================================================
       معرفة الصفحة المطلوبة
       ========================================================= */

    function findPage(command) {

        const text = clean(command);

        for (const key in pages) {

            const page = pages[key];

            for (const name of page.names) {

                const n = clean(name);

                if (
                    text === n ||
                    text.includes(n)
                ) {
                    return key;
                }
            }
        }

        return null;
    }


    /* =========================================================
       استخراج أمر التنقل
       ========================================================= */

    function isNavigationCommand(text) {

        const words = [
            "افتح",
            "روح",
            "روحي",
            "اذهب",
            "اذهبي",
            "انتقل",
            "انقلي",
            "وديني",
            "خذني",
            "خليني",
            "عايز",
            "عايزة",
            "اريد",
            "أريد"
        ];

        return words.some(function (word) {
            return text.includes(clean(word));
        });
    }


    /* =========================================================
       فتح الصفحة
       ========================================================= */

    function openPage(key) {

        const page = pages[key];

        if (!page) return false;


        Voice.speak(
            "حاضر، جاري فتح " +
            page.names[0],
            function () {

                window.location.href =
                    page.file;
            }
        );

        return true;
    }


    /* =========================================================
       أوامر التنقل
       ========================================================= */

    Voice.addCommandHandler(function (command) {

        const text = clean(command);

        const key = findPage(command);

        if (!key) {
            return false;
        }


        /*
         * لو قال اسم الصفحة فقط:
         *
         * "المهام"
         * "الرئيسية"
         * "المواعيد"
         *
         * نعتبره أمر فتح.
         */

        if (
            isNavigationCommand(text) ||
            text === clean(pages[key].names[0])
        ) {

            return openPage(key);
        }


        return false;
    });


    /* =========================================================
       "افتح كل الصفحات"
       ========================================================= */

    Voice.addCommandHandler(function (command) {

        const text = clean(command);

        if (
            text.includes("افتح كل الصفحات") ||
            text.includes("افتح الصفحات كلها") ||
            text.includes("وريني كل الصفحات") ||
            text.includes("اعرض كل الصفحات") ||
            text.includes("قائمة الصفحات") ||
            text.includes("الصفحات المتاحة")
        ) {

            const names = Object.keys(pages)
                .map(function (key) {
                    return pages[key].names[0];
                })
                .join("، ");

            Voice.speak(
                "الصفحات المتاحة هي: " + names
            );

            return true;
        }

        return false;
    });


    /* =========================================================
       معرفة الصفحة الحالية
       ========================================================= */

    Voice.addCommandHandler(function (command) {

        const text = clean(command);

        if (
            text === "انا فين" ||
            text === "أنا فين" ||
            text.includes("انا في اي صفحه") ||
            text.includes("انا فين دلوقتي")
        ) {

            const file =
                window.location.pathname
                    .split("/")
                    .pop()
                    .toLowerCase();


            let currentName = "صفحة غير معروفة";


            for (const key in pages) {

                if (
                    pages[key].file.toLowerCase() === file
                ) {
                    currentName =
                        pages[key].names[0];
                    break;
                }
            }


            Voice.speak(
                "أنتِ الآن في صفحة " +
                currentName
            );

            return true;
        }

        return false;
    });


    /* =========================================================
       التقاط اسم الصورة / الكارت عند المرور عليه
       ========================================================= */

    document.addEventListener(
        "mouseover",
        function (event) {

            const element =
                event.target.closest(
                    "[data-name], [data-title], img[alt], .story-card-box"
                );

            if (!element) return;

            /*
             * أثناء القراءة لا نبدأ كلامًا جديدًا
             */
            if (Voice.isSpeaking()) return;


            let name =
                element.dataset.name ||
                element.dataset.title ||
                element.getAttribute("alt") ||
                element.querySelector(".story-card-title")?.innerText;


            if (!name) return;


            /*
             * منع تكرار نفس الاسم
             */
            if (
                element.dataset.mobsarLastName === name
            ) {
                return;
            }


            element.dataset.mobsarLastName =
                name;


            Voice.speak(name);
        },
        true
    );


    console.log(
        "✅ MOBSAR Part Three - التنقل جاهز"
    );

})();
</script>

</body>
</html>