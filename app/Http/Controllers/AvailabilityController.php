<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
    {
        $villas = [
            ['id' => 1, 'name' => 'Villa 1'],
            ['id' => 2, 'name' => 'Villa 2'],
        ];

        $bookingsMap = [
            1 => ['2025-11-04','2025-11-10','2025-11-23'],
            2 => ['2025-11-15']
        ];

        return view('availability', compact('villas', 'bookingsMap'));
    }
}
