<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model{
    use HasFactory;

    public function Pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function CategoriaEnvio(){
        return $this->belongsTo(CategoriaEnvio::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'envios';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_envio';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'Provincia',
    'Canton',
    'Distrito',  
    'direccion_exacta',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}
