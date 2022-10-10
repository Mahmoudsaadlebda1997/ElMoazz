<?php

namespace Modules\CommonModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    private $data,$template,$subject_title;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @param $data
     * @param $template
     * @param $subject
     * @param  $attachment
     */
    public function __construct($data,$template,$subject,$attachment = null)
    {
        $this->data = $data;
        $this->template = $template;
        $this->subject_title = $subject;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $build =  $this->view($this->template)
            ->with('content',$this->data)
            ->subject($this->subject_title);
        if ($this->attachment){
            $build->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType(),
            ]);
        }

        return $build;
    }
}
