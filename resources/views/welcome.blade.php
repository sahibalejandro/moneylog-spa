<!DOCTYPE html>
<html>
    <head>
        <title>Moneylog SPA</title>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Source Sans Pro', sans-serif;
                font-size: 16px;
            }
        </style>
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
        <script src="/js/main.js"></script>
    </body>
</html>
