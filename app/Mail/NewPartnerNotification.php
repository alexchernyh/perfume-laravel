<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Partner;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPartnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $partner;
    public $sub_partner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
        $sub_partner = Partner::find($partner->invited_id);
        $this->sub_partner = $sub_partner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.new_partner')
        ->with([
            'subPartner' => $this->sub_partner
        ])->subject('Зарегистрирован новый партнер | N-Base');
    }
}
