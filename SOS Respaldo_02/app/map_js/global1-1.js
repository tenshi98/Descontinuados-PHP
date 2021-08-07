// TODO: Sacar todo lo que no sea global
var serviceAddr = 'http://200.29.15.107/rest/'
var infobox;

//	var locations = [
//     		[-33.464628,-70.61067600000001, "Estadio Nacional", "CoQBcwAAAA0BYA57FaX3s8BFIMM9buCBfXCQCB9DVvhOT-EVWWfTk0F54QBvW5FZtD43uVF_d5TTrnWYB3cLVrF1yq6Xhv0-dkvWfB5AjMJjOMP0L2IDjjrTSbWckDz8Jw8qriIsjeRq44kLq250b7Z64YHQ0WEGXzmfN3EmG9z9HJMcOhPZEhCIByNr0X1hWkITROc89jUhGhTFDA1v-J1Y9pD2c_T-BLnSeRkHdw", "Patín Carrera<br/>Patinaje Artístico<br/>Clavados<br/>Nado Sincronizado<br/>Atletismo<br/>Gimnasia Artística<br/>Gimnasia Rítmica"],
//		[-33.466351,-70.60736500000002, "Estadio Nacional - CAR", "CmRdAAAAy3hNeGT1mvhdNDhXjlcIBzt-SuQlyJ5tvqxJwUGaly-5wnq2iG-qgneqdVQF6qkKwzipfL4jNmy3ErY3Gocj_9qVZXUl-GOeBcfjTpaAEoYaOtrIfwueFsiWGREhsDKREhC8welraeA4lmhRwuzG3NUjGhQQPMdHys82dHFj7h3bDTW6ujQ_mw", "Esgrima"],
//	[-33.466652,-70.58115299999997, "Centro de Entrenamiento Olímpico", "CpQBggAAAHZNvRzr_ep0Da7xyNW7xlQbFrIQIdsX4yt3kWZAHhY-PYYWQbmlCknGeF64InNRrR-TMbhuRrv9dTJB1kCOPxMbeMG-HTwmsaR6tA-yajl-3IHNhjtRNBG59g2kgdmxV05VjajI3O0DGsrcqAnt_KGTY2lQysex9qFSPGCe3WSKyRh6AGs5QL72eaBQxDQvcRIQZlG04K33jyI6Ug4B16mT3xoUBj3RKjnIkNl67_UGEaR8AGYDipQ", "Taekwondo<br/>Judo<br/>Karate<br/>Básquetbol"],
//	[-33.444117,-70.610526, "Polideportivo de Carabineros", "CsQBugAAAAfbQeT8NcEMBt_cLemlzSSXICy4-xI_ZLRFkdu6nV7AxTw5t6DXoCDUtDnqd1syRb6iHaFIE2cuHFlGSTii5GIPDE-q9hnIi6BEx6oGXQ2xw4j3B_jt8_JqSgy7C7Z2ITQk0G9Db__viFZo8GEpP8XFKKY0JEMI-LKT0GE1jCBsnbZCGP8FHh3K1LXz2yE7MuqjzxfVZDF7ZZ_FF7GqhCnSUheP9XxGY53d4x3MvgK-A3HBlWrii5nfUxOB79Sg7RIQTky9tLFeXx3fGviKzB15kRoUDQ6oMp3MTrmL6nEPuXUxk0BcYfU", "Taekwondo<br/>Judo<br/>Karate"],
//	[-33.425138,-70.63290599999999, "Cerro San Cristóbal", "CoQBdwAAAMfA2k1trtOiFz-sCpCisjMMoHxdM2Uhxtx4kZxDjW-dAXT8sZvacXhIWBW8hybhW-1dIxLkYgW8AZFtus2OouU9C9n4aBT21ZPeNhwyCf1j7vaewdP1xpAlMPYlPm69UrB2j89yIg82fQJ8RXDbR7XhbCyhD9sbfj_ZkzeY2fntEhBwncZDEl4RiYXOhs_801ATGhRiU1so4GT_qjHiHrqvjJp6iWB-Yw", "Ciclismo  MTB<br/>Ciclismo Ruta"],
//	[-33.380806,-70.58690000000001, "Club San Cristóbal", "CpQBggAAACYP6cPdBMiy7r-4qShkCn3dDZp6_xNcW9MHhS7NqfZVFdR_02CQMgZkIH3hvWc5Qo1HNwgM7WyHpXomj1RuBe_ZnyKt_x2wyULXfSMjaNmUTKF-UT0eZUdp8RJANJPUiSRK63uByRs4EWN6k_jgSwUIOrZGxZJ68sDswnMc9ypGXIeTUb1458iklNxJXBT3XxIQijwBMeqllrIeTQd_AffNPRoUnJ5oK4FcHGOBSxjghO697fGK2mQ", "Golf"],
//	[-33.392036,-70.57479999999998, "Club Manquehue", "CoQBcQAAAF8ZhfgRqo1Zhl-AaF0V9oqlhoRwvEKHU8TDWZDjnK0oaNBkP3KMoxM0mcLa2UUKwJxlpzTif1y2oLDM9bH7EbXwOo2XFHXfav0hQcDNX_sqljX5CunYc4An2OPzkWAmLoFMpl8NAfWfEMuwCLI7IjhGlJzKi-T11oBwAxuUaQH0EhAKG7MHumfgqRln_Hf8giH3GhQagBqvFzCE6IVHZQ6w7hALEqzsSw", "Hockey Césped Femenino<br/>Hockey Césped Masculino"],
//	[-33.462853,-70.61229200000002, "Estadio Nacional - Court Central", "CoQBeAAAAAUj9O9iMd1J-hYJ8kAYSFTfTB99juIKUJkFJZYqFvwpypqdbjSvL1Z-3H-lOt9of1PaYHHOC4ZGMoQ313Ds_tqr2oQvLOFObyx73nR45_Yqa9kZZAEgT1WSTjkixMDpMYDU561Gi-5-9f51ykRFHbYK0Ky5TlZMf2wfi0jttdpdEhCaNizk1mxdlEZkJEA6efA7GhQuv6jVBrnryWk9GJR0NsmNLDvWtw", "Tenis"],
//	[-33.460464,-70.65686800000003, "Parque O'higgins", "CnRqAAAAZSYILfKgYymad1FawTjUxAITL6HjWYWld48yopH8rfYfXzH_z-H7SafZ4ttGr_di3vdCh7nPKtajIEM7_L6b6Fl8cX_X1FtF86xjVlFFH6KoI2ZelcWM4htr4zvKvt7ZZuGGMRtEHrBsHtLGAJwS1xIQeXv4fFkuOUkkEDPW0mKQnhoU26nGaC4saFIW8gvlC7QISjfQbnA", "Pesas"],
//	[-33.413095,-70.58342800000003, "Escuela Militar", "CpQBjAAAACvj2QNACjvb7kbEv6MZb2DpA4oMrSo27wsc6rSYI2ran-o_GqhpIALCHzzrmGLY3rS_fhSADByTgt-9DKlSPoAfrmSYny8FR1Pbc3_TGk0gE0S4lF1g4ADTTd9r0zcMqM2QjrpFU4i5oxHV3EiiAK_Lv_dn-JNbzCRSJwWdS35lUlMuz0irBnjsv_WkUiO0QRIQ9ao9SrWlE8yM1Makbmq2NxoUPNsSHt_L1U-SivZqPao7un1SZhE", "Pentatlón Moderno"],
//	[-33.539781,-70.57772, "Estadio Bicentenario La Florida", "CpQBhgAAALJdvyJR1Tww3mWueRFn4TilJGkM5sQMhAMb3hVPg0_D7OjaNoeyx2TzUvnxAMFPIb-c6aaEkGEQFuEIggtsYYaXVHCvj8eVnFSCfZNOv-MXtBMeHkVwrRnEnIK8n05_oQdQHWr_f3vqgsqpgqcvhT6kO4vi-0GTv-O2LZCXHmGsflbgeoEgCHhDWJSN8yQzjhIQNeWcQo06QmyJpD3Su0oDsRoUVpp0S1d8QowcsYh-IjHIpnbN62A", "Fútbol Femenino<br/>Fútbol Masculino"],
//	[-33.4884339,-70.6593646, "Gimnasio Olímpico San Miguel", "CsQBtgAAAM0Kokakv_bqVNQlYB13fk0ehMBM3r3LJApZQ3w9HCaUKn8LsTU2rzOo7kjQvHcOBipPS8kLmIfwOWJ-JoQ93jx9VkA4TlLerJaw4pVpXkwqncOO3sPbUkyuFMa6dgDjak36SIT-wMiyidGxbFgtj7u1URiuWdo07PiMfI0EH0o01RM6qqYHkgP8ZswJSoRUdS86AoCiukiPWL0lwcnZVgtkKVyqwVNV0HfWcqTnykL6M8iSic3dehGa5wp4k9LQzRIQWcRaeySRa_J3tog2EdiUjhoUnMXcydAUdMCvO7rZCTAXkD1vAlY", "Tenis de Mesa"],
//	[-33.6395516,-70.68806259999997, "Laguna Los Morros", "CsQBtgAAAHV_i_R6SKsnN9Be8QP-9CEFcbcb2JMh62K7w30cgxAsD0m-_VEGz9v6aw5DvLUxnGp05jM_v7bflZJR87lQA35MH6XS1owTBJOvG-nrPSgQvPmT8g7VpQMlL-_QgT2SuccHi_5RjyCzpmyounym8KqdbKH4Yx7W_fJ9_-w7Ic9PTuf_VrcVnRZmuC29kpHJUsdTDFAkQU7lDDuYfvvpPfc1kxpwW2V7lGRjvDX0w9ExH6HA9io3BXfoTidNvLIyLBIQSMmED0qUDl9ZbBrKXwvcLhoUDmCIlisBSSDtBYVmgKxjxOE-SUk", "Esquí Náutico"],
//	[-33.4543126,-70.51843300000002, "Parque Mahuida - CAR", "CrQBrwAAALRY0cC8zKDnwfSOgXdhKmFFg0R1_jYs557DzeciaZRaTmj1Vg-OB-ELML9dGdDZiHCzUrffyVl47XYbPXoy29UfAl9ExIgQOckq_RnrAHvdHl3SBbLUB29oSPnfgDoFeAgM8IfEPRQh0sIOLUspFm2XDGcLRaSiBvDN-cS960V2aShjtJe1fmHM44JcUIb_-bzHlos9nMzEfHEVUlf2mK_Mg532v_h39VRsGD9GvuvkEhAX-4VLt_taLw7pjKKdaxYKGhTHqSke3zzLrg_f_BQvS7hAw6TC8g", "Rugby"],
//	[-33.465298,-70.545905, "Parque Peñalolen", "CnRrAAAAIX67S4G7WJ2Bc3eEsjim1l9RlK-uYi4aSkGV-XmzEXQGhnOfnFI99W2qVOAzY2kh4nsV8ddKcElHh-720mKTKD-50s5KWdqJMFC7c6gcbw3rCXeJ_B6ARRxZHKFeviNNVtPKGSBEjaTrhpo1L4slshIQY-pAv7c7enAsaPCI9ADgYRoUmU1YvRAAiPZrUnqzpEKx5zGPjEY", "Ciclismo BMX<br/>Tiro con Arco<br/>Voleibol Playa<br/>Ciclismo Pista"],
//	[-33.518765,-70.600092, "Mall Plaza Vespucio", "CnRnAAAAtsujk7q67NOREVXOotsGHcqhWKzZCSP2Z_nceHuHvT873oww_V_13X3RWJPByZ-3YfUPbpnIJOP0u-vIdWHVFCklx-A6J6mv2nzL0dIJgZLDO7I0anaon3VZGNMIVW-O3UNCedEj6vRkEEoki6oaRhIQjeYYzxrXYkvdyK1L8vW53xoU7-Otr7ji3suz6kgTPqoJ2FnvNeE", "Bowling"],
//	[-33.4764505,-70.54028900000003, "Gimnasio Chimkowe", "CrQBrwAAAA2Nz4qTUG-QksO43N9KaR12DV-n2gSvNACBFRXsTgPM7HN94XG21nv-AhWvDs3lUj8F_eP5gZqoa88W0MdaOp2D_OFjbj8RQDc8l6IHxNme_WOY3akMvsM5yKC9C9zPvLIIarahW8yh7qUL9aU0ej0lNHaKPUt4dMNwiNThgPRLzNM9LoqYJmJouUb_sjeUEGHFXJ6Byhe-4V9FD_wLfqMdAXPRWlyRrFtOPJ95T5a-EhCUpputQ0wTiLGT2YfkJ9LeGhT01fmqL-LxC-QmZ0RKpMA-PRjqnw", "Fútbol Sala"],
//	[-33.4672526,-70.58867559999999, "Polideportivo de Ñuñoa", "CsQBtgAAAMGznTH7vIzEb9VWOHd3MqnyGsS397uQKrVRDLTMRxLWgHmk9vP18uEAql6qcCyUrj8XTzc0QgL5AvN1cYSPPcG_LkCllEcjQNQWLz4rR0sftDFvlooId84QmmVqatQKV23MZ7bqxWqDT95L9eWUcuVDFO9pMV69yKR_E3VXMX-CeRvFKMDHrI7IeV_oc-3OOxcL3Qq9NffO3N4TO8zG2EQUwg44Lx21TQ9Q1ThrqwWTXoBWIU1zCDqzpD-6XXHkuBIQrWhzA9m1XPRfuquJ1_jKRxoUUQjYuFU-MDYw1oizSNHWdDsZ430", "Voleibol Femenino<br/>Voleibol Masculino"],
//	[-33.4419199,-70.84339399999999, "Polígono Lo Aguirre", "CrQBqAAAAFj6VkWI9YQAddig6wZwpfoyOvq9580zPxErK5TC6pmk5duGJOsAvHqZUaS2gsTesgyUsmX2chika8UsxSVolXcHmIiFdJg9Bl80OdSldZg0fcy8tsV6ipHznLmF-2Yc3090e3k8UoUq8HXulOEtDqMBKKx-F4l_JGt0VOuHQgk-Tuzx3XfPnfK6UP369N_GmdrSo8rr8UBPK60i3v_odw8BMNSzObHi5F1uJEo_hdkmEhCTwpbC95eY0hpLv8IUz1B6GhT46ljg3PLmUzg3TO2nlRSQ4jMHJA", "Tiro al Blanco"],
//	[-33.561901,-70.68890399999998, "Polígono FACH", "CnRjAAAAlHYpCzTXRlHcta1sWJA2QEMemylUG1N_kcb4gveJUkNARQdpGb18k_tF8dB_CBZXgW8hNksokQ_cSRM1KlBjMLwKqhKxBK0QKzMHqA9sPEGIXn2Utu3DLI_jEUghMVVvzR6Kn61EGfWv3RU01sRLRBIQSWbwXt7z67m4V4ht6fiyoxoUO5eTlNyzhKPw_sSXpK5evRYcr0c", "Tiro al Vuelo"]
//	];

