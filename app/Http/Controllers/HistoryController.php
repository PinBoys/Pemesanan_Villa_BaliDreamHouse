<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // Data dummy untuk tampilan awal
        $payments = [
            [
                'villa' => 'Dream House Villa',
                'amount' => 'Rp 2.500.000',
                'status' => 'Success',
                'date' => '2025-12-02'
            ],
            [
                'villa' => 'Ocean View Villa',
                'amount' => 'Rp 3.200.000',
                'status' => 'Pending',
                'date' => '2025-12-03'
            ],
        ];

        return view('pembayarans.history', compact('payments'));
    }
}