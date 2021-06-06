<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['name', 'price', 'description', 'image'];


    //método para fazer a pesquisa nos produtos
    public function search($filter = null)
    {
        $results = $this->where(function($query) use($filter) {
            if($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
                //eu poderia também presquisar pelo campo description:
                // $query->where('description', 'LIKE', '%{$filter}%');
            }
        })//->toSql(); //para verificar qual query está rondando:        
        ->paginate();

        // dd($results, $filter);
        return $results;
    }
}
