<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExchangeController extends Controller
{
    public function exchangePoints(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|min:10',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:5000'
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "error", "errors" => $validator->errors()], 400);
        }

        try {
            // Menyimpan data penukaran ke database
            DB::table('exchanges')->insert([
                'phone' => $request->phone,
                'email' => $request->email,
                'amount' => $request->amount,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json(["status" => "success", "message" => "Exchange request successful."]);
        } catch (\Exception $e) {
            return response()->json(["status" => "error", "message" => "An error occurred.", "details" => $e->getMessage()], 500);
        }
    }
}
