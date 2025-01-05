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

    public function user()
    {
        return $this->belongsTo(user::class);
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

    public function scopeKeywordSearch(Builder $query, $keywords)
    {
        // dd($keywords);
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('first_name', 'like', '%' . $keywords . '%')
                    ->orWhere('last_name', 'like', '%' . $keywords . '%')
                    ->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }
        // dd($query);

        return $query;
    }

    // // // FirstName
    // public function scopeFirstNameAllSearch(Builder $query, $keyword): void
    // {
    //     if(!empty($keyword)){
    //         $query->where('first_name', $keyword);
    //     }
    // }

    // public function scopeFirstNameSearch(Builder $query, $keyword): void
    // {
    //     if (!empty($keyword)) {
    //         $query->where('first_name', 'like', '%' . $keyword . '%');
    //     }
    // }

    // // LastName
    // public function scopeLastNameAllSearch(Builder $query, $keyword): void
    // {
    //     if (!empty($keyword)) {
    //         $query->where('last_name', $keyword);
    //     }
    // }

    // public function scopeLastNameSearch(Builder $query, $keyword): void
    // {
    //     if (!empty($keyword)) {
    //         $query->where('last_name', 'like', '%' . $keyword . '%');
    //     }
    // }
    // // Email
    // public function scopeEmailAllSearch(Builder $query, $keyword): void
    // {
    //     if (!empty($keyword)) {
    //         $query->where('email', $keyword);
    //     }
    // }

    // public function scopeEmailSearch(Builder $query, $keyword): void
    // {
    //     if (!empty($keyword)) {
    //         $query->where('email', 'like', '%' . $keyword . '%');
    //     }
    // }

    // Gender
    public function scopeGenderSearch(Builder $query, $gender): void
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    // Category
    public function scopeCategorySearch(Builder $query, $category_id): void
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    // Date
    public function scopeDateSearch(Builder $query, $created_at): void
    {
        if (!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }



}
