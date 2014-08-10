$(document).ready(function() {


$("#serch").on('keyup', function () {

    var valor = document.getElementById('serch').value;
    var array_id = [];

 if(valor.substring(0, 1) != "#" && valor.substring(0, 1) != "@")
   {valor = "#" + valor;}

    if(valor.substring(0, 1) == "#")
   {
    

    $.ajax({
    url: '/serchashtag',
    type: 'POST',
    data: {hashtag:valor},
  })
  .done(function(response) {

console.log(response);

//recorremos resultados de ajax
for (var i = 0; i < response.length; i++) {

array_id[i] = response[i].hashtag;

    };

$( "#serch" ).autocomplete({
		source: array_id
});


$("#buscar").on("click", function () {


for (var i = response.length - 1; i >= 0; i--) {


								if(document.getElementById('serch').value == response[i].hashtag){

								location.href = "/hashtag/"+ (response[i].hashtag.split("#")[1]);

								}

							};


});//fin onchange #buscar_editar


  })
  .fail(function(response) {
      console.log(response);
  });


   }// si es igual a hastag

   else if(valor.substring(0, 1) == "@")
   {
    
    $.ajax({
    url: '/serchuser',
    type: 'POST',
    data: {user:valor},
  })
  .done(function(response) {

console.log(response);

//recorremos resultados de ajax
for (var i = 0; i < response.length; i++) {

array_id[i] = response[i].nickname;

    };

$( "#serch" ).autocomplete({
		source: array_id
});


$("#buscar").on("click", function () {


for (var i = response.length - 1; i >= 0; i--) {


								if(document.getElementById('serch').value == response[i].nickname){

								location.href = "/user/"+ (response[i].nickname.split("@")[1]);

								}

							};


});//fin onchange #buscar_editar


  })
  .fail(function(response) {
      console.log(response);
  });


   }// si es igual a hastag

	
}); //fin id

});
