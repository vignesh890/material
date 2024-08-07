<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class Material_Controller extends Controller
{
    public function material_list(){
        $lists =  Item::all();
        return view("material_list",["lists"=>$lists]);
    }

    public function add_material(){
        return view('add_material');
    }

    public function insert(Request $request) {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'discount_type' => 'nullable|string|max:255',
            'discount' => 'nullable|integer|min:0|max:100',
        ]);
    
        // Retrieve validated input values
        $name = $validated['name'];
        $category = $validated['category'];
        $price = $validated['price'];
        $discount_type = $validated['discount_type'] ?? 'no discount'; 
        $discount = $validated['discount'] ?? 0;
    
        // Create a new Item instance and assign values
        $item = new Item;
        $item->name = $name;
        $item->category = $category;
        $item->price = $price;
        $item->discount_type = $discount_type;
        $item->discount = $discount;
        
        $item->save();
    
        return redirect('material_list');
    }

    public function edit($id){

        $edits = Item::find($id);
        if($edits != null){
        return view("edit_material",["edits"=>$edits]);
        }else{
            return "no data found"; 
        }
     }

     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'discount_type' => 'nullable|string|max:255',
            'discount' => 'nullable|integer|min:0|max:100',
        ]);

        $item = Item::find($id);
        $item->name = $validated['name'];
        $item->category = $validated['category'];
        $item->price = $validated['price'];
        $item->discount_type = $validated['discount_type'] ?? 'no discount';
        $item->discount = $validated['discount'] ?? 0;
        $item->save();
       // echo "<script>alert('update successfully');</script>";
        return redirect('material_list');
    }

    public function delete($id){
        $delete = Item::find($id);
        $delete->delete();
        return redirect('material_list');
    }
    
}
