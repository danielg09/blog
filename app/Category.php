<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //The table associated with the model.

	protected $table = 'categories';

	/*
		campos permitidos para mostrar los
		objetos json que /campos pueden ser mostrados
		/que datos quieres traer
	*/
	protected $fillable = ['name'];


	public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeSearchCategory($query, $name)
    { 
    	return $query->where('name', 'like', '%'.$name.'%' );
    }

}
