<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCode extends Model
{
    protected $table = "postcodelatlng";

    public static function getLongitudeLatitude(string $postCode)
    {
        $postCode = PostCode::select('id', 'longitude', 'latitude')
            ->where('postcode', $postCode)
            ->first();
        return (isset($postCode->id) && $postCode->longitude != 0 && $postCode->latitude != 0) ? $postCode->toArray() : [];
    }
}
