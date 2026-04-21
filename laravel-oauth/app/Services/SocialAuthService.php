<?php

/**
 * Service xử lý đăng nhập OAuth
 * Họ tên: [Nhập họ tên của bạn]
 * Mã sinh viên: [Nhập mã sinh viên của bạn]
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialAuthService
{
    /**
     * Redirect đến trang đăng nhập của provider
     */
    public function redirectToProvider(string $provider)
    {
        try {
            $driver = Socialite::driver($provider);
            
            // Cấu hình cho Facebook
            if ($provider === 'facebook') {
                // Ghi đè hoàn toàn scopes, chỉ dùng public_profile
                return $driver->stateless()->setScopes(['public_profile'])->redirect();
            }
            
            return $driver->redirect();
        } catch (Exception $e) {
            throw new Exception("Không thể kết nối đến {$provider}. Vui lòng kiểm tra cấu hình.");
        }
    }

    /**
     * Xử lý callback từ provider
     */
    public function handleProviderCallback(string $provider)
    {
        try {
            // Tắt SSL verify cho development (fix lỗi certificate)
            $driver = Socialite::driver($provider);
            
            if (config('app.env') !== 'production') {
                $driver->setHttpClient(new \GuzzleHttp\Client([
                    'verify' => false,
                ]));
            }
            
            // Sử dụng stateless cho Facebook
            if ($provider === 'facebook') {
                $socialUser = $driver->stateless()->user();
            } else {
                $socialUser = $driver->user();
            }
            
            // Tìm hoặc tạo user
            $user = $this->findOrCreateUser($socialUser, $provider);
            
            // Đăng nhập
            Auth::login($user, true);
            
            return $user;
            
        } catch (Exception $e) {
            throw new Exception("Đăng nhập thất bại: " . $e->getMessage());
        }
    }

    /**
     * Tìm hoặc tạo user mới
     */
    private function findOrCreateUser($socialUser, string $provider): User
    {
        // Tìm user theo provider và provider_id
        $user = User::where('provider', $provider)
                    ->where('provider_id', $socialUser->getId())
                    ->first();

        if ($user) {
            // Cập nhật thông tin nếu có thay đổi
            $user->update([
                'name' => $socialUser->getName(),
                'avatar' => $socialUser->getAvatar(),
            ]);
            return $user;
        }

        // Lấy email (có thể null với Facebook)
        $email = $socialUser->getEmail();
        
        // Nếu có email, kiểm tra email đã tồn tại chưa
        if ($email) {
            $existingUser = User::where('email', $email)->first();
            
            if ($existingUser) {
                // Liên kết tài khoản social với tài khoản hiện có
                $existingUser->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
                return $existingUser;
            }
        }

        // Tạo user mới
        // Nếu không có email, tạo email giả từ provider_id
        $userEmail = $email ?: $provider . '_' . $socialUser->getId() . '@oauth.local';
        
        return User::create([
            'name' => $socialUser->getName(),
            'email' => $userEmail,
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
            'email_verified_at' => now(),
        ]);
    }
}
