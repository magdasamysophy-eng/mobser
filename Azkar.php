<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - موسوعة الأذكار الشاملة والكاملة \%</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&family=Cinzel:ital,wght@0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 90px;
            overflow-x: hidden;
        }
        .top-nav-bar { width: 90%; max-width: 1200px; display: flex; justify-content: space-between; padding: 25px 0 0 0; align-items: center; }
        .home-back-btn, .chat-nav-btn, .back-to-cards-btn {
            background: linear-gradient(135deg, #090314, #020104); border: 1px solid #d4af37; color: #d4af37;
            padding: 12px 22px; border-radius: 14px; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.15); cursor: pointer;
        }
        .home-back-btn:hover, .chat-nav-btn:hover, .back-to-cards-btn:hover { background: #d4af37; color: #000000; box-shadow: 0 0 25px rgba(212, 175, 55, 0.7); transform: translateY(-2px); }
        
        .hero-header { text-align: center; padding: 10px 20px 5px 20px; width: 100%; display: flex; flex-direction: column; align-items: center; }
        .mobsar-brand-wrapper { 
            display: inline-flex; flex-direction: column; align-items: center; position: relative; padding: 25px 50px; 
            border-radius: 50%;
            background: radial-gradient(circle, rgba(30, 10, 50, 0.9) 0%, rgba(5, 2, 10, 0.98) 80%);
            box-shadow: 0 0 50px rgba(138, 43, 226, 0.35), inset 0 0 25px rgba(212, 175, 55, 0.25);
            border: 1px solid rgba(212, 175, 55, 0.4);
        }
        .hero-eye-icon { font-size: 5.8rem; color: #d4af37; filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.7)); margin-bottom: -2px; }
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

        /* شبكة الكروت الرئيسية (8 كروت عريضة ومتناسقة) */
        .categories-grid-container {
            width: 90%; max-width: 1200px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .categories-grid-container { grid-template-columns: 1fr; }
        }

        .category-card {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35);
            border-radius: 22px;
            padding: 35px 30px;
            text-align: right;
            cursor: pointer;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 25px;
            transition: 0.35s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.8), 0 0 20px rgba(138, 43, 226, 0.15);
        }

        .category-card:hover {
            border-color: #d4af37;
            box-shadow: 0 0 35px rgba(212, 175, 55, 0.5), inset 0 0 15px rgba(212, 175, 55, 0.2);
            transform: translateY(-6px);
            background: linear-gradient(135deg, rgba(25, 10, 42, 0.98), rgba(8, 3, 16, 0.99));
        }

        .category-icon-box {
            font-size: 3.5rem; color: #d4af37;
            background: rgba(212, 175, 55, 0.1);
            padding: 20px;
            border-radius: 18px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            display: flex; align-items: center; justify-content: center;
            min-width: 90px; min-height: 90px;
        }

        .category-info { display: flex; flex-direction: column; gap: 8px; }
        .category-title { font-size: 1.8rem; font-weight: 700; color: #fef08a; }
        .category-desc { font-size: 1rem; color: #b19cd9; line-height: 1.6; }

        /* أقسام المحتوى الكاملة */
        .content-section {
            display: none;
            width: 90%; max-width: 1200px;
            margin-top: 30px;
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding-bottom: 15px;
        }

        .section-header-bar h2 {
            color: #d4af37;
            font-size: 2.2rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cards-grid { display: flex; flex-direction: column; gap: 20px; }

        .dhikr-card {
            background: rgba(0, 0, 0, 0.75); border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between;
            transition: 0.3s; box-shadow: inset 0 0 20px rgba(138, 43, 226, 0.15);
        }
        .dhikr-card:hover { border-color: rgba(212, 175, 55, 0.8); box-shadow: 0 0 30px rgba(212, 175, 55, 0.35); }
        .dhikr-text { font-size: 1.35rem; color: #ffffff; line-height: 2.4; margin-bottom: 25px; text-align: right; font-weight: 600; }
        .dhikr-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 15px; }
        .dhikr-source { color: #b19cd9; font-size: 1rem; font-style: italic; font-weight: 600; }
        .dhikr-counter-btn { 
            background: rgba(212, 175, 55, 0.25); color: #fef08a; border: 1px solid #d4af37; 
            padding: 10px 22px; border-radius: 25px; font-size: 1.05rem; font-weight: 700; cursor: pointer;
            transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;
        }
        .dhikr-counter-btn:hover { background: #d4af37; color: #000; box-shadow: 0 0 15px #d4af37; }
    </style>
</head>
<body>

    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn"><i class="fa-solid fa-house"></i> الرئيسية</a>
        <a href="communication.php" class="chat-nav-btn"><i class="fa-solid fa-comments"></i> التواصل  <i class="fa-solid fa-bolt" style="color: #d4af37;"></i></a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" id="pageMainTitle"> الأذكار المباركة الشاملة  كبرى</div>
    </div>

    <!-- شبكة الكروت الرئيسية (8 كروت عريضة) -->
    <div class="categories-grid-container" id="mainCategoriesGrid">
        <div class="category-card" onclick="openSection('morningSection', 'أذكار الصباح الشاملة')">
            <div class="category-icon-box"><i class="fa-solid fa-sun" style="color: #fef08a;"></i></div>
            <div class="category-info">
                <div class="category-title">أذكار الصباح</div>
                <div class="category-desc">آية الكرسي، المعوذات، سيد الاستغفار، وكل الأذكار الصباحية مفصلة بحذافيرها.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('eveningSection', 'أذكار المساء الشاملة')">
            <div class="category-icon-box"><i class="fa-solid fa-moon" style="color: #c084fc;"></i></div>
            <div class="category-info">
                <div class="category-title">أذكار المساء</div>
                <div class="category-desc">التحصينات الكاملة للمساء، أمسينا وأمسى الملك لله، وسيد الاستغفار المسائي.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('prophetSection', 'الصلاة على النبي صلى الله عليه وسلم')">
            <div class="category-icon-box"><i class="fa-solid fa-hands-praying" style="color: #f43f5e;"></i></div>
            <div class="category-info">
                <div class="category-title">الصلاة على النبي</div>
                <div class="category-desc">صيغ الصلاة والسلام الإبراهيمية والمباركة على رسول الله صلى الله عليه وسلم.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('prayerSection', 'أذكار الصلاة ودبرها الشاملة')">
            <div class="category-icon-box"><i class="fa-solid fa-mosque" style="color: #38bdf8;"></i></div>
            <div class="category-info">
                <div class="category-title">أذكار الصلاة</div>
                <div class="category-desc">أذكار الاستفتاح، الركوع، السجود، وأذكار دبر الصلوات المكتوبة.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('homeSection', 'أذكار الخروج والدخول للمنزل')">
            <div class="category-icon-box"><i class="fa-solid fa-house-chimney" style="color: #93c5fd;"></i></div>
            <div class="category-info">
                <div class="category-title">الخروج والدخول</div>
                <div class="category-desc">دعاء الخروج من البيت، ودعاء الدخول وبركة الذكر وحماية المنزل.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('sleepSection', 'أذكار النوم والاستيقاظ الشاملة')">
            <div class="category-icon-box"><i class="fa-solid fa-bed" style="color: #a78bfa;"></i></div>
            <div class="category-info">
                <div class="category-title">النوم والاستيقاظ</div>
                <div class="category-desc">ما يقال عند أخذ المضجع، جمع الكفين ونفث المعوذات، وأذكار الاستيقاظ.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('restroomSection', 'أذكار دخول الخلاء والخروج منه')">
            <div class="category-icon-box"><i class="fa-solid fa-restroom" style="color: #fb7185;"></i></div>
            <div class="category-info">
                <div class="category-title">دخول الخلاء</div>
                <div class="category-desc">الاستعاذة عند دخول الخلاء والغفران عند الخروج مفصلة.</div>
            </div>
        </div>

        <div class="category-card" onclick="openSection('tasbihSection', 'التسبيح والاستغفار الشامل')">
            <div class="category-icon-box"><i class="fa-solid fa-dharmachakra" style="color: #4ade80;"></i></div>
            <div class="category-info">
                <div class="category-title">التسبيح والاستغفار</div>
                <div class="category-desc">سبحان الله وبحمده، سبحان الله العظيم، وسيد الاستغفار الشامل.</div>
            </div>
        </div>
    </div>

    <!-- أذكار الصباح الشاملة -->
    <div class="content-section" id="morningSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-sun" style="color: #fef08a;"></i> أذكار الصباح الكاملة 100%</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">اللَّهُ لَا إِلَٰهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ ۚ لَا تَأْخُذُهُ سِنَةٌ وَلَا نَوْمٌ ۚ لَهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الْأَرْضِ ۗ مَنْ ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلَّا بِإِذْنِهِ ۚ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ ۖ وَلَا يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلَّا بِمَا شَاءَ ۚ وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَلْأَرْضَ ۖ وَلَا يَؤُودُهُ حِفْظُهُمَا ۚ وَهُوَ الْعَلِيُّ الْعَظِيمُ.</div>
                <div class="dhikr-footer"><span class="dhikr-source">آية الكرسي - صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ * قُلْ هُوَ اللَّهُ أَحَدٌ * اللَّهُ الصَّمَدُ * لَمْ يَلِدْ وَلَمْ يُولَدْ * وَلَمْ يَكُن لَّهُ كُفُوًا أَحَدٌ. (ثلاث مرات)</div>
                <div class="dhikr-footer"><span class="dhikr-source">سورة الإخلاص</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 3</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ * قُلْ أَعُوذُ بِرَبِّ الْفَلَقِ * مِن شَرِّ ما خَلَقَ * وَمِن شَرِّ غاسِقٍ إِذا وَقَبَ * وَمِن شَرِّ النَّفَّاثاتِ فِي العُقَدِ * وَمِن شَرِّ حاسِدٍ إِذا حَسَدَ. (ثلاث مرات)</div>
                <div class="dhikr-footer"><span class="dhikr-source">سورة الفلق</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 3</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ * قُلْ أَعُوذُ بِرَبِّ النَّاسِ * مَلِكِ النَّاسِ * إِلهِ النَّاسِ * مِن شَرِّ الوَسواسِ الخَنَّاسِ * الَّذي يُوَسوِسُ في صُدورِ النَّاسِ * مِنَ الجِنَّةِ وَالنَّاسِ. (ثلاث مرات)</div>
                <div class="dhikr-footer"><span class="dhikr-source">سورة الناس</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 3</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">أصبحنا وأصبح الملك لله، والحمد لله، لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير، رب أسألك خير ما في هذا اليوم وخير ما بعده، وأعوذ بك من شر ما في هذا اليوم وشر ما بعده.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم أنت ربي لا إله إلا أنت، خلقتني وأنا عبدك، وأنا على عهدك ووعدك ما استطعت، أعوذ بك من شر ما صنعت، أبوء لك بنعمتك علي، وأبوء بذنبي فاغفر لي فإنه لا يغفر الذنوب إلا أنت.</div>
                <div class="dhikr-footer"><span class="dhikr-source">سيد الاستغفار - صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>

    <!-- أذكار المساء الشاملة -->
    <div class="content-section" id="eveningSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-moon" style="color: #c084fc;"></i> أذكار المساء الكاملة 100%</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">اللَّهُ لَا إِلَٰهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ ۚ لَا تَأْخُذُهُ سِنَةٌ وَلَا نَوْمٌ... (آية الكرسي كاملة).</div>
                <div class="dhikr-footer"><span class="dhikr-source">آية الكرسي</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">أمسينا وأمسى الملك لله، والحمد لله، لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير، رب أسألك خير ما في هذه الليلة وخير ما بعدها، وأعوذ بك من شر ما في هذه الليلة وشر ما بعدها.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم بك أمسينا، وبك أصبحنا، وبك نحيا، وبك نموت، وإليك المصير.</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن الترمذي</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم أنت ربي لا إله إلا أنت، خلقتني وأنا عبدك... (سيد الاستغفار المسائي).</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>



    <!-- الصلاة على النبي صلى الله عليه وسلم -->
    <div class="content-section" id="prophetSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-hands-praying" style="color: #f43f5e;"></i> الصلاة على النبي صلى الله عليه وسلم</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم صلِ وسلم وبارك على نبينا محمد وعلى آله وصحبه أجمعين، من صلى علي صلاة صلى الله عليه بها عشراً.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 10</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم صلِ على محمد وعلى آل محمد كما صليت على إبراهيم وعلى آل إبراهيم إنك حميد مجيد، وبارك على محمد وعلى آل محمد كما باركت على إبراهيم وعلى آل إبراهيم في العالمين إنك حميد مجيد.</div>
                <div class="dhikr-footer"><span class="dhikr-source">الصلاة الإبراهيمية - صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم صلِ على محمد وعلى أزواجه وذريته، كما صليت على آل إبراهيم، وبارك على محمد وعلى أزواجه وذريته، كما باركت على آل إبراهيم في العالمين إنك حميد مجيد.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري ومسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>

    <!-- أذكار الصلاة ودبرها الشاملة -->
    <div class="content-section" id="prayerSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-mosque" style="color: #38bdf8;"></i> أذكار الصلاة ودبرها الشاملة 100%</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">أستغفر الله، أستغفر الله، أستغفر الله، اللهم أنت السلام ومنك السلام تباركت يا ذا الجلال والإكرام.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم (يقال بعد السلام من الصلاة مباشرة)</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير، اللهم لا مانع لما أعطيت ولا معطي لما منعت ولا ينفع ذا الجد منك الجد.</div>
                <div class="dhikr-footer"><span class="dhikr-source">متفق عليه</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهي على كل شيء قدير. لا حول ولا قوة إلا بالله، لا إله إلا الله، ولا نعبد إلا إياه، له النعمة وله الفضل وله الثناء الحسن، لا إله إلا الله مخلصين له الدين ولو كره الكافرون.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">سبحان الله (33 مرة)، والحمد لله (33 مرة)، والله أكبر (33 مرة)، وتمت المائة بـ: لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح مسلم - تسبيح دبر الصلوات</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 100</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللَّهُ لَا إِلَٰهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ... (آية الكرسي تقال دبر كل صلاة مكتوبة).</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح الجامع للألباني</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>

    <!-- أذكار الخروج والدخول للمنزل -->
    <div class="content-section" id="homeSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-house-chimney" style="color: #93c5fd;"></i> أذكار الخروج والدخول من المنزل</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">بِسْمِ اللَّهِ، تَوَكَّلْتُ عَلَى اللَّهِ، وَلَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ (يقال عند الخروج من البيت).</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن أبي داود والترمذي (يقال للمخرج: هديت وكفيت ووقيت وتنحى عنه الشيطن)</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم إني أعوذ بك أن أضل أو أضل، أو أزل أو أزل، أو أظلم أو أظلم، أو أجهل أو يجهل علي.</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن أصحاب السنن - دعاء الخروج</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">بِسْمِ اللَّهِ وَلَجْنَا، وَبِسْمِ اللَّهِ خَرَجْنَا، وَعَلَى رَبِّنَا تَوَكَّلْنا، ثُمَّ لِيُسَلِّمْ عَلَى أَهْلِهِ.</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن أبي داود (عند دخول المنزل)</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>

    <!-- أذكار النوم والاستيقاظ الشاملة -->
    <div class="content-section" id="sleepSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-bed" style="color: #a78bfa;"></i> أذكار النوم والاستيقاظ الشاملة</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">جمع الكفين ثم النفث فيهما وقراءة: (قل هو الله أحد) و(قل أعوذ برب الفلق) و(قل أعوذ برب الناس)، ثم مسح بهما ما استطاع من الجسد يبدأ بهما على رأسه وجهه وما أقبل من جسده (يفعل ذلك ثلاث مرات).</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 3</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">باسمك ربي وضعت جنبي وبك أرفعه، إن أمسكت نفسي فارحمها وإن أرسلتها فاحفظها بما تحفظ به عبادك الصالحين.</div>
                <div class="dhikr-footer"><span class="dhikr-source">متفق عليه</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">اللهم أسلمت نفسي إليك، ووجهت وجهي إليك، وفوضت أمري إليك، وألجأت ظهري إليك، رغبة ورهبة إليك، لا ملجأ ولا منجا منك إلا إليك، آمنت بكتابك الذي أنزلت وبنبيك الذي أرسلت.</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري ومسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">الحَمْدُ للّهِ الذي أحيانا بَعْدَ ما أماتَنا وإليه النُّشور (عند الاستيقاظ من النوم).</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>



    <!-- أذكار دخول الخلاء والخروج منه -->
    <div class="content-section" id="restroomSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-restroom" style="color: #fb7185;"></i> أذكار دخول الخلاء والخروج منه</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">(بِسْمِ اللَّهِ) اللهم إني أعوذ بك من الخبث والخبائث (يقال عند دخول الخلاء).</div>
                <div class="dhikr-footer"><span class="dhikr-source">صحيح البخاري ومسلم</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">غُفْرَانَكَ (يقال عند الخروج من الخلاء).</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن أبي داود والترمذي وابن ماجه</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 1</button></div>
            </div>
        </div>
    </div>

    <!-- التسبيح والاستغفار الشامل -->
    <div class="content-section" id="tasbihSection">
        <div class="section-header-bar">
            <h2><i class="fa-solid fa-dharmachakra" style="color: #4ade80;"></i> التسبيح والاستغفار الشامل 100%</h2>
            <button class="back-to-cards-btn" onclick="backToMain()"><i class="fa-solid fa-arrow-right"></i> عودة للأقسام الرئيسية</button>
        </div>
        <div class="cards-grid">
            <div class="dhikr-card">
                <div class="dhikr-text">سبحان الله وبحمده، سبحان الله العظيم. (كلمتان خفيفيـان على اللسان، ثقيلتان في الميزان، حبيبتان إلى الرحمن).</div>
                <div class="dhikr-footer"><span class="dhikr-source">متفق عليه</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 100</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">أستغفر الله العظيم الذي لا إله إلا هو الحي القيوم وأتوب إليه. (من قالها غفر له وإن كان فر وان من الزحف).</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن أبي داود والترمذي</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 100</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">لا إله إلا أنت سبحان إني كنت من الظالمين. (دعوة ذي النون إذ دعا بها في بطن الحوت).</div>
                <div class="dhikr-footer"><span class="dhikr-source">سنن الترمذي</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 100</button></div>
            </div>
            <div class="dhikr-card">
                <div class="dhikr-text">سبحان الله، والحمد لله، ولا إله إلا الله، والله أكبر، ولا حول ولا قوة إلا بالله. (الباقيات الصالحات).</div>
                <div class="dhikr-footer"><span class="dhikr-source">مسند أحمد وصحيح الجامع</span><button class="dhikr-counter-btn">العداد: <span class="count-num">0</span> / 100</button></div>
            </div>
        </div>
    </div>

<script>
(function () {
    "use strict";

    // ==========================================
    // MOBSAR VOICE CORE
    // الجزء الأول: الترحيب + التحكم في الكلام والمايك
    // ==========================================

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        console.error("❌ المتصفح لا يدعم التعرف على الصوت");
        return;
    }

    let recognition = null;

    // هل نظام الصوت بدأ؟
    let started = false;

    // هل مبصر يتكلم الآن؟
    let isSpeaking = false;

    // هل حدث أول تفاعل مع الصفحة؟
    let firstStarted = false;

    // هل الكلام متوقف مؤقتًا بسبب ضغط المستخدم؟
    let speechPaused = false;

    // النص الحالي الذي يتحدث به مبصر
    let currentSpeechText = "";

    // مكان التوقف داخل الكلام
    let speechPosition = 0;

    const handlers = [];


    // ==========================================
    // تطبيع الكلام العربي
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
    // إيقاف الميكروفون
    // ==========================================

    function stopRecognition() {

        if (!recognition) return;

        try {
            recognition.stop();
        } catch (e) {}
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

        if (speechPaused) return;

        try {

            recognition.start();

            console.log("🎙️ مبصر يستمع...");

        } catch (error) {

            // لو الميكروفون شغال بالفعل
            console.log(
                "🎙️ الميكروفون يعمل بالفعل."
            );
        }
    }


    // ==========================================
    // إنشاء نظام التعرف على الصوت
    // ==========================================

    function createRecognition() {

        recognition =
            new SpeechRecognition();

        recognition.lang = "ar-EG";

        // نستخدم false حتى نعيد تشغيل الاستماع
        // بعد كل جملة بشكل آمن.
        recognition.continuous = false;

        recognition.interimResults = false;

        recognition.maxAlternatives = 5;


        // --------------------------------------
        // بدأ الاستماع
        // --------------------------------------

        recognition.onstart = function () {

            console.log(
                "🎙️ مبصر بدأ الاستماع"
            );
        };


        // --------------------------------------
        // نتيجة الصوت
        // --------------------------------------

        recognition.onresult = function (event) {

            if (isSpeaking) return;

            const text =
                event.results[0][0]
                    .transcript
                    .trim();

            console.log(
                "🎙️ مبصر سمع:",
                text
            );


            for (
                const handler
                of handlers
            ) {

                try {

                    if (
                        handler(text) === true
                    ) {
                        return;
                    }

                } catch (error) {

                    console.error(
                        "❌ خطأ في الأمر الصوتي:",
                        error
                    );
                }
            }
        };


        // --------------------------------------
        // انتهاء الاستماع
        // --------------------------------------

        recognition.onend = function () {

            console.log(
                "🎙️ الميكروفون انتهى"
            );


            if (
                started &&
                !isSpeaking &&
                !speechPaused
            ) {

                setTimeout(
                    startListening,
                    400
                );
            }
        };


        // --------------------------------------
        // أخطاء الميكروفون
        // --------------------------------------

        recognition.onerror =
            function (event) {

                console.log(
                    "🎙️ خطأ الميكروفون:",
                    event.error
                );


                if (
                    started &&
                    !isSpeaking &&
                    !speechPaused &&
                    event.error !==
                        "not-allowed" &&
                    event.error !==
                        "service-not-allowed"
                ) {

                    setTimeout(
                        startListening,
                        1000
                    );
                }
            };
    }


    // ==========================================
    // الكلام الصوتي
    // ==========================================

    function speak(text) {

        if (!text) return;

        currentSpeechText = String(text);

        speechPosition = 0;

        speechPaused = false;

        isSpeaking = true;


        // إيقاف الميكروفون أثناء كلام مبصر
        stopRecognition();


        // إلغاء أي كلام قديم
        window.speechSynthesis.cancel();


        const utterance =
            new SpeechSynthesisUtterance(
                currentSpeechText
            );


        utterance.lang = "ar-EG";

        utterance.rate = 0.9;

        utterance.pitch = 1;


        // --------------------------------------
        // متابعة مكان الكلام
        // --------------------------------------

        utterance.onboundary =
            function (event) {

                if (
                    typeof event.charIndex ===
                    "number"
                ) {

                    speechPosition =
                        event.charIndex;
                }
            };


        // --------------------------------------
        // انتهى الكلام
        // --------------------------------------

        utterance.onend =
            function () {

                if (speechPaused) {
                    return;
                }


                isSpeaking = false;

                speechPosition =
                    currentSpeechText.length;


                console.log(
                    "🔊 مبصر انتهى من الكلام"
                );


                // بعد انتهاء كلام مبصر
                // يرجع الميكروفون للاستماع
                if (started) {

                    setTimeout(
                        startListening,
                        500
                    );
                }
            };


        // --------------------------------------
        // الكلام بدأ
        // --------------------------------------

        utterance.onstart =
            function () {

                console.log(
                    "🔊 مبصر يتحدث..."
                );
            };


        window.speechSynthesis.speak(
            utterance
        );
    }


    // ==========================================
    // الضغط على الشاشة أثناء كلام مبصر
    // ==========================================

    function handleScreenClick() {

        // لو مبصر لا يتكلم
        // لا نفعل شيئًا.
        if (!isSpeaking) {
            return;
        }


        // --------------------------------------
        // لو مبصر يتكلم → أوقفه
        // --------------------------------------

        if (!speechPaused) {

            speechPaused = true;

            isSpeaking = false;


            window.speechSynthesis.cancel();

            stopRecognition();


            console.log(
                "⏸️ تم إيقاف مبصر مؤقتًا"
            );


            // بعد الضغط، المايك يشتغل
            // حتى نسمع أمر المستخدم.
            setTimeout(
                startListening,
                300
            );


            return;
        }
    }


    // ==========================================
    // استكمال الكلام بعد أمر المستخدم
    // ==========================================

    function resumeSpeech() {

        if (!currentSpeechText) {
            return;
        }


        speechPaused = false;

        isSpeaking = true;


        stopRecognition();


        const remainingText =
            currentSpeechText.substring(
                speechPosition
            );


        if (!remainingText.trim()) {

            isSpeaking = false;

            startListening();

            return;
        }


        const utterance =
            new SpeechSynthesisUtterance(
                remainingText
            );


        utterance.lang = "ar-EG";

        utterance.rate = 0.9;

        utterance.pitch = 1;


        utterance.onend =
            function () {

                if (speechPaused) {
                    return;
                }


                isSpeaking = false;

                speechPosition =
                    currentSpeechText.length;


                if (started) {

                    setTimeout(
                        startListening,
                        500
                    );
                }
            };


        utterance.onboundary =
            function (event) {

                if (
                    typeof event.charIndex ===
                    "number"
                ) {

                    speechPosition +=
                        event.charIndex;
                }
            };


        window.speechSynthesis.speak(
            utterance
        );
    }


    // ==========================================
    // إضافة أمر صوتي
    // ==========================================

    function addHandler(handler) {

        if (
            typeof handler ===
            "function"
        ) {

            handlers.push(handler);

            console.log(
                "✅ تم توصيل أمر صوتي جديد"
            );
        }
    }


    // ==========================================
    // أول ضغطة في الصفحة
    // ==========================================

    function firstInteraction() {

        if (firstStarted) {
            return;
        }


        firstStarted = true;

        started = true;


        console.log(
            "👋 تشغيل ترحيب مبصر"
        );


        speak(
            "السلام عليكم ورحمة الله وبركاته. مرحبا بك في مبصر، أهلا وسهلا بك."
        );
    }


    // ==========================================
    // أي ضغطة على الشاشة
    // ==========================================

    document.addEventListener(
        "click",
        function (event) {

            // أول ضغطة تشغل الترحيب
            if (!firstStarted) {

                firstInteraction();

                return;
            }


            // بعد الترحيب:
            // الضغط أثناء الكلام = إيقاف مؤقت
            if (isSpeaking) {

                handleScreenClick();

                return;
            }


            // لو الكلام متوقف مؤقتًا
            // والمايك يستمع، لا نكمل بمجرد
            // أي ضغطة حتى لا يحصل تعارض.
        }
    );


    // ==========================================
    // النظام العام
    // ==========================================

    window.MobsarVoiceCore = {

        start: function () {

            started = true;

            startListening();
        },


        stop: function () {

            started = false;

            speechPaused = false;

            isSpeaking = false;


            stopRecognition();

            window.speechSynthesis.cancel();
        },


        speak: speak,

        normalize: normalize,

        addHandler: addHandler,

        getRecognition:
            function () {
                return recognition;
            },


        isSpeaking:
            function () {
                return isSpeaking;
            },


        isPaused:
            function () {
                return speechPaused;
            },


        resumeSpeech:
            resumeSpeech
    };


    console.log(
        "✅ MOBSAR VOICE CORE جاهز"
    );

})();
</script>


<script>
(function () {
    "use strict";

    // ==========================================
    // الجزء الثاني: السلام عليكم
    // ==========================================

    function normalize(text) {

        return window
            .MobsarVoiceCore
            .normalize(text);
    }


    function salamHandler(text) {

        const command =
            normalize(text);


        if (
            command.includes(
                "السلام عليكم"
            ) ||
            command.includes(
                "سلام عليكم"
            )
        ) {

            window.MobsarVoiceCore.speak(

                "وعليكم السلام ورحمة الله وبركاته. مرحبا بك في مصر."
            );


            return true;
        }


        return false;
    }


    if (
        window.MobsarVoiceCore
    ) {

        window.MobsarVoiceCore.addHandler(
            salamHandler
        );


        console.log(
            "✅ الجزء الثاني: السلام عليكم جاهز"
        );

    } else {

        console.error(
            "❌ MobsarVoiceCore غير موجود"
        );
    }

})();
</script>





<script>
(function () {
    "use strict";

    // ==========================================
    // الجزء الثاني: السلام عليكم
    // ==========================================

    function normalize(text) {
        return window.MobsarVoiceCore.normalize(text);
    }

    function salamHandler(text) {

        const command = normalize(text);

        // --------------------------------------
        // المستخدم قال: السلام عليكم
        // --------------------------------------

        if (
            command.includes("السلام عليكم") ||
            command.includes("سلام عليكم")
        ) {

            window.MobsarVoiceCore.speak(
                "وعليكم السلام ورحمة الله وبركاته. مرحبا بك في مصر."
            );

            return true;
        }

        return false;
    }


    // ==========================================
    // توصيل الجزء الثاني بالـ Voice Core
    // ==========================================

    if (window.MobsarVoiceCore) {

        window.MobsarVoiceCore.addHandler(
            salamHandler
        );

        console.log(
            "✅ الجزء الثاني: السلام عليكم جاهز"
        );

    } else {

        console.error(
            "❌ MobsarVoiceCore غير موجود"
        );
    }

})();
</script>

<script>
(function () {
    "use strict";

    // ==========================================
    // MOBSAR
    // التنقل الصوتي بين صفحات المشروع
    // ==========================================

    function normalize(text) {
        return window.MobsarVoiceCore.normalize(text);
    }


    // ==========================================
    // فتح الصفحة
    // ==========================================

    function goToPage(file, pageName) {

        window.MobsarVoiceCore.speak(
            "حاضر، جاري فتح صفحة " + pageName
        );

        setTimeout(function () {
            window.location.href = file;
        }, 700);
    }


    // ==========================================
    // أوامر التنقل
    // ==========================================

    function pageNavigationHandler(text) {

        const command = normalize(text);


        // ------------------------------------------
        // الرئيسية
        // ------------------------------------------

        if (
            command === "الرئيسيه" ||
            command.includes("افتح الرئيسيه") ||
            command.includes("روح الرئيسيه") ||
            command.includes("اذهب للرئيسيه") ||
            command.includes("وديني للرئيسيه") ||
            command.includes("صفحه الرئيسيه")
        ) {

            goToPage(
                "index.php",
                "الرئيسية"
            );

            return true;
        }


        // ------------------------------------------
        // المهام
        // ------------------------------------------

        if (
            command === "المهام" ||
            command.includes("افتح المهام") ||
            command.includes("روح المهام") ||
            command.includes("اذهب للمهام") ||
            command.includes("وديني للمهام") ||
            command.includes("صفحه المهام")
        ) {

            goToPage(
                "tasks.php",
                "المهام"
            );

            return true;
        }


        // ------------------------------------------
        // التسجيل
        // ------------------------------------------

        if (
            command === "التسجيل" ||
            command.includes("افتح التسجيل") ||
            command.includes("روح التسجيل") ||
            command.includes("اذهب للتسجيل") ||
            command.includes("وديني للتسجيل") ||
            command.includes("صفحه التسجيل")
        ) {

            goToPage(
                "register.php",
                "التسجيل"
            );

            return true;
        }


        // ------------------------------------------
        // الروحانيات
        // ------------------------------------------

        if (
            command === "الروحانيات" ||
            command.includes("افتح الروحانيات") ||
            command.includes("روح الروحانيات") ||
            command.includes("اذهب للروحانيات") ||
            command.includes("وديني للروحانيات")
        ) {

            goToPage(
                "team.php",
                "الروحانيات"
            );

            return true;
        }


        // ------------------------------------------
        // الأنبياء
        // ------------------------------------------

        if (
            command.includes("الانبياء") ||
            command.includes("افتح الانبياء") ||
            command.includes("روح الانبياء") ||
            command.includes("اذهب للانبياء") ||
            command.includes("صفحه الانبياء")
        ) {

            goToPage(
                "Prophets.php",
                "الأنبياء"
            );

            return true;
        }


        // ------------------------------------------
        // الأدعية
        // ------------------------------------------

        if (
            command.includes("الادعيه") ||
            command.includes("الدعاء") ||
            command.includes("افتح الادعيه") ||
            command.includes("روح الادعيه") ||
            command.includes("اذهب للادعيه")
        ) {

            goToPage(
                "Duaa.php",
                "الأدعية"
            );

            return true;
        }


        // ------------------------------------------
        // القرآن
        // ------------------------------------------

        if (
            command.includes("القران") ||
            command.includes("القرآن") ||
            command.includes("المصحف") ||
            command.includes("افتح القران") ||
            command.includes("روح القران")
        ) {

            goToPage(
                "Quran.php",
                "القرآن"
            );

            return true;
        }


        // ------------------------------------------
        // الأحاديث
        // ------------------------------------------

        if (
            command.includes("الاحاديث") ||
            command.includes("الحديث") ||
            command.includes("افتح الاحاديث") ||
            command.includes("روح الاحاديث")
        ) {

            goToPage(
                "Hadith.php",
                "الأحاديث"
            );

            return true;
        }


        // ------------------------------------------
        // الصلاة
        // ------------------------------------------

        if (
            command === "الصلاه" ||
            command.includes("افتح الصلاه") ||
            command.includes("روح الصلاه") ||
            command.includes("اذهب للصلاه")
        ) {

            goToPage(
                "Prayer.php",
                "الصلاة"
            );

            return true;
        }


        // ------------------------------------------
        // Excel
        // ------------------------------------------

        if (
            command.includes("اكسل") ||
            command.includes("excel") ||
            command.includes("افتح اكسل") ||
            command.includes("روح اكسل")
        ) {

            goToPage(
                "excel.php",
                "Excel"
            );

            return true;
        }


        // ------------------------------------------
        // Word
        // ------------------------------------------

        if (
            command.includes("وورد") ||
            command.includes("word") ||
            command.includes("افتح وورد") ||
            command.includes("روح وورد")
        ) {

            goToPage(
                "word.php",
                "Word"
            );

            return true;
        }


        // ------------------------------------------
        // PowerPoint
        // ------------------------------------------

        if (
            command.includes("باوربوينت") ||
            command.includes("باور بوينت") ||
            command.includes("powerpoint") ||
            command.includes("افتح باوربوينت") ||
            command.includes("روح باوربوينت")
        ) {

            goToPage(
                "powerpoint.php",
                "PowerPoint"
            );

            return true;
        }


        // ------------------------------------------
        // موسى الشريف
        // ------------------------------------------

        if (
            command.includes("موسى الشريف") ||
            command.includes("موسي الشريف") ||
            command.includes("افتح موسى الشريف") ||
            command.includes("روح موسى الشريف")
        ) {

            goToPage(
                "mosa.php",
                "موسى الشريف"
            );

            return true;
        }


        return false;
    }


    // ==========================================
    // تسجيل نظام التنقل
    // ==========================================

    if (window.MobsarVoiceCore) {

        window.MobsarVoiceCore.addHandler(
            pageNavigationHandler
        );

        console.log(
            "✅ نظام التنقل بين الصفحات جاهز"
        );

    } else {

        console.error(
            "❌ MobsarVoiceCore غير موجود"
        );
    }

})();
</script>

<script>
(function () {
    "use strict";

    // ==========================================
    // الجزء الثالث
    // فتح جميع أقسام الأذكار
    // ==========================================

    function normalize(text) {
        return window.MobsarVoiceCore.normalize(text);
    }

    function openSection(sectionId, title) {

        const mainGrid =
            document.getElementById("mainCategoriesGrid");

        const pageTitle =
            document.getElementById("pageMainTitle");

        const sections =
            document.querySelectorAll(".content-section");

        const section =
            document.getElementById(sectionId);

        if (!section) {
            console.error(
                "❌ القسم غير موجود: " + sectionId
            );
            return;
        }

        // إخفاء الصفحة الرئيسية
        if (mainGrid) {
            mainGrid.style.display = "none";
        }

        // إخفاء كل الأقسام
        sections.forEach(function (item) {
            item.style.display = "none";
        });

        // إظهار القسم المطلوب
        section.style.display = "block";

        // تغيير العنوان
        if (pageTitle) {
            pageTitle.innerText = title;
        }

        // حفظ القسم الحالي
        window.MobsarAzkarCurrentSection = sectionId;

        // الرجوع لأعلى الصفحة
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        // ======================================
        // تشغيل قارئ الأذكار
        // ======================================

        setTimeout(function () {

            if (window.MobsarAzkarReader) {

                window.MobsarAzkarReader.start(
                    sectionId
                );

            } else {

                console.error(
                    "❌ قارئ الأذكار غير موجود"
                );
            }

        }, 400);
    }


    // ==========================================
    // أذكار الصباح
    // ==========================================

    function openMorning() {

        openSection(
            "morningSection",
            "أذكار الصباح"
        );
    }


    // ==========================================
    // أذكار المساء
    // ==========================================

    function openEvening() {

        openSection(
            "eveningSection",
            "أذكار المساء"
        );
    }


    // ==========================================
    // الصلاة على النبي
    // ==========================================

    function openProphet() {

        openSection(
            "prophetSection",
            "الصلاة على النبي"
        );
    }


    // ==========================================
    // أذكار الصلاة
    // ==========================================

    function openPrayer() {

        openSection(
            "prayerSection",
            "أذكار الصلاة"
        );
    }


    // ==========================================
    // الخروج والدخول
    // ==========================================

    function openHome() {

        openSection(
            "homeSection",
            "الخروج والدخول"
        );
    }


    // ==========================================
    // النوم والاستيقاظ
    // ==========================================

    function openSleep() {

        openSection(
            "sleepSection",
            "النوم والاستيقاظ"
        );
    }


    // ==========================================
    // دخول الخلاء
    // ==========================================

    function openRestroom() {

        openSection(
            "restroomSection",
            "دخول الخلاء"
        );
    }


    // ==========================================
    // التسبيح والاستغفار
    // ==========================================

    function openTasbih() {

        openSection(
            "tasbihSection",
            "التسبيح والاستغفار"
        );
    }


    // ==========================================
    // معالجة الأوامر الصوتية
    // ==========================================

    function azkarNavigationHandler(text) {

        const command =
            normalize(text);


        // -------------------------------
        // أذكار الصباح
        // -------------------------------

        if (
            command.includes("اذكار الصباح") ||
            command.includes("اذكار صباح") ||
            command.includes("اذكار الصبح") ||
            command.includes("اذكار صباحي") ||
            command.includes("افتح اذكار الصباح") ||
            command.includes("افتح اذكار صباح") ||
            command.includes("افتح اذكار الصبح") ||
            command.includes("روح اذكار الصباح") ||
            command.includes("روح اذكار صباح") ||
            command.includes("اذهب لاذكار الصباح") ||
            command.includes("اذهب لاذكار صباح") ||
            command.includes("وديني لاذكار الصباح")
        ) {

            openMorning();

            return true;
        }


        // -------------------------------
        // أذكار المساء
        // -------------------------------

        if (
            command.includes("اذكار المساء") ||
            command.includes("اذكار مساء") ||
            command.includes("اذكار المسا") ||
            command.includes("اذكار الليل") ||
            command.includes("افتح اذكار المساء") ||
            command.includes("افتح اذكار مساء") ||
            command.includes("روح اذكار المساء") ||
            command.includes("اذهب لاذكار المساء") ||
            command.includes("وديني لاذكار المساء")
        ) {

            openEvening();

            return true;
        }


        // -------------------------------
        // الصلاة على النبي
        // -------------------------------

        if (
            command.includes("الصلاة على النبي") ||
            command.includes("الصلاه على النبي") ||
            command.includes("صلاه على النبي") ||
            command.includes("صل على النبي") ||
            command.includes("افتح الصلاة على النبي") ||
            command.includes("افتح الصلاه على النبي") ||
            command.includes("روح الصلاة على النبي") ||
            command.includes("اذهب للصلاة على النبي")
        ) {

            openProphet();

            return true;
        }


        // -------------------------------
        // أذكار الصلاة
        // -------------------------------

        if (
            command.includes("اذكار الصلاة") ||
            command.includes("اذكار الصلاه") ||
            command.includes("بعد الصلاة") ||
            command.includes("بعد الصلاه") ||
            command.includes("افتح اذكار الصلاة") ||
            command.includes("روح اذكار الصلاة") ||
            command.includes("اذكار بعد الصلاة")
        ) {

            openPrayer();

            return true;
        }


        // -------------------------------
        // الخروج والدخول
        // -------------------------------

        if (
            command.includes("الخروج والدخول") ||
            command.includes("الدخول والخروج") ||
            command.includes("اذكار الخروج والدخول") ||
            command.includes("اذكار الدخول والخروج") ||
            command.includes("اذكار البيت") ||
            command.includes("افتح الخروج والدخول") ||
            command.includes("روح الخروج والدخول")
        ) {

            openHome();

            return true;
        }


        // -------------------------------
        // النوم والاستيقاظ
        // -------------------------------

        if (
            command.includes("النوم والاستيقاظ") ||
            command.includes("اذكار النوم") ||
            command.includes("اذكار الاستيقاظ") ||
            command.includes("اذكار النوم والاستيقاظ") ||
            command.includes("افتح اذكار النوم") ||
            command.includes("روح اذكار النوم") ||
            command.includes("اذكار قبل النوم")
        ) {

            openSleep();

            return true;
        }


        // -------------------------------
        // دخول الخلاء
        // -------------------------------

        if (
            command.includes("دخول الخلاء") ||
            command.includes("اذكار الخلاء") ||
            command.includes("اذكار الحمام") ||
            command.includes("دعاء دخول الخلاء") ||
            command.includes("افتح دخول الخلاء") ||
            command.includes("روح دخول الخلاء")
        ) {

            openRestroom();

            return true;
        }


        // -------------------------------
        // التسبيح والاستغفار
        // -------------------------------

        if (
            command.includes("التسبيح والاستغفار") ||
            command.includes("التسبيح") ||
            command.includes("الاستغفار") ||
            command.includes("اذكار التسبيح") ||
            command.includes("اذكار الاستغفار") ||
            command.includes("افتح التسبيح") ||
            command.includes("روح التسبيح")
        ) {

            openTasbih();

            return true;
        }


        return false;
    }


    // ==========================================
    // تسجيل الجزء الثالث
    // ==========================================

    if (window.MobsarVoiceCore) {

        window.MobsarVoiceCore.addHandler(
            azkarNavigationHandler
        );

        console.log(
            "✅ الجزء الثالث كامل جاهز"
        );

    } else {

        console.error(
            "❌ MobsarVoiceCore غير موجود"
        );
    }

})();
</script>





<script>
(function () {
    "use strict";

    // ==========================================
    // الجزء الرابع
    // قارئ جميع أقسام الأذكار
    // ==========================================

    let currentSectionId = null;
    let currentCardIndex = 0;
    let currentCount = 0;

    let waitingReady = false;
    let waitingConfirm = false;


    // ==========================================
    // الحصول على القسم الحالي
    // ==========================================

    function getSection() {

        if (!currentSectionId) {
            currentSectionId =
                window.MobsarAzkarCurrentSection;
        }

        if (!currentSectionId) {
            return null;
        }

        return document.getElementById(
            currentSectionId
        );
    }


    // ==========================================
    // الحصول على الكروت
    // ==========================================

    function getCards() {

        const section = getSection();

        if (!section) return [];

        return Array.from(
            section.querySelectorAll(".dhikr-card")
        );
    }


    // ==========================================
    // نص الذكر
    // ==========================================

    function getText(card) {

        if (!card) return "";

        const element =
            card.querySelector(".dhikr-text");

        return element
            ? element.innerText.trim()
            : "";
    }


    // ==========================================
    // العدد المطلوب
    // ==========================================

    function getTarget(card) {

        if (!card) return 1;

        const counter =
            card.querySelector(".count-num");

        if (!counter) return 1;

        const text =
            counter.innerText || "";

        const match =
            text.match(/\/\s*(\d+)/);

        return match
            ? parseInt(match[1], 10)
            : 1;
    }


    // ==========================================
    // العداد الحالي
    // ==========================================

    function getCount(card) {

        if (!card) return 0;

        const counter =
            card.querySelector(".count-num");

        if (!counter) return 0;

        const text =
            counter.innerText || "";

        const match =
            text.match(/^(\d+)/);

        return match
            ? parseInt(match[1], 10)
            : 0;
    }


    // ==========================================
    // تحديث العداد
    // ==========================================

    function setCount(card, count) {

        if (!card) return;

        const counter =
            card.querySelector(".count-num");

        if (!counter) return;

        const target =
            getTarget(card);

        counter.innerText =
            count + " / " + target;
    }


    // ==========================================
    // تحديث الألوان
    // ==========================================

    function updateColors() {

        const cards = getCards();

        cards.forEach(function (card, index) {

            card.classList.remove(
                "mobsar-current-dhikr",
                "mobsar-completed-dhikr",
                "mobsar-unread-dhikr"
            );


            // المكتمل
            if (index < currentCardIndex) {

                card.classList.add(
                    "mobsar-completed-dhikr"
                );
            }


            // الحالي
            else if (index === currentCardIndex) {

                card.classList.add(
                    "mobsar-current-dhikr"
                );
            }


            // لم نصل إليه
            else {

                card.classList.add(
                    "mobsar-unread-dhikr"
                );
            }
        });
    }


    // ==========================================
    // تحريك الذكر الحالي لأعلى الشاشة
    // ==========================================

    function focusCurrent(card) {

        if (!card) return;

        setTimeout(function () {

            const rect =
                card.getBoundingClientRect();

            const top =
                window.scrollY +
                rect.top;

            window.scrollTo({
                top: Math.max(
                    0,
                    top - 120
                ),
                behavior: "smooth"
            });

        }, 150);
    }


    // ==========================================
    // بدء أي قسم
    // ==========================================

    function start(sectionId) {

        currentSectionId =
            sectionId;

        currentCardIndex = 0;
        currentCount = 0;

        waitingReady = true;
        waitingConfirm = false;

        updateColors();


        window.MobsarVoiceCore.speak(
            "تم فتح القسم. أول ذكر جاهز. هل أنت جاهزة؟ قولي نعم."
        );
    }


    // ==========================================
    // قراءة الذكر الحالي
    // ==========================================

    function readCurrent() {

        const cards = getCards();

        if (!cards.length) {

            window.MobsarVoiceCore.speak(
                "لا توجد أذكار في هذا القسم."
            );

            return;
        }


        if (
            currentCardIndex >=
            cards.length
        ) {

            finish();

            return;
        }


        const card =
            cards[currentCardIndex];

        const text =
            getText(card);


        if (!text) {

            console.error(
                "❌ نص الذكر غير موجود"
            );

            return;
        }


        updateColors();
        focusCurrent(card);

        waitingReady = false;
        waitingConfirm = true;


        window.MobsarVoiceCore.speak(
            text +
            ". هل قرأت أنت؟ قولي قرأت أو أعيد."
        );
    }


    // ==========================================
    // المستخدم قال: قرأت
    // ==========================================

    function confirmRead() {

        const cards = getCards();

        const card =
            cards[currentCardIndex];

        if (!card) return;


        const target =
            getTarget(card);

        currentCount =
            getCount(card);


        if (currentCount < target) {
            currentCount++;
        }


        setCount(
            card,
            currentCount
        );


        // ======================================
        // ما زال يحتاج تكرار
        // ======================================

        if (currentCount < target) {

            waitingReady = true;
            waitingConfirm = false;

            updateColors();
            focusCurrent(card);


            window.MobsarVoiceCore.speak(
                "أحسنت. " +
                currentCount +
                " من " +
                target +
                ". هل أنت جاهزة للتكرار التالي؟ قولي نعم."
            );

            return;
        }


        // ======================================
        // اكتمل الذكر
        // ======================================

        card.classList.remove(
            "mobsar-current-dhikr"
        );

        card.classList.add(
            "mobsar-completed-dhikr"
        );


        currentCardIndex++;
        currentCount = 0;

        waitingReady = true;
        waitingConfirm = false;


        const nextCards =
            getCards();


        if (
            currentCardIndex >=
            nextCards.length
        ) {

            finish();

            return;
        }


        updateColors();


        window.MobsarVoiceCore.speak(
            "أحسنت. اكتمل الذكر. " +
            "الذكر التالي جاهز. هل أنت جاهزة؟ قولي نعم."
        );
    }


    // ==========================================
    // إعادة الذكر
    // ==========================================

    function repeatCurrent() {

        waitingReady = false;
        waitingConfirm = true;

        readCurrent();
    }


    // ==========================================
    // نعم
    // ==========================================

    function ready() {

        waitingReady = false;
        waitingConfirm = false;

        readCurrent();
    }


    // ==========================================
    // لا
    // ==========================================

    function notReady() {

        waitingReady = false;

        window.MobsarVoiceCore.speak(
            "تمام، سأنتظر حتى تكوني جاهزة."
        );
    }


    // ==========================================
    // انتهاء القسم
    // ==========================================

    function finish() {

        waitingReady = false;
        waitingConfirm = false;

        updateColors();

        window.MobsarVoiceCore.speak(
            "ما شاء الله. لقد انتهينا من هذا القسم."
        );
    }


    // ==========================================
    // الأوامر الصوتية
    // ==========================================

    function readerHandler(text) {

        const command =
            window.MobsarVoiceCore.normalize(
                text
            );


        // --------------------------------------
        // نعم / جاهزة
        // --------------------------------------

        if (waitingReady) {

            if (
                command === "نعم" ||
                command === "ايوه" ||
                command === "ايوا" ||
                command === "اه" ||
                command.includes("جاهزه") ||
                command.includes("انا جاهزه") ||
                command.includes("تمام")
            ) {

                ready();

                return true;
            }


            // لا
            if (
                command === "لا" ||
                command.includes("مش جاهزه")
            ) {

                notReady();

                return true;
            }
        }


        // --------------------------------------
        // قرأت
        // --------------------------------------

        if (waitingConfirm) {

            if (
                command.includes("قريت") ||
                command.includes("قرات") ||
                command.includes("انا قريت") ||
                command.includes("انا قرات") ||
                command.includes("خلصت") ||
                command.includes("تمت القراءه")
            ) {

                confirmRead();

                return true;
            }


            // ----------------------------------
            // أعيد
            // ----------------------------------

            if (
                command.includes("اعيد") ||
                command.includes("اعيدي") ||
                command === "عيد" ||
                command === "عيدي"
            ) {

                repeatCurrent();

                return true;
            }
        }


        return false;
    }


    // ==========================================
    // CSS الألوان
    // ==========================================

    const style =
        document.createElement("style");

    style.innerHTML = `

        .mobsar-current-dhikr {
            background: #e1bf69 !important;
            color: #000 !important;
            border: 3px solid #ffffff !important;
            transition: all 0.3s ease;
        }

        .mobsar-completed-dhikr {
            background: #4caf50 !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }

        .mobsar-unread-dhikr {
            background: #b71c1c !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }

    `;

    document.head.appendChild(style);


    // ==========================================
    // تسجيل النظام
    // ==========================================

    if (window.MobsarVoiceCore) {

        window.MobsarVoiceCore.addHandler(
            readerHandler
        );

        console.log(
            "✅ الجزء الرابع كامل جاهز"
        );

    } else {

        console.error(
            "❌ MobsarVoiceCore غير موجود"
        );
    }


    // ==========================================
    // إتاحة التحكم للجزء الثالث
    // ==========================================

    window.MobsarAzkarReader = {

        start: start,

        read: readCurrent,

        repeat: repeatCurrent,

        confirm: confirmRead,

        ready: ready,

        stop: notReady,

        finish: finish,

        updateColors: updateColors
    };

})();
</script>








</body>
</html>