<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'PEDIDOS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_pedido';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'fecha_pedido',
    'subtotal_pedido',
    'total_pedido',
    'detalle_pedido',
    'fk_id_usuario',
    'fk_id_descuento',
    'fk_id_metodo_de_pago',
    'fk_id_estado',];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function detallePedido(){
        return $this->hasMany(DetallePedido::class, 'fk_id_pedido', 'id_pedido');
    }

    public function metodoPago(){
        return $this->belongsTo(MetodoPago::class, 'fk_id_metodo_de_pago', 'id_metodo_de_pago');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'fk_id_usuario', 'id_usuario');
    }
    
    public function descuento(){
        return $this->belongsTo(Descuento::class, 'fk_id_descuento', 'id_descuento');
    }

    public function envio(){
        return $this->belongsTo(Envio::class);
    }
}
