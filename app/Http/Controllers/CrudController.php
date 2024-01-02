<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function action(Request $request)
    {
        $model = $request->input('model');
        $action = $request->input('action');
        $id = $request->input('id');

        if (method_exists($this, $action)) {
            return $this->$action($request, $model, $id);
        }
    }

    public function delete(Request $request, $model, $id)
    {
        $modelInstance = app("App\\Models\\" . ucfirst($model))::find($id);
        if ($modelInstance) {
            $modelInstance->delete();
        }
    }

    public function create(Request $request, $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $modelInstance = app("App\\Models\\" . ucfirst($model));
        $modelInstance->fill($request->all());
        $modelInstance->save();
    }

    public function edit(Request $request, $model, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $modelInstance = app("App\\Models\\" . ucfirst($model))::find($id);
        if ($modelInstance) {
            $modelInstance->fill($request->all());
            $modelInstance->save();
        }
    }
}
