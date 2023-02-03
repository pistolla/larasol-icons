<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardApiController extends Controller
{
    
    /**
     * @OA\Get(path="/api/dashboard", 
     *   description="Get all Dashboard",       
     *   operationId="getDashboard",
     *   tags={"Dashboard"},
     *   @OA\Response(response=200, 
     *     description="OK",
     *     @OA\JsonContent()
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        //
    }
}
