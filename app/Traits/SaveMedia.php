<?php

namespace App\Traits;

use App\Helpers\Helper;
use Illuminate\Validation\ValidationException;

trait SaveMedia
{

    public function saveMedia($mediaStrings, string $collection = 'default'): void
    {
        if (gettype($mediaStrings) === 'string') {
            $mediaStrings = json_decode($mediaStrings);
        }
        foreach ($mediaStrings as $key => $b64) {
            if (Helper::isValidBase64($b64)) {
                $this
                    ->addMediaFromString(base64_decode($b64))
                    ->usingFileName($this->id . '_' . $key . '.' . Helper::getFileExtension($b64))
                    ->toMediaCollection($collection);
            }
        }
    }
}
