var tmSearch = {

	el: $('#searchResultsDiv'),

	searchResults: $('#searchResults'),

	searchViews: '',

	typeInput: $('#typeInput'),

	init: function () {
		// console.log(this.el);
		this.el.on("keyup", "input[name=q]", this.search);
		this.el.on("click", "form ul>li>a", this.changeUrl);
	},

	url: function( val )
	{
		return '/ajax?fn=search&q=' + val;
	},

	changeUrl: function( e )
	{
		e.preventDefault();
		// console.log( $(e.currentTarget).attr('href') );
		var url = $( e.currentTarget ).data('type');

		tmSearch.typeInput.val( url );
	},

	search: function()
	{
		var val = $.trim( $(this).val() ),
			url = val + '&obj=' + tmSearch.typeInput.val();

		if ( val.length > 0 )
		{
			tmSearch.loading();

			tmSearch.fetch( tmSearch.url( url ) );
		} else
		{
			tmSearch.searchResults.empty();
		}
	},

	fetch: function(url)
	{
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
		})
		.done(function( data )
		{
			tmSearch.render( data );
		});
	},

	render: function( data )
	{

		this.searchResults.empty();
		this.searchViews = '';

		$.each(data, function(i, obj)
		{
			tmSearch.searchViews += '<tr><td><strong><i class="fa fa-' + obj.icon +
									'"></i> <a href="/' + obj.type + '/' + obj.id + '">' + obj.name +
									'</a>';
			tmSearch.searchViews += (obj.type == 'mp3' && obj.price == 'paid') ? '<i class="fa fa-dollar"></i>' : '';
			tmSearch.searchViews += '</strong></td><td><i class="fa fa-eye"></i> ' +
										'<strong>' + obj.views + '</strong></td><td>' +
										'<i class="fa fa-download"></i> <strong>'+
										obj.download + '</strong></td></tr>';
		});

		this.searchResults.html( this.searchViews );

	},

	loading: function()
	{
		this.searchResults.html('<p class="text-center"><i class="fa fa-spinner fa-5x fa-spin"></i>');
	}
}