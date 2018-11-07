/* Author:	Ebeydulla Hesen (FinalDream : nurqut@gmail.com)
 * Site:	http://www.nurqut.com
 * File:	NUIedit.js
 * Version:	0.5 (07/10/2012)
 * License:	GPL
 */

/* NUIedit config */
	var nuiIds = 'HtmlEditor:uchome-ifrHtmlEditor:e_iframe';
	var nuiStyleFont = 'UKIJ Ekran';
	var nuiIdsList;
	var nuiId;
	/* check browsers */
	var sysUA = {};
	var ua = navigator.userAgent.toLowerCase();
	var s;
	(s = ua.match(/msie ([\d.]+)/)) ? sysUA.ie = s[1] :
	(s = ua.match(/firefox\/([\d.]+)/)) ? sysUA.firefox = s[1] :
	(s = ua.match(/chrome\/([\d.]+)/)) ? sysUA.chrome = s[1] :
	(s = ua.match(/opera.([\d.]+)/)) ? sysUA.opera = s[1] :
	(s = ua.match(/version\/([\d.]+).*safari/)) ? sysUA.safari = s[1] : 0;

/* set creat editor function here */
/* ... */
/* set keydown, keypress functions */
function nuiKeyFunc(editor,editwin){
	if ( typeof(editor)=="undefined" || editor == null ) {
		nuiId = nuiIdget(nuiIds);
	}else nuiId = editor;
	/* different actions for browsers */
	if (sysUA.ie){
		/* for IE */
		var editor = document.frames[nuiId].document;;
		var editwin = document.frames[nuiId];
		/* event functions */
		editor.body.style.fontFamily=nuiStyleFont;
		editor.onkeypress=function(){
			var charCode=editwin.event.keyCode;
			if(editwin.title!=0){
				charCode = convertCharToUyghur(charCode);
				if(charCode!=0) editwin.event.keyCode=charCode;
			}
		};
		editor.onkeydown=function(){	
			var almash=editwin.event;
			if(almash.ctrlKey && almash.keyCode==75) editwin.title=editwin.title=="0"?"1":"0";
		};
	}else{
		/* for non-IE */
		var editor = document.getElementById(nuiId);
		var editwin = null;
		editor = (editor.contentWindow) ? editor.contentWindow : (editor.contentDocument.document) ? editor.contentDocument.document : editor.contentDocument;
		editor.document.body.style.fontFamily=nuiStyleFont;
		editor.document.addEventListener("keypress",nuiInput,false);
		editor.document.addEventListener("keydown", nuiKeydown, false);
	}
}
/* replace uyghur characters */
	var uyghurChars = {
		"47":"1574",
		"63":"1567",/* ("?") */
		"44":"1548",/* (",") */
		"109":"1605",/* (m yaki M) */
		"77":"1605",
		"110":"1606",/* (n yaki N) */
		"78":"1606",
		"98":"1576",/* (b yaki B) */
		"66":"1576",
		"118":"1736",/* (v yaki V) */
		"86":"1736",
		"99":"1594",/* (c yaki C) */
		"67":"1594",
		"120":"1588",/* (x yaki X) */
		"88":"1588",
		"122":"1586",/* (z yaki Z) */
		"90":"1586",
		"97":"1726",/* (a yaki A) */
		"65":"1726",
		"115":"1587",/* (s yaki S) */
		"83":"1587",
		"100":"1583",/* ("d") */
		"68":"1688",/* ("D") */
		"102":"1575",/* ("f") */
		"70":"1601",/* ("F") */
		"103":"1749",/* ("g") */
		"71":"1711",/* ("G") */
		"104":"1609",/* ("h") */
		"72":"1582",/* ("H") */
		"106":"1602",/* ("j") */
		"74":"1580",/* ("J") */
		"107":"1603",/* ("k") */
		"75":"1734",/* ("K") */
		"108":"1604",/* (l yaki L) */
		"76":"1604",
		"59":"1563",/* (",") */
		"113":"1670",/* (q yaki Q) */
		"81":"1670",
		"119":"1739",/* (w yaki W) */
		"87":"1739",
		"101":"1744",/* (e yaki E) */
		"69":"1744",
		"114":"1585",/* (r yaki R) */
		"82":"1585",
		"116":"1578",/* ("t") */
		"84":"1600",/* ("T") */
		"121":"1610",/* (y yaki Y) */
		"89":"1610",
		"117":"1735",/* (u yaki U) */
		"85":"1735",
		"105":"1709",/* (i yaki I) */
		"73":"1709",
		"111":"1608",/* (o yaki O) */
		"79":"1608",
		"112":"1662",/* (p yaki P) */
		"80":"1662",
		"125":"171", /* (ong qosh tirnaq) */
		"123":"187"/* (sol qosh tirnaq) */
		/*  Add character here */
	};
