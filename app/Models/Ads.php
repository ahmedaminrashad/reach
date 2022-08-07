<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ads extends Model
{
    use HasFactory;

    protected $table = 'ads';
    protected $guarded = ['id'];
    public static $free = 'free';
    public static $paid = 'paid';

    protected $dates=[''];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'ad_tags', 'ad_id', 'tag_id');
    }

    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
