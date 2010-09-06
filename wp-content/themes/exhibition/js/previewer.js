var Preview = new Class({

	Implements: [Events, Options],

	options: {
		offsetY: -80
	},

	initialize: function(container, options) {
		this.setOptions(options);
		this.container = container;
		this.loader = new Request.HTML();
		this.loader.addEvent("success", this.success.bind(this));
		this.size = {x: 100, y: 100};
		this.opened = false;
		this.loaded = false;
		this.status = false;

		this.openingFx = {
			"duration": 400,
			"transition": Fx.Transitions.Expo.easeOut,
			"link": "chain",
			"onChainComplete": this.onOpen.bind(this)
		}

		this.closeingFx = {
			"duration": 800,
			"transition": "expo:out",
			"link": "chain",
			"onChainComplete": this.onClose.bind(this)
		}
	},
	
	open: function() {
		if (this.loaded) {
			this.opening();
		} else {
			this.status = true;
		}
	},

	opening: function() {
		var size = this.getSize();
		var fx = this.container.get("morph", this.openingFx);
		fx.start({
			"height": [this.size.y, size.y],
			"width": [this.size.x, size.x],
			"margin-top": [-this.size.y/2, -(size.y)/2 + this.options.offsetY],
			"margin-left": [-this.size.x/2, -size.x/2],
			"opacity": [0, 1]
		});
		this.size = size;
	},
	
	preload: function(url, parameters) {
		this.loaded = false;
		if (url) { this.setURL(url); }
		if (parameters) { this.setQuery(parameters); }
		this.loader.send(this.query);
	},

	onOpen: function() {
		var fx = this.photography.get("tween", {"duration": 650});
		fx.start("opacity", 0, 1);

		var fx = this.information.get("tween", {"duration": 800});
		fx.start("opacity", 0, 1);

		var fx = this.actions.get("tween", {"duration": 600});
		fx.start("opacity", 0, 1);

		var containerHeight	 = this.photography.getSize().y;
		var containerWidth	 = this.photography.getSize().x;
		var aboutHeight		 = this.about.getSize().y;
		var paddingTop		 = this.about.getStyle("padding-top");
		var paddingBottom	 = this.about.getStyle("padding-bottom");
		var titleHeight		 = aboutHeight + paddingTop.toInt() + paddingBottom.toInt();

		this.about.setStyle("top", containerHeight - titleHeight);
		this.opened = true;
	},

	success: function(responseTree, responseElements, responseHTML, responseJavaScript) {
		this.container.set("html", responseHTML);
		this.init();
		this.loaded = true;
		if (this.status) {
			this.opening();
			this.status = false;
		}
	},

	isOpen: function() {
		return (this.opened) ? true : false;
	},

	init: function() {
		var ct = this.container;
		this.photography = ct.getElement("div.photography");
		this.information = ct.getElement("div.information");
		this.about		 = ct.getElement("div.about");
		this.actions	 = ct.getElement(".actions");
		this.photography.setStyle("opacity", 0);
		this.information.setStyle("opacity", 0);
		this.actions.setStyle("opacity", 0);
	},

	getSize: function() {
		var sizeL	= this.photography.getSize();
		var sizeR	= this.information.getSize();
		var actions = this.actions.getSize().y;
		var width	= sizeL.x + sizeR.x;
		var height	= (sizeL.y > sizeR.y) ? sizeL.y : sizeR.y;
		return {x: width, y: height + actions};
	},

	setURL: function(url) {
		this.loader.setOptions({"url": url})
	},

	setQuery: function(parameters) {
		if ($type(parameters) == "string") {
			this.query = parameters;
		} else {
			var hash = new Hash(parameters);
			hash.each(function(value, key){
				query.push(key + "=" + value);
			});
			this.query = query.join("&");
		}
	},

	close: function(size) {
		this.thumbnail = size;
		this.closeing();
	},

	closeing: function() {
		var fx = this.container.get("morph", this.closeingFx);
		var y = this.size.y;
		var x = this.size.x;
		fx.start({
			"height": [y, this.thumbnail.y-30],
			"width": [x, this.thumbnail.x-30],
			"margin-top": [-y/2, -(this.thumbnail.y + 12)/2 - 10],
			"margin-left": [-x/2, -(this.thumbnail.x)/2],
			"opacity": [1, 0]
		});
		this.size = {x:0, y:0};
	},

	onClose: function() {
		this.opened = false;
		this.fireEvent("close");
	}

});
