<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Exception;

trait ApiJsonExternal {

    // get data from https://jsonplaceholder.typicode.com/
    public function getUsersData()
    {
        $apiUrl = config('jsonplaceholder.jsonplaceholder_url');

        try {
            $response = Http::get($apiUrl.'users');

            $posts = json_decode($response->body(), true);

            return $posts;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // get data from https://jsonplaceholder.typicode.com/
    public function getPostsData()
    {
        $apiUrl = config('jsonplaceholder.jsonplaceholder_url');

        try {
            $response = Http::get($apiUrl.'posts');

            $posts = json_decode($response->body(), true);

            return $posts;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
