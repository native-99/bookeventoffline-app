<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopParticipant extends Model
{
    use HasFactory, SoftDeletes;

    // Mendefinisikan nama tabel secara eksplisit (sesuai gambar)
    protected $table = 'workshop_participants';

    protected $fillable = [
        'name',
        'occupation',
        'email',
        'workshop_id',
        'booking_transaction_id',
    ];

    // Relasi ke tabel Workshop
    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    // Relasi ke tabel BookingTransaction
    public function bookingTransaction()
    {
        return $this->belongsTo(BookingTransaction::class, 'booking_transaction_id');
    }
}
