/* Copyright 2013 vLine, inc. All rights reserved. */
(function() {
    "undefined" !== typeof dojo ? dojo.provide("org.cometd") : (this.org = this.org || {}, org.cometd = {});
    org.cometd.JSON = {};
    org.cometd.JSON.toJSON = org.cometd.JSON.fromJSON = function() {
        throw "Abstract";
    };
    org.cometd.Utils = {};
    org.cometd.Utils.isString = function(b) {
        return void 0 === b || null === b ? !1 : "string" === typeof b || b instanceof String
    };
    org.cometd.Utils.isArray = function(b) {
        return void 0 === b || null === b ? !1 : b instanceof Array
    };
    org.cometd.Utils.inArray = function(b, d) {
        for (var c = 0; c < d.length; ++c)
            if (b === d[c]) return c;
        return -1
    };
    org.cometd.Utils.setTimeout = function(b, d, c) {
        return window.setTimeout(function() {
            try {
                d()
            } catch (c) {
                b._debug("Exception invoking timed function", d, c)
            }
        }, c)
    };
    org.cometd.Utils.clearTimeout = function(b) {
        window.clearTimeout(b)
    };
    org.cometd.TransportRegistry = function() {
        var b = [],
            d = {};
        this.getTransportTypes = function() {
            return b.slice(0)
        };
        this.findTransportTypes = function(c, a, j) {
            for (var h = [], i = 0; i < b.length; ++i) {
                var f = b[i];
                !0 === d[f].accept(c, a, j) && h.push(f)
            }
            return h
        };
        this.negotiateTransport = function(c, a, j, h) {
            for (var i = 0; i < b.length; ++i)
                for (var f = b[i], m = 0; m < c.length; ++m)
                    if (f === c[m]) {
                        var g = d[f];
                        if (!0 === g.accept(a, j, h)) return g
                    }
            return null
        };
        this.add = function(c, a, j) {
            for (var h = !1, i = 0; i < b.length; ++i)
                if (b[i] === c) {
                    h = !0;
                    break
                }
            h || ("number" !==
                typeof j ? b.push(c) : b.splice(j, 0, c), d[c] = a);
            return !h
        };
        this.find = function(c) {
            for (var a = 0; a < b.length; ++a)
                if (b[a] === c) return d[c];
            return null
        };
        this.remove = function(c) {
            for (var a = 0; a < b.length; ++a)
                if (b[a] === c) return b.splice(a, 1), a = d[c], delete d[c], a;
            return null
        };
        this.clear = function() {
            b = [];
            d = {}
        };
        this.reset = function() {
            for (var c = 0; c < b.length; ++c) d[b[c]].reset()
        }
    };
    org.cometd.Transport = function() {
        var b, d;
        this.registered = function(c, a) {
            b = c;
            d = a
        };
        this.unregistered = function() {
            d = b = null
        };
        this._debug = function() {
            d._debug.apply(d, arguments)
        };
        this._mixin = function() {
            return d._mixin.apply(d, arguments)
        };
        this.getConfiguration = function() {
            return d.getConfiguration()
        };
        this.getAdvice = function() {
            return d.getAdvice()
        };
        this.setTimeout = function(c, a) {
            return org.cometd.Utils.setTimeout(d, c, a)
        };
        this.clearTimeout = function(c) {
            org.cometd.Utils.clearTimeout(c)
        };
        this.convertToMessages = function(c) {
            if (org.cometd.Utils.isString(c)) try {
                return org.cometd.JSON.fromJSON(c)
            } catch (a) {
                throw this._debug("Could not convert to JSON the following string",
                    '"' + c + '"'), a;
            }
            if (org.cometd.Utils.isArray(c)) return c;
            if (void 0 === c || null === c) return [];
            if (c instanceof Object) return [c];
            throw "Conversion Error " + c + ", typeof " + typeof c;
        };
        this.accept = function() {
            throw "Abstract";
        };
        this.getType = function() {
            return b
        };
        this.send = function() {
            throw "Abstract";
        };
        this.reset = function() {
            this._debug("Transport", b, "reset")
        };
        this.abort = function() {
            this._debug("Transport", b, "aborted")
        };
        this.toString = function() {
            return this.getType()
        }
    };
    org.cometd.Transport.derive = function(b) {
        function d() {}
        d.prototype = b;
        return new d
    };
    org.cometd.RequestTransport = function() {
        function b(c) {
            for (; 0 < g.length;) {
                var a = g[0],
                    d = a[0],
                    a = a[1];
                if (d.url === c.url && d.sync === c.sync) g.shift(), c.messages = c.messages.concat(d.messages), this._debug("Coalesced", d.messages.length, "messages from request", a.id);
                else break
            }
        }

        function d(c, a) {
            this.transportSend(c, a);
            a.expired = !1;
            if (!c.sync) {
                var d = this.getConfiguration().maxNetworkDelay,
                    g = d;
                !0 === a.metaConnect && (g += this.getAdvice().timeout);
                this._debug("Transport", this.getType(), "waiting at most", g, "ms for the response, maxNetworkDelay",
                    d);
                var b = this;
                a.timeout = this.setTimeout(function() {
                    a.expired = !0;
                    a.xhr && a.xhr.abort();
                    var d = "Request " + a.id + " of transport " + b.getType() + " exceeded " + g + " ms max network delay";
                    b._debug(d);
                    b.complete(a, !1, a.metaConnect);
                    c.onFailure(a.xhr, c.messages, "timeout", d)
                }, g)
            }
        }

        function c(c) {
            var a = ++i,
                b = {
                    id: a,
                    metaConnect: !1
                };
            m.length < this.getConfiguration().maxConnections - 1 ? (m.push(b), d.call(this, c, b)) : (this._debug("Transport", this.getType(), "queueing request", a, "envelope", c), g.push([c, b]))
        }

        function a(a, d) {
            var f =
                org.cometd.Utils.inArray(a, m);
            0 <= f && m.splice(f, 1);
            if (0 < g.length) {
                var f = g.shift(),
                    j = f[0],
                    h = f[1];
                this._debug("Transport dequeued request", h.id);
                if (d) this.getConfiguration().autoBatch && b.call(this, j), c.call(this, j), this._debug("Transport completed request", a.id, j);
                else {
                    var i = this;
                    this.setTimeout(function() {
                        i.complete(h, !1, h.metaConnect);
                        j.onFailure(h.xhr, j.messages, "error", "Previous request failed")
                    }, 0)
                }
            }
        }
        var j = new org.cometd.Transport,
            h = org.cometd.Transport.derive(j),
            i = 0,
            f = null,
            m = [],
            g = [];
        h.complete =
            function(c, d, g) {
                if (g) {
                    c = c.id;
                    this._debug("Transport", this.getType(), "metaConnect complete, request", c);
                    if (null !== f && f.id !== c) throw "Longpoll request mismatch, completing request " + c;
                    f = null
                } else a.call(this, c, d)
            };
        h.transportSend = function() {
            throw "Abstract";
        };
        h.transportSuccess = function(c, a, d) {
            if (!a.expired)
                if (this.clearTimeout(a.timeout), this.complete(a, !0, a.metaConnect), d && 0 < d.length) c.onSuccess(d);
                else c.onFailure(a.xhr, c.messages, "Empty HTTP response")
        };
        h.transportFailure = function(c, a, d, g) {
            a.expired ||
                (this.clearTimeout(a.timeout), this.complete(a, !1, a.metaConnect), c.onFailure(a.xhr, c.messages, d, g))
        };
        h.send = function(a, g) {
            if (g) {
                if (null !== f) throw "Concurrent metaConnect requests not allowed, request id=" + f.id + " not yet completed";
                var b = ++i;
                this._debug("Transport", this.getType(), "metaConnect send, request", b, "envelope", a);
                b = {
                    id: b,
                    metaConnect: !0
                };
                d.call(this, a, b);
                f = b
            } else c.call(this, a)
        };
        h.abort = function() {
            j.abort();
            for (var c = 0; c < m.length; ++c) {
                var a = m[c];
                this._debug("Aborting request", a);
                a.xhr && a.xhr.abort()
            }
            f &&
                (this._debug("Aborting metaConnect request", f), f.xhr && f.xhr.abort());
            this.reset()
        };
        h.reset = function() {
            j.reset();
            f = null;
            m = [];
            g = []
        };
        return h
    };
    org.cometd.LongPollingTransport = function() {
        var b = new org.cometd.RequestTransport,
            d = org.cometd.Transport.derive(b),
            c = !0;
        d.accept = function(a, d) {
            return c || !d
        };
        d.xhrSend = function() {
            throw "Abstract";
        };
        d.transportSend = function(a, d) {
            this._debug("Transport", this.getType(), "sending request", d.id, "envelope", a);
            var b = this;
            try {
                var i = !0;
                d.xhr = this.xhrSend({
                    transport: this,
                    url: a.url,
                    sync: a.sync,
                    headers: this.getConfiguration().requestHeaders,
                    body: org.cometd.JSON.toJSON(a.messages),
                    onSuccess: function(f) {
                        b._debug("Transport",
                            b.getType(), "received response", f);
                        var g = !1;
                        try {
                            var i = b.convertToMessages(f);
                            0 === i.length ? (c = !1, b.transportFailure(a, d, "no response", null)) : (g = !0, b.transportSuccess(a, d, i))
                        } catch (o) {
                            b._debug(o), g || (c = !1, b.transportFailure(a, d, "bad response", o))
                        }
                    },
                    onError: function(f, g) {
                        c = !1;
                        i ? b.setTimeout(function() {
                            b.transportFailure(a, d, f, g)
                        }, 0) : b.transportFailure(a, d, f, g)
                    }
                });
                i = !1
            } catch (f) {
                c = !1, this.setTimeout(function() {
                    b.transportFailure(a, d, "error", f)
                }, 0)
            }
        };
        d.reset = function() {
            b.reset();
            c = !0
        };
        return d
    };
    org.cometd.CallbackPollingTransport = function() {
        var b = new org.cometd.RequestTransport,
            b = org.cometd.Transport.derive(b);
        b.accept = function() {
            return !0
        };
        b.jsonpSend = function() {
            throw "Abstract";
        };
        b.transportSend = function(d, c) {
            for (var a = this, b = 0, h = d.messages.length, i = []; 0 < h;) {
                var f = org.cometd.JSON.toJSON(d.messages.slice(b, b + h)),
                    f = d.url.length + encodeURI(f).length;
                if (2E3 < f) {
                    if (1 === h) {
                        var m = "Bayeux message too big (" + f + " bytes, max is 2000) for transport " + this.getType();
                        this.setTimeout(function() {
                            a.transportFailure(d,
                                c, "error", m)
                        }, 0);
                        return
                    }--h
                } else i.push(h), b += h, h = d.messages.length - b
            }
            var g = d;
            if (1 < i.length) {
                b = 0;
                h = i[0];
                this._debug("Transport", this.getType(), "split", d.messages.length, "messages into", i.join(" + "));
                g = this._mixin(!1, {}, d);
                g.messages = d.messages.slice(b, h);
                g.onSuccess = d.onSuccess;
                g.onFailure = d.onFailure;
                for (f = 1; f < i.length; ++f) {
                    var l = this._mixin(!1, {}, d),
                        b = h,
                        h = h + i[f];
                    l.messages = d.messages.slice(b, h);
                    l.onSuccess = d.onSuccess;
                    l.onFailure = d.onFailure;
                    this.send(l, c.metaConnect)
                }
            }
            this._debug("Transport",
                this.getType(), "sending request", c.id, "envelope", g);
            try {
                var o = !0;
                this.jsonpSend({
                    transport: this,
                    url: g.url,
                    sync: g.sync,
                    headers: this.getConfiguration().requestHeaders,
                    body: org.cometd.JSON.toJSON(g.messages),
                    onSuccess: function(d) {
                        var b = !1;
                        try {
                            var f = a.convertToMessages(d);
                            0 === f.length ? a.transportFailure(g, c, "no response") : (b = !0, a.transportSuccess(g, c, f))
                        } catch (h) {
                            a._debug(h), b || a.transportFailure(g, c, "bad response", h)
                        }
                    },
                    onError: function(d, b) {
                        o ? a.setTimeout(function() {
                            a.transportFailure(g, c, d, b)
                        }, 0) : a.transportFailure(g,
                            c, d, b)
                    }
                });
                o = !1
            } catch (u) {
                this.setTimeout(function() {
                    a.transportFailure(g, c, "error", u)
                }, 0)
            }
        };
        return b
    };
    org.cometd.WebSocketTransport = function() {
        function b() {
            var c = h.getURL().replace(/^http/, "ws");
            this._debug("Transport", this.getType(), "connecting to URL", c);
            var a = this,
                d = null,
                b = h.getConfiguration().connectTimeout;
            0 < b && (d = this.setTimeout(function() {
                d = null;
                l || (a._debug("Transport", a.getType(), "timed out while connecting to URL", c, ":", b, "ms"), a.onClose(1002, "Connect Timeout"))
            }, b));
            var f = new org.cometd.WebSocket(c);
            f.onopen = function() {
                a._debug("WebSocket opened", f);
                d && (a.clearTimeout(d), d = null);
                if (f !==
                    g) a._debug("Ignoring open event, WebSocket", g);
                else a.onOpen()
            };
            f.onclose = function(c) {
                var b = c ? c.code : 1E3,
                    c = c ? c.reason : void 0;
                a._debug("WebSocket closed", b, "/", c, f);
                d && (a.clearTimeout(d), d = null);
                if (f !== g) a._debug("Ignoring close event, WebSocket", g);
                else a.onClose(b, c)
            };
            f.onerror = function() {
                f.onclose({
                    code: 1002
                })
            };
            f.onmessage = function(c) {
                a._debug("WebSocket message", c, f);
                if (f !== g) a._debug("Ignoring message event, WebSocket", g);
                else a.onMessage(c)
            };
            g = f;
            this._debug("Transport", this.getType(), "configured callbacks on",
                f)
        }

        function d(c, a) {
            var d = org.cometd.JSON.toJSON(c.messages);
            g.send(d);
            this._debug("Transport", this.getType(), "sent", c, "metaConnect =", a);
            var b = d = this.getConfiguration().maxNetworkDelay;
            a && (b += this.getAdvice().timeout, o = !0);
            for (var f = [], h = 0; h < c.messages.length; ++h) {
                var i = c.messages[h];
                if (i.id) {
                    f.push(i.id);
                    var j = g;
                    m[i.id] = this.setTimeout(function() {
                        j && j.close(1E3, "Timeout")
                    }, b)
                }
            }
            this._debug("Transport", this.getType(), "waiting at most", b, "ms for messages", f, "maxNetworkDelay", d, ", timeouts:", m)
        }

        function c(c,
            a) {
            try {
                null === g ? b.call(this) : l && d.call(this, c, a)
            } catch (f) {
                this.setTimeout(function() {
                    c.onFailure(g, c.messages, "error", f)
                }, 0)
            }
        }
        var a = new org.cometd.Transport,
            j = org.cometd.Transport.derive(a),
            h, i = !0,
            f = {},
            m = {},
            g = null,
            l = !1,
            o = !1,
            u;
        j.onOpen = function() {
            this._debug("Transport", this.getType(), "opened", g);
            l = !0;
            this._debug("Sending pending messages", f);
            for (var c in f) {
                var a = f[c],
                    b = a[0],
                    a = a[1];
                u = b.onSuccess;
                d.call(this, b, a)
            }
        };
        j.onMessage = function(c) {
            this._debug("Transport", this.getType(), "received websocket message",
                c, g);
            for (var a = !1, c = this.convertToMessages(c.data), d = [], b = 0; b < c.length; ++b) {
                var h = c[b];
                if ((/^\/meta\//.test(h.channel) || void 0 === h.data || /^\/service\//.test(h.channel)) && h.id) {
                    d.push(h.id);
                    var i = m[h.id];
                    i && (this.clearTimeout(i), delete m[h.id], this._debug("Transport", this.getType(), "removed timeout for message", h.id, ", timeouts", m))
                }
                "/meta/connect" === h.channel && (o = !1);
                "/meta/disconnect" === h.channel && !o && (a = !0)
            }
            b = !1;
            for (h = 0; h < d.length; ++h) {
                var j = d[h],
                    v;
                for (v in f) {
                    var i = v.split(","),
                        x = org.cometd.Utils.inArray(j,
                            i);
                    if (0 <= x) {
                        b = !0;
                        i.splice(x, 1);
                        j = f[v][0];
                        x = f[v][1];
                        delete f[v];
                        0 < i.length && (f[i.join(",")] = [j, x]);
                        break
                    }
                }
            }
            b && this._debug("Transport", this.getType(), "removed envelope, envelopes", f);
            u.call(this, c);
            a && null !== g && l && (g.close(1E3, "Disconnect"), g = null, l = !1)
        };
        j.onClose = function(c, a) {
            this._debug("Transport", this.getType(), "closed", c, a, g);
            for (var b in m) this.clearTimeout(m[b]);
            m = {};
            for (var d in f) b = f[d][0], f[d][1] && (o = !1), b.onFailure(g, b.messages, "closed " + c + "/" + a);
            f = {};
            null !== g && l && g.close(1E3, "Close");
            l = !1;
            g = null
        };
        j.registered = function(c, b) {
            a.registered(c, b);
            h = b
        };
        j.accept = function() {
            return i && !!org.cometd.WebSocket && !1 !== h.websocketEnabled
        };
        j.send = function(a, b) {
            this._debug("Transport", this.getType(), "sending", a, "metaConnect =", b);
            for (var d = [], g = 0; g < a.messages.length; ++g) {
                var h = a.messages[g];
                h.id && d.push(h.id)
            }
            f[d.join(",")] = [a, b];
            this._debug("Transport", this.getType(), "stored envelope, envelopes", f);
            c.call(this, a, b)
        };
        j.abort = function() {
            a.abort();
            if (null !== g) try {
                g.close(1001)
            } catch (c) {
                this._debug(c)
            }
            this.reset()
        };
        j.reset = function() {
            a.reset();
            null !== g && l && g.close(1E3, "Reset");
            i = !0;
            m = {};
            f = {};
            g = null;
            l = !1;
            u = null
        };
        return j
    };
    org.cometd.Cometd = function(b) {
        function d(e) {
            return org.cometd.Utils.isString(e)
        }

        function c(e) {
            return void 0 === e || null === e ? !1 : "function" === typeof e
        }

        function a(e, a) {
            if (window.console) {
                var b = window.console[e];
                if (c(b)) {
                    for (var d = Array.prototype.slice.call(a), f = 0; f < d.length; f++)
                        if ("object" == typeof d[f]) {
                            var g = [];
                            d[f] = JSON.stringify(d[f], function(e, c) {
                                if ("object" === typeof c && null !== c) {
                                    if (-1 !== g.indexOf(c)) return;
                                    g.push(c)
                                }
                                return c
                            });
                            g = null
                        }
                    b.call(window.console, d.join())
                }
            }
        }

        function j() {
            for (var e in w)
                for (var c =
                        w[e], a = 0; a < c.length; ++a) {
                    var b = c[a];
                    b && !b.listener && (delete c[a], k._debug("Removed subscription", b, "for channel", e))
                }
        }

        function h(e) {
            A !== e && (k._debug("Status", A, "->", e), A = e)
        }

        function i() {
            return "disconnecting" === A || "disconnected" === A
        }

        function f(e, a, b, d, f) {
            try {
                return a.call(e, d)
            } catch (g) {
                k._debug("Exception during execution of extension", b, g);
                e = k.onExtensionException;
                if (c(e)) {
                    k._debug("Invoking extension exception callback", b, g);
                    try {
                        e.call(k, g, b, f, d)
                    } catch (h) {
                        k._info("Exception during execution of exception callback in extension",
                            b, h)
                    }
                }
                return d
            }
        }

        function m(e) {
            for (var a = 0; a < q.length && !(void 0 === e || null === e); ++a) {
                var b = q[a],
                    d = b.extension.outgoing;
                c(d) && (b = f(b.extension, d, b.name, e, !0), e = void 0 === b ? e : b)
            }
            return e
        }

        function g(e, a) {
            var b = w[e];
            if (b && 0 < b.length)
                for (var d = 0; d < b.length; ++d) {
                    var f = b[d];
                    if (f) try {
                        f.callback.call(f.scope, a)
                    } catch (g) {
                        k._debug("Exception during notification", f, a, g);
                        var h = k.onListenerException;
                        if (c(h)) {
                            k._debug("Invoking listener exception callback", f, g);
                            try {
                                h.call(k, g, f.handle, f.listener, a)
                            } catch (i) {
                                k._info("Exception during execution of listener callback",
                                    f, i)
                            }
                        }
                    }
                }
        }

        function l(e, a) {
            g(e, a);
            for (var c = e.split("/"), b = c.length - 1, d = b; 0 < d; --d) {
                var f = c.slice(0, d).join("/") + "/*";
                d === b && g(f, a);
                f += "*";
                g(f, a)
            }
        }

        function o() {
            null !== H && org.cometd.Utils.clearTimeout(H);
            H = null
        }

        function u(e) {
            o();
            var a = r.interval + p;
            k._debug("Function scheduled in", a, "ms, interval =", r.interval, "backoff =", p, e);
            H = org.cometd.Utils.setTimeout(k, e, a)
        }

        function D(e, a, c, b) {
            for (var d = 0; d < a.length; ++d) {
                var f = a[d];
                f.id = "" + ++$;
                if (B) f.clientId = B;
                f = m(f);
                void 0 !== f && null !== f ? a[d] = f : a.splice(d--, 1)
            }
            if (0 !==
                a.length) d = n.url, n.appendMessageTypeToURL && (d.match(/\/$/) || (d += "/"), b && (d += b)), e = {
                url: d,
                sync: e,
                messages: a,
                onSuccess: function(e) {
                    try {
                        Q.call(k, e)
                    } catch (a) {
                        k._debug("Exception during handling of messages", a)
                    }
                },
                onFailure: function(e, a, c, b) {
                    try {
                        K.call(k, e, a, c, b)
                    } catch (d) {
                        k._debug("Exception during handling of failure", d)
                    }
                }
            }, k._debug("Send", e), t.send(e, c)
        }

        function G(e) {
            0 < y || !0 === E ? C.push(e) : D(!1, [e], !1)
        }

        function O() {
            var e = C;
            C = [];
            0 < e.length && D(!1, e, !1)
        }

        function I() {
            h("connecting");
            u(function() {
                if (!i()) {
                    var e = {
                        channel: "/meta/connect",
                        connectionType: t.getType()
                    };
                    if (!L) e.advice = {
                        timeout: 0
                    };
                    h("connecting");
                    k._debug("Connect sent", e);
                    D(!1, [e], !0, "connect");
                    h("connected")
                }
            })
        }

        function J(e) {
            e && (r = k._mixin(!1, {}, n.advice, e), k._debug("New advice", r))
        }

        function z(e) {
            o();
            e && t.abort();
            B = null;
            h("disconnected");
            p = y = 0;
            0 < C.length && (K.call(k, void 0, C, "error", "Disconnected"), C = [])
        }

        function P(e) {
            B = null;
            j();
            i() ? (s.reset(), J(n.advice)) : J(k._mixin(!1, r, {
                reconnect: "retry"
            }));
            y = 0;
            E = !0;
            M = e;
            var e = s.findTransportTypes("1.0", F, n.url),
                a = k._mixin(!1, {}, M, {
                    version: "1.0",
                    minimumVersion: "0.9",
                    channel: "/meta/handshake",
                    supportedConnectionTypes: e,
                    advice: {
                        timeout: r.timeout,
                        interval: r.interval
                    }
                });
            t = s.negotiateTransport(e, "1.0", F, n.url);
            k._debug("Initial transport is", t.getType());
            h("handshaking");
            k._debug("Handshake sent", a);
            D(!1, [a], !1, "handshake")
        }

        function v() {
            h("handshaking");
            E = !0;
            u(function() {
                P(M)
            })
        }

        function x(e) {
            l("/meta/handshake", e);
            l("/meta/unsuccessful", e);
            !i() && "none" !== r.reconnect ? (p < n.maxBackoff && (p += n.backoffIncrement), v()) :
                z(!1)
        }

        function R(e) {
            l("/meta/connect", e);
            l("/meta/unsuccessful", e);
            e = i() ? "none" : r.reconnect;
            switch (e) {
                case "retry":
                    I();
                    p < n.maxBackoff && (p += n.backoffIncrement);
                    break;
                case "handshake":
                    s.reset();
                    p = 0;
                    v();
                    break;
                case "none":
                    z(!1);
                    break;
                default:
                    throw "Unrecognized advice action" + e;
            }
        }

        function S(e) {
            z(!0);
            l("/meta/disconnect", e);
            l("/meta/unsuccessful", e)
        }

        function T(e) {
            l("/meta/subscribe", e);
            l("/meta/unsuccessful", e)
        }

        function U(e) {
            l("/meta/unsubscribe", e);
            l("/meta/unsuccessful", e)
        }

        function V(e) {
            l("/meta/publish",
                e);
            l("/meta/unsuccessful", e)
        }

        function W(e) {
            for (var a = 0; a < q.length && !(void 0 === e || null === e); ++a) {
                var b = q[n.reverseIncomingExtensions ? q.length - 1 - a : a],
                    d = b.extension.incoming;
                c(d) && (b = f(b.extension, d, b.name, e, !1), e = void 0 === b ? e : b)
            }
            if (!(void 0 === e || null === e)) switch (J(e.advice), e.channel) {
                case "/meta/handshake":
                    if (e.successful) {
                        B = e.clientId;
                        a = s.negotiateTransport(e.supportedConnectionTypes, e.version, F, n.url);
                        if (null === a) throw "Could not negotiate transport with server; client " + s.findTransportTypes(e.version,
                            F, n.url) + ", server " + e.supportedConnectionTypes;
                        t !== a && (k._debug("Transport", t, "->", a), t = a);
                        E = !1;
                        O();
                        e.reestablish = N;
                        N = !0;
                        l("/meta/handshake", e);
                        e = i() ? "none" : r.reconnect;
                        switch (e) {
                            case "retry":
                                p = 0;
                                I();
                                break;
                            case "none":
                                z(!1);
                                break;
                            default:
                                throw "Unrecognized advice action " + e;
                        }
                    } else x(e);
                    break;
                case "/meta/connect":
                    if (L = e.successful) switch (l("/meta/connect", e), e = i() ? "none" : r.reconnect, e) {
                        case "retry":
                            p = 0;
                            I();
                            break;
                        case "none":
                            z(!1);
                            break;
                        default:
                            throw "Unrecognized advice action " + e;
                    } else R(e);
                    break;
                case "/meta/disconnect":
                    e.successful ? (z(!1), l("/meta/disconnect", e)) : S(e);
                    break;
                case "/meta/subscribe":
                    e.successful ? l("/meta/subscribe", e) : T(e);
                    break;
                case "/meta/unsubscribe":
                    e.successful ? l("/meta/unsubscribe", e) : U(e);
                    break;
                default:
                    void 0 === e.successful ? e.data ? l(e.channel, e) : k._debug("Unknown message", e) : e.successful ? l("/meta/publish", e) : V(e)
            }
        }

        function X(e) {
            if (e = w[e])
                for (var a = 0; a < e.length; ++a)
                    if (e[a]) return !0;
            return !1
        }

        function Y(e, a) {
            var b = {
                scope: e,
                method: a
            };
            if (c(e)) b.scope = void 0, b.method = e;
            else if (d(a)) {
                if (!e) throw "Invalid scope " +
                    e;
                b.method = e[a];
                if (!c(b.method)) throw "Invalid callback " + a + " for scope " + e;
            } else if (!c(a)) throw "Invalid callback " + a;
            return b
        }

        function Z(e, a, b, c) {
            a = Y(a, b);
            k._debug("Adding listener on", e, "with scope", a.scope, "and callback", a.method);
            c = {
                channel: e,
                scope: a.scope,
                callback: a.method,
                listener: c
            };
            a = w[e];
            a || (a = [], w[e] = a);
            a = a.push(c) - 1;
            c.id = a;
            c.handle = [e, a];
            k._debug("Added listener", c, "for channel", e, "having id =", a);
            return c.handle
        }
        var k = this,
            aa = b || "default",
            F = !1,
            s = new org.cometd.TransportRegistry,
            t, A = "disconnected",
            $ = 0,
            B = null,
            y = 0,
            C = [],
            E = !1,
            w = {},
            p = 0,
            H = null,
            q = [],
            r = {},
            M, N = !1,
            L = !1,
            n = {
                connectTimeout: 0,
                maxConnections: 2,
                backoffIncrement: 1E3,
                maxBackoff: 6E4,
                logLevel: "info",
                reverseIncomingExtensions: !0,
                maxNetworkDelay: 1E4,
                requestHeaders: {},
                appendMessageTypeToURL: !0,
                autoBatch: !1,
                advice: {
                    timeout: 6E4,
                    interval: 0,
                    reconnect: "retry"
                }
            };
        this._mixin = function(e, a, b) {
            for (var c = a || {}, d = 2; d < arguments.length; ++d) {
                var f = arguments[d];
                if (!(void 0 === f || null === f))
                    for (var g in f) {
                        var h = f[g],
                            i = c[g];
                        h !== a && void 0 !== h && (c[g] = e && "object" === typeof h &&
                            null !== h ? h instanceof Array ? this._mixin(e, i instanceof Array ? i : [], h) : this._mixin(e, "object" === typeof i && !(i instanceof Array) ? i : {}, h) : h)
                    }
            }
            return c
        };
        this._warn = function() {
            a("warn", arguments)
        };
        this._info = function() {
            "warn" !== n.logLevel && a("info", arguments)
        };
        this._debug = function() {
            "debug" === n.logLevel && a("debug", arguments)
        };
        this._isCrossDomain = function(e) {
            return e && e !== window.location.host
        };
        var Q, K;
        this.send = G;
        this.receive = W;
        Q = function(e) {
            k._debug("Received", e);
            for (var a = 0; a < e.length; ++a) W(e[a])
        };
        K = function(e,
            a, b, c) {
            k._debug("handleFailure", e, a, b, c);
            for (b = 0; b < a.length; ++b) {
                var d = a[b];
                switch (d.channel) {
                    case "/meta/handshake":
                        x({
                            successful: !1,
                            failure: !0,
                            channel: "/meta/handshake",
                            request: d,
                            xhr: e,
                            advice: {
                                reconnect: "retry",
                                interval: p
                            }
                        });
                        break;
                    case "/meta/connect":
                        c = e;
                        L = !1;
                        R({
                            successful: !1,
                            failure: !0,
                            channel: "/meta/connect",
                            request: d,
                            xhr: c,
                            advice: {
                                reconnect: "retry",
                                interval: p
                            }
                        });
                        break;
                    case "/meta/disconnect":
                        S({
                            successful: !1,
                            failure: !0,
                            channel: "/meta/disconnect",
                            request: d,
                            xhr: e,
                            advice: {
                                reconnect: "none",
                                interval: 0
                            }
                        });
                        break;
                    case "/meta/subscribe":
                        T({
                            successful: !1,
                            failure: !0,
                            channel: "/meta/subscribe",
                            request: d,
                            xhr: e,
                            advice: {
                                reconnect: "none",
                                interval: 0
                            }
                        });
                        break;
                    case "/meta/unsubscribe":
                        U({
                            successful: !1,
                            failure: !0,
                            channel: "/meta/unsubscribe",
                            request: d,
                            xhr: e,
                            advice: {
                                reconnect: "none",
                                interval: 0
                            }
                        });
                        break;
                    default:
                        V({
                            successful: !1,
                            failure: !0,
                            channel: d.channel,
                            request: d,
                            xhr: e,
                            advice: {
                                reconnect: "none",
                                interval: 0
                            }
                        })
                }
            }
        };
        this.registerTransport = function(a, b, d) {
            if (d = s.add(a, b, d)) this._debug("Registered transport", a), c(b.registered) &&
                b.registered(a, this);
            return d
        };
        this.getTransportTypes = function() {
            return s.getTransportTypes()
        };
        this.unregisterTransport = function(a) {
            var b = s.remove(a);
            null !== b && (this._debug("Unregistered transport", a), c(b.unregistered) && b.unregistered());
            return b
        };
        this.unregisterTransports = function() {
            s.clear()
        };
        this.findTransport = function(a) {
            return s.find(a)
        };
        this.configure = function(a) {
            k._debug("Configuring cometd object with", a);
            d(a) && (a = {
                url: a
            });
            a || (a = {});
            n = k._mixin(!1, n, a);
            if (!n.url) throw "Missing required configuration parameter 'url' specifying the Bayeux server URL";
            var b = /(^https?:\/\/)?(((\[[^\]]+\])|([^:\/\?#]+))(:(\d+))?)?([^\?#]*)(.*)?/.exec(n.url),
                a = b[8],
                c = b[9];
            F = k._isCrossDomain(b[2]);
            if (n.appendMessageTypeToURL)
                if (void 0 !== c && 0 < c.length) k._info("Appending message type to URI " + a + c + " is not supported, disabling 'appendMessageTypeToURL' configuration"), n.appendMessageTypeToURL = !1;
                else if (b = a.split("/"), c = b.length - 1, a.match(/\/$/) && (c -= 1), 0 <= b[c].indexOf(".")) k._info("Appending message type to URI " + a + " is not supported, disabling 'appendMessageTypeToURL' configuration"),
                n.appendMessageTypeToURL = !1
        };
        this.init = function(a, b) {
            this.configure(a);
            this.handshake(b)
        };
        this.handshake = function(a) {
            h("disconnected");
            N = !1;
            P(a)
        };
        this.disconnect = function(a, b) {
            if (!i()) {
                void 0 === b && "boolean" !== typeof a && (b = a, a = !1);
                var c = this._mixin(!1, {}, b, {
                    channel: "/meta/disconnect"
                });
                h("disconnecting");
                D(!0 === a, [c], !1, "disconnect")
            }
        };
        this.startBatch = function() {
            ++y
        };
        this.endBatch = function() {
            --y;
            if (0 > y) throw "Calls to startBatch() and endBatch() are not paired";
            0 === y && !i() && !E && O()
        };
        this.batch = function(a,
            b) {
            var c = Y(a, b);
            this.startBatch();
            try {
                c.method.call(c.scope), this.endBatch()
            } catch (d) {
                throw this._debug("Exception during execution of batch", d), this.endBatch(), d;
            }
        };
        this.addListener = function(a, b, c) {
            if (2 > arguments.length) throw "Illegal arguments number: required 2, got " + arguments.length;
            if (!d(a)) throw "Illegal argument type: channel must be a string";
            return Z(a, b, c, !0)
        };
        this.removeListener = function(a) {
            if (!org.cometd.Utils.isArray(a)) throw "Invalid argument: expected subscription, not " + a;
            var b = w[a[0]];
            b && (delete b[a[1]], k._debug("Removed listener", a))
        };
        this.clearListeners = function() {
            w = {}
        };
        this.subscribe = function(a, b, f, g) {
            if (2 > arguments.length) throw "Illegal arguments number: required 2, got " + arguments.length;
            if (!d(a)) throw "Illegal argument type: channel must be a string";
            if (i()) throw "Illegal state: already disconnected";
            c(b) && (g = f, f = b, b = void 0);
            var h = !X(a),
                j = Z(a, b, f, !1);
            h && (h = this._mixin(!1, {}, g, {
                channel: "/meta/subscribe",
                subscription: a
            }), G(h));
            return j
        };
        this.unsubscribe = function(a, b) {
            if (1 > arguments.length) throw "Illegal arguments number: required 1, got " +
                arguments.length;
            if (i()) throw "Illegal state: already disconnected";
            this.removeListener(a);
            var c = a[0];
            X(c) || (c = this._mixin(!1, {}, b, {
                channel: "/meta/unsubscribe",
                subscription: c
            }), G(c))
        };
        this.clearSubscriptions = function() {
            j()
        };
        this.publish = function(a, b, c) {
            if (1 > arguments.length) throw "Illegal arguments number: required 1, got " + arguments.length;
            if (!d(a)) throw "Illegal argument type: channel must be a string";
            if (i()) throw "Illegal state: already disconnected";
            var f = this._mixin(!1, {}, c, {
                channel: a,
                data: b
            });
            G(f)
        };
        this.getStatus = function() {
            return A
        };
        this.isDisconnected = i;
        this.setBackoffIncrement = function(a) {
            n.backoffIncrement = a
        };
        this.getBackoffIncrement = function() {
            return n.backoffIncrement
        };
        this.getBackoffPeriod = function() {
            return p
        };
        this.resetBackOff = function() {
            p = 0
        };
        this.setLogLevel = function(a) {
            n.logLevel = a
        };
        this.registerExtension = function(a, b) {
            if (2 > arguments.length) throw "Illegal arguments number: required 2, got " + arguments.length;
            if (!d(a)) throw "Illegal argument type: extension name must be a string";
            for (var f = !1, g = 0; g < q.length; ++g)
                if (q[g].name === a) {
                    f = !0;
                    break
                }
            if (f) return this._info("Could not register extension with name", a, "since another extension with the same name already exists"), !1;
            q.push({
                name: a,
                extension: b
            });
            this._debug("Registered extension", a);
            c(b.registered) && b.registered(a, this);
            return !0
        };
        this.unregisterExtension = function(a) {
            if (!d(a)) throw "Illegal argument type: extension name must be a string";
            for (var b = !1, f = 0; f < q.length; ++f) {
                var g = q[f];
                if (g.name === a) {
                    q.splice(f, 1);
                    b = !0;
                    this._debug("Unregistered extension",
                        a);
                    a = g.extension;
                    c(a.unregistered) && a.unregistered();
                    break
                }
            }
            return b
        };
        this.getExtension = function(a) {
            for (var b = 0; b < q.length; ++b) {
                var c = q[b];
                if (c.name === a) return c.extension
            }
            return null
        };
        this.getName = function() {
            return aa
        };
        this.getClientId = function() {
            return B
        };
        this.getURL = function() {
            return n.url
        };
        this.getTransport = function() {
            return t
        };
        this.getConfiguration = function() {
            return this._mixin(!0, {}, n)
        };
        this.getAdvice = function() {
            return this._mixin(!0, {}, r)
        };
        org.cometd.WebSocket = window.WebSocket;
        if (!org.cometd.WebSocket) org.cometd.WebSocket =
            window.MozWebSocket
    };
    "undefined" != typeof dojo && dojo.provide("org.cometd.AckExtension");
    org.cometd.AckExtension = function() {
        var b, d = !1,
            c = -1;
        this.registered = function(a, c) {
            b = c;
            b._debug("AckExtension: executing registration callback", void 0)
        };
        this.unregistered = function() {
            b._debug("AckExtension: executing unregistration callback", void 0);
            b = null
        };
        this.incoming = function(a) {
            var j = a.channel;
            if ("/meta/handshake" == j) d = a.ext && a.ext.ack, b._debug("AckExtension: server supports acks", d);
            else if (d && "/meta/connect" == j && a.successful && (j = a.ext) && "number" === typeof j.ack) c = j.ack, b._debug("AckExtension: server sent ack id",
                c);
            return a
        };
        this.outgoing = function(a) {
            var j = a.channel;
            if ("/meta/handshake" == j) {
                if (!a.ext) a.ext = {};
                a.ext.ack = b && !1 !== b.ackEnabled;
                c = -1
            } else if (d && "/meta/connect" == j) {
                if (!a.ext) a.ext = {};
                a.ext.ack = c;
                b._debug("AckExtension: client sending ack id", c)
            }
            return a
        }
    };
    "undefined" != typeof dojo && dojo.provide("org.cometd.TimeSyncExtension");
    org.cometd.TimeSyncExtension = function(b) {
        var d, c = b && b.maxSamples || 10,
            a = [],
            j = [],
            h = 0,
            i = 0;
        this.registered = function(a, b) {
            d = b;
            d._debug("TimeSyncExtension: executing registration callback", void 0)
        };
        this.unregistered = function() {
            d._debug("TimeSyncExtension: executing unregistration callback", void 0);
            d = null;
            a = [];
            j = []
        };
        this.incoming = function(b) {
            var m = b.channel;
            if (m && 0 === m.indexOf("/meta/") && b.ext && b.ext.timesync) {
                var g = b.ext.timesync;
                d._debug("TimeSyncExtension: server sent timesync", g);
                m = ((new Date).getTime() -
                    g.tc - g.p) / 2;
                g = g.ts - g.tc - m;
                a.push(m);
                j.push(g);
                j.length > c && (j.shift(), a.shift());
                for (var m = j.length, l = g = 0, o = 0; o < m; ++o) g += a[o], l += j[o];
                h = parseInt((g / m).toFixed());
                i = parseInt((l / m).toFixed());
                d._debug("TimeSyncExtension: network lag", h)
            }
            return b
        };
        this.outgoing = function(a) {
            var b = a.channel;
            if (b && 0 === b.indexOf("/meta/")) {
                if (!a.ext) a.ext = {};
                a.ext.timesync = {
                    tc: (new Date).getTime(),
                    l: h,
                    o: i
                };
                b = org.cometd.JSON.toJSON(a.ext.timesync);
                d._debug("TimeSyncExtension: client sending timesync", b)
            }
            return a
        };
        this.getTimeOffset =
            function() {
                return i
            };
        this.getTimeOffsetSamples = function() {
            return j
        };
        this.getNetworkLag = function() {
            return h
        };
        this.getServerTime = function() {
            return (new Date).getTime() + i
        };
        this.getServerDate = function() {
            return new Date(this.getServerTime())
        };
        this.setTimeout = function(a, b) {
            var c = (b instanceof Date ? b.getTime() : 0 + b) - i - (new Date).getTime();
            0 >= c && (c = 1);
            return org.cometd.Utils.setTimeout(d, a, c)
        }
    };


    function aa() {
        return function(a) {
            return a
        }
    }

    function ba() {
        return function() {}
    }

    function ca(a) {
        return function(b) {
            this[a] = b
        }
    }

    function e(a) {
        return function() {
            return this[a]
        }
    }

    function l(a) {
        return function() {
            return a
        }
    }
    var n, da = da || {},
        q = this;

    function ea(a) {
        a = a.split(".");
        for (var b = q, c; c = a.shift();)
            if (null != b[c]) b = b[c];
            else return null;
        return b
    }

    function fa() {}

    function ga(a) {
        a.Ja = function() {
            return a.tq ? a.tq : a.tq = new a
        }
    }

    function ha(a) {
        var b = typeof a;
        if ("object" == b)
            if (a) {
                if (a instanceof Array) return "array";
                if (a instanceof Object) return b;
                var c = Object.prototype.toString.call(a);
                if ("[object Window]" == c) return "object";
                if ("[object Array]" == c || "number" == typeof a.length && "undefined" != typeof a.splice && "undefined" != typeof a.propertyIsEnumerable && !a.propertyIsEnumerable("splice")) return "array";
                if ("[object Function]" == c || "undefined" != typeof a.call && "undefined" != typeof a.propertyIsEnumerable && !a.propertyIsEnumerable("call")) return "function"
            } else return "null";
        else if ("function" == b && "undefined" == typeof a.call) return "object";
        return b
    }

    function t(a) {
        return void 0 !== a
    }

    function ia(a) {
        return "array" == ha(a)
    }

    function ja(a) {
        var b = ha(a);
        return "array" == b || "object" == b && "number" == typeof a.length
    }

    function v(a) {
        return "string" == typeof a
    }

    function ka(a) {
        return "number" == typeof a
    }

    function la(a) {
        return "function" == ha(a)
    }

    function ma(a) {
        var b = typeof a;
        return "object" == b && null != a || "function" == b
    }

    function na(a) {
        return a[oa] || (a[oa] = ++pa)
    }
    var oa = "closure_uid_" + (1E9 * Math.random() >>> 0),
        pa = 0;

    function qa(a, b, c) {
        return a.call.apply(a.bind, arguments)
    }

    function ra(a, b, c) {
        if (!a) throw Error();
        if (2 < arguments.length) {
            var d = Array.prototype.slice.call(arguments, 2);
            return function() {
                var c = Array.prototype.slice.call(arguments);
                Array.prototype.unshift.apply(c, d);
                return a.apply(b, c)
            }
        }
        return function() {
            return a.apply(b, arguments)
        }
    }

    function w(a, b, c) {
        w = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? qa : ra;
        return w.apply(null, arguments)
    }

    function sa(a, b) {
        var c = Array.prototype.slice.call(arguments, 1);
        return function() {
            var b = Array.prototype.slice.call(arguments);
            b.unshift.apply(b, c);
            return a.apply(this, b)
        }
    }
    var ta = Date.now || function() {
        return +new Date
    };

    function ua(a) {
        var b = {},
            c;
        for (c in b) {
            var d = ("" + b[c]).replace(/\$/g, "$$$$");
            a = a.replace(RegExp("\\{\\$" + c + "\\}", "gi"), d)
        }
        return a
    }

    function x(a, b) {
        var c = a.split("."),
            d = q;
        c[0] in d || !d.execScript || d.execScript("var " + c[0]);
        for (var f; c.length && (f = c.shift());) c.length || void 0 === b ? d = d[f] ? d[f] : d[f] = {} : d[f] = b
    }

    function y(a, b) {
        function c() {}
        c.prototype = b.prototype;
        a.c = b.prototype;
        a.prototype = new c;
        a.prototype.constructor = a
    };

    function va(a) {
        Error.captureStackTrace ? Error.captureStackTrace(this, va) : this.stack = Error().stack || "";
        a && (this.message = String(a))
    }
    y(va, Error);
    va.prototype.name = "CustomError";

    function wa(a, b) {
        return 0 == a.lastIndexOf(b, 0)
    }

    function xa(a, b) {
        var c = a.length - b.length;
        return 0 <= c && a.indexOf(b, c) == c
    }

    function ya(a, b) {
        for (var c = a.split("%s"), d = "", f = Array.prototype.slice.call(arguments, 1); f.length && 1 < c.length;) d += c.shift() + f.shift();
        return d + c.join("%s")
    }

    function za(a) {
        return a.replace(/[\s\xa0]+/g, " ").replace(/^\s+|\s+$/g, "")
    }

    function Aa(a) {
        return /^[\s\xa0]*$/.test(a)
    }

    function Ba(a) {
        return a.replace(/[\t\r\n ]+/g, " ").replace(/^[\t\r\n ]+|[\t\r\n ]+$/g, "")
    }

    function Ca(a) {
        return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g, "")
    }

    function Da(a) {
        return a.replace(/[\s\xa0]+$/, "")
    }

    function Ea(a) {
        return decodeURIComponent(a.replace(/\+/g, " "))
    }

    function Fa(a) {
        if (!Ga.test(a)) return a; - 1 != a.indexOf("\x26") && (a = a.replace(Ha, "\x26amp;")); - 1 != a.indexOf("\x3c") && (a = a.replace(Ia, "\x26lt;")); - 1 != a.indexOf("\x3e") && (a = a.replace(Ja, "\x26gt;")); - 1 != a.indexOf('"') && (a = a.replace(Ka, "\x26quot;"));
        return a
    }
    var Ha = /&/g,
        Ia = /</g,
        Ja = />/g,
        Ka = /\"/g,
        Ga = /[&<>\"]/;

    function La(a) {
        return -1 != a.indexOf("\x26") ? "document" in q ? Ma(a) : Oa(a) : a
    }

    function Ma(a) {
        var b = {
                "\x26amp;": "\x26",
                "\x26lt;": "\x3c",
                "\x26gt;": "\x3e",
                "\x26quot;": '"'
            },
            c = document.createElement("div");
        return a.replace(Pa, function(a, f) {
            var g = b[a];
            if (g) return g;
            if ("#" == f.charAt(0)) {
                var h = Number("0" + f.substr(1));
                isNaN(h) || (g = String.fromCharCode(h))
            }
            g || (c.innerHTML = a + " ", g = c.firstChild.nodeValue.slice(0, -1));
            return b[a] = g
        })
    }

    function Oa(a) {
        return a.replace(/&([^;]+);/g, function(a, c) {
            switch (c) {
                case "amp":
                    return "\x26";
                case "lt":
                    return "\x3c";
                case "gt":
                    return "\x3e";
                case "quot":
                    return '"';
                default:
                    if ("#" == c.charAt(0)) {
                        var d = Number("0" + c.substr(1));
                        if (!isNaN(d)) return String.fromCharCode(d)
                    }
                    return a
            }
        })
    }
    var Pa = /&([^;\s<&]+);?/g;

    function Qa(a, b) {
        for (var c = b.length, d = 0; d < c; d++) {
            var f = 1 == c ? b : b.charAt(d);
            if (a.charAt(0) == f && a.charAt(a.length - 1) == f) return a.substring(1, a.length - 1)
        }
        return a
    }

    function Ra(a, b) {
        var c = RegExp(Sa(b), "");
        return a.replace(c, "")
    }

    function Sa(a) {
        return String(a).replace(/([-()\[\]{}+?*.$\^|,:#<!\\])/g, "\\$1").replace(/\x08/g, "\\x08")
    }

    function Ta(a, b) {
        return Array(b + 1).join(a)
    }

    function Ua(a, b) {
        var c = t(void 0) ? a.toFixed(void 0) : String(a),
            d = c.indexOf("."); - 1 == d && (d = c.length);
        return Ta("0", Math.max(0, b - d)) + c
    }

    function Va(a) {
        return null == a ? "" : String(a)
    }

    function Wa(a, b) {
        for (var c = 0, d = Ca(String(a)).split("."), f = Ca(String(b)).split("."), g = Math.max(d.length, f.length), h = 0; 0 == c && h < g; h++) {
            var k = d[h] || "",
                m = f[h] || "",
                p = RegExp("(\\d*)(\\D*)", "g"),
                r = RegExp("(\\d*)(\\D*)", "g");
            do {
                var s = p.exec(k) || ["", "", ""],
                    u = r.exec(m) || ["", "", ""];
                if (0 == s[0].length && 0 == u[0].length) break;
                c = ((0 == s[1].length ? 0 : parseInt(s[1], 10)) < (0 == u[1].length ? 0 : parseInt(u[1], 10)) ? -1 : (0 == s[1].length ? 0 : parseInt(s[1], 10)) > (0 == u[1].length ? 0 : parseInt(u[1], 10)) ? 1 : 0) || ((0 == s[2].length) < (0 == u[2].length) ?
                    -1 : (0 == s[2].length) > (0 == u[2].length) ? 1 : 0) || (s[2] < u[2] ? -1 : s[2] > u[2] ? 1 : 0)
            } while (0 == c)
        }
        return c
    }

    function Xa(a) {
        return String(a).replace(/\-([a-z])/g, function(a, c) {
            return c.toUpperCase()
        })
    }

    function Ya(a) {
        var b = v(void 0) ? Sa(void 0) : "\\s";
        return a.replace(RegExp("(^" + (b ? "|[" + b + "]+" : "") + ")([a-z])", "g"), function(a, b, f) {
            return b + f.toUpperCase()
        })
    };

    function Za(a, b) {
        null != a && this.append.apply(this, arguments)
    }
    n = Za.prototype;
    n.Ze = "";
    n.set = function(a) {
        this.Ze = "" + a
    };
    n.append = function(a, b, c) {
        this.Ze += a;
        if (null != b)
            for (var d = 1; d < arguments.length; d++) this.Ze += arguments[d];
        return this
    };
    n.clear = function() {
        this.Ze = ""
    };
    n.toString = e("Ze");
    var $a = Array.prototype,
        ab = $a.indexOf ? function(a, b, c) {
            return $a.indexOf.call(a, b, c)
        } : function(a, b, c) {
            c = null == c ? 0 : 0 > c ? Math.max(0, a.length + c) : c;
            if (v(a)) return v(b) && 1 == b.length ? a.indexOf(b, c) : -1;
            for (; c < a.length; c++)
                if (c in a && a[c] === b) return c;
            return -1
        },
        z = $a.forEach ? function(a, b, c) {
            $a.forEach.call(a, b, c)
        } : function(a, b, c) {
            for (var d = a.length, f = v(a) ? a.split("") : a, g = 0; g < d; g++) g in f && b.call(c, f[g], g, a)
        },
        bb = $a.filter ? function(a, b, c) {
            return $a.filter.call(a, b, c)
        } : function(a, b, c) {
            for (var d = a.length, f = [], g =
                    0, h = v(a) ? a.split("") : a, k = 0; k < d; k++)
                if (k in h) {
                    var m = h[k];
                    b.call(c, m, k, a) && (f[g++] = m)
                }
            return f
        },
        cb = $a.map ? function(a, b, c) {
            return $a.map.call(a, b, c)
        } : function(a, b, c) {
            for (var d = a.length, f = Array(d), g = v(a) ? a.split("") : a, h = 0; h < d; h++) h in g && (f[h] = b.call(c, g[h], h, a));
            return f
        },
        db = $a.some ? function(a, b, c) {
            return $a.some.call(a, b, c)
        } : function(a, b, c) {
            for (var d = a.length, f = v(a) ? a.split("") : a, g = 0; g < d; g++)
                if (g in f && b.call(c, f[g], g, a)) return !0;
            return !1
        },
        eb = $a.every ? function(a, b, c) {
            return $a.every.call(a, b, c)
        } : function(a,
            b, c) {
            for (var d = a.length, f = v(a) ? a.split("") : a, g = 0; g < d; g++)
                if (g in f && !b.call(c, f[g], g, a)) return !1;
            return !0
        };

    function fb(a, b, c) {
        b = gb(a, b, c);
        return 0 > b ? null : v(a) ? a.charAt(b) : a[b]
    }

    function gb(a, b, c) {
        for (var d = a.length, f = v(a) ? a.split("") : a, g = 0; g < d; g++)
            if (g in f && b.call(c, f[g], g, a)) return g;
        return -1
    }

    function hb(a, b) {
        return 0 <= ab(a, b)
    }

    function ib(a) {
        if (!ia(a))
            for (var b = a.length - 1; 0 <= b; b--) delete a[b];
        a.length = 0
    }

    function jb(a, b) {
        hb(a, b) || a.push(b)
    }

    function kb(a, b) {
        var c = ab(a, b),
            d;
        (d = 0 <= c) && lb(a, c);
        return d
    }

    function lb(a, b) {
        $a.splice.call(a, b, 1)
    }

    function mb(a) {
        return $a.concat.apply($a, arguments)
    }

    function ob(a) {
        var b = a.length;
        if (0 < b) {
            for (var c = Array(b), d = 0; d < b; d++) c[d] = a[d];
            return c
        }
        return []
    }

    function pb(a, b) {
        for (var c = 1; c < arguments.length; c++) {
            var d = arguments[c],
                f;
            if (ia(d) || (f = ja(d)) && Object.prototype.hasOwnProperty.call(d, "callee")) a.push.apply(a, d);
            else if (f)
                for (var g = a.length, h = d.length, k = 0; k < h; k++) a[g + k] = d[k];
            else a.push(d)
        }
    }

    function qb(a, b, c, d) {
        $a.splice.apply(a, rb(arguments, 1))
    }

    function rb(a, b, c) {
        return 2 >= arguments.length ? $a.slice.call(a, b) : $a.slice.call(a, b, c)
    }

    function sb(a, b) {
        return a > b ? 1 : a < b ? -1 : 0
    };

    function tb(a) {
        return cb(a, function(a) {
            a = a.toString(16);
            return 1 < a.length ? a : "0" + a
        }).join("")
    };
    var ub, vb, wb, xb, yb, zb;

    function Ab() {
        return q.navigator ? q.navigator.userAgent : null
    }

    function Bb() {
        return q.navigator
    }
    yb = xb = wb = vb = ub = !1;
    var Cb;
    if (Cb = Ab()) {
        var Db = Bb();
        ub = wa(Cb, "Opera");
        vb = !ub && (-1 != Cb.indexOf("MSIE") || -1 != Cb.indexOf("Trident"));
        xb = (wb = !ub && -1 != Cb.indexOf("WebKit")) && -1 != Cb.indexOf("Mobile");
        yb = !ub && !wb && !vb && "Gecko" == Db.product
    }
    var Eb = ub,
        A = vb,
        B = yb,
        C = wb,
        Fb = xb,
        Gb = Bb();
    zb = -1 != (Gb && Gb.platform || "").indexOf("Mac");
    var Hb = !!Bb() && -1 != (Bb().appVersion || "").indexOf("X11");

    function Ib() {
        var a = q.document;
        return a ? a.documentMode : void 0
    }
    var Jb;
    a: {
        var Kb = "",
            Lb;
        if (Eb && q.opera) var Mb = q.opera.version,
            Kb = "function" == typeof Mb ? Mb() : Mb;
        else if (B ? Lb = /rv\:([^\);]+)(\)|;)/ : A ? Lb = /\b(?:MSIE|rv)\s+([^\);]+)(\)|;)/ : C && (Lb = /WebKit\/(\S+)/), Lb) var Nb = Lb.exec(Ab()),
            Kb = Nb ? Nb[1] : "";
        if (A) {
            var Ob = Ib();
            if (Ob > parseFloat(Kb)) {
                Jb = String(Ob);
                break a
            }
        }
        Jb = Kb
    }
    var Pb = {};

    function D(a) {
        return Pb[a] || (Pb[a] = 0 <= Wa(Jb, a))
    }

    function Qb(a) {
        return A && Rb >= a
    }
    var Sb = q.document,
        Rb = Sb && A ? Ib() || ("CSS1Compat" == Sb.compatMode ? parseInt(Jb, 10) : 5) : void 0;
    var Tb = null,
        Ub = null,
        Vb = null;

    function Wb() {
        if (!Tb) {
            Tb = {};
            Ub = {};
            Vb = {};
            for (var a = 0; 65 > a; a++) Tb[a] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/\x3d".charAt(a), Ub[a] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_.".charAt(a), Vb[Ub[a]] = a
        }
    };

    function Xb() {};

    function Yb() {
        this.wb = Array(4);
        this.et = Array(64);
        this.hl = this.ih = 0;
        this.reset()
    }
    y(Yb, Xb);
    Yb.prototype.reset = function() {
        this.wb[0] = 1732584193;
        this.wb[1] = 4023233417;
        this.wb[2] = 2562383102;
        this.wb[3] = 271733878;
        this.hl = this.ih = 0
    };

    function Zb(a, b, c) {
        c || (c = 0);
        var d = Array(16);
        if (v(b))
            for (var f = 0; 16 > f; ++f) d[f] = b.charCodeAt(c++) | b.charCodeAt(c++) << 8 | b.charCodeAt(c++) << 16 | b.charCodeAt(c++) << 24;
        else
            for (f = 0; 16 > f; ++f) d[f] = b[c++] | b[c++] << 8 | b[c++] << 16 | b[c++] << 24;
        b = a.wb[0];
        c = a.wb[1];
        var f = a.wb[2],
            g = a.wb[3],
            h = 0,
            h = b + (g ^ c & (f ^ g)) + d[0] + 3614090360 & 4294967295;
        b = c + (h << 7 & 4294967295 | h >>> 25);
        h = g + (f ^ b & (c ^ f)) + d[1] + 3905402710 & 4294967295;
        g = b + (h << 12 & 4294967295 | h >>> 20);
        h = f + (c ^ g & (b ^ c)) + d[2] + 606105819 & 4294967295;
        f = g + (h << 17 & 4294967295 | h >>> 15);
        h = c + (b ^ f &
            (g ^ b)) + d[3] + 3250441966 & 4294967295;
        c = f + (h << 22 & 4294967295 | h >>> 10);
        h = b + (g ^ c & (f ^ g)) + d[4] + 4118548399 & 4294967295;
        b = c + (h << 7 & 4294967295 | h >>> 25);
        h = g + (f ^ b & (c ^ f)) + d[5] + 1200080426 & 4294967295;
        g = b + (h << 12 & 4294967295 | h >>> 20);
        h = f + (c ^ g & (b ^ c)) + d[6] + 2821735955 & 4294967295;
        f = g + (h << 17 & 4294967295 | h >>> 15);
        h = c + (b ^ f & (g ^ b)) + d[7] + 4249261313 & 4294967295;
        c = f + (h << 22 & 4294967295 | h >>> 10);
        h = b + (g ^ c & (f ^ g)) + d[8] + 1770035416 & 4294967295;
        b = c + (h << 7 & 4294967295 | h >>> 25);
        h = g + (f ^ b & (c ^ f)) + d[9] + 2336552879 & 4294967295;
        g = b + (h << 12 & 4294967295 | h >>> 20);
        h =
            f + (c ^ g & (b ^ c)) + d[10] + 4294925233 & 4294967295;
        f = g + (h << 17 & 4294967295 | h >>> 15);
        h = c + (b ^ f & (g ^ b)) + d[11] + 2304563134 & 4294967295;
        c = f + (h << 22 & 4294967295 | h >>> 10);
        h = b + (g ^ c & (f ^ g)) + d[12] + 1804603682 & 4294967295;
        b = c + (h << 7 & 4294967295 | h >>> 25);
        h = g + (f ^ b & (c ^ f)) + d[13] + 4254626195 & 4294967295;
        g = b + (h << 12 & 4294967295 | h >>> 20);
        h = f + (c ^ g & (b ^ c)) + d[14] + 2792965006 & 4294967295;
        f = g + (h << 17 & 4294967295 | h >>> 15);
        h = c + (b ^ f & (g ^ b)) + d[15] + 1236535329 & 4294967295;
        c = f + (h << 22 & 4294967295 | h >>> 10);
        h = b + (f ^ g & (c ^ f)) + d[1] + 4129170786 & 4294967295;
        b = c + (h << 5 & 4294967295 |
            h >>> 27);
        h = g + (c ^ f & (b ^ c)) + d[6] + 3225465664 & 4294967295;
        g = b + (h << 9 & 4294967295 | h >>> 23);
        h = f + (b ^ c & (g ^ b)) + d[11] + 643717713 & 4294967295;
        f = g + (h << 14 & 4294967295 | h >>> 18);
        h = c + (g ^ b & (f ^ g)) + d[0] + 3921069994 & 4294967295;
        c = f + (h << 20 & 4294967295 | h >>> 12);
        h = b + (f ^ g & (c ^ f)) + d[5] + 3593408605 & 4294967295;
        b = c + (h << 5 & 4294967295 | h >>> 27);
        h = g + (c ^ f & (b ^ c)) + d[10] + 38016083 & 4294967295;
        g = b + (h << 9 & 4294967295 | h >>> 23);
        h = f + (b ^ c & (g ^ b)) + d[15] + 3634488961 & 4294967295;
        f = g + (h << 14 & 4294967295 | h >>> 18);
        h = c + (g ^ b & (f ^ g)) + d[4] + 3889429448 & 4294967295;
        c = f + (h << 20 & 4294967295 |
            h >>> 12);
        h = b + (f ^ g & (c ^ f)) + d[9] + 568446438 & 4294967295;
        b = c + (h << 5 & 4294967295 | h >>> 27);
        h = g + (c ^ f & (b ^ c)) + d[14] + 3275163606 & 4294967295;
        g = b + (h << 9 & 4294967295 | h >>> 23);
        h = f + (b ^ c & (g ^ b)) + d[3] + 4107603335 & 4294967295;
        f = g + (h << 14 & 4294967295 | h >>> 18);
        h = c + (g ^ b & (f ^ g)) + d[8] + 1163531501 & 4294967295;
        c = f + (h << 20 & 4294967295 | h >>> 12);
        h = b + (f ^ g & (c ^ f)) + d[13] + 2850285829 & 4294967295;
        b = c + (h << 5 & 4294967295 | h >>> 27);
        h = g + (c ^ f & (b ^ c)) + d[2] + 4243563512 & 4294967295;
        g = b + (h << 9 & 4294967295 | h >>> 23);
        h = f + (b ^ c & (g ^ b)) + d[7] + 1735328473 & 4294967295;
        f = g + (h << 14 & 4294967295 |
            h >>> 18);
        h = c + (g ^ b & (f ^ g)) + d[12] + 2368359562 & 4294967295;
        c = f + (h << 20 & 4294967295 | h >>> 12);
        h = b + (c ^ f ^ g) + d[5] + 4294588738 & 4294967295;
        b = c + (h << 4 & 4294967295 | h >>> 28);
        h = g + (b ^ c ^ f) + d[8] + 2272392833 & 4294967295;
        g = b + (h << 11 & 4294967295 | h >>> 21);
        h = f + (g ^ b ^ c) + d[11] + 1839030562 & 4294967295;
        f = g + (h << 16 & 4294967295 | h >>> 16);
        h = c + (f ^ g ^ b) + d[14] + 4259657740 & 4294967295;
        c = f + (h << 23 & 4294967295 | h >>> 9);
        h = b + (c ^ f ^ g) + d[1] + 2763975236 & 4294967295;
        b = c + (h << 4 & 4294967295 | h >>> 28);
        h = g + (b ^ c ^ f) + d[4] + 1272893353 & 4294967295;
        g = b + (h << 11 & 4294967295 | h >>> 21);
        h = f + (g ^
            b ^ c) + d[7] + 4139469664 & 4294967295;
        f = g + (h << 16 & 4294967295 | h >>> 16);
        h = c + (f ^ g ^ b) + d[10] + 3200236656 & 4294967295;
        c = f + (h << 23 & 4294967295 | h >>> 9);
        h = b + (c ^ f ^ g) + d[13] + 681279174 & 4294967295;
        b = c + (h << 4 & 4294967295 | h >>> 28);
        h = g + (b ^ c ^ f) + d[0] + 3936430074 & 4294967295;
        g = b + (h << 11 & 4294967295 | h >>> 21);
        h = f + (g ^ b ^ c) + d[3] + 3572445317 & 4294967295;
        f = g + (h << 16 & 4294967295 | h >>> 16);
        h = c + (f ^ g ^ b) + d[6] + 76029189 & 4294967295;
        c = f + (h << 23 & 4294967295 | h >>> 9);
        h = b + (c ^ f ^ g) + d[9] + 3654602809 & 4294967295;
        b = c + (h << 4 & 4294967295 | h >>> 28);
        h = g + (b ^ c ^ f) + d[12] + 3873151461 & 4294967295;
        g = b + (h << 11 & 4294967295 | h >>> 21);
        h = f + (g ^ b ^ c) + d[15] + 530742520 & 4294967295;
        f = g + (h << 16 & 4294967295 | h >>> 16);
        h = c + (f ^ g ^ b) + d[2] + 3299628645 & 4294967295;
        c = f + (h << 23 & 4294967295 | h >>> 9);
        h = b + (f ^ (c | ~g)) + d[0] + 4096336452 & 4294967295;
        b = c + (h << 6 & 4294967295 | h >>> 26);
        h = g + (c ^ (b | ~f)) + d[7] + 1126891415 & 4294967295;
        g = b + (h << 10 & 4294967295 | h >>> 22);
        h = f + (b ^ (g | ~c)) + d[14] + 2878612391 & 4294967295;
        f = g + (h << 15 & 4294967295 | h >>> 17);
        h = c + (g ^ (f | ~b)) + d[5] + 4237533241 & 4294967295;
        c = f + (h << 21 & 4294967295 | h >>> 11);
        h = b + (f ^ (c | ~g)) + d[12] + 1700485571 & 4294967295;
        b = c +
            (h << 6 & 4294967295 | h >>> 26);
        h = g + (c ^ (b | ~f)) + d[3] + 2399980690 & 4294967295;
        g = b + (h << 10 & 4294967295 | h >>> 22);
        h = f + (b ^ (g | ~c)) + d[10] + 4293915773 & 4294967295;
        f = g + (h << 15 & 4294967295 | h >>> 17);
        h = c + (g ^ (f | ~b)) + d[1] + 2240044497 & 4294967295;
        c = f + (h << 21 & 4294967295 | h >>> 11);
        h = b + (f ^ (c | ~g)) + d[8] + 1873313359 & 4294967295;
        b = c + (h << 6 & 4294967295 | h >>> 26);
        h = g + (c ^ (b | ~f)) + d[15] + 4264355552 & 4294967295;
        g = b + (h << 10 & 4294967295 | h >>> 22);
        h = f + (b ^ (g | ~c)) + d[6] + 2734768916 & 4294967295;
        f = g + (h << 15 & 4294967295 | h >>> 17);
        h = c + (g ^ (f | ~b)) + d[13] + 1309151649 & 4294967295;
        c = f + (h << 21 & 4294967295 | h >>> 11);
        h = b + (f ^ (c | ~g)) + d[4] + 4149444226 & 4294967295;
        b = c + (h << 6 & 4294967295 | h >>> 26);
        h = g + (c ^ (b | ~f)) + d[11] + 3174756917 & 4294967295;
        g = b + (h << 10 & 4294967295 | h >>> 22);
        h = f + (b ^ (g | ~c)) + d[2] + 718787259 & 4294967295;
        f = g + (h << 15 & 4294967295 | h >>> 17);
        h = c + (g ^ (f | ~b)) + d[9] + 3951481745 & 4294967295;
        a.wb[0] = a.wb[0] + b & 4294967295;
        a.wb[1] = a.wb[1] + (f + (h << 21 & 4294967295 | h >>> 11)) & 4294967295;
        a.wb[2] = a.wb[2] + f & 4294967295;
        a.wb[3] = a.wb[3] + g & 4294967295
    }
    Yb.prototype.update = function(a, b) {
        t(b) || (b = a.length);
        for (var c = b - 64, d = this.et, f = this.ih, g = 0; g < b;) {
            if (0 == f)
                for (; g <= c;) Zb(this, a, g), g += 64;
            if (v(a))
                for (; g < b;) {
                    if (d[f++] = a.charCodeAt(g++), 64 == f) {
                        Zb(this, d);
                        f = 0;
                        break
                    }
                } else
                    for (; g < b;)
                        if (d[f++] = a[g++], 64 == f) {
                            Zb(this, d);
                            f = 0;
                            break
                        }
        }
        this.ih = f;
        this.hl += b
    };

    function $b(a) {
        a = String(a);
        if (/^\s*$/.test(a) ? 0 : /^[\],:{}\s\u2028\u2029]*$/.test(a.replace(/\\["\\\/bfnrtu]/g, "@").replace(/"[^"\\\n\r\u2028\u2029\x00-\x08\x0a-\x1f]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:[\s\u2028\u2029]*\[)+/g, ""))) try {
            return eval("(" + a + ")")
        } catch (b) {}
        throw Error("Invalid JSON string: " + a);
    }

    function ac(a, b) {
        return (new bc(b)).Fa(a)
    }

    function bc(a) {
        this.Ok = a
    }
    bc.prototype.Fa = function(a) {
        var b = [];
        cc(this, a, b);
        return b.join("")
    };

    function cc(a, b, c) {
        switch (typeof b) {
            case "string":
                dc(b, c);
                break;
            case "number":
                c.push(isFinite(b) && !isNaN(b) ? b : "null");
                break;
            case "boolean":
                c.push(b);
                break;
            case "undefined":
                c.push("null");
                break;
            case "object":
                if (null == b) {
                    c.push("null");
                    break
                }
                if (ia(b)) {
                    var d = b.length;
                    c.push("[");
                    for (var f = "", g = 0; g < d; g++) c.push(f), f = b[g], cc(a, a.Ok ? a.Ok.call(b, String(g), f) : f, c), f = ",";
                    c.push("]");
                    break
                }
                c.push("{");
                d = "";
                for (g in b) Object.prototype.hasOwnProperty.call(b, g) && (f = b[g], "function" != typeof f && (c.push(d), dc(g, c),
                    c.push(":"), cc(a, a.Ok ? a.Ok.call(b, g, f) : f, c), d = ","));
                c.push("}");
                break;
            case "function":
                break;
            default:
                throw Error("Unknown type: " + typeof b);
        }
    }
    var ec = {
            '"': '\\"',
            "\\": "\\\\",
            "/": "\\/",
            "\b": "\\b",
            "\f": "\\f",
            "\n": "\\n",
            "\r": "\\r",
            "\t": "\\t",
            "\x0B": "\\u000b"
        },
        fc = /\uffff/.test("???") ? /[\\\"\x00-\x1f\x7f-\uffff]/g : /[\\\"\x00-\x1f\x7f-\xff]/g;

    function dc(a, b) {
        b.push('"', a.replace(fc, function(a) {
            if (a in ec) return ec[a];
            var b = a.charCodeAt(0),
                f = "\\u";
            16 > b ? f += "000" : 256 > b ? f += "00" : 4096 > b && (f += "0");
            return ec[a] = f + b.toString(16)
        }), '"')
    };

    function gc(a) {
        return function() {
            return a
        }
    }
    var hc = gc(!1);

    function ic(a) {
        return function() {
            throw a;
        }
    };
    /*
     Portions of this code are from MochiKit, received by
     The Closure Authors under the MIT license. All other code is Copyright
     2005-2009 The Closure Authors. All Rights Reserved.
    */
    function jc(a, b) {
        this.Uk = [];
        this.Wq = a;
        this.yp = b || null
    }
    n = jc.prototype;
    n.Mc = !1;
    n.Mh = !1;
    n.Jl = !1;
    n.ft = !1;
    n.ro = !1;
    n.Ll = 0;
    n.cancel = function(a) {
        if (this.Mc) this.Bi instanceof jc && this.Bi.cancel();
        else {
            if (this.wa) {
                var b = this.wa;
                delete this.wa;
                a ? b.cancel(a) : (b.Ll--, 0 >= b.Ll && b.cancel())
            }
            this.Wq ? this.Wq.call(this.yp, this) : this.ro = !0;
            this.Mc || this.ma(new kc(this))
        }
    };
    n.np = function(a, b) {
        this.Jl = !1;
        lc(this, a, b)
    };

    function lc(a, b, c) {
        a.Mc = !0;
        a.Bi = c;
        a.Mh = !b;
        mc(a)
    }
    n.Gc = function() {
        if (this.Mc) {
            if (!this.ro) throw new nc(this);
            this.ro = !1
        }
    };
    n.aa = function(a) {
        this.Gc();
        lc(this, !0, a)
    };
    n.ma = function(a) {
        this.Gc();
        lc(this, !1, a)
    };
    n.Xf = function(a, b) {
        return oc(this, a, null, b)
    };
    n.zl = function(a, b) {
        return oc(this, null, a, b)
    };
    n.Us = function(a, b) {
        return oc(this, a, a, b)
    };

    function oc(a, b, c, d) {
        a.Uk.push([b, c, d]);
        a.Mc && mc(a);
        return a
    }

    function pc(a) {
        return db(a.Uk, function(a) {
            return la(a[1])
        })
    }

    function mc(a) {
        a.Go && (a.Mc && pc(a)) && (q.clearTimeout(a.Go), delete a.Go);
        a.wa && (a.wa.Ll--, delete a.wa);
        for (var b = a.Bi, c = !1, d = !1; a.Uk.length && !a.Jl;) {
            var f = a.Uk.shift(),
                g = f[0],
                h = f[1],
                f = f[2];
            if (g = a.Mh ? h : g) try {
                var k = g.call(f || a.yp, b);
                t(k) && (a.Mh = a.Mh && (k == b || k instanceof Error), a.Bi = b = k);
                b instanceof jc && (d = !0, a.Jl = !0)
            } catch (m) {
                b = m, a.Mh = !0, pc(a) || (c = !0)
            }
        }
        a.Bi = b;
        d && (oc(b, w(a.np, a, !0), w(a.np, a, !1)), b.ft = !0);
        c && (a.Go = q.setTimeout(ic(b), 0))
    }

    function qc(a) {
        var b = new jc;
        b.aa(a);
        return b
    }

    function nc(a) {
        va.call(this);
        this.rt = a
    }
    y(nc, va);
    nc.prototype.message = "Deferred has already fired";
    nc.prototype.name = "AlreadyCalledError";

    function kc(a) {
        va.call(this);
        this.rt = a
    }
    y(kc, va);
    kc.prototype.message = "Deferred was canceled";
    kc.prototype.name = "CanceledError";
    var rc, sc = !A || Qb(9),
        tc = !B && !A || A && Qb(9) || B && D("1.9.1"),
        uc = A && !D("9"),
        vc = A || Eb || C;

    function wc(a, b) {
        a.className = b
    }

    function xc(a) {
        a = a.className;
        return v(a) && a.match(/\S+/g) || []
    }

    function yc(a, b) {
        for (var c = xc(a), d = rb(arguments, 1), f = c.length + d.length, g = c, h = 0; h < d.length; h++) hb(g, d[h]) || g.push(d[h]);
        g = c.join(" ");
        a.className = g;
        return c.length == f
    }

    function zc(a, b) {
        var c = xc(a),
            d = rb(arguments, 1),
            f = Ac(c, d),
            g = f.join(" ");
        a.className = g;
        return f.length == c.length - d.length
    }

    function Ac(a, b) {
        return bb(a, function(a) {
            return !hb(b, a)
        })
    }

    function Bc(a, b, c) {
        for (var d = xc(a), f = !1, g = 0; g < d.length; g++) d[g] == b && (qb(d, g--, 1), f = !0);
        f && (d.push(c), b = d.join(" "), a.className = b)
    }

    function Dc(a, b, c) {
        c ? yc(a, b) : zc(a, b)
    };

    function E(a, b) {
        this.x = t(a) ? a : 0;
        this.y = t(b) ? b : 0
    }
    E.prototype.ib = function() {
        return new E(this.x, this.y)
    };

    function Ec(a, b) {
        return new E(a.x - b.x, a.y - b.y)
    }
    E.prototype.ceil = function() {
        this.x = Math.ceil(this.x);
        this.y = Math.ceil(this.y);
        return this
    };
    E.prototype.floor = function() {
        this.x = Math.floor(this.x);
        this.y = Math.floor(this.y);
        return this
    };
    E.prototype.round = function() {
        this.x = Math.round(this.x);
        this.y = Math.round(this.y);
        return this
    };

    function Fc(a, b) {
        this.width = a;
        this.height = b
    }

    function Gc(a, b) {
        return a == b ? !0 : a && b ? a.width == b.width && a.height == b.height : !1
    }
    Fc.prototype.ib = function() {
        return new Fc(this.width, this.height)
    };
    Fc.prototype.ceil = function() {
        this.width = Math.ceil(this.width);
        this.height = Math.ceil(this.height);
        return this
    };
    Fc.prototype.floor = function() {
        this.width = Math.floor(this.width);
        this.height = Math.floor(this.height);
        return this
    };
    Fc.prototype.round = function() {
        this.width = Math.round(this.width);
        this.height = Math.round(this.height);
        return this
    };

    function Hc(a, b, c) {
        for (var d in a) b.call(c, a[d], d, a)
    }

    function Ic(a) {
        var b = 0,
            c;
        for (c in a) b++;
        return b
    }

    function Jc(a) {
        var b = [],
            c = 0,
            d;
        for (d in a) b[c++] = a[d];
        return b
    }

    function Kc(a) {
        var b = [],
            c = 0,
            d;
        for (d in a) b[c++] = d;
        return b
    }

    function Lc(a, b) {
        for (var c in a)
            if (a[c] == b) return !0;
        return !1
    }

    function Mc(a) {
        for (var b in a) return !1;
        return !0
    }

    function Nc(a, b) {
        b in a && delete a[b]
    }

    function Oc(a, b, c) {
        if (b in a) throw Error('The object already contains the key "' + b + '"');
        a[b] = c
    }

    function Pc(a) {
        var b = {},
            c;
        for (c in a) b[c] = a[c];
        return b
    }
    var Qc = "constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");

    function Rc(a, b) {
        for (var c, d, f = 1; f < arguments.length; f++) {
            d = arguments[f];
            for (c in d) a[c] = d[c];
            for (var g = 0; g < Qc.length; g++) c = Qc[g], Object.prototype.hasOwnProperty.call(d, c) && (a[c] = d[c])
        }
    }

    function Sc(a) {
        var b = arguments.length;
        if (1 == b && ia(arguments[0])) return Sc.apply(null, arguments[0]);
        if (b % 2) throw Error("Uneven number of arguments");
        for (var c = {}, d = 0; d < b; d += 2) c[arguments[d]] = arguments[d + 1];
        return c
    };

    function Tc(a) {
        return a ? new Uc(Vc(a)) : rc || (rc = new Uc)
    }

    function Wc(a, b, c, d) {
        a = d || a;
        b = b && "*" != b ? b.toUpperCase() : "";
        if (a.querySelectorAll && a.querySelector && (b || c)) return a.querySelectorAll(b + (c ? "." + c : ""));
        if (c && a.getElementsByClassName) {
            a = a.getElementsByClassName(c);
            if (b) {
                d = {};
                for (var f = 0, g = 0, h; h = a[g]; g++) b == h.nodeName && (d[f++] = h);
                d.length = f;
                return d
            }
            return a
        }
        a = a.getElementsByTagName(b || "*");
        if (c) {
            d = {};
            for (g = f = 0; h = a[g]; g++) b = h.className, "function" == typeof b.split && hb(b.split(/\s+/), c) && (d[f++] = h);
            d.length = f;
            return d
        }
        return a
    }

    function Xc(a, b) {
        Hc(b, function(b, d) {
            "style" == d ? a.style.cssText = b : "class" == d ? a.className = b : "for" == d ? a.htmlFor = b : d in Yc ? a.setAttribute(Yc[d], b) : wa(d, "aria-") || wa(d, "data-") ? a.setAttribute(d, b) : a[d] = b
        })
    }
    var Yc = {
        cellpadding: "cellPadding",
        cellspacing: "cellSpacing",
        colspan: "colSpan",
        frameborder: "frameBorder",
        height: "height",
        maxlength: "maxLength",
        role: "role",
        rowspan: "rowSpan",
        type: "type",
        usemap: "useMap",
        valign: "vAlign",
        width: "width"
    };

    function Zc(a) {
        a = (a || window).document;
        a = "CSS1Compat" == a.compatMode ? a.documentElement : a.body;
        return new Fc(a.clientWidth, a.clientHeight)
    }

    function $c(a) {
        return C || "CSS1Compat" != a.compatMode ? a.body : a.documentElement
    }

    function ad(a) {
        return a ? a.parentWindow || a.defaultView : window
    }

    function bd(a, b, c) {
        return cd(document, arguments)
    }

    function cd(a, b) {
        var c = b[0],
            d = b[1];
        if (!sc && d && (d.name || d.type)) {
            c = ["\x3c", c];
            d.name && c.push(' name\x3d"', Fa(d.name), '"');
            if (d.type) {
                c.push(' type\x3d"', Fa(d.type), '"');
                var f = {};
                Rc(f, d);
                delete f.type;
                d = f
            }
            c.push("\x3e");
            c = c.join("")
        }
        c = a.createElement(c);
        d && (v(d) ? c.className = d : ia(d) ? yc.apply(null, [c].concat(d)) : Xc(c, d));
        2 < b.length && dd(a, c, b, 2);
        return c
    }

    function dd(a, b, c, d) {
        function f(c) {
            c && b.appendChild(v(c) ? a.createTextNode(c) : c)
        }
        for (; d < c.length; d++) {
            var g = c[d];
            !ja(g) || ma(g) && 0 < g.nodeType ? f(g) : z(ed(g) ? ob(g) : g, f)
        }
    }

    function fd(a, b) {
        dd(Vc(a), a, arguments, 1)
    }

    function gd(a) {
        for (var b; b = a.firstChild;) a.removeChild(b)
    }

    function hd(a) {
        return a && a.parentNode ? a.parentNode.removeChild(a) : null
    }

    function id(a) {
        if (void 0 != a.firstElementChild) a = a.firstElementChild;
        else
            for (a = a.firstChild; a && 1 != a.nodeType;) a = a.nextSibling;
        return a
    }

    function jd(a, b) {
        if (a.contains && 1 == b.nodeType) return a == b || a.contains(b);
        if ("undefined" != typeof a.compareDocumentPosition) return a == b || Boolean(a.compareDocumentPosition(b) & 16);
        for (; b && a != b;) b = b.parentNode;
        return b == a
    }

    function Vc(a) {
        return 9 == a.nodeType ? a : a.ownerDocument || a.document
    }

    function kd(a) {
        return a.contentDocument || a.contentWindow.document
    }

    function ld(a, b) {
        if ("textContent" in a) a.textContent = b;
        else if (a.firstChild && 3 == a.firstChild.nodeType) {
            for (; a.lastChild != a.firstChild;) a.removeChild(a.lastChild);
            a.firstChild.data = b
        } else gd(a), a.appendChild(Vc(a).createTextNode(String(b)))
    }

    function md(a, b) {
        var c = [];
        return nd(a, b, c, !0) ? c[0] : void 0
    }

    function nd(a, b, c, d) {
        if (null != a)
            for (a = a.firstChild; a;) {
                if (b(a) && (c.push(a), d) || nd(a, b, c, d)) return !0;
                a = a.nextSibling
            }
        return !1
    }
    var od = {
            SCRIPT: 1,
            STYLE: 1,
            HEAD: 1,
            IFRAME: 1,
            OBJECT: 1
        },
        pd = {
            IMG: " ",
            BR: "\n"
        };

    function qd(a) {
        var b = a.getAttributeNode("tabindex");
        return b && b.specified ? (a = a.tabIndex, ka(a) && 0 <= a && 32768 > a) : !1
    }

    function rd(a, b) {
        b ? a.tabIndex = 0 : (a.tabIndex = -1, a.removeAttribute("tabIndex"))
    }

    function sd(a) {
        if (uc && "innerText" in a) a = a.innerText.replace(/(\r\n|\r|\n)/g, "\n");
        else {
            var b = [];
            td(a, b, !0);
            a = b.join("")
        }
        a = a.replace(/ \xAD /g, " ").replace(/\xAD/g, "");
        a = a.replace(/\u200B/g, "");
        uc || (a = a.replace(/ +/g, " "));
        " " != a && (a = a.replace(/^\s*/, ""));
        return a
    }

    function ud(a) {
        var b = [];
        td(a, b, !1);
        return b.join("")
    }

    function td(a, b, c) {
        if (!(a.nodeName in od))
            if (3 == a.nodeType) c ? b.push(String(a.nodeValue).replace(/(\r\n|\r|\n)/g, "")) : b.push(a.nodeValue);
            else if (a.nodeName in pd) b.push(pd[a.nodeName]);
        else
            for (a = a.firstChild; a;) td(a, b, c), a = a.nextSibling
    }

    function ed(a) {
        if (a && "number" == typeof a.length) {
            if (ma(a)) return "function" == typeof a.item || "string" == typeof a.item;
            if (la(a)) return "function" == typeof a.item
        }
        return !1
    }

    function Uc(a) {
        this.fa = a || q.document || document
    }
    n = Uc.prototype;
    n.o = Tc;

    function vd(a) {
        return a.fa
    }
    n.e = function(a) {
        return v(a) ? this.fa.getElementById(a) : a
    };
    n.w = function(a, b, c) {
        return cd(this.fa, arguments)
    };
    n.createElement = function(a) {
        return this.fa.createElement(a)
    };
    n.createTextNode = function(a) {
        return this.fa.createTextNode(String(a))
    };

    function wd(a) {
        return "CSS1Compat" == a.fa.compatMode
    }

    function xd(a) {
        return a.fa.parentWindow || a.fa.defaultView
    }

    function yd(a) {
        var b = a.fa;
        a = $c(b);
        b = b.parentWindow || b.defaultView;
        return A && D("10") && b.pageYOffset != a.scrollTop ? new E(a.scrollLeft, a.scrollTop) : new E(b.pageXOffset || a.scrollLeft, b.pageYOffset || a.scrollTop)
    }
    n.appendChild = function(a, b) {
        a.appendChild(b)
    };
    n.append = fd;
    n.Un = gd;
    n.removeNode = hd;
    n.Rp = function(a) {
        return tc && void 0 != a.children ? a.children : bb(a.childNodes, function(a) {
            return 1 == a.nodeType
        })
    };
    n.Tp = id;
    n.contains = jd;

    function zd(a, b) {
        var c = b || {},
            d = c.document || document,
            f = document.createElement("SCRIPT"),
            g = {
                Tr: f,
                Pf: void 0
            },
            h = new jc(Ad, g),
            k = null,
            m = null != c.timeout ? c.timeout : 5E3;
        0 < m && (k = window.setTimeout(function() {
            Bd(f, !0);
            h.ma(new Cd(Dd, "Timeout reached for loading script " + a))
        }, m), g.Pf = k);
        f.onload = f.onreadystatechange = function() {
            f.readyState && "loaded" != f.readyState && "complete" != f.readyState || (Bd(f, c.jt || !1, k), h.aa(null))
        };
        f.onerror = function() {
            Bd(f, !0, k);
            h.ma(new Cd(Ed, "Error while loading script " + a))
        };
        Xc(f, {
            type: "text/javascript",
            charset: "UTF-8",
            src: a
        });
        Fd(d).appendChild(f);
        return h
    }

    function Fd(a) {
        var b = a.getElementsByTagName("HEAD");
        return b && 0 != b.length ? b[0] : a.documentElement
    }

    function Ad() {
        if (this && this.Tr) {
            var a = this.Tr;
            a && "SCRIPT" == a.tagName && Bd(a, !0, this.Pf)
        }
    }

    function Bd(a, b, c) {
        null != c && q.clearTimeout(c);
        a.onload = fa;
        a.onerror = fa;
        a.onreadystatechange = fa;
        b && window.setTimeout(function() {
            hd(a)
        }, 0)
    }
    var Ed = 0,
        Dd = 1;

    function Cd(a, b) {
        var c = "Jsloader error (code #" + a + ")";
        b && (c += ": " + b);
        va.call(this, c);
        this.code = a
    }
    y(Cd, va);

    function Gd(a) {
        if ("function" == typeof a.cb) return a.cb();
        if (v(a)) return a.split("");
        if (ja(a)) {
            for (var b = [], c = a.length, d = 0; d < c; d++) b.push(a[d]);
            return b
        }
        return Jc(a)
    }

    function Hd(a) {
        if ("function" == typeof a.ne) return a.ne();
        if ("function" != typeof a.cb) {
            if (ja(a) || v(a)) {
                var b = [];
                a = a.length;
                for (var c = 0; c < a; c++) b.push(c);
                return b
            }
            return Kc(a)
        }
    }

    function Id(a, b, c) {
        if ("function" == typeof a.forEach) a.forEach(b, c);
        else if (ja(a) || v(a)) z(a, b, c);
        else
            for (var d = Hd(a), f = Gd(a), g = f.length, h = 0; h < g; h++) b.call(c, f[h], d && d[h], a)
    };
    var Jd = "StopIteration" in q ? q.StopIteration : Error("StopIteration");

    function Kd() {}
    Kd.prototype.next = function() {
        throw Jd;
    };
    Kd.prototype.Fd = function() {
        return this
    };

    function Ld(a) {
        if (a instanceof Kd) return a;
        if ("function" == typeof a.Fd) return a.Fd(!1);
        if (ja(a)) {
            var b = 0,
                c = new Kd;
            c.next = function() {
                for (;;) {
                    if (b >= a.length) throw Jd;
                    if (b in a) return a[b++];
                    b++
                }
            };
            return c
        }
        throw Error("Not implemented");
    }

    function Md(a, b) {
        if (ja(a)) try {
            z(a, b, void 0)
        } catch (c) {
            if (c !== Jd) throw c;
        } else {
            a = Ld(a);
            try {
                for (;;) b.call(void 0, a.next(), void 0, a)
            } catch (d) {
                if (d !== Jd) throw d;
            }
        }
    }

    function Nd(a) {
        if (ja(a)) return ob(a);
        a = Ld(a);
        var b = [];
        Md(a, function(a) {
            b.push(a)
        });
        return b
    };

    function Od(a, b) {
        this.rb = {};
        this.ya = [];
        var c = arguments.length;
        if (1 < c) {
            if (c % 2) throw Error("Uneven number of arguments");
            for (var d = 0; d < c; d += 2) this.set(arguments[d], arguments[d + 1])
        } else if (a) {
            a instanceof Od ? (c = a.ne(), d = a.cb()) : (c = Kc(a), d = Jc(a));
            for (var f = 0; f < c.length; f++) this.set(c[f], d[f])
        }
    }
    n = Od.prototype;
    n.O = 0;
    n.Yi = 0;
    n.gd = e("O");
    n.cb = function() {
        Pd(this);
        for (var a = [], b = 0; b < this.ya.length; b++) a.push(this.rb[this.ya[b]]);
        return a
    };
    n.ne = function() {
        Pd(this);
        return this.ya.concat()
    };
    n.Ic = function(a) {
        return Qd(this.rb, a)
    };
    n.am = function(a, b) {
        if (this === a) return !0;
        if (this.O != a.gd()) return !1;
        var c = b || Rd;
        Pd(this);
        for (var d, f = 0; d = this.ya[f]; f++)
            if (!c(this.get(d), a.get(d))) return !1;
        return !0
    };

    function Rd(a, b) {
        return a === b
    }
    n.clear = function() {
        this.rb = {};
        this.Yi = this.O = this.ya.length = 0
    };
    n.remove = function(a) {
        return Qd(this.rb, a) ? (delete this.rb[a], this.O--, this.Yi++, this.ya.length > 2 * this.O && Pd(this), !0) : !1
    };

    function Pd(a) {
        if (a.O != a.ya.length) {
            for (var b = 0, c = 0; b < a.ya.length;) {
                var d = a.ya[b];
                Qd(a.rb, d) && (a.ya[c++] = d);
                b++
            }
            a.ya.length = c
        }
        if (a.O != a.ya.length) {
            for (var f = {}, c = b = 0; b < a.ya.length;) d = a.ya[b], Qd(f, d) || (a.ya[c++] = d, f[d] = 1), b++;
            a.ya.length = c
        }
    }
    n.get = function(a, b) {
        return Qd(this.rb, a) ? this.rb[a] : b
    };
    n.set = function(a, b) {
        Qd(this.rb, a) || (this.O++, this.ya.push(a), this.Yi++);
        this.rb[a] = b
    };
    n.ib = function() {
        return new Od(this)
    };
    n.Fd = function(a) {
        Pd(this);
        var b = 0,
            c = this.ya,
            d = this.rb,
            f = this.Yi,
            g = this,
            h = new Kd;
        h.next = function() {
            for (;;) {
                if (f != g.Yi) throw Error("The map has changed since the iterator was created");
                if (b >= c.length) throw Jd;
                var h = c[b++];
                return a ? h : d[h]
            }
        };
        return h
    };

    function Qd(a, b) {
        return Object.prototype.hasOwnProperty.call(a, b)
    };

    function Sd(a) {
        return Td(a || arguments.callee.caller, [])
    }

    function Td(a, b) {
        var c = [];
        if (hb(b, a)) c.push("[...circular reference...]");
        else if (a && 50 > b.length) {
            c.push(Ud(a) + "(");
            for (var d = a.arguments, f = 0; f < d.length; f++) {
                0 < f && c.push(", ");
                var g;
                g = d[f];
                switch (typeof g) {
                    case "object":
                        g = g ? "object" : "null";
                        break;
                    case "string":
                        break;
                    case "number":
                        g = String(g);
                        break;
                    case "boolean":
                        g = g ? "true" : "false";
                        break;
                    case "function":
                        g = (g = Ud(g)) ? g : "[fn]";
                        break;
                    default:
                        g = typeof g
                }
                40 < g.length && (g = g.substr(0, 40) + "...");
                c.push(g)
            }
            b.push(a);
            c.push(")\n");
            try {
                c.push(Td(a.caller, b))
            } catch (h) {
                c.push("[exception trying to get caller]\n")
            }
        } else a ?
            c.push("[...long stack...]") : c.push("[end]");
        return c.join("")
    }

    function Ud(a) {
        if (Vd[a]) return Vd[a];
        a = String(a);
        if (!Vd[a]) {
            var b = /function ([^\(]+)/.exec(a);
            Vd[a] = b ? b[1] : "[Anonymous]"
        }
        return Vd[a]
    }
    var Vd = {};

    function Wd(a, b, c, d, f) {
        this.reset(a, b, c, d, f)
    }
    Wd.prototype.Wr = 0;
    Wd.prototype.dm = null;
    Wd.prototype.cm = null;
    var Xd = 0;
    Wd.prototype.reset = function(a, b, c, d, f) {
        this.Wr = "number" == typeof f ? f : Xd++;
        this.ss = d || ta();
        this.wf = a;
        this.ev = b;
        this.Gq = c;
        delete this.dm;
        delete this.cm
    };
    Wd.prototype.io = ca("wf");
    Wd.prototype.Kj = e("ev");
    Wd.prototype.Yp = e("Wr");

    function Yd(a) {
        this.ni = a
    }
    Yd.prototype.wa = null;
    Yd.prototype.wf = null;
    Yd.prototype.Ha = null;
    Yd.prototype.Oh = null;

    function Zd(a, b) {
        this.name = a;
        this.value = b
    }
    Zd.prototype.toString = e("name");
    var $d = new Zd("OFF", Infinity),
        ae = new Zd("SHOUT", 1200),
        be = new Zd("SEVERE", 1E3),
        ce = new Zd("WARNING", 900),
        de = new Zd("INFO", 800),
        ee = new Zd("CONFIG", 700),
        fe = new Zd("FINE", 500),
        ge = new Zd("FINER", 400),
        he = new Zd("FINEST", 300);
    n = Yd.prototype;
    n.getName = e("ni");
    n.getParent = e("wa");
    n.Rp = function() {
        this.Ha || (this.Ha = {});
        return this.Ha
    };
    n.io = ca("wf");

    function ie(a) {
        return a.wf ? a.wf : a.wa ? ie(a.wa) : null
    }
    n.log = function(a, b, c) {
        if (a.value >= ie(this).value)
            for (a = this.Qt(a, b, c), b = "log:" + a.Kj(), q.console && (q.console.timeStamp ? q.console.timeStamp(b) : q.console.markTimeline && q.console.markTimeline(b)), q.msWriteProfilerMark && q.msWriteProfilerMark(b), b = this; b;) {
                c = b;
                var d = a;
                if (c.Oh)
                    for (var f = 0, g = void 0; g = c.Oh[f]; f++) g(d);
                b = b.getParent()
            }
    };
    n.Qt = function(a, b, c) {
        var d = new Wd(a, String(b), this.ni);
        if (c) {
            d.dm = c;
            var f;
            var g = arguments.callee.caller;
            try {
                var h;
                var k = ea("window.location.href");
                if (v(c)) h = {
                    message: c,
                    name: "Unknown error",
                    lineNumber: "Not available",
                    fileName: k,
                    stack: "Not available"
                };
                else {
                    var m, p, r = !1;
                    try {
                        m = c.lineNumber || c.az || "Not available"
                    } catch (s) {
                        m = "Not available", r = !0
                    }
                    try {
                        p = c.fileName || c.filename || c.sourceURL || q.$googDebugFname || k
                    } catch (u) {
                        p = "Not available", r = !0
                    }
                    h = !r && c.lineNumber && c.fileName && c.stack && c.message && c.name ? c : {
                        message: c.message ||
                            "Not available",
                        name: c.name || "UnknownError",
                        lineNumber: m,
                        fileName: p,
                        stack: c.stack || "Not available"
                    }
                }
                f = "Message: " + Fa(h.message) + '\nUrl: \x3ca href\x3d"view-source:' + h.fileName + '" target\x3d"_new"\x3e' + h.fileName + "\x3c/a\x3e\nLine: " + h.lineNumber + "\n\nBrowser stack:\n" + Fa(h.stack + "-\x3e ") + "[end]\n\nJS stack traversal:\n" + Fa(Sd(g) + "-\x3e ")
            } catch (H) {
                f = "Exception trying to expose exception! You win, we lose. " + H
            }
            d.cm = f
        }
        return d
    };
    n.info = function(a, b) {
        this.log(de, a, b)
    };

    function F(a, b, c) {
        a.log(fe, b, c)
    }
    n.ko = ca("wa");
    var je = {},
        ke = null;

    function le() {
        ke || (ke = new Yd(""), je[""] = ke, ke.io(ee))
    }

    function me() {
        le();
        return ke
    }

    function ne(a) {
        le();
        var b;
        if (!(b = je[a])) {
            b = new Yd(a);
            var c = a.lastIndexOf("."),
                d = a.substr(c + 1),
                c = ne(a.substr(0, c));
            c.Rp()[d] = b;
            b.ko(c);
            je[a] = b
        }
        return b
    };

    function oe() {
        return new G({})
    }

    function pe(a, b) {
        function c() {
            var b = a.currentTime,
                m = a.videoWidth,
                p = ta();
            if (b != d) f = p;
            else if (p - f > h) {
                g.ma(qe);
                return
            }
            0 < b && 0 < m ? g.aa(a) : (d = b, I(c, 100))
        }
        var d = 0,
            f = ta(),
            g = new G,
            h = 1E3 * b;
        c();
        return g
    };
    var qe = "TIMED_OUT",
        re = "recv",
        se = "cancel";

    function te() {
        this.Ir = ta()
    }
    var ue = new te;
    te.prototype.set = ca("Ir");
    te.prototype.reset = function() {
        this.set(ta())
    };
    te.prototype.get = e("Ir");

    function ve(a) {
        this.zc = a || "";
        this.by = ue
    }
    n = ve.prototype;
    n.po = !0;
    n.hs = !0;
    n.Xx = !0;
    n.gs = !1;
    n.Yx = !1;

    function we(a) {
        return 10 > a ? "0" + a : String(a)
    }

    function xe(a, b) {
        var c = (a.ss - b) / 1E3,
            d = c.toFixed(3),
            f = 0;
        if (1 > c) f = 2;
        else
            for (; 100 > c;) f++, c *= 10;
        for (; 0 < f--;) d = " " + d;
        return d
    }

    function ye(a) {
        ve.call(this, a)
    }
    y(ye, ve);

    function ze() {
        this.Dx = w(this.Vs, this);
        this.zj = new ye;
        this.zj.po = !1;
        this.vq = this.zj.gs = !1;
        this.Fq = "";
        this.Bt = {}
    }
    ze.prototype.Vs = function(a) {
        if (!this.Bt[a.Gq]) {
            var b;
            b = this.zj;
            var c = [];
            c.push(b.zc, " ");
            if (b.po) {
                var d = new Date(a.ss);
                c.push("[", we(d.getFullYear() - 2E3) + we(d.getMonth() + 1) + we(d.getDate()) + " " + we(d.getHours()) + ":" + we(d.getMinutes()) + ":" + we(d.getSeconds()) + "." + we(Math.floor(d.getMilliseconds() / 10)), "] ")
            }
            b.hs && c.push("[", xe(a, b.by.get()), "s] ");
            b.Xx && c.push("[", a.Gq, "] ");
            b.Yx && c.push("[", a.wf.name, "] ");
            c.push(a.Kj(), "\n");
            b.gs && a.dm && c.push(a.cm, "\n");
            b = c.join("");
            if (c = Ae) switch (a.wf) {
                case ae:
                    Be(c,
                        "info", b);
                    break;
                case be:
                    Be(c, "error", b);
                    break;
                case ce:
                    Be(c, "warn", b);
                    break;
                default:
                    Be(c, "debug", b)
            } else window.opera ? window.opera.postError(b) : this.Fq += b
        }
    };
    var Ae = window.console;

    function Be(a, b, c) {
        if (a[b]) a[b](c);
        else a.log(c)
    };
    var Ce, De = !1,
        Ee = null;

    function Fe() {
        if (!De) {
            Ee = new ze;
            var a;
            a = Ee.zj;
            a.po = !0;
            a.hs = !1;
            a = Ee;
            if (!0 != a.vq) {
                var b = me(),
                    c = a.Dx;
                b.Oh || (b.Oh = []);
                b.Oh.push(c);
                a.vq = !0
            }
            De = !0;
            Ge(ce)
        }
    }

    function Ge(a) {
        Fe();
        me().io(a);
        return a
    }

    function He(a) {
        Fe();
        return ne(a)
    };

    function Ie(a) {
        "object" === typeof a && (a = ac(a));
        var b;
        b = a.replace(/\r\n/g, "\n");
        a = [];
        for (var c = 0, d = 0; d < b.length; d++) {
            var f = b.charCodeAt(d);
            128 > f ? a[c++] = f : (2048 > f ? a[c++] = f >> 6 | 192 : (a[c++] = f >> 12 | 224, a[c++] = f >> 6 & 63 | 128), a[c++] = f & 63 | 128)
        }
        if (!ja(a)) throw Error("encodeByteArray takes an array as a parameter");
        Wb();
        b = Ub;
        c = [];
        for (d = 0; d < a.length; d += 3) {
            var g = a[d],
                h = (f = d + 1 < a.length) ? a[d + 1] : 0,
                k = d + 2 < a.length,
                m = k ? a[d + 2] : 0,
                p = g >> 2,
                g = (g & 3) << 4 | h >> 4,
                h = (h & 15) << 2 | m >> 6,
                m = m & 63;
            k || (m = 64, f || (h = 64));
            c.push(b[p], b[g], b[h], b[m])
        }
        a =
            c.join("");
        return a = a.split(".")[0]
    }

    function Je(a, b) {
        void 0 === b && (b = !0);
        switch (a.length % 4) {
            case 0:
                break;
            case 2:
                a += "..";
                break;
            case 3:
                a += ".";
                break;
            default:
                return null
        }
        var c = a;
        Wb();
        for (var d = Vb, f = [], g = 0; g < c.length;) {
            var h = d[c.charAt(g++)],
                k = g < c.length ? d[c.charAt(g)] : 0;
            ++g;
            var m = g < c.length ? d[c.charAt(g)] : 0;
            ++g;
            var p = g < c.length ? d[c.charAt(g)] : 0;
            ++g;
            if (null == h || null == k || null == m || null == p) throw Error();
            f.push(h << 2 | k >> 4);
            64 != m && (f.push(k << 4 & 240 | m >> 2), 64 != p && f.push(m << 6 & 192 | p))
        }
        c = [];
        for (g = d = 0; d < f.length;) h = f[d++], 128 > h ? c[g++] = String.fromCharCode(h) :
            191 < h && 224 > h ? (k = f[d++], c[g++] = String.fromCharCode((h & 31) << 6 | k & 63)) : (k = f[d++], m = f[d++], c[g++] = String.fromCharCode((h & 15) << 12 | (k & 63) << 6 | m & 63));
        f = c.join("");
        return b ? $b(f) : f
    }

    function Ke(a) {
        var b = a.indexOf(":");
        return 0 < b ? a.substr(b + 1) : a
    }

    function Le(a, b) {
        return null != a || null != b ? 0 < b.indexOf(":") ? b : a + ":" + b : void 0
    }

    function Me(a) {
        if (null == a) return !1;
        a = a.split(":");
        return 2 !== a.length ? !1 : null != a[0] && /^[a-zA-Z\d]([a-zA-Z\d-]*[a-zA-Z\d])?$/.test(a[0]) && null != a[1] && /^[^:\/]+$/.test(a[1])
    }

    function Ne(a) {
        var b = a.indexOf(":");
        return 0 < b ? a.substr(0, b) : ""
    }

    function Oe(a) {
        var b = new Yb;
        b.update(Ca(a).toLowerCase());
        var c = Array((56 > b.ih ? 64 : 128) - b.ih);
        c[0] = 128;
        for (a = 1; a < c.length - 8; ++a) c[a] = 0;
        var d = 8 * b.hl;
        for (a = c.length - 8; a < c.length; ++a) c[a] = d & 255, d /= 256;
        b.update(c);
        c = Array(16);
        for (a = d = 0; 4 > a; ++a)
            for (var f = 0; 32 > f; f += 8) c[d++] = b.wb[a] >>> f & 255;
        return "https://www.gravatar.com/avatar/" + tb(c) + "?d\x3dmm"
    }
    var Pe = la(Object.prototype.getPrototypeOf) ? Object.prototype.getPrototypeOf : function(a) {
        return a.__proto__ || a.constructor.prototype
    };

    function Qe(a, b) {
        function c() {}
        c.prototype = a;
        var d = new c;
        b && Rc(d, b);
        return d
    }

    function Re(a, b) {
        if (a === b) return !0;
        var c, d;
        d = ha(a);
        if (ha(b) !== d) return !1;
        if ("array" === d) {
            d = a.length;
            if (b.length !== d) return !1;
            for (c = 0; c < d; ++c)
                if (!Re(a[c], b[c])) return !1;
            return !0
        }
        if ("object" === d) {
            for (c in a)
                if (!(c in b && Re(a[c], b[c]))) return !1;
            for (c in b)
                if (!(c in a)) return !1;
            return !0
        }
        return !1
    }
    var Se = -1;

    function Te() {
        var a = new Date,
            b = a.getTime();
        Ce && (b += Ce, a.setTime(b));
        return a
    }

    function Ue(a, b, c) {
        b.prototype.xl = a;
        c && (b.prototype.Wo = c);
        b.prototype.G = He("vline." + a + (c || ""))
    }

    function Ve(a) {
        return v(a) ? a : v(a.type) ? a.type : v(a.xl) ? v(a.Wo) ? a.xl + a.Wo : a.xl : Pe(a) === Object.prototype ? "" : (a = /function (.{1,})\(/.exec(a.constructor.toString())) && 1 < a.length ? a[1] : ""
    }
    var We = [0, 1996959894, 3993919788, 2567524794, 124634137, 1886057615, 3915621685, 2657392035, 249268274, 2044508324, 3772115230, 2547177864, 162941995, 2125561021, 3887607047, 2428444049, 498536548, 1789927666, 4089016648, 2227061214, 450548861, 1843258603, 4107580753, 2211677639, 325883990, 1684777152, 4251122042, 2321926636, 335633487, 1661365465, 4195302755, 2366115317, 997073096, 1281953886, 3579855332, 2724688242, 1006888145, 1258607687, 3524101629, 2768942443, 901097722, 1119000684, 3686517206, 2898065728, 853044451, 1172266101, 3705015759,
        2882616665, 651767980, 1373503546, 3369554304, 3218104598, 565507253, 1454621731, 3485111705, 3099436303, 671266974, 1594198024, 3322730930, 2970347812, 795835527, 1483230225, 3244367275, 3060149565, 1994146192, 31158534, 2563907772, 4023717930, 1907459465, 112637215, 2680153253, 3904427059, 2013776290, 251722036, 2517215374, 3775830040, 2137656763, 141376813, 2439277719, 3865271297, 1802195444, 476864866, 2238001368, 4066508878, 1812370925, 453092731, 2181625025, 4111451223, 1706088902, 314042704, 2344532202, 4240017532, 1658658271, 366619977,
        2362670323, 4224994405, 1303535960, 984961486, 2747007092, 3569037538, 1256170817, 1037604311, 2765210733, 3554079995, 1131014506, 879679996, 2909243462, 3663771856, 1141124467, 855842277, 2852801631, 3708648649, 1342533948, 654459306, 3188396048, 3373015174, 1466479909, 544179635, 3110523913, 3462522015, 1591671054, 702138776, 2966460450, 3352799412, 1504918807, 783551873, 3082640443, 3233442989, 3988292384, 2596254646, 62317068, 1957810842, 3939845945, 2647816111, 81470997, 1943803523, 3814918930, 2489596804, 225274430, 2053790376, 3826175755,
        2466906013, 167816743, 2097651377, 4027552580, 2265490386, 503444072, 1762050814, 4150417245, 2154129355, 426522225, 1852507879, 4275313526, 2312317920, 282753626, 1742555852, 4189708143, 2394877945, 397917763, 1622183637, 3604390888, 2714866558, 953729732, 1340076626, 3518719985, 2797360999, 1068828381, 1219638859, 3624741850, 2936675148, 906185462, 1090812512, 3747672003, 2825379669, 829329135, 1181335161, 3412177804, 3160834842, 628085408, 1382605366, 3423369109, 3138078467, 570562233, 1426400815, 3317316542, 2998733608, 733239954, 1555261956,
        3268935591, 3050360625, 752459403, 1541320221, 2607071920, 3965973030, 1969922972, 40735498, 2617837225, 3943577151, 1913087877, 83908371, 2512341634, 3803740692, 2075208622, 213261112, 2463272603, 3855990285, 2094854071, 198958881, 2262029012, 4057260610, 1759359992, 534414190, 2176718541, 4139329115, 1873836001, 414664567, 2282248934, 4279200368, 1711684554, 285281116, 2405801727, 4167216745, 1634467795, 376229701, 2685067896, 3608007406, 1308918612, 956543938, 2808555105, 3495958263, 1231636301, 1047427035, 2932959818, 3654703836, 1088359270,
        936918E3, 2847714899, 3736837829, 1202900863, 817233897, 3183342108, 3401237130, 1404277552, 615818150, 3134207493, 3453421203, 1423857449, 601450431, 3009837614, 3294710456, 1567103746, 711928724, 3020668471, 3272380065, 1510334235, 755167117
    ];

    function Xe(a) {
        return v(a) ? a : a instanceof L ? a.l() : a.path || null
    }

    function Ye(a) {
        if (a) {
            if (a instanceof L) return a;
            if (ma(a)) return Ze($e, a, void 0, L).vb();
            if (v(a)) return Ze($e, null, a, L).vb()
        }
        return (new L).vb()
    }

    function af(a, b, c, d) {
        bf(cf, a, "", b, c, rb(arguments, 3))
    }

    function df(a, b, c, d) {
        bf(ef, a, "", b, c, rb(arguments, 3))
    }

    function ff(a, b, c, d) {
        bf($e, a, "entity" === a ? "" : "Entity", b, c, rb(arguments, 3))
    }

    function gf(a, b) {
        b = t(b) ? b : !0;
        ma(a) && la(a.Fa) && (a = a.Fa());
        if (ma(a)) {
            if (ja(a)) {
                var c = a,
                    d = b,
                    f, g = [];
                for (f = 0; f < c.length; ++f) g.push(d ? gf(c[f], d) : c[f]);
                return g
            }
            if (Pe(a) === Object.prototype) return hf(a, b, !0)
        }
        return a
    }

    function hf(a, b, c) {
        var d, f = {};
        for (d in a) a.hasOwnProperty(d) && (t(a[d]) && (c || !/(^_)|(_$)/.test(d))) && (f[d] = b ? gf(a[d], b) : a[d]);
        return f
    }

    function jf(a, b) {
        a.Zg && Hc(b, function(b, d) {
            kf(a, d, b, !0)
        })
    }

    function kf(a, b, c, d) {
        var f;
        if (a.Zg) {
            if (f = a.Zg[b]) return f.call(a, c), !0;
            if (d && (f = a.Zg["$*"])) return f.call(a, b, c), !0
        }
        return !1
    }

    function lf(a, b) {
        var c = t(b) ? b : !0,
            d = new Za;
        mf(d, a, 0, c);
        return d.toString()
    }
    var cf = {},
        ef = {},
        $e = {};

    function bf(a, b, c, d, f, g) {
        function h() {}
        f && (d.wl = f);
        if (g && 0 < g.length) {
            if (f = Pe(d.prototype).Zg) h.prototype = f;
            f = d.prototype.Zg = new h;
            for (var k = 0; k < g.length; k += 2) f[g[k]] = g[k + 1]
        }
        d.Vo = ba();
        d.Vo.prototype = d.prototype;
        v(b) ? (a[b] = d, Ue(b, d, c)) : z(b, function(b) {
            a[b] = d
        })
    }

    function Ze(a, b, c, d, f) {
        c = c || b && b.type;
        b = b || {
            type: c
        };
        c && wa(c, "x-msg-") && (c = "x-msg");
        var g = a[c] || d;
        if (!g) return null === g ? null : Pc(b);
        var h = [],
            k = null;
        g.wl ? (k = {}, a = function(a, b) {
            var c = ab(g.wl, b);
            if (0 <= c) return h[c] = a, !0;
            k[b] = a;
            return !1
        }, Hc(b, a), f && a(f, "$entity"), f = ab(g.wl, "$props"), 0 < f && (h[f] = k, k = null)) : k = b;
        f = new g.Vo;
        g.apply(f, h);
        jf(f, k);
        return f
    }

    function mf(a, b, c, d) {
        switch (typeof b) {
            case "string":
                if (/\s/.test(b)) {
                    a.append("'", b, "'");
                    return
                }
                break;
            case "object":
                if (null == b) break;
                var f = 0;
                if (ja(b)) {
                    a.append("[");
                    z(b, function(b) {
                        0 < f++ && a.append(", ");
                        mf(a, b, c + 1, !0)
                    });
                    a.append("]");
                    return
                }
                if (0 < c && b.toString !== Object.prototype.toString) {
                    a.append(b.toString());
                    return
                }
                var g = gf(b, !1);
                if (ma(g)) {
                    var h = Ve(b);
                    d && a.append("{");
                    h && a.append(h);
                    Pe(g) === Object.prototype && (b = Kc(g), $a.sort.call(b, sb), z(b, function(b) {
                        var d = g[b];
                        "type" === b && d === h || null == d || (0 ===
                            f++ ? h && a.append(": ") : a.append(", "), a.append(b, "\x3d"), mf(a, d, c + 1, !0))
                    }));
                    d && a.append("}")
                } else a.append(g);
                return
        }
        a.append(String(b))
    };

    function nf() {}
    nf.prototype.toString = function() {
        return lf(this)
    };
    nf.prototype.X = function() {
        return Ve(this)
    };
    nf.prototype.Fa = function() {
        return hf(this, !0)
    };
    A && D(8);

    function of(a, b) {
        function c() {}
        c.prototype = a;
        var d = new c,
            f;
        for (f in b) d[f] = b[f];
        return d
    };

    function pf() {
        return "Email Address"
    }

    function qf() {
        return "AppId not found. This app may have been deleted"
    }

    function rf() {
        return "AppId already exists"
    };
    var M = {
        BAD_PARAM: l("One or more inputs is invalid."),
        BUG: l("That's a bug!")
    };
    M[qe] = l("Timed out");
    M.NOT_FOUND = l("Not found");
    M.CONNECTION_FAILED = l("Connection failed");
    M.AUTH_FAILED = l("Login to server failed. Check login parameters.");
    M.FORBIDDEN = l("Access forbidden");
    M.SERVER_ERROR = l("Server error");
    M.FIELD_REQUIRED = function(a) {
        return a.name + " can't be blank"
    };
    M.FIELD_MAX_LENGTH_EXCEEDED = function(a) {
        return "Please limit to " + a.Kq + " characters"
    };
    M.INVALID_EMAIL = l("Email is invalid");
    M.INVALID_PASSWORD = l("Password must be at least six characters long");
    M.PASSWORDS_DONT_MATCH = l("Passwords don't match");
    M.INVALID_URL = l("Invalid URL");
    M.APPID_NOT_FOUND = qf;
    M.SERVICEID_NOT_FOUND = qf;
    M.INVALID_TOKEN = l("This link is invalid or has expired");
    M.USERID_NOT_FOUND = l("Account not found");
    M.NO_RELAY_FOUND = l("No relay servers were available");
    M.APPID_EXISTS = rf;
    M.SERVICEID_EXISTS = rf;
    M.EMAIL_EXISTS = l("An account with this email address already exists");
    M.INVALID_PAYLOAD = l("An invalid payload was passed in the request");
    M.BAD_CREDENTIALS = l("Incorrect email or password");
    M.ACCESS_DENIED = l("You do not have permission to perform this operation");
    M.RSC_EXISTS = function(a) {
        return a.name + " already exists"
    };
    M.INVALID_CHAR = function(a) {
        return a.name + " cannot have spaces or special characters"
    };
    M.INVALID_FIELD = function(a) {
        return a.name + " has invalid characters"
    };
    M.SUBSCRIPTION_LIMIT_EXCEEDED = l("Too many subscriptions");
    M.GET_LOCAL_STREAM_FAILED = l("Do you have a camera and have you given permission to access it? [https://vline.com/developer/docs/debugging#get_local_stream_failed]");
    M.INVALID_STATE = l("State Invalid");
    M.ROOM_NOT_FOUND = l("Room not found");

    function sf(a, b) {
        return new N("BAD_PARAM", a + "\x3d" + b)
    }

    function N(a, b) {
        var c = a,
            d = b ? lf(b) : null;
        !d && a in M && (d = M[a]());
        d && (c += " (" + d + ")");
        va.call(this, c);
        this.type = a;
        ma(b) && Rc(this, b)
    }
    y(N, va);
    af("Error", N);
    N.prototype.name = "vLineError";
    N.prototype.X = e("type");
    N.prototype.Kj = e("message");
    N.prototype.Fa = function() {
        return hf(this, !0)
    };

    function tf(a) {
        N.call(this, "CORRUPT", a)
    }
    y(tf, N);

    function uf(a) {
        N.call(this, "BAD_PARAM", a)
    }
    y(uf, N);

    function vf(a) {
        N.call(this, "BUG", a)
    }
    y(vf, N);

    function wf(a) {
        N.call(this, "NOT_READY", a)
    }
    y(wf, N);

    function xf(a) {
        this.Wf[0][0][0] || this.yl();
        var b, c, d, f, g = this.Wf[0][4],
            h = this.Wf[1];
        b = a.length;
        var k = 1;
        if (4 !== b && 6 !== b && 8 !== b) throw new uf("invalid aes key size");
        this.ah = [d = a.slice(0), f = []];
        for (a = b; a < 4 * b + 28; a++) {
            c = d[a - 1];
            if (0 === a % b || 8 === b && 4 === a % b) c = g[c >>> 24] << 24 ^ g[c >> 16 & 255] << 16 ^ g[c >> 8 & 255] << 8 ^ g[c & 255], 0 === a % b && (c = c << 8 ^ c >>> 24 ^ k << 24, k = k << 1 ^ 283 * (k >> 7));
            d[a] = d[a - b] ^ c
        }
        for (b = 0; a; b++, a--) c = d[b & 3 ? a : a - 4], f[b] = 4 >= a || 4 > b ? c : h[0][g[c >>> 24]] ^ h[1][g[c >> 16 & 255]] ^ h[2][g[c >> 8 & 255]] ^ h[3][g[c & 255]]
    }
    xf.prototype = {
        Wf: [
            [
                [],
                [],
                [],
                [],
                []
            ],
            [
                [],
                [],
                [],
                [],
                []
            ]
        ],
        yl: function() {
            var a = this.Wf[0],
                b = this.Wf[1],
                c = a[4],
                d = b[4],
                f, g, h, k = [],
                m = [],
                p, r, s, u;
            for (f = 0; 256 > f; f++) m[(k[f] = f << 1 ^ 283 * (f >> 7)) ^ f] = f;
            for (g = h = 0; !c[g]; g ^= p || 1, h = m[h] || 1)
                for (s = h ^ h << 1 ^ h << 2 ^ h << 3 ^ h << 4, s = s >> 8 ^ s & 255 ^ 99, c[g] = s, d[s] = g, r = k[f = k[p = k[g]]], u = 16843009 * r ^ 65537 * f ^ 257 * p ^ 16843008 * g, r = 257 * k[s] ^ 16843008 * s, f = 0; 4 > f; f++) a[f][g] = r = r << 24 ^ r >>> 8, b[f][s] = u = u << 24 ^ u >>> 8;
            for (f = 0; 5 > f; f++) a[f] = a[f].slice(0), b[f] = b[f].slice(0)
        }
    };

    function yf(a, b, c) {
        a = zf(a.slice(b / 32), 32 - (b & 31)).slice(1);
        void 0 !== c && (b = c - b, 32 * a.length < b || (a = a.slice(0, Math.ceil(b / 32)), c = a.length, b &= 31, 0 < c && b && (a[c - 1] = Af(b, a[c - 1] & 2147483648 >> b - 1, 1))));
        return a
    }

    function Bf(a, b, c) {
        var d = Math.floor(-b - c & 31);
        return ((b + c - 1 ^ b) & -32 ? a[b / 32 | 0] << 32 - d ^ a[b / 32 + 1 | 0] >>> d : a[b / 32 | 0] >>> d) & (1 << c) - 1
    }

    function Cf(a, b) {
        if (0 === a.length || 0 === b.length) return a.concat(b);
        var c = a[a.length - 1],
            d = Math.round(c / 1099511627776) || 32;
        return 32 === d ? a.concat(b) : zf(b, d, c | 0, a.slice(0, a.length - 1))
    }

    function Df(a) {
        var b = a.length;
        return 0 === b ? 0 : 32 * (b - 1) + (Math.round(a[b - 1] / 1099511627776) || 32)
    }

    function Af(a, b, c) {
        return 32 === a ? b : (c ? b | 0 : b << 32 - a) + 1099511627776 * a
    }

    function zf(a, b, c, d) {
        var f;
        f = 0;
        for (void 0 === d && (d = []); 32 <= b; b -= 32) d.push(c), c = 0;
        if (0 === b) return d.concat(a);
        for (f = 0; f < a.length; f++) d.push(c | a[f] >>> b), c = a[f] << 32 - b;
        f = a.length ? a[a.length - 1] : 0;
        a = Math.round(f / 1099511627776) || 32;
        d.push(Af(b + a & 31, 32 < b + a ? c : d.pop(), 1));
        return d
    };

    function Ef(a) {
        this.ah[0] || this.yl();
        a ? (this.Zi = a.Zi.slice(0), this.$g = a.$g.slice(0), this.Vf = a.Vf) : this.reset()
    }

    function Ff(a) {
        return Gf((new Ef).update(a))
    }
    Ef.prototype = {
        reset: function() {
            this.Zi = this.Xo.slice(0);
            this.$g = [];
            this.Vf = 0;
            return this
        },
        update: function(a) {
            if ("string" === typeof a) {
                var b;
                b = unescape(encodeURIComponent(a));
                var c = [],
                    d = 0;
                for (a = 0; a < b.length; a++) d = d << 8 | b.charCodeAt(a), 3 === (a & 3) && (c.push(d), d = 0);
                a & 3 && c.push(Af(8 * (a & 3), d));
                a = c
            }
            b = this.$g = Cf(this.$g, a);
            c = this.Vf;
            a = this.Vf = c + Df(a);
            for (c = 512 + c & -512; c <= a; c += 512) Hf(this, b.splice(0, 16));
            return this
        },
        Xo: [],
        ah: [],
        yl: function() {
            var a = 0,
                b = 2,
                c;
            a: for (; 64 > a; b++) {
                for (c = 2; c * c <= b; c++)
                    if (0 === b % c) continue a;
                8 > a && (this.Xo[a] = 4294967296 * (Math.pow(b, 0.5) - Math.floor(Math.pow(b, 0.5))) | 0);
                this.ah[a] = 4294967296 * (Math.pow(b, 1 / 3) - Math.floor(Math.pow(b, 1 / 3))) | 0;
                a++
            }
        }
    };

    function Hf(a, b) {
        var c, d, f, g = b.slice(0),
            h = a.Zi,
            k = a.ah,
            m = h[0],
            p = h[1],
            r = h[2],
            s = h[3],
            u = h[4],
            H = h[5],
            J = h[6],
            Y = h[7];
        for (c = 0; 64 > c; c++) 16 > c ? d = g[c] : (d = g[c + 1 & 15], f = g[c + 14 & 15], d = g[c & 15] = (d >>> 7 ^ d >>> 18 ^ d >>> 3 ^ d << 25 ^ d << 14) + (f >>> 17 ^ f >>> 19 ^ f >>> 10 ^ f << 15 ^ f << 13) + g[c & 15] + g[c + 9 & 15] | 0), d = d + Y + (u >>> 6 ^ u >>> 11 ^ u >>> 25 ^ u << 26 ^ u << 21 ^ u << 7) + (J ^ u & (H ^ J)) + k[c], Y = J, J = H, H = u, u = s + d | 0, s = r, r = p, p = m, m = d + (p & r ^ s & (p ^ r)) + (p >>> 2 ^ p >>> 13 ^ p >>> 22 ^ p << 30 ^ p << 19 ^ p << 10) | 0;
        h[0] = h[0] + m | 0;
        h[1] = h[1] + p | 0;
        h[2] = h[2] + r | 0;
        h[3] = h[3] + s | 0;
        h[4] = h[4] + u | 0;
        h[5] = h[5] + H | 0;
        h[6] = h[6] + J | 0;
        h[7] = h[7] + Y | 0
    }

    function Gf(a) {
        var b, c = a.$g,
            d = a.Zi,
            c = Cf(c, [Af(1, 1)]);
        for (b = c.length + 2; b & 15; b++) c.push(0);
        c.push(Math.floor(a.Vf / 4294967296));
        for (c.push(a.Vf | 0); c.length;) Hf(a, c.splice(0, 16));
        a.reset();
        return d
    }
    x("sjcl.hash.sha256.hash", Ff);

    function If(a, b, c) {
        c = c || "user";
        var d, f, g = (new Date).valueOf(),
            h = Jf[c],
            k = Kf();
        d = Lf[c];
        void 0 === d && (d = Lf[c] = Mf++);
        void 0 === h && (h = Jf[c] = 0);
        Jf[c] = (Jf[c] + 1) % Nf.length;
        switch (typeof a) {
            case "number":
                break;
            case "object":
                if (void 0 === b)
                    for (c = b = 0; c < a.length; c++)
                        for (f = a[c]; 0 < f;) b++, f >>>= 1;
                Nf[h].update([d, Of++, 2, b, g, a.length].concat(a));
                break;
            case "string":
                void 0 === b && (b = a.length);
                Nf[h].update([d, Of++, 3, b, g, a.length]);
                Nf[h].update(a);
                break;
            default:
                throw new vf("random: addEntropy only supports number, array or string");
        }
        Pf[h] += b;
        Qf += b;
        k === Rf && (Kf() !== Rf && Sf("seeded", Math.max(Tf, Qf)), a = Uf[Vf], Sf("progress", Tf >= a ? 1 : Qf > a ? 1 : Qf / a))
    }

    function Kf(a) {
        a = Uf[void 0 !== a ? a : Vf];
        return Tf && Tf >= a ? Pf[0] > Wf && (new Date).valueOf() > Xf ? Yf | Zf : Zf : Qf >= a ? Yf | Rf : Rf
    }
    var Nf = [new Ef],
        Pf = [0],
        $f = 0,
        Jf = {},
        Of = 0,
        Lf = {},
        Mf = 0,
        Tf = 0,
        Qf = 0,
        Xf = 0,
        ag = [0, 0, 0, 0, 0, 0, 0, 0],
        bg = [0, 0, 0, 0],
        cg = void 0,
        Vf = 6,
        dg = !1,
        eg = {
            jz: {},
            nz: {}
        },
        Rf = 0,
        Zf = 1,
        Yf = 2,
        Uf = [0, 48, 64, 96, 128, 192, 256, 384, 512, 768, 1024],
        Wf = 80;

    function fg() {
        for (var a = 0; 4 > a && (bg[a] = bg[a] + 1 | 0, !bg[a]); a++);
        var b = cg;
        if (4 !== bg.length) throw new uf("invalid aes block size");
        var a = b.ah[0],
            c = bg[0] ^ a[0],
            d = bg[1] ^ a[1],
            f = bg[2] ^ a[2],
            g = bg[3] ^ a[3],
            h, k, m, p = a.length / 4 - 2,
            r, s = 4,
            u = [0, 0, 0, 0];
        h = b.Wf[0];
        var b = h[0],
            H = h[1],
            J = h[2],
            Y = h[3],
            Na = h[4];
        for (r = 0; r < p; r++) h = b[c >>> 24] ^ H[d >> 16 & 255] ^ J[f >> 8 & 255] ^ Y[g & 255] ^ a[s], k = b[d >>> 24] ^ H[f >> 16 & 255] ^ J[g >> 8 & 255] ^ Y[c & 255] ^ a[s + 1], m = b[f >>> 24] ^ H[g >> 16 & 255] ^ J[c >> 8 & 255] ^ Y[d & 255] ^ a[s + 2], g = b[g >>> 24] ^ H[c >> 16 & 255] ^ J[d >> 8 & 255] ^ Y[f & 255] ^ a[s +
            3], s += 4, c = h, d = k, f = m;
        for (r = 0; 4 > r; r++) u[r] = Na[c >>> 24] << 24 ^ Na[d >> 16 & 255] << 16 ^ Na[f >> 8 & 255] << 8 ^ Na[g & 255] ^ a[s++], h = c, c = d, d = f, f = g, g = h;
        return u
    }

    function gg() {
        ag = fg().concat(fg());
        cg = new xf(ag)
    }

    function hg(a) {
        If([a.x || a.clientX || a.offsetX, a.y || a.clientY || a.offsetY], 2, "mouse")
    }

    function ig() {
        If(new Date, 2, "loadtime")
    }

    function Sf(a, b) {
        var c, d = eg[a],
            f = [];
        for (c in d) d.hasOwnProperty(c) && f.push(d[c]);
        for (c = 0; c < f.length; c++) f[c](b)
    }
    try {
        var jg = new Uint32Array(32);
        crypto.getRandomValues(jg);
        If(jg, 1024, "crypto.getRandomValues")
    } catch (kg) {};

    function lg(a) {
        mg(this, a)
    }
    lg.prototype = {
        Pb: 24,
        Lq: 8,
        Gd: lg,
        copy: function() {
            return new this.Gd(this)
        },
        am: function(a) {
            "number" === typeof a && (a = new this.Gd(a));
            var b = 0,
                c;
            this.xh();
            a.xh();
            for (c = 0; c < this.S.length || c < a.S.length; c++) b |= ng(this, c) ^ ng(a, c);
            return 0 === b
        },
        toString: function() {
            this.xh();
            var a = "",
                b, c, d = this.S;
            for (b = 0; b < this.S.length; b++) {
                for (c = d[b].toString(16); b < this.S.length - 1 && 6 > c.length;) c = "0" + c;
                a = c + a
            }
            return "0x" + a
        },
        add: function(a) {
            return og(this.copy(), a)
        },
        sub: function(a) {
            var b = this.copy(),
                c = a;
            "object" !== typeof c && (c =
                new b.Gd(c));
            a = b.S;
            for (var d = c.S, c = a.length; c < d.length; c++) a[c] = 0;
            for (c = 0; c < d.length; c++) a[c] -= d[c];
            return b
        },
        reduce: function() {
            return this
        },
        xh: function() {
            return this.normalize()
        },
        normalize: function() {
            var a = 0,
                b, c = this.uq,
                d, f = this.S,
                g = f.length,
                h = this.Fr;
            for (b = 0; b < g || 0 !== a && -1 !== a; b++) a = (f[b] || 0) + a, d = f[b] = a & h, a = (a - d) * c; - 1 === a && (f[b - 1] -= this.yx);
            return this
        },
        ct: function() {
            this.xh();
            for (var a = this.Pb * (this.S.length - 1), b = this.S[this.S.length - 1]; b; b >>= 1) a++;
            return a + 7 & -8
        }
    };

    function pg(a) {
        var b = 0,
            c, d = a.uq,
            f, g = a.S,
            h = g.length,
            k = a.Fr;
        for (c = 0; c < h - 1; c++) b = g[c] + b, f = g[c] = b & k, b = (b - f) * d;
        g[c] += b;
        return a
    }

    function qg(a, b) {
        "number" === typeof b && (b = new a.Gd(b));
        var c, d, f = a.S,
            g = b.S,
            h = f.length,
            k = g.length,
            m = new a.Gd,
            p = m.S,
            r, s = a.Lq;
        for (c = 0; c < a.S.length + b.S.length + 1; c++) p[c] = 0;
        for (c = 0; c < h; c++) {
            r = f[c];
            for (d = 0; d < k; d++) p[c + d] += r * g[d];
            --s || (s = a.Lq, pg(m))
        }
        return pg(m).reduce()
    }

    function og(a, b) {
        "object" !== typeof b && (b = new a.Gd(b));
        var c, d = a.S,
            f = b.S;
        for (c = d.length; c < f.length; c++) d[c] = 0;
        for (c = 0; c < f.length; c++) d[c] += f[c];
        return a
    }

    function ng(a, b) {
        return b >= a.S.length ? 0 : a.S[b]
    }

    function mg(a, b) {
        var c = 0,
            d;
        switch (typeof b) {
            case "object":
                a.S = b.S.slice(0);
                break;
            case "number":
                a.S = [b];
                a.normalize();
                break;
            case "string":
                b = b.replace(/^0x/, "");
                a.S = [];
                d = a.Pb / 4;
                for (c = 0; c < b.length; c += d) a.S.push(parseInt(b.substring(Math.max(b.length - c - d, 0), b.length - c), 16));
                break;
            default:
                a.S = [0]
        }
    }
    lg.prototype.uq = 1 / (lg.prototype.yx = Math.pow(2, lg.prototype.Pb));
    lg.prototype.Fr = (1 << lg.prototype.Pb) - 1;

    function rg(a, b) {
        function c(a) {
            mg(this, a)
        }
        var d = c.prototype = new lg,
            f, g;
        f = d.nn = Math.ceil(g = a / d.Pb);
        d.zt = a;
        d.offset = [];
        d.Gp = [];
        d.vk = f;
        d.jm = 0;
        d.wh = [];
        d.Np = [];
        d.Vd = c.Vd = new lg(Math.pow(2, a));
        d.jm = 0 | -Math.pow(2, a % d.Pb);
        for (f = 0; f < b.length; f++) d.offset[f] = Math.floor(b[f][0] / d.Pb - g), d.wh[f] = Math.ceil(b[f][0] / d.Pb - g), d.Gp[f] = b[f][1] * Math.pow(0.5, a - b[f][0] + d.offset[f] * d.Pb), d.Np[f] = b[f][1] * Math.pow(0.5, a - b[f][0] + d.wh[f] * d.Pb), og(d.Vd, new lg(Math.pow(2, b[f][0]) * b[f][1])), d.vk = Math.min(d.vk, -d.offset[f]);
        d.Gd =
            c;
        pg(d.Vd);
        d.reduce = function() {
            var a, b, c, d = this.nn,
                f = this.S,
                g = this.offset,
                u = this.offset.length,
                H = this.Gp,
                J;
            for (a = this.vk; f.length > d;) {
                c = f.pop();
                J = f.length;
                for (b = 0; b < u; b++) f[J + g[b]] -= H[b] * c;
                a--;
                a || (f.push(0), pg(this), a = this.vk)
            }
            pg(this);
            return this
        };
        d.Yo = -1 === d.jm ? d.reduce : function() {
            var a = this.S,
                b = a.length - 1,
                c, d;
            this.reduce();
            if (b === this.nn - 1) {
                d = a[b] & this.jm;
                a[b] -= d;
                for (c = 0; c < this.wh.length; c++) a[b + this.wh[c]] -= this.Np[c] * d;
                this.normalize()
            }
        };
        d.xh = function() {
            var a, b;
            this.Yo();
            og(this, this.Vd);
            og(this,
                this.Vd);
            this.normalize();
            this.Yo();
            for (b = this.S.length; b < this.nn; b++) this.S[b] = 0;
            a = this.Vd;
            "number" === typeof a && (a = new this.Gd(a));
            var c = b = 0,
                d, f, g;
            for (d = Math.max(this.S.length, a.S.length) - 1; 0 <= d; d--) f = ng(this, d), g = ng(a, d), c |= g - f & ~b, b |= f - g & ~c;
            a = (c | ~b) >>> 31;
            for (b = 0; b < this.S.length; b++) this.S[b] -= this.Vd.S[b] * a;
            pg(this);
            return this
        };
        d.inverse = function() {
            var a = this.Vd.sub(2);
            "number" === typeof a ? a = [a] : void 0 !== a.S && (a = a.normalize().S);
            var b, c, d = new this.Gd(1),
                f = this;
            for (b = 0; b < a.length; b++)
                for (c = 0; c < this.Pb; c++) a[b] &
                    1 << c && (d = qg(d, f)), f = qg(f, f);
            return d
        };
        c.im = function(a) {
            var b = c,
                b = b || lg,
                d = new b,
                f = [],
                g = b.prototype,
                b = Math.min(b.ct || 4294967296, Df(a)),
                s = b % g.Pb || g.Pb;
            for (f[0] = Bf(a, 0, s); s < b; s += g.Pb) f.unshift(Bf(a, s, g.Pb));
            d.S = f;
            return d
        };
        return c
    }
    rg(127, [
        [0, -1]
    ]);
    rg(255, [
        [0, -19]
    ]);
    var sg = rg(192, [
            [0, -1],
            [64, -1]
        ]),
        tg = rg(224, [
            [0, 1],
            [96, -1]
        ]),
        ug = rg(256, [
            [0, -1],
            [96, 1],
            [192, 1],
            [224, -1]
        ]),
        vg = rg(384, [
            [0, -1],
            [32, 1],
            [96, -1],
            [128, -1]
        ]);
    rg(521, [
        [0, -1]
    ]);

    function wg(a, b, c) {
        void 0 === b ? this.Eu = !0 : (this.x = b, this.y = c, this.Eu = !1);
        this.xp = a
    }
    wg.prototype = {
        xg: function() {
            return qg(this.y, this.y).am(this.xp.bt.add(qg(this.x, this.xp.Ss.add(qg(this.x, this.x)))))
        }
    };

    function xg(a, b, c, d, f, g) {
        this.field = a;
        this.lz = a.prototype.Vd.sub(b);
        this.Ss = new a(c);
        this.bt = new a(d);
        this.ry = new wg(this, new a(f), new a(g))
    }
    xg.prototype.im = function(a) {
        var b = this.field.prototype.zt + 7 & -8;
        a = new wg(this, this.field.im(yf(a, 0, b)), this.field.im(yf(a, b, 2 * b)));
        if (!a.xg()) throw new tf("not on the curve!");
        return a
    };
    new xg(sg, "0x662107c8eb94364e4b2dd7ce", -3, "0x64210519e59c80e70fa7e9ab72243049feb8deecc146b9b1", "0x188da80eb03090f67cbf20eb43a18800f4ff0afd82ff1012", "0x07192b95ffc8da78631011ed6b24cdd573f977a11e794811");
    new xg(tg, "0xe95c1f470fc1ec22d6baa3a3d5c4", -3, "0xb4050a850c04b3abf54132565044b0b7d7bfd8ba270b39432355ffb4", "0xb70e0cbd6bb4bf7f321390b94a03c1d356c21122343280d6115c1d21", "0xbd376388b5f723fb4c22dfe6cd4375a05a07476444d5819985007e34");
    new xg(ug, "0x4319055358e8617b0c46353d039cdaae", -3, "0x5ac635d8aa3a93e7b3ebbd55769886bc651d06b0cc53b0f63bce3c3e27d2604b", "0x6b17d1f2e12c4247f8bce6e563a440f277037d812deb33a0f4a13945d898c296", "0x4fe342e2fe1a7f9b8ee7eb4a7c0f9e162bce33576b315ececbb6406837bf51f5");
    new xg(vg, "0x389cb27e0bc8d21fa7e5f24cb74f58851313e696333ad68c", -3, "0xb3312fa7e23ee7e4988e056be3f82d19181d9c6efe8141120314088f5013875ac656398d8a2ed19d2a85c8edd3ec2aef", "0xaa87ca22be8b05378eb1c71ef320ad746e1d3b628ba79b9859f741e082542a385502f25dbf55296c3a545e3872760ab7", "0x3617de4a96262c6f5d9e98bf9292dc29f8f41dbd289a147ce9da3113b5f0b8c00a60b1ce1d7e819d7a431d7c90ea0e5f");

    function yg() {
        0 != zg && (this.Jy = Error().stack, Ag[na(this)] = this)
    }
    var zg = 0,
        Ag = {};
    yg.prototype.Jc = !1;
    yg.prototype.F = function() {
        if (!this.Jc && (this.Jc = !0, this.k(), 0 != zg)) {
            var a = na(this);
            delete Ag[a]
        }
    };

    function Bg(a, b) {
        a.pi || (a.pi = []);
        a.pi.push(w(b, void 0))
    }
    yg.prototype.k = function() {
        if (this.pi)
            for (; this.pi.length;) this.pi.shift()()
    };

    function Dg(a) {
        a && "function" == typeof a.F && a.F()
    };
    var Eg = !A || Qb(9),
        Fg = !A || Qb(9),
        Gg = A && !D("9"),
        Hg = !C || D("528"),
        Ig = B && D("1.9b") || A && D("8") || Eb && D("9.5") || C && D("528"),
        Jg = B && !D("8") || A && !D("9");

    function Kg(a, b) {
        this.type = a;
        this.currentTarget = this.target = b
    }
    n = Kg.prototype;
    n.k = ba();
    n.F = ba();
    n.De = !1;
    n.defaultPrevented = !1;
    n.Pr = !0;
    n.stopPropagation = function() {
        this.De = !0
    };
    n.preventDefault = function() {
        this.defaultPrevented = !0;
        this.Pr = !1
    };

    function Lg(a) {
        a.preventDefault()
    };

    function Mg(a) {
        Mg[" "](a);
        return a
    }
    Mg[" "] = fa;

    function Ng(a, b) {
        a && this.se(a, b)
    }
    y(Ng, Kg);
    var Og = [1, 4, 2];
    n = Ng.prototype;
    n.target = null;
    n.relatedTarget = null;
    n.offsetX = 0;
    n.offsetY = 0;
    n.clientX = 0;
    n.clientY = 0;
    n.screenX = 0;
    n.screenY = 0;
    n.button = 0;
    n.keyCode = 0;
    n.charCode = 0;
    n.ctrlKey = !1;
    n.altKey = !1;
    n.shiftKey = !1;
    n.metaKey = !1;
    n.On = !1;
    n.rc = null;
    n.se = function(a, b) {
        var c = this.type = a.type;
        Kg.call(this, c);
        this.target = a.target || a.srcElement;
        this.currentTarget = b;
        var d = a.relatedTarget;
        if (d) {
            if (B) {
                var f;
                a: {
                    try {
                        Mg(d.nodeName);
                        f = !0;
                        break a
                    } catch (g) {}
                    f = !1
                }
                f || (d = null)
            }
        } else "mouseover" == c ? d = a.fromElement : "mouseout" == c && (d = a.toElement);
        this.relatedTarget = d;
        this.offsetX = C || void 0 !== a.offsetX ? a.offsetX : a.layerX;
        this.offsetY = C || void 0 !== a.offsetY ? a.offsetY : a.layerY;
        this.clientX = void 0 !== a.clientX ? a.clientX : a.pageX;
        this.clientY = void 0 !== a.clientY ? a.clientY :
            a.pageY;
        this.screenX = a.screenX || 0;
        this.screenY = a.screenY || 0;
        this.button = a.button;
        this.keyCode = a.keyCode || 0;
        this.charCode = a.charCode || ("keypress" == c ? a.keyCode : 0);
        this.ctrlKey = a.ctrlKey;
        this.altKey = a.altKey;
        this.shiftKey = a.shiftKey;
        this.metaKey = a.metaKey;
        this.On = zb ? a.metaKey : a.ctrlKey;
        this.state = a.state;
        this.rc = a;
        a.defaultPrevented && this.preventDefault();
        delete this.De
    };

    function Pg(a) {
        return (Eg ? 0 == a.rc.button : "click" == a.type ? !0 : !!(a.rc.button & Og[0])) && !(C && zb && a.ctrlKey)
    }
    n.stopPropagation = function() {
        Ng.c.stopPropagation.call(this);
        this.rc.stopPropagation ? this.rc.stopPropagation() : this.rc.cancelBubble = !0
    };
    n.preventDefault = function() {
        Ng.c.preventDefault.call(this);
        var a = this.rc;
        if (a.preventDefault) a.preventDefault();
        else if (a.returnValue = !1, Gg) try {
            if (a.ctrlKey || 112 <= a.keyCode && 123 >= a.keyCode) a.keyCode = -1
        } catch (b) {}
    };
    n.k = ba();
    var Qg = "closure_listenable_" + (1E6 * Math.random() | 0);

    function Rg(a) {
        return !(!a || !a[Qg])
    }
    var Sg = 0;

    function Tg(a, b, c, d, f, g) {
        this.md = a;
        this.Cr = b;
        this.src = c;
        this.type = d;
        this.capture = !!f;
        this.qf = g;
        this.key = ++Sg;
        this.$d = this.bg = !1
    }

    function Ug(a) {
        a.$d = !0;
        a.md = null;
        a.Cr = null;
        a.src = null;
        a.qf = null
    };
    var Vg = {},
        Wg = {},
        Xg = {},
        Yg = {};

    function Zg(a, b, c, d, f) {
        if (ia(b)) {
            for (var g = 0; g < b.length; g++) Zg(a, b[g], c, d, f);
            return null
        }
        c = $g(c);
        return Rg(a) ? a.g(b, c, d, f) : ah(a, b, c, !1, d, f)
    }

    function ah(a, b, c, d, f, g) {
        if (!b) throw Error("Invalid event type");
        f = !!f;
        var h = Wg;
        b in h || (h[b] = {
            O: 0
        });
        h = h[b];
        f in h || (h[f] = {
            O: 0
        }, h.O++);
        var h = h[f],
            k = na(a),
            m;
        if (h[k]) {
            m = h[k];
            for (var p = 0; p < m.length; p++)
                if (h = m[p], h.md == c && h.qf == g) {
                    if (h.$d) break;
                    d || (m[p].bg = !1);
                    return m[p]
                }
        } else m = h[k] = [], h.O++;
        p = bh();
        h = new Tg(c, p, a, b, f, g);
        h.bg = d;
        p.src = a;
        p.md = h;
        m.push(h);
        Xg[k] || (Xg[k] = []);
        Xg[k].push(h);
        a.addEventListener ? a.addEventListener(b, p, f) : a.attachEvent(b in Yg ? Yg[b] : Yg[b] = "on" + b, p);
        return Vg[h.key] = h
    }

    function bh() {
        var a = ch,
            b = Fg ? function(c) {
                return a.call(b.src, b.md, c)
            } : function(c) {
                c = a.call(b.src, b.md, c);
                if (!c) return c
            };
        return b
    }

    function dh(a, b, c, d, f) {
        if (ia(b)) {
            for (var g = 0; g < b.length; g++) dh(a, b[g], c, d, f);
            return null
        }
        c = $g(c);
        return Rg(a) ? a.mk(b, c, d, f) : ah(a, b, c, !0, d, f)
    }

    function eh(a, b, c, d, f) {
        if (ia(b))
            for (var g = 0; g < b.length; g++) eh(a, b[g], c, d, f);
        else if (c = $g(c), Rg(a)) a.tb(b, c, d, f);
        else if (d = !!d, a = fh(a, b, d))
            for (g = 0; g < a.length; g++)
                if (a[g].md == c && a[g].capture == d && a[g].qf == f) {
                    gh(a[g]);
                    break
                }
    }

    function gh(a) {
        if (ka(a) || !a || a.$d) return !1;
        var b = a.src;
        if (Rg(b)) return hh(b.Kc, a);
        var c = a.type,
            d = a.Cr,
            f = a.capture;
        b.removeEventListener ? b.removeEventListener(c, d, f) : b.detachEvent && b.detachEvent(c in Yg ? Yg[c] : Yg[c] = "on" + c, d);
        b = na(b);
        Xg[b] && (d = Xg[b], kb(d, a), 0 == d.length && delete Xg[b]);
        Ug(a);
        if (d = Wg[c][f][b]) kb(d, a), 0 == d.length && (delete Wg[c][f][b], Wg[c][f].O--), 0 == Wg[c][f].O && (delete Wg[c][f], Wg[c].O--), 0 == Wg[c].O && delete Wg[c];
        delete Vg[a.key];
        return !0
    }

    function ih(a) {
        var b = 0;
        if (null != a)
            if (a && Rg(a)) a.Kc && a.Kc.wd(void 0);
            else {
                if (a = na(a), Xg[a]) {
                    a = Xg[a];
                    for (var c = a.length - 1; 0 <= c; c--) gh(a[c]), b++
                }
            } else Hc(Vg, function(a) {
            gh(a);
            b++
        })
    }

    function fh(a, b, c) {
        var d = Wg;
        return b in d && (d = d[b], c in d && (d = d[c], a = na(a), d[a])) ? d[a] : null
    }

    function jh(a, b, c) {
        var d = 1;
        b = na(b);
        if (a[b])
            for (a = ob(a[b]), b = 0; b < a.length; b++) {
                var f = a[b];
                f && !f.$d && (d &= !1 !== kh(f, c))
            }
        return Boolean(d)
    }

    function kh(a, b) {
        var c = a.md,
            d = a.qf || a.src;
        a.bg && gh(a);
        return c.call(d, b)
    }

    function ch(a, b) {
        if (a.$d) return !0;
        var c = a.type,
            d = Wg;
        if (!(c in d)) return !0;
        var d = d[c],
            f, g;
        if (!Fg) {
            f = b || ea("window.event");
            var c = !0 in d,
                h = !1 in d;
            if (c) {
                if (0 > f.keyCode || void 0 != f.returnValue) return !0;
                a: {
                    var k = !1;
                    if (0 == f.keyCode) try {
                        f.keyCode = -1;
                        break a
                    } catch (m) {
                        k = !0
                    }
                    if (k || void 0 == f.returnValue) f.returnValue = !0
                }
            }
            k = new Ng;
            k.se(f, this);
            f = !0;
            try {
                if (c) {
                    for (var p = [], r = k.currentTarget; r; r = r.parentNode) p.push(r);
                    g = d[!0];
                    for (var s = p.length - 1; !k.De && 0 <= s; s--) k.currentTarget = p[s], f &= jh(g, p[s], k);
                    if (h)
                        for (g = d[!1],
                            s = 0; !k.De && s < p.length; s++) k.currentTarget = p[s], f &= jh(g, p[s], k)
                } else f = kh(a, k)
            } finally {
                p && (p.length = 0)
            }
            return f
        }
        d = new Ng(b, this);
        return f = kh(a, d)
    }
    var lh = "__closure_events_fn_" + (1E9 * Math.random() >>> 0);

    function $g(a) {
        return la(a) ? a : a[lh] || (a[lh] = function(b) {
            return a.handleEvent(b)
        })
    };

    function mh(a) {
        this.src = a;
        this.Yb = {};
        this.ll = 0
    }
    mh.prototype.add = function(a, b, c, d, f) {
        var g = this.Yb[a];
        g || (g = this.Yb[a] = [], this.ll++);
        var h = nh(g, b, d, f); - 1 < h ? (a = g[h], c || (a.bg = !1)) : (a = new Tg(b, null, this.src, a, !!d, f), a.bg = c, g.push(a));
        return a
    };
    mh.prototype.remove = function(a, b, c, d) {
        if (!(a in this.Yb)) return !1;
        var f = this.Yb[a];
        b = nh(f, b, c, d);
        return -1 < b ? (Ug(f[b]), lb(f, b), 0 == f.length && (delete this.Yb[a], this.ll--), !0) : !1
    };

    function hh(a, b) {
        var c = b.type;
        if (!(c in a.Yb)) return !1;
        var d = kb(a.Yb[c], b);
        d && (Ug(b), 0 == a.Yb[c].length && (delete a.Yb[c], a.ll--));
        return d
    }
    mh.prototype.wd = function(a) {
        var b = 0,
            c;
        for (c in this.Yb)
            if (!a || c == a) {
                for (var d = this.Yb[c], f = 0; f < d.length; f++) ++b, d[f].$d = !0;
                delete this.Yb[c];
                this.ll--
            }
        return b
    };
    mh.prototype.rm = function(a, b, c, d) {
        a = this.Yb[a];
        var f = -1;
        a && (f = nh(a, b, c, d));
        return -1 < f ? a[f] : null
    };

    function nh(a, b, c, d) {
        for (var f = 0; f < a.length; ++f) {
            var g = a[f];
            if (!g.$d && g.md == b && g.capture == !!c && g.qf == d) return f
        }
        return -1
    };

    function O() {
        yg.call(this);
        this.Kc = new mh(this);
        this.Ts = this
    }
    y(O, yg);
    O.prototype[Qg] = !0;
    n = O.prototype;
    n.Ae = null;
    n.Cb = ca("Ae");
    n.addEventListener = function(a, b, c, d) {
        Zg(this, a, b, c, d)
    };
    n.removeEventListener = function(a, b, c, d) {
        eh(this, a, b, c, d)
    };
    n.dispatchEvent = function(a) {
        var b, c = this.Ae;
        if (c)
            for (b = []; c; c = c.Ae) b.push(c);
        var c = this.Ts,
            d = a.type || a;
        if (v(a)) a = new Kg(a, c);
        else if (a instanceof Kg) a.target = a.target || c;
        else {
            var f = a;
            a = new Kg(d, c);
            Rc(a, f)
        }
        var f = !0,
            g;
        if (b)
            for (var h = b.length - 1; !a.De && 0 <= h; h--) g = a.currentTarget = b[h], f = oh(g, d, !0, a) && f;
        a.De || (g = a.currentTarget = c, f = oh(g, d, !0, a) && f, a.De || (f = oh(g, d, !1, a) && f));
        if (b)
            for (h = 0; !a.De && h < b.length; h++) g = a.currentTarget = b[h], f = oh(g, d, !1, a) && f;
        return f
    };
    n.k = function() {
        O.c.k.call(this);
        this.Kc && this.Kc.wd(void 0);
        this.Ae = null
    };
    n.g = function(a, b, c, d) {
        return this.Kc.add(a, b, !1, c, d)
    };
    n.mk = function(a, b, c, d) {
        return this.Kc.add(a, b, !0, c, d)
    };
    n.tb = function(a, b, c, d) {
        return this.Kc.remove(a, b, c, d)
    };

    function oh(a, b, c, d) {
        b = a.Kc.Yb[b];
        if (!b) return !0;
        b = ob(b);
        for (var f = !0, g = 0; g < b.length; ++g) {
            var h = b[g];
            if (h && !h.$d && h.capture == c) {
                var k = h.md,
                    m = h.qf || h.src;
                h.bg && hh(a.Kc, h);
                f = !1 !== k.call(m, d) && f
            }
        }
        return f && !1 != d.Pr
    }
    n.rm = function(a, b, c, d) {
        return this.Kc.rm(a, b, c, d)
    };

    function ph(a, b) {
        O.call(this);
        this.Th = a || 1;
        this.Sg = b || q;
        this.Kl = w(this.fy, this);
        this.gn = ta()
    }
    y(ph, O);
    n = ph.prototype;
    n.enabled = !1;
    n.da = null;
    n.setInterval = function(a) {
        this.Th = a;
        this.da && this.enabled ? (this.stop(), this.start()) : this.da && this.stop()
    };
    n.fy = function() {
        if (this.enabled) {
            var a = ta() - this.gn;
            0 < a && a < 0.8 * this.Th ? this.da = this.Sg.setTimeout(this.Kl, this.Th - a) : (this.da && (this.Sg.clearTimeout(this.da), this.da = null), this.dispatchEvent(qh), this.enabled && (this.da = this.Sg.setTimeout(this.Kl, this.Th), this.gn = ta()))
        }
    };
    n.start = function() {
        this.enabled = !0;
        this.da || (this.da = this.Sg.setTimeout(this.Kl, this.Th), this.gn = ta())
    };
    n.stop = function() {
        this.enabled = !1;
        this.da && (this.Sg.clearTimeout(this.da), this.da = null)
    };
    n.k = function() {
        ph.c.k.call(this);
        this.stop();
        delete this.Sg
    };
    var qh = "tick";

    function I(a, b, c) {
        if (la(a)) c && (a = w(a, c));
        else if (a && "function" == typeof a.handleEvent) a = w(a.handleEvent, a);
        else throw Error("Invalid listener argument");
        return 2147483647 < b ? -1 : q.setTimeout(a, b || 0)
    }

    function rh(a) {
        q.clearTimeout(a)
    };

    function sh(a, b) {
        b && (a = w(a, b));
        th.push(a);
        uh()
    }
    var th = [],
        vh = [];

    function wh() {
        for (; vh.length;) vh.pop().ja()
    }

    function xh() {
        try {
            wh();
            for (var a, b = 0; b < th.length; ++b) try {
                a = !0, th[b](), a = !1
            } finally {
                wh(), a && th.splice(0, b + 1)
            }
            th.length = 0
        } finally {
            0 < vh.length + th.length && I(xh, 0)
        }
    }

    function uh() {
        1 === vh.length + th.length && I(xh, 0)
    }
    Zg(window, "focus", xh);

    function yh(a, b, c, d, f, g) {
        jc.call(this, f, g);
        this.jn = a;
        this.Wl = [];
        this.Ip = !!b;
        this.Ct = !!c;
        this.lt = !!d;
        for (b = this.Uq = 0; b < a.length; b++) oc(a[b], w(this.$p, this, b, !0), w(this.$p, this, b, !1));
        0 != a.length || this.Ip || this.aa(this.Wl)
    }
    y(yh, jc);
    yh.prototype.$p = function(a, b, c) {
        this.Uq++;
        this.Wl[a] = [b, c];
        this.Mc || (this.Ip && b ? this.aa([a, c]) : this.Ct && !b ? this.ma(c) : this.Uq == this.jn.length && this.aa(this.Wl));
        this.lt && !b && (c = null);
        return c
    };
    yh.prototype.ma = function(a) {
        yh.c.ma.call(this, a);
        for (a = 0; a < this.jn.length; a++) this.jn[a].cancel()
    };

    function zh(a) {
        if (1 === arguments.length) return new G(a);
        var b = [];
        z(arguments, function(a) {
            b.push(a instanceof jc ? a : qc(a))
        });
        return new Ah(b)
    }

    function Bh(a) {
        v(a) && (a = new N(a));
        var b = new G;
        b.ma(a);
        return b
    }

    function G(a) {
        jc.call(this);
        t(a) && (a instanceof jc ? oc(a, this.aa, this.ma, this) : this.aa(a))
    }
    y(G, jc);

    function Ch(a, b, c) {
        var d, f = b.length,
            g;
        1 < f && (g = b[f - 1], "object" != typeof g || (null == g || ia(g)) || (d = g, b = 2 === f ? b[0] : rb(b, 0, f - 1)));
        Dh(a, b, c, d);
        return a
    }

    function Dh(a, b, c, d) {
        var f = d || null;
        b && (ja(b) ? z(b, function(a) {
            Dh(this, a, c, f)
        }, a) : c.call(a, Eh(b, f), f))
    }

    function Eh(a, b) {
        return 1 >= a.length ? a : function(c) {
            if (ia(c)) {
                var d = [];
                z(c, function(a) {
                    d.push(a[1])
                });
                return a.apply(b, d)
            }
            return a.call(b, c)
        }
    }
    G.prototype.el = function(a, b, c) {
        Dh(this, a, jc.prototype.Xf, c);
        Dh(this, b, jc.prototype.zl, c);
        return this
    };
    G.prototype.Xe = function(a, b) {
        return Ch(this, arguments, jc.prototype.Us)
    };
    G.prototype.n = function(a, b) {
        return Ch(this, arguments, jc.prototype.Xf)
    };
    G.prototype.Mb = function(a, b) {
        return Ch(this, arguments, jc.prototype.zl)
    };

    function Ah(a) {
        G.call(this, new yh(a, !1, !0))
    }
    y(Ah, G);

    function P(a, b, c) {
        Kg.call(this, a, b);
        c && Rc(this, c);
        b && la(b.r) && (a = b.r(!0)) && (this.session = a)
    }
    y(P, Kg);
    af("event", P);
    P.prototype.Fa = function() {
        var a = {},
            b;
        for (b in this) this.hasOwnProperty(b) && "currentTarget" !== b && (a[b] = this[b]);
        return a
    };
    P.prototype.toString = function() {
        return lf(this.Fa())
    };

    function Fh(a, b, c, d) {
        P.call(this, a, b);
        this.stream = c;
        this.reason = d || null
    }
    y(Fh, P);

    function Gh(a) {
        yg.call(this);
        this.fc = a;
        this.ya = {}
    }
    y(Gh, yg);
    var Hh = [];
    n = Gh.prototype;
    n.g = function(a, b, c, d, f) {
        ia(b) || (Hh[0] = b, b = Hh);
        for (var g = 0; g < b.length; g++) {
            var h = Zg(a, b[g], c || this, d || !1, f || this.fc || this);
            this.ya[h.key] = h
        }
        return this
    };
    n.mk = function(a, b, c, d, f) {
        if (ia(b))
            for (var g = 0; g < b.length; g++) this.mk(a, b[g], c, d, f);
        else a = dh(a, b, c || this, d, f || this.fc || this), this.ya[a.key] = a;
        return this
    };
    n.tb = function(a, b, c, d, f) {
        if (ia(b))
            for (var g = 0; g < b.length; g++) this.tb(a, b[g], c, d, f);
        else {
            a: if (f = f || this.fc || this, d = !!d, c = $g(c || this), Rg(a)) a = a.rm(b, c, d, f);
                else {
                    if (a = fh(a, b, d))
                        for (b = 0; b < a.length; b++)
                            if (!a[b].$d && a[b].md == c && a[b].capture == d && a[b].qf == f) {
                                a = a[b];
                                break a
                            }
                    a = null
                }a && (gh(a), delete this.ya[a.key])
        }
        return this
    };
    n.wd = function() {
        Hc(this.ya, gh);
        this.ya = {}
    };
    n.k = function() {
        Gh.c.k.call(this);
        this.wd()
    };
    n.handleEvent = function() {
        throw Error("EventHandler.handleEvent not implemented");
    };

    function Ih(a) {
        P.call(this, "error");
        this.error = a
    }
    y(Ih, P);
    Ih.prototype.getError = e("error");

    function Jh(a, b) {
        P.call(this, a, b)
    }
    y(Jh, P);
    Jh.prototype.Q = e("target");

    function Kh(a, b, c, d, f) {
        P.call(this, a, b);
        this.key = c;
        this.val = d;
        this.oldVal = f
    }
    y(Kh, Jh);
    Kh.prototype.getKey = e("key");
    Kh.prototype.ba = e("val");

    function Lh(a, b, c, d) {
        P.call(this, a, b);
        this.item = c;
        this.index = d
    }
    y(Lh, P);
    Lh.prototype.Q = e("item");

    function Q(a, b) {
        O.call(this);
        a && this.Cb(a);
        b && (this.Bb = b);
        this.Qj = new Od
    }
    y(Q, O);
    Q.prototype.G = null;
    Ue("eventTarget", Q);
    var Mh = /\s+/;
    n = Q.prototype;
    n.at = !1;
    n.Bb = !1;
    n.Cf = null;
    n.ud = null;
    n.zb = "";
    n.P = null;
    n.k = function() {
        this.Bb = !1;
        this.ud = this.Cf = null;
        this.P && (this.P.F(), this.P = null);
        Q.c.k.call(this)
    };
    n.C = function() {
        return this.P || (this.P = new Gh(this))
    };
    n.toString = function() {
        return lf(this)
    };
    n.j = e("zb");
    n.Ca = function(a, b) {
        var c = t(a) ? a : !0,
            d = t(b) ? b : !0;
        this.Bb !== c && (c ? (c = this.Ae) && !c.Bb ? dh(c, "ready", this.Ca, !1, this) : this.jc(d) : (this.Bb = !1, d && this.dispatchEvent("unready")))
    };
    n.jc = function(a) {
        this.Bb = !0;
        a && (this.dispatchEvent("ready"), this.dispatchEvent("ready:" + Ve(this), null, !0));
        this.Cf && (z(this.Cf, function(a) {
            this.dispatchEvent(a)
        }, this), this.Cf = null)
    };
    n.dispatchEvent = function(a, b, c) {
        return this.Bb || this.at ? this.vj(a, b, c) : (this.Cf = this.Cf || [], this.Cf.push(a), !0)
    };

    function Nh(a, b, c, d, f) {
        b = new Kh("change:" + b, a, b, d, c);
        a.dispatchEvent(b, null, !0);
        b.type = "change";
        a.dispatchEvent(b, null, f)
    }

    function Oh(a, b, c) {
        a.dispatchEvent("exitState:" + b);
        a.dispatchEvent("enterState:" + c)
    }
    n.vj = function(a, b, c) {
        a.type || (a = new P(String(a), this, b));
        !c && this.rk() && F(this.G, "\x3c\x3c" + lf(a, !1) + "\x3e\x3e");
        c = O.prototype.dispatchEvent.call(this, a);
        if (this.ud)
            for (var d = this.ud, f = 0; !1 !== c && f < d.length; ++f) c = d[f].dispatchEvent(a, b, !0);
        return c
    };
    n.error = function(a, b) {
        v(a) && (a = new N(a, b));
        this.G.log(be, b || a.message || "ERROR", a);
        this.dispatchEvent(new Ih(a));
        return a
    };

    function Ph(a, b, c, d) {
        d || (d = a);
        return b + "__" + na(c) + "__" + na(d)
    }

    function Qh(a, b, c, d) {
        b = Ph(a, b, c, d);
        var f = a.Qj.get(b, null);
        f || (f = function(a) {
            try {
                c.call(d || this, a)
            } catch (b) {
                this.G.log(be, (b.message || "ERROR") + "\n" + b.stack, void 0)
            }
        }, a.Qj.set(b, f));
        return f
    }
    n.on = function(a, b, c) {
        return Rh(this, a, b, c, !0)
    };

    function Rh(a, b, c, d, f) {
        var g;
        z(b.split(Mh), function(a) {
            g = f ? Qh(this, a, c, d) : c;
            this.addEventListener(a, g, !1, d)
        }, a);
        return a
    }
    n.vn = function(a, b, c) {
        return Sh(this, a, b, c, !0)
    };

    function Sh(a, b, c, d, f) {
        var g;
        z(b.split(Mh), function(a) {
            var b;
            if (f) {
                b = Ph(this, a, c, d);
                var m = this.Qj.get(b, null);
                m && this.Qj.remove(b);
                b = m
            } else b = c;
            g = b;
            null != g && this.removeEventListener(a, g, !1, d)
        }, a);
        return a
    }
    n.In = function(a, b, c) {
        return Th(this, a, b, c, !0)
    };

    function Th(a, b, c, d, f) {
        var g;
        z(b.split(Mh), function(a) {
            g = f ? Qh(this, b, c, d) : c;
            dh(this, a, g, !1, d)
        }, a);
        return a
    }

    function Uh(a, b) {
        a.ud = a.ud ? ob(a.ud) : [];
        jb(a.ud, b)
    }
    n.rk = function() {
        return fe.value >= ie(this.G).value
    };
    n.h = function(a, b) {
        if (this.rk()) {
            var c;
            c = 2 === arguments.length ? b : Sc.apply(null, rb(arguments, 1));
            var d = lf(this.toString());
            c = lf(c, !1);
            return F(this.G, a + "\x3c" + d + "\x3e(" + c + ")")
        }
    };
    n.Tm = function(a, b) {
        if (de.value >= ie(this.G).value) {
            var c;
            c = 2 === arguments.length ? b : Sc.apply(null, rb(arguments, 1));
            var d = lf(this.toString());
            c = lf(c, !1);
            this.G.info(a + "\x3c" + d + "\x3e(" + c + ")")
        }
    };

    function Vh(a) {
        Q.call(this);
        this.W = a || null;
        this.Uc = void 0;
        this.Hf = 1
    }
    y(Vh, Q);
    n = Vh.prototype;
    n.W = null;
    n.hj = !1;
    n.toString = function() {
        return this.l()
    };
    n.La = function() {
        this.Hf++;
        return this
    };
    n.ja = function() {
        0 === --this.Hf && this.F()
    };
    n.vb = function() {
        vh.push(this);
        uh();
        return this
    };

    function R(a, b) {
        var c = a.get(b);
        return null != c ? String(c) : ""
    }

    function Wh(a, b) {
        var c = a.get(b);
        return c ? Number(c) : 0
    }

    function Xh(a, b) {
        var c = a.get(b);
        return v(c) ? "true" === c.toLowerCase() ? !0 : !1 : Boolean(c)
    }
    n.l = function() {
        return this.Uc || ""
    };
    n.r = function(a) {
        var b = this.W && this.W.r();
        if (!b && !a) throw new N("ILLEGAL_STATE", "Object not in cache.");
        return b
    };
    n.k = function() {
        this.Uc = void 0;
        this.W && (this.W = null);
        Vh.c.k.call(this)
    };
    n.vv = function() {
        (this.hj = !1) || this.Xq();
        this.ja()
    };
    n.Xq = ba();

    function L(a, b, c, d) {
        Vh.call(this);
        this.ua = {};
        this.Ya = this.Aa = null;
        c && this.set(c);
        a && this.Ne(a);
        b && this.$b(b);
        (a = d) || (a = Ze(ef, this.ua, null, null, this));
        a && (this.Ia = a)
    }
    y(L, Vh);
    n = L.prototype;
    n.Ia = null;
    n.Br = null;
    n.bd = null;
    n.na = 0;
    n.Ed = 0;
    n.k = function() {
        this.Ia && la(this.Ia.F) && this.Ia.F();
        if (this.W) {
            if (this.na & 7) {
                var a = this.r(!0);
                if (a) {
                    var b = this.l();
                    a.sk ? new G(b) : a.he("unsubscribe", b, b)
                }
                this.na = 0
            }
            this.Ca(!1, !1);
            Yh(this);
            Zh(this.W, this.Uc);
            this.W = null;
            this.Ed = 0
        }
        for (var c in this.Aa) a = this.Aa[c], this.Aa.hasOwnProperty(c) && a instanceof Vh && a.ja();
        this.Aa = this.ua = null;
        this.ht && (this.ht = null);
        this.Ia && (this.Ia = null);
        L.c.k.call(this)
    };
    n.Fa = function() {
        var a = {};
        this.forEach(function(b, c) {
            a[c] = gf(b)
        });
        "path" in a && delete a.id;
        return a
    };
    n.valueOf = function() {
        return this.ua || this.Aa
    };

    function $h(a, b) {
        b !== a.Br && (a.Br = b, b.Aa || (b.Aa = {}), a.ua = Qe(b.ua, a.ua), a.Aa = Qe(b.Aa, a.Aa), a.C().g(b, "change", a.ww, !1, a))
    }
    n.vj = function(a, b, c) {
        c = L.c.vj.call(this, a, b, c);
        this.Ia instanceof Q && (v(a) || (a.target = this.Ia), this.Ia.vj(a, b, !0));
        return c
    };
    n.remove = function() {
        return 512 === (this.na & 512) ? new G(this.l()) : this.r().remove(this.l())
    };
    n.sd = function(a) {
        return this.r().sd(this.l(), a)
    };
    n.Ra = function(a) {
        return this.r().Ra(this.l(), a)
    };
    n.forEach = function(a, b) {
        var c = b || this,
            d;
        for (d in this.ua) a.call(c, this.get(d), d)
    };

    function ai(a) {
        var b = {},
            c;
        for (c in a.Ya)
            if (2 === a.Ya[c]) {
                var d = a.get(c);
                b[c] = null != d ? d : null
            }
        return b
    }
    n.getParent = function() {
        var a = this.Ae;
        return a instanceof L ? a : null
    };
    n.get = function(a) {
        return this.Gh(a) || this.ua[a]
    };

    function bi(a, b, c) {
        ci(a, c, b.get(c));
        a.C().g(b, "change:" + c, a.qv)
    }
    n.qv = function(a) {
        ci(this, a.getKey(), a.ba())
    };
    n.set = function(a, b, c) {
        if (ma(a))
            for (var d in a) ci(this, d, a[d], !!b);
        else ci(this, a, b, c);
        return this
    };

    function di(a, b, c) {
        b = t(b) ? b : 1;
        var d = Wh(a, "sessionCount"),
            d = isNaN(d) ? b : d + b;
        ci(a, "sessionCount", d, c)
    }
    n.X = function() {
        return this.ua.type || "entity"
    };
    n.Ne = function(a) {
        var b = this.ua.type;
        if (b && a !== b) throw this.error(sf("type", a));
        "entity" !== a && ei(this, "type", a);
        return this
    };
    n.$b = function(a) {
        S(this, "id", a.substr(a.lastIndexOf("/") + 1));
        return ei(this, "path", a)
    };
    n.l = function() {
        return this.Uc || this.ua.path || this.j() || ""
    };
    n.nb = function(a) {
        if ("path" in this.ua) {
            var b;
            b = this.l() || "/";
            b = fi(gi(b), a);
            ei(this, "path", b)
        }
        return ei(this, "id", a)
    };
    n.j = function() {
        return this.ua.id
    };
    n.fo = function(a) {
        return ei(this, "displayName", a)
    };
    n.Nd = function() {
        return this.ua.displayName || this.j()
    };
    n.Ej = function() {
        return this.ua.iss
    };
    n.om = function() {
        return this.ua.iat
    };
    n.Yp = function() {
        return this.ua.seq
    };
    n.Vx = function(a) {
        return S(this, "seq", Number(a), !0)
    };
    n.jc = function(a) {
        L.c.jc.call(this, a);
        0 === this.Ed && (this.Ed = 1);
        for (var b in this.Aa) this.Aa.hasOwnProperty(b) && this.Aa[b].Ca(!0, a);
        this.Ia && this.Ia instanceof Q && this.Ia.Ca(!0, a)
    };
    n.Al = function(a, b) {
        this.W = a;
        this.Uc = this.l();
        a.r() && (this.Ed = 2);
        var c = this.l();
        hi(this.W, this.l(), w(function(a) {
            var b = a.getParent();
            (!b || b.l().length < c.length) && a.Cb(this)
        }, this));
        var d = ii(this.W, this.l());
        this.ko(d);
        b && ji(this, b, {
            props: this.ua
        })
    };

    function ji(a, b, c) {
        var d = new Jh(b, a);
        a.dispatchEvent(d, c);
        c = a.X();
        "entity" !== c && (d.type = b + ":" + c, a.dispatchEvent(d, null, !0))
    }
    n.Gh = function(a) {
        return this.Aa && this.Aa[a]
    };

    function ci(a, b, c, d) {
        kf(a, b, c) || S(a, b, c, d)
    }

    function ei(a, b, c) {
        return S(a, b, String(c), void 0)
    }

    function S(a, b, c, d) {
        var f = a.get(b);
        if (f === c) return a;
        var g;
        a.Aa && a.Aa.hasOwnProperty(b) && (g = a.Aa[b], a.C().tb(g, "change", a.pr), delete a.Aa[b]);
        t(c) ? ma(c) && (c instanceof ki || c instanceof Vh) ? (a.Aa || (a.Aa = {}), a.C().g(c, "change", a.pr, !1, a), a.Aa[b] = c.La(), a.ua[b] = c.valueOf()) : a.ua[b] = c : a.ua.hasOwnProperty(b) && delete a.ua[b];
        !d && (2 <= a.Ed && !/(^_)|(_$)|(^id$)/.test(b)) && (a.Ya || (a.Ya = {}), a.Ya[b] = a.Ed, a.hj || (a.La(), a.hj = !0, sh(a.vv, a)));
        a.Ia && kf(a.Ia, b, c, !0);
        !d && a.Bb && Nh(a, b, f, c);
        g && g.ja();
        return a
    }

    function Yh(a) {
        var b = a.Ae;
        hi(a.W, a.l(), w(function(a) {
            a.Ae === this && a.Cb(b)
        }, a));
        a.Cb(null)
    }
    n.ko = function(a) {
        this.Cb(a);
        this.Ca(!0, !1)
    };
    n.Eg = function() {
        this.na |= 512;
        ji(this, "remove")
    };
    n.Xq = function() {
        var a = Lc(this.Ya, 3);
        Lc(this.Ya, 2) && !a && li(this);
        for (var b in this.Ya) 1 === this.Ya[b] && delete this.Ya[b]
    };

    function li(a) {
        var b = a.r(!0);
        b && b.put(a.l(), ai(a))
    }

    function mi(a, b) {
        var c = a.Ed;
        c && (a.Ed = 1);
        try {
            var d = a.Yp(),
                f = b.seq;
            if (!(d && f && f <= d)) {
                var g = Pc(a.Ya);
                g.iat = "iat" in a.ua;
                for (var h in b) b.hasOwnProperty(h) && !g[h] && ci(a, h, b[h])
            }
        } finally {
            a.Ed = c
        }
        512 === (a.na & 512) && (a.na &= -513, ji(a, "add"))
    }
    n.ww = function(a) {
        this.Bb && (this != a.target && !this.ua.hasOwnProperty(a.getKey())) && (this.dispatchEvent(a, null, !0), a.type = "change:" + a.getKey(), this.dispatchEvent(a, null, !0), a.type = "change")
    };
    n.pr = function(a) {
        if (this.Bb)
            for (var b in this.Aa)
                if (this.Aa.hasOwnProperty(b) && this !== a.target && this.get(b) === a.target) {
                    Nh(this, b + "." + a.getKey(), a.oldVal, a.ba(), !0);
                    break
                }
    };
    ff("entity", L, ["type", "path", "$props"], "id", L.prototype.nb, "type", L.prototype.Ne, "seq", L.prototype.Vx, "$*", L.prototype.set);
    Ue("entity", L);

    function ki(a, b) {
        Q.call(this, b);
        this.H = a;
        a.Ia = this
    }
    y(ki, Q);
    n = ki.prototype;
    n.k = function() {
        this.H = null;
        ki.c.k.call(this)
    };
    n.Fa = function() {
        return this.H.Fa()
    };
    n.toString = function() {
        return this.H.toString()
    };
    n.valueOf = function() {
        return this.H.valueOf()
    };
    n.Q = e("H");
    n.X = function() {
        return this.H.X()
    };
    n.l = function() {
        return this.H.l()
    };
    n.j = function() {
        return this.H.j()
    };
    n.r = function(a) {
        return this.H.r(a)
    };
    n.ia = function() {
        return this.r().ia()
    };
    n.La = function() {
        this.H.La();
        return this
    };
    n.ja = function() {
        this.H.ja()
    };
    n.vb = function() {
        this.H.vb();
        return this
    };
    var ni = RegExp("^(?:([^:/?#.]+):)?(?://(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?\x3d[/#?]|$))?([^?#]+)?(?:\\?([^#]*))?(?:#(.*))?$");

    function oi(a) {
        if (pi) {
            pi = !1;
            var b = q.location;
            if (b) {
                var c = b.href;
                if (c && (c = (c = oi(c)[3] || null) && decodeURIComponent(c)) && c != b.hostname) throw pi = !0, Error();
            }
        }
        return a.match(ni)
    }
    var pi = C;

    function qi(a, b) {
        var c;
        a instanceof qi ? (this.vc = t(b) ? b : a.vc, ri(this, a.yd), si(this, a.Xi), ti(this, a.ff), this.Ii(a.rd), this.$b(a.l()), ui(this, a.lc.ib()), vi(this, a.Wb)) : a && (c = oi(String(a))) ? (this.vc = !!b, ri(this, c[1] || "", !0), si(this, c[2] || "", !0), ti(this, c[3] || "", !0), this.Ii(c[4]), this.$b(c[5] || "", !0), ui(this, c[6] || "", !0), vi(this, c[7] || "", !0)) : (this.vc = !!b, this.lc = new wi(null, 0, this.vc))
    }
    n = qi.prototype;
    n.yd = "";
    n.Xi = "";
    n.ff = "";
    n.rd = null;
    n.Uc = "";
    n.Wb = "";
    n.Lu = !1;
    n.vc = !1;
    n.toString = function() {
        var a = [],
            b = this.yd;
        b && a.push(xi(b, yi), ":");
        if (b = this.ff) {
            a.push("//");
            var c = this.Xi;
            c && a.push(xi(c, yi), "@");
            a.push(encodeURIComponent(String(b)));
            b = this.rd;
            null != b && a.push(":", String(b))
        }
        if (b = this.l()) this.ff && "/" != b.charAt(0) && a.push("/"), a.push(xi(b, "/" == b.charAt(0) ? zi : Ai));
        (b = this.lc.toString()) && a.push("?", b);
        (b = this.Wb) && a.push("#", xi(b, Bi));
        return a.join("")
    };

    function Ci(a, b) {
        var c = a.ib(),
            d = !!b.yd;
        d ? ri(c, b.yd) : d = !!b.Xi;
        d ? si(c, b.Xi) : d = !!b.ff;
        d ? ti(c, b.ff) : d = null != b.rd;
        var f = b.l();
        if (d) c.Ii(b.rd);
        else if (d = !!b.Uc) {
            if ("/" != f.charAt(0))
                if (a.ff && !a.Uc) f = "/" + f;
                else {
                    var g = c.l().lastIndexOf("/"); - 1 != g && (f = c.l().substr(0, g + 1) + f)
                }
            g = f;
            if (".." == g || "." == g) f = "";
            else if (-1 != g.indexOf("./") || -1 != g.indexOf("/.")) {
                for (var f = wa(g, "/"), g = g.split("/"), h = [], k = 0; k < g.length;) {
                    var m = g[k++];
                    "." == m ? f && k == g.length && h.push("") : ".." == m ? ((1 < h.length || 1 == h.length && "" != h[0]) && h.pop(),
                        f && k == g.length && h.push("")) : (h.push(m), f = !0)
                }
                f = h.join("/")
            } else f = g
        }
        d ? c.$b(f) : d = "" !== b.lc.toString();
        d ? ui(c, b.lc.toString() ? decodeURIComponent(b.lc.toString()) : "") : d = !!b.Wb;
        d && vi(c, b.Wb);
        return c
    }
    n.ib = function() {
        return new qi(this)
    };

    function ri(a, b, c) {
        Di(a);
        a.yd = c ? b ? decodeURIComponent(b) : "" : b;
        a.yd && (a.yd = a.yd.replace(/:$/, ""))
    }

    function si(a, b, c) {
        Di(a);
        a.Xi = c ? b ? decodeURIComponent(b) : "" : b
    }

    function ti(a, b, c) {
        Di(a);
        a.ff = c ? b ? decodeURIComponent(b) : "" : b
    }
    n.Ii = function(a) {
        Di(this);
        if (a) {
            a = Number(a);
            if (isNaN(a) || 0 > a) throw Error("Bad port number " + a);
            this.rd = a
        } else this.rd = null;
        return this
    };
    n.l = e("Uc");
    n.$b = function(a, b) {
        Di(this);
        this.Uc = b ? a ? decodeURIComponent(a) : "" : a;
        return this
    };

    function ui(a, b, c) {
        Di(a);
        b instanceof wi ? (a.lc = b, a.lc.ho(a.vc)) : (c || (b = xi(b, Ei)), a.lc = new wi(b, 0, a.vc))
    }
    n.oe = function() {
        return this.lc.toString()
    };

    function Fi(a, b, c) {
        Di(a);
        ia(c) || (c = [String(c)]);
        Gi(a.lc, b, c)
    }

    function vi(a, b, c) {
        Di(a);
        a.Wb = c ? b ? decodeURIComponent(b) : "" : b
    }

    function Di(a) {
        if (a.Lu) throw Error("Tried to modify a read-only Uri");
    }
    n.ho = function(a) {
        this.vc = a;
        this.lc && this.lc.ho(a);
        return this
    };

    function Hi(a) {
        return a instanceof qi ? a.ib() : new qi(a, void 0)
    }

    function Ii(a, b) {
        a instanceof qi || (a = Hi(a));
        b instanceof qi || (b = Hi(b));
        return Ci(a, b)
    }

    function xi(a, b) {
        return v(a) ? encodeURI(a).replace(b, Ji) : null
    }

    function Ji(a) {
        a = a.charCodeAt(0);
        return "%" + (a >> 4 & 15).toString(16) + (a & 15).toString(16)
    }
    var yi = /[#\/\?@]/g,
        Ai = /[\#\?:]/g,
        zi = /[\#\?]/g,
        Ei = /[\#\?@]/g,
        Bi = /#/g;

    function wi(a, b, c) {
        this.cc = a || null;
        this.vc = !!c
    }

    function Ki(a) {
        if (!a.Ka && (a.Ka = new Od, a.O = 0, a.cc))
            for (var b = a.cc.split("\x26"), c = 0; c < b.length; c++) {
                var d = b[c].indexOf("\x3d"),
                    f = null,
                    g = null;
                0 <= d ? (f = b[c].substring(0, d), g = b[c].substring(d + 1)) : f = b[c];
                f = Ea(f);
                f = Li(a, f);
                a.add(f, g ? Ea(g) : "")
            }
    }
    n = wi.prototype;
    n.Ka = null;
    n.O = null;
    n.gd = function() {
        Ki(this);
        return this.O
    };
    n.add = function(a, b) {
        Ki(this);
        this.cc = null;
        a = Li(this, a);
        var c = this.Ka.get(a);
        c || this.Ka.set(a, c = []);
        c.push(b);
        this.O++;
        return this
    };
    n.remove = function(a) {
        Ki(this);
        a = Li(this, a);
        return this.Ka.Ic(a) ? (this.cc = null, this.O -= this.Ka.get(a).length, this.Ka.remove(a)) : !1
    };
    n.clear = function() {
        this.Ka = this.cc = null;
        this.O = 0
    };
    n.Ic = function(a) {
        Ki(this);
        a = Li(this, a);
        return this.Ka.Ic(a)
    };
    n.ne = function() {
        Ki(this);
        for (var a = this.Ka.cb(), b = this.Ka.ne(), c = [], d = 0; d < b.length; d++)
            for (var f = a[d], g = 0; g < f.length; g++) c.push(b[d]);
        return c
    };
    n.cb = function(a) {
        Ki(this);
        var b = [];
        if (a) this.Ic(a) && (b = mb(b, this.Ka.get(Li(this, a))));
        else {
            a = this.Ka.cb();
            for (var c = 0; c < a.length; c++) b = mb(b, a[c])
        }
        return b
    };
    n.set = function(a, b) {
        Ki(this);
        this.cc = null;
        a = Li(this, a);
        this.Ic(a) && (this.O -= this.Ka.get(a).length);
        this.Ka.set(a, [b]);
        this.O++;
        return this
    };
    n.get = function(a, b) {
        var c = a ? this.cb(a) : [];
        return 0 < c.length ? String(c[0]) : b
    };

    function Gi(a, b, c) {
        a.remove(b);
        0 < c.length && (a.cc = null, a.Ka.set(Li(a, b), ob(c)), a.O += c.length)
    }
    n.toString = function() {
        if (this.cc) return this.cc;
        if (!this.Ka) return "";
        for (var a = [], b = this.Ka.ne(), c = 0; c < b.length; c++)
            for (var d = b[c], f = encodeURIComponent(String(d)), d = this.cb(d), g = 0; g < d.length; g++) {
                var h = f;
                "" !== d[g] && (h += "\x3d" + encodeURIComponent(String(d[g])));
                a.push(h)
            }
        return this.cc = a.join("\x26")
    };
    n.ib = function() {
        var a = new wi;
        a.cc = this.cc;
        this.Ka && (a.Ka = this.Ka.ib(), a.O = this.O);
        return a
    };

    function Li(a, b) {
        var c = String(b);
        a.vc && (c = c.toLowerCase());
        return c
    }
    n.ho = function(a) {
        a && !this.vc && (Ki(this), this.cc = null, Id(this.Ka, function(a, c) {
            var d = c.toLowerCase();
            c != d && (this.remove(c), Gi(this, d, a))
        }, this));
        this.vc = a
    };
    var Mi = He("vline.media"),
        Ni = "googActiveConnection googActualEncBitrate audioOutputLevel audioInputLevel googAvailableReceiveBandwidth googAvailableSendBandwidth googBucketDelay bytesReceived bytesSent googChannelId googCodecName googComponent googContentName googEchoCancellationQualityMin googEchoCancellationEchoDelayMedian googEchoCancellationEchoDelayStdDev googEchoCancellationReturnLoss googEchoCancellationReturnLossEnhancement googFirsReceived googFirsSent googFrameHeightReceived googFrameHeightSent googFrameRateReceived googFrameRateDecoded googFrameRateOutput googFrameRateInput googFrameRateSent googFrameWidthReceived googFrameWidthSent googInitiator googJitterReceived googLocalAddress googNacksReceived googNacksSent packetsReceived packetsSent packetsLost googReadable googRemoteAddress googRetransmitBitrate googRtt googTargetEncBitrate googTransmitBitrate transportId googTransportType googTrackId ssrc googWritable googLibjingleSession VideoBwe ssrc googTrack iceCandidate googTransport googComponent googCandidatePair bweforvideo".split(" ");

    function Oi(a, b) {
        if (b) {
            var c = b.audio,
                d = b.video,
                c = {
                    audio: c
                };
            a.video && (c.video = d);
            return c
        }
        var c = a.audio,
            f = (d = a.video) && a.hd,
            g = 640,
            h = 480;
        if ("auto" === f && (f = !1, q.location)) {
            var k;
            k = (new qi(q.location.href)).lc;
            k.Ic("hd") && (f = !!k.get("hd"));
            k = q.location.hash;
            1 < k.length && (k = new wi(k.substr(1)), k.Ic("hd") && (f = !!k.get("hd")))
        }
        f && Pi() && (g = 1280, h = 720);
        f = [{
            minWidth: g
        }, {
            minHeight: h
        }, {
            googLeakyBucket: !0
        }];
        d && (ma(d) || (d = {}), d.optional = d.optional ? d.optional.concat(f) : f);
        f = [{
            googEchoCancellation2: !0
        }];
        c && (ma(c) ||
            (c = {}), c.optional = c.optional ? c.optional.concat(f) : f);
        return {
            audio: c,
            video: d
        }
    }

    function Qi(a, b) {
        F(Mi, "Checking to see if old constraints " + ac(a) + " are compatible with " + ac(b));
        if (!b && a) return !0;
        if (!a || "boolean" === typeof a.audio && "boolean" === typeof b.audio && a.audio != b.audio) return !1;
        if ("boolean" === typeof a.video && "boolean" === typeof b.video) return a.video == b.video ? !0 : !1;
        var c = a.video.mandatory,
            d = b.video.mandatory;
        return typeof c != typeof d || c.maxFrameRate && d.maxFrameRate && c.maxFrameRate != d.maxFrameRate || c.maxHeight && d.maxHeight && (c.maxWidth && d.maxWidth) && (c.maxWidth != d.maxWidth ||
            c.maxHeight != d.maxHeight) ? !1 : !0
    }

    function Ri(a) {
        a = a.params;
        return {
            video: {
                mandatory: {
                    maxWidth: a.width,
                    maxHeight: a.height,
                    maxFrameRate: a.maxframerate
                }
            }
        }
    };
    var Si, Ti, Ui, Vi, Wi, Xi, Yi;
    Yi = Xi = Wi = Vi = Ui = Ti = Si = !1;
    var Zi = Ab();
    Zi && (-1 != Zi.indexOf("Firefox") ? Si = !0 : -1 != Zi.indexOf("Camino") ? Ti = !0 : -1 != Zi.indexOf("iPhone") || -1 != Zi.indexOf("iPod") ? Ui = !0 : -1 != Zi.indexOf("iPad") ? Vi = !0 : -1 != Zi.indexOf("Android") ? Wi = !0 : -1 != Zi.indexOf("Chrome") ? Xi = !0 : -1 != Zi.indexOf("Safari") && (Yi = !0));
    var $i = Si,
        aj = Ti,
        bj = Ui,
        cj = Vi,
        dj = Wi,
        ej = Xi,
        fj = Yi;

    function gj(a) {
        return (a = a.exec(Ab())) ? a[1] : ""
    }
    var hj = function() {
        if ($i) return gj(/Firefox\/([0-9.]+)/);
        if (A || Eb) return Jb;
        if (ej) return gj(/Chrome\/([0-9.]+)/);
        if (fj) return gj(/Version\/([0-9.]+)/);
        if (bj || cj) {
            var a = /Version\/(\S+).*Mobile\/(\S+)/.exec(Ab());
            if (a) return a[1] + "." + a[2]
        } else {
            if (dj) return (a = gj(/Android\s+([0-9.]+)/)) ? a : gj(/Version\/([0-9.]+)/);
            if (aj) return gj(/Camino\/([0-9.]+)/)
        }
        return ""
    }();

    function ij(a) {
        return 0 <= Wa(hj, a)
    };

    function jj() {
        return Fb || dj
    }

    function kj(a) {
        C && a.webkitCancelFullScreen ? a.webkitCancelFullScreen() : B && a.mozCancelFullScreen ? a.mozCancelFullScreen() : a.cancelFullScreen && a.cancelFullScreen()
    }

    function lj() {
        return $i && !ij(21) ? !1 : !(!window.webkitRTCPeerConnection && !window.mozRTCPeerConnection)
    }

    function Pi() {
        return ej && ij("24")
    };
    var mj = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".split("");

    function nj(a) {
        a || (a = 16);
        var b;
        b = Math.ceil(a / 4);
        var c = [],
            d;
        d = Kf(void 0);
        var f;
        if (d === Rf) throw new wf("generator isn't seeded");
        if (d & Yf) {
            d = !(d & Zf);
            f = [];
            var g = 0,
                h;
            Xf = f[0] = (new Date).valueOf() + 3E4;
            for (h = 0; 16 > h; h++) f.push(4294967296 * Math.random() | 0);
            for (h = 0; h < Nf.length && (f = f.concat(Gf(Nf[h])), g += Pf[h], Pf[h] = 0, d || !($f & 1 << h)); h++);
            $f >= 1 << Nf.length && (Nf.push(new Ef), Pf.push(0));
            Qf -= g;
            g > Tf && (Tf = g);
            $f++;
            ag = Ff(ag.concat(f));
            cg = new xf(ag);
            for (d = 0; 4 > d && (bg[d] = bg[d] + 1 | 0, !bg[d]); d++);
        }
        for (d = 0; d < b; d += 4) 0 === (d + 1) %
            65536 && gg(), f = fg(), c.push(f[0], f[1], f[2], f[3]);
        gg();
        b = c.slice(0, b);
        var c = new Za,
            k;
        for (f = d = 0; d < a; ++d) 0 === d % 4 && (k = b[f++]), c.append(mj[(k & 255) % mj.length]), k >>= 8;
        return c.toString()
    }
    if (!Kf()) {
        var oj, pj = [];
        for (oj = 0; 32 > oj; ++oj) pj.push(Math.floor(8388607 * Math.random()));
        If(pj, 1024, "Math.random");
        if (!dg) {
            if (window.addEventListener) window.addEventListener("load", ig, !1), window.addEventListener("mousemove", hg, !1);
            else if (document.attachEvent) document.attachEvent("onload", ig), document.attachEvent("onmousemove", hg);
            else throw new vf("can't attach event");
            dg = !0
        }
    };

    function qj(a, b, c, d) {
        Q.call(this);
        this.kb = a;
        this.qk = b;
        this.zb = nj();
        this.Tg = null;
        this.ek = this.yo = this.Cc = !1;
        this.Uu = this.Pl = 0;
        this.Ix = this.Hx = !1;
        this.Ba = null;
        this.Fk = "";
        this.Hf = 1;
        this.bi = d || null;
        this.jb = c;
        this.Pi = !0;
        this.kb.onended = w(this.Hv, this);
        this.Zo();
        this.Ca()
    }
    y(qj, Q);
    Ue("mediaStream", qj);
    n = qj.prototype;
    n.k = function() {
        this.stop();
        this.Tg = this.kb = null;
        qj.c.k.call(this)
    };
    n.Fa = function() {
        return {
            id: this.j(),
            label: this.jd()
        }
    };
    n.Ut = e("kb");

    function rj(a) {
        return a.kb.getAudioTracks ? a.kb.getAudioTracks() : a.kb.audioTracks ? a.kb.audioTracks : []
    }

    function sj(a) {
        return a.kb.getVideoTracks ? a.kb.getVideoTracks() : a.kb.videoTracks ? a.kb.videoTracks : []
    }
    n.jd = function() {
        return this.kb.label
    };
    n.Zp = function() {
        !this.Tg && tj && (this.Tg = tj.createObjectURL(this.kb));
        return this.Tg || ""
    };
    n.qb = e("Ba");
    n.Ea = e("qk");
    n.Mu = function() {
        return !this.Ea()
    };
    n.wq = e("Cc");
    n.stop = function() {
        this.h("stop");
        0 === --this.Hf && (this.kb.stop && this.kb.stop(), this.jb.removeStream(this), this.Ea() ? this.oo() : this.yo = !0);
        return this
    };

    function uj(a) {
        return !!a && 0 < a.length
    }
    n.fq = function() {
        return uj(rj(this))
    };
    n.hq = function() {
        return uj(sj(this))
    };
    n.Rj = function() {
        return this.fq()
    };
    n.Qd = function() {
        return this.hq()
    };

    function vj(a) {
        return db(a, function(a) {
            return a.enabled
        })
    }
    n.bk = function() {
        return this.Ea() ? !vj(rj(this)) : this.Hx
    };
    n.$m = function() {
        return this.Ea() ? !vj(sj(this)) : this.Ix
    };

    function wj(a, b) {
        z(a, function(a) {
            a.enabled = b
        })
    }
    n.Mg = function(a) {
        wj(rj(this), !a);
        a ? this.dispatchEvent("mediaStream:audiomute") : this.dispatchEvent("mediaStream:audiounmute");
        return this
    };
    n.Og = function(a) {
        wj(sj(this), !a);
        a ? this.dispatchEvent("mediaStream:videomute") : this.dispatchEvent("mediaStream:videounmute");
        return this
    };

    function xj(a, b) {
        a.ek !== b && (a.ek = b, a.dispatchEvent(b ? "speaking:start" : "speaking:stop"))
    }
    n.lh = function(a) {
        (a = bd(a, {
            autoplay: "autoplay",
            src: this.Zp()
        })) && this.qk && a.setAttribute("muted", "muted");
        return a
    };
    n.ds = function() {
        this.Cc || (this.Cc = !0, this.dispatchEvent("mediaStream:start"))
    };
    n.oo = function() {
        this.yo || (this.yo = !0, this.dispatchEvent("mediaStream:end"))
    };
    n.tp = function() {
        return this.Qd() ? this.up() : this.qp()
    };
    n.qp = function() {
        this.h("createAudioElement");
        this.ds();
        return this.lh("audio")
    };
    n.up = function() {
        this.h("createVideoElement");
        var a = this.lh("video");
        a && this.qk && yj(a);
        pe(a, this.Pi ? 30 : 604800).el(this.ds, this.oo, this);
        return a
    };
    n.Zo = function() {
        function a(a) {
            a.onmute = b;
            a.onunmute = c;
            a.onresolutionchanged = d
        }
        var b = w(this.cx, this),
            c = w(this.dx, this),
            d = w(this.Kw, this);
        z(rj(this), a);
        z(sj(this), a)
    };
    n.Hv = function() {
        this.oo()
    };
    n.Kw = function() {
        this.dispatchEvent("mediaStreamTrack:videoresolutionchange")
    };
    n.cx = function() {
        this.dispatchEvent("mediaStreamTrack:mute")
    };
    n.dx = function() {
        this.dispatchEvent("mediaStreamTrack:unmute")
    };

    function zj(a, b, c, d) {
        qj.call(this, a, b, c, d)
    }
    y(zj, qj);
    n = zj.prototype;
    n.jd = l("");
    n.lh = function(a) {
        var b = bd(a, {
            controls: !1
        });
        b.mozSrcObject = this.kb;
        I(b.play, 0, b);
        this.qk && I(function() {
            b.muted = !0
        }, 0, this);
        return b
    };
    n.Zo = ba();
    n.fq = l(!0);
    n.hq = l(!0);

    function Aj() {
        L.call(this, "peerSession");
        S(this, "peerState", "pending")
    }
    y(Aj, L);
    ff("peerSession", Aj);
    Aj.prototype.Od = function() {
        return R(this, "peerState")
    };

    function Bj(a, b) {
        L.call(this, "config", null, a);
        b && $h(this, b)
    }
    y(Bj, L);

    function Cj(a) {
        var b = R(a, "apiServer");
        b || (b = "prod" === a.get("env") ? "https://api.vline.com" : "https://api." + a.get("env") + ".vline.com");
        return b
    }

    function Dj(a) {
        return a.get("cssURL") ? a.get("cssURL") : "prod" === a.get("env") ? "https://static.vline.com/vline.css" : "https://static." + a.get("env") + ".vline.com/vline.css"
    }

    function Ej(a, b) {
        if (!1 === a.get(b)) return !1;
        var c = !0 === a.get(b);
        return c ? c : !!a.get("ui")
    }
    var T = new Bj({
        env: "prod",
        skipStun: !1,
        skipRelay: !1,
        skipLocal: !1,
        skipTcp: !1,
        autoBatch: !0,
        maxBackOff: 12E4,
        connectTimeout: 15E3,
        cometdLogLevel: "info",
        html5History: !0,
        autoConnect: !0,
        ui: !1,
        notify: !0
    });
    T.So = "ui";
    T.To = "uiOutgoingDialog";
    T.Ls = "uiIncomingDialog";
    T.Ks = "uiBigGreenArrow";
    T.vl = "uiVideoPanel";
    T.Ms = "uiLocalVideo";
    T.vy = "uiTransparentBackground";
    T.Os = "uiVideoPanelHideFullscreenButton";
    T.Qs = "uiVideoPanelShowTransferButton";
    T.wy = "uiVideoPanelHideTriggerDebugButton";
    T.Ps = "uiVideoPanelShowTriggerDebugButton";
    T.Ns = "uiVideoPanelControlsForceVisible";
    T.Gs = "autoAccept";
    T.py = "autoAcceptAudio";
    T.Ro = "audioCodec";
    T.Hs = "disableCN";
    T.Js = "opusConstraints";
    T.Is = "notify";
    T.uy = "notifyWeb";
    T.ty = "notifySound";
    var Fj, Gj = window.navigator.getUserMedia || window.navigator.webkitGetUserMedia || window.navigator.mozGetUserMedia;
    Fj = Gj ? w(Gj, window.navigator) : null;
    var tj = window.webkitURL || window.mozURL || null,
        Hj = window.webkitRTCPeerConnection || window.mozRTCPeerConnection || null,
        Ij = window.RTCSessionDescription || window.mozRTCSessionDescription || null,
        Jj = window.RTCIceCandidate || window.mozRTCIceCandidate || null;
    $i && (Ij = window.mozRTCSessionDescription, Jj = window.mozRTCIceCandidate);

    function Kj(a, b, c, d, f) {
        Q.call(this);
        this.h("PeerConnection");
        this.zb = a;
        this.I = b;
        this.T = [];
        this.Kb = [];
        this.Za = null;
        this.yf = !1;
        c && c.loopback && (this.yf = !0);
        this.lj = !1;
        this.t = new Hj({
            iceServers: [{
                url: "stun:" + (R(this.I, "stunServer") || "stun." + this.I.get("env") + ".vline.com")
            }]
        }, {
            optional: [{
                DtlsSrtpKeyAgreement: !this.yf
            }]
        });
        this.jb = d;
        this.Pi = !0;
        t(f) && (this.Pi = f);
        t(this.t.onicecandidate) && (this.t.onicecandidate = w(this.Tv, this));
        t(this.t.onopen) && (this.t.onopen = w(this.pw, this));
        t(this.t.onstatechange) && (this.t.onstatechange =
            w(this.mr, this));
        t(this.t.onsignalingstatechange) && (this.t.onsignalingstatechange = w(this.mr, this));
        t(this.t.onaddstream) && (this.t.onaddstream = w(this.lv, this));
        t(this.t.onremovestream) && (this.t.onremovestream = w(this.Hw, this));
        $i && ij(24) || !t(this.t.onicechange) || (this.t.onicechange = w(this.ar, this));
        t(this.t.oniceconnectionstatechange) && (this.t.oniceconnectionstatechange = w(this.ar, this));
        t(this.t.onidentityresult) && (this.t.onidentityresult = w(this.Uv, this));
        this.Om = !1;
        this.mh = 0;
        this.Ca(!0)
    }
    y(Kj, Q);
    Ue("peerConnection", Kj);
    var Lj = /a=group:BUNDLE audio video\r\n/g,
        Mj = /ice\-ufrag\:(.+)/g,
        Nj = /ice\-pwd\:(.+)/g;
    n = Kj.prototype;
    n.Sn = !1;
    n.co = !1;
    n.k = function() {
        this.close("localstopped");
        Kj.c.k.call(this)
    };
    n.createOffer = function() {
        this.h("createOffer");
        if (0 == this.T.length) throw this.error("NO_LOCAL_STREAMS");
        return Oj(this, this.t.createOffer).n(this.Zr, this).Mb(this.Yd, this)
    };

    function Pj(a, b, c) {
        b = Qj("offer", b);
        return Rj(a, b, c).el(a.mt, a.Yd, a)
    }

    function Sj(a, b, c) {
        b = Qj("answer", b);
        return Rj(a, b, c).Mb(a.Yd, a)
    }
    n.addIceCandidate = function(a) {
        this.h("addIceCandidate", "candidate", a.candidate, "sdpMid", a.sdpMid, "sdpMLineIndex", a.sdpMLineIndex);
        this.t.addIceCandidate(a)
    };
    n.close = function(a) {
        this.h("close");
        this.t && (this.t.close(), this.t = null, z(ob(this.T), this.removeStream, this), z(ob(this.Kb), w(this.Kr, this, a)), this.T.length = this.Kb.length = 0)
    };
    n.getStats = function(a) {
        var b = new G;
        if (!this.t) return b.ma(), b;
        this.t.getStats(w(b.aa, b), a, w(b.ma, b));
        return b
    };

    function Tj(a, b, c) {
        "audio" === b ? c = 0 : "video" === b && (c = 1);
        return {
            candidate: a,
            sdpMid: b,
            sdpMLineIndex: c
        }
    }
    n.mp = function() {
        this.h("onNegotationNeeded");
        this.dispatchEvent("peerConnection:negotiationNeeded")
    };
    n.Tv = function(a) {
        this.h("onIceCandidate", a);
        a.candidate ? (this.Om && (this.Om = !1, this.h("onIceCandidate", "ICE Restart")), this.dispatchEvent("peerConnection:iceCandidate", {
            candidate: a.candidate
        })) : (this.h("onIceCandidate", "ICE Done"), this.Om = !0, this.dispatchEvent("peerConnection:iceDone"))
    };
    n.pw = function() {
        this.h("onOpen")
    };
    n.mr = function(a) {
        a = t(a.target) ? a.target.readyState || a.target.signalingState : a;
        this.h("onStateChange", "readyState", a);
        var b;
        switch (a) {
            case "active":
            case "stable":
                this.lj || Uj(this);
                break;
            case "closed":
                b = "peerConnection:end"
        }
        b && this.dispatchEvent(b)
    };
    n.lv = function(a) {
        this.h("onAddStream");
        a = B ? new zj(a.stream, !1, this.jb, void 0) : new qj(a.stream, !1, this.jb, void 0);
        this.co || (jb(this.Kb, a), a.addEventListener("mediaStream:end", this.lr, !1, this), this.Pi || (a.Pi = !1), this.lj && this.dispatchEvent(new Fh("peerConnection:addRemoteStream", this, a)))
    };
    n.Hw = function(a) {
        this.h("onRemoveStream");
        var b = fb(this.Kb, function(b) {
            return b.kb === a.stream
        });
        b && this.Kr("remotestopped", b)
    };
    n.ar = function(a) {
        if (this.t)
            if (this.h("onIceChange", "iceConnectionState", this.t.iceConnectionState), $i && !ij(24)) "connected" === a && this.dispatchEvent("peerConnection:start");
            else switch (a = this.t.signalingState, this.t.iceConnectionState) {
                case "connected":
                    this.mh && (this.G.info("Clearing disconnect timer"), rh(this.mh), this.mh = 0);
                    ("active" === a || "stable" === a || this.yf) && this.dispatchEvent("peerConnection:start");
                    break;
                case "disconnected":
                    this.mh = I(function() {
                        this.G.info("Closing after disconnect timer");
                        this.mh =
                            0;
                        this.close("disconnected")
                    }, 1E4, this), this.dispatchEvent("peerConnection:disconnected")
            }
    };
    n.Uv = function() {
        this.h("onIdentityResult")
    };
    n.Yd = function(a) {
        this.error("PEER_CONNECTION_FAILED", a)
    };
    n.addStream = function(a) {
        this.h("addStream", a);
        this.Sn || hb(this.T, a) || (this.t.addStream(a.kb), this.T.push(a), a.addEventListener("mediaStream:end", this.er, !1, this))
    };
    n.removeStream = function(a) {
        this.h("removeStream", a);
        a.removeEventListener("mediaStream:end", this.er, !1, this);
        kb(this.T, a);
        this.t && this.t.removeStream(a.kb)
    };

    function Uj(a) {
        z(a.Kb, function(a) {
            this.dispatchEvent(new Fh("peerConnection:addRemoteStream", this, a))
        }, a);
        a.lj = !0
    }
    n.Kr = function(a, b) {
        kb(this.Kb, b);
        b.removeEventListener("mediaStream:end", this.lr, !1, this);
        this.dispatchEvent(new Fh("peerConnection:removeRemoteStream", this, b, a))
    };
    n.er = function(a) {
        this.h("onLocalStreamEnd", a);
        this.removeStream(a.target)
    };
    n.lr = function(a) {
        this.h("onRemoteStreamEnd", a)
    };
    n.Pd = e("Kb");
    n.Dh = e("T");
    n.Zr = function(a) {
        this.h("setLocalDescription_", a);
        return Vj(this, this.t.setLocalDescription, a)
    };

    function Rj(a, b, c) {
        a.h("setRemoteDescription_");
        b = a.Kp(b);
        if (ej && !ij(27)) {
            var d = b.sdp.replace(/a=fmtp:.*\r?\n/mg, "");
            b = Qj(b.type, d)
        }
        /sendrecv/.test(b.sdp) || (a.Sn = /sendonly/.test(b.sdp), a.co = /recvonly/.test(b.sdp));
        d = Wj();
        a.h("setRemoteDescription_", "encodeConstraints", d);
        c = Xj(d, c);
        0 < a.T.length && a.T[0].bi.hd || (c.params.maxbitrate = Math.min(1E3, c.params.maxbitrate));
        if (c) {
            a.h("applyVideoConstraintsToDescription_", "opt_constraints", c);
            var f = b.sdp,
                d = /a=rtpmap:(\d+) VP8/;
            d.compile(d);
            for (var f = f.split("\r\n"),
                    g = [], h = 0; h < f.length; h++) {
                g.push(f[h]);
                var k = f[h].match(d);
                if (k) {
                    var m;
                    m = {
                        width: "x-vline-max-width",
                        height: "x-vline-max-height",
                        maxframerate: "x-vline-max-framerate",
                        minquantization: "x-vline-min-quantization",
                        maxquantization: "x-google-max-quantization",
                        maxbitrate: "x-google-max-bitrate"
                    };
                    var p = "",
                        r = c.params,
                        s = void 0;
                    for (s in r) {
                        var u = m[s];
                        u ? p += " " + u + "\x3d" + r[s] : Mi.log(ce, "Unknown system constraint " + s, void 0)
                    }(m = "" == p ? null : p) && g.push("a\x3dfmtp:" + k[1] + m)
                }
            }
            b.sdp = g.join("\r\n")
        }
        return Vj(a, a.t.setRemoteDescription,
            b)
    }
    n.mt = function() {
        this.h("createAnswer_");
        return Oj(this, this.t.createAnswer).n(this.Zr, this)
    };

    function Oj(a, b) {
        a.h("createDescription_");
        var c = (new G).n(a.Dt, a).n(a.Gt, a).n(a.Ht, a).n(a.Ft, a).n(a.Et, a).n(a.Kp, a).n(a.It, a);
        b.call(a.t, w(c.aa, c), w(c.ma, c), a.Za);
        return c
    }

    function Vj(a, b, c) {
        a.h("setDescription_", "type", c.type, "sdp", c.sdp);
        var d = new G;
        b.call(a.t, c, w(d.aa, d, c), w(d.ma, d));
        a.G.log(he, "description set", void 0);
        return d
    }

    function Qj(a, b) {
        return new Ij({
            type: a,
            sdp: b
        })
    }
    n.Dt = function(a) {
        if (Xh(this.I, T.Hs)) {
            var b = a.sdp,
                b = b.replace(/a=rtpmap:\d+ CN\/\d+[\s\S]+?[\r\n]?/g, ""),
                b = b.replace(/106 /g, " "),
                b = b.replace(/105 /g, " "),
                b = b.replace(/13 /g, " ");
            return Qj(a.type, b)
        }
        return a
    };
    n.Gt = function(a) {
        var b = R(this.I, T.Js);
        if (b) {
            var c = a.sdp,
                c = c.replace(/a=fmtp:111[^\r\n]+/, "a\x3dfmtp:111 " + b);
            return Qj(a.type, c)
        }
        return a
    };
    n.Ht = function(a) {
        if (this.co) {
            var b = a.sdp.replace(/sendrecv/g, "sendonly");
            a = Qj(a.type, b)
        }
        this.Sn && (b = a.sdp.replace(/sendrecv/g, "recvonly"), a = Qj(a.type, b));
        return a
    };
    n.Kp = function(a) {
        this.h("fixUpConfAudio_");
        if (ej && ij(29)) return a;
        for (var b = a.sdp, b = b.split("\r\n"), c = [], d = !1, f = !1, g = 0; g < b.length; g++)(c.push(b[g]), f) || (d || -1 === b[g].search("m\x3daudio") ? d && -1 !== b[g].search("c\x3dIN") && (c.push("a\x3dx-google-flag:conference"), f = !0) : d = !0);
        b = c.join("\r\n");
        return Qj(a.type, b)
    };

    function Yj(a) {
        var b = [];
        a = a.split("\r\n");
        for (var c = 0, d = "audio", f = 0; f < a.length; f++) - 1 !== a[f].search("m\x3daudio") ? (c = 0, d = "audio") : -1 !== a[f].search("m\x3dvideo") ? (c = 1, d = "video") : -1 !== a[f].search("a\x3dcandidate") && b.push(new Jj(Tj(a[f] + " generation 0", d, c)));
        return b
    }

    function Zj(a, b, c) {
        var d, f = "";
        for (a.lastIndex = 0;
            (d = a.exec(b)) && (f = d[1], !c););
        return f
    }
    n.Ft = function(a) {
        var b = this.I.get(T.Ro);
        if (b && "opus" === b) {
            for (var b = a.sdp, b = b.split("\r\n"), c = 0; c < b.length; c++)
                if (-1 !== b[c].search("m\x3daudio")) {
                    var d = c;
                    break
                }
            if (null === d) return a;
            for (c = 0; c < b.length; c++)
                if (-1 !== b[c].search("opus/48000")) {
                    (c = ak(b[c])) && (b[d] = bk(b[d], c));
                    break
                }
            b = b.join("\r\n");
            return Qj(a.type, b)
        }
        return a
    };
    n.Et = function(a) {
        var b = !0,
            c = this.I.get(T.Ro);
        c && "opus" === c && (b = !1);
        for (var c = a.sdp, c = c.split("\r\n"), d = 0, f = 0, g = null, h = null, k = null, m = null, p = 0; p < c.length; p++) - 1 !== c[p].search("m\x3daudio") ? d = p : -1 !== c[p].search("m\x3dvideo") && (f = p);
        for (p = 0; p < c.length; p++) - 1 !== c[p].search("ISAC/16000") ? g = ak(c[p]) : -1 !== c[p].search("red/8000") ? h = ak(c[p]) : -1 !== c[p].search("ulpfec/90000") ? k = ak(c[p]) : -1 !== c[p].search("red/90000") ? m = ak(c[p]) : c[p].search("VP8/90000");
        b && (d && g) && (c[d] = bk(c[d], g, h));
        f && m && k && (c[f] = c[f].replace(" " +
            m, "").replace(" " + k, ""));
        c = c.join("\r\n");
        return Qj(a.type, c)
    };
    n.It = function(a) {
        this.h("fixUpRtcpFb_");
        var b = a.sdp;
        if ($i && !ij(23)) {
            for (var b = b.split("\r\n"), c = 0, c = 0; c < b.length; c++)
                if (-1 !== b[c].search("m\x3dvideo")) {
                    var d = c;
                    break
                }
            if (null === d) return a;
            for (c = d; c < b.length; c++)
                if (-1 !== b[c].search("c\x3dIN")) {
                    b.splice(c + 1, 0, "a\x3drtcp-fb:* nack\r\na\x3drtcp-fb:* ccm fir");
                    break
                }
            b = b.join("\r\n");
            a = Qj(a.type, b)
        }
        return a
    };

    function ak(a) {
        return (a = /a=rtpmap:(\d+) /i.exec(a)) && 2 == a.length ? a[1] : null
    }

    function bk(a, b, c) {
        a = a.split(" ");
        for (var d = [], f = 0, g = 0; g < a.length; g++) 3 === f && (c && (d[f++] = c), d[f++] = b), a[g] !== b && a[g] !== c && (d[f++] = a[g]);
        return d.join(" ")
    }

    function ck(a, b, c, d, f) {
        Kj.call(this, a, b, c, d, f);
        this.lj = !0
    }
    y(ck, Kj);

    function dk(a) {
        var b = {};
        "rel" in b || (b.rel = "nofollow");
        "target" in b || (b.target = "_blank");
        var c = [],
            d;
        for (d in b) b.hasOwnProperty(d) && b[d] && c.push(Fa(d), '\x3d"', Fa(b[d]), '" ');
        var f = c.join("");
        return a.replace(ek, function(a, b, c, d, p) {
            a = [Fa(b)];
            if (!c) return a[0];
            a.push("\x3ca ", f, 'href\x3d"');
            d ? (a.push("mailto:"), c = d, d = "") : (p || a.push("http://"), (d = c.match(fk)) ? (c = d[1], d = d[2]) : d = "");
            c = Fa(c);
            d = Fa(d);
            a.push(c, '"\x3e', c, "\x3c/a\x3e", d);
            return a.join("")
        })
    }
    var fk = /^(.*?)([:;,\.?>\]\)!]+)$/,
        ek = RegExp("([\\S\\s]*?)(\\b(?:mailto:)?([\\w.+-]+@[A-Za-z0-9.-]+\\.(?:com|org|net|edu|gov|aero|biz|cat|coop|info|int|jobs|mobi|museum|name|pro|travel|arpa|asia|xxx|[a-z][a-z])\\b)|\\b(?:(https?|ftp)://|www\\.)\\w[\\w~#-@!\\[\\]]*|$)", "g");
    /*
     Portions of this code are from the google-caja project, received by
     Google under the Apache license (http://code.google.com/p/google-caja/).
     All other code is Copyright 2009 Google, Inc. All Rights Reserved.

    // Copyright (C) 2006 Google Inc.
    //
    // Licensed under the Apache License, Version 2.0 (the "License");
    // you may not use this file except in compliance with the License.
    // You may obtain a copy of the License at
    //
    //      http://www.apache.org/licenses/LICENSE-2.0
    //
    // Unless required by applicable law or agreed to in writing, software
    // distributed under the License is distributed on an "AS IS" BASIS,
    // WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    // See the License for the specific language governing permissions and
    // limitations under the License.

    */
    function gk() {}
    var hk = {
            bz: "\x3c",
            Vy: "\x3e",
            yy: "\x26",
            gz: " ",
            kz: '"',
            zy: "'"
        },
        ik = {
            a: 0,
            abbr: 0,
            acronym: 0,
            address: 0,
            applet: 16,
            area: 2,
            b: 0,
            base: 18,
            basefont: 18,
            bdo: 0,
            big: 0,
            blockquote: 0,
            body: 49,
            br: 2,
            button: 0,
            caption: 0,
            center: 0,
            cite: 0,
            code: 0,
            col: 2,
            colgroup: 1,
            dd: 1,
            del: 0,
            dfn: 0,
            dir: 0,
            div: 0,
            dl: 0,
            dt: 1,
            em: 0,
            fieldset: 0,
            font: 0,
            form: 0,
            frame: 18,
            frameset: 16,
            h1: 0,
            h2: 0,
            h3: 0,
            h4: 0,
            h5: 0,
            h6: 0,
            head: 49,
            hr: 2,
            html: 49,
            i: 0,
            iframe: 20,
            img: 2,
            input: 2,
            ins: 0,
            isindex: 18,
            kbd: 0,
            label: 0,
            legend: 0,
            li: 1,
            link: 18,
            map: 0,
            menu: 0,
            meta: 18,
            noframes: 20,
            noscript: 20,
            object: 16,
            ol: 0,
            optgroup: 0,
            option: 1,
            p: 1,
            param: 18,
            pre: 0,
            q: 0,
            s: 0,
            samp: 0,
            script: 20,
            select: 0,
            small: 0,
            span: 0,
            strike: 0,
            strong: 0,
            style: 20,
            sub: 0,
            sup: 0,
            table: 0,
            tbody: 1,
            td: 1,
            textarea: 8,
            tfoot: 1,
            th: 1,
            thead: 1,
            title: 24,
            tr: 1,
            tt: 0,
            u: 0,
            ul: 0,
            "var": 0
        },
        jk = /&/g,
        kk = /&([^a-z#]|#(?:[^0-9x]|x(?:[^0-9a-f]|$)|$)|$)/gi,
        lk = /</g,
        mk = />/g,
        nk = /\"/g,
        ok = /=/g,
        pk = /\0/g,
        qk = /&(#\d+|#x[0-9A-Fa-f]+|\w+);/g,
        rk = /^#(\d+)$/,
        sk = /^#x([0-9A-Fa-f]+)$/,
        tk = RegExp("^\\s*(?:(?:([a-z][a-z-]*)(\\s*\x3d\\s*(\"[^\"]*\"|'[^']*'|(?\x3d[a-z][a-z-]*\\s*\x3d)|[^\x3e\"'\\s]*))?)|(/?\x3e)|[^a-z\\s\x3e]+)",
            "i"),
        uk = RegExp("^(?:\x26(\\#[0-9]+|\\#[x][0-9a-f]+|\\w+);|\x3c[!]--[\\s\\S]*?--\x3e|\x3c!\\w[^\x3e]*\x3e|\x3c\\?[^\x3e*]*\x3e|\x3c(/)?([a-z][a-z0-9]*)|([^\x3c\x26\x3e]+)|([\x3c\x26\x3e]))", "i");
    gk.prototype.parse = function(a, b) {
        var c = null,
            d = !1,
            f = [],
            g, h, k;
        a.Bc = [];
        for (a.re = !1; b;) {
            var m = b.match(d ? tk : uk);
            b = b.substring(m[0].length);
            if (d)
                if (m[1]) {
                    var p = m[1].toLowerCase();
                    if (m[2]) {
                        m = m[3];
                        switch (m.charCodeAt(0)) {
                            case 34:
                            case 39:
                                m = m.substring(1, m.length - 1)
                        }
                        m = m.replace(pk, "").replace(qk, w(this.Zu, this))
                    } else m = p;
                    f.push(p, m)
                } else m[4] && (void 0 !== h && (k ? a.os && a.os(g, f) : a.Fp && a.Fp(g)), k && h & 12 && (c = null === c ? b.toLowerCase() : c.substring(c.length - b.length), d = c.indexOf("\x3c/" + g), 0 > d && (d = b.length), h & 4 ? a.fp &&
                    a.fp(b.substring(0, d)) : a.Gr && a.Gr(b.substring(0, d).replace(kk, "\x26amp;$1").replace(lk, "\x26lt;").replace(mk, "\x26gt;")), b = b.substring(d)), g = h = k = void 0, f.length = 0, d = !1);
            else if (m[1]) vk(a, m[0]);
            else if (m[3]) k = !m[2], d = !0, g = m[3].toLowerCase(), h = ik.hasOwnProperty(g) ? ik[g] : void 0;
            else if (m[4]) vk(a, m[4]);
            else if (m[5]) switch (m[5]) {
                case "\x3c":
                    vk(a, "\x26lt;");
                    break;
                case "\x3e":
                    vk(a, "\x26gt;");
                    break;
                default:
                    vk(a, "\x26amp;")
            }
        }
        for (c = a.Bc.length; 0 <= --c;) a.fe.append("\x3c/", a.Bc[c], "\x3e");
        a.Bc.length = 0
    };
    gk.prototype.Zu = function(a) {
        a = a.toLowerCase();
        if (hk.hasOwnProperty(a)) return hk[a];
        var b = a.match(rk);
        return b ? String.fromCharCode(parseInt(b[1], 10)) : (b = a.match(sk)) ? String.fromCharCode(parseInt(b[1], 16)) : ""
    };

    function wk() {};
    /*
     Portions of this code are from the google-caja project, received by
     Google under the Apache license (http://code.google.com/p/google-caja/).
     All other code is Copyright 2009 Google, Inc. All Rights Reserved.

    // Copyright (C) 2006 Google Inc.
    //
    // Licensed under the Apache License, Version 2.0 (the "License");
    // you may not use this file except in compliance with the License.
    // You may obtain a copy of the License at
    //
    //      http://www.apache.org/licenses/LICENSE-2.0
    //
    // Unless required by applicable law or agreed to in writing, software
    // distributed under the License is distributed on an "AS IS" BASIS,
    // WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    // See the License for the specific language governing permissions and
    // limitations under the License.

    */
    function xk(a, b, c) {
        this.fe = a;
        this.Bc = [];
        this.re = !1;
        this.zs = b;
        this.yk = c
    }
    y(xk, wk);
    var yk = {
        "*::class": 9,
        "*::dir": 0,
        "*::id": 4,
        "*::lang": 0,
        "*::onclick": 2,
        "*::ondblclick": 2,
        "*::onkeydown": 2,
        "*::onkeypress": 2,
        "*::onkeyup": 2,
        "*::onload": 2,
        "*::onmousedown": 2,
        "*::onmousemove": 2,
        "*::onmouseout": 2,
        "*::onmouseover": 2,
        "*::onmouseup": 2,
        "*::style": 3,
        "*::title": 0,
        "*::accesskey": 0,
        "*::tabindex": 0,
        "*::onfocus": 2,
        "*::onblur": 2,
        "a::coords": 0,
        "a::href": 1,
        "a::hreflang": 0,
        "a::name": 7,
        "a::onblur": 2,
        "a::rel": 0,
        "a::rev": 0,
        "a::shape": 0,
        "a::target": 10,
        "a::type": 0,
        "area::accesskey": 0,
        "area::alt": 0,
        "area::coords": 0,
        "area::href": 1,
        "area::nohref": 0,
        "area::onfocus": 2,
        "area::shape": 0,
        "area::tabindex": 0,
        "area::target": 10,
        "bdo::dir": 0,
        "blockquote::cite": 1,
        "br::clear": 0,
        "button::accesskey": 0,
        "button::disabled": 0,
        "button::name": 8,
        "button::onblur": 2,
        "button::onfocus": 2,
        "button::tabindex": 0,
        "button::type": 0,
        "button::value": 0,
        "caption::align": 0,
        "col::align": 0,
        "col::char": 0,
        "col::charoff": 0,
        "col::span": 0,
        "col::valign": 0,
        "col::width": 0,
        "colgroup::align": 0,
        "colgroup::char": 0,
        "colgroup::charoff": 0,
        "colgroup::span": 0,
        "colgroup::valign": 0,
        "colgroup::width": 0,
        "del::cite": 1,
        "del::datetime": 0,
        "dir::compact": 0,
        "div::align": 0,
        "dl::compact": 0,
        "font::color": 0,
        "font::face": 0,
        "font::size": 0,
        "form::accept": 0,
        "form::action": 1,
        "form::autocomplete": 0,
        "form::enctype": 0,
        "form::method": 0,
        "form::name": 7,
        "form::onreset": 2,
        "form::onsubmit": 2,
        "form::target": 10,
        "h1::align": 0,
        "h2::align": 0,
        "h3::align": 0,
        "h4::align": 0,
        "h5::align": 0,
        "h6::align": 0,
        "hr::align": 0,
        "hr::noshade": 0,
        "hr::size": 0,
        "hr::width": 0,
        "img::align": 0,
        "img::alt": 0,
        "img::border": 0,
        "img::height": 0,
        "img::hspace": 0,
        "img::ismap": 0,
        "img::longdesc": 1,
        "img::name": 7,
        "img::src": 1,
        "img::usemap": 11,
        "img::vspace": 0,
        "img::width": 0,
        "input::accept": 0,
        "input::accesskey": 0,
        "input::autocomplete": 0,
        "input::align": 0,
        "input::alt": 0,
        "input::checked": 0,
        "input::disabled": 0,
        "input::ismap": 0,
        "input::maxlength": 0,
        "input::name": 8,
        "input::onblur": 2,
        "input::onchange": 2,
        "input::onfocus": 2,
        "input::onselect": 2,
        "input::readonly": 0,
        "input::size": 0,
        "input::src": 1,
        "input::tabindex": 0,
        "input::type": 0,
        "input::usemap": 11,
        "input::value": 0,
        "ins::cite": 1,
        "ins::datetime": 0,
        "label::accesskey": 0,
        "label::for": 5,
        "label::onblur": 2,
        "label::onfocus": 2,
        "legend::accesskey": 0,
        "legend::align": 0,
        "li::type": 0,
        "li::value": 0,
        "map::name": 7,
        "menu::compact": 0,
        "ol::compact": 0,
        "ol::start": 0,
        "ol::type": 0,
        "optgroup::disabled": 0,
        "optgroup::label": 0,
        "option::disabled": 0,
        "option::label": 0,
        "option::selected": 0,
        "option::value": 0,
        "p::align": 0,
        "pre::width": 0,
        "q::cite": 1,
        "select::disabled": 0,
        "select::multiple": 0,
        "select::name": 8,
        "select::onblur": 2,
        "select::onchange": 2,
        "select::onfocus": 2,
        "select::size": 0,
        "select::tabindex": 0,
        "table::align": 0,
        "table::bgcolor": 0,
        "table::border": 0,
        "table::cellpadding": 0,
        "table::cellspacing": 0,
        "table::frame": 0,
        "table::rules": 0,
        "table::summary": 0,
        "table::width": 0,
        "tbody::align": 0,
        "tbody::char": 0,
        "tbody::charoff": 0,
        "tbody::valign": 0,
        "td::abbr": 0,
        "td::align": 0,
        "td::axis": 0,
        "td::bgcolor": 0,
        "td::char": 0,
        "td::charoff": 0,
        "td::colspan": 0,
        "td::headers": 6,
        "td::height": 0,
        "td::nowrap": 0,
        "td::rowspan": 0,
        "td::scope": 0,
        "td::valign": 0,
        "td::width": 0,
        "textarea::accesskey": 0,
        "textarea::cols": 0,
        "textarea::disabled": 0,
        "textarea::name": 8,
        "textarea::onblur": 2,
        "textarea::onchange": 2,
        "textarea::onfocus": 2,
        "textarea::onselect": 2,
        "textarea::readonly": 0,
        "textarea::rows": 0,
        "textarea::tabindex": 0,
        "tfoot::align": 0,
        "tfoot::char": 0,
        "tfoot::charoff": 0,
        "tfoot::valign": 0,
        "th::abbr": 0,
        "th::align": 0,
        "th::axis": 0,
        "th::bgcolor": 0,
        "th::char": 0,
        "th::charoff": 0,
        "th::colspan": 0,
        "th::headers": 6,
        "th::height": 0,
        "th::nowrap": 0,
        "th::rowspan": 0,
        "th::scope": 0,
        "th::valign": 0,
        "th::width": 0,
        "thead::align": 0,
        "thead::char": 0,
        "thead::charoff": 0,
        "thead::valign": 0,
        "tr::align": 0,
        "tr::bgcolor": 0,
        "tr::char": 0,
        "tr::charoff": 0,
        "tr::valign": 0,
        "ul::compact": 0,
        "ul::type": 0
    };
    xk.prototype.os = function(a, b) {
        if (!this.re && ik.hasOwnProperty(a)) {
            var c = ik[a];
            if (!(c & 32))
                if (c & 16) this.re = !(c & 2);
                else {
                    for (var d = b, f = 0; f < d.length; f += 2) {
                        var g = d[f],
                            h = d[f + 1],
                            k = null,
                            m;
                        if ((m = a + "::" + g, yk.hasOwnProperty(m)) || (m = "*::" + g, yk.hasOwnProperty(m))) k = yk[m];
                        if (null !== k) switch (k) {
                            case 0:
                                break;
                            case 2:
                            case 3:
                                h = null;
                                break;
                            case 4:
                            case 5:
                            case 6:
                            case 7:
                            case 8:
                            case 9:
                                h = this.yk ? this.yk(h) : h;
                                break;
                            case 1:
                                h = this.zs && this.zs(h);
                                break;
                            case 11:
                                h && "#" === h.charAt(0) ? (h = this.yk ? this.yk(h) : h) && (h = "#" + h) : h = null;
                                break;
                            default:
                                h = null
                        } else h = null;
                        d[f + 1] = h
                    }
                    if (b = d) {
                        c & 2 || this.Bc.push(a);
                        this.fe.append("\x3c", a);
                        c = 0;
                        for (d = b.length; c < d; c += 2) f = b[c], g = b[c + 1], null !== g && void 0 !== g && this.fe.append(" ", f, '\x3d"', g.replace(jk, "\x26amp;").replace(lk, "\x26lt;").replace(mk, "\x26gt;").replace(nk, "\x26#34;").replace(ok, "\x26#61;"), '"');
                        this.fe.append("\x3e")
                    }
                }
        }
    };
    xk.prototype.Fp = function(a) {
        if (this.re) this.re = !1;
        else if (ik.hasOwnProperty(a)) {
            var b = ik[a];
            if (!(b & 50)) {
                if (b & 1)
                    for (b = this.Bc.length; 0 <= --b;) {
                        var c = this.Bc[b];
                        if (c === a) break;
                        if (!(ik[c] & 1)) return
                    } else
                        for (b = this.Bc.length; 0 <= --b && this.Bc[b] !== a;);
                if (!(0 > b)) {
                    for (var d = this.Bc.length; --d > b;) c = this.Bc[d], ik[c] & 1 || this.fe.append("\x3c/", c, "\x3e");
                    this.Bc.length = b;
                    this.fe.append("\x3c/", a, "\x3e")
                }
            }
        }
    };

    function vk(a, b) {
        a.re || a.fe.append(b)
    }
    xk.prototype.Gr = function(a) {
        this.re || this.fe.append(a)
    };
    xk.prototype.fp = function(a) {
        this.re || this.fe.append(a)
    };

    function zk(a, b, c) {
        P.call(this, a, b);
        this.message = c
    }
    y(zk, P);
    zk.prototype.Kj = e("message");

    function U(a, b, c, d, f, g) {
        L.call(this, a);
        b && ei(this, "iss", b);
        d && (a = d, f && (a = Fa(a)), t(g) || (g = !0), g && (f = a, g = new Za, (new gk).parse(new xk(g, null, null), f), a = g.toString()), S(this, "body", a));
        c && S(this, "cpath", c);
        this.Hr = !1
    }
    y(U, L);
    Ue("message", U);
    ff(["im", "x-msg", "typing", "transfer"], U, ["type", "iss", "cpath", "body"], "body", U.prototype.Pw);
    n = U.prototype;
    n.lk = null;
    n.Je = null;
    n.D = null;
    n.k = function() {
        this.D && this.D.ja();
        U.c.k.call(this)
    };
    n.Yt = e("Je");
    n.Kh = function() {
        return this.Ej()
    };
    n.Xb = e("D");
    n.Lt = function() {
        var a = R(this, "cpath");
        return a ? Ak(a) : this.D ? this.D.j() : ""
    };
    n.Oc = function() {
        return R(this, "sid")
    };
    n.Qp = function(a, b) {
        var c = R(this, "body");
        return a ? (this.lk || (c = La(c), this.lk = dk(c)), this.lk) : b ? La(c) : c
    };
    n.getError = function() {
        return R(this, "err")
    };
    n.Pw = function() {
        delete this.lk
    };
    n.Al = function(a, b) {
        b && (this.Hr = !0);
        U.c.Al.call(this, a, b)
    };
    n.jc = function(a) {
        function b(b) {
            k.vb();
            k.D = b;
            k.Je || (k.Je = b);
            Uh(k, b);
            L.prototype.jc.call(k, a);
            if (k.Hr && !k.Je.Ea()) {
                var c = new zk(re, b, k);
                b.dispatchEvent(c);
                c.type += ":" + k.X();
                b.dispatchEvent(c)
            }
        }
        var c, d = this.r(!0);
        if (!d || !(c = this.Kh())) return U.c.jc.call(this, a);
        var f = c,
            g = !1,
            h = R(this, "cpath");
        h && ("room" === Bk(h) && (g = !0), f = Ak(h));
        g || (h = d.Qa(), c === h && (this.Je = d.Ba, f = Ck(this.l())));
        var k = this;
        this.La();
        g ? d.Vp(f).n(b, this) : d.qb(f).n(b, this)
    };
    var Dk = null,
        Ek = He("vline.common.System");

    function Fk(a) {
        this.My = a.device_id || 0;
        this.Ny = a.device_name || "unknown";
        this.Ly = a.description || "unknown";
        this.tz = a.vendor_id || 0;
        this.Qy = a.driver || "unknown";
        this.Ry = a.driver_version || "unknown"
    }

    function Gk(a) {
        this.my = 0 < Ic(a);
        this.ez = a.maxPhysicalCpus || 1;
        this.dz = a.maxCpus || 1;
        this.By = a.cpuArchitecture_ || "unknown";
        this.wp = a.curCpus || 0;
        this.Gy = a.cpuVendor || "unknown";
        this.Dy = a.cpuFamily || 0;
        this.Ey = a.cpuModel || 0;
        this.Fy = a.cpuStepping || 0;
        this.Cy = a.cpuCacheSize || 0;
        this.tk = a.maxCpuSpeed || 0;
        this.fz = a.memorySize || 0;
        this.Hq = a.machineModel || "unknown";
        this.Uy = a.gpuInfo && new Fk(a.gpuInfo) || null
    }
    Gk.prototype.toString = function() {
        return ac(this)
    };

    function Hk() {
        return Ik()
    }

    function Ik() {
        return (new G({
            machineModel: "browser"
        })).n(function(a) {
            Dk = a = new Gk(a);
            F(Ek, a.toString());
            return a
        }).Mb(aa())
    }
    Gk.prototype.xg = e("my");
    var Jk = [{
            level: 0,
            id: "160x120",
            gUMSupported: !1,
            iOSSupported: !0,
            params: {
                width: 160,
                height: 120,
                maxframerate: 20,
                maxquantization: 63,
                minquantization: 25,
                maxbitrate: 100,
                minbitrate: 30
            }
        }, {
            level: 1,
            id: "320x180",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 320,
                height: 180,
                maxframerate: 20,
                maxquantization: 63,
                minquantization: 25,
                maxbitrate: 300,
                minbitrate: 90
            }
        }, {
            level: 2,
            id: "320x240",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 320,
                height: 240,
                maxframerate: 20,
                maxquantization: 56,
                minquantization: 25,
                maxbitrate: 300,
                minbitrate: 120
            }
        }, {
            level: 3,
            id: "352x288",
            gUMSupported: !1,
            iOSSupported: !0,
            params: {
                width: 352,
                height: 288,
                maxframerate: 20,
                maxquantization: 63,
                minquantization: 25,
                maxbitrate: 500,
                minbitrate: 120
            }
        }, {
            level: 4,
            id: "480x360",
            gUMSupported: !1,
            iOSSupported: !0,
            params: {
                width: 480,
                height: 360,
                maxframerate: 20,
                maxquantization: 63,
                minquantization: 20,
                maxbitrate: 700,
                minbitrate: 200
            }
        }, {
            level: 5,
            id: "640x360_low",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 640,
                height: 360,
                maxframerate: 15,
                maxquantization: 56,
                minquantization: 15,
                maxbitrate: 700,
                minbitrate: 200
            }
        }, {
            level: 6,
            id: "640x360",
            gUMSupported: !0,
            iOSSupported: !1,
            params: {
                width: 640,
                height: 360,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 15,
                maxbitrate: 500,
                minbitrate: 200
            }
        }, {
            level: 7,
            id: "640x480_low",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 640,
                height: 480,
                maxframerate: 22,
                maxquantization: 56,
                minquantization: 15,
                maxbitrate: 700,
                minbitrate: 200
            }
        }, {
            level: 8,
            id: "640x480",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 640,
                height: 480,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 15,
                maxbitrate: 1E3,
                minbitrate: 200
            }
        }, {
            level: 9,
            id: "960x540",
            gUMSupported: !1,
            iOSSupported: !0,
            params: {
                width: 960,
                height: 540,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 10,
                maxbitrate: 1500,
                minbitrate: 200
            }
        }, {
            level: 10,
            id: "960x720",
            gUMSupported: !0,
            iOSSupported: !1,
            params: {
                width: 960,
                height: 720,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 6,
                maxbitrate: 1500,
                minbitrate: 200
            }
        }, {
            level: 11,
            id: "1290x720",
            gUMSupported: !0,
            iOSSupported: !0,
            params: {
                width: 1280,
                height: 720,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 4,
                maxbitrate: 2E3,
                minbitrate: 200
            }
        }, {
            level: 12,
            id: "1290x720",
            gUMSupported: !1,
            iOSSupported: !0,
            params: {
                width: 1280,
                height: 960,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 4,
                maxbitrate: 2E3,
                minbitrate: 200
            }
        }, {
            level: 13,
            id: "1920x1080",
            gUMSupported: !0,
            iOSSupported: !1,
            params: {
                width: 1920,
                height: 1080,
                maxframerate: 30,
                maxquantization: 63,
                minquantization: 4,
                maxbitrate: 2E3,
                minbitrate: 200
            }
        }],
        Kk = {
            noderouter: "1290x720",
            browser: "1290x720",
            N90AP: "320x240",
            N90BAP: "320x240",
            N92AP: "320x240",
            N94AP: "640x360_low",
            K93AP: "640x480_low",
            K94AP: "640x480_low",
            K95AP: "640x480_low",
            K93AAP: "640x480_low",
            N78AP: "640x360_low",
            N78AAP: "640x360_low",
            P105AP: "640x480_low",
            P106AP: "640x480_low",
            P107AP: "640x480_low",
            J1AP: "640x480_low",
            J2AP: "640x480_low",
            J2AAP: "640x480_low",
            N41AP: "640x360",
            N42AP: "640x360",
            N48AP: "640x360",
            N49AP: "640x360",
            P101AP: "640x480_low",
            P102AP: "640x480_low",
            P103AP: "640x480_low",
            N51AP: "640x360",
            N53AP: "640x360",
            J71AP: "640x480",
            J72AP: "640x480",
            J85AP: "640x480",
            J86AP: "640x480"
        },
        Lk = {
            noderouter: "1290x720",
            browser: "1290x720",
            N90AP: "320x240",
            N90BAP: "320x240",
            N92AP: "320x240",
            N94AP: "480x360",
            K93AP: "480x360",
            K94AP: "480x360",
            K95AP: "480x360",
            K93AAP: "480x360",
            N78AP: "480x360",
            N78AAP: "480x360",
            P105AP: "480x360",
            P106AP: "480x360",
            P107AP: "480x360",
            J1AP: "480x360",
            J2AP: "480x360",
            J2AAP: "480x360",
            N41AP: "640x480",
            N42AP: "640x480",
            N48AP: "640x480",
            N49AP: "640x480",
            P101AP: "640x480",
            P102AP: "640x480",
            P103AP: "640x480",
            N51AP: "640x480",
            N53AP: "640x480",
            J71AP: "640x480",
            J72AP: "640x480",
            J85AP: "640x480",
            J86AP: "640x480"
        };

    function Mk(a) {
        return fb(Jk, function(b) {
            return b.id == a
        })
    }

    function Nk() {
        var a = Dk;
        if (!a) return Ek.log(ce, "sysInfo is null.  Did you call vline.common.System.init?", void 0), Mk("1290x720");
        if (!a.xg()) return Ek.log(ce, "sysInfo is not valid. No platform support?", void 0), Mk("320x180");
        var b = Mk(Kk[a.Hq]);
        return b ? b : dj ? Mk("640x480") : -1 != a.tk && 1E3 <= a.tk || 2 == a.wp ? Mk("640x480") : Mk("320x180")
    }

    function Wj() {
        var a = Dk;
        if (!a) return Ek.log(ce, "sysInfo is null.  Did you call vline.common.System.init?", void 0), Mk("1290x720");
        if (!a.xg()) return Ek.log(ce, "sysInfo is not valid. No platform support?", void 0), Mk("320x180");
        var b = Mk(Lk[a.Hq]);
        return b ? b : dj ? Mk("640x480") : -1 != a.tk && 1E3 <= a.tk || 2 == a.wp ? Mk("640x480") : Mk("320x180")
    }

    function Xj(a, b) {
        return !a && b ? b : !b && a ? a : b || a ? a.level < b.level ? a : b : null
    };

    function Ok(a, b, c, d, f) {
        U.call(this, a, b, f);
        c && S(this, "sid", c);
        d && S(this, "mid", d)
    }
    y(Ok, U);
    Ue("signal", Ok);
    ff(["sig:sessionTerminate", "sig:sessionReject", "sig:sessionStart", "sig:contentReject"], Ok, ["type", "iss", "sid", "mid"]);
    Ok.prototype.Jj = function() {
        return R(this, "mid")
    };

    function Pk(a, b, c, d, f, g) {
        Ok.call(this, a, b, c, d, g);
        f && this.set("decodeConstraints", f)
    }
    y(Pk, Ok);
    ff(["sig:sessionIntroduce", "sig:sessionWelcome"], Pk, ["type", "iss", "sid", "mid", "decodeConstraints"]);

    function Qk(a) {
        var b = a.get("decodeConstraints");
        a.h("getDecodeConstraints", "constraints", b);
        return b
    }

    function Rk(a, b, c, d, f, g) {
        Ok.call(this, a, b, c, d, g);
        S(this, "sdp", f)
    }
    y(Rk, Ok);
    ff(["sig:sessionInitiate", "sig:sessionAccept", "sig:contentModify", "sig:contentAccept"], Rk, ["type", "iss", "sid", "mid", "sdp"]);
    Rk.prototype.Nj = function() {
        return R(this, "sdp")
    };

    function Sk(a, b, c, d, f, g, h, k) {
        Rk.call(this, a, b, c, d, f, k);
        S(this, "sdpMid", g);
        S(this, "sdpMLineIndex", h)
    }
    y(Sk, Rk);
    ff("sig:transportCandidate", Sk, "type iss sid mid sdp sdpMid sdpMLineIndex".split(" "));
    Sk.prototype.Xp = function() {
        return R(this, "sdpMid")
    };
    Sk.prototype.Wp = function() {
        return this.get("sdpMLineIndex")
    };

    function Tk(a, b, c, d, f, g) {
        Ok.call(this, "relayAllocationRequest", a, b, c);
        S(this, "appId", d);
        S(this, "ufrag", f);
        S(this, "pwd", g);
        this.$b("/service/turn")
    }
    y(Tk, Ok);
    ff("relayAllocationRequest", Tk, ["iss", "mid", "appId", "ufrag", "pwd"]);

    function Uk(a, b, c, d, f) {
        Ok.call(this, "relayAllocationResponse");
        if (!a || !d || !b) throw sf("relayAllocationResponse", this);
        S(this, "ip", a);
        S(this, "udpPort", b);
        S(this, "udpExtPort", c);
        S(this, "tcpPort", d);
        f && S(this, "sslTcpPort", f)
    }
    y(Uk, Ok);
    ff("relayAllocationResponse", Uk, ["ip", "udpPort", "udpExtPort", "tcpPort", "sslTcpPort"]);
    Uk.prototype.pm = function() {
        return R(this, "ip")
    };

    function Vk(a, b, c, d, f) {
        Ok.call(this, "vadStateTransition", a, b, c);
        f && S(this, "streamId", f);
        S(this, "vadState", d)
    }
    y(Vk, Ok);
    ff("vadStateTransition", Vk, ["iss", "sid", "mid", "vadState", "streamId"]);

    function Wk(a, b, c, d, f, g, h, k, m, p) {
        this.Ol = a;
        this.Hk = b;
        this.Qn = c;
        this.Vh = d;
        this.rd = f;
        this.Lk = m;
        this.Mk = p;
        this.gj = g;
        this.Pp = h || 0;
        this.Aj = k || Xk(this)
    }
    y(Wk, nf);
    af("candidate", Wk, "protocol priority ip ctype generation foundation relatedIp relatedPort".split(" "));
    Wk.prototype.Fa = function() {
        return {
            protocol: this.Hk,
            priority: this.Qn,
            ip: this.Vh,
            ctype: this.gj,
            generation: this.Pp,
            foundation: this.Aj,
            relatedIp: this.Lk,
            relatedPort: this.Mk
        }
    };
    Wk.prototype.pm = e("Vh");
    Wk.prototype.Ii = ca("rd");

    function Xk(a) {
        var b;
        a = a.gj + a.Vh + a.Hk;
        if ("undefined" === typeof a || 0 === a.length) b = 0;
        else {
            b || (b = 0);
            var c = 0;
            b ^= -1;
            for (var d = 0, f = a.length; d < f; d++) c = (b ^ a.charCodeAt(d)) & 255, b = b >>> 8 ^ We[c];
            b = (b ^ -1) >>> 0
        }
        return b
    };
    var Yk = /(a=)?candidate:(\d+)\ (\d+) (\w+) (\d+) (\S+) (\d+) typ (\w+)( raddr (\S+))?( rport (\d+))?( (generation (\d+))|(\w+ \S+))*/;
    He("vline.sdp");

    function Zk(a) {
        var b = Yk.exec(a);
        if (!b || 8 > b.length) throw sf("candidate", a);
        return new Wk(Number(b[3]), b[4], Number(b[5]), b[6], Number(b[7]), b[8], Number(b[15]), Number(b[2]), b[10], Number(b[12]))
    };

    function $k(a, b, c, d) {
        Ok.call(this, "updateSessionSource", a, b, c);
        S(this, "new_src_mid", d)
    }
    y($k, Ok);
    ff("updateSessionSource", $k, ["iss", "sid", "mid", "new_src_mid"]);
    $k.prototype.Vt = function() {
        return R(this, "new_src_mid")
    };

    function fi(a, b) {
        xa(a, "/") || (a += "/");
        var c;
        if (!(c = b)) {
            c = Te();
            var d = c.getTime();
            d <= Se ? c.setTime(++Se) : Se = d;
            c = [c.getUTCFullYear(), Ua(c.getUTCMonth() + 1, 2), Ua(c.getUTCDate(), 2), Ua(c.getUTCHours(), 2), Ua(c.getUTCMinutes(), 2), Ua(c.getUTCSeconds(), 2), Ua(c.getUTCMilliseconds(), 3)].join("")
        }
        return a + c
    }

    function al(a, b) {
        return "/user/" + a + "/msg/" + b
    }

    function bl(a, b) {
        var c = "/app/" + a + "/account";
        b && (c += "/" + b);
        return c
    }

    function cl(a) {
        var b = "/room";
        a && (b += "/" + a);
        return b
    }

    function dl(a, b) {
        var c = "/room/" + a + "/participant";
        b && (c += "/" + b);
        return c
    }

    function el(a, b) {
        var c = "/app/" + a + "/auth";
        b && (c += "/" + b);
        return c
    }

    function fl(a, b, c) {
        return "/user/" + a + "/sessions/" + c + "/msg/" + b
    }

    function Ck(a) {
        return (a = /.*\/msg\/([^\/]+)/.exec(a)) && 0 < a.length ? a[1] : ""
    }

    function gi(a) {
        var b = a.lastIndexOf("/");
        return 0 >= b || 1 === a.length ? "/" : a.substr(0, b)
    }

    function gl(a) {
        a = a.split("/");
        return 2 > a.length ? "" : "/" + a[1] + "/" + a[2]
    }

    function Bk(a) {
        a = a.split("/");
        return 2 > a.length ? "" : a[1]
    }

    function Ak(a) {
        a = a.split("/");
        return 2 > a.length ? "" : a[2]
    }

    function hl(a) {
        return /^(\/local\/)/.test(a)
    };

    function il(a) {
        ki.call(this, a);
        this.D = this.ca = null;
        this.Ua = 0;
        this.sb = null;
        this.rq = this.od = !1;
        this.wi = [];
        this.Rm = !1;
        this.Vj = [];
        this.Nk = [];
        this.t = this.mc = null;
        this.so = this.ms = this.ks = this.ls = !1;
        this.Rk = null;
        this.Ci = 3E4;
        this.vd = null;
        this.cl = !1;
        this.Pn = null
    }
    y(il, ki);
    df("peerSession", il, ["$entity"]);
    n = il.prototype;
    n.se = function(a, b, c, d, f, g) {
        this.ca = a;
        this.D = b;
        this.Ci = d;
        a = a.ia().I;
        this.ls = Xh(a, "skipStun");
        this.ks = Xh(a, "skipLocal");
        this.ms = Xh(a, "skipTcp");
        this.so = Xh(a, "skipRelay");
        b = jl(this.ia());
        d = this.j();
        this.t = B ? new ck(d, a, c, b, g) : new Kj(d, a, c, b, g);
        this.t.Cb(this);
        this.od = !f;
        this.D && this.C().g(this.D, "pub:sig:sessionWelcome", this.ux).g(this.D, "pub:sig:sessionInitiate", this.Yv).g(this.D, "pub:sig:sessionTerminate", this.$w).g(this.D, "pub:sig:sessionAccept", this.Vq).g(this.D, "pub:sig:sessionReject", this.Cw).g(this.D,
            "pub:sig:sessionStart", this.Xw).g(this.D, "pub:sig:transportCandidate", this.tv).g(this.D, "pub:sig:contentModify", this.Av).g(this.D, "pub:sig:contentAccept", this.yv).g(this.D, "pub:vadStateTransition", this.qx).g(this, "error", this.stop).g(this, "peerConnection:end", this.stop).g(this, "peerConnection:iceCandidate", this.uv).g(this, "peerConnection:start", this.kv).g(this, "peerConnection:disconnected", this.oi).g(this, "peerConnection:negotiationNeeded", this.mp);
        Rh(this.ca.W, "pub:relayAllocationResponse", this.jr,
            this);
        this.Ca(!0);
        f && kl(this, f)
    };
    n.Q = e("H");
    n.Xb = e("D");
    n.k = function() {
        this.stop();
        this.mc && this.mc.ja();
        il.c.k.call(this)
    };
    n.toString = function() {
        return this.j() + "#" + this.Ua
    };
    n.uv = function(a) {
        a = a.candidate;
        this.Bj(a);
        ll(this, a.candidate, a.sdpMid, a.sdpMLineIndex)
    };
    n.kv = function() {
        this.h("onActive_");
        ml(this, "active")
    };
    n.oi = function() {
        this.h("onDisconnected_");
        ml(this, "disconnected")
    };

    function ll(a, b, c, d) {
        a.ls && nl.test(b) ? F(a.G, "Skipping stun candidate") : (nl.test(b) && (b = b.replace(/udp \d+/, "udp " + (Number(/udp (\d+)/.exec(b)[1]) - 1))), a.Vc("sig:transportCandidate", b, c, d))
    }
    var ol = /(udp|UDP) \d+ \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3} \d+ typ host/,
        nl = /(udp|UDP) \d+ \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3} \d+ typ srflx/,
        pl = /typ relay/,
        ql = /(tcp|TCP) \d+ \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3} \d+ typ/;

    function rl(a, b, c, d, f) {
        b = Zk(b);
        var g = b.pm(),
            h = b.rd;
        b.Hk = c;
        b.Qn = d;
        a = a.mc.pm();
        b.Vh = a;
        b.Aj = Xk(b);
        b.Ii(f);
        b.gj = "relay";
        b.Aj = Xk(b);
        b.Lk = g;
        b.Mk = h;
        f = "a\x3dcandidate:" + b.Aj + " " + b.Ol + " " + b.Hk + " " + b.Qn + " " + b.Vh + " " + b.rd + " typ " + b.gj;
        b.Lk && (f += " raddr " + b.Lk);
        b.Mk && (f += " rport " + b.Mk);
        return f += " generation " + b.Pp
    }
    n = il.prototype;
    n.Cj = function(a) {
        var b = a.candidate;
        if (ol.test(b) && (!this.od || "video" !== a.sdpMid) && (this.od || "audio" !== a.sdpMid))
            if (!this.mc || this.od && !this.Rm) F(this.G, "Queuing remote host candidates for relay: " + b), this.Nk.push(a);
            else {
                this.h("genRelayCandidatesForRemoteCandidate", b);
                var c = Zk(b),
                    d = Wh(this.mc, "udpPort");
                2 === c.Ol && (d += 1);
                ll(this, rl(this, b, "udp", 1056964608, d), a.sdpMid, a.sdpMLineIndex);
                ll(this, rl(this, b, "tcp", 1016964608, Wh(this.mc, "tcpPort")), a.sdpMid, a.sdpMLineIndex)
            }
    };
    n.Bj = function(a) {
        var b = a.candidate;
        if (ol.test(b) && (!this.od || "video" !== a.sdpMid) && (this.od || "audio" !== a.sdpMid))
            if (!this.mc || this.od && !this.Rm) F(this.G, "Queuing local host candidate for relay: " + b), this.Vj.push(a);
            else {
                this.h("genRelayCandidatesForLocalCandidate", b);
                var c = Zk(b),
                    d = Wh(this.mc, "udpExtPort");
                2 === c.Ol && (d += 1);
                c = rl(this, b, "udp", 1056964608, d);
                c = new Jj(Tj(c, a.sdpMid, a.sdpMLineIndex));
                this.dh(c);
                c = rl(this, b, "tcp", 1016964608, Wh(this.mc, "tcpPort"));
                c = new Jj(Tj(c, a.sdpMid, a.sdpMLineIndex));
                this.dh(c)
            }
    };
    n.dh = function(a) {
        this.ks && ol.test(a.candidate) || this.ms && ql.test(a.candidate) || this.so && pl.test(a.candidate) ? this.h("addIceCandidate_", "Skipping", a.candidate) : this.t.addIceCandidate(a)
    };

    function sl(a, b) {
        a.h("allocateRelay");
        if (a.so) F(a.G, "Skipping relay allocation");
        else if (b && (a.Pm = Zj(Mj, b.sdp, a.od), a.kq = Zj(Nj, b.sdp, a.od)), a.Pm && a.kq) {
            var c = new Tk(a.ca.Qa(), a.ca.j(), a.j(), a.ca.ia().oa(), a.Pm, a.kq);
            a.ca.Ra(c.l(), c)
        }
    }
    n.addStream = function(a) {
        this.t.addStream(a)
    };
    n.removeStream = function(a) {
        this.t.removeStream(a)
    };

    function tl(a, b) {
        if (a.Ua !== b) throw a.error(new N("BAD_SIGNAL_STATE", {
            signalState: a.Ua,
            expectedState: b
        }));
    }

    function ul(a, b, c) {
        if (b.Jj() !== a.j()) return !1;
        if (c && a.Ua !== c) throw a.error(new N("BAD_SIGNAL_STATE", {
            signalState: a.Ua,
            expectedState: c,
            signal: b
        }));
        a.h("onSignal", b);
        return !0
    }

    function vl(a, b) {
        a.h("setSignalState", b);
        a.Ua = b
    }

    function ml(a, b) {
        a.h("setPeerState", b);
        S(a.Q(), "peerState", b)
    }
    n.ov = function() {
        var a = this.Od();
        if ("incoming" === a || "outgoing" === a) this.h("onAutoTimeout - Stopping peersession"), this.stop()
    };

    function wl(a, b) {
        xl(a, b);
        a.$j = b.Nj();
        a.rq = -1 !== a.$j.search(Lj) ? !0 : !1;
        z(Yj(a.$j), a.Cj, a)
    }

    function yl(a) {
        var b = a.Vj;
        a.Vj = [];
        z(b, a.Bj, a);
        b = a.Nk;
        a.Nk = [];
        z(b, a.Cj, a)
    }

    function zl(a, b) {
        xl(a, b);
        var c = b.Nj();
        Sj(a.t, c, a.vd).n(function() {
            this.Rm = !0;
            z(this.wi, this.dh, this);
            ib(this.wi);
            z(Yj(c), this.Cj, this);
            yl(this)
        }, a)
    }

    function xl(a, b) {
        "room" === a.D.X() ? a.sb = fl(b.Kh(), a.ca.Qa(), b.Oc()) : a.sb = fl(a.D.j(), a.ca.Qa(), b.Oc())
    }

    function kl(a, b) {
        a.h("onIntroduce_", b);
        if (a.cl) vl(a, 16), Al(a, b);
        else {
            if (0 !== a.Ua && 15 != a.Ua) throw a.error(new N("BAD_SIGNAL_STATE", {
                signalState: a.Ua,
                expectedState: 0
            }));
            xl(a, b);
            a.vd = Qk(b);
            vl(a, 17);
            ml(a, "incoming")
        }
    }
    n.ux = function(a) {
        this.h("onWelcomeMessage_", a.target);
        a = a.target;
        ul(this, a, 16) && Al(this, a)
    };

    function Al(a, b) {
        xl(a, b);
        a.vd = Qk(b);
        vl(a, 18);
        Bl(a, "sig:sessionStart");
        a.Pn ? a.Pn(a, a.vd).n(a.vw, a) : Cl(a)
    }
    n.Av = function(a) {
        a = a.target;
        ul(this, a, 13) && (wl(this, a), this.h("acceptContentChange"), vl(this, 9), Pj(this.t, this.$j).n(this.hv, this))
    };
    n.Vq = function(a) {
        this.h("onAcceptMessage_");
        a = a.target;
        ul(this, a, 2) && (ml(this, "connecting"), zl(this, a), vl(this, 6), vl(this, 13))
    };
    n.yv = function(a) {
        a = a.target;
        ul(this, a, 7) && zl(this, a)
    };
    n.Xw = function(a) {
        ul(this, a.target) && (this.cl || 19 === this.Ua || Dl(this))
    };
    n.Cw = function(a) {
        ul(this, a.target, 16) && (vl(this, 10), this.stop())
    };
    n.$w = function(a) {
        ul(this, a.target) && 15 !== this.Ua && (vl(this, 12), Dl(this))
    };
    n.Yv = function(a) {
        this.cl ? (vl(this, 2), this.Vq(a)) : (a = a.target, ul(this, a) && 19 === this.Ua && (vl(this, 3), this.h("onInitiate_", a), vl(this, 3), wl(this, a), this.h("accept"), tl(this, 3), vl(this, 4), ml(this, "connecting"), Pj(this.t, this.$j, this.vd).n(this.iv, this)))
    };
    n.tv = function(a) {
        var b = a.target;
        if (ul(this, b)) {
            a = b.Nj();
            var c = b.Xp(),
                b = b.Wp();
            a = new Jj(Tj(a, c, b));
            13 === this.Ua ? this.dh(a) : (F(this.G, "Queueing candidate"), this.wi.push(a));
            this.Cj(a)
        }
    };
    n.jr = function(a) {
        var b = a.target;
        ul(this, b) && ((a = b.getError()) ? this.G.log(be, "Error allocating relay: " + a, void 0) : (this.mc = b.La(), yl(this)))
    };
    n.qx = function(a) {
        var b = a.target;
        if (ul(this, b)) {
            var c = R(b, "streamId");
            c ? fb(this.t.Pd(), function(a) {
                return a.jd() === c ? (xj(a, Xh(b, "vadState")), !0) : !1
            }, this) : (a = this.t.Dh()) && 0 < a.length && xj(a[0], Xh(b, "vadState"))
        }
    };
    n.Pd = function() {
        return this.t.Pd()
    };
    n.nm = function() {
        if (ej && ij(29)) {
            var a = new G;
            this.t.getStats().n(function(b) {
                var c = b.result();
                b = "unknown";
                for (var d = 0; d < c.length; d++)
                    if (c[d].stat("googActiveConnection")) {
                        c = c[d].stat("googRemoteAddress");
                        if (!c) break;
                        c = c.split(":")[1];
                        5E3 == c || 5001 == c || 5002 == c || 5003 == c ? b = "relay:udp" : 443 == c && (b = "relay:tcp");
                        break
                    }
                a.aa(b)
            }, this).Mb(function(b) {
                a.ma(b)
            });
            return a
        }
        return new G("unknown")
    };
    n.start = function(a) {
        this.h("start", a);
        a = this.t;
        a.Za = {
            mandatory: {
                OfferToReceiveAudio: !0,
                OfferToReceiveVideo: !0
            }
        };
        $i && (a.Za.mandatory.MozDontOfferDataChannel = !0);
        17 === this.Ua ? (this.h("welcome_"), a = Nk(), a = El(this, "sig:sessionWelcome", a), this.sb && this.ca.Ra(this.sb, a), tl(this, 17), vl(this, 19)) : 0 === this.Ua && (this.h("introduce_"), tl(this, 0), a = Nk(), a = El(this, "sig:sessionIntroduce", a), this.sb ? this.ca.Ra(this.sb, a) : Fl(this, a), vl(this, 16), ml(this, "outgoing"))
    };
    n.stop = function() {
        this.h("stop");
        3 === this.Ua ? Gl(this) : 17 === this.Ua ? Gl(this) : 15 !== this.Ua && (0 === this.Ua || this.Vc("sig:sessionTerminate"), vl(this, 11));
        this.Rk && rh(this.Rk);
        this.Rk = null;
        Dl(this)
    };

    function Cl(a) {
        a.h("initiate");
        tl(a, 18);
        vl(a, 1);
        a.t.createOffer().n(a.Xv, a)
    }
    n.Xv = function(a) {
        vl(this, 2);
        var b = Hl(this, "sig:sessionInitiate", a.sdp);
        this.sb ? this.ca.Ra(this.sb, b) : Fl(this, b);
        this.mc || (z(Yj(a.sdp), this.Bj, this), sl(this, a))
    };
    n.mp = function() {
        this.h("onNegotiationNeeded");
        this.t.createOffer().n(this.zv, this)
    };
    n.zv = function(a) {
        this.h("oContentChangeDone", a.sdp);
        this.Vc("sig:contentModify", a.sdp)
    };
    n.vw = function() {
        Cl(this)
    };
    n.iv = function(a) {
        this.h("onAcceptDone", a.sdp);
        this.Vc("sig:sessionAccept", a.sdp);
        vl(this, 5);
        vl(this, 13);
        this.rq && ej || this.mc || (z(Yj(a.sdp), this.Bj, this), sl(this, a));
        z(this.wi, this.dh, this);
        ib(this.wi)
    };
    n.hv = function(a) {
        this.h("onAcceptContentChangeDone", a.sdp);
        this.Vc("sig:contentAccept", a.sdp);
        vl(this, 10);
        vl(this, 13)
    };

    function Gl(a) {
        a.h("reject");
        tl(a, 17);
        a.Vc("sig:sessionReject");
        vl(a, 9)
    }

    function Dl(a) {
        a.h("close");
        if (a.t) {
            var b;
            b = "disconnected" === a.Od() ? "disconnected" : 12 === a.Ua ? "remotestopped" : "localstopped";
            a.t.close(b);
            a.t = null
        }
        15 !== a.Ua && (a.C().wd(), Sh(a.ca.W, "pub:relayAllocationResponse", a.jr, a), a.od = !1, a.mc = a.Pm = null, a.Nk.length = a.Vj.length = 0, vl(a, 15), ml(a, "closed"), a.dispatchEvent("peerSession:end"), a.H.remove())
    }
    n.Vc = function(a, b, c, d) {
        this.sb ? this.ca.Ra(this.sb, Hl(this, a, b, c, d)) : Bl(this, a, b, c, d)
    };

    function Bl(a, b, c, d, f) {
        "room" === a.D.X() && a.sb ? a.ca.Ra(a.sb, Hl(a, b, c, d, f)) : a.ca.Ra(Il(a.D), Hl(a, b, c, d, f))
    }

    function Fl(a, b) {
        "room" === a.D.X() && a.sb ? a.ca.Ra(a.sb, b) : a.ca.Ra(Il(a.D), b)
    }

    function Hl(a, b, c, d, f) {
        var g = a.j(),
            h = a.ca.j(),
            k = a.ca.Qa(),
            m;
        "room" === a.D.X() && (m = cl(a.D.j()));
        return c ? d ? new Sk(b, k, h, g, c, d, f, m) : new Rk(b, k, h, g, c, m) : new Ok(b, k, h, g, m)
    }

    function El(a, b, c) {
        var d = a.j(),
            f = a.ca.j(),
            g = a.ca.Qa(),
            h;
        "room" === a.D.X() && (h = cl(a.D.j()));
        return new Pk(b, g, f, d, c, h)
    }
    n.Od = function() {
        return this.H.Od()
    };
    n.Ho = function(a) {
        a = new $k(this.ca.Qa(), this.ca.j(), this.j(), a);
        this.sb && this.ca.Ra(this.sb, a)
    };

    function Jl(a) {
        L.call(this, "mediaSession", null, null, a);
        S(this, "mediaState", "inactive")
    }
    y(Jl, L);
    ff("mediaSession", Jl);
    Jl.prototype.Nc = function() {
        return R(this, "mediaState")
    };

    function Kl(a, b, c, d) {
        Ok.call(this, "vadStateConfidence", a, b, c);
        S(this, "vadStateList", d)
    }
    y(Kl, Ok);
    ff("vadStateConfidence", Kl, ["iss", "sid", "mid", "vadStateList"]);
    var Ll = !0;
    Zg(window, "focus", function() {
        Ll = !0
    });
    Zg(window, "blur", function() {
        Ll = !1
    });
    var Ml = !!window.Notification && !jj(),
        Nl = {},
        Ol = function() {
            if (!Ml) return "denied";
            if (null != Notification.permission) return Notification.permission;
            if (null != window.webkitNotifications) switch (window.webkitNotifications.checkPermission()) {
                case 0:
                    return "granted";
                case 1:
                    return "default"
            }
            return "denied"
        }();

    function Pl(a, b) {
        var c = void 0;
        if (Ml && "granted" === Ol) {
            c || (c = "/s/img/icon-72.png");
            var d = new Notification("vLine link: A new person joined", {
                body: a,
                title: "vLine link: A new person joined",
                tag: b,
                icon: c
            });
            if (d) {
                Nl[b] = d;
                var f = window;
                d.onclick = function() {
                    var a = Ql(b);
                    a && a.close();
                    f.focus()
                };
                d.onclose = function() {
                    Ql(b, d)
                }
            }
        }
    }

    function Ql(a, b) {
        var c = Nl[a];
        if (!b || b && c === b) return delete Nl[a], c
    };

    function Rl(a, b) {
        this.ob = a;
        this.I = this.ob.ia().I;
        this.A = b;
        this.Lb = this.ob.pb();
        this.We()
    }
    n = Rl.prototype;
    n.We = function() {
        var a = this.A;
        this.Lb.sp(a.j());
        a.C().g(a, "stop:mediaSession", this.kw, !1, this).g(a, "enterState:incoming", this.Wv, !1, this).g(a, "enterState:outgoing", this.rw, !1, this).g(a, "enterState:connecting", this.xv, !1, this).g(a, "mediaSession:addLocalStream", this.cw, !1, this).g(a, "remove:mediaSession", this.jw, !1, this)
    };
    n.kw = function() {
        this.Nm(!0)
    };
    n.Wv = function(a) {
        a = a.target;
        var b = Xh(this.I, T.Gs) || a.hh();
        b || (b = Xh(a.Xb().Q(), "_autoAccept"));
        Ej(this.I, T.Ls) && !b ? Sl(this) : Tl(this.Lb, a.j(), !1);
        b && !a.hh() && a.start()
    };

    function Sl(a) {
        var b = a.A,
            c = b.j(),
            d = new P(Ul, null, {
                mediaSession: b
            });
        b.C().g(b, ["exitState:incoming", "enterState:closed"], function() {
            Tl(this.Lb, c, !1)
        }, !1, a);
        Vl(a.Lb, c, d)
    }
    n.rw = function(a) {
        a = a.target.j();
        Ej(this.I, T.To) ? Wl(this) : Tl(this.Lb, a, !1);
        Xl(this)
    };

    function Wl(a) {
        var b = a.A,
            c = b.j(),
            d = new P(Yl, null, {
                mediaSession: b
            });
        b.C().g(b, ["exitState:connecting", "enterState:closed"], function() {
            Tl(this.Lb, c, !1)
        }, !1, a);
        Vl(a.Lb, c, d)
    }
    n.xv = function(a) {
        a = a.target;
        a.j();
        var b = !a.dk;
        a.dk && !Ej(this.I, T.To) && (b = !0);
        this.Lb.Sj(b);
        Xl(this)
    };
    n.cw = function() {
        (this.I.get(T.vl) || this.I.get(T.So)) && Xl(this)
    };
    n.jw = function(a) {
        this.Lb.Sj(!1);
        Tl(this.Lb, a.target.j(), !0)
    };

    function Xl(a) {
        if (a.I.get(T.vl) || a.I.get(T.So)) {
            var b = a.I.get(T.vl);
            var c = a.Lb;
            a = a.A;
            var d = a.j();
            c.Ue[d] ? new G("no panel") : (c.vp(a, b), c.is(d))
        } else new G("no panel")
    }
    n.Nm = function(a) {
        this.Lb.Nm(this.A.j(), a)
    };
    n.eo = ca("I");

    function Zl(a) {
        return a.Jp ? "Click to dismiss" : "Click here to bring your conversation to the foreground"
    };

    function W(a) {
        ki.call(this, a);
        this.sa = [];
        this.T = [];
        this.Kb = [];
        this.ji = this.D = null;
        this.Za = {
            audio: !0,
            video: !0,
            hd: !1,
            loopback: void 0
        };
        this.vd = this.Ri = null;
        this.yf = !1;
        this.ee = this.Dq = null;
        this.dk = this.Sk = this.No = this.Mo = this.El = !1;
        this.Gk = new G;
        this.Cc = !1;
        this.C().g(this, "change:peerState", this.tw).g(this, "peerConnection:addRemoteStream", this.Fw).g(this, "peerConnection:removeRemoteStream", this.Gw).g(this, "change:mediaState", this.Dn)
    }
    y(W, ki);
    df("mediaSession", W, ["$entity"]);
    n = W.prototype;
    n.Ci = 3E4;
    n.k = function() {
        this.stop();
        W.c.k.call(this)
    };
    n.Q = e("H");

    function $l(a, b) {
        return db(a.T, b) || db(a.Kb, b)
    }
    n.Xb = e("D");
    n.eo = function(a) {
        var b = this.D.r().M();
        a = new Bj(a, b.ia().I);
        this.ji && this.ji.eo(a)
    };
    n.Nd = function() {
        return this.D && this.D.Nd() || ""
    };
    n.kd = function() {
        return this.D && this.D.kd() || null
    };
    n.Rj = function() {
        return $l(this, function(a) {
            return a.Rj()
        })
    };
    n.Qd = function() {
        return $l(this, function(a) {
            return a.Qd()
        })
    };
    n.Nc = function() {
        return this.Q().Nc()
    };
    n.Ku = function() {
        return "pending" === this.Nc()
    };
    n.Fu = function() {
        return "incoming" === this.Nc()
    };
    n.Ju = function() {
        return "outgoing" === this.Nc()
    };
    n.Xm = function() {
        return "connecting" === this.Nc()
    };
    n.Rc = function() {
        return "active" === this.Nc()
    };
    n.Du = function() {
        return "closed" === this.Nc()
    };
    n.Gu = e("dk");
    n.wq = e("Cc");

    function am(a, b) {
        a.h("getLocalStream_", "constraints_", a.Za);
        if (a.ee) return F(a.G, "getLocalStream_: this.streamAddedPromise_ already exists. Not getting another local stream."), a.ee;
        var c = a.ee = new G,
            d = b || a.Za;
        a.Dq = jl(a.ia()).Ij(d);
        a.Dq.n(w(a.Bn, a)).Mb(w(a.An, a));
        bm(a);
        return c
    }
    n.nm = function() {
        return this.sa[0].nm()
    };

    function cm(a) {
        a = a.sa[0];
        return 0 < a.Pd().length ? a.Pd()[0] : null
    }
    n.An = function(a) {
        this.error(a);
        0 == this.T.length && this.stop();
        this.ee.ma(a);
        this.ee = null
    };
    n.Bn = function(a) {
        this.h("onLocalStream_", a);
        this.addStream(a)
    };
    n.vo = function() {
        this.h("startPeerSessions_");
        dm(this).n(function() {
            z(this.sa, function(a) {
                a.start(this.Za)
            }, this)
        }, this)
    };

    function dm(a, b, c) {
        a.h("updateLocalStreamFromConstraints_", "opt_peersession", b, "opt_decodeConstraints", c);
        em(a, c);
        var d = new G;
        if ($i) {
            if (0 == a.T.length && 1 === a.sa.length) return am(a).n(function() {
                fm(this, b);
                d.aa()
            }, a), d
        } else if (0 == a.T.length || 1 === a.sa.length && !Qi(a.T[0].bi, a.Za)) return F(a.G, "No local stream or current constraints are not compatible with new constraints.  Getting a new stream."), 0 == a.T.length || a.removeStream(a.T[0]), am(a).n(function() {
            fm(this, b);
            d.aa()
        }, a), d;
        F(a.G, "Constraints are compatible.  Adding stream to " +
            a.sa.length + " peersessions");
        fm(a, b);
        d.aa();
        return d
    }

    function fm(a, b) {
        var c = a.T;
        b ? z(c, function(a) {
            b.addStream(a)
        }, a) : z(a.sa, function(a) {
            z(c, function(b) {
                a.addStream(b)
            }, this)
        }, a)
    }
    n.Ax = function(a, b) {
        return dm(this, a, b)
    };

    function em(a, b) {
        a.h("updateSystemConstraints_", "opt_decodeConstraints", b);
        a.vd = b || a.vd;
        var c = Xj(Wj(), a.vd);
        F(a.G, "Using " + ac(c));
        a.Ri = Ri(c);
        gm(a, a.Za)
    }

    function hm(a, b) {
        var c = b.target,
            d = c.Kh();
        em(a, Qk(c));
        a.h("onIntroduce", a.Za);
        var f = fb(a.sa, function(a) {
                var b = a.Od();
                return a.Xb().j() === d && ("outgoing" === b || "pending" === b)
            }),
            g = im(a, c);
        if (g || f) f && (g ? g = "pending" === f.Od() || f.j() < g.j() ? f : g : (g = null, f.cl = !0, kl(f, c)), c.Kh() !== a.r().Qa() && g && (F(a.G, "Glare detected. Closing session " + g.j()), g.stop())), 0 < a.T.length ? a.vo() : a.D.hh() && a.start(), bm(a)
    }
    n.start = function(a) {
        this.Cc = !0;
        this.h("start", "opt_constraints", a, "started_", this.Cc);
        a && gm(this, a);
        a = !0;
        jm(this) && (a = !1);
        0 == this.sa.length && im(this, null, a);
        0 == this.T.length ? am(this).n(this.vo, this) : this.vo();
        return this.Gk
    };
    n.uo = function(a) {
        return 0 == this.T.length ? am(this, a) : new G(this.T[0])
    };
    n.Mw = function(a) {
        this.oq(a.target)
    };
    n.oq = function(a) {
        "participantSession" === a.X() && (this.h("Media change handler registered for session " + a.j()), this.C().g(a, "change:mediaOn", this.hw, !1, this), km(this, a))
    };
    n.hw = function(a) {
        !1 === a.oldVal && !0 === a.val && km(this, a.target)
    };

    function lm(a, b) {
        return db(a.sa, function(a) {
            "active" !== a.Od() ? a = !1 : (a = a.sb, null != a ? (a = a.split("/"), a = 5 > a.length ? "" : a[4]) : a = "", a = a === b);
            return a
        })
    }

    function km(a, b) {
        if ("participantSession" === b.X())
            if (a.D.Tc) {
                var c = R(b, "path"),
                    d;
                d = c.split("/");
                d = 5 > d.length ? "" : d[4];
                var c = c.split("/"),
                    c = 7 > c.length ? "" : c[6],
                    f = a.r().Ba.j(),
                    g = a.r().j();
                if (c !== g)
                    if (lm(a, c)) a.h("Not starting peersession since we're already connected to peer");
                    else {
                        var h = Xh(b, "webrtcEnabled"),
                            k = Xh(b, "mediaOn");
                        h && k ? (a.h("Media session started"), k = a.ji, h = $i ? Zl({
                            Jp: !0
                        }) : Zl({
                            Jp: !1
                        }), Ej(k.I, T.Is) && (k = k.A.j(), Ll || h && k && Pl(h, k)), f = fl(d, f, c), c < g && (im(a).sb = f, a.start(), a.Tm("Started peer room session with ",
                            d))) : a.h("Not starting mediasession as remote/webrtc flag not set")
                    }
            } else a.h("Not starting mediasession as local media flag is not set")
    }

    function gm(a, b) {
        var c, d, f, g;
        null != b ? (c = b.loopback, d = b.audio, f = b.video, g = b.hd, c && (null == d && null == f && null == g) && (d = f = !0, g = !1), null != d || (d = !1), null != f || (f = !1), null != g || (g = !1)) : (d = f = !0, g = !1);
        a.Za = {
            audio: d,
            video: f,
            hd: g,
            loopback: c
        };
        a.yf = Boolean(c);
        a.Ri && (a.Za.video && a.Ri.video && (a.Za.video = a.Ri.video), a.h("applySystemConstraints_", "constraints_", a.Za, "systemUserMediaConstraints_", a.Ri))
    }
    n.addStream = function(a) {
        this.h("addStream", "localStream constraints", a.bi, "constraints_", this.Za);
        if (hb(this.T, a)) this.ee = null;
        else {
            this.T.push(a);
            var b = this.D.r().Ba;
            a.Ba = b;
            a.Mg(this.El);
            a.Og(this.Mo);
            a = new Fh("mediaSession:addLocalStream", this, a);
            this.dispatchEvent(a);
            a.type = "mediaSession:addStream";
            this.dispatchEvent(a, null, !0);
            a = this.ee;
            this.ee = null;
            a.aa()
        }
    };
    n.removeStream = function(a) {
        if (kb(this.T, a)) {
            z(this.sa, function(b) {
                b.removeStream(a)
            });
            a.stop();
            var b = new Fh("mediaSession:removeLocalStream", this, a);
            this.dispatchEvent(b);
            b.type = "mediaSession:removeStream";
            this.dispatchEvent(b, null, !0)
        }
    };
    n.stop = function() {
        this.Cc = !1;
        this.dispatchEvent("stop:mediaSession");
        var a = 0 === this.sa.length;
        z(ob(this.sa), function(a) {
            a.stop()
        });
        mm(this);
        a && bm(this);
        this.D && (this.C().wd(), this.D.ja(), this.D = null);
        this.H && 512 !== (this.H.na & 512) && this.H.remove();
        this.vd = null;
        return this
    };
    n.bk = e("El");
    n.$m = e("Mo");
    n.Mg = function(a) {
        this.El = a;
        z(this.T, function(b) {
            b.Mg(a)
        });
        return this
    };
    n.Og = function(a) {
        this.Mo = a;
        z(this.T, function(b) {
            b.Og(a)
        });
        return this
    };
    n.Ou = e("No");

    function nm(a, b) {
        a.No !== b && ((a.No = b) ? a.dispatchEvent("videopanel:show") : a.dispatchEvent("videopanel:hide"))
    }
    n.Dh = function() {
        return ob(this.T)
    };
    n.Pd = function() {
        return ob(this.Kb)
    };

    function im(a, b, c) {
        a.h("createPeerSession");
        if (c = jl(a.ia()).Sl(a.D, a.Za, a.Ci, b, c)) {
            c.Cb(a);
            var d = w(a.Ax, a);
            c.Pn = d;
            a.sa.push(c);
            bm(a);
            1 === a.sa.length && (a.dk = !b, a.dispatchEvent("add:mediaSession"))
        }
        return c
    }

    function mm(a) {
        z(ob(a.T), a.removeStream, a);
        ib(a.T)
    }
    n.Fw = function(a) {
        var b = a.stream;
        hb(this.Kb, b) || (this.Kb.push(b), om(this, b).n(function(a) {
            b.Ba = a;
            a = b.jd().match(/Stream-(.+?:[^:]+):([^:]+):([^:-]+)/);
            b.Fk = a && a[3] ? a[3] : ""
        }, this).Xe(function() {
            var a = !0;
            $i && this.yf && (a = !1);
            a && this.dispatchEvent(new Fh("mediaSession:addRemoteStream", this, b))
        }, this))
    };
    n.Gw = function(a) {
        var b = a.stream;
        kb(this.Kb, b);
        b && (b.stop(), this.dispatchEvent(new Fh("mediaSession:removeRemoteStream", this, b, a.reason)))
    };
    n.tw = function(a) {
        a = a.target;
        bm(this);
        switch (a.Od()) {
            case "incoming":
            case "outgoing":
                a.Rk = I(w(a.ov, a), a.Ci, a);
                break;
            case "closed":
                this.h("removePeerSession"), kb(this.sa, a), a.vb(), 0 == this.sa.length && ("room" === this.X() ? !this.D.Tc && this.H.remove() : (mm(this), this.H.remove()));
            default:
                if (this.Sk) {
                    this.Sk = !1;
                    a = jl(this.ia());
                    a.h("stopRinging");
                    try {
                        0 === --a.Rr && a.xd && (a.xd.pause(), a.xd.load(), a.Yy = !1)
                    } catch (b) {
                        a.error(b, "Error stopping ringtone")
                    }
                }
        }
    };
    n.Dn = function(a) {
        var b = a.oldVal,
            c = a.ba();
        this.h("onMediaStateChange", "oldState", b, "newState", c);
        switch (c) {
            case "incoming":
            case "outgoing":
                this.Sk || (this.Sk = !0, pm(jl(this.ia())))
        }
        "inactive" === b && "incoming" === c || "inactive" === b && "pending" === c ? I(function() {
            Oh(this, b, c)
        }, 0, this) : Oh(this, b, c)
    };

    function bm(a) {
        var b, c = a.sa,
            d = "inactive";
        for (b = 0; b < c.length && (d = c[b].Od(), "active" !== d); ++b);
        a.ee && "active" !== d && (d = "pending");
        S(a.Q(), "mediaState", d);
        a.Gk.Mc || ("active" === d ? a.Gk.aa(a) : "closed" === d && a.Gk.ma(new N("CLOSED")))
    }
    n.bs = ca("Ci");
    n.px = function(a) {
        if (a = a.target.get("vadStateList"))
            for (var b = 0; b < a.length; ++b) {
                var c = a[b],
                    d = c.streamName;
                fb(this.Pd(), function(a) {
                    var b = a.jd().replace("-thumbnail", "");
                    return a.jd() === d || b === d ? (a.Pl = c.confidence, a.Uu = c.lastSpeechValue, a.ek !== c.vadState && xj(a, c.vadState), !0) : !1
                }, this)
            } else this.G.log(ce, "Signalled with null confidence data", void 0)
    };

    function om(a, b) {
        var c = b.jd().match(/Stream-(.+?:[^:]+)/),
            c = c && c[1] ? c[1] : a.D.j();
        return a.D.r().qb(c)
    }
    n.Wt = function() {
        var a = [];
        z(this.T, function(b) {
            a.push(b.qb())
        }, this);
        z(this.Kb, function(b) {
            a.push(b.qb())
        }, this);
        return a
    };
    n.X = function() {
        return this.D.X()
    };
    n.jl = function() {
        var a = this.D.r().Ba,
            b = this.D.j();
        a.jl(b, "tv")
    };

    function jm(a) {
        if (a = a.D.Q())
            if (a = R(a, "presenceDesc")) return "Conferencing" === a || "Conferencing-1.1" === a;
        return !1
    }
    n.hh = function() {
        return this.D.hh()
    };
    n.Ho = function(a) {
        0 < this.sa.length && this.sa[0].Ho(a)
    };

    function qm(a, b) {
        L.call(this, "mailbox");
        a && this.lo(a);
        b || (b = 1);
        b && S(this, "totalMessages", b)
    }
    y(qm, L);
    Ue("mailbox", qm);
    qm.prototype.lo = function(a) {
        var b = Wh(this, "readIdx");
        (!b || a > b) && S(this, "readIdx", a)
    };
    ff(["mailbox"], qm, ["readIdx", "totalMessages"], "readIdx", qm.prototype.lo);
    qm.prototype.jc = function(a) {
        if (!this.Fx) {
            this.Fx = !0;
            var b = this.r(!0);
            if (!b) return qm.c.jc.call(this, a);
            var c = this.Ej(),
                d = this;
            b.qb(c).n(function(b) {
                Uh(this, b);
                L.prototype.jc.call(this, a);
                var c = Wh(d, "totalMessages") - Wh(d, "readIdx");
                0 < c && (b.dispatchEvent("change"), b.Rc() ? rm(this.r()) : Nh(b, "unreadCount", 0, c))
            }, this)
        }
    };

    function X(a) {
        ki.call(this, a);
        this.A = null;
        this.Ld = !0;
        this.$h = 0;
        this.fi = null;
        this.Tc = this.Hl = this.Vb = !1;
        this.addEventListener("pub:sig:sessionIntroduce", this.Zv, !1, this);
        this.addEventListener("pub:typing", this.hx, !1, this);
        this.addEventListener("change:unreadCount", this.jx, !1, this);
        this.addEventListener("change:readIdx", this.yw, !1, this);
        this.C().g(this, "pub:transfer", this.fx)
    }
    y(X, ki);
    n = X.prototype;
    n.Dp = "";
    n.ci = 0;
    n.pk = 0;
    n.Kg = 0;
    n.Zm = !1;
    n.Ea = hc;
    n.k = function() {
        this.A && this.A.stop();
        X.c.k.call(this)
    };
    n.Zt = function() {
        var a = this.H.j();
        return Ke(a)
    };
    n.Nd = function() {
        return this.H.Nd() || ""
    };
    n.pe = function() {
        return this.H.pe() || null
    };
    n.Ng = function(a) {
        this.H.Ng(a);
        return this
    };
    n.tm = function() {
        return this.H.tm()
    };
    n.kd = function() {
        return this.H.kd()
    };
    n.Oe = function(a) {
        var b = sm(this);
        b.start(a);
        return b
    };
    n.Pe = function() {
        return this.A ? this.A.stop() : null
    };
    n.Rt = e("A");
    n.Zv = function(a) {
        hm(sm(this), a)
    };
    n.nq = function() {
        this.ci || (tm(this), this.pk = I(function() {
            var a = ta() - this.ci;
            0 < a && 4E3 >= a && tm(this);
            this.ci = 0
        }, 4E3, this));
        this.ci = ta();
        return this
    };

    function tm(a) {
        a.h("sendTypingMessage");
        a.Vc("", "typing")
    }

    function um(a) {
        a.h("emitTypingEnd");
        a.Kg && rh(a.Kg);
        a.Kg = 0;
        a.Zm = !1;
        a.dispatchEvent("typing:end")
    }
    n.hx = function() {
        this.h("onTypingMessage");
        this.Kg ? (this.h("onTypingMessage", "clearing remote typing timer"), rh(this.Kg)) : (this.h("onTypingMessage", "emitting typing start"), this.Zm = !0, this.dispatchEvent("typing:start"));
        this.Kg = I(function() {
            um(this)
        }, 5E3, this)
    };
    n.fx = function(a) {
        this.h("onTransferMessage");
        a = a.target.Qp(!1, !0);
        console.log("XXXX" + a);
        var b = $b(a),
            c = this.r().j();
        b.sessionId !== c && ("transfer" === b.subType ? (a = this.r().M().mg()) && 0 < a.length || this.r().qb(b.to).n(function(a) {
            a.Oe().on("enterState:active", function() {
                b.subType = "transferred";
                b.sessionId = c;
                var a = ac(b);
                this.kc(a, "transfer")
            }, this)
        }, this) : (a = this.r().M().mg()) && 0 < a.length && this.r().qb(b.to).n(function(a) {
            a.Pe()
        }))
    };
    n.jl = function(a, b) {
        var c = this.r().j();
        this.kc(ac({
            to: a,
            device: b,
            subType: "transfer",
            sessionId: c
        }), "transfer")
    };

    function sm(a) {
        if (!a.A) {
            var b = jl(a.ia());
            b.h("createMediaSession");
            var c;
            c = a.r().W.sd("/local/mediaSession", "mediaSession").La().Ia;
            a.La();
            c.D = a;
            c.C().g(a, "pub:vadStateConfidence", c.px);
            c.Cb(a);
            var d = a.r().M();
            c.ji = new Rl(d, c);
            em(c);
            Rh(Rh(c, "remove:mediaSession", b.Cn, b), "change:mediaState", b.Dn, b);
            b.ii.push(c);
            b.bh || (b.bh = c);
            a.A = c;
            Rh(a.A, "remove:mediaSession", a.Cn, a)
        }
        return a.A
    }
    n.Cn = function() {
        this.A.vb();
        this.A = null
    };
    n.postMessage = function(a, b) {
        this.h("postMessage", "payload", a, "msgType", b);
        if (Aa(Va(a)) || t(b) && "im" != b && !wa(b, "x-msg-")) return Bh("BAD_PARAM");
        var c = b || "im";
        a = Da(a);
        "im" === c && (this.pk && (rh(this.pk), this.pk = 0), this.ci = 0);
        return this.Vc(a, c)
    };
    n.Ik = function(a, b) {
        this.h("publishMessage", "payload", a, "msgType", b);
        if (Aa(Va(a)) || t(b) && "im" != b && !wa(b, "x-msg-")) return Bh("BAD_PARAM");
        var c = b || "im";
        a = Da(a);
        return this.kc(a, c)
    };
    n.St = function(a) {
        a = t(a) ? a : 20;
        a = Math.min(a, 100);
        return this.r().Ig(al(this.r().Qa(), this.j()), new vm(34, a, !0))
    };
    n.Eh = function(a, b) {
        !this.fi && (this.fi = this.r().Eh(this.j(), a, b)) && (this.$h = Wh(this.fi, "totalMessages"));
        return this.fi
    };

    function wm(a) {
        if (!a.Ea()) {
            var b = a.Eh();
            b && b.lo(a.$h)
        }
    }
    n.mf = function() {
        if (this.Vb || this.Ea()) return 0;
        var a = this.Eh();
        if (!a) return 0;
        a = this.$h - Wh(a, "readIdx");
        return 0 > a ? 0 : a
    };
    n.ri = function(a) {
        if (!this.Ea()) {
            um(a.Je);
            var b = !!xm(this.r(), this.j());
            a = Wh(a, "idx");
            a > this.$h && (this.Eh(!0, a), this.$h = a, this.Vb ? (b && rm(this.r()), wm(this)) : b && (b = this.mf(), Nh(this, "unreadCount", b - 1, b)))
        }
    };
    n.jx = function(a) {
        a.val && (a = a.val - (a.oldVal || 0), 0 < a && rm(this.r(), a))
    };
    n.yw = function(a) {
        if (a.val && (a = a.val - (a.oldVal || 0), 0 < a)) {
            var b = this.r(),
                c = b.Ub;
            b.Ub = t(a) ? b.Ub - a : b.Ub - 1;
            0 > b.Ub && (b.Ub = 0);
            c !== b.Ub && Nh(b, "totalUnreadCount", c, b.Ub)
        }
    };
    n.Hu = function() {
        return lj() && Xh(this.H, "webrtcEnabled")
    };
    n.Nu = e("Zm");
    n.Tx = ca("Ld");
    n.setActive = function(a) {
        (this.Vb = a) && wm(this);
        return this
    };
    n.Rc = e("Vb");

    function ym(a, b, c, d) {
        a = a.r();
        var f = a.Qa();
        c = (new U(d, f, null, c, !0, !1)).vb();
        return a.put(b, c)
    }

    function zm(a, b, c, d) {
        a = a.r();
        var f = a.Qa();
        c = (new U(d, f, null, c, !0, !1)).vb();
        return a.Ra(b, c)
    }
    n.hh = e("Hl");

    function Am(a) {
        X.call(this, a);
        this.Tk = null
    }
    y(Am, X);
    df("person", Am, ["$entity"]);
    n = Am.prototype;
    n.xm = function() {
        return this.H.xm()
    };
    n.Ea = function() {
        return this.j() === this.r().Qa()
    };
    n.on = function(a, b, c) {
        Bm(this, "on", a);
        return Am.c.on.call(this, a, b, c)
    };
    n.In = function(a, b, c) {
        Bm(this, "one", a);
        return Am.c.In.call(this, a, b, c)
    };
    n.vn = function(a, b, c) {
        Bm(this, "off", a);
        return Am.c.vn.call(this, a, b, c)
    };

    function Bm(a, b, c) {
        db(c.split(Mh), function(a) {
            return "change:presenceState" === a || "change" === a
        }) && (c = [{
            event: "change:connectionState",
            target: a.r().M()
        }, {
            event: "change:online",
            target: a.H
        }, {
            event: "change:presenceAutoState",
            target: a.H
        }, {
            event: "change:presenceState",
            target: a.H
        }], a.Tk = a.og(), z(c, function(a) {
            "on" === b ? Rh(a.target, a.event, this.xn, this) : "one" === b ? Th(a.target, a.event, this.xn, this) : "off" === b && Sh(a.target, a.event, this.xn, this)
        }, a))
    }
    n.xn = function(a) {
        "change:presenceState" === a.type && a.stopPropagation();
        a = this.og();
        a !== this.Tk && (Nh(this, "presenceState", this.Tk, a), this.Tk = a)
    };
    n.og = function() {
        var a = this.H.og();
        return this.H.vg() && this.r().M().uf() && "invisible" !== a ? a || "online" : "offline"
    };
    n.sm = function() {
        return this.H.sm()
    };
    n.Yk = function(a, b) {
        switch (a) {
            case "invisible":
            case "do_not_disturb":
            case "online":
                Cm(this.H, a);
                break;
            case "none":
                S(this.H, "presenceAutoState", a)
        }
        b && S(this.H, "presenceDesc", b)
    };
    n.Vc = function(a, b) {
        var c;
        if ("typing" === b) c = zm(this, Il(this), a, b);
        else {
            var d = fi(Il(this));
            c = ym(this, d, a, b);
            this.Ea() || (d = fi(al(this.r().Qa(), this.j())), ym(this, d, a, b))
        }
        return c
    };
    n.kc = function(a, b) {
        return zm(this, Il(this), a, b)
    };

    function Il(a) {
        return al(a.j(), a.r().Qa())
    };

    function Dm(a) {
        this.gi = a;
        this.Xr = new bc
    }
    n = Dm.prototype;
    n.gi = null;
    n.Xr = null;
    n.set = function(a, b) {
        t(b) ? this.gi.set(a, this.Xr.Fa(b)) : this.gi.remove(a)
    };
    n.get = function(a) {
        var b;
        try {
            b = this.gi.get(a)
        } catch (c) {
            return
        }
        if (null !== b) try {
            return $b(b)
        } catch (d) {
            throw "Storage: Invalid value was encountered";
        }
    };
    n.remove = function(a) {
        this.gi.remove(a)
    };

    function Em() {};

    function Fm(a) {
        Dm.call(this, a)
    }
    y(Fm, Dm);

    function Gm(a) {
        this.data = a
    }

    function Hm(a) {
        return !t(a) || a instanceof Gm ? a : new Gm(a)
    }
    Fm.prototype.set = function(a, b) {
        Fm.c.set.call(this, a, Hm(b))
    };
    Fm.prototype.zm = function(a) {
        a = Fm.c.get.call(this, a);
        if (!t(a) || a instanceof Object) return a;
        throw "Storage: Invalid value was encountered";
    };
    Fm.prototype.get = function(a) {
        if (a = this.zm(a)) {
            if (a = a.data, !t(a)) throw "Storage: Invalid value was encountered";
        } else a = void 0;
        return a
    };

    function Im(a) {
        Dm.call(this, a)
    }
    y(Im, Fm);
    Im.prototype.set = function(a, b, c) {
        if (b = Hm(b)) {
            if (c) {
                if (c < ta()) {
                    Im.prototype.remove.call(this, a);
                    return
                }
                b.expiration = c
            }
            b.creation = ta()
        }
        Im.c.set.call(this, a, b)
    };
    Im.prototype.zm = function(a, b) {
        var c = Im.c.zm.call(this, a);
        if (c) {
            var d;
            if (d = !b) {
                d = c.creation;
                var f = c.expiration;
                d = !!f && f < ta() || !!d && d > ta()
            }
            if (d) Im.prototype.remove.call(this, a);
            else return c
        }
    };

    function Jm(a, b, c) {
        this.xq = this.rf = this.sf = null;
        b ? (this.xq = a, this.sf = null, this.rf = a.split(".")[0]) : (this.xq = null, this.sf = {
            typ: "JWT",
            alg: "none"
        }, c && Rc(this.sf, c), this.rf = null)
    }
    Jm.prototype.G = null;
    Ue("JWT", Jm);
    Jm.prototype.X = function() {
        !this.sf && this.rf && (this.sf = Je(this.rf));
        return this.sf.typ
    };

    function Km(a, b, c, d, f, g, h, k, m) {
        this.Zf = a;
        this.Ye = b;
        this.Ug = c;
        this.mn = d;
        this.Bx = f ? f : {};
        this.$s = g || null;
        this.$o = h || null;
        this.Rn = null;
        this.Cx = k || null;
        this.Zl = m || null
    }
    y(Km, nf);
    af("credentials", Km, "appId authId username userToken profile oauthToken appUrl providerUrl email".split(" "));

    function Lm(a) {
        a.type = "credentials";
        return Ze(cf, a, null, void 0, void 0)
    }
    n = Km.prototype;
    n.Fa = function() {
        return {
            type: "credentials",
            appId: this.oa(),
            authId: this.tc(),
            username: this.Ug,
            userToken: this.mn,
            profile: this.Hh(),
            oauthToken: this.yh(),
            appUrl: this.$o,
            providerUrl: this.Ih(),
            email: this.Zl
        }
    };
    n.oa = e("Zf");
    n.tc = e("Ye");
    n.yh = e("$s");
    n.Hh = e("Bx");
    n.Ih = e("Cx");

    function Mm(a) {
        this.Ib = a || Nm
    }

    function Nm(a, b) {
        return String(a) < String(b) ? -1 : String(a) > String(b) ? 1 : 0
    }
    n = Mm.prototype;
    n.Z = null;
    n.Ib = null;
    n.Ud = null;
    n.Td = null;
    n.add = function(a) {
        if (null == this.Z) return this.Td = this.Ud = this.Z = new Om(a), !0;
        var b = null;
        Pm(this, function(c) {
            var d = null;
            0 < this.Ib(c.value, a) ? (d = c.left, null == c.left && (b = new Om(a, c), c.left = b, c == this.Ud && (this.Ud = b))) : 0 > this.Ib(c.value, a) && (d = c.right, null == c.right && (b = new Om(a, c), c.right = b, c == this.Td && (this.Td = b)));
            return d
        });
        b && (Pm(this, function(a) {
            a.count++;
            return a.parent
        }, b.parent), Qm(this, b.parent));
        return !!b
    };
    n.remove = function(a) {
        var b = null;
        Pm(this, function(c) {
            var d = null;
            0 < this.Ib(c.value, a) ? d = c.left : 0 > this.Ib(c.value, a) ? d = c.right : (b = c.value, Rm(this, c));
            return d
        });
        return b
    };
    n.clear = function() {
        this.Td = this.Ud = this.Z = null
    };
    n.contains = function(a) {
        var b = !1;
        Pm(this, function(c) {
            var d = null;
            0 < this.Ib(c.value, a) ? d = c.left : 0 > this.Ib(c.value, a) ? d = c.right : b = !0;
            return d
        });
        return b
    };
    n.gd = function() {
        return this.Z ? this.Z.count : 0
    };
    n.Gj = function() {
        return this.Z ? this.Z.height : 0
    };
    n.cb = function() {
        var a = [];
        Sm(this, function(b) {
            a.push(b)
        });
        return a
    };

    function Sm(a, b, c) {
        if (a.Z) {
            var d;
            c ? Pm(a, function(a) {
                var b = null;
                0 < this.Ib(a.value, c) ? (b = a.left, d = a) : 0 > this.Ib(a.value, c) ? b = a.right : d = a;
                return b
            }) : d = Tm(a);
            a = d;
            for (var f = d.left ? d.left : d; null != a;)
                if (null != a.left && a.left != f && a.right != f) a = a.left;
                else {
                    if (a.right != f && b(a.value)) break;
                    var g = a;
                    a = null != a.right && a.right != f ? a.right : a.parent;
                    f = g
                }
        }
    }

    function Um(a, b, c) {
        if (a.Z) {
            var d;
            c ? Pm(a, w(function(a) {
                var b = null;
                0 < this.Ib(a.value, c) ? b = a.left : (0 > this.Ib(a.value, c) && (b = a.right), d = a);
                return b
            }, a)) : d = Vm(a);
            a = d;
            for (var f = d.right ? d.right : d; null != a;)
                if (null != a.right && a.right != f && a.left != f) a = a.right;
                else {
                    if (a.left != f && b(a.value)) break;
                    var g = a;
                    a = null != a.left && a.left != f ? a.left : a.parent;
                    f = g
                }
        }
    }

    function Pm(a, b, c) {
        for (c = c ? c : a.Z; c && null != c;) c = b.call(a, c)
    }

    function Qm(a, b) {
        Pm(a, function(a) {
            var b = a.left ? a.left.height : 0,
                f = a.right ? a.right.height : 0;
            1 < b - f ? (a.left.right && (!a.left.left || a.left.left.height < a.left.right.height) && Wm(this, a.left), Xm(this, a)) : 1 < f - b && (a.right.left && (!a.right.right || a.right.right.height < a.right.left.height) && Xm(this, a.right), Wm(this, a));
            b = a.left ? a.left.height : 0;
            f = a.right ? a.right.height : 0;
            a.height = Math.max(b, f) + 1;
            return a.parent
        }, b)
    }

    function Wm(a, b) {
        Ym(b) ? (b.parent.left = b.right, b.right.parent = b.parent) : Zm(b) ? (b.parent.right = b.right, b.right.parent = b.parent) : (a.Z = b.right, a.Z.parent = null);
        var c = b.right;
        b.right = b.right.left;
        null != b.right && (b.right.parent = b);
        c.left = b;
        b.parent = c;
        c.count = b.count;
        b.count -= (c.right ? c.right.count : 0) + 1
    }

    function Xm(a, b) {
        Ym(b) ? (b.parent.left = b.left, b.left.parent = b.parent) : Zm(b) ? (b.parent.right = b.left, b.left.parent = b.parent) : (a.Z = b.left, a.Z.parent = null);
        var c = b.left;
        b.left = b.left.right;
        null != b.left && (b.left.parent = b);
        c.right = b;
        b.parent = c;
        c.count = b.count;
        b.count -= (c.left ? c.left.count : 0) + 1
    }

    function Rm(a, b) {
        if (null != b.left || null != b.right) {
            var c = null,
                d;
            if (null != b.left) {
                d = Vm(a, b.left);
                Pm(a, function(a) {
                    a.count--;
                    return a.parent
                }, d);
                if (d != b.left) {
                    if (d.parent.right = d.left) d.left.parent = d.parent;
                    d.left = b.left;
                    d.left.parent = d;
                    c = d.parent
                }
                d.parent = b.parent;
                d.right = b.right;
                d.right && (d.right.parent = d);
                b == a.Td && (a.Td = d)
            } else {
                d = Tm(a, b.right);
                Pm(a, function(a) {
                    a.count--;
                    return a.parent
                }, d);
                if (d != b.right) {
                    if (d.parent.left = d.right) d.right.parent = d.parent;
                    d.right = b.right;
                    d.right.parent = d;
                    c = d.parent
                }
                d.parent =
                    b.parent;
                d.left = b.left;
                d.left && (d.left.parent = d);
                b == a.Ud && (a.Ud = d)
            }
            d.count = b.count;
            Ym(b) ? b.parent.left = d : Zm(b) ? b.parent.right = d : a.Z = d;
            Qm(a, c ? c : d)
        } else Pm(a, function(a) {
            a.count--;
            return a.parent
        }, b.parent), Ym(b) ? (a.rz = 1, b.parent.left = null, b == a.Ud && (a.Ud = b.parent), Qm(a, b.parent)) : Zm(b) ? (b.parent.right = null, b == a.Td && (a.Td = b.parent), Qm(a, b.parent)) : a.clear()
    }

    function Tm(a, b) {
        if (!b) return a.Ud;
        var c = b;
        Pm(a, function(a) {
            var b = null;
            a.left && (b = c = a.left);
            return b
        }, b);
        return c
    }

    function Vm(a, b) {
        if (!b) return a.Td;
        var c = b;
        Pm(a, function(a) {
            var b = null;
            a.right && (b = c = a.right);
            return b
        }, b);
        return c
    }

    function Om(a, b) {
        this.value = a;
        this.parent = b ? b : null;
        this.count = 1
    }
    Om.prototype.left = null;
    Om.prototype.right = null;
    Om.prototype.height = 1;

    function Zm(a) {
        return !!a.parent && a.parent.right == a
    }

    function Ym(a) {
        return !!a.parent && a.parent.left == a
    };

    function $m(a, b, c, d) {
        Vh.call(this, a);
        this.Uc = b;
        this.rb = {};
        this.Jb = [];
        this.Ec = null;
        c && (this.Ob = c);
        d && an(this, d)
    }
    y($m, Vh);
    af("collection", $m);
    n = $m.prototype;
    n.Ob = null;
    n.Z = null;
    n.Jm = !1;
    n.Ib = function(a, b) {
        var c = a.l(),
            d = b.l();
        return c < d ? -1 : c > d ? 1 : 0
    };
    n.k = function() {
        this.forEach(this.Tn, this);
        this.Ec = this.Jb = this.rb = null;
        this.Z && (this.Tn(this.Z), this.Z = null);
        $m.c.k.call(this)
    };
    n.jc = function(a) {
        $m.c.jc.call(this, a);
        z(this.Jb, function(b) {
            b.Ca(!0, a)
        })
    };
    n.Tn = function(a) {
        a.ud = ob(a.ud);
        kb(a.ud, this);
        a.ja()
    };
    n.Fa = function() {
        return gf(this.Jb)
    };
    n.valueOf = function() {
        null === this.Ec && (this.Ec = [], bn(this));
        return this.Ec
    };
    n.oe = e("Ob");
    n.Xt = e("Z");
    n.X = function() {
        return this.Z && this.Z.X() || "collection"
    };
    n.Pc = function() {
        return this.Jb.length
    };
    n.gd = function() {
        var a = this.Z;
        return null != a ? Wh(a, "cnt") : 0
    };
    n.Nt = e("Jb");
    n.get = function(a) {
        return this.rb[a]
    };
    n.mm = function(a) {
        return this.Jb[a]
    };
    n.forEach = function(a, b) {
        z(this.Jb, a, b)
    };
    n.uu = e("Jm");
    n.Xu = function() {
        if (!this.Jm) return new G(this);
        var a, b = this.oe();
        a = b.cd ? this.Jb[0].l() : this.Jb[this.Pc() - 1].l();
        a = new vm(b.na & 96, b.Sd, !!b.cd, a);
        return this.r().Ob(this.l(), a, this)
    };

    function an(a, b) {
        var c = 0 === a.Pc() && null === a.Z;
        z(b, function(a) {
            this.ad(a, c)
        }, a);
        if (c) {
            a.sort();
            var d = a.Z || a.W;
            d && a.C().g(d, "add", a.Fn).g(d, "remove", a.Eg).g(d, "change:cnt", a.Bv);
            a.Ob && (d = a.Ob.Sd) && a.Pc() >= d && (a.Jm = !0);
            a.Ca(!0, !1)
        }
    }
    n.add = function(a) {
        this.ad(a);
        return this
    };
    n.remove = function(a) {
        if (a.l() in this.rb) {
            delete this.rb[a.l()];
            if (this.Z === a) this.Z = null;
            else {
                var b = ab(this.Jb, a);
                lb(this.Jb, b);
                this.Ec && lb(this.Ec, b);
                this.Bb && this.dispatchEvent(new Lh("removeItem", this, a, b))
            }
            this.Tn(a)
        }
        return this
    };
    n.sort = function() {
        this.Ib && ($a.sort.call(this.Jb, this.Ib || sb), this.Ec && bn(this));
        return this
    };
    n.ad = function(a, b) {
        var c = a.l();
        if (!(c in this.rb)) {
            this.rb[c] = a.La();
            Uh(a, this);
            var d;
            if (c === this.l() && a instanceof L) this.Z = a;
            else if (b || !this.Ib) d = this.Pc(), this.Jb.push(a), this.Ec && this.Ec.push(a.valueOf());
            else {
                var f, c = this.Jb;
                d = this.Ib || sb;
                for (var g = 0, h = c.length; g < h;) {
                    var k = g + h >> 1,
                        m;
                    m = d(a, c[k]);
                    0 < m ? g = k + 1 : (h = k, f = !m)
                }
                f = f ? g : ~g;
                d = 0 <= f ? f : ~f;
                qb(this.Jb, d, 0, a);
                this.Ec && qb(this.Ec, d, 0, a.valueOf())
            }
            t(d) && this.Bb && this.dispatchEvent(new Lh("addItem", this, a, d))
        }
    };

    function bn(a) {
        var b = a.Jb;
        a = a.Ec;
        var c = b.length,
            d;
        a.$y = c;
        for (d = 0; d < c; ++d) a[d] = b[d].valueOf()
    }
    n.Fn = function(a) {
        a = a.Q();
        cn(this, a, this.Ob ? this.Ob.na : 17) && this.ad(a)
    };
    n.Eg = function(a) {
        a = a.Q();
        cn(this, a, this.Ob ? this.Ob.na : 17) && (a = a.l(), (a = this.l() === a ? this.Z : this.get(a)) && this.remove(a))
    };
    n.Bv = function(a) {
        this.dispatchEvent(a)
    };

    function cn(a, b, c) {
        b = b.l();
        var d = a.l();
        if (!wa(b, d) || !dn(b, d.length, c) || (c = a.Ob.Of) && b < c) return !1;
        c = a.Ob.Sd;
        d = a.Pc();
        if (c && d >= c)
            if (a.Ob.cd) {
                if (a = a.mm(0).l(), b < a) return !1
            } else if (a = a.mm(d - 1).l(), b > a) return !1;
        return !0
    };

    function en(a) {
        Q.call(this);
        this.ca = a || null;
        this.rh = {};
        this.jg = new Mm(fn);
        this.O = 0;
        this.Ca(!0, !1)
    }
    y(en, Q);
    Ue("objectCache", en);
    n = en.prototype;
    n.G = He("vline.data.ObjectCache");

    function fn(a, b) {
        var c = a.bd,
            d = b.bd;
        return c < d ? -1 : c > d ? 1 : 0
    }
    n.Fa = function() {
        return {
            objects: this.O
        }
    };
    n.r = e("ca");
    n.Pc = e("O");
    n.contains = function(a) {
        gn(this, a);
        return a in this.rh
    };
    n.get = function(a) {
        gn(this, a);
        (a = this.rh[a]) && a.La();
        return a
    };
    n.Ig = function(a, b) {
        function c(a) {
            d.push(a);
            return g && d.length >= g
        }
        gn(this, a);
        var d = [],
            f = b.na,
            g = b.Sd,
            h = b.Of;
        h && (h = hn(h));
        96 === (f & 96) ? hi(this, a, c, h, !!b.cd) : 32 === (f & 32) && this.dc(a, c, h, !!b.cd);
        16 === (f & 16) && (f = this.get(a)) && d.push(f);
        f = new $m(this, a, b, d);
        f.Ca(!0, !1);
        return f
    };
    n.put = function(a, b, c) {
        return jn(this, a, b, c)
    };
    n.sd = function(a, b, c) {
        return jn(this, fi(a, c), b)
    };
    n.Ra = function(a, b) {
        var c = Ye(b);
        c.l() || c.$b(fi(a));
        try {
            this.ad(c, "pub")
        } finally {
            Zh(this, c.l())
        }
        return c
    };
    n.forEach = function(a, b, c) {
        return kn(this, a, b, null, null, c)
    };
    n.dc = function(a, b, c, d) {
        return kn(this, b, c, a + "/#", a + "/$", d)
    };

    function hi(a, b, c, d, f) {
        kn(a, c, d, d || b + "/", b + "0", f)
    }

    function Zh(a, b) {
        gn(a, b);
        var c = a.rh[b];
        c && (Nc(a.rh, b), a.jg.remove(c), a.O--, c.bd = null)
    }

    function jn(a, b, c, d) {
        b = b || fi("/tmp");
        var f = a.get(b);
        f ? (a = null != c ? v(c) ? {
            type: c
        } : la(c.Fa) ? c.Fa() : c : {}, a instanceof L ? a.$b(b) : a.path = b, d ? mi(f, a) : f.set(a)) : (f = Ye(c), f.$b(b), "iat" in f.ua || (b = f, c = Te().getTime(), S(b, "iat", Number(c), void 0)), a.ad(f, d ? null : "add"));
        f.na &= -513;
        return f
    }
    n.ad = function(a, b) {
        var c = a.l();
        a.Al(this, b);
        a.bd = hn(c);
        Oc(this.rh, c, a);
        this.jg.add(a);
        this.O++;
        return a
    };

    function gn(a, b) {
        if (!v(b) || !wa(b, "/") || 1 !== b.length && "/" === b.charAt(b.length - 1)) throw a.error("BAD_PARAM", "Invalid path: " + b);
    }

    function hn(a) {
        var b = a.lastIndexOf("/");
        return a.substr(0, b + 1) + "#" + a.substr(b + 1)
    }

    function kn(a, b, c, d, f, g) {
        g ? (c ? (f = c.length, c = c.substr(0, f - 1) + String.fromCharCode(c.charCodeAt(f - 1) - 1)) : c = f, ln(a, b, d, c)) : mn(a, b, c ? c + "!" : d, f)
    }

    function mn(a, b, c, d) {
        var f;
        if (c) {
            if (0 === a.O || Vm(a.jg).value.bd < c) return;
            f = {
                bd: c
            }
        }
        c = b;
        d && (c = function(a) {
            return a.bd >= d ? !0 : b(a)
        });
        Sm(a.jg, c, f)
    }

    function ln(a, b, c, d) {
        var f;
        if (d) {
            if (0 === a.O || Tm(a.jg).value.bd > d) return;
            f = {
                bd: d
            }
        }
        d = b;
        c && (d = function(a) {
            return a.bd <= c ? !0 : b(a)
        });
        Um(a.jg, d, f)
    }

    function ii(a, b) {
        for (var c;;) {
            var d = gi(b);
            if (1 >= d.length) break;
            if (c = a.get(d)) break;
            b = d
        }
        return c || a
    };

    function nn(a) {
        X.call(this, a);
        this.Mq = !1
    }
    y(nn, X);
    df("group", nn, ["$entity"]);
    nn.prototype.Fh = function() {
        var a;
        a = "/group/" + this.j() + "/member";
        return this.r().Ig(a, new vm(34))
    };
    nn.prototype.ay = function() {
        this.Mq || (this.Mq = !0, this.Fh().n(function(a) {
            Rh(a, "addItem", this.En, this);
            a.forEach(this.yr, this)
        }, this))
    };
    nn.prototype.yr = function(a) {
        function b(a) {
            console.log("XXX Maybe Starting media session with " + a.j());
            a.Q().set("_autoAccept", !0);
            a.j() != c.j() && a.j() < c.j() && "online" === a.og() && (a.Oe(), console.log("XXX Started media session with " + a.j()))
        }
        a = R(a, "userId");
        var c = this.r().Ba;
        this.r().qb(a).n(function(a) {
            b(a);
            Rh(a, "change:online", function() {
                console.log("XXXX User came online, try starting mediasession " + a.j());
                b(a)
            })
        }, this)
    };
    nn.prototype.En = function(a) {
        this.yr(a.Q())
    };

    function on(a, b, c, d, f, g) {
        L.call(this, a);
        b && this.nb(b);
        c && this.fo(c);
        d && S(this, "profileUrl", d);
        f && S(this, "thumbnailUrl", f);
        "boolean" == typeof g && S(this, "webrtcEnabled", g)
    }
    y(on, L);
    n = on.prototype;
    n.Nd = function() {
        return R(this, "displayName")
    };
    n.fo = function(a) {
        return S(this, "displayName", a)
    };
    n.pe = function() {
        return R(this, "status")
    };
    n.Ng = function(a) {
        return S(this, "status", a)
    };
    n.tm = function() {
        return R(this, "profileUrl")
    };
    n.kd = function() {
        return R(this, "thumbnailUrl")
    };

    function pn(a, b, c, d) {
        on.call(this, "room", a, b, c, d, !1)
    }
    y(pn, on);
    pn.prototype.nb = function(a) {
        a = fi("/room", a);
        return this.$b(a)
    };
    ff("room", pn, ["id", "displayName", "profileUrl", "thumbnailUrl", "webrtcEnabled"], "id", pn.prototype.nb);

    function qn(a) {
        X.call(this, a);
        this.ve = this.Be = !1;
        this.$e = null;
        this.Za = {
            audio: !0,
            video: !0,
            hd: "auto",
            loopback: void 0
        };
        this.Ky = null
    }
    y(qn, X);
    df("room", qn, ["$entity"]);
    n = qn.prototype;
    n.ix = function() {
        this.zg()
    };
    n.Ej = function() {
        var a = this.Q().Ej();
        return this.r().qb(a)
    };
    n.om = function() {
        return this.Q().om()
    };

    function rn(a) {
        var b = a.r().M();
        a.C().g(b, "change:connectionState", function() {
            "connected" === b.Md() && sn(this)
        })
    }
    n.Fh = function() {
        var a = dl(this.j());
        return this.r().Ig(a, new vm(102))
    };
    n.join = function() {
        this.Tm("Joining room", this.j());
        if (this.ve) return new G(this.$e);
        if (this.Be) return this.h("We have a pending join...return old promise"), this.an;
        rn(this);
        Zg(window, "focus", this.yn, !1, this);
        Zg(window, "beforeunload", this.ix, !1, this);
        this.Hl = !1;
        this.Be = !0;
        return this.an = tn(this, !1).n(function() {
            return this.Fh().n(w(this.cr, this, !1))
        }, this)
    };
    n.cr = function(a, b) {
        this.ve = !0;
        this.Be = !1;
        this.$e = b;
        this.$e.Cb(this);
        this.$e.on("addItem", this.En, this);
        this.$e.on("removeItem", this.lw, this);
        this.Tc && un(this);
        a || (this.Tm("Joined room", this.j()), this.dispatchEvent("join"));
        return b
    };
    n.zg = function() {
        this.Tc || this.A && this.A.stop();
        if (this.Be || this.ve) {
            var a = this.r().Ba.j(),
                a = dl(this.j(), a);
            this.Tc = !1;
            return this.r().zg(a).n(function() {
                this.ve = !1;
                this.dispatchEvent("leave");
                this.$e.ja()
            }, this)
        }
        return Bh("Not joined")
    };

    function sn(a) {
        a.ve || a.Be ? (a.Be = !0, a.an = tn(a, a.Tc).n(function() {
            return this.Fh().n(w(this.cr, this, !0))
        }, a)) : new G({})
    }

    function tn(a, b) {
        var c = {};
        c.mediaOn = b;
        c.webrtcEnabled = lj();
        var d = a.r().Ba.j();
        a.Hl = !!b;
        d = dl(a.j(), d);
        return a.r().join(d, c)
    }
    n.Oe = function(a) {
        if (!this.ve && !this.Be) return this.error(new N("INVALID_STATE"), "You have to join room before starting media"), null;
        var b = sm(this);
        if (this.Tc) return b;
        a && (this.Za = a);
        this.h("MediaOn set true");
        this.Tc = !0;
        tn(this, this.Tc);
        un(this);
        return b
    };

    function un(a) {
        if (a.ve) {
            var b = a.Za,
                c = sm(a);
            c.eo({
                ui: !0,
                uiOutgoingDialog: !1,
                uiIncomingDialog: !1,
                uiLocalVideo: !0,
                notify: !0
            });
            a.uo();
            c.Cc = !0;
            c.h("startRoomMedia", "opt_constraints", b, "started_", c.Cc);
            b && gm(c, b);
            a = c.D;
            c.C().g(a, "add:participantSession", c.Mw, !1, c);
            a.$e.forEach(c.oq, c)
        }
    }
    n.uo = function() {
        return sm(this).uo(this.Za)
    };
    n.Pe = function() {
        this.h("MediaOn set false");
        this.Tc = !1;
        (this.Be || this.ve) && tn(this, this.Tc);
        this.Eq && this.Eq.stop();
        this.Eq = null;
        this.A && "inactive" !== this.A.Nc() && qn.c.Pe.call(this);
        return null
    };
    n.En = ba();
    n.lw = ba();
    n.Zp = function() {
        var a = this.j();
        return window.location.protocol + "//" + window.location.host + "/" + a
    };
    n.yn = function() {
        if (null != this.A) {
            var a = this.A.j();
            (a = Ql(a)) && a.close()
        }
    };

    function vn(a, b, c, d, f, g, h, k, m) {
        on.call(this, "person", a, b, c, d, f);
        h && Cm(this, h);
        k && S(this, "presenceAutoState", k);
        m && S(this, "presenceDesc", m);
        g && S(this, "username", g)
    }
    y(vn, on);
    vn.prototype.nb = function(a) {
        a = fi("/user", a);
        return this.$b(a)
    };
    vn.prototype.vg = function() {
        return Xh(this, "online")
    };
    vn.prototype.og = function() {
        return R(this, "presenceState")
    };

    function Cm(a, b) {
        "online" === b && (b = null, S(a, "presenceAutoState", b));
        S(a, "presenceState", b)
    }
    vn.prototype.sm = function() {
        return R(this, "presenceDesc") || "offline"
    };
    on.prototype.xm = function() {
        return R(this, "username")
    };
    vn.prototype.fo = function(a) {
        return S(this, "displayName", a)
    };
    ff("person", vn, "id displayName profileUrl thumbnailUrl webrtcEnabled username presenceState presenceAutoState".split(" "), "id", vn.prototype.nb);

    function wn(a) {
        Q.call(this);
        this.L = a;
        this.sa = {};
        this.ii = [];
        this.Sm = [];
        this.Jn = [];
        this.bh = null;
        this.Vg = 0;
        this.rl = null;
        this.fh = !1;
        this.Zs = new Od({
            mp3: "audio/mpeg",
            ogg: "audio/ogg"
        });
        this.Mx = 3E4;
        this.Rr = 0;
        this.T = [];
        this.Af = [];
        this.Ca();
        Zg(window, "beforeunload", this.F, !1, this)
    }
    y(wn, Q);
    Ue("mediaController", wn);
    n = wn.prototype;
    n.k = function() {
        z(this.T, function(a) {
            a.stream.F()
        });
        Hc(this.sa, function(a) {
            a.F()
        });
        wn.c.k.call(this)
    };
    n.Dj = e("bh");
    n.mg = e("ii");
    n.Hj = e("Sm");
    n.Lj = e("Jn");
    n.Km = function() {
        return 0 < this.Vg || 0 < this.Sm.length || 0 < this.Jn.length
    };
    n.Lm = function() {
        return 0 < this.Vg
    };
    n.wo = function() {
        z(ob(this.ii), function(a) {
            a.stop()
        })
    };
    n.Sl = function(a, b, c, d, f) {
        this.h("createPeerSession");
        if (d && d.Jj() in this.sa) return null;
        a = this.L.Sl(a, b, c, d, f);
        Rh(a, "peerSession:end", this.sw, this);
        return this.sa[a.j()] = a
    };
    n.sw = function(a) {
        this.h("onPeerSessionEnd");
        a = a.target.j();
        delete this.sa[a]
    };
    n.Cn = function(a) {
        this.h("onMediaSessionEnd");
        a = a.target;
        kb(this.ii, a);
        this.bh === a && (this.bh = null)
    };
    n.Dn = function() {
        this.h("onMediaStateChange");
        xn(this, this.Sm, "incoming");
        xn(this, this.Jn, "outgoing")
    };

    function xn(a, b, c) {
        b.length = 0;
        z(a.ii, function(a) {
            a.Nc() === c && b.push(a)
        })
    }
    n.Ij = function(a) {
        this.h("getLocalStream", "constraints", a);
        var b = this.L.I.get("mediaConstraints"),
            b = Oi(a, b),
            c = fb(this.Af, function(b) {
                return b.dg && a ? Re(b.dg, a) : !1
            }),
            d = fb(this.T, function(b) {
                return b.stream.bi && a ? Re(b.stream.bi, a) : !1
            });
        if (d) return ++d.stream.Hf, c.Ce;
        if (c) return c.Nn = ++c.Nn, c.Ce;
        c = a.video;
        if (a.audio || c) return 0 === this.Vg && yn(this), c = new G, Fj(b, w(this.ox, this, c, a), w(this.nx, this, c, a)), this.Vg++, this.Af.push({
            Ce: c,
            dg: a,
            Nn: 0,
            stream: null
        }), c;
        this.error("BAD_PARAM", "no media requested");
        return Bh("BAD_PARAM")
    };
    n.removeStream = function(a) {
        var b = fb(this.T, function(b) {
                return b.stream === a
            }),
            c = fb(this.Af, function(b) {
                return b.stream === a
            });
        0 === a.Hf ? (b && kb(this.T, b), c && kb(this.Af, c)) : this.error("BUG", "Trying to remove ref counted stream!")
    };
    n.ox = function(a, b, c) {
        this.h("onUserMedia", "mediaStream", c, "constraints", b);
        var d = B ? new zj(c, !0, this, b) : new qj(c, !0, this, b);
        this.T.push({
            stream: d
        });
        zn(this);
        z(this.Af, function(a) {
            if (a.dg && b && Re(a.dg, b)) {
                for (var c = 0; c < a.Nn; c++) ++d.Hf;
                a.stream = d
            }
        });
        a.aa(d)
    };
    n.nx = function(a, b, c) {
        this.h("onUserMediaFailure", c);
        zn(this);
        (c = fb(this.Af, function(a) {
            return a.dg && b ? Re(a.dg, b) : !1
        })) && kb(this.Af, c);
        a.ma(new N("GET_LOCAL_STREAM_FAILED"))
    };

    function zn(a) {
        a.Vg--;
        0 === a.Vg && (An(a), a.dispatchEvent("change"))
    }
    n.bs = ca("Mx");

    function Bn(a, b) {
        var c;
        try {
            c = new Audio
        } catch (d) {
            return a.error("Browser does not support audio"), null
        }
        for (var f = null, g = 0, h = [], k = [], g = 0; g < b.length; g++) {
            var m = b[g].split(".");
            if (m = a.Zs.get(m[m.length - 1], null)) m = c.canPlayType && c.canPlayType(m), "probably" === m ? k.push(b[g]) : "maybe" === m && h.push(b[g])
        }
        c = !1;
        h = mb(k, h);
        k = null;
        for (g = 0; g < h.length; g++) {
            k = h[g];
            try {
                f = new Audio(k);
                c = !0;
                break
            } catch (p) {}
        }
        c ? a.h("selected audio: ", k) : a.error("No playable audio files available");
        return f
    }

    function Cn(a) {
        return v(a) ? a && 0 !== a.length ? [a] : null : ia(a) ? a : null
    }
    n.mo = function(a) {
        if (a = Cn(a))
            if (this.xd && delete this.xd, this.xd = Bn(this, a)) this.xd.preload = "auto", this.xd.loop = "loop"
    };

    function pm(a) {
        a.h("startRinging");
        try {
            0 === a.Rr++ && a.xd && a.xd.play()
        } catch (b) {
            a.error(b, "Error starting ringtone")
        }
    }
    n.ri = function(a) {
        a = a.target.Je;
        if (!a.Ea() && !a.Rc()) {
            this.h("ding");
            try {
                this.Ld && (this.Ld.load(), this.Ld.play())
            } catch (b) {
                this.error(b, "Error playing ding")
            }
        }
    };

    function yn(a) {
        if (Ej(a.L.lf().I, T.Ks))
            if ($i || dj) a.fh = !0, a.L.pb().qo();
            else if (ej) {
            var b = Dn(a.L.lf());
            a.rl = Zc(b.V);
            b.addEventListener("resize", a.rr, !1, a)
        }
    }

    function An(a) {
        Dn(a.L.lf()).removeEventListener("resize", a.rr, !1, a);
        a.fh && (a.fh = !1, a.L.pb().Sj())
    }
    n.rr = function(a) {
        a = Zc(a.target.V);
        this.fh ? Gc(a, this.rl) && An(this) : a.width === this.rl.width && a.height < this.rl.height && (this.fh = !0, this.L.pb().qo())
    };

    function vm(a, b, c, d, f) {
        this.na = a || 17;
        this.cd = void 0;
        null != c && (this.cd = c);
        this.Sd = 1E3;
        null != b && 1E3 > b && (this.Sd = b);
        this.Of = void 0;
        null != d && (this.Of = d);
        this.ki = void 0;
        null != f && (this.ki = f)
    }
    y(vm, nf);
    af("query", vm, ["flags", "seq", "desc", "limit", "start"]);

    function dn(a, b, c) {
        return a.length === b ? 1 === (c & 1) : "/" === a.charAt(b) && (6 === (c & 6) || 2 === (c & 2) && a.lastIndexOf("/") === b) ? !0 : !1
    }
    vm.prototype.ib = function() {
        return new vm(this.na, this.Sd, this.cd, this.Of, this.ki)
    };
    vm.prototype.am = function(a) {
        return a.na === this.na && a.ki === this.ki && a.cd === this.cd && a.Sd === this.Sd && a.Of === this.Of
    };
    vm.prototype.Fa = function() {
        return {
            flags: this.na,
            seq: this.ki,
            desc: this.cd,
            limit: this.Sd,
            start: this.Of
        }
    };
    vm.prototype.Oj = function() {
        return this.na & 7
    };

    function En(a, b, c, d) {
        this.type = a;
        this.path = b;
        this.obj = c;
        this.rid = d || nj(8)
    }
    y(En, nf);
    En.prototype.Oc = e("sid");
    En.prototype.oa = e("appId");
    En.prototype.l = e("path");

    function Fn(a) {
        return a.obj || null
    }
    En.prototype.Ea = function() {
        return hl(this.l())
    };

    function Gn(a, b, c, d) {
        En.call(this, b, c, d);
        this.Uo = a
    }
    y(Gn, En);
    af("Request", Gn);
    Gn.prototype.Xl = null;
    Gn.prototype.Xb = function() {
        return this.Uo || null
    };
    Gn.prototype.Yr = ca("Uo");
    Gn.prototype.Fi = function(a) {
        var b = this.Xb();
        b && b.send(a.X(), a)
    };

    function Hn(a, b, c) {
        b = new In(a.X() + ".resp", a.rid, a.l(), b, c);
        a.Fi(b)
    }

    function In(a, b, c, d, f) {
        En.call(this, a, c, d, b);
        this.err = void 0;
        null != f && (this.err = f)
    }
    y(In, En);
    In.prototype.getError = function() {
        return this.err || null
    };

    function Jn(a, b, c, d, f, g) {
        Gn.call(this, a, "login", b);
        this.appId = c;
        this.authId = d;
        this.token = f;
        this.profile = g
    }
    y(Jn, Gn);
    af("LoginReq", Jn);
    Jn.prototype.oa = e("appId");
    Jn.prototype.tc = e("authId");
    Jn.prototype.bb = e("token");
    Jn.prototype.Hh = e("profile");

    function Kn(a, b, c) {
        Gn.call(this, a, "get", b);
        this.query = c
    }
    y(Kn, Gn);
    af("GetReq", Kn);
    Kn.prototype.oe = e("query");

    function Ln(a, b, c, d) {
        b = new Mn(a.rid, a.l(), a.oe(), b, c, d);
        a.Fi(b)
    }

    function Mn(a, b, c, d, f, g) {
        In.call(this, "get.resp", a, b, d, g);
        f && (this.res = f);
        c && (this.query = c)
    }
    y(Mn, In);
    af("get_response", Mn);
    In.prototype.oe = function() {
        return this.query || null
    };

    function Nn(a, b, c, d) {
        ki.call(this, new L("session"), a.M());
        this.L = a;
        this.gh = b;
        this.Fc = c;
        this.Jr = d;
        this.ob = a.M();
        this.W = new en(this);
        this.zb = nj();
        this.Ba = null;
        this.Wn = {};
        this.Cg = null;
        this.Ub = 0;
        this.di = null;
        this.addEventListener("add:im", this.ri, !1, this);
        this.pa("get.resp", this.Nv);
        this.pa("put.resp", this.gr);
        this.pa("post.resp", this.gr);
        this.pa("publish.resp", this.zf);
        this.pa("delete.resp", this.zf);
        this.pa("login.resp", this.zf);
        this.pa("logout.resp", this.zf);
        this.pa("join.resp", this.zf);
        this.pa("leave.resp",
            this.zf);
        this.pa("put", this.kr);
        this.pa("post", this.kr);
        this.pa("publish", this.Dw);
        this.pa("delete", this.Ew);
        this.pa("login.err.resp", this.ew)
    }
    y(Nn, ki);
    Ue("session", Nn);
    n = Nn.prototype;
    n.sk = !1;
    n.toString = function() {
        return this.Qa() + "#" + this.j()
    };
    n.k = function() {
        this.ic();
        this.Ba && (this.Ba.ja(), this.Ba = null);
        this.Cg && (this.Cg.ja(), this.Cg = null);
        this.Jr = this.Fc = null;
        delete this.ob;
        delete this.W;
        Nn.c.k.call(this)
    };
    n.ia = e("L");
    n.M = e("ob");
    n.j = e("zb");
    n.Qa = function() {
        return this.Ba ? this.Ba.j() : ""
    };
    n.yh = function() {
        return this.Pa().yh() || ""
    };
    n.Ih = function() {
        return this.Pa().Ih()
    };
    n.Pa = function() {
        return this.gh.Pa()
    };
    n.Pt = e("Ba");
    n.Yk = function(a, b) {
        this.Ba.Yk(a, b);
        return this
    };
    n.Ng = function(a) {
        this.Ba.Ng(a);
        return this
    };
    n.qb = function(a) {
        var b = Le(this.gh.tc(), a);
        if (!Me(b)) return Bh(new N("BAD_PARAM", "Invalid personId: " + a));
        a = fi("/user", b);
        return this.get(a, "person").n(function(a) {
            a = a.Ia;
            a.Cb(this);
            return a
        }, this)
    };

    function On(a, b) {
        var c = a.M().oa(),
            c = Le(c, b);
        if (!Me(c)) return Bh(new N("BAD_PARAM", "Invalid groupId: " + b));
        c = fi("/group", c);
        return a.get(c, "group").n(function(a) {
            a = a.Ia;
            a.Cb(this);
            return a
        }, a)
    }
    n.Vp = function(a) {
        var b = this.M().oa(),
            b = Le(b, a);
        if (!Me(b)) return Bh(new N("BAD_PARAM", "Invalid roomId: " + a));
        a = fi("/room", b);
        return this.get(a, "room").n(function(a) {
            a = a.Ia;
            a.Cb(this);
            return a
        }, this)
    };
    n.postMessage = function(a, b, c) {
        this.h("postMessage", "channelId", a, "message", b, "type", c);
        return this.qb(a).n(function(a) {
            var f = a.postMessage(b, c);
            a.ja();
            return f
        }, this)
    };
    n.Ik = function(a, b, c) {
        this.h("publishMessage", "channelId", a, "message", b, "type", c);
        return this.qb(a).n(function(a) {
            var f = a.Ik(b, c);
            a.ja();
            return f
        }, this)
    };
    n.Oe = function(a, b) {
        this.h("startMedia", "channelId", a, "constraints", b);
        return this.qb(a).n(function(a) {
            var d = a.Oe(b);
            a.ja();
            return d
        }, this)
    };
    n.Pe = function(a) {
        this.h("stopMedia", "channelId", a);
        return this.qb(a).n(function(a) {
            var c = a.A;
            c && c.stop();
            a.ja()
        }, this)
    };
    n.Mt = function() {
        var a = this.M().oa();
        return this.Ig(bl(a), new vm(34))
    };
    n.ic = function() {
        if (!this.sk) {
            this.sk = !0;
            this.di = null;
            this.gh && this.gh.ic();
            this.sk = !0;
            this.H.remove();
            var a = this.ob,
                b = this.Qa();
            b in a.Gi && (a.Wk--, delete a.Gi[b], kb(a.ae, this), Pn(a), a.Wh() || a.dispatchEvent("logout"));
            this.dispatchEvent("logout");
            this.dispatchEvent("remove:session");
            a = this.Ba.l();
            a = new Gn(this.Fc, "logout", a);
            return Qn(this, a, this).n(this.F, this)
        }
        return new G(this)
    };

    function Rn(a, b) {
        a.h("login", "credentials", b);
        if (null != a.di) return a.di;
        var c = b.Hh(),
            d = new vn(b.Ug, c.displayName, c.profileUrl, c.thumbnailUrl, lj(), c.username);
        a.Ba = d.Ia;
        var f = c.presenceDesc;
        f && S(d, "presenceDesc", f);
        (c = c.presenceState) && a.Yk(c);
        c = new Jn(a.Fc, d.l(), a.L.oa(), a.gh.tc(), b.mn, d.Fa());
        a.W.put(d.l(), d);
        Sn(a.ob, a);
        a.dispatchEvent("add:session");
        d = Qn(a, c, a).Mb(function() {
            this.ic()
        }, a);
        a.di = zh(d, Tn(a)).n(gc(a));
        a.W.put(fi("/local/session", a.zb), a.H);
        a.Ca(!1);
        sh(function() {
            this.Ca(!0)
        }, a);
        a.dispatchEvent("login");
        return a.di
    }
    n.get = function(a, b) {
        this.h("get", "path", a, "type", b);
        var c = this.W.get(a);
        return c ? new G(c.La()) : this.Ob(a, new vm).n(function(c) {
            !c && b && (c = this.W.put(a, b));
            return c && c.La()
        }, this)
    };
    n.ot = function() {
        return this.sd("/room", "room").n(function(a) {
            a = a.Ia;
            a.La();
            a.Cb(this);
            return a
        }, this)
    };
    n.Ig = function(a, b) {
        this.h("query", "path", a, "query", b);
        return this.Ob(a, b, new $m(this.W, a, b))
    };
    n.put = function(a, b) {
        this.h("put", "path", a, "val", b);
        var c = !(a && this.W.contains(a)),
            d = this.W.put(a, b),
            f = null;
        if (c) f = d.Fa();
        else if (d.Ya && !Mc(d.Ya)) {
            var c = {},
                g;
            for (g in d.Ya) 3 !== d.Ya[g] && (f = d.get(g), c[g] = null != f ? f : null);
            f = c
        }
        if (f) {
            for (var h in d.Ya) d.Ya[h] = 3;
            d.La();
            return this.he("put", d, d.l(), f)
        }
        return new G(d)
    };
    n.sd = function(a, b, c) {
        this.h("post", "path", a, "val", b);
        var d = Ye(b).La();
        c && d.$b(fi(a, c));
        a = d.l() || a;
        return this.he("post", d, a, d.Fa()).n(function(a) {
            mi(d, a);
            d.vb();
            return this.W.put(d.l(), d)
        }, this)
    };
    n.Ra = function(a, b, c) {
        this.h("publish", "path", a, "val", b);
        b = Ye(b);
        b.l() || b.$b(fi(a, c));
        return this.he("publish", b, b.l(), b.Fa())
    };
    n.Ex = function(a, b, c, d, f) {
        return this.Ra(fl(a, c, b), d, f)
    };
    n.call = function(a, b) {
        return this.Ra("/service", b, a)
    };

    function Un(a, b) {
        var c = a.Ra("/service", b, "authorize");
        c.n(function(a) {
            a = Lm(a);
            a = new Vn(a);
            this.ob.dispatchEvent(a)
        }, a);
        return c
    }
    n.join = function(a, b) {
        var c = new Gn(this.Fc, "join", a, b);
        return Qn(this, c, this)
    };
    n.zg = function(a) {
        a = new Gn(this.Fc, "leave", a, {});
        return Qn(this, a, this)
    };
    n.Ru = function(a) {
        var b = {};
        b.groupId = a;
        a = this.Ra("/service", b, "joinGroup");
        a.n(function(a) {
            a = a.valueOf();
            this.ad(a, !0);
            return On(this, a.path.substr(a.path.lastIndexOf("/") + 1))
        }, this);
        return a
    };

    function Wn(a, b) {
        var c = bl(a.L.oa()),
            c = a.sd(c, b);
        c.n(function(a) {
            a = Lm(a.valueOf());
            var b = this.M();
            b.h("loginWithCredentials", "credentials", a);
            b = new Xn(b.L, a.tc(), !0);
            Yn(b, a);
            return Rn(b.r(), a)
        }, a);
        return c
    }
    n.remove = function(a) {
        this.h("remove", "path", a);
        var b = this.W.get(a);
        b && b.Eg();
        return this.he("delete", a, a)
    };
    n.Ob = function(a, b, c) {
        return Qn(this, new Kn(this.Fc, a, b), c)
    };
    n.he = function(a, b, c, d) {
        a = new Gn(this.Fc, a, c, d);
        return Qn(this, a, b)
    };

    function Qn(a, b, c) {
        var d = new G;
        a.Wn[b.rid] = {
            Ce: d,
            pl: c
        };
        a.Vc(b);
        return d
    }
    n.Vc = function(a) {
        if (!hl(a.l())) {
            a.sid = this.zb;
            var b = this.L.oa();
            a.appId = b;
            this.h("send", a);
            this.Jr.send(a.X(), a)
        }
    };
    n.ad = function(a, b) {
        return this.W.put(Xe(a), a, b)
    };
    n.Nv = function(a) {
        var b = Zn(this, a),
            c = a.getError();
        if (c) b.Ce.ma(c);
        else {
            var d = Fn(a),
                c = b.pl,
                f = [],
                g;
            z(a.res || null, function(a) {
                f.push(this.ad(a, !0))
            }, this);
            if (d) {
                g = this.ad(d, !0);
                if (a = a.oe()) g.na |= a.na;
                f.push(g)
            }
            c ? (an(c, f), c.Ca(!0, !1), b.Ce.aa(c)) : b.Ce.aa(g || null)
        }
    };
    n.gr = function(a) {
        var b = a.l();
        if (b = this.W.get(b)) {
            var c = Fn(a);
            a.getError() || c && mi(b, c);
            b.vb();
            var c = !1,
                d;
            for (d in b.Ya) 3 === b.Ya[d] ? delete b.Ya[d] : c = !0;
            c && li(b)
        }
        this.zf(a)
    };
    n.zf = function(a) {
        var b = Zn(this, a),
            c = a.getError();
        c ? ("AUTH_FAILED" === c.X() && this.ic(), b.Ce.ma(c)) : (a = Fn(a) || b.pl, b.pl instanceof U && (a = b.pl), b.Ce.aa(a))
    };
    n.kr = function(a) {
        this.h("recv", a);
        var b = a.l(),
            c = Fn(a);
        (b = this.W.get(b)) ? mi(b, c): this.W.put(a.l(), Fn(a))
    };
    n.Dw = function(a) {
        this.h("recv", a);
        this.W.Ra(a.l(), Fn(a))
    };
    n.Ew = function(a) {
        this.h("recv", a);
        (a = this.W.get(a.l())) && a.Eg()
    };
    n.ew = function(a) {
        this.h("recv", a);
        this.ic()
    };
    n.pa = function(a, b) {
        var c = w(b, this);
        this.Fc.Vk[a] = {
            aa: c,
            un: !0
        }
    };

    function Zn(a, b) {
        a.h("recv", b);
        var c = b.rid,
            d = a.Wn[c];
        delete a.Wn[c];
        return d
    }

    function $n(a) {
        var b = a.Qa();
        return a.Ig("/user/" + b + "/msg", new vm(34))
    }

    function ao(a, b, c) {
        return a.get(bl(b, c))
    }

    function Tn(a) {
        return $n(a).n(ca("Cg"), a)
    }
    n.Eh = function(a, b, c) {
        var d = al(this.Qa(), a);
        if (this.Cg) {
            var f = xm(this, a);
            !f && b && (b = {
                type: "mailbox"
            }, b.iss = a, b.totalMessages = c, f = this.W.put(d, b));
            return f
        }
        return null
    };

    function xm(a, b) {
        var c = al(a.Qa(), b);
        return a.Cg.get(c) || a.W.get(c)
    }
    n.ri = function(a) {
        a.target.Je.ri(a.target)
    };

    function rm(a, b) {
        var c = a.Ub;
        a.Ub = t(b) ? a.Ub + b : a.Ub + 1;
        c !== a.Ub && Nh(a, "totalUnreadCount", c, a.Ub)
    }
    n.mf = e("Ub");

    function bo(a, b, c) {
        Jm.call(this, a, b, c);
        this.Ji = this.bl = this.Bf = this.Gg = this.Xh = null;
        b ? (b = a.split("."), this.Xh = a, this.Gg = null, this.Bf = b[1], this.bl = null, 2 < b.length && (this.Ji = b[2])) : (this.Xh = null, this.Gg = a, this.Ji = this.bl = this.Bf = null)
    }
    y(bo, Jm);
    Ue("JWS", bo);

    function co(a) {
        !a.Gg && a.Bf && (a.Gg = Je(a.Bf));
        return a.Gg
    }

    function eo(a) {
        if (!a.Xh) {
            a.rf || (a.rf = Ie(a.sf));
            var b = a.rf + ".";
            a.Bf || (a.Bf = Ie(a.Gg));
            b = b + a.Bf + ".";
            if (!a.Ji) {
                var c;
                if (a.bl) {
                    c = a.bl.Ty();
                    var d = "",
                        f, g = 0,
                        h = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
                        k = 0,
                        m = Df(c),
                        h = h.substr(0, 62) + "-_";
                    for (f = 0; 6 * d.length < m;) d += h.charAt((k ^ c[f] >>> g) >>> 26), 6 > g ? (k = c[f] << 6 - g, g += 26, f++) : (k <<= 6, g -= 6);
                    c = d
                } else c = "";
                a.Ji = c
            }
            a.Xh = b + a.Ji
        }
        return a.Xh
    };

    function fo(a, b) {
        Q.call(this, a.M());
        this.L = a;
        this.Zf = a.oa();
        this.Ye = b;
        this.Tl = this.ca = null;
        this.Ca()
    }
    y(fo, Q);
    Ue("authProvider", fo);
    n = fo.prototype;
    n.r = e("ca");

    function go(a, b, c) {
        var d = co(new bo(c, !0)),
            d = d && d.sub;
        if (null == d) throw a.error(new N("BAD_PARAM", "Required property 'sub' not found in token"));
        Yn(a, new Km(a.Zf, a.Ye, d, c, b))
    }
    n.ic = function() {
        this.h("logout");
        this.Tl = this.ca = null
    };
    n.tc = e("Ye");
    n.oa = e("Zf");
    n.Pa = e("Tl");

    function Yn(a, b) {
        a.Tl = b;
        a.ca = ho(a.L, a);
        b.Rn = a;
        a.dispatchEvent("ready:credentials")
    };

    function Z(a) {
        Q.call(this);
        this.L = a;
        this.Rf = a.Rf || (a.Rf = io(a));
        var b = this.jb = jl(a);
        b.ob = this;
        b.Cb(this);
        this.addEventListener("add:im", b.ri, !1, b);
        if (!(b = a.fb)) {
            var b = "vline_" + a.oa(),
                c = new jo;
            (c = c.Wm() ? b ? new ko(c, b) : c : null) || (b = new lo(b || "UserDataSharedStore"), c = b.Wm() ? b : null);
            b = c;
            b = a.fb = b ? new Im(b) : null
        }
        this.fb = b;
        this.Eo = (a.zk || (a.zk = new en)).put("/local/transport", "transport").La();
        Uh(this.Eo, this);
        this.Ca(!0);
        this.Gi = {};
        this.ae = [];
        this.Wk = 0;
        this.qq = !1;
        this.L.I.get("autoConnect") && this.cg()
    }
    y(Z, Q);
    Ue("client", Z);
    n = Z.prototype;
    n.oa = function() {
        return this.L.oa()
    };
    n.ia = e("L");
    n.lf = function() {
        return this.ia().lf()
    };
    n.vm = function() {
        return ob(this.ae)
    };
    n.Mj = function() {
        return this.L.Mj()
    };
    n.jf = function() {
        if (0 != this.ae.length) {
            var a = mo(this);
            return a ? a : this.ae[0]
        }
        return this.L.Mj()
    };
    n.ak = function() {
        return !mo(this)
    };

    function mo(a) {
        return fb(a.ae, function(a) {
            return "anon" !== Ne(a.Ba.j())
        })
    }
    n.Md = function() {
        return this.Eo.Md()
    };
    n.mg = function() {
        return this.jb.mg()
    };
    n.Hj = function() {
        return this.jb.Hj()
    };
    n.Lj = function() {
        return this.jb.Lj()
    };
    n.Dj = function() {
        return this.jb.Dj()
    };
    n.mf = function() {
        var a = 0;
        Hc(this.ae, function(b) {
            a += b.mf()
        });
        return a
    };
    n.tu = function() {
        return !!this.mg().length
    };
    n.su = function() {
        return !!this.Hj().length
    };
    n.vu = function() {
        return !!this.Lj().length
    };
    n.Km = function() {
        return this.jb.Km()
    };
    n.Lm = function() {
        return this.jb.Lm()
    };
    n.qu = function() {
        return !!this.Dj()
    };
    n.pb = function() {
        return this.L.pb()
    };
    n.wo = function() {
        this.jb.wo();
        return this
    };

    function no(a, b) {
        a.h("getCredentials", "authId", b);
        var c = new G,
            d = new Xn(a.L, b, !0),
            f = d.Pa();
        f ? c.aa(f) : Th(Th(d, "ready:credentials", function() {
            c.aa(d.Pa())
        }, a), "error", function(a) {
            c.ma(a.getError())
        });
        d.xf();
        a.Ca();
        return c
    }
    n.xf = function(a, b, c) {
        this.h("login", "authId", a, "profile", b, "token", c);
        a && "anon" !== a || (a = "anon", c = oo(this) || nj(), c = eo(new bo({
            iss: "anon",
            sub: "anon:" + c,
            exp: parseInt((new Date).getTime() / 1E3 + 864E6, 10)
        }, !1)), b || (b = {
            displayName: "Remote User"
        }));
        var d = new Xn(this.L, a, !0);
        return c ? (go(d, b || null, c), Rn(d.r(), d.Pa())) : no(this, a).n(function(a) {
            return Rn(a.Rn.r(), a)
        })
    };
    n.ic = function() {
        this.h("logout");
        var a = this.ae;
        this.ae = [];
        this.Gi = {};
        this.Wk = 0;
        Pn(this);
        var b = [];
        z(a, function(a) {
            b.push(a.ic())
        });
        return zh.apply(null, b)
    };
    n.Wh = function() {
        return !!this.Wk
    };
    n.uf = function() {
        return this.Eo.uf()
    };
    n.cg = function() {
        this.h("connect");
        this.Rf.send("connect", {});
        return this
    };
    n.disconnect = function() {
        this.h("disconnect");
        this.Rf.send("disconnect", {});
        return this
    };
    n.Qx = function(a) {
        this.jb.bs(a)
    };
    n.mo = function(a) {
        this.jb.mo(a);
        return this
    };
    n.Sx = function(a) {
        var b = this.jb;
        if (a = Cn(a)) b.Ld && delete b.Ld, b.Ld = Bn(b, a), b.Ld && (b.Ld.preload = "auto")
    };

    function Sn(a, b) {
        a.Wk++;
        a.Gi[b.Qa()] = b;
        a.ae.push(b);
        Pn(a)
    }

    function po(a) {
        a.h("loadCredentials");
        var b = qo(a);
        b && b.length && (a.h("credentials", b), z(b, function(a) {
            try {
                var b = Lm(a)
            } catch (f) {
                this.error(f, "Error deserializing credentials");
                return
            }
            a = new Xn(this.L, b.tc(), !0);
            Yn(a, b);
            Rn(a.r(), b)
        }, a), a.Ca())
    }

    function qo(a) {
        if (!a.fb) return null;
        a.h("loadCredentials");
        var b = null;
        try {
            b = a.fb.get("credentials")
        } catch (c) {
            a.error(c, "Error getting saved credentials")
        }
        return b
    }

    function oo(a) {
        a = qo(a);
        var b = null;
        a && a.length && fb(a, function(a) {
            try {
                var d;
                d = Lm(a).Ug;
                return "anon" == Ne(d) ? (b = Ke(d), !0) : !1
            } catch (f) {
                return this.error(f, "Error deserializing credentials"), !1
            }
        });
        return b
    }

    function Pn(a) {
        if (a.fb) try {
            var b = [];
            Hc(a.Gi, function(a) {
                b.push({
                    type: "credentials",
                    appId: a.Pa().oa(),
                    authId: a.Pa().tc(),
                    username: a.Pa().Ug,
                    userToken: a.Pa().mn,
                    oauthToken: a.Pa().yh(),
                    appUrl: a.Pa().$o,
                    providerUrl: a.Pa().Ih(),
                    email: a.Pa().Zl
                })
            });
            a.h("saveSessions", b);
            a.fb.set("credentials", b)
        } catch (c) {
            a.error(c, "Error saving credentials")
        }
    }
    n.Ij = function(a) {
        a || (a = {
            audio: !0,
            video: !0,
            hd: !1,
            loopback: void 0
        });
        var b = Wj();
        (b = Ri(b)) && (a.video = b.video);
        a = jl(this.ia()).Ij(a);
        a.n(w(this.Bn, this)).Mb(w(this.An, this));
        return a
    };
    n.An = function() {
        var a = new N("GET_LOCAL_STREAM_FAILED");
        this.error(a);
        return a
    };
    n.Bn = function(a) {
        this.h("onLocalStream_", a);
        var b = new Fh("client:addLocalStream", this, a);
        b.type = "client:addLocalStream";
        this.dispatchEvent(b);
        return a
    };

    function Vn(a, b) {
        P.call(this, "recv:credentials", b);
        this.credentials = a
    }
    y(Vn, P);
    Vn.prototype.Pa = e("credentials");

    function ro() {}
    y(ro, Em);
    ro.prototype.gd = function() {
        var a = 0;
        Md(this.Fd(!0), function() {
            a++
        });
        return a
    };
    ro.prototype.clear = function() {
        var a = Nd(this.Fd(!0)),
            b = this;
        z(a, function(a) {
            b.remove(a)
        })
    };

    function so(a) {
        this.fb = a
    }
    y(so, ro);
    n = so.prototype;
    n.Wm = function() {
        if (!this.fb) return !1;
        try {
            return this.fb.setItem("__sak", "1"), this.fb.removeItem("__sak"), !0
        } catch (a) {
            return !1
        }
    };
    n.set = function(a, b) {
        try {
            this.fb.setItem(a, b)
        } catch (c) {
            if (0 == this.fb.length) throw "Storage mechanism: Storage disabled";
            throw "Storage mechanism: Quota exceeded";
        }
    };
    n.get = function(a) {
        a = this.fb.getItem(a);
        if (!v(a) && null !== a) throw "Storage mechanism: Invalid value was encountered";
        return a
    };
    n.remove = function(a) {
        this.fb.removeItem(a)
    };
    n.gd = function() {
        return this.fb.length
    };
    n.Fd = function(a) {
        var b = 0,
            c = this.fb,
            d = new Kd;
        d.next = function() {
            if (b >= c.length) throw Jd;
            var d = c.key(b++);
            if (a) return d;
            d = c.getItem(d);
            if (!v(d)) throw "Storage mechanism: Invalid value was encountered";
            return d
        };
        return d
    };
    n.clear = function() {
        this.fb.clear()
    };
    n.key = function(a) {
        return this.fb.key(a)
    };

    function jo() {
        var a = null;
        try {
            a = window.localStorage || null
        } catch (b) {}
        this.fb = a
    }
    y(jo, so);

    function lo(a, b) {
        if (A && !Qb(9)) {
            to || (to = new Od);
            this.Tb = to.get(a);
            this.Tb || (b ? this.Tb = document.getElementById(b) : (this.Tb = document.createElement("userdata"), this.Tb.addBehavior("#default#userData"), document.body.appendChild(this.Tb)), to.set(a, this.Tb));
            this.zo = a;
            try {
                this.Tb.load(this.zo)
            } catch (c) {
                this.Tb = null
            }
        }
    }
    y(lo, ro);
    var uo = {
            ".": ".2E",
            "!": ".21",
            "~": ".7E",
            "*": ".2A",
            "'": ".27",
            "(": ".28",
            ")": ".29",
            "%": "."
        },
        to = null;
    n = lo.prototype;
    n.Tb = null;
    n.zo = null;

    function vo(a) {
        return "_" + encodeURIComponent(a).replace(/[.!~*'()%]/g, function(a) {
            return uo[a]
        })
    }
    n.Wm = function() {
        return !!this.Tb
    };
    n.set = function(a, b) {
        this.Tb.setAttribute(vo(a), b);
        wo(this)
    };
    n.get = function(a) {
        a = this.Tb.getAttribute(vo(a));
        if (!v(a) && null !== a) throw "Storage mechanism: Invalid value was encountered";
        return a
    };
    n.remove = function(a) {
        this.Tb.removeAttribute(vo(a));
        wo(this)
    };
    n.gd = function() {
        return this.Gh().attributes.length
    };
    n.Fd = function(a) {
        var b = 0,
            c = this.Gh().attributes,
            d = new Kd;
        d.next = function() {
            if (b >= c.length) throw Jd;
            var d = c[b++];
            if (a) return decodeURIComponent(d.nodeName.replace(/\./g, "%")).substr(1);
            d = d.nodeValue;
            if (!v(d)) throw "Storage mechanism: Invalid value was encountered";
            return d
        };
        return d
    };
    n.clear = function() {
        for (var a = this.Gh(), b = a.attributes.length; 0 < b; b--) a.removeAttribute(a.attributes[b - 1].nodeName);
        wo(this)
    };

    function wo(a) {
        try {
            a.Tb.save(a.zo)
        } catch (b) {
            throw "Storage mechanism: Quota exceeded";
        }
    }
    n.Gh = function() {
        return this.Tb.XMLDocument.documentElement
    };

    function ko(a, b) {
        this.Dg = a;
        this.zc = b + "::"
    }
    y(ko, ro);
    n = ko.prototype;
    n.Dg = null;
    n.zc = "";
    n.set = function(a, b) {
        this.Dg.set(this.zc + a, b)
    };
    n.get = function(a) {
        return this.Dg.get(this.zc + a)
    };
    n.remove = function(a) {
        this.Dg.remove(this.zc + a)
    };
    n.Fd = function(a) {
        var b = this.Dg.Fd(!0),
            c = this,
            d = new Kd;
        d.next = function() {
            for (var d = b.next(); d.substr(0, c.zc.length) != c.zc;) d = b.next();
            return a ? d.substr(c.zc.length) : c.Dg.get(d)
        };
        return d
    };

    function xo(a, b) {
        Kg.call(this, "navigate");
        this.Re = a;
        this.Iu = b
    }
    y(xo, Kg);

    function yo(a, b) {
        O.call(this);
        this.V = a || window;
        this.kl = b || null;
        Zg(this.V, "popstate", this.qi, !1, this);
        Zg(this.V, "hashchange", this.qi, !1, this)
    }
    y(yo, O);

    function zo() {
        var a = window;
        return !(!a.history || !a.history.pushState)
    }
    n = yo.prototype;
    n.xa = !1;
    n.Wi = !0;
    n.Fg = "/";
    n.Ga = function(a) {
        a != this.xa && (this.xa = a) && this.dispatchEvent(new xo(this.bb(), !1))
    };
    n.bb = function() {
        if (this.Wi) {
            var a = this.V.location.href,
                b = a.indexOf("#");
            return 0 > b ? "" : a.substring(b + 1)
        }
        return this.kl ? this.kl.mz(this.Fg, this.V.location) : this.V.location.pathname.substr(this.Fg.length)
    };
    n.es = function(a, b) {
        a != this.bb() && (this.V.history.pushState(null, b || this.V.document.title || "", Ao(this, a)), this.dispatchEvent(new xo(a, !1)))
    };
    n.Vn = function(a, b) {
        this.V.history.replaceState(null, b || this.V.document.title || "", Ao(this, a));
        this.dispatchEvent(new xo(a, !1))
    };
    n.k = function() {
        eh(this.V, "popstate", this.qi, !1, this);
        this.Wi && eh(this.V, "hashchange", this.qi, !1, this)
    };
    n.ng = e("Fg");

    function Ao(a, b) {
        return a.Wi ? "#" + b : a.kl ? a.kl.Hy(b, a.Fg, a.V.location) : a.Fg + b + a.V.location.search
    }
    n.qi = function() {
        this.xa && this.dispatchEvent(new xo(this.bb(), !0))
    };

    function Xn(a, b, c) {
        fo.call(this, a, b);
        if (this.Yj = "undefined" === typeof c ? !0 : c)
            if (b = Bo(this), b.Ic("authToken")) {
                a = b.get("authToken");
                b.remove("authToken");
                b = b.toString();
                try {
                    var d = Je(a, !1),
                        f = $b(d),
                        g = Lm(f);
                    this.Ye = g.tc();
                    Yn(this, g)
                } catch (h) {
                    this.error(h, "Unable to parse auth credentials")
                }
                d = window.location.pathname;
                b && (d = d + "?" + b);
                zo() && window.history.replaceState(null, "", d)
            }
    }
    y(Xn, fo);
    Ue("queryParamProvider", Xn);
    Xn.prototype.xf = function() {
        if (this.tc() === this.oa()) {
            var a = new G;
            a.n(function(a) {
                "managed" === a ? (Th(this.L.M(), "recv:credentials", function(a) {
                    (a = a.Pa()) ? Yn(this, a): this.dispatchEvent(new Ih(new N("cancel")))
                }, this), this.L.pb().Xc(new Kg(Co))) : this.Yj && !Bo(this).Ic("authToken") && (window.location.href = Cj(this.L.I) + "/v1/auth/" + this.Zf + "/" + this.Ye)
            }, this).Mb(function(a) {
                this.dispatchEvent(new Ih(a))
            }, this);
            this.L.M().Mj().call("getAuthType", {}).n(function(b) {
                (b = b.authType) ? a.aa(b): a.ma("NOT_FOUND")
            }).Mb(function() {
                a.ma(new N("AUTH_FAILED",
                    "AUTH_FAILED" in M ? M.AUTH_FAILED(void 0) : "AUTH_FAILED"))
            }, this)
        } else this.Yj && !Bo(this).Ic("authToken") && (window.location.href = Cj(this.L.I) + "/v1/auth/" + this.Zf + "/" + this.Ye)
    };

    function Bo(a) {
        a = a.Yj ? window.location.search : "";
        wa(a, "?") && (a = a.slice(1));
        return new wi(a)
    };

    function Do(a, b) {
        a && F(a, b, void 0)
    };

    function Eo() {
        yg.call(this);
        this.Vk = {}
    }
    y(Eo, yg);
    Eo.prototype.ln = ne("goog.messaging.AbstractChannel");
    Eo.prototype.cg = function(a) {
        a && a()
    };
    Eo.prototype.uf = l(!0);

    function Fo(a, b, c) {
        var d;
        d = a.Vk[b];
        d || (a.zp ? d = {
            aa: sa(a.zp, b),
            un: ma(c)
        } : ((d = a.ln) && d.log(ce, 'Unknown service name "' + b + '"', void 0), d = null));
        if (d) {
            var f;
            a: {
                var g = d.un;
                if (g && v(c)) try {
                    f = $b(c);
                    break a
                } catch (h) {
                    (a = a.ln) && a.log(ce, "Expected JSON payload for " + b + ', was "' + c + '"', void 0);
                    f = null;
                    break a
                } else if (!g && !v(c)) {
                    f = ac(c);
                    break a
                }
                f = c
            }
            null != f && d.aa(f)
        }
    }
    Eo.prototype.k = function() {
        Eo.c.k.call(this);
        delete this.ln;
        delete this.Vk;
        delete this.zp
    };

    function Go() {
        Eo.call(this)
    }
    y(Go, Eo);
    Go.prototype.G = null;
    Ue("MessageChannel", Go);
    Go.prototype.send = function(a, b) {
        Fo(this, a, b)
    };

    function Ho(a, b) {
        this.jy = new qi(a);
        this.gt = b ? b : "callback";
        this.Pf = 5E3
    }
    var Io = 0;
    Ho.prototype.send = function(a, b, c, d) {
        a = a || null;
        d = d || "_" + (Io++).toString(36) + ta().toString(36);
        q._callbacks_ || (q._callbacks_ = {});
        var f = this.jy.ib();
        if (a)
            for (var g in a) a.hasOwnProperty && !a.hasOwnProperty(g) || Fi(f, g, a[g]);
        b && (q._callbacks_[d] = Jo(d, b), Fi(f, this.gt, "_callbacks_." + d));
        b = zd(f.toString(), {
            timeout: this.Pf,
            jt: !0
        });
        b.zl(Ko(d, a, c));
        return {
            zb: d,
            Xl: b
        }
    };
    Ho.prototype.cancel = function(a) {
        a && (a.Xl && a.Xl.cancel(), a.zb && Lo(a.zb, !1))
    };

    function Ko(a, b, c) {
        return function() {
            Lo(a, !1);
            c && c(b)
        }
    }

    function Jo(a, b) {
        return function(c) {
            Lo(a, !0);
            b.apply(void 0, arguments)
        }
    }

    function Lo(a, b) {
        q._callbacks_[a] && (b ? delete q._callbacks_[a] : q._callbacks_[a] = fa)
    };

    function Mo() {}
    Mo.prototype.dp = null;

    function No(a) {
        var b;
        (b = a.dp) || (b = {}, Oo(a) && (b[0] = !0, b[1] = !0), b = a.dp = b);
        return b
    };
    var Po;

    function Qo() {}
    y(Qo, Mo);

    function Ro(a) {
        return (a = Oo(a)) ? new ActiveXObject(a) : new XMLHttpRequest
    }

    function Oo(a) {
        if (!a.lq && "undefined" == typeof XMLHttpRequest && "undefined" != typeof ActiveXObject) {
            for (var b = ["MSXML2.XMLHTTP.6.0", "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"], c = 0; c < b.length; c++) {
                var d = b[c];
                try {
                    return new ActiveXObject(d), a.lq = d
                } catch (f) {}
            }
            throw Error("Could not create ActiveXObject. ActiveX might be disabled, or MSXML might not be installed");
        }
        return a.lq
    }
    Po = new Qo;

    function So(a) {
        O.call(this);
        this.headers = new Od;
        this.tl = a || null;
        this.Vb = !1;
        this.sl = this.ea = null;
        this.Aq = this.jk = "";
        this.Yh = 0;
        this.xe = "";
        this.tf = this.Qm = this.Zj = this.bm = !1;
        this.Si = 0;
        this.fl = null;
        this.Or = To;
        this.nl = this.oy = !1
    }
    y(So, O);
    var To = "";
    So.prototype.G = ne("goog.net.XhrIo");
    var Uo = /^https?$/i,
        Vo = ["POST", "PUT"],
        Wo = [];

    function Xo(a, b, c, d) {
        var f = new So;
        Wo.push(f);
        b && f.g("complete", b);
        f.mk("ready", f.it);
        f.send(a, "POST", c, d)
    }
    n = So.prototype;
    n.it = function() {
        this.F();
        kb(Wo, this)
    };
    n.send = function(a, b, c, d) {
        if (this.ea) throw Error("[goog.net.XhrIo] Object is active with another request\x3d" + this.jk + "; newUri\x3d" + a);
        b = b ? b.toUpperCase() : "GET";
        this.jk = a;
        this.xe = "";
        this.Yh = 0;
        this.Aq = b;
        this.bm = !1;
        this.Vb = !0;
        this.ea = this.tl ? Ro(this.tl) : Ro(Po);
        this.sl = this.tl ? No(this.tl) : No(Po);
        this.ea.onreadystatechange = w(this.ir, this);
        try {
            Do(this.G, Yo(this, "Opening Xhr")), this.Qm = !0, this.ea.open(b, a, !0), this.Qm = !1
        } catch (f) {
            Do(this.G, Yo(this, "Error opening Xhr: " + f.message));
            Zo(this, f);
            return
        }
        a = c ||
            "";
        var g = this.headers.ib();
        d && Id(d, function(a, b) {
            g.set(b, a)
        });
        d = fb(g.ne(), $o);
        c = q.FormData && a instanceof q.FormData;
        !hb(Vo, b) || (d || c) || g.set("Content-Type", "application/x-www-form-urlencoded;charset\x3dutf-8");
        Id(g, function(a, b) {
            this.ea.setRequestHeader(b, a)
        }, this);
        this.Or && (this.ea.responseType = this.Or);
        "withCredentials" in this.ea && (this.ea.withCredentials = this.oy);
        try {
            ap(this), 0 < this.Si && (this.nl = A && D(9) && ka(this.ea.timeout) && t(this.ea.ontimeout), Do(this.G, Yo(this, "Will abort after " + this.Si + "ms if incomplete, xhr2 " +
                this.nl)), this.nl ? (this.ea.timeout = this.Si, this.ea.ontimeout = w(this.Pf, this)) : this.fl = I(this.Pf, this.Si, this)), Do(this.G, Yo(this, "Sending request")), this.Zj = !0, this.ea.send(a), this.Zj = !1
        } catch (h) {
            Do(this.G, Yo(this, "Send error: " + h.message)), Zo(this, h)
        }
    };

    function $o(a) {
        return "content-type" == a.toLowerCase()
    }
    n.Pf = function() {
        "undefined" != typeof da && this.ea && (this.xe = "Timed out after " + this.Si + "ms, aborting", this.Yh = 8, Do(this.G, Yo(this, this.xe)), this.dispatchEvent("timeout"), this.abort(8))
    };

    function Zo(a, b) {
        a.Vb = !1;
        a.ea && (a.tf = !0, a.ea.abort(), a.tf = !1);
        a.xe = b;
        a.Yh = 5;
        bp(a);
        cp(a)
    }

    function bp(a) {
        a.bm || (a.bm = !0, a.dispatchEvent("complete"), a.dispatchEvent("error"))
    }
    n.abort = function(a) {
        this.ea && this.Vb && (Do(this.G, Yo(this, "Aborting")), this.Vb = !1, this.tf = !0, this.ea.abort(), this.tf = !1, this.Yh = a || 7, this.dispatchEvent("complete"), this.dispatchEvent("abort"), cp(this))
    };
    n.k = function() {
        this.ea && (this.Vb && (this.Vb = !1, this.tf = !0, this.ea.abort(), this.tf = !1), cp(this, !0));
        So.c.k.call(this)
    };
    n.ir = function() {
        this.Jc || (this.Qm || this.Zj || this.tf ? dp(this) : this.zw())
    };
    n.zw = function() {
        dp(this)
    };

    function dp(a) {
        if (a.Vb && "undefined" != typeof da)
            if (a.sl[1] && 4 == ep(a) && 2 == a.pe()) Do(a.G, Yo(a, "Local request error detected and ignored"));
            else if (a.Zj && 4 == ep(a)) I(a.ir, 0, a);
        else if (a.dispatchEvent("readystatechange"), 4 == ep(a)) {
            Do(a.G, Yo(a, "Request complete"));
            a.Vb = !1;
            try {
                if (fp(a)) a.dispatchEvent("complete"), a.dispatchEvent("success");
                else {
                    a.Yh = 6;
                    var b;
                    try {
                        b = 2 < ep(a) ? a.ea.statusText : ""
                    } catch (c) {
                        Do(a.G, "Can not get status: " + c.message), b = ""
                    }
                    a.xe = b + " [" + a.pe() + "]";
                    bp(a)
                }
            } finally {
                cp(a)
            }
        }
    }

    function cp(a, b) {
        if (a.ea) {
            ap(a);
            var c = a.ea,
                d = a.sl[0] ? fa : null;
            a.ea = null;
            a.sl = null;
            b || a.dispatchEvent("ready");
            try {
                c.onreadystatechange = d
            } catch (f) {
                (c = a.G) && c.log(be, "Problem encountered resetting onreadystatechange: " + f.message, void 0)
            }
        }
    }

    function ap(a) {
        a.ea && a.nl && (a.ea.ontimeout = null);
        ka(a.fl) && (rh(a.fl), a.fl = null)
    }
    n.Rc = function() {
        return !!this.ea
    };

    function fp(a) {
        var b = a.pe(),
            c;
        a: switch (b) {
            case 200:
            case 201:
            case 202:
            case 204:
            case 206:
            case 304:
            case 1223:
                c = !0;
                break a;
            default:
                c = !1
        }
        if (!c) {
            if (b = 0 === b) a = oi(String(a.jk))[1] || null, !a && self.location && (a = self.location.protocol, a = a.substr(0, a.length - 1)), b = !Uo.test(a ? a.toLowerCase() : "");
            c = b
        }
        return c
    }

    function ep(a) {
        return a.ea ? a.ea.readyState : 0
    }
    n.pe = function() {
        try {
            return 2 < ep(this) ? this.ea.status : -1
        } catch (a) {
            var b = this.G;
            b && b.log(ce, "Can not get status: " + a.message, void 0);
            return -1
        }
    };

    function gp(a) {
        if (a.ea) return $b(a.ea.responseText)
    }

    function Yo(a, b) {
        return b + " [" + a.Aq + " " + a.jk + " " + a.pe() + "]"
    };
    x("setDeobfuscateFunctionName", ba());

    function hp() {
        L.call(this, "transport", "/local/transport");
        ip(this, "disconnected");
        this.Ed = 1
    }
    y(hp, L);
    ff("transport", hp);
    hp.prototype.Md = function() {
        return this.get("connectionState")
    };

    function ip(a, b) {
        S(a, "connectionState", b)
    }
    hp.prototype.uf = function() {
        return "connected" === this.Md()
    };
    hp.prototype.Xm = function() {
        return "connecting" === this.Md()
    };

    function jp(a) {
        this.hb = {};
        this.O = 0;
        if (a) {
            for (var b = Hd(a), c = Gd(a), d = 0; d < b.length; d++) this.set(b[d], c[d]);
            this.O = a.gd()
        }
    }
    n = jp.prototype;
    n.ub = void 0;
    n.set = function(a, b) {
        kp(this, a, b, !1)
    };
    n.add = function(a, b) {
        kp(this, a, b, !0)
    };

    function kp(a, b, c, d) {
        for (var f = a, g = 0; g < b.length; g++) {
            var h = b.charAt(g);
            f.hb[h] || (f.hb[h] = new jp);
            f = f.hb[h]
        }
        if (d && void 0 !== f.ub) throw Error('The collection already contains the key "' + b + '"');
        f.ub = c;
        d && a.O++
    }
    n.get = function(a) {
        for (var b = this, c = 0; c < a.length; c++) {
            var d = a.charAt(c);
            if (!b.hb[d]) return;
            b = b.hb[d]
        }
        return b.ub
    };

    function lp(a, b) {
        var c = a,
            d = {},
            f = 0;
        void 0 !== c.ub && (d[f] = c.ub);
        for (; f < b.length; f++) {
            var g = b.charAt(f);
            if (!(g in c.hb)) break;
            c = c.hb[g];
            void 0 !== c.ub && (d[f] = c.ub)
        }
        return d
    }
    n.cb = function() {
        var a = [];
        mp(this, a);
        return a
    };

    function mp(a, b) {
        void 0 !== a.ub && b.push(a.ub);
        for (var c in a.hb) mp(a.hb[c], b)
    }
    n.ne = function(a) {
        var b = [];
        if (a) {
            for (var c = this, d = 0; d < a.length; d++) {
                var f = a.charAt(d);
                if (!c.hb[f]) return [];
                c = c.hb[f]
            }
            np(c, a, b)
        } else np(this, "", b);
        return b
    };

    function np(a, b, c) {
        void 0 !== a.ub && c.push(b);
        for (var d in a.hb) np(a.hb[d], b + d, c)
    }
    n.Ic = function(a) {
        return void 0 !== this.get(a)
    };
    n.clear = function() {
        this.hb = {};
        this.ub = void 0;
        this.O = 0
    };
    n.remove = function(a) {
        for (var b = this, c = [], d = 0; d < a.length; d++) {
            var f = a.charAt(d);
            if (!b.hb[f]) throw Error('The collection does not have the key "' + a + '"');
            c.push([b, f]);
            b = b.hb[f]
        }
        a = b.ub;
        delete b.ub;
        for (this.O--; 0 < c.length;)
            if (f = c.pop(), b = f[0], f = f[1], Mc(b.hb[f].hb))
                if (b.ub) break;
                else delete b.hb[f];
        else break;
        return a
    };
    n.ib = function() {
        return new jp(this)
    };
    n.gd = e("O");

    function op(a, b, c) {
        ki.call(this, a.put("/local/transport", "transport"));
        this.ei = {};
        this.Qk = {};
        this.Yc = new jp;
        this.Hg = [];
        this.W = a;
        this.Fc = b;
        this.I = c;
        this.oz = this.mj = 0;
        this.pa("connect", this.wv);
        this.pa("disconnect", this.Cv);
        this.pa("login", this.fw);
        this.pa("logout", this.gw);
        this.pa("get", this.Ov);
        this.pa("unsubscribe", this.kx);
        this.pa("put", this.Fn);
        this.pa("post", this.uw);
        this.pa("publish", this.xw);
        this.pa("delete", this.Eg);
        this.pa("join", this.bw);
        this.pa("leave", this.zn)
    }
    y(op, ki);
    n = op.prototype;
    n.Q = e("H");
    n.G = He("vline.Transport");

    function pp(a, b, c, d, f) {
        if (b = qp(a, b)) {
            var g = a.Yc.get(b.l());
            g && (g.response = !0);
            var h = 0,
                k;
            c && (k = c.seq) && (h = k);
            d && z(d, function(a) {
                (k = a.seq) && k > h && (h = k)
            });
            h && rp(a, g, h);
            Ln(b, c, d, f)
        } else c && sp(a, "put", Xe(c), c), d && z(d, function(a) {
            sp(this, "put", Xe(a), a)
        }, a)
    }
    n.Fi = function(a, b, c) {
        (a = qp(this, a)) && Hn(a, b, c)
    };
    n.jc = function(a) {
        op.c.jc.call(this, a);
        Hc(this.ei, function(a, c) {
            if (this.ei.hasOwnProperty(c)) {
                var d = {};
                a.Hh().webrtcEnabled && (d.webrtcEnabled = !0);
                var d = new Jn(null, a.l(), a.oa(), a.tc(), a.bb(), d),
                    f = a.Oc();
                d.sid = f;
                this.xf(d)
            }
        }, this);
        Hc(this.Qk, function(a, c) {
            if (this.Qk.hasOwnProperty(c)) {
                var d = this.Qk[c];
                z(d, function(a) {
                    "join" === a.l() && (a = new Gn(null, a.X(), a.l(), Fn(a)), this.join(a))
                }, this);
                d && delete this.Qk[c]
            }
        }, this);
        z(this.Yc.cb(), function(a) {
            if (a.response) {
                var c = new Kn(null, a.path, new vm(a.ke | (a.ke &
                    7) << 4, void 0, void 0, void 0, a.ik || void 0));
                c.sid = a.Px;
                this.h("reSubscribe", c);
                tp(this, c, !0)
            }
        }, this);
        a = this.Hg;
        this.Hg = [];
        z(a, function(a) {
            try {
                Fo(this.Fc, a.X(), a)
            } catch (c) {
                this.error(c)
            }
        }, this)
    };

    function up(a, b) {
        a.h(a.Bb ? "request" : "queue", b);
        a.Hg.push(b);
        return a.Bb
    }

    function qp(a, b) {
        a.h("response", "rid", b);
        var c = null,
            d = gb(a.Hg, function(a) {
                return a.rid === b
            });
        0 <= d && (c = a.Hg[d], lb(a.Hg, d));
        return c
    }

    function sp(a, b, c, d) {
        var f, g = new Gn(null, b, c, d);
        d && (f = d.seq);
        var h = [];
        Hc(lp(a.Yc, c), function(a, b) {
            dn(c, Number(b) + 1, a.ke) && vp(this, h, a, f)
        }, a);
        z(h, function(a) {
            a.send(g.X(), g)
        })
    }

    function vp(a, b, c, d) {
        d && rp(a, c, d);
        z(c.ij, function(a) {
            jb(b, a)
        })
    }

    function rp(a, b, c) {
        !c || b.en && c <= b.en || (b.ik = b.en = c, a.h("updateLastSeq_", "path", b.path, "seq", b.ik))
    }

    function wp(a, b, c, d) {
        a.h("addSubscription", "session", d.Oc(), "path", b);
        if (1E3 <= a.Yc.gd()) throw a.error("SUBSCRIPTION_LIMIT_EXCEEDED");
        var f = a.Yc.get(b);
        f ? ((f.ke & c) !== c && (f.ke |= c, f.ik = null), jb(f.ij, d.Xb())) : (f = {
            response: !1,
            path: b,
            Px: d.Oc(),
            ke: c,
            ik: null,
            en: null,
            ij: [d.Xb()]
        }, a.Yc.add(b, f))
    }
    n.Oj = function(a, b, c) {
        var d = 0,
            f = lp(this.Yc, a),
            g = a.length;
        b & 6 ? a += "/*/*" : b & 2 && (a += "/*");
        Hc(f, function(b, f) {
            var m = Number(f) + 1;
            c && m === g || dn(a, m, b.ke) && (d |= b.ke)
        }, this);
        b &= ~d;
        b & 6 && (b |= 2);
        return b
    };

    function xp(a, b, c) {
        a.h("removeSubscription", "session", c.Oc(), "path", b.path);
        kb(b.ij, c.Xb());
        return 0 === b.ij.length ? (a.Yc.remove(b.path), !0) : !1
    }
    n.fw = function(a) {
        wp(this, a.l(), 1, a);
        wp(this, a.l() + "/msg", 6, a);
        wp(this, a.l() + "/sessions", 6, a);
        up(this, a) && this.xf(a)
    };
    n.gw = function(a) {
        z(this.Yc.cb(), function(b) {
            xp(this, b, a)
        }, this);
        if (up(this, a)) {
            var b = a.Oc();
            delete this.ei[b];
            di(this.Q(), t(void 0) ? NaN : -1, void 0);
            this.Bb && this.ic(a)
        }
    };
    n.bw = function(a) {
        var b = gl(a.l()) + "/participant";
        wp(this, b, 6, a);
        up(this, a) && this.join(a)
    };
    n.zn = function(a) {
        var b = gl(a.l()) + "/participant";
        (b = this.Yc.get(b)) && xp(this, b, a);
        up(this, a) && this.Bb && this.zg(a)
    };
    n.Ov = function(a) {
        up(this, a) && tp(this, a)
    };

    function tp(a, b, c) {
        var d = b.oe();
        if (d.na & 7) {
            var d = d.ib(),
                f = a.Oj(b.l(), d.Oj(), c);
            c || wp(a, b.l(), d.Oj(), b);
            d.na = d.na & -8 | f
        }
        c && !f || a.get(b, d)
    }
    n.kx = function(a) {
        var b = this.Yc.get(a.l());
        b && xp(this, b, a) && this.Bb && (a = {
            op: yp(a),
            subscription: a.l()
        }, this.Na.publish("/meta/unsubscribe", null, a))
    };
    n.Fn = function(a) {
        up(this, a) && this.put(a)
    };
    n.uw = function(a) {
        up(this, a) && this.sd(a)
    };
    n.xw = function(a) {
        up(this, a) && this.Ra(a)
    };
    n.Eg = function(a) {
        up(this, a) && this.remove(a)
    };
    n.Zq = function() {
        this.h("onConnecting");
        ip(this.Q(), "connecting");
        this.cg()
    };
    n.oi = function() {
        this.h("onDisconnected");
        ip(this.Q(), "disconnected");
        this.Ca(!1)
    };

    function zp(a) {
        a.h("onDisconnecting");
        ip(a.Q(), "disconnecting");
        a.disconnect()
    }
    n.wv = function() {
        this.h("onConnect", "connectCount", this.mj);
        0 === this.mj++ && this.Zq()
    };
    n.Cv = function() {
        this.h("onDisconnect", "connectCount", this.mj);
        0 === --this.mj && zp(this)
    };
    n.pa = function(a, b) {
        var c = w(b, this);
        this.Fc.Vk[a] = {
            aa: c,
            un: !0
        }
    };

    function Ap() {
        O.call(this);
        this.P = new Gh(this);
        Hg && (Ig ? this.P.g(Jg ? document.body : window, ["online", "offline"], this.aq) : (this.sr = this.vg(), this.da = new ph(Bp), this.P.g(this.da, qh, this.ou), this.da.start()))
    }
    y(Ap, O);
    var Bp = 250;
    Ap.prototype.vg = function() {
        return Hg ? navigator.onLine : !0
    };
    Ap.prototype.ou = function() {
        var a = this.vg();
        a != this.sr && (this.sr = a, this.aq())
    };
    Ap.prototype.aq = function() {
        var a = this.vg() ? "online" : "offline";
        this.dispatchEvent(a)
    };
    Ap.prototype.k = function() {
        Ap.c.k.call(this);
        this.P.F();
        this.P = null;
        this.da && (this.da.F(), this.da = null)
    };

    function Cp(a, b, c) {
        op.call(this, a, b, c);
        this.Vl = null;
        this.hz = navigator.onLine ? "online" : "offline";
        this.xk = !1;
        this.tn = 0;
        this.Tq = 1E3;
        this.Oq = 3E4;
        this.$u = 6E4;
        this.cz = 12E4;
        this.wn = null;
        Jg ? null != document.body ? this.qn() : dh(window, "load", this.qn, !1, this) : this.qn();
        org.cometd.JSON.toJSON = ac;
        org.cometd.JSON.fromJSON = $b;
        this.Na = new org.cometd.Cometd;
        this.Kk = 0;
        org.cometd.WebSocket && (this.Na.websocketEnabled = !0, this.Na.registerTransport("websocket", new org.cometd.WebSocketTransport, 0));
        this.Na.registerTransport("long-polling",
            new Dp);
        this.Na.registerTransport("callback-polling", new Ep);
        this.Na.registerExtension("ackExt", new org.cometd.AckExtension);
        this.Na.registerExtension("timesync", new org.cometd.TimeSyncExtension);
        this.Co = this.Na.getExtension("timesync");
        this.Na.addListener("/meta/disconnect", w(this.st, this));
        this.Na.addListener("/meta/connect", w(this.bv, this));
        this.Na.addListener("/meta/subscribe", w(this.ey, this));
        this.Na.addListener("/meta/publish", w(this.Kx, this));
        this.Na.addListener("/meta/unsuccessful", w(this.iy,
            this));
        this.Na.addListener("/**", w(this.dy, this))
    }
    y(Cp, op);
    Ue("cometdTransport", Cp);

    function Dp() {
        var a = new org.cometd.LongPollingTransport,
            a = org.cometd.Transport.derive(a);
        a.xhrSend = function(a) {
            var c = a.headers;
            c["Content-Type"] = "application/json;charset\x3dUTF-8";
            Xo(a.url, function(c) {
                c = c.target;
                if (fp(c)) a.onSuccess(gp(c));
                else a.onError(v(c.xe) ? c.xe : String(c.xe))
            }, a.body, c)
        };
        return a
    }

    function Ep() {
        var a = new org.cometd.CallbackPollingTransport,
            a = org.cometd.Transport.derive(a);
        a.jsonpSend = function(a) {
            (new Ho(a.url, "jsonp")).send({
                message: a.body
            }, function(c) {
                a.onSuccess(c)
            }, function() {
                a.onError("unknown JSONP error")
            })
        };
        return a
    }
    n = Cp.prototype;
    n.se = ba();
    n.qn = function() {
        this.wn = new Ap;
        Zg(this.wn, ["online", "offline"], w(this.fv, this))
    };

    function Fp(a) {
        if (a.xk) {
            if (5E3 > (new Date).getTime() - a.tn) return a.Tq;
            a.xk = !1;
            a.tn = 0
        }
        return a.Oq + Math.floor(Math.random() * (a.$u - a.Oq))
    }
    n.xf = function(a) {
        var b = yp(a),
            c = {};
        c.appId = a.oa();
        c.authId = a.tc();
        c.token = a.bb();
        c.profile = a.Hh();
        this.kc("/service/login", c, b)
    };
    n.ic = function(a) {
        a = yp(a);
        this.kc("/service/logout", {}, a)
    };
    n.get = function(a, b) {
        var c = yp(a);
        if (a.oe()) {
            var d = gf(b);
            Rc(c, d)
        }
        this.kc("/service/get", {}, c)
    };
    n.put = function(a) {
        var b = yp(a),
            c = Fn(a);
        null != c ? this.kc("/service/put", c, b) : this.G.log(ce, "Put with null data: " + a, void 0)
    };
    n.Ra = function(a) {
        var b = yp(a),
            c = Fn(a);
        null != c ? (a = a.l(), this.kc(wa(a, "/service/") ? a : "/service/publish", c, b)) : this.G.log(ce, "Publish with null data: " + a, void 0)
    };
    n.sd = function(a) {
        var b = yp(a),
            c = Fn(a);
        null != c ? this.kc("/service/post", c, b) : this.G.log(ce, "Post with null data: " + a, void 0)
    };
    n.remove = function(a) {
        a = yp(a);
        this.kc("/service/delete", null, a)
    };
    n.join = function(a) {
        var b = yp(a);
        this.kc("/service/join", Fn(a), b)
    };
    n.zg = function(a) {
        a = yp(a);
        this.kc("/service/leave", {}, a)
    };

    function yp(a) {
        var b = {};
        b.sid = a.Oc();
        b.appId = a.oa();
        b.rid = a.rid;
        b.path = a.l();
        b.type = a.X();
        return b
    }
    n.kc = function(a, b, c) {
        this.h("publish", "channel", a, "payload", b, "op", c);
        this.Na.publish(a, b, {
            op: c
        })
    };
    n.dy = function(a) {
        var b = a.channel;
        /^\/meta\//.test(b) || /^\/service\//.test(b) || sh(function() {
            this.h("subscribeCallback", a);
            var c = a.data,
                d = a.op,
                f = d.type;
            d && f && sp(this, f, b, c)
        }, this)
    };
    n.fv = function() {
        var a = this.wn.vg();
        this.h("networkStateChanged - isOnline : ", a);
        a ? (this.Na.resetBackOff(), this.xk = !0, this.tn = (new Date).getTime(), ip(this.Q(), "connecting"), this.cg(this.Tq)) : ("disconnected" !== this.Q().Md() && "disconnecting" !== this.Q().Md() && (zp(this), this.oi()), this.xk = !1)
    };
    n.cg = function() {
        Gp(this);
        this.Na.handshake()
    };

    function Gp(a) {
        var b;
        b = nj(8);
        b = ya(R(a.I, "messageServer") || "https://%s.message." + a.I.get("env") + ".vline.com/cometd", b);
        a.Vl = b;
        a.h("connect", a.Vl);
        b = a.I.get("autoBatch");
        var c = a.I.get("maxBackOff"),
            d = a.I.get("cometdLogLevel"),
            f = a.I.get("connectTimeout");
        a.Na.configure({
            url: a.Vl,
            autoBatch: b,
            backoffIncrement: Fp(a),
            maxBackoff: c,
            connectTimeout: f,
            logLevel: d
        })
    }
    n.disconnect = function() {
        this.h("disconnect");
        this.Na.disconnect()
    };
    n.bv = function(a) {
        try {
            this.h("metaconnectHandler", a);
            this.Co && this.Co.getTimeOffset() && (Ce = this.Co.getTimeOffset());
            if (this.Na.isDisconnected() || !a.successful) this.Kk++, 1 < this.Kk && (F(this.G, "Keep-Alive failed, trying to reconnect..."), this.Kk = 0, this.oi(), Gp(this));
            a.successful && !this.Na.isDisconnected() && (this.Kk = 0, this.h("Keep-Alive Timeoffset ", Ce), this.Q().uf() || (this.h("onConnected"), ip(this.Q(), "connected"), this.Ca(!0)))
        } catch (b) {
            this.error(b)
        }
    };
    n.st = function() {
        this.oi()
    };
    n.ey = function(a) {
        this.h("subscribeHandler", a)
    };
    n.Kx = function(a) {
        sh(function() {
            this.h("responseHandler", a);
            var b = a.channel,
                c = Hp(this, a);
            c && this.G.log(be, c.message, c);
            if (!a.failure && !Ip(c))
                if ("/service/get" === b) {
                    var b = a.op.rid,
                        d = a.data,
                        f = null,
                        g = [];
                    d && (f = d.root, g = d.results);
                    pp(this, b, f, g, c)
                } else if ("/service/login" === b) a: {
                f = a.op, d = f.sid;
                b = a.data;
                if (f = qp(this, f.rid)) d = f.Oc(), this.ei[d] = f, di(this.Q()), Hn(f, null, c);
                else if (f = this.ei[d], c) {
                    f.Xb().send("login.err.resp", c);
                    break a
                }
                f && b && sp(this, "put", f.l(), b)
            } else "/service/logout" === b ? this.Fi(a.op.rid,
                null, c) : this.Fi(a.op.rid, a.data, c)
        }, this)
    };
    n.iy = function(a) {
        this.h("unsuccessfulHandler", a);
        "/meta/handshake" === a.channel && !0 === a.failure && Gp(this);
        a = Hp(this, a);
        Ip(a) && Jp(this)
    };

    function Ip(a) {
        return a && ("402" === a.X() || "403" === a.X())
    }
    var Kp = {
        400: "BAD_PARAM",
        401: "AUTH_FAILED",
        403: "FORBIDDEN",
        500: "SERVER_ERROR",
        601: "BAD_CREDENTIALS",
        603: "ACCESS_DENIED",
        604: "NO_RELAY_FOUND",
        605: "RSC_EXISTS",
        610: "INVALID_EMAIL",
        611: "EMAIL_EXISTS",
        612: "SERVICEID_NOT_FOUND",
        613: "SERVICEID_EXISTS",
        614: "INVALID_PASSWORD",
        615: "USERID_NOT_FOUND",
        616: "INVALID_TOKEN",
        617: "INVALID_PAYLOAD",
        618: "ROOM_NOT_FOUND"
    };

    function Hp(a, b) {
        var c = b.error,
            d = b.errors;
        if (!c && !d) return null;
        var f = Lp(c);
        d && Hc(d, function(a, b) {
            var c = Lp(a),
                d = f.map;
            d || (d = f.map = {});
            d[b] = c
        }, a);
        return f
    }

    function Lp(a) {
        if (!a) return new N("NONE");
        var b = a.split(":");
        a = Va(b[0]);
        var c = Va(b[1]),
            b = Va(b[2]);
        a in Kp && (a = Kp[a]);
        var d = c;
        Aa(c) || Aa(b) || (d += " - ");
        return new N(a, d + b)
    }

    function Jp(a) {
        a.Q().uf() && (zp(a), Th(a.Q(), "change:connectionState", w(function() {
            "disconnected" === this.Q().Md() && setTimeout(w(this.Zq, this), 0)
        }, a)))
    };

    function Mp(a) {
        O.call(this);
        this.V = a || window;
        this.nk = Zg(this.V, "resize", this.eq, !1, this);
        this.de = Zc(this.V)
    }
    y(Mp, O);
    n = Mp.prototype;
    n.nk = null;
    n.V = null;
    n.de = null;
    n.Pc = function() {
        return this.de ? this.de.ib() : null
    };
    n.k = function() {
        Mp.c.k.call(this);
        this.nk && (gh(this.nk), this.nk = null);
        this.de = this.V = null
    };
    n.eq = function() {
        var a = Zc(this.V);
        Gc(a, this.de) || (this.de = a, this.dispatchEvent("resize"))
    };

    function Np(a) {
        Mp.call(this, a);
        this.pd = this.V.orientation;
        this.Dk = Zg(this.V, "orientationchange", this.mu, !1, this);
        this.de = Zc(this.V)
    }
    y(Np, Mp);
    n = Np.prototype;
    n.Dk = null;
    n.k = function() {
        Np.c.k.call(this);
        this.Dk && (gh(this.Dk), this.Dk = null)
    };
    n.Nl = function() {
        var a = Zc(this.V);
        0 == a.width || 0 == a.height ? I(this.Nl, 5E3, this) : Gc(a, this.de) || (this.de = a, this.dispatchEvent("resize"))
    };
    n.eq = function() {
        this.Nl()
    };
    n.mu = function() {
        null != this.V.orientation && this.pd !== this.V.orientation && (this.pd = this.V.orientation, this.Nl(), this.dispatchEvent("orientationchange"))
    };

    function Op(a, b) {
        for (var c = [a], d = b.length - 1; 0 <= d; --d) c.push(typeof b[d], b[d]);
        return c.join("\x0B")
    };

    function Pp(a, b, c, d) {
        O.call(this);
        if (a && !b) throw Error("Can't use invisible history without providing a blank page.");
        var f;
        c ? f = c : (f = "history_state" + Qp, document.write(ya(Rp, f, f)), f = v(f) ? document.getElementById(f) : f);
        this.Qh = f;
        this.V = c ? ad(Vc(c)) : window;
        this.Xj = b;
        A && !b && (this.Xj = "https" == window.location.protocol ? "https:///" : 'javascript:""');
        this.da = new ph(Sp);
        Bg(this, sa(Dg, this.da));
        this.Tf = !a;
        this.P = new Gh(this);
        if (a || Tp) d ? a = d : (a = "history_iframe" + Qp, b = this.Xj ? 'src\x3d"' + Fa(this.Xj) + '"' : "", document.write(ya(Up,
            a, b)), a = v(a) ? document.getElementById(a) : a), this.eb = a, this.vs = !0;
        Tp && (this.P.g(this.V, "load", this.Dv), this.fs = this.Yl = !1);
        this.Tf ? Vp(this, this.bb(), !0) : Wp(this, this.Qh.value);
        Qp++
    }
    y(Pp, O);
    Pp.prototype.xa = !1;
    Pp.prototype.Bg = !1;
    Pp.prototype.yg = null;
    var Xp = function(a, b) {
            var c = na(a),
                d = b || Op;
            return function() {
                var b = this || q,
                    b = b.closure_memoize_cache_ || (b.closure_memoize_cache_ = {}),
                    g = d(c, arguments);
                return b.hasOwnProperty(g) ? b[g] : b[g] = a.apply(this, arguments)
            }
        }(function() {
            return A ? 8 <= document.documentMode : "onhashchange" in q
        }),
        Tp = A && !Qb(8),
        Yp = Tp;
    n = Pp.prototype;
    n.Ag = null;
    n.k = function() {
        Pp.c.k.call(this);
        this.P.F();
        this.Ga(!1)
    };
    n.Ga = function(a) {
        if (a != this.xa)
            if (Tp && !this.Yl) this.fs = a;
            else if (a)
            if (Eb ? this.P.g(this.V.document, Zp, this.wx) : B && this.P.g(this.V, "pageshow", this.Gn), Xp() && this.Tf) this.P.g(this.V, "hashchange", this.Qv), this.xa = !0, this.dispatchEvent(new xo(this.bb(), !1));
            else {
                if (!A || this.Yl) this.P.g(this.da, qh, w(this.Gc, this, !0)), this.xa = !0, Tp || (this.yg = this.bb(), this.dispatchEvent(new xo(this.bb(), !1))), this.da.start()
            } else this.xa = !1, this.P.wd(), this.da.stop()
    };
    n.Dv = function() {
        this.Yl = !0;
        this.Qh.value && Wp(this, this.Qh.value, !0);
        this.Ga(this.fs)
    };
    n.Gn = function(a) {
        a.rc.persisted && (this.Ga(!1), this.Ga(!0))
    };
    n.Qv = function() {
        var a = $p(this.V);
        a != this.yg && this.he(a, !0)
    };
    n.bb = function() {
        return null != this.Ag ? this.Ag : this.Tf ? $p(this.V) : aq(this) || ""
    };
    n.es = function(a, b) {
        bq(this, a, !1, b)
    };
    n.Vn = function(a, b) {
        bq(this, a, !0, b)
    };

    function $p(a) {
        a = a.location.href;
        var b = a.indexOf("#");
        return 0 > b ? "" : a.substring(b + 1)
    }

    function bq(a, b, c, d) {
        a.bb() != b && (a.Tf ? (Vp(a, b, c), Xp() || A && Wp(a, b, c, d), a.xa && a.Gc(!1)) : (Wp(a, b, c), a.Ag = a.yg = a.Qh.value = b, a.dispatchEvent(new xo(b, !1))))
    }

    function Vp(a, b, c) {
        a = a.V.location;
        var d = a.href.split("#")[0],
            f = -1 != a.href.indexOf("#");
        if (Yp || f || b) d += "#" + b;
        d != a.href && (c ? a.replace(d) : a.href = d)
    }

    function Wp(a, b, c, d) {
        if (a.vs || b != aq(a))
            if (a.vs = !1, b = encodeURIComponent(String(b)), A) {
                var f = kd(a.eb);
                f.open("text/html", c ? "replace" : void 0);
                f.write(ya(cq, Fa(d || a.V.document.title), b));
                f.close()
            } else if (b = a.Xj + "#" + b, a = a.eb.contentWindow) c ? a.location.replace(b) : a.location.href = b
    }

    function aq(a) {
        if (A) return a = kd(a.eb), a.body ? Ea(a.body.innerHTML) : null;
        var b = a.eb.contentWindow;
        if (b) {
            var c;
            try {
                c = Ea($p(b))
            } catch (d) {
                return a.Bg || (!0 != a.Bg && a.da.setInterval(dq), a.Bg = !0), null
            }
            a.Bg && (!1 != a.Bg && a.da.setInterval(Sp), a.Bg = !1);
            return c || null
        }
        return null
    }
    n.Gc = function(a) {
        if (this.Tf) {
            var b = $p(this.V);
            b != this.yg && this.he(b, a)
        }
        if (!this.Tf || Tp)
            if (b = aq(this) || "", null == this.Ag || b == this.Ag) this.Ag = null, b != this.yg && this.he(b, a)
    };
    n.he = function(a, b) {
        this.yg = this.Qh.value = a;
        this.Tf ? (Tp && Wp(this, a), Vp(this, a)) : Wp(this, a);
        this.dispatchEvent(new xo(this.bb(), b))
    };
    n.wx = function() {
        this.da.stop();
        this.da.start()
    };
    var Zp = ["mousedown", "keydown", "mousemove"],
        cq = "\x3ctitle\x3e%s\x3c/title\x3e\x3cbody\x3e%s\x3c/body\x3e",
        Up = '\x3ciframe id\x3d"%s" style\x3d"display:none" %s\x3e\x3c/iframe\x3e',
        Rp = '\x3cinput type\x3d"text" name\x3d"%s" id\x3d"%s" style\x3d"display:none"\x3e',
        Qp = 0,
        Sp = 150,
        dq = 1E4;
    var eq;

    function fq(a, b) {
        b ? a.setAttribute("role", b) : a.removeAttribute("role")
    }

    function gq(a, b, c) {
        ja(c) && (c = c.join(" "));
        var d = "aria-" + b;
        "" === c || void 0 == c ? (eq || (eq = {
            atomic: !1,
            autocomplete: "none",
            dropeffect: "none",
            haspopup: !1,
            live: "off",
            multiline: !1,
            multiselectable: !1,
            orientation: "vertical",
            readonly: !1,
            relevant: "additions text",
            required: !1,
            sort: "none",
            busy: !1,
            disabled: !1,
            hidden: !1,
            invalid: "false"
        }), c = eq, b in c ? a.setAttribute(d, c[b]) : a.removeAttribute(d)) : a.setAttribute(d, c)
    };
    var hq = !!q.DOMTokenList,
        iq = hq ? function(a) {
            return a.classList
        } : function(a) {
            a = a.className;
            return v(a) && a.match(/\S+/g) || []
        },
        jq = hq ? function(a, b) {
            return a.classList.contains(b)
        } : function(a, b) {
            return hb(iq(a), b)
        },
        kq = hq ? function(a, b) {
            a.classList.add(b)
        } : function(a, b) {
            jq(a, b) || (a.className += 0 < a.className.length ? " " + b : b)
        },
        lq = hq ? function(a, b) {
            a.classList.remove(b)
        } : function(a, b) {
            jq(a, b) && (a.className = bb(iq(a), function(a) {
                return a != b
            }).join(" "))
        };

    function mq(a, b, c, d) {
        this.top = a;
        this.right = b;
        this.bottom = c;
        this.left = d
    }
    n = mq.prototype;
    n.ib = function() {
        return new mq(this.top, this.right, this.bottom, this.left)
    };
    n.contains = function(a) {
        return this && a ? a instanceof mq ? a.left >= this.left && a.right <= this.right && a.top >= this.top && a.bottom <= this.bottom : a.x >= this.left && a.x <= this.right && a.y >= this.top && a.y <= this.bottom : !1
    };
    n.ceil = function() {
        this.top = Math.ceil(this.top);
        this.right = Math.ceil(this.right);
        this.bottom = Math.ceil(this.bottom);
        this.left = Math.ceil(this.left);
        return this
    };
    n.floor = function() {
        this.top = Math.floor(this.top);
        this.right = Math.floor(this.right);
        this.bottom = Math.floor(this.bottom);
        this.left = Math.floor(this.left);
        return this
    };
    n.round = function() {
        this.top = Math.round(this.top);
        this.right = Math.round(this.right);
        this.bottom = Math.round(this.bottom);
        this.left = Math.round(this.left);
        return this
    };

    function nq(a, b, c, d) {
        this.left = a;
        this.top = b;
        this.width = c;
        this.height = d
    }
    n = nq.prototype;
    n.ib = function() {
        return new nq(this.left, this.top, this.width, this.height)
    };

    function oq(a, b) {
        return a == b ? !0 : a && b ? a.left == b.left && a.width == b.width && a.top == b.top && a.height == b.height : !1
    }
    n.contains = function(a) {
        return a instanceof nq ? this.left <= a.left && this.left + this.width >= a.left + a.width && this.top <= a.top && this.top + this.height >= a.top + a.height : a.x >= this.left && a.x <= this.left + this.width && a.y >= this.top && a.y <= this.top + this.height
    };
    n.Pc = function() {
        return new Fc(this.width, this.height)
    };
    n.ceil = function() {
        this.left = Math.ceil(this.left);
        this.top = Math.ceil(this.top);
        this.width = Math.ceil(this.width);
        this.height = Math.ceil(this.height);
        return this
    };
    n.floor = function() {
        this.left = Math.floor(this.left);
        this.top = Math.floor(this.top);
        this.width = Math.floor(this.width);
        this.height = Math.floor(this.height);
        return this
    };
    n.round = function() {
        this.left = Math.round(this.left);
        this.top = Math.round(this.top);
        this.width = Math.round(this.width);
        this.height = Math.round(this.height);
        return this
    };

    function pq(a, b, c) {
        v(b) ? qq(a, c, b) : Hc(b, sa(qq, a))
    }

    function qq(a, b, c) {
        (c = rq(a, c)) && (a.style[c] = b)
    }

    function rq(a, b) {
        var c = Xa(b);
        if (void 0 === a.style[c]) {
            var d = (C ? "Webkit" : B ? "Moz" : A ? "ms" : Eb ? "O" : null) + Ya(b);
            if (void 0 !== a.style[d]) return d
        }
        return c
    }

    function sq(a, b) {
        var c = a.style[Xa(b)];
        return "undefined" !== typeof c ? c : a.style[rq(a, b)] || ""
    }

    function tq(a, b) {
        var c = Vc(a);
        return c.defaultView && c.defaultView.getComputedStyle && (c = c.defaultView.getComputedStyle(a, null)) ? c[b] || c.getPropertyValue(b) || "" : ""
    }

    function uq(a, b) {
        return tq(a, b) || (a.currentStyle ? a.currentStyle[b] : null) || a.style && a.style[b]
    }

    function vq(a) {
        return uq(a, "position")
    }

    function wq(a, b, c) {
        var d, f = B && (zb || Hb) && D("1.9");
        b instanceof E ? (d = b.x, b = b.y) : (d = b, b = c);
        a.style.left = xq(d, f);
        a.style.top = xq(b, f)
    }

    function yq(a) {
        var b;
        try {
            b = a.getBoundingClientRect()
        } catch (c) {
            return {
                left: 0,
                top: 0,
                right: 0,
                bottom: 0
            }
        }
        A && (a = a.ownerDocument, b.left -= a.documentElement.clientLeft + a.body.clientLeft, b.top -= a.documentElement.clientTop + a.body.clientTop);
        return b
    }

    function zq(a) {
        if (A && !Qb(8)) return a.offsetParent;
        var b = Vc(a),
            c = uq(a, "position"),
            d = "fixed" == c || "absolute" == c;
        for (a = a.parentNode; a && a != b; a = a.parentNode)
            if (c = uq(a, "position"), d = d && "static" == c && a != b.documentElement && a != b.body, !d && (a.scrollWidth > a.clientWidth || a.scrollHeight > a.clientHeight || "fixed" == c || "absolute" == c || "relative" == c)) return a;
        return null
    }

    function Aq(a) {
        for (var b = new mq(0, Infinity, Infinity, 0), c = Tc(a), d = c.fa.body, f = c.fa.documentElement, g = $c(c.fa); a = zq(a);)
            if (!(A && 0 == a.clientWidth || C && 0 == a.clientHeight && a == d || a == d || a == f || "visible" == uq(a, "overflow"))) {
                var h = Bq(a),
                    k;
                k = a;
                if (B && !D("1.9")) {
                    var m = parseFloat(tq(k, "borderLeftWidth"));
                    if (Cq(k)) var p = k.offsetWidth - k.clientWidth - m - parseFloat(tq(k, "borderRightWidth")),
                        m = m + p;
                    k = new E(m, parseFloat(tq(k, "borderTopWidth")))
                } else k = new E(k.clientLeft, k.clientTop);
                h.x += k.x;
                h.y += k.y;
                b.top = Math.max(b.top,
                    h.y);
                b.right = Math.min(b.right, h.x + a.clientWidth);
                b.bottom = Math.min(b.bottom, h.y + a.clientHeight);
                b.left = Math.max(b.left, h.x)
            }
        d = g.scrollLeft;
        g = g.scrollTop;
        b.left = Math.max(b.left, d);
        b.top = Math.max(b.top, g);
        c = Zc(xd(c));
        b.right = Math.min(b.right, d + c.width);
        b.bottom = Math.min(b.bottom, g + c.height);
        return 0 <= b.top && 0 <= b.left && b.bottom > b.top && b.right > b.left ? b : null
    }

    function Bq(a) {
        var b, c = Vc(a),
            d = uq(a, "position"),
            f = B && c.getBoxObjectFor && !a.getBoundingClientRect && "absolute" == d && (b = c.getBoxObjectFor(a)) && (0 > b.screenX || 0 > b.screenY),
            g = new E(0, 0),
            h;
        b = c ? Vc(c) : document;
        h = !A || Qb(9) || wd(Tc(b)) ? b.documentElement : b.body;
        if (a == h) return g;
        if (a.getBoundingClientRect) b = yq(a), a = yd(Tc(c)), g.x = b.left + a.x, g.y = b.top + a.y;
        else if (c.getBoxObjectFor && !f) b = c.getBoxObjectFor(a), a = c.getBoxObjectFor(h), g.x = b.screenX - a.screenX, g.y = b.screenY - a.screenY;
        else {
            b = a;
            do {
                g.x += b.offsetLeft;
                g.y += b.offsetTop;
                b != a && (g.x += b.clientLeft || 0, g.y += b.clientTop || 0);
                if (C && "fixed" == vq(b)) {
                    g.x += c.body.scrollLeft;
                    g.y += c.body.scrollTop;
                    break
                }
                b = b.offsetParent
            } while (b && b != a);
            if (Eb || C && "absolute" == d) g.y -= c.body.offsetTop;
            for (b = a;
                (b = zq(b)) && b != c.body && b != h;) g.x -= b.scrollLeft, Eb && "TR" == b.tagName || (g.y -= b.scrollTop)
        }
        return g
    }

    function Dq(a, b, c) {
        if (b instanceof Fc) c = b.height, b = b.width;
        else if (void 0 == c) throw Error("missing height argument");
        Eq(a, b);
        Fq(a, c)
    }

    function xq(a, b) {
        "number" == typeof a && (a = (b ? Math.round(a) : a) + "px");
        return a
    }

    function Fq(a, b) {
        a.style.height = xq(b, !0)
    }

    function Eq(a, b) {
        a.style.width = xq(b, !0)
    }

    function Gq(a) {
        return Hq(a)
    }

    function Hq(a) {
        var b = Iq;
        if ("none" != uq(a, "display")) return b(a);
        var c = a.style,
            d = c.display,
            f = c.visibility,
            g = c.position;
        c.visibility = "hidden";
        c.position = "absolute";
        c.display = "inline";
        a = b(a);
        c.display = d;
        c.position = g;
        c.visibility = f;
        return a
    }

    function Iq(a) {
        var b = a.offsetWidth,
            c = a.offsetHeight,
            d = C && !b && !c;
        return t(b) && !d || !a.getBoundingClientRect ? new Fc(b, c) : (a = yq(a), new Fc(a.right - a.left, a.bottom - a.top))
    }

    function Jq(a) {
        var b = Bq(a);
        a = Hq(a);
        return new nq(b.x, b.y, a.width, a.height)
    }

    function Kq(a, b) {
        var c = a.style;
        "opacity" in c ? c.opacity = b : "MozOpacity" in c ? c.MozOpacity = b : "filter" in c && (c.filter = "" === b ? "" : "alpha(opacity\x3d" + 100 * b + ")")
    }

    function Lq(a, b) {
        a.style.display = b ? "" : "none"
    }

    function Cq(a) {
        return "rtl" == uq(a, "direction")
    }
    var Mq = B ? "MozUserSelect" : C ? "WebkitUserSelect" : null;

    function Nq(a, b, c) {
        c = c ? null : a.getElementsByTagName("*");
        if (Mq) {
            if (b = b ? "none" : "", a.style[Mq] = b, c) {
                a = 0;
                for (var d; d = c[a]; a++) d.style[Mq] = b
            }
        } else if (A || Eb)
            if (b = b ? "on" : "", a.setAttribute("unselectable", b), c)
                for (a = 0; d = c[a]; a++) d.setAttribute("unselectable", b)
    }

    function Oq(a, b) {
        var c = wd(Tc(Vc(a)));
        if (!A || c && D("8")) {
            var d = a.style;
            B ? d.MozBoxSizing = "border-box" : C ? d.WebkitBoxSizing = "border-box" : d.boxSizing = "border-box";
            d.width = Math.max(b.width, 0) + "px";
            d.height = Math.max(b.height, 0) + "px"
        } else if (d = a.style, c) {
            var c = Pq(a),
                f = Qq(a);
            d.pixelWidth = b.width - f.left - c.left - c.right - f.right;
            d.pixelHeight = b.height - f.top - c.top - c.bottom - f.bottom
        } else d.pixelWidth = b.width, d.pixelHeight = b.height
    }

    function Rq(a, b) {
        if (/^\d+px?$/.test(b)) return parseInt(b, 10);
        var c = a.style.left,
            d = a.runtimeStyle.left;
        a.runtimeStyle.left = a.currentStyle.left;
        a.style.left = b;
        var f = a.style.pixelLeft;
        a.style.left = c;
        a.runtimeStyle.left = d;
        return f
    }

    function Sq(a, b) {
        var c = a.currentStyle ? a.currentStyle[b] : null;
        return c ? Rq(a, c) : 0
    }

    function Pq(a) {
        if (A) {
            var b = Sq(a, "paddingLeft"),
                c = Sq(a, "paddingRight"),
                d = Sq(a, "paddingTop");
            a = Sq(a, "paddingBottom");
            return new mq(d, c, a, b)
        }
        b = tq(a, "paddingLeft");
        c = tq(a, "paddingRight");
        d = tq(a, "paddingTop");
        a = tq(a, "paddingBottom");
        return new mq(parseFloat(d), parseFloat(c), parseFloat(a), parseFloat(b))
    }
    var Tq = {
        thin: 2,
        medium: 4,
        thick: 6
    };

    function Uq(a, b) {
        if ("none" == (a.currentStyle ? a.currentStyle[b + "Style"] : null)) return 0;
        var c = a.currentStyle ? a.currentStyle[b + "Width"] : null;
        return c in Tq ? Tq[c] : Rq(a, c)
    }

    function Qq(a) {
        if (A) {
            var b = Uq(a, "borderLeft"),
                c = Uq(a, "borderRight"),
                d = Uq(a, "borderTop");
            a = Uq(a, "borderBottom");
            return new mq(d, c, a, b)
        }
        b = tq(a, "borderLeftWidth");
        c = tq(a, "borderRightWidth");
        d = tq(a, "borderTopWidth");
        a = tq(a, "borderBottomWidth");
        return new mq(parseFloat(d), parseFloat(c), parseFloat(a), parseFloat(b))
    }
    var Vq = /matrix\([0-9\.\-]+, [0-9\.\-]+, [0-9\.\-]+, [0-9\.\-]+, ([0-9\.\-]+)p?x?, ([0-9\.\-]+)p?x?\)/;

    function Wq() {}
    ga(Wq);
    Wq.prototype.gv = 0;
    Wq.Ja();

    function Xq(a) {
        O.call(this);
        this.xb = a || Tc();
        this.He = Yq
    }
    y(Xq, O);
    Xq.prototype.yu = Wq.Ja();
    var Yq = null;

    function Zq(a, b) {
        switch (a) {
            case 1:
                return b ? "disable" : "enable";
            case 2:
                return b ? "highlight" : "unhighlight";
            case 4:
                return b ? "activate" : "deactivate";
            case 8:
                return b ? "select" : "unselect";
            case 16:
                return b ? "check" : "uncheck";
            case 32:
                return b ? "focus" : "blur";
            case 64:
                return b ? "open" : "close"
        }
        throw Error("Invalid component state");
    }
    n = Xq.prototype;
    n.zb = null;
    n.J = !1;
    n.B = null;
    n.He = null;
    n.pn = null;
    n.wa = null;
    n.Ha = null;
    n.Hc = null;
    n.Qo = !1;
    n.j = function() {
        return this.zb || (this.zb = ":" + (this.yu.gv++).toString(36))
    };
    n.nb = function(a) {
        this.wa && this.wa.Hc && (Nc(this.wa.Hc, this.zb), Oc(this.wa.Hc, a, this));
        this.zb = a
    };
    n.e = e("B");
    n.C = function() {
        return this.rg || (this.rg = new Gh(this))
    };
    n.Jf = function(a) {
        if (this == a) throw Error("Unable to set parent component");
        if (a && this.wa && this.zb && $q(this.wa, this.zb) && this.wa != a) throw Error("Unable to set parent component");
        this.wa = a;
        Xq.c.Cb.call(this, a)
    };
    n.getParent = e("wa");
    n.Cb = function(a) {
        if (this.wa && this.wa != a) throw Error("Method not supported");
        Xq.c.Cb.call(this, a)
    };
    n.o = e("xb");
    n.w = function() {
        this.B = this.xb.createElement("div")
    };
    n.Qb = function(a) {
        ar(this, a)
    };

    function ar(a, b, c) {
        if (a.J) throw Error("Component already rendered");
        a.B || a.w();
        b ? b.insertBefore(a.B, c || null) : a.xb.fa.body.appendChild(a.B);
        a.wa && !a.wa.J || a.v()
    }
    n.la = function(a) {
        if (this.J) throw Error("Component already rendered");
        if (a && this.Gb(a)) {
            this.Qo = !0;
            var b = Vc(a);
            this.xb && this.xb.fa == b || (this.xb = Tc(a));
            this.$(a);
            this.v()
        } else throw Error("Invalid element to decorate");
    };
    n.Gb = l(!0);
    n.$ = ca("B");
    n.v = function() {
        this.J = !0;
        this.dc(function(a) {
            !a.J && a.e() && a.v()
        })
    };
    n.ga = function() {
        this.dc(function(a) {
            a.J && a.ga()
        });
        this.rg && this.rg.wd();
        this.J = !1
    };
    n.k = function() {
        this.J && this.ga();
        this.rg && (this.rg.F(), delete this.rg);
        this.dc(function(a) {
            a.F()
        });
        !this.Qo && this.B && hd(this.B);
        this.wa = this.pn = this.B = this.Hc = this.Ha = null;
        Xq.c.k.call(this)
    };
    n.ye = function(a) {
        return this.j() + "." + a
    };
    n.Fj = function(a) {
        if (!this.J) throw Error("Operation not supported while component is not in document");
        return this.xb.e(this.ye(a))
    };
    n.ra = function(a, b) {
        this.Hd(a, br(this), b)
    };
    n.Hd = function(a, b, c) {
        if (a.J && (c || !this.J)) throw Error("Component already rendered");
        if (0 > b || b > br(this)) throw Error("Child component index out of bounds");
        this.Hc && this.Ha || (this.Hc = {}, this.Ha = []);
        if (a.getParent() == this) {
            var d = a.j();
            this.Hc[d] = a;
            kb(this.Ha, a)
        } else Oc(this.Hc, a.j(), a);
        a.Jf(this);
        qb(this.Ha, b, 0, a);
        a.J && this.J && a.getParent() == this ? (c = this.va(), c.insertBefore(a.e(), c.childNodes[b] || null)) : c ? (this.B || this.w(), b = cr(this, b + 1), ar(a, this.va(), b ? b.B : null)) : this.J && (!a.J && a.B && a.B.parentNode &&
            1 == a.B.parentNode.nodeType) && a.v()
    };
    n.va = e("B");

    function dr(a) {
        null == a.He && (a.He = Cq(a.J ? a.B : a.xb.fa.body));
        return a.He
    }
    n.Kf = function(a) {
        if (this.J) throw Error("Component already rendered");
        this.He = a
    };

    function br(a) {
        return a.Ha ? a.Ha.length : 0
    }

    function $q(a, b) {
        var c;
        a.Hc && b ? (c = a.Hc, c = (b in c ? c[b] : void 0) || null) : c = null;
        return c
    }

    function cr(a, b) {
        return a.Ha ? a.Ha[b] || null : null
    }
    n.dc = function(a, b) {
        this.Ha && z(this.Ha, a, b)
    };

    function er(a, b) {
        return a.Ha && b ? ab(a.Ha, b) : -1
    }
    n.removeChild = function(a, b) {
        if (a) {
            var c = v(a) ? a : a.j();
            a = $q(this, c);
            c && a && (Nc(this.Hc, c), kb(this.Ha, a), b && (a.ga(), a.B && hd(a.B)), a.Jf(null))
        }
        if (!a) throw Error("Child is not in parent component");
        return a
    };
    n.Un = function(a) {
        for (var b = []; this.Ha && 0 != this.Ha.length;) b.push(this.removeChild(cr(this, 0), a));
        return b
    };

    function fr(a, b) {
        Xq.call(this, b);
        this.Sc = a || ""
    }
    y(fr, Xq);
    fr.prototype.ed = null;
    fr.prototype.Tu = 10;
    var gr = "placeholder" in document.createElement("input");
    n = fr.prototype;
    n.Ph = !1;
    n.w = function() {
        this.B = this.o().w("input", {
            type: "text"
        })
    };
    n.$ = function(a) {
        fr.c.$.call(this, a);
        this.Sc || (this.Sc = a.getAttribute("label") || "");
        var b;
        a: {
            var c = Vc(a);
            try {
                b = c && c.activeElement;
                break a
            } catch (d) {}
            b = null
        }
        b == a && (this.Ph = !0, a = this.e(), lq(a, this.Yg));
        gr ? this.e().placeholder = this.Sc : (a = this.e(), gq(a, "label", this.Sc))
    };
    n.v = function() {
        fr.c.v.call(this);
        var a = new Gh(this);
        a.g(this.e(), "focus", this.cq);
        a.g(this.e(), "blur", this.au);
        if (gr) this.P = a;
        else {
            B && a.g(this.e(), ["keypress", "keydown", "keyup"], this.fu);
            var b = Vc(this.e());
            a.g(ad(b), "load", this.pu);
            this.P = a;
            hr(this)
        }
        this.Gc();
        this.e().Su = this
    };
    n.ga = function() {
        fr.c.ga.call(this);
        this.P && (this.P.F(), this.P = null);
        this.e().Su = null
    };

    function hr(a) {
        !a.Jt && (a.P && a.e().form) && (a.P.g(a.e().form, "submit", a.gu), a.Jt = !0)
    }
    n.k = function() {
        fr.c.k.call(this);
        this.P && (this.P.F(), this.P = null)
    };
    n.Yg = "label-input-label";
    n.cq = function() {
        this.Ph = !0;
        var a = this.e();
        lq(a, this.Yg);
        if (!gr && !ir(this) && !this.Au) {
            var b = this,
                a = function() {
                    b.e() && (b.e().value = "")
                };
            A ? I(a, 10) : a()
        }
    };
    n.au = function() {
        gr || (this.P.tb(this.e(), "click", this.cq), this.ed = null);
        this.Ph = !1;
        this.Gc()
    };
    n.fu = function(a) {
        27 == a.keyCode && ("keydown" == a.type ? this.ed = this.e().value : "keypress" == a.type ? this.e().value = this.ed : "keyup" == a.type && (this.ed = null), a.preventDefault())
    };
    n.gu = function() {
        ir(this) || (this.e().value = "", I(this.$t, 10, this))
    };
    n.$t = function() {
        ir(this) || (this.e().value = this.Sc)
    };
    n.pu = function() {
        this.Gc()
    };

    function ir(a) {
        return !!a.e() && "" != a.e().value && a.e().value != a.Sc
    }
    n.clear = function() {
        this.e().value = "";
        null != this.ed && (this.ed = "")
    };
    n.reset = function() {
        ir(this) && (this.clear(), this.Gc())
    };
    n.ta = function(a) {
        null != this.ed && (this.ed = a);
        this.e().value = a;
        this.Gc()
    };
    n.ba = function() {
        return null != this.ed ? this.ed : ir(this) ? this.e().value : ""
    };
    n.jd = e("Sc");
    n.Gc = function() {
        var a = this.e();
        gr ? this.e().placeholder != this.Sc && (this.e().placeholder = this.Sc) : (hr(this), gq(a, "label", this.Sc));
        ir(this) ? (a = this.e(), lq(a, this.Yg)) : (this.Au || this.Ph || (a = this.e(), kq(a, this.Yg)), gr || I(this.Lx, this.Tu, this))
    };
    n.Ga = function(a) {
        this.e().disabled = !a;
        var b = this.e(),
            c = this.Yg + "-disabled";
        a ? lq(b, c) : kq(b, c)
    };
    n.isEnabled = function() {
        return !this.e().disabled
    };
    n.Lx = function() {
        !this.e() || (ir(this) || this.Ph) || (this.e().value = this.Sc)
    };

    function jr(a) {
        if (a.altKey && !a.ctrlKey || a.metaKey || 112 <= a.keyCode && 123 >= a.keyCode) return !1;
        switch (a.keyCode) {
            case 18:
            case 20:
            case 93:
            case 17:
            case 40:
            case 35:
            case 27:
            case 36:
            case 45:
            case 37:
            case 224:
            case 91:
            case 144:
            case 12:
            case 34:
            case 33:
            case 19:
            case 255:
            case 44:
            case 39:
            case 145:
            case 16:
            case 38:
            case 224:
            case 92:
                return !1;
            case 0:
                return !B;
            default:
                return 166 > a.keyCode || 183 < a.keyCode
        }
    }

    function kr(a, b, c, d, f) {
        if (!(A || C && D("525"))) return !0;
        if (zb && f) return lr(a);
        if (f && !d || !c && (17 == b || 18 == b || zb && 91 == b)) return !1;
        if (C && d && c) switch (a) {
            case 220:
            case 219:
            case 221:
            case 192:
            case 186:
            case 189:
            case 187:
            case 188:
            case 190:
            case 191:
            case 192:
            case 222:
                return !1
        }
        if (A && d && b == a) return !1;
        switch (a) {
            case 13:
                return !(A && Qb(9));
            case 27:
                return !C
        }
        return lr(a)
    }

    function lr(a) {
        if (48 <= a && 57 >= a || 96 <= a && 106 >= a || 65 <= a && 90 >= a || C && 0 == a) return !0;
        switch (a) {
            case 32:
            case 63:
            case 107:
            case 109:
            case 110:
            case 111:
            case 186:
            case 59:
            case 189:
            case 187:
            case 61:
            case 188:
            case 190:
            case 191:
            case 192:
            case 222:
            case 219:
            case 220:
            case 221:
                return !0;
            default:
                return !1
        }
    }

    function mr(a) {
        switch (a) {
            case 61:
                return 187;
            case 59:
                return 186;
            case 224:
                return 91;
            case 0:
                return 224;
            default:
                return a
        }
    };

    function nr(a, b) {
        O.call(this);
        a && or(this, a, b)
    }
    y(nr, O);
    n = nr.prototype;
    n.B = null;
    n.fk = null;
    n.bn = null;
    n.gk = null;
    n.gc = -1;
    n.we = -1;
    n.Cl = !1;
    var pr = {
            3: 13,
            12: 144,
            63232: 38,
            63233: 40,
            63234: 37,
            63235: 39,
            63236: 112,
            63237: 113,
            63238: 114,
            63239: 115,
            63240: 116,
            63241: 117,
            63242: 118,
            63243: 119,
            63244: 120,
            63245: 121,
            63246: 122,
            63247: 123,
            63248: 44,
            63272: 46,
            63273: 36,
            63275: 35,
            63276: 33,
            63277: 34,
            63289: 144,
            63302: 45
        },
        qr = {
            Up: 38,
            Down: 40,
            Left: 37,
            Right: 39,
            Enter: 13,
            F1: 112,
            F2: 113,
            F3: 114,
            F4: 115,
            F5: 116,
            F6: 117,
            F7: 118,
            F8: 119,
            F9: 120,
            F10: 121,
            F11: 122,
            F12: 123,
            "U+007F": 46,
            Home: 36,
            End: 35,
            PageUp: 33,
            PageDown: 34,
            Insert: 45
        },
        rr = A || C && D("525"),
        sr = zb && B;
    n = nr.prototype;
    n.hu = function(a) {
        C && (17 == this.gc && !a.ctrlKey || 18 == this.gc && !a.altKey || zb && 91 == this.gc && !a.metaKey) && (this.we = this.gc = -1); - 1 == this.gc && (a.ctrlKey && 17 != a.keyCode ? this.gc = 17 : a.altKey && 18 != a.keyCode ? this.gc = 18 : a.metaKey && 91 != a.keyCode && (this.gc = 91));
        rr && !kr(a.keyCode, this.gc, a.shiftKey, a.ctrlKey, a.altKey) ? this.handleEvent(a) : (this.we = B ? mr(a.keyCode) : a.keyCode, sr && (this.Cl = a.altKey))
    };
    n.iu = function(a) {
        this.we = this.gc = -1;
        this.Cl = a.altKey
    };
    n.handleEvent = function(a) {
        var b = a.rc,
            c, d, f = b.altKey;
        A && "keypress" == a.type ? (c = this.we, d = 13 != c && 27 != c ? b.keyCode : 0) : C && "keypress" == a.type ? (c = this.we, d = 0 <= b.charCode && 63232 > b.charCode && lr(c) ? b.charCode : 0) : Eb ? (c = this.we, d = lr(c) ? b.keyCode : 0) : (c = b.keyCode || this.we, d = b.charCode || 0, sr && (f = this.Cl), zb && (63 == d && 224 == c) && (c = 191));
        var g = c,
            h = b.keyIdentifier;
        c ? 63232 <= c && c in pr ? g = pr[c] : 25 == c && a.shiftKey && (g = 9) : h && h in qr && (g = qr[h]);
        a = g == this.gc;
        this.gc = g;
        b = new tr(g, d, a, b);
        b.altKey = f;
        this.dispatchEvent(b)
    };
    n.e = e("B");

    function or(a, b, c) {
        a.gk && a.detach();
        a.B = b;
        a.fk = Zg(a.B, "keypress", a, c);
        a.bn = Zg(a.B, "keydown", a.hu, c, a);
        a.gk = Zg(a.B, "keyup", a.iu, c, a)
    }
    n.detach = function() {
        this.fk && (gh(this.fk), gh(this.bn), gh(this.gk), this.gk = this.bn = this.fk = null);
        this.B = null;
        this.we = this.gc = -1
    };
    n.k = function() {
        nr.c.k.call(this);
        this.detach()
    };

    function tr(a, b, c, d) {
        d && this.se(d, void 0);
        this.type = "key";
        this.keyCode = a;
        this.charCode = b;
        this.repeat = c
    }
    y(tr, Ng);

    function ur(a, b, c, d, f, g, h, k, m) {
        var p, r;
        if (p = c.offsetParent) {
            var s = "HTML" == p.tagName || "BODY" == p.tagName;
            s && "static" == vq(p) || (r = Bq(p), s || (s = (s = Cq(p)) && B ? -p.scrollLeft : !s || A && D("8") || "visible" == uq(p, "overflowX") ? p.scrollLeft : p.scrollWidth - p.clientWidth - p.scrollLeft, r = Ec(r, new E(s, p.scrollTop))))
        }
        p = r || new E;
        r = Jq(a);
        if (s = Aq(a)) {
            var u = new nq(s.left, s.top, s.right - s.left, s.bottom - s.top),
                s = Math.max(r.left, u.left),
                H = Math.min(r.left + r.width, u.left + u.width);
            if (s <= H) {
                var J = Math.max(r.top, u.top),
                    u = Math.min(r.top +
                        r.height, u.top + u.height);
                J <= u && (r.left = s, r.top = J, r.width = H - s, r.height = u - J)
            }
        }
        s = Tc(a);
        J = Tc(c);
        if (s.fa != J.fa) {
            var H = s.fa.body,
                J = xd(J),
                u = new E(0, 0),
                Y = ad(Vc(H)),
                Na = H;
            do {
                var V;
                if (Y == J) V = Bq(Na);
                else {
                    var nb = Na;
                    V = void 0;
                    if (nb.getBoundingClientRect) V = yq(nb), V = new E(V.left, V.top);
                    else {
                        V = yd(Tc(nb));
                        var Cc = Bq(nb);
                        V = new E(Cc.x - V.x, Cc.y - V.y)
                    }
                    if (B && !D(12)) {
                        Cc = void 0;
                        A ? Cc = "-ms-transform" : C ? Cc = "-webkit-transform" : Eb ? Cc = "-o-transform" : B && (Cc = "-moz-transform");
                        var Cg = void 0;
                        Cc && (Cg = uq(nb, Cc));
                        Cg || (Cg = uq(nb, "transform"));
                        nb = Cg ? (nb = Cg.match(Vq)) ? new E(parseFloat(nb[1]), parseFloat(nb[2])) : new E(0, 0) : new E(0, 0);
                        V = new E(V.x + nb.x, V.y + nb.y)
                    }
                }
                u.x += V.x;
                u.y += V.y
            } while (Y && Y != J && (Na = Y.frameElement) && (Y = Y.parent));
            H = Ec(u, Bq(H));
            A && !wd(s) && (H = Ec(H, yd(s)));
            r.left += H.x;
            r.top += H.y
        }
        a = (b & 4 && Cq(a) ? b ^ 2 : b) & -5;
        b = new E(a & 2 ? r.left + r.width : r.left, a & 1 ? r.top + r.height : r.top);
        b = Ec(b, p);
        f && (b.x += (a & 2 ? -1 : 1) * f.x, b.y += (a & 1 ? -1 : 1) * f.y);
        var K;
        if (h)
            if (m) K = m;
            else if (K = Aq(c)) K.top -= p.y, K.right -= p.x, K.bottom -= p.y, K.left -= p.x;
        a: {
            m = K;
            f = b.ib();
            K = 0;
            a = (d & 4 &&
                Cq(c) ? d ^ 2 : d) & -5;
            d = Hq(c);
            k = k ? k.ib() : d.ib();
            if (g || 0 != a) a & 2 ? f.x -= k.width + (g ? g.right : 0) : g && (f.x += g.left), a & 1 ? f.y -= k.height + (g ? g.bottom : 0) : g && (f.y += g.top);
            if (h && (m ? (g = f, K = 0, 65 == (h & 65) && (g.x < m.left || g.x >= m.right) && (h &= -2), 132 == (h & 132) && (g.y < m.top || g.y >= m.bottom) && (h &= -5), g.x < m.left && h & 1 && (g.x = m.left, K |= 1), g.x < m.left && (g.x + k.width > m.right && h & 16) && (k.width = Math.max(k.width - (g.x + k.width - m.right), 0), K |= 4), g.x + k.width > m.right && h & 1 && (g.x = Math.max(m.right - k.width, m.left), K |= 1), h & 2 && (K |= (g.x < m.left ? 16 : 0) | (g.x +
                    k.width > m.right ? 32 : 0)), g.y < m.top && h & 4 && (g.y = m.top, K |= 2), g.y <= m.top && (g.y + k.height < m.bottom && h & 32) && (k.height = Math.max(k.height - (m.top - g.y), 0), g.y = m.top, K |= 8), g.y >= m.top && (g.y + k.height > m.bottom && h & 32) && (k.height = Math.max(k.height - (g.y + k.height - m.bottom), 0), K |= 8), g.y + k.height > m.bottom && h & 4 && (g.y = Math.max(m.bottom - k.height, m.top), K |= 2), h & 8 && (K |= (g.y < m.top ? 64 : 0) | (g.y + k.height > m.bottom ? 128 : 0)), h = K) : h = 256, K = h, K & 496)) {
                c = K;
                break a
            }
            wq(c, f);
            Gc(d, k) || Oq(c, k);
            c = K
        }
        return c
    };

    function vr() {}
    vr.prototype.Fe = ba();

    function wr(a, b, c) {
        this.element = a;
        this.qj = b;
        this.xx = c
    }
    y(wr, vr);
    wr.prototype.Fe = function(a, b, c) {
        ur(this.element, this.qj, a, b, void 0, c, this.xx)
    };

    function xr(a, b, c, d) {
        wr.call(this, a, b);
        this.hk = c ? 5 : 0;
        this.Kn = d || void 0
    }
    y(xr, wr);
    xr.prototype.Ot = e("hk");
    xr.prototype.Fe = function(a, b, c, d) {
        var f = ur(this.element, this.qj, a, b, null, c, 10, d, this.Kn);
        if (f & 496) {
            var g = yr(f, this.qj);
            b = yr(f, b);
            f = ur(this.element, g, a, b, null, c, 10, d, this.Kn);
            f & 496 && (g = yr(f, g), b = yr(f, b), ur(this.element, g, a, b, null, c, this.hk, d, this.Kn))
        }
    };

    function yr(a, b) {
        a & 48 && (b ^= 2);
        a & 192 && (b ^= 1);
        return b
    };

    function zr(a, b, c, d) {
        xr.call(this, a, b, c || d);
        if (c || d) this.hk = 65 | (d ? 32 : 132)
    }
    y(zr, xr);

    function Ar() {}
    var Br;
    ga(Ar);
    n = Ar.prototype;
    n.sc = ba();
    n.w = function(a) {
        var b = a.o().w("div", this.me(a).join(" "), a.ka);
        Cr(this, a, b);
        return b
    };
    n.va = aa();
    n.qh = function(a, b, c) {
        if (a = a.e ? a.e() : a)
            if (A && !D("7")) {
                var d = Dr(xc(a), b);
                d.push(b);
                sa(c ? yc : zc, a).apply(null, d)
            } else Dc(a, b, c)
    };
    n.Gb = l(!0);
    n.la = function(a, b) {
        b.id && a.nb(b.id);
        var c = this.va(b);
        c && c.firstChild ? Er(a, c.firstChild.nextSibling ? ob(c.childNodes) : c.firstChild) : a.ka = null;
        var d = 0,
            f = this.K(),
            g = this.K(),
            h = !1,
            k = !1,
            c = !1,
            m = xc(b);
        z(m, function(a) {
            h || a != f ? k || a != g ? d |= this.wm(a) : k = !0 : (h = !0, g == f && (k = !0))
        }, this);
        a.nc = d;
        h || (m.push(f), g == f && (k = !0));
        k || m.push(g);
        var p = a.Lc;
        p && m.push.apply(m, p);
        if (A && !D("7")) {
            var r = Dr(m);
            0 < r.length && (m.push.apply(m, r), c = !0)
        }
        h && k && !p && !c || wc(b, m.join(" "));
        Cr(this, a, b);
        return b
    };
    n.ug = function(a) {
        dr(a) && this.Kf(a.e(), !0);
        a.isEnabled() && this.be(a, a.R)
    };

    function Cr(a, b, c) {
        b.R || gq(c, "hidden", !b.R);
        b.isEnabled() || a.pc(c, 1, !b.isEnabled());
        b.Va & 8 && a.pc(c, 8, Fr(b, 8));
        b.Va & 16 && a.pc(c, 16, Fr(b, 16));
        b.Va & 64 && a.pc(c, 64, Fr(b, 64))
    }
    n.Ke = function(a, b) {
        Nq(a, !b, !A && !Eb)
    };
    n.Kf = function(a, b) {
        this.qh(a, this.K() + "-rtl", b)
    };
    n.Rd = function(a) {
        var b;
        return a.Va & 32 && (b = a.ab()) ? qd(b) : !1
    };
    n.be = function(a, b) {
        var c;
        if (a.Va & 32 && (c = a.ab())) {
            if (!b && Fr(a, 32)) {
                try {
                    c.blur()
                } catch (d) {}
                Fr(a, 32) && a.nf(null)
            }
            qd(c) != b && rd(c, b)
        }
    };
    n.ha = function(a, b) {
        Lq(a, b);
        a && gq(a, "hidden", !b)
    };
    n.Sb = function(a, b, c) {
        var d = a.e();
        if (d) {
            var f = this.zh(b);
            f && this.qh(a, f, c);
            this.pc(d, b, c)
        }
    };
    n.pc = function(a, b, c) {
        Br || (Br = {
            1: "disabled",
            8: "selected",
            16: "checked",
            64: "expanded"
        });
        (b = Br[b]) && gq(a, b, c)
    };
    n.Rb = function(a, b) {
        var c = this.va(a);
        if (c && (gd(c), b))
            if (v(b)) ld(c, b);
            else {
                var d = function(a) {
                    if (a) {
                        var b = Vc(c);
                        c.appendChild(v(a) ? b.createTextNode(a) : a)
                    }
                };
                ia(b) ? z(b, d) : !ja(b) || "nodeType" in b ? d(b) : z(ob(b), d)
            }
    };
    n.ab = function(a) {
        return a.e()
    };
    n.K = l("vl-control");
    n.me = function(a) {
        var b = this.K(),
            c = [b],
            d = this.K();
        d != b && c.push(d);
        b = a.nc;
        for (d = []; b;) {
            var f = b & -b;
            d.push(this.zh(f));
            b &= ~f
        }
        c.push.apply(c, d);
        (a = a.Lc) && c.push.apply(c, a);
        A && !D("7") && c.push.apply(c, Dr(c));
        return c
    };

    function Dr(a, b) {
        var c = [];
        b && (a = a.concat([b]));
        z([], function(d) {
            !eb(d, sa(hb, a)) || b && !hb(d, b) || c.push(d.join("_"))
        });
        return c
    }
    n.zh = function(a) {
        this.jj || Gr(this);
        return this.jj[a]
    };
    n.wm = function(a) {
        if (!this.rs) {
            this.jj || Gr(this);
            var b = this.jj,
                c = {},
                d;
            for (d in b) c[b[d]] = d;
            this.rs = c
        }
        a = parseInt(this.rs[a], 10);
        return isNaN(a) ? 0 : a
    };

    function Gr(a) {
        var b = a.K();
        a.jj = {
            1: b + "-disabled",
            2: b + "-hover",
            4: b + "-active",
            8: b + "-selected",
            16: b + "-checked",
            32: b + "-focused",
            64: b + "-open"
        }
    };

    function Hr() {}
    y(Hr, Ar);
    ga(Hr);
    n = Hr.prototype;
    n.sc = l("button");
    n.pc = function(a, b, c) {
        switch (b) {
            case 8:
            case 16:
                gq(a, "pressed", c);
                break;
            default:
            case 64:
            case 1:
                Hr.c.pc.call(this, a, b, c)
        }
    };
    n.w = function(a) {
        var b = Hr.c.w.call(this, a);
        this.Bd(b, a.qg());
        var c = a.ba();
        c && this.ta(b, c);
        a.Va & 16 && this.pc(b, 16, Fr(a, 16));
        return b
    };
    n.la = function(a, b) {
        b = Hr.c.la.call(this, a, b);
        var c = this.ba(b);
        a.ub = c;
        a.Do = this.qg(b);
        a.Va & 16 && this.pc(b, 16, Fr(a, 16));
        return b
    };
    n.ba = fa;
    n.ta = fa;
    n.qg = function(a) {
        return a.title
    };
    n.Bd = function(a, b) {
        a && b && (a.title = b)
    };
    n.K = l("vl-button");

    function Ir(a, b) {
        if (!a) throw Error("Invalid class name " + a);
        if (!la(b)) throw Error("Invalid decorator function " + b);
        Jr[a] = b
    }

    function Kr(a) {
        for (var b = xc(a), c = 0, d = b.length; c < d; c++)
            if (a = b[c] in Jr ? Jr[b[c]]() : null) return a;
        return null
    }
    var Lr = {},
        Jr = {};

    function Mr(a, b, c) {
        Xq.call(this, c);
        if (!b) {
            b = this.constructor;
            for (var d; b;) {
                d = na(b);
                if (d = Lr[d]) break;
                b = b.c ? b.c.constructor : null
            }
            b = d ? la(d.Ja) ? d.Ja() : new d : null
        }
        this.U = b;
        this.ka = a
    }
    y(Mr, Xq);
    n = Mr.prototype;
    n.ka = null;
    n.nc = 0;
    n.Va = 39;
    n.Id = 255;
    n.Oi = 0;
    n.R = !0;
    n.Lc = null;
    n.Fm = !0;
    n.cj = !1;
    n.Gf = null;

    function Nr(a, b) {
        a.J && b != a.Fm && Or(a, b);
        a.Fm = b
    }
    n.ab = function() {
        return this.U.ab(this)
    };
    n.Ch = function() {
        return this.xc || (this.xc = new nr)
    };

    function Pr(a, b) {
        b && (a.Lc ? hb(a.Lc, b) || a.Lc.push(b) : a.Lc = [b], a.U.qh(a, b, !0))
    }
    n.qh = function(a, b) {
        b ? Pr(this, a) : a && (this.Lc && kb(this.Lc, a)) && (0 == this.Lc.length && (this.Lc = null), this.U.qh(this, a, !1))
    };
    n.w = function() {
        var a = this.U.w(this);
        this.B = a;
        var b = this.Gf || this.U.sc();
        b && fq(a, b);
        this.cj || this.U.Ke(a, !1);
        this.R || this.U.ha(a, !1)
    };
    n.as = ca("Gf");
    n.va = function() {
        return this.U.va(this.e())
    };
    n.Gb = function(a) {
        return this.U.Gb(a)
    };
    n.$ = function(a) {
        this.B = a = this.U.la(this, a);
        var b = this.Gf || this.U.sc();
        b && fq(a, b);
        this.cj || this.U.Ke(a, !1);
        this.R = "none" != a.style.display
    };
    n.v = function() {
        Mr.c.v.call(this);
        this.U.ug(this);
        if (this.Va & -2 && (this.Fm && Or(this, !0), this.Va & 32)) {
            var a = this.ab();
            if (a) {
                var b = this.Ch();
                or(b, a);
                this.C().g(b, "key", this.Qc).g(a, "focus", this.Pj).g(a, "blur", this.nf)
            }
        }
    };

    function Or(a, b) {
        var c = a.C(),
            d = a.e();
        b ? (c.g(d, "mouseover", a.Hm).g(d, "mousedown", a.of).g(d, "mouseup", a.pf).g(d, "mouseout", a.Gm), a.Nh != fa && c.g(d, "contextmenu", a.Nh), A && c.g(d, "dblclick", a.bq)) : (c.tb(d, "mouseover", a.Hm).tb(d, "mousedown", a.of).tb(d, "mouseup", a.pf).tb(d, "mouseout", a.Gm), a.Nh != fa && c.tb(d, "contextmenu", a.Nh), A && c.tb(d, "dblclick", a.bq))
    }
    n.ga = function() {
        Mr.c.ga.call(this);
        this.xc && this.xc.detach();
        this.R && this.isEnabled() && this.U.be(this, !1)
    };
    n.k = function() {
        Mr.c.k.call(this);
        this.xc && (this.xc.F(), delete this.xc);
        delete this.U;
        this.Lc = this.ka = null
    };
    n.Rb = function(a) {
        this.U.Rb(this.e(), a);
        this.ka = a
    };

    function Er(a, b) {
        a.ka = b
    }
    n.lg = function() {
        var a = this.ka;
        if (!a) return "";
        a = v(a) ? a : ia(a) ? cb(a, ud).join("") : sd(a);
        return Ba(a)
    };
    n.Kf = function(a) {
        Mr.c.Kf.call(this, a);
        var b = this.e();
        b && this.U.Kf(b, a)
    };
    n.Ke = function(a) {
        this.cj = a;
        var b = this.e();
        b && this.U.Ke(b, a)
    };
    n.ha = function(a, b) {
        if (b || this.R != a && this.dispatchEvent(a ? "show" : "hide")) {
            var c = this.e();
            c && this.U.ha(c, a);
            this.isEnabled() && this.U.be(this, a);
            this.R = a;
            return !0
        }
        return !1
    };
    n.isEnabled = function() {
        return !Fr(this, 1)
    };
    n.Ga = function(a) {
        var b = this.getParent();
        b && "function" == typeof b.isEnabled && !b.isEnabled() || !Qr(this, 1, !a) || (a || (this.setActive(!1), this.Wc(!1)), this.R && this.U.be(this, a), this.Sb(1, !a))
    };
    n.Wc = function(a) {
        Qr(this, 2, a) && this.Sb(2, a)
    };
    n.Rc = function() {
        return Fr(this, 4)
    };
    n.setActive = function(a) {
        Qr(this, 4, a) && this.Sb(4, a)
    };
    n.no = function(a) {
        Qr(this, 8, a) && this.Sb(8, a)
    };

    function Rr(a, b) {
        Qr(a, 16, b) && a.Sb(16, b)
    }
    n.Sa = function(a) {
        Qr(this, 64, a) && this.Sb(64, a)
    };

    function Fr(a, b) {
        return !!(a.nc & b)
    }
    n.Sb = function(a, b) {
        this.Va & a && b != Fr(this, a) && (this.U.Sb(this, a, b), this.nc = b ? this.nc | a : this.nc & ~a)
    };

    function Sr(a, b, c) {
        if (a.J && Fr(a, b) && !c) throw Error("Component already rendered");
        !c && Fr(a, b) && a.Sb(b, !1);
        a.Va = c ? a.Va | b : a.Va & ~b
    }

    function Tr(a, b) {
        return !!(a.Id & b) && !!(a.Va & b)
    }

    function Qr(a, b, c) {
        return !!(a.Va & b) && Fr(a, b) != c && (!(a.Oi & b) || a.dispatchEvent(Zq(b, c))) && !a.Jc
    }
    n.Hm = function(a) {
        !Ur(a, this.e()) && (this.dispatchEvent("enter") && this.isEnabled() && Tr(this, 2)) && this.Wc(!0)
    };
    n.Gm = function(a) {
        !Ur(a, this.e()) && this.dispatchEvent("leave") && (Tr(this, 4) && this.setActive(!1), Tr(this, 2) && this.Wc(!1))
    };
    n.Nh = fa;

    function Ur(a, b) {
        return !!a.relatedTarget && jd(b, a.relatedTarget)
    }
    n.of = function(a) {
        this.isEnabled() && (Tr(this, 2) && this.Wc(!0), Pg(a) && (Tr(this, 4) && this.setActive(!0), this.U.Rd(this) && this.ab().focus()));
        !this.cj && Pg(a) && a.preventDefault()
    };
    n.pf = function(a) {
        this.isEnabled() && (Tr(this, 2) && this.Wc(!0), this.Rc() && (this.Df(a) && Tr(this, 4)) && this.setActive(!1))
    };
    n.bq = function(a) {
        this.isEnabled() && this.Df(a)
    };
    n.Df = function(a) {
        Tr(this, 16) && Rr(this, !Fr(this, 16));
        Tr(this, 8) && this.no(!0);
        Tr(this, 64) && this.Sa(!Fr(this, 64));
        var b = new Kg("action", this);
        a && (b.altKey = a.altKey, b.ctrlKey = a.ctrlKey, b.metaKey = a.metaKey, b.shiftKey = a.shiftKey, b.On = a.On);
        return this.dispatchEvent(b)
    };
    n.Pj = function() {
        Tr(this, 32) && Qr(this, 32, !0) && this.Sb(32, !0)
    };
    n.nf = function() {
        Tr(this, 4) && this.setActive(!1);
        Tr(this, 32) && Qr(this, 32, !1) && this.Sb(32, !1)
    };
    n.Qc = function(a) {
        return this.R && this.isEnabled() && this.uc(a) ? (a.preventDefault(), a.stopPropagation(), !0) : !1
    };
    n.uc = function(a) {
        return 13 == a.keyCode && this.Df(a)
    };
    if (!la(Mr)) throw Error("Invalid component class " + Mr);
    if (!la(Ar)) throw Error("Invalid renderer class " + Ar);
    var Vr = na(Mr);
    Lr[Vr] = Ar;
    Ir("vl-control", function() {
        return new Mr(null)
    });

    function Wr() {}
    y(Wr, Hr);
    ga(Wr);
    n = Wr.prototype;
    n.sc = ba();
    n.w = function(a) {
        Nr(a, !1);
        a.Id &= -256;
        Sr(a, 32, !1);
        return a.o().w("button", {
            "class": this.me(a).join(" "),
            disabled: !a.isEnabled(),
            title: a.qg() || "",
            value: a.ba() || ""
        }, a.lg() || "")
    };
    n.Gb = function(a) {
        return "BUTTON" == a.tagName || "INPUT" == a.tagName && ("button" == a.type || "submit" == a.type || "reset" == a.type)
    };
    n.la = function(a, b) {
        Nr(a, !1);
        a.Id &= -256;
        Sr(a, 32, !1);
        b.disabled && yc(b, this.zh(1));
        return Wr.c.la.call(this, a, b)
    };
    n.ug = function(a) {
        a.C().g(a.e(), "click", a.Df)
    };
    n.Ke = fa;
    n.Kf = fa;
    n.Rd = function(a) {
        return a.isEnabled()
    };
    n.be = fa;
    n.Sb = function(a, b, c) {
        Wr.c.Sb.call(this, a, b, c);
        (a = a.e()) && 1 == b && (a.disabled = c)
    };
    n.ba = function(a) {
        return a.value
    };
    n.ta = function(a, b) {
        a && (a.value = b)
    };
    n.pc = fa;

    function Xr(a, b, c) {
        Mr.call(this, a, b || Wr.Ja(), c)
    }
    y(Xr, Mr);
    n = Xr.prototype;
    n.ba = e("ub");
    n.ta = function(a) {
        this.ub = a;
        this.U.ta(this.e(), a)
    };
    n.qg = e("Do");
    n.Bd = function(a) {
        this.Do = a;
        this.U.Bd(this.e(), a)
    };
    n.k = function() {
        Xr.c.k.call(this);
        delete this.ub;
        delete this.Do
    };
    n.v = function() {
        Xr.c.v.call(this);
        if (this.Va & 32) {
            var a = this.ab();
            a && this.C().g(a, "keyup", this.uc)
        }
    };
    n.uc = function(a) {
        return 13 == a.keyCode && "key" == a.type || 32 == a.keyCode && "keyup" == a.type ? this.Df(a) : 32 == a.keyCode
    };
    Ir("vl-button", function() {
        return new Xr(null)
    });

    function Yr() {}
    ga(Yr);
    n = Yr.prototype;
    n.sc = ba();

    function Zr(a, b) {
        a && (a.tabIndex = b ? 0 : -1)
    }
    n.w = function(a) {
        return a.o().w("div", this.me(a).join(" "))
    };
    n.va = aa();
    n.Gb = function(a) {
        return "DIV" == a.tagName
    };
    n.la = function(a, b) {
        b.id && a.nb(b.id);
        var c = this.K(),
            d = !1,
            f = xc(b);
        f && z(f, function(b) {
            b == c ? d = !0 : b && (b == c + "-disabled" ? a.Ga(!1) : b == c + "-horizontal" ? $r(a, as) : b == c + "-vertical" && $r(a, bs))
        }, this);
        d || yc(b, c);
        cs(this, a, this.va(b));
        return b
    };

    function cs(a, b, c) {
        if (c)
            for (var d = c.firstChild, f; d && d.parentNode == c;) {
                f = d.nextSibling;
                if (1 == d.nodeType) {
                    var g = a.Ah(d);
                    g && (g.B = d, b.isEnabled() || g.Ga(!1), b.ra(g), g.la(d))
                } else d.nodeValue && "" != Ca(d.nodeValue) || c.removeChild(d);
                d = f
            }
    }
    n.Ah = function(a) {
        return Kr(a)
    };
    n.ug = function(a) {
        a = a.e();
        Nq(a, !0, B);
        A && (a.hideFocus = !0);
        var b = this.sc();
        b && fq(a, b)
    };
    n.ab = function(a) {
        return a.e()
    };
    n.K = l("vl-container");
    n.me = function(a) {
        var b = this.K(),
            c = [b, a.pd == as ? b + "-horizontal" : b + "-vertical"];
        a.isEnabled() || c.push(b + "-disabled");
        return c
    };
    n.Sp = function() {
        return bs
    };

    function ds(a, b, c) {
        Xq.call(this, c);
        this.U = b || Yr.Ja();
        this.pd = a || this.U.Sp()
    }
    y(ds, Xq);
    var as = "horizontal",
        bs = "vertical";
    n = ds.prototype;
    n.cn = null;
    n.xc = null;
    n.U = null;
    n.pd = null;
    n.R = !0;
    n.xa = !0;
    n.hm = !0;
    n.yb = -1;
    n.mb = null;
    n.Wd = !1;
    n.Ws = !1;
    n.vx = !0;
    n.Jd = null;
    n.ab = function() {
        return this.cn || this.U.ab(this)
    };
    n.Ch = function() {
        return this.xc || (this.xc = new nr(this.ab()))
    };
    n.w = function() {
        this.B = this.U.w(this)
    };
    n.va = function() {
        return this.U.va(this.e())
    };
    n.Gb = function(a) {
        return this.U.Gb(a)
    };
    n.$ = function(a) {
        this.B = this.U.la(this, a);
        "none" == a.style.display && (this.R = !1)
    };
    n.v = function() {
        ds.c.v.call(this);
        this.dc(function(a) {
            a.J && es(this, a)
        }, this);
        var a = this.e();
        this.U.ug(this);
        this.ha(this.R, !0);
        this.C().g(this, "enter", this.Cm).g(this, "highlight", this.Dm).g(this, "unhighlight", this.Im).g(this, "open", this.lu).g(this, "close", this.cu).g(a, "mousedown", this.of).g(Vc(a), "mouseup", this.eu).g(a, ["mousedown", "mouseup", "mouseover", "mouseout", "contextmenu"], this.bu);
        this.Rd() && fs(this, !0)
    };

    function fs(a, b) {
        var c = a.C(),
            d = a.ab();
        b ? c.g(d, "focus", a.Pj).g(d, "blur", a.nf).g(a.Ch(), "key", a.Qc) : c.tb(d, "focus", a.Pj).tb(d, "blur", a.nf).tb(a.Ch(), "key", a.Qc)
    }
    n.ga = function() {
        this.Le(-1);
        this.mb && this.mb.Sa(!1);
        this.Wd = !1;
        ds.c.ga.call(this)
    };
    n.k = function() {
        ds.c.k.call(this);
        this.xc && (this.xc.F(), this.xc = null);
        this.U = this.mb = this.Jd = this.cn = null
    };
    n.Cm = l(!0);
    n.Dm = function(a) {
        var b = er(this, a.target);
        if (-1 < b && b != this.yb) {
            var c = cr(this, this.yb);
            c && c.Wc(!1);
            this.yb = b;
            c = cr(this, this.yb);
            this.Wd && c.setActive(!0);
            this.vx && (this.mb && c != this.mb) && (c.Va & 64 ? c.Sa(!0) : this.mb.Sa(!1))
        }
        b = this.e();
        null != a.target.e() && gq(b, "activedescendant", a.target.e().id)
    };
    n.Im = function(a) {
        a.target == cr(this, this.yb) && (this.yb = -1);
        this.e().removeAttribute("aria-activedescendant")
    };
    n.lu = function(a) {
        (a = a.target) && (a != this.mb && a.getParent() == this) && (this.mb && this.mb.Sa(!1), this.mb = a)
    };
    n.cu = function(a) {
        a.target == this.mb && (this.mb = null)
    };
    n.of = function(a) {
        this.xa && (this.Wd = !0);
        var b = this.ab();
        b && qd(b) ? b.focus() : a.preventDefault()
    };
    n.eu = function() {
        this.Wd = !1
    };
    n.bu = function(a) {
        var b;
        a: {
            b = a.target;
            if (this.Jd)
                for (var c = this.e(); b && b !== c;) {
                    var d = b.id;
                    if (d in this.Jd) {
                        b = this.Jd[d];
                        break a
                    }
                    b = b.parentNode
                }
            b = null
        }
        if (b) switch (a.type) {
            case "mousedown":
                b.of(a);
                break;
            case "mouseup":
                b.pf(a);
                break;
            case "mouseover":
                b.Hm(a);
                break;
            case "mouseout":
                b.Gm(a);
                break;
            case "contextmenu":
                b.Nh(a)
        }
    };
    n.Pj = ba();
    n.nf = function() {
        this.Le(-1);
        this.Wd = !1;
        this.mb && this.mb.Sa(!1)
    };
    n.Qc = function(a) {
        return this.isEnabled() && this.R && (0 != br(this) || this.cn) && this.uc(a) ? (a.preventDefault(), a.stopPropagation(), !0) : !1
    };
    n.uc = function(a) {
        var b = cr(this, this.yb);
        if (b && "function" == typeof b.Qc && b.Qc(a) || this.mb && this.mb != b && "function" == typeof this.mb.Qc && this.mb.Qc(a)) return !0;
        if (a.shiftKey || a.ctrlKey || a.metaKey || a.altKey) return !1;
        switch (a.keyCode) {
            case 27:
                if (this.Rd()) this.ab().blur();
                else return !1;
                break;
            case 36:
                gs(this);
                break;
            case 35:
                hs(this);
                break;
            case 38:
                if (this.pd == bs) is(this);
                else return !1;
                break;
            case 37:
                if (this.pd == as) dr(this) ? js(this) : is(this);
                else return !1;
                break;
            case 40:
                if (this.pd == bs) js(this);
                else return !1;
                break;
            case 39:
                if (this.pd == as) dr(this) ? is(this) : js(this);
                else return !1;
                break;
            default:
                return !1
        }
        return !0
    };

    function es(a, b) {
        var c = b.e(),
            c = c.id || (c.id = b.j());
        a.Jd || (a.Jd = {});
        a.Jd[c] = b
    }
    n.ra = function(a, b) {
        ds.c.ra.call(this, a, b)
    };
    n.Hd = function(a, b, c) {
        a.Oi |= 2;
        a.Oi |= 64;
        !this.Rd() && this.Ws || Sr(a, 32, !1);
        Nr(a, !1);
        ds.c.Hd.call(this, a, b, c);
        a.J && this.J && es(this, a);
        b <= this.yb && this.yb++
    };
    n.removeChild = function(a, b) {
        if (a = v(a) ? $q(this, a) : a) {
            var c = er(this, a); - 1 != c && (c == this.yb ? a.Wc(!1) : c < this.yb && this.yb--);
            (c = a.e()) && (c.id && this.Jd) && Nc(this.Jd, c.id)
        }
        a = ds.c.removeChild.call(this, a, b);
        Nr(a, !0);
        return a
    };

    function $r(a, b) {
        if (a.e()) throw Error("Component already rendered");
        a.pd = b
    }
    n.ha = function(a, b) {
        if (b || this.R != a && this.dispatchEvent(a ? "show" : "hide")) {
            this.R = a;
            var c = this.e();
            c && (Lq(c, a), this.Rd() && Zr(this.ab(), this.xa && this.R), b || this.dispatchEvent(this.R ? "aftershow" : "afterhide"));
            return !0
        }
        return !1
    };
    n.isEnabled = e("xa");
    n.Ga = function(a) {
        this.xa != a && this.dispatchEvent(a ? "enable" : "disable") && (a ? (this.xa = !0, this.dc(function(a) {
            a.As ? delete a.As : a.Ga(!0)
        })) : (this.dc(function(a) {
            a.isEnabled() ? a.Ga(!1) : a.As = !0
        }), this.Wd = this.xa = !1), this.Rd() && Zr(this.ab(), a && this.R))
    };
    n.Rd = e("hm");
    n.be = function(a) {
        a != this.hm && this.J && fs(this, a);
        this.hm = a;
        this.xa && this.R && Zr(this.ab(), a)
    };
    n.Le = function(a) {
        (a = cr(this, a)) ? a.Wc(!0): -1 < this.yb && cr(this, this.yb).Wc(!1)
    };
    n.Wc = function(a) {
        this.Le(er(this, a))
    };

    function gs(a) {
        ks(a, function(a, c) {
            return (a + 1) % c
        }, br(a) - 1)
    }

    function hs(a) {
        ks(a, function(a, c) {
            a--;
            return 0 > a ? c - 1 : a
        }, 0)
    }

    function js(a) {
        ks(a, function(a, c) {
            return (a + 1) % c
        }, a.yb)
    }

    function is(a) {
        ks(a, function(a, c) {
            a--;
            return 0 > a ? c - 1 : a
        }, a.yb)
    }

    function ks(a, b, c) {
        c = 0 > c ? er(a, a.mb) : c;
        var d = br(a);
        c = b.call(a, c, d);
        for (var f = 0; f <= d;) {
            var g = cr(a, c);
            if (g && a.ep(g)) {
                a.Le(c);
                break
            }
            f++;
            c = b.call(a, c, d)
        }
    }
    n.ep = function(a) {
        return a.R && a.isEnabled() && !!(a.Va & 2)
    };

    function ls() {}
    y(ls, Ar);
    ga(ls);
    ls.prototype.K = l("vl-menuheader");

    function ms(a, b, c) {
        Mr.call(this, a, c || ls.Ja(), b);
        Sr(this, 1, !1);
        Sr(this, 2, !1);
        Sr(this, 4, !1);
        Sr(this, 32, !1);
        this.nc = 1
    }
    y(ms, Mr);
    Ir("vl-menuheader", function() {
        return new ms(null)
    });

    function ns() {
        this.gp = []
    }
    y(ns, Ar);
    ga(ns);

    function os(a, b) {
        var c = a.gp[b];
        if (!c) {
            switch (b) {
                case 0:
                    c = a.K() + "-highlight";
                    break;
                case 1:
                    c = a.K() + "-checkbox";
                    break;
                case 2:
                    c = a.K() + "-content"
            }
            a.gp[b] = c
        }
        return c
    }
    n = ns.prototype;
    n.sc = l("menuitem");
    n.w = function(a) {
        var b = a.o().w("div", this.me(a).join(" "), ps(this, a.ka, a.o()));
        qs(this, a, b, !!(a.Va & 8) || !!(a.Va & 16));
        Cr(this, a, b);
        return b
    };
    n.va = function(a) {
        return a && a.firstChild
    };
    n.la = function(a, b) {
        var c = id(b),
            d = os(this, 2);
        c && hb(xc(c), d) || b.appendChild(ps(this, b.childNodes, a.o()));
        hb(xc(b), "vl-option") && (a.Xk(!0), this.Xk(a, b, !0));
        return ns.c.la.call(this, a, b)
    };
    n.Rb = function(a, b) {
        var c = this.va(a),
            d = rs(this, a) ? c.firstChild : null;
        ns.c.Rb.call(this, a, b);
        d && !rs(this, a) && c.insertBefore(d, c.firstChild || null)
    };

    function ps(a, b, c) {
        a = os(a, 2);
        return c.w("div", a, b)
    }
    n.Xk = function(a, b, c) {
        b && (fq(b, c ? "menuitemcheckbox" : this.sc()), qs(this, a, b, c))
    };

    function rs(a, b) {
        var c = a.va(b);
        if (c) {
            var c = c.firstChild,
                d = os(a, 1);
            return !!c && hb(xc(c), d)
        }
        return !1
    }

    function qs(a, b, c, d) {
        d != rs(a, c) && (Dc(c, "vl-option", d), c = a.va(c), d ? (a = os(a, 1), c.insertBefore(b.o().w("div", a), c.firstChild || null)) : c.removeChild(c.firstChild))
    }
    n.zh = function(a) {
        switch (a) {
            case 2:
                return os(this, 0);
            case 16:
            case 8:
                return "vl-option-selected";
            default:
                return ns.c.zh.call(this, a)
        }
    };
    n.wm = function(a) {
        var b = os(this, 0);
        switch (a) {
            case "vl-option-selected":
                return 16;
            case b:
                return 2;
            default:
                return ns.c.wm.call(this, a)
        }
    };
    n.K = l("vl-menuitem");

    function ss(a, b, c, d) {
        Mr.call(this, a, d || ns.Ja(), c);
        this.ta(b)
    }
    y(ss, Mr);
    n = ss.prototype;
    n.ba = function() {
        var a = this.pn;
        return null != a ? a : this.lg()
    };
    n.ta = ca("pn");
    n.Xk = function(a) {
        Sr(this, 16, a);
        var b = this.e();
        b && this.U.Xk(this, b, a)
    };
    n.lg = function() {
        var a = this.ka;
        return ia(a) ? (a = cb(a, function(a) {
            var c = xc(a);
            return hb(c, "vl-menuitem-accel") || hb(c, "vl-menuitem-mnemonic-separator") ? "" : ud(a)
        }).join(""), Ba(a)) : ss.c.lg.call(this)
    };
    n.pf = function(a) {
        var b = this.getParent();
        if (b) {
            var c = b.wr;
            b.wr = null;
            if (b = c && ka(a.clientX)) b = new E(a.clientX, a.clientY), b = c == b ? !0 : c && b ? c.x == b.x && c.y == b.y : !1;
            if (b) return
        }
        ss.c.pf.call(this, a)
    };
    n.uc = function(a) {
        return a.keyCode == this.Pq && this.Df(a) ? !0 : ss.c.uc.call(this, a)
    };
    n.Tt = e("Pq");
    Ir("vl-menuitem", function() {
        return new ss(null)
    });

    function ts() {}
    y(ts, Ar);
    ga(ts);
    ts.prototype.w = function(a) {
        return a.o().w("div", this.K())
    };
    ts.prototype.la = function(a, b) {
        b.id && a.nb(b.id);
        if ("HR" == b.tagName) {
            var c = b;
            b = this.w(a);
            c.parentNode && c.parentNode.insertBefore(b, c);
            hd(c)
        } else yc(b, this.K());
        return b
    };
    ts.prototype.Rb = ba();
    ts.prototype.K = l("vl-menuseparator");

    function us(a, b) {
        Mr.call(this, null, a || ts.Ja(), b);
        Sr(this, 1, !1);
        Sr(this, 2, !1);
        Sr(this, 4, !1);
        Sr(this, 32, !1);
        this.nc = 1
    }
    y(us, Mr);
    us.prototype.v = function() {
        us.c.v.call(this);
        var a = this.e();
        fq(a, "separator")
    };
    Ir("vl-menuseparator", function() {
        return new us
    });

    function vs() {}
    y(vs, Yr);
    ga(vs);
    n = vs.prototype;
    n.sc = l("menu");
    n.Gb = function(a) {
        return "UL" == a.tagName || vs.c.Gb.call(this, a)
    };
    n.Ah = function(a) {
        return "HR" == a.tagName ? new us : vs.c.Ah.call(this, a)
    };
    n.af = function(a, b) {
        return jd(a.e(), b)
    };
    n.K = l("vl-menu");
    n.ug = function(a) {
        vs.c.ug.call(this, a);
        a = a.e();
        gq(a, "haspopup", "true")
    };
    Ir("vl-menuseparator", function() {
        return new us
    });

    function ws(a, b) {
        ds.call(this, bs, b || vs.Ja(), a);
        this.be(!1)
    }
    y(ws, ds);
    n = ws.prototype;
    n.Bl = !0;
    n.Xs = !1;
    n.K = function() {
        return this.U.K()
    };
    n.af = function(a) {
        if (this.U.af(this, a)) return !0;
        for (var b = 0, c = br(this); b < c; b++) {
            var d = cr(this, b);
            if ("function" == typeof d.af && d.af(a)) return !0
        }
        return !1
    };
    n.Ve = function(a) {
        this.ra(a, !0)
    };
    n.Yf = function(a, b) {
        this.Hd(a, b, !0)
    };
    n.removeItem = function(a) {
        (a = this.removeChild(a, !0)) && a.F()
    };
    n.Bh = function(a) {
        return cr(this, a)
    };
    n.qm = function() {
        return br(this)
    };
    n.ha = function(a, b, c) {
        (b = ws.c.ha.call(this, a, b)) && (a && this.J && this.Bl) && this.ab().focus();
        this.wr = a && c && ka(c.clientX) ? new E(c.clientX, c.clientY) : null;
        return b
    };
    n.Cm = function(a) {
        this.Bl && this.ab().focus();
        return ws.c.Cm.call(this, a)
    };
    n.ep = function(a) {
        return (this.Xs || a.isEnabled()) && a.R && !!(a.Va & 2)
    };
    n.$ = function(a) {
        var b = this.U,
            c;
        c = this.o();
        c = Wc(c.fa, "div", b.K() + "-content", a);
        for (var d = c.length, f = 0; f < d; f++) cs(b, this, c[f]);
        ws.c.$.call(this, a)
    };
    n.uc = function(a) {
        var b = ws.c.uc.call(this, a);
        b || this.dc(function(c) {
            !b && (c.Tt && c.Pq == a.keyCode) && (this.isEnabled() && this.Wc(c), b = c.Qc(a))
        }, this);
        return b
    };
    n.Le = function(a) {
        ws.c.Le.call(this, a);
        if (a = cr(this, a)) {
            var b = a.e();
            a = this.e();
            var c = Bq(b),
                d = Bq(a),
                f = Qq(a),
                g = c.x - d.x - f.left,
                c = c.y - d.y - f.top,
                d = a.clientHeight - b.offsetHeight,
                f = a.scrollLeft,
                h = a.scrollTop,
                f = f + Math.min(g, Math.max(g - (a.clientWidth - b.offsetWidth), 0)),
                h = h + Math.min(c, Math.max(c - d, 0)),
                b = new E(f, h);
            a.scrollLeft = b.x;
            a.scrollTop = b.y
        }
    };

    function xs() {}
    y(xs, Hr);
    ga(xs);
    n = xs.prototype;
    n.w = function(a) {
        var b = {
                "class": "vl-inline-block " + this.me(a).join(" ")
            },
            b = a.o().w("div", b, this.kh(a.ka, a.o()));
        this.Bd(b, a.qg());
        Cr(this, a, b);
        return b
    };
    n.sc = l("button");
    n.va = function(a) {
        return a && a.firstChild.firstChild
    };
    n.kh = function(a, b) {
        return b.w("div", "vl-inline-block " + (this.K() + "-outer-box"), b.w("div", "vl-inline-block " + (this.K() + "-inner-box"), a))
    };
    n.Gb = function(a) {
        return "DIV" == a.tagName
    };
    n.la = function(a, b) {
        ys(b, !0);
        ys(b, !1);
        var c;
        a: {
            c = a.o().Tp(b);
            var d = this.K() + "-outer-box";
            if (c && hb(xc(c), d) && (c = a.o().Tp(c), d = this.K() + "-inner-box", c && hb(xc(c), d))) {
                c = !0;
                break a
            }
            c = !1
        }
        c || b.appendChild(this.kh(b.childNodes, a.o()));
        yc(b, "vl-inline-block", this.K());
        return xs.c.la.call(this, a, b)
    };
    n.K = l("vl-custom-button");

    function ys(a, b) {
        if (a)
            for (var c = b ? a.firstChild : a.lastChild, d; c && c.parentNode == a;) {
                d = b ? c.nextSibling : c.previousSibling;
                if (3 == c.nodeType) {
                    var f = c.nodeValue;
                    if ("" == Ca(f)) a.removeChild(c);
                    else {
                        c.nodeValue = b ? f.replace(/^[\s\xa0]+/, "") : Da(f);
                        break
                    }
                } else break;
                c = d
            }
    };

    function zs() {}
    y(zs, xs);
    ga(zs);
    B && (zs.prototype.Rb = function(a, b) {
        var c = zs.c.va.call(this, a && a.firstChild);
        if (c) {
            var d = this.createCaption(b, Tc(a)),
                f = c.parentNode;
            f && f.replaceChild(d, c)
        }
    });
    n = zs.prototype;
    n.va = function(a) {
        a = zs.c.va.call(this, a && a.firstChild);
        B && (a && a.__goog_wrapper_div) && (a = a.firstChild);
        return a
    };
    n.pc = function(a, b, c) {
        64 != b && zs.c.pc.call(this, a, b, c)
    };
    n.la = function(a, b) {
        var c = Wc(document, "*", "vl-menu", b)[0];
        if (c) {
            Lq(c, !1);
            Vc(c).body.appendChild(c);
            var d = new ws;
            d.la(c);
            a.Hi(d)
        }
        return zs.c.la.call(this, a, b)
    };
    n.kh = function(a, b) {
        return zs.c.kh.call(this, [this.createCaption(a, b), b.w("div", "vl-inline-block " + (this.K() + "-dropdown"), " ")], b)
    };
    n.createCaption = function(a, b) {
        return b.w("div", "vl-inline-block " + (this.K() + "-caption"), a)
    };
    n.K = l("vl-menu-button");

    function As(a, b, c, d) {
        Xr.call(this, a, c || zs.Ja(), d);
        Sr(this, 64, !0);
        this.uk = new zr(null, 5);
        b && this.Hi(b);
        this.av = null;
        this.da = new ph(500);
        !bj && !cj || D("533.17.9") || (this.ck = !0)
    }
    y(As, Xr);
    n = As.prototype;
    n.ck = !1;
    n.Jx = !1;
    n.v = function() {
        As.c.v.call(this);
        this.N && Bs(this, this.N, !0);
        gq(this.B, "haspopup", !!this.N)
    };
    n.ga = function() {
        As.c.ga.call(this);
        if (this.N) {
            this.Sa(!1);
            this.N.ga();
            Bs(this, this.N, !1);
            var a = this.N.e();
            a && hd(a)
        }
    };
    n.k = function() {
        As.c.k.call(this);
        this.N && (this.N.F(), delete this.N);
        delete this.zr;
        this.da.F()
    };
    n.of = function(a) {
        As.c.of.call(this, a);
        this.Rc() && (this.Sa(!Fr(this, 64), a), this.N && (this.N.Wd = Fr(this, 64)))
    };
    n.pf = function(a) {
        As.c.pf.call(this, a);
        this.N && !this.Rc() && (this.N.Wd = !1)
    };
    n.Df = function() {
        this.setActive(!1);
        return !0
    };
    n.du = function(a) {
        this.N && (this.N.R && !this.af(a.target)) && this.Sa(!1)
    };
    n.af = function(a) {
        return a && jd(this.e(), a) || this.N && this.N.af(a) || !1
    };
    n.uc = function(a) {
        if (32 == a.keyCode) {
            if (a.preventDefault(), "keyup" != a.type) return !0
        } else if ("key" != a.type) return !1;
        if (this.N && this.N.R) {
            var b = this.N.Qc(a);
            return 27 == a.keyCode ? (this.Sa(!1), !0) : b
        }
        return 40 == a.keyCode || 38 == a.keyCode || 32 == a.keyCode || 13 == a.keyCode ? (this.Sa(!0), !0) : !1
    };
    n.Em = function() {
        this.Sa(!1)
    };
    n.ju = function() {
        this.Rc() || this.Sa(!1)
    };
    n.nf = function(a) {
        this.ck || this.Sa(!1);
        As.c.nf.call(this, a)
    };

    function Cs(a) {
        a.N || a.Hi(new ws(a.o()));
        return a.N || null
    }
    n.Hi = function(a) {
        var b = this.N;
        if (a != b && (b && (this.Sa(!1), this.J && Bs(this, b, !1), delete this.N), this.J && gq(this.B, "haspopup", !!a), a)) {
            this.N = a;
            a.Jf(this);
            a.ha(!1);
            var c = this.ck;
            (a.Bl = c) && a.be(!0);
            this.J && Bs(this, a, !0)
        }
        return b
    };

    function Ds(a, b) {
        a.zr = b;
        Es(a)
    }
    n.Ve = function(a) {
        Cs(this).ra(a, !0)
    };
    n.Yf = function(a, b) {
        Cs(this).Hd(a, b, !0)
    };
    n.removeItem = function(a) {
        (a = Cs(this).removeChild(a, !0)) && a.F()
    };
    n.Bh = function(a) {
        return this.N ? cr(this.N, a) : null
    };
    n.qm = function() {
        return this.N ? br(this.N) : 0
    };
    n.ha = function(a, b) {
        var c = As.c.ha.call(this, a, b);
        c && !this.R && this.Sa(!1);
        return c
    };
    n.Ga = function(a) {
        As.c.Ga.call(this, a);
        this.isEnabled() || this.Sa(!1)
    };
    n.Sa = function(a, b) {
        As.c.Sa.call(this, a);
        if (this.N && Fr(this, 64) == a) {
            if (a) this.N.J || (this.Jx ? this.N.Qb(this.e().parentNode) : this.N.Qb()), this.Uf = Aq(this.e()), this.cp = Jq(this.e()), Es(this), this.N.Le(-1);
            else {
                this.setActive(!1);
                this.N.Wd = !1;
                var c = this.e();
                c && gq(c, "activedescendant", "");
                null != this.Ek && (this.Ek = void 0, (c = this.N.e()) && Dq(c, "", ""))
            }
            this.N.ha(a, !1, b);
            if (!this.Jc) {
                var c = this.C(),
                    d = a ? c.g : c.tb;
                d.call(c, vd(this.o()), "mousedown", this.du, !0);
                this.ck && d.call(c, this.N, "blur", this.ju);
                d.call(c, this.da,
                    qh, this.ax);
                a ? this.da.start() : this.da.stop()
            }
        }
    };

    function Es(a) {
        if (a.N.J) {
            var b = a.zr || a.e(),
                c = a.uk;
            a.uk.element = b;
            b = a.N.e();
            a.N.R || (b.style.visibility = "hidden", Lq(b, !0));
            !a.Ek && (a.uk.Ot && a.uk.hk & 32) && (a.Ek = Hq(b));
            c.Fe(b, c.qj ^ 1, a.av, a.Ek);
            a.N.R || (Lq(b, !1), b.style.visibility = "visible")
        }
    }
    n.ax = function() {
        var a = Jq(this.e()),
            b = Aq(this.e());
        oq(this.cp, a) && (this.Uf == b || this.Uf && b && this.Uf.top == b.top && this.Uf.right == b.right && this.Uf.bottom == b.bottom && this.Uf.left == b.left) || (this.cp = a, this.Uf = b, Es(this))
    };

    function Bs(a, b, c) {
        var d = a.C();
        c = c ? d.g : d.tb;
        c.call(d, b, "action", a.Em);
        c.call(d, b, "highlight", a.Dm);
        c.call(d, b, "unhighlight", a.Im)
    }
    n.Dm = function(a) {
        var b = this.e();
        null != a.target.e() && gq(b, "activedescendant", a.target.e().id)
    };
    n.Im = function() {
        if (!cr(this.N, this.N.yb)) {
            var a = this.e();
            gq(a, "activedescendant", "")
        }
    };
    Ir("vl-menu-button", function() {
        return new As(null)
    });

    function Fs() {}
    y(Fs, zs);
    ga(Fs);
    Fs.prototype.va = function(a) {
        return a ? Wc(document, "*", this.K() + "-caption", a)[0] : null
    };
    Fs.prototype.Gb = function(a) {
        return "DIV" == a.tagName
    };
    Fs.prototype.kh = function(a, b) {
        var c = this.K();
        return b.w("div", "vl-inline-block ", b.w("div", [c + "-caption", "vl-inline-block"], a), b.w("div", [c + "-dropdown", "vl-inline-block"]))
    };
    Fs.prototype.K = l("vl-css3-button");
    Ir("vl-css3-menu-button", function() {
        return new As(null, null, Fs.Ja())
    });

    function Gs(a, b, c, d, f) {
        Xq.call(this, f);
        this.width = a;
        this.height = b;
        this.cf = c || null;
        this.Rl = d || null
    }
    y(Gs, Xq);
    n = Gs.prototype;
    n.jh = null;
    n.oj = 0;
    n.pj = 0;
    n.Pc = function() {
        return this.kf()
    };
    n.kf = function() {
        return this.J ? Gq(this.e()) : ka(this.width) && ka(this.height) ? new Fc(this.width, this.height) : null
    };

    function Hs(a) {
        var b = a.kf();
        return b ? b.width / (a.cf ? new Fc(a.cf, a.Rl) : a.kf()).width : 0
    };

    function Is(a, b) {
        O.call(this);
        this.B = a;
        this.Bm = b;
        this[Qg] = !1
    }
    y(Is, O);
    n = Is.prototype;
    n.Bm = null;
    n.B = null;
    n.e = e("B");
    n.addEventListener = function(a, b, c, d) {
        Zg(this.B, a, b, c, d)
    };
    n.removeEventListener = function(a, b, c, d) {
        eh(this.B, a, b, c, d)
    };
    n.k = function() {
        Is.c.k.call(this);
        ih(this.B)
    };

    function Js(a, b, c, d) {
        Is.call(this, a, b);
        this.cy = c;
        a = this.Bm;
        b = this.e();
        c ? (b.setAttribute("stroke", c.kt), c = c.Lh(), v(c) && -1 != c.indexOf("px") ? b.setAttribute("stroke-width", parseFloat(c) / Hs(a)) : b.setAttribute("stroke-width", c)) : b.setAttribute("stroke", "none");
        this.fill = d;
        c = this.Bm;
        a = this.e();
        if (d instanceof Ks) {
            b = "lg-" + d.Bs + "-" + d.Ds + "-" + d.Cs + "-" + d.Es + "-" + d.jp + "-" + d.kp;
            var f = b in c.df ? c.df[b] : null;
            if (!f) {
                var f = Ls(c, "linearGradient", {
                        x1: d.Bs,
                        y1: d.Ds,
                        x2: d.Cs,
                        y2: d.Es,
                        gradientUnits: "userSpaceOnUse"
                    }),
                    g = "stop-color:" +
                    d.jp;
                ka(d.ur) && (g += ";stop-opacity:" + d.ur);
                g = Ls(c, "stop", {
                    offset: "0%",
                    style: g
                });
                f.appendChild(g);
                g = "stop-color:" + d.kp;
                ka(d.vr) && (g += ";stop-opacity:" + d.vr);
                d = Ls(c, "stop", {
                    offset: "100%",
                    style: g
                });
                f.appendChild(d);
                b in c.df ? f = c.df[b] : (d = "_svgdef_" + Ms++, f.setAttribute("id", d), c.df[b] = d, c.uj.appendChild(f), f = d)
            }
            a.setAttribute("fill", "url(#" + f + ")")
        } else a.setAttribute("fill", "none")
    }
    y(Js, Is);
    Js.prototype.fill = null;
    Js.prototype.cy = null;

    function Ns(a, b) {
        Is.call(this, a, b)
    }
    y(Ns, Is);

    function Os(a, b, c, d) {
        Js.call(this, a, b, c, d)
    }
    y(Os, Js);

    function Ps() {};

    function Ks(a, b, c, d, f, g, h, k) {
        this.Bs = a;
        this.Ds = b;
        this.Cs = c;
        this.Es = d;
        this.jp = f;
        this.kp = g;
        this.ur = t(h) ? h : null;
        this.vr = t(k) ? k : null
    }
    y(Ks, Ps);

    function Qs(a, b) {
        this.ny = a;
        this.kt = b
    }
    Qs.prototype.Lh = e("ny");

    function Rs(a, b) {
        Is.call(this, a, b)
    }
    y(Rs, Ns);
    Rs.prototype.clear = function() {
        gd(this.e())
    };

    function Ss(a, b, c, d) {
        Js.call(this, a, b, c, d)
    }
    y(Ss, Os);

    function Ts(a, b, c, d, f) {
        Gs.call(this, a, b, c, d, f);
        this.df = {};
        this.Io = C && !D(526);
        this.fc = new Gh(this)
    }
    var Us;
    y(Ts, Gs);
    var Ms = 0;

    function Ls(a, b, c) {
        a = a.xb.fa.createElementNS("http://www.w3.org/2000/svg", b);
        if (c)
            for (var d in c) a.setAttribute(d, c[d]);
        return a
    }
    n = Ts.prototype;
    n.w = function() {
        var a = Ls(this, "svg", {
                width: this.width,
                height: this.height,
                overflow: "hidden"
            }),
            b = Ls(this, "g");
        this.uj = Ls(this, "defs");
        this.jh = new Rs(b, this);
        a.appendChild(this.uj);
        a.appendChild(b);
        this.B = a;
        if (this.cf || this.oj || this.pj) this.e().setAttribute("preserveAspectRatio", "none"), this.Io ? this.ml() : this.e().setAttribute("viewBox", this.oj + " " + this.pj + " " + (this.cf ? this.cf + " " + this.Rl : ""))
    };
    n.ml = function() {
        if (this.J && (this.cf || this.oj || !this.pj)) {
            var a = this.kf();
            if (0 == a.width) this.e().style.visibility = "hidden";
            else {
                this.e().style.visibility = "";
                var b = -this.oj,
                    c = -this.pj,
                    d = a.width / this.cf,
                    a = a.height / this.Rl;
                this.jh.e().setAttribute("transform", "scale(" + d + " " + a + ") translate(" + b + " " + c + ")")
            }
        }
    };
    n.kf = function() {
        if (!B) return this.J ? Gq(this.e()) : Ts.c.kf.call(this);
        var a = this.width,
            b = this.height,
            c = v(a) && -1 != a.indexOf("%"),
            d = v(b) && -1 != b.indexOf("%");
        if (!this.J && (c || d)) return null;
        var f, g;
        c && (f = this.e().parentNode, g = Hq(f), a = parseFloat(a) * g.width / 100);
        d && (f = f || this.e().parentNode, g = g || Hq(f), b = parseFloat(b) * g.height / 100);
        return new Fc(a, b)
    };
    n.clear = function() {
        this.jh.clear();
        gd(this.uj);
        this.df = {}
    };
    n.v = function() {
        var a = this.kf();
        Ts.c.v.call(this);
        a || this.dispatchEvent("resize");
        if (this.Io) {
            var a = this.width,
                b = this.height;
            "string" == typeof a && (-1 != a.indexOf("%") && "string" == typeof b && -1 != b.indexOf("%")) && this.fc.g(Vs(), qh, this.ml);
            this.ml()
        }
    };
    n.ga = function() {
        Ts.c.ga.call(this);
        this.Io && this.fc.tb(Vs(), qh, this.ml)
    };
    n.k = function() {
        delete this.df;
        delete this.uj;
        delete this.jh;
        Ts.c.k.call(this)
    };

    function Vs() {
        Us || (Us = new ph(400), Us.start());
        return Us
    };
    try {
        eval("document.namespaces")
    } catch (Ws) {};

    function Xs(a, b) {
        this.size = a;
        this.At = b
    }
    Xs.prototype.bold = !1;
    Xs.prototype.Pu = !1;

    function Ys() {}
    y(Ys, Ar);
    ga(Ys);
    n = Ys.prototype;
    n.sc = ba();
    n.la = function(a, b) {
        Nr(a, !1);
        a.Id &= -256;
        Sr(a, 32, !1);
        Ys.c.la.call(this, a, b);
        a.Rb(b.value);
        return b
    };
    n.w = function(a) {
        Nr(a, !1);
        a.Id &= -256;
        Sr(a, 32, !1);
        return a.o().w("textarea", {
            "class": this.me(a).join(" "),
            disabled: !a.isEnabled()
        }, a.ka || "")
    };
    n.Gb = function(a) {
        return "TEXTAREA" == a.tagName
    };
    n.Kf = fa;
    n.Rd = function(a) {
        return a.isEnabled()
    };
    n.be = fa;
    n.Sb = function(a, b, c) {
        Ys.c.Sb.call(this, a, b, c);
        (a = a.e()) && 1 == b && (a.disabled = c)
    };
    n.pc = fa;
    n.Rb = function(a, b) {
        a && (a.value = b)
    };
    n.K = l("vl-textarea");

    function Zs(a, b, c) {
        Mr.call(this, a, b || Ys.Ja(), c);
        Nr(this, !1);
        this.Ke(!0);
        a || (this.ka = "")
    }
    y(Zs, Mr);
    var $s = B || C;
    n = Zs.prototype;
    n.wg = !1;
    n.qe = 0;
    n.Jq = 0;
    n.Nq = 0;
    n.gq = !1;
    n.wk = !1;
    n.$n = !1;
    n.Zn = !1;

    function at(a) {
        return a.ti.top + a.ti.bottom + a.bp.top + a.bp.bottom
    }

    function bt(a) {
        var b = a.Nq,
            c = a.e();
        b && (c && a.wk) && (b -= at(a));
        return b
    }

    function ct(a) {
        var b = a.Jq,
            c = a.e();
        b && (c && a.wk) && (b -= at(a));
        return b
    }
    n.ta = function(a) {
        this.Rb(String(a))
    };
    n.ba = function() {
        return this.e().value
    };
    n.Rb = function(a) {
        Zs.c.Rb.call(this, a);
        this.e() && this.sg()
    };
    n.Ga = function(a) {
        Zs.c.Ga.call(this, a);
        this.e().disabled = !a
    };
    n.v = function() {
        Zs.c.v.call(this);
        var a = this.e();
        pq(a, {
            overflowY: "hidden",
            overflowX: "auto",
            boxSizing: "border-box",
            MsBoxSizing: "border-box",
            WebkitBoxSizing: "border-box",
            MozBoxSizing: "border-box"
        });
        this.ti = Pq(a);
        this.bp = Qq(a);
        this.C().g(a, "scroll", this.sg).g(a, "focus", this.sg).g(a, "keyup", this.sg).g(a, "mouseup", this.dv);
        this.e() && this.sg()
    };

    function dt(a) {
        if (!a.gq) {
            var b = a.e().cloneNode(!1);
            pq(b, {
                position: "absolute",
                height: "auto",
                top: "-9999px",
                margin: "0",
                padding: "1px",
                border: "1px solid #000",
                overflow: "hidden"
            });
            vd(a.o()).body.appendChild(b);
            var c = b.scrollHeight;
            b.style.padding = "10px";
            var d = b.scrollHeight;
            a.$n = d > c;
            b.style.borderWidth = "10px";
            a.Zn = b.scrollHeight > d;
            b.style.height = "100px";
            100 != b.offsetHeight && (a.wk = !0);
            hd(b);
            a.gq = !0
        }
        var b = a.e(),
            c = a.e().scrollHeight,
            f = a.e(),
            d = f.offsetHeight - f.clientHeight;
        if (!a.$n) var g = a.ti,
            d = d - (g.top + g.bottom);
        a.Zn || (f = Qq(f), d -= f.top + f.bottom);
        c += 0 < d ? d : 0;
        a.wk ? c -= at(a) : (a.$n || (d = a.ti, c += d.top + d.bottom), a.Zn || (a = Qq(b), c += a.top + a.bottom));
        return c
    }

    function et(a, b) {
        a.qe != b && (a.qe = b, a.e().style.height = b + "px")
    }

    function ft(a) {
        a = a.e();
        a.style.height = "auto";
        var b = a.value.match(/\n/g) || [];
        a.rows = b.length + 1
    }
    n.sg = function() {
        if (!this.wg) {
            var a = !1;
            this.wg = !0;
            var b = this.e(),
                c = this.qe;
            if (b.scrollHeight) {
                var d = !1,
                    f = !1,
                    g = dt(this),
                    h = b.offsetHeight,
                    k = bt(this),
                    m = ct(this);
                k && g < k ? (et(this, k), d = !0) : m && g > m ? (et(this, m), b.style.overflowY = "", f = !0) : h != g ? et(this, g) : this.qe || (this.qe = g);
                d || (f || !$s) || (a = !0)
            } else ft(this);
            this.wg = !1;
            a && (a = this.e(), this.wg || (this.wg = !0, (d = a.scrollHeight) ? (f = dt(this), b = bt(this), g = ct(this), b && f <= b || g && f >= g || (g = this.ti, a.style.paddingBottom = g.bottom + 1 + "px", dt(this) == f && (a.style.paddingBottom =
                g.bottom + d + "px", a.scrollTop = 0, d = dt(this) - d, d >= b ? et(this, d) : et(this, b)), a.style.paddingBottom = g.bottom + "px")) : ft(this), this.wg = !1));
            c != this.qe && this.dispatchEvent("resize")
        }
    };
    n.dv = function() {
        var a = this.e(),
            b = a.offsetHeight;
        a.filters && a.filters.length && (a = a.filters.item("DXImageTransform.Microsoft.DropShadow")) && (b -= a.offX);
        b != this.qe && (this.qe = this.Nq = b)
    };

    function gt(a, b, c, d) {
        Mr.call(this, "", null, d);
        this.ca = a;
        this.D = null;
        this.xa = !0;
        null != b && (this.xa = b);
        this.pq = c;
        this.Ei = this.Db = null;
        this.Um = "";
        this.Am = new nr;
        Pr(this, "vl-msg-input")
    }
    y(gt, Mr);
    n = gt.prototype;
    n.Yr = function(a) {
        this.D = a;
        this.Db && this.J && this.Db.Rb(a.Dp)
    };
    n.Ux = function(a) {
        this.ca.qb(a).n(function(a) {
            this.Yr(a)
        }, this)
    };
    n.w = function() {
        gt.c.w.call(this);
        this.lh()
    };
    n.lh = function() {
        var a = this.Db = new Zs("", null, this.o());
        a.Jq = 300;
        a.e() && a.sg();
        this.ra(this.Db, !0);
        this.Ei = new Xr("Send", null, this.o());
        Pr(this.Ei, "vl-textarea-submit");
        this.ra(this.Ei, !0)
    };
    n.v = function() {
        Nr(this, !1);
        gt.c.v.call(this);
        this.C().g(this, "action", this.Ow, !1, this).g(this, "resize", this.lb, !1, this).g(this.Am, "key", this.Pv, !0, this);
        or(this.Am, this.xb.fa, !0);
        jj() || this.Db.e().focus();
        this.Um = Gq(this.Db.e()).height + "px";
        this.xa || (this.Db.Ga(!1), this.Db.Ke(!1), this.Ei.Ga(!1), this.Ei.ha(!1));
        this.pq ? this.Db.ta(this.pq) : this.D && this.Db.Rb(this.D.Dp);
        var a = this.Um;
        Fq(this.Db.e(), a);
        this.lb()
    };
    n.ga = function() {
        gt.c.ga.call(this);
        this.Am.detach()
    };
    n.Ow = function() {
        var a = this.Db.ba();
        this.D && !Aa(Va(a)) && (this.D.postMessage(a), this.Db.ta(""), a = this.Um, Fq(this.Db.e(), a), this.lb())
    };
    n.lb = function() {
        var a = this.e(),
            b = Gq(this.Db.e()).height;
        Fq(a, b);
        !vc || A && D("9") && !D("10") && q.SVGElement && a instanceof q.SVGElement ? (a = a.parentNode, a = ma(a) && 1 == a.nodeType ? a : null) : a = a.parentElement;
        Fq(a, b)
    };
    n.Pv = function(a) {
        !jr(a) || a.ctrlKey && 67 === a.keyCode || a.ctrlKey && 86 === a.keyCode || jj() || this.Db.e().focus()
    };
    n.uc = function(a) {
        this.D && jr(a) && this.D.nq();
        return a.shiftKey ? !1 : gt.c.uc.call(this, a)
    };

    function ht(a, b) {
        this.hp = a;
        this.hp.Fo = this;
        if (this.Lb = b) b.L = this;
        this.I = new Bj(null, a.I);
        var c;
        if (zo()) {
            c = new yo;
            var d = this.I.get("pathPrefix") || "";
            c.Fg = String(d);
            this.I.get("html5History") && (d = c, !1 != d.Wi && (eh(d.V, "hashchange", d.qi, !1, d), d.Wi = !1))
        } else c = new Pp;
        this.xu = c;
        this.Ni = new Np
    }
    n = ht.prototype;
    n.M = function() {
        return this.hp.M()
    };
    n.pb = e("Lb");
    n.ec = e("xu");

    function Dn(a) {
        return a.Ni
    }
    n.nt = function(a, b, c) {
        return new gt(a, b, c)
    };
    n.pt = function(a, b) {
        var c, d, f = new Ts("100%", "100%");
        f.w();
        var g = new Ks(0, 0, 0, 80, "#26A2DF", "#2A87Cb");
        d = new Xs(80, "Helvetica");
        d.bold = !0;
        var h;
        h = 0 + d.size / 2;
        c = null;
        var k = 180 * Math.atan2(h - h, 0) / Math.PI % 360,
            k = Math.round(0 > 360 * k ? k + 360 : k),
            m = h - h;
        Math.round(Math.sqrt(0 + m * m));
        var p = d.size,
            m = {
                "font-family": d.At,
                "font-size": p
            },
            r = Math.round(0.85 * p),
            p = Math.round(h - p / 2 + r);
        m.x = 0;
        m.y = p;
        d.bold && (m["font-weight"] = "bold");
        d.Pu && (m["font-style"] = "italic");
        0 != k && (m.transform = "rotate(" + k + " 0 " + h + ")");
        d = Ls(f, "text", m);
        d.appendChild(f.xb.fa.createTextNode(a));
        null == c && (B && zb) && (c = new Qs(1, "black"));
        c = new Ss(d, f, c, g);
        f.jh.e().appendChild(c.e());
        g = document.getElementById(b);
        f.Qb(g);
        d = c.e().getBBox();
        c = d.width;
        d = d.height;
        pq(g, {
            width: c + "px",
            height: d + "px"
        });
        return f
    };
    Ir("vl-label-input", function() {
        return new fr
    });
    Ir("vl-single-label-input", function() {
        return new fr
    });
    var Co = "cmd:signin",
        Yl = "cmd:outgoingcall",
        Ul = "cmd:incomingcall";

    function it(a, b, c) {
        P.call(this, "cmd:nav", c);
        this.href = a;
        this.replaceState = b || !1
    }
    y(it, P);

    function jt(a, b, c) {
        P.call(this, "cmd:edituser", c);
        this.Da = a;
        this.ly = b
    }
    y(jt, P);

    function kt(a, b, c) {
        P.call(this, a, c);
        this.map = b || null
    }
    y(kt, P);
    kt.prototype.get = function(a) {
        return this.map ? this.map.get(a) : null
    };

    function lt(a, b) {
        P.call(this, "cmd:signupexists", b);
        this.hg = a
    }
    y(lt, P);

    function mt(a, b, c) {
        O.call(this);
        this.target = a;
        this.handle = b || a;
        this.kk = c || new nq(NaN, NaN, NaN, NaN);
        this.fa = Vc(a);
        this.P = new Gh(this);
        Bg(this, sa(Dg, this.P));
        Zg(this.handle, ["touchstart", "mousedown"], this.ns, !1, this)
    }
    y(mt, O);
    var nt = A || B && D("1.9.3");
    n = mt.prototype;
    n.clientX = 0;
    n.clientY = 0;
    n.screenX = 0;
    n.screenY = 0;
    n.ps = 0;
    n.qs = 0;
    n.eg = 0;
    n.fg = 0;
    n.xa = !0;
    n.gf = !1;
    n.jq = 0;
    n.cv = 0;
    n.zu = !1;
    n.Jo = !1;
    n.C = e("P");
    n.Ga = ca("xa");
    n.k = function() {
        mt.c.k.call(this);
        eh(this.handle, ["touchstart", "mousedown"], this.ns, !1, this);
        this.P.wd();
        nt && this.fa.releaseCapture();
        this.handle = this.target = null
    };

    function ot(a) {
        t(a.He) || (a.He = Cq(a.target));
        return a.He
    }
    n.ns = function(a) {
        var b = "mousedown" == a.type;
        if (!this.xa || this.gf || b && !Pg(a)) this.dispatchEvent("earlycancel");
        else {
            pt(a);
            if (0 == this.jq)
                if (this.dispatchEvent(new qt("start", this, a.clientX, a.clientY, a))) this.gf = !0, a.preventDefault();
                else return;
            else a.preventDefault();
            var b = this.fa,
                c = b.documentElement,
                d = !nt;
            this.P.g(b, ["touchmove", "mousemove"], this.ku, d);
            this.P.g(b, ["touchend", "mouseup"], this.xj, d);
            nt ? (c.setCapture(!1), this.P.g(c, "losecapture", this.xj)) : this.P.g(ad(b), "blur", this.xj);
            A && this.zu && this.P.g(b,
                "dragstart", Lg);
            this.Nx && this.P.g(this.Nx, "scroll", this.Nw, d);
            this.clientX = this.ps = a.clientX;
            this.clientY = this.qs = a.clientY;
            this.screenX = a.screenX;
            this.screenY = a.screenY;
            this.Jo ? (a = this.target, b = a.offsetLeft, c = a.offsetParent, c || "fixed" != vq(a) || (c = Vc(a).documentElement), c ? (B ? (d = Qq(c), b += d.left) : Qb(8) && (d = Qq(c), b -= d.left), a = Cq(c) ? c.clientWidth - (b + a.offsetWidth) : b) : a = b) : a = this.target.offsetLeft;
            this.eg = a;
            this.fg = this.target.offsetTop;
            this.Ln = yd(Tc(this.fa));
            this.cv = ta()
        }
    };
    n.xj = function(a, b) {
        this.P.wd();
        nt && this.fa.releaseCapture();
        if (this.gf) {
            pt(a);
            this.gf = !1;
            var c = rt(this, this.eg),
                d = st(this, this.fg);
            this.dispatchEvent(new qt("end", this, a.clientX, a.clientY, a, c, d, b || "touchcancel" == a.type))
        } else this.dispatchEvent("earlycancel")
    };

    function pt(a) {
        var b = a.type;
        "touchstart" == b || "touchmove" == b ? a.se(a.rc.targetTouches[0], a.currentTarget) : "touchend" != b && "touchcancel" != b || a.se(a.rc.changedTouches[0], a.currentTarget)
    }
    n.ku = function(a) {
        if (this.xa) {
            pt(a);
            var b = (this.Jo && ot(this) ? -1 : 1) * (a.clientX - this.clientX),
                c = a.clientY - this.clientY;
            this.clientX = a.clientX;
            this.clientY = a.clientY;
            this.screenX = a.screenX;
            this.screenY = a.screenY;
            if (!this.gf) {
                var d = this.ps - this.clientX,
                    f = this.qs - this.clientY;
                if (d * d + f * f > this.jq)
                    if (this.dispatchEvent(new qt("start", this, a.clientX, a.clientY, a))) this.gf = !0;
                    else {
                        this.Jc || this.xj(a);
                        return
                    }
            }
            c = tt(this, b, c);
            b = c.x;
            c = c.y;
            this.gf && this.dispatchEvent(new qt("beforedrag", this, a.clientX, a.clientY, a,
                b, c)) && (ut(this, a, b, c), a.preventDefault())
        }
    };

    function tt(a, b, c) {
        var d = yd(Tc(a.fa));
        b += d.x - a.Ln.x;
        c += d.y - a.Ln.y;
        a.Ln = d;
        a.eg += b;
        a.fg += c;
        b = rt(a, a.eg);
        a = st(a, a.fg);
        return new E(b, a)
    }
    n.Nw = function(a) {
        var b = tt(this, 0, 0);
        a.clientX = this.clientX;
        a.clientY = this.clientY;
        ut(this, a, b.x, b.y)
    };

    function ut(a, b, c, d) {
        a.Jo && ot(a) ? a.target.style.right = c + "px" : a.target.style.left = c + "px";
        a.target.style.top = d + "px";
        a.dispatchEvent(new qt("drag", a, b.clientX, b.clientY, b, c, d))
    }

    function rt(a, b) {
        var c = a.kk,
            d = isNaN(c.left) ? null : c.left,
            c = isNaN(c.width) ? 0 : c.width;
        return Math.min(null != d ? d + c : Infinity, Math.max(null != d ? d : -Infinity, b))
    }

    function st(a, b) {
        var c = a.kk,
            d = isNaN(c.top) ? null : c.top,
            c = isNaN(c.height) ? 0 : c.height;
        return Math.min(null != d ? d + c : Infinity, Math.max(null != d ? d : -Infinity, b))
    }

    function qt(a, b, c, d, f, g, h, k) {
        Kg.call(this, a);
        this.clientX = c;
        this.clientY = d;
        this.Ay = f;
        this.left = t(g) ? g : b.eg;
        this.top = t(h) ? h : b.fg;
        this.Py = b;
        this.Oy = !!k
    }
    y(qt, Kg);

    function vt(a) {
        O.call(this);
        this.B = a;
        a = A ? "focusout" : "blur";
        this.Vu = Zg(this.B, A ? "focusin" : "focus", this, !A);
        this.Wu = Zg(this.B, a, this, !A)
    }
    y(vt, O);
    vt.prototype.handleEvent = function(a) {
        var b = new Ng(a.rc);
        b.type = "focusin" == a.type || "focus" == a.type ? "focusin" : "focusout";
        this.dispatchEvent(b)
    };
    vt.prototype.k = function() {
        vt.c.k.call(this);
        gh(this.Vu);
        gh(this.Wu);
        delete this.B
    };

    function wt(a, b) {
        Xq.call(this, b);
        this.ky = !!a;
        this.Zh = null
    }
    y(wt, Xq);
    n = wt.prototype;
    n.gm = null;
    n.R = !1;
    n.ac = null;
    n.Fb = null;
    n.Dc = null;
    n.Il = !1;
    n.K = l("vl-modalpopup");
    n.hf = e("ac");
    n.w = function() {
        wt.c.w.call(this);
        var a = this.e();
        yc(a, this.K());
        rd(a, !0);
        Lq(a, !1);
        xt(this);
        yt(this)
    };

    function xt(a) {
        if (a.ky && !a.Fb) {
            var b;
            b = a.o().w("iframe", {
                frameborder: 0,
                style: "border:0;vertical-align:bottom;",
                src: 'javascript:""'
            });
            a.Fb = b;
            a.Fb.className = a.K() + "-bg";
            Lq(a.Fb, !1);
            Kq(a.Fb, 0)
        }
        a.ac || (a.ac = a.o().w("div", a.K() + "-bg"), Lq(a.ac, !1))
    }

    function yt(a) {
        a.Dc || (a.Dc = a.o().createElement("span"), Lq(a.Dc, !1), rd(a.Dc, !0), a.Dc.style.position = "absolute")
    }
    n.Lr = function() {
        this.Il = !1
    };
    n.Gb = function(a) {
        return !!a && "DIV" == a.tagName
    };
    n.$ = function(a) {
        wt.c.$.call(this, a);
        yc(this.e(), this.K());
        xt(this);
        yt(this);
        Lq(this.e(), !1)
    };
    n.v = function() {
        if (this.Fb) {
            var a = this.e();
            a.parentNode && a.parentNode.insertBefore(this.Fb, a)
        }
        a = this.e();
        a.parentNode && a.parentNode.insertBefore(this.ac, a);
        wt.c.v.call(this);
        a = this.e();
        a.parentNode && a.parentNode.insertBefore(this.Dc, a.nextSibling);
        this.gm = new vt(vd(this.o()));
        this.C().g(this.gm, "focusin", this.yn);
        zt(this, !1)
    };
    n.ga = function() {
        this.R && this.ha(!1);
        Dg(this.gm);
        wt.c.ga.call(this);
        hd(this.Fb);
        hd(this.ac);
        hd(this.Dc)
    };
    n.ha = function(a) {
        if (a != this.R)
            if (this.Ff && this.Ff.stop(), this.ag && this.ag.stop(), this.Ef && this.Ef.stop(), this.$f && this.$f.stop(), this.J && zt(this, a), a) {
                if (this.dispatchEvent("beforeshow")) {
                    try {
                        this.Zh = vd(this.o()).activeElement
                    } catch (b) {}
                    this.Xn();
                    this.Fe();
                    this.C().g(xd(this.o()), "resize", this.Xn);
                    At(this, !0);
                    this.focus();
                    this.R = !0;
                    this.Ff && this.ag ? (dh(this.Ff, "end", this.Bk, !1, this), this.ag.play(), this.Ff.play()) : this.Bk()
                }
            } else if (this.dispatchEvent("beforehide")) {
            this.C().tb(xd(this.o()), "resize",
                this.Xn);
            this.R = !1;
            this.Ef && this.$f ? (dh(this.Ef, "end", this.Ak, !1, this), this.$f.play(), this.Ef.play()) : this.Ak();
            try {
                var c = vd(this.o()).body,
                    d = vd(this.o()).activeElement || c;
                this.Zh && (d == c && this.Zh != c) && this.Zh.focus()
            } catch (f) {}
            this.Zh = null
        }
    };

    function zt(a, b) {
        for (var c = vd(a.o()).body.firstChild; c; c = c.nextSibling)
            if (1 == c.nodeType) {
                var d = c;
                b ? gq(d, "hidden", b) : d.removeAttribute("aria-hidden")
            }
        c = a.B;
        (d = !b) ? gq(c, "hidden", d): c.removeAttribute("aria-hidden")
    }

    function Bt(a, b, c, d, f) {
        a.Ff = b;
        a.Ef = c;
        a.ag = d;
        a.$f = f
    }

    function At(a, b) {
        a.Fb && Lq(a.Fb, b);
        a.ac && Lq(a.ac, b);
        Lq(a.e(), b);
        Lq(a.Dc, b)
    }
    n.Bk = function() {
        this.dispatchEvent("show")
    };
    n.Ak = function() {
        At(this, !1);
        this.dispatchEvent("hide")
    };
    n.focus = function() {
        this.Lp()
    };
    n.Xn = function() {
        this.Fb && Lq(this.Fb, !1);
        this.ac && Lq(this.ac, !1);
        var a = vd(this.o()),
            b = Zc(ad(a) || window),
            c = Math.max(b.width, Math.max(a.body.scrollWidth, a.documentElement.scrollWidth)),
            a = Math.max(b.height, Math.max(a.body.scrollHeight, a.documentElement.scrollHeight));
        this.Fb && (Lq(this.Fb, !0), Dq(this.Fb, c, a));
        this.ac && (Lq(this.ac, !0), Dq(this.ac, c, a))
    };
    n.Fe = function() {
        var a = vd(this.o()),
            b = ad(a) || window;
        if ("fixed" == vq(this.e())) var c = a = 0;
        else c = yd(this.o()), a = c.x, c = c.y;
        var d = Gq(this.e()),
            b = Zc(b),
            a = Math.max(a + b.width / 2 - d.width / 2, 0),
            c = Math.max(c + b.height / 2 - d.height / 2, 0);
        wq(this.e(), a, c);
        wq(this.Dc, a, c)
    };
    n.yn = function(a) {
        this.Il ? this.Lr() : a.target == this.Dc && I(this.Lp, 0, this)
    };
    n.Lp = function() {
        try {
            A && vd(this.o()).body.focus(), this.e().focus()
        } catch (a) {}
    };
    n.k = function() {
        Dg(this.Ff);
        this.Ff = null;
        Dg(this.Ef);
        this.Ef = null;
        Dg(this.ag);
        this.ag = null;
        Dg(this.$f);
        this.$f = null;
        wt.c.k.call(this)
    };

    function Ct(a, b, c) {
        wt.call(this, b, c);
        this.Hb = a || "modal-dialog";
        this.Xa = Dt(Dt(new Et, Ft, !0), Gt, !1, !0)
    }
    y(Ct, wt);
    n = Ct.prototype;
    n.yt = !0;
    n.Mm = !0;
    n.Qq = !0;
    n.vt = !0;
    n.fj = 0.5;
    n.Ti = "";
    n.ka = "";
    n.je = null;
    n.ut = !1;
    n.Eb = null;
    n.Dd = null;
    n.gl = null;
    n.ge = null;
    n.qc = null;
    n.Wa = null;
    n.Gf = "dialog";
    n.K = e("Hb");
    n.Ta = function(a) {
        this.Ti = a;
        this.Dd && ld(this.Dd, a)
    };
    n.pg = e("Ti");
    n.Rb = function(a) {
        this.ka = a;
        this.qc && (this.qc.innerHTML = a)
    };
    n.as = ca("Gf");
    n.va = function() {
        this.e() || this.Qb();
        return this.qc
    };
    n.hf = function() {
        this.e() || this.Qb();
        return Ct.c.hf.call(this)
    };

    function Ht(a, b) {
        a.fj = b;
        if (a.e()) {
            var c = a.hf();
            c && Kq(c, a.fj)
        }
    }
    n.rp = function() {
        return new mt(this.e(), this.Eb)
    };

    function It(a, b) {
        a.e() && Dc(a.Eb, a.Hb + "-title-draggable", b);
        b && !a.je ? (a.je = a.rp(), yc(a.Eb, a.Hb + "-title-draggable"), Zg(a.je, "start", a.Rx, !1, a)) : !b && a.je && (a.je.F(), a.je = null)
    }
    n.w = function() {
        Ct.c.w.call(this);
        var a = this.e(),
            b = this.o();
        this.Eb = b.w("div", {
            className: this.Hb + "-title",
            id: this.j()
        }, this.Dd = b.w("span", this.Hb + "-title-text", this.Ti), this.ge = b.w("span", this.Hb + "-title-close"));
        fd(a, this.Eb, this.qc = b.w("div", this.Hb + "-content"), this.Wa = b.w("div", this.Hb + "-buttons"));
        this.gl = this.Eb.id;
        fq(a, this.Gf);
        gq(a, "labelledby", this.gl || "");
        this.ka && (this.qc.innerHTML = this.ka);
        Lq(this.ge, this.Mm);
        this.Xa && Jt(this.Xa, this.Wa);
        Lq(this.Wa, !!this.Xa);
        Ht(this, this.fj)
    };
    n.$ = function(a) {
        Ct.c.$.call(this, a);
        a = this.e();
        var b = this.Hb + "-content";
        (this.qc = Wc(document, null, b, a)[0]) ? this.ka = this.qc.innerHTML: (this.qc = this.o().w("div", b), this.ka && (this.qc.innerHTML = this.ka), a.appendChild(this.qc));
        var b = this.Hb + "-title",
            c = this.Hb + "-title-text",
            d = this.Hb + "-title-close";
        (this.Eb = Wc(document, null, b, a)[0]) ? (this.Dd = Wc(document, null, c, this.Eb)[0], this.ge = Wc(document, null, d, this.Eb)[0], this.Eb.id || (this.Eb.id = this.j())) : (this.Eb = this.o().w("div", {
            className: b,
            id: this.j()
        }), a.insertBefore(this.Eb,
            this.qc));
        this.gl = this.Eb.id;
        this.Dd ? this.Ti = sd(this.Dd) : (this.Dd = this.o().w("span", c, this.Ti), this.Eb.appendChild(this.Dd));
        gq(a, "labelledby", this.gl || "");
        this.ge || (this.ge = this.o().w("span", d), this.Eb.appendChild(this.ge));
        Lq(this.ge, this.Mm);
        b = this.Hb + "-buttons";
        (this.Wa = Wc(document, null, b, a)[0]) ? (this.Xa = new Et(this.o()), this.Xa.la(this.Wa)) : (this.Wa = this.o().w("div", b), a.appendChild(this.Wa), this.Xa && Jt(this.Xa, this.Wa), Lq(this.Wa, !!this.Xa));
        Ht(this, this.fj)
    };
    n.v = function() {
        Ct.c.v.call(this);
        this.C().g(this.e(), "keydown", this.dr).g(this.e(), "keypress", this.dr);
        this.C().g(this.Wa, "click", this.rv);
        It(this, this.vt);
        this.C().g(this.ge, "click", this.bx);
        var a = this.e();
        fq(a, this.Gf);
        "" !== this.Dd.id && gq(a, "labelledby", this.Dd.id);
        if (!this.Qq && (this.Qq = !1, this.J)) {
            var a = this.o(),
                b = this.hf();
            a.removeNode(this.Fb);
            a.removeNode(b)
        }
    };
    n.ga = function() {
        this.R && this.ha(!1);
        It(this, !1);
        Ct.c.ga.call(this)
    };
    n.ha = function(a) {
        a != this.R && (this.J || this.Qb(), Ct.c.ha.call(this, a))
    };
    n.Bk = function() {
        Ct.c.Bk.call(this);
        this.dispatchEvent(Kt)
    };
    n.Ak = function() {
        Ct.c.Ak.call(this);
        this.dispatchEvent(Lt);
        this.ut && this.F()
    };
    n.focus = function() {
        Ct.c.focus.call(this);
        if (this.Xa) {
            var a = this.Xa.sj;
            if (a)
                for (var b = vd(this.o()), c = this.Wa.getElementsByTagName("button"), d = 0, f; f = c[d]; d++)
                    if (f.name == a && !f.disabled) {
                        try {
                            if (C || Eb) {
                                var g = b.createElement("input");
                                g.style.cssText = "position:fixed;width:0;height:0;left:0;top:0;";
                                this.e().appendChild(g);
                                g.focus();
                                this.e().removeChild(g)
                            }
                            f.focus()
                        } catch (h) {}
                        break
                    }
        }
    };
    n.Rx = function() {
        var a = vd(this.o()),
            b = Zc(ad(a) || window),
            c = Math.max(a.body.scrollWidth, b.width),
            a = Math.max(a.body.scrollHeight, b.height),
            d = Gq(this.e());
        "fixed" == vq(this.e()) ? (b = new nq(0, 0, Math.max(0, b.width - d.width), Math.max(0, b.height - d.height)), this.je.kk = b || new nq(NaN, NaN, NaN, NaN)) : this.je.kk = new nq(0, 0, c - d.width, a - d.height) || new nq(NaN, NaN, NaN, NaN)
    };
    n.bx = function() {
        if (this.Mm) {
            var a = this.Xa,
                b = a && a.Ml;
            b ? (a = a.get(b), this.dispatchEvent(new Mt(b, a)) && this.ha(!1)) : this.ha(!1)
        }
    };
    n.k = function() {
        this.Wa = this.ge = null;
        Ct.c.k.call(this)
    };
    n.rv = function(a) {
        a: {
            for (a = a.target; null != a && a != this.Wa;) {
                if ("BUTTON" == a.tagName) break a;
                a = a.parentNode
            }
            a = null
        }
        if (a && !a.disabled) {
            a = a.name;
            var b = this.Xa.get(a);
            this.dispatchEvent(new Mt(a, b)) && this.ha(!1)
        }
    };
    n.dr = function(a) {
        var b = !1,
            c = !1,
            d = this.Xa,
            f = a.target;
        if ("keydown" == a.type)
            if (this.yt && 27 == a.keyCode) {
                var g = d && d.Ml,
                    f = "SELECT" == f.tagName && !f.disabled;
                g && !f ? (c = !0, b = d.get(g), b = this.dispatchEvent(new Mt(g, b))) : f || (b = !0)
            } else {
                if (9 == a.keyCode && a.shiftKey && f == this.e()) {
                    this.Il = !0;
                    try {
                        this.Dc.focus()
                    } catch (h) {}
                    I(this.Lr, 0, this)
                }
            } else if (13 == a.keyCode) {
            if ("BUTTON" == f.tagName && !f.disabled) g = f.name;
            else if (d) {
                var k = d.sj,
                    m;
                if (m = k) a: {
                    m = d.B.getElementsByTagName("BUTTON");
                    for (var p = 0, r; r = m[p]; p++)
                        if (r.name == k ||
                            r.id == k) {
                            m = r;
                            break a
                        }
                    m = null
                }
                f = ("TEXTAREA" == f.tagName || "SELECT" == f.tagName || "A" == f.tagName) && !f.disabled;
                !m || (m.disabled || f) || (g = k)
            }
            g && d && (c = !0, b = this.dispatchEvent(new Mt(g, String(d.get(g)))))
        }
        if (b || c) a.stopPropagation(), a.preventDefault();
        b && this.ha(!1)
    };

    function Mt(a, b) {
        this.type = Nt;
        this.key = a;
        this.caption = b
    }
    y(Mt, Kg);
    var Nt = "dialogselect",
        Lt = "afterhide",
        Kt = "aftershow";

    function Et(a) {
        this.xb = a || Tc();
        Od.call(this)
    }
    y(Et, Od);
    n = Et.prototype;
    n.Hb = "vl-buttonset";
    n.sj = null;
    n.B = null;
    n.Ml = null;
    n.set = function(a, b, c, d) {
        Od.prototype.set.call(this, a, b);
        c && (this.sj = a);
        d && (this.Ml = a);
        return this
    };

    function Dt(a, b, c, d) {
        return a.set(b.key, b.caption, c, d)
    }

    function Jt(a, b) {
        a.B = b;
        a.Qb()
    }
    n.Qb = function() {
        if (this.B) {
            this.B.innerHTML = "";
            var a = Tc(this.B);
            Id(this, function(b, c) {
                var d = a.w("button", {
                    name: c
                }, b);
                c == this.sj && (d.className = this.Hb + "-default");
                this.B.appendChild(d)
            }, this)
        }
    };
    n.la = function(a) {
        if (a && 1 == a.nodeType) {
            this.B = a;
            a = this.B.getElementsByTagName("button");
            for (var b = 0, c, d, f; c = a[b]; b++)
                if (d = c.name || c.id, f = sd(c) || c.value, d) {
                    var g = 0 == b;
                    this.set(d, f, g, c.name == Ot);
                    g && yc(c, this.Hb + "-default")
                }
        }
    };
    n.e = e("B");
    n.o = e("xb");
    var Ot = "cancel",
        Pt = ua("OK"),
        Qt = ua("Cancel"),
        Rt = ua("Yes"),
        St = ua("No"),
        Tt = ua("Save"),
        Ut = ua("Continue"),
        Ft = {
            key: "ok",
            caption: Pt
        },
        Gt = {
            key: Ot,
            caption: Qt
        },
        Vt = {
            key: "yes",
            caption: Rt
        },
        Wt = {
            key: "no",
            caption: St
        },
        Xt = {
            key: "save",
            caption: Tt
        },
        Yt = {
            key: "continue",
            caption: Ut
        };
    "undefined" != typeof document && (Dt(new Et, Ft, !0, !0), Dt(Dt(new Et, Ft, !0), Gt, !1, !0), Dt(Dt(new Et, Vt, !0), Wt, !1, !0), Dt(Dt(Dt(new Et, Vt), Wt, !0), Gt, !1, !0), Dt(Dt(Dt(new Et, Yt), Xt), Gt, !0, !0));

    function Zt(a, b) {
        Ct.call(this, a || "vl-dialog", !1, b);
        this.bf = null;
        this.zi = this.ok = !1;
        this.kj = void 0;
        this.fc = null
    }
    y(Zt, Ct);

    function $t(a, b) {
        a.ra(b, !1);
        if (a.ok) {
            var c = a.e();
            b.load().n(function() {
                return b.Jc ? new G("disposed") : au(c, !1, "fade", 0.25)
            }, a).n(function() {
                return b.Jc ? new G("disposed") : bu(this, b)
            }, a).n(function() {
                b.Jc || (au(c, !0, "fade", 0.25), b.focus())
            })
        } else bu(a, b)
    }
    n = Zt.prototype;
    n.ym = function() {
        for (var a = this.getParent(); a && !(a instanceof $);) a = a.getParent();
        return a
    };
    n.ia = function() {
        var a = this.ym();
        return a && a.ia()
    };

    function bu(a, b) {
        a.bf && a.removeChild(a.bf, !0);
        a.bf = b;
        var c = b.pg();
        c && a.Ta(c);
        a.e() && (b.Qb(a.va()), a.Fe())
    }
    n.show = function(a) {
        function b(a) {
            f.F();
            g.fc = null;
            !d.Mc && d.aa(a)
        }

        function c() {
            f.F();
            g.fc = null;
            !d.Mc && d.ma(se)
        }
        a && a !== this.kj && (this.kj = a, this.dispatchEvent(a));
        if (this.zi) return new G(this);
        this.zi = !0;
        var d = new G,
            f = this.fc = new Gh(this),
            g = this;
        f.g(this, Nt, function(a) {
            a.key === se ? c() : b(a.key)
        });
        this.Zk && f.g(this, "action", function(a) {
            a = a.key || a.target && a.target.ba();
            b(a)
        });
        f.g(this, "hide", c);
        f.g(this, "cmd:nav", function(a) {
            b(a.type)
        });
        this.ia() && (a = new Np(xd(this.o())), f.g(a, "resize", this.Fe));
        this.Xa ||
            (a = new cu, Dt(a, Gt, !1, !0), this.Xa = a, this.Wa && (this.Xa ? Jt(this.Xa, this.Wa) : this.Wa.innerHTML = "", Lq(this.Wa, !!this.Xa)));
        this.ok ? this.ha(!0) : this.load().n(function() {
            I(function() {
                this.ha(this.zi)
            }, 0, this)
        }, this);
        return d
    };
    n.Rh = function() {
        this.zi = !1;
        this.ha(!1)
    };
    n.ha = function(a) {
        Zt.c.ha.call(this, a);
        a || (this.zi = !1)
    };
    n.k = function() {
        Zt.c.k.call(this);
        this.fc && (this.fc.F(), this.fc = null)
    };
    n.load = function() {
        var a = null;
        this.ok || (this.ok = !0, a = this.Y());
        return a || new G(this)
    };
    n.Y = function() {
        return du(this)
    };
    n.w = function() {
        Zt.c.w.call(this);
        this.bf && this.bf.Qb(this.va());
        if (this.Xa && this.Zk) {
            var a = this.o();
            Id(this.Xa, function(b, c) {
                var g = new Xr(b, new eu, a);
                g.ta(c);
                this.ra(g, !1);
                g.Qb(this.Wa)
            }, this)
        } else Lq(this.Wa, !1);
        var b = this.hf(),
            c = this.e();
        Bt(this, fu(c, 0.25), gu(c, 0.25), fu(b, 0.25), gu(b, 0.25))
    };
    n.Fe = function() {
        var a = vd(this.o()),
            b = ad(a) || window,
            a = this.e();
        if ("fixed" == vq(a)) var c = 0,
            d = 0;
        else d = yd(this.o()), c = d.x, d = d.y;
        var f = Hq(a),
            b = Zc(b);
        jj() && (600 > b.width || 600 > b.height) ? (f.width = b.width, f.height = b.height, Oq(a, f)) : a.style.width = a.style.height = "";
        c = Math.max(c + b.width / 2 - f.width / 2, 0);
        d = Math.max(d + b.height / 2 - f.height / 2, 0);
        d = Math.min(d, b.height / 5);
        wq(a, c, d);
        wq(this.Dc, c, d)
    };
    n.focus = function() {
        Zt.c.focus.call(this);
        this.bf && this.bf.focus()
    };

    function cu(a) {
        Et.call(this, a)
    }
    y(cu, Et);
    cu.prototype.Qb = fa;

    function eu() {}
    y(eu, Hr);
    ga(eu);
    n = eu.prototype;
    n.va = aa();
    n.w = function(a) {
        var b = {
            "class": "vl-inline-block " + this.me(a).join(" "),
            title: a.qg() || ""
        };
        return a.o().w("div", b, a.ka)
    };
    n.Gb = function(a) {
        return "DIV" == a.tagName
    };
    n.la = function(a, b) {
        yc(b, "vl-inline-block", this.K());
        return eu.c.la.call(this, a, b)
    };
    n.K = l("vl-css3-button");
    Ir("vl-css3-button", function() {
        return new Xr(null, eu.Ja())
    });
    Ir("vl-css3-toggle-button", function() {
        var a = new Xr(null, eu.Ja());
        Sr(a, 16, !0);
        return a
    });

    function hu(a, b, c) {
        Xr.call(this, a, b || xs.Ja(), c)
    }
    y(hu, Xr);
    Ir("vl-custom-button", function() {
        return new hu(null)
    });

    function iu() {
        O.call(this);
        this.nc = ju;
        this.xt = this.startTime = null
    }
    y(iu, O);
    var ju = 0;
    var ku;

    function lu(a, b) {
        ia(b) || (b = [b]);
        var c = cb(b, function(a) {
            return v(a) ? a : a.Ar + " " + a.duration + "s " + a.timing + " " + a.Ap + "s"
        });
        mu(a, c.join(","))
    }

    function mu(a, b) {
        pq(a, "transition", b)
    };

    function nu(a, b, c, d, f) {
        iu.call(this);
        this.B = a;
        this.wt = b;
        this.Cu = c;
        this.Hp = d;
        this.gy = ia(f) ? f : [f]
    }
    y(nu, iu);
    n = nu.prototype;
    n.play = function() {
        if (1 == this.nc) return !1;
        this.dispatchEvent("begin");
        this.dispatchEvent("play");
        this.startTime = ta();
        this.nc = 1;
        if (!t(ku))
            if (A) ku = D("10.0");
            else {
                var a = document.createElement("div"),
                    b = C ? "-webkit" : B ? "-moz" : A ? "-ms" : Eb ? "-o" : null;
                a.innerHTML = '\x3cdiv style\x3d"' + (b ? b + "-transition:opacity 1s linear;" : "") + 'transition:opacity 1s linear;"\x3e';
                ku = "" != sq(a.firstChild, "transition")
            }
        if (ku) return pq(this.B, this.Cu), this.Qe = I(this.zx, void 0, this), !0;
        this.xo(!1);
        return !1
    };
    n.zx = function() {
        lu(this.B, this.gy);
        pq(this.B, this.Hp);
        this.Qe = I(w(this.xo, this, !1), 1E3 * this.wt)
    };
    n.stop = function() {
        1 == this.nc && this.xo(!0)
    };
    n.xo = function(a) {
        mu(this.B, "");
        rh(this.Qe);
        pq(this.B, this.Hp);
        this.xt = ta();
        this.nc = ju;
        a ? this.dispatchEvent("stop") : this.dispatchEvent("finish");
        this.dispatchEvent("end")
    };
    n.k = function() {
        this.stop();
        nu.c.k.call(this)
    };

    function ou(a, b, c, d, f) {
        return new nu(a, b, {
            opacity: d
        }, {
            opacity: f
        }, {
            Ar: "opacity",
            duration: b,
            timing: c,
            Ap: 0
        })
    }

    function fu(a, b) {
        return ou(a, b, "ease-out", 0, 1)
    }

    function gu(a, b) {
        return ou(a, b, "ease-in", 1, 0)
    };
    var pu = !1;

    function qu(a) {
        a = a.match(/[\d]+/g);
        a.length = 3;
        a.join(".")
    }
    if (navigator.plugins && navigator.plugins.length) {
        var ru = navigator.plugins["Shockwave Flash"];
        ru && (pu = !0, ru.description && qu(ru.description));
        navigator.plugins["Shockwave Flash 2.0"] && (pu = !0)
    } else if (navigator.mimeTypes && navigator.mimeTypes.length) {
        var su = navigator.mimeTypes["application/x-shockwave-flash"];
        (pu = su && su.enabledPlugin) && qu(su.enabledPlugin.description)
    } else try {
        var tu = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7"),
            pu = !0;
        qu(tu.GetVariable("$version"))
    } catch (uu) {
        try {
            tu = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6"),
                pu = !0
        } catch (vu) {
            try {
                tu = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"), pu = !0, qu(tu.GetVariable("$version"))
            } catch (wu) {}
        }
    };

    function xu(a, b, c) {
        a = a.firstChild;
        for (var d = c || q; a;) {
            if (ma(a) && 1 == a.nodeType) {
                var f = a;
                b.call(d, f) || xu(f, b, c)
            }
            a = a.nextSibling
        }
    }

    function yu(a, b) {
        return a.querySelectorAll && a.querySelector ? a.querySelector("#" + b) : md(a, function(a) {
            return ma(a) && 1 == a.nodeType && a.id === b
        })
    }

    function zu(a, b) {
        return fb(a.anchors, function(a) {
            return a.name === b
        })
    }

    function Au(a) {
        return "none" !== sq(a, "display") && "hidden" !== sq(a, "visibility")
    }

    function Bu(a, b) {
        var c = a.getAttribute(b);
        Aa(Va(c)) && (c = null);
        return c
    }

    function Cu(a, b) {
        return "perspective(400) translateZ(-" + b + "px) rotateY(" + a + "rad)"
    }

    function yj(a) {
        pq(a, A ? "-ms-transform" : C ? "-webkit-transform" : Eb ? "-o-transform" : B ? "-moz-transform" : "transform", "scaleX(-1)")
    }

    function Du(a, b) {
        pq(a, A ? "transition" : C ? "-webkit-transition" : "transition", b)
    }

    function au(a, b, c, d) {
        var f, g = new G;
        if (Au(a) !== b) {
            d = t(d) ? d : 0.25;
            switch (c) {
                case "fade":
                    b ? (pq(a, "opacity", 0), Lq(a, !0), f = fu(a, d)) : f = gu(a, d);
                    break;
                case "slide":
                    f = b ? Eu(a, d, "ease-out", !0) : Eu(a, d, "ease-in", !1)
            }
            b && f || g.Xf(function() {
                Lq(a, b);
                pq(a, "visibility", "")
            })
        }
        f ? (dh(f, "end", function() {
            g.aa(a)
        }), I(f.play, 10, f)) : g.aa(a);
        return g
    }

    function Eu(a, b, c, d) {
        d && pq(a, {
            display: "",
            height: "0"
        });
        pq(a, {
            overflow: "hidden",
            position: "relative"
        });
        var f = "",
            g;
        g = a || document;
        g.querySelectorAll && g.querySelector ? g = g.querySelector(".vl-content") : (g = a || document, g = (g.querySelectorAll && g.querySelector ? g.querySelectorAll(".vl-content") : g.getElementsByClassName ? g.getElementsByClassName("vl-content") : Wc(document, "*", "vl-content", a))[0]);
        if (g = g || null) f = g.offsetHeight;
        var h;
        d ? (g = 0, h = 1, d = 0) : (g = 1, h = 0, d = f, f = 0);
        return new nu(a, b, {
            height: d + "px",
            opacity: g
        }, {
            height: f +
                "px",
            opacity: h
        }, {
            Ar: "all",
            duration: b,
            timing: c,
            Ap: 0
        })
    }

    function Fu(a) {
        var b = a.getAttribute("vl-fx");
        if (Aa(Va(b))) {
            if ("absolute" === tq(a, "position")) return "fade";
            if ("DIV" === a.tagName) return "slide"
        } else return b;
        return "none"
    };

    function $(a) {
        Xq.call(this, a);
        this.L = this.Zb = null;
        this.m = {};
        this.mi = null;
        this.H = new L;
        this.nb("vl-" + na(this))
    }
    y($, Xq);
    n = $.prototype;
    n.Ma = null;
    n.G = He("vline.ui");
    n.Jg = null;
    n.rn = !1;
    n.fn = null;
    n.Xg = null;
    n.rk = function() {
        return fe.value >= ie(this.G).value
    };
    n.h = function(a, b) {
        if (this.rk()) {
            var c;
            c = 2 === arguments.length ? b : Sc.apply(null, rb(arguments, 1));
            var d = lf(this.toString());
            c = lf(c, !1);
            return F(this.G, a + "\x3c" + d + "\x3e(" + c + ")")
        }
    };
    n.k = function() {
        this.m = this.Lb = null;
        this.H.ja();
        this.H = null;
        this.Xg && (this.Xg.F(), this.Xg = null);
        this.Jg && (z(this.Jg, function(a) {
            a.ja()
        }), this.Jg = null);
        $.c.k.call(this)
    };
    n.nb = function(a) {
        this.m.id = a;
        $.c.nb.call(this, a)
    };
    n.ia = e("L");
    n.getData = e("m");
    n.Q = e("H");
    n.pg = function() {
        return this.m.title
    };
    n.Ta = function(a) {
        this.m.title = a
    };

    function Gu(a) {
        var b;
        b = a.H.get("r");
        b = null != b && b instanceof L ? b : null;
        if (!b) {
            var c = b = new L;
            a.H.set("r", c);
            a.m.Lg = c && c.j();
            b.ja()
        }
        return b
    }
    n.M = function() {
        return this.L.M()
    };
    n.pb = function() {
        return this.L.pb()
    };
    n.ec = function() {
        return this.L.ec()
    };
    n.r = function() {
        return this.pb().r()
    };
    n.Jf = function(a) {
        $.c.Jf.call(this, a);
        (a = this.ym()) && Hu(this, a)
    };

    function Hu(a, b) {
        a.L = b.ia();
        a.m = Qe(b.getData(), a.m);
        $h(a.H, b.Q())
    }
    n.ye = function(a) {
        return this.j() + "-" + a
    };
    n.ym = function() {
        for (var a = this.getParent(); a && !(a instanceof $);) a = a.getParent();
        return a
    };
    n.te = function() {
        return !(!this.Zb || !this.Zb.Mc)
    };
    n.load = function(a, b) {
        function c() {
            this.J ? this.show() : f && (b ? this.la(f) : (this.B = f, this.v()))
        }
        if (this.Zb) return new G(this);
        var d, f;
        a && (this.B = f = v(a) ? document.getElementById(a) : a);
        (d = this.Y()) ? (this.Zb = d, d.n(c, this), a && !this.getParent() ? d.Mb(c, this) : d.Mb(function(a) {
            this.Zb.ma(a);
            this.Zb = null
        }, this)) : (this.Zb = new G(this), c.call(this));
        return this.Zb
    };
    n.Y = function() {
        return du(this)
    };

    function du(a) {
        var b = [];
        a.dc(function(a) {
            a instanceof $ ? b.push(a.load()) : du(a)
        });
        return 0 < b.length ? zh.apply(null, b) : new G(a)
    }

    function Iu(a, b) {
        a.ra(b);
        return b.getData()
    }

    function Ju(a, b) {
        var c = a.ye("form");
        b.nb(c);
        a.ra(b, !1)
    }
    n.Hd = function(a, b, c) {
        $.c.Hd.call(this, a, b, c);
        a instanceof $ || Ku(this, a)
    };

    function Ku(a, b) {
        b.dc(function(b) {
            b instanceof $ ? Hu(b, a) : Ku(a, b)
        })
    }
    n.navigate = function(a, b) {
        this.dispatchEvent(new it(a, b))
    };

    function Lu(a, b, c) {
        v(c) && (c = a.Fj(c));
        Mu(a, b, null, c);
        Nu(a, b, function(a) {
            return Mu(this, b, a.oldVal, c)
        }, a)
    }

    function Mu(a, b, c, d) {
        b = b.split(".");
        for (var f = a.H.ua, g = 0; g < b.length && (f = f[b[g]], null != f); g++);
        b = f || "";
        if ("INPUT" === d.tagName) d.setAttribute("value", b);
        else {
            f = !Aa(b);
            g = d;
            1 === d.parentNode.childNodes.length && (g = d.parentNode);
            var h = !Aa(sd(d));
            if (f || null != c || !h)
                if (Au(g) === f) ld(d, b);
                else {
                    var k;
                    a.J && (k = Fu(g));
                    f && ld(d, b);
                    au(g, f, k)
                }
        }
    }

    function Nu(a, b, c, d) {
        a.Xg || (a.Xg = new Gh);
        a.Xg.g(a.Q(), "change:" + b, c, !1, d || a)
    }
    n.show = function(a, b, c) {
        var d = this.e();
        return d ? au(d, a, b, c) : Bh()
    };
    n.w = function() {
        this.$(Ou(this))
    };
    n.la = function(a) {
        Pu(this, a)
    };

    function Pu(a, b) {
        if (a.J) throw Error("Component already rendered");
        if (b && a.Gb(b)) {
            a.Qo = !0;
            a.xb && a.xb.fa == Vc(b) || (a.xb = Tc(b));
            a.$(b);
            var c = a.getParent();
            c && !c.J || a.v()
        } else throw Error("Invalid element to decorate");
    }
    n.$ = function(a) {
        $.c.$.call(this, a);
        Qu(this, this, a);
        this.te() || this.show(!1)
    };
    n.v = function() {
        $.c.v.call(this);
        this.rn && (this.mi = new Mp(xd(this.o())), this.C().g(this.mi, "resize", this.lb), this.lb());
        this.H.Ca(!0, !1)
    };
    n.ga = function() {
        this.mi && (this.mi.F(), this.mi = null);
        $.c.ga.call(this)
    };

    function Qu(a, b, c) {
        xu(c, function(c) {
            var f;
            a: {
                f = c;
                if (v(f) && (f = b.Fj(f), !f)) {
                    f = null;
                    break a
                }
                var g = f.getAttribute("id"),
                    h = $q(a, g) || Kr(f);
                h ? (h.e() || (g && h.nb(g), h.getParent() != a && a.ra(h, !1), h instanceof Ru ? Qu(h, b, f) : Su(b, f), Pu(h, f)), f = h) : f = null
            }
            g = b;
            f && f instanceof $ && (g = f);
            Tu(g, c);
            return !!f
        })
    }

    function Su(a, b) {
        xu(b, function(b) {
            Tu(a, b)
        })
    }

    function Tu(a, b) {
        var c = b.getAttribute("vl-bind");
        c && Lu(a, c, b)
    }

    function Ou(a) {
        var b = a.o().createElement("DIV"),
            c = a.Ma;
        c && (c = c(a.m), wa(c, "\x3ctr") && (b = a.o().createElement("TBODY")), b.innerHTML = c, 1 === b.childNodes.length && (b = b.firstChild));
        b.id = a.j();
        return b
    }
    n.focus = function() {
        return jj() ? !1 : Uu(this)
    };

    function Uu(a) {
        var b = null;
        a.Ha && (b = fb(a.Ha, function(a) {
            return a instanceof $ ? a.focus() : Uu(a)
        }));
        return !!b
    }
    n.Fj = function(a) {
        var b;
        a = this.ye(a);
        return this.J ? this.o().e(a) : (b = this.e()) ? yu(b, a) : null
    };
    n.getElementById = function(a) {
        return md(this.e(), function(b) {
            return b.id === a
        })
    };
    n.lb = function() {
        var a;
        a = this.e();
        a = new Fc(a.offsetWidth, a.offsetHeight);
        this.fn && Gc(this.fn, a) || (this.fn = a, this.Mr(a))
    };
    n.Mr = ba();

    function Vu(a, b) {
        a.Jg || (a.Jg = []);
        a.Jg.push(b)
    };

    function Wu(a) {
        $.call(this, a);
        this.kn = null;
        this.zc = "";
        this.Yn = {}
    }
    y(Wu, $);
    Wu.prototype.Qr = !1;
    Wu.prototype.Me = function(a, b, c) {
        this.kn = a;
        this.Yn = b;
        this.H.set(b);
        return this.load(c, !0)
    };
    Wu.prototype.v = function() {
        Wu.c.v.call(this);
        jj() || this.focus()
    };

    function Xu(a) {
        var b = a.Yn.appId;
        if (b) return a.m.Da = b, a.m.path = a.Yn.path, b = "/app/" + b, a.r().get(b).n(function(a) {
            this.m.appName = R(a, "displayName");
            a.ja();
            return null
        }, a);
        a.m.appName = "Create New App";
        return new G("done")
    };

    function Yu(a) {
        Wu.call(this, a);
        this.qd = this.ld = this.gb = null;
        this.Di = [];
        this.qt = [];
        this.Ul = null;
        this.$a = new qi("/");
        this.Er = this.Dr = this.xi = null;
        this.Wy = "vl-"
    }
    y(Yu, Wu);
    n = Yu.prototype;
    n.Qr = !0;
    n.pg = function() {
        return this.gb && this.gb.pg() || Yu.c.pg.call(this)
    };
    n.Me = function(a, b, c) {
        return Yu.c.Me.call(this, a, b, c).n(function() {
            return this.Vi(this.kn)
        }, this)
    };
    n.$ = function(a) {
        Yu.c.$.call(this, a);
        this.gb && !this.gb.J && Zu(this)
    };
    n.Vi = function(a, b) {
        this.kn = a;
        if (A && !ij(10)) {
            var c = window.location.hash || "";
            if ("/developer/app/" === Hi(window.location.href).l() || wa(c, "#_vline_")) return this.dispatchEvent(new P("cmd:unsupportedbrowser")), new G("NONE")
        }
        if (!(0 < this.Di.length)) return this.$a = a, new G("NONE");
        var d = a.l(),
            d = d.substr(this.zc.length),
            f, g = this.M().Wh() && !this.M().ak();
        if ((c = fb(this.Di, function(a) {
                f = a.test(d, g);
                return !!f
            })) && c.Xy() && !g)
            if ($u(this.pb())) c = null;
            else return Bh("LOGIN_REQUIRED");
        if (!c)
            if (c = fb(this.qt, function(a) {
                    return a.sz(g)
                })) c.pz() &&
                this.ec().Vn(this.zc + c.l());
            else return window.location = a, new G(this);
        f = f || {};
        f.path = a.l();
        return c ? av(this, c, a, f || {}, b) : Bh("NOT_FOUND")
    };

    function av(a, b, c, d, f) {
        if (a.Ul === b && a.gb && a.gb.Qr && !f) return a.gb.Me(c, d).n(function() {
            this.$a = c;
            this.Ul = b
        }, a);
        if (a.ld || a.xi) return a.xi = b, a.Dr = d, a.Er = c, new G(a);
        a.gb && (a.gb.nb("out-" + a.gb.j()), a.qd = a.gb, a.gb = null);
        a.ld = b.Iy();
        a.ra(a.ld, !1);
        f = null;
        if (!a.qd && a.e()) {
            var g = a.e();
            g && (f = yu(g, a.ld.j()))
        }
        return a.ld.Me(c, d, f).n(function() {
            this.$a = c;
            this.Ul = b;
            this.ld && (this.gb = this.ld, this.ld = null, this.e() && Zu(this))
        }, a).Mb(function(a) {
            var b = this.ld;
            b && (this.removeChild(b, !1), b.F());
            this.ld = null;
            if (this.gb =
                this.qd) this.gb.nb(this.gb.j().substr(4)), this.qd = null;
            if ("NOT_FOUND" === a.type) return this.Me("", {})
        }, a).Xe(function() {
            I(function() {
                if (this.xi) {
                    var a = this.xi;
                    this.xi = null;
                    av(this, a, this.Er, this.Dr)
                }
            }, 0, this)
        }, a)
    }

    function Zu(a) {
        a.qd && a.removeChild(a.qd, !1);
        if (!a.gb.e()) {
            a.gb.w();
            var b = a.e(),
                c = b.firstChild,
                d = a.gb.e();
            c ? (b.replaceChild(d, c), C && I(function() {
                pq(d, "border-color", "transparent")
            })) : b.appendChild(d)
        }
        a.qd && (a.qd.F(), a.qd = null);
        a.J && a.gb.v()
    }
    n.Ur = function() {
        var a, b = this.o(),
            c = $c(b.fa),
            d = 0,
            f = 0,
            g = this.$a.Wb;
        !Aa(g) && (a = zu(b.fa, g)) && (a = Bq(a), d = a.x, f = a.y);
        c.scrollTop = f;
        c.scrollLeft = d
    };

    function bv(a, b) {
        this.ni = b || "";
        this.bj = a || ""
    }
    var cv = /[()<>@,;:\\\".\[\]]/,
        dv = /\"/g,
        ev = /\\\"/g,
        fv = /\\/g,
        gv = /\\\\/g;
    bv.prototype.getName = e("ni");
    bv.prototype.jo = ca("ni");
    bv.prototype.toString = function() {
        var a = this.getName(),
            a = a.replace(dv, "");
        cv.test(a) && (a = '"' + a.replace(fv, "\\\\") + '"');
        return "" == a ? this.bj : "" == this.bj ? a : a + " \x3c" + this.bj + "\x3e"
    };
    bv.prototype.xg = function() {
        return /^[+a-zA-Z0-9_.!#$%&'*\/=?^`{|}~-]+@([a-zA-Z0-9-]+\.)+[a-zA-Z0-9]{2,6}$/.test(this.bj)
    };

    function hv(a, b) {
        if ('"' != a.charAt(b)) return !1;
        for (var c = 0, d = b - 1; 0 <= d && "\\" == a.charAt(d); d--) c++;
        return 0 != c % 2
    };

    function iv(a) {
        O.call(this);
        this.ue = [];
        jv(this, a)
    }
    y(iv, O);
    n = iv.prototype;
    n.Ad = null;
    n.Vr = null;
    n.qm = function() {
        return this.ue.length
    };
    n.Bh = function(a) {
        return this.ue[a] || null
    };

    function jv(a, b) {
        b && (z(b, function(a) {
            kv(this, a, !1)
        }, a), pb(a.ue, b))
    }
    n.Ve = function(a) {
        this.Yf(a, this.qm())
    };
    n.Yf = function(a, b) {
        a && (kv(this, a, !1), qb(this.ue, b, 0, a))
    };
    n.removeItem = function(a) {
        a && kb(this.ue, a) && a == this.Ad && (this.Ad = null, this.dispatchEvent("select"))
    };
    n.Jh = e("Ad");
    n.Lf = function(a) {
        a != this.Ad && (kv(this, this.Ad, !1), this.Ad = a, kv(this, a, !0));
        this.dispatchEvent("select")
    };
    n.um = function() {
        return this.Ad ? ab(this.ue, this.Ad) : -1
    };
    n.cs = function(a) {
        this.Lf(this.Bh(a))
    };
    n.clear = function() {
        ib(this.ue);
        this.Ad = null
    };
    n.k = function() {
        iv.c.k.call(this);
        delete this.ue;
        this.Ad = null
    };

    function kv(a, b, c) {
        b && ("function" == typeof a.Vr ? a.Vr(b, c) : "function" == typeof b.no && b.no(c))
    };

    function lv(a, b, c, d) {
        As.call(this, a, b, c, d);
        this.tj = a;
        mv(this)
    }
    y(lv, As);
    n = lv.prototype;
    n.qa = null;
    n.tj = null;
    n.v = function() {
        lv.c.v.call(this);
        mv(this);
        nv(this)
    };
    n.$ = function(a) {
        lv.c.$.call(this, a);
        (a = this.lg()) ? (this.tj = a, mv(this)) : this.cs(0)
    };
    n.k = function() {
        lv.c.k.call(this);
        this.qa && (this.qa.F(), this.qa = null);
        this.tj = null
    };
    n.Em = function(a) {
        this.Lf(a.target);
        lv.c.Em.call(this, a);
        a.stopPropagation();
        this.dispatchEvent("action")
    };
    n.nu = function() {
        var a = this.Jh();
        lv.c.ta.call(this, a && a.ba());
        mv(this)
    };
    n.Hi = function(a) {
        var b = lv.c.Hi.call(this, a);
        a != b && (this.qa && this.qa.clear(), a && (this.qa ? a.dc(function(a) {
            ov(a);
            this.qa.Ve(a)
        }, this) : pv(this, a)));
        return b
    };
    n.Ve = function(a) {
        ov(a);
        lv.c.Ve.call(this, a);
        this.qa ? this.qa.Ve(a) : pv(this, Cs(this))
    };
    n.Yf = function(a, b) {
        ov(a);
        lv.c.Yf.call(this, a, b);
        this.qa ? this.qa.Yf(a, b) : pv(this, Cs(this))
    };
    n.removeItem = function(a) {
        lv.c.removeItem.call(this, a);
        this.qa && this.qa.removeItem(a)
    };
    n.Lf = function(a) {
        if (this.qa) {
            var b = this.Jh();
            this.qa.Lf(a);
            a != b && this.dispatchEvent("change")
        }
    };
    n.cs = function(a) {
        this.qa && this.Lf(this.qa.Bh(a))
    };
    n.ta = function(a) {
        if (null != a && this.qa)
            for (var b = 0, c; c = this.qa.Bh(b); b++)
                if (c && "function" == typeof c.ba && c.ba() == a) {
                    this.Lf(c);
                    return
                }
        this.Lf(null)
    };
    n.Jh = function() {
        return this.qa ? this.qa.Jh() : null
    };
    n.um = function() {
        return this.qa ? this.qa.um() : -1
    };

    function pv(a, b) {
        a.qa = new iv;
        b && b.dc(function(a) {
            ov(a);
            this.qa.Ve(a)
        }, a);
        nv(a)
    }

    function nv(a) {
        a.qa && a.C().g(a.qa, "select", a.nu)
    }

    function mv(a) {
        var b = a.Jh();
        a.Rb(b ? b.lg() : a.tj)
    }

    function ov(a) {
        a.as(a instanceof ss ? "option" : "separator")
    }
    n.Sa = function(a, b) {
        lv.c.Sa.call(this, a, b);
        Fr(this, 64) && Cs(this).Le(this.um())
    };
    Ir("vl-select", function() {
        return new lv(null)
    });

    function Ru(a, b) {
        Mr.call(this, a || "", null, b);
        this.L = null
    }
    y(Ru, Mr);
    Ru.prototype.r = function() {
        return this.M().jf()
    };
    Ru.prototype.M = function() {
        return this.L.M()
    };
    Ru.prototype.ia = e("L");
    Ru.prototype.v = function() {
        Nr(this, !1);
        Ru.c.v.call(this);
        var a = this.ab();
        if (a) {
            var b = this.Ch();
            or(b, a);
            this.C().g(b, "key", this.Qc)
        }
    };

    function qv(a) {
        return "\x3cdiv" + (a.id ? ' id\x3d"' + a.id + '"' : "") + 'class\x3d"vl-css3-button' + (a.className ? " " + a.className : "") + '"' + (a.Kd ? 'vl-event\x3d"cmd:' + a.Kd + '"' : "") + "\x3e" + a.label + "\x3c/div\x3e"
    }

    function rv(a) {
        return "\x3cdiv value\x3d" + a.label + (a.id ? ' id\x3d"' + a.id + '"' : "") + 'class\x3d"vl-css3-button vl-css3-button-green-flat ' + (a.className ? " " + a.className : "") + '"' + (a.Kd ? 'vl-event\x3d"cmd:' + a.Kd + '"' : "") + "\x3e" + a.label + "\x3c/div\x3e"
    }

    function sv(a) {
        return '\x3cdiv id\x3d"' + a.id + '-err" class\x3d"' + a.className + '"' + (a.lm ? 'vl-fx\x3d"' + a.lm + '"' : "") + '\x3e\x3cdiv class\x3d"vl-content vl-err-text" vl-bind\x3d"' + a.bind + '"\x3e\x3c/div\x3e\x3c/div\x3e'
    }

    function tv(a) {
        var b = '\x3cdiv id\x3d"' + a.id + '" class\x3d"vl-form-wrap vl-' + a.Oa + '-form-wrap"\x3e' + (a.Kt ? '\x3cform id\x3d"' + a.id + '-form" class\x3d"' + a.Kt + " vl-" + a.Oa + '-form" vl-event\x3d"cmd:submit"\x3e' : '\x3cform id\x3d"' + a.id + '-form" class\x3d"vl-form vl-' + a.Oa + '-form" vl-event\x3d"cmd:submit"\x3e');
        if (a.heading || a.Pk) {
            b += '\x3ch2 id\x3d"' + a.id + '-heading" class\x3d"vl-form-heading vl-' + a.Oa + '-form-heading"\x3e';
            if (a.heading) b += a.heading;
            else if (a.Pk) switch (a.mode) {
                case "edit":
                    b += "Edit " + a.Pk;
                    break;
                case "new":
                    b += "Create " + a.Pk
            }
            b += "\x3c/h2\x3e"
        }
        var c = "vl-form-field-label vl-" + a.Oa + "-form-field-label",
            b = b + "",
            d;
        a.Qg ? d = "" : (d = of(a, {
            className: "vl-form-info",
            bind: "formInfo"
        }), d = '\x3ccaption class\x3d"vl-form-caption"\x3e' + ('\x3cdiv id\x3d"' + d.id + '-info" class\x3d"' + d.className + '"' + (d.lm ? 'vl-fx\x3d"' + d.lm + '"' : "") + '\x3e\x3cdiv class\x3d"vl-content vl-info-text" vl-bind\x3d"' + d.bind + '"\x3e\x3c/div\x3e\x3c/div\x3e') + sv(of(a, {
            className: "vl-form-err vl-" + a.Oa + "-form-err",
            bind: "formErr"
        })) + "\x3c/caption\x3e");
        b += '\x3ctable class\x3d"vl-form-controls"\x3e' + d + '\x3ctbody class\x3d"vl-form-fields vl-' + a.Oa + '-form-fields"\x3e';
        if (a.Qg) b += "\x3ctr\x3e" + uv(of(a.fm[0], {
            Nb: a.Nb,
            yq: c,
            Qg: !0,
            oc: a.oc
        })) + "\x3c/tr\x3e";
        else {
            d = a.fm;
            for (var f = d.length, g = 0; g < f; g++) b += uv(of(d[g], {
                Nb: a.Nb,
                yq: c,
                dn: g == f - 1
            }))
        }
        if (!1 == a.buttons || a.Qg) a = "";
        else {
            c = '\x3ctd colspan\x3d"' + (a.Nb ? 1 : 2) + '" class\x3d"vl-form-buttons vl-' + a.Oa + '-form-buttons"\x3e' + (a.uh ? '\x3cp class\x3d"vl-form-footer vl-' + a.Oa + '-form-footer"\x3e' + a.uh + "\x3c/p\x3e" : "") + (a.yj ?
                a.yj : "");
            if ("view" == a.mode) c += qv({
                id: a.id + "-edit",
                className: "vl-form-edit-button vl-" + a.Oa + "-form-edit-button",
                Kd: a.bc ? a.bc : "edit",
                label: "Edit"
            });
            else {
                c += "edit" == a.mode ? qv({
                    id: a.id + "-cancel",
                    className: "vl-form-cancel-button vl-" + a.Oa + "-form-cancel-button",
                    Kd: a.bc ? a.bc : "cancel",
                    label: "Cancel"
                }) : "";
                d = "";
                if (a.oc) d += a.oc;
                else switch (a.mode) {
                    case "edit":
                        d += "Save";
                        break;
                    case "new":
                        d += "Create"
                }
                c += qv({
                    id: a.id + "-submit",
                    className: "vl-css3-button-primary vl-form-submit-button vl-" + a.Oa + "-form-submit-button",
                    Kd: a.bc ? a.bc : "submit",
                    label: d
                })
            }
            a = "\x3ctfoot\x3e\x3ctr\x3e" + (c + "\x3c/td\x3e") + "\x3c/tr\x3e\x3c/tfoot\x3e"
        }
        return b += "\x3c/tbody\x3e" + a + "\x3c/table\x3e\x3c/form\x3e\x3c/div\x3e"
    }

    function uv(a) {
        var b = '\x3ctr id\x3d"' + a.id + '" class\x3d"vl-form-field vl-' + a.Oa + '-form-field"\x3e' + (a.Nb ? "" : '\x3ctd class\x3d"' + a.yq + '"\x3e' + a.label + '\x3cspan style\x3d"font-weight:normal;"\x3e:\x3c/span\x3e\x3c/td\x3e'),
            c = '\x3ctd id\x3d"' + a.id + '-val" class\x3d"vl-form-field-val ' + (a.Qg ? "vl-single-form-field-val" : "") + " vl-" + a.Oa + '-form-field-val"\x3e';
        if ("view" == a.mode) c += "url" == a.type ? '\x3ca href\x3d"#_link_" vl-bind\x3d"r.' + a.key + '"\x3e\x3c/a\x3e' : '\x3cspan vl-bind\x3d"r.' + a.key + '"\x3e\x3c/span\x3e';
        else if ("edit" != a.mode || a.ph) {
            c += '\x3cdiv id\x3d"' + a.id + '-input-wrap" class\x3d"vl-input-wrap vl-' + a.Oa + "-form-input-wrap" + (a.dn ? "" : " vl-input-wrap-internal") + '"\x3e';
            if ("select" == a.type) {
                c += (a.Nb ? '\x3cspan class\x3d"vl-select-label"\x3e' + a.label + ":\x3c/span\x3e" : "") + '\x3cdiv id\x3d"' + a.id + '-select" class\x3d"vl-select"\x3e\x3cul class\x3d"vl-menu"\x3e';
                a = a.Qu;
                for (var d = a.length, f = 0; f < d; f++) var g = a[f],
                    c = c + ("\x3cli class\x3d'vl-menuitem' value\x3d\"" + g.id + '"\x3e' + g.name + "\x3c/li\x3e");
                c += "\x3c/ul\x3e\x3c/div\x3e"
            } else {
                if (a.Qg)
                    if (d =
                        (a.uh ? '\x3cp class\x3d"vl-form-footer vl-' + a.Oa + '-form-footer"\x3e' + a.uh + "\x3c/p\x3e" : "") + (a.yj ? a.yj : ""), "view" == a.mode) d += rv({
                        id: a.id + "-edit",
                        className: "vl-form-edit-button vl-" + a.Oa + "-form-edit-button",
                        Kd: a.bc ? a.bc : "edit",
                        label: "Edit"
                    });
                    else {
                        d += "edit" == a.mode ? rv({
                            id: a.id + "-cancel",
                            className: "vl-form-cancel-button vl-" + a.Oa + "-form-cancel-button",
                            Kd: a.bc ? a.bc : "cancel",
                            label: "Cancel"
                        }) : "";
                        f = "";
                        if (a.oc) f += a.oc;
                        else switch (a.mode) {
                            case "edit":
                                f += "Save";
                                break;
                            case "new":
                                f += "Create"
                        }
                        d += rv({
                            id: a.id + "-submit",
                            className: "vl-form-inline-button vl-" + a.Oa + "-form-submit-button",
                            Kd: a.bc ? a.bc : "submit",
                            label: f
                        })
                    } else d = "";
                c += '\x3cinput id\x3d"' + a.id + '-input" type\x3d"' + a.type + '" class\x3d"' + (a.Qg ? "vl-single-label-input" : "vl-label-input") + " vl-form-input vl-" + a.Oa + '-form-input" name\x3d"key"' + ("edit" == a.mode && "password" == a.type ? 'label\x3d"\x26bull;\x26bull;\x26bull;\x26bull;\x26bull;\x26bull;"' : a.Nb ? 'label\x3d"' + a.label + '"' : a.sq ? 'label\x3d"' + a.sq + '"' : "") + 'vl-bind\x3d"r.' + a.key + '"\x3e' + d + sv(of(a, {
                    className: "vl-form-field-err vl-" +
                        a.Oa + "-form-field-err",
                    bind: "fieldErr"
                }))
            }
            c += "\x3c/div\x3e"
        } else c += "url" != a.type || a.ph ? '\x3cdiv class\x3d"' + (a.dn ? "" : " vl-input-wrap-internal") + '" vl-bind\x3d"r.' + a.key + '"\x3e\x3c/div\x3e' : '\x3cdiv class\x3d"' + (a.dn ? "" : " vl-input-wrap-internal") + '"\x3e\x3ca href\x3d"#_link_" vl-bind\x3d"r.' + a.key + '"\x3e\x3c/a\x3e\x3c/div\x3e';
        return b + (c + "\x3c/td\x3e") + "\x3c/tr\x3e"
    };

    function vv(a, b, c) {
        b = a = "";
        for (var d = 0; d < c.length;) {
            var f;
            f = c.charAt(d);
            var g = '"\x3c(['.indexOf(f);
            if (-1 != g && !hv(c, d)) {
                for (var g = '"\x3e)]'.charAt(g), h = c.indexOf(g, d + 1); 0 <= h && hv(c, h);) h = c.indexOf(g, h + 1);
                f = 0 <= h ? c.substring(d, h + 1) : f
            }
            "\x3c" == f.charAt(0) && -1 != f.indexOf("\x3e") ? b = f.substring(1, f.indexOf("\x3e")) : "" == b && (a += f);
            d += f.length
        }
        "" == b && -1 != a.indexOf("@") && (b = a, a = "");
        a = za(a);
        a = Qa(a, "'");
        a = Qa(a, '"');
        a = a.replace(ev, '"');
        a = a.replace(gv, "\\");
        b = za(b);
        if (!(new bv(b, a)).xg()) return "INVALID_EMAIL"
    }

    function wv(a, b, c) {
        if (6 > c.length) return "INVALID_PASSWORD"
    }

    function xv() {}

    function yv(a, b, c) {
        a = zv(this.Mp, "password");
        if (null != a && c !== a.ba()) return "PASSWORDS_DONT_MATCH"
    }

    function Av(a, b, c) {
        if (Fa(c) !== c) return "INVALID_FIELD"
    }

    function Bv(a, b, c) {
        a = new qi(c);
        b = a.toString();
        if (!a.yd || b !== c) return "INVALID_URL"
    }

    function Cv(a, b, c, d, f) {
        $.call(this, f);
        this.Mp = a;
        this.$c = [];
        this.m.key = b;
        this.m.label = c || b;
        this.m.sq = void 0;
        this.m.name = this.m.label;
        this.m.type = d || "text";
        this.m.ph = !0;
        this.m.required = !1
    }
    y(Cv, $);
    n = Cv.prototype;
    n.Ma = uv;
    n.getKey = function() {
        return this.m.key
    };
    n.Ne = function(a) {
        this.m.type = a;
        "email" === a ? jb(this.$c, vv) : "password" === a && jb(this.$c, wv)
    };
    n.jd = function() {
        return this.m.label
    };
    n.getName = function() {
        return this.m.name
    };
    n.jo = function(a) {
        this.m.name = a
    };

    function Dv(a, b) {
        a.Q().set("valid", b);
        a.m.qz && a.wj("vl-form-field-valid", "vl-form-input-valid", b)
    }

    function Ev(a, b) {
        a.Q().set("invalid", b);
        a.wj("vl-form-field-invalid", "vl-form-input-invalid", b)
    }
    n.wj = function(a, b, c) {
        (b = this.e()) && Dc(b, a, c)
    };

    function Fv(a) {
        return "new" === Gv(a.Mp) || a.m.ph
    }
    n.clear = function() {
        this.ta("");
        this.If();
        Dv(this, !1);
        Ev(this, !1)
    };
    n.If = function(a) {
        var b = !Aa(Va(a));
        a = b && (a in M ? M[a](this.m) : a);
        this.H.set("fieldErr", a);
        Ev(this, b);
        b && Dv(this, !1)
    };
    n.pv = function() {
        this.Wg(!0)
    };
    n.rx = function(a) {
        this.ta(a.ba())
    };
    n.Y = function() {
        Dv(this, !1);
        Ev(this, !1);
        return new G(this)
    };

    function Hv(a, b, c, d, f) {
        Cv.call(this, a, b, c, d, f);
        this.wc = null;
        this.m.Kq = void 0
    }
    y(Hv, Cv);
    n = Hv.prototype;
    n.wj = function(a, b, c) {
        Hv.c.wj.call(this, a, b, c);
        (a = this.wc && this.wc.e()) && Dc(a, b, c)
    };
    n.$ = function(a) {
        Hv.c.$.call(this, a);
        this.wc = $q(this, this.ye("input"))
    };
    n.v = function() {
        Hv.c.v.call(this);
        if (this.wc) {
            Nu(this, "value", this.rx);
            var a = this.wc.e();
            this.C().g(a, "blur", this.pv, !1, this)
        }
    };
    n.ba = function() {
        return this.wc ? Ba(this.wc.ba()) : ""
    };
    n.ta = function(a) {
        this.wc && this.wc.ta(a)
    };
    n.Wg = function(a) {
        var b = !0,
            c = !1;
        if (this.wc) {
            var d, f = this.ba(),
                g = this.jd();
            Aa(f) ? !a && this.m.required && (d = "FIELD_REQUIRED", c = b = !1) : (a = this.m.Kq, null != a && f.length > a && (d = "FIELD_MAX_LENGTH_EXCEEDED", b = !1), b && db(this.$c, function(a) {
                (d = a.call(this, this.j(), g, f)) && (b = !1);
                return !b
            }, this), c = b);
            this.If(d);
            Dv(this, c)
        }
        return b
    };
    n.focus = function() {
        if (Fv(this)) {
            if (this.wc) {
                var a = this.wc.e();
                a.focus();
                a.select()
            }
            return !0
        }
        return !1
    };

    function Iv(a, b, c, d, f, g, h, k) {
        Cv.call(this, a, b, g, h, k);
        this.zd = null;
        this.bo = d || null;
        this.Ox = f;
        this.m.Qu = c
    }
    y(Iv, Cv);
    n = Iv.prototype;
    n.$ = function(a) {
        Iv.c.$.call(this, a);
        this.zd = $q(this, this.ye("select"))
    };
    n.v = function() {
        Iv.c.v.call(this);
        this.zd && (this.C().g(this.zd, "action", function(a) {
            this.Ox(a)
        }), this.bo && this.zd.ta(this.bo))
    };
    n.ba = function() {
        return this.zd ? this.zd.ba() : ""
    };
    n.ta = function(a) {
        this.zd ? this.zd.ta(a) : this.bo = a
    };
    n.Wg = l(!0);
    n.focus = function() {
        return Fv(this) ? (this.zd && this.zd.e().focus(), !0) : !1
    };

    function Jv(a, b) {
        $.call(this, b);
        this.hy = "entity";
        this.Qi = this.kg = this.Sy = null;
        this.sh = [];
        this.m.fm = [];
        this.m.Oa = a
    }
    y(Jv, $);
    n = Jv.prototype;
    n.Ma = tv;
    n.ng = l(null);

    function Gv(a) {
        return a.m.mode || "new"
    }
    n.Ne = ca("hy");
    n.If = function(a) {
        a = a && (a in M ? M[a](void 0) : a);
        this.H.set("formErr", a)
    };

    function Kv(a, b) {
        a.H.set("formInfo", b)
    }

    function Lv(a, b, c, d, f, g, h) {
        b = new Hv(a, b, d, c, a.o());
        b.m.ph = t(g) ? g : !0;
        f && (b.m.required = !0);
        h && jb(b.$c, h);
        a.sh.push(b);
        a.te() && Mv(a, b);
        return b
    }

    function Mv(a, b) {
        a.kg.ra(b);
        a.m.fm.push(b.getData())
    }

    function Nv(a, b, c, d) {
        b = new Iv(a, "dummy", b, c, d, "Thumbnail", "select", a.o());
        b.m.ph = !0;
        b.m.required = !0;
        a.sh.push(b);
        a.te() && Mv(a, b);
        return b
    }

    function Ov(a, b, c, d) {
        a = Lv(a, b, "text", c, !0, d, void 0);
        jb(a.$c, Av)
    }

    function Pv(a, b, c, d, f) {
        a = Lv(a, "password", "password", b, c, d, f);
        null == f && jb(a.$c, wv);
        return a
    }

    function Qv(a, b, c) {
        a = Lv(a, b, "password", "Confirm Password", c, void 0, void 0);
        jb(a.$c, yv)
    }

    function Rv(a, b, c, d) {
        a = Lv(a, b, "email", c, d, void 0, void 0);
        jb(a.$c, vv);
        return a
    }

    function Sv(a, b) {
        var c = Lv(a, "thumbnailUrl", "url", "Thumbnail URL", !0, b, void 0);
        jb(c.$c, Bv);
        return c
    }

    function zv(a, b) {
        return fb(a.sh, function(a) {
            return a.getKey() === b
        })
    }

    function Tv(a, b, c) {
        var d = c || a;
        z(a.sh, function(a) {
            b.call(d, a)
        })
    }
    n.ba = function(a) {
        if (a = zv(this, a)) return a.ba()
    };
    n.ta = function(a, b) {
        Gu(this).set(a, b);
        var c = zv(this, a);
        c && c.ta(b)
    };
    n.cb = function() {
        var a = {};
        Tv(this, function(b) {
            if (Fv(b)) {
                var c = b.ba();
                Aa(Va(c)) && (c = void 0);
                a[b.getKey()] = c
            }
        }, this);
        return a
    };
    n.Y = function() {
        this.kg = new Ru("");
        this.kg.Ke(!0);
        Sr(this.kg, 32, !1);
        Ju(this, this.kg);
        z(this.sh, function(a) {
            Mv(this, a)
        }, this);
        return Jv.c.Y.call(this)
    };
    n.$ = function(a) {
        Jv.c.$.call(this, a);
        this.Qi = $q(this.kg || this, this.ye("submit"))
    };
    n.v = function() {
        Jv.c.v.call(this);
        this.C().g(this, "cmd:edit", this.Ev).g(this, "cmd:submit", this.or).g(this, "cmd:cancel", this.sv);
        this.Wg(!0)
    };
    n.Ev = function(a) {
        a.stopPropagation();
        this.navigate(this.ec().bb() + "/edit")
    };
    n.or = function(a) {
        a.stopPropagation();
        this.Wg() && (this.Qi && this.Qi.Ga(!1), Gu(this).set(this.cb()), this.Cd().el(this.Zd, this.Yd, this).Xe(this.Lw, this))
    };
    n.sv = function(a) {
        a.stopPropagation();
        a = this.ec().bb();
        xa(a, "/edit") && (a = a.substr(0, a.length - 5));
        this.navigate(a)
    };
    n.Zd = ba();
    n.Yd = function(a) {
        a instanceof N ? "NONE" !== a.X() && this.If(a.X()) : this.If(a.message);
        Tv(this, function(a) {
            Dv(a, !1)
        });
        this.focus();
        if (a = a.map) {
            var b = !1;
            Hc(a, function(a, d) {
                var f = zv(this, d);
                f.If(a.X());
                b || (b = f.focus())
            }, this)
        }
    };
    n.Lw = function() {
        this.Qi && this.Qi.Ga(!0)
    };
    n.Cd = function() {
        var a = this.ng();
        if (a) {
            var b = Gu(this);
            switch (Gv(this)) {
                case "new":
                    return this.r().sd(a, b, b.j());
                case "edit":
                    return this.r().put(b.l(), b)
            }
        }
        return new G({})
    };
    n.Wg = function(a) {
        var b = !0;
        Tv(this, function(c) {
            c.Wg(a) || (b = !1)
        });
        return b
    };
    n.clear = function() {
        Tv(this, function(a) {
            a.clear()
        });
        this.If()
    };
    n.$r = function(a) {
        this.m.mode = a
    };

    function Uv(a) {
        return tv(of(a, {
            oc: "Create",
            Nb: !0
        }))
    }

    function Vv(a) {
        return "view" == a.mode ? tv(of(a, {
            bc: "edituserlaunchpopup"
        })) : "edit" == a.mode ? tv(a) : tv(of(a, {
            oc: "Create",
            Nb: !0
        }))
    };

    function Wv(a) {
        Jv.call(this, "signin", a);
        this.Ne("authRequest");
        this.Ta("Sign in")
    }
    y(Wv, Jv);
    Wv.prototype.Ma = function(a) {
        return a = "" + tv(of(a, {
            oc: "Sign in",
            Nb: !0,
            yj: "vline" == a.Ys.Da ? '\x3cdiv class\x3d"vl-css3-button vl-signin-signup" vl-cmd\x3d"register"\x3eSign up\x3c/div\x3e' : "",
            uh: '\x3ca class\x3d"vl-signin-forgot" href\x3d"#_vline_forgotpassword"\x3eForgot password?\x3c/a\x3e'
        }))
    };
    Wv.prototype.Y = function() {
        Rv(this, "email", pf(), !0);
        Pv(this, "Password", !0, !0, xv);
        return Wv.c.Y.call(this)
    };
    Wv.prototype.Cd = function() {
        return Un(this.r(), Gu(this))
    };
    Wv.prototype.Zd = ba();

    function Xv(a) {
        Jv.call(this, "register", a);
        this.Ne("register");
        this.Ta("Sign Up")
    }
    y(Xv, Jv);
    Xv.prototype.Ma = function(a) {
        return tv(of(a, {
            oc: "Sign up",
            Nb: !0,
            uh: '\x3ca class\x3d"vl-signin-forgot" href\x3d"#_vline_signin"\x3eAlready have an account?\x3c/a\x3e'
        }))
    };
    Xv.prototype.Y = function() {
        this.m.Da = this.M().oa();
        var a = Rv(this, "email", "Enter your email address to sign up", !0);
        a.jo(pf());
        a.focus();
        return Xv.c.Y.call(this)
    };
    Xv.prototype.Cd = function() {
        return this.r().call("register", Gu(this))
    };
    Xv.prototype.Zd = function() {
        this.dispatchEvent("cmd:registersuccess");
        this.clear()
    };

    function Yv(a) {
        Jv.call(this, "forgotpassword", a);
        this.Ta("Forgot Password")
    }
    y(Yv, Jv);
    Yv.prototype.Ma = function(a) {
        return tv(of(a, {
            Nb: !0,
            Pk: "Forgot Password",
            oc: "Submit"
        }))
    };
    Yv.prototype.Y = function() {
        this.m.Da = this.M().oa();
        Rv(this, "email", "Enter your email address to reset password", !0).jo(pf());
        return Yv.c.Y.call(this)
    };
    Yv.prototype.Cd = function() {
        return this.r().call("resetPassword", Gu(this))
    };
    Yv.prototype.Zd = function() {
        this.dispatchEvent("cmd:forgotpasswordsuccess");
        this.clear()
    };

    function Zv(a, b) {
        Jv.call(this, "accountexists", b);
        this.Ta("Account Exists");
        Kv(this, "There is already an account associated with " + a + ".")
    }
    y(Zv, Jv);
    Zv.prototype.Ma = function(a) {
        return tv(of(a, {
            oc: "Sign in",
            bc: "signin",
            Nb: !0
        }))
    };

    function $v(a, b, c) {
        Jv.call(this, b || "account", c);
        this.m.Da = a;
        this.Ne("account");
        this.Zc = null;
        this.Ie = aw;
        this.ao = null;
        this.Ta("Create User")
    }
    y($v, Jv);
    $v.prototype.Ma = Uv;
    var aw = "Gravatar",
        bw = {
            sy: aw,
            qy: "Custom Image"
        };
    n = $v.prototype;
    n.$ = function(a) {
        $v.c.$.call(this, a);
        "edit" === Gv(this) && (a = this.Zc.ba(), wa(a, "https://www.gravatar.com/avatar/") || (this.Ie = "Custom Image"));
        cw(this, this.Ie)
    };
    n.Y = function() {
        this.Cq();
        return $v.c.Y.call(this)
    };
    n.v = function() {
        $v.c.v.call(this);
        this.ao && this.ao.ta(this.Ie)
    };
    n.Cq = function() {
        Ov(this, "displayName", "Full Name");
        Rv(this, "email", pf(), !0);
        var a = Gv(this);
        if ("view" !== a) {
            a = "new" === a;
            Pv(this, "Password", a);
            Qv(this, "_passwordConfirm", a);
            var b = [];
            Hc(bw, function(a, d) {
                b.push({
                    id: d,
                    name: a
                })
            });
            a = w(function(a) {
                this.Ie = a.target.ba();
                cw(this, this.Ie)
            }, this);
            this.ao = Nv(this, b, this.Ie, a);
            this.Zc = Sv(this, !0)
        } else this.Zc = Sv(this, !1), Ov(this, "id", "User ID", !1)
    };

    function cw(a, b) {
        "view" !== Gv(a) && a.Zc && (b === aw ? (a.Zc.show(!1), a.Zc.m.required = !1) : (a.Zc.show(!0), a.Zc.m.required = !0))
    }
    n.Cd = function() {
        if ("view" !== Gv(this) && this.Ie === aw) {
            var a = Oe(zv(this, "email").ba());
            this.Zc.ta(a)
        }
        return $v.c.Cd.call(this)
    };
    n.ng = function() {
        return "edit" === Gv(this) ? bl(this.m.Da, Gu(this).j()) : bl(this.m.Da)
    };
    n.Zd = function() {
        "edit" == Gv(this) ? this.dispatchEvent("cmd:editusersuccess") : this.dispatchEvent("cmd:addusersuccess")
    };
    n.cb = function() {
        if ("view" !== Gv(this) && this.Zc && this.Ie === aw) {
            var a = Oe(zv(this, "email").ba());
            this.Zc.ta(a)
        }
        var a = $v.c.cb.call(this),
            b = this.m.Da,
            c = a.id;
        c && -1 == c.indexOf(":") && (a.id = b + ":" + c);
        a.dummy && delete a.dummy;
        return a
    };

    function dw(a, b, c) {
        $v.call(this, b, "signup", c);
        this.m.Re = a;
        this.Ta("Create Account")
    }
    y(dw, $v);
    n = dw.prototype;
    n.Ma = Uv;
    n.Cq = function() {
        this.m.Da = this.M().oa();
        if ("vline" === this.m.Da) {
            var a = this.pb();
            a.Uj = "/developer/firstuse/app"
        } else a = this.pb(), a.Uj = "/testcall";
        a.Z = "/";
        a = co(new bo(this.m.Re, !0)).email;
        this.m.hg = a;
        Kv(this, " Email:  " + a);
        Ov(this, "displayName", "Full Name");
        a = Pv(this, "Password", !0);
        jb(a.$c, wv);
        Qv(this, "_confirmPassword", !0)
    };
    n.Cd = function() {
        var a = Gu(this);
        a.set("token", this.m.Re);
        this.ng();
        switch (Gv(this)) {
            case "new":
                return Wn(this.r(), a);
            case "edit":
                return this.r().put(a.l(), a)
        }
        return new G({})
    };
    n.Zd = function() {
        this.dispatchEvent("cmd:signupsuccess")
    };
    n.Yd = function(a) {
        a instanceof N && "EMAIL_EXISTS" === a.X() ? this.dispatchEvent(new lt(this.m.hg)) : dw.c.Yd.call(this, a)
    };

    function ew(a, b, c) {
        Jv.call(this, b || "invite", c);
        a && (this.m.Da = a);
        this.Ne("account");
        this.Ta("Invite Users")
    }
    y(ew, Jv);
    n = ew.prototype;
    n.Ma = function(a) {
        return tv(of(a, {
            oc: "Send Invitations",
            Nb: !0
        }))
    };
    n.Y = function() {
        Rv(this, "_email1", pf(), !1);
        Rv(this, "_email2", pf(), !1);
        Rv(this, "_email3", pf(), !1);
        Rv(this, "_email4", pf(), !1);
        return ew.c.Y.call(this)
    };
    n.ng = function() {
        return bl(this.m.Da)
    };
    n.Zd = function() {
        this.dispatchEvent("cmd:inviteusersuccess")
    };
    n.cb = function() {
        var a = ew.c.cb.call(this),
            b = a.email;
        b && (a.displayName = b.substring(0, b.indexOf("@")));
        return a
    };

    function fw(a, b) {
        var c = a.ng();
        if (c && null != b) {
            var d = {
                email: b
            };
            d.displayName = b.substring(0, b.indexOf("@"));
            d.thumbnailUrl = Oe(b);
            return a.r().sd(c, d)
        }
        return new G({})
    }
    n.Cd = function() {
        var a = this.cb();
        return zh(fw(this, a._email1), fw(this, a._email2), fw(this, a._email3), fw(this, a._email4))
    };

    function gw(a, b) {
        Jv.call(this, "updatepassword", b);
        this.m.Re = a;
        this.Ta("Reset Password")
    }
    y(gw, Jv);
    n = gw.prototype;
    n.Ma = function(a) {
        return tv(of(a, {
            oc: "Submit",
            Nb: !0
        }))
    };
    n.Y = function() {
        var a = co(new bo(this.m.Re, !0)).email;
        Kv(this, " Email:  " + a);
        this.m.Da = this.M().oa();
        a = Pv(this, "Enter new password", !0);
        jb(a.$c, wv);
        Qv(this, "_confirmPassword", !0);
        return gw.c.Y.call(this)
    };
    n.Cd = function() {
        Gu(this).set("token", this.m.Re);
        return this.r().call("updatePassword", Gu(this))
    };
    n.Zd = function() {
        this.dispatchEvent("cmd:resetpasswordsuccess")
    };
    n.Yd = function(a) {
        gw.c.Yd.call(this, a)
    };

    function hw(a, b) {
        Jv.call(this, "updateemail", b);
        this.m.Re = a;
        this.Ta("Update email");
        Kv(this, "Updating your email...")
    }
    y(hw, Jv);
    hw.prototype.Ma = function(a) {
        return '\x3cdiv style\x3d"min-width: 300px"\x3e' + tv(of(a, {
            buttons: !1
        })) + "\x3c/div\x3e"
    };
    hw.prototype.Y = function() {
        this.or(new Kg("cmd:submit"));
        return hw.c.Y.call(this)
    };
    hw.prototype.Cd = function() {
        Gu(this).set("token", this.m.Re);
        return this.r().call("updateEmail", Gu(this))
    };
    hw.prototype.Zd = function() {
        this.dispatchEvent("cmd:updateemailsuccess")
    };

    function iw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cdiv\x3eYour account is ready. Sign in to get started.\x3c/div\x3e\x3cdiv class\x3d"vl-css3-button vl-css3-button-primary vl-form-button-padding vl-form-submit-button" style\x3d"float:right;" vl-cmd\x3d"appsignin"\x3eSign in\x3c/div\x3e\x3cdiv style\x3d"clear:both;"\x3e\x3c/div\x3e\x3c/div\x3e'
    }

    function jw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cdiv\x3eYour password has been updated!\x3c/div\x3e\x3cdiv class\x3d"vl-css3-button vl-css3-button-primary vl-form-button-padding vl-form-submit-button" style\x3d"float:right;" vl-cmd\x3d"appsignin"\x3eSign in\x3c/div\x3e\x3cdiv style\x3d"clear:both;"\x3e\x3c/div\x3e\x3c/div\x3e'
    }

    function kw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cdiv\x3eYour email has been updated!\x3c/div\x3e\x3cdiv class\x3d"vl-css3-button vl-css3-button-primary vl-form-button-padding vl-form-submit-button" style\x3d"float:right;" vl-cmd\x3d"appsignin"\x3eOK\x3c/div\x3e\x3cdiv style\x3d"clear:both;"\x3e\x3c/div\x3e\x3c/div\x3e'
    };

    function lw(a) {
        Wu.call(this, a);
        this.m.mode = "new"
    }
    y(lw, Wu);
    lw.prototype.Me = function(a, b) {
        this.m.mode = b.mode || "new";
        this.m.Nr = b.resourceName;
        this.m.Nr && (this.m.Lg = b[this.m.Nr + "Id"]);
        return lw.c.Me.call(this, a, b)
    };
    lw.prototype.Y = function() {
        var a = this.m.Lg;
        if (a) {
            var b = mw(this).n(function(c) {
                c || b.ma(new N("NOT_FOUND", a));
                this.H.set("r", c);
                this.m.Lg = c && c.j();
                c.ja();
                Wu.prototype.Y.call(this)
            }, this);
            return b
        }
        return lw.c.Y.call(this)
    };

    function nw(a, b, c) {
        $v.call(this, a, b || "account", c)
    }
    y(nw, $v);
    nw.prototype.Ma = Vv;
    nw.prototype.Y = function() {
        Xh(Gu(this), "_editable") || (this.m.buttons = !1);
        return nw.c.Y.call(this)
    };

    function ow(a) {
        lw.call(this, a);
        this.hn = null
    }
    y(ow, lw);
    ow.prototype.Ma = function(a) {
        return ("view" == a.mode ? '\x3cdiv class\x3d"vl-app-title"\x3e\x3ca href\x3d"/developer/app/"\x3eMy Services\x3c/a\x3e\x3cspan\x3e \x3e  \x3c/span\x3e\x3ca href\x3d"' + ("/developer/app/" + a.Da + "/user/") + '"\x3e' + a.Da + "\x3c/a\x3e\x3cspan\x3e \x3e  \x3c/span\x3e" + (a.gg ? "\x3cspan\x3e" + a.gg + "\x3c/span\x3e" : a.hg ? "\x3cspan\x3e" + a.hg + "\x3c/span\x3e" : "\x3cspan\x3e" + a.uid + "\x3c/span\x3e") + "\x3c/div\x3e" : "") + '\x3cdiv id\x3d"' + a.id + '"\x3e' + Vv(of(a.Ko, {
            mode: a.mode,
            Ko: a.Ko
        })) + "\x3c/div\x3e"
    };
    ow.prototype.Y = function() {
        this.hn && (this.m.mode = this.hn);
        var a = new nw;
        this.m.Ko = Iu(this, a);
        this.m.uid = this.m.Lg;
        return Xu(this).n(function() {
            return lw.prototype.Y.call(this)
        }, this)
    };
    ow.prototype.$r = ca("hn");
    ow.prototype.v = function() {
        ow.c.v.call(this);
        this.C().g(this, "cmd:edituserlaunchpopup", w(function() {
            var a = new jt(this.m.Da, this.m.uid);
            this.dispatchEvent(a)
        }, this))
    };

    function mw(a) {
        var b = a.m.Da,
            c = a.m.uid = a.m.Lg,
            d = bl(a.m.Da, c),
            f = el(b, b);
        return zh(a.r().qb(c), a.r().get(f)).n(function(a, f) {
            var k = a.Q(),
                m = new L;
            m.$b(d);
            bi(m, k, "displayName");
            bi(m, k, "thumbnailUrl");
            this.m.gg = R(k, "displayName");
            Vu(this, a);
            Ne(c) === b && "managed" === R(f, "authType") && m.set("_editable", !0);
            return ao(this.r(), b, c).n(function(a) {
                this.m.hg = R(a, "email");
                bi(m, a, "email");
                bi(m, a, "id");
                Vu(this, a)
            }, this).Xe(function() {
                return m
            })
        }, a)
    };

    function pw(a, b) {
        Zt.call(this, a, b);
        this.$i = this.Se = this.xy = this.oh = this.Uh = this.eh = this.Mi = this.ce = this.Nf = this.Ge = this.Te = this.Ui = this.Ai = this.le = this.vh = this.Ee = this.yi = this.Ki = null;
        this.We()
    }
    y(pw, Zt);
    n = pw.prototype;
    n.Zk = !1;
    n.k = function() {
        this.ef();
        pw.c.k.call(this)
    };
    n.We = function() {
        this.C().g(this, "hide", this.ef).g(this, Co, this.Qw).g(this, "cmd:register", this.Bw).g(this, "cmd:registersuccess", this.Aw).g(this, "cmd:signup", this.Uw).g(this, "cmd:signupsuccess", this.Tw).g(this, "cmd:signupexists", this.Sw).g(this, "cmd:resetpassword", this.Jw).g(this, "cmd:resetpasswordsuccess", this.Iw).g(this, "cmd:updateemail", this.Rs).g(this, "cmd:updateemailsuccess", this.mx).g(this, "cmd:forgotpassword", this.Kv).g(this, "cmd:adduser", this.nv).g(this, "cmd:edituser", this.$q).g(this, "cmd:inviteuser",
            this.aw).g(this, "cmd:inviteusersuccess", this.$v).g(this, "cmd:addusersuccess", this.mv).g(this, "cmd:edituser", this.$q).g(this, "cmd:editusersuccess", this.Rh).g(this, "cmd:forgotpasswordsuccess", this.Jv).g(this, "cmd:unsupportedbrowser", this.lx)
    };
    n.Qw = function(a) {
        var b = this.Ki || (this.Ki = new Wv);
        qw(this, a, b)
    };
    n.Bw = function(a) {
        var b = this.yi || (this.yi = new Xv);
        qw(this, a, b)
    };
    n.Uw = function(a) {
        var b = a.get("token"),
            b = this.Nf || (this.Nf = new dw(b));
        qw(this, a, b)
    };
    n.Jw = function(a) {
        var b = a.get("token"),
            b = this.Ai || (this.Ai = new gw(b));
        qw(this, a, b)
    };
    n.Rs = function(a) {
        var b = a.get("token"),
            b = this.Ui || (this.Ui = new hw(b));
        qw(this, a, b)
    };
    n.nv = function(a) {
        var b = this.eh || (this.eh = new $v(a.Da));
        qw(this, a, b)
    };
    n.aw = function(a) {
        var b = this.Uh || (this.Uh = new ew(a.Da));
        qw(this, a, b)
    };
    n.$q = function(a) {
        var b = this.oh || (this.oh = new ow(this.o()));
        b.$r("edit");
        var c = a.ly;
        b.m.Da = a.Da;
        b.m.Lg = c;
        b.Ta("Edit User");
        qw(this, a, b)
    };
    n.Aw = function(a) {
        this.Ee || (this.Ee = new $, this.Ee.Ma = rw, this.Ee.Ta("Thank You!"));
        qw(this, a, this.Ee)
    };
    n.Kv = function(a) {
        var b = this.vh || (this.vh = new Yv);
        qw(this, a, b)
    };
    n.Jv = function(a) {
        this.le || (this.le = new $, this.le.Ma = sw, this.le.Ta("Reset Password"));
        qw(this, a, this.le)
    };
    n.lx = function(a) {
        this.Se || (this.Se = new $, this.Se.Ma = tw, this.Se.Ta("Browser Not Supported"));
        qw(this, a, this.Se)
    };
    n.Tw = function(a) {
        this.ce || (this.ce = new $, this.ce.Ma = iw, this.ce.Ta("Account Created"));
        qw(this, a, this.ce)
    };
    n.Sw = function(a) {
        var b = this.Mi || (this.Mi = new Zv(a.hg));
        qw(this, a, b)
    };
    n.Iw = function(a) {
        this.Ge || (this.Ge = new $, this.Ge.Ma = jw, this.Ge.Ta("Password Reset"));
        qw(this, a, this.Ge)
    };
    n.mx = function(a) {
        this.Te || (this.Te = new $, this.Te.Ma = kw, this.Te.Ta("Email updated"));
        qw(this, a, this.Te)
    };
    n.mv = function() {
        this.Rh()
    };
    n.$v = function() {
        this.Rh()
    };

    function qw(a, b, c) {
        b.stopPropagation();
        a.kj = b.type;
        c instanceof Jv && (a.$i && (b = a.$i.ba("email")) && c.ta("email", b), a.$i = c);
        $t(a, c)
    }
    n.ef = function(a) {
        if (!a || a.target === this) {
            this.kj = void 0;
            this.$i = null;
            this.Ki && (this.Ki.F(), this.Ki = null);
            this.yi && (this.yi.F(), this.yi = null);
            this.Nf && (this.Nf.F(), this.Nf = null);
            this.Ai && (this.Ai.F(), this.Ai = null);
            this.eh && (this.eh.F(), this.eh = null);
            this.Uh && (this.Uh.F(), this.Uh = null);
            this.oh && (this.oh.F(), this.oh = null);
            this.Ee && (this.Ee.F(), this.Ee = null);
            this.vh && (this.vh.F(), this.vh = null);
            this.le && (this.le.F(), this.le = null);
            this.Nf && (this.Nf.F(), this.ce = null);
            this.ce && (this.ce.F(), this.ce = null);
            this.Mi && (this.Mi.F(), this.Mi = null);
            this.Ge && (this.Ge.F(), this.Ge = null);
            this.Ui && (this.Ui.F(), this.Ui = null);
            this.Te && (this.Te.F(), this.Te = null);
            this.Se && (this.Se.F(), this.Se = null);
            var b = this.getParent();
            b && b instanceof uw && b.execute(function() {
                b.show(!1)
            })
        }
    };

    function rw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cp class\x3d"vl-dialog-msg"\x3eCheck your email to complete your signup.\x3c/p\x3e\x3c/div\x3e'
    }

    function sw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3ch2 class\x3d"vl-dialog-heading"\x3ePassword reset instruction sent!\x3c/h2\x3e\x3cp class\x3d"vl-dialog-msg"\x3eCheck your email and follow the link to reset your password.\x3c/p\x3e\x3c/div\x3e'
    }

    function tw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cp class\x3d"vl-dialog-msg"\x3e Please upgrade \x3ca href\x3d"http://windows.microsoft.com/en-us/internet-explorer/download-ie" target\x3d"_blank"\x3eInternet Explorer\x3ca/\x3e or download \x3ca href\x3d"https://www.google.com/chrome" target\x3d"_blank"\x3eGoogle Chrome\x3c/a\x3e\x3c/p\x3e\x3c/div\x3e'
    }

    function vw(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cdiv class\x3d"vl-call-dialog-top"\x3e\x3cdiv class\x3d"vl-call-dialog-avatar"\x3e\x3cimg class\x3d"vl-avatar-huge-img" src\x3d"' + a.Bo + '" alt\x3d""/\x3e\x3c/div\x3e\x3cdiv class\x3d"vl-call-dialog-text"\x3e\x3cdiv class\x3d"vl-call-dialog-heading" vl-bind\x3d"callDialogHeading"\x3e\x3c/div\x3e\x3cspan class\x3d"vl-call-dialog-name"\x3e' + a.gg + '\x3c/span\x3e\x3c/div\x3e\x3c/div\x3e\x3cdiv class\x3d"vl-call-dialog-controls"\x3e\x3cdiv class\x3d"vl-css3-button vl-css3-button-red vl-call-dialog-control-btn" vl-cmd\x3d"declinecall"\x3e\x3cspan class\x3d"btn-icon-phone-hang-up"\x3e\x26#57382;\x3c/span\x3e Declinar\x3c/div\x3e\x3cdiv id\x3d"' +
            a.id + '-accept" class\x3d"vl-css3-button vl-accept-button vl-css3-button-green vl-call-dialog-control-btn vl-left" vl-cmd\x3d"acceptcall"\x3e\x3cspan class\x3d"btn-icon-camera"\x3e\x26#57383;\x3c/span\x3e Aceptar\x3c/div\x3e\x3cdiv id\x3d"' + a.id + '-menudrop" class\x3d"vl-menu-button vl-accept-menu-button vl-menu-button-green vl-menu-button-collapse-left vl-inline-block vl-call-dialog-control-btn vl-right" \x3e\x3cdiv class\x3d"vl-menu vl-menu-vertical"\x3e\x3cdiv class\x3d"vl-menuitem vl-accept-dropdown"\x3e\x3cspan class\x3d"btn-icon-large"\x3e\x26#57383;\x3c/span\x3e Aceptar\x3c/div\x3e\x3cdiv class\x3d"vl-menuitem vl-accept-dropdown"\x3e\x3cspan class\x3d"btn-icon-large"\x3e\x26#57383;\x3c/span\x3e Aceptar (HD)\x3c/div\x3e\x3cdiv class\x3d"vl-menuitem vl-accept-dropdown"\x3e\x3cspan class\x3d"btn-icon-large"\x3e\x26#57385;\x3c/span\x3e Accept Voice Only\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e'
    }

    function ww(a) {
        return '\x3cdiv id\x3d"' + a.id + '"\x3e\x3cdiv class\x3d"vl-call-dialog-top"\x3e\x3cdiv class\x3d"vl-call-dialog-avatar"\x3e\x3cimg class\x3d"vl-avatar-huge-img" src\x3d"' + a.Bo + '" alt\x3d""/\x3e\x3c/div\x3e\x3cdiv class\x3d"vl-call-dialog-text"\x3e\x3cdiv class\x3d"vl-call-dialog-heading" vl-bind\x3d"callDialogHeading"\x3e\x3c/div\x3e\x3cspan class\x3d"vl-call-dialog-name"\x3e' + a.gg + '\x3c/span\x3e\x3c/div\x3e\x3c/div\x3e\x3cdiv class\x3d"vl-call-dialog-controls"\x3e\x3cdiv class\x3d"vl-css3-button vl-css3-button-red vl-call-dialog-control-btn" vl-cmd\x3d"declinecall"\x3e\x3cspan class\x3d"btn-icon-phone-hang-up"\x3e\x26#57382;\x3c/span\x3e Finalizar llamada\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e'
    };

    function xw(a, b) {
        O.call(this);
        this.eb = a;
        this.ru = !!b;
        this.vf = this.Ym();
        if (!this.vf) {
            var c = A && !D("7") ? "readystatechange" : "load";
            this.Ck = Zg(this.eb, c, this.dq, !1, this);
            this.Vm = window.setInterval(w(this.dq, this), yw)
        }
    }
    y(xw, O);
    var yw = 100;
    n = xw.prototype;
    n.Ck = null;
    n.te = e("vf");

    function zw(a) {
        a.Vm && (window.clearInterval(a.Vm), a.Vm = null)
    }
    n.k = function() {
        delete this.eb;
        zw(this);
        gh(this.Ck);
        xw.c.k.call(this)
    };
    n.Ym = function() {
        var a = !1;
        try {
            a = A ? "complete" == this.eb.readyState : !!kd(this.eb).body && (!this.ru || !!kd(this.eb).body.firstChild)
        } catch (b) {}
        return a
    };
    n.dq = function() {
        this.Ym() && (zw(this), gh(this.Ck), this.Ck = null, this.vf = !0, this.dispatchEvent("ifload"))
    };

    function uw(a) {
        $.call(this, a);
        this.Zb = this.Wj = this.eb = null
    }
    y(uw, $);
    n = uw.prototype;
    n.w = function() {
        this.B = this.eb
    };
    n.Y = function() {
        this.Zb = new G;
        var a = w(function() {
            I(function() {
                this.Wj = kd(this.e());
                this.tg = Tc(this.Wj);
                this.Zb.aa(this)
            }, 0, this)
        }, this);
        this.B = this.eb = this.rj();
        var b = new Aw(this.eb, !0);
        b.te() ? a() : this.C().g(b, "ifload", a);
        return this.Zb
    };
    n.execute = function(a, b) {
        this.Zb.Xf(a, b);
        return this.Zb
    };
    n.v = function() {
        uw.c.v.call(this);
        var a = this.pb();
        this.C().g(this.Wj, "click", a.Yq, !1, a)
    };
    n.rj = function() {
        return Bw(this.o())
    };
    n.va = function() {
        return this.Wj.body
    };
    n.Hd = function(a, b, c) {
        uw.c.Hd.call(this, a, b, c);
        a.xb = this.tg
    };

    function Aw(a, b) {
        xw.call(this, a, b)
    }
    y(Aw, xw);
    Aw.prototype.Ym = function() {
        var a = kd(this.eb).getElementById("vl-iframe-loadtest");
        return a ? 2 === a.offsetWidth : !1
    };

    function Bw(a, b) {
        var c = a.w("iframe", {
            frameborder: 0,
            style: "border:0;vertical-align:bottom;" + (b || ""),
            src: 'javascript:""'
        });
        c.onload = function() {
            window.isVlineFrameLoaded = !0
        };
        return c
    }

    function Cw(a, b, c) {
        var d = Tc(a),
            f = [];
        f.push("\x3c!DOCTYPE html\x3e");
        f.push('\x3chtml style\x3d"min-height:100%; overflow:hidden;"\x3e\x3chead\x3e', b, '\x3c/head\x3e\x3cbody style\x3d"min-height:100%; overflow:hidden;"\x3e', '\x3cdiv id\x3d"vl-iframe-loadtest"\x3e\x3c/div\x3e', "\x3c/body\x3e\x3c/html\x3e");
        b = Bw(d, c);
        a.appendChild(b);
        a = f.join("");
        f = kd(b);
        f.open();
        f.write(a);
        f.close();
        return b
    };

    function Dw(a, b) {
        uw.call(this, b)
    }
    y(Dw, uw);
    Dw.prototype.rj = function() {
        var a = this.M().ia().I,
            b = document.body,
            a = '\x3clink rel\x3d"stylesheet" href\x3d"' + Dj(a) + '"/\x3e';
        return Cw(b, a, "width:100%;height:100%")
    };

    function Ew(a, b) {
        $.call(this, b);
        this.Tg = a;
        this.Ta("")
    }
    y(Ew, $);
    Ew.prototype.Y = function() {
        this.getData().uz = this.Tg;
        var a = new Dw(0, this.o());
        a.Jf(this);
        return a.load().n(function() {
            this.B = a.e();
            this.lb();
            a.e().src = "https://www.youtube.com/embed/MfSqpj9byeI?autoplay\x3d1\x26rel\x3d0\x26autohide\x3d1\x26showinfo\x3d0";
            return $.prototype.Y.call(this)
        }, this)
    };
    Ew.prototype.v = function() {
        Ew.c.v.call(this);
        var a = this.L.Ni;
        this.C().g(a, "resize", this.lb);
        this.lb()
    };
    Ew.prototype.lb = function() {
        var a = 0.6 * Zc().width,
            b = 0.6 * a;
        Eq(this.e(), a);
        Fq(this.e(), b)
    };

    function Fw(a) {
        Zt.call(this, "vl-embed-dialog", a);
        this.nh = null;
        this.We()
    }
    y(Fw, Zt);
    n = Fw.prototype;
    n.Zk = !1;
    n.We = function() {
        this.C().g(this, "hide", this.ef).g(this, "cmd:showembedvideo", this.Fv)
    };
    n.Fv = function() {
        this.nh = new Ew("", this.o());
        $t(this, this.nh)
    };
    n.v = function() {
        Fw.c.v.call(this);
        var a = Dn(this.getParent().ia());
        this.C().g(a, "resize", this.lb);
        this.lb()
    };
    n.lb = function() {
        var a = 0.6 * Zc().width,
            b = 0.6 * a;
        Eq(this.e(), a);
        Fq(this.e(), b)
    };
    n.ef = function() {
        this.nh && (this.nh.F(), this.nh = null)
    };

    function Gw(a) {
        Yu.call(this, a);
        this.Mf = !1;
        this.Jk = this.Li = null;
        this.Z = this.Uj = "/";
        this.Bp = null;
        this.dj = {};
        this.m.Ys = this.dj;
        this.hi = {};
        this.Ue = {};
        this.ap = this.Lo = null;
        this.ej = new L;
        this.H.set("app", this.ej);
        this.ej.ja()
    }
    y(Gw, Yu);
    n = Gw.prototype;
    n.Y = function() {
        var a = this.M();
        this.dj.Da = a.oa();
        this.$a = Hw(this);
        var b = this.C();
        b.g(a, "login", this.fr, !0).g(a, "logout", this.fr, !0).g(this, Co, this.al).g(this, "cmd:appsignin", this.al).g(this, "cmd:register", this.Xc).g(this, "cmd:adduser", this.Xc).g(this, "cmd:inviteuser", this.Xc).g(this, "cmd:edituser", this.Xc).g(this, "cmd:signup", this.Xc).g(this, "cmd:resetpassword", this.Xc).g(this, "cmd:updateemail", this.Xc).g(this, "cmd:forgotpassword", this.Xc).g(this, "cmd:embedvideopopup", this.Wx).g(this, "cmd:unsupportedbrowser",
            this.Xc);
        b.g(this, "cmd:nav", this.ow);
        0 < this.Di.length && (b.g(this.ec(), "navigate", this.Sv), this.ec().Ga(!0));
        Iw(this);
        return zh(Gw.c.Y.call(this), this.Vi(Hw(this))).n(oe).n(Hk)
    };

    function Hw(a) {
        a = new qi(a.ec().bb());
        var b = window.location.hash;
        b && vi(a, b);
        return a
    }
    n.Vi = function(a, b) {
        return Gw.c.Vi.call(this, a, b).n(function() {
            Jw(this, a)
        }, this).Mb(function(b) {
            b && (b instanceof N && "LOGIN_REQUIRED" == b.type) && (this.Li = a, this.J && this.al())
        }, this)
    };
    n.$ = function(a) {
        Gw.c.$.call(this, a)
    };
    n.v = function() {
        Gw.c.v.call(this);
        this.C().g(vd(this.o()), "click", this.Yq).g(this, "action", this.jv).g(this, "cmd:signout", this.Rw);
        this.Li ? this.al() : this.Jk && this.Xc(this.Jk)
    };
    n.ga = function() {
        Gw.c.ga.call(this);
        this.ec().Ga(!1)
    };
    n.navigate = function(a, b) {
        var c = Ii(this.ec().bb(), a);
        this.$a && c.toString() !== this.$a.toString() && Kw(this, c, b)
    };
    n.Sv = function(a) {
        var b = Ci(this.$a, Hw(this));
        a.Iu && (this.$a && b.toString() !== this.$a.toString()) && (1 < window.location.hash.length && vi(b, window.location.hash.substr(1)), Kw(this, b, !0))
    };

    function Kw(a, b, c) {
        a.Li = null;
        a.Pg && a.Tj(a.Pg, !1);
        a.Me(b, {}).n(function() {
            var a = this.ec(),
                f = this.pg(),
                g = b.toString();
            g !== a.bb() && (c ? a.Vn(g, f) : a.es(g, f), vd(this.o()).title = f);
            I(this.Ur, 0, this)
        }, a)
    }
    n.Yq = function(a) {
        var b = a.target;
        do
            if ("A" === b.tagName && b.hasAttribute("href")) {
                Lw(this, b) && a.preventDefault();
                break
            }
        while (b = b.parentNode)
    };

    function Lw(a, b) {
        var c = Ca(b.getAttribute("href")),
            d = Ii(a.ec().bb(), c);
        if (wa(c, "#_vline_")) return d = new qi(a.ec().bb()), vi(d, c), Jw(a, d), !0;
        if (wa(c, "#_link_")) return c = sd(b), window.open(c, "_blank"), !0;
        if (!d.yd) {
            if (a.$a && a.$a.l() === d.l() && a.$a.Wb !== d.Wb) return a.$a = d, a.Ur(), !1;
            if (0 < a.Di.length && zo()) return a.navigate(c), !0
        }
        return !1
    }

    function Jw(a, b) {
        if (b && b.Wb && -1 != b.Wb.indexOf("_vline_")) {
            var c = b.Wb;
            if (wa(c, "#_vline_") || wa(c, "_vline_")) {
                var d = c;
                wa(c, "#_vline_") && (d = Ra(d, "#"));
                d = Ra(d, "_vline_");
                c = null;
                if (-1 !== d.indexOf("$")) {
                    var f = d.substr(d.indexOf("$") + 1);
                    f && (c = new wi(f));
                    d = d.substr(0, d.indexOf("$"))
                }
                d = "cmd:" + d;
                f = a.M();
                "cmd:signup" === d && f.Wh() && !f.ak() || a.dispatchEvent(new kt(d, c))
            }
        }
    }
    n.jv = function(a) {
        var b;
        a = a.target;
        var c = a.e();
        c && ((b = Bu(c, "vl-event")) && a.dispatchEvent(b), (b = Bu(c, "vl-cmd")) && a.dispatchEvent("cmd:" + b), (b = Bu(c, "vl-nav")) && a.dispatchEvent(new it(b)))
    };
    n.fr = function() {
        try {
            if (Iw(this))
                if (this.Pg && this.Tj(this.Pg, !1), this.Li) Kw(this, this.Li);
                else if (this.Mf = !0, this.$a && this.$a.Wb && (wa(this.$a.Wb, "_vline_") || wa(this.$a.Wb, "#_vline_"))) {
                window.location.hash = "";
                vi(this.$a, "");
                this.navigate(this.Uj);
                var a = this.Z;
                this.Z = this.Uj = a
            } else 0 < this.Di.length && this.Vi(this.$a, !0)
        } finally {
            this.Mf = !1
        }
    };

    function Iw(a) {
        var b = null,
            c = null,
            d = a.M(),
            f = d.Wh() && !d.ak();
        f && (b = d.jf().Ba, c = d.jf().Pa().Zl);
        a.ej.set("user", b);
        a.ej.set("email", c);
        return a.dj.Yu !== f ? (a.dj.Yu = f, !0) : !1
    }

    function $u(a) {
        return a.Mf
    }
    n.Xc = function(a) {
        var b = new G("pending");
        if (this.Mf && !a) return b;
        if (this.J) return Mw(this, a);
        a && (this.Jk = a);
        return b
    };

    function Mw(a, b) {
        var c = b || Co;
        a.Jk = null;
        c = a.showModalDialog(c);
        return a.Mf ? new G("pending") : (c.Xe(function() {
            this.Mf = !1
        }, a).Mb(function() {
            var a = this.M(),
                b = new Vn(null);
            a.dispatchEvent(b)
        }, a), a.Mf = !0, c)
    }
    n.showModalDialog = function(a) {
        return this.$k(Nw(this), a)
    };

    function Nw(a) {
        a.Pg || (a.Pg = new pw);
        return a.Pg
    }
    n.Tj = function(a, b) {
        a && a.Rh();
        b && a && a.F()
    };
    n.Rw = function() {
        this.M().jf().ic()
    };
    n.ow = function(a) {
        this.navigate(a.href, a.replaceState)
    };
    n.al = function() {
        var a = this.M();
        a.xf(a.oa())
    };
    n.$k = function(a, b) {
        !a.getParent() && this.ra(a, !1);
        return a.show(b)
    };

    function Ow(a) {
        if (!a.$l) {
            var b = Pw(a);
            a.$l = new Fw(b.tg);
            a.$l.Jf(a)
        }
        return a.$l
    }
    n.Wx = function() {
        if (A) window.open("https://www.youtube.com/embed/MfSqpj9byeI?autoplay\x3d1\x26rel\x3d0\x26autohide\x3d1\x26showinfo\x3d0", "_blank");
        else {
            var a = new P("cmd:showembedvideo", null);
            this.$k(Ow(this), a)
        }
    };

    function Pw(a) {
        var b;
        (b = a.Bp) || (b = new Qw, a.ra(b, !1), b.load().Xf(b.v, b), b = a.Bp = b);
        return b
    }

    function Rw(a, b, c) {
        var d = Pw(a),
            f = new G;
        d.execute(function() {
            var a;
            a = Pw(this);
            !b.getParent() && a.ra(b, !1);
            a = b.show(c);
            oc(a, f.aa, f.ma, f);
            d.show(!0)
        }, a);
        return f
    }

    function Sw(a, b, c) {
        var d = new G;
        c.execute(function() {
            var a = Tw(b, c);
            oc(a, d.aa, d.ma, d)
        }, a);
        return d
    }

    function Uw(a, b, c, d) {
        return c.execute(function() {
            b.show(!1);
            null != d ? c.show(!d) : c.show(!1)
        }, a)
    }

    function Tw(a, b) {
        !a.getParent() && b.ra(a, !1);
        return a.te() ? (b.show(!0), a.show(!0)) : a.load().n(function() {
            a.Qb();
            a.show(!0);
            b.show(!0)
        })
    }

    function Vw(a) {
        return a.te() ? a.show(!0) : a.load().n(function() {
            a.Qb();
            a.show(!0)
        })
    }

    function Ww(a, b, c) {
        var d = Pw(a);
        d.execute(function() {
            b && b.Rh();
            c && b && b.F();
            d.show(!1)
        }, a)
    }

    function Xw(a, b) {
        return a.ap || (a.ap = new Yw(b))
    }
    n.qo = function() {
        if (!jj()) {
            var a = Xw(this, this.o());
            Vw(a)
        }
    };
    n.Sj = function() {
        jj() || Xw(this, this.o()).show(!1);
        return new G("done")
    };
    n.sp = function(a) {
        return Zw(this, a, this.o())
    };

    function Zw(a, b, c) {
        a.hi[b] = new $w(c);
        return a.hi[b]
    }

    function Vl(a, b, c) {
        F(a.G, "Show media dialog");
        a.$k(a.hi[b], c)
    }

    function Tl(a, b, c) {
        F(a.G, "Hide media dialog " + c);
        var d = a.hi[b];
        d && a.Tj(d, c);
        c && d && delete a.hi[b]
    }
    n.is = function(a) {
        return (a = this.Ue[a]) ? Vw(a) : new G("no panel")
    };
    n.vp = function(a) {
        a = ax(this, a, this.o());
        this.ra(a, !1);
        return a
    };

    function ax(a, b, c, d) {
        F(a.G, "Creating video panel");
        var f = b.j(),
            g = b.Xb().r().M();
        a.Ue[f] = new bx(b, g, c, d);
        return a.Ue[f]
    }
    n.Nm = function(a, b) {
        var c = this.Ue[a];
        c && this.iq(c, b);
        c && b && delete this.Ue[a]
    };

    function cx(a, b, c) {
        var d = dx(a);
        Uw(a, b, d, !0).n(function() {
            c && b.F()
        })
    }
    n.iq = function(a, b) {
        F(this.G, "Hiding video panel");
        a && a.show(!1);
        a && b && a.F()
    };

    function dx(a, b) {
        if (!a.Lo) {
            F(a.G, "Creating video Iframe");
            var c = null;
            b && (c = v(b) ? a.o().e(b) : b);
            c = new ex(c);
            a.ra(c, !1);
            c.load().Xf(c.v, c);
            a.Lo = c
        }
        return a.Lo
    }
    n.r = function() {
        return this.M().jf()
    };

    function fx(a, b) {
        $.call(this, b);
        this.A = a || null;
        this.Ma = vw;
        this.Ta("Llamada entrante")
    }
    y(fx, $);
    fx.prototype.Y = function() {
        var a = this.getData();
        a.gg = this.A.Nd();
        a.Bo = this.A.kd() || "https://www.gravatar.com/avatar?d\x3dmm";
        this.Q().set("callDialogHeading", "Llamada entrante");
        return fx.c.Y.call(this)
    };
    fx.prototype.v = function() {
        fx.c.v.call(this);
        this.C().g(this, "cmd:acceptcall", w(function() {
            this.A.start()
        }, this));
        this.C().g(this, "cmd:declinecall", w(function() {
            this.A.stop()
        }, this));
        this.C().g(this.A, "enterState:connecting", w(function() {
            this.Q().set("callDialogHeading", "Connecting")
        }, this));
        var a = $q(this, this.ye("menudrop"));
        if (a) {
            var b = this.Fj("accept");
            a && Ds(a, b);
            this.C().g(a, "action", w(function(a) {
                a = a.target.ba();
                xa(a, "Aceptar solo voz") ? this.A.start({
                    audio: !0
                }) : xa(a, "Accept Video (HD)") ? this.A.start({
                    audio: !0,
                    video: !0,
                    hd: !0
                }) : this.A.start()
            }, this))
        }
    };

    function gx(a, b) {
        $.call(this, b);
        this.A = a || null;
        this.Ma = ww;
        this.Ta("Outgoing call")
    }
    y(gx, $);
    gx.prototype.Y = function() {
        var a = this.getData();
        a.gg = this.A.Nd();
        a.Bo = this.A.kd() || "https://www.gravatar.com/avatar?d\x3dmm";
        this.A.Xm() ? this.Q().set("callDialogHeading", "Conectando") : this.Q().set("callDialogHeading", "Llamando");
        return gx.c.Y.call(this)
    };
    gx.prototype.v = function() {
        gx.c.v.call(this);
        this.C().g(this, "cmd:declinecall", w(function() {
            this.A.stop()
        }, this)).g(this.A, "enterState:connecting", w(function() {
            this.Q().set("callDialogHeading", "Connecting")
        }, this))
    };

    function Qw(a) {
        uw.call(this, a)
    }
    y(Qw, uw);
    n = Qw.prototype;
    n.rj = function() {
        var a = this.M().ia().I,
            b = document.body,
            a = '\x3clink rel\x3d"stylesheet" href\x3d"' + Dj(a) + '"/\x3e';
        return Cw(b, a, "position: absolute; z-index: 10001; top: 0 ;left : 0; max-width:100%; visibility:hidden")
    };
    n.v = function() {
        Qw.c.v.call(this);
        var a = this.L.Ni;
        this.C().g(a, "resize", this.lb).g(this, "beforeshow", this.Gn).g(this, "hide", this.Rv);
        this.lb()
    };
    n.lb = function() {
        var a = Zc();
        Eq(this.eb, a.width);
        Fq(this.eb, a.height)
    };
    n.Gn = function() {
        this.show(!0)
    };
    n.Rv = function(a) {
        a && a.target !== this || this.show(!1)
    };

    function ex(a, b) {
        uw.call(this, b);
        this.Mn = a || document.body
    }
    y(ex, uw);
    ex.prototype.rj = function() {
        var a = this.M().ia().I,
            b = "";
        this.Mn === document.body && (b += "top:0; left:0;");
        b += "z-index: 10000; position:absolute; width:100%; height:100%; visibility:hidden";
        a = '\x3clink rel\x3d"stylesheet" href\x3d"' + Dj(a) + '"/\x3e';
        b = Cw(this.Mn, a, b);
        b.setAttribute("allowfullscreen", "allowfullscreen");
        b.setAttribute("webkitallowfullscreen", "webkitallowfullscreen");
        b.setAttribute("mozallowfullscreen", "mozallowfullscreen");
        return b
    };
    ex.prototype.v = function() {
        if (this.Mn === vd(this.o()).body) {
            this.rn = !0;
            var a = this.L.Ni;
            this.C().g(a, "resize", this.lb);
            this.lb()
        }
        ex.c.v.call(this)
    };
    ex.prototype.lb = function() {
        var a = this.L.Ni.Pc();
        Eq(this.eb, a.width);
        Fq(this.eb, a.height)
    };

    function hx(a, b, c, d, f) {
        $.call(this, c);
        this.za = a;
        this.xr = this.nd = null;
        this.Fs = f;
        this.mq = b || "https://www.gravatar.com/avatar?d\x3dmm";
        this.nb(this.za.j());
        this.Gx = t(d) ? d : !0;
        this.Rg = 0
    }
    y(hx, $);
    n = hx.prototype;
    n.js = function() {
        if (this.vi) {
            var a = this.Gj();
            this.Lh() == this.vi.width && a == this.vi.height || this.dispatchEvent("mediaStreamTrack:videoresolutionchange")
        } else this.vi = {};
        this.vi.width = this.Lh();
        this.vi.height = this.Gj();
        this.Rg = I(this.js, 250, this)
    };
    n.Ea = function() {
        return this.za.Ea()
    };
    n.Lh = function() {
        var a = 640;
        this.nd && (a = this.nd.videoWidth);
        return a
    };
    n.Gj = function() {
        var a = 480;
        this.nd && (a = this.nd.videoHeight);
        return a
    };

    function ix(a, b) {
        Dc(a.e(), "vl-video-wrap-inset", b)
    }
    n.v = function() {
        hx.c.v.call(this);
        this.Gx && this.C().g(this.za, "speaking:start", this.Zx).g(this.za, "speaking:stop", this.$x)
    };

    function jx(a, b) {
        b && !a.Rg ? a.Rg = I(a.js, 250, a) : !b && a.Rg && (rh(a.Rg), a.Rg = 0)
    }
    n.$ = function(a) {
        hx.c.$.call(this, a);
        var b = this.za.Ea(),
            c = this.Fs;
        null != c || (c = b ? 1 : 0);
        a.className = "vl-video-wrap vl-video-wrap-" + (b ? "local" : "remote");
        pq(a, {
            overflow: "hidden",
            position: "absolute",
            "z-index": c
        });
        this.za.Qd() || (a = bd("img", {
            src: this.mq,
            width: "100%",
            height: "100%"
        }), this.o().appendChild(this.e(), a));
        a = this.za;
        b = a.tp();
        c = a.Ea() ? "local" : "remote";
        b.className = "vl-video vl-video-" + c;
        pq(b, {
            width: "100%",
            height: "100%",
            position: "absolute"
        });
        a.Ea() && yj(b);
        this.o().appendChild(this.e(), b);
        this.nd = b
    };
    n.k = function() {
        hx.c.k.call(this);
        jx(this, !1);
        this.nd && this.nd.setAttribute("src", "");
        this.xr && this.xr.setAttribute("src", "")
    };
    n.Zx = function(a) {
        Dc(this.e(), "vl-video-wrap-speaking", !0);
        this.dispatchEvent(a.type)
    };
    n.$x = function(a) {
        Dc(this.e(), "vl-video-wrap-speaking", !1);
        this.dispatchEvent(a.type)
    };

    function kx(a) {
        return a ? a + "px" : "auto"
    }

    function lx(a, b, c, d, f, g, h, k) {
        var m = "";
        d = {
            width: kx(c),
            height: kx(d),
            top: kx(f),
            left: kx(g)
        };
        c = Math.floor(0.05 * c);
        switch (h) {
            case 1:
                m = Cu(0.05, c);
                break;
            case 2:
                c = Math.floor(1.8 * c);
                m = Cu(0, c);
                break;
            case 3:
                m = Cu(-0.05, c)
        }
        null != k && (a.Fs = k, (h = a.e()) && (h.style.zIndex = k));
        a.setTransform(d, m);
        if (a = a.e()) b ? Du(a, "all 0.75s") : Du(a, ""), pq(a, d)
    }
    n.setTransform = function(a, b) {
        a["-webkit-transform"] = a["-moz-transform"] = b
    };

    function mx() {}
    y(mx, ts);
    ga(mx);
    mx.prototype.w = function(a) {
        return a.o().w("div", this.K() + " vl-inline-block", " ")
    };
    mx.prototype.la = function(a, b) {
        b = mx.c.la.call(this, a, b);
        yc(b, "vl-inline-block");
        return b
    };
    mx.prototype.K = l("vl-toolbar-separator");

    function nx() {}
    y(nx, Yr);
    ga(nx);
    nx.prototype.sc = l("toolbar");
    nx.prototype.Ah = function(a) {
        return "HR" == a.tagName ? new us(mx.Ja()) : nx.c.Ah.call(this, a)
    };
    nx.prototype.K = l("vl-toolbar");
    nx.prototype.Sp = function() {
        return as
    };

    function ox(a, b, c) {
        ds.call(this, b, a || nx.Ja(), c)
    }
    y(ox, ds);

    function px() {}
    y(px, xs);
    ga(px);
    px.prototype.K = l("vl-toolbar-button");

    function qx(a, b, c) {
        Xr.call(this, a, b || px.Ja(), c)
    }
    y(qx, Xr);
    Ir("vl-toolbar-button", function() {
        return new qx(null)
    });

    function rx(a, b) {
        us.call(this, a || mx.Ja(), b)
    }
    y(rx, us);
    Ir("vl-toolbar-separator", function() {
        return new rx
    });

    function sx(a, b, c) {
        Xr.call(this, a, b || xs.Ja(), c);
        Sr(this, 16, !0)
    }
    y(sx, Xr);
    Ir("vl-toggle-button", function() {
        return new sx(null)
    });

    function tx(a, b, c) {
        sx.call(this, a, b || px.Ja(), c)
    }
    y(tx, sx);
    Ir("vl-toolbar-toggle-button", function() {
        return new tx(null)
    });

    function ux(a, b, c, d) {
        ox.call(this, void 0, void 0, d);
        this.ie = a;
        this.A = c || null;
        this.I = b || null;
        this.fd = null;
        this.km = "vl-controls-fullscreen-btn";
        this.ze = null;
        this.Rq = "vl-controls-mute-audio-btn";
        this.Xd = null;
        this.Sq = "vl-controls-mute-video-btn";
        this.ig = null;
        this.Ep = "vl-controls-end-call-btn";
        this.Qf = null;
        this.ts = "vl-controls-transfer-call-btn";
        this.Sf = null;
        this.us = "vl-controls-trigger-debug-btn";
        this.nj = 3E3;
        this.Bu = 5E3;
        this.Qe = 0;
        this.Dl = this.il = this.sn = !1;
        this.Bq = 0;
        this.R = !1;
        this.Cp = !0;
        this.pp = 0
    }
    y(ux, ox);
    n = ux.prototype;
    n.w = function() {
        ux.c.w.call(this);
        var a = this.o();
        this.I.get(T.Os) || (this.fd = new tx(bd("div", vx(this.km)), void 0, a), this.fd.Bd("Pantalla completa"), wx(this, this.fd));
        var b = $i && (!ij(23) || this.A.yf);
        b || (this.ze = new tx(bd("div", vx(this.Rq)), void 0, a), this.ze.Bd("Desactivar sonido"), this.A && Rr(this.ze, this.A.bk()), wx(this, this.ze));
        b || (this.Xd = new tx(bd("div", vx(this.Sq)), void 0, a), this.Xd.Bd("Desactivar video"), wx(this, this.Xd));
        this.ig = new qx(bd("div", vx(this.Ep)), void 0, a);
        this.ig.Bd("Finalizar llamada");
        wx(this,
            this.ig);
        this.I.get(T.Qs) && (this.Qf = new qx(bd("div", vx(this.ts)), void 0, a), this.Qf.Bd("Transfer Call"), wx(this, this.Qf));
        this.I.get(T.Ps) && (this.Sf = new tx(bd("div", vx(this.us)), void 0, a), this.Sf.Bd("Trigger debug (log stats)"), wx(this, this.Sf))
    };

    function wx(a, b) {
        jj() && Sr(b, 2, !1);
        a.ra(b, !0)
    }
    n.v = function() {
        ux.c.v.call(this);
        var a = this.C(),
            b = this.ie.e();
        a.g(this.ig, "action", this.Gv).g(vd(this.ie.getParent().o()), C ? "webkitfullscreenchange" : B ? "mozfullscreenchange" : null, this.Mv).g(this, "enter", this.Iv).g(this, "leave", this.zn).g(b, "mousemove", this.Hn).g(b, "touchstart", this.qr).g(b, "touchend", this.sx);
        a.g(b, "click", this.Hn);
        this.A && a.g(this.A, "enterState:active", this.iw);
        this.fd && a.g(this.fd, "action", this.Lv);
        this.Qf && a.g(this.Qf, "action", this.ex);
        this.Sf && a.g(this.Sf, "action", this.gx);
        this.ze &&
            a.g(this.ze, "action", this.mw);
        this.Xd && a.g(this.Xd, "action", this.nw);
        this.ha(!1);
        this.R = !1;
        xx(this, !0);
        yx(this, this.Bu)
    };
    n.ga = function() {
        zx(this);
        kj(vd(this.ie.getParent().o()))
    };
    n.hc = function(a) {
        var b = a.width,
            c = a.height;
        a = this.e();
        a = Hq(a).width;
        b = Math.min(b, c);
        c = a - (a + 50 - b);
        if (c !== this.pp) {
            this.pp = c;
            var b = br(this),
                d = cr(this, 0).e(),
                d = tq(d, "width");
            isFinite(d) && (d = String(d));
            a = Math.min(Math.max(c / b * ((v(d) ? /^\s*-?0x/i.test(d) ? parseInt(d, 16) : parseInt(d, 10) : NaN) / (a / b)), 20), 40);
            a = Math.floor(a);
            for (c = 0; c < b; c++) d = cr(this, c).e(), d.style.width = a + "px", d.style.fontSize = a + "px"
        }
    };
    n.iw = function() {
        Ax(this);
        xx(this, !0);
        yx(this, this.nj)
    };
    n.Iv = function() {
        this.sn = !0
    };
    n.zn = function() {
        this.sn = !1;
        yx(this)
    };

    function vx(a) {
        return a + "-unchecked"
    }

    function Bx(a, b, c) {
        a && (b ? Bc(a, vx(c), c + "-checked") : Bc(a, c + "-checked", vx(c)))
    }
    n.Mv = function() {
        var a;
        a = vd(this.ie.getParent().o());
        a = t(a.fullscreenElement) ? a.fullscreenElement : !(!a.mozFullScreen && !a.webkitIsFullScreen);
        Rr(this.fd, a);
        Bx(this.fd.ka, a, this.km)
    };
    n.Lv = function() {
        var a = Fr(this.fd, 16);
        zc(this.fd.e(), "vl-toolbar-button-checked");
        var b = this.fd.ka;
        if (a) {
            var c = null != this.ie.Op ? this.ie.Op : this.ie.e();
            la(c.webkitRequestFullScreen) ? c.webkitRequestFullScreen() : la(c.mozRequestFullScreen) ? c.mozRequestFullScreen() : la(c.requestFullScreen) && c.requestFullScreen()
        } else kj(vd(this.ie.getParent().o()));
        Bx(b, a, this.km)
    };
    n.mw = function() {
        var a = Fr(this.ze, 16);
        this.A && this.A.Mg(a);
        Bx(this.ze.ka, a, this.Rq)
    };
    n.nw = function() {
        var a = Fr(this.Xd, 16);
        this.A && this.A.Og(a);
        Bx(this.Xd.ka, a, this.Sq)
    };
    n.Gv = function() {
        var a = Fr(this.ig, 16);
        if (this.A) {
            var b = this.A.Xb();
            b && b.Pe()
        }(b = this.ig.ka) && Bx(b, a, this.Ep)
    };
    n.ex = function() {
        var a = Fr(this.Qf, 16);
        this.A && this.A.jl();
        Bx(this.Qf.ka, a, this.ts)
    };
    n.gx = function() {
        var a = Fr(this.Sf, 16);
        Cx(this.ie, a);
        Bx(this.Sf.ka, a, this.us)
    };
    n.wu = function() {
        var a = ta() - this.Bq;
        a < this.nj ? yx(this, this.nj - a) : this.sn || (xx(this, !1), zx(this))
    };

    function xx(a, b) {
        a.I.get(T.Ns) && (b = !0);
        a.R !== b && ((a.R = b) ? yx(a) : zx(a), a.Xd && a.Xd.ha(a.Cp), a.Dl = !0, au(a.e(), b, "fade", 0.25).n(function() {
            this.ha(b);
            this.Dl = !1
        }, a))
    }

    function zx(a) {
        a.Qe && (rh(a.Qe), a.Qe = 0)
    }

    function yx(a, b) {
        a.Qe && zx(a);
        a.Qe = I(a.wu, null != b ? b : a.nj, a)
    }
    n.Hn = function() {
        this.il || (this.Bq = ta(), this.R || (Ax(this), xx(this, !0)))
    };
    n.qr = function(a) {
        this.Dl || (jd(this.e(), a.target) ? this.Hn() : (a.stopPropagation(), a.preventDefault(), xx(this, !this.R)));
        this.il = !0
    };
    n.sx = function(a) {
        this.il || this.qr(a);
        this.il = !1
    };

    function Ax(a) {
        if (a.A) {
            var b = a.A.Dh();
            b && b[0] && (a.Cp = b[0].Qd())
        }
    };

    function Dx(a, b) {
        var c = Array.prototype.slice.call(arguments),
            d = c.shift();
        if ("undefined" == typeof d) throw Error("[goog.string.format] Template required");
        return d.replace(/%([0\-\ \+]*)(\d+)?(\.(\d+))?([%sfdiu])/g, function(a, b, d, k, m, p, r, s) {
            if ("%" == p) return "%";
            var u = c.shift();
            if ("undefined" == typeof u) throw Error("[goog.string.format] Not enough arguments");
            arguments[0] = u;
            return Ex[p].apply(null, arguments)
        })
    }
    var Ex = {
        s: function(a, b, c) {
            return isNaN(c) || "" == c || a.length >= c ? a : a = -1 < b.indexOf("-", 0) ? a + Ta(" ", c - a.length) : Ta(" ", c - a.length) + a
        },
        f: function(a, b, c, d, f) {
            d = a.toString();
            isNaN(f) || "" == f || (d = a.toFixed(f));
            var g;
            g = 0 > a ? "-" : 0 <= b.indexOf("+") ? "+" : 0 <= b.indexOf(" ") ? " " : "";
            0 <= a && (d = g + d);
            if (isNaN(c) || d.length >= c) return d;
            d = isNaN(f) ? Math.abs(a).toString() : Math.abs(a).toFixed(f);
            a = c - d.length - g.length;
            return d = 0 <= b.indexOf("-", 0) ? g + d + Ta(" ", a) : g + Ta(0 <= b.indexOf("0", 0) ? "0" : " ", a) + d
        },
        d: function(a, b, c, d, f, g, h, k) {
            return Ex.f(parseInt(a,
                10), b, c, d, 0, g, h, k)
        }
    };
    Ex.i = Ex.d;
    Ex.u = Ex.d;

    function Fx(a, b, c, d) {
        $.call(this, d);
        this.Gl = b;
        this.Po = a;
        this.t = c;
        this.ys = 0;
        this.Oo = "Gathering video stats";
        this.Fl = "Gathering audio stats";
        this.lp = "Gathering connection stats"
    }
    y(Fx, $);
    var Gx = {},
        Hx = !1,
        Ix = {},
        Jx = {};
    n = Fx.prototype;
    n.$ = function(a) {
        Fx.c.$.call(this, a);
        this.e().className = "vl-trackstats-panel";
        Kx(this)
    };

    function Kx(a) {
        a.e().innerHTML = "\x3cHR\x3eVideo\x3cHR\x3e" + a.Oo + "\x3cHR\x3eAudio\x3cHR\x3e" + a.Fl + "\x3cHR\x3eConnection\x3cHR\x3e" + a.lp
    }
    n.v = function() {
        Fx.c.v.call(this);
        Jx[this.t.j()] || (Jx[this.t.j()] = 0);
        Jx[this.t.j()] ++;
        1 == Jx[this.t.j()] && this.ws();
        this.xs()
    };
    n.ga = function() {
        Fx.c.ga.call(this);
        Jx[this.t.j()] --;
        0 == Jx[this.t.j()] && (rh(Ix[this.t.j()]), Ix[this.t.j()] = null);
        rh(this.ys)
    };

    function Lx(a, b) {
        var c = Gx[a.t.j()];
        if (!c) return null;
        for (var d in c)
            if (c[d].googTrackId === b && "ssrc" === c[d].type) return c[d];
        return null
    }

    function Mx(a) {
        var b = {};
        z(a.result(), function(a) {
            var d = {
                timestamp: a.timestamp,
                type: a.type,
                id: a.id
            };
            z(Ni, function(b) {
                a.stat(b) && (d[b] = a.stat(b))
            });
            b[d.id] = d
        });
        return b
    }
    n.ws = function() {
        this.t.getStats().n(function(a) {
            Gx[this.t.j()] = Mx(a);
            Ix[this.t.j()] = I(this.ws, 2E3, this)
        }, this)
    };
    n.xs = function() {
        if (Gx[this.t.j()]) {
            if (this.Gl) {
                var a = Lx(this, this.Gl.id);
                if (a) {
                    var b = "";
                    a.packetsSent ? b = Dx("%s\x3cbr\x3e%s input level\x3cbr\x3eecho cancel delay median:%s stddev:%s\x3cbr\x3e%s packets sent\x3cbr\x3e%s bytes sent\x3cbr\x3e%d ms RTT\x3cbr\x3ejitter %s ms\x3cbr\x3essrc %s\x3cbr\x3e", a.googCodecName, a.audioInputLevel, a.googEchoCancellationEchoDelayMedian, a.googEchoCancellationEchoDelayStdDev, a.packetsSent, a.bytesSent, a.googRtt, a.googJitterReceived, a.ssrc) : a.packetsReceived && (b = Dx("%s audio output level\x3cbr\x3e%s packets received\x3cbr\x3e%s packets lost\x3cbr\x3e%s bytes received\x3cbr\x3ejitter %s ms\x3cbr\x3essrc %s\x3cbr\x3e",
                        a.audioOutputLevel, a.packetsReceived, a.packetsLost, a.bytesReceived, a.googJitterReceived, a.ssrc));
                    this.Fl = b
                } else this.Fl = "Could not find report for audio track '" + this.Gl.id + "'\x3cbr\x3e"
            }
            this.Po && ((b = Lx(this, this.Po.id)) ? (a = "", b.packetsSent ? a = Dx("%sx%s %s fps\x3cbr\x3e%s packets sent\x3cbr\x3e%s bytes sent\x3cbr\x3e%d ms RTT\x3cbr\x3essrc %s\x3cbr\x3e", b.googFrameWidthSent, b.googFrameHeightSent, b.googFrameRateSent, b.packetsSent, b.bytesSent, b.googRtt, b.ssrc) : b.packetsReceived && (a = Dx("%sx%s %s fps\x3cbr\x3e%s packets received\x3cbr\x3e%s packets lost\x3cbr\x3e%s bytes received\x3cbr\x3essrc %s\x3cbr\x3e",
                b.googFrameWidthReceived, b.googFrameHeightReceived, b.googFrameRateReceived, b.packetsReceived, b.packetsLost, b.bytesReceived, b.ssrc)), (b = Gx[this.t.j()]) && (b = b.bweforvideo) && (a += Dx("\x3cHR\x3eBandwidth Estimator for Video\x3cHR\x3eBandwidth receive:%s send:%s\x3cbr\x3eEncode bitrate target:%s actual:%s\x3cbr\x3eTransmit bitrate:%s restransmit:%s\x3cbr\x3eBucket delay: %s\x3cbr\x3e", b.googAvailableReceiveBandwidth, b.googAvailableSendBandwidth, b.googTargetEncBitrate, b.googActualEncBitrate, b.googTransmitBitrate,
                b.googRetransmitBitrate, b.googBucketDelay)), this.Oo = a) : this.Oo = "Could not find report for video track '" + this.Po.id + "'");
            var a = {},
                b = Gx[this.t.j()],
                c;
            for (c in b) {
                var d = b[c];
                "true" == d.googActiveConnection && (a.googActiveConnection = "true", a.googLocalAddress = d.googLocalAddress, a.googRemoteAddress = d.googRemoteAddress, a.bytesSent = d.bytesSent, a.bytesReceived = d.bytesReceived);
                d.googInitiator && (a.googInitiator = d.googInitiator)
            }
            this.lp = 6 != Ic(a) ? "No connection stats" : Dx("Local Address %s\x3cbr\x3eRemote Address %s\x3cbr\x3eActive? %s\x3cbr\x3eInitiator? %s\x3cbr\x3eBytes sent:%s recv:%s\x3cbr\x3e",
                a.googLocalAddress, a.googRemoteAddress, a.googActiveConnection, a.googInitiator, a.bytesSent, a.bytesReceived);
            Kx(this)
        }
        this.ys = I(this.xs, 2E3, this)
    };

    function Nx(a) {
        var b = window.$vline && window.$vline.pb();
        b && (Hc(b.Ue, function(b) {
            Cx(b, a)
        }), Hx = a)
    };

    function bx(a, b, c, d) {
        $.call(this, c);
        this.A = a || null;
        this.I = (this.ob = b || null) && this.ob.ia().I;
        this.yc = [];
        this.Ac = [];
        this.Ao = [];
        this.Ab = null;
        this.zq = new nq(0, 0, 0, 0);
        this.ai = -1;
        this.iz = "";
        this.Ql = new ux(this, this.I, a, c);
        this.Op = d;
        this.ql = !1;
        this.Zy = this.Iq = null
    }
    y(bx, $);
    Ue("videoPanel", bx);

    function Ox(a, b, c) {
        var d = 640,
            f = 480,
            g;
        if (a.nd) {
            if (g = a.nd.videoWidth) d = g;
            if (a = a.nd.videoHeight) f = a
        } else a.mq && (f = d = 40);
        return Math.min(Math.ceil(b * (d / f)), c)
    }
    n = bx.prototype;
    n.rn = !0;

    function Px(a) {
        return fb(a.Ac, function(a) {
            return a.za === cm(this.A)
        }, a)
    }

    function Qx(a) {
        var b = null,
            c = -1;
        if (a.Ac) {
            for (var d = 0; d < a.Ac.length; ++d) {
                var f = a.Ac[d].za;
                f.ek && f.Pl > c && (b = a.Ac[d], c = f.Pl)
            }
            if (!b || !b.za) return null
        }
        return b
    }
    n.$ = function(a) {
        bx.c.$.call(this, a);
        a.className = "vl-video-panel";
        pq(a, {
            position: "absolute",
            top: 0,
            bottom: 0,
            left: 0,
            right: 0,
            overflow: "hidden",
            "-webkit-perspective": "500px"
        });
        this.ra(this.Ql, !0);
        if (this.A && this.e()) {
            a = this.A.Dh();
            var b = this.A.Pd();
            z(a, this.aj, this);
            z(b, this.aj, this);
            this.J && this.hc(!0)
        }
    };
    n.v = function() {
        bx.c.v.call(this);
        this.A && Rx(this, this.A);
        I(function() {
            this.hc(!1)
        }, 0, this)
    };

    function Rx(a, b) {
        nm(b, !0);
        a.C().g(b, "mediaSession:addLocalStream", a.nr).g(b, "mediaSession:addRemoteStream", a.nr).g(b, "mediaSession:removeRemoteStream", a.Yw).g(a, "speaking:start", a.Vw).g(a, "speaking:stop", a.Ww).g(a, "mediaStreamTrack:videoresolutionchange", a.tx)
    }
    n.addStream = function(a) {
        this.aj(a)
    };
    n.ga = function() {
        -1 !== this.ai && rh(this.ai);
        nm(this.A, !1);
        bx.c.ga.call(this)
    };

    function Sx(a, b) {
        var c = b && a.J,
            d = Jq(a.e()),
            f = d.width,
            d = d.height,
            g = 0.05 * d,
            h = [],
            k = ob(a.Ac),
            m, p, r, s, u, H, J, Y, Na, V;
        1 === a.yc.length && 1 <= a.Ac.length ? (p = a.yc[0], u = Math.max(0.2 * d, 90), u = Math.min(u, d / 2), s = Ox(p, u, f), lx(p, c, s, u, d - g - u, f - g - s, void 0, 1), ix(p, !0), s = a.ob.ia().I, u = a.A.ji, s && p.show(Ej(u.I, T.Ms))) : (z(a.yc, function(a) {
            ix(a, !1)
        }), k.push.apply(k, a.yc));
        if (1 === k.length && k[0].za.Qd()) s = k[0], h = s.Lh(), s = s.Gj(), u = f / h, g = d / s, r = u > g ? g : u, p = s * r, r *= h, H = (d - p) / 2, Y = (f - r) / 2, a.h("p2playout_", "rw", h, "rh", s, "remoteAspectRatio",
            h / s, "windowAspectRatio", f / d, "widthScale", u, "heightScale", g, "fh", p, "fw", r, "t", H, "l", Y), lx(k[0], c, r, p, H, Y, void 0, 0);
        else
            for (Y = 2 * g, Na = Tx(k, d, f, Y), V = Math.ceil(k.length / Na), g = p = 0; p < Na; ++p) {
                V = Math.min(V, k.length - g);
                H = Math.floor((f - Y) / V);
                u = Math.floor(d / Na);
                J = 0;
                r = h.length = 0;
                for (m = g; r < V; ++r, ++m) s = Ox(k[m], u, H), J += s, h.push(s);
                J = (f - J) / 2;
                for (r = 0; r < V; ++r, ++g) m = 1 === k.length ? 0 : 0 === r && 1 < V ? 1 : r === V - 1 && 1 < V ? 3 : 2, s = Ox(k[g], u, H), lx(k[g], c, h[r], u, u * p, J, m, 0), J += h[r]
            }
    }

    function Tx(a, b, c, d) {
        for (var f = 0, g = 0, h = 1; h <= a.length; ++h) {
            var k = Math.ceil(a.length / h),
                m;
            m = a;
            for (var p = Math.floor(b / h), k = (c - d) / k, r = 0, s = 0; s < m.length; ++s) r += Ox(m[s], p, k);
            m = 0 < m.length ? r / m.length : 0;
            m > f && Math.ceil(a.length / h) * m <= c * h && (f = m, g = h)
        }
        return g
    }

    function Ux(a, b) {
        var c = b && a.J || !1,
            d = Jq(a.e()),
            f = d.width,
            d = d.height,
            g = 0.05 * d,
            h = ob(a.yc),
            k, m, p, r, s = [],
            u = 0,
            H, J, Y, Na;
        h.push.apply(h, a.Ac);
        kb(h, Px(a));
        if (1 === h.length) z(a.yc, function(a) {
            ix(a, !1)
        }), a.Ab && (a.removeChild(a.Ab, !0), delete a.Ab), a.yc[0].za.Qd() && lx(a.yc[0], c, f, d, 0, 0, void 0, 0);
        else {
            k = Math.max(0.2 * (d - g) - g, 90);
            m = Math.min(g, 18);
            p = Math.floor(2 * k);
            for (r = 0; r < h.length; ++r) s[r] = Ox(h[r], k, p), u = Math.max(s[r], u);
            H = Math.floor((d - 3 * g) / k);
            J = Math.max(Math.ceil(h.length / H), 1);
            for (r = 0; r < J; ++r) {
                var V = r * H;
                Y = g;
                Na = g + m * r + r * u;
                for (p = 0; p < H && V + p < h.length; ++p) lx(h[V + p], c, s[V + p], k, Y, Na, void 0, 1), ix(h[V + p], !0), Y += k + m
            }!(g = Qx(a)) || (!g.za || a.Ab && a.Iq == g.za.Fk) || (a.Ab || (h = cm(a.A), a.Ab = new hx(h, null, a.o(), !1, 0), a.Ab.nb("main"), a.ra(a.Ab, !0)), a.A.Ho(g.za.Fk), a.Iq = g.za.Fk);
            a.Ab && (lx(a.Ab, c, f, d, 0, 0), a.Ab.show(!0, "fade"));
            I(w(a.hc, a, c), 2500)
        }
    }
    n.hc = function(a) {
        jm(this.A) ? Ux(this, a) : Sx(this, a);
        a = Jq(this.e());
        if (!oq(a, this.zq)) {
            this.zq = a;
            var b = this.Ql.e(),
                c = Au(b);
            c && pq(b, {
                visibility: "hidden"
            });
            this.Ql.hc(a);
            var d = Hq(b).width;
            b.style.left = (a.width - d) / 2 + "px";
            c && (b.style.visibility = "visible")
        }
    };
    n.aj = function(a) {
        if (!Vx(this, a)) {
            jb(this.Ao, a);
            a.Ea() ? (F(this.G, "Add local stream to videoPanel"), this.C().g(a, "mediaStream:end", this.dw)) : F(this.G, "Add remote stream to videoPanel");
            var b = a.Ea() ? this.ob.jf().Ba.kd() : this.A.kd(),
                b = new hx(a, b, this.o(), void 0, 1);
            this.ra(b, !0);
            a.Cc ? Wx(this, b) : this.C().g(a, "mediaStream:start", this.Zw)
        }
    };

    function Vx(a, b) {
        return !!fb(a.Ao, function(a) {
            return b === a
        })
    }
    n.Mr = function() {
        this.hc(!1)
    };
    n.nr = function(a) {
        this.aj(a.stream);
        a.stream.Cc && this.hc(!0)
    };
    n.dw = function(a) {
        Xx(this, a.target)
    };
    n.Yw = function(a) {
        Xx(this, a.stream)
    };

    function Xx(a, b) {
        kb(a.Ao, b);
        var c = $q(a, b.j());
        if (!a.Jc) {
            if (c && (Yx(a, c), a.Ab && c.za === a.Ab.za)) {
                -1 !== a.ai && (rh(a.ai), a.ai = -1);
                a.hc(!0);
                return
            }
            a.hc(!0)
        }
    }
    n.Zw = function(a) {
        a = $q(this, a.target.j());
        Wx(this, a);
        this.hc(!0)
    };

    function Wx(a, b) {
        F(a.G, "Showing video in videoPanel");
        b.show(!0, "fade");
        (b.Ea() ? a.yc : a.Ac).push(b);
        jx(b, !0)
    }

    function Yx(a, b) {
        F(a.G, "Hiding video in videoPanel");
        b.show(!1, "fade").Xe(function() {
            !this.Jc && this.removeChild(b);
            b.F()
        }, a);
        var c = b.Ea() ? a.yc : a.Ac;
        kb(c, b)
    }
    n.Vw = function(a) {
        a = a.target;
        this.Ab && this.Ab.za !== a.za && this.hc(!1)
    };
    n.Ww = function(a) {
        this.Ab && this.Ab.za === a.target.za && this.hc(!1)
    };
    n.tx = function() {
        this.hc(!0)
    };

    function Cx(a, b) {
        b && !a.ql ? (a.ql = !0, z(a.A.sa, function(a) {
            var b = a.t;
            z(this.yc, function(a) {
                var c = a.za;
                if ((hb(b.Kb, c) || hb(b.T, c)) && (0 < sj(c).length && 0 < rj(c).length) && 0 == br(a)) {
                    var h = new Fx(sj(c)[0], rj(c)[0], b);
                    h.load().n(function() {
                        a.ra(h, !0)
                    })
                }
            });
            z(this.Ac, function(a) {
                var c = a.za;
                if ((hb(b.Kb, c) || hb(b.T, c)) && (0 < sj(c).length && 0 < rj(c).length) && 0 == br(a)) {
                    var h = new Fx(sj(c)[0], rj(c)[0], b);
                    h.load().n(function() {
                        a.ra(h, !0)
                    })
                }
            })
        }, a)) : !b && a.ql && (a.ql = !1, z(a.yc, function(a) {
            a.Un(!0)
        }, a), z(a.Ac, function(a) {
                a.Un(!0)
            },
            a))
    };

    function $w(a) {
        Zt.call(this, "vl-not-dialog", a);
        this.Sh = this.si = null;
        this.We()
    }
    y($w, Zt);
    n = $w.prototype;
    n.Zk = !1;
    n.We = function() {
        this.C().g(this, "hide", this.ef).g(this, Yl, this.qw).g(this, Ul, this.Vv)
    };
    n.qw = function(a) {
        this.si = new gx(a.mediaSession, this.o());
        $t(this, this.si)
    };
    n.Vv = function(a) {
        this.Sh = new fx(a.mediaSession, this.o());
        $t(this, this.Sh)
    };
    n.k = function() {
        this.ef();
        $w.c.k.call(this)
    };
    n.ef = function(a) {
        a && a.target !== this || (this.si && (this.si.F(), this.si = null), this.Sh && (this.Sh.F(), this.Sh = null))
    };
    n.rp = function() {
        var a = this.e();
        return new mt(a, a)
    };

    function Yw(a) {
        wt.call(this, !1, a);
        this.vf = !1
    }
    y(Yw, wt);
    Yw.prototype.w = function() {
        Yw.c.w.call(this);
        var a = this.e();
        a.className = "vl-call-arrow-wrapper";
        this.hf().className = "vl-dialog-bg";
        var b = bd("div", {});
        a.appendChild(b);
        a = "vl-call-arrow animated bounce";
        $i && (a += " vl-call-arrow-firefox");
        b.className = a;
        b = this.hf();
        a = this.e();
        Bt(this, fu(a, 0.25), gu(a, 0.25), fu(b, 0.25), gu(b, 0.25))
    };
    Yw.prototype.show = function(a) {
        this.vf && this.ha(a);
        return new G("showing")
    };
    Yw.prototype.te = e("vf");
    Yw.prototype.load = function() {
        this.vf = !0;
        return new G("loaded")
    };

    function Zx(a, b) {
        Gw.call(this, b);
        this.ob = a
    }
    y(Zx, Gw);
    n = Zx.prototype;
    n.navigate = function(a, b) {
        Zx.c.navigate.call(this, a, b);
        window._gaq.push(["_trackPageview", a])
    };
    n.qo = function() {
        var a = Pw(this),
            b = Xw(this, a.tg);
        Sw(this, b, a)
    };
    n.Sj = function(a) {
        var b = Pw(this),
            c = Xw(this, b.tg);
        return Uw(this, c, b, a)
    };
    n.sp = function(a) {
        var b = Pw(this);
        return Zw(this, a, b.tg)
    };
    n.Tj = function(a, b) {
        Ww(this, a, b)
    };
    n.$k = function(a, b) {
        return Rw(this, a, b)
    };
    n.ga = function() {
        Zx.c.ga.call(this);
        console.log("Application exited while on page?")
    };
    n.is = function(a) {
        var b = dx(this);
        return (a = this.Ue[a]) ? Sw(this, a, b) : new G("no panel")
    };
    n.vp = function(a, b) {
        var c = dx(this, b),
            d = c.e();
        return ax(this, a, c.tg, d)
    };
    n.iq = function(a, b) {
        F(this.G, "Hiding video panel");
        cx(this, a, b)
    };

    function $x(a) {
        this.I = new Bj(a, T);
        this.Fo = this.fb = this.Rf = this.Sr = this.ob = this.jb = this.zk = null
    }
    n = $x.prototype;
    n.oa = function() {
        var a = this.I;
        return R(a, "serviceId") || R(a, "appId")
    };
    n.M = function() {
        return this.ob || (this.ob = new Z(this))
    };

    function jl(a) {
        return a.jb || (a.jb = new wn(a))
    }
    n.Mj = function() {
        return this.Sr || (this.Sr = ho(this, null))
    };
    n.lf = function() {
        var a;
        if (!(a = this.Fo)) {
            a = new Zx(this.M());
            var b = new ht(this, a);
            a.load(document.body);
            a = this.Fo = b
        }
        return a
    };
    n.pb = function() {
        return this.lf().pb()
    };

    function ho(a, b) {
        if (b) {
            var c = a.M().vm(),
                d, f = b.Pa();
            f && (d = f.Ug);
            for (f = 0; f < c.length; f++)
                if (null != c[f] && d === c[f].Pa().Ug) return c[f]
        }
        return new Nn(a, b, new Go, a.Rf || (a.Rf = io(a)))
    }
    n.Sl = function(a, b, c, d, f) {
        var g = a.r(),
            h = d && d.Jj() || nj(),
            h = g.W.put(fi("/local/peerSession", h), "peerSession").La().Ia;
        h.se(g, a, b, c, d, f);
        return h
    };

    function io(a) {
        var b = new Go;
        new Cp(a.zk || (a.zk = new en), b, a.I);
        return b
    };

    function ay(a) {
        v(a) && (a = {
            appId: a
        });
        a = (new $x(a)).M();
        if (!a.qq) {
            a.qq = !0;
            var b = (new Xn(a.L, null, !0)).Pa();
            b ? (Rn(b.Rn.r(), b), a.Ca()) : po(a)
        }
        a.vm();
        a.ia().I.get("ui") ? a.pb() : oe().n(Hk);
        return a
    };
    x("vline.LogLevels.ERROR", be);
    x("vline.LogLevels.WARNING", ce);
    x("vline.LogLevels.INFO", de);
    x("vline.LogLevels.FINE", fe);
    x("vline.LogLevels.FINER", ge);
    x("vline.LogLevels.FINEST", he);
    x("vline.LogLevels.OFF", $d);
    x("vline.MediaStates.INACTIVE", "inactive");
    x("vline.MediaStates.PENDING", "pending");
    x("vline.MediaStates.INCOMING", "incoming");
    x("vline.MediaStates.OUTGOING", "outgoing");
    x("vline.MediaStates.ACTIVE", "active");
    x("vline.PresenceStates.OFFLINE", "offline");
    x("vline.PresenceStates.ONLINE", "online");
    x("vline.PresenceStates.AWAY", "away");
    x("vline.PresenceStates.DO_NOT_DISTURB", "do_not_disturb");
    x("vline.PresenceStates.INVISIBLE", "invisible");
    x("vline.PresenceStates.NONE", "none");
    x("vline.client.create", ay);
    x("vline.config", T);
    x("vline.ui.create", function(a, b) {
        return new ht(a.ia(), b)
    });
    x("vline.log.setLevel", Ge);
    x("vline.ui.showStatsPanels", Nx);
    x("vline.ui.toggleStatsPanels", function() {
        Hx = !Hx;
        Nx(Hx)
    });
    x("vline.defer", sh);
    x("vline.when", zh);
    x("vline.Promise.prototype", G.prototype);
    x("vline.Promise.prototype.always", G.prototype.Xe);
    x("vline.Promise.prototype.done", G.prototype.n);
    x("vline.Promise.prototype.then", G.prototype.el);
    x("vline.Promise.prototype.fail", G.prototype.Mb);
    x("vline.EventTarget.prototype", Q.prototype);
    x("vline.EventTarget.prototype.on", Q.prototype.on);
    x("vline.EventTarget.prototype.off", Q.prototype.vn);
    x("vline.EventTarget.prototype.one", Q.prototype.In);
    x("vline.EventTarget.prototype.getId", Q.prototype.j);
    x("vline.Events.SESSION_INTRODUCE", "pub:sig:sessionIntroduce");
    x("vline.Events.SESSION_INITIATE", "pub:sig:sessionInitiate");
    x("vline.Events.SESSION_TERMINATE", "pub:sig:sessionTerminate");
    x("vline.Events.SESSION_CANDIDATE", "pub:sig:transportCandidate");
    x("vline.Events.SESSION_ACCEPT", "pub:sig:sessionAccept");
    x("vline.Events.UPDATE_SESSION_SOURCE", "pub:updateSessionSource");
    x("vline.Events.SESSION_WELCOME", "pub:sig:sessionWelcome");
    x("vline.Client.create", ay);
    x("vline.Client.prototype", Z.prototype);
    x("vline.Client.prototype.connect", Z.prototype.cg);
    x("vline.Client.prototype.disconnect", Z.prototype.disconnect);
    x("vline.Client.prototype.login", Z.prototype.xf);
    x("vline.Client.prototype.logout", Z.prototype.ic);
    x("vline.Client.prototype.isConnected", Z.prototype.uf);
    x("vline.Client.prototype.isLoggedIn", Z.prototype.Wh);
    x("vline.Client.prototype.isAnonymous", Z.prototype.ak);
    x("vline.Client.prototype.getConnectionState", Z.prototype.Md);
    x("vline.Client.prototype.getDefaultSession", Z.prototype.jf);
    x("vline.Client.prototype.getSessions", Z.prototype.vm);
    x("vline.Client.prototype.getMediaSessions", Z.prototype.mg);
    x("vline.Client.prototype.getIncomingMediaSessions", Z.prototype.Hj);
    x("vline.Client.prototype.getOutgoingMediaSessions", Z.prototype.Lj);
    x("vline.Client.prototype.getActiveMediaSession", Z.prototype.Dj);
    x("vline.Client.prototype.getUnreadCount", Z.prototype.mf);
    x("vline.Client.prototype.hasMediaSessions", Z.prototype.tu);
    x("vline.Client.prototype.hasActiveMediaSession", Z.prototype.qu);
    x("vline.Client.prototype.hasIncomingMediaSessions", Z.prototype.su);
    x("vline.Client.prototype.hasOutgoingMediaSessions", Z.prototype.vu);
    x("vline.Client.prototype.hasPendingMediaSessions", Z.prototype.Km);
    x("vline.Client.prototype.hasPendingMediaStreams", Z.prototype.Lm);
    x("vline.Client.prototype.stopMediaSessions", Z.prototype.wo);
    x("vline.Client.prototype.setAnswerTimeout", Z.prototype.Qx);
    x("vline.Client.prototype.setRingtone", Z.prototype.mo);
    x("vline.Client.prototype.setIncomingMessageSound", Z.prototype.Sx);
    x("vline.Client.prototype.getUiModule", Z.prototype.lf);
    x("vline.Client.prototype.getLocalStream", Z.prototype.Ij);
    x("vline.Session.prototype", Nn.prototype);
    x("vline.Session.prototype.logout", Nn.prototype.ic);
    x("vline.Session.prototype.getAuthToken", Nn.prototype.yh);
    x("vline.Session.prototype.getContacts", Nn.prototype.Mt);
    x("vline.Session.prototype.getProviderUrl", Nn.prototype.Ih);
    x("vline.Session.prototype.getLocalPerson", Nn.prototype.Pt);
    x("vline.Session.prototype.getLocalPersonId", Nn.prototype.Qa);
    x("vline.Session.prototype.getPerson", Nn.prototype.qb);
    x("vline.Session.prototype.getUnreadCount", Nn.prototype.mf);
    x("vline.Session.prototype.setPresence", Nn.prototype.Yk);
    x("vline.Session.prototype.setStatus", Nn.prototype.Ng);
    x("vline.Session.prototype.postMessage", Nn.prototype.postMessage);
    x("vline.Session.prototype.publishMessage", Nn.prototype.Ik);
    x("vline.Session.prototype.startMedia", Nn.prototype.Oe);
    x("vline.Session.prototype.stopMedia", Nn.prototype.Pe);
    x("vline.Session.prototype.joinGroup", Nn.prototype.Ru);
    x("vline.Session.prototype.createRoom", Nn.prototype.ot);
    x("vline.Session.prototype.getRoom", Nn.prototype.Vp);
    x("vline.Session.prototype.publishToRemoteSession", Nn.prototype.Ex);
    x("vline.Channel.prototype", X.prototype);
    x("vline.Channel.prototype.postMessage", X.prototype.postMessage);
    x("vline.Channel.prototype.publishMessage", X.prototype.Ik);
    x("vline.Channel.prototype.startMedia", X.prototype.Oe);
    x("vline.Channel.prototype.stopMedia", X.prototype.Pe);
    x("vline.Channel.prototype.informLocalTyping", X.prototype.nq);
    x("vline.Channel.prototype.getId", X.prototype.j);
    x("vline.Channel.prototype.getShortId", X.prototype.Zt);
    x("vline.Channel.prototype.getDisplayName", X.prototype.Nd);
    x("vline.Channel.prototype.getMessages", X.prototype.St);
    x("vline.Channel.prototype.getMediaSession", X.prototype.Rt);
    x("vline.Channel.prototype.getProfileUrl", X.prototype.tm);
    x("vline.Channel.prototype.getThumbnailUrl", X.prototype.kd);
    x("vline.Channel.prototype.getStatus", X.prototype.pe);
    x("vline.Channel.prototype.getUnreadCount", X.prototype.mf);
    x("vline.Channel.prototype.isMediaSupported", X.prototype.Hu);
    x("vline.Channel.prototype.isActive", X.prototype.Rc);
    x("vline.Channel.prototype.isTyping", X.prototype.Nu);
    x("vline.Channel.prototype.setMessageSoundEnabled", X.prototype.Tx);
    x("vline.Channel.prototype.setActive", X.prototype.setActive);
    x("vline.Channel.prototype.setStatus", X.prototype.Ng);
    x("vline.Channel.prototype.getPath", X.prototype.l);
    x("vline.Channel.prototype.getType", X.prototype.X);
    x("vline.Channel.prototype.retain", X.prototype.La);
    x("vline.Channel.prototype.release", X.prototype.ja);
    x("vline.Channel.prototype.autorelease", X.prototype.vb);
    x("vline.Person.prototype", Am.prototype);
    x("vline.Person.prototype.getUsername", Am.prototype.xm);
    x("vline.Person.prototype.getPresenceState", Am.prototype.og);
    x("vline.Person.prototype.getPresenceDesc", Am.prototype.sm);
    x("vline.Group.prototype", nn.prototype);
    x("vline.Group.prototype.getMembers", nn.prototype.Fh);
    x("vline.Group.prototype.startGroupMedia", nn.prototype.ay);
    x("vline.Room.prototype", qn.prototype);
    x("vline.Room.prototype.join", qn.prototype.join);
    x("vline.Room.prototype.leave", qn.prototype.zg);
    x("vline.Room.prototype.startMedia", qn.prototype.Oe);
    x("vline.Room.prototype.stopMedia", qn.prototype.Pe);
    x("vline.Message.prototype", U.prototype);
    x("vline.Message.prototype.getSender", U.prototype.Yt);
    x("vline.Message.prototype.getSenderId", U.prototype.Kh);
    x("vline.Message.prototype.getChannel", U.prototype.Xb);
    x("vline.Message.prototype.getChannelId", U.prototype.Lt);
    x("vline.Message.prototype.getSessionId", U.prototype.Oc);
    x("vline.Message.prototype.getBody", U.prototype.Qp);
    x("vline.Message.prototype.getError", U.prototype.getError);
    x("vline.Message.prototype.getPath", U.prototype.l);
    x("vline.Message.prototype.getType", U.prototype.X);
    x("vline.Message.prototype.getId", U.prototype.j);
    x("vline.Message.prototype.retain", U.prototype.La);
    x("vline.Message.prototype.release", U.prototype.ja);
    x("vline.Message.prototype.autorelease", U.prototype.vb);
    x("vline.msg.CandidateSignal", Sk);
    x("vline.msg.CandidateSignal.prototype", Sk.prototype);
    x("vline.msg.VADStateTransition", Vk);
    x("vline.msg.VADStateTransition.prototype", Vk.prototype);
    x("vline.msg.VADStateConfidence", Kl);
    x("vline.msg.VADStateConfidence.prototype", Kl.prototype);
    x("vline.msg.UpdateSessionSource", $k);
    x("vline.msg.UpdateSessionSource.prototype", $k.prototype);
    x("vline.msg.UpdateSessionSource.prototype.getNewSourceMediaSessionId", $k.prototype.Vt);
    x("vline.msg.Signal.prototype", Ok.prototype);
    x("vline.msg.Signal.prototype.getMediaSessionId", Ok.prototype.Jj);
    x("vline.msg.SdpSignal.prototype", Rk.prototype);
    x("vline.msg.SdpSignal.prototype.getSdp", Rk.prototype.Nj);
    x("vline.msg.CandidateSignal.prototype", Sk.prototype);
    x("vline.msg.CandidateSignal.prototype.getSdpMid", Sk.prototype.Xp);
    x("vline.msg.CandidateSignal.prototype.getSdpMLineIndex", Sk.prototype.Wp);
    x("vline.MediaSession.prototype", W.prototype);
    x("vline.MediaSession.prototype.start", W.prototype.start);
    x("vline.MediaSession.prototype.stop", W.prototype.stop);
    x("vline.MediaSession.prototype.getChannel", W.prototype.Xb);
    x("vline.MediaSession.prototype.getDisplayName", W.prototype.Nd);
    x("vline.MediaSession.prototype.getThumbnailUrl", W.prototype.kd);
    x("vline.MediaSession.prototype.getMediaState", W.prototype.Nc);
    x("vline.MediaSession.prototype.getLocalStreams", W.prototype.Dh);
    x("vline.MediaSession.prototype.getRemoteStreams", W.prototype.Pd);
    x("vline.MediaSession.prototype.hasVideo", W.prototype.Qd);
    x("vline.MediaSession.prototype.hasAudio", W.prototype.Rj);
    x("vline.MediaSession.prototype.isPending", W.prototype.Ku);
    x("vline.MediaSession.prototype.isIncoming", W.prototype.Fu);
    x("vline.MediaSession.prototype.isOutgoing", W.prototype.Ju);
    x("vline.MediaSession.prototype.isConnecting", W.prototype.Xm);
    x("vline.MediaSession.prototype.isActive", W.prototype.Rc);
    x("vline.MediaSession.prototype.isClosed", W.prototype.Du);
    x("vline.MediaSession.prototype.isAudioMuted", W.prototype.bk);
    x("vline.MediaSession.prototype.isVideoMuted", W.prototype.$m);
    x("vline.MediaSession.prototype.setAudioMuted", W.prototype.Mg);
    x("vline.MediaSession.prototype.setVideoMuted", W.prototype.Og);
    x("vline.MediaSession.prototype.isVideoPanelVisible", W.prototype.Ou);
    x("vline.MediaSession.prototype.getConnectionType", W.prototype.nm);
    x("vline.MediaSession.prototype.isInitiator", W.prototype.Gu);
    x("vline.MediaSession.prototype.transfer", W.prototype.jl);
    x("vline.MediaSession.prototype.getParticipants", W.prototype.Wt);
    x("vline.MediaStream.prototype", qj.prototype);
    x("vline.MediaStream.prototype.stop", qj.prototype.stop);
    x("vline.MediaStream.prototype.setAudioMuted", qj.prototype.Mg);
    x("vline.MediaStream.prototype.setVideoMuted", qj.prototype.Og);
    x("vline.MediaStream.prototype.createMediaElement", qj.prototype.tp);
    x("vline.MediaStream.prototype.createVideoElement", qj.prototype.up);
    x("vline.MediaStream.prototype.createAudioElement", qj.prototype.qp);
    x("vline.MediaStream.prototype.getNativeStream", qj.prototype.Ut);
    x("vline.MediaStream.prototype.hasAudio", qj.prototype.Rj);
    x("vline.MediaStream.prototype.hasVideo", qj.prototype.Qd);
    x("vline.MediaStream.prototype.isAudioMuted", qj.prototype.bk);
    x("vline.MediaStream.prototype.isVideoMuted", qj.prototype.$m);
    x("vline.MediaStream.prototype.isStarted", qj.prototype.wq);
    x("vline.MediaStream.prototype.isLocal", qj.prototype.Ea);
    x("vline.MediaStream.prototype.isRemote", qj.prototype.Mu);
    x("vline.MediaStream.prototype.getPerson", qj.prototype.qb);
    x("vline.Entity.prototype", L.prototype);
    x("vline.Entity.prototype.getCreationTime", L.prototype.om);
    x("vline.Entity.prototype.getPath", L.prototype.l);
    x("vline.Entity.prototype.getType", L.prototype.X);
    x("vline.Entity.prototype.getId", L.prototype.j);
    x("vline.Entity.prototype.retain", L.prototype.La);
    x("vline.Entity.prototype.release", L.prototype.ja);
    x("vline.Entity.prototype.autorelease", L.prototype.vb);
    x("vline.Delegate.prototype", ki.prototype);
    x("vline.Delegate.prototype.getId", ki.prototype.j);
    x("vline.Delegate.prototype.retain", ki.prototype.La);
    x("vline.Delegate.prototype.release", ki.prototype.ja);
    x("vline.Delegate.prototype.autorelease", ki.prototype.vb);
    x("vline.Collection.prototype", $m.prototype);
    x("vline.Collection.prototype.getRoot", $m.prototype.Xt);
    x("vline.Collection.prototype.getPath", $m.prototype.l);
    x("vline.Collection.prototype.getSize", $m.prototype.Pc);
    x("vline.Collection.prototype.getImpl", $m.prototype.Nt);
    x("vline.Collection.prototype.get", $m.prototype.get);
    x("vline.Collection.prototype.getAt", $m.prototype.mm);
    x("vline.Collection.prototype.retain", $m.prototype.La);
    x("vline.Collection.prototype.release", $m.prototype.ja);
    x("vline.Collection.prototype.autorelease", $m.prototype.vb);
    x("vline.Collection.prototype.hasNextPage", $m.prototype.uu);
    x("vline.Collection.prototype.loadNextPage", $m.prototype.Xu);
    x("vline.UiModule.prototype", ht.prototype);
    x("vline.UiModule.prototype.createMessageInput", ht.prototype.nt);
    x("vline.UiModule.prototype.createTextLogo", ht.prototype.pt);
    x("vline.Browser.supportsChat", function() {
        return lj() || ej || $i || fj || cj || bj || dj
    });
    x("vline.Browser.supportsWebRtc", lj);
    x("vline.Browser.supportsHd", Pi);
    x("vline.Browser.getUserAgentString", function() {
        return Ab()
    });
    x("vline.Browser.isVersion", function(a) {
        return ij(a)
    });
    x("vline.Browser.getVersionString", function() {
        return Jb
    });
    x("vline.Browser.isFirefox", function() {
        return $i
    });
    x("vline.Browser.isIE", function() {
        return A
    });
    x("vline.Browser.isOpera", function() {
        return Eb
    });
    x("vline.Browser.isSafari", function() {
        return fj
    });
    x("vline.Browser.isChrome", function() {
        return ej
    });
    x("vline.Browser.isMobile", jj);
    x("vline.MessageInput", gt);
    x("vline.MessageInput.prototype", gt.prototype);
    x("vline.MessageInput.prototype.setPersonId", gt.prototype.Ux);
    x("vline.MessageInput.prototype.render", gt.prototype.Qb);
    x("vline.Disposable.prototype", yg.prototype);
    x("vline.Disposable.prototype.dispose", yg.prototype.F);

})();