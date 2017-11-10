

$(function() {

var panier = [];

function saveCurrentPanier()
{
	panier = [];
	$(".sandwich-quantity").each( function(){
		var temp_id = $(this).attr("name").split("-");
		// console.log(temp_id);
		var ligne_panier = 
		{
			id_sandwich : temp_id[1],
			quantite_sandwich : $(this).val(),
		};
		panier.push(ligne_panier);
	});
	console.log(panier);

	// console.log("pathname : "+ window.location.pathname);
	// console.log("url : "+ window.location.href);
	// console.log("domain : "+ document.domain);
	// var path = document.domain+$("#ajax-path").val();

	var path = $("#ajax-path").val();

	console.log(path);

	$.ajax({
		  method: "POST",
		  url: path,
		  data: JSON.stringify(panier),
		  contentType: "application/json; charset=utf-8",
          dataType: "json"
		}).done(function(result){
			if(result){
				$("#save-message").html('<div class="alert alert-success" role="alert"> Panier sauvegardé ! </div>');

				setTimeout(function() {
					var fading_out = 1000;
				    $('#save-message').fadeOut(fading_out);

				    setTimeout(function(){
						$('#save-message').empty();
				    }, fading_out);
				    
				}, 3000);

			}

			console.log(result);
			console.log(panier);
		});
}

$(".sandwich-quantity").change(function(){
	saveCurrentPanier();
});

$("#save-current-panier").click(function(){
	saveCurrentPanier();
});

});