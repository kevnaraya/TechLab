<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTalla extends Model{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'PRODUCTO_TALLAS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_producto_talla';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'cantidad',
    'fk_id_producto',
    'fk_id_talla'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(Producto::class, 'fk_id_producto', 'id_producto');
    }
    public function talla(){
        return $this->belongsTo(Talla::class, 'fk_id_talla', 'id_talla');
    }
}
