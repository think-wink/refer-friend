<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\External\User\Commission;
use App\Models\Internal\AppUser;

use App\Models\Admin\Role; 
use App\Models\Traits\HasFile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasFile;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path'
    ];

    protected $visible = ['id', 'name', 'email', 'updated_at', 'role_names', 'profile_photo_url'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'role_names'
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function app_user(): HasOne
    {
        return $this->hasOne(AppUser::class);
    }

    public function roleNames(): Attribute
    {
        return Attribute::make(
            get: function(){
                $out = [];
                foreach($this->roles as $role) {
                    $out[] = $role->type;
                }
                return $out;
            }
        );
        
    }

    public function profilePhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['profile_photo_path']
        );
    }

    public function commissions() : HasMany
    {
        return $this->hasMany(Commission::class, 'created_by');
    }

    public function isAdmin() : bool
    {
        return in_array('wink_admin', $this->role_names) || in_array('wink_admin', $this->role_names);
    }
    
    public function isSuperAdmin() : bool
    {
        return in_array('wink_admin', $this->role_names);
    }
}