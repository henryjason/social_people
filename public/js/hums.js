$(document).ready(function() {

 
  $('#hums_click1').click(function() {

  StoreHums();

  });


function StoreHums(){
	$.ajax({
		url: '/hums',
		type: 'GET'
	})
	.done(function(response) {

    console.log(response);

/*
		var data = [];
		for (var i = 0; i < response.length; i++) {
			data.push(
				[
					response[i].nombre,
					parseFloat(response[i].votos_candidato)
				]
			);
		};
	*/

	})
	.fail(function(response) {
		  console.log(response);
	});
	
}



});
