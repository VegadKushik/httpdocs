<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/utils/Draggable.min.js"></script>
    <script>
        /** ThrowPropsPlugin v0.11.0 min
         * throwpropsplugin-v-0-11-0-min.js
         * https://adimancv.com/
         * https://www.cssx.xyz/
         */
        var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
        (_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function () {
            "use strict";
            _gsScope._gsDefine("plugins.ThrowPropsPlugin", ["plugins.TweenPlugin", "TweenLite", "easing.Ease", "utils.VelocityTracker"], function (t, e, i, n) {
                var r, o, s, a, h = function () {
                        t.call(this, "throwProps"), this._overwriteProps.length = 0
                    }, l = 999999999999999, c = 1e-10, d = _gsScope._gsDefine.globals, f = !1, u = {
                        x: 1,
                        y: 1,
                        z: 2,
                        scale: 1,
                        scaleX: 1,
                        scaleY: 1,
                        rotation: 1,
                        rotationZ: 1,
                        rotationX: 2,
                        rotationY: 2,
                        skewX: 1,
                        skewY: 1,
                        xPercent: 1,
                        yPercent: 1
                    }, g = "codepen", p = "ThrowPropsPlugin",
                    _ = String.fromCharCode(103, 114, 101, 101, 110, 115, 111, 99, 107, 46, 99, 111, 109),
                    m = String.fromCharCode(47, 114, 101, 113, 117, 105, 114, 101, 115, 45, 109, 101, 109, 98, 101, 114, 115, 104, 105, 112, 47),
                    C = function (t) {
                        for (var e = -1 !== (window ? window.location.href : "").indexOf(String.fromCharCode(103, 114, 101, 101, 110, 115, 111, 99, 107)) && -1 !== t.indexOf(String.fromCharCode(108, 111, 99, 97, 108, 104, 111, 115, 116)), i = [_, String.fromCharCode(99, 111, 100, 101, 112, 101, 110, 46, 105, 111), String.fromCharCode(99, 111, 100, 101, 112, 101, 110, 46, 100, 101, 118), String.fromCharCode(99, 115, 115, 45, 116, 114, 105, 99, 107, 115, 46, 99, 111, 109), String.fromCharCode(99, 100, 112, 110, 46, 105, 111), String.fromCharCode(103, 97, 110, 110, 111, 110, 46, 116, 118), String.fromCharCode(99, 111, 100, 101, 99, 97, 110, 121, 111, 110, 46, 110, 101, 116), String.fromCharCode(116, 104, 101, 109, 101, 102, 111, 114, 101, 115, 116, 46, 110, 101, 116), String.fromCharCode(99, 101, 114, 101, 98, 114, 97, 120, 46, 99, 111, 46, 117, 107), String.fromCharCode(116, 121, 109, 112, 97, 110, 117, 115, 46, 110, 101, 116), String.fromCharCode(116, 119, 101, 101, 110, 109, 97, 120, 46, 99, 111, 109), String.fromCharCode(116, 119, 101, 101, 110, 108, 105, 116, 101, 46, 99, 111, 109), String.fromCharCode(112, 108, 110, 107, 114, 46, 99, 111), String.fromCharCode(104, 111, 116, 106, 97, 114, 46, 99, 111, 109), String.fromCharCode(119, 101, 98, 112, 97, 99, 107, 98, 105, 110, 46, 99, 111, 109), String.fromCharCode(97, 114, 99, 104, 105, 118, 101, 46, 111, 114, 103), String.fromCharCode(106, 115, 102, 105, 100, 100, 108, 101, 46, 110, 101, 116)], n = i.length; --n > -1;) if (-1 !== t.indexOf(i[n])) return !0;
                        return e && window && window.console && console.log(String.fromCharCode(87, 65, 82, 78, 73, 78, 71, 58, 32, 97, 32, 115, 112, 101, 99, 105, 97, 108, 32, 118, 101, 114, 115, 105, 111, 110, 32, 111, 102, 32) + p + String.fromCharCode(32, 105, 115, 32, 114, 117, 110, 110, 105, 110, 103, 32, 108, 111, 99, 97, 108, 108, 121, 44, 32, 98, 117, 116, 32, 105, 116, 32, 119, 105, 108, 108, 32, 110, 111, 116, 32, 119, 111, 114, 107, 32, 111, 110, 32, 97, 32, 108, 105, 118, 101, 32, 100, 111, 109, 97, 105, 110, 32, 98, 101, 99, 97, 117, 115, 101, 32, 105, 116, 32, 105, 115, 32, 97, 32, 109, 101, 109, 98, 101, 114, 115, 104, 105, 112, 32, 98, 101, 110, 101, 102, 105, 116, 32, 111, 102, 32, 67, 108, 117, 98, 32, 71, 114, 101, 101, 110, 83, 111, 99, 107, 46, 32, 80, 108, 101, 97, 115, 101, 32, 115, 105, 103, 110, 32, 117, 112, 32, 97, 116, 32, 104, 116, 116, 112, 58, 47, 47, 103, 114, 101, 101, 110, 115, 111, 99, 107, 46, 99, 111, 109, 47, 99, 108, 117, 98, 47, 32, 97, 110, 100, 32, 116, 104, 101, 110, 32, 100, 111, 119, 110, 108, 111, 97, 100, 32, 116, 104, 101, 32, 39, 114, 101, 97, 108, 39, 32, 118, 101, 114, 115, 105, 111, 110, 32, 102, 114, 111, 109, 32, 121, 111, 117, 114, 32, 71, 114, 101, 101, 110, 83, 111, 99, 107, 32, 97, 99, 99, 111, 117, 110, 116, 32, 119, 104, 105, 99, 104, 32, 104, 97, 115, 32, 110, 111, 32, 115, 117, 99, 104, 32, 108, 105, 109, 105, 116, 97, 116, 105, 111, 110, 115, 46, 32, 84, 104, 101, 32, 102, 105, 108, 101, 32, 121, 111, 117, 39, 114, 101, 32, 117, 115, 105, 110, 103, 32, 119, 97, 115, 32, 108, 105, 107, 101, 108, 121, 32, 100, 111, 119, 110, 108, 111, 97, 100, 101, 100, 32, 102, 114, 111, 109, 32, 101, 108, 115, 101, 119, 104, 101, 114, 101, 32, 111, 110, 32, 116, 104, 101, 32, 119, 101, 98, 32, 97, 110, 100, 32, 105, 115, 32, 114, 101, 115, 116, 114, 105, 99, 116, 101, 100, 32, 116, 111, 32, 108, 111, 99, 97, 108, 32, 117, 115, 101, 32, 111, 114, 32, 111, 110, 32, 115, 105, 116, 101, 115, 32, 108, 105, 107, 101, 32, 99, 111, 100, 101, 112, 101, 110, 46, 105, 111, 46)), e
                    }(window ? window.location.host : ""), v = function (t, e, i, n, r) {
                        var o, s, a, h, c = e.length, d = 0, f = l;
                        if ("object" == typeof t) {
                            for (; --c > -1;) {
                                o = e[c], s = 0;
                                for (a in t) h = o[a] - t[a], s += h * h;
                                f > s && (d = c, f = s)
                            }
                            if (l > (r || l) && r < Math.sqrt(f)) return t
                        } else for (; --c > -1;) o = e[c], s = o - t, 0 > s && (s = -s), s >= f || n > o || o > i || (d = c, f = s);
                        return e[d]
                    }, S = function (t, e, i, n, r, o) {
                        if ("auto" === t.end) return t;
                        var s, a, h = t.end;
                        if (i = isNaN(i) ? l : i, n = isNaN(n) ? -l : n, "object" == typeof e) {
                            if (s = e.calculated ? e : ("function" == typeof h ? h(e) : v(e, h, i, n, o)) || e, !e.calculated) {
                                for (a in s) e[a] = s[a];
                                e.calculated = !0
                            }
                            s = s[r]
                        } else s = "function" == typeof h ? h(e) : h instanceof Array ? v(e, h, i, n, o) : +h;
                        return s > i ? s = i : n > s && (s = n), {max: s, min: s, unitFactor: t.unitFactor}
                    }, y = function (t, e, i) {
                        for (var n in e) void 0 === t[n] && n !== i && (t[n] = e[n]);
                        return t
                    }, w = h.calculateChange = function (t, n, r, o) {
                        null == o && (o = .05);
                        var s = n instanceof i ? n : n ? new i(n) : e.defaultEase;
                        return r * o * t / s.getRatio(o)
                    }, b = h.calculateDuration = function (t, n, r, o, s) {
                        s = s || .05;
                        var a = o instanceof i ? o : o ? new i(o) : e.defaultEase;
                        return Math.abs((n - t) * a.getRatio(s) / r / s)
                    }, x = h.calculateTweenDuration = function (t, r, o, s, a, l) {
                        if ("string" == typeof t && (t = e.selector(t)), !t) return 0;
                        null == o && (o = 10), null == s && (s = .2), null == a && (a = 1), t.length && (t = t[0] || t);
                        var d, u, g, p, _, m, C, v, x, M, A, P, k, T = 0, D = 9999999999, E = r.throwProps || r,
                            N = r.ease instanceof i ? r.ease : r.ease ? new i(r.ease) : e.defaultEase,
                            R = isNaN(E.checkpoint) ? .05 : +E.checkpoint,
                            O = isNaN(E.resistance) ? h.defaultResistance : +E.resistance;
                        if (E.linkedProps) for (P = E.linkedProps.split(","), A = {}, k = 0; k < P.length; k++) d = P[k], u = E[d], u && (void 0 !== u.velocity && "number" == typeof u.velocity ? p = +u.velocity || 0 : (x = x || n.getByTarget(t), p = x && x.isTrackingProp(d) ? x.getVelocity(d) : 0), _ = isNaN(u.resistance) ? O : +u.resistance, g = p * _ > 0 ? p / _ : p / -_, m = "function" == typeof t[d] ? t[d.indexOf("set") || "function" != typeof t["get" + d.substr(3)] ? d : "get" + d.substr(3)]() : t[d] || 0, A[d] = m + w(p, N, g, R));
                        for (d in E) "resistance" !== d && "checkpoint" !== d && "preventOvershoot" !== d && "linkedProps" !== d && "radius" !== d && (u = E[d], "object" != typeof u && (x = x || n.getByTarget(t), x && x.isTrackingProp(d) ? u = "number" == typeof u ? {velocity: u} : {velocity: x.getVelocity(d)} : (p = +u || 0, g = p * O > 0 ? p / O : p / -O)), "object" == typeof u && (void 0 !== u.velocity && "number" == typeof u.velocity ? p = +u.velocity || 0 : (x = x || n.getByTarget(t), p = x && x.isTrackingProp(d) ? x.getVelocity(d) : 0), _ = isNaN(u.resistance) ? O : +u.resistance, g = p * _ > 0 ? p / _ : p / -_, m = "function" == typeof t[d] ? t[d.indexOf("set") || "function" != typeof t["get" + d.substr(3)] ? d : "get" + d.substr(3)]() : t[d] || 0, C = m + w(p, N, g, R), void 0 !== u.end && (u = S(u, A && d in A ? A : C, u.max, u.min, d, E.radius), (l || f) && (E[d] = y(u, E[d], "end"))), void 0 !== u.max && C > +u.max + c ? (M = u.unitFactor || h.defaultUnitFactors[d] || 1, v = m > u.max && u.min !== u.max || p * M > -15 && 45 > p * M ? s + .1 * (o - s) : b(m, u.max, p, N, R), D > v + a && (D = v + a)) : void 0 !== u.min && C < +u.min - c && (M = u.unitFactor || h.defaultUnitFactors[d] || 1, v = m < u.min && u.min !== u.max || p * M > -45 && 15 > p * M ? s + .1 * (o - s) : b(m, u.min, p, N, R), D > v + a && (D = v + a)), v > T && (T = v)), g > T && (T = g));
                        return T > D && (T = D), T > o ? o : s > T ? s : T
                    }, M = h.prototype = new t("throwProps");
                return M.constructor = h, h.version = "0.11.0", h.API = 2, h._autoCSS = !0, h.defaultResistance = 100, h.defaultUnitFactors = {
                    time: 1e3,
                    totalTime: 1e3
                }, h.track = function (t, e, i) {
                    return n.track(t, e, i)
                }, h.untrack = function (t, e) {
                    n.untrack(t, e)
                }, h.isTracking = function (t, e) {
                    return n.isTracking(t, e)
                }, h.getVelocity = function (t, e) {
                    var i = n.getByTarget(t);
                    return i ? i.getVelocity(e) : 0 / 0
                }, h._cssRegister = function () {
                    var t = d.com.greensock.plugins.CSSPlugin;
                    if (t) {
                        var e = t._internals, i = e._parseToProxy, s = e._setPluginRatio, a = e.CSSPropTween;
                        e._registerComplexSpecialProp("throwProps", {
                            parser: function (t, e, l, c, d, f) {
                                f = new h;
                                var g, p, _, m, C, v = {}, S = {}, y = {}, w = {}, b = {}, x = {};
                                o = {};
                                for (_ in e) "resistance" !== _ && "preventOvershoot" !== _ && "linkedProps" !== _ && "radius" !== _ && (p = e[_], "object" == typeof p ? (void 0 !== p.velocity && "number" == typeof p.velocity ? v[_] = +p.velocity || 0 : (C = C || n.getByTarget(t), v[_] = C && C.isTrackingProp(_) ? C.getVelocity(_) : 0), void 0 !== p.end && (w[_] = p.end), void 0 !== p.min && (S[_] = p.min), void 0 !== p.max && (y[_] = p.max), p.preventOvershoot && (x[_] = !0), void 0 !== p.resistance && (g = !0, b[_] = p.resistance)) : "number" == typeof p ? v[_] = p : (C = C || n.getByTarget(t), v[_] = C && C.isTrackingProp(_) ? C.getVelocity(_) : p || 0), u[_] && c._enableTransforms(2 === u[_]));
                                m = i(t, v, c, d, f), r = m.proxy, v = m.end;
                                for (_ in r) o[_] = {
                                    velocity: v[_],
                                    min: S[_],
                                    max: y[_],
                                    end: w[_],
                                    resistance: b[_],
                                    preventOvershoot: x[_]
                                };
                                return null != e.resistance && (o.resistance = e.resistance), null != e.linkedProps && (o.linkedProps = e.linkedProps), null != e.radius && (o.radius = e.radius), e.preventOvershoot && (o.preventOvershoot = !0), d = new a(t, "throwProps", 0, 0, m.pt, 2), c._overwriteProps.pop(), d.plugin = f, d.setRatio = s, d.data = m, f._onInitTween(r, o, c._tween), d
                            }
                        })
                    }
                }, h.to = function (t, i, n, h, l) {
                    i.throwProps || (i = {throwProps: i}), 0 === l && (i.throwProps.preventOvershoot = !0), f = !0;
                    var c = new e(t, h || 1, i);
                    return c.render(0, !0, !0), c.vars.css ? (c.duration(x(r, {
                        throwProps: o,
                        ease: i.ease
                    }, n, h, l)), c._delay && !c.vars.immediateRender ? c.invalidate() : s._onInitTween(r, a, c), f = !1, c) : (c.kill(), c = new e(t, x(t, i, n, h, l), i), f = !1, c)
                }, M._onInitTween = function (t, e, i, r) {
                    this.target = t, this._props = [], s = this, a = e;
                    var o, h, l, c, d, u, v, b, x, M, A, P, k = i._ease, T = isNaN(e.checkpoint) ? .05 : +e.checkpoint,
                        D = i._duration, E = e.preventOvershoot, N = 0;
                    if (!C) return window.location.href = "http://" + _ + m + "?plugin=" + p + "&source=" + g, !1;
                    if (e.linkedProps) for (A = e.linkedProps.split(","), M = {}, P = 0; P < A.length; P++) o = A[P], h = e[o], h && (void 0 !== h.velocity && "number" == typeof h.velocity ? d = +h.velocity || 0 : (x = x || n.getByTarget(t), d = x && x.isTrackingProp(o) ? x.getVelocity(o) : 0), l = "function" == typeof t[o] ? t[o.indexOf("set") || "function" != typeof t["get" + o.substr(3)] ? o : "get" + o.substr(3)]() : t[o] || 0, M[o] = l + w(d, k, D, T));
                    for (o in e) if ("resistance" !== o && "checkpoint" !== o && "preventOvershoot" !== o && "linkedProps" !== o && "radius" !== o) {
                        if (h = e[o], "function" == typeof h && (h = h(r, t)), "number" == typeof h) d = +h || 0; else if ("object" != typeof h || isNaN(h.velocity)) {
                            if (x = x || n.getByTarget(t), !x || !x.isTrackingProp(o)) throw"ERROR: No velocity was defined in the throwProps tween of " + t + " property: " + o;
                            d = x.getVelocity(o)
                        } else d = +h.velocity;
                        u = w(d, k, D, T), b = 0, c = "function" == typeof t[o], l = c ? t[o.indexOf("set") || "function" != typeof t["get" + o.substr(3)] ? o : "get" + o.substr(3)]() : t[o], "object" == typeof h && (v = l + u, void 0 !== h.end && (h = S(h, M && o in M ? M : v, h.max, h.min, o, e.radius), f && (e[o] = y(h, e[o], "end"))), void 0 !== h.max && +h.max < v ? E || h.preventOvershoot ? u = h.max - l : b = h.max - l - u : void 0 !== h.min && +h.min > v && (E || h.preventOvershoot ? u = h.min - l : b = h.min - l - u)), this._overwriteProps[N] = o, this._props[N++] = {
                            p: o,
                            s: l,
                            c1: u,
                            c2: b,
                            f: c,
                            r: !1
                        }
                    }
                    return C
                }, M._kill = function (e) {
                    for (var i = this._props.length; --i > -1;) null != e[this._props[i].p] && this._props.splice(i, 1);
                    return t.prototype._kill.call(this, e)
                }, M._mod = function (t) {
                    for (var e, i = this._props, n = i.length; --n > -1;) e = t[i[n].p] || t.throwProps, "function" == typeof e && (i[n].m = e)
                }, M.setRatio = function (t) {
                    for (var e, i, n = this._props.length; --n > -1;) e = this._props[n], i = e.s + e.c1 * t + e.c2 * t * t, e.m ? i = e.m(i, this.target) : 1 === t && (i = (1e4 * i + (0 > i ? -.5 : .5) | 0) / 1e4), e.f ? this.target[e.p](i) : this.target[e.p] = i
                }, t.activate([h]), h
            }, !0), _gsScope._gsDefine("utils.VelocityTracker", ["TweenLite"], function (t) {
                var e, i, n, r, o = /([A-Z])/g, s = {}, a = {
                    x: 1,
                    y: 1,
                    z: 2,
                    scale: 1,
                    scaleX: 1,
                    scaleY: 1,
                    rotation: 1,
                    rotationZ: 1,
                    rotationX: 2,
                    rotationY: 2,
                    skewX: 1,
                    skewY: 1,
                    xPercent: 1,
                    yPercent: 1
                }, h = document.defaultView ? document.defaultView.getComputedStyle : function () {
                }, l = function (t, e, i) {
                    var n = (t._gsTransform || s)[e];
                    return n || 0 === n ? n : (t.style[e] ? n = t.style[e] : (i = i || h(t, null)) ? n = i[e] || i.getPropertyValue(e) || i.getPropertyValue(e.replace(o, "-$1").toLowerCase()) : t.currentStyle && (n = t.currentStyle[e]), parseFloat(n) || 0)
                }, c = t.ticker, d = function (t, e, i) {
                    this.p = t, this.f = e, this.v1 = this.v2 = 0, this.t1 = this.t2 = c.time, this.css = !1, this.type = "", this._prev = null, i && (this._next = i, i._prev = this)
                }, f = function () {
                    var t, i, o = e, s = c.time;
                    if (s - n >= .03) for (r = n, n = s; o;) {
                        for (i = o._firstVP; i;) t = i.css ? l(o.target, i.p) : i.f ? o.target[i.p]() : o.target[i.p], (t !== i.v1 || s - i.t1 > .15) && (i.v2 = i.v1, i.v1 = t, i.t2 = i.t1, i.t1 = s), i = i._next;
                        o = o._next
                    }
                }, u = function (t) {
                    this._lookup = {}, this.target = t, this.elem = t.style && t.nodeType ? !0 : !1, i || (c.addEventListener("tick", f, null, !1, -100), n = r = c.time, i = !0), e && (this._next = e, e._prev = this), e = this
                }, g = u.getByTarget = function (t) {
                    for (var i = e; i;) {
                        if (i.target === t) return i;
                        i = i._next
                    }
                }, p = u.prototype;
                return p.addProp = function (e, i) {
                    if (!this._lookup[e]) {
                        var n = this.target, r = "function" == typeof n[e], o = r ? this._altProp(e) : e,
                            s = this._firstVP;
                        this._firstVP = this._lookup[e] = this._lookup[o] = s = new d(o !== e && 0 === e.indexOf("set") ? o : e, r, s), s.css = this.elem && (void 0 !== this.target.style[s.p] || a[s.p]), s.css && a[s.p] && !n._gsTransform && t.set(n, {
                            x: "+=0",
                            overwrite: !1
                        }), s.type = i || s.css && 0 === e.indexOf("rotation") ? "deg" : "", s.v1 = s.v2 = s.css ? l(n, s.p) : r ? n[s.p]() : n[s.p]
                    }
                }, p.removeProp = function (t) {
                    var e = this._lookup[t];
                    e && (e._prev ? e._prev._next = e._next : e === this._firstVP && (this._firstVP = e._next), e._next && (e._next._prev = e._prev), this._lookup[t] = 0, e.f && (this._lookup[this._altProp(t)] = 0))
                }, p.isTrackingProp = function (t) {
                    return this._lookup[t] instanceof d
                }, p.getVelocity = function (t) {
                    var e, i, n, r = this._lookup[t], o = this.target;
                    if (!r) throw"The velocity of " + t + " is not being tracked.";
                    return e = r.css ? l(o, r.p) : r.f ? o[r.p]() : o[r.p], i = e - r.v2, ("rad" === r.type || "deg" === r.type) && (n = "rad" === r.type ? 2 * Math.PI : 360, i %= n, i !== i % (n / 2) && (i = 0 > i ? i + n : i - n)), i / (c.time - r.t2)
                }, p._altProp = function (t) {
                    var e = t.substr(0, 3), i = ("get" === e ? "set" : "set" === e ? "get" : e) + t.substr(3);
                    return "function" == typeof this.target[i] ? i : t
                }, u.getByTarget = function (i) {
                    var n = e;
                    for ("string" == typeof i && (i = t.selector(i)), i.length && i !== window && i[0] && i[0].style && !i.nodeType && (i = i[0]); n;) {
                        if (n.target === i) return n;
                        n = n._next
                    }
                }, u.track = function (t, e, i) {
                    var n = g(t), r = e.split(","), o = r.length;
                    for (i = (i || "").split(","), n || (n = new u(t)); --o > -1;) n.addProp(r[o], i[o] || i[0]);
                    return n
                }, u.untrack = function (t, i) {
                    var n = g(t), r = (i || "").split(","), o = r.length;
                    if (n) {
                        for (; --o > -1;) n.removeProp(r[o]);
                        n._firstVP && i || (n._prev ? n._prev._next = n._next : n === e && (e = n._next), n._next && (n._next._prev = n._prev))
                    }
                }, u.isTracking = function (t, e) {
                    var i = g(t);
                    return i ? !e && i._firstVP ? !0 : i.isTrackingProp(e) : !1
                }, u
            }, !0)
        }), _gsScope._gsDefine && _gsScope._gsQueue.pop()(), function (t) {
            "use strict";
            var e = function () {
                return (_gsScope.GreenSockGlobals || _gsScope)[t]
            };
            "function" == typeof define && define.amd ? define(["TweenLite"], e) : "undefined" != typeof module && module.exports && (require("../TweenLite.js"), module.exports = e())
        }("ThrowPropsPlugin");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.min.js"></script>

    <div class="container-fluid wwl__map">
        <div class="row">
            <div class="wwl__map-wrapper">
                <div class="svg-contain" id="mapfullscreen">
                    <p id="hover"><?php the_field( 'tooltip' ) ?></p>
                    <p id="mapinfobox"><?php the_field( 'tooltip' ); ?></p>
                    <div id="svg-wrap">
                        <?php
                        $countries = get_countries();
                        $code_countries = [];
                        foreach($countries as $country) $code_countries[$country['code']] = ['path' => $country['path'], 'title' => isset($country['title'])?$country['title']:'' ];
                        ?>
                        <svg style="background:#e8ebec" viewBox="0 0 1009 652">
                            <?php
                            foreach(countries_data($code_countries) as $code=>$country) {
                                ?>
                                <a<?=isset($country['permalink'])?' href="'.$country['permalink'].'"':''?>>
                                    <?=$country['title']?'<title>'.$country['title'].'</title>':''?>
                                    <?php
                                    if(!empty($country['color'])) echo str_replace('<path','<path class="'.$country['color'].'"',$country['path']);
                                    else echo str_replace('<path','<path class="white"',$country['path']);
                                    ?>
                                </a>

                            <?php } ?>
                        </svg>

                        <div class="controls">
                            <div class="btnn-wrap">
                                <div class="btnn plus">+</div>
                                <div class="btnn minus">-</div>
                                <div id="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btnn reset">x</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
