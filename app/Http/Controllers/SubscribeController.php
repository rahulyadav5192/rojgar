<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscribeController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'email' => ['required', 'email', 'max:255', 'unique:subscribers,email'],
            ]);

            Subscriber::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Thanks for subscribing.',
            ]);
        } catch (ValidationException $exception) {
            $errors = $exception->errors();

            if (isset($errors['email']) && in_array('The email has already been taken.', $errors['email'], true)) {
                return response()->json([
                    'status' => 'info',
                    'message' => 'This email is already subscribed.',
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => $errors['email'][0] ?? 'Please enter a valid email address.',
            ], 422);
        }
    }
}

