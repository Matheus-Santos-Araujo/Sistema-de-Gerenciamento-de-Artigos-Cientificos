<?php
 
namespace App\Observer;
 
use App\artigo;
 
class NotifyObserver
{
       public function creating(artigo $artigo){
       if($artigo->estadoRevisao == "0"){
           $artigo->notificacao = "Você tem um novo artigo aguardando revisão!";
           } 
    }
    public function updating(artigo $artigo){
     if ($artigo->notificacao !== "deletando"){
       if($artigo->estadoRevisao == "1"){
        $artigo->notificacao = "Você tem um novo artigo aguardando revisão!";
       } else {
       $artigo->notificacao = "Seu artigo sofreu alterações!";
      }
    } else {
        $artigo->notificacao = NULL;
    }
    }
}