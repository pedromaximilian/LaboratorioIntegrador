<?php


class LoginController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index()
    {

        //Cargamos la vista index y le pasamos valores
        $this->view("Login/index", array());
    }

    public function login()
    {


        //solo a fines practicos de administrador
        if (isset($_POST['mail']) && $_POST['mail']=="super@super.com") {
            session_start();
                    $_SESSION["rol"] = "admin";
                    $_SESSION["nombre"] = "super@super.com";

                    $this->redirect("Administrador", "index");
        }
        //solo a fines practicos de propietario
        


        //eliminar metodo anterior

        if (isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['rol'])) {
            $mail = $this->sanitize($_POST['mail']);
            $pass = $this->sanitize($_POST['pass']);
            $rol = $this->sanitize($_POST['rol']);

            $administrador = new Administrador($this->adapter);

            if ($rol == "admin") {

                $result = $administrador->validaAdministrador($mail);
                if (isset($result) && password_verify($pass, $result->pass)) {
                    session_start();
                    $_SESSION["rol"] = "admin";
                    $_SESSION["nombre"] = $mail;

                    $this->redirect("Administrador", "index");
                } else {
                    $this->view("Login/index", array(
                        "error" => "Verifique datos ingresados"
                    ));
                }
            } else {
                if ($rol == "propietario") {
                    $result = $administrador->validaPropietario($mail);

                    if (isset($result) && isset($result->pass) && password_verify($pass, $result->pass)) {
                        session_start();
                        $_SESSION["rol"] = "propietario";
                        $_SESSION["nombre"] = $mail;
                        $_SESSION["id"] = $result->id;

                        $cabanias = new Cabania($this->adapter);
                        $lista = $cabanias->cabaniasPorPropietario((int)$result->id);


                        //$lista = $cabanias->cabaniasPorPropietario(8);

                        $this->view("Inicio/misCabanias", array(
                            
                            "lista" => $lista
                        ));
                    } else {

                        $this->view("Login/index", array(
                            "error" => "Verifique los datos ingresados"
                        ));
                    }
                } else {
                    $this->view("Login/index", array(
                        "error" => "Campo rol no seleccionado"
                    ));
                }
            }
        } else {
            $this->view("Login/index", array(
                "error" => "Campos no ingresados"
            ));
        }
    }

    public function ingresaMail()
    {
        $this->view("Login/ingresaMail", array());
    }

    public function enviarCodigo()
    {

        $propietario = new Propietario($this->adapter);


        $propietario = $propietario->validaPropietario($_POST["mail"]);

        if (!is_null($propietario)) {
            //return var_dump("encontro propietario");

            $codigo = substr(md5(uniqid(mt_rand(), true)), 0, 8);

            $prop = new Propietario($this->adapter);
            $prop->setId((int) $propietario->id);
            $prop->guardaCodigo($codigo);


            //le envio el correo con el codigo
            $this->enviaCorreo(
                "Recupere su contraseña",
                "'Codigo para recuperacion de contraseña: '. $codigo",
                ".$propietario->mail."
            );
        }

        $this->view("Login/cambiarPass", array(
            "mail" => $propietario->mail

        ));
    }


    public function salir()
    {

        session_start();
        session_destroy();

        //Cargamos la vista index y le pasamos valores
        $this->view("Login/index", array());
    }

    public function cambiarPass()
    {
        $error = null;
        $exito = null;

        if (isset($_POST["mail"]) && isset($_POST["codigo"]) && isset($_POST["pass"])) {

            $propietario = new Propietario($this->adapter);


            $propietario = $propietario->validaPropietario($_POST["mail"]);

            if (!is_null($propietario) && $propietario->codigo == $_POST['codigo']) {
                //return var_dump("encontro propietario");

                $prop = new Propietario($this->adapter);
                

                $password = $_POST["pass"];
                $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);

                $prop->setPass($pass_cifrado);
                $prop->setId($propietario->id);

                $prop->guardaPass();
                $this->view("Login/index", array(
                    
                    "exito" => "Se cambio la contraseña con exito"
        
                ));
            
               
            }else{
                $this->view("Login/cambiarPass", array(
                    "mail" => $propietario->mail,
                    "error" => "Codigo verificacion incorrecto"
        
                ));
            }
        } else {
            $this->view("Login/cambiarPass", array(
                "mail" => $propietario->mail,
                "error" => "Verifique los datos ingresados"
    
            ));
        }
    }
}
