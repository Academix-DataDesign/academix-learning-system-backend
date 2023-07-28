<?php

// app/Http/Controllers/ApiController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function getChartData(): JsonResponse
    {
        $labels = ['2023-07-20', '2023-07-21', '2023-07-22', '2023-07-23', '2023-07-24', '2023-07-25', '2023-07-26', '2023-07-27', '2023-07-28'];

        $users = User::whereDate('created_at', '>=', '2023-07-20')
            ->whereDate('created_at', '<=', '2023-07-28')
            ->get()
            ->groupBy(function ($user) {
                return $user->created_at->format('Y-m-d');
            });

        $usersArray = [];

        foreach ($labels as $label) {
            $usersArray[] = isset($users[$label]) ? count($users[$label]) : 0;
        }

        return response()->json([
            'labels' => $labels,
            'users' => $usersArray,
        ]);
    }
}
