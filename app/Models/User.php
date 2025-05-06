<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia{
    use HasApiTokens, HasFactory, InteractsWithMedia, Notifiable, HasRoles;

    // Nombre de la tabla en la BD
    protected $table = 'Users';

    protected $primaryKey = 'id';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'username',
    'password',
    'nombre',  
    'primer_apellido_usuario',
    'segundo_apellido_usuario',
    'email', 
    'num_telefono_usuario',
    'numero_cedula',  
    'ruta_imagen',
    'fk_id_estado'];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datatime',
    ];

    public function getAuthPassword(){
        return $this->password;
    }

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Configuración de la colección de medios
    public function registerMediaCollections(): void{
        $this->addMediaCollection('imagenes')->useDisk('public');
    }

    // Definición de las relaciones
    public function Pedido(){
        return $this->hasMany(Pedido::class);
    }
}