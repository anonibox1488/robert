<?php
class Robert
{
    private $direccion = 'N';
    private $x = 0;
    private $y = 0;

    public function moveRobert($comando){
        $comando = strtoupper($comando);
        $proceso = [];
        for ($i= 0; $i < strlen($comando) ; $i++) { 

            if(($comando[$i] == 'L') || ($comando[$i] == 'R')){
                $this->direccion = $this->setDireccion($comando[$i]);
                array_push($proceso, $this->direccion);
            }elseif($comando[$i] == 'M'){
                $coordenadas = $this->mover();  
            }
        }

        return $coordenadas;
    }

    private function mover(){
        switch ($this->direccion) {
            case 'N':
            if ($this->x == 9) {
                $this->x = 0;
            }else{
                $this->x++;
            }
            break;
            case 'S':
            if ($this->x == 0) {
                $this->x = 9;
            }else{
                $this->x--;
            }
            break;
            case 'E':
            if ($this->y == 9) {
                $this->y = 0;
            }else{
                $this->y++;
            }
            break;
            case 'W':
            if ($this->y == 0) {
                $this->y = 9;
            }else{
                $this->y--;
            }
        }   
        return $this->y.':'.$this->x .':'. $this->direccion;
    } 

    private function setDireccion($value){
        switch ($value) {
            case 'L':
            switch ($this->direccion) {
                case 'N':
                $direccion='W';
                break;
                case 'S':
                $direccion='E';
                break;
                case 'E':
                $direccion='N';
                break;
                case 'W':
                $direccion='S';
                break;
            }
            break;
            case 'R':
            switch ($this->direccion) {
                case 'N':
                $direccion='E';
                break;
                case 'S':
                $direccion='W';
                break;
                case 'E':
                $direccion='S';
                break;
                case 'W':
                $direccion='N';
                break;
            }
            break;
            
        }
        return $direccion;
    }
}

$robert = new Robert;

echo $robert->moveRobert('MMMMMMMMMM');

?>