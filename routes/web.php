<?php
//Controladores requeridos
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaEnvioController;
use App\Http\Controllers\CategoriaGastoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

/*
    RUTAS GENERALES
*/
    //Ruta de Index - Inicio Ecommerce
    Route::get('/', [IndexController::class, 'index']);

    //Ruta de Control de Sesiones
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', function () {return view('register');});

/*
    Rutas ECOMMERCE
*/
    //Rutas para Gestionar Perfil, configuración de cuenta, Mis Pedidos

    //Rutas para Buscar Productos
    Route::get('/buscar', [IndexController::class, 'buscarAll'])->name('buscar-productos');

    //Rutas para Gestionar Filtros

    //Rutas para Mostrar Productos

    //Rutas para Buscar Productos
    Route::get('/producto/usuario', function () {
        return view('producto');
    });

    Route::get('/producto/{id_producto}', [IndexController::class, 'mostrarProducto'])->name('producto-mostrar');

    Route::get('/productos/{id_producto}/tallas', [PedidoController::class, 'obtenerTallas'])->name('tallas-obtener');
    
    //Rutas para Gestionar Carrito
    Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito-mostrar');
    Route::post('/carrito/guardar', [CarritoController::class, 'guardar'])->name('carrito-guardar');

    //Rutas para Procesar Pago
    Route::get('/pagar', [CarritoController::class, 'vistaPagar'])->name('vista-pagar');

    //Rutas para Gestionar Categorias
    Route::get('/categoria/{nombre_categoria}', [IndexController::class, 'mostrarCategoria'])->name('categoria-mostrar');

