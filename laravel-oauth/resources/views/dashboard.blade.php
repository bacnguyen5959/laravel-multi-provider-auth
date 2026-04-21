<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - OAuth System</title>
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
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--color-bg);
            color: var(--color-text);
            line-height: 1.5;
            min-height: 100vh;
        }

        .navbar {
            background: var(--color-white);
            border-bottom: 2px solid var(--color-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 24px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
        }

        .navbar-brand-icon {
            width: 40px;
            height: 40px;
            background: var(--color-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 85% 100%, 0 100%);
        }

        .navbar-brand-icon svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        .navbar-brand-text {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--color-primary);
            letter-spacing: -0.3px;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text);
            display: block;
        }

        .user-email {
            font-size: 12px;
            color: var(--color-text-light);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border: 2px solid var(--color-border);
            clip-path: polygon(0 0, 100% 0, 100% 85%, 85% 100%, 0 100%);
        }

        .btn-logout {
            padding: 10px 24px;
            background: var(--color-primary);
            border: none;
            color: var(--color-white);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-logout:hover {
            background: var(--color-accent);
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 48px;
        }

        .alert {
            padding: 18px 24px;
            margin-bottom: 32px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f0f7f3;
            color: var(--color-success);
            border-left: 4px solid var(--color-success);
        }

        .page-header {
            margin-bottom: 48px;
            padding-bottom: 32px;
            border-bottom: 2px solid var(--color-border);
        }

        .page-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 48px;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 12px;
            letter-spacing: -1px;
        }

        .page-subtitle {
            font-size: 16px;
            color: var(--color-text-secondary);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 32px;
            margin-bottom: 32px;
        }

        .profile-card {
            background: var(--color-white);
            border: 2px solid var(--color-border);
            padding: 48px;
        }

        .profile-header {
            display: flex;
            gap: 32px;
            margin-bottom: 40px;
            padding-bottom: 32px;
            border-bottom: 1px solid var(--color-border);
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid var(--color-border);
            flex-shrink: 0;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 90% 100%, 0 100%);
        }

        .profile-info h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .profile-info p {
            font-size: 15px;
            color: var(--color-text-secondary);
            margin-bottom: 16px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: var(--color-primary);
            color: var(--color-white);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge svg {
            width: 14px;
            height: 14px;
        }

        .info-list {
            display: grid;
            gap: 20px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 24px;
            padding: 16px 0;
            border-bottom: 1px solid var(--color-cream);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 12px;
            color: var(--color-text-secondary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            font-size: 15px;
            color: var(--color-text);
            font-weight: 600;
        }

        .sidebar-card {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-card h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 32px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .student-info {
            display: grid;
            gap: 24px;
        }

        .student-item {
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .student-item-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .student-item-value {
            font-size: 18px;
            font-weight: 700;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .stat-card {
            background: var(--color-white);
            border: 2px solid var(--color-border);
            padding: 32px;
            position: relative;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--color-accent);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: var(--color-cream);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            fill: var(--color-accent);
        }

        .stat-label {
            font-size: 12px;
            color: var(--color-text-secondary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--color-primary);
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .navbar-container {
                padding: 20px 24px;
            }

            .container {
                padding: 32px 24px;
            }

            .profile-card {
                padding: 32px 24px;
            }

            .profile-header {
                flex-direction: column;
            }

            .page-title {
                font-size: 36px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .info-row {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .user-info {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <div class="navbar-brand-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                    </svg>
                </div>
                <span class="navbar-brand-text">OAUTH SYSTEM</span>
            </a>

            <div class="navbar-user">
                <div class="user-info">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <span class="user-email">{{ auth()->user()->email }}</span>
                </div>
                @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="user-avatar">
                @else
                <div class="user-avatar" style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 18px;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Đăng xuất</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert">
            <svg viewBox="0 0 20 20" fill="currentColor" style="width: 18px; height: 18px;">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="page-header">
            <h1 class="page-title">DASHBOARD</h1>
            <p class="page-subtitle">Quản lý thông tin tài khoản và hồ sơ cá nhân</p>
        </div>

        <div class="dashboard-grid">
            <div class="profile-card">
                <div class="profile-header">
                    @if(auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="profile-avatar-large">
                    @else
                    <div class="profile-avatar-large" style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 48px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    @endif
                    <div class="profile-info">
                        <h2>{{ auth()->user()->name }}</h2>
                        <p>{{ auth()->user()->email }}</p>
                        <div class="badge">
                            @if(auth()->user()->provider === 'google')
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"/>
                            </svg>
                            Google
                            @elseif(auth()->user()->provider === 'facebook')
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="currentColor"/>
                            </svg>
                            Facebook
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-list">
                    <div class="info-row">
                        <span class="info-label">User ID</span>
                        <span class="info-value">#{{ auth()->user()->id }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ auth()->user()->email }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Provider</span>
                        <span class="info-value">{{ ucfirst(auth()->user()->provider) }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Provider ID</span>
                        <span class="info-value">{{ substr(auth()->user()->provider_id, 0, 20) }}...</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Ngày đăng ký</span>
                        <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Cập nhật cuối</span>
                        <span class="info-value">{{ auth()->user()->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <div class="sidebar-card">
                <div>
                    <h3>Sinh viên</h3>
                    <div class="student-info">
                        <div class="student-item">
                            <div class="student-item-label">Họ và tên</div>
                            <div class="student-item-value">{{ env('STUDENT_NAME', 'N/A') }}</div>
                        </div>
                        <div class="student-item">
                            <div class="student-item-label">Mã sinh viên</div>
                            <div class="student-item-value">{{ env('STUDENT_ID', 'N/A') }}</div>
                        </div>
                        <div class="student-item">
                            <div class="student-item-label">Lớp</div>
                            <div class="student-item-value">{{ env('STUDENT_CLASS', 'N/A') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-label">Trạng thái</div>
                <div class="stat-value" style="color: var(--color-success);">Đã xác thực</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-label">Bảo mật</div>
                <div class="stat-value">OAuth 2.0</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                    </svg>
                </div>
                <div class="stat-label">Phiên đăng nhập</div>
                <div class="stat-value" style="color: var(--color-success);">Hoạt động</div>
            </div>
        </div>
    </div>
</body>
</html>
