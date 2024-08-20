var $ = jQuery;

function blockUIProgressCustom(n, t, i, r, u, f, e) {
    $.blockUI.defaults.css = {padding: n, margin: t, width: i, top: r, left: u, textAlign: f, cursor: e};
    $.blockUI({message: null, overlayCSS: {opacity: .6}});
    setTimeout($.unblockUI, 8e3)
}

function AppendQueryStr(n, t, i) {
    var u = 1, r = window.location.pathname, f = r.substring(t, r.lastIndexOf("/") + i);
    $(n).each(function () {
        var n = this.href, t = "ns=" + f + "&nst=" + $(this).html() + "&nsp=" + u++;
        n = n + (n.indexOf("?") > -1 ? "&" : "?");
        n = n + t;
        this.href = n
    })
}

function GdprOptin() {
    var n = "";
    return $("input[type='checkbox']").each(function () {
        $(this).attr("checked") && (n !== "" && (n += ","), n += $(this).val())
    }), $("input[name='gdpropt']").val(n)
}

var q, tns, portal, ndays;
(function (n, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : n.Popper = t()
})(this, function () {
    "use strict";

    function ut(n) {
        return n && "[object Function]" === {}.toString.call(n)
    }

    function r(n, t) {
        if (1 !== n.nodeType) return [];
        var r = n.ownerDocument.defaultView, i = r.getComputedStyle(n, null);
        return t ? i[t] : i
    }

    function y(n) {
        return "HTML" === n.nodeName ? n : n.parentNode || n.host
    }

    function s(n) {
        if (!n) return document.body;
        switch (n.nodeName) {
            case"HTML":
            case"BODY":
                return n.ownerDocument.body;
            case"#document":
                return n.body
        }
        var t = r(n), i = t.overflow, u = t.overflowX, f = t.overflowY;
        return /(auto|scroll|overlay)/.test(i + f + u) ? n : s(y(n))
    }

    function ft(n) {
        return n && n.referenceNode ? n.referenceNode : n
    }

    function u(n) {
        return 11 === n ? ii : 10 === n ? ri : ii || ri
    }

    function f(n) {
        var e, t, i;
        if (!n) return document.documentElement;
        for (e = u(10) ? document.body : null, t = n.offsetParent || null; t === e && n.nextElementSibling;) t = (n = n.nextElementSibling).offsetParent;
        return i = t && t.nodeName, i && "BODY" !== i && "HTML" !== i ? -1 !== ["TH", "TD", "TABLE"].indexOf(t.nodeName) && "static" === r(t, "position") ? f(t) : t : n ? n.ownerDocument.documentElement : document.documentElement
    }

    function fi(n) {
        var t = n.nodeName;
        return "BODY" !== t && ("HTML" === t || f(n.firstElementChild) === n)
    }

    function p(n) {
        return null === n.parentNode ? n : p(n.parentNode)
    }

    function l(n, t) {
        var i, u;
        if (!n || !n.nodeType || !t || !t.nodeType) return document.documentElement;
        var e = n.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING, o = e ? n : t, s = e ? t : n,
            r = document.createRange();
        return (r.setStart(o, 0), r.setEnd(s, 0), i = r.commonAncestorContainer, n !== i && t !== i || o.contains(s)) ? fi(i) ? i : f(i) : (u = p(n), u.host ? l(u.host, t) : l(n, p(t).host))
    }

    function e(n) {
        var f = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top",
            t = "top" === f ? "scrollTop" : "scrollLeft", i = n.nodeName, r, u;
        return "BODY" === i || "HTML" === i ? (r = n.ownerDocument.documentElement, u = n.ownerDocument.scrollingElement || r, u[t]) : n[t]
    }

    function ei(n, t) {
        var f = 2 < arguments.length && void 0 !== arguments[2] && arguments[2], r = e(t, "top"), u = e(t, "left"),
            i = f ? -1 : 1;
        return n.top += r * i, n.bottom += r * i, n.left += u * i, n.right += u * i, n
    }

    function et(n, t) {
        var i = "x" === t ? "Left" : "Top", r = "Left" == i ? "Right" : "Bottom";
        return parseFloat(n["border" + i + "Width"], 10) + parseFloat(n["border" + r + "Width"], 10)
    }

    function ot(n, i, r, f) {
        return t(i["offset" + n], i["scroll" + n], r["client" + n], r["offset" + n], r["scroll" + n], u(10) ? parseInt(r["offset" + n]) + parseInt(f["margin" + ("Height" === n ? "Top" : "Left")]) + parseInt(f["margin" + ("Height" === n ? "Bottom" : "Right")]) : 0)
    }

    function st(n) {
        var i = n.body, t = n.documentElement, r = u(10) && getComputedStyle(t);
        return {height: ot("Height", i, t, r), width: ot("Width", i, t, r)}
    }

    function i(t) {
        return n({}, t, {right: t.left + t.width, bottom: t.top + t.height})
    }

    function w(n) {
        var t = {}, o, s, l;
        try {
            u(10) ? (t = n.getBoundingClientRect(), o = e(n, "top"), s = e(n, "left"), t.top += o, t.left += s, t.bottom += o, t.right += s) : t = n.getBoundingClientRect()
        } catch (r) {
        }
        var f = {left: t.left, top: t.top, width: t.right - t.left, height: t.bottom - t.top},
            a = "HTML" === n.nodeName ? st(n.ownerDocument) : {}, v = a.width || n.clientWidth || f.width,
            y = a.height || n.clientHeight || f.height, h = n.offsetWidth - v, c = n.offsetHeight - y;
        return (h || c) && (l = r(n), h -= et(l, "x"), c -= et(l, "y"), f.width -= h, f.height -= c), i(f)
    }

    function b(n, f) {
        var b = 2 < arguments.length && void 0 !== arguments[2] && arguments[2], k = u(10), d = "HTML" === f.nodeName,
            h = w(n), o = w(f), v = s(n), c = r(f), y = parseFloat(c.borderTopWidth, 10),
            p = parseFloat(c.borderLeftWidth, 10), e, l, a;
        return b && d && (o.top = t(o.top, 0), o.left = t(o.left, 0)), e = i({
            top: h.top - o.top - y,
            left: h.left - o.left - p,
            width: h.width,
            height: h.height
        }), (e.marginTop = 0, e.marginLeft = 0, !k && d) && (l = parseFloat(c.marginTop, 10), a = parseFloat(c.marginLeft, 10), e.top -= y - l, e.bottom -= y - l, e.left -= p - a, e.right -= p - a, e.marginTop = l, e.marginLeft = a), (k && !b ? f.contains(v) : f === v && "BODY" !== v.nodeName) && (e = ei(e, f)), e
    }

    function oi(n) {
        var f = 1 < arguments.length && void 0 !== arguments[1] && arguments[1], r = n.ownerDocument.documentElement,
            u = b(n, r), o = t(r.clientWidth, window.innerWidth || 0), s = t(r.clientHeight, window.innerHeight || 0),
            h = f ? 0 : e(r), c = f ? 0 : e(r, "left"),
            l = {top: h - u.top + u.marginTop, left: c - u.left + u.marginLeft, width: o, height: s};
        return i(l)
    }

    function ht(n) {
        var i = n.nodeName, t;
        return "BODY" === i || "HTML" === i ? !1 : "fixed" === r(n, "position") ? !0 : (t = y(n), !!t && ht(t))
    }

    function ct(n) {
        if (!n || !n.parentElement || u()) return document.documentElement;
        for (var t = n.parentElement; t && "none" === r(t, "transform");) t = t.parentElement;
        return t || document.documentElement
    }

    function k(n, t, i, r) {
        var h = 4 < arguments.length && void 0 !== arguments[4] && arguments[4], u = {top: 0, left: 0},
            c = h ? ct(n) : l(n, ft(t)), e, f, o;
        if ("viewport" === r) u = oi(c, h); else if ("scrollParent" === r ? (e = s(y(t)), "BODY" === e.nodeName && (e = n.ownerDocument.documentElement)) : e = "window" === r ? n.ownerDocument.documentElement : r, f = b(e, c, h), "HTML" !== e.nodeName || ht(c)) u = f; else {
            var a = st(n.ownerDocument), v = a.height, p = a.width;
            u.top += f.top - f.marginTop;
            u.bottom = v + f.top;
            u.left += f.left - f.marginLeft;
            u.right = p + f.left
        }
        return i = i || 0, o = "number" == typeof i, u.left += o ? i : i.left || 0, u.top += o ? i : i.top || 0, u.right -= o ? i : i.right || 0, u.bottom -= o ? i : i.bottom || 0, u
    }

    function si(n) {
        var t = n.width, i = n.height;
        return t * i
    }

    function lt(t, i, r, u, f) {
        var l = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
        if (-1 === t.indexOf("auto")) return t;
        var e = k(r, u, l, f), o = {
            top: {width: e.width, height: i.top - e.top},
            right: {width: e.right - i.right, height: e.height},
            bottom: {width: e.width, height: e.bottom - i.bottom},
            left: {width: i.left - e.left, height: e.height}
        }, s = Object.keys(o).map(function (t) {
            return n({key: t}, o[t], {area: si(o[t])})
        }).sort(function (n, t) {
            return t.area - n.area
        }), h = s.filter(function (n) {
            var t = n.width, i = n.height;
            return t >= r.clientWidth && i >= r.clientHeight
        }), a = 0 < h.length ? h[0].key : s[0].key, c = t.split("-")[1];
        return a + (c ? "-" + c : "")
    }

    function at(n, t, i) {
        var r = 3 < arguments.length && void 0 !== arguments[3] ? arguments[3] : null, u = r ? ct(t) : l(t, ft(i));
        return b(i, u, r)
    }

    function vt(n) {
        var i = n.ownerDocument.defaultView, t = i.getComputedStyle(n),
            r = parseFloat(t.marginTop || 0) + parseFloat(t.marginBottom || 0),
            u = parseFloat(t.marginLeft || 0) + parseFloat(t.marginRight || 0);
        return {width: n.offsetWidth + u, height: n.offsetHeight + r}
    }

    function a(n) {
        var t = {left: "right", right: "left", bottom: "top", top: "bottom"};
        return n.replace(/left|right|bottom|top/g, function (n) {
            return t[n]
        })
    }

    function yt(n, t, i) {
        i = i.split("-")[0];
        var r = vt(n), e = {width: r.width, height: r.height}, u = -1 !== ["right", "left"].indexOf(i),
            o = u ? "top" : "left", f = u ? "left" : "top", s = u ? "height" : "width", h = u ? "width" : "height";
        return e[o] = t[o] + t[s] / 2 - r[s] / 2, e[f] = i === f ? t[f] - r[h] : t[a(f)], e
    }

    function h(n, t) {
        return Array.prototype.find ? n.find(t) : n.filter(t)[0]
    }

    function hi(n, t, i) {
        if (Array.prototype.findIndex) return n.findIndex(function (n) {
            return n[t] === i
        });
        var r = h(n, function (n) {
            return n[t] === i
        });
        return n.indexOf(r)
    }

    function pt(n, t, r) {
        var u = void 0 === r ? n : n.slice(0, hi(n, "name", r));
        return u.forEach(function (n) {
            n["function"] && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
            var r = n["function"] || n.fn;
            n.enabled && ut(r) && (t.offsets.popper = i(t.offsets.popper), t.offsets.reference = i(t.offsets.reference), t = r(t, n))
        }), t
    }

    function ci() {
        if (!this.state.isDestroyed) {
            var n = {instance: this, styles: {}, arrowStyles: {}, attributes: {}, flipped: !1, offsets: {}};
            n.offsets.reference = at(this.state, this.popper, this.reference, this.options.positionFixed);
            n.placement = lt(this.options.placement, n.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding);
            n.originalPlacement = n.placement;
            n.positionFixed = this.options.positionFixed;
            n.offsets.popper = yt(this.popper, n.offsets.reference, n.placement);
            n.offsets.popper.position = this.options.positionFixed ? "fixed" : "absolute";
            n = pt(this.modifiers, n);
            this.state.isCreated ? this.options.onUpdate(n) : (this.state.isCreated = !0, this.options.onCreate(n))
        }
    }

    function wt(n, t) {
        return n.some(function (n) {
            var i = n.name, r = n.enabled;
            return r && i === t
        })
    }

    function d(n) {
        for (var i, r, u = [!1, "ms", "Webkit", "Moz", "O"], f = n.charAt(0).toUpperCase() + n.slice(1), t = 0; t < u.length; t++) if (i = u[t], r = i ? "" + i + f : n, "undefined" != typeof document.body.style[r]) return r;
        return null
    }

    function li() {
        return this.state.isDestroyed = !0, wt(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.position = "", this.popper.style.top = "", this.popper.style.left = "", this.popper.style.right = "", this.popper.style.bottom = "", this.popper.style.willChange = "", this.popper.style[d("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
    }

    function bt(n) {
        var t = n.ownerDocument;
        return t ? t.defaultView : window
    }

    function kt(n, t, i, r) {
        var f = "BODY" === n.nodeName, u = f ? n.ownerDocument.defaultView : n;
        u.addEventListener(t, i, {passive: !0});
        f || kt(s(u.parentNode), t, i, r);
        r.push(u)
    }

    function ai(n, t, i, r) {
        i.updateBound = r;
        bt(n).addEventListener("resize", i.updateBound, {passive: !0});
        var u = s(n);
        return kt(u, "scroll", i.updateBound, i.scrollParents), i.scrollElement = u, i.eventsEnabled = !0, i
    }

    function vi() {
        this.state.eventsEnabled || (this.state = ai(this.reference, this.options, this.state, this.scheduleUpdate))
    }

    function yi(n, t) {
        return bt(n).removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function (n) {
            n.removeEventListener("scroll", t.updateBound)
        }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t
    }

    function pi() {
        this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = yi(this.reference, this.state))
    }

    function g(n) {
        return "" !== n && !isNaN(parseFloat(n)) && isFinite(n)
    }

    function nt(n, t) {
        Object.keys(t).forEach(function (i) {
            var r = "";
            -1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(i) && g(t[i]) && (r = "px");
            n.style[i] = t[i] + r
        })
    }

    function wi(n, t) {
        Object.keys(t).forEach(function (i) {
            var r = t[i];
            !1 === r ? n.removeAttribute(i) : n.setAttribute(i, t[i])
        })
    }

    function bi(n, t) {
        var u = n.offsets, i = u.popper, l = u.reference, r = ti, f = function (n) {
                return n
            }, e = r(l.width), o = r(i.width), a = -1 !== ["left", "right"].indexOf(n.placement),
            s = -1 !== n.placement.indexOf("-"), h = t ? a || s || e % 2 == o % 2 ? r : tt : f, c = t ? r : f;
        return {
            left: h(1 == e % 2 && 1 == o % 2 && !s && t ? i.left - 1 : i.left),
            top: c(i.top),
            bottom: c(i.bottom),
            right: h(i.right)
        }
    }

    function dt(n, t, i) {
        var u = h(n, function (n) {
            var i = n.name;
            return i === t
        }), f = !!u && n.some(function (n) {
            return n.name === i && n.enabled && n.order < u.order
        }), r;
        return f || (r = "`" + t + "`", console.warn("`" + i + "` modifier is required by " + r + " modifier in order to work, be sure to include it before " + r + "!")), f
    }

    function ki(n) {
        return "end" === n ? "start" : "start" === n ? "end" : n
    }

    function gt(n) {
        var r = 1 < arguments.length && void 0 !== arguments[1] && arguments[1], t = it.indexOf(n),
            i = it.slice(t + 1).concat(it.slice(0, t));
        return r ? i.reverse() : i
    }

    function di(n, r, u, f) {
        var h = n.match(/((?:\-|\+)?\d*\.?\d*)(.*)/), o = +h[1], e = h[2], s, c, l;
        if (!o) return n;
        if (0 === e.indexOf("%")) {
            switch (e) {
                case"%p":
                    s = u;
                    break;
                case"%":
                case"%r":
                default:
                    s = f
            }
            return c = i(s), c[r] / 100 * o
        }
        return "vh" === e || "vw" === e ? (l = "vh" === e ? t(document.documentElement.clientHeight, window.innerHeight || 0) : t(document.documentElement.clientWidth, window.innerWidth || 0), l / 100 * o) : o
    }

    function gi(n, t, i, r) {
        var s = [0, 0], c = -1 !== ["right", "left"].indexOf(r), u = n.split(/(\+|\-)/).map(function (n) {
            return n.trim()
        }), f = u.indexOf(h(u, function (n) {
            return -1 !== n.search(/,|\s/)
        })), o, e;
        return u[f] && -1 === u[f].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead."), o = /\s*,\s*|\s+/, e = -1 === f ? [u] : [u.slice(0, f).concat([u[f].split(o)[0]]), [u[f].split(o)[1]].concat(u.slice(f + 1))], e = e.map(function (n, r) {
            var f = (1 === r ? !c : c) ? "height" : "width", u = !1;
            return n.reduce(function (n, t) {
                return "" === n[n.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (n[n.length - 1] = t, u = !0, n) : u ? (n[n.length - 1] += t, u = !1, n) : n.concat(t)
            }, []).map(function (n) {
                return di(n, f, t, i)
            })
        }), e.forEach(function (n, t) {
            n.forEach(function (i, r) {
                g(i) && (s[t] += i * ("-" === n[r - 1] ? -1 : 1))
            })
        }), s
    }

    function nr(n, t) {
        var r, f = t.offset, o = n.placement, e = n.offsets, i = e.popper, s = e.reference, u = o.split("-")[0];
        return r = g(+f) ? [+f, 0] : gi(f, i, s, u), "left" === u ? (i.top += r[0], i.left -= r[1]) : "right" === u ? (i.top += r[0], i.left += r[1]) : "top" === u ? (i.left += r[0], i.top -= r[1]) : "bottom" === u && (i.left += r[0], i.top += r[1]), n.popper = i, n
    }

    var ni = Math.min, tt = Math.floor, ti = Math.round, t = Math.max,
        c = "undefined" != typeof window && "undefined" != typeof document && "undefined" != typeof navigator,
        tr = function () {
            for (var t = ["Edge", "Trident", "Firefox"], n = 0; n < t.length; n += 1) if (c && 0 <= navigator.userAgent.indexOf(t[n])) return 1;
            return 0
        }(), ir = c && window.Promise, rr = ir ? function (n) {
            var t = !1;
            return function () {
                t || (t = !0, window.Promise.resolve().then(function () {
                    t = !1;
                    n()
                }))
            }
        } : function (n) {
            var t = !1;
            return function () {
                t || (t = !0, setTimeout(function () {
                    t = !1;
                    n()
                }, tr))
            }
        }, ii = c && !!(window.MSInputMethodContext && document.documentMode),
        ri = c && /MSIE 10/.test(navigator.userAgent), ur = function (n, t) {
            if (!(n instanceof t)) throw new TypeError("Cannot call a class as a function");
        }, fr = function () {
            function n(n, t) {
                for (var i, r = 0; r < t.length; r++) i = t[r], i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, i.key, i)
            }

            return function (t, i, r) {
                return i && n(t.prototype, i), r && n(t, r), t
            }
        }(), o = function (n, t, i) {
            return t in n ? Object.defineProperty(n, t, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : n[t] = i, n
        }, n = Object.assign || function (n) {
            for (var t, r, i = 1; i < arguments.length; i++) for (r in t = arguments[i], t) Object.prototype.hasOwnProperty.call(t, r) && (n[r] = t[r]);
            return n
        }, er = c && /Firefox/i.test(navigator.userAgent),
        ui = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
        it = ui.slice(3), rt = {FLIP: "flip", CLOCKWISE: "clockwise", COUNTERCLOCKWISE: "counterclockwise"},
        v = function () {
            function t(i, r) {
                var u = this, f = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {}, e;
                ur(this, t);
                this.scheduleUpdate = function () {
                    return requestAnimationFrame(u.update)
                };
                this.update = rr(this.update.bind(this));
                this.options = n({}, t.Defaults, f);
                this.state = {isDestroyed: !1, isCreated: !1, scrollParents: []};
                this.reference = i && i.jquery ? i[0] : i;
                this.popper = r && r.jquery ? r[0] : r;
                this.options.modifiers = {};
                Object.keys(n({}, t.Defaults.modifiers, f.modifiers)).forEach(function (i) {
                    u.options.modifiers[i] = n({}, t.Defaults.modifiers[i] || {}, f.modifiers ? f.modifiers[i] : {})
                });
                this.modifiers = Object.keys(this.options.modifiers).map(function (t) {
                    return n({name: t}, u.options.modifiers[t])
                }).sort(function (n, t) {
                    return n.order - t.order
                });
                this.modifiers.forEach(function (n) {
                    n.enabled && ut(n.onLoad) && n.onLoad(u.reference, u.popper, u.options, n, u.state)
                });
                this.update();
                e = this.options.eventsEnabled;
                e && this.enableEventListeners();
                this.state.eventsEnabled = e
            }

            return fr(t, [{
                key: "update", value: function () {
                    return ci.call(this)
                }
            }, {
                key: "destroy", value: function () {
                    return li.call(this)
                }
            }, {
                key: "enableEventListeners", value: function () {
                    return vi.call(this)
                }
            }, {
                key: "disableEventListeners", value: function () {
                    return pi.call(this)
                }
            }]), t
        }();
    return v.Utils = ("undefined" == typeof window ? global : window).PopperUtils, v.placements = ui, v.Defaults = {
        placement: "bottom", positionFixed: !1, eventsEnabled: !0, removeOnDestroy: !1, onCreate: function () {
        }, onUpdate: function () {
        }, modifiers: {
            shift: {
                order: 100, enabled: !0, fn: function (t) {
                    var u = t.placement, l = u.split("-")[0], f = u.split("-")[1];
                    if (f) {
                        var e = t.offsets, r = e.reference, s = e.popper, h = -1 !== ["bottom", "top"].indexOf(l),
                            i = h ? "left" : "top", c = h ? "width" : "height",
                            a = {start: o({}, i, r[i]), end: o({}, i, r[i] + r[c] - s[c])};
                        t.offsets.popper = n({}, s, a[f])
                    }
                    return t
                }
            },
            offset: {order: 200, enabled: !0, fn: nr, offset: 0},
            preventOverflow: {
                order: 300, enabled: !0, fn: function (i, r) {
                    var h = r.boundariesElement || f(i.instance.popper), s;
                    i.instance.reference === h && (h = f(h));
                    var c = d("transform"), e = i.instance.popper.style, l = e.top, a = e.left, v = e[c];
                    e.top = "";
                    e.left = "";
                    e[c] = "";
                    s = k(i.instance.popper, i.instance.reference, r.padding, h, i.positionFixed);
                    e.top = l;
                    e.left = a;
                    e[c] = v;
                    r.boundaries = s;
                    var y = r.priority, u = i.offsets.popper, p = {
                        primary: function (n) {
                            var i = u[n];
                            return u[n] < s[n] && !r.escapeWithReference && (i = t(u[n], s[n])), o({}, n, i)
                        }, secondary: function (n) {
                            var t = "right" === n ? "left" : "top", i = u[t];
                            return u[n] > s[n] && !r.escapeWithReference && (i = ni(u[t], s[n] - ("right" === n ? u.width : u.height))), o({}, t, i)
                        }
                    };
                    return y.forEach(function (t) {
                        var i = -1 === ["left", "top"].indexOf(t) ? "secondary" : "primary";
                        u = n({}, u, p[i](t))
                    }), i.offsets.popper = u, i
                }, priority: ["left", "right", "top", "bottom"], padding: 5, boundariesElement: "scrollParent"
            },
            keepTogether: {
                order: 400, enabled: !0, fn: function (n) {
                    var o = n.offsets, u = o.popper, i = o.reference, s = n.placement.split("-")[0], r = tt,
                        f = -1 !== ["top", "bottom"].indexOf(s), e = f ? "right" : "bottom", t = f ? "left" : "top",
                        h = f ? "width" : "height";
                    return u[e] < r(i[t]) && (n.offsets.popper[t] = r(i[t]) - u[h]), u[t] > r(i[e]) && (n.offsets.popper[t] = r(i[e])), n
                }
            },
            arrow: {
                order: 500, enabled: !0, fn: function (n, u) {
                    var l, e;
                    if (!dt(n.instance.modifiers, "arrow", "keepTogether")) return n;
                    if (e = u.element, "string" == typeof e) {
                        if (e = n.instance.popper.querySelector(e), !e) return n
                    } else if (!n.instance.popper.contains(e)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), n;
                    var d = n.placement.split("-")[0], b = n.offsets, c = b.popper, s = b.reference,
                        a = -1 !== ["left", "right"].indexOf(d), y = a ? "height" : "width", p = a ? "Top" : "Left",
                        f = p.toLowerCase(), g = a ? "left" : "top", v = a ? "bottom" : "right", h = vt(e)[y];
                    s[v] - h < c[f] && (n.offsets.popper[f] -= c[f] - (s[v] - h));
                    s[f] + h > c[v] && (n.offsets.popper[f] += s[f] + h - c[v]);
                    n.offsets.popper = i(n.offsets.popper);
                    var nt = s[f] + s[y] / 2 - h / 2, k = r(n.instance.popper), tt = parseFloat(k["margin" + p], 10),
                        it = parseFloat(k["border" + p + "Width"], 10), w = nt - n.offsets.popper[f] - tt - it;
                    return w = t(ni(c[y] - h, w), 0), n.arrowElement = e, n.offsets.arrow = (l = {}, o(l, f, ti(w)), o(l, g, ""), l), n
                }, element: "[x-arrow]"
            },
            flip: {
                order: 600,
                enabled: !0,
                fn: function (t, i) {
                    if (wt(t.instance.modifiers, "inner") || t.flipped && t.placement === t.originalPlacement) return t;
                    var e = k(t.instance.popper, t.instance.reference, i.padding, i.boundariesElement, t.positionFixed),
                        r = t.placement.split("-")[0], o = a(r), u = t.placement.split("-")[1] || "", f = [];
                    switch (i.behavior) {
                        case rt.FLIP:
                            f = [r, o];
                            break;
                        case rt.CLOCKWISE:
                            f = gt(r);
                            break;
                        case rt.COUNTERCLOCKWISE:
                            f = gt(r, !0);
                            break;
                        default:
                            f = i.behavior
                    }
                    return f.forEach(function (s, h) {
                        if (r !== s || f.length === h + 1) return t;
                        r = t.placement.split("-")[0];
                        o = a(r);
                        var l = t.offsets.popper, y = t.offsets.reference, c = tt,
                            d = "left" === r && c(l.right) > c(y.left) || "right" === r && c(l.left) < c(y.right) || "top" === r && c(l.bottom) > c(y.top) || "bottom" === r && c(l.top) < c(y.bottom),
                            p = c(l.left) < c(e.left), w = c(l.right) > c(e.right), b = c(l.top) < c(e.top),
                            k = c(l.bottom) > c(e.bottom),
                            g = "left" === r && p || "right" === r && w || "top" === r && b || "bottom" === r && k,
                            v = -1 !== ["top", "bottom"].indexOf(r),
                            it = !!i.flipVariations && (v && "start" === u && p || v && "end" === u && w || !v && "start" === u && b || !v && "end" === u && k),
                            rt = !!i.flipVariationsByContent && (v && "start" === u && w || v && "end" === u && p || !v && "start" === u && k || !v && "end" === u && b),
                            nt = it || rt;
                        (d || g || nt) && (t.flipped = !0, (d || g) && (r = f[h + 1]), nt && (u = ki(u)), t.placement = r + (u ? "-" + u : ""), t.offsets.popper = n({}, t.offsets.popper, yt(t.instance.popper, t.offsets.reference, t.placement)), t = pt(t.instance.modifiers, t, "flip"))
                    }), t
                },
                behavior: "flip",
                padding: 5,
                boundariesElement: "viewport",
                flipVariations: !1,
                flipVariationsByContent: !1
            },
            inner: {
                order: 700, enabled: !1, fn: function (n) {
                    var u = n.placement, t = u.split("-")[0], f = n.offsets, r = f.popper, o = f.reference,
                        e = -1 !== ["left", "right"].indexOf(t), s = -1 === ["top", "left"].indexOf(t);
                    return r[e ? "left" : "top"] = o[t] - (s ? r[e ? "width" : "height"] : 0), n.placement = a(u), n.offsets.popper = i(r), n
                }
            },
            hide: {
                order: 800, enabled: !0, fn: function (n) {
                    if (!dt(n.instance.modifiers, "hide", "preventOverflow")) return n;
                    var t = n.offsets.reference, i = h(n.instance.modifiers, function (n) {
                        return "preventOverflow" === n.name
                    }).boundaries;
                    if (t.bottom < i.top || t.left > i.right || t.top > i.bottom || t.right < i.left) {
                        if (!0 === n.hide) return n;
                        n.hide = !0;
                        n.attributes["x-out-of-boundaries"] = ""
                    } else {
                        if (!1 === n.hide) return n;
                        n.hide = !1;
                        n.attributes["x-out-of-boundaries"] = !1
                    }
                    return n
                }
            },
            computeStyle: {
                order: 850, enabled: !0, fn: function (t, i) {
                    var g = i.x, nt = i.y, tt = t.offsets.popper, c = h(t.instance.modifiers, function (n) {
                        return "applyStyle" === n.name
                    }).gpuAcceleration, p, b, k;
                    void 0 !== c && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
                    var l, a, it = void 0 === c ? i.gpuAcceleration : c, e = f(t.instance.popper), v = w(e),
                        r = {position: tt.position}, u = bi(t, 2 > window.devicePixelRatio || !er),
                        o = "bottom" === g ? "top" : "bottom", s = "right" === nt ? "left" : "right",
                        y = d("transform");
                    return (a = "bottom" == o ? "HTML" === e.nodeName ? -e.clientHeight + u.bottom : -v.height + u.bottom : u.top, l = "right" == s ? "HTML" === e.nodeName ? -e.clientWidth + u.right : -v.width + u.right : u.left, it && y) ? (r[y] = "translate3d(" + l + "px, " + a + "px, 0)", r[o] = 0, r[s] = 0, r.willChange = "transform") : (p = "bottom" == o ? -1 : 1, b = "right" == s ? -1 : 1, r[o] = a * p, r[s] = l * b, r.willChange = o + ", " + s), k = {"x-placement": t.placement}, t.attributes = n({}, k, t.attributes), t.styles = n({}, r, t.styles), t.arrowStyles = n({}, t.offsets.arrow, t.arrowStyles), t
                }, gpuAcceleration: !0, x: "bottom", y: "right"
            },
            applyStyle: {
                order: 900, enabled: !0, fn: function (n) {
                    return nt(n.instance.popper, n.styles), wi(n.instance.popper, n.attributes), n.arrowElement && Object.keys(n.arrowStyles).length && nt(n.arrowElement, n.arrowStyles), n
                }, onLoad: function (n, t, i, r, u) {
                    var f = at(u, t, n, i.positionFixed),
                        e = lt(i.placement, f, t, n, i.modifiers.flip.boundariesElement, i.modifiers.flip.padding);
                    return t.setAttribute("x-placement", e), nt(t, {position: i.positionFixed ? "fixed" : "absolute"}), i
                }, gpuAcceleration: void 0
            }
        }
    }, v
});
!function (n, t) {
    "object" == typeof exports && "undefined" != typeof module ? t(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], t) : t((n = n || self).bootstrap = {}, n.jQuery, n.Popper)
}(this, function (n, t, i) {
    "use strict";

    function uu(n, t) {
        for (var i, r = 0; r < t.length; r++) i = t[r], i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, i.key, i)
    }

    function l(n, t, i) {
        return t && uu(n.prototype, t), i && uu(n, i), n
    }

    function f(n) {
        for (var i, r, t = 1; t < arguments.length; t++) i = null != arguments[t] ? arguments[t] : {}, r = Object.keys(i), "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(i).filter(function (n) {
            return Object.getOwnPropertyDescriptor(i, n).enumerable
        }))), r.forEach(function (t) {
            var r, u, f;
            r = n;
            f = i[u = t];
            u in r ? Object.defineProperty(r, u, {value: f, enumerable: !0, configurable: !0, writable: !0}) : r[u] = f
        });
        return n
    }

    function cf(n) {
        var u = this, i = !1;
        return t(this).one(r.TRANSITION_END, function () {
            i = !0
        }), setTimeout(function () {
            i || r.triggerTransitionEnd(u)
        }, n), this
    }

    function wu(n, t, i) {
        if (0 === n.length) return n;
        if (i && "function" == typeof i) return i(n);
        for (var u = (new window.DOMParser).parseFromString(n, "text/html"), e = Object.keys(t), f = [].slice.call(u.body.querySelectorAll("*")), o = function (n) {
            var i = f[n], o = i.nodeName.toLowerCase(), r, u;
            if (-1 === e.indexOf(i.nodeName.toLowerCase())) return i.parentNode.removeChild(i), "continue";
            r = [].slice.call(i.attributes);
            u = [].concat(t["*"] || [], t[o] || []);
            r.forEach(function (n) {
                (function (n, t) {
                    var i = n.nodeName.toLowerCase();
                    if (-1 !== t.indexOf(i)) return -1 === us.indexOf(i) || Boolean(n.nodeValue.match(fs) || n.nodeValue.match(es));
                    for (var u = t.filter(function (n) {
                        return n instanceof RegExp
                    }), r = 0, f = u.length; r < f; r++) if (i.match(u[r])) return !0;
                    return !1
                })(n, u) || i.removeAttribute(n.nodeName)
            })
        }, r = 0, s = f.length; r < s; r++) o(r);
        return u.body.innerHTML
    }

    var at, r;
    t = t && t.hasOwnProperty("default") ? t.default : t;
    i = i && i.hasOwnProperty("default") ? i.default : i;
    at = "transitionend";
    r = {
        TRANSITION_END: "bsTransitionEnd", getUID: function (n) {
            for (; n += ~~(1e6 * Math.random()), document.getElementById(n);) ;
            return n
        }, getSelectorFromElement: function (n) {
            var t = n.getAttribute("data-target"), i;
            t && "#" !== t || (i = n.getAttribute("href"), t = i && "#" !== i ? i.trim() : "");
            try {
                return document.querySelector(t) ? t : null
            } catch (n) {
                return null
            }
        }, getTransitionDurationFromElement: function (n) {
            if (!n) return 0;
            var i = t(n).css("transition-duration"), r = t(n).css("transition-delay"), u = parseFloat(i),
                f = parseFloat(r);
            return u || f ? (i = i.split(",")[0], r = r.split(",")[0], 1e3 * (parseFloat(i) + parseFloat(r))) : 0
        }, reflow: function (n) {
            return n.offsetHeight
        }, triggerTransitionEnd: function (n) {
            t(n).trigger(at)
        }, supportsTransitionEnd: function () {
            return Boolean(at)
        }, isElement: function (n) {
            return (n[0] || n).nodeType
        }, typeCheckConfig: function (n, t, i) {
            var u, s;
            for (u in i) if (Object.prototype.hasOwnProperty.call(i, u)) {
                var e = i[u], f = t[u],
                    o = f && r.isElement(f) ? "element" : (s = f, {}.toString.call(s).match(/\s([a-z]+)/i)[1].toLowerCase());
                if (!new RegExp(e).test(o)) throw new Error(n.toUpperCase() + ': Option "' + u + '" provided type "' + o + '" but expected type "' + e + '".');
            }
        }, findShadowRoot: function (n) {
            if (!document.documentElement.attachShadow) return null;
            if ("function" != typeof n.getRootNode) return n instanceof ShadowRoot ? n : n.parentNode ? r.findShadowRoot(n.parentNode) : null;
            var t = n.getRootNode();
            return t instanceof ShadowRoot ? t : null
        }
    };
    t.fn.emulateTransitionEnd = cf;
    t.event.special[r.TRANSITION_END] = {
        bindType: at, delegateType: at, handle: function (n) {
            if (t(n.target).is(this)) return n.handleObj.handler.apply(this, arguments)
        }
    };
    var vt = "alert", pi = "bs.alert", cr = "." + pi, lf = t.fn[vt],
        lr = {CLOSE: "close" + cr, CLOSED: "closed" + cr, CLICK_DATA_API: "click" + cr + ".data-api"}, af = "alert",
        vf = "fade", yf = "show", it = function () {
            function n(n) {
                this._element = n
            }

            var i = n.prototype;
            return i.close = function (n) {
                var t = this._element;
                n && (t = this._getRootElement(n));
                this._triggerCloseEvent(t).isDefaultPrevented() || this._removeElement(t)
            }, i.dispose = function () {
                t.removeData(this._element, pi);
                this._element = null
            }, i._getRootElement = function (n) {
                var u = r.getSelectorFromElement(n), i = !1;
                return u && (i = document.querySelector(u)), i || (i = t(n).closest("." + af)[0]), i
            }, i._triggerCloseEvent = function (n) {
                var i = t.Event(lr.CLOSE);
                return t(n).trigger(i), i
            }, i._removeElement = function (n) {
                var u = this, i;
                (t(n).removeClass(yf), t(n).hasClass(vf)) ? (i = r.getTransitionDurationFromElement(n), t(n).one(r.TRANSITION_END, function (t) {
                    return u._destroyElement(n, t)
                }).emulateTransitionEnd(i)) : this._destroyElement(n)
            }, i._destroyElement = function (n) {
                t(n).detach().trigger(lr.CLOSED).remove()
            }, n._jQueryInterface = function (i) {
                return this.each(function () {
                    var u = t(this), r = u.data(pi);
                    r || (r = new n(this), u.data(pi, r));
                    "close" === i && r[i](this)
                })
            }, n._handleDismiss = function (n) {
                return function (t) {
                    t && t.preventDefault();
                    n.close(this)
                }
            }, l(n, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }]), n
        }();
    t(document).on(lr.CLICK_DATA_API, '[data-dismiss="alert"]', it._handleDismiss(new it));
    t.fn[vt] = it._jQueryInterface;
    t.fn[vt].Constructor = it;
    t.fn[vt].noConflict = function () {
        return t.fn[vt] = lf, it._jQueryInterface
    };
    var yt = "button", wi = "bs.button", ar = "." + wi, vr = ".data-api", pf = t.fn[yt], pt = "active", wf = "btn",
        bf = "focus", fu = '[data-toggle^="button"]', kf = '[data-toggle="buttons"]', df = 'input:not([type="hidden"])',
        gf = ".active", eu = ".btn",
        ou = {CLICK_DATA_API: "click" + ar + vr, FOCUS_BLUR_DATA_API: "focus" + ar + vr + " blur" + ar + vr},
        wt = function () {
            function n(n) {
                this._element = n
            }

            var i = n.prototype;
            return i.toggle = function () {
                var r = !0, f = !0, i = t(this._element).closest(kf)[0], n, u;
                if (i && (n = this._element.querySelector(df), n)) {
                    if ("radio" === n.type && (n.checked && this._element.classList.contains(pt) ? r = !1 : (u = i.querySelector(gf), u && t(u).removeClass(pt))), r) {
                        if (n.hasAttribute("disabled") || i.hasAttribute("disabled") || n.classList.contains("disabled") || i.classList.contains("disabled")) return;
                        n.checked = !this._element.classList.contains(pt);
                        t(n).trigger("change")
                    }
                    n.focus();
                    f = !1
                }
                f && this._element.setAttribute("aria-pressed", !this._element.classList.contains(pt));
                r && t(this._element).toggleClass(pt)
            }, i.dispose = function () {
                t.removeData(this._element, wi);
                this._element = null
            }, n._jQueryInterface = function (i) {
                return this.each(function () {
                    var r = t(this).data(wi);
                    r || (r = new n(this), t(this).data(wi, r));
                    "toggle" === i && r[i]()
                })
            }, l(n, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }]), n
        }();
    t(document).on(ou.CLICK_DATA_API, fu, function (n) {
        n.preventDefault();
        var i = n.target;
        t(i).hasClass(wf) || (i = t(i).closest(eu));
        wt._jQueryInterface.call(t(i), "toggle")
    }).on(ou.FOCUS_BLUR_DATA_API, fu, function (n) {
        var i = t(n.target).closest(eu)[0];
        t(i).toggleClass(bf, /^focus(in)?$/.test(n.type))
    });
    t.fn[yt] = wt._jQueryInterface;
    t.fn[yt].Constructor = wt;
    t.fn[yt].noConflict = function () {
        return t.fn[yt] = pf, wt._jQueryInterface
    };
    var rt = "carousel", bt = "bs.carousel", o = "." + bt, su = ".data-api", ne = t.fn[rt],
        yr = {interval: 5e3, keyboard: !0, slide: !1, pause: "hover", wrap: !0, touch: !0}, te = {
            interval: "(number|boolean)",
            keyboard: "boolean",
            slide: "(boolean|string)",
            pause: "(string|boolean)",
            wrap: "boolean",
            touch: "boolean"
        }, bi = "next", ki = "prev", ie = "left", re = "right", s = {
            SLIDE: "slide" + o,
            SLID: "slid" + o,
            KEYDOWN: "keydown" + o,
            MOUSEENTER: "mouseenter" + o,
            MOUSELEAVE: "mouseleave" + o,
            TOUCHSTART: "touchstart" + o,
            TOUCHMOVE: "touchmove" + o,
            TOUCHEND: "touchend" + o,
            POINTERDOWN: "pointerdown" + o,
            POINTERUP: "pointerup" + o,
            DRAG_START: "dragstart" + o,
            LOAD_DATA_API: "load" + o + su,
            CLICK_DATA_API: "click" + o + su
        }, ue = "carousel", w = "active", fe = "slide", ee = "carousel-item-right", oe = "carousel-item-left",
        se = "carousel-item-next", he = "carousel-item-prev", ce = "pointer-event", le = ".active",
        pr = ".active.carousel-item", ae = ".carousel-item", ve = ".carousel-item img",
        ye = ".carousel-item-next, .carousel-item-prev", pe = ".carousel-indicators", we = '[data-ride="carousel"]',
        hu = {TOUCH: "touch", PEN: "pen"}, ut = function () {
            function i(n, t) {
                this._items = null;
                this._interval = null;
                this._activeElement = null;
                this._isPaused = !1;
                this._isSliding = !1;
                this.touchTimeout = null;
                this.touchStartX = 0;
                this.touchDeltaX = 0;
                this._config = this._getConfig(t);
                this._element = n;
                this._indicatorsElement = this._element.querySelector(pe);
                this._touchSupported = "ontouchstart" in document.documentElement || 0 < navigator.maxTouchPoints;
                this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent);
                this._addEventListeners()
            }

            var n = i.prototype;
            return n.next = function () {
                this._isSliding || this._slide(bi)
            }, n.nextWhenVisible = function () {
                !document.hidden && t(this._element).is(":visible") && "hidden" !== t(this._element).css("visibility") && this.next()
            }, n.prev = function () {
                this._isSliding || this._slide(ki)
            }, n.pause = function (n) {
                n || (this._isPaused = !0);
                this._element.querySelector(ye) && (r.triggerTransitionEnd(this._element), this.cycle(!0));
                clearInterval(this._interval);
                this._interval = null
            }, n.cycle = function (n) {
                n || (this._isPaused = !1);
                this._interval && (clearInterval(this._interval), this._interval = null);
                this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
            }, n.to = function (n) {
                var u = this, i, r;
                if (this._activeElement = this._element.querySelector(pr), i = this._getItemIndex(this._activeElement), !(n > this._items.length - 1 || n < 0)) if (this._isSliding) t(this._element).one(s.SLID, function () {
                    return u.to(n)
                }); else {
                    if (i === n) return this.pause(), void this.cycle();
                    r = i < n ? bi : ki;
                    this._slide(r, this._items[n])
                }
            }, n.dispose = function () {
                t(this._element).off(o);
                t.removeData(this._element, bt);
                this._items = null;
                this._config = null;
                this._element = null;
                this._interval = null;
                this._isPaused = null;
                this._isSliding = null;
                this._activeElement = null;
                this._indicatorsElement = null
            }, n._getConfig = function (n) {
                return n = f({}, yr, n), r.typeCheckConfig(rt, n, te), n
            }, n._handleSwipe = function () {
                var t = Math.abs(this.touchDeltaX), n;
                t <= 40 || (n = t / this.touchDeltaX, 0 < n && this.prev(), n < 0 && this.next())
            }, n._addEventListeners = function () {
                var n = this;
                this._config.keyboard && t(this._element).on(s.KEYDOWN, function (t) {
                    return n._keydown(t)
                });
                "hover" === this._config.pause && t(this._element).on(s.MOUSEENTER, function (t) {
                    return n.pause(t)
                }).on(s.MOUSELEAVE, function (t) {
                    return n.cycle(t)
                });
                this._config.touch && this._addTouchEventListeners()
            }, n._addTouchEventListeners = function () {
                var n = this, i, r;
                this._touchSupported && (i = function (t) {
                    n._pointerEvent && hu[t.originalEvent.pointerType.toUpperCase()] ? n.touchStartX = t.originalEvent.clientX : n._pointerEvent || (n.touchStartX = t.originalEvent.touches[0].clientX)
                }, r = function (t) {
                    n._pointerEvent && hu[t.originalEvent.pointerType.toUpperCase()] && (n.touchDeltaX = t.originalEvent.clientX - n.touchStartX);
                    n._handleSwipe();
                    "hover" === n._config.pause && (n.pause(), n.touchTimeout && clearTimeout(n.touchTimeout), n.touchTimeout = setTimeout(function (t) {
                        return n.cycle(t)
                    }, 500 + n._config.interval))
                }, t(this._element.querySelectorAll(ve)).on(s.DRAG_START, function (n) {
                    return n.preventDefault()
                }), this._pointerEvent ? (t(this._element).on(s.POINTERDOWN, function (n) {
                    return i(n)
                }), t(this._element).on(s.POINTERUP, function (n) {
                    return r(n)
                }), this._element.classList.add(ce)) : (t(this._element).on(s.TOUCHSTART, function (n) {
                    return i(n)
                }), t(this._element).on(s.TOUCHMOVE, function (t) {
                    var i;
                    n.touchDeltaX = (i = t).originalEvent.touches && 1 < i.originalEvent.touches.length ? 0 : i.originalEvent.touches[0].clientX - n.touchStartX
                }), t(this._element).on(s.TOUCHEND, function (n) {
                    return r(n)
                })))
            }, n._keydown = function (n) {
                if (!/input|textarea/i.test(n.target.tagName)) switch (n.which) {
                    case 37:
                        n.preventDefault();
                        this.prev();
                        break;
                    case 39:
                        n.preventDefault();
                        this.next()
                }
            }, n._getItemIndex = function (n) {
                return this._items = n && n.parentNode ? [].slice.call(n.parentNode.querySelectorAll(ae)) : [], this._items.indexOf(n)
            }, n._getItemByDirection = function (n, t) {
                var u = n === bi, f = n === ki, i = this._getItemIndex(t), e = this._items.length - 1, r;
                return (f && 0 === i || u && i === e) && !this._config.wrap ? t : (r = (i + (n === ki ? -1 : 1)) % this._items.length, -1 === r ? this._items[this._items.length - 1] : this._items[r])
            }, n._triggerSlideEvent = function (n, i) {
                var u = this._getItemIndex(n), f = this._getItemIndex(this._element.querySelector(pr)),
                    r = t.Event(s.SLIDE, {relatedTarget: n, direction: i, from: f, to: u});
                return t(this._element).trigger(r), r
            }, n._setActiveIndicatorElement = function (n) {
                var r, i;
                this._indicatorsElement && (r = [].slice.call(this._indicatorsElement.querySelectorAll(le)), t(r).removeClass(w), i = this._indicatorsElement.children[this._getItemIndex(n)], i && t(i).addClass(w))
            }, n._slide = function (n, i) {
                var e, o, h, a = this, f = this._element.querySelector(pr), p = this._getItemIndex(f),
                    u = i || f && this._getItemByDirection(n, f), b = this._getItemIndex(u), v = Boolean(this._interval), c,
                    l, y;
                (h = n === bi ? (e = oe, o = se, ie) : (e = ee, o = he, re), u && t(u).hasClass(w)) ? this._isSliding = !1 : !this._triggerSlideEvent(u, h).isDefaultPrevented() && f && u && (this._isSliding = !0, v && this.pause(), this._setActiveIndicatorElement(u), c = t.Event(s.SLID, {
                    relatedTarget: u,
                    direction: h,
                    from: p,
                    to: b
                }), t(this._element).hasClass(fe) ? (t(u).addClass(o), r.reflow(u), t(f).addClass(e), t(u).addClass(e), l = parseInt(u.getAttribute("data-interval"), 10), this._config.interval = l ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, l) : this._config.defaultInterval || this._config.interval, y = r.getTransitionDurationFromElement(f), t(f).one(r.TRANSITION_END, function () {
                    t(u).removeClass(e + " " + o).addClass(w);
                    t(f).removeClass(w + " " + o + " " + e);
                    a._isSliding = !1;
                    setTimeout(function () {
                        return t(a._element).trigger(c)
                    }, 0)
                }).emulateTransitionEnd(y)) : (t(f).removeClass(w), t(u).addClass(w), this._isSliding = !1, t(this._element).trigger(c)), v && this.cycle())
            }, i._jQueryInterface = function (n) {
                return this.each(function () {
                    var r = t(this).data(bt), u = f({}, yr, t(this).data()), e;
                    if ("object" == typeof n && (u = f({}, u, n)), e = "string" == typeof n ? n : u.slide, r || (r = new i(this, u), t(this).data(bt, r)), "number" == typeof n) r.to(n); else if ("string" == typeof e) {
                        if ("undefined" == typeof r[e]) throw new TypeError('No method named "' + e + '"');
                        r[e]()
                    } else u.interval && u.ride && (r.pause(), r.cycle())
                })
            }, i._dataApiClickHandler = function (n) {
                var s = r.getSelectorFromElement(this), u, o, e;
                s && (u = t(s)[0], u && t(u).hasClass(ue) && (o = f({}, t(u).data(), t(this).data()), e = this.getAttribute("data-slide-to"), e && (o.interval = !1), i._jQueryInterface.call(t(u), o), e && t(u).data(bt).to(e), n.preventDefault()))
            }, l(i, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return yr
                }
            }]), i
        }();
    t(document).on(s.CLICK_DATA_API, "[data-slide], [data-slide-to]", ut._dataApiClickHandler);
    t(window).on(s.LOAD_DATA_API, function () {
        for (var i, r = [].slice.call(document.querySelectorAll(we)), n = 0, u = r.length; n < u; n++) i = t(r[n]), ut._jQueryInterface.call(i, i.data())
    });
    t.fn[rt] = ut._jQueryInterface;
    t.fn[rt].Constructor = ut;
    t.fn[rt].noConflict = function () {
        return t.fn[rt] = ne, ut._jQueryInterface
    };
    var ft = "collapse", b = "bs.collapse", kt = "." + b, be = t.fn[ft], wr = {toggle: !0, parent: ""},
        ke = {toggle: "boolean", parent: "(string|element)"}, dt = {
            SHOW: "show" + kt,
            SHOWN: "shown" + kt,
            HIDE: "hide" + kt,
            HIDDEN: "hidden" + kt,
            CLICK_DATA_API: "click" + kt + ".data-api"
        }, k = "show", gt = "collapse", di = "collapsing", br = "collapsed", cu = "width", de = "height",
        ge = ".show, .collapsing", lu = '[data-toggle="collapse"]', ni = function () {
            function i(n, t) {
                this._isTransitioning = !1;
                this._element = n;
                this._config = this._getConfig(t);
                this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + n.id + '"],[data-toggle="collapse"][data-target="#' + n.id + '"]'));
                for (var f = [].slice.call(document.querySelectorAll(lu)), i = 0, o = f.length; i < o; i++) {
                    var e = f[i], u = r.getSelectorFromElement(e),
                        s = [].slice.call(document.querySelectorAll(u)).filter(function (t) {
                            return t === n
                        });
                    null !== u && 0 < s.length && (this._selector = u, this._triggerArray.push(e))
                }
                this._parent = this._config.parent ? this._getParent() : null;
                this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray);
                this._config.toggle && this.toggle()
            }

            var n = i.prototype;
            return n.toggle = function () {
                t(this._element).hasClass(k) ? this.hide() : this.show()
            }, n.show = function () {
                var n, e, u = this, o, f, s, h;
                this._isTransitioning || t(this._element).hasClass(k) || (this._parent && 0 === (n = [].slice.call(this._parent.querySelectorAll(ge)).filter(function (n) {
                    return "string" == typeof u._config.parent ? n.getAttribute("data-parent") === u._config.parent : n.classList.contains(gt)
                })).length && (n = null), n && (e = t(n).not(this._selector).data(b)) && e._isTransitioning) || (o = t.Event(dt.SHOW), (t(this._element).trigger(o), o.isDefaultPrevented()) || (n && (i._jQueryInterface.call(t(n).not(this._selector), "hide"), e || t(n).data(b, null)), f = this._getDimension(), t(this._element).removeClass(gt).addClass(di), this._element.style[f] = 0, this._triggerArray.length && t(this._triggerArray).removeClass(br).attr("aria-expanded", !0), this.setTransitioning(!0), s = "scroll" + (f[0].toUpperCase() + f.slice(1)), h = r.getTransitionDurationFromElement(this._element), t(this._element).one(r.TRANSITION_END, function () {
                    t(u._element).removeClass(di).addClass(gt).addClass(k);
                    u._element.style[f] = "";
                    u.setTransitioning(!1);
                    t(u._element).trigger(dt.SHOWN)
                }).emulateTransitionEnd(h), this._element.style[f] = this._element[s] + "px"))
            }, n.hide = function () {
                var s = this, u, n, f, i, e, o, h;
                if (!this._isTransitioning && t(this._element).hasClass(k) && (u = t.Event(dt.HIDE), t(this._element).trigger(u), !u.isDefaultPrevented())) {
                    if (n = this._getDimension(), this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", r.reflow(this._element), t(this._element).addClass(di).removeClass(gt).removeClass(k), f = this._triggerArray.length, 0 < f) for (i = 0; i < f; i++) e = this._triggerArray[i], o = r.getSelectorFromElement(e), null !== o && (t([].slice.call(document.querySelectorAll(o))).hasClass(k) || t(e).addClass(br).attr("aria-expanded", !1));
                    this.setTransitioning(!0);
                    this._element.style[n] = "";
                    h = r.getTransitionDurationFromElement(this._element);
                    t(this._element).one(r.TRANSITION_END, function () {
                        s.setTransitioning(!1);
                        t(s._element).removeClass(di).addClass(gt).trigger(dt.HIDDEN)
                    }).emulateTransitionEnd(h)
                }
            }, n.setTransitioning = function (n) {
                this._isTransitioning = n
            }, n.dispose = function () {
                t.removeData(this._element, b);
                this._config = null;
                this._parent = null;
                this._element = null;
                this._triggerArray = null;
                this._isTransitioning = null
            }, n._getConfig = function (n) {
                return (n = f({}, wr, n)).toggle = Boolean(n.toggle), r.typeCheckConfig(ft, n, ke), n
            }, n._getDimension = function () {
                return t(this._element).hasClass(cu) ? cu : de
            }, n._getParent = function () {
                var n, e = this, u, f;
                return r.isElement(this._config.parent) ? (n = this._config.parent, "undefined" != typeof this._config.parent.jquery && (n = this._config.parent[0])) : n = document.querySelector(this._config.parent), u = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]', f = [].slice.call(n.querySelectorAll(u)), t(f).each(function (n, t) {
                    e._addAriaAndCollapsedClass(i._getTargetFromElement(t), [t])
                }), n
            }, n._addAriaAndCollapsedClass = function (n, i) {
                var r = t(n).hasClass(k);
                i.length && t(i).toggleClass(br, !r).attr("aria-expanded", r)
            }, i._getTargetFromElement = function (n) {
                var t = r.getSelectorFromElement(n);
                return t ? document.querySelector(t) : null
            }, i._jQueryInterface = function (n) {
                return this.each(function () {
                    var u = t(this), r = u.data(b), e = f({}, wr, u.data(), "object" == typeof n && n ? n : {});
                    if (!r && e.toggle && /show|hide/.test(n) && (e.toggle = !1), r || (r = new i(this, e), u.data(b, r)), "string" == typeof n) {
                        if ("undefined" == typeof r[n]) throw new TypeError('No method named "' + n + '"');
                        r[n]()
                    }
                })
            }, l(i, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return wr
                }
            }]), i
        }();
    t(document).on(dt.CLICK_DATA_API, lu, function (n) {
        "A" === n.currentTarget.tagName && n.preventDefault();
        var i = t(this), u = r.getSelectorFromElement(this), f = [].slice.call(document.querySelectorAll(u));
        t(f).each(function () {
            var n = t(this), r = n.data(b) ? "toggle" : i.data();
            ni._jQueryInterface.call(n, r)
        })
    });
    t.fn[ft] = ni._jQueryInterface;
    t.fn[ft].Constructor = ni;
    t.fn[ft].noConflict = function () {
        return t.fn[ft] = be, ni._jQueryInterface
    };
    var et = "dropdown", ti = "bs.dropdown", y = "." + ti, kr = ".data-api", no = t.fn[et], to = new RegExp("38|40|27"),
        e = {
            HIDE: "hide" + y,
            HIDDEN: "hidden" + y,
            SHOW: "show" + y,
            SHOWN: "shown" + y,
            CLICK: "click" + y,
            CLICK_DATA_API: "click" + y + kr,
            KEYDOWN_DATA_API: "keydown" + y + kr,
            KEYUP_DATA_API: "keyup" + y + kr
        }, gi = "disabled", h = "show", io = "dropup", ro = "dropright", uo = "dropleft", au = "dropdown-menu-right",
        fo = "position-static", nr = '[data-toggle="dropdown"]', dr = ".dropdown-menu", eo = ".navbar-nav",
        oo = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", so = "top-start", ho = "top-end",
        co = "bottom-start", lo = "bottom-end", ao = "right-start", vo = "left-start",
        yo = {offset: 0, flip: !0, boundary: "scrollParent", reference: "toggle", display: "dynamic"}, po = {
            offset: "(number|string|function)",
            flip: "boolean",
            boundary: "(string|element)",
            reference: "(string|element)",
            display: "string"
        }, p = function () {
            function n(n, t) {
                this._element = n;
                this._popper = null;
                this._config = this._getConfig(t);
                this._menu = this._getMenuElement();
                this._inNavbar = this._detectNavbar();
                this._addEventListeners()
            }

            var u = n.prototype;
            return u.toggle = function () {
                var u, c, o, s, f;
                if (!this._element.disabled && !t(this._element).hasClass(gi) && (u = n._getParentFromElement(this._element), c = t(this._menu).hasClass(h), (n._clearMenus(), !c) && (o = {relatedTarget: this._element}, s = t.Event(e.SHOW, o), t(u).trigger(s), !s.isDefaultPrevented()))) {
                    if (!this._inNavbar) {
                        if ("undefined" == typeof i) throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org/)");
                        f = this._element;
                        "parent" === this._config.reference ? f = u : r.isElement(this._config.reference) && (f = this._config.reference, "undefined" != typeof this._config.reference.jquery && (f = this._config.reference[0]));
                        "scrollParent" !== this._config.boundary && t(u).addClass(fo);
                        this._popper = new i(f, this._menu, this._getPopperConfig())
                    }
                    "ontouchstart" in document.documentElement && 0 === t(u).closest(eo).length && t(document.body).children().on("mouseover", null, t.noop);
                    this._element.focus();
                    this._element.setAttribute("aria-expanded", !0);
                    t(this._menu).toggleClass(h);
                    t(u).toggleClass(h).trigger(t.Event(e.SHOWN, o))
                }
            }, u.show = function () {
                if (!(this._element.disabled || t(this._element).hasClass(gi) || t(this._menu).hasClass(h))) {
                    var i = {relatedTarget: this._element}, r = t.Event(e.SHOW, i),
                        u = n._getParentFromElement(this._element);
                    t(u).trigger(r);
                    r.isDefaultPrevented() || (t(this._menu).toggleClass(h), t(u).toggleClass(h).trigger(t.Event(e.SHOWN, i)))
                }
            }, u.hide = function () {
                if (!this._element.disabled && !t(this._element).hasClass(gi) && t(this._menu).hasClass(h)) {
                    var i = {relatedTarget: this._element}, r = t.Event(e.HIDE, i),
                        u = n._getParentFromElement(this._element);
                    t(u).trigger(r);
                    r.isDefaultPrevented() || (t(this._menu).toggleClass(h), t(u).toggleClass(h).trigger(t.Event(e.HIDDEN, i)))
                }
            }, u.dispose = function () {
                t.removeData(this._element, ti);
                t(this._element).off(y);
                this._element = null;
                (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null)
            }, u.update = function () {
                this._inNavbar = this._detectNavbar();
                null !== this._popper && this._popper.scheduleUpdate()
            }, u._addEventListeners = function () {
                var n = this;
                t(this._element).on(e.CLICK, function (t) {
                    t.preventDefault();
                    t.stopPropagation();
                    n.toggle()
                })
            }, u._getConfig = function (n) {
                return n = f({}, this.constructor.Default, t(this._element).data(), n), r.typeCheckConfig(et, n, this.constructor.DefaultType), n
            }, u._getMenuElement = function () {
                if (!this._menu) {
                    var t = n._getParentFromElement(this._element);
                    t && (this._menu = t.querySelector(dr))
                }
                return this._menu
            }, u._getPlacement = function () {
                var i = t(this._element.parentNode), n = co;
                return i.hasClass(io) ? (n = so, t(this._menu).hasClass(au) && (n = ho)) : i.hasClass(ro) ? n = ao : i.hasClass(uo) ? n = vo : t(this._menu).hasClass(au) && (n = lo), n
            }, u._detectNavbar = function () {
                return 0 < t(this._element).closest(".navbar").length
            }, u._getOffset = function () {
                var t = this, n = {};
                return "function" == typeof this._config.offset ? n.fn = function (n) {
                    return n.offsets = f({}, n.offsets, t._config.offset(n.offsets, t._element) || {}), n
                } : n.offset = this._config.offset, n
            }, u._getPopperConfig = function () {
                var n = {
                    placement: this._getPlacement(),
                    modifiers: {
                        offset: this._getOffset(),
                        flip: {enabled: this._config.flip},
                        preventOverflow: {boundariesElement: this._config.boundary}
                    }
                };
                return "static" === this._config.display && (n.modifiers.applyStyle = {enabled: !1}), n
            }, n._jQueryInterface = function (i) {
                return this.each(function () {
                    var r = t(this).data(ti);
                    if (r || (r = new n(this, "object" == typeof i ? i : null), t(this).data(ti, r)), "string" == typeof i) {
                        if ("undefined" == typeof r[i]) throw new TypeError('No method named "' + i + '"');
                        r[i]()
                    }
                })
            }, n._clearMenus = function (i) {
                var l, s;
                if (!i || 3 !== i.which && ("keyup" !== i.type || 9 === i.which)) for (var u = [].slice.call(document.querySelectorAll(nr)), r = 0, a = u.length; r < a; r++) {
                    var f = n._getParentFromElement(u[r]), c = t(u[r]).data(ti), o = {relatedTarget: u[r]};
                    (i && "click" === i.type && (o.clickEvent = i), c) && (l = c._menu, !t(f).hasClass(h) || i && ("click" === i.type && /input|textarea/i.test(i.target.tagName) || "keyup" === i.type && 9 === i.which) && t.contains(f, i.target) || (s = t.Event(e.HIDE, o), t(f).trigger(s), s.isDefaultPrevented() || ("ontouchstart" in document.documentElement && t(document.body).children().off("mouseover", null, t.noop), u[r].setAttribute("aria-expanded", "false"), t(l).removeClass(h), t(f).removeClass(h).trigger(t.Event(e.HIDDEN, o)))))
                }
            }, n._getParentFromElement = function (n) {
                var t, i = r.getSelectorFromElement(n);
                return i && (t = document.querySelector(i)), t || n.parentNode
            }, n._dataApiKeydownHandler = function (i) {
                var f, e, u, r, o;
                (/input|textarea/i.test(i.target.tagName) ? 32 === i.which || 27 !== i.which && (40 !== i.which && 38 !== i.which || t(i.target).closest(dr).length) : !to.test(i.which)) || (i.preventDefault(), i.stopPropagation(), this.disabled || t(this).hasClass(gi)) || (f = n._getParentFromElement(this), e = t(f).hasClass(h), e && (!e || 27 !== i.which && 32 !== i.which) ? (u = [].slice.call(f.querySelectorAll(oo)), 0 !== u.length && (r = u.indexOf(i.target), 38 === i.which && 0 < r && r--, 40 === i.which && r < u.length - 1 && r++, r < 0 && (r = 0), u[r].focus())) : (27 === i.which && (o = f.querySelector(nr), t(o).trigger("focus")), t(this).trigger("click")))
            }, l(n, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return yo
                }
            }, {
                key: "DefaultType", get: function () {
                    return po
                }
            }]), n
        }();
    t(document).on(e.KEYDOWN_DATA_API, nr, p._dataApiKeydownHandler).on(e.KEYDOWN_DATA_API, dr, p._dataApiKeydownHandler).on(e.CLICK_DATA_API + " " + e.KEYUP_DATA_API, p._clearMenus).on(e.CLICK_DATA_API, nr, function (n) {
        n.preventDefault();
        n.stopPropagation();
        p._jQueryInterface.call(t(this), "toggle")
    }).on(e.CLICK_DATA_API, ".dropdown form", function (n) {
        n.stopPropagation()
    });
    t.fn[et] = p._jQueryInterface;
    t.fn[et].Constructor = p;
    t.fn[et].noConflict = function () {
        return t.fn[et] = no, p._jQueryInterface
    };
    var ot = "modal", ii = "bs.modal", c = "." + ii, wo = t.fn[ot],
        gr = {backdrop: !0, keyboard: !0, focus: !0, show: !0},
        bo = {backdrop: "(boolean|string)", keyboard: "boolean", focus: "boolean", show: "boolean"}, u = {
            HIDE: "hide" + c,
            HIDDEN: "hidden" + c,
            SHOW: "show" + c,
            SHOWN: "shown" + c,
            FOCUSIN: "focusin" + c,
            RESIZE: "resize" + c,
            CLICK_DISMISS: "click.dismiss" + c,
            KEYDOWN_DISMISS: "keydown.dismiss" + c,
            MOUSEUP_DISMISS: "mouseup.dismiss" + c,
            MOUSEDOWN_DISMISS: "mousedown.dismiss" + c,
            CLICK_DATA_API: "click" + c + ".data-api"
        }, ko = "modal-dialog-scrollable", go = "modal-scrollbar-measure", ns = "modal-backdrop", vu = "modal-open",
        st = "fade", tr = "show", ts = ".modal-dialog", is = ".modal-body", rs = '[data-dismiss="modal"]',
        yu = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", pu = ".sticky-top", ri = function () {
            function i(n, t) {
                this._config = this._getConfig(t);
                this._element = n;
                this._dialog = n.querySelector(ts);
                this._backdrop = null;
                this._isShown = !1;
                this._isBodyOverflowing = !1;
                this._ignoreBackdropClick = !1;
                this._isTransitioning = !1;
                this._scrollbarWidth = 0
            }

            var n = i.prototype;
            return n.toggle = function (n) {
                return this._isShown ? this.hide() : this.show(n)
            }, n.show = function (n) {
                var i = this, r;
                this._isShown || this._isTransitioning || (t(this._element).hasClass(st) && (this._isTransitioning = !0), r = t.Event(u.SHOW, {relatedTarget: n}), t(this._element).trigger(r), this._isShown || r.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), t(this._element).on(u.CLICK_DISMISS, rs, function (n) {
                    return i.hide(n)
                }), t(this._dialog).on(u.MOUSEDOWN_DISMISS, function () {
                    t(i._element).one(u.MOUSEUP_DISMISS, function (n) {
                        t(n.target).is(i._element) && (i._ignoreBackdropClick = !0)
                    })
                }), this._showBackdrop(function () {
                    return i._showElement(n)
                })))
            }, n.hide = function (n) {
                var o = this, i, f, e;
                (n && n.preventDefault(), this._isShown && !this._isTransitioning) && (i = t.Event(u.HIDE), (t(this._element).trigger(i), this._isShown && !i.isDefaultPrevented()) && (this._isShown = !1, f = t(this._element).hasClass(st), (f && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), t(document).off(u.FOCUSIN), t(this._element).removeClass(tr), t(this._element).off(u.CLICK_DISMISS), t(this._dialog).off(u.MOUSEDOWN_DISMISS), f) ? (e = r.getTransitionDurationFromElement(this._element), t(this._element).one(r.TRANSITION_END, function (n) {
                    return o._hideModal(n)
                }).emulateTransitionEnd(e)) : this._hideModal()))
            }, n.dispose = function () {
                [window, this._element, this._dialog].forEach(function (n) {
                    return t(n).off(c)
                });
                t(document).off(u.FOCUSIN);
                t.removeData(this._element, ii);
                this._config = null;
                this._element = null;
                this._dialog = null;
                this._backdrop = null;
                this._isShown = null;
                this._isBodyOverflowing = null;
                this._ignoreBackdropClick = null;
                this._isTransitioning = null;
                this._scrollbarWidth = null
            }, n.handleUpdate = function () {
                this._adjustDialog()
            }, n._getConfig = function (n) {
                return n = f({}, gr, n), r.typeCheckConfig(ot, n, bo), n
            }, n._showElement = function (n) {
                var i = this, e = t(this._element).hasClass(st), o, f, s;
                this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element);
                this._element.style.display = "block";
                this._element.removeAttribute("aria-hidden");
                this._element.setAttribute("aria-modal", !0);
                t(this._dialog).hasClass(ko) ? this._dialog.querySelector(is).scrollTop = 0 : this._element.scrollTop = 0;
                e && r.reflow(this._element);
                t(this._element).addClass(tr);
                this._config.focus && this._enforceFocus();
                o = t.Event(u.SHOWN, {relatedTarget: n});
                f = function () {
                    i._config.focus && i._element.focus();
                    i._isTransitioning = !1;
                    t(i._element).trigger(o)
                };
                e ? (s = r.getTransitionDurationFromElement(this._dialog), t(this._dialog).one(r.TRANSITION_END, f).emulateTransitionEnd(s)) : f()
            }, n._enforceFocus = function () {
                var n = this;
                t(document).off(u.FOCUSIN).on(u.FOCUSIN, function (i) {
                    document !== i.target && n._element !== i.target && 0 === t(n._element).has(i.target).length && n._element.focus()
                })
            }, n._setEscapeEvent = function () {
                var n = this;
                this._isShown && this._config.keyboard ? t(this._element).on(u.KEYDOWN_DISMISS, function (t) {
                    27 === t.which && (t.preventDefault(), n.hide())
                }) : this._isShown || t(this._element).off(u.KEYDOWN_DISMISS)
            }, n._setResizeEvent = function () {
                var n = this;
                this._isShown ? t(window).on(u.RESIZE, function (t) {
                    return n.handleUpdate(t)
                }) : t(window).off(u.RESIZE)
            }, n._hideModal = function () {
                var n = this;
                this._element.style.display = "none";
                this._element.setAttribute("aria-hidden", !0);
                this._element.removeAttribute("aria-modal");
                this._isTransitioning = !1;
                this._showBackdrop(function () {
                    t(document.body).removeClass(vu);
                    n._resetAdjustments();
                    n._resetScrollbar();
                    t(n._element).trigger(u.HIDDEN)
                })
            }, n._removeBackdrop = function () {
                this._backdrop && (t(this._backdrop).remove(), this._backdrop = null)
            }, n._showBackdrop = function (n) {
                var i = this, f = t(this._element).hasClass(st) ? st : "", o, e, s;
                if (this._isShown && this._config.backdrop) {
                    if (this._backdrop = document.createElement("div"), this._backdrop.className = ns, f && this._backdrop.classList.add(f), t(this._backdrop).appendTo(document.body), t(this._element).on(u.CLICK_DISMISS, function (n) {
                        i._ignoreBackdropClick ? i._ignoreBackdropClick = !1 : n.target === n.currentTarget && ("static" === i._config.backdrop ? i._element.focus() : i.hide())
                    }), f && r.reflow(this._backdrop), t(this._backdrop).addClass(tr), !n) return;
                    if (!f) return void n();
                    o = r.getTransitionDurationFromElement(this._backdrop);
                    t(this._backdrop).one(r.TRANSITION_END, n).emulateTransitionEnd(o)
                } else !this._isShown && this._backdrop ? (t(this._backdrop).removeClass(tr), e = function () {
                    i._removeBackdrop();
                    n && n()
                }, t(this._element).hasClass(st) ? (s = r.getTransitionDurationFromElement(this._backdrop), t(this._backdrop).one(r.TRANSITION_END, e).emulateTransitionEnd(s)) : e()) : n && n()
            }, n._adjustDialog = function () {
                var n = this._element.scrollHeight > document.documentElement.clientHeight;
                !this._isBodyOverflowing && n && (this._element.style.paddingLeft = this._scrollbarWidth + "px");
                this._isBodyOverflowing && !n && (this._element.style.paddingRight = this._scrollbarWidth + "px")
            }, n._resetAdjustments = function () {
                this._element.style.paddingLeft = "";
                this._element.style.paddingRight = ""
            }, n._checkScrollbar = function () {
                var n = document.body.getBoundingClientRect();
                this._isBodyOverflowing = n.left + n.right < window.innerWidth;
                this._scrollbarWidth = this._getScrollbarWidth()
            }, n._setScrollbar = function () {
                var n = this, i, r, u, f;
                this._isBodyOverflowing && (i = [].slice.call(document.querySelectorAll(yu)), r = [].slice.call(document.querySelectorAll(pu)), t(i).each(function (i, r) {
                    var u = r.style.paddingRight, f = t(r).css("padding-right");
                    t(r).data("padding-right", u).css("padding-right", parseFloat(f) + n._scrollbarWidth + "px")
                }), t(r).each(function (i, r) {
                    var u = r.style.marginRight, f = t(r).css("margin-right");
                    t(r).data("margin-right", u).css("margin-right", parseFloat(f) - n._scrollbarWidth + "px")
                }), u = document.body.style.paddingRight, f = t(document.body).css("padding-right"), t(document.body).data("padding-right", u).css("padding-right", parseFloat(f) + this._scrollbarWidth + "px"));
                t(document.body).addClass(vu)
            }, n._resetScrollbar = function () {
                var r = [].slice.call(document.querySelectorAll(yu)), n, i;
                t(r).each(function (n, i) {
                    var r = t(i).data("padding-right");
                    t(i).removeData("padding-right");
                    i.style.paddingRight = r || ""
                });
                n = [].slice.call(document.querySelectorAll("" + pu));
                t(n).each(function (n, i) {
                    var r = t(i).data("margin-right");
                    "undefined" != typeof r && t(i).css("margin-right", r).removeData("margin-right")
                });
                i = t(document.body).data("padding-right");
                t(document.body).removeData("padding-right");
                document.body.style.paddingRight = i || ""
            }, n._getScrollbarWidth = function () {
                var n = document.createElement("div"), t;
                return n.className = go, document.body.appendChild(n), t = n.getBoundingClientRect().width - n.clientWidth, document.body.removeChild(n), t
            }, i._jQueryInterface = function (n, r) {
                return this.each(function () {
                    var u = t(this).data(ii), e = f({}, gr, t(this).data(), "object" == typeof n && n ? n : {});
                    if (u || (u = new i(this, e), t(this).data(ii, u)), "string" == typeof n) {
                        if ("undefined" == typeof u[n]) throw new TypeError('No method named "' + n + '"');
                        u[n](r)
                    } else e.show && u.show(r)
                })
            }, l(i, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return gr
                }
            }]), i
        }();
    t(document).on(u.CLICK_DATA_API, '[data-toggle="modal"]', function (n) {
        var i, e = this, o = r.getSelectorFromElement(this), s, h;
        o && (i = document.querySelector(o));
        s = t(i).data(ii) ? "toggle" : f({}, t(i).data(), t(this).data());
        "A" !== this.tagName && "AREA" !== this.tagName || n.preventDefault();
        h = t(i).one(u.SHOW, function (n) {
            n.isDefaultPrevented() || h.one(u.HIDDEN, function () {
                t(e).is(":visible") && e.focus()
            })
        });
        ri._jQueryInterface.call(t(i), s, this)
    });
    t.fn[ot] = ri._jQueryInterface;
    t.fn[ot].Constructor = ri;
    t.fn[ot].noConflict = function () {
        return t.fn[ot] = wo, ri._jQueryInterface
    };
    var us = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
        fs = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:/?#]*(?:[/?#]|$))/gi,
        es = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+/]+=*$/i;
    var d = "tooltip", ir = "bs.tooltip", a = "." + ir, os = t.fn[d], bu = "bs-tooltip",
        ss = new RegExp("(^|\\s)" + bu + "\\S+", "g"), hs = ["sanitize", "whiteList", "sanitizeFn"], cs = {
            animation: "boolean",
            template: "string",
            title: "(string|element|function)",
            trigger: "string",
            delay: "(number|object)",
            html: "boolean",
            selector: "(string|boolean)",
            placement: "(string|function)",
            offset: "(number|string|function)",
            container: "(string|element|boolean)",
            fallbackPlacement: "(string|array)",
            boundary: "(string|element)",
            sanitize: "boolean",
            sanitizeFn: "(null|function)",
            whiteList: "object"
        }, ls = {AUTO: "auto", TOP: "top", RIGHT: "right", BOTTOM: "bottom", LEFT: "left"}, as = {
            animation: !0,
            template: '<div class="tooltip" role="tooltip"><div class="arrow"><\/div><div class="tooltip-inner"><\/div><\/div>',
            trigger: "hover focus",
            title: "",
            delay: 0,
            html: !1,
            selector: !1,
            placement: "top",
            offset: 0,
            container: !1,
            fallbackPlacement: "flip",
            boundary: "scrollParent",
            sanitize: !0,
            sanitizeFn: null,
            whiteList: {
                "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                a: ["target", "href", "title", "rel"],
                area: [],
                b: [],
                br: [],
                col: [],
                code: [],
                div: [],
                em: [],
                hr: [],
                h1: [],
                h2: [],
                h3: [],
                h4: [],
                h5: [],
                h6: [],
                i: [],
                img: ["src", "alt", "title", "width", "height"],
                li: [],
                ol: [],
                p: [],
                pre: [],
                s: [],
                small: [],
                span: [],
                sub: [],
                sup: [],
                strong: [],
                u: [],
                ul: []
            }
        }, ui = "show", nu = "out", vs = {
            HIDE: "hide" + a,
            HIDDEN: "hidden" + a,
            SHOW: "show" + a,
            SHOWN: "shown" + a,
            INSERTED: "inserted" + a,
            CLICK: "click" + a,
            FOCUSIN: "focusin" + a,
            FOCUSOUT: "focusout" + a,
            MOUSEENTER: "mouseenter" + a,
            MOUSELEAVE: "mouseleave" + a
        }, fi = "fade", ei = "show", ys = ".tooltip-inner", ps = ".arrow", oi = "hover", tu = "focus", ws = "click",
        bs = "manual", g = function () {
            function u(n, t) {
                if ("undefined" == typeof i) throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org/)");
                this._isEnabled = !0;
                this._timeout = 0;
                this._hoverState = "";
                this._activeTrigger = {};
                this._popper = null;
                this.element = n;
                this.config = this._getConfig(t);
                this.tip = null;
                this._setListeners()
            }

            var n = u.prototype;
            return n.enable = function () {
                this._isEnabled = !0
            }, n.disable = function () {
                this._isEnabled = !1
            }, n.toggleEnabled = function () {
                this._isEnabled = !this._isEnabled
            }, n.toggle = function (n) {
                if (this._isEnabled) if (n) {
                    var r = this.constructor.DATA_KEY, i = t(n.currentTarget).data(r);
                    i || (i = new this.constructor(n.currentTarget, this._getDelegateConfig()), t(n.currentTarget).data(r, i));
                    i._activeTrigger.click = !i._activeTrigger.click;
                    i._isWithActiveTrigger() ? i._enter(null, i) : i._leave(null, i)
                } else {
                    if (t(this.getTipElement()).hasClass(ei)) return void this._leave(null, this);
                    this._enter(null, this)
                }
            }, n.dispose = function () {
                clearTimeout(this._timeout);
                t.removeData(this.element, this.constructor.DATA_KEY);
                t(this.element).off(this.constructor.EVENT_KEY);
                t(this.element).closest(".modal").off("hide.bs.modal");
                this.tip && t(this.tip).remove();
                this._isEnabled = null;
                this._timeout = null;
                this._hoverState = null;
                (this._activeTrigger = null) !== this._popper && this._popper.destroy();
                this._popper = null;
                this.element = null;
                this.config = null;
                this.tip = null
            }, n.show = function () {
                var n = this, f, e, c, u, o, l, s, a, h, v;
                if ("none" === t(this.element).css("display")) throw new Error("Please use show on visible elements");
                if (f = t.Event(this.constructor.Event.SHOW), this.isWithContent() && this._isEnabled) {
                    if (t(this.element).trigger(f), e = r.findShadowRoot(this.element), c = t.contains(null !== e ? e : this.element.ownerDocument.documentElement, this.element), f.isDefaultPrevented() || !c) return;
                    u = this.getTipElement();
                    o = r.getUID(this.constructor.NAME);
                    u.setAttribute("id", o);
                    this.element.setAttribute("aria-describedby", o);
                    this.setContent();
                    this.config.animation && t(u).addClass(fi);
                    l = "function" == typeof this.config.placement ? this.config.placement.call(this, u, this.element) : this.config.placement;
                    s = this._getAttachment(l);
                    this.addAttachmentClass(s);
                    a = this._getContainer();
                    t(u).data(this.constructor.DATA_KEY, this);
                    t.contains(this.element.ownerDocument.documentElement, this.tip) || t(u).appendTo(a);
                    t(this.element).trigger(this.constructor.Event.INSERTED);
                    this._popper = new i(this.element, u, {
                        placement: s,
                        modifiers: {
                            offset: this._getOffset(),
                            flip: {behavior: this.config.fallbackPlacement},
                            arrow: {element: ps},
                            preventOverflow: {boundariesElement: this.config.boundary}
                        },
                        onCreate: function (t) {
                            t.originalPlacement !== t.placement && n._handlePopperPlacementChange(t)
                        },
                        onUpdate: function (t) {
                            return n._handlePopperPlacementChange(t)
                        }
                    });
                    t(u).addClass(ei);
                    "ontouchstart" in document.documentElement && t(document.body).children().on("mouseover", null, t.noop);
                    h = function () {
                        n.config.animation && n._fixTransition();
                        var i = n._hoverState;
                        n._hoverState = null;
                        t(n.element).trigger(n.constructor.Event.SHOWN);
                        i === nu && n._leave(null, n)
                    };
                    t(this.tip).hasClass(fi) ? (v = r.getTransitionDurationFromElement(this.tip), t(this.tip).one(r.TRANSITION_END, h).emulateTransitionEnd(v)) : h()
                }
            }, n.hide = function (n) {
                var i = this, u = this.getTipElement(), f = t.Event(this.constructor.Event.HIDE), e = function () {
                    i._hoverState !== ui && u.parentNode && u.parentNode.removeChild(u);
                    i._cleanTipClass();
                    i.element.removeAttribute("aria-describedby");
                    t(i.element).trigger(i.constructor.Event.HIDDEN);
                    null !== i._popper && i._popper.destroy();
                    n && n()
                }, o;
                (t(this.element).trigger(f), f.isDefaultPrevented()) || ((t(u).removeClass(ei), "ontouchstart" in document.documentElement && t(document.body).children().off("mouseover", null, t.noop), this._activeTrigger[ws] = !1, this._activeTrigger[tu] = !1, this._activeTrigger[oi] = !1, t(this.tip).hasClass(fi)) ? (o = r.getTransitionDurationFromElement(u), t(u).one(r.TRANSITION_END, e).emulateTransitionEnd(o)) : e(), this._hoverState = "")
            }, n.update = function () {
                null !== this._popper && this._popper.scheduleUpdate()
            }, n.isWithContent = function () {
                return Boolean(this.getTitle())
            }, n.addAttachmentClass = function (n) {
                t(this.getTipElement()).addClass(bu + "-" + n)
            }, n.getTipElement = function () {
                return this.tip = this.tip || t(this.config.template)[0], this.tip
            }, n.setContent = function () {
                var n = this.getTipElement();
                this.setElementContent(t(n.querySelectorAll(ys)), this.getTitle());
                t(n).removeClass(fi + " " + ei)
            }, n.setElementContent = function (n, i) {
                "object" != typeof i || !i.nodeType && !i.jquery ? this.config.html ? (this.config.sanitize && (i = wu(i, this.config.whiteList, this.config.sanitizeFn)), n.html(i)) : n.text(i) : this.config.html ? t(i).parent().is(n) || n.empty().append(i) : n.text(t(i).text())
            }, n.getTitle = function () {
                var n = this.element.getAttribute("data-original-title");
                return n || (n = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), n
            }, n._getOffset = function () {
                var t = this, n = {};
                return "function" == typeof this.config.offset ? n.fn = function (n) {
                    return n.offsets = f({}, n.offsets, t.config.offset(n.offsets, t.element) || {}), n
                } : n.offset = this.config.offset, n
            }, n._getContainer = function () {
                return !1 === this.config.container ? document.body : r.isElement(this.config.container) ? t(this.config.container) : t(document).find(this.config.container)
            }, n._getAttachment = function (n) {
                return ls[n.toUpperCase()]
            }, n._setListeners = function () {
                var n = this;
                this.config.trigger.split(" ").forEach(function (i) {
                    if ("click" === i) t(n.element).on(n.constructor.Event.CLICK, n.config.selector, function (t) {
                        return n.toggle(t)
                    }); else if (i !== bs) {
                        var r = i === oi ? n.constructor.Event.MOUSEENTER : n.constructor.Event.FOCUSIN,
                            u = i === oi ? n.constructor.Event.MOUSELEAVE : n.constructor.Event.FOCUSOUT;
                        t(n.element).on(r, n.config.selector, function (t) {
                            return n._enter(t)
                        }).on(u, n.config.selector, function (t) {
                            return n._leave(t)
                        })
                    }
                });
                t(this.element).closest(".modal").on("hide.bs.modal", function () {
                    n.element && n.hide()
                });
                this.config.selector ? this.config = f({}, this.config, {
                    trigger: "manual",
                    selector: ""
                }) : this._fixTitle()
            }, n._fixTitle = function () {
                var n = typeof this.element.getAttribute("data-original-title");
                (this.element.getAttribute("title") || "string" !== n) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
            }, n._enter = function (n, i) {
                var r = this.constructor.DATA_KEY;
                (i = i || t(n.currentTarget).data(r)) || (i = new this.constructor(n.currentTarget, this._getDelegateConfig()), t(n.currentTarget).data(r, i));
                n && (i._activeTrigger["focusin" === n.type ? tu : oi] = !0);
                t(i.getTipElement()).hasClass(ei) || i._hoverState === ui ? i._hoverState = ui : (clearTimeout(i._timeout), i._hoverState = ui, i.config.delay && i.config.delay.show ? i._timeout = setTimeout(function () {
                    i._hoverState === ui && i.show()
                }, i.config.delay.show) : i.show())
            }, n._leave = function (n, i) {
                var r = this.constructor.DATA_KEY;
                (i = i || t(n.currentTarget).data(r)) || (i = new this.constructor(n.currentTarget, this._getDelegateConfig()), t(n.currentTarget).data(r, i));
                n && (i._activeTrigger["focusout" === n.type ? tu : oi] = !1);
                i._isWithActiveTrigger() || (clearTimeout(i._timeout), i._hoverState = nu, i.config.delay && i.config.delay.hide ? i._timeout = setTimeout(function () {
                    i._hoverState === nu && i.hide()
                }, i.config.delay.hide) : i.hide())
            }, n._isWithActiveTrigger = function () {
                for (var n in this._activeTrigger) if (this._activeTrigger[n]) return !0;
                return !1
            }, n._getConfig = function (n) {
                var i = t(this.element).data();
                return Object.keys(i).forEach(function (n) {
                    -1 !== hs.indexOf(n) && delete i[n]
                }), "number" == typeof (n = f({}, this.constructor.Default, i, "object" == typeof n && n ? n : {})).delay && (n.delay = {
                    show: n.delay,
                    hide: n.delay
                }), "number" == typeof n.title && (n.title = n.title.toString()), "number" == typeof n.content && (n.content = n.content.toString()), r.typeCheckConfig(d, n, this.constructor.DefaultType), n.sanitize && (n.template = wu(n.template, n.whiteList, n.sanitizeFn)), n
            }, n._getDelegateConfig = function () {
                var t = {}, n;
                if (this.config) for (n in this.config) this.constructor.Default[n] !== this.config[n] && (t[n] = this.config[n]);
                return t
            }, n._cleanTipClass = function () {
                var i = t(this.getTipElement()), n = i.attr("class").match(ss);
                null !== n && n.length && i.removeClass(n.join(""))
            }, n._handlePopperPlacementChange = function (n) {
                var t = n.instance;
                this.tip = t.popper;
                this._cleanTipClass();
                this.addAttachmentClass(this._getAttachment(n.placement))
            }, n._fixTransition = function () {
                var n = this.getTipElement(), i = this.config.animation;
                null === n.getAttribute("x-placement") && (t(n).removeClass(fi), this.config.animation = !1, this.hide(), this.show(), this.config.animation = i)
            }, u._jQueryInterface = function (n) {
                return this.each(function () {
                    var i = t(this).data(ir), r = "object" == typeof n && n;
                    if ((i || !/dispose|hide/.test(n)) && (i || (i = new u(this, r), t(this).data(ir, i)), "string" == typeof n)) {
                        if ("undefined" == typeof i[n]) throw new TypeError('No method named "' + n + '"');
                        i[n]()
                    }
                })
            }, l(u, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return as
                }
            }, {
                key: "NAME", get: function () {
                    return d
                }
            }, {
                key: "DATA_KEY", get: function () {
                    return ir
                }
            }, {
                key: "Event", get: function () {
                    return vs
                }
            }, {
                key: "EVENT_KEY", get: function () {
                    return a
                }
            }, {
                key: "DefaultType", get: function () {
                    return cs
                }
            }]), u
        }();
    t.fn[d] = g._jQueryInterface;
    t.fn[d].Constructor = g;
    t.fn[d].noConflict = function () {
        return t.fn[d] = os, g._jQueryInterface
    };
    var ht = "popover", rr = "bs.popover", v = "." + rr, ks = t.fn[ht], ku = "bs-popover",
        ds = new RegExp("(^|\\s)" + ku + "\\S+", "g"), gs = f({}, g.Default, {
            placement: "right",
            trigger: "click",
            content: "",
            template: '<div class="popover" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
        }), nh = f({}, g.DefaultType, {content: "(string|element|function)"}), th = "fade", ih = "show",
        rh = ".popover-header", uh = ".popover-body", fh = {
            HIDE: "hide" + v,
            HIDDEN: "hidden" + v,
            SHOW: "show" + v,
            SHOWN: "shown" + v,
            INSERTED: "inserted" + v,
            CLICK: "click" + v,
            FOCUSIN: "focusin" + v,
            FOCUSOUT: "focusout" + v,
            MOUSEENTER: "mouseenter" + v,
            MOUSELEAVE: "mouseleave" + v
        }, ur = function (n) {
            function r() {
                return n.apply(this, arguments) || this
            }

            var u, f, i;
            return f = n, (u = r).prototype = Object.create(f.prototype), (u.prototype.constructor = u).__proto__ = f, i = r.prototype, i.isWithContent = function () {
                return this.getTitle() || this._getContent()
            }, i.addAttachmentClass = function (n) {
                t(this.getTipElement()).addClass(ku + "-" + n)
            }, i.getTipElement = function () {
                return this.tip = this.tip || t(this.config.template)[0], this.tip
            }, i.setContent = function () {
                var i = t(this.getTipElement()), n;
                this.setElementContent(i.find(rh), this.getTitle());
                n = this._getContent();
                "function" == typeof n && (n = n.call(this.element));
                this.setElementContent(i.find(uh), n);
                i.removeClass(th + " " + ih)
            }, i._getContent = function () {
                return this.element.getAttribute("data-content") || this.config.content
            }, i._cleanTipClass = function () {
                var i = t(this.getTipElement()), n = i.attr("class").match(ds);
                null !== n && 0 < n.length && i.removeClass(n.join(""))
            }, r._jQueryInterface = function (n) {
                return this.each(function () {
                    var i = t(this).data(rr), u = "object" == typeof n ? n : null;
                    if ((i || !/dispose|hide/.test(n)) && (i || (i = new r(this, u), t(this).data(rr, i)), "string" == typeof n)) {
                        if ("undefined" == typeof i[n]) throw new TypeError('No method named "' + n + '"');
                        i[n]()
                    }
                })
            }, l(r, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return gs
                }
            }, {
                key: "NAME", get: function () {
                    return ht
                }
            }, {
                key: "DATA_KEY", get: function () {
                    return rr
                }
            }, {
                key: "Event", get: function () {
                    return fh
                }
            }, {
                key: "EVENT_KEY", get: function () {
                    return v
                }
            }, {
                key: "DefaultType", get: function () {
                    return nh
                }
            }]), r
        }(g);
    t.fn[ht] = ur._jQueryInterface;
    t.fn[ht].Constructor = ur;
    t.fn[ht].noConflict = function () {
        return t.fn[ht] = ks, ur._jQueryInterface
    };
    var nt = "scrollspy", fr = "bs.scrollspy", er = "." + fr, eh = t.fn[nt],
        du = {offset: 10, method: "auto", target: ""},
        oh = {offset: "number", method: "string", target: "(string|element)"},
        iu = {ACTIVATE: "activate" + er, SCROLL: "scroll" + er, LOAD_DATA_API: "load" + er + ".data-api"},
        sh = "dropdown-item", tt = "active", hh = '[data-spy="scroll"]', gu = ".nav, .list-group", ru = ".nav-link",
        ch = ".nav-item", nf = ".list-group-item", lh = ".dropdown", ah = ".dropdown-item", vh = ".dropdown-toggle",
        yh = "offset", tf = "position", si = function () {
            function i(n, i) {
                var r = this;
                this._element = n;
                this._scrollElement = "BODY" === n.tagName ? window : n;
                this._config = this._getConfig(i);
                this._selector = this._config.target + " " + ru + "," + this._config.target + " " + nf + "," + this._config.target + " " + ah;
                this._offsets = [];
                this._targets = [];
                this._activeTarget = null;
                this._scrollHeight = 0;
                t(this._scrollElement).on(iu.SCROLL, function (n) {
                    return r._process(n)
                });
                this.refresh();
                this._process()
            }

            var n = i.prototype;
            return n.refresh = function () {
                var n = this, u = this._scrollElement === this._scrollElement.window ? yh : tf,
                    i = "auto" === this._config.method ? u : this._config.method, f = i === tf ? this._getScrollTop() : 0;
                this._offsets = [];
                this._targets = [];
                this._scrollHeight = this._getScrollHeight();
                [].slice.call(document.querySelectorAll(this._selector)).map(function (n) {
                    var u, e = r.getSelectorFromElement(n), o;
                    return (e && (u = document.querySelector(e)), u) && (o = u.getBoundingClientRect(), o.width || o.height) ? [t(u)[i]().top + f, e] : null
                }).filter(function (n) {
                    return n
                }).sort(function (n, t) {
                    return n[0] - t[0]
                }).forEach(function (t) {
                    n._offsets.push(t[0]);
                    n._targets.push(t[1])
                })
            }, n.dispose = function () {
                t.removeData(this._element, fr);
                t(this._scrollElement).off(er);
                this._element = null;
                this._scrollElement = null;
                this._config = null;
                this._selector = null;
                this._offsets = null;
                this._targets = null;
                this._activeTarget = null;
                this._scrollHeight = null
            }, n._getConfig = function (n) {
                if ("string" != typeof (n = f({}, du, "object" == typeof n && n ? n : {})).target) {
                    var i = t(n.target).attr("id");
                    i || (i = r.getUID(nt), t(n.target).attr("id", i));
                    n.target = "#" + i
                }
                return r.typeCheckConfig(nt, n, oh), n
            }, n._getScrollTop = function () {
                return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
            }, n._getScrollHeight = function () {
                return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
            }, n._getOffsetHeight = function () {
                return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
            }, n._process = function () {
                var t = this._getScrollTop() + this._config.offset, r = this._getScrollHeight(),
                    u = this._config.offset + r - this._getOffsetHeight(), i, n;
                if (this._scrollHeight !== r && this.refresh(), u <= t) i = this._targets[this._targets.length - 1], this._activeTarget !== i && this._activate(i); else {
                    if (this._activeTarget && t < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();
                    for (n = this._offsets.length; n--;) this._activeTarget !== this._targets[n] && t >= this._offsets[n] && ("undefined" == typeof this._offsets[n + 1] || t < this._offsets[n + 1]) && this._activate(this._targets[n])
                }
            }, n._activate = function (n) {
                this._activeTarget = n;
                this._clear();
                var r = this._selector.split(",").map(function (t) {
                    return t + '[data-target="' + n + '"],' + t + '[href="' + n + '"]'
                }), i = t([].slice.call(document.querySelectorAll(r.join(","))));
                i.hasClass(sh) ? (i.closest(lh).find(vh).addClass(tt), i.addClass(tt)) : (i.addClass(tt), i.parents(gu).prev(ru + ", " + nf).addClass(tt), i.parents(gu).prev(ch).children(ru).addClass(tt));
                t(this._scrollElement).trigger(iu.ACTIVATE, {relatedTarget: n})
            }, n._clear = function () {
                [].slice.call(document.querySelectorAll(this._selector)).filter(function (n) {
                    return n.classList.contains(tt)
                }).forEach(function (n) {
                    return n.classList.remove(tt)
                })
            }, i._jQueryInterface = function (n) {
                return this.each(function () {
                    var r = t(this).data(fr);
                    if (r || (r = new i(this, "object" == typeof n && n), t(this).data(fr, r)), "string" == typeof n) {
                        if ("undefined" == typeof r[n]) throw new TypeError('No method named "' + n + '"');
                        r[n]()
                    }
                })
            }, l(i, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "Default", get: function () {
                    return du
                }
            }]), i
        }();
    t(window).on(iu.LOAD_DATA_API, function () {
        for (var r, n = [].slice.call(document.querySelectorAll(hh)), i = n.length; i--;) r = t(n[i]), si._jQueryInterface.call(r, r.data())
    });
    t.fn[nt] = si._jQueryInterface;
    t.fn[nt].Constructor = si;
    t.fn[nt].noConflict = function () {
        return t.fn[nt] = eh, si._jQueryInterface
    };
    var or = "bs.tab", hi = "." + or, ph = t.fn.tab, ci = {
            HIDE: "hide" + hi,
            HIDDEN: "hidden" + hi,
            SHOW: "show" + hi,
            SHOWN: "shown" + hi,
            CLICK_DATA_API: "click" + hi + ".data-api"
        }, wh = "dropdown-menu", li = "active", bh = "disabled", rf = "fade", uf = "show", kh = ".dropdown",
        dh = ".nav, .list-group", ff = ".active", ef = "> li > .active", gh = ".dropdown-toggle",
        nc = "> .dropdown-menu .active", ai = function () {
            function n(n) {
                this._element = n
            }

            var i = n.prototype;
            return i.show = function () {
                var h = this, u, n, i, f, c, e, o, s;
                this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && t(this._element).hasClass(li) || t(this._element).hasClass(bh) || (i = t(this._element).closest(dh)[0], f = r.getSelectorFromElement(this._element), i && (c = "UL" === i.nodeName || "OL" === i.nodeName ? ef : ff, n = (n = t.makeArray(t(i).find(c)))[n.length - 1]), e = t.Event(ci.HIDE, {relatedTarget: this._element}), o = t.Event(ci.SHOW, {relatedTarget: n}), (n && t(n).trigger(e), t(this._element).trigger(o), o.isDefaultPrevented() || e.isDefaultPrevented()) || (f && (u = document.querySelector(f)), this._activate(this._element, i), s = function () {
                    var i = t.Event(ci.HIDDEN, {relatedTarget: h._element}), r = t.Event(ci.SHOWN, {relatedTarget: n});
                    t(n).trigger(i);
                    t(h._element).trigger(r)
                }, u ? this._activate(u, u.parentNode, s) : s()))
            }, i.dispose = function () {
                t.removeData(this._element, or);
                this._element = null
            }, i._activate = function (n, i, u) {
                var s = this, f = (!i || "UL" !== i.nodeName && "OL" !== i.nodeName ? t(i).children(ff) : t(i).find(ef))[0],
                    h = u && f && t(f).hasClass(rf), e = function () {
                        return s._transitionComplete(n, f, u)
                    }, o;
                f && h ? (o = r.getTransitionDurationFromElement(f), t(f).removeClass(uf).one(r.TRANSITION_END, e).emulateTransitionEnd(o)) : e()
            }, i._transitionComplete = function (n, i, u) {
                var f, e, o;
                i && (t(i).removeClass(li), f = t(i.parentNode).find(nc)[0], f && t(f).removeClass(li), "tab" === i.getAttribute("role") && i.setAttribute("aria-selected", !1));
                (t(n).addClass(li), "tab" === n.getAttribute("role") && n.setAttribute("aria-selected", !0), r.reflow(n), n.classList.contains(rf) && n.classList.add(uf), n.parentNode && t(n.parentNode).hasClass(wh)) && (e = t(n).closest(kh)[0], e && (o = [].slice.call(e.querySelectorAll(gh)), t(o).addClass(li)), n.setAttribute("aria-expanded", !0));
                u && u()
            }, n._jQueryInterface = function (i) {
                return this.each(function () {
                    var u = t(this), r = u.data(or);
                    if (r || (r = new n(this), u.data(or, r)), "string" == typeof i) {
                        if ("undefined" == typeof r[i]) throw new TypeError('No method named "' + i + '"');
                        r[i]()
                    }
                })
            }, l(n, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }]), n
        }();
    t(document).on(ci.CLICK_DATA_API, '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function (n) {
        n.preventDefault();
        ai._jQueryInterface.call(t(this), "show")
    });
    t.fn.tab = ai._jQueryInterface;
    t.fn.tab.Constructor = ai;
    t.fn.tab.noConflict = function () {
        return t.fn.tab = ph, ai._jQueryInterface
    };
    var ct = "toast", sr = "bs.toast", vi = "." + sr, tc = t.fn[ct], lt = {
            CLICK_DISMISS: "click.dismiss" + vi,
            HIDE: "hide" + vi,
            HIDDEN: "hidden" + vi,
            SHOW: "show" + vi,
            SHOWN: "shown" + vi
        }, ic = "fade", of = "hide", yi = "show", sf = "showing",
        rc = {animation: "boolean", autohide: "boolean", delay: "number"},
        hf = {animation: !0, autohide: !0, delay: 500}, uc = '[data-dismiss="toast"]', hr = function () {
            function i(n, t) {
                this._element = n;
                this._config = this._getConfig(t);
                this._timeout = null;
                this._setListeners()
            }

            var n = i.prototype;
            return n.show = function () {
                var n = this, i, u;
                t(this._element).trigger(lt.SHOW);
                this._config.animation && this._element.classList.add(ic);
                i = function () {
                    n._element.classList.remove(sf);
                    n._element.classList.add(yi);
                    t(n._element).trigger(lt.SHOWN);
                    n._config.autohide && n.hide()
                };
                (this._element.classList.remove(of), this._element.classList.add(sf), this._config.animation) ? (u = r.getTransitionDurationFromElement(this._element), t(this._element).one(r.TRANSITION_END, i).emulateTransitionEnd(u)) : i()
            }, n.hide = function (n) {
                var i = this;
                this._element.classList.contains(yi) && (t(this._element).trigger(lt.HIDE), n ? this._close() : this._timeout = setTimeout(function () {
                    i._close()
                }, this._config.delay))
            }, n.dispose = function () {
                clearTimeout(this._timeout);
                this._timeout = null;
                this._element.classList.contains(yi) && this._element.classList.remove(yi);
                t(this._element).off(lt.CLICK_DISMISS);
                t.removeData(this._element, sr);
                this._element = null;
                this._config = null
            }, n._getConfig = function (n) {
                return n = f({}, hf, t(this._element).data(), "object" == typeof n && n ? n : {}), r.typeCheckConfig(ct, n, this.constructor.DefaultType), n
            }, n._setListeners = function () {
                var n = this;
                t(this._element).on(lt.CLICK_DISMISS, uc, function () {
                    return n.hide(!0)
                })
            }, n._close = function () {
                var n = this, i = function () {
                    n._element.classList.add(of);
                    t(n._element).trigger(lt.HIDDEN)
                }, u;
                (this._element.classList.remove(yi), this._config.animation) ? (u = r.getTransitionDurationFromElement(this._element), t(this._element).one(r.TRANSITION_END, i).emulateTransitionEnd(u)) : i()
            }, i._jQueryInterface = function (n) {
                return this.each(function () {
                    var u = t(this), r = u.data(sr);
                    if (r || (r = new i(this, "object" == typeof n && n), u.data(sr, r)), "string" == typeof n) {
                        if ("undefined" == typeof r[n]) throw new TypeError('No method named "' + n + '"');
                        r[n](this)
                    }
                })
            }, l(i, null, [{
                key: "VERSION", get: function () {
                    return "4.3.1"
                }
            }, {
                key: "DefaultType", get: function () {
                    return rc
                }
            }, {
                key: "Default", get: function () {
                    return hf
                }
            }]), i
        }();
    t.fn[ct] = hr._jQueryInterface;
    t.fn[ct].Constructor = hr;
    t.fn[ct].noConflict = function () {
        return t.fn[ct] = tc, hr._jQueryInterface
    }, function () {
        if ("undefined" == typeof t) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
        var n = t.fn.jquery.split(" ")[0].split(".");
        if (n[0] < 2 && n[1] < 9 || 1 === n[0] && 9 === n[1] && n[2] < 1 || 4 <= n[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
    }();
    n.Util = r;
    n.Alert = it;
    n.Button = wt;
    n.Carousel = ut;
    n.Collapse = ni;
    n.Dropdown = p;
    n.Modal = ri;
    n.Popover = ur;
    n.Scrollspy = si;
    n.Tab = ai;
    n.Toast = hr;
    n.Tooltip = g;
    Object.defineProperty(n, "__esModule", {value: !0})
}), function (n) {
    function r() {
        var t = u(this);
        return isNaN(t.datetime) || n(this).text(i(t.datetime)), this
    }

    function u(i) {
        if (i = n(i), !i.data("timeago")) {
            i.data("timeago", {datetime: t.datetime(i)});
            var r = n.trim(i.text());
            r.length > 0 && !(t.isTime(i) && i.attr("title")) && i.attr("title", r)
        }
        return i.data("timeago")
    }

    function i(n) {
        return t.inWords(f(n))
    }

    function f(n) {
        return (new Date).getTime() - n.getTime()
    }

    n.timeago = function (t) {
        return t instanceof Date ? i(t) : typeof t == "string" ? i(n.timeago.parse(t)) : typeof t == "number" ? i(new Date(t)) : i(n.timeago.datetime(t))
    };
    var t = n.timeago;
    n.extend(n.timeago, {
        settings: {
            refreshMillis: 6e4,
            allowFuture: !1,
            strings: {
                prefixAgo: null,
                prefixFromNow: null,
                suffixAgo: "ago",
                suffixFromNow: "from now",
                seconds: "less than a minute",
                minute: "about a minute",
                minutes: "%d minutes",
                hour: "about an hour",
                hours: "about %d hours",
                day: "a day",
                days: "%d days",
                month: "about a month",
                months: "%d months",
                year: "about a year",
                years: "%d years",
                wordSeparator: " ",
                numbers: []
            }
        }, inWords: function (t) {
            function r(r, u) {
                var f = n.isFunction(r) ? r(u, t) : r, e = i.numbers && i.numbers[u] || u;
                return f.replace(/%d/i, e)
            }

            var i = this.settings.strings, s = i.prefixAgo, h = i.suffixAgo, l, a;
            this.settings.allowFuture && t < 0 && (s = i.prefixFromNow, h = i.suffixFromNow);
            var f = Math.abs(t) / 1e3, e = f / 60, o = e / 60, u = o / 24, c = u / 365;
            return l = f < 45 && r(i.seconds, Math.round(f)) || f < 90 && r(i.minute, 1) || e < 45 && r(i.minutes, Math.round(e)) || e < 90 && r(i.hour, 1) || o < 24 && r(i.hours, Math.round(o)) || o < 42 && r(i.day, 1) || u < 30 && r(i.days, Math.round(u)) || u < 45 && r(i.month, 1) || u < 365 && r(i.months, Math.round(u / 30)) || c < 1.5 && r(i.year, 1) || r(i.years, Math.round(c)), a = i.wordSeparator === undefined ? " " : i.wordSeparator, n.trim([s, l, h].join(a))
        }, parse: function (t) {
            var i = n.trim(t);
            return i = i.replace(/\.\d+/, ""), i = i.replace(/-/, "/").replace(/-/, "/"), i = i.replace(/T/, " ").replace(/Z/, " UTC"), i = i.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"), new Date(i)
        }, datetime: function (i) {
            var r = t.isTime(i) ? n(i).attr("datetime") : n(i).attr("title");
            return t.parse(r)
        }, isTime: function (t) {
            return n(t).get(0).tagName.toLowerCase() === "time"
        }
    });
    n.fn.timeago = function () {
        var n = this, i;
        return n.each(r), i = t.settings, i.refreshMillis > 0 && setInterval(function () {
            n.each(r)
        }, i.refreshMillis), n
    };
    document.createElement("abbr");
    document.createElement("time")
}(jQuery);
q = null;
window.PR_SHOULD_USE_CONTINUATION = !0, function () {
    function w(n) {
        function u(n) {
            var i = n.charCodeAt(0), t;
            return i !== 92 ? i : (t = n.charAt(1), (i = a[t]) ? i : "0" <= t && t <= "7" ? parseInt(n.substring(1), 8) : t === "u" || t === "x" ? parseInt(n.substring(2), 16) : n.charCodeAt(1))
        }

        function f(n) {
            return n < 32 ? (n < 16 ? "\\x0" : "\\x") + n.toString(16) : (n = String.fromCharCode(n), (n === "\\" || n === "-" || n === "[" || n === "]") && (n = "\\" + n), n)
        }

        function h(n) {
            for (var t, s, o = n.substring(1, n.length - 1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g), n = [], i = [], h = o[0] === "^", r = h ? 1 : 0, e = o.length; r < e; ++r) t = o[r], /\\[bdsw]/i.test(t) ? n.push(t) : (t = u(t), r + 2 < e && "-" === o[r + 1] ? (s = u(o[r + 2]), r += 2) : s = t, i.push([t, s]), s < 65 || t > 122 || (s < 65 || t > 90 || i.push([Math.max(65, t) | 32, Math.min(s, 90) | 32]), s < 97 || t > 122 || i.push([Math.max(97, t) & -33, Math.min(s, 122) & -33])));
            for (i.sort(function (n, t) {
                return n[0] - t[0] || t[1] - n[1]
            }), o = [], t = [NaN, NaN], r = 0; r < i.length; ++r) e = i[r], e[0] <= t[1] + 1 ? t[1] = Math.max(t[1], e[1]) : o.push(t = e);
            for (i = ["["], h && i.push("^"), i.push.apply(i, n), r = 0; r < o.length; ++r) e = o[r], i.push(f(e[0])), e[1] > e[0] && (e[1] + 1 > e[0] && i.push("-"), i.push(f(e[1])));
            return i.push("]"), i.join("")
        }

        function c(n) {
            for (var i, r = n.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g), o = r.length, f = [], t = 0, u = 0; t < o; ++t) i = r[t], i === "(" ? ++u : "\\" === i.charAt(0) && (i = +i.substring(1)) && i <= u && (f[i] = -1);
            for (t = 1; t < f.length; ++t) -1 === f[t] && (f[t] = ++l);
            for (u = t = 0; t < o; ++t) i = r[t], i === "(" ? (++u, f[u] === void 0 && (r[t] = "(?:")) : "\\" === i.charAt(0) && (i = +i.substring(1)) && i <= u && (r[t] = "\\" + f[u]);
            for (u = t = 0; t < o; ++t) "^" === r[t] && "^" !== r[t + 1] && (r[t] = "");
            if (n.ignoreCase && e) for (t = 0; t < o; ++t) i = r[t], n = i.charAt(0), i.length >= 2 && n === "[" ? r[t] = h(i) : n !== "\\" && (r[t] = i.replace(/[A-Za-z]/g, function (n) {
                return n = n.charCodeAt(0), "[" + String.fromCharCode(n & -33, n | 32) + "]"
            }));
            return r.join("")
        }

        for (var t, l = 0, e = !1, r = !1, i = 0, o = n.length; i < o; ++i) if (t = n[i], t.ignoreCase) r = !0; else if (/[a-z]/i.test(t.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi, ""))) {
            e = !0;
            r = !1;
            break
        }
        for (var a = {b: 8, t: 9, n: 10, v: 11, f: 12, r: 13}, s = [], i = 0, o = n.length; i < o; ++i) {
            if (t = n[i], t.global || t.multiline) throw Error("" + t);
            s.push("(?:" + c(t) + ")")
        }
        return RegExp(s.join("|"), r ? "gi" : "g")
    }

    function b(n) {
        function e(n) {
            switch (n.nodeType) {
                case 1:
                    if (s.test(n.className)) break;
                    for (var r = n.firstChild; r; r = r.nextSibling) e(r);
                    r = n.nodeName;
                    ("BR" === r || "LI" === r) && (u[t] = "\n", i[t << 1] = f++, i[t++ << 1 | 1] = n);
                    break;
                case 3:
                case 4:
                    r = n.nodeValue;
                    r.length && (r = o ? r.replace(/\r\n?/g, "\n") : r.replace(/[\t\n\r ]+/g, " "), u[t] = r, i[t << 1] = f, f += r.length, i[t++ << 1 | 1] = n)
            }
        }

        var s = /(?:^|\s)nocode(?:\s|$)/, u = [], f = 0, i = [], t = 0, r, o;
        return n.currentStyle ? r = n.currentStyle.whiteSpace : window.getComputedStyle && (r = document.defaultView.getComputedStyle(n, q).getPropertyValue("white-space")), o = r && "pre" === r.substring(0, 3), e(n), {
            a: u.join("").replace(/\n$/, ""),
            c: i
        }
    }

    function e(n, t, i, r) {
        t && (n = {a: t, d: n}, i(n), r.push.apply(r, n.e))
    }

    function i(n, t) {
        function i(n) {
            for (var c, p, w, v = n.d, y = [v, "pln"], k = 0, d = n.a.match(u) || [], g = {}, b = 0, nt = d.length; b < nt; ++b) {
                var l = d[b], h = g[l], a = void 0, o;
                if (typeof h == "string") o = !1; else {
                    if (c = r[l.charAt(0)], c) a = l.match(c[1]), h = c[0]; else {
                        for (o = 0; o < f; ++o) if (c = t[o], a = l.match(c[1])) {
                            h = c[0];
                            break
                        }
                        a || (h = "pln")
                    }
                    !(o = h.length >= 5 && "lang-" === h.substring(0, 5)) || a && typeof a[1] == "string" || (o = !1, h = "src");
                    o || (g[l] = h)
                }
                c = k;
                k += l.length;
                o ? (o = a[1], p = l.indexOf(o), w = p + o.length, a[2] && (w = l.length - a[2].length, p = w - o.length), h = h.substring(5), e(v + c, l.substring(0, p), i, y), e(v + c + p, o, s(h, o), y), e(v + c + w, l.substring(w), i, y)) : y.push(v + c, h)
            }
            n.e = y
        }

        var r = {}, u, f;
        return function () {
            for (var i, f, s, h = n.concat(t), e = [], c = {}, o = 0, l = h.length; o < l; ++o) {
                if (i = h[o], f = i[3], f) for (s = f.length; --s >= 0;) r[f.charAt(s)] = i;
                i = i[1];
                f = "" + i;
                c.hasOwnProperty(f) || (e.push(i), c[f] = q)
            }
            e.push(/[\S\s]/);
            u = w(e)
        }(), f = t.length, i
    }

    function t(n) {
        var r = [], t = [], u;
        return n.tripleQuotedStrings ? r.push(["str", /^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/, q, "'\""]) : n.multiLineStrings ? r.push(["str", /^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/, q, "'\"`"]) : r.push(["str", /^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/, q, "\"'"]), n.verbatimStrings && t.push(["str", /^@"(?:[^"]|"")*(?:"|$)/, q]), u = n.hashComments, u && (n.cStyleComments ? (u > 1 ? r.push(["com", /^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/, q, "#"]) : r.push(["com", /^#(?:(?:define|elif|else|endif|error|ifdef|include|ifndef|line|pragma|undef|warning)\b|[^\n\r]*)/, q, "#"]), t.push(["str", /^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h|[a-z]\w*)>/, q])) : r.push(["com", /^#[^\n\r]*/, q, "#"])), n.cStyleComments && (t.push(["com", /^\/\/[^\n\r]*/, q]), t.push(["com", /^\/\*[\S\s]*?(?:\*\/|$)/, q])), n.regexLiterals && t.push(["lang-regex", /^(?:^^\.?|[!+-]|!=|!==|#|%|%=|&|&&|&&=|&=|\(|\*|\*=|\+=|,|-=|->|\/|\/=|:|::|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|[?@[^]|\^=|\^\^|\^\^=|{|\||\|=|\|\||\|\|=|~|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\s*(\/(?=[^*/])(?:[^/[\\]|\\[\S\s]|\[(?:[^\\\]]|\\[\S\s])*(?:]|$))+\/)/]), (u = n.types) && t.push(["typ", u]), n = ("" + n.keywords).replace(/^ | $/g, ""), n.length && t.push(["kwd", RegExp("^(?:" + n.replace(/[\s,]+/g, "|") + ")\\b"), q]), r.push(["pln", /^\s+/, q, " \r\n\t "]), t.push(["lit", /^@[$_a-z][\w$@]*/i, q], ["typ", /^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/, q], ["pln", /^[$_a-z][\w$@]*/i, q], ["lit", /^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i, q, "0123456789"], ["pln", /^\\[\S\s]?/, q], ["pun", /^.[^\s\w"-$'./@\\`]*/, q]), i(r, t)
    }

    function o(n, t) {
        function o(n) {
            var t, i, r;
            switch (n.nodeType) {
                case 1:
                    if (c.test(n.className)) break;
                    if ("BR" === n.nodeName) s(n), n.parentNode && n.parentNode.removeChild(n); else for (n = n.firstChild; n; n = n.nextSibling) o(n);
                    break;
                case 3:
                case 4:
                    h && (t = n.nodeValue, i = t.match(l), i && (r = t.substring(0, i.index), n.nodeValue = r, (t = t.substring(i.index + i[0].length)) && n.parentNode.insertBefore(f.createTextNode(t), n.nextSibling), s(n), r || n.parentNode.removeChild(n)))
            }
        }

        function s(n) {
            function i(n, t) {
                var e = t ? n.cloneNode(!1) : n, r = n.parentNode, f, u;
                if (r) for (r = i(r, 1), f = n.nextSibling, r.appendChild(e), u = f; u; u = f) f = u.nextSibling, r.appendChild(u);
                return e
            }

            for (; !n.nextSibling;) if (n = n.parentNode, !n) return;
            for (var n = i(n.nextSibling, 0), t; (t = n.parentNode) && t.nodeType === 1;) n = t;
            u.push(n)
        }

        var c = /(?:^|\s)nocode(?:\s|$)/, l = /\r\n?|\n/, f = n.ownerDocument, i, h, u, r, e;
        for (n.currentStyle ? i = n.currentStyle.whiteSpace : window.getComputedStyle && (i = f.defaultView.getComputedStyle(n, q).getPropertyValue("white-space")), h = i && "pre" === i.substring(0, 3), i = f.createElement("LI"); n.firstChild;) i.appendChild(n.firstChild);
        for (u = [i], r = 0; r < u.length; ++r) o(u[r]);
        t === (t | 0) && u[0].setAttribute("value", t);
        e = f.createElement("OL");
        e.className = "linenums";
        for (var a = Math.max(0, t - 1 | 0) || 0, r = 0, v = u.length; r < v; ++r) i = u[r], i.className = "L" + (r + a) % 10, i.firstChild || i.appendChild(f.createTextNode(" ")), e.appendChild(i);
        n.appendChild(e)
    }

    function n(n, t) {
        for (var i, r = t.length; --r >= 0;) i = t[r], f.hasOwnProperty(i) ? window.console && console.warn("cannot override language handler %s", i) : f[i] = n
    }

    function s(n, t) {
        return n && f.hasOwnProperty(n) || (n = /^\s*</.test(t) ? "default-markup" : "default-code"), f[n]
    }

    function h(n) {
        var g = n.g, r, u, f, i, k, c, d;
        try {
            r = b(n.h);
            u = r.a;
            n.a = u;
            n.c = r.c;
            n.d = 0;
            s(g, u)(n);
            var it = /\bMSIE\b/.test(navigator.userAgent), g = /\n/g, p = n.a, w = p.length, r = 0, l = n.c,
                rt = l.length, u = 0, t = n.e, h = t.length, n = 0;
            for (t[h] = w, i = f = 0; i < h;) t[i] !== t[i + 2] ? (t[f++] = t[i++], t[f++] = t[i++]) : i += 2;
            for (h = f, i = f = 0; i < h;) {
                for (var ut = t[i], nt = t[i + 1], o = i + 2; o + 2 <= h && t[o + 1] === nt;) o += 2;
                t[f++] = ut;
                t[f++] = nt;
                i = o
            }
            for (t.length = f; u < rt;) {
                var a = l[u + 2] || w, tt = t[n + 2] || w, o = Math.min(a, tt), e = l[u + 1], v;
                e.nodeType !== 1 && (v = p.substring(r, o)) && (it && (v = v.replace(g, "\r")), e.nodeValue = v, k = e.ownerDocument, c = k.createElement("SPAN"), c.className = t[n + 1], d = e.parentNode, d.replaceChild(c, e), c.appendChild(e), r < a && (l[u + 1] = e = k.createTextNode(p.substring(o, a)), d.insertBefore(e, c.nextSibling)));
                r = o;
                r >= a && (u += 2);
                r >= tt && (n += 2)
            }
        } catch (y) {
            "console" in window && console.log(y && y.stack ? y.stack : y)
        }
    }

    var r = ["break,continue,do,else,for,if,return,while"],
        u = [[r, "auto,case,char,const,default,double,enum,extern,float,goto,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"], "catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],
        c = [u, "alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,dynamic_cast,explicit,export,friend,inline,late_check,mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],
        l = [u, "abstract,boolean,byte,extends,final,finally,implements,import,instanceof,null,native,package,strictfp,super,synchronized,throws,transient"],
        a = [l, "as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,interface,internal,into,is,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var"],
        u = [u, "debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],
        v = [r, "and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],
        y = [r, "alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],
        r = [r, "case,done,elif,esac,eval,fi,function,in,local,set,then,until"],
        p = /^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)/,
        k = /\S/, d = t({
            keywords: [c, a, u, "caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END" + v, y, r],
            hashComments: !0,
            cStyleComments: !0,
            multiLineStrings: !0,
            regexLiterals: !0
        }), f = {};
    n(d, ["default-code"]);
    n(i([], [["pln", /^[^<?]+/], ["dec", /^<!\w[^>]*(?:>|$)/], ["com", /^<\!--[\S\s]*?(?:--\>|$)/], ["lang-", /^<\?([\S\s]+?)(?:\?>|$)/], ["lang-", /^<%([\S\s]+?)(?:%>|$)/], ["pun", /^(?:<[%?]|[%?]>)/], ["lang-", /^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i], ["lang-js", /^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i], ["lang-css", /^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i], ["lang-in.tag", /^(<\/?[a-z][^<>]*>)/i]]), ["default-markup", "htm", "html", "mxml", "xhtml", "xml", "xsl"]);
    n(i([["pln", /^\s+/, q, " \t\r\n"], ["atv", /^(?:"[^"]*"?|'[^']*'?)/, q, "\"'"]], [["tag", /^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i], ["atn", /^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i], ["lang-uq.val", /^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/], ["pun", /^[/<->]+/], ["lang-js", /^on\w+\s*=\s*"([^"]+)"/i], ["lang-js", /^on\w+\s*=\s*'([^']+)'/i], ["lang-js", /^on\w+\s*=\s*([^\s"'>]+)/i], ["lang-css", /^style\s*=\s*"([^"]+)"/i], ["lang-css", /^style\s*=\s*'([^']+)'/i], ["lang-css", /^style\s*=\s*([^\s"'>]+)/i]]), ["in.tag"]);
    n(i([], [["atv", /^[\S\s]+/]]), ["uq.val"]);
    n(t({keywords: c, hashComments: !0, cStyleComments: !0, types: p}), ["c", "cc", "cpp", "cxx", "cyc", "m"]);
    n(t({keywords: "null,true,false"}), ["json"]);
    n(t({keywords: a, hashComments: !0, cStyleComments: !0, verbatimStrings: !0, types: p}), ["cs"]);
    n(t({keywords: l, cStyleComments: !0}), ["java"]);
    n(t({keywords: r, hashComments: !0, multiLineStrings: !0}), ["bsh", "csh", "sh"]);
    n(t({keywords: v, hashComments: !0, multiLineStrings: !0, tripleQuotedStrings: !0}), ["cv", "py"]);
    n(t({
        keywords: "caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",
        hashComments: !0,
        multiLineStrings: !0,
        regexLiterals: !0
    }), ["perl", "pl", "pm"]);
    n(t({keywords: y, hashComments: !0, multiLineStrings: !0, regexLiterals: !0}), ["rb"]);
    n(t({keywords: u, cStyleComments: !0, regexLiterals: !0}), ["js"]);
    n(t({
        keywords: "all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,true,try,unless,until,when,while,yes",
        hashComments: 3,
        cStyleComments: !0,
        multilineStrings: !0,
        tripleQuotedStrings: !0,
        regexLiterals: !0
    }), ["coffee"]);
    n(i([], [["str", /^[\S\s]+/]]), ["regex"]);
    window.prettyPrintOne = function (n, t, i) {
        var r = document.createElement("PRE");
        return r.innerHTML = n, i && o(r, i), h({g: t, i: i, h: r}), r.innerHTML
    };
    window.prettyPrint = function (n) {
        function c() {
            for (var l, e, y, r, v, p, f, w = window.PR_SHOULD_USE_CONTINUATION ? t.now() + 250 : Infinity; i < u.length && t.now() < w; i++) if (l = u[i], e = l.className, e.indexOf("prettyprint") >= 0) {
                if (e = e.match(s), r = !e) {
                    for (r = l, f = void 0, v = r.firstChild; v; v = v.nextSibling) p = v.nodeType, f = p === 1 ? f ? r : v : p === 3 ? k.test(v.nodeValue) ? r : f : f;
                    r = (y = f === r ? void 0 : f) && "CODE" === y.tagName
                }
                for (r && (e = y.className.match(s)), e && (e = e[1]), r = !1, f = l.parentNode; f; f = f.parentNode) if ((f.tagName === "pre" || f.tagName === "code" || f.tagName === "xmp") && f.className && f.className.indexOf("prettyprint") >= 0) {
                    r = !0;
                    break
                }
                r || ((r = (r = l.className.match(/\blinenums\b(?::(\d+))?/)) ? r[1] && r[1].length ? +r[1] : !0 : !1) && o(l, r), a = {
                    g: e,
                    h: l,
                    i: r
                }, h(a))
            }
            i < u.length ? setTimeout(c, 250) : n && n()
        }

        for (var e, l, t, i, a, s, r = [document.getElementsByTagName("pre"), document.getElementsByTagName("code"), document.getElementsByTagName("xmp")], u = [], f = 0; f < r.length; ++f) for (e = 0, l = r[f].length; e < l; ++e) u.push(r[f][e]);
        r = q;
        t = Date;
        t.now || (t = {
            now: function () {
                return +new Date
            }
        });
        i = 0;
        s = /\blang(?:uage)?-([\w.]+)(?!\S)/;
        c()
    };
    window.PR = {
        createSimpleLexer: i,
        registerLangHandler: n,
        sourceDecorator: t,
        PR_ATTRIB_NAME: "atn",
        PR_ATTRIB_VALUE: "atv",
        PR_COMMENT: "com",
        PR_DECLARATION: "dec",
        PR_KEYWORD: "kwd",
        PR_LITERAL: "lit",
        PR_NOCODE: "nocode",
        PR_PLAIN: "pln",
        PR_PUNCTUATION: "pun",
        PR_SOURCE: "src",
        PR_STRING: "str",
        PR_TAG: "tag",
        PR_TYPE: "typ"
    }
}();
jQuery.cookie = function (n, t, i) {
    var u, r, f, e;
    return arguments.length > 1 && (t === null || typeof t != "object") ? (i = jQuery.extend({}, i), t === null && (i.expires = -1), typeof i.expires == "number" && (u = i.expires, r = i.expires = new Date, r.setDate(r.getDate() + u)), document.cookie = [encodeURIComponent(n), "=", i.raw ? String(t) : encodeURIComponent(String(t)), i.expires ? "; expires=" + i.expires.toUTCString() : "", i.path ? "; path=" + i.path : "", i.domain ? "; domain=" + i.domain : "", i.secure ? "; secure" : ""].join("")) : (i = t || {}, e = i.raw ? function (n) {
        return n
    } : decodeURIComponent, (f = new RegExp("(?:^|; )" + encodeURIComponent(n) + "=([^;]*)").exec(document.cookie)) ? e(f[1]) : null)
}, function () {
    var n = function (n, t) {
        return function () {
            return n.apply(t, arguments)
        }
    }, t = [].indexOf || function (n) {
        for (var t = 0, i = this.length; t < i; t++) if (t in this && this[t] === n) return t;
        return -1
    };
    (function (i) {
        var r;
        return i.fn.pagination = function (n) {
            return this.each(function () {
                return new r(i(this), n).render()
            })
        }, r = function () {
            function r(t, r) {
                var u;
                if (this.el = t, this.change = n(this.change, this), this.clicked = n(this.clicked, this), this.isValidPage = n(this.isValidPage, this), this.render = n(this.render, this), this.pages = n(this.pages, this), this.buildLink = n(this.buildLink, this), this.buildLi = n(this.buildLi, this), this.buildLinks = n(this.buildLinks, this), u = {
                    current_page: 1,
                    total_pages: 1,
                    next: "&gt;",
                    prev: "&lt;",
                    first: !1,
                    last: !1,
                    display_max: 8,
                    ignore_single_page: !0,
                    no_turbolink: !1
                }, this.settings = i.extend(u, r), i(document).on) i(this.el).on("click", "a", this.clicked); else i("a", this.el).live("click", this.clicked);
                this.el.data("paginationView", this)
            }

            return r.prototype.buildLinks = function () {
                var i, n, r, t, f, u;
                for (i = this.settings.current_page, n = [], this.settings.first && n.push(this.buildLi(1, this.settings.first)), this.settings.prev && n.push(this.buildLi(i - 1, this.settings.prev)), u = this.pages(), t = 0, f = u.length; t < f; t++) r = u[t], n.push(this.buildLi(r, r));
                return this.settings.next && n.push(this.buildLi(i + 1, this.settings.next)), this.settings.last && n.push(this.buildLi(this.settings.total_pages, this.settings.last)), n
            }, r.prototype.buildLi = function (n, t) {
                return t == null && (t = n), "<li>" + this.buildLink(n, t) + "<\/li>"
            }, r.prototype.buildLink = function (n, t) {
                var i;
                return t == null && (t = n), i = this.settings.no_turbolink ? " data-no-turbolink='1'" : "", "<a href='#' data-page='" + n + "'" + i + ">" + t + "<\/a>"
            }, r.prototype.pages = function () {
                var v, e, f, r, u, n, o, s, h, c, l, y, p, w, a;
                if (n = this.settings.total_pages, e = this.settings.current_page, u = [], f = this.settings.display_max, n > 10) {
                    if (u.push(1), e > f - 1 && u.push(".."), e === n) for (r = o = y = n - f; y <= n ? o <= n : o >= n; r = y <= n ? ++o : --o) u.push(r);
                    if (n - e < f - 1) for (r = s = p = n - f; p <= n ? s <= n : s >= n; r = p <= n ? ++s : --s) u.push(r); else if (e > f - 1) for (v = f / 2, r = h = w = e - v, a = e + v; w <= a ? h <= a : h >= a; r = w <= a ? ++h : --h) u.push(r); else if (e <= f - 1) for (r = c = 2; 2 <= f ? c <= f : c >= f; r = 2 <= f ? ++c : --c) u.push(r);
                    u = i.grep(u, function (n, t) {
                        return i.inArray(n, u) === t
                    });
                    t.call(u, n) < 0 && (n - e < f - 1 || u.push(".."), u.push(n))
                } else for (r = l = 1; 1 <= n ? l <= n : l >= n; r = 1 <= n ? ++l : --l) u.push(r);
                return u
            }, r.prototype.render = function () {
                var n, u, t, f, r;
                if (this.el.html(""), this.settings.total_pages !== 1 || !this.settings.ignore_single_page) {
                    for (n = ["<div class='jquery-bootstrap-pagination'>"], n.push("<ul class='pagination'>"), r = this.buildLinks(), t = 0, f = r.length; t < f; t++) u = r[t], n.push(u);
                    return n.push("<\/ul>"), n.push("<\/div>"), this.el.html(n.join("\n")), i("[data-page=" + this.settings.current_page + "]", this.el).closest("li").addClass("active"), i("[data-page='..']", this.el).closest("li").addClass("disabled"), i("[data-page='0']", this.el).closest("li").addClass("disabled"), i("[data-page='" + (this.settings.total_pages + 1) + "']", this.el).closest("li").addClass("disabled"), this.settings.current_page === 1 && this.settings.first && i("li:first", this.el).removeClass("active").addClass("disabled"), this.settings.current_page === this.settings.total_pages && this.settings.last ? i("li:last", this.el).removeClass("active").addClass("disabled") : void 0
                }
            }, r.prototype.isValidPage = function (n) {
                return n > 0 && n !== this.settings.current_page && n <= this.settings.total_pages
            }, r.prototype.clicked = function (n) {
                n.stopPropagation();
                var t;
                if (t = parseInt(i(n.target).attr("data-page")), this.isValidPage(t)) return this.settings.callback != null && this.settings.callback(n, t), this.change(t)
            }, r.prototype.change = function (n) {
                if (n = parseInt(n), this.isValidPage(n)) return this.settings.current_page = n, this.render()
            }, r
        }()
    })(jQuery)
}.call(this), function () {
    "use strict";

    function n(n) {
        function s(s, h) {
            var rt, ut, p = s == window, l = h && h.message !== undefined ? h.message : undefined, g, k, d, tt, nt, w,
                b, it, ft, et, at;
            if (h = n.extend({}, n.blockUI.defaults, h || {}), !h.ignoreIfBlocked || !n(s).data("blockUI.isBlocked")) {
                if (h.overlayCSS = n.extend({}, n.blockUI.defaults.overlayCSS, h.overlayCSS || {}), rt = n.extend({}, n.blockUI.defaults.css, h.css || {}), h.onOverlayClick && (h.overlayCSS.cursor = "pointer"), ut = n.extend({}, n.blockUI.defaults.themedCSS, h.themedCSS || {}), l = l === undefined ? h.message : l, p && t && e(window, {fadeOut: 0}), l && typeof l != "string" && (l.parentNode || l.jquery) && (g = l.jquery ? l[0] : l, k = {}, n(s).data("blockUI.history", k), k.el = g, k.parent = g.parentNode, k.display = g.style.display, k.position = g.style.position, k.parent && k.parent.removeChild(g)), n(s).data("blockUI.onUnblock", h.onUnblock), d = h.baseZ, tt = f || h.forceIframe ? n('<iframe class="blockUI" style="z-index:' + d++ + ';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="' + h.iframeSrc + '"><\/iframe>') : n('<div class="blockUI" style="display:none"><\/div>'), nt = h.theme ? n('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:' + d++ + ';display:none"><\/div>') : n('<div class="blockUI blockOverlay" style="z-index:' + d++ + ';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"><\/div>'), h.theme && p ? (b = '<div class="blockUI ' + h.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:' + (d + 10) + ';display:none;position:fixed">', h.title && (b += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">' + (h.title || "&nbsp;") + "<\/div>"), b += '<div class="ui-widget-content ui-dialog-content"><\/div>', b += "<\/div>") : h.theme ? (b = '<div class="blockUI ' + h.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:' + (d + 10) + ';display:none;position:absolute">', h.title && (b += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">' + (h.title || "&nbsp;") + "<\/div>"), b += '<div class="ui-widget-content ui-dialog-content"><\/div>', b += "<\/div>") : b = p ? '<div class="blockUI ' + h.blockMsgClass + ' blockPage" style="z-index:' + (d + 10) + ';display:none;position:fixed"><\/div>' : '<div class="blockUI ' + h.blockMsgClass + ' blockElement" style="z-index:' + (d + 10) + ';display:none;position:absolute"><\/div>', w = n(b), l && (h.theme ? (w.css(ut), w.addClass("ui-widget-content")) : w.css(rt)), h.theme || nt.css(h.overlayCSS), nt.css("position", p ? "fixed" : "absolute"), (f || h.forceIframe) && tt.css("opacity", 0), it = [tt, nt, w], ft = p ? n("body") : n(s), n.each(it, function () {
                    this.appendTo(ft)
                }), h.theme && h.draggable && n.fn.draggable && w.draggable({
                    handle: ".ui-dialog-titlebar",
                    cancel: "li"
                }), et = v && (!n.support.boxModel || n("object,embed", p ? null : s).length > 0), o || et) {
                    if (p && h.allowBodyStretch && n.support.boxModel && n("html,body").css("height", "100%"), (o || !n.support.boxModel) && !p) var ot = r(s, "borderTopWidth"),
                        st = r(s, "borderLeftWidth"), ht = ot ? "(0 - " + ot + ")" : 0,
                        ct = st ? "(0 - " + st + ")" : 0;
                    n.each(it, function (n, t) {
                        var i = t[0].style, r, u;
                        i.position = "absolute";
                        n < 2 ? (p ? i.setExpression("height", "Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:" + h.quirksmodeOffsetHack + ') + "px"') : i.setExpression("height", 'this.parentNode.offsetHeight + "px"'), p ? i.setExpression("width", 'jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"') : i.setExpression("width", 'this.parentNode.offsetWidth + "px"'), ct && i.setExpression("left", ct), ht && i.setExpression("top", ht)) : h.centerY ? (p && i.setExpression("top", '(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"'), i.marginTop = 0) : !h.centerY && p && (r = h.css && h.css.top ? parseInt(h.css.top, 10) : 0, u = "((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + " + r + ') + "px"', i.setExpression("top", u))
                    })
                }
                if (l && (h.theme ? w.find(".ui-widget-content").append(l) : w.append(l), (l.jquery || l.nodeType) && n(l).show()), (f || h.forceIframe) && h.showOverlay && tt.show(), h.fadeIn) {
                    var lt = h.onBlock ? h.onBlock : u, vt = h.showOverlay && !l ? lt : u, yt = l ? lt : u;
                    h.showOverlay && nt._fadeIn(h.fadeIn, vt);
                    l && w._fadeIn(h.fadeIn, yt)
                } else h.showOverlay && nt.show(), l && w.show(), h.onBlock && h.onBlock();
                c(1, s, h);
                p ? (t = w[0], i = n(":input:enabled:visible", t), h.focusInput && setTimeout(a, 20)) : y(w[0], h.centerX, h.centerY);
                h.timeout && (at = setTimeout(function () {
                    p ? n.unblockUI(h) : n(s).unblock(h)
                }, h.timeout), n(s).data("blockUI.timeout", at))
            }
        }

        function e(r, u) {
            var o = r == window, e = n(r), s = e.data("blockUI.history"), l = e.data("blockUI.timeout"), f;
            l && (clearTimeout(l), e.removeData("blockUI.timeout"));
            u = n.extend({}, n.blockUI.defaults, u || {});
            c(0, r, u);
            u.onUnblock === null && (u.onUnblock = e.data("blockUI.onUnblock"), e.removeData("blockUI.onUnblock"));
            f = o ? n("body").children().filter(".blockUI").add("body > .blockUI") : e.find(">.blockUI");
            u.cursorReset && (f.length > 1 && (f[1].style.cursor = u.cursorReset), f.length > 2 && (f[2].style.cursor = u.cursorReset));
            o && (t = i = null);
            u.fadeOut ? (f.fadeOut(u.fadeOut), setTimeout(function () {
                h(f, s, u, r)
            }, u.fadeOut)) : h(f, s, u, r)
        }

        function h(t, i, r, u) {
            var e = n(u);
            if (t.each(function () {
                this.parentNode && this.parentNode.removeChild(this)
            }), i && i.el && (i.el.style.display = i.display, i.el.style.position = i.position, i.parent && i.parent.appendChild(i.el), e.removeData("blockUI.history")), e.data("blockUI.static") && e.css("position", "static"), typeof r.onUnblock == "function") r.onUnblock(u, r);
            var f = n(document.body), o = f.width(), s = f[0].style.width;
            f.width(o - 1).width(o);
            f[0].style.width = s
        }

        function c(i, r, u) {
            var e = r == window, o = n(r), f;
            (i || (!e || t) && (e || o.data("blockUI.isBlocked"))) && (o.data("blockUI.isBlocked", i), u.bindEvents && (!i || u.showOverlay)) && (f = "mousedown mouseup keydown keypress keyup touchstart touchend touchmove", i ? n(document).bind(f, u, l) : n(document).unbind(f, l))
        }

        function l(r) {
            var u, f;
            if (r.keyCode && r.keyCode == 9 && t && r.data.constrainTabKey) {
                var e = i, s = !r.shiftKey && r.target === e[e.length - 1], o = r.shiftKey && r.target === e[0];
                if (s || o) return setTimeout(function () {
                    a(o)
                }, 10), !1
            }
            return (u = r.data, f = n(r.target), f.hasClass("blockOverlay") && u.onOverlayClick && u.onOverlayClick(), f.parents("div." + u.blockMsgClass).length > 0) ? !0 : f.parents().children().filter("div.blockUI").length === 0
        }

        function a(n) {
            if (i) {
                var t = i[n === !0 ? i.length - 1 : 0];
                t && t.focus()
            }
        }

        function y(n, t, i) {
            var u = n.parentNode, f = n.style, e = (u.offsetWidth - n.offsetWidth) / 2 - r(u, "borderLeftWidth"),
                o = (u.offsetHeight - n.offsetHeight) / 2 - r(u, "borderTopWidth");
            t && (f.left = e > 0 ? e + "px" : "0");
            i && (f.top = o > 0 ? o + "px" : "0")
        }

        function r(t, i) {
            return parseInt(n.css(t, i), 10) || 0
        }

        var t, i;
        n.fn._fadeIn = n.fn.fadeIn;
        var u = n.noop || function () {
            }, f = /MSIE/.test(navigator.userAgent),
            o = /MSIE 6.0/.test(navigator.userAgent) && !/MSIE 8.0/.test(navigator.userAgent),
            p = document.documentMode || 0, v = n.isFunction(document.createElement("div").style.setExpression);
        n.blockUI = function (n) {
            s(window, n)
        };
        n.unblockUI = function (n) {
            e(window, n)
        };
        n.growlUI = function (t, i, r, u) {
            var f = n('<div class="growlUI"><\/div>');
            t && f.append("<h1>" + t + "<\/h1>");
            i && f.append("<h2>" + i + "<\/h2>");
            r === undefined && (r = 3e3);
            n.blockUI({
                message: f,
                fadeIn: 700,
                fadeOut: 1e3,
                centerY: !1,
                timeout: r,
                showOverlay: !1,
                onUnblock: u,
                css: n.blockUI.defaults.growlCSS
            })
        };
        n.fn.block = function (t) {
            var i = n.extend({}, n.blockUI.defaults, t || {});
            return this.each(function () {
                var t = n(this);
                i.ignoreIfBlocked && t.data("blockUI.isBlocked") || t.unblock({fadeOut: 0})
            }), this.each(function () {
                n.css(this, "position") == "static" && (this.style.position = "relative", n(this).data("blockUI.static", !0));
                this.style.zoom = 1;
                s(this, t)
            })
        };
        n.fn.unblock = function (n) {
            return this.each(function () {
                e(this, n)
            })
        };
        n.blockUI.version = 2.56;
        n.blockUI.defaults = {
            message: "<h1>Please wait...<\/h1>",
            title: null,
            draggable: !0,
            theme: !1,
            css: {
                padding: 0,
                margin: 0,
                width: "30%",
                top: "40%",
                left: "35%",
                textAlign: "center",
                color: "#000",
                border: "3px solid #aaa",
                backgroundColor: "#fff",
                cursor: "wait"
            },
            themedCSS: {width: "30%", top: "40%", left: "35%"},
            overlayCSS: {backgroundColor: "#000", opacity: .6, cursor: "wait"},
            cursorReset: "default",
            growlCSS: {
                width: "350px",
                top: "10px",
                left: "",
                right: "10px",
                border: "none",
                padding: "5px",
                opacity: .6,
                cursor: "default",
                color: "#fff",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                "border-radius": "10px"
            },
            iframeSrc: /^https/i.test(window.location.href || "") ? "javascript:false" : "about:blank",
            forceIframe: !1,
            baseZ: 1e3,
            centerX: !0,
            centerY: !0,
            allowBodyStretch: !0,
            bindEvents: !0,
            constrainTabKey: !0,
            fadeIn: 200,
            fadeOut: 400,
            timeout: 0,
            showOverlay: !0,
            focusInput: !0,
            onBlock: null,
            onUnblock: null,
            onOverlayClick: null,
            quirksmodeOffsetHack: 4,
            blockMsgClass: "blockMsg",
            ignoreIfBlocked: !1
        };
        t = null;
        i = []
    }

    typeof define == "function" && define.amd && define.amd.jQuery ? define(["jquery"], n) : n(jQuery)
}(), function (n, t) {
    "object" == typeof exports ? module.exports = t(require("./punycode"), require("./IPv6"), require("./SecondLevelDomains")) : "function" == typeof define && define.amd ? define(["./punycode", "./IPv6", "./SecondLevelDomains"], t) : n.URI = t(n.punycode, n.IPv6, n.SecondLevelDomains, n)
}(this, function (n, t, i, r) {
    function u(n, t) {
        return (this instanceof u) ? (void 0 === n && (n = "undefined" != typeof location ? location.href + "" : ""), this.href(n), void 0 !== t ? this.absoluteTo(t) : this) : new u(n, t)
    }

    function l(n) {
        return n.replace(/([.*+?^=!:${}()|[\]\/\\])/g, "\\$1")
    }

    function v(n) {
        return void 0 === n ? "Undefined" : String(Object.prototype.toString.call(n)).slice(8, -1)
    }

    function e(n) {
        return "Array" === v(n)
    }

    function a(n, t) {
        var i, r, u;
        if (e(t)) {
            for (i = 0, r = t.length; i < r; i++) if (!a(n, t[i])) return !1;
            return !0
        }
        for (u = v(t), i = 0, r = n.length; i < r; i++) if ("RegExp" === u) {
            if ("string" == typeof n[i] && n[i].match(t)) return !0
        } else if (n[i] === t) return !0;
        return !1
    }

    function p(n, t) {
        if (!e(n) || !e(t) || n.length !== t.length) return !1;
        n.sort();
        t.sort();
        for (var i = 0, r = n.length; i < r; i++) if (n[i] !== t[i]) return !1;
        return !0
    }

    function b(n) {
        return escape(n)
    }

    function y(n) {
        return encodeURIComponent(n).replace(/[!'()*]/g, b).replace(/\*/g, "%2A")
    }

    var k = r && r.URI, f, h, s, o, c, w;
    u.version = "1.13.2";
    f = u.prototype;
    h = Object.prototype.hasOwnProperty;
    u._parts = function () {
        return {
            protocol: null,
            username: null,
            password: null,
            hostname: null,
            urn: null,
            port: null,
            path: null,
            query: null,
            fragment: null,
            duplicateQueryParameters: u.duplicateQueryParameters,
            escapeQuerySpace: u.escapeQuerySpace
        }
    };
    u.duplicateQueryParameters = !1;
    u.escapeQuerySpace = !0;
    u.protocol_expression = /^[a-z][a-z0-9.+-]*$/i;
    u.idn_expression = /[^a-z0-9\.-]/i;
    u.punycode_expression = /(xn--)/i;
    u.ip4_expression = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    u.ip6_expression = /^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/;
    u.find_uri_expression = /\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?\u00ab\u00bb\u201c\u201d\u2018\u2019]))/ig;
    u.findUri = {
        start: /\b(?:([a-z][a-z0-9.+-]*:\/\/)|www\.)/gi,
        end: /[\s\r\n]|$/,
        trim: /[`!()\[\]{};:'".,<>?\u00ab\u00bb\u201c\u201d\u201e\u2018\u2019]+$/
    };
    u.defaultPorts = {http: "80", https: "443", ftp: "21", gopher: "70", ws: "80", wss: "443"};
    u.invalid_hostname_characters = /[^a-zA-Z0-9\.-]/;
    u.domAttributes = {
        a: "href",
        blockquote: "cite",
        link: "href",
        base: "href",
        script: "src",
        form: "action",
        img: "src",
        area: "href",
        iframe: "src",
        embed: "src",
        source: "src",
        track: "src",
        input: "src"
    };
    u.getDomAttribute = function (n) {
        if (n && n.nodeName) {
            var t = n.nodeName.toLowerCase();
            return "input" === t && "image" !== n.type ? void 0 : u.domAttributes[t]
        }
    };
    u.encode = y;
    u.decode = decodeURIComponent;
    u.iso8859 = function () {
        u.encode = escape;
        u.decode = unescape
    };
    u.unicode = function () {
        u.encode = y;
        u.decode = decodeURIComponent
    };
    u.characters = {
        pathname: {
            encode: {
                expression: /%(24|26|2B|2C|3B|3D|3A|40)/ig,
                map: {"%24": "$", "%26": "&", "%2B": "+", "%2C": ",", "%3B": ";", "%3D": "=", "%3A": ":", "%40": "@"}
            }, decode: {expression: /[\/\?#]/g, map: {"/": "%2F", "?": "%3F", "#": "%23"}}
        },
        reserved: {
            encode: {
                expression: /%(21|23|24|26|27|28|29|2A|2B|2C|2F|3A|3B|3D|3F|40|5B|5D)/ig,
                map: {
                    "%3A": ":",
                    "%2F": "/",
                    "%3F": "?",
                    "%23": "#",
                    "%5B": "[",
                    "%5D": "]",
                    "%40": "@",
                    "%21": "!",
                    "%24": "$",
                    "%26": "&",
                    "%27": "'",
                    "%28": "(",
                    "%29": ")",
                    "%2A": "*",
                    "%2B": "+",
                    "%2C": ",",
                    "%3B": ";",
                    "%3D": "="
                }
            }
        }
    };
    u.encodeQuery = function (n, t) {
        var i = u.encode(n + "");
        return void 0 === t && (t = u.escapeQuerySpace), t ? i.replace(/%20/g, "+") : i
    };
    u.decodeQuery = function (n, t) {
        n += "";
        void 0 === t && (t = u.escapeQuerySpace);
        try {
            return u.decode(t ? n.replace(/\+/g, "%20") : n)
        } catch (i) {
            return n
        }
    };
    u.recodePath = function (n) {
        n = (n + "").split("/");
        for (var t = 0, i = n.length; t < i; t++) n[t] = u.encodePathSegment(u.decode(n[t]));
        return n.join("/")
    };
    u.decodePath = function (n) {
        n = (n + "").split("/");
        for (var t = 0, i = n.length; t < i; t++) n[t] = u.decodePathSegment(n[t]);
        return n.join("/")
    };
    s = {encode: "encode", decode: "decode"};
    c = function (n, t) {
        return function (i) {
            return u[t](i + "").replace(u.characters[n][t].expression, function (i) {
                return u.characters[n][t].map[i]
            })
        }
    };
    for (o in s) u[o + "PathSegment"] = c("pathname", s[o]);
    u.encodeReserved = c("reserved", "encode");
    u.parse = function (n, t) {
        var i;
        return t || (t = {}), i = n.indexOf("#"), -1 < i && (t.fragment = n.substring(i + 1) || null, n = n.substring(0, i)), i = n.indexOf("?"), -1 < i && (t.query = n.substring(i + 1) || null, n = n.substring(0, i)), "//" === n.substring(0, 2) ? (t.protocol = null, n = n.substring(2), n = u.parseAuthority(n, t)) : (i = n.indexOf(":"), -1 < i && (t.protocol = n.substring(0, i) || null, t.protocol && !t.protocol.match(u.protocol_expression) ? t.protocol = void 0 : "file" === t.protocol ? n = n.substring(i + 3) : "//" === n.substring(i + 1, i + 3) ? (n = n.substring(i + 3), n = u.parseAuthority(n, t)) : (n = n.substring(i + 1), t.urn = !0))), t.path = n, t
    };
    u.parseHost = function (n, t) {
        var i = n.indexOf("/"), r;
        return -1 === i && (i = n.length), "[" === n.charAt(0) ? (r = n.indexOf("]"), t.hostname = n.substring(1, r) || null, t.port = n.substring(r + 2, i) || null, "/" === t.port && (t.port = null)) : n.indexOf(":") !== n.lastIndexOf(":") ? (t.hostname = n.substring(0, i) || null, t.port = null) : (r = n.substring(0, i).split(":"), t.hostname = r[0] || null, t.port = r[1] || null), t.hostname && "/" !== n.substring(i).charAt(0) && (i++, n = "/" + n), n.substring(i) || "/"
    };
    u.parseAuthority = function (n, t) {
        return n = u.parseUserinfo(n, t), u.parseHost(n, t)
    };
    u.parseUserinfo = function (n, t) {
        var i = n.indexOf("/"), r = -1 < i ? n.lastIndexOf("@", i) : n.indexOf("@");
        return -1 < r && (-1 === i || r < i) ? (i = n.substring(0, r).split(":"), t.username = i[0] ? u.decode(i[0]) : null, i.shift(), t.password = i[0] ? u.decode(i.join(":")) : null, n = n.substring(r + 1)) : (t.username = null, t.password = null), n
    };
    u.parseQuery = function (n, t) {
        if (!n) return {};
        if (n = n.replace(/&+/g, "&").replace(/^\?*&*|&+$/g, ""), !n) return {};
        for (var i = {}, o = n.split("&"), s = o.length, r, f, e = 0; e < s; e++) r = o[e].split("="), f = u.decodeQuery(r.shift(), t), r = r.length ? u.decodeQuery(r.join("="), t) : null, i[f] ? ("string" == typeof i[f] && (i[f] = [i[f]]), i[f].push(r)) : i[f] = r;
        return i
    };
    u.build = function (n) {
        var t = "";
        return n.protocol && (t += n.protocol + ":"), !n.urn && (t || n.hostname) && (t += "//"), t += u.buildAuthority(n) || "", "string" == typeof n.path && ("/" !== n.path.charAt(0) && "string" == typeof n.hostname && (t += "/"), t += n.path), "string" == typeof n.query && n.query && (t += "?" + n.query), "string" == typeof n.fragment && n.fragment && (t += "#" + n.fragment), t
    };
    u.buildHost = function (n) {
        var t = "";
        if (n.hostname) t = u.ip6_expression.test(n.hostname) ? t + ("[" + n.hostname + "]") : t + n.hostname; else return "";
        return n.port && (t += ":" + n.port), t
    };
    u.buildAuthority = function (n) {
        return u.buildUserinfo(n) + u.buildHost(n)
    };
    u.buildUserinfo = function (n) {
        var t = "";
        return n.username && (t += u.encode(n.username), n.password && (t += ":" + u.encode(n.password)), t += "@"), t
    };
    u.buildQuery = function (n, t, i) {
        var o = "", s, r, f, c;
        for (r in n) if (h.call(n, r) && r) if (e(n[r])) for (s = {}, f = 0, c = n[r].length; f < c; f++) void 0 !== n[r][f] && void 0 === s[n[r][f] + ""] && (o += "&" + u.buildQueryParameter(r, n[r][f], i), !0 !== t && (s[n[r][f] + ""] = !0)); else void 0 !== n[r] && (o += "&" + u.buildQueryParameter(r, n[r], i));
        return o.substring(1)
    };
    u.buildQueryParameter = function (n, t, i) {
        return u.encodeQuery(n, i) + (null !== t ? "=" + u.encodeQuery(t, i) : "")
    };
    u.addQuery = function (n, t, i) {
        if ("object" == typeof t) for (var r in t) h.call(t, r) && u.addQuery(n, r, t[r]); else if ("string" == typeof t) void 0 === n[t] ? n[t] = i : ("string" == typeof n[t] && (n[t] = [n[t]]), e(i) || (i = [i]), n[t] = n[t].concat(i)); else throw new TypeError("URI.addQuery() accepts an object, string as the name parameter");
    };
    u.removeQuery = function (n, t, i) {
        var r, s, f, o;
        if (e(t)) for (i = 0, r = t.length; i < r; i++) n[t[i]] = void 0; else if ("object" == typeof t) for (r in t) h.call(t, r) && u.removeQuery(n, r, t[r]); else if ("string" == typeof t) if (void 0 !== i) {
            if (n[t] === i) n[t] = void 0; else if (e(n[t])) {
                if (r = n[t], s = {}, e(i)) for (f = 0, o = i.length; f < o; f++) s[i[f]] = !0; else s[i] = !0;
                for (f = 0, o = r.length; f < o; f++) void 0 !== s[r[f]] && (r.splice(f, 1), o--, f--);
                n[t] = r
            }
        } else n[t] = void 0; else throw new TypeError("URI.addQuery() accepts an object, string as the first parameter");
    };
    u.hasQuery = function (n, t, i, r) {
        if ("object" == typeof t) {
            for (var f in t) if (h.call(t, f) && !u.hasQuery(n, f, t[f])) return !1;
            return !0
        }
        if ("string" != typeof t) throw new TypeError("URI.hasQuery() accepts an object, string as the name parameter");
        switch (v(i)) {
            case"Undefined":
                return t in n;
            case"Boolean":
                return n = Boolean(e(n[t]) ? n[t].length : n[t]), i === n;
            case"Function":
                return !!i(n[t], t, n);
            case"Array":
                return e(n[t]) ? (r ? a : p)(n[t], i) : !1;
            case"RegExp":
                return e(n[t]) ? r ? a(n[t], i) : !1 : Boolean(n[t] && n[t].match(i));
            case"Number":
                i = String(i);
            case"String":
                return e(n[t]) ? r ? a(n[t], i) : !1 : n[t] === i;
            default:
                throw new TypeError("URI.hasQuery() accepts undefined, boolean, string, number, RegExp, Function as the value parameter");
        }
    };
    u.commonPath = function (n, t) {
        for (var r = Math.min(n.length, t.length), i = 0; i < r; i++) if (n.charAt(i) !== t.charAt(i)) {
            i--;
            break
        }
        return 1 > i ? n.charAt(0) === t.charAt(0) && "/" === n.charAt(0) ? "/" : "" : (("/" !== n.charAt(i) || "/" !== t.charAt(i)) && (i = n.substring(0, i).lastIndexOf("/")), n.substring(0, i + 1))
    };
    u.withinString = function (n, t, i) {
        var r, f, e;
        i || (i = {});
        var o = i.start || u.findUri.start, s = i.end || u.findUri.end, h = i.trim || u.findUri.trim;
        for (o.lastIndex = 0; ;) {
            if (r = o.exec(n), !r) break;
            (r = r.index, i.ignoreHtml && (f = n.slice(Math.max(r - 3, 0), r), f && /[a-z0-9-]=["']?$/i.test(f))) || (f = r + n.slice(r).search(s), e = n.slice(r, f).replace(h, ""), i.ignore && i.ignore.test(e) || (f = r + e.length, e = t(e, r, f, n), n = n.slice(0, r) + e + n.slice(f), o.lastIndex = r + e.length))
        }
        return o.lastIndex = 0, n
    };
    u.ensureValidHostname = function (t) {
        if (t.match(u.invalid_hostname_characters)) {
            if (!n) throw new TypeError('Hostname "' + t + '" contains characters other than [A-Z0-9.-] and Punycode.js is not available');
            if (n.toASCII(t).match(u.invalid_hostname_characters)) throw new TypeError('Hostname "' + t + '" contains characters other than [A-Z0-9.-]');
        }
    };
    u.noConflict = function (n) {
        return n ? (n = {URI: this.noConflict()}, r.URITemplate && "function" == typeof r.URITemplate.noConflict && (n.URITemplate = r.URITemplate.noConflict()), r.IPv6 && "function" == typeof r.IPv6.noConflict && (n.IPv6 = r.IPv6.noConflict()), r.SecondLevelDomains && "function" == typeof r.SecondLevelDomains.noConflict && (n.SecondLevelDomains = r.SecondLevelDomains.noConflict()), n) : (r.URI === this && (r.URI = k), this)
    };
    f.build = function (n) {
        return !0 === n ? this._deferred_build = !0 : (void 0 === n || this._deferred_build) && (this._string = u.build(this._parts), this._deferred_build = !1), this
    };
    f.clone = function () {
        return new u(this)
    };
    f.valueOf = f.toString = function () {
        return this.build(!1)._string
    };
    s = {protocol: "protocol", username: "username", password: "password", hostname: "hostname", port: "port"};
    c = function (n) {
        return function (t, i) {
            return void 0 === t ? this._parts[n] || "" : (this._parts[n] = t || null, this.build(!i), this)
        }
    };
    for (o in s) f[o] = c(s[o]);
    s = {query: "?", fragment: "#"};
    c = function (n, t) {
        return function (i, r) {
            return void 0 === i ? this._parts[n] || "" : (null !== i && (i += "", i.charAt(0) === t && (i = i.substring(1))), this._parts[n] = i, this.build(!r), this)
        }
    };
    for (o in s) f[o] = c(o, s[o]);
    s = {search: ["?", "query"], hash: ["#", "fragment"]};
    c = function (n, t) {
        return function (i, r) {
            var u = this[n](i, r);
            return "string" == typeof u && u.length ? t + u : u
        }
    };
    for (o in s) f[o] = c(s[o][1], s[o][0]);
    f.pathname = function (n, t) {
        if (void 0 === n || !0 === n) {
            var i = this._parts.path || (this._parts.hostname ? "/" : "");
            return n ? u.decodePath(i) : i
        }
        return this._parts.path = n ? u.recodePath(n) : "/", this.build(!t), this
    };
    f.path = f.pathname;
    f.href = function (n, t) {
        var f, i, r;
        if (void 0 === n) return this.toString();
        if (this._string = "", this._parts = u._parts(), i = n instanceof u, r = "object" == typeof n && (n.hostname || n.path || n.pathname), n.nodeName && (r = u.getDomAttribute(n), n = n[r] || "", r = !1), !i && r && void 0 !== n.pathname && (n = n.toString()), "string" == typeof n) this._parts = u.parse(n, this._parts); else if (i || r) for (f in i = i ? n._parts : n, i) h.call(this._parts, f) && (this._parts[f] = i[f]); else throw new TypeError("invalid input");
        return this.build(!t), this
    };
    f.is = function (n) {
        var r = !1, f = !1, e = !1, t = !1, s = !1, h = !1, c = !1, o = !this._parts.urn;
        this._parts.hostname && (o = !1, f = u.ip4_expression.test(this._parts.hostname), e = u.ip6_expression.test(this._parts.hostname), r = f || e, s = (t = !r) && i && i.has(this._parts.hostname), h = t && u.idn_expression.test(this._parts.hostname), c = t && u.punycode_expression.test(this._parts.hostname));
        switch (n.toLowerCase()) {
            case"relative":
                return o;
            case"absolute":
                return !o;
            case"domain":
            case"name":
                return t;
            case"sld":
                return s;
            case"ip":
                return r;
            case"ip4":
            case"ipv4":
            case"inet4":
                return f;
            case"ip6":
            case"ipv6":
            case"inet6":
                return e;
            case"idn":
                return h;
            case"url":
                return !this._parts.urn;
            case"urn":
                return !!this._parts.urn;
            case"punycode":
                return c
        }
        return null
    };
    var d = f.protocol, g = f.port, nt = f.hostname;
    return f.protocol = function (n, t) {
        if (void 0 !== n && n && (n = n.replace(/:(\/\/)?$/, ""), !n.match(u.protocol_expression))) throw new TypeError('Protocol "' + n + "\" contains characters other than [A-Z0-9.+-] or doesn't start with [A-Z]");
        return d.call(this, n, t)
    }, f.scheme = f.protocol, f.port = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 !== n && (0 === n && (n = null), n && (n += "", ":" === n.charAt(0) && (n = n.substring(1)), n.match(/[^0-9]/)))) throw new TypeError('Port "' + n + '" contains characters other than [0-9]');
        return g.call(this, n, t)
    }, f.hostname = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 !== n) {
            var i = {};
            u.parseHost(n, i);
            n = i.hostname
        }
        return nt.call(this, n, t)
    }, f.host = function (n, t) {
        return this._parts.urn ? void 0 === n ? "" : this : void 0 === n ? this._parts.hostname ? u.buildHost(this._parts) : "" : (u.parseHost(n, this._parts), this.build(!t), this)
    }, f.authority = function (n, t) {
        return this._parts.urn ? void 0 === n ? "" : this : void 0 === n ? this._parts.hostname ? u.buildAuthority(this._parts) : "" : (u.parseAuthority(n, this._parts), this.build(!t), this)
    }, f.userinfo = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 === n) {
            if (!this._parts.username) return "";
            var i = u.buildUserinfo(this._parts);
            return i.substring(0, i.length - 1)
        }
        return "@" !== n[n.length - 1] && (n += "@"), u.parseUserinfo(n, this._parts), this.build(!t), this
    }, f.resource = function (n, t) {
        var i;
        return void 0 === n ? this.path() + this.search() + this.hash() : (i = u.parse(n), this._parts.path = i.path, this._parts.query = i.query, this._parts.fragment = i.fragment, this.build(!t), this)
    }, f.subdomain = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 === n) {
            if (!this._parts.hostname || this.is("IP")) return "";
            var i = this._parts.hostname.length - this.domain().length - 1;
            return this._parts.hostname.substring(0, i) || ""
        }
        return i = this._parts.hostname.length - this.domain().length, i = this._parts.hostname.substring(0, i), i = new RegExp("^" + l(i)), n && "." !== n.charAt(n.length - 1) && (n += "."), n && u.ensureValidHostname(n), this._parts.hostname = this._parts.hostname.replace(i, n), this.build(!t), this
    }, f.domain = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if ("boolean" == typeof n && (t = n, n = void 0), void 0 === n) {
            if (!this._parts.hostname || this.is("IP")) return "";
            var i = this._parts.hostname.match(/\./g);
            return i && 2 > i.length ? this._parts.hostname : (i = this._parts.hostname.length - this.tld(t).length - 1, i = this._parts.hostname.lastIndexOf(".", i - 1) + 1, this._parts.hostname.substring(i) || "")
        }
        if (!n) throw new TypeError("cannot set domain empty");
        return u.ensureValidHostname(n), !this._parts.hostname || this.is("IP") ? this._parts.hostname = n : (i = new RegExp(l(this.domain()) + "$"), this._parts.hostname = this._parts.hostname.replace(i, n)), this.build(!t), this
    }, f.tld = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if ("boolean" == typeof n && (t = n, n = void 0), void 0 === n) {
            if (!this._parts.hostname || this.is("IP")) return "";
            var r = this._parts.hostname.lastIndexOf("."), r = this._parts.hostname.substring(r + 1);
            return !0 !== t && i && i.list[r.toLowerCase()] ? i.get(this._parts.hostname) || r : r
        }
        if (n) if (n.match(/[^a-zA-Z0-9-]/)) if (i && i.is(n)) r = new RegExp(l(this.tld()) + "$"), this._parts.hostname = this._parts.hostname.replace(r, n); else throw new TypeError('TLD "' + n + '" contains characters other than [A-Z0-9]'); else {
            if (!this._parts.hostname || this.is("IP")) throw new ReferenceError("cannot set TLD on non-domain host");
            r = new RegExp(l(this.tld()) + "$");
            this._parts.hostname = this._parts.hostname.replace(r, n)
        } else throw new TypeError("cannot set TLD empty");
        return this.build(!t), this
    }, f.directory = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 === n || !0 === n) {
            if (!this._parts.path && !this._parts.hostname) return "";
            if ("/" === this._parts.path) return "/";
            var i = this._parts.path.length - this.filename().length - 1,
                i = this._parts.path.substring(0, i) || (this._parts.hostname ? "/" : "");
            return n ? u.decodePath(i) : i
        }
        return i = this._parts.path.length - this.filename().length, i = this._parts.path.substring(0, i), i = new RegExp("^" + l(i)), this.is("relative") || (n || (n = "/"), "/" !== n.charAt(0) && (n = "/" + n)), n && "/" !== n.charAt(n.length - 1) && (n += "/"), n = u.recodePath(n), this._parts.path = this._parts.path.replace(i, n), this.build(!t), this
    }, f.filename = function (n, t) {
        var i, r;
        return this._parts.urn ? void 0 === n ? "" : this : void 0 === n || !0 === n ? !this._parts.path || "/" === this._parts.path ? "" : (i = this._parts.path.lastIndexOf("/"), i = this._parts.path.substring(i + 1), n ? u.decodePathSegment(i) : i) : (i = !1, "/" === n.charAt(0) && (n = n.substring(1)), n.match(/\.?\//) && (i = !0), r = new RegExp(l(this.filename()) + "$"), n = u.recodePath(n), this._parts.path = this._parts.path.replace(r, n), i ? this.normalizePath(t) : this.build(!t), this)
    }, f.suffix = function (n, t) {
        if (this._parts.urn) return void 0 === n ? "" : this;
        if (void 0 === n || !0 === n) {
            if (!this._parts.path || "/" === this._parts.path) return "";
            var i = this.filename(), r = i.lastIndexOf(".");
            return -1 === r ? "" : (i = i.substring(r + 1), i = /^[a-z0-9%]+$/i.test(i) ? i : "", n ? u.decodePathSegment(i) : i)
        }
        if ("." === n.charAt(0) && (n = n.substring(1)), i = this.suffix()) r = n ? new RegExp(l(i) + "$") : new RegExp(l("." + i) + "$"); else {
            if (!n) return this;
            this._parts.path += "." + u.recodePath(n)
        }
        return r && (n = u.recodePath(n), this._parts.path = this._parts.path.replace(r, n)), this.build(!t), this
    }, f.segment = function (n, t, i) {
        var u = this._parts.urn ? ":" : "/", r = this.path(), f = "/" === r.substring(0, 1), r = r.split(u), o;
        if (void 0 !== n && "number" != typeof n && (i = t, t = n, n = void 0), void 0 !== n && "number" != typeof n) throw Error('Bad segment "' + n + '", must be 0-based integer');
        if (f && r.shift(), 0 > n && (n = Math.max(r.length + n, 0)), void 0 === t) return void 0 === n ? r : r[n];
        if (null === n || void 0 === r[n]) if (e(t)) for (r = [], n = 0, o = t.length; n < o; n++) (t[n].length || r.length && r[r.length - 1].length) && (r.length && !r[r.length - 1].length && r.pop(), r.push(t[n])); else (t || "string" == typeof t) && ("" === r[r.length - 1] ? r[r.length - 1] = t : r.push(t)); else t || "string" == typeof t && t.length ? r[n] = t : r.splice(n, 1);
        return f && r.unshift(""), this.path(r.join(u), i)
    }, f.segmentCoded = function (n, t, i) {
        var r, f;
        if ("number" != typeof n && (i = t, t = n, n = void 0), void 0 === t) {
            if (n = this.segment(n, t, i), e(n)) for (r = 0, f = n.length; r < f; r++) n[r] = u.decode(n[r]); else n = void 0 !== n ? u.decode(n) : void 0;
            return n
        }
        if (e(t)) for (r = 0, f = t.length; r < f; r++) t[r] = u.decode(t[r]); else t = "string" == typeof t ? u.encode(t) : t;
        return this.segment(n, t, i)
    }, w = f.query, f.query = function (n, t) {
        if (!0 === n) return u.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
        if ("function" == typeof n) {
            var i = u.parseQuery(this._parts.query, this._parts.escapeQuerySpace), r = n.call(this, i);
            return this._parts.query = u.buildQuery(r || i, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace), this.build(!t), this
        }
        return void 0 !== n && "string" != typeof n ? (this._parts.query = u.buildQuery(n, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace), this.build(!t), this) : w.call(this, n, t)
    }, f.setQuery = function (n, t, i) {
        var f = u.parseQuery(this._parts.query, this._parts.escapeQuerySpace), r;
        if ("object" == typeof n) for (r in n) h.call(n, r) && (f[r] = n[r]); else if ("string" == typeof n) f[n] = void 0 !== t ? t : null; else throw new TypeError("URI.addQuery() accepts an object, string as the name parameter");
        return this._parts.query = u.buildQuery(f, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace), "string" != typeof n && (i = t), this.build(!i), this
    }, f.addQuery = function (n, t, i) {
        var r = u.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
        return u.addQuery(r, n, void 0 === t ? null : t), this._parts.query = u.buildQuery(r, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace), "string" != typeof n && (i = t), this.build(!i), this
    }, f.removeQuery = function (n, t, i) {
        var r = u.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
        return u.removeQuery(r, n, t), this._parts.query = u.buildQuery(r, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace), "string" != typeof n && (i = t), this.build(!i), this
    }, f.hasQuery = function (n, t, i) {
        var r = u.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
        return u.hasQuery(r, n, t, i)
    }, f.setSearch = f.setQuery, f.addSearch = f.addQuery, f.removeSearch = f.removeQuery, f.hasSearch = f.hasQuery, f.normalize = function () {
        return this._parts.urn ? this.normalizeProtocol(!1).normalizeQuery(!1).normalizeFragment(!1).build() : this.normalizeProtocol(!1).normalizeHostname(!1).normalizePort(!1).normalizePath(!1).normalizeQuery(!1).normalizeFragment(!1).build()
    }, f.normalizeProtocol = function (n) {
        return "string" == typeof this._parts.protocol && (this._parts.protocol = this._parts.protocol.toLowerCase(), this.build(!n)), this
    }, f.normalizeHostname = function (i) {
        return this._parts.hostname && (this.is("IDN") && n ? this._parts.hostname = n.toASCII(this._parts.hostname) : this.is("IPv6") && t && (this._parts.hostname = t.best(this._parts.hostname)), this._parts.hostname = this._parts.hostname.toLowerCase(), this.build(!i)), this
    }, f.normalizePort = function (n) {
        return "string" == typeof this._parts.protocol && this._parts.port === u.defaultPorts[this._parts.protocol] && (this._parts.port = null, this.build(!n)), this
    }, f.normalizePath = function (n) {
        if (this._parts.urn || !this._parts.path || "/" === this._parts.path) return this;
        var e, t = this._parts.path, r = "", i, f;
        for ("/" !== t.charAt(0) && (e = !0, t = "/" + t), t = t.replace(/(\/(\.\/)+)|(\/\.$)/g, "/").replace(/\/{2,}/g, "/"), e && (r = t.substring(1).match(/^(\.\.\/)+/) || "") && (r = r[0]); ;) {
            if (i = t.indexOf("/.."), -1 === i) break; else if (0 === i) {
                t = t.substring(3);
                continue
            }
            f = t.substring(0, i).lastIndexOf("/");
            -1 === f && (f = i);
            t = t.substring(0, f) + t.substring(i + 3)
        }
        return e && this.is("relative") && (t = r + t.substring(1)), t = u.recodePath(t), this._parts.path = t, this.build(!n), this
    }, f.normalizePathname = f.normalizePath, f.normalizeQuery = function (n) {
        return "string" == typeof this._parts.query && (this._parts.query.length ? this.query(u.parseQuery(this._parts.query, this._parts.escapeQuerySpace)) : this._parts.query = null, this.build(!n)), this
    }, f.normalizeFragment = function (n) {
        return this._parts.fragment || (this._parts.fragment = null, this.build(!n)), this
    }, f.normalizeSearch = f.normalizeQuery, f.normalizeHash = f.normalizeFragment, f.iso8859 = function () {
        var n = u.encode, t = u.decode;
        return u.encode = escape, u.decode = decodeURIComponent, this.normalize(), u.encode = n, u.decode = t, this
    }, f.unicode = function () {
        var n = u.encode, t = u.decode;
        return u.encode = y, u.decode = unescape, this.normalize(), u.encode = n, u.decode = t, this
    }, f.readable = function () {
        var t = this.clone(), i, f, r;
        if (t.username("").password("").normalize(), i = "", t._parts.protocol && (i += t._parts.protocol + "://"), t._parts.hostname && (t.is("punycode") && n ? (i += n.toUnicode(t._parts.hostname), t._parts.port && (i += ":" + t._parts.port)) : i += t.host()), t._parts.hostname && t._parts.path && "/" !== t._parts.path.charAt(0) && (i += "/"), i += t.path(!0), t._parts.query) {
            for (var r = "", e = 0, o = t._parts.query.split("&"), s = o.length; e < s; e++) f = (o[e] || "").split("="), r = r + ("&" + u.decodeQuery(f[0], this._parts.escapeQuerySpace).replace(/&/g, "%26")), void 0 !== f[1] && (r += "=" + u.decodeQuery(f[1], this._parts.escapeQuerySpace).replace(/&/g, "%26"));
            i += "?" + r.substring(1)
        }
        return i + u.decodeQuery(t.hash(), !0)
    }, f.absoluteTo = function (n) {
        var t = this.clone(), f = ["protocol", "username", "password", "hostname", "port"], i, r;
        if (this._parts.urn) throw Error("URNs do not have any generally defined hierarchical components");
        if (n instanceof u || (n = new u(n)), t._parts.protocol || (t._parts.protocol = n._parts.protocol), this._parts.hostname) return t;
        for (i = 0; r = f[i]; i++) t._parts[r] = n._parts[r];
        return t._parts.path ? ".." === t._parts.path.substring(-2) && (t._parts.path += "/") : (t._parts.path = n._parts.path, t._parts.query || (t._parts.query = n._parts.query)), "/" !== t.path().charAt(0) && (n = n.directory(), t._parts.path = (n ? n + "/" : "") + t._parts.path, t.normalizePath()), t.build(), t
    }, f.relativeTo = function (n) {
        var r = this.clone().normalize(), t, i, f, e;
        if (r._parts.urn) throw Error("URNs do not have any generally defined hierarchical components");
        if (n = new u(n).normalize(), t = r._parts, i = n._parts, f = r.path(), e = n.path(), "/" !== f.charAt(0)) throw Error("URI is already relative");
        if ("/" !== e.charAt(0)) throw Error("Cannot calculate a URI relative to another relative URI");
        if (t.protocol === i.protocol && (t.protocol = null), t.username === i.username && t.password === i.password && null === t.protocol && null === t.username && null === t.password && t.hostname === i.hostname && t.port === i.port) t.hostname = null, t.port = null; else return r.build();
        return f === e ? (t.path = "", r.build()) : (n = u.commonPath(r.path(), n.path()), !n) ? r.build() : (i = i.path.substring(n.length).replace(/[^\/]*$/, "").replace(/.*?\//g, "../"), t.path = i + t.path.substring(n.length), r.build())
    }, f.equals = function (n) {
        var f = this.clone();
        n = new u(n);
        var i = {}, r = {}, o = {}, t;
        if (f.normalize(), n.normalize(), f.toString() === n.toString()) return !0;
        if (i = f.query(), r = n.query(), f.query(""), n.query(""), f.toString() !== n.toString() || i.length !== r.length) return !1;
        i = u.parseQuery(i, this._parts.escapeQuerySpace);
        r = u.parseQuery(r, this._parts.escapeQuerySpace);
        for (t in i) if (h.call(i, t)) {
            if (e(i[t])) {
                if (!p(i[t], r[t])) return !1
            } else if (i[t] !== r[t]) return !1;
            o[t] = !0
        }
        for (t in r) if (h.call(r, t) && !o[t]) return !1;
        return !0
    }, f.duplicateQueryParameters = function (n) {
        return this._parts.duplicateQueryParameters = !!n, this
    }, f.escapeQuerySpace = function (n) {
        return this._parts.escapeQuerySpace = !!n, this
    }, u
});
tns = function () {
    function rt() {
        for (var t, i, n, r = arguments[0] || {}, u = 1, f = arguments.length; u < f; u++) if ((t = arguments[u]) !== null) for (i in t) if (n = t[i], r === n) continue; else n !== undefined && (r[i] = n);
        return r
    }

    function o(n) {
        return ["true", "false"].indexOf(n) >= 0 ? JSON.parse(n) : n
    }

    function s(n, t, i, r) {
        if (r) try {
            n.setItem(t, i)
        } catch (u) {
        }
        return i
    }

    function yt() {
        var n = window.tnsId;
        return window.tnsId = n ? n + 1 : 1, "tns" + window.tnsId
    }

    function d() {
        var t = document, n = t.body;
        return n || (n = t.createElement("body"), n.fake = !0), n
    }

    function g(n) {
        var t = "";
        return n.fake && (t = y.style.overflow, n.style.background = "", n.style.overflow = y.style.overflow = "hidden", y.appendChild(n)), t
    }

    function nt(n, t) {
        n.fake && (n.remove(), y.style.overflow = t, y.offsetHeight)
    }

    function pt() {
        var o = document, t = d(), s = g(t), i = o.createElement("div"), f = !1, n, e, u, r;
        t.appendChild(i);
        try {
            for (n = "(10px * 10)", e = ["calc" + n, "-moz-calc" + n, "-webkit-calc" + n], r = 0; r < 3; r++) if (u = e[r], i.style.width = u, i.offsetWidth === 100) {
                f = u.replace(n, "");
                break
            }
        } catch (h) {
        }
        return t.fake ? nt(t, s) : i.remove(), f
    }

    function wt() {
        var u = document, t = d(), s = g(t), n = u.createElement("div"), i = u.createElement("div"), f = "", e = 70,
            o = !1, r;
        for (n.className = "tns-t-subp2", i.className = "tns-t-ct", r = 0; r < e; r++) f += "<div><\/div>";
        return i.innerHTML = f, n.appendChild(i), t.appendChild(n), o = Math.abs(n.getBoundingClientRect().left - i.children[e - 3].getBoundingClientRect().left) < 2, t.fake ? nt(t, s) : n.remove(), o
    }

    function bt() {
        var r = document, n = d(), e = g(n), t = r.createElement("div"), i = r.createElement("style"),
            u = "@media all and (min-width:1px){.tns-mq-test{position:absolute}}", f;
        return i.type = "text/css", t.className = "tns-mq-test", n.appendChild(i), n.appendChild(t), i.styleSheet ? i.styleSheet.cssText = u : i.appendChild(r.createTextNode(u)), f = window.getComputedStyle ? window.getComputedStyle(t).position : t.currentStyle.position, n.fake ? nt(n, e) : t.remove(), f === "absolute"
    }

    function kt(n) {
        var t = document.createElement("style");
        return n && t.setAttribute("media", n), document.querySelector("head").appendChild(t), t.sheet ? t.sheet : t.styleSheet
    }

    function c(n, t, i, r) {
        "insertRule" in n ? n.insertRule(t + "{" + i + "}", r) : n.addRule(t, i, r)
    }

    function dt(n, t) {
        "deleteRule" in n ? n.deleteRule(t) : n.removeRule(t)
    }

    function h(n) {
        var t = "insertRule" in n ? n.cssRules : n.rules;
        return t.length
    }

    function gt(n, t) {
        return Math.atan2(n, t) * (180 / Math.PI)
    }

    function ni(n, t) {
        var i = !1, r = Math.abs(90 - Math.abs(n));
        return r >= 90 - t ? i = "horizontal" : r <= t && (i = "vertical"), i
    }

    function a(n, t, i) {
        for (var r = 0, u = n.length; r < u; r++) t.call(i, n[r], r)
    }

    function w(n, t) {
        return n.hasAttribute(t)
    }

    function tt(n, t) {
        return n.getAttribute(t)
    }

    function st(n) {
        return typeof n.item != "undefined"
    }

    function u(n, t) {
        var i, r;
        if (n = st(n) || n instanceof Array ? n : [n], Object.prototype.toString.call(t) === "[object Object]") for (i = n.length; i--;) for (r in t) n[i].setAttribute(r, t[r])
    }

    function v(n, t) {
        var u, i, r;
        for (n = st(n) || n instanceof Array ? n : [n], t = t instanceof Array ? t : [t], u = t.length, i = n.length; i--;) for (r = u; r--;) n[i].removeAttribute(t[r])
    }

    function ht(n) {
        for (var i = [], t = 0, r = n.length; t < r; t++) i.push(n[t]);
        return i
    }

    function f(n) {
        n.style.display !== "none" && (n.style.display = "none")
    }

    function e(n) {
        n.style.display === "none" && (n.style.display = "")
    }

    function ct(n) {
        return window.getComputedStyle(n).display !== "none"
    }

    function b(n) {
        var u, e, t, i;
        if (typeof n == "string") {
            var r = [n], f = n.charAt(0).toUpperCase() + n.substr(1);
            ["Webkit", "Moz", "ms", "O"].forEach(function (t) {
                (t !== "ms" || n === "transform") && r.push(t + f)
            });
            n = r
        }
        for (u = document.createElement("fakeelement"), e = n.length, t = 0; t < n.length; t++) if (i = n[t], u.style[i] !== undefined) return i;
        return !1
    }

    function ti(n) {
        if (!n || !window.getComputedStyle) return !1;
        var f = document, t = d(), e = g(t), i = f.createElement("p"), r,
            u = n.length > 9 ? "-" + n.slice(0, -9).toLowerCase() + "-" : "";
        return u += "transform", t.insertBefore(i, null), i.style[n] = "translate3d(1px,1px,1px)", r = window.getComputedStyle(i).getPropertyValue(u), t.fake ? nt(t, e) : i.remove(), r !== undefined && r.length > 0 && r !== "none"
    }

    function lt(n, t) {
        var i = !1;
        return /^Webkit/.test(n) ? i = "webkit" + t + "End" : /^O/.test(n) ? i = "o" + t + "End" : n && (i = t.toLowerCase() + "end"), i
    }

    function n(n, t, i) {
        var r, u;
        for (r in t) u = ["touchstart", "touchmove"].indexOf(r) >= 0 && !i ? et : !1, n.addEventListener(r, t[r], u)
    }

    function i(n, t) {
        var i, r;
        for (i in t) r = ["touchstart", "touchmove"].indexOf(i) >= 0 ? et : !1, n.removeEventListener(i, t[i], r)
    }

    function ii() {
        return {
            topics: {}, on: function (n, t) {
                this.topics[n] = this.topics[n] || [];
                this.topics[n].push(t)
            }, off: function (n, t) {
                if (this.topics[n]) for (var i = 0; i < this.topics[n].length; i++) if (this.topics[n][i] === t) {
                    this.topics[n].splice(i, 1);
                    break
                }
            }, emit: function (n, t) {
                t.type = n;
                this.topics[n] && this.topics[n].forEach(function (i) {
                    i(t, n)
                })
            }
        }
    }

    function ri(n, t, i, r, u, f, e) {
        function c() {
            f -= o;
            h += l;
            n.style[t] = i + h + s + r;
            f > 0 ? setTimeout(c, o) : e()
        }

        var o = Math.min(f, 10), s = u.indexOf("%") >= 0 ? "%" : "px", u = u.replace(s, ""),
            h = Number(n.style[t].replace(i, "").replace(r, "").replace(s, "")), l = (u - h) / f * o;
        setTimeout(c, o)
    }

    var y, ft, at, et, vt;
    Object.keys || (Object.keys = function (n) {
        var t = [];
        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && t.push(i);
        return t
    });
    "remove" in Element.prototype || (Element.prototype.remove = function () {
        this.parentNode && this.parentNode.removeChild(this)
    });
    var k = window,
        l = k.requestAnimationFrame || k.webkitRequestAnimationFrame || k.mozRequestAnimationFrame || k.msRequestAnimationFrame || function (n) {
            return setTimeout(n, 16)
        }, ot = window, it = ot.cancelAnimationFrame || ot.mozCancelAnimationFrame || function (n) {
            clearTimeout(n)
        };
    y = document.documentElement;
    var ut = "classList" in document.createElement("_"), p = ut ? function (n, t) {
        return n.classList.contains(t)
    } : function (n, t) {
        return n.className.indexOf(t) >= 0
    }, t = ut ? function (n, t) {
        p(n, t) || n.classList.add(t)
    } : function (n, t) {
        p(n, t) || (n.className += " " + t)
    }, r = ut ? function (n, t) {
        p(n, t) && n.classList.remove(t)
    } : function (n, t) {
        p(n, t) && (n.className = n.className.replace(t, ""))
    };
    ft = !1;
    try {
        at = Object.defineProperty({}, "passive", {
            get: function () {
                ft = !0
            }
        });
        window.addEventListener("test", null, at)
    } catch (ui) {
    }
    return et = ft ? {passive: !0} : !1, vt = function (y) {
        function oc(n) {
            for (var t in n) d || (t === "slideBy" && (n[t] = "page"), t === "edgePadding" && (n[t] = !1), t === "autoHeight" && (n[t] = !1)), t === "responsive" && oc(n[t])
        }

        function go(n) {
            n && (nu = tu = lu = au = hu = ur = yu = pu = !1)
        }

        function wc() {
            for (var n = d ? k - ki : k; n < 0;) n += ut;
            return n % ut + 1
        }

        function bc(n) {
            return n = n ? Math.max(0, Math.min(tr ? ut - 1 : ut - st, n)) : 0, d ? n + ki : n
        }

        function ns(n) {
            for (n == null && (n = k), d && (n -= ki); n < 0;) n += ut;
            return Math.floor(n % ut)
        }

        function kc() {
            var n = ns(), t;
            return t = pe ? n : g || et ? Math.ceil((n + 1) * br / ut - 1) : Math.floor(n / st), !tr && d && k === vr && (t = br - 1), t
        }

        function uv() {
            var t, n, r, i;
            if (et || g && !th) return ut - 1;
            if (t = g ? "fixedWidth" : "items", n = [], (g || y[t] < ut) && n.push(y[t]), ci) for (r in ci) i = ci[r][t], i && (g || i < ut) && n.push(i);
            return n.length || n.push(0), Math.ceil(g ? th / Math.min.apply(null, n) : Math.max.apply(null, n))
        }

        function fv() {
            var t = uv(), n = d ? Math.ceil((t * 5 - ut) / 2) : t * 4 - ut;
            return n = Math.max(t, n), gu("edgePadding") ? n + 1 : n
        }

        function dc() {
            return fu.innerWidth || di.documentElement.clientWidth || di.body.clientWidth
        }

        function yh(n) {
            return n === "top" ? "afterbegin" : "beforeend"
        }

        function gc(n) {
            var t = di.createElement("div"), i, r;
            return n.appendChild(t), i = t.getBoundingClientRect(), r = i.right - i.left, t.remove(), r || gc(n.parentNode)
        }

        function nl() {
            var n = ai ? ai * 2 - at : 0;
            return gc(nh) - n
        }

        function gu(n) {
            if (y[n]) return !0;
            if (ci) for (var t in ci) if (ci[t][n]) return !0;
            return !1
        }

        function ft(n, t) {
            var i, r;
            if (t == null && (t = oo), n === "items" && g) return Math.floor((wi + at) / (g + at)) || 1;
            if (i = y[n], ci) for (r in ci) t >= parseInt(r) && n in ci[r] && (i = ci[r][n]);
            return n === "slideBy" && i === "page" && (i = ft("items")), d || n !== "slideBy" && n !== "items" || (i = Math.floor(i)), i
        }

        function ev(n) {
            return tf ? tf + "(" + n * 100 + "% / " + ei + ")" : n * 100 / ei + "%"
        }

        function ts(n, t, i, r, u) {
            var f = "", e, o, s;
            return n !== undefined ? (e = n, t && (e -= t), f = fi ? "margin: 0 " + e + "px 0 " + n + "px;" : "margin: " + n + "px 0 " + e + "px 0;") : t && !i && (o = "-" + t + "px", s = fi ? o + " 0 0" : "0 " + o + " 0", f = "margin: 0 " + s + ";"), !d && u && rr && r && (f += hf(r)), f
        }

        function is(n, t, i) {
            return n ? (n + t) * ei + "px" : tf ? tf + "(" + ei * 100 + "% / " + i + ")" : ei * 100 / i + "%"
        }

        function rs(n, t, i) {
            var r, u;
            return n ? r = n + t + "px" : (d || (i = Math.floor(i)), u = d ? ei : i, r = tf ? tf + "(100% / " + u + ")" : 100 / u + "%"), r = "width:" + r, vf !== "inner" ? r + ";" : r + " !important;"
        }

        function us(n) {
            var t = "", i, r;
            return n !== !1 && (i = fi ? "padding-" : "margin-", r = fi ? "right" : "bottom", t = i + r + ": " + n + "px;"), t
        }

        function tl(n, t) {
            var i = n.substring(0, n.length - t).toLowerCase();
            return i && (i = "-" + i + "-"), i
        }

        function hf(n) {
            return tl(rr, 18) + "transition-duration:" + n / 1e3 + "s;"
        }

        function il(n) {
            return tl(uo, 17) + "animation-duration:" + n / 1e3 + "s;"
        }

        function ov() {
            var h = gu("gutter"), s, i, n, r, f, e, o;
            if (er.className = "tns-outer", or.className = "tns-inner", er.id = li + "-ow", or.id = li + "-iw", nt.id === "" && (nt.id = li), du += rc || et ? " tns-subpixel" : " tns-no-subpixel", du += tf ? " tns-calc" : " tns-no-calc", et && (du += " tns-autowidth"), du += " tns-" + y.axis, nt.className += du, d ? (hr = di.createElement("div"), hr.id = li + "-mw", hr.className = "tns-ovh", er.appendChild(hr), hr.appendChild(or)) : er.appendChild(or), sr && (s = hr ? hr : or, s.className += " tns-ah"), nh.insertBefore(er, nt), or.appendChild(nt), a(ui, function (n, i) {
                t(n, "tns-item");
                n.id || (n.id = li + "-item" + i);
                !d && gr && t(n, gr);
                u(n, {"aria-hidden": "true", tabindex: "-1"})
            }), ki) {
                for (i = di.createDocumentFragment(), n = di.createDocumentFragment(), r = ki; r--;) f = r % ut, e = ui[f].cloneNode(!0), v(e, "id"), n.insertBefore(e, n.firstChild), d && (o = ui[ut - 1 - f].cloneNode(!0), v(o, "id"), i.appendChild(o));
                nt.insertBefore(i, nt.firstChild);
                nt.appendChild(n);
                ui = nt.children
            }
        }

        function rl() {
            if (gu("autoHeight") || et || !fi) {
                var i = nt.querySelectorAll("img");
                a(i, function (i) {
                    var r = i.src;
                    r && r.indexOf("data:image") < 0 ? (n(i, vo), i.src = "", i.src = r, t(i, "loading")) : so || wl(i)
                });
                l(function () {
                    ss(ht(i), function () {
                        ch = !0
                    })
                });
                !et && fi && (i = kh(k, Math.min(k + st - 1, ei - 1)));
                so ? ul() : l(function () {
                    ss(ht(i), ul)
                })
            } else d && no(), el(), ol()
        }

        function ul() {
            if (et) {
                var n = tr ? k : ut - 1;
                (function t() {
                    ui[n - 1].getBoundingClientRect().right.toFixed(2) === ui[n].getBoundingClientRect().left.toFixed(2) ? fl() : setTimeout(function () {
                        t()
                    }, 16)
                })()
            } else fl()
        }

        function fl() {
            (!fi || et) && (ta(), et ? (bf = gh(), lo && (wr = ph()), vr = ee(), go(cr || wr)) : ic());
            d && no();
            el();
            ol()
        }

        function sv() {
            var o, w, l, n, i;
            if (!d) for (o = k, w = k + Math.min(ut, st); o < w; o++) l = ui[o], l.style.left = (o - k) * 100 / st + "%", t(l, su), r(l, gr);
            if (fi && (rc || et ? (c(oi, "#" + li + " > .tns-item", "font-size:" + fu.getComputedStyle(ui[0]).fontSize + ";", h(oi)), c(oi, "#" + li, "font-size:0;", h(oi))) : d && a(ui, function (n, t) {
                n.style.marginLeft = ev(t)
            })), af ? (rr && (n = hr && y.autoHeight ? hf(y.speed) : "", c(oi, "#" + li + "-mw", n, h(oi))), n = ts(y.edgePadding, y.gutter, y.fixedWidth, y.speed, y.autoHeight), c(oi, "#" + li + "-iw", n, h(oi)), d && (n = fi && !et ? "width:" + is(y.fixedWidth, y.gutter, y.items) + ";" : "", rr && (n += hf(ar)), c(oi, "#" + li, n, h(oi))), n = fi && !et ? rs(y.fixedWidth, y.gutter, y.items) : "", y.gutter && (n += us(y.gutter)), d || (rr && (n += hf(ar)), uo && (n += il(ar))), n && c(oi, "#" + li + " > .tns-item", n, h(oi))) : (dl(), or.style.cssText = ts(ai, at, g, sr), d && fi && !et && (nt.style.width = is(g, at, st)), n = fi && !et ? rs(g, at, st) : "", at && (n += us(at)), n && c(oi, "#" + li + " > .tns-item", n, h(oi))), ci && af) for (i in ci) {
                i = parseInt(i);
                var u = ci[i], n = "", b = "", tt = "", e = "", f = "", it = et ? null : ft("items", i),
                    p = ft("fixedWidth", i), s = ft("speed", i), rt = ft("edgePadding", i), ot = ft("autoHeight", i),
                    v = ft("gutter", i);
                rr && hr && ft("autoHeight", i) && "speed" in u && (b = "#" + li + "-mw{" + hf(s) + "}");
                ("edgePadding" in u || "gutter" in u) && (tt = "#" + li + "-iw{" + ts(rt, v, p, s, ot) + "}");
                d && fi && !et && ("fixedWidth" in u || "items" in u || g && "gutter" in u) && (e = "width:" + is(p, v, it) + ";");
                rr && "speed" in u && (e += hf(s));
                e && (e = "#" + li + "{" + e + "}");
                ("fixedWidth" in u || g && "gutter" in u || !d && "items" in u) && (f += rs(p, v, it));
                "gutter" in u && (f += us(v));
                !d && "speed" in u && (rr && (f += hf(s)), uo && (f += il(s)));
                f && (f = "#" + li + " > .tns-item{" + f + "}");
                n = b + tt + e + f;
                n && oi.insertRule("@media (min-width: " + i / 16 + "em) {" + n + "}", oi.cssRules.length)
            }
        }

        function el() {
            var f, l, i, s, r, o, e;
            if (dh(), er.insertAdjacentHTML("afterbegin", '<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">' + pl() + "<\/span>  of " + ut + "<\/div>"), lh = er.querySelector(".tns-liveregion .current"), oh && (f = ur ? "stop" : "start", vi ? u(vi, {"data-action": f}) : y.autoplayButtonOutput && (er.insertAdjacentHTML(yh(y.autoplayPosition), '<button data-action="' + f + '">' + de[0] + f + de[1] + vu[0] + "<\/button>"), vi = er.querySelector("[data-action]")), vi && n(vi, {click: ca}), ur && (ys(), yu && n(nt, ce), pu && n(nt, le))), eh) {
                if (l = d ? ki : 0, ir) u(ir, {"aria-label": "Carousel Pagination"}), yr = ir.children, a(yr, function (n, t) {
                    u(n, {"data-nav": t, tabindex: "-1", "aria-label": gf + (t + 1), "aria-controls": li})
                }); else {
                    for (i = "", s = pe ? "" : 'style="display:none"', r = 0; r < ut; r++) i += '<button data-nav="' + r + '" tabindex="-1" aria-controls="' + li + '" ' + s + ' aria-label="' + gf + (r + 1) + '"><\/button>';
                    i = '<div class="tns-nav" aria-label="Carousel Pagination">' + i + "<\/div>";
                    er.insertAdjacentHTML(yh(y.navPosition), i);
                    ir = er.querySelector(".tns-nav");
                    yr = ir.children
                }
                ka();
                rr && (o = rr.substring(0, rr.length - 18).toLowerCase(), e = "transition: all " + ar / 1e3 + "s", o && (e = "-" + o + "-" + e), c(oi, "[aria-controls^=" + li + "-item]", e, h(oi)));
                u(yr[pr], {"aria-label": gf + (pr + 1) + ah});
                v(yr[pr], "tabindex");
                t(yr[pr], yo);
                n(ir, fh)
            }
            ao && (pi || si && hi || (er.insertAdjacentHTML(yh(y.controlsPosition), '<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button data-controls="prev" tabindex="-1" aria-controls="' + li + '">' + cu[0] + '<\/button><button data-controls="next" tabindex="-1" aria-controls="' + li + '">' + cu[1] + "<\/button><\/div>"), pi = er.querySelector(".tns-controls")), si && hi || (si = pi.children[0], hi = pi.children[1]), y.controlsContainer && u(pi, {
                "aria-label": "Carousel Navigation",
                tabindex: "0"
            }), (y.controlsContainer || y.prevButton && y.nextButton) && u([si, hi], {
                "aria-controls": li,
                tabindex: "-1"
            }), (y.controlsContainer || y.prevButton && y.nextButton) && (u(si, {"data-controls": "prev"}), u(hi, {"data-controls": "next"})), be = ra(si), ke = ra(hi), fa(), pi ? n(pi, he) : (n(si, he), n(hi, he)));
            wh()
        }

        function ol() {
            if (d && rf) {
                var t = {};
                t[rf] = uu;
                n(nt, t)
            }
            if (lu && n(nt, ve, y.preventScrollOnTouch), au && n(nt, ye), hu && n(di, ae), vf === "inner") bi.on("outerResized", function () {
                hl();
                bi.emit("innerLoaded", fr())
            }); else (ci || g || et || sr || !fi) && n(fu, {resize: sl});
            if (sr) if (vf === "outer") bi.on("innerLoaded", os); else cr || os();
            bh();
            cr ? vl() : wr && al();
            bi.on("indexChanged", kl);
            vf === "inner" && bi.emit("innerLoaded", fr());
            typeof uh == "function" && uh(fr());
            ue = !0
        }

        function hv() {
            var n, r, t;
            oi.disabled = !0;
            oi.ownerNode && oi.ownerNode.remove();
            i(fu, {resize: sl});
            hu && i(di, ae);
            pi && i(pi, he);
            ir && i(ir, fh);
            i(nt, ce);
            i(nt, le);
            vi && i(vi, {click: ca});
            ur && clearInterval(po);
            d && rf && (n = {}, n[rf] = uu, i(nt, n));
            lu && i(nt, ve);
            au && i(nt, ye);
            r = [sc, ac, nv, tv, vc, pc];
            ks.forEach(function (n, t) {
                var i = n === "container" ? er : y[n], u, f;
                typeof i == "object" && (u = i.previousElementSibling ? i.previousElementSibling : !1, f = i.parentNode, i.outerHTML = r[t], y[n] = u ? u.nextElementSibling : f.firstElementChild)
            });
            ks = su = eo = gs = gr = fi = er = or = nt = nh = sc = ui = ut = re = oo = et = g = ai = at = wi = st = pf = th = hu = ar = fe = tr = sr = oi = so = yi = wf = ki = ei = hc = bf = rh = uf = wu = kf = ee = k = bu = iu = vr = ga = co = ru = ku = uh = bi = du = li = cr = oe = lo = wr = se = he = fh = ce = le = ae = ve = ye = ao = eh = pe = oh = cc = lc = sh = hh = vo = ch = nu = cu = pi = ac = si = hi = be = ke = tu = ir = vc = yr = br = ff = ef = pr = df = yo = gf = ah = ur = ih = yc = vu = yu = vi = pc = pu = de = po = lr = wo = ne = bo = of = dr = ko = iv = rv = sf = kr = vh = lu = au = null;
            for (t in this) t !== "rebuild" && (this[t] = null);
            ue = !1
        }

        function sl(n) {
            l(function () {
                hl(eu(n))
            })
        }

        function hl(t) {
            var r, p, u, w, b, it;
            if (ue) {
                vf === "outer" && bi.emit("outerResized", fr(t));
                oo = dc();
                p = re;
                u = !1;
                ci && (cl(), r = p !== re, r && bi.emit("newBreakpointStart", fr(t)));
                var s, o, rt = st, ut = cr, ot = wr, ht = hu, ct = nu, lt = tu, vt = lu, yt = au, pt = ur, wt = yu,
                    bt = pu, kt = k;
                if (r) {
                    var gt = g, ni = sr, ti = cu, ii = nr, l = vu;
                    af || (w = at, b = ai)
                }
                if (hu = ft("arrowKeys"), nu = ft("controls"), tu = ft("nav"), lu = ft("touch"), nr = ft("center"), au = ft("mouseDrag"), ur = ft("autoplay"), yu = ft("autoplayHoverPause"), pu = ft("autoplayResetOnVisibility"), r && (cr = ft("disable"), g = ft("fixedWidth"), ar = ft("speed"), sr = ft("autoHeight"), cu = ft("controlsText"), vu = ft("autoplayText"), ih = ft("autoplayTimeout"), af || (ai = ft("edgePadding"), at = ft("gutter"))), go(cr), wi = nl(), fi && !et || cr || (ta(), fi || (ic(), u = !0)), (g || et) && (bf = gh(), vr = ee()), (r || g) && (st = ft("items"), pf = ft("slideBy"), o = st !== rt, o && (g || et || (vr = ee()), fs())), r && cr !== ut && (cr ? vl() : lv()), lo && (r || g || et) && (wr = ph(), wr !== ot && (wr ? (nc(ls(bc(0))), al()) : (cv(), u = !0))), go(cr || wr), ur || (yu = pu = !1), hu !== ht && (hu ? n(di, ae) : i(di, ae)), nu !== ct && (nu ? pi ? e(pi) : (si && e(si), hi && e(hi)) : pi ? f(pi) : (si && f(si), hi && f(hi))), tu !== lt && (tu ? e(ir) : f(ir)), lu !== vt && (lu ? n(nt, ve, y.preventScrollOnTouch) : i(nt, ve)), au !== yt && (au ? n(nt, ye) : i(nt, ye)), ur !== pt && (ur ? (vi && e(vi), lr || ne || ys()) : (vi && f(vi), lr && io())), yu !== wt && (yu ? n(nt, ce) : i(nt, ce)), pu !== bt && (pu ? n(di, le) : i(di, le)), r) {
                    if ((g !== gt || nr !== ii) && (u = !0), sr !== ni && (sr || (or.style.height = "")), nu && cu !== ti && (si.innerHTML = cu[0], hi.innerHTML = cu[1]), vi && vu !== l) {
                        var a = ur ? 1 : 0, v = vi.innerHTML, tt = v.length - l[a].length;
                        v.substring(tt) === l[a] && (vi.innerHTML = v.substring(0, tt) + vu[a])
                    }
                } else nr && (g || et) && (u = !0);
                (o || g && !et) && (br = ba(), ka());
                s = k !== kt;
                s ? (bi.emit("indexChanged", fr()), u = !0) : o ? s || kl() : (g || et) && (bh(), dh(), yl());
                o && !d && pv();
                cr || wr || (r && !af && ((sr !== autoheightTem || ar !== speedTem) && dl(), (ai !== b || at !== w) && (or.style.cssText = ts(ai, at, g, ar, sr)), fi && (d && (nt.style.width = is(g, at, st)), it = rs(g, at, st) + us(at), dt(oi, h(oi) - 1), c(oi, "#" + li + " > .tns-item", it, h(oi)))), sr && os(), u && (no(), bu = k));
                r && bi.emit("newBreakpointEnd", fr(t))
            }
        }

        function ph() {
            var t, i, n;
            return !g && !et ? (t = nr ? st - (st - 1) / 2 : st, ut <= t) : (i = g ? (g + at) * ut : yi[ut], n = ai ? wi + ai * 2 : wi + at, nr && (n -= g ? (wi - g) / 2 : (wi - (yi[k + 1] - yi[k] - at)) / 2), i <= n)
        }

        function cl() {
            re = 0;
            for (var n in ci) n = parseInt(n), oo >= n && (re = n)
        }

        function wh() {
            !ur && vi && f(vi);
            !tu && ir && f(ir);
            nu || (pi ? f(pi) : (si && f(si), hi && f(hi)))
        }

        function ll() {
            ur && vi && e(vi);
            tu && ir && e(ir);
            nu && (pi ? e(pi) : (si && e(si), hi && e(hi)))
        }

        function al() {
            var i, n;
            if (!se) {
                if (ai && (or.style.margin = "0px"), ki) for (i = "tns-transparent", n = ki; n--;) d && t(ui[n], i), t(ui[ei - n - 1], i);
                wh();
                se = !0
            }
        }

        function cv() {
            var t, n;
            if (se) {
                if (ai && af && (or.style.margin = ""), ki) for (t = "tns-transparent", n = ki; n--;) d && r(ui[n], t), r(ui[ei - n - 1], t);
                ll();
                se = !1
            }
        }

        function vl() {
            var n, t, u, i;
            if (!oe) {
                if (oi.disabled = !0, nt.className = nt.className.replace(du.substring(1), ""), v(nt, ["style"]), tr) for (n = ki; n--;) d && f(ui[n]), f(ui[ei - n - 1]);
                if (fi && d || v(or, ["style"]), !d) for (t = k, u = k + ut; t < u; t++) i = ui[t], v(i, ["style"]), r(i, su), r(i, gr);
                wh();
                oe = !0
            }
        }

        function lv() {
            var i, n, u, r, f;
            if (oe) {
                if (oi.disabled = !1, nt.className += du, no(), tr) for (i = ki; i--;) d && e(ui[i]), e(ui[ei - i - 1]);
                if (!d) for (n = k, u = k + ut; n < u; n++) r = ui[n], f = n < k + st ? su : gr, r.style.left = (n - k) * 100 / st + "%", t(r, f);
                ll();
                oe = !1
            }
        }

        function yl() {
            var n = pl();
            lh.innerHTML !== n && (lh.innerHTML = n)
        }

        function pl() {
            var t = es(), n = t[0] + 1, i = t[1] + 1;
            return n === i ? n + "" : n + " to " + i
        }

        function es(n) {
            var t, i, r, u, f, e, o;
            return n == null && (n = ls()), t = k, nr || ai ? (et || g) && (r = -(parseFloat(n) + ai), u = r + wi + ai * 2) : et && (r = yi[k], u = r + wi), et ? yi.forEach(function (n, f) {
                f < ei && ((nr || ai) && n <= r + .5 && (t = f), u - n >= .5 && (i = f))
            }) : (g ? (f = g + at, nr || ai ? (t = Math.floor(r / f), i = Math.ceil(u / f - 1)) : i = t + Math.ceil(wi / f) - 1) : nr || ai ? (e = st - 1, nr ? (t -= e / 2, i = k + e / 2) : i = k + e, ai && (o = ai * st / wi, t -= o, i += o), t = Math.floor(t), i = Math.ceil(i)) : i = t + st - 1, t = Math.max(t, 0), i = Math.min(i, ei - 1)), [t, i]
        }

        function bh() {
            so && !cr && kh.apply(null, es()).forEach(function (i) {
                var r, u;
                p(i, hh) || (r = {}, r[rf] = function (n) {
                    n.stopPropagation()
                }, n(i, r), n(i, vo), i.src = tt(i, "data-src"), u = tt(i, "data-srcset"), u && (i.srcset = u), t(i, "loading"))
            })
        }

        function av(n) {
            wl(te(n))
        }

        function vv(n) {
            yv(te(n))
        }

        function wl(n) {
            t(n, "loaded");
            bl(n)
        }

        function yv(n) {
            t(n, "failed");
            bl(n)
        }

        function bl(n) {
            t(n, "tns-complete");
            r(n, "loading");
            i(n, vo)
        }

        function kh(n, t) {
            for (var i = []; n <= t;) a(ui[n].querySelectorAll("img"), function (n) {
                i.push(n)
            }), n++;
            return i
        }

        function os() {
            var n = kh.apply(null, es());
            l(function () {
                ss(n, na)
            })
        }

        function ss(n, t) {
            if (ch || (n.forEach(function (t, i) {
                p(t, hh) && n.splice(i, 1)
            }), !n.length)) return t();
            l(function () {
                ss(n, t)
            })
        }

        function kl() {
            bh();
            dh();
            yl();
            fa();
            wv()
        }

        function dl() {
            d && sr && (hr.style[rr] = ar / 1e3 + "s")
        }

        function gl(n, t) {
            for (var r = [], i = n, u = Math.min(n + t, ei); i < u; i++) r.push(ui[i].offsetHeight);
            return Math.max.apply(null, r)
        }

        function na() {
            var n = sr ? gl(k, st) : gl(ki, ut), t = hr ? hr : or;
            t.style.height !== n && (t.style.height = n + "px")
        }

        function ta() {
            yi = [0];
            var n = fi ? "left" : "top", i = fi ? "right" : "bottom", t = ui[0].getBoundingClientRect()[n];
            a(ui, function (r, u) {
                u && yi.push(r.getBoundingClientRect()[n] - t);
                u === ei - 1 && yi.push(r.getBoundingClientRect()[i] - t)
            })
        }

        function dh() {
            var n = es(), i = n[0], f = n[1];
            a(ui, function (n, e) {
                e >= i && e <= f ? w(n, "aria-hidden") && (v(n, ["aria-hidden", "tabindex"]), t(n, sh)) : w(n, "aria-hidden") || (u(n, {
                    "aria-hidden": "true",
                    tabindex: "-1"
                }), r(n, sh))
            })
        }

        function pv() {
            for (var n, u = k + Math.min(ut, st), i = ei; i--;) n = ui[i], i >= k && i < u ? (t(n, "tns-moving"), n.style.left = (i - k) * 100 / st + "%", t(n, su), r(n, gr)) : n.style.left && (n.style.left = "", t(n, gr), r(n, su)), r(n, eo);
            setTimeout(function () {
                a(ui, function (n) {
                    r(n, "tns-moving")
                })
            }, 300)
        }

        function wv() {
            if (tu && (pr = ef >= 0 ? ef : kc(), ef = -1, pr !== df)) {
                var i = yr[df], n = yr[pr];
                u(i, {tabindex: "-1", "aria-label": gf + (df + 1)});
                r(i, yo);
                u(n, {"aria-label": gf + (pr + 1) + ah});
                v(n, "tabindex");
                t(n, yo);
                df = pr
            }
        }

        function ia(n) {
            return n.nodeName.toLowerCase()
        }

        function ra(n) {
            return ia(n) === "button"
        }

        function ua(n) {
            return n.getAttribute("aria-disabled") === "true"
        }

        function hs(n, t, i) {
            n ? t.disabled = i : t.setAttribute("aria-disabled", i.toString())
        }

        function fa() {
            if (nu && !fe && !tr) {
                var n = be ? si.disabled : ua(si), t = ke ? hi.disabled : ua(hi), i = k <= iu ? !0 : !1,
                    r = !fe && k >= vr ? !0 : !1;
                i && !n && hs(be, si, !0);
                !i && n && hs(be, si, !1);
                r && !t && hs(ke, hi, !0);
                !r && t && hs(ke, hi, !1)
            }
        }

        function cs(n, t) {
            rr && (n.style[rr] = t)
        }

        function bv() {
            return g ? (g + at) * ei : yi[ei]
        }

        function ge(n) {
            n == null && (n = k);
            var t = ai ? at : 0;
            return et ? (wi - t - (yi[n + 1] - yi[n] - at)) / 2 : g ? (wi - g) / 2 : (st - 1) / 2
        }

        function gh() {
            var t = ai ? at : 0, n = wi + t - bv();
            return nr && !tr && (n = g ? -(g + at) * (ei - 1) - ge() : ge(ei - 1) - yi[ei - 1]), n > 0 && (n = 0), n
        }

        function ls(n) {
            var t, i;
            return n == null && (n = k), fi && !et ? g ? (t = -(g + at) * n, nr && (t += ge())) : (i = ie ? ei : st, nr && (n -= ge()), t = -n * 100 / i) : (t = -yi[n], nr && et && (t += ge())), hc && (t = Math.max(t, bf)), t + (fi && !et && !g ? "%" : "px")
        }

        function no(n) {
            cs(nt, "0s");
            nc(n)
        }

        function nc(n) {
            n == null && (n = ls());
            nt.style[uf] = wu + n + kf
        }

        function ea(n, i, u, f) {
            var s = n + st, o, e;
            for (tr || (s = Math.min(s, ei)), o = n; o < s; o++) e = ui[o], f || (e.style.left = (o - k) * 100 / st + "%"), gs && ro && (e.style[ro] = e.style[bs] = gs * (o - n) / 1e3 + "s"), r(e, i), t(e, u), f && wf.push(e)
        }

        function tc(n, t) {
            rh && fs();
            (k !== bu || t) && (bi.emit("indexChanged", fr()), bi.emit("transitionStart", fr()), sr && os(), lr && n && ["click", "keydown"].indexOf(n.type) >= 0 && io(), ku = !0, oa())
        }

        function sa(n) {
            return n.toLowerCase().replace(/-/g, "")
        }

        function uu(n) {
            var u, i, f;
            if (d || ku) {
                if (bi.emit("transitionEnd", fr(n)), !d && wf.length > 0) for (u = 0; u < wf.length; u++) i = wf[u], i.style.left = "", bs && ro && (i.style[bs] = "", i.style[ro] = ""), r(i, eo), t(i, gr);
                n && (d || n.target.parentNode !== nt) && (n.target !== nt || sa(n.propertyName) !== sa(uf)) || (rh || (f = k, fs(), k !== f && (bi.emit("indexChanged", fr()), no())), vf === "inner" && bi.emit("innerLoaded", fr()), ku = !1, bu = k)
            }
        }

        function to(n, t) {
            var r, i, u;
            if (!wr) if (n === "prev") nf(t, -1); else if (n === "next") nf(t, 1); else {
                if (ku) {
                    if (ho) return;
                    uu()
                }
                r = ns();
                i = 0;
                n === "first" ? i = -r : n === "last" ? i = d ? ut - st - r : ut - 1 - r : (typeof n != "number" && (n = parseInt(n)), isNaN(n) || (t || (n = Math.max(0, Math.min(ut - 1, n))), i = n - r));
                !d && i && Math.abs(i) < st && (u = i > 0 ? 1 : -1, i += k + i - ut >= iu ? ut * u : ut * 2 * u * -1);
                k += i;
                d && tr && (k < iu && (k += ut), k > vr && (k -= ut));
                ns(k) !== ns(bu) && tc(t)
            }
        }

        function nf(n, t) {
            var u, i, r;
            if (ku) {
                if (ho) return;
                uu()
            }
            if (!t) {
                for (n = eu(n), i = te(n); i !== pi && [si, hi].indexOf(i) < 0;) i = i.parentNode;
                r = [si, hi].indexOf(i);
                r >= 0 && (u = !0, t = r === 0 ? -1 : 1)
            }
            if (fe) {
                if (k === iu && t === -1) {
                    to("last", n);
                    return
                }
                if (k === vr && t === 1) {
                    to("first", n);
                    return
                }
            }
            t && (k += pf * t, et && (k = Math.floor(k)), tc(u || n && n.type === "keydown" ? n : null))
        }

        function kv(n) {
            var t, i;
            if (ku) {
                if (ho) return;
                uu()
            }
            for (n = eu(n), t = te(n); t !== ir && !w(t, "data-nav");) t = t.parentNode;
            if (w(t, "data-nav")) {
                var i = ef = Number(tt(t, "data-nav")), r = g || et ? i * ut / br : i * st,
                    u = pe ? i : Math.min(Math.ceil(r), ut - 1);
                to(u, n);
                pr === i && (lr && io(), ef = -1)
            }
        }

        function as() {
            po = setInterval(function () {
                nf(null, yc)
            }, ih);
            lr = !0
        }

        function vs() {
            clearInterval(po);
            lr = !1
        }

        function ha(n, t) {
            u(vi, {"data-action": n});
            vi.innerHTML = de[0] + n + de[1] + t
        }

        function ys() {
            as();
            vi && ha("stop", vu[1])
        }

        function io() {
            vs();
            vi && ha("start", vu[0])
        }

        function dv() {
            ur && !lr && (ys(), ne = !1)
        }

        function gv() {
            lr && (io(), ne = !0)
        }

        function ca() {
            lr ? (io(), ne = !0) : (ys(), ne = !1)
        }

        function ny() {
            di.hidden ? lr && (vs(), bo = !0) : bo && (as(), bo = !1)
        }

        function ty() {
            lr && (vs(), wo = !0)
        }

        function iy() {
            wo && (as(), wo = !1)
        }

        function ry(n) {
            n = eu(n);
            var t = [ou.LEFT, ou.RIGHT].indexOf(n.keyCode);
            t >= 0 && nf(n, t === 0 ? -1 : 1)
        }

        function uy(n) {
            n = eu(n);
            var t = [ou.LEFT, ou.RIGHT].indexOf(n.keyCode);
            t >= 0 && (t === 0 ? si.disabled || nf(n, -1) : hi.disabled || nf(n, 1))
        }

        function la(n) {
            n.focus()
        }

        function fy(n) {
            var r, i, t;
            (n = eu(n), r = di.activeElement, w(r, "data-nav")) && (i = [ou.LEFT, ou.RIGHT, ou.ENTER, ou.SPACE].indexOf(n.keyCode), t = Number(tt(r, "data-nav")), i >= 0 && (i === 0 ? t > 0 && la(yr[t - 1]) : i === 1 ? t < br - 1 && la(yr[t + 1]) : (ef = t, to(t, n))))
        }

        function eu(n) {
            return n = n || fu.event, cf(n) ? n.changedTouches[0] : n
        }

        function te(n) {
            return n.target || fu.event.srcElement
        }

        function cf(n) {
            return n.type.indexOf("touch") >= 0
        }

        function aa(n) {
            n.preventDefault ? n.preventDefault() : n.returnValue = !1
        }

        function va() {
            return ni(gt(dr.y - of.y, dr.x - of.x), co) === y.axis
        }

        function ya(n) {
            if (ku) {
                if (ho) return;
                uu()
            }
            ur && lr && vs();
            sf = !0;
            kr && (it(kr), kr = null);
            var t = eu(n);
            bi.emit(cf(n) ? "touchStart" : "dragStart", fr(n));
            !cf(n) && ["img", "a"].indexOf(ia(te(n))) >= 0 && aa(n);
            dr.x = of.x = t.clientX;
            dr.y = of.y = t.clientY;
            d && (ko = parseFloat(nt.style[uf].replace(wu, "")), cs(nt, "0s"))
        }

        function pa(n) {
            if (sf) {
                var t = eu(n);
                dr.x = t.clientX;
                dr.y = t.clientY;
                d ? kr || (kr = l(function () {
                    wa(n)
                })) : (ru === "?" && (ru = va()), ru && (we = !0));
                we && n.preventDefault()
            }
        }

        function wa(n) {
            var t, i, r;
            if (!ru) {
                sf = !1;
                return
            }
            if (it(kr), sf && (kr = l(function () {
                wa(n)
            })), ru === "?" && (ru = va()), ru) {
                !we && cf(n) && (we = !0);
                try {
                    n.type && bi.emit(cf(n) ? "touchMove" : "dragMove", fr(n))
                } catch (u) {
                }
                t = ko;
                i = vh(dr, of);
                !fi || g || et ? (t += i, t += "px") : (r = ie ? i * st * 100 / ((wi + at) * ei) : i * 100 / (wi + at), t += r, t += "%");
                nt.style[uf] = wu + t + kf
            }
        }

        function ps(t) {
            var u, r, f;
            sf && (kr && (it(kr), kr = null), d && cs(nt, ""), sf = !1, u = eu(t), dr.x = u.clientX, dr.y = u.clientY, r = vh(dr, of), Math.abs(r) && (cf(t) || (f = te(t), n(f, {
                click: function e(n) {
                    aa(n);
                    i(f, {click: e})
                }
            })), d ? kr = l(function () {
                var i, u, n;
                if (fi && !et) i = -r * st / (wi + at), i = r > 0 ? Math.floor(i) : Math.ceil(i), k += i; else if (u = -(ko + r), u <= 0) k = iu; else if (u >= yi[ei - 1]) k = vr; else for (n = 0; n < ei && u >= yi[n];) k = n, u > yi[n] && r < 0 && (k += 1), n++;
                tc(t, r);
                bi.emit(cf(t) ? "touchEnd" : "dragEnd", fr(t))
            }) : ru && nf(t, r > 0 ? -1 : 1)));
            y.preventScrollOnTouch === "auto" && (we = !1);
            co && (ru = "?");
            ur && !lr && as()
        }

        function ic() {
            var n = hr ? hr : or;
            n.style.height = yi[k + st] - yi[k] + "px"
        }

        function ba() {
            var n = g ? (g + at) * ut / wi : ut / st;
            return Math.min(Math.ceil(n), ut)
        }

        function ka() {
            if (tu && !pe && br !== ff) {
                var n = ff, t = br, i = e;
                for (ff > br && (n = br, t = ff, i = f); n < t;) i(yr[n]), n++;
                ff = br
            }
        }

        function fr(n) {
            return {
                container: nt,
                slideItems: ui,
                navContainer: ir,
                navItems: yr,
                controlsContainer: pi,
                hasControls: ao,
                prevButton: si,
                nextButton: hi,
                items: st,
                slideBy: pf,
                cloneCount: ki,
                slideCount: ut,
                slideCountNew: ei,
                index: k,
                indexCached: bu,
                displayIndex: wc(),
                navCurrentIndex: pr,
                navCurrentIndexCached: df,
                pages: br,
                pagesCached: ff,
                sheet: oi,
                isOn: ue,
                event: n || {}
            }
        }

        var ws, lf, fo, ds, yf, fs, oa;
        y = rt({
            container: ".slider",
            mode: "carousel",
            axis: "horizontal",
            items: 1,
            gutter: 0,
            edgePadding: 0,
            fixedWidth: !1,
            autoWidth: !1,
            viewportMax: !1,
            slideBy: 1,
            center: !1,
            controls: !0,
            controlsPosition: "top",
            controlsText: ["prev", "next"],
            controlsContainer: !1,
            prevButton: !1,
            nextButton: !1,
            nav: !0,
            navPosition: "top",
            navContainer: !1,
            navAsThumbnails: !1,
            arrowKeys: !1,
            speed: 300,
            autoplay: !1,
            autoplayPosition: "top",
            autoplayTimeout: 5e3,
            autoplayDirection: "forward",
            autoplayText: ["start", "stop"],
            autoplayHoverPause: !1,
            autoplayButton: !1,
            autoplayButtonOutput: !0,
            autoplayResetOnVisibility: !0,
            animateIn: "tns-fadeIn",
            animateOut: "tns-fadeOut",
            animateNormal: "tns-normal",
            animateDelay: !1,
            loop: !0,
            rewind: !1,
            autoHeight: !1,
            responsive: !1,
            lazyload: !1,
            lazyloadSelector: ".tns-lazy-img",
            touch: !0,
            mouseDrag: !1,
            swipeAngle: 15,
            nested: !1,
            preventActionWhenRunning: !1,
            preventScrollOnTouch: !1,
            freezable: !0,
            onInit: !1,
            useLocalStorage: !0
        }, y || {});
        var di = document, fu = window, ou = {ENTER: 13, SPACE: 32, LEFT: 37, RIGHT: 39}, ot = {},
            gi = y.useLocalStorage;
        if (gi) {
            ws = navigator.userAgent;
            lf = new Date;
            try {
                ot = fu.localStorage;
                ot ? (ot.setItem(lf, lf), gi = ot.getItem(lf) == lf, ot.removeItem(lf)) : gi = !1;
                gi || (ot = {})
            } catch (ey) {
                gi = !1
            }
            gi && (ot.tnsApp && ot.tnsApp !== ws && ["tC", "tPL", "tMQ", "tTf", "t3D", "tTDu", "tTDe", "tADu", "tADe", "tTE", "tAE"].forEach(function (n) {
                ot.removeItem(n)
            }), localStorage.tnsApp = ws)
        }
        var tf = ot.tC ? o(ot.tC) : s(ot, "tC", pt(), gi), rc = ot.tPL ? o(ot.tPL) : s(ot, "tPL", wt(), gi),
            af = ot.tMQ ? o(ot.tMQ) : s(ot, "tMQ", bt(), gi),
            ie = ot.tTf ? o(ot.tTf) : s(ot, "tTf", b("transform"), gi),
            da = ot.t3D ? o(ot.t3D) : s(ot, "t3D", ti(ie), gi),
            rr = ot.tTDu ? o(ot.tTDu) : s(ot, "tTDu", b("transitionDuration"), gi),
            ro = ot.tTDe ? o(ot.tTDe) : s(ot, "tTDe", b("transitionDelay"), gi),
            uo = ot.tADu ? o(ot.tADu) : s(ot, "tADu", b("animationDuration"), gi),
            bs = ot.tADe ? o(ot.tADe) : s(ot, "tADe", b("animationDelay"), gi),
            rf = ot.tTE ? o(ot.tTE) : s(ot, "tTE", lt(rr, "Transition"), gi),
            uc = ot.tAE ? o(ot.tAE) : s(ot, "tAE", lt(uo, "Animation"), gi),
            fc = fu.console && typeof fu.console.warn == "function",
            ks = ["container", "controlsContainer", "prevButton", "nextButton", "navContainer", "autoplayButton"],
            ec = {};
        if (ks.forEach(function (n) {
            if (typeof y[n] == "string") {
                var i = y[n], t = di.querySelector(i);
                if (ec[n] = i, t && t.nodeName) y[n] = t; else {
                    fc && console.warn("Can't find", y[n]);
                    return
                }
            }
        }), y.container.children.length < 1) {
            fc && console.warn("No slides found in", y.container);
            return
        }
        var ci = y.responsive, vf = y.nested, d = y.mode === "carousel" ? !0 : !1;
        if (ci) {
            0 in ci && (y = rt(y, ci[0]), delete ci[0]);
            fo = {};
            for (ds in ci) yf = ci[ds], yf = typeof yf == "number" ? {items: yf} : yf, fo[ds] = yf;
            ci = fo;
            fo = null
        }
        if (d || oc(y), !d) {
            y.axis = "horizontal";
            y.slideBy = "page";
            y.edgePadding = !1;
            var su = y.animateIn, eo = y.animateOut, gs = y.animateDelay, gr = y.animateNormal
        }
        var fi = y.axis === "horizontal" ? !0 : !1, er = di.createElement("div"), or = di.createElement("div"), hr,
            nt = y.container, nh = nt.parentNode, sc = nt.outerHTML, ui = nt.children, ut = ui.length, re, oo = dc(),
            ue = !1;
        ci && cl();
        d && (nt.className += " tns-vpfix");
        var et = y.autoWidth, g = ft("fixedWidth"), ai = ft("edgePadding"), at = ft("gutter"), wi = nl(),
            nr = ft("center"), st = et ? 1 : Math.floor(ft("items")), pf = ft("slideBy"),
            th = y.viewportMax || y.fixedWidthViewportWidth, hu = ft("arrowKeys"), ar = ft("speed"), fe = y.rewind,
            tr = fe ? !1 : y.loop, sr = ft("autoHeight"), nu = ft("controls"), cu = ft("controlsText"), tu = ft("nav"),
            lu = ft("touch"), au = ft("mouseDrag"), ur = ft("autoplay"), ih = ft("autoplayTimeout"),
            vu = ft("autoplayText"), yu = ft("autoplayHoverPause"), pu = ft("autoplayResetOnVisibility"), oi = kt(),
            so = y.lazyload, oy = y.lazyloadSelector, yi, wf = [], ki = tr ? fv() : 0, ei = d ? ut + ki * 2 : ut + ki,
            hc = (g || et) && !tr ? !0 : !1, bf = g ? gh() : null, rh = !d || !tr ? !0 : !1, uf = fi ? "left" : "top",
            wu = "", kf = "", ee = function () {
                return g ? function () {
                    return nr && !tr ? ut - 1 : Math.ceil(-bf / (g + at))
                } : et ? function () {
                    for (var n = ei; n--;) if (yi[n] >= -bf) return n
                } : function () {
                    return nr && d && !tr ? ut - 1 : tr || d ? Math.max(0, ei - Math.ceil(st)) : ei - 1
                }
            }(), k = bc(ft("startIndex")), bu = k, sy = wc(), iu = 0, vr = et ? null : ee(), ga,
            ho = y.preventActionWhenRunning, co = y.swipeAngle, ru = co ? "?" : !0, ku = !1, uh = y.onInit, bi = new ii,
            du = " tns-slider tns-" + y.mode, li = nt.id || yt(), cr = ft("disable"), oe = !1, lo = y.freezable,
            wr = lo && !et ? ph() : !1, se = !1, he = {click: nf, keydown: uy}, fh = {click: kv, keydown: fy},
            ce = {mouseover: ty, mouseout: iy}, le = {visibilitychange: ny}, ae = {keydown: ry},
            ve = {touchstart: ya, touchmove: pa, touchend: ps, touchcancel: ps},
            ye = {mousedown: ya, mousemove: pa, mouseup: ps, mouseleave: ps}, ao = gu("controls"), eh = gu("nav"),
            pe = et ? !0 : y.navAsThumbnails, oh = gu("autoplay"), cc = gu("touch"), lc = gu("mouseDrag"),
            sh = "tns-slide-active", hh = "tns-complete", vo = {load: av, error: vv}, ch, lh,
            we = y.preventScrollOnTouch === "force" ? !0 : !1;
        if (ao) var pi = y.controlsContainer, ac = y.controlsContainer ? y.controlsContainer.outerHTML : "",
            si = y.prevButton, hi = y.nextButton, nv = y.prevButton ? y.prevButton.outerHTML : "",
            tv = y.nextButton ? y.nextButton.outerHTML : "", be, ke;
        if (eh) var ir = y.navContainer, vc = y.navContainer ? y.navContainer.outerHTML : "", yr, br = et ? ut : ba(),
            ff = 0, ef = -1, pr = kc(), df = pr, yo = "tns-nav-active", gf = "Carousel Page ", ah = " (Current Slide)";
        if (oh) var yc = y.autoplayDirection === "forward" ? 1 : -1, vi = y.autoplayButton,
            pc = y.autoplayButton ? y.autoplayButton.outerHTML : "",
            de = ["<span class='tns-visually-hidden'>", " animation<\/span>"], po, lr, wo, ne, bo;
        if (cc || lc) var of = {}, dr = {}, ko, iv, rv, sf = !1, kr, vh = fi ? function (n, t) {
            return n.x - t.x
        } : function (n, t) {
            return n.y - t.y
        };
        return et || go(cr || wr), ie && (uf = ie, wu = "translate", da ? (wu += fi ? "3d(" : "3d(0px, ", kf = fi ? ", 0px, 0px)" : ", 0px)") : (wu += fi ? "X(" : "Y(", kf = ")")), d && (nt.className = nt.className.replace("tns-vpfix", "")), ov(), sv(), rl(), fs = function () {
            return tr ? d ? function () {
                var t = iu, n = vr;
                t += pf;
                n -= pf;
                ai ? (t += 1, n -= 1) : g && (wi + at) % (g + at) && (n -= 1);
                ki && (k > n ? k -= ut : k < t && (k += ut))
            } : function () {
                if (k > vr) while (k >= iu + ut) k -= ut; else if (k < iu) while (k <= vr - ut) k += ut
            } : function () {
                k = Math.max(iu, Math.min(vr, k))
            }
        }(), oa = function () {
            return d ? function () {
                cs(nt, "");
                rr || !ar ? (nc(), ar && ct(nt) || uu()) : ri(nt, uf, wu, kf, ls(), ar, uu);
                fi || ic()
            } : function () {
                wf = [];
                var t = {};
                t[rf] = t[uc] = uu;
                i(ui[bu], t);
                n(ui[k], t);
                ea(bu, su, eo, !0);
                ea(k, gr, su);
                rf && uc && ar && ct(nt) || uu()
            }
        }(), {
            version: "2.9.2",
            getInfo: fr,
            events: bi,
            goTo: to,
            play: dv,
            pause: gv,
            isOn: ue,
            updateSliderHeight: na,
            refresh: rl,
            destroy: hv,
            rebuild: function () {
                return vt(rt(y, ec))
            }
        }
    }
}();
portal = portal || {};
jQuery(function () {
    var n, i, r, t;
    jQuery("span.count").text() == "(0)" && $("span.count").text("");
    $("#standingPromo").modal({backdrop: "static", keyboard: !1});
    $(".close").on("click", function () {
        var n = function (n) {
            var t = n.prop("src").replace("autoplay=1", "autoplay=0");
            n.prop("src", t)
        };
        n($("#video"))
    });
    $(".gift-aid").after($("#NextButton"));
    $("a").on("hover", function () {
        $("a.register-church").each(function () {
            this.search = "";
            this.href += "?returnUrl=" + location.pathname
        })
    });
    // $("span,p,div,ul,h1,h2,h3,h4,h5,h6").not(".yui-panel-container.shadow.focused.xrm-editable-toolbar-pinned").not(".xrm-editable-panel.xrm-editable-toolbar.yui-module.yui-overlay.yui-panel").not(".yui-panel-container.yui-overlay-hidden").not(".xrm-editable-panel.xrm-editable-controls.yui-module.yui-overlay.yui-panel").removeAttr("style");
    $(".meet-slider__slides").length && (n = tns({
        container: ".meet-slider__slides",
        items: 7,
        slideBy: 1,
        gutter: 20,
        navPosition: "bottom",
        slideBy: 1,
        mouseDrag: !0,
        controls: !1,
        responsive: {0: {items: 2}, 600: {items: 3}, 1e3: {items: 4}, 1200: {items: 6}}
    }), document.querySelector(".slider-next").onclick = function () {
        n.goTo("next")
    }, document.querySelector(".slider-prev").onclick = function () {
        n.goTo("prev")
    });
    $(".get-involved-slider__slides").length && (i = tns({
        container: ".get-involved-slider__slides",
        items: 5,
        slideBy: 1,
        gutter: 20,
        navPosition: "bottom",
        slideBy: "page",
        mouseDrag: !0,
        controls: !1,
        responsive: {0: {items: 2}, 768: {items: 3}, 1e3: {items: 4}, 1200: {items: 5}}
    }));
    $(".take-action__listing").length && (r = tns({
        container: ".take-action__listing",
        items: 2,
        slideBy: 1,
        gutter: 20,
        navPosition: "bottom",
        slideBy: "page",
        mouseDrag: !0,
        controls: !1,
        responsive: {768: {disable: !0}}
    }));
    $(".featured-action-slider__slides").length && (t = tns({
        container: ".featured-action-slider__slides",
        items: 2,
        slideBy: 1,
        gutter: 20,
        navPosition: "bottom",
        slideBy: 1,
        mouseDrag: !0,
        controls: !1,
        responsive: {0: {items: 1}, 900: {items: 2}}
    }), document.querySelector(".slider-next").onclick = function () {
        t.goTo("next")
    }, document.querySelector(".slider-prev").onclick = function () {
        t.goTo("prev")
    });
    $(".btn-donate").click(function () {
        $(".btn-donate").removeClass("active");
        $(this).addClass("active");
        $(".donate-other").val("")
    });
    $(".donate-other").click(function () {
        $(".btn-donate").removeClass("active");
        $(this).addClass("active")
    });
    $(".donate-submit").click(function () {
        $(".donate-other").val() ? $(".donate-amount").val($(".donate-other").val()) : $(".donate-amount").val($(".btn-donate.active").data("amount"));
        alert("Processing the form: donation = £" + $(".donate-amount").val())
    });
    $(document).click(function (n) {
        $(n.target).is(".search-field") || ($("#header-search-form,#header-search-form-tablet").collapse("hide"), $(".main-navigation ul.navbar-nav").css("opacity", "1"))
    });
    $(".btn.btn-subscribe").on("click", function () {
        window.location.href = window.location.origin + "/resources/email-preferences/"
    });
    // $(".latest__stories-listing").length && $(".latest__stories-listing article").click(function () {
    //     return window.location = $(this).find("a:first").attr("href"), !1
    // });
    $(".get-involved-slider").length && $(".get-involved-slider__slide").click(function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $(".js-apply-links-list").length && $(".js-apply-links-list li").click(function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $(".js-apply-links-card").length && $(".js-apply-links-card .card").click(function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $(".latest-stories__listing").length && $(".latest-stories__item").live("click", function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $(".js-apply-links-article").length && $(".js-apply-links-article article").click(function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $(".featured-action-slider").length && $(".featured-action-slider__slide").click(function () {
        return window.location = $(this).find("a:first").attr("href"), !1
    });
    $('[data-toggle="tooltip"]').tooltip();
    $("select.country-select").change(function () {
        window.location.replace($(this).val())
    });
    $(".navbar-nav a").each(function () {
        $(this).attr("href").split("/")[1] == window.location.pathname.split("/")[1] && $(this).addClass("active")
    });
    $(".product.pagination").insertAfter($(".col-md-10.ml-auto.mr-auto:first"));
    $(".navbar-collapse").attr("id", "navbarSupportedContent");
    // $("#subscription").on("click", function () {
    //     var t, i = $(this), n = $("#summary-errors");
    //     if ($(".od-subscribe-form")[0].checkValidity()) return i.text("Processing"), $.blockUI({
    //         message: null,
    //         overlayCSS: {opacity: .3}
    //     }), fetch("/api/token?key=lkfj9Q6Rea3KKRu58jTySOS6CN4l0VxY").then(function (n) {
    //         return n.ok ? n.json() : Promise.reject(n)
    //     }).then(function (n) {
    //         return t = n, fetch("/api/indemailsubscription", {
    //             method: "post",
    //             headers: {
    //                 Accept: "application/json",
    //                 "Content-Type": "application/json",
    //                 Authorization: `Bearer ${t.token}`
    //             },
    //             body: JSON.stringify({
    //                 Firstname: $("#input-firstname").val(),
    //                 Lastname: $("#input-lastname").val(),
    //                 Email: $("#input-email").val(),
    //                 Dob: $("#input-dob").val(),
    //                 Optin: $("#check-optin").is(":checked"),
    //                 Htsbf: $("#input-htsbf").val(),
    //                 OptinActivistAlumni: $("#check-optin-activist-alumni").is(":checked"),
    //                 CampId: $("#input-campid").val()
    //             })
    //         })
    //     }).then(function (n) {
    //         return n.ok ? n.json() : Promise.reject(n)
    //     }).then(function (t) {
    //         if (n.html(""), !t.success) {
    //             i.text("Subscribe");
    //             $.unblockUI();
    //             for (var r = 0; r < t.errors.length; r++) n.removeClass("invisible").addClass("visible").append("<li>" + t.errors[r] + "<\/li>")
    //         }
    //         t.success && (n.addClass("invisible"), $(".od-subscribe-form").addClass("text-center large-label").html("<span class='action-label'>Thank you for signing up to our monthly email.<br>Check your inbox to find out what's in store!<\/span>").hide().fadeIn(8e3), $.unblockUI())
    //     }).catch(n => {
    //         throw n;
    //     }), !1
    // });
    $(".latest-stories__row div").hide().slice(0, 39).show();
    // $("#load-more").on("click", function (n) {
    //     n.preventDefault();
    //     var t = location.href.contains("news") ? "stories" : "resources";
    //     $(".latest-stories__row div:hidden").slice(0, 39).slideDown();
    //     $(".latest-stories__row div:hidden").length === 0 && $("#load-more").css("pointer-events", "none").text("No more " + t);
    //     $("html,body").animate({scrollTop: $(this).offset().top}, 600)
    // });
    $("a[href=#top]").click(function () {
        return $("body,html").animate({scrollTop: 0}, 600), !1
    });
    // $(window).scroll(function () {
    //     $(this).scrollTop() > 1600 ? $(".to-top").show() : $(".to-top").hide()
    // });
    $("#filter_by_one,#filter_by_two,#filter_by_three,#filter_by_four,#sort_by").on("change", function () {
        var n = $("#filter_by_one").val(), t = $("#filter_by_two").val(), r = $("#filter_by_three").val(),
            u = $("#filter_by_four").val(), i = $("#sort_by").val();
        $(document).ajaxStart($.blockUI({message: null})).ajaxStop($.unblockUI);
        $.ajax({
            type: "GET", url: $(location).attr("protocol"), dataType: "text", success: function () {
                n === "" && t === "" && r === "" && u === "" && i === "" ? location.reload(!0) : location.href.contains("churches") && $(".latest-stories__row").load(location.href + " .latest-stories__row>*", "?ref=od&topic=" + n + "&filetype=" + t + "&resourcetype=" + r + "&theme=" + u);
                n === "" && t === "" && i === "" ? location.reload(!0) : (location.href.contains("news") || location.href.contains("stories")) && $(".latest-stories__row").load(location.href + " .latest-stories__row>*", "?ref=od&topic=" + n + "&tagtype=" + t + "&publish=" + i)
            }
        })
    })
});
jQuery(window).load(function () {
    var n = $(".count");
    n.text() == "()" && n.text("(0)")
});
$("#under21").click(function () {
    var n = $("#selectdob");
    $(this).is(":checked") ? n.show() : (n.hide(), $("#billingdob").val(""))
});
$("#gobochk").click(function () {
    var n = $("#gobo-name,#gobo-postcode"), t = $(".gao");
    $(this).is(":checked") ? (n.removeClass("d-none"), t.addClass("d-none")) : (n.addClass("d-none"), t.removeClass("d-none"), $("#billingorgname,#billingorgpostcode").val(""))
});
portal.initializeHtmlEditors = function () {
    var n = $("[data-app-path]").data("app-path") || "/";
    $(document).on("focusin", function (n) {
        $(n.target).closest(".mce-window").length && n.stopImmediatePropagation()
    });
    $(".html-editors textarea").each(function () {
        CKEDITOR.replace(this, {
            customConfig: "",
            height: 240,
            uiColor: "#EEEEEE",
            contentsCss: [n + "css/bootstrap.min.css", n + "css/ckeditor.css"],
            stylesSet: "portal",
            format_tags: "p;h1;h2;h3;h4;h5;h6;pre",
            disableNativeSpellChecker: !1,
            toolbarGroups: [{name: "clipboard", groups: ["clipboard", "undo"]}, {
                name: "links",
                groups: ["links"]
            }, {name: "editing", groups: ["find", "selection", "spellchecker", "editing"]}, {
                name: "insert",
                groups: ["insert"]
            }, {name: "forms", groups: ["forms"]}, {name: "tools", groups: ["tools"]}, {
                name: "document",
                groups: ["document", "doctools", "mode"]
            }, "/", {name: "basicstyles", groups: ["basicstyles", "cleanup"]}, {
                name: "paragraph",
                groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"]
            }, {name: "styles", groups: ["styles"]}, {name: "colors", groups: ["colors"]}, {
                name: "others",
                groups: ["others"]
            }, {name: "about", groups: ["about"]}],
            removeButtons: "Save,NewPage,Preview,Print,Templates,SelectAll,Find,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Anchor,Flash,Smiley,PageBreak,Iframe,ShowBlocks,Font,FontSize,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiRtl,BidiLtr,Language,TextColor,BGColor,About,Subscript,Superscript,Underline",
            on: {
                change: function () {
                    this.updateElement()
                }
            }
        })
    })
}, function (n, t) {
    function u(t, i) {
        var r = n(".notifications"), u, f;
        r.length == 0 && (u = n(".page-heading"), r = u.length == 0 ? n("<div class='notifications'><\/div>").prependTo(n("#content-container")) : n("<div class='notifications'><\/div>").appendTo(u));
        r.find(".notification").slideUp().remove();
        typeof t != typeof undefined && t !== !1 && t != null && t != "" && (f = n("<div class='notification alert alert-success success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;<\/span><\/button>" + t + "<\/div>").on("closed.bs.alert", function () {
            r.find(".notification").length == 0 && r.hide()
        }).prependTo(r), r.show(), window.scrollTo(0, 0), i && setTimeout(function () {
            f.slideUp(100).remove();
            r.find(".notification").length == 0 && r.hide()
        }, 5e3))
    }

    var r = n(".username").text(), i;
    (r !== "" && (CKEDITOR.stylesSet.add("portal", [{name: "Code", element: "code"}, {
        name: "Code Block",
        element: "pre",
        attributes: {"class": "linenums prettyprint"}
    }]), n(function () {
        var t;
        portal.convertAbbrDateTimesToTimeAgo(n);
        t = n(".facebook-signin");
        t.on("click", function (n) {
            n.preventDefault();
            window.open(t.attr("href"), "facebook_auth", "menubar=1,resizable=1,scrollbars=yes,width=800,height=600")
        });
        n(".crmEntityFormView input:not([value])[readonly]:not([placeholder]), .crmEntityFormView input[value=''][readonly]:not([placeholder])").each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".crmEntityFormView select[disabled] option:checked[value='']").closest("select").each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".crmEntityFormView textarea[readonly]").filter(function () {
            return n(this).val().length === 0
        }).each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".btn-select").each(function () {
            var t = n(this), i = n(t.data("target")), r = n("option:selected", i), f = n(t.data("focus")),
                u = n(".btn .selected", t);
            r.length > 0 && (u.text(r.text()), n('.dropdown-menu li > a[data-value="' + r.val() + '"]', t).parent("li").addClass("active"));
            i.change(function () {
                var r = n("option:selected", i);
                t.find(".dropdown-menu li.active").removeClass("active");
                u.text(r.text());
                n('.dropdown-menu li > a[data-value="' + r.val() + '"]', t).parent("li").addClass("active")
            });
            n(".dropdown-menu li > a", t).click(function () {
                var r = n(this), e = r.data("value");
                n(".dropdown-menu li", t).removeClass("active");
                r.parent("li").addClass("active");
                i.val(e);
                u.text(r.text());
                f.focus()
            })
        });
        n("abbr.timestamp").each(function () {
            var t = n(this), i = t.text(), r = Date.parse(i);
            if (r) {
                t.attr("title", i);
                var u = dateFormatConverter.convert(t.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    f = dateFormatConverter.convert(t.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    e = dateFormatConverter.convert(t.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || u + " " + f;
                t.text(moment(r).format(e))
            }
        });
        var i = dateFormatConverter.convert(n(".crmEntityFormView").closest("[data-dateformat]").data("dateformat") || "MM/dd/yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
            r = dateFormatConverter.convert(n(".crmEntityFormView").closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
            u = i + " " + r;
        n("time").each(function () {
            if (moment) {
                var t = n(this).attr("datetime");
                n(this).hasClass("date-only") ? n(this).text(moment(t).format(i)) : n(this).text(moment(t).format(u))
            }
        });
        n(".vevent").each(function () {
            var t = n(".dtstart", this), i = n(".dtend", this), s = t.text(), h = i.text(), r = Date.parse(s),
                u = Date.parse(h), c;
            if (r) {
                t.attr("title", s);
                var e = dateFormatConverter.convert(t.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    f = dateFormatConverter.convert(t.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    o = dateFormatConverter.convert(t.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || e + " " + f;
                t.text(moment(r).format(o))
            }
            u && (i.attr("title", h), c = r && r.getYear() == u.getYear() && r.getMonth() == u.getMonth() && r.getDate() == u.getDate(), e = dateFormatConverter.convert(i.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs), f = dateFormatConverter.convert(i.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs), o = dateFormatConverter.convert(i.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || e + " " + f, i.text(moment(u).format(c ? f : o)))
        });
        n.ui && n.ui.tooltip && n.widget.bridge("uitooltip", n.ui.tooltip);
        n(".has-tooltip").tooltip(), function () {
            var t = {};
            n(".shopping-cart-status").each(function () {
                var r = n(this), u = r.attr("data-href"), f = r.find(".count"), e = f.find(".value"), i;
                u && (i = t[u], n.isArray(i) || (i = t[u] = []), i.push(function (n) {
                    n != null && n.Count && n.Count > 0 && (e.text(n.Count), f.addClass("visible"), r.addClass("visible"))
                }))
            });
            n.each(t, function (t, i) {
                n.getJSON(t, function (t) {
                    n.each(i, function (n, i) {
                        i(t)
                    })
                })
            })
        }();
        n('[data-state="sitemap"]').each(function () {
            var t = n(this), r = t.data("sitemap-current"), u = t.data("sitemap-ancestor"),
                f = t.closest("[data-sitemap-state]").data("sitemap-state"), i, e;
            f && (r || u) && (i = f.split(":"), e = i[i.length - 1], t.find("[data-sitemap-node]").each(function () {
                var f = n(this), t = f.data("sitemap-node");
                t && n.each(i, function (n, i) {
                    n === 0 ? r && i == t && f.addClass(r) : u && i == t && t != e && f.addClass(u)
                })
            }))
        }), function () {
            var t = URI ? URI(document.location.href).search(!0) || {} : {};
            n("[data-query]").each(function () {
                var i = n(this), r = t[i.data("query")];
                typeof r != "undefined" && i.val(r).change()
            })
        }()
    }), typeof t != "undefined" && t && (t.zindex = 2e3, function () {
        for (var r, u, f, e, o = [t.ckeditorSettings, t.ckeditorCompactSettings], i = 0; i < o.length; i++) (r = o[i], r) && (u = n('head > link[rel="stylesheet"]').map(function (t, i) {
            var r = n(i).attr("href");
            return r.match(/,/) ? null : r
        }).get(), u.push((n("[data-app-path]").data("app-path") || "/") + "css/ckeditor.css"), r.contentsCss = u);
        if (f = CKEDITOR.stylesSet.get("cms"), f) for (e = [{
            name: "Page Header",
            element: "div",
            attributes: {"class": "page-header"}
        }, {name: "Alert (Info)", element: "div", attributes: {"class": "alert alert-info"}}, {
            name: "Alert (Success)",
            element: "div",
            attributes: {"class": "alert alert-success"}
        }, {
            name: "Alert (Warning)",
            element: "div",
            attributes: {"class": "alert alert-warning"}
        }, {name: "Alert (Danger)", element: "div", attributes: {"class": "alert alert-danger"}}, {
            name: "Well",
            element: "div",
            attributes: {"class": "well"}
        }, {name: "Well (Small)", element: "div", attributes: {"class": "well well-sm"}}, {
            name: "Well (Large",
            element: "div",
            attributes: {"class": "well well-lg"}
        }, {name: "Label", element: "span", attributes: {"class": "label label-default"}}, {
            name: "Label (Info)",
            element: "span",
            attributes: {"class": "label label-info"}
        }, {
            name: "Label (Success)",
            element: "span",
            attributes: {"class": "label label-success"}
        }, {
            name: "Label (Warning)",
            element: "span",
            attributes: {"class": "label label-warning"}
        }, {
            name: "Label (Danger)",
            element: "span",
            attributes: {"class": "label label-danger"}
        }], i = 0; i < e.length; i++) f.push(e[i])
    }())), portal.initializeHtmlEditors(), n(function () {
        var t;
        t = n(".facebook-signin");
        t.on("click", function (n) {
            n.preventDefault();
            window.open(t.attr("href"), "facebook_auth", "menubar=1,resizable=1,scrollbars=yes,width=800,height=600")
        });
        n(".crmEntityFormView input:not([value])[readonly]:not([placeholder]), .crmEntityFormView input[value=''][readonly]:not([placeholder])").each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".crmEntityFormView select[disabled] option:checked[value='']").closest("select").each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".crmEntityFormView textarea[readonly]").filter(function () {
            return n(this).val().length === 0
        }).each(function () {
            n(this).after(n("<div>&mdash;<\/div>").addClass("text-muted").css("position", "absolute").css("top", n(this).position().top + 7).css("left", n(this).position().left + 2))
        });
        n(".btn-select").each(function () {
            var t = n(this), i = n(t.data("target")), r = n("option:selected", i), f = n(t.data("focus")),
                u = n(".btn .selected", t);
            r.length > 0 && (u.text(r.text()), n('.dropdown-menu li > a[data-value="' + r.val() + '"]', t).parent("li").addClass("active"));
            i.change(function () {
                var r = n("option:selected", i);
                t.find(".dropdown-menu li.active").removeClass("active");
                u.text(r.text());
                n('.dropdown-menu li > a[data-value="' + r.val() + '"]', t).parent("li").addClass("active")
            });
            n(".dropdown-menu li > a", t).click(function () {
                var r = n(this), e = r.data("value");
                n(".dropdown-menu li", t).removeClass("active");
                r.parent("li").addClass("active");
                i.val(e);
                u.text(r.text());
                f.focus()
            })
        });
        n("abbr.timestamp").each(function () {
            var t = n(this), i = t.text(), r = Date.parse(i);
            if (r) {
                t.attr("title", i);
                var u = dateFormatConverter.convert(t.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    f = dateFormatConverter.convert(t.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    e = dateFormatConverter.convert(t.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || u + " " + f;
                t.text(moment(r).format(e))
            }
        });
        var i = dateFormatConverter.convert(n(".crmEntityFormView").closest("[data-dateformat]").data("dateformat") || "MM/dd/yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
            r = dateFormatConverter.convert(n(".crmEntityFormView").closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
            u = i + " " + r;
        n("time").each(function () {
            if (moment) {
                var t = n(this).attr("datetime");
                n(this).hasClass("date-only") ? n(this).text(moment(t).format(i)) : n(this).text(moment(t).format(u))
            }
        });
        n(".vevent").each(function () {
            var t = n(".dtstart", this), i = n(".dtend", this), s = t.text(), h = i.text(), r = Date.parse(s),
                u = Date.parse(h), c;
            if (r) {
                t.attr("title", s);
                var e = dateFormatConverter.convert(t.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    f = dateFormatConverter.convert(t.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs),
                    o = dateFormatConverter.convert(t.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || e + " " + f;
                t.text(moment(r).format(o))
            }
            u && (i.attr("title", h), c = r && r.getYear() == u.getYear() && r.getMonth() == u.getMonth() && r.getDate() == u.getDate(), e = dateFormatConverter.convert(i.closest("[data-dateformat]").data("dateformat") || "MMMM d, yyyy", dateFormatConverter.dotNet, dateFormatConverter.momentJs), f = dateFormatConverter.convert(i.closest("[data-timeformat]").data("timeformat") || "h:mm tt", dateFormatConverter.dotNet, dateFormatConverter.momentJs), o = dateFormatConverter.convert(i.attr("data-format"), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || e + " " + f, i.text(moment(u).format(c ? f : o)))
        });
        n(".carousel").carousel();
        n.ui && n.ui.tooltip && n.widget.bridge("uitooltip", n.ui.tooltip);
        n(".has-tooltip").tooltip(), function () {
            var t = {};
            n(".shopping-cart-status").each(function () {
                var r = n(this), u = r.attr("data-href"), f = r.find(".count"), e = f.find(".value"), i;
                u && (i = t[u], n.isArray(i) || (i = t[u] = []), i.push(function (n) {
                    n != null && n.Count && n.Count > 0 && (e.text(n.Count), f.addClass("visible"), r.addClass("visible"))
                }))
            });
            n.each(t, function (t, i) {
                n.getJSON(t, function (t) {
                    n.each(i, function (n, i) {
                        i(t)
                    })
                })
            })
        }();
        n('[data-state="sitemap"]').each(function () {
            var t = n(this), r = t.data("sitemap-current"), u = t.data("sitemap-ancestor"),
                f = t.closest("[data-sitemap-state]").data("sitemap-state"), i, e;
            f && (r || u) && (i = f.split(":"), e = i[i.length - 1], t.find("[data-sitemap-node]").each(function () {
                var f = n(this), t = f.data("sitemap-node");
                t && n.each(i, function (n, i) {
                    n === 0 ? r && i == t && f.addClass(r) : u && i == t && t != e && f.addClass(u)
                })
            }))
        }), function () {
            var t = URI ? URI(document.location.href).search(!0) || {} : {};
            n("[data-query]").each(function () {
                var i = n(this), r = t[i.data("query")];
                typeof r != "undefined" && i.val(r).change()
            })
        }()
    }), typeof t != "undefined" && t && (t.zindex = 2e3, function () {
        for (var r, u, f, e, o = [t.ckeditorSettings, t.ckeditorCompactSettings], i = 0; i < o.length; i++) (r = o[i], r) && (u = n('head > link[rel="stylesheet"]').map(function (t, i) {
            var r = n(i).attr("href");
            return r.match(/,/) ? null : r
        }).get(), u.push((n("[data-app-path]").data("app-path") || "/") + "css/ckeditor.css"), r.contentsCss = u);
        if (f = CKEDITOR.stylesSet.get("cms"), f) for (e = [{
            name: "Page Header",
            element: "div",
            attributes: {"class": "page-header"}
        }, {name: "Alert (Info)", element: "div", attributes: {"class": "alert alert-info"}}, {
            name: "Alert (Success)",
            element: "div",
            attributes: {"class": "alert alert-success"}
        }, {
            name: "Alert (Warning)",
            element: "div",
            attributes: {"class": "alert alert-warning"}
        }, {name: "Alert (Danger)", element: "div", attributes: {"class": "alert alert-danger"}}, {
            name: "Well",
            element: "div",
            attributes: {"class": "well"}
        }, {name: "Well (Small)", element: "div", attributes: {"class": "well well-sm"}}, {
            name: "Well (Large",
            element: "div",
            attributes: {"class": "well well-lg"}
        }, {name: "Label", element: "span", attributes: {"class": "label label-default"}}, {
            name: "Label (Info)",
            element: "span",
            attributes: {"class": "label label-info"}
        }, {
            name: "Label (Success)",
            element: "span",
            attributes: {"class": "label label-success"}
        }, {
            name: "Label (Warning)",
            element: "span",
            attributes: {"class": "label label-warning"}
        }, {
            name: "Label (Danger)",
            element: "span",
            attributes: {"class": "label label-danger"}
        }], i = 0; i < e.length; i++) f.push(e[i])
    }()), i = n.cookie("adx-notification"), typeof i != typeof undefined && i != null) && (u(i, !0), n.cookie("adx-notification", null))
}(window.jQuery, window.XRM)
