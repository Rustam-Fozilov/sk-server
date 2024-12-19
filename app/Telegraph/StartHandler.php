<?php

namespace App\Telegraph;

use App\Services\TelegraphService;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\QueryException;
use Illuminate\Support\Stringable;

class StartHandler extends WebhookHandler
{
    public function start(): void
    {
        $this->chat->message("Salom, " . $this->message->from()->firstName() . " 👋" . PHP_EOL . "⬇️ Kontaktingizni yuboring (tugmani bosib)")
            ->replyKeyboard(ReplyKeyboard::make()->buttons([
                ReplyButton::make("☎️ Kontaktni Yuborish")->requestContact(),
            ])->resize())
            ->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        try {
            $service = new TelegraphService($this->chat, $this->message);

            if ($this->message->contact()?->phoneNumber()) {
                $service->storePhoneNumber();
            }
        } catch (\Exception|\Throwable|QueryException $e) {
            $this->sendThrowToMe($e);
        }
    }

    public function sendThrowToMe(\Throwable|\Exception|QueryException $e): void
    {
        $message = "Message: " . $e->getMessage() . PHP_EOL;
        $message .= "File: " . $e->getFile() . PHP_EOL;
        $message .= "Line: " . $e->getLine() . PHP_EOL;
        $message .= "ChatId: " . $this->chat->chat_id . PHP_EOL;
        $message .= "Phone: " . $this->message?->contact()?->phoneNumber() ?? null . PHP_EOL;

        $me = TelegraphChat::query()->where('chat_id', '705320870')->first();
        $me->message($message)->send();
    }
}
