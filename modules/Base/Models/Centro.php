<?php

namespace Modules\Base\Models;



class Centro extends ModelBase
{
    protected $table = 'centros';
   protected $fillable=['codcen','nombre','company_id'];
   protected $primaryKey = 'codcen';
  public $incrementing = false;
   public $timestamps = false;
   //protected $dates = ['deleted_at'];
  
   
}
