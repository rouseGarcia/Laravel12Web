<h1>
    Productos {{ $nombre }}
</h1>


@foreach($listaProductos as $producto)
    <p>
        {{ $producto->nombre }}
    </p>
@endforeach
