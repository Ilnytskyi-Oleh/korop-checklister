<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    protected $errorBag = 'storetask';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required', 'max:50'],
            'description' => ['string', 'required', 'max:500'],
        ];
    }
}
