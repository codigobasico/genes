<?php

/* 
 * Esta clase sera usada
 * para cualquier documento dentro de la aplicacion
 * Extiende la clase ModelBase y agrega un SCOPE GLOBAL
 * de acuerdo a los centros logisticos autorizados para 
 * un usuario especifico
 */
namespace Modules\Base\Models;
use Modules\Base\Scopes\CentrosScope;
use Modules\Base\Traits\Estado as TraitEstado;
//use Modules\Base\Interfaces\Idocument;
class DocumentBase extends ModelBase  {
    
    use TraitEstado;
    
    public $hasAprobbe; ///Define si el documento tiene , esquema de aprobacion 
   
    
    protected static function boot()
    {
       parent::boot();
        //Este es el nuevo scope a usar par filtrar los centros
       //autorizados al usuario activo ver: LA CLASE centros scope para mas detalle 
        static::addGlobalScope(new CentrosScope);
        
    }
    
    /*
     * Esta funcion se encargara de filtrar todos los 
     * estados que no sean computables , como anulados , desestimados etc.
     * Util cuando quieran sacar un reporte de suma de montos, y cantidades
     * Los anulados y o computable no sumaran 
     * 
     * Usa la funcion getStatusComputables() del trait 
     * 
     * Document::EstadosComputables()
     */
    public function scopeEstadosComputables($query){
        return $query->whereIn('idestado',$this->getStatusComputables($this->codocu) );
    }
    
    
    
}
