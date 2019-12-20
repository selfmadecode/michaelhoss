




 


























var hp_cookie_path='/';var hp_cookie_expiration=90;var hp_cookie_domain='.hp.com';var hmpg_segments=new Array();var customerSegment;var hmpg_expacc=new Array();var default_expacc=0;var homeReady=false;var _Ck_=new _CK_(hp_cookie_expiration,hp_cookie_path,hp_cookie_domain);function setCk(_name,_value,_duration,_path,_domain){_Ck_.set(_name,_value,_duration,hp_cookie_path,hp_cookie_domain);}
function getCk(_name){_Ck_.get(_name);}
function _CK_(_duration,_path,_domain){this.domain=_domain;this.duration=_duration;this.path=_path;this.exist=function(_n){var sM=document.cookie.match(new RegExp("("+_n+"=[^;]*)(;|$)"));return sM?unescape(sM[1]):null;}
this.get=function(_n){var sR=document.cookie.match(_n+'=(.*?)(;|$)');return sR?unescape(sR[1]):null;}
this.set=function(_name,_value,_duration,_path,_domain,_secure){var duration=(_duration)?_duration:this.duration;var path=(_path)?_path:this.path;var domain=(_domain)?_domain:this.domain;if(duration){var date=new Date();date.setTime(date.getTime()+(duration*24*60*60*1000));var dExpires=date.toGMTString();}
document.cookie=_name+"="+escape(_value)+";expires="+dExpires+((domain)?"; domain="+domain:"")+((path)?"; path="+path:"")};this.del=function(_name,_domain){var domain=(_domain)?_domain:this.domain;var date=new Date();date.setFullYear(date.getYear()-1);document.cookie=_name+"=; expires="+date.toGMTString()+((domain)?"; domain="+domain:"")+((this.path)?"; path="+this.path:"/");}}
function cValidDate(cdate){var camp_date=cdate.split('-');var myDate=new Date();myDate.setFullYear(parseInt(camp_date[0]),parseInt(camp_date[1]-1),parseInt(camp_date[2]));var today=new Date();var diff=myDate-today;diff=Math.round(diff/(1000*60*60*24));if(diff>60)
diff=60;if(myDate>today)
return diff;else
return 0;}
function geturlparam(name){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regex=new RegExp("[\\?&]"+name+"=([^&#]*)");var results=regex.exec(window.location.href);return results?results[1]:"";}
var UsRedirect=false;function geoLocation(isonunload){if(UsRedirect==false){if((!isonunload)||(isonunload&&_Ck_.get('lang')!=null&&_Ck_.get('cc')!=null)){var langAttr=document.getElementsByTagName('html')[0].getAttribute('xml:lang')||document.getElementsByTagName('html')[0].getAttribute('lang');var lang_cc=langAttr.split("-");var country=lang_cc[1];var language=lang_cc[0]+"-"+lang_cc[1];if(country=="hans"||country=="hant"){country=hpAbsDir.split("/")[2];language=lang_cc[0]+"-"+country;_Ck_.set("lang",language);_Ck_.set("www_hp_com_locale",language,30);_Ck_.set("cc",country);}else{_Ck_.set("lang",language);_Ck_.set("www_hp_com_locale",language,30);_Ck_.set("cc",country);}}}}
function USCookie(){_Ck_.set("lang",'en-us');_Ck_.set("www_hp_com_locale",language,30);_Ck_.set("cc",'us');UsRedirect=true;}
var metrics_cookie=_Ck_.get('lang');var hp_geolocated_page=false;var currentURL=window.location+'';currentURL=currentURL.split('#')[0];if(currentURL.match(/(https?\:\/\/)?(.*)\.hp\.com\/?($|country\/us\/en\/welcome.html)/gi)){var currentLang=document.getElementsByTagName('html')[0].getAttribute('lang').toLowerCase();if(currentLang!='en-us'){if(metrics_cookie==null){hp_geolocated_page="Browser";}else{hp_geolocated_page="Cookie";}}}
function USFlag(){if(typeof(currentLang)!="undefined"&&currentLang!='en-us'){if(document.getElementById("usLink"))document.getElementById("usLink").innerHTML='<div id="imgUSLink"><a onClick="USCookie();" href="http://welcome.hp.com/country/us/en/welcome.html" tabindex="1"><img src="http://welcome.hp-ww.com/country/us/en/img/us_flag.gif" alt="" border=0></a></div><div id="textUSLink"><a onClick="USCookie();" href="http://welcome.hp.com/country/us/en/welcome.html" tabindex="1"><span class="screenReading">Go to </span>HP USA</a></div>';}}
if(typeof(currentLang)!="undefined"&&currentLang!='en-us'){_Ck_.set("geoLocation",'redirection');}
