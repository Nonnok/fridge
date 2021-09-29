<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

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

    public function notifications(Request $request)
    {
        $today = date("Y-m-d H:i:s");

    }
}


// メモ
// 賞味期限通知昨日の考え方
// select 品物 where 賞味期限 <= (現在日時+3日) group by 品物

// 通知 for English → notification