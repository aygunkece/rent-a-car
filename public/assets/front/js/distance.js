
// The ymaps.ready() function will be called when
// all the API components are loaded and the DOM tree is generated.
ymaps.ready(init);

function init() {
    // Creating the map.
    var myMap = new ymaps.Map("map", {
        center: [55.76, 37.64],
        zoom: 7,
        type: 'yandex#map',
        controls: []
    });

    //yandex mapte 4 tane global collection var. onlardan biri controls.
    // controlsda örneğin trafik kontrolü, route kontrolü, search kontrolü gibi kontrol işlemleri yapar.

    var searchStartPoint = createSearchStart();   //başlangıç nokta oluşturulyor.
    myMap.controls.add(searchStartPoint);         //başlangıç nokta haritanın control collection eklenyor.
    callOnPressStart(searchStartPoint);           //from inputa klavyeden değer girildiğinde onu algılayıp başlangıç nokta oluşturmak için arama yapar.

    var searchFinishPoint = createSearchFinish();    //bitiş koordinat için aynı işlemler.
    myMap.controls.add(searchFinishPoint);
    callOnPressFinish(searchFinishPoint);

}

function calculate() {

    let from = document.getElementById('from').value;
    let to = document.getElementById('to').value;

    //formu submit ediyorum eğer DB yoksa DB kayıt ediyor.
    let distanceForm = document.getElementById('distanceForm');
    distanceForm.submit();

    calculateDistance(from, to);
}

function calculateDistance(from, to) {
    ymaps.ready(function(){
        var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 9,
            type: 'yandex#map',
            controls: ['routePanelControl']
        });

        // Route Panel - kullanıcıların harita üzerinde rota belirlemesi için bir arayüz kontrolü.
        // routePanelControl anahtar kelime ile harita oluşurken paneli harıtaya ekler


        // route Panelden referans alıyor.
        let control = myMap.controls.get('routePanelControl');


        //Route Panel'e rota noktaları set edilyor. bunlar inputtan alınan değerler. Adresi verince koordinatları kendisi buluyor.
        control.routePanel.state.set({
            from: from,
            to: to
        });

        let multiRoutePromise = control.routePanel.getRouteAsync();

        //getRouteAsync() method Promise dönüyor. multiRouter.MultiRoute obj veya hata mesajı
        multiRoutePromise.then(function (multiRoute) {

            multiRoute.model.events.add('requestsuccess', function () {
                let activeRoute = multiRoute.getActiveRoute();

                let distance, duration;

                if (activeRoute)
                {
                    distance = activeRoute.properties.get("distance").text;
                    duration = activeRoute.properties.get("duration").text;

                    alert('Distance: ' + distance + '  Duration: ' + duration);
                }

            })
        },function (err) {
            console.log(err);

        });

    });
}


function createSearchStart() {

    //haritanın control collectiondan SearchController kullanıyor. haritada arama yapıyor.
    var searchStartPoint = new ymaps.control.SearchControl({
        options: {
            useMapBounds: true,
            noPlacemark: true,
            noPopup: true,
            placeholderContent: 'Başlangıç nokta',
            size: 'large',
            type: 'yandex#search',
        }
    });

    //bulunan noktanın olaylar yönetimi
    searchStartPoint.events
        .add('resultselect', function (e) {
            var results = searchStartPoint.getResultsArray(),   //getResultsArray() - arama sonuçlarını içeren array döner
                selected = e.get('index'),                     //arrayin 0 index'ni alıyor
                point = results[selected].geometry.getCoordinates();    //adresin koordinatını bulur

            var arr=[];
            results.forEach(function(el){
                var obj = {text:el.properties.get("text"),city:el.properties.get("metaDataProperty").GeocoderMetaData.Address.Components[1].name};
                arr.push(obj);
            });

            //el.properties.get("text") - results'ta dönen adresler
            //el.properties.get("metaDataProperty").GeocoderMetaData.Address.Components[1].name - o adresin şehir bilgisi
            // bu iki alanı obj olarak alar ve arr değişkenine push edilir. bu array from inputa adres girerken öneri olarak geliyor

            var suggestTo= document.getElementById("from");
            autocompleteWithObject(suggestTo,arr);

        })
        .add('load', function (event) {
            /**
             * The 'skip' field indicates that it's not shuffling through search result pages.
             * The 'getResultsCount' field indicates that there is at least one result.
             */
            if (!event.get('skip') && searchStartPoint.getResultsCount()) {
                searchStartPoint.showResult(0);
            }
        });

    return searchStartPoint;
}


