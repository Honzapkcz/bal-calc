<html>
<head>

<link rel="stylesheet" type="text/css" href="text.css">
<style>
body{
 font-size:13px;
 font-family:Verdana;
 color:#000000;
}
</style>
</head>

<body bgcolor="#888888" text="#000000" link="#3d4548" vlink="#7d653c">
<a name="top"></a> <!--Sprungmarke zum Seitenanfang-->


<!--Gesamtabelle: Breite=929-->
<table border="0" cellspacing="0" cellpadding="0" align="center" width="929">

  <tr>
      <td rowspan="6" style="background-image:url(bilder/bg_links.jpg)" valign="top" width="250" height="216" ><p>
          <!-- Logo; max. Breite: 250, Hoehe: 216-->
          <img src="bilder/pp_logo.jpg" width="250" height="216"</p>
 

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

      <td rowspan="5" >&nbsp;</td>

      <!--Titel mit max Breite=675, Hoehe=50-->
      <td>
         <p><img src="bilder/titel3.jpg" width="675" height="50" alt=""></p>
      </td>
  </tr>

  <tr>
      <td height="6"></td>
  </tr>

  <tr>
      <td style="background-image:url(bilder/bg_arena2.jpg)" valign="top">
          <!--Menü contact | home -->
          <p align="right">| <a href="start.html">home</a> |&nbsp;&nbsp;</p>
      </td>
  </tr>

  <tr>
      <td height="5"></td>
  </tr>

  <tr>
      <td style="background-image:url(bilder/bg_arena.jpg); padding:10px;" width="675" valign="top">
  <p>&nbsp;</p>

<!--Textkoerper-->

<!-- Innenballistik 120 bis 140mm Glattrohrkanonen -->

<script type='text/javascript'>

function message(msg)
{
   window.alert(msg);
}

function calculate()
{

ac2 =  34.48
ac1 = -10.0207
ac0 =   0.7628

bc2 = -3.0692
bc1 =  0.89198
bc0 = -0.0679

cc2 = -0.036263
cc1 =  0.008637
cc0 = -0.0005692

dc2 = 226.92
dc1 = -52.244
dc0 =   3.3409

k2_e2 =  5.91687
k2_e1 = -1.83622
k2_e0 =  0.14844

k1_e2 = -71.4755
k1_e1 =  23.0524
k1_e0 =  -2.00142

k0_e2 = 232.72877
k0_e1 = -78.1206
k0_e0 =   8.1352

var kal;
var gbw;
var pmax;
var ml;
var mg;
var fsebert;

msg=""
n_msg= 0

sebert=""

kal     = parseFloat(document.getElementById("kal").value);
        if (kal < 118)   { n_msg=n_msg+1; msg=msg+"- The caliber must be greater or equal 118 mm.<br>";  }
        if (kal > 142)   { n_msg=n_msg+1; msg=msg+"- The caliber must be less or equal 142 mm.<br>";  }

gbw     = parseFloat(document.getElementById("gbw").value);
        if (gbw < 4)   { n_msg=n_msg+1; msg=msg+"- The rojectile travel length must be greater or equal 4 m.<br>";  }
        if (gbw > 7)   { n_msg=n_msg+1; msg=msg+"- The rojectile travel length must be less or equal 7 m.<br>";  }

pmax    = parseFloat(document.getElementById("pmax").value);
        if (pmax < 4000)   { n_msg=n_msg+1; msg=msg+"- The maximum gas pressure must be greater or equal 4000 bar.<br>";  }
        if (pmax > 6500)   { n_msg=n_msg+1; msg=msg+"- The maximum gas pressure must be less or equal 6500 bar.<br>";  }

ml      = parseFloat(document.getElementById("ml").value);
            ml_max=0.4*kal-38;
            ml_min=0.20*kal-18;
        if (ml > ml_max)   { n_msg=n_msg+1; msg=msg+"- The maximum charge mass must be less then "+ ml_max.toFixed(2)+" kg.<br>";  }
        if (ml < ml_min)   { n_msg=n_msg+1; msg=msg+"- The minimum charge mass must be nicht greater than "+ ml_min.toFixed(2)+" kg.<br>";  }

mg      = parseFloat(document.getElementById("mg").value);
            mg_max=0.4*kal-37;
            mg_min=0.1*kal-6;
        if (mg > mg_max)   { n_msg=n_msg+1; msg=msg+"- The maximum projectile mass must be less then "+ mg_max.toFixed(2)+" kg.<br>";  }
        if (mg < mg_min)   { n_msg=n_msg+1; msg=msg+"- The minimum projectile mass must be greater than "+ mg_min.toFixed(2)+" kg.<br>";  }

fsebert = parseFloat(document.getElementById("fsebert").value);
        if (fsebert > 0.48)   { n_msg=n_msg+1; msg=msg+"- The Sebert factor should be between 0.43 and 0.48.<br>";  }
        if (fsebert < 0.43)   { n_msg=n_msg+1; msg=msg+"- The Sebert factor should be between 0.43 and 0.48.<br>";  }


<!-- calculations -->

cal  = kal/1000;                             // Kaliber in (m)

a =  ac2*Math.pow(cal,2) + ac1*cal +ac0;     // Koeffizient a
b =  bc2*Math.pow(cal,2) + bc1*cal +bc0;     // Koeffizient b
c =  cc2*Math.pow(cal,2) + cc1*cal +cc0;     // Koeffizient c
d =  dc2*Math.pow(cal,2) + dc1*cal +dc0;     // Koeffizient d


k2 = k2_e2*Math.pow(cal,2) + k2_e1*cal +k2_e0;
k1 = k1_e2*Math.pow(cal,2) + k1_e1*cal +k1_e0;
k0 = k0_e2*Math.pow(cal,2) + k0_e1*cal +k0_e0;

f = k2*Math.pow(gbw,2) + k1*gbw + k0;

pm = f*pmax*(a*ml+b*mg+c*pmax +d);           // mittlerer Gasdruck

pi = 3.141593;

v0 = Math.pow(pi*pm*Math.pow(cal,2)*gbw/20/(mg+fsebert*ml),0.5);

if(n_msg > 0) { pm=0; v0=0; msg=msg+"- The initial velocity was set to zero.<br>"; };
         
<!-- results -->

document.getElementById('result').innerHTML = '<p style="line-height: 120%" font size="4"><b>Result:</b></p>';
document.getElementById('v_anfang').innerHTML = '<b>Muzzle velocity:  '+ v0.toFixed(3)+' km/s</b>';
document.getElementById('msg').innerHTML    =  msg;
document.getElementById('sebert').innerHTML =  sebert;
} 
</script>

