<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;

class Company extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass appendable.
     *
     * @var string[]
     */
    protected $appends = ['created_date', 'is_favorited'];

    /**
     * Determine when the company created.
     *
     * @return boolean
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Determine whether a company has been marked as favorite by a user.
     *
     * @return boolean
     */
    public function getIsFavoritedAttribute()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('company_id', $this->id)
                            ->first();
    }
}
