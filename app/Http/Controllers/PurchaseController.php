<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Purchases";
        $purchases = Purchase::with('category', 'supplier')->get();
        return view('purchases',compact('title','purchases'));
    }

    /**
     * Display a create page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Purchase";
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('add-purchase', compact(
            'title',
            'categories',
            'suppliers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'category' => 'required|exists:categories,id',
        'price' => 'required|min:1',
        'quantity' => 'required|min:1',
        'expiry_date' => 'required',
        'supplier' => 'required|exists:suppliers,id',
        'image' => 'file|image|mimes:jpg,jpeg,gif,png',
    ]);

    $imageName = null;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }
    $purchase = Purchase::create([
        'name' => $request->name,
        'category_id' => $request->category,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'expiry_date' => $request->expiry_date,
        'supplier_id' => $request->supplier,
        'image' => $imageName,
    ]);

    return redirect()->route('purchases')->with('success', 'Purchase added successfully.');
}


    /**
     * Display the specified resource.
     *@param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title = "Edit Purchase";
        $purchase = Purchase::find($id);
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('edit-purchase', compact(
            'title',
            'purchase',
            'categories',
            'suppliers'
        ))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'expiry_date' => 'required',
            'supplier' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }

        $purchase->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'supplier_id' => $request->supplier,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
            'image' => $imageName,
        ]);
        $notifications = array(
            'message' => "Purchase has been updated",
            'alert-type' => 'success',
        );
        return redirect()->route('purchases')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->delete();
        $notification = array(
            'message' => "Purchase has been deleted",
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
