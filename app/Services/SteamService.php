<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SteamService
{
    public $steam_id;
    public $urlImage;
    public $urlReview;
    public $gamePhoto;
    public $reviewScore;
    public $localPath;


    public function __construct($ID)
    {
        $this->steam_id = $ID;
        $this->set_image_url($this->steam_id);
        // $this->set_review_url($ID);
        $this->setImageJson($this->urlImage);
        // $this->setReviewJson($this->urlReview);
        $this->downloadImage();
        $this->getReviewScore();
    }

    private function set_image_url($steam_id)
    {
        $this->urlImage = "https://store.steampowered.com/api/appdetails?appids={$steam_id}";
    }

    private function setImageJson($urlImage)
    {

        $dataImage = Http::withoutVerifying()->get($urlImage)->json();
        $this->gamePhoto =
            $dataImage[$this->steam_id]['data']['header_image'];
    }

    private function downloadImage()
    {
        if (!$this->gamePhoto) {
            return;
        };
        $imageContent = Http::withoutVerifying()->get($this->gamePhoto)->body();
        $filename = "steam_games/{$this->steam_id}.jpg";
        Storage::disk('public')->put($filename, $imageContent);
        $this->localPath = 'storage/' . $filename;
    }
    public function getLocalImgPath()
    {
        return $this->localPath;
    }
    public function getGameVideo()
    {
        $url = "https://store.steampowered.com/api/appdetails?appids={$this->steam_id}";
        $response  = Http::withoutVerifying()->get($url)->json();
        if (isset($response[$this->steam_id]['data']['movies'][0]['mp4']['max'])) {

            return $response[$this->steam_id]['data']['movies'][0]['mp4']['max']; // High-quality video URL
        }
        return null;
    }
    public function getReviewScore()
    {
        $url = "https://store.steampowered.com/appreviews/{$this->steam_id}?json=1";
        $response  = Http::withoutVerifying()->get($url)->json();
        // dd($response['query_summary']['review_score_desc']);
        $this->reviewScore = $response['query_summary']['review_score_desc'];
    }


    // private function set_review_url($ID)
    // {
    //     $this->urlReview = "https://store.steampowered.com/appreviews/{$ID}?json=1";
    // }

    // public function get_review_url()
    // {
    //     echo $this->urlReview;
    // }

    // public function get_image()
    // {
    //     echo $this->urlImage;
    // }


    // private function setReviewJson($urlReview)
    // {
    //     $dataReview = Http::get($urlReview)->json();
    //     $this->reviewScore =
    //         $dataReview['query_summary']['review_score_desc'];
    // }
};
