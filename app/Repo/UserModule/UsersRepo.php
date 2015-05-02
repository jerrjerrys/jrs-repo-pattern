<?php

namespace App\Repo\UserModule;

use Bosnadev\Repositories\Eloquent\Repository;


class UsersRepo extends Repository{

    public function model()
    {
        return 'App\Repo\UserModule\User';
    }

    public function jrsHasMany()
    {
        return 'HAHAHA';
    }
}