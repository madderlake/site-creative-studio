//alert('TRUMP is a TOTAL DOUCHE BAG');
jQuery(document).ready(function($) {
/*
	if (typeof acf == 'undefined') {
		alert('No ACF');
	} else {
		console.log(acf);
	}
*/
	"use strict";

	var layout = $('[data-layout="columns"]').not('.acf-clone');
	//var col_group = $(layout).find('.col-group');
	var len = $(layout).length;
	var desktop, tablet, phone;

	console.log("# Layouts: " + len);

	//console.log($(numSelect).val());

	$(layout).each(function(){

		var col_group = $(this).find('.col-group');
		var numSelect = $(this).find('.num_col select');

		$(col_group).each(function(){


		//var id = $(this).attr("data-id");
		//console.log(id);
		//var select = $(this).find(numSelect);
		//console.log(numSelect);

		var count = $(numSelect).val();
		var width = 100 / count;
		//var def = 12 / parseInt(count);
		console.log('Count:' + count);

		var col = $(this).find('.dyn-col');
		$(col).css('background-color', '#eafaff');

			$(col).each(function(){
				$(this).css('width', width + '%');

				var select  = $(this).find('select');


				desktop = $(this).find('.desk-width select');
				tablet  = $(this).find('.tab-width select');
				phone   = $(this).find('.ph-width select');


				//console.log(desktop.val() + "-" + tablet.val() + "-" + phone.val());

			});


			$(numSelect).on('change', function() {
				count = $(this).val();
				width = 100 / count;
				console.log("Columns: " + count);
				var def = 12 / parseInt(count);
				$(col).each(function() {
					$(col).css('width', width + '%');
					$(col).attr('data-width', 100 / count);

					desktop = $(this).find('.desk-width select');
					tablet  = $(this).find('.tab-width select');
					phone   = $(this).find('.ph-width select');

					//Set default values

					setDefaults(count);
			});
		//$('.acf-hidden').remove();
		});

	});
});

function setColumns(){


}

function setDefaults(c){

	var def = 12 / parseInt(c);

	switch (c) {
			case "1":
				$(desktop).val(def);
				$(tablet).val(def);
				$(phone).val(12);
				break;
			case "2":
				$(desktop).val(def);
				$(tablet).val(def);
				$(phone).val(def);
				break;
			case "3":
				$(desktop).val(def);
				$(tablet).val(def);
				$(phone).val(12);
				break;
			case "4":
				$(desktop).val(def);
				$(tablet).val(6);
				$(phone).val(12);
				break;
		}
}

});