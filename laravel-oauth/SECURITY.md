# ⚠️ CẢNH BÁO BẢO MẬT

## 🔒 Thông tin nhạy cảm - KHÔNG ĐƯỢC COMMIT

Trước khi push code lên GitHub, hãy đảm bảo các file sau **KHÔNG BAO GIỜ** được commit:

### ❌ File TUYỆT ĐỐI KHÔNG COMMIT:

1. **`.env`** - Chứa tất cả credentials thật
   - Database password
   - Google Client ID & Secret
   - Facebook App ID & Secret
   - API keys
   - Thông tin sinh viên

2. **`composer.lock`** - Có thể chứa thông tin về dependencies cụ thể

3. **`/storage/logs/*.log`** - Có thể chứa thông tin debug nhạy cảm

4. **`/database/database.sqlite`** - Database file với dữ liệu thật

### ✅ File AN TOÀN để commit:

1. **`.env.example`** - Template không chứa thông tin thật
2. **`README.md`** - Hướng dẫn chung
3. **`INSTALLATION_GUIDE.md`** - Hướng dẫn cài đặt
4. **Source code** - Tất cả file PHP, Blade, CSS, JS

---

## 🔍 Kiểm tra trước khi push

### Bước 1: Kiểm tra file .env

```bash
# File .env KHÔNG được xuất hiện trong git status
git status
```

Nếu thấy `.env` trong danh sách, chạy:

```bash
git rm --cached .env
```

### Bước 2: Kiểm tra nội dung sẽ commit

```bash
# Xem tất cả thay đổi sẽ được commit
git diff --cached
```

Đảm bảo KHÔNG có:
- ❌ Client ID thật
- ❌ Client Secret thật
- ❌ Database password thật
- ❌ API keys thật
- ❌ Thông tin cá nhân thật

### Bước 3: Kiểm tra .gitignore

Đảm bảo file `.gitignore` có các dòng sau:

```
.env
.env.backup
.env.production
*.sqlite
composer.lock
/storage/logs/*.log
```

---

## 🛡️ Nếu đã commit nhầm thông tin nhạy cảm

### Cách 1: Xóa file khỏi Git history (Khuyến nghị)

```bash
# Xóa file khỏi Git nhưng giữ lại local
git rm --cached .env

# Commit thay đổi
git commit -m "Remove sensitive file"

# Push
git push origin main
```

### Cách 2: Xóa hoàn toàn khỏi history (Nếu đã push)

```bash
# Cài đặt git-filter-repo
pip install git-filter-repo

# Xóa file khỏi toàn bộ history
git filter-repo --path .env --invert-paths

# Force push (CHÚ Ý: Sẽ ghi đè history)
git push origin --force --all
```

### Cách 3: Tạo lại credentials (AN TOÀN NHẤT)

1. **Google OAuth:**
   - Vào Google Cloud Console
   - Xóa OAuth Client cũ
   - Tạo OAuth Client mới
   - Cập nhật credentials mới vào `.env`

2. **Facebook OAuth:**
   - Vào Facebook Developers
   - Reset App Secret
   - Hoặc tạo App mới
   - Cập nhật credentials mới vào `.env`

3. **Database:**
   - Đổi password MySQL
   - Cập nhật vào `.env`

---

## 📝 Checklist trước khi push

- [ ] File `.env` KHÔNG có trong `git status`
- [ ] File `.env.example` chỉ chứa placeholder values
- [ ] Không có Client ID/Secret thật trong source code
- [ ] Không có database password trong source code
- [ ] File `.gitignore` đã được cấu hình đúng
- [ ] Đã chạy `git diff --cached` để kiểm tra
- [ ] Đã đọc kỹ SECURITY.md này

---

## 🚨 Nếu phát hiện credentials bị lộ

1. **NGAY LẬP TỨC** đổi tất cả credentials:
   - Google OAuth Client Secret
   - Facebook App Secret
   - Database password

2. Xóa credentials cũ khỏi Git history

3. Kiểm tra logs để xem có ai truy cập trái phép không

4. Cập nhật `.env` với credentials mới

---

## 📚 Tài liệu tham khảo

- [GitHub: Removing sensitive data](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/removing-sensitive-data-from-a-repository)
- [Git: git-filter-repo](https://github.com/newren/git-filter-repo)
- [OWASP: Secrets Management](https://owasp.org/www-community/vulnerabilities/Use_of_hard-coded_password)

---

## ⚡ Quick Commands

```bash
# Kiểm tra file sẽ commit
git status

# Xem nội dung sẽ commit
git diff --cached

# Xóa file khỏi staging
git reset HEAD .env

# Xóa file khỏi Git (giữ local)
git rm --cached .env

# Kiểm tra .gitignore có hoạt động không
git check-ignore -v .env
```

---

**LƯU Ý CUỐI CÙNG:** Khi làm việc với OAuth và API keys, luôn coi chúng như mật khẩu. KHÔNG BAO GIỜ chia sẻ hoặc commit lên public repository!
