<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = "resources";

    protected $fillable = [
        "title",
        "video_path",
        "description",
        "document_path"
    ];
}
