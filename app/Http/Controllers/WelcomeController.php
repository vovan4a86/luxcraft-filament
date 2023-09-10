<?php

namespace App\Http\Controllers;

use App\Settings\IndexPageSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $hero_video = app(IndexPageSettings::class)->hero_video;
        if ($hero_video) $hero_video = Storage::url($hero_video);

        return view('pages.index', [
            'hero_video' => $hero_video,
            'hero' => app(IndexPageSettings::class)
        ]);
    }
}
