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

var ml_max: float
var ml_min: float
var mg_max: float
var mg_min: float
var cal: float
var a: float
var b: float
var c: float
var d: float
var k2: float
var k1: float
var k0: float
var f: float
var pm: float
var v0: float

func calculate():
	var kal: float
	var gbw: float
	var pmax: float
	var ml: float
	var mg: float
	var fsebert: float

	kal = float($S/V/kal.value)
	gbw = float($S/V/gbw.value)
	pmax = float($S/V/pmax.value)
	ml = float($S/V/ml.value)
	mg = float($S/V/mg.value)
	fsebert = float($S/V/fsebert.value)
	

	cal = kal/1000.0                              #  Kaliber in (m)

	a =  ac2*cal**2 + ac1*cal +ac0     #  Koeffizient a
	b =  bc2*cal**2 + bc1*cal +bc0     #  Koeffizient b
	c =  cc2*cal**2 + cc1*cal +cc0     #  Koeffizient c
	d =  dc2*cal**2 + dc1*cal +dc0     #  Koeffizient d

	k2 = k2_e2*cal**2 + k2_e1*cal +k2_e0
	k1 = k1_e2*cal**2 + k1_e1*cal +k1_e0
	k0 = k0_e2*cal**2 + k0_e1*cal +k0_e0

	f = k2*gbw**2 + k1*gbw + k0

	pm = f*pmax*(a*ml+b*mg+c*pmax +d)          #  mittlerer Gasdruck

	v0 = pow(pi * pm * pow(cal, 2) * gbw / 20 / (mg + fsebert * ml), 0.5); 
	
	GlobalPopup.show_panel("Muzzle velocity:  " + str(snappedf(v0, 0.001)) + " km/s\n")
