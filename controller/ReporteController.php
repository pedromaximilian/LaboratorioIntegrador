<?php


class ReporteController extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }


    public function ingresoFechas()
    {
        $this->view("Reporte/ingresoFechas", array());
    }


    public function gananciaPorFechas()
    {

        if (isset($_POST["inicio"]) && isset($_POST["fin"])) {
            if ((strtotime($_POST["fin"]) - strtotime($_POST["inicio"])) <= 0) {


                $this->view("Reporte/ingresoFechas", array(

                    "error" => "La fecha de inicio es igual o menor a la fecha de fin"
                ));
                return;
            } else {

                $inicio = $_POST["inicio"];
                $fin = $_POST["fin"];

                $reservas = new Reserva($this->adapter);
                $lista = $reservas->reservasPorFechas($inicio, $fin);

                $ganancia = null;

                foreach ($lista as $item) {
                    $ganancia += $item->comision;
                }

                $this->view("Reporte/gananciaPorFechas", array(
                    "lista" => $lista,
                    "ganancia" => $ganancia
                    
                ));

            }
        } else {
            $this->view("Reporte/ingresoFechas", array(

                "error" => "La fecha de inicio es igual o menor a la fecha de fin"
            ));
        }
    }

    public function gananciaPorCabania()
    {


        //return var_dump($_POST["id"]);

        if (isset($_POST["id"]) && $_POST["id"] >= 0){

            $id = (int)$_POST["id"];
            $reserva = new Reserva($this->adapter);
            $lista = $reserva->reservasPorCavania($id);

            $ganancia = null;

            foreach ($lista as $item) {
                $ganancia += $item->comision;
            }

            $this->view("Reporte/gananciaPorFechas", array(
                "lista" => $lista,
                "ganancia" => $ganancia
                
            ));

        }else{

            $cabania = new Cabania($this->adapter);
            $lista = $cabania->getAll();

            $this->view("Reporte/ingresoCabania", array(
                "lista" => $lista,
                "error" => "seleccione un valor"
            ));
        }
    }

    public function ingresoCabania(){
        $cabania = new Cabania($this->adapter);

        $lista = $cabania->getAll();
        $this->view("Reporte/ingresoCabania", array(
            "lista" => $lista
        ));
    }

        
    
}
