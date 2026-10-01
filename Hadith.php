<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موسوعة مبصر - الأحاديث النبوية الشريفة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #000000;
            background-image: radial-gradient(circle at 50% 15%, #150529 0%, #05020a 50%, #000000 90%); 
            min-height: 100vh; color: #e5e7eb; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
            overflow-x: hidden; cursor: pointer;
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
        .hadith-container { width: 90%; max-width: 900px; display: flex; flex-direction: column; gap: 22px; margin-top: 25px; }
        .card-box {
            background: linear-gradient(135deg, rgba(15, 6, 26, 0.95), rgba(3, 1, 6, 0.98)); backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.35); border-radius: 22px; padding: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95), 0 0 30px rgba(138, 43, 226, 0.15), inset 0 0 25px rgba(212, 175, 55, 0.08);
            transition: 0.3s; position: relative;
        }
        .card-box:hover { border-color: rgba(212, 175, 55, 0.7); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.98), 0 0 40px rgba(212, 175, 55, 0.25); transform: translateY(-2px); }
        .hadith-text { font-size: 1.35rem; color: #ffffff; line-height: 1.9; font-weight: 600; margin-bottom: 18px; text-align: right; text-shadow: 0 0 10px rgba(255, 255, 255, 0.1); }
        .hadith-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(212, 175, 55, 0.2); padding-top: 15px; font-size: 0.95rem; }
        .source-badge { background: rgba(138, 43, 226, 0.2); color: #e9d5ff; border: 1px solid #8b5cf6; padding: 5px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 700; box-shadow: 0 0 10px rgba(139, 92, 246, 0.2); }
        .section-category-title { color: #d4af37; font-size: 1.5rem; margin: 25px 0 10px 0; font-weight: 700; text-align: right; border-bottom: 2px solid rgba(212, 175, 55, 0.3); padding-bottom: 8px; width: 100%; text-shadow: 0 0 10px rgba(212, 175, 55, 0.3); }
        .click-hint-banner { position: fixed; bottom: 15px; left: 50%; transform: translateX(-50%); background: rgba(15, 6, 26, 0.9); border: 1px solid #d4af37; padding: 8px 20px; border-radius: 20px; color: #d8b4fe; font-size: 0.9rem; font-weight: 600; box-shadow: 0 0 15px rgba(138, 43, 226, 0.3); z-index: 1000; pointer-events: none; }
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
        <div class="sub-title" onmouseenter="speakQuick('الأحاديث النبوية الشريفة الموثوقة')">الأحاديث النبوية الشريفة الموثوقة</div>
    </div>

    <div class="click-hint-banner">
        <i class="fa-solid fa-hand-pointer" style="color: #d4af37;"></i> اضغطي في أي مكان بالشاشة لتفعيل المساعد الصوتي وتلقي الأوامر فوراً
    </div>

    <div class="hadith-container">

        <div class="section-category-title" onmouseenter="speakQuick('باب الإيمان والتوحيد والعقيدة')">
            <i class="fa-solid fa-star-and-crescent"></i> باب الإيمان والتوحيد والعقيدة
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ، وَإِنَّمَا لِكُلِّ امْرِئٍ مَا نَوَى، فَمَنْ كَانَتْ هِجْرَتُهُ إِلَى دُنْيَا يُصِيبُهَا، أَوْ إِلَى امْرَأَةٍ يَنْكِحُهَا، فَهِجْرَتُهُ إِلَى مَا هَاجَرَ إِلَيْهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (1)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«بُنِيَ الإِسْلامُ عَلَى خَمْسٍ: شَهَادَةِ أَنْ لا إِلَهَ إِلا اللَّهُ وَأَنَّ مُحَمَّدًا رَسُولُ اللَّهِ، وَإِقَامِ الصَّلاةِ، وَإِيتَاءِ الزَّكَاةِ، وَالحَجِّ، وَصَوْمِ رَمَضَانَ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (8) وصحيح مسلم (16)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«الإِيمَانُ بِضْعٌ وَسَبْعُونَ - أَوْ بِضْعٌ وَسِتُّونَ - شُعْبَةً، فَأَفْضَلُهَا قَوْلُ لا إِلَهَ إِلا اللَّهُ، وَأَدْنَاهَا إِمَاطَةُ الأَذَى عَنِ الطَّرِيقِ، وَالحَيَاءُ شُعْبَةٌ مِنَ الإِيمَانِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (9) وصحيح مسلم (35)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«لا يُؤْمِنُ أَحَدُكُمْ حَتَّى أَكُونَ أَحَبَّ إِلَيْهِ مِنْ وََالِدِهِ وَوَلَدِهِ وَالنَّاسِ أَجْمَعِينَ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (15) وصحيح مسلم (44)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«ثَلاثٌ مَنْ كُنَّ فِيهِ وَجَدَ حَلَاوَةَ الإِيمَانِ: أَنْ يَكُونَ اللَّهُ وَرَسُولُهُ أَحَبَّ إِلَيْهِ مِمَّا سِوَاهُمَا، وَأَنْ يُحِبَّ الْمَرْءَ لَا يُحِبُّهُ إِلَّا لِلَّهِ، وَأَنْ يَكْرَهَ أَنْ يَعُودَ فِي الْكُفْرِ كَمَا يَكْرَهُ أَنْ يُقْذَفَ فِي النَّارِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (21) وصحيح مسلم (43)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«آيَةُ الْمُنافِقِ ثَلاثٌ: إِذَا حَدَّثَ كَذَبَ، وَإِذَا وَعَدَ أَخْلَفَ، وَإِذَا اوْتُمِنَ خَانَ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (33) وصحيح مسلم (59)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ قَامَ رَمَضَانَ إِيمَانًا وَاحْتِسَابًا غُفِرَ لَهُ مَا تَقَدَّمَ مِنْ ذَنْبِهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (37) وصحيح مسلم (760)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ صَامَ رَمَضَانَ إِيمَانًا وَاحْتِسَابًا غُفِرَ لَهُ مَا تَقَدَّمَ مِنْ ذَنْبِهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (38)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«الدِّينُ النَّصِيحَةُ. قُلْنَا: لِمَنْ؟ قَالَ: لِلَّهِ وَلِكِتَابِهِ وَلِرَسُولِهِ وَلِأَئِمَّةِ الْمُسْلِمِينَ وَعَامَّتِهِمْ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (55)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«الْمُسْلِمُ مَنْ سَلِمَ الْمُسْلِمُونَ مِنْ لِسَانِهِ وَيَدِهِ، وَالْمُهَاجِرُ مَنْ هَجَرَ مَا نَهَى اللَّهُ عَنْهُ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (10) وصحيح مسلم (41)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="section-category-title" onmouseenter="speakQuick('باب العلم وفضل طلب العلم')">
            <i class="fa-solid fa-book-open"></i> باب العلم وفضل طلب العلم
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ يُرِدِ اللَّهُ بِهِ خَيْرًا يُفَقِّهْهُ فِي الدِّينِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (71) وصحيح مسلم (1037)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«نَضَّرَ اللَّهُ امْرَأً سَمِعَ مِنَّا شَيْئًا فَبَلَّغَهُ كَمَا سَمِعَهُ، فَرُبَّ مُبَلَّغٍ أَوْعَى مِنْ سَامِعٍ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح الترمذي (2657) وصححه الألباني</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (5027)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ سَلَكَ طَرِيقًا يَلْتَمِسُ فِيهِ عِلْمًا سَهَّلَ اللَّهُ لَهُ بِهِ طَرِيقًا إِلَى الْجَنَّةِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (2699)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«إِذَا مَاتَ الإِنْسَانُ انْقَطَعَ عَنْهُ عَمَلُهُ إِلا مِنْ ثَلاثَةٍ: صَدَقَةٍ جَارِيَةٍ، أَوْ عِلْمٍ يُنْتَفَعُ بِهِ، أَوْ وَلَدٍ صَالِحٍ يَدْعُو لَهُ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (1631)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

    </div>

    <div class="hadith-container">

        <div class="section-category-title" onmouseenter="speakQuick('باب الطهارة والصلاة')">
            <i class="fa-solid fa-kaaba"></i> باب الطهارة والصلاة
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«الطُّهُورُ شَطْرُ الإِيمَانِ، وَالحَمْدُ لِلَّهِ تَمْلأُ المِيزَانَ، وَسُبْحَانَ اللَّهِ وَالحَمْدُ لِلَّهِ تَمْلآنِ - أَوْ تَمْلأُ - مَا بَيْنَ السَّمَاوَاتِ وَالأَرْضِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (223)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ تَوَضَّأَ فَأَحْسَنَ الْوُضُوءَ خَرَجَ خَطَايَاهُ مِنْ جَسَدِهِ، حَتَّى تَخْرُجَ مِنْ تَحْتِ أَظْفَارِهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (245)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«رَأْسُ الأَمْرِ الإِسْلامُ، وَعَمُودُهُ الصَّلاةُ، وَذِرْوَةُ سَنَامِهِ الجِهَادُ فِي السَّبِيلِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح الترمذي (2616) وصححه الألباني</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«أَحَبُّ الأَعْمَالِ إِلَى اللَّهِ الصَّلاةُ لِوَقْتِهَا، ثُمَّ بِرُّ الْوَالِدَيْنِ، ثُمَّ الْجِهَادُ فِي سَبِيلِ اللَّهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (527) وصحيح مسلم (85)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«صَلَاةُ الْجَمَاعَةِ تَفْضُلُ صَلَاةَ الْفَذِّ بِسَبْعٍ وَعِشْرِينَ دَرَجَةً»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (645) وصحيح مسلم (650)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ صَلَّى الْبَرْدَيْنِ دَخَلَ الْجَنَّةَ» (الْبَرْدَيْنِ هُمَا: الْفَجْرَ وَالْعَصْرَ)</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (574) وصحيح مسلم (635)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«بَشِّرِ الْمَشَّائِينَ فِي الظُّلَمِ إِلَى الْمَسَاجِدِ بِالنُّورِ التَّامِّ يَوْمَ الْقِيَامَةِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح أبي داود (561) وصحيح الترمذي (223)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="section-category-title" onmouseenter="speakQuick('باب الأخلاق والآداب والمعاملات')">
            <i class="fa-solid fa-heart"></i> باب الأخلاق والآداب والمعاملات
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«إِنَّ مِنْ خِيَارِكُمْ أَحْسَنَكُمْ أَخْلَاقًا»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (6035) وصحيح مسلم (2321)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«لَا يُؤْمِنُ أَحَدُكُمْ حَتَّى يُحِبَّ لِأَخِيهِ مَا يُحِبُّ لِنَفْسِهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (13) وصحيح مسلم (45)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ كَانَ يُؤْمِنُ بِاللَّهِ وَالْيَوْمِ الْآخِرِ فَلْيَقُلْ خَيْرًا أَوْ لِيَصْمُتْ، وَمَنْ كَانَ يُؤْمِنُ بِاللَّهِ وَالْيَوْمِ الْآخِرِ فَلْيُكْرِمْ جَارَهُ، وَمَنْ كَانَ يُؤْمِنُ بِاللَّهِ وَالْيَوْمِ الْآخِرِ فَلْيُكْرِمْ ضَيْفَهُ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (6018) وصحيح مسلم (47)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«لَيْسَ الشَّدِيدُ بِالصُّرَعَةِ، إِنَّمَا الشَّدِيدُ الَّذِي يَمْلِكُ نَفْسَهُ عِنْدَ الْغَضَبِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (6114) وصحيح مسلم (2609)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«الرَّاحِمُونَ يَرْحَمُهُمُ الرَّحْمَنُ، ارْحَمُوا مَنْ فِي الْأَرْضِ يَرْحَمْكُمْ مَنْ فِي السَّمَاءِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح الترمذي (1924) وصحيح أبي داود (4941)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ لَا يَرْحَمُ لَا يُرْحَمُ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (5997) وصحيح مسلم (2318)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«اَتَّقِ اللَّهَ حَيْثُمَا كُنْتَ، وَأَتْبِعِ السَّيِّئَةَ الْحَسَنَةَ تَمْحُهَا، وَخَالِقِ النَّاسَ بِخُلُقٍ حَسَنٍ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح الترمذي (1987) وصححه الألباني</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

    </div>
    <div class="hadith-container">

        <div class="section-category-title" onmouseenter="speakQuick('باب الذكر والدعاء والاستغفار')">
            <i class="fa-solid fa-hands-praying"></i> باب الذكر والدعاء والاستغفار
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«كَلِمَتَانِ خَفِيفَتَانِ عَلَى اللِّسَانِ، ثَقِيلَتَانِ فِي الْمِيزَانِ، حَبِيبَتَانِ إِلَى الرَّحْمَنِ: سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، سُبْحَانَ اللَّهِ الْعَظِيمِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (6682) وصحيح مسلم (2694)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ قَالَ: سُبْحَانَ اللَّهِ وَبِحَمْدِهِ فِي يَوْمٍ مِائَةَ مَرَّةٍ حُطَّتْ خَطَايَاهُ وَإِنْ كَانَتْ مِثْلَ زَبَدِ الْبَحْرِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (6405) وصحيح مسلم (2691)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«أَلَا أَدُلُّكَ عَلَى كَنْزٍ مِنْ كُنُوزِ الْجَنَّةِ؟ فَقُلْتُ: بَلَى يَا رَسُولَ اللَّهِ، قَالَ: لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح البخاري (4205) وصحيح مسلم (2704)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«إِنَّ لِلَّهِ مَلَائِكَةً يَطُورُونَ فِي الطُّرُقِ يَلْتَمِسُونَ أَهْلَ الذِّكْرِ... فَيَقُولُ الرَّبُّ عَزَّ وَجَلَّ: أُشْهِدُكُمْ أَنِّي قَدْ غَفَرْتُ لَهُمْ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح مسلم (2689)</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

        <div class="card-box" onmouseenter="speakCardText(this)" onclick="speakCardText(this)">
            <div class="hadith-text">«مَنْ سَأَلَ اللَّهَ الْجَنَّةَ ثَلَاثَ مَرَّاتٍ قَالَتِ الْجَنَّةُ: اللَّهُمَّ أَدْخِلْهُ الْجَنَّةَ، وَمَنْ اسْتَجَارَ مِنَ النَّارِ ثَلَاثَ مَرَّاتٍ قَالَتِ النَّارُ: اللَّهُمَّ أَجِرْهُ مِنَ النَّارِ»</div>
            <div class="hadith-footer">
                <span class="source-badge">صحيح الترمذي (2572) وصححه الألباني</span>
                <span style="color: #9ca3af;"><i class="fa-solid fa-volume-high" style="color: #d4af37;"></i> انقر للاستماع</span>
            </div>
        </div>

    </div>

    <div class="click-hint-banner">
        <i class="fa-solid fa-microphone-lines" style="color: #d4af37;"></i> المساعد الصوتي مستعد لتلقي الأوامر والتنقل بين الصفحات بشكل دائم
    </div>


<script>
/* =========================================================
   MOBSAR VOICE - PART 1
   تشغيل الصوت + الترحيب + الاستماع المستمر
   ========================================================= */

(function () {
    "use strict";

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        console.error("المتصفح لا يدعم التعرف على الصوت.");
        return;
    }

    const recognition = new SpeechRecognition();

    recognition.lang = "ar-EG";
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.maxAlternatives = 5;

    let started = false;
    let speaking = false;
    let firstClickDone = false;

    const handlers = [];

    /* ---------------------------------------------------------
       إضافة أوامر من Part 2
       --------------------------------------------------------- */

    function addHandler(handler) {
        if (typeof handler === "function") {
            handlers.push(handler);
        }
    }

    /* ---------------------------------------------------------
       تنظيف الكلام العربي
       --------------------------------------------------------- */

    function normalize(text) {
        return String(text || "")
            .toLowerCase()
            .replace(/[ًٌٍَُِّْـ]/g, "")
            .replace(/[إأآا]/g, "ا")
            .replace(/ى/g, "ي")
            .replace(/ة/g, "ه")
            .replace(/[^\u0600-\u06FF0-9\s]/g, "")
            .replace(/\s+/g, " ")
            .trim();
    }

    /* ---------------------------------------------------------
       الكلام
       --------------------------------------------------------- */

    function speak(text, callback) {

        if (!text) return;

        speaking = true;

        try {
            recognition.stop();
        } catch (e) {}

        window.speechSynthesis.cancel();

        const utterance =
            new SpeechSynthesisUtterance(text);

        utterance.lang = "ar-EG";
        utterance.rate = 0.9;
        utterance.pitch = 1;

        utterance.onend = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            if (started) {
                setTimeout(startListening, 350);
            }
        };

        utterance.onerror = function () {

            speaking = false;

            if (typeof callback === "function") {
                callback();
            }

            if (started) {
                setTimeout(startListening, 500);
            }
        };

        window.speechSynthesis.speak(utterance);
    }

    /* ---------------------------------------------------------
       تشغيل الاستماع
       --------------------------------------------------------- */

    function startListening() {

        if (!started || speaking) return;

        try {
            recognition.start();
        } catch (e) {
            // منع خطأ already started
        }
    }

    /* ---------------------------------------------------------
       نتيجة الكلام
       --------------------------------------------------------- */

    recognition.onresult = function (event) {

        const result =
            event.results[event.results.length - 1];

        if (!result) return;

        const text =
            result[0].transcript.trim();

        if (!text) return;

        console.log("MOBSAR:", text);

        const normalized =
            normalize(text);

        /* إرسال الكلام إلى أوامر Part 2 */

        for (const handler of handlers) {

            try {

                const handled =
                    handler(normalized, text);

                if (handled === true) {
                    return;
                }

            } catch (error) {

                console.error(
                    "Voice Handler Error:",
                    error
                );
            }
        }

        /* -----------------------------------------------------
           السلام
           ----------------------------------------------------- */

        if (
            normalized.includes("السلام عليكم") ||
            normalized.includes("سلام عليكم")
        ) {

            speak(
                "وعليكم السلام ورحمة الله وبركاته"
            );

            return;
        }

    };

    /* ---------------------------------------------------------
       عند انتهاء التعرف على الكلام
       --------------------------------------------------------- */

    recognition.onend = function () {

        if (
            started &&
            !speaking
        ) {

            setTimeout(
                startListening,
                350
            );
        }
    };

    recognition.onerror = function (event) {

        console.log(
            "Voice error:",
            event.error
        );

        if (
            started &&
            !speaking
        ) {

            setTimeout(
                startListening,
                700
            );
        }
    };

    /* ---------------------------------------------------------
       أول ضغطة في الصفحة
       --------------------------------------------------------- */

    function activateVoice() {

        if (firstClickDone) return;

        firstClickDone = true;
        started = true;

        speak(
            "السلام عليكم ورحمة الله وبركاته. مرحبا بك في الصفحة الإدارية. مبصر معك، ويمكنك الآن التحدث بالأوامر الصوتية."
        );
    }

    document.addEventListener(
        "click",
        activateVoice,
        {
            once: true,
            passive: true
        }
    );

    /* ---------------------------------------------------------
       API الذي سيستخدمه Part 2
       --------------------------------------------------------- */

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

            try {
                recognition.stop();
            } catch (e) {}

            window.speechSynthesis.cancel();
        },

        isSpeaking: function () {
            return speaking;
        },

        isStarted: function () {
            return started;
        }
    };

})();
</script>


