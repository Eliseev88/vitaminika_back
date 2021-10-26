<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewAddRequest;
use App\Models\Review;
use App\Services\FileUploadService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewAddRequest $reviewAddRequest, FileUploadService $uploadService)
    {
        $fields = $reviewAddRequest->validated();
        $pathDir = '/reviews/files' . $fields['name'];

        if ($reviewAddRequest->hasFile('file')) {
            $fields['file'] = $uploadService->upload($reviewAddRequest->file('file'), $pathDir);
        }

        $fields['created_at'] = Carbon::now();

        $review = Review::create($fields);

        if ($review) {
            return redirect()->route('contacts')
                ->with('success', 'Ваш отзыв отправлен.');
        }

        return back()->withInput();


    }
}
