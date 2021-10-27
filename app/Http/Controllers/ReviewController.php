<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewAddRequest;
use App\Models\Review;
use App\Services\FileUploadService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function store(ReviewAddRequest $reviewAddRequest, FileUploadService $uploadService)
    {
        $fields = $reviewAddRequest->validated();
        $fields['created_at'] = Carbon::now();
        $pathDir = '/reviews/files_' . Str::random(10);

        if ($reviewAddRequest->hasFile('file')) {
            $fields['file'] = $uploadService->upload($reviewAddRequest->file('file'), $pathDir);
        }

        $review = Review::create($fields);

        if ($review) {
            return redirect()->route('contacts')
                ->with('success');
        }

        return back()->withInput();


    }
}
