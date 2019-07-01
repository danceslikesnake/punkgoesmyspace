<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Video;
use App\Profile;
use App\BannerAd;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('sort', 'asc')->paginate(12);
        $profile = Profile::find(1);

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.videos.index')
            ->with('videos', $videos)
            ->with('profile', $profile)
            ->with('banner_ad', $banner_ad);
    }
    public function cms_index()
    {
        $videos = Video::orderBy('sort', 'asc')->get();

        return view('auth.videos.index')->with('videos', $videos);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'video_link' => 'required'
        ]);

        try {
            $video_id = Youtube::parseVidFromURL($request->video_link);

            $video_info = Youtube::getVideoInfo($video_id);
            $duration = (string)$video_info->contentDetails->duration;
            $maxres_thumbnail = (string)$video_info->snippet->thumbnails->maxres->url;
            $standard_thumbnail = (string)$video_info->snippet->thumbnails->standard->url;

            $video = new Video;
            $video->video_id = (string)$video_id;
            $video->title = (string)$video_info->snippet->title;
            $video->video_length = $this->parse_duration($duration);
            $video->video_thumbnail = ($maxres_thumbnail !== '') ? $maxres_thumbnail : $standard_thumbnail;

            // get sort order
            $get_sort = Video::select('sort')->orderByDesc('sort')->take(1)->get()->toArray();
            $video->sort = $get_sort[0]['sort'] + 1;

            $video->save();

            return redirect('admin/music_videos')->with('success', $video_info->snippet->title.' was added.');
        } catch (\Exception $e) {
            return redirect('admin/music_videos')->with('errors', $e->getMessage());
        }
    }
    public function show($id)
    {
        $video = Video::find($id);
        $get_all_videos = Video::select('id')
            ->orderBy('sort', 'asc')
            ->get()
            ->toArray();
        $prev_next_videos = $this->get_prev_next_videos($get_all_videos, $id);
        $other_videos = Video::inRandomOrder()
            ->take(2)
            ->whereNotIn('id', [$id])
            ->get();

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.videos.show')
            ->with('video', $video)
            ->with('otherVideos', $other_videos)
            ->with('prevNextVideos', $prev_next_videos)
            ->with('banner_ad', $banner_ad);
    }
    public function destroy($id)
    {
        $video = Video::find($id);
        $title = $video->title;
        $video->delete();

        return redirect('admin/music_videos')->with('success', $title.' was removed');
    }
    public function sort(Request $request) {
        $sort_order = 1;
        $sorted_items = explode(',', $request->input('sorted_items'));
        foreach($sorted_items as $item) {
            $update = DB::table('videos')->where('id', $item)->update(['sort' => $sort_order]);
            $sort_order++;
        }
    }
    private function parse_duration($str) {
        preg_match_all('/(\d+)/',$str,$parts);

        // Put in zeros if we have less than 3 numbers.
        if (count($parts[0]) == 1) {
            array_unshift($parts[0], "0", "0");
        } elseif (count($parts[0]) == 2) {
            array_unshift($parts[0], "0");
        }

        $sec_init = $parts[0][2];
        $seconds = $sec_init%60;
        $seconds_overflow = floor($sec_init/60);

        $min_init = $parts[0][1] + $seconds_overflow;
        $minutes = ($min_init)%60;
        $minutes_overflow = floor(($min_init)/60);

        $hours = $parts[0][0] + $minutes_overflow;

        // add leading zeros
        $minutes = ($minutes < 10) ? '0'.$minutes : $minutes;
        $seconds = ($seconds < 10) ? '0'.$seconds : $seconds;

        if($hours != 0)
            return $hours.':'.$minutes.':'.$seconds;
        else
            return $minutes.':'.$seconds;
    }

    private function get_prev_next_videos($videos, $current_id) {
        $videos_count = count($videos);
        $result = array();
        foreach($videos as $db_id => $value) {
            if($value['id'] == $current_id) {
                // prev
                $prev = $db_id - 1;
                $next = $db_id + 1;

                if($prev < 0) {
                    $prev = $videos_count - 1;
                }
                if($next > $videos_count - 1) {
                    $next = 0;
                }
                $result['prev'] = $videos[$prev]['id'];
                $result['next'] = $videos[$next]['id'];
            }
        }
        return $result;
    }
}
