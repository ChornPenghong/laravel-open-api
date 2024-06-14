<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObjectController extends Controller
{
    public function index() {
        $obj = Http::get(config('app.api_url') .'objects');

        $object = collect($obj->json())->transform(function ($item) {
            $item['data'] = (object) $item['data'];
            return (object) $item;
        });

        return view('app', compact('object'));
    }

    public function delete($id) {
        $obj = Http::delete(config('app.api_url') .'objects/'.$id);
        if($obj->json()['error']) {
            return redirect()->back()->with('error', $obj->json()['error']);
        }

        return redirect()->back()->with('success', 'Object deleted successfully.');
        return redirect()->back();
    }

    public function create() {
        return view('create'); // return view('create')
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $obj = Http::post(config('app.api_url') .'objects', [
            'name' => $request->name,
            'data' => $request->data
        ]);

        // if($obj->json()['error']) {
        //     return redirect()->back()->with('error', $obj->json()['error']);
        // }

        return redirect()->route('obj')->with('success', 'Object created successfully.');
    }
}
