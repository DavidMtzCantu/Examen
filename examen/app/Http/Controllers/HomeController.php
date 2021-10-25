<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Http\Requests\StoreCustomer;
use GuzzleHttp\Client;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $customers = Customers::orderBy('id','DESC')->isActive()->get();
        return view('home',compact('customers'));
    }


    public function create()
    {
      return view('create');
    }

    public function store(StoreCustomer $request)
    {

      $client = new Client();
        $res = $client->request('POST', 'http://fx.currencysystem.com/webservices/CurrencyServer4.asmx/CurrencyExists', [
            'form_params' => [
                'licenseKey' => '',
                'currency' => request('currency'),
            ]
        ]);

      $xml = simplexml_load_string($res->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json, true);

      if ($array[0] == "false") {
        return redirect()->back()->withErrors(['msg' => 'Invalid Value']);
      }

      $customer = new Customers;

      $customer->code  = request('code');
      $customer->company_name  = request('company_name');
      $customer->name  = request('name');
      $customer->country  = request('country');
      $customer->state  = request('state');
      $customer->city  = request('city');
      $customer->email  = request('email');
      $customer->phone  = request('phone');
      $customer->currency  = request('currency');
      $customer->save();

      return redirect()->route('home')->with('success', 'Customer created successfully!');
    }


    public function edit($id)
    {
      $customer = Customers::findOrFail($id);
      return view('edit', compact('customer'));
    }

    public function update(StoreCustomer $request, $id)
    {

      $client = new Client();
        $res = $client->request('POST', 'http://fx.currencysystem.com/webservices/CurrencyServer4.asmx/CurrencyExists', [
            'form_params' => [
                'licenseKey' => '',
                'currency' => request('currency'),
            ]
        ]);

      $xml = simplexml_load_string($res->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json, true);

      if ($array[0] == "false") {
        return redirect()->back()->withErrors(['msg' => 'Invalid Value']);
      }


      $customer = Customers::findOrFail($id);
      $customer->code  = request('code');
      $customer->company_name  = request('company_name');
      $customer->name  = request('name');
      $customer->country  = request('country');
      $customer->state  = request('state');
      $customer->city  = request('city');
      $customer->email  = request('email');
      $customer->phone  = request('phone');
      $customer->currency  = request('currency');
      $customer->save();
      return redirect()->route('home')->with('success', 'Customer saved successfully!');
    }


    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->route('home')->with('success', 'Customer deleted successfully!');
    }

    public function checkCurrency(StoreCustomer $request)
    {

      $client = new Client();
        $res = $client->request('POST', 'http://webservices.currencysystem.com/currencyserver/', [
            'form_params' => [
                'licenseKey' => '',
                'currency' => 'MXN',
            ]
        ]);

        dd(res);

      return redirect()->route('customers.create')->with('success', 'Customer created successfully!');
    }

}
