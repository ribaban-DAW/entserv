<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $option = $request->query('option');
        $query = $request->query('query');

        $articles = null;
        $sources = null;

        if ($option) {
            $query_params = "";
            if ($option != "sources") {
                $query_params = "q=$query";
            }
            $query_params .= "&apiKey=" . config('app.api_key');
            $url = "https://newsapi.org/v2/$option?$query_params";

            $response = @file_get_contents($url);
            if ($response === false) {
                return view('news.index', [
                    'error' => "Error obteniendo datos de $url",
                    'articles' => $articles,
                    'sources' => $sources
                ]);
            }

            $data = json_decode($response, true);
            $articles = $data['articles'] ?? null;
            $sources = $data['sources'] ?? null;
        }

        return view('news.index', compact('articles', 'sources'));
    }
}
