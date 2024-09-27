$(function () {

	var data = calc_data;
	var type = null,
		unit = null,
		name, complexity = null,
		quantity = 0,
		duration = 0,
		calcReady = false;

	var input = $('#type').find('input[type="radio"]');
	data.forEach(function(item){
		unit = item.Unit;
		id = item.WPID;


	$(input).each(function(){

			if($(this).val() == id){

				$(this).attr('data-unit', unit);
			}


		});
	});

	$('#type').find('label').on('click', function () {
		name = '';
		$('label').removeClass('selected');
		$(this).find(input).prop("checked", false);
		$(this).addClass('selected');
		$(this).find(input).prop("checked", true);
		type = parseInt($('input[type="radio"]:checked').val());
		name = $(this).find(input).prop('name');
		unit = $(this).find(input).data('unit');

		if(unit === 'Minute'){
			$('.duration').removeClass('d-none');
		} else {
			$('.duration').addClass('d-none');
			$('.duration').val(0);
		}
			procData();

	});

	$('#comp').find('input[type="radio"]').on('change', function () {
		complexity = $(this).val();
		procData();
	});

	var slider = $('input[type="range"]');

	$(slider).on('change mousemove', function () {
		$(this).parent().find('.output').html($(this).val());
		if($(this).attr('id') === 'dur') {
			$(this).parent().find('.output').html($(this).val() + 'm');
		}
	});

	$('#qty').on('change', function () {
		quantity = $(this).val();
		procData();
	});

	$('#dur').on('change', function () {
		duration = $(this).val();
		procData();
	});


	function ckReady() {
		if (quantity > 0 && (duration > 0 || unit === 'Piece') && type !== null && complexity !== null) {
			calcReady = true;
		}
		return calcReady;
	}

	function procData() {

		if (!ckReady()) {
			return null;

		} else {
			var t, c, u, os, na, costTotalNA, costTotalOS, costObj = {};

			data.forEach(function (item) {
				t = item.WPID;
				c = item.Complexity;
				u = item.Unit;
				os = item.Offshore;
				na = item.NAmerica;

				if (t === type && c === complexity) {

					if (u === "Minute") {

						costTotalNA = quantity * duration * na;
						costTotalOS = quantity * duration * os;
						costObj.NA = costTotalNA;
						costObj.OS = costTotalOS;
					} else {

						costTotalNA = quantity * na;
						costTotalOS = quantity * os;
						costObj.NA = costTotalNA;
						costObj.OS = costTotalOS;
					}
				}
			});

			if (costTotalNA !== null) {
				$('#costTotalNA').parents().removeClass('d-none');
			}

			$('.summary').html(quantity + " " + complexity + ' '  + name  + (duration > 0 ? ' - ' + duration + 'm long' : '') );
			$('#costTotalNA').html('$' + costTotalNA);

			if (costTotalOS !== null) {
				$('#costTotalOS').parents().removeClass('d-none');
			}

			$('#costTotalOS').html('$' + costTotalOS);
			$('html, body').animate({
				scrollTop: $(document).height()
				}, 1000);
			return costObj;

		}
	}

});