jQuery(document).ready(function($) {

	//infobox = new InfoBox({
	//         content: document.getElementById("infobox"),
	//         disableAutoPan: false,
	//         maxWidth: 175,
	//         pixelOffset: new google.maps.Size(-140, 0),
	//         zIndex: null,
	//         boxStyle: {
	//            background: "url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
	//            opacity: 0.75,
	//            width: "175px"
	//        },
	//        closeBoxMargin: "12px 4px 2px 2px",
	//        closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
	//        infoBoxClearance: new google.maps.Size(1, 1)
	//    });


	var ele = $('#main');
	mainWindow(false, ele);

	$('header[data-box]').click(function() {
		hideShowBox($(this));
	});

	$('nav li a').on('click', function(e) {
		e.preventDefault();
		var ele = $(this);
		if (ele.parent().hasClass('active')) {
			//hideShowBox(ele.parent());
		} else {
			var target = ele.attr('href').split('#')[1];
			ele.parents('ul').find('li').removeClass('active');
			ele.parent().addClass('active');
			var posEle = ele.position();
			$('#upArrow').hide().removeClass('none').fadeIn(200).css({
				'left': posEle.left
			});
			showBox(target);
			showRoutes();
		}
	});

	$(window).bind('load resize', function(e) {
		var ele = $('#main');
		mainWindow(e.type, ele);
	});
	$(window).load(function() {
		$('a[href="#comoLlegar"]').click();
		$('#page').addClass('visible');
		$('.mainLoader').hide();

		//
		//		var marker, i;		
		//		
		//		for (i = 0; i < locations.length; i++) {  
		//    			marker = new google.maps.Marker({
		//         			position: new google.maps.LatLng(locations[i][0], locations[i][1]),
		//				icon: 'img/icon/santiago2014.png',
		//				zIndex: -1,
		//         			map: map
		// 			});

		//			google.maps.event.addListener(marker, 'mouseover', (function(i) {return function() {
		//				infobox.show();
		//				$("#infobox").text("");
		//				$("#infobox").empty();
		//				$("#infobox").text(locations[i][2]);
		//				$("#infobox").append("<br/><br/>" + locations[i][4]);
		//        			infobox.open(map, this);
		//    			}
		//    			})(i));
		//
		//			google.maps.event.addListener(marker, 'mouseout', function() {
		//        			infobox.hide();
		//    			}); 
		//
		//			google.maps.event.addListener(marker, 'click', (function(marker, i) {return function() {
		//             			getReferencia(i);
		//         		}
		//    			})(marker, i));
		//		}	
	});

	if (jQuery().jScrollPane) {
		$('.scrollable').jScrollPane({
			showArrows: true,
			mouseWheelSpeed: 40
		});
	}

	$('#conocerRecorridos').on('click', '.recRes li', function() {
		if ($(this).hasClass('active')) {
			$(this).parent().find('li').removeClass('active');
		} else {
			$(this).parent().find('li').removeClass('active');
			$(this).addClass('active');
		}
	});

	$('nav ul li').click(function() {
		clearAutocomplete();
		$('.scrollable').jScrollPane({
			showArrows: true,
			mouseWheelSpeed: 40
		});
		//$('.parRed.scrollable').jScrollPane({showArrows: true}).data('jsp').reinitialise();
	});

	$('[href="#encuentraParadas"], [href="#comoLlegar"], [href="#conocerRecorridos"]').click(function() {
		map.reset();
		$.hideMarkers('searchMarkers');
		$.hideMarkers('closeMarkers');
		return false;
	});
});

