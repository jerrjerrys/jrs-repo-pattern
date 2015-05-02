<?php

namespace App\Repo\UserModule;

use App\Http\Controllers\Controller;
use App\Repo\UserModule\UsersRepo as Users;
use App\Repo\UserModule\UserFormRequest;
use Request;

class UserController extends Controller {

    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function getIndex()
    {
        $model = $this->users->all();
        return view('jrs.user.user',compact(['model']));
    }

    public function getShow($id = 1)
    {
        $model = $this->users->find($id);
        return view('jrs.user.show-user',compact(['model']));
    }

    public function getRemove($id = 1)
    {
        $model = $this->users->find($id);
        return view('jrs.user.remove-user',compact(['model']));
    }

    public function getCreateUser()
    {
        return view('jrs.user.create-user');
    }

    public function postCrudUser(UserFormRequest $request)
    {
        $post = Request::all();
        $post['password'] = !empty($post['password']) ? bcrypt($post['password']) : NULL;

        $this->users->jrsCRUD($post);

        return redirect('/user');
    }
}
