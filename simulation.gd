extends VBoxContainer


func _on_button_toggled(toggled_on: bool) -> void:
	$Margin/Button.icon = load("res://stop.svg") if toggled_on else load("res://play_arrow.svg")
	if toggled_on:
		$MarginContainer/Aspect/Video.play()
		return
	$MarginContainer/Aspect/Video.stop()


func _on_video_finished() -> void:
	$Margin/Button.set_pressed_no_signal(false)
	$Margin/Button.icon = load("res://play_arrow.svg")
