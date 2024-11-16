<?php

namespace App\Http\Controllers;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileConversionController extends Controller
{
    public function convertMovToMp3(Request $request)
    {
//        return response()->json([
//            'success' => true,
//            'message' => 'Hello!',
//        ]);


        Log::info('converting');

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimetypes:video/quicktime|max:500240', // .mov file
        ]);

        $movFile = $request->file('file');
        $outputPath = storage_path('app/public/converted');

        // Ensure the output directory exists
        if (!file_exists($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        // Define input and output paths
        $inputFilePath = $movFile->getPathname();
        $outputFilePath = $outputPath . '/' . pathinfo($movFile->getClientOriginalName(), PATHINFO_FILENAME) . '.mp3';

        // Use FFmpeg to convert the file
        $ffmpeg = FFMpeg::create();
        $audio = $ffmpeg->open($inputFilePath);

        // Set the MP3 format
        $format = new Mp3();

        // Convert to MP3 and save
        $audio->save($format, $outputFilePath);

        return response()->json([
            'success' => true,
            'message' => 'File converted successfully.',
            'download_url' => url('storage/converted/' . basename($outputFilePath)),
            'output_path' => $outputFilePath,
        ]);
    }
}
