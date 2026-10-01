<?php
// ==========================================
// الجزء الأول: الـ Backend ومعالجة البيانات (PHP)
// ==========================================
require_once 'db.php';

$current_user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 1;
$active_chat_id = isset($_GET['chat_with']) ? intval($_GET['chat_with']) : 0;

// معالجة حذف الرسائل
if (isset($_GET['delete_msg_id']) && isset($_GET['delete_type'])) {
    $msg_to_del = intval($_GET['delete_msg_id']);
    $del_type = $_GET['delete_type']; 
    if ($del_type == 'all') {
        $stmt_del = $pdo->prepare("DELETE FROM communications WHERE id = ?");
        $stmt_del->execute([$msg_to_del]);
    } else if ($del_type == 'me') {
        $stmt_del = $pdo->prepare("UPDATE communications SET deleted_for_sender = 1 WHERE id = ? AND sender_id = ?");
        $stmt_del->execute([$msg_to_del, $current_user_id]);
    }
    header("Location: communication.php?user_id=$current_user_id&chat_with=$active_chat_id");
    exit();
}

// معالجة إرسال الرسائل والمرفقات
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_message_btn'])) {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $attachment_path = '';
    
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
        $attachment_path = $target_dir . time() . "_" . basename($_FILES["attachment"]["name"]);
        move_uploaded_file($_FILES["attachment"]["tmp_name"], $attachment_path);
    }

    if (!empty($message) || !empty($attachment_path)) {
        $stmt_insert = $pdo->prepare("INSERT INTO communications (sender_id, receiver_id, message, attachment, is_read, deleted_for_sender) VALUES (?, ?, ?, ?, 0, 0)");
        $stmt_insert->execute([$current_user_id, $active_chat_id, $message, $attachment_path]);
        header("Location: communication.php?user_id=$current_user_id&chat_with=$active_chat_id");
        exit();
    }
}

// جلب قائمة الموظفين
$users_result = $pdo->query("SELECT id, name FROM employees ORDER BY id ASC");
$users_list = $users_result->fetchAll(PDO::FETCH_ASSOC);

if ($active_chat_id == 0 && count($users_list) > 0) {
    $active_chat_id = $users_list[0]['id'];
}

// جلب بيانات الموظف النشط
$active_user = ['name' => 'اختر موظفاً'];
$stmt_active = $pdo->prepare("SELECT id, name FROM employees WHERE id = ?");
$stmt_active->execute([$active_chat_id]);
$active_user_data = $stmt_active->fetch(PDO::FETCH_ASSOC);
if ($active_user_data) {
    $active_user = $active_user_data;
}