function mainWindow(type, mainEle) { //Reajuste de alto de contenedor principal según tamaño de pantalla
	var minHeight = 50;
	var wh = $(window).height();
	var header = $('header').outerHeight();
	var main_h = parseInt(wh - header);
	if (main_h > (minHeight - header)) {
		mainEle.height(main_h);
		$('body').addClass('oflow');
	} else {
		mainEle.height(minHeight - header);
		$('body').removeClass('oflow');
	}
}

function showBox(boxTarget) {

	// Resetea el mapa
	map.reset();

	var all = $('.box')
	var box = $('#' + boxTarget);
	if (boxTarget.length < 1) {
		alert('Target vacio. Coloca dentro del href el #id de la caja que quieres mostrar');
		return;
	}
	if (box.not('.none')) {
		all.find('article').addClass('none');
		box.find('article.step-1').removeClass('none');
		all.addClass('none');
		box.removeClass('none');
	}
	if (box.find('.collap_js').length > 0) {
		box.find('.collap_js').slideDown(200);
		
	} else {
		box.find('.hideShowBox').hide();
	
	}

}

function addSpecialClass(este) {
	este = $('#' + este);
	nombreClase = 'special_submit';
	if (este.find('article:not(.none)')) {
		var articulo = este.find('article:not(.none)');
		var caja = articulo.find('.special_button_cont');
		if (caja.length > 0) {
			este.addClass(nombreClase);
		} else {
			este.removeClass(nombreClase);
		}
	}
}

