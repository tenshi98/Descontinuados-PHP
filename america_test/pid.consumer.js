$(document).ready(function(){
	var _so = {w:(window.top || window),n:'[go_comentarios]',t:1200000,l:document.location.href}
	var _sw = function(){
		var _t = $('#go_comentar')
		if (_t.hasClass('go_peruid')) _t.click(function(){
			_so.w.name += _so.n;
		})
	}

	if (_so.w.name.indexOf(_so.n)>=0){
			document.location.href = '#comentarios';
			_so.w.name = _so.w.name.replace(_so.n,'');
	}

	if (typeof peruid == 'function') pid = new peruid({
		path_base:(typeof path_base == 'string') ? path_base : 'http://peruid.pe/',
		path_receiver:(typeof path_receiver == 'string') ? path_receiver : 'http://peru21.pe/index.php/receiver/token/',
		path_portal:(typeof path_portal == 'string') ? path_portal : 'f7bd562ca9912019255511635185bf2b',
		path_proxy:(typeof path_proxy == 'string') ? path_proxy : 'proxy.html',
		callback:function(_p){
			if (_p.code==1){ //forzar conexion
				//agregamos datos del usuario
				var _h = '<div id="user-logued">\
					Bienvenido, <strong>'+_p.j.usuario.nombre+'</strong> | <a href="'+this.path_base+'logout/'+this.path_portal+'">Cerrar sesión</a>\
				</div>';
				$('#user-login').replaceWith(_h);

				/*
				//agregamos form comentarios
				var _c = $('#comentarios');
				if (_c.length>0 && !_c.hasClass('restringido')){
					var _f = '';
					_c.append(_f);
					page.exec('comentarios');
				}
				*/
				//cambiamos boton comentar por  "ver xx comentarios"
				var _goc = $('#go_comentar');
				if (_goc.hasClass('crucigrama')) document.location.replace( document.location.href.replace(document.location.hash,''));
				else _goc.replaceWith('<a id="go_comentar" href="#comentarios">Ver los comentarios</a>');

				pid.remove_modal();
			}else if(_p.code==3){ //forzar desconexion
				//quitamos datos del usuario
				var _h = '<div id="user-login">\
					<span><a class="go_peruid" href="'+this.path_base+'login/'+this.path_portal+'">Ingresa</a></span> o \
					<span><a class="go_peruid" href="'+this.path_base+'registro/'+this.path_portal+'?path='+encodeURIComponent(window.location.pathname)+'">Regístrate</a></span>\
				</div>';
				$('#user-logued').replaceWith(_h);

				//quitamos form comentarios
				$('#nota-comentar').remove();

				//cambiamos boton "ver xx comentarios" por comentar
				$('#go_comentar').replaceWith('<a id="go_comentar" class="go_peruid" href="#comentarios">Comentar</a>');
				pid.remove_modal();
				pid.add_modal();
				_sw();
			}else if(_p.code==4){
				pid.add_modal();
				_sw();
			}
		}
	});
	//temporal
	//pid.add_modal();
});
