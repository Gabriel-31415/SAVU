<?php

namespace App\Providers;

use App\Models\User;
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

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
 
        Gate::define('ver-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'] ||
                    $user->tipo == User::TIPO_ENUM['professor'];
        });
        
        Gate::define('ver-minha-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['user'] ||
                    $user->tipo == User::TIPO_ENUM['admin'] ||
                    $user->tipo == User::TIPO_ENUM['professor'];
        });
    
        Gate::define('ver-tipo-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'] ||
                    $user->tipo == User::TIPO_ENUM['professor'];
        });
    
        Gate::define('add-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'];
        });
    
        Gate::define('aprovar-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'];
        });
    
        Gate::define('editar-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'];
        });
    
        Gate::define('visualizar-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin']||
            $user->tipo == User::TIPO_ENUM['professor'];
        });
    
        Gate::define('deletar-visita', function ($user) {
            return $user->tipo == User::TIPO_ENUM['admin'];
        });
    }
}
