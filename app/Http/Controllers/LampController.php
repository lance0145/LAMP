<?php
namespace App\Http\Controllers;

use App\Http\Requests\LampRequest;
use App\Lamp;

class LampController extends Controller
{
    public function index()
    {
        $lamps = Lamp::latest()->get();

        return response()->json($lamps);
    }

    public function store(LampRequest $request)
    {
        $lamp = Lamp::create($request->all());

        return response()->json($lamp, 201);
    }

    public function show($id)
    {
        $lamp = Lamp::findOrFail($id);

        return response()->json($lamp);
    }

    public function update(LampRequest $request, $id)
    {
        $lamp = Lamp::findOrFail($id);
        $lamp->update($request->all());

        return response()->json($lamp, 200);
    }

    public function destroy($id)
    {
        Lamp::destroy($id);

        return response()->json(null, 204);
    }
}
