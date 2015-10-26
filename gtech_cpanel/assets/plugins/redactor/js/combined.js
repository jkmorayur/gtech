/*! jQuery v2.0.3 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license*/
(function(e, undefined) {
    var t, n, r = typeof undefined,
        i = e.location,
        o = e.document,
        s = o.documentElement,
        a = e.jQuery,
        u = e.$,
        l = {},
        c = [],
        p = "2.0.3",
        f = c.concat,
        h = c.push,
        d = c.slice,
        g = c.indexOf,
        m = l.toString,
        y = l.hasOwnProperty,
        v = p.trim,
        x = function(e, n) {
            return new x.fn.init(e, n, t);
        },
        b = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        w = /\S+/g,
        T = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        C = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        k = /^-ms-/,
        N = /-([\da-z])/gi,
        E = function(e, t) {
            return t.toUpperCase();
        },
        S = function() {
            o.removeEventListener("DOMContentLoaded", S, !1), e.removeEventListener("load", S, !1), x.ready();
        };
    x.fn = x.prototype = {
        jquery: p,
        constructor: x,
        init: function(e, t, n) {
            var r, i;
            if (!e) {
                return this;
            }
            if ("string" == typeof e) {
                if (r = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : T.exec(e), !r || !r[1] && t) {
                    return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                }
                if (r[1]) {
                    if (t = t instanceof x ? t[0] : t, x.merge(this, x.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : o, !0)), C.test(r[1]) && x.isPlainObject(t)) {
                        for (r in t) {
                            x.isFunction(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                        }
                    }
                    return this;
                }
                return i = o.getElementById(r[2]), i && i.parentNode && (this.length = 1, this[0] = i), this.context = o, this.selector = e, this;
            }
            return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : x.isFunction(e) ? n.ready(e) : (e.selector !== undefined && (this.selector = e.selector, this.context = e.context), x.makeArray(e, this));
        },
        selector: "",
        length: 0,
        toArray: function() {
            return d.call(this);
        },
        get: function(e) {
            return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e];
        },
        pushStack: function(e) {
            var t = x.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t;
        },
        each: function(e, t) {
            return x.each(this, e, t);
        },
        ready: function(e) {
            return x.ready.promise().done(e), this;
        },
        slice: function() {
            return this.pushStack(d.apply(this, arguments));
        },
        first: function() {
            return this.eq(0);
        },
        last: function() {
            return this.eq(-1);
        },
        eq: function(e) {
            var t = this.length,
                n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : []);
        },
        map: function(e) {
            return this.pushStack(x.map(this, function(t, n) {
                return e.call(t, n, t);
            }));
        },
        end: function() {
            return this.prevObject || this.constructor(null);
        },
        push: h,
        sort: [].sort,
        splice: [].splice
    }, x.fn.init.prototype = x.fn, x.extend = x.fn.extend = function() {
        var e, t, n, r, i, o, s = arguments[0] || {},
            a = 1,
            u = arguments.length,
            l = !1;
        for ("boolean" == typeof s && (l = s, s = arguments[1] || {}, a = 2), "object" == typeof s || x.isFunction(s) || (s = {}), u === a && (s = this, --a); u > a; a++) {
            if (null != (e = arguments[a])) {
                for (t in e) {
                    n = s[t], r = e[t], s !== r && (l && r && (x.isPlainObject(r) || (i = x.isArray(r))) ? (i ? (i = !1, o = n && x.isArray(n) ? n : []) : o = n && x.isPlainObject(n) ? n : {}, s[t] = x.extend(l, o, r)) : r !== undefined && (s[t] = r));
                }
            }
        }
        return s;
    }, x.extend({
        expando: "jQuery" + (p + Math.random()).replace(/\D/g, ""),
        noConflict: function(t) {
            return e.$ === x && (e.$ = u), t && e.jQuery === x && (e.jQuery = a), x;
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? x.readyWait++ : x.ready(!0);
        },
        ready: function(e) {
            (e === !0 ? --x.readyWait : x.isReady) || (x.isReady = !0, e !== !0 && --x.readyWait > 0 || (n.resolveWith(o, [x]), x.fn.trigger && x(o).trigger("ready").off("ready")));
        },
        isFunction: function(e) {
            return "function" === x.type(e);
        },
        isArray: Array.isArray,
        isWindow: function(e) {
            return null != e && e === e.window;
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e);
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? l[m.call(e)] || "object" : typeof e;
        },
        isPlainObject: function(e) {
            if ("object" !== x.type(e) || e.nodeType || x.isWindow(e)) {
                return !1;
            }
            try {
                if (e.constructor && !y.call(e.constructor.prototype, "isPrototypeOf")) {
                    return !1;
                }
            } catch (t) {
                return !1;
            }
            return !0;
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) {
                return !1;
            }
            return !0;
        },
        error: function(e) {
            throw Error(e);
        },
        parseHTML: function(e, t, n) {
            if (!e || "string" != typeof e) {
                return null;
            }
            "boolean" == typeof t && (n = t, t = !1), t = t || o;
            var r = C.exec(e),
                i = !n && [];
            return r ? [t.createElement(r[1])] : (r = x.buildFragment([e], t, i), i && x(i).remove(), x.merge([], r.childNodes));
        },
        parseJSON: JSON.parse,
        parseXML: function(e) {
            var t, n;
            if (!e || "string" != typeof e) {
                return null;
            }
            try {
                n = new DOMParser, t = n.parseFromString(e, "text/xml");
            } catch (r) {
                t = undefined;
            }
            return (!t || t.getElementsByTagName("parsererror").length) && x.error("Invalid XML: " + e), t;
        },
        noop: function() {},
        globalEval: function(e) {
            var t, n = eval;
            e = x.trim(e), e && (1 === e.indexOf("use strict") ? (t = o.createElement("script"), t.text = e, o.head.appendChild(t).parentNode.removeChild(t)) : n(e));
        },
        camelCase: function(e) {
            return e.replace(k, "ms-").replace(N, E);
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
        },
        each: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                s = j(e);
            if (n) {
                if (s) {
                    for (; o > i; i++) {
                        if (r = t.apply(e[i], n), r === !1) {
                            break;
                        }
                    }
                } else {
                    for (i in e) {
                        if (r = t.apply(e[i], n), r === !1) {
                            break;
                        }
                    }
                }
            } else {
                if (s) {
                    for (; o > i; i++) {
                        if (r = t.call(e[i], i, e[i]), r === !1) {
                            break;
                        }
                    }
                } else {
                    for (i in e) {
                        if (r = t.call(e[i], i, e[i]), r === !1) {
                            break;
                        }
                    }
                }
            }
            return e;
        },
        trim: function(e) {
            return null == e ? "" : v.call(e);
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (j(Object(e)) ? x.merge(n, "string" == typeof e ? [e] : e) : h.call(n, e)), n;
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : g.call(t, e, n);
        },
        merge: function(e, t) {
            var n = t.length,
                r = e.length,
                i = 0;
            if ("number" == typeof n) {
                for (; n > i; i++) {
                    e[r++] = t[i];
                }
            } else {
                while (t[i] !== undefined) {
                    e[r++] = t[i++];
                }
            }
            return e.length = r, e;
        },
        grep: function(e, t, n) {
            var r, i = [],
                o = 0,
                s = e.length;
            for (n = !!n; s > o; o++) {
                r = !!t(e[o], o), n !== r && i.push(e[o]);
            }
            return i;
        },
        map: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                s = j(e),
                a = [];
            if (s) {
                for (; o > i; i++) {
                    r = t(e[i], i, n), null != r && (a[a.length] = r);
                }
            } else {
                for (i in e) {
                    r = t(e[i], i, n), null != r && (a[a.length] = r);
                }
            }
            return f.apply([], a);
        },
        guid: 1,
        proxy: function(e, t) {
            var n, r, i;
            return "string" == typeof t && (n = e[t], t = e, e = n), x.isFunction(e) ? (r = d.call(arguments, 2), i = function() {
                return e.apply(t || this, r.concat(d.call(arguments)));
            }, i.guid = e.guid = e.guid || x.guid++, i) : undefined;
        },
        access: function(e, t, n, r, i, o, s) {
            var a = 0,
                u = e.length,
                l = null == n;
            if ("object" === x.type(n)) {
                i = !0;
                for (a in n) {
                    x.access(e, t, a, n[a], !0, o, s);
                }
            } else {
                if (r !== undefined && (i = !0, x.isFunction(r) || (s = !0), l && (s ? (t.call(e, r), t = null) : (l = t, t = function(e, t, n) {
                        return l.call(x(e), n);
                    })), t)) {
                    for (; u > a; a++) {
                        t(e[a], n, s ? r : r.call(e[a], a, t(e[a], n)));
                    }
                }
            }
            return i ? e : l ? t.call(e) : u ? t(e[0], n) : o;
        },
        now: Date.now,
        swap: function(e, t, n, r) {
            var i, o, s = {};
            for (o in t) {
                s[o] = e.style[o], e.style[o] = t[o];
            }
            i = n.apply(e, r || []);
            for (o in t) {
                e.style[o] = s[o];
            }
            return i;
        }
    }), x.ready.promise = function(t) {
        return n || (n = x.Deferred(), "complete" === o.readyState ? setTimeout(x.ready) : (o.addEventListener("DOMContentLoaded", S, !1), e.addEventListener("load", S, !1))), n.promise(t);
    }, x.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
        l["[object " + t + "]"] = t.toLowerCase();
    });

    function j(e) {
        var t = e.length,
            n = x.type(e);
        return x.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e);
    }
    t = x(o),
        function(e, undefined) {
            var t, n, r, i, o, s, a, u, l, c, p, f, h, d, g, m, y, v = "sizzle" + -new Date,
                b = e.document,
                w = 0,
                T = 0,
                C = st(),
                k = st(),
                N = st(),
                E = !1,
                S = function(e, t) {
                    return e === t ? (E = !0, 0) : 0;
                },
                j = typeof undefined,
                D = 1 << 31,
                A = {}.hasOwnProperty,
                L = [],
                q = L.pop,
                H = L.push,
                O = L.push,
                F = L.slice,
                P = L.indexOf || function(e) {
                    var t = 0,
                        n = this.length;
                    for (; n > t; t++) {
                        if (this[t] === e) {
                            return t;
                        }
                    }
                    return -1;
                },
                R = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                M = "[\\x20\\t\\r\\n\\f]",
                W = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                $ = W.replace("w", "w#"),
                B = "\\[" + M + "*(" + W + ")" + M + "*(?:([*^$|!~]?=)" + M + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + $ + ")|)|)" + M + "*\\]",
                I = ":(" + W + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + B.replace(3, 8) + ")*)|.*)\\)|)",
                z = RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
                _ = RegExp("^" + M + "*," + M + "*"),
                X = RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
                U = RegExp(M + "*[+~]"),
                Y = RegExp("=" + M + "*([^\\]'\"]*)" + M + "*\\]", "g"),
                V = RegExp(I),
                G = RegExp("^" + $ + "$"),
                J = {
                    ID: RegExp("^#(" + W + ")"),
                    CLASS: RegExp("^\\.(" + W + ")"),
                    TAG: RegExp("^(" + W.replace("w", "w*") + ")"),
                    ATTR: RegExp("^" + B),
                    PSEUDO: RegExp("^" + I),
                    CHILD: RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)", "i"),
                    bool: RegExp("^(?:" + R + ")$", "i"),
                    needsContext: RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i")
                },
                Q = /^[^{]+\{\s*\[native \w/,
                K = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                Z = /^(?:input|select|textarea|button)$/i,
                et = /^h\d$/i,
                tt = /'|\\/g,
                nt = RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
                rt = function(e, t, n) {
                    var r = "0x" + t - 65536;
                    return r !== r || n ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(55296 | r >> 10, 56320 | 1023 & r);
                };
            try {
                O.apply(L = F.call(b.childNodes), b.childNodes), L[b.childNodes.length].nodeType;
            } catch (it) {
                O = {
                    apply: L.length ? function(e, t) {
                        H.apply(e, F.call(t));
                    } : function(e, t) {
                        var n = e.length,
                            r = 0;
                        while (e[n++] = t[r++]) {}
                        e.length = n - 1;
                    }
                };
            }

            function ot(e, t, r, i) {
                var o, s, a, u, l, f, g, m, x, w;
                if ((t ? t.ownerDocument || t : b) !== p && c(t), t = t || p, r = r || [], !e || "string" != typeof e) {
                    return r;
                }
                if (1 !== (u = t.nodeType) && 9 !== u) {
                    return [];
                }
                if (h && !i) {
                    if (o = K.exec(e)) {
                        if (a = o[1]) {
                            if (9 === u) {
                                if (s = t.getElementById(a), !s || !s.parentNode) {
                                    return r;
                                }
                                if (s.id === a) {
                                    return r.push(s), r;
                                }
                            } else {
                                if (t.ownerDocument && (s = t.ownerDocument.getElementById(a)) && y(t, s) && s.id === a) {
                                    return r.push(s), r;
                                }
                            }
                        } else {
                            if (o[2]) {
                                return O.apply(r, t.getElementsByTagName(e)), r;
                            }
                            if ((a = o[3]) && n.getElementsByClassName && t.getElementsByClassName) {
                                return O.apply(r, t.getElementsByClassName(a)), r;
                            }
                        }
                    }
                    if (n.qsa && (!d || !d.test(e))) {
                        if (m = g = v, x = t, w = 9 === u && e, 1 === u && "object" !== t.nodeName.toLowerCase()) {
                            f = gt(e), (g = t.getAttribute("id")) ? m = g.replace(tt, "\\$&") : t.setAttribute("id", m), m = "[id='" + m + "'] ", l = f.length;
                            while (l--) {
                                f[l] = m + mt(f[l]);
                            }
                            x = U.test(e) && t.parentNode || t, w = f.join(",");
                        }
                        if (w) {
                            try {
                                return O.apply(r, x.querySelectorAll(w)), r;
                            } catch (T) {} finally {
                                g || t.removeAttribute("id");
                            }
                        }
                    }
                }
                return kt(e.replace(z, "$1"), t, r, i);
            }

            function st() {
                var e = [];

                function t(n, r) {
                    return e.push(n += " ") > i.cacheLength && delete t[e.shift()], t[n] = r;
                }
                return t;
            }

            function at(e) {
                return e[v] = !0, e;
            }

            function ut(e) {
                var t = p.createElement("div");
                try {
                    return !!e(t);
                } catch (n) {
                    return !1;
                } finally {
                    t.parentNode && t.parentNode.removeChild(t), t = null;
                }
            }

            function lt(e, t) {
                var n = e.split("|"),
                    r = e.length;
                while (r--) {
                    i.attrHandle[n[r]] = t;
                }
            }

            function ct(e, t) {
                var n = t && e,
                    r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || D) - (~e.sourceIndex || D);
                if (r) {
                    return r;
                }
                if (n) {
                    while (n = n.nextSibling) {
                        if (n === t) {
                            return -1;
                        }
                    }
                }
                return e ? 1 : -1;
            }

            function pt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return "input" === n && t.type === e;
                };
            }

            function ft(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e;
                };
            }

            function ht(e) {
                return at(function(t) {
                    return t = +t, at(function(n, r) {
                        var i, o = e([], n.length, t),
                            s = o.length;
                        while (s--) {
                            n[i = o[s]] && (n[i] = !(r[i] = n[i]));
                        }
                    });
                });
            }
            s = ot.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? "HTML" !== t.nodeName : !1;
            }, n = ot.support = {}, c = ot.setDocument = function(e) {
                var t = e ? e.ownerDocument || e : b,
                    r = t.defaultView;
                return t !== p && 9 === t.nodeType && t.documentElement ? (p = t, f = t.documentElement, h = !s(t), r && r.attachEvent && r !== r.top && r.attachEvent("onbeforeunload", function() {
                    c();
                }), n.attributes = ut(function(e) {
                    return e.className = "i", !e.getAttribute("className");
                }), n.getElementsByTagName = ut(function(e) {
                    return e.appendChild(t.createComment("")), !e.getElementsByTagName("*").length;
                }), n.getElementsByClassName = ut(function(e) {
                    return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length;
                }), n.getById = ut(function(e) {
                    return f.appendChild(e).id = v, !t.getElementsByName || !t.getElementsByName(v).length;
                }), n.getById ? (i.find.ID = function(e, t) {
                    if (typeof t.getElementById !== j && h) {
                        var n = t.getElementById(e);
                        return n && n.parentNode ? [n] : [];
                    }
                }, i.filter.ID = function(e) {
                    var t = e.replace(nt, rt);
                    return function(e) {
                        return e.getAttribute("id") === t;
                    };
                }) : (delete i.find.ID, i.filter.ID = function(e) {
                    var t = e.replace(nt, rt);
                    return function(e) {
                        var n = typeof e.getAttributeNode !== j && e.getAttributeNode("id");
                        return n && n.value === t;
                    };
                }), i.find.TAG = n.getElementsByTagName ? function(e, t) {
                    return typeof t.getElementsByTagName !== j ? t.getElementsByTagName(e) : undefined;
                } : function(e, t) {
                    var n, r = [],
                        i = 0,
                        o = t.getElementsByTagName(e);
                    if ("*" === e) {
                        while (n = o[i++]) {
                            1 === n.nodeType && r.push(n);
                        }
                        return r;
                    }
                    return o;
                }, i.find.CLASS = n.getElementsByClassName && function(e, t) {
                    return typeof t.getElementsByClassName !== j && h ? t.getElementsByClassName(e) : undefined;
                }, g = [], d = [], (n.qsa = Q.test(t.querySelectorAll)) && (ut(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || d.push("\\[" + M + "*(?:value|" + R + ")"), e.querySelectorAll(":checked").length || d.push(":checked");
                }), ut(function(e) {
                    var n = t.createElement("input");
                    n.setAttribute("type", "hidden"), e.appendChild(n).setAttribute("t", ""), e.querySelectorAll("[t^='']").length && d.push("[*^$]=" + M + "*(?:''|\"\")"), e.querySelectorAll(":enabled").length || d.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), d.push(",.*:");
                })), (n.matchesSelector = Q.test(m = f.webkitMatchesSelector || f.mozMatchesSelector || f.oMatchesSelector || f.msMatchesSelector)) && ut(function(e) {
                    n.disconnectedMatch = m.call(e, "div"), m.call(e, "[s!='']:x"), g.push("!=", I);
                }), d = d.length && RegExp(d.join("|")), g = g.length && RegExp(g.join("|")), y = Q.test(f.contains) || f.compareDocumentPosition ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)));
                } : function(e, t) {
                    if (t) {
                        while (t = t.parentNode) {
                            if (t === e) {
                                return !0;
                            }
                        }
                    }
                    return !1;
                }, S = f.compareDocumentPosition ? function(e, r) {
                    if (e === r) {
                        return E = !0, 0;
                    }
                    var i = r.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(r);
                    return i ? 1 & i || !n.sortDetached && r.compareDocumentPosition(e) === i ? e === t || y(b, e) ? -1 : r === t || y(b, r) ? 1 : l ? P.call(l, e) - P.call(l, r) : 0 : 4 & i ? -1 : 1 : e.compareDocumentPosition ? -1 : 1;
                } : function(e, n) {
                    var r, i = 0,
                        o = e.parentNode,
                        s = n.parentNode,
                        a = [e],
                        u = [n];
                    if (e === n) {
                        return E = !0, 0;
                    }
                    if (!o || !s) {
                        return e === t ? -1 : n === t ? 1 : o ? -1 : s ? 1 : l ? P.call(l, e) - P.call(l, n) : 0;
                    }
                    if (o === s) {
                        return ct(e, n);
                    }
                    r = e;
                    while (r = r.parentNode) {
                        a.unshift(r);
                    }
                    r = n;
                    while (r = r.parentNode) {
                        u.unshift(r);
                    }
                    while (a[i] === u[i]) {
                        i++;
                    }
                    return i ? ct(a[i], u[i]) : a[i] === b ? -1 : u[i] === b ? 1 : 0;
                }, t) : p;
            }, ot.matches = function(e, t) {
                return ot(e, null, null, t);
            }, ot.matchesSelector = function(e, t) {
                if ((e.ownerDocument || e) !== p && c(e), t = t.replace(Y, "='$1']"), !(!n.matchesSelector || !h || g && g.test(t) || d && d.test(t))) {
                    try {
                        var r = m.call(e, t);
                        if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) {
                            return r;
                        }
                    } catch (i) {}
                }
                return ot(t, p, null, [e]).length > 0;
            }, ot.contains = function(e, t) {
                return (e.ownerDocument || e) !== p && c(e), y(e, t);
            }, ot.attr = function(e, t) {
                (e.ownerDocument || e) !== p && c(e);
                var r = i.attrHandle[t.toLowerCase()],
                    o = r && A.call(i.attrHandle, t.toLowerCase()) ? r(e, t, !h) : undefined;
                return o === undefined ? n.attributes || !h ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null : o;
            }, ot.error = function(e) {
                throw Error("Syntax error, unrecognized expression: " + e);
            }, ot.uniqueSort = function(e) {
                var t, r = [],
                    i = 0,
                    o = 0;
                if (E = !n.detectDuplicates, l = !n.sortStable && e.slice(0), e.sort(S), E) {
                    while (t = e[o++]) {
                        t === e[o] && (i = r.push(o));
                    }
                    while (i--) {
                        e.splice(r[i], 1);
                    }
                }
                return e;
            }, o = ot.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (1 === i || 9 === i || 11 === i) {
                        if ("string" == typeof e.textContent) {
                            return e.textContent;
                        }
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            n += o(e);
                        }
                    } else {
                        if (3 === i || 4 === i) {
                            return e.nodeValue;
                        }
                    }
                } else {
                    for (; t = e[r]; r++) {
                        n += o(t);
                    }
                }
                return n;
            }, i = ot.selectors = {
                cacheLength: 50,
                createPseudo: at,
                match: J,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace(nt, rt), e[3] = (e[4] || e[5] || "").replace(nt, rt), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || ot.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && ot.error(e[0]), e;
                    },
                    PSEUDO: function(e) {
                        var t, n = !e[5] && e[2];
                        return J.CHILD.test(e[0]) ? null : (e[3] && e[4] !== undefined ? e[2] = e[4] : n && V.test(n) && (t = gt(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3));
                    }
                },
                filter: {
                    TAG: function(e) {
                        var t = e.replace(nt, rt).toLowerCase();
                        return "*" === e ? function() {
                            return !0;
                        } : function(e) {
                            return e.nodeName && e.nodeName.toLowerCase() === t;
                        };
                    },
                    CLASS: function(e) {
                        var t = C[e + " "];
                        return t || (t = RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && C(e, function(e) {
                            return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== j && e.getAttribute("class") || "");
                        });
                    },
                    ATTR: function(e, t, n) {
                        return function(r) {
                            var i = ot.attr(r, e);
                            return null == i ? "!=" === t : t ? (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.slice(0, n.length + 1) === n + "-" : !1) : !0;
                        };
                    },
                    CHILD: function(e, t, n, r, i) {
                        var o = "nth" !== e.slice(0, 3),
                            s = "last" !== e.slice(-4),
                            a = "of-type" === t;
                        return 1 === r && 0 === i ? function(e) {
                            return !!e.parentNode;
                        } : function(t, n, u) {
                            var l, c, p, f, h, d, g = o !== s ? "nextSibling" : "previousSibling",
                                m = t.parentNode,
                                y = a && t.nodeName.toLowerCase(),
                                x = !u && !a;
                            if (m) {
                                if (o) {
                                    while (g) {
                                        p = t;
                                        while (p = p[g]) {
                                            if (a ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) {
                                                return !1;
                                            }
                                        }
                                        d = g = "only" === e && !d && "nextSibling";
                                    }
                                    return !0;
                                }
                                if (d = [s ? m.firstChild : m.lastChild], s && x) {
                                    c = m[v] || (m[v] = {}), l = c[e] || [], h = l[0] === w && l[1], f = l[0] === w && l[2], p = h && m.childNodes[h];
                                    while (p = ++h && p && p[g] || (f = h = 0) || d.pop()) {
                                        if (1 === p.nodeType && ++f && p === t) {
                                            c[e] = [w, h, f];
                                            break;
                                        }
                                    }
                                } else {
                                    if (x && (l = (t[v] || (t[v] = {}))[e]) && l[0] === w) {
                                        f = l[1];
                                    } else {
                                        while (p = ++h && p && p[g] || (f = h = 0) || d.pop()) {
                                            if ((a ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) && ++f && (x && ((p[v] || (p[v] = {}))[e] = [w, f]), p === t)) {
                                                break;
                                            }
                                        }
                                    }
                                }
                                return f -= i, f === r || 0 === f % r && f / r >= 0;
                            }
                        };
                    },
                    PSEUDO: function(e, t) {
                        var n, r = i.pseudos[e] || i.setFilters[e.toLowerCase()] || ot.error("unsupported pseudo: " + e);
                        return r[v] ? r(t) : r.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? at(function(e, n) {
                            var i, o = r(e, t),
                                s = o.length;
                            while (s--) {
                                i = P.call(e, o[s]), e[i] = !(n[i] = o[s]);
                            }
                        }) : function(e) {
                            return r(e, 0, n);
                        }) : r;
                    }
                },
                pseudos: {
                    not: at(function(e) {
                        var t = [],
                            n = [],
                            r = a(e.replace(z, "$1"));
                        return r[v] ? at(function(e, t, n, i) {
                            var o, s = r(e, null, i, []),
                                a = e.length;
                            while (a--) {
                                (o = s[a]) && (e[a] = !(t[a] = o));
                            }
                        }) : function(e, i, o) {
                            return t[0] = e, r(t, null, o, n), !n.pop();
                        };
                    }),
                    has: at(function(e) {
                        return function(t) {
                            return ot(e, t).length > 0;
                        };
                    }),
                    contains: at(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || o(t)).indexOf(e) > -1;
                        };
                    }),
                    lang: at(function(e) {
                        return G.test(e || "") || ot.error("unsupported lang: " + e), e = e.replace(nt, rt).toLowerCase(),
                            function(t) {
                                var n;
                                do {
                                    if (n = h ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) {
                                        return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
                                    }
                                } while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1;
                            };
                    }),
                    target: function(t) {
                        var n = e.location && e.location.hash;
                        return n && n.slice(1) === t.id;
                    },
                    root: function(e) {
                        return e === f;
                    },
                    focus: function(e) {
                        return e === p.activeElement && (!p.hasFocus || p.hasFocus()) && !!(e.type || e.href || ~e.tabIndex);
                    },
                    enabled: function(e) {
                        return e.disabled === !1;
                    },
                    disabled: function(e) {
                        return e.disabled === !0;
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && !!e.checked || "option" === t && !!e.selected;
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0;
                    },
                    empty: function(e) {
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) {
                                return !1;
                            }
                        }
                        return !0;
                    },
                    parent: function(e) {
                        return !i.pseudos.empty(e);
                    },
                    header: function(e) {
                        return et.test(e.nodeName);
                    },
                    input: function(e) {
                        return Z.test(e.nodeName);
                    },
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && "button" === e.type || "button" === t;
                    },
                    text: function(e) {
                        var t;
                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type);
                    },
                    first: ht(function() {
                        return [0];
                    }),
                    last: ht(function(e, t) {
                        return [t - 1];
                    }),
                    eq: ht(function(e, t, n) {
                        return [0 > n ? n + t : n];
                    }),
                    even: ht(function(e, t) {
                        var n = 0;
                        for (; t > n; n += 2) {
                            e.push(n);
                        }
                        return e;
                    }),
                    odd: ht(function(e, t) {
                        var n = 1;
                        for (; t > n; n += 2) {
                            e.push(n);
                        }
                        return e;
                    }),
                    lt: ht(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; --r >= 0;) {
                            e.push(r);
                        }
                        return e;
                    }),
                    gt: ht(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; t > ++r;) {
                            e.push(r);
                        }
                        return e;
                    })
                }
            }, i.pseudos.nth = i.pseudos.eq;
            for (t in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) {
                i.pseudos[t] = pt(t);
            }
            for (t in {
                    submit: !0,
                    reset: !0
                }) {
                i.pseudos[t] = ft(t);
            }

            function dt() {}
            dt.prototype = i.filters = i.pseudos, i.setFilters = new dt;

            function gt(e, t) {
                var n, r, o, s, a, u, l, c = k[e + " "];
                if (c) {
                    return t ? 0 : c.slice(0);
                }
                a = e, u = [], l = i.preFilter;
                while (a) {
                    (!n || (r = _.exec(a))) && (r && (a = a.slice(r[0].length) || a), u.push(o = [])), n = !1, (r = X.exec(a)) && (n = r.shift(), o.push({
                        value: n,
                        type: r[0].replace(z, " ")
                    }), a = a.slice(n.length));
                    for (s in i.filter) {
                        !(r = J[s].exec(a)) || l[s] && !(r = l[s](r)) || (n = r.shift(), o.push({
                            value: n,
                            type: s,
                            matches: r
                        }), a = a.slice(n.length));
                    }
                    if (!n) {
                        break;
                    }
                }
                return t ? a.length : a ? ot.error(e) : k(e, u).slice(0);
            }

            function mt(e) {
                var t = 0,
                    n = e.length,
                    r = "";
                for (; n > t; t++) {
                    r += e[t].value;
                }
                return r;
            }

            function yt(e, t, n) {
                var i = t.dir,
                    o = n && "parentNode" === i,
                    s = T++;
                return t.first ? function(t, n, r) {
                    while (t = t[i]) {
                        if (1 === t.nodeType || o) {
                            return e(t, n, r);
                        }
                    }
                } : function(t, n, a) {
                    var u, l, c, p = w + " " + s;
                    if (a) {
                        while (t = t[i]) {
                            if ((1 === t.nodeType || o) && e(t, n, a)) {
                                return !0;
                            }
                        }
                    } else {
                        while (t = t[i]) {
                            if (1 === t.nodeType || o) {
                                if (c = t[v] || (t[v] = {}), (l = c[i]) && l[0] === p) {
                                    if ((u = l[1]) === !0 || u === r) {
                                        return u === !0;
                                    }
                                } else {
                                    if (l = c[i] = [p], l[1] = e(t, n, a) || r, l[1] === !0) {
                                        return !0;
                                    }
                                }
                            }
                        }
                    }
                };
            }

            function vt(e) {
                return e.length > 1 ? function(t, n, r) {
                    var i = e.length;
                    while (i--) {
                        if (!e[i](t, n, r)) {
                            return !1;
                        }
                    }
                    return !0;
                } : e[0];
            }

            function xt(e, t, n, r, i) {
                var o, s = [],
                    a = 0,
                    u = e.length,
                    l = null != t;
                for (; u > a; a++) {
                    (o = e[a]) && (!n || n(o, r, i)) && (s.push(o), l && t.push(a));
                }
                return s;
            }

            function bt(e, t, n, r, i, o) {
                return r && !r[v] && (r = bt(r)), i && !i[v] && (i = bt(i, o)), at(function(o, s, a, u) {
                    var l, c, p, f = [],
                        h = [],
                        d = s.length,
                        g = o || Ct(t || "*", a.nodeType ? [a] : a, []),
                        m = !e || !o && t ? g : xt(g, f, e, a, u),
                        y = n ? i || (o ? e : d || r) ? [] : s : m;
                    if (n && n(m, y, a, u), r) {
                        l = xt(y, h), r(l, [], a, u), c = l.length;
                        while (c--) {
                            (p = l[c]) && (y[h[c]] = !(m[h[c]] = p));
                        }
                    }
                    if (o) {
                        if (i || e) {
                            if (i) {
                                l = [], c = y.length;
                                while (c--) {
                                    (p = y[c]) && l.push(m[c] = p);
                                }
                                i(null, y = [], l, u);
                            }
                            c = y.length;
                            while (c--) {
                                (p = y[c]) && (l = i ? P.call(o, p) : f[c]) > -1 && (o[l] = !(s[l] = p));
                            }
                        }
                    } else {
                        y = xt(y === s ? y.splice(d, y.length) : y), i ? i(null, s, y, u) : O.apply(s, y);
                    }
                });
            }

            function wt(e) {
                var t, n, r, o = e.length,
                    s = i.relative[e[0].type],
                    a = s || i.relative[" "],
                    l = s ? 1 : 0,
                    c = yt(function(e) {
                        return e === t;
                    }, a, !0),
                    p = yt(function(e) {
                        return P.call(t, e) > -1;
                    }, a, !0),
                    f = [function(e, n, r) {
                        return !s && (r || n !== u) || ((t = n).nodeType ? c(e, n, r) : p(e, n, r));
                    }];
                for (; o > l; l++) {
                    if (n = i.relative[e[l].type]) {
                        f = [yt(vt(f), n)];
                    } else {
                        if (n = i.filter[e[l].type].apply(null, e[l].matches), n[v]) {
                            for (r = ++l; o > r; r++) {
                                if (i.relative[e[r].type]) {
                                    break;
                                }
                            }
                            return bt(l > 1 && vt(f), l > 1 && mt(e.slice(0, l - 1).concat({
                                value: " " === e[l - 2].type ? "*" : ""
                            })).replace(z, "$1"), n, r > l && wt(e.slice(l, r)), o > r && wt(e = e.slice(r)), o > r && mt(e));
                        }
                        f.push(n);
                    }
                }
                return vt(f);
            }

            function Tt(e, t) {
                var n = 0,
                    o = t.length > 0,
                    s = e.length > 0,
                    a = function(a, l, c, f, h) {
                        var d, g, m, y = [],
                            v = 0,
                            x = "0",
                            b = a && [],
                            T = null != h,
                            C = u,
                            k = a || s && i.find.TAG("*", h && l.parentNode || l),
                            N = w += null == C ? 1 : Math.random() || 0.1;
                        for (T && (u = l !== p && l, r = n); null != (d = k[x]); x++) {
                            if (s && d) {
                                g = 0;
                                while (m = e[g++]) {
                                    if (m(d, l, c)) {
                                        f.push(d);
                                        break;
                                    }
                                }
                                T && (w = N, r = ++n);
                            }
                            o && ((d = !m && d) && v--, a && b.push(d));
                        }
                        if (v += x, o && x !== v) {
                            g = 0;
                            while (m = t[g++]) {
                                m(b, y, l, c);
                            }
                            if (a) {
                                if (v > 0) {
                                    while (x--) {
                                        b[x] || y[x] || (y[x] = q.call(f));
                                    }
                                }
                                y = xt(y);
                            }
                            O.apply(f, y), T && !a && y.length > 0 && v + t.length > 1 && ot.uniqueSort(f);
                        }
                        return T && (w = N, u = C), b;
                    };
                return o ? at(a) : a;
            }
            a = ot.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    o = N[e + " "];
                if (!o) {
                    t || (t = gt(e)), n = t.length;
                    while (n--) {
                        o = wt(t[n]), o[v] ? r.push(o) : i.push(o);
                    }
                    o = N(e, Tt(i, r));
                }
                return o;
            };

            function Ct(e, t, n) {
                var r = 0,
                    i = t.length;
                for (; i > r; r++) {
                    ot(e, t[r], n);
                }
                return n;
            }

            function kt(e, t, r, o) {
                var s, u, l, c, p, f = gt(e);
                if (!o && 1 === f.length) {
                    if (u = f[0] = f[0].slice(0), u.length > 2 && "ID" === (l = u[0]).type && n.getById && 9 === t.nodeType && h && i.relative[u[1].type]) {
                        if (t = (i.find.ID(l.matches[0].replace(nt, rt), t) || [])[0], !t) {
                            return r;
                        }
                        e = e.slice(u.shift().value.length);
                    }
                    s = J.needsContext.test(e) ? 0 : u.length;
                    while (s--) {
                        if (l = u[s], i.relative[c = l.type]) {
                            break;
                        }
                        if ((p = i.find[c]) && (o = p(l.matches[0].replace(nt, rt), U.test(u[0].type) && t.parentNode || t))) {
                            if (u.splice(s, 1), e = o.length && mt(u), !e) {
                                return O.apply(r, o), r;
                            }
                            break;
                        }
                    }
                }
                return a(e, f)(o, t, !h, r, U.test(e)), r;
            }
            n.sortStable = v.split("").sort(S).join("") === v, n.detectDuplicates = E, c(), n.sortDetached = ut(function(e) {
                return 1 & e.compareDocumentPosition(p.createElement("div"));
            }), ut(function(e) {
                return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href");
            }) || lt("type|href|height|width", function(e, t, n) {
                return n ? undefined : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
            }), n.attributes && ut(function(e) {
                return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value");
            }) || lt("value", function(e, t, n) {
                return n || "input" !== e.nodeName.toLowerCase() ? undefined : e.defaultValue;
            }), ut(function(e) {
                return null == e.getAttribute("disabled");
            }) || lt(R, function(e, t, n) {
                var r;
                return n ? undefined : (r = e.getAttributeNode(t)) && r.specified ? r.value : e[t] === !0 ? t.toLowerCase() : null;
            }), x.find = ot, x.expr = ot.selectors, x.expr[":"] = x.expr.pseudos, x.unique = ot.uniqueSort, x.text = ot.getText, x.isXMLDoc = ot.isXML, x.contains = ot.contains;
        }(e);
    var D = {};

    function A(e) {
        var t = D[e] = {};
        return x.each(e.match(w) || [], function(e, n) {
            t[n] = !0;
        }), t;
    }
    x.Callbacks = function(e) {
        e = "string" == typeof e ? D[e] || A(e) : x.extend({}, e);
        var t, n, r, i, o, s, a = [],
            u = !e.once && [],
            l = function(p) {
                for (t = e.memory && p, n = !0, s = i || 0, i = 0, o = a.length, r = !0; a && o > s; s++) {
                    if (a[s].apply(p[0], p[1]) === !1 && e.stopOnFalse) {
                        t = !1;
                        break;
                    }
                }
                r = !1, a && (u ? u.length && l(u.shift()) : t ? a = [] : c.disable());
            },
            c = {
                add: function() {
                    if (a) {
                        var n = a.length;
                        (function s(t) {
                            x.each(t, function(t, n) {
                                var r = x.type(n);
                                "function" === r ? e.unique && c.has(n) || a.push(n) : n && n.length && "string" !== r && s(n);
                            });
                        })(arguments), r ? o = a.length : t && (i = n, l(t));
                    }
                    return this;
                },
                remove: function() {
                    return a && x.each(arguments, function(e, t) {
                        var n;
                        while ((n = x.inArray(t, a, n)) > -1) {
                            a.splice(n, 1), r && (o >= n && o--, s >= n && s--);
                        }
                    }), this;
                },
                has: function(e) {
                    return e ? x.inArray(e, a) > -1 : !(!a || !a.length);
                },
                empty: function() {
                    return a = [], o = 0, this;
                },
                disable: function() {
                    return a = u = t = undefined, this;
                },
                disabled: function() {
                    return !a;
                },
                lock: function() {
                    return u = undefined, t || c.disable(), this;
                },
                locked: function() {
                    return !u;
                },
                fireWith: function(e, t) {
                    return !a || n && !u || (t = t || [], t = [e, t.slice ? t.slice() : t], r ? u.push(t) : l(t)), this;
                },
                fire: function() {
                    return c.fireWith(this, arguments), this;
                },
                fired: function() {
                    return !!n;
                }
            };
        return c;
    }, x.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", x.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", x.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", x.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n;
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this;
                    },
                    then: function() {
                        var e = arguments;
                        return x.Deferred(function(n) {
                            x.each(t, function(t, o) {
                                var s = o[0],
                                    a = x.isFunction(e[t]) && e[t];
                                i[o[1]](function() {
                                    var e = a && a.apply(this, arguments);
                                    e && x.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === r ? n.promise() : this, a ? [e] : arguments);
                                });
                            }), e = null;
                        }).promise();
                    },
                    promise: function(e) {
                        return null != e ? x.extend(e, r) : r;
                    }
                },
                i = {};
            return r.pipe = r.then, x.each(t, function(e, o) {
                var s = o[2],
                    a = o[3];
                r[o[1]] = s.add, a && s.add(function() {
                    n = a;
                }, t[1 ^ e][2].disable, t[2][2].lock), i[o[0]] = function() {
                    return i[o[0] + "With"](this === i ? r : this, arguments), this;
                }, i[o[0] + "With"] = s.fireWith;
            }), r.promise(i), e && e.call(i, i), i;
        },
        when: function(e) {
            var t = 0,
                n = d.call(arguments),
                r = n.length,
                i = 1 !== r || e && x.isFunction(e.promise) ? r : 0,
                o = 1 === i ? e : x.Deferred(),
                s = function(e, t, n) {
                    return function(r) {
                        t[e] = this, n[e] = arguments.length > 1 ? d.call(arguments) : r, n === a ? o.notifyWith(t, n) : --i || o.resolveWith(t, n);
                    };
                },
                a, u, l;
            if (r > 1) {
                for (a = Array(r), u = Array(r), l = Array(r); r > t; t++) {
                    n[t] && x.isFunction(n[t].promise) ? n[t].promise().done(s(t, l, n)).fail(o.reject).progress(s(t, u, a)) : --i;
                }
            }
            return i || o.resolveWith(l, n), o.promise();
        }
    }), x.support = function(t) {
        var n = o.createElement("input"),
            r = o.createDocumentFragment(),
            i = o.createElement("div"),
            s = o.createElement("select"),
            a = s.appendChild(o.createElement("option"));
        return n.type ? (n.type = "checkbox", t.checkOn = "" !== n.value, t.optSelected = a.selected, t.reliableMarginRight = !0, t.boxSizingReliable = !0, t.pixelPosition = !1, n.checked = !0, t.noCloneChecked = n.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !a.disabled, n = o.createElement("input"), n.value = "t", n.type = "radio", t.radioValue = "t" === n.value, n.setAttribute("checked", "t"), n.setAttribute("name", "t"), r.appendChild(n), t.checkClone = r.cloneNode(!0).cloneNode(!0).lastChild.checked, t.focusinBubbles = "onfocusin" in e, i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", t.clearCloneStyle = "content-box" === i.style.backgroundClip, x(function() {
            var n, r, s = "padding:0;margin:0;border:0;display:block;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box",
                a = o.getElementsByTagName("body")[0];
            a && (n = o.createElement("div"), n.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", a.appendChild(n).appendChild(i), i.innerHTML = "", i.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%", x.swap(a, null != a.style.zoom ? {
                zoom: 1
            } : {}, function() {
                t.boxSizing = 4 === i.offsetWidth;
            }), e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(i, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(i, null) || {
                width: "4px"
            }).width, r = i.appendChild(o.createElement("div")), r.style.cssText = i.style.cssText = s, r.style.marginRight = r.style.width = "0", i.style.width = "1px", t.reliableMarginRight = !parseFloat((e.getComputedStyle(r, null) || {}).marginRight)), a.removeChild(n));
        }), t) : t;
    }({});
    var L, q, H = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        O = /([A-Z])/g;

    function F() {
        Object.defineProperty(this.cache = {}, 0, {
            get: function() {
                return {};
            }
        }), this.expando = x.expando + Math.random();
    }
    F.uid = 1, F.accepts = function(e) {
        return e.nodeType ? 1 === e.nodeType || 9 === e.nodeType : !0;
    }, F.prototype = {
        key: function(e) {
            if (!F.accepts(e)) {
                return 0;
            }
            var t = {},
                n = e[this.expando];
            if (!n) {
                n = F.uid++;
                try {
                    t[this.expando] = {
                        value: n
                    }, Object.defineProperties(e, t);
                } catch (r) {
                    t[this.expando] = n, x.extend(e, t);
                }
            }
            return this.cache[n] || (this.cache[n] = {}), n;
        },
        set: function(e, t, n) {
            var r, i = this.key(e),
                o = this.cache[i];
            if ("string" == typeof t) {
                o[t] = n;
            } else {
                if (x.isEmptyObject(o)) {
                    x.extend(this.cache[i], t);
                } else {
                    for (r in t) {
                        o[r] = t[r];
                    }
                }
            }
            return o;
        },
        get: function(e, t) {
            var n = this.cache[this.key(e)];
            return t === undefined ? n : n[t];
        },
        access: function(e, t, n) {
            var r;
            return t === undefined || t && "string" == typeof t && n === undefined ? (r = this.get(e, t), r !== undefined ? r : this.get(e, x.camelCase(t))) : (this.set(e, t, n), n !== undefined ? n : t);
        },
        remove: function(e, t) {
            var n, r, i, o = this.key(e),
                s = this.cache[o];
            if (t === undefined) {
                this.cache[o] = {};
            } else {
                x.isArray(t) ? r = t.concat(t.map(x.camelCase)) : (i = x.camelCase(t), t in s ? r = [t, i] : (r = i, r = r in s ? [r] : r.match(w) || [])), n = r.length;
                while (n--) {
                    delete s[r[n]];
                }
            }
        },
        hasData: function(e) {
            return !x.isEmptyObject(this.cache[e[this.expando]] || {});
        },
        discard: function(e) {
            e[this.expando] && delete this.cache[e[this.expando]];
        }
    }, L = new F, q = new F, x.extend({
        acceptData: F.accepts,
        hasData: function(e) {
            return L.hasData(e) || q.hasData(e);
        },
        data: function(e, t, n) {
            return L.access(e, t, n);
        },
        removeData: function(e, t) {
            L.remove(e, t);
        },
        _data: function(e, t, n) {
            return q.access(e, t, n);
        },
        _removeData: function(e, t) {
            q.remove(e, t);
        }
    }), x.fn.extend({
        data: function(e, t) {
            var n, r, i = this[0],
                o = 0,
                s = null;
            if (e === undefined) {
                if (this.length && (s = L.get(i), 1 === i.nodeType && !q.get(i, "hasDataAttrs"))) {
                    for (n = i.attributes; n.length > o; o++) {
                        r = n[o].name, 0 === r.indexOf("data-") && (r = x.camelCase(r.slice(5)), P(i, r, s[r]));
                    }
                    q.set(i, "hasDataAttrs", !0);
                }
                return s;
            }
            return "object" == typeof e ? this.each(function() {
                L.set(this, e);
            }) : x.access(this, function(t) {
                var n, r = x.camelCase(e);
                if (i && t === undefined) {
                    if (n = L.get(i, e), n !== undefined) {
                        return n;
                    }
                    if (n = L.get(i, r), n !== undefined) {
                        return n;
                    }
                    if (n = P(i, r, undefined), n !== undefined) {
                        return n;
                    }
                } else {
                    this.each(function() {
                        var n = L.get(this, r);
                        L.set(this, r, t), -1 !== e.indexOf("-") && n !== undefined && L.set(this, e, t);
                    });
                }
            }, null, t, arguments.length > 1, null, !0);
        },
        removeData: function(e) {
            return this.each(function() {
                L.remove(this, e);
            });
        }
    });

    function P(e, t, n) {
        var r;
        if (n === undefined && 1 === e.nodeType) {
            if (r = "data-" + t.replace(O, "-$1").toLowerCase(), n = e.getAttribute(r), "string" == typeof n) {
                try {
                    n = "true" === n ? !0 : "false" === n ? !1 : "null" === n ? null : +n + "" === n ? +n : H.test(n) ? JSON.parse(n) : n;
                } catch (i) {}
                L.set(e, t, n);
            } else {
                n = undefined;
            }
        }
        return n;
    }
    x.extend({
        queue: function(e, t, n) {
            var r;
            return e ? (t = (t || "fx") + "queue", r = q.get(e, t), n && (!r || x.isArray(n) ? r = q.access(e, t, x.makeArray(n)) : r.push(n)), r || []) : undefined;
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = x.queue(e, t),
                r = n.length,
                i = n.shift(),
                o = x._queueHooks(e, t),
                s = function() {
                    x.dequeue(e, t);
                };
            "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, s, o)), !r && o && o.empty.fire();
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return q.get(e, n) || q.access(e, n, {
                empty: x.Callbacks("once memory").add(function() {
                    q.remove(e, [t + "queue", n]);
                })
            });
        }
    }), x.fn.extend({
        queue: function(e, t) {
            var n = 2;
            return "string" != typeof e && (t = e, e = "fx", n--), n > arguments.length ? x.queue(this[0], e) : t === undefined ? this : this.each(function() {
                var n = x.queue(this, e, t);
                x._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && x.dequeue(this, e);
            });
        },
        dequeue: function(e) {
            return this.each(function() {
                x.dequeue(this, e);
            });
        },
        delay: function(e, t) {
            return e = x.fx ? x.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r);
                };
            });
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", []);
        },
        promise: function(e, t) {
            var n, r = 1,
                i = x.Deferred(),
                o = this,
                s = this.length,
                a = function() {
                    --r || i.resolveWith(o, [o]);
                };
            "string" != typeof e && (t = e, e = undefined), e = e || "fx";
            while (s--) {
                n = q.get(o[s], e + "queueHooks"), n && n.empty && (r++, n.empty.add(a));
            }
            return a(), i.promise(t);
        }
    });
    var R, M, W = /[\t\r\n\f]/g,
        $ = /\r/g,
        B = /^(?:input|select|textarea|button)$/i;
    x.fn.extend({
        attr: function(e, t) {
            return x.access(this, x.attr, e, t, arguments.length > 1);
        },
        removeAttr: function(e) {
            return this.each(function() {
                x.removeAttr(this, e);
            });
        },
        prop: function(e, t) {
            return x.access(this, x.prop, e, t, arguments.length > 1);
        },
        removeProp: function(e) {
            return this.each(function() {
                delete this[x.propFix[e] || e];
            });
        },
        addClass: function(e) {
            var t, n, r, i, o, s = 0,
                a = this.length,
                u = "string" == typeof e && e;
            if (x.isFunction(e)) {
                return this.each(function(t) {
                    x(this).addClass(e.call(this, t, this.className));
                });
            }
            if (u) {
                for (t = (e || "").match(w) || []; a > s; s++) {
                    if (n = this[s], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(W, " ") : " ")) {
                        o = 0;
                        while (i = t[o++]) {
                            0 > r.indexOf(" " + i + " ") && (r += i + " ");
                        }
                        n.className = x.trim(r);
                    }
                }
            }
            return this;
        },
        removeClass: function(e) {
            var t, n, r, i, o, s = 0,
                a = this.length,
                u = 0 === arguments.length || "string" == typeof e && e;
            if (x.isFunction(e)) {
                return this.each(function(t) {
                    x(this).removeClass(e.call(this, t, this.className));
                });
            }
            if (u) {
                for (t = (e || "").match(w) || []; a > s; s++) {
                    if (n = this[s], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(W, " ") : "")) {
                        o = 0;
                        while (i = t[o++]) {
                            while (r.indexOf(" " + i + " ") >= 0) {
                                r = r.replace(" " + i + " ", " ");
                            }
                        }
                        n.className = e ? x.trim(r) : "";
                    }
                }
            }
            return this;
        },
        toggleClass: function(e, t) {
            var n = typeof e;
            return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : x.isFunction(e) ? this.each(function(n) {
                x(this).toggleClass(e.call(this, n, this.className, t), t);
            }) : this.each(function() {
                if ("string" === n) {
                    var t, i = 0,
                        o = x(this),
                        s = e.match(w) || [];
                    while (t = s[i++]) {
                        o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                    }
                } else {
                    (n === r || "boolean" === n) && (this.className && q.set(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : q.get(this, "__className__") || "");
                }
            });
        },
        hasClass: function(e) {
            var t = " " + e + " ",
                n = 0,
                r = this.length;
            for (; r > n; n++) {
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(W, " ").indexOf(t) >= 0) {
                    return !0;
                }
            }
            return !1;
        },
        val: function(e) {
            var t, n, r, i = this[0];
            if (arguments.length) {
                return r = x.isFunction(e), this.each(function(n) {
                    var i;
                    1 === this.nodeType && (i = r ? e.call(this, n, x(this).val()) : e, null == i ? i = "" : "number" == typeof i ? i += "" : x.isArray(i) && (i = x.map(i, function(e) {
                        return null == e ? "" : e + "";
                    })), t = x.valHooks[this.type] || x.valHooks[this.nodeName.toLowerCase()], t && "set" in t && t.set(this, i, "value") !== undefined || (this.value = i));
                });
            }
            if (i) {
                return t = x.valHooks[i.type] || x.valHooks[i.nodeName.toLowerCase()], t && "get" in t && (n = t.get(i, "value")) !== undefined ? n : (n = i.value, "string" == typeof n ? n.replace($, "") : null == n ? "" : n);
            }
        }
    }), x.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = e.attributes.value;
                    return !t || t.specified ? e.value : e.text;
                }
            },
            select: {
                get: function(e) {
                    var t, n, r = e.options,
                        i = e.selectedIndex,
                        o = "select-one" === e.type || 0 > i,
                        s = o ? null : [],
                        a = o ? i + 1 : r.length,
                        u = 0 > i ? a : o ? i : 0;
                    for (; a > u; u++) {
                        if (n = r[u], !(!n.selected && u !== i || (x.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && x.nodeName(n.parentNode, "optgroup"))) {
                            if (t = x(n).val(), o) {
                                return t;
                            }
                            s.push(t);
                        }
                    }
                    return s;
                },
                set: function(e, t) {
                    var n, r, i = e.options,
                        o = x.makeArray(t),
                        s = i.length;
                    while (s--) {
                        r = i[s], (r.selected = x.inArray(x(r).val(), o) >= 0) && (n = !0);
                    }
                    return n || (e.selectedIndex = -1), o;
                }
            }
        },
        attr: function(e, t, n) {
            var i, o, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) {
                return typeof e.getAttribute === r ? x.prop(e, t, n) : (1 === s && x.isXMLDoc(e) || (t = t.toLowerCase(), i = x.attrHooks[t] || (x.expr.match.bool.test(t) ? M : R)), n === undefined ? i && "get" in i && null !== (o = i.get(e, t)) ? o : (o = x.find.attr(e, t), null == o ? undefined : o) : null !== n ? i && "set" in i && (o = i.set(e, n, t)) !== undefined ? o : (e.setAttribute(t, n + ""), n) : (x.removeAttr(e, t), undefined));
            }
        },
        removeAttr: function(e, t) {
            var n, r, i = 0,
                o = t && t.match(w);
            if (o && 1 === e.nodeType) {
                while (n = o[i++]) {
                    r = x.propFix[n] || n, x.expr.match.bool.test(n) && (e[r] = !1), e.removeAttribute(n);
                }
            }
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!x.support.radioValue && "radio" === t && x.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t;
                    }
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function(e, t, n) {
            var r, i, o, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) {
                return o = 1 !== s || !x.isXMLDoc(e), o && (t = x.propFix[t] || t, i = x.propHooks[t]), n !== undefined ? i && "set" in i && (r = i.set(e, n, t)) !== undefined ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t];
            }
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    return e.hasAttribute("tabindex") || B.test(e.nodeName) || e.href ? e.tabIndex : -1;
                }
            }
        }
    }), M = {
        set: function(e, t, n) {
            return t === !1 ? x.removeAttr(e, n) : e.setAttribute(n, n), n;
        }
    }, x.each(x.expr.match.bool.source.match(/\w+/g), function(e, t) {
        var n = x.expr.attrHandle[t] || x.find.attr;
        x.expr.attrHandle[t] = function(e, t, r) {
            var i = x.expr.attrHandle[t],
                o = r ? undefined : (x.expr.attrHandle[t] = undefined) != n(e, t, r) ? t.toLowerCase() : null;
            return x.expr.attrHandle[t] = i, o;
        };
    }), x.support.optSelected || (x.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex, null;
        }
    }), x.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        x.propFix[this.toLowerCase()] = this;
    }), x.each(["radio", "checkbox"], function() {
        x.valHooks[this] = {
            set: function(e, t) {
                return x.isArray(t) ? e.checked = x.inArray(x(e).val(), t) >= 0 : undefined;
            }
        }, x.support.checkOn || (x.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value;
        });
    });
    var I = /^key/,
        z = /^(?:mouse|contextmenu)|click/,
        _ = /^(?:focusinfocus|focusoutblur)$/,
        X = /^([^.]*)(?:\.(.+)|)$/;

    function U() {
        return !0;
    }

    function Y() {
        return !1;
    }

    function V() {
        try {
            return o.activeElement;
        } catch (e) {}
    }
    x.event = {
        global: {},
        add: function(e, t, n, i, o) {
            var s, a, u, l, c, p, f, h, d, g, m, y = q.get(e);
            if (y) {
                n.handler && (s = n, n = s.handler, o = s.selector), n.guid || (n.guid = x.guid++), (l = y.events) || (l = y.events = {}), (a = y.handle) || (a = y.handle = function(e) {
                    return typeof x === r || e && x.event.triggered === e.type ? undefined : x.event.dispatch.apply(a.elem, arguments);
                }, a.elem = e), t = (t || "").match(w) || [""], c = t.length;
                while (c--) {
                    u = X.exec(t[c]) || [], d = m = u[1], g = (u[2] || "").split(".").sort(), d && (f = x.event.special[d] || {}, d = (o ? f.delegateType : f.bindType) || d, f = x.event.special[d] || {}, p = x.extend({
                        type: d,
                        origType: m,
                        data: i,
                        handler: n,
                        guid: n.guid,
                        selector: o,
                        needsContext: o && x.expr.match.needsContext.test(o),
                        namespace: g.join(".")
                    }, s), (h = l[d]) || (h = l[d] = [], h.delegateCount = 0, f.setup && f.setup.call(e, i, g, a) !== !1 || e.addEventListener && e.addEventListener(d, a, !1)), f.add && (f.add.call(e, p), p.handler.guid || (p.handler.guid = n.guid)), o ? h.splice(h.delegateCount++, 0, p) : h.push(p), x.event.global[d] = !0);
                }
                e = null;
            }
        },
        remove: function(e, t, n, r, i) {
            var o, s, a, u, l, c, p, f, h, d, g, m = q.hasData(e) && q.get(e);
            if (m && (u = m.events)) {
                t = (t || "").match(w) || [""], l = t.length;
                while (l--) {
                    if (a = X.exec(t[l]) || [], h = g = a[1], d = (a[2] || "").split(".").sort(), h) {
                        p = x.event.special[h] || {}, h = (r ? p.delegateType : p.bindType) || h, f = u[h] || [], a = a[2] && RegExp("(^|\\.)" + d.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = o = f.length;
                        while (o--) {
                            c = f[o], !i && g !== c.origType || n && n.guid !== c.guid || a && !a.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (f.splice(o, 1), c.selector && f.delegateCount--, p.remove && p.remove.call(e, c));
                        }
                        s && !f.length && (p.teardown && p.teardown.call(e, d, m.handle) !== !1 || x.removeEvent(e, h, m.handle), delete u[h]);
                    } else {
                        for (h in u) {
                            x.event.remove(e, h + t[l], n, r, !0);
                        }
                    }
                }
                x.isEmptyObject(u) && (delete m.handle, q.remove(e, "events"));
            }
        },
        trigger: function(t, n, r, i) {
            var s, a, u, l, c, p, f, h = [r || o],
                d = y.call(t, "type") ? t.type : t,
                g = y.call(t, "namespace") ? t.namespace.split(".") : [];
            if (a = u = r = r || o, 3 !== r.nodeType && 8 !== r.nodeType && !_.test(d + x.event.triggered) && (d.indexOf(".") >= 0 && (g = d.split("."), d = g.shift(), g.sort()), c = 0 > d.indexOf(":") && "on" + d, t = t[x.expando] ? t : new x.Event(d, "object" == typeof t && t), t.isTrigger = i ? 2 : 3, t.namespace = g.join("."), t.namespace_re = t.namespace ? RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = undefined, t.target || (t.target = r), n = null == n ? [t] : x.makeArray(n, [t]), f = x.event.special[d] || {}, i || !f.trigger || f.trigger.apply(r, n) !== !1)) {
                if (!i && !f.noBubble && !x.isWindow(r)) {
                    for (l = f.delegateType || d, _.test(l + d) || (a = a.parentNode); a; a = a.parentNode) {
                        h.push(a), u = a;
                    }
                    u === (r.ownerDocument || o) && h.push(u.defaultView || u.parentWindow || e);
                }
                s = 0;
                while ((a = h[s++]) && !t.isPropagationStopped()) {
                    t.type = s > 1 ? l : f.bindType || d, p = (q.get(a, "events") || {})[t.type] && q.get(a, "handle"), p && p.apply(a, n), p = c && a[c], p && x.acceptData(a) && p.apply && p.apply(a, n) === !1 && t.preventDefault();
                }
                return t.type = d, i || t.isDefaultPrevented() || f._default && f._default.apply(h.pop(), n) !== !1 || !x.acceptData(r) || c && x.isFunction(r[d]) && !x.isWindow(r) && (u = r[c], u && (r[c] = null), x.event.triggered = d, r[d](), x.event.triggered = undefined, u && (r[c] = u)), t.result;
            }
        },
        dispatch: function(e) {
            e = x.event.fix(e);
            var t, n, r, i, o, s = [],
                a = d.call(arguments),
                u = (q.get(this, "events") || {})[e.type] || [],
                l = x.event.special[e.type] || {};
            if (a[0] = e, e.delegateTarget = this, !l.preDispatch || l.preDispatch.call(this, e) !== !1) {
                s = x.event.handlers.call(this, e, u), t = 0;
                while ((i = s[t++]) && !e.isPropagationStopped()) {
                    e.currentTarget = i.elem, n = 0;
                    while ((o = i.handlers[n++]) && !e.isImmediatePropagationStopped()) {
                        (!e.namespace_re || e.namespace_re.test(o.namespace)) && (e.handleObj = o, e.data = o.data, r = ((x.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, a), r !== undefined && (e.result = r) === !1 && (e.preventDefault(), e.stopPropagation()));
                    }
                }
                return l.postDispatch && l.postDispatch.call(this, e), e.result;
            }
        },
        handlers: function(e, t) {
            var n, r, i, o, s = [],
                a = t.delegateCount,
                u = e.target;
            if (a && u.nodeType && (!e.button || "click" !== e.type)) {
                for (; u !== this; u = u.parentNode || this) {
                    if (u.disabled !== !0 || "click" !== e.type) {
                        for (r = [], n = 0; a > n; n++) {
                            o = t[n], i = o.selector + " ", r[i] === undefined && (r[i] = o.needsContext ? x(i, this).index(u) >= 0 : x.find(i, this, null, [u]).length), r[i] && r.push(o);
                        }
                        r.length && s.push({
                            elem: u,
                            handlers: r
                        });
                    }
                }
            }
            return t.length > a && s.push({
                elem: this,
                handlers: t.slice(a)
            }), s;
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e;
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, t) {
                var n, r, i, s = t.button;
                return null == e.pageX && null != t.clientX && (n = e.target.ownerDocument || o, r = n.documentElement, i = n.body, e.pageX = t.clientX + (r && r.scrollLeft || i && i.scrollLeft || 0) - (r && r.clientLeft || i && i.clientLeft || 0), e.pageY = t.clientY + (r && r.scrollTop || i && i.scrollTop || 0) - (r && r.clientTop || i && i.clientTop || 0)), e.which || s === undefined || (e.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0), e;
            }
        },
        fix: function(e) {
            if (e[x.expando]) {
                return e;
            }
            var t, n, r, i = e.type,
                s = e,
                a = this.fixHooks[i];
            a || (this.fixHooks[i] = a = z.test(i) ? this.mouseHooks : I.test(i) ? this.keyHooks : {}), r = a.props ? this.props.concat(a.props) : this.props, e = new x.Event(s), t = r.length;
            while (t--) {
                n = r[t], e[n] = s[n];
            }
            return e.target || (e.target = o), 3 === e.target.nodeType && (e.target = e.target.parentNode), a.filter ? a.filter(e, s) : e;
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    return this !== V() && this.focus ? (this.focus(), !1) : undefined;
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === V() && this.blur ? (this.blur(), !1) : undefined;
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return "checkbox" === this.type && this.click && x.nodeName(this, "input") ? (this.click(), !1) : undefined;
                },
                _default: function(e) {
                    return x.nodeName(e.target, "a");
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    e.result !== undefined && (e.originalEvent.returnValue = e.result);
                }
            }
        },
        simulate: function(e, t, n, r) {
            var i = x.extend(new x.Event, n, {
                type: e,
                isSimulated: !0,
                originalEvent: {}
            });
            r ? x.event.trigger(i, null, t) : x.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault();
        }
    }, x.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1);
    }, x.Event = function(e, t) {
        return this instanceof x.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.getPreventDefault && e.getPreventDefault() ? U : Y) : this.type = e, t && x.extend(this, t), this.timeStamp = e && e.timeStamp || x.now(), this[x.expando] = !0, undefined) : new x.Event(e, t);
    }, x.Event.prototype = {
        isDefaultPrevented: Y,
        isPropagationStopped: Y,
        isImmediatePropagationStopped: Y,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = U, e && e.preventDefault && e.preventDefault();
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = U, e && e.stopPropagation && e.stopPropagation();
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = U, this.stopPropagation();
        }
    }, x.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function(e, t) {
        x.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, r = this,
                    i = e.relatedTarget,
                    o = e.handleObj;
                return (!i || i !== r && !x.contains(r, i)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n;
            }
        };
    }), x.support.focusinBubbles || x.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = 0,
            r = function(e) {
                x.event.simulate(t, e.target, x.event.fix(e), !0);
            };
        x.event.special[t] = {
            setup: function() {
                0 === n++ && o.addEventListener(e, r, !0);
            },
            teardown: function() {
                0 === --n && o.removeEventListener(e, r, !0);
            }
        };
    }), x.fn.extend({
        on: function(e, t, n, r, i) {
            var o, s;
            if ("object" == typeof e) {
                "string" != typeof t && (n = n || t, t = undefined);
                for (s in e) {
                    this.on(s, t, n, e[s], i);
                }
                return this;
            }
            if (null == n && null == r ? (r = t, n = t = undefined) : null == r && ("string" == typeof t ? (r = n, n = undefined) : (r = n, n = t, t = undefined)), r === !1) {
                r = Y;
            } else {
                if (!r) {
                    return this;
                }
            }
            return 1 === i && (o = r, r = function(e) {
                return x().off(e), o.apply(this, arguments);
            }, r.guid = o.guid || (o.guid = x.guid++)), this.each(function() {
                x.event.add(this, e, r, n, t);
            });
        },
        one: function(e, t, n, r) {
            return this.on(e, t, n, r, 1);
        },
        off: function(e, t, n) {
            var r, i;
            if (e && e.preventDefault && e.handleObj) {
                return r = e.handleObj, x(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
            }
            if ("object" == typeof e) {
                for (i in e) {
                    this.off(i, t, e[i]);
                }
                return this;
            }
            return (t === !1 || "function" == typeof t) && (n = t, t = undefined), n === !1 && (n = Y), this.each(function() {
                x.event.remove(this, e, n, t);
            });
        },
        trigger: function(e, t) {
            return this.each(function() {
                x.event.trigger(e, t, this);
            });
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            return n ? x.event.trigger(e, t, n, !0) : undefined;
        }
    });
    var G = /^.[^:#\[\.,]*$/,
        J = /^(?:parents|prev(?:Until|All))/,
        Q = x.expr.match.needsContext,
        K = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    x.fn.extend({
        find: function(e) {
            var t, n = [],
                r = this,
                i = r.length;
            if ("string" != typeof e) {
                return this.pushStack(x(e).filter(function() {
                    for (t = 0; i > t; t++) {
                        if (x.contains(r[t], this)) {
                            return !0;
                        }
                    }
                }));
            }
            for (t = 0; i > t; t++) {
                x.find(e, r[t], n);
            }
            return n = this.pushStack(i > 1 ? x.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n;
        },
        has: function(e) {
            var t = x(e, this),
                n = t.length;
            return this.filter(function() {
                var e = 0;
                for (; n > e; e++) {
                    if (x.contains(this, t[e])) {
                        return !0;
                    }
                }
            });
        },
        not: function(e) {
            return this.pushStack(et(this, e || [], !0));
        },
        filter: function(e) {
            return this.pushStack(et(this, e || [], !1));
        },
        is: function(e) {
            return !!et(this, "string" == typeof e && Q.test(e) ? x(e) : e || [], !1).length;
        },
        closest: function(e, t) {
            var n, r = 0,
                i = this.length,
                o = [],
                s = Q.test(e) || "string" != typeof e ? x(e, t || this.context) : 0;
            for (; i > r; r++) {
                for (n = this[r]; n && n !== t; n = n.parentNode) {
                    if (11 > n.nodeType && (s ? s.index(n) > -1 : 1 === n.nodeType && x.find.matchesSelector(n, e))) {
                        n = o.push(n);
                        break;
                    }
                }
            }
            return this.pushStack(o.length > 1 ? x.unique(o) : o);
        },
        index: function(e) {
            return e ? "string" == typeof e ? g.call(x(e), this[0]) : g.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
        },
        add: function(e, t) {
            var n = "string" == typeof e ? x(e, t) : x.makeArray(e && e.nodeType ? [e] : e),
                r = x.merge(this.get(), n);
            return this.pushStack(x.unique(r));
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
        }
    });

    function Z(e, t) {
        while ((e = e[t]) && 1 !== e.nodeType) {}
        return e;
    }
    x.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null;
        },
        parents: function(e) {
            return x.dir(e, "parentNode");
        },
        parentsUntil: function(e, t, n) {
            return x.dir(e, "parentNode", n);
        },
        next: function(e) {
            return Z(e, "nextSibling");
        },
        prev: function(e) {
            return Z(e, "previousSibling");
        },
        nextAll: function(e) {
            return x.dir(e, "nextSibling");
        },
        prevAll: function(e) {
            return x.dir(e, "previousSibling");
        },
        nextUntil: function(e, t, n) {
            return x.dir(e, "nextSibling", n);
        },
        prevUntil: function(e, t, n) {
            return x.dir(e, "previousSibling", n);
        },
        siblings: function(e) {
            return x.sibling((e.parentNode || {}).firstChild, e);
        },
        children: function(e) {
            return x.sibling(e.firstChild);
        },
        contents: function(e) {
            return e.contentDocument || x.merge([], e.childNodes);
        }
    }, function(e, t) {
        x.fn[e] = function(n, r) {
            var i = x.map(this, t, n);
            return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = x.filter(r, i)), this.length > 1 && (K[e] || x.unique(i), J.test(e) && i.reverse()), this.pushStack(i);
        };
    }), x.extend({
        filter: function(e, t, n) {
            var r = t[0];
            return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? x.find.matchesSelector(r, e) ? [r] : [] : x.find.matches(e, x.grep(t, function(e) {
                return 1 === e.nodeType;
            }));
        },
        dir: function(e, t, n) {
            var r = [],
                i = n !== undefined;
            while ((e = e[t]) && 9 !== e.nodeType) {
                if (1 === e.nodeType) {
                    if (i && x(e).is(n)) {
                        break;
                    }
                    r.push(e);
                }
            }
            return r;
        },
        sibling: function(e, t) {
            var n = [];
            for (; e; e = e.nextSibling) {
                1 === e.nodeType && e !== t && n.push(e);
            }
            return n;
        }
    });

    function et(e, t, n) {
        if (x.isFunction(t)) {
            return x.grep(e, function(e, r) {
                return !!t.call(e, r, e) !== n;
            });
        }
        if (t.nodeType) {
            return x.grep(e, function(e) {
                return e === t !== n;
            });
        }
        if ("string" == typeof t) {
            if (G.test(t)) {
                return x.filter(t, e, n);
            }
            t = x.filter(t, e);
        }
        return x.grep(e, function(e) {
            return g.call(t, e) >= 0 !== n;
        });
    }
    var tt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        nt = /<([\w:]+)/,
        rt = /<|&#?\w+;/,
        it = /<(?:script|style|link)/i,
        ot = /^(?:checkbox|radio)$/i,
        st = /checked\s*(?:[^=]|=\s*.checked.)/i,
        at = /^$|\/(?:java|ecma)script/i,
        ut = /^true\/(.*)/,
        lt = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        ct = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""]
        };
    ct.optgroup = ct.option, ct.tbody = ct.tfoot = ct.colgroup = ct.caption = ct.thead, ct.th = ct.td, x.fn.extend({
        text: function(e) {
            return x.access(this, function(e) {
                return e === undefined ? x.text(this) : this.empty().append((this[0] && this[0].ownerDocument || o).createTextNode(e));
            }, null, e, arguments.length);
        },
        append: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = pt(this, e);
                    t.appendChild(e);
                }
            });
        },
        prepend: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = pt(this, e);
                    t.insertBefore(e, t.firstChild);
                }
            });
        },
        before: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this);
            });
        },
        after: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
            });
        },
        remove: function(e, t) {
            var n, r = e ? x.filter(e, this) : this,
                i = 0;
            for (; null != (n = r[i]); i++) {
                t || 1 !== n.nodeType || x.cleanData(mt(n)), n.parentNode && (t && x.contains(n.ownerDocument, n) && dt(mt(n, "script")), n.parentNode.removeChild(n));
            }
            return this;
        },
        empty: function() {
            var e, t = 0;
            for (; null != (e = this[t]); t++) {
                1 === e.nodeType && (x.cleanData(mt(e, !1)), e.textContent = "");
            }
            return this;
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                return x.clone(this, e, t);
            });
        },
        html: function(e) {
            return x.access(this, function(e) {
                var t = this[0] || {},
                    n = 0,
                    r = this.length;
                if (e === undefined && 1 === t.nodeType) {
                    return t.innerHTML;
                }
                if ("string" == typeof e && !it.test(e) && !ct[(nt.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = e.replace(tt, "<$1></$2>");
                    try {
                        for (; r > n; n++) {
                            t = this[n] || {}, 1 === t.nodeType && (x.cleanData(mt(t, !1)), t.innerHTML = e);
                        }
                        t = 0;
                    } catch (i) {}
                }
                t && this.empty().append(e);
            }, null, e, arguments.length);
        },
        replaceWith: function() {
            var e = x.map(this, function(e) {
                    return [e.nextSibling, e.parentNode];
                }),
                t = 0;
            return this.domManip(arguments, function(n) {
                var r = e[t++],
                    i = e[t++];
                i && (r && r.parentNode !== i && (r = this.nextSibling), x(this).remove(), i.insertBefore(n, r));
            }, !0), t ? this : this.remove();
        },
        detach: function(e) {
            return this.remove(e, !0);
        },
        domManip: function(e, t, n) {
            e = f.apply([], e);
            var r, i, o, s, a, u, l = 0,
                c = this.length,
                p = this,
                h = c - 1,
                d = e[0],
                g = x.isFunction(d);
            if (g || !(1 >= c || "string" != typeof d || x.support.checkClone) && st.test(d)) {
                return this.each(function(r) {
                    var i = p.eq(r);
                    g && (e[0] = d.call(this, r, i.html())), i.domManip(e, t, n);
                });
            }
            if (c && (r = x.buildFragment(e, this[0].ownerDocument, !1, !n && this), i = r.firstChild, 1 === r.childNodes.length && (r = i), i)) {
                for (o = x.map(mt(r, "script"), ft), s = o.length; c > l; l++) {
                    a = r, l !== h && (a = x.clone(a, !0, !0), s && x.merge(o, mt(a, "script"))), t.call(this[l], a, l);
                }
                if (s) {
                    for (u = o[o.length - 1].ownerDocument, x.map(o, ht), l = 0; s > l; l++) {
                        a = o[l], at.test(a.type || "") && !q.access(a, "globalEval") && x.contains(u, a) && (a.src ? x._evalUrl(a.src) : x.globalEval(a.textContent.replace(lt, "")));
                    }
                }
            }
            return this;
        }
    }), x.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        x.fn[e] = function(e) {
            var n, r = [],
                i = x(e),
                o = i.length - 1,
                s = 0;
            for (; o >= s; s++) {
                n = s === o ? this : this.clone(!0), x(i[s])[t](n), h.apply(r, n.get());
            }
            return this.pushStack(r);
        };
    }), x.extend({
        clone: function(e, t, n) {
            var r, i, o, s, a = e.cloneNode(!0),
                u = x.contains(e.ownerDocument, e);
            if (!(x.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || x.isXMLDoc(e))) {
                for (s = mt(a), o = mt(e), r = 0, i = o.length; i > r; r++) {
                    yt(o[r], s[r]);
                }
            }
            if (t) {
                if (n) {
                    for (o = o || mt(e), s = s || mt(a), r = 0, i = o.length; i > r; r++) {
                        gt(o[r], s[r]);
                    }
                } else {
                    gt(e, a);
                }
            }
            return s = mt(a, "script"), s.length > 0 && dt(s, !u && mt(e, "script")), a;
        },
        buildFragment: function(e, t, n, r) {
            var i, o, s, a, u, l, c = 0,
                p = e.length,
                f = t.createDocumentFragment(),
                h = [];
            for (; p > c; c++) {
                if (i = e[c], i || 0 === i) {
                    if ("object" === x.type(i)) {
                        x.merge(h, i.nodeType ? [i] : i);
                    } else {
                        if (rt.test(i)) {
                            o = o || f.appendChild(t.createElement("div")), s = (nt.exec(i) || ["", ""])[1].toLowerCase(), a = ct[s] || ct._default, o.innerHTML = a[1] + i.replace(tt, "<$1></$2>") + a[2], l = a[0];
                            while (l--) {
                                o = o.lastChild;
                            }
                            x.merge(h, o.childNodes), o = f.firstChild, o.textContent = "";
                        } else {
                            h.push(t.createTextNode(i));
                        }
                    }
                }
            }
            f.textContent = "", c = 0;
            while (i = h[c++]) {
                if ((!r || -1 === x.inArray(i, r)) && (u = x.contains(i.ownerDocument, i), o = mt(f.appendChild(i), "script"), u && dt(o), n)) {
                    l = 0;
                    while (i = o[l++]) {
                        at.test(i.type || "") && n.push(i);
                    }
                }
            }
            return f;
        },
        cleanData: function(e) {
            var t, n, r, i, o, s, a = x.event.special,
                u = 0;
            for (;
                (n = e[u]) !== undefined; u++) {
                if (F.accepts(n) && (o = n[q.expando], o && (t = q.cache[o]))) {
                    if (r = Object.keys(t.events || {}), r.length) {
                        for (s = 0;
                            (i = r[s]) !== undefined; s++) {
                            a[i] ? x.event.remove(n, i) : x.removeEvent(n, i, t.handle);
                        }
                    }
                    q.cache[o] && delete q.cache[o];
                }
                delete L.cache[n[L.expando]];
            }
        },
        _evalUrl: function(e) {
            return x.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                "throws": !0
            });
        }
    });

    function pt(e, t) {
        return x.nodeName(e, "table") && x.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e;
    }

    function ft(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e;
    }

    function ht(e) {
        var t = ut.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e;
    }

    function dt(e, t) {
        var n = e.length,
            r = 0;
        for (; n > r; r++) {
            q.set(e[r], "globalEval", !t || q.get(t[r], "globalEval"));
        }
    }

    function gt(e, t) {
        var n, r, i, o, s, a, u, l;
        if (1 === t.nodeType) {
            if (q.hasData(e) && (o = q.access(e), s = q.set(t, o), l = o.events)) {
                delete s.handle, s.events = {};
                for (i in l) {
                    for (n = 0, r = l[i].length; r > n; n++) {
                        x.event.add(t, i, l[i][n]);
                    }
                }
            }
            L.hasData(e) && (a = L.access(e), u = x.extend({}, a), L.set(t, u));
        }
    }

    function mt(e, t) {
        var n = e.getElementsByTagName ? e.getElementsByTagName(t || "*") : e.querySelectorAll ? e.querySelectorAll(t || "*") : [];
        return t === undefined || t && x.nodeName(e, t) ? x.merge([e], n) : n;
    }

    function yt(e, t) {
        var n = t.nodeName.toLowerCase();
        "input" === n && ot.test(e.type) ? t.checked = e.checked : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue);
    }
    x.fn.extend({
        wrapAll: function(e) {
            var t;
            return x.isFunction(e) ? this.each(function(t) {
                x(this).wrapAll(e.call(this, t));
            }) : (this[0] && (t = x(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                var e = this;
                while (e.firstElementChild) {
                    e = e.firstElementChild;
                }
                return e;
            }).append(this)), this);
        },
        wrapInner: function(e) {
            return x.isFunction(e) ? this.each(function(t) {
                x(this).wrapInner(e.call(this, t));
            }) : this.each(function() {
                var t = x(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e);
            });
        },
        wrap: function(e) {
            var t = x.isFunction(e);
            return this.each(function(n) {
                x(this).wrapAll(t ? e.call(this, n) : e);
            });
        },
        unwrap: function() {
            return this.parent().each(function() {
                x.nodeName(this, "body") || x(this).replaceWith(this.childNodes);
            }).end();
        }
    });
    var vt, xt, bt = /^(none|table(?!-c[ea]).+)/,
        wt = /^margin/,
        Tt = RegExp("^(" + b + ")(.*)$", "i"),
        Ct = RegExp("^(" + b + ")(?!px)[a-z%]+$", "i"),
        kt = RegExp("^([+-])=(" + b + ")", "i"),
        Nt = {
            BODY: "block"
        },
        Et = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        St = {
            letterSpacing: 0,
            fontWeight: 400
        },
        jt = ["Top", "Right", "Bottom", "Left"],
        Dt = ["Webkit", "O", "Moz", "ms"];

    function At(e, t) {
        if (t in e) {
            return t;
        }
        var n = t.charAt(0).toUpperCase() + t.slice(1),
            r = t,
            i = Dt.length;
        while (i--) {
            if (t = Dt[i] + n, t in e) {
                return t;
            }
        }
        return r;
    }

    function Lt(e, t) {
        return e = t || e, "none" === x.css(e, "display") || !x.contains(e.ownerDocument, e);
    }

    function qt(t) {
        return e.getComputedStyle(t, null);
    }

    function Ht(e, t) {
        var n, r, i, o = [],
            s = 0,
            a = e.length;
        for (; a > s; s++) {
            r = e[s], r.style && (o[s] = q.get(r, "olddisplay"), n = r.style.display, t ? (o[s] || "none" !== n || (r.style.display = ""), "" === r.style.display && Lt(r) && (o[s] = q.access(r, "olddisplay", Rt(r.nodeName)))) : o[s] || (i = Lt(r), (n && "none" !== n || !i) && q.set(r, "olddisplay", i ? n : x.css(r, "display"))));
        }
        for (s = 0; a > s; s++) {
            r = e[s], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? o[s] || "" : "none"));
        }
        return e;
    }
    x.fn.extend({
        css: function(e, t) {
            return x.access(this, function(e, t, n) {
                var r, i, o = {},
                    s = 0;
                if (x.isArray(t)) {
                    for (r = qt(e), i = t.length; i > s; s++) {
                        o[t[s]] = x.css(e, t[s], !1, r);
                    }
                    return o;
                }
                return n !== undefined ? x.style(e, t, n) : x.css(e, t);
            }, e, t, arguments.length > 1);
        },
        show: function() {
            return Ht(this, !0);
        },
        hide: function() {
            return Ht(this);
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                Lt(this) ? x(this).show() : x(this).hide();
            });
        }
    }), x.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = vt(e, "opacity");
                        return "" === n ? "1" : n;
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": "cssFloat"
        },
        style: function(e, t, n, r) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var i, o, s, a = x.camelCase(t),
                    u = e.style;
                return t = x.cssProps[a] || (x.cssProps[a] = At(u, a)), s = x.cssHooks[t] || x.cssHooks[a], n === undefined ? s && "get" in s && (i = s.get(e, !1, r)) !== undefined ? i : u[t] : (o = typeof n, "string" === o && (i = kt.exec(n)) && (n = (i[1] + 1) * i[2] + parseFloat(x.css(e, t)), o = "number"), null == n || "number" === o && isNaN(n) || ("number" !== o || x.cssNumber[a] || (n += "px"), x.support.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (u[t] = "inherit"), s && "set" in s && (n = s.set(e, n, r)) === undefined || (u[t] = n)), undefined);
            }
        },
        css: function(e, t, n, r) {
            var i, o, s, a = x.camelCase(t);
            return t = x.cssProps[a] || (x.cssProps[a] = At(e.style, a)), s = x.cssHooks[t] || x.cssHooks[a], s && "get" in s && (i = s.get(e, !0, n)), i === undefined && (i = vt(e, t, r)), "normal" === i && t in St && (i = St[t]), "" === n || n ? (o = parseFloat(i), n === !0 || x.isNumeric(o) ? o || 0 : i) : i;
        }
    }), vt = function(e, t, n) {
        var r, i, o, s = n || qt(e),
            a = s ? s.getPropertyValue(t) || s[t] : undefined,
            u = e.style;
        return s && ("" !== a || x.contains(e.ownerDocument, e) || (a = x.style(e, t)), Ct.test(a) && wt.test(t) && (r = u.width, i = u.minWidth, o = u.maxWidth, u.minWidth = u.maxWidth = u.width = a, a = s.width, u.width = r, u.minWidth = i, u.maxWidth = o)), a;
    };

    function Ot(e, t, n) {
        var r = Tt.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t;
    }

    function Ft(e, t, n, r, i) {
        var o = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0,
            s = 0;
        for (; 4 > o; o += 2) {
            "margin" === n && (s += x.css(e, n + jt[o], !0, i)), r ? ("content" === n && (s -= x.css(e, "padding" + jt[o], !0, i)), "margin" !== n && (s -= x.css(e, "border" + jt[o] + "Width", !0, i))) : (s += x.css(e, "padding" + jt[o], !0, i), "padding" !== n && (s += x.css(e, "border" + jt[o] + "Width", !0, i)));
        }
        return s;
    }

    function Pt(e, t, n) {
        var r = !0,
            i = "width" === t ? e.offsetWidth : e.offsetHeight,
            o = qt(e),
            s = x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, o);
        if (0 >= i || null == i) {
            if (i = vt(e, t, o), (0 > i || null == i) && (i = e.style[t]), Ct.test(i)) {
                return i;
            }
            r = s && (x.support.boxSizingReliable || i === e.style[t]), i = parseFloat(i) || 0;
        }
        return i + Ft(e, t, n || (s ? "border" : "content"), r, o) + "px";
    }

    function Rt(e) {
        var t = o,
            n = Nt[e];
        return n || (n = Mt(e, t), "none" !== n && n || (xt = (xt || x("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (xt[0].contentWindow || xt[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = Mt(e, t), xt.detach()), Nt[e] = n), n;
    }

    function Mt(e, t) {
        var n = x(t.createElement(e)).appendTo(t.body),
            r = x.css(n[0], "display");
        return n.remove(), r;
    }
    x.each(["height", "width"], function(e, t) {
        x.cssHooks[t] = {
            get: function(e, n, r) {
                return n ? 0 === e.offsetWidth && bt.test(x.css(e, "display")) ? x.swap(e, Et, function() {
                    return Pt(e, t, r);
                }) : Pt(e, t, r) : undefined;
            },
            set: function(e, n, r) {
                var i = r && qt(e);
                return Ot(e, n, r ? Ft(e, t, r, x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, i), i) : 0);
            }
        };
    }), x(function() {
        x.support.reliableMarginRight || (x.cssHooks.marginRight = {
            get: function(e, t) {
                return t ? x.swap(e, {
                    display: "inline-block"
                }, vt, [e, "marginRight"]) : undefined;
            }
        }), !x.support.pixelPosition && x.fn.position && x.each(["top", "left"], function(e, t) {
            x.cssHooks[t] = {
                get: function(e, n) {
                    return n ? (n = vt(e, t), Ct.test(n) ? x(e).position()[t] + "px" : n) : undefined;
                }
            };
        });
    }), x.expr && x.expr.filters && (x.expr.filters.hidden = function(e) {
        return 0 >= e.offsetWidth && 0 >= e.offsetHeight;
    }, x.expr.filters.visible = function(e) {
        return !x.expr.filters.hidden(e);
    }), x.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        x.cssHooks[e + t] = {
            expand: function(n) {
                var r = 0,
                    i = {},
                    o = "string" == typeof n ? n.split(" ") : [n];
                for (; 4 > r; r++) {
                    i[e + jt[r] + t] = o[r] || o[r - 2] || o[0];
                }
                return i;
            }
        }, wt.test(e) || (x.cssHooks[e + t].set = Ot);
    });
    var Wt = /%20/g,
        $t = /\[\]$/,
        Bt = /\r?\n/g,
        It = /^(?:submit|button|image|reset|file)$/i,
        zt = /^(?:input|select|textarea|keygen)/i;
    x.fn.extend({
        serialize: function() {
            return x.param(this.serializeArray());
        },
        serializeArray: function() {
            return this.map(function() {
                var e = x.prop(this, "elements");
                return e ? x.makeArray(e) : this;
            }).filter(function() {
                var e = this.type;
                return this.name && !x(this).is(":disabled") && zt.test(this.nodeName) && !It.test(e) && (this.checked || !ot.test(e));
            }).map(function(e, t) {
                var n = x(this).val();
                return null == n ? null : x.isArray(n) ? x.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(Bt, "\r\n")
                    };
                }) : {
                    name: t.name,
                    value: n.replace(Bt, "\r\n")
                };
            }).get();
        }
    }), x.param = function(e, t) {
        var n, r = [],
            i = function(e, t) {
                t = x.isFunction(t) ? t() : null == t ? "" : t, r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t);
            };
        if (t === undefined && (t = x.ajaxSettings && x.ajaxSettings.traditional), x.isArray(e) || e.jquery && !x.isPlainObject(e)) {
            x.each(e, function() {
                i(this.name, this.value);
            });
        } else {
            for (n in e) {
                _t(n, e[n], t, i);
            }
        }
        return r.join("&").replace(Wt, "+");
    };

    function _t(e, t, n, r) {
        var i;
        if (x.isArray(t)) {
            x.each(t, function(t, i) {
                n || $t.test(e) ? r(e, i) : _t(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r);
            });
        } else {
            if (n || "object" !== x.type(t)) {
                r(e, t);
            } else {
                for (i in t) {
                    _t(e + "[" + i + "]", t[i], n, r);
                }
            }
        }
    }
    x.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        x.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t);
        };
    }), x.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e);
        },
        bind: function(e, t, n) {
            return this.on(e, null, t, n);
        },
        unbind: function(e, t) {
            return this.off(e, null, t);
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r);
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
        }
    });
    var Xt, Ut, Yt = x.now(),
        Vt = /\?/,
        Gt = /#.*$/,
        Jt = /([?&])_=[^&]*/,
        Qt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        Kt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Zt = /^(?:GET|HEAD)$/,
        en = /^\/\//,
        tn = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        nn = x.fn.load,
        rn = {},
        on = {},
        sn = "*/".concat("*");
    try {
        Ut = i.href;
    } catch (an) {
        Ut = o.createElement("a"), Ut.href = "", Ut = Ut.href;
    }
    Xt = tn.exec(Ut.toLowerCase()) || [];

    function un(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var r, i = 0,
                o = t.toLowerCase().match(w) || [];
            if (x.isFunction(n)) {
                while (r = o[i++]) {
                    "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n);
                }
            }
        };
    }

    function ln(e, t, n, r) {
        var i = {},
            o = e === on;

        function s(a) {
            var u;
            return i[a] = !0, x.each(e[a] || [], function(e, a) {
                var l = a(t, n, r);
                return "string" != typeof l || o || i[l] ? o ? !(u = l) : undefined : (t.dataTypes.unshift(l), s(l), !1);
            }), u;
        }
        return s(t.dataTypes[0]) || !i["*"] && s("*");
    }

    function cn(e, t) {
        var n, r, i = x.ajaxSettings.flatOptions || {};
        for (n in t) {
            t[n] !== undefined && ((i[n] ? e : r || (r = {}))[n] = t[n]);
        }
        return r && x.extend(!0, e, r), e;
    }
    x.fn.load = function(e, t, n) {
        if ("string" != typeof e && nn) {
            return nn.apply(this, arguments);
        }
        var r, i, o, s = this,
            a = e.indexOf(" ");
        return a >= 0 && (r = e.slice(a), e = e.slice(0, a)), x.isFunction(t) ? (n = t, t = undefined) : t && "object" == typeof t && (i = "POST"), s.length > 0 && x.ajax({
            url: e,
            type: i,
            dataType: "html",
            data: t
        }).done(function(e) {
            o = arguments, s.html(r ? x("<div>").append(x.parseHTML(e)).find(r) : e);
        }).complete(n && function(e, t) {
            s.each(n, o || [e.responseText, t, e]);
        }), this;
    }, x.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        x.fn[t] = function(e) {
            return this.on(t, e);
        };
    }), x.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Ut,
            type: "GET",
            isLocal: Kt.test(Xt[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": sn,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": x.parseJSON,
                "text xml": x.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? cn(cn(e, x.ajaxSettings), t) : cn(x.ajaxSettings, e);
        },
        ajaxPrefilter: un(rn),
        ajaxTransport: un(on),
        ajax: function(e, t) {
            "object" == typeof e && (t = e, e = undefined), t = t || {};
            var n, r, i, o, s, a, u, l, c = x.ajaxSetup({}, t),
                p = c.context || c,
                f = c.context && (p.nodeType || p.jquery) ? x(p) : x.event,
                h = x.Deferred(),
                d = x.Callbacks("once memory"),
                g = c.statusCode || {},
                m = {},
                y = {},
                v = 0,
                b = "canceled",
                T = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === v) {
                            if (!o) {
                                o = {};
                                while (t = Qt.exec(i)) {
                                    o[t[1].toLowerCase()] = t[2];
                                }
                            }
                            t = o[e.toLowerCase()];
                        }
                        return null == t ? null : t;
                    },
                    getAllResponseHeaders: function() {
                        return 2 === v ? i : null;
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return v || (e = y[n] = y[n] || e, m[e] = t), this;
                    },
                    overrideMimeType: function(e) {
                        return v || (c.mimeType = e), this;
                    },
                    statusCode: function(e) {
                        var t;
                        if (e) {
                            if (2 > v) {
                                for (t in e) {
                                    g[t] = [g[t], e[t]];
                                }
                            } else {
                                T.always(e[T.status]);
                            }
                        }
                        return this;
                    },
                    abort: function(e) {
                        var t = e || b;
                        return n && n.abort(t), k(0, t), this;
                    }
                };
            if (h.promise(T).complete = d.add, T.success = T.done, T.error = T.fail, c.url = ((e || c.url || Ut) + "").replace(Gt, "").replace(en, Xt[1] + "//"), c.type = t.method || t.type || c.method || c.type, c.dataTypes = x.trim(c.dataType || "*").toLowerCase().match(w) || [""], null == c.crossDomain && (a = tn.exec(c.url.toLowerCase()), c.crossDomain = !(!a || a[1] === Xt[1] && a[2] === Xt[2] && (a[3] || ("http:" === a[1] ? "80" : "443")) === (Xt[3] || ("http:" === Xt[1] ? "80" : "443")))), c.data && c.processData && "string" != typeof c.data && (c.data = x.param(c.data, c.traditional)), ln(rn, c, t, T), 2 === v) {
                return T;
            }
            u = c.global, u && 0 === x.active++ && x.event.trigger("ajaxStart"), c.type = c.type.toUpperCase(), c.hasContent = !Zt.test(c.type), r = c.url, c.hasContent || (c.data && (r = c.url += (Vt.test(r) ? "&" : "?") + c.data, delete c.data), c.cache === !1 && (c.url = Jt.test(r) ? r.replace(Jt, "$1_=" + Yt++) : r + (Vt.test(r) ? "&" : "?") + "_=" + Yt++)), c.ifModified && (x.lastModified[r] && T.setRequestHeader("If-Modified-Since", x.lastModified[r]), x.etag[r] && T.setRequestHeader("If-None-Match", x.etag[r])), (c.data && c.hasContent && c.contentType !== !1 || t.contentType) && T.setRequestHeader("Content-Type", c.contentType), T.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + ("*" !== c.dataTypes[0] ? ", " + sn + "; q=0.01" : "") : c.accepts["*"]);
            for (l in c.headers) {
                T.setRequestHeader(l, c.headers[l]);
            }
            if (c.beforeSend && (c.beforeSend.call(p, T, c) === !1 || 2 === v)) {
                return T.abort();
            }
            b = "abort";
            for (l in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) {
                T[l](c[l]);
            }
            if (n = ln(on, c, t, T)) {
                T.readyState = 1, u && f.trigger("ajaxSend", [T, c]), c.async && c.timeout > 0 && (s = setTimeout(function() {
                    T.abort("timeout");
                }, c.timeout));
                try {
                    v = 1, n.send(m, k);
                } catch (C) {
                    if (!(2 > v)) {
                        throw C;
                    }
                    k(-1, C);
                }
            } else {
                k(-1, "No Transport");
            }

            function k(e, t, o, a) {
                var l, m, y, b, w, C = t;
                2 !== v && (v = 2, s && clearTimeout(s), n = undefined, i = a || "", T.readyState = e > 0 ? 4 : 0, l = e >= 200 && 300 > e || 304 === e, o && (b = pn(c, T, o)), b = fn(c, b, T, l), l ? (c.ifModified && (w = T.getResponseHeader("Last-Modified"), w && (x.lastModified[r] = w), w = T.getResponseHeader("etag"), w && (x.etag[r] = w)), 204 === e || "HEAD" === c.type ? C = "nocontent" : 304 === e ? C = "notmodified" : (C = b.state, m = b.data, y = b.error, l = !y)) : (y = C, (e || !C) && (C = "error", 0 > e && (e = 0))), T.status = e, T.statusText = (t || C) + "", l ? h.resolveWith(p, [m, C, T]) : h.rejectWith(p, [T, C, y]), T.statusCode(g), g = undefined, u && f.trigger(l ? "ajaxSuccess" : "ajaxError", [T, c, l ? m : y]), d.fireWith(p, [T, C]), u && (f.trigger("ajaxComplete", [T, c]), --x.active || x.event.trigger("ajaxStop")));
            }
            return T;
        },
        getJSON: function(e, t, n) {
            return x.get(e, t, n, "json");
        },
        getScript: function(e, t) {
            return x.get(e, undefined, t, "script");
        }
    }), x.each(["get", "post"], function(e, t) {
        x[t] = function(e, n, r, i) {
            return x.isFunction(n) && (i = i || r, r = n, n = undefined), x.ajax({
                url: e,
                type: t,
                dataType: i,
                data: n,
                success: r
            });
        };
    });

    function pn(e, t, n) {
        var r, i, o, s, a = e.contents,
            u = e.dataTypes;
        while ("*" === u[0]) {
            u.shift(), r === undefined && (r = e.mimeType || t.getResponseHeader("Content-Type"));
        }
        if (r) {
            for (i in a) {
                if (a[i] && a[i].test(r)) {
                    u.unshift(i);
                    break;
                }
            }
        }
        if (u[0] in n) {
            o = u[0];
        } else {
            for (i in n) {
                if (!u[0] || e.converters[i + " " + u[0]]) {
                    o = i;
                    break;
                }
                s || (s = i);
            }
            o = o || s;
        }
        return o ? (o !== u[0] && u.unshift(o), n[o]) : undefined;
    }

    function fn(e, t, n, r) {
        var i, o, s, a, u, l = {},
            c = e.dataTypes.slice();
        if (c[1]) {
            for (s in e.converters) {
                l[s.toLowerCase()] = e.converters[s];
            }
        }
        o = c.shift();
        while (o) {
            if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c.shift()) {
                if ("*" === o) {
                    o = u;
                } else {
                    if ("*" !== u && u !== o) {
                        if (s = l[u + " " + o] || l["* " + o], !s) {
                            for (i in l) {
                                if (a = i.split(" "), a[1] === o && (s = l[u + " " + a[0]] || l["* " + a[0]])) {
                                    s === !0 ? s = l[i] : l[i] !== !0 && (o = a[0], c.unshift(a[1]));
                                    break;
                                }
                            }
                        }
                        if (s !== !0) {
                            if (s && e["throws"]) {
                                t = s(t);
                            } else {
                                try {
                                    t = s(t);
                                } catch (p) {
                                    return {
                                        state: "parsererror",
                                        error: s ? p : "No conversion from " + u + " to " + o
                                    };
                                }
                            }
                        }
                    }
                }
            }
        }
        return {
            state: "success",
            data: t
        };
    }
    x.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return x.globalEval(e), e;
            }
        }
    }), x.ajaxPrefilter("script", function(e) {
        e.cache === undefined && (e.cache = !1), e.crossDomain && (e.type = "GET");
    }), x.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var t, n;
            return {
                send: function(r, i) {
                    t = x("<script>").prop({
                        async: !0,
                        charset: e.scriptCharset,
                        src: e.url
                    }).on("load error", n = function(e) {
                        t.remove(), n = null, e && i("error" === e.type ? 404 : 200, e.type);
                    }), o.head.appendChild(t[0]);
                },
                abort: function() {
                    n && n();
                }
            };
        }
    });
    var hn = [],
        dn = /(=)\?(?=&|$)|\?\?/;
    x.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = hn.pop() || x.expando + "_" + Yt++;
            return this[e] = !0, e;
        }
    }), x.ajaxPrefilter("json jsonp", function(t, n, r) {
        var i, o, s, a = t.jsonp !== !1 && (dn.test(t.url) ? "url" : "string" == typeof t.data && !(t.contentType || "").indexOf("application/x-www-form-urlencoded") && dn.test(t.data) && "data");
        return a || "jsonp" === t.dataTypes[0] ? (i = t.jsonpCallback = x.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, a ? t[a] = t[a].replace(dn, "$1" + i) : t.jsonp !== !1 && (t.url += (Vt.test(t.url) ? "&" : "?") + t.jsonp + "=" + i), t.converters["script json"] = function() {
            return s || x.error(i + " was not called"), s[0];
        }, t.dataTypes[0] = "json", o = e[i], e[i] = function() {
            s = arguments;
        }, r.always(function() {
            e[i] = o, t[i] && (t.jsonpCallback = n.jsonpCallback, hn.push(i)), s && x.isFunction(o) && o(s[0]), s = o = undefined;
        }), "script") : undefined;
    }), x.ajaxSettings.xhr = function() {
        try {
            return new XMLHttpRequest;
        } catch (e) {}
    };
    var gn = x.ajaxSettings.xhr(),
        mn = {
            0: 200,
            1223: 204
        },
        yn = 0,
        vn = {};
    e.ActiveXObject && x(e).on("unload", function() {
        for (var e in vn) {
            vn[e]();
        }
        vn = undefined;
    }), x.support.cors = !!gn && "withCredentials" in gn, x.support.ajax = gn = !!gn, x.ajaxTransport(function(e) {
        var t;
        return x.support.cors || gn && !e.crossDomain ? {
            send: function(n, r) {
                var i, o, s = e.xhr();
                if (s.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields) {
                    for (i in e.xhrFields) {
                        s[i] = e.xhrFields[i];
                    }
                }
                e.mimeType && s.overrideMimeType && s.overrideMimeType(e.mimeType), e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
                for (i in n) {
                    s.setRequestHeader(i, n[i]);
                }
                t = function(e) {
                    return function() {
                        t && (delete vn[o], t = s.onload = s.onerror = null, "abort" === e ? s.abort() : "error" === e ? r(s.status || 404, s.statusText) : r(mn[s.status] || s.status, s.statusText, "string" == typeof s.responseText ? {
                            text: s.responseText
                        } : undefined, s.getAllResponseHeaders()));
                    };
                }, s.onload = t(), s.onerror = t("error"), t = vn[o = yn++] = t("abort"), s.send(e.hasContent && e.data || null);
            },
            abort: function() {
                t && t();
            }
        } : undefined;
    });
    var xn, bn, wn = /^(?:toggle|show|hide)$/,
        Tn = RegExp("^(?:([+-])=|)(" + b + ")([a-z%]*)$", "i"),
        Cn = /queueHooks$/,
        kn = [An],
        Nn = {
            "*": [function(e, t) {
                var n = this.createTween(e, t),
                    r = n.cur(),
                    i = Tn.exec(t),
                    o = i && i[3] || (x.cssNumber[e] ? "" : "px"),
                    s = (x.cssNumber[e] || "px" !== o && +r) && Tn.exec(x.css(n.elem, e)),
                    a = 1,
                    u = 20;
                if (s && s[3] !== o) {
                    o = o || s[3], i = i || [], s = +r || 1;
                    do {
                        a = a || ".5", s /= a, x.style(n.elem, e, s + o);
                    } while (a !== (a = n.cur() / r) && 1 !== a && --u);
                }
                return i && (s = n.start = +s || +r || 0, n.unit = o, n.end = i[1] ? s + (i[1] + 1) * i[2] : +i[2]), n;
            }]
        };

    function En() {
        return setTimeout(function() {
            xn = undefined;
        }), xn = x.now();
    }

    function Sn(e, t, n) {
        var r, i = (Nn[t] || []).concat(Nn["*"]),
            o = 0,
            s = i.length;
        for (; s > o; o++) {
            if (r = i[o].call(n, t, e)) {
                return r;
            }
        }
    }

    function jn(e, t, n) {
        var r, i, o = 0,
            s = kn.length,
            a = x.Deferred().always(function() {
                delete u.elem;
            }),
            u = function() {
                if (i) {
                    return !1;
                }
                var t = xn || En(),
                    n = Math.max(0, l.startTime + l.duration - t),
                    r = n / l.duration || 0,
                    o = 1 - r,
                    s = 0,
                    u = l.tweens.length;
                for (; u > s; s++) {
                    l.tweens[s].run(o);
                }
                return a.notifyWith(e, [l, o, n]), 1 > o && u ? n : (a.resolveWith(e, [l]), !1);
            },
            l = a.promise({
                elem: e,
                props: x.extend({}, t),
                opts: x.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: xn || En(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var r = x.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                    return l.tweens.push(r), r;
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? l.tweens.length : 0;
                    if (i) {
                        return this;
                    }
                    for (i = !0; r > n; n++) {
                        l.tweens[n].run(1);
                    }
                    return t ? a.resolveWith(e, [l, t]) : a.rejectWith(e, [l, t]), this;
                }
            }),
            c = l.props;
        for (Dn(c, l.opts.specialEasing); s > o; o++) {
            if (r = kn[o].call(l, e, c, l.opts)) {
                return r;
            }
        }
        return x.map(c, Sn, l), x.isFunction(l.opts.start) && l.opts.start.call(e, l), x.fx.timer(x.extend(u, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always);
    }

    function Dn(e, t) {
        var n, r, i, o, s;
        for (n in e) {
            if (r = x.camelCase(n), i = t[r], o = e[n], x.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), s = x.cssHooks[r], s && "expand" in s) {
                o = s.expand(o), delete e[r];
                for (n in o) {
                    n in e || (e[n] = o[n], t[n] = i);
                }
            } else {
                t[r] = i;
            }
        }
    }
    x.Animation = x.extend(jn, {
        tweener: function(e, t) {
            x.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            var n, r = 0,
                i = e.length;
            for (; i > r; r++) {
                n = e[r], Nn[n] = Nn[n] || [], Nn[n].unshift(t);
            }
        },
        prefilter: function(e, t) {
            t ? kn.unshift(e) : kn.push(e);
        }
    });

    function An(e, t, n) {
        var r, i, o, s, a, u, l = this,
            c = {},
            p = e.style,
            f = e.nodeType && Lt(e),
            h = q.get(e, "fxshow");
        n.queue || (a = x._queueHooks(e, "fx"), null == a.unqueued && (a.unqueued = 0, u = a.empty.fire, a.empty.fire = function() {
            a.unqueued || u();
        }), a.unqueued++, l.always(function() {
            l.always(function() {
                a.unqueued--, x.queue(e, "fx").length || a.empty.fire();
            });
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], "inline" === x.css(e, "display") && "none" === x.css(e, "float") && (p.display = "inline-block")), n.overflow && (p.overflow = "hidden", l.always(function() {
            p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2];
        }));
        for (r in t) {
            if (i = t[r], wn.exec(i)) {
                if (delete t[r], o = o || "toggle" === i, i === (f ? "hide" : "show")) {
                    if ("show" !== i || !h || h[r] === undefined) {
                        continue;
                    }
                    f = !0;
                }
                c[r] = h && h[r] || x.style(e, r);
            }
        }
        if (!x.isEmptyObject(c)) {
            h ? "hidden" in h && (f = h.hidden) : h = q.access(e, "fxshow", {}), o && (h.hidden = !f), f ? x(e).show() : l.done(function() {
                x(e).hide();
            }), l.done(function() {
                var t;
                q.remove(e, "fxshow");
                for (t in c) {
                    x.style(e, t, c[t]);
                }
            });
            for (r in c) {
                s = Sn(f ? h[r] : 0, r, l), r in h || (h[r] = s.start, f && (s.end = s.start, s.start = "width" === r || "height" === r ? 1 : 0));
            }
        }
    }

    function Ln(e, t, n, r, i) {
        return new Ln.prototype.init(e, t, n, r, i);
    }
    x.Tween = Ln, Ln.prototype = {
        constructor: Ln,
        init: function(e, t, n, r, i, o) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (x.cssNumber[n] ? "" : "px");
        },
        cur: function() {
            var e = Ln.propHooks[this.prop];
            return e && e.get ? e.get(this) : Ln.propHooks._default.get(this);
        },
        run: function(e) {
            var t, n = Ln.propHooks[this.prop];
            return this.pos = t = this.options.duration ? x.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Ln.propHooks._default.set(this), this;
        }
    }, Ln.prototype.init.prototype = Ln.prototype, Ln.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = x.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop];
            },
            set: function(e) {
                x.fx.step[e.prop] ? x.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[x.cssProps[e.prop]] || x.cssHooks[e.prop]) ? x.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now;
            }
        }
    }, Ln.propHooks.scrollTop = Ln.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
        }
    }, x.each(["toggle", "show", "hide"], function(e, t) {
        var n = x.fn[t];
        x.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(qn(t, !0), e, r, i);
        };
    }), x.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(Lt).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r);
        },
        animate: function(e, t, n, r) {
            var i = x.isEmptyObject(e),
                o = x.speed(t, n, r),
                s = function() {
                    var t = jn(this, x.extend({}, e), o);
                    (i || q.get(this, "finish")) && t.stop(!0);
                };
            return s.finish = s, i || o.queue === !1 ? this.each(s) : this.queue(o.queue, s);
        },
        stop: function(e, t, n) {
            var r = function(e) {
                var t = e.stop;
                delete e.stop, t(n);
            };
            return "string" != typeof e && (n = t, t = e, e = undefined), t && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    i = null != e && e + "queueHooks",
                    o = x.timers,
                    s = q.get(this);
                if (i) {
                    s[i] && s[i].stop && r(s[i]);
                } else {
                    for (i in s) {
                        s[i] && s[i].stop && Cn.test(i) && r(s[i]);
                    }
                }
                for (i = o.length; i--;) {
                    o[i].elem !== this || null != e && o[i].queue !== e || (o[i].anim.stop(n), t = !1, o.splice(i, 1));
                }(t || !n) && x.dequeue(this, e);
            });
        },
        finish: function(e) {
            return e !== !1 && (e = e || "fx"), this.each(function() {
                var t, n = q.get(this),
                    r = n[e + "queue"],
                    i = n[e + "queueHooks"],
                    o = x.timers,
                    s = r ? r.length : 0;
                for (n.finish = !0, x.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = o.length; t--;) {
                    o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
                }
                for (t = 0; s > t; t++) {
                    r[t] && r[t].finish && r[t].finish.call(this);
                }
                delete n.finish;
            });
        }
    });

    function qn(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        for (t = t ? 1 : 0; 4 > i; i += 2 - t) {
            n = jt[i], r["margin" + n] = r["padding" + n] = e;
        }
        return t && (r.opacity = r.width = e), r;
    }
    x.each({
        slideDown: qn("show"),
        slideUp: qn("hide"),
        slideToggle: qn("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        x.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r);
        };
    }), x.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? x.extend({}, e) : {
            complete: n || !n && t || x.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !x.isFunction(t) && t
        };
        return r.duration = x.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in x.fx.speeds ? x.fx.speeds[r.duration] : x.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
            x.isFunction(r.old) && r.old.call(this), r.queue && x.dequeue(this, r.queue);
        }, r;
    }, x.easing = {
        linear: function(e) {
            return e;
        },
        swing: function(e) {
            return 0.5 - Math.cos(e * Math.PI) / 2;
        }
    }, x.timers = [], x.fx = Ln.prototype.init, x.fx.tick = function() {
        var e, t = x.timers,
            n = 0;
        for (xn = x.now(); t.length > n; n++) {
            e = t[n], e() || t[n] !== e || t.splice(n--, 1);
        }
        t.length || x.fx.stop(), xn = undefined;
    }, x.fx.timer = function(e) {
        e() && x.timers.push(e) && x.fx.start();
    }, x.fx.interval = 13, x.fx.start = function() {
        bn || (bn = setInterval(x.fx.tick, x.fx.interval));
    }, x.fx.stop = function() {
        clearInterval(bn), bn = null;
    }, x.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, x.fx.step = {}, x.expr && x.expr.filters && (x.expr.filters.animated = function(e) {
        return x.grep(x.timers, function(t) {
            return e === t.elem;
        }).length;
    }), x.fn.offset = function(e) {
        if (arguments.length) {
            return e === undefined ? this : this.each(function(t) {
                x.offset.setOffset(this, e, t);
            });
        }
        var t, n, i = this[0],
            o = {
                top: 0,
                left: 0
            },
            s = i && i.ownerDocument;
        if (s) {
            return t = s.documentElement, x.contains(t, i) ? (typeof i.getBoundingClientRect !== r && (o = i.getBoundingClientRect()), n = Hn(s), {
                top: o.top + n.pageYOffset - t.clientTop,
                left: o.left + n.pageXOffset - t.clientLeft
            }) : o;
        }
    }, x.offset = {
        setOffset: function(e, t, n) {
            var r, i, o, s, a, u, l, c = x.css(e, "position"),
                p = x(e),
                f = {};
            "static" === c && (e.style.position = "relative"), a = p.offset(), o = x.css(e, "top"), u = x.css(e, "left"), l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1, l ? (r = p.position(), s = r.top, i = r.left) : (s = parseFloat(o) || 0, i = parseFloat(u) || 0), x.isFunction(t) && (t = t.call(e, n, a)), null != t.top && (f.top = t.top - a.top + s), null != t.left && (f.left = t.left - a.left + i), "using" in t ? t.using.call(e, f) : p.css(f);
        }
    }, x.fn.extend({
        position: function() {
            if (this[0]) {
                var e, t, n = this[0],
                    r = {
                        top: 0,
                        left: 0
                    };
                return "fixed" === x.css(n, "position") ? t = n.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), x.nodeName(e[0], "html") || (r = e.offset()), r.top += x.css(e[0], "borderTopWidth", !0), r.left += x.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - r.top - x.css(n, "marginTop", !0),
                    left: t.left - r.left - x.css(n, "marginLeft", !0)
                };
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || s;
                while (e && !x.nodeName(e, "html") && "static" === x.css(e, "position")) {
                    e = e.offsetParent;
                }
                return e || s;
            });
        }
    }), x.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(t, n) {
        var r = "pageYOffset" === n;
        x.fn[t] = function(i) {
            return x.access(this, function(t, i, o) {
                var s = Hn(t);
                return o === undefined ? s ? s[n] : t[i] : (s ? s.scrollTo(r ? e.pageXOffset : o, r ? o : e.pageYOffset) : t[i] = o, undefined);
            }, t, i, arguments.length, null);
        };
    });

    function Hn(e) {
        return x.isWindow(e) ? e : 9 === e.nodeType && e.defaultView;
    }
    x.each({
        Height: "height",
        Width: "width"
    }, function(e, t) {
        x.each({
            padding: "inner" + e,
            content: t,
            "": "outer" + e
        }, function(n, r) {
            x.fn[r] = function(r, i) {
                var o = arguments.length && (n || "boolean" != typeof r),
                    s = n || (r === !0 || i === !0 ? "margin" : "border");
                return x.access(this, function(t, n, r) {
                    var i;
                    return x.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (i = t.documentElement, Math.max(t.body["scroll" + e], i["scroll" + e], t.body["offset" + e], i["offset" + e], i["client" + e])) : r === undefined ? x.css(t, n, s) : x.style(t, n, r, s);
                }, t, o ? r : undefined, o, null);
            };
        });
    }), x.fn.size = function() {
        return this.length;
    }, x.fn.andSelf = x.fn.addBack, "object" == typeof module && module && "object" == typeof module.exports ? module.exports = x : "function" == typeof define && define.amd && define("jquery", [], function() {
        return x;
    }), "object" == typeof e && "object" == typeof e.document && (e.jQuery = e.$ = x);
})(window);
(function(b) {
    b.fn.accordion = function(c) {
        return this.each(function() {
            b.data(this, "accordion", {});
            b.data(this, "accordion", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Accordion = a;
    b.Accordion.NAME = "accordion";
    b.Accordion.VERSION = "1.0";
    b.Accordion.opts = {
        scroll: false,
        collapse: true,
        toggle: true,
        titleClass: ".accordion-title",
        panelClass: ".accordion-panel"
    };
    a.fn = b.Accordion.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
            if (this.opts.collapse) {
                this.closeAll();
            } else {
                this.openAll();
            }
            this.loadFromHash();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Accordion.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Accordion.NAME || c == b.Accordion.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        getTitles: function() {
            this.titles = this.$element.find(this.opts.titleClass);
            this.titles.append(b("<span />").addClass("accordion-toggle"));
            this.titles.each(function() {
                var c = b(this);
                c.attr("rel", c.attr("href"));
            });
        },
        getPanels: function() {
            this.panels = this.$element.find(this.opts.panelClass);
        },
        build: function() {
            this.getTitles();
            this.getPanels();
            this.titles.on("click", b.proxy(this.toggle, this));
        },
        loadFromHash: function() {
            if (top.location.hash === "") {
                return;
            }
            if (!this.opts.scroll) {
                return;
            }
            if (this.$element.find("[rel=" + top.location.hash + "]").size() === 0) {
                return;
            }
            this.open(top.location.hash);
            this.scrollTo(top.location.hash);
        },
        toggle: function(g) {
            g.preventDefault();
            g.stopPropagation();
            var f = b(g.target).attr("rel");
            if (this.opts.toggle) {
                var c = b(g.target);
                var d = c.closest(this.opts.titleClass);
                var h = d.hasClass("accordion-title-opened");
                this.closeAll();
                if (!h) {
                    this.open(f);
                }
            } else {
                if (b("[rel=" + f + "]").hasClass("accordion-title-opened")) {
                    this.close(f);
                } else {
                    this.open(f);
                }
            }
        },
        open: function(c) {
            this.$title = b("[rel=" + c + "]");
            this.$panel = b(c);
            top.location.hash = c;
            this.setStatus("open");
            this.$panel.show();
            this.setCallback("opened", this.$title, this.$panel);
        },
        close: function(c) {
            this.$title = b("[rel=" + c + "]");
            this.$panel = b(c);
            this.setStatus("close");
            this.$panel.hide();
            this.setCallback("closed", this.$title, this.$panel);
        },
        setStatus: function(d) {
            var c = {
                toggle: this.$title.find("span.accordion-toggle"),
                title: this.$title,
                panel: this.$panel
            };
            b.each(c, function(e, f) {
                if (d == "close") {
                    f.removeClass("accordion-" + e + "-opened").addClass("accordion-" + e + "-closed");
                } else {
                    f.removeClass("accordion-" + e + "-closed").addClass("accordion-" + e + "-opened");
                }
            });
        },
        openAll: function() {
            this.titles.each(b.proxy(function(c, d) {
                this.open(b(d).attr("rel"));
            }, this));
        },
        closeAll: function() {
            this.titles.each(b.proxy(function(c, d) {
                this.close(b(d).attr("rel"));
            }, this));
        },
        scrollTo: function(c) {
            b("html, body").animate({
                scrollTop: b(c).offset().top - 50
            }, 500);
        }
    };
    b(window).on("load.tools.accordion", function() {
        b('[data-tools="accordion"]').accordion();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.autocomplete = function(c) {
        return this.each(function() {
            b.data(this, "autocomplete", {});
            b.data(this, "autocomplete", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Autocomplete = a;
    b.Autocomplete.NAME = "autocomplete";
    b.Autocomplete.VERSION = "1.0";
    b.Autocomplete.opts = {
        url: false,
        min: 2,
        set: "value"
    };
    a.fn = b.Autocomplete.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Autocomplete.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Autocomplete.NAME || c == b.Autocomplete.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            this.result = b('<ul class="autocomplete">').hide();
            this.pos = this.$element.offset();
            this.elementHeight = this.$element.innerHeight();
            b("body").append(this.result);
            this.placement = ((b(document).height() - (this.pos.top + this.elementHeight)) < this.result.height()) ? "top" : "bottom";
            b(document).on("click", b.proxy(this.hide, this));
            this.$element.on("keyup", b.proxy(function(d) {
                var c = this.$element.val();
                if (c.length >= this.opts.min) {
                    this.$element.addClass("autocomplete-in");
                    this.result.addClass("autocomplete-open");
                    this.listen(d);
                } else {
                    this.hide();
                }
            }, this));
        },
        lookup: function() {
            b.ajax({
                url: this.opts.url,
                type: "post",
                data: this.$element.attr("name") + "=" + this.$element.val(),
                success: b.proxy(function(c) {
                    var d = b.parseJSON(c);
                    this.result.html("");
                    b.each(d, b.proxy(function(h, j) {
                        var f = b("<li>");
                        var g = b('<a href="#" rel="' + j.id + '">').html(j.value).on("click", b.proxy(this.set, this));
                        f.append(g);
                        this.result.append(f);
                    }, this));
                    var e = (this.placement === "top") ? (this.pos.top - this.result.height() - this.elementHeight) : (this.pos.top + this.elementHeight);
                    this.result.css({
                        top: e + "px",
                        left: this.pos.left + "px"
                    });
                    this.result.show();
                    this.active = false;
                }, this)
            });
        },
        listen: function(c) {
            if (!this.$element.hasClass("autocomplete-in")) {
                return;
            }
            c.stopPropagation();
            c.preventDefault();
            switch (c.keyCode) {
                case 40:
                    this.select("next");
                    break;
                case 38:
                    this.select("prev");
                    break;
                case 13:
                    this.set();
                    break;
                case 27:
                    this.hide();
                    break;
                default:
                    this.lookup();
                    break;
            }
        },
        select: function(f) {
            var g = this.result.find("a");
            var e = g.size();
            var c = this.result.find("a.active");
            c.removeClass("active");
            var d = (f === "next") ? c.parent().next().children("a") : c.parent().prev().children("a");
            if (d.size() === 0) {
                d = (f === "next") ? g.eq(0) : g.eq(e - 1);
            }
            d.addClass("active");
            this.active = d;
        },
        set: function(f) {
            var c = b(this.active);
            if (f) {
                f.preventDefault();
                c = b(f.target);
            }
            var g = c.attr("rel");
            var d = c.html();
            if (this.opts.set == "value") {
                this.$element.val(d);
            } else {
                this.$element.val(g);
            }
            this.setCallback("set", g, d);
            this.hide();
        },
        hide: function(c) {
            if (c && (b(c.target).hasClass("autocomplete-in") || b(c.target).hasClass("autocomplete-open") || b(c.target).parents().hasClass("autocomplete-open"))) {
                return;
            }
            this.$element.removeClass("autocomplete-in");
            this.result.removeClass("autocomplete-open");
            this.result.hide();
        }
    };
    b(window).on("load.tools.autocomplete", function() {
        b('[data-tools="autocomplete"]').autocomplete();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.buttons = function(c) {
        return this.each(function() {
            b.data(this, "buttons", {});
            b.data(this, "buttons", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Buttons = a;
    b.Buttons.NAME = "buttons";
    b.Buttons.VERSION = "1.0";
    b.Buttons.opts = {
        className: "btn",
        activeClassName: "btn-active",
        target: false,
        type: "switch"
    };
    a.fn = b.Buttons.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.buttons = this.getButtons();
            this.value = this.getValue();
            this.buttons.each(b.proxy(function(f, g) {
                var e = b(g);
                this.setDefault(e);
                e.click(b.proxy(function(h) {
                    h.preventDefault();
                    if (this.opts.type === "segmented") {
                        this.setSegmented(e);
                    } else {
                        if (this.opts.type === "toggle") {
                            this.setToggle(e);
                        } else {
                            this.setBasic(e);
                        }
                    }
                }, this));
            }, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Buttons.opts), this.$element.data(), c);
        },
        getButtons: function() {
            return (this.opts.type === "toggle") ? this.$element : this.$element.find("." + this.opts.className);
        },
        getValue: function() {
            return (this.opts.type === "segmented") ? b(this.opts.target).val().split(",") : b(this.opts.target).val();
        },
        setDefault: function(c) {
            if (this.opts.type === "segmented" && b.inArray(c.val(), this.value) !== -1) {
                this.setActive(c);
            } else {
                if ((this.opts.type === "toggle" && this.value === 1) || this.value === c.val()) {
                    this.setActive(c);
                }
            }
        },
        setBasic: function(c) {
            this.setInActive(this.buttons);
            this.setActive(c);
            b(this.opts.target).val(c.val());
        },
        setSegmented: function(d) {
            var c = b(this.opts.target);
            this.value = c.val().split(",");
            if (!d.hasClass(this.opts.activeClassName)) {
                this.setActive(d);
                this.value.push(d.val());
            } else {
                this.setInActive(d);
                this.value.splice(this.value.indexOf(d.val()), 1);
            }
            c.val(this.value.join(",").replace(/^,/, ""));
        },
        setToggle: function(c) {
            if (c.hasClass(this.opts.activeClassName)) {
                this.setInActive(c);
                b(this.opts.target).val(0);
            } else {
                this.setActive(c);
                b(this.opts.target).val(1);
            }
        },
        setActive: function(c) {
            c.addClass(this.opts.activeClassName);
        },
        setInActive: function(c) {
            c.removeClass(this.opts.activeClassName);
        }
    };
    b(window).on("load.tools.buttons", function() {
        b('[data-tools="buttons"]').buttons();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.checkAll = function(c) {
        return this.each(function() {
            b.data(this, "checkAll", {});
            b.data(this, "checkAll", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.CheckAll = a;
    b.CheckAll.opts = {
        classname: false,
        parent: false,
        highlight: "highlight",
        target: false
    };
    a.fn = b.CheckAll.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.$elements = b("." + this.opts.classname);
            this.$target = b(this.opts.target);
            this.$element.on("click", b.proxy(this.load, this));
            this.setter = (this.opts.target) ? this.$target.val().split(",") : [];
            this.$elements.each(b.proxy(this.setOnStart, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.CheckAll.opts), this.$element.data(), c);
        },
        load: function() {
            if (this.$element.prop("checked")) {
                this.$elements.prop("checked", true);
                if (this.opts.parent || this.opts.target) {
                    this.$elements.each(b.proxy(function(d, e) {
                        var c = b(e);
                        this.setHighlight(c);
                        this.setValue(c.val());
                    }, this));
                }
            } else {
                this.$elements.prop("checked", false);
                if (this.opts.parent) {
                    this.$elements.each(b.proxy(this.removeHighlight, this));
                }
                if (this.opts.target) {
                    this.$target.val("");
                }
            }
        },
        setOnStart: function(d, e) {
            var c = b(e);
            if (this.$element.prop("checked") || (this.setter && (b.inArray(c.val(), this.setter) !== -1))) {
                c.prop("checked", true);
                this.setHighlight(c);
            }
            c.on("click", b.proxy(function() {
                var f = this.$elements.filter(":checked").size();
                if (c.prop("checked")) {
                    this.setValue(c.val());
                    this.setHighlight(c);
                } else {
                    this.removeValue(c.val());
                    this.removeHighlight(c);
                }
                var g = (f !== this.$elements.size()) ? false : true;
                this.$element.prop("checked", g);
            }, this));
        },
        setHighlight: function(c) {
            if (!this.opts.parent) {
                return;
            }
            c.closest(this.opts.parent).addClass(this.opts.highlight);
        },
        removeHighlight: function(d, c) {
            if (!this.opts.parent) {
                return;
            }
            b(c).closest(this.opts.parent).removeClass(this.opts.highlight);
        },
        setValue: function(d) {
            if (!this.opts.target) {
                return;
            }
            var e = this.$target.val();
            var c = e.split(",");
            c.push(d);
            if (e === "") {
                c = [d];
            }
            this.$target.val(c.join(","));
        },
        removeValue: function(e) {
            if (!this.opts.target) {
                return;
            }
            var c = this.$target.val().split(",");
            var d = c.indexOf(e);
            c.splice(d, 1);
            this.$target.val(c.join(","));
        }
    };
    b(window).on("load.tools.buttons", function() {
        b('[data-tools="check-all"]').checkAll();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.dropdown = function(c) {
        return this.each(function() {
            b.data(this, "dropdown", {});
            b.data(this, "dropdown", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Dropdown = a;
    b.Dropdown.NAME = "dropdown";
    b.Dropdown.VERSION = "1.0";
    b.Dropdown.opts = {
        target: false,
        targetClose: false,
        height: false,
        width: false
    };
    a.fn = b.Dropdown.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Dropdown.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Dropdown.NAME || c == b.Dropdown.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            this.$dropdown = b(this.opts.target);
            this.$dropdown.hide();
            this.$caret = b('<b class="caret"></b>');
            this.$element.append(this.$caret);
            this.setCaretUp();
            this.preventBodyScroll();
            this.$element.click(b.proxy(this.toggle, this));
        },
        setCaretUp: function() {
            var c = this.$element.offset().top + this.$element.innerHeight() + this.$dropdown.innerHeight();
            if (b(document).height() > c) {
                return;
            }
            this.$caret.addClass("caret-up");
        },
        toggle: function(c) {
            c.preventDefault();
            if (this.$element.hasClass("dropdown-in")) {
                this.hide();
            } else {
                this.show();
            }
        },
        getPlacement: function(c) {
            return (b(document).height() < c) ? "top" : "bottom";
        },
        getPosition: function() {
            return (this.$element.closest(".navigation-fixed").size() !== 0) ? "fixed" : "absolute";
        },
        setPosition: function() {
            var j = this.$element.position();
            var h = this.$element.innerHeight();
            var k = this.$element.innerWidth();
            var l = this.$dropdown.innerHeight();
            var d = this.$dropdown.innerWidth();
            var g = this.getPosition();
            var f = this.getPlacement(j.top + l + h);
            var c = 0;
            if (b(window).width() < (j.left + d)) {
                c = (d - k);
            }
            var i;
            var e = j.left - c;
            if (f == "bottom") {
                this.$caret.removeClass("caret-up");
                i = (g == "fixed") ? h : j.top + h;
            } else {
                this.$caret.addClass("caret-up");
                i = (g == "fixed") ? l : j.top - l;
            }
            this.$dropdown.css({
                position: g,
                top: i + "px",
                left: e + "px"
            });
        },
        show: function() {
            b(".dropdown-in").removeClass("dropdown-in");
            b(".dropdown").removeClass("dropdown-open").hide();
            if (this.opts.height) {
                this.$dropdown.css("min-height", this.opts.height + "px");
            }
            if (this.opts.width) {
                this.$dropdown.width(this.opts.width);
            }
            this.setPosition();
            this.$dropdown.addClass("dropdown-open").show();
            this.$element.addClass("dropdown-in");
            b(document).on("scroll.tools.dropdown", b.proxy(this.setPosition, this));
            b(window).on("resize.tools.dropdown", b.proxy(this.setPosition, this));
            b(document).on("click.tools.dropdown touchstart.tools.dropdown", b.proxy(this.hide, this));
            if (this.opts.targetClose) {
                b(this.opts.targetClose).on("click.tools.dropdown", b.proxy(function(c) {
                    c.preventDefault();
                    this.hide(false);
                }, this));
            }
            b(document).on("keydown.tools.dropdown", b.proxy(function(c) {
                if (c.which === 27) {
                    this.hide();
                }
            }, this));
            this.setCallback("opened", this.$dropdown, this.$element);
        },
        preventBodyScroll: function() {
            this.$dropdown.on("mouseover", function() {
                b("html").css("overflow", "hidden");
            });
            this.$dropdown.on("mouseout", function() {
                b("html").css("overflow", "");
            });
        },
        hide: function(d) {
            if (d) {
                d = d.originalEvent || d;
                var c = b(d.target);
                if (c.hasClass("caret") || c.hasClass("dropdown-in") || c.closest(".dropdown-open").size() !== 0) {
                    return;
                }
            }
            this.$dropdown.removeClass("dropdown-open").hide();
            this.$element.removeClass("dropdown-in");
            b(document).off(".tools.dropdown");
            b(window).off(".tools.dropdown");
            this.setCallback("closed", this.$dropdown, this.$element);
        }
    };
    b(window).on("load.tools.dropdown", function() {
        b('[data-tools="dropdown"]').dropdown();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.filterbox = function(c) {
        return this.each(function() {
            b.data(this, "filterbox", {});
            b.data(this, "filterbox", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Filterbox = a;
    b.Filterbox.NAME = "filterbox";
    b.Filterbox.VERSION = "1.0";
    b.Filterbox.opts = {
        placeholder: false
    };
    a.fn = b.Filterbox.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Filterbox.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Filterbox.NAME || c == b.Filterbox.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            this.$sourceBox = b('<div class="filterbox" />');
            this.$sourceSelect = b('<span class="filterbox-toggle" />');
            this.$sourceLayer = b('<ul class="filterbox-list hide" />');
            this.$source = b('<input type="text" id="' + this.$element.attr("id") + '-input" class="' + this.$element.attr("class") + '" />');
            this.$sourceBox.append(this.$source);
            this.$sourceBox.append(this.$sourceSelect);
            this.$sourceBox.append(this.$sourceLayer);
            this.setPlaceholder();
            this.$element.hide().after(this.$sourceBox);
            this.$element.find("option").each(b.proxy(this.buildListItemsFromOptions, this));
            this.$source.on("keyup", b.proxy(this.clearSelected, this));
            this.$sourceSelect.on("click", b.proxy(this.load, this));
            this.preventBodyScroll();
        },
        load: function(f) {
            f.preventDefault();
            if (this.$sourceLayer.hasClass("open")) {
                this.close();
                return;
            }
            var d = this.$element.val();
            this.$sourceLayer.addClass("open").show();
            var c = this.$sourceLayer.find("li").removeClass("active");
            this.setSelectedItem(c, d);
            b(document).on("click.tools.filterbox", b.proxy(this.close, this));
            b(document).on("keydown.tools.filterbox", b.proxy(function(l) {
                var h = l.which;
                var g;
                var k;
                if (h === 38) {
                    l.preventDefault();
                    if (c.hasClass("active")) {
                        k = c.filter("li.active");
                        k.removeClass("active");
                        var j = k.prev();
                        g = (j.size() !== 0) ? g = j : c.last();
                    } else {
                        g = c.last();
                    }
                    g.addClass("active");
                    this.setScrollTop(g);
                } else {
                    if (h === 40) {
                        l.preventDefault();
                        if (c.hasClass("active")) {
                            k = c.filter("li.active");
                            k.removeClass("active");
                            var i = k.next();
                            g = (i.size() !== 0) ? i : c.first();
                        } else {
                            g = c.first();
                        }
                        g.addClass("active");
                        this.setScrollTop(g);
                    } else {
                        if (h === 13) {
                            if (!c.hasClass("active")) {
                                return;
                            }
                            k = c.filter("li.active");
                            this.onItemClick(l, k);
                        } else {
                            if (h === 27) {
                                this.close();
                            }
                        }
                    }
                }
            }, this));
        },
        clearSelected: function() {
            if (this.$source.val().length === 0) {
                this.$element.val(0);
            }
        },
        setSelectedItem: function(c, e) {
            var f = c.filter("[rel=" + e + "]");
            if (f.size() === 0) {
                f = false;
                var d = this.$source.val();
                b.each(c, function(h, j) {
                    var g = b(j);
                    if (g.text() == d) {
                        f = g;
                    }
                });
                if (f === false) {
                    return;
                }
            }
            f.addClass("active");
            this.setScrollTop(f);
        },
        setScrollTop: function(c) {
            this.$sourceLayer.scrollTop(this.$sourceLayer.scrollTop() + c.position().top - 40);
        },
        buildListItemsFromOptions: function(d, e) {
            var c = b(e);
            var g = c.val();
            if (g === 0) {
                return;
            }
            var f = b("<li />");
            f.attr("rel", g).text(c.html());
            f.on("click", b.proxy(this.onItemClick, this));
            this.$sourceLayer.append(f);
        },
        onItemClick: function(g, f) {
            g.preventDefault();
            var d = b(f || g.target);
            var c = d.attr("rel");
            var h = d.text();
            this.$source.val(h);
            this.$element.val(c);
            this.close();
            this.setCallback("select", {
                id: c,
                value: h
            });
        },
        preventBodyScroll: function() {
            this.$sourceLayer.on("mouseover", function() {
                b("html").css("overflow", "hidden");
            });
            this.$sourceLayer.on("mouseout", function() {
                b("html").css("overflow", "");
            });
        },
        setPlaceholder: function() {
            if (!this.opts.placeholder) {
                return;
            }
            this.$source.attr("placeholder", this.opts.placeholder);
        },
        close: function(c) {
            if (c && (b(c.target).hasClass("filterbox-toggle") || b(c.target).closest("div.filterbox").size() == 1)) {
                return;
            }
            this.$sourceLayer.removeClass("open").hide();
            b(document).off(".tools.filterbox");
        }
    };
    b(window).on("load.tools.filterbox", function() {
        b('[data-tools="filterbox"]').filterbox();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.infinityScroll = function(c) {
        return this.each(function() {
            b.data(this, "infinity-scroll", {});
            b.data(this, "infinity-scroll", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.InfinityScroll = a;
    b.InfinityScroll.NAME = "infinity-scroll";
    b.InfinityScroll.VERSION = "1.0";
    b.InfinityScroll.opts = {
        url: false,
        offset: 0,
        limit: 20,
        tolerance: 50,
        pagination: false
    };
    a.fn = b.InfinityScroll.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.hidePagination();
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.InfinityScroll.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.InfinityScroll.NAME || c == b.InfinityScroll.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            b(window).on("DOMContentLoaded.tools.infinite-scroll load.tools.infinite-scroll resize.tools.infinite-scroll scroll.tools.infinite-scroll", b.proxy(function() {
                var c = this.$element.children().last();
                if (this.isElementInViewport(c[0])) {
                    this.getData();
                }
            }, this));
        },
        getData: function() {
            b.ajax({
                url: this.opts.url,
                type: "post",
                data: "limit=" + this.opts.limit + "&offset=" + this.opts.offset,
                success: b.proxy(function(c) {
                    if (c === "") {
                        b(window).off(".tools.infinite-scroll");
                        return;
                    }
                    this.opts.offset = this.opts.offset + this.opts.limit;
                    this.$element.append(c);
                    this.setCallback("loaded", c);
                }, this)
            });
        },
        hidePagination: function() {
            if (!this.opts.pagination) {
                return;
            }
            b(this.opts.pagination).hide();
        },
        isElementInViewport: function(c) {
            var d = c.getBoundingClientRect();
            return (d.top >= 0 && d.left >= 0 && d.bottom <= b(window).height() + this.opts.tolerance && d.right <= b(window).width());
        }
    };
    b(window).on("load.tools.infinity-scroll", function() {
        b('[data-tools="infinity-scroll"]').infinityScroll();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.livesearch = function(c) {
        return this.each(function() {
            b.data(this, "livesearch", {});
            b.data(this, "livesearch", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Livesearch = a;
    b.Livesearch.NAME = "livesearch";
    b.Livesearch.VERSION = "1.0";
    b.Livesearch.opts = {
        url: false,
        target: false,
        min: 2,
        params: false,
        appendForms: false
    };
    a.fn = b.Livesearch.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Livesearch.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Livesearch.NAME || c == b.Livesearch.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            this.$box = b('<span class="livesearch-box" />');
            this.$element.after(this.$box);
            this.$box.append(this.$element);
            this.$element.off("keyup.tools.livesearch");
            this.$element.on("keyup.tools.livesearch", b.proxy(this.load, this));
            this.$icon = b('<span class="livesearch-icon" />');
            this.$box.append(this.$icon);
            this.$close = b('<span class="close" />').hide();
            this.$box.append(this.$close);
            this.$close.off("click.tools.livesearch");
            this.$close.on("click.tools.livesearch", b.proxy(function() {
                this.search();
                this.$element.val("").focus();
                this.$close.hide();
            }, this));
        },
        toggleClose: function(c) {
            if (c === 0) {
                this.$close.hide();
            } else {
                this.$close.show();
            }
        },
        load: function() {
            var f = this.$element.val();
            var e = "";
            if (f.length > this.opts.min) {
                var c = "q";
                if (typeof this.$element.attr("name") != "undefined") {
                    c = this.$element.attr("name");
                }
                e += "&" + c + "=" + f;
                e = this.appendForms(e);
                var h = "";
                if (this.opts.params) {
                    this.opts.params = b.trim(this.opts.params.replace("{", "").replace("}", ""));
                    var d = this.opts.params.split(",");
                    var g = {};
                    b.each(d, function(j, i) {
                        var l = i.split(":");
                        g[b.trim(l[0])] = b.trim(l[1]);
                    });
                    h = [];
                    b.each(g, b.proxy(function(j, i) {
                        h.push(j + "=" + i);
                    }, this));
                    h = h.join("&");
                    e += "&" + h;
                }
            }
            this.toggleClose(f.length);
            this.search(e);
        },
        appendForms: function(c) {
            if (!this.opts.appendForms) {
                return c;
            }
            b.each(this.opts.appendForms, function(d, e) {
                c += "&" + b(e).serialize();
            });
            return c;
        },
        search: function(c) {
            b.ajax({
                url: this.opts.url,
                type: "post",
                data: c,
                success: b.proxy(function(d) {
                    b(this.opts.target).html(d);
                    this.setCallback("result", d);
                }, this)
            });
        }
    };
    b(window).on("load.tools.livesearch", function() {
        b('[data-tools="livesearch"]').livesearch();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.message = function(d) {
        var e = [];
        var c = Array.prototype.slice.call(arguments, 1);
        if (typeof d === "string") {
            this.each(function() {
                var g = b.data(this, "message");
                if (typeof g !== "undefined" && b.isFunction(g[d])) {
                    var f = g[d].apply(g, c);
                    if (f !== undefined && f !== g) {
                        e.push(f);
                    }
                } else {
                    return b.error('No such method "' + d + '" for Message');
                }
            });
        } else {
            this.each(function() {
                b.data(this, "message", {});
                b.data(this, "message", a(this, d));
            });
        }
        if (e.length === 0) {
            return this;
        } else {
            if (e.length === 1) {
                return e[0];
            } else {
                return e;
            }
        }
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Message = a;
    b.Message.NAME = "message";
    b.Message.VERSION = "1.0";
    b.Message.opts = {
        target: false,
        delay: 10
    };
    a.fn = b.Message.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.build();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Message.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$message[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Message.NAME || c == b.Message.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            if (!this.opts.target) {
                this.$message = this.$element;
                this.show();
            } else {
                this.$message = b(this.opts.target);
                this.$message.data("message", "");
                this.$message.data("message", this);
                this.$element.on("click", b.proxy(this.show, this));
            }
        },
        show: function() {
            if (this.$message.hasClass("open")) {
                this.hide();
                return;
            }
            b(".tools-message").hide().removeClass("open");
            this.$message.addClass("open").fadeIn("fast").on("click.tools.message", b.proxy(this.hide, this));
            b(document).on("keyup.tools.message", b.proxy(this.hideHandler, this));
            if (this.opts.delay) {
                setTimeout(b.proxy(this.hide, this), this.opts.delay * 1000);
            }
            this.setCallback("opened");
        },
        hideHandler: function(c) {
            if (c.which != 27) {
                return;
            }
            this.hide();
        },
        hide: function() {
            if (!this.$message.hasClass("open")) {
                return;
            }
            this.$message.off("click.tools.message");
            b(document).off("keyup.tools.message");
            this.$message.fadeOut("fast", b.proxy(function() {
                this.$message.removeClass("open");
                this.setCallback("closed");
            }, this));
        }
    };
    a.prototype.init.prototype = a.prototype;
    b(function() {
        b('[data-tools="message"]').message();
    });
})(jQuery);
(function(b) {
    b.fn.modal = function(d) {
        var e = [];
        var c = Array.prototype.slice.call(arguments, 1);
        if (typeof d === "string") {
            this.each(function() {
                var g = b.data(this, "modal");
                if (typeof g !== "undefined" && b.isFunction(g[d])) {
                    var f = g[d].apply(g, c);
                    if (f !== undefined && f !== g) {
                        e.push(f);
                    }
                } else {
                    return b.error('No such method "' + d + '" for Modal');
                }
            });
        } else {
            this.each(function() {
                b.data(this, "modal", {});
                b.data(this, "modal", a(this, d));
            });
        }
        if (e.length === 0) {
            return this;
        } else {
            if (e.length === 1) {
                return e[0];
            } else {
                return e;
            }
        }
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Modal = a;
    b.Modal.NAME = "modal";
    b.Modal.VERSION = "1.0";
    b.Modal.opts = {
        title: "",
        width: 500,
        blur: false
    };
    a.fn = b.Modal.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.$element.on("click.tools.modal", b.proxy(this.load, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Modal.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Modal.NAME || c == b.Modal.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        load: function() {
            this.build();
            this.enableEvents();
            this.setTitle();
            this.setDraggable();
            this.setContent();
        },
        build: function() {
            this.buildOverlay();
            this.$modalBox = b('<div class="modal-box" />').hide();
            this.$modal = b('<div class="modal" />');
            this.$modalHeader = b("<header />");
            this.$modalClose = b('<span class="modal-close" />').html("&times;");
            this.$modalBody = b("<section />");
            this.$modalFooter = b("<footer />");
            this.$modal.append(this.$modalHeader);
            this.$modal.append(this.$modalClose);
            this.$modal.append(this.$modalBody);
            this.$modal.append(this.$modalFooter);
            this.$modalBox.append(this.$modal);
            this.$modalBox.appendTo(document.body);
        },
        buildOverlay: function() {
            this.$modalOverlay = b('<div id="modal-overlay">').hide();
            b("body").prepend(this.$modalOverlay);
            if (this.opts.blur) {
                this.blurredElements = b("body").children("div, section, header, article, pre, aside, table").not(".modal, .modal-box, #modal-overlay");
                this.blurredElements.addClass("modal-blur");
            }
        },
        show: function() {
            this.setCallback("loading", this.$modal);
            this.bodyOveflow = b(document.body).css("overflow");
            b(document.body).css("overflow", "hidden");
            if (this.isMobile()) {
                this.showOnMobile();
            } else {
                this.showOnDesktop();
            }
            this.$modalOverlay.show();
            this.$modalBox.show();
            this.setButtonsWidth();
            if (!this.isMobile()) {
                setTimeout(b.proxy(this.showOnDesktop, this), 0);
                b(window).on("resize.tools.modal", b.proxy(this.resize, this));
            }
            this.setCallback("opened", this.$modal);
            b(document).off("focusin.modal");
        },
        showOnDesktop: function() {
            var c = this.$modal.outerHeight();
            var e = b(window).height();
            var d = b(window).width();
            if (this.opts.width > d) {
                this.$modal.css({
                    width: "96%",
                    marginTop: (e / 2 - c / 2) + "px"
                });
                return;
            }
            if (c > e) {
                this.$modal.css({
                    width: this.opts.width + "px",
                    marginTop: "20px"
                });
            } else {
                this.$modal.css({
                    width: this.opts.width + "px",
                    marginTop: (e / 2 - c / 2) + "px"
                });
            }
        },
        showOnMobile: function() {
            this.$modal.css({
                width: "96%",
                marginTop: "2%"
            });
        },
        resize: function() {
            if (this.isMobile()) {
                this.showOnMobile();
            } else {
                this.showOnDesktop();
            }
        },
        setTitle: function() {
            this.$modalHeader.html(this.opts.title);
        },
        setContent: function() {
            if (typeof this.opts.content == "object" || this.opts.content.search("#") === 0) {
                this.type = "html";
                this.$modalBody.html(b(this.opts.content).html());
                this.show();
            } else {
                b.ajax({
                    url: this.opts.content,
                    cache: false,
                    success: b.proxy(function(c) {
                        this.$modalBody.html(c);
                        this.show();
                    }, this)
                });
            }
        },
        setDraggable: function() {
            if (typeof b.fn.draggable === "undefined") {
                return;
            }
            this.$modal.draggable({
                handle: this.$modalHeader
            });
            this.$modalHeader.css("cursor", "move");
        },
        createCancelButton: function(c) {
            if (typeof c == "undefined") {
                c = "Cancel";
            }
            var d = b("<button>").addClass("btn modal-close-btn").html(c);
            d.on("click", b.proxy(this.close, this));
            this.$modalFooter.append(d);
        },
        createDeleteButton: function(c) {
            if (typeof c == "undefined") {
                c = "Delete";
            }
            return this.createButton(c, "red");
        },
        createActionButton: function(c) {
            if (typeof c == "undefined") {
                c = "Ok";
            }
            return this.createButton(c, "blue");
        },
        createButton: function(c, e) {
            var d = b("<button>").addClass("btn").addClass("btn-" + e).html(c);
            this.$modalFooter.append(d);
            return d;
        },
        setButtonsWidth: function() {
            var c = this.$modalFooter.find("button");
            var d = c.size();
            if (d === 0) {
                return;
            }
            c.css("width", (100 / d) + "%");
        },
        enableEvents: function() {
            this.$modalClose.on("click.tools.modal", b.proxy(this.close, this));
            b(document).on("keyup.tools.modal", b.proxy(this.closeHandler, this));
            this.$modalBox.on("click.tools.modal", b.proxy(this.close, this));
        },
        disableEvents: function() {
            this.$modalClose.off("click.tools.modal");
            b(document).off("keyup.tools.modal");
            this.$modalBox.off("click.tools.modal");
            b(window).off("resize.tools.modal");
        },
        closeHandler: function(c) {
            if (c.which != 27) {
                return;
            }
            this.close();
        },
        close: function(c) {
            if (c) {
                if (!b(c.target).hasClass("modal-close-btn") && c.target != this.$modalClose[0] && c.target != this.$modalBox[0]) {
                    return;
                }
                c.preventDefault();
            }
            if (!this.$modalBox) {
                return;
            }
            this.disableEvents();
            this.$modalOverlay.remove();
            this.$modalBox.fadeOut("fast", b.proxy(function() {
                this.$modalBox.remove();
                b(document.body).css("overflow", this.bodyOveflow);
                if (this.opts.blur && typeof this.blurredElements != "undefined") {
                    this.blurredElements.removeClass("modal-blur");
                }
                this.setCallback("closed");
            }, this));
        },
        isMobile: function() {
            var c = window.matchMedia("(max-width: 767px)");
            return (c.matches) ? true : false;
        }
    };
    b(window).on("load.tools.modal", function() {
        b('[data-tools="modal"]').modal();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.navigationFixed = function(c) {
        return this.each(function() {
            b.data(this, "navigationFixed", {});
            b.data(this, "navigationFixed", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.NavigationFixed = a;
    b.NavigationFixed.NAME = "navigation-fixed";
    b.NavigationFixed.VERSION = "1.0";
    b.NavigationFixed.opts = {};
    a.fn = b.NavigationFixed.prototype = {
        init: function(e, c) {
            var d = window.matchMedia("(max-width: 767px)");
            if (d.matches) {
                return;
            }
            this.$element = e !== false ? b(e) : false;
            this.loadOptions(c);
            this.navBoxOffsetTop = this.$element.offset().top;
            this.build();
            b(window).scroll(b.proxy(this.build, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.NavigationFixed.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.NavigationFixed.NAME || c == b.NavigationFixed.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            if (b(window).scrollTop() > this.navBoxOffsetTop) {
                this.$element.addClass("navigation-fixed");
                this.setCallback("fixed");
            } else {
                this.$element.removeClass("navigation-fixed");
                this.setCallback("unfixed");
            }
        }
    };
    b(window).on("load.tools.navigation-fixed", function() {
        b('[data-tools="navigation-fixed"]').navigationFixed();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(b) {
    b.fn.navigationToggle = function(c) {
        return this.each(function() {
            b.data(this, "navigationToggle", {});
            b.data(this, "navigationToggle", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.NavigationToggle = a;
    b.NavigationToggle.NAME = "navigation-toggle";
    b.NavigationToggle.VERSION = "1.0";
    b.NavigationToggle.opts = {
        target: false
    };
    a.fn = b.NavigationToggle.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.$target = b(this.opts.target);
            this.$toggle = this.$element.find("span");
            this.$toggle.on("click", b.proxy(this.onClick, this));
            this.build();
            b(window).resize(b.proxy(this.build, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.NavigationToggle.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.NavigationToggle.NAME || c == b.NavigationToggle.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        build: function() {
            var c = window.matchMedia("(max-width: 767px)");
            if (c.matches) {
                if (!this.$target.hasClass("navigation-target-show")) {
                    this.$element.addClass("navigation-toggle-show").show();
                    this.$target.addClass("navigation-target-show").hide();
                }
            } else {
                this.$element.removeClass("navigation-toggle-show").hide();
                this.$target.removeClass("navigation-target-show").show();
            }
        },
        onClick: function(c) {
            c.stopPropagation();
            c.preventDefault();
            if (this.isTargetHide()) {
                this.$element.addClass("navigation-toggle-show");
                this.$target.show();
                this.setCallback("show", this.$target);
            } else {
                this.$element.removeClass("navigation-toggle-show");
                this.$target.hide();
                this.setCallback("hide", this.$target);
            }
        },
        isTargetHide: function() {
            return (this.$target[0].style.display == "none") ? true : false;
        }
    };
    b(window).on("load.tools.navigation-toggle", function() {
        b('[data-tools="navigation-toggle"]').navigationToggle();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(a) {
    a.progress = {
        show: function() {
            if (a("#tools-progress").length !== 0) {
                a("#tools-progress").fadeIn();
            } else {
                var b = a('<div id="tools-progress"><span></span></div>').hide();
                a(document.body).append(b);
                a("#tools-progress").fadeIn();
            }
        },
        update: function(b) {
            this.show();
            a("#tools-progress").find("span").css("width", b + "%");
        },
        hide: function() {
            a("#tools-progress").fadeOut(1500);
        }
    };
})(jQuery);
(function(b) {
    b.fn.tabs = function(d) {
        var e = [];
        var c = Array.prototype.slice.call(arguments, 1);
        if (typeof d === "string") {
            this.each(function() {
                var g = b.data(this, "tabs");
                if (typeof g !== "undefined" && b.isFunction(g[d])) {
                    var f = g[d].apply(g, c);
                    if (f !== undefined && f !== g) {
                        e.push(f);
                    }
                } else {
                    return b.error('No such method "' + d + '" for Tabs');
                }
            });
        } else {
            this.each(function() {
                b.data(this, "tabs", {});
                b.data(this, "tabs", a(this, d));
            });
        }
        if (e.length === 0) {
            return this;
        } else {
            if (e.length === 1) {
                return e[0];
            } else {
                return e;
            }
        }
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Tabs = a;
    b.Tabs.NAME = "tabs";
    b.Tabs.VERSION = "1.0";
    b.Tabs.opts = {
        equals: false,
        active: false
    };
    a.fn = b.Tabs.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.links = this.$element.find("a");
            this.tabs = [];
            this.links.each(b.proxy(this.load, this));
            this.setEquals();
            this.setCallback("init");
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Tabs.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Tabs.NAME || c == b.Tabs.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        load: function(d, e) {
            var c = b(e);
            var f = c.attr("href");
            c.attr("rel", f);
            this.tabs.push(b(f));
            if (!c.parent().hasClass("active")) {
                b(f).hide();
            }
            this.readLocationHash(f);
            if (this.opts.active !== false && this.opts.active === f) {
                this.show(f);
            }
            c.on("click", b.proxy(this.onClick, this));
        },
        onClick: function(d) {
            d.preventDefault();
            var c = b(d.target).attr("rel");
            top.location.hash = c;
            this.show(c);
        },
        readLocationHash: function(c) {
            if (top.location.hash === "" || top.location.hash != c) {
                return;
            }
            this.opts.active = top.location.hash;
        },
        setActive: function(c) {
            this.activeHash = c;
            this.activeTab = b("[rel=" + c + "]");
            this.links.parent().removeClass("active");
            this.activeTab.parent().addClass("active");
        },
        getActiveHash: function() {
            return this.activeHash;
        },
        getActiveTab: function() {
            return this.activeTab;
        },
        show: function(c) {
            this.hideAll();
            b(c).show();
            this.setActive(c);
            this.setCallback("show", b("[rel=" + c + "]"), c);
        },
        hideAll: function() {
            b.each(this.tabs, function() {
                b(this).hide();
            });
        },
        setEquals: function() {
            if (!this.opts.equals) {
                return;
            }
            this.setMaxHeight(this.getMaxHeight());
        },
        setMaxHeight: function(c) {
            b.each(this.tabs, function() {
                b(this).css("min-height", c + "px");
            });
        },
        getMaxHeight: function() {
            var c = 0;
            b.each(this.tabs, function() {
                var d = b(this).height();
                c = d > c ? d : c;
            });
            return c;
        }
    };
    b(window).on("load.tools.tabs", function() {
        b('[data-tools="tabs"]').tabs();
    });
    a.prototype.init.prototype = a.prototype;
})(jQuery);
(function(a) {
    a.fn.textfit = function(c) {
        return this.each(function() {
            a.data(this, "textfit", {});
            a.data(this, "textfit", b(this, c));
        });
    };

    function b(d, c) {
        return new b.prototype.init(d, c);
    }
    a.Textfit = b;
    a.Textfit.NAME = "textfit";
    a.Textfit.VERSION = "1.0";
    a.Textfit.opts = {
        min: "10px",
        max: "100px",
        compressor: 1
    };
    b.fn = a.Textfit.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? a(d) : false;
            this.loadOptions(c);
            this.$element.css("font-size", Math.max(Math.min(this.$element.width() / (this.opts.compressor * 10), parseFloat(this.opts.max)), parseFloat(this.opts.min)));
        },
        loadOptions: function(c) {
            this.opts = a.extend({}, a.extend(true, {}, a.Textfit.opts), this.$element.data(), c);
        }
    };
    a(window).on("load.tools.textfit", function() {
        a('[data-tools="textfit"]').textfit();
    });
    b.prototype.init.prototype = b.prototype;
})(jQuery);
(function(b) {
    b.fn.tooltip = function(c) {
        return this.each(function() {
            b.data(this, "tooltip", {});
            b.data(this, "tooltip", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Tooltip = a;
    b.Tooltip.NAME = "tooltip";
    b.Tooltip.VERSION = "1.0";
    b.Tooltip.opts = {
        theme: false
    };
    a.fn = b.Tooltip.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.$element.on("mouseover", b.proxy(this.show, this));
            this.$element.on("mouseout", b.proxy(this.hide, this));
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Tooltip.opts), this.$element.data(), c);
        },
        show: function() {
            b(".tooltip").hide();
            var c = this.$element.attr("title");
            this.$element.data("cached-title", c);
            this.$element.attr("title", "");
            this.tooltip = b('<div class="tooltip" />').html(c).hide();
            if (this.opts.theme !== false) {
                this.tooltip.addClass("tooltip-theme-" + this.opts.theme);
            }
            this.tooltip.css({
                top: (this.$element.offset().top + this.$element.innerHeight()) + "px",
                left: this.$element.offset().left + "px"
            });
            b("body").append(this.tooltip);
            this.tooltip.show();
        },
        hide: function() {
            this.tooltip.fadeOut("fast", b.proxy(function() {
                this.tooltip.remove();
            }, this));
            this.$element.attr("title", this.$element.data("cached-title"));
            this.$element.data("cached-title", "");
        }
    };
    a.prototype.init.prototype = a.prototype;
    b(function() {
        b('[data-tools="tooltip"]').tooltip();
    });
})(jQuery);
(function(b) {
    b.fn.upload = function(c) {
        return this.each(function() {
            b.data(this, "upload", {});
            b.data(this, "upload", a(this, c));
        });
    };

    function a(d, c) {
        return new a.prototype.init(d, c);
    }
    b.Upload = a;
    b.Upload.NAME = "upload";
    b.Upload.VERSION = "1.0";
    b.Upload.opts = {
        url: false,
        placeholder: "Drop file here or ",
        param: "file"
    };
    a.fn = b.Upload.prototype = {
        init: function(d, c) {
            this.$element = d !== false ? b(d) : false;
            this.loadOptions(c);
            this.load();
        },
        loadOptions: function(c) {
            this.opts = b.extend({}, b.extend(true, {}, b.Upload.opts), this.$element.data(), c);
        },
        setCallback: function(j, h, d) {
            var m = b._data(this.$element[0], "events");
            if (m && typeof m[j] != "undefined") {
                var k = [];
                var g = m[j].length;
                for (var f = 0; f < g; f++) {
                    var c = m[j][f].namespace;
                    if (c == "tools." + b.Upload.NAME || c == b.Upload.NAME + ".tools") {
                        var l = m[j][f].handler;
                        k.push((typeof d == "undefined") ? l.call(this, h) : l.call(this, h, d));
                    }
                }
                if (k.length == 1) {
                    return k[0];
                } else {
                    return k;
                }
            }
            return (typeof d == "undefined") ? h : d;
        },
        load: function() {
            this.$droparea = b('<div class="tools-droparea" />');
            this.$placeholdler = b('<div class="tools-droparea-placeholder" />').text(this.opts.placeholder);
            this.$droparea.append(this.$placeholdler);
            this.$element.after(this.$droparea);
            this.$placeholdler.append(this.$element);
            this.$droparea.off(".tools.upload");
            this.$element.off(".tools.upload");
            this.$droparea.on("dragover.tools.upload", b.proxy(this.onDrag, this));
            this.$droparea.on("dragleave.tools.upload", b.proxy(this.onDragLeave, this));
            this.$element.on("change.tools.upload", b.proxy(function(c) {
                c = c.originalEvent || c;
                this.traverseFile(this.$element[0].files[0], c);
            }, this));
            this.$droparea.on("drop.tools.upload", b.proxy(function(c) {
                c.preventDefault();
                this.$droparea.removeClass("drag-hover").addClass("drag-drop");
                this.onDrop(c);
            }, this));
        },
        onDrop: function(d) {
            d = d.originalEvent || d;
            var c = d.dataTransfer.files;
            this.traverseFile(c[0], d);
        },
        traverseFile: function(c, f) {
            var d = !!window.FormData ? new FormData() : null;
            if (window.FormData) {
                d.append(this.opts.param, c);
            }
            if (b.progress) {
                b.progress.show();
            }
            this.sendData(d, f);
        },
        sendData: function(d, c) {
            var f = new XMLHttpRequest();
            f.open("POST", this.opts.url);
            f.onreadystatechange = b.proxy(function() {
                if (f.readyState == 4) {
                    var g = f.responseText;
                    g = g.replace(/^\[/, "");
                    g = g.replace(/\]$/, "");
                    var e = (typeof g === "string" ? b.parseJSON(g) : g);
                    if (b.progress) {
                        b.progress.hide();
                    }
                    this.$droparea.removeClass("drag-drop");
                    this.setCallback("success", e);
                }
            }, this);
            f.send(d);
        },
        onDrag: function(c) {
            c.preventDefault();
            this.$droparea.addClass("drag-hover");
        },
        onDragLeave: function(c) {
            c.preventDefault();
            this.$droparea.removeClass("drag-hover");
        }
    };
    a.prototype.init.prototype = a.prototype;
    b(function() {
        b('[data-tools="upload"]').upload();
    });
})(jQuery);
$(function() {
    if (typeof prettyPrint != "undefined") {
        prettyPrint();
    }
    if (window.devicePixelRatio >= 1.5) {
        var images = $("img.hires");
        for (var i = 0; i < images.length; i++) {
            var imageType = images[i].src.substr(-4);
            var imageName = images[i].src.substr(0, images[i].src.length - 4);
            imageName += "@2x" + imageType;
            images[i].src = imageName;
        }
    }
    $(window).on("load.tools.testimonials", function() {
        testimonials(false);
        $(window).on("resize", testimonials);
    });
});

function showRedactorVideo(e) {
    e.preventDefault();
    $("#video-holder").hide();
    var div = $("<div />").addClass("video-wrapper");
    var frame = $('<iframe width="560" height="315" src="//www.youtube.com/embed/RllS_bNGCvI?rel=0&autoplay=1" frameborder="0" allowfullscreen />');
    div.append(frame);
    $("#video-holder").after(div);
}

function testimonials(resize) {
    var quotes = $("#testimonials blockquote");
    if (resize !== false) {
        quotes.css({
            height: "auto",
            padding: "50px"
        });
    }
    var max = 0;
    $.each(quotes, function() {
        var h = $(this).height();
        max = h > max ? h : max;
    });
    $.each(quotes, function() {
        var h = $(this).height();
        var pad = (max - h) / 2;
        $(this).height(max).css("padding", (50 + pad) + "px 50px");
    });
}

function showInvoiceForm() {
    if ($("#invoiceForm-box")[0].style.display != "none") {
        return hideInvoiceForm();
    }
    $("#invoiceForm-box").slideDown(function() {
        $(this).find("textarea")[0].focus();
    });
    return false;
}

function hideInvoiceForm() {
    $("#invoiceForm-box").slideUp();
    return false;
}

function showPasswordForm() {
    if ($("#passwordForm-box")[0].style.display != "none") {
        return hidePasswordForm();
    }
    $("#passwordForm-box").slideDown(function() {
        $(this).find("input")[0].focus();
    });
    return false;
}

function hidePasswordForm() {
    $("#passwordForm-box").slideUp();
    return false;
}

function showEmailForm() {
    if ($("#emailForm-box")[0].style.display != "none") {
        return hideEmailForm();
    }
    $("#emailForm-box").slideDown(function() {
        $(this).find("input")[0].focus();
    });
    return false;
}

function hideEmailForm() {
    $("#emailForm-box").slideUp();
    return false;
}

function sendForgot() {
    $("#recoveryForm").html('<p>Password has been successfully sent to your email.<br><br><a href="/login/">Back to Log In</a></p>');
    return false;
}
var q = null;
window.PR_SHOULD_USE_CONTINUATION = !0;
(function() {
    function L(a) {
        function m(a) {
            var f = a.charCodeAt(0);
            if (f !== 92) {
                return f;
            }
            var b = a.charAt(1);
            return (f = r[b]) ? f : "0" <= b && b <= "7" ? parseInt(a.substring(1), 8) : b === "u" || b === "x" ? parseInt(a.substring(2), 16) : a.charCodeAt(1);
        }

        function e(a) {
            if (a < 32) {
                return (a < 16 ? "\\x0" : "\\x") + a.toString(16);
            }
            a = String.fromCharCode(a);
            if (a === "\\" || a === "-" || a === "[" || a === "]") {
                a = "\\" + a;
            }
            return a;
        }

        function h(a) {
            for (var f = a.substring(1, a.length - 1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g), a = [], b = [], o = f[0] === "^", c = o ? 1 : 0, i = f.length; c < i; ++c) {
                var j = f[c];
                if (/\\[bdsw]/i.test(j)) {
                    a.push(j);
                } else {
                    var j = m(j),
                        d;
                    c + 2 < i && "-" === f[c + 1] ? (d = m(f[c + 2]), c += 2) : d = j;
                    b.push([j, d]);
                    d < 65 || j > 122 || (d < 65 || j > 90 || b.push([Math.max(65, j) | 32, Math.min(d, 90) | 32]), d < 97 || j > 122 || b.push([Math.max(97, j) & -33, Math.min(d, 122) & -33]));
                }
            }
            b.sort(function(a, f) {
                return a[0] - f[0] || f[1] - a[1];
            });
            f = [];
            j = [NaN, NaN];
            for (c = 0; c < b.length; ++c) {
                i = b[c], i[0] <= j[1] + 1 ? j[1] = Math.max(j[1], i[1]) : f.push(j = i);
            }
            b = ["["];
            o && b.push("^");
            b.push.apply(b, a);
            for (c = 0; c < f.length; ++c) {
                i = f[c], b.push(e(i[0])), i[1] > i[0] && (i[1] + 1 > i[0] && b.push("-"), b.push(e(i[1])));
            }
            b.push("]");
            return b.join("");
        }

        function y(a) {
            for (var f = a.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g), b = f.length, d = [], c = 0, i = 0; c < b; ++c) {
                var j = f[c];
                j === "(" ? ++i : "\\" === j.charAt(0) && (j = +j.substring(1)) && j <= i && (d[j] = -1);
            }
            for (c = 1; c < d.length; ++c) {
                -1 === d[c] && (d[c] = ++t);
            }
            for (i = c = 0; c < b; ++c) {
                j = f[c], j === "(" ? (++i, d[i] === void 0 && (f[c] = "(?:")) : "\\" === j.charAt(0) && (j = +j.substring(1)) && j <= i && (f[c] = "\\" + d[i]);
            }
            for (i = c = 0; c < b; ++c) {
                "^" === f[c] && "^" !== f[c + 1] && (f[c] = "");
            }
            if (a.ignoreCase && s) {
                for (c = 0; c < b; ++c) {
                    j = f[c], a = j.charAt(0), j.length >= 2 && a === "[" ? f[c] = h(j) : a !== "\\" && (f[c] = j.replace(/[A-Za-z]/g, function(a) {
                        a = a.charCodeAt(0);
                        return "[" + String.fromCharCode(a & -33, a | 32) + "]";
                    }));
                }
            }
            return f.join("");
        }
        for (var t = 0, s = !1, l = !1, p = 0, d = a.length; p < d; ++p) {
            var g = a[p];
            if (g.ignoreCase) {
                l = !0;
            } else {
                if (/[a-z]/i.test(g.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi, ""))) {
                    s = !0;
                    l = !1;
                    break;
                }
            }
        }
        for (var r = {
                b: 8,
                t: 9,
                n: 10,
                v: 11,
                f: 12,
                r: 13
            }, n = [], p = 0, d = a.length; p < d; ++p) {
            g = a[p];
            if (g.global || g.multiline) {
                throw Error("" + g);
            }
            n.push("(?:" + y(g) + ")");
        }
        return RegExp(n.join("|"), l ? "gi" : "g");
    }

    function M(a) {
        function m(a) {
            switch (a.nodeType) {
                case 1:
                    if (e.test(a.className)) {
                        break;
                    }
                    for (var g = a.firstChild; g; g = g.nextSibling) {
                        m(g);
                    }
                    g = a.nodeName;
                    if ("BR" === g || "LI" === g) {
                        h[s] = "\n", t[s << 1] = y++, t[s++ << 1 | 1] = a;
                    }
                    break;
                case 3:
                case 4:
                    g = a.nodeValue, g.length && (g = p ? g.replace(/\r\n?/g, "\n") : g.replace(/[\t\n\r ]+/g, " "), h[s] = g, t[s << 1] = y, y += g.length, t[s++ << 1 | 1] = a);
            }
        }
        var e = /(?:^|\s)nocode(?:\s|$)/,
            h = [],
            y = 0,
            t = [],
            s = 0,
            l;
        a.currentStyle ? l = a.currentStyle.whiteSpace : window.getComputedStyle && (l = document.defaultView.getComputedStyle(a, q).getPropertyValue("white-space"));
        var p = l && "pre" === l.substring(0, 3);
        m(a);
        return {
            a: h.join("").replace(/\n$/, ""),
            c: t
        };
    }

    function B(a, m, e, h) {
        m && (a = {
            a: m,
            d: a
        }, e(a), h.push.apply(h, a.e));
    }

    function x(a, m) {
        function e(a) {
            for (var l = a.d, p = [l, "pln"], d = 0, g = a.a.match(y) || [], r = {}, n = 0, z = g.length; n < z; ++n) {
                var f = g[n],
                    b = r[f],
                    o = void 0,
                    c;
                if (typeof b === "string") {
                    c = !1;
                } else {
                    var i = h[f.charAt(0)];
                    if (i) {
                        o = f.match(i[1]), b = i[0];
                    } else {
                        for (c = 0; c < t; ++c) {
                            if (i = m[c], o = f.match(i[1])) {
                                b = i[0];
                                break;
                            }
                        }
                        o || (b = "pln");
                    }
                    if ((c = b.length >= 5 && "lang-" === b.substring(0, 5)) && !(o && typeof o[1] === "string")) {
                        c = !1, b = "src";
                    }
                    c || (r[f] = b);
                }
                i = d;
                d += f.length;
                if (c) {
                    c = o[1];
                    var j = f.indexOf(c),
                        k = j + c.length;
                    o[2] && (k = f.length - o[2].length, j = k - c.length);
                    b = b.substring(5);
                    B(l + i, f.substring(0, j), e, p);
                    B(l + i + j, c, C(b, c), p);
                    B(l + i + k, f.substring(k), e, p);
                } else {
                    p.push(l + i, b);
                }
            }
            a.e = p;
        }
        var h = {},
            y;
        (function() {
            for (var e = a.concat(m), l = [], p = {}, d = 0, g = e.length; d < g; ++d) {
                var r = e[d],
                    n = r[3];
                if (n) {
                    for (var k = n.length; --k >= 0;) {
                        h[n.charAt(k)] = r;
                    }
                }
                r = r[1];
                n = "" + r;
                p.hasOwnProperty(n) || (l.push(r), p[n] = q);
            }
            l.push(/[\S\s]/);
            y = L(l);
        })();
        var t = m.length;
        return e;
    }

    function u(a) {
        var m = [],
            e = [];
        a.tripleQuotedStrings ? m.push(["str", /^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/, q, "'\""]) : a.multiLineStrings ? m.push(["str", /^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/, q, "'\"`"]) : m.push(["str", /^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/, q, "\"'"]);
        a.verbatimStrings && e.push(["str", /^@"(?:[^"]|"")*(?:"|$)/, q]);
        var h = a.hashComments;
        h && (a.cStyleComments ? (h > 1 ? m.push(["com", /^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/, q, "#"]) : m.push(["com", /^#(?:(?:define|elif|else|endif|error|ifdef|include|ifndef|line|pragma|undef|warning)\b|[^\n\r]*)/, q, "#"]), e.push(["str", /^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h|[a-z]\w*)>/, q])) : m.push(["com", /^#[^\n\r]*/, q, "#"]));
        a.cStyleComments && (e.push(["com", /^\/\/[^\n\r]*/, q]), e.push(["com", /^\/\*[\S\s]*?(?:\*\/|$)/, q]));
        a.regexLiterals && e.push(["lang-regex", /^(?:^^\.?|[!+-]|!=|!==|#|%|%=|&|&&|&&=|&=|\(|\*|\*=|\+=|,|-=|->|\/|\/=|:|::|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|[?@[^]|\^=|\^\^|\^\^=|{|\||\|=|\|\||\|\|=|~|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\s*(\/(?=[^*/])(?:[^/[\\]|\\[\S\s]|\[(?:[^\\\]]|\\[\S\s])*(?:]|$))+\/)/]);
        (h = a.types) && e.push(["typ", h]);
        a = ("" + a.keywords).replace(/^ | $/g, "");
        a.length && e.push(["kwd", RegExp("^(?:" + a.replace(/[\s,]+/g, "|") + ")\\b"), q]);
        m.push(["pln", /^\s+/, q, " \r\n\t\xa0"]);
        e.push(["lit", /^@[$_a-z][\w$@]*/i, q], ["typ", /^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/, q], ["pln", /^[$_a-z][\w$@]*/i, q], ["lit", /^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i, q, "0123456789"], ["pln", /^\\[\S\s]?/, q], ["pun", /^.[^\s\w"-$'./@\\`]*/, q]);
        return x(m, e);
    }

    function D(a, m) {
        function e(a) {
            switch (a.nodeType) {
                case 1:
                    if (k.test(a.className)) {
                        break;
                    }
                    if ("BR" === a.nodeName) {
                        h(a), a.parentNode && a.parentNode.removeChild(a);
                    } else {
                        for (a = a.firstChild; a; a = a.nextSibling) {
                            e(a);
                        }
                    }
                    break;
                case 3:
                case 4:
                    if (p) {
                        var b = a.nodeValue,
                            d = b.match(t);
                        if (d) {
                            var c = b.substring(0, d.index);
                            a.nodeValue = c;
                            (b = b.substring(d.index + d[0].length)) && a.parentNode.insertBefore(s.createTextNode(b), a.nextSibling);
                            h(a);
                            c || a.parentNode.removeChild(a);
                        }
                    }
            }
        }

        function h(a) {
            function b(a, d) {
                var e = d ? a.cloneNode(!1) : a,
                    f = a.parentNode;
                if (f) {
                    var f = b(f, 1),
                        g = a.nextSibling;
                    f.appendChild(e);
                    for (var h = g; h; h = g) {
                        g = h.nextSibling, f.appendChild(h);
                    }
                }
                return e;
            }
            for (; !a.nextSibling;) {
                if (a = a.parentNode, !a) {
                    return;
                }
            }
            for (var a = b(a.nextSibling, 0), e;
                (e = a.parentNode) && e.nodeType === 1;) {
                a = e;
            }
            d.push(a);
        }
        var k = /(?:^|\s)nocode(?:\s|$)/,
            t = /\r\n?|\n/,
            s = a.ownerDocument,
            l;
        a.currentStyle ? l = a.currentStyle.whiteSpace : window.getComputedStyle && (l = s.defaultView.getComputedStyle(a, q).getPropertyValue("white-space"));
        var p = l && "pre" === l.substring(0, 3);
        for (l = s.createElement("LI"); a.firstChild;) {
            l.appendChild(a.firstChild);
        }
        for (var d = [l], g = 0; g < d.length; ++g) {
            e(d[g]);
        }
        m === (m | 0) && d[0].setAttribute("value", m);
        var r = s.createElement("OL");
        r.className = "linenums";
        for (var n = Math.max(0, m - 1 | 0) || 0, g = 0, z = d.length; g < z; ++g) {
            l = d[g], l.className = "L" + (g + n) % 10, l.firstChild || l.appendChild(s.createTextNode("\xa0")), r.appendChild(l);
        }
        a.appendChild(r);
    }

    function k(a, m) {
        for (var e = m.length; --e >= 0;) {
            var h = m[e];
            A.hasOwnProperty(h) ? window.console && console.warn("cannot override language handler %s", h) : A[h] = a;
        }
    }

    function C(a, m) {
        if (!a || !A.hasOwnProperty(a)) {
            a = /^\s*</.test(m) ? "default-markup" : "default-code";
        }
        return A[a];
    }

    function E(a) {
        var m = a.g;
        try {
            var e = M(a.h),
                h = e.a;
            a.a = h;
            a.c = e.c;
            a.d = 0;
            C(m, h)(a);
            var k = /\bMSIE\b/.test(navigator.userAgent),
                m = /\n/g,
                t = a.a,
                s = t.length,
                e = 0,
                l = a.c,
                p = l.length,
                h = 0,
                d = a.e,
                g = d.length,
                a = 0;
            d[g] = s;
            var r, n;
            for (n = r = 0; n < g;) {
                d[n] !== d[n + 2] ? (d[r++] = d[n++], d[r++] = d[n++]) : n += 2;
            }
            g = r;
            for (n = r = 0; n < g;) {
                for (var z = d[n], f = d[n + 1], b = n + 2; b + 2 <= g && d[b + 1] === f;) {
                    b += 2;
                }
                d[r++] = z;
                d[r++] = f;
                n = b;
            }
            for (d.length = r; h < p;) {
                var o = l[h + 2] || s,
                    c = d[a + 2] || s,
                    b = Math.min(o, c),
                    i = l[h + 1],
                    j;
                if (i.nodeType !== 1 && (j = t.substring(e, b))) {
                    k && (j = j.replace(m, "\r"));
                    i.nodeValue = j;
                    var u = i.ownerDocument,
                        v = u.createElement("SPAN");
                    v.className = d[a + 1];
                    var x = i.parentNode;
                    x.replaceChild(v, i);
                    v.appendChild(i);
                    e < o && (l[h + 1] = i = u.createTextNode(t.substring(b, o)), x.insertBefore(i, v.nextSibling));
                }
                e = b;
                e >= o && (h += 2);
                e >= c && (a += 2);
            }
        } catch (w) {
            "console" in window && console.log(w && w.stack ? w.stack : w);
        }
    }
    var v = ["break,continue,do,else,for,if,return,while"],
        w = [
            [v, "auto,case,char,const,default,double,enum,extern,float,goto,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"], "catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"
        ],
        F = [w, "alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,dynamic_cast,explicit,export,friend,inline,late_check,mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],
        G = [w, "abstract,boolean,byte,extends,final,finally,implements,import,instanceof,null,native,package,strictfp,super,synchronized,throws,transient"],
        H = [G, "as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,interface,internal,into,is,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var"],
        w = [w, "debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],
        I = [v, "and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],
        J = [v, "alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],
        v = [v, "case,done,elif,esac,eval,fi,function,in,local,set,then,until"],
        K = /^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)/,
        N = /\S/,
        O = u({
            keywords: [F, H, w, "caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END" + I, J, v],
            hashComments: !0,
            cStyleComments: !0,
            multiLineStrings: !0,
            regexLiterals: !0
        }),
        A = {};
    k(O, ["default-code"]);
    k(x([], [
        ["pln", /^[^<?]+/],
        ["dec", /^<!\w[^>]*(?:>|$)/],
        ["com", /^<\!--[\S\s]*?(?:--\>|$)/],
        ["lang-", /^<\?([\S\s]+?)(?:\?>|$)/],
        ["lang-", /^<%([\S\s]+?)(?:%>|$)/],
        ["pun", /^(?:<[%?]|[%?]>)/],
        ["lang-", /^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i],
        ["lang-js", /^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i],
        ["lang-css", /^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i],
        ["lang-in.tag", /^(<\/?[a-z][^<>]*>)/i]
    ]), ["default-markup", "htm", "html", "mxml", "xhtml", "xml", "xsl"]);
    k(x([
        ["pln", /^\s+/, q, " \t\r\n"],
        ["atv", /^(?:"[^"]*"?|'[^']*'?)/, q, "\"'"]
    ], [
        ["tag", /^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i],
        ["atn", /^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],
        ["lang-uq.val", /^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/],
        ["pun", /^[/<->]+/],
        ["lang-js", /^on\w+\s*=\s*"([^"]+)"/i],
        ["lang-js", /^on\w+\s*=\s*'([^']+)'/i],
        ["lang-js", /^on\w+\s*=\s*([^\s"'>]+)/i],
        ["lang-css", /^style\s*=\s*"([^"]+)"/i],
        ["lang-css", /^style\s*=\s*'([^']+)'/i],
        ["lang-css", /^style\s*=\s*([^\s"'>]+)/i]
    ]), ["in.tag"]);
    k(x([], [
        ["atv", /^[\S\s]+/]
    ]), ["uq.val"]);
    k(u({
        keywords: F,
        hashComments: !0,
        cStyleComments: !0,
        types: K
    }), ["c", "cc", "cpp", "cxx", "cyc", "m"]);
    k(u({
        keywords: "null,true,false"
    }), ["json"]);
    k(u({
        keywords: H,
        hashComments: !0,
        cStyleComments: !0,
        verbatimStrings: !0,
        types: K
    }), ["cs"]);
    k(u({
        keywords: G,
        cStyleComments: !0
    }), ["java"]);
    k(u({
        keywords: v,
        hashComments: !0,
        multiLineStrings: !0
    }), ["bsh", "csh", "sh"]);
    k(u({
        keywords: I,
        hashComments: !0,
        multiLineStrings: !0,
        tripleQuotedStrings: !0
    }), ["cv", "py"]);
    k(u({
        keywords: "caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",
        hashComments: !0,
        multiLineStrings: !0,
        regexLiterals: !0
    }), ["perl", "pl", "pm"]);
    k(u({
        keywords: J,
        hashComments: !0,
        multiLineStrings: !0,
        regexLiterals: !0
    }), ["rb"]);
    k(u({
        keywords: w,
        cStyleComments: !0,
        regexLiterals: !0
    }), ["js"]);
    k(u({
        keywords: "all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,true,try,unless,until,when,while,yes",
        hashComments: 3,
        cStyleComments: !0,
        multilineStrings: !0,
        tripleQuotedStrings: !0,
        regexLiterals: !0
    }), ["coffee"]);
    k(x([], [
        ["str", /^[\S\s]+/]
    ]), ["regex"]);
    window.prettyPrintOne = function(a, m, e) {
        var h = document.createElement("PRE");
        h.innerHTML = a;
        e && D(h, e);
        E({
            g: m,
            i: e,
            h: h
        });
        return h.innerHTML;
    };
    window.prettyPrint = function(a) {
        function m() {
            for (var e = window.PR_SHOULD_USE_CONTINUATION ? l.now() + 250 : Infinity; p < h.length && l.now() < e; p++) {
                var n = h[p],
                    k = n.className;
                if (k.indexOf("prettyprint") >= 0) {
                    var k = k.match(g),
                        f, b;
                    if (b = !k) {
                        b = n;
                        for (var o = void 0, c = b.firstChild; c; c = c.nextSibling) {
                            var i = c.nodeType,
                                o = i === 1 ? o ? b : c : i === 3 ? N.test(c.nodeValue) ? b : o : o;
                        }
                        b = (f = o === b ? void 0 : o) && "CODE" === f.tagName;
                    }
                    b && (k = f.className.match(g));
                    k && (k = k[1]);
                    b = !1;
                    for (o = n.parentNode; o; o = o.parentNode) {
                        if ((o.tagName === "pre" || o.tagName === "code" || o.tagName === "xmp") && o.className && o.className.indexOf("prettyprint") >= 0) {
                            b = !0;
                            break;
                        }
                    }
                    b || ((b = (b = n.className.match(/\blinenums\b(?::(\d+))?/)) ? b[1] && b[1].length ? +b[1] : !0 : !1) && D(n, b), d = {
                        g: k,
                        h: n,
                        i: b
                    }, E(d));
                }
            }
            p < h.length ? setTimeout(m, 250) : a && a();
        }
        for (var e = [document.getElementsByTagName("pre"), document.getElementsByTagName("code"), document.getElementsByTagName("xmp")], h = [], k = 0; k < e.length; ++k) {
            for (var t = 0, s = e[k].length; t < s; ++t) {
                h.push(e[k][t]);
            }
        }
        var e = q,
            l = Date;
        l.now || (l = {
            now: function() {
                return +new Date;
            }
        });
        var p = 0,
            d, g = /\blang(?:uage)?-([\w.]+)(?!\S)/;
        m();
    };
    window.PR = {
        createSimpleLexer: x,
        registerLangHandler: k,
        sourceDecorator: u,
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
    };
})();
(function($) {
    $.fn.validate = function(options) {
        return this.each(function() {
            $.data(this, "validate", {});
            $.data(this, "validate", Validate(this, options));
        });
    };

    function Validate(el, options) {
        return new Validate.prototype.init(el, options);
    }
    $.Validate = Validate;
    $.Validate.NAME = "validate";
    $.Validate.VERSION = "1.0";
    $.Validate.opts = {
        url: false,
        tooltip: false,
        trigger: false,
        delay: 10,
        errorClassName: "input-error",
        spanClassName: "error"
    };
    Validate.fn = $.Validate.prototype = {
        init: function(el, options) {
            this.$element = el !== false ? $(el) : false;
            this.loadOptions(options);
            this.build();
        },
        loadOptions: function(options) {
            this.opts = $.extend({}, $.extend(true, {}, $.Validate.opts), this.$element.data(), options);
        },
        setCallback: function(type, e, data) {
            var events = $._data(this.$element[0], "events");
            if (events && typeof events[type] != "undefined") {
                var value = [];
                var len = events[type].length;
                for (var i = 0; i < len; i++) {
                    var namespace = events[type][i].namespace;
                    if (namespace == "tools." + $.Validate.NAME || namespace == $.Validate.NAME + ".tools") {
                        var callback = events[type][i].handler;
                        value.push((typeof data == "undefined") ? callback.call(this, e) : callback.call(this, e, data));
                    }
                }
                if (value.length == 1) {
                    return value[0];
                } else {
                    return value;
                }
            }
            return (typeof data == "undefined") ? e : data;
        },
        build: function() {
            this.$element.attr("novalidate", "novalidate");
            if (this.opts.trigger === false) {
                this.$element.submit($.proxy(function() {
                    this.send();
                    return false;
                }, this));
            } else {
                this.$element.submit(function() {
                    return false;
                });
                $(this.opts.trigger).off("click.tools.validate");
                $(this.opts.trigger).on("click.tools.validate", $.proxy(this.send, this));
            }
        },
        disableButtons: function() {
            if (this.opts.trigger) {
                $(this.opts.trigger).attr("disabled", "disabled");
            } else {
                this.$element.find("button, input[type=submit]").attr("disabled", "disabled");
            }
        },
        enableButtons: function() {
            if (this.opts.trigger) {
                $(this.opts.trigger).removeAttr("disabled");
            } else {
                this.$element.find("button, input[type=submit]").removeAttr("disabled");
            }
        },
        send: function() {
            this.disableButtons();
            $.ajax({
                url: this.opts.url,
                type: "post",
                data: this.$element.serialize(),
                success: $.proxy(this.parse, this)
            });
        },
        parse: function(jsonString) {
            this.clear();
            this.enableButtons();
            var obj = {};
            if (jsonString !== "") {
                jsonString = jsonString.replace(/^\[/, "");
                jsonString = jsonString.replace(/\]$/, "");
                obj = $.parseJSON(jsonString);
            }
            if (obj.type === "error") {
                $.each(obj.errors, $.proxy(function(name, text) {
                    var $el = $(this.$element.find("[name=" + name + "]"));
                    $el.addClass(this.opts.errorClassName);
                    if (text !== "") {
                        if (this.opts.tooltip) {
                            this.showTooltip($el, text);
                        } else {
                            this.showError($el, name, text);
                        }
                    }
                }, this));
                this.setCallback("error", obj.errors);
            } else {
                if (obj.type === "html") {
                    $.each(obj.data, $.proxy(function(i, s) {
                        $(i).html(this.stripslashes(this.urldecode(s)));
                    }, this));
                } else {
                    if (obj.type === "location") {
                        top.location.href = obj.data;
                    } else {
                        if (obj.type === "message") {
                            this.showMessage(obj);
                        }
                    }
                }
                this.setCallback("success");
            }
        },
        showMessage: function(obj) {
            var text = "";
            if ($.isArray(obj.data)) {
                text = "<ul>";
                var len = obj.data.length;
                for (var i = 0; i < len; i++) {
                    text += "<li>" + obj.data[i] + "</li>";
                }
                text += "</ul>";
            } else {
                text = obj.data;
            }
            var theme = "";
            if (typeof obj.theme != "undefined") {
                theme = " tools-message-" + obj.theme;
            }
            var message = $('<div class="tools-message' + theme + '" />').html(text);
            $("body").append(message);
            message.on("click.tools.validate", function() {
                message.remove();
                message.off("click.tools.validate");
            });
            if (this.opts.delay) {
                setTimeout(function() {
                    message.fadeOut();
                }, this.opts.delay * 1000);
            }
        },
        showError: function($el, name, text) {
            $("#" + name + "-error").addClass(this.opts.spanClassName).html(text).show();
            var eventName = "keyup";
            var tag = $el.prop("tagName");
            var type = $el.prop("type");
            if (tag == "SELECT" || type == "checkbox" || type == "radio") {
                eventName = "change";
            }
            $el.on(eventName + ".tools.validate", $.proxy(function() {
                $el.removeClass(this.opts.errorClassName);
                $("#" + name + "-error").removeClass("validate-error").html("").hide();
                $el.off(eventName + ".tools.validate");
            }, this));
        },
        showTooltip: function($el, text) {
            var size = $el.size();
            if (size !== 0) {
                if (size > 1) {
                    $el = $el.last();
                }
                var tooltip = $('<div class="validate-tooltip tooltip tooltip-theme-red" />').html(text);
                tooltip.css({
                    top: ($el.offset().top + $el.innerHeight() + 2) + "px",
                    left: $el.offset().left + "px"
                });
                $("body").append(tooltip);
                var eventName = "keyup";
                var tag = $el.prop("tagName");
                var type = $el.prop("type");
                if (tag == "SELECT" || type == "checkbox" || type == "radio") {
                    eventName = "change";
                }
                $el.on(eventName + ".tools.validate", function() {
                    tooltip.remove();
                    $el.off(eventName + ".tools.validate");
                });
            }
        },
        clear: function() {
            this.$element.find("." + this.opts.errorClassName).removeClass(this.opts.errorClassName);
            $(".validate-error").removeClass("validate-error").html("").hide();
            $(".validate-tooltip").remove();
            $(".tools-message").remove();
        },
        urldecode: function(str) {
            return decodeURIComponent(str.replace(/\+/g, "%20"));
        },
        stripslashes: function(str) {
            return (str + "").replace(/\0/g, "0").replace(/\\([\\'"])/g, "$1");
        }
    };
    $(window).on("load.tools.validate", function() {
        $('[data-tools="validate"]').validate();
    });
    Validate.prototype.init.prototype = Validate.prototype;
})(jQuery);