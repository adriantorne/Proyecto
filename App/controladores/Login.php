<?php

class Login extends Controlador{
    public function __construct(){
        $this->loginModelo=$this->modelo("LoginModelo");
        
    }

    public function index($error=''){
        //trim(quita los espacios de delante y detras)
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $this->datos['usuario']=trim($_POST['usuario']);
            $this->datos['pass']=trim($_POST['pass']);
            
            $usuarioSesion = $this->loginModelo->loginUsuario($this->datos);
            
            
            if (isset($usuarioSesion)&& !empty($usuarioSesion)) {
                Sesion::crearSesion($usuarioSesion);
                
                redireccionar('/inicio');

            }else{
                
                redireccionar('/login/index/error_1');
            }
            
            
        }else {

            if (Sesion::sesionCreada()) {
                redireccionar('/');
            }

            $this->datos['error'] = $error;

            $this->vista('login', $this->datos);
        }
    }

    public function recuperarPass(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $email=$_POST['email'];
        $this->loginModelo=$this->modelo('LoginModelo');
        $registro= $this->loginModelo->verificarCorreo($email);
        
        if(empty($registro)){
        //header("refresh:3;url=../..");
        echo "El correo no existe"; 
        } else{
        
        
        
        //funcion para generar contraseña aleatoria
        // echo "hola";exit();
        $cadena = "abcdefghijklmnopqrstxwyz0123456789";
        $longitudCadena=strlen($cadena);
        $pass = "";
        $longitudPass=6;
        
        for($i=1 ; $i<=$longitudPass ; $i++){
        $pos=rand(0,$longitudCadena-1);
        $pass .= substr($cadena,$pos,1);
        }
        
        
        $to = $_POST['email'];
        
        $nombreTo = "Usuario";
        $asunto = "Recuperación de contraseña - Sarabastall";
        $cuerpo = "Se ha solicitado la recuperación de contraseña para su cuenta en Sarabastall.<br>Su contraseña temporal es: <strong>$pass</strong>.<br>Para cambiar su contraseña, acceda a su perfil y modifíquela desde su panel de control.";
       
        //$respuesta = 
        $respuesta = EnviarEmail::sendEmail($to,$nombreTo,$asunto,$cuerpo);
        $this->usuarioModelo=$this->modelo('UsuarioModelo');
        $cambio=$this->usuarioModelo->recuperarPass($to, $pass);
        // print_r($cambio);
        // exit();
        if ($respuesta == '1') {
        $cambio;
        redireccionar("/");
        }else{
        echo "No se ha podido enviar el mensaje. Error:$respuesta";
        }
        
        }
        
        
        
        }else{
        $this->vista("/forgotpassword"); 
        }
        }

    public function logout(){
        
        Sesion::cerrarSesion();
        redireccionar('/');
    }
}