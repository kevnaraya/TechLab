<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Estado;
use App\Models\Genero;
use App\Models\MetodoPago;
use App\Models\Talla;

class Essentials extends Seeder{
    /**
     * Run the database seeds.
     */
    
    public function run(): void{
        $estados = ['Activo', 'Inactivo', 'Completado', 'Pendiente', 'Cancelado'];

        foreach ($estados as $detalle) {
            Estado::firstOrCreate(['detalle_estado' => $detalle]);
        }

        $metodos = [
            'Tarjeta Débito/Crédito',
            'SINPE Móvil',
            'Pago en línea',
            'Transferencia Bancaria',
            'Efectivo'
        ];

        foreach ($metodos as $detalle) {
            MetodoPago::firstOrCreate(
                ['detalle_metodo_de_pago' => $detalle],
                ['fk_id_estado' => 1] // Asegúrate de que el estado con ID 1 exista
            );
        }

        $generos = [
            ['nombre' => 'Masculino', 'descripcion' => 'Hombre'],
            ['nombre' => 'Femenino', 'descripcion' => 'Mujer'],
            ['nombre' => 'Unisex', 'descripcion' => 'Unisex'],
        ];

        foreach ($generos as $genero) {
            Genero::firstOrCreate(
                ['nombre' => $genero['nombre']],
                ['descripcion' => $genero['descripcion']]
            );
        }

        $tallas = [
            ['nombre' => '35', 'descripcion' => 'Calzado'],
            ['nombre' => '36', 'descripcion' => 'Calzado'],
            ['nombre' => '37', 'descripcion' => 'Calzado'],
            ['nombre' => '38', 'descripcion' => 'Calzado'],
            ['nombre' => '39', 'descripcion' => 'Calzado'],
            ['nombre' => '40', 'descripcion' => 'Calzado'],
            ['nombre' => '41', 'descripcion' => 'Calzado'],
            ['nombre' => '42', 'descripcion' => 'Calzado'],
            ['nombre' => '43', 'descripcion' => 'Calzado'],
            ['nombre' => '44', 'descripcion' => 'Calzado'],
            ['nombre' => '45', 'descripcion' => 'Calzado'],
            ['nombre' => 'XS', 'descripcion' => 'Ropa'],
            ['nombre' => 'S', 'descripcion' => 'Ropa'],
            ['nombre' => 'M', 'descripcion' => 'Ropa'],
            ['nombre' => 'L', 'descripcion' => 'Ropa'],
            ['nombre' => 'XL', 'descripcion' => 'Ropa'],
        ];

        foreach ($tallas as $talla) {
            Talla::firstOrCreate(
                ['nombre' => $talla['nombre']],
                ['descripcion' => $talla['descripcion']]
            );
        }
    
    }
}
