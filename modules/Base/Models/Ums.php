<?php

namespace Modules\Base\Models;
//use Modules\Base\Models\ModelBase;
//use App\Scopes\Company;

class Ums extends ModelBase
{
   protected $table = 'ums';
   protected $fillable=['codum','unidad','dimension'];
   protected $primaryKey = 'codum';
   public $incrementing = false;
   public $timestamps = false;
   protected $dates = ['deleted_at'];
   
   /* protected static function boot()
    {
         parent::boot();
    }*/
   //override porque estos valores no dependen de lninguna compania
  public function scopeCompanyId($query, $company_id)
    {
        
      return $query;
    }
   
    
  public static function adimensiones(){
     return ['L'=>'Longitud','M'=>'Masa','T'=>'Tiempo','E'=>'Escalar'];
  }
  
  public function items()
{
    return $this->hasMany('App\Models\Common\Item', 'codum', 'codum');
}


public function conversionesbase()
{
    return $this->hasMany('Modules\Base\Models\Conversion', 'codumbase', 'codum');
}

public function conversionesotro()
{
    return $this->hasMany('Modules\Base\Models\Conversion', 'codumotro', 'codum');
}
/*
 * Esta funcion se encarga de decidir si los 
 * campos sensible speuden ser modificados ; revisa 
 * Todas las tablas hijas 
 */
public function canEdit(){
    return $this->items()->count()==0 && 
            $this->conversionesbase()->count()==0 &&
            $this->conversionesotro()->count()==0 ;
}
  
}
