<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use App\Http\Requests\TruckRequest;
use App\Mechanic;

class TruckController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index() {
        $trucks = Truck::all();
        return view('truck.index', ['trucks' => $trucks]);
    }
    
        public function new() {
            $mechanics = Mechanic::getSelectBox();
            return view('truck.new', ['mechanics' => $mechanics]);
        }
    
            public function save(TruckRequest $request){
                $truck=new Truck;
                $truck->maker = $request->input('truck_maker');
                $truck->plate = $request->input('truck_plate');
                $truck->mechanic_id = $request->input('mechanic');
                $truck->make_year = $request->input('truck_make_year');
                $truck->mechanic_notices = $request->input('truck_mech_notices');
                $truck->save();
                return redirect()->route('truck.index');
            }
    
            public function delete($id){
                $truck = Truck::where('id', $id)->first();
                $truck->delete();
                return redirect()->route('truck.index')->with('success', ['Sunkvezimis Istrintas']);
             }

             public function edit(TruckRequest $request, $id){
                $truck = Truck::where('id', $id)->first();
                $truck->maker = $request->input('truck_maker');
                $truck->plate = $request->input('truck_plate');
                $truck->mechanic_id = $request->input('mechanic');
                $truck->make_year = $request->input('truck_make_year');
                $truck->mechanic_notices = $request->input('truck_mech_notices');
                $truck->update();
                return redirect()->route('truck.index');
             }

             public function update($id){
                $mechanics = Mechanic::getSelectBox();
                $truck = Truck::where('id', $id)->first();
                return view('truck.new', ['mechanics' => $mechanics, 'truck' => $truck]);
             }

             public function filterAsc() {

                return view('truck.index', ['trucks' => Truck::orderBy('maker', 'asc')->get()]);

             }

             public function filterDesc() {

                return view('truck.index', ['trucks' => Truck::orderBy('maker', 'desc')->get()]);

             }

             public function filterAscMech() {
                return view('truck.index', ['trucks' => Truck::orderBy('mechanic_id', 'asc')->get()]);
             }

             public function filterDescMech() {
                return view('truck.index', ['trucks' => Truck::orderBy('mechanic_id', 'desc')->get()]);
             }
             
}
