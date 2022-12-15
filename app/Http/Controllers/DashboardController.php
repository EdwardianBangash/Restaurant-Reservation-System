<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function categories(){
        $categories = DB::table('categories')->paginate(5);
        return view('Dashboard.categories.index', compact('categories'));
    }

    public function createCategory(){
        return view('Dashboard.categories.create');
    }

    public function storeCategory(Request $request){
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->back()->with(['msg'=>'Category Added Successfully']);
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('Dashboard.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request){
        Category::where('id',$request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->route('categories');
    }

    public function tables(){
        $tables = DB::table('tables')->paginate(5);
        return view('Dashboard.tables.index', compact('tables'));
    }

    public function storeTable(Request $request){
        Table::create([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);
        return redirect()->back()->with(['msg'=>'Table Added Successfully']);
    }

    public function createTable(){
        return view('Dashboard.tables.create');
    }

    public function editTable($id){
        $table = Table::find($id);
        return view('Dashboard.tables.edit', compact('table'));
    }

    public function updateTable(Request $request){
        Table::where('id',$request->id)->update([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);

        return redirect()->route('tables');
    }

    public function deleteTable($id){
        Table::find($id)->delete();
        return redirect()->route('tables');
    }
}
