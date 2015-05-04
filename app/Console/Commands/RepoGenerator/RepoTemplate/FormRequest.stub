<?php

namespace App\Repo\{{_OBJECTNAME_}}Module;

use App\Http\Requests\Request as Req;
use Request;


class {{_OBJECTNAME_}}FormRequest extends Req {

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
                {{_RULE_}}
            ];
        }

        return $return;
	}

}
;