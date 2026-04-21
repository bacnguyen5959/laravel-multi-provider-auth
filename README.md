# Hệ thống đăng nhập OAuth (Google & Facebook)

## Thông tin sinh viên
- **Họ tên**: Nguyễn Trần Xuân Bắc
- **Mã sinh viên**: 23810310100
- **Lớp**: D18CNPM2

---

## 📋 Mô tả dự án

Ứng dụng web Laravel với giao diện chuyên nghiệp, cho phép người dùng đăng nhập bằng tài khoản Google và Facebook thông qua OAuth 2.0. Hệ thống tự động tạo tài khoản mới hoặc đăng nhập nếu tài khoản đã tồn tại, lưu trữ thông tin người dùng vào database MySQL.

### Công nghệ sử dụng
- **Backend**: Laravel 11.x
- **OAuth**: Laravel Socialite
- **Database**: MySQL
- **Frontend**: HTML, CSS (Custom design)
- **Authentication**: Google OAuth 2.0, Facebook OAuth 2.0

---

## ✨ Tính năng

✅ **Đăng nhập OAuth 2.0**
- Đăng nhập bằng Google
- Đăng nhập bằng Facebook
- Tự động tạo tài khoản mới nếu chưa tồn tại
- Tự động đăng nhập nếu tài khoản đã có

✅ **Quản lý người dùng**
- Lưu thông tin: tên, email, avatar, provider
- Hiển thị thông tin chi tiết trên dashboard
- Hiển thị thông tin sinh viên (từ .env)

✅ **Giao diện chuyên nghiệp**
- Design hiện đại với typography đẹp
- Responsive trên mọi thiết bị
- Màu sắc trung tính, chuyên nghiệp
- Animations mượt mà

✅ **Bảo mật**
- SSL certificate handling cho development
- Stateless authentication cho Facebook
- Xử lý lỗi đầy đủ
- Không hardcode credentials

✅ **Xử lý đặc biệt**
- Facebook không trả về email → Tự tạo email unique
- Chỉ yêu cầu `public_profile` scope cho Facebook
- Xử lý SSL certificate error trong development

---

## 🔧 Yêu cầu hệ thống

- PHP >= 8.1
- Composer
- MySQL >= 5.7 hoặc MySQL Workbench
- Node.js & NPM (optional)
- Web browser hiện đại

---

## 📦 Cài đặt

### Bước 1: Clone repository

```bash
git clone <repository-url>
cd laravel-oauth
```

### Bước 2: Cài đặt dependencies

```bash
composer install
```

### Bước 3: Tạo database

Mở MySQL Workbench và chạy:

```sql
CREATE DATABASE laravel_oauth CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Hoặc chạy file SQL có sẵn:

```sql
-- Chạy file: MANUAL_DATABASE_SETUP.sql
```

### Bước 4: Cấu hình file .env

Copy file `.env.example` thành `.env`:

```bash
cp .env.example .env
```

Cập nhật thông tin trong file `.env`:

```env
# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_oauth
DB_USERNAME=root
DB_PASSWORD=your_mysql_password

# Google OAuth
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback

# Facebook OAuth
FACEBOOK_CLIENT_ID=your-facebook-app-id
FACEBOOK_CLIENT_SECRET=your-facebook-app-secret
FACEBOOK_REDIRECT_URL=http://localhost:8000/auth/facebook/callback

# Thông tin sinh viên
STUDENT_NAME="Nguyễn Trần Xuân Bắc"
STUDENT_ID="23810310100"
STUDENT_CLASS="D18CNPM2"
```

### Bước 5: Generate application key

```bash
php artisan key:generate
```

### Bước 6: Chạy migration

```bash
php artisan migrate
```

### Bước 7: Khởi động server

```bash
php artisan serve
```

Truy cập: **http://localhost:8000**

---

## 🔑 Cấu hình OAuth

### Google OAuth

1. Truy cập [Google Cloud Console](https://console.cloud.google.com/)
2. Tạo project mới hoặc chọn project có sẵn
3. Vào **APIs & Services** > **Credentials**
4. Click **Create Credentials** > **OAuth 2.0 Client ID**
5. Cấu hình OAuth consent screen (nếu chưa có)
6. Application type: **Web application**
7. Authorized redirect URIs: `http://localhost:8000/auth/google/callback`
8. Copy **Client ID** và **Client Secret** vào file `.env`

### Facebook OAuth

