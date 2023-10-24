<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard(){
        $qry = Order::select('id','user_id','order_no','grand_total','mode','status','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        $userCount = User::count();
        $categoryCount = Category::count();
        $productCount = Product::count();
        return view('backend/dashboard')->with(['data'=>$data,'datacount'=>$dataCount,'userCount'=>$userCount,'categoryCount'=>$categoryCount,'productCount'=>$productCount]);
    }
}
