<?php

namespace App\Repo\{{_OBJECTNAME_}}Module;

use App\Http\Controllers\Controller;
use Request;
use App\Repo\{{_OBJECTNAME_}}Module\{{_OBJECTNAME_}}FormRequest;

{{_REPOUSED_}}

class {{_OBJECTNAME_}}Controller extends Controller {

    {{_INSTANCE_}}

    public function __construct({{_INSTANCEALIASES_}})
    {
        {{_DEFINEDINSTANCE_}}
    }

    public function getIndex()
    {
        $model = {{_INDEXQUERY_}};

        {{_INDEXDATA_}}

        return view({{_INDEXVIEW_}},compact(['model','data']));
    }

    public function getShow($id = 1)
    {
        $model = {{_FINDQUERY_}};

        {{_SHOWDATA_}}

        return view({{_SHOWVIEW_}},compact(['model','data']));
    }

    public function getRemove($id = 1)
    {
        $model = {{_FINDQUERY_}};

        {{_REMOVEDATA_}}

        return view({{_REMOVEVIEW_}},compact(['model','data']));
    }

    public function getCreate()
    {
        {{_CREATEDATA_}}

        return view({{_CREATEVIEW_}},compact(['model','data']));
    }

    public function postCrud({{_OBJECTNAME_}} $request)
    {
        $post = Request::all();

        $this->{{_OBJECTINSTANCE_}}->jrsCRUD($post);

        return redirect({{_REDIRECT_}});
    }
}
