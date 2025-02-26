<?php declare(strict_types=1);

namespace Platform\Accounts\Presentation\Http\Requests;

use Platform\Shared\Traits\RequestToDto;
use Illuminate\Foundation\Http\FormRequest;
use Platform\Shared\Traits\AlwaysAuthorized;

class StoresAccountRequest extends FormRequest
{
    use AlwaysAuthorized;
    use RequestToDto;

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

}