/* replace function */
function convertCharToUyghur(charStr) {
    return uyghurChars[charStr] || charStr;
}
/* insert function */
function insertTextAtCursor(text) {
    var sel, range, textNode;
		var editor = document.getElementById(nuiId);
		editor = (editor.contentWindow) ? editor.contentWindow : (editor.contentDocument.document) ? editor.contentDocument.document : editor.contentDocument;
    if (editor.getSelection) {
        sel = editor.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            textNode = document.createTextNode(text);
            range.insertNode(textNode);
            /* Move caret to the end of the newly inserted text node */
            range.setStart(textNode, textNode.length);
            range.setEnd(textNode, textNode.length);
            sel.removeAllRanges();
            sel.addRange(range);			
			/* chrome herp baghlashmasliqni hel qilish */
			if(sysUA.chrome){
				var theNodes = textNode.parentNode.childNodes;
				var thisNodesValues = '';
				var theNodesLength = theNodes.length;
				for (i=0;i<theNodesLength;i++) {
					if(theNodes[i].nodeValue != null && textNode==theNodes[i]) {
						var thisNodesValues = theNodes[i].nodeValue;
						var nextNodesValues = theNodes[i].nextSibling.nodeValue;
						var prevNodesValues = theNodes[i].previousSibling.nodeValue;
						/* aldinqi node quruq bolmisa */
						if(prevNodesValues != ''){
							/* aldinqisigha hazirqisini ulaydu*/
							theNodes[i].previousSibling.nodeValue = prevNodesValues+thisNodesValues;
							/* hazirqisini chiqirip tashlaydu */
							textNode.parentNode.removeChild(textNode.parentNode.childNodes[i]);
						}
						break;/* for ahirlishidu */
					}
				}
			}
		}
    } else if (document.selection && document.selection.createRange) {
        range = document.selection.createRange();
        range.pasteHTML(text);
    }
}
/* keypres function */
function nuiInput(evt) {
	evt = evt || window.event;
	var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
	var almash = document.getElementById(nuiId);
	if (almash.title!="1" && charCode && !evt.ctrlKey && (typeof uyghurChars[charCode] !== "undefined") && (sysUA.ie || sysUA.firefox || sysUA.chrome)) {
		var charCode = convertCharToUyghur(charCode);
		var charStr = String.fromCharCode(charCode);
		preventDefault(evt);/* reset enter */
		insertTextAtCursor(charStr);
		return false;
	}
}
/* keydown function */
function nuiKeydown(evt) {
	evt = evt || window.event;
	var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
	var almash = document.getElementById(nuiId);
	if(evt.ctrlKey && charCode==75){
		if(almash.title=="") { almash.title="0";}
		almash.title=almash.title=="0"?"1":"0";
		evt.preventDefault();
		return false;
	}
}
/* reset function */
function preventDefault(evt) {
	if (evt.preventDefault) {
		evt.preventDefault();
	} else if (typeof evt.returnValue !== "undefined") {
		evt.returnValue = false;
	}
}
/* get iframe id */
function nuiIdget(nuiIds){
	if ( typeof(nuiIds) != "undefined" && nuiIds && nuiIds.length != 0 ) {
		nuiIdsList = nuiIds.split ( ':' );
	} else {
		nuiIdsList = new Array();;
	}
	for ( j = 0; j < nuiIdsList.length; j++ ) {
		var frameobj = document.getElementById(nuiIdsList[j]);
		if (frameobj) {nuiId = nuiIdsList[j];break;}
	}
	if ( typeof(nuiId) == "undefined" || !nuiId || nuiId.length != 0 ) var nuiId = 'e_iframe';
	return nuiId;
}