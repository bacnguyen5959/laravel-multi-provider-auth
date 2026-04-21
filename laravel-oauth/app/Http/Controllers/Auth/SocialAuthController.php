<?php

/**
 * Controller xử lý đăng nhập OAuth
 * Họ tên: [Nhập họ tên của bạn]
 * Mã sinh viên: [Nhập mã sinh viên của bạn]
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthService;
use Exception;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    protected $socialAuthService;

    public function __construct(SocialAuthService $socialAuthService)
    {
        $this->socialAuthService = $socialAuthService;
    }

    /**
     * Redirect đến provider
     */
    public function redirectToProvider(string $provider)
    {
        // Validate provider
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('welcome')
                ->with('error', 'Provider không hợp lệ.');
        }

        try {
            return $this->socialAuthService->redirectToProvider($provider);
        } catch (Exception $e) {
            return redirect()->route('welcome')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Xử lý callback từ provider
     */
    public function handleProviderCallback(string $provider)
    {
        // Validate provider
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('welcome')
                ->with('error', 'Provider không hợp lệ.');
        }

        try {
            $user = $this->socialAuthService->handleProviderCallback($provider);
            
            return redirect()->route('dashboard')
                ->with('success', 'Đăng nhập thành công!');
                
        } catch (Exception $e) {
            return redirect()->route('welcome')
                ->with('error', 'Đăng nhập thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Đăng xuất
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')
            ->with('success', 'Đã đăng xuất thành công.');
    }
}