function createSearchFinish() {

    var searchFinishPoint = new ymaps.control.SearchControl({
        options: {
            useMapBounds: true,
            noCentering: true,
            noPopup: true,
            noPlacemark: true,
            placeholderContent: 'Bitiş nokta',
            size: 'large',
            type: 'yandex#search',
            float: 'none',
            position: {left: 10, top: 44}
        }
    });


    searchFinishPoint.events
        .add('resultselect', function (e) {
            var results = searchFinishPoint.getResultsArray(),
                selected = e.get('index'),
                point = results[selected].geometry.getCoordinates();

            var arr=[];
            results.forEach(function(el){
                var obj = {text:el.properties.get("text"),city:el.properties.get("metaDataProperty").GeocoderMetaData.Address.Components[1].name};
                arr.push(obj);
            });

            var suggestTo= document.getElementById("to");
            autocompleteWithObject(suggestTo,arr);

        })
        .add('load', function (event) {
            /**
             * The 'skip' field indicates that it's not shuffling through search result pages.
             * The 'getResultsCount' field indicates that there is at least one result.
             */
            if (!event.get('skip') && searchFinishPoint.getResultsCount()) {
                searchFinishPoint.showResult(0);
            }
        });

    return searchFinishPoint;
}

function callOnPressStart(searchStartPoint) {

    let place = document.getElementById("from").onkeyup = function () {

        //inputa girilen değer get isteği ile gönderilyor, aynı adres veritabanında varmı kontrol için
        $.get('/map/place', {place:this.value}).done(function (data) {

            //eğer veritabanında varsa öneriler veritabanından geliyor
            if (data.length > 0)
            {
                let arr = [];

                data.forEach(function (value) {
                    let obj = { text: value.place , city: '' }
                    arr.push(obj);
                });

                autocompleteWithObject(document.getElementById("from"), arr)
            }
            //veritabanında yoksa yandex'ten geliyor öneri listesi
            else
            {
                let from = document.getElementById("from");
                searchStartPoint.search(from.value).then(function () {
                    let geoObjectsArray = searchControl.getResultsArray();
                });
            }

        });


    }
}

function callOnPressFinish(searchFinishPoint) {

    let place = document.getElementById("to").onkeyup = function () {

        $.get('/map/place', {place:this.value}).done(function (data) {

            if (data.length > 0)
            {
                let arr = [];

                data.forEach(function (value) {
                    let obj = { text: value.place, city: ''}
                    arr.push(obj);
                });
                autocompleteWithObject(document.getElementById("to"), arr)
            }
            else
            {
                let to = document.getElementById("to");
                searchFinishPoint.search(to.value).then(function () {
                    let geoObjectsArray = searchControl.getResultsArray();
                });
            }

        });


    }
}


function autocompleteWithObject(inp, arr) {

    let inputValue = inp.value;

    closeAllLists();

    //öneri olarak gelecek adresler için kapsaycı div oluşturulyor.
    let listDivElement = document.createElement('div');
    listDivElement.setAttribute('id', inp.id + 'autocomplete-list');
    listDivElement.setAttribute('class', 'autocomplete-items');
    inp.parentNode.appendChild(listDivElement);          //forma divElement append ediyor

    for (let i = 0; i < arr.length; i++) {
        //inputa girilen değer önerilen arraye eşitse listItem div oluşturulyor ve ekleniyor.
        if(arr[i].text.substr(0,inputValue.length).toUpperCase() == inputValue.toUpperCase() || 1==1) {
            let listItemDiv = document.createElement('div');
            listItemDiv.innerHTML = "<strong>" + arr[i].text.substr(0, inputValue.length) + "</strong>" + arr[i].text.substr(inputValue.length);
            listItemDiv.innerHTML += "<input type='hidden' value='" + arr[i].text + "'>";
            listItemDiv.innerHTML += "<input type='hidden' value='" + arr[i].city + "'>";
            //ilgili div'e tıklandığında inputa o değer atanıyor.
            listItemDiv.addEventListener('click', function (e) {
                //alert(this.getElementsByTagName("input")[0].value);
                inp.value = this.getElementsByTagName("input")[0].value;    //inputa ekliyor.

                closeAllLists();   //bir div seçildiğinde öneri listesi kapatılyor
            });
            listDivElement.appendChild(listItemDiv);  //list item divler kapsaycı dive ekleniyor.
        }

    }


    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }


    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });

}















