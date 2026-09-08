<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Hotel;

class Apartment extends Model
{
    use HasFactory;

    protected $table = 'apartments';

    protected $fillable = [
        'hotel_id',
        'name',
        'image',
        'max_persons',
        'size',
        'view',
        'num_beds',
        'price',
        'description',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