<div style="text-align:left; margin-left:20px; margin-right:20px">

<p><font size="4"><b>Interior Ballistics Calculator</font></b><br></p>

The calculator <b>estimates</b> the achievable muzzle velocity of projectiles fired from <b>smooth-bore tank cannons</b> 
 with a given caliber, projectile travel length, and given charge and projectile mass. The model was developed from a large pool 
of test data with 120 and 140 mm smooth-bore cannons.<br><br>

<p><font size="3"><b>Definitions:</font></b></p>

<table>
  <tr>
    <td valign="top" width="180"><b>Sebert Factor</b> </td>
    <td width="440">The Sebert factor defines the amount of propellant mass flowing together with the bullet through the barrel. Depending
                    on caliber and propellent type it is a value between 0.43 und 0.48.<br><br></td>
  </tr>
  <tr>
    <td valign="top"><b>Projectile Travel Length</b> </td>
    <td>The distance, traveled by the projectile, until it leaves the barrel<br></td>
  </tr>
</table>
<br><br>

<p><font size="3"><b>Boundaries of the input parameters:</font></b></p>

<table>
  <tr>
    <td width="30"> </td>
    <td width="200"><p style="line-height: 120%">Caliber</td>
    <td width="300">118 to 142 mm</td> 
  </tr>
  <tr>
    <td> </td>
    <td><p style="line-height: 120%" align="left">Projectile travel length</td>
    <td>4 to 7 m</td>
  </tr>
  <tr>
    <td> </td>
    <td><p style="line-height: 120%" align="left">Max. gas pressure</td>
    <td>4000 to 6500 bar</td>
  </tr>
  <tr>
    <td> </td>
    <td><p style="line-height: 120%" align="left">Charge mass</td>
    <td>7 to 17.5 kg - depending on caliber</td>
  </tr>
  <tr>
    <td> </td>
    <td><p style="line-height: 120%" align="left">Projectile mass</td>
    <td>5.8 to 19.8 kg - depending on caliber</td>
  </tr>
  <tr>
    <td> </td>
    <td><p style="line-height: 120%" align="left">Sebert factor</td>
    <td>0.43 to 0.48</td>
  </tr>
</table>

