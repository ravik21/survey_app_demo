<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function questions()
    {
          return $this->hasMany(SectionQuestion::class, 'section_id', 'id');
    }
}
