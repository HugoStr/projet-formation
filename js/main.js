'use strict';

function onShowrecipe(event){
    event.preventDefault();
    
    $(this).parent().next().removeClass("hidden");
    console.log("la classe a été retiré")
};

function onHiderecipe(event){
    event.preventDefault();
    
    $(this).parent().addClass("hidden");
    console.log("la classe a été ajouté")
};


function getCountryregions(data){
    $('#countryregions').html(data);
    console.log(data);
};

function onSelectCountry(event){
    event.preventDefault();
    
    $.get('show_regionsofcountry.php', {country:$("#country").val()}, getCountryregions)
    console.log($("#country").val());
};

let ousuisje;

function onChangePlace(){
    
    localStorage.clear();
    ousuisje= $("#place").val();
    console.log(ousuisje);
    localStorage.setItem('position', JSON.stringify(ousuisje));

}

const mapdiv= document.getElementById('mapid');
let view;

if(mapdiv){
    ousuisje=JSON.parse(localStorage.getItem('position'));
    switch (ousuisje) {
        case 'US':
            view = {
                coords: [37.090240, -95.712891],
                zoom: 4
            }
            break;
        case 'Mexique':
            view = {
                coords: [23.638479, -102.508364],
                zoom: 4
            }
            break;
        case 'France':
        default:
            view = {
                coords: [46.227638, 2.213749],
                zoom: 5
            }
    }
    
    let mymap = L.map('mapid').setView(view.coords, view.zoom);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoic3RyYWdlIiwiYSI6ImNrYTgxdmI1ejA1ZDMzMGw1cDVyeW44cnMifQ.-CXrIkCAjfNE8ICz68ZVBQ'
    }).addTo(mymap);
}

$(document).ready(function(){
    
    ousuisje=JSON.parse(localStorage.getItem('position'));
    $('.recipebutton').on('click', onShowrecipe);
    $('.fa-times-circle').on('click', onHiderecipe);
    $('#country').on('click', onSelectCountry);
    $('#lieu').on('click', onChangePlace);
});
