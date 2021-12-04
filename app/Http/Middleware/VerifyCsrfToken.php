<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'upload-photo',
        'getImageAjax',
        'deleteImageAjax',
        'floor',
        'updatefloor',
        'uploadlogo',
        'saveLeadPhoto',
        'updateVirutalType',
        'uploadphoto',
        'send-reply',
        'uploadbackground',
        'deleteDocsAjax',
        'publish',
        'upload_custom_logo',
    ];
}