extends Control

@export var focus_color: Color
@export var swipe_speed: float

func _ready() -> void:
	get_tree().root.size_changed.connect(size_change)
	size_change()

func size_change():
	for i in $VBox/Scroll/HBox.get_children():
		i.custom_minimum_size.x = get_tree().root.size.x

func on_menu_pressed(path: String):
	for i in $VBox/Panel/Margin/HBox.get_children():
		get_tree().create_tween().tween_property(i, "modulate", Color.WHITE, swipe_speed / 4)
	get_tree().create_tween().tween_property(get_node("VBox/Panel/Margin/HBox/" + path), "modulate", focus_color, swipe_speed / 4)
	get_tree().create_tween().tween_property($VBox/Scroll, "scroll_horizontal", get_node("VBox/Panel/Margin/HBox/" + path).get_index() * size.x, swipe_speed).set_trans(Tween.TRANS_CUBIC)
