<?php

namespace App\Filament\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Validation\ValidationException;

class Login extends BaseAuth
{
    public string $phone = '';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getPhoneFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->label('Telefon raqam')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'phone' => $data['phone'],
            'password'  => $data['password'],
        ];
    }
    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.phone' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
