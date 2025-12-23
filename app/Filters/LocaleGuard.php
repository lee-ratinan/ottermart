<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LocaleGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null): void
    {
        $supported = config('App')->supportedLocales ?? [];
        // If you use {locale} as first segment
        $seg = service('uri')->getSegment(1);
        // If there's no locale segment, do nothing
        if ($seg === null || $seg === '') {
            return;
        }
        if (! in_array($seg, $supported, true)) {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // no-op
    }
}