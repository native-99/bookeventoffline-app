<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'customer_bank_name',
        'customer_bank_account',
        'customer_bank_number',
        'booking_trx_id',
        'proof',
        'quantity',
        'total_amount',
        'is_paid',
        'workshop_id',
    ];

    // Method untuk membuat ID Transaksi Unik (contoh: AKT1234)
public static function generateUniqueTrxId()
    {
        $prefix = 'AKT';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function participants()
    {
        return $this->hasMany(WorkshopParticipant::class);
    }



    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    public function bookingTransaction()
    {
        return $this->belongsTo(BookingTransaction::class, 'booking_transaction_id');
    }
}
