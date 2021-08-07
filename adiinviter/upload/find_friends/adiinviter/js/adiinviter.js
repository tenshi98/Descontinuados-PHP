var adi={},adipps={},adintrs={},adiinp={},adipop={},adiconts={};

// j, a, p, pp, nt

adi=(function(j,a,pp,nt,acp){
	// Popup Wrapper
	var p = {
		isopen:0,state:0,openq:0,mskgr:1, bkp:1,
		id:'',cont:null,zind:20,
		postLoad:null,preShow:null,postShow:null,preHide:null,postHide:null,
		rt:null,cont:null,
		phtml:'', ntr:'', ntrf:null,
		uact:'',uact_dt:'text',dt:{},
		hoc:0,
		init:function(){this._init();},
		_init: function(){
			var me=this,ht='';
			if(me.state == 0)
			{
				if(me.bkp==0) ht=a.wbphtml;
				else ht=a.pphtml;
				ht=ht.replace(/\[ADI_POPUP_ID\]/ig, me.id);
				j('body').prepend(ht);
				me.rt=j('#'+me.id);
				me.cont=j('.adi_nc_container', me.rt);
				me.rt.css('z-index', a.zs + me.zind + (me.mskgr==2?150:0));
				me.state=1;
				if(me.hoc==1) {
					me.rt.click(function(e){
						if(j(e.target).parents('.adi_nc_container').size() == 0)
						{
							me.hide();
						}
					});
				}
				me.ldata();
			}
		},
		ldata: function(){
			var m=this;
			if(m.state==1){
				if(m.uact!=''){
					m.state=2;
					if(m.openq==1){ m.show(); m.openq=0;}
					j.ajax({
						type: 'POST',
						url: a.ajaxUrl(m.uact),
						data: m.dt,
						success: function(data) {
							m.sdata(data);
						},
						error : function(d) {},
						dataType: m.uact_dt,
					});
				}
			}
		},
		reset:function(){
			this.sdata(this.phtml);
		},
		sdata:function(data){
			var m=this;
			m.cont.html(data);
			m.phtml=data;
			m.state=3;
			m.postLoad && m.postLoad();
			if(m.ntr!='' && a.ntrs[m.ntr]){
				m.ntrf = a.ntrs[m.ntr];
				m.ntri='popup';
				m.ntrf();
			}
			j('.adi_popup_ok', m.rt).click(function(){
				m.hide();
			});
			if(m.openq==1){m.show();m.openq=0;}
		},
		show:function(){this._show();},
		_show: function(){
			var m=this;
			if(m.state<2)
			{
				m.openq=1;
				m.init();
				return 1;
			}
			else if(m.isopen == 0)
			{
				if(m.preShow)
				{
					if(m.preShow() === false)
					{
						return false;
					}
				}
				// m.preShow && m.preShow();
				m.isopen=1;
				a.msk[m.mskgr] && a.msk[m.mskgr].show();
				m.rt.show();
				m.postShow && m.postShow();
			}
		},
		hide: function(){
			var m=this;
			if(m.isopen==1)
			{
				m.preHide && m.preHide();
				a.msk[m.mskgr] && a.msk[m.mskgr].hide();
				m.rt.hide();
				m.isopen=0;
				m.postHide && m.postHide();
			}
		}
	};

	// Mask Wrapper
	var ms = {
		m:null, isopen:0, c:0,
		show:function(){
			if(this.isopen==0) { this.m.show();this.isopen=1; }
			this.c++;
		},
		hide:function(){
			if(this.isopen==1 && --this.c == 0) {this.m.hide(); this.isopen=0;}
		}
	};

	// Root Variable : Main Variable
	a = {
		zs:100, aurl:'', rurl:'', dfhtml:'',pphtml:'', wbphtml:'', ncols:8, mw:null, regurl:'', ihurl:'',
		cflt:1048576,cllt:50000,
		cns:'', eval:function(cd){eval(cd);},
		msk:{}, ntrs:{},
		vWidth : function() { return j(document).width(); },
		vHeight : function() { return j(document).height(); },
		indexOf: function(m, s) {
			if(typeof s != 'string') { for(var i=0 ; i<m.length ; i++) { if(m[i] == s) return i; } }
			else {
				for(var i=0 ; i<m.length ; i++) {
					if(m[i] == s[0]) { var st=true; for(var z=0 ; z<s.length ; z++){ if(m[i+z] != s[z]) st=false; } if((z==s.length) && st) return i; }
				}
			}
			return -1;
		},
		parseName: function(n) {
			return ((n.replace) ? n.replace(/&amp;/g,'&').replace(/&quot;/g,'"') : n);
		},
		trim: function(m){ return (typeof m == 'string') ? m.replace(/^\s+|\s+$/g, '') : ''; },
		ajaxUrl: function(act){ return a.aurl+'adi_js.php?adi_scc='+a.scc+'&'+act; },
		newPopup: function(id,vn,zi,mg,ec){
			pp[vn] = j.extend({},p,{id:id,zind:zi,mskgr:mg},ec);
		},
		init:function(){
			j('body').prepend('<div class="adi_all_pp_out"></div><div class="adi_stickBorders adiinviter_mask" id="adi_mask_1"></div><div class="adi_stickBorders adiinviter_mask" id="adi_mask_2"></div>');
			this.msk[1] = j.extend({},ms,{m:j('#adi_mask_1')});
			this.msk[1].m.css('z-index', a.zs);
			this.msk[2] = j.extend({},ms,{m:j('#adi_mask_2')});
			this.msk[2].m.css('z-index', a.zs+150);
			j(document).click(function(){
				adi.hide_ip_err();
				adi.hide_pp_err();
			});
			j(document).keyup(function(e){
				if(e.which == 27)
				{
					var c=adi.msk[1].c;
					if(pp.ip.isopen) pp.ip.hide();
					if(pp.aa.isopen) pp.aa.hide();
					if(pp.cf.isopen) pp.cf.hide();
					if(pp.mnf.isopen) pp.mnf.hide();
					if(pp.rc.isopen) pp.rc.hide();
					if(adi.msk[1].c==c && pp.lg.isopen) pp.lg.hide();
				}
			});
		},
		allocate_intr:function(ntr,rt,dt){
			nt[ntr] || (nt[ntr] = {});
			nt[ntr].rt = rt;
			nt[ntr].ntrf = a.ntrs[ntr];
			dt && (nt[ntr] = j.extend(nt[ntr],dt));
			nt[ntr].ntri='inpage';
			nt[ntr].ntrf();
		},
		show_ip_err:function(msg){
			if(msg!='')
			{
				var p = j('.adi_inpage_error_out');
				p.css('visibility','visible');
				j('.adi_inpage_error_msg', p).html(msg);
			}
		},
		hide_ip_err:function(){
			j('.adi_inpage_error_out').css('visibility','hidden');
		},
		show_pp_err:function(msg){
			if(msg!='')
			{
				var p = j('.adi_popup_error_outer');
				p.show();
				j('.adi_popup_error_msg', p).html(msg);
			}
		},
		hide_pp_err:function(){
			j('.adi_popup_error_outer').hide();
		}
	};


	// Default Interfaces
	a.ntrs={
		// Login Page - Popup
		'lgpp':function(){
			var m=this;
			a.ntrs.lg(m);
			j('.adi_nc_addressbook_form', m.rt).submit(function(e){
				var sk = j('.adi_service_key_val', m.rt).val();
				var os = j('.adi_oauth_submit',m.rt).val() || 0;
				if(sk != '' && a.services[sk] && a.services[sk][0][2] == 1 && os == 0)
				{
					adi_open_oauth(sk);
					e.preventDefault();
					return false;
				}
				var eb=j('.adi_nc_user_email_input', m.rt).val(), pb=j('.adi_nc_password_input', m.rt).val();
				if( (eb!=''&& pb!='' && sk!='') || os == 1 )
				{
					j('.adi_oauth_submit',m.rt).val(0);
					var frm = this;
					adi_sending_effect(frm,1);
					j.ajax({
						type: 'POST', data: j(frm).serialize(), 
						url: a.ajaxUrl('adi_do=get_contacts'),
						success: function(code)
						{
							adi_sending_effect(frm,0);
							adi.eval(code);
						},
						error : function(d) {
							adi_sending_effect(frm,0);
						},
						dataType: 'text'
					});
				}
				return false;
			});
			j('.adi_nc_contact_file_form', m.rt).submit(function(){
				var errmsg='', err=false,n,frmt,finp=j('.adi_nc_contact_file',m.rt);
				if(finp.val() == '') {
					err=true;
				}
				else if(!finp.val().toLowerCase().match(/\.csv$|\.ldif$|\.vcf$|\.txt$/)) {
					errmsg = adi.phrases['adi_msg_invalid_contact_file_format'];
					err=true;
				}
				else if(finp.get(0).files[0].size > adi.cflt) {
					errmsg = adi.phrases['adi_msg_contact_file_size_limit_exceeded'];
					err = true;
				}
				if(err == true) {
					if(errmsg != ''){a.show_pp_err(errmsg);}
				}
				else {
					adi_sending_effect(this,1);
					return true;
				}
				return false;
			});
			j('.adi_nc_manual_form', m.rt).submit(function(){
				var errmsg='',err=false,cl = a.trim(j('.adi_nc_contacts_list', m.rt).val());
				if(cl == '' || a.trim(adi.phrases['manualinv_textarea_default_txt']) == cl) {
					err=true;
				}
				else if(cl.length > adi.cllt) {
					errmsg = adi.phrases['adi_error_contact_list_length_limit_exceeded'];
					err = true;
				}
				if(err == true) {
					if(errmsg != ''){a.show_pp_err(errmsg);}
				}
				else
				{
					var frm = this;
					adi_sending_effect(frm,1);
					j.ajax({
						type: 'POST', data: j(frm).serialize(), 
						url: a.ajaxUrl('adi_do=get_contacts'),
						success: function(code)
						{
							adi_sending_effect(frm,0);
							adi.eval(code);
						},
						error : function(d) {
							adi_sending_effect(frm,0);
						},
						dataType: 'text'
					});
				}
				return false;
			});
		},
		// Login Page - Inpage
		'lgip':function(){
			var m=this;
			a.ntrs.lg(m);
			j('.adi_nc_addressbook_form', m.rt).submit(function(e){
				var sk = j('.adi_service_key_val', m.rt).val();
				var os = j('.adi_oauth_submit',m.rt).val() || 0;
				if(sk != '' && a.services[sk] && a.services[sk][0][2] == 1 && os == 0)
				{
					adi_open_oauth(sk);
					e.preventDefault();
					return false;
				}
				var eb=j('.adi_nc_user_email_input', m.rt).val(), pb=j('.adi_nc_password_input', m.rt).val();
				if( (eb!='' && pb!='' && sk!='') || os == 1)
				{
					j('.adi_oauth_submit',m.rt).val(0);
					return true;
				}
				return false;
			});
			j('.adi_nc_contact_file_form', m.rt).submit(function(){
				var errmsg='', err=false,n,frmt,finp=j('.adi_nc_contact_file',m.rt);
				if(finp.val() == '') {
					err=true;
				}
				else if(!finp.val().toLowerCase().match(/\.csv$|\.ldif$|\.vcf$|\.txt$/)) {
					errmsg = adi.phrases['adi_msg_invalid_contact_file_format'];
					err=true;
				}
				else if(finp.get(0).files[0].size > adi.cflt) {
					errmsg = adi.phrases['adi_msg_contact_file_size_limit_exceeded'];
					err = true;
				}
				if(err == true) {
					if(errmsg != ''){a.show_ip_err(errmsg);}
					return false;
				}
				return true;
			});
			j('.adi_nc_manual_form', m.rt).submit(function(){
				var errmsg='',err=false,cl = a.trim(j('.adi_nc_contacts_list', m.rt).val());
				if(cl == '' || a.trim(adi.phrases['manualinv_textarea_default_txt']) == cl) {
					err=true;
				}
				else if(cl.length > adi.cllt) {
					errmsg = adi.phrases['adi_error_contact_list_length_limit_exceeded'];
					err = true;
				}
				if(err == true) {
					if(errmsg != ''){a.show_ip_err(errmsg);}
					return false;
				}
				return true;
			});
		},
		// Login Page - Common
		'lg': function(m){
			m.stxt='';
			m.type_search_time_fn=undefined;
			m.last_tp_search='';
			j('.adi_menuitem', m.rt).click(function(){
				j('.adi_inner_section', m.rt).hide(); j('.'+j(this).attr('data'), m.rt).show();
				j(this).siblings('.current').removeClass('current').addClass('adi_other');
				j(this).removeClass('adi_other').addClass('current');
			});
			j('.adi_nc_contacts_list', m.rt).focusin(function(){
				if(j(this).val()==a.phrases['manualinv_textarea_default_txt']) j(this).val('');
			}).focusout(function(){
				if(j(this).val()=='') j(this).val(a.phrases['manualinv_textarea_default_txt']);
			});
			pp.sp.init();
			j('.adi_nc_down_arrow',m.rt).click(function(){
				pp.sp.show(m.rt);
				j('.adi_nc_up_arrow', m.rt).show();
				j('.adi_nc_down_arrow', m.rt).hide();
				j('.adi_nc_service_input', m.rt).focus();
			});
			j('.adi_nc_up_arrow',m.rt).click(function(){
				pp.sp.hide();
				j('.adi_nc_up_arrow', m.rt).hide();
				j('.adi_nc_down_arrow', m.rt).show();
				j('.adi_nc_service_input', m.rt).blur();
			});
			j('.adi_nc_service_input', m.rt).focusin(function(){
				pp.sp.show(m.rt);
				if(j(this).val()==adi.phrases['adi_ab_service_field_default_txt'])
				{
					j(this).val('').removeClass('adi_nc_service_note');
					m.stxt='';
				}
				var sk = j('.adi_service_key_val', m.rt).val();
				j(this).removeClass(sk+'_si').val('');
				j('.adi_search_icon', m.rt).show();

				j('.adi_nc_up_arrow', m.rt).show();
				j('.adi_nc_down_arrow', m.rt).hide();
			}).focusout(function(){
				var sk = j('.adi_service_key_val', m.rt).val();
				if(j('.adi_nc_service_select_hoverd').size() > 0)
				{
					sk=j('.adi_nc_service_select_hoverd').parent().attr('data');
					pp.sp.setKey(sk);
					j('.adi_nc_service_select_hoverd').removeClass('adi_nc_service_select_hoverd');
				}
				else if(sk!='' && adi.services[sk])
				{
					pp.sp.setKey(sk);
				}
				else if(j(this).val() == '')
				{
					j(this).val(adi.phrases['adi_ab_service_field_default_txt']).addClass('adi_nc_service_note');
				}
				j('.adi_nc_up_arrow', m.rt).hide();
				j('.adi_nc_down_arrow', m.rt).show();
				setTimeout(function(){
					pp.sp.hide();
					m.stxt='';
				},20)
			}).keyup(function(e){
				if(e != undefined && e.which == 13) {
					e.preventDefault();
				}
				var nq = j(this).val();
				if(nq == '')
				{
					j('.adi_nc_service_select_hoverd').removeClass('adi_nc_service_select_hoverd');
				}
				else if(m.stxt != nq)
				{
					j('.adi_nc_service_select_hoverd').removeClass('adi_nc_service_select_hoverd');
					m.stxt = nq;
					var patt = new RegExp('\\s'+m.stxt+'[^\\s]*','ig'),r,s,i=''; 
					while(r = patt.exec(pp.sp.slist) )
					{
						s = a.trim(r[0]);
						if(pp.sp.smap[s] != undefined)
						{
							j('.adi_serv_'+pp.sp.smap[s]).addClass('adi_nc_service_select_hoverd');
							// pp.sp.setKey(pp.sp.smap[s]);
						}
					}
				}
			});

			j('.adi_nc_user_email_input',m.rt).keyup(function(e){
var kk = e.which;
if(kk && kk != 189 && kk != 190 && (kk < 65 || kk > 90)) { return false; }
var dm=j(this).val(),dmn='';
dm=dm.toLowerCase();
if(typeof dm == 'string' && dm.length > 0) {
	dmn = dm.replace(/^[^@]*@/g,'');
}
if(m.last_tp_search != dmn && m.type_search_time_fn != undefined) {
	clearTimeout(m.type_search_time_fn);
}
if(dmn == '') { return false; }
else if(m.last_tp_search != dmn)
{
	m.last_tp_search = dmn;
	var csid = j('.adi_service_key_val',m.rt).val();
	if(csid != '' && adi.services[csid][1][0] == '*') { return true; }
	for(var i in adi.services)
		if(typeof adi.services[i] == 'object')
			if(adi.services[i][1][0] != '*')
				for(var l in adi.services[i][1])
					if(a.indexOf(a.services[i][1][l], dmn) === 0)
					{
						pp.sp.setKey(i);
						return true;
					}

	if(dmn.length > 3 && adi.indexOf(dmn, '.') != -1)
	{
		m.type_search_time_fn = setTimeout(function(){
			jQuery.ajax({type: 'POST', data: {query:dmn}, url: a.ajaxUrl('adi_do=type_search'),
				success: function(list)
				{
					var cf=0;
					for(var i in list)
						if(typeof adi.services[i] == 'object')
						{
							if(cf == 0) {
								pp.sp.setKey(i);
								cf = 1;
							}
							if(adi.services[i][1][0] != '*')
							{
								jQuery.merge(adi.services[i][1], list[i]);
							}
						}
				},
				error : function(d) {},
				dataType: 'json'
			});
		},400);
	}
}
			});

			pp.cf.init();
			j('.adi_nc_show_csv_instruct',m.rt).click(function(){
				pp.cf.show(); return false;
			});

			pp.mnf.init();
			j('.adi_nc_show_formats',m.rt).click(function(){
				pp.mnf.show(); return false;
			});
		},
		// Contact File Interface
		'cf':function(){
			var m=this;
			j('.adi_expand_instr', m.rt).click(function(){
				if(j('.'+j(this).attr('rel'), m.rt).css('display') == 'block')
				{
					j('.'+j(this).attr('rel'), m.rt).hide();
				}
				else
				{
					j('.adi_nc_ct_sect_out', m.rt).hide();
					j('#cfDesc_scroll', m.rt).scrollTop(j('.'+j(this).attr('rel'), m.rt).show().attr('scrollto'));
				}
			});
			j('.adi_dwn_sample_file', m.rt).click(function(){
				var sn = j(this).attr('rel');
				if(!isNaN(sn)){
					var  url = a.ajaxUrl('adi_do=download_sample&v='+sn);
					if(j('#adi_dwn_sample').length == 0) {
						j('body').append('<iframe id="adi_dwn_sample" style="display:none;" src="'+url+'"></iframe>');
					}
					else {
						j('#adi_dwn_sample').attr('src',url);
					}
				}
				return false;
			});
		},
		// Invite Sender Interface
		'ispp':function(){
			var m=this;
			pp.ip.dt={
				service: a.config['service_key'],
				share_type: a.config['share_type'],
				content_id: a.config['content_id'],
				attach_note:'',
			};
			a.ntrs.is(m);
			j(".adi_goto_inviter_page_link",m.rt).click(function(){
				pp.lg.reset(); return false;
			});
			if(!adiconts.fa_enabled) { j('.adi_back_to_friend_adder',m.rt).remove(); }
			j('.adi_back_to_friend_adder',m.rt).click(function(){
				if(adiconts.fa_enabled){ adiconts.fa_show_interface(); }
			});
			j('.adi_invite_sender_form', m.rt).submit(function(){
				if(j('.reg_conts_clicked',m.rt).size() > 0)
				{
					var ln = (adiconts.gui == 1) ? "adi_do=get_sender_info" : "adi_do=send_invites";
					j.ajax({
						type: 'POST', data: j(this).serialize(), url: a.ajaxUrl(ln),
						success: function(code) {
							j('.adi_nc_container',m.rt).html(code);
							if(adiconts.gui == 1)
							{
								a.ntrs.sd(m);
							}
							else
							{
								a.ntrs.fmpp(m);
							}
						},
						error : function(d) {},
						dataType: 'html'
					});
				}
				else
				{
					a.show_pp_err(a.phrases['adi_msg_no_contacts_selected']);
				}
				return false;
			});
			j('.adi_popup_ok',m.rt).click(function(){
				m.hide();
			});
		},
		'isip':function(){
			var m=this;
			pp.ip.dt={
				service: m.config['service_key'],
				share_type: m.config['share_type'],
				content_id: m.config['content_id'],
				attach_note:'',
			};
			a.ntrs.is(m);
			j(".adi_goto_inviter_page_link",m.rt).click(function(){
				j('.adi_back_to_inviter').submit(); return false;
			});
			j('.adi_invite_sender_form', m.rt).submit(function(e){
				if(j('.reg_conts_clicked',m.rt).size() == 0)
				{
					a.show_ip_err(a.phrases['adi_msg_no_contacts_selected']);
					e.preventDefault();
					return false;
				}
			});
		},
		'is':function(m){
			// m.cns=a.cns; a.cns='';
			if(pp.ip.state==0)
				pp.ip.init();
			else {
				pp.ip.state=1;
				pp.ip.ldata();
			}
			j('.adi_invite_preview_link', m.rt).click(function(){
				pp.ip.show(); return false;
			});
			pp.aa.init();
			j('.adi_attach_note_link', m.rt).click(function(){
				pp.aa.trrt=m.rt;
				pp.aa.show(); return false;
			});
			var lm = j('.adi_select_all_link', m.rt).attr('rel');
			j('.adi_select_all_link', m.rt).attr('rel','');
			j('.adi_select_all_link', m.rt).click(function(){
				var s = j('.reg_conts_clicked', m.rt).size();
				if(s == lm)
				{
					j('.reg_conts_clicked', m.rt).addClass('reg_conts').removeClass('reg_conts_clicked');
					j('.adi_cont_checked', m.rt).each(function(){
						this.checked = false;
					});
				}
				else
				{
					var c = s;
					j('.adi_contact',m.rt).each(function(i){
						if(!j(this).hasClass('reg_conts_clicked'))
						{
							c++;
							if(c <= lm){
								j(this).addClass('reg_conts_clicked').removeClass('reg_conts');
								j(this).children('.adi_cont_checked')[0].checked=true;
							}
						}
					});
				}
				return false;
			});
			a.ntrs.cd(m);
		},
		// Adjust contacts
		'ac':function(m,totalcount){
			var mx = (this.sc == 1 ? null : a.mw);
			if(mx==null){mx=j(document).width()-70;}
			var ew = j('.adi_contact',m.rt).outerWidth()+10;
			var cls = (totalcount > 20 ? Math.floor(mx/ew) : 3);
			j('.adi_conts_container', m.rt).width(ew*cls);
			if(j('.adi_conts_container', m.rt).height() > j('.adi_conts_container_out', m.rt).height())
			{
				j('.adi_conts_container', m.rt).width(j('.adi_conts_container', m.rt).width()+18);
			}
			if(j('.adi_nc_popup_style', m.rt).size())
			{
				var df = j(window).height() - j('.adi_nc_container', m.rt).height();
				if(df < 160)
				{
					j('.adi_conts_container_out', m.rt).height(j('.adi_conts_container_out', m.rt).height() - (160 - df));
				}
			}
			j('.adi_conts_container_out', m.rt).height(j('.adi_conts_container_out', m.rt).height());
		},
		'fapp':function(){
			var m=this;
			a.ntrs.fa(m);
			j('.adi_skip_button',m.rt).click(function(){
				if(adiconts.is_enabled)
				{
					adiconts.is_show_interface();
				}
				else
				{
					pp.lg.reset();
				}
				return false;
			});
			j(".adi_goto_inviter_page_link",m.rt).click(function(){
				j('.adi_ip_mf_out').hide();
				pp.lg.reset(); return false;
			});
			j('.adi_friend_adder_form', m.rt).submit(function(e){
				return false;
			});
			j('.adi_add_friend_button', m.rt).click(function(e){
				e.preventDefault();
				var frm = j('.adi_friend_adder_form', m.rt);
				if(j('.reg_conts_clicked', m.rt).size() > 0)
				{
					j.ajax({
						type: 'POST', data: frm.serialize(), url: a.ajaxUrl('adi_do=add_as_friend'),
						success: function(code) {
							if(!adiconts.is_enabled)
							{
								// adi.final_msg.set_message(data);
								j('.adi_nc_container',m.rt).html(code)
							}
							else
							{
								var cd = j(code);
								var t = j('.adi_fr_added_ids', cd).val();
								if(t && t!='') {t = t.split(','); j.merge(adiconts.fa_done_ids, t);}
							}
						},
						error : function(d) {},
						dataType: 'text'
					});
					if(adiconts.is_enabled)
					{
						adiconts.is_show_interface();
					}
				}
				else
				{
					a.show_pp_err(a.phrases['adi_msg_no_contacts_selected']);
				}
				return false;
			});
			j('.adi_popup_ok',m.rt).click(function(){
				m.hide();
			});
		},
		'faip':function(){
			var m=this;
			a.ntrs.fa(m);
			j(".adi_goto_inviter_page_link",m.rt).click(function(){
				j('.adi_back_to_inviter').submit(); return false;
			});
			j('.adi_add_friend_button', m.rt).click(function(e){
				var frm = j('.adi_friend_adder_form', m.rt);
				if(j('.reg_conts_clicked', m.rt).size() == 0)
				{
					a.show_ip_err(a.phrases['adi_msg_no_contacts_selected']);
					e.preventDefault();
					return false;
				}
			});
		},
		'fa': function(m){
			// m.cns=a.cns; a.cns='';
			m.totalcount = j('.adi_contact',m.rt).size();
			j('.adi_select_all_link', m.rt).click(function(){
				if(m.totalcount > j('.reg_conts_clicked', m.rt).size())
				{
					j('.reg_conts').removeClass('reg_conts').addClass('reg_conts_clicked');
				}
				else
				{
					j('.reg_conts_clicked').removeClass('reg_conts_clicked').addClass('reg_conts');
				}
			});
			var mf_links = jQuery('.adi_mf_link', m.rt);
			if(mf_links.size() > 0)
			{
				if(j('.adi_ip_mf_out').size() == 0)
				{
					jQuery('body').prepend('<div class="adi_ip_mf_out"></div>');
				}
				j('.adi_mf_link',m.rt).click(function(){
					var id = j(this).attr('data');
					var ot = j('.adi_ip_mf_out');
					ot.html(j('#adi_ip_mfuser_'+id, m.rt).html());
					var cc = j('.adi_ip_mf_cont',m.rt);
					var o = j(this).offset();
					ot.css('z-index', a.zs+15);
					ot.css('top', o.top+15);
					ot.css('left', o.left-25);
					ot.show();
					if(cc.height() != cc.get(0).scrollHeight)
					{
						cc.width(179);
					}
					else {
						cc.width(162);
					}
					j('.adi_ip_mf_btn', ot).click(function(){
						j('.adi_ip_mf_out').hide();
					});
					return false;
				});
			}
			a.ntrs.cd(m);
		},
		// Contacts Display
		'cd':function(m){
			var cnslist = a.cns; a.cns='';
			j('.adi_search_friend',m.rt).keyup(function(e){
				if(e.which==13){return false;}
				var q=this.value;
				if(adi.trim(q) != '' && q != this.last_query)
				{
					q=adi.trim(q);
					q=q.toLowerCase();
					this.last_query = q;

					var patt = new RegExp('\\s'+q+'[^;]*','ig');
					var r = cnslist.match(patt);
					j('.adi_contact', m.rt).hide();
					for(var i in r)
					{
						if(typeof r[i] == 'string')
						{
							var c=r[i].match(/[0-9]+$/ig);
							if(c[0] != '')
							{
								j('.adi_contact_'+c, m.rt).show();
							}
						}
					}
				}
				else if(q == '' && this.last_query != '')
				{
					this.last_query = '';
					j('.adi_contact', m.rt).show();
				}
			}).focusin(function(){
				if(j(this).val()==a.phrases['adi_search_contacts_default_text']) j(this).val('');
				j(this).parents('.adi_search_user_out').removeClass('adi_search_fr_focus').addClass('adi_search_fr_focus')
			}).focusout(function(){
				if(j(this).val()=='') {
					j(this).val(a.phrases['adi_search_contacts_default_text']);
					j('.adi_contact', m.rt).show();
					j(this).parents('.adi_search_user_out').removeClass('adi_search_fr_focus');
				}
			});
			
			j('.adi_conts_container', m.rt).click(function(e){
				var m=j(e.target);
				if(m.parents('.adi_contact').size() != 0)
				{
					m=m.parents('.adi_contact');
				}
				if(m.hasClass('adi_contact') && !m.hasClass('reg_done_conts'))
				{
					if(m.hasClass('reg_conts'))
					{
						m.addClass('reg_conts_clicked').removeClass('reg_conts');
						m.children('.adi_cont_checked')[0].checked=true;
					}
					else 
					{
						m.addClass('reg_conts').removeClass('reg_conts_clicked');
						m.children('.adi_cont_checked')[0].checked=false;
					}
				}
			});

			j('.adi_contact', m.rt).hover(function(){
				j('.adi_contacts_info', m.rt).html(j(this).attr('tip'));
			},function(){
				j('.adi_contacts_info', m.rt).html('');
			});
			var tc = j('.adi_contact',m.rt).size();
			a.ntrs.ac(m,tc);
		},
		'sd':function(m){

		},
		'fmpp':function(){
			var m=this;
			j('.adi_pp_redirect',m.rt).click(function(){
				var nm = j(this).attr('name');
				if(nm=='adi_invite_more'){pp.lg.reset();}
				else if(nm=='adi_website_register'){window.location.href=a.regurl;}
				else if(nm=='adi_invite_history'){window.location.href=a.ihurl;}
			});
			j('.adi_popup_ok').click(function(){
				pp.lg.hide();
			});
		},
		'rcpp':function(){
			var m=this;
			a.ntrs.rc(m);
			m.req_on=0;
			j('.adi_scc_form',m.rt).submit(function(){
				j('#adi_security_failed',m.rt).hide();
				if(m.req_on == 0)
				{
					m.req_on=1;
					j.ajax({
						type: 'POST',
						url: a.ajaxUrl('adi_do=security_check'),
						data: j(this).serialize(),
						success: function(data)
						{
							m.req_on=0;
							a.eval(data);
						},
						error : function(d) {m.req_on=0;},
						dataType: 'text'
					});
				}
				return false;
			});
		},
		'rcip':function(){
			var m=this;
			a.ntrs.rc(m);
		},
		'rc':function(m){
			j('.adi_cap_change_img',m.rt).click(function(){
				Recaptcha.reload();
				j('#adi_security_failed',m.rt).hide();
				return false
			});
			j('.adi_cap_show_audio',m.rt).click(function(){
				Recaptcha.switch_type("audio");
				return false;
			});
			j('.adi_cap_show_captcha',m.rt).click(function(){
				Recaptcha.switch_type("image");
				return false;
			});
		},
		'ih':function(){
			
			j(".adi_nc_paginate_form").submit(function(){
				return false;
			});
			j('.adi_nc_filter_option_btn').click(function(){
				if(j('.adi_nc_filter_options_out').css('display') != 'none')
				{
					j('.adi_dropdown_text', this).removeClass('adi_dd_reverse');
					j('.adi_nc_filter_options_out').hide();
				}
				else
				{
					j('.adi_dropdown_text', this).addClass('adi_dd_reverse');
					j('.adi_nc_filter_options_out').show();
				}
			});
			j('.adi_nc_select_option_btn').click(function(){
				if(j('.adi_nc_select_options_out').css('display') != 'none')
				{
					j('.adi_dropdown_text', this).removeClass('adi_dd_reverse');
					j('.adi_nc_select_options_out').hide();
				}
				else
				{
					j('.adi_dropdown_text', this).addClass('adi_dd_reverse');
					j('.adi_nc_select_options_out').show();
				}
			});

			j('.adi_nc_filter_opt').click(function(){
				var st = j(this).attr('data');
				j('.adi_nc_curr_filter_opt').html(j(this).html());
				if(adi_ih.last_show_type != st && st != '')
				{
					adi_ih.paginate({page_no: 1, query:'', show_type: st});
				}
				j('.adi_dd_reverse').removeClass('adi_dd_reverse');
				j('.adi_nc_filter_options_out').hide();
			});

			j('.adi_nc_select_opt').click(function(){
				var v = j(this).attr('data');
				j('.adi_nc_curr_select_opt').html(j(this).html());
				j('.adi_nc_selectable').removeAttr('checked');

				adi_ih.select_invitations(v);
				j('.adi_dd_reverse').removeClass('adi_dd_reverse');
				j('.adi_nc_select_options_out').hide();
			});
		},
		'tr':function(){
			var m=this;
			m.sr = j('.adi_redirect_timeout', m.rt).html();
			m.tfun = setInterval(function(){
				m.sr--;
				j('.adi_redirect_timeout', m.rt).html(m.sr);
				if(m.sr <= 0)
				{
					window.location.href = m.red_url;
				}
			},1000);
		}
	};

	// Recaptcha Popup
	a.newPopup('adi_security_check_popup', 'rc', 10, 1, {
		ntr:'rcpp',
		uact:'adi_do=security_check',
		req_on: 0,
		show_err:function(){
			j('#adi_security_failed',this.rt).show();
		},
		set_key:function(k){
			a.scc = k;
			this.hide();
			pp.lg.show();
		}
	});

	// Login Popup
	a.newPopup('adi_main_panel_popup', 'lg', 10, 1, {
		ntr:'lgpp',
		uact:'adi_do=login_form',
		stype:'',cid:'',serv_id:'',
		dt:{adi_share_type:'',adi_content_id:''},
		show:function(){
			if(this.state==3) {this.reset();this._show();}
			else this._show();
		},
		preShow:function(){
			if(a.scc==0) {
				pp.rc.show();
				return false;
			}
		},
		postLoad:function(){
			this.set_defaults();
		},
		postShow:function(){
			this.set_defaults();
		},
		set_defaults:function(){
			var m=this;
			if(m.state >= 3)
			{
				if(pp.sp.state >= 3 && m.serv_id != '' && adi.services[m.serv_id]){
					pp.sp.setKey(m.serv_id);
					m.serv_id='';
				}
				if(m.stype!=''){
					j('.adi_nc_share_type',m.rt).val(m.stype);
					j('.adi_nc_content_id',m.rt).val(m.cid);
				}
			}
		},
		postHide:function(){
			this.stype='';
			this.cid='';
		},
		parse_cf_resp:function(cd){
			adi_sending_effect(j('.adi_nc_contact_file_form',this.rt).get(0),0);
			a.eval(cd);
		}
	});

	// Services Panel
	a.newPopup('adi_service_panel_popup', 'sp', 15, 0, {
		ntr:'sp', bkp:0,
		slist:[], smap:{},
		ldata:function(){
			var w = (adi.ncols*110);
			var tmp = '<div class="adi_popup_inner_space"><div class="adi_nc_services_panel_out" style="width:'+w+'px;">';
			for(var i in adi.services) if(typeof adi.services[i] == 'object')
			{
				this.slist.push(adi.services[i][0][1]);
				this.smap[adi.services[i][0][1]] = i;
				tmp += "\n"+'<div class="adi_nc_service_select_out" data="'+i+'"><div class="adi_nc_service_select adi_serv_'+i+'"><div class="adi_service_select_name '+i+'_si">'+adi.services[i][0][1]+'</div></div></div>';
			}
			this.slist = ' '+this.slist.join(' ')+' ';
			tmp += '<div class="adi_clear></div></div></div>';
			this.sdata(tmp);
		},
		postLoad:function(){
			var m=this;
			j('.adi_nc_container', this.rt).mousedown(function(e){
				if(j(e.target).hasClass('adi_nc_service_select_out'))
				{
					var el = j(e.target);
				}
				else
				{
					var el = j(e.target).parents('.adi_nc_service_select_out');
				}
				if(el.size())
				{
					sk = el.attr('data');
					m.setKey(sk);
					m.hide();
				}
			});
			pp.lg.set_defaults();
		},
		setKey: function(sk){
			if(sk != '' && a.services[sk])
			{
				var m=this,sinp=j('.adi_nc_service_input', m.rtf);
				if(sinp.val()==adi.phrases['adi_ab_service_field_default_txt'])
				{
					sinp.val('').removeClass('adi_nc_service_note');
				}
				pk=j('.adi_service_key_val',m.rtf).val();
				if(pk!='')
				{
					sinp.removeClass(pk+'_si');
				}
				j('.adi_service_key_val',m.rtf).val(sk);
				var stxt=adi.services[sk][0][1];
				if(sk=='hotmail'){stxt='Outlook, Hotmail, Live, MSN';}
				sinp.addClass(sk+'_si').val(stxt).removeClass('adi_service_input_ltr').addClass('adi_service_input_ltr');
				j('.adi_search_icon', m.rtf).hide();
				if(adi.services[sk][0][2] == 1)
				{
					j('.adi_nc_password_input',m.rtf).hide();
					j('.adi_nc_password_note',m.rtf).show();
					var t = adi.phrases['adi_oauth_service_submit_btn_label'];
					j('.adi_nc_submit_addressbook',m.rtf).val(t.replace(/\[service_name\]/g,adi.services[sk][0][1]));
				}
				else
				{
					j('.adi_nc_password_input',m.rtf).show();
					j('.adi_nc_password_note',m.rtf).hide();
					j('.adi_nc_submit_addressbook',m.rtf).val(adi.phrases['adi_ab_submit_form_btn_text']);
				}
			}
		},
		rtf:null,
		show:function(rt){
			var m=this;
			m._show();
			m.rtf=rt;
			var pos = j('.adi_nc_service_input',m.rtf).offset(),
			pst = pos.top + j('.adi_nc_service_input',m.rtf).height() + 17;
			if(pp.lg && pp.lg.isopen == 1) {
				m.rt.css('position','fixed');
				pst = pst- m.rtf.offset().top;
			}
			else {
				m.rt.css('position','absolute');
			}
			m.rt.css('top', pst+'px');
			var df = parseInt( (j('.adi_nc_container', m.rt).width() - j('.adi_nc_service_input',m.rtf).width() )/2 );
			m.rt.css('left', pos.left - df);
		}
	});

	// Contact File Popup
	a.newPopup('adi_contact_file_popup', 'cf', 20, 1, {
		ntr:'cf',hoc:1,
		uact:'adi_do=contact_file',
	});

	// Supported Formats Popup
	a.newPopup('adi_supported_formats_popup', 'mnf', 25, 1, {
		ntr:'mnf',hoc:1,
		uact:'adi_do=supported_formats',
	});

	// Topic Redirect
	a.newPopup('adi_supported_formats_popup', 'tr', 30, 1, {
		ntr:'tr',hoc:0,
		sr:0,red_url:'',tfun:null,
		uact:'adi_do=topic_redirect',
		postHide:function(){
			if(this.tfun != null)
			{
				clearTimeout(this.tfun);
			}
		}
	});

	// Invitation Preview
	a.newPopup('adi_invPreview', 'ip', 30, 2, {
		ntr:'ip',hoc:1,iphtml:'',
		uact:'adi_do=invite_preview',
		preShow:function(){
			var  html = this.iphtml;
			var id = 'adi_invite_preview_iframe';
			var ifrm = document.getElementById(id),bd;
			jQuery('#'+id).width(600);
			jQuery('#'+id).height(400);
			ifrm = (ifrm.contentWindow) ? ifrm.contentWindow : ( (ifrm.contentDocument.document) ? ifrm.contentDocument.document : ifrm.contentDocument);
			ifrm.document.open();
			ifrm.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head> <body style="margin:0px;padding:0px;width:auto;height:auto;font-family:verdana;font-size:13px;">'+html+'</body></html>');
			ifrm.document.close();
			// this.childWin = ifrm;
			var nn = ifrm.document.getElementsByTagName('body')[0];
			var wd = nn.scrollWidth != 0 ? nn.scrollWidth : jQuery(nn).width();
			var ht = nn.scrollHeight != 0 ? nn.scrollHeight : jQuery(nn).height();
			wd = wd != 0 ? wd : jQuery(ifrm.document).width();
			ht = ht != 0 ? ht : jQuery(ifrm.document).height();
			jQuery('#adi_invite_preview_iframe').width(wd);
			jQuery('#adi_invite_preview_iframe').height(ht);

			// adi.call_event('invitation_preview_load');
		},
		postShow:function(){
			var id = 'adi_invite_preview_iframe';
			var ifrm = document.getElementById(id);
			ifrm = (ifrm.contentWindow) ? ifrm.contentWindow : ( (ifrm.contentDocument.document) ? ifrm.contentDocument.document : ifrm.contentDocument);
			var nn = ifrm.document.getElementsByTagName('body')[0];
			var wd = nn.scrollWidth != 0 ? nn.scrollWidth : jQuery(nn).width();
			var ht = nn.scrollHeight != 0 ? nn.scrollHeight : jQuery(nn).height();
			wd = wd != 0 ? wd : jQuery(ifrm.document).width();
			ht = ht != 0 ? ht : jQuery(ifrm.document).height();
			jQuery('#adi_invite_preview_iframe').width(wd);
			jQuery('#adi_invite_preview_iframe').height(ht);
			jQuery('#adi_invite_preview_iframe').css('max-height', jQuery('#adi_mask2').height() - 250);
		}
	});

	// Attachment Popup
	a.newPopup('adi_attachment', 'aa', 35, 2, {
		ntr:'aa',trrt:null,hoc:1,
		uact:'adi_do=attach_note',
		postLoad:function(){
			var m=this;
			j('.adi_attach_note_cancel', m.rtf).click(function(){
				m.hide();
			});
			j('.adi_attach_note_save', m.rtf).click(function(){
				m.trrt && j('.adi_attach_note_txt',m.trrt).val(j('.adi_attach_note_input',m.rtf).val());
				m.hide();
			});
			j('.adi_attach_note_input', m.rtf).keyup(function(){
				m.updateCount();
				return true;
			});
		},
		preShow: function(){
			var m=this;
			m.trrt && j('.adi_attach_note_input',m.rtf).val(j('.adi_attach_note_txt',m.trrt).val());
			m.updateCount();
		},
		updateCount:function(){
			var me=j('.adi_attach_note_input', this.rtf);
			var l = parseInt(j(me).val().length);
			l = isNaN(l) ? 0 : l;
			if(a.anl - l < 0)
			{
				j(me).val(j(me).val().substring(0, a.anl));
				return false;
			}
			j('.adi_nc_attach_note_limit').html((a.anl - l)+'');
			return true;
		}
	});


	/*********************************************************/
	a.conts = {
		init: function(){
			var m=this;
			if(m.fa_enabled)
			{
				m.fa_show_interface();
			}
			else if(m.is_enabled)
			{
				m.is_show_interface();
			}
		},
		fa_html:'',fa_enabled:false,fa_done_ids:[],pp_enabled:false,
		fa_conts:[],fa_conts_html:'',
		fa_show_interface:function(){
			var m=this,plg=pp.lg;
			if(m.fa_enabled)
			{
				j('.adi_nc_popup_container',plg.rt).html(m.fa_html);
				var cont={};
				if(m.fa_conts_html == '')
				{
					if(typeof m.fa_conts == "object") for(var i in m.fa_conts) 
						if(typeof m.fa_conts[i] == "object") for(var k in m.fa_conts[i])
					{
						cont = m.fa_conts[i][k];
						if(typeof cont != 'object')
						{
							continue;
						}
						var html = a.member_html, mfl_html='', t='';
						if(cont[5].length > 0)
						{
							html = a.member_with_mf_html;
							for(var l in cont[5])
							{
								if(m.mutual_friends[cont[5][l]] != undefined)
								{
									t = a.mf_html;
									if(m.pp_enabled == true)
									{
										t = a.mf_with_pp_html;
										t = t.replace(/\[mf_profile_page\]/g, m.mutual_friends[cont[5][l]]['profile_page']);
									}
									t = t.replace(/\[mf_avatar\]/g, m.mutual_friends[cont[5][l]]['avatar']);
									mfl_html += t.replace(/\[mf_username\]/g, m.mutual_friends[cont[5][l]]['username']);
								}
								else { return false; }
							}
							html = html.replace(/\[member_mf_list\]/g, mfl_html);
						}
						html = html.replace(/\[member_userid\]/g,   cont[0]);
						html = html.replace(/\[member_username\]/g, cont[1]);
						html = html.replace(/\[member_email\]/g,    cont[2]);
						html = html.replace(/\[member_name\]/g,     cont[3]);
						html = html.replace(/\[member_avatar\]/g,   cont[4]);
						html = html.replace(/\[member_mf_link\]/g,  cont[7]);
						// this.totalCount++;
						if(adi.config['email'] == 1) {
							a.add_to_contact_names(cont[0],(cont[3]).toLowerCase()+' '+(cont[2]).toLowerCase()+' >>>'+cont[0]+'; ');
						} else {
							a.add_to_contact_names(cont[0],(cont[3]).toLowerCase()+' >>>'+cont[0]+'; ');
						}
						m.fa_conts_html += html;
					}
				}
				j('.adi_conts_container',plg.rt).html(m.fa_conts_html);
				plg.ntrf = a.ntrs['fapp'];
				plg.ntrf();
				if(m.fa_done_ids && m.fa_done_ids.length && m.fa_done_ids.length > 0)
				{
					for(var i in m.fa_done_ids)
					{
						var t = m.fa_done_ids[i];
						j('.adi_contact_'+t, plg.rt).remove();
					}
					if(j('.adi_contact',plg.rt).size() == 0)
					{
						m.fa_enabled = false;
						if(m.is_enabled){m.is_show_interface();}
					}
				}
			}
		},

		is_html:'',is_enabled:0, is_conts:[],
		is_conts:[],is_conts_html:'',
		is_show_interface:function(){
			var m=this,plg=pp.lg;
			if(m.is_enabled)
			{
				j('.adi_ip_mf_out').hide();
				j('.adi_nc_popup_container',plg.rt).html(m.is_html);
				var cont={};
				if(m.is_conts_html == '')
				{
					var cont={};
					var html = '';
					if(a.config['email'] == 1) {
						html = (adi.config['avatar'] == 1) ? a.email_avatar_html : a.email_html;
					}
					else {
						html = (adi.config['avatar'] == 1) ? a.social_avatar_html : a.social_html;
					}
					m.totalCount=0;
					if(typeof m.is_conts == "object") for(var i in m.is_conts)
					if(typeof m.is_conts[i] == "object") for(var k in m.is_conts[i])
					{
						cont = m.is_conts[i][k];
						cont[1] = a.parseName(cont[1]);
						m.totalCount++;
						if(adi.config['email'] == 1) {
							a.add_to_contact_names(m.totalCount, cont[2].toLowerCase()+' '+cont[0].toLowerCase()+' >>>'+m.totalCount+'; ');
						}
						else {
							a.add_to_contact_names(m.totalCount, cont[2].toLowerCase()+' >>>'+m.totalCount+'; ');
						}
						var t = html;
						t = t.replace(/\[contact_email\]/g,     cont[0]);
						t = t.replace(/\[contact_social_id\]/g, cont[1]);
						t = t.replace(/\[contact_name\]/g,      cont[2]);
						t = t.replace(/\[contact_avatar\]/g,    cont[3]);
						t = t.replace(/\[contact_status\]/g,    cont[4]);
						t = t.replace(/\[div_css_class\]/g,     cont[5]);
						t = t.replace(/\[contact_div_id\]/g,    'adi_contact_'+m.totalCount);
						m.is_conts_html += t;
					}
				}
				j('.adi_conts_container',plg.rt).html(m.is_conts_html);
				plg.ntrf = a.ntrs['ispp'];
				plg.ntrf();
			}
		}
	};


	return a;
})(jQuery,adi,adipps,adintrs,adiconts);


