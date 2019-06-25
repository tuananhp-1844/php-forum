<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\Post;
use Str;

class GetDataFromViblo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:viblo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('https://viblo.asia/api/posts/newest?limit=20');
        $result = json_decode($result->getBody()->getContents());
        
        foreach ($result->data as $key => $post) {
            try {
                Post::create([
                    'user_id' => 51,
                    'title' => $post->title,
                    'slug' => Str::slug($post->title),
                    'content' => $post->contents,
                    'view' => 0,
                    'status' => 1,
                    'category_id' => 1,
                ]);
            } catch (\Throwable $th) {

            }
            
        }
    }
}
