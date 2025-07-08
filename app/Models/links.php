<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use App\Models\category_link;

class links extends Model
{
    public function kategori()
    {
        return $this->belongsTo(category_link::class);
    }
}
