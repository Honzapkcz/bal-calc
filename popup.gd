extends Control


func _ready():
	visible = false
	$ColorRect.modulate.a = 0.0
	$Panel.position.y = get_viewport_rect().size.y
	call_deferred("post_ready")

func post_ready():
	get_tree().root.move_child(self, -1)


func show_panel(string: String):
	$Panel/Panel/Panel/Layout/Label.text = string
	visible = true
	get_tree().create_tween().tween_property($ColorRect, "modulate:a", 1.0, 0.5).set_trans(Tween.TRANS_CUBIC)
	get_tree().create_tween().tween_property($Panel, "position:y", 0, 0.5).set_trans(Tween.TRANS_CUBIC)


func _on_copy_button_pressed():
	DisplayServer.clipboard_set($Panel/Panel/Panel/Layout/Label.text)
	_on_close_button_pressed()


func _on_close_button_pressed():
	get_tree().create_tween().tween_property($ColorRect, "modulate:a", 0.0, 0.5).set_trans(Tween.TRANS_CUBIC)
	get_tree().create_tween().tween_property($Panel, "position:y", get_viewport_rect().size.y, 0.5).set_trans(Tween.TRANS_CUBIC)
	get_tree().create_tween().tween_property(self, "visible", false, 0.0).set_delay(0.5)