jQuery(document).ready(function(){
	adi.init();
	jQuery('.adi_open_popup_model').click(function(){
		var st = jQuery(this).attr('adi_share_type') || '';
		var ci = jQuery(this).attr('adi_content_id') || '';
		var si = jQuery(this).attr('adi_service_id') || '';
		if(st!='')
		{
			adipps.lg.stype = st;
			adipps.lg.cid = ci
		}
		if(si!='' && adi.services[si])
		{
			adipps.lg.serv_id = si;
		}
		adipps.lg.show();
		return false;
	});
});


function adi_open_oauth(sk)
{
	var w = 750, h = 492;
	var pageURL = adi.ajaxUrl('adi_do=oauth_login&adi_s=start&adi_service='+sk);
	var title = adi.phrases['adi_oauth_service_submit_btn_label'] || '';
	title = title.replace(/\[service_name\]/g, adi.services[sk][0][1]);
	var left = (jQuery(window).width()/2)-(w/2);
	var top = (jQuery(window).height()/2)-(h/2);
	left += window.screenLeft;
	top += window.screenTop + 70;
	return window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}


function adi_sending_effect(frm,set)
{
	set = set || 0;
	frm=jQuery(frm);
	if(set == 1)
	{
		jQuery('.adi_nc_submit_effect', frm).show();
		jQuery('.adi_nc_submit_action', frm).hide();
	}
	else
	{
		jQuery('.adi_nc_submit_effect', frm).hide();
		jQuery('.adi_nc_submit_action', frm).show();
	}
}


