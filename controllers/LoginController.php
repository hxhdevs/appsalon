<?php 

namespace Controllers;

use Classes\Email;
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

        $alertas =[];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

        if(empty($alertas)) {
            $resultado = $usuario->existeUsuario();
            // dep($resultado);
            if ($resultado->num_rows) {
                $alertas = Usuario::getAlertas();
            }else{
                $usuario->hashPassword();
                $usuario->crearToken();
                $email = new Email($usuario->nombre,$usuario->email,$usuario->token);
                $email->enviarConfirmacion();
                dep($email);
            }
        }

        }


        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

}