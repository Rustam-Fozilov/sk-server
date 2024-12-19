<?php

namespace App\Services;

use App\Models\User;
use DefStudio\Telegraph\Client\TelegraphResponse;
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

    public function storePhoneNumber(): TelegraphResponse
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

        $this->sendLoginCode();
        return $this->chat->message('🔑 Yangi kod olish uchun /login ni bosing')->removeReplyKeyboard()->send();
    }

    public function sendLoginCode(): TelegraphResponse
    {
        $user = User::query()->where('chat_id', $this->chat->chat_id)->first();

        if (!$user) {
            return $this->chat->message('Siz ro\'yxatdan o\'tmagansiz. Iltimos, telefon raqamingizni yuboring')->send();
        }

//        $code = rand(100000, 999999);
        $code = '111111';
        $user->confirmCodes()->update(['is_used' => true]);
        $user->confirmCodes()->create(['code' => $code]);

        return $this->chat->message("🔒 Kodingiz: <code>$code</code>")->send();
    }
}
