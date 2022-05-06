@php
function isSelected($controller, $method = '', $cssClass = 'active')
{
    $route = Route::getCurrentRoute()->getActionName();
    $actualMethod = explode('@', $route)[1];
    $actualController = explode('Controller', explode('\\', $route)[3])[0];
    $flag = false;
    if ($method == '') {
        if ($controller == $actualController) {
            $flag = true;
        }
    } else {
        if ($controller == $actualController && $method == $actualMethod) {
            $flag = true;
        }
    }
    return $flag ? $cssClass : '';
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="../../resources/css/app.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"
        integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Desplegar navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Ejemplo Laravel</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li class="dropdown {{ isSelected('Autor', '') }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Autores <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ isSelected('Autor', 'create') }}"><a
                                    href="{{ route('autores.create') }}">Registrar autor</a></li>
                            <li class="{{ isSelected('Autor', 'index') }}"><a
                                    href="{{ route('autores.index') }}">Ver lista de autores</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Generos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Registrar genero</a></li>
                            <li><a href="#">Ver lista de generos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Libros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Registrar libro</a></li>
                            <li><a href="#">Ver lista de libros</a></li>
                        </ul>
                    </li>
                    <li class="dropdown {{ isSelected('Editoriales', '') }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Editoriales<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ isSelected('Editoriales', 'create') }}"><a
                                    href="{{ route('editoriales.create') }}">Registrar editorial</a></li>
                            <li class="{{ isSelected('Editoriales', 'index') }}"><a
                                    href="{{ route('editoriales.index') }}">Ver lista de editoriales</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Usuario(cerrar sesión)</a></li>
                </ul>

            </div>
        </div>
    </nav>



    <div class="container">
        @yield('content')
    </div>

    <body>

</html>
