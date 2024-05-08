<?php

namespace App\Jobs;

use App\Mail\PostPublished;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return void
     */
    public function handle()
    {
        $subscribers = $this->post->website->subscribers;
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new PostPublished($this->post));
        }

        $this->post->email_sent = true;
        $this->post->save();
    }
}

