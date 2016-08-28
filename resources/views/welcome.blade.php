<!DOCTYPE html>
<html>
    <head>
        <title>Moneylog SPA</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>

        <div id="app" class="container">
            <nav>
                <a v-link="{name:'home'}">Inicio</a> &bull;
                <a v-link="{name:'movements.index'}">Movimientos</a>
            </nav>
            <div class="content">
                <div v-if="!ready" class="alert alert-info">Cargando...</div>
                <router-view v-else></router-view>
            </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