function hideShowBox(este) {
	if (typeof este != "undefined") {
		var dataBox = este.data('box');
		var thisBox = $('#' + dataBox);
		if (este.hasClass('hidding') != true && este.hasClass('hideShowBox')) {
			este.addClass('hidding');
			este.parents('article').find('.collap_js').stop().slideToggle(400, function() {
				este.removeClass('hidding');
			});
			este.toggleClass('hideBox showBox');
		} else if (este.hasClass('hideShowBox') != true) {
			var boton = thisBox.find('.hideShowBox');
			boton.addClass('hidding');
			thisBox.find('article:visible').find('.collap_js').stop().slideToggle(400);
			boton.toggleClass('hideBox showBox').removeClass('hidding');
		}

		if (dataBox == 'comoLlegar' && thisBox.find('.hideShowBox').hasClass('showBox')) {	
			$( "#header" ).slideToggle( "slow", function() {});
			$( "#suggestCont" ).slideToggle( "slow", function() {});
			document.getElementById("comoLlegar").style.height = "60px"
			document.getElementById("comoLlegar").style.top = "0px"
			document.getElementById("main").style.top = "60px"
			document.getElementById("main").style.position = "absolute"
			document.getElementById("main").style.height = "100%"

			hideRoutes(dataBox);
		}else if (dataBox == 'encuentraParadas' && thisBox.find('.hideShowBox').hasClass('showBox')) {	
			$( "#header" ).slideToggle( "slow", function() {});
			document.getElementById("encuentraParadas").style.height = "60px"
			document.getElementById("encuentraParadas").style.top = "0px"
			document.getElementById("main").style.top = "60px"
			document.getElementById("main").style.position = "absolute"
			document.getElementById("main").style.height = "100%"
			
			hideRoutes(dataBox);
		}else if (dataBox == 'conocerRecorridos' && thisBox.find('.hideShowBox').hasClass('showBox')) {	
			$( "#header" ).slideToggle( "slow", function() {});
			document.getElementById("conocerRecorridos").style.height = "60px"
			document.getElementById("conocerRecorridos").style.top = "0px"
			document.getElementById("main").style.top = "60px"
			document.getElementById("main").style.position = "absolute"
			document.getElementById("main").style.height = "100%"

			hideRoutes(dataBox);
		
		} else {
			//document.getElementById("header").style.height = "100px"
			$( "#header" ).slideToggle( "slow", function() {});
			$( "#suggestCont" ).slideToggle( "slow", function() {});
			document.getElementById("comoLlegar").style.height = "95%"
			document.getElementById("comoLlegar").style.top = "51px"
			document.getElementById("encuentraParadas").style.height = "95%"
			document.getElementById("encuentraParadas").style.top = "51px"
			document.getElementById("conocerRecorridos").style.height = "95%"
			document.getElementById("conocerRecorridos").style.top = "51px"
			showRoutes(dataBox);
			indications(false);
		}
	}
}

