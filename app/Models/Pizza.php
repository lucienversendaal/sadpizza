<?php

namespace App\Models;

use App\Http\Requests\StorePizzaRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'toppings',
        'address',
        'user_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // this will mutate the data just before it's sent to the DB, it will shows a comma and a space after each topping.
    public function setToppingsAttribute($value)
    {
        if (!empty(request()->input('toppings'))){
            $this->attributes['toppings'] = implode(', ', $value);
        }else{
            $this->attributes['toppings'] = "no topping";
        }

    }
}
