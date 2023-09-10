<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Traits\HasH1;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PageController extends Controller
{
    public function page($alias = null): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $path = explode('/', $alias);

        if (!$alias) {
            $page = Page::query()->find(1);
        } else {
            $page = Page::getByPath($path);
            if (!$page) abort(404, 'Страница не найдена');
        }

        $page->h1 = $page->getH1();
        $view = $page->getView();

        return view($view, [
           'page' => $page,
           'h1' => $page->h1,
           'text' => $page->text
        ]);

    }

    public function policy(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $page = Page::getByPath(['policy']);
        if (!$page) {
            return abort(404);
        }
        $page->h1 = $page->getH1();
        $page->setSeo();
        $page->ogGenerate();
        $bread = $page->getBread();

        return view(
            'pages.text',
            [
                'bread' => $bread,
                'page' => $page,
                'h1' => $page->h1,
                'text' => $page->text,
            ]
        );
    }

}
