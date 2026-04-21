<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - OAuth System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-primary: #1a1a1a;
            --color-accent: #7a6f5d;
            --color-text: #0a0a0a;
            --color-text-secondary: #5a5a5a;
            --color-text-light: #8a8a8a;
            --color-border: #d4d4d4;
            --color-bg: #f8f8f7;
            --color-white: #ffffff;
            --color-cream: #ebe9e6;
            --color-success: #3d6b4a;
            --color-error: #b84545;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--color-white);
            min-height: 100vh;
            color: var(--color-text);
            line-height: 1.5;
        }

        .page-wrapper {
            display: grid;
            grid-template-columns: 380px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 60px 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .sidebar::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
        }

        .brand {
            margin-bottom: 80px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            background: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 85% 100%, 0 100%);
        }

        .brand-logo svg {
            width: 24px;
            height: 24px;
            fill: var(--color-primary);
        }

        .brand h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .brand p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        .sidebar-features {
            margin-top: auto;
        }

        .feature {
            margin-bottom: 32px;
            padding-left: 24px;
            border-left: 2px solid rgba(255, 255, 255, 0.2);
        }

        .feature h3 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }

        .feature p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.5;
        }

        .main-content {
            background: var(--color-bg);
            padding: 60px 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 520px;
        }

        .login-header {
            margin-bottom: 48px;
        }

        .login-header h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 36px;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 16px;
            color: var(--color-text-secondary);
        }

        .alert {
            padding: 16px 20px;
            margin-bottom: 32px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 3px solid;
        }

        .alert-success {
            background: #f0f7f3;
            color: var(--color-success);
            border-color: var(--color-success);
        }

        .alert-error {
            background: #fef2f2;
            color: var(--color-error);
            border-color: var(--color-error);
        }

        .social-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 48px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 24px;
            border: 2px solid var(--color-border);
            background: var(--color-white);
            color: var(--color-text);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            position: relative;
        }

        .btn-social::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--color-primary);
            transition: width 0.3s ease;
            z-index: 0;
        }

        .btn-social:hover::before {
            width: 4px;
        }

        .btn-social:hover {
            border-color: var(--color-primary);
            transform: translateX(4px);
        }

        .btn-social svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .btn-social span {
            position: relative;
            z-index: 1;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 48px 0;
            gap: 24px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--color-border);
        }

        .divider-text {
            font-size: 12px;
            font-weight: 600;
            color: var(--color-text-light);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .info-section {
            background: var(--color-white);
            border: 2px solid var(--color-border);
            padding: 32px;
        }

        .info-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--color-border);
        }

        .info-header h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-badge {
            padding: 4px 12px;
            background: var(--color-primary);
            color: var(--color-white);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .info-grid {
            display: grid;
            gap: 16px;
        }

        .info-item {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid var(--color-cream);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 13px;
            color: var(--color-text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 15px;
            color: var(--color-text);
            font-weight: 600;
        }

        .footer {
            margin-top: 48px;
            padding-top: 24px;
            border-top: 1px solid var(--color-border);
        }

        .footer p {
            font-size: 12px;
            color: var(--color-text-light);
            line-height: 1.6;
        }

        @media (max-width: 1024px) {
            .page-wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar {
                padding: 40px 32px;
                min-height: auto;
            }

            .sidebar::after {
                display: none;
            }

            .sidebar-features {
                display: none;
            }

            .main-content {
                padding: 40px 32px;
            }
        }

        @media (max-width: 640px) {
            .sidebar {
                padding: 32px 24px;
            }

            .main-content {
                padding: 32px 24px;
            }

            .login-header h2 {
                font-size: 28px;
            }

            .btn-social {
                padding: 16px 20px;
                font-size: 14px;
            }

            .info-item {
                grid-template-columns: 1fr;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <aside class="sidebar">
            <div>
                <div class="brand">
                    <div class="brand-logo">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                        </svg>
                    </div>
                    <h1>OAuth<br>Authentication<br>System</h1>
                    <p>Xác thực an toàn với Google và Facebook OAuth 2.0</p>
                </div>
            </div>

            <div class="sidebar-features">
                <div class="feature">
                    <h3>Bảo mật tuyệt đối</h3>
                    <p>Mã hóa end-to-end và xác thực hai yếu tố</p>
                </div>
                <div class="feature">
                    <h3>Đăng nhập nhanh chóng</h3>
                    <p>Truy cập ngay lập tức với tài khoản hiện có</p>
                </div>
                <div class="feature">
                    <h3>Dữ liệu được bảo vệ</h3>
                    <p>Tuân thủ tiêu chuẩn GDPR và ISO 27001</p>
                </div>
            </div>
        </aside>

        <main class="main-content">
            <div class="login-container">
                <div class="login-header">
                    <h2>Đăng nhập</h2>
                    <p>Chọn phương thức xác thực của bạn</p>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    <svg viewBox="0 0 20 20" fill="currentColor" style="width: 18px; height: 18px;">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-error">
                    <svg viewBox="0 0 20 20" fill="currentColor" style="width: 18px; height: 18px;">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('error') }}
                </div>
                @endif

                <div class="social-buttons">
                    <a href="{{ route('auth.redirect', 'google') }}" class="btn-social">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span>Tiếp tục với Google</span>
                    </a>

                    <a href="{{ route('auth.redirect', 'facebook') }}" class="btn-social">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                        </svg>
                        <span>Tiếp tục với Facebook</span>
                    </a>
                </div>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">Thông tin</span>
                    <div class="divider-line"></div>
                </div>

                <div class="info-section">
                    <div class="info-header">
                        <h3>Sinh viên</h3>
                        <div class="info-badge">VERIFIED</div>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Họ tên</span>
                            <span class="info-value">{{ env('STUDENT_NAME', 'Nguyễn Văn A') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Mã SV</span>
                            <span class="info-value">{{ env('STUDENT_ID', '20201234') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Lớp</span>
                            <span class="info-value">{{ env('STUDENT_CLASS', 'D18CNPM2') }}</span>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <p>Bằng cách đăng nhập, bạn đồng ý với Điều khoản dịch vụ và Chính sách bảo mật. Dữ liệu của bạn được mã hóa và bảo vệ theo tiêu chuẩn quốc tế.</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
