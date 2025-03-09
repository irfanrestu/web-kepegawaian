<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
         // Fetch the total number of pegawai
         $pegawaiCount = Pegawai::count();
         // Fetch the previous count (e.g., last month)
            $previousPegawaiCount = Pegawai::where('created_at', '<', now()->subMonth())->count();

            // Calculate the percentage change
            $percentageChange = 0;
            if ($previousPegawaiCount > 0) {
                $percentageChange = (($pegawaiCount - $previousPegawaiCount) / $previousPegawaiCount) * 100;
            }
         $posts = Post::latest()->take(5)->get();

         
        // Fetch the count of pegawai grouped by status_pegawai
        $pegawaiCounts = Pegawai::join('status_pegawais', 'pegawais.id_status_pegawai', '=', 'status_pegawais.status_pegawai_id')
        ->select('status_pegawais.status_pegawai', \DB::raw('count(pegawais.pegawai_id) as count'))
        ->groupBy('status_pegawais.status_pegawai')
        ->get();

        // Fetch the previous counts (e.g., last month)
            $previousPegawaiCounts = Pegawai::join('status_pegawais', 'pegawais.id_status_pegawai', '=', 'status_pegawais.status_pegawai_id')
            ->where('pegawais.created_at', '<', now()->subMonth())
            ->select('status_pegawais.status_pegawai', \DB::raw('count(pegawais.pegawai_id) as count'))
            ->groupBy('status_pegawais.status_pegawai')
            ->get();

        // Calculate the percentage change for each status
        $pegawaiCounts = $pegawaiCounts->map(function ($current) use ($previousPegawaiCounts) {
            $previous = $previousPegawaiCounts->firstWhere('status_pegawai', $current->status_pegawai);
            $previousCount = $previous ? $previous->count : 0;
            $percentageChange = 0;
            if ($previousCount > 0) {
                $percentageChange = (($current->count - $previousCount) / $previousCount) * 100;
            }
            $current->percentageChange = $percentageChange;
            return $current;
        });
        // Fetch the total number of posts
        $postCount = Post::count();
        // Fetch the previous count (e.g., last month)
    $previousPostCount = Post::where('created_at', '<', now()->subMonth())->count();

    // Calculate the percentage change
    $percentageChange = 0;
    if ($previousPostCount > 0) {
        $percentageChange = (($postCount - $previousPostCount) / $previousPostCount) * 100;
    }


        return view('dashboards.index', compact('user','pegawaiCount','posts','pegawaiCounts','postCount','percentageChange','percentageChange')); 
    }
}
