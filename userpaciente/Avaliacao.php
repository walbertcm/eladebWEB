<?php

class Avaliacao{
    public $id;
    public $numquestao;

    function setId($id) {
        $this->name = $id;
      }
    
    function getId() {
        return $this->id;
      }
    
    function setNumquestao($numquestao){
        return $this->numquestao = $numquestao;
    }

    function getNumquestao() {
        return $this->numquestao;
      }
}

?>