<?php

namespace App\Model;

class Personagens
{
    private $id;
    private $nome;

    public function setId($id){
        $this->id = id;
    }
    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function _toString(): String
    {
        return $this->nome."Id ".$this->id;
    }
}