extends Control

var choice = ""
var mat: int = TUNGSTEN
var process: int = PERFORATION

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
	($mode as OptionButton).get_popup().add_theme_font_size_override("font_size", 48)
	($material as OptionButton).get_popup().add_theme_font_size_override("font_size", 48)

func calculate():
	var msg: String
	var lw: float
	var lwd: float
	var elwd: float
	var enato: float
	var edens: float
	var eterm5_t: float
	var eterm5_d: float
	var eterm5_s: float
	var eterm5_sit: float
	var vt_min: float
	var vt_s: float
	var vt_min_s: float
	var perf: float
	var pene: float
	
	var b0: float = 0.283
	var b1: float = 0.0656
	var m: float = -0.224
	var a_t: float = 0.994
	var a_sit: float = 0.921
	var a_d: float = 0.825
	var a_s: float = 1.104
	var c0_t: float = 134.5
	var c0_sit: float = 138
	var c0_d: float = 90.0
	var c0_s: float = 9874.0
	var c1_t: float = -0.148
	var c1_sit: float = -0.100
	var c1_d: float = -0.0849
	var k_s: float = 0.3598
	var n_s: float = -0.2342
	var p_len: float = ($p_len as SpinBox).value
	var dia: float = ($dia as SpinBox).value
	var f_len: float = ($f_len as SpinBox).value
	var df: float = ($df as SpinBox).value
	var rhop: float = ($rhop as SpinBox).value
	var bhnp: float = ($bhnp as SpinBox).value
	var vt: float = ($vt as SpinBox).value
	var rhot: float = ($rhot as SpinBox).value
	var bhnt: float = ($bhnt as SpinBox).value
	var nato: float = ($nato as SpinBox).value
	   
	lw=p_len-f_len*(1-(1+df/dia*(1+df/dia))/3)
	lwd=lw/dia
	   
	elwd=1/tanh(b0+b1*lwd)
	var nato_s=nato
	enato=pow(cos(nato/180*PI),m)
	edens=pow(rhop/rhot,0.5)
	vt_s=vt

	if(mat == TUNGSTEN and process == PERFORATION):
		eterm5_t=exp(-(c0_t+c1_t*bhnt)*bhnt/rhop/vt_s/vt_s)
		vt_min=pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5)
		vt_min_s=vt_min	  
		perf=a_t*lw*elwd*enato*edens*eterm5_t
		 
		GlobalPopup.show_panel('The perforation limit of the tungsten penetrator is '+str(perf)+' mm.')
   
	if(mat == DU and process == PERFORATION):
		eterm5_d=exp(-(c0_d+c1_d*bhnt)*bhnt/rhop/vt_s/vt_s)
		vt_min=pow((c0_t+c1_t*bhnt)*bhnt/rhop/1.5,0.5)
		vt_min_s=vt_min
		perf=a_d*lw*elwd*enato*edens*eterm5_d
		  
		GlobalPopup.show_panel('The perforation limit of the DU penetrator is '+str(perf)+' mm.')
   
	if(mat == STEEL and process == PERFORATION):
		eterm5_s=exp(-c0_s*pow(bhnt,k_s)*pow(bhnp,n_s)/rhop/vt_s/vt_s)
		vt_min=pow(c0_s*pow(bhnt,k_s)*pow(bhnp,n_s)/rhop/1.5,0.5)
		vt_min_s=vt_min
		perf=a_s*lw*elwd*enato*edens*eterm5_s
		  
		GlobalPopup.show_panel('The perforation limit of the steel penetrator is '+str(perf)+' mm.')
		  
   
	if(mat == TUNGSTEN and process == PENETRATION):
		eterm5_sit=exp(-(c0_sit+c1_sit*bhnt)*bhnt/rhop/vt_s/vt_s)
		vt_min=pow((c0_sit+c1_sit*bhnt)*bhnt/rhop/1.8,0.5)
		vt_min_s=vt_min
		pene = a_sit * lw * elwd * edens * eterm5_sit
	  
		GlobalPopup.show_panel('The penetration depth of the tungsten penetrator is '+str(pene)+' mm. The obliquity was set to zero.')
   
	if(mat != TUNGSTEN and process == PENETRATION):
		GlobalPopup.show_panel('The calculation of the penetration depth is only valid for tungsten.')
   
	if not msg.is_empty():
		msg += "- The Penetration/Perforation Limit was set to 0 mm.\n"
		msg = "\nThe following input value(s) is (are) not correct:\n\n" + msg
		GlobalPopup.show_panel(msg)


func _on_mode_item_selected(index: int):
	process = index - 1


func _on_material_item_selected(index: int):
	mat = index - 1
