<?php

namespace Modules\Base\Scopes;

use App;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Modules\Base\Models\Centro;
use Modules\Base\Models\Auth\User;
use Modules\Base\Models\UserCentro;
class CentrosScope implements Scope
{
    
    public function apply(Builder $builder, Model $model)
    {
       
        
        $table = $model->getTable();

        // Skip if already exists
        if ($this->exists($builder, 'codcen')) {
            return;
        }

        // Apply company scope
        $builder->whereIn($table . '.codcen',static::getIdsCenter());
    }
    
 /**
     * Check if scope exists.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  $column
     * @return boolean
     */
    protected function exists($builder, $column)
    {
        $query = $builder->getQuery();

        foreach ((array) $query->wheres as $key => $where) {
            if (empty($where) || empty($where['column'])) {
                continue;
            }

            if (strstr($where['column'], '.')) {
                $whr = explode('.', $where['column']);

                $where['column'] = $whr[1];
            }

            if ($where['column'] != $column) {
                continue;
            }

            return true;
        }

        return false;
    }
    
    //Esta funcion devuelve los ids de los centros uatorizados 
    //para este usuario 
    public static function  getIdsCenter(){
       return UserCentro::where('id_user',Auth::getUser()->id)
                ->get()
                ->pluck('codcen')
                ->toArray();
    }
   
}