//****** AllWebMenus Libraries Version # 808 ******

// Copyright (c) Likno Software 1999-2010
// The present javascript code is property of Likno Software.
// This code can only be used inside Internet/Intranet web sites located on *web servers*, as the outcome of a licensed AllWebMenus application only. 
// This code *cannot* be used inside distributable implementations (such as demos, applications or CD-based webs), unless this implementation is licensed with an "AllWebMenus License for Distributed Applications". 
// Any unauthorized use, reverse-engineering, alteration, transmission, transformation, facsimile, or copying of any means (electronic or not) is strictly prohibited and will be prosecuted.
// ***Removal of the present copyright notice is strictly prohibited***

if (typeof(awmlsx)=='undefined') var awmlsx=window.pageXOffset,awmlsy=window.pageYOffset;var awmav=navigator.appVersion, awmMac=(awmav.indexOf("Macin"))>-1;var awmSupportCSS=0;var awmhd=200,awmdst="",n=null,awmcrm,awmcre,awmmo,awmso,awmctm=n,awmuc,awmud,awmctu,awmun,awmdid,awmsht="",awmsoo=0,awmliw=window.top.innerWidth,awmlih=window.top.innerHeight,awmtest=1,awmNS4OffsetX,awmNS4OffsetY,awmRTLSupport,awmRelativeCorner,awmRightToLeftFrame;var awmalt=["left","center","right"],awmplt=["absolute","relative"],awmvlt=["visible","hidden","inherit"],awmctlt=["default","hand","crosshair","help","move","text","wait"];var awmDriftID2;var aCI,vl,vt,vr,vb,awmSepr;aCo();if (awmso>0){awmsoo=awmso+1;}else  {var awmsc=new Array();}var awmdsid;var awmlssx=window.pageXOffset;var awmlssy=window.pageYOffset;var awmSelectedItem;if (!awmun) awmun=0;if (awmcre>=0); else  awmcre=0;window.onunload=awmwu;clearInterval(awmDriftID2);if (!awmMac) awmDriftID2=setInterval("awmDrift2()",100);function awmhidediv(){var m=1;while (document.layers["awmform"+m]){document.layers["awmform"+m].visibility="hide";m++;}var m=1;while (document.layers["awmflash"+m]){document.layers["awmflash"+m].visibility="hide";m++;}}function awmshowdiv(){var m=1;while (document.layers["awmform"+m]){document.layers["awmform"+m].visibility="show";m++;}var m=1;while (document.layers["awmflash"+m]){document.layers["awmflash"+m].visibility="show";m++;}}function awmiht (image){return "<img src='"+awmMenuPath+awmImagesPath+"/"+awmImagesColl[image*3]+"' width="+awmImagesColl[image*3+1]+" height="+awmImagesColl[image*3+2]+" align='baseline'>";}function awmatai (text,image,algn){if (text==null) text="";var i=0;while(text.charAt(0)==" "){i++;text=text.substring(1);}while(i>0){text="&nbsp;"+text;i--;}i=0;while(text.charAt(text.length-1)==" "){i++;text=text.substring(0,text.length-1);}while(i>0){text+="&nbsp;";i--;}var s1=(text!=""&&text!=null&&(algn==0||algn==2)&&image!=null)?"<br>":"";var s2=(image!=n)?awmiht(image):"";var s3=(image==n)?"<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' class='AWMSTEL'>":"";return "<nobr>"+s3+((algn==0||algn==3)?((algn==3&&text!=""&&text!=null&&image!=null)?"<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' width=0 height=0 align='absmiddle'>":"")+s2+s1+text:((awmtest)?"<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' width=0 height=0>":"")+text+s1+s2)+"</nobr>";}function awmCreateCSS (pos,vis,algnm,fgc,bgc,bgi,fnt,tdec,bs,bw,bc,pd,crs){if (awmso>=0) awmso++; else  awmso=0;var pdr,pdb,pdl,pdt;if (typeof(pd)=="number"){pdr=pdt=pdb=pdl=pd;} else  {var pda = pd.split("px ");pdt=pda[0];pdr=pda[1];pdb=pda[2];pdl=pda[3];}var style={ id:"AWMST"+awmso,id2:"AWMSTTD"+awmso,id3:"AWMSTBG"+awmso,id4:"AWMSTCBG"+awmso,pos:pos,vis:vis,algnm:algnm,fgc:fgc,bgc:bgc,bgi:bgi,fnt:fnt,tdec:tdec,bs:bs,bw:((bs=="none")?0:bw),bc:bc,zi:awmzindex,pd:pd,crs:crs,pdt:pdt,pdr:pdr,pdb:pdb,pdl:pdl};awmsht+="."+style.id+" {position:absolute;visibility:inherit;left:0;top:0; "+((bs!=n)?"border-style:"+bs+"; ":"")+((bw!=n&&bs!="none")?"border-width:"+bw+"; ":"")+((bc!=n)?"border-color:"+bc+"; ":"")+" z-index:"+style.zi+"}";awmsht+="."+style.id+"td {padding:"+pd+"px;"+((fnt!=n)?"font:"+fnt+"; ":"")+((tdec!=n)?"text-decoration:"+tdec+"; ":"")+((fgc!=n)?"color:"+fgc+"; ":"")+"}";awmsht+="."+style.id3+" {position:absolute;visibility:inherit;left:0;top:0;"+((bgc!=n)?"layer-background-color:"+bgc+";":"")+"z-index:0;}";awmsht+="."+style.id4+" {position:absolute;visibility:inherit;"+"layer-background-color:"+((bgc!=n)?bgc+";":"transparent;")+((bs!=n)?"border-style:"+bs+";":"")+((bw!=n)?"border-width:"+bw+"px;":"")+((bc!=n)?"border-color:"+bc+";":"")+"z-index:"+style.zi+"}";if(awmSupportCSS) awmsht+="."+style.id2+" {text-align:"+awmalt[algnm]+"; "+((fnt!=n)?"font:"+fnt+"; ":"")+((tdec!=n)?"text-decoration:"+tdec+"; ":"")+((fgc!=n)?"color:"+fgc+"; ":"")+((bgc!=n)?"background-color:"+bgc+"; ":"")+"}";awmsc[awmsc.length]=style;}function awmCreateMenu (cll,swn,swr,mh,ud,sa,mvb,dft,crn,dx,dy,ss,ct,cs,dbi,ew,eh,jcoo,jcoc,opc,elemRel){if (awmmo>=0) awmmo++; else  {awmm=new Array(); awmmo=0};var me={ ind:awmmo,nm:awmMenuName,cn:new Array(),fl:!awmsc[cs].pos,cll:cll,mvb:mvb,dft:dft,crn:crn,dx:(ct<2)?dx:0,dy:dy,ss:ss,sht:"<STYLE>.awGn{background-color:transparent}"+((awmmo==0)?".AWMSTEL {position:absolute; left:0; top:0;}":"")+awmsht+"</STYLE>",rep:0,mio:0,sFO:awmSubmenusFrameOffset,st:awmOptimize?2:3,selectedItem:(typeof(awmSelectedItem)=='undefined')?0:awmSelectedItem,offX:(awmNS4OffsetX)?awmNS4OffsetX:0,offY:(awmNS4OffsetY)?awmNS4OffsetY:0,rtls:(awmRTLSupport)?awmRTLSupport:0,rtlf:(awmRightToLeftFrame)?awmRightToLeftFrame:0,rc:(awmRelativeCorner)?awmRelativeCorner:0,elemRel:elemRel,addSubmenu:awmas,ght:awmmght,whtd:awmmwhttd,buildMenu:awmbmm,cm:awmmcm};awmNS4OffsetX=awmNS4OffsetY=awmRTLSupport=awmRelativeCorner=awmRightToLeftFrame=0;me.pm=me;me.addSubmenu(ct,swn,swr,mh,ud,sa,1,cs,dbi,ew,eh,jcoo,jcoc,0,0);me.cn[0].pi=null;if (mvb) document.onmousemove=awmoimm;awmm[awmmo]=me;awmsht="";return me.cn[0];}function awmas (ct,swn,swr,shw,ud,sa,od,cs,dbi,ew,eh,jcoo,jcoc,opc,alO){cnt={ id:"AWMEL"+(awmcre++),it:new Array(),ct:ct,swn:swn,swr:swr,shw:(shw>2)?2:shw,ud:ud,sa:sa,od:od,cs:awmsc[cs+awmsoo],dbi:dbi,ew:ew,eh:eh,jcoo:jcoo,jcoc:jcoc,pi:this,pm:this.pm,pm:this.pm,siw:0,mio:0,hsid:null,uid:null,dox:0,doy:0,w:0,h:0,alO:alO,addItem:awmai,addItemWithImages:awmaiwi,show:awmcs,tb:awmctb,ab:awmcab,fe:awmcfe,gd:awmcgd,arr:awmca,ght:awmcght,pc:awmpc,unf:awmcu,hdt:awmchdt,onmouseover:awmocmo,onmouseout:awmocmot};this.sm=cnt;cnt.pm.cn[cnt.ind=cnt.pm.cn.length]=cnt;cnt.cd=(cnt.ind==0&&cnt.pm.cll==0)?0:1;return cnt;}function awmai (st0,st1,st2,in0,in1,in2,tt,sbt,jc0,jc1,jc2,url,tf,mnW,mnH,iHF,hSp,sWt,sC1,sC2){var dummyImg="<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' class='AWMSTEL'>";var itm={ id:"AWMEL"+(awmcre++),style:[(st0==n)?n:awmsc[st0+awmsoo],(st1==n)?n:awmsc[st1+awmsoo],(st2==n)?n:awmsc[st2+awmsoo]],inm:[in0,(in1==n)?in0:in1,(in2==n)?in0:in2],ii:[n,n,n],ia:[n,n,n],hsi:[n,n,n],rI:[n,n,n],lI:[n,n,n],bIP:[0,0,0],tt:tt,sbt:sbt,jc:[jc0,jc1,jc2],tf:tf,top:0,left:0,layer:[n,n,n],blr:[n,n,n],ps:this,pm:this.pm,sm:null,tai:["<nobr>"+dummyImg+in0+"</nobr>","<nobr>"+dummyImg+((in1==n)?in0:in1)+"</nobr>","<nobr>"+dummyImg+((in2==n)?in0:in2)+"</nobr>"],mnH:(mnH)?mnH:0,mnW:(mnW)?mnW:0,iHF:iHF,hSp:hSp,sWt:(hSp)?((awmSepr)?awmSepr[hSp*4]:sWt):"",sC1:(hSp)?((awmSepr)?awmSepr[hSp*4+1]:sC1):"",sC2:(hSp)?((awmSepr)?awmSepr[hSp*4+2]:sC2):"",sMg:(hSp)?((awmSepr)?awmSepr[hSp*4+3]:3):0,sMs:1,ght:awmight,getHtmlText:awmItemGetHtmlText,getBGHtmlText:awmItemGetBGHtmlText,ftc:awmItemFetch,gd:awmigd,arr:awmia,shst:awmiss,addSubmenu:awmas,onmouseover:awmoimo,onmouseout:awmoimot,onmousedown:awmoimd,onmouseup:awmoimu};if (url!=null){var prf=url.substring(0,7);if ((prf!="http://")&&(prf!="https:/")&&(prf!="mailto:")&&(prf!="file://")&&(url.substring(0,9)!="outlook:/")&&(url.substring(0,6)!="ftp://")&&(url.substring(0,6)!="mms://")&&(url.substring(0,1)!="/")) url=awmMenuPath+"/"+url;}itm.url=url;if (hSp>0&&itm.sC2) itm.sMs=0;this.it[itm.ind=this.it.length]=itm;return itm;}function awmaiwi (st0,st1,st2,in0,in1,in2,tt,ii0,ii1,ii2,ia0,ia1,ia2,hsi0,hsi1,hsi2,sbt,jc0,jc1,jc2,url,tf,mnW,mnH,iHF,lI0,lI1,lI2,rI0,rI1,rI2,bIP0,bIP1,bIP2,hSp,sWt,sC1,sC2){var itm=this.addItem (st0,st1,st2,in0,in1,in2,tt,sbt,jc0,jc1,jc2,url,tf,mnW,mnH,iHF,hSp,sWt,sC1,sC2);itm.ii=[ii0,ii1,ii2];itm.ia=[ia0,ia1,ia2];itm.lI=[lI0,lI1,lI2];itm.rI=[rI0,rI1,rI2];itm.tai=[awmatai(itm.inm[0],itm.ii[0],itm.ia[0]),awmatai(itm.inm[1],itm.ii[1],itm.ia[1]),awmatai(itm.inm[2],itm.ii[2],itm.ia[2])];itm.hsi=[hsi0,hsi1,hsi2];itm.bIP=[bIP0,bIP1,bIP2];this.siw=Math.max(this.siw,Math.max(((hsi0!=n)?awmImagesColl[hsi0*3+1]:0),Math.max(((hsi1!=n)?awmImagesColl[hsi1*3+1]:0),((hsi2!=n)?awmImagesColl[hsi2*3+1]:0))));return itm;}function awmmght(cnt){this.htx=this.cn[0].ght();}function awmcght(){var is="",hct="";if (awmtest) hct=" style='visibility:hidden'";this.htx="<div id='"+this.id+"' class='"+this.cs.id4+"'"+hct+">";if (!awmtest) this.htx+="<table"+((awmSupportCSS)?" class='awGn'":"")+" border='0' cellpadding='0' cellspacing='0' "+((awmtest)?"width='0%'":"width='"+(this.w-((this.cs.bw>0)?6:0))+"' height='"+(this.h-((this.cs.bw>0)?6:0))+"'")+"><tr><td></td></tr></table>";if (this.it.length>0) this.htx+=this.it[0].ght();this.htx+="</div>";if (this.ind<this.pm.cn.length-1) this.htx+=this.pm.cn[this.ind+1].ght();return this.htx;}function awmItemGetHtmlText(q){var retText="";retText+="<div id='"+this.id+"_"+q+"' class='"+this.style[q].id+"'>";retText+="<table border='0'"+((awmSupportCSS)?" class='awGn'":"")+" cellspacing='0' cellpadding='0' "+((awmtest)?"width='0%'":"width='"+(((this.ps.ew)?this.ps.mwt:this.w)-parseInt(this.style[q].pdr)-((this.style[q].bw>0)?6+this.style[q].bw*2:0))+"' height='"+(((this.ps.eh)?this.ps.mht:this.h)-parseInt(this.style[0].pdb)-((this.style[q].bw>0)?6+this.style[q].bw*2:0))+"'")+"><tr><td align='"+awmalt[this.style[q].algnm]+"' "+((awmSupportCSS)?" class='"+this.style[q].id2+"'":"")+">";retText+="<table border='0'"+((awmSupportCSS)?" class='awGn'":"")+" cellspacing='0' cellpadding='0' "+((awmtest)?"width='0%'":"width='"+(((this.ps.ew)?this.ps.mwt:this.w)-parseInt(this.style[q].pdr)-parseInt(this.style[q].pdl)-((this.style[q].bw>0)?7+this.style[q].bw*2:0))+"' height='100%'")+">";retText+="<tr><td"+((awmSupportCSS)?" class='"+this.style[q].id2+"'":"")+" valign='middle' width='"+((awmtest)?"0":"100%")+"' align='"+awmalt[this.style[q].algnm]+"'><span class='"+this.style[q].id+"td'"+((this.ps.siw>0&&this.iHF==2)?" STYLE='padding-right:0px'":" STYLE='paddingss:"+this.style[q].pd+"px'")+">"+this.tai[q]+"</span></td>";if (this.ps.siw>0&&this.iHF==2){retText+="<td"+((awmSupportCSS)?" class='"+this.style[q].id2+"'":"")+" valign='middle' width='"+(this.ps.siw+parseInt(this.style[q].pdr))+"'>";retText+="<span class='"+this.style[q].id+"td' style='padding-left:0px;'>";retText+=(this.hsi[q]==n)?"<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' width='"+this.ps.siw+"' height='1'>":awmiht(this.hsi[q]);retText+="</span></td>";}retText+="</tr></table></td></tr></table></div>";return retText;}function awmItemGetBGHtmlText(q){var retText="";retText+="<div id='"+this.id+"_"+q+"a' class='"+this.style[q].id3+"'>";retText+="<table border='0' cellpadding='0' cellspacing='0' width='"+((awmtest)?0:((this.ps.ew)?this.ps.mwt:this.w)-2*this.style[q].bw)+"' height='"+((awmtest)?0:((this.ps.eh)?this.ps.mht:this.h)-2*this.style[q].bw)+"'><tr>";if (this.lI[q]!=n) retText+="<td valign='top' width='"+awmImagesColl[this.lI[q]*3+1]+"'>"+awmiht(this.lI[q])+"</td>";retText+="<td "+((this.bIP[q]&&this.style[q].bgi!=n)?"style='background-image:URL(\""+awmMenuPath+awmImagesPath+"/"+awmImagesColl[this.style[q].bgi*3]+"\")' ":"")+"width='"+((awmtest)?0:"100%")+"'><img src='"+awmMenuPath+awmLibraryPath+"/dot.gif'></td>";if (this.rI[q]!=n) retText+="<td valign='top' width='"+awmImagesColl[this.rI[q]*3+1]+"'>"+awmiht(this.rI[q])+"</td>";retText+="</tr></table></div>";return retText;}function awmight(){var htx=this.getHtmlText(0)+this.getHtmlText(1);htx+=((this.pm.st==3)?this.getHtmlText(2):"");if (!awmtest){htx+="<div id='"+this.id+"_4' class='AWMSTEL'>";if (this.style[1].crs==0){htx+="<img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' width='"+((this.ps.ew)?this.ps.mwt:this.w)+"' height='"+((this.ps.eh)?this.ps.mht:this.h)+"' border='0' alt='"+this.tt+"'>";} else  {htx+="<a href='javascript:void(0);'><img src='"+awmMenuPath+awmLibraryPath+"/dot.gif' width='"+((this.ps.ew)?this.ps.mwt:this.w)+"' height='"+((this.ps.eh)?this.ps.mht:this.h)+"' border='0' alt='"+this.tt+"'></a>";}htx+="</div>";}htx+=this.getBGHtmlText(0)+this.getBGHtmlText(1);htx+=((this.pm.st==3)?this.getBGHtmlText(2):"");if (this.hSp&&this.ps.ct==0&&!awmtest){htx+="<div id='"+this.id+"_5' style='position:absolute;visibility:inherit;layer-background-color:"+this.sC1+"'><table width='"+(((this.ps.ew)?this.ps.mwt:this.w))*(this.sWt/100)+"' height='1' border='0' cellpadding='0' cellspacing='0'><tr><td></td></tr></table></div>";htx+="<div id='"+this.id+"_6' style='position:absolute;visibility:inherit;"+((this.sC2)?"layer-background-color:"+this.sC2:"")+"'><table width='"+(((this.ps.ew)?this.ps.mwt:this.w))*(this.sWt/100)+"' height='1' border='0' cellpadding='0' cellspacing='0'><tr><td></td></tr></table></div>";}if (this.ind<this.ps.it.length-1) htx+=this.ps.it[this.ind+1].ght();return htx;}function awmmwhttd(){if (awmtest) document.write(this.sht);document.write(this.htx);}function awmItemFetch(){if (!awmtest){this.elr=this.ps.layer.document.layers[this.id+"_4"];this.elr.pi=this;this.elr.onmouseover=awmoimo;this.elr.onmouseout=awmoimot;this.elr.onmousedown=awmoimd;this.elr.onmouseup=awmoimu;this.elr.onmousemove=awmoimm;}this.layer[0]=this.ps.layer.document.layers[this.id+"_0"];this.layer[0].pi=this;this.layer[1]=this.ps.layer.document.layers[this.id+"_1"];this.layer[1].pi=this;this.blr[0]=this.ps.layer.document.layers[this.id+"_0a"];this.blr[1]=this.ps.layer.document.layers[this.id+"_1a"];if (this.pm.st==3){this.layer[2]=this.ps.layer.document.layers[this.id+"_2"];this.layer[2].pi=this;this.blr[2]=this.ps.layer.document.layers[this.id+"_2a"];}if (this.ind<this.ps.it.length-1) this.ps.it[this.ind+1].ftc();}function awmcfe(){this.layer=document.layers[this.id];this.layer.prc=this;if (!awmtest){this.layer.onmouseover=awmocmo;this.layer.onmouseout=awmocmot;}if (this.it.length>0) this.it[0].ftc();}function awmigd(){this.w=this.mnW;this.h=this.mnH;this.w=Math.max(this.w,this.layer[0].clip.width+parseInt(this.style[0].pdl));this.h=Math.max(this.h,this.layer[0].clip.height+0*parseInt(this.style[0].pdt));this.w=Math.max(this.w,this.layer[1].clip.width+parseInt(this.style[1].pdl));this.h=Math.max(this.h,this.layer[1].clip.height+0*parseInt(this.style[1].pdt));this.w=Math.max(this.w,this.blr[0].clip.width+2*this.style[0].bw);this.h=Math.max(this.h,this.blr[0].clip.height+2*this.style[0].bw);this.w=Math.max(this.w,this.blr[1].clip.width+2*this.style[1].bw);this.h=Math.max(this.h,this.blr[1].clip.height+2*this.style[1].bw);if (this.pm.st==3){this.w=Math.max(this.w,this.layer[2].clip.width+parseInt(this.style[2].pdl));this.h=Math.max(this.h,this.layer[2].clip.height+0*parseInt(this.style[2].pdt));this.w=Math.max(this.w,this.blr[2].clip.width+2*this.style[2].bw);this.h=Math.max(this.h,this.blr[2].clip.height+2*this.style[2].bw);}this.ps.mwt=Math.max(this.w,this.ps.mwt);this.ps.mht=Math.max(this.h,this.ps.mht);this.ps.w+=this.w+this.ps.dbi;this.ps.h+=this.h+this.ps.dbi;if (this.ps.ct==0&&this.hSp){this.ps.h+=parseInt(this.sMg*2+2-this.sMs+this.ps.dbi);}if (this.ind<this.ps.it.length-1) this.ps.it[this.ind+1].gd();}function awmcgd(){this.mwt=this.mht=0;this.w=this.hash=-this.dbi;this.w=0;if (this.it.length>0) this.it[0].gd();this.w-=this.dbi;this.h-=this.dbi;if (this.ew) this.w=this.it.length*(this.mwt+this.dbi)-this.dbi;if (this.eh) this.h=this.it.length*(this.mht+this.dbi)-this.dbi;if (this.ct==0) this.w=this.mwt; else  this.h=this.mht;if (this.ct==2) this.w=window.innerWidth-this.cs.bw*2;}function awmia(){this.layer[0].moveTo(this.ps.nl,this.ps.nt);this.layer[0].visibility="inherit";this.layer[1].moveTo(this.ps.nl,this.ps.nt);this.layer[1].visibility="hide";if (this.pm.st==3){this.layer[2].moveTo(this.ps.nl,this.ps.nt);if (this.style[2].bgi!=n&&!this.bIP[2]) this.blr[2].background.src=awmMenuPath+awmImagesPath+"/"+awmImagesColl[this.style[2].bgi*3];this.layer[2].visibility="hide";this.blr[2].moveTo(this.ps.nl+this.style[2].bw,this.ps.nt+this.style[2].bw);this.blr[2].visibility="hide";}if (this.style[0].bgi!=n&&!this.bIP[0]) this.blr[0].background.src=awmMenuPath+awmImagesPath+"/"+awmImagesColl[this.style[0].bgi*3];if (this.style[1].bgi!=n&&!this.bIP[1]) this.blr[1].background.src=awmMenuPath+awmImagesPath+"/"+awmImagesColl[this.style[1].bgi*3];this.blr[0].moveTo(this.ps.nl+this.style[0].bw,this.ps.nt+this.style[0].bw);this.blr[0].visibility="inherit";this.blr[1].moveTo(this.ps.nl+this.style[1].bw,this.ps.nt+this.style[1].bw);this.blr[1].visibility="hide";this.elr.moveTo(this.ps.nl,this.ps.nt);if (this.ps.ct!=0) this.ps.nl+=((this.ps.ew)?this.ps.mwt:this.w)+this.ps.dbi; else  this.ps.nt+=((this.ps.eh)?this.ps.mht:this.h)+this.ps.dbi;if (this.ps.ct==0&&this.hSp){var var1=this.ps.layer.document.layers[this.id+"_5"];var var2=this.ps.layer.document.layers[this.id+"_6"];var1.top=(1*this.ps.nt+1*this.sMg);var1.left=var2.left=this.ps.nl+this.blr[0].clip.width*(100-this.sWt)/200;var2.top=(1*this.ps.nt+1*this.sMg+1);this.ps.nt+=parseInt(this.sMg*2+2-this.sMs+this.ps.dbi);}if (this.ind<this.ps.it.length-1) this.ps.it[this.ind+1].arr();}function awmca(){this.nl=this.nt=this.cs.bw;if (this.cs.bgi!=n) this.layer.background.src=awmMenuPath+awmImagesPath+"/"+awmImagesColl[this.cs.bgi*3];if (this.it.length>0) this.it[0].arr();}function awmcs(sf,x,y){if (typeof(mpi)=='undefined') return;this.layer.clip.width=this.w+2*this.cs.bw;this.layer.clip.height=this.h+2*this.cs.bw;this.layer.clip.top=0;this.layer.clip.left=0;if (sf){this.cd=0;if (arguments.length==1) this.pc();else  {this.left=this.layer.clip.left=x;this.top=this.layer.clip.top=y;}if (this.shw>0&&!awmun) this.unf(); else  this.layer.visibility="show";if (this.jcoo!=null) eval(this.jcoo);if (this.ind==0) if (this.pm.selectedItem>0) this.it[this.pm.selectedItem-((this.it[0].iHF==2)?1:0)].shst(2);} else  {if (this.mio||this.cd) return;this.layer.visibility="hide";clearInterval (this.uid);awmun=0;if (this.pi!=null) if (this.pm.selectedItem<1){this.pi.shst(0);}else  {if (this.pi.ind==this.pm.selectedItem-((this.pi.ps.it[0].iHF==2)?1:0)&&this.pi.ps.ind==0){this.pi.shst(2);} else  {this.pi.shst(0);}}if (this.jcoc!=null&&! this.cd) eval(this.jcoc);this.cd=1;}}function awmchdt(flg){var p;for (p=0; p<this.it.length; p++){if (this.it[p].sm!=n) this.it[p].sm.hdt(0);}if (arguments.length==1) this.show(0);}function awmmcm(flg){if (this.mio&&!flg) return;for (var cno=(this.cll&&awmctm==null)?0:1; cno<this.cn.length; cno++){if (flg){this.cn[cno].mio=0;}this.cn[cno].show(0);}if (awmSubmenusFrame!=""){for (p=0; p<this.cn[0].it.length; p++){if (this.cn[0].it[p].sm!=n) this.cn[0].it[p].sm.pm.cm(flg);}}}function awmodmd(){for (mno=0; mno<awmm.length; mno++){awmm[mno].cm(0);}}function awmocmo(){this.prc.mio=1;this.prc.pm.mio=1;if (this.prc.pi!=null) this.prc.pi.shst((this.prc.swn==0)?1:2);if (this.prc.ind>0) clearTimeout(this.prc.pi.ps.hsid);clearTimeout(this.prc.hsid);}function awmocmot(){this.prc.mio=0;this.prc.pm.mio=0;if (!this.prc.pm.ss){var nth=setTimeout("awmm["+this.prc.pm.ind+"].cm(0);",awmhd);if (awmSubmenusFrame=="") this.prc.hsid=setTimeout("awmm["+this.prc.pm.ind+"].cn["+this.prc.ind+"].hdt("+((this.prc.ind==0)?"":"0")+");",awmhd);}}function awmiss(sts){if (sts==2&&this.pm.st==2) sts=1;for (q=0; q<this.pm.st; q++){this.layer[q].visibility=this.blr[q].visibility=(q==sts)?"inherit":"hide";}}function awmoimo(){this.captureEvents(Event.MOUSEDOWN);this.captureEvents(Event.MOUSEMOVE);if (awmctm!=null) return;if (awmSubmenusFrame!=""){eval ("var frex=parent."+awmSubmenusFrame);if (frex){eval("this.pi.sm=parent."+awmSubmenusFrame+".awm"+this.pi.pm.nm+"_sub_"+(this.pi.ind+1));if (this.pi.sm){this.pi.sm.pi=this.pi;this.pi.sm.pm.ss=this.pi.pm.ss;} else  this.pi.sm=null;}}this.pi.ps.mio=1;this.pi.pm.mio=1;this.pi.ps.hdt();this.pi.shst(1);status=this.pi.sbt;if (this.pi.sm!=n) if (!this.pi.sm.swn){clearTimeout(this.pi.sm.hsid);this.pi.sm.show(1);}if (this.pi.jc[1]!=null) eval(this.pi.jc[1]);}function awmoimot(){this.releaseEvents(Event.MOUSEDOWN);this.releaseEvents(Event.MOUSEUP);this.releaseEvents(Event.MOUSEMOVE);if (this.pi.sm==null) this.pi.shst(0);if (this.pi.sm!=null) if (this.pi.sm.cd) this.pi.shst(0);if (this.pi.sm==null||(this.pi.sm!=null&&this.pi.sm.cd)){if (this.pi.ps.ind==0&&this.pi.ind==this.pi.pm.selectedItem-((this.pi.ps.it[0].iHF==2)?1:0)){this.pi.shst(2);} else  {this.pi.shst(0);}}if (!this.pi.pm.ss){if (this.pi.sm!=n&&awmSubmenusFrame=="") this.pi.sm.hsid=setTimeout("awmm["+this.pi.pm.ind+"].cn["+this.pi.sm.ind+"].hdt(0);",awmhd);}status=awmdst;if (this.pi.jc[0]!=null) eval(this.pi.jc[0]);}function awmoimd(e){this.captureEvents(Event.MOUSEUP);this.pi.shst(2);if (this.pi.iHF==1){awmctm=this.pi.ps;this.pi.pm.cm(0);this.pi.pm.mio=1;awmmox=e.pageX-awmctm.left;awmmoy=e.pageY-awmctm.top;} else  {if (this.pi.sm!=n) if (this.pi.sm.swn){clearTimeout(this.pi.sm.hsid);this.pi.sm.show(1);}if (this.pi.jc[2]!=null){this.releaseEvents(Event.MOUSEDOWN); this.releaseEvents(Event.MOUSEUP); eval(this.pi.jc[2]);}if (this.pi.url!=null){this.releaseEvents(Event.MOUSEDOWN);this.releaseEvents(Event.MOUSEUP);if(e.modifiers==4) window.open(this.pi.url);else  if (this.pi.tf==null) window.location=this.pi.url;else  if (this.pi.tf=="new") window.open(this.pi.url);else  if (this.pi.tf=="top") window.top.location=this.pi.url;else  eval("parent."+this.pi.tf+".location=this.pi.url");}}return false;}function awmoimu(){if (awmctm!=null){awmctm.pm.rep=1;awmctm=null;}this.pi.shst(1);if (this.pi.sm==n) this.pi.pm.cm(1);}function awmoimm(e){if (awmctm!=null){awmctm.pm.rep=1;awmctm.left=e.pageX-awmmox;awmctm.top=e.pageY-awmmoy;awmctm.layer.moveTo(awmctm.left,awmctm.top);}}function awmpc(flg){var me=this.pm;var w=this.w+2*this.cs.bw;var h=this.h+2*this.cs.bw;if (this.pi==null){var tmpEl=document.layers["awmAnchor-"+this.pm.nm];var x=this.pm.offX,y=this.pm.offY;if (tmpEl){if (me.rc==4||me.rc==6){x-=w/2}if (me.rc==5||me.rc==7){y-=h/2}if (me.rc==1||me.rc==2||me.rc==5){x-=w}if (me.rc==2||me.rc==3||me.rc==6){y-=h}x+=tmpEl.pageX;y+=tmpEl.pageY;} else  {var crn=me.crn;x+=(crn==0||crn==4||crn==3)?(me.dx):((crn==1||crn==6||crn==2)?window.innerWidth-w-me.dx:(window.innerWidth-w)/2);y+=(crn==0||crn==5||crn==1)?(me.dy):((crn==3||crn==7||crn==2)?window.innerHeight-h-me.dy:(window.innerHeight-h)/2);}if ((this.left!=x+awmlssx||this.top!=y+awmlssy)&&!this.pm.rep){x+=(this.pm.dft==1||this.pm.dft==3||this.pm.dft==4||this.pm.dft==6)?vl:0;y+=(this.pm.dft==1||this.pm.dft==2||this.pm.dft==4||this.pm.dft==5)?vt:0;this.layer.moveTo(x,y);this.left=x;this.top=y;}} else  {if (flg) return;if (!this.pi.ps) return;var psl=this.pi.ps.layer;var pil=this.pi.layer[0];this.lod=this.od;if (this.lod==0){if (this.pi.ps.ct==0){if (this.pm.rtls)this.lod=((psl.left-this.swr-w>vl)?2:1);else this.lod=((psl.left+psl.clip.width+this.swr+w>vr)&&(psl.left-this.swr-w>vl))?2:1;} else  {this.lod=((psl.top+psl.clip.height+this.swr+h>vb)&&(psl.top-this.swr-h>vl))?2:1;}}if (this.pi.ps.ct==0){this.left=(this.lod==1)?((this.pm.sFO>-9000&&this.ind==0)?vl:psl.left+psl.clip.width)+this.swr:psl.left-w-this.swr;if (this.pm.sFO>-9000&&this.ind==0&&((this.pm.rtls&&this.pm.rtlf!=2)||this.pm.rtlf==1)){this.left=window.innerWidth-w-this.swr+5;}this.top=((this.sa==0)?psl.top+pil.top:((this.sa==1)?psl.top:((this.sa==2)?psl.top+psl.clip.height-h:psl.top+(psl.clip.height-h)/2)));this.top+=((this.pm.sFO>-9000&&this.ind==0)?this.pm.sFO-this.pi.ps.doy+vt:0)+this.alO;if (this.top+h>vb) this.top=vb-h;if (this.top<vt) this.top=vt;this.layer.moveTo(this.left,this.top);} else {this.left=(this.sa==0)?(psl.left+pil.left+((this.pm.rtls)?(pil.clip.width-this.layer.clip.width):0)):((this.sa==1)?psl.left:((this.sa==2)?psl.left+psl.clip.width-w:psl.left+(psl.clip.width-w)/2));this.left+=((this.pm.sFO>-9000&&this.ind==0)?this.pm.sFO-this.pi.ps.dox+vl:0)+this.alO;if (this.left+w>vr) this.left=vr-w;this.top=(this.lod==1)?((this.pm.sFO>-9000&&this.ind==0)?vt:psl.top+psl.clip.height)+this.swr:psl.top-h-this.swr;this.layer.moveTo(this.left,this.top);}}}function awmu(){if (awmuc>10){clearInterval (awmctu.uid);awmun=0;return;}var layer=awmctu.layer;var w=awmctu.w+2*awmctu.cs.bw;var h=awmctu.h+2*awmctu.cs.bw;switch (awmud){case 1: if (awmctu.shw==1){layer.left=awmctu.left-w*(10-awmuc)/10;layer.clip.left=Math.round(w*(10-awmuc)/10);} else  layer.clip.width=Math.round(w*awmuc/10);break;case 2: if (awmctu.shw==1){layer.left=awmctu.left+w*(10-awmuc)/10;layer.clip.width=Math.round(w*awmuc/10);} else  layer.clip.left=w*(10-awmuc)/10;break;case 3: if (awmctu.shw==1){layer.top=awmctu.top-h*(10-awmuc)/10;layer.clip.top=Math.round(h*(10-awmuc)/10);} else  layer.clip.height=Math.round(h*awmuc/10);break;case 4: if (awmctu.shw==1){layer.top=awmctu.top+h*(10-awmuc)/10;layer.clip.height=Math.round(h*awmuc/10);} else  layer.clip.top=Math.round(h*(10-awmuc)/10);break;case 5: if (awmctu.shw==1){layer.left=awmctu.left-w*(10-awmuc)/10;layer.top=awmctu.top-h*(10-awmuc)/10;layer.clip.left=Math.round(w*(10-awmuc)/10);layer.clip.top=Math.round(h*(10-awmuc)/10);} else  {layer.clip.width=Math.round(w*awmuc/10);layer.clip.height=Math.round(h*awmuc/10);}break;case 6: if (awmctu.shw==1){layer.left=awmctu.left-w*(10-awmuc)/10;layer.top=awmctu.top+h*(10-awmuc)/10;layer.clip.left=Math.round(w*(10-awmuc)/10);layer.clip.height=Math.round(h*awmuc/10);} else  {layer.clip.width=Math.round(w*awmuc/10);layer.clip.top=Math.round(h*(10-awmuc)/10)}break;case 7: if (awmctu.shw==1){layer.left=awmctu.left+w*(10-awmuc)/10;layer.top=awmctu.top-h*(10-awmuc)/10;layer.clip.width=Math.round(w*awmuc/10);layer.clip.top=Math.round(h*(10-awmuc)/10);} else  {layer.clip.left=w*(10-awmuc)/10;layer.clip.height=Math.round(h*awmuc/10);}break;case 8: if (awmctu.shw==1){layer.left=awmctu.left+w*(10-awmuc)/10;layer.top=awmctu.top+h*(10-awmuc)/10;layer.clip.width=Math.round(w*awmuc/10);layer.clip.height=Math.round(h*awmuc/10);} else  {layer.clip.left=w*(10-awmuc)/10;layer.clip.top=Math.round(h*(10-awmuc)/10);}break;}if (awmuc==0) awmctu.layer.visibility="show";awmuc+=2;}function awmcu(){clearInterval(this.uid);awmuc=0;awmud=(this.ud!=0)?this.ud:(this.lod+((this.pi.ps.ct==0)?0:2));awmctu=this;awmun=1;this.uid=setInterval("awmu()",50);}function awmwu(){clearInterval(awmdid);if (awmSubmenusFrameOffset>-9000){for (var mno=0; mno<awmm.length; mno++){if (awmm[mno].cn[0].pi!=null){awmm[mno].cn[0].pi.shst(0);awmm[mno].cn[0].pi.sm=null;}}}}function awmDS(){var clientX=window.innerWidth;var clientY=window.innerHeight;var sx=10;var sy=10;var dd=5;var snx,sny;if (vl!=awmlssx||vt!=awmlssy){for (var mno=0; mno<awmm.length; mno++){var crm=awmm[mno];if ((crm.dft==4||crm.dft==6)&&vl!=awmlssx){crm.mio=0;crm.cm(0);snx=Math.abs(vl-awmlssx)/(vl-awmlssx);if((Math.round(Math.abs(vl-awmlssx)/dd))>=sx) sx=Math.round(Math.abs(vl-awmlssx)/dd);if (Math.abs(vl-awmlssx)<sx) sx=Math.abs(vl-awmlssx);crm.cn[0].left+=snx*sx;if (awmSubmenusFrame!=''&&crm.cn[0].ct>0) crm.cn[0].dox=vl;}if ((crm.dft==4||crm.dft==5)&&vt!=awmlssy){crm.mio=0;crm.cm(0);sny=Math.abs(vt-awmlssy)/(vt-awmlssy);if((Math.round(Math.abs(vt-awmlssy)/dd))>=sy) sy=Math.round(Math.abs(vt-awmlssy)/dd);if (Math.abs(vt-awmlssy)<sy) sy=Math.abs(vt-awmlssy);crm.cn[0].top+=sny*sy;if (awmSubmenusFrame!=''&&crm.cn[0].ct==0) crm.cn[0].doy=vt;}if (crm.dft!=0) crm.cn[0].layer.moveTo(crm.cn[0].left,crm.cn[0].top);}if (vl!=awmlssx) awmlssx+=snx*sx;if (vt!=awmlssy) awmlssy+=sny*sy;}}function awmd(){if (vl!=awmlsx ||vt!=awmlsy){for (var mno=0; mno<awmm.length; mno++){var crm=awmm[mno];crm.mio=0;crm.cm(0);if (!crm.cn[0].cd){if (crm.dft==1||crm.dft==3){crm.cn[0].left+=vl-awmlsx;if (awmSubmenusFrame!=''&&crm.cn[0].ct>0) crm.cn[0].dox=vl;}if (crm.dft==1||crm.dft==2){crm.cn[0].top+=vt-awmlsy;if (awmSubmenusFrame!=''&&crm.cn[0].ct==0) crm.cn[0].doy=vt;}if (crm.dft!=0) crm.cn[0].layer.moveTo(crm.cn[0].left,crm.cn[0].top);}}awmlsx=vl;awmlsy=vt;}awmDS();for (var mno=0; mno<awmm.length; mno++) awmm[mno].cn[0].pc(1);}function aCo(){vl=window.pageXOffset;vt=window.pageYOffset;vr=vl+window.innerWidth;vb=vt+window.innerHeight;}function awmDrift2(){if (window.top.innerWidth!=awmliw||window.top.innerHeight!=awmlih){clearInterval(awmDriftID2);window.top.location.reload();}}function awmctb(){this.fe();this.gd();this.layer.visibility="hide";this.layer.moveTo(0,0);if (this.ind<this.pm.cn.length-1) this.pm.cn[this.ind+1].tb();}function awmcab(){this.fe();this.arr();this.cd=0;this.show(0);if (this.ind<this.pm.cn.length-1) this.pm.cn[this.ind+1].ab();}function awmdb(mi){if (!awmm[mi].cll){if (!awmm[mi].elemRel||document.layers["awmAnchor-"+awmm[mi].nm]) awmm[mi].cn[0].show(1);else  setTimeout("awmdb("+mi+")",10);}}function awmbmm(){clearInterval(aCI);aCI=setInterval("aCo()",25);if (typeof(awmTarget)!='undefined'&&this.ind>0) return;awmtest=1;document.onmousedown=awmodmd;status="."+(this.ind+1);this.ght();this.whtd();this.cn[0].tb();awmtest=0;this.ght();this.whtd();this.cn[0].ab();status=awmdst;awmdb(this.ind);clearInterval(awmdid);awmdid=setInterval("awmd()",75);awmsoo=awmso+1;}function awmHideMenu(mNm){var ml=awmm;if (ml){var i=0;while (i<ml.length){if (ml[i].nm==mNm||typeof(mNm)=='undefined'){ml[i].cm(1);ml[i].cn[0].show(0);}i++;}ml=null;}}function awmShowMenu (mNm,x,y,frame){var ml;if (arguments.length<4||frame==null) ml=awmm;else  {eval ("var frex=parent."+awmSubmenusFrame);if (!frex) return;eval("ml=parent."+frame+".awmm;");}if (ml){var i=0;while (ml[i].nm!=mNm&&i<ml.length-1) i++;if (ml[i].nm==mNm){if (arguments.length<3||x==null||y==null) ml[i].cn[0].show(1);else  {ml[i].cn[0].pm.rep=1;ml[i].cn[0].show(1,x,y);}}ml=null;}}function awmShowGroup(gNm,mNm,gCr,eCr,ofX,ofY){}/*1*/