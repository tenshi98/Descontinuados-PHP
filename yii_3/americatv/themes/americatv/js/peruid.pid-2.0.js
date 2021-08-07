var Site = function(opt){
   main_options = $.extend( opt );

  if (typeof peruid == 'function')
    window.pid = this.peruid = new peruid({
      path_base:main_options.ecoid_path.base,
      path_receiver:main_options.ecoid_path.receiver,
      path_portal:main_options.ecoid_path.portal,
      path_proxy:main_options.ecoid_path.proxy,
      callback:function(_p){ console.log(_p);
        var c = $('#user-info');
        //alert(_p.j.token)
        if (_p.o.logued){

            if (c.length>0){
                c.addClass('conectado');
                if(typeof(_p.j.session) === "undefined"){var usuario_p=_p.j.usuario.nombre}else{var usuario_p=_p.j.session}
                c.html(
                    Array(
                            '<p>Bienvenido <strong>'+usuario_p+'</strong></p>',
                            '<p> ',
                                '<a class="config" href="'+main_options.ecoid_path.base+'perfil'+'">Configura tu perfil</a> ',
                                '<a class="cerrar" href="'+main_options.ecoid_path.base+'logout/'+main_options.ecoid_path.portal+'" class="cerrar">Cerrar Sesión</a> ',
                            '</p>',
                            '<div class="clear"></div>'
                    ).join('')
                );
            }
            site.peruid.remove_modal();
        }else {
            c.addClass('conectate');
            c.html(
                Array(
                        '<ul>',
                            '<li><a href="'+main_options.ecoid_path.base+'login/'+main_options.ecoid_path.portal+'" class="go_peruid">Ingresa</a></li>',
                            '<li class="mid">o</li>',
                            '<li><a href="'+main_options.ecoid_path.base+'registro/'+main_options.ecoid_path.portal+'?path='+encodeURIComponent(window.location.pathname)+'" class="go_peruid">Regístrate</a></li>',
                        '</ul>'
                ).join('')
            );
            site.peruid.add_modal();
        }
    }
  })
}