<?php

namespace App\Repo\StoreModule;

use Bosnadev\Repositories\Eloquent\Repository;


class StoresRepo extends Repository{

    public function model() {
        return 'App\Repo\StoreModule\Store';
    }
}