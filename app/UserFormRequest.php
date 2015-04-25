<?php namespace App;

use App\Http\Requests\Request as Req;
use Request;


class UserFormRequest extends Req {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

        $request = Request::all();

        if(isset($request['DELETE']) && $request['DELETE'] == "TRUE")
        {
            $return = [];
        }else{
            $return = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ];

            if(!empty($request['id']))
            {
                $return = array_except($return,['password']);
                $return['email'] = 'required|email|unique:users,email,'.$request['id'];
            }
        }

        return $return;
	}

}
;