<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    el valor del parametro es {{$id}}

    <a class="btn btn-primary" href="{{route('user.index',['id' => 6])}}" > ir </a>
</div>
