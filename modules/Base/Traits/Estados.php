<?php

namespace Modules\Base\Traits;
use Modules\Base\Models\Estado;


trait Estados
{
    
    /*abstract protected function getDb();
     abstract protected function dropForeignKey($name,$table);
  static $section_settings='tables';
  /*
     * Se define 3 estados basicos que siempre se 
     * repiten entodo documento, estos valores son universales 
     * y se toma la covencion 10, 20 y 30 
     */
    static $ESTADO_NUEVO='10';
    static $ESTADO_HABILITADO='20';
    static $ESTADO_ANULADO='30';
    static $basicStatuses=[
        '10','20','30'
    ];
    public function getStatusNuevo(){
        return self::ESTADO_NUEVO;
    }
    
     public function getStatusHabil(){
        return self::ESTADO_HABILITADO;
    }
    
    
    public function getStatusAnulado(){
        return self::ESTADO_ANULADO;
    }
    
    /*
     * VERIFICA SI EL CAMBIO DE LOS ESTADOS ES VALIDO
     */
   /* public function checkCambio($estadoOrigen,$estadoFinal){
        if(!in_array($estadoOrigen,$this->basicStatuses)||
           !in_array($estadoFinal,$this->basicStatuses)|| 
           ($estadoFinal==$estadoOrigen)
                ){
            return true;
        }
        
       
    }*/
    
    
    public function getStatusCode($id){
       return Estado::where('id',$id)->codestado;
    }
    
    public function getStatusName($id){
        return Estado::where('id',$id)->descripcion;
    }
   
    public function getStatusComputables($codocu){
        return Estado::where('codocu',$codocu)->where('nocalculable',0)->pluck('id')->toArray();
    }
    
}