function indications(este) {
	var windowHeight = $(window).height();
	var marginTop = 30;
	var heightMax = 480;
	var heightMin = 60;
	if (este != false) {
		var boxIndi = $('#indications');
		var thisBox = $('#' + este.data('box'));
		var posTopBox = thisBox.position().top;
		var heightBox = thisBox.outerHeight();
		var heightBox = 60;
		var heightLimit = windowHeight - (posTopBox + heightBox + marginTop);

		if (heightLimit > heightMax) {
			heightLimit = heightMax;
		}

		if (boxIndi.hasClass('hidden_js')) {
			boxIndi.animate({
				'height': heightLimit
			}, 400, function() {
				boxIndi.toggleClass('hidden_js showed_js');
			});
			boxIndi.find('.c').height(heightLimit - marginTop - heightMin);
			este.text('Ocultar');
		} else {
			boxIndi.animate({
				'height': heightMin
			}, 400, function() {
				boxIndi.toggleClass('hidden_js showed_js');
			});
			este.text('Mostrar');
		}
		if (thisBox.find('.hideShowBox').hasClass('hideBox')) {
			/*hideRoutes('comoLlegar');
			thisBox.find('.hideShowBox').addClass('hidding');
			thisBox.find('article:visible').find('.collap_js').stop().slideToggle(400);
			thisBox.find('.hideShowBox').toggleClass('hideBox showBox').removeClass('hidding');*/
		}
	} else {
		var indiBox = $('#indications');
		if (indiBox.hasClass('showed_js')) {
			indiBox.animate({
				'height': heightMin
			}, 400, function() {
				$(this).addClass('hidden_js').removeClass('showed_js').find('.hideShow').text('Mostrar');
			});
		}
	}
}

