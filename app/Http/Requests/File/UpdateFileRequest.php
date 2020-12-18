<?php

namespace App\Http\Requests\File;

use App\Models\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'category' => explode(',', $this->category),
            'slug' => $this->name
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $file = File::find($this->id);

        return $file && $this->user()->can('update', $file);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:files',
            'name' => 'required|string|unique:files,name,'.$this->id,
            'category' => 'required|array',
            'writer' => 'required|string',
            'description' => 'required|string|min:50',
            'cover' => 'image|max:5000',
        ];
    }
}
