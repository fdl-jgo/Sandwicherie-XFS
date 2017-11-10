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
	console.log(document.domain+$("#ajax-path").val());

	$.ajax({
		  method: "POST",
		  url: document.domain+$("#ajax-path").val(),
		  data: panier
		}).done(function(result){
			console.log(result);
			console.log(panier);
		});
}

$(".sandwich-quantity").change(function(){
	saveCurrentPanier();
});


});


