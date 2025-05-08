<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\WeddingRegistrationRequest;
use App\Jobs\ProcessContact;
use App\Jobs\ProcessWeddingRegistration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class RequestController extends Controller
{
    public function contactForm(ContactFormRequest $request): JsonResponse
    {
        return $this->store($request, fn(array $data) => ProcessContact::dispatch($data));
    }

    public function weddingRegistrationForm(WeddingRegistrationRequest $request): JsonResponse
    {
        return $this->store($request, fn(array $data) => ProcessWeddingRegistration::dispatch($data));
    }

    private function store(FormRequest $request, callable $job): JsonResponse
    {
        try {
            $job($request->validated());
        } catch (Throwable $e) {
            Log::error($e);

            return response()->json(status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json();
    }
}
