<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    /**
     * Fetch quotes
     *
     * @return void
     */
    public function getQuotes(Request $request)
    {
        try{
            // $response = Http::get('https://api.kanye.rest');
            // $quote = $response->json('quote');

            // Read File
            $jsonString = file_get_contents(base_path('database/seeders/KanyeQuotes.json'));
            $generalQuotes = json_decode($jsonString, true);

            $totalItemsToGet = $request->number ?? 5;
            $quoteKeys = array_rand($generalQuotes, $totalItemsToGet);
            $quotes = [];

            foreach($quoteKeys as $key){
                $quotes[] = $generalQuotes[$key];
            }
            // return $quotes;


            return ApiResponse::validResponse('successfull', ['quotes' => $quotes]);
        }catch(Exception $e){
            return ApiResponse::errorResponse($e->getMessage());
        }
    }

}
