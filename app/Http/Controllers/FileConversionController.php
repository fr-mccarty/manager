<?php

namespace App\Http\Controllers;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileConversionController extends Controller
{
    public function handleMov(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimetypes:video/quicktime|max:500240', // .mov file
        ]);

        // Handle uploaded file
        $movFile = $request->file('file');
        $mediaFolder = 'public/media'; // Target folder for media files
        $clearFileName = pathinfo($movFile->getClientOriginalName(), PATHINFO_FILENAME);

        // Save the original file in the media folder with a clear name
        $originalFileName = $clearFileName . '.mov';
        $originalFilePath = $movFile->storeAs($mediaFolder, $originalFileName);
        $originalFileUrl = Storage::url('media/' . $originalFileName);

        // Ensure the media directory exists
        $mediaStoragePath = storage_path('app/' . $mediaFolder);
        if (!file_exists($mediaStoragePath)) {
            mkdir($mediaStoragePath, 0755, true);
        }

        // Define the path for the converted MP3 file
        $convertedFileName = $clearFileName . '.mp3';
        $convertedFilePath = $mediaStoragePath . '/' . $convertedFileName;

        // Convert the original .mov file to .mp3 using FFmpeg
        $ffmpeg = FFMpeg::create();
        $audio = $ffmpeg->open(storage_path('app/' . $originalFilePath));
        $format = new Mp3();

        // Save the converted file
        $audio->save($format, $convertedFilePath);

        // Generate public URL for the converted file
        $convertedFileUrl = Storage::url('media/' . $convertedFileName);

        // Return response with both original and converted file URLs
        return response()->json([
            'success' => true,
            'message' => 'File uploaded and converted successfully.',
            'original_file_url' => url($originalFileUrl),
            'converted_file_url' => url($convertedFileUrl),
        ]);
    }
}
