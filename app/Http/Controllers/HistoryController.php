<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderHistory;

class HistoryController extends Controller
{
    public function index() {
        $order_history = OrderHistory::all();
        return view("history", ["order_historys"=> $order_history]);
    }
}
