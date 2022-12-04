<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'message',
        'finished',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Фильтрация по типу заявки
     * @param Builder $query
     * @param bool $type
     * @return Builder
     */
    public function scopeFinished(Builder $query, bool $type): Builder
    {
        return $query->where('finished',$type);
    }

    /**
     * Фильтрация по номеру телефона
     * @param Builder $query
     * @param string $phone
     * @return Builder
     */
    public function scopeByNumber(Builder $query, string $phone): Builder
    {
        return $query->where('phone','like',"$phone%");
    }
}