/*
    Rutas DASHBOARD
*/
    Route::middleware(['auth'])->group( function() {
        //Ruta de Index - Inicio Dashboard
        Route::get('/dashboard', [IndexController::class, 'indexDashboard'])->name('dashboard');

        //Rutas para Gestionar Usuarios
        Route::get('/usuarios/listado', [UserController::class, 'index'])->name('usuarios-vista');
        #Route::get('/usuarios', [UserController::class, 'vistaAgregar'])->name('usuarios-crear-vista');
        Route::post('/usuarios/agregar', [UserController::class, 'create'])->name('usuarios-crear');
        Route::delete('/usuarios/eliminar/{id_producto}', [UserController::class, 'eliminar'])->name('usuarios-eliminar');
        Route::get('/usuarios/modificar/{id_producto}', [UserController::class, 'vistaModificar'])->name('usuarios-modificar-vista');
        Route::put('/usuarios/modificar/{id_producto}', [UserController::class, 'modificar'])->name('usuarios-modificar');

        //Rutas para Gestionar Roles
        Route::get('/roles/listado', [roleController::class, 'index'])->name('roles-vista');
        #Route::get('/roles', [roleController::class, 'vistaAgregar'])->name('roles-crear-vista');
        Route::post('/roles/agregar', [roleController::class, 'create'])->name('roles-crear');
        Route::delete('/roles/eliminar/{id}', [roleController::class, 'eliminar'])->name('roles-eliminar');
        #Route::get('/roles/modificar/', [roleController::class, 'vistaModificar'])->name('roles-modificar-vista');
        Route::put('/roles/modificar/{id}', [roleController::class, 'modificar'])->name('roles-modificar');
        
        //Rutas para Gestionar Perfil, configuración de cuenta y sitio web
        Route::get('/ajustes', [MiPerfilController::class, 'index'])->name('perfil-vista');
        Route::get('/ajustes/negocio', [MiPerfilController::class, 'vistaNegocio'])->name('negocio-vista');
        Route::get('/ajustes/ecommerce', [MiPerfilController::class, 'vistaEcommerce'])->name('ecommerce-vista');
        Route::get('/ajustes/modificar', [MiPerfilController::class, 'vistaModificar'])->name('perfil-modificar-vista');
        Route::put('/ajustes/modificar/{id_usuario}', [MiPerfilController::class, 'modificar'])->name('perfil-modificar');
        Route::get('/ajustes/editar-sitio', [MiPerfilController::class, 'modificarSitio'])->name('perfil-modificar-vista-sitio');
        Route::put('/ajustes/modificar-sitio/{id_sitio}', [MiPerfilController::class, 'modificarSitio'])->name('perfil-modificar-sitio');
        
        //Rutas para Gestionar Producto
        Route::get('/productos/listado', [ProductoController::class, 'index'])->name('productos-vista');
        Route::get('/producto', [ProductoController::class, 'vistaAgregar'])->name('productos-crear-vista');
        Route::post('/producto/agregar', [ProductoController::class, 'create'])->name('productos-crear');
        Route::delete('/producto/eliminar/{id_producto}', [ProductoController::class, 'eliminar'])->name('productos-eliminar');
        Route::get('/imagen/eliminar/{id_imagen}', [ProductoController::class, 'eliminarImagen'])->name('eliminar-imagen');
        Route::get('/producto/modificar/{id_producto}', [ProductoController::class, 'vistaModificar'])->name('productos-modificar-vista');
        Route::put('/producto/modificar/{id_producto}', [ProductoController::class, 'modificar'])->name('productos-modificar');

        //Rutas para Gestionar Categoria Producto 
        Route::get('/categorias/listado', [CategoriaController::class, 'index'])->name('categorias-vista');
        Route::get('/categoria', [CategoriaController::class, 'vistaAgregar'])->name('categorias-crear-vista');
        Route::post('/categoria/agregar', [CategoriaController::class, 'create'])->name('categorias-crear');
        Route::delete('/categoria/eliminar/{id_categoria_prod}', [CategoriaController::class, 'eliminar'])->name('categorias-eliminar');
        Route::get('/categoria/modificar/{id_categoria_prod}', [CategoriaController::class, 'vistaModificar'])->name('categoria-modificar-vista');
        Route::put('/categoria/modificar/{id_categoria_prod}', [CategoriaController::class, 'modificar'])->name('categorias-modificar');

        //Rutas para Gestionar Marcas
        Route::get('/marca/listado', [MarcaController::class, 'index'])->name('marcas-vista');
        Route::get('/marca', [MarcaController::class, 'vistaAgregar'])->name('marcas-crear-vista');
        Route::post('/marca/agregar', [MarcaController::class, 'create'])->name('marcas-crear');
        Route::delete('/marca/eliminar/{id_marca}', [MarcaController::class, 'eliminar'])->name('marcas-eliminar');
        Route::get('/marca/modificar/{id_marca}', [MarcaController::class, 'vistaModificar'])->name('marcas-modificar-vista');
        Route::put('/marca/modificar/{id_marca}', [MarcaController::class, 'modificar'])->name('marcas-modificar');

        //Rutas para Gestionar SubCategoria Producto 
        Route::post('/subcategoria/agregar', [SubcategoriaController::class, 'create'])->name('subcategorias-crear');
        Route::delete('/subcategoria/eliminar/{id_subcategoria}', [SubcategoriaController::class, 'eliminar'])->name('subcategorias-eliminar');
        Route::get('/subcategoria/modificar/{id_subcategoria}', [SubcategoriaController::class, 'vistaModificar'])->name('subcategorias-modificar-vista');
        Route::put('/subcategoria/modificar/{id_subcategoria}', [SubcategoriaController::class, 'modificar'])->name('subcategorias-modificar');

        //Rutas para Gestionar Descuento
        Route::get('/descuento/listado', [DescuentoController::class, 'index'])->name('descuentos-vista');
        Route::get('/descuento', [DescuentoController::class, 'vistaAgregar'])->name('descuentos-crear-vista');
        Route::post('/descuento/agregar', [DescuentoController::class, 'create'])->name('descuentos-crear');
        Route::delete('/descuento/eliminar/{id_descuento}', [DescuentoController::class, 'eliminar'])->name('descuentos-eliminar');
        Route::get('/descuento/modificar/{id_descuento}', [DescuentoController::class, 'vistaModificar'])->name('descuentos-modificar-vista');
        Route::put('/descuento/modificar/{id_descuento}', [DescuentoController::class, 'modificar'])->name('descuentos-modificar');

        //Rutas para Gestionar Proveedores
        Route::get('/proveedor/listado', [ProveedorController::class, 'index'])->name('proveedor-vista');
        #Route::get('/proveedor', [ProveedorController::class, 'vistaAgregar'])->name('proveedor-crear-vista');
        Route::post('/proveedor/agregar', [ProveedorController::class, 'create'])->name('proveedor-crear');
        Route::delete('/proveedor/eliminar/{id_proveedor}', [ProveedorController::class, 'eliminar'])->name('proveedor-eliminar');
        Route::get('/proveedor/modificar/{id_proveedor}', [ProveedorController::class, 'vistaModificar'])->name('proveedor-modificar-vista');
        Route::put('/proveedor/modificar/{id_proveedor}', [ProveedorController::class, 'modificar'])->name('proveedor-modificar');

        //Rutas para Gestionar Compras a Proveedores
        Route::get('/compra/listado', [ProveedorController::class, 'index'])->name('compra-vista');
        #Route::get('/compra', [CompraController::class, 'vistaAgregar'])->name('compra-crear-vista');
        Route::post('/compra/agregar', [CompraController::class, 'create'])->name('compra-crear');
        Route::delete('/compra/eliminar/{id_compras}', [CompraController::class, 'eliminar'])->name('compra-eliminar');
        Route::get('/compra/modificar/{id_compras}', [CompraController::class, 'vistaModificar'])->name('compra-modificar-vista');
        Route::put('/compra/modificar/{id_compras}', [CompraController::class, 'modificar'])->name('compra-modificar');

        //Rutas para Gestionar Categoria Gasto 
        Route::get('/categoria/listado', [CategoriaGastoController::class, 'index'])->name('categorias-gasto-vista');
        #Route::get('/categoria', [CategoriaGastoController::class, 'vistaAgregar'])->name('categorias-gasto-crear-vista');
        Route::post('/categoria/gasto/agregar', [CategoriaGastoController::class, 'create'])->name('categorias-gasto-crear');
        Route::delete('/categoria/gasto/eliminar/{id_categoria_prod}', [CategoriaGastoController::class, 'eliminar'])->name('categorias-gasto-eliminar');
        Route::get('/categoria/gasto/modificar/{id_categoria_prod}', [CategoriaGastoController::class, 'vistaModificar'])->name('categorias-gasto-modificar-vista');
        Route::put('/categoria/gasto/modificar/{id_categoria_gasto}', [CategoriaGastoController::class, 'modificar'])->name('categorias-gasto-modificar');
        
        //Rutas para Gestionar Gastos
        Route::get('/gastos/listado', [GastoController::class, 'index'])->name('gastos-vista');
        #Route::get('/gastos/agregar', [GastoController::class, 'vistaAgregar'])->name('gastos-crear-vista');
        Route::post('/gastos/agregar', [GastoController::class, 'create'])->name('gastos-crear');
        Route::delete('/gastos/eliminar/{id_gasto}', [GastoController::class, 'eliminar'])->name('gastos-eliminar');
        Route::get('/gasto/modificar/{id_gasto}', [GastoController::class, 'vistaModificar'])->name('gastos-modificar-vista');
        Route::put('/gasto/modificar/{id_gasto}', [GastoController::class, 'modificar'])->name('gastos-modificar');

        //Rutas para Gestionar Pedidos
        Route::get('/pedidos/listado', [PedidoController::class, 'index'])->name('pedidos-vista');
        Route::get('/pedidos', [PedidoController::class, 'vistaAgregar'])->name('pedidos-crear-vista');
        Route::post('/pedidos/agregar', [PedidoController::class, 'create'])->name('pedidos-crear-manual');
        Route::post('/pedidos/agregar/automatico', [PedidoController::class, 'vista'])->name('pedidos-crear-automatico');
        Route::delete('/pedidos/eliminar/{id_pedido}', [PedidoController::class, 'eliminar'])->name('pedidos-eliminar');
        Route::get('/pedidos/modificar/{id_pedido}', [PedidoController::class, 'vistaModificar'])->name('pedidos-modificar-vista');
        Route::put('/pedidos/modificar/{id_pedido}', [PedidoController::class, 'create'])->name('pedidos-modificar');

        /*Rutas para Gestionar Envíos
        Route::get('/envios', [EnvioController::class, 'index'])->name('envios-vista');
        Route::post('/envios/agregar', [EnvioController::class, 'create'])->name('envios-crear');
        Route::delete('/envios/eliminar/{id_envio}', [EnvioController::class, 'eliminar'])->name('envios-eliminar');
        Route::put('/envios/modificar/{id_envio}', [EnvioController::class, 'create'])->name('envios-modificar');*/

        //Rutas para Gestionar Reportes
        Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes-vista');
        //Route::post('/reportes/agregar', [ProductoController::class, 'create']->name('reportes.create'));
        //Route::delete('/reportes/{id_producto}', [ProductoController::class, 'eliminar'])->name('reportes.eliminar');
    });

/*
    Rutas SUPERADMIN
*/

