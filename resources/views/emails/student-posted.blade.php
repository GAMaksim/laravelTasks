<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #3b82f6;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .student-info {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .student-info p {
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #374151;
        }
        .value {
            color: #1f2937;
        }
        .action-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .badge-created {
            background-color: #10b981;
            color: white;
        }
        .badge-updated {
            background-color: #f59e0b;
            color: white;
        }
        .badge-deleted {
            background-color: #ef4444;
            color: white;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 Student Notification</h1>
        </div>
        
        <div class="content">
            @if($action === 'created')
                <span class="action-badge badge-created">✅ YANGI STUDENT QO'SHILDI</span>
                <p>Hurmatli {{ $student->user->name }},</p>
                <p>Siz yangi student qo'shdingiz!</p>
            @elseif($action === 'updated')
                <span class="action-badge badge-updated">📝 YANGILANDI</span>
                <p>Hurmatli {{ $student->user->name }},</p>
                <p>Student ma'lumotlari yangilandi!</p>
            @elseif($action === 'deleted')
                <span class="action-badge badge-deleted">🗑️ O'CHIRILDI</span>
                <p>Hurmatli {{ $student->user->name }},</p>
                <p>Student o'chirildi!</p>
            @endif

            <div class="student-info">
                <h3 style="margin-top: 0; color: #1f2937;">Student Ma'lumotlari:</h3>
                
                <p>
                    <span class="label">ID:</span>
                    <span class="value">{{ $student->id }}</span>
                </p>
                
                <p>
                    <span class="label">Ism:</span>
                    <span class="value">{{ $student->name }}</span>
                </p>
                
                <p>
                    <span class="label">Familiya:</span>
                    <span class="value">{{ $student->lastname }}</span>
                </p>
                
                @if($student->email)
                    <p>
                        <span class="label">Email:</span>
                        <span class="value">{{ $student->email }}</span>
                    </p>
                @endif
                
                @if($student->age)
                    <p>
                        <span class="label">Yosh:</span>
                        <span class="value">{{ $student->age }}</span>
                    </p>
                @endif
                
                <p>
                    <span class="label">Sana:</span>
                    <span class="value">{{ now()->format('d.m.Y H:i') }}</span>
                </p>
            </div>

            @if($action !== 'deleted')
                <p style="text-align: center; margin-top: 30px;">
                    <a href="http://example.test/students/{{ $student->id }}" 
                       style="background-color: #3b82f6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 6px; display: inline-block;">
                        👁️ Student ni ko'rish
                    </a>
                </p>
            @endif
        </div>
        
        <div class="footer">
            <p>© 2025 Laravel Tasks | Automated Notification</p>
            <p style="font-size: 12px; color: #9ca3af;">Bu avtomatik xabar. Javob bermang.</p>
        </div>
    </div>
</body>
</html>