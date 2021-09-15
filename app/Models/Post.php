<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'status'
    ];

    /**
     * Get status draft
     * 
     * @return number
     */
    public const STATUS_DRAFT = 0;

    /**
     * Get status public
     * 
     * @return number
     */
    public const STATUS_PUBLIC = 1;

    /**
     * Override default id
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function (Post $post) {
            $post->id = Str::uuid();
        });
    }

}
