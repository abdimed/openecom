<?php

namespace App\Http\Livewire;

use App\Models\ContactMessages;
use App\Models\User;
use Livewire\Component;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $successMessage;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    public function submitForm()
    {
       $message = ContactMessages::create($this->validate());

       $admins = User::permission('contactmessages viewAny')->get();

        Notification::make()
            ->title('Nouveau Message')
            ->body('**' . $this->name . '**' . 'a envoyer un message')
            ->icon('heroicon-o-inbox-in')
            ->actions([
                Action::make('voir')
                    ->url(route('filament.resources.contact-messages.edit', $message))

            ])
            ->iconColor('warning')
            ->sendToDatabase($admins);

        $this->success = true ;

        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
