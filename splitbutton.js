jQuery(document).ready(function($){
	// Grab the initial elements (button and select) and wrap 'em up.
	$('.splitbutton').siblings('select').each(function(){
		var wrap = $(this).siblings('.splitbutton')
			.andSelf()
			.addClass('splitbutton-processed')
			.wrapAll('<div class="splitbutton-wrap" />')
			.parent();

		// Append a button that we can visually style as we like.
		var button = $('<span class="splitbutton-button"></span>')
			.appendTo( wrap )
			.text( wrap.children('select').val() );

		// Append a button for the dropdown part that we can style as we like.
		var dropdown = $('<span class="splitbutton-dropdown">&darr;</span>')
			.appendTo( wrap )
			.append('<ul />');

		// For each option in the select, add a list item to the dropdown button.
		// <option value="4">OptionName</option> → <li data-value="4">OptionName</li>
		wrap.children('select')
			.children('option')
			.each(function(){
				$('<li />').appendTo( dropdown.children('ul') )
					.text( $(this).text() )
					.attr( 'data-value', $(this).val() )
					.click(function(){
						// Handle the click on the <li>, to set the real select dropdown to match.
						$(this).parent()
							.parent()
							.siblings('.splitbutton-button')
							.text( $(this).attr('data-value') )
							.siblings('select')
							.val( $(this).attr('data-value') );
			});
		});

		// Handle submission!
		button.click(function(){
			// Development action. For production uncomment the later line,
			// and let the click pass through as it would without the script.
			alert( 'The dropdown value is: ' + $(this).siblings('select').val() );
			// $(this).siblings('.splitbutton').click();
		});
	});
});
