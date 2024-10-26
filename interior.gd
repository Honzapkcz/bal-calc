extends Control


const ac2: float =  34.48
const ac1: float = -10.0207
const ac0: float =   0.7628
const bc2: float = -3.0692
const bc1: float =  0.89198
const bc0: float = -0.0679
const cc2: float = -0.036263
const cc1: float =  0.008637
const cc0: float = -0.0005692
const dc2: float = 226.92
const dc1: float = -52.244
const dc0: float =   3.3409
const k2_e2: float =  5.91687
const k2_e1: float = -1.83622
const k2_e0: float =  0.14844
const k1_e2: float = -71.4755
const k1_e1: float =  23.0524
const k1_e0: float =  -2.00142
const k0_e2: float = 232.72877
const k0_e1: float = -78.1206
const k0_e0: float =   8.1352
const pi: float = 3.141593

var msg
var n_msg
var document
var ml_max
var ml_min
var mg_max
var mg_min
var cal
var a
var b
var c
var d
var k2
var k1
var k0
var f
var pm
var v0

func calculate():
	var kal
	var gbw
	var pmax
	var ml
	var mg
	var fsebert

	msg=""
	n_msg= 0

	kal = float(document.getElementById("kal").value)
	if (kal < 118):
		n_msg=n_msg+1
		msg=msg+"- The caliber must be greater or equal 118 mm.<br>"
	if (kal > 142):
		n_msg=n_msg+1
		msg=msg+"- The caliber must be less or equal 142 mm.<br>"

	gbw = float(document.getElementById("gbw").value)
	if (gbw < 4):
		n_msg=n_msg+1
		msg=msg+"- The rojectile travel length must be greater or equal 4 m.<br>" 
	if (gbw > 7):
		n_msg=n_msg+1
		msg=msg+"- The rojectile travel length must be less or equal 7 m.<br>" 

	pmax = float(document.getElementById("pmax").value)
	if (pmax < 4000):
		n_msg=n_msg+1
		msg=msg+"- The maximum gas pressure must be greater or equal 4000 bar.<br>"
	if (pmax > 6500):
		n_msg=n_msg+1
		msg=msg+"- The maximum gas pressure must be less or equal 6500 bar.<br>"

	ml = float(document.getElementById("ml").value)
	ml_max=0.4*kal-38
	ml_min=0.20*kal-18
	if (ml > ml_max):
		n_msg=n_msg+1
		msg=msg+"- The maximum charge mass must be less then "+ ml_max.toFixed(2)+" kg.<br>"
	if (ml < ml_min):
		n_msg=n_msg+1
		msg=msg+"- The minimum charge mass must be nicht greater than "+ ml_min.toFixed(2)+" kg.<br>"

	mg = float(document.getElementById("mg").value)
	mg_max=0.4*kal-37
	mg_min=0.1*kal-6
	if (mg > mg_max):
		n_msg=n_msg+1
		msg=msg+"- The maximum projectile mass must be less then "+ mg_max.toFixed(2)+" kg.<br>"
	if (mg < mg_min):
		n_msg=n_msg+1
		msg=msg+"- The minimum projectile mass must be greater than "+ mg_min.toFixed(2)+" kg.<br>"

	fsebert = float(document.getElementById("fsebert").value)
	if (fsebert > 0.48):
		n_msg=n_msg+1
		msg=msg+"- The Sebert factor should be between 0.43 and 0.48.<br>"
	if (fsebert < 0.43):
		n_msg=n_msg+1
		msg=msg+"- The Sebert factor should be between 0.43 and 0.48.<br>"


	# <!-- calculations -->

	cal = kal/1000                              #  Kaliber in (m)

	a =  ac2*cal**2 + ac1*cal +ac0     #  Koeffizient a
	b =  bc2*cal**2 + bc1*cal +bc0     #  Koeffizient b
	c =  cc2*cal**2 + cc1*cal +cc0     #  Koeffizient c
	d =  dc2*cal**2 + dc1*cal +dc0     #  Koeffizient d


	k2 = k2_e2*cal**2 + k2_e1*cal +k2_e0
	k1 = k1_e2*cal**2 + k1_e1*cal +k1_e0
	k0 = k0_e2*cal**2 + k0_e1*cal +k0_e0

	f = k2*gbw**2 + k1*gbw + k0

	pm = f*pmax*(a*ml+b*mg+c*pmax +d)          #  mittlerer Gasdruck

	v0 = (pi*pm*cal**2*gbw/20/(mg+fsebert*ml)**0.5)

	if(n_msg > 0):
		pm=0
		v0=0
		msg=msg+"- The initial velocity was set to zero.<br>"
			 
	# <!-- results -->

	document.getElementById('result').innerHTML = '<p style="line-height: 120%" font size="4"><b>Result:</b></p>'
	document.getElementById('v_anfang').innerHTML = '<b>Muzzle velocity:  '+ str(snappedf(v0, 0.001))+' km/s</b>'
	document.getElementById('msg').innerHTML =  msg
