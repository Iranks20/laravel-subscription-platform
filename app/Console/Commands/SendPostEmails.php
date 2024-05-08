<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Jobs\SendEmailToSubscribers;
use Illuminate\Console\Command;

class SendPostEmails extends Command
{
    protected $signature = 'email:send';
    protected $description = 'Send emails to subscribers about new posts';

    public function handle()
    {
        $posts = Post::where('email_sent', false)->get();
        foreach ($posts as $post) {
            SendEmailToSubscribers::dispatch($post);
        }
        $this->info('Emails have been sent for all new posts.');
    }
}

