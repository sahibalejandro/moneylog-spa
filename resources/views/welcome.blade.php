<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Moneylog SPA</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">
            @include('partials.nav')

            <div class="container">
                <global-totals></global-totals>

                <div class="router-view">
                    <div v-if="!ready" class="alert alert-info">Cargando...</div>
                    <router-view v-else></router-view>
                </div>
            </div>

            <modal-container></modal-container>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
