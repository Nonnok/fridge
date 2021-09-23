<?php

namespace App\Http\Controllers;



use App\Models\Fridge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FridgeController extends Controller
{
    public function index()
    {
        $items = Fridge::all();
        $items = DB::table('fridges')->get();
        return view('index', ['items' => $items]);
    }
    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            // 'created_at' => $request->expirydate,
            'expiry_date' => $request->expiry_date,
            'memo' => $request->memo,
        ];

        DB::table('fridges')->insert($param);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $fridge = Fridge::find($request->id);
        return view('edit', ['form' => 'fridge']);
    }

    public function update(Request $request) {
        $this->validate($request, Fridge::$rules);
        $fridge = Fridge::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $fridge->fill($form)->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Fridge::find($request->id)->delete();
        return redirect('/');
    }
    // public function delete(Request $request)
    // {
    //     $validateDate = $request->validate([
    //         'checked' => 'array|required'
    //     ]);
    //     Fridge::destroy($request->checked);
    //     return redirect('/');
    // }

    public function tuuti(Requesst $request)
    {
        $now = date();
        $expiry_date = Fridge::find($request->id);
        $waring = Fridge::where('expiry_date') <= ('now' + 3)->get();

        return view('/', ['warning' => 'expiry_dateisnear']);
    }
}
