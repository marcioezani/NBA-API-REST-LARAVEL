<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->descriptiveResponseMethods();
    }

    protected function descriptiveResponseMethods()
    {
        $instance = $this;

        Response::macro('ok', function (mixed $data = [], string $message = '') {
            $status = 200;

            return Response::json([
                'status' => $status,
                'status_type' => 'Ok',
                'message' => $message,
                'data' => $data
            ], $status);
        });

        Response::macro('created', function (mixed $data = [], string $message = '') {
            if (count($data)) {
                $status = 201;

                return Response::json([
                    'status' => $status,
                    'status_type' => 'Created',
                    'message' => $message,
                    'data' => $data
                ], $status);
            }

            return Response::json([], 201);
        });

        Response::macro('noContent', function (mixed $data = [],  string $message = '') {
            $status = 204;

            return Response::json([
                'status' => $status,
                'status_type' => 'No Content',
                'message' => $message,
            ], $status);
        });

        Response::macro('badRequest', function (string $message = 'Validation Failure', array $errors = []) use ($instance) {
            return $instance->handleErrorResponse($message_type = 'Validation Failure', $message, $errors, 400);
        });

        Response::macro('unauthorized', function (string $message = 'User unauthorized', array $errors = []) use ($instance) {
            return $instance->handleErrorResponse($message_type = 'User unauthorized', $message, $errors, 401);
        });

        Response::macro('forbidden', function (string $message = 'Access denied', array $errors = []) use ($instance) {
            return $instance->handleErrorResponse($message_type = 'Access denied', $message, $errors, 403);

        });

        Response::macro('notFound', function (string $message = 'Resource not found', array $errors = []) use ($instance) {
            return $instance->handleErrorResponse($message_type = 'Resource not found', $message, $errors, 404);
        });

        Response::macro('internalServerError', function (string $message = 'Internal Server Error', array $errors = []) use ($instance) {
            return $instance->handleErrorResponse($message_type = 'Internal Server Error', $message, $errors, 500);
        });
    }

    public function handleErrorResponse(string $message_type, string $message, array $errors, int $status)
    {
        $response = [
            'status' => $status,
            'status_type' => $message_type,
            'message' => $message,
        ];

        if (count($errors)) {
            $response['errors'] = $errors;
        }

        return Response::json($response, $status);
    }
}