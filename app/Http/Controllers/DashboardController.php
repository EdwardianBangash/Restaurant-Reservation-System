<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Table;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('Dashboard.index');
    }

    public function categories()
    {
        $categories = DB::table('categories')->paginate(5);
        return view('Dashboard.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('Dashboard.categories.create');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->back()->with(['msg' => 'Category Added Successfully']);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('Dashboard.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        Category::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories');
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories');
    }

    public function tables()
    {
        $tables = DB::table('tables')->paginate(5);
        return view('Dashboard.tables.index', compact('tables'));
    }

    public function storeTable(Request $request)
    {
        Table::create([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);
        return redirect()->back()->with(['msg' => 'Table Added Successfully']);
    }

    public function createTable()
    {
        return view('Dashboard.tables.create');
    }

    public function editTable($id)
    {
        $table = Table::find($id);
        return view('Dashboard.tables.edit', compact('table'));
    }

    public function updateTable(Request $request)
    {
        Table::where('id', $request->id)->update([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);

        return redirect()->route('tables');
    }

    public function deleteTable($id)
    {
        Table::find($id)->delete();
        return redirect()->route('tables');
    }

    public function menu()
    {
        $menus = DB::table('menus')->paginate(5);
        return view('Dashboard.menu.index', compact('menus'));
    }

    public function storeMenu(Request $request)
    {
        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $name);
        }
        Menu::create([
            'name' => $request->name,
            'image' => $name
        ]);
        return redirect()->back()->with(['msg' => 'Menu Added Successfully']);
    }

    public function createMenu()
    {
        return view('Dashboard.menu.create');
    }

    public function editMenu($id)
    {
        $menu = Menu::find($id);
        return view('Dashboard.menu.edit', compact('menu'));
    }

    public function updateMenu(Request $request)
    {
        if ($request->file('new_image')) {
            $name = $request->file('new_image')->getClientOriginalName();
            $request->file('new_image')->storeAs('public/images', $name);
        }

        Menu::where('id', $request->id)->update([
            'name' => $request->name,
            'image' => $request->file('new_image') ? $name : $request->old_image
        ]);

        return redirect()->route('menu');
    }

    //using implicit model binding
    public function deleteMenu(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu');
    }

    public function reservations()
    {
        $reservations = Reservation::with(['user', 'table', 'menu'])->get();
        return view('Dashboard.reservations.index', compact('reservations'));
    }

    public function storeReservation(Request $request)
    {
        Reservation::create([
            'user_id'=>Auth::user()->id,
            'table_id' => $request->table_id,
            'menu_id' => $request->menu_id,
            'on_date' => $request->on_date,
            'time' => $request->time
        ]);

        Table::where('id', $request->table_id)->update([
            'status' => 'Booked'
        ]);
        return redirect()->back()->with(['msg' => 'Reservation Added Successfully']);
    }

    public function createReservation()
    {
        $tables = Table::where('status', 'Free')->get();
        $menu = Menu::all();
        return view('create', compact(['tables', 'menu']));
    }

    public function editReservation($id)
    {
        $table = Table::find($id);
        return view('Dashboard.tables.edit', compact('table'));
    }

    public function updateReservation(Request $request)
    {
        Table::where('id', $request->id)->update([
            'name' => $request->name,
            'guest' => $request->guest,
            'status' => $request->status
        ]);

        return redirect()->route('tables');
    }

    public function deleteReservation($id)
    {
        Reservation::find($id)->delete();
        return redirect()->route('reservations');
    }


    /***************************************
     Login Methods
     ****************************************/


    public function login(Request $request)
    {
        return view('login');
    }

    public function makeLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],true)) {
           $user = User::where('email',$request->email)->first();
           if($user->role == 'admin') {
            return redirect()->route('dashboard.index');
           }else{
            return redirect()->route('index');
           }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function makeRegister(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect()->route('login');
        }
    }
}
