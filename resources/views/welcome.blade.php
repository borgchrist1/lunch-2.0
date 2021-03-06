<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css" type="text/css">
    </head>
   <body>   
        <div class="container top-buffer">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero">
                        <img src="img/lindholmen.jpg">
                        <div class="title-wrapper">
                            <h1>Dagens Lunch</h1>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-inline top-buffer">
                        <div class="form-controll padding">
                            Select all
                            <input class="checkbox all" type="checkbox" value="Select all">
                        </div>
                        @foreach($resturants as $item)
                        <div class="form-controll padding">
                            {{ $item['name'] }}
                            <input class="checkbox checkboxes" type="checkbox" checked value="{{ $item['name'] }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group top-buffer">
                        <button class="btn btn-info random-lunch display">Get lunch?</button>
                        <button class="btn btn-danger reload-lunch display-none">Reload</button>
                        <div class="top-buffer">
                            <h3 class="food"></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($resturants as $item)               
                <div class="col-md-12 full-width">
                    <div class="resturant-wrapper"></div>
                        <h5>{{ $item['name'] }}</h5>
                    </div>                  
                    <div class="menu">
                        @foreach($item['menu'] as $i)
                        <div class="row extra-padding"> 
                        <div class="col-xs-1 col-md-1 {{$i['type']}}"><img src="/img/{{ $i['type']}}.png" width="40"></div>
                        <div class="col-xs-11 col-md-9 dish">{{ $i['dish'] }}</div>
                        <div class="col-xs-12 col-md-2 price">{{ $i['price'] }}</div>
                        </div>
                        @endforeach
                    </div>               
                </div>
                @endforeach
            </div>
        </div>
    </body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>
const vals = document.querySelectorAll('.checkboxes');
const btn = document.querySelector('.random-lunch');
const reload = document.querySelector('.reload-lunch');
const result = document.querySelector('.food');
const all = document.querySelector('.all');
const alt = [];

// check all boxes
// TODO: Array dose not update when run
all.addEventListener('change', ()=> {
    if (all.checked) {
        vals.forEach((element) => {
            element.checked = true;
        });
    } else {
        vals.forEach((element) => {
            element.checked = false;
        });
    }
});

vals.forEach((element) => {
    // add and removes elements from array
    element.addEventListener('change', () => {
        if (element.checked) {
            alt.push(element.value);
            console.log(element.value);
        } else {
            let index = alt.indexOf(element.value);
            if (index >= 0) {
                alt.splice( index, 1 );
            }
        }
    });
    // adds all checked values to array on page load
    if (element.checked) {
        alt.push(element.value);
    }
});

// function to randomize lunch
function getLunch(alt, addToDom){
    const lenght = alt.length;
    let result = Math.floor(Math.random() * (lenght - 0)) + 0;
    btn.remove();
    reload.classList.remove("display-none");
    reload.className += " display";
    return addToDom.innerHTML = alt[result];
}

// starts getLunch function
btn.addEventListener('click', event => {
    getLunch(alt, result);
});

// starts getLunch function
reload.addEventListener('click', event => {
    getLunch(alt, result);
});
</script>
</html>
