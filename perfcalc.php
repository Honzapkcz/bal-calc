<html>
<head>

<style>body,table,td,tr,div,p,pre,h1,h2,h3,h4,ul, {font-family:"Verdana",Arial,Helvetica,sans-serif}body,td,div,p,pre,ul{font-size:13px}h1{font-size:16px}h2{font-size:14px}h3{font-size:13px}.small{font-size:12px}.mini{font-size:11px}.minimini{font-size:10px}a{font-size:13px;text-decoration:none}a:link{color:#333}a:visited{color:#933}a:active{color:#333}a:hover{color:#000}</style>
<style>body{font-size:13px;font-family:Verdana;color:#000}</style>
</head>

<body bgcolor="#888888" text="#000000" link="#3d4548" vlink="#7d653c">
<a name="top"></a> <!--Sprungmarke zum Seitenanfang-->


<!--Gesamtabelle: Breite=929-->
<table border="0" cellspacing="0" cellpadding="0" align="center" width="929">

  <tr>
      <td rowspan="6" style="background-image:url(bilder/bg_links.jpg)" valign="top" width="250" height="216"><p>
          <!-- Logo; max. Breite: 250, Hoehe: 216-->
          <img src="bilder/xpp_logo.jpg.pagespeed.ic.BmXldXZZzw.jpg" width="250" height="216" < p>
 

<div style="text-align:left; padding:5px; margin:10px">

<p><font size="2"><b>The Ammunition</font></b></p>
<UL>
<LI><A HREF="round.php">The Round</A></LI>
<LI><A HREF="compo.php">Components</A></LI>
</UL>

<p><font size="2"><b>Ballistics</b></font></p>
<UL>
<LI><A HREF="accel.php">Acceleration in the Gun Tube</A></LI>
<LI><A HREF="muzzle.php">Muzzle Exit</A></LI>
<LI><A HREF="tube.php">Interior Ballistics<br>Calculator</A></LI>
<LI><A HREF="flight.php">Exterior Ballistics<br>Firing Table Calculator</A></LI>
</UL>

<p><font size="2"><b>Perforation of Finite Targets</b></font></p>
<UL>
<LI><A HREF="process.php">Penetration Process</A></LI>
<LI><A HREF="perflimit.php">Perforation Limit</A></LI>
<LI><A HREF="govpars.php">Governing Parameters</A></LI>
<LI><A HREF="wlength.php">Working Length</A></LI>
<LI><A HREF="perfeq.php">Perforation Equation</A></LI>
</UL>

<p><font size="2"><b>Penetration in Semi-Infinite Targets</b></font></p>

<UL>
<LI><A HREF="semi.php">Semi-infinite Targets</A></LI>
<LI><A HREF="peneq.php">Penetration Equation</A></LI>
</UL>

<p><font size="2"><b>Penetration and Perforation Calculations</b></font></p>
<UL>
<LI><A HREF="perfcalc.php">The Calculator</A></LI>
</UL>


<p><font size="2"><b>Applications</b></font></p>
<UL>
<LI><A HREF="optv.php">Optimum Velocity</A></LI>
<LI><A HREF="givgun.php">Max. Perforation with a given Gun System</A></LI>
</UL>

<p><font size="2"><b>Covid-19 Case Numbers - Similarity with Penetration</b></font></p>
<UL>
<LI><A HREF="coveq.php">General Equation</A></LI>
<LI><A HREF="covch.php">Case Numbers in Switzerland</A></LI>
</UL>

<p><font size="2"><b>Papers</b></font></p>
<UL>
<LI><A HREF="down.php">Download</A></LI>
</UL>

<p>&nbsp;</p>

</div>
      </td>

      <td rowspan="5">&nbsp;</td>

      <!--Titel mit max Breite=675, Hoehe=50-->
      <td>
         <p><img src="bilder/xtitel3.jpg.pagespeed.ic.03WGD3Lm2R.jpg" width="675" height="50" alt=""></p>
      </td>
  </tr>

  <tr>
      <td height="6"></td>
  </tr>

  <tr>
      <td style="background-image:url(bilder/bg_arena2.jpg)" valign="top">
          <!--Menü contact | home -->
          <p align="right">| <a href="kontakt.php">contact</a> | <a href="start.html">home</a> |&nbsp;&nbsp;</p>
      </td>
  </tr>

  <tr>
      <td height="5"></td>
  </tr>

  <tr>
      <td style="background-image:url(bilder/bg_arena.jpg); padding:10px;" width="675" valign="top">
  <p>&nbsp;</p>

<!--Textkoerper-->

<!-- Perforation / Penetration Calculator -->
<script type='text/javascript'>
<div>
function select_mode(event){
    choice = "1";
    selectElement = event.target;
    value1 = selectElement.value;
}
function select_mat(event){
   	choice = "2";
    selectElement = event.target;
    value2 = selectElement.value;
}
function message(msg){
   	window.alert(msg);
}
function calculate({
   	b0 = 0.283;
    b1 = 0.0656;
    m = -0.224;
    a_t = 0.994;
    a_sit = 0.921;
    a_d = 0.825;
    a_s = 1.104;
    c0_t = 134.5;
    c0_sit = 138;
    c0_d = 90.0;
    c0_s = 9874.0;
    c1_t = -0.148;
    c1_sit = -0.100;
    c1_d = -0.0849;
    k_s = 0.3598;
    n_s = -0.2342;
    var p_len;
    var dia;
    var f_len;
    var df;
    var rhop;
    var bhnp;
    var vt;
    var rhot;
    var bhnt;
    var nato;
    msg = "\nThe following input value(s) is (are) not correct:\n\n";
    n_msg = 0
   	n_not_vmin = 0
   	if (choice = "1") {
   	   process = value1;
   	}
   	if (choice = "2") {
   	   mat = value2;
   	}
   	p_len=parseFloat(document.getElementById("p_len").value);
   	if(p_len==0){
   	   n_msg=n_msg+1;msg=msg+"- The penetrator length must be greater than 0 mm.\n";
   	}
   	dia=parseFloat(document.getElementById("dia").value);
   	if(dia==0){n_msg=n_msg+1;
   	   msg=msg+"- The penetrator diameter must be greater than 0 mm.\n";
   	}
   	f_len=parseFloat(document.getElementById("f_len").value);
   	df=parseFloat(document.getElementById("df").value);
   	if(df>dia){
   	   n_msg=n_msg+1;
   	   msg=msg+"- The upper frustum diameter must be equal or less than the penetrator diameter.\n";
   	}
   	rhop=parseFloat(document.getElementById("rhop").value);
   	bhnp=parseFloat(document.getElementById("bhnp").value);
    vt=parseFloat(document.getElementById("vt").value);
    rhot=parseFloat(document.getElementById("rhot").value);
    if(rhot<7700){n_msg=n_msg+1;
       n_not_vmin=1;
       msg=msg+"- The target density (steel: 7700 to 8000 kg/m^3) is out of range.\n";
   }
   if(rhot>8000){
      n_msg=n_msg+1;
      n_not_vmin=1;
      msg=msg+"- The target density (steel: 7700 to 8000 kg/m^3)) is out of range.\n";
   }
   bhnt=parseFloat(document.getElementById("bhnt").value);
   nato=parseFloat(document.getElementById("nato").value);
   if(process=="Perforation"){
      if(nato>75){
         n_msg=n_msg+1;
         msg=msg+"- The NATO obliquity must be equal or less than 75.\n";
      }
   }
   lw=p_len-f_len*(1-(1+df/dia*(1+df/dia))/3);
   lwd=lw/dia;
   if(lwd<4){
      n_msg=n_msg+1;
      msg=msg+"- The aspect ratio must be equal or greater than 4.\n";
   }
   elwd=1/Math.tanh(b0+b1*lwd);
   let nato_s=nato.toFixed(2);
   enato=Math.pow(Math.cos(nato_s/180*Math.PI),m);
   edens=Math.pow(rhop/rhot,0.5);
   let vt_s=vt.toFixed(3);
   if(mat=="Tungsten"&&process=="Perforation"){
      eterm5_t=Math.exp(-(c0_t+c1_t*bhnt)*bhnt/rhop/vt_s/vt_s);
      vt_min=Math.pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5);
      let vt_min_s=vt_min.toFixed(3);
      if(vt<vt_min){
         n_msg=n_msg+1;
         msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+vt_min_s+" km/s)   for eroding penetration.\n";
      }
      if(bhnt<149){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be greater or equal than 150.\n";
      }
      if(bhnt>501){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be less or equal than 500.\n";
      }
      if(rhop<16500){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n";
      }
      if(rhop>19300){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be less than 19300 kg/m^3.\n";
      }
      perf=a_t*lw*elwd*enato*edens*eterm5_t;
      if(n_msg>0){
         perf=0;
      }
      document.getElementById('result').innerHTML='The <b>perforation limit</b> of the tungsten penetrator is '+perf.toFixed(1)+' mm.';
   }
   if(mat=="DU"&&process=="Perforation"){
      eterm5_d=Math.exp(-(c0_d+c1_d*bhnt)*bhnt/rhop/vt_s/vt_s);
      vt_min=Math.pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5);
      let vt_min_s=vt_min.toFixed(3);
      if(vt<vt_min){
         n_msg=n_msg+1;
         msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+vt_min_s+" km/s)   for eroding penetration.\n";
      }
      if(bhnt<149){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be greater or equal than 150.\n";
      }
      if(bhnt>501){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be less or equal than 500.\n";
      }
      if(rhop<16500){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n";
      }
      if(rhop>19100){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be less than 19100 kg/m^3.\n";
      }
      perf=a_d*lw*elwd*enato*edens*eterm5_d;
      if(n_msg>0){
         perf=0;
      }
      document.getElementById('result').innerHTML='The <b>perforation limit</b> of the DU penetrator is '+perf.toFixed(1)+' mm.';
   }
   if(mat=="Steel"&&process=="Perforation"){
      eterm5_s=Math.exp(-c0_s*Math.pow(bhnt,k_s)*Math.pow(bhnp,n_s)/rhop/vt_s/vt_s);
      vt_min=Math.pow(c0_s*Math.pow(bhnt,k_s)*Math.pow(bhnp,n_s)/rhop/1.5,0.5);
      let vt_min_s=vt_min.toFixed(3);
      if(vt<vt_min){
         n_msg=n_msg+1;
         msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+vt_min_s+" km/s)   for eroding penetration.\n";
      }
      if(bhnt<119){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be greater or equal than 120.\n";
      }
      if(bhnt>551){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be less or equal than 550.\n";
      }
      if(bhnp<199){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator hardness should be greater or equal than 200.\n";
      }
      if(bhnp>751){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator hardness should be less or equal than 750.\n";
      }
      perf=a_s*lw*elwd*enato*edens*eterm5_s;
      if(rhop<7700){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The density of the steel penetrator should be greater than 7700 kg/m^3.\n";
      }
      if(rhop>8500){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The density of the steel penetrator should be less than 8500 kg/m^3.\n";
      }
      if(isNaN(bhnp)){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator hardness is not defined.\n";
      }
      if(n_msg>0){
         perf=0;
      }
      {
         document.getElementById('result').innerHTML='The <b>perforation limit</b> of the steel penetrator is '+perf.toFixed(1)+' mm.';
      }
   }
   if(mat=="Tungsten"&&process=="Penetration"){
      eterm5_sit=Math.exp(-(c0_sit+c1_sit*bhnt)*bhnt/rhop/vt_s/vt_s);
      vt_min=Math.pow((c0_sit+c1_sit*bhnt)*bhnt/rhop/1.8,0.5);
      let vt_min_s=vt_min.toFixed(3);
      if(vt<vt_min){
         n_msg=n_msg+1;
         msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+vt_min_s+" km/s)   for eroding penetration.\n";
      }
      if(bhnt<199){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be greater or equal than 200.\n";
      }
      if(bhnt>601){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The target hardness should be less or equal than 600.\n";
      }
      if(rhop<16500){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n";
      }
      if(rhop>19300){
         n_msg=n_msg+1;
         n_not_vmin=1;
         msg=msg+"- The penetrator density should be less than 19300 kg/m^3.\n";
      }
      pene=a_sit*lw*elwd*edens*eterm5_sit;
      if(n_msg>0){
         pene=0;
      }
      document.getElementById('result').innerHTML='The <b>penetration depth</b> of the tungsten penetrator is '+pene.toFixed(1)+' mm.<br>The obliquity was set to zero.';
   }
   if(mat=="DU"&&process=="Penetration"){
      document.getElementById('result').innerHTML='The calculation of the penetration depth is only valid for tungsten.';
   }
   if(mat=="Steel"&&process=="Penetration"){
      document.getElementById('result').innerHTML='The calculation of the penetration depth is only valid for tungsten.';
   }
   if(n_msg>0){
      pene=0;
      msg=msg+"- The Penetration/Perforation Limit was set to 0 mm.\n";
      message(msg);
   };
}</div>
</script>

<body>


<div style="text-align:left; margin-left:30px; margin-right:30px">

<p><font size="4"><b>Penetration and Perforation Calculator</font></b><br></p>

<p><img src="bilder/xpene_def.jpg.pagespeed.ic.MM389WapSH.jpg" alt=""></p>

<p><font size="3"><b>Penetrator</b></font></p>

<select onchange="select_mode(event)">
    <option value="Choice">-- choose! --</option>
    <option value="Perforation">Perforation</option>
    <option value="Penetration">Penetration</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;Mode: Penetration or Perforation<br/><br/>


<select onchange="select_mat(event)">
    <option value="Choice">-- choose! --</option>
    <option value="Tungsten">Tungsten</option>
    <option value="DU">DU</option>
    <option value="Steel">Steel</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;Material Type: Tungsten, DU or Steel&nbsp<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Case of Penetration: Only Tungsten available<br/>

<p><font color=#AC0C10>The penetration mode and the penetrator material must be selected with the above popups, otherwise there will be no calculation!</font></p><br>

<table border="0">
 <colgroup>
    <col width="20">
    <col width="280">
    <col width="60">
    <col width="250">
  </colgroup>

 <tr>
    <td></td>
    <td>1 - Total length of penetrator material</td>
    <td><input size="5" value="950" type="float" name="p_len" id="p_len"></td>
    <td> mm</td>
 </tr>
 <tr>
    <td></td>
    <td>2 - Diameter</td>
    <td><input size="5" value="27" type="float" name="dia" id="dia"></td>
    <td> mm</td>
 </tr>
 <tr>
    <td></td>
    <td>3 - Frustum length</td>
    <td><input size="5" value="80" type="float" name="f_len" id="f_len"></td>
    <td> mm</td>
 </tr>
 <tr>
    <td></td>
    <td>4 - Frustum diameter upper base</td>
    <td><input size="5" value="6" type="float" name="df" id="df"></td>
    <td> mm</td>
 </tr>
 <tr>
    <td></td>
    <td>Density</td>
    <td><input size="5" value="17200" type="float" name="rhop" id="rhop"></td>
    <td> kg/m<sup>3</sup></td>
 </tr>
 <tr>
    <td></td>
    <td>Brinell Hardness Number</td>
    <td><input size="5" value="" type="float" name="bhnp" id="bhnp"></td>
    <td> required for steel penetrators</td>
 </tr>
 <tr>
    <td></td>
    <td>Impact velocity</td>
    <td><input size="5" value="1.737" type="float" name="vt" id="vt"></td>
    <td> km/s</td>
 </tr>
</table>

<p><font size="3"><b>Target</b></font></p>

<table border="0">
 <colgroup>
    <col width="20">
    <col width="280">
    <col width="60">
    <col width="250">
  </colgroup>

 <tr>
    <td></td>
    <td>Density</td>
    <td><input size="5" value="7850" type="float" name="rhot" id="rhot"></td>
    <td> kg/m<sup>3</sup></td>
 </tr>
 <tr>
    <td></td>
    <td>Brinell Hardness Number</td>
    <td><input size="5" value="237" type="float" name="bhnt" id="bhnt"></td>
    <td> </td>
 </tr>
 <tr>
    <td></td>
    <td>NATO obliquity</td>
    <td><input size="5" value="60" type="float" name="nato" id="nato"></td>
    <td> Â° (not required for pene-process)</td>
 </tr>
</table>

<br>
<button onclick="calculate()"><font size="2" color=#D20000><b> calculate </b></font></button><br></p>

<!-- output -->

<!-- <p><div id='work-length'></div></p> -->
<!-- <p><div id='aspect-ratio'></div></p> -->
<!-- <p><div id='LoD-influence'></div></p> -->
<!-- <p><div id='obliquity-influence'></div></p> -->
<!-- <p><div id='density-influence'></div></p> -->
<!-- <p><div id='dynamic-influence'></div></p> -->

<p><size="3"><div id='result'></div></p>

<!--||| Ende Formular |||-->

</div>

</body></td>
</tr>

<tr>
  <!--Schwarze Trennzeile_unten-->
  <td width="565" height="15">&nbsp;</td>
</tr>

<tr>

  <td style="background-image:url(bilder/bg_links.jpg)">&nbsp;</td>
  <td>&nbsp;</td>

  <!--Tab. mit Copyright/Mail-->
  <td style="background-image:url(bilder/bg_arena3.jpg)" width="565" valign="top">

<table border="0" frame="void">
  <colgroup>
    <col width="350">
    <col width="60">
    </colgroup>


    <td><a align="left">&nbsp;&nbsp;&nbsp;&copy; April 2022   by Willi Odermatt</a></td>

    <td><a href="#top"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCAAcABIDASIAAhEBAxEB/8QAGAABAQEBAQAAAAAAAAAAAAAAAAQFAgb/xAAnEAACAQMDAwMFAAAAAAAAAAABAgMABBEFEiFBUYEGFDEiMlJhsf/EABYBAQEBAAAAAAAAAAAAAAAAAAQDBv/EACARAAIBBAEFAAAAAAAAAAAAAAECAAMEESEFEhNBUWH/2gAMAwEAAhEDEQA/ANrV7v28QhibE8oO3n7R1bx/SKj0S4Nu4spHkdGJMTu2SD+JPz3I8jtXeu2NsLa6vwJBcbM7hK2OPjjOMfrHeptMsbe+kuvdLIwSRQmJWUDjPQjrQXNXvqAdTT2tOxPEu7qesEDOtHxj5PQUpSnTMSPWkeTSblI0Z2MZwqjJPipfTquDdu0UsYeQFd6FSfpHQ1rUqZpguG9RaXzJatQA0SDFKUqkJP/Z" border="0"></a></td>
  </td>
</table>
<td>&nbsp;</td>
</td>

</tr>
</table>

</body>
</html>
 