<br>
<p><font size="3"><b>Input Values:</font></b></p>

<table>
  <tr>
  <tr>
    <td width="30"> </td>
    <td width="200"><p style="line-height: 120%">Caliber</td>
    <td width="30"><input size="9" value="120" type="float" name="kal" id="kal" ></td>
    <td width="30"> mm</td> 
  </tr>
  <tr>
    <td> </td>
    <td>Projectile travel length</td>
    <td><input size="9" value="6.04" type="float" name="gbw" id="gbw"></td>
    <td> m</td>
  </tr>
  <tr>
    <td> </td>
    <td>Max. gas pressure</td>
    <td><input size="9" value="5500" type="float" name="pmax" id="pmax"></td>
    <td> bar</td>
  </tr>
  <tr>
    <td> </td>
    <td>Charge mass</td>
    <td><input size="9" value="8.9" type="float" name="ml" id="ml"></td>
    <td> kg</td>
  </tr>
  <tr>
    <td> </td>
    <td>Projectile mass</td>
    <td><input size="9" value="8.3" type="float" name="mg" id="mg"> </td>
    <td> kg</td>
  </tr>
  <tr>
    <td> </td>
    <td>Sebert factor</td>
    <td><input size="9" value="0.43" type="float" name="fsebert" id="fsebert"> </td>
    <td> </td>
  </tr>
  </tr>
</table>

<br><br>

<br>
<button onclick="calculate()"><font size="2" color=#d20000><b> calculate </b></font></button><br></p>

<!-- output -->

<p><div id='result'></div></p>

<p><div id='v_anfang'></div></p>

<p><div id='msg'></div></p>

<p><div id='sebert'></div></p>

<br>

<p><font size="3"><b>Generic Examples:</font></b></p>

<table border="3" frame="void">
    <colgroup>
      <col width="200">
      <col width="80">
      <col width="80">
      <col width="80">
      <col width="80">
    </colgroup>

  <tr>
    <td><p align="left">&nbsp;Caliber</td>
    <td><p align="right">120mm&nbsp;</td>
    <td><p align="right">120mm&nbsp;</td>
    <td><p align="right">130mm&nbsp;</td>
    <td><p align="right">140mm&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Tube type</td>
    <td><p align="right">L44&nbsp;</td>
    <td><p align="right">L55&nbsp;</td>
    <td><p align="right">L51&nbsp;</td>
    <td><p align="right">L47&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Projectile travel length (m)</td>
    <td><p align="right">4.74&nbsp;</td>
    <td><p align="right">6.04&nbsp;</td>
    <td><p align="right">5.87&nbsp;</td>
    <td><p align="right">5.71&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Max. gas pressure (bar)</td>
    <td><p align="right">5500&nbsp;</td>
    <td><p align="right">5500&nbsp;</td>
    <td><p align="right">5500&nbsp;</td>
    <td><p align="right">5500&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Charge mass (kg)</td>
    <td><p align="right">8.9&nbsp;</td>
    <td><p align="right">8.9&nbsp;</td>
    <td><p align="right">12.5&nbsp;</td>
    <td><p align="right">16.5&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Projectile mass (kg)</td>
    <td><p align="right">8.3&nbsp;</td>
    <td><p align="right">8.3&nbsp;</td>
    <td><p align="right">11&nbsp;</td>
    <td><p align="right">14&nbsp;</td>
  </tr>
  <tr>
    <td><p align="left">&nbsp;Sebert factor</td>
    <td><p align="right">0.43&nbsp;</td>
    <td><p align="right">0.43&nbsp;</td>
    <td><p align="right">0.44&nbsp;</td>
    <td><p align="right">0.45&nbsp;</td>
  </tr>
  <tr)>
    <td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr bgcolor="#90B8CC">
    <td><p align="left">&nbsp;<b>Muzzle velocity (km/s)</b></td>
    <td><p align="right"><b>1.679&nbsp;</td>
    <td><p align="right"><b>1.762&nbsp;</td>
    <td><p align="right"><b>1.693&nbsp;</td>
    <td><p align="right"><b>1.686&nbsp;</td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td><td></td>
  </tr>
</table>

</div>

</body>


<!--Textkoerper Ende--></td>
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

    <td><a href="#top"><img src="bilder/pfeil.jpg"width="18" height="28" border="0"></a></td>
  </td>
</table>
<td>&nbsp;</td>  
</td>

</tr>
</table>

</body>
</html>
 