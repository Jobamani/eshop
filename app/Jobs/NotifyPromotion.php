<?php

namespace App\Jobs;

use App\Models\Promotion;
use App\Models\User;
use App\Notifications\PromotionCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class NotifyPromotion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_ids;
    protected $promotion;

    /**
     * Create a new job instance.
     */
    public function __construct($user_ids, Promotion $promotion)
    {
        $this->user_ids = $user_ids;
        $this->promotion = $promotion;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('NotifyPromotion called', $this->user_ids);

        // Loop through the user IDs and send notifications
        foreach ($this->user_ids as $user_id) {          
            $user = User::find($user_id);
            if ($user) {
                // Send the notification to each user
                $user->notify(new PromotionCreated($this->promotion));
            }
        }
    }
}
