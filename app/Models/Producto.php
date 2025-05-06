<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Producto extends Model implements HasMedia{
    use HasFactory, InteractsWithMedia;

    // Nombre de la tabla en la BD
    protected $table = 'PRODUCTOS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_producto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_producto',
    'descripcion_producto',
    'cantidad_producto',  
    'precio_costo_producto',
    'precio_venta_producto',
    'precio_por_mayor_producto',
    'fk_id_subcategoria',
    'fk_id_proveedor',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Definición de las relaciones
    public function registerMediaCollections(): void{
        $this->addMediaCollection('imagenes')->useDisk('public');
    }

    public function getImagenUrlAttribute(){
        return $this->getFirstMediaUrl('imagenes') ?: asset('images/default.png');
    }

    public function detallePedido(){
        return $this->hasMany(DetallePedido::class, 'fk_id_producto', 'id_producto');
    }

    public function tallas(){
        return $this->hasMany(ProductoTalla::class, 'fk_id_producto', 'id_producto');
    }

    // Relaciones con otras tablas
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class, 'fk_id_subcategoria', 'id_subcategoria');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor', 'id_proveedor');
    }

    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }
}
