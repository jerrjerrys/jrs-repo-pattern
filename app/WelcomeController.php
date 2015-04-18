<?php namespace App;

use App\Http\Controllers\Controller;
use App\Repo\UsersRepo as Users;
use App\Repo\StoresRepo as Stores;
use App\Repo\ProductsRepo as Products;
use Request;

class WelcomeController extends Controller {

    private $users, $stores, $products;

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
    public function __construct(Users $users, Products $products, Stores $stores)
    {
        $this->users = $users;
        $this->products = $products;
        $this->stores = $stores;
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getIndex()
    {
        return \Response::json($this->users->with('stores.products')->all());
    }

    public function getShow($id = 1)
    {
        return \Response::json($this->users->find($id));
    }

    public function getCreateUser()
    {
        return view('jrs.create-user');
    }

    public function postCreateUser()
    {
        $request = Request::all();
        $request['password'] = !empty($request['password']) ? bcrypt($request['password']) : NULL;

        return \Response::json($this->users->jrsCreate($request));
    }

}
