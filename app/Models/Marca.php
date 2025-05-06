<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Marca extends Model implements HasMedia{
    use HasFactory, InteractsWithMedia;

    // Nombre de la tabla en la BD
    protected $table = 'MARCAS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_marca';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'descripcion_marca',
    'imagen_marca',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Configuración de la colección de medios
    public function registerMediaCollections(): void{
        $this->addMediaCollection('imagenes')->useDisk('public');
    }

    // Relación con el modelo Estado
    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }
}
