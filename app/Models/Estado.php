<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;

class Estado extends Model{
    use HasFactory;
    
    // Nombre de la tabla en la BD
    protected $table = 'ESTADOS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_estado';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'detalle_estado',];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}
