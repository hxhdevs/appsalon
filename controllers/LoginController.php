<?php 

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController{
    
    public static function login(Router $router){
        $router->render('auth/login');
    }
    
    public static function logout(){
        echo "desde logout";
    }
    
    public static function olvide(Router $router){
        $router->render('auth/olvide-password',[

        ]);
    }
    
    public static function recuperar(){
        echo "desde recuperar";
    }
    
    public static function crear(Router $router){
        $usuario = new Usuario;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario
        ]);
    }

}