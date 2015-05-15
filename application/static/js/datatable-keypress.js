var my_scope = this;
var listener = new window.keypress.Listener();
var my_combos = listener.register_many([
	{
		"keys"          : "shift s",
		"is_exclusive"  : true,
		"on_keydown"    : function() {
			console.log("You pressed shift and s together.");
		},
		"on_keyup"      : function(e) {
			console.log("And now you've released one of the keys.");
		},
		"this"          : my_scope
	},
	{
		"keys"          : "s",
		"is_exclusive"  : true,
		"on_keyup"      : function(event) {
			// Normally because we have a keyup event handler,
			// event.preventDefault() would automatically be called.
			// But because we're returning true in this handler,
			// event.preventDefault() will not be called.
			return true
		},
		"this"          : my_scope
	}
]);