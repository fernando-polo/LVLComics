@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="row">
    <!-- Tarjeta de Productos -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text display-4">{{ $counts['productos'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-box-open fa-3x opacity-50"></i>
                </div>
                <a href="{{ route('productos.index') }}" class="text-white stretched-link"></a>
            </div>
        </div>
    </div>

    <!-- Tarjeta de Pedidos -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Pedidos</h5>
                        <p class="card-text display-4">{{ $counts['pedidos'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-shopping-cart fa-3x opacity-50"></i>
                </div>
                <a href="{{ route('pedidos.index') }}" class="text-white stretched-link"></a>
            </div>
        </div>
    </div>

    <!-- Tarjeta de Usuarios -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text display-4">{{ $counts['usuarios'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
                <a href="{{ route('usuarios.index') }}" class="text-white stretched-link"></a>
            </div>
        </div>
    </div>
</div>

<!-- Últimos Productos -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">
            <i class="fas fa-box-open me-2"></i>Últimos Productos
            <a href="{{ route('productos.index') }}" class="btn btn-sm btn-primary float-end">
                Ver Todos
            </a>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ultimosProductos as $producto)
                    <tr>
                        <td>{{ $producto['id'] }}</td>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>${{ number_format($producto['precio'], 2) }}</td>
                        <td>{{ $producto['id_categoria'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay productos registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Últimos Pedidos -->
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">
            <i class="fas fa-shopping-cart me-2"></i>Últimos Pedidos
            <a href="{{ route('pedidos.index') }}" class="btn btn-sm btn-primary float-end">
                Ver Todos
            </a>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ultimosPedidos as $pedido)
                    <tr>
                        <td>{{ $pedido['id'] }}</td>
                        <td>{{ $pedido['id_usuario'] }}</td>
                        <td>${{ number_format($pedido['total'], 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($pedido['fecha'])->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay pedidos registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection