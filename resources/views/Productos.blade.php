<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<meta name="csrf-token" content="{{ csrf_token() }}">


<h1>
    Productos {{ $nombre }}
</h1>


@foreach($listaProductos as $producto)
    <p>
        {{ $producto->nombre }}
    </p>
@endforeach


    <button id="click">
        Click
    </button>



    <div id="btnNuevo">

    </div>


    <div >
        <form id="form">
            <div class="form-group">
                <label for="nombre">Nombre producto</label>
                <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input name="precio" type="text" class="form-control" id="precio">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#form').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: '/datosFormulario',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response){

            }
        });

        console.log(formData, "form");

    });


    $('#click').click(function () {
        $('#click').addClass('btn btn-primary');

        $.ajax({
                url: '/hola',
                type: 'GET',
            success: function (response){

                $('#btnNuevo').append(
                     response
                 );

            }
        })

        // $('#btnNuevo').append(
        //     '<button type="button" class="btn btn-primary">Info</button>'
        // );
        //
        // $('#click').remove();
        //alert("click")
    })
</script>

