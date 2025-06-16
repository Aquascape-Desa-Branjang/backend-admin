<?php

namespace App\Support\FilamentBase\Pages;

use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseComponent;

class LoginPage extends BaseComponent
{
    public function authenticate(): ?LoginResponse
    {
        $state = $this->form->getState();

        // Autentikasi manual berdasarkan username
        $response = parent::authenticate();

        session()->regenerate();

        /** @var \App\Models\Main\Admin|null $user */
        $user = filament_user();

        $user->disableLogging()->update(['last_login_at' => now()]);

        activity('Authentication')
            ->event('Login')
            ->causedBy($user)
            ->withProperties($this->getLogProperties())
            ->log(__('admin.successfully_login_with_username', ['username' => $state['username']]));

        return app(LoginResponse::class);
    }

    protected function throwFailureValidationException(): never
    {
        $state = $this->form->getState();

        activity('Authentication')
            ->event('Login')
            ->withProperties($this->getLogProperties())
            ->log(__('admin.failed_to_login_with_username', ['username' => $state['username']]));

        parent::throwFailureValidationException();
    }

    private function getLogProperties(): array
    {
        $state = $this->form->getState();

        $data = [
            'username' => $state['username'],
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ];

        if (function_exists('geoip_record_by_name')) {
            foreach (\geoip_record_by_name(request()->ip()) as $k => $v) {
                $data["geoip_{$k}"] = $v;
            }
        }

        return ['attributes' => $data];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'username' => $data['username'],
            'password' => $data['password'],
        ];
    }

    // Override field yang ditampilkan di form
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('username')
                    ->label('NIK')
                    ->required()
                    ->autofocus()
                    ->autocomplete('username'),

                \Filament\Forms\Components\TextInput::make('password')
                    ->label('Tanggal Lahir')
                    ->password()
                    ->required()
                    ->autocomplete('current-password')
                    ->helperText('Contoh: 17091945'),

                \Filament\Forms\Components\Checkbox::make('remember')
                    ->label('Remember Me'),
            ]);
    }
}
