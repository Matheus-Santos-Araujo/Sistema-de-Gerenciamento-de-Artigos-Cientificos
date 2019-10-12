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
     if ($artigo->notificacao === "deletando"){
        $artigo->notificacao = NULL;
    } else if($artigo->notificacao === "indicou"){
        $artigo->notificacao = "Seu artigo está em revisão!";
    } else {
        if($artigo->estadoRevisao == "1"){
            $artigo->notificacao = "Seu artigo foi $artigo->resultado.";
           } else {
           $artigo->notificacao = "Seu artigo sofreu alterações!";
          }
    }
  }
}