<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $action = $this->routeFuncAction();

        $rules = [];

        switch ($action) {
            case 'store':
                $rules = [
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                    'slug' => 'required|string|max:255|unique:categories',
                ];
                break;
            case 'update':
                $rules = [
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                ];
                break;
        }

        return $rules;
    }

    private function routeFuncAction(): string
    {
        /** @var \Illuminate\Routing\Route $route */
        $route = self::route();

        $routeAction = $route->getAction();
        $route = Str::of($routeAction['controller'])->explode('@');

        return $route[1];
    }
}
