<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model{
    use HasFactory;

    public function producto(){
        return $this->hasOne(Producto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'SUBCATEGORIA';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_subcategoria';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_categoria',
    'descripcion_categoria',
    'fk_id_estado',
    'fk_id_categoria_prod'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }

    public function categoria(){
        return $this->belongsTo(CategoriaProducto::class, 'fk_id_categoria_prod', 'id_categoria_prod');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'fk_id_subcategoria', 'id_subcategoria');
    }
}
