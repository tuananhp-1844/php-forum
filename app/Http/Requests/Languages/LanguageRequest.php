<?php

namespace App\Http\Requests\Languages;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'lang' => 'in:vi,en'
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['lang'] = $this->route('lang');
        return $data;
    }
}
