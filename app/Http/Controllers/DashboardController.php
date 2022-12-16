<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Category;
use App\Models\Reservation;
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

    public function menu(){
        $tables = DB::table('tables')->paginate(5);
        return view('Dashboard.menu.index', compact('tables'));
    }

    public function storeMenu(Request $request){
        Table::create([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);
        return redirect()->back()->with(['msg'=>'Table Added Successfully']);
    }

    public function createMenu(){
        return view('Dashboard.menu.create');
    }

    public function editMenu($id){
        $table = Table::find($id);
        return view('Dashboard.menu.edit', compact('table'));
    }

    public function updateMenu(Request $request){
        Table::where('id',$request->id)->update([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);

        return redirect()->route('tables');
    }

    public function deleteMenu($id){
        Table::find($id)->delete();
        return redirect()->route('tables');
    }

    public function reservations(){
        //$reservations = DB::table('reservations')->with(['user','table'])->paginate(5);
        $reservations = Reservation::with(['user','table'])->get();
        dd($reservations);
        return view('Dashboard.reservations.index', compact('reservations'));
    }

    public function storeReservation(Request $request){
        Table::create([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);
        return redirect()->back()->with(['msg'=>'Table Added Successfully']);
    }

    public function createReservation(){
        $tables = Table::where('status', 'Free')->get();
        return view('create', compact('tables'));
    }

    public function editReservation($id){
        $table = Table::find($id);
        return view('Dashboard.tables.edit', compact('table'));
    }

    public function updateReservation(Request $request){
        Table::where('id',$request->id)->update([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);

        return redirect()->route('tables');
    }

    public function deleteReservation($id){
        Table::find($id)->delete();
        return redirect()->route('tables');
    }
}
