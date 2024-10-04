<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'root_domain',
        'github_repo_url',
        'is_managed_by_openpress',
    ];

    protected $casts = [
        'is_managed_by_openpress' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}