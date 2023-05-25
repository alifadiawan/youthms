<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer(['layout.topbar', 'Admin.*'], function ($view) {
            $notifications = [];
            if (Auth::check()) {
                $notifications = Auth::user()->unreadNotifications;
            }
            $view->with('notifications', $notifications);
        });

        View::composer(['layout-landing2.topbar', 'EU.*'], function ($view) {
            $badge = [];
            if (auth()->check()) {
                $member = Member::where('id', '=', auth()->user()->member->id)->first();
                $badge = Cart::where('member_id', '=', $member->id)->get();
            }

            // dd($badge);
            $view->with('badge', $badge);
        });
    }
}