/*******************/
adi.add_to_contact_names = function(c,n){
	this.cns += n;
};
/*******************/


var adi_ih = {
	cur_stream: undefined,
	last_page_no: 1,
	getDataURL: function(act){
		if(act != undefined)
			return adi.aurl + 'adi_invite_history.php?' + act;
		else 
			return adi.aurl + 'adi_invite_history.php';
	},
	show_err: function(err){
		if(err != '')
		{
			jQuery('.adi_inpage_error_out').show();
			jQuery('.adi_inpage_error_msg').html(err);
		}
	},
	hide_err: function(){

	},
	last_show_type: 'all',
	last_select_type: 'none',
	set_invite_history: function(){
		jQuery(document).ready(function(){
			jQuery(document).click(function(e){
				var tr = jQuery(e.target);
				if(!tr.hasClass('adi_dropdown_list_out') && tr.parents('.adi_dropdown_list_out').size() == 0 && tr.parents('.adi_dropdown').size() == 0 && !tr.hasClass('adi_dropdown'))
				{
					jQuery('.adi_dropdown_list_out').hide();
					jQuery('.adi_dropdown_text').removeClass('adi_dd_reverse');
				}
			});
		});
		jQuery(".adi_nc_paginate_form").submit(function(){
			return false;
		});
		jQuery('.adi_nc_filter_option_btn').click(function(){
			if(jQuery('.adi_nc_filter_options_out').css('display') != 'none')
			{
				jQuery('.adi_dropdown_text', this).removeClass('adi_dd_reverse');
				jQuery('.adi_nc_filter_options_out').hide();
			}
			else
			{
				jQuery('.adi_dropdown_text', this).addClass('adi_dd_reverse');
				jQuery('.adi_nc_filter_options_out').show();
			}
		});
		jQuery('.adi_nc_select_option_btn').click(function(){
			if(jQuery('.adi_nc_select_options_out').css('display') != 'none')
			{
				jQuery('.adi_dropdown_text', this).removeClass('adi_dd_reverse');
				jQuery('.adi_nc_select_options_out').hide();
			}
			else
			{
				jQuery('.adi_dropdown_text', this).addClass('adi_dd_reverse');
				jQuery('.adi_nc_select_options_out').show();
			}
		});

		jQuery('.adi_nc_filter_opt').click(function(){
			var st = jQuery(this).attr('data');
			jQuery('.adi_nc_curr_filter_opt').html(jQuery(this).html());
			if(adi_ih.last_show_type != st && st != '')
			{
				adi_ih.paginate({page_no: 1, query:'', show_type: st});
			}
			jQuery('.adi_dd_reverse').removeClass('adi_dd_reverse');
			jQuery('.adi_nc_filter_options_out').hide();
		});

		jQuery('.adi_nc_select_opt').click(function(){
			var v = jQuery(this).attr('data');
			jQuery('.adi_nc_curr_select_opt').html(jQuery(this).html());
			jQuery('.adi_nc_selectable').removeAttr('checked');

			adi_ih.select_invitations(v);
			jQuery('.adi_dd_reverse').removeClass('adi_dd_reverse');
			jQuery('.adi_nc_select_options_out').hide();
		});

		adi_ih.set_invite_table();
	},
	select_invitations: function(st)
	{
		jQuery('.adi_nc_selectable').removeAttr('checked');
		switch(st)
		{
			case 'all': 
				jQuery('.adi_nc_selectable').attr('checked','checked'); break;
			case 'none': 
				jQuery('.adi_nc_selectable').removeAttr('checked'); break;
			case 'blocked': 
				jQuery('.adi_nc_select_blocked').attr('checked','checked'); break;
			case 'accepted': 
				jQuery('.adi_nc_select_accepted').attr('checked','checked'); break;
			case 'invited': 
				jQuery('.adi_nc_select_invited').attr('checked','checked'); break;
		}
		adi_ih.check_selected();
		this.last_select_type = st;
	},
	paginate: function(dt){
		dt['adi_do'] = 'paginate';
		dt['show_type'] = st = (dt['show_type'] == undefined) ? this.last_show_type : dt['show_type'],
		dt['page_no'] = pn = (dt['page_no'] == undefined) ? 1 : dt['page_no'];
		if(!(this.last_page_no == pn && this.last_show_type == st))
		{
			if(this.cur_stream != undefined)
			{
				this.cur_stream.abort();
				jQuery('.adi_nc_invites_table_out').css('opacity', '1');
			}
			this.last_page_no   = pn;
			this.last_show_type = st;
			jQuery('.adi_nc_invites_table_out').css('opacity', '0.7');
			this.cur_stream = jQuery.ajax({
				type: 'POST',
				url: adi_ih.getDataURL(),
				data: dt,
				success: function (data)
				{
					jQuery('.adi_nc_invites_table_out').html(data);
					jQuery('.adi_nc_invites_table_out').css('opacity', '1');
					adi_ih.set_invite_table();
					adi_ih.cur_stream = undefined;
					adi_ih.select_invitations(adi_ih.last_select_type);
				},
				error : function(d) {
					jQuery('.adi_nc_invites_table_out').css('opacity', '1');
				},
				dataType: 'html'
			});
		}
	},
	last_ind: undefined,
	set_invite_table: function(){
		jQuery('.adi_ih_select_all').click(function(){
			if(jQuery(this).attr('checked') != 'checked' && jQuery(this).attr('checked') != true)
			{
				jQuery('.adi_nc_selectable').removeAttr('checked');
			}
			else
			{
				jQuery('.adi_nc_selectable').attr('checked', 'checked');
			}
			adi_ih.check_selected();
			return true;
		});
		jQuery('.adi_do_paginate').click(function(){
			var pn = parseInt(jQuery(this).attr('data'));
			if(!isNaN(pn)) {
				adi_ih.paginate({page_no: pn});
			}
		});
		jQuery('.adi_nc_selectable').click(function(e){
			jQuery('.adi_nc_curr_select_opt').html('Custom');
			var cur_ind = jQuery(this).attr('data');
			if(e.shiftKey && adi_ih.last_ind != undefined)
			{
				var mn = Math.min(adi_ih.last_ind, cur_ind),mx = Math.max(adi_ih.last_ind, cur_ind);
				jQuery('.adi_nc_selectable').each(function(i,c){
					var md = jQuery(c).attr('data')
					if(md >= mn && md <= mx && jQuery(this).attr('checked') != 'checked' && jQuery(this).attr('checked') != true)
					{
						jQuery(c).attr('checked', 'checked');
					}
				});
			}
			adi_ih.last_ind = cur_ind;
			adi_ih.check_selected();
		});

		jQuery('.adi_delete_selected').click(function(){
			ch = true;
			jQuery('.adi_nc_selectable').each(function(){
				if(this.checked == true)
				{
					ch = true;
				}
			});
			if(ch == true)
			{
				if(confirm(adi.phrases['adi_acknowledgement_message_before_delete_inv']))
				{
					jQuery('.adi_nc_invites_table_out').css('opacity', '0.7');
					jQuery.ajax({
						type: 'POST',
						url: adi_ih.getDataURL(),
						data: jQuery('.adi_nc_paginate_form').serialize()+'&adi_do=delete_invites',
						success: function (data)
						{
							var st = adi_ih.last_show_type, pg = adi_ih.last_page_no;
							adi_ih.last_page_no = 0; adi_ih.last_show_type = '';
							adi_ih.paginate({show_type: st, page_no: pg});
						},
						error : function(d) { 
							jQuery('.adi_nc_invites_table_out').css('opacity', '1');
						},
						dataType: 'html'
					});
				}
			}
		});
	},
	fcheck: false,
	echeck: false,
	check_selected: function(){
		// var sa=false, snyj=false, sb=false, se=false,
		this.fcheck = false;
		this.echeck = false;
		jQuery('.adi_nc_selectable').each(function(){
			if(this.checked == true) 
			{
				adi_ih.fcheck = this.checked || adi_ih.fcheck;
			}
			else {
				adi_ih.echeck = true;
			}
		});
		if(adi_ih.fcheck) {
			jQuery('.adi_delete_selected').css('visibility', 'visible');
		}
		else {
			jQuery('.adi_delete_selected').css('visibility', 'hidden');
		}
		if(adi_ih.echeck)
		{
			jQuery('.adi_ih_select_all').removeAttr('checked');
		}
		else {
			jQuery('.adi_ih_select_all').attr('checked','checked');
		}
	}
};

var adi_oauth_resp = {
	respond: function(msg)
	{
		console.log('Responding...');
		if(typeof msg == 'string' && msg != '1')
		{
			if(adipps.lg.isopen == true)
			{
				adi.show_pp_err(msg);
			}
			else
			{
				adi.show_ip_err(msg);
			}
		}
		else if(parseInt(msg) == 1)
		{
			if(adipps.lg.isopen == true)
			{
				adipps.lg.oauth_submit = true;
				var frm = jQuery('.adi_nc_oauth_submit_form',adipps.lg.rt);
				adi_sending_effect(frm.get(0),0);
				jQuery('.adi_oauth_submit',frm).val(1);
				// adi.login_form.common_send_effect('.adi_nc_submit_addressbook');
				jQuery('.adi_nc_oauth_submit_form',adipps.lg.rt).submit();
			}
			else
			{
				var frm = jQuery('.adi_nc_oauth_submit_form',adintrs.lgip.rt);
				adi_sending_effect(frm.get(0),0);
				jQuery('.adi_oauth_submit',frm).val(1);
				jQuery('.adi_nc_oauth_submit_form', adintrs.lgip.rt).submit();
			}
		}
	}
};

