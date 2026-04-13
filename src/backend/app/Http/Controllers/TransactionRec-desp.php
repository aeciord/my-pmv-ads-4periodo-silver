<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'date' => 'required|date'
        ];
    }

    public function authorize()
    {
        return auth()->check();
    }

    public function messages()
    {
        return [
            'type.in' => 'Transaction type must be either income or expense',
            'amount.min' => 'Amount must be at least 0.01'
        ];
    }
}
