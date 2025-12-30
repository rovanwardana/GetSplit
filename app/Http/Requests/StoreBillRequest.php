<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'due_date' => 'nullable|date|after_or_equal:today',
            'split_method' => 'required|in:equal,custom',
            'tax' => 'nullable|integer|min:0',
            'discount' => 'nullable|numeric|min:0',

            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string|max:255',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',

            'participants' => 'required|array|min:1',
            'participants.*.name' => 'required|string|max:255',
            'participants.*.user_id' => 'nullable|exists:users,id',

            'custom_split' => 'nullable|array',
        ];
    }
}
