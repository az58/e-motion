<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile() {
        $customer = User::all();
        dd($customer);

        $apiCities = file_get_contents('https://pkgstore.datahub.io/core/world-cities/world-cities_json/data/5b3dd46ad10990bca47b04b4739a02ba/world-cities_json.json');
        $aCites = json_decode($apiCities);

        foreach ($aCites as $row){
            if (!array_key_exists($row->country, $this->_aCities)) {
                $this->_aCities[]= $row->country;
            }

            $this->_aCities[$row->country][] = $row->name;
        }

        $sCountry       = ucfirst('france');

        $aCites         = array_reverse($this->_aCities[$sCountry]);
    }
}
