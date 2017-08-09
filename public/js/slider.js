/********************************************
 * REVOLUTION 5.0 EXTENSION - KEN BURN
 * @version: 1.0.0 (03.08.2015)
 * @requires jquery.themepunch.revolution.js
 * @author ThemePunch
*********************************************/

(function($) {

var _R = jQuery.fn.revolution;

///////////////////////////////////////////
// 	EXTENDED FUNCTIONS AVAILABLE GLOBAL  //
///////////////////////////////////////////
jQuery.extend(true,_R, {

	stopKenBurn : function(l) {			
		if (l.data('kbtl')!=undefined)			
		l.data('kbtl').pause();				
	},

	startKenBurn :  function(l,opt,prgs) {			
		var d = l.data(),
			i = l.find('.defaultimg'),
			s = i.data('lazyload') || i.data('src'),
			i_a = d.owidth / d.oheight,
			cw = opt.sliderType==="carousel" ?  opt.carousel.slide_width : opt.ul.width(),
			ch = opt.ul.height(),
			c_a = cw / ch;

		
		if (l.data('kbtl'))
			l.data('kbtl').kill();
		

		prgs = prgs || 0;



		
		// NO KEN BURN IMAGE EXIST YET
		if (l.find('.tp-kbimg').length==0) {
			l.append('<div class="tp-kbimg-wrap" style="z-index:2;width:100%;height:100%;top:0px;left:0px;position:absolute;"><img class="tp-kbimg" src="'+s+'" style="position:absolute;" width="'+d.owidth+'" height="'+d.oheight+'"></div>');
			l.data('kenburn',l.find('.tp-kbimg'));
		}

		var getKBSides = function(w,h,f,cw,ch,ho,vo) {			
					var tw = w * f,
						th = h * f,
						hd = Math.abs(cw-tw),
						vd = Math.abs(ch-th),
						s = new Object();
					s.l = (0-ho)*hd;
					s.r = s.l + tw;			
					s.t = (0-vo)*vd;
					s.b = s.t + th;	
					s.h = ho;
					s.v = vo;
					return s;
				},

			getKBCorners = function(d,cw,ch,ofs,o) {

				var p = d.bgposition.split(" ") || "center center",
					ho = p[0] == "center"  ? "50%" : p[0] == "left" || p [1] == "left" ? "0%" : p[0]=="right" || p[1] =="right" ? "100%" : p[0],
					vo = p[1] == "center" ? "50%" : p[0] == "top" || p [1] == "top" ? "0%" : p[0]=="bottom" || p[1] =="bottom" ? "100%" : p[1];
				
				ho = parseInt(ho,0)/100 || 0;
				vo = parseInt(vo,0)/100 || 0;


				var sides = new Object();


				sides.start = getKBSides(o.start.width,o.start.height,o.start.scale,cw,ch,ho,vo);
				sides.end = getKBSides(o.start.width,o.start.height,o.end.scale,cw,ch,ho,vo);
							
				return sides;	
			},

			kcalcL = function(cw,ch,d) {				
				var f=d.scalestart/100,
					fe=d.scaleend/100,
					ofs = d.oofsetstart != undefined ? d.offsetstart.split(" ") || [0,0] : [0,0],
					ofe = d.offsetend != undefined ? d.offsetend.split(" ") || [0,0] : [0,0];
				d.bgposition = d.bgposition == "center center" ? "50% 50%" : d.bgposition;
				
				
				var o = new Object(),
					sw = cw*f,
					sh = sw/d.owidth * d.oheight,
					ew = cw*fe,
					eh = ew/d.owidth * d.oheight;		


				
				o.start = new Object();		
				o.starto = new Object();
				o.end = new Object();
				o.endo = new Object();
				
				o.start.width = cw;
				o.start.height = o.start.width / d.owidth * d.oheight;		

				if (o.start.height<ch) {
					var newf = ch / o.start.height;
					o.start.height = ch;
					o.start.width = o.start.width*newf;
				}
				o.start.transformOrigin = d.bgposition;					
				o.start.scale = f;	
				o.end.scale = fe;

				o.start.rotation = d.rotatestart+"deg";
				o.end.rotation = d.rotateend+"deg";		
				
				// MAKE SURE THAT OFFSETS ARE NOT TOO HIGH
				var c = getKBCorners(d,cw,ch,ofs,o);


				ofs[0] = parseFloat(ofs[0]) + c.start.l;
				ofe[0] = parseFloat(ofe[0]) + c.end.l;
				
				ofs[1] = parseFloat(ofs[1]) + c.start.t;			
				ofe[1] = parseFloat(ofe[1]) + c.end.t;
					
				var iws = c.start.r - c.start.l,
					ihs	= c.start.b - c.start.t,
					iwe = c.end.r - c.end.l,
					ihe	= c.end.b - c.end.t;
						
				ofs[0] = ofs[0]>0 ? 0 : iws + ofs[0] < cw ? cw-iws : ofs[0];
				ofe[0] = ofe[0]>0 ? 0 : iwe + ofe[0] < cw ? cw-iwe : ofe[0];
				
				ofs[1] = ofs[1]>0 ? 0 : ihs + ofs[1] < ch ? ch-ihs : ofs[1];
				ofe[1] = ofe[1]>0 ? 0 : ihe + ofe[1] < ch ? ch-ihe : ofe[1];

				

				o.starto.x = ofs[0]+"px";
				o.starto.y = ofs[1]+"px";
				o.endo.x = ofe[0]+"px";
				o.endo.y = ofe[1]+"px";				
				o.end.ease = o.endo.ease = d.ease;
				o.end.force3D = o.endo.force3D = true;
				return o;
			};
		
		if (l.data('kbtl')!=undefined) {
			l.data('kbtl').kill();
			l.removeData('kbtl');
		}

		var k = l.data('kenburn'),
			kw = k.parent(),
			anim = kcalcL(cw,ch,d),
			kbtl =  new punchgs.TimelineLite();
		
		
		kbtl.pause();
		
		anim.start.transformOrigin = "0% 0%";
		anim.starto.transformOrigin = "0% 0%";	

		kbtl.add(punchgs.TweenLite.fromTo(k,d.duration/1000,anim.start,anim.end),0);
		kbtl.add(punchgs.TweenLite.fromTo(kw,d.duration/1000,anim.starto,anim.endo),0);
			
		kbtl.progress(prgs);
		kbtl.play();	
		
		l.data('kbtl',kbtl);														
	}		
});

})(jQuery);
/********************************************
 * REVOLUTION 5.1.6 EXTENSION - PARALLAX
 * @version: 1.4 (10.03.2016)
 * @requires jquery.themepunch.revolution.js
 * @author ThemePunch
*********************************************/
(function($) {

var _R = jQuery.fn.revolution,
	_ISM = _R.is_mobile();

jQuery.extend(true,_R, {	
	/*callStaticDDDParallax: function(container,opt,li) {
		// STATIC 3D PARALLAX MOVEMENTS
	    if (opt.parallax && (opt.parallax.ddd_path=="static" || opt.parallax.ddd_path=="both")) {
			var coo = {},
				path = li.data('3dpath');
			coo.li = li;
			if (path.split(',').length>1) {
				coo.h = parseInt(path.split(',')[0],0);
				coo.v = parseInt(path.split(',')[1],0);				
				container.trigger('trigger3dpath',coo);
			}		
		}
	},*/

	checkForParallax : function(container,opt) {
		
		var _ = opt.parallax;

		if (_ISM && _.disable_onmobile=="on") return false;

		if (_.type=="3D" || _.type=="3d") {			
			punchgs.TweenLite.set(opt.c,{overflow:_.ddd_overflow});
			punchgs.TweenLite.set(opt.ul,{overflow:_.ddd_overflow});		
			if (opt.sliderType!="carousel" && _.ddd_shadow=="on") {
				opt.c.prepend('<div class="dddwrappershadow"></div>')
				punchgs.TweenLite.set(opt.c.find('.dddwrappershadow'),{force3D:"auto",transformPerspective:1600,transformOrigin:"50% 50%", width:"100%",height:"100%",position:"absolute",top:0,left:0,zIndex:0});			
			}
		}
		
		function setDDDInContainer(li) {
			if (_.type=="3D" || _.type=="3d") {
				li.find('.slotholder').wrapAll('<div class="dddwrapper" style="width:100%;height:100%;position:absolute;top:0px;left:0px;overflow:hidden"></div>');				
				li.find('.tp-parallax-wrap').wrapAll('<div class="dddwrapper-layer" style="width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:5;overflow:'+_.ddd_layer_overflow+';"></div>');				

				// MOVE THE REMOVED 3D LAYERS OUT OF THE PARALLAX GROUP					
				li.find('.rs-parallaxlevel-tobggroup').closest('.tp-parallax-wrap').wrapAll('<div class="dddwrapper-layertobggroup" style="position:absolute;top:0px;left:0px;z-index:50;width:100%;height:100%"></div>');

				var dddw = li.find('.dddwrapper'),
					dddwl = li.find('.dddwrapper-layer'),
					dddwlbg = li.find('.dddwrapper-layertobggroup');

				

				dddwlbg.appendTo(dddw);
								
				if (opt.sliderType=="carousel") {
					 if (_.ddd_shadow=="on") dddw.addClass("dddwrappershadow");					 
					 punchgs.TweenLite.set(dddw,{borderRadius:opt.carousel.border_radius});
				}
				punchgs.TweenLite.set(li,{overflow:"visible",transformStyle:"preserve-3d",perspective:1600});
				punchgs.TweenLite.set(dddw,{force3D:"auto",transformOrigin:"50% 50%"});					
				punchgs.TweenLite.set(dddwl,{force3D:"auto",transformOrigin:"50% 50%",zIndex:5});					
				punchgs.TweenLite.set(opt.ul,{transformStyle:"preserve-3d",transformPerspective:1600});					
			}
		}

		opt.li.each(function() {
			setDDDInContainer(jQuery(this));						
		});

		if (_.type=="3D" || _.type=="3d" && opt.c.find('.tp-static-layers').length>0) {
			punchgs.TweenLite.set(opt.c.find('.tp-static-layers'),{top:0, left:0,width:"100%",height:"100%"});
			setDDDInContainer(opt.c.find('.tp-static-layers'));
		}

		for (var i = 1; i<=_.levels.length;i++)				
			opt.c.find('.rs-parallaxlevel-'+i).each(function() {					
				var pw = jQuery(this),
					tpw = pw.closest('.tp-parallax-wrap');												
				tpw.data('parallaxlevel',_.levels[i-1])
				tpw.addClass("tp-parallax-container");								
			});		

		
		if (_.type=="mouse" || _.type=="scroll+mouse" || _.type=="mouse+scroll" || _.type=="3D" || _.type=="3d") {
		
			container.mouseenter(function(event) {
				var currslide = container.find('.active-revslide'),
					t = container.offset().top,
					l = container.offset().left,
					ex = (event.pageX-l),
					ey =  (event.pageY-t);
				currslide.data("enterx",ex);
				currslide.data("entery",ey);
			});

			container.on('mousemove.hoverdir, mouseleave.hoverdir, trigger3dpath',function(event,data) {				
				var currslide = data && data.li ? data.li : container.find('.active-revslide');

				
				// CALCULATE DISTANCES
				if (_.origo=="enterpoint") {
					var	t = container.offset().top,
						l = container.offset().left;

					if (currslide.data("enterx")==undefined) currslide.data("enterx",(event.pageX-l));
					if (currslide.data("entery")==undefined) currslide.data("entery",(event.pageY-t));										

					var mh = currslide.data("enterx") || (event.pageX-l),
						mv = currslide.data("entery") || (event.pageY-t),
						diffh = (mh - (event.pageX - l)),
						diffv = (mv - (event.pageY - t)),
						s = _.speed/1000 || 0.4;
				} else {
					var	t = container.offset().top,
						l = container.offset().left,
						diffh = (opt.conw/2 - (event.pageX-l)),
						diffv = (opt.conh/2 - (event.pageY-t)),
						s = _.speed/1000 || 3;
				}
								
				/*if (event.type=="trigger3dpath") {
					diffh = data.h;
					diffv = data.v;					
					_.ddd_lasth = diffh;
					_.ddd_lastv = diffv;
				}*/

				if (event.type=="mouseleave") {
					diffh = _.ddd_lasth || 0;
					diffv = _.ddd_lastv || 0;
					s = 1.5;									
				}

				/*if (_.ddd_path=="static") {
					diffh = _.ddd_lasth || 0;
					diffv = _.ddd_lastv || 0;							
				}*/
				var pcnts = [];
				currslide.find(".tp-parallax-container").each(function(i){					
					pcnts.push(jQuery(this));
				});
				container.find('.tp-static-layers .tp-parallax-container').each(function(){
					pcnts.push(jQuery(this));
				});
				
				jQuery.each(pcnts, function() {
					var pc = jQuery(this),
						bl = parseInt(pc.data('parallaxlevel'),0),
						pl = _.type=="3D" || _.type=="3d" ? bl/200 : bl/100,
						offsh =	 diffh * pl,
						offsv =	 diffv * pl;		
						if (_.type=="scroll+mouse" || _.type=="mouse+scroll" ) 
							punchgs.TweenLite.to(pc,s,{force3D:"auto",x:offsh,ease:punchgs.Power3.easeOut,overwrite:"all"});
						else
							punchgs.TweenLite.to(pc,s,{force3D:"auto",x:offsh,y:offsv,ease:punchgs.Power3.easeOut,overwrite:"all"});
				});

				if (_.type=="3D" || _.type=="3d") {
					var sctor = '.tp-revslider-slidesli .dddwrapper, .dddwrappershadow, .tp-revslider-slidesli .dddwrapper-layer, .tp-static-layers .dddwrapper-layer';
					if (opt.sliderType==="carousel") sctor = ".tp-revslider-slidesli .dddwrapper, .tp-revslider-slidesli .dddwrapper-layer, .tp-static-layers .dddwrapper-layer";
					opt.c.find(sctor).each(function() {										
						var t = jQuery(this),
							pl = _.levels[_.levels.length-1]/200,										
							offsh =	diffh * pl,
							offsv =	diffv * pl,
							offrv = opt.conw == 0 ? 0 :  Math.round((diffh / opt.conw * pl)*100) || 0,
							offrh = opt.conh == 0 ? 0 : Math.round((diffv / opt.conh * pl)*100) || 0,										
							li = t.closest('li'),
							zz = 0,
							itslayer = false;

							if (t.hasClass("dddwrapper-layer")) {
								zz = _.ddd_z_correction || 65;
								itslayer = true;
							}

						if (t.hasClass("dddwrapper-layer")) {
							offsh=0;
							offsv=0;
						}
												
						if (li.hasClass("active-revslide") || opt.sliderType!="carousel")
							if (_.ddd_bgfreeze!="on" || (itslayer))								
								punchgs.TweenLite.to(t,s,{rotationX:offrh, rotationY:-offrv, x:offsh, z:zz,y:offsv,ease:punchgs.Power3.easeOut,overwrite:"all"});								  	
							else 								
								punchgs.TweenLite.to(t,0.5,{force3D:"auto",rotationY:0, rotationX:0, z:0,ease:punchgs.Power3.easeOut,overwrite:"all"});
						else 
							punchgs.TweenLite.to(t,0.5,{force3D:"auto",rotationY:0,z:0,x:0,y:0, rotationX:0, z:0,ease:punchgs.Power3.easeOut,overwrite:"all"});
																	
						if (event.type=="mouseleave")
						 	punchgs.TweenLite.to(jQuery(this),3.8,{z:0, ease:punchgs.Power3.easeOut});
					});
				}					
			});

			if (_ISM)
				window.ondeviceorientation = function(event) {
					var y = Math.round(event.beta  || 0)-70,
						x = Math.round(event.gamma || 0);

					var currslide = container.find('.active-revslide');

					if (jQuery(window).width() > jQuery(window).height()){
							var xx = x;
							x = y;
							y = xx;
					}

					var cw = container.width(),
						ch = container.height(),
						diffh = (360/cw * x),
				  		diffv = (180/ch * y),
				  		s = _.speed/1000 || 3,				  	
				  		pcnts = [];
					
					currslide.find(".tp-parallax-container").each(function(i){					
						pcnts.push(jQuery(this));
					});
					container.find('.tp-static-layers .tp-parallax-container').each(function(){
						pcnts.push(jQuery(this));
					});

				  	jQuery.each(pcnts, function() {
						var pc = jQuery(this),
							bl = parseInt(pc.data('parallaxlevel'),0),
							pl = bl/100,
							offsh =	 diffh * pl*2,
							offsv =	 diffv * pl*4;									
							punchgs.TweenLite.to(pc,s,{force3D:"auto",x:offsh,y:offsv,ease:punchgs.Power3.easeOut,overwrite:"all"});	
					});
					
					if (_.type=="3D" || _.type=="3d") {
						var sctor = '.tp-revslider-slidesli .dddwrapper, .dddwrappershadow, .tp-revslider-slidesli .dddwrapper-layer, .tp-static-layers .dddwrapper-layer';
						if (opt.sliderType==="carousel") sctor = ".tp-revslider-slidesli .dddwrapper, .tp-revslider-slidesli .dddwrapper-layer, .tp-static-layers .dddwrapper-layer";
						opt.c.find(sctor).each(function() {			
							var t = jQuery(this),
								pl = _.levels[_.levels.length-1]/200
								offsh =	diffh * pl,
								offsv =	diffv * pl*3,
								offrv = opt.conw == 0 ? 0 :  Math.round((diffh / opt.conw * pl)*500) || 0,
								offrh = opt.conh == 0 ? 0 : Math.round((diffv / opt.conh * pl)*700) || 0,
								li = t.closest('li'),
								zz = 0,
								itslayer = false;

							if (t.hasClass("dddwrapper-layer")) {
								zz = _.ddd_z_correction || 65;
								itslayer = true;
							}

							if (t.hasClass("dddwrapper-layer")) {
								offsh=0;
								offsv=0;
							}
												
							if (li.hasClass("active-revslide") || opt.sliderType!="carousel")
								if (_.ddd_bgfreeze!="on" || (itslayer))								
									punchgs.TweenLite.to(t,s,{rotationX:offrh, rotationY:-offrv, x:offsh, z:zz,y:offsv,ease:punchgs.Power3.easeOut,overwrite:"all"});								  	
								else 								
									punchgs.TweenLite.to(t,0.5,{force3D:"auto",rotationY:0, rotationX:0, z:0,ease:punchgs.Power3.easeOut,overwrite:"all"});
							else 
								punchgs.TweenLite.to(t,0.5,{force3D:"auto",rotationY:0,z:0,x:0,y:0, rotationX:0, z:0,ease:punchgs.Power3.easeOut,overwrite:"all"});
																	
							if (event.type=="mouseleave")
							 	punchgs.TweenLite.to(jQuery(this),3.8,{z:0, ease:punchgs.Power3.easeOut});
						});
					}
				}			 
		}
				
		_R.scrollTicker(opt,container);
		

	},
	
	scrollTicker : function(opt,container) {
		var faut;

		if (opt.scrollTicker!=true) {
			opt.scrollTicker = true;		
			if (_ISM) {		
				punchgs.TweenLite.ticker.fps(150);
				punchgs.TweenLite.ticker.addEventListener("tick",function() {_R.scrollHandling(opt);},container,false,1);
			} else {				
				jQuery(window).on('scroll mousewheel DOMMouseScroll', function() {				
					_R.scrollHandling(opt,true);					
				});
			}		
				
		}		
		_R.scrollHandling(opt, true);
	},



	//	-	SET POST OF SCROLL PARALLAX	-
	scrollHandling : function(opt,fromMouse) {	
		
		opt.lastwindowheight = opt.lastwindowheight || jQuery(window).height();

		var t = opt.c.offset().top,
			st = jQuery(window).scrollTop(),					
			b = new Object(),
			_v = opt.viewPort,
			_ = opt.parallax;

		
		if (opt.lastscrolltop==st && !opt.duringslidechange && !fromMouse) return false;
		//if (opt.lastscrolltop==st) return false;

		

		function saveLastScroll(opt,st) {			
			opt.lastscrolltop = st;			
		}
		punchgs.TweenLite.delayedCall(0.2,saveLastScroll,[opt,st]);

		b.top = (t-st);		
		b.h = opt.conh==0 ? opt.c.height() : opt.conh;		
		b.bottom = (t-st) + b.h;

		var proc = b.top<0 || b.h>opt.lastwindowheight ? b.top / b.h : b.bottom>opt.lastwindowheight ? (b.bottom-opt.lastwindowheight) / b.h : 0;
		opt.scrollproc = proc;

		if (_R.callBackHandling)
			_R.callBackHandling(opt,"parallax","start");

		

		if (_v.enable) {
			var area = 1-Math.abs(proc);
			area = area<0 ? 0 : area;
			// To Make sure it is not any more in %			
			if (!jQuery.isNumeric(_v.visible_area))
			 if (_v.visible_area.indexOf('%')!==-1) 
				_v.visible_area = parseInt(_v.visible_area)/100;
			

		 	if (1-_v.visible_area<=area) {
				if (!opt.inviewport) {
					opt.inviewport = true;
					_R.enterInViewPort(opt);
				}
			} else {
				if (opt.inviewport) {
					opt.inviewport = false;
					_R.leaveViewPort(opt);
				}
			}
		}

			
		// SCROLL BASED PARALLAX EFFECT 
		if (_ISM && opt.parallax.disable_onmobile=="on") return false;

		var pt = new punchgs.TimelineLite();
		pt.pause();

		if (_.type!="3d" && _.type!="3D") {
			if (_.type=="scroll" || _.type=="scroll+mouse" || _.type=="mouse+scroll") 
				opt.c.find(".tp-parallax-container").each(function(i) {
					var pc = jQuery(this),
						pl = parseInt(pc.data('parallaxlevel'),0)/100,
						offsv =	proc * -(pl*opt.conh) || 0;
					
					pc.data('parallaxoffset',offsv);					
					pt.add(punchgs.TweenLite.set(pc,{force3D:"auto",y:offsv}),0);
				});		

			opt.c.find('.tp-revslider-slidesli .slotholder, .tp-revslider-slidesli .rs-background-video-layer').each(function() {	
			
				var t = jQuery(this),
					l = t.data('bgparallax') || opt.parallax.bgparallax;				
					l = l == "on" ? 1 : l;						
					if (l!== undefined || l !== "off") {

						var pl = opt.parallax.levels[parseInt(l,0)-1]/100,
						offsv =	proc * -(pl*opt.conh) || 0;		


						if (jQuery.isNumeric(offsv))																					
							pt.add(punchgs.TweenLite.set(t,{position:"absolute",top:"0px",left:"0px",backfaceVisibility:"hidden",force3D:"true",y:offsv+"px"}),0);								
					}
			});
		}

		if (_R.callBackHandling)
			_R.callBackHandling(opt,"parallax","end");		
		
		pt.play(0);
	}
		
});



//// END OF PARALLAX EFFECT	
})(jQuery);