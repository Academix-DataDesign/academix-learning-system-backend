<?php

// app/Http/Controllers/ApiController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use DateTime;
use DateInterval;

class ApiController extends Controller
{
    public function getChartData(): JsonResponse
    {
        $endDate = new DateTime('now');
        $startDate = (clone $endDate)->sub(new DateInterval('P6D'));

        $labels = [];
        $currentDate = (clone $startDate); // Start from the adjusted start date

        while ($currentDate <= $endDate) {
            $labels[] = $currentDate->format('Y-m-d');
            $currentDate->add(new DateInterval('P1D'));
        }

        $users = User::whereDate('created_at', '>=', $startDate->format('Y-m-d'))
            ->whereDate('created_at', '<=', $endDate->format('Y-m-d'))
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
