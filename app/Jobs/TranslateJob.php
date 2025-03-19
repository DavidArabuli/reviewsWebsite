<?php

namespace App\Jobs;

use App\Models\Review;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Review $review)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('translating ' . $this->review->content . ' to spanish');
    }
}
