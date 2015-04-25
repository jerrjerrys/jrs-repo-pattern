<?php namespace App;

use App\Http\Controllers\Controller;
use App\Repo\UsersRepo as Users;
use App\UserFormRequest as UFR;
use Request;

class UserController extends Controller {

    private $users;

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getIndex()
    {
        $model = $this->users->all();
        return view('jrs.user',compact(['model']));
    }

    public function getShow($id = 1)
    {
        $model = $this->users->find($id);
        return view('jrs.show-user',compact(['model']));
    }

    public function getRemove($id = 1)
    {
        $model = $this->users->find($id);
        return view('jrs.remove-user',compact(['model']));
    }

    public function getCreateUser()
    {
        return view('jrs.create-user');
    }

    public function postCrudUser(UFR $request)
    {
        $request = Request::all();
        $request['password'] = !empty($request['password']) ? bcrypt($request['password']) : NULL;

        $this->users->jrsCRUD($request);

        return redirect('/');
    }
}
