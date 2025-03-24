<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteamService
{
    public $appID;
    public $urlImage;
    public $urlReview;
    public $gamePhoto;
    public $reviewScore;


    public function __construct($ID)
    {
        $this->appID = $ID;
        $this->set_image_url($this->appID);
        // $this->set_review_url($ID);
        $this->setImageJson($this->urlImage);
        // $this->setReviewJson($this->urlReview);
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
