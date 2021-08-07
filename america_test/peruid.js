eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('g n=p(){g 5,7;2(6.a&&6.k){5=6.j+6.o;7=6.a+6.k}4 2(0.1.i>0.1.h){5=0.1.m;7=0.1.i}4{5=0.1.l;7=0.1.h}g 3,9;2(e.a){2(0.8.b){3=0.8.b}4{3=e.j}9=e.a}4 2(0.8&&0.8.d){3=0.8.b;9=0.8.d}4 2(0.1){3=0.1.b;9=0.1.d}2(7<9){c=9}4{c=7}2(5<3){f=5}4{f=3}q[f,c]}',27,27,'document|body|if|windowWidth|else|xScroll|window|yScroll|documentElement|windowHeight|innerHeight|clientWidth|pageHeight|clientHeight|self|pageWidth|var|offsetHeight|scrollHeight|innerWidth|scrollMaxY|offsetWidth|scrollWidth|size|scrollMaxX|function|return'.split('|'),0,{}))
var peruid = function(par){
	/* callback, path_base, path_receiver, path_portal, path_proxy */
	var t = this;
	t.end_redirect ="";
	t.logued = null;
	t.param = par;
	t.showed = false;
	t.mobile = (navigator.userAgent.match(/Android|iPad|iPod|iPhone|Windows Phone/i)) ? true : false;
	$('body').append('<div id="peruid_modal"><div class="pid_back"></div><div class="pid_frame" style="top:-800px; height:1px; width:1px"><a class="pid_close" href="#cerrar">Cerrar</a><iframe allowtransparency="true" id="pid_iframe" width="285px" height="680px" frameborder="0" scrolling="auto"></iframe></div></div> ');

	var m = $('div#peruid_modal').find('a.pid_close, .pid_back').click(function(e){
		e.preventDefault(); 
		t.close_modal();
	}).end();
        
        //m.find('iframe').on("load", function(){ $(this).removeClass("loading"); });
	
	t.add_modal = function(o){
		if (typeof o != 'object') o = $('.go_peruid');
		
		o.each(function() {
            var _o = $(this);
			var rd = _o.data('redirect'); rd = rd?('&redirect='+encodeURIComponent(rd)):'';
			var erd = _o.data('end-redirect'); erd = erd?('&end_redirect='+encodeURIComponent(erd)):'';
			
			if (t.mobile){
					if (this.href.indexOf('/login/')>0) _o.attr('href',par.path_base+'movil/login/'+par.path_portal+'?callback='+encodeURIComponent(window.location.pathname)+rd+erd);
					else _o.attr('href',par.path_base+'movil/registro/'+par.path_portal+'?callback='+encodeURIComponent(window.location.pathname)+rd+erd);
			}else{
				_o.click(function(e){
					e.preventDefault();
					var s = size();
					
					$('html').addClass('modal');
					//back frame
					m.show().find('iframe').css({ width: 1, height: 1 } ).end().find('div.pid_back').show();
					
					//server
					if (this.href && this.href.indexOf('/registros/redesociales/portada')>0) m.find('iframe').attr('src',par.path_base+'registros/redesociales/'+par.path_portal+'?callback='+document.location.pathname+'&proxy='+encodeURIComponent(par.path_proxy)+rd+erd);
					else if (this.href && this.href.indexOf('/registro/')>0) m.find('iframe').attr('src',par.path_base+'registros/registrate/'+par.path_portal+'?callback='+document.location.pathname+'&proxy='+encodeURIComponent(par.path_proxy)+rd+erd);
					else m.find('iframe').attr('src',par.path_base+'registros/loggin/'+par.path_portal+'?callback='+document.location.pathname+'&proxy='+encodeURIComponent(par.path_proxy)+rd+erd);
					if (!t.showed) t.center();



				});				
			}
        });
	}
	t.remove_modal = function(o){
		if (typeof o != 'object') o = $('.go_peruid');
		o.unbind('click');
	}
	t.center = function(_p){
		_p = _p || {};
		_p.init = _p.init || false;
		_p.height = parseInt(_p.height||0);
		_p.width = parseInt(_p.width||0);
		var _pf = $('div.pid_frame',m);

		var _h = _p.height>0?_p.height: _pf.height();

		var _w = _p.width>0?_p.width:_pf.width();
		//if (!t.showed){ _h = 680; _w = 285 };
		var _wh = $(window).height();
		var _t = _wh - _h; _t = _t>0?(_t/2):0;
		var _l = $(window).width()  - _w; _l = _l>0?(_l/2):0;
		if (t.showed) 
			_pf.css( {position:(_p.height>_wh?'absolute':'fixed') } );
		else {
			_pf.css( {left:_l, position:(_p.height>_wh?'absolute':'fixed') } );
			t.showed = true;
		}


		_pf.animate({left:_l, top: (_p.height>_wh?0:(_t-16)), left:_l, height:_h, width: _w}, function(){ 
			_pf.find('#pid_iframe').show().css({height:_h, width: _w});
		});
	}
	t.proxy = function (_p){
		var _a = {};
		if (_p.href.split("?").length>1){
			var _h = _p.href.split("?")[1].split("&");
			var _l = _h.length
			for (var _i = 0; _i<_l; _i++){
				var _j = _h[_i].split('='); 
				_a[_j[0]] = decodeURIComponent(_j[1])
			}			
		}
		if (_a["type"] == "resize") t.center( {height: _a["height"], width: _a["width"]  });
		else if(_a["type"] == "hashing") t.hashing( {hash: _a["tk"]});
		else if(_a["type"] == "reload") window.location.reload(); 
		else if(_a["type"] == "redirect") window.location.replace(_a["to"]); 
		else if(_a["type"] == "end_redirect")  {
			if ($.trim(_a["to"])=="") t.close_modal();
			else t.end_redirect = _a["to"]; 
		}
	}
	t.close_modal = function(){
		$('html').removeClass('modal');
		m.hide().find('#pid_iframe').attr('src','');
		if ($.trim(t.end_redirect)!="") window.location.replace(t.end_redirect); 
	}
	t.hashing = function(_hs){
		_hs = _hs || {};
		_hs.hash = _hs.hash||0;
		if(_hs.hash.length>1){
			var date = new Date();
			date.setTime(date.getTime()+(720*24*60*60*1000));
			var expires = "expires="+date.toGMTString();
			document.cookie = 'sess_hash='+_hs.hash+'; '+expires+'; path=/';
		}
	}
	
	// proceso de sincronizacion de servidores
	var sync = function(){
		var tk = unescape(document.cookie).match(/pid_token=([0-9a-z]+)/);
		var atk = unescape(document.cookie).match(/pid_anonymous=([0-9a-z]+)/);
		var anonymous = (atk&&atk[1])?atk[1]:'';
		tk = (tk&&tk[1])?tk[1]:anonymous;
		$.getJSON(par.path_base+'index.php/auth/token/'+par.path_portal+'/'+tk+'?path='+document.location.pathname+'&reference='+document.referrer+'&callback=?',
			function (js){
				if (js.recursive){
					document.cookie = 'pid_token=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
					document.cookie = 'pid_anonymous=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
					sync();
					return;
				}
				t.param.token = js.token;
				//crea cookie seguimiento anonimo en motor
				if(js.atoken){
					if(js.atoken != anonymous){
						var date = new Date();
						date.setTime(date.getTime()+(30*60*1000));
						var expires = "expires="+date.toGMTString();
						document.cookie = 'pid_anonymous='+js.atoken+'; '+expires+'; path=/';
					}
				}
				$.post(par.path_receiver+'?v'+Math.ceil(Math.random()*10000), {token: js.token, version:js.version}, 
					function(js){
						var _c, _cc;
						t.param.id_user = (unescape(document.cookie).match( /ecoid";(.*?);/i )||['','"0'])[1].split('"')[1];
						t.param.avatar_user = (unescape(document.cookie).match( /avatar_url";(.*?);/i )||['','"0'])[1].split('"')[1];
						if ((js.usuario !== null) && js.sesion){
							t.logued = true;
							document.cookie = 'pid_anonymous=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
							_c = 1; _cc = 'Solo existe sesion en peruid, inicio forzado';
						}else if ((js.usuario !== null) && js.sesion==false){
							t.logued = false;
							document.cookie = 'pid_token=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
							_c = 3; _cc = 'Solo existe sesion en 2do servidor, logout forzado';
						}else if ((js.usuario == null) && js.sesion==false){
							t.logued = false;
							document.cookie = 'pid_token=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
							_c = 4; _cc = 'No existe sesion en ambos servidores';
						}else {
							t.logued = true;
							document.cookie = 'pid_anonymous=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
							_c = 2; _cc = 'Existe sesion en ambos servidores';
						}
						if (typeof par.callback == 'function') par.callback({o:t,j:js,code:_c,msg:_cc});
					}, "json"
				).fail(function() { 
					var _c = 4, _cc = 'Error respuesta server cliente';
					t.logued = false;
					document.cookie = 'pid_token=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
					if (typeof par.callback == 'function') par.callback({o:t,j:js,code:_c,msg:_cc});
				})
			}
		).fail(function() { 
			t.logued = false;
		})
	}
	sync();
	var css = document.createElement('link'); 
	css.type = 'text/css';
	css.rel = 'stylesheet';
	css.media = 'screen';
	//css.href = "http://coments/peruid/v2/css/modal.css?v=v201210";
	css.href = par.path_base+"f/css/modal.css?v=v201410";
	document.getElementsByTagName('head')[0].appendChild(css);
	document.onkeydown = function(e){
		var evt = e || window.event;
		if (evt.keyCode == 27 ) t.close_modal();
	}
}