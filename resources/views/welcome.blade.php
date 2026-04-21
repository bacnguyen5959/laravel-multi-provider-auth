<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - OAuth System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-primary: #2563eb;
            --color-primary-dark: #1e40af;
            --color-google: #4285f4;
            --color-facebook: #1877f2;
            --color-text: #1f2937;
            --color-text-light: #6b7280;
            --color-border: #e5e7eb;
            --color-bg: #f9fafb;
            --color-white: #ffffff;
            --color-success: #10b981;
            --color-error: #ef4444;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--color-text);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 440px;
        }

        .card {
            background: var(--color-white);
            border-radius: 16px;
            padding: 48px 40px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .logo-icon svg {
            width: 32px;
            height: 32px;
            fill: white;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .logo p {
            font-size: 15px;
            color: var(--color-text-light);
            font-weight: 400;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .social-buttons {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 14px 24px;
            border: 1.5px solid var(--color-border);
            border-radius: 10px;
            background: var(--color-white);
            color: var(--color-text);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-social:hover {
            border-color: var(--color-text);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-social:active {
            transform: translateY(0);
        }

        .btn-social svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .btn-google:hover {
            border-color: var(--color-google);
            background: #f8faff;
        }

        .btn-facebook:hover {
            border-color: var(--color-facebook);
            background: #f8faff;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 32px 0;
            color: var(--color-text-light);
            font-size: 14px;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--color-border);
        }

        .divider span {
            padding: 0 16px;
        }

        .info-section {
            background: var(--color-bg);
            border-radius: 10px;
            padding: 20px;
            margin-top: 24px;
        }

        .info-section h3 {
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--color-border);
            font-size: 14px;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--color-text-light);
            font-weight: 500;
        }

        .info-value {
            color: var(--color-text);
            font-weight: 600;
        }

        .footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid var(--color-border);
        }

        .footer p {
            font-size: 13px;
            color: var(--color-text-light);
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .card {
                padding: 32px 24px;
            }

            .logo h1 {
                font-size: 24px;
            }

            .btn-social {
                font-size: 14px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V9h7V2.99c3.72 1.15 6.47 4.82 7 8.94h-7v1.06z"/>
                    </svg>
                </div>
                <h1>Chào mừng trở lại</h1>
                <p>Đăng nhập để tiếp tục sử dụng hệ thống</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                <svg viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px;">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                <svg viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px;">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            <div class="social-buttons">
                <a href="{{ route('auth.redirect', 'google') }}" class="btn-social btn-google">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Tiếp tục với Google
                </a>

                <a href="{{ route('auth.redirect', 'facebook') }}" class="btn-social btn-facebook">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                    </svg>
                    Tiếp tục với Facebook
                </a>
            </div>

            <div class="divider">
                <span>Thông tin sinh viên</span>
            </div>

            <div class="info-section">
                <h3>Thông tin cá nhân</h3>
                <div class="info-item">
                    <span class="info-label">Họ tên:</span>
                    <span class="info-value">{{ env('STUDENT_NAME', 'Nguyễn Văn A') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Mã sinh viên:</span>
                    <span class="info-value">{{ env('STUDENT_ID', '20201234') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Lớp:</span>
                    <span class="info-value">{{ env('STUDENT_CLASS', 'D18CNPM2') }}</span>
                </div>
            </div>

            <div class="footer">
                <p>Bằng cách đăng nhập, bạn đồng ý với <strong>Điều khoản dịch vụ</strong> và <strong>Chính sách bảo mật</strong> của chúng tôi.</p>
            </div>
        </div>
    </div>
</body>
</html>
