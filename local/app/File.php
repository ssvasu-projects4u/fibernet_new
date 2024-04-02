<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $table = 'files';
    protected $fillable = [
        'user_id',
        'file_path',
        'user_type',
        'original_filename',
        'filename',
        'certification_name'
    ];
}
