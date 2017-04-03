<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;


class UploadImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'logo_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
//            'background_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
//            'video_url' => 'required|mimetypes:video/mp4',
        ];
    }
}
