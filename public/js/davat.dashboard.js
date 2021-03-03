window.davat = {};
$(document).on('statio:global:renderResponse', function (event, base, context) {
    metarget();
    base.each(function () {

        davat.select2($('.select2-select', base));
        if($(base).has('[data-tabs]').length){
            window.tabs = new Tabby((base.attr('data-xhr') ? '[data-xhr="' + base.attr('data-xhr') + '"] ' : '') + '[data-tabs]');
        }
        $('[data-tabs] a[role=tab]', base).on('click', function(){
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href[1]) {
                // location.hash = href[1];
                // return false;
                history.pushState(null, null, $(this).attr('href'));

            }
        })
    });
});

(function(){
    var target = {
        'centers-index' : function(){
            var myclinic = $('[data-metarget^=centers-myclinic]');
            if(myclinic.length){
                for(var ci = 0; ci < myclinic.length; ci++){
                    var pattern = new RegExp(myclinic.eq(ci).attr('href') + '.*');
                    if((pattern.test(location.href))){
                        return false;
                    }
                }
            }
            return /\/dashboard\/centers.*/.test(location.pathname);
        }
    }
    window.metarget = function(){
        removeTargets();
        $('[data-metarget]').each(function(){
            var tg = $(this).attr('data-metarget');
            if($(this).attr('data-metarget-pattern')){
                target[tg] = new RegExp($(this).attr('data-metarget-pattern'));
            }
            if(target[tg] && target[tg].constructor.name == 'RegExp' && target[tg].test(location.pathname)){
                initTarget($(this));
            }else if(typeof(target[tg]) == 'function' && target[tg].call()){
                initTarget($(this));
            }
        });
        if(!$('.metarget').length){
            initTarget($('[data-metarget-default]'));
        }
    }
    function initTarget(target){
        target.addClass(['active', 'metarget']);
    }
    function removeTargets(){
        $('.metarget, [data-metarget]').removeClass(['active', 'metarget']);
    }
})();

(function(davat){
    var select2 = function(){
        var options = {
            width: '100%',
            amdLanguageBase: 'dist/vendors/select2-4.0.13/dist/js/i18n',
            language: 'fa',
            minimumInputLength: 0,
            dir: "rtl",
            templateResult : function(data){
                if(!data.html){
                    var html =  $(data.element).parent().data('default-value');
                    data.html = $('[data-id='+data.id+']', $(html));
                }
                return data.html ? $('[data-selection]', data.html) : data.text;
            },
            templateSelection : function(data){
                if(!data.html){
                    var html =  $(data.element).parent().data('default-value');
                    html = $('[data-id='+data.id+']', $(html))[0].outerHTML;
                }
                html = html || data.html;
                $('[data-xhr]', html).each(function(){
                    var xhr = $(this).attr('data-xhr');
                    new Statio({
                        type: 'render',
                        fake: true,
                        response : $(html).html(),
                        context: $('[data-xhr='+xhr+']').get(0)
                    });
                });
                return html ? $('[data-selection]', html) : data.text;
            },
        };
        if($('[data-for='+$(this).attr('id')+']')[0]){
            $(this).data('default-value', $('[data-for='+$(this).attr('id')+']')[0].outerHTML);
        }
        $('[data-for='+$(this).attr('id')+']').remove();
        if ($(this).is('[data-url]')) {
            var _self = this;
            options.ajax = {
                delay: 250,
                url: $(this).attr('data-url'),
                quietMillis: 250,
                beforeSend: function(xhr){xhr.setRequestHeader('data-xhr-base', $(_self).attr('data-xhr-base') || 'select2');},
                data: function (params) {
                    return {
                        q: params.term || ''
                    };
                },
                processResults: function (data) {
                    data = data.data || data;
                    var split = data.split(/\n/, 1);
                    var html = $('<div>' + data.substr(split[0].length)  + '</div>');
                    data = JSON.parse(split[0]);
                    var result = { results: [] };
                    for (var i = 0; i < data.length; i++) {
                        result.results.push({
                            id: data[i].id,
                            text: data[i].title,
                            html : $('[data-id="'+ data[i].id +'"]', html).get(0).outerHTML
                        });
                    }
                    return result;
                },
                cache: false
            };
        }
        $(this).select2(options);
        if($(this).is('[data-relation]')){
            $(this).on('select2:select', function (e) {
                var relation_ids = $(this).attr('data-relation');
                var f_id = $(this).val();
                relation_ids.split(' ').forEach(function (relation_id){
                    var relation = $('#' + relation_id);
                    if (!relation.length) return;
                    var url = unescape(relation.attr('data-url-pattern')).replace('%%', f_id);
                    relation.attr('data-url', url);
                    relation.val(null).trigger("change");
                    relation.select2('destroy');
                    select2.call(relation[0]);
                });
            });
        }
    }
    davat.select2 = function(element){
        element.each(function(){
            select2.call(this);
        });
    }
})(window.davat);

