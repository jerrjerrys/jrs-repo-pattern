<?php
/**
 * Created by PhpStorm.
 * User: JERRYS
 * Date: 4/18/2015
 * Time: 9:17 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
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
    protected $fillable = ['product_name'];

    public function stores()
    {
        return $this->hasOne('\App\Stores','id','store_id');
    }
}