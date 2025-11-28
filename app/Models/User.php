<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Panel;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthenticationRecovery;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAppAuthentication, HasAppAuthenticationRecovery, MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    public function getAppAuthenticationSecret(): ?string
    {
    
        return $this->app_authentication_secret;
    }

    public function saveAppAuthenticationSecret(?string $secret): void
    {
    
        $this->app_authentication_secret = $secret;
        $this->save();
    }

    public function getAppAuthenticationHolderName(): string
    {
    
        return $this->email;
    }

        /**
     * @return ?array<string>
     */
    public function getAppAuthenticationRecoveryCodes(): ?array
    {
    
        return $this->app_authentication_recovery_codes;
    }

    /**
     * @param  array<string> | null  $codes
     */
    public function saveAppAuthenticationRecoveryCodes(?array $codes): void
    {
    
        $this->app_authentication_recovery_codes = $codes;
        $this->save();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    protected $fillable = [
        "name",
        "username",
        "email",
        "password",
        "avatar_slug",
        "about",
        "country",
        "social_twitter",
        "social_instagram",
        "social_youtube",
        "social_website",
    ];

    protected $hidden = [
        "password",
        "remember_token",
        "app_authentication_secret",
        "app_authentication_recovery_codes",
    ];

    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "role" => "integer",
            "app_authentication_secret" => "encrypted",
            "app_authentication_recovery_codes" => "encrypted:array",
        ];
    }

    public function setRoleAttribute($value)
    {
        $this->attribute["role"] = $value ?? 0;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar_slug)
        {
            return asset("storage/avatars/" . $this->avatar_slug);
        }
        return "https://ui-avatars.com/api/?name=" . urlencode($this->username) . "&background=6366f1&color=fff&size=256";
    }
}
