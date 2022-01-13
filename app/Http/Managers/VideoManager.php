<?php

namespace App\Http\Managers;


use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Auth;

class VideoManager
{
    public function videoStorage($video)
    {
        $filFullname = $video->getClientOriginalName();
        $filname = pathinfo($filFullname, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = time() . '_' . $filname . '_' . $extension;
        $video->storeAs('public/courses-sections/' . Auth::user()->id, $file);
        return $file;
    }
    public function getVideoDuration($video)
    {
        $getID3 = new \getID3();
        $pathVideo = 'storage/courses-sections/' . Auth::user()->id . '/' . $video;
        $fileAnalyze = $getID3->analyze($pathVideo);
        $playtime = $fileAnalyze['playtime_string'];
        return $playtime;
    }
}
