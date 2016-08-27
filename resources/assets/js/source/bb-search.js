window.app =  {
	models: {},
	views: {},
	collections: {}
};

app.models.SearchModel = Backbone.Model.extend({});

app.collections.SearchCollection = Backbone.Collection.extend(
{
	url: function( val )
	{
		return '/ajax?fn=search&q=' + val;
	},
	model: app.models.SearchModel
});

app.views.SearchView = Backbone.View.extend(
{
	template: _.template( $('#searchResultsTemplate').html() ),

	render: function()
	{
		this.el = this.template( this.model.toJSON() );
		return this;
	}

});

app.views.SearchViews = Backbone.View.extend(
{
	initialize: function()
	{
		this.collection = new app.collections.SearchCollection();
		this.collection.on( 'reset', this.render, this );
	},

	el: $('#searchResultsDiv'),

	searchResults: this.$('#searchResults'),

	events: {
		"keyup input[name=q]" : "search",
		"click form ul>li>a" : "changeUrl"
	},

	changeUrl: function( e )
	{
		e.preventDefault();
		// console.log( $(e.currentTarget).attr('href') );
		var url = $( e.currentTarget ).data('type');
		this.$('#typeInput').val( url );
	},

	search: function( e )
	{
		// var val = e.currentTarget.value;
		var val = $.trim( e.currentTarget.value );
		var url = val + '&obj=' + this.$('#typeInput').val();

		if ( val.length > 0 )
		{
			this.collection.fetch(
			{
				reset: true,
				url: this.collection.url( url )
			});
		} else
		{
			this.searchResults.empty();
		}
	},

	render: function()
	{
		this.searchResults.empty();

		this.collection.each(function( model )
		{
			searchView = new app.views.SearchView({ model: model });
			searchView.render();
			this.searchResults.append( searchView.el );
		}, this );
	}

});