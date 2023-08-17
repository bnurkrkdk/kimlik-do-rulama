<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];
    protected $middleware = [
        // ...
        \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->app['auth']->extend('api', function ($app) {
            return new \Laravel\Passport\PassportGuard($app);
        });

        $this->registerPolicies();


    }
}
/*class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
//    ];//

//    /**
//     * Register any authentication / authorization services.
//     *
//     * @return void
//     */
//    public function boot()
//    {
//        $this->registerPolicies();//

//        Passport::routes();
//    }
//}*/

