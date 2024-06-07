<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\DeliveryArea;

class DashboardController extends Controller
{
    function index() : View {
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        return view('frontend.dashboard.index');
    }

    function createAddress(Request $request)  {
         dd($request->all());
    }


}
