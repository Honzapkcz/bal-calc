extends Control

var choice = ""
var mat: int = TUNGSTEN
var process: int = PERFORATION
var selectElement
var value1
var value2

enum {
	PERFORATION,
	PENETRATION,
}
enum {
	TUNGSTEN,
	DU,
	STEEL,
}

func _ready():
	($Select/mode as OptionButton).get_popup().add_theme_font_size_override("font_size", 48)
	($Select/material as OptionButton).get_popup().add_theme_font_size_override("font_size", 48)

func calculate():
	var msg: String
	var n_msg: int
	var n_not_vmin: int
	var lw = 0
	var lwd = 0
	var elwd = 0
	var enato = 0
	var edens = 0
	var eterm5_t = 0
	var eterm5_d = 0
	var eterm5_s = 0
	var eterm5_sit = 0
	var vt_min = 0
	var vt_s = 0
	var vt_min_s = 0
	var perf = 0
	var pene = 0
	
	var b0 = 0.283
	var b1 = 0.0656
	var m = -0.224
	var a_t = 0.994
	var a_sit = 0.921
	var a_d = 0.825
	var a_s = 1.104
	var c0_t = 134.5
	var c0_sit = 138
	var c0_d = 90.0
	var c0_s = 9874.0
	var c1_t = -0.148
	var c1_sit = -0.100
	var c1_d = -0.0849
	var k_s = 0.3598
	var n_s = -0.2342
	var p_len: int
	var dia: int
	var f_len: int
	var df: int
	var rhop: int
	var bhnp: int
	var vt: float
	var rhot: int
	var bhnt: int
	var nato: int
	msg = "\nThe following input value(s) is (are) not correct:\n\n"
	n_msg = 0
	n_not_vmin = 0
	if (choice == "1"):
		process = value1
	
	if (choice == "2"):
		mat = value2

	p_len=$p_len.value
	if(p_len == 0):
		n_msg=n_msg+1
		msg=msg+"- The penetrator length must be greater than 0 mm.\n"

	dia=$dia.value
	if(dia == 0):
		n_msg=n_msg+1
		msg=msg+"- The penetrator diameter must be greater than 0 mm.\n"

	f_len=$f_len.value
	df=$df.value
	if(df>dia):
		n_msg=n_msg+1
		msg=msg+"- The upper frustum diameter must be equal or less than the penetrator diameter.\n"

	rhop=$rhop.value
	bhnp=$bhnp.value
	vt=$vt.value
	rhot=$rhot.value
	if(rhot<7700):
		n_msg=n_msg+1
		n_not_vmin=1
		msg=msg+"- The target density (steel: 7700 to 8000 kg/m^3) is out of range.\n"
   
	if(rhot>8000):
		n_msg=n_msg+1
		n_not_vmin=1
		msg=msg+"- The target density (steel: 7700 to 8000 kg/m^3)) is out of range.\n"
   
	bhnt=$bhnt.value
	nato=$nato.value
	if(process == PERFORATION):
		if(nato>75):
			n_msg=n_msg+1
			msg=msg+"- The NATO obliquity must be equal or less than 75.\n"
	  
	   
	lw=p_len-f_len*(1-(1+float(df)/float(dia)*(1+float(df)/float(dia)))/3)
	lwd=lw/dia
	if(lwd<4):
		n_msg=n_msg+1
		msg=msg+"- The aspect ratio must be equal or greater than 4.\n"
	   
	elwd=1/tanh(b0+b1*lwd)
	var nato_s=nato
	enato=pow(cos(float(nato)/180*PI),m)
	edens=pow(float(rhop)/float(rhot),0.5)
	vt_s=vt

	if(mat == TUNGSTEN and process == PERFORATION):
		eterm5_t=exp(-(c0_t+c1_t*bhnt)*bhnt/rhop/vt_s/vt_s)
		print("eterm5_t: ", eterm5_t)
		vt_min=pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5)
		print("vt_min: ", vt_min)
		vt_min_s=vt_min
		if(vt<vt_min):
			n_msg=n_msg+1
			msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+str(vt_min_s)+" km/s)   for eroding penetration.\n"
		  
		if(bhnt<149):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be greater or equal than 150.\n"
		  
		if(bhnt>501):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be less or equal than 500.\n"
		  
		if(rhop<16500):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n"
		  
		if(rhop>19300):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be less than 19300 kg/m^3.\n"
		  
		perf=a_t*lw*elwd*enato*edens*eterm5_t
		print("perf: ", perf)
		print("a_t: ", a_t)
		print("lw: ", lw)
		print("lwd: ", lwd)
		print("nato: ", nato)
		print("enato: ", enato)
		print("edens: ", edens)
		if(n_msg>0):
			perf=0
		  
		GlobalPopup.show_panel('The <b>perforation limit</b> of the tungsten penetrator is '+str(perf)+' mm.')
   
	if(mat == DU and process == PERFORATION):
		eterm5_d=exp(-(c0_d+c1_d*bhnt)*bhnt/rhop/vt_s/vt_s)
		vt_min=pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5)
		vt_min_s=vt_min
		if(vt<vt_min):
			n_msg=n_msg+1
			msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+str(vt_min_s)+" km/s)   for eroding penetration.\n"
	  
		if(bhnt<149):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be greater or equal than 150.\n"
		  
		if(bhnt>501):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be less or equal than 500.\n"
		  
		if(rhop<16500):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n"
		  
		if(rhop>19100):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be less than 19100 kg/m^3.\n"
		  
		perf=a_d*lw*elwd*enato*edens*eterm5_d
		if(n_msg>0):
			perf=0
		  
		GlobalPopup.show_panel('The <b>perforation limit</b> of the DU penetrator is '+str(perf)+' mm.')
   
	if(mat == STEEL and process == PERFORATION):
		eterm5_s=exp(-c0_s*pow(bhnt,k_s)*pow(bhnp,n_s)/rhop/vt_s/vt_s)
		vt_min=pow(c0_s*pow(bhnt,k_s)*pow(bhnp,n_s)/rhop/1.5,0.5)
		vt_min_s=vt_min
		if(vt<vt_min):
			n_msg=n_msg+1
			msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+str(vt_min_s)+" km/s)   for eroding penetration.\n"
	  
		if(bhnt<119):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be greater or equal than 120.\n"
		  
		if(bhnt>551):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be less or equal than 550.\n"
		  
		if(bhnp<199):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator hardness should be greater or equal than 200.\n"
		  
		if(bhnp>751):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator hardness should be less or equal than 750.\n"
		  
		perf=a_s*lw*elwd*enato*edens*eterm5_s
		if(rhop<7700):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The density of the steel penetrator should be greater than 7700 kg/m^3.\n"
		  
		if(rhop>8500):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The density of the steel penetrator should be less than 8500 kg/m^3.\n"
		  
		if(is_nan(bhnp)):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator hardness is not defined.\n"
		  
		if(n_msg>0):
			perf=0
		  
		GlobalPopup.show_panel('The <b>perforation limit</b> of the steel penetrator is '+str(perf)+' mm.')
		  
   
	if(mat == TUNGSTEN and process == PENETRATION):
		eterm5_sit=exp(-(c0_sit+c1_sit*bhnt)*bhnt/rhop/vt_s/vt_s)
		vt_min=pow((c0_sit+c1_sit*bhnt)*bhnt/rhop/1.8,0.5)
		vt_min_s=vt_min
		if(vt<vt_min):
			n_msg=n_msg+1
			msg=msg+"- The impact velocity is less than the minimal velocity \n   ("+str(vt_min_s)+" km/s)   for eroding penetration.\n"
		  
		if(bhnt<199):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be greater or equal than 200.\n"
		  
		if(bhnt>601):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The target hardness should be less or equal than 600.\n"
		  
		if(rhop<16500):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be greater than 16500 kg/m^3.\n"
		  
		if(rhop>19300):
			n_msg=n_msg+1
			n_not_vmin=1
			msg=msg+"- The penetrator density should be less than 19300 kg/m^3.\n"
		  
		pene=a_sit*lw*elwd*edens*eterm5_sit
		if(n_msg>0):
			pene=0
	  
		GlobalPopup.show_panel('The <b>penetration depth</b> of the tungsten penetrator is '+str(pene)+' mm.<br>The obliquity was set to zero.')
   
	if(mat == DU and process == PENETRATION):
		GlobalPopup.show_panel('The calculation of the penetration depth is only valid for tungsten.')
   
	if(mat == STEEL and process == PENETRATION):
		GlobalPopup.show_panel('The calculation of the penetration depth is only valid for tungsten.')
   
	if(n_msg>0):
		pene=0
		msg=msg+"- The Penetration/Perforation Limit was set to 0 mm.\n"
		GlobalPopup.show_panel(msg)


func _on_mode_item_selected(index: int):
	process = index - 1


func _on_material_item_selected(index: int):
	mat = index - 1
