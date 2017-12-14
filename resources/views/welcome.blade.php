<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="">
            <div class="form-group">
                <label for="permissions" class="control-label">filtros</label>
                <select class="form-control selectpicker" id="filter" name="filtro" data-live-search="true" required>
                        <option value="cliente">Cliente</option>
                        <option value="tienda">tienda</option>
                        <option value="producto">Producto</option>
                </select>
                <form id="cliente" action="{{route('home')}}" method="post" style="display:none;">
                    {{ csrf_field() }}
                    <label for="filter" class="control-label">cliente</label>

                    <input type="hidden" name="filtro" value="cliente">
                    <div class="form-group">
                        <select class="form-control selectpicker" id="filter" name="id" data-live-search="true" required>
                            @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success pull-right ">Filtrar</button>
                </form>
                <form id="tienda" action="{{route('home')}}" method="post" style="display:none;">
                    {{ csrf_field() }}
                    <input type="hidden" name="filtro" value="tienda">
                    <div class="form-group">
                        <label for="filter" class="control-label">Tienda</label>
                        <select class="form-control selectpicker" id="filter" name="id" data-live-search="true" required>
                            @foreach($tiendas as $tienda)
                                <option value="{{$tienda->id}}">{{$tienda->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success pull-right ">Filtrar</button>
                </form>
                <form id="producto" action="{{route('home')}}" method="post" style="display:none;">
                    <input type="hidden" name="filtro" value="producto">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="filter" class="control-label">Producto</label>
                        <select class="form-control selectpicker" id="filter" name="id" data-live-search="true" required>
                            @foreach($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success pull-right ">Filtrar</button>
                </form>
            </div>
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>tienda</th>
                                    <th>cliente</th>
                                    <th>fecha</th>
                                </tr>
                           </thead>
                           <tbody>
                               @foreach($ventas->items() as $venta)
                               <tr>
                                   <td>{{$venta->id}}</td>
                                   <td>{{$venta->detalles->productos->nombre}}</td>
                                   <td>{{$venta->detalles->cantidad}}</td>
                                   <td>{{$venta->tiendas->nombre}}</td>
                                   <td>{{$venta->clientes->nombre}}</td>
                                   <td>{{$venta->fecha}}</td>
                               </tr>
                               @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <script>
        $('#filter').change(function(){
            var filter = $(this).val();
            switch (filter) {
                case 'cliente':
                    $('#cliente').show();
                    $('#tienda').hide();
                    $('#producto').hide();
                    break;
                case 'tienda':
                    $('#cliente').hide();
                    $('#tienda').show();
                    $('#producto').hide();
                    break;
                case 'producto':
                    $('#cliente').hide();
                    $('#tienda').hide();
                    $('#producto').show();
                    break;
            }

        });
        </script>
    </body>
</html>
