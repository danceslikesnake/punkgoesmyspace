<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumSingleVote;
use Cookie;
use Illuminate\Support\Facades\DB;

class AlbumSingleVotesController extends Controller
{
    public function index() {
        $get_votes = AlbumSingleVote::groupBy('band_name')->select('band_name', DB::raw('count(*) as total'))->get();
        $total_votes = 0;
        $votes = array(
            'Circa Survive' => 0,
            'Dance Gavin Dance' => 0,
            'Grayscale' => 0,
            'Don Broco' => 0,
            'Underoath' => 0
        );
        foreach($get_votes as $v) {
            $votes[$v->band_name] = $v->total;
            $total_votes += $v->total;
        }
        return view('auth.votingresults.index')
            ->with('votes', $votes)
            ->with('total_votes', $total_votes);
    }

    public function cast_vote(Request $request) {
        $user = $_COOKIE['pga_user_id'];
        $check_votes = AlbumSingleVote::where('cookie_id', '=', $user)->get();

        if(count($check_votes) == 0) {
            $vote = new AlbumSingleVote;
            $vote->band_name = $request->input('band_name');
            $vote->cookie_id = $user;
            $vote->ip_address = $this->getUserIP();
            $vote->save();
        }

        return response()->json(array('result' => 'success'));
    }

    private function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
}
