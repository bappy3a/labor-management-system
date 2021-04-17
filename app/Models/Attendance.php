<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function labor()
	{
		return $this->belongsTo(Labor::class);
	}

    public function project()
	{
		return $this->belongsTo(Project::class);
	}
}
