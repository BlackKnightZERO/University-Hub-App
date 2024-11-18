<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{

    protected $fillable = ['storageable_id', 'storageable_type', 'file_type', 'path'];

    public function storageable() {
        return $this->morphTo();
    } 
}
