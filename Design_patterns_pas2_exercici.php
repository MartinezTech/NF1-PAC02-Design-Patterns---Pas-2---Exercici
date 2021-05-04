<html>
<head>
    <style>
        body {font : 12px verdana; font-weight:bold}
        td {font : 11px verdana;}
    </style>
</head>

<?php
abstract class AbstractConstruccio {

    private $name;
    private $superficie;
    private $construccions = array();


    public function add(AbstractConstruccio $construccio) {
        array_push($this->construccions, $construccio);
    }



    public function hasChildren() {
        return (bool)(count($this->construccions) > 0);
    }

    public function getDescription() {
        if($this->getName() === "Mi casa: "){
            echo "<br>La meva casa conté: ";
        }else{
             echo $this->getName() .". Superficie:  " . $this->getSuperficie() . "m";
        }
        if ($this->hasChildren()) {
          echo "<br>";
          foreach($this->construccions as $construccio) {
             echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>";
             $construccio->getDescription();
             echo "</td></tr></table>";
          }        
        }
    }
    public function getSuma(){
        $superficieTotal = 0;
        $superficieTotal += $this->superficie;
        if($this->hasChildren()) {
            foreach($this->construccions as $construccio) {
               $superficieTotal += (int)$construccio->getSuperficie();
                   
            }
        } 
        return $superficieTotal;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function getSuperficie() {
        return $this->superficie;
    }


}

class Vivenda extends AbstractConstruccio {
    function __construct($name, $superficie) {
        parent::setName($name);
        parent::setSuperficie($superficie);
    }
}

class Habitacio extends AbstractConstruccio {
    function __construct($name, $superficie) {
        parent::setName($name);
        parent::setSuperficie($superficie);
    }
}

class Porta extends AbstractConstruccio {
    function __construct($name, $superficie) {
        parent::setName($name);
        parent::setSuperficie($superficie);
    }
}

class Finestra extends AbstractConstruccio {
    function __construct($name, $superficie) {
        parent::setName($name);
        parent::setSuperficie($superficie);
    }
}
$mi_casa = new Habitacio("Mi casa: ", 0);
$mi_casa->add(new Habitacio("Habitacio 1", 20));
$mi_casa->add(new Finestra("Finestra 1", 8));
$mi_casa->add(new Porta("Porta 1", 6));
$mi_casa->add(new Habitacio("Habitacio 2", 25));
$mi_casa->add(new Finestra("Finestra 2", 8));
$mi_casa->add(new Porta("Porta 2", 6));
$mi_casa->add(new Habitacio("Habitacio 3", 15));
$mi_casa->add(new Finestra("Finestra 3", 4));
$mi_casa->add(new Porta("Porta 3", 6));
$mi_casa->add(new Habitacio("Cocina 1", 13));
$mi_casa->add(new Finestra("Finestra 4", 4));
$mi_casa->add(new Porta("Porta 4", 6));
$mi_casa->add(new Habitacio("Comedor 1", 30));
$mi_casa->add(new Finestra("Finestra 5", 4));
$mi_casa->add(new Porta("Porta 5", 10));

echo "La superficie total de la meva casa es de " .$mi_casa->getSuma(). " metres<br>";
$mi_casa->getDescription();

?>
<body>

</body>
</html>