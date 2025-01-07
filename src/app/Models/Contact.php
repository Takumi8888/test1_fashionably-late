<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    /**
     * @param  Builder<User>  $query
     */

    /**
     * 絞り込み・キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder
     * @param array
     * @return \Illuminate\Database\Eloquent\Builder
     */

    // Keyword（first_name、last_name、email）
    public function scopeKeywordSearch(Builder $query, $keywords)
    {
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->Where('first_name', $keywords)
                    ->orWhere('first_name', 'like', '%' . $keywords . '%')
                    ->orWhere('last_name', $keywords)
                    ->orWhere('last_name', 'like', '%' . $keywords . '%')
                    ->orWhere('email', $keywords)
                    ->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }

        return $query;
    }

    // Gender
    public function scopeGenderSearch(Builder $query, $gender): void
    {
        if (!empty($gender)) {
            $query->orWhere('gender', $gender);
        }
    }

    // Category
    public function scopeCategorySearch(Builder $query, $category_id): void
    {
        if (!empty($category_id)) {
            $query->orWhere('category_id', $category_id);
        }
    }

    // Date
    public function scopeDateSearch(Builder $query, $created_at): void
    {
        if (!empty($created_at)) {
            $query->orWhere('created_at', $created_at);
        }
    }
}
