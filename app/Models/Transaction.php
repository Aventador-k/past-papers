<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'paperId',
        'customer_email',
        'customer_phone',
        'reference_code',
        'amount'
    ];

    public static function boot(): void
    {
        parent::boot();
        static::creating(function (Transaction $transaction){
            $transaction->reference_code = Str::uuid();
        }

        );
    }
}