// جلب الرسائل
$stmt_msgs = $pdo->prepare("SELECT * FROM communications WHERE ((sender_id = ? AND receiver_id = ? AND deleted_for_sender = 0) OR (sender_id = ? AND receiver_id = ?)) ORDER BY created_at ASC");
$stmt_msgs->execute([$current_user_id, $active_chat_id, $active_user_id = $active_chat_id, $current_user_id]);
$messages_list = $stmt_msgs->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبصر - تواصل</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cinzel:ital,wght@1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Cairo', sans-serif; }
        body { 
            background-color: #010003;
            background-image: radial-gradient(circle at 50% 10%, #100220 0%, #05000a 50%, #010003 100%); 
            min-height: 100vh; color: #f3f4f6; display: flex; flex-direction: column; align-items: center; padding-bottom: 70px;
        }

        .top-nav-bar { width: 90%; max-width: 1100px; display: flex; justify-content: space-between; padding: 25px 0 0 0; flex-wrap: wrap; gap: 10px; }
        .home-back-btn {
            background: rgba(10, 2, 18, 0.95); border: 1px solid #d4af37; color: #d4af37;
            padding: 12px 24px; border-radius: 14px; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }
        .home-back-btn:hover { background: #d4af37; color: #030105; box-shadow: 0 0 25px rgba(212, 175, 55, 0.8); }

        .hero-header { text-align: center; padding: 10px 20px 5px 20px; width: 100%; display: flex; flex-direction: column; align-items: center; }
        
        .mobsar-brand-wrapper { 
            display: inline-flex; flex-direction: column; align-items: center; position: relative; padding: 25px 50px; 
            border-radius: 50%;
            background: radial-gradient(circle, rgba(126, 34, 206, 0.15) 0%, rgba(5, 0, 10, 0.8) 70%);
            box-shadow: 0 0 50px rgba(126, 34, 206, 0.4), inset 0 0 30px rgba(212, 175, 55, 0.3);
            border: 2px solid rgba(212, 175, 55, 0.5);
            animation: ringsGlow 3s infinite alternate;
        }
        @keyframes ringsGlow {
            0% { box-shadow: 0 0 30px rgba(126, 34, 206, 0.4), inset 0 0 20px rgba(212, 175, 55, 0.3), 0 0 0 0px rgba(212, 175, 55, 0.2); }
            100% { box-shadow: 0 0 70px rgba(212, 175, 55, 0.7), inset 0 0 50px rgba(126, 34, 206, 0.6), 0 0 0 20px rgba(126, 34, 206, 0); }
        }

        .hero-eye-icon { 
            font-size: 5.8rem; color: #f3e8ff; 
            filter: drop-shadow(0 0 35px rgba(233, 213, 255, 0.9)) drop-shadow(0 0 70px rgba(126, 34, 206, 0.8));
            margin-bottom: -2px; animation: eyeFloat 2.5s infinite alternate;
        }
        @keyframes eyeFloat {
            from { transform: translateY(0) scale(1); }
            to { transform: translateY(-5px) scale(1.06); }
        }

        .big-mobsar-title { 
            font-family: 'Cinzel', serif; font-style: italic; font-weight: 800; 
            font-size: 6rem; 
            background: linear-gradient(135deg, #ffffff, #fef08a, #d4af37, #996515); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 6px; 
            transform: skewX(-10deg); 
            filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.8));
        }

        .massive-glow-line {
            width: 450px; height: 6px;
            background: linear-gradient(90deg, transparent, #d4af37, #f3e8ff, #d4af37, transparent);
            box-shadow: 0 0 40px #d4af37, 0 0 80px #7e22ce, 0 0 120px #d4af37;
            margin: 20px auto 12px auto; border-radius: 50%;
        }

        .sub-title { font-size: 3rem; color: #fce7f3; margin-top: 5px; font-weight: 700; text-shadow: 0 0 30px rgba(212, 175, 55, 0.9); }

        .global-command-mic-container { margin: 15px 0 10px 0; display: flex; flex-direction: column; align-items: center; gap: 8px; }
        .big-command-mic-btn {
            width: 85px; height: 85px;
            background: radial-gradient(circle, #0c0414 0%, #000000 100%);
            border: 3px solid #d4af37; border-radius: 50%; color: #d4af37; font-size: 2.2rem; cursor: pointer;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.9), inset 0 0 15px rgba(212, 175, 55, 0.4);
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .big-command-mic-btn:hover { transform: scale(1.08); background: #111; color: #fff; box-shadow: 0 0 45px #d4af37; }
        .big-command-mic-btn.listening { background: #111; color: #ef4444; border-color: #ef4444; animation: bigMicPulse 0.5s infinite alternate; }
        @keyframes bigMicPulse {
            from { transform: scale(1); box-shadow: 0 0 20px #ef4444; }
            to { transform: scale(1.15); box-shadow: 0 0 50px #ef4444; }
        }
        .command-mic-label { font-size: 1.05rem; color: #d4af37; font-weight: 600; text-shadow: 0 0 10px rgba(212, 175, 55, 0.5); }

        .whatsapp-layout-container {
            width: 90%; max-width: 950px; margin-top: 25px; display: flex; flex-direction: column; gap: 20px;
        }

        .stories-section {
            background: rgba(4, 1, 8, 0.96); backdrop-filter: blur(16px);
            border: 1px solid rgba(126, 34, 206, 0.4); border-radius: 20px; padding: 18px 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.9); display: flex; gap: 20px; overflow-x: auto; align-items: center;
        }
        .story-item { display: flex; flex-direction: column; align-items: center; gap: 6px; cursor: pointer; min-width: 75px; transition: 0.3s; }
        .story-avatar {
            width: 65px; height: 65px; border-radius: 50%; padding: 3px;
            background: linear-gradient(135deg, #d4af37, #7e22ce); display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5); transition: 0.3s;
        }
        .story-avatar div {
            width: 100%; height: 100%; border-radius: 50%; background: #0b0214; display: flex; align-items: center; justify-content: center;
            color: #d4af37; font-size: 1.2rem; font-weight: bold;
        }
        .story-item:hover .story-avatar { transform: scale(1.08); box-shadow: 0 0 25px #d4af37; }
        .story-name { font-size: 0.85rem; color: #f3f4f6; font-weight: 600; text-align: center; white-space: nowrap; }

        .chat-main-wrapper {
            display: grid; grid-template-columns: 280px 1fr; gap: 15px;
            background: rgba(4, 1, 8, 0.96); backdrop-filter: blur(16px);
            border: 1px solid rgba(126, 34, 206, 0.4); border-radius: 22px; overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.98), inset 0 0 30px rgba(35, 5, 58, 0.7);
            height: 550px;
        }

        .company-staff-sidebar {
            background: rgba(8, 2, 14, 0.95); border-left: 1px solid rgba(212, 175, 55, 0.2);
            display: flex; flex-direction: column; overflow-y: auto;
        }
        .sidebar-title { padding: 15px; font-size: 1rem; color: #d4af37; border-bottom: 1px solid rgba(212, 175, 55, 0.2); font-weight: 700; text-align: center; }
        .staff-member-item {
            padding: 12px 15px; display: flex; align-items: center; gap: 10px; cursor: pointer; transition: 0.2s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .staff-member-item:hover, .staff-member-item.active { background: rgba(212, 175, 55, 0.15); border-right: 4px solid #d4af37; }
        .staff-avatar { width: 40px; height: 40px; border-radius: 50%; background: #1a062d; border: 1px solid #d4af37; display: flex; align-items: center; justify-content: center; color: #d4af37; font-weight: bold; font-size: 0.95rem; }
        .staff-info h5 { color: #fff; font-size: 0.92rem; }
        .staff-info span { color: #aaa; font-size: 0.75rem; }

        .chat-content-area { display: flex; flex-direction: column; height: 100%; background: radial-gradient(circle at 50% 50%, rgba(10, 2, 18, 0.6) 0%, rgba(2, 0, 4, 0.9) 100%); }
        
        .chat-header {
            background: rgba(12, 4, 20, 0.95); border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding: 15px 20px; display: flex; align-items: center; justify-content: space-between;
        }
        .chat-header-info { display: flex; align-items: center; gap: 10px; }
        .chat-header-text h4 { color: #fff; font-size: 1rem; }
        .chat-header-text span { color: #25d366; font-size: 0.78rem; font-weight: 600; }

        .chat-messages-area {
            flex: 1; padding: 20px; overflow-y: auto; display: flex; flex-direction: column; gap: 15px;
        }
        .message-bubble {
            max-width: 75%; padding: 12px 16px; border-radius: 15px; font-size: 0.95rem; line-height: 1.5;
            position: relative; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); word-break: break-word;
        }
        .message-bubble.incoming {
            background: rgba(20, 10, 35, 0.9); border: 1px solid rgba(126, 34, 206, 0.5); color: #f3f4f6; align-self: flex-start;
            border-top-right-radius: 3px;
        }
        .message-bubble.outgoing {
            background: linear-gradient(135deg, #075e54, #128c7e); border: 1px solid rgba(37, 211, 102, 0.5); color: #fff; align-self: flex-end;
            border-top-left-radius: 3px;
        }
        .message-time { 
            font-size: 0.7rem; color: rgba(255, 255, 255, 0.7); display: inline-flex; align-items: center; gap: 4px; margin-top: 5px; float: left;
        }
        .read-receipts { color: #34b7f1; font-weight: bold; }
        
        .delete-msg-btn {
            background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #f87171; padding: 2px 8px; border-radius: 6px; font-size: 0.75rem; cursor: pointer; float: right; transition: 0.2s; margin-top: 4px;
        }
        .delete-msg-btn:hover { background: #ef4444; color: #fff; }

        .whatsapp-input-bar {
            background: rgba(12, 4, 20, 0.95); border-top: 1px solid rgba(212, 175, 55, 0.3);
            padding: 12px 15px; display: flex; align-items: center; gap: 10px; flex-shrink: 0;
        }
        .whatsapp-input-field {
            flex: 1; background: rgba(2, 0, 4, 0.95); border: 1px solid rgba(126, 34, 206, 0.5);
            border-radius: 20px; padding: 10px 15px; color: #fff; font-size: 0.95rem; transition: 0.3s;
        }
        .whatsapp-input-field:focus { outline: none; border-color: #d4af37; box-shadow: 0 0 15px rgba(212, 175, 55, 0.5); }

        .wa-action-btn {
            background: #050208; border: 1px solid rgba(212, 175, 55, 0.4); border-radius: 50%;
            width: 40px; height: 40px; color: #d4af37; font-size: 1rem; cursor: pointer;
            display: flex; align-items: center; justify-content: center; transition: 0.3s; flex-shrink: 0;
        }
        .wa-action-btn:hover { background: #d4af37; color: #000; transform: scale(1.1); box-shadow: 0 0 20px #d4af37; }
        .wa-action-btn.listening { background: #ef4444; color: #fff; border-color: #fff; animation: pulseMic 0.5s infinite; }
        .wa-action-btn.send-btn { background: linear-gradient(135deg, #25d366, #128c7e); color: #fff; border: none; }
        .wa-action-btn.send-btn:hover { background: linear-gradient(135deg, #2be670, #25d366); box-shadow: 0 0 20px #25d366; }

        .global-voice-widget {
            position: fixed; bottom: 25px; left: 25px; background: rgba(5, 1, 10, 0.95);
            border: 2px solid #d4af37; padding: 14px 22px; border-radius: 35px; color: #d4af37; font-weight: 700;
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.6); display: flex; align-items: center; gap: 12px; z-index: 1000;
        }
        .global-voice-widget i { font-size: 1.4rem; color: #ef4444; animation: pulseMic 0.9s infinite; }
        @keyframes pulseMic { 0% { transform: scale(1); opacity: 0.7; } 50% { transform: scale(1.4); opacity: 1; } 100% { transform: scale(1); opacity: 0.7; } }

        .story-modal {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.85); z-index: 2000; justify-content: center; align-items: center;
        }
        .story-modal-content {
            background: #0d0317; border: 2px solid #d4af37; border-radius: 20px; padding: 25px; width: 90%; max-width: 400px; box-shadow: 0 0 40px rgba(212,175,55,0.6); color: #fff; text-align: center;
        }
        .story-modal-content h3 { color: #d4af37; margin-bottom: 15px; font-size: 1.3rem; }
        .viewer-item { display: flex; justify-content: space-between; padding: 8px 12px; border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 0.9rem; }
        .viewer-seen { color: #25d366; font-weight: bold; }
        .viewer-not-seen { color: #ef4444; font-weight: bold; }
        .close-modal-btn { background: #d4af37; color: #000; border: none; padding: 8px 20px; border-radius: 10px; margin-top: 15px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>

    <div class="top-nav-bar">
        <a href="index.php" class="home-back-btn" onmouseenter="speakQuick('العودة للصفحة الرئيسية')" onclick="goToPage(event, 'index.php')">
            <i class="fa-solid fa-house"></i> الرئيسية
        </a>
        <a href="employees.php" class="home-back-btn" onmouseenter="speakQuick('صفحة الموظفين')" onclick="goToPage(event, 'employees.php')">
            <i class="fa-solid fa-users"></i> الموظفين
        </a>
    </div>

    <div class="hero-header">
        <div class="mobsar-brand-wrapper" onmouseenter="speakQuick('مبصر')">
            <i class="fa-solid fa-eye hero-eye-icon"></i>
            <h1 class="big-mobsar-title">MOBSAR</h1>
        </div>
        <div class="massive-glow-line"></div>
        <div class="sub-title" onmouseenter="speakQuick('تواصل')">تواصل</div>

        <div class="global-command-mic-container">
            <button type="button" class="big-command-mic-btn" id="commandMicBtn" onmouseenter="speakQuick('المساعد الصوتي الذكي')" onclick="runGlobalVoiceCommand()" title="انقر لتنفيذ أمر صوتي">
                <i class="fa-solid fa-microphone-lines"></i>
            </button>
            <span class="command-mic-label" onmouseenter="speakQuick('اضغط وتكلم لتنفيذ الأمر فوراً')">اضغط وتكلم لتنفيذ الأمر فوراً</span>
        </div>
    </div>

    <div class="global-voice-widget">
        <i class="fa-solid fa-microphone"></i>
        <span id="voiceStatusText">مبصر جاهز وسريع...</span>
    </div>

    <div class="whatsapp-layout-container">
        
        <div class="stories-section">
            <div class="story-item" onmouseenter="speakQuick('استوري الصوت الملكي')" onclick="openStoryViewers('استوري صوتي')">
                <div class="story-avatar"><div><i class="fa-solid fa-microphone-lines"></i></div></div>
                <span class="story-name">استوري صوتي</span>
            </div>
            <div class="story-item" onmouseenter="speakQuick('استوري الفيديو')" onclick="openStoryViewers('فيديو المشروع')">
                <div class="story-avatar"><div><i class="fa-solid fa-video"></i></div></div>
                <span class="story-name">فيديو المشروع</span>
            </div>
            <div class="story-item" onmouseenter="speakQuick('استوري البوستات')" onclick="openStoryViewers('بوستات الشركة')">
                <div class="story-avatar"><div><i class="fa-solid fa-newspaper"></i></div></div>
                <span class="story-name">بوستات الشركة</span>
            </div>
            <div class="story-item" onmouseenter="speakQuick('استوري الصور')" onclick="openStoryViewers('صور وتصاميم الواجهات')">
                <div class="story-avatar"><div><i class="fa-solid fa-image"></i></div></div>
                <span class="story-name">صور وتصاميم</span>
            </div>
        </div>

        <div class="chat-main-wrapper">
            
            <div class="company-staff-sidebar" id="staffSidebar">
                <div class="sidebar-title" onmouseenter="speakQuick('قائمة الأشخاص')">الدردشات</div>
                
                <div class="staff-member-item active" onclick="switchChat('سامي صبحي', this)" onmouseenter="speakQuick('سامي صبحي')">
                    <div class="staff-avatar">س</div>
                    <div class="staff-info">
                        <h5>سامي صبحي</h5>
                        <span>المدير العام</span>
                    </div>
                </div>

                <div class="staff-member-item" onclick="switchChat('ماجدة سامي', this)" onmouseenter="speakQuick('ماجدة سامي')">
                    <div class="staff-avatar">م</div>
                    <div class="staff-info">
                        <h5>ماجدة سامي</h5>
                        <span>مديرة التطوير</span>
                    </div>
                </div>

                <div class="staff-member-item" onclick="switchChat('شهد', this)" onmouseenter="speakQuick('شهد')">
                    <div class="staff-avatar">ش</div>
                    <div class="staff-info">
                        <h5>شهد</h5>
                        <span>مبرمج واجهات</span>
                    </div>
                </div>

                <div class="staff-member-item" onclick="switchChat('منة', this)" onmouseenter="speakQuick('منة')">
                    <div class="staff-avatar">م</div>
                    <div class="staff-info">
                        <h5>منة</h5>
                        <span>إدارة بيانات</span>
                    </div>
                </div>

                <div class="staff-member-item" onclick="switchChat('مروة', this)" onmouseenter="speakQuick('مروة')">
                    <div class="staff-avatar">م</div>
                    <div class="staff-info">
                        <h5>مروة</h5>
                        <span>دعم مشاريع</span>
                    </div>
                </div>
            </div>

            <div class="chat-content-area">
                <div class="chat-header">
                    <div class="chat-header-info">
                        <div class="staff-avatar" id="activeChatAvatar" style="width: 36px; height: 36px; font-size: 0.85rem;">س</div>
                        <div class="chat-header-text">
                            <h4 id="activeChatTitle" onmouseenter="speakQuick('سامي صبحي')">سامي صبحي</h4>
                            <span onmouseenter="speakQuick('متصل الآن')">● متصل الآن</span>
                        </div>
                    </div>
                    <div style="color: #d4af37; font-size: 1.1rem;"><i class="fa-solid fa-whatsapp"></i></div>
                </div>

                <div class="chat-messages-area" id="chatMessagesArea"></div>

                <form class="whatsapp-input-bar" id="whatsappChatForm" onsubmit="sendWhatsAppMessage(event)">
                    <button type="button" class="wa-action-btn" id="waMicBtn" onmouseenter="speakQuick('إدخال صوتي')" onclick="recordToWhatsAppField()" title="سجل رسالتك بصوتك">
                        <i class="fa-solid fa-microphone"></i>
                    </button>
                    
                    <label class="wa-action-btn" title="إرفاق ملف" onmouseenter="speakQuick('إرفاق ملف أو صورة')">
                        <i class="fa-solid fa-paperclip"></i>
                        <input type="file" id="mediaFileInput" style="display: none;" onchange="handleFileAttachment(this)">
                    </label>

                    <input type="text" id="waMessageInput" class="whatsapp-input-field" placeholder="اكتب رسالتك هنا..." onfocus="speakQuick('خانة كتابة الرسالة')" onmouseenter="speakQuick('خانة الكتابة')" required>
                    
                    <button type="submit" class="wa-action-btn send-btn" onmouseenter="speakQuick('زر إرسال')" title="إرسال">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>

        </div>

    </div>

    <div class="story-modal" id="storyModal">
        <div class="story-modal-content">
            <h3 id="modalStoryTitle">مشاهدات الاستوري</h3>
            <div id="storyViewersList" style="max-height: 200px; overflow-y: auto; text-align: right; margin-bottom: 10px;"></div>
            <button class="close-modal-btn" onclick="closeStoryModal()">إغلاق</button>
        </div>
    </div>



<script>


/* =========================================================
   MOBSAR - COMMUNICATION
   VOICE ENGINE
   حوار صوتي مستمر بدون سماع صوت مبصر لنفسه
========================================================= */

let voiceStarted = false;
let keepListening = true;
let isListening = false;
let isSpeaking = false;
let recognitionStarting = false;
let recognitionTimer = null;

let waitingForAnswer = false;
let answerCallback = null;
let currentVoiceMode = "normal";

const SpeechRecognition =
    window.SpeechRecognition || window.webkitSpeechRecognition;

let recognition = null;


/* =========================
   أسماء الأشخاص
========================= */

const staffNames = [
    "سامي صبحي",
    "ماجدة سامي",
    "شهد",
    "منة",
    "مروة"
];

const staffAliases = {
    "سامي": "سامي صبحي",
    "سامي صبحي": "سامي صبحي",

    "ماجدة": "ماجدة سامي",
    "ماجدة سامي": "ماجدة سامي",

    "شهد": "شهد",

    "منة": "منة",
    "منه": "منة",

    "مروة": "مروة"
};


/* =========================
   تنظيف الكلام العربي
========================= */

function normalizeArabic(text) {
    return String(text || "")
        .toLowerCase()
        .replace(/[ًٌٍَُِّْـ]/g, "")
        .replace(/[إأآا]/g, "ا")
        .replace(/ة/g, "ه")
        .replace(/ى/g, "ي")
        .replace(/\s+/g, " ")
        .trim();
}


/* =========================
   حالة المايك
========================= */

function setVoiceStatus(text) {
    const status = document.getElementById("voiceStatusText");

    if (status) {
        status.textContent = text;
    }
}


/* =========================
   إيقاف الاستماع
========================= */

function stopRecognition() {
    if (!recognition) return;

    try {
        recognition.stop();
    } catch (e) {}

    isListening = false;
    recognitionStarting = false;
}


/* =========================
   الكلام الصوتي
   مهم:
   المايك يتوقف أثناء الكلام
   ثم يفتح بعد انتهاء الكلام
========================= */

function speakQuick(text, callback = null) {

    if (!("speechSynthesis" in window)) {
        if (callback) callback();
        return;
    }

    isSpeaking = true;

    stopRecognition();

    window.speechSynthesis.cancel();

    const utterance = new SpeechSynthesisUtterance(text);

    utterance.lang = "ar-SA";
    utterance.rate = 1.0;
    utterance.pitch = 1.1;
    utterance.volume = 1;

    utterance.onstart = function () {
        isSpeaking = true;
        setVoiceStatus("مبصر يتحدث...");
    };

    utterance.onend = function () {

        isSpeaking = false;

        if (callback) {
            callback();
        }

        if (voiceStarted && keepListening) {
            setTimeout(function () {
                startRecognition();
            }, 350);
        }
    };

    utterance.onerror = function () {

        isSpeaking = false;

        if (callback) {
            callback();
        }

        if (voiceStarted && keepListening) {
            setTimeout(startRecognition, 350);
        }
    };

    window.speechSynthesis.speak(utterance);
}


/* =========================
   إنشاء Recognition
========================= */

function createRecognition() {

    if (!SpeechRecognition) {
        setVoiceStatus("المتصفح لا يدعم التعرف على الصوت");
        return null;
    }

    const r = new SpeechRecognition();

    r.lang = "ar-EG";

    /*
       لا نخلي continuous=true
       لأن الموبايل أحيانًا يعلق أو يسمع نفسه.
       كل جملة = جلسة استماع قصيرة.
    */
    r.continuous = false;

    r.interimResults = false;

    r.maxAlternatives = 3;


    r.onstart = function () {

        isListening = true;
        recognitionStarting = false;

        setVoiceStatus("مبصر يستمع لك...");
    };


    r.onresult = function (event) {

        isListening = false;

        let transcript = "";

        try {
            transcript =
                event.results[0][0].transcript.trim();
        } catch (e) {}

        if (!transcript) {
            restartListening();
            return;
        }

        console.log("MOBSAR VOICE:", transcript);

        handleVoiceCommand(transcript);
    };


    r.onerror = function (event) {

        isListening = false;
        recognitionStarting = false;

        console.log("VOICE ERROR:", event.error);

        if (event.error === "not-allowed" ||
            event.error === "service-not-allowed") {

            keepListening = false;

            setVoiceStatus("اسمحي للمتصفح باستخدام الميكروفون");

            return;
        }

        if (event.error === "no-speech" ||
            event.error === "aborted") {

            restartListening();
            return;
        }

        restartListening();
    };


    r.onend = function () {

        isListening = false;
        recognitionStarting = false;

        if (
            voiceStarted &&
            keepListening &&
            !isSpeaking
        ) {
            restartListening();
        }
    };


    return r;
}


/* =========================
   تشغيل المايك
========================= */

function startRecognition() {

    if (!SpeechRecognition) {
        setVoiceStatus("المتصفح لا يدعم الصوت");
        return;
    }

    if (!voiceStarted || !keepListening) return;

    if (isSpeaking) return;

    if (isListening || recognitionStarting) return;

    if (!recognition) {
        recognition = createRecognition();
    }

    if (!recognition) return;

    recognitionStarting = true;

    try {
        recognition.start();
    } catch (error) {

        recognitionStarting = false;

        clearTimeout(recognitionTimer);

        recognitionTimer = setTimeout(function () {
            startRecognition();
        }, 500);
    }
}


/* =========================
   إعادة فتح المايك
========================= */

function restartListening() {

    if (!voiceStarted || !keepListening) return;

    if (isSpeaking) return;

    clearTimeout(recognitionTimer);

    recognitionTimer = setTimeout(function () {

        if (
            voiceStarted &&
            keepListening &&
            !isSpeaking &&
            !isListening
        ) {
            startRecognition();
        }

    }, 400);
}


/* =========================
   بدء النظام
========================= */

function startVoiceSystem(firstTime = false) {

    if (!SpeechRecognition) {
        setVoiceStatus("المتصفح لا يدعم التعرف على الصوت");
        return;
    }

    voiceStarted = true;
    keepListening = true;

    if (firstTime) {

        speakQuick(
            "مرحباً بك في صفحة التواصل. أخبريني كيف يمكنني مساعدتك؟"
        );

    } else {

        startRecognition();
    }
}


/* =========================
   زر المايك الكبير
========================= */

function runGlobalVoiceCommand() {

    voiceStarted = true;
    keepListening = true;

    stopRecognition();

    speakQuick(
        "حاضر، أنا أسمعك. قولي الأمر."
    );
}


/* =========================
   تجاهل الكلام الذي قد يكون
   صوت مبصر نفسه
========================= */

function isAssistantEcho(text) {

    const t = normalizeArabic(text);

    const echoWords = [
        "مرحباً بك في صفحة التواصل",
        "اخبريني كيف يمكنني مساعدتك",
        "اخبرني كيف يمكنني مساعدتك",
        "حاضر انا اسمعك",
        "حاضر",
        "مبصر يتحدث",
        "مبصر يستمع لك",
        "جاري الانتقال",
        "تم الارسال",
        "تم الحذف",
        "هل تريدين ارسالها",
        "قولي الرساله"
    ];

    return echoWords.some(function(word) {
        return t.includes(normalizeArabic(word));
    });
}

    /* =========================================================
   MOBSAR - VOICE COMMANDS
========================================================= */


/* =========================
   معرفة الشخص من الكلام
========================= */

function findStaffName(text) {

    const t = normalizeArabic(text);

    for (const key in staffAliases) {

        const normalizedKey = normalizeArabic(key);

        if (t.includes(normalizedKey)) {
            return staffAliases[key];
        }
    }

    return null;
}


/* =========================
   إيجاد عنصر الشخص بالكليك
========================= */

function findStaffElement(name) {

    const items =
        document.querySelectorAll(".staff-member-item");

    for (const item of items) {

        const title =
            item.querySelector("h5");

        if (!title) continue;

        if (
            normalizeArabic(title.textContent) ===
            normalizeArabic(name)
        ) {
            return item;
        }
    }

    return null;
}


/* =========================
   فتح محادثة شخص بالكليك
========================= */

function openPersonChat(name) {

    const element = findStaffElement(name);

    if (!element) {

        speakQuick(
            "لم أجد هذا الاسم في قائمة الأشخاص."
        );

        return false;
    }

    /*
       هنا بنعمل نفس الكليك الحقيقي
       على الشخص الموجود في القائمة
    */

    element.click();

    return true;
}


/* =========================
   قائمة الأشخاص
========================= */

function readStaffList() {

    const items =
        document.querySelectorAll(".staff-member-item");

    let names = [];

    items.forEach(function(item) {

        const title =
            item.querySelector("h5");

        if (title) {
            names.push(title.textContent.trim());
        }
    });

    if (names.length === 0) {

        speakQuick(
            "لا توجد أسماء في قائمة الأشخاص."
        );

        return;
    }

    speakQuick(
        "الأسماء الموجودة عندك هي: " +
        names.join("، ") +
        "."
    );
}


/* =========================
   قراءة بيانات الشخص
========================= */

function readPersonInfo(name) {

    const element = findStaffElement(name);

    if (!element) {

        speakQuick(
            "لم أجد هذا الشخص."
        );

        return;
    }

    const info =
        element.querySelector(".staff-info");

    if (!info) return;

    const title =
        info.querySelector("h5");

    const job =
        info.querySelector("span");

    const personName =
        title ? title.textContent.trim() : name;

    const personJob =
        job ? job.textContent.trim() : "";

    speakQuick(
        personName +
        (personJob ? "، " + personJob : "")
    );
}


/* =========================
   قراءة المحادثة
========================= */

function readCurrentConversation() {

    const title =
        document.getElementById("activeChatTitle");

    const chat =
        document.getElementById("chatMessagesArea");

    const person =
        title ? title.textContent.trim() : currentActiveStaff;

    if (!chat) return;

    const bubbles =
        chat.querySelectorAll(".message-bubble");

    if (bubbles.length === 0) {

        speakQuick(
            "لا توجد رسائل سابقة مع " + person
        );

        return;
    }

    let messages = [];

    bubbles.forEach(function(bubble) {

        /*
          ناخد النص ونستبعد زر الحذف
        */

        let clone = bubble.cloneNode(true);

        const deleteButton =
            clone.querySelector(".delete-msg-btn");

        if (deleteButton) {
            deleteButton.remove();
        }

        const time =
            clone.querySelector(".message-time");

        if (time) {
            time.remove();
        }

        let text =
            clone.textContent.trim();

        if (text) {
            messages.push(text);
        }
    });

    if (messages.length === 0) {

        speakQuick(
            "لا توجد رسائل يمكن قراءتها."
        );

        return;
    }

    speakQuick(
        "رسائل محادثة " +
        person +
        ": " +
        messages.join(" ... ")
    );
}


/* =========================
   هل المستخدم قال نعم؟
========================= */

function isYes(text) {

    const t = normalizeArabic(text);

    return [
        "نعم",
        "ايوه",
        "اه",
        "تمام",
        "موافق",
        "موافقه",
        "صح",
        "صحيح",
        "ابعت",
        "ارسلي",
        "ارسل"
    ].some(word => t === normalizeArabic(word) ||
        t.includes(normalizeArabic(word)));
}


/* =========================
   هل المستخدم قال لا؟
========================= */

function isNo(text) {

    const t = normalizeArabic(text);

    return [
        "لا",
        "لا مش",
        "لأ",
        "لاء",
        "غلط",
        "غيرها",
        "عدلها",
        "مش دي"
    ].some(word =>
        t === normalizeArabic(word) ||
        t.includes(normalizeArabic(word))
    );
}


/* =========================
   انتظار إجابة
========================= */

function waitForAnswer(callback) {

    waitingForAnswer = true;
    answerCallback = callback;

    restartListening();
}


/* =========================
   طلب اسم الشخص
========================= */

function askForRecipient() {

    waitingForAnswer = false;

    speakQuick(
        "حاضر. قولي اسم الشخص اللي عايزة تبعتي له الرسالة."
    );
}


/* =========================
   طلب نص الرسالة
========================= */

function askForMessage() {

    currentVoiceMode = "message";

    speakQuick(
        "حاضر. قوليلي الرسالة اللي عايزة تبعتيها."
    );
}


/* =========================
   تجهيز رسالة للمراجعة
========================= */

function prepareMessageForReview(message) {

    const input =
        document.getElementById("waMessageInput");

    if (input) {
        input.value = message;
    }

    currentVoiceMode = "confirmMessage";

    speakQuick(
        "الرسالة هي: " +
        message +
        ". هل تريدين إرسالها؟ قولي نعم أو لا."
    );
}


/* =========================
   إرسال الرسالة
========================= */

function sendCurrentVoiceMessage() {

    const input =
        document.getElementById("waMessageInput");

    if (!input || !input.value.trim()) {

        speakQuick(
            "لا توجد رسالة لإرسالها."
        );

        return;
    }

    /*
       نستعمل نفس وظيفة الإرسال الموجودة
       في الصفحة
    */

    sendWhatsAppMessage({
        preventDefault: function () {}
    });
}


/* =========================
   بدء إرسال رسالة لشخص
========================= */

function startMessageToPerson(name) {

    /*
       أولاً فتح الشخص بالكليك
    */

    const opened =
        openPersonChat(name);

    if (!opened) return;

    currentActiveStaff = name;

    setTimeout(function() {

        speakQuick(
            "حاضر. فتحت محادثة " +
            name +
            ". قولي الرسالة."
        );

        currentVoiceMode = "message";

    }, 300);
}


/* =========================
   التنقل بين الصفحات
========================= */

const pageCommands = [

    {
        words: [
            "الرئيسيه",
            "الصفحه الرئيسيه",
            "الصفحه الرئيسية",
            "البيت",
            "الرئيسية",
            "الصفحه الاولى",
            "الصفحة الأولى"
        ],
        file: "index.php",
        name: "الرئيسية"
    },

    {
        words: [
            "المهام",
            "صفحه المهام",
            "صفحة المهام",
            "المهمات"
        ],
        file: "tasks.php",
        name: "المهام"
    },

    {
        words: [
            "التقييم",
            "الانجازات",
            "الإنجازات",
            "صفحه التقييم",
            "صفحة التقييم"
        ],
        file: "evaluation.php",
        name: "التقييم والإنجازات"
    },

    {
        words: [
            "التواصل",
            "صفحه التواصل",
            "صفحة التواصل",
            "المحادثات",
            "الدردشات"
        ],
        file: "communication.php",
        name: "التواصل"
    },

    {
        words: [
            "الموظفين",
            "الموظفون",
            "الموظفين والمدير",
            "المدير والموظفين",
            "صفحه الموظفين",
            "صفحة الموظفين"
        ],
        file: "employees.php",
        name: "الموظفين والمدير"
    },

    {
        words: [
            "الاعدادات",
            "الإعدادات",
            "صفحه الاعدادات",
            "صفحة الإعدادات"
        ],
        file: "settings.php",
        name: "الإعدادات"
    },

    {
        words: [
            "الجدول",
            "المواعيد",
            "التقويم",
            "صفحه الجدول",
            "صفحة المواعيد",
            "الاخبار",
            "الأخبار"
        ],
        file: "schedule.php",
        name: "الجدول والمواعيد والأخبار"
    },

    {
        words: [
            "الروحانيات",
            "روحانيات",
            "صفحه الروحانيات",
            "صفحة الروحانيات"
        ],
        file: "team.php",
        name: "الروحانيات"
    },

    {
        words: [
            "اداره الملفات",
            "إدارة الملفات",
            "الملفات",
            "صفحه الملفات",
            "صفحة إدارة الملفات"
        ],
        file: "notifications.php",
        name: "إدارة الملفات"
    }
];


/* =========================
   تنفيذ التنقل
========================= */

function navigateToPage(page) {

    speakQuick(
        "حاضر، جاري فتح صفحة " +
        page.name +
        ".",
        function() {

            /*
               بعد الكلام مباشرة
               نفتح الصفحة
            */

            window.location.href = page.file;
        }
    );
}


/* =========================
   البحث عن أمر الصفحة
========================= */

function findPageCommand(text) {

    const t = normalizeArabic(text);

    for (const page of pageCommands) {

        for (const word of page.words) {

            if (t.includes(normalizeArabic(word))) {
                return page;
            }
        }
    }

    return null;
}


/* =========================
   معرفة الصفحة الحالية
========================= */

function getCurrentPageName() {

    const file =
        window.location.pathname
            .split("/")
            .pop()
            .toLowerCase();

    const map = {

        "index.php": "الرئيسية",

        "tasks.php": "المهام",

        "evaluation.php":
            "التقييم والإنجازات",

        "communication.php":
            "التواصل",

        "employees.php":
            "الموظفين والمدير",

        "settings.php":
            "الإعدادات",

        "schedule.php":
            "الجدول والمواعيد والأخبار",

        "tean.php":
            "الروحانيات",

        "notificationc.php":
            "إدارة الملفات"
    };

    return map[file] || "هذه الصفحة";
}


/* =========================
   شرح الصفحة
========================= */

function explainCurrentPage() {

    const page =
        getCurrentPageName();

    const explanations = {

        "الرئيسية":
            "دي الصفحة الرئيسية في مبصر، ومنها تقدري تنتقلي لكل أقسام النظام باستخدام صوتك.",

        "المهام":
            "صفحة المهام، ومنها تقدري تعرفي المهام المطلوبة وتتابعي المهام وتنفذي أوامر مرتبطة بالعمل.",

        "التقييم والإنجازات":
            "صفحة التقييم والإنجازات، ومنها تقدري تتابعي التقييمات والإنجازات والتقارير.",

        "التواصل":
            "دي صفحة التواصل، ومنها تقدري تختاري أي شخص، تفتحي المحادثة، تقرئي الرسائل، وتبعتي رسالة صوتياً أو كتابةً.",

        "الموظفين والمدير":
            "صفحة الموظفين والمدير، ومنها تقدري تعرفي الموظفين وإدارة العلاقة بينهم وبين المدير.",

        "الإعدادات":
            "صفحة الإعدادات، ومنها تقدري تعدلي إعدادات مبصر.",

        "الجدول والمواعيد والأخبار":
            "صفحة الجدول والمواعيد والأخبار، ومنها تقدري تعرفي المواعيد والتقويم والأخبار.",

        "الروحانيات":
            "صفحة الروحانيات، وفيها الخدمات والمحتوى الروحاني الموجود داخل مبصر.",

        "إدارة الملفات":
            "صفحة إدارة الملفات، ومنها تقدري تتعاملي مع الملفات المرتبطة بالنظام."
    };

    speakQuick(
        explanations[page] ||
        "أنت الآن في صفحة " + page + "."
    );
}
/* =========================================================
   MOBSAR - COMMAND PROCESSOR
   PART 3
   الجزء الأول
========================================================= */


/* =========================================================
   معالجة الأمر الرئيسي
========================================================= */

function handleVoiceCommand(originalText) {

    const text = originalText.trim();

    if (!text) {
        restartListening();
        return;
    }

    /* منع مبصر من تفسير صوته كأنه أمر */
    if (isAssistantEcho(text)) {
        restartListening();
        return;
    }


    /* =====================================================
       لو مستني إجابة من المستخدم
    ===================================================== */

    if (waitingForAnswer && answerCallback) {

        const callback = answerCallback;

        waitingForAnswer = false;
        answerCallback = null;

        callback(text);

        return;
    }


    const t = normalizeArabic(text);


    /* =====================================================
       أنا فين؟
    ===================================================== */

    if (
        t.includes("انا فين") ||
        t.includes("انا في صفحه ايه") ||
        t.includes("انا في صفحة ايه") ||
        t.includes("ايه الصفحه دي") ||
        t.includes("ايه الصفحة دي") ||
        t.includes("اسم الصفحه") ||
        t.includes("اسم الصفحة")
    ) {

        const page = getCurrentPageName();

        speakQuick(
            "أنت الآن في صفحة " + page + "."
        );

        return;
    }


    /* =====================================================
       الصفحة دي بتعمل إيه؟
    ===================================================== */

    if (
        t.includes("الصفحه دي بتعمل ايه") ||
        t.includes("الصفحة دي بتعمل ايه") ||
        t.includes("اشرحلي الصفحه") ||
        t.includes("اشرحلي الصفحة") ||
        t.includes("شرح الصفحه") ||
        t.includes("شرح الصفحة") ||
        t.includes("بتعمل ايه هنا") ||
        t.includes("الصفحه دي ايه") ||
        t.includes("الصفحة دي ايه")
    ) {

        explainCurrentPage();

        return;
    }


    /* =====================================================
       الأوامر المتاحة
    ===================================================== */

    if (
        t.includes("عايزه الاوامر") ||
        t.includes("عايزة الاوامر") ||
        t.includes("عايزه اعرف الاوامر") ||
        t.includes("عايزة اعرف الاوامر") ||
        t.includes("الاوامر المتاحه") ||
        t.includes("الاوامر المتاحة") ||
        t.includes("ايه الاوامر") ||
        t.includes("ايه الأوامر") ||
        t.includes("ساعدني") ||
        t.includes("ماذا يمكنني ان افعل") ||
        t.includes("ممكن اعمل ايه")
    ) {

        speakQuick(
            "تقدري تقولي: افتح الرئيسية، افتح المهام، افتح التقييم والإنجازات، افتح التواصل، افتح الموظفين والمدير، افتح الإعدادات، افتح الجدول والمواعيد، افتح الروحانيات، أو افتح إدارة الملفات. وفي التواصل تقدري تقولي: اقرأ الأسامي، افتح محادثة شهد، ابعت رسالة لشهد، اقرأ المحادثة، أو اقرأ الرسائل."
        );

        return;
    }


    /* =====================================================
       قراءة أسماء الأشخاص
    ===================================================== */

    if (
        t.includes("اقرا الاسامي") ||
        t.includes("اقرالي الاسامي") ||
        t.includes("اقرا لي الاسامي") ||
        t.includes("اقرأ الأسماء") ||
        t.includes("قولي الاسامي") ||
        t.includes("قولي الأسماء") ||
        t.includes("مين موجود") ||
        t.includes("مين عندك") ||
        t.includes("قائمه الناس") ||
        t.includes("قائمة الناس") ||
        t.includes("اسماء الموظفين") ||
        t.includes("أسماء الموظفين") ||
        t.includes("الناس الموجوده") ||
        t.includes("الناس الموجودة")
    ) {

        readStaffList();

        return;
    }


    /* =====================================================
       البحث عن اسم الشخص
    ===================================================== */

    const person = findStaffName(text);


    /* =====================================================
       إرسال رسالة لشخص
    ===================================================== */

    const wantsMessage =
        t.includes("ابعت") ||
        t.includes("ابعتي") ||
        t.includes("ارسل") ||
        t.includes("ارسلي") ||
        t.includes("رساله") ||
        t.includes("رسالة") ||
        t.includes("عايزه ابعت") ||
        t.includes("عايزة ابعت") ||
        t.includes("عايزه ارسل") ||
        t.includes("عايزة ارسل") ||
        t.includes("عايزه اكلم") ||
        t.includes("عايزة اكلم") ||
        t.includes("عايزه اتواصل") ||
        t.includes("عايزة اتواصل");


    if (wantsMessage) {

        if (person) {

            startMessageToPerson(person);

        } else {

            askForRecipient();

            waitForAnswer(function askRecipientAgain(answer) {

                const selectedPerson =
                    findStaffName(answer);

                if (!selectedPerson) {

                    speakQuick(
                        "مش لاقية الاسم ده. قولي اسم شخص من القائمة."
                    );

                    waitForAnswer(askRecipientAgain);

                    return;
                }

                startMessageToPerson(selectedPerson);
            });
        }

        return;
    }


    /* =====================================================
       فتح محادثة مع شخص
    ===================================================== */

    const wantsChat =
        t.includes("افتح محادثه") ||
        t.includes("افتح محادثة") ||
        t.includes("افتحلي محادثه") ||
        t.includes("افتحلي محادثة") ||
        t.includes("كلم") ||
        t.includes("اكلم") ||
        t.includes("اتواصل مع") ||
        t.includes("محادثه مع") ||
        t.includes("محادثة مع") ||
        t.includes("روح عند") ||
        t.includes("وديني عند");


    if (wantsChat && person) {

        const opened =
            openPersonChat(person);

        if (opened) {

            speakQuick(
                "حاضر، فتحت محادثة " + person + "."
            );
        }

        return;
    }


    /* =====================================================
       اختيار شخص
    ===================================================== */

    if (
        (
            t.includes("اختار") ||
            t.includes("اختاري") ||
            t.includes("حدد") ||
            t.includes("هاتلي") ||
            t.includes("هات")
        ) &&
        person
    ) {

        const opened =
            openPersonChat(person);

        if (opened) {

            speakQuick(
                "حاضر، اخترت " + person + "."
            );
        }

        return;
    }


    /* =====================================================
       معلومات الشخص
    ===================================================== */

    if (
        (
            t.includes("مين") ||
            t.includes("بيشتغل ايه") ||
            t.includes("بيعمل ايه") ||
            t.includes("وظيفه") ||
            t.includes("وظيفة") ||
            t.includes("معلومات")
        ) &&
        person
    ) {

        readPersonInfo(person);

        return;
    }


    /* =====================================================
       قراءة المحادثة
    ===================================================== */

    if (
        t.includes("اقرا المحادثه") ||
        t.includes("اقرالي المحادثه") ||
        t.includes("اقرا لي المحادثه") ||
        t.includes("اقرأ المحادثة") ||
        t.includes("اقرا الرسائل") ||
        t.includes("اقرالي الرسائل") ||
        t.includes("اقرا لي الرسائل") ||
        t.includes("اقرأ الرسائل") ||
        t.includes("ايه الرسائل") ||
        t.includes("ايه اخر الرسائل") ||
        t.includes("اخر الرسائل")
    ) {

        readCurrentConversation();

        return;
    }


    /* =====================================================
       استوري الصوت
    ===================================================== */

    if (
        t.includes("استوري الصوت") ||
        t.includes("استوري صوتي") ||
        t.includes("الاستوري الصوتي")
    ) {

        openStoryViewers("استوري صوتي");

        return;
    }


    /* =====================================================
       استوري الفيديو
    ===================================================== */

    if (
        t.includes("استوري الفيديو") ||
        t.includes("فيديو المشروع") ||
        t.includes("الاستوري الفيديو")
    ) {

        openStoryViewers("فيديو المشروع");

        return;
    }


    /* =====================================================
       استوري البوستات
    ===================================================== */

    if (
        t.includes("استوري البوست") ||
        t.includes("استوري البوستات") ||
        t.includes("بوستات الشركة") ||
        t.includes("بوستات")
    ) {

        openStoryViewers("بوستات الشركة");

        return;
    }


    /* =====================================================
       استوري الصور والتصاميم
    ===================================================== */

    if (
        t.includes("استوري الصور") ||
        t.includes("صور وتصاميم") ||
        t.includes("التصاميم")
    ) {

        openStoryViewers(
            "صور وتصاميم الواجهات"
        );

        return;
    }


    /* =====================================================
       التنقل بين الصفحات
    ===================================================== */

    const page =
        findPageCommand(text);

    if (page) {

        navigateToPage(page);

        return;
    }


    /* =====================================================
       العودة للرئيسية
    ===================================================== */

    if (
        t.includes("ارجع") ||
        t.includes("عوده") ||
        t.includes("عودة") ||
        t.includes("ارجع للرئيسيه") ||
        t.includes("ارجع للرئيسية")
    ) {

        speakQuick(
            "حاضر، جاري العودة للرئيسية.",
            function () {

                window.location.href =
                    "index.php";
            }
        );

        return;
    }


    /* =====================================================
       أمر غير معروف
    ===================================================== */

    speakQuick(
        "مفهمتش الأمر. قولي الأمر مرة تانية."
    );
}


/* =========================================================
   إرسال الرسالة
========================================================= */

function sendWhatsAppMessage(event) {

    if (event && event.preventDefault) {
        event.preventDefault();
    }

    const input =
        document.getElementById("waMessageInput");

    if (!input) return;

    const msgText =
        input.value.trim();

    if (!msgText) {

        speakQuick(
            "قولي الرسالة الأول."
        );

        return;
    }


    if (!chatHistories[currentActiveStaff]) {

        chatHistories[currentActiveStaff] = [];
    }


    chatHistories[currentActiveStaff].push({

        text: msgText,

        type: "outgoing",

        time: "الآن",

        seen: false
    });


    input.value = "";

    renderMessages();


    speakQuick(
        "تم إرسال الرسالة."
    );
}


/* =========================================================
   إملاء الرسالة من زر المايك الموجود
========================================================= */

function recordToWhatsAppField() {

    if (!SpeechRecognition) {

        speakQuick(
            "المتصفح لا يدعم التسجيل الصوتي."
        );

        return;
    }

    voiceStarted = true;
    keepListening = true;

    stopRecognition();


    speakQuick(
        "حاضر، قولي الرسالة.",
        function () {

            const input =
                document.getElementById(
                    "waMessageInput"
                );

            const messageRecognition =
                createRecognition();

            if (!messageRecognition) return;


            messageRecognition.onresult =
                function (event) {

                    let message =
                        event.results[0][0]
                            .transcript
                            .trim();


                    if (!message) return;


                    if (input) {
                        input.value = message;
                    }


                    speakQuick(
                        "الرسالة هي: " +
                        message +
                        ". هل تريدين إرسالها؟ قولي نعم أو لا."
                    );


                    currentVoiceMode =
                        "confirmMessage";


                    waitForAnswer(function (answer) {

                        if (isYes(answer)) {

                            sendCurrentVoiceMessage();

                        }

                        else if (isNo(answer)) {

                            speakQuick(
                                "حاضر. قولي الرسالة الجديدة."
                            );


                            setTimeout(
                                function () {
                                    recordToWhatsAppField();
                                },
                                400
                            );

                        }

                        else {

                            speakQuick(
                                "قولي نعم للإرسال أو لا لتعديل الرسالة."
                            );
                        }
                    });
                };


            messageRecognition.onerror =
                function () {

                    restartListening();
                };


            messageRecognition.onend =
                function () {

                    if (
                        voiceStarted &&
                        keepListening &&
                        !isSpeaking
                    ) {
                        restartListening();
                    }
                };


            try {

                messageRecognition.start();

            } catch (e) {}
        }
    );
}


/* =========================================================
   تغيير المحادثة
========================================================= */

function switchChat(
    staffName,
    element,
    announce = true
) {

    currentActiveStaff =
        staffName;


    const title =
        document.getElementById(
            "activeChatTitle"
        );


    const avatar =
        document.getElementById(
            "activeChatAvatar"
        );


    if (title) {

        title.textContent =
            staffName;
    }


    if (avatar) {

        avatar.textContent =
            staffName.charAt(0);
    }


    const items =
        document.querySelectorAll(
            ".staff-member-item"
        );


    items.forEach(function (item) {

        item.classList.remove("active");

    });


    if (element) {

        element.classList.add("active");

    }


    renderMessages();


    if (announce) {

        speakQuick(
            "فتحت محادثة " +
            staffName
        );
    }
}

/* =========================================================
   PART 3 - الجزء الثاني والأخير
========================================================= */


/* =========================================================
   عرض الرسائل
========================================================= */

function renderMessages() {

    const chatArea =
        document.getElementById(
            "chatMessagesArea"
        );

    if (!chatArea) return;

    chatArea.innerHTML = "";

    const messages =
        chatHistories[currentActiveStaff] || [];


    if (messages.length === 0) {

        chatArea.innerHTML =
            `<div style="
                text-align:center;
                color:#888;
                margin-top:150px;
                font-size:.95rem;
            ">
                لا توجد رسائل سابقة مع
                ${currentActiveStaff}.
                ابدأ المحادثة الآن!
            </div>`;

        return;
    }


    messages.forEach(function (msg, index) {

        const bubble =
            document.createElement("div");

        bubble.className =
            "message-bubble " +
            msg.type;


        let contentHTML =
            msg.text;


        if (msg.attachment) {

            contentHTML +=
                `<br>
                 <small style="color:#ffd700;">
                 <i class="fa-solid fa-file-arrow-down"></i>
                 مرفق: ${msg.attachment}
                 </small>`;
        }


        const receipts =
            msg.seen
                ? `<span class="read-receipts">
                     <i class="fa-solid fa-check-double"></i>
                   </span>`
                : `<span style="color:#aaa;">
                     <i class="fa-solid fa-check"></i>
                   </span>`;


        contentHTML +=
            `<span class="message-time">
                ${msg.time || "الآن"}
                ${
                    msg.type === "outgoing"
                    ? receipts
                    : ""
                }
            </span>`;


        bubble.innerHTML =
            contentHTML;


        const deleteBtn =
            document.createElement("button");


        deleteBtn.className =
            "delete-msg-btn";


        deleteBtn.innerHTML =
            '<i class="fa-solid fa-trash"></i> حذف';


        deleteBtn.onclick =
            function () {

                chatHistories[
                    currentActiveStaff
                ].splice(index, 1);


                renderMessages();


                speakQuick(
                    "تم حذف الرسالة."
                );
            };


        bubble.appendChild(
            deleteBtn
        );


        chatArea.appendChild(
            bubble
        );
    });


    chatArea.scrollTop =
        chatArea.scrollHeight;
}


/* =========================================================
   المرفقات
========================================================= */

function handleFileAttachment(input) {

    if (
        input.files &&
        input.files[0]
    ) {

        const fileName =
            input.files[0].name;


        if (
            !chatHistories[
                currentActiveStaff
            ]
        ) {

            chatHistories[
                currentActiveStaff
            ] = [];
        }


        chatHistories[
            currentActiveStaff
        ].push({

            text:
                "مرفق وسائط جديد",

            type:
                "outgoing",

            attachment:
                fileName,

            time:
                "الآن",

            seen:
                false
        });


        renderMessages();


        speakQuick(
            "تم إرفاق الملف بنجاح."
        );
    }
}


/* =========================================================
   فتح الاستوري
========================================================= */

function openStoryViewers(storyName) {

    const title =
        document.getElementById(
            "modalStoryTitle"
        );


    const list =
        document.getElementById(
            "storyViewersList"
        );


    if (title) {

        title.textContent =
            "مشاهدات: " +
            storyName;
    }


    if (!list) return;


    list.innerHTML = "";


    const viewers =
        storyViewersData[storyName] || [];


    if (viewers.length === 0) {

        list.innerHTML =
            "<div>لا توجد مشاهدات.</div>";

    } else {

        viewers.forEach(function (v) {

            const item =
                document.createElement("div");


            item.className =
                "viewer-item";


            item.innerHTML =
                `<span>${v.name}</span>
                 ${
                    v.seen
                    ? '<span class="viewer-seen"> شاهده</span>'
                    : '<span class="viewer-not-seen"> لم يشاهده</span>'
                 }`;


            list.appendChild(item);
        });
    }


    const modal =
        document.getElementById(
            "storyModal"
        );


    if (modal) {

        modal.style.display =
            "flex";
    }


    speakQuick(
        "عرض قائمة من شاهد " +
        storyName
    );
}


/* =========================================================
   إغلاق الاستوري
========================================================= */

function closeStoryModal() {

    const modal =
        document.getElementById(
            "storyModal"
        );


    if (modal) {

        modal.style.display =
            "none";
    }
}


/* =========================================================
   الانتقال بالكليك
========================================================= */

function goToPage(event, url) {

    if (event) {

        event.preventDefault();
    }


    speakQuick(
        "حاضر، جاري الانتقال.",
        function () {

            window.location.href =
                url;
        }
    );
}


/* =========================================================
   بداية الصفحة
   مهم جداً:
   لا يتم تشغيل المايك عند فتح الصفحة.
========================================================= */

let firstScreenTouch = false;


window.addEventListener(
    "load",
    function () {

        /*
           عرض الرسائل الموجودة
        */

        renderMessages();


        /*
           الصفحة تفتح بشكل طبيعي.
           لا نشغل المايك هنا.
        */

        voiceStarted = false;

        keepListening = true;

    }
);


/* =========================================================
   أول كليك / أول لمسة على الشاشة
========================================================= */

document.addEventListener(
    "pointerdown",
    function () {

        /*
           نضمن أن البداية تحصل مرة واحدة فقط
        */

        if (firstScreenTouch) {
            return;
        }


        firstScreenTouch = true;


        /*
           تشغيل نظام الصوت بعد تفاعل المستخدم
        */

        voiceStarted = true;

        keepListening = true;


        /*
           مبصر يرحب بالمستخدم أولاً.
           وبعد انتهاء الكلام،
           speakQuick الموجودة في Part 1
           ستعيد تشغيل الاستماع تلقائياً.
        */

        speakQuick(
            "مرحباً بك في صفحة التواصل. أخبريني كيف يمكنني مساعدتك؟"
        );

    },
    {
        once: true,
        capture: true
    }
);
/* =========================================================
   MOBSAR - VOICE MESSAGE SYSTEM
   PART 1 / 2
   ========================================================= */

let mobsarMsgRecognition = null;
let mobsarMsgText = "";
let mobsarMsgListening = false;
let mobsarMsgProcessing = false;
let mobsarMsgFinishRequested = false;

let mobsarMsgSilenceTimer = null;
let mobsarMsgNoSpeechTimer = null;

let mobsarConfirmationRecognition = null;

let mobsarCurrentReceiverId = 0;
let mobsarCurrentReceiverName = "";

let mobsarWaitingForNewMessage = false;


/* =========================================================
   أسماء الأشخاص الموجودة في HTML
   ========================================================= */

const MOBSAR_EMPLOYEE_IDS = {
    "سامي صبحي": 1,
    "ماجدة سامي": 2,
    "شهد": 3,
    "منة": 4,
    "مروة": 5
};


/* =========================================================
   تنظيف الكلام
   ========================================================= */

function mobsarCleanMessage(text) {

    if (!text) return "";

    return text
        .replace(/\s+/g, " ")
        .trim();
}


/* =========================================================
   تنظيف مؤقتات الرسالة
   ========================================================= */

function mobsarClearMessageTimers() {

    if (mobsarMsgSilenceTimer) {

        clearTimeout(
            mobsarMsgSilenceTimer
        );

        mobsarMsgSilenceTimer = null;
    }

    if (mobsarMsgNoSpeechTimer) {

        clearTimeout(
            mobsarMsgNoSpeechTimer
        );

        mobsarMsgNoSpeechTimer = null;
    }
}


/* =========================================================
   إيقاف ميكروفون الرسالة
   ========================================================= */

function mobsarStopMessageMic() {

    mobsarMsgListening = false;

    mobsarClearMessageTimers();

    if (mobsarMsgRecognition) {

        try {

            mobsarMsgRecognition.onend = null;
            mobsarMsgRecognition.onerror = null;

            mobsarMsgRecognition.stop();

        } catch (e) {}
    }

    mobsarMsgRecognition = null;

    const btn =
        document.getElementById(
            "waMicBtn"
        );

    if (btn) {

        btn.classList.remove(
            "listening"
        );
    }
}


/* =========================================================
   إيقاف ميكروفون التأكيد
   ========================================================= */

function mobsarStopConfirmationMic() {

    if (mobsarConfirmationRecognition) {

        try {

            mobsarConfirmationRecognition.onend = null;
            mobsarConfirmationRecognition.onerror = null;

            mobsarConfirmationRecognition.stop();

        } catch (e) {}
    }

    mobsarConfirmationRecognition = null;

    const btn =
        document.getElementById(
            "waMicBtn"
        );

    if (btn) {

        btn.classList.remove(
            "listening"
        );
    }
}


/* =========================================================
   تشغيل ميكروفون كتابة الرسالة
   ========================================================= */

function mobsarStartMessageMic() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {

        speakQuick(
            "المتصفح الحالي لا يدعم الميكروفون."
        );

        return;
    }

    mobsarStopMessageMic();
    mobsarStopConfirmationMic();

    mobsarMsgRecognition =
        new SpeechRecognition();

    mobsarMsgRecognition.lang =
        "ar-EG";

    mobsarMsgRecognition.continuous =
        true;

    mobsarMsgRecognition.interimResults =
        true;

    mobsarMsgRecognition.maxAlternatives =
        1;

    mobsarMsgListening = true;

    mobsarMsgFinishRequested = false;

    let heardSomething = false;


    mobsarMsgRecognition.onstart =
        function () {

            mobsarMsgListening = true;

            const btn =
                document.getElementById(
                    "waMicBtn"
                );

            if (btn) {

                btn.classList.add(
                    "listening"
                );
            }

            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {

                status.innerText =
                    "أنا سامعاكي... اتكلمي براحتك";
            }


            mobsarMsgNoSpeechTimer =
                setTimeout(
                    function () {

                        if (
                            mobsarMsgListening &&
                            !heardSomething &&
                            !mobsarMsgText.trim()
                        ) {

                            mobsarStopMessageMic();

                            speakQuick(
                                "لم أسمع حاجة."
                            );

                            setTimeout(
                                function () {

                                    mobsarStartMessageMic();

                                },
                                900
                            );
                        }

                    },
                    3000
                );
        };


    mobsarMsgRecognition.onresult =
        function (event) {

            if (!mobsarMsgListening) {

                return;
            }

            heardSomething = true;

            if (mobsarMsgNoSpeechTimer) {

                clearTimeout(
                    mobsarMsgNoSpeechTimer
                );

                mobsarMsgNoSpeechTimer = null;
            }


            let finalText = "";
            let interimText = "";


            for (
                let i = event.resultIndex;
                i < event.results.length;
                i++
            ) {

                const transcript =
                    event.results[i][0].transcript;


                if (
                    event.results[i].isFinal
                ) {

                    finalText +=
                        " " + transcript;

                } else {

                    interimText +=
                        " " + transcript;
                }
            }


            if (finalText.trim()) {

                mobsarMsgText =
                    mobsarCleanMessage(
                        mobsarMsgText +
                        " " +
                        finalText
                    );
            }


            const input =
                document.getElementById(
                    "waMessageInput"
                );


            if (input) {

                const displayText =
                    mobsarCleanMessage(
                        mobsarMsgText +
                        " " +
                        interimText
                    );


                input.value =
                    displayText;


                input.setSelectionRange(
                    input.value.length,
                    input.value.length
                );
            }


            if (mobsarMsgSilenceTimer) {

                clearTimeout(
                    mobsarMsgSilenceTimer
                );
            }


            mobsarMsgSilenceTimer =
                setTimeout(
                    function () {

                        mobsarFinishMessageMic();

                    },
                    3000
                );
        };


    mobsarMsgRecognition.onend =
        function () {

            if (
                mobsarMsgListening &&
                !mobsarMsgFinishRequested &&
                !mobsarMsgProcessing
            ) {

                setTimeout(
                    function () {

                        if (
                            mobsarMsgListening &&
                            !mobsarMsgFinishRequested &&
                            !mobsarMsgProcessing
                        ) {

                            mobsarStartMessageMic();
                        }

                    },
                    250
                );
            }
        };


    mobsarMsgRecognition.onerror =
        function (event) {

            console.log(
                "MOBSAR Message Mic:",
                event.error
            );


            if (
                event.error ===
                    "not-allowed" ||
                event.error ===
                    "service-not-allowed"
            ) {

                mobsarStopMessageMic();

                speakQuick(
                    "الميكروفون محتاج السماح من المتصفح."
                );
            }
        };


    try {

        mobsarMsgRecognition.start();

    } catch (e) {

        setTimeout(
            function () {

                if (
                    mobsarMsgListening
                ) {

                    try {

                        mobsarMsgRecognition.start();

                    } catch (err) {}
                }

            },
            400
        );
    }
}


/* =========================================================
   إنهاء تسجيل الرسالة بعد 3 ثواني سكوت
   ========================================================= */

function mobsarFinishMessageMic() {

    if (mobsarMsgProcessing) {

        return;
    }

    mobsarMsgFinishRequested = true;

    mobsarStopMessageMic();


    mobsarMsgText =
        mobsarCleanMessage(
            mobsarMsgText
        );


    const input =
        document.getElementById(
            "waMessageInput"
        );


    if (input) {

        input.value =
            mobsarMsgText;
    }


    if (!mobsarMsgText) {

        mobsarMsgProcessing = false;

        speakQuick(
            "لم أسمع حاجة."
        );

        setTimeout(
            function () {

                mobsarStartMessageMic();

            },
            900
        );

        return;
    }


    mobsarProcessMessage();
}


/* =========================================================
   قراءة الرسالة وطلب التأكيد
   ========================================================= */

function mobsarProcessMessage() {

    mobsarMsgProcessing = true;

    mobsarClearMessageTimers();


    const message =
        mobsarCleanMessage(
            mobsarMsgText
        );


    const input =
        document.getElementById(
            "waMessageInput"
        );


    if (input) {

        input.value =
            message;
    }


    const question =
        "الرسالة هي: " +
        message +
        ". هل هي صحيحة؟ هل تريدين إرسالها؟";


    speakQuick(
        question
    );


    setTimeout(
        function () {

            mobsarListenConfirmation();

        },
        Math.max(
            3000,
            question.length * 75
        )
    );
}


/* =========================================================
   ميكروفون تأكيد الإرسال
   ========================================================= */

function mobsarListenConfirmation() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if (!SpeechRecognition) {

        return;
    }


    mobsarStopMessageMic();
    mobsarStopConfirmationMic();


    const confirmRecognition =
        new SpeechRecognition();


    confirmRecognition.lang =
        "ar-EG";

    confirmRecognition.continuous =
        false;

    confirmRecognition.interimResults =
        false;

    confirmRecognition.maxAlternatives =
        3;


    confirmRecognition.onstart =
        function () {

            const btn =
                document.getElementById(
                    "waMicBtn"
                );

            if (btn) {

                btn.classList.add(
                    "listening"
                );
            }


            const status =
                document.getElementById(
                    "voiceStatusText"
                );

            if (status) {

                status.innerText =
                    "أنا سامعاكي... قولي ابعتيها أو عدليها";
            }
        };


    confirmRecognition.onresult =
        function (event) {

            let answer = "";


            for (
                let i = 0;
                i < event.results[0].length;
                i++
            ) {

                answer +=
                    " " +
                    event.results[0][i].transcript;
            }


            answer =
                mobsarCleanMessage(
                    answer
                ).toLowerCase();


            console.log(
                "MOBSAR Confirmation:",
                answer
            );


            mobsarStopConfirmationMic();


            const sendWords = [

                "ابعتيها",
                "ابعتها",
                "ابعثها",
                "ابعث",
                "ابعت",
                "ارسلها",
                "ارسل",
                "أرسلها",
                "أرسل",
                "ارسليها",
                "ارسلي",
                "أرسليها",
                "أرسلي",
                "نعم",
                "ايوه",
                "أيوه",
                "اه",
                "آه",
                "صح",
                "صحيحة",
                "صحيح",
                "مظبوط",
                "تمام",
                "موافق"
            ];


            let shouldSend = false;


            for (
                let i = 0;
                i < sendWords.length;
                i++
            ) {

                if (
                    answer.includes(
                        sendWords[i].toLowerCase()
                    )
                ) {

                    shouldSend = true;

                    break;
                }
            }


            if (shouldSend) {

                mobsarSendMessage();

                return;
            }


            const editWords = [

                "عدليها",
                "عدلها",
                "تعديل",
                "عدلي",
                "عدل",
                "غيرها",
                "غير",
                "مش صحيحة",
                "غير صحيحة",
                "غلط",
                "لا",
                "لأ"
            ];


            let shouldEdit = false;


            for (
                let i = 0;
                i < editWords.length;
                i++
            ) {

                if (
                    answer.includes(
                        editWords[i].toLowerCase()
                    )
                ) {

                    shouldEdit = true;

                    break;
                }
            }


            if (shouldEdit) {

                mobsarEditMessage();

                return;
            }


            const retryText =
                "ما فهمتش. قولي ابعتيها أو عدليها.";


            speakQuick(
                retryText
            );


            setTimeout(
                function () {

                    mobsarListenConfirmation();

                },
                Math.max(
                    1800,
                    retryText.length * 70
                )
            );
        };


    confirmRecognition.onerror =
        function (event) {

            console.log(
                "Confirmation Error:",
                event.error
            );


            mobsarStopConfirmationMic();


            setTimeout(
                function () {

                    mobsarListenConfirmation();

                },
                500
            );
        };


    confirmRecognition.onend =
        function () {

            if (
                mobsarConfirmationRecognition
            ) {

                setTimeout(
                    function () {

                        if (
                            mobsarConfirmationRecognition
                        ) {

                            mobsarListenConfirmation();
                        }

                    },
                    400
                );
            }
        };


    mobsarConfirmationRecognition =
        confirmRecognition;


    try {

        confirmRecognition.start();

    } catch (e) {

        setTimeout(
            function () {

                mobsarListenConfirmation();

            },
            500
        );
    }
}
/* =========================================================
   MOBSAR - VOICE MESSAGE SYSTEM
   PART 2 / 2
   ========================================================= */


/* =========================================================
   تعديل الرسالة
   ========================================================= */

function mobsarEditMessage() {

    mobsarStopMessageMic();
    mobsarStopConfirmationMic();

    mobsarMsgProcessing = false;
    mobsarMsgFinishRequested = false;
    mobsarMsgText = "";

    const input =
        document.getElementById("waMessageInput");

    if (input) {
        input.value = "";
    }

    const editText =
        "تمام، سوف نعدلها. قولي الرسالة الجديدة.";

    speakQuick(editText);

    setTimeout(function () {

        if (input) {
            input.focus();
        }

        mobsarStartMessageMic();

    }, Math.max(1800, editText.length * 75));
}


/* =========================================================
   تشغيل ميكروفون الأوامر بعد إرسال الرسالة
   ========================================================= */

function mobsarResumeMainVoice() {

    const successText =
        "تم إرسال الرسالة بنجاح.";

    setTimeout(function () {

        /*
         * نفتح ميكروفون الأوامر الرئيسي
         */

        if (
            typeof runGlobalVoiceCommand ===
            "function"
        ) {

            runGlobalVoiceCommand();

        } else if (
            typeof mobsarStartMainCommandMic ===
            "function"
        ) {

            mobsarStartMainCommandMic();
        }

    }, Math.max(2200, successText.length * 80));
}


/* =========================================================
   ميكروفون الأوامر الرئيسي
   ========================================================= */

function mobsarStartMainCommandMic() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        return;
    }

    const commandBtn =
        document.getElementById("commandMicBtn");

    const recognition =
        new SpeechRecognition();

    recognition.lang = "ar-EG";
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.maxAlternatives = 3;

    if (commandBtn) {
        commandBtn.classList.add("listening");
    }

    recognition.onstart = function () {

        const status =
            document.getElementById(
                "voiceStatusText"
            );

        if (status) {
            status.innerText =
                "مبصر سامعاكي... قولي الأمر";
        }
    };

    recognition.onresult = function (event) {

        let command = "";

        for (
            let i = 0;
            i < event.results[0].length;
            i++
        ) {

            command +=
                " " +
                event.results[0][i].transcript;
        }

        command =
            mobsarCleanMessage(command);

        console.log(
            "MOBSAR MAIN COMMAND:",
            command
        );

        /*
         * لو قالت:
         * ابعت رسالة أخرى
         */

        if (
            mobsarHandleAnotherMessageCommand(
                command
            )
        ) {
            return;
        }

        /*
         * باقي أوامر مبصر
         */

        if (
            typeof handleVoiceCommand ===
            "function"
        ) {

            handleVoiceCommand(command);
        }
    };

    recognition.onerror = function (event) {

        console.log(
            "Main Voice Error:",
            event.error
        );

        if (commandBtn) {
            commandBtn.classList.remove(
                "listening"
            );
        }
    };

    recognition.onend = function () {

        if (commandBtn) {
            commandBtn.classList.remove(
                "listening"
            );
        }
    };

    try {

        recognition.start();

    } catch (e) {

        console.log(
            "Main Voice Start Error:",
            e
        );
    }
}


/* =========================================================
   إرسال الرسالة
   ========================================================= */

function mobsarSendMessage() {

    mobsarStopMessageMic();
    mobsarStopConfirmationMic();

    const message =
        mobsarCleanMessage(
            mobsarMsgText
        );

    if (!message) {

        speakQuick(
            "مفيش رسالة لإرسالها."
        );

        return;
    }


    let currentUserId = 1;

    try {

        const params =
            new URLSearchParams(
                window.location.search
            );

        const id =
            parseInt(
                params.get("user_id")
            );

        if (!isNaN(id)) {
            currentUserId = id;
        }

    } catch (e) {

        console.log(
            "User ID Error:",
            e
        );
    }


    let receiverId =
        parseInt(
            mobsarCurrentReceiverId
        );


    if (!receiverId) {

        receiverId =
            MOBSAR_EMPLOYEE_IDS[
                mobsarCurrentReceiverName
            ] || 0;
    }


    if (!receiverId) {

        speakQuick(
            "مش عارفة أحدد الشخص اللي هبعت له."
        );

        return;
    }


    /*
     * تجهيز البيانات
     */

    const formData =
        new FormData();

    formData.append(
        "send_message_btn",
        "1"
    );

    formData.append(
        "message",
        message
    );


    /*
     * إرسال الرسالة إلى PHP
     */

    fetch(
        "communication.php?user_id=" +
        encodeURIComponent(
            currentUserId
        ) +
        "&chat_with=" +
        encodeURIComponent(
            receiverId
        ),
        {
            method: "POST",
            body: formData
        }
    )

    .then(function (response) {

        if (!response.ok) {

            throw new Error(
                "HTTP ERROR " +
                response.status
            );
        }

        return response.text();
    })


    .then(function () {

        console.log(
            "MOBSAR: MESSAGE SENT"
        );


        /*
         * =========================================
         * إضافة الرسالة للشات فوراً
         * =========================================
         */

        try {

            if (
                typeof chatHistories ===
                "undefined"
            ) {

                window.chatHistories = {};
            }


            if (
                !chatHistories[
                    mobsarCurrentReceiverName
                ]
            ) {

                chatHistories[
                    mobsarCurrentReceiverName
                ] = [];
            }


            chatHistories[
                mobsarCurrentReceiverName
            ].push({

                text: message,

                type: "outgoing",

                time: "الآن",

                seen: false

            });


            /*
             * التأكد أن الشات الحالي
             * هو نفس الشخص
             */

            currentActiveStaff =
                mobsarCurrentReceiverName;


            /*
             * إظهار الرسالة
             */

            if (
                typeof renderMessages ===
                "function"
            ) {

                renderMessages();
            }

        } catch (displayError) {

            /*
             * حتى لو حصل خطأ في العرض،
             * الإرسال نفسه يعتبر ناجح.
             */

            console.error(
                "MOBSAR DISPLAY ERROR:",
                displayError
            );
        }


        /*
         * تنظيف المتغيرات
         */

        mobsarMsgText = "";

        mobsarMsgProcessing = false;

        mobsarMsgFinishRequested = false;


        const input =
            document.getElementById(
                "waMessageInput"
            );

        if (input) {
            input.value = "";
        }


        /*
         * إخبار المستخدم
         */

        const successText =
            "تم إرسال الرسالة بنجاح.";

        speakQuick(
            successText
        );


        /*
         * =========================================
         * بعد ما يقول:
         * تم إرسال الرسالة بنجاح
         *
         * يفتح ميكروفون الأوامر تلقائياً
         * =========================================
         */

        mobsarWaitingForNewMessage = true;

        mobsarResumeMainVoice();

    })


    .catch(function (error) {

        console.error(
            "MOBSAR SEND ERROR:",
            error
        );

        mobsarMsgProcessing = false;

        speakQuick(
            "حصل خطأ في إرسال الرسالة."
        );
    });
}


/* =========================================================
   إرسال رسالة أخرى لنفس الشخص
   ========================================================= */

function mobsarStartAnotherMessage() {

    mobsarStopMessageMic();
    mobsarStopConfirmationMic();

    mobsarMsgText = "";

    mobsarMsgProcessing = false;

    mobsarMsgFinishRequested = false;


    const input =
        document.getElementById(
            "waMessageInput"
        );


    if (input) {
        input.value = "";
    }


    const text =
        "تمام، قولي الرسالة الجديدة.";

    speakQuick(text);


    setTimeout(function () {

        if (input) {
            input.focus();
        }

        mobsarStartMessageMic();

    }, Math.max(1700, text.length * 75));
}


/* =========================================================
   أمر رسالة أخرى
   ========================================================= */

function mobsarHandleAnotherMessageCommand(text) {

    if (!text) {
        return false;
    }


    const command =
        mobsarCleanMessage(
            text
        ).toLowerCase();


    const anotherMessageWords = [

        "ابعت رسالة أخرى",
        "ابعث رسالة أخرى",
        "ابعت رسالة تانية",
        "ابعث رسالة تانية",
        "ابعتلي رسالة تانية",
        "ابعثلي رسالة تانية",
        "عايزة أبعت رسالة تانية",
        "عايز أبعت رسالة تانية",
        "عايزة ابعت رسالة تانية",
        "عايز ابعت رسالة تانية",
        "رسالة أخرى",
        "رسالة تانية",
        "ابعت تاني",
        "ابعث تاني",
        "ابعت واحدة تانية",
        "ابعث واحدة تانية"
    ];


    for (
        let i = 0;
        i < anotherMessageWords.length;
        i++
    ) {

        if (
            command.includes(
                anotherMessageWords[i]
            )
        ) {

            if (
                mobsarCurrentReceiverName
            ) {

                mobsarStartAnotherMessage();

            } else {

                speakQuick(
                    "قولي الأول اسم الشخص اللي عايزة تبعتي له."
                );
            }

            return true;
        }
    }


    return false;
}


/* =========================================================
   بدء رسالة لشخص
   ========================================================= */

function startMessageToPerson(personName) {

    mobsarStopMessageMic();
    mobsarStopConfirmationMic();


    mobsarCurrentReceiverName =
        mobsarCleanMessage(
            personName
        );


    /*
     * نقرأ الأسماء من عناصر HTML
     */

    const staffItems =
        document.querySelectorAll(
            ".staff-member-item"
        );


    let foundItem = null;


    staffItems.forEach(
        function (item) {

            const nameElement =
                item.querySelector(
                    ".staff-info h5"
                );


            if (!nameElement) {
                return;
            }


            const actualName =
                mobsarCleanMessage(
                    nameElement.innerText
                );


            if (
                actualName === personName ||
                actualName.includes(personName) ||
                personName.includes(actualName)
            ) {

                foundItem = item;

                mobsarCurrentReceiverName =
                    actualName;
            }
        }
    );


    if (!foundItem) {

        speakQuick(
            "مش لاقية " +
            personName +
            " في قائمة الدردشات."
        );

        return;
    }


    mobsarCurrentReceiverId =
        MOBSAR_EMPLOYEE_IDS[
            mobsarCurrentReceiverName
        ] || 0;


    /*
     * فتح الشات الموجود في HTML
     */

    foundItem.click();


    if (
        typeof recognition !==
        "undefined" &&
        recognition
    ) {

        try {
            recognition.stop();
        } catch (e) {}
    }


    if (
        typeof keepListening !==
        "undefined"
    ) {

        keepListening = false;
    }


    const input =
        document.getElementById(
            "waMessageInput"
        );


    if (!input) {

        speakQuick(
            "مش لاقية خانة كتابة الرسالة."
        );

        return;
    }


    input.value = "";

    mobsarMsgText = "";

    mobsarMsgProcessing = false;

    mobsarMsgFinishRequested = false;


    input.focus();


    const prompt =
        "تمام، هنبعت رسالة " +
        mobsarCurrentReceiverName +
        ". قولي الرسالة.";


    speakQuick(prompt);


    setTimeout(function () {

        if (input) {
            input.focus();
        }

        mobsarStartMessageMic();

    }, Math.max(2200, prompt.length * 75));
}


/* =========================================================
   أمر إرسال رسالة
   ========================================================= */

function handleVoiceMessageCommand(command) {

    if (!command) {
        return false;
    }


    const text =
        mobsarCleanMessage(
            command
        );


    /*
     * رسالة أخرى
     */

    if (
        mobsarHandleAnotherMessageCommand(
            text
        )
    ) {

        return true;
    }


    const sendCommand =
        text.includes("ابعت رسالة") ||
        text.includes("ابعث رسالة") ||
        text.includes("إبعت رسالة") ||
        text.includes("إبعث رسالة") ||
        text.includes("ارسل رسالة") ||
        text.includes("أرسل رسالة") ||
        text.includes("ارسلي رسالة") ||
        text.includes("عايزة أبعت رسالة") ||
        text.includes("عايز أبعت رسالة") ||
        text.includes("عايزة اكتب رسالة") ||
        text.includes("عايز اكتب رسالة");


    if (!sendCommand) {
        return false;
    }


    /*
     * الأسماء الموجودة في HTML
     */

    const names = [

        "سامي صبحي",
        "ماجدة سامي",
        "شهد",
        "منة",
        "مروة"
    ];


    let foundName = null;


    for (
        let i = 0;
        i < names.length;
        i++
    ) {

        if (
            text.includes(
                names[i]
            )
        ) {

            foundName =
                names[i];

            break;
        }
    }


    if (foundName) {

        startMessageToPerson(
            foundName
        );

        return true;
    }


    speakQuick(
        "قولي اسم الشخص اللي عايزة تبعتي له الرسالة."
    );


    setTimeout(
        function () {

            mobsarListenForRecipient();

        },
        1500
    );


    return true;
}


/* =========================================================
   سماع اسم الشخص
   ========================================================= */

function mobsarListenForRecipient() {

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;


    if (!SpeechRecognition) {
        return;
    }


    mobsarStopMessageMic();
    mobsarStopConfirmationMic();


    const recipientRecognition =
        new SpeechRecognition();


    recipientRecognition.lang =
        "ar-EG";

    recipientRecognition.continuous =
        false;

    recipientRecognition.interimResults =
        false;

    recipientRecognition.maxAlternatives =
        1;


    recipientRecognition.onresult =
        function (event) {

            const spokenName =
                mobsarCleanMessage(
                    event.results[0][0].transcript
                );


            const names = [

                "سامي صبحي",
                "ماجدة سامي",
                "شهد",
                "منة",
                "مروة"
            ];


            let foundName = null;


            for (
                let i = 0;
                i < names.length;
                i++
            ) {

                if (
                    spokenName.includes(
                        names[i]
                    ) ||
                    names[i].includes(
                        spokenName
                    )
                ) {

                    foundName =
                        names[i];

                    break;
                }
            }


            if (foundName) {

                startMessageToPerson(
                    foundName
                );

            } else {

                speakQuick(
                    "مش لاقية الشخص ده. قولي الاسم تاني."
                );


                setTimeout(
                    function () {

                        mobsarListenForRecipient();

                    },
                    1000
                );
            }
        };


    recipientRecognition.onerror =
        function () {

            setTimeout(
                function () {

                    mobsarListenForRecipient();

                },
                700
            );
        };


    try {

        recipientRecognition.start();

    } catch (e) {

        setTimeout(
            function () {

                mobsarListenForRecipient();

            },
            500
        );
    }
}


/* =========================================================
   ربط أوامر الرسائل بأوامر مبصر الأصلية
   ========================================================= */

(function () {

    const oldHandleVoiceCommand =
        window.handleVoiceCommand;


    window.handleVoiceCommand =
        function (text) {

            /*
             * أوامر الرسائل
             */

            if (
                handleVoiceMessageCommand(
                    text
                )
            ) {

                return;
            }


            /*
             * باقي أوامر الصفحة
             */

            if (
                typeof oldHandleVoiceCommand ===
                "function"
            ) {

                oldHandleVoiceCommand(
                    text
                );
            }
        };

})();
</script>

</body>
</body>
</html>