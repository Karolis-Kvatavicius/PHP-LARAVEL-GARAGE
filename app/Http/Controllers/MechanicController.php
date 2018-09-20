<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mechanic;
use App\Http\Requests\MechanicRequest;

class MechanicController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    
    public function index() {
        
    $mechanics = Mechanic::all();
    return view('mechanic.index', ['mechanics' => $mechanics]);
    }

    public function new() {
        $mechanic=new Mechanic;
        return view('mechanic.new', ['mechanic' => $mechanic]);
    }

        public function save(MechanicRequest $request){
            $mechanic=new Mechanic;
            $mechanic->name=$request->input('mechanic_name');
            $mechanic->surname=$request->input('mechanic_surname');
            $mechanic->save();
            // return redirect()->back()->withErrors(['Mechanikas nepridėtas']);
            return redirect()->route('mechanic.index')->with('success', ['Mechanikas sėkmingai pridėtas']);
        }

        public function delete($id){
            $mechanic = Mechanic::where('id', $id)->first();
            // dd($mechanic->mechanicTrucks);
            if($mechanic->mechanicTrucks->count() > 0) {
                return redirect()->route('mechanic.index')->with('uzimtas', ['Mechanikas turi darbų']);
            }
            $mechanic-> delete();
            return redirect()->route('mechanic.index')->with('success', ['Mechanikas Istrintas']);
         }

         public function filterAsc() {

            return view('mechanic.index', ['mechanics' => Mechanic::orderBy('id', 'asc')->get()]);

         }

         public function filterDesc() {

            return view('mechanic.index', ['mechanics' => Mechanic::orderBy('id', 'desc')->get()]);

         }
        
}
