<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class EnbeddingComposer
{
    public function compose(View $view)
    {
        $view->with('title', env('APP_NAME', 'sample.info'));
        $view->with('twitter', env('TWITTER_USER_ID', ''));

        $view->with('git', env('GITHUB_USER_ID', ''));
        $view->with('repository', env('GITHUB_REPOSITORY', ''));
    }
}
