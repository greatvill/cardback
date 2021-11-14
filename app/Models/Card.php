<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Card
 *
 * @property int $id
 * @property int $number
 * @property int $user_id
 * @property string $data
 * @property string|null $card_url
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CardFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCardUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereViews($value)
 * @mixin \Eloquent
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder|Card wherePassword($value)
 */
class Card extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => AsArrayObject::class,
        'user_id' => 'int'
    ];

    protected $fillable = [
        'data',
        'user_id',
    ];

    protected $guarded = [ "id" ];
    public function getDataAttribute($value){
        return collect(json_decode($value));
    }
}
