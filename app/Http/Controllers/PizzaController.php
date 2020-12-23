<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePizzaRequest;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $pizzas = Pizza::all()->where('user_id','=',$user);

        return view('dashboard', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePizzaRequest $request)
    {
        $order = Pizza::create([
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'size' => $request->size,
            'toppings' => $request->toppings
        ]);
        return redirect()->route('dashboard', $order)->with('status', 'Order received!');
    }
}
