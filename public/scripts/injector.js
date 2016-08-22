define([ 'bareutil.ajax' ], function(ajax) {
	var Injector = function(base) {
		this.base = base;
	};

	Injector.prototype.injectHTML = function(selector, html, options) {
		var element;
		if(typeof selector.nodeType !== 'undefined') {
			element = selector;
		} else {
			element = document.querySelector(selector);
		}

		if(typeof options.modifyHTML !== 'undefined') {
			html = options.modifyHTML(html);
		}

		if(options.append === true) {
			element.innerHTML = element.innerHTML + ' ' + html;
		} else {
			element.innerHTML = html;
		}

		return element;
	};

	Injector.prototype.injectView = function(selector, view, options) {
		var url = view + '.html';
		if(this.base !== '/') {
			url = this.base + '/' + url;
		}

		return ajax.get(url).then(function(html) {
		 	return this.injectHTML(selector, html, options);
		}.bind(this));
	};

	Injector.prototype.inject = function(selector, view, model, options) {
		var promise = this.injectView(selector, view, options);

		if(typeof model !== 'undefined') {
			promise = promise.then(function(element) {
				ko.applyBindings(model, element);

				if(typeof model.didRender !== 'undefined') {
					model.didRender(element);
				}

				return element;
			});
		}

		return promise;
	};

	Injector.prototype.injectComponent = function(selector, path, options) {
		return this.injectView(selector, path, options).then(function(element) {
			return new Promise(function(resolve, reject) {
				try {
					require([path], function(model) {
						ko.applyBindings(model, element);

						if(typeof model.didRender !== 'undefined') {
							model.didRender(element);
						}

						resolve({
							model:model,
							element:element
						});
					});
				} catch(err) {
					reject(err);
				}
			});
		});
	};

	return Injector;
});
