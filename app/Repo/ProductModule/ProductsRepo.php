<?php

namespace App\Repo\ProductModule;

use Bosnadev\Repositories\Eloquent\Repository;


class ProductsRepo extends Repository{

    public function model() {
        return 'App\Repo\ProductModule\Product';
    }
}