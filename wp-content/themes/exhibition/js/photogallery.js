var PhotoGallery = {

	thumbnailOffset: 77,
	toggle: false,

	initialize: function() {
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
		var container = $("warpper").getElement(".thumbnails");

		var thumbnailsContainer = container.getElement("ul");
		var thumbnails = $(container).getElements("li");
		this.thumbnails = new Exhibition.Horizontal(
			thumbnailsContainer,
			thumbnails, {
				"blank": 10,
				"onActive": this.onThumbnailPhotoSelect.bind(this),
				"onChange": this.onThumbnailPhotoChange.bind(this)	
			}
		);
		new Tips(thumbnailsContainer.getElements('a'));

		var containerHeight = thumbnailsContainer.getSize().y;
		container.setStyle("margin-top", -(containerHeight + this.thumbnailOffset));
	},

	buildMatrix: function() {
		var height = (Browser.Engine.trident && Browser.Engine.version <= 6)
			? document.documentElement.clientHeight : window.innerHeight;

		var wrapContainer = $("main");
		var container = wrapContainer.getElement(".matrix");

		wrapContainer.setStyle("height", height);
		container.setStyle("height", height);
		thumbnails = container.getElements("li");

		this.matrix = new Exhibition(container, thumbnails, {
			"defaultIndex": 0,
			"columns": 7, "blank": 80,
			"onActive": this.onMatrixPhotoSelect.bind(this),
			"onChange": this.onMatrixPhotoChange.bind(this)
		});
		new Tips(container.getElements('a'));
	},


	open: function(index, element) {
		var href		= $(element).getProperty("href");
		var query		= href.split("?");
		var url			= query.shift();
		var parameters	= query.shift();
		if (this.previewer.isOpen()) {
			var img = element.getElement("img");
			this.previewer.close(img.getSize());
			this.previewer.preload(url, parameters);
		} else {
			this.previewer.preload(url, parameters);
		}
	},

	onThumbnailPhotoSelect: function(index, element) {
		this.toggle = false;
		this.open(index, element);
	},

	onThumbnailPhotoChange: function(index, element) {
		if (!this.toggle) {
			this.matrix.activate(index);
		}
	},
	
	onMatrixPhotoSelect: function(index, element) {
		this.open(index, element);
	},
	
	onMatrixPhotoChange: function(index, element) {
		if (!this.previewer.isOpen()) {
			this.previewer.open();
			this.matrix.stopAnimate();
			this.toggle = true;
			this.thumbnails.activate(index);
		}
	}
	
};


var Controller = {

	initialize: function() {
		this.setupDOM();
		this.setupEvents();
		this.run();
	},

	setupDOM: function() {
		this.container = $("main");
		this.pager = $("warpper").getElement(".wp-pagenavi");
		this.pages = (this.pager) ? this.pager.getElements("a") : null;
	},

	setupEvents: function() {
		var self = this;
		if (!this.pages) return false;
		this.pages.each(function(element, key) {
			element.addEvent("click", self.onClick.bindWithEvent(self, element));
		});
	},

	run: function() {
		PhotoGallery.initialize.bind(PhotoGallery)();
	},

	onClick: function(event, element) {
		event.stop();
		var url = element.getProperty("href");
		var success = function(responseText, responseXML) {
			this.container.set("html", responseText);
			Controller.initialize.bind(Controller)();
		}.bind(this)
		new Request({"url": url, "onSuccess": success}).send();
	}

};
window.addEvent("domready", Controller.initialize.bind(Controller));
