<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'DETALLE_PEDIDO';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_detalle_pedido';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'cantidad',
    'subtotal',
    'detalle',
    'fk_id_pedido',
    'fk_id_producto_talla'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function pedido(){
        return $this->belongsTo(Pedido::class, 'fk_id_pedido', 'id_pedido');
    }

    public function producto(){
        return $this->belongsTo(ProductoTalla::class, 'fk_id_producto_talla', 'id_producto_talla');
    }
}
