<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use App\Mensagem;
//use View;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);


        $gate->define('logar', function($user){

            $perfil = $user->PerfilUsuario();
            if(!empty($perfil))
                return true;
            return false;
        });


        $gate->define('AcessoVendedor', function($user){

            $perfil = $user->PerfilUsuario()->first();
            if($perfil->tipo == 'Vendedor')
                return true;
            return false;
        });

        $gate->define('AcessoAdministrador', function($user){
//            $numero_mensagens = Mensagem::where('dataRespondida','!=', '')->where('idUsuario', '=', $user->id)->count();
//            View::share('numero_mensagens', $numero_mensagens);

            $perfil = $user->PerfilUsuario()->first();
            if($perfil->tipo == 'Administrador')
                return true;
            return false;
        });

        $gate->define('AcessoComerciante', function($user){
//            $numero_mensagens = Mensagem::where('dataRespondida','!=', '')->where('idUsuario', '=', $user->id)->count();
//            View::share('numero_mensagens', $numero_mensagens);

            $perfil = $user->PerfilUsuario()->first();
            if($perfil->tipo == 'Comerciante')
                return true;
            return false;
        });
    }
}
