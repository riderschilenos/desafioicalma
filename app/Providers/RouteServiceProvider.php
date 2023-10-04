<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
            
            Route::middleware('web','auth')
                ->name('admin.')
                ->prefix('admin')
                //->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware('web','auth')
                ->name('filmmaker.')
                ->prefix('filmmaker')
               // ->namespace($this->namespace)
                ->group(base_path('routes/filmmaker.php'));   

            Route::middleware('web')
                ->name('garage.')
                ->prefix('garage')
                ->namespace($this->namespace)
                ->group(base_path('routes/garage.php'));  

            Route::middleware('web','auth')
                ->name('vendedor.')
                ->prefix('vendedor')
                //->namespace($this->namespace)
                ->group(base_path('routes/vendedor.php'));   
            
            Route::middleware('web')
                ->name('ticket.')
                //->namespace($this->namespace)
                ->group(base_path('routes/ticket.php'));
            
            Route::middleware('web')
                ->name('whatsapp.')
                //->namespace($this->namespace)
                ->group(base_path('routes/whatsapp.php'));
            
            Route::middleware('web')
                ->name('organizador.')
                ->prefix('organizador')
                //->namespace($this->namespace)
                ->group(base_path('routes/organizador.php'));

            Route::middleware('web')
                ->name('payment.')
                ->prefix('payment')
                ->namespace($this->namespace)
                ->group(base_path('routes/payment.php'));  
                
            Route::middleware('web')
                ->name('socio.')
                //->namespace($this->namespace)
                ->group(base_path('routes/socio.php'));
        
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