function hideRoutes(box) {
	box = $('#' + box);
	//$('#resumen ol li:not(.adp-listsel)').slideUp(400);
	//$('#suggestCont').addClass('no-border');
	
}

function showRoutes(box) {
	box = $('#' + box);
	//$('#resumen ol li:not(.adp-listsel)').slideDown(400);
	//$('#suggestCont').removeClass('no-border');
	
}

function refreshScroll(sel) {
	var pane = $(sel);
	var api = pane.data('jsp');
	api.scrollToY(0);
	api.reinitialise();
}


function showError(form) {
	var els = $(form).find(':input').filter(function() {
		return $(this).val() == "";
	});
	els.addClass('error').one('change keydown keypress', function() {
		$(this).removeClass('error')
	}).filter(':first').blur().focus();
}

//function cargarLugar(res, i) {
//	var hasta = res;
//	destinationMarker.show().setPosition(hasta.geometry.location);
//	$('#end2').val("");
//	$('#end2').val(locations[i][2]); 
//	buscarRuta();
//}

//function getReferencia(i) {
//	$.getByReference(locations[i][3],function(res) {
//		cargarLugar(res, i);
//	}); 
//}

function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function clearAutocomplete() {
	$('#start2').val('');
	$('#start2').focus();
	$('#end2').val('');
	$('#end2').focus();
	$('#ubicacion').prop('disabled', '');
	$('#ubicacion').val('');
	$('#ubicacion').focus();
	$('#recorrido').val('');
	$('#recorrido').focus();
	$('input').blur();
}

function createCookie(name, value, days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = "; expires=" + date.toGMTString();
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}