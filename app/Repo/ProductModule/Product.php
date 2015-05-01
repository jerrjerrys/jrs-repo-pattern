<?php

namespace App\Repo\ProductModule;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['store_id', 'product_name'];

    /**
     * The function define relation between Product and Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stores()
    {
        return $this->belongsTo('App\Repo\StoreModule\Store','store_id','id');
    }


}