1. Truy cập [Facebook Developers](https://developers.facebook.com/)
2. Click **My Apps** > **Create App**
3. Chọn use case và app type phù hợp
4. Vào **App settings** > **Basic**
5. Copy **App ID** và **App Secret** vào file `.env`
6. Vào **App roles** > **Roles** > **Add people**
7. Thêm email Facebook của bạn làm **Administrator**

**Lưu ý quan trọng về Facebook:**
- KHÔNG cần cấu hình App domains (Facebook không cho phép localhost)
- KHÔNG cần cấu hình Privacy Policy URL
- KHÔNG cần thêm redirect URI trong Facebook Dashboard
- Hệ thống chỉ yêu cầu `public_profile` scope (không yêu cầu email)
- Facebook sẽ không trả về email, hệ thống tự tạo email unique
- App có thể để ở chế độ Development

---

## 📁 Cấu trúc project

```
laravel-oauth/
├── app/
│   ├── Http/Controllers/Auth/
│   │   └── SocialAuthController.php    # Controller xử lý OAuth
│   ├── Models/
│   │   └── User.php                    # Model User
│   └── Services/
│       └── SocialAuthService.php       # Service xử lý logic OAuth
├── config/
│   └── services.php                    # Cấu hình OAuth providers
├── database/
│   └── migrations/
│       └── 2024_01_01_000001_create_oauth_users_table.php
├── resources/
│   └── views/
│       ├── welcome.blade.php           # Trang login
│       └── dashboard.blade.php         # Trang dashboard
├── routes/
│   └── web.php                         # Routes
├── .env.example                        # Template file .env
├── INSTALLATION_GUIDE.md               # Hướng dẫn cài đặt chi tiết
├── MANUAL_DATABASE_SETUP.sql           # Script tạo database thủ công
└── README.md                           # File này
```

---

## 🚀 Sử dụng

### Đăng nhập

1. Truy cập `http://localhost:8000`
2. Click **"Tiếp tục với Google"** hoặc **"Tiếp tục với Facebook"**
3. Đăng nhập bằng tài khoản Google/Facebook
4. Cho phép quyền truy cập
5. Hệ thống tự động redirect về dashboard

### Dashboard

Sau khi đăng nhập thành công, bạn sẽ thấy:
- Thông tin cá nhân (tên, email, avatar)
- Provider đã sử dụng (Google/Facebook)
- Thông tin sinh viên
- Ngày đăng ký và cập nhật cuối

### Đăng xuất

Click nút **"Đăng xuất"** ở góc trên bên phải để đăng xuất.

---

## 🔍 Kiểm tra database

Mở MySQL Workbench và chạy:

```sql
USE laravel_oauth;
SELECT * FROM users;
```

Bạn sẽ thấy thông tin user đã được lưu với các trường:
- `id`: ID tự động tăng
- `name`: Tên từ OAuth provider
- `email`: Email (hoặc email giả nếu Facebook không cung cấp)
- `provider`: google hoặc facebook
- `provider_id`: ID từ OAuth provider
- `avatar`: URL avatar
- `created_at`, `updated_at`: Timestamps

---

## ⚠️ Xử lý lỗi thường gặp

### Lỗi 1: "SQLSTATE[HY000] [1045] Access denied"
**Giải pháp**: Kiểm tra `DB_USERNAME` và `DB_PASSWORD` trong file `.env`

### Lỗi 2: "invalid_grant" (Google)
**Giải pháp**: 
- Xóa OAuth Client cũ và tạo mới
- Đảm bảo redirect URI khớp chính xác
- Clear cache: `php artisan config:clear`
- Đóng hết trình duyệt và mở lại

### Lỗi 3: "Invalid Scopes: email" (Facebook)
**Giải pháp**: 
- Code đã được cấu hình để chỉ dùng `public_profile`
- Clear cache: `php artisan config:clear`
- Restart server
- Dùng Incognito mode

### Lỗi 4: "Can't Load URL" (Facebook)
**Giải pháp**: 
- Thêm email làm Administrator trong App roles > Roles
- Đăng nhập bằng email đã thêm

---

## 📝 Ghi chú quan trọng

1. **Không commit file .env** lên GitHub (đã có trong .gitignore)
2. **Giữ bí mật** Client ID và Client Secret
3. **Facebook không trả về email**: Hệ thống tự tạo email unique (ví dụ: `facebook_122261436230156046@oauth.local`)
4. **Chỉ yêu cầu public_profile**: Không yêu cầu email permission để tránh lỗi
5. Khi deploy production, cần cập nhật redirect URI với domain thật

---

## 📚 Tài liệu tham khảo

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Socialite](https://laravel.com/docs/socialite)
- [Google OAuth 2.0](https://developers.google.com/identity/protocols/oauth2)
- [Facebook Login](https://developers.facebook.com/docs/facebook-login)

---

## 📄 License

This project is open-sourced software licensed under the MIT license.

Nếu gặp vấn đề, vui lòng:
1. Kiểm tra file `INSTALLATION_GUIDE.md` để biết hướng dẫn chi tiết
2. Xem logs: `storage/logs/laravel.log`
3. Kiểm tra browser console (F12)
