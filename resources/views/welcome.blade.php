<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Moneylog SPA</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">

            @include('partials.nav')


            <div class="container">
                <div class="text-right">
                    <global-totals></global-totals>
                </div>

                <div v-if="!ready" class="alert alert-info">Cargando...</div>
                <router-view v-else></router-view>
            </div>

            <modal></modal>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
