<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'CATEGORIA_PRODUCTO';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_prod';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_categoria',
    'descripcion_categoria',
    'fk_id_estado',
    'fk_id_genero'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Definición de las relaciones
    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }

    public function genero(){
        return $this->belongsTo(Genero::class, 'fk_id_genero', 'id_genero');
    }
    
    public function subcategoria(){
        return $this->hasMany(Subcategoria::class, 'fk_id_categoria_prod', 'id_categoria_prod');
    }
}
