<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorialController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('tutorials.index', [
            'title' => 'get user form table using DB::table',
            'users' => $users,
        ]);
    }

    public function singlerow()
    {
        $user = DB::table('users')->where('name', 'Cesar Lynch')->first();
        dd($user);
    }

    public function pluck()
    {
        $titles = DB::table('users')->pluck('name');
        $titles = DB::table('users')->pluck('id', 'name');
        dd($titles);
    }

    public function chunks()
    {
        DB::table('users')->orderBy('id')->chunk(100, function ($users) {
            dd($users);
        });

    }

    public function lazy()
    {
        DB::table('users')->orderBy('id')->lazy()->each(function ($user) {
            dd($user);
        });
    }

    public function join()
    {
        $customers = DB::table('customers')
            ->join('customers_packages', 'customers.id', '=', 'customers_packages.customer_id')
            ->join('packages', 'customers_packages.package_id', '=', 'packages.id')
            ->select('customers.*', 'customers.name', 'packages.title', 'packages.price')
            ->get();

        dd($customers);
    }

    public function leftjoin()
    {
        $customers = DB::table('customers')
            ->leftJoin('customer_purchases', 'customers.id', '=', 'customer_purchases.customer_id')
            ->get()
            ->where('method', '=', 'paypal');
        dd($customers);
    }

    public function rightjoin()
    {
        $customers = DB::table('customers')
            ->rightJoin('customer_purchases', 'customers.id', '=', 'customer_purchases.customer_id')
            ->get();
        dd($customers);
    }
}
