<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

class Compra extends Model{
    // Nombre de la tabla en la BD
    protected $table = 'COMPRAS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_compra';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'fecha_compra',
    'total_compra',
    'detalle_compra',  
    'fk_id_proveedor'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Definición de las relaciones
    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor');
    }
}
