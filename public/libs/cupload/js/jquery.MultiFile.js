window.jQuery&&function(a){a.fn.MultiFile=function(b){if(0==this.length)return this;if("string"==typeof arguments[0]){if(this.length>1){var c=arguments;return this.each(function(){a.fn.MultiFile.apply(a(this),c)})}return a.fn.MultiFile[arguments[0]].apply(this,a.makeArray(arguments).slice(1)||[]),this}var b=a.extend({},a.fn.MultiFile.options,b||{});a("form").not("MultiFile-intercepted").addClass("MultiFile-intercepted").submit(a.fn.MultiFile.disableEmpty),a.fn.MultiFile.options.autoIntercept&&(a.fn.MultiFile.intercept(a.fn.MultiFile.options.autoIntercept),a.fn.MultiFile.options.autoIntercept=null),this.not(".MultiFile-applied").addClass("MultiFile-applied").each(function(){window.MultiFile=(window.MultiFile||0)+1;var c=window.MultiFile,d={e:this,E:a(this),clone:a(this).clone()};"number"==typeof b&&(b={max:b});var e=a.extend({},a.fn.MultiFile.options,b||{},(a.metadata?d.E.metadata():a.meta?d.E.data():null)||{},{});e.max>0||(e.max=d.E.attr("maxlength")),e.max>0||(e.max=(String(d.e.className.match(/\b(max|limit)\-([0-9]+)\b/gi)||[""]).match(/[0-9]+/gi)||[""])[0],e.max>0?e.max=String(e.max).match(/[0-9]+/gi)[0]:e.max=-1),e.max=new Number(e.max),e.accept=e.accept||d.E.attr("accept")||"",e.accept||(e.accept=d.e.className.match(/\b(accept\-[\w\|]+)\b/gi)||"",e.accept=new String(e.accept).replace(/^(accept|ext)\-/i,"")),a.extend(d,e||{}),d.STRING=a.extend({},a.fn.MultiFile.options.STRING,d.STRING),a.extend(d,{n:0,slaves:[],files:[],instanceKey:d.e.id||"MultiFile"+String(c),generateID:function(a){return d.instanceKey+(a>0?"_F"+String(a):"")},trigger:function(b,c){var e=d[b],f=a(c).attr("value");if(e){var g=e(c,f,d);if(null!=g)return g}return!0}}),String(d.accept).length>1&&(d.accept=d.accept.replace(/\W+/g,"|").replace(/^\W|\W$/g,""),d.rxAccept=new RegExp("\\.("+(d.accept?d.accept:"")+")$","gi")),d.wrapID=d.instanceKey+"_wrap",d.E.wrap('<div class="MultiFile-wrap" id="'+d.wrapID+'"></div>'),d.wrapper=a("#"+d.wrapID),d.e.name=d.e.name||"file"+c+"[]",d.list||(d.wrapper.append('<div class="MultiFile-list" id="'+d.wrapID+'_list"></div>'),d.list=a("#"+d.wrapID+"_list")),d.list=a(d.list),d.addSlave=function(b,e){d.n++,b.MultiFile=d,e>0&&(b.id=b.name=""),e>0&&(b.id=d.generateID(e)),b.name=String(d.namePattern.replace(/\$name/gi,a(d.clone).attr("name")).replace(/\$id/gi,a(d.clone).attr("id")).replace(/\$g/gi,c).replace(/\$i/gi,e)),d.max>0&&d.n-1>d.max&&(b.disabled=!0),d.current=d.slaves[e]=b,b=a(b),b.val("").attr("value","")[0].value="",b.addClass("MultiFile-applied"),b.change(function(){if(a(this).blur(),!d.trigger("onFileSelect",this,d))return!1;var c="",f=String(this.value||"");d.accept&&f&&!f.match(d.rxAccept)&&(c=d.STRING.denied.replace("$ext",String(f.match(/\.\w{1,4}$/gi))));for(var g in d.slaves)d.slaves[g]&&d.slaves[g]!=this&&d.slaves[g].value==f&&(c=d.STRING.duplicate.replace("$file",f.match(/[^\/\\]+$/gi)));var h=a(d.clone).clone();return h.addClass("MultiFile"),""!=c?(d.error(c),d.n--,d.addSlave(h[0],e),b.parent().prepend(h),b.remove(),!1):(a(this).css({position:"absolute",top:"-3000px"}),b.after(h),d.addToList(this,e),d.addSlave(h[0],e+1),!!d.trigger("afterFileSelect",this,d)&&void 0)}),a(b).data("MultiFile",d)},d.addToList=function(b,c){if(!d.trigger("onFileAppend",b,d))return!1;var e=a('<div class="MultiFile-label"></div>'),f=String(b.value||""),g=a('<span class="MultiFile-title" title="'+d.STRING.selected.replace("$file",f)+'">'+d.STRING.file.replace("$file",f.match(/[^\/\\]+$/gi)[0])+"</span>"),h=a('<a class="MultiFile-remove" href="#'+d.wrapID+'">'+d.STRING.remove+"</a>");return d.list.append(e.append(h," ",g)),h.click(function(){return!!d.trigger("onFileRemove",b,d)&&(d.n--,d.current.disabled=!1,d.slaves[c]=null,a(b).remove(),a(this).parent().remove(),a(d.current).css({position:"",top:""}),a(d.current).reset().val("").attr("value","")[0].value="",d.trigger("afterFileRemove",b,d),!1)}),!!d.trigger("afterFileAppend",b,d)&&void 0},d.MultiFile||d.addSlave(d.e,0),d.n++,d.E.data("MultiFile",d)})},a.extend(a.fn.MultiFile,{reset:function(){var b=a(this).data("MultiFile");return b&&b.list.find("a.MultiFile-remove").click(),a(this)},disableEmpty:function(b){b=("string"==typeof b?b:"")||"mfD";var c=[];return a("input:file.MultiFile").each(function(){""==a(this).val()&&(c[c.length]=this)}),a(c).each(function(){this.disabled=!0}).addClass(b)},reEnableEmpty:function(b){return b=("string"==typeof b?b:"")||"mfD",a("input:file."+b).removeClass(b).each(function(){this.disabled=!1})},intercepted:{},intercept:function(b,c,d){var e,f;if(d=d||[],d.constructor.toString().indexOf("Array")<0&&(d=[d]),"function"==typeof b)return a.fn.MultiFile.disableEmpty(),f=b.apply(c||window,d),setTimeout(function(){a.fn.MultiFile.reEnableEmpty()},1e3),f;b.constructor.toString().indexOf("Array")<0&&(b=[b]);for(var g=0;g<b.length;g++)(e=b[g]+"")&&function(b){a.fn.MultiFile.intercepted[b]=a.fn[b]||function(){},a.fn[b]=function(){return a.fn.MultiFile.disableEmpty(),f=a.fn.MultiFile.intercepted[b].apply(this,arguments),setTimeout(function(){a.fn.MultiFile.reEnableEmpty()},1e3),f}}(e)}}),a.fn.MultiFile.options={accept:"",max:-1,namePattern:"$name",STRING:{remove:'<img src="assets/images/deletefile.png" alt="" border="0">',denied:"You cannot select a $ext file.\nTry again...",file:"$file",selected:"File selected: $file",duplicate:"This file has already been selected:\n$file"},autoIntercept:["submit","ajaxSubmit","ajaxForm","validate","valid"],error:function(a){alert(a)}},a.fn.reset=function(){return this.each(function(){try{this.reset()}catch(a){}})},a(function(){a("input[type=file].multi").MultiFile()})}(jQuery);