<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SteamService
{
    public $appID;
    public $urlImage;
    public $urlReview;
    public $gamePhoto;
    public $reviewScore;
    public $localPath;


    public function __construct($ID)
    {
        $this->appID = $ID;
        $this->set_image_url($this->appID);
        // $this->set_review_url($ID);
        $this->setImageJson($this->urlImage);
        // $this->setReviewJson($this->urlReview);
        $this->downloadImage();
    }

    private function set_image_url($appID)
    {
        $this->urlImage = "https://store.steampowered.com/api/appdetails?appids={$appID}";
    }

    private function setImageJson($urlImage)
    {

        $dataImage = Http::withoutVerifying()->get($urlImage)->json();
        $this->gamePhoto =
            $dataImage[$this->appID]['data']['header_image'];
    }

    private function downloadImage()
    {
        if (!$this->gamePhoto) {
            return;
        };
        $imageContent = Http::withoutVerifying()->get($this->gamePhoto)->body();
        $filename = "steam_games/{$this->appID}.jpg";
        Storage::disk('public')->put($filename, $imageContent);
        $this->localPath = 'storage/' . $filename;
    }
    public function getLocalImgPath()
    {
        return $this->localPath;
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
