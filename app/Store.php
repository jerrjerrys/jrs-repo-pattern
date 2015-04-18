<?php namespace App;

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
    protected $fillable = ['store_name', 'status'];

    public function users()
    {
        return $this->hasOne('\App\User','id','user_id');
    }

    public function products()
    {
        return $this->hasMany('\App\Product','store_id','id');
    }

}
