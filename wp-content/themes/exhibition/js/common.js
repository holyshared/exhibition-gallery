var PhotoGallery = {

	thumbnailOffset: 80,

	initialize: function() {
		var myMenu = new MenuMatic({
			"subMenusContainerId": "menu",
			"mmbFocusedClassName": "focused"
		});

		this.buildPreviewer();
		this.buildMatrix();
		this.buildThumbnails();
	},

	buildPreviewer: function() {
		this.previewer = new Preview($("preview"));
		this.previewer.addEvent("close", function(index, element) {
			this.matrix.startAnimate();
		}.bind(this));
	},

	buildThumbnails: function() {
		var container = $("thumbnails");
		var thumbnailsContainer = container.getElement("ul");
		var thumbnails = $(container).getElements("li");
		this.thumbnails = new Exhibition.Horizontal(thumbnailsContainer, thumbnails, {
			"blank": 10,
			"onChange": this.onThumbnailPhotoChnage.bind(this)	
		});
		new Tips(thumbnailsContainer.getElements('a'));

		var containerHeight = thumbnailsContainer.getSize().y;
		container.setStyle("margin-top", -(containerHeight + this.thumbnailOffset));
	},

	buildMatrix: function() {
		var height = (Browser.Engine.trident && Browser.Engine.version <= 6)
			? document.documentElement.clientHeight : window.innerHeight;
	
		var wrapContainer = $("main");
		var container = wrapContainer.getElement("ul.exhibition");
	
		wrapContainer.setStyle("height", height);
		container.setStyle("height", height);
		thumbnails = container.getElements("li");
	
		var columns = Math.round(thumbnails.length / 7);
		if (columns > 1) {
			var centerColumn = columns / 2;
			var defaultIndex = (centerColumn - 1) * 7 + 3;
		} else {
			var defaultIndex = 3;
		}

		this.matrix = new Exhibition(container, thumbnails, {
			"defaultIndex": defaultIndex,
			"columns": 7, "blank": 80,
			"onActive": this.onMatrixPhotoSelect.bind(this),
			"onChange": this.onMatrixPhotoChange.bind(this)
		});
		new Tips(container.getElements('a'));
	},

	onThumbnailPhotoChnage: function(index, element) {
		this.matrix.activate(index);
	},
	
	onMatrixPhotoSelect: function(index, element) {
		var href		= $(element).getProperty("href");
		var query		= href.split("?");
		var url			= query.shift();
		var parameters	= query.shift();
		if (this.previewer.isOpen()) {
			var img = element.getElement("img");
			this.previewer.close(img.getSize());
		}
	},
	
	onMatrixPhotoChange: function(index, element) {
		var href		= $(element).getProperty("href");
		var query		= href.split("?");
		var url			= query.shift();
		var parameters	= query.shift();
		if (!this.previewer.isOpen()) {
			this.matrix.stopAnimate();
			this.thumbnails.activate(index);
			this.previewer.open(url, parameters);
		}
	}
	
};
window.addEvent("domready", PhotoGallery.initialize.bind(PhotoGallery));
