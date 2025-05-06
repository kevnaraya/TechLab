<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'TALLAS';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_talla';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre',
    'descripcion'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

}
