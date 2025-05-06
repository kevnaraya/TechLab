<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'METODO_DE_PAGO';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_metodo_de_pago';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'detalle_metodo_de_pago'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}
