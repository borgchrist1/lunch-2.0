<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>L-Appen</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Välj de du vill</h1>
                        <div class="form-group" v-for="resturant in resturants">
                            <div class="wrapper">
                                <div>
                                    <label v-bind:for="resturant.name">
                                        @{{ resturant.name }}
                                    </label>
                                    <input
                                        class="checkboxes"  
                                        type="checkbox" 
                                        v-bind:value="resturant.name" 
                                    />
                                </div>
                                <div>
                                    <button 
                                        type="button" 
                                        class="btn btn-xs btn-info" 
                                        data-toggle="collapse" 
                                        v-bind:data-target="'#' + resturant.name">
                                        @{{ resturant.name }} meny 
                                        <span class="glyphicon glyphicon-circle-arrow-down"></span>
                                    </button>
                                </div>
                            </div>
                            <div v-bind:id="resturant.name" class="collapse">
                                <ul>
                                    <li v-for="item in resturant.menu">
                                        <span class="text-uppercase">@{{ item.type }}</span>
                                        <small>@{{ item.dish }}.</small>
                                        <span class="text-danger">@{{ item.price }}</span> 
                                    </li>
                                </ul>  
                            </div>                   
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-xs btn-info random-lunch">
                        Random 
                    </button>
                    <button type="button" class="btn btn-xs btn-info reloadAlts-lunch display-none">
                        reload 
                    </button>
                    <br>
                    <span class="showResult"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://unpkg.com/vue"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>