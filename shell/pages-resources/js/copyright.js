<!--
/* 
 *#########################################################################
 * JavaScript Auto Update Copyright Year(s) - OneMadEye (c) September 2007  
 *#########################################################################
 */

function y2k(number) { return (number < 1000) ? number + 1900 : number; }
var today = new Date();
var year = y2k(today.getYear());
document.write(''+year+'');

//-->