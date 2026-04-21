<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - OAuth System</title>
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
            --color-text: #1f2937;
            --color-text-light: #6b7280;
            --color-border: #e5e7eb;
            --color-bg: #f9fafb;
            --color-white: #ffffff;
            --color-success: #10b981;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--color-bg);
            color: var(--color-text);
            line-height: 1.6;
            min-height: 100vh;
        }

        .navbar {
            background: var(--color-white);
            border-bottom: 1px solid var(--color-border);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            color: var(--color-text);
            text-decoration: none;
        }

        .navbar-brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-brand-icon svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
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
            font-size: 13px;
            color: var(--color-text-light);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--color-border);
        }

        .btn-logout {
            padding: 10px 20px;
            background: var(--color-white);
            border: 1.5px solid var(--color-border);
            border-radius: 8px;
            color: var(--color-text);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn-logout:hover {
            border-color: var(--color-text);
            background: var(--color-bg);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 32px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 16px;
            color: var(--color-text-light);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .card {
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 24px;
            transition: all 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-icon svg {
            width: 24px;
            height: 24px;
        }

        .card-icon-blue {
            background: #dbeafe;
            color: #1e40af;
        }

        .card-icon-green {
            background: #d1fae5;
            color: #065f46;
        }

        .card-icon-purple {
            background: #e9d5ff;
            color: #6b21a8;
        }

        .card-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-content {
            margin-top: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--color-border);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 14px;
            color: var(--color-text-light);
            font-weight: 500;
        }

        .info-value {
            font-size: 14px;
            color: var(--color-text);
            font-weight: 600;
        }

        .profile-card {
            grid-column: 1 / -1;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--color-border);
            margin-bottom: 24px;
        }

        .profile-avatar {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-border);
        }

        .profile-info h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: 4px;
        }

        .profile-info p {
            font-size: 15px;
            color: var(--color-text-light);
            margin-bottom: 12px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #dbeafe;
            color: #1e40af;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge svg {
            width: 16px;
            height: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        @media (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .navbar-user {
                width: 100%;
                justify-content: space-between;
            }

            .user-info {
                text-align: left;
            }

            .page-title {
                font-size: 24px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .grid {
                grid-template-columns: 1fr;
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
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V9h7V2.99c3.72 1.15 6.47 4.82 7 8.94h-7v1.06z"/>
                    </svg>
                </div>
                OAuth System
            </a>

            <div class="navbar-user">
                <div class="user-info">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <span class="user-email">{{ auth()->user()->email }}</span>
                </div>
                @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="user-avatar">
                @else
                <div class="user-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 18px;">
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
            <svg viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px;">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="page-header">
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Chào mừng bạn đến với hệ thống quản lý OAuth</p>
        </div>

        <div class="grid">
            <div class="card profile-card">
                <div class="profile-header">
                    @if(auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="profile-avatar">
                    @else
                    <div class="profile-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 36px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    @endif
                    <div class="profile-info">
                        <h2>{{ auth()->user()->name }}</h2>
                        <p>{{ auth()->user()->email }}</p>
                        <div class="badge">
                            @if(auth()->user()->provider === 'google')
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            </svg>
                            Đăng nhập bằng Google
                            @elseif(auth()->user()->provider === 'facebook')
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                            </svg>
                            Đăng nhập bằng Facebook
                            @endif
                        </div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="info-row">
                        <span class="info-label">Họ tên:</span>
                        <span class="info-value">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ auth()->user()->email }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Provider:</span>
                        <span class="info-value">{{ ucfirst(auth()->user()->provider) }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Ngày tạo:</span>
                        <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon card-icon-blue">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Thông tin tài khoản</h3>
                </div>
                <div class="card-content">
                    <div class="info-row">
                        <span class="info-label">User ID:</span>
                        <span class="info-value">#{{ auth()->user()->id }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Provider ID:</span>
                        <span class="info-value">{{ substr(auth()->user()->provider_id, 0, 12) }}...</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Trạng thái:</span>
                        <span class="info-value" style="color: var(--color-success);">Đã xác thực</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon card-icon-green">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Thông tin sinh viên</h3>
                </div>
                <div class="card-content">
                    <div class="info-row">
                        <span class="info-label">Họ tên:</span>
                        <span class="info-value">{{ env('STUDENT_NAME', 'N/A') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Mã sinh viên:</span>
                        <span class="info-value">{{ env('STUDENT_ID', 'N/A') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Lớp:</span>
                        <span class="info-value">{{ env('STUDENT_CLASS', 'N/A') }}</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon card-icon-purple">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Hoạt động gần đây</h3>
                </div>
                <div class="card-content">
                    <div class="info-row">
                        <span class="info-label">Đăng nhập lần đầu:</span>
                        <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Cập nhật cuối:</span>
                        <span class="info-value">{{ auth()->user()->updated_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phiên đăng nhập:</span>
                        <span class="info-value" style="color: var(--color-success);">Đang hoạt động</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
