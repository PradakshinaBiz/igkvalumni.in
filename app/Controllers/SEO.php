<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SEO extends BaseController
{
    public function robots()
    {
        $this->response->setContentType('text/plain');
        return view('pages/seo/robots');
    }
    public function sitemap()
    {
        $this->response->setContentType('text/xml');
        return view('pages/seo/sitemap');
    }
}
