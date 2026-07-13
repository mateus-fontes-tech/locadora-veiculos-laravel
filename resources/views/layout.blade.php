<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Locadora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            Locadora de Veículos
        </a>

        <div>
            <a href="/clientes" class="btn btn-light">
                Clientes
            </a>

            <a href="/veiculos" class="btn btn-light">
                Veículos
            </a>

            <a href="/locacoes" class="btn btn-light">
                Locações
            </a>
        </div>
    </div>
</nav>


<div class="container mt-4">

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @yield('content')

</div>


</body>
</html>