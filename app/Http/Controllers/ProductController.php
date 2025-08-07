<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Toko;
use App\Models\Supplier;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['toko', 'supplier'])->get();

        $hasToko = false;
        if (request()->user()) {
            $hasToko = \App\Models\Toko::where('owner_id', request()->user()->id)->exists();
        }

        return view('products.index', compact('products', 'hasToko'));
    }


    public function create()
    {
        $user = request()->user();

        $toko = \App\Models\Toko::where('owner_id', $user->id)->first();

        if (!$toko) {
            return redirect('/products')->with('error', 'You must create a Toko before adding products.');
        }

        $suppliers = \App\Models\Supplier::all();
        $tokos = [$toko]; // limit to their own toko

        return view('products.create', compact('suppliers', 'tokos'));
    }

    protected $fillable = [
        'name',
        'toko_id',
        'price',
        'status',
        'supplier_id',
        'stock',
    ];

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'toko_id' => 'required|exists:tokos,id',
            'price' => 'required|integer',
            'status' => 'required',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock' => 'required|integer'
        ]);

        Product::create($request->only([
            'name',
            'toko_id',
            'price',
            'status',
            'supplier_id',
            'stock'
        ]));
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $user = request()->user();
        if ($user->role !== 'admin') {
            if ($product->toko->owner_id !== $user->id) {
                abort(403, 'Unauthorized');
            }
        }

        $tokos = Toko::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'tokos', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);


        $user = request()->user();
        if ($user->role !== 'admin') {
            if ($product->toko->owner_id !== $user->id) {
                abort(403, 'Unauthorized');
            }
        }

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::with(['toko', 'supplier'])->findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $user = request()->user();
        if ($user->role !== 'admin') {
            if ($product->toko->owner_id !== $user->id) {
                abort(403, 'Unauthorized');
            }
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function myProducts()
    {
        $user = request()->user();

        $toko = \App\Models\Toko::where('owner_id', $user->id)->first();

        if (!$toko) {
            return redirect('/products')->with('error', 'You don’t have a Toko yet.');
        }

        $products = \App\Models\Product::where('toko_id', $toko->id)
                    ->with(['toko', 'supplier'])
                    ->get();

        return view('products.my', compact('products'));
    }


}
