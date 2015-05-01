<?php

namespace App\Repo\StoreModule;

use App\Http\Controllers\Controller;
use App\Repo\StoreModule\StoresRepo as Stores;
use App\Repo\UserModule\UsersRepo as Users;
use App\Repo\StoreModule\StoreFormRequest;
use Request;

class StoreController extends Controller {

    private $users, $stores;

    public function __construct(Users $users, Stores $stores)
    {
        $this->users = $users;
        $this->stores = $stores;
    }

    public function getIndex()
    {
        $model = $this->stores->with(['users'])->all();

        return view('jrs.store.store',compact(['model']));
    }

    public function getShow($id = 1)
    {
        $model = $this->stores->find($id);

        $data['users'] = $this->users->all();

        return view('jrs.store.show-store',compact(['model','data']));
    }

    public function getRemove($id = 1)
    {
        $model = $this->stores->find($id);

        return view('jrs.store.remove-store',compact(['model','data']));
    }

    public function getCreateStore()
    {
        $data['users'] = $this->users->all();

        return view('jrs.store.create-store',compact(['model','data']));
    }

    public function postCrudStore(StoreFormRequest $request)
    {
        $request = Request::all();

        $this->stores->jrsCRUD($request);

        return redirect('/store');
    }
}
