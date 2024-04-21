/*
 * jQuery Form Styler v2.0.2
 * https://github.com/Dimox/jQueryFormStyler
 *
 * Copyright 2012-2017 Dimox (http://dimox.name/)
 * Released under the MIT license.
 *
 * Date: 2017.10.22
 *
 */

;(function(factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		module.exports = factory($ || require('jquery'));
	} else {
		factory(jQuery);
	}
}(function($) {

	'use strict';

	var pluginName = 'styler',
			defaults = {
				idSuffix: '-styler',
				filePlaceholder: 'Đ¤Đ°Đ¹Đ» Đ½Đµ Đ²Ñ‹Đ±Ñ€Đ°Đ½',
				fileBrowse: 'ĐĐ±Đ·Đ¾Ñ€...',
				fileNumber: 'Đ’Ñ‹Đ±Ñ€Đ°Đ½Đ¾ Ñ„Đ°Đ¹Đ»Đ¾Đ²: %s',
				selectPlaceholder: 'Đ’Ñ‹Đ±ĐµÑ€Đ¸Ñ‚Đµ...',
				selectSearch: false,
				selectSearchLimit: 10,
				selectSearchNotFound: 'Đ¡Đ¾Đ²Đ¿Đ°Đ´ĐµĐ½Đ¸Đ¹ Đ½Đµ Đ½Đ°Đ¹Đ´ĐµĐ½Đ¾',
				selectSearchPlaceholder: 'ĐŸĐ¾Đ¸ÑĐº...',
				selectVisibleOptions: 0,
				selectSmartPositioning: true,
				locale: 'ru',
				locales: {
					'en': {
						filePlaceholder: 'No file selected',
						fileBrowse: 'Browse...',
						fileNumber: 'Selected files: %s',
						selectPlaceholder: 'Select...',
						selectSearchNotFound: 'No matches found',
						selectSearchPlaceholder: 'Search...'
					}
				},
				onSelectOpened: function() {},
				onSelectClosed: function() {},
				onFormStyled: function() {}
			};

	function Plugin(element, options) {
		this.element = element;
		this.options = $.extend({}, defaults, options);
		var locale = this.options.locale;
		if (this.options.locales[locale] !== undefined) {
			$.extend(this.options, this.options.locales[locale]);
		}
		this.init();
	}

	Plugin.prototype = {

		// Đ¸Đ½Đ¸Ñ†Đ¸Đ°Đ»Đ¸Đ·Đ°Ñ†Đ¸Ñ
		init: function() {

			var el = $(this.element);
			var opt = this.options;

			var iOS = (navigator.userAgent.match(/(iPad|iPhone|iPod)/i) && !navigator.userAgent.match(/(Windows\sPhone)/i)) ? true : false;
			var Android = (navigator.userAgent.match(/Android/i) && !navigator.userAgent.match(/(Windows\sPhone)/i)) ? true : false;

			function Attributes() {
				if (el.attr('id') !== undefined && el.attr('id') !== '') {
					this.id = el.attr('id') + opt.idSuffix;
				}
				this.title = el.attr('title');
				this.classes = el.attr('class');
				this.data = el.data();
			}

			// checkbox
			if (el.is(':checkbox')) {

				var checkboxOutput = function() {

					var att = new Attributes();
					var checkbox = $('<div class="jq-checkbox"><div class="jq-checkbox__div"></div></div>')
						.attr({
							id: att.id,
							title: att.title
						})
						.addClass(att.classes)
						.data(att.data)
					;

					el.after(checkbox).prependTo(checkbox);
					if (el.is(':checked')) checkbox.addClass('checked');
					if (el.is(':disabled')) checkbox.addClass('disabled');

					// ĐºĐ»Đ¸Đº Đ½Đ° Đ¿ÑĐµĐ²Đ´Đ¾Ñ‡ĐµĐºĐ±Đ¾ĐºÑ
					checkbox.click(function(e) {
						e.preventDefault();
						el.triggerHandler('click');
						if (!checkbox.is('.disabled')) {
							if (el.is(':checked')) {
								el.prop('checked', false);
								checkbox.removeClass('checked');
							} else {
								el.prop('checked', true);
								checkbox.addClass('checked');
							}
							el.focus().change();
						}
					});
					// ĐºĐ»Đ¸Đº Đ½Đ° label
					el.closest('label').add('label[for="' + el.attr('id') + '"]').on('click.styler', function(e) {
						if (!$(e.target).is('a') && !$(e.target).closest(checkbox).length) {
							checkbox.triggerHandler('click');
							e.preventDefault();
						}
					});
					// Đ¿ĐµÑ€ĐµĐºĐ»ÑÑ‡ĐµĐ½Đ¸Đµ Đ¿Đ¾ Space Đ¸Đ»Đ¸ Enter
					el.on('change.styler', function() {
						if (el.is(':checked')) checkbox.addClass('checked');
						else checkbox.removeClass('checked');
					})
					// Ñ‡Ñ‚Đ¾Đ±Ñ‹ Đ¿ĐµÑ€ĐµĐºĐ»ÑÑ‡Đ°Đ»ÑÑ Ñ‡ĐµĐºĐ±Đ¾ĐºÑ, ĐºĐ¾Ñ‚Đ¾Ñ€Ñ‹Đ¹ Đ½Đ°Ñ…Đ¾Đ´Đ¸Ñ‚ÑÑ Đ² Ñ‚ĐµĐ³Đµ label
					.on('keydown.styler', function(e) {
						if (e.which == 32) checkbox.click();
					})
					.on('focus.styler', function() {
						if (!checkbox.is('.disabled')) checkbox.addClass('focused');
					})
					.on('blur.styler', function() {
						checkbox.removeClass('focused');
					});

				}; // end checkboxOutput()

				checkboxOutput();

				// Đ¾Đ±Đ½Đ¾Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸
				el.on('refresh', function() {
					el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
					el.off('.styler').parent().before(el).remove();
					checkboxOutput();
				});

			// end checkbox

			// radio
			} else if (el.is(':radio')) {

				var radioOutput = function() {

					var att = new Attributes();
					var radio = $('<div class="jq-radio"><div class="jq-radio__div"></div></div>')
						.attr({
							id: att.id,
							title: att.title
						})
						.addClass(att.classes)
						.data(att.data)
					;

					el.after(radio).prependTo(radio);
					if (el.is(':checked')) radio.addClass('checked');
					if (el.is(':disabled')) radio.addClass('disabled');

					// Đ¾Đ¿Ñ€ĐµĐ´ĐµĐ»ÑĐµĐ¼ Đ¾Đ±Ñ‰ĐµĐ³Đ¾ Ñ€Đ¾Đ´Đ¸Ñ‚ĐµĐ»Ñ Ñƒ Ñ€Đ°Đ´Đ¸Đ¾ĐºĐ½Đ¾Đ¿Đ¾Đº Ñ Đ¾Đ´Đ¸Đ½Đ°ĐºĐ¾Đ²Ñ‹Đ¼ name
					// http://stackoverflow.com/a/27733847
					$.fn.commonParents = function() {
						var cachedThis = this;
						return cachedThis.first().parents().filter(function() {
							return $(this).find(cachedThis).length === cachedThis.length;
						});
					};
					$.fn.commonParent = function() {
						return $(this).commonParents().first();
					};

					// ĐºĐ»Đ¸Đº Đ½Đ° Đ¿ÑĐµĐ²Đ´Đ¾Ñ€Đ°Đ´Đ¸Đ¾ĐºĐ½Đ¾Đ¿ĐºĐµ
					radio.click(function(e) {
						e.preventDefault();
						el.triggerHandler('click');
						if (!radio.is('.disabled')) {
							var inputName = $('input[name="' + el.attr('name') + '"]');
							inputName.commonParent().find(inputName).prop('checked', false).parent().removeClass('checked');
							el.prop('checked', true).parent().addClass('checked');
							el.focus().change();
						}
					});
					// ĐºĐ»Đ¸Đº Đ½Đ° label
					el.closest('label').add('label[for="' + el.attr('id') + '"]').on('click.styler', function(e) {
						if (!$(e.target).is('a') && !$(e.target).closest(radio).length) {
							radio.triggerHandler('click');
							e.preventDefault();
						}
					});
					// Đ¿ĐµÑ€ĐµĐºĐ»ÑÑ‡ĐµĐ½Đ¸Đµ ÑÑ‚Ñ€ĐµĐ»ĐºĐ°Đ¼Đ¸
					el.on('change.styler', function() {
						el.parent().addClass('checked');
					})
					.on('focus.styler', function() {
						if (!radio.is('.disabled')) radio.addClass('focused');
					})
					.on('blur.styler', function() {
						radio.removeClass('focused');
					});

				}; // end radioOutput()

				radioOutput();

				// Đ¾Đ±Đ½Đ¾Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸
				el.on('refresh', function() {
					el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
					el.off('.styler').parent().before(el).remove();
					radioOutput();
				});

			// end radio

			// file
			} else if (el.is(':file')) {

				var fileOutput = function() {

					var att = new Attributes();
					var placeholder = el.data('placeholder');
					if (placeholder === undefined) placeholder = opt.filePlaceholder;
					var browse = el.data('browse');
					if (browse === undefined || browse === '') browse = opt.fileBrowse;

					var file =
						$('<div class="jq-file">' +
								'<div class="jq-file__name">' + placeholder + '</div>' +
								'<div class="jq-file__browse">' + browse + '</div>' +
							'</div>')
						.attr({
							id: att.id,
							title: att.title
						})
						.addClass(att.classes)
						.data(att.data)
					;

					el.after(file).appendTo(file);
					if (el.is(':disabled')) file.addClass('disabled');

					var value = el.val();
					var name = $('div.jq-file__name', file);

					// Ñ‡Ñ‚Đ¾Đ±Ñ‹ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸ Đ¸Đ¼Ñ Ñ„Đ°Đ¹Đ»Đ° Đ½Đµ ÑĐ±Ñ€Đ°ÑÑ‹Đ²Đ°Đ»Đ¾ÑÑŒ
					if (value) name.text(value.replace(/.+[\\\/]/, ''));

					el.on('change.styler', function() {
						var value = el.val();
						if (el.is('[multiple]')) {
							value = '';
							var files = el[0].files.length;
							if (files > 0) {
								var number = el.data('number');
								if (number === undefined) number = opt.fileNumber;
								number = number.replace('%s', files);
								value = number;
							}
						}
						name.text(value.replace(/.+[\\\/]/, ''));
						if (value === '') {
							name.text(placeholder);
							file.removeClass('changed');
						} else {
							file.addClass('changed');
						}
					})
					.on('focus.styler', function() {
						file.addClass('focused');
					})
					.on('blur.styler', function() {
						file.removeClass('focused');
					})
					.on('click.styler', function() {
						file.removeClass('focused');
					});

				}; // end fileOutput()

				fileOutput();

				// Đ¾Đ±Đ½Đ¾Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸
				el.on('refresh', function() {
					el.off('.styler').parent().before(el).remove();
					fileOutput();
				});

			// end file

			// number
			} else if (el.is('input[type="number"]')) {

				var numberOutput = function() {

					var att = new Attributes();
					var number =
						$('<div class="jq-number">' +
								'<div class="jq-number__spin minus"></div>' +
								'<div class="jq-number__spin plus"></div>' +
							'</div>')
						.attr({
							id: att.id,
							title: att.title
						})
						.addClass(att.classes)
						.data(att.data)
					;

					el.after(number).prependTo(number).wrap('<div class="jq-number__field"></div>');
					if (el.is(':disabled')) number.addClass('disabled');

					var min,
							max,
							step,
							timeout = null,
							interval = null;
					if (el.attr('min') !== undefined) min = el.attr('min');
					if (el.attr('max') !== undefined) max = el.attr('max');
					if (el.attr('step') !== undefined && $.isNumeric(el.attr('step')))
						step = Number(el.attr('step'));
					else
						step = Number(1);

					var changeValue = function(spin) {
						var value = el.val(),
								newValue;

						if (!$.isNumeric(value)) {
							value = 0;
							el.val('0');
						}

						if (spin.is('.minus')) {
							newValue = Number(value) - step;
						} else if (spin.is('.plus')) {
							newValue = Number(value) + step;
						}

						// Đ¾Đ¿Ñ€ĐµĐ´ĐµĐ»ÑĐµĐ¼ ĐºĐ¾Đ»Đ¸Ñ‡ĐµÑÑ‚Đ²Đ¾ Đ´ĐµÑÑÑ‚Đ¸Ñ‡Đ½Ñ‹Ñ… Đ·Đ½Đ°ĐºĐ¾Đ² Đ¿Đ¾ÑĐ»Đµ Đ·Đ°Đ¿ÑÑ‚Đ¾Đ¹ Đ² step
						var decimals = (step.toString().split('.')[1] || []).length;
						if (decimals > 0) {
							var multiplier = '1';
							while (multiplier.length <= decimals) multiplier = multiplier + '0';
							// Đ¸Đ·Đ±ĐµĐ³Đ°ĐµĐ¼ Đ¿Đ¾ÑĐ²Đ»ĐµĐ½Đ¸Ñ Đ»Đ¸ÑˆĐ½Đ¸Ñ… Đ·Đ½Đ°ĐºĐ¾Đ² Đ¿Đ¾ÑĐ»Đµ Đ·Đ°Đ¿ÑÑ‚Đ¾Đ¹
							newValue = Math.round(newValue * multiplier) / multiplier;
						}

						if ($.isNumeric(min) && $.isNumeric(max)) {
							if (newValue >= min && newValue <= max) el.val(newValue);
						} else if ($.isNumeric(min) && !$.isNumeric(max)) {
							if (newValue >= min) el.val(newValue);
						} else if (!$.isNumeric(min) && $.isNumeric(max)) {
							if (newValue <= max) el.val(newValue);
						} else {
							el.val(newValue);
						}
					};

					if (!number.is('.disabled')) {
						number.on('mousedown', 'div.jq-number__spin', function() {
							var spin = $(this);
							changeValue(spin);
							timeout = setTimeout(function(){
								interval = setInterval(function(){ changeValue(spin); }, 40);
							}, 350);
						}).on('mouseup mouseout', 'div.jq-number__spin', function() {
							clearTimeout(timeout);
							clearInterval(interval);
						}).on('mouseup', 'div.jq-number__spin', function() {
							el.change().trigger('input');
						});
						el.on('focus.styler', function() {
							number.addClass('focused');
						})
						.on('blur.styler', function() {
							number.removeClass('focused');
						});
					}

				}; // end numberOutput()

				numberOutput();

				// Đ¾Đ±Đ½Đ¾Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸
				el.on('refresh', function() {
					el.off('.styler').closest('.jq-number').before(el).remove();
					numberOutput();
				});

			// end number

			// select
			} else if (el.is('select')) {

				var selectboxOutput = function() {

					// Đ·Đ°Đ¿Ñ€ĐµÑ‰Đ°ĐµĐ¼ Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‚ĐºÑƒ ÑÑ‚Ñ€Đ°Đ½Đ¸Ñ†Ñ‹ Đ¿Ñ€Đ¸ Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‚ĐºĐµ ÑĐµĐ»ĐµĐºÑ‚Đ°
					function preventScrolling(selector) {

						var scrollDiff = selector.prop('scrollHeight') - selector.outerHeight(),
								wheelDelta = null,
								scrollTop = null;

						selector.off('mousewheel DOMMouseScroll').on('mousewheel DOMMouseScroll', function(e) {

							/**
							 * Đ½Đ¾Ñ€Đ¼Đ°Đ»Đ¸Đ·Đ°Ñ†Đ¸Ñ Đ½Đ°Đ¿Ñ€Đ°Đ²Đ»ĐµĐ½Đ¸Ñ Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‚ĐºĐ¸
							 * (firefox < 0 || chrome etc... > 0)
							 * (e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0)
							 */
							wheelDelta = (e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0) ? 1 : -1; // Đ½Đ°Đ¿Ñ€Đ°Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‚ĐºĐ¸ (-1 Đ²Đ½Đ¸Đ·, 1 Đ²Đ²ĐµÑ€Ñ…)
							scrollTop = selector.scrollTop(); // Đ¿Đ¾Đ·Đ¸Ñ†Đ¸Ñ ÑĐºÑ€Đ¾Đ»Đ»Đ°

							if ((scrollTop >= scrollDiff && wheelDelta < 0) || (scrollTop <= 0 && wheelDelta > 0)) {
								e.stopPropagation();
								e.preventDefault();
							}

						});
					}

					var option = $('option', el);
					var list = '';
					// Ñ„Đ¾Ñ€Đ¼Đ¸Ñ€ÑƒĐµĐ¼ ÑĐ¿Đ¸ÑĐ¾Đº ÑĐµĐ»ĐµĐºÑ‚Đ°
					function makeList() {
						for (var i = 0; i < option.length; i++) {
							var op = option.eq(i);
							var li = '',
									liClass = '',
									liClasses = '',
									id = '',
									title = '',
									dataList = '',
									optionClass = '',
									optgroupClass = '',
									dataJqfsClass = '';
							var disabled = 'disabled';
							var selDis = 'selected sel disabled';
							if (op.prop('selected')) liClass = 'selected sel';
							if (op.is(':disabled')) liClass = disabled;
							if (op.is(':selected:disabled')) liClass = selDis;
							if (op.attr('id') !== undefined && op.attr('id') !== '') id = ' id="' + op.attr('id') + opt.idSuffix + '"';
							if (op.attr('title') !== undefined && option.attr('title') !== '') title = ' title="' + op.attr('title') + '"';
							if (op.attr('class') !== undefined) {
								optionClass = ' ' + op.attr('class');
								dataJqfsClass = ' data-jqfs-class="' + op.attr('class') + '"';
							}

							var data = op.data();
							for (var k in data) {
								if (data[k] !== '') dataList += ' data-' + k + '="' + data[k] + '"';
							}

							if ( (liClass + optionClass) !== '' )   liClasses = ' class="' + liClass + optionClass + '"';
							li = '<li' + dataJqfsClass + dataList + liClasses + title + id + '>'+ op.html() +'</li>';

							// ĐµÑĐ»Đ¸ ĐµÑÑ‚ÑŒ optgroup
							if (op.parent().is('optgroup')) {
								if (op.parent().attr('class') !== undefined) optgroupClass = ' ' + op.parent().attr('class');
								li = '<li' + dataJqfsClass + dataList + ' class="' + liClass + optionClass + ' option' + optgroupClass + '"' + title + id + '>'+ op.html() +'</li>';
								if (op.is(':first-child')) {
									li = '<li class="optgroup' + optgroupClass + '">' + op.parent().attr('label') + '</li>' + li;
								}
							}

							list += li;
						}
					} // end makeList()

					// Đ¾Đ´Đ¸Đ½Đ¾Ñ‡Đ½Ñ‹Đ¹ ÑĐµĐ»ĐµĐºÑ‚
					function doSelect() {

						var att = new Attributes();
						var searchHTML = '';
						var selectPlaceholder = el.data('placeholder');
						var selectSearch = el.data('search');
						var selectSearchLimit = el.data('search-limit');
						var selectSearchNotFound = el.data('search-not-found');
						var selectSearchPlaceholder = el.data('search-placeholder');
						var selectSmartPositioning = el.data('smart-positioning');

						if (selectPlaceholder === undefined) selectPlaceholder = opt.selectPlaceholder;
						if (selectSearch === undefined || selectSearch === '') selectSearch = opt.selectSearch;
						if (selectSearchLimit === undefined || selectSearchLimit === '') selectSearchLimit = opt.selectSearchLimit;
						if (selectSearchNotFound === undefined || selectSearchNotFound === '') selectSearchNotFound = opt.selectSearchNotFound;
						if (selectSearchPlaceholder === undefined) selectSearchPlaceholder = opt.selectSearchPlaceholder;
						if (selectSmartPositioning === undefined || selectSmartPositioning === '') selectSmartPositioning = opt.selectSmartPositioning;

						var selectbox =
							$('<div class="jq-selectbox jqselect">' +
									'<div class="jq-selectbox__select">' +
										'<div class="jq-selectbox__select-text"></div>' +
										'<div class="jq-selectbox__trigger">' +
											'<div class="jq-selectbox__trigger-arrow"></div></div>' +
									'</div>' +
								'</div>')
							.attr({
								id: att.id,
								title: att.title
							})
							.addClass(att.classes)
							.data(att.data)
						;

						el.after(selectbox).prependTo(selectbox);

						var selectzIndex = selectbox.css('z-index');
						selectzIndex = (selectzIndex > 0 ) ? selectzIndex : 1;
						var divSelect = $('div.jq-selectbox__select', selectbox);
						var divText = $('div.jq-selectbox__select-text', selectbox);
						var optionSelected = option.filter(':selected');

						makeList();

						if (selectSearch) searchHTML =
							'<div class="jq-selectbox__search"><input type="search" autocomplete="off" placeholder="' + selectSearchPlaceholder + '"></div>' +
							'<div class="jq-selectbox__not-found">' + selectSearchNotFound + '</div>';
						var dropdown =
							$('<div class="jq-selectbox__dropdown">' +
									searchHTML + '<ul>' + list + '</ul>' +
								'</div>');
						selectbox.append(dropdown);
						var ul = $('ul', dropdown);
						var li = $('li', dropdown);
						var search = $('input', dropdown);
						var notFound = $('div.jq-selectbox__not-found', dropdown).hide();
						if (li.length < selectSearchLimit) search.parent().hide();

						// Đ¿Đ¾ĐºĐ°Đ·Ñ‹Đ²Đ°ĐµĐ¼ Đ¾Đ¿Ñ†Đ¸Ñ Đ¿Đ¾ ÑƒĐ¼Đ¾Đ»Ñ‡Đ°Đ½Đ¸Ñ
						// ĐµÑĐ»Đ¸ Ñƒ 1-Đ¹ Đ¾Đ¿Ñ†Đ¸Đ¸ Đ½ĐµÑ‚ Ñ‚ĐµĐºÑÑ‚Đ°, Đ¾Đ½Đ° Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ° Đ¿Đ¾ ÑƒĐ¼Đ¾Đ»Ñ‡Đ°Đ½Đ¸Ñ Đ¸ Đ¿Đ°Ñ€Đ°Đ¼ĐµÑ‚Ñ€ selectPlaceholder Đ½Đµ false, Ñ‚Đ¾ Đ¿Đ¾ĐºĐ°Đ·Ñ‹Đ²Đ°ĐµĐ¼ Đ¿Đ»ĐµĐ¹ÑÑ…Đ¾Đ»Đ´ĐµÑ€
						if (option.first().text() === '' && option.first().is(':selected') && selectPlaceholder !== false) {
							divText.text(selectPlaceholder).addClass('placeholder');
						} else {
							divText.text(optionSelected.text());
						}

						// Đ¾Đ¿Ñ€ĐµĐ´ĐµĐ»ÑĐµĐ¼ ÑĐ°Đ¼Ñ‹Đ¹ ÑˆĐ¸Ñ€Đ¾ĐºĐ¸Đ¹ Đ¿ÑƒĐ½ĐºÑ‚ ÑĐµĐ»ĐµĐºÑ‚Đ°
						var liWidthInner = 0,
								liWidth = 0;
						li.css({'display': 'inline-block'});
						li.each(function() {
							var l = $(this);
							if (l.innerWidth() > liWidthInner) {
								liWidthInner = l.innerWidth();
								liWidth = l.width();
							}
						});
						li.css({'display': ''});

						// Đ¿Đ¾Đ´ÑÑ‚Ñ€Đ°Đ¸Đ²Đ°ĐµĐ¼ ÑˆĐ¸Ñ€Đ¸Đ½Ñƒ ÑĐ²ĐµÑ€Đ½ÑƒÑ‚Đ¾Đ³Đ¾ ÑĐµĐ»ĐµĐºÑ‚Đ° Đ² Đ·Đ°Đ²Đ¸ÑĐ¸Đ¼Đ¾ÑÑ‚Đ¸
						// Đ¾Ñ‚ ÑˆĐ¸Ñ€Đ¸Đ½Ñ‹ Đ¿Đ»ĐµĐ¹ÑÑ…Đ¾Đ»Đ´ĐµÑ€Đ° Đ¸Đ»Đ¸ ÑĐ°Đ¼Đ¾Đ³Đ¾ ÑˆĐ¸Ñ€Đ¾ĐºĐ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ°
						if (divText.is('.placeholder') && (divText.width() > liWidthInner)) {
							divText.width(divText.width());
						} else {
							var selClone = selectbox.clone().appendTo('body').width('auto');
							var selCloneWidth = selClone.outerWidth();
							selClone.remove();
							if (selCloneWidth == selectbox.outerWidth()) {
								divText.width(liWidth);
							}
						}

						// Đ¿Đ¾Đ´ÑÑ‚Ñ€Đ°Đ¸Đ²Đ°ĐµĐ¼ ÑˆĐ¸Ñ€Đ¸Đ½Ñƒ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰ĐµĐ³Đ¾ ÑĐ¿Đ¸ÑĐºĐ° Đ² Đ·Đ°Đ²Đ¸ÑĐ¸Đ¼Đ¾ÑÑ‚Đ¸ Đ¾Ñ‚ ÑĐ°Đ¼Đ¾Đ³Đ¾ ÑˆĐ¸Ñ€Đ¾ĐºĐ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ°
						if (liWidthInner > selectbox.width()) dropdown.width(liWidthInner);

						// Đ¿Ñ€ÑÑ‡ĐµĐ¼ 1-Ñ Đ¿ÑƒÑÑ‚ÑƒÑ Đ¾Đ¿Ñ†Đ¸Ñ, ĐµÑĐ»Đ¸ Đ¾Đ½Đ° ĐµÑÑ‚ÑŒ Đ¸ ĐµÑĐ»Đ¸ Đ°Ñ‚Ñ€Đ¸Đ±ÑƒÑ‚ data-placeholder Đ½Đµ Đ¿ÑƒÑÑ‚Đ¾Đ¹
						// ĐµÑĐ»Đ¸ Đ²ÑĐµ Đ¶Đµ Đ½ÑƒĐ¶Đ½Đ¾, Ñ‡Ñ‚Đ¾Đ±Ñ‹ Đ¿ĐµÑ€Đ²Đ°Ñ Đ¿ÑƒÑÑ‚Đ°Ñ Đ¾Đ¿Ñ†Đ¸Ñ Đ¾Ñ‚Đ¾Đ±Ñ€Đ°Đ¶Đ°Đ»Đ°ÑÑŒ, Ñ‚Đ¾ ÑƒĐºĐ°Đ·Ñ‹Đ²Đ°ĐµĐ¼ Ñƒ ÑĐµĐ»ĐµĐºÑ‚Đ°: data-placeholder=""
						if (option.first().text() === '' && el.data('placeholder') !== '') {
							li.first().hide();
						}

						var selectHeight = selectbox.outerHeight(true);
						var searchHeight = search.parent().outerHeight(true) || 0;
						var isMaxHeight = ul.css('max-height');
						var liSelected = li.filter('.selected');
						if (liSelected.length < 1) li.first().addClass('selected sel');
						if (li.data('li-height') === undefined) {
							var liOuterHeight = li.outerHeight();
							if (selectPlaceholder !== false) liOuterHeight = li.eq(1).outerHeight();
							li.data('li-height', liOuterHeight);
						}
						var position = dropdown.css('top');
						if (dropdown.css('left') == 'auto') dropdown.css({left: 0});
						if (dropdown.css('top') == 'auto') {
							dropdown.css({top: selectHeight});
							position = selectHeight;
						}
						dropdown.hide();

						// ĐµÑĐ»Đ¸ Đ²Ñ‹Đ±Ñ€Đ°Đ½ Đ½Đµ Đ´ĐµÑ„Đ¾Đ»Ñ‚Đ½Ñ‹Đ¹ Đ¿ÑƒĐ½ĐºÑ‚
						if (liSelected.length) {
							// Đ´Đ¾Đ±Đ°Đ²Đ»ÑĐµĐ¼ ĐºĐ»Đ°ÑÑ, Đ¿Đ¾ĐºĐ°Đ·Ñ‹Đ²Đ°ÑÑ‰Đ¸Đ¹ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đµ ÑĐµĐ»ĐµĐºÑ‚Đ°
							if (option.first().text() != optionSelected.text()) {
								selectbox.addClass('changed');
							}
							// Đ¿ĐµÑ€ĐµĐ´Đ°ĐµĐ¼ ÑĐµĐ»ĐµĐºÑ‚Ñƒ ĐºĐ»Đ°ÑÑ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Đ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ°
							selectbox.data('jqfs-class', liSelected.data('jqfs-class'));
							selectbox.addClass(liSelected.data('jqfs-class'));
						}

						// ĐµÑĐ»Đ¸ ÑĐµĐ»ĐµĐºÑ‚ Đ½ĐµĐ°ĐºÑ‚Đ¸Đ²Đ½Ñ‹Đ¹
						if (el.is(':disabled')) {
							selectbox.addClass('disabled');
							return false;
						}

						// Đ¿Ñ€Đ¸ ĐºĐ»Đ¸ĐºĐµ Đ½Đ° Đ¿ÑĐµĐ²Đ´Đ¾ÑĐµĐ»ĐµĐºÑ‚Đµ
						divSelect.click(function() {

							// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ·Đ°ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
							if ($('div.jq-selectbox').filter('.opened').length) {
								opt.onSelectClosed.call($('div.jq-selectbox').filter('.opened'));
							}

							el.focus();

							// ĐµÑĐ»Đ¸ iOS, Ñ‚Đ¾ Đ½Đµ Đ¿Đ¾ĐºĐ°Đ·Ñ‹Đ²Đ°ĐµĐ¼ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº,
							// Ñ‚.Đº. Đ¾Ñ‚Đ¾Đ±Ñ€Đ°Đ¶Đ°ĐµÑ‚ÑÑ Đ½Đ°Ñ‚Đ¸Đ²Đ½Ñ‹Đ¹ Đ¸ Đ½ĐµĐ¸Đ·Đ²ĐµÑÑ‚Đ½Đ¾, ĐºĐ°Đº ĐµĐ³Đ¾ ÑĐ¿Ñ€ÑÑ‚Đ°Ñ‚ÑŒ
							if (iOS) return;

							// ÑƒĐ¼Đ½Đ¾Đµ Đ¿Đ¾Đ·Đ¸Ñ†Đ¸Đ¾Đ½Đ¸Ñ€Đ¾Đ²Đ°Đ½Đ¸Đµ
							var win = $(window);
							var liHeight = li.data('li-height');
							var topOffset = selectbox.offset().top;
							var bottomOffset = win.height() - selectHeight - (topOffset - win.scrollTop());
							var visible = el.data('visible-options');
							if (visible === undefined || visible === '') visible = opt.selectVisibleOptions;
							var minHeight = liHeight * 5;
							var newHeight = liHeight * visible;
							if (visible > 0 && visible < 6) minHeight = newHeight;
							if (visible === 0) newHeight = 'auto';

							var dropDown = function() {
								dropdown.height('auto').css({bottom: 'auto', top: position});
								var maxHeightBottom = function() {
									ul.css('max-height', Math.floor((bottomOffset - 20 - searchHeight) / liHeight) * liHeight);
								};
								maxHeightBottom();
								ul.css('max-height', newHeight);
								if (isMaxHeight != 'none') {
									ul.css('max-height', isMaxHeight);
								}
								if (bottomOffset < (dropdown.outerHeight() + 20)) {
									maxHeightBottom();
								}
							};

							var dropUp = function() {
								dropdown.height('auto').css({top: 'auto', bottom: position});
								var maxHeightTop = function() {
									ul.css('max-height', Math.floor((topOffset - win.scrollTop() - 20 - searchHeight) / liHeight) * liHeight);
								};
								maxHeightTop();
								ul.css('max-height', newHeight);
								if (isMaxHeight != 'none') {
									ul.css('max-height', isMaxHeight);
								}
								if ((topOffset - win.scrollTop() - 20) < (dropdown.outerHeight() + 20)) {
									maxHeightTop();
								}
							};

							if (selectSmartPositioning === true || selectSmartPositioning === 1) {
								// Ñ€Đ°ÑĐºÑ€Ñ‹Ñ‚Đ¸Đµ Đ²Đ½Đ¸Đ·
								if (bottomOffset > (minHeight + searchHeight + 20)) {
									dropDown();
									selectbox.removeClass('dropup').addClass('dropdown');
								// Ñ€Đ°ÑĐºÑ€Ñ‹Ñ‚Đ¸Đµ Đ²Đ²ĐµÑ€Ñ…
								} else {
									dropUp();
									selectbox.removeClass('dropdown').addClass('dropup');
								}
							} else if (selectSmartPositioning === false || selectSmartPositioning === 0) {
								// Ñ€Đ°ÑĐºÑ€Ñ‹Ñ‚Đ¸Đµ Đ²Đ½Đ¸Đ·
								if (bottomOffset > (minHeight + searchHeight + 20)) {
									dropDown();
									selectbox.removeClass('dropup').addClass('dropdown');
								}
							} else {
								// ĐµÑĐ»Đ¸ ÑƒĐ¼Đ½Đ¾Đµ Đ¿Đ¾Đ·Đ¸Ñ†Đ¸Đ¾Đ½Đ¸Ñ€Đ¾Đ²Đ°Đ½Đ¸Đµ Đ¾Ñ‚ĐºĐ»ÑÑ‡ĐµĐ½Đ¾
								dropdown.height('auto').css({bottom: 'auto', top: position});
								ul.css('max-height', newHeight);
								if (isMaxHeight != 'none') {
									ul.css('max-height', isMaxHeight);
								}
							}

							// ĐµÑĐ»Đ¸ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº Đ²Ñ‹Ñ…Đ¾Đ´Đ¸Ñ‚ Đ·Đ° Đ¿Ñ€Đ°Đ²Ñ‹Đ¹ ĐºÑ€Đ°Đ¹ Đ¾ĐºĐ½Đ° Đ±Ñ€Đ°ÑƒĐ·ĐµÑ€Đ°,
							// Ñ‚Đ¾ Đ¼ĐµĐ½ÑĐµĐ¼ Đ¿Đ¾Đ·Đ¸Ñ†Đ¸Đ¾Đ½Đ¸Ñ€Đ¾Đ²Đ°Đ½Đ¸Đµ Ñ Đ»ĐµĐ²Đ¾Đ³Đ¾ Đ½Đ° Đ¿Ñ€Đ°Đ²Đ¾Đµ
							if (selectbox.offset().left + dropdown.outerWidth() > win.width()) {
								dropdown.css({left: 'auto', right: 0});
							}
							// ĐºĐ¾Đ½ĐµÑ† ÑƒĐ¼Đ½Đ¾Đ³Đ¾ Đ¿Đ¾Đ·Đ¸Ñ†Đ¸Đ¾Đ½Đ¸Ñ€Đ¾Đ²Đ°Đ½Đ¸Ñ

							$('div.jqselect').css({zIndex: (selectzIndex - 1)}).removeClass('opened');
							selectbox.css({zIndex: selectzIndex});
							if (dropdown.is(':hidden')) {
								$('div.jq-selectbox__dropdown:visible').hide();
								dropdown.show();
								selectbox.addClass('opened focused');
								// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ¾Ñ‚ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
								opt.onSelectOpened.call(selectbox);
							} else {
								dropdown.hide();
								selectbox.removeClass('opened dropup dropdown');
								// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ·Đ°ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
								if ($('div.jq-selectbox').filter('.opened').length) {
									opt.onSelectClosed.call(selectbox);
								}
							}

							// Đ¿Đ¾Đ¸ÑĐºĐ¾Đ²Đ¾Đµ Đ¿Đ¾Đ»Đµ
							if (search.length) {
								search.val('').keyup();
								notFound.hide();
								search.keyup(function() {
									var query = $(this).val();
									li.each(function() {
										if (!$(this).html().match(new RegExp('.*?' + query + '.*?', 'i'))) {
											$(this).hide();
										} else {
											$(this).show();
										}
									});
									// Đ¿Ñ€ÑÑ‡ĐµĐ¼ 1-Ñ Đ¿ÑƒÑÑ‚ÑƒÑ Đ¾Đ¿Ñ†Đ¸Ñ
									if (option.first().text() === '' && el.data('placeholder') !== '') {
										li.first().hide();
									}
									if (li.filter(':visible').length < 1) {
										notFound.show();
									} else {
										notFound.hide();
									}
								});
							}

							// Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‡Đ¸Đ²Đ°ĐµĐ¼ Đ´Đ¾ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Đ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ° Đ¿Ñ€Đ¸ Đ¾Ñ‚ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐ¿Đ¸ÑĐºĐ°
							if (li.filter('.selected').length) {
								if (el.val() === '') {
									ul.scrollTop(0);
								} else {
									// ĐµÑĐ»Đ¸ Đ½ĐµÑ‡ĐµÑ‚Đ½Đ¾Đµ ĐºĐ¾Đ»Đ¸Ñ‡ĐµÑÑ‚Đ²Đ¾ Đ²Đ¸Đ´Đ¸Đ¼Ñ‹Ñ… Đ¿ÑƒĐ½ĐºÑ‚Đ¾Đ²,
									// Ñ‚Đ¾ Đ²Ñ‹ÑĐ¾Ñ‚Ñƒ Đ¿ÑƒĐ½ĐºÑ‚Đ° Đ´ĐµĐ»Đ¸Đ¼ Đ¿Đ¾Đ¿Đ¾Đ»Đ°Đ¼ Đ´Đ»Ñ Đ¿Đ¾ÑĐ»ĐµĐ´ÑƒÑÑ‰ĐµĐ³Đ¾ Ñ€Đ°ÑÑ‡ĐµÑ‚Đ°
									if ( (ul.innerHeight() / liHeight) % 2 !== 0 ) liHeight = liHeight / 2;
									ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - ul.innerHeight() / 2 + liHeight);
								}
							}

							preventScrolling(ul);

						}); // end divSelect.click()

						// Đ¿Ñ€Đ¸ Đ½Đ°Đ²ĐµĐ´ĐµĐ½Đ¸Đ¸ ĐºÑƒÑ€ÑĐ¾Ñ€Đ° Đ½Đ° Đ¿ÑƒĐ½ĐºÑ‚ ÑĐ¿Đ¸ÑĐºĐ°
						li.hover(function() {
							$(this).siblings().removeClass('selected');
						});
						var selectedText = li.filter('.selected').text();

						// Đ¿Ñ€Đ¸ ĐºĐ»Đ¸ĐºĐµ Đ½Đ° Đ¿ÑƒĐ½ĐºÑ‚ ÑĐ¿Đ¸ÑĐºĐ°
						li.filter(':not(.disabled):not(.optgroup)').click(function() {
							el.focus();
							var t = $(this);
							var liText = t.text();
							if (!t.is('.selected')) {
								var index = t.index();
								index -= t.prevAll('.optgroup').length;
								t.addClass('selected sel').siblings().removeClass('selected sel');
								option.prop('selected', false).eq(index).prop('selected', true);
								selectedText = liText;
								divText.text(liText);

								// Đ¿ĐµÑ€ĐµĐ´Đ°ĐµĐ¼ ÑĐµĐ»ĐµĐºÑ‚Ñƒ ĐºĐ»Đ°ÑÑ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Đ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ°
								if (selectbox.data('jqfs-class')) selectbox.removeClass(selectbox.data('jqfs-class'));
								selectbox.data('jqfs-class', t.data('jqfs-class'));
								selectbox.addClass(t.data('jqfs-class'));

								el.change();
							}
							dropdown.hide();
							selectbox.removeClass('opened dropup dropdown');
							// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ·Đ°ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
							opt.onSelectClosed.call(selectbox);

						});
						dropdown.mouseout(function() {
							$('li.sel', dropdown).addClass('selected');
						});

						// Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đµ ÑĐµĐ»ĐµĐºÑ‚Đ°
						el.on('change.styler', function() {
							divText.text(option.filter(':selected').text()).removeClass('placeholder');
							li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
							// Đ´Đ¾Đ±Đ°Đ²Đ»ÑĐµĐ¼ ĐºĐ»Đ°ÑÑ, Đ¿Đ¾ĐºĐ°Đ·Ñ‹Đ²Đ°ÑÑ‰Đ¸Đ¹ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đµ ÑĐµĐ»ĐµĐºÑ‚Đ°
							if (option.first().text() != li.filter('.selected').text()) {
								selectbox.addClass('changed');
							} else {
								selectbox.removeClass('changed');
							}
						})
						.on('focus.styler', function() {
							selectbox.addClass('focused');
							$('div.jqselect').not('.focused').removeClass('opened dropup dropdown').find('div.jq-selectbox__dropdown').hide();
						})
						.on('blur.styler', function() {
							selectbox.removeClass('focused');
						})
						// Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đµ ÑĐµĐ»ĐµĐºÑ‚Đ° Ñ ĐºĐ»Đ°Đ²Đ¸Đ°Ñ‚ÑƒÑ€Ñ‹
						.on('keydown.styler keyup.styler', function(e) {
							var liHeight = li.data('li-height');
							if (el.val() === '') {
								divText.text(selectPlaceholder).addClass('placeholder');
							} else {
								divText.text(option.filter(':selected').text());
							}
							li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
							// Đ²Đ²ĐµÑ€Ñ…, Đ²Đ»ĐµĐ²Đ¾, Page Up, Home
							if (e.which == 38 || e.which == 37 || e.which == 33 || e.which == 36) {
								if (el.val() === '') {
									ul.scrollTop(0);
								} else {
									ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top);
								}
							}
							// Đ²Đ½Đ¸Đ·, Đ²Đ¿Ñ€Đ°Đ²Đ¾, Page Down, End
							if (e.which == 40 || e.which == 39 || e.which == 34 || e.which == 35) {
								ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - ul.innerHeight() + liHeight);
							}
							// Đ·Đ°ĐºÑ€Ñ‹Đ²Đ°ĐµĐ¼ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº Đ¿Ñ€Đ¸ Đ½Đ°Đ¶Đ°Ñ‚Đ¸Đ¸ Enter
							if (e.which == 13) {
								e.preventDefault();
								dropdown.hide();
								selectbox.removeClass('opened dropup dropdown');
								// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ·Đ°ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
								opt.onSelectClosed.call(selectbox);
							}
						}).on('keydown.styler', function(e) {
							// Đ¾Ñ‚ĐºÑ€Ñ‹Đ²Đ°ĐµĐ¼ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº Đ¿Ñ€Đ¸ Đ½Đ°Đ¶Đ°Ñ‚Đ¸Đ¸ Space
							if (e.which == 32) {
								e.preventDefault();
								divSelect.click();
							}
						});

						// Đ¿Ñ€ÑÑ‡ĐµĐ¼ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº Đ¿Ñ€Đ¸ ĐºĐ»Đ¸ĐºĐµ Đ·Đ° Đ¿Ñ€ĐµĐ´ĐµĐ»Đ°Đ¼Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
						if (!onDocumentClick.registered) {
							$(document).on('click', onDocumentClick);
							onDocumentClick.registered = true;
						}

					} // end doSelect()

					// Đ¼ÑƒĐ»ÑŒÑ‚Đ¸ÑĐµĐ»ĐµĐºÑ‚
					function doMultipleSelect() {

						var att = new Attributes();
						var selectbox =
							$('<div class="jq-select-multiple jqselect"></div>')
							.attr({
								id: att.id,
								title: att.title
							})
							.addClass(att.classes)
							.data(att.data)
						;

						el.after(selectbox);

						makeList();
						selectbox.append('<ul>' + list + '</ul>');
						var ul = $('ul', selectbox);
						var li = $('li', selectbox);
						var size = el.attr('size');
						var ulHeight = ul.outerHeight();
						var liHeight = li.outerHeight();
						if (size !== undefined && size > 0) {
							ul.css({'height': liHeight * size});
						} else {
							ul.css({'height': liHeight * 4});
						}
						if (ulHeight > selectbox.height()) {
							ul.css('overflowY', 'scroll');
							preventScrolling(ul);
							// Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‡Đ¸Đ²Đ°ĐµĐ¼ Đ´Đ¾ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Đ¾Đ³Đ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ°
							if (li.filter('.selected').length) {
								ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top);
							}
						}

						// Đ¿Ñ€ÑÑ‡ĐµĐ¼ Đ¾Ñ€Đ¸Đ³Đ¸Đ½Đ°Đ»ÑŒĐ½Ñ‹Đ¹ ÑĐµĐ»ĐµĐºÑ‚
						el.prependTo(selectbox);

						// ĐµÑĐ»Đ¸ ÑĐµĐ»ĐµĐºÑ‚ Đ½ĐµĐ°ĐºÑ‚Đ¸Đ²Đ½Ñ‹Đ¹
						if (el.is(':disabled')) {
							selectbox.addClass('disabled');
							option.each(function() {
								if ($(this).is(':selected')) li.eq($(this).index()).addClass('selected');
							});

						// ĐµÑĐ»Đ¸ ÑĐµĐ»ĐµĐºÑ‚ Đ°ĐºÑ‚Đ¸Đ²Đ½Ñ‹Đ¹
						} else {

							// Đ¿Ñ€Đ¸ ĐºĐ»Đ¸ĐºĐµ Đ½Đ° Đ¿ÑƒĐ½ĐºÑ‚ ÑĐ¿Đ¸ÑĐºĐ°
							li.filter(':not(.disabled):not(.optgroup)').click(function(e) {
								el.focus();
								var clkd = $(this);
								if(!e.ctrlKey && !e.metaKey) clkd.addClass('selected');
								if(!e.shiftKey) clkd.addClass('first');
								if(!e.ctrlKey && !e.metaKey && !e.shiftKey) clkd.siblings().removeClass('selected first');

								// Đ²Ñ‹Đ´ĐµĐ»ĐµĐ½Đ¸Đµ Đ¿ÑƒĐ½ĐºÑ‚Đ¾Đ² Đ¿Ñ€Đ¸ Đ·Đ°Đ¶Đ°Ñ‚Đ¾Đ¼ Ctrl
								if(e.ctrlKey || e.metaKey) {
									if (clkd.is('.selected')) clkd.removeClass('selected first');
										else clkd.addClass('selected first');
									clkd.siblings().removeClass('first');
								}

								// Đ²Ñ‹Đ´ĐµĐ»ĐµĐ½Đ¸Đµ Đ¿ÑƒĐ½ĐºÑ‚Đ¾Đ² Đ¿Ñ€Đ¸ Đ·Đ°Đ¶Đ°Ñ‚Đ¾Đ¼ Shift
								if(e.shiftKey) {
									var prev = false,
											next = false;
									clkd.siblings().removeClass('selected').siblings('.first').addClass('selected');
									clkd.prevAll().each(function() {
										if ($(this).is('.first')) prev = true;
									});
									clkd.nextAll().each(function() {
										if ($(this).is('.first')) next = true;
									});
									if (prev) {
										clkd.prevAll().each(function() {
											if ($(this).is('.selected')) return false;
												else $(this).not('.disabled, .optgroup').addClass('selected');
										});
									}
									if (next) {
										clkd.nextAll().each(function() {
											if ($(this).is('.selected')) return false;
												else $(this).not('.disabled, .optgroup').addClass('selected');
										});
									}
									if (li.filter('.selected').length == 1) clkd.addClass('first');
								}

								// Đ¾Ñ‚Đ¼ĐµÑ‡Đ°ĐµĐ¼ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Ñ‹Đµ Đ¼Ñ‹ÑˆÑŒÑ
								option.prop('selected', false);
								li.filter('.selected').each(function() {
									var t = $(this);
									var index = t.index();
									if (t.is('.option')) index -= t.prevAll('.optgroup').length;
									option.eq(index).prop('selected', true);
								});
								el.change();

							});

							// Đ¾Ñ‚Đ¼ĐµÑ‡Đ°ĐµĐ¼ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Ñ‹Đµ Ñ ĐºĐ»Đ°Đ²Đ¸Đ°Ñ‚ÑƒÑ€Ñ‹
							option.each(function(i) {
								$(this).data('optionIndex', i);
							});
							el.on('change.styler', function() {
								li.removeClass('selected');
								var arrIndexes = [];
								option.filter(':selected').each(function() {
									arrIndexes.push($(this).data('optionIndex'));
								});
								li.not('.optgroup').filter(function(i) {
									return $.inArray(i, arrIndexes) > -1;
								}).addClass('selected');
							})
							.on('focus.styler', function() {
								selectbox.addClass('focused');
							})
							.on('blur.styler', function() {
								selectbox.removeClass('focused');
							});

							// Đ¿Ñ€Đ¾ĐºÑ€ÑƒÑ‡Đ¸Đ²Đ°ĐµĐ¼ Ñ ĐºĐ»Đ°Đ²Đ¸Đ°Ñ‚ÑƒÑ€Ñ‹
							if (ulHeight > selectbox.height()) {
								el.on('keydown.styler', function(e) {
									// Đ²Đ²ĐµÑ€Ñ…, Đ²Đ»ĐµĐ²Đ¾, PageUp
									if (e.which == 38 || e.which == 37 || e.which == 33) {
										ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - liHeight);
									}
									// Đ²Đ½Đ¸Đ·, Đ²Đ¿Ñ€Đ°Đ²Đ¾, PageDown
									if (e.which == 40 || e.which == 39 || e.which == 34) {
										ul.scrollTop(ul.scrollTop() + li.filter('.selected:last').position().top - ul.innerHeight() + liHeight * 2);
									}
								});
							}

						}
					} // end doMultipleSelect()

					if (el.is('[multiple]')) {

						// ĐµÑĐ»Đ¸ Android Đ¸Đ»Đ¸ iOS, Ñ‚Đ¾ Đ¼ÑƒĐ»ÑŒÑ‚Đ¸ÑĐµĐ»ĐµĐºÑ‚ Đ½Đµ ÑÑ‚Đ¸Đ»Đ¸Đ·ÑƒĐµĐ¼
						// Đ¿Ñ€Đ¸Ñ‡Đ¸Đ½Đ° Đ´Đ»Ñ Android - Đ² ÑÑ‚Đ¸Đ»Đ¸Đ·Đ¾Đ²Đ°Đ½Đ½Đ¾Đ¼ ÑĐµĐ»ĐµĐºÑ‚Đµ Đ½ĐµÑ‚ Đ²Đ¾Đ·Đ¼Đ¾Đ¶Đ½Đ¾ÑÑ‚Đ¸ Đ²Ñ‹Đ±Ñ€Đ°Ñ‚ÑŒ Đ½ĐµÑĐºĐ¾Đ»ÑŒĐºĐ¾ Đ¿ÑƒĐ½ĐºÑ‚Đ¾Đ²
						// Đ¿Ñ€Đ¸Ñ‡Đ¸Đ½Đ° Đ´Đ»Ñ iOS - Đ² ÑÑ‚Đ¸Đ»Đ¸Đ·Đ¾Đ²Đ°Đ½Đ½Đ¾Đ¼ ÑĐµĐ»ĐµĐºÑ‚Đµ Đ½ĐµĐ¿Ñ€Đ°Đ²Đ¸Đ»ÑŒĐ½Đ¾ Đ¾Ñ‚Đ¾Đ±Ñ€Đ°Đ¶Đ°ÑÑ‚ÑÑ Đ²Ñ‹Đ±Ñ€Đ°Đ½Đ½Ñ‹Đµ Đ¿ÑƒĐ½ĐºÑ‚Ñ‹
						if (Android || iOS) return;

						doMultipleSelect();
					} else {
						doSelect();
					}

				}; // end selectboxOutput()

				selectboxOutput();

				// Đ¾Đ±Đ½Đ¾Đ²Đ»ĐµĐ½Đ¸Đµ Đ¿Ñ€Đ¸ Đ´Đ¸Đ½Đ°Đ¼Đ¸Ñ‡ĐµÑĐºĐ¾Đ¼ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸
				el.on('refresh', function() {
					el.off('.styler').parent().before(el).remove();
					selectboxOutput();
				});

			// end select

			// reset
			} else if (el.is(':reset')) {
				el.on('click', function() {
					setTimeout(function() {
						el.closest('form').find('input, select').trigger('refresh');
					}, 1);
				});
			} // end reset

		}, // init: function()

		// Đ´ĐµÑÑ‚Ñ€ÑƒĐºÑ‚Đ¾Ñ€
		destroy: function() {

			var el = $(this.element);

			if (el.is(':checkbox') || el.is(':radio')) {
				el.removeData('_' + pluginName).off('.styler refresh').removeAttr('style').parent().before(el).remove();
				el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
			} else if (el.is('input[type="number"]')) {
				el.removeData('_' + pluginName).off('.styler refresh').closest('.jq-number').before(el).remove();
			} else if (el.is(':file') || el.is('select')) {
				el.removeData('_' + pluginName).off('.styler refresh').removeAttr('style').parent().before(el).remove();
			}

		} // destroy: function()

	}; // Plugin.prototype

	$.fn[pluginName] = function(options) {
		var args = arguments;
		if (options === undefined || typeof options === 'object') {
			this.each(function() {
				if (!$.data(this, '_' + pluginName)) {
					$.data(this, '_' + pluginName, new Plugin(this, options));
				}
			})
			// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Đ¾ÑĐ»Đµ Đ²Ñ‹Đ¿Đ¾Đ»Đ½ĐµĐ½Đ¸Ñ Đ¿Đ»Đ°Đ³Đ¸Đ½Đ°
			.promise()
			.done(function() {
				var opt = $(this[0]).data('_' + pluginName);
				if (opt) opt.options.onFormStyled.call();
			});
			return this;
		} else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
			var returns;
			this.each(function() {
				var instance = $.data(this, '_' + pluginName);
				if (instance instanceof Plugin && typeof instance[options] === 'function') {
					returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
				}
			});
			return returns !== undefined ? returns : this;
		}
	};

	// Đ¿Ñ€ÑÑ‡ĐµĐ¼ Đ²Ñ‹Đ¿Đ°Đ´Đ°ÑÑ‰Đ¸Đ¹ ÑĐ¿Đ¸ÑĐ¾Đº Đ¿Ñ€Đ¸ ĐºĐ»Đ¸ĐºĐµ Đ·Đ° Đ¿Ñ€ĐµĐ´ĐµĐ»Đ°Đ¼Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
	function onDocumentClick(e) {
		// e.target.nodeName != 'OPTION' - Đ´Đ¾Đ±Đ°Đ²Đ»ĐµĐ½Đ¾ Đ´Đ»Ñ Đ¾Đ±Ñ…Đ¾Đ´Đ° Đ±Đ°Đ³Đ° Đ² Opera Đ½Đ° Đ´Đ²Đ¸Đ¶ĐºĐµ Presto
		// (Đ¿Ñ€Đ¸ Đ¸Đ·Đ¼ĐµĐ½ĐµĐ½Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ° Ñ ĐºĐ»Đ°Đ²Đ¸Đ°Ñ‚ÑƒÑ€Ñ‹ ÑÑ€Đ°Đ±Đ°Ñ‚Ñ‹Đ²Đ°ĐµÑ‚ ÑĐ¾Đ±Ñ‹Ñ‚Đ¸Đµ onclick)
		if (!$(e.target).parents().hasClass('jq-selectbox') && e.target.nodeName != 'OPTION') {
			if ($('div.jq-selectbox.opened').length) {
				var selectbox = $('div.jq-selectbox.opened'),
						search = $('div.jq-selectbox__search input', selectbox),
						dropdown = $('div.jq-selectbox__dropdown', selectbox),
						opt = selectbox.find('select').data('_' + pluginName).options;

				// ĐºĐ¾Đ»Đ±ĐµĐº Đ¿Ñ€Đ¸ Đ·Đ°ĐºÑ€Ñ‹Ñ‚Đ¸Đ¸ ÑĐµĐ»ĐµĐºÑ‚Đ°
				opt.onSelectClosed.call(selectbox);

				if (search.length) search.val('').keyup();
				dropdown.hide().find('li.sel').addClass('selected');
				selectbox.removeClass('focused opened dropup dropdown');
			}
		}
	}
	onDocumentClick.registered = false;

}));