<script>
/* =========================================================
   MOBSAR HADITH - PART 2
   الأبواب + الأجزاء + القراءة + المتابعة
   ========================================================= */

(function () {

    "use strict";

    if (!window.MobsarVoiceCore) {
        console.error(
            "MobsarVoiceCore غير موجود. ضعي Part 1 أولاً."
        );
        return;
    }

    const Voice = window.MobsarVoiceCore;

    let chapters = [];
    let currentChapter = null;
    let currentPart = null;

    let chapterIndex = -1;
    let partIndex = 0;

    let waitingReady = false;
    let waitingRepeat = false;

    /* =========================================================
       CSS
       ========================================================= */

    const style = document.createElement("style");

    style.textContent = `

        /* الجزء الذي تتم قراءته */
        .mobsar-reading-part {

            background:
                rgba(30, 100, 255, 0.25) !important;

            border:
                2px solid #3b82f6 !important;

            box-shadow:
                0 0 25px rgba(59,130,246,0.45);

            opacity: 1 !important;

            transform:
                scale(1.015);

            transition:
                all 0.5s ease;

            position: relative;

            z-index: 10;
        }


        /* الجزء الذي تم الانتهاء منه */
        .mobsar-finished-part {

            background:
                rgba(34,197,94,0.22) !important;

            border:
                2px solid rgba(34,197,94,0.55) !important;

            opacity: 0.65 !important;

            box-shadow:
                0 0 12px rgba(34,197,94,0.15);

            transition:
                all 0.5s ease;
        }


        /* الأجزاء التي لم يأت دورها */
        .mobsar-waiting-part {

            opacity: 0.35 !important;

            transition:
                all 0.5s ease;
        }


        /* عنوان الباب الحالي */
        .mobsar-current-chapter {

            color: #60a5fa !important;

            text-shadow:
                0 0 12px rgba(59,130,246,0.6);

            transition:
                all 0.5s ease;
        }

    `;

    document.head.appendChild(style);


    /* =========================================================
       قراءة الأبواب من HTML
       ========================================================= */

    function scanPage() {

        chapters = [];

        const titles =
            document.querySelectorAll(
                ".section-category-title"
            );

        titles.forEach((title, index) => {

            const chapter = {

                name: title.innerText
                    .replace(/\s+/g, " ")
                    .trim(),

                titleElement: title,

                parts: []
            };

            let element =
                title.nextElementSibling;

            while (element) {

                if (
                    element.classList.contains(
                        "section-category-title"
                    )
                ) {
                    break;
                }

                if (
                    element.classList.contains(
                        "card-box"
                    )
                ) {

                    const textElement =
                        element.querySelector(
                            ".hadith-text"
                        );

                    if (textElement) {

                        chapter.parts.push({

                            element: element,

                            text: textElement.innerText
                                .replace(/\s+/g, " ")
                                .trim(),

                            source:
                                element.querySelector(
                                    ".source-badge"
                                )?.innerText
                                ?.replace(/\s+/g, " ")
                                .trim() || ""
                        });
                    }
                }

                element =
                    element.nextElementSibling;
            }

            chapters.push(chapter);
        });

        console.log(
            "MOBSAR HADITH CHAPTERS:",
            chapters
        );
    }


    /* =========================================================
       إظهار الأبواب
       ========================================================= */

    function speakChapters() {

        scanPage();

        if (!chapters.length) {

            Voice.speak(
                "لم أجد أبواب الأحاديث في الصفحة."
            );

            return;
        }

        let text =
            "الأبواب الموجودة هي: ";

        chapters.forEach(
            (chapter, index) => {

                text +=
                    `الباب ${index + 1}: ${chapter.name}. `;
            }
        );

        Voice.speak(text);
    }


    /* =========================================================
       البحث عن الباب
       ========================================================= */

    function findChapter(command) {

        const normalized =
            Voice.normalize(command);

        for (const chapter of chapters) {

            const name =
                Voice.normalize(chapter.name);

            if (
                normalized.includes(name) ||
                name.includes(normalized)
            ) {

                return chapter;
            }
        }

        /* كلمات مختصرة */

        const words = [

            ["الايمان", "التوحيد", "العقيده"],

            ["العلم", "طلب العلم"],

            ["الطهاره", "الصلاه", "الوضوء"],

            ["الاخلاق", "الاداب", "المعاملات"],

            ["الذكر", "الدعاء", "الاستغفار"]
        ];

        for (
            let i = 0;
            i < words.length;
            i++
        ) {

            for (const word of words[i]) {

                if (
                    normalized.includes(
                        Voice.normalize(word)
                    )
                ) {

                    if (chapters[i]) {
                        return chapters[i];
                    }
                }
            }
        }

        return null;
    }


    /* =========================================================
       اختيار الباب
       ========================================================= */

    function chooseChapter(chapter) {

        if (!chapter) return;

        currentChapter = chapter;

        chapterIndex =
            chapters.indexOf(chapter);

        partIndex = 0;

        waitingReady = false;
        waitingRepeat = false;

        /* إعادة ضبط الشكل */

        chapters.forEach(ch => {

            ch.titleElement.classList.remove(
                "mobsar-current-chapter"
            );

            ch.parts.forEach(part => {

                part.element.classList.remove(
                    "mobsar-reading-part",
                    "mobsar-finished-part",
                    "mobsar-waiting-part"
                );

                part.element.style.opacity =
                    "0.35";
            });
        });

        chapter.titleElement.classList.add(
            "mobsar-current-chapter"
        );

        chapter.titleElement.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

        Voice.speak(
            `تم اختيار ${chapter.name}. عدد الأجزاء في هذا الباب ${chapter.parts.length}.`
        );

        setTimeout(
            readCurrentPart,
            1800
        );
    }


    /* =========================================================
       تجهيز شكل الأجزاء
       ========================================================= */

    function prepareParts() {

        if (!currentChapter) return;

        currentChapter.parts.forEach(
            (part, index) => {

                part.element.classList.remove(
                    "mobsar-reading-part",
                    "mobsar-finished-part"
                );

                if (
                    index < partIndex
                ) {

                    part.element.classList.add(
                        "mobsar-finished-part"
                    );

                } else if (
                    index > partIndex
                ) {

                    part.element.classList.add(
                        "mobsar-waiting-part"
                    );
                }
            }
        );
    }


    /* =========================================================
       قراءة الجزء الحالي
       ========================================================= */

    function readCurrentPart() {

        if (!currentChapter) return;

        const parts =
            currentChapter.parts;

        /* انتهى الباب */

        if (
            partIndex >= parts.length
        ) {

            finishChapter();

            return;
        }

        currentPart =
            parts[partIndex];

        prepareParts();

        /* الجزء الحالي أزرق */

        currentPart.element.classList.remove(
            "mobsar-finished-part",
            "mobsar-waiting-part"
        );

        currentPart.element.classList.add(
            "mobsar-reading-part"
        );

        currentPart.element.scrollIntoView({

            behavior: "smooth",

            block: "start"
        });

        waitingReady = false;
        waitingRepeat = false;

        let speech =
            `الحديث ${partIndex + 1}. `;

        speech += currentPart.text;

        if (currentPart.source) {

            speech +=
                ` المصدر: ${currentPart.source}.`;
        }

        Voice.speak(
            speech,
            function () {

                setTimeout(
                    askAfterReading,
                    500
                );
            }
        );
    }


    /* =========================================================
       السؤال بعد القراءة
       ========================================================= */

    function askAfterReading() {

        waitingRepeat = true;

        Voice.speak(
            "هل قرأتِ؟ قولي نعم أو قرأت، أو قولي لا أو عيد."
        );
    }


    /* =========================================================
       إنهاء الجزء
       ========================================================= */

    function finishCurrentPart() {

        if (!currentPart) return;

        currentPart.element.classList.remove(
            "mobsar-reading-part"
        );

        currentPart.element.classList.add(
            "mobsar-finished-part"
        );

        currentPart.element.style.opacity =
            "0.65";

        waitingRepeat = false;

        Voice.speak(
            "بارك الله فيك، أحسنتِ. هل أنتِ جاهزة نكمل؟"
        );

        waitingReady = true;
    }


    /* =========================================================
       الانتقال للجزء التالي
       ========================================================= */

    function nextPart() {

        waitingReady = false;

        partIndex++;

        setTimeout(
            readCurrentPart,
            700
        );
    }


    /* =========================================================
       إعادة الجزء
       ========================================================= */

    function repeatCurrentPart() {

        waitingReady = false;
        waitingRepeat = false;

        Voice.speak(
            "حاضر، سأعيده."
        );

        setTimeout(
            readCurrentPart,
            900
        );
    }


    /* =========================================================
       انتهاء الباب
       ========================================================= */

    function finishChapter() {

        if (!currentChapter) return;

        currentChapter.parts.forEach(
            part => {

                part.element.classList.remove(
                    "mobsar-reading-part",
                    "mobsar-waiting-part"
                );

                part.element.classList.add(
                    "mobsar-finished-part"
                );

                part.element.style.opacity =
                    "0.65";
            }
        );

        Voice.speak(
            `انتهى ${currentChapter.name}. بارك الله فيك، أحسنتِ.`
        );

        currentChapter = null;

        currentPart = null;

        chapterIndex = -1;

        partIndex = 0;

        waitingReady = false;

        waitingRepeat = false;
    }


    /* =========================================================
       معالج الأوامر الصوتية
       ========================================================= */

    Voice.addHandler(
        function (command) {

            if (!command) return false;

            const text =
                Voice.normalize(command);


            /* -----------------------------------------------
               سؤال: إيه الأبواب الموجودة؟
               ----------------------------------------------- */

            if (
                text.includes("ايه الابواب") ||
                text.includes("ما هي الابواب") ||
                text.includes("الابواب الموجوده") ||
                text.includes("ابواب الاحاديث") ||
                text.includes("اي الابواب")
            ) {

                speakChapters();

                return true;
            }


            /* -----------------------------------------------
               هل تريدين الاستماع للأحاديث؟
               ----------------------------------------------- */

            if (
                text.includes("الاحاديث الموجوده") ||
                text.includes("ايه الاحاديث")
            ) {

                speakChapters();

                return true;
            }


            /* -----------------------------------------------
               أثناء انتظار نعم / لا
               ----------------------------------------------- */

            if (
                currentChapter &&
                waitingRepeat
            ) {

                if (
                    text === "نعم" ||
                    text === "ايوه" ||
                    text === "أيوه" ||
                    text === "قرأت" ||
                    text === "قريت" ||
                    text === "تم"
                ) {

                    finishCurrentPart();

                    return true;
                }

                if (
                    text === "لا" ||
                    text === "عيد" ||
                    text === "اعيد" ||
                    text === "أعيد"
                ) {

                    repeatCurrentPart();

                    return true;
                }
            }


            /* -----------------------------------------------
               أثناء انتظار هل أنتِ جاهزة؟
               ----------------------------------------------- */

            if (
                currentChapter &&
                waitingReady
            ) {

                if (
                    text === "نعم" ||
                    text === "ايوه" ||
                    text === "أيوه" ||
                    text.includes("جاهزه") ||
                    text.includes("جاهزة") ||
                    text.includes("نكمل") ||
                    text.includes("كملي")
                ) {

                    nextPart();

                    return true;
                }

                if (
                    text === "لا" ||
                    text.includes("مش جاهزه") ||
                    text.includes("لست جاهزه") ||
                    text.includes("مش جاهزة")
                ) {

                    Voice.speak(
                        "تمام، سأنتظر حتى تقولي جاهزة."
                    );

                    return true;
                }
            }


            /* -----------------------------------------------
               اختيار باب
               ----------------------------------------------- */

            const chapter =
                findChapter(text);

            if (chapter) {

                chooseChapter(chapter);

                return true;
            }


            return false;
        }
    );


    /* =========================================================
       تشغيل الفحص
       ========================================================= */

    if (
        document.readyState === "loading"
    ) {

        document.addEventListener(
            "DOMContentLoaded",
            scanPage
        );

    } else {

        scanPage();
    }


    /* =========================================================
       API
       ========================================================= */

    window.MobsarHadith = {

        scanPage,

        speakChapters,

        getChapters: function () {
            return chapters;
        },

        getCurrentChapter: function () {
            return currentChapter;
        },

        readCurrentPart,

        nextPart,

        repeatCurrentPart
    };

})();
</script>