$('body').on('statio:dashboard:cases:show', function () {
    $('.sample-record').hover(function(){
        $('[data-xhr="client-'+ $(this).attr('data-client') +'"], [data-xhr="session-'+ $(this).attr('data-session') +'"]').addClass('bg-gray-50');
    }, function(){
        $('[data-xhr="client-'+ $(this).attr('data-client') +'"], [data-xhr="session-'+ $(this).attr('data-session') +'"]').removeClass('bg-gray-50');
    });

    $('.client-record').hover(function(){
        $('[data-client="'+ $(this).attr('data-id') +'"]').addClass('bg-gray-50');
    }, function(){
        $('[data-client="'+ $(this).attr('data-id') +'"]').removeClass('bg-gray-50');
    });
});

/* NProgress, (c) 2013, 2014 Rico Sta. Cruz - http://ricostacruz.com/nprogress
 * @license MIT */

;(function(root, factory) {

  if (typeof define === 'function' && define.amd) {
    define(factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    root.NProgress = factory();
  }

})(this, function() {
  var NProgress = {};

  NProgress.version = '0.2.0';

  var Settings = NProgress.settings = {
    minimum: 0.08,
    easing: 'linear',
    positionUsing: '',
    speed: 200,
    trickle: true,
    trickleSpeed: 200,
    showSpinner: true,
    barSelector: '[role="bar"]',
    spinnerSelector: '[role="spinner"]',
    parent: 'body',
    template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
  };

  /**
   * Updates configuration.
   *
   *     NProgress.configure({
   *       minimum: 0.1
   *     });
   */
  NProgress.configure = function(options) {
    var key, value;
    for (key in options) {
      value = options[key];
      if (value !== undefined && options.hasOwnProperty(key)) Settings[key] = value;
    }

    return this;
  };

  /**
   * Last number.
   */

  NProgress.status = null;

  /**
   * Sets the progress bar status, where `n` is a number from `0.0` to `1.0`.
   *
   *     NProgress.set(0.4);
   *     NProgress.set(1.0);
   */

  NProgress.set = function(n) {
    var started = NProgress.isStarted();

    n = clamp(n, Settings.minimum, 1);
    NProgress.status = (n === 1 ? null : n);

    var progress = NProgress.render(!started),
        bar      = progress.querySelector(Settings.barSelector),
        speed    = Settings.speed,
        ease     = Settings.easing;

    progress.offsetWidth; /* Repaint */

    queue(function(next) {
      // Set positionUsing if it hasn't already been set
      if (Settings.positionUsing === '') Settings.positionUsing = NProgress.getPositioningCSS();

      // Add transition
      css(bar, barPositionCSS(n, speed, ease));

      if (n === 1) {
        // Fade out
        css(progress, {
          transition: 'none',
          opacity: 1
        });
        progress.offsetWidth; /* Repaint */

        setTimeout(function() {
          css(progress, {
            transition: 'all ' + speed + 'ms linear',
            opacity: 0
          });
          setTimeout(function() {
            NProgress.remove();
            next();
          }, speed);
        }, speed);
      } else {
        setTimeout(next, speed);
      }
    });

    return this;
  };

  NProgress.isStarted = function() {
    return typeof NProgress.status === 'number';
  };

  /**
   * Shows the progress bar.
   * This is the same as setting the status to 0%, except that it doesn't go backwards.
   *
   *     NProgress.start();
   *
   */
  NProgress.start = function() {
    if (!NProgress.status) NProgress.set(0);

    var work = function() {
      setTimeout(function() {
        if (!NProgress.status) return;
        NProgress.trickle();
        work();
      }, Settings.trickleSpeed);
    };

    if (Settings.trickle) work();

    return this;
  };

  /**
   * Hides the progress bar.
   * This is the *sort of* the same as setting the status to 100%, with the
   * difference being `done()` makes some placebo effect of some realistic motion.
   *
   *     NProgress.done();
   *
   * If `true` is passed, it will show the progress bar even if its hidden.
   *
   *     NProgress.done(true);
   */

  NProgress.done = function(force) {
    if (!force && !NProgress.status) return this;

    return NProgress.inc(0.3 + 0.5 * Math.random()).set(1);
  };

  /**
   * Increments by a random amount.
   */

  NProgress.inc = function(amount) {
    var n = NProgress.status;

    if (!n) {
      return NProgress.start();
    } else if(n > 1) {
      return;
    } else {
      if (typeof amount !== 'number') {
        if (n >= 0 && n < 0.2) { amount = 0.1; }
        else if (n >= 0.2 && n < 0.5) { amount = 0.04; }
        else if (n >= 0.5 && n < 0.8) { amount = 0.02; }
        else if (n >= 0.8 && n < 0.99) { amount = 0.005; }
        else { amount = 0; }
      }

      n = clamp(n + amount, 0, 0.994);
      return NProgress.set(n);
    }
  };

  NProgress.trickle = function() {
    return NProgress.inc();
  };

  /**
   * Waits for all supplied jQuery promises and
   * increases the progress as the promises resolve.
   *
   * @param $promise jQUery Promise
   */
  (function() {
    var initial = 0, current = 0;

    NProgress.promise = function($promise) {
      if (!$promise || $promise.state() === "resolved") {
        return this;
      }

      if (current === 0) {
        NProgress.start();
      }

      initial++;
      current++;

      $promise.always(function() {
        current--;
        if (current === 0) {
            initial = 0;
            NProgress.done();
        } else {
            NProgress.set((initial - current) / initial);
        }
      });

      return this;
    };

  })();

  /**
   * (Internal) renders the progress bar markup based on the `template`
   * setting.
   */

  NProgress.render = function(fromStart) {
    if (NProgress.isRendered()) return document.getElementById('nprogress');

    addClass(document.documentElement, 'nprogress-busy');

    var progress = document.createElement('div');
    progress.id = 'nprogress';
    progress.innerHTML = Settings.template;



    var bar = progress.querySelector(Settings.barSelector),
        perc = fromStart ? '-100' : toBarPerc(NProgress.status || 0),
        parent = isDOM(Settings.parent)
          ? Settings.parent
          : document.querySelector(Settings.parent),
        spinner

    css(bar, {
      transition: 'all 0 linear',
      transform: 'translate3d(' + perc + '%,0,0)'
    });

    if (!Settings.showSpinner) {
      spinner = progress.querySelector(Settings.spinnerSelector);
      spinner && removeElement(spinner);
    }

    if (parent != document.body) {
      addClass(parent, 'nprogress-custom-parent');
    }

    parent.appendChild(progress);
    return progress;
  };

  /**
   * Removes the element. Opposite of render().
   */

  NProgress.remove = function() {
    removeClass(document.documentElement, 'nprogress-busy');
    var parent = isDOM(Settings.parent)
      ? Settings.parent
      : document.querySelector(Settings.parent)
    removeClass(parent, 'nprogress-custom-parent')
    var progress = document.getElementById('nprogress');
    progress && removeElement(progress);
  };

  /**
   * Checks if the progress bar is rendered.
   */

  NProgress.isRendered = function() {
    return !!document.getElementById('nprogress');
  };

  /**
   * Determine which positioning CSS rule to use.
   */

  NProgress.getPositioningCSS = function() {
    // Sniff on document.body.style
    var bodyStyle = document.body.style;

    // Sniff prefixes
    var vendorPrefix = ('WebkitTransform' in bodyStyle) ? 'Webkit' :
                       ('MozTransform' in bodyStyle) ? 'Moz' :
                       ('msTransform' in bodyStyle) ? 'ms' :
                       ('OTransform' in bodyStyle) ? 'O' : '';

    if (vendorPrefix + 'Perspective' in bodyStyle) {
      // Modern browsers with 3D support, e.g. Webkit, IE10
      return 'translate3d';
    } else if (vendorPrefix + 'Transform' in bodyStyle) {
      // Browsers without 3D support, e.g. IE9
      return 'translate';
    } else {
      // Browsers without translate() support, e.g. IE7-8
      return 'margin';
    }
  };

  /**
   * Helpers
   */

  function isDOM (obj) {
    if (typeof HTMLElement === 'object') {
      return obj instanceof HTMLElement
    }
    return (
      obj &&
      typeof obj === 'object' &&
      obj.nodeType === 1 &&
      typeof obj.nodeName === 'string'
    )
  }

  function clamp(n, min, max) {
    if (n < min) return min;
    if (n > max) return max;
    return n;
  }

  /**
   * (Internal) converts a percentage (`0..1`) to a bar translateX
   * percentage (`-100%..0%`).
   */

  function toBarPerc(n) {
    return (-1 + n) * 100;
  }


  /**
   * (Internal) returns the correct CSS for changing the bar's
   * position given an n percentage, and speed and ease from Settings
   */

  function barPositionCSS(n, speed, ease) {
    var barCSS;

    if (Settings.positionUsing === 'translate3d') {
      barCSS = { transform: 'translate3d('+toBarPerc(n)+'%,0,0)' };
    } else if (Settings.positionUsing === 'translate') {
      barCSS = { transform: 'translate('+toBarPerc(n)+'%,0)' };
    } else {
      barCSS = { 'margin-left': toBarPerc(n)+'%' };
    }

    barCSS.transition = 'all '+speed+'ms '+ease;

    return barCSS;
  }

  /**
   * (Internal) Queues a function to be executed.
   */

  var queue = (function() {
    var pending = [];

    function next() {
      var fn = pending.shift();
      if (fn) {
        fn(next);
      }
    }

    return function(fn) {
      pending.push(fn);
      if (pending.length == 1) next();
    };
  })();

  /**
   * (Internal) Applies css properties to an element, similar to the jQuery
   * css method.
   *
   * While this helper does assist with vendor prefixed property names, it
   * does not perform any manipulation of values prior to setting styles.
   */

  var css = (function() {
    var cssPrefixes = [ 'Webkit', 'O', 'Moz', 'ms' ],
        cssProps    = {};

    function camelCase(string) {
      return string.replace(/^-ms-/, 'ms-').replace(/-([\da-z])/gi, function(match, letter) {
        return letter.toUpperCase();
      });
    }

    function getVendorProp(name) {
      var style = document.body.style;
      if (name in style) return name;

      var i = cssPrefixes.length,
          capName = name.charAt(0).toUpperCase() + name.slice(1),
          vendorName;
      while (i--) {
        vendorName = cssPrefixes[i] + capName;
        if (vendorName in style) return vendorName;
      }

      return name;
    }

    function getStyleProp(name) {
      name = camelCase(name);
      return cssProps[name] || (cssProps[name] = getVendorProp(name));
    }

    function applyCss(element, prop, value) {
      prop = getStyleProp(prop);
      element.style[prop] = value;
    }

    return function(element, properties) {
      var args = arguments,
          prop,
          value;

      if (args.length == 2) {
        for (prop in properties) {
          value = properties[prop];
          if (value !== undefined && properties.hasOwnProperty(prop)) applyCss(element, prop, value);
        }
      } else {
        applyCss(element, args[1], args[2]);
      }
    }
  })();

  /**
   * (Internal) Determines if an element or space separated list of class names contains a class name.
   */

  function hasClass(element, name) {
    var list = typeof element == 'string' ? element : classList(element);
    return list.indexOf(' ' + name + ' ') >= 0;
  }

  /**
   * (Internal) Adds a class to an element.
   */

  function addClass(element, name) {
    var oldList = classList(element),
        newList = oldList + name;

    if (hasClass(oldList, name)) return;

    // Trim the opening space.
    element.className = newList.substring(1);
  }

  /**
   * (Internal) Removes a class from an element.
   */

  function removeClass(element, name) {
    var oldList = classList(element),
        newList;

    if (!hasClass(element, name)) return;

    // Replace the class name.
    newList = oldList.replace(' ' + name + ' ', ' ');

    // Trim the opening and closing spaces.
    element.className = newList.substring(1, newList.length - 1);
  }

  /**
   * (Internal) Gets a space separated list of the class names on the element.
   * The list is wrapped with a single space on each end to facilitate finding
   * matches within the list.
   */

  function classList(element) {
    return (' ' + (element && element.className || '') + ' ').replace(/\s+/gi, ' ');
  }

  /**
   * (Internal) Removes an element from the DOM.
   */

  function removeElement(element) {
    element && element.parentNode && element.parentNode.removeChild(element);
  }

  return NProgress;
});
