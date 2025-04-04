<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlPostRequest;
use App\Services\UrlShorteningService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UrlShorteningController extends Controller
{

    public function __construct(private UrlShorteningService $urlShorteningService) {}

    /**
     * Encode and Store the Url endpoint.
     */
    public function create()
    {
        return Inertia::render('ShortenUrl');
    }

    /**
     * Encode and Store the Url endpoint.
     */
    public function store(UrlPostRequest $request)
    {
        $longUrl = $request->input('longUrl');
        $response = $this->urlShorteningService->saveUrl($longUrl);

        return to_route('url.shorten')
            ->with('message', 'Short Url is: ' . $response->short_url);
    }

    /**
     * Decode and Show the Url endpoint.
     */
    public function show(Request $request)
    {
        $shortUrl = $request->shortUrl;
        if ($shortUrl == '') {
            return Inertia::render('FindUrl');
        }
        $response = $this->urlShorteningService->retrieveUrl($shortUrl);
        if ($response) {
            return to_route('url.look-up')
                ->with('message', 'Long Url is: ' . $response->long_url);
        } else {
            return to_route('url.look-up')
                ->withErrors(['shortUrl' => 'Short URL  not found.']);
        }
    }
}
