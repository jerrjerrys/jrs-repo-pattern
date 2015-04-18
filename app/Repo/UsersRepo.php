<?php
/**
 * Created by PhpStorm.
 * User: JERRYS
 * Date: 4/18/2015
 * Time: 8:23 AM
 */

namespace App\Repo;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;


class UsersRepo extends Repository{

    public function model() {
        return 'App\User';
    }
}