<?php

namespace App\Repo\StoreModule;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stores';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'store_name', 'status'];

    /**
     * The function define relation between Store and User
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Repo\UserModule\User','user_id','id');
    }

    /**
     * The function define relation between Store and Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->hasMany('App\Repo\ProductModule\Product');
    }


}