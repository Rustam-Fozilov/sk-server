<?php

namespace App\Services;

use App\Models\User;
use DefStudio\Telegraph\DTO\Message;
use DefStudio\Telegraph\Models\TelegraphChat;

class TelegraphService
{
    protected Message $message;
    protected TelegraphChat $chat;

    public function __construct($chat, $message = null)
    {
        if ($message) {
            $this->message = $message;
        }

        $this->chat = $chat;
    }

    public function storePhoneNumber()
    {
        $phone = $this->message->contact()->phoneNumber();

        if (str_contains($phone, '+')) {
            $phone = str_replace('+', '', $this->message->contact()->phoneNumber());
        }

        User::query()->updateOrCreate(
            [
                'phone' => $phone
            ],
            [
                'name' => $this->message->from()->firstName(),
                'surname' => $this->message->from()->lastName(),
                'chat_id' => $this->chat->chat_id
            ]
        );

        return $this->chat->message('Rahmat! xabarnomalarni shu yerda kuting')->removeReplyKeyboard()->send();
    }
}
