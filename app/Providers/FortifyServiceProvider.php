<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(request()->isAdmin()){
            config(['fortify.domain' => adminUrl()]);
            config(['fortify.guard' => 'admin']);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function(){
            if(request()->isAdmin()){
                return view('admin.auth.login');
            }
            return view('auth.login');
        });
        Fortify::registerView(function(){
            if(request()->isAdmin()){
                abort(404);
            }
            return view('auth.register');
        });
        Fortify::resetPasswordView(function(){
            if(request()->isAdmin()){
                return view('admin.auth.resetPassword');
            }
            return view('auth.resetPassword');
        });
    }
}
