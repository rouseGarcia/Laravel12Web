<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<meta name="csrf-token" content="{{ csrf_token() }}">


<h1>
    {{__('text.productos.title')}} @lang('text.productos.title') {{trans('text.productos.title')}} {{ $nombre }} {{ \Illuminate\Support\Facades\App::getLocale() }}
</h1>

<select id="lang">
    <option>en</option>
    <option>es</option>
</select>

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

            <button type="submit" class="btn btn-primary">{{__('text.common.save')}}</button>
        </form>

    </div>




@include('headerLayout', ['example' => 'dato des de la otra vista'])


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


    $('#lang').change(function (){
        const lang = $('#lang').val();

        $.ajax({
            url: '/cambio-idioma',
            type: 'post',
            data:{
              lang: lang
            },
            success: function (response){
                window.location.reload()
            }
        })

    })
</script>