<script>
/* =========================================================
   MOBSAR - PART 3
   VOICE NAVIGATION
   التنقل الصوتي بين جميع صفحات مبصر
   ========================================================= */

(function () {

    "use strict";

    /* ---------------------------------------------------------
       التأكد من وجود محرك الصوت
       --------------------------------------------------------- */

    if (!window.MobsarVoiceCore) {
        console.error(
            "MobsarVoiceCore غير موجود. ضعي Part 1 أولاً."
        );
        return;
    }

    const Voice = window.MobsarVoiceCore;


    /* =========================================================
       جميع صفحات مبصر
       ========================================================= */

    const pages = [

        {
            file: "index.php",
            name: "الرئيسية",
            words: [
                "الرئيسيه",
                "الرئيسية",
                "الصفحه الرئيسيه",
                "الصفحة الرئيسية",
                "الصفحة الاولى",
                "الصفحه الاولى",
                "الصفحة الرئيسية مبصر",
                "الرئيسية مبصر"
            ]
        },

        {
            file: "tasks.php",
            name: "المهام",
            words: [
                "المهام",
                "صفحه المهام",
                "صفحة المهام",
                "افتح المهام",
                "روح المهام",
                "اذهب للمهام",
                "روح لصفحة المهام"
            ]
        },

        {
            file: "register.php",
            name: "التسجيل",
            words: [
                "التسجيل",
                "صفحه التسجيل",
                "صفحة التسجيل",
                "افتح التسجيل",
                "روح التسجيل",
                "اذهب للتسجيل",
                "روح لصفحة التسجيل"
            ]
        },

        {
            file: "team.php",
            name: "الروحانيات",
            words: [
                "الروحانيات",
                "روحانيات",
                "صفحه الروحانيات",
                "صفحة الروحانيات",
                "افتح الروحانيات",
                "روح الروحانيات",
                "اذهب للروحانيات"
            ]
        },

        {
            file: "Prophets.php",
            name: "الأنبياء",
            words: [
                "الانبياء",
                "الأنبياء",
                "صفحه الانبياء",
                "صفحة الأنبياء",
                "افتح الانبياء",
                "روح الانبياء",
                "اذهب للانبياء"
            ]
        },

        {
            file: "Duaa.php",
            name: "الأدعية",
            words: [
                "الادعيه",
                "الأدعية",
                "ادعيه",
                "صفحه الادعيه",
                "صفحة الأدعية",
                "افتح الادعيه",
                "روح الادعيه",
                "اذهب للادعيه"
            ]
        },

        {
            file: "Quran.php",
            name: "القرآن",
            words: [
                "القران",
                "القرآن",
                "صفحه القران",
                "صفحة القرآن",
                "افتح القران",
                "افتح القرآن",
                "روح القران",
                "اذهب للقران"
            ]
        },

        {
            file: "Hadith.php",
            name: "الأحاديث",
            words: [
                "الاحاديث",
                "الأحاديث",
                "الحديث",
                "الاحاديث النبويه",
                "الأحاديث النبوية",
                "صفحه الاحاديث",
                "صفحة الأحاديث",
                "افتح الاحاديث",
                "روح الاحاديث",
                "اذهب للاحاديث"
            ]
        },

        {
            file: "Prayer.php",
            name: "الصلاة ومواعيد الصلاة",
            words: [
                "الصلاه",
                "الصلاة",
                "مواعيد الصلاه",
                "مواعيد الصلاة",
                "صفحه الصلاه",
                "صفحة الصلاة",
                "افتح الصلاه",
                "افتح الصلاة",
                "روح الصلاه",
                "اذهب للصلاه"
            ]
        },

        {
            file: "excel.php",
            name: "إكسل",
            words: [
                "اكسل",
                "إكسل",
                "الاكسل",
                "الإكسل",
                "صفحه اكسل",
                "صفحة إكسل",
                "افتح اكسل",
                "روح اكسل"
            ]
        },

        {
            file: "word.php",
            name: "وورد",
            words: [
                "وورد",
                "الورد",
                "برنامج وورد",
                "صفحه وورد",
                "صفحة وورد",
                "افتح وورد",
                "روح وورد"
            ]
        },

        {
            file: "powerpoint.php",
            name: "باوربوينت",
            words: [
                "باوربوينت",
                "الباوربوينت",
                "بوربوينت",
                "برنامج باوربوينت",
                "صفحه باوربوينت",
                "صفحة باوربوينت",
                "افتح باوربوينت",
                "روح باوربوينت"
            ]
        },

        {
            file: "mosa.php",
            name: "مبصر موسى",
            words: [
                "موسى",
                "موسي",
                "مبصر موسى",
                "مبصر موسي",
                "صفحه موسى",
                "صفحة موسى",
                "افتح موسى",
                "روح موسى"
            ]
        },

        {
            file: "communication.php",
            name: "التواصل",
            words: [
                "التواصل",
                "صفحه التواصل",
                "صفحة التواصل",
                "افتح التواصل",
                "روح التواصل",
                "اذهب للتواصل",
                "افتح صفحه التواصل"
            ]
        }

    ];


    /* =========================================================
       تنظيف الكلام
       ========================================================= */

    function clean(text) {

        return Voice.normalize
            ? Voice.normalize(text)
            : String(text)
                .toLowerCase()
                .replace(/[ًٌٍَُِّْـ]/g, "")
                .replace(/[إأآا]/g, "ا")
                .replace(/ى/g, "ي")
                .replace(/ة/g, "ه")
                .trim();
    }


    /* =========================================================
       معرفة الصفحة الحالية
       ========================================================= */

    function getCurrentPage() {

        let file =
            window.location.pathname
                .split("/")
                .pop()
                .toLowerCase();

        if (!file) {
            file = "index.php";
        }

        return pages.find(
            page =>
                page.file.toLowerCase() === file
        );
    }


    /* =========================================================
       الانتقال للصفحة
       ========================================================= */

    function navigateTo(page) {

        if (!page) return;

        const current =
            getCurrentPage();

        /* لو بالفعل في نفس الصفحة */

        if (
            current &&
            current.file.toLowerCase() ===
            page.file.toLowerCase()
        ) {

            Voice.speak(
                `أنتِ بالفعل في صفحة ${page.name}.`
            );

            return;
        }

        Voice.speak(
            `جاري الانتقال إلى صفحة ${page.name}.`,
            function () {

                window.location.href =
                    page.file;
            }
        );
    }


    /* =========================================================
       البحث عن الصفحة من الأمر
       ========================================================= */

    function findPage(command) {

        const text =
            clean(command);

        /* البحث في الكلمات الخاصة بكل صفحة */

        for (const page of pages) {

            for (const word of page.words) {

                const normalizedWord =
                    clean(word);

                if (
                    text.includes(
                        normalizedWord
                    )
                ) {

                    return page;
                }
            }
        }

        return null;
    }


    /* =========================================================
       "أنا فين؟"
       ========================================================= */

    function tellCurrentPage() {

        const current =
            getCurrentPage();

        if (!current) {

            Voice.speak(
                "أنتِ في صفحة غير مسجلة عندي."
            );

            return;
        }

        Voice.speak(
            `أنتِ الآن في صفحة ${current.name}.`
        );
    }


    /* =========================================================
       "إيه الصفحات الموجودة؟"
       ========================================================= */

    function tellAvailablePages() {

        let message =
            "الصفحات المتاحة هي: ";

        pages.forEach(
            (page, index) => {

                message +=
                    `${index + 1}، ${page.name}. `;
            }
        );

        Voice.speak(message);
    }


    /* =========================================================
       البحث عن صفحة باستخدام رقمها
       ========================================================= */

    function findPageByNumber(text) {

        const numbers = {

            "واحد": 0,
            "اول": 0,
            "الأول": 0,
            "الاول": 0,

            "اتنين": 1,
            "اثنين": 1,
            "الثاني": 1,
            "التاني": 1,

            "تلاته": 2,
            "ثلاثه": 2,
            "الثالث": 2,
            "التالت": 2,

            "اربعه": 3,
            "أربعة": 3,
            "الرابع": 3,
            "الرابع": 3,

            "خمسه": 4,
            "خمسة": 4,
            "الخامس": 4,

            "سته": 5,
            "ستة": 5,
            "السادس": 5,

            "سبعه": 6,
            "سبعة": 6,
            "السابع": 6,

            "تمانيه": 7,
            "ثمانيه": 7,
            "الثامن": 7,

            "تسعه": 8,
            "تسعة": 8,
            "التاسع": 8,

            "عشره": 9,
            "عشرة": 9,
            "العاشر": 9
        };

        for (const number in numbers) {

            if (
                text.includes(
                    clean(number)
                )
            ) {

                return pages[numbers[number]];
            }
        }

        return null;
    }


    /* =========================================================
       معالج التنقل
       ========================================================= */

    Voice.addHandler(
        function (command) {

            if (!command) return false;

            const text =
                clean(command);

            console.log(
                "MOBSAR NAVIGATION:",
                text
            );


            /* -------------------------------------------------
               أنا فين؟
               ------------------------------------------------- */

            if (
                text === "انا فين" ||
                text.includes("انا فين") ||
                text.includes("فين انا") ||
                text.includes("اي صفحه انا فيها") ||
                text.includes("انا في صفحه ايه") ||
                text.includes("ما هي الصفحه التي انا فيها")
            ) {

                tellCurrentPage();

                return true;
            }


            /* -------------------------------------------------
               الصفحات المتاحة
               ------------------------------------------------- */

            if (
                text.includes("الصفحات المتاحه") ||
                text.includes("الصفحات الموجودة") ||
                text.includes("الصفحات الموجوده") ||
                text.includes("ايه الصفحات") ||
                text.includes("ما هي الصفحات") ||
                text.includes("كل الصفحات")
            ) {

                tellAvailablePages();

                return true;
            }


            /* -------------------------------------------------
               اختيار صفحة بالرقم
               ------------------------------------------------- */

            if (
                text.includes("افتح الصفحه رقم") ||
                text.includes("روح الصفحه رقم") ||
                text.includes("اذهب للصفحه رقم")
            ) {

                const page =
                    findPageByNumber(text);

                if (page) {

                    navigateTo(page);

                    return true;
                }
            }


            /* -------------------------------------------------
               فتح / روح / اذهب
               ------------------------------------------------- */

            const navigationWords = [

                "افتح",

                "روح",

                "اذهب",

                "انتقل",

                "ادخل",

                "هات",

                "وديني",

                "روح ل",

                "روح الى",

                "اذهب الى",

                "اذهب ل",

                "افتح صفحه",

                "افتح صفحة"
            ];


            let isNavigation =
                false;

            for (
                const word
                of navigationWords
            ) {

                if (
                    text.includes(
                        clean(word)
                    )
                ) {

                    isNavigation = true;
                    break;
                }
            }


            /* -------------------------------------------------
               لو الأمر واضح أنه تنقل
               ------------------------------------------------- */

            if (isNavigation) {

                const page =
                    findPage(text);

                if (page) {

                    navigateTo(page);

                    return true;
                }
            }


            /* -------------------------------------------------
               حتى لو قالت اسم الصفحة فقط
               مثال:
               "المهام"
               "الروحانيات"
               "القرآن"
               ------------------------------------------------- */

            const directPage =
                findPage(text);

            if (directPage) {

                navigateTo(directPage);

                return true;
            }


            return false;
        }
    );


    /* =========================================================
       API
       ========================================================= */

    window.MobsarNavigation = {

        pages: pages,

        findPage: findPage,

        getCurrentPage: getCurrentPage,

        navigateTo: navigateTo,

        tellCurrentPage: tellCurrentPage,

        tellAvailablePages:
            tellAvailablePages
    };


    console.log(
        "MOBSAR Part 3 Navigation جاهز."
    );

})();
</script>



</body>
</html>