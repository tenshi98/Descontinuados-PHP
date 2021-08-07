var mychart;
var YDM = YAHOO.util.Dom;
var currentTreeSettings = undefined;
var YSQ = YAHOO.util.Selector.query;
jQuery.noConflict();
var list1,list2,adiinviter_onServices;
var callbackFn =  {
	success: function(html) {},
	failure: function(o) {
		if(sf != undefined) sf.hide();
		alert('something went wrong!!');
	},
	argument: undefined,
};
function adi_checkoutput(cd)
{
	if(cd.indexOf('login.css') != -1 ) {
		window.location.reload();
		return false;
	}
	return true;
}

var sf = {
	show : function(){
		YDM.setStyle('loading_mask','display','block');
		YDM.setStyle('loading_content','display','block');
	},
	hide : function(){
		YDM.setStyle('loading_mask','display','none');
		YDM.setStyle('loading_content','display','none');
	}
};
var guest = {
	isOpen : 0,
	show : function() {
		YDM.setStyle('guest_help','display','');
		guest.isOpen = 1;
	},
	hide : function() {
		YDM.setStyle('guest_help','display','none');
		guest.isOpen = 0;
	},
	toggle : function() {
		if(guest.isOpen == 1)
			guest.hide();
		else
			guest.show();
	}
};
var adi = {
	dispN  : function(id) { YDM.setStyle(id,'display','none'); },
	dispB  : function(id) { YDM.setStyle(id,'display','block'); },
	dispIB : function(id) { YDM.setStyle(id,'display','inline-block'); },
	disp   : function(id) { YDM.setStyle(id,'display',''); },
	isHid  : function(id) { return YDM.getStyle(id,'display') == 'none'; },
	innerHeight : function() {
		// For IE again - document.documentElement.offsetHeight
		return (window.innerHeight || document.documentElement.offsetHeight);
	},
	innerWidth : function() {
		return (window.innerWidth || document.documentElement.offsetWidth);
	},
	toggle : function(m) {
		if(YDM.get(m).style.display == 'none')
			adi.dispB(m);
		else
			adi.dispN(m);
	}
};
var perm =  {
	change : function(m) {
		if(!m.checked)
		{
			var t = YAHOO.util.Selector.query('.'+m.id);
			for(var i in t)
			{
				t[i].checked = false;
			}
			YAHOO.util.Selector.query('.'+m.id).checked = true;
			
		}
			// YDM.get(m.id.replace('][1]','][2]')).checked = true;
		/*else
			YAHOO.util.Selector.query('.'+m.id).checked = false;*/
			// YDM.get(m.id.replace('][1]','][2]')).checked = false;
	},
	update : function(m) {
		/*if(m.checked)
			YDM.get(m.id.replace('][2]','][1]')).checked = true;*/
	},
	del : function(i,n) {
		if(confirm("Do you really want delete this custom permission for "+n+"?"))
		{
			var callbackFn = {
				success : function(html) {
					adi_checkoutput(html.responseText);
					YDM.get('user_perms').innerHTML = html.responseText;
				}
			};
			YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?delperm='+i, callbackFn);
		}
	},
	cancel : function() {
		YDM.get('new_user_row').innerHTML = '';
		YDM.get('username_iv').innerHTML  = '';
	}
};
var user_perm = {
	pag : function(n) {
		var qString = 'user_permissions=1&page='+n;
		var callbackFn = {
			success : function(html) {
				adi_checkoutput(html.responseText);
				YDM.get('user_perms').innerHTML = html.responseText;
			}
		};
		YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php', callbackFn, qString);
	}
};
var graph = {
	paginate : function(m){
		var pg = m.getAttribute('page');
		var www = window.innerWidth || document.documentElement.offsetWidth;
		var callbkFn = {
			success : function(html) {
				adi_checkoutput(html.responseText);
				eval(html.responseText);
			},
			failure : function(html) {},
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_graph.php?v=all_services&gPage='+pg+'&sWidth='+www, callbkFn);
	},
	get_user_wise : function(m){
		var www = window.innerWidth || document.documentElement.offsetWidth;
		var callbkFn = {
			success : function(html) {
				adi_checkoutput(html.responseText);
				eval(html.responseText);
			},
			failure : function(html) {},
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_graph.php?v=user_wise&userid='+m+'&sWidth='+www, callbkFn);
	},
};

window.onscroll = function() {
    if( window.XMLHttpRequest ) {
        if (document.documentElement.scrollTop > 0 || self.pageYOffset > 0) {
            jQuery('#left_navbar').css('position','fixed');
            jQuery('#left_navbar').css('top','0');
        } else if (document.documentElement.scrollTop < 0 || self.pageYOffset < 0) {
            jQuery('#left_navbar').css('position','absolute');
            jQuery('#left_navbar').css('top','175px');
        }
    }
}

function initMenu() {
	jQuery('#menu ul ul').hide();
	jQuery('#menu ul li').click(function() {
		getCodes(this);
		jQuery(this).parent().find("ul").slideUp('fast');
		jQuery(this).parent().find("li").removeClass("current");
		jQuery(this).find("ul").slideToggle('fast');
		jQuery(this).toggleClass("current");
		return false;
	});
}



function getCodes(e, v){
	YDM.setStyle(curTitle, 'display','none');
	curTitle = YDM.getAttribute(e,'rel');
	YDM.setStyle(curTitle, 'display','block');
	var titleElem = YDM.get(curTitle);
	adi.dispN('adi_updateSuccess');
	adi.dispN('adi_updateError');
	if(YDM.getAttribute(titleElem,'state') == '0')
	{
		var www = window.innerWidth || document.documentElement.offsetWidth;
		var theImg = YAHOO.util.Selector.query('img',e,true);
		YDM.setStyle(theImg,'display','block');
		var callbkFn = {
			success : function(html)
			{
				//YDM.setStyle('bgwrap', 'height', adi.innerHeight()+'px');
				//YDM.setStyle('bgwrap', 'width', (adi.innerWidth() - 210)+'px');
				adi_checkoutput(html.responseText);
				YDM.setStyle(html.argument[1],'display','none');
				html.argument[0].innerHTML = html.responseText;
				document.body.scrollTop = 0;
				var scrptTag = YAHOO.util.Selector.query('script',html.argument[0],true);
				if(scrptTag) eval(scrptTag.innerHTML);

			},
			failure : function(html) {
				YDM.setStyle(html.argument[1],'display','none');
			},
			argument : [titleElem,theImg]
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_codes.php?section=' + curTitle+(v!=undefined?v:'')+'&sWidth='+www, callbkFn);

		return true;
	}
	else {
		return false;
	}
}

function checkUserName()
{
	name = YDM.get('new_user_perm').value;
	if(name != '')
	{
		callbackFn.success = function(html) {
			adi_checkoutput(html.responseText);
			if(html.responseText == '0')
			{
				YDM.get('username_iv').innerHTML = "Username does not exist.";
				YDM.get('new_user_row').innerHTML = '';
			}
			else
			{
				YDM.get('username_iv').innerHTML = '';
				YDM.get('new_user_row').innerHTML = html.responseText;
			}
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?checkName='+name, callbackFn);
	}
}

function checkUserID()
{
	name = YDM.get('new_user_perm_id').value;
	if(name != '')
	{
		callbackFn.success = function(html) {
			adi_checkoutput(html.responseText);
			if(html.responseText == '0')
			{
				YDM.get('userid_iv').innerHTML = "UserID does not exist.";
				YDM.get('new_user_row').innerHTML = '';
			}
			else
			{
				YDM.get('userid_iv').innerHTML = '';
				YDM.get('new_user_row').innerHTML = html.responseText;
			}
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?checkid='+name, callbackFn);
	}
}

var tempPreview;


function hidePreview() {
	tempPreview.hide();
	YDM.setStyle('adi_overlay','display','none');
	return true;
}
function showPreview(id,bb)
{
	var kpl1 = new YAHOO.util.KeyListener(document.body, {keys:27}, function(){
		hidePreview();
	});
	kpl1.enable();
	var tmp = YDM.get(id).value;
	for(vvv in subvalues)
	{
		while(tmp.indexOf("["+vvv+"]") != -1)
			tmp = tmp.replace("["+vvv+"]",subvalues[vvv]);
	}
	if(bb == 1)
	{
		tmp = '<div style="background-color:white;padding:20px;">'+tmp+'</div>';
	}
	if(tempPreview == undefined)
	{
		tempPreview = new YAHOO.widget.Panel("templatePreview", {
		    fixedcenter: true, constraintoviewport: true, close: false,
		    modal: true, zIndex: 100, visible: true, draggable: false,
		});
	}
	//for registered mode
	tmp = tmp.replace(/href=['"][^'"]*['"]/ig,'');
	tmp = tmp.replace(/\[\/*user_mode\]/gi,'');
	tmp = tmp.replace(/\[\/*attach_note_block\]/gi,'');
	while(tmp.indexOf('guest_mode') != -1)
			tmp = tmp.split('[guest_mode]')[0]+tmp.split('[/guest_mode]')[1];
	tempPreview.previewId =id;
	var regClicked   = YSQ('.regClicked',tempPreview.element,true);
	var guestClicked = YSQ('.guestClicked',tempPreview.element,true);
	regClicked.className= 'button_link_clicked regClicked';
	guestClicked.className= 'button_link guestClicked';
/*	if(id == 'adiinviter_guest_message_body')
	{
		adi.dispN(regClicked);
		adi.dispN(guestClicked);
	}
	else {*/
		adi.dispIB(regClicked);
		adi.dispIB(guestClicked);
	// }
	YSQ('#templatePreviewCode',tempPreview.element,true).innerHTML = tmp;
	YDM.setStyle('adi_overlay','display','block');
	tempPreview.render(document.body);
	tempPreview.show();

}
function setPreview(m,type)
{
	var tmp = YDM.get(tempPreview.previewId).value;
	for(vvv in subvalues)
	{
		while(tmp.indexOf("["+vvv+"]") != -1)
			tmp = tmp.replace("["+vvv+"]",subvalues[vvv]);
	}
	//tmp = '<div style="background-color:white;padding:20px;">'+tmp+'</div>';

	var regClicked   = YSQ('.regClicked');
	regClicked = regClicked[0];
	var guestClicked = YSQ('.guestClicked');
	guestClicked = guestClicked[0];

	if(type == 'guest')
	{
		guestClicked.className= 'button_link_clicked guestClicked';
		regClicked.className= 'button_link regClicked';
		tmp = tmp.replace(/\[\/*guest_mode\]/gi,'');
		tmp = tmp.replace(/\[\/*attach_note_block\]/gi,'');
		while(tmp.indexOf('user_mode') != -1)
			tmp = tmp.split('[user_mode]')[0]+tmp.split('[/user_mode]')[1];
		//YDM.removeClass(regClicked,'regClicked');
		//YDM.addClass(guestClicked,'guestClicked');
	}
	else if(type == 'reg')
	{
		regClicked.className= 'button_link_clicked regClicked';
		guestClicked.className= 'button_link guestClicked';
		tmp = tmp.replace(/\[\/*user_mode\]/gi,'');
		tmp = tmp.replace(/\[\/*attach_note_block\]/gi,'');
		while(tmp.indexOf('guest_mode') != -1)
			tmp = tmp.split('[guest_mode]')[0]+tmp.split('[/guest_mode]')[1];
		//YDM.addClass(regClicked,'regClicked');
		//YDM.removeClass(guestClicked,'guestClicked');
	}
	YSQ('#templatePreviewCode',tempPreview.element,true).innerHTML = tmp;

	YDM.setStyle('adi_overlay','display','block');
	tempPreview.render(document.body);
	tempPreview.show();
	return false;
}


function formSubmit(f,s) {

	YDM.setStyle('adi_notify','display','none');
	YDM.setStyle('adi_logged_out','display','none');
	YDM.setStyle('adi_error','display','none');

	sf.show();
	/*if(s == 'manage_services'){
		saveServices();
	}*/
	if(s == 'manage_services'){
		if(window.event != undefined) window.event.returnValue = false;
		return false;
	}

	YAHOO.util.Connect.setForm(f);
	//YAHOO.util.Connect.initHeader('Content-type','text/html');
	var callbackFn1 = {
		success : function(html) {
			adi_checkoutput(html.responseText);
			sf.hide();
			if(html.responseText == '')
			{
				YDM.setStyle('adi_notify','display','block');
				YDM.setStyle('adi_logged_out','display','none');
				YDM.setStyle('adi_error','display','none');
			}
			else if( html.responseText.search('<error>') != -1 )
			{
				YDM.setStyle('adi_notify','display','none');
				YDM.setStyle('adi_logged_out','display','block');
				YDM.setStyle('adi_error','display','none');
			}
			else if(html.argument == 'content_share')
			{
				YDM.get('adiinviter_new_bbcode').value = '';
				YDM.get('adiinviter_new_bbcode_value').value = '';
				YDM.get('adiallbbcodes').innerHTML = html.responseText;
			}
			else if(html.argument == 'manage_services')
			{
				YDM.get('adi_manage_services').innerHTML = html.responseText;
			}
			else if(html.argument == 'user_permissions')
			{
				YDM.get('new_user_row').innerHTML = '';
				// YDM.get('user_perms').innerHTML = html.responseText;
				//YDM.get('adiinviter_new_bbcode_value').value = '';
				//YDM.get('adiallbbcodes').innerHTML = html.responseText;
			}
			else {
				YDM.setStyle('adi_notify','display','none');
				YDM.setStyle('adi_logged_out','display','none');
				YDM.setStyle('adi_error','display','block');
			}
			document.body.scrollTop = 0;
			/*if(html.argument == 'db_integrate')
				window.location.reload();*/
			//window.scrollTo(0,0);
		},
		argument : s
	};
  	YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php', callbackFn1);
	return false;
}


function show_stats(reportid)
{
	YDM.get('show_statsform1').className = 'button_link';
	YDM.get('show_statsform2').className = 'button_link';
	YDM.get('show_statsform3').className = 'button_link';
	YDM.get('show_statsform4').className = 'button_link';
	YDM.get('show_statsform5').className = 'button_link';
	YDM.get('show_statsform'+reportid).className = 'button_link_clicked';
	date_wise = YDM.get('date_wise');
	user_wise = YDM.get('user_wise');
	if(reportid == 2)
	{
		YDM.setStyle(user_wise,'display','none');
		if(YDM.getStyle(date_wise,'display') == 'none')
		{
			YDM.setStyle(date_wise,'display','block');
		}
		adi.dispN("chartArea");
		adi.dispN("pagination");
	}
	else if(reportid == 3) {
		YDM.setStyle(date_wise,'display','none');
		if(YDM.getStyle(user_wise,'display') == 'none') {
			YDM.setStyle(user_wise,'display','block');
		}
		adi.dispN("chartArea");
		adi.dispN("pagination");
	}
	else {
		YDM.setStyle(date_wise,'display','none');
		YDM.setStyle(user_wise,'display','none');
		getReports(YDM.get('form_submit'), reportid);
	}
	return false;
}
function getReports(f, rid)
{
	var ext;
	var simpArr = ["","adi_statistics","adi_date_wise","adi_user_wise","all_services","adi_topic_share_summery"];
	if(rid == 1) {
		ext = '&report=' + simpArr[1];
	}
	else if(rid == 2) {
		ext = '&report=' + simpArr[2];
		YAHOO.util.Connect.setForm(f);
	}
	else if(rid == 3) {
		ext = '&report=' + simpArr[3];
		YAHOO.util.Connect.setForm(f);
	}
	else if(rid == 4) {
		ext = '&report=' + simpArr[4];
	}
	else {
		ext = '&report=' + simpArr[5];
	}

	callbackFn.success = function(html) {
		adi_checkoutput(html.responseText);
		var pagination;
		if(pagination == undefined) pagination = YDM.get('pagination');
		pagination.innerHTML = html.responseText;
		var scrptTag = YAHOO.util.Selector.query('script', pagination, true);
		if(scrptTag) eval(scrptTag.innerHTML);
		eventBind();
	};
	var www = window.innerWidth || document.documentElement.offsetWidth;
  	YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_plugin.php?sWidth='+www+ext, callbackFn);
	return false;
}

var myChart;
jQuery(document).ready(function() {
	// YDM.setStyle('bgwrap','height',window.innerHeight+'px');
	// YDM.setStyle('bgwrap','width',(window.innerWidth - 210)+'px');

	//Cufon.replace('h1, h2, h5, .notification strong', { hover: 'true' }); // Cufon font replacement
	initMenu(); // Initialize the menu!
	jQuery('.notification').click(function() {
		this.style.display = "none";
	});
	/*myChart = new YAHOO.widget.ColumnChart( "myContainer", myDataSource, {
	    xField: "name",
	    yField: "age"
	}); */
	/*jQuery(".tablesorter").tablesorter(); // Tablesorter plugin

	jQuery('#dialog').dialog({
		autoOpen: false,
		width: 650,
		buttons: {
			"Done": function() {
				jQuery(this).dialog("close");
			},
			"Cancel": function() {
				jQuery(this).dialog("close");
			}
		}
	}); // Default dialog. Each should have it's own instance.

	jQuery('.dialog_link').click(function(){
		jQuery('#dialog').dialog('open');
		return false;
	}); // Toggle dialog

	jQuery('.notification').hover(function() {
 		jQuery(this).css('cursor','pointer');
 	}, function() {
		jQuery(this).css('cursor','auto');
	}); // Close notifications

	jQuery('.checkall').click(
		function(){
			jQuery(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', jQuery(this).is(':checked'));
		}
	); // Top checkbox in a table will select all other checkboxes in a specified column

	jQuery('.iphone').iphoneStyle(); //iPhone like checkboxes

	jQuery('.notification span').click(function() {
		jQuery(this).parents('.notification').fadeOut(800);
	}); // Close notifications on clicking the X button

	jQuery(".tooltip").easyTooltip({
		xOffset: -60,
		yOffset: 70
	}); // Tooltips! */

	jQuery('#menu li:not(".current"), #menu ul ul li a').hover(function() {
		jQuery(this).find('span').animate({ marginLeft: '5px' }, 100);
	}, function() {
		jQuery(this).find('span').animate({ marginLeft: '0px' }, 100);
	}); // Menu simple animation

	/*jQuery('.fade_hover').hover(
		function() {
			jQuery(this).stop().animate({opacity:0.6},200);
		},
		function() {
			jQuery(this).stop().animate({opacity:1},200);
		}
	); // The fade function

	//sortable, portlets
	jQuery(".column").sortable({
		connectWith: '.column',
		placeholder: 'ui-sortable-placeholder',
		forcePlaceholderSize: true,
		scroll: false,
		helper: 'clone'
	});

	jQuery(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").prepend('<span class="ui-icon ui-icon-circle-arrow-s"></span>').end().find(".portlet-content");

	jQuery(".portlet-header .ui-icon").click(function() {
		jQuery(this).toggleClass("ui-icon-minusthick");
		jQuery(this).parents(".portlet:first").find(".portlet-content").toggle();
	});

	jQuery(".column").disableSelection();

	jQuery("table.stats").each(function() {
		if(jQuery(this).attr('rel')) { var statsType = jQuery(this).attr('rel'); }
		else { var statsType = 'area'; }

		var chart_width = (jQuery(this).parent().parent(".ui-widget").width()) - 60;
		jQuery(this).hide().visualize({
			type: statsType,	// 'bar', 'area', 'pie', 'line'
			width: '800px',
			height: '240px',
			colors: ['#6fb9e8', '#ec8526', '#9dc453', '#ddd74c']
		}); // used with the visualize plugin. Statistics.
	});

	jQuery(".tabs").tabs(); // Enable tabs on all '.tabs' classes

	jQuery( ".datepicker" ).datepicker();

	jQuery(".editor").cleditor({
		width: '800px'
	}); // The WYSIWYG editor for '.editor' classes

	// Slider
	jQuery(".slider").slider({
		range: true,
		values: [20, 70]
	});

	// Progressbar
	jQuery(".progressbar").progressbar({
		value: 40
	});   */
});




function paginate(rptName, data)
{
	var www = window.innerWidth || document.documentElement.offsetWidth;
	callbackFn.success = function(html) {
		adi_checkoutput(html.responseText);
		YDM.get('pagination').innerHTML = html.responseText;
		if(html.argument == 'all_services')
		{
			var ss = YSQ('script','pagination',true);
			eval(ss.innerHTML);
		}
	};
	callbackFn.argument = rptName;
  	YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_plugin.php?report='+rptName+'&offset='+data+'&sWidth='+www, callbackFn);
  	eventBind();
  	return false;
}

function eventBind(){
	var fnCallback = function(e) {
		adi_checkoutput(html.responseText);
		this.innerHTML = 'Deleting...';
		var keys = YDM.getAttribute(this,'rel');
		callbackFn.success = function(html) {
			html.argument.outerHTML = 'Deleted';
		};
		callbackFn.argument = this;
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?keys='+keys, callbackFn);
		return false;
	};
	var alinks = YAHOO.util.Selector.query('.record_del','pagination');
	YAHOO.util.Event.addListener(alinks, "click", fnCallback);
	YDM.setAttribute(alinks, 'title','Click to delete this invite permanently.');
}
/*
Manage Services
*/
function saveServices() {  // save settings to server
		var cstring='';
	var services = YAHOO.util.Selector.query('#adiinviter_onServices li');
	for(var service in services)
		cstring += 'services_list['+YDM.getAttribute(services[service],'rel') + ']=1&';

	var services = YAHOO.util.Selector.query('#adiinviter_onServices .supported_domains');
	for(var service in services)
		cstring += 'services_list['+YDM.getAttribute(services[service],'rel') + ']=2&';

	var services = YAHOO.util.Selector.query('#adiinviter_offServices li');
	for(var service in services)
		cstring += 'services_list['+YDM.getAttribute(services[service],'rel') + ']=0&';

	cstring += 'setting[adiinviter_services_num_of_cols]='+YDM.get('adiinviter_services_num_of_cols').value;

	callbackFn.success = function(html) {
		adi_checkoutput(html.responseText);
		sf.hide();

		var onservices = YAHOO.util.Selector.query('.adiinviter_on','adiinviter_offServices');
		for(var service in onservices)
			{ YDM.removeClass(onservices[service],'adiinviter_on'); YDM.addClass(onservices[service],'adiinviter_off'); }

		var onservices = YAHOO.util.Selector.query('.adiinviter_off','adiinviter_onServices');
		for(var service in onservices)
			{ YDM.removeClass(onservices[service],'adiinviter_off'); YDM.addClass(onservices[service],'adiinviter_on'); }

		var onservices = YAHOO.util.Selector.query('.adiinviter_selected','manage_services');
		for(var service in onservices)
			{ YDM.removeClass(onservices[service],'adiinviter_off'); YDM.addClass(onservices[service],'adiinviter_on'); }
		
		var w = YDM.get('adiinviter_services_num_of_cols').value * 113;
		YDM.setStyle(YAHOO.util.Selector.query('#list1'),'width',w+'px');
	};

	YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php?adiinviter_services=', callbackFn, cstring);
}

function services_swap(to) { // Swap from on services to off and vice versa.
	if( to == 'off') {
		var onservices = YAHOO.util.Selector.query('.adiinviter_selected','adiinviter_onServices');
		for(var service in onservices) {
			list2.appendChild(onservices[service]);
		}
	}
	else if(to == 'on') {
		var onservices = YAHOO.util.Selector.query('.adiinviter_selected','adiinviter_offServices');
		for(var service in onservices) {
			list1.appendChild(onservices[service]);
		}
	}
}
var globalObj;
YAHOO.util.Event.addListener(window, "click", function(e){

		YDM.setStyle('adi_notify','display','none');
		YDM.setStyle('adi_logged_out','display','none');
		YDM.setStyle('adi_error','display','none');

	globalObj = YAHOO.util.Event.getTarget(e);

	if(guest.isOpen == 1) {
		if(globalObj.id != 'guest_help_textbox' && globalObj.id != 'guest_help_img')
			guest.hide();
	}

	if(! YDM.hasClass(globalObj,'adiinviter_selected') && !YDM.hasClass(globalObj,'adiinviter_on') && !YDM.hasClass(globalObj,'adiinviter_off') && !YDM.hasClass(globalObj,'adiinviter_span'))
	{
		var onservices = YAHOO.util.Selector.query('.adiinviter_selected','adiinviter_onServices');
		for(var service in onservices) {
			YDM.removeClass(onservices[service],"adiinviter_selected");
		}
		var onservices = YAHOO.util.Selector.query('.adiinviter_selected','adiinviter_offServices');
		for(var service in onservices) {
			YDM.removeClass(onservices[service],"adiinviter_selected");
		}
	}
	/*else if(YDM.hasClass(globalObj,'adiinviter_selected') )
	{
		if(YDM.isAncestor(adiinviter_onServices,globalObj))
		{
			YDM.replaceClass(globalObj,"adiinviter_selected","adiinviter_on");
		}
		if(YDM.isAncestor(adiinviter_offServices,globalObj))
		{
			YDM.replaceClass(globalObj,"adiinviter_selected","adiinviter_off");
		}
	} */
});
var serviceChart='';


function add_more_codes()
{
	if(adi.isHid('addmorebbcode'))
	{
		adi.disp('addmorebbcode');
		// adi.disp('addmorebbcodevalue');
		// adi.disp('addmorebbcodehr');
	}
	else {
		adi.dispN('addmorebbcode');
		// adi.dispN('addmorebbcodevalue');
		// adi.dispN('addmorebbcodehr');
	}
}
function remove_bbcodes(m,code)
{
	if(confirm('Remove this parsing for BBCode : '+code+'?'))
	{
		var clbkFn = {
			success : function(html) {
				adi_checkoutput(html.responseText);
				/*var tt = 'adi_'+html.argument[0];
				adi.dispN(tt);
				if( YDM.get(tt.nextSibling).innerHTML.indexOf('<hr/>') != -1 )
					adi.dispN(tt.nextSibling);*/
				YDM.get('adiallbbcodes').innerHTML = html.responseText;
			},
			argument: [code,m]
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?removeCode='+code, clbkFn);
	}
}


function getOmitedList(v,type,id) {
	YDM.get(id).innerHTML = 'Loading details...';
	callbackFn.success = function(html) {
		adi_checkoutput(html.responseText);
		YDM.get(html.argument).innerHTML = html.responseText;
	};
	callbackFn.argument = id;
	YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?omitedList='+type+'&ids='+v, callbackFn);
}
var topicList = {
	lv: '',
	blur : function(v,t,i) {
		var s = this;
		if(s.lv!=v)
		{
			YDM.get('restrictedThreads_loading').innerHTML = 'Loading details...';
			callbackFn.success = function(html) {
				adi_checkoutput(html.responseText);
				YDM.get('restrictedThreads_loading').innerHTML = '';
				YDM.get(html.argument).innerHTML = html.responseText;
			};
			callbackFn.failure = function(o){ YDM.get('restrictedThreads_loading').innerHTML = '';} ;
			callbackFn.argument = i;
			YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?omitedList='+t+'&ids='+v, callbackFn);
		}
		//getOmitedList(v,t,i);
		s.lv=v;
	},
	unblock : function() {
		var da = YSQ('#topicListTable input');
		var q='',q1='',e='',e1='';
		for(i in da) {
			if(da[i].checked) {
				q+=e+da[i].value;
				e=',';
			}
			else {
				q1+=e1+da[i].value;
				e1=',';
			}
		}
		YDM.get('adiinviter_restricted_threads').value= q1;
		var callbackFn = {
			success : function(html)
			{
				adi_checkoutput(html.responseText);
				//topicListTable
				var adiinviter_restricted_threads = YDM.get('adiinviter_restricted_threads');
				topicList.blur(adiinviter_restricted_threads.value,'threads','restrictedThreads');
				//YDM.get(html.argument).innerHTML = html.responseText;
			}
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?removetopics='+q, callbackFn);
	}
};




var categList= {
	blur : function(v,t,i) {
		var s = this;
		if(s.lv!=v)
		{
			YDM.get(i).innerHTML = 'Loading details...';
			callbackFn.success = function(html) {
				adi_checkoutput(html.responseText);
				YDM.get(html.argument).innerHTML = html.responseText;
			};
			callbackFn.argument = i;
			YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?omitedList='+t+'&ids='+v, callbackFn);
		}
		s.lv=v;
	}
};

var tree;
var fList = {
	save: function(){
		sf.show();
		var nd=tree.getNodesByProperty('highlightState',1);
		var q='',e='';
		for(var i in nd) {
			q+=e+nd[i]['data']['fid'];
			e=',';
		}
		var callbackFn = {
			success : function(html) {
				adi_checkoutput(html.responseText);
				sf.hide();
			},
			failure: function(html) {
				sf.hide();
			}
		};
		YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_change.php?markForum=save&fid='+q, callbackFn);
	}
};
function checkResponse(o)
{
	if( o.responseText.search('<error>') != -1 )
	{
		YDM.setStyle('adi_notify','display','none');
		YDM.setStyle('adi_logged_out','display','block');
		YDM.setStyle('adi_error','display','none');
		return false;
	}
	return true;
}


function checkAll(topNodes) {
    for(var i=0; i<topNodes.length; ++i) {
        topNodes[i].highlight();
        if(topNodes[i].children.length != 0) {
        	checkAll(topNodes[i].children);
        }
    }
}
function uncheckAll(topNodes) {
    for(var i=0; i<topNodes.length; ++i) {
        topNodes[i].unhighlight();
        if(topNodes[i].children.length != 0) {
        	uncheckAll(topNodes[i].children);
        }
    }
}
function resetTree() {
	tree = new YAHOO.widget.TreeView("treeDiv1", YAHOO.lang.JSON.parse(currentTreeSettings));
	tree.singleNodeHighlight = false;
	tree.subscribe("clickEvent",tree.onEventToggleHighlight);
	tree.render();
}
//checkAll(tree.getRoot().children);

//var topNodes = tree.getRoot().children;

/* Content Share Functions */
function chContentType(f)
{
	var new_content_type = YDM.get('new_content_type').value.replace(/^\s+|\s+$/g, '');
	if(new_content_type == new_content_type.match(/[a-z0-9_ ]*/i)[0])
	{
		YDM.setStyle('adi_notify','display','none');
		YDM.setStyle('adi_logged_out','display','none');
		YDM.setStyle('adi_error','display','none');
		sf.show();
		YAHOO.util.Connect.setForm(f);
		var callbackFn1 = {
			success : function(html) {
				sf.hide();
				if(adi_checkoutput(html.responseText) && html.responseText != '') {
					var new_content_type_response = YDM.get('new_content_type_response'), new_content_type = YDM.get('new_content_type');
					new_content_type_response.innerHTML = html.responseText + new_content_type_response.innerHTML;
					new_content_type.value = '';
				}
			}
		};
		YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php', callbackFn1);
	}
	else { alert('Invalid string for Content Type'); }
	return false;
}
function removeContentType(n,uid)
{
	if(n!='') {
		if(confirm('Do you really want to remove '+n+' sharing?'))
		{
			sf.show();
			var q_string = 'content_type='+n;
			var callbackFn1 = {
				success : function(html) {
					sf.hide();
					YDM.setStyle(YDM.get(uid), 'display','none');
					if(adi_checkoutput(html.responseText)) {
						YDM.setStyle('adi_notify','display','block');
						YDM.setStyle('adi_logged_out','display','none');
						YDM.setStyle('adi_error','display','none');
						// window.location.reload();
					}
				}
			};
			YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php?do=remContentType', callbackFn1, q_string);
		}
	}
}


function getPhrases(lid,pid)
{
	lid = lid || YDM.get('adiinviter_lang_code').value;
	pid = pid || 1;
	sf.show('Loading Phrases');
	adi.dispN('new_language');
	var callbackFn = {
		success : function(html) {
			sf.hide();
			YDM.get('adi_edit_phrases_root').innerHTML = html.responseText;
		},
		failure : function(html) {
			sf.hide();
		}
	};
	YAHOO.util.Connect.asyncRequest('GET', 'adiinviter_language.php?getPhrases='+lid+'&page_no='+pid, callbackFn);
	return false;
}
function show_phrase_form(id)
{
	// edit_phrase_forms
	if(YDM.getStyle(id,'display') == 'block')
	{
		adi.dispN(id);
		YDM.setStyle(YAHOO.util.Selector.query('#'+id+' .done_msg'), 'display', 'none');
	}
	else
	{
		YDM.setStyle(YAHOO.util.Selector.query('.edit_phrase_forms'),'display','none');
		adi.dispB(id);
	}
	return false;
}
function save_edit_phrase_form(me,n)
{
	sf.show('Loading Phrases');
	adi.dispN('new_language');
	YAHOO.util.Connect.setForm(me);
	YDM.setStyle(YAHOO.util.Selector.query('#'+n+' .done_msg'), 'display', 'none');
	var callbackFn = {
		success : function(html) {
			sf.hide();
			// adi.dispN(n);
			YDM.setStyle(YAHOO.util.Selector.query('#'+n+' .done_msg'), 'display', 'inline');
		},
		failure : function(html) {
			sf.hide();
		}
	};
	YAHOO.util.Connect.asyncRequest('POST', 'adiinviter_change.php', callbackFn);
	return false;
}
function toggle_new_lang()
{
	if(adi.isHid('new_language'))
		adi.dispB('new_language');
	else
		adi.dispN('new_language');
}

function remove_lang()
{
	if(confirm("Do you really want to remove this Language?\n\nThis process can not be reversed!!"))
	{
		var callbackFn = {
			success : function(html) {
				sf.hide();
				getCodes(YDM.get('lang_tab'));
			},
			failure : function(html) {
				sf.hide();
			}
		};
		YAHOO.util.Connect.asyncRequest('GET','adiinviter_change.php?remLang='+YDM.get('adiinviter_lang_code').value, callbackFn);
	}
}