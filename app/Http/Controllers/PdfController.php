<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function downloadPdf()
    {
        $filePath = public_path('/pdf/vinnex_Services_profile.pdf'); // Adjust the path as necessary

        if (!file_exists($filePath)) {
            abort(404);
        }

        return Response::download($filePath, 'vinnexservices.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
