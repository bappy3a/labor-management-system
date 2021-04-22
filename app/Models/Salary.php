<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
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

    public function projectDetail()
	{
		return $this->belongsTo(ProjectDetail::class,'project_detail');
	}
}
