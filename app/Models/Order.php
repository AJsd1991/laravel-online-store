<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'amount',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function generateInvoice()
    {
        $pdf = \PDF::loadView('users.orders.invoice', ['order' => $this]);

        return $pdf->save($this->invoicePath());
    }

    public function invoicePath()
    {
        return storage_path('app/public/invoices/') . $this->id . '.pdf';
    }

    public function downloadInvoice()
    {
        return Storage::disk('public')->download('invoices/' . $this->id . '.pdf');
    }

    public function paid()
    {
        return $this->payment->status;
    }

}
