webpackJsonp([1], {
    100 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(101),
        g = n.n(A),
        l = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        c = a.a.createClass({
            displayName: "OneDateItem",
            render: function() {
                var e = this.props,
                t = e.s,
                n = e.data,
                i = e.arrow;
                return a.a.createElement("li", {
                    className: n.className,
                    style: Object.assign({},
                    t.rdp_item_li, i ? t["rdp_item_li_" + n.className + "_arrow"] : t["rdp_item_li_" + n.className])
                },
                n.text ? n.text: "　")
            }
        });
        "document" in self && ("classList" in document.createElement("_") && (!document.createElementNS || "classList" in document.createElementNS("http://www.w3.org/2000/svg", "g")) ||
        function(e) {
            if ("Element" in e) {
                var t = "classList",
                n = "prototype",
                i = e.Element[n],
                o = Object,
                r = String[n].trim ||
                function() {
                    return this.replace(/^\s+|\s+$/g, "")
                },
                s = Array[n].indexOf ||
                function(e) {
                    for (var t = 0,
                    n = this.length; n > t; t++) if (t in this && this[t] === e) return t;
                    return - 1
                },
                a = function(e, t) {
                    this.name = e,
                    this.code = DOMException[e],
                    this.message = t
                },
                A = function(e, t) {
                    if ("" === t) throw new a("SYNTAX_ERR", "The token must not be empty.");
                    if (/\s/.test(t)) throw new a("INVALID_CHARACTER_ERR", "The token must not contain space characters.");
                    return s.call(e, t)
                },
                g = function(e) {
                    for (var t = r.call(e.getAttribute("class") || ""), n = t ? t.split(/\s+/) : [], i = 0, o = n.length; o > i; i++) this.push(n[i]);
                    this._updateClassName = function() {
                        e.setAttribute("class", this.toString())
                    }
                },
                l = g[n] = [],
                c = function() {
                    return new g(this)
                };
                if (a[n] = Error[n], l.item = function(e) {
                    return this[e] || null
                },
                l.contains = function(e) {
                    return~A(this, e + "")
                },
                l.add = function() {
                    var e, t = arguments,
                    n = 0,
                    i = t.length,
                    o = !1;
                    do {
                        e = t[n] + "", ~A(this, e) || (this.push(e), o = !0)
                    } while (++ n < i );
                    o && this._updateClassName()
                },
                l.remove = function() {
                    var e, t, n = arguments,
                    i = 0,
                    o = n.length,
                    r = !1;
                    do {
                        for (e = n[i] + "", t = A(this, e);~t;) this.splice(t, 1), r = !0, t = A(this, e)
                    } while (++ i < o );
                    r && this._updateClassName()
                },
                l.toggle = function(e, t) {
                    var n = this.contains(e),
                    i = n ? !0 !== t && "remove": !1 !== t && "add";
                    return i && this[i](e),
                    !0 === t || !1 === t ? t: !n
                },
                l.replace = function(e, t) {
                    var n = A(e + "");~n && (this.splice(n, 1, t), this._updateClassName())
                },
                l.toString = function() {
                    return this.join(" ")
                },
                o.defineProperty) {
                    var C = {
                        get: c,
                        enumerable: !0,
                        configurable: !0
                    };
                    try {
                        o.defineProperty(i, t, C)
                    } catch(e) {
                        void 0 !== e.number && -2146823252 !== e.number || (C.enumerable = !1, o.defineProperty(i, t, C))
                    }
                } else o[n].__defineGetter__ && i.__defineGetter__(t, c)
            }
        } (self),
        function() {
            var e = document.createElement("_");
            if (e.classList.add("c1", "c2"), !e.classList.contains("c2")) {
                var t = function(e) {
                    var t = DOMTokenList.prototype[e];
                    DOMTokenList.prototype[e] = function(e) {
                        var n, i = arguments.length;
                        for (n = 0; i > n; n++) e = arguments[n],
                        t.call(this, e)
                    }
                };
                t("add"),
                t("remove")
            }
            if (e.classList.toggle("c3", !1), e.classList.contains("c3")) {
                var n = DOMTokenList.prototype.toggle;
                DOMTokenList.prototype.toggle = function(e, t) {
                    return 1 in arguments && !this.contains(e) == !t ? t: n.call(this, e)
                }
            }
            "replace" in document.createElement("_").classList || (DOMTokenList.prototype.replace = function(e, t) {
                var n = this.toString().split(" "),
                i = n.indexOf(e + "");~i && (n = n.slice(i), this.remove.apply(this, n), this.add(t), this.add.apply(this, n.slice(1)))
            }),
            e = null
        } ());
        var C = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                n.props = e;
                var r = new Date,
                s = e.data.year || e.maxYear || r.getFullYear(),
                a = e.data.maxMonth || e.maxMonth || r.getMonth(),
                A = e.data.maxDate || e.maxDate || r.getDate(),
                g = new Date(parseInt(s, 10), parseInt(a, 10), parseInt(A, 10)),
                l = e.data.datePickerBirthFormat || "1985070100",
                c = parseInt(l.substr(0, 4), 10) || parseInt(e.year, 10),
                C = parseInt(l.substr(4, 2), 10) || parseInt(e.month, 10),
                I = parseInt(l.substr(6, 2), 10) || parseInt(e.day, 10),
                h = g.getFullYear(),
                u = parseInt(e.data.startYear || e.startYear, 10);
                u = u && u < h ? u: 1910;
                var d = c && c >= u && c <= h ? c: u,
                p = C && C >= 1 && C <= 12 ? C: 1,
                f = n.getDaysByYearAndMonth(d, p),
                m = I && I >= 1 && I <= f ? I: 1;
                return n.timestamp = Date.now() + Math.floor(100 * Math.random()),
                n.scrollTop = 0,
                n.scrollHeight = 0,
                n.isMoblie = function() {
                    var e = navigator.userAgent;
                    return ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"].some(function(t) {
                        return new RegExp(t, "i").test(e)
                    })
                } (),
                n.state = {
                    mode: 0,
                    minYear: 1890,
                    maxYear: 2100,
                    MaxDate: g,
                    selectedYear: d,
                    selectedMonth: p,
                    selectedDay: m,
                    selectedTime: "时辰不清楚",
                    selectedTimeValue: 0,
                    selectedTimeId: 0,
                    solarYear: d,
                    solarMonth: p,
                    solarDay: m,
                    startYear: u,
                    endYear: g.getFullYear(),
                    yearData: [],
                    monthData: [],
                    dayData: [],
                    timeData: [],
                    iScrollInitConfig: n.isMoblie ? {
                        startY: 0,
                        defaultScrollbars: "horizontal"
                    }: {
                        mouseWheel: !0,
                        mouseWheelSpeed: 1,
                        startY: 0,
                        snap: "li",
                        defaultScrollbars: "horizontal"
                    },
                    yearIScroll: null,
                    monthIScroll: null,
                    dayIScroll: null,
                    activeTabIndex: 0
                },
                n
            }
            return r(t, e),
            l(t, [{
                key: "lunarRecord",
                value: function() {
                    return [[2, 1, 21, 22184], [0, 2, 9, 21936], [6, 1, 30, 9656], [0, 2, 17, 9584], [0, 2, 6, 21168], [5, 1, 26, 43344], [0, 2, 13, 59728], [0, 2, 2, 27296], [3, 1, 22, 44368], [0, 2, 10, 43856], [8, 1, 30, 19304], [0, 2, 19, 19168], [0, 2, 8, 42352], [5, 1, 29, 21096], [0, 2, 16, 53856], [0, 2, 4, 55632], [4, 1, 25, 27304], [0, 2, 13, 22176], [0, 2, 2, 39632], [2, 1, 22, 19176], [0, 2, 10, 19168], [6, 1, 30, 42200], [0, 2, 18, 42192], [0, 2, 6, 53840], [5, 1, 26, 54568], [0, 2, 14, 46400], [0, 2, 3, 54944], [2, 1, 23, 38608], [0, 2, 11, 38320], [7, 2, 1, 18872], [0, 2, 20, 18800], [0, 2, 8, 42160], [5, 1, 28, 45656], [0, 2, 16, 27216], [0, 2, 5, 27968], [4, 1, 24, 44456], [0, 2, 13, 11104], [0, 2, 2, 38256], [2, 1, 23, 18808], [0, 2, 10, 18800], [6, 1, 30, 25776], [0, 2, 17, 54432], [0, 2, 6, 59984], [5, 1, 26, 27976], [0, 2, 14, 23248], [0, 2, 4, 11104], [3, 1, 24, 37744], [0, 2, 11, 37600], [7, 1, 31, 51560], [0, 2, 19, 51536], [0, 2, 8, 54432], [6, 1, 27, 55888], [0, 2, 15, 46416], [0, 2, 5, 22176], [4, 1, 25, 43736], [0, 2, 13, 9680], [0, 2, 2, 37584], [2, 1, 22, 51544], [0, 2, 10, 43344], [7, 1, 29, 46248], [0, 2, 17, 27808], [0, 2, 6, 46416], [5, 1, 27, 21928], [0, 2, 14, 19872], [0, 2, 3, 42416], [3, 1, 24, 21176], [0, 2, 12, 21168], [8, 1, 31, 43344], [0, 2, 18, 59728], [0, 2, 8, 27296], [6, 1, 28, 44368], [0, 2, 15, 43856], [0, 2, 5, 19296], [4, 1, 25, 42352], [0, 2, 13, 42352], [0, 2, 2, 21088], [3, 1, 21, 59696], [0, 2, 9, 55632], [7, 1, 30, 23208], [0, 2, 17, 22176], [0, 2, 6, 38608], [5, 1, 27, 19176], [0, 2, 15, 19152], [0, 2, 3, 42192], [4, 1, 23, 53864], [0, 2, 11, 53840], [8, 1, 31, 54568], [0, 2, 18, 46400], [0, 2, 7, 46752], [6, 1, 28, 38608], [0, 2, 16, 38320], [0, 2, 5, 18864], [4, 1, 25, 42168], [0, 2, 13, 42160], [10, 2, 2, 45656], [0, 2, 20, 27216], [0, 2, 9, 27968], [6, 1, 29, 44448], [0, 2, 17, 43872], [0, 2, 6, 38256], [5, 1, 27, 18808], [0, 2, 15, 18800], [0, 2, 4, 25776], [3, 1, 23, 27216], [0, 2, 10, 59984], [8, 1, 31, 27432], [0, 2, 19, 23232], [0, 2, 7, 43872], [5, 1, 28, 37736], [0, 2, 16, 37600], [0, 2, 5, 51552], [4, 1, 24, 54440], [0, 2, 12, 54432], [0, 2, 1, 55888], [2, 1, 22, 23208], [0, 2, 9, 22176], [7, 1, 29, 43736], [0, 2, 18, 9680], [0, 2, 7, 37584], [5, 1, 26, 51544], [0, 2, 14, 43344], [0, 2, 3, 46240], [4, 1, 23, 46416], [0, 2, 10, 44368], [9, 1, 31, 21928], [0, 2, 19, 19360], [0, 2, 8, 42416], [6, 1, 28, 21176], [0, 2, 16, 21168], [0, 2, 5, 43312], [4, 1, 25, 29864], [0, 2, 12, 27296], [0, 2, 1, 44368], [2, 1, 22, 19880], [0, 2, 10, 19296], [6, 1, 29, 42352], [0, 2, 17, 42208], [0, 2, 6, 53856], [5, 1, 26, 59696], [0, 2, 13, 54576], [0, 2, 3, 23200], [3, 1, 23, 27472], [0, 2, 11, 38608], [11, 1, 31, 19176], [0, 2, 19, 19152], [0, 2, 8, 42192], [6, 1, 28, 53848], [0, 2, 15, 53840], [0, 2, 4, 54560], [5, 1, 24, 55968], [0, 2, 12, 46496], [0, 2, 1, 22224], [2, 1, 22, 19160], [0, 2, 10, 18864], [7, 1, 30, 42168], [0, 2, 17, 42160], [0, 2, 6, 43600], [5, 1, 26, 46376], [0, 2, 14, 27936], [0, 2, 2, 44448], [3, 1, 23, 21936], [0, 2, 11, 37744], [8, 2, 1, 18808], [0, 2, 19, 18800], [0, 2, 8, 25776], [6, 1, 28, 27216], [0, 2, 15, 59984], [0, 2, 4, 27424], [4, 1, 24, 43872], [0, 2, 12, 43744], [0, 2, 2, 37600], [3, 1, 21, 51568], [0, 2, 9, 51552], [7, 1, 29, 54440], [0, 2, 17, 54432], [0, 2, 5, 55888], [5, 1, 26, 23208], [0, 2, 14, 22176], [0, 2, 3, 42704], [4, 1, 23, 21224], [0, 2, 11, 21200], [8, 1, 31, 43352], [0, 2, 19, 43344], [0, 2, 7, 46240], [6, 1, 27, 46416], [0, 2, 15, 44368], [0, 2, 5, 21920], [4, 1, 24, 42448], [0, 2, 12, 42416], [0, 2, 2, 21168], [3, 1, 22, 43320], [0, 2, 9, 26928], [7, 1, 29, 29336], [0, 2, 17, 27296], [0, 2, 6, 44368], [5, 1, 26, 19880], [0, 2, 14, 19296], [0, 2, 3, 42352], [4, 1, 24, 21104], [0, 2, 10, 53856], [8, 1, 30, 59696], [0, 2, 18, 54560], [0, 2, 7, 55968], [6, 1, 27, 27472], [0, 2, 15, 22224], [0, 2, 5, 19168], [4, 1, 25, 42216], [0, 2, 12, 42192], [0, 2, 1, 53584], [2, 1, 21, 55592], [0, 2, 9, 54560]]
                }
            },
            {
                key: "errorCode",
                value: function() {
                    return {
                        100 : "输入的年份超过了可查询范围，仅支持1891至2100年",
                        101 : "参数输入错误，请查阅文档"
                    }
                }
            },
            {
                key: "lunarData",
                value: function() {
                    return {
                        TIAN_GAN: ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"],
                        DI_ZHI: ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"],
                        SHENG_XIAO: ["鼠", "牛", "虎", "兔", "龙", "蛇", "马", "羊", "猴", "鸡", "狗", "猪"],
                        JIE_QI: ["小寒", "大寒", "立春", "雨水", "惊蛰", "春分", "清明", "谷雨", "立夏", "小满", "芒种", "夏至", "小暑", "大暑", "立秋", "处暑", "白露", "秋分", "寒露", "霜降", "立冬", "小雪", "大雪", "冬至"],
                        NONG_LI_YUE: ["正", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],
                        NONG_LI_RI: ["初一", "初二", "初三", "初四", "初五", "初六", "初七", "初八", "初九", "初十", "十一", "十二", "十三", "十四", "十五", "十六", "十七", "十八", "十九", "二十", "廿一", "廿二", "廿三", "廿四", "廿五", "廿六", "廿七", "廿八", "廿九", "三十", "卅一"],
                        SHI_CENG: [{
                            id: 0,
                            value: -1,
                            text: "时辰未知",
                            time: "时辰未知",
                            time_tw: "時辰未知"
                        },
                        {
                            id: 1,
                            value: 0,
                            text: "00:00-00:59(早子)",
                            time: "早子时",
                            time_tw: "早子時"
                        },
                        {
                            id: 2,
                            value: 1,
                            text: "01:00-01:59(丑)",
                            time: "丑时",
                            time_tw: "丑時"
                        },
                        {
                            id: 3,
                            value: 2,
                            text: "02:00-02:59(丑)",
                            time: "丑时",
                            time_tw: "丑時"
                        },
                        {
                            id: 4,
                            value: 3,
                            text: "03:00-03:59(寅)",
                            time: "寅时",
                            time_tw: "寅時"
                        },
                        {
                            id: 5,
                            value: 4,
                            text: "04:00-04:59(寅)",
                            time: "寅时",
                            time_tw: "寅時"
                        },
                        {
                            id: 6,
                            value: 5,
                            text: "05:00-05:59(卯)",
                            time: "卯时",
                            time_tw: "卯時"
                        },
                        {
                            id: 7,
                            value: 6,
                            text: "06:00-06:59(卯)",
                            time: "卯时",
                            time_tw: "卯時"
                        },
                        {
                            id: 8,
                            value: 7,
                            text: "07:00-07:59(辰)",
                            time: "辰时",
                            time_tw: "辰時"
                        },
                        {
                            id: 9,
                            value: 8,
                            text: "08:00-08:59(辰)",
                            time: "辰时",
                            time_tw: "辰時"
                        },
                        {
                            id: 10,
                            value: 9,
                            text: "09:00-09:59(巳)",
                            time: "巳时",
                            time_tw: "巳時"
                        },
                        {
                            id: 11,
                            value: 10,
                            text: "10:00-10:59(巳)",
                            time: "巳时",
                            time_tw: "巳時"
                        },
                        {
                            id: 12,
                            value: 11,
                            text: "11:00-11:59(午)",
                            time: "午时",
                            time_tw: "午時"
                        },
                        {
                            id: 13,
                            value: 12,
                            text: "12:00-12:59(午)",
                            time: "午时",
                            time_tw: "午時"
                        },
                        {
                            id: 14,
                            value: 13,
                            text: "13:00-13:59(未)",
                            time: "未时",
                            time_tw: "未時"
                        },
                        {
                            id: 15,
                            value: 14,
                            text: "14:00-14:59(未)",
                            time: "未时",
                            time_tw: "未時"
                        },
                        {
                            id: 16,
                            value: 15,
                            text: "15:00-15:59(申)",
                            time: "申时",
                            time_tw: "申時"
                        },
                        {
                            id: 17,
                            value: 16,
                            text: "16:00-16:59(申)",
                            time: "申时",
                            time_tw: "申時"
                        },
                        {
                            id: 18,
                            value: 17,
                            text: "17:00-17:59(酉)",
                            time: "酉时",
                            time_tw: "酉時"
                        },
                        {
                            id: 19,
                            value: 18,
                            text: "18:00-18:59(酉)",
                            time: "酉时",
                            time_tw: "酉時"
                        },
                        {
                            id: 20,
                            value: 19,
                            text: "19:00-19:59(戌)",
                            time: "戌时",
                            time_tw: "戌時"
                        },
                        {
                            id: 21,
                            value: 20,
                            text: "20:00-20:59(戌)",
                            time: "戌时",
                            time_tw: "戌時"
                        },
                        {
                            id: 22,
                            value: 21,
                            text: "21:00-21:59(亥)",
                            time: "亥时",
                            time_tw: "亥時"
                        },
                        {
                            id: 23,
                            value: 22,
                            text: "22:00-22:59(亥)",
                            time: "亥时",
                            time_tw: "亥時"
                        },
                        {
                            id: 24,
                            value: 23,
                            text: "23:00-23:59(晚子)",
                            time: "晚子时",
                            time_tw: "晚子時"
                        }]
                    }
                }
            }]),
            l(t, [{
                key: "getLunarLeapMonth",
                value: function(e) {
                    return this.lunarRecord()[e - this.state.minYear][0]
                }
            },
            {
                key: "getLunarDateByDaysBetweenFirstDayOfLunar",
                value: function(e, t, n) {
                    var i = this.lunarRecord()[e - this.state.minYear],
                    o = i[1],
                    r = i[2],
                    s = this.getDaysBetweenTwoSolarDate(e, o - 1, r, e, t, n);
                    if (0 === s) return [e, 0, 1];
                    var a = s > 0 ? e: e - 1;
                    return this.getLunarDateByBetweenDays(a, s)
                }
            },
            {
                key: "getLunarDateByBetweenDays",
                value: function(e, t) {
                    for (var n = this.getLunarDaysOfMonthsAndYearDays(e), i = t > 0 ? t: n.yearDays - Math.abs(t), o = n.monthDays, r = 0, s = 0, a = 0; a < o.length; a++) if ((r += o[a]) > i) {
                        s = a,
                        r -= o[a];
                        break
                    }
                    return [e, s, i - r + 1]
                }
            },
            {
                key: "getDaysBetweenTwoSolarDate",
                value: function(e, t, n, i, o, r) {
                    var s = new Date(e, t, n).getTime(),
                    a = new Date(i, o, r).getTime();
                    return Math.round((a - s) / 864e5)
                }
            },
            {
                key: "getLunarDaysOfMonthsAndYearDays",
                value: function(e) {
                    var t = this.lunarRecord()[e - this.state.minYear],
                    n = t[0],
                    i = n ? 13 : 12,
                    o = t[3].toString(2),
                    r = o.split(""),
                    s = 16 - r.length,
                    a = void 0,
                    A = 0,
                    g = void 0,
                    l = [];
                    for (a = 0; a < s; a++) r.unshift(0);
                    for (g = 0; g < i; g++) 0 == r[g] ? (A += 29, l.push(29)) : (A += 30, l.push(30));
                    return {
                        yearDays: A,
                        monthDays: l
                    }
                }
            },
            {
                key: "getDaysBetweenFirstDayOfLunar",
                value: function(e, t, n) {
                    for (var i = this.getLunarDaysOfMonthsAndYearDays(e), o = i.monthDays, r = 0, s = 0; s < o.length && s < t; s++) r += o[s];
                    return r + n - 1
                }
            },
            {
                key: "formatDate",
                value: function(e, t, n) {
                    var i = new Date;
                    return e = e ? parseInt(e, 10) : i.getFullYear(),
                    t = t ? parseInt(t - 1, 10) : i.getMonth(),
                    n = n ? parseInt(n, 10) : i.getDate(),
                    e < this.state.minYear || e > this.state.maxYear ? {
                        error: this.errorCode()[100]
                    }: {
                        year: e,
                        month: t,
                        day: n
                    }
                }
            },
            {
                key: "lunarToSolar",
                value: function(e, t, n) {
                    var i = this.formatDate(e, t, n);
                    if (i.ERROR) return i;
                    e = i.year,
                    t = i.month,
                    n = i.day;
                    var o = this.getDaysBetweenFirstDayOfLunar(e, t, n),
                    r = this.lunarRecord()[e - this.state.minYear],
                    s = r[1],
                    a = r[2],
                    A = new Date(e, s - 1, a).getTime() + 864e5 * o;
                    return A = new Date(A),
                    {
                        year: Math.round(A.getFullYear()),
                        month: Math.round(A.getMonth() + 1),
                        day: Math.round(A.getDate())
                    }
                }
            },
            {
                key: "solarToLunar",
                value: function(e, t, n) {
                    var i = this.formatDate(e, t, n);
                    if (i.error) return i;
                    e = i.year,
                    t = i.month,
                    n = i.day;
                    var o = this.getLunarDateByDaysBetweenFirstDayOfLunar(e, t, n),
                    r = Math.round(o[0]),
                    s = Math.round(o[1]),
                    a = Math.round(o[2]),
                    A = this.getLunarLeapMonth(r),
                    g = "",
                    l = "";
                    return g = A > 0 && A == s ? "闰" + this.lunarData().NONG_LI_YUE[s - 1] + "月": A > 0 && s > A ? this.lunarData().NONG_LI_YUE[s - 1] + "月": this.lunarData().NONG_LI_YUE[s] + "月",
                    l = this.lunarData().NONG_LI_RI[a - 1],
                    {
                        lunarYear: Math.round(r),
                        lunarMonth: Math.round(s + 1),
                        lunarDay: Math.round(a),
                        lunarMonthName: g,
                        lunarDayName: l
                    }
                }
            },
            {
                key: "generatorYearData",
                value: function(e) {
                    for (var t = [], n = this.state.startYear, i = this.state.endYear, o = n; o <= i; o++) {
                        o == n && (t.push({
                            value: ""
                        }), t.push({
                            value: ""
                        }));
                        var r = {};
                        r.value = o,
                        r.text = o,
                        r.className = e === o ? "current": "",
                        t.push(r),
                        o == i && (t.push({
                            value: ""
                        }), t.push({
                            value: ""
                        }))
                    }
                    return this.setState({
                        yearData: t
                    }),
                    t
                }
            },
            {
                key: "generatorTimeData",
                value: function(e) {
                    var t = [{
                        id: !1,
                        value: !1,
                        text: ""
                    },
                    {
                        id: !1,
                        value: !1,
                        text: ""
                    }],
                    n = this.lunarData(),
                    i = n.SHI_CENG.map(function(t, n) {
                        return n === e && (t.className = "current"),
                        t
                    });
                    t = t.concat(i, t),
                    this.setState({
                        timeData: t
                    })
                }
            },
            {
                key: "generateLunarMonthsData",
                value: function(e, t) {
                    var n = this,
                    i = this.getLunarDaysOfMonthsAndYearDays(e),
                    o = this.getLunarLeapMonth(e),
                    r = this.lunarData().NONG_LI_YUE,
                    s = void 0;
                    return s = i.monthDays.map(function(i, s) {
                        var a = "",
                        A = void 0;
                        return A = n.selectedLunarMonthWhetherLargeThanCurrentLunarMonth(e, s + 1) ? "prevent": void 0,
                        a = o ? o === s ? "闰" + r[s - 1] + "月": o < s ? r[s - 1] + "月": r[s] + "月": r[s] + "月",
                        t === s + 1 && (A = "current"),
                        {
                            text: a,
                            value: s + 1,
                            className: A
                        }
                    }),
                    s.unshift({}),
                    s.unshift({}),
                    s.push({}),
                    s.push({}),
                    this.setState({
                        monthData: s
                    }),
                    s
                }
            },
            {
                key: "generateLunarDaysData",
                value: function(e, t, n) {
                    var i = this.getLunarDaysOfMonthsAndYearDays(e),
                    o = this.lunarData().NONG_LI_RI,
                    r = i.monthDays[t - 1],
                    s = [];
                    r || (r = i.monthDays[t - 2]);
                    for (var a = 0; a < r; a++) {
                        var A = void 0,
                        g = void 0;
                        n === a + 1 && (g = "current"),
                        g = this.selectedLunarDayWhetherLargeThanCurrentLunarDay(e, t, a + 1) ? "prevent": g,
                        A = {
                            text: o[a],
                            value: a + 1,
                            className: g
                        },
                        s.push(A)
                    }
                    return s.unshift({}),
                    s.unshift({}),
                    s.push({}),
                    s.push({}),
                    this.setState({
                        dayData: s
                    }),
                    s
                }
            },
            {
                key: "selectedYearWhetherLargeCurrentYear",
                value: function(e) {
                    return (e = e || this.state.selectedYear) > this.state.MaxDate.getFullYear()
                }
            },
            {
                key: "selectedLunarMonthWhetherLargeThanCurrentLunarMonth",
                value: function(e, t) {
                    e = e || this.state.selectedYear,
                    t = t || this.state.selectedMonth;
                    var n = this.state.MaxDate,
                    i = n.getFullYear(),
                    o = n.getMonth() + 1,
                    r = n.getDate(),
                    s = this.solarToLunar(i, o, r);
                    return this.selectedYearWhetherLargeCurrentYear(e) || e === s.lunarYear && t > s.lunarMonth
                }
            },
            {
                key: "selectedLunarDayWhetherLargeThanCurrentLunarDay",
                value: function(e, t, n) {
                    e = e || this.state.selectedYear,
                    t = t || this.state.selectedMonth,
                    n = n || this.state.selectedDay;
                    var i = this.state.MaxDate,
                    o = i.getFullYear(),
                    r = i.getMonth() + 1,
                    s = i.getDate(),
                    a = this.solarToLunar(o, r, s);
                    return this.selectedLunarMonthWhetherLargeThanCurrentLunarMonth(e, t) || e === a.lunarYear && t === a.lunarMonth && n > a.lunarDay
                }
            },
            {
                key: "generatorMonthData",
                value: function(e, t) {
                    e = parseInt(e, 10),
                    t = t || this.state.selectedYear;
                    for (var n = [], i = this.state.MaxDate, o = i.getFullYear(), r = i.getMonth() + 1, s = 1; s <= 12; s++) {
                        var a = {};
                        a.value = s,
                        a.text = s,
                        a.className = s === e ? "current": "",
                        o == t && s > r && (a.className = "prevent"),
                        1910 === t && s < 2 && (a.className = "prevent"),
                        n.push(a)
                    }
                    return n.unshift({}),
                    n.unshift({}),
                    n.push({}),
                    n.push({}),
                    this.setState({
                        monthData: n
                    }),
                    n
                }
            },
            {
                key: "isLeap",
                value: function(e) {
                    return 29 === new Date(e, 1, 29).getDate()
                }
            },
            {
                key: "getDaysByYearAndMonth",
                value: function(e, t) {
                    var n = void 0;
                    switch (t) {
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        n = 31;
                        break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        n = 30
                    }
                    return 2 === t && (n = this.isLeap(e) ? 29 : 28),
                    n
                }
            },
            {
                key: "generatorDayData",
                value: function(e, t, n) {
                    e = parseInt(e, 10);
                    var i = n || this.state.selectedYear,
                    o = t || this.state.selectedMonth,
                    r = void 0,
                    s = [],
                    a = this.state.MaxDate,
                    A = a.getFullYear(),
                    g = a.getMonth() + 1,
                    l = a.getDate();
                    r = this.getDaysByYearAndMonth(i, o);
                    for (var c = 1; c <= r; c++) {
                        var C = {};
                        C.value = c,
                        C.text = c,
                        C.className = c === e ? "current": "",
                        i == A && o == g && c > l && (C.className = "prevent"),
                        1910 === n && 2 === t && c < 10 && (C.className = "prevent"),
                        s.push(C)
                    }
                    return s.unshift({}),
                    s.unshift({}),
                    s.push({}),
                    s.push({}),
                    this.setState({
                        dayData: s
                    }),
                    s
                }
            },
            {
                key: "selectedMonthWhetherLargeThanCurrentMonth",
                value: function(e, t) {
                    e = e || this.state.selectedYear,
                    t = t || this.state.selectedMonth;
                    var n = this.state.MaxDate,
                    i = n.getFullYear(),
                    o = n.getMonth() + 1;
                    return e == i && t > o
                }
            },
            {
                key: "selectedDayWhetherLargeThanCurrentDay",
                value: function(e, t, n) {
                    e = e || this.state.selectedYear,
                    t = t || this.state.selectedMonth,
                    n = n || this.state.selectedDay;
                    var i = this.state.MaxDate,
                    o = i.getFullYear(),
                    r = i.getMonth() + 1,
                    s = i.getDate();
                    return e == o && t == r && n > s
                }
            },
            {
                key: "getMaxDate",
                value: function() {
                    var e = this.state.MaxDate,
                    t = e.getFullYear(),
                    n = e.getMonth() + 1,
                    i = e.getDate();
                    return {
                        name: "maxDate",
                        maxSolar: {
                            solarYear: t,
                            solarMonth: n,
                            solarDay: i
                        },
                        maxLunar: this.solarToLunar(t, n, i)
                    }
                }
            },
            {
                key: "dateIScrollHandle",
                value: function() {
                    var e = this,
                    t = e.state.iScrollInitConfig,
                    n = document.getElementById("wrapper-year-iscroll" + this.timestamp),
                    i = new g.a(n, t),
                    o = document.getElementById("wrapper-month-iscroll" + this.timestamp),
                    r = new g.a(o, t),
                    s = document.getElementById("wrapper-day-iscroll" + this.timestamp),
                    a = new g.a(s, t),
                    A = document.getElementById("wrapper-time-iscroll" + this.timestamp),
                    l = new g.a(A, t);
                    return i.on("scrollEnd",
                    function() {
                        var t = 0;
                        if (e.isMoblie) {
                            var n = e.scrollHeight,
                            o = this.y,
                            s = Math.abs(this.y % n);
                            s - n / 2 >= 0 ? o -= n - s: o += s,
                            t = Math.round(Math.abs(o / n))
                        } else t = this.currentPage.pageY;
                        var A = e.state,
                        g = A.startYear + t,
                        l = A.selectedMonth,
                        c = A.selectedDay,
                        C = e.getMaxDate();
                        g > A.endYear && (g = A.endYear),
                        g < A.startYear && (g = A.startYear);
                        var I = A.mode,
                        h = void 0,
                        u = void 0,
                        d = void 0;
                        if (0 === I) 1910 === g && l < 2 && (l = 2),
                        1910 === g && 2 === l && c < 10 && (c = 10),
                        l = e.selectedMonthWhetherLargeThanCurrentMonth(g, l) ? C.maxSolar.solarMonth: l,
                        c = e.selectedDayWhetherLargeThanCurrentDay(g, l, c) ? C.maxSolar.solarDay: c;
                        else if (1 === I) {
                            l = e.selectedLunarMonthWhetherLargeThanCurrentLunarMonth(g, l) ? C.maxLunar.lunarMonth: l,
                            c = e.selectedLunarDayWhetherLargeThanCurrentLunarDay(g, l, c) ? C.maxLunar.lunarDay: c;
                            var p = C.maxLunar.lunarYear;
                            g = g > p ? p: g;
                            var f = e.getLunarDaysOfMonthsAndYearDays(g),
                            m = f.monthDays,
                            v = m.length;
                            l = l > v ? v: l;
                            var y = m[l - 1];
                            c = c > y ? y: c
                        }
                        if (0 === I) {
                            e.generatorYearData(g),
                            e.generatorMonthData(l, g);
                            var b = e.generatorDayData(c, l, g),
                            _ = b[b.length - 1 - 2].value;
                            c = _ < c ? _: c,
                            h = g,
                            u = l,
                            d = c
                        } else if (1 === I) {
                            e.generatorYearData(g),
                            e.generateLunarMonthsData(g, l);
                            var w = e.generateLunarDaysData(g, l, c),
                            E = w[w.length - 1 - 2].value;
                            c = E < c ? E: c,
                            e.generateLunarDaysData(g, l, c);
                            var T = e.lunarToSolar(g, l, c);
                            h = T.year,
                            u = T.month,
                            d = T.day
                        }
                        i.refresh(),
                        r.refresh(),
                        a.refresh(),
                        e.setState({
                            selectedYear: g,
                            selectedMonth: l,
                            selectedDay: c,
                            solarYear: h,
                            solarMonth: u,
                            solarDay: d
                        }),
                        e.goTo(i, g - A.startYear),
                        e.goTo(r, (l || A.selectedMonth) - 1),
                        e.goTo(a, (c || A.selectedDay) - 1)
                    }),
                    r.on("scrollEnd",
                    function() {
                        var t = 0;
                        if (e.isMoblie) {
                            var n = e.scrollHeight,
                            i = this.y,
                            o = Math.abs(this.y % n);
                            o - n / 2 >= 0 ? i -= n - o: i += o,
                            t = Math.round(Math.abs(i / n))
                        } else t = this.currentPage.pageY;
                        var s = e.state,
                        A = 1 + t,
                        g = s.selectedYear,
                        l = s.selectedDay,
                        c = e.getMaxDate(),
                        C = e.state.mode,
                        I = void 0,
                        h = void 0,
                        u = void 0;
                        if (0 === C) A > 12 && (A = 12);
                        else if (1 === C) {
                            var d = e.generateLunarMonthsData(g, A),
                            p = d.length - 4;
                            r.refresh(),
                            A > p && (A = p)
                        }
                        if (0 === C) 1910 === g && A < 2 && (A = 2),
                        1910 === g && 2 === A && l < 10 && (l = 10),
                        A = e.selectedMonthWhetherLargeThanCurrentMonth(g, A) ? c.maxSolar.solarMonth: A,
                        l = e.selectedDayWhetherLargeThanCurrentDay(g, A, l) ? c.maxSolar.solarDay: l;
                        else if (1 === C) {
                            A = e.selectedLunarMonthWhetherLargeThanCurrentLunarMonth(g, A) ? c.maxLunar.lunarMonth: A,
                            l = e.selectedLunarDayWhetherLargeThanCurrentLunarDay(g, A, l) ? c.maxLunar.lunarDay: l;
                            var f = e.getLunarDaysOfMonthsAndYearDays(g),
                            m = f.monthDays,
                            v = m[A - 1];
                            l = l > v ? v: l
                        }
                        if (0 === C) {
                            e.generatorMonthData(A, g);
                            var y = e.generatorDayData(l, A, g),
                            b = y[y.length - 1 - 2].value;
                            l = b < l ? b: l,
                            e.generatorDayData(l, A, g),
                            I = g,
                            h = A,
                            u = l
                        } else if (1 === C) {
                            e.generateLunarMonthsData(g, A);
                            var _ = e.generateLunarDaysData(g, A, l),
                            w = _[_.length - 1 - 2].value;
                            l = w < l ? w: l,
                            e.generateLunarDaysData(g, A, l);
                            var E = e.lunarToSolar(g, A, l);
                            I = E.year,
                            h = E.month,
                            u = E.day
                        }
                        r.refresh(),
                        a.refresh(),
                        e.goTo(r, (A || s.selectedMonth) - 1),
                        e.goTo(a, (l || s.selectedDay) - 1),
                        e.setState({
                            selectedMonth: A,
                            selectedDay: l,
                            solarYear: I,
                            solarMonth: h,
                            solarDay: u
                        })
                    }),
                    a.on("scrollEnd",
                    function() {
                        var t = 0;
                        if (e.isMoblie) {
                            var n = e.scrollHeight,
                            i = this.y,
                            o = Math.abs(this.y % n);
                            o - n / 2 >= 0 ? i -= n - o: i += o,
                            t = Math.round(Math.abs(i / n))
                        } else t = this.currentPage.pageY;
                        var r = e.state,
                        s = 1 + t,
                        A = r.selectedYear,
                        g = r.selectedMonth,
                        l = e.getMaxDate(),
                        c = r.mode,
                        C = void 0,
                        I = void 0,
                        h = void 0;
                        if (0 === c) {
                            var u = e.getDaysByYearAndMonth(A, g);
                            s > u && (s = u, e.goTo(a, u - 1))
                        } else if (1 === c) {
                            var d = e.getLunarDaysOfMonthsAndYearDays(A),
                            p = d.monthDays[g - 1];
                            s > p && (s = p, e.goTo(a, p - 1))
                        }
                        if (0 === c ? (1910 === A && g < 2 && (g = 2), 1910 === A && 2 === g && s < 10 && (s = 10), s = e.selectedDayWhetherLargeThanCurrentDay(A, g, s) ? l.maxSolar.solarDay: s) : 1 === c && (s = e.selectedLunarDayWhetherLargeThanCurrentLunarDay(A, g, s) ? l.maxLunar.lunarDay: s), 0 === c) C = A,
                        I = g,
                        h = s,
                        e.generatorDayData(s, g, A);
                        else if (1 === c) {
                            var f = e.lunarToSolar(A, g, s);
                            C = f.year,
                            I = f.month,
                            h = f.day,
                            e.generateLunarDaysData(A, g, s)
                        }
                        a.refresh(),
                        e.goTo(a, (s || r.selectedDay) - 1),
                        e.setState({
                            selectedDay: s,
                            solarYear: C,
                            solarMonth: I,
                            solarDay: h
                        })
                    }),
                    l.on("scrollEnd",
                    function() {
                        var t = 0,
                        n = e.lunarData();
                        if (e.isMoblie) {
                            var i = e.scrollHeight,
                            o = this.y,
                            r = Math.abs(this.y % i);
                            r - i / 2 >= 0 ? o -= i - r: o += r,
                            t = Math.round(Math.abs(o / i))
                        } else(t = this.currentPage.pageY) > 24 && (t = 24);
                        e.goTo(l, t);
                        var s = parseInt(t);
                        e.generatorTimeData(n.SHI_CENG[s].id),
                        e.setState({
                            selectedTime: n.SHI_CENG[s].text,
                            selectedTimeValue: n.SHI_CENG[s].value,
                            selectedTimeId: n.SHI_CENG[s].id
                        })
                    }),
                    e.setState({
                        yearIScroll: i,
                        monthIScroll: r,
                        dayIScroll: a,
                        timeIScroll: l
                    }),
                    {
                        yearIScroll: i,
                        monthIScroll: r,
                        dayIScroll: a,
                        timeIScroll: l
                    }
                }
            },
            {
                key: "solarOrLunarChangeHandle",
                value: function(e) {
                    var t = this.state,
                    n = t.mode,
                    i = e;
                    if (i === n) return ! 1;
                    var o = t.selectedYear,
                    r = t.selectedMonth,
                    s = t.selectedDay,
                    a = void 0,
                    A = void 0,
                    g = void 0;
                    if (0 === i) {
                        var l = this.lunarToSolar(o, r, s);
                        o = l.year,
                        r = l.month,
                        s = l.day,
                        a = l.year,
                        A = l.month,
                        g = l.day,
                        this.generatorYearData(o),
                        this.generatorMonthData(r, o),
                        this.generatorDayData(s, r, o)
                    } else if (1 === i) {
                        var c = this.solarToLunar(o, r, s);
                        a = o,
                        A = r,
                        g = s,
                        o = c.lunarYear,
                        r = c.lunarMonth,
                        s = c.lunarDay,
                        this.generatorYearData(o),
                        this.generateLunarMonthsData(o, r),
                        this.generateLunarDaysData(o, r, s)
                    }
                    var C = this.state,
                    I = C.yearIScroll,
                    h = C.monthIScroll,
                    u = C.dayIScroll;
                    I.refresh(),
                    h.refresh(),
                    u.refresh(),
                    this.goTo(I, o - this.state.startYear),
                    this.goTo(h, (r || t.selectedMonth) - 1),
                    this.goTo(u, (s || t.selectedDay) - 1),
                    this.setState({
                        mode: i,
                        selectedYear: o,
                        selectedMonth: r,
                        selectedDay: s,
                        solarYear: a,
                        solarMonth: A,
                        solarDay: g
                    })
                }
            },
            {
                key: "componentWillReceiveProps",
                value: function(e) {
                    e.data && e.data.datePickerDisplay && this.pickerOpen()
                }
            },
            {
                key: "goTo",
                value: function(e, t, n) {
                    var i = n || this.scrollHeight;
                    e.scrollTo(0, -t * i)
                }
            },
            {
                key: "goToPage",
                value: function(e, t) {
                    e.goToPage(0, t, 0, g.a.utils.ease.elastic)
                }
            },
            {
                key: "destroyIScrollObject",
                value: function() {
                    var e = this.state,
                    t = e.yearIScroll,
                    n = e.monthIScroll,
                    i = e.dayIScroll,
                    o = e.timeIScroll;
                    t.destroy(),
                    t = null,
                    n.destroy(),
                    n = null,
                    i.destroy(),
                    i = null,
                    o.destroy(),
                    o = null
                }
            },
            {
                key: "pickerOpen",
                value: function() {
                    var e = this,
                    t = this,
                    n = this.props.data,
                    i = "number" == typeof n.mode ? n.mode: this.state.mode,
                    o = navigator.userAgent,
                    r = /iphone|ipad|imac/i.test(o) && /version\/8\./i.test(o),
                    s = t.preventScroll();
                    r ? document.getElementsByTagName("html")[0].style.overflow = "hidden": s.open();
                    var a = n.datePickerBirthFormat || "1985070100",
                    A = this.formateBirthday(a),
                    g = n.birthTimeValue || "时辰未知",
                    l = n.birthTimeDataId || 0,
                    c = parseInt(A[0], 10),
                    C = parseInt(A[1], 10),
                    I = parseInt(A[2], 10),
                    h = void 0,
                    u = void 0,
                    d = void 0,
                    p = n.birthTimeDataId || 0,
                    f = parseInt(A[3], 10) || n.birthTimeDataValue;
                    if (a && "" !== a) {
                        if (i) {
                            var m = this.solarToLunar(c, C, I);
                            h = m.lunarYear,
                            u = m.lunarMonth,
                            d = m.lunarDay,
                            this.generatorYearData(h),
                            this.generateLunarMonthsData(h, u),
                            this.generateLunarDaysData(h, u, d),
                            this.generatorTimeData(p)
                        } else h = c,
                        u = C,
                        d = I,
                        this.generatorYearData(h),
                        this.generatorMonthData(u, h),
                        this.generatorDayData(d, u, h),
                        this.generatorTimeData(p);
                        this.setState({
                            mode: i,
                            selectedYear: h,
                            selectedMonth: u,
                            selectedDay: d,
                            selectedTime: g,
                            solarYear: c,
                            solarMonth: C,
                            solarDay: I,
                            selectedTimeId: p,
                            selectedTimeValue: f
                        }),
                        setTimeout(function() {
                            var t = document.querySelector(".rdp-item-container-" + e.timestamp + " li"),
                            n = t.clientHeight,
                            i = e.dateIScrollHandle(),
                            o = i.yearIScroll,
                            r = i.monthIScroll,
                            s = i.dayIScroll,
                            a = i.timeIScroll;
                            e.goTo(o, h - e.state.startYear, n),
                            e.goTo(r, u - 1, n),
                            e.goTo(s, d - 1, n),
                            e.goTo(a, l, n),
                            e.scrollHeight = n
                        },
                        0)
                    }
                }
            },
            {
                key: "formateBirthday",
                value: function(e) {
                    return [e.substr(0, 4), e.substr(4, 2), e.substr(6, 2), e.substr(8, 2)]
                }
            },
            {
                key: "pickerClose",
                value: function() {
                    var e = this,
                    t = this.props.setState,
                    n = navigator.userAgent,
                    i = /iphone|ipad|imac/i.test(n) && /version\/8\./i.test(n),
                    o = e.preventScroll();
                    i ? document.getElementsByTagName("html")[0].style.overflow = "auto": o.close(),
                    t({
                        datePickerDisplay: 0
                    }),
                    this.setState({
                        activeTabIndex: 0
                    }),
                    this.destroyIScrollObject()
                }
            },
            {
                key: "eventCancelClickHandle",
                value: function() {
                    this.pickerClose()
                }
            },
            {
                key: "eventConfirmClickHandle",
                value: function() {
                    if (1 === this.state.activeTabIndex) return this.pickerClose(),
                    !1;
                    var e, t, n = this.state,
                    i = this.props,
                    o = i.setState,
                    r = n.mode,
                    s = this.lunarData(),
                    a = n.selectedTimeValue,
                    A = n.selectedTimeId,
                    g = 0 === A ? 1 : 0,
                    l = "zh-cn" === i.data.lang,
                    c = l ? "公(阳)历 ": "公(陽)曆 ",
                    C = l ? "农(阴)历 ": "農(陰)歷 ",
                    I = r ? C: c,
                    h = l ? s.SHI_CENG[A].time: s.SHI_CENG[A].time_tw,
                    u = n.solarYear,
                    d = n.solarMonth,
                    p = n.solarDay,
                    f = this.solarToLunar(u, d, p),
                    m = -1 === a ? "00": a < 10 ? "0" + a: a,
                    v = "" + u + (d < 10 ? "0" + d: d) + (p < 10 ? "0" + p: p) + m,
                    y = u + "年" + d + "月" + p + "日 " + h,
                    b = f.lunarYear + "年" + f.lunarMonthName + f.lunarDayName + " " + h;
                    r ? (e = "" + I + f.lunarYear + "年" + f.lunarMonthName + f.lunarDayName + " " + h, t = e) : e = "" + I + u + "年" + d + "月" + p + "日 " + h;
                    try {
                        o({
                            datePickerBirth: e,
                            datePickerTimeConfirm: g,
                            datePickerBirthFormat: v,
                            birthTimeValue: s.SHI_CENG[A].text,
                            birthTimeDataValue: s.SHI_CENG[A].value,
                            birthTimeDataId: s.SHI_CENG[A].id,
                            datePickerBirthTradition: t,
                            mode: r
                        })
                    } catch(e) {
                        console && console.warn(e)
                    }
                    this.setState({
                        activeTabIndex: 1,
                        solarDateText: y,
                        lunarDateText: b
                    })
                }
            },
            {
                key: "eventEditClickHandler",
                value: function() {
                    this.pickerClose(),
                    this.props.setState({
                        datePickerDisplay: 1
                    })
                }
            },
            {
                key: "preventScroll",
                value: function() {
                    var e = this,
                    t = this.scrollTop,
                    n = function(e) {
                        document.body.scrollTop = document.documentElement.scrollTop = e
                    },
                    i = function() {
                        return document.body.scrollTop || document.documentElement.scrollTop
                    };
                    return {
                        open: function() {
                            0 === t && (t = i(), e.scrollTop = t),
                            document.body.classList.add("rdp-open"),
                            document.body.style.top = -t + "px"
                        },
                        close: function() {
                            document.body.classList.remove("rdp-open"),
                            n(t),
                            e.scrollTop = 0
                        }
                    }
                }
            },
            {
                key: "styles",
                value: function() {
                    var e = parseFloat(document.documentElement.style.fontSize),
                    t = function(t, n) {
                        var i = 16;
                        return "number" != typeof e || isNaN(e) || (i = "" + Math.ceil(t / 32 * e)),
                        n && "number" == typeof n && (i *= n),
                        i + "px"
                    };
                    return {
                        ryan_datepicker_v3: {
                            fontSize: t(30),
                            position: "fixed",
                            left: 0,
                            top: 0,
                            right: 0,
                            bottom: 0,
                            zIndex: 8888,
                            color: "#282828"
                        },
                        rdp_back: {
                            position: "absolute",
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            zIndex: 9999,
                            background: "#000",
                            cursor: "pointer",
                            opacity: .5
                        },
                        rdp_front: {
                            lineHeight: t(80),
                            position: "absolute",
                            bottom: 0,
                            left: 0,
                            right: 0,
                            backgroundColor: "#fff",
                            zIndex: 1e4,
                            color: "#bbb"
                        },
                        rdp_nav: {
                            overflow: "hidden",
                            borderTop: "1px solid #eee",
                            borderBottom: "1px solid #eee"
                        },
                        rdp_left: {
                            float: "left",
                            width: "20%",
                            textAlign: "center",
                            cursor: "pointer",
                            color: "#999"
                        },
                        rdp_right: {
                            float: "right",
                            width: "20%",
                            textAlign: "center",
                            cursor: "pointer",
                            color: "#c91723"
                        },
                        rdp_auto: {
                            overflow: "hidden"
                        },
                        rdp_switch: {
                            width: "66.66%",
                            margin: t(8) + " auto",
                            border: "1px solid #c91723",
                            borderRadius: "5px",
                            overflow: "hidden",
                            lineHeight: t(64)
                        },
                        rdp_switch_span: {
                            display: "inline-block",
                            verticalAlign: "top",
                            width: "50%",
                            textAlign: "center",
                            boxSizing: "border-box",
                            cursor: "pointer",
                            color: "#c91723"
                        },
                        rdp_mode_active: {
                            color: "#fff",
                            backgroundColor: "#c91723"
                        },
                        rdp_body: {
                            position: "relative"
                        },
                        rdp_layer_top: {
                            position: "absolute",
                            height: 0,
                            borderTop: "2px solid #c91723",
                            boxShadow: "0 0 " + t(8) + " #c91723",
                            opacity: .3,
                            top: t(80, 2),
                            left: 0,
                            right: 0,
                            zIndex: 0
                        },
                        rdp_layer_bottom: {
                            position: "absolute",
                            height: 0,
                            borderTop: "2px solid #c91723",
                            boxShadow: "0 0 " + t(8) + " #c91723",
                            opacity: .3,
                            top: t(80, 3),
                            left: 0,
                            right: 0,
                            zIndex: 0
                        },
                        rdp_container: {
                            backgroundColor: "transparent",
                            zIndex: 1
                        },
                        rdp_container_li: {
                            display: "inline-block",
                            verticalAlign: "top",
                            width: "20%",
                            boxSizing: "border-box",
                            textAlign: "center",
                            height: t(80, 5),
                            overflow: "hidden",
                            cursor: "default",
                            backgroundColor: "transparent"
                        },
                        rdp_container_li_w40: {
                            width: "40%",
                            fontSize: t(24)
                        },
                        rdp_item: {
                            display: "block",
                            backgroundColor: "transparent"
                        },
                        rdp_item_li: {
                            display: "block",
                            lineHeight: t(80),
                            backgroundColor: "transparent"
                        },
                        rdp_item_li_prevent: {
                            color: "#eee"
                        },
                        rdp_item_li_current: {
                            color: "#c91723",
                            fontWeight: "bold"
                        },
                        rdp_item_li_current_arrow: {
                            color: "#c91723",
                            fontWeight: "bold",
                            background: "transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAUCAMAAACDMFxkAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAZQTFRFyRcjAAAA88e98QAAAAJ0Uk5T/wDltzBKAAAAMElEQVR42mzPsREAMAgDMWX/pdNxX5hK5wKMd0MoFAqFQqFQaKVrw7q2mo0vvgADAC1VAGWX1njpAAAAAElFTkSuQmCC) no-repeat left center"
                        },
                        rdp_confirm: {
                            position: "absolute",
                            bottom: 0,
                            left: 0,
                            right: 0,
                            backgroundColor: "#fff",
                            zIndex: 1e4,
                            color: "#bbb",
                            overflow: "hidden"
                        },
                        rdp_confirm_nav: {
                            height: t(80),
                            lineHeight: t(80),
                            borderBottom: "1px solid #ddd",
                            textAlign: "center",
                            fontSize: t(32),
                            color: "#a31e1a"
                        },
                        rdp_confirm_box: {
                            textAlign: "center",
                            overflow: "hidden"
                        },
                        rdp_confirm_title: {
                            fontSize: t(28),
                            color: "#333",
                            lineHeight: t(80),
                            marginTop: t(40)
                        },
                        rdp_confirm_date: {
                            fontSize: t(30),
                            color: "#a31e1a",
                            lineHeight: t(60)
                        },
                        rdp_confirm_date_label: {
                            color: "#333"
                        },
                        rdp_c_btn_box: {
                            color: "#fff",
                            fontSize: t(30),
                            margin: t(44) + " 0"
                        },
                        rdp_c_btn_left: {
                            float: "left",
                            width: "50%",
                            textAlign: "right",
                            boxSizing: "border-box",
                            paddingRight: t(10),
                            verticalAlign: "top",
                            cursor: "pointer"
                        },
                        rdp_cbl_text: {
                            display: "inline-block",
                            width: t(200),
                            lineHeight: t(80),
                            backgroundColor: "#b1b1b1",
                            color: "#fff",
                            textAlign: "center",
                            borderRadius: t(8)
                        },
                        rdp_c_btn_right: {
                            float: "right",
                            textAlign: "left",
                            width: "50%",
                            boxSizing: "border-box",
                            paddingLeft: t(10),
                            verticalAlign: "top",
                            cursor: "pointer"
                        },
                        rdp_cbr_text: {
                            display: "inline-block",
                            width: t(200),
                            lineHeight: t(80),
                            backgroundColor: "#a31e1a",
                            color: "#fff",
                            textAlign: "center",
                            borderRadius: t(8)
                        },
                        rdp_cb_clear: {
                            overflow: "hidden",
                            clear: "both"
                        }
                    }
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = e.state,
                    n = e.props,
                    i = this.styles(),
                    o = {
                        display: n.data && n.data.datePickerDisplay ? "block": "none"
                    };
                    return a.a.createElement("div", {
                        style: Object.assign({},
                        i.ryan_datepicker_v3, o)
                    },
                    a.a.createElement("div", {
                        id: "rdp-back",
                        style: i.rdp_back,
                        onClick: this.eventConfirmClickHandle.bind(this)
                    }), a.a.createElement("div", {
                        style: Object.assign({},
                        i.rdp_confirm, {
                            display: 1 === t.activeTabIndex ? "block": "none"
                        })
                    },
                    a.a.createElement("div", {
                        style: i.rdp_confirm_nav
                    },
                    "确认时间"), a.a.createElement("div", {
                        style: i.rdp_confirm_box
                    },
                    a.a.createElement("p", {
                        style: i.rdp_confirm_title
                    },
                    "请确认输入的时间是否正确"), 1 === this.props.data.mode && a.a.createElement("div", {
                        style: i.rdp_confirm_date
                    },
                    a.a.createElement("p", null, a.a.createElement("span", {
                        style: i.rdp_confirm_date_label
                    },
                    "农(阴)历："), t.lunarDateText), a.a.createElement("p", null, a.a.createElement("span", {
                        style: i.rdp_confirm_date_label
                    },
                    "公(阳)历："), t.solarDateText)), 0 === this.props.data.mode && a.a.createElement("div", {
                        style: i.rdp_confirm_date
                    },
                    a.a.createElement("p", null, a.a.createElement("span", {
                        style: i.rdp_confirm_date_label
                    },
                    "公(阳)历："), t.solarDateText), a.a.createElement("p", null, a.a.createElement("span", {
                        style: i.rdp_confirm_date_label
                    },
                    "农(阴)历："), t.lunarDateText))), a.a.createElement("div", {
                        style: i.rdp_c_btn_box
                    },
                    a.a.createElement("div", {
                        style: i.rdp_c_btn_left
                    },
                    a.a.createElement("span", {
                        style: i.rdp_cbl_text,
                        onClick: this.eventEditClickHandler.bind(this)
                    },
                    "返回修改")), a.a.createElement("div", {
                        style: i.rdp_c_btn_right
                    },
                    a.a.createElement("span", {
                        style: i.rdp_cbr_text,
                        onClick: this.pickerClose.bind(this)
                    },
                    "确认正确")), a.a.createElement("div", {
                        style: i.rdp_cb_clear
                    }))), a.a.createElement("div", {
                        style: Object.assign({},
                        i.rdp_front, {
                            display: 0 === t.activeTabIndex ? "block": "none"
                        })
                    },
                    a.a.createElement("div", {
                        style: i.rdp_nav
                    },
                    a.a.createElement("div", {
                        style: i.rdp_left,
                        onClick: this.eventCancelClickHandle.bind(this)
                    },
                    "取消"), a.a.createElement("div", {
                        style: i.rdp_right,
                        onClick: this.eventConfirmClickHandle.bind(this)
                    },
                    "完成"), a.a.createElement("div", {
                        style: i.rdp_auto
                    },
                    a.a.createElement("div", {
                        style: i.rdp_switch
                    },
                    a.a.createElement("span", {
                        style: Object.assign({},
                        i.rdp_switch_span, 0 === t.mode ? i.rdp_mode_active: {}),
                        onClick: this.solarOrLunarChangeHandle.bind(this, 0)
                    },
                    "公历"), a.a.createElement("span", {
                        style: Object.assign({},
                        i.rdp_switch_span, 1 === t.mode ? i.rdp_mode_active: {}),
                        onClick: this.solarOrLunarChangeHandle.bind(this, 1)
                    },
                    "农历")))), a.a.createElement("div", {
                        style: i.rdp_body
                    },
                    a.a.createElement("ul", {
                        style: i.rdp_container
                    },
                    a.a.createElement("li", {
                        id: "wrapper-year-iscroll" + this.timestamp,
                        style: i.rdp_container_li
                    },
                    a.a.createElement("ul", {
                        className: "rdp-item-container-" + this.timestamp,
                        style: i.rdp_item
                    },
                    t.yearData.map(function(e, t) {
                        return a.a.createElement(c, {
                            key: t,
                            data: e,
                            s: i,
                            arrow: !0
                        })
                    },
                    this))), a.a.createElement("li", {
                        id: "wrapper-month-iscroll" + this.timestamp,
                        style: i.rdp_container_li
                    },
                    a.a.createElement("ul", {
                        className: "rdp-item-container-" + this.timestamp,
                        style: i.rdp_item
                    },
                    t.monthData.map(function(e, t) {
                        return a.a.createElement(c, {
                            key: t,
                            data: e,
                            s: i
                        })
                    },
                    this))), a.a.createElement("li", {
                        id: "wrapper-day-iscroll" + this.timestamp,
                        style: i.rdp_container_li
                    },
                    a.a.createElement("ul", {
                        className: "rdp-item-container-" + this.timestamp,
                        style: i.rdp_item
                    },
                    t.dayData.map(function(e, t) {
                        return a.a.createElement(c, {
                            key: t,
                            data: e,
                            s: i
                        })
                    },
                    this))), a.a.createElement("li", {
                        id: "wrapper-time-iscroll" + this.timestamp,
                        style: Object.assign({},
                        i.rdp_container_li, i.rdp_container_li_w40)
                    },
                    a.a.createElement("ul", {
                        className: "rdp-item-container-" + this.timestamp,
                        style: i.rdp_item
                    },
                    t.timeData.map(function(e, t) {
                        return a.a.createElement(c, {
                            key: t,
                            data: e,
                            s: i
                        })
                    },
                    this)))), a.a.createElement("div", {
                        style: i.rdp_layer_top
                    }), a.a.createElement("div", {
                        style: i.rdp_layer_bottom
                    }))))
                }
            }]),
            t
        } (s.Component),
        I = C;
        t.a = I; !
    },
    101 : function(e, t, n) {
        var i, o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        };
        /*! iScroll v5.2.0-snapshot ~ (c) 2008-2017 Matteo Spinelli ~ http://cubiq.org/license */
        !
        function(r, s, a) {
            function A(e, t) {
                this.wrapper = "string" == typeof e ? s.querySelector(e) : e,
                this.scroller = this.wrapper.children[0],
                this.scrollerStyle = this.scroller.style,
                this.options = {
                    resizeScrollbars: !0,
                    mouseWheelSpeed: 20,
                    snapThreshold: .334,
                    disablePointer: !C.hasPointer,
                    disableTouch: C.hasPointer || !C.hasTouch,
                    disableMouse: C.hasPointer || C.hasTouch,
                    startX: 0,
                    startY: 0,
                    scrollY: !0,
                    directionLockThreshold: 5,
                    momentum: !0,
                    bounce: !0,
                    bounceTime: 600,
                    bounceEasing: "",
                    preventDefault: !0,
                    preventDefaultException: {
                        tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT)$/
                    },
                    HWCompositing: !0,
                    useTransition: !0,
                    useTransform: !0,
                    bindToWrapper: void 0 === r.onmousedown
                };
                for (var n in t) this.options[n] = t[n];
                this.translateZ = this.options.HWCompositing && C.hasPerspective ? " translateZ(0)": "",
                this.options.useTransition = C.hasTransition && this.options.useTransition,
                this.options.useTransform = C.hasTransform && this.options.useTransform,
                this.options.eventPassthrough = !0 === this.options.eventPassthrough ? "vertical": this.options.eventPassthrough,
                this.options.preventDefault = !this.options.eventPassthrough && this.options.preventDefault,
                this.options.scrollY = "vertical" != this.options.eventPassthrough && this.options.scrollY,
                this.options.scrollX = "horizontal" != this.options.eventPassthrough && this.options.scrollX,
                this.options.freeScroll = this.options.freeScroll && !this.options.eventPassthrough,
                this.options.directionLockThreshold = this.options.eventPassthrough ? 0 : this.options.directionLockThreshold,
                this.options.bounceEasing = "string" == typeof this.options.bounceEasing ? C.ease[this.options.bounceEasing] || C.ease.circular: this.options.bounceEasing,
                this.options.resizePolling = void 0 === this.options.resizePolling ? 60 : this.options.resizePolling,
                !0 === this.options.tap && (this.options.tap = "tap"),
                this.options.useTransition || this.options.useTransform || /relative|absolute/i.test(this.scrollerStyle.position) || (this.scrollerStyle.position = "relative"),
                "scale" == this.options.shrinkScrollbars && (this.options.useTransition = !1),
                this.options.invertWheelDirection = this.options.invertWheelDirection ? -1 : 1,
                this.x = 0,
                this.y = 0,
                this.directionX = 0,
                this.directionY = 0,
                this._events = {},
                this._init(),
                this.refresh(),
                this.scrollTo(this.options.startX, this.options.startY),
                this.enable()
            }
            function g(e, t, n) {
                var i = s.createElement("div"),
                o = s.createElement("div");
                return ! 0 === n && (i.style.cssText = "position:absolute;z-index:9999", o.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);border-radius:3px"),
                o.className = "iScrollIndicator",
                "h" == e ? (!0 === n && (i.style.cssText += ";height:7px;left:2px;right:2px;bottom:0", o.style.height = "100%"), i.className = "iScrollHorizontalScrollbar") : (!0 === n && (i.style.cssText += ";width:7px;bottom:2px;top:2px;right:1px", o.style.width = "100%"), i.className = "iScrollVerticalScrollbar"),
                i.style.cssText += ";overflow:hidden",
                t || (i.style.pointerEvents = "none"),
                i.appendChild(o),
                i
            }
            function l(e, t) {
                this.wrapper = "string" == typeof t.el ? s.querySelector(t.el) : t.el,
                this.wrapperStyle = this.wrapper.style,
                this.indicator = this.wrapper.children[0],
                this.indicatorStyle = this.indicator.style,
                this.scroller = e,
                this.options = {
                    listenX: !0,
                    listenY: !0,
                    interactive: !1,
                    resize: !0,
                    defaultScrollbars: !1,
                    shrink: !1,
                    fade: !1,
                    speedRatioX: 0,
                    speedRatioY: 0
                };
                for (var n in t) this.options[n] = t[n];
                if (this.sizeRatioX = 1, this.sizeRatioY = 1, this.maxPosX = 0, this.maxPosY = 0, this.options.interactive && (this.options.disableTouch || (C.addEvent(this.indicator, "touchstart", this), C.addEvent(r, "touchend", this)), this.options.disablePointer || (C.addEvent(this.indicator, C.prefixPointerEvent("pointerdown"), this), C.addEvent(r, C.prefixPointerEvent("pointerup"), this)), this.options.disableMouse || (C.addEvent(this.indicator, "mousedown", this), C.addEvent(r, "mouseup", this))), this.options.fade) {
                    this.wrapperStyle[C.style.transform] = this.scroller.translateZ;
                    var i = C.style.transitionDuration;
                    if (!i) return;
                    this.wrapperStyle[i] = C.isBadAndroid ? "0.0001ms": "0ms";
                    var o = this;
                    C.isBadAndroid && c(function() {
                        "0.0001ms" === o.wrapperStyle[i] && (o.wrapperStyle[i] = "0s")
                    }),
                    this.wrapperStyle.opacity = "0"
                }
            }
            var c = r.requestAnimationFrame || r.webkitRequestAnimationFrame || r.mozRequestAnimationFrame || r.oRequestAnimationFrame || r.msRequestAnimationFrame ||
            function(e) {
                r.setTimeout(e, 1e3 / 60)
            },
            C = function() {
                function e(e) {
                    return ! 1 !== i && ("" === i ? e: i + e.charAt(0).toUpperCase() + e.substr(1))
                }
                var t = {},
                n = s.createElement("div").style,
                i = function() {
                    for (var e = ["t", "webkitT", "MozT", "msT", "OT"], t = 0, i = e.length; t < i; t++) if (e[t] + "ransform" in n) return e[t].substr(0, e[t].length - 1);
                    return ! 1
                } ();
                t.getTime = Date.now ||
                function() {
                    return (new Date).getTime()
                },
                t.extend = function(e, t) {
                    for (var n in t) e[n] = t[n]
                },
                t.addEvent = function(e, t, n, i) {
                    e.addEventListener(t, n, !!i)
                },
                t.removeEvent = function(e, t, n, i) {
                    e.removeEventListener(t, n, !!i)
                },
                t.prefixPointerEvent = function(e) {
                    return r.MSPointerEvent ? "MSPointer" + e.charAt(7).toUpperCase() + e.substr(8) : e
                },
                t.momentum = function(e, t, n, i, o, r) {
                    var s, A, g = e - t,
                    l = a.abs(g) / n;
                    return r = void 0 === r ? 6e-4: r,
                    s = e + l * l / (2 * r) * (g < 0 ? -1 : 1),
                    A = l / r,
                    s < i ? (s = o ? i - o / 2.5 * (l / 8) : i, g = a.abs(s - e), A = g / l) : s > 0 && (s = o ? o / 2.5 * (l / 8) : 0, g = a.abs(e) + s, A = g / l),
                    {
                        destination: a.round(s),
                        duration: A
                    }
                };
                var A = e("transform");
                return t.extend(t, {
                    hasTransform: !1 !== A,
                    hasPerspective: e("perspective") in n,
                    hasTouch: "ontouchstart" in r,
                    hasPointer: !(!r.PointerEvent && !r.MSPointerEvent),
                    hasTransition: e("transition") in n
                }),
                t.isBadAndroid = function() {
                    var e = r.navigator.appVersion;
                    if (/Android/.test(e) && !/Chrome\/\d/.test(e)) {
                        var t = e.match(/Safari\/(\d+.\d)/);
                        return ! (t && "object" === (void 0 === t ? "undefined": o(t)) && t.length >= 2) || parseFloat(t[1]) < 535.19
                    }
                    return ! 1
                } (),
                t.extend(t.style = {},
                {
                    transform: A,
                    transitionTimingFunction: e("transitionTimingFunction"),
                    transitionDuration: e("transitionDuration"),
                    transitionDelay: e("transitionDelay"),
                    transformOrigin: e("transformOrigin"),
                    touchAction: e("touchAction")
                }),
                t.hasClass = function(e, t) {
                    return new RegExp("(^|\\s)" + t + "(\\s|$)").test(e.className)
                },
                t.addClass = function(e, n) {
                    if (!t.hasClass(e, n)) {
                        var i = e.className.split(" ");
                        i.push(n),
                        e.className = i.join(" ")
                    }
                },
                t.removeClass = function(e, n) {
                    if (t.hasClass(e, n)) {
                        var i = new RegExp("(^|\\s)" + n + "(\\s|$)", "g");
                        e.className = e.className.replace(i, " ")
                    }
                },
                t.offset = function(e) {
                    for (var t = -e.offsetLeft,
                    n = -e.offsetTop; e = e.offsetParent;) t -= e.offsetLeft,
                    n -= e.offsetTop;
                    return {
                        left: t,
                        top: n
                    }
                },
                t.preventDefaultException = function(e, t) {
                    for (var n in t) if (t[n].test(e[n])) return ! 0;
                    return ! 1
                },
                t.extend(t.eventType = {},
                {
                    touchstart: 1,
                    touchmove: 1,
                    touchend: 1,
                    mousedown: 2,
                    mousemove: 2,
                    mouseup: 2,
                    pointerdown: 3,
                    pointermove: 3,
                    pointerup: 3,
                    MSPointerDown: 3,
                    MSPointerMove: 3,
                    MSPointerUp: 3
                }),
                t.extend(t.ease = {},
                {
                    quadratic: {
                        style: "cubic-bezier(0.25, 0.46, 0.45, 0.94)",
                        fn: function(e) {
                            return e * (2 - e)
                        }
                    },
                    circular: {
                        style: "cubic-bezier(0.1, 0.57, 0.1, 1)",
                        fn: function(e) {
                            return a.sqrt(1 - --e * e)
                        }
                    },
                    back: {
                        style: "cubic-bezier(0.175, 0.885, 0.32, 1.275)",
                        fn: function(e) {
                            return (e -= 1) * e * (5 * e + 4) + 1
                        }
                    },
                    bounce: {
                        style: "",
                        fn: function(e) {
                            return (e /= 1) < 1 / 2.75 ? 7.5625 * e * e: e < 2 / 2.75 ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : e < 2.5 / 2.75 ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375
                        }
                    },
                    elastic: {
                        style: "",
                        fn: function(e) {
                            return 0 === e ? 0 : 1 == e ? 1 : .4 * a.pow(2, -10 * e) * a.sin((e - .055) * (2 * a.PI) / .22) + 1
                        }
                    }
                }),
                t.tap = function(e, t) {
                    var n = s.createEvent("Event");
                    n.initEvent(t, !0, !0),
                    n.pageX = e.pageX,
                    n.pageY = e.pageY,
                    e.target.dispatchEvent(n)
                },
                t.click = function(e) {
                    var t, n = e.target;
                    /(SELECT|INPUT|TEXTAREA)/i.test(n.tagName) || (t = s.createEvent(r.MouseEvent ? "MouseEvents": "Event"), t.initEvent("click", !0, !0), t.view = e.view || r, t.detail = 1, t.screenX = n.screenX || 0, t.screenY = n.screenY || 0, t.clientX = n.clientX || 0, t.clientY = n.clientY || 0, t.ctrlKey = !!e.ctrlKey, t.altKey = !!e.altKey, t.shiftKey = !!e.shiftKey, t.metaKey = !!e.metaKey, t.button = 0, t.relatedTarget = null, t._constructed = !0, n.dispatchEvent(t))
                },
                t.getTouchAction = function(e, t) {
                    var n = "none";
                    return "vertical" === e ? n = "pan-y": "horizontal" === e && (n = "pan-x"),
                    t && "none" != n && (n += " pinch-zoom"),
                    n
                },
                t.getRect = function(e) {
                    if (e instanceof SVGElement) {
                        var t = e.getBoundingClientRect();
                        return {
                            top: t.top,
                            left: t.left,
                            width: t.width,
                            height: t.height
                        }
                    }
                    return {
                        top: e.offsetTop,
                        left: e.offsetLeft,
                        width: e.offsetWidth,
                        height: e.offsetHeight
                    }
                },
                t
            } ();
            A.prototype = {
                version: "5.2.0-snapshot",
                _init: function() {
                    this._initEvents(),
                    (this.options.scrollbars || this.options.indicators) && this._initIndicators(),
                    this.options.mouseWheel && this._initWheel(),
                    this.options.snap && this._initSnap(),
                    this.options.keyBindings && this._initKeys()
                },
                destroy: function() {
                    this._initEvents(!0),
                    clearTimeout(this.resizeTimeout),
                    this.resizeTimeout = null,
                    this._execEvent("destroy")
                },
                _transitionEnd: function(e) {
                    e.target == this.scroller && this.isInTransition && (this._transitionTime(), this.resetPosition(this.options.bounceTime) || (this.isInTransition = !1, this._execEvent("scrollEnd")))
                },
                _start: function(e) {
                    if (1 != C.eventType[e.type]) {
                        if (0 !== (e.which ? e.button: e.button < 2 ? 0 : 4 == e.button ? 1 : 2)) return
                    }
                    if (this.enabled && (!this.initiated || C.eventType[e.type] === this.initiated)) { ! this.options.preventDefault || C.isBadAndroid || C.preventDefaultException(e.target, this.options.preventDefaultException) || e.preventDefault();
                        var t, n = e.touches ? e.touches[0] : e;
                        this.initiated = C.eventType[e.type],
                        this.moved = !1,
                        this.distX = 0,
                        this.distY = 0,
                        this.directionX = 0,
                        this.directionY = 0,
                        this.directionLocked = 0,
                        this.startTime = C.getTime(),
                        this.options.useTransition && this.isInTransition ? (this._transitionTime(), this.isInTransition = !1, t = this.getComputedPosition(), this._translate(a.round(t.x), a.round(t.y)), this._execEvent("scrollEnd")) : !this.options.useTransition && this.isAnimating && (this.isAnimating = !1, this._execEvent("scrollEnd")),
                        this.startX = this.x,
                        this.startY = this.y,
                        this.absStartX = this.x,
                        this.absStartY = this.y,
                        this.pointX = n.pageX,
                        this.pointY = n.pageY,
                        this._execEvent("beforeScrollStart")
                    }
                },
                _move: function(e) {
                    if (this.enabled && C.eventType[e.type] === this.initiated) {
                        this.options.preventDefault && e.preventDefault();
                        var t, n, i, o, r = e.touches ? e.touches[0] : e,
                        s = r.pageX - this.pointX,
                        A = r.pageY - this.pointY,
                        g = C.getTime();
                        if (this.pointX = r.pageX, this.pointY = r.pageY, this.distX += s, this.distY += A, i = a.abs(this.distX), o = a.abs(this.distY), !(g - this.endTime > 300 && i < 10 && o < 10)) {
                            if (this.directionLocked || this.options.freeScroll || (i > o + this.options.directionLockThreshold ? this.directionLocked = "h": o >= i + this.options.directionLockThreshold ? this.directionLocked = "v": this.directionLocked = "n"), "h" == this.directionLocked) {
                                if ("vertical" == this.options.eventPassthrough) e.preventDefault();
                                else if ("horizontal" == this.options.eventPassthrough) return void(this.initiated = !1);
                                A = 0
                            } else if ("v" == this.directionLocked) {
                                if ("horizontal" == this.options.eventPassthrough) e.preventDefault();
                                else if ("vertical" == this.options.eventPassthrough) return void(this.initiated = !1);
                                s = 0
                            }
                            s = this.hasHorizontalScroll ? s: 0,
                            A = this.hasVerticalScroll ? A: 0,
                            t = this.x + s,
                            n = this.y + A,
                            (t > 0 || t < this.maxScrollX) && (t = this.options.bounce ? this.x + s / 3 : t > 0 ? 0 : this.maxScrollX),
                            (n > 0 || n < this.maxScrollY) && (n = this.options.bounce ? this.y + A / 3 : n > 0 ? 0 : this.maxScrollY),
                            this.directionX = s > 0 ? -1 : s < 0 ? 1 : 0,
                            this.directionY = A > 0 ? -1 : A < 0 ? 1 : 0,
                            this.moved || this._execEvent("scrollStart"),
                            this.moved = !0,
                            this._translate(t, n),
                            g - this.startTime > 300 && (this.startTime = g, this.startX = this.x, this.startY = this.y)
                        }
                    }
                },
                _end: function(e) {
                    if (this.enabled && C.eventType[e.type] === this.initiated) {
                        this.options.preventDefault && !C.preventDefaultException(e.target, this.options.preventDefaultException) && e.preventDefault();
                        var t, n, i = (e.changedTouches && e.changedTouches[0], C.getTime() - this.startTime),
                        o = a.round(this.x),
                        r = a.round(this.y),
                        s = a.abs(o - this.startX),
                        A = a.abs(r - this.startY),
                        g = 0,
                        l = "";
                        if (this.isInTransition = 0, this.initiated = 0, this.endTime = C.getTime(), !this.resetPosition(this.options.bounceTime)) {
                            if (this.scrollTo(o, r), !this.moved) return this.options.tap && C.tap(e, this.options.tap),
                            this.options.click && C.click(e),
                            void this._execEvent("scrollCancel");
                            if (this._events.flick && i < 200 && s < 100 && A < 100) return void this._execEvent("flick");
                            if (this.options.momentum && i < 300 && (t = this.hasHorizontalScroll ? C.momentum(this.x, this.startX, i, this.maxScrollX, this.options.bounce ? this.wrapperWidth: 0, this.options.deceleration) : {
                                destination: o,
                                duration: 0
                            },
                            n = this.hasVerticalScroll ? C.momentum(this.y, this.startY, i, this.maxScrollY, this.options.bounce ? this.wrapperHeight: 0, this.options.deceleration) : {
                                destination: r,
                                duration: 0
                            },
                            o = t.destination, r = n.destination, g = a.max(t.duration, n.duration), this.isInTransition = 1), this.options.snap) {
                                var c = this._nearestSnap(o, r);
                                this.currentPage = c,
                                g = this.options.snapSpeed || a.max(a.max(a.min(a.abs(o - c.x), 1e3), a.min(a.abs(r - c.y), 1e3)), 300),
                                o = c.x,
                                r = c.y,
                                this.directionX = 0,
                                this.directionY = 0,
                                l = this.options.bounceEasing
                            }
                            if (o != this.x || r != this.y) return (o > 0 || o < this.maxScrollX || r > 0 || r < this.maxScrollY) && (l = C.ease.quadratic),
                            void this.scrollTo(o, r, g, l);
                            this._execEvent("scrollEnd")
                        }
                    }
                },
                _resize: function() {
                    var e = this;
                    clearTimeout(this.resizeTimeout),
                    this.resizeTimeout = setTimeout(function() {
                        e.refresh()
                    },
                    this.options.resizePolling)
                },
                resetPosition: function(e) {
                    var t = this.x,
                    n = this.y;
                    return e = e || 0,
                    !this.hasHorizontalScroll || this.x > 0 ? t = 0 : this.x < this.maxScrollX && (t = this.maxScrollX),
                    !this.hasVerticalScroll || this.y > 0 ? n = 0 : this.y < this.maxScrollY && (n = this.maxScrollY),
                    (t != this.x || n != this.y) && (this.scrollTo(t, n, e, this.options.bounceEasing), !0)
                },
                disable: function() {
                    this.enabled = !1
                },
                enable: function() {
                    this.enabled = !0
                },
                refresh: function() {
                    C.getRect(this.wrapper),
                    this.wrapperWidth = this.wrapper.clientWidth,
                    this.wrapperHeight = this.wrapper.clientHeight;
                    var e = C.getRect(this.scroller);
                    this.scrollerWidth = e.width,
                    this.scrollerHeight = e.height,
                    this.maxScrollX = this.wrapperWidth - this.scrollerWidth,
                    this.maxScrollY = this.wrapperHeight - this.scrollerHeight,
                    this.hasHorizontalScroll = this.options.scrollX && this.maxScrollX < 0,
                    this.hasVerticalScroll = this.options.scrollY && this.maxScrollY < 0,
                    this.hasHorizontalScroll || (this.maxScrollX = 0, this.scrollerWidth = this.wrapperWidth),
                    this.hasVerticalScroll || (this.maxScrollY = 0, this.scrollerHeight = this.wrapperHeight),
                    this.endTime = 0,
                    this.directionX = 0,
                    this.directionY = 0,
                    C.hasPointer && !this.options.disablePointer && (this.wrapper.style[C.style.touchAction] = C.getTouchAction(this.options.eventPassthrough, !0), this.wrapper.style[C.style.touchAction] || (this.wrapper.style[C.style.touchAction] = C.getTouchAction(this.options.eventPassthrough, !1))),
                    this.wrapperOffset = C.offset(this.wrapper),
                    this._execEvent("refresh"),
                    this.resetPosition()
                },
                on: function(e, t) {
                    this._events[e] || (this._events[e] = []),
                    this._events[e].push(t)
                },
                off: function(e, t) {
                    if (this._events[e]) {
                        var n = this._events[e].indexOf(t);
                        n > -1 && this._events[e].splice(n, 1)
                    }
                },
                _execEvent: function(e) {
                    if (this._events[e]) {
                        var t = 0,
                        n = this._events[e].length;
                        if (n) for (; t < n; t++) this._events[e][t].apply(this, [].slice.call(arguments, 1))
                    }
                },
                scrollBy: function(e, t, n, i) {
                    e = this.x + e,
                    t = this.y + t,
                    n = n || 0,
                    this.scrollTo(e, t, n, i)
                },
                scrollTo: function(e, t, n, i) {
                    i = i || C.ease.circular,
                    this.isInTransition = this.options.useTransition && n > 0;
                    var o = this.options.useTransition && i.style; ! n || o ? (o && (this._transitionTimingFunction(i.style), this._transitionTime(n)), this._translate(e, t)) : this._animate(e, t, n, i.fn)
                },
                scrollToElement: function(e, t, n, i, o) {
                    if (e = e.nodeType ? e: this.scroller.querySelector(e)) {
                        var r = C.offset(e);
                        r.left -= this.wrapperOffset.left,
                        r.top -= this.wrapperOffset.top;
                        var s = C.getRect(e),
                        A = C.getRect(this.wrapper); ! 0 === n && (n = a.round(s.width / 2 - A.width / 2)),
                        !0 === i && (i = a.round(s.height / 2 - A.height / 2)),
                        r.left -= n || 0,
                        r.top -= i || 0,
                        r.left = r.left > 0 ? 0 : r.left < this.maxScrollX ? this.maxScrollX: r.left,
                        r.top = r.top > 0 ? 0 : r.top < this.maxScrollY ? this.maxScrollY: r.top,
                        t = void 0 === t || null === t || "auto" === t ? a.max(a.abs(this.x - r.left), a.abs(this.y - r.top)) : t,
                        this.scrollTo(r.left, r.top, t, o)
                    }
                },
                _transitionTime: function(e) {
                    if (this.options.useTransition) {
                        e = e || 0;
                        var t = C.style.transitionDuration;
                        if (t) {
                            if (this.scrollerStyle[t] = e + "ms", !e && C.isBadAndroid) {
                                this.scrollerStyle[t] = "0.0001ms";
                                var n = this;
                                c(function() {
                                    "0.0001ms" === n.scrollerStyle[t] && (n.scrollerStyle[t] = "0s")
                                })
                            }
                            if (this.indicators) for (var i = this.indicators.length; i--;) this.indicators[i].transitionTime(e)
                        }
                    }
                },
                _transitionTimingFunction: function(e) {
                    if (this.scrollerStyle[C.style.transitionTimingFunction] = e, this.indicators) for (var t = this.indicators.length; t--;) this.indicators[t].transitionTimingFunction(e)
                },
                _translate: function(e, t) {
                    if (this.options.useTransform ? this.scrollerStyle[C.style.transform] = "translate(" + e + "px," + t + "px)" + this.translateZ: (e = a.round(e), t = a.round(t), this.scrollerStyle.left = e + "px", this.scrollerStyle.top = t + "px"), this.x = e, this.y = t, this.indicators) for (var n = this.indicators.length; n--;) this.indicators[n].updatePosition()
                },
                _initEvents: function(e) {
                    var t = e ? C.removeEvent: C.addEvent,
                    n = this.options.bindToWrapper ? this.wrapper: r;
                    t(r, "orientationchange", this),
                    t(r, "resize", this),
                    this.options.click && t(this.wrapper, "click", this, !0),
                    this.options.disableMouse || (t(this.wrapper, "mousedown", this), t(n, "mousemove", this), t(n, "mousecancel", this), t(n, "mouseup", this)),
                    C.hasPointer && !this.options.disablePointer && (t(this.wrapper, C.prefixPointerEvent("pointerdown"), this), t(n, C.prefixPointerEvent("pointermove"), this), t(n, C.prefixPointerEvent("pointercancel"), this), t(n, C.prefixPointerEvent("pointerup"), this)),
                    C.hasTouch && !this.options.disableTouch && (t(this.wrapper, "touchstart", this), t(n, "touchmove", this), t(n, "touchcancel", this), t(n, "touchend", this)),
                    t(this.scroller, "transitionend", this),
                    t(this.scroller, "webkitTransitionEnd", this),
                    t(this.scroller, "oTransitionEnd", this),
                    t(this.scroller, "MSTransitionEnd", this)
                },
                getComputedPosition: function() {
                    var e, t, n = r.getComputedStyle(this.scroller, null);
                    return this.options.useTransform ? (n = n[C.style.transform].split(")")[0].split(", "), e = +(n[12] || n[4]), t = +(n[13] || n[5])) : (e = +n.left.replace(/[^-\d.]/g, ""), t = +n.top.replace(/[^-\d.]/g, "")),
                    {
                        x: e,
                        y: t
                    }
                },
                _initIndicators: function() {
                    function e(e) {
                        if (r.indicators) for (var t = r.indicators.length; t--;) e.call(r.indicators[t])
                    }
                    var t, n = this.options.interactiveScrollbars,
                    i = "string" != typeof this.options.scrollbars,
                    o = [],
                    r = this;
                    this.indicators = [],
                    this.options.scrollbars && (this.options.scrollY && (t = {
                        el: g("v", n, this.options.scrollbars),
                        interactive: n,
                        defaultScrollbars: !0,
                        customStyle: i,
                        resize: this.options.resizeScrollbars,
                        shrink: this.options.shrinkScrollbars,
                        fade: this.options.fadeScrollbars,
                        listenX: !1
                    },
                    this.wrapper.appendChild(t.el), o.push(t)), this.options.scrollX && (t = {
                        el: g("h", n, this.options.scrollbars),
                        interactive: n,
                        defaultScrollbars: !0,
                        customStyle: i,
                        resize: this.options.resizeScrollbars,
                        shrink: this.options.shrinkScrollbars,
                        fade: this.options.fadeScrollbars,
                        listenY: !1
                    },
                    this.wrapper.appendChild(t.el), o.push(t))),
                    this.options.indicators && (o = o.concat(this.options.indicators));
                    for (var s = o.length; s--;) this.indicators.push(new l(this, o[s]));
                    this.options.fadeScrollbars && (this.on("scrollEnd",
                    function() {
                        e(function() {
                            this.fade()
                        })
                    }), this.on("scrollCancel",
                    function() {
                        e(function() {
                            this.fade()
                        })
                    }), this.on("scrollStart",
                    function() {
                        e(function() {
                            this.fade(1)
                        })
                    }), this.on("beforeScrollStart",
                    function() {
                        e(function() {
                            this.fade(1, !0)
                        })
                    })),
                    this.on("refresh",
                    function() {
                        e(function() {
                            this.refresh()
                        })
                    }),
                    this.on("destroy",
                    function() {
                        e(function() {
                            this.destroy()
                        }),
                        delete this.indicators
                    })
                },
                _initWheel: function() {
                    C.addEvent(this.wrapper, "wheel", this),
                    C.addEvent(this.wrapper, "mousewheel", this),
                    C.addEvent(this.wrapper, "DOMMouseScroll", this),
                    this.on("destroy",
                    function() {
                        clearTimeout(this.wheelTimeout),
                        this.wheelTimeout = null,
                        C.removeEvent(this.wrapper, "wheel", this),
                        C.removeEvent(this.wrapper, "mousewheel", this),
                        C.removeEvent(this.wrapper, "DOMMouseScroll", this)
                    })
                },
                _wheel: function(e) {
                    if (this.enabled) {
                        e.preventDefault();
                        var t, n, i, o, r = this;
                        if (void 0 === this.wheelTimeout && r._execEvent("scrollStart"), clearTimeout(this.wheelTimeout), this.wheelTimeout = setTimeout(function() {
                            r.options.snap || r._execEvent("scrollEnd"),
                            r.wheelTimeout = void 0
                        },
                        400), "deltaX" in e) 1 === e.deltaMode ? (t = -e.deltaX * this.options.mouseWheelSpeed, n = -e.deltaY * this.options.mouseWheelSpeed) : (t = -e.deltaX, n = -e.deltaY);
                        else if ("wheelDeltaX" in e) t = e.wheelDeltaX / 120 * this.options.mouseWheelSpeed,
                        n = e.wheelDeltaY / 120 * this.options.mouseWheelSpeed;
                        else if ("wheelDelta" in e) t = n = e.wheelDelta / 120 * this.options.mouseWheelSpeed;
                        else {
                            if (! ("detail" in e)) return;
                            t = n = -e.detail / 3 * this.options.mouseWheelSpeed
                        }
                        if (t *= this.options.invertWheelDirection, n *= this.options.invertWheelDirection, this.hasVerticalScroll || (t = n, n = 0), this.options.snap) return i = this.currentPage.pageX,
                        o = this.currentPage.pageY,
                        t > 0 ? i--:t < 0 && i++,
                        n > 0 ? o--:n < 0 && o++,
                        void this.goToPage(i, o);
                        i = this.x + a.round(this.hasHorizontalScroll ? t: 0),
                        o = this.y + a.round(this.hasVerticalScroll ? n: 0),
                        this.directionX = t > 0 ? -1 : t < 0 ? 1 : 0,
                        this.directionY = n > 0 ? -1 : n < 0 ? 1 : 0,
                        i > 0 ? i = 0 : i < this.maxScrollX && (i = this.maxScrollX),
                        o > 0 ? o = 0 : o < this.maxScrollY && (o = this.maxScrollY),
                        this.scrollTo(i, o, 0)
                    }
                },
                _initSnap: function() {
                    this.currentPage = {},
                    "string" == typeof this.options.snap && (this.options.snap = this.scroller.querySelectorAll(this.options.snap)),
                    this.on("refresh",
                    function() {
                        var e, t, n, i, o, r, s, A = 0,
                        g = 0,
                        l = 0,
                        c = this.options.snapStepX || this.wrapperWidth,
                        I = this.options.snapStepY || this.wrapperHeight;
                        if (this.pages = [], this.wrapperWidth && this.wrapperHeight && this.scrollerWidth && this.scrollerHeight) {
                            if (!0 === this.options.snap) for (n = a.round(c / 2), i = a.round(I / 2); l > -this.scrollerWidth;) {
                                for (this.pages[A] = [], e = 0, o = 0; o > -this.scrollerHeight;) this.pages[A][e] = {
                                    x: a.max(l, this.maxScrollX),
                                    y: a.max(o, this.maxScrollY),
                                    width: c,
                                    height: I,
                                    cx: l - n,
                                    cy: o - i
                                },
                                o -= I,
                                e++;
                                l -= c,
                                A++
                            } else for (r = this.options.snap, e = r.length, t = -1; A < e; A++) s = C.getRect(r[A]),
                            (0 === A || s.left <= C.getRect(r[A - 1]).left) && (g = 0, t++),
                            this.pages[g] || (this.pages[g] = []),
                            l = a.max( - s.left, this.maxScrollX),
                            o = a.max( - s.top, this.maxScrollY),
                            n = l - a.round(s.width / 2),
                            i = o - a.round(s.height / 2),
                            this.pages[g][t] = {
                                x: l,
                                y: o,
                                width: s.width,
                                height: s.height,
                                cx: n,
                                cy: i
                            },
                            l > this.maxScrollX && g++;
                            this.goToPage(this.currentPage.pageX || 0, this.currentPage.pageY || 0, 0),
                            this.options.snapThreshold % 1 == 0 ? (this.snapThresholdX = this.options.snapThreshold, this.snapThresholdY = this.options.snapThreshold) : (this.snapThresholdX = a.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].width * this.options.snapThreshold), this.snapThresholdY = a.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].height * this.options.snapThreshold))
                        }
                    }),
                    this.on("flick",
                    function() {
                        var e = this.options.snapSpeed || a.max(a.max(a.min(a.abs(this.x - this.startX), 1e3), a.min(a.abs(this.y - this.startY), 1e3)), 300);
                        this.goToPage(this.currentPage.pageX + this.directionX, this.currentPage.pageY + this.directionY, e)
                    })
                },
                _nearestSnap: function(e, t) {
                    if (!this.pages.length) return {
                        x: 0,
                        y: 0,
                        pageX: 0,
                        pageY: 0
                    };
                    var n = 0,
                    i = this.pages.length,
                    o = 0;
                    if (a.abs(e - this.absStartX) < this.snapThresholdX && a.abs(t - this.absStartY) < this.snapThresholdY) return this.currentPage;
                    for (e > 0 ? e = 0 : e < this.maxScrollX && (e = this.maxScrollX), t > 0 ? t = 0 : t < this.maxScrollY && (t = this.maxScrollY); n < i; n++) if (e >= this.pages[n][0].cx) {
                        e = this.pages[n][0].x;
                        break
                    }
                    for (i = this.pages[n].length; o < i; o++) if (t >= this.pages[0][o].cy) {
                        t = this.pages[0][o].y;
                        break
                    }
                    return n == this.currentPage.pageX && (n += this.directionX, n < 0 ? n = 0 : n >= this.pages.length && (n = this.pages.length - 1), e = this.pages[n][0].x),
                    o == this.currentPage.pageY && (o += this.directionY, o < 0 ? o = 0 : o >= this.pages[0].length && (o = this.pages[0].length - 1), t = this.pages[0][o].y),
                    {
                        x: e,
                        y: t,
                        pageX: n,
                        pageY: o
                    }
                },
                goToPage: function(e, t, n, i) {
                    i = i || this.options.bounceEasing,
                    e >= this.pages.length ? e = this.pages.length - 1 : e < 0 && (e = 0),
                    t >= this.pages[e].length ? t = this.pages[e].length - 1 : t < 0 && (t = 0);
                    var o = this.pages[e][t].x,
                    r = this.pages[e][t].y;
                    n = void 0 === n ? this.options.snapSpeed || a.max(a.max(a.min(a.abs(o - this.x), 1e3), a.min(a.abs(r - this.y), 1e3)), 300) : n,
                    this.currentPage = {
                        x: o,
                        y: r,
                        pageX: e,
                        pageY: t
                    },
                    this.scrollTo(o, r, n, i)
                },
                next: function(e, t) {
                    var n = this.currentPage.pageX,
                    i = this.currentPage.pageY;
                    n++,
                    n >= this.pages.length && this.hasVerticalScroll && (n = 0, i++),
                    this.goToPage(n, i, e, t)
                },
                prev: function(e, t) {
                    var n = this.currentPage.pageX,
                    i = this.currentPage.pageY;
                    n--,
                    n < 0 && this.hasVerticalScroll && (n = 0, i--),
                    this.goToPage(n, i, e, t)
                },
                _initKeys: function(e) {
                    var t, n = {
                        pageUp: 33,
                        pageDown: 34,
                        end: 35,
                        home: 36,
                        left: 37,
                        up: 38,
                        right: 39,
                        down: 40
                    };
                    if ("object" == o(this.options.keyBindings)) for (t in this.options.keyBindings)"string" == typeof this.options.keyBindings[t] && (this.options.keyBindings[t] = this.options.keyBindings[t].toUpperCase().charCodeAt(0));
                    else this.options.keyBindings = {};
                    for (t in n) this.options.keyBindings[t] = this.options.keyBindings[t] || n[t];
                    C.addEvent(r, "keydown", this),
                    this.on("destroy",
                    function() {
                        C.removeEvent(r, "keydown", this)
                    })
                },
                _key: function(e) {
                    if (this.enabled) {
                        var t, n = this.options.snap,
                        i = n ? this.currentPage.pageX: this.x,
                        o = n ? this.currentPage.pageY: this.y,
                        r = C.getTime(),
                        s = this.keyTime || 0;
                        switch (this.options.useTransition && this.isInTransition && (t = this.getComputedPosition(), this._translate(a.round(t.x), a.round(t.y)), this.isInTransition = !1), this.keyAcceleration = r - s < 200 ? a.min(this.keyAcceleration + .25, 50) : 0, e.keyCode) {
                        case this.options.keyBindings.pageUp:
                            this.hasHorizontalScroll && !this.hasVerticalScroll ? i += n ? 1 : this.wrapperWidth: o += n ? 1 : this.wrapperHeight;
                            break;
                        case this.options.keyBindings.pageDown:
                            this.hasHorizontalScroll && !this.hasVerticalScroll ? i -= n ? 1 : this.wrapperWidth: o -= n ? 1 : this.wrapperHeight;
                            break;
                        case this.options.keyBindings.end:
                            i = n ? this.pages.length - 1 : this.maxScrollX,
                            o = n ? this.pages[0].length - 1 : this.maxScrollY;
                            break;
                        case this.options.keyBindings.home:
                            i = 0,
                            o = 0;
                            break;
                        case this.options.keyBindings.left:
                            i += n ? -1 : 5 + this.keyAcceleration >> 0;
                            break;
                        case this.options.keyBindings.up:
                            o += n ? 1 : 5 + this.keyAcceleration >> 0;
                            break;
                        case this.options.keyBindings.right:
                            i -= n ? -1 : 5 + this.keyAcceleration >> 0;
                            break;
                        case this.options.keyBindings.down:
                            o -= n ? 1 : 5 + this.keyAcceleration >> 0;
                            break;
                        default:
                            return
                        }
                        if (n) return void this.goToPage(i, o);
                        i > 0 ? (i = 0, this.keyAcceleration = 0) : i < this.maxScrollX && (i = this.maxScrollX, this.keyAcceleration = 0),
                        o > 0 ? (o = 0, this.keyAcceleration = 0) : o < this.maxScrollY && (o = this.maxScrollY, this.keyAcceleration = 0),
                        this.scrollTo(i, o, 0),
                        this.keyTime = r
                    }
                },
                _animate: function(e, t, n, i) {
                    function o() {
                        var l, I, h, u = C.getTime();
                        if (u >= g) return r.isAnimating = !1,
                        r._translate(e, t),
                        void(r.resetPosition(r.options.bounceTime) || r._execEvent("scrollEnd"));
                        u = (u - A) / n,
                        h = i(u),
                        l = (e - s) * h + s,
                        I = (t - a) * h + a,
                        r._translate(l, I),
                        r.isAnimating && c(o)
                    }
                    var r = this,
                    s = this.x,
                    a = this.y,
                    A = C.getTime(),
                    g = A + n;
                    this.isAnimating = !0,
                    o()
                },
                handleEvent: function(e) {
                    switch (e.type) {
                    case "touchstart":
                    case "pointerdown":
                    case "MSPointerDown":
                    case "mousedown":
                        this._start(e);
                        break;
                    case "touchmove":
                    case "pointermove":
                    case "MSPointerMove":
                    case "mousemove":
                        this._move(e);
                        break;
                    case "touchend":
                    case "pointerup":
                    case "MSPointerUp":
                    case "mouseup":
                    case "touchcancel":
                    case "pointercancel":
                    case "MSPointerCancel":
                    case "mousecancel":
                        this._end(e);
                        break;
                    case "orientationchange":
                    case "resize":
                        this._resize();
                        break;
                    case "transitionend":
                    case "webkitTransitionEnd":
                    case "oTransitionEnd":
                    case "MSTransitionEnd":
                        this._transitionEnd(e);
                        break;
                    case "wheel":
                    case "DOMMouseScroll":
                    case "mousewheel":
                        this._wheel(e);
                        break;
                    case "keydown":
                        this._key(e);
                        break;
                    case "click":
                        this.enabled && !e._constructed && (e.preventDefault(), e.stopPropagation())
                    }
                }
            },
            l.prototype = {
                handleEvent: function(e) {
                    switch (e.type) {
                    case "touchstart":
                    case "pointerdown":
                    case "MSPointerDown":
                    case "mousedown":
                        this._start(e);
                        break;
                    case "touchmove":
                    case "pointermove":
                    case "MSPointerMove":
                    case "mousemove":
                        this._move(e);
                        break;
                    case "touchend":
                    case "pointerup":
                    case "MSPointerUp":
                    case "mouseup":
                    case "touchcancel":
                    case "pointercancel":
                    case "MSPointerCancel":
                    case "mousecancel":
                        this._end(e)
                    }
                },
                destroy: function() {
                    this.options.fadeScrollbars && (clearTimeout(this.fadeTimeout), this.fadeTimeout = null),
                    this.options.interactive && (C.removeEvent(this.indicator, "touchstart", this), C.removeEvent(this.indicator, C.prefixPointerEvent("pointerdown"), this), C.removeEvent(this.indicator, "mousedown", this), C.removeEvent(r, "touchmove", this), C.removeEvent(r, C.prefixPointerEvent("pointermove"), this), C.removeEvent(r, "mousemove", this), C.removeEvent(r, "touchend", this), C.removeEvent(r, C.prefixPointerEvent("pointerup"), this), C.removeEvent(r, "mouseup", this)),
                    this.options.defaultScrollbars && this.wrapper.parentNode && this.wrapper.parentNode.removeChild(this.wrapper)
                },
                _start: function(e) {
                    var t = e.touches ? e.touches[0] : e;
                    e.preventDefault(),
                    e.stopPropagation(),
                    this.transitionTime(),
                    this.initiated = !0,
                    this.moved = !1,
                    this.lastPointX = t.pageX,
                    this.lastPointY = t.pageY,
                    this.startTime = C.getTime(),
                    this.options.disableTouch || C.addEvent(r, "touchmove", this),
                    this.options.disablePointer || C.addEvent(r, C.prefixPointerEvent("pointermove"), this),
                    this.options.disableMouse || C.addEvent(r, "mousemove", this),
                    this.scroller._execEvent("beforeScrollStart")
                },
                _move: function(e) {
                    var t, n, i, o, r = e.touches ? e.touches[0] : e;
                    C.getTime();
                    this.moved || this.scroller._execEvent("scrollStart"),
                    this.moved = !0,
                    t = r.pageX - this.lastPointX,
                    this.lastPointX = r.pageX,
                    n = r.pageY - this.lastPointY,
                    this.lastPointY = r.pageY,
                    i = this.x + t,
                    o = this.y + n,
                    this._pos(i, o),
                    e.preventDefault(),
                    e.stopPropagation()
                },
                _end: function(e) {
                    if (this.initiated) {
                        if (this.initiated = !1, e.preventDefault(), e.stopPropagation(), C.removeEvent(r, "touchmove", this), C.removeEvent(r, C.prefixPointerEvent("pointermove"), this), C.removeEvent(r, "mousemove", this), this.scroller.options.snap) {
                            var t = this.scroller._nearestSnap(this.scroller.x, this.scroller.y),
                            n = this.options.snapSpeed || a.max(a.max(a.min(a.abs(this.scroller.x - t.x), 1e3), a.min(a.abs(this.scroller.y - t.y), 1e3)), 300);
                            this.scroller.x == t.x && this.scroller.y == t.y || (this.scroller.directionX = 0, this.scroller.directionY = 0, this.scroller.currentPage = t, this.scroller.scrollTo(t.x, t.y, n, this.scroller.options.bounceEasing))
                        }
                        this.moved && this.scroller._execEvent("scrollEnd")
                    }
                },
                transitionTime: function(e) {
                    e = e || 0;
                    var t = C.style.transitionDuration;
                    if (t && (this.indicatorStyle[t] = e + "ms", !e && C.isBadAndroid)) {
                        this.indicatorStyle[t] = "0.0001ms";
                        var n = this;
                        c(function() {
                            "0.0001ms" === n.indicatorStyle[t] && (n.indicatorStyle[t] = "0s")
                        })
                    }
                },
                transitionTimingFunction: function(e) {
                    this.indicatorStyle[C.style.transitionTimingFunction] = e
                },
                refresh: function() {
                    this.transitionTime(),
                    this.options.listenX && !this.options.listenY ? this.indicatorStyle.display = this.scroller.hasHorizontalScroll ? "block": "none": this.options.listenY && !this.options.listenX ? this.indicatorStyle.display = this.scroller.hasVerticalScroll ? "block": "none": this.indicatorStyle.display = this.scroller.hasHorizontalScroll || this.scroller.hasVerticalScroll ? "block": "none",
                    this.scroller.hasHorizontalScroll && this.scroller.hasVerticalScroll ? (C.addClass(this.wrapper, "iScrollBothScrollbars"), C.removeClass(this.wrapper, "iScrollLoneScrollbar"), this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "8px": this.wrapper.style.bottom = "8px")) : (C.removeClass(this.wrapper, "iScrollBothScrollbars"), C.addClass(this.wrapper, "iScrollLoneScrollbar"), this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "2px": this.wrapper.style.bottom = "2px")),
                    C.getRect(this.wrapper),
                    this.options.listenX && (this.wrapperWidth = this.wrapper.clientWidth, this.options.resize ? (this.indicatorWidth = a.max(a.round(this.wrapperWidth * this.wrapperWidth / (this.scroller.scrollerWidth || this.wrapperWidth || 1)), 8), this.indicatorStyle.width = this.indicatorWidth + "px") : this.indicatorWidth = this.indicator.clientWidth, this.maxPosX = this.wrapperWidth - this.indicatorWidth, "clip" == this.options.shrink ? (this.minBoundaryX = 8 - this.indicatorWidth, this.maxBoundaryX = this.wrapperWidth - 8) : (this.minBoundaryX = 0, this.maxBoundaryX = this.maxPosX), this.sizeRatioX = this.options.speedRatioX || this.scroller.maxScrollX && this.maxPosX / this.scroller.maxScrollX),
                    this.options.listenY && (this.wrapperHeight = this.wrapper.clientHeight, this.options.resize ? (this.indicatorHeight = a.max(a.round(this.wrapperHeight * this.wrapperHeight / (this.scroller.scrollerHeight || this.wrapperHeight || 1)), 8), this.indicatorStyle.height = this.indicatorHeight + "px") : this.indicatorHeight = this.indicator.clientHeight, this.maxPosY = this.wrapperHeight - this.indicatorHeight, "clip" == this.options.shrink ? (this.minBoundaryY = 8 - this.indicatorHeight, this.maxBoundaryY = this.wrapperHeight - 8) : (this.minBoundaryY = 0, this.maxBoundaryY = this.maxPosY), this.maxPosY = this.wrapperHeight - this.indicatorHeight, this.sizeRatioY = this.options.speedRatioY || this.scroller.maxScrollY && this.maxPosY / this.scroller.maxScrollY),
                    this.updatePosition()
                },
                updatePosition: function() {
                    var e = this.options.listenX && a.round(this.sizeRatioX * this.scroller.x) || 0,
                    t = this.options.listenY && a.round(this.sizeRatioY * this.scroller.y) || 0;
                    this.options.ignoreBoundaries || (e < this.minBoundaryX ? ("scale" == this.options.shrink && (this.width = a.max(this.indicatorWidth + e, 8), this.indicatorStyle.width = this.width + "px"), e = this.minBoundaryX) : e > this.maxBoundaryX ? "scale" == this.options.shrink ? (this.width = a.max(this.indicatorWidth - (e - this.maxPosX), 8), this.indicatorStyle.width = this.width + "px", e = this.maxPosX + this.indicatorWidth - this.width) : e = this.maxBoundaryX: "scale" == this.options.shrink && this.width != this.indicatorWidth && (this.width = this.indicatorWidth, this.indicatorStyle.width = this.width + "px"), t < this.minBoundaryY ? ("scale" == this.options.shrink && (this.height = a.max(this.indicatorHeight + 3 * t, 8), this.indicatorStyle.height = this.height + "px"), t = this.minBoundaryY) : t > this.maxBoundaryY ? "scale" == this.options.shrink ? (this.height = a.max(this.indicatorHeight - 3 * (t - this.maxPosY), 8), this.indicatorStyle.height = this.height + "px", t = this.maxPosY + this.indicatorHeight - this.height) : t = this.maxBoundaryY: "scale" == this.options.shrink && this.height != this.indicatorHeight && (this.height = this.indicatorHeight, this.indicatorStyle.height = this.height + "px")),
                    this.x = e,
                    this.y = t,
                    this.scroller.options.useTransform ? this.indicatorStyle[C.style.transform] = "translate(" + e + "px," + t + "px)" + this.scroller.translateZ: (this.indicatorStyle.left = e + "px", this.indicatorStyle.top = t + "px")
                },
                _pos: function(e, t) {
                    e < 0 ? e = 0 : e > this.maxPosX && (e = this.maxPosX),
                    t < 0 ? t = 0 : t > this.maxPosY && (t = this.maxPosY),
                    e = this.options.listenX ? a.round(e / this.sizeRatioX) : this.scroller.x,
                    t = this.options.listenY ? a.round(t / this.sizeRatioY) : this.scroller.y,
                    this.scroller.scrollTo(e, t)
                },
                fade: function(e, t) {
                    if (!t || this.visible) {
                        clearTimeout(this.fadeTimeout),
                        this.fadeTimeout = null;
                        var n = e ? 250 : 500,
                        i = e ? 0 : 300;
                        e = e ? "1": "0",
                        this.wrapperStyle[C.style.transitionDuration] = n + "ms",
                        this.fadeTimeout = setTimeout(function(e) {
                            this.wrapperStyle.opacity = e,
                            this.visible = +e
                        }.bind(this, e), i)
                    }
                }
            },
            A.utils = C,
            void 0 !== e && e.exports ? e.exports = A: void 0 !== (i = function() {
                return A
            }.call(t, n, t, e)) && (e.exports = i)
        } (window, document, Math)
    },
    102 : function(e, t) {
        function n(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n,
            e
        } !
        function() {
            Date.now || (Date.now = function() {
                return (new Date).getTime()
            });
            var t = function() {
                this.m_data = {},
                this.timer = null,
                this.screenHeight = window.innerHeight || window.screen.height,
                this.nodeList = null
            };
            t.prototype = {
                setId: function(e, t) {
                    document.cookie = encodeURIComponent(e) + "=" + encodeURIComponent(t) + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"
                },
                hasId: function(e) {
                    return new RegExp("(?:^|;\\s*)" + encodeURIComponent(e).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=").test(document.cookie)
                },
                creatId: function() {
                    if (!this.hasId("_ma_id")) {
                        var e = (new Date).getTime(),
                        t = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,
                        function(t) {
                            var n = (e + 16 * Math.random()) % 16 | 0;
                            return e = Math.floor(e / 16),
                            ("x" == t ? n: 7 & n | 8).toString(16)
                        });
                        this.setId("_ma_id", t)
                    }
                },
                getByClassName: function(e) {
                    var t = new Array,
                    n = 0,
                    i = document.getElementsByTagName("*");
                    for (var o in i) 1 == i[o].nodeType && i[o].getAttribute("class") && i[o].getAttribute("class").match(e) && (t[n] = i[o], n++);
                    return t
                },
                getNode: function(e) {
                    var t = this.getByClassName(e),
                    i = [];
                    for (var o in t) {
                        var r, s = t[o],
                        a = s.offsetHeight,
                        A = "part" + o + "Enter",
                        g = "part" + o + "Leave";
                        i.push({
                            height: a,
                            posY: 0,
                            node: s,
                            isHeader: !1,
                            isFooter: !1
                        }),
                        Object.assign(this.m_data, (r = {},
                        n(r, A, ""), n(r, g, ""), r))
                    }
                    this.nodeList = i
                },
                enterPart: function(e, t, n, i) {
                    var o = !1,
                    r = !1;
                    if (t > -e.height && t < n / 2 && (o = !0), e.isHeader && o) {
                        var s = "part" + i + "Enter";
                        this.m_data[s] = Date.now()
                    }
                    t < n && t > n / 2 && (r = !0),
                    e.isHeader = r
                },
                leavePart: function(e, t, n, i) {
                    var o = !1;
                    if (t > -(e.height - n / 2) && t < n / 2 && (o = !0), !e.isHeader && e.isFooter && !o) {
                        var r = "part" + i + "Leave";
                        this.m_data[r] = Date.now()
                    }
                    e.isFooter = o
                },
                recordTime: function() {
                    var e = this;
                    clearTimeout(this.timer);
                    var t = this.screenHeight;
                    this.nodeList.forEach(function(n, i) {
                        var o = n.node.getBoundingClientRect().top;
                        e.enterPart(n, o, t, i),
                        e.leavePart(n, o, t, i),
                        n.posY = o
                    }),
                    this.timer = setTimeout(function() {
                        e.recordTime()
                    },
                    300)
                },
                init: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "mai_d";
                    this.creatId(),
                    this.getNode(e),
                    this.m_data.enterpagetime = Date.now(),
                    this.recordTime()
                },
                getData: function() {
                    return this.m_data
                }
            },
            e.exports = new t
        } ()
    },
    106 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".return-pop-mask {\n  position: fixed;\n  left: 0;\n  top: 0;\n  right: 0;\n  bottom: 0;\n  background-color: rgba(0, 0, 0, 0.65);\n  z-index: 10000;\n}\n.return-pop-mask .pop-content {\n  width: 15.78667rem;\n  position: absolute;\n  left: 50%;\n  top: 50%;\n  -webkit-transform: translate(-50%, -50%);\n      -ms-transform: translate(-50%, -50%);\n          transform: translate(-50%, -50%);\n}\n", ""])
    },
    107 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".index-popupBtn {\n  width: 100%;\n  min-width: 20rem;\n  max-width: 30rem;\n  -webkit-box-sizing: border-box;\n     -moz-box-sizing: border-box;\n          box-sizing: border-box;\n  background-color: rgba(0, 0, 0, 0.5);\n  padding: 0.5rem 1rem 0.5rem;\n  position: fixed;\n  bottom: 0;\n  z-index: 10000;\n  padding-bottom: constant(safe-area-inset-bottom);\n  padding-bottom: env(safe-area-inset-bottom);\n}\n@media (min-width: 640px) {\n  .index-popupBtn .btn img {\n    width: 68%;\n    display: block;\n    margin: 0 auto;\n  }\n}\n.index-popupBtn p {\n  height: 2.13333rem;\n  line-height: 2.13333rem;\n  -webkit-border-radius: 0.26667rem;\n          border-radius: 0.26667rem;\n  color: #fff;\n  background-color: #f6497d;\n  text-align: center;\n  font-size: 0.8rem;\n  cursor: pointer;\n}\nimg {\n  pointer-events: none;\n}\n", ""])
    },
    116 : function(e, t, n) {
        var i = n(106);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    117 : function(e, t, n) {
        var i = n(107);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    12 : function(module, exports) {
        var ryan = function() {
            var O = function() {},
            fn = O.prototype;
            return fn.METHOD = ["GET", "POST", "PUT", "DELETE", "OPTIONS", "HEAD", "TRACE", "CONNECT"],
            fn.getXHR = function() {
                var e;
                try {
                    e = new XMLHttpRequest
                } catch(t) {
                    try {
                        e = new ActiveXObject("Msxml2.XMLHTTP")
                    } catch(t) {
                        try {
                            e = new ActiveXObject("Microsoft.XMLHTTP")
                        } catch(t) {
                            throw e = !1,
                            new Error("您的浏览器不支持 XHR 对象！")
                        }
                    }
                }
                return e
            },
            fn.params = function(e) {
                var t = [];
                for (var n in e) {
                    var i = encodeURIComponent(n) + "=" + encodeURIComponent(e[n]);
                    t.push(i)
                }
                return t.join("&")
            },
            fn.isEmpty = function(e) {
                return /^[\s\r\t\n]*$/.test(e)
            },
            fn.initOptions = function(e) {
                var t = {},
                n = "rand=" + Math.random();
                return t.url = e.url,
                t.type = e.type || "get",
                t.data = e.data || "",
                t.dataType = e.dataType || "json",
                t.async = e.async || !0,
                t.success = e.success ||
                function() {},
                t.error = e.error ||
                function() {},
                t.data = this.params(t.data),
                "get" === t.type.toLowerCase() && (this.isEmpty(t.data) ? t.url = -1 === t.url.indexOf("?") ? t.url + "?" + n: t.url + "&" + n: t.url = -1 === t.url.indexOf("?") ? t.url + "?" + t.data + "&" + n: t.url + "&" + t.data + "&" + n),
                t
            },
            fn.ajax = function(options) {
                options = this.initOptions(options);
                var xhr = this.getXHR(),
                callback = function callback() {
                    if (200 === xhr.status) {
                        var res;
                        if ("json" === options.dataType) try {
                            res = JSON && JSON.parse ? JSON.parse(xhr.responseText) : eval("(" + xhr.responseText + ")")
                        } catch(e) {
                            res = xhr.responseText
                        } else res = xhr.responseText;
                        options.success(res)
                    } else {
                        try {
                            res = JSON && JSON.parse ? JSON.parse(xhr.responseText) : eval("(" + xhr.responseText + ")")
                        } catch(e) {
                            res = xhr.responseText
                        }
                        options.error({
                            response: res,
                            status: xhr.status,
                            xhr: xhr
                        })
                    }
                }; ! 0 === options.async && (xhr.onreadystatechange = function() {
                    4 === xhr.readyState && callback()
                }),
                xhr.open(options.type, options.url, options.async),
                "post" === options.type.toLowerCase() ? (xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), xhr.send(options.data)) : xhr.send(null),
                !1 === options.async && callback()
            },
            new O
        } ();
        module.exports = ryan;
        var _temp = function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && __REACT_HOT_LOADER__.register(ryan, "ryan", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/commonAjax.js")
        } ()
    },
    139 : function(e, t, n) {
        var i = n(177);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    14 : function(e, t) {
        e.exports = function() {
            "use strict";
            var e = function() {},
            t = e.prototype,
            n = "一七万丈三上下不与专且世业东丝丢两严丧个中丰串临为主举久么义之乎乏乐乘九乞也习乡书买乱了予争事二于亏云云互五井亚些亡交亦产享京亮亲人亿什仁仅仇今介仍从仑仓仔他付代令以们件价任份仿企伊伍休众优伙伙会伟传伤伦伯估伴伸似但位低住体何余余余佛作你佩佳佶使例供依侥侧侵便促俊俗保信俩修俱倍倒候借值倾假偏做停健偶偷偿傍储催傻像僚僻儿元兄充兆先光克免党入全八公六兰共关兴兵其具典兹养兼冀内册再写军农冠冤冬冲冲决况冷净凄准凉减凑几凡凤凯凶凶出击函凿分切刊划列刘则刚创初删判利别到制券刺刻刽剂削前剎剥剧剩割力劝办功加务劣动助努劫励劲劳势勇勒募勤勾包匈化北匹区医匿十千升午半华协单卖南博占占卡卫印危即却卵厂历历厉压厌厕厘原厢厥去县参又叉及友双反发发叔取受变口古句另只叫召可台台史右叶号司吃各合吉同名后向向吓吕吗君吝吞否吧含听启吴吵吶吸吹吻吼吾呀告员呢周周味呵呼命咀和咖咧咽品哄哈哉响哑哗哥哪哭哲唉唯唱商啊啜啦善喊喔喜喧嗯嗲嘛嘲嘴嘶嘿噢器噩噪嚼四回因团园困围固国图圆圈土圣在地场址均坏坐块坚坛坦垄型垒埋城培基堂堆堕堪堵塑塔塞填境墓墙增墟士壮声壳壹处备复夕外多夜够大天太夫央失头夸夹夺奇奉奋奏契奔奖套奠奢女奴她好如妇妈妖妙妥妨妹始姑姓委姜姨姻威娃娄娘娱娶婆婚婴媒嫉嫌子孔字存孙孤学孩孽宁它宅守安完宕宗官定宜宝实宠审客宣宪宰害家家容寂寄密富寒察寡对寻导封射将尊小少尔尚尝尤尬就尴尺尽尾局屁层居屈届屋屎展属山岁岂岗岸崇州工左巧巨差己已巴巷币市布师希帝带席帮常幕平年并幸幸幻幼广庄庇床序库应底店府庞废度座庭庶康庸廊廖延建开异弃弄弊式引弟张弥弱弹强归当录形彩彪彭彰影役彻彼往征征径径待很律徒得微德徽心必忆忍志志忘忙忠快念忽忿怀态怆怎怒怕怜思急性怨怪总恋恍恐恒恢恨恩息恰恳恶悉悔悟您悬悯悲情惊惑惕惜惨惯想愈意愚感愤愿慈慢慰憾懂懒戍戏成我或战戚截戴户房所扁扈手才扑打扔托扛扣执扩扫扬扭扮扯扰批扼找承技抄抉把抑抒抓投抗折折抚抢护报披抬抱抵押抽担拆拉拍拒拓拖拘拚招拜拟拢拥拨择括拼拿持挂指按挑挖挤挥挨挫振挺挽捅捉捐捕捞损换据掀掉掌掏掐排掘探接控推描提插握揣揪揭援搁搜搞摄摆摇摊摘摧摩撇撑撤撬播擅攒攫支收改攻放政故效敌敏救教敛敢散敬数整文斗料斥断斯新方施旁旅旋族旗无既日旦旧早时昌明昏易星春昧昨是显晓晚普景晰晴智暂暇暑暖暗暴曲更曾替最月有朋服朔望朝期木未末本术机杀杂权材村束条来杨杯杰板板极构枉析林果枯架某染查标栈栏树校样核根格框案桌档桦桶梦梨梯检棒棚椅楚楼概榜榨槛樟模横欠次欢欧欲款歌止正此步武歧死殊残段殷毁母每毒比毕毛毫民气水永求汇汉江污汰沉沙沟没沦河油治沾沿泄法泛泡波泣泥注泪泯泰泽洋洗洛津洪洲活派流浅测济浏浑浓浩浪浮海浸消涉涌涛涡涤润涨液涵淘淡深混添清渐渗渡渣渥温港游游湖湾湿源滋滑滚滞满滴漂漏演漩漫潘潜潮澡激灌火灭灯灰灵灾灿炒炫炸点烂烈烦烧热焉焦然煤照煽熊熏熟燃燥爆爱父爷爸爽片版牌牙牛牢物牲牵特牺犯状犹狂狄狗独狭狱狼猖猛猜獗率玉王玩环现珊班球理琴瑞瑟璋瓦瓶甚生用甫田由甲申电男画畅界留略番畴疆疑疗疮疲病痒痛登白百皂的皆皇皮益监盒盖盘盟目盯盲直相盼盾省看真眷眼著睛睡瞧瞭矛矣知短石矿码研破砸础硬确碍碗碣碧碰磁磨示社祖神票禁福离禽秀私种科秒秩积称移稀程稍税稚稳稻究穷空穿突窗立站竞竟章童端竹竿笑笔符笨第等筑答策筝筹签签简算管篇籍类粉粒粗粮粹精糊糕糟糟系系素索紧紫累繁纠红约级纪纯纲纳纷纸纽纾线练组绅细织终绍经结给络绝统继绩绪续绳维绵综绿缓缔编缚缝缩缴缺网罗罢罪置署羊美羞群翔翱翻翼耀耀老考者而耐耗耳耶耸耻聋职联聚肉肌肚肝股肤肩肪肯育肾胁胃胆背胚胜胞胡胳能脂脆脉脏脏脑脚脱脸腐腥腾臂自臭至致舆舍舍舒舞舟航般舰舱船良艰色艺节芦芬花苏苟若苦英范茅茍草荐荒荡荣药荼莎莫莱莲获获菜营萧落葬蒙蓄蓍蓝蔑蔓薄薪藉藏虑虚虫虽蚀蚁蚂蚊蛋蛙蛛蜂蝴蝶融蠢血行衍衡衣补表袋袖被袭裁裂装裸西要覆见观规视览觉角解触言誉警譬计订认讨让议讯记讲讳讶许论讽设访证评识诉词译试诗诚话询该详语误说请诸读课谁调谅谈谋谎谓谢谣谩谬象貌贝负财责败货质贩贪贫购贯贴贵费资赌赏赖赘赚赛赞赞赢赤赫走赴赶起超越趋趟趣足跃跋跑距跟跨路跳践踏踩踮蹲身躲车轨转轮软轰轻载较辄辆辈辉辐辑输辛辜辞辣辨辩辱边达迁迅过迈迎运近返还这进远违连迫述迷迹迹追退送适逃逆选透逐递途通逛速造逢逮逸逻遇遍遑道遗遥遭遮遵避邓那邮邻郑部郭都酋配酒酷酸酿醒采释里重野量金针钙钟钢钦钮钱钻铁铅铜铲链销锁锄错锦键锺镖镜长门闪闭问闲间闷闹闻阂阅阙队防阳阴阵阶阻阿附际陆陈陋降限院除险陪陶陷随隐隔隘障隶难雄集雇雇雏雨雳零雷需霄露霹青静非靠面革鞋鞭韩音页顶顷项顺须顾顿颂预领颇频颖题额风飞食餐饥饭饰饱饼饿馆首香马驭驱驳驼驾骂骆验骑骗骤骨髓高鬼魂魏鱼鲁鲜鸣鸭鸯鸳鹰鹿麻黄黑鼎鼓鼠齐齿龙樱剑皑蔼袄奥坝颁绊绑镑谤鲍钡狈惫绷毙贬辫鳖瘪濒滨宾摈钵铂卜蚕惭苍沧诧搀掺蝉馋谗缠阐颤肠钞尘衬惩骋痴迟驰炽踌绸橱厨闯锤绰赐聪葱囱丛窜贷郸掸惮诞挡捣岛祷盗垫淀钓迭谍叠钉锭栋冻犊镀锻缎兑吨钝鹅讹饵贰罚阀珐矾钒纺坟粪枫锋疯冯辅赋讣秆赣冈皋镐鸽阁铬龚宫巩贡钩蛊剐硅龟闺诡柜辊锅骇鹤贺鸿壶沪唤痪焕涣贿秽烩诲绘荤祸讥鸡缉蓟荚颊贾钾歼笺缄茧碱硷拣捡俭鉴贱饯溅涧浆蒋桨酱胶浇骄娇搅铰矫饺绞轿秸茎颈痉厩驹锯惧鹃绢洁诫谨晋烬荆诀钧骏颗垦抠裤侩宽旷岿窥馈溃阔蜡腊拦篮阑澜谰揽缆滥涝镭篱鲤礼丽砾沥镰涟帘炼辽镣猎鳞凛赁龄铃凌岭馏咙笼陇搂篓卢颅庐炉掳卤虏赂禄驴铝侣屡缕滤峦挛孪滦抡纶萝锣箩骡玛麦瞒馒蛮猫锚铆贸霉镁锰谜觅缅庙闽铭亩钠挠恼馁腻撵捻鸟聂啮镊镍柠狞拧泞脓疟诺鸥殴呕沤赔喷鹏飘苹凭泼铺朴谱脐讫扦钎谦钳谴堑枪呛蔷锹桥乔侨翘窍窃氢庆琼躯龋颧鹊饶绕韧纫绒锐闰洒萨鳃伞骚涩纱筛晒陕赡缮赊慑婶狮尸驶寿兽枢赎竖帅硕烁饲怂讼诵擞肃绥笋琐獭挞瘫滩谭叹汤烫绦誊锑屉厅烃涂颓蜕鸵驮椭洼袜弯顽韦潍苇伪纬纹瓮挝蜗窝呜钨乌诬芜坞雾锡铣虾辖峡侠厦锨纤咸贤衔献馅羡镶啸蝎挟携谐泻锌衅汹锈绣嘘轩癣绚勋驯训逊鸦阉烟盐颜阎艳砚彦谚疡瑶尧窑铱颐仪彝诣谊绎荫银饮缨莹萤荧蝇哟佣痈踊咏忧铀诱渔屿吁御渊辕缘钥岳粤悦郧匀陨蕴酝晕韵赃枣灶贼赠扎札轧铡闸诈斋债毡盏斩辗崭绽帐账胀赵蛰辙锗贞侦诊镇挣睁狰帧挚掷帜肿诌轴皱昼猪诛烛瞩嘱贮铸驻砖桩妆锥坠缀谆浊渍踪纵邹诅郁傥",
            i = "一七萬丈三上下不與專且世業東絲丟兩嚴喪個中豐串臨為主舉久麼義之乎乏樂乘九乞也習鄉書買亂了予爭事二於虧雲云互五井亞些亡交亦產享京亮親人億什仁僅仇今介仍從崙倉仔他付代令以們件價任份仿企伊伍休眾優伙夥會偉傳傷倫伯估伴伸似但位低住體何余餘馀佛作你佩佳佶使例供依僥側侵便促俊俗保信倆修俱倍倒候借值傾假偏做停健偶偷償傍儲催傻像僚僻兒元兄充兆先光克免黨入全八公六蘭共關興兵其具典茲養兼冀內冊再寫軍農冠冤冬衝沖決況冷淨淒準涼減湊幾凡鳳凱兇凶出擊函鑿分切刊劃列劉則剛創初刪判利別到製券刺刻劊劑削前剎剝劇剩割力勸辦功加務劣動助努劫勵勁勞勢勇勒募勤勾包匈化北匹區醫匿十千升午半華協單賣南博占佔卡衛印危即卻卵廠歷曆厲壓厭廁釐原廂厥去縣參又叉及友雙反發髮叔取受變口古句另只叫召可台臺史右葉號司吃各合吉同名後向嚮嚇呂嗎君吝吞否吧含聽啟吳吵吶吸吹吻吼吾呀告員呢周週味呵呼命咀和咖咧咽品哄哈哉響啞譁哥哪哭哲唉唯唱商啊啜啦善喊喔喜喧嗯嗲嘛嘲嘴嘶嘿噢器噩噪嚼四回因團園困圍固國圖圓圈土聖在地場址均壞坐塊堅壇坦壟型壘埋城培基堂堆墮堪堵塑塔塞填境墓牆增墟士壯聲殼壹處備複夕外多夜夠大天太夫央失頭誇夾奪奇奉奮奏契奔獎套奠奢女奴她好如婦媽妖妙妥妨妹始姑姓委薑姨姻威娃婁娘娛娶婆婚嬰媒嫉嫌子孔字存孫孤學孩孽寧它宅守安完宕宗官定宜寶實寵審客宣憲宰害家傢容寂寄密富寒察寡對尋導封射將尊小少爾尚嘗尤尬就尷尺盡尾局屁層居屈屆屋屎展屬山歲豈崗岸崇州工左巧鉅差己已巴巷幣市布師希帝帶席幫常幕平年並幸倖幻幼廣莊庇床序庫應底店府龐廢度座庭庶康庸廊廖延建開異棄弄弊式引弟張彌弱彈強歸當錄形彩彪彭彰影役徹彼往征徵徑逕待很律徒得微德徽心必憶忍志誌忘忙忠快念忽忿懷態愴怎怒怕憐思急性怨怪總戀恍恐恆恢恨恩息恰懇惡悉悔悟您懸憫悲情驚惑惕惜慘慣想愈意愚感憤願慈慢慰憾懂懶戍戲成我或戰戚截戴戶房所扁扈手才撲打扔託扛扣執擴掃揚扭扮扯擾批扼找承技抄抉把抑抒抓投抗摺折撫搶護報披抬抱抵押抽擔拆拉拍拒拓拖拘拚招拜擬攏擁撥擇括拼拿持掛指按挑挖擠揮挨挫振挺挽捅捉捐捕撈損換據掀掉掌掏掐排掘探接控推描提插握揣揪揭援擱搜搞攝擺搖攤摘摧摩撇撐撤撬播擅攢攫支收改攻放政故效敵敏救教斂敢散敬數整文斗料斥斷斯新方施旁旅旋族旗無既日旦舊早時昌明昏易星春昧昨是顯曉晚普景晰晴智暫暇暑暖暗暴曲更曾替最月有朋服朔望朝期木未末本術機殺雜權材村束條來楊杯傑闆板極構枉析林果枯架某染查標棧欄樹校樣核根格框案桌檔樺桶夢梨梯檢棒棚椅楚樓概榜榨檻樟模橫欠次歡歐慾款歌止正此步武歧死殊殘段殷毀母每毒比畢毛毫民氣水永求彙漢江污汰沉沙溝沒淪河油治沾沿洩法泛泡波泣泥注淚泯泰澤洋洗洛津洪洲活派流淺測濟瀏渾濃浩浪浮海浸消涉湧濤渦滌潤漲液涵淘淡深混添清漸滲渡渣渥溫港遊游湖灣濕源滋滑滾滯滿滴漂漏演漩漫潘潛潮澡激灌火滅燈灰靈災燦炒炫炸點爛烈煩燒熱焉焦然煤照煽熊薰熟燃燥爆愛父爺爸爽片版牌牙牛牢物牲牽特犧犯狀猶狂狄狗獨狹獄狼猖猛猜獗率玉王玩環現珊班球理琴瑞瑟璋瓦瓶甚生用甫田由甲申電男畫暢界留略番疇疆疑療瘡疲病癢痛登白百皂的皆皇皮益監盒蓋盤盟目盯盲直相盼盾省看真眷眼著睛睡瞧瞭矛矣知短石礦碼研破砸礎硬確礙碗碣碧碰磁磨示社祖神票禁福離禽秀私種科秒秩積稱移稀程稍稅稚穩稻究窮空穿突窗立站競竟章童端竹竿笑筆符笨第等築答策箏籌簽籤簡算管篇籍類粉粒粗糧粹精糊糕蹧糟係繫素索緊紫累繁糾紅約級紀純綱納紛紙紐紓線練組紳細織終紹經結給絡絕統繼績緒續繩維綿綜綠緩締編縛縫縮繳缺網羅罷罪置署羊美羞群翔翱翻翼燿耀老考者而耐耗耳耶聳恥聾職聯聚肉肌肚肝股膚肩肪肯育腎脅胃膽背胚勝胞胡骼能脂脆脈臟髒腦腳脫臉腐腥騰臂自臭至致輿捨舍舒舞舟航般艦艙船良艱色藝節蘆芬花蘇苟若苦英範茅茍草薦荒盪榮藥荼莎莫萊蓮穫獲菜營蕭落葬蒙蓄蓍藍蔑蔓薄薪藉藏慮虛蟲雖蝕蟻螞蚊蛋蛙蛛蜂蝴蝶融蠢血行衍衡衣補錶袋袖被襲裁裂裝裸西要覆見觀規視覽覺角解觸言譽警譬計訂認討讓議訊記講諱訝許論諷設訪證評識訴詞譯試詩誠話詢該詳語誤說請諸讀課誰調諒談謀謊謂謝謠謾謬象貌貝負財責敗貨質販貪貧購貫貼貴費資賭賞賴贅賺賽贊讚贏赤赫走赴趕起超越趨趟趣足躍跋跑距跟跨路跳踐踏踩踮蹲身躲車軌轉輪軟轟輕載較輒輛輩輝輻輯輸辛辜辭辣辨辯辱邊達遷迅過邁迎運近返還這進遠違連迫述迷蹟跡追退送適逃逆選透逐遞途通逛速造逢逮逸邏遇遍遑道遺遙遭遮遵避鄧那郵鄰鄭部郭都酋配酒酷酸釀醒采釋裡重野量金針鈣鐘鋼欽鈕錢鑽鐵鉛銅鏟鏈銷鎖鋤錯錦鍵鍾鏢鏡長門閃閉問閒間悶鬧聞閡閱闕隊防陽陰陣階阻阿附際陸陳陋降限院除險陪陶陷隨隱隔隘障隸難雄集雇僱雛雨靂零雷需霄露霹青靜非靠面革鞋鞭韓音頁頂頃項順須顧頓頌預領頗頻穎題額風飛食餐饑飯飾飽餅餓館首香馬馭驅駁駝駕罵駱驗騎騙驟骨髓高鬼魂魏魚魯鮮鳴鴨鴦鴛鷹鹿麻黃黑鼎鼓鼠齊齒龍櫻劍皚藹襖奧壩頒絆綁鎊謗鮑鋇狽憊繃斃貶辮鼈癟瀕濱賓擯缽鉑卜蠶慚蒼滄詫攙摻蟬饞讒纏闡顫腸鈔塵襯懲騁癡遲馳熾躊綢櫥廚闖錘綽賜聰蔥囪叢竄貸鄲撣憚誕擋搗島禱盜墊澱釣叠諜疊釘錠棟凍犢鍍鍛緞兌噸鈍鵝訛餌貳罰閥琺礬釩紡墳糞楓鋒瘋馮輔賦訃稈贛岡臯鎬鴿閣鉻龔宮鞏貢鈎蠱剮矽龜閨詭櫃輥鍋駭鶴賀鴻壺滬喚瘓煥渙賄穢燴誨繪葷禍譏雞緝薊莢頰賈鉀殲箋緘繭堿鹼揀撿儉鑒賤餞濺澗漿蔣槳醬膠澆驕嬌攪鉸矯餃絞轎稭莖頸痙廄駒鋸懼鵑絹潔誡謹晉燼荊訣鈞駿顆墾摳褲儈寬曠巋窺饋潰闊蠟臘攔籃闌瀾讕攬纜濫澇鐳籬鯉禮麗礫瀝鐮漣簾煉遼鐐獵鱗凜賃齡鈴淩嶺餾嚨籠隴摟簍盧顱廬爐擄鹵虜賂祿驢鋁侶屢縷濾巒攣孿灤掄綸蘿鑼籮騾瑪麥瞞饅蠻貓錨鉚貿黴鎂錳謎覓緬廟閩銘畝鈉撓惱餒膩攆撚鳥聶齧鑷鎳檸獰擰濘膿瘧諾鷗毆嘔漚賠噴鵬飄蘋憑潑鋪樸譜臍訖扡釺謙鉗譴塹槍嗆薔鍬橋喬僑翹竅竊氫慶瓊軀齲顴鵲饒繞韌紉絨銳閏灑薩鰓傘騷澀紗篩曬陝贍繕賒懾嬸獅屍駛壽獸樞贖豎帥碩爍飼慫訟誦擻肅綏筍瑣獺撻癱灘譚歎湯燙縧謄銻屜廳烴塗頹蛻鴕馱橢窪襪彎頑韋濰葦僞緯紋甕撾蝸窩嗚鎢烏誣蕪塢霧錫銑蝦轄峽俠廈鍁纖鹹賢銜獻餡羨鑲嘯蠍挾攜諧瀉鋅釁洶鏽繡噓軒癬絢勳馴訓遜鴉閹煙鹽顔閻豔硯彥諺瘍瑤堯窯銥頤儀彜詣誼繹蔭銀飲纓瑩螢熒蠅喲傭癰踴詠憂鈾誘漁嶼籲禦淵轅緣鑰嶽粵悅鄖勻隕蘊醞暈韻贓棗竈賊贈紮劄軋鍘閘詐齋債氈盞斬輾嶄綻帳賬脹趙蟄轍鍺貞偵診鎮掙睜猙幀摯擲幟腫謅軸皺晝豬誅燭矚囑貯鑄駐磚樁妝錐墜綴諄濁漬蹤縱鄒詛鬱儻",
            o = function(e) {
                var t = "",
                o = "string" == typeof e ? e.length: 0,
                r = void 0;
                for (r = 0; r < o; r++) t += e.charCodeAt(r) > 1e4 && -1 != i.indexOf(e.charAt(r)) ? n.charAt(i.indexOf(e.charAt(r))) : e.charAt(r);
                return t
            },
            r = function(e) {
                var t = "",
                o = "string" == typeof e ? e.length: 0,
                r = void 0;
                for (r = 0; r < o; r++) t += e.charCodeAt(r) > 1e4 && -1 != n.indexOf(e.charAt(r)) ? i.charAt(n.indexOf(e.charAt(r))) : e.charAt(r);
                return t
            };
            return t.convert = function(e, t) {
                return "" == e || null == e ? "": t ? r(e) : o(e)
            },
            t.convertText = function(e, t) {
                void 0 === t && (t = !0),
                e = e ? e.childNodes: document.body.childNodes;
                for (var n = 0; n < e.length; n++) {
                    var i = e.item(n);
                    "||BR|HR|TEXTAREA|".indexOf("|" + i.tagName + "|") > 0 || ("" != i.title && null != i.title && (i.title = this.convert(i.title, t)), "" != i.alt && null != i.alt && (i.alt = this.convert(i.alt, t)), "" != i.placeholder && null != i.placeholder && (i.placeholder = this.convert(i.placeholder, t)), "INPUT" == i.tagName && "" != i.value && "text" != i.type && "hidden" != i.type && (i.value = this.convert(i.value, t)), 3 == i.nodeType ? "" != i.data && (i.data = this.convert(i.data, t)) : this.convertText(i, t))
                }
            },
            t.convertTextByLang = function(e) {
                e && ("zh-cn" === e ? this.convertText(document.documentElement, !1) : this.convertText(document.documentElement, !0))
            },
            new e
        } ()
    },
    144 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(208),
        g = (n.n(A), n(30)),
        l = n(12),
        c = n.n(l),
        C = n(5),
        I = n(23),
        h = n(2),
        u = n.n(h),
        d = n(52),
        p = n(14),
        f = n.n(p),
        m = n(100),
        v = n(27),
        y = n(22),
        b = n(102),
        _ = n.n(b),
        w = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        E = function(e) {
            function t(e) {
                i(this, t);
                var r = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return r.props = e,
                r.submitClickHandle = r.submitClickHandle.bind(r),
                r.userInit = C.k.bind(r),
                r.state = {
                    channel: n.i(C.a)("channel") || u.a.getItem("_channel") || g.i,
                    wltc: n.i(C.a)("wltc") || u.a.getItem("_wltc") || "",
                    schannel: n.i(C.a)("schannel") || "",
                    gameId: n.i(C.a)("gameId"),
                    quce_ext: n.i(C.a)("quce_ext"),
                    m_data: {},
                    m_timer: null,
                    name: "",
                    gender: 1
                },
                r
            }
            return r(t, e),
            w(t, [{
                key: "componentDidMount",
                value: function() {
                    var e = this;
                    this.setLang(),
                    window.addEventListener("load",
                    function() {
                        _.a.init(),
                        e.getInfo()
                    })
                }
            },
            {
                key: "componentWillMount",
                value: function() {
                    this.userInit()
                }
            },
            {
                key: "sendDa",
                value: function(e, t) {
                    c.a.ajax({
                        url: e,
                        data: t,
                        success: function() {},
                        error: function() {}
                    })
                }
            },
            {
                key: "getInfo",
                value: function() {
                    var e = u.a.getItem("_ma_id"),
                    t = this.state.channel,
                    n = g.e,
                    i = (new Date).getTime(),
                    o = navigator.userAgent,
                    r = {
                        ma_id: e,
                        channel: t,
                        pay_point: n,
                        useragent: o,
                        enterpagetime: i
                    };
                    this.sendDa(g.c.TRACK_INFO, r)
                }
            },
            {
                key: "getScan",
                value: function() {
                    var e = u.a.getItem("_ma_id"),
                    t = this.state.channel,
                    n = g.e,
                    i = (new Date).getTime(),
                    o = navigator.userAgent,
                    r = {
                        ma_id: e,
                        channel: t,
                        useragent: o,
                        pay_point: n,
                        leavepagetime: i
                    },
                    s = _.a.getData();
                    return Object.assign(r, s),
                    {
                        leavepagetime: i,
                        useragent: o,
                        catchTime: s
                    }
                }
            },
            {
                key: "setTipShowAndHide",
                value: function(e, t) {
                    var n = this.props.setIndexData;
                    t = t || 1500,
                    n({
                        tipFlag: !0,
                        tipText: e
                    }),
                    setTimeout(function() {
                        n({
                            tipFlag: !1,
                            tipText: ""
                        })
                    },
                    t)
                }
            },
            {
                key: "validateName",
                value: function() {
                    var e = this.state.name,
                    t = d.a(e),
                    n = d.e(e),
                    i = e.length <= 5,
                    o = t && n && i,
                    r = "";
                    return t ? n ? i || (r = "姓名长度不能超过5！") : r = "姓名必须为汉字！": r = "姓名不能为空！",
                    {
                        value: e,
                        flag: o,
                        tip: o ? "": r
                    }
                }
            },
            {
                key: "validateAll",
                value: function() {
                    var e = this.state,
                    t = (this.props.setIndexData, this.validateName()),
                    i = this.props.indexData,
                    o = i.datePickerBirthFormat,
                    r = i.datePickerTimeConfirm,
                    s = i.datePickerBirth,
                    a = -1 !== s.indexOf("公") ? 0 : 1,
                    A = this.getScan(),
                    l = 0;
                    if (!t.flag) return this.setTipShowAndHide(t.tip),
                    !1;
                    if (!o) return this.setTipShowAndHide("请选择出生日期"),
                    !1;
                    var c = u.a.getItem("_ma_id");
                    n.i(I.d)() && (l = 1);
                    var C = {
                        hour_mark: r,
                        username: t.value,
                        gender: e.gender,
                        birthday: o,
                        pay_point: g.e,
                        channel: e.channel,
                        phone_number: "",
                        send_sms: 0,
                        email: "",
                        ma_id: c,
                        version: 1,
                        isApp: l,
                        schannel: e.schannel,
                        is_lunar: a
                    };
                    e.wltc && (C.wltc = e.wltc);
                    var h = {
                        leavepagetime: A.leavepagetime,
                        useragent: A.useragent
                    };
                    return Object.assign(C, h, A.catchTime),
                    C
                }
            },
            {
                key: "submitClickHandle",
                value: function() {
                    var e = this,
                    i = this.state,
                    o = this.validateAll(),
                    r = i.channel,
                    s = (i.wltc, this.props),
                    a = s.indexData,
                    A = s.setIndexData;
                    if (a.canClick && o) {
                        A({
                            loadingFlag: !0,
                            loadingText: "大师解析中...",
                            canClick: !1
                        });
                        var l = this.state.quce_ext;
                        l && (o.quce_ext = l),
                        c.a.ajax({
                            url: g.c.REGISTER_ORDER,
                            type: "POST",
                            data: o,
                            success: function(s) {
                                if (1 === s.is_self_collection) {
                                    u.a.setItem("is_self_collection", s.is_self_collection, 1 / 0, "/");
                                    var l = encodeURIComponent(document.location.protocol + "//" + location.host + g.d.PAYMENT + "?order_id=" + s.order_id),
                                    c = "http://open.weixin.qq.com/connect/oauth2/authorize?appid=" + s.app_id + "&redirect_uri=" + l + "&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
                                    navigator.userAgent.match(/(iPhone\sOS\s|iPad.*OS\s)/) ? n.i(C.n)(c) : location.href = c
                                } else if (1 == s.is_xcx_new_model) wx.miniProgram.navigateTo({
                                    url: s.xcx_new_model_url
                                });
                                else if (1 == s.is_qucexcx_new_model) {
                                    var h = s.quce;
                                    h.orderId = s.order_id,
                                    window.parent.postMessage({
                                        quce_data: h
                                    },
                                    "*")
                                } else if ("swwnlzfa" == r || "swwnlzfb" == r) location.href = g.d.PAYMENT_WNL + "?order_id=" + s.order_id + "&pay_way=51wnl";
                                else {
                                    var d = s.order_id,
                                    p = {
                                        order_id: d,
                                        pay_point: g.e,
                                        pay_confirm_url: location.origin + g.d.USER_PAY_CONFIRM,
                                        server_id: g.l
                                    },
                                    f = n.i(C.l)(g.d.PAYMENT, "order_id", d) + "&channel=" + i.channel,
                                    m = {
                                        uaMarks: g.g,
                                        version: g.h
                                    },
                                    v = n.i(I.e)(g.o, o, d, g.f);
                                    n.i(I.f)(v),
                                    n.i(I.c)(p, f, m)
                                }
                                if (s.order_id) try {
                                    t.saveOrderIdToLocalStorage(s.order_id);
                                    var y = {
                                        user: o.username,
                                        gender: o.gender,
                                        birthday: o.birthday,
                                        hour_mark: o.hour_mark,
                                        datePickerBirth: a.datePickerBirth,
                                        is_lunar: o.is_lunar
                                    };
                                    n.i(C.m)(s.order_id, y)
                                } catch(e) {
                                    console && console.warn(e)
                                }
                                s.msg && e.setTipShowAndHide(s.msg),
                                A({
                                    loadingFlag: !1,
                                    loadingText: "",
                                    canClick: !0
                                })
                            },
                        }),
                        this.getScan()
                    }
                }
            },
            {
                key: "goToPay",
                value: function(e, t) {
                    var n = this.props.setIndexData;
                    c.a.ajax({
                        url: g.c.PAY_WECHAT,
                        type: "GET",
                        data: {
                            channel: t,
                            order_id: e,
                            pay_type: "wechat"
                        },
                        success: function(e) {
                            e.pay_url && (location.href = e.pay_url),
                            n({
                                loadingFlag: !1,
                                loadingText: "",
                                canClick: !0
                            })
                        },
                        error: function(e) {
                            console && console.error(e)
                        }
                    })
                }
            },
            {
                key: "setLang",
                value: function() {
                    var e = this.props.indexData.lang;
                    f.a.convertTextByLang(e)
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = this.state,
                    i = this.props,
                    o = i.setIndexData,
                    r = i.indexData,
                    s = i.introColor,
                    A = i.introSpanColor,
                    g = i.queryColor,
                    l = {
                        backgroundColor: i.btnBgColor || "#f9b51f",
                        color: i.textColor || "#ac0910",
                        boxShadow: i.boxShadow || "0 5px 0 0 #ca8c05",
                        borderRadius: i.borderRadius || "0.32rem"
                    },
                    c = this.changeQueryUrl();
                    return a.a.createElement("section", null, a.a.createElement("div", {
                        className: "yh-form-box"
                    },
                    a.a.createElement("ul", null, a.a.createElement("li", {
                        className: "clear"
                    },
                    a.a.createElement("div", {
                        className: "left"
                    },
                    "您的姓名"), a.a.createElement("div", {
                        className: "auto"
                    },
                    a.a.createElement("input", {
                        "data-type": "familyname",
                        type: "text",
                        value: t.name,
                        onChange: function(t) {
                            var i = n.i(C.h)(t.target.value);
                            e.setState({
                                name: i
                            })
                        },
                        placeholder: "请输入姓名（必须汉字）"
                    }))), a.a.createElement("li", {
                        className: "clear"
                    },
                    a.a.createElement("div", {
                        className: "left"
                    },
                    "您的性别"), a.a.createElement("div", {
                        className: "sex",
                        onChange: function(t) {
                            var n = t.target.value;
                            e.setState({
                                gender: n
                            })
                        }
                    },
                    a.a.createElement("input", {
                        type: "radio",
                        name: "gender",
                        value: "1",
                        id: "man",
                        defaultChecked: !0
                    }), a.a.createElement("span", {
                        className: 1 == t.gender ? "checked gdm": "gdm"
                    },
                    a.a.createElement("label", {
                        htmlFor: "man"
                    },
                    "男")), a.a.createElement("input", {
                        type: "radio",
                        name: "gender",
                        value: "0",
                        id: "girl"
                    }), a.a.createElement("span", {
                        className: 0 == t.gender ? "checked": ""
                    },
                    a.a.createElement("label", {
                        htmlFor: "girl"
                    },
                    "女")))), a.a.createElement("li", {
                        className: "clear cale"
                    },
                    a.a.createElement("div", {
                        className: "left"
                    },
                    "出生日期"), a.a.createElement("div", {
                        className: "auto"
                    },
                    a.a.createElement("input", {
                        type: "text",
                        value: r.datePickerBirth,
                        onClick: function() {
                            o({
                                datePickerDisplay: 1
                            })
                        },
                        onFocus: function(e) {
                            e.target.blur()
                        },
                        name: "date",
                        readOnly: "readonly",
                        placeholder: "请选择出生日期"
                    })))), a.a.createElement("div", {
                        className: "submit"
                    },
                    a.a.createElement("p", {
                        className: "intro",
                        style: {
                            color: s
                        }
                    },
                    "已为", a.a.createElement("span", {
                        style: {
                            color: A
                        }
                    },
                    "85697412"), "人查看2018八字命格详批"), a.a.createElement("div", {
                        onClick: this.submitClickHandle,
                        ref: function(t) {
                            return e.btn = t
                        },
                        className: "btn",
                        style: l
                    },
                    a.a.createElement("p", null, "立即测算")), a.a.createElement("a", {
                        style: {
                            color: g
                        },
                        href: c
                    },
                    "查看历史订单>"))), a.a.createElement(m.a, {
                        year: "1990",
                        month: "01",
                        day: "01",
                        startYear: "1910",
                        data: r,
                        setState: o
                    }), r.tipFlag && a.a.createElement(y.a, {
                        text: r.tipText,
                        gameId: t.gameId,
                        sNode: this.btn
                    }), r.loadingFlag && a.a.createElement(v.a, {
                        text: r.loadingText
                    }))
                }
            }], [{
                key: "saveOrderIdToLocalStorage",
                value: function(e) {
                    if (localStorage) {
                        var t = localStorage.getItem(g.k);
                        t = t ? t.split(",") : [],
                        t.push(e),
                        localStorage.setItem(g.k, t.join(","))
                    }
                }
            }]),
            t
        } (s.Component),
        T = E;
        t.a = T; !
    },
    174 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".analysis table {\n  width: 100%;\n}\n.analysis table td {\n  width: 12.5%;\n  vertical-align: middle;\n  text-align: center;\n}\n.analysis table .bg_color {\n  width: 1.86667rem;\n  -webkit-border-radius: 0.21333rem;\n          border-radius: 0.21333rem;\n  display: inline-block;\n}\n.analysis table .bg_img {\n  padding: 1.06667rem 0;\n  background: url('//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_analysis_box_bg.png?version=0047637588073403236') no-repeat center;\n  background-size: 100% 100%;\n}\n.analysis table span {\n  display: inline-block;\n  font-size: 0.8rem;\n  color: #fff;\n  width: 0.85333rem;\n}\n.analysis .text_list2 li {\n  width: 12.5%;\n  float: left;\n  font-size: 0.8rem;\n  color: #7f170f;\n  text-align: center;\n  padding: 0.53333rem 0 0.26667rem;\n}\n.analysis .text_list3 li {\n  text-align: center;\n  width: 12.5%;\n  float: left;\n  font-size: 0.69333rem;\n  color: #666666;\n}\n.analysis .text_list3 span {\n  display: inline-block;\n  width: 0.69333rem;\n}\n.ana_banner {\n  text-align: center;\n}\n.ana_banner img {\n  width: 15.41333rem;\n}\n.ana_item {\n  margin-top: 1.12rem;\n  padding: 0 0.66667rem;\n}\n.ana_item li {\n  padding: 0.4rem 0;\n}\n.ana_item li:not(:last-child) {\n  border-bottom: 1px solid #dcdcdc;\n  /*no*/\n}\n.ana_item .left {\n  margin-right: 0.53333rem;\n  width: 1.86667rem;\n}\n.ana_item .ana_des {\n  overflow: hidden;\n}\n.ana_item dl:last-child {\n  margin-top: 0.26667rem;\n}\n.ana_item dt {\n  display: inline-block;\n  font-size: 0.69333rem;\n  color: #fff;\n  height: 0.96rem;\n  line-height: 0.96rem;\n  padding: 0 0.32rem;\n  margin-bottom: 5px;\n}\n.ana_item dd {\n  font-size: 0.64rem;\n  color: #684f16;\n  line-height: 0.90667rem;\n}\n", ""])
    },
    175 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".confused {\n  font-size: 0;\n  text-align: center;\n}\n.confused li {\n  display: inline-block;\n  width: 44.64%;\n  padding-bottom: 0.66667rem;\n}\n.confused li:nth-child(2n + 1) {\n  margin-right: 0.53333rem;\n}\n.confused .con-type {\n  -webkit-border-radius: 5px;\n          border-radius: 5px;\n  overflow: hidden;\n  font-size: 0.69333rem;\n  border: 1px solid #c5414c;\n  /*no*/\n}\n.confused .con-type p {\n  line-height: 1.46667rem;\n  color: #fff;\n  background-color: #c5414c;\n}\n.confused .con-des {\n  margin-top: 0.21333rem;\n  font-size: 0.58667rem;\n  color: #391609;\n  line-height: 0.8rem;\n}\n.confused .con-des span {\n  color: #c5414c;\n}\n.bzzh img {\n  margin-top: 0.64rem;\n  width: 18.32rem;\n}\n", ""])
    },
    176 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".ryan-datepicker-v3 {\n  font-size: 0.8rem;\n  position: fixed;\n  left: 0;\n  top: 0;\n  right: 0;\n  bottom: 0;\n  z-index: 8888;\n  color: #282828;\n}\n.ryan-datepicker-v3 .rdp-back {\n  position: absolute;\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  z-index: 9999;\n  background: #000;\n  cursor: pointer;\n  opacity: .5;\n}\n.ryan-datepicker-v3 .rdp-front {\n  line-height: 2.5rem;\n  position: absolute;\n  bottom: 0;\n  left: 0;\n  right: 0;\n  background-color: #fff;\n  z-index: 10000;\n  color: #bbb;\n}\n.ryan-datepicker-v3 .rdp-nav {\n  overflow: hidden;\n  border-top: 1px solid #eee;\n  /*no*/\n  border-bottom: 1px solid #eee;\n  /*no*/\n}\n.ryan-datepicker-v3 .rdp-nav .rdp-left {\n  float: left;\n  width: 20%;\n  text-align: center;\n  cursor: pointer;\n  color: #999;\n}\n.ryan-datepicker-v3 .rdp-nav .rdp-right {\n  float: right;\n  width: 20%;\n  text-align: center;\n  cursor: pointer;\n  color: #c91723;\n}\n.ryan-datepicker-v3 .rdp-nav .rdp-auto {\n  overflow: hidden;\n}\n.ryan-datepicker-v3 .rdp-switch {\n  width: 66.66%;\n  margin: 0.25rem auto;\n  border: 1px solid #c91723;\n  /*no*/\n  -webkit-border-radius: 5px;\n          border-radius: 5px;\n  overflow: hidden;\n  line-height: 2rem;\n}\n.ryan-datepicker-v3 .rdp-switch span {\n  display: inline-block;\n  vertical-align: top;\n  width: 50%;\n  text-align: center;\n  -webkit-box-sizing: border-box;\n     -moz-box-sizing: border-box;\n          box-sizing: border-box;\n  cursor: pointer;\n  color: #c91723;\n}\n.ryan-datepicker-v3 .rdp-switch .rdp-mode-active {\n  color: #fff;\n  background-color: #c91723;\n}\n.ryan-datepicker-v3 .rdp-body {\n  position: relative;\n}\n.ryan-datepicker-v3 .rdp-layer-top {\n  position: absolute;\n  height: 0 /*no*/;\n  border-top: 2px solid #c91723;\n  /*no*/\n  -webkit-box-shadow: 0 0 .25rem #c91723;\n          box-shadow: 0 0 .25rem #c91723;\n  opacity: .3;\n  top: 5rem;\n  left: 0;\n  right: 0;\n  z-index: 0;\n}\n.ryan-datepicker-v3 .rdp-layer-bottom {\n  position: absolute;\n  height: 0 /*no*/;\n  border-top: 2px solid #c91723;\n  /*no*/\n  -webkit-box-shadow: 0 0 .25rem #c91723;\n          box-shadow: 0 0 .25rem #c91723;\n  opacity: .3;\n  top: 7.5rem;\n  left: 0;\n  right: 0;\n  z-index: 0;\n}\n.ryan-datepicker-v3 .rdp-container {\n  background-color: transparent;\n  z-index: 1;\n}\n.ryan-datepicker-v3 .rdp-container > li {\n  display: inline-block;\n  vertical-align: top;\n  width: 20%;\n  -webkit-box-sizing: border-box;\n     -moz-box-sizing: border-box;\n          box-sizing: border-box;\n  text-align: center;\n  height: 12.5rem;\n  overflow: hidden;\n  cursor: default;\n  background-color: transparent;\n}\n.ryan-datepicker-v3 .rdp-container > li.w40 {\n  width: 40%;\n  font-size: 0.64rem;\n}\n.ryan-datepicker-v3 .rdp-item {\n  display: block;\n  background-color: transparent;\n}\n.ryan-datepicker-v3 .rdp-item > li {\n  display: block;\n  line-height: 2.5rem;\n  background-color: transparent;\n}\n.ryan-datepicker-v3 .rdp-item > .prevent {\n  color: #eee;\n}\n.ryan-datepicker-v3 .rdp-item > .current {\n  color: #333;\n  font-weight: bold;\n}\nbody.rdp-open {\n  position: fixed;\n  width: 100%;\n}\n.yh-form-box {\n  margin: 0.4rem 0.32rem 0;\n}\n.yh-form-box ul {\n  background-color: #fff;\n  border: 1px solid #eed0aa;\n  /*no*/\n  -webkit-border-radius: 0.21333rem;\n          border-radius: 0.21333rem;\n}\n.yh-form-box li {\n  font-size: 0.74667rem;\n  border-bottom: 1px solid #e6dac6;\n  /*no*/\n}\n.yh-form-box li:last-child {\n  border-bottom: none;\n}\n.yh-form-box li .left {\n  width: 4.13333rem;\n  text-align: center;\n  color: #6f0011;\n  height: 1.86667rem;\n  line-height: 1.86667rem;\n}\n.yh-form-box li input {\n  border: none;\n  outline: none;\n  width: 96%;\n}\n.yh-form-box li .auto {\n  color: #666666;\n  height: 1.86667rem;\n  line-height: 1.86667rem;\n}\n.yh-form-box li .sex {\n  overflow: hidden;\n  line-height: 1.86667rem;\n}\n.yh-form-box li .sex input {\n  display: none;\n}\n.yh-form-box li .sex .gdm {\n  margin-right: 0.66667rem;\n}\n.yh-form-box li .sex span {\n  display: inline-block;\n  width: 1.38667rem;\n  height: 1.38667rem;\n  -webkit-border-radius: 50%;\n          border-radius: 50%;\n  border: 1px solid #eedbcb;\n  /*no*/\n  background-color: #fffbf2;\n  text-align: center;\n  color: #666;\n  line-height: 1.38667rem;\n}\n.yh-form-box li .sex span.checked {\n  color: #fff;\n  background-color: #9d2e41;\n}\n.yh-form-box .cale {\n  background: url('//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/cale_icon.png') 96% center no-repeat;\n  background-size: 0.69333rem;\n}\n.yh-form-box .cale input {\n  width: 88%;\n}\n.yh-form-box .submit {\n  font-size: 0.74667rem;\n  text-align: center;\n}\n.yh-form-box .submit .intro {\n  color: #fff;\n  line-height: 1.92rem;\n  padding-top: 0.21333rem;\n}\n.yh-form-box .submit .intro span {\n  color: #f9ed87;\n}\n.yh-form-box .submit .btn {\n  cursor: pointer;\n  background-color: #f9b51f;\n  color: #ac0910;\n  font-size: 0.85333rem;\n  font-weight: bold;\n  height: 2.08rem;\n  line-height: 2.02667rem;\n  text-align: center;\n  -webkit-border-radius: 0.32rem;\n          border-radius: 0.32rem;\n  -webkit-box-shadow: 0 5px 0 0 #ca8c05;\n          box-shadow: 0 5px 0 0 #ca8c05;\n}\n.yh-form-box .submit a {\n  margin-top: 0.8rem;\n  display: inline-block;\n  color: #f9ed87;\n  text-decoration: underline;\n}\n", ""])
    },
    177 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".introTeacher {\n  position: relative;\n  margin: 0.42667rem 0.32rem 0;\n}\n.introTeacher .intro {\n  position: absolute;\n  font-size: 0.69333rem;\n  color: #391609;\n  line-height: 0.96rem;\n  top: 50%;\n  -webkit-transform: translate(0, -50%);\n      -ms-transform: translate(0, -50%);\n          transform: translate(0, -50%);\n  width: 10.93333rem;\n  right: 0.58667rem;\n  text-align: justify;\n}\n@media (min-width: 1024px) {\n  .introTeacher .intro {\n    font-size: 0.85333rem;\n    width: 16.8rem;\n    line-height: 1.17333rem;\n  }\n}\n@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {\n  .introTeacher .intro {\n    width: 10.93333rem;\n    font-size: 0.69333rem;\n    line-height: 0.96rem;\n  }\n}\n.introTeacher p {\n  text-indent: 2em;\n}\n.introTeacher span {\n  color: #910017;\n}\n", ""])
    },
    178 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".adva .adva-list {\n  margin-top: 0.53333rem;\n  padding-left: 0.53333rem;\n}\n.adva p {\n  text-align: left;\n  font-size: 0.64rem;\n  color: #666;\n  line-height: 1.2rem;\n}\n.adva li {\n  text-align: center;\n}\n.adva li .all-master {\n  margin: 1.06667rem 1.06667rem 0;\n}\n.adva li:nth-child(3) img {\n  margin-top: 0.21333rem;\n  width: 9.84rem;\n}\n.adva li:not(:first-child) {\n  margin-top: 0.53333rem;\n}\n", ""])
    },
    179 : function(e, t, n) {
        t = e.exports = n(3)(),
        t.push([e.i, ".com_hot_box_list .hot_tit {\n  height: 2.13333rem;\n  line-height: 2.13333rem;\n  text-align: center;\n  font-size: 0.96rem;\n  color: #fff;\n  margin-bottom: 1.76rem;\n}\n.com_hot_box_list li {\n  width: 25%;\n  float: left;\n}\n.com_hot_box_list li a {\n  display: block;\n  width: 3.2rem;\n  font-size: 0.69333rem;\n  color: #333;\n  margin: 0 auto;\n}\n.com_hot_box_list li p {\n  text-align: center;\n  padding: 0.69333rem 0 1.01333rem;\n}\n", ""])
    },
    2 : function(e, t) {
        var n = {
            getItem: function(e) {
                return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(e).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null
            },
            setItem: function(e, t, n, i, o, r) {
                if (!e || /^(?:expires|max\-age|path|domain|secure)$/i.test(e)) return ! 1;
                var s = "";
                if (n) switch (n.constructor) {
                case Number:
                    s = n === 1 / 0 ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT": "; max-age=" + n;
                    break;
                case String:
                    s = "; expires=" + n;
                    break;
                case Date:
                    s = "; expires=" + n.toUTCString()
                }
                return document.cookie = encodeURIComponent(e) + "=" + encodeURIComponent(t) + s + (o ? "; domain=" + o: "") + (i ? "; path=" + i: "") + (r ? "; secure": ""),
                !0
            },
            removeItem: function(e, t, n) {
                return ! (!e || !this.hasItem(e)) && (document.cookie = encodeURIComponent(e) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (n ? "; domain=" + n: "") + (t ? "; path=" + t: ""), !0)
            },
            hasItem: function(e) {
                return new RegExp("(?:^|;\\s*)" + encodeURIComponent(e).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=").test(document.cookie)
            },
            keys: function() {
                for (var e = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/), t = 0; t < e.length; t++) e[t] = decodeURIComponent(e[t]);
                return e
            }
        };
        e.exports = n; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && __REACT_HOT_LOADER__.register(n, "cookie", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/commonCookie.js")
        } ()
    },
    206 : function(e, t, n) {
        var i = n(174);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    207 : function(e, t, n) {
        var i = n(175);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    208 : function(e, t, n) {
        var i = n(176);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    209 : function(e, t, n) {
        var i = n(178);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    210 : function(e, t, n) {
        var i = n(179);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
        "use strict";
        function i(e, t) {
            mmc.ready(function() {
                if (u(e.methodVersion)) {
                    var n = mmc.client.getLastUserInfo();
                    t(n)
                }
            })
        }
        function o(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {
                uaMarks: ["linghit"],
                version: 200
            };
            c(n.uaMarks) && I(n.version) && mmc.ready(function() {
                var n = mmc.client.mmcOnlineGetUserInfo(e);
                t(n)
            })
        }
        function r(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {
                uaMarks: ["linghit"],
                version: 200
            };
            c(t.uaMarks) && I(t.version) && mmc.client.mmcOnlineUserInfo(e)
        }
        function s(e) {
            try {
                mmc.ready(function() {
                    var t = mmc.user.info;
                    "function" == typeof e && e(t)
                })
            } catch(e) {
                console && console.warn(e)
            }
        }
        function a(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {
                uaMarks: ["linghit"],
                version: 100
            };
            c(n.uaMarks) && I(n.version) ? (location.href = e.pay_confirm_url + "?order_id=" + e.order_id + "&pay_point=" + e.pay_point, mmc.client.mmcOnlinePay(e)) : location.href = t
        }
        function A(e, t, n) {
            var i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {
                uaMarks: ["linghit"],
                version: 100
            };
            c(i.uaMarks) && I(i.version) ? (location.href = e.pay_confirm_url + "?order_id=" + e.order_id + "&pay_point=" + e.pay_point + "&mmc_devicesn=" + t, mmc.client.mmcOnlinePay(e)) : location.href = n
        }
        function g() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {
                uaMarks: ["linghit"],
                version: 100
            };
            return c(e.uaMarks) && I(e.version)
        }
        function l() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {
                uaMarks: ["linghit"],
                version: 200
            };
            return c(e.uaMarks) && I(e.version)
        }
        function c(e) {
            var t = navigator.userAgent;
            return e = e || ["linghit"],
            e.some(function(e) {
                return new RegExp(e, "i").test(t)
            })
        }
        function C() {
            var e = navigator.userAgent,
            t = e.match(/{[^}]+}/g),
            n = {};
            return t && t.length > 0 && t.forEach(function(e) {
                var t = e.replace(/{|}/g, "").split("/");
                n[t[0]] = t[1]
            }),
            n
        }
        function I(e) {
            var t = C(),
            n = t.p;
            return e = e || 100,
            !!n && n >= e
        }
        function h() {
            var e = C(),
            t = e.lang || "";
            return /^(0|1)$/.test(t) ? {
                flag: !0,
                lang: t
            }: {
                flag: !1,
                lang: null
            }
        }
        function u(e) {
            var t = C(),
            n = t.zxcs_method || "";
            return e = e || 100,
            !!n && n >= e
        }
        function d() {
            if (c()) {
                return 1 == h().lang
            }
            return ! 1
        }
        function p(e) {
            var t = e.substring(0, 4),
            n = e.substring(4, 6),
            i = e.substring(6, 8),
            o = e.substring(8, 10);
            return e = Date.parse(t + "/" + n + "/" + i + " " + o + ":00:00") / 1e3,
            {
                birth: e,
                hour: o
            }
        }
        function f(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "",
            i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "";
            return {
                0 : {
                    userType: "0",
                    name: t.username || t.name,
                    birthday: p(t.birthday || "1991010100").birth,
                    isUnHour: "-1" == p(t.birthday || "1991010100").hour ? "1": "0",
                    gender: t.gender + "",
                    email: t.email,
                    orderId: n,
                    cesuanName: t.pay_point
                },
                1 : {
                    userType: "1",
                    maleName: t.man_name,
                    maleBirthday: p(t.man_bir || "1991010100").birth,
                    maleIsUnHour: "-1" == p(t.man_bir || "1991010100").hour ? "1": "0",
                    femaleName: t.woman_name,
                    femaleBirthday: p(t.woman_bir || "1991010100").birth,
                    femaleIsUnHour: "-1" == p(t.woman_bir || "1991010100").hour ? "1": "0",
                    email: t.email,
                    orderId: n,
                    cesuanName: t.pay_point
                },
                2 : {},
                3 : {
                    userType: "3",
                    orderId: n,
                    email: t.email,
                    cesuanName: t.pay_point,
                    cesuanType: i
                }
            } [e]
        }
        function m(e) {
            var t = ["子时", "丑时", "丑时", "寅时", "寅时", "卯时", "卯时", "辰时", "辰时", "巳时", "巳时", "午时", "午时", "未时", "未时", "申时", "申时", "酉时", "酉时", "戌时", "戌时", "亥时", "亥时", "子时"];
            e = new Date(1e3 * e);
            var n = e.getFullYear(),
            i = parseInt(e.getMonth() + 1),
            o = parseInt(e.getDate()),
            r = parseInt(e.getHours()),
            s = i < 10 ? "0" + i: i,
            a = o < 10 ? "0" + o: o,
            A = r < 10 ? "0" + r: r,
            g = t[r];
            return {
                datePickerBirth: "公(阳)历 " + n + "年" + s + "月" + a + "日 " + g,
                datePickerBirthFormat: "" + n + s + a + A,
                birthTimeValue: g,
                birthTimeDataValue: r,
                birthTimeDataId: r + 1
            }
        }
        function v(e) {
            c() && mmc.client.qimingDashiMsg(e)
        }
        t.f = r,
        t.c = a,
        t.d = g,
        t.a = c,
        t.b = h,
        t.e = f;
        n(5); !
        function(e) {
            e.mmc = function() {
                var t = {
                    v: "1.0.0-dev",
                    json: {
                        encode: function(e) {
                            return "" == e ? {}: JSON.stringify(e).replace(/"/g, "'")
                        },
                        decode: function(e) {
                            return "" == e ? "{}": JSON.parse(e.replace(/\'/gi, '"'))
                        }
                    },
                    debug: !1,
                    user: {
                        info: {},
                        getInfo: function() {
                            return this.info
                        },
                        getId: function() {
                            return this.getInfo().userid
                        },
                        getUsername: function() {
                            return this.getInfo().username
                        },
                        getNickname: function() {
                            return this.getInfo().nickname
                        },
                        getCountry: function() {
                            return this.getInfo().country
                        },
                        getEmail: function() {
                            return this.getInfo().email
                        },
                        getAvatar: function() {
                            return this.getInfo().avatar
                        },
                        isMarry: function() {
                            return 1 == this.getInfo().marriagestatus
                        },
                        getPhone: function() {
                            return this.getInfo().mobilephone
                        },
                        getScore: function() {
                            return this.getInfo().score
                        },
                        isMan: function() {
                            return 1 == this.getInfo().sex
                        },
                        getGender: function() {
                            return this.getInfo().sex
                        },
                        getWork: function() {
                            return this.getInfo().workstatus
                        },
                        getBirthday: function() {
                            return this.getInfo().birthday
                        },
                        login: function(n) {
                            return t.client.isAndroid() ? e.lingjiWebApp.MMCLogin(null == n ? "": n) : MMCLogin(n)
                        },
                        register: function(n) {
                            return t.client.isAndroid() ? e.lingjiWebApp.MMCRegist(null == n ? "": n) : MMCRegist(n)
                        },
                        isLogin: function() {
                            return void 0 !== this.getInfo().userid
                        }
                    },
                    client: {
                        info: {},
                        ua: e.navigator.userAgent.toLowerCase(),
                        is: function(e) {
                            return new RegExp(e).test(this.ua)
                        },
                        isIOS: function() {
                            return "android" != this.ua.match(/android/i)
                        },
                        isAndroid: function() {
                            return "android" == this.ua.match(/android/i)
                        },
                        getInfo: function() {
                            return this.info
                        },
                        getLanguage: function() {
                            return this.getInfo().language
                        },
                        getCountry: function() {
                            return this.getInfo().area
                        },
                        getName: function() {
                            return client.info.module
                        },
                        getAppId: function() {
                            return this.getInfo().pluginid
                        },
                        getUDID: function() {
                            return this.getInfo().udid
                        },
                        getDeviceId: function() {
                            return this.getInfo().deviceid
                        },
                        getSystemVersion: function() {
                            return this.getInfo().systemversion
                        },
                        getPlatform: function() {
                            return this.getInfo().platform
                        },
                        notify: function(e, n) {
                            return t.client.isAndroid() ? lingjiWebApp.MMCLocalNotification(t.json.encode(e), null == n ? "": n) : MMCLocalNotification(e, null == n ? "": n)
                        },
                        goto: function(e, n, i, o) {
                            var r = {
                                controller: e,
                                extraType: i || 0,
                                extraParams: n,
                                gotoParams: n,
                                gotoType: i || 0
                            };
                            return t.client.isAndroid() ? lingjiWebApp.MMCGoto(t.json.encode(r), null == o ? "": o) : (console.log(r), MMCGoto(r, o))
                        },
                        share: function(e, n) {
                            var i = {
                                thumb: e.icon,
                                title: e.title,
                                description: e.desc,
                                shareLink: e.link
                            };
                            return t.client.isAndroid() ? lingjiWebApp.MMCShare(t.json.encode(i), null == n ? "": n) : MMCShare(i, n)
                        },
                        getLastUserInfo: function() {
                            return t.client.isAndroid() ? lingjiWebApp.getLastUserInfoFromApp() : t.client.isIOS() ? getLastUserInfoFromApp() : void 0
                        },
                        mmcOnlinePay: function(e) {
                            t.client.isAndroid() ? (e = JSON.stringify(e).replace(/"/g, "'"), lingjiWebApp.MMCOnlinePay(e, "")) : t.client.isIOS() && MMCOnlinePay(e)
                        },
                        mmcOnlineGetUserInfo: function(e) {
                            return t.client.isAndroid() ? lingjiWebApp.MMCOnlineGetUserInfo(t.json.encode(e)) : t.client.isIOS() ? MMCOnlineGetUserInfo(e) : void 0
                        },
                        mmcOnlineUserInfo: function(e) {
                            t.client.isAndroid() ? lingjiWebApp.MMCOnlineUserInfo(t.json.encode(e)) : t.client.isIOS() && MMCOnlineUserInfo(e)
                        },
                        comment: function() {
                            return t.client.isAndroid() ? lingjiWebApp.MMCComment() : MMCComment()
                        },
                        daily: function(e) {
                            return t.client.isAndroid() ? lingjiWebApp.MMCDailySign(t.json.encode(e)) : MMCDailySign(e)
                        },
                        openWindow: function(e, t, n) {
                            var i = {
                                gotourl: t,
                                title: e
                            };
                            MMCOpenWindow(i, n)
                        },
                        qimingDashiMsg: function(e) {
                            t.client.isAndroid() ? lingjiWebApp.QimingDashiMsg(t.json.encode(e)) : t.client.isIOS() && QimingDashiMsg(e)
                        },
                        QimingAskForWechat: function(e) {
                            t.client.isAndroid() ? lingjiWebApp.QimingAskForWechat(e) : t.client.isIOS()
                        },
                        QimingShowPaidTipsDialog: function() {
                            t.client.isAndroid() ? lingjiWebApp.QimingShowPaidTipsDialog() : t.client.isIOS()
                        }
                    },
                    alertDebug: function(e) {
                        1 == this.debug && alert(e.join(" # "))
                    },
                    ready_callback: []
                };
                return t.init = function() {
                    try {
                        this.client.isAndroid() ? this.user.info = this.json.decode(lingjiWebApp.getUserInfoOnLine()) : this.user.info = getUserInfoOnLine()
                    } catch(e) {
                        console && console.warn(e)
                    }
                    this.ready_callback.forEach(function(e, t) {
                        e()
                    })
                },
                t.ready = function(e) {
                    this.ready_callback.push(e)
                },
                t
            } (),
            e.MMCReady = function() {
                mmc.init()
            }
        } (window); !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(i, "getLastUserInfoFromNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(o, "getAppInfoFromNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(r, "sendUserInfoToNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(s, "getUserInfoFromNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(a, "paymentToUseNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(A, "paymentToUseNativeDSFW", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(g, "hideHeaderAndFooterForNativePay", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(l, "hideUserListFromNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(c, "whetherInOurNativeApp", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(C, "getQueryFromUA", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(I, "payVersionValidate", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(h, "pageLangValidate", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(u, "forecastMethodValidate", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(d, "hidePriceWhenPageInVersionOfGm", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(p, "transferBirthToTimestamp", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(f, "dealOrderDataForNative", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(m, "transferTimestampToBirth", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"), __REACT_HOT_LOADER__.register(v, "qiMingDaShiMsg", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/CommonClientJsSDK.js"))
        } ()
    },
    26 : function(e, t) { !
        function() {
            var e = function() {
                var e = document.documentElement.clientWidth,
                t = (window.devicePixelRatio, 16 * e / 320);
                document.documentElement.style.fontSize = t + "px",
                document.querySelector('meta[name="viewport"]').setAttribute("content", "width=device-width,initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover")
            }; !
            function() {
                var t = navigator.userAgent;
                /android/i.test(t) || /ipad|itouch|iphone/i.test(t) || /tianqi/i.test(t) ? e() : (document.documentElement.style.fontSize = "24px", document.getElementById("container").style.maxWidth = "30rem", document.getElementById("container").style.minWidth = "22rem")
            } ()
        } ()
    },
    27 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(2),
        g = n.n(A),
        l = n(14),
        c = n.n(l),
        C = n(5),
        I = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        h = function(e) {
            function t() {
                i(this, t);
                var e = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return e.state = {
                    lang: n.i(C.a)("lang") || g.a.getItem("_lang")
                },
                e
            }
            return r(t, e),
            I(t, [{
                key: "componentWillUnmount",
                value: function() {
                    "fixed" == document.body.style.position && (document.body.style.position = "")
                }
            },
            {
                key: "componentDidMount",
                value: function() {
                    this.setLang()
                }
            },
            {
                key: "componentDidUpdate",
                value: function() {
                    this.setLang()
                }
            },
            {
                key: "setLang",
                value: function() {
                    var e = this.state.lang;
                    e = e || g.a.getItem("_lang"),
                    c.a.convertTextByLang(e),
                    g.a.setItem("_lang", e, 86400, "/")
                }
            },
            {
                key: "render",
                value: function() {
                    return a.a.createElement("div", {
                        className: "common-loading-layer"
                    },
                    a.a.createElement("div", {
                        className: "back"
                    }), a.a.createElement("div", {
                        className: "front"
                    },
                    a.a.createElement("div", {
                        className: "img"
                    },
                    a.a.createElement("img", {
                        src: "//zxcs.ggwan.com/forecastimages/loading.gif",
                        alt: "loading"
                    })), a.a.createElement("div", {
                        className: "text"
                    },
                    a.a.createElement("span", null, this.props.text || "正在努力加载中..."))))
                }
            }]),
            t
        } (s.Component),
        u = h;
        t.a = u; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(h, "CommonLoadingLayer", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonLoadingLayer.jsx"), __REACT_HOT_LOADER__.register(u, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonLoadingLayer.jsx"))
        } ()
    },
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        function s(e) {
            return {
                indexData: e.indexData
            }
        }
        function a(e) {
            return {
                actions: n.i(l.b)(C, e)
            }
        }
        var A = n(1),
        g = n.n(A),
        l = n(28),
        c = n(51),
        C = n(95),
        I = n(698),
        h = (n.n(I), n(12)),
        u = n.n(h),
        d = n(2),
        p = n.n(d),
        f = n(14),
        m = n.n(f),
        v = n(5),
        y = n(85),
        b = n(23),
        _ = n(30),
        w = n(46),
        E = n(45),
        T = n(363),
        j = n(27),
        x = n(22),
        k = n(98),
        S = n(99),
        D = n(144),
        B = n(323),
        O = n(143),
        R = n(325),
        M = n(146),
        P = n(324),
        F = n(147),
        L = n(362),
        N = n(97),
        H = n(145),
        z = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        Y = function(e) {
            function t(e) {
                i(this, t);
                var r = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return r.pageConfig = new E.a(r, p.a.getItem("_channel")),
                r.props = e,
                r.fixedBtnDisplayFlag = !1,
                r.state = {
                    lang: n.i(v.a)("lang") || p.a.getItem("_lang") || _.a,
                    channel: n.i(v.a)("channel") || p.a.getItem("_channel") || _.i,
                    schannel: n.i(v.a)("schannel") || "",
                    lap: n.i(v.a)("lap") || p.a.getItem("_lap") || _.b,
                    sem: n.i(v.a)("sem") || p.a.getItem("_sem") || _.j,
                    gameId: n.i(v.a)("gameId"),
                    _mac: n.i(v.a)("MAC"),
                    _idfa: n.i(v.a)("IDFA"),
                    _udid: n.i(v.a)("OPENUDID"),
                    _imei: n.i(v.a)("IMEI"),
                    height: 0,
                    width: "",
                    m_data: {},
                    m_timer: null,
                    loadingFlag: !1,
                    loadingText: "",
                    tipFlag: !1,
                    tipText: "",
                    comment: [],
                    pageConfig: E.a.getDefaultData()
                },
                r
            }
            return r(t, e),
            z(t, [{
                key: "componentWillMount",
                value: function() {
                    this.preSet(),
                    this.getComment(),
                    this.setIsWechatXcx()
                }
            },
            {
                key: "componentDidUpdate",
                value: function() {
                    this.setLang()
                }
            },
            {
                key: "componentDidMount",
                value: function() {
                    var e = {
                        url: _.c.FETCH_PAGE_CONFIG,
                        data: {
                            channel: this.state.channel
                        },
                        mark: _.f
                    };
                    this.pageConfig.getConfigData(e),
                    this.fetchAndSetLang(),
                    this.setLang(),
                    n.i(v.i)(),
                    n.i(v.j)(),
                    n.i(w.a)()
                }
            },
            {
                key: "getComment",
                value: function() {
                    var e = this,
                    t = {
                        pay_point: _.e
                    };
                    this.setState({
                        loadingFlag: !0,
                        loadingText: ""
                    }),
                    u.a.ajax({
                        url: _.c.FETCH_COMMENT,
                        type: "GET",
                        data: t,
                        success: function(t) {
                            e.setState({
                                loadingFlag: !1,
                                loadingText: "",
                                comment: t.comment
                            })
                        },
                    })
                }
            },
            {
                key: "componentWillReceiveProps",
                value: function(e) {
                    var t = p.a.getItem("_lang");
                    t = t || _.a,
                    m.a.convertTextByLang(t)
                }
            },
            {
                key: "setLang",
                value: function() {
                    var e = p.a.getItem("_lang");
                    e = e || _.a,
                    m.a.convertTextByLang(e)
                }
            },
            {
                key: "preSet",
                value: function() {
                    var e = this.state,
                    t = e.lap,
                    i = e.channel,
                    o = e._mac,
                    r = e._idfa,
                    s = e._udid,
                    a = e._imei,
                    A = e.sem;
                    p.a.setItem("_lap", t, 1 / 0, "/"),
                    p.a.setItem("_channel", i, 1 / 0, "/"),
                    p.a.setItem("_sem", A, 1 / 0, "/"),
                    n.i(v.c)(p.a, "lang", "_lang", 1 / 0),
                    n.i(v.c)(p.a, "code", "_activity_coupon_code", 1 / 0),
                    o && p.a.setItem("_mac", o, 1 / 0, "/"),
                    r && p.a.setItem("_idfa", r, 1 / 0, "/"),
                    s && p.a.setItem("_udid", s, 1 / 0, "/"),
                    a && p.a.setItem("_imei", a, 1 / 0, "/")
                }
            },
            {
                key: "fetchAndSetLang",
                value: function() {
                    var e = n.i(v.d)() || p.a.getItem("_lang"),
                    t = this.props.actions.setIndexData;
                    e ? (e = n.i(v.e)(e, _.a), t({
                        lang: e
                    }), p.a.setItem("_lang", e, 86400, "/")) : u.a.ajax({
                        url: _.c.FETCH_LANG,
                        type: "GET",
                        success: function(i) {
                            e = n.i(v.e)(i && i.language, _.a),
                            t({
                                lang: n.i(v.e)(e)
                            }),
                            p.a.setItem("_lang", e, 86400, "/")
                        },
                        error: function() {
                            e = n.i(v.e)(void 0, _.a),
                            t({
                                lang: e
                            }),
                            p.a.setItem("_lang", e, 30, "/")
                        }
                    })
                }
            },
            {
                key: "setTipShowAndHide",
                value: function(e, t) {
                    var n = this.props.actions.setIndexData;
                    t = t || 1500,
                    n({
                        tipFlag: !0,
                        tipText: e
                    }),
                    setTimeout(function() {
                        n({
                            tipFlag: !1,
                            tipText: ""
                        })
                    },
                    t)
                }
            },
            {
                key: "setIsWechatXcx",
                value: function() {
                    var e = this;
                    u.a.ajax({
                        url: _.c.IS_WECHAT_XCX,
                        type: "GET",
                        data: {
                            channel: e.state.channel
                        },
                        success: function(t) {
                            200 == t.status && (e.setState({
                                is_xcx: t.is_xcx + ""
                            }), p.a.setItem("is_xcx", t.is_xcx, 86400, "/"))
                        },
                        error: function() {}
                    })
                }
            },
            {
                key: "requirePicLang",
                value: function() {
                    var e = this.state.lang;
                    return "zh-cn" == e ? "j": "f"
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this.state,
                    t = this.props.indexData,
                    i = this.props.actions.setIndexData,
                    o = e.pageConfig,
                    r = o.handle,
                    s = o.content,
                    a = this.requirePicLang(),
                    A = {
                        margin: "1rem",
                        autoplay: !1,
                        controls: !0,
                        fluid: !0,
                        poster: "//zxcs.ggwan.com/forecastbazijingpibundle/images/limingjun_video.jpg?timestamp=1530508700377",
                        sources: [{
                            src: "//zxcs.ggwan.com/assets/videos/limingjun.mp4?timestamp=1530508700377",
                            type: "video/mp4"
                        }]
                    },
                    l = [{
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_confused_list1.jpg?timestamp=1530508700377",
                        des: "你有没有好命格？",
                        text: "你的<span>八字</span>是好是坏？<br/>你的<span>八字五行</span>缺什么？"
                    },
                    {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_confused_list2.jpg?timestamp=1530508700377",
                        des: "一生能不能行大运？",
                        text: "<span>一生大运</span>是好是坏<br/>人生<span>哪步运</span>最好？"
                    },
                    {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_confused_list3.jpg?timestamp=1530508700377",
                        des: "名利感情命中有吗？",
                        text: "今生是<span>富豪</span>还是穷鬼?<br/><span>事业</span>是成是败？<br/><span>感情</span>美满还是情路坎坷？"
                    },
                    {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_confused_list4.jpg?timestamp=1530508700377",
                        des: "先天之本如何？",
                        text: "你的<span>性格</span>是强是弱？<br/><span>身体</span>先天能量有多强？<br/>该怎么<span>养生</span>和<span>增运</span>？"
                    }];
                    return g.a.createElement("section", null, g.a.createElement("div", {
                        id: "index-scroll-box"
                    },
                    g.a.createElement(N.a, {
                        channel: e.channel,
                        index_detain: r.index_detain
                    }), 0 == e.lap && r.header && g.a.createElement(k.a, {
                        channel: e.channel,
                        forecastName: _.n
                    }), s.banner && g.a.createElement("img", {
                        src: s.banner,
                        alt: "banner"
                    }), g.a.createElement(H.a, {
                        teacher_pic: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_intro_master.jpg?timestamp=1530508700377",
                        paragraph2: "专业八字分析你<span>命中八字强弱、五行喜忌、一生运程、感情钱财以及健康人际</span>的好坏情况，助你掌握自身形式，立于不败之地。"
                    }), g.a.createElement("div", {
                        id: "registry-btn-hook"
                    }), g.a.createElement(D.a, {
                        indexData: t,
                        setIndexData: i,
                        btnBgColor: "#931024",
                        textColor: "#fff",
                        boxShadow: "0 5px 0 0 #780d1d",
                        borderRadius: "100px",
                        introColor: "#4f3c2d",
                        introSpanColor: "#931024",
                        queryColor: "#4f3c2d"
                    }), g.a.createElement("div", {
                        id: "fixed-scroll-hook"
                    }), g.a.createElement(B.a, {
                        titPic: "V2_tit01.png",
                        titwidth: "16.5rem",
                        alt: "你對命運感到困惑嗎"
                    },
                    g.a.createElement(O.a, {
                        list: l
                    })), g.a.createElement(B.a, {
                        titPic: "V2_tit02.png",
                        titwidth: "11rem",
                        alt: "大师专业分析"
                    },
                    g.a.createElement(R.a, null)), g.a.createElement(B.a, {
                        titPic: "V2_tit03.png",
                        titwidth: "17.8rem",
                        alt: "了解你的运势祸福吉凶"
                    },
                    g.a.createElement("img", {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_pic_yunshi.png?timestamp=1530508700377",
                        alt: ""
                    })), !n.i(y.b)(e.channel) && g.a.createElement(B.a, {
                        titPic: "V2_tit04.png",
                        titwidth: "12.9rem",
                        padding: "1rem 0 1.4rem",
                        alt: "应采儿亲测分享"
                    },
                    g.a.createElement("div", {
                        className: "yingcaier"
                    },
                    g.a.createElement("div", {
                        className: "intro"
                    },
                    g.a.createElement("img", {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_yingcaier.png?timestamp=1530508700377"
                    }), g.a.createElement("div", null, "姓名：应采儿", g.a.createElement("br", null), "性别：女", g.a.createElement("br", null), "出生日期：阳历1983年06月20日 吉时", g.a.createElement("br", null))), g.a.createElement("p", null, "主人人缘很好，属于社交能手，一生的财运都不错，此生属于有福气的类型…"), g.a.createElement("div", {
                        className: "blur"
                    },
                    g.a.createElement("div", {
                        className: "blur-text"
                    },
                    "高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊高斯模糊"), g.a.createElement("div", {
                        className: "show-text"
                    },
                    "八字分析应采儿小姐一生在各方面都非常有福气！你会不会也有好运气呢？八字精批可以帮助你了解自己，做个掌握命运的人！")))), !n.i(y.b)(e.channel) && g.a.createElement(B.a, {
                        titPic: "V2_tit05.png",
                        titwidth: "18.2rem",
                        alt: "2018好命行运方法"
                    },
                    g.a.createElement("div", {
                        className: "pic-style"
                    },
                    g.a.createElement("img", {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/V2_pic_good_luck.png?timestamp=1530508700377"
                    }))), g.a.createElement(B.a, {
                        titPic: "V2_tit06.png",
                        titwidth: "16.5rem",
                        alt: "专业测算 理性选择"
                    },
                    g.a.createElement("div", {
                        className: "pic-style"
                    },
                    g.a.createElement("img", {
                        src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/newyear/" + a + "_master_vs.png?timestamp=1530508700377"
                    }))), r.index_advance && g.a.createElement(B.a, {
                        titPic: "V2_tit07.png",
                        titwidth: "9.375rem",
                        alt: "我们的优势"
                    },
                    g.a.createElement(M.a, null)), e.comment && e.comment.length > 0 && g.a.createElement(P.a, {
                        list: e.comment
                    }), r.video && g.a.createElement("div", {
                        className: "mai_d"
                    },
                    g.a.createElement(T.a, {
                        margin: "1rem",
                        src: _.d.MASTER_VIDEO
                    })), !n.i(v.b)(e.channel) && g.a.createElement(L.a, A), r.index_hot && g.a.createElement(F.a, {
                        bgColor: "#f9b51f",
                        itemColor: "#333",
                        channel: e.channel,
                        pay_point: _.e
                    }), !n.i(b.d)() && r.footer && g.a.createElement("div", {
                        dangerouslySetInnerHTML: {
                            __html: s.footer
                        }
                    }), g.a.createElement("div", {
                        style: {
                            height: "3rem",
                            background: "#f5e4c9"
                        }
                    })), g.a.createElement(S.a, {
                        borderRadius: "100px",
                        bgColor: "rgb(147, 16, 36)",
                        color: "#fff",
                        fontWeight: "bold",
                        boxShadow: "0 5px 0 0 rgb(120, 13, 29)"
                    }), e.tipFlag && g.a.createElement(x.a, {
                        text: e.tipText
                    }), e.loadingFlag && g.a.createElement(j.a, {
                        text: e.loadingText
                    }))
                }
            }]),
            t
        } (A.Component),
        Q = n.i(c.b)(s, a)(Y);
        t.a = Q; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(Y, "DefaultIndex", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/containers/Index.jsx"), __REACT_HOT_LOADER__.register(s, "mapStateToProps", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/containers/Index.jsx"), __REACT_HOT_LOADER__.register(a, "mapDispatchToProps", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/containers/Index.jsx"), __REACT_HOT_LOADER__.register(Q, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/containers/Index.jsx"))
        } ()
    },
    323 : function(e, t, n) {
        "use strict";
        var i = n(1),
        o = n.n(i),
        r = n(700),
        s = (n.n(r),
        function(e) {
            return o.a.createElement("div", {
                className: "com-box"
            },
            o.a.createElement("div", {
                className: "com-tit",
                style: {
                    width: e.titwidth
                }
            },
            o.a.createElement("img", {
                src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/" + e.titPic + "?timestamp=1530508700377",
                alt: e.alt
            })), o.a.createElement("div", {
                className: "com-content"
            },
            o.a.createElement("div", {
                className: "center",
                style: {
                    padding: e.padding
                }
            },
            e.children)))
        }),
        a = s;
        t.a = a; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(s, "Box", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/BoxV2.jsx"), __REACT_HOT_LOADER__.register(a, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/BoxV2.jsx"))
        } ()
    },
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(701),
        g = (n.n(A),
        function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } ()),
        l = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {
                    marqueeData: n.props.list,
                    interval: null
                },
                n.$li = void 0,
                n.$ul = void 0,
                n
            }
            return r(t, e),
            g(t, [{
                key: "componentDidMount",
                value: function() {
                    this.marquee()
                }
            },
            {
                key: "marquee",
                value: function() {
                    var e = this,
                    t = setInterval(function() {
                        var t = e.$ul;
                        t.style.transition = "",
                        t.style.top = "0px",
                        e.moveFirstDataToTail()
                    },
                    2500);
                    this.setState({
                        interval: t
                    })
                }
            },
            {
                key: "componentWillUnmount",
                value: function() {
                    var e = this.state.interval;
                    e && clearInterval(e)
                }
            },
            {
                key: "moveFirstDataToTail",
                value: function() {
                    var e = this,
                    t = this.state.marqueeData,
                    n = t.shift();
                    t.push(n),
                    this.setState({
                        marqueeData: t
                    }),
                    setTimeout(function() {
                        e.scrollComment()
                    },
                    4)
                }
            },
            {
                key: "scrollComment",
                value: function() {
                    var e = this.$li.offsetHeight,
                    t = this.$ul;
                    t.style.transition = "top ease-in 2s",
                    t.style.top = -e + "px"
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = this.state.marqueeData;
                    return a.a.createElement("div", {
                        className: "new-comment mai_d"
                    },
                    a.a.createElement("h3", null, "◆ 用户评论 ◆"), a.a.createElement("div", {
                        className: "marquee-wrapper"
                    },
                    a.a.createElement("ul", {
                        className: "comment-list info-list-box",
                        ref: function(t) {
                            e.$ul = t
                        }
                    },
                    t && t.map(function(t, n) {
                        return a.a.createElement("li", {
                            key: n,
                            ref: function(t) {
                                0 === n && t && (e.$li = t)
                            }
                        },
                        a.a.createElement("p", {
                            className: "user"
                        },
                        t.user), a.a.createElement("p", {
                            className: "detail"
                        },
                        t.content))
                    }))))
                }
            }]),
            t
        } (s.Component),
        c = l;
        t.a = c; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(l, "Comment", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/Comment.jsx"), __REACT_HOT_LOADER__.register(c, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/Comment.jsx"))
        } ()
    },
        "use strict";
        var i = n(1),
        o = n.n(i),
        r = n(206),
        s = (n.n(r),
        function(e) {
            return o.a.createElement("ul", {
                className: "ana_item"
            },
            e.list.map(function(e, t) {
                return o.a.createElement("li", {
                    key: "anaI" + t,
                    className: "clear"
                },
                o.a.createElement("div", {
                    className: "left"
                },
                o.a.createElement("img", {
                    src: e.src,
                    alt: ""
                })), o.a.createElement("div", {
                    className: "ana_des"
                },
                e.des.map(function(t, n) {
                    return o.a.createElement("dl", {
                        key: "ad" + n
                    },
                    o.a.createElement("dt", {
                        style: {
                            backgroundColor: e.color
                        }
                    },
                    t.title), o.a.createElement("dd", null, t.text))
                })))
            }))
        });
        s.defaultProps = {
            list: [{
                src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/part2_icon1.jpg?timestamp=1530508700377",
                color: "#c5414c",
                des: [{
                    title: "【破解】你的八字",
                    text: "分析你的内外心性与命格情况，以及影响你人生关键的喜用神；"
                },
                {
                    title: "【破解】你的性格",
                    text: "大师分析你的性格优点和缺点，并给予建议；"
                }]
            },
            {
                src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/part2_icon2.jpg?timestamp=1530508700377",
                color: "#e25d14",
                des: [{
                    title: "【破解】事业成就",
                    text: "分析你未来的事业运势，指导你选择最适合最有利于你发展的事业类型与方向，以及有利于你的事业贵人；"
                },
                {
                    title: "【破解】你的财运",
                    text: "分析你的先天财富基础与2018年的财富运势，助你找到生财之道；"
                }]
            },
            {
                src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/part2_icon3.jpg?timestamp=1530508700377",
                color: "#bd46be",
                des: [{
                    title: "【破解】你的感情",
                    text: "分析你对感情的态度和对待感情的处理方式，以及个人先天魅力；"
                },
                {
                    title: "【破解】生活方式",
                    text: "分析你的命格利弊，大师指导你选择有利于自己的行为方式生活；"
                }]
            },
            {
                src: "//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/part2_icon4.jpg?timestamp=1530508700377",
                color: "#1a9d23",
                des: [{
                    title: "【破解】你的2018年每月运程",
                    text: "超值附送2018年专属于你的每月运势分析。"
                }]
            }]
        };
        var a = function(e) {
            return o.a.createElement("div", {
                className: "analysis mai_d"
            },
            o.a.createElement("table", null, o.a.createElement("tbody", null, o.a.createElement("tr", null, e.textList1.map(function(e, t) {
                return o.a.createElement("td", {
                    key: t
                },
                o.a.createElement("div", {
                    className: "bg_color",
                    style: {
                        background: e.bgColor
                    }
                },
                o.a.createElement("div", {
                    className: "bg_img"
                },
                o.a.createElement("span", null, e.text))))
            })))), o.a.createElement("ul", {
                className: "text_list2 clear"
            },
            e.textList2.map(function(e, t) {
                return o.a.createElement("li", {
                    key: t
                },
                e.text)
            })), o.a.createElement("ul", {
                className: "text_list3 clear"
            },
            e.textList3.map(function(e, t) {
                return o.a.createElement("li", {
                    key: t
                },
                o.a.createElement("span", null, e.text))
            })), o.a.createElement(s, null))
        };
        a.defaultProps = {
            textList1: [{
                bgColor: "#ffb752",
                text: "八字命盘"
            },
            {
                bgColor: "#ff796b",
                text: "个人性格"
            },
            {
                bgColor: "#94ca88",
                text: "一生大运"
            },
            {
                bgColor: "#00a7c3",
                text: "一生财运"
            },
            {
                bgColor: "#5890cc",
                text: "事业成就"
            },
            {
                bgColor: "#ed754d",
                text: "感情姻缘"
            },
            {
                bgColor: "#1583cf",
                text: "生活方式"
            },
            {
                bgColor: "#cc5891",
                text: "新年运程"
            }],
            textList2: [{
                text: "【捉】"
            },
            {
                text: "【点】"
            },
            {
                text: "【望】"
            },
            {
                text: "【知】"
            },
            {
                text: "【指】"
            },
            {
                text: "【看】"
            },
            {
                text: "【教】"
            },
            {
                text: "【批】"
            }],
            textList3: [{
                text: "五行用神"
            },
            {
                text: "个性优劣"
            },
            {
                text: "运势高低"
            },
            {
                text: "财源财缘"
            },
            {
                text: "发展方向"
            },
            {
                text: "情缘态度"
            },
            {
                text: "行运方法"
            },
            {
                text: "每月运势"
            }]
        };
        var A = a;
        t.a = A; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(s, "AnalysisItem", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/MasterAnalysis.jsx"), __REACT_HOT_LOADER__.register(a, "MasterAnalysis", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/MasterAnalysis.jsx"), __REACT_HOT_LOADER__.register(A, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/components/index/MasterAnalysis.jsx"))
        } ()
    },
    345 : function(e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = n(26),
        o = (n.n(i), n(43)),
        r = (n.n(o), n(1)),
        s = n.n(r),
        a = n(44),
        A = (n.n(a), n(28)),
        g = n(51),
        l = n(71),
        c = n(296),
        C = n.i(A.a)(l.a);
        n.i(a.render)(s.a.createElement(g.a, {
            store: C
        },
        s.a.createElement(c.a, null)), document.getElementById("page-index")); !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && __REACT_HOT_LOADER__.register(C, "store", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/entry/index.js")
        } ()
    },
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(724),
        g = (n.n(A), n(366)),
        l = n.n(g),
        c = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        C = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.props = e,
                n.state = {},
                n
            }
            return r(t, e),
            c(t, [{
                key: "componentDidMount",
                value: function() {
                    l.a.options.flash.swf = "//zxcs.ggwan.com/assets/videos/video-js.swf?timestamp=1530508700377",
                    this.player = l()(this.videoNode, this.props,
                    function() {})
                }
            },
            {
                key: "componentWillUnmount",
                value: function() {
                    this.player && this.player.dispose()
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = this.props,
                    n = {
                        boxShadow: t.boxShadow || "0 0 .25rem #000",
                        margin: t.margin || "0 .5rem .5rem",
                        border: "2px solid #000",
                        backgroundColor: "#000",
                        WebKitBorderRadius: "5px",
                        MozBorderRadius: "5px",
                        borderRadius: "5px"
                    };
                    return a.a.createElement("section", {
                        style: n
                    },
                    a.a.createElement("div", {
                        "data-vjs-player": !0
                    },
                    a.a.createElement("video", {
                        ref: function(t) {
                            return e.videoNode = t
                        },
                        className: "video-js vjs-big-play-centered"
                    })))
                }
            }]),
            t
        } (a.a.Component),
        I = C;
        t.a = I; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(C, "CommonVideo", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonVideo.jsx"), __REACT_HOT_LOADER__.register(I, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonVideo.jsx"))
        } ()
    },
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        g = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.iframeBox = null,
                n.iframe = null,
                n.state = {
                    iframeBoxHeight: void 0,
                    iframeHeight: void 0
                },
                n
            }
            return r(t, e),
            A(t, [{
                key: "componentDidMount",
                value: function() {
                    var e = this.iframeBox,
                    t = e.clientWidth / (320 / 240),
                    n = t - 6;
                    this.setState({
                        iframeBoxHeight: n + "px",
                        iframeHeight: t + "px"
                    })
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = this.props,
                    n = this.state,
                    i = {
                        boxShadow: t.boxShadow || "0 0 .25rem #000",
                        margin: t.margin || "0 .5rem .5rem",
                        border: "2px solid #000",
                        backgroundColor: "#000",
                        WebKitBorderRadius: "5px",
                        MozBorderRadius: "5px",
                        borderRadius: "5px"
                    };
                    return a.a.createElement("div", {
                        style: i
                    },
                    a.a.createElement("div", {
                        style: {
                            width: "100%",
                            height: n.iframeBoxHeight || "auto",
                            margin: "0 auto .375rem"
                        },
                        ref: function(t) {
                            e.iframeBox = t
                        }
                    },
                    a.a.createElement("iframe", {
                        frameBorder: "0",
                        style: {
                            width: "100%",
                            height: n.iframeHeight || "auto"
                        },
                        src: t.src,
                        allowFullScreen: !0
                    })))
                }
            }]),
            t
        } (s.Component),
        l = g;
        t.a = l; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(g, "CommonVideoComponents", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonVideoComponents.jsx"), __REACT_HOT_LOADER__.register(l, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/components/CommonVideoComponents.jsx"))
        } ()
    },
    366 : function(e, t, n) { (function(i) {
            var o, r, s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
            function(e) {
                return typeof e
            }: function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
            }; !
            function(i, a) {
                "object" === s(t) && void 0 !== e ? e.exports = a() : (o = a, void 0 !== (r = "function" == typeof o ? o.call(t, n, t, e) : o) && (e.exports = r))
            } (0,
            function() {
                function e(e, t) {
                    return t = {
                        exports: {}
                    },
                    e(t, t.exports),
                    t.exports
                }
                function t(e, t) {
                    Ut(e).forEach(function(n) {
                        return t(e[n], n)
                    })
                }
                function n(e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 0;
                    return Ut(e).reduce(function(n, i) {
                        return t(n, e[i], i)
                    },
                    n)
                }
                function o(e) {
                    for (var n = arguments.length,
                    i = Array(n > 1 ? n - 1 : 0), o = 1; o < n; o++) i[o - 1] = arguments[o];
                    return Object.assign ? Object.assign.apply(Object, [e].concat(i)) : (i.forEach(function(n) {
                        n && t(n,
                        function(t, n) {
                            e[n] = t
                        })
                    }), e)
                }
                function r(e) {
                    return !! e && "object" === (void 0 === e ? "undefined": Nt(e))
                }
                function a(e) {
                    return r(e) && "[object Object]" === Wt.call(e) && e.constructor === Object
                }
                function A(e) {
                    return e.replace(/\n\r?\s*/g, "")
                }
                function g(e, t) {
                    if (!e || !t) return "";
                    if ("function" == typeof lt.getComputedStyle) {
                        var n = lt.getComputedStyle(e);
                        return n ? n[t] : ""
                    }
                    return e.currentStyle[t] || ""
                }
                function l(e) {
                    return "string" == typeof e && /\S/.test(e)
                }
                function c(e) {
                    if (/\s/.test(e)) throw new Error("class has illegal whitespace characters")
                }
                function C(e) {
                    return new RegExp("(^|\\s)" + e + "($|\\s)")
                }
                function I() {
                    return ut === lt.document && void 0 !== ut.createElement
                }
                function h(e) {
                    return r(e) && 1 === e.nodeType
                }
                function u() {
                    try {
                        return lt.parent !== lt.self
                    } catch(e) {
                        return ! 0
                    }
                }
                function d(e) {
                    return function(t, n) {
                        if (!l(t)) return ut[e](null);
                        l(n) && (n = ut.querySelector(n));
                        var i = h(n) ? n: ut;
                        return i[e] && i[e](t)
                    }
                }
                function p() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "div",
                    t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                    i = arguments[3],
                    o = ut.createElement(e);
                    return Object.getOwnPropertyNames(t).forEach(function(e) {
                        var n = t[e]; - 1 !== e.indexOf("aria-") || "role" === e || "type" === e ? (Jt.warn(Kt(qt, e, n)), o.setAttribute(e, n)) : "textContent" === e ? f(o, n) : o[e] = n
                    }),
                    Object.getOwnPropertyNames(n).forEach(function(e) {
                        o.setAttribute(e, n[e])
                    }),
                    i && F(o, i),
                    o
                }
                function f(e, t) {
                    return void 0 === e.textContent ? e.innerText = t: e.textContent = t,
                    e
                }
                function m(e, t) {
                    t.firstChild ? t.insertBefore(e, t.firstChild) : t.appendChild(e)
                }
                function v(e, t) {
                    return c(t),
                    e.classList ? e.classList.contains(t) : C(t).test(e.className)
                }
                function y(e, t) {
                    return e.classList ? e.classList.add(t) : v(e, t) || (e.className = (e.className + " " + t).trim()),
                    e
                }
                function b(e, t) {
                    return e.classList ? e.classList.remove(t) : (c(t), e.className = e.className.split(/\s+/).filter(function(e) {
                        return e !== t
                    }).join(" ")),
                    e
                }
                function _(e, t, n) {
                    var i = v(e, t);
                    if ("function" == typeof n && (n = n(e, t)), "boolean" != typeof n && (n = !i), n !== i) return n ? y(e, t) : b(e, t),
                    e
                }
                function w(e, t) {
                    Object.getOwnPropertyNames(t).forEach(function(n) {
                        var i = t[n];
                        null === i || void 0 === i || !1 === i ? e.removeAttribute(n) : e.setAttribute(n, !0 === i ? "": i)
                    })
                }
                function E(e) {
                    var t = {};
                    if (e && e.attributes && e.attributes.length > 0) for (var n = e.attributes,
                    i = n.length - 1; i >= 0; i--) {
                        var o = n[i].name,
                        r = n[i].value;
                        "boolean" != typeof e[o] && -1 === ",autoplay,controls,playsinline,loop,muted,default,defaultMuted,".indexOf("," + o + ",") || (r = null !== r),
                        t[o] = r
                    }
                    return t
                }
                function T(e, t) {
                    return e.getAttribute(t)
                }
                function j(e, t, n) {
                    e.setAttribute(t, n)
                }
                function x(e, t) {
                    e.removeAttribute(t)
                }
                function k() {
                    ut.body.focus(),
                    ut.onselectstart = function() {
                        return ! 1
                    }
                }
                function S() {
                    ut.onselectstart = function() {
                        return ! 0
                    }
                }
                function D(e) {
                    if (e && e.getBoundingClientRect && e.parentNode) {
                        var t = e.getBoundingClientRect(),
                        n = {};
                        return ["bottom", "height", "left", "right", "top", "width"].forEach(function(e) {
                            void 0 !== t[e] && (n[e] = t[e])
                        }),
                        n.height || (n.height = parseFloat(g(e, "height"))),
                        n.width || (n.width = parseFloat(g(e, "width"))),
                        n
                    }
                }
                function B(e) {
                    var t = void 0;
                    if (e.getBoundingClientRect && e.parentNode && (t = e.getBoundingClientRect()), !t) return {
                        left: 0,
                        top: 0
                    };
                    var n = ut.documentElement,
                    i = ut.body,
                    o = n.clientLeft || i.clientLeft || 0,
                    r = lt.pageXOffset || i.scrollLeft,
                    s = t.left + r - o,
                    a = n.clientTop || i.clientTop || 0,
                    A = lt.pageYOffset || i.scrollTop,
                    g = t.top + A - a;
                    return {
                        left: Math.round(s),
                        top: Math.round(g)
                    }
                }
                function O(e, t) {
                    var n = {},
                    i = B(e),
                    o = e.offsetWidth,
                    r = e.offsetHeight,
                    s = i.top,
                    a = i.left,
                    A = t.pageY,
                    g = t.pageX;
                    return t.changedTouches && (g = t.changedTouches[0].pageX, A = t.changedTouches[0].pageY),
                    n.y = Math.max(0, Math.min(1, (s - A + r) / r)),
                    n.x = Math.max(0, Math.min(1, (g - a) / o)),
                    n
                }
                function R(e) {
                    return r(e) && 3 === e.nodeType
                }
                function M(e) {
                    for (; e.firstChild;) e.removeChild(e.firstChild);
                    return e
                }
                function P(e) {
                    return "function" == typeof e && (e = e()),
                    (Array.isArray(e) ? e: [e]).map(function(e) {
                        return "function" == typeof e && (e = e()),
                        h(e) || R(e) ? e: "string" == typeof e && /\S/.test(e) ? ut.createTextNode(e) : void 0
                    }).filter(function(e) {
                        return e
                    })
                }
                function F(e, t) {
                    return P(t).forEach(function(t) {
                        return e.appendChild(t)
                    }),
                    e
                }
                function L(e, t) {
                    return F(M(e), t)
                }
                function N(e) {
                    return void 0 === e.button && void 0 === e.buttons || (0 === e.button && void 0 === e.buttons || (9 === Ot || 0 === e.button && 1 === e.buttons))
                }
                function H() {
                    return nn++
                }
                function z(e) {
                    var t = e[rn];
                    return t || (t = e[rn] = H()),
                    on[t] || (on[t] = {}),
                    on[t]
                }
                function Y(e) {
                    var t = e[rn];
                    return !! t && !!Object.getOwnPropertyNames(on[t]).length
                }
                function Q(e) {
                    var t = e[rn];
                    if (t) {
                        delete on[t];
                        try {
                            delete e[rn]
                        } catch(t) {
                            e.removeAttribute ? e.removeAttribute(rn) : e[rn] = null
                        }
                    }
                }
                function W(e, t) {
                    var n = z(e);
                    0 === n.handlers[t].length && (delete n.handlers[t], e.removeEventListener ? e.removeEventListener(t, n.dispatcher, !1) : e.detachEvent && e.detachEvent("on" + t, n.dispatcher)),
                    Object.getOwnPropertyNames(n.handlers).length <= 0 && (delete n.handlers, delete n.dispatcher, delete n.disabled),
                    0 === Object.getOwnPropertyNames(n).length && Q(e)
                }
                function U(e, t, n, i) {
                    n.forEach(function(n) {
                        e(t, n, i)
                    })
                }
                function V(e) {
                    function t() {
                        return ! 0
                    }
                    function n() {
                        return ! 1
                    }
                    if (!e || !e.isPropagationStopped) {
                        var i = e || lt.event;
                        e = {};
                        for (var o in i)"layerX" !== o && "layerY" !== o && "keyLocation" !== o && "webkitMovementX" !== o && "webkitMovementY" !== o && ("returnValue" === o && i.preventDefault || (e[o] = i[o]));
                        if (e.target || (e.target = e.srcElement || ut), e.relatedTarget || (e.relatedTarget = e.fromElement === e.target ? e.toElement: e.fromElement), e.preventDefault = function() {
                            i.preventDefault && i.preventDefault(),
                            e.returnValue = !1,
                            i.returnValue = !1,
                            e.defaultPrevented = !0
                        },
                        e.defaultPrevented = !1, e.stopPropagation = function() {
                            i.stopPropagation && i.stopPropagation(),
                            e.cancelBubble = !0,
                            i.cancelBubble = !0,
                            e.isPropagationStopped = t
                        },
                        e.isPropagationStopped = n, e.stopImmediatePropagation = function() {
                            i.stopImmediatePropagation && i.stopImmediatePropagation(),
                            e.isImmediatePropagationStopped = t,
                            e.stopPropagation()
                        },
                        e.isImmediatePropagationStopped = n, null !== e.clientX && void 0 !== e.clientX) {
                            var r = ut.documentElement,
                            s = ut.body;
                            e.pageX = e.clientX + (r && r.scrollLeft || s && s.scrollLeft || 0) - (r && r.clientLeft || s && s.clientLeft || 0),
                            e.pageY = e.clientY + (r && r.scrollTop || s && s.scrollTop || 0) - (r && r.clientTop || s && s.clientTop || 0)
                        }
                        e.which = e.charCode || e.keyCode,
                        null !== e.button && void 0 !== e.button && (e.button = 1 & e.button ? 0 : 4 & e.button ? 1 : 2 & e.button ? 2 : 0)
                    }
                    return e
                }
                function G(e, t, n) {
                    if (Array.isArray(t)) return U(G, e, t, n);
                    var i = z(e);
                    if (i.handlers || (i.handlers = {}), i.handlers[t] || (i.handlers[t] = []), n.guid || (n.guid = H()), i.handlers[t].push(n), i.dispatcher || (i.disabled = !1, i.dispatcher = function(t, n) {
                        if (!i.disabled) {
                            t = V(t);
                            var o = i.handlers[t.type];
                            if (o) for (var r = o.slice(0), s = 0, a = r.length; s < a && !t.isImmediatePropagationStopped(); s++) try {
                                r[s].call(e, t, n)
                            } catch(e) {
                                Jt.error(e)
                            }
                        }
                    }), 1 === i.handlers[t].length) if (e.addEventListener) {
                        var o = !1;
                        sn && an.indexOf(t) > -1 && (o = {
                            passive: !0
                        }),
                        e.addEventListener(t, i.dispatcher, o)
                    } else e.attachEvent && e.attachEvent("on" + t, i.dispatcher)
                }
                function X(e, t, n) {
                    if (Y(e)) {
                        var i = z(e);
                        if (i.handlers) {
                            if (Array.isArray(t)) return U(X, e, t, n);
                            var o = function(e, t) {
                                i.handlers[t] = [],
                                W(e, t)
                            };
                            if (void 0 !== t) {
                                var r = i.handlers[t];
                                if (r) {
                                    if (!n) return void o(e, t);
                                    if (n.guid) for (var s = 0; s < r.length; s++) r[s].guid === n.guid && r.splice(s--, 1);
                                    W(e, t)
                                }
                            } else for (var a in i.handlers) Object.prototype.hasOwnProperty.call(i.handlers || {},
                            a) && o(e, a)
                        }
                    }
                }
                function Z(e, t, n) {
                    var i = Y(e) ? z(e) : {},
                    o = e.parentNode || e.ownerDocument;
                    if ("string" == typeof t && (t = {
                        type: t,
                        target: e
                    }), t = V(t), i.dispatcher && i.dispatcher.call(e, t, n), o && !t.isPropagationStopped() && !0 === t.bubbles) Z.call(null, o, t, n);
                    else if (!o && !t.defaultPrevented) {
                        var r = z(t.target);
                        t.target[t.type] && (r.disabled = !0, "function" == typeof t.target[t.type] && t.target[t.type](), r.disabled = !1)
                    }
                    return ! t.defaultPrevented
                }
                function J(e, t, n) {
                    if (Array.isArray(t)) return U(J, e, t, n);
                    var i = function i() {
                        X(e, t, i),
                        n.apply(this, arguments)
                    };
                    i.guid = n.guid = n.guid || H(),
                    G(e, t, i)
                }
                function K(e, t) {
                    t && (ln = t),
                    lt.setTimeout(cn, e)
                }
                function q(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    n = t.eventBusKey;
                    if (n) {
                        if (!e[n].nodeName) throw new Error('The eventBusKey "' + n + '" does not refer to an element.');
                        e.eventBusEl_ = e[n]
                    } else e.eventBusEl_ = p("span", {
                        className: "vjs-event-bus"
                    });
                    return o(e, wn),
                    e.on("dispose",
                    function() {
                        e.off(),
                        lt.setTimeout(function() {
                            e.eventBusEl_ = null
                        },
                        0)
                    }),
                    e
                }
                function $(e, t) {
                    return o(e, En),
                    e.state = o({},
                    e.state, t),
                    "function" == typeof e.handleStateChanged && pn(e) && e.on("statechanged", e.handleStateChanged),
                    e
                }
                function ee(e) {
                    return "string" != typeof e ? e: e.charAt(0).toUpperCase() + e.slice(1)
                }
                function te(e, t) {
                    return ee(e) === ee(t)
                }
                function ne() {
                    for (var e = {},
                    n = arguments.length,
                    i = Array(n), o = 0; o < n; o++) i[o] = arguments[o];
                    return i.forEach(function(n) {
                        n && t(n,
                        function(t, n) {
                            if (!a(t)) return void(e[n] = t);
                            a(e[n]) || (e[n] = {}),
                            e[n] = ne(e[n], t)
                        })
                    }),
                    e
                }
                function ie(e, t, n) {
                    if ("number" != typeof t || t < 0 || t > n) throw new Error("Failed to execute '" + e + "' on 'TimeRanges': The index provided (" + t + ") is non-numeric or out of bounds (0-" + n + ").")
                }
                function oe(e, t, n, i) {
                    return ie(e, i, n.length - 1),
                    n[i][t]
                }
                function re(e) {
                    return void 0 === e || 0 === e.length ? {
                        length: 0,
                        start: function() {
                            throw new Error("This TimeRanges object is empty")
                        },
                        end: function() {
                            throw new Error("This TimeRanges object is empty")
                        }
                    }: {
                        length: e.length,
                        start: oe.bind(null, "start", 0, e),
                        end: oe.bind(null, "end", 1, e)
                    }
                }
                function se(e, t) {
                    return Array.isArray(e) ? re(e) : void 0 === e || void 0 === t ? re() : re([[e, t]])
                }
                function ae(e, t) {
                    var n = 0,
                    i = void 0,
                    o = void 0;
                    if (!t) return 0;
                    e && e.length || (e = se(0, 0));
                    for (var r = 0; r < e.length; r++) i = e.start(r),
                    o = e.end(r),
                    o > t && (o = t),
                    n += o - i;
                    return n / t
                }
                function Ae(e) {
                    if (e instanceof Ae) return e;
                    "number" == typeof e ? this.code = e: "string" == typeof e ? this.message = e: r(e) && ("number" == typeof e.code && (this.code = e.code), o(this, e)),
                    this.message || (this.message = Ae.defaultMessages[this.code] || "")
                }
                function ge(e, t) {
                    var n, i = null;
                    try {
                        n = JSON.parse(e, t)
                    } catch(e) {
                        i = e
                    }
                    return [i, n]
                }
                function le(e) {
                    return void 0 !== e && "function" == typeof e.then
                }
                function ce(e) {
                    le(e) && e.then(null,
                    function(e) {})
                }
                function Ce(e) {
                    var t = ai.call(e);
                    return "[object Function]" === t || "function" == typeof e && "[object RegExp]" !== t || "undefined" != typeof window && (e === window.setTimeout || e === window.alert || e === window.confirm || e === window.prompt)
                }
                function Ie(e, t, n) {
                    if (!si(t)) throw new TypeError("iterator must be a function");
                    arguments.length < 3 && (n = this),
                    "[object Array]" === li.call(e) ? he(e, t, n) : "string" == typeof e ? ue(e, t, n) : de(e, t, n)
                }
                function he(e, t, n) {
                    for (var i = 0,
                    o = e.length; i < o; i++) ci.call(e, i) && t.call(n, e[i], i, e)
                }
                function ue(e, t, n) {
                    for (var i = 0,
                    o = e.length; i < o; i++) t.call(n, e.charAt(i), i, e)
                }
                function de(e, t, n) {
                    for (var i in e) ci.call(e, i) && t.call(n, e[i], i, e)
                }
                function pe() {
                    for (var e = {},
                    t = 0; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) ui.call(n, i) && (e[i] = n[i])
                    }
                    return e
                }
                function fe(e) {
                    for (var t in e) if (e.hasOwnProperty(t)) return ! 1;
                    return ! 0
                }
                function me(e, t, n) {
                    var i = e;
                    return si(t) ? (n = t, "string" == typeof e && (i = {
                        uri: e
                    })) : i = hi(t, {
                        uri: e
                    }),
                    i.callback = n,
                    i
                }
                function ve(e, t, n) {
                    return t = me(e, t, n),
                    ye(t)
                }
                function ye(e) {
                    function t() {
                        4 === a.readyState && setTimeout(o, 0)
                    }
                    function n() {
                        var e = void 0;
                        if (e = a.response ? a.response: a.responseText || be(a), d) try {
                            e = JSON.parse(e)
                        } catch(e) {}
                        return e
                    }
                    function i(e) {
                        return clearTimeout(l),
                        e instanceof Error || (e = new Error("" + (e || "Unknown XMLHttpRequest Error"))),
                        e.statusCode = 0,
                        s(e, p)
                    }
                    function o() {
                        if (!g) {
                            var t;
                            clearTimeout(l),
                            t = e.useXDR && void 0 === a.status ? 200 : 1223 === a.status ? 204 : a.status;
                            var i = p,
                            o = null;
                            return 0 !== t ? (i = {
                                body: n(),
                                statusCode: t,
                                method: C,
                                headers: {},
                                url: c,
                                rawRequest: a
                            },
                            a.getAllResponseHeaders && (i.headers = Ii(a.getAllResponseHeaders()))) : o = new Error("Internal XMLHttpRequest Error"),
                            s(o, i, i.body)
                        }
                    }
                    if (void 0 === e.callback) throw new Error("callback argument missing");
                    var r = !1,
                    s = function(t, n, i) {
                        r || (r = !0, e.callback(t, n, i))
                    },
                    a = e.xhr || null;
                    a || (a = e.cors || e.useXDR ? new ve.XDomainRequest: new ve.XMLHttpRequest);
                    var A, g, l, c = a.url = e.uri || e.url,
                    C = a.method = e.method || "GET",
                    I = e.body || e.data,
                    h = a.headers = e.headers || {},
                    u = !!e.sync,
                    d = !1,
                    p = {
                        body: void 0,
                        headers: {},
                        statusCode: 0,
                        method: C,
                        url: c,
                        rawRequest: a
                    };
                    if ("json" in e && !1 !== e.json && (d = !0, h.accept || h.Accept || (h.Accept = "application/json"), "GET" !== C && "HEAD" !== C && (h["content-type"] || h["Content-Type"] || (h["Content-Type"] = "application/json"), I = JSON.stringify(!0 === e.json ? I: e.json))), a.onreadystatechange = t, a.onload = o, a.onerror = i, a.onprogress = function() {},
                    a.onabort = function() {
                        g = !0
                    },
                    a.ontimeout = i, a.open(C, c, !u, e.username, e.password), u || (a.withCredentials = !!e.withCredentials), !u && e.timeout > 0 && (l = setTimeout(function() {
                        if (!g) {
                            g = !0,
                            a.abort("timeout");
                            var e = new Error("XMLHttpRequest timeout");
                            e.code = "ETIMEDOUT",
                            i(e)
                        }
                    },
                    e.timeout)), a.setRequestHeader) for (A in h) h.hasOwnProperty(A) && a.setRequestHeader(A, h[A]);
                    else if (e.headers && !fe(e.headers)) throw new Error("Headers cannot be set on an XDomainRequest object");
                    return "responseType" in e && (a.responseType = e.responseType),
                    "beforeSend" in e && "function" == typeof e.beforeSend && e.beforeSend(a),
                    a.send(I || null),
                    a
                }
                function be(e) {
                    if ("document" === e.responseType) return e.responseXML;
                    var t = e.responseXML && "parsererror" === e.responseXML.documentElement.nodeName;
                    return "" !== e.responseType || t ? null: e.responseXML
                }
                function _e() {}
                function we(e, t) {
                    this.name = "ParsingError",
                    this.code = e.code,
                    this.message = t || e.message
                }
                function Ee(e) {
                    function t(e, t, n, i) {
                        return 3600 * (0 | e) + 60 * (0 | t) + (0 | n) + (0 | i) / 1e3
                    }
                    var n = e.match(/^(\d+):(\d{2})(:\d{2})?\.(\d{3})/);
                    return n ? n[3] ? t(n[1], n[2], n[3].replace(":", ""), n[4]) : n[1] > 59 ? t(n[1], n[2], 0, n[4]) : t(0, n[1], n[2], n[4]) : null
                }
                function Te() {
                    this.values = xi(null)
                }
                function je(e, t, n, i) {
                    var o = i ? e.split(i) : [e];
                    for (var r in o) if ("string" == typeof o[r]) {
                        var s = o[r].split(n);
                        if (2 === s.length) {
                            var a = s[0],
                            A = s[1];
                            t(a, A)
                        }
                    }
                }
                function xe(e, t, n) {
                    function i() {
                        var t = Ee(e);
                        if (null === t) throw new we(we.Errors.BadTimeStamp, "Malformed timestamp: " + r);
                        return e = e.replace(/^[^\sa-zA-Z-]+/, ""),
                        t
                    }
                    function o() {
                        e = e.replace(/^\s+/, "")
                    }
                    var r = e;
                    if (o(), t.startTime = i(), o(), "--\x3e" !== e.substr(0, 3)) throw new we(we.Errors.BadTimeStamp, "Malformed time stamp (time stamps must be separated by '--\x3e'): " + r);
                    e = e.substr(3),
                    o(),
                    t.endTime = i(),
                    o(),
                    function(e, t) {
                        var i = new Te;
                        je(e,
                        function(e, t) {
                            switch (e) {
                            case "region":
                                for (var o = n.length - 1; o >= 0; o--) if (n[o].id === t) {
                                    i.set(e, n[o].region);
                                    break
                                }
                                break;
                            case "vertical":
                                i.alt(e, t, ["rl", "lr"]);
                                break;
                            case "line":
                                var r = t.split(","),
                                s = r[0];
                                i.integer(e, s),
                                i.percent(e, s) && i.set("snapToLines", !1),
                                i.alt(e, s, ["auto"]),
                                2 === r.length && i.alt("lineAlign", r[1], ["start", "middle", "end"]);
                                break;
                            case "position":
                                r = t.split(","),
                                i.percent(e, r[0]),
                                2 === r.length && i.alt("positionAlign", r[1], ["start", "middle", "end"]);
                                break;
                            case "size":
                                i.percent(e, t);
                                break;
                            case "align":
                                i.alt(e, t, ["start", "middle", "end", "left", "right"])
                            }
                        },
                        /:/, /\s/),
                        t.region = i.get("region", null),
                        t.vertical = i.get("vertical", ""),
                        t.line = i.get("line", "auto"),
                        t.lineAlign = i.get("lineAlign", "start"),
                        t.snapToLines = i.get("snapToLines", !0),
                        t.size = i.get("size", 100),
                        t.align = i.get("align", "middle"),
                        t.position = i.get("position", {
                            start: 0,
                            left: 0,
                            middle: 50,
                            end: 100,
                            right: 100
                        },
                        t.align),
                        t.positionAlign = i.get("positionAlign", {
                            start: "start",
                            left: "start",
                            middle: "middle",
                            end: "end",
                            right: "end"
                        },
                        t.align)
                    } (e, t)
                }
                function ke(e, t) {
                    function n(e) {
                        return ki[e]
                    }
                    for (var i, o = e.document.createElement("div"), r = o, s = []; null !== (i = function() {
                        if (!t) return null;
                        var e = t.match(/^([^<]*)(<[^>]+>?)?/);
                        return function(e) {
                            return t = t.substr(e.length),
                            e
                        } (e[1] ? e[1] : e[2])
                    } ());) if ("<" !== i[0]) r.appendChild(e.document.createTextNode(function(e) {
                        for (; g = e.match(/&(amp|lt|gt|lrm|rlm|nbsp);/);) e = e.replace(g[0], n);
                        return e
                    } (i)));
                    else {
                        if ("/" === i[1]) {
                            s.length && s[s.length - 1] === i.substr(2).replace(">", "") && (s.pop(), r = r.parentNode);
                            continue
                        }
                        var a, A = Ee(i.substr(1, i.length - 2));
                        if (A) {
                            a = e.document.createProcessingInstruction("timestamp", A),
                            r.appendChild(a);
                            continue
                        }
                        var g = i.match(/^<([^.\s\/0-9>]+)(\.[^\s\\>]+)?([^>\\]+)?(\\?)>?$/);
                        if (!g) continue;
                        if (! (a = function(t, n) {
                            var i = Si[t];
                            if (!i) return null;
                            var o = e.document.createElement(i);
                            o.localName = i;
                            var r = Di[t];
                            return r && n && (o[r] = n.trim()),
                            o
                        } (g[1], g[3]))) continue;
                        if (!
                        function(e, t) {
                            return ! Bi[t.localName] || Bi[t.localName] === e.localName
                        } (r, a)) continue;
                        g[2] && (a.className = g[2].substr(1).replace(".", " ")),
                        s.push(g[1]),
                        r.appendChild(a),
                        r = a
                    }
                    return o
                }
                function Se(e) {
                    for (var t = 0; t < Oi.length; t++) {
                        var n = Oi[t];
                        if (e >= n[0] && e <= n[1]) return ! 0
                    }
                    return ! 1
                }
                function De(e) {
                    function t(e, t) {
                        for (var n = t.childNodes.length - 1; n >= 0; n--) e.push(t.childNodes[n])
                    }
                    function n(e) {
                        if (!e || !e.length) return null;
                        var i = e.pop(),
                        o = i.textContent || i.innerText;
                        if (o) {
                            var r = o.match(/^.*(\n|\r)/);
                            return r ? (e.length = 0, r[0]) : o
                        }
                        return "ruby" === i.tagName ? n(e) : i.childNodes ? (t(e, i), n(e)) : void 0
                    }
                    var i, o = [],
                    r = "";
                    if (!e || !e.childNodes) return "ltr";
                    for (t(o, e); r = n(o);) for (var s = 0; s < r.length; s++) if (i = r.charCodeAt(s), Se(i)) return "rtl";
                    return "ltr"
                }
                function Be(e) {
                    if ("number" == typeof e.line && (e.snapToLines || e.line >= 0 && e.line <= 100)) return e.line;
                    if (!e.track || !e.track.textTrackList || !e.track.textTrackList.mediaElement) return - 1;
                    for (var t = e.track,
                    n = t.textTrackList,
                    i = 0,
                    o = 0; o < n.length && n[o] !== t; o++)"showing" === n[o].mode && i++;
                    return - 1 * ++i
                }
                function Oe() {}
                function Re(e, t, n) {
                    var i = /MSIE\s8\.0/.test(navigator.userAgent),
                    o = "rgba(255, 255, 255, 1)",
                    r = "rgba(0, 0, 0, 0.8)";
                    i && (o = "rgb(255, 255, 255)", r = "rgb(0, 0, 0)"),
                    Oe.call(this),
                    this.cue = t,
                    this.cueDiv = ke(e, t.text);
                    var s = {
                        color: o,
                        backgroundColor: r,
                        position: "relative",
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0,
                        display: "inline"
                    };
                    i || (s.writingMode = "" === t.vertical ? "horizontal-tb": "lr" === t.vertical ? "vertical-lr": "vertical-rl", s.unicodeBidi = "plaintext"),
                    this.applyStyles(s, this.cueDiv),
                    this.div = e.document.createElement("div"),
                    s = {
                        textAlign: "middle" === t.align ? "center": t.align,
                        font: n.font,
                        whiteSpace: "pre-line",
                        position: "absolute"
                    },
                    i || (s.direction = De(this.cueDiv), s.writingMode = "" === t.vertical ? "horizontal-tb": "lr" === t.vertical ? "vertical-lr": "vertical-rl".stylesunicodeBidi = "plaintext"),
                    this.applyStyles(s),
                    this.div.appendChild(this.cueDiv);
                    var a = 0;
                    switch (t.positionAlign) {
                    case "start":
                        a = t.position;
                        break;
                    case "middle":
                        a = t.position - t.size / 2;
                        break;
                    case "end":
                        a = t.position - t.size
                    }
                    "" === t.vertical ? this.applyStyles({
                        left: this.formatStyle(a, "%"),
                        width: this.formatStyle(t.size, "%")
                    }) : this.applyStyles({
                        top: this.formatStyle(a, "%"),
                        height: this.formatStyle(t.size, "%")
                    }),
                    this.move = function(e) {
                        this.applyStyles({
                            top: this.formatStyle(e.top, "px"),
                            bottom: this.formatStyle(e.bottom, "px"),
                            left: this.formatStyle(e.left, "px"),
                            right: this.formatStyle(e.right, "px"),
                            height: this.formatStyle(e.height, "px"),
                            width: this.formatStyle(e.width, "px")
                        })
                    }
                }
                function Me(e) {
                    var t, n, i, o, r = /MSIE\s8\.0/.test(navigator.userAgent);
                    if (e.div) {
                        n = e.div.offsetHeight,
                        i = e.div.offsetWidth,
                        o = e.div.offsetTop;
                        var s = (s = e.div.childNodes) && (s = s[0]) && s.getClientRects && s.getClientRects();
                        e = e.div.getBoundingClientRect(),
                        t = s ? Math.max(s[0] && s[0].height || 0, e.height / s.length) : 0
                    }
                    this.left = e.left,
                    this.right = e.right,
                    this.top = e.top || o,
                    this.height = e.height || n,
                    this.bottom = e.bottom || o + (e.height || n),
                    this.width = e.width || i,
                    this.lineHeight = void 0 !== t ? t: e.lineHeight,
                    r && !this.lineHeight && (this.lineHeight = 13)
                }
                function Pe(e, t, n, i) {
                    var o = new Me(t),
                    r = t.cue,
                    s = Be(r),
                    a = [];
                    if (r.snapToLines) {
                        var A;
                        switch (r.vertical) {
                        case "":
                            a = ["+y", "-y"],
                            A = "height";
                            break;
                        case "rl":
                            a = ["+x", "-x"],
                            A = "width";
                            break;
                        case "lr":
                            a = ["-x", "+x"],
                            A = "width"
                        }
                        var g = o.lineHeight,
                        l = g * Math.round(s),
                        c = n[A] + g,
                        C = a[0];
                        Math.abs(l) > c && (l = l < 0 ? -1 : 1, l *= Math.ceil(c / g) * g),
                        s < 0 && (l += "" === r.vertical ? n.height: n.width, a = a.reverse()),
                        o.move(C, l)
                    } else {
                        var I = o.lineHeight / n.height * 100;
                        switch (r.lineAlign) {
                        case "middle":
                            s -= I / 2;
                            break;
                        case "end":
                            s -= I
                        }
                        switch (r.vertical) {
                        case "":
                            t.applyStyles({
                                top:
                                t.formatStyle(s, "%")
                            });
                            break;
                        case "rl":
                            t.applyStyles({
                                left:
                                t.formatStyle(s, "%")
                            });
                            break;
                        case "lr":
                            t.applyStyles({
                                right:
                                t.formatStyle(s, "%")
                            })
                        }
                        a = ["+y", "-x", "+x", "-y"],
                        o = new Me(t)
                    }
                    var h = function(e, t) {
                        for (var o, r = new Me(e), s = 1, a = 0; a < t.length; a++) {
                            for (; e.overlapsOppositeAxis(n, t[a]) || e.within(n) && e.overlapsAny(i);) e.move(t[a]);
                            if (e.within(n)) return e;
                            var A = e.intersectPercentage(n);
                            s > A && (o = new Me(e), s = A),
                            e = new Me(r)
                        }
                        return o || r
                    } (o, a);
                    t.move(h.toCSSCompatValues(n))
                }
                function Fe() {}
                function Le(e) {
                    return "string" == typeof e && ( !! Pi[e.toLowerCase()] && e.toLowerCase())
                }
                function Ne(e) {
                    return "string" == typeof e && ( !! Fi[e.toLowerCase()] && e.toLowerCase())
                }
                function He(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) e[i] = n[i]
                    }
                    return e
                }
                function ze(e, t, n) {
                    var i = this,
                    o = /MSIE\s8\.0/.test(navigator.userAgent),
                    r = {};
                    o ? i = document.createElement("custom") : r.enumerable = !0,
                    i.hasBeenReset = !1;
                    var s = "",
                    a = !1,
                    A = e,
                    g = t,
                    l = n,
                    c = null,
                    C = "",
                    I = !0,
                    h = "auto",
                    u = "start",
                    d = 50,
                    p = "middle",
                    f = 50,
                    m = "middle";
                    if (Object.defineProperty(i, "id", He({},
                    r, {
                        get: function() {
                            return s
                        },
                        set: function(e) {
                            s = "" + e
                        }
                    })), Object.defineProperty(i, "pauseOnExit", He({},
                    r, {
                        get: function() {
                            return a
                        },
                        set: function(e) {
                            a = !!e
                        }
                    })), Object.defineProperty(i, "startTime", He({},
                    r, {
                        get: function() {
                            return A
                        },
                        set: function(e) {
                            if ("number" != typeof e) throw new TypeError("Start time must be set to a number.");
                            A = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "endTime", He({},
                    r, {
                        get: function() {
                            return g
                        },
                        set: function(e) {
                            if ("number" != typeof e) throw new TypeError("End time must be set to a number.");
                            g = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "text", He({},
                    r, {
                        get: function() {
                            return l
                        },
                        set: function(e) {
                            l = "" + e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "region", He({},
                    r, {
                        get: function() {
                            return c
                        },
                        set: function(e) {
                            c = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "vertical", He({},
                    r, {
                        get: function() {
                            return C
                        },
                        set: function(e) {
                            var t = Le(e);
                            if (!1 === t) throw new SyntaxError("An invalid or illegal string was specified.");
                            C = t,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "snapToLines", He({},
                    r, {
                        get: function() {
                            return I
                        },
                        set: function(e) {
                            I = !!e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "line", He({},
                    r, {
                        get: function() {
                            return h
                        },
                        set: function(e) {
                            if ("number" != typeof e && e !== Mi) throw new SyntaxError("An invalid number or illegal string was specified.");
                            h = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "lineAlign", He({},
                    r, {
                        get: function() {
                            return u
                        },
                        set: function(e) {
                            var t = Ne(e);
                            if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                            u = t,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "position", He({},
                    r, {
                        get: function() {
                            return d
                        },
                        set: function(e) {
                            if (e < 0 || e > 100) throw new Error("Position must be between 0 and 100.");
                            d = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "positionAlign", He({},
                    r, {
                        get: function() {
                            return p
                        },
                        set: function(e) {
                            var t = Ne(e);
                            if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                            p = t,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "size", He({},
                    r, {
                        get: function() {
                            return f
                        },
                        set: function(e) {
                            if (e < 0 || e > 100) throw new Error("Size must be between 0 and 100.");
                            f = e,
                            this.hasBeenReset = !0
                        }
                    })), Object.defineProperty(i, "align", He({},
                    r, {
                        get: function() {
                            return m
                        },
                        set: function(e) {
                            var t = Ne(e);
                            if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                            m = t,
                            this.hasBeenReset = !0
                        }
                    })), i.displayState = void 0, o) return i
                }
                function Ye(e) {
                    return "string" == typeof e && ( !! Ni[e.toLowerCase()] && e.toLowerCase())
                }
                function Qe(e) {
                    return "number" == typeof e && e >= 0 && e <= 100
                }
                function We() {
                    var e = 100,
                    t = 3,
                    n = 0,
                    i = 100,
                    o = 0,
                    r = 100,
                    s = "";
                    Object.defineProperties(this, {
                        width: {
                            enumerable: !0,
                            get: function() {
                                return e
                            },
                            set: function(t) {
                                if (!Qe(t)) throw new Error("Width must be between 0 and 100.");
                                e = t
                            }
                        },
                        lines: {
                            enumerable: !0,
                            get: function() {
                                return t
                            },
                            set: function(e) {
                                if ("number" != typeof e) throw new TypeError("Lines must be set to a number.");
                                t = e
                            }
                        },
                        regionAnchorY: {
                            enumerable: !0,
                            get: function() {
                                return i
                            },
                            set: function(e) {
                                if (!Qe(e)) throw new Error("RegionAnchorX must be between 0 and 100.");
                                i = e
                            }
                        },
                        regionAnchorX: {
                            enumerable: !0,
                            get: function() {
                                return n
                            },
                            set: function(e) {
                                if (!Qe(e)) throw new Error("RegionAnchorY must be between 0 and 100.");
                                n = e
                            }
                        },
                        viewportAnchorY: {
                            enumerable: !0,
                            get: function() {
                                return r
                            },
                            set: function(e) {
                                if (!Qe(e)) throw new Error("ViewportAnchorY must be between 0 and 100.");
                                r = e
                            }
                        },
                        viewportAnchorX: {
                            enumerable: !0,
                            get: function() {
                                return o
                            },
                            set: function(e) {
                                if (!Qe(e)) throw new Error("ViewportAnchorX must be between 0 and 100.");
                                o = e
                            }
                        },
                        scroll: {
                            enumerable: !0,
                            get: function() {
                                return s
                            },
                            set: function(e) {
                                var t = Ye(e);
                                if (!1 === t) throw new SyntaxError("An invalid or illegal string was specified.");
                                s = t
                            }
                        }
                    })
                }
                function Ue(e, t, n, i) {
                    var o = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : {},
                    r = e.textTracks();
                    o.kind = t,
                    n && (o.label = n),
                    i && (o.language = i),
                    o.tech = e;
                    var s = new ji.text.TrackClass(o);
                    return r.addTrack(s),
                    s
                }
                function Ve(e, t) {
                    Qi[e] = Qi[e] || [],
                    Qi[e].push(t)
                }
                function Ge(e, t, n) {
                    e.setTimeout(function() {
                        return qe(t, Qi[t.type], n, e)
                    },
                    1)
                }
                function Xe(e, t) {
                    e.forEach(function(e) {
                        return e.setTech && e.setTech(t)
                    })
                }
                function Ze(e, t, n) {
                    return e.reduceRight(Ke(n), t[n]())
                }
                function Je(e, t, n, i) {
                    return t[n](e.reduce(Ke(n), i))
                }
                function Ke(e) {
                    return function(t, n) {
                        return n[e] ? n[e](t) : t
                    }
                }
                function qe() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                    t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [],
                    n = arguments[2],
                    i = arguments[3],
                    r = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : [],
                    s = arguments.length > 5 && void 0 !== arguments[5] && arguments[5],
                    a = t[0],
                    A = t.slice(1);
                    if ("string" == typeof a) qe(e, Qi[a], n, i, r, s);
                    else if (a) {
                        var g = a(i);
                        g.setSource(o({},
                        e),
                        function(t, o) {
                            if (t) return qe(e, A, n, i, r, s);
                            r.push(g),
                            qe(o, e.type === o.type ? A: Qi[o.type], n, i, r, s)
                        })
                    } else A.length ? qe(e, A, n, i, r, s) : s ? n(e, r) : qe(e, Qi["*"], n, i, r, !0)
                }
                function $e(e, t) {
                    return "rgba(" + parseInt(e[1] + e[1], 16) + "," + parseInt(e[2] + e[2], 16) + "," + parseInt(e[3] + e[3], 16) + "," + t + ")"
                }
                function et(e, t, n) {
                    try {
                        e.style[t] = n
                    } catch(e) {
                        return
                    }
                }
                function tt(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : e;
                    e = e < 0 ? 0 : e;
                    var n = Math.floor(e % 60),
                    i = Math.floor(e / 60 % 60),
                    o = Math.floor(e / 3600),
                    r = Math.floor(t / 60 % 60),
                    s = Math.floor(t / 3600);
                    return (isNaN(e) || e === 1 / 0) && (o = i = n = "-"),
                    o = o > 0 || s > 0 ? o + ":": "",
                    i = ((o || r >= 10) && i < 10 ? "0" + i: i) + ":",
                    n = n < 10 ? "0" + n: n,
                    o + i + n
                }
                function nt(e, t) {
                    if (t && (e = t(e)), e && "none" !== e) return e
                }
                function it(e, t) {
                    return nt(e.options[e.options.selectedIndex].value, t)
                }
                function ot(e, t, n) {
                    if (t) for (var i = 0; i < e.options.length; i++) if (nt(e.options[i].value, n) === t) {
                        e.selectedIndex = i;
                        break
                    }
                }
                function rt(e, t, n) {
                    var i = void 0;
                    if ("string" == typeof e) {
                        var o = rt.getPlayers();
                        if (0 === e.indexOf("#") && (e = e.slice(1)), o[e]) return t && Jt.warn('Player "' + e + '" is already initialised. Options will not be applied.'),
                        n && o[e].ready(n),
                        o[e];
                        i = $t("#" + e)
                    } else i = e;
                    if (!i || !i.nodeName) throw new TypeError("The element or ID supplied is not valid. (videojs)");
                    if (i.player || pr.players[i.playerId]) return i.player || pr.players[i.playerId];
                    h(i) && !ut.body.contains(i) && Jt.warn("The element supplied is not included in the DOM"),
                    t = t || {},
                    rt.hooks("beforesetup").forEach(function(e) {
                        var n = e(i, ne(t));
                        if (!r(n) || Array.isArray(n)) return void Jt.error("please return an object in beforesetup hooks");
                        t = ne(t, n)
                    });
                    var s = Tn.getComponent("Player"),
                    a = new s(i, t, n);
                    return rt.hooks("setup").forEach(function(e) {
                        return e(a)
                    }),
                    a
                }
                var st, at = "6.6.0",
                At = "undefined" != typeof window ? window: void 0 !== i ? i: "undefined" != typeof self ? self: {};
                st = "undefined" != typeof window ? window: void 0 !== At ? At: "undefined" != typeof self ? self: {};
                var gt, lt = st,
                ct = {},
                Ct = (Object.freeze || Object)({
                default:
                    ct
                }),
                It = Ct && ct || Ct,
                ht = void 0 !== At ? At: "undefined" != typeof window ? window: {};
                "undefined" != typeof document ? gt = document: (gt = ht["__GLOBAL_DOCUMENT_CACHE@4"]) || (gt = ht["__GLOBAL_DOCUMENT_CACHE@4"] = It);
                var ut = gt,
                dt = lt.navigator && lt.navigator.userAgent || "",
                pt = /AppleWebKit\/([\d.]+)/i.exec(dt),
                ft = pt ? parseFloat(pt.pop()) : null,
                mt = /iPad/i.test(dt),
                vt = /iPhone/i.test(dt) && !mt,
                yt = /iPod/i.test(dt),
                bt = vt || mt || yt,
                _t = function() {
                    var e = dt.match(/OS (\d+)_/i);
                    return e && e[1] ? e[1] : null
                } (),
                wt = /Android/i.test(dt),
                Et = function() {
                    var e = dt.match(/Android (\d+)(?:\.(\d+))?(?:\.(\d+))*/i);
                    if (!e) return null;
                    var t = e[1] && parseFloat(e[1]),
                    n = e[2] && parseFloat(e[2]);
                    return t && n ? parseFloat(e[1] + "." + e[2]) : t || null
                } (),
                Tt = wt && /webkit/i.test(dt) && Et < 2.3,
                jt = wt && Et < 5 && ft < 537,
                xt = /Firefox/i.test(dt),
                kt = /Edge/i.test(dt),
                St = !kt && /Chrome/i.test(dt),
                Dt = function() {
                    var e = dt.match(/Chrome\/(\d+)/);
                    return e && e[1] ? parseFloat(e[1]) : null
                } (),
                Bt = /MSIE\s8\.0/.test(dt),
                Ot = function() {
                    var e = /MSIE\s(\d+)\.\d/.exec(dt),
                    t = e && parseFloat(e[1]);
                    return ! t && /Trident\/7.0/i.test(dt) && /rv:11.0/.test(dt) && (t = 11),
                    t
                } (),
                Rt = /Safari/i.test(dt) && !St && !wt && !kt,
                Mt = Rt || bt,
                Pt = I() && ("ontouchstart" in lt || lt.DocumentTouch && lt.document instanceof lt.DocumentTouch),
                Ft = I() && "backgroundSize" in lt.document.createElement("video").style,
                Lt = (Object.freeze || Object)({
                    IS_IPAD: mt,
                    IS_IPHONE: vt,
                    IS_IPOD: yt,
                    IS_IOS: bt,
                    IOS_VERSION: _t,
                    IS_ANDROID: wt,
                    ANDROID_VERSION: Et,
                    IS_OLD_ANDROID: Tt,
                    IS_NATIVE_ANDROID: jt,
                    IS_FIREFOX: xt,
                    IS_EDGE: kt,
                    IS_CHROME: St,
                    CHROME_VERSION: Dt,
                    IS_IE8: Bt,
                    IE_VERSION: Ot,
                    IS_SAFARI: Rt,
                    IS_ANY_SAFARI: Mt,
                    TOUCH_ENABLED: Pt,
                    BACKGROUND_SIZE_SUPPORTED: Ft
                }),
                Nt = "function" == typeof Symbol && "symbol" === s(Symbol.iterator) ?
                function(e) {
                    return void 0 === e ? "undefined": s(e)
                }: function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": void 0 === e ? "undefined": s(e)
                },
                Ht = function(e, t) {
                    if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
                },
                zt = function(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + (void 0 === t ? "undefined": s(t)));
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }),
                    t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                },
                Yt = function(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return ! t || "object" !== (void 0 === t ? "undefined": s(t)) && "function" != typeof t ? e: t
                },
                Qt = function(e, t) {
                    return e.raw = t,
                    e
                },
                Wt = Object.prototype.toString,
                Ut = function(e) {
                    return r(e) ? Object.keys(e) : []
                },
                Vt = void 0,
                Gt = "info",
                Xt = [],
                Zt = function(e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : !!Ot && Ot < 11,
                    i = Vt.levels[Gt],
                    o = new RegExp("^(" + i + ")$");
                    if ("log" !== e && t.unshift(e.toUpperCase() + ":"), Xt && Xt.push([].concat(t)), t.unshift("VIDEOJS:"), lt.console) {
                        var s = lt.console[e];
                        s || "debug" !== e || (s = lt.console.info || lt.console.log),
                        s && i && o.test(e) && (n && (t = t.map(function(e) {
                            if (r(e) || Array.isArray(e)) try {
                                return JSON.stringify(e)
                            } catch(t) {
                                return String(e)
                            }
                            return String(e)
                        }).join(" ")), s.apply ? s[Array.isArray(t) ? "apply": "call"](lt.console, t) : s(t))
                    }
                };
                Vt = function() {
                    for (var e = arguments.length,
                    t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    Zt("log", t)
                },
                Vt.levels = {
                    all: "debug|log|warn|error",
                    off: "",
                    debug: "debug|log|warn|error",
                    info: "log|warn|error",
                    warn: "warn|error",
                    error: "error",
                    DEFAULT: Gt
                },
                Vt.level = function(e) {
                    if ("string" == typeof e) {
                        if (!Vt.levels.hasOwnProperty(e)) throw new Error('"' + e + '" in not a valid log level');
                        Gt = e
                    }
                    return Gt
                },
                Vt.history = function() {
                    return Xt ? [].concat(Xt) : []
                },
                Vt.history.clear = function() {
                    Xt && (Xt.length = 0)
                },
                Vt.history.disable = function() {
                    null !== Xt && (Xt.length = 0, Xt = null)
                },
                Vt.history.enable = function() {
                    null === Xt && (Xt = [])
                },
                Vt.error = function() {
                    for (var e = arguments.length,
                    t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    return Zt("error", t)
                },
                Vt.warn = function() {
                    for (var e = arguments.length,
                    t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    return Zt("warn", t)
                },
                Vt.debug = function() {
                    for (var e = arguments.length,
                    t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    return Zt("debug", t)
                };
                var Jt = Vt,
                Kt = function(e) {
                    for (var t = "",
                    n = 0; n < arguments.length; n++) t += A(e[n]) + (arguments[n + 1] || "");
                    return t
                },
                qt = Qt(["Setting attributes in the second argument of createEl()\n                has been deprecated. Use the third argument instead.\n                createEl(type, properties, attributes). Attempting to set ", " to ", "."], ["Setting attributes in the second argument of createEl()\n                has been deprecated. Use the third argument instead.\n                createEl(type, properties, attributes). Attempting to set ", " to ", "."]),
                $t = d("querySelector"),
                en = d("querySelectorAll"),
                tn = (Object.freeze || Object)({
                    isReal: I,
                    isEl: h,
                    isInFrame: u,
                    createEl: p,
                    textContent: f,
                    prependTo: m,
                    hasClass: v,
                    addClass: y,
                    removeClass: b,
                    toggleClass: _,
                    setAttributes: w,
                    getAttributes: E,
                    getAttribute: T,
                    setAttribute: j,
                    removeAttribute: x,
                    blockTextSelection: k,
                    unblockTextSelection: S,
                    getBoundingClientRect: D,
                    findPosition: B,
                    getPointerPosition: O,
                    isTextNode: R,
                    emptyEl: M,
                    normalizeContent: P,
                    appendContent: F,
                    insertContent: L,
                    isSingleLeftClick: N,
                    $: $t,
                    $$: en
                }),
                nn = 1,
                on = {},
                rn = "vdata" + (new Date).getTime(),
                sn = !1; !
                function() {
                    try {
                        var e = Object.defineProperty({},
                        "passive", {
                            get: function() {
                                sn = !0
                            }
                        });
                        lt.addEventListener("test", null, e),
                        lt.removeEventListener("test", null, e)
                    } catch(e) {}
                } ();
                var an = [],
                An = (Object.freeze || Object)({
                    fixEvent: V,
                    on: G,
                    off: X,
                    trigger: Z,
                    one: J
                }),
                gn = !1,
                ln = void 0,
                cn = function() {
                    if (I()) {
                        var e = ut.getElementsByTagName("video"),
                        t = ut.getElementsByTagName("audio"),
                        n = ut.getElementsByTagName("video-js"),
                        i = [];
                        if (e && e.length > 0) for (var o = 0,
                        r = e.length; o < r; o++) i.push(e[o]);
                        if (t && t.length > 0) for (var s = 0,
                        a = t.length; s < a; s++) i.push(t[s]);
                        if (n && n.length > 0) for (var A = 0,
                        g = n.length; A < g; A++) i.push(n[A]);
                        if (i && i.length > 0) for (var l = 0,
                        c = i.length; l < c; l++) {
                            var C = i[l];
                            if (!C || !C.getAttribute) {
                                K(1);
                                break
                            }
                            if (void 0 === C.player) {
                                var h = C.getAttribute("data-setup");
                                null !== h && ln(C)
                            }
                        } else gn || K(1)
                    }
                };
                I() && "complete" === ut.readyState ? gn = !0 : J(lt, "load",
                function() {
                    gn = !0
                });
                var Cn = function(e) {
                    var t = ut.createElement("style");
                    return t.className = e,
                    t
                },
                In = function(e, t) {
                    e.styleSheet ? e.styleSheet.cssText = t: e.textContent = t
                },
                hn = function(e, t, n) {
                    t.guid || (t.guid = H());
                    var i = function() {
                        return t.apply(e, arguments)
                    };
                    return i.guid = n ? n + "_" + t.guid: t.guid,
                    i
                },
                un = function(e, t) {
                    var n = Date.now();
                    return function() {
                        var i = Date.now();
                        i - n >= t && (e.apply(void 0, arguments), n = i)
                    }
                },
                dn = function() {};
                dn.prototype.allowedEvents_ = {},
                dn.prototype.on = function(e, t) {
                    var n = this.addEventListener;
                    this.addEventListener = function() {},
                    G(this, e, t),
                    this.addEventListener = n
                },
                dn.prototype.addEventListener = dn.prototype.on,
                dn.prototype.off = function(e, t) {
                    X(this, e, t)
                },
                dn.prototype.removeEventListener = dn.prototype.off,
                dn.prototype.one = function(e, t) {
                    var n = this.addEventListener;
                    this.addEventListener = function() {},
                    J(this, e, t),
                    this.addEventListener = n
                },
                dn.prototype.trigger = function(e) {
                    var t = e.type || e;
                    "string" == typeof e && (e = {
                        type: t
                    }),
                    e = V(e),
                    this.allowedEvents_[t] && this["on" + t] && this["on" + t](e),
                    Z(this, e)
                },
                dn.prototype.dispatchEvent = dn.prototype.trigger;
                var pn = function(e) {
                    return e instanceof dn || !!e.eventBusEl_ && ["on", "one", "off", "trigger"].every(function(t) {
                        return "function" == typeof e[t]
                    })
                },
                fn = function(e) {
                    return "string" == typeof e && /\S/.test(e) || Array.isArray(e) && !!e.length
                },
                mn = function(e) {
                    if (!e.nodeName && !pn(e)) throw new Error("Invalid target; must be a DOM node or evented object.")
                },
                vn = function(e) {
                    if (!fn(e)) throw new Error("Invalid event type; must be a non-empty string or array.")
                },
                yn = function(e) {
                    if ("function" != typeof e) throw new Error("Invalid listener; must be a function.")
                },
                bn = function(e, t) {
                    var n = t.length < 3 || t[0] === e || t[0] === e.eventBusEl_,
                    i = void 0,
                    o = void 0,
                    r = void 0;
                    return n ? (i = e.eventBusEl_, t.length >= 3 && t.shift(), o = t[0], r = t[1]) : (i = t[0], o = t[1], r = t[2]),
                    mn(i),
                    vn(o),
                    yn(r),
                    r = hn(e, r),
                    {
                        isTargetingSelf: n,
                        target: i,
                        type: o,
                        listener: r
                    }
                },
                _n = function(e, t, n, i) {
                    mn(e),
                    e.nodeName ? An[t](e, n, i) : e[t](n, i)
                },
                wn = {
                    on: function() {
                        for (var e = this,
                        t = arguments.length,
                        n = Array(t), i = 0; i < t; i++) n[i] = arguments[i];
                        var o = bn(this, n),
                        r = o.isTargetingSelf,
                        s = o.target,
                        a = o.type,
                        A = o.listener;
                        if (_n(s, "on", a, A), !r) {
                            var g = function() {
                                return e.off(s, a, A)
                            };
                            g.guid = A.guid;
                            var l = function() {
                                return e.off("dispose", g)
                            };
                            l.guid = A.guid,
                            _n(this, "on", "dispose", g),
                            _n(s, "on", "dispose", l)
                        }
                    },
                    one: function() {
                        for (var e = this,
                        t = arguments.length,
                        n = Array(t), i = 0; i < t; i++) n[i] = arguments[i];
                        var o = bn(this, n),
                        r = o.isTargetingSelf,
                        s = o.target,
                        a = o.type,
                        A = o.listener;
                        if (r) _n(s, "one", a, A);
                        else {
                            var g = function t() {
                                for (var n = arguments.length,
                                i = Array(n), o = 0; o < n; o++) i[o] = arguments[o];
                                e.off(s, a, t),
                                A.apply(null, i)
                            };
                            g.guid = A.guid,
                            _n(s, "one", a, g)
                        }
                    },
                    off: function(e, t, n) {
                        if (!e || fn(e)) X(this.eventBusEl_, e, t);
                        else {
                            var i = e,
                            o = t;
                            mn(i),
                            vn(o),
                            yn(n),
                            n = hn(this, n),
                            this.off("dispose", n),
                            i.nodeName ? (X(i, o, n), X(i, "dispose", n)) : pn(i) && (i.off(o, n), i.off("dispose", n))
                        }
                    },
                    trigger: function(e, t) {
                        return Z(this.eventBusEl_, e, t)
                    }
                },
                En = {
                    state: {},
                    setState: function(e) {
                        var n = this;
                        "function" == typeof e && (e = e());
                        var i = void 0;
                        return t(e,
                        function(e, t) {
                            n.state[t] !== e && (i = i || {},
                            i[t] = {
                                from: n.state[t],
                                to: e
                            }),
                            n.state[t] = e
                        }),
                        i && pn(this) && this.trigger({
                            changes: i,
                            type: "statechanged"
                        }),
                        i
                    }
                },
                Tn = function() {
                    function e(t, n, i) {
                        if (Ht(this, e), !t && this.play ? this.player_ = t = this: this.player_ = t, this.options_ = ne({},
                        this.options_), n = this.options_ = ne(this.options_, n), this.id_ = n.id || n.el && n.el.id, !this.id_) {
                            var o = t && t.id && t.id() || "no_player";
                            this.id_ = o + "_component_" + H()
                        }
                        this.name_ = n.name || null,
                        n.el ? this.el_ = n.el: !1 !== n.createEl && (this.el_ = this.createEl()),
                        !1 !== n.evented && q(this, {
                            eventBusKey: this.el_ ? "el_": null
                        }),
                        $(this, this.constructor.defaultState),
                        this.children_ = [],
                        this.childIndex_ = {},
                        this.childNameIndex_ = {},
                        !1 !== n.initChildren && this.initChildren(),
                        this.ready(i),
                        !1 !== n.reportTouchActivity && this.enableTouchActivity()
                    }
                    return e.prototype.dispose = function() {
                        if (this.trigger({
                            type: "dispose",
                            bubbles: !1
                        }), this.children_) for (var e = this.children_.length - 1; e >= 0; e--) this.children_[e].dispose && this.children_[e].dispose();
                        this.children_ = null,
                        this.childIndex_ = null,
                        this.childNameIndex_ = null,
                        this.el_ && (this.el_.parentNode && this.el_.parentNode.removeChild(this.el_), Q(this.el_), this.el_ = null),
                        this.player_ = null
                    },
                    e.prototype.player = function() {
                        return this.player_
                    },
                    e.prototype.options = function(e) {
                        return Jt.warn("this.options() has been deprecated and will be moved to the constructor in 6.0"),
                        e ? (this.options_ = ne(this.options_, e), this.options_) : this.options_
                    },
                    e.prototype.el = function() {
                        return this.el_
                    },
                    e.prototype.createEl = function(e, t, n) {
                        return p(e, t, n)
                    },
                    e.prototype.localize = function(e, t) {
                        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : e,
                        i = this.player_.language && this.player_.language(),
                        o = this.player_.languages && this.player_.languages(),
                        r = o && o[i],
                        s = i && i.split("-")[0],
                        a = o && o[s],
                        A = n;
                        return r && r[e] ? A = r[e] : a && a[e] && (A = a[e]),
                        t && (A = A.replace(/\{(\d+)\}/g,
                        function(e, n) {
                            var i = t[n - 1],
                            o = i;
                            return void 0 === i && (o = e),
                            o
                        })),
                        A
                    },
                    e.prototype.contentEl = function() {
                        return this.contentEl_ || this.el_
                    },
                    e.prototype.id = function() {
                        return this.id_
                    },
                    e.prototype.name = function() {
                        return this.name_
                    },
                    e.prototype.children = function() {
                        return this.children_
                    },
                    e.prototype.getChildById = function(e) {
                        return this.childIndex_[e]
                    },
                    e.prototype.getChild = function(e) {
                        if (e) return e = ee(e),
                        this.childNameIndex_[e]
                    },
                    e.prototype.addChild = function(t) {
                        var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : this.children_.length,
                        o = void 0,
                        r = void 0;
                        if ("string" == typeof t) {
                            r = ee(t);
                            var s = n.componentClass || r;
                            n.name = r;
                            var a = e.getComponent(s);
                            if (!a) throw new Error("Component " + s + " does not exist");
                            if ("function" != typeof a) return null;
                            o = new a(this.player_ || this, n)
                        } else o = t;
                        if (this.children_.splice(i, 0, o), "function" == typeof o.id && (this.childIndex_[o.id()] = o), r = r || o.name && ee(o.name()), r && (this.childNameIndex_[r] = o), "function" == typeof o.el && o.el()) {
                            var A = this.contentEl().children,
                            g = A[i] || null;
                            this.contentEl().insertBefore(o.el(), g)
                        }
                        return o
                    },
                    e.prototype.removeChild = function(e) {
                        if ("string" == typeof e && (e = this.getChild(e)), e && this.children_) {
                            for (var t = !1,
                            n = this.children_.length - 1; n >= 0; n--) if (this.children_[n] === e) {
                                t = !0,
                                this.children_.splice(n, 1);
                                break
                            }
                            if (t) {
                                this.childIndex_[e.id()] = null,
                                this.childNameIndex_[e.name()] = null;
                                var i = e.el();
                                i && i.parentNode === this.contentEl() && this.contentEl().removeChild(e.el())
                            }
                        }
                    },
                    e.prototype.initChildren = function() {
                        var t = this,
                        n = this.options_.children;
                        if (n) {
                            var i = this.options_,
                            o = function(e) {
                                var n = e.name,
                                o = e.opts;
                                if (void 0 !== i[n] && (o = i[n]), !1 !== o) { ! 0 === o && (o = {}),
                                    o.playerOptions = t.options_.playerOptions;
                                    var r = t.addChild(n, o);
                                    r && (t[n] = r)
                                }
                            },
                            r = void 0,
                            s = e.getComponent("Tech");
                            r = Array.isArray(n) ? n: Object.keys(n),
                            r.concat(Object.keys(this.options_).filter(function(e) {
                                return ! r.some(function(t) {
                                    return "string" == typeof t ? e === t: e === t.name
                                })
                            })).map(function(e) {
                                var i = void 0,
                                o = void 0;
                                return "string" == typeof e ? (i = e, o = n[i] || t.options_[i] || {}) : (i = e.name, o = e),
                                {
                                    name: i,
                                    opts: o
                                }
                            }).filter(function(t) {
                                var n = e.getComponent(t.opts.componentClass || ee(t.name));
                                return n && !s.isTech(n)
                            }).forEach(o)
                        }
                    },
                    e.prototype.buildCSSClass = function() {
                        return ""
                    },
                    e.prototype.ready = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                        if (e) return this.isReady_ ? void(t ? e.call(this) : this.setTimeout(e, 1)) : (this.readyQueue_ = this.readyQueue_ || [], void this.readyQueue_.push(e))
                    },
                    e.prototype.triggerReady = function() {
                        this.isReady_ = !0,
                        this.setTimeout(function() {
                            var e = this.readyQueue_;
                            this.readyQueue_ = [],
                            e && e.length > 0 && e.forEach(function(e) {
                                e.call(this)
                            },
                            this),
                            this.trigger("ready")
                        },
                        1)
                    },
                    e.prototype.$ = function(e, t) {
                        return $t(e, t || this.contentEl())
                    },
                    e.prototype.$$ = function(e, t) {
                        return en(e, t || this.contentEl())
                    },
                    e.prototype.hasClass = function(e) {
                        return v(this.el_, e)
                    },
                    e.prototype.addClass = function(e) {
                        y(this.el_, e)
                    },
                    e.prototype.removeClass = function(e) {
                        b(this.el_, e)
                    },
                    e.prototype.toggleClass = function(e, t) {
                        _(this.el_, e, t)
                    },
                    e.prototype.show = function() {
                        this.removeClass("vjs-hidden")
                    },
                    e.prototype.hide = function() {
                        this.addClass("vjs-hidden")
                    },
                    e.prototype.lockShowing = function() {
                        this.addClass("vjs-lock-showing")
                    },
                    e.prototype.unlockShowing = function() {
                        this.removeClass("vjs-lock-showing")
                    },
                    e.prototype.getAttribute = function(e) {
                        return T(this.el_, e)
                    },
                    e.prototype.setAttribute = function(e, t) {
                        j(this.el_, e, t)
                    },
                    e.prototype.removeAttribute = function(e) {
                        x(this.el_, e)
                    },
                    e.prototype.width = function(e, t) {
                        return this.dimension("width", e, t)
                    },
                    e.prototype.height = function(e, t) {
                        return this.dimension("height", e, t)
                    },
                    e.prototype.dimensions = function(e, t) {
                        this.width(e, !0),
                        this.height(t)
                    },
                    e.prototype.dimension = function(e, t, n) {
                        if (void 0 !== t) return null !== t && t === t || (t = 0),
                        -1 !== ("" + t).indexOf("%") || -1 !== ("" + t).indexOf("px") ? this.el_.style[e] = t: this.el_.style[e] = "auto" === t ? "": t + "px",
                        void(n || this.trigger("componentresize"));
                        if (!this.el_) return 0;
                        var i = this.el_.style[e],
                        o = i.indexOf("px");
                        return - 1 !== o ? parseInt(i.slice(0, o), 10) : parseInt(this.el_["offset" + ee(e)], 10)
                    },
                    e.prototype.currentDimension = function(e) {
                        var t = 0;
                        if ("width" !== e && "height" !== e) throw new Error("currentDimension only accepts width or height value");
                        if ("function" == typeof lt.getComputedStyle) {
                            var n = lt.getComputedStyle(this.el_);
                            t = n.getPropertyValue(e) || n[e]
                        }
                        if (0 === (t = parseFloat(t))) {
                            var i = "offset" + ee(e);
                            t = this.el_[i]
                        }
                        return t
                    },
                    e.prototype.currentDimensions = function() {
                        return {
                            width: this.currentDimension("width"),
                            height: this.currentDimension("height")
                        }
                    },
                    e.prototype.currentWidth = function() {
                        return this.currentDimension("width")
                    },
                    e.prototype.currentHeight = function() {
                        return this.currentDimension("height")
                    },
                    e.prototype.focus = function() {
                        this.el_.focus()
                    },
                    e.prototype.blur = function() {
                        this.el_.blur()
                    },
                    e.prototype.emitTapEvents = function() {
                        var e = 0,
                        t = null,
                        n = void 0;
                        this.on("touchstart",
                        function(i) {
                            1 === i.touches.length && (t = {
                                pageX: i.touches[0].pageX,
                                pageY: i.touches[0].pageY
                            },
                            e = (new Date).getTime(), n = !0)
                        }),
                        this.on("touchmove",
                        function(e) {
                            if (e.touches.length > 1) n = !1;
                            else if (t) {
                                var i = e.touches[0].pageX - t.pageX,
                                o = e.touches[0].pageY - t.pageY,
                                r = Math.sqrt(i * i + o * o);
                                r > 10 && (n = !1)
                            }
                        });
                        var i = function() {
                            n = !1
                        };
                        this.on("touchleave", i),
                        this.on("touchcancel", i),
                        this.on("touchend",
                        function(i) {
                            if (t = null, !0 === n) { (new Date).getTime() - e < 200 && (i.preventDefault(), this.trigger("tap"))
                            }
                        })
                    },
                    e.prototype.enableTouchActivity = function() {
                        if (this.player() && this.player().reportUserActivity) {
                            var e = hn(this.player(), this.player().reportUserActivity),
                            t = void 0;
                            this.on("touchstart",
                            function() {
                                e(),
                                this.clearInterval(t),
                                t = this.setInterval(e, 250)
                            });
                            var n = function(n) {
                                e(),
                                this.clearInterval(t)
                            };
                            this.on("touchmove", e),
                            this.on("touchend", n),
                            this.on("touchcancel", n)
                        }
                    },
                    e.prototype.setTimeout = function(e, t) {
                        var n = this;
                        e = hn(this, e);
                        var i = lt.setTimeout(e, t),
                        o = function() {
                            return n.clearTimeout(i)
                        };
                        return o.guid = "vjs-timeout-" + i,
                        this.on("dispose", o),
                        i
                    },
                    e.prototype.clearTimeout = function(e) {
                        lt.clearTimeout(e);
                        var t = function() {};
                        return t.guid = "vjs-timeout-" + e,
                        this.off("dispose", t),
                        e
                    },
                    e.prototype.setInterval = function(e, t) {
                        var n = this;
                        e = hn(this, e);
                        var i = lt.setInterval(e, t),
                        o = function() {
                            return n.clearInterval(i)
                        };
                        return o.guid = "vjs-interval-" + i,
                        this.on("dispose", o),
                        i
                    },
                    e.prototype.clearInterval = function(e) {
                        lt.clearInterval(e);
                        var t = function() {};
                        return t.guid = "vjs-interval-" + e,
                        this.off("dispose", t),
                        e
                    },
                    e.prototype.requestAnimationFrame = function(e) {
                        var t = this;
                        if (this.supportsRaf_) {
                            e = hn(this, e);
                            var n = lt.requestAnimationFrame(e),
                            i = function() {
                                return t.cancelAnimationFrame(n)
                            };
                            return i.guid = "vjs-raf-" + n,
                            this.on("dispose", i),
                            n
                        }
                        return this.setTimeout(e, 1e3 / 60)
                    },
                    e.prototype.cancelAnimationFrame = function(e) {
                        if (this.supportsRaf_) {
                            lt.cancelAnimationFrame(e);
                            var t = function() {};
                            return t.guid = "vjs-raf-" + e,
                            this.off("dispose", t),
                            e
                        }
                        return this.clearTimeout(e)
                    },
                    e.registerComponent = function(t, n) {
                        if ("string" != typeof t || !t) throw new Error('Illegal component name, "' + t + '"; must be a non-empty string.');
                        var i = e.getComponent("Tech"),
                        o = i && i.isTech(n),
                        r = e === n || e.prototype.isPrototypeOf(n.prototype);
                        if (o || !r) {
                            var s = void 0;
                            throw s = o ? "techs must be registered using Tech.registerTech()": "must be a Component subclass",
                            new Error('Illegal component, "' + t + '"; ' + s + ".")
                        }
                        t = ee(t),
                        e.components_ || (e.components_ = {});
                        var a = e.getComponent("Player");
                        if ("Player" === t && a && a.players) {
                            var A = a.players,
                            g = Object.keys(A);
                            if (A && g.length > 0 && g.map(function(e) {
                                return A[e]
                            }).every(Boolean)) throw new Error("Can not register Player component after player has been created.")
                        }
                        return e.components_[t] = n,
                        n
                    },
                    e.getComponent = function(t) {
                        if (t) return t = ee(t),
                        e.components_ && e.components_[t] ? e.components_[t] : void 0
                    },
                    e
                } ();
                Tn.prototype.supportsRaf_ = "function" == typeof lt.requestAnimationFrame && "function" == typeof lt.cancelAnimationFrame,
                Tn.registerComponent("Component", Tn);
                for (var jn = {},
                xn = [["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenEnabled", "fullscreenchange", "fullscreenerror"], ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitFullscreenEnabled", "webkitfullscreenchange", "webkitfullscreenerror"], ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitCancelFullScreen", "webkitfullscreenchange", "webkitfullscreenerror"], ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozFullScreenEnabled", "mozfullscreenchange", "mozfullscreenerror"], ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "msFullscreenEnabled", "MSFullscreenChange", "MSFullscreenError"]], kn = xn[0], Sn = void 0, Dn = 0; Dn < xn.length; Dn++) if (xn[Dn][1] in ut) {
                    Sn = xn[Dn];
                    break
                }
                if (Sn) for (var Bn = 0; Bn < Sn.length; Bn++) jn[kn[Bn]] = Sn[Bn];
                Ae.prototype.code = 0,
                Ae.prototype.message = "",
                Ae.prototype.status = null,
                Ae.errorTypes = ["MEDIA_ERR_CUSTOM", "MEDIA_ERR_ABORTED", "MEDIA_ERR_NETWORK", "MEDIA_ERR_DECODE", "MEDIA_ERR_SRC_NOT_SUPPORTED", "MEDIA_ERR_ENCRYPTED"],
                Ae.defaultMessages = {
                    1 : "You aborted the media playback",
                    2 : "A network error caused the media download to fail part-way.",
                    3 : "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.",
                    4 : "The media could not be loaded, either because the server or network failed or because the format is not supported.",
                    5 : "The media is encrypted and we do not have the keys to decrypt it."
                };
                for (var On = 0; On < Ae.errorTypes.length; On++) Ae[Ae.errorTypes[On]] = On,
                Ae.prototype[Ae.errorTypes[On]] = On;
                var Rn = ge,
                Mn = function(e) {
                    return ["kind", "label", "language", "id", "inBandMetadataTrackDispatchType", "mode", "src"].reduce(function(t, n, i) {
                        return e[n] && (t[n] = e[n]),
                        t
                    },
                    {
                        cues: e.cues && Array.prototype.map.call(e.cues,
                        function(e) {
                            return {
                                startTime: e.startTime,
                                endTime: e.endTime,
                                text: e.text,
                                id: e.id
                            }
                        })
                    })
                },
                Pn = function(e) {
                    var t = e.$$("track"),
                    n = Array.prototype.map.call(t,
                    function(e) {
                        return e.track
                    });
                    return Array.prototype.map.call(t,
                    function(e) {
                        var t = Mn(e.track);
                        return e.src && (t.src = e.src),
                        t
                    }).concat(Array.prototype.filter.call(e.textTracks(),
                    function(e) {
                        return - 1 === n.indexOf(e)
                    }).map(Mn))
                },
                Fn = function(e, t) {
                    return e.forEach(function(e) {
                        var n = t.addRemoteTextTrack(e).track; ! e.src && e.cues && e.cues.forEach(function(e) {
                            return n.addCue(e)
                        })
                    }),
                    t.textTracks()
                },
                Ln = {
                    textTracksToJson: Pn,
                    jsonToTextTracks: Fn,
                    trackToJson_: Mn
                },
                Nn = "vjs-modal-dialog",
                Hn = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.opened_ = o.hasBeenOpened_ = o.hasBeenFilled_ = !1,
                        o.closeable(!o.options_.uncloseable),
                        o.content(o.options_.content),
                        o.contentEl_ = p("div", {
                            className: Nn + "-content"
                        },
                        {
                            role: "document"
                        }),
                        o.descEl_ = p("p", {
                            className: Nn + "-description vjs-control-text",
                            id: o.el().getAttribute("aria-describedby")
                        }),
                        f(o.descEl_, o.description()),
                        o.el_.appendChild(o.descEl_),
                        o.el_.appendChild(o.contentEl_),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: this.buildCSSClass(),
                            tabIndex: -1
                        },
                        {
                            "aria-describedby": this.id() + "_description",
                            "aria-hidden": "true",
                            "aria-label": this.label(),
                            role: "dialog"
                        })
                    },
                    t.prototype.dispose = function() {
                        this.contentEl_ = null,
                        this.descEl_ = null,
                        this.previouslyActiveEl_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.buildCSSClass = function() {
                        return Nn + " vjs-hidden " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.handleKeyPress = function(e) {
                        27 === e.which && this.closeable() && this.close()
                    },
                    t.prototype.label = function() {
                        return this.localize(this.options_.label || "Modal Window")
                    },
                    t.prototype.description = function() {
                        var e = this.options_.description || this.localize("This is a modal window.");
                        return this.closeable() && (e += " " + this.localize("This modal can be closed by pressing the Escape key or activating the close button.")),
                        e
                    },
                    t.prototype.open = function() {
                        if (!this.opened_) {
                            var e = this.player();
                            this.trigger("beforemodalopen"),
                            this.opened_ = !0,
                            (this.options_.fillAlways || !this.hasBeenOpened_ && !this.hasBeenFilled_) && this.fill(),
                            this.wasPlaying_ = !e.paused(),
                            this.options_.pauseOnOpen && this.wasPlaying_ && e.pause(),
                            this.closeable() && this.on(this.el_.ownerDocument, "keydown", hn(this, this.handleKeyPress)),
                            this.hadControls_ = e.controls(),
                            e.controls(!1),
                            this.show(),
                            this.conditionalFocus_(),
                            this.el().setAttribute("aria-hidden", "false"),
                            this.trigger("modalopen"),
                            this.hasBeenOpened_ = !0
                        }
                    },
                    t.prototype.opened = function(e) {
                        return "boolean" == typeof e && this[e ? "open": "close"](),
                        this.opened_
                    },
                    t.prototype.close = function() {
                        if (this.opened_) {
                            var e = this.player();
                            this.trigger("beforemodalclose"),
                            this.opened_ = !1,
                            this.wasPlaying_ && this.options_.pauseOnOpen && e.play(),
                            this.closeable() && this.off(this.el_.ownerDocument, "keydown", hn(this, this.handleKeyPress)),
                            this.hadControls_ && e.controls(!0),
                            this.hide(),
                            this.el().setAttribute("aria-hidden", "true"),
                            this.trigger("modalclose"),
                            this.conditionalBlur_(),
                            this.options_.temporary && this.dispose()
                        }
                    },
                    t.prototype.closeable = function(e) {
                        if ("boolean" == typeof e) {
                            var t = this.closeable_ = !!e,
                            n = this.getChild("closeButton");
                            if (t && !n) {
                                var i = this.contentEl_;
                                this.contentEl_ = this.el_,
                                n = this.addChild("closeButton", {
                                    controlText: "Close Modal Dialog"
                                }),
                                this.contentEl_ = i,
                                this.on(n, "close", this.close)
                            } ! t && n && (this.off(n, "close", this.close), this.removeChild(n), n.dispose())
                        }
                        return this.closeable_
                    },
                    t.prototype.fill = function() {
                        this.fillWith(this.content())
                    },
                    t.prototype.fillWith = function(e) {
                        var t = this.contentEl(),
                        n = t.parentNode,
                        i = t.nextSibling;
                        this.trigger("beforemodalfill"),
                        this.hasBeenFilled_ = !0,
                        n.removeChild(t),
                        this.empty(),
                        L(t, e),
                        this.trigger("modalfill"),
                        i ? n.insertBefore(t, i) : n.appendChild(t);
                        var o = this.getChild("closeButton");
                        o && n.appendChild(o.el_)
                    },
                    t.prototype.empty = function() {
                        this.trigger("beforemodalempty"),
                        M(this.contentEl()),
                        this.trigger("modalempty")
                    },
                    t.prototype.content = function(e) {
                        return void 0 !== e && (this.content_ = e),
                        this.content_
                    },
                    t.prototype.conditionalFocus_ = function() {
                        var e = ut.activeElement,
                        t = this.player_.el_;
                        this.previouslyActiveEl_ = null,
                        (t.contains(e) || t === e) && (this.previouslyActiveEl_ = e, this.focus(), this.on(ut, "keydown", this.handleKeyDown))
                    },
                    t.prototype.conditionalBlur_ = function() {
                        this.previouslyActiveEl_ && (this.previouslyActiveEl_.focus(), this.previouslyActiveEl_ = null),
                        this.off(ut, "keydown", this.handleKeyDown)
                    },
                    t.prototype.handleKeyDown = function(e) {
                        if (9 === e.which) {
                            for (var t = this.focusableEls_(), n = this.el_.querySelector(":focus"), i = void 0, o = 0; o < t.length; o++) if (n === t[o]) {
                                i = o;
                                break
                            }
                            ut.activeElement === this.el_ && (i = 0),
                            e.shiftKey && 0 === i ? (t[t.length - 1].focus(), e.preventDefault()) : e.shiftKey || i !== t.length - 1 || (t[0].focus(), e.preventDefault())
                        }
                    },
                    t.prototype.focusableEls_ = function() {
                        var e = this.el_.querySelectorAll("*");
                        return Array.prototype.filter.call(e,
                        function(e) {
                            return (e instanceof lt.HTMLAnchorElement || e instanceof lt.HTMLAreaElement) && e.hasAttribute("href") || (e instanceof lt.HTMLInputElement || e instanceof lt.HTMLSelectElement || e instanceof lt.HTMLTextAreaElement || e instanceof lt.HTMLButtonElement) && !e.hasAttribute("disabled") || e instanceof lt.HTMLIFrameElement || e instanceof lt.HTMLObjectElement || e instanceof lt.HTMLEmbedElement || e.hasAttribute("tabindex") && -1 !== e.getAttribute("tabindex") || e.hasAttribute("contenteditable")
                        })
                    },
                    t
                } (Tn);
                Hn.prototype.options_ = {
                    pauseOnOpen: !0,
                    temporary: !0
                },
                Tn.registerComponent("ModalDialog", Hn);
                var zn = function(e) {
                    function t() {
                        var n, i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                        o = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                        Ht(this, t);
                        var r = Yt(this, e.call(this));
                        if (!o && (o = r, Bt)) {
                            o = ut.createElement("custom");
                            for (var s in t.prototype)"constructor" !== s && (o[s] = t.prototype[s])
                        }
                        o.tracks_ = [],
                        Object.defineProperty(o, "length", {
                            get: function() {
                                return this.tracks_.length
                            }
                        });
                        for (var a = 0; a < i.length; a++) o.addTrack(i[a]);
                        return n = o,
                        Yt(r, n)
                    }
                    return zt(t, e),
                    t.prototype.addTrack = function(e) {
                        var t = this.tracks_.length;
                        "" + t in this || Object.defineProperty(this, t, {
                            get: function() {
                                return this.tracks_[t]
                            }
                        }),
                        -1 === this.tracks_.indexOf(e) && (this.tracks_.push(e), this.trigger({
                            track: e,
                            type: "addtrack"
                        }))
                    },
                    t.prototype.removeTrack = function(e) {
                        for (var t = void 0,
                        n = 0,
                        i = this.length; n < i; n++) if (this[n] === e) {
                            t = this[n],
                            t.off && t.off(),
                            this.tracks_.splice(n, 1);
                            break
                        }
                        t && this.trigger({
                            track: t,
                            type: "removetrack"
                        })
                    },
                    t.prototype.getTrackById = function(e) {
                        for (var t = null,
                        n = 0,
                        i = this.length; n < i; n++) {
                            var o = this[n];
                            if (o.id === e) {
                                t = o;
                                break
                            }
                        }
                        return t
                    },
                    t
                } (dn);
                zn.prototype.allowedEvents_ = {
                    change: "change",
                    addtrack: "addtrack",
                    removetrack: "removetrack"
                };
                for (var Yn in zn.prototype.allowedEvents_) zn.prototype["on" + Yn] = null;
                var Qn = function(e, t) {
                    for (var n = 0; n < e.length; n++) Object.keys(e[n]).length && t.id !== e[n].id && (e[n].enabled = !1)
                },
                Wn = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                        Ht(this, t);
                        for (var r = void 0,
                        s = o.length - 1; s >= 0; s--) if (o[s].enabled) {
                            Qn(o, o[s]);
                            break
                        }
                        if (Bt) {
                            r = ut.createElement("custom");
                            for (var a in zn.prototype)"constructor" !== a && (r[a] = zn.prototype[a]);
                            for (var A in t.prototype)"constructor" !== A && (r[A] = t.prototype[A])
                        }
                        return r = n = Yt(this, e.call(this, o, r)),
                        r.changing_ = !1,
                        i = r,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t.prototype.addTrack = function(t) {
                        var n = this;
                        t.enabled && Qn(this, t),
                        e.prototype.addTrack.call(this, t),
                        t.addEventListener && t.addEventListener("enabledchange",
                        function() {
                            n.changing_ || (n.changing_ = !0, Qn(n, t), n.changing_ = !1, n.trigger("change"))
                        })
                    },
                    t
                } (zn),
                Un = function(e, t) {
                    for (var n = 0; n < e.length; n++) Object.keys(e[n]).length && t.id !== e[n].id && (e[n].selected = !1)
                },
                Vn = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                        Ht(this, t);
                        for (var r = void 0,
                        s = o.length - 1; s >= 0; s--) if (o[s].selected) {
                            Un(o, o[s]);
                            break
                        }
                        if (Bt) {
                            r = ut.createElement("custom");
                            for (var a in zn.prototype)"constructor" !== a && (r[a] = zn.prototype[a]);
                            for (var A in t.prototype)"constructor" !== A && (r[A] = t.prototype[A])
                        }
                        return r = n = Yt(this, e.call(this, o, r)),
                        r.changing_ = !1,
                        Object.defineProperty(r, "selectedIndex", {
                            get: function() {
                                for (var e = 0; e < this.length; e++) if (this[e].selected) return e;
                                return - 1
                            },
                            set: function() {}
                        }),
                        i = r,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t.prototype.addTrack = function(t) {
                        var n = this;
                        t.selected && Un(this, t),
                        e.prototype.addTrack.call(this, t),
                        t.addEventListener && t.addEventListener("selectedchange",
                        function() {
                            n.changing_ || (n.changing_ = !0, Un(n, t), n.changing_ = !1, n.trigger("change"))
                        })
                    },
                    t
                } (zn),
                Gn = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                        Ht(this, t);
                        var r = void 0;
                        if (Bt) {
                            r = ut.createElement("custom");
                            for (var s in zn.prototype)"constructor" !== s && (r[s] = zn.prototype[s]);
                            for (var a in t.prototype)"constructor" !== a && (r[a] = t.prototype[a])
                        }
                        return r = n = Yt(this, e.call(this, o, r)),
                        i = r,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t.prototype.addTrack = function(t) {
                        e.prototype.addTrack.call(this, t),
                        t.addEventListener("modechange", hn(this,
                        function() {
                            this.trigger("change")
                        })),
                        -1 === ["metadata", "chapters"].indexOf(t.kind) && t.addEventListener("modechange", hn(this,
                        function() {
                            this.trigger("selectedlanguagechange")
                        }))
                    },
                    t
                } (zn),
                Xn = function() {
                    function e() {
                        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                        Ht(this, e);
                        var n = this;
                        if (Bt) {
                            n = ut.createElement("custom");
                            for (var i in e.prototype)"constructor" !== i && (n[i] = e.prototype[i])
                        }
                        n.trackElements_ = [],
                        Object.defineProperty(n, "length", {
                            get: function() {
                                return this.trackElements_.length
                            }
                        });
                        for (var o = 0,
                        r = t.length; o < r; o++) n.addTrackElement_(t[o]);
                        if (Bt) return n
                    }
                    return e.prototype.addTrackElement_ = function(e) {
                        var t = this.trackElements_.length;
                        "" + t in this || Object.defineProperty(this, t, {
                            get: function() {
                                return this.trackElements_[t]
                            }
                        }),
                        -1 === this.trackElements_.indexOf(e) && this.trackElements_.push(e)
                    },
                    e.prototype.getTrackElementByTrack_ = function(e) {
                        for (var t = void 0,
                        n = 0,
                        i = this.trackElements_.length; n < i; n++) if (e === this.trackElements_[n].track) {
                            t = this.trackElements_[n];
                            break
                        }
                        return t
                    },
                    e.prototype.removeTrackElement_ = function(e) {
                        for (var t = 0,
                        n = this.trackElements_.length; t < n; t++) if (e === this.trackElements_[t]) {
                            this.trackElements_.splice(t, 1);
                            break
                        }
                    },
                    e
                } (),
                Zn = function() {
                    function e(t) {
                        Ht(this, e);
                        var n = this;
                        if (Bt) {
                            n = ut.createElement("custom");
                            for (var i in e.prototype)"constructor" !== i && (n[i] = e.prototype[i])
                        }
                        if (e.prototype.setCues_.call(n, t), Object.defineProperty(n, "length", {
                            get: function() {
                                return this.length_
                            }
                        }), Bt) return n
                    }
                    return e.prototype.setCues_ = function(e) {
                        var t = this.length || 0,
                        n = 0,
                        i = e.length;
                        this.cues_ = e,
                        this.length_ = e.length;
                        var o = function(e) {
                            "" + e in this || Object.defineProperty(this, "" + e, {
                                get: function() {
                                    return this.cues_[e]
                                }
                            })
                        };
                        if (t < i) for (n = t; n < i; n++) o.call(this, n)
                    },
                    e.prototype.getCueById = function(e) {
                        for (var t = null,
                        n = 0,
                        i = this.length; n < i; n++) {
                            var o = this[n];
                            if (o.id === e) {
                                t = o;
                                break
                            }
                        }
                        return t
                    },
                    e
                } (),
                Jn = {
                    alternative: "alternative",
                    captions: "captions",
                    main: "main",
                    sign: "sign",
                    subtitles: "subtitles",
                    commentary: "commentary"
                },
                Kn = {
                    alternative: "alternative",
                    descriptions: "descriptions",
                    main: "main",
                    "main-desc": "main-desc",
                    translation: "translation",
                    commentary: "commentary"
                },
                qn = {
                    subtitles: "subtitles",
                    captions: "captions",
                    descriptions: "descriptions",
                    chapters: "chapters",
                    metadata: "metadata"
                },
                $n = {
                    disabled: "disabled",
                    hidden: "hidden",
                    showing: "showing"
                },
                ei = function(e) {
                    function t() {
                        var n, i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        Ht(this, t);
                        var o = Yt(this, e.call(this)),
                        r = o;
                        if (Bt) {
                            r = ut.createElement("custom");
                            for (var s in t.prototype)"constructor" !== s && (r[s] = t.prototype[s])
                        }
                        var a = {
                            id: i.id || "vjs_track_" + H(),
                            kind: i.kind || "",
                            label: i.label || "",
                            language: i.language || ""
                        };
                        for (var A in a) !
                        function(e) {
                            Object.defineProperty(r, e, {
                                get: function() {
                                    return a[e]
                                },
                                set: function() {}
                            })
                        } (A);
                        return n = r,
                        Yt(o, n)
                    }
                    return zt(t, e),
                    t
                } (dn),
                ti = function(e) {
                    var t = ["protocol", "hostname", "port", "pathname", "search", "hash", "host"],
                    n = ut.createElement("a");
                    n.href = e;
                    var i = "" === n.host && "file:" !== n.protocol,
                    o = void 0;
                    i && (o = ut.createElement("div"), o.innerHTML = '<a href="' + e + '"></a>', n = o.firstChild, o.setAttribute("style", "display:none; position:absolute;"), ut.body.appendChild(o));
                    for (var r = {},
                    s = 0; s < t.length; s++) r[t[s]] = n[t[s]];
                    return "http:" === r.protocol && (r.host = r.host.replace(/:80$/, "")),
                    "https:" === r.protocol && (r.host = r.host.replace(/:443$/, "")),
                    r.protocol || (r.protocol = lt.location.protocol),
                    i && ut.body.removeChild(o),
                    r
                },
                ni = function(e) {
                    if (!e.match(/^https?:\/\//)) {
                        var t = ut.createElement("div");
                        t.innerHTML = '<a href="' + e + '">x</a>',
                        e = t.firstChild.href
                    }
                    return e
                },
                ii = function(e) {
                    if ("string" == typeof e) {
                        var t = /^(\/?)([\s\S]*?)((?:\.{1,2}|[^\/]+?)(\.([^\.\/\?]+)))(?:[\/]*|[\?].*)$/i,
                        n = t.exec(e);
                        if (n) return n.pop().toLowerCase()
                    }
                    return ""
                },
                oi = function(e) {
                    var t = lt.location,
                    n = ti(e);
                    return (":" === n.protocol ? t.protocol: n.protocol) + n.host !== t.protocol + t.host
                },
                ri = (Object.freeze || Object)({
                    parseUrl: ti,
                    getAbsoluteURL: ni,
                    getFileExtension: ii,
                    isCrossOrigin: oi
                }),
                si = Ce,
                ai = Object.prototype.toString,
                Ai = e(function(e, t) {
                    function n(e) {
                        return e.replace(/^\s*|\s*$/g, "")
                    }
                    t = e.exports = n,
                    t.left = function(e) {
                        return e.replace(/^\s*/, "")
                    },
                    t.right = function(e) {
                        return e.replace(/\s*$/, "")
                    }
                }),
                gi = Ie,
                li = Object.prototype.toString,
                ci = Object.prototype.hasOwnProperty,
                Ci = function(e) {
                    return "[object Array]" === Object.prototype.toString.call(e)
                },
                Ii = function(e) {
                    if (!e) return {};
                    var t = {};
                    return gi(Ai(e).split("\n"),
                    function(e) {
                        var n = e.indexOf(":"),
                        i = Ai(e.slice(0, n)).toLowerCase(),
                        o = Ai(e.slice(n + 1));
                        void 0 === t[i] ? t[i] = o: Ci(t[i]) ? t[i].push(o) : t[i] = [t[i], o]
                    }),
                    t
                },
                hi = pe,
                ui = Object.prototype.hasOwnProperty,
                di = ve;
                ve.XMLHttpRequest = lt.XMLHttpRequest || _e,
                ve.XDomainRequest = "withCredentials" in new ve.XMLHttpRequest ? ve.XMLHttpRequest: lt.XDomainRequest,
                function(e, t) {
                    for (var n = 0; n < e.length; n++) t(e[n])
                } (["get", "put", "post", "patch", "head", "delete"],
                function(e) {
                    ve["delete" === e ? "del": e] = function(t, n, i) {
                        return n = me(t, n, i),
                        n.method = e.toUpperCase(),
                        ye(n)
                    }
                });
                var pi = function(e, t) {
                    var n = new lt.WebVTT.Parser(lt, lt.vttjs, lt.WebVTT.StringDecoder()),
                    i = [];
                    n.oncue = function(e) {
                        t.addCue(e)
                    },
                    n.onparsingerror = function(e) {
                        i.push(e)
                    },
                    n.onflush = function() {
                        t.trigger({
                            type: "loadeddata",
                            target: t
                        })
                    },
                    n.parse(e),
                    i.length > 0 && (lt.console && lt.console.groupCollapsed && lt.console.groupCollapsed("Text Track parsing errors for " + t.src), i.forEach(function(e) {
                        return Jt.error(e)
                    }), lt.console && lt.console.groupEnd && lt.console.groupEnd()),
                    n.flush()
                },
                fi = function(e, t) {
                    var n = {
                        uri: e
                    },
                    i = oi(e);
                    i && (n.cors = i),
                    di(n, hn(this,
                    function(e, n, i) {
                        if (e) return Jt.error(e, n);
                        if (t.loaded_ = !0, "function" != typeof lt.WebVTT) {
                            if (t.tech_) {
                                var o = function() {
                                    return pi(i, t)
                                };
                                t.tech_.on("vttjsloaded", o),
                                t.tech_.on("vttjserror",
                                function() {
                                    Jt.error("vttjs failed to load, stopping trying to process " + t.src),
                                    t.tech_.off("vttjsloaded", o)
                                })
                            }
                        } else pi(i, t)
                    }))
                },
                mi = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        if (Ht(this, t), !o.tech) throw new Error("A tech was not provided.");
                        var r = ne(o, {
                            kind: qn[o.kind] || "subtitles",
                            language: o.language || o.srclang || ""
                        }),
                        s = $n[r.mode] || "disabled",
                        a = r.
                    default;
                        "metadata" !== r.kind && "chapters" !== r.kind || (s = "hidden");
                        var A = n = Yt(this, e.call(this, r));
                        if (A.tech_ = r.tech, Bt) for (var g in t.prototype)"constructor" !== g && (A[g] = t.prototype[g]);
                        A.cues_ = [],
                        A.activeCues_ = [];
                        var l = new Zn(A.cues_),
                        c = new Zn(A.activeCues_),
                        C = !1,
                        I = hn(A,
                        function() {
                            this.activeCues,
                            C && (this.trigger("cuechange"), C = !1)
                        });
                        return "disabled" !== s && A.tech_.ready(function() {
                            A.tech_.on("timeupdate", I)
                        },
                        !0),
                        Object.defineProperty(A, "default", {
                            get: function() {
                                return a
                            },
                            set: function() {}
                        }),
                        Object.defineProperty(A, "mode", {
                            get: function() {
                                return s
                            },
                            set: function(e) {
                                var t = this;
                                $n[e] && (s = e, "showing" === s && this.tech_.ready(function() {
                                    t.tech_.on("timeupdate", I)
                                },
                                !0), this.trigger("modechange"))
                            }
                        }),
                        Object.defineProperty(A, "cues", {
                            get: function() {
                                return this.loaded_ ? l: null
                            },
                            set: function() {}
                        }),
                        Object.defineProperty(A, "activeCues", {
                            get: function() {
                                if (!this.loaded_) return null;
                                if (0 === this.cues.length) return c;
                                for (var e = this.tech_.currentTime(), t = [], n = 0, i = this.cues.length; n < i; n++) {
                                    var o = this.cues[n];
                                    o.startTime <= e && o.endTime >= e ? t.push(o) : o.startTime === o.endTime && o.startTime <= e && o.startTime + .5 >= e && t.push(o)
                                }
                                if (C = !1, t.length !== this.activeCues_.length) C = !0;
                                else for (var r = 0; r < t.length; r++) - 1 === this.activeCues_.indexOf(t[r]) && (C = !0);
                                return this.activeCues_ = t,
                                c.setCues_(this.activeCues_),
                                c
                            },
                            set: function() {}
                        }),
                        r.src ? (A.src = r.src, fi(r.src, A)) : A.loaded_ = !0,
                        i = A,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t.prototype.addCue = function(e) {
                        var t = e;
                        if (lt.vttjs && !(e instanceof lt.vttjs.VTTCue)) {
                            t = new lt.vttjs.VTTCue(e.startTime, e.endTime, e.text);
                            for (var n in e) n in t || (t[n] = e[n]);
                            t.id = e.id,
                            t.originalCue_ = e
                        }
                        for (var i = this.tech_.textTracks(), o = 0; o < i.length; o++) i[o] !== this && i[o].removeCue(t);
                        this.cues_.push(t),
                        this.cues.setCues_(this.cues_)
                    },
                    t.prototype.removeCue = function(e) {
                        for (var t = this.cues_.length; t--;) {
                            var n = this.cues_[t];
                            if (n === e || n.originalCue_ && n.originalCue_ === e) {
                                this.cues_.splice(t, 1),
                                this.cues.setCues_(this.cues_);
                                break
                            }
                        }
                    },
                    t
                } (ei);
                mi.prototype.allowedEvents_ = {
                    cuechange: "cuechange"
                };
                var vi = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        Ht(this, t);
                        var r = ne(o, {
                            kind: Kn[o.kind] || ""
                        }),
                        s = n = Yt(this, e.call(this, r)),
                        a = !1;
                        if (Bt) for (var A in t.prototype)"constructor" !== A && (s[A] = t.prototype[A]);
                        return Object.defineProperty(s, "enabled", {
                            get: function() {
                                return a
                            },
                            set: function(e) {
                                "boolean" == typeof e && e !== a && (a = e, this.trigger("enabledchange"))
                            }
                        }),
                        r.enabled && (s.enabled = r.enabled),
                        s.loaded_ = !0,
                        i = s,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t
                } (ei),
                yi = function(e) {
                    function t() {
                        var n, i, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        Ht(this, t);
                        var r = ne(o, {
                            kind: Jn[o.kind] || ""
                        }),
                        s = n = Yt(this, e.call(this, r)),
                        a = !1;
                        if (Bt) for (var A in t.prototype)"constructor" !== A && (s[A] = t.prototype[A]);
                        return Object.defineProperty(s, "selected", {
                            get: function() {
                                return a
                            },
                            set: function(e) {
                                "boolean" == typeof e && e !== a && (a = e, this.trigger("selectedchange"))
                            }
                        }),
                        r.selected && (s.selected = r.selected),
                        i = s,
                        Yt(n, i)
                    }
                    return zt(t, e),
                    t
                } (ei),
                bi = 0,
                _i = 2,
                wi = function(e) {
                    function t() {
                        var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        Ht(this, t);
                        var i = Yt(this, e.call(this)),
                        o = void 0,
                        r = i;
                        if (Bt) {
                            r = ut.createElement("custom");
                            for (var s in t.prototype)"constructor" !== s && (r[s] = t.prototype[s])
                        }
                        var a = new mi(n);
                        if (r.kind = a.kind, r.src = a.src, r.srclang = a.language, r.label = a.label, r.
                    default = a.
                    default, Object.defineProperty(r, "readyState", {
                            get: function() {
                                return o
                            }
                        }), Object.defineProperty(r, "track", {
                            get: function() {
                                return a
                            }
                        }), o = bi, a.addEventListener("loadeddata",
                        function() {
                            o = _i,
                            r.trigger({
                                type: "load",
                                target: r
                            })
                        }), Bt) {
                            var A;
                            return A = r,
                            Yt(i, A)
                        }
                        return i
                    }
                    return zt(t, e),
                    t
                } (dn);
                wi.prototype.allowedEvents_ = {
                    load: "load"
                },
                wi.NONE = bi,
                wi.LOADING = 1,
                wi.LOADED = _i,
                wi.ERROR = 3;
                var Ei = {
                    audio: {
                        ListClass: Wn,
                        TrackClass: vi,
                        capitalName: "Audio"
                    },
                    video: {
                        ListClass: Vn,
                        TrackClass: yi,
                        capitalName: "Video"
                    },
                    text: {
                        ListClass: Gn,
                        TrackClass: mi,
                        capitalName: "Text"
                    }
                };
                Object.keys(Ei).forEach(function(e) {
                    Ei[e].getterName = e + "Tracks",
                    Ei[e].privateName = e + "Tracks_"
                });
                var Ti = {
                    remoteText: {
                        ListClass: Gn,
                        TrackClass: mi,
                        capitalName: "RemoteText",
                        getterName: "remoteTextTracks",
                        privateName: "remoteTextTracks_"
                    },
                    remoteTextEl: {
                        ListClass: Xn,
                        TrackClass: wi,
                        capitalName: "RemoteTextTrackEls",
                        getterName: "remoteTextTrackEls",
                        privateName: "remoteTextTrackEls_"
                    }
                },
                ji = ne(Ei, Ti);
                Ti.names = Object.keys(Ti),
                Ei.names = Object.keys(Ei),
                ji.names = [].concat(Ti.names).concat(Ei.names);
                var xi = Object.create ||
                function() {
                    function e() {}
                    return function(t) {
                        if (1 !== arguments.length) throw new Error("Object.create shim only accepts one parameter.");
                        return e.prototype = t,
                        new e
                    }
                } ();
                we.prototype = xi(Error.prototype),
                we.prototype.constructor = we,
                we.Errors = {
                    BadSignature: {
                        code: 0,
                        message: "Malformed WebVTT signature."
                    },
                    BadTimeStamp: {
                        code: 1,
                        message: "Malformed time stamp."
                    }
                },
                Te.prototype = {
                    set: function(e, t) {
                        this.get(e) || "" === t || (this.values[e] = t)
                    },
                    get: function(e, t, n) {
                        return n ? this.has(e) ? this.values[e] : t[n] : this.has(e) ? this.values[e] : t
                    },
                    has: function(e) {
                        return e in this.values
                    },
                    alt: function(e, t, n) {
                        for (var i = 0; i < n.length; ++i) if (t === n[i]) {
                            this.set(e, t);
                            break
                        }
                    },
                    integer: function(e, t) { / ^-?\d + $ / .test(t) && this.set(e, parseInt(t, 10))
                    },
                    percent: function(e, t) {
                        return !! (t.match(/^([\d]{1,3})(\.[\d]*)?%$/) && (t = parseFloat(t)) >= 0 && t <= 100) && (this.set(e, t), !0)
                    }
                };
                var ki = {
                    "&amp;": "&",
                    "&lt;": "<",
                    "&gt;": ">",
                    "&lrm;": "‎",
                    "&rlm;": "‏",
                    "&nbsp;": " "
                },
                Si = {
                    c: "span",
                    i: "i",
                    b: "b",
                    u: "u",
                    ruby: "ruby",
                    rt: "rt",
                    v: "span",
                    lang: "span"
                },
                Di = {
                    v: "title",
                    lang: "lang"
                },
                Bi = {
                    rt: "ruby"
                },
                Oi = [[1470, 1470], [1472, 1472], [1475, 1475], [1478, 1478], [1488, 1514], [1520, 1524], [1544, 1544], [1547, 1547], [1549, 1549], [1563, 1563], [1566, 1610], [1645, 1647], [1649, 1749], [1765, 1766], [1774, 1775], [1786, 1805], [1807, 1808], [1810, 1839], [1869, 1957], [1969, 1969], [1984, 2026], [2036, 2037], [2042, 2042], [2048, 2069], [2074, 2074], [2084, 2084], [2088, 2088], [2096, 2110], [2112, 2136], [2142, 2142], [2208, 2208], [2210, 2220], [8207, 8207], [64285, 64285], [64287, 64296], [64298, 64310], [64312, 64316], [64318, 64318], [64320, 64321], [64323, 64324], [64326, 64449], [64467, 64829], [64848, 64911], [64914, 64967], [65008, 65020], [65136, 65140], [65142, 65276], [67584, 67589], [67592, 67592], [67594, 67637], [67639, 67640], [67644, 67644], [67647, 67669], [67671, 67679], [67840, 67867], [67872, 67897], [67903, 67903], [67968, 68023], [68030, 68031], [68096, 68096], [68112, 68115], [68117, 68119], [68121, 68147], [68160, 68167], [68176, 68184], [68192, 68223], [68352, 68405], [68416, 68437], [68440, 68466], [68472, 68479], [68608, 68680], [126464, 126467], [126469, 126495], [126497, 126498], [126500, 126500], [126503, 126503], [126505, 126514], [126516, 126519], [126521, 126521], [126523, 126523], [126530, 126530], [126535, 126535], [126537, 126537], [126539, 126539], [126541, 126543], [126545, 126546], [126548, 126548], [126551, 126551], [126553, 126553], [126555, 126555], [126557, 126557], [126559, 126559], [126561, 126562], [126564, 126564], [126567, 126570], [126572, 126578], [126580, 126583], [126585, 126588], [126590, 126590], [126592, 126601], [126603, 126619], [126625, 126627], [126629, 126633], [126635, 126651], [1114109, 1114109]];
                Oe.prototype.applyStyles = function(e, t) {
                    t = t || this.div;
                    for (var n in e) e.hasOwnProperty(n) && (t.style[n] = e[n])
                },
                Oe.prototype.formatStyle = function(e, t) {
                    return 0 === e ? 0 : e + t
                },
                Re.prototype = xi(Oe.prototype),
                Re.prototype.constructor = Re,
                Me.prototype.move = function(e, t) {
                    switch (t = void 0 !== t ? t: this.lineHeight, e) {
                    case "+x":
                        this.left += t,
                        this.right += t;
                        break;
                    case "-x":
                        this.left -= t,
                        this.right -= t;
                        break;
                    case "+y":
                        this.top += t,
                        this.bottom += t;
                        break;
                    case "-y":
                        this.top -= t,
                        this.bottom -= t
                    }
                },
                Me.prototype.overlaps = function(e) {
                    return this.left < e.right && this.right > e.left && this.top < e.bottom && this.bottom > e.top
                },
                Me.prototype.overlapsAny = function(e) {
                    for (var t = 0; t < e.length; t++) if (this.overlaps(e[t])) return ! 0;
                    return ! 1
                },
                Me.prototype.within = function(e) {
                    return this.top >= e.top && this.bottom <= e.bottom && this.left >= e.left && this.right <= e.right
                },
                Me.prototype.overlapsOppositeAxis = function(e, t) {
                    switch (t) {
                    case "+x":
                        return this.left < e.left;
                    case "-x":
                        return this.right > e.right;
                    case "+y":
                        return this.top < e.top;
                    case "-y":
                        return this.bottom > e.bottom
                    }
                },
                Me.prototype.intersectPercentage = function(e) {
                    return Math.max(0, Math.min(this.right, e.right) - Math.max(this.left, e.left)) * Math.max(0, Math.min(this.bottom, e.bottom) - Math.max(this.top, e.top)) / (this.height * this.width)
                },
                Me.prototype.toCSSCompatValues = function(e) {
                    return {
                        top: this.top - e.top,
                        bottom: e.bottom - this.bottom,
                        left: this.left - e.left,
                        right: e.right - this.right,
                        height: this.height,
                        width: this.width
                    }
                },
                Me.getSimpleBoxPosition = function(e) {
                    var t = e.div ? e.div.offsetHeight: e.tagName ? e.offsetHeight: 0,
                    n = e.div ? e.div.offsetWidth: e.tagName ? e.offsetWidth: 0,
                    i = e.div ? e.div.offsetTop: e.tagName ? e.offsetTop: 0;
                    return e = e.div ? e.div.getBoundingClientRect() : e.tagName ? e.getBoundingClientRect() : e,
                    {
                        left: e.left,
                        right: e.right,
                        top: e.top || i,
                        height: e.height || t,
                        bottom: e.bottom || i + (e.height || t),
                        width: e.width || n
                    }
                },
                Fe.StringDecoder = function() {
                    return {
                        decode: function(e) {
                            if (!e) return "";
                            if ("string" != typeof e) throw new Error("Error - expected string data.");
                            return decodeURIComponent(encodeURIComponent(e))
                        }
                    }
                },
                Fe.convertCueToDOMTree = function(e, t) {
                    return e && t ? ke(e, t) : null
                };
                Fe.processCues = function(e, t, n) {
                    if (!e || !t || !n) return null;
                    for (; n.firstChild;) n.removeChild(n.firstChild);
                    var i = e.document.createElement("div");
                    if (i.style.position = "absolute", i.style.left = "0", i.style.right = "0", i.style.top = "0", i.style.bottom = "0", i.style.margin = "1.5%", n.appendChild(i),
                    function(e) {
                        for (var t = 0; t < e.length; t++) if (e[t].hasBeenReset || !e[t].displayState) return ! 0;
                        return ! 1
                    } (t)) {
                        var o = [],
                        r = Me.getSimpleBoxPosition(i),
                        s = Math.round(.05 * r.height * 100) / 100,
                        a = {
                            font: s + "px sans-serif"
                        }; !
                        function() {
                            for (var n, s, A = 0; A < t.length; A++) s = t[A],
                            n = new Re(e, s, a),
                            i.appendChild(n.div),
                            Pe(e, n, r, o),
                            s.displayState = n.div,
                            o.push(Me.getSimpleBoxPosition(n))
                        } ()
                    } else for (var A = 0; A < t.length; A++) i.appendChild(t[A].displayState)
                },
                Fe.Parser = function(e, t, n) {
                    n || (n = t, t = {}),
                    t || (t = {}),
                    this.window = e,
                    this.vttjs = t,
                    this.state = "INITIAL",
                    this.buffer = "",
                    this.decoder = n || new TextDecoder("utf8"),
                    this.regionList = []
                },
                Fe.Parser.prototype = {
                    reportOrThrowError: function(e) {
                        if (! (e instanceof we)) throw e;
                        this.onparsingerror && this.onparsingerror(e)
                    },
                    parse: function(e) {
                        function t() {
                            for (var e = o.buffer,
                            t = 0; t < e.length && "\r" !== e[t] && "\n" !== e[t];)++t;
                            var n = e.substr(0, t);
                            return "\r" === e[t] && ++t,
                            "\n" === e[t] && ++t,
                            o.buffer = e.substr(t),
                            n
                        }
                        function n(e) {
                            var t = new Te;
                            if (je(e,
                            function(e, n) {
                                switch (e) {
                                case "id":
                                    t.set(e, n);
                                    break;
                                case "width":
                                    t.percent(e, n);
                                    break;
                                case "lines":
                                    t.integer(e, n);
                                    break;
                                case "regionanchor":
                                case "viewportanchor":
                                    var i = n.split(",");
                                    if (2 !== i.length) break;
                                    var o = new Te;
                                    if (o.percent("x", i[0]), o.percent("y", i[1]), !o.has("x") || !o.has("y")) break;
                                    t.set(e + "X", o.get("x")),
                                    t.set(e + "Y", o.get("y"));
                                    break;
                                case "scroll":
                                    t.alt(e, n, ["up"])
                                }
                            },
                            /=/, /\s/), t.has("id")) {
                                var n = new(o.vttjs.VTTRegion || o.window.VTTRegion);
                                n.width = t.get("width", 100),
                                n.lines = t.get("lines", 3),
                                n.regionAnchorX = t.get("regionanchorX", 0),
                                n.regionAnchorY = t.get("regionanchorY", 100),
                                n.viewportAnchorX = t.get("viewportanchorX", 0),
                                n.viewportAnchorY = t.get("viewportanchorY", 100),
                                n.scroll = t.get("scroll", ""),
                                o.onregion && o.onregion(n),
                                o.regionList.push({
                                    id: t.get("id"),
                                    region: n
                                })
                            }
                        }
                        function i(e) {
                            var t = new Te;
                            je(e,
                            function(e, n) {
                                switch (e) {
                                case "MPEGT":
                                    t.integer(e + "S", n);
                                    break;
                                case "LOCA":
                                    t.set(e + "L", Ee(n))
                                }
                            },
                            /[^\d]:/, /,/),
                            o.ontimestampmap && o.ontimestampmap({
                                MPEGTS: t.get("MPEGTS"),
                                LOCAL: t.get("LOCAL")
                            })
                        }
                        var o = this;
                        e && (o.buffer += o.decoder.decode(e, {
                            stream: !0
                        }));
                        try {
                            var r;
                            if ("INITIAL" === o.state) {
                                if (!/\r\n|\n/.test(o.buffer)) return this;
                                r = t();
                                var s = r.match(/^WEBVTT([ \t].*)?$/);
                                if (!s || !s[0]) throw new we(we.Errors.BadSignature);
                                o.state = "HEADER"
                            }
                            for (var a = !1; o.buffer;) {
                                if (!/\r\n|\n/.test(o.buffer)) return this;
                                switch (a ? a = !1 : r = t(), o.state) {
                                case "HEADER":
                                    /:/.test(r) ?
                                    function(e) {
                                        e.match(/X-TIMESTAMP-MAP/) ? je(e,
                                        function(e, t) {
                                            switch (e) {
                                            case "X-TIMESTAMP-MAP":
                                                i(t)
                                            }
                                        },
                                        /=/) : je(e,
                                        function(e, t) {
                                            switch (e) {
                                            case "Region":
                                                n(t)
                                            }
                                        },
                                        /:/)
                                    } (r) : r || (o.state = "ID");
                                    continue;
                                case "NOTE":
                                    r || (o.state = "ID");
                                    continue;
                                case "ID":
                                    if (/^NOTE($|[ \t])/.test(r)) {
                                        o.state = "NOTE";
                                        break
                                    }
                                    if (!r) continue;
                                    if (o.cue = new(o.vttjs.VTTCue || o.window.VTTCue)(0, 0, ""), o.state = "CUE", -1 === r.indexOf("--\x3e")) {
                                        o.cue.id = r;
                                        continue
                                    }
                                case "CUE":
                                    try {
                                        xe(r, o.cue, o.regionList)
                                    } catch(e) {
                                        o.reportOrThrowError(e),
                                        o.cue = null,
                                        o.state = "BADCUE";
                                        continue
                                    }
                                    o.state = "CUETEXT";
                                    continue;
                                case "CUETEXT":
                                    var A = -1 !== r.indexOf("--\x3e");
                                    if (!r || A && (a = !0)) {
                                        o.oncue && o.oncue(o.cue),
                                        o.cue = null,
                                        o.state = "ID";
                                        continue
                                    }
                                    o.cue.text && (o.cue.text += "\n"),
                                    o.cue.text += r;
                                    continue;
                                case "BADCUE":
                                    r || (o.state = "ID");
                                    continue
                                }
                            }
                        } catch(e) {
                            o.reportOrThrowError(e),
                            "CUETEXT" === o.state && o.cue && o.oncue && o.oncue(o.cue),
                            o.cue = null,
                            o.state = "INITIAL" === o.state ? "BADWEBVTT": "BADCUE"
                        }
                        return this
                    },
                    flush: function() {
                        var e = this;
                        try {
                            if (e.buffer += e.decoder.decode(), (e.cue || "HEADER" === e.state) && (e.buffer += "\n\n", e.parse()), "INITIAL" === e.state) throw new we(we.Errors.BadSignature)
                        } catch(t) {
                            e.reportOrThrowError(t)
                        }
                        return e.onflush && e.onflush(),
                        this
                    }
                };
                var Ri = Fe,
                Mi = "auto",
                Pi = {
                    "": !0,
                    lr: !0,
                    rl: !0
                },
                Fi = {
                    start: !0,
                    middle: !0,
                    end: !0,
                    left: !0,
                    right: !0
                };
                ze.prototype.getCueAsHTML = function() {
                    return WebVTT.convertCueToDOMTree(window, this.text)
                };
                var Li = ze,
                Ni = {
                    "": !0,
                    up: !0
                },
                Hi = We,
                zi = e(function(e) {
                    var t = e.exports = {
                        WebVTT: Ri,
                        VTTCue: Li,
                        VTTRegion: Hi
                    };
                    lt.vttjs = t,
                    lt.WebVTT = t.WebVTT;
                    var n = t.VTTCue,
                    i = t.VTTRegion,
                    o = lt.VTTCue,
                    r = lt.VTTRegion;
                    t.shim = function() {
                        lt.VTTCue = n,
                        lt.VTTRegion = i
                    },
                    t.restore = function() {
                        lt.VTTCue = o,
                        lt.VTTRegion = r
                    },
                    lt.VTTCue || t.shim()
                }),
                Yi = function(e) {
                    function t() {
                        var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function() {};
                        Ht(this, t),
                        n.reportTouchActivity = !1;
                        var o = Yt(this, e.call(this, null, n, i));
                        return o.hasStarted_ = !1,
                        o.on("playing",
                        function() {
                            this.hasStarted_ = !0
                        }),
                        o.on("loadstart",
                        function() {
                            this.hasStarted_ = !1
                        }),
                        ji.names.forEach(function(e) {
                            var t = ji[e];
                            n && n[t.getterName] && (o[t.privateName] = n[t.getterName])
                        }),
                        o.featuresProgressEvents || o.manualProgressOn(),
                        o.featuresTimeupdateEvents || o.manualTimeUpdatesOn(),
                        ["Text", "Audio", "Video"].forEach(function(e) { ! 1 === n["native" + e + "Tracks"] && (o["featuresNative" + e + "Tracks"] = !1)
                        }),
                        !1 === n.nativeCaptions || !1 === n.nativeTextTracks ? o.featuresNativeTextTracks = !1 : !0 !== n.nativeCaptions && !0 !== n.nativeTextTracks || (o.featuresNativeTextTracks = !0),
                        o.featuresNativeTextTracks || o.emulateTextTracks(),
                        o.autoRemoteTextTracks_ = new ji.text.ListClass,
                        o.initTrackListeners(),
                        n.nativeControlsForTouch || o.emitTapEvents(),
                        o.constructor && (o.name_ = o.constructor.name || "Unknown Tech"),
                        o
                    }
                    return zt(t, e),
                    t.prototype.manualProgressOn = function() {
                        this.on("durationchange", this.onDurationChange),
                        this.manualProgress = !0,
                        this.one("ready", this.trackProgress)
                    },
                    t.prototype.manualProgressOff = function() {
                        this.manualProgress = !1,
                        this.stopTrackingProgress(),
                        this.off("durationchange", this.onDurationChange)
                    },
                    t.prototype.trackProgress = function(e) {
                        this.stopTrackingProgress(),
                        this.progressInterval = this.setInterval(hn(this,
                        function() {
                            var e = this.bufferedPercent();
                            this.bufferedPercent_ !== e && this.trigger("progress"),
                            this.bufferedPercent_ = e,
                            1 === e && this.stopTrackingProgress()
                        }), 500)
                    },
                    t.prototype.onDurationChange = function(e) {
                        this.duration_ = this.duration()
                    },
                    t.prototype.buffered = function() {
                        return se(0, 0)
                    },
                    t.prototype.bufferedPercent = function() {
                        return ae(this.buffered(), this.duration_)
                    },
                    t.prototype.stopTrackingProgress = function() {
                        this.clearInterval(this.progressInterval)
                    },
                    t.prototype.manualTimeUpdatesOn = function() {
                        this.manualTimeUpdates = !0,
                        this.on("play", this.trackCurrentTime),
                        this.on("pause", this.stopTrackingCurrentTime)
                    },
                    t.prototype.manualTimeUpdatesOff = function() {
                        this.manualTimeUpdates = !1,
                        this.stopTrackingCurrentTime(),
                        this.off("play", this.trackCurrentTime),
                        this.off("pause", this.stopTrackingCurrentTime)
                    },
                    t.prototype.trackCurrentTime = function() {
                        this.currentTimeInterval && this.stopTrackingCurrentTime(),
                        this.currentTimeInterval = this.setInterval(function() {
                            this.trigger({
                                type: "timeupdate",
                                target: this,
                                manuallyTriggered: !0
                            })
                        },
                        250)
                    },
                    t.prototype.stopTrackingCurrentTime = function() {
                        this.clearInterval(this.currentTimeInterval),
                        this.trigger({
                            type: "timeupdate",
                            target: this,
                            manuallyTriggered: !0
                        })
                    },
                    t.prototype.dispose = function() {
                        this.clearTracks(Ei.names),
                        this.manualProgress && this.manualProgressOff(),
                        this.manualTimeUpdates && this.manualTimeUpdatesOff(),
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.clearTracks = function(e) {
                        var t = this;
                        e = [].concat(e),
                        e.forEach(function(e) {
                            for (var n = t[e + "Tracks"]() || [], i = n.length; i--;) {
                                var o = n[i];
                                "text" === e && t.removeRemoteTextTrack(o),
                                n.removeTrack(o)
                            }
                        })
                    },
                    t.prototype.cleanupAutoTextTracks = function() {
                        for (var e = this.autoRemoteTextTracks_ || [], t = e.length; t--;) {
                            var n = e[t];
                            this.removeRemoteTextTrack(n)
                        }
                    },
                    t.prototype.reset = function() {},
                    t.prototype.error = function(e) {
                        return void 0 !== e && (this.error_ = new Ae(e), this.trigger("error")),
                        this.error_
                    },
                    t.prototype.played = function() {
                        return this.hasStarted_ ? se(0, 0) : se()
                    },
                    t.prototype.setCurrentTime = function() {
                        this.manualTimeUpdates && this.trigger({
                            type: "timeupdate",
                            target: this,
                            manuallyTriggered: !0
                        })
                    },
                    t.prototype.initTrackListeners = function() {
                        var e = this;
                        Ei.names.forEach(function(t) {
                            var n = Ei[t],
                            i = function() {
                                e.trigger(t + "trackchange")
                            },
                            o = e[n.getterName]();
                            o.addEventListener("removetrack", i),
                            o.addEventListener("addtrack", i),
                            e.on("dispose",
                            function() {
                                o.removeEventListener("removetrack", i),
                                o.removeEventListener("addtrack", i)
                            })
                        })
                    },
                    t.prototype.addWebVttScript_ = function() {
                        var e = this;
                    },
                    t.prototype.emulateTextTracks = function() {
                        var e = this,
                        t = this.textTracks(),
                        n = this.remoteTextTracks(),
                        i = function(e) {
                            return t.addTrack(e.track)
                        },
                        o = function(e) {
                            return t.removeTrack(e.track)
                        };
                        n.on("addtrack", i),
                        n.on("removetrack", o),
                        this.addWebVttScript_();
                        var r = function() {
                            return e.trigger("texttrackchange")
                        },
                        s = function() {
                            r();
                            for (var e = 0; e < t.length; e++) {
                                var n = t[e];
                                n.removeEventListener("cuechange", r),
                                "showing" === n.mode && n.addEventListener("cuechange", r)
                            }
                        };
                        s(),
                        t.addEventListener("change", s),
                        t.addEventListener("addtrack", s),
                        t.addEventListener("removetrack", s),
                        this.on("dispose",
                        function() {
                            n.off("addtrack", i),
                            n.off("removetrack", o),
                            t.removeEventListener("change", s),
                            t.removeEventListener("addtrack", s),
                            t.removeEventListener("removetrack", s);
                            for (var e = 0; e < t.length; e++) {
                                t[e].removeEventListener("cuechange", r)
                            }
                        })
                    },
                    t.prototype.addTextTrack = function(e, t, n) {
                        if (!e) throw new Error("TextTrack kind is required but was not provided");
                        return Ue(this, e, t, n)
                    },
                    t.prototype.createRemoteTextTrack = function(e) {
                        var t = ne(e, {
                            tech: this
                        });
                        return new Ti.remoteTextEl.TrackClass(t)
                    },
                    t.prototype.addRemoteTextTrack = function() {
                        var e = this,
                        t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        n = arguments[1],
                        i = this.createRemoteTextTrack(t);
                        return ! 0 !== n && !1 !== n && (Jt.warn('Calling addRemoteTextTrack without explicitly setting the "manualCleanup" parameter to `true` is deprecated and default to `false` in future version of video.js'), n = !0),
                        this.remoteTextTrackEls().addTrackElement_(i),
                        this.remoteTextTracks().addTrack(i.track),
                        !0 !== n && this.ready(function() {
                            return e.autoRemoteTextTracks_.addTrack(i.track)
                        }),
                        i
                    },
                    t.prototype.removeRemoteTextTrack = function(e) {
                        var t = this.remoteTextTrackEls().getTrackElementByTrack_(e);
                        this.remoteTextTrackEls().removeTrackElement_(t),
                        this.remoteTextTracks().removeTrack(e),
                        this.autoRemoteTextTracks_.removeTrack(e)
                    },
                    t.prototype.getVideoPlaybackQuality = function() {
                        return {}
                    },
                    t.prototype.setPoster = function() {},
                    t.prototype.playsinline = function() {},
                    t.prototype.setPlaysinline = function() {},
                    t.prototype.canPlayType = function() {
                        return ""
                    },
                    t.canPlayType = function() {
                        return ""
                    },
                    t.canPlaySource = function(e, n) {
                        return t.canPlayType(e.type)
                    },
                    t.isTech = function(e) {
                        return e.prototype instanceof t || e instanceof t || e === t
                    },
                    t.registerTech = function(e, n) {
                        if (t.techs_ || (t.techs_ = {}), !t.isTech(n)) throw new Error("Tech " + e + " must be a Tech");
                        if (!t.canPlayType) throw new Error("Techs must have a static canPlayType method on them");
                        if (!t.canPlaySource) throw new Error("Techs must have a static canPlaySource method on them");
                        return e = ee(e),
                        t.techs_[e] = n,
                        "Tech" !== e && t.defaultTechOrder_.push(e),
                        n
                    },
                    t.getTech = function(e) {
                        if (e) return e = ee(e),
                        t.techs_ && t.techs_[e] ? t.techs_[e] : lt && lt.videojs && lt.videojs[e] ? (Jt.warn("The " + e + " tech was added to the videojs object when it should be registered using videojs.registerTech(name, tech)"), lt.videojs[e]) : void 0
                    },
                    t
                } (Tn);
                ji.names.forEach(function(e) {
                    var t = ji[e];
                    Yi.prototype[t.getterName] = function() {
                        return this[t.privateName] = this[t.privateName] || new t.ListClass,
                        this[t.privateName]
                    }
                }),
                Yi.prototype.featuresVolumeControl = !0,
                Yi.prototype.featuresFullscreenResize = !1,
                Yi.prototype.featuresPlaybackRate = !1,
                Yi.prototype.featuresProgressEvents = !1,
                Yi.prototype.featuresTimeupdateEvents = !1,
                Yi.prototype.featuresNativeTextTracks = !1,
                Yi.withSourceHandlers = function(e) {
                    e.registerSourceHandler = function(t, n) {
                        var i = e.sourceHandlers;
                        i || (i = e.sourceHandlers = []),
                        void 0 === n && (n = i.length),
                        i.splice(n, 0, t)
                    },
                    e.canPlayType = function(t) {
                        for (var n = e.sourceHandlers || [], i = void 0, o = 0; o < n.length; o++) if (i = n[o].canPlayType(t)) return i;
                        return ""
                    },
                    e.selectSourceHandler = function(t, n) {
                        for (var i = e.sourceHandlers || [], o = 0; o < i.length; o++) if (i[o].canHandleSource(t, n)) return i[o];
                        return null
                    },
                    e.canPlaySource = function(t, n) {
                        var i = e.selectSourceHandler(t, n);
                        return i ? i.canHandleSource(t, n) : ""
                    },
                    ["seekable", "duration"].forEach(function(e) {
                        var t = this[e];
                        "function" == typeof t && (this[e] = function() {
                            return this.sourceHandler_ && this.sourceHandler_[e] ? this.sourceHandler_[e].apply(this.sourceHandler_, arguments) : t.apply(this, arguments)
                        })
                    },
                    e.prototype),
                    e.prototype.setSource = function(t) {
                        var n = e.selectSourceHandler(t, this.options_);
                        n || (e.nativeSourceHandler ? n = e.nativeSourceHandler: Jt.error("No source hander found for the current source.")),
                        this.disposeSourceHandler(),
                        this.off("dispose", this.disposeSourceHandler),
                        n !== e.nativeSourceHandler && (this.currentSource_ = t),
                        this.sourceHandler_ = n.handleSource(t, this, this.options_),
                        this.on("dispose", this.disposeSourceHandler)
                    },
                    e.prototype.disposeSourceHandler = function() {
                        this.currentSource_ && (this.clearTracks(["audio", "video"]), this.currentSource_ = null),
                        this.cleanupAutoTextTracks(),
                        this.sourceHandler_ && (this.sourceHandler_.dispose && this.sourceHandler_.dispose(), this.sourceHandler_ = null)
                    }
                },
                Tn.registerComponent("Tech", Yi),
                Yi.registerTech("Tech", Yi),
                Yi.defaultTechOrder_ = [];
                var Qi = {},
                Wi = {
                    buffered: 1,
                    currentTime: 1,
                    duration: 1,
                    seekable: 1,
                    played: 1
                },
                Ui = {
                    setCurrentTime: 1
                },
                Vi = function e(t) {
                    if (Array.isArray(t)) {
                        var n = [];
                        t.forEach(function(t) {
                            t = e(t),
                            Array.isArray(t) ? n = n.concat(t) : r(t) && n.push(t)
                        }),
                        t = n
                    } else t = "string" == typeof t && t.trim() ? [{
                        src: t
                    }] : r(t) && "string" == typeof t.src && t.src && t.src.trim() ? [t] : [];
                    return t
                },
                Gi = function(e) {
                    function t(n, i, o) {
                        Ht(this, t);
                        var r = ne({
                            createEl: !1
                        },
                        i),
                        s = Yt(this, e.call(this, n, r, o));
                        if (i.playerOptions.sources && 0 !== i.playerOptions.sources.length) n.src(i.playerOptions.sources);
                        else for (var a = 0,
                        A = i.playerOptions.techOrder; a < A.length; a++) {
                            var g = ee(A[a]),
                            l = Yi.getTech(g);
                            if (g || (l = Tn.getComponent(g)), l && l.isSupported()) {
                                n.loadTech_(g);
                                break
                            }
                        }
                        return s
                    }
                    return zt(t, e),
                    t
                } (Tn);
                Tn.registerComponent("MediaLoader", Gi);
                var Xi = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.emitTapEvents(),
                        o.enable(),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "div",
                        n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                        n = o({
                            innerHTML: '<span aria-hidden="true" class="vjs-icon-placeholder"></span>',
                            className: this.buildCSSClass(),
                            tabIndex: 0
                        },
                        n),
                        "button" === t && Jt.error("Creating a ClickableComponent with an HTML element of " + t + " is not supported; use a Button instead."),
                        i = o({
                            role: "button",
                            "aria-live": "polite"
                        },
                        i),
                        this.tabIndex_ = n.tabIndex;
                        var r = e.prototype.createEl.call(this, t, n, i);
                        return this.createControlTextEl(r),
                        r
                    },
                    t.prototype.dispose = function() {
                        this.controlTextEl_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.createControlTextEl = function(e) {
                        return this.controlTextEl_ = p("span", {
                            className: "vjs-control-text"
                        }),
                        e && e.appendChild(this.controlTextEl_),
                        this.controlText(this.controlText_, e),
                        this.controlTextEl_
                    },
                    t.prototype.controlText = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : this.el();
                        if (void 0 === e) return this.controlText_ || "Need Text";
                        var n = this.localize(e);
                        this.controlText_ = e,
                        f(this.controlTextEl_, n),
                        this.nonIconControl || t.setAttribute("title", n)
                    },
                    t.prototype.buildCSSClass = function() {
                        return "vjs-control vjs-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.enable = function() {
                        this.enabled_ || (this.enabled_ = !0, this.removeClass("vjs-disabled"), this.el_.setAttribute("aria-disabled", "false"), void 0 !== this.tabIndex_ && this.el_.setAttribute("tabIndex", this.tabIndex_), this.on(["tap", "click"], this.handleClick), this.on("focus", this.handleFocus), this.on("blur", this.handleBlur))
                    },
                    t.prototype.disable = function() {
                        this.enabled_ = !1,
                        this.addClass("vjs-disabled"),
                        this.el_.setAttribute("aria-disabled", "true"),
                        void 0 !== this.tabIndex_ && this.el_.removeAttribute("tabIndex"),
                        this.off(["tap", "click"], this.handleClick),
                        this.off("focus", this.handleFocus),
                        this.off("blur", this.handleBlur)
                    },
                    t.prototype.handleClick = function(e) {},
                    t.prototype.handleFocus = function(e) {
                        G(ut, "keydown", hn(this, this.handleKeyPress))
                    },
                    t.prototype.handleKeyPress = function(t) {
                        32 === t.which || 13 === t.which ? (t.preventDefault(), this.trigger("click")) : e.prototype.handleKeyPress && e.prototype.handleKeyPress.call(this, t)
                    },
                    t.prototype.handleBlur = function(e) {
                        X(ut, "keydown", hn(this, this.handleKeyPress))
                    },
                    t
                } (Tn);
                Tn.registerComponent("ClickableComponent", Xi);
                var Zi = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.update(),
                        n.on("posterchange", hn(o, o.update)),
                        o
                    }
                    return zt(t, e),
                    t.prototype.dispose = function() {
                        this.player().off("posterchange", this.update),
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.createEl = function() {
                        var e = p("div", {
                            className: "vjs-poster",
                            tabIndex: -1
                        });
                        return Ft || (this.fallbackImg_ = p("img"), e.appendChild(this.fallbackImg_)),
                        e
                    },
                    t.prototype.update = function(e) {
                        var t = this.player().poster();
                        this.setSrc(t),
                        t ? this.show() : this.hide()
                    },
                    t.prototype.setSrc = function(e) {
                        if (this.fallbackImg_) this.fallbackImg_.src = e;
                        else {
                            var t = "";
                            e && (t = 'url("' + e + '")'),
                            this.el_.style.backgroundImage = t
                        }
                    },
                    t.prototype.handleClick = function(e) {
                        this.player_.controls() && (this.player_.paused() ? this.player_.play() : this.player_.pause())
                    },
                    t
                } (Xi);
                Tn.registerComponent("PosterImage", Zi);
                var Ji = "#222",
                Ki = {
                    monospace: "monospace",
                    sansSerif: "sans-serif",
                    serif: "serif",
                    monospaceSansSerif: '"Andale Mono", "Lucida Console", monospace',
                    monospaceSerif: '"Courier New", monospace',
                    proportionalSansSerif: "sans-serif",
                    proportionalSerif: "serif",
                    casual: '"Comic Sans MS", Impact, fantasy',
                    script: '"Monotype Corsiva", cursive',
                    smallcaps: '"Andale Mono", "Lucida Console", monospace, sans-serif'
                },
                qi = function(e) {
                    function t(n, i, o) {
                        Ht(this, t);
                        var r = Yt(this, e.call(this, n, i, o));
                        return n.on("loadstart", hn(r, r.toggleDisplay)),
                        n.on("texttrackchange", hn(r, r.updateDisplay)),
                        n.on("loadstart", hn(r, r.preselectTrack)),
                        n.ready(hn(r,
                        function() {
                            if (n.tech_ && n.tech_.featuresNativeTextTracks) return void this.hide();
                            n.on("fullscreenchange", hn(this, this.updateDisplay));
                            for (var e = this.options_.playerOptions.tracks || [], t = 0; t < e.length; t++) this.player_.addRemoteTextTrack(e[t], !0);
                            this.preselectTrack()
                        })),
                        r
                    }
                    return zt(t, e),
                    t.prototype.preselectTrack = function() {
                        for (var e = {
                            captions: 1,
                            subtitles: 1
                        },
                        t = this.player_.textTracks(), n = this.player_.cache_.selectedLanguage, i = void 0, o = void 0, r = void 0, s = 0; s < t.length; s++) {
                            var a = t[s];
                            n && n.enabled && n.language === a.language ? a.kind === n.kind ? r = a: r || (r = a) : n && !n.enabled ? (r = null, i = null, o = null) : a.
                        default && ("descriptions" !== a.kind || i ? a.kind in e && !o && (o = a) : i = a)
                        }
                        r ? r.mode = "showing": o ? o.mode = "showing": i && (i.mode = "showing")
                    },
                    t.prototype.toggleDisplay = function() {
                        this.player_.tech_ && this.player_.tech_.featuresNativeTextTracks ? this.hide() : this.show()
                    },
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-text-track-display"
                        },
                        {
                            "aria-live": "off",
                            "aria-atomic": "true"
                        })
                    },
                    t.prototype.clearDisplay = function() {
                        "function" == typeof lt.WebVTT && lt.WebVTT.processCues(lt, [], this.el_)
                    },
                    t.prototype.updateDisplay = function() {
                        var e = this.player_.textTracks();
                        this.clearDisplay();
                        for (var t = null,
                        n = null,
                        i = e.length; i--;) {
                            var o = e[i];
                            "showing" === o.mode && ("descriptions" === o.kind ? t = o: n = o)
                        }
                        n ? ("off" !== this.getAttribute("aria-live") && this.setAttribute("aria-live", "off"), this.updateForTrack(n)) : t && ("assertive" !== this.getAttribute("aria-live") && this.setAttribute("aria-live", "assertive"), this.updateForTrack(t))
                    },
                    t.prototype.updateForTrack = function(e) {
                        if ("function" == typeof lt.WebVTT && e.activeCues) {
                            for (var t = this.player_.textTrackSettings.getValues(), n = [], i = 0; i < e.activeCues.length; i++) n.push(e.activeCues[i]);
                            lt.WebVTT.processCues(lt, n, this.el_);
                            for (var o = n.length; o--;) {
                                var r = n[o];
                                if (r) {
                                    var s = r.displayState;
                                    if (t.color && (s.firstChild.style.color = t.color), t.textOpacity && et(s.firstChild, "color", $e(t.color || "#fff", t.textOpacity)), t.backgroundColor && (s.firstChild.style.backgroundColor = t.backgroundColor), t.backgroundOpacity && et(s.firstChild, "backgroundColor", $e(t.backgroundColor || "#000", t.backgroundOpacity)), t.windowColor && (t.windowOpacity ? et(s, "backgroundColor", $e(t.windowColor, t.windowOpacity)) : s.style.backgroundColor = t.windowColor), t.edgeStyle && ("dropshadow" === t.edgeStyle ? s.firstChild.style.textShadow = "2px 2px 3px #222, 2px 2px 4px #222, 2px 2px 5px " + Ji: "raised" === t.edgeStyle ? s.firstChild.style.textShadow = "1px 1px #222, 2px 2px #222, 3px 3px " + Ji: "depressed" === t.edgeStyle ? s.firstChild.style.textShadow = "1px 1px #ccc, 0 1px #ccc, -1px -1px #222, 0 -1px " + Ji: "uniform" === t.edgeStyle && (s.firstChild.style.textShadow = "0 0 4px #222, 0 0 4px #222, 0 0 4px #222, 0 0 4px " + Ji)), t.fontPercent && 1 !== t.fontPercent) {
                                        var a = lt.parseFloat(s.style.fontSize);
                                        s.style.fontSize = a * t.fontPercent + "px",
                                        s.style.height = "auto",
                                        s.style.top = "auto",
                                        s.style.bottom = "2px"
                                    }
                                    t.fontFamily && "default" !== t.fontFamily && ("small-caps" === t.fontFamily ? s.firstChild.style.fontVariant = "small-caps": s.firstChild.style.fontFamily = Ki[t.fontFamily])
                                }
                            }
                        }
                    },
                    t
                } (Tn);
                Tn.registerComponent("TextTrackDisplay", qi);
                var $i = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-loading-spinner",
                            dir: "ltr"
                        })
                    },
                    t
                } (Tn);
                Tn.registerComponent("LoadingSpinner", $i);
                var eo = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                        e = "button",
                        t = o({
                            innerHTML: '<span aria-hidden="true" class="vjs-icon-placeholder"></span>',
                            className: this.buildCSSClass()
                        },
                        t),
                        n = o({
                            type: "button",
                            "aria-live": "polite"
                        },
                        n);
                        var i = Tn.prototype.createEl.call(this, e, t, n);
                        return this.createControlTextEl(i),
                        i
                    },
                    t.prototype.addChild = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = this.constructor.name;
                        return Jt.warn("Adding an actionable (user controllable) child to a Button (" + n + ") is not supported; use a ClickableComponent instead."),
                        Tn.prototype.addChild.call(this, e, t)
                    },
                    t.prototype.enable = function() {
                        e.prototype.enable.call(this),
                        this.el_.removeAttribute("disabled")
                    },
                    t.prototype.disable = function() {
                        e.prototype.disable.call(this),
                        this.el_.setAttribute("disabled", "disabled")
                    },
                    t.prototype.handleKeyPress = function(t) {
                        32 !== t.which && 13 !== t.which && e.prototype.handleKeyPress.call(this, t)
                    },
                    t
                } (Xi);
                Tn.registerComponent("Button", eo);
                var to = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.mouseused_ = !1,
                        o.on("mousedown", o.handleMouseDown),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-big-play-button"
                    },
                    t.prototype.handleClick = function(e) {
                        var t = this.player_.play();
                        if (! (this.mouseused_ && e.clientX && e.clientY)) {
                            var n = this.player_.getChild("controlBar"),
                            i = n && n.getChild("playToggle");
                            if (!i) return void this.player_.focus();
                            var o = function() {
                                return i.focus()
                            };
                            le(t) ? t.then(o,
                            function() {}) : this.setTimeout(o, 1)
                        }
                    },
                    t.prototype.handleKeyPress = function(t) {
                        this.mouseused_ = !1,
                        e.prototype.handleKeyPress.call(this, t)
                    },
                    t.prototype.handleMouseDown = function(e) {
                        this.mouseused_ = !0
                    },
                    t
                } (eo);
                to.prototype.controlText_ = "Play Video",
                Tn.registerComponent("BigPlayButton", to);
                var no = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.controlText(i && i.controlText || o.localize("Close")),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-close-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.handleClick = function(e) {
                        this.trigger({
                            type: "close",
                            bubbles: !1
                        })
                    },
                    t
                } (eo);
                Tn.registerComponent("CloseButton", no);
                var io = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "play", o.handlePlay),
                        o.on(n, "pause", o.handlePause),
                        o.on(n, "ended", o.handleEnded),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-play-control " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.handleClick = function(e) {
                        this.player_.paused() ? this.player_.play() : this.player_.pause()
                    },
                    t.prototype.handleSeeked = function(e) {
                        this.removeClass("vjs-ended"),
                        this.player_.paused() ? this.handlePause(e) : this.handlePlay(e)
                    },
                    t.prototype.handlePlay = function(e) {
                        this.removeClass("vjs-ended"),
                        this.removeClass("vjs-paused"),
                        this.addClass("vjs-playing"),
                        this.controlText("Pause")
                    },
                    t.prototype.handlePause = function(e) {
                        this.removeClass("vjs-playing"),
                        this.addClass("vjs-paused"),
                        this.controlText("Play")
                    },
                    t.prototype.handleEnded = function(e) {
                        this.removeClass("vjs-playing"),
                        this.addClass("vjs-ended"),
                        this.controlText("Replay"),
                        this.one(this.player_, "seeked", this.handleSeeked)
                    },
                    t
                } (eo);
                io.prototype.controlText_ = "Play",
                Tn.registerComponent("PlayToggle", io);
                var oo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.throttledUpdateContent = un(hn(o, o.updateContent), 25),
                        o.on(n, "timeupdate", o.throttledUpdateContent),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function(t) {
                        var n = this.buildCSSClass(),
                        i = e.prototype.createEl.call(this, "div", {
                            className: n + " vjs-time-control vjs-control"
                        });
                        return this.contentEl_ = p("div", {
                            className: n + "-display"
                        },
                        {
                            "aria-live": "off"
                        },
                        p("span", {
                            className: "vjs-control-text",
                            textContent: this.localize(this.controlText_)
                        })),
                        this.updateTextNode_(),
                        i.appendChild(this.contentEl_),
                        i
                    },
                    t.prototype.dispose = function() {
                        this.contentEl_ = null,
                        this.textNode_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.updateTextNode_ = function() {
                        if (this.contentEl_) {
                            for (; this.contentEl_.firstChild;) this.contentEl_.removeChild(this.contentEl_.firstChild);
                            this.textNode_ = ut.createTextNode(this.formattedTime_ || "0:00"),
                            this.contentEl_.appendChild(this.textNode_)
                        }
                    },
                    t.prototype.formatTime_ = function(e) {
                        return tt(e)
                    },
                    t.prototype.updateFormattedTime_ = function(e) {
                        var t = this.formatTime_(e);
                        t !== this.formattedTime_ && (this.formattedTime_ = t, this.requestAnimationFrame(this.updateTextNode_))
                    },
                    t.prototype.updateContent = function(e) {},
                    t
                } (Tn);
                oo.prototype.controlText_ = "Time",
                Tn.registerComponent("TimeDisplay", oo);
                var ro = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "ended", o.handleEnded),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-current-time"
                    },
                    t.prototype.updateContent = function(e) {
                        var t = this.player_.scrubbing() ? this.player_.getCache().currentTime: this.player_.currentTime();
                        this.updateFormattedTime_(t)
                    },
                    t.prototype.handleEnded = function(e) {
                        this.player_.duration() && this.updateFormattedTime_(this.player_.duration())
                    },
                    t
                } (oo);
                ro.prototype.controlText_ = "Current Time",
                Tn.registerComponent("CurrentTimeDisplay", ro);
                var so = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "durationchange", o.updateContent),
                        o.on(n, "loadedmetadata", o.throttledUpdateContent),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-duration"
                    },
                    t.prototype.updateContent = function(e) {
                        var t = this.player_.duration();
                        t && this.duration_ !== t && (this.duration_ = t, this.updateFormattedTime_(t))
                    },
                    t
                } (oo);
                so.prototype.controlText_ = "Duration Time",
                Tn.registerComponent("DurationDisplay", so);
                var ao = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-time-control vjs-time-divider",
                            innerHTML: "<div><span>/</span></div>"
                        })
                    },
                    t
                } (Tn);
                Tn.registerComponent("TimeDivider", ao);
                var Ao = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "durationchange", o.throttledUpdateContent),
                        o.on(n, "ended", o.handleEnded),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-remaining-time"
                    },
                    t.prototype.formatTime_ = function(t) {
                        return "-" + e.prototype.formatTime_.call(this, t)
                    },
                    t.prototype.updateContent = function(e) {
                        this.player_.duration() && (this.player_.remainingTimeDisplay ? this.updateFormattedTime_(this.player_.remainingTimeDisplay()) : this.updateFormattedTime_(this.player_.remainingTime()))
                    },
                    t.prototype.handleEnded = function(e) {
                        this.player_.duration() && this.updateFormattedTime_(0)
                    },
                    t
                } (oo);
                Ao.prototype.controlText_ = "Remaining Time",
                Tn.registerComponent("RemainingTimeDisplay", Ao);
                var go = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.updateShowing(),
                        o.on(o.player(), "durationchange", o.updateShowing),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        var t = e.prototype.createEl.call(this, "div", {
                            className: "vjs-live-control vjs-control"
                        });
                        return this.contentEl_ = p("div", {
                            className: "vjs-live-display",
                            innerHTML: '<span class="vjs-control-text">' + this.localize("Stream Type") + "</span>" + this.localize("LIVE")
                        },
                        {
                            "aria-live": "off"
                        }),
                        t.appendChild(this.contentEl_),
                        t
                    },
                    t.prototype.dispose = function() {
                        this.contentEl_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.updateShowing = function(e) {
                        this.player().duration() === 1 / 0 ? this.show() : this.hide()
                    },
                    t
                } (Tn);
                Tn.registerComponent("LiveDisplay", go);
                var lo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.bar = o.getChild(o.options_.barName),
                        o.vertical( !! o.options_.vertical),
                        o.enable(),
                        o
                    }
                    return zt(t, e),
                    t.prototype.enabled = function() {
                        return this.enabled_
                    },
                    t.prototype.enable = function() {
                        this.enabled() || (this.on("mousedown", this.handleMouseDown), this.on("touchstart", this.handleMouseDown), this.on("focus", this.handleFocus), this.on("blur", this.handleBlur), this.on("click", this.handleClick), this.on(this.player_, "controlsvisible", this.update), this.playerEvent && this.on(this.player_, this.playerEvent, this.update), this.removeClass("disabled"), this.setAttribute("tabindex", 0), this.enabled_ = !0)
                    },
                    t.prototype.disable = function() {
                        if (this.enabled()) {
                            var e = this.bar.el_.ownerDocument;
                            this.off("mousedown", this.handleMouseDown),
                            this.off("touchstart", this.handleMouseDown),
                            this.off("focus", this.handleFocus),
                            this.off("blur", this.handleBlur),
                            this.off("click", this.handleClick),
                            this.off(this.player_, "controlsvisible", this.update),
                            this.off(e, "mousemove", this.handleMouseMove),
                            this.off(e, "mouseup", this.handleMouseUp),
                            this.off(e, "touchmove", this.handleMouseMove),
                            this.off(e, "touchend", this.handleMouseUp),
                            this.removeAttribute("tabindex"),
                            this.addClass("disabled"),
                            this.playerEvent && this.off(this.player_, this.playerEvent, this.update),
                            this.enabled_ = !1
                        }
                    },
                    t.prototype.createEl = function(t) {
                        var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                        return n.className = n.className + " vjs-slider",
                        n = o({
                            tabIndex: 0
                        },
                        n),
                        i = o({
                            role: "slider",
                            "aria-valuenow": 0,
                            "aria-valuemin": 0,
                            "aria-valuemax": 100,
                            tabIndex: 0
                        },
                        i),
                        e.prototype.createEl.call(this, t, n, i)
                    },
                    t.prototype.handleMouseDown = function(e) {
                        var t = this.bar.el_.ownerDocument;
                        e.preventDefault(),
                        k(),
                        this.addClass("vjs-sliding"),
                        this.trigger("slideractive"),
                        this.on(t, "mousemove", this.handleMouseMove),
                        this.on(t, "mouseup", this.handleMouseUp),
                        this.on(t, "touchmove", this.handleMouseMove),
                        this.on(t, "touchend", this.handleMouseUp),
                        this.handleMouseMove(e)
                    },
                    t.prototype.handleMouseMove = function(e) {},
                    t.prototype.handleMouseUp = function() {
                        var e = this.bar.el_.ownerDocument;
                        S(),
                        this.removeClass("vjs-sliding"),
                        this.trigger("sliderinactive"),
                        this.off(e, "mousemove", this.handleMouseMove),
                        this.off(e, "mouseup", this.handleMouseUp),
                        this.off(e, "touchmove", this.handleMouseMove),
                        this.off(e, "touchend", this.handleMouseUp),
                        this.update()
                    },
                    t.prototype.update = function() {
                        if (this.el_) {
                            var e = this.getPercent(),
                            t = this.bar;
                            if (t) { ("number" != typeof e || e !== e || e < 0 || e === 1 / 0) && (e = 0);
                                var n = (100 * e).toFixed(2) + "%",
                                i = t.el().style;
                                return this.vertical() ? i.height = n: i.width = n,
                                e
                            }
                        }
                    },
                    t.prototype.calculateDistance = function(e) {
                        var t = O(this.el_, e);
                        return this.vertical() ? t.y: t.x
                    },
                    t.prototype.handleFocus = function() {
                        this.on(this.bar.el_.ownerDocument, "keydown", this.handleKeyPress)
                    },
                    t.prototype.handleKeyPress = function(e) {
                        37 === e.which || 40 === e.which ? (e.preventDefault(), this.stepBack()) : 38 !== e.which && 39 !== e.which || (e.preventDefault(), this.stepForward())
                    },
                    t.prototype.handleBlur = function() {
                        this.off(this.bar.el_.ownerDocument, "keydown", this.handleKeyPress)
                    },
                    t.prototype.handleClick = function(e) {
                        e.stopImmediatePropagation(),
                        e.preventDefault()
                    },
                    t.prototype.vertical = function(e) {
                        if (void 0 === e) return this.vertical_ || !1;
                        this.vertical_ = !!e,
                        this.vertical_ ? this.addClass("vjs-slider-vertical") : this.addClass("vjs-slider-horizontal")
                    },
                    t
                } (Tn);
                Tn.registerComponent("Slider", lo);
                var co = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.partEls_ = [],
                        o.on(n, "progress", o.update),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-load-progress",
                            innerHTML: '<span class="vjs-control-text"><span>' + this.localize("Loaded") + "</span>: 0%</span>"
                        })
                    },
                    t.prototype.dispose = function() {
                        this.partEls_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.update = function(e) {
                        var t = this.player_.buffered(),
                        n = this.player_.duration(),
                        i = this.player_.bufferedEnd(),
                        o = this.partEls_,
                        r = function(e, t) {
                            var n = e / t || 0;
                            return 100 * (n >= 1 ? 1 : n) + "%"
                        };
                        this.el_.style.width = r(i, n);
                        for (var s = 0; s < t.length; s++) {
                            var a = t.start(s),
                            A = t.end(s),
                            g = o[s];
                            g || (g = this.el_.appendChild(p()), o[s] = g),
                            g.style.left = r(a, i),
                            g.style.width = r(A - a, i)
                        }
                        for (var l = o.length; l > t.length; l--) this.el_.removeChild(o[l - 1]);
                        o.length = t.length
                    },
                    t
                } (Tn);
                Tn.registerComponent("LoadProgressBar", co);
                var Co = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-time-tooltip"
                        })
                    },
                    t.prototype.update = function(e, t, n) {
                        var i = D(this.el_),
                        o = D(this.player_.el()),
                        r = e.width * t;
                        if (o && i) {
                            var s = e.left - o.left + r,
                            a = e.width - r + (o.right - e.right),
                            A = i.width / 2;
                            s < A ? A += A - s: a < A && (A = a),
                            A < 0 ? A = 0 : A > i.width && (A = i.width),
                            this.el_.style.right = "-" + A + "px",
                            f(this.el_, n)
                        }
                    },
                    t
                } (Tn);
                Tn.registerComponent("TimeTooltip", Co);
                var Io = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-play-progress vjs-slider-bar",
                            innerHTML: '<span class="vjs-control-text"><span>' + this.localize("Progress") + "</span>: 0%</span>"
                        })
                    },
                    t.prototype.update = function(e, t) {
                        var n = this;
                        this.rafId_ && this.cancelAnimationFrame(this.rafId_),
                        this.rafId_ = this.requestAnimationFrame(function() {
                            var i = n.player_.scrubbing() ? n.player_.getCache().currentTime: n.player_.currentTime(),
                            o = tt(i, n.player_.duration()),
                            r = n.getChild("timeTooltip");
                            r && r.update(e, t, o)
                        })
                    },
                    t
                } (Tn);
                Io.prototype.options_ = {
                    children: []
                },
                Ot && !(Ot > 8) || bt || wt || Io.prototype.options_.children.push("timeTooltip"),
                Tn.registerComponent("PlayProgressBar", Io);
                var ho = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.update = un(hn(o, o.update), 25),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-mouse-display"
                        })
                    },
                    t.prototype.update = function(e, t) {
                        var n = this;
                        this.rafId_ && this.cancelAnimationFrame(this.rafId_),
                        this.rafId_ = this.requestAnimationFrame(function() {
                            var i = n.player_.duration(),
                            o = tt(t * i, i);
                            n.el_.style.left = e.width * t + "px",
                            n.getChild("timeTooltip").update(e, t, o)
                        })
                    },
                    t
                } (Tn);
                ho.prototype.options_ = {
                    children: ["timeTooltip"]
                },
                Tn.registerComponent("MouseTimeDisplay", ho);
                var uo = 30,
                po = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.update = un(hn(o, o.update), uo),
                        o.on(n, "timeupdate", o.update),
                        o.on(n, "ended", o.handleEnded),
                        o.updateInterval = null,
                        o.on(n, ["playing"],
                        function() {
                            o.clearInterval(o.updateInterval),
                            o.updateInterval = o.setInterval(function() {
                                o.requestAnimationFrame(function() {
                                    o.update()
                                })
                            },
                            uo)
                        }),
                        o.on(n, ["ended", "pause", "waiting"],
                        function() {
                            o.clearInterval(o.updateInterval)
                        }),
                        o.on(n, ["timeupdate", "ended"], o.update),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-progress-holder"
                        },
                        {
                            "aria-label": this.localize("Progress Bar")
                        })
                    },
                    t.prototype.update_ = function(e, t) {
                        var n = this.player_.duration();
                        this.el_.setAttribute("aria-valuenow", (100 * t).toFixed(2)),
                        this.el_.setAttribute("aria-valuetext", this.localize("progress bar timing: currentTime={1} duration={2}", [tt(e, n), tt(n, n)], "{1} of {2}")),
                        this.bar.update(D(this.el_), t)
                    },
                    t.prototype.update = function(t) {
                        var n = e.prototype.update.call(this);
                        return this.update_(this.getCurrentTime_(), n),
                        n
                    },
                    t.prototype.getCurrentTime_ = function() {
                        return this.player_.scrubbing() ? this.player_.getCache().currentTime: this.player_.currentTime()
                    },
                    t.prototype.handleEnded = function(e) {
                        this.update_(this.player_.duration(), 1)
                    },
                    t.prototype.getPercent = function() {
                        var e = this.getCurrentTime_() / this.player_.duration();
                        return e >= 1 ? 1 : e
                    },
                    t.prototype.handleMouseDown = function(t) {
                        if (N(t)) {
                            this.player_.scrubbing(!0),
                            this.videoWasPlaying = !this.player_.paused();
                            this.player_.currentTime() > 0 && !this.player_.paused() && !this.player_.ended() && this.player_.readyState() > 2 && this.player_.pause(),
                            e.prototype.handleMouseDown.call(this, t)
                        }
                    },
                    t.prototype.handleMouseMove = function(e) {
                        if (N(e)) {
                            var t = this.calculateDistance(e) * this.player_.duration();
                            t === this.player_.duration() && (t -= .1),
                            this.player_.currentTime(t)
                        }
                    },
                    t.prototype.enable = function() {
                        e.prototype.enable.call(this);
                        var t = this.getChild("mouseTimeDisplay");
                        t && t.show()
                    },
                    t.prototype.disable = function() {
                        e.prototype.disable.call(this);
                        var t = this.getChild("mouseTimeDisplay");
                        t && t.hide()
                    },
                    t.prototype.handleMouseUp = function(t) {
                        e.prototype.handleMouseUp.call(this, t),
                        this.player_.scrubbing(!1),
                        this.player_.trigger({
                            type: "timeupdate",
                            target: this,
                            manuallyTriggered: !0
                        }),
                        this.videoWasPlaying && this.player_.play()
                    },
                    t.prototype.stepForward = function() {
                        this.player_.currentTime(this.player_.currentTime() + 5)
                    },
                    t.prototype.stepBack = function() {
                        this.player_.currentTime(this.player_.currentTime() - 5)
                    },
                    t.prototype.handleAction = function(e) {
                        this.player_.paused() ? this.player_.play() : this.player_.pause()
                    },
                    t.prototype.handleKeyPress = function(t) {
                        32 === t.which || 13 === t.which ? (t.preventDefault(), this.handleAction(t)) : e.prototype.handleKeyPress && e.prototype.handleKeyPress.call(this, t)
                    },
                    t
                } (lo);
                po.prototype.options_ = {
                    children: ["loadProgressBar", "playProgressBar"],
                    barName: "playProgressBar"
                },
                Ot && !(Ot > 8) || bt || wt || po.prototype.options_.children.splice(1, 0, "mouseTimeDisplay"),
                po.prototype.playerEvent = "timeupdate",
                Tn.registerComponent("SeekBar", po);
                var fo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.handleMouseMove = un(hn(o, o.handleMouseMove), 25),
                        o.throttledHandleMouseSeek = un(hn(o, o.handleMouseSeek), 25),
                        o.enable(),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-progress-control vjs-control"
                        })
                    },
                    t.prototype.handleMouseMove = function(e) {
                        var t = this.getChild("seekBar"),
                        n = t.getChild("mouseTimeDisplay"),
                        i = t.el(),
                        o = D(i),
                        r = O(i, e).x;
                        r > 1 ? r = 1 : r < 0 && (r = 0),
                        n && n.update(o, r)
                    },
                    t.prototype.handleMouseSeek = function(e) {
                        this.getChild("seekBar").handleMouseMove(e)
                    },
                    t.prototype.enabled = function() {
                        return this.enabled_
                    },
                    t.prototype.disable = function() {
                        this.children().forEach(function(e) {
                            return e.disable && e.disable()
                        }),
                        this.enabled() && (this.off(["mousedown", "touchstart"], this.handleMouseDown), this.off(this.el_, "mousemove", this.handleMouseMove), this.handleMouseUp(), this.addClass("disabled"), this.enabled_ = !1)
                    },
                    t.prototype.enable = function() {
                        this.children().forEach(function(e) {
                            return e.enable && e.enable()
                        }),
                        this.enabled() || (this.on(["mousedown", "touchstart"], this.handleMouseDown), this.on(this.el_, "mousemove", this.handleMouseMove), this.removeClass("disabled"), this.enabled_ = !0)
                    },
                    t.prototype.handleMouseDown = function(e) {
                        var t = this.el_.ownerDocument;
                        this.on(t, "mousemove", this.throttledHandleMouseSeek),
                        this.on(t, "touchmove", this.throttledHandleMouseSeek),
                        this.on(t, "mouseup", this.handleMouseUp),
                        this.on(t, "touchend", this.handleMouseUp)
                    },
                    t.prototype.handleMouseUp = function(e) {
                        var t = this.el_.ownerDocument;
                        this.off(t, "mousemove", this.throttledHandleMouseSeek),
                        this.off(t, "touchmove", this.throttledHandleMouseSeek),
                        this.off(t, "mouseup", this.handleMouseUp),
                        this.off(t, "touchend", this.handleMouseUp)
                    },
                    t
                } (Tn);
                fo.prototype.options_ = {
                    children: ["seekBar"]
                },
                Tn.registerComponent("ProgressControl", fo);
                var mo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "fullscreenchange", o.handleFullscreenChange),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-fullscreen-control " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.handleFullscreenChange = function(e) {
                        this.player_.isFullscreen() ? this.controlText("Non-Fullscreen") : this.controlText("Fullscreen")
                    },
                    t.prototype.handleClick = function(e) {
                        this.player_.isFullscreen() ? this.player_.exitFullscreen() : this.player_.requestFullscreen()
                    },
                    t
                } (eo);
                mo.prototype.controlText_ = "Fullscreen",
                Tn.registerComponent("FullscreenToggle", mo);
                var vo = function(e, t) {
                    t.tech_ && !t.tech_.featuresVolumeControl && e.addClass("vjs-hidden"),
                    e.on(t, "loadstart",
                    function() {
                        t.tech_.featuresVolumeControl ? e.removeClass("vjs-hidden") : e.addClass("vjs-hidden")
                    })
                },
                yo = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-level",
                            innerHTML: '<span class="vjs-control-text"></span>'
                        })
                    },
                    t
                } (Tn);
                Tn.registerComponent("VolumeLevel", yo);
                var bo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on("slideractive", o.updateLastVolume_),
                        o.on(n, "volumechange", o.updateARIAAttributes),
                        n.ready(function() {
                            return o.updateARIAAttributes()
                        }),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-bar vjs-slider-bar"
                        },
                        {
                            "aria-label": this.localize("Volume Level"),
                            "aria-live": "polite"
                        })
                    },
                    t.prototype.handleMouseDown = function(t) {
                        N(t) && e.prototype.handleMouseDown.call(this, t)
                    },
                    t.prototype.handleMouseMove = function(e) {
                        N(e) && (this.checkMuted(), this.player_.volume(this.calculateDistance(e)))
                    },
                    t.prototype.checkMuted = function() {
                        this.player_.muted() && this.player_.muted(!1)
                    },
                    t.prototype.getPercent = function() {
                        return this.player_.muted() ? 0 : this.player_.volume()
                    },
                    t.prototype.stepForward = function() {
                        this.checkMuted(),
                        this.player_.volume(this.player_.volume() + .1)
                    },
                    t.prototype.stepBack = function() {
                        this.checkMuted(),
                        this.player_.volume(this.player_.volume() - .1)
                    },
                    t.prototype.updateARIAAttributes = function(e) {
                        var t = this.player_.muted() ? 0 : this.volumeAsPercentage_();
                        this.el_.setAttribute("aria-valuenow", t),
                        this.el_.setAttribute("aria-valuetext", t + "%")
                    },
                    t.prototype.volumeAsPercentage_ = function() {
                        return Math.round(100 * this.player_.volume())
                    },
                    t.prototype.updateLastVolume_ = function() {
                        var e = this,
                        t = this.player_.volume();
                        this.one("sliderinactive",
                        function() {
                            0 === e.player_.volume() && e.player_.lastVolume_(t)
                        })
                    },
                    t
                } (lo);
                bo.prototype.options_ = {
                    children: ["volumeLevel"],
                    barName: "volumeLevel"
                },
                bo.prototype.playerEvent = "volumechange",
                Tn.registerComponent("VolumeBar", bo);
                var _o = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        Ht(this, t),
                        i.vertical = i.vertical || !1,
                        (void 0 === i.volumeBar || a(i.volumeBar)) && (i.volumeBar = i.volumeBar || {},
                        i.volumeBar.vertical = i.vertical);
                        var o = Yt(this, e.call(this, n, i));
                        return vo(o, n),
                        o.throttledHandleMouseMove = un(hn(o, o.handleMouseMove), 25),
                        o.on("mousedown", o.handleMouseDown),
                        o.on("touchstart", o.handleMouseDown),
                        o.on(o.volumeBar, ["focus", "slideractive"],
                        function() {
                            o.volumeBar.addClass("vjs-slider-active"),
                            o.addClass("vjs-slider-active"),
                            o.trigger("slideractive")
                        }),
                        o.on(o.volumeBar, ["blur", "sliderinactive"],
                        function() {
                            o.volumeBar.removeClass("vjs-slider-active"),
                            o.removeClass("vjs-slider-active"),
                            o.trigger("sliderinactive")
                        }),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        var t = "vjs-volume-horizontal";
                        return this.options_.vertical && (t = "vjs-volume-vertical"),
                        e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-control vjs-control " + t
                        })
                    },
                    t.prototype.handleMouseDown = function(e) {
                        var t = this.el_.ownerDocument;
                        this.on(t, "mousemove", this.throttledHandleMouseMove),
                        this.on(t, "touchmove", this.throttledHandleMouseMove),
                        this.on(t, "mouseup", this.handleMouseUp),
                        this.on(t, "touchend", this.handleMouseUp)
                    },
                    t.prototype.handleMouseUp = function(e) {
                        var t = this.el_.ownerDocument;
                        this.off(t, "mousemove", this.throttledHandleMouseMove),
                        this.off(t, "touchmove", this.throttledHandleMouseMove),
                        this.off(t, "mouseup", this.handleMouseUp),
                        this.off(t, "touchend", this.handleMouseUp)
                    },
                    t.prototype.handleMouseMove = function(e) {
                        this.volumeBar.handleMouseMove(e)
                    },
                    t
                } (Tn);
                _o.prototype.options_ = {
                    children: ["volumeBar"]
                },
                Tn.registerComponent("VolumeControl", _o);
                var wo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return vo(o, n),
                        o.on(n, ["loadstart", "volumechange"], o.update),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-mute-control " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.handleClick = function(e) {
                        var t = this.player_.volume(),
                        n = this.player_.lastVolume_();
                        if (0 === t) {
                            var i = n < .1 ? .1 : n;
                            this.player_.volume(i),
                            this.player_.muted(!1)
                        } else this.player_.muted(!this.player_.muted())
                    },
                    t.prototype.update = function(e) {
                        this.updateIcon_(),
                        this.updateControlText_()
                    },
                    t.prototype.updateIcon_ = function() {
                        var e = this.player_.volume(),
                        t = 3;
                        0 === e || this.player_.muted() ? t = 0 : e < .33 ? t = 1 : e < .67 && (t = 2);
                        for (var n = 0; n < 4; n++) b(this.el_, "vjs-vol-" + n);
                        y(this.el_, "vjs-vol-" + t)
                    },
                    t.prototype.updateControlText_ = function() {
                        var e = this.player_.muted() || 0 === this.player_.volume(),
                        t = e ? "Unmute": "Mute";
                        this.controlText() !== t && this.controlText(t)
                    },
                    t
                } (eo);
                wo.prototype.controlText_ = "Mute",
                Tn.registerComponent("MuteToggle", wo);
                var Eo = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        Ht(this, t),
                        void 0 !== i.inline ? i.inline = i.inline: i.inline = !0,
                        (void 0 === i.volumeControl || a(i.volumeControl)) && (i.volumeControl = i.volumeControl || {},
                        i.volumeControl.vertical = !i.inline);
                        var o = Yt(this, e.call(this, n, i));
                        return vo(o, n),
                        o.on(o.volumeControl, ["slideractive"], o.sliderActive_),
                        o.on(o.muteToggle, "focus", o.sliderActive_),
                        o.on(o.volumeControl, ["sliderinactive"], o.sliderInactive_),
                        o.on(o.muteToggle, "blur", o.sliderInactive_),
                        o
                    }
                    return zt(t, e),
                    t.prototype.sliderActive_ = function() {
                        this.addClass("vjs-slider-active")
                    },
                    t.prototype.sliderInactive_ = function() {
                        this.removeClass("vjs-slider-active")
                    },
                    t.prototype.createEl = function() {
                        var t = "vjs-volume-panel-horizontal";
                        return this.options_.inline || (t = "vjs-volume-panel-vertical"),
                        e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-panel vjs-control " + t
                        })
                    },
                    t
                } (Tn);
                Eo.prototype.options_ = {
                    children: ["muteToggle", "volumeControl"]
                },
                Tn.registerComponent("VolumePanel", Eo);
                var To = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return i && (o.menuButton_ = i.menuButton),
                        o.focusedChild_ = -1,
                        o.on("keydown", o.handleKeyPress),
                        o
                    }
                    return zt(t, e),
                    t.prototype.addItem = function(e) {
                        this.addChild(e),
                        e.on("click", hn(this,
                        function(t) {
                            this.menuButton_ && (this.menuButton_.unpressButton(), "CaptionSettingsMenuItem" !== e.name() && this.menuButton_.focus())
                        }))
                    },
                    t.prototype.createEl = function() {
                        var t = this.options_.contentElType || "ul";
                        this.contentEl_ = p(t, {
                            className: "vjs-menu-content"
                        }),
                        this.contentEl_.setAttribute("role", "menu");
                        var n = e.prototype.createEl.call(this, "div", {
                            append: this.contentEl_,
                            className: "vjs-menu"
                        });
                        return n.appendChild(this.contentEl_),
                        G(n, "click",
                        function(e) {
                            e.preventDefault(),
                            e.stopImmediatePropagation()
                        }),
                        n
                    },
                    t.prototype.dispose = function() {
                        this.contentEl_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.handleKeyPress = function(e) {
                        37 === e.which || 40 === e.which ? (e.preventDefault(), this.stepForward()) : 38 !== e.which && 39 !== e.which || (e.preventDefault(), this.stepBack())
                    },
                    t.prototype.stepForward = function() {
                        var e = 0;
                        void 0 !== this.focusedChild_ && (e = this.focusedChild_ + 1),
                        this.focus(e)
                    },
                    t.prototype.stepBack = function() {
                        var e = 0;
                        void 0 !== this.focusedChild_ && (e = this.focusedChild_ - 1),
                        this.focus(e)
                    },
                    t.prototype.focus = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                        t = this.children().slice();
                        t.length && t[0].className && /vjs-menu-title/.test(t[0].className) && t.shift(),
                        t.length > 0 && (e < 0 ? e = 0 : e >= t.length && (e = t.length - 1), this.focusedChild_ = e, t[e].el_.focus())
                    },
                    t
                } (Tn);
                Tn.registerComponent("Menu", To);
                var jo = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        o.menuButton_ = new eo(n, i),
                        o.menuButton_.controlText(o.controlText_),
                        o.menuButton_.el_.setAttribute("aria-haspopup", "true");
                        var r = eo.prototype.buildCSSClass();
                        return o.menuButton_.el_.className = o.buildCSSClass() + " " + r,
                        o.menuButton_.removeClass("vjs-control"),
                        o.addChild(o.menuButton_),
                        o.update(),
                        o.enabled_ = !0,
                        o.on(o.menuButton_, "tap", o.handleClick),
                        o.on(o.menuButton_, "click", o.handleClick),
                        o.on(o.menuButton_, "focus", o.handleFocus),
                        o.on(o.menuButton_, "blur", o.handleBlur),
                        o.on("keydown", o.handleSubmenuKeyPress),
                        o
                    }
                    return zt(t, e),
                    t.prototype.update = function() {
                        var e = this.createMenu();
                        this.menu && (this.menu.dispose(), this.removeChild(this.menu)),
                        this.menu = e,
                        this.addChild(e),
                        this.buttonPressed_ = !1,
                        this.menuButton_.el_.setAttribute("aria-expanded", "false"),
                        this.items && this.items.length <= this.hideThreshold_ ? this.hide() : this.show()
                    },
                    t.prototype.createMenu = function() {
                        var e = new To(this.player_, {
                            menuButton: this
                        });
                        if (this.hideThreshold_ = 0, this.options_.title) {
                            var t = p("li", {
                                className: "vjs-menu-title",
                                innerHTML: ee(this.options_.title),
                                tabIndex: -1
                            });
                            this.hideThreshold_ += 1,
                            e.children_.unshift(t),
                            m(t, e.contentEl())
                        }
                        if (this.items = this.createItems(), this.items) for (var n = 0; n < this.items.length; n++) e.addItem(this.items[n]);
                        return e
                    },
                    t.prototype.createItems = function() {},
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: this.buildWrapperCSSClass()
                        },
                        {})
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        var t = "vjs-menu-button";
                        return ! 0 === this.options_.inline ? t += "-inline": t += "-popup",
                        "vjs-menu-button " + t + " " + eo.prototype.buildCSSClass() + " " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildCSSClass = function() {
                        var t = "vjs-menu-button";
                        return ! 0 === this.options_.inline ? t += "-inline": t += "-popup",
                        "vjs-menu-button " + t + " " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.controlText = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : this.menuButton_.el();
                        return this.menuButton_.controlText(e, t)
                    },
                    t.prototype.handleClick = function(e) {
                        this.one(this.menu.contentEl(), "mouseleave", hn(this,
                        function(e) {
                            this.unpressButton(),
                            this.el_.blur()
                        })),
                        this.buttonPressed_ ? this.unpressButton() : this.pressButton()
                    },
                    t.prototype.focus = function() {
                        this.menuButton_.focus()
                    },
                    t.prototype.blur = function() {
                        this.menuButton_.blur()
                    },
                    t.prototype.handleFocus = function() {
                        G(ut, "keydown", hn(this, this.handleKeyPress))
                    },
                    t.prototype.handleBlur = function() {
                        X(ut, "keydown", hn(this, this.handleKeyPress))
                    },
                    t.prototype.handleKeyPress = function(e) {
                        27 === e.which || 9 === e.which ? (this.buttonPressed_ && this.unpressButton(), 9 !== e.which && (e.preventDefault(), this.menuButton_.el_.focus())) : 38 !== e.which && 40 !== e.which || this.buttonPressed_ || (this.pressButton(), e.preventDefault())
                    },
                    t.prototype.handleSubmenuKeyPress = function(e) {
                        27 !== e.which && 9 !== e.which || (this.buttonPressed_ && this.unpressButton(), 9 !== e.which && (e.preventDefault(), this.menuButton_.el_.focus()))
                    },
                    t.prototype.pressButton = function() {
                        if (this.enabled_) {
                            if (this.buttonPressed_ = !0, this.menu.lockShowing(), this.menuButton_.el_.setAttribute("aria-expanded", "true"), bt && u()) return;
                            this.menu.focus()
                        }
                    },
                    t.prototype.unpressButton = function() {
                        this.enabled_ && (this.buttonPressed_ = !1, this.menu.unlockShowing(), this.menuButton_.el_.setAttribute("aria-expanded", "false"))
                    },
                    t.prototype.disable = function() {
                        this.unpressButton(),
                        this.enabled_ = !1,
                        this.addClass("vjs-disabled"),
                        this.menuButton_.disable()
                    },
                    t.prototype.enable = function() {
                        this.enabled_ = !0,
                        this.removeClass("vjs-disabled"),
                        this.menuButton_.enable()
                    },
                    t
                } (Tn);
                Tn.registerComponent("MenuButton", jo);
                var xo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = i.tracks,
                        r = Yt(this, e.call(this, n, i));
                        if (r.items.length <= 1 && r.hide(), !o) return Yt(r);
                        var s = hn(r, r.update);
                        return o.addEventListener("removetrack", s),
                        o.addEventListener("addtrack", s),
                        r.player_.on("ready", s),
                        r.player_.on("dispose",
                        function() {
                            o.removeEventListener("removetrack", s),
                            o.removeEventListener("addtrack", s)
                        }),
                        r
                    }
                    return zt(t, e),
                    t
                } (jo);
                Tn.registerComponent("TrackButton", xo);
                var ko = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.selectable = i.selectable,
                        o.selected(i.selected),
                        o.selectable ? o.el_.setAttribute("role", "menuitemcheckbox") : o.el_.setAttribute("role", "menuitem"),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function(t, n, i) {
                        return this.nonIconControl = !0,
                        e.prototype.createEl.call(this, "li", o({
                            className: "vjs-menu-item",
                            innerHTML: '<span class="vjs-menu-item-text">' + this.localize(this.options_.label) + "</span>",
                            tabIndex: -1
                        },
                        n), i)
                    },
                    t.prototype.handleClick = function(e) {
                        this.selected(!0)
                    },
                    t.prototype.selected = function(e) {
                        this.selectable && (e ? (this.addClass("vjs-selected"), this.el_.setAttribute("aria-checked", "true"), this.controlText(", selected")) : (this.removeClass("vjs-selected"), this.el_.setAttribute("aria-checked", "false"), this.controlText("")))
                    },
                    t
                } (Xi);
                Tn.registerComponent("MenuItem", ko);
                var So = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = i.track,
                        r = n.textTracks();
                        i.label = o.label || o.language || "Unknown",
                        i.selected = "showing" === o.mode;
                        var s = Yt(this, e.call(this, n, i));
                        s.track = o;
                        var a = function() {
                            for (var e = arguments.length,
                            t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            s.handleTracksChange.apply(s, t)
                        },
                        A = function() {
                            for (var e = arguments.length,
                            t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            s.handleSelectedLanguageChange.apply(s, t)
                        };
                        if (n.on(["loadstart", "texttrackchange"], a), r.addEventListener("change", a), r.addEventListener("selectedlanguagechange", A), s.on("dispose",
                        function() {
                            n.off(["loadstart", "texttrackchange"], a),
                            r.removeEventListener("change", a),
                            r.removeEventListener("selectedlanguagechange", A)
                        }), void 0 === r.onchange) {
                            var g = void 0;
                            s.on(["tap", "click"],
                            function() {
                                if ("object" !== Nt(lt.Event)) try {
                                    g = new lt.Event("change")
                                } catch(e) {}
                                g || (g = ut.createEvent("Event"), g.initEvent("change", !0, !0)),
                                r.dispatchEvent(g)
                            })
                        }
                        return s.handleTracksChange(),
                        s
                    }
                    return zt(t, e),
                    t.prototype.handleClick = function(t) {
                        var n = this.track.kind,
                        i = this.track.kinds,
                        o = this.player_.textTracks();
                        if (i || (i = [n]), e.prototype.handleClick.call(this, t), o) for (var r = 0; r < o.length; r++) {
                            var s = o[r];
                            s === this.track && i.indexOf(s.kind) > -1 ? "showing" !== s.mode && (s.mode = "showing") : "disabled" !== s.mode && (s.mode = "disabled")
                        }
                    },
                    t.prototype.handleTracksChange = function(e) {
                        this.selected("showing" === this.track.mode)
                    },
                    t.prototype.handleSelectedLanguageChange = function(e) {
                        if ("showing" === this.track.mode) {
                            var t = this.player_.cache_.selectedLanguage;
                            if (t && t.enabled && t.language === this.track.language && t.kind !== this.track.kind) return;
                            this.player_.cache_.selectedLanguage = {
                                enabled: !0,
                                language: this.track.language,
                                kind: this.track.kind
                            }
                        }
                    },
                    t.prototype.dispose = function() {
                        this.track = null,
                        e.prototype.dispose.call(this)
                    },
                    t
                } (ko);
                Tn.registerComponent("TextTrackMenuItem", So);
                var Do = function(e) {
                    function t(n, i) {
                        return Ht(this, t),
                        i.track = {
                            player: n,
                            kind: i.kind,
                            kinds: i.kinds,
                        default:
                            !1,
                            mode: "disabled"
                        },
                        i.kinds || (i.kinds = [i.kind]),
                        i.label ? i.track.label = i.label: i.track.label = i.kinds.join(" and ") + " off",
                        i.selectable = !0,
                        Yt(this, e.call(this, n, i))
                    }
                    return zt(t, e),
                    t.prototype.handleTracksChange = function(e) {
                        for (var t = this.player().textTracks(), n = !0, i = 0, o = t.length; i < o; i++) {
                            var r = t[i];
                            if (this.options_.kinds.indexOf(r.kind) > -1 && "showing" === r.mode) {
                                n = !1;
                                break
                            }
                        }
                        this.selected(n)
                    },
                    t.prototype.handleSelectedLanguageChange = function(e) {
                        for (var t = this.player().textTracks(), n = !0, i = 0, o = t.length; i < o; i++) {
                            var r = t[i];
                            if (["captions", "descriptions", "subtitles"].indexOf(r.kind) > -1 && "showing" === r.mode) {
                                n = !1;
                                break
                            }
                        }
                        n && (this.player_.cache_.selectedLanguage = {
                            enabled: !1
                        })
                    },
                    t
                } (So);
                Tn.registerComponent("OffTextTrackMenuItem", Do);
                var Bo = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        return Ht(this, t),
                        i.tracks = n.textTracks(),
                        Yt(this, e.call(this, n, i))
                    }
                    return zt(t, e),
                    t.prototype.createItems = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                        t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : So,
                        n = void 0;
                        this.label_ && (n = this.label_ + " off"),
                        e.push(new Do(this.player_, {
                            kinds: this.kinds_,
                            kind: this.kind_,
                            label: n
                        })),
                        this.hideThreshold_ += 1;
                        var i = this.player_.textTracks();
                        Array.isArray(this.kinds_) || (this.kinds_ = [this.kind_]);
                        for (var o = 0; o < i.length; o++) {
                            var r = i[o];
                            if (this.kinds_.indexOf(r.kind) > -1) {
                                var s = new t(this.player_, {
                                    track: r,
                                    selectable: !0
                                });
                                s.addClass("vjs-" + r.kind + "-menu-item"),
                                e.push(s)
                            }
                        }
                        return e
                    },
                    t
                } (xo);
                Tn.registerComponent("TextTrackButton", Bo);
                var Oo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = i.track,
                        r = i.cue,
                        s = n.currentTime();
                        i.selectable = !0,
                        i.label = r.text,
                        i.selected = r.startTime <= s && s < r.endTime;
                        var a = Yt(this, e.call(this, n, i));
                        return a.track = o,
                        a.cue = r,
                        o.addEventListener("cuechange", hn(a, a.update)),
                        a
                    }
                    return zt(t, e),
                    t.prototype.handleClick = function(t) {
                        e.prototype.handleClick.call(this),
                        this.player_.currentTime(this.cue.startTime),
                        this.update(this.cue.startTime)
                    },
                    t.prototype.update = function(e) {
                        var t = this.cue,
                        n = this.player_.currentTime();
                        this.selected(t.startTime <= n && n < t.endTime)
                    },
                    t
                } (ko);
                Tn.registerComponent("ChaptersTrackMenuItem", Oo);
                var Ro = function(e) {
                    function t(n, i, o) {
                        return Ht(this, t),
                        Yt(this, e.call(this, n, i, o))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-chapters-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-chapters-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t.prototype.update = function(t) {
                        this.track_ && (!t || "addtrack" !== t.type && "removetrack" !== t.type) || this.setTrack(this.findChaptersTrack()),
                        e.prototype.update.call(this)
                    },
                    t.prototype.setTrack = function(e) {
                        if (this.track_ !== e) {
                            if (this.updateHandler_ || (this.updateHandler_ = this.update.bind(this)), this.track_) {
                                var t = this.player_.remoteTextTrackEls().getTrackElementByTrack_(this.track_);
                                t && t.removeEventListener("load", this.updateHandler_),
                                this.track_ = null
                            }
                            if (this.track_ = e, this.track_) {
                                this.track_.mode = "hidden";
                                var n = this.player_.remoteTextTrackEls().getTrackElementByTrack_(this.track_);
                                n && n.addEventListener("load", this.updateHandler_)
                            }
                        }
                    },
                    t.prototype.findChaptersTrack = function() {
                        for (var e = this.player_.textTracks() || [], t = e.length - 1; t >= 0; t--) {
                            var n = e[t];
                            if (n.kind === this.kind_) return n
                        }
                    },
                    t.prototype.getMenuCaption = function() {
                        return this.track_ && this.track_.label ? this.track_.label: this.localize(ee(this.kind_))
                    },
                    t.prototype.createMenu = function() {
                        return this.options_.title = this.getMenuCaption(),
                        e.prototype.createMenu.call(this)
                    },
                    t.prototype.createItems = function() {
                        var e = [];
                        if (!this.track_) return e;
                        var t = this.track_.cues;
                        if (!t) return e;
                        for (var n = 0,
                        i = t.length; n < i; n++) {
                            var o = t[n],
                            r = new Oo(this.player_, {
                                track: this.track_,
                                cue: o
                            });
                            e.push(r)
                        }
                        return e
                    },
                    t
                } (Bo);
                Ro.prototype.kind_ = "chapters",
                Ro.prototype.controlText_ = "Chapters",
                Tn.registerComponent("ChaptersButton", Ro);
                var Mo = function(e) {
                    function t(n, i, o) {
                        Ht(this, t);
                        var r = Yt(this, e.call(this, n, i, o)),
                        s = n.textTracks(),
                        a = hn(r, r.handleTracksChange);
                        return s.addEventListener("change", a),
                        r.on("dispose",
                        function() {
                            s.removeEventListener("change", a)
                        }),
                        r
                    }
                    return zt(t, e),
                    t.prototype.handleTracksChange = function(e) {
                        for (var t = this.player().textTracks(), n = !1, i = 0, o = t.length; i < o; i++) {
                            var r = t[i];
                            if (r.kind !== this.kind_ && "showing" === r.mode) {
                                n = !0;
                                break
                            }
                        }
                        n ? this.disable() : this.enable()
                    },
                    t.prototype.buildCSSClass = function() {
                        return "vjs-descriptions-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-descriptions-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t
                } (Bo);
                Mo.prototype.kind_ = "descriptions",
                Mo.prototype.controlText_ = "Descriptions",
                Tn.registerComponent("DescriptionsButton", Mo);
                var Po = function(e) {
                    function t(n, i, o) {
                        return Ht(this, t),
                        Yt(this, e.call(this, n, i, o))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-subtitles-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-subtitles-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t
                } (Bo);
                Po.prototype.kind_ = "subtitles",
                Po.prototype.controlText_ = "Subtitles",
                Tn.registerComponent("SubtitlesButton", Po);
                var Fo = function(e) {
                    function t(n, i) {
                        Ht(this, t),
                        i.track = {
                            player: n,
                            kind: i.kind,
                            label: i.kind + " settings",
                            selectable: !1,
                        default:
                            !1,
                            mode: "disabled"
                        },
                        i.selectable = !1,
                        i.name = "CaptionSettingsMenuItem";
                        var o = Yt(this, e.call(this, n, i));
                        return o.addClass("vjs-texttrack-settings"),
                        o.controlText(", opens " + i.kind + " settings dialog"),
                        o
                    }
                    return zt(t, e),
                    t.prototype.handleClick = function(e) {
                        this.player().getChild("textTrackSettings").open()
                    },
                    t
                } (So);
                Tn.registerComponent("CaptionSettingsMenuItem", Fo);
                var Lo = function(e) {
                    function t(n, i, o) {
                        return Ht(this, t),
                        Yt(this, e.call(this, n, i, o))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-captions-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-captions-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t.prototype.createItems = function() {
                        var t = [];
                        return this.player().tech_ && this.player().tech_.featuresNativeTextTracks || (t.push(new Fo(this.player_, {
                            kind: this.kind_
                        })), this.hideThreshold_ += 1),
                        e.prototype.createItems.call(this, t)
                    },
                    t
                } (Bo);
                Lo.prototype.kind_ = "captions",
                Lo.prototype.controlText_ = "Captions",
                Tn.registerComponent("CaptionsButton", Lo);
                var No = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function(t, n, i) {
                        var r = '<span class="vjs-menu-item-text">' + this.localize(this.options_.label);
                        return "captions" === this.options_.track.kind && (r += '\n        <span aria-hidden="true" class="vjs-icon-placeholder"></span>\n        <span class="vjs-control-text"> ' + this.localize("Captions") + "</span>\n      "),
                        r += "</span>",
                        e.prototype.createEl.call(this, t, o({
                            innerHTML: r
                        },
                        n), i)
                    },
                    t
                } (So);
                Tn.registerComponent("SubsCapsMenuItem", No);
                var Ho = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.label_ = "subtitles",
                        ["en", "en-us", "en-ca", "fr-ca"].indexOf(o.player_.language_) > -1 && (o.label_ = "captions"),
                        o.menuButton_.controlText(ee(o.label_)),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-subs-caps-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-subs-caps-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t.prototype.createItems = function() {
                        var t = [];
                        return this.player().tech_ && this.player().tech_.featuresNativeTextTracks || (t.push(new Fo(this.player_, {
                            kind: this.label_
                        })), this.hideThreshold_ += 1),
                        t = e.prototype.createItems.call(this, t, No)
                    },
                    t
                } (Bo);
                Ho.prototype.kinds_ = ["captions", "subtitles"],
                Ho.prototype.controlText_ = "Subtitles",
                Tn.registerComponent("SubsCapsButton", Ho);
                var zo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = i.track,
                        r = n.audioTracks();
                        i.label = o.label || o.language || "Unknown",
                        i.selected = o.enabled;
                        var s = Yt(this, e.call(this, n, i));
                        s.track = o;
                        var a = hn(s, s.handleTracksChange);
                        return r.addEventListener("change", a),
                        s.on("dispose",
                        function() {
                            r.removeEventListener("change", a)
                        }),
                        s
                    }
                    return zt(t, e),
                    t.prototype.handleClick = function(t) {
                        var n = this.player_.audioTracks();
                        e.prototype.handleClick.call(this, t);
                        for (var i = 0; i < n.length; i++) {
                            var o = n[i];
                            o.enabled = o === this.track
                        }
                    },
                    t.prototype.handleTracksChange = function(e) {
                        this.selected(this.track.enabled)
                    },
                    t
                } (ko);
                Tn.registerComponent("AudioTrackMenuItem", zo);
                var Yo = function(e) {
                    function t(n) {
                        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        return Ht(this, t),
                        i.tracks = n.audioTracks(),
                        Yt(this, e.call(this, n, i))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-audio-button " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-audio-button " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t.prototype.createItems = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                        this.hideThreshold_ = 1;
                        for (var t = this.player_.audioTracks(), n = 0; n < t.length; n++) {
                            var i = t[n];
                            e.push(new zo(this.player_, {
                                track: i,
                                selectable: !0
                            }))
                        }
                        return e
                    },
                    t
                } (xo);
                Yo.prototype.controlText_ = "Audio Track",
                Tn.registerComponent("AudioTrackButton", Yo);
                var Qo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = i.rate,
                        r = parseFloat(o, 10);
                        i.label = o,
                        i.selected = 1 === r,
                        i.selectable = !0;
                        var s = Yt(this, e.call(this, n, i));
                        return s.label = o,
                        s.rate = r,
                        s.on(n, "ratechange", s.update),
                        s
                    }
                    return zt(t, e),
                    t.prototype.handleClick = function(t) {
                        e.prototype.handleClick.call(this),
                        this.player().playbackRate(this.rate)
                    },
                    t.prototype.update = function(e) {
                        this.selected(this.player().playbackRate() === this.rate)
                    },
                    t
                } (ko);
                Qo.prototype.contentElType = "button",
                Tn.registerComponent("PlaybackRateMenuItem", Qo);
                var Wo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.updateVisibility(),
                        o.updateLabel(),
                        o.on(n, "loadstart", o.updateVisibility),
                        o.on(n, "ratechange", o.updateLabel),
                        o
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        var t = e.prototype.createEl.call(this);
                        return this.labelEl_ = p("div", {
                            className: "vjs-playback-rate-value",
                            innerHTML: "1x"
                        }),
                        t.appendChild(this.labelEl_),
                        t
                    },
                    t.prototype.dispose = function() {
                        this.labelEl_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.buildCSSClass = function() {
                        return "vjs-playback-rate " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.buildWrapperCSSClass = function() {
                        return "vjs-playback-rate " + e.prototype.buildWrapperCSSClass.call(this)
                    },
                    t.prototype.createMenu = function() {
                        var e = new To(this.player()),
                        t = this.playbackRates();
                        if (t) for (var n = t.length - 1; n >= 0; n--) e.addChild(new Qo(this.player(), {
                            rate: t[n] + "x"
                        }));
                        return e
                    },
                    t.prototype.updateARIAAttributes = function() {
                        this.el().setAttribute("aria-valuenow", this.player().playbackRate())
                    },
                    t.prototype.handleClick = function(e) {
                        for (var t = this.player().playbackRate(), n = this.playbackRates(), i = n[0], o = 0; o < n.length; o++) if (n[o] > t) {
                            i = n[o];
                            break
                        }
                        this.player().playbackRate(i)
                    },
                    t.prototype.playbackRates = function() {
                        return this.options_.playbackRates || this.options_.playerOptions && this.options_.playerOptions.playbackRates
                    },
                    t.prototype.playbackRateSupported = function() {
                        return this.player().tech_ && this.player().tech_.featuresPlaybackRate && this.playbackRates() && this.playbackRates().length > 0
                    },
                    t.prototype.updateVisibility = function(e) {
                        this.playbackRateSupported() ? this.removeClass("vjs-hidden") : this.addClass("vjs-hidden")
                    },
                    t.prototype.updateLabel = function(e) {
                        this.playbackRateSupported() && (this.labelEl_.innerHTML = this.player().playbackRate() + "x")
                    },
                    t
                } (jo);
                Wo.prototype.controlText_ = "Playback Rate",
                Tn.registerComponent("PlaybackRateMenuButton", Wo);
                var Uo = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-spacer " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: this.buildCSSClass()
                        })
                    },
                    t
                } (Tn);
                Tn.registerComponent("Spacer", Uo);
                var Vo = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-custom-control-spacer " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.createEl = function() {
                        var t = e.prototype.createEl.call(this, {
                            className: this.buildCSSClass()
                        });
                        return t.innerHTML = "&nbsp;",
                        t
                    },
                    t
                } (Uo);
                Tn.registerComponent("CustomControlSpacer", Vo);
                var Go = function(e) {
                    function t() {
                        return Ht(this, t),
                        Yt(this, e.apply(this, arguments))
                    }
                    return zt(t, e),
                    t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-control-bar",
                            dir: "ltr"
                        },
                        {
                            role: "group"
                        })
                    },
                    t
                } (Tn);
                Go.prototype.options_ = {
                    children: ["playToggle", "volumePanel", "currentTimeDisplay", "timeDivider", "durationDisplay", "progressControl", "liveDisplay", "remainingTimeDisplay", "customControlSpacer", "playbackRateMenuButton", "chaptersButton", "descriptionsButton", "subsCapsButton", "audioTrackButton", "fullscreenToggle"]
                },
                Tn.registerComponent("ControlBar", Go);
                var Xo = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i));
                        return o.on(n, "error", o.open),
                        o
                    }
                    return zt(t, e),
                    t.prototype.buildCSSClass = function() {
                        return "vjs-error-display " + e.prototype.buildCSSClass.call(this)
                    },
                    t.prototype.content = function() {
                        var e = this.player().error();
                        return e ? this.localize(e.message) : ""
                    },
                    t
                } (Hn);
                Xo.prototype.options_ = ne(Hn.prototype.options_, {
                    pauseOnOpen: !1,
                    fillAlways: !0,
                    temporary: !1,
                    uncloseable: !0
                }),
                Tn.registerComponent("ErrorDisplay", Xo);
                var Zo = "vjs-text-track-settings",
                Jo = ["#000", "Black"],
                Ko = ["#00F", "Blue"],
                qo = ["#0FF", "Cyan"],
                $o = ["#0F0", "Green"],
                er = ["#F0F", "Magenta"],
                tr = ["#F00", "Red"],
                nr = ["#FFF", "White"],
                ir = ["#FF0", "Yellow"],
                or = ["1", "Opaque"],
                rr = ["0.5", "Semi-Transparent"],
                sr = ["0", "Transparent"],
                ar = {
                    backgroundColor: {
                        selector: ".vjs-bg-color > select",
                        id: "captions-background-color-%s",
                        label: "Color",
                        options: [Jo, nr, tr, $o, Ko, ir, er, qo]
                    },
                    backgroundOpacity: {
                        selector: ".vjs-bg-opacity > select",
                        id: "captions-background-opacity-%s",
                        label: "Transparency",
                        options: [or, rr, sr]
                    },
                    color: {
                        selector: ".vjs-fg-color > select",
                        id: "captions-foreground-color-%s",
                        label: "Color",
                        options: [nr, Jo, tr, $o, Ko, ir, er, qo]
                    },
                    edgeStyle: {
                        selector: ".vjs-edge-style > select",
                        id: "%s",
                        label: "Text Edge Style",
                        options: [["none", "None"], ["raised", "Raised"], ["depressed", "Depressed"], ["uniform", "Uniform"], ["dropshadow", "Dropshadow"]]
                    },
                    fontFamily: {
                        selector: ".vjs-font-family > select",
                        id: "captions-font-family-%s",
                        label: "Font Family",
                        options: [["proportionalSansSerif", "Proportional Sans-Serif"], ["monospaceSansSerif", "Monospace Sans-Serif"], ["proportionalSerif", "Proportional Serif"], ["monospaceSerif", "Monospace Serif"], ["casual", "Casual"], ["script", "Script"], ["small-caps", "Small Caps"]]
                    },
                    fontPercent: {
                        selector: ".vjs-font-percent > select",
                        id: "captions-font-size-%s",
                        label: "Font Size",
                        options: [["0.50", "50%"], ["0.75", "75%"], ["1.00", "100%"], ["1.25", "125%"], ["1.50", "150%"], ["1.75", "175%"], ["2.00", "200%"], ["3.00", "300%"], ["4.00", "400%"]],
                    default:
                        2,
                        parser: function(e) {
                            return "1.00" === e ? null: Number(e)
                        }
                    },
                    textOpacity: {
                        selector: ".vjs-text-opacity > select",
                        id: "captions-foreground-opacity-%s",
                        label: "Transparency",
                        options: [or, rr]
                    },
                    windowColor: {
                        selector: ".vjs-window-color > select",
                        id: "captions-window-color-%s",
                        label: "Color"
                    },
                    windowOpacity: {
                        selector: ".vjs-window-opacity > select",
                        id: "captions-window-opacity-%s",
                        label: "Transparency",
                        options: [sr, rr, or]
                    }
                };
                ar.windowColor.options = ar.backgroundColor.options;
                var Ar = function(e) {
                    function i(n, o) {
                        Ht(this, i),
                        o.temporary = !1;
                        var r = Yt(this, e.call(this, n, o));
                        return r.updateDisplay = hn(r, r.updateDisplay),
                        r.fill(),
                        r.hasBeenOpened_ = r.hasBeenFilled_ = !0,
                        r.endDialog = p("p", {
                            className: "vjs-control-text",
                            textContent: r.localize("End of dialog window.")
                        }),
                        r.el().appendChild(r.endDialog),
                        r.setDefaults(),
                        void 0 === o.persistTextTrackSettings && (r.options_.persistTextTrackSettings = r.options_.playerOptions.persistTextTrackSettings),
                        r.on(r.$(".vjs-done-button"), "click",
                        function() {
                            r.saveSettings(),
                            r.close()
                        }),
                        r.on(r.$(".vjs-default-button"), "click",
                        function() {
                            r.setDefaults(),
                            r.updateDisplay()
                        }),
                        t(ar,
                        function(e) {
                            r.on(r.$(e.selector), "change", r.updateDisplay)
                        }),
                        r.options_.persistTextTrackSettings && r.restoreSettings(),
                        r
                    }
                    return zt(i, e),
                    i.prototype.dispose = function() {
                        this.endDialog = null,
                        e.prototype.dispose.call(this)
                    },
                    i.prototype.createElSelect_ = function(e) {
                        var t = this,
                        n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                        i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "label",
                        o = ar[e],
                        r = o.id.replace("%s", this.id_);
                        return ["<" + i + ' id="' + r + '" class="' + ("label" === i ? "vjs-label": "") + '">', this.localize(o.label), "</" + i + ">", '<select aria-labelledby="' + ("" !== n ? n + " ": "") + r + '">'].concat(o.options.map(function(e) {
                            var i = r + "-" + e[1];
                            return ['<option id="' + i + '" value="' + e[0] + '" ', 'aria-labelledby="' + ("" !== n ? n + " ": "") + r + " " + i + '">', t.localize(e[1]), "</option>"].join("")
                        })).concat("</select>").join("")
                    },
                    i.prototype.createElFgColor_ = function() {
                        var e = "captions-text-legend-" + this.id_;
                        return ['<fieldset class="vjs-fg-color vjs-track-setting">', '<legend id="' + e + '">', this.localize("Text"), "</legend>", this.createElSelect_("color", e), '<span class="vjs-text-opacity vjs-opacity">', this.createElSelect_("textOpacity", e), "</span>", "</fieldset>"].join("")
                    },
                    i.prototype.createElBgColor_ = function() {
                        var e = "captions-background-" + this.id_;
                        return ['<fieldset class="vjs-bg-color vjs-track-setting">', '<legend id="' + e + '">', this.localize("Background"), "</legend>", this.createElSelect_("backgroundColor", e), '<span class="vjs-bg-opacity vjs-opacity">', this.createElSelect_("backgroundOpacity", e), "</span>", "</fieldset>"].join("")
                    },
                    i.prototype.createElWinColor_ = function() {
                        var e = "captions-window-" + this.id_;
                        return ['<fieldset class="vjs-window-color vjs-track-setting">', '<legend id="' + e + '">', this.localize("Window"), "</legend>", this.createElSelect_("windowColor", e), '<span class="vjs-window-opacity vjs-opacity">', this.createElSelect_("windowOpacity", e), "</span>", "</fieldset>"].join("")
                    },
                    i.prototype.createElColors_ = function() {
                        return p("div", {
                            className: "vjs-track-settings-colors",
                            innerHTML: [this.createElFgColor_(), this.createElBgColor_(), this.createElWinColor_()].join("")
                        })
                    },
                    i.prototype.createElFont_ = function() {
                        return p("div", {
                            className: 'vjs-track-settings-font">',
                            innerHTML: ['<fieldset class="vjs-font-percent vjs-track-setting">', this.createElSelect_("fontPercent", "", "legend"), "</fieldset>", '<fieldset class="vjs-edge-style vjs-track-setting">', this.createElSelect_("edgeStyle", "", "legend"), "</fieldset>", '<fieldset class="vjs-font-family vjs-track-setting">', this.createElSelect_("fontFamily", "", "legend"), "</fieldset>"].join("")
                        })
                    },
                    i.prototype.createElControls_ = function() {
                        var e = this.localize("restore all settings to the default values");
                        return p("div", {
                            className: "vjs-track-settings-controls",
                            innerHTML: ['<button class="vjs-default-button" title="' + e + '">', this.localize("Reset"), '<span class="vjs-control-text"> ' + e + "</span>", "</button>", '<button class="vjs-done-button">' + this.localize("Done") + "</button>"].join("")
                        })
                    },
                    i.prototype.content = function() {
                        return [this.createElColors_(), this.createElFont_(), this.createElControls_()]
                    },
                    i.prototype.label = function() {
                        return this.localize("Caption Settings Dialog")
                    },
                    i.prototype.description = function() {
                        return this.localize("Beginning of dialog window. Escape will cancel and close the window.")
                    },
                    i.prototype.buildCSSClass = function() {
                        return e.prototype.buildCSSClass.call(this) + " vjs-text-track-settings"
                    },
                    i.prototype.getValues = function() {
                        var e = this;
                        return n(ar,
                        function(t, n, i) {
                            var o = it(e.$(n.selector), n.parser);
                            return void 0 !== o && (t[i] = o),
                            t
                        },
                        {})
                    },
                    i.prototype.setValues = function(e) {
                        var n = this;
                        t(ar,
                        function(t, i) {
                            ot(n.$(t.selector), e[i], t.parser)
                        })
                    },
                    i.prototype.setDefaults = function() {
                        var e = this;
                        t(ar,
                        function(t) {
                            var n = t.hasOwnProperty("default") ? t.
                        default:
                            0;
                            e.$(t.selector).selectedIndex = n
                        })
                    },
                    i.prototype.restoreSettings = function() {
                        var e = void 0;
                        try {
                            e = JSON.parse(lt.localStorage.getItem(Zo))
                        } catch(e) {
                            Jt.warn(e)
                        }
                        e && this.setValues(e)
                    },
                    i.prototype.saveSettings = function() {
                        if (this.options_.persistTextTrackSettings) {
                            var e = this.getValues();
                            try {
                                Object.keys(e).length ? lt.localStorage.setItem(Zo, JSON.stringify(e)) : lt.localStorage.removeItem(Zo)
                            } catch(e) {
                                Jt.warn(e)
                            }
                        }
                    },
                    i.prototype.updateDisplay = function() {
                        var e = this.player_.getChild("textTrackDisplay");
                        e && e.updateDisplay()
                    },
                    i.prototype.conditionalBlur_ = function() {
                        this.previouslyActiveEl_ = null,
                        this.off(ut, "keydown", this.handleKeyDown);
                        var e = this.player_.controlBar,
                        t = e && e.subsCapsButton,
                        n = e && e.captionsButton;
                        t ? t.focus() : n && n.focus()
                    },
                    i
                } (Hn);
                Tn.registerComponent("TextTrackSettings", Ar);
                var gr = Qt(["Text Tracks are being loaded from another origin but the crossorigin attribute isn't used.\n            This may prevent text tracks from loading."], ["Text Tracks are being loaded from another origin but the crossorigin attribute isn't used.\n            This may prevent text tracks from loading."]),
                lr = function(e) {
                    function t(n, i) {
                        Ht(this, t);
                        var o = Yt(this, e.call(this, n, i)),
                        r = n.source,
                        s = !1;
                        if (r && (o.el_.currentSrc !== r.src || n.tag && 3 === n.tag.initNetworkState_) ? o.setSource(r) : o.handleLateInit_(o.el_), o.el_.hasChildNodes()) {
                            for (var a = o.el_.childNodes,
                            A = a.length,
                            g = []; A--;) {
                                var l = a[A];
                                "track" === l.nodeName.toLowerCase() && (o.featuresNativeTextTracks ? (o.remoteTextTrackEls().addTrackElement_(l), o.remoteTextTracks().addTrack(l.track), o.textTracks().addTrack(l.track), s || o.el_.hasAttribute("crossorigin") || !oi(l.src) || (s = !0)) : g.push(l))
                            }
                            for (var c = 0; c < g.length; c++) o.el_.removeChild(g[c])
                        }
                        return o.proxyNativeTracks_(),
                        o.featuresNativeTextTracks && s && Jt.warn(Kt(gr)),
                        o.restoreMetadataTracksInIOSNativePlayer_(),
                        (Pt || vt || jt) && !0 === n.nativeControlsForTouch && o.setControls(!0),
                        o.proxyWebkitFullscreen_(),
                        o.triggerReady(),
                        o
                    }
                    return zt(t, e),
                    t.prototype.dispose = function() {
                        t.disposeMediaElement(this.el_),
                        this.options_ = null,
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.restoreMetadataTracksInIOSNativePlayer_ = function() {
                        var e = this.textTracks(),
                        t = void 0,
                        n = function() {
                            t = [];
                            for (var n = 0; n < e.length; n++) {
                                var i = e[n];
                                "metadata" === i.kind && t.push({
                                    track: i,
                                    storedMode: i.mode
                                })
                            }
                        };
                        n(),
                        e.addEventListener("change", n),
                        this.on("dispose",
                        function() {
                            return e.removeEventListener("change", n)
                        });
                        var i = function n() {
                            for (var i = 0; i < t.length; i++) {
                                var o = t[i];
                                "disabled" === o.track.mode && o.track.mode !== o.storedMode && (o.track.mode = o.storedMode)
                            }
                            e.removeEventListener("change", n)
                        };
                        this.on("webkitbeginfullscreen",
                        function() {
                            e.removeEventListener("change", n),
                            e.removeEventListener("change", i),
                            e.addEventListener("change", i)
                        }),
                        this.on("webkitendfullscreen",
                        function() {
                            e.removeEventListener("change", n),
                            e.addEventListener("change", n),
                            e.removeEventListener("change", i)
                        })
                    },
                    t.prototype.proxyNativeTracks_ = function() {
                        var e = this;
                        Ei.names.forEach(function(t) {
                            var n = Ei[t],
                            i = e.el()[n.getterName],
                            o = e[n.getterName]();
                            if (e["featuresNative" + n.capitalName + "Tracks"] && i && i.addEventListener) {
                                var r = {
                                    change: function(e) {
                                        o.trigger({
                                            type: "change",
                                            target: o,
                                            currentTarget: o,
                                            srcElement: o
                                        })
                                    },
                                    addtrack: function(e) {
                                        o.addTrack(e.track)
                                    },
                                    removetrack: function(e) {
                                        o.removeTrack(e.track)
                                    }
                                },
                                s = function() {
                                    for (var e = [], t = 0; t < o.length; t++) {
                                        for (var n = !1,
                                        r = 0; r < i.length; r++) if (i[r] === o[t]) {
                                            n = !0;
                                            break
                                        }
                                        n || e.push(o[t])
                                    }
                                    for (; e.length;) o.removeTrack(e.shift())
                                };
                                Object.keys(r).forEach(function(t) {
                                    var n = r[t];
                                    i.addEventListener(t, n),
                                    e.on("dispose",
                                    function(e) {
                                        return i.removeEventListener(t, n)
                                    })
                                }),
                                e.on("loadstart", s),
                                e.on("dispose",
                                function(t) {
                                    return e.off("loadstart", s)
                                })
                            }
                        })
                    },
                    t.prototype.createEl = function() {
                        var e = this.options_.tag;
                        if (!e || !this.options_.playerElIngest && !this.movingMediaElementInDOM) {
                            if (e) {
                                var n = e.cloneNode(!0);
                                e.parentNode && e.parentNode.insertBefore(n, e),
                                t.disposeMediaElement(e),
                                e = n
                            } else {
                                e = ut.createElement("video");
                                var i = this.options_.tag && E(this.options_.tag),
                                r = ne({},
                                i);
                                Pt && !0 === this.options_.nativeControlsForTouch || delete r.controls,
                                w(e, o(r, {
                                    id: this.options_.techId,
                                    class: "vjs-tech"
                                }))
                            }
                            e.playerId = this.options_.playerId
                        }
                        void 0 !== this.options_.preload && j(e, "preload", this.options_.preload);
                        for (var s = ["loop", "muted", "playsinline", "autoplay"], a = 0; a < s.length; a++) {
                            var A = s[a],
                            g = this.options_[A];
                            void 0 !== g && (g ? j(e, A, A) : x(e, A), e[A] = g)
                        }
                        return e
                    },
                    t.prototype.handleLateInit_ = function(e) {
                        if (0 !== e.networkState && 3 !== e.networkState) {
                            if (0 === e.readyState) {
                                var t = !1,
                                n = function() {
                                    t = !0
                                };
                                this.on("loadstart", n);
                                var i = function() {
                                    t || this.trigger("loadstart")
                                };
                                return this.on("loadedmetadata", i),
                                void this.ready(function() {
                                    this.off("loadstart", n),
                                    this.off("loadedmetadata", i),
                                    t || this.trigger("loadstart")
                                })
                            }
                            var o = ["loadstart"];
                            o.push("loadedmetadata"),
                            e.readyState >= 2 && o.push("loadeddata"),
                            e.readyState >= 3 && o.push("canplay"),
                            e.readyState >= 4 && o.push("canplaythrough"),
                            this.ready(function() {
                                o.forEach(function(e) {
                                    this.trigger(e)
                                },
                                this)
                            })
                        }
                    },
                    t.prototype.setCurrentTime = function(e) {
                        try {
                            this.el_.currentTime = e
                        } catch(e) {
                            Jt(e, "Video is not ready. (Video.js)")
                        }
                    },
                    t.prototype.duration = function() {
                        var e = this;
                        if (this.el_.duration === 1 / 0 && wt && St && 0 === this.el_.currentTime) {
                            var t = function t() {
                                e.el_.currentTime > 0 && (e.el_.duration === 1 / 0 && e.trigger("durationchange"), e.off("timeupdate", t))
                            };
                            return this.on("timeupdate", t),
                            NaN
                        }
                        return this.el_.duration || NaN
                    },
                    t.prototype.width = function() {
                        return this.el_.offsetWidth
                    },
                    t.prototype.height = function() {
                        return this.el_.offsetHeight
                    },
                    t.prototype.proxyWebkitFullscreen_ = function() {
                        var e = this;
                        if ("webkitDisplayingFullscreen" in this.el_) {
                            var t = function() {
                                this.trigger("fullscreenchange", {
                                    isFullscreen: !1
                                })
                            },
                            n = function() {
                                "webkitPresentationMode" in this.el_ && "picture-in-picture" !== this.el_.webkitPresentationMode && (this.one("webkitendfullscreen", t), this.trigger("fullscreenchange", {
                                    isFullscreen: !0
                                }))
                            };
                            this.on("webkitbeginfullscreen", n),
                            this.on("dispose",
                            function() {
                                e.off("webkitbeginfullscreen", n),
                                e.off("webkitendfullscreen", t)
                            })
                        }
                    },
                    t.prototype.supportsFullScreen = function() {
                        if ("function" == typeof this.el_.webkitEnterFullScreen) {
                            var e = lt.navigator && lt.navigator.userAgent || "";
                            if (/Android/.test(e) || !/Chrome|Mac OS X 10.5/.test(e)) return ! 0
                        }
                        return ! 1
                    },
                    t.prototype.enterFullScreen = function() {
                        var e = this.el_;
                        e.paused && e.networkState <= e.HAVE_METADATA ? (this.el_.play(), this.setTimeout(function() {
                            e.pause(),
                            e.webkitEnterFullScreen()
                        },
                        0)) : e.webkitEnterFullScreen()
                    },
                    t.prototype.exitFullScreen = function() {
                        this.el_.webkitExitFullScreen()
                    },
                    t.prototype.src = function(e) {
                        if (void 0 === e) return this.el_.src;
                        this.setSrc(e)
                    },
                    t.prototype.reset = function() {
                        t.resetMediaElement(this.el_)
                    },
                    t.prototype.currentSrc = function() {
                        return this.currentSource_ ? this.currentSource_.src: this.el_.currentSrc
                    },
                    t.prototype.setControls = function(e) {
                        this.el_.controls = !!e
                    },
                    t.prototype.addTextTrack = function(t, n, i) {
                        return this.featuresNativeTextTracks ? this.el_.addTextTrack(t, n, i) : e.prototype.addTextTrack.call(this, t, n, i)
                    },
                    t.prototype.createRemoteTextTrack = function(t) {
                        if (!this.featuresNativeTextTracks) return e.prototype.createRemoteTextTrack.call(this, t);
                        var n = ut.createElement("track");
                        return t.kind && (n.kind = t.kind),
                        t.label && (n.label = t.label),
                        (t.language || t.srclang) && (n.srclang = t.language || t.srclang),
                        t.
                    default && (n.
                    default = t.
                    default),
                        t.id && (n.id = t.id),
                        t.src && (n.src = t.src),
                        n
                    },
                    t.prototype.addRemoteTextTrack = function(t, n) {
                        var i = e.prototype.addRemoteTextTrack.call(this, t, n);
                        return this.featuresNativeTextTracks && this.el().appendChild(i),
                        i
                    },
                    t.prototype.removeRemoteTextTrack = function(t) {
                        if (e.prototype.removeRemoteTextTrack.call(this, t), this.featuresNativeTextTracks) for (var n = this.$$("track"), i = n.length; i--;) t !== n[i] && t !== n[i].track || this.el().removeChild(n[i])
                    },
                    t.prototype.getVideoPlaybackQuality = function() {
                        if ("function" == typeof this.el().getVideoPlaybackQuality) return this.el().getVideoPlaybackQuality();
                        var e = {};
                        return void 0 !== this.el().webkitDroppedFrameCount && void 0 !== this.el().webkitDecodedFrameCount && (e.droppedVideoFrames = this.el().webkitDroppedFrameCount, e.totalVideoFrames = this.el().webkitDecodedFrameCount),
                        lt.performance && "function" == typeof lt.performance.now ? e.creationTime = lt.performance.now() : lt.performance && lt.performance.timing && "number" == typeof lt.performance.timing.navigationStart && (e.creationTime = lt.Date.now() - lt.performance.timing.navigationStart),
                        e
                    },
                    t
                } (Yi);
                if (I()) {
                    lr.TEST_VID = ut.createElement("video");
                    var cr = ut.createElement("track");
                    cr.kind = "captions",
                    cr.srclang = "en",
                    cr.label = "English",
                    lr.TEST_VID.appendChild(cr)
                }
                lr.isSupported = function() {
                    try {
                        lr.TEST_VID.volume = .5
                    } catch(e) {
                        return ! 1
                    }
                    return ! (!lr.TEST_VID || !lr.TEST_VID.canPlayType)
                },
                lr.canPlayType = function(e) {
                    return lr.TEST_VID.canPlayType(e)
                },
                lr.canPlaySource = function(e, t) {
                    return lr.canPlayType(e.type)
                },
                lr.canControlVolume = function() {
                    try {
                        var e = lr.TEST_VID.volume;
                        return lr.TEST_VID.volume = e / 2 + .1,
                        e !== lr.TEST_VID.volume
                    } catch(e) {
                        return ! 1
                    }
                },
                lr.canControlPlaybackRate = function() {
                    if (wt && St && Dt < 58) return ! 1;
                    try {
                        var e = lr.TEST_VID.playbackRate;
                        return lr.TEST_VID.playbackRate = e / 2 + .1,
                        e !== lr.TEST_VID.playbackRate
                    } catch(e) {
                        return ! 1
                    }
                },
                lr.supportsNativeTextTracks = function() {
                    return Mt
                },
                lr.supportsNativeVideoTracks = function() {
                    return ! (!lr.TEST_VID || !lr.TEST_VID.videoTracks)
                },
                lr.supportsNativeAudioTracks = function() {
                    return ! (!lr.TEST_VID || !lr.TEST_VID.audioTracks)
                },
                lr.Events = ["loadstart", "suspend", "abort", "error", "emptied", "stalled", "loadedmetadata", "loadeddata", "canplay", "canplaythrough", "playing", "waiting", "seeking", "seeked", "ended", "durationchange", "timeupdate", "progress", "play", "pause", "ratechange", "resize", "volumechange"],
                lr.prototype.featuresVolumeControl = lr.canControlVolume(),
                lr.prototype.featuresPlaybackRate = lr.canControlPlaybackRate(),
                lr.prototype.movingMediaElementInDOM = !bt,
                lr.prototype.featuresFullscreenResize = !0,
                lr.prototype.featuresProgressEvents = !0,
                lr.prototype.featuresTimeupdateEvents = !0,
                lr.prototype.featuresNativeTextTracks = lr.supportsNativeTextTracks(),
                lr.prototype.featuresNativeVideoTracks = lr.supportsNativeVideoTracks(),
                lr.prototype.featuresNativeAudioTracks = lr.supportsNativeAudioTracks();
                var Cr = lr.TEST_VID && lr.TEST_VID.constructor.prototype.canPlayType,
                Ir = /^application\/(?:x-|vnd\.apple\.)mpegurl/i,
                hr = /^video\/mp4/i;
                lr.patchCanPlayType = function() {
                    Et >= 4 && !xt ? lr.TEST_VID.constructor.prototype.canPlayType = function(e) {
                        return e && Ir.test(e) ? "maybe": Cr.call(this, e)
                    }: Tt && (lr.TEST_VID.constructor.prototype.canPlayType = function(e) {
                        return e && hr.test(e) ? "maybe": Cr.call(this, e)
                    })
                },
                lr.unpatchCanPlayType = function() {
                    var e = lr.TEST_VID.constructor.prototype.canPlayType;
                    return lr.TEST_VID.constructor.prototype.canPlayType = Cr,
                    e
                },
                lr.patchCanPlayType(),
                lr.disposeMediaElement = function(e) {
                    if (e) {
                        for (e.parentNode && e.parentNode.removeChild(e); e.hasChildNodes();) e.removeChild(e.firstChild);
                        e.removeAttribute("src"),
                        "function" == typeof e.load &&
                        function() {
                            try {
                                e.load()
                            } catch(e) {}
                        } ()
                    }
                },
                lr.resetMediaElement = function(e) {
                    if (e) {
                        for (var t = e.querySelectorAll("source"), n = t.length; n--;) e.removeChild(t[n]);
                        e.removeAttribute("src"),
                        "function" == typeof e.load &&
                        function() {
                            try {
                                e.load()
                            } catch(e) {}
                        } ()
                    }
                },
                ["muted", "defaultMuted", "autoplay", "controls", "loop", "playsinline"].forEach(function(e) {
                    lr.prototype[e] = function() {
                        return this.el_[e] || this.el_.hasAttribute(e)
                    }
                }),
                ["muted", "defaultMuted", "autoplay", "loop", "playsinline"].forEach(function(e) {
                    lr.prototype["set" + ee(e)] = function(t) {
                        this.el_[e] = t,
                        t ? this.el_.setAttribute(e, e) : this.el_.removeAttribute(e)
                    }
                }),
                ["paused", "currentTime", "buffered", "volume", "poster", "preload", "error", "seeking", "seekable", "ended", "playbackRate", "defaultPlaybackRate", "played", "networkState", "readyState", "videoWidth", "videoHeight"].forEach(function(e) {
                    lr.prototype[e] = function() {
                        return this.el_[e]
                    }
                }),
                ["volume", "src", "poster", "preload", "playbackRate", "defaultPlaybackRate"].forEach(function(e) {
                    lr.prototype["set" + ee(e)] = function(t) {
                        this.el_[e] = t
                    }
                }),
                ["pause", "load", "play"].forEach(function(e) {
                    lr.prototype[e] = function() {
                        return this.el_[e]()
                    }
                }),
                Yi.withSourceHandlers(lr),
                lr.nativeSourceHandler = {},
                lr.nativeSourceHandler.canPlayType = function(e) {
                    try {
                        return lr.TEST_VID.canPlayType(e)
                    } catch(e) {
                        return ""
                    }
                },
                lr.nativeSourceHandler.canHandleSource = function(e, t) {
                    if (e.type) return lr.nativeSourceHandler.canPlayType(e.type);
                    if (e.src) {
                        var n = ii(e.src);
                        return lr.nativeSourceHandler.canPlayType("video/" + n)
                    }
                    return ""
                },
                lr.nativeSourceHandler.handleSource = function(e, t, n) {
                    t.setSrc(e.src)
                },
                lr.nativeSourceHandler.dispose = function() {},
                lr.registerSourceHandler(lr.nativeSourceHandler),
                Yi.registerTech("Html5", lr);
                var ur = Qt([""]),
                dr = ["progress", "abort", "suspend", "emptied", "stalled", "loadedmetadata", "loadeddata", "timeupdate", "ratechange", "resize", "volumechange", "texttrackchange"],
                pr = function(e) {
                    function t(n, i, r) {
                        if (Ht(this, t), n.id = n.id || "vjs_video_" + H(), i = o(t.getTagSettings(n), i), i.initChildren = !1, i.createEl = !1, i.evented = !1, i.reportTouchActivity = !1, !i.language) if ("function" == typeof n.closest) {
                            var s = n.closest("[lang]");
                            s && s.getAttribute && (i.language = s.getAttribute("lang"))
                        } else for (var a = n; a && 1 === a.nodeType;) {
                            if (E(a).hasOwnProperty("lang")) {
                                i.language = a.getAttribute("lang");
                                break
                            }
                            a = a.parentNode
                        }
                        var A = Yt(this, e.call(this, null, i, r));
                        if (A.isReady_ = !1, A.hasStarted_ = !1, A.userActive_ = !1, !A.options_ || !A.options_.techOrder || !A.options_.techOrder.length) throw new Error("No techOrder specified. Did you overwrite videojs.options instead of just changing the properties you want to override?");
                        if (A.tag = n, A.tagAttributes = n && E(n), A.language(A.options_.language), i.languages) {
                            var g = {};
                            Object.getOwnPropertyNames(i.languages).forEach(function(e) {
                                g[e.toLowerCase()] = i.languages[e]
                            }),
                            A.languages_ = g
                        } else A.languages_ = t.prototype.options_.languages;
                        A.cache_ = {},
                        A.poster_ = i.poster || "",
                        A.controls_ = !!i.controls,
                        A.cache_.lastVolume = 1,
                        n.controls = !1,
                        n.removeAttribute("controls"),
                        A.scrubbing_ = !1,
                        A.el_ = A.createEl(),
                        q(A, {
                            eventBusKey: "el_"
                        });
                        var l = ne(A.options_);
                        if (i.plugins) {
                            var c = i.plugins;
                            Object.keys(c).forEach(function(e) {
                                if ("function" != typeof this[e]) throw new Error('plugin "' + e + '" does not exist');
                                this[e](c[e])
                            },
                            A)
                        }
                        A.options_.playerOptions = l,
                        A.middleware_ = [],
                        A.initChildren(),
                        A.isAudio("audio" === n.nodeName.toLowerCase()),
                        A.controls() ? A.addClass("vjs-controls-enabled") : A.addClass("vjs-controls-disabled"),
                        A.el_.setAttribute("role", "region"),
                        A.isAudio() ? A.el_.setAttribute("aria-label", A.localize("Audio Player")) : A.el_.setAttribute("aria-label", A.localize("Video Player")),
                        A.isAudio() && A.addClass("vjs-audio"),
                        A.flexNotSupported_() && A.addClass("vjs-no-flex"),
                        bt || A.addClass("vjs-workinghover"),
                        t.players[A.id_] = A;
                        var C = at.split(".")[0];
                        return A.addClass("vjs-v" + C),
                        A.userActive(!0),
                        A.reportUserActivity(),
                        A.listenForUserActivity_(),
                        A.on("fullscreenchange", A.handleFullscreenChange_),
                        A.on("stageclick", A.handleStageClick_),
                        A.changingSrc_ = !1,
                        A.playWaitingForReady_ = !1,
                        A.playOnLoadstart_ = null,
                        A.forceAutoplayInChrome_(),
                        A
                    }
                    return zt(t, e),
                    t.prototype.dispose = function() {
                        this.trigger("dispose"),
                        this.off("dispose"),
                        this.styleEl_ && this.styleEl_.parentNode && (this.styleEl_.parentNode.removeChild(this.styleEl_), this.styleEl_ = null),
                        t.players[this.id_] = null,
                        this.tag && this.tag.player && (this.tag.player = null),
                        this.el_ && this.el_.player && (this.el_.player = null),
                        this.tech_ && this.tech_.dispose(),
                        this.playerElIngest_ && (this.playerElIngest_ = null),
                        this.tag && (this.tag = null),
                        e.prototype.dispose.call(this)
                    },
                    t.prototype.createEl = function() {
                        var t = this.tag,
                        n = void 0,
                        i = this.playerElIngest_ = t.parentNode && t.parentNode.hasAttribute && t.parentNode.hasAttribute("data-vjs-player"),
                        o = "video-js" === this.tag.tagName.toLowerCase();
                        i ? n = this.el_ = t.parentNode: o || (n = this.el_ = e.prototype.createEl.call(this, "div"));
                        var r = E(t);
                        if (o) {
                            for (n = this.el_ = t, t = this.tag = ut.createElement("video"); n.children.length;) t.appendChild(n.firstChild);
                            v(n, "video-js") || y(n, "video-js"),
                            n.appendChild(t),
                            i = this.playerElIngest_ = n
                        }
                        if (t.setAttribute("tabindex", "-1"), t.removeAttribute("width"), t.removeAttribute("height"), Object.getOwnPropertyNames(r).forEach(function(e) {
                            "class" === e ? (n.className += " " + r[e], o && (t.className += " " + r[e])) : (n.setAttribute(e, r[e]), o && t.setAttribute(e, r[e]))
                        }), t.playerId = t.id, t.id += "_html5_api", t.className = "vjs-tech", t.player = n.player = this, this.addClass("vjs-paused"), !0 !== lt.VIDEOJS_NO_DYNAMIC_STYLE) {
                            this.styleEl_ = Cn("vjs-styles-dimensions");
                            var s = $t(".vjs-styles-defaults"),
                            a = $t("head");
                            a.insertBefore(this.styleEl_, s ? s.nextSibling: a.firstChild)
                        }
                        this.width(this.options_.width),
                        this.height(this.options_.height),
                        this.fluid(this.options_.fluid),
                        this.aspectRatio(this.options_.aspectRatio);
                        for (var A = t.getElementsByTagName("a"), g = 0; g < A.length; g++) {
                            var l = A.item(g);
                            y(l, "vjs-hidden"),
                            l.setAttribute("hidden", "hidden")
                        }
                        return t.initNetworkState_ = t.networkState,
                        t.parentNode && !i && t.parentNode.insertBefore(n, t),
                        m(t, n),
                        this.children_.unshift(t),
                        this.el_.setAttribute("lang", this.language_),
                        this.el_ = n,
                        n
                    },
                    t.prototype.width = function(e, t) {
                        return this.dimension("width", e, t)
                    },
                    t.prototype.height = function(e, t) {
                        return this.dimension("height", e, t)
                    },
                    t.prototype.dimension = function(e, t, n) {
                        var i = e + "_";
                        if (void 0 === t) return this[i] || 0;
                        if ("" === t) return this[i] = void 0,
                        void this.updateStyleEl_();
                        var o = parseFloat(t);
                        if (isNaN(o)) return void Jt.error('Improper value "' + t + '" supplied for for ' + e);
                        this[i] = o,
                        this.updateStyleEl_(),
                        this.isReady_ && !n && this.trigger("playerresize")
                    },
                    t.prototype.fluid = function(e) {
                        if (void 0 === e) return !! this.fluid_;
                        this.fluid_ = !!e,
                        e ? this.addClass("vjs-fluid") : this.removeClass("vjs-fluid"),
                        this.updateStyleEl_()
                    },
                    t.prototype.aspectRatio = function(e) {
                        if (void 0 === e) return this.aspectRatio_;
                        if (!/^\d+\:\d+$/.test(e)) throw new Error("Improper value supplied for aspect ratio. The format should be width:height, for example 16:9.");
                        this.aspectRatio_ = e,
                        this.fluid(!0),
                        this.updateStyleEl_()
                    },
                    t.prototype.updateStyleEl_ = function() {
                        if (!0 === lt.VIDEOJS_NO_DYNAMIC_STYLE) {
                            var e = "number" == typeof this.width_ ? this.width_: this.options_.width,
                            t = "number" == typeof this.height_ ? this.height_: this.options_.height,
                            n = this.tech_ && this.tech_.el();
                            return void(n && (e >= 0 && (n.width = e), t >= 0 && (n.height = t)))
                        }
                        var i = void 0,
                        o = void 0,
                        r = void 0,
                        s = void 0;
                        r = void 0 !== this.aspectRatio_ && "auto" !== this.aspectRatio_ ? this.aspectRatio_: this.videoWidth() > 0 ? this.videoWidth() + ":" + this.videoHeight() : "16:9";
                        var a = r.split(":"),
                        A = a[1] / a[0];
                        i = void 0 !== this.width_ ? this.width_: void 0 !== this.height_ ? this.height_ / A: this.videoWidth() || 300,
                        o = void 0 !== this.height_ ? this.height_: i * A,
                        s = /^[^a-zA-Z]/.test(this.id()) ? "dimensions-" + this.id() : this.id() + "-dimensions",
                        this.addClass(s),
                        In(this.styleEl_, "\n      ." + s + " {\n        width: " + i + "px;\n        height: " + o + "px;\n      }\n\n      ." + s + ".vjs-fluid {\n        padding-top: " + 100 * A + "%;\n      }\n    ")
                    },
                    t.prototype.loadTech_ = function(e, t) {
                        var n = this;
                        this.tech_ && this.unloadTech_();
                        var i = ee(e),
                        r = e.charAt(0).toLowerCase() + e.slice(1);
                        "Html5" !== i && this.tag && (Yi.getTech("Html5").disposeMediaElement(this.tag), this.tag.player = null, this.tag = null),
                        this.techName_ = i,
                        this.isReady_ = !1;
                        var s = {
                            source: t,
                            nativeControlsForTouch: this.options_.nativeControlsForTouch,
                            playerId: this.id(),
                            techId: this.id() + "_" + i + "_api",
                            autoplay: this.options_.autoplay,
                            playsinline: this.options_.playsinline,
                            preload: this.options_.preload,
                            loop: this.options_.loop,
                            muted: this.options_.muted,
                            poster: this.poster(),
                            language: this.language(),
                            playerElIngest: this.playerElIngest_ || !1,
                            "vtt.js": this.options_["vtt.js"]
                        };
                        ji.names.forEach(function(e) {
                            var t = ji[e];
                            s[t.getterName] = n[t.privateName]
                        }),
                        o(s, this.options_[i]),
                        o(s, this.options_[r]),
                        o(s, this.options_[e.toLowerCase()]),
                        this.tag && (s.tag = this.tag),
                        t && t.src === this.cache_.src && this.cache_.currentTime > 0 && (s.startTime = this.cache_.currentTime);
                        var a = Yi.getTech(e);
                        if (!a) throw new Error("No Tech named '" + i + "' exists! '" + i + "' should be registered using videojs.registerTech()'");
                        this.tech_ = new a(s),
                        this.tech_.ready(hn(this, this.handleTechReady_), !0),
                        Ln.jsonToTextTracks(this.textTracksJson_ || [], this.tech_),
                        dr.forEach(function(e) {
                            n.on(n.tech_, e, n["handleTech" + ee(e) + "_"])
                        }),
                        this.on(this.tech_, "loadstart", this.handleTechLoadStart_),
                        this.on(this.tech_, "waiting", this.handleTechWaiting_),
                        this.on(this.tech_, "canplay", this.handleTechCanPlay_),
                        this.on(this.tech_, "canplaythrough", this.handleTechCanPlayThrough_),
                        this.on(this.tech_, "playing", this.handleTechPlaying_),
                        this.on(this.tech_, "ended", this.handleTechEnded_),
                        this.on(this.tech_, "seeking", this.handleTechSeeking_),
                        this.on(this.tech_, "seeked", this.handleTechSeeked_),
                        this.on(this.tech_, "play", this.handleTechPlay_),
                        this.on(this.tech_, "firstplay", this.handleTechFirstPlay_),
                        this.on(this.tech_, "pause", this.handleTechPause_),
                        this.on(this.tech_, "durationchange", this.handleTechDurationChange_),
                        this.on(this.tech_, "fullscreenchange", this.handleTechFullscreenChange_),
                        this.on(this.tech_, "error", this.handleTechError_),
                        this.on(this.tech_, "loadedmetadata", this.updateStyleEl_),
                        this.on(this.tech_, "posterchange", this.handleTechPosterChange_),
                        this.on(this.tech_, "textdata", this.handleTechTextData_),
                        this.usingNativeControls(this.techGet_("controls")),
                        this.controls() && !this.usingNativeControls() && this.addTechControlsListeners_(),
                        this.tech_.el().parentNode === this.el() || "Html5" === i && this.tag || m(this.tech_.el(), this.el()),
                        this.tag && (this.tag.player = null, this.tag = null)
                    },
                    t.prototype.unloadTech_ = function() {
                        var e = this;
                        ji.names.forEach(function(t) {
                            var n = ji[t];
                            e[n.privateName] = e[n.getterName]()
                        }),
                        this.textTracksJson_ = Ln.textTracksToJson(this.tech_),
                        this.isReady_ = !1,
                        this.tech_.dispose(),
                        this.tech_ = !1
                    },
                    t.prototype.tech = function(e) {
                        return void 0 === e && Jt.warn(Kt(ur)),
                        this.tech_
                    },
                    t.prototype.addTechControlsListeners_ = function() {
                        this.removeTechControlsListeners_(),
                        this.on(this.tech_, "mousedown", this.handleTechClick_),
                        this.on(this.tech_, "touchstart", this.handleTechTouchStart_),
                        this.on(this.tech_, "touchmove", this.handleTechTouchMove_),
                        this.on(this.tech_, "touchend", this.handleTechTouchEnd_),
                        this.on(this.tech_, "tap", this.handleTechTap_)
                    },
                    t.prototype.removeTechControlsListeners_ = function() {
                        this.off(this.tech_, "tap", this.handleTechTap_),
                        this.off(this.tech_, "touchstart", this.handleTechTouchStart_),
                        this.off(this.tech_, "touchmove", this.handleTechTouchMove_),
                        this.off(this.tech_, "touchend", this.handleTechTouchEnd_),
                        this.off(this.tech_, "mousedown", this.handleTechClick_)
                    },
                    t.prototype.handleTechReady_ = function() {
                        if (this.triggerReady(), this.cache_.volume && this.techCall_("setVolume", this.cache_.volume), this.handleTechPosterChange_(), this.handleTechDurationChange_(), (this.src() || this.currentSrc()) && this.tag && this.options_.autoplay && this.paused()) try {
                            delete this.tag.poster
                        } catch(e) {
                            Jt("deleting tag.poster throws in some browsers", e)
                        }
                    },
                    t.prototype.handleTechLoadStart_ = function() {
                        this.removeClass("vjs-ended"),
                        this.removeClass("vjs-seeking"),
                        this.error(null),
                        this.paused() ? (this.hasStarted(!1), this.trigger("loadstart")) : (this.trigger("loadstart"), this.trigger("firstplay"))
                    },
                    t.prototype.hasStarted = function(e) {
                        if (void 0 === e) return this.hasStarted_;
                        e !== this.hasStarted_ && (this.hasStarted_ = e, this.hasStarted_ ? (this.addClass("vjs-has-started"), this.trigger("firstplay")) : this.removeClass("vjs-has-started"))
                    },
                    t.prototype.handleTechPlay_ = function() {
                        this.removeClass("vjs-ended"),
                        this.removeClass("vjs-paused"),
                        this.addClass("vjs-playing"),
                        this.hasStarted(!0),
                        this.trigger("play")
                    },
                    t.prototype.handleTechWaiting_ = function() {
                        var e = this;
                        this.addClass("vjs-waiting"),
                        this.trigger("waiting"),
                        this.one("timeupdate",
                        function() {
                            return e.removeClass("vjs-waiting")
                        })
                    },
                    t.prototype.handleTechCanPlay_ = function() {
                        this.removeClass("vjs-waiting"),
                        this.trigger("canplay")
                    },
                    t.prototype.handleTechCanPlayThrough_ = function() {
                        this.removeClass("vjs-waiting"),
                        this.trigger("canplaythrough")
                    },
                    t.prototype.handleTechPlaying_ = function() {
                        this.removeClass("vjs-waiting"),
                        this.trigger("playing")
                    },
                    t.prototype.handleTechSeeking_ = function() {
                        this.addClass("vjs-seeking"),
                        this.trigger("seeking")
                    },
                    t.prototype.handleTechSeeked_ = function() {
                        this.removeClass("vjs-seeking"),
                        this.trigger("seeked")
                    },
                    t.prototype.handleTechFirstPlay_ = function() {
                        this.options_.starttime && (Jt.warn("Passing the `starttime` option to the player will be deprecated in 6.0"), this.currentTime(this.options_.starttime)),
                        this.addClass("vjs-has-started"),
                        this.trigger("firstplay")
                    },
                    t.prototype.handleTechPause_ = function() {
                        this.removeClass("vjs-playing"),
                        this.addClass("vjs-paused"),
                        this.trigger("pause")
                    },
                    t.prototype.handleTechEnded_ = function() {
                        this.addClass("vjs-ended"),
                        this.options_.loop ? (this.currentTime(0), this.play()) : this.paused() || this.pause(),
                        this.trigger("ended")
                    },
                    t.prototype.handleTechDurationChange_ = function() {
                        this.duration(this.techGet_("duration"))
                    },
                    t.prototype.handleTechClick_ = function(e) {
                        N(e) && this.controls_ && (this.paused() ? this.play() : this.pause())
                    },
                    t.prototype.handleTechTap_ = function() {
                        this.userActive(!this.userActive())
                    },
                    t.prototype.handleTechTouchStart_ = function() {
                        this.userWasActive = this.userActive()
                    },
                    t.prototype.handleTechTouchMove_ = function() {
                        this.userWasActive && this.reportUserActivity()
                    },
                    t.prototype.handleTechTouchEnd_ = function(e) {
                        e.preventDefault()
                    },
                    t.prototype.handleFullscreenChange_ = function() {
                        this.isFullscreen() ? this.addClass("vjs-fullscreen") : this.removeClass("vjs-fullscreen")
                    },
                    t.prototype.handleStageClick_ = function() {
                        this.reportUserActivity()
                    },
                    t.prototype.handleTechFullscreenChange_ = function(e, t) {
                        t && this.isFullscreen(t.isFullscreen),
                        this.trigger("fullscreenchange")
                    },
                    t.prototype.handleTechError_ = function() {
                        var e = this.tech_.error();
                        this.error(e)
                    },
                    t.prototype.handleTechTextData_ = function() {
                        var e = null;
                        arguments.length > 1 && (e = arguments[1]),
                        this.trigger("textdata", e)
                    },
                    t.prototype.getCache = function() {
                        return this.cache_
                    },
                    t.prototype.techCall_ = function(e, t) {
                        this.ready(function() {
                            if (e in Ui) return Je(this.middleware_, this.tech_, e, t);
                            try {
                                this.tech_ && this.tech_[e](t)
                            } catch(e) {
                                throw Jt(e),
                                e
                            }
                        },
                        !0)
                    },
                    t.prototype.techGet_ = function(e) {
                        if (this.tech_ && this.tech_.isReady_) {
                            if (e in Wi) return Ze(this.middleware_, this.tech_, e);
                            try {
                                return this.tech_[e]()
                            } catch(t) {
                                if (void 0 === this.tech_[e]) throw Jt("Video.js: " + e + " method not defined for " + this.techName_ + " playback technology.", t),
                                t;
                                if ("TypeError" === t.name) throw Jt("Video.js: " + e + " unavailable on " + this.techName_ + " playback technology element.", t),
                                this.tech_.isReady_ = !1,
                                t;
                                throw Jt(t),
                                t
                            }
                        }
                    },
                    t.prototype.play = function() {
                        var e = this;
                        if (this.playOnLoadstart_ && this.off("loadstart", this.playOnLoadstart_), this.isReady_) {
                            if (!this.changingSrc_ && (this.src() || this.currentSrc())) return this.techGet_("play");
                            this.playOnLoadstart_ = function() {
                                e.playOnLoadstart_ = null,
                                ce(e.play())
                            },
                            this.one("loadstart", this.playOnLoadstart_)
                        } else {
                            if (this.playWaitingForReady_) return;
                            this.playWaitingForReady_ = !0,
                            this.ready(function() {
                                e.playWaitingForReady_ = !1,
                                ce(e.play())
                            })
                        }
                    },
                    t.prototype.pause = function() {
                        this.techCall_("pause")
                    },
                    t.prototype.paused = function() {
                        return ! 1 !== this.techGet_("paused")
                    },
                    t.prototype.played = function() {
                        return this.techGet_("played") || se(0, 0)
                    },
                    t.prototype.scrubbing = function(e) {
                        if (void 0 === e) return this.scrubbing_;
                        this.scrubbing_ = !!e,
                        e ? this.addClass("vjs-scrubbing") : this.removeClass("vjs-scrubbing")
                    },
                    t.prototype.currentTime = function(e) {
                        return void 0 !== e ? (e < 0 && (e = 0), void this.techCall_("setCurrentTime", e)) : (this.cache_.currentTime = this.techGet_("currentTime") || 0, this.cache_.currentTime)
                    },
                    t.prototype.duration = function(e) {
                        if (void 0 === e) return void 0 !== this.cache_.duration ? this.cache_.duration: NaN;
                        e = parseFloat(e),
                        e < 0 && (e = 1 / 0),
                        e !== this.cache_.duration && (this.cache_.duration = e, e === 1 / 0 ? this.addClass("vjs-live") : this.removeClass("vjs-live"), this.trigger("durationchange"))
                    },
                    t.prototype.remainingTime = function() {
                        return this.duration() - this.currentTime()
                    },
                    t.prototype.remainingTimeDisplay = function() {
                        return Math.floor(this.duration()) - Math.floor(this.currentTime())
                    },
                    t.prototype.buffered = function() {
                        var e = this.techGet_("buffered");
                        return e && e.length || (e = se(0, 0)),
                        e
                    },
                    t.prototype.bufferedPercent = function() {
                        return ae(this.buffered(), this.duration())
                    },
                    t.prototype.bufferedEnd = function() {
                        var e = this.buffered(),
                        t = this.duration(),
                        n = e.end(e.length - 1);
                        return n > t && (n = t),
                        n
                    },
                    t.prototype.volume = function(e) {
                        var t = void 0;
                        return void 0 !== e ? (t = Math.max(0, Math.min(1, parseFloat(e))), this.cache_.volume = t, this.techCall_("setVolume", t), void(t > 0 && this.lastVolume_(t))) : (t = parseFloat(this.techGet_("volume")), isNaN(t) ? 1 : t)
                    },
                    t.prototype.muted = function(e) {
                        return void 0 !== e ? void this.techCall_("setMuted", e) : this.techGet_("muted") || !1
                    },
                    t.prototype.defaultMuted = function(e) {
                        return void 0 !== e ? this.techCall_("setDefaultMuted", e) : this.techGet_("defaultMuted") || !1
                    },
                    t.prototype.lastVolume_ = function(e) {
                        return void 0 !== e && 0 !== e ? void(this.cache_.lastVolume = e) : this.cache_.lastVolume
                    },
                    t.prototype.supportsFullScreen = function() {
                        return this.techGet_("supportsFullScreen") || !1
                    },
                    t.prototype.isFullscreen = function(e) {
                        return void 0 !== e ? void(this.isFullscreen_ = !!e) : !!this.isFullscreen_
                    },
                    t.prototype.requestFullscreen = function() {
                        var e = jn;
                        this.isFullscreen(!0),
                        e.requestFullscreen ? (G(ut, e.fullscreenchange, hn(this,
                        function t(n) {
                            this.isFullscreen(ut[e.fullscreenElement]),
                            !1 === this.isFullscreen() && X(ut, e.fullscreenchange, t),
                            this.trigger("fullscreenchange")
                        })), this.el_[e.requestFullscreen]()) : this.tech_.supportsFullScreen() ? this.techCall_("enterFullScreen") : (this.enterFullWindow(), this.trigger("fullscreenchange"))
                    },
                    t.prototype.exitFullscreen = function() {
                        var e = jn;
                        this.isFullscreen(!1),
                        e.requestFullscreen ? ut[e.exitFullscreen]() : this.tech_.supportsFullScreen() ? this.techCall_("exitFullScreen") : (this.exitFullWindow(), this.trigger("fullscreenchange"))
                    },
                    t.prototype.enterFullWindow = function() {
                        this.isFullWindow = !0,
                        this.docOrigOverflow = ut.documentElement.style.overflow,
                        G(ut, "keydown", hn(this, this.fullWindowOnEscKey)),
                        ut.documentElement.style.overflow = "hidden",
                        y(ut.body, "vjs-full-window"),
                        this.trigger("enterFullWindow")
                    },
                    t.prototype.fullWindowOnEscKey = function(e) {
                        27 === e.keyCode && (!0 === this.isFullscreen() ? this.exitFullscreen() : this.exitFullWindow())
                    },
                    t.prototype.exitFullWindow = function() {
                        this.isFullWindow = !1,
                        X(ut, "keydown", this.fullWindowOnEscKey),
                        ut.documentElement.style.overflow = this.docOrigOverflow,
                        b(ut.body, "vjs-full-window"),
                        this.trigger("exitFullWindow")
                    },
                    t.prototype.canPlayType = function(e) {
                        for (var t = void 0,
                        n = 0,
                        i = this.options_.techOrder; n < i.length; n++) {
                            var o = i[n],
                            r = Yi.getTech(o);
                            if (r || (r = Tn.getComponent(o)), r) {
                                if (r.isSupported() && (t = r.canPlayType(e))) return t
                            } else Jt.error('The "' + o + '" tech is undefined. Skipped browser support check for that tech.')
                        }
                        return ""
                    },
                    t.prototype.selectSource = function(e) {
                        var t = this,
                        n = this.options_.techOrder.map(function(e) {
                            return [e, Yi.getTech(e)]
                        }).filter(function(e) {
                            var t = e[0],
                            n = e[1];
                            return n ? n.isSupported() : (Jt.error('The "' + t + '" tech is undefined. Skipped browser support check for that tech.'), !1)
                        }),
                        i = function(e, t, n) {
                            var i = void 0;
                            return e.some(function(e) {
                                return t.some(function(t) {
                                    if (i = n(e, t)) return ! 0
                                })
                            }),
                            i
                        },
                        o = function(e, n) {
                            var i = e[0];
                            if (e[1].canPlaySource(n, t.options_[i.toLowerCase()])) return {
                                source: n,
                                tech: i
                            }
                        };
                        return (this.options_.sourceOrder ? i(e, n,
                        function(e) {
                            return function(t, n) {
                                return e(n, t)
                            }
                        } (o)) : i(n, e, o)) || !1
                    },
                    t.prototype.src = function(e) {
                        var t = this;
                        if (void 0 === e) return this.cache_.src || "";
                        var n = Vi(e);
                        if (!n.length) return void this.setTimeout(function() {
                            this.error({
                                code: 4,
                                message: this.localize(this.options_.notSupportedMessage)
                            })
                        },
                        0);
                        this.cache_.sources = n,
                        this.changingSrc_ = !0,
                        this.cache_.source = n[0],
                        Ge(this, n[0],
                        function(e, i) {
                            if (t.middleware_ = i, t.src_(e)) return n.length > 1 ? t.src(n.slice(1)) : (t.setTimeout(function() {
                                this.error({
                                    code: 4,
                                    message: this.localize(this.options_.notSupportedMessage)
                                })
                            },
                            0), void t.triggerReady());
                            t.changingSrc_ = !1,
                            t.cache_.src = e.src,
                            Xe(i, t.tech_)
                        })
                    },
                    t.prototype.src_ = function(e) {
                        var t = this.selectSource([e]);
                        return ! t || (te(t.tech, this.techName_) ? (this.ready(function() {
                            this.tech_.constructor.prototype.hasOwnProperty("setSource") ? this.techCall_("setSource", e) : this.techCall_("src", e.src),
                            "auto" === this.options_.preload && this.load()
                        },
                        !0), !1) : (this.changingSrc_ = !0, this.loadTech_(t.tech, t.source), !1))
                    },
                    t.prototype.load = function() {
                        this.techCall_("load")
                    },
                    t.prototype.reset = function() {
                        this.loadTech_(this.options_.techOrder[0], null),
                        this.techCall_("reset")
                    },
                    t.prototype.currentSources = function() {
                        var e = this.currentSource(),
                        t = [];
                        return 0 !== Object.keys(e).length && t.push(e),
                        this.cache_.sources || t
                    },
                    t.prototype.currentSource = function() {
                        return this.cache_.source || {}
                    },
                    t.prototype.currentSrc = function() {
                        return this.currentSource() && this.currentSource().src || ""
                    },
                    t.prototype.currentType = function() {
                        return this.currentSource() && this.currentSource().type || ""
                    },
                    t.prototype.preload = function(e) {
                        return void 0 !== e ? (this.techCall_("setPreload", e), void(this.options_.preload = e)) : this.techGet_("preload")
                    },
                    t.prototype.autoplay = function(e) {
                        return void 0 !== e ? (this.techCall_("setAutoplay", e), this.options_.autoplay = e, void this.ready(this.forceAutoplayInChrome_)) : this.techGet_("autoplay", e)
                    },
                    t.prototype.forceAutoplayInChrome_ = function() {
                        this.paused() && (this.autoplay() || this.options_.autoplay) && St && !wt && this.play()
                    },
                    t.prototype.playsinline = function(e) {
                        return void 0 !== e ? (this.techCall_("setPlaysinline", e), this.options_.playsinline = e, this) : this.techGet_("playsinline")
                    },
                    t.prototype.loop = function(e) {
                        return void 0 !== e ? (this.techCall_("setLoop", e), void(this.options_.loop = e)) : this.techGet_("loop")
                    },
                    t.prototype.poster = function(e) {
                        if (void 0 === e) return this.poster_;
                        e || (e = ""),
                        this.poster_ = e,
                        this.techCall_("setPoster", e),
                        this.trigger("posterchange")
                    },
                    t.prototype.handleTechPosterChange_ = function() { ! this.poster_ && this.tech_ && this.tech_.poster && (this.poster_ = this.tech_.poster() || "", this.trigger("posterchange"))
                    },
                    t.prototype.controls = function(e) {
                        if (void 0 === e) return !! this.controls_;
                        e = !!e,
                        this.controls_ !== e && (this.controls_ = e, this.usingNativeControls() && this.techCall_("setControls", e), this.controls_ ? (this.removeClass("vjs-controls-disabled"), this.addClass("vjs-controls-enabled"), this.trigger("controlsenabled"), this.usingNativeControls() || this.addTechControlsListeners_()) : (this.removeClass("vjs-controls-enabled"), this.addClass("vjs-controls-disabled"), this.trigger("controlsdisabled"), this.usingNativeControls() || this.removeTechControlsListeners_()))
                    },
                    t.prototype.usingNativeControls = function(e) {
                        if (void 0 === e) return !! this.usingNativeControls_;
                        e = !!e,
                        this.usingNativeControls_ !== e && (this.usingNativeControls_ = e, this.usingNativeControls_ ? (this.addClass("vjs-using-native-controls"), this.trigger("usingnativecontrols")) : (this.removeClass("vjs-using-native-controls"), this.trigger("usingcustomcontrols")))
                    },
                    t.prototype.error = function(e) {
                        return void 0 === e ? this.error_ || null: null === e ? (this.error_ = e, this.removeClass("vjs-error"), void(this.errorDisplay && this.errorDisplay.close())) : (this.error_ = new Ae(e), this.addClass("vjs-error"), Jt.error("(CODE:" + this.error_.code + " " + Ae.errorTypes[this.error_.code] + ")", this.error_.message, this.error_), void this.trigger("error"))
                    },
                    t.prototype.reportUserActivity = function(e) {
                        this.userActivity_ = !0
                    },
                    t.prototype.userActive = function(e) {
                        if (void 0 === e) return this.userActive_;
                        if ((e = !!e) !== this.userActive_) {
                            if (this.userActive_ = e, this.userActive_) return this.userActivity_ = !0,
                            this.removeClass("vjs-user-inactive"),
                            this.addClass("vjs-user-active"),
                            void this.trigger("useractive");
                            this.tech_ && this.tech_.one("mousemove",
                            function(e) {
                                e.stopPropagation(),
                                e.preventDefault()
                            }),
                            this.userActivity_ = !1,
                            this.removeClass("vjs-user-active"),
                            this.addClass("vjs-user-inactive"),
                            this.trigger("userinactive")
                        }
                    },
                    t.prototype.listenForUserActivity_ = function() {
                        var e = void 0,
                        t = void 0,
                        n = void 0,
                        i = hn(this, this.reportUserActivity),
                        o = function(e) {
                            e.screenX === t && e.screenY === n || (t = e.screenX, n = e.screenY, i())
                        },
                        r = function() {
                            i(),
                            this.clearInterval(e),
                            e = this.setInterval(i, 250)
                        },
                        s = function(t) {
                            i(),
                            this.clearInterval(e)
                        };
                        this.on("mousedown", r),
                        this.on("mousemove", o),
                        this.on("mouseup", s),
                        this.on("keydown", i),
                        this.on("keyup", i);
                        var a = void 0;
                        this.setInterval(function() {
                            if (this.userActivity_) {
                                this.userActivity_ = !1,
                                this.userActive(!0),
                                this.clearTimeout(a);
                                var e = this.options_.inactivityTimeout;
                                e <= 0 || (a = this.setTimeout(function() {
                                    this.userActivity_ || this.userActive(!1)
                                },
                                e))
                            }
                        },
                        250)
                    },
                    t.prototype.playbackRate = function(e) {
                        return void 0 !== e ? void this.techCall_("setPlaybackRate", e) : this.tech_ && this.tech_.featuresPlaybackRate ? this.techGet_("playbackRate") : 1
                    },
                    t.prototype.defaultPlaybackRate = function(e) {
                        return void 0 !== e ? this.techCall_("setDefaultPlaybackRate", e) : this.tech_ && this.tech_.featuresPlaybackRate ? this.techGet_("defaultPlaybackRate") : 1
                    },
                    t.prototype.isAudio = function(e) {
                        return void 0 !== e ? void(this.isAudio_ = !!e) : !!this.isAudio_
                    },
                    t.prototype.addTextTrack = function(e, t, n) {
                        if (this.tech_) return this.tech_.addTextTrack(e, t, n)
                    },
                    t.prototype.addRemoteTextTrack = function(e, t) {
                        if (this.tech_) return this.tech_.addRemoteTextTrack(e, t)
                    },
                    t.prototype.removeRemoteTextTrack = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        t = e.track,
                        n = void 0 === t ? arguments[0] : t;
                        if (this.tech_) return this.tech_.removeRemoteTextTrack(n)
                    },
                    t.prototype.getVideoPlaybackQuality = function() {
                        return this.techGet_("getVideoPlaybackQuality")
                    },
                    t.prototype.videoWidth = function() {
                        return this.tech_ && this.tech_.videoWidth && this.tech_.videoWidth() || 0
                    },
                    t.prototype.videoHeight = function() {
                        return this.tech_ && this.tech_.videoHeight && this.tech_.videoHeight() || 0
                    },
                    t.prototype.language = function(e) {
                        if (void 0 === e) return this.language_;
                        this.language_ = String(e).toLowerCase()
                    },
                    t.prototype.languages = function() {
                        return ne(t.prototype.options_.languages, this.languages_)
                    },
                    t.prototype.toJSON = function() {
                        var e = ne(this.options_),
                        t = e.tracks;
                        e.tracks = [];
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i = ne(i),
                            i.player = void 0,
                            e.tracks[n] = i
                        }
                        return e
                    },
                    t.prototype.createModal = function(e, t) {
                        var n = this;
                        t = t || {},
                        t.content = e || "";
                        var i = new Hn(this, t);
                        return this.addChild(i),
                        i.on("dispose",
                        function() {
                            n.removeChild(i)
                        }),
                        i.open(),
                        i
                    },
                    t.getTagSettings = function(e) {
                        var t = {
                            sources: [],
                            tracks: []
                        },
                        n = E(e),
                        i = n["data-setup"];
                        if (v(e, "vjs-fluid") && (n.fluid = !0), null !== i) {
                            var r = Rn(i || "{}"),
                            s = r[0],
                            a = r[1];
                            s && Jt.error(s),
                            o(n, a)
                        }
                        if (o(t, n), e.hasChildNodes()) for (var A = e.childNodes,
                        g = 0,
                        l = A.length; g < l; g++) {
                            var c = A[g],
                            C = c.nodeName.toLowerCase();
                            "source" === C ? t.sources.push(E(c)) : "track" === C && t.tracks.push(E(c))
                        }
                        return t
                    },
                    t.prototype.flexNotSupported_ = function() {
                        var e = ut.createElement("i");
                        return ! ("flexBasis" in e.style || "webkitFlexBasis" in e.style || "mozFlexBasis" in e.style || "msFlexBasis" in e.style || "msFlexOrder" in e.style)
                    },
                    t
                } (Tn);
                ji.names.forEach(function(e) {
                    var t = ji[e];
                    pr.prototype[t.getterName] = function() {
                        return this.tech_ ? this.tech_[t.getterName]() : (this[t.privateName] = this[t.privateName] || new t.ListClass, this[t.privateName])
                    }
                }),
                pr.players = {};
                var fr = lt.navigator;
                pr.prototype.options_ = {
                    techOrder: Yi.defaultTechOrder_,
                    html5: {},
                    flash: {},
                    inactivityTimeout: 2e3,
                    playbackRates: [],
                    children: ["mediaLoader", "posterImage", "textTrackDisplay", "loadingSpinner", "bigPlayButton", "controlBar", "errorDisplay", "textTrackSettings"],
                    language: fr && (fr.languages && fr.languages[0] || fr.userLanguage || fr.language) || "en",
                    languages: {},
                    notSupportedMessage: "No compatible source was found for this media."
                },
                ["ended", "seeking", "seekable", "networkState", "readyState"].forEach(function(e) {
                    pr.prototype[e] = function() {
                        return this.techGet_(e)
                    }
                }),
                dr.forEach(function(e) {
                    pr.prototype["handleTech" + ee(e) + "_"] = function() {
                        return this.trigger(e)
                    }
                }),
                Tn.registerComponent("Player", pr);
                var mr = "plugin",
                vr = "activePlugins_",
                yr = {},
                br = function(e) {
                    return yr.hasOwnProperty(e)
                },
                _r = function(e) {
                    return br(e) ? yr[e] : void 0
                },
                wr = function(e, t) {
                    e[vr] = e[vr] || {},
                    e[vr][t] = !0
                },
                Er = function(e, t, n) {
                    var i = (n ? "before": "") + "pluginsetup";
                    e.trigger(i, t),
                    e.trigger(i + ":" + t.name, t)
                },
                Tr = function(e, t) {
                    var n = function() {
                        Er(this, {
                            name: e,
                            plugin: t,
                            instance: null
                        },
                        !0);
                        var n = t.apply(this, arguments);
                        return wr(this, e),
                        Er(this, {
                            name: e,
                            plugin: t,
                            instance: n
                        }),
                        n
                    };
                    return Object.keys(t).forEach(function(e) {
                        n[e] = t[e]
                    }),
                    n
                },
                jr = function(e, t) {
                    return t.prototype.name = e,
                    function() {
                        Er(this, {
                            name: e,
                            plugin: t,
                            instance: null
                        },
                        !0);
                        for (var n = arguments.length,
                        i = Array(n), o = 0; o < n; o++) i[o] = arguments[o];
                        var r = new(Function.prototype.bind.apply(t, [null].concat([this].concat(i))));
                        return this[e] = function() {
                            return r
                        },
                        Er(this, r.getEventHash()),
                        r
                    }
                },
                xr = function() {
                    function e(t) {
                        if (Ht(this, e), this.constructor === e) throw new Error("Plugin must be sub-classed; not directly instantiated.");
                        this.player = t,
                        q(this),
                        delete this.trigger,
                        $(this, this.constructor.defaultState),
                        wr(t, this.name),
                        this.dispose = hn(this, this.dispose),
                        t.on("dispose", this.dispose)
                    }
                    return e.prototype.version = function() {
                        return this.constructor.VERSION
                    },
                    e.prototype.getEventHash = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        return e.name = this.name,
                        e.plugin = this.constructor,
                        e.instance = this,
                        e
                    },
                    e.prototype.trigger = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        return Z(this.eventBusEl_, e, this.getEventHash(t))
                    },
                    e.prototype.handleStateChanged = function(e) {},
                    e.prototype.dispose = function() {
                        var e = this.name,
                        t = this.player;
                        this.trigger("dispose"),
                        this.off(),
                        t.off("dispose", this.dispose),
                        t[vr][e] = !1,
                        this.player = this.state = null,
                        t[e] = jr(e, yr[e])
                    },
                    e.isBasic = function(t) {
                        var n = "string" == typeof t ? _r(t) : t;
                        return "function" == typeof n && !e.prototype.isPrototypeOf(n.prototype)
                    },
                    e.registerPlugin = function(t, n) {
                        if ("string" != typeof t) throw new Error('Illegal plugin name, "' + t + '", must be a string, was ' + (void 0 === t ? "undefined": Nt(t)) + ".");
                        if (br(t)) Jt.warn('A plugin named "' + t + '" already exists. You may want to avoid re-registering plugins!');
                        else if (pr.prototype.hasOwnProperty(t)) throw new Error('Illegal plugin name, "' + t + '", cannot share a name with an existing player method!');
                        if ("function" != typeof n) throw new Error('Illegal plugin for "' + t + '", must be a function, was ' + (void 0 === n ? "undefined": Nt(n)) + ".");
                        return yr[t] = n,
                        t !== mr && (e.isBasic(n) ? pr.prototype[t] = Tr(t, n) : pr.prototype[t] = jr(t, n)),
                        n
                    },
                    e.deregisterPlugin = function(e) {
                        if (e === mr) throw new Error("Cannot de-register base plugin.");
                        br(e) && (delete yr[e], delete pr.prototype[e])
                    },
                    e.getPlugins = function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : Object.keys(yr),
                        t = void 0;
                        return e.forEach(function(e) {
                            var n = _r(e);
                            n && (t = t || {},
                            t[e] = n)
                        }),
                        t
                    },
                    e.getPluginVersion = function(e) {
                        var t = _r(e);
                        return t && t.VERSION || ""
                    },
                    e
                } ();
                xr.getPlugin = _r,
                xr.BASE_PLUGIN_NAME = mr,
                xr.registerPlugin(mr, xr),
                pr.prototype.usingPlugin = function(e) {
                    return !! this[vr] && !0 === this[vr][e]
                },
                pr.prototype.hasPlugin = function(e) {
                    return !! br(e)
                };
                var kr = function(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + (void 0 === t ? "undefined": Nt(t)));
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }),
                    t && (e.super_ = t)
                },
                Sr = function(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    n = function() {
                        e.apply(this, arguments)
                    },
                    i = {};
                    "object" === (void 0 === t ? "undefined": Nt(t)) ? (t.constructor !== Object.prototype.constructor && (n = t.constructor), i = t) : "function" == typeof t && (n = t),
                    kr(n, e);
                    for (var o in i) i.hasOwnProperty(o) && (n.prototype[o] = i[o]);
                    return n
                };
                if ("undefined" == typeof HTMLVideoElement && I() && (ut.createElement("video"), ut.createElement("audio"), ut.createElement("track"), ut.createElement("video-js")), rt.hooks_ = {},
                rt.hooks = function(e, t) {
                    return rt.hooks_[e] = rt.hooks_[e] || [],
                    t && (rt.hooks_[e] = rt.hooks_[e].concat(t)),
                    rt.hooks_[e]
                },
                rt.hook = function(e, t) {
                    rt.hooks(e, t)
                },
                rt.hookOnce = function(e, t) {
                    rt.hooks(e, [].concat(t).map(function(t) {
                        return function n() {
                            rt.removeHook(e, n),
                            t.apply(void 0, arguments)
                        }
                    }))
                },
                rt.removeHook = function(e, t) {
                    var n = rt.hooks(e).indexOf(t);
                    return ! (n <= -1) && (rt.hooks_[e] = rt.hooks_[e].slice(), rt.hooks_[e].splice(n, 1), !0)
                },
                !0 !== lt.VIDEOJS_NO_DYNAMIC_STYLE && I()) {
                    var Dr = $t(".vjs-styles-defaults");
                    if (!Dr) {
                        Dr = Cn("vjs-styles-defaults");
                        var Br = $t("head");
                        Br && Br.insertBefore(Dr, Br.firstChild),
                        In(Dr, "\n      .video-js {\n        width: 300px;\n        height: 150px;\n      }\n\n      .vjs-fluid {\n        padding-top: 56.25%\n      }\n    ")
                    }
                }
                return K(1, rt),
                rt.VERSION = at,
                rt.options = pr.prototype.options_,
                rt.getPlayers = function() {
                    return pr.players
                },
                rt.players = pr.players,
                rt.getComponent = Tn.getComponent,
                rt.registerComponent = function(e, t) {
                    Yi.isTech(t) && Jt.warn("The " + e + " tech was registered as a component. It should instead be registered using videojs.registerTech(name, tech)"),
                    Tn.registerComponent.call(Tn, e, t)
                },
                rt.getTech = Yi.getTech,
                rt.registerTech = Yi.registerTech,
                rt.use = Ve,
                rt.browser = Lt,
                rt.TOUCH_ENABLED = Pt,
                rt.extend = Sr,
                rt.mergeOptions = ne,
                rt.bind = hn,
                rt.registerPlugin = xr.registerPlugin,
                rt.plugin = function(e, t) {
                    return Jt.warn("videojs.plugin() is deprecated; use videojs.registerPlugin() instead"),
                    xr.registerPlugin(e, t)
                },
                rt.getPlugins = xr.getPlugins,
                rt.getPlugin = xr.getPlugin,
                rt.getPluginVersion = xr.getPluginVersion,
                rt.addLanguage = function(e, t) {
                    var n;
                    return e = ("" + e).toLowerCase(),
                    rt.options.languages = ne(rt.options.languages, (n = {},
                    n[e] = t, n)),
                    rt.options.languages[e]
                },
                rt.log = Jt,
                rt.createTimeRange = rt.createTimeRanges = se,
                rt.formatTime = tt,
                rt.parseUrl = ti,
                rt.isCrossOrigin = oi,
                rt.EventTarget = dn,
                rt.on = G,
                rt.one = J,
                rt.off = X,
                rt.trigger = Z,
                rt.xhr = di,
                rt.TextTrack = mi,
                rt.AudioTrack = vi,
                rt.VideoTrack = yi,
                ["isEl", "isTextNode", "createEl", "hasClass", "addClass", "removeClass", "toggleClass", "setAttributes", "getAttributes", "emptyEl", "appendContent", "insertContent"].forEach(function(e) {
                    rt[e] = function() {
                        return Jt.warn("videojs." + e + "() is deprecated; use videojs.dom." + e + "() instead"),
                        tn[e].apply(null, arguments)
                    }
                }),
                rt.computedStyle = g,
                rt.dom = tn,
                rt.url = ri,
                rt
            })
        }).call(t, n(118))
    },
    45 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        var o = n(12),
        r = n.n(o),
        s = n(2),
        a = (n.n(s),
        function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } ()),
        A = function() {
            function e(t, n) {
                i(this, e),
                this.content = t,
                this.cookieChannel = n
            }
            return a(e, [{
                key: "transformOjectValueToBoolean",
                value: function(e) {
                    e = JSON.parse(JSON.stringify(e));
                    var t = e && e.handle;
                    if (t) for (var n in t) e.handle[n] = !!t[n];
                    return e
                }
            },
            {
                key: "setdataToLocalStorage",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "shinianjieshu",
                    t = arguments[1];
                    try {
                        localStorage.setItem(e + "PageConfig", JSON.stringify(t)),
                        localStorage.setItem(e + "PageTime", JSON.stringify(Date.now()))
                    } catch(e) {}
                }
            },
            {
                key: "getDataFromLocalStorage",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "shinianjieshu",
                    t = 0,
                    n = "";
                    try {
                        t = localStorage.getItem(e + "PageTime") || 0,
                        n = localStorage.getItem(e + "PageConfig")
                    } catch(e) {}
                    return {
                        localTime: t,
                        localConfigData: n
                    }
                }
            },
            {
                key: "fetchDataFromApi",
                value: function(e) {
                    var t = this,
                    n = this.content;
                    r.a.ajax({
                        url: e.url,
                        data: e.data,
                        dataType: "json",
                        type: "get",
                        success: function(i) {
                            var o = t.transformOjectValueToBoolean(i);
                            n.setState({
                                pageConfig: o
                            }),
                            localStorage && t.setdataToLocalStorage(e.mark, o)
                        },
                        error: function(e) {}
                    })
                }
            },
            {
                key: "getConfigData",
                value: function(e, t) {
                    var n = this.content,
                    i = this.cookieChannel,
                    o = e.data && e.data.channel,
                    r = this.getDataFromLocalStorage(e.mark),
                    s = Date.now(),
                    a = r.localConfigData,
                    A = r.localTime;
                    o === i && localStorage ? !a || s - A > 6e5 ? this.fetchDataFromApi(e) : n.setState({
                        pageConfig: JSON.parse(a)
                    }) : this.fetchDataFromApi(e)
                }
            }], [{
                key: "getDefaultData",
                value: function() {
                    return {
                        handle: {
                            header: !1,
                            footer: !1,
                            video: !1,
                            index_comment: !1,
                            index_hot: !1,
                            index_query_order: !1,
                            index_2018kaiyun: !0,
                            index_yingcaier: !0,
                            index_advance: !0,
                            result_shop_recommend: !1,
                            email: !1,
                            show_email: !1,
                            show_phone: !1,
                            result_content: !1,
                            result_ad: !1,
                            default_data: !0,
                            result_bottom_menu: !0,
                            result_icon_url: !0,
                            index_detain: !1,
                            result_zw: !1,
                            index_xuanfu_icon: !1,
                            pay_kefu_button: !0,
                            index_qrcode: !0
                        },
                    }
                }
            }]),
            e
        } (),
        g = A;
        t.a = g; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(A, "PageConfig", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/page_config.js"), __REACT_HOT_LOADER__.register(g, "default", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/common/service/page_config.js"))
        } ()
    },
    46 : function(e, t, n) {
        "use strict";
        function i() {
            var e = this,
            t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : ["mLinghit", "zxcsLinghit", "zxcsLinghitBaiduMarketing"],
            n = t;
            setTimeout(function() {
                n.forEach(function(t) {
                    o[t].apply(e)
                })
            },
            0)
        }
        t.a = i;
        var o = {
            mLinghit: function() { !
                function() {
                    var e = document.createElement("script");
                    e.src = "//hm.baidu.com/hm.js?fa529648114b1fc12ce4c40df1e9d75e";
                    var t = document.getElementsByTagName("script")[0];
                    t.parentNode.insertBefore(e, t)
                } ()
            },
            zxcsLinghit: function() { !
                function() {
                    var e = document.createElement("script");
                    e.src = "//hm.baidu.com/hm.js?da9f609f31e08775a3c08224838230b5";
                    var t = document.getElementsByTagName("script")[0];
                    t.parentNode.insertBefore(e, t)
                } ()
            },
            zxcsLinghitBaiduMarketing: function() { !
                function() {
                    var e = document.createElement("script");
                    e.src = "";
                    var t = document.getElementsByTagName("script")[0];
                    t.parentNode.insertBefore(e, t)
                } ()
            }
        }; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && ())
        } ()
    },
    5 : function(e, t, n) {
        "use strict";
        function i(e) {
            var t = location.search,
            n = {};
            t = decodeURIComponent(t.substring(1));
            var i = t.split("&"),
            o = i.length,
            r = void 0;
            if (o > 0) for (r = 0; r < o; r++) {
                var s = i[r].split("=");
                n[s[0]] = s[1]
            }
            return n[e]
        }
        function o(e) {
            return e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "")
        }
        function r() {
            return /iphone|ipad|ipod/i.test(navigator.userAgent)
        }
        function s() {
            return /android/i.test(navigator.userAgent)
        }
        function a(e, t) {
            return ["zh-cn", "zh-tw", "zh-hk"].some(function(t) {
                return e === t
            }) ? e: t || "zh-tw"
        }
        function A(e) {
            return ["swlx"].some(function(t) {
                return t === e
            })
        }
        function g(e, t, n, o) {
            var r = i(t);
            r && e.setItem(n, r, o, "/")
        }
        function l() {
            var e = i("lang");
            if (n.i(M.a)()) {
                var t = n.i(M.b)();
                t.flag && (e = 1 == t.lang ? "zh-tw": "zh-cn")
            }
            return e
        }
        function c(e, t) {
            var n, i = e,
            o = !0;
            return function() {
                var e = arguments,
                r = this;
                if (o && (i.apply(r, e), o = !1), n) return ! 1;
                n = setTimeout(function() {
                    clearTimeout(n),
                    n = null,
                    i.apply(r, e)
                },
                t || 500)
            }
        }
        function C(e) {
            var t = document.getElementById("wrapper");
            return {
                x: t.scrollLeft,
                y: t.scrollTop
            }
        }
        function I(e) {
            if (e = e || window, null != e.innerWidth) return {
                x: e.innerWidth,
                y: e.innerHeight
            };
            var t = e.document;
            return "CSS1Compat" == document.compatMode ? {
                x: t.documentElement.clientWidth,
                y: t.documentElement.clientHeight
            }: {
                x: t.body.clientWidth,
                y: t.body.clientHeight
            }
        }
        function h(e, t) {
            var n, i;
            e ? ("string" == typeof e && (e = document.getElementById(e)), n = e.getBoundingClientRect().left + C().x, i = e.getBoundingClientRect().top + C().y) : (n = 0, i = 0);
            var o = setInterval(function() {
                var e = C().y,
                r = C().x,
                s = e - (e - i) / 10,
                a = r - (r - n) / 10;
                Math.abs(s - e) < 1 && (s - e > 0 ? s++:s--),
                Math.abs(a - r) < 1 && (a - r > 0 ? a++:a--),
                t.scrollTop = s,
                Math.abs(C().y - i) <= 2 && (clearInterval(o), t.scrollTop = s)
            },
            10)
        }
        function u(e) {
            var t = document.body,
            n = document.body.scrollTop || document.documentElement.scrollTop;
            n && document.documentElement.scrollTop > 0 ? t = document.documentElement: !n && (document.documentElement.scrollTop = 1) && document.documentElement.scrollTop && (t = document.documentElement);
            var i, o = t.scrollTop;
            e ? ("string" == typeof e && (e = document.getElementById(e)), i = e.getBoundingClientRect().top + o) : i = 0;
            var r = setInterval(function() {
                var e = t.scrollTop,
                n = e - (e - i) / 10;
                Math.abs(n - e) < 1 && (n - e > 0 ? n++:n--),
                t.scrollTop = n,
                Math.abs(t.scrollTop - i) <= 2 && (clearInterval(r), t.scrollTop = n)
            },
            10)
        }
        function d(e, t) {
            var n = document.body.scrollTop ? document.body: document.documentElement,
            i = n.scrollTop,
            o = e - i,
            r = +new Date,
            s = function(e, t, n, i) {
                return (e /= i / 2) < 1 ? n / 2 * e * e + t: (e--, -n / 2 * (e * (e - 2) - 1) + t)
            }; !
            function a() {
                var A = +new Date,
                g = A - r;
                n.scrollTop = parseInt(s(g, i, o, t)),
                g < t ? requestAnimationFrame(a) : n.scrollTop = e
            } ()
        }
        function p(e, t, n) {
            return e + (/\?/.test(e) ? "&": "?") + t + "=" + n
        }
        function f() {
            return /linghit xindongqiming/.test(window.navigator.userAgent.toLowerCase())
        }
        function m(e) {
            var t = "?";
            for (var n in e) e.hasOwnProperty(n) && (t += n + "=" + e[n] + "&");
            return t.replace(/&$/, "")
        }
        function v() {
            return /micromessenger/i.test(window.navigator.userAgent.toLowerCase())
        }
        function y() {
            var e = i("schannel") || "";
            try {
                e ? F.a.setItem("_schannel", e, 1 / 0, "/") : F.a.removeItem("_schannel", "/")
            } catch(e) {}
        }
        function b() {
            var e = i("wltc") || "";
            try {
                e && F.a.setItem("_wltc", e, 1 / 0, "/")
            } catch(e) {}
        }
        function _() {
            var e = navigator.userAgent,
            t = /iPad|iPhone|iPod/.test(e),
            n = /OS 11/.test(e);
            return t && n
        }
        function w(e) {
            return ! (["swchannel12", "swchannel25"].indexOf(e) >= 0)
        }
        function E() {
            return "miniprogram" === window.__wxjs_environment
        }
        function T(e, t) {
            var n = localStorage.getItem("orders");
            n = n ? n + "," + e: e,
            localStorage.setItem("orders", n),
            t instanceof Array ? localStorage.setItem("d_i", JSON.stringify(t)) : localStorage.setItem("u_i", JSON.stringify(t))
        }
        function j(e) {
            var t = localStorage.getItem("orders");
            t = t ? t + "," + e: e,
            localStorage.setItem("orders", t)
        }
        function x(e, t, n) {
            var i = F.a.getItem(n + "_last_click"),
            o = F.a.getItem(n + "_last_close");
            return i = i ? parseInt(i) : null,
            o = o ? parseInt(o) : null,
            !(e - o < 864e5) && (i ? e > t && t > i && t > e - 6048e5 && (F.a.setItem(n + "_last_show", e, 1 / 0, "/"), !0) : t > e - 6048e5 && (F.a.setItem(n + "_last_show", e, 1 / 0, "/"), !0))
        }
        function k() {
            var e = {};
            try {
                if (! (e = JSON.parse(localStorage.getItem("u_i")))) return
            } catch(e) {}
            var t = e,
            n = t.user,
            i = t.gender,
            o = t.birthday,
            r = t.hour_mark,
            s = t.datePickerBirth,
            a = t.is_lunar;
            if (n) {
                var A = this.props.setIndexData;
                "function" != typeof A && (A = this.props.actions.setIndexData);
                var g = 0 == r ? parseInt(o.slice( - 2)) + 1 : 0,
                l = 0 == r ? parseInt(o.slice( - 2)) : -1;
                this.setState({
                    gender: i,
                    name: n
                }),
                A({
                    datePickerBirth: s,
                    birthTimeDataId: g,
                    birthTimeDataValue: l,
                    mode: a,
                    datePickerTimeConfirm: r,
                    datePickerBirthFormat: o
                })
            }
        }
        function S(e, t) {
            var n = JSON.parse(localStorage.getItem("d_i"));
            if (! (!n instanceof Array)) {
                var i = n[0],
                o = n[1],
                r = D(i),
                s = D(o);
                this.setState({
                    man_name: o.user,
                    woman_name: i.user
                }),
                e(L({
                    datePickerBirth: o.datePickerBirth,
                    datePickerBirthFormat: o.birthday,
                    mode: o.is_lunar,
                    datePickerTimeConfirm: o.hour_mark
                },
                s)),
                t(L({
                    datePickerBirth: i.datePickerBirth,
                    datePickerBirthFormat: i.birthday,
                    mode: i.is_lunar,
                    datePickerTimeConfirm: i.hour_mark
                },
                r))
            }
        }
        function D(e) {
            var t = e.birthday,
            n = e.hour_mark;
            return {
                birthTimeDataId: 0 == n ? parseInt(t.slice( - 2)) + 1 : 0,
                birthTimeDataValue: 0 == n ? parseInt(t.slice( - 2)) : -1
            }
        }
        function B(e) {
            return !! /bdsem-/.test(e)
        }
        function O(e) {
            if (!/^\d+$/.test(e)) return 1;
            var t = parseInt(e).toString(2);
            return t.length <= 4 ? parseInt(e) : parseInt(t.substr(t.length - 4), 2)
        }
        function R(e) {
            var t = Date.now(),
            n = document.createElement("IFRAME");
            n.src = e,
            n.style.position = "absolute",
            n.style.left = "-1000px",
            n.style.top = "-1000px",
            n.style.width = "1px",
            n.style.height = "1px",
            n.style.webkitTransition = "all 4s",
            document.body.appendChild(n),
            setTimeout(function() {
                n.addEventListener("webkitTransitionEnd",
                function() {
                    document.body.removeChild(n),
                    Date.now() - t < 3e3 && (location.href = e)
                },
                !1),
                n.style.left = "-10px"
            },
            0)
        }
        t.a = i,
        t.h = o,
        t.e = a,
        t.c = g,
        t.d = l,
        t.f = c,
        t.g = u,
        t.l = p,
        t.i = y,
        t.j = b,
        t.b = w,
        t.m = T,
        t.k = k,
        t.n = R;
        var M = n(23),
        P = n(2),
        F = n.n(P),
        L = Object.assign ||
        function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
            }
            return e
        }; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(i, "getQueryFromUrl", ))
        } ()
    },
    52 : function(e, t, n) {
        "use strict";
        function i(e) {
            return ! /^\s*$/.test(e)
        }
        function o(e) {
            return /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(e)
        }
        function r(e) {
            return /^[A-Z0-9]{20,36}$/i.test(e)
        }
        function s(e) {
            return /^[\u4e00-\u9fa5]+$/.test(e)
        }
        function a(e) {
            return /^1[0-9]{10}$/.test(e)
        }
        function A(e) {
            return /^[1-9]\d{5}$/.test(e)
        }
        function g(e, t) {
            return t = t || 10,
            new RegExp("\\d{" + t + "}").test(e)
        }
        t.a = i,
        t.c = o,
        t.d = r,
        t.e = s,
        t.b = a; !
    },
        t = e.exports = n(3)(),
        t.push([e.i, '@charset "utf-8";\n.new-header {\n  width: 100%;\n  height: 2.66667rem;\n  line-height: 2.66667rem;\n  background-color: #fff;\n  border-bottom: 1px solid #e4e4e4;\n  /*no*/\n}\n.new-header .left span, .new-header .right span {\n  display: block;\n  width: 2.34667rem;\n  height: 2.66667rem;\n}\n.new-header .icon-back {\n  background: transparent url("data:image/png;base64,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0p8zAAA6MGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMjEgNzkuMTU1NzcyLCAyMDE0LzAxLzEzLTE5OjQ0OjAwICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgICAgICAgICB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIgogICAgICAgICAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICAgICAgICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNCAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhtcDpDcmVhdGVEYXRlPjIwMTUtMTItMjVUMTU6NDM6MzkrMDg6MDA8L3htcDpDcmVhdGVEYXRlPgogICAgICAgICA8eG1wOk1ldGFkYXRhRGF0ZT4yMDE1LTEyLTI1VDE1OjQzOjM5KzA4OjAwPC94bXA6TWV0YWRhdGFEYXRlPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNS0xMi0yNVQxNTo0MzozOSswODowMDwveG1wOk1vZGlmeURhdGU+CiAgICAgICAgIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6NmM1YjEzNDEtOGY2MS0yOTRlLTllOGUtYzhjNzIzYjM1NDhlPC94bXBNTTpJbnN0YW5jZUlEPgogICAgICAgICA8eG1wTU06RG9jdW1lbnRJRD5hZG9iZTpkb2NpZDpwaG90b3Nob3A6MmZkZGQ2ZmEtYWFkYi0xMWU1LThlYmMtY2UwZWQwOGFiZTljPC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPnhtcC5kaWQ6ODI2NjAzNjgtNTJlYi03MjQ0LWFjMDYtZmRmNDE2N2FiNGUyPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpIaXN0b3J5PgogICAgICAgICAgICA8cmRmOlNlcT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+Y3JlYXRlZDwvc3RFdnQ6YWN0aW9uPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6aW5zdGFuY2VJRD54bXAuaWlkOjgyNjYwMzY4LTUyZWItNzI0NC1hYzA2LWZkZjQxNjdhYjRlMjwvc3RFdnQ6aW5zdGFuY2VJRD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OndoZW4+MjAxNS0xMi0yNVQxNTo0MzozOSswODowMDwvc3RFdnQ6d2hlbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OnNvZnR3YXJlQWdlbnQ+QWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpPC9zdEV2dDpzb2Z0d2FyZUFnZW50PgogICAgICAgICAgICAgICA8L3JkZjpsaT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+c2F2ZWQ8L3N0RXZ0OmFjdGlvbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0Omluc3RhbmNlSUQ+eG1wLmlpZDo2YzViMTM0MS04ZjYxLTI5NGUtOWU4ZS1jOGM3MjNiMzU0OGU8L3N0RXZ0Omluc3RhbmNlSUQ+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDp3aGVuPjIwMTUtMTItMjVUMTU6NDM6MzkrMDg6MDA8L3N0RXZ0OndoZW4+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDpzb2Z0d2FyZUFnZW50PkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE0IChXaW5kb3dzKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmNoYW5nZWQ+Lzwvc3RFdnQ6Y2hhbmdlZD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOlNlcT4KICAgICAgICAgPC94bXBNTTpIaXN0b3J5PgogICAgICAgICA8ZGM6Zm9ybWF0PmltYWdlL3BuZzwvZGM6Zm9ybWF0PgogICAgICAgICA8cGhvdG9zaG9wOkNvbG9yTW9kZT4zPC9waG90b3Nob3A6Q29sb3JNb2RlPgogICAgICAgICA8cGhvdG9zaG9wOklDQ1Byb2ZpbGU+c1JHQiBJRUM2MTk2Ni0yLjE8L3Bob3Rvc2hvcDpJQ0NQcm9maWxlPgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVudGF0aW9uPgogICAgICAgICA8dGlmZjpYUmVzb2x1dGlvbj43MjAwMDAvMTAwMDA8L3RpZmY6WFJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjcyMDAwMC8xMDAwMDwvdGlmZjpZUmVzb2x1dGlvbj4KICAgICAgICAgPHRpZmY6UmVzb2x1dGlvblVuaXQ+MjwvdGlmZjpSZXNvbHV0aW9uVW5pdD4KICAgICAgICAgPGV4aWY6Q29sb3JTcGFjZT4xPC9leGlmOkNvbG9yU3BhY2U+CiAgICAgICAgIDxleGlmOlBpeGVsWERpbWVuc2lvbj40NDwvZXhpZjpQaXhlbFhEaW1lbnNpb24+CiAgICAgICAgIDxleGlmOlBpeGVsWURpbWVuc2lvbj40NDwvZXhpZjpQaXhlbFlEaW1lbnNpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8P3hwYWNrZXQgZW5kPSJ3Ij8+egdaqQAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAJkklEQVR42uyZaaxd11XHf2vtc84d371vcp7t2FHjDI7jQKGJ0hZcCENDCiEfqraAKBGFSlUQUGghoAoSu6AyqRBFIkJQCUQqJEhVqVWbtgpKUEITKa1NM9R13cRpbaeN33PsN9x37z3DXosP93l4sR24HT5E8paWzpXuPmv/z/+s+Yi781paymtsXQR8EfBrHXBywX/2yJnfDoezncTaBNRWiP0mihOrkiwJ7Yj+glvcJch1LlyOMwsI8DLwTYf9Ak+Yy4Np4guWOHEAQQDp0+rMMLfxcojl6DCAd/7HmID/z+WXi+gHKuNX3G0GV5BXhEihibFVnLegvE/FB+Y84JG/BZ76/jJ8viUjcbe73PxuEVEHREASe9Sd/yHqQcRfAnGMOYJdJcIbPMpNQMON2z3K7aJ+Ly4fFKh+MIAFzHROVpNPiPsuB8TlmBj3ZZPx4yTxULES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") no-repeat center;\n  background-size: 80%;\n}\n.new-header .icon-menu {\n  background: transparent url("data:image/png;base64,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0p8zAAA6MGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMjEgNzkuMTU1NzcyLCAyMDE0LzAxLzEzLTE5OjQ0OjAwICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgICAgICAgICB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIgogICAgICAgICAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICAgICAgICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNCAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhtcDpDcmVhdGVEYXRlPjIwMTUtMTItMjVUMTU6NDM6MjIrMDg6MDA8L3htcDpDcmVhdGVEYXRlPgogICAgICAgICA8eG1wOk1ldGFkYXRhRGF0ZT4yMDE1LTEyLTI1VDE1OjQzOjIyKzA4OjAwPC94bXA6TWV0YWRhdGFEYXRlPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNS0xMi0yNVQxNTo0MzoyMiswODowMDwveG1wOk1vZGlmeURhdGU+CiAgICAgICAgIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6MGJmNTJmODctYzEwNS1lNDQ2LWE5NDktMWY2MTA5OTFlMWNmPC94bXBNTTpJbnN0YW5jZUlEPgogICAgICAgICA8eG1wTU06RG9jdW1lbnRJRD5hZG9iZTpkb2NpZDpwaG90b3Nob3A6MmNhY2Q2NjAtYWFkYi0xMWU1LThlYmMtY2UwZWQwOGFiZTljPC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPnhtcC5kaWQ6YWEzM2Q3MWQtYzdkNC02ZDRlLWE5YzItNjI0YTYzNTU5MDExPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpIaXN0b3J5PgogICAgICAgICAgICA8cmRmOlNlcT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+Y3JlYXRlZDwvc3RFdnQ6YWN0aW9uPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6aW5zdGFuY2VJRD54bXAuaWlkOmFhMzNkNzFkLWM3ZDQtNmQ0ZS1hOWMyLTYyNGE2MzU1OTAxMTwvc3RFdnQ6aW5zdGFuY2VJRD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OndoZW4+MjAxNS0xMi0yNVQxNTo0MzoyMiswODowMDwvc3RFdnQ6d2hlbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OnNvZnR3YXJlQWdlbnQ+QWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpPC9zdEV2dDpzb2Z0d2FyZUFnZW50PgogICAgICAgICAgICAgICA8L3JkZjpsaT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+c2F2ZWQ8L3N0RXZ0OmFjdGlvbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0Omluc3RhbmNlSUQ+eG1wLmlpZDowYmY1MmY4Ny1jMTA1LWU0NDYtYTk0OS0xZjYxMDk5MWUxY2Y8L3N0RXZ0Omluc3RhbmNlSUQ+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDp3aGVuPjIwMTUtMTItMjVUMTU6NDM6MjIrMDg6MDA8L3N0RXZ0OndoZW4+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDpzb2Z0d2FyZUFnZW50PkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE0IChXaW5kb3dzKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmNoYW5nZWQ+Lzwvc3RFdnQ6Y2hhbmdlZD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOlNlcT4KICAgICAgICAgPC94bXBNTTpIaXN0b3J5PgogICAgICAgICA8ZGM6Zm9ybWF0PmltYWdlL3BuZzwvZGM6Zm9ybWF0PgogICAgICAgICA8cGhvdG9zaG9wOkNvbG9yTW9kZT4zPC9waG90b3Nob3A6Q29sb3JNb2RlPgogICAgICAgICA8cGhvdG9zaG9wOklDQ1Byb2ZpbGU+c1JHQiBJRUM2MTk2Ni0yLjE8L3Bob3Rvc2hvcDpJQ0NQcm9maWxlPgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVudGF0aW9uPgogICAgICAgICA8dGlmZjpYUmVzb2x1dGlvbj43MjAwMDAvMTAwMDA8L3RpZmY6WFJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjcyMDAwMC8xMDAwMDwvdGlmZjpZUmVzb2x1dGlvbj4KICAgICAgICAgPHRpZmY6UmVzb2x1dGlvblVuaXQ+MjwvdGlmZjpSZXNvbHV0aW9uVW5pdD4KICAgICAgICAgPGV4aWY6Q29sb3JTcGFjZT4xPC9leGlmOkNvbG9yU3BhY2U+CiAgICAgICAgIDxleGlmOlBpeGVsWERpbWVuc2lvbj40NDwvZXhpZjpQaXhlbFhEaW1lbnNpb24+CiAgICAgICAgIDxleGlmOlBpeGVsWURpbWVuc2lvbj40NDwvZXhpZjpQaXhlbFlEaW1lbnNpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8P3hwYWNrZXQgZW5kPSJ3Ij8+o6939AAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAHfElEQVR42uyZa4xdVRXHf/+1zzlzH/Mq01KKLQ8pL4WYACZEDVSSxhLqB/EVQjTRL1IwihghCoiA8giCxARCDH6TRKKR+ECICZhUsQYkgLwqmKZFKB1aoDPDzL33nLP38sMd6AC24XbqB5Lu5Hy49yT3/PY6/7XWf+0rd+f9tIz32ToIfBD4/Q6c7f2W3vap3tFi28+PpyZjyHrIE94yUhmKVNs5lqUz3HUyzjHAUkCIV+W+1V1PWrN+KHWye/OiO41qsGFUwNwsNMqSI+un3v74q3xQ4H0v4YfWVXaJ3L+MWJEqQ+b9d/bms5y2ux3hzhlpLr/IYXfy8EuvdXPW8n9LOpAR3guoJ5LCN5LCdV6r7YDMUeYb3XmMaM8h3wFynOWEdKyJUzxqjWC8rooLPHGB1elayb+P6f8DHNoViJai7k6y9SQQTJJ0ezEaf0EWt5QzAa/h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") no-repeat center;\n  background-size: 80%;\n}\n.new-header .auto {\n  color: #4f4f4f;\n  margin: 0 2.75rem;\n  font-size: 0.90667rem;\n}\n.new-header .auto .color1 {\n  color: #dc8732;\n}\n.new-header .auto .icon-next {\n  margin: 0 0.42667rem 0 0.26667rem;\n  display: inline-block;\n  width: 0.48rem;\n  height: 0.48rem;\n  border-top: 2px solid #555;\n  /*no*/\n  border-right: 2px solid #555;\n  /*no*/\n  -webkit-transform: rotate(45deg);\n      -ms-transform: rotate(45deg);\n          transform: rotate(45deg);\n}\n.site-menu {\n  position: fixed;\n  top: 2.75rem;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  z-index: 10000;\n  display: none;\n  margin-top: 1px;\n  /*no*/\n  opacity: 0;\n  -webkit-transition: all 0.5s ease-in;\n  overflow: auto;\n}\n.site-menu.menu-show {\n  display: block;\n  opacity: 1;\n}\n.site-menu ul {\n  margin: 0 1rem;\n}\n.site-menu li {\n  width: 33.333%;\n  margin-top: 1rem;\n}\n.site-menu a {\n  display: block;\n}\n.site-menu .icon {\n  display: block;\n  width: 3.5rem;\n  height: 3.5rem;\n  margin: 0 auto;\n}\n.site-menu .icon img {\n  width: 100%;\n  height: auto;\n}\n.site-menu p {\n  height: 1.5rem;\n  line-height: 1.5rem;\n  text-align: center;\n  font-size: 1rem;\n  overflow: hidden;\n  color: #333;\n}\n.menu-wrapper {\n  min-width: 20rem;\n  max-width: 30rem;\n  overflow: auto;\n  margin: 0 auto;\n  background-color: rgba(255, 255, 255, 0.9);\n  min-height: 100%;\n}\n.s-m-a-enter {\n  opacity: 0.01;\n  -webkit-transition: all 0.5s ease-in;\n  transition: all 0.5s ease-in;\n}\n.s-m-a-enter.s-m-a-enter-active {\n  opacity: 1;\n}\n@-webkit-keyframes menuin {\n  0% {\n    -webkit-transform: scale(3);\n    -ms-transform: scale(3);\n    transform: scale(3);\n    opacity: 0;\n  }\n  100% {\n    -webkit-transform: scale(1);\n    -ms-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@keyframes menuin {\n  0% {\n    -webkit-transform: scale(3);\n    -ms-transform: scale(3);\n    transform: scale(3);\n    opacity: 0;\n  }\n  100% {\n    -webkit-transform: scale(1);\n    -ms-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@-webkit-keyframes menuout {\n  0% {\n    -webkit-transform: scale(1);\n    -ms-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n  100% {\n    -webkit-transform: scale(3);\n    -ms-transform: scale(3);\n    transform: scale(3);\n    opacity: 0;\n  }\n}\n@keyframes menuout {\n  0% {\n    -webkit-transform: scale(1);\n    -ms-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n  100% {\n    -webkit-transform: scale(3);\n    -ms-transform: scale(3);\n    transform: scale(3);\n    opacity: 0;\n  }\n}\n.menuin {\n  display: block;\n  -webkit-animation-fill-mode: forwards;\n  animation-fill-mode: forwards;\n  -webkit-animation-duration: 300ms;\n  animation-duration: 300ms;\n  -webkit-animation-name: menuin;\n  animation-name: menuin;\n  -webkit-transform-origin: 50% 50%;\n}\n.menuout {\n  display: block;\n  -webkit-animation-fill-mode: forwards;\n  animation-fill-mode: forwards;\n  -webkit-animation-duration: 300ms;\n  animation-duration: 300ms;\n  -webkit-animation-name: menuout;\n  animation-name: menuout;\n  -webkit-transform-origin: 50% 50%;\n}\n/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */\n/**\n * 1. Set default font family to sans-serif.\n * 2. Prevent iOS and IE text size adjust after device orientation change,\n *    without disabling user zoom.\n */\nhtml {\n  font-family: sans-serif;\n  /* 1 */\n  -ms-text-size-adjust: 100%;\n  /* 2 */\n  -webkit-text-size-adjust: 100%;\n  /* 2 */\n  width: 100%;\n  min-height: 100%;\n}\n/**\n * Remove default margin.\n */\nbody {\n  margin: 0;\n  font-size: 100%;\n  font-family: Microsoft YaHei, "\\5FAE\\8F6F\\96C5\\9ED1", Helvetica, STHeiti, Droid Sans Fallback;\n  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\n  width: 100%;\n  min-height: 100%;\n}\n/* HTML5 display definitions\n   ========================================================================== */\n/**\n * Correct `block` display not defined for any HTML5 element in IE 8/9.\n * Correct `block` display not defined for `details` or `summary` in IE 10/11\n * and Firefox.\n * Correct `block` display not defined for `main` in IE 11.\n */\narticle, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {\n  display: block;\n}\n/**\n * 1. Correct `inline-block` display not defined in IE 8/9.\n * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.\n */\naudio, canvas, progress, video {\n  display: inline-block;\n  /* 1 */\n  vertical-align: baseline;\n  /* 2 */\n}\n/**\n * Prevent modern browsers from displaying `audio` without controls.\n * Remove excess height in iOS 5 devices.\n */\naudio:not([controls]) {\n  display: none;\n  height: 0;\n}\n/**\n * Address `[hidden]` styling not present in IE 8/9/10.\n * Hide the `template` element in IE 8/9/10/11, Safari, and Firefox < 22.\n */\n[hidden], template {\n  display: none;\n}\n/* Links\n   ========================================================================== */\n/**\n * Remove the gray background color from active links in IE 10.\n */\na {\n  background-color: transparent;\n}\n/**\n * Improve readability of focused elements when they are also in an\n * active/hover state.\n */\na:active, a:hover {\n  outline: 0;\n}\n/* Text-level semantics\n   ========================================================================== */\n/**\n * Address styling not present in IE 8/9/10/11, Safari, and Chrome.\n */\nabbr[title] {\n  border-bottom: 1px dotted;\n  /*no*/\n}\n/**\n * Address style set to `bolder` in Firefox 4+, Safari, and Chrome.\n */\nb, strong {\n  font-weight: bold;\n}\n/**\n * Address styling not present in Safari and Chrome.\n */\ndfn {\n  font-style: italic;\n}\n/**\n * Address variable `h1` font-size and margin within `section` and `article`\n * contexts in Firefox 4+, Safari, and Chrome.\n */\nh1 {\n  font-size: 2em;\n  margin: 0.67em 0;\n}\n/**\n * Address styling not present in IE 8/9.\n */\nmark {\n  background: #ff0;\n  color: #000;\n}\n/**\n * Address inconsistent and variable font size in all browsers.\n */\nsmall {\n  font-size: 80%;\n}\n/**\n * Prevent `sub` and `sup` affecting `line-height` in all browsers.\n */\nsub, sup {\n  font-size: 75%;\n  line-height: 0;\n  position: relative;\n  vertical-align: baseline;\n}\nsup {\n  top: -0.5em;\n}\nsub {\n  bottom: -0.25em;\n}\n/* Embedded content\n   ========================================================================== */\n/**\n * Remove border when inside `a` element in IE 8/9/10.\n */\nimg {\n  border: 0;\n}\n/**\n * Correct overflow not hidden in IE 9/10/11.\n */\nsvg:not(:root) {\n  overflow: hidden;\n}\n/* Grouping content\n   ========================================================================== */\n/**\n * Address margin not present in IE 8/9 and Safari.\n */\nfigure {\n  margin: 1em 1.06667rem;\n  /*no*/\n}\n/**\n * Address differences between Firefox and other browsers.\n */\nhr {\n  -webkit-box-sizing: content-box;\n     -moz-box-sizing: content-box;\n          box-sizing: content-box;\n  height: 0;\n}\n/**\n * Contain overflow in all browsers.\n */\npre {\n  overflow: auto;\n}\n/**\n * Address odd `em`-unit font size rendering in all browsers.\n */\ncode, kbd, pre, samp {\n  font-family: monospace, monospace;\n  font-size: 1em;\n}\n/* Forms\n   ========================================================================== */\n/**\n * Known limitation: by default, Chrome and Safari on OS X allow very limited\n * styling of `select`, unless a `border` property is set.\n */\n/**\n * 1. Correct color not being inherited.\n *    Known issue: affects color of disabled elements.\n * 2. Correct font properties not being inherited.\n * 3. Address margins set differently in Firefox 4+, Safari, and Chrome.\n */\nbutton, input, optgroup, select, textarea {\n  color: inherit;\n  /* 1 */\n  font: inherit;\n  /* 2 */\n  margin: 0;\n  /* 3 */\n}\n/**\n * Address `overflow` set to `hidden` in IE 8/9/10/11.\n */\nbutton {\n  overflow: visible;\n}\n/**\n * Address inconsistent `text-transform` inheritance for `button` and `select`.\n * All other form control elements do not inherit `text-transform` values.\n * Correct `button` style inheritance in Firefox, IE 8/9/10/11, and Opera.\n * Correct `select` style inheritance in Firefox.\n */\nbutton, select {\n  text-transform: none;\n}\n/**\n * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`\n *    and `video` controls.\n * 2. Correct inability to style clickable `input` types in iOS.\n * 3. Improve usability and consistency of cursor style between image-type\n *    `input` and others.\n */\nbutton, html input[type="button"], input[type="reset"], input[type="submit"] {\n  -webkit-appearance: button;\n  /* 2 */\n  cursor: pointer;\n  /* 3 */\n}\n/**\n * Re-set default cursor for disabled elements.\n */\nbutton[disabled], html input[disabled] {\n  cursor: default;\n}\n/**\n * Remove inner padding and border in Firefox 4+.\n */\nbutton::-moz-focus-inner, input::-moz-focus-inner {\n  border: 0;\n  padding: 0;\n}\n/**\n * Address Firefox 4+ setting `line-height` on `input` using `!important` in\n * the UA stylesheet.\n */\ninput {\n  line-height: normal;\n}\n/**\n * It\'s recommended that you don\'t attempt to style these elements.\n * Firefox\'s implementation doesn\'t respect box-sizing, padding, or width.\n *\n * 1. Address box sizing set to `content-box` in IE 8/9/10.\n * 2. Remove excess padding in IE 8/9/10.\n */\ninput[type="checkbox"], input[type="radio"] {\n  -webkit-box-sizing: border-box;\n     -moz-box-sizing: border-box;\n          box-sizing: border-box;\n  /* 1 */\n  padding: 0;\n  /* 2 */\n}\n/**\n * Fix the cursor style for Chrome\'s increment/decrement buttons. For certain\n * `font-size` values of the `input`, it causes the cursor style of the\n * decrement button to change from `default` to `text`.\n */\ninput[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button {\n  height: auto;\n}\n/**\n * 1. Address `appearance` set to `searchfield` in Safari and Chrome.\n * 2. Address `box-sizing` set to `border-box` in Safari and Chrome.\n */\ninput[type="search"] {\n  -webkit-appearance: textfield;\n  /* 1 */\n  -webkit-box-sizing: content-box;\n     -moz-box-sizing: content-box;\n          box-sizing: content-box;\n  /* 2 */\n}\n/**\n * Remove inner padding and search cancel button in Safari and Chrome on OS X.\n * Safari (but not Chrome) clips the cancel button when the search input has\n * padding (and `textfield` appearance).\n */\ninput[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {\n  -webkit-appearance: none;\n}\n/**\n * Define consistent border, margin, and padding.\n */\nfieldset {\n  border: 1px solid #c0c0c0;\n  /*no*/\n  margin: 0 2px;\n  /*no*/\n  padding: 0.35em 0.625em 0.75em;\n}\n/**\n * 1. Correct `color` not being inherited in IE 8/9/10/11.\n * 2. Remove padding so people aren\'t caught out if they zero out fieldsets.\n */\nlegend {\n  border: 0;\n  /* 1 */\n  padding: 0;\n  /* 2 */\n}\n/**\n * Remove default vertical scrollbar in IE 8/9/10/11.\n */\ntextarea {\n  overflow: auto;\n}\n/**\n * Don\'t inherit the `font-weight` (applied by a rule above).\n * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.\n */\noptgroup {\n  font-weight: bold;\n}\n/* Tables\n   ========================================================================== */\n/**\n * Remove most spacing between table cells.\n */\ntable {\n  border-collapse: collapse;\n  border-spacing: 0;\n}\ntd, th {\n  padding: 0;\n}\nul, ol {\n  list-style: none;\n}\nbody, div, ol, ul, li, h1, h2, h3, h4, h5, h6, p, th, td, dl, dd, form, iframe, input, textarea, select, label, article, aside, footer, header, menu, nav, section, time, audio, video {\n  margin: 0;\n  padding: 0;\n  -webkit-box-sizing: border-box;\n     -moz-box-sizing: border-box;\n          box-sizing: border-box;\n}\na {\n  text-decoration: none;\n}\na, input, textarea, select {\n  outline: none;\n}\n/**\n* 配置\n*/\n/**\n* 公共样式\n*/\nhtml {\n  background-color: #fff;\n}\n.container {\n  background: #fff;\n  width: 100%;\n  min-height: 100%;\n  position: relative;\n  min-width: 20rem;\n  max-width: 30rem;\n  margin: 0 auto;\n  color: #333;\n  z-index: 1;\n}\n.wrapper {\n  width: 100%;\n  min-height: 100%;\n  position: relative;\n  z-index: 1;\n}\nimg {\n  width: 100%;\n  vertical-align: top;\n}\n.clear {\n  _zoom: 1;\n  clear: both;\n}\n.clear:after {\n  content: "";\n  display: block;\n  height: 0;\n  visibility: hidden;\n  clear: both;\n}\n.left {\n  float: left;\n}\n.right {\n  float: right;\n}\n.auto {\n  overflow: hidden;\n}\n.li-left li {\n  display: block;\n  float: left;\n}\n.li-right li {\n  display: block;\n  float: right;\n}\n.hide {\n  display: none;\n}\n.rlt {\n  position: relative;\n}\n.shop-common-tip-layer {\n  position: fixed;\n  z-index: 19491001;\n  top: 50%;\n  left: 50%;\n  width: 16rem;\n  height: 3rem;\n  margin-top: -1.5rem;\n  margin-left: -8rem;\n}\n.shop-common-tip-layer .back {\n  width: 100%;\n  height: 100%;\n  background: #000;\n  opacity: .5;\n  -webkit-border-radius: 5px;\n          border-radius: 5px;\n  /*no*/\n  -webkit-box-shadow: 0 0 1rem #000;\n          box-shadow: 0 0 1rem #000;\n}\n.shop-common-tip-layer .front {\n  position: absolute;\n  width: 16rem;\n  top: 50%;\n  left: 0;\n  font-size: .875rem;\n  color: #fff;\n  text-align: center;\n  -webkit-transform: translateY(-50%);\n      -ms-transform: translateY(-50%);\n          transform: translateY(-50%);\n}\n.shop-common-tip-layer .front span {\n  color: #fff;\n  font-size: .875rem;\n}\n.common-loading-layer {\n  position: fixed;\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  z-index: 9999;\n}\n.common-loading-layer .back {\n  width: 100%;\n  height: 100%;\n  background: #000;\n  opacity: .5;\n}\n.common-loading-layer .front {\n  width: 16rem;\n  height: 8rem;\n  position: absolute;\n  top: 50%;\n  left: 50%;\n  margin-top: -4rem;\n  margin-left: -8rem;\n  background: #fff;\n  -webkit-border-radius: 0.21333rem;\n  /*no*/\n  /*no*/\n  border-radius: 0.21333rem;\n  /*no*/\n}\n.common-loading-layer .front .img {\n  text-align: center;\n  line-height: 4rem;\n}\n.common-loading-layer .front .img img {\n  width: auto!important;\n  vertical-align: middle!important;\n  display: inline-block;\n}\n.common-loading-layer .front .text {\n  text-align: center;\n  color: #2079b4;\n}\nbody {\n  padding-bottom: constant(safe-area-inset-bottom);\n  padding-bottom: env(safe-area-inset-bottom);\n}\n.wrapper {\n  background: #f5e4c9;\n}\n.pic-style {\n  margin: 0 0.8rem;\n}\n.con_te {\n  font-size: 0.85333rem;\n  display: inline-block;\n  padding: 0 1.86667rem;\n  font-weight: normal;\n  color: #931116;\n  background: url(\'//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/text_arr1.png?timestamp=1530508721113\') 0 center no-repeat, url(\'//zxcs.ggwan.com/forecastbazijingpibundle/images/yh/text_arr2.png?timestamp=1530508721113\') right center no-repeat;\n  background-size: 1.44rem 0.37333rem;\n  line-height: 1;\n}\n.zhanwei {\n  display: inline-block;\n  height: 0.58667rem;\n}\n.yingcaier {\n  font-size: 0.74667rem;\n}\n.yingcaier .intro {\n  position: relative;\n}\n.yingcaier .intro div {\n  position: absolute;\n  left: 5%;\n  bottom: 10%;\n  color: #fff;\n}\n.yingcaier p {\n  padding: 0.66667rem;\n  color: #333333;\n}\n.yingcaier .blur {\n  position: relative;\n}\n.yingcaier .blur .blur-text {\n  position: absolute;\n  text-indent: 2em;\n  line-height: 1.33333rem;\n  color: #767676;\n  padding: 0 0.69333rem;\n  text-align: justify;\n  -webkit-filter: blur(4px);\n          filter: blur(4px);\n  display: block;\n  overflow: hidden;\n}\n.yingcaier .blur .show-text {\n  color: #9c1515;\n  position: relative;\n  z-index: 2;\n  width: 80%;\n  left: 50%;\n  -webkit-transform: translate(-50%, 0);\n      -ms-transform: translate(-50%, 0);\n          transform: translate(-50%, 0);\n  padding: 0.53333rem;\n  -webkit-border-radius: 0.26667rem;\n          border-radius: 0.26667rem;\n  background: #fff;\n  border: 1px solid #f7b555;\n}\n', ""])
    },
        t = e.exports = n(3)(),
        t.push([e.i, ".video-js .vjs-big-play-button .vjs-icon-placeholder:before,.video-js .vjs-modal-dialog,.vjs-button>.vjs-icon-placeholder:before,.vjs-modal-dialog .vjs-modal-dialog-content{position:absolute;top:0;left:0;width:100%;height:100%}.video-js .vjs-big-play-button .vjs-icon-placeholder:before,.vjs-button>.vjs-icon-placeholder:before{text-align:center}@font-face{font-family:VideoJS;src:url(" + n(728) + '?#iefix) format("eot")}@font-face{font-family:VideoJS;src:url(data:application/font-woff;charset=utf-8;base64,d09GRgABAAAAABBIAAsAAAAAGoQAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABHU1VCAAABCAAAADsAAABUIIslek9TLzIAAAFEAAAAPgAAAFZRiV3RY21hcAAAAYQAAADQAAADIjn098ZnbHlmAAACVAAACv4AABEIAwnSw2hlYWQAAA1UAAAAKwAAADYSy2hLaGhlYQAADYAAAAAbAAAAJA4DByFobXR4AAANnAAAAA8AAACE4AAAAGxvY2EAAA2sAAAARAAAAEQ9NEHGbWF4cAAADfAAAAAfAAAAIAEyAIFuYW1lAAAOEAAAASUAAAIK1cf1oHBvc3QAAA84AAABDwAAAZ5AAl/0eJxjYGRgYOBiMGCwY2BycfMJYeDLSSzJY5BiYGGAAJA8MpsxJzM9kYEDxgPKsYBpDiBmg4gCACY7BUgAeJxjYGQ7xTiBgZWBgaWQ5RkDA8MvCM0cwxDOeI6BgYmBlZkBKwhIc01hcPjI+FGBHcRdyA4RZgQRAC4HCwEAAHic7dFprsIgAEXhg8U61XmeWcBb1FuQP4w7ZQXK5boMm3yclFDSANAHmuKviBBeBPQ8ymyo8w3jOh/5r2ui5nN6v8sYNJb3WMdeWRvLji0DhozKdxM6psyYs2DJijUbtuzYc+DIiTMXrty4k8oGLb+n0xCe37ekM7Z66j1DbUy3l6PpHnLfdLO5NdSBoQ4NdWSoY9ON54mhdqa/y1NDnRnq3FAXhro01JWhrg11Y6hbQ90Z6t5QD4Z6NNSToZ4N9WKoV0O9GerdUJORPqkhTd54nJ1YDXBU1RV+576/JBs2bPYPkrDZt5vsJrv53V/I5mclhGDCTwgGBQQSTEji4hCkYIAGd4TGIWFAhV0RQTpWmQp1xv6hA4OTOlNr2zFANbHUYbq2OtNCpViRqsk+e+7bTQAhzti8vPfuPffcc88959zznbcMMPjHD/KDDGEY0ABpYX384NhlomIYlo4JISGEY9mMh2FSidYiqkEUphtNYDSY/dXg9023l4DdxlqUl0chuZRhncJKrsCQHIwcGuwfnhMIzBnuH4Sym+1D2zaGjheXlhYfD238z80mKYMmvJ5XeOTzd8z9eujbMxJNhu4C9xPE/bCMiDuSNIWgkTQwBE55hLSAE7ZwhrHLnAHZOGV/kmBGTiNjZxzI77Hb7Hqjz68TjT6vh+5JT/cCIkqS0D6CqPf5jX4Qjdx5j6vlDfZM4aZFdbVXIxtOlJaP/WottMnH6CJQ3bTiue3PrY23HjnChtuamxwvvzFjxkPrNj3z0tG9T561HDYf6OgmRWvlY3JQHoQb8ltV2Yet7YfWctEjR1AtxS/cSX6U4alf6NJEBQ7YKg9wrXQKd0IeZCb2ux75Uhh1Un+Nz+9LTOE7PK777nN5xqdTneTBhCbx446mZrhnUkrCz2YhA9dSMxaG0SYmT8hi9ZPu1E94PJYQSH6LRmhxec7Q7ZeXntgQuVpbh+a4qWNsckVyTdn0P7o7DpgPW84+uRcq0BITflBikGdUjAZ9wYBVI3mtrNvr9kpg1UsaK6t3690aoorC1lg0GpMH2HAMtkZjsSi5Ig9ESVosOh7GQfLjKNLvKpMKkLSKNFAka710GdgSi8oDMSoNhqjkKBXTgn3swtaxyzGkUzIzae9RtLdWkSlZ1KDX6EzgllzV4NV4SoDFSOGD4+HCeQUF8wrZ5Hs8zIb5EaVxy8DYFTbMCJPnLIWZxugZE2NlivC0gc1qEQUR8jEKgZcAXeH18BiCgl5nlHh0CrjB4Hb5fX4gb0J7c9PuHVsfgkx2n/vTY/JV8kn8PGxf7faOZ8qX8JVByuIf4whk9sqXli2hvPJV9hrp0hY7l8r2x37ydaVsb4xvXv/47v2NjfCl8m5oRDJclFMoE1yk0Uh1Te4/m8lFXe9qBZD0EkheicebXvzI2PLCuoKCukLuhPIeKwaHPEouxw3kMqaIUXDQ1p0mip+MyCORSCQaoUsnY1VZ38nUTrG21WvVo4f1OsEJFhvSfAFwGfT8VHRMeAVUpwLOoLzjT/REIj3O3FhuURE+nERF+0pTId5Fyxv5sfwGyg4O+my4vZv0sZm7oeQlFZORiB+tG0MweVNraeitl7yxiPIHTk4/diVxs94o5lEYishB2iAtkchEnsActoEpx44Fo8XnsQMaA22BlqC20RmhBKzYojZyYaxg+JggMc4HHY2m+L9EkWSYljirOisrO7d3VorxzyZ6Vc4lJqITAu1b2wOBdrLElAP+bFc2eGaZFVbkmJktv5uT6Jlz5D/MnBFor6ig/JPnRViBsV3LNKGGqB1ChJ0tgQywlVLFJIuQgTFttwkiKxhyQdAZMdMYtSaoAewqfvXVYPAbDT6/1mez85YS8FSDywQ6NfAnef6FNEGMilnppyvn5rB6tTyq1pOceRWnp2WJEZFXHeX5oyoem1nTTgdqc4heDY7bOeKz63vnz+/dRx+s31Ht2JGanQ5seirfWJL9tjozU/12TnEjn5oux9OzU3ckGbBzBwNOyk69JykKH0n/0LM9A72tuwM3zQpIRu4AxiToseEpgPOmbROyFe9/X2yeUvoUsCyEvjcgs7fpWP3/aKlFN0+6HFUe6D9HFz/XPwBlN9tTqNyZjFJ8UO2RUT5/h4CptCctEyeisnOyXjALEp7dXKaQKf6O7IMnGjNNACRMLxqdYJX8eMLvmmd68D+ayBLyKKYZwYxDt/GNhzETDJ05Qxlyi3pi3/Z93ndYVSumgj0V/KkIFlO6+1K3fF2+3g0q+YtuSIf0bvmLqV09nnobI6hwcjIP8aPCKayjsF5JBY3LaKAeRLSyYB1h81oTwe9SlPMkXB7G0mfL9q71gaqqwPqu67QRKS1+ObTx+sbQy9QV2OQHEScGkdFBeT7v7qisqqrs6N52i78/R+6S0qQONVj26agOVoswCyQWIV5D86vH53bxNUeXV0K+XZaHv/nm/KsHhOvylwsWnJX/HE8l/4WCv5x+l5n08z6UU8bUMa3MBpSmM7F63AxntdC9eBCKEZW9Hr+ABNqtxgAQrSbMtmrW7lKQuoSgBhSrTazWVU2QAKWY8wiiuhqFmQgWJBgoXiuWIm42N7hqZbBsgXz52O5P5uSvaNgFGnOuvsRw8I8Laha91wMvDuxqWFheN7/8GVtTltdS83DQsXRmqc5ZtcJXEVrlV2doTWk5+Yunm71dG5f55m/qY0MjI93vv9/NfpxXV9sUXrxy2fbNy1or65cOlDRnOoKFeeXcbw42H/bNDT5Qs3flgs31gWC1lD1nfUV/X7NdCnSUdHY2e8afzfKsqZ5ZljfDqjLOmk3UebNXB+aHArPYDRs+/HDDxeT5DiP+sFg7OpRaVQMGBV89PpeBdj22hCE0Uub0UqwLrNWsG0cuyadgLXTeR5rbO4+3c/vl15cur2nRq+TXCQDcS3SO+s6ak+e5/eMS+1dw3btu3YG2tvFL8XdIZvdjdW6TO/4B7IdrZWVPmctm5/59AgsPItTSbCiIBr2OqIGzmu20SMKAS7yqwGBUfGfgjDYlLLDeF0SfcLB2LSx8flT+08/kzz6yOj96rft4rpTjdPQcmLd47uKibbDq7ZSz/XtbH2nN717Nd62rU+c8Icevvv7I09wA6WvjVcafb+FsbNG+ZQ80Rn6ZZsvrP7teP2dzTdoETvNhjCmsr8FID2sJ69VYvdUcxk4AzYRlKcaE38eXNRlfW9H1as9i6acLHp1XpuNB5K7DIvkX08y1ZYvh3KfWaiCzH+ztrSDmD7LuX73x/mJelB8Yj39t8nhNQJJ2CAthpoFGLsGgtSOCJooCGoaJAMTjSWHVZ08YAa1Fg9lPI5U6DOsGVjDasJeZZ+YyhfCwfOzCxlBA69M9XLXtza7H/rav+9Tjq5xNi0wpKQIRNO4Lrzz7yp5QVYM6Jd/oc1Uvn/mQhhuWh6ENXoS2YTZ8QT42bF5d/559zp5r0Uff2VnR2tdf2/WCOd2cO0Mw6qpWPnvxpV0nrt5fZd2yItc199GWe8vlNfNDq+CH/7yAAnB9hn7T4QO4c1g9ScxsZgmzntnE/IDGndtHMw69lFwoCnYsMGx+rBp8JSBqdLzBr9QRPq/PbhWMWFtQZp1xguy/haw3TEHm3TWAnxFWQQWgt7M5OV0lCz1VRYucpWliy7z6Zd4urwPIyeZQqli2Lgg7szJV09PysATbOQtYIrB2YzbkJYkGgJ0m4AjPUap1pvYu1K9qr97z0Yl3p332b2LYB78ncYIlRkau/8GObSsOlZancACE5d5ily+c2+7h5Yj4lqhVmXXB+iXLfvdqSgqfKtQvfHDV0OnvQR1qhw42XS/vkvsh/hXcrDFP0a+SJNIomEfD1nsrYGO+1bgTOJhM8Hv6ek+7vVglxuSRwoKn17S937bm6YJCeSSG0Op1n+7tE37tcZ/p7dsTv4EUrGpDbWueKigsLHhqTVsoEj+JU0kaSjnj9tz8/gryQWwJ9BcJXBC/7smO+I/IFURJetFPrdt5WcoL6DbEJaygI8CTHfQTjf40ofD+DwalTqIAAHicY2BkYGAA4jC5t2/j+W2+MnCzM4DAtTC+5cg0OyNYnIOBCUQBAAceB90AeJxjYGRgYGcAARD5/z87IwMjAypQBAAtgwI4AHicY2BgYGAfYAwAOkQA4QAAAAAAAA4AaAB+AMwA4AECAUIBbAGYAcICGAJYArQC4AMwA7AD3gQwBJYE3AUkBWYFigYgBmYGtAbqB1gIEghYCG4IhHicY2BkYGBQZChlYGcAASYg5GJCBob/YD4DABfTAbQAeJxdkE1qg0AYhl8Tk9AIoVDaVSmzahcF87PMARLIMoFAl0ZHY1BHdBJIT9AT9AQ9RQ9Qeqy+yteNMzDzfM+88w0K4BY/cNAMB6N2bUaPPBLukybCLvleeAAPj8JD+hfhMV7hC3u4wxs7OO4NzQSZcI/8Ltwnfwi75E/hAR7wJTyk/xYeY49fYQ/PztM+jbTZ7LY6OWdBJdX/pqs6NYWa+zMxa13oKrA6Uoerqi/JwtpYxZXJ1coUVmeZUWVlTjq0/tHacjmdxuL90OR8O0UEDYMNdtiSEpz5XQGqzlm30kzUdAYFFOb8R7NOZk0q2lwAyz1i7oAr1xoXvrOgtYhZx8wY5KRV269JZ5yGpmzPTjQhvY9je6vEElPOuJP3mWKnP5M3V+YAAAB4nG2PyXLCMBBE3YCNDWEL2ffk7o8S8oCnkCVHC5C/jzBQlUP6IHVPzYyekl5y0iL5X5/ooY8BUmQYIkeBEca4wgRTzDDHAtdY4ga3uMM9HvCIJzzjBa94wzs+8ImvZNAq8TM+HqVkKxWlrQiOxjujQkNlEzyNzl6Z/cU2XF06at7U83VQyklLpEvSnuzsb+HAPnPfQVgaupa1Jlu4sPLsFblcitaz0dHU0ZF1qatjZ1+aTXYCmp6u0gSvWNPyHLtFZ+ZeXWVSaEkqs3T8S74WklbGbNNNq4LL4+CWKtZDv2cfX8l8aFbKFhEnJnJ+IULFpqwoQnNHlHaVQtPBl+ypmbSWdmyC61KS/AKZC3Y+AA==) format("woff"),url(data:application/x-font-ttf;charset=utf-8;base64,AAEAAAALAIAAAwAwR1NVQiCLJXoAAAE4AAAAVE9TLzJRiV3RAAABjAAAAFZjbWFwOfT3xgAAAmgAAAMiZ2x5ZgMJ0sMAAAXQAAARCGhlYWQSy2hLAAAA4AAAADZoaGVhDgMHIQAAALwAAAAkaG10eOAAAAAAAAHkAAAAhGxvY2E9NEHGAAAFjAAAAERtYXhwATIAgQAAARgAAAAgbmFtZdXH9aAAABbYAAACCnBvc3RAAl/0AAAY5AAAAZ4AAQAABwAAAAAABwAAAP//BwEAAQAAAAAAAAAAAAAAAAAAACEAAQAAAAEAAFYfTwlfDzz1AAsHAAAAAADWVg6nAAAAANZWDqcAAAAABwEHAAAAAAgAAgAAAAAAAAABAAAAIQB1AAcAAAAAAAIAAAAKAAoAAAD/AAAAAAAAAAEAAAAKADAAPgACREZMVAAObGF0bgAaAAQAAAAAAAAAAQAAAAQAAAAAAAAAAQAAAAFsaWdhAAgAAAABAAAAAQAEAAQAAAABAAgAAQAGAAAAAQAAAAEGygGQAAUAAARxBOYAAAD6BHEE5GAAA1wAVwHOAAACAAUDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBmRWQAQPEB8SAHAAAAAKEHAAAAAAAAAQAAAAAAAAAAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAAAAAUAAAADAAAALAAAAAQAAAGSAAEAAAAAAIwAAwABAAAALAADAAoAAAGSAAQAYAAAAAQABAABAADxIP//AADxAf//AAAAAQAEAAAAAQACAAMABAAFAAYABwAIAAkACgALAAwADQAOAA8AEAARABIAEwAUABUAFgAXABgAGQAaABsAHAAdAB4AHwAgAAABBgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAAAAAAGQAAAAAAAAACAAAPEBAADxAQAAAAEAAPECAADxAgAAAAIAAPEDAADxAwAAAAMAAPEEAADxBAAAAAQAAPEFAADxBQAAAAUAAPEGAADxBgAAAAYAAPEHAADxBwAAAAcAAPEIAADxCAAAAAgAAPEJAADxCQAAAAkAAPEKAADxCgAAAAoAAPELAADxCwAAAAsAAPEMAADxDAAAAAwAAPENAADxDQAAAA0AAPEOAADxDgAAAA4AAPEPAADxDwAAAA8AAPEQAADxEAAAABAAAPERAADxEQAAABEAAPESAADxEgAAABIAAPETAADxEwAAABMAAPEUAADxFAAAABQAAPEVAADxFQAAABUAAPEWAADxFgAAABYAAPEXAADxFwAAABcAAPEYAADxGAAAABgAAPEZAADxGQAAABkAAPEaAADxGgAAABoAAPEbAADxGwAAABsAAPEcAADxHAAAABwAAPEdAADxHQAAAB0AAPEeAADxHgAAAB4AAPEfAADxHwAAAB8AAPEgAADxIAAAACAAAAAAAAAADgBoAH4AzADgAQIBQgFsAZgBwgIYAlgCtALgAzADsAPeBDAElgTcBSQFZgWKBiAGZga0BuoHWAgSCFgIbgiEAAEAAAAABYsFiwACAAABEQECVQM2BYv76gILAAADAAAAAAZrBmsAAgAbADQAAAkCEyIHDgEHBhAXHgEXFiA3PgE3NhAnLgEnJgMiJy4BJyY0Nz4BNzYyFx4BFxYUBw4BBwYC6wHA/kCVmIuGzjk7OznOhosBMIuGzjk7OznOhouYeW9rpi0vLy2ma2/yb2umLS8vLaZrbwIwAVABUAGbOznOhov+0IuGzjk7OznOhosBMIuGzjk7+sAvLaZrb/Jva6YtLy8tpmtv8m9rpi0vAAACAAAAAAVABYsAAwAHAAABIREpAREhEQHAASv+1QJVASsBdQQW++oEFgAAAAQAAAAABiEGIAAHABcAJwAqAAABNCcmJxUXNjcUBxc2NTQnLgEnFR4BFxYBBwEhESEBEQEGBxU2Nxc3AQcXBNA0MlW4A7spcU1FQ+6VbKovMfu0XwFh/p8BKwF1AT5QWZl6mV/9YJycA4BhUlAqpbgYGGNicZKknYyHvSKaIJNlaQIsX/6f/kD+iwH2/sI9G5ojZJhfBJacnAAAAAEAAAAABKsF1gAFAAABESEBEQECCwEqAXb+igRg/kD+iwSq/osAAAACAAAAAAVmBdYACAAOAAABNCcmJxE2NzYBESEBEQEFZTQyVFQyNPwQASsBdf6LA4BhUlAq/aYqUFIBQf5A/osEqv6LAAMAAAAABiAGDwAFAA4AIgAAExEhAREBBTQnJicRNjc2AxUeARcWFAcOAQcVPgE3NhAnLgHgASsBdf6LAsU0MlVVMjS7bKovMTEvqmyV7kNFRUPuBGD+QP6LBKr+i+BhUlAq/aYqUFIC8Jogk2Vp6GllkyCaIr2HjAE6jIe9AAAABAAAAAAFiwWLAAUACwARABcAAAEjESE1IwMzNTM1IQEjFSERIwMVMxUzEQILlgF24JaW4P6KA4DgAXaW4OCWAuv+ipYCCuCW/ICWAXYCoJbgAXYABAAAAAAFiwWLAAUACwARABcAAAEzFTMRIRMjFSERIwEzNTM1IRM1IxEhNQF14Jb+iuDgAXaWAcCW4P6KlpYBdgJV4AF2AcCWAXb76uCWAcDg/oqWAAAAAAIAAAAABdYF1gATABcAAAEhIg4BFREUHgEzITI+ATURNC4BAyERIQVA/IApRCgoRCkDgClEKChEKfyAA4AF1ShEKfyAKUQoKEQpA4ApRCj76wOAAAYAAAAABmsGawAIAA0AFQAeACMALAAACQEmIyIHBgcBJS4BJwEFIQE2NzY1NAUBBgcGFRQXIQUeARcBMwEWMzI3NjcBAr4BZFJQhHt2YwESA44z7Z/+7gLl/dABel0zNfwS/t1dMzUPAjD95DPtnwESeP7dU0+Ee3Zj/u4D8AJoEy0rUf4nd6P6PP4nS/1zZn+Ej0tLAfhmf4SPS0pLo/o8Adn+CBMtK1EB2QAFAAAAAAZrBdYAEwAXABsAHwAjAAABISIOARURFB4BMyEyPgE1ETQuAQEhFSEBITUhBSE1ITUhNSEF1ftWKUUoKEUpBKopRSgoRfstASr+1gLq/RYC6gHA/tYBKv0WAuoF1ShEKfyAKUQoKEQpA4ApRCj9q5X+1ZWVlZaVAAAAAAMAAAAABiAF1gATACsAQwAAASEiDgEVERQeATMhMj4BNRE0LgEBIzUjFTM1MxUUBisBIiY1ETQ2OwEyFhUFIzUjFTM1MxUUBisBIiY1ETQ2OwEyFhUFi/vqKEUoKEUoBBYoRSgoRf2CcJWVcCsf4B8sLB/gHysCC3CVlXAsH+AfKysf4B8sBdUoRCn8gClEKChEKQOAKUQo/fYl4CVKHywsHwEqHywsH0ol4CVKHywsHwEqHywsHwAGAAAAAAYgBPYAAwAHAAsADwATABcAABMzNSMRMzUjETM1IwEhNSERITUhERUhNeCVlZWVlZUBKwQV++sEFfvrBBUDNZb+QJUBwJX+QJb+QJUCVZWVAAAAAQAAAAAGIQZsADEAAAEiBgcBNjQnAR4BMzI+ATQuASIOARUUFwEuASMiDgEUHgEzMjY3AQYVFB4BMj4BNC4BBUAqSx797AcHAg8eTys9Zzw8Z3pnPAf98R5PKz1nPDxnPStPHgIUBjtkdmQ7O2QCTx4cATcbMhsBNB0gPGd6Zzw8Zz0ZG/7NHCA8Z3pnPCAc/soZGDtkOjpkdmQ7AAAAAAIAAAAABlkGawBDAFAAAAE2NCc3PgEnAy4BDwEmLwEuASMhIgYPAQYHJyYGBwMGFh8BBhQXBw4BFxMeAT8BFh8BHgEzITI2PwE2NxcWNjcTNiYnBSIuATQ+ATIeARQOAQWrBQWeCgYHlgcaDLo8QhwDFQ7+1g4VAhxEOroNGgeVBwULnQUFnQsFB5UHGg26O0McAhUOASoOFQIcRDq6DRoHlQcFC/04R3hGRniOeEZGeAM3Kj4qewkbDAEDDAkFSy4bxg4SEg7GHC1LBQkM/v0MGwl7Kj4qewkbDP79DAkFSy4bxg4SEg7GHC1LBQkMAQMMGwlBRniOeEZGeI54RgABAAAAAAZrBmsAGAAAExQXHgEXFiA3PgE3NhAnLgEnJiAHDgEHBpU7Oc6GiwEwi4bOOTs7Oc6Gi/7Qi4bOOTsDgJiLhs45Ozs5zoaLATCLhs45Ozs5zoaLAAAAAAIAAAAABmsGawAYADEAAAEiBw4BBwYQFx4BFxYgNz4BNzYQJy4BJyYDIicuAScmNDc+ATc2MhceARcWFAcOAQcGA4CYi4bOOTs7Oc6GiwEwi4bOOTs7Oc6Gi5h5b2umLS8vLaZrb/Jva6YtLy8tpmtvBms7Oc6Gi/7Qi4bOOTs7Oc6GiwEwi4bOOTv6wC8tpmtv8m9rpi0vLy2ma2/yb2umLS8AAwAAAAAGawZrABgAMQA+AAABIgcOAQcGEBceARcWIDc+ATc2ECcuAScmAyInLgEnJjQ3PgE3NjIXHgEXFhQHDgEHBhMUDgEiLgE0PgEyHgEDgJiKhs85Ozs5z4aKATCKhs85Ozs5z4aKmHlva6YtLy8tpmtv8m9rpi0vLy2ma29nPGd6Zzw8Z3pnPAZrOznPhor+0IqGzzk7OznPhooBMIqGzzk7+sAvLaZrb/Jva6YtLy8tpmtv8m9rpi0vAlU9Zzw8Z3pnPDxnAAAABAAAAAAGIAYhABMAHwApAC0AAAEhIg4BFREUHgEzITI+ATURNC4BASM1IxUjETMVMzU7ASEyFhURFAYjITczNSMFi/vqKEUoKEUoBBYoRSgoRf2CcJVwcJVwlgEqHywsH/7WcJWVBiAoRSj76ihFKChFKAQWKEUo/ICVlQHAu7ssH/7WHyxw4AAAAAACAAAAAAZrBmsAGAAkAAABIgcOAQcGEBceARcWIDc+ATc2ECcuAScmEwcJAScJATcJARcBA4CYi4bOOTs7Oc6GiwEwi4bOOTs7Oc6Gi91p/vT+9GkBC/71aQEMAQxp/vUGazs5zoaL/tCLhs45Ozs5zoaLATCLhs45O/wJaQEL/vVpAQwBDGn+9QELaf70AAABAAAAAAXWBrYAJwAAAREJAREyFxYXFhQHBgcGIicmJyY1IxQXHgEXFjI3PgE3NjQnLgEnJgOA/osBdXpoZjs9PTtmaPRoZjs9lS8tpWtv9G9rpS0vLy2la28FiwEq/ov+iwEqPTtmaPNpZTw9PTxlaXl5b2umLS8vLaZrb/Nva6UuLwABAAAAAAU/BwAAFAAAAREjIgYdASEDIxEhESMRMzU0NjMyBT+dVjwBJSf+/s7//9Ctkwb0/vhISL3+2P0JAvcBKNq6zQAAAAAEAAAAAAaOBwAAMABFAGAAbAAAARQeAxUUBwYEIyImJyY1NDY3NiUuATU0NwYjIiY1NDY3PgEzIQcjHgEVFA4DJzI2NzY1NC4CIyIGBwYVFB4DEzI+AjU0LgEvASYvAiYjIg4DFRQeAgEzFSMVIzUjNTM1MwMfQFtaQDBI/uqfhOU5JVlKgwERIB8VLhaUy0g/TdNwAaKKg0pMMUVGMZImUBo1Ij9qQCpRGS8UKz1ZNjprWzcODxMeChwlThAgNWhvUzZGcX0Da9XVadTUaQPkJEVDUIBOWlN6c1NgPEdRii5SEipAKSQxBMGUUpo2QkBYP4xaSHNHO0A+IRs5ZjqGfVInITtlLmdnUjT8lxo0Xj4ZMCQYIwsXHTgCDiQ4XTtGazsdA2xs29ts2QADAAAAAAaABmwAAwAOACoAAAERIREBFgYrASImNDYyFgERIRE0JiMiBgcGFREhEhAvASEVIz4DMzIWAd3+tgFfAWdUAlJkZ6ZkBI/+t1FWP1UVC/63AgEBAUkCFCpHZz+r0ASP/CED3wEySWJik2Fh/N39yAISaXdFMx4z/dcBjwHwMDCQIDA4H+MAAAEAAAAABpQGAAAxAAABBgcWFRQCDgEEIyAnFjMyNy4BJxYzMjcuAT0BFhcuATU0NxYEFyY1NDYzMhc2NwYHNgaUQ18BTJvW/tKs/vHhIyvhsGmmHyEcKypwk0ROQk4seQFbxgi9hoxgbWAlaV0FaGJFDhyC/v3ut22RBIoCfWEFCxexdQQmAyyOU1hLlbMKJiSGvWYVOXM/CgAAAAEAAAAABYAHAAAiAAABFw4BBwYuAzURIzU+BDc+ATsBESEVIREUHgI3NgUwUBewWWitcE4hqEhyRDAUBQEHBPQBTf6yDSBDME4Bz+0jPgECOFx4eDoCINcaV11vVy0FB/5Y/P36HjQ1HgECAAEAAAAABoAGgABKAAABFAIEIyInNj8BHgEzMj4BNTQuASMiDgMVFBYXFj8BNjc2JyY1NDYzMhYVFAYjIiY3PgI1NCYjIgYVFBcDBhcmAjU0EiQgBBIGgM7+n9FvazsTNhRqPXm+aHfijmm2f1srUE0eCAgGAgYRM9Gpl6mJaz1KDgglFzYyPlYZYxEEzv7OAWEBogFhzgOA0f6fziBdR9MnOYnwlnLIfjpgfYZDaJ4gDCAfGAYXFD1al9mkg6ruVz0jdVkfMkJyVUkx/l5Ga1sBfOnRAWHOzv6fAAAHAAAAAAcBBM8AFwAhADgATwBmAHEAdAAAAREzNhcWFxYXFhcWBw4BBwYHBicmLwEmNxY2NzYuAQcRFAUWNzY/ATY3NjU2JyMGFxYfARYXFhcUFxY3Nj8BNjc2NzYnIwYXFh8BFhcWFRYXFjc2PwE2NzY3NicjBhcWHwEWFxYVFgUzPwEVMxEjBgsBARUnAxwcaC5MND0sTSsvCgdVREdTNWg1KgECq1JrCQcwYkABfhoSCxAKJBQXAX4dAQMCBgMnFxsBJBoSCxAKJBQWAQF+HgEEAgUEJxcbASMZEwsQCiQUFgEBfh4BBAIFBCcXGwH5Q+5B4arNDfHvAhaOAckC/QIBAwwPHzdcZXlZmC8xCAQBAQIDBMIDVkxCZDQF/pUHwgcTCyAUQEdPU8etCAgFCQZHTFxbwLoHEwsgFEBHT1PHrQgIBQkGR0xcW8C6BxMLIBRAR09Tx60ICAUJBkdMXFvAwGQBZQMMFf6D/oYB/fkBAAABAAAAAAYhBrYALAAAASIHDgEHBhURFB4BOwERITU0Nz4BNzYyFx4BFxYdASERMzI+ATURNCcuAScmA4CJfXi6MzU8Zz3g/tUpKJFeYdRhXpEoKf7V4D1nPDUzunh9BrU0M7t4fYn99j1nPAJVlWthXpAoKSkokF5ha5X9qzxnPQIKiX14uzM0AAAAAAIAAAAABUAFQAACAAYAAAkCIREzEQHAAnv9hQLrlQHAAcABwPyAA4AAAAAAAgAAAAAFQAVAAAMABgAAATMRIwkBEQHAlZUBBQJ7BUD8gAHA/kADgAAAAAAAABAAxgABAAAAAAABAAcAAAABAAAAAAACAAcABwABAAAAAAADAAcADgABAAAAAAAEAAcAFQABAAAAAAAFAAsAHAABAAAAAAAGAAcAJwABAAAAAAAKACsALgABAAAAAAALABMAWQADAAEECQABAA4AbAADAAEECQACAA4AegADAAEECQADAA4AiAADAAEECQAEAA4AlgADAAEECQAFABYApAADAAEECQAGAA4AugADAAEECQAKAFYAyAADAAEECQALACYBHlZpZGVvSlNSZWd1bGFyVmlkZW9KU1ZpZGVvSlNWZXJzaW9uIDEuMFZpZGVvSlNHZW5lcmF0ZWQgYnkgc3ZnMnR0ZiBmcm9tIEZvbnRlbGxvIHByb2plY3QuaHR0cDovL2ZvbnRlbGxvLmNvbQBWAGkAZABlAG8ASgBTAFIAZQBnAHUAbABhAHIAVgBpAGQAZQBvAEoAUwBWAGkAZABlAG8ASgBTAFYAZQByAHMAaQBvAG4AIAAxAC4AMABWAGkAZABlAG8ASgBTAEcAZQBuAGUAcgBhAHQAZQBkACAAYgB5ACAAcwB2AGcAMgB0AHQAZgAgAGYAcgBvAG0AIABGAG8AbgB0AGUAbABsAG8AIABwAHIAbwBqAGUAYwB0AC4AaAB0AHQAcAA6AC8ALwBmAG8AbgB0AGUAbABsAG8ALgBjAG8AbQAAAAIAAAAAAAAAEQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIQECAQMBBAEFAQYBBwEIAQkBCgELAQwBDQEOAQ8BEAERARIBEwEUARUBFgEXARgBGQEaARsBHAEdAR4BHwEgASEBIgAEcGxheQtwbGF5LWNpcmNsZQVwYXVzZQt2b2x1bWUtbXV0ZQp2b2x1bWUtbG93CnZvbHVtZS1taWQLdm9sdW1lLWhpZ2gQZnVsbHNjcmVlbi1lbnRlcg9mdWxsc2NyZWVuLWV4aXQGc3F1YXJlB3NwaW5uZXIJc3VidGl0bGVzCGNhcHRpb25zCGNoYXB0ZXJzBXNoYXJlA2NvZwZjaXJjbGUOY2lyY2xlLW91dGxpbmUTY2lyY2xlLWlubmVyLWNpcmNsZQJoZAZjYW5jZWwGcmVwbGF5CGZhY2Vib29rBWdwbHVzCGxpbmtlZGluB3R3aXR0ZXIGdHVtYmxyCXBpbnRlcmVzdBFhdWRpby1kZXNjcmlwdGlvbgVhdWRpbwluZXh0LWl0ZW0NcHJldmlvdXMtaXRlbQAAAAA=) format("truetype");font-weight:400;font-style:normal}.video-js .vjs-big-play-button .vjs-icon-placeholder:before,.video-js .vjs-play-control .vjs-icon-placeholder,.vjs-icon-play{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-big-play-button .vjs-icon-placeholder:before,.video-js .vjs-play-control .vjs-icon-placeholder:before,.vjs-icon-play:before{content:"\\F101"}.vjs-icon-play-circle{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-play-circle:before{content:"\\F102"}.video-js .vjs-play-control.vjs-playing .vjs-icon-placeholder,.vjs-icon-pause{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-play-control.vjs-playing .vjs-icon-placeholder:before,.vjs-icon-pause:before{content:"\\F103"}.video-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder,.vjs-icon-volume-mute{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder:before,.vjs-icon-volume-mute:before{content:"\\F104"}.video-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder,.vjs-icon-volume-low{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder:before,.vjs-icon-volume-low:before{content:"\\F105"}.video-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder,.vjs-icon-volume-mid{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder:before,.vjs-icon-volume-mid:before{content:"\\F106"}.video-js .vjs-mute-control .vjs-icon-placeholder,.vjs-icon-volume-high{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-mute-control .vjs-icon-placeholder:before,.vjs-icon-volume-high:before{content:"\\F107"}.video-js .vjs-fullscreen-control .vjs-icon-placeholder,.vjs-icon-fullscreen-enter{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-fullscreen-control .vjs-icon-placeholder:before,.vjs-icon-fullscreen-enter:before{content:"\\F108"}.video-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder,.vjs-icon-fullscreen-exit{font-family:VideoJS;font-weight:400;font-style:normal}.video-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder:before,.vjs-icon-fullscreen-exit:before{content:"\\F109"}.vjs-icon-square{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-square:before{content:"\\F10A"}.vjs-icon-spinner{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-spinner:before{content:"\\F10B"}.video-js .vjs-subs-caps-button .vjs-icon-placeholder,.video-js .vjs-subtitles-button .vjs-icon-placeholder,.video-js.video-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder,.video-js.video-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder,.video-js.video-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder,.video-js.video-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder,.vjs-icon-subtitles{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-subs-caps-button .vjs-icon-placeholder:before,.video-js .vjs-subtitles-button .vjs-icon-placeholder:before,.video-js.video-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder:before,.video-js.video-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder:before,.video-js.video-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder:before,.video-js.video-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder:before,.vjs-icon-subtitles:before{content:"\\F10C"}.video-js .vjs-captions-button .vjs-icon-placeholder,.video-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder,.video-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder,.vjs-icon-captions{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-captions-button .vjs-icon-placeholder:before,.video-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder:before,.video-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder:before,.vjs-icon-captions:before{content:"\\F10D"}.video-js .vjs-chapters-button .vjs-icon-placeholder,.vjs-icon-chapters{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-chapters-button .vjs-icon-placeholder:before,.vjs-icon-chapters:before{content:"\\F10E"}.vjs-icon-share{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-share:before{content:"\\F10F"}.vjs-icon-cog{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-cog:before{content:"\\F110"}.video-js .vjs-play-progress,.video-js .vjs-volume-level,.vjs-icon-circle{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-play-progress:before,.video-js .vjs-volume-level:before,.vjs-icon-circle:before{content:"\\F111"}.vjs-icon-circle-outline{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-circle-outline:before{content:"\\F112"}.vjs-icon-circle-inner-circle{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-circle-inner-circle:before{content:"\\F113"}.vjs-icon-hd{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-hd:before{content:"\\F114"}.video-js .vjs-control.vjs-close-button .vjs-icon-placeholder,.vjs-icon-cancel{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-control.vjs-close-button .vjs-icon-placeholder:before,.vjs-icon-cancel:before{content:"\\F115"}.video-js .vjs-play-control.vjs-ended .vjs-icon-placeholder,.vjs-icon-replay{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-play-control.vjs-ended .vjs-icon-placeholder:before,.vjs-icon-replay:before{content:"\\F116"}.vjs-icon-facebook{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-facebook:before{content:"\\F117"}.vjs-icon-gplus{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-gplus:before{content:"\\F118"}.vjs-icon-linkedin{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-linkedin:before{content:"\\F119"}.vjs-icon-twitter{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-twitter:before{content:"\\F11A"}.vjs-icon-tumblr{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-tumblr:before{content:"\\F11B"}.vjs-icon-pinterest{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-pinterest:before{content:"\\F11C"}.video-js .vjs-descriptions-button .vjs-icon-placeholder,.vjs-icon-audio-description{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-descriptions-button .vjs-icon-placeholder:before,.vjs-icon-audio-description:before{content:"\\F11D"}.video-js .vjs-audio-button .vjs-icon-placeholder,.vjs-icon-audio{font-family:VideoJS;font-weight:400;font-style:normal}.video-js .vjs-audio-button .vjs-icon-placeholder:before,.vjs-icon-audio:before{content:"\\F11E"}.vjs-icon-next-item{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-next-item:before{content:"\\F11F"}.vjs-icon-previous-item{font-family:VideoJS;font-weight:400;font-style:normal}.vjs-icon-previous-item:before{content:"\\F120"}.video-js{display:block;vertical-align:top;box-sizing:border-box;color:#fff;background-color:#000;position:relative;padding:0;font-size:10px;line-height:1;font-weight:400;font-style:normal;font-family:Arial,Helvetica,sans-serif}.video-js:-moz-full-screen{position:absolute}.video-js:-webkit-full-screen{width:100%!important;height:100%!important}.video-js[tabindex="-1"]{outline:0}.video-js *,.video-js :after,.video-js :before{box-sizing:inherit}.video-js ul{font-family:inherit;font-size:inherit;line-height:inherit;list-style-position:outside;margin-left:0;margin-right:0;margin-top:0;margin-bottom:0}.video-js.vjs-16-9,.video-js.vjs-4-3,.video-js.vjs-fluid{width:100%;max-width:100%;height:0}.video-js.vjs-16-9{padding-top:56.25%}.video-js.vjs-4-3{padding-top:75%}.video-js.vjs-fill{width:100%;height:100%}.video-js .vjs-tech{position:absolute;top:0;left:0;width:100%;height:100%}body.vjs-full-window{padding:0;margin:0;height:100%;overflow-y:auto}.vjs-full-window .video-js.vjs-fullscreen{position:fixed;overflow:hidden;z-index:1000;left:0;top:0;bottom:0;right:0}.video-js.vjs-fullscreen{width:100%!important;height:100%!important;padding-top:0!important}.video-js.vjs-fullscreen.vjs-user-inactive{cursor:none}.vjs-hidden{display:none!important}.vjs-disabled{opacity:.5;cursor:default}.video-js .vjs-offscreen{height:1px;left:-9999px;position:absolute;top:0;width:1px}.vjs-lock-showing{display:block!important;opacity:1;visibility:visible}.vjs-no-js{padding:20px;color:#fff;background-color:#000;font-size:18px;font-family:Arial,Helvetica,sans-serif;text-align:center;width:300px;height:150px;margin:0 auto}.vjs-no-js a,.vjs-no-js a:visited{color:#66a8cc}.video-js .vjs-big-play-button{font-size:3em;line-height:1.5em;height:1.5em;width:3em;display:block;position:absolute;top:10px;left:10px;padding:0;cursor:pointer;opacity:1;border:.06666em solid #fff;background-color:#2b333f;background-color:rgba(43,51,63,.7);-webkit-border-radius:.3em;-moz-border-radius:.3em;border-radius:.3em;-webkit-transition:all .4s;-moz-transition:all .4s;-ms-transition:all .4s;-o-transition:all .4s;transition:all .4s}.vjs-big-play-centered .vjs-big-play-button{top:50%;left:50%;margin-top:-.75em;margin-left:-1.5em}.video-js .vjs-big-play-button:focus,.video-js:hover .vjs-big-play-button{border-color:#fff;background-color:#73859f;background-color:rgba(115,133,159,.5);-webkit-transition:all 0s;-moz-transition:all 0s;-ms-transition:all 0s;-o-transition:all 0s;transition:all 0s}.vjs-controls-disabled .vjs-big-play-button,.vjs-error .vjs-big-play-button,.vjs-has-started .vjs-big-play-button,.vjs-using-native-controls .vjs-big-play-button{display:none}.vjs-has-started.vjs-paused.vjs-show-big-play-button-on-pause .vjs-big-play-button{display:block}.video-js button{background:0 0;border:none;color:inherit;display:inline-block;overflow:visible;font-size:inherit;line-height:inherit;text-transform:none;text-decoration:none;transition:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.vjs-control .vjs-button{width:100%;height:100%}.video-js .vjs-control.vjs-close-button{cursor:pointer;height:3em;position:absolute;right:0;top:.5em;z-index:2}.video-js .vjs-modal-dialog{background:rgba(0,0,0,.8);background:-webkit-linear-gradient(-90deg,rgba(0,0,0,.8),rgba(255,255,255,0));background:linear-gradient(180deg,rgba(0,0,0,.8),rgba(255,255,255,0));overflow:auto;box-sizing:content-box}.video-js .vjs-modal-dialog>*{box-sizing:border-box}.vjs-modal-dialog .vjs-modal-dialog-content{font-size:1.2em;line-height:1.5;padding:20px 24px;z-index:1}.vjs-menu-button{cursor:pointer}.vjs-menu-button.vjs-disabled{cursor:default}.vjs-workinghover .vjs-menu-button.vjs-disabled:hover .vjs-menu{display:none}.vjs-menu .vjs-menu-content{display:block;padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;overflow:auto;box-sizing:content-box}.vjs-menu .vjs-menu-content>*{box-sizing:border-box}.vjs-scrubbing .vjs-menu-button:hover .vjs-menu{display:none}.vjs-menu li{list-style:none;margin:0;padding:.2em 0;line-height:1.4em;font-size:1.2em;text-align:center;text-transform:lowercase}.vjs-menu li.vjs-menu-item:focus,.vjs-menu li.vjs-menu-item:hover{background-color:#73859f;background-color:rgba(115,133,159,.5)}.vjs-menu li.vjs-selected,.vjs-menu li.vjs-selected:focus,.vjs-menu li.vjs-selected:hover{background-color:#fff;color:#2b333f}.vjs-menu li.vjs-menu-title{text-align:center;text-transform:uppercase;font-size:1em;line-height:2em;padding:0;margin:0 0 .3em 0;font-weight:700;cursor:default}.vjs-menu-button-popup .vjs-menu{display:none;position:absolute;bottom:0;width:10em;left:-3em;height:0;margin-bottom:1.5em;border-top-color:rgba(43,51,63,.7)}.vjs-menu-button-popup .vjs-menu .vjs-menu-content{background-color:#2b333f;background-color:rgba(43,51,63,.7);position:absolute;width:100%;bottom:1.5em;max-height:15em}.vjs-menu-button-popup .vjs-menu.vjs-lock-showing,.vjs-workinghover .vjs-menu-button-popup:hover .vjs-menu{display:block}.video-js .vjs-menu-button-inline{-webkit-transition:all .4s;-moz-transition:all .4s;-ms-transition:all .4s;-o-transition:all .4s;transition:all .4s;overflow:hidden}.video-js .vjs-menu-button-inline:before{width:2.222222222em}.video-js .vjs-menu-button-inline.vjs-slider-active,.video-js .vjs-menu-button-inline:focus,.video-js .vjs-menu-button-inline:hover,.video-js.vjs-no-flex .vjs-menu-button-inline{width:12em}.vjs-menu-button-inline .vjs-menu{opacity:0;height:100%;width:auto;position:absolute;left:4em;top:0;padding:0;margin:0;-webkit-transition:all .4s;-moz-transition:all .4s;-ms-transition:all .4s;-o-transition:all .4s;transition:all .4s}.vjs-menu-button-inline.vjs-slider-active .vjs-menu,.vjs-menu-button-inline:focus .vjs-menu,.vjs-menu-button-inline:hover .vjs-menu{display:block;opacity:1}.vjs-no-flex .vjs-menu-button-inline .vjs-menu{display:block;opacity:1;position:relative;width:auto}.vjs-no-flex .vjs-menu-button-inline.vjs-slider-active .vjs-menu,.vjs-no-flex .vjs-menu-button-inline:focus .vjs-menu,.vjs-no-flex .vjs-menu-button-inline:hover .vjs-menu{width:auto}.vjs-menu-button-inline .vjs-menu-content{width:auto;height:100%;margin:0;overflow:hidden}.video-js .vjs-control-bar{display:none;width:100%;position:absolute;bottom:0;left:0;right:0;height:3em;background-color:#2b333f;background-color:rgba(43,51,63,.7)}.vjs-has-started .vjs-control-bar{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;visibility:visible;opacity:1;-webkit-transition:visibility .1s,opacity .1s;-moz-transition:visibility .1s,opacity .1s;-ms-transition:visibility .1s,opacity .1s;-o-transition:visibility .1s,opacity .1s;transition:visibility .1s,opacity .1s}.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar{visibility:visible;opacity:0;-webkit-transition:visibility 1s,opacity 1s;-moz-transition:visibility 1s,opacity 1s;-ms-transition:visibility 1s,opacity 1s;-o-transition:visibility 1s,opacity 1s;transition:visibility 1s,opacity 1s}.vjs-controls-disabled .vjs-control-bar,.vjs-error .vjs-control-bar,.vjs-using-native-controls .vjs-control-bar{display:none!important}.vjs-audio.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar{opacity:1;visibility:visible}.vjs-has-started.vjs-no-flex .vjs-control-bar{display:table}.video-js .vjs-control{position:relative;text-align:center;margin:0;padding:0;height:100%;width:4em;-webkit-box-flex:none;-moz-box-flex:none;-webkit-flex:none;-ms-flex:none;flex:none}.vjs-button>.vjs-icon-placeholder:before{font-size:1.8em;line-height:1.67}.video-js .vjs-control:focus,.video-js .vjs-control:focus:before,.video-js .vjs-control:hover:before{text-shadow:0 0 1em #fff}.video-js .vjs-control-text{border:0;clip:rect(0 0 0 0);height:1px;overflow:hidden;padding:0;position:absolute;width:1px}.vjs-no-flex .vjs-control{display:table-cell;vertical-align:middle}.video-js .vjs-custom-control-spacer{display:none}.video-js .vjs-progress-control{cursor:pointer;-webkit-box-flex:auto;-moz-box-flex:auto;-webkit-flex:auto;-ms-flex:auto;flex:auto;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;min-width:4em}.video-js .vjs-progress-control.disabled{cursor:default}.vjs-live .vjs-progress-control{display:none}.vjs-no-flex .vjs-progress-control{width:auto}.video-js .vjs-progress-holder{-webkit-box-flex:auto;-moz-box-flex:auto;-webkit-flex:auto;-ms-flex:auto;flex:auto;-webkit-transition:all .2s;-moz-transition:all .2s;-ms-transition:all .2s;-o-transition:all .2s;transition:all .2s;height:.3em}.video-js .vjs-progress-control .vjs-progress-holder{margin:0 10px}.video-js .vjs-progress-control:hover .vjs-progress-holder{font-size:1.666666666666666666em}.video-js .vjs-progress-control:hover .vjs-progress-holder.disabled{font-size:1em}.video-js .vjs-progress-holder .vjs-load-progress,.video-js .vjs-progress-holder .vjs-load-progress div,.video-js .vjs-progress-holder .vjs-play-progress{position:absolute;display:block;height:100%;margin:0;padding:0;width:0;left:0;top:0}.video-js .vjs-play-progress{background-color:#fff}.video-js .vjs-play-progress:before{font-size:.9em;position:absolute;right:-.5em;top:-.333333333333333em;z-index:1}.video-js .vjs-load-progress{background:#bfc7d3;background:rgba(115,133,159,.5)}.video-js .vjs-load-progress div{background:#fff;background:rgba(115,133,159,.75)}.video-js .vjs-time-tooltip{background-color:#fff;background-color:rgba(255,255,255,.8);-webkit-border-radius:.3em;-moz-border-radius:.3em;border-radius:.3em;color:#000;float:right;font-family:Arial,Helvetica,sans-serif;font-size:1em;padding:6px 8px 8px 8px;pointer-events:none;position:relative;top:-3.4em;visibility:hidden;z-index:1}.video-js .vjs-progress-holder:focus .vjs-time-tooltip{display:none}.video-js .vjs-progress-control:hover .vjs-progress-holder:focus .vjs-time-tooltip,.video-js .vjs-progress-control:hover .vjs-time-tooltip{display:block;font-size:.6em;visibility:visible}.video-js .vjs-progress-control.disabled:hover .vjs-time-tooltip{font-size:1em}.video-js .vjs-progress-control .vjs-mouse-display{display:none;position:absolute;width:1px;height:100%;background-color:#000;z-index:1}.vjs-no-flex .vjs-progress-control .vjs-mouse-display{z-index:0}.video-js .vjs-progress-control:hover .vjs-mouse-display{display:block}.video-js.vjs-user-inactive .vjs-progress-control .vjs-mouse-display{visibility:hidden;opacity:0;-webkit-transition:visibility 1s,opacity 1s;-moz-transition:visibility 1s,opacity 1s;-ms-transition:visibility 1s,opacity 1s;-o-transition:visibility 1s,opacity 1s;transition:visibility 1s,opacity 1s}.video-js.vjs-user-inactive.vjs-no-flex .vjs-progress-control .vjs-mouse-display{display:none}.vjs-mouse-display .vjs-time-tooltip{color:#fff;background-color:#000;background-color:rgba(0,0,0,.8)}.video-js .vjs-slider{position:relative;cursor:pointer;padding:0;margin:0 .45em 0 .45em;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:#73859f;background-color:rgba(115,133,159,.5)}.video-js .vjs-slider.disabled{cursor:default}.video-js .vjs-slider:focus{text-shadow:0 0 1em #fff;-webkit-box-shadow:0 0 1em #fff;-moz-box-shadow:0 0 1em #fff;box-shadow:0 0 1em #fff}.video-js .vjs-mute-control{cursor:pointer;-webkit-box-flex:none;-moz-box-flex:none;-webkit-flex:none;-ms-flex:none;flex:none;padding-left:2em;padding-right:2em;padding-bottom:3em}.video-js .vjs-volume-control{cursor:pointer;margin-right:1em;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.video-js .vjs-volume-control.vjs-volume-horizontal{width:5em}.video-js .vjs-volume-panel .vjs-volume-control{visibility:visible;opacity:0;width:1px;height:1px;margin-left:-1px}.video-js .vjs-volume-panel{-webkit-transition:width 1s;-moz-transition:width 1s;-ms-transition:width 1s;-o-transition:width 1s;transition:width 1s}.video-js .vjs-volume-panel .vjs-mute-control:active~.vjs-volume-control,.video-js .vjs-volume-panel .vjs-mute-control:focus~.vjs-volume-control,.video-js .vjs-volume-panel .vjs-mute-control:hover~.vjs-volume-control,.video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active,.video-js .vjs-volume-panel .vjs-volume-control:active,.video-js .vjs-volume-panel .vjs-volume-control:focus,.video-js .vjs-volume-panel .vjs-volume-control:hover,.video-js .vjs-volume-panel:active .vjs-volume-control,.video-js .vjs-volume-panel:focus .vjs-volume-control,.video-js .vjs-volume-panel:hover .vjs-volume-control{visibility:visible;opacity:1;position:relative;-webkit-transition:visibility .1s,opacity .1s,height .1s,width .1s,left 0s,top 0s;-moz-transition:visibility .1s,opacity .1s,height .1s,width .1s,left 0s,top 0s;-ms-transition:visibility .1s,opacity .1s,height .1s,width .1s,left 0s,top 0s;-o-transition:visibility .1s,opacity .1s,height .1s,width .1s,left 0s,top 0s;transition:visibility .1s,opacity .1s,height .1s,width .1s,left 0s,top 0s}.video-js .vjs-volume-panel .vjs-mute-control:active~.vjs-volume-control.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-mute-control:focus~.vjs-volume-control.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-mute-control:hover~.vjs-volume-control.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-volume-control:focus.vjs-volume-horizontal,.video-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-horizontal,.video-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-horizontal,.video-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-horizontal,.video-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-horizontal{width:5em;height:3em}.video-js .vjs-volume-panel.vjs-volume-panel-horizontal.vjs-slider-active,.video-js .vjs-volume-panel.vjs-volume-panel-horizontal:active,.video-js .vjs-volume-panel.vjs-volume-panel-horizontal:focus,.video-js .vjs-volume-panel.vjs-volume-panel-horizontal:hover{width:9em;-webkit-transition:width .1s;-moz-transition:width .1s;-ms-transition:width .1s;-o-transition:width .1s;transition:width .1s}.video-js .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical{height:8em;width:3em;left:-3.5em;-webkit-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s 1s,left 1s 1s,top 1s 1s;-moz-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s 1s,left 1s 1s,top 1s 1s;-ms-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s 1s,left 1s 1s,top 1s 1s;-o-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s 1s,left 1s 1s,top 1s 1s;transition:visibility 1s,opacity 1s,height 1s 1s,width 1s 1s,left 1s 1s,top 1s 1s}.video-js .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal{-webkit-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s,left 1s 1s,top 1s 1s;-moz-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s,left 1s 1s,top 1s 1s;-ms-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s,left 1s 1s,top 1s 1s;-o-transition:visibility 1s,opacity 1s,height 1s 1s,width 1s,left 1s 1s,top 1s 1s;transition:visibility 1s,opacity 1s,height 1s 1s,width 1s,left 1s 1s,top 1s 1s}.video-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal{width:5em;height:3em;visibility:visible;opacity:1;position:relative;-webkit-transition:none;-moz-transition:none;-ms-transition:none;-o-transition:none;transition:none}.video-js.vjs-no-flex .vjs-volume-control.vjs-volume-vertical,.video-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical{position:absolute;bottom:3em;left:.5em}.video-js .vjs-volume-panel{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.video-js .vjs-volume-bar{margin:1.35em .45em}.vjs-volume-bar.vjs-slider-horizontal{width:5em;height:.3em}.vjs-volume-bar.vjs-slider-vertical{width:.3em;height:5em;margin:1.35em auto}.video-js .vjs-volume-level{position:absolute;bottom:0;left:0;background-color:#fff}.video-js .vjs-volume-level:before{position:absolute;font-size:.9em}.vjs-slider-vertical .vjs-volume-level{width:.3em}.vjs-slider-vertical .vjs-volume-level:before{top:-.5em;left:-.3em}.vjs-slider-horizontal .vjs-volume-level{height:.3em}.vjs-slider-horizontal .vjs-volume-level:before{top:-.3em;right:-.5em}.video-js .vjs-volume-panel.vjs-volume-panel-vertical{width:4em}.vjs-volume-bar.vjs-slider-vertical .vjs-volume-level{height:100%}.vjs-volume-bar.vjs-slider-horizontal .vjs-volume-level{width:100%}.video-js .vjs-volume-vertical{width:3em;height:8em;bottom:8em;background-color:#2b333f;background-color:rgba(43,51,63,.7)}.video-js .vjs-volume-horizontal .vjs-menu{left:-2em}.vjs-poster{display:inline-block;vertical-align:middle;background-repeat:no-repeat;background-position:50% 50%;background-size:contain;background-color:#000;cursor:pointer;margin:0;padding:0;position:absolute;top:0;right:0;bottom:0;left:0;height:100%}.vjs-poster img{display:block;vertical-align:middle;margin:0 auto;max-height:100%;padding:0;width:100%}.vjs-has-started .vjs-poster{display:none}.vjs-audio.vjs-has-started .vjs-poster{display:block}.vjs-using-native-controls .vjs-poster{display:none}.video-js .vjs-live-control{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:flex-start;-webkit-align-items:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-flex:auto;-moz-box-flex:auto;-webkit-flex:auto;-ms-flex:auto;flex:auto;font-size:1em;line-height:3em}.vjs-no-flex .vjs-live-control{display:table-cell;width:auto;text-align:left}.video-js .vjs-time-control{-webkit-box-flex:none;-moz-box-flex:none;-webkit-flex:none;-ms-flex:none;flex:none;font-size:1em;line-height:3em;min-width:2em;width:auto;padding-left:1em;padding-right:1em}.vjs-live .vjs-time-control{display:none}.video-js .vjs-current-time,.vjs-no-flex .vjs-current-time{display:none}.vjs-no-flex .vjs-remaining-time.vjs-time-control.vjs-control{width:0!important;white-space:nowrap}.video-js .vjs-duration,.vjs-no-flex .vjs-duration{display:none}.vjs-time-divider{display:none;line-height:3em}.vjs-live .vjs-time-divider{display:none}.video-js .vjs-play-control .vjs-icon-placeholder{cursor:pointer;-webkit-box-flex:none;-moz-box-flex:none;-webkit-flex:none;-ms-flex:none;flex:none}.vjs-text-track-display{position:absolute;bottom:3em;left:0;right:0;top:0;pointer-events:none}.video-js.vjs-user-inactive.vjs-playing .vjs-text-track-display{bottom:1em}.video-js .vjs-text-track{font-size:1.4em;text-align:center;margin-bottom:.1em;background-color:#000;background-color:rgba(0,0,0,.5)}.vjs-subtitles{color:#fff}.vjs-captions{color:#fc6}.vjs-tt-cue{display:block}video::-webkit-media-text-track-display{-moz-transform:translateY(-3em);-ms-transform:translateY(-3em);-o-transform:translateY(-3em);-webkit-transform:translateY(-3em);transform:translateY(-3em)}.video-js.vjs-user-inactive.vjs-playing video::-webkit-media-text-track-display{-moz-transform:translateY(-1.5em);-ms-transform:translateY(-1.5em);-o-transform:translateY(-1.5em);-webkit-transform:translateY(-1.5em);transform:translateY(-1.5em)}.video-js .vjs-fullscreen-control{cursor:pointer;-webkit-box-flex:none;-moz-box-flex:none;-webkit-flex:none;-ms-flex:none;flex:none}.vjs-playback-rate .vjs-playback-rate-value,.vjs-playback-rate>.vjs-menu-button{position:absolute;top:0;left:0;width:100%;height:100%}.vjs-playback-rate .vjs-playback-rate-value{pointer-events:none;font-size:1.5em;line-height:2;text-align:center}.vjs-playback-rate .vjs-menu{width:4em;left:0}.vjs-error .vjs-error-display .vjs-modal-dialog-content{font-size:1.4em;text-align:center}.vjs-error .vjs-error-display:before{color:#fff;content:\'X\';font-family:Arial,Helvetica,sans-serif;font-size:4em;left:0;line-height:1;margin-top:-.5em;position:absolute;text-shadow:.05em .05em .1em #000;text-align:center;top:50%;vertical-align:middle;width:100%}.vjs-loading-spinner{display:none;position:absolute;top:50%;left:50%;margin:-25px 0 0 -25px;opacity:.85;text-align:left;border:6px solid rgba(43,51,63,.7);box-sizing:border-box;background-clip:padding-box;width:50px;height:50px;border-radius:25px;visibility:hidden}.vjs-seeking .vjs-loading-spinner,.vjs-waiting .vjs-loading-spinner{display:block;animation:0s linear .3s forwards vjs-spinner-show}.vjs-loading-spinner:after,.vjs-loading-spinner:before{content:"";position:absolute;margin:-6px;box-sizing:inherit;width:inherit;height:inherit;border-radius:inherit;opacity:1;border:inherit;border-color:transparent;border-top-color:#fff}.vjs-seeking .vjs-loading-spinner:after,.vjs-seeking .vjs-loading-spinner:before,.vjs-waiting .vjs-loading-spinner:after,.vjs-waiting .vjs-loading-spinner:before{-webkit-animation:vjs-spinner-spin 1.1s cubic-bezier(.6,.2,0,.8) infinite,vjs-spinner-fade 1.1s linear infinite;animation:vjs-spinner-spin 1.1s cubic-bezier(.6,.2,0,.8) infinite,vjs-spinner-fade 1.1s linear infinite}.vjs-seeking .vjs-loading-spinner:before,.vjs-waiting .vjs-loading-spinner:before{border-top-color:#fff}.vjs-seeking .vjs-loading-spinner:after,.vjs-waiting .vjs-loading-spinner:after{border-top-color:#fff;-webkit-animation-delay:.44s;animation-delay:.44s}@keyframes vjs-spinner-show{to{visibility:visible}}@-webkit-keyframes vjs-spinner-show{to{visibility:visible}}@keyframes vjs-spinner-spin{100%{transform:rotate(360deg)}}@-webkit-keyframes vjs-spinner-spin{100%{-webkit-transform:rotate(360deg)}}@keyframes vjs-spinner-fade{0%{border-top-color:#73859f}20%{border-top-color:#73859f}35%{border-top-color:#fff}60%{border-top-color:#73859f}100%{border-top-color:#73859f}}@-webkit-keyframes vjs-spinner-fade{0%{border-top-color:#73859f}20%{border-top-color:#73859f}35%{border-top-color:#fff}60%{border-top-color:#73859f}100%{border-top-color:#73859f}}.vjs-chapters-button .vjs-menu ul{width:24em}.video-js .vjs-subs-caps-button+.vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder{position:absolute}.video-js .vjs-subs-caps-button+.vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder:before{font-family:VideoJS;content:"\\F10D";font-size:1.5em;line-height:inherit}.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-custom-control-spacer{-webkit-box-flex:auto;-moz-box-flex:auto;-webkit-flex:auto;-ms-flex:auto;flex:auto}.video-js.vjs-layout-tiny:not(.vjs-fullscreen).vjs-no-flex .vjs-custom-control-spacer{width:auto}.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-audio-button,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-captions-button,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-chapters-button,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-current-time,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-descriptions-button,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-duration,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-mute-control,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-playback-rate,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-progress-control,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-remaining-time,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-subtitles-button,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-time-divider,.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-volume-control{display:none}.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-audio-button,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-captions-button,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-chapters-button,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-current-time,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-descriptions-button,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-duration,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-mute-control,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-playback-rate,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-remaining-time,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-subtitles-button,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-time-divider,.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-volume-control{display:none}.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-captions-button,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-chapters-button,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-current-time,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-descriptions-button,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-duration,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-mute-control,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-playback-rate,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-remaining-time,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-subtitles-button .vjs-audio-button,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-time-divider,.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-volume-control{display:none}.vjs-modal-dialog.vjs-text-track-settings{background-color:#2b333f;background-color:rgba(43,51,63,.75);color:#fff;height:70%}.vjs-text-track-settings .vjs-modal-dialog-content{display:table}.vjs-text-track-settings .vjs-track-settings-colors,.vjs-text-track-settings .vjs-track-settings-controls,.vjs-text-track-settings .vjs-track-settings-font{display:table-cell}.vjs-text-track-settings .vjs-track-settings-controls{text-align:right;vertical-align:bottom}.vjs-text-track-settings fieldset{margin:5px;padding:3px;border:none}.vjs-text-track-settings fieldset span{display:inline-block;margin-left:5px}.vjs-text-track-settings legend{color:#fff;margin:0 0 5px 0}.vjs-text-track-settings .vjs-label{position:absolute;clip:rect(1px 1px 1px 1px);clip:rect(1px,1px,1px,1px);display:block;margin:0 0 5px 0;padding:0;border:0;height:1px;width:1px;overflow:hidden}.vjs-track-settings-controls button:active,.vjs-track-settings-controls button:focus{outline-style:solid;outline-width:medium;background-image:linear-gradient(0deg,#fff 88%,#73859f 100%)}.vjs-track-settings-controls button:hover{color:rgba(43,51,63,.75)}.vjs-track-settings-controls button{background-color:#fff;background-image:linear-gradient(-180deg,#fff 88%,#73859f 100%);color:#2b333f;cursor:pointer;border-radius:2px}.vjs-track-settings-controls .vjs-default-button{margin-right:1em}@media print{.video-js>:not(.vjs-tech):not(.vjs-poster){visibility:hidden}}@media \\0screen{.vjs-user-inactive.vjs-playing .vjs-control-bar :before{content:""}}@media \\0screen{.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar{visibility:hidden}}', ""])
    },
    65 : function(e, t, n) {
        "use strict";
        n.d(t, "a",
        function() {
            return i
        });
        var i = {
            SET_INDEX_DATA: "SET_INDEX_DATA"
        }; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && __REACT_HOT_LOADER__.register(i, "ACTION_TYPES", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/constants/index.js")
        } ()
    },
    698 : function(e, t, n) {
        var i = n(567);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    700 : function(e, t, n) {
        var i = n(569);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    701 : function(e, t, n) {
        var i = n(570);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    71 : function(e, t, n) {
        "use strict";
        function i() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : s,
            t = arguments[1];
            switch (t.type) {
            case r.a.SET_INDEX_DATA:
                return Object.assign({},
                e, t.indexData);
            default:
                return e
            }
        }
        var o = n(28),
        r = n(65),
        s = {
            datePickerBirth: "",
            datePickerBirthTradition: "",
            datePickerDisplay: 0,
            mode: 0,
            datePickerTimeConfirm: 1,
            datePickerBirthFormat: "",
            birthTimeValue: "时辰未知",
            birthTimeDataId: 0,
            birthTimeDataValue: -1,
            loadingFlag: !1,
            loadingText: "",
            canClick: !0,
            tipFlag: !1,
            tipText: "",
            m_data: {},
            lang: void 0
        },
        a = n.i(o.c)({
            indexData: i
        });
        t.a = a; !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && (__REACT_HOT_LOADER__.register(s, ""))
        } ()
    },
    724 : function(e, t, n) {
        var i = n(593);
        "string" == typeof i && (i = [[e.i, i, ""]]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
        e.exports = "data:application/vnd.ms-fontobject;base64,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dHRwOi8vZm9udGVsbG8uY29tAFYAaQBkAGUAbwBKAFMAUgBlAGcAdQBsAGEAcgBWAGkAZABlAG8ASgBTAFYAaQBkAGUAbwBKAFMAVgBlAHIAcwBpAG8AbgAgADEALgAwAFYAaQBkAGUAbwBKAFMARwBlAG4AZQByAGEAdABlAGQAIABiAHkAIABzAHYAZwAyAHQAdABmACAAZgByAG8AbQAgAEYAbwBuAHQAZQBsAGwAbwAgAHAAcgBvAGoAZQBjAHQALgBoAHQAdABwADoALwAvAGYAbwBuAHQAZQBsAGwAbwAuAGMAbwBtAAAAAgAAAAAAAAARAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAhAQIBAwEEAQUBBgEHAQgBCQEKAQsBDAENAQ4BDwEQAREBEgETARQBFQEWARcBGAEZARoBGwEcAR0BHgEfASABIQEiAARwbGF5C3BsYXktY2lyY2xlBXBhdXNlC3ZvbHVtZS1tdXRlCnZvbHVtZS1sb3cKdm9sdW1lLW1pZAt2b2x1bWUtaGlnaBBmdWxsc2NyZWVuLWVudGVyD2Z1bGxzY3JlZW4tZXhpdAZzcXVhcmUHc3Bpbm5lcglzdWJ0aXRsZXMIY2FwdGlvbnMIY2hhcHRlcnMFc2hhcmUDY29nBmNpcmNsZQ5jaXJjbGUtb3V0bGluZRNjaXJjbGUtaW5uZXItY2lyY2xlAmhkBmNhbmNlbAZyZXBsYXkIZmFjZWJvb2sFZ3BsdXMIbGlua2VkaW4HdHdpdHRlcgZ0dW1ibHIJcGludGVyZXN0EWF1ZGlvLWRlc2NyaXB0aW9uBWF1ZGlvCW5leHQtaXRlbQ1wcmV2aW91cy1pdGVtAAAAAA=="
    },
    85 : function(e, t, n) {
        "use strict";
        function i(e) {
            var t = ["365wnl", "51wnl", "91zm", "az51wml", "az51wnl", "brzm", "bwdsfsx", "cwlp", "ggbook", "gzm", "hmkj", "lapwnl", "lbllq", "lcllq", "llmfwf", "milizm", "mxzm", "xzzj", "zhwnl"],
            n = t.some(function(t) {
                return e === t
            }),
            i = /^(sw)/.test(e);
            return n || i
        }
        function o(e) {
            return /^(bd-xxl)/.test(e) || /^(bd-sem)/.test(e) || /^(sm-sem)/.test(e) || /^(sg-sem)/.test(e) || /^(xl-xxl)/.test(e) || /^(qtt-xxl)/.test(e) || /^(bd-1xxl)/.test(e)
        }
        function r(e) {
            return ["swazlhl", "swzhlhl"].some(function(t) {
                return e === t
            })
        }
        function s(e) {
            return ["51wnl", "az51wnl", "swwnlzfa", "swwnlzfb", "zhwnl", "swzhwml", "zhwml", "swzhwnla", "swzhwnlb", "swzhwnlzf"].some(function(t) {
                return e === t
            })
        }
        function a(e) {
            return ["baidusem"].some(function(t) {
                return e === t
            })
        }
        function A(e) {
            return ["swxea", "swdym"].some(function(t) {
                return e === t
            })
        }
        function g(e) {
            if ("swxea" === e) {
                var t = document.createElement("script");
                t.type = "text/javascript",
                t.async = !0,
                t.src = "";
                document.getElementById("statistic-code").appendChild(t)
            }
        }
        function l(e) {
            return ["swazwnys", "swwnys"].some(function(t) {
                return e === t
            })
        }
        function c(e) {
            return ["swmzrl"].some(function(t) {
                return e === t
            })
        }
        function C(e) {
            return ["swxea", "swtsqxnw", "swdym"].some(function(t) {
                return e === t
            })
        }
        function I(e) {
            return ! e || {
                swmmwl: !0,
                swsmxzg: !0,
                zhwnl: !0,
                swzhwml: !0,
                zhwml: !0,
                swzhwnla: !0,
                swzhwnlb: !0,
                swzhwnlaios: !0
            } [e]
        }
        function h(e) {
            return ! e || {
                swmmwl: !0,
                sw1569: !0,
                swqdyj: !0
            } [e]
        }
        function u(e) {
            return ["swmmw9", "swmmw10", "swmmw11"].some(function(t) {
                return e === t
            })
        }
        function d(e) {
            return ! (!/bdth-/.test(e) && !/swxzw/.test(e))
        }
        function p(e) {
            return !! /appzxcs_ios_1372770441/.test(e)
        }
        function f(e) {
            return !! (/bd-/.test(e) || /gdt-/.test(e) || /oppo-/.test(e) || /jrtt-/.test(e))
        }
        function m(e) {
            return !! /jrtt-/.test(e)
        }
        function v(e) {
            return !! /kjyx_app_ios_/.test(e)
        }
        t.a = i,
        t.b = p; !
    },
    95 : function(e, t, n) {
        "use strict";
        function i(e) {
            return {
                type: o.a.SET_INDEX_DATA,
                indexData: e
            }
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        t.setIndexData = i;
        var o = n(65); !
        function() {
            "undefined" != typeof __REACT_HOT_LOADER__ && __REACT_HOT_LOADER__.register(i, "setIndexData", "F:/wamp/www/fe/forecast.linghit.com.frontend/src.frontend/src/bazijingpi/actions/index.js")
        } ()
    },
    96 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(2),
        g = n.n(A),
        l = n(12),
        c = n.n(l),
        C = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        I = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.props = e,
                n.state = {
                    timestamp: n.props.timestamp ? n.props.timestamp: ""
                },
                n
            }
            return r(t, e),
            C(t, [{
                key: "render",
                value: function() {
                    return a.a.createElement("li", null, a.a.createElement("a", {
                        href: this.props.items.link
                    },
                    a.a.createElement("span", {
                        className: "icon"
                    },
                    a.a.createElement("img", {
                        src: this.props.items.icon + this.state.timestamp,
                        alt: this.props.items.title
                    })), a.a.createElement("p", null, this.props.items.title)))
                }
            }]),
            t
        } (s.Component),
        h = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.props = e,
                n.state = {
                    channel: g.a.getItem("_channel"),
                    items: [],
                    className: "site-menu"
                },
                n
            }
            return r(t, e),
            C(t, [{
                key: "setMenuDataToLocalStorage",
                value: function(e) {
                    if (localStorage) {
                        var t = (new Date).getTime();
                        localStorage.setItem("menu_data", JSON.stringify(e)),
                        localStorage.setItem("menu_last_time", t + "")
                    }
                }
            },
            {
                key: "whetherGetMenuDataFromLocalStorage",
                value: function() {
                    var e, t, n, i;
                    return localStorage ? (e = localStorage.getItem("menu_last_time") || (new Date).getTime(), t = (new Date).getTime(), n = !(t - e > 36e5), i = localStorage.getItem("menu_data"), i && "string" == typeof i && i.length > 0 ? i = JSON.parse(i) : n = !1) : n = !1,
                    {
                        flag: n,
                        menuData: i
                    }
                }
            },
            {
                key: "getDataFromServer",
                value: function() {
                    var e = this,
                    t = {};
                    try {
                        t = this.whetherGetMenuDataFromLocalStorage()
                    } catch(e) {
                        t.flag = !1
                    }
                    if (t.flag) return void this.setState({
                        items: t.menuData
                    });
                    c.a.ajax({
                        url: "/api/v1/page/menu.json?channel=" + e.state.channel,
                        type: "get",
                        success: function(t) {
                            if (t && t.length > 0 && !/DOCTYPE/i.test(t) && "[object Array]" == Object.prototype.toString.apply(t)) {
                                e.setState({
                                    items: t
                                });
                                try {
                                    e.setMenuDataToLocalStorage(t)
                                } catch(e) {}
                            }
                        }
                    })
                }
            },
            {
                key: "componentWillMount",
                value: function() {
                    this.getDataFromServer()
                }
            },
            {
                key: "componentWillReceiveProps",
                value: function(e) {
                    var t = this,
                    n = e.toggle,
                    i = this.props.toggle,
                    o = n !== i;
                    n && o ? (document.getElementById("wrapper").style.overflow = "hidden", this.setState({
                        className: "site-menu menu-show menuin"
                    })) : !n && o && (document.getElementById("wrapper").style.overflow = "auto", this.setState({
                        className: "site-menu menuout"
                    }), setTimeout(function() {
                        t.setState({
                            className: "site-menu"
                        })
                    },
                    300))
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this;
                    return a.a.createElement("menu", {
                        className: this.state.className
                    },
                    a.a.createElement("div", {
                        className: "menu-wrapper"
                    },
                    a.a.createElement("ul", {
                        className: "li-left clear"
                    },
                    this.state.items.map(function(t, n) {
                        return a.a.createElement(I, {
                            key: n,
                            items: t,
                            timestamp: e.props.timestamp
                        })
                    }))))
                }
            }]),
            t
        } (s.Component),
        u = h;
        t.a = u; !
    },
    97 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(116),
        g = (n.n(A),
        function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } ()),
        l = function(e) {
            function t() {
                i(this, t);
                var e = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return e.onClose = e.onClose.bind(e),
                e.unlock = e.unlock.bind(e),
                e.popstate = e.popstate.bind(e),
                e.popStatus = !0,
                e.state = {
                    showPop: !1
                },
                e
            }
            return r(t, e),
            g(t, [{
                key: "componentWillUnmount",
                value: function() {
                    window.removeEventListener("popstate", this.popstate, !1)
                }
            },
            {
                key: "componentWillReceiveProps",
                value: function(e) {
                    var t = this;
                    e.index_detain && window.history.pushState && (window.history.state || window.history.pushState({
                        pop: "index"
                    },
                    "", ""), window.addEventListener("load",
                    function() {
                        setTimeout(function() {
                            window.addEventListener("popstate", t.popstate, !1)
                        },
                        1)
                    }))
                }
            },
            {
                key: "popstate",
                value: function() {
                    var e = this.props.channel;
                    navigator.userAgent.match(/(iPod|iPhone|iPad)/) ? (this.popStatus && (this.popStatus = !1, location.replace("https://zx.lingji666.com/quweiceshi/h5more.html?channel=" + e + "&schannel=mllshouyewl")), this.popStatus = !1) : location.replace("https://zx.lingji666.com/quweiceshi/h5more.html?channel=" + e + "&schannel=mllshouyewl")
                }
            },
            {
                key: "onClose",
                value: function() {
                    this.setState({
                        showPop: !1
                    })
                }
            },
            {
                key: "unlock",
            },
            {
                key: "render",
            }]),
            t
        } (s.Component),
        c = l;
        t.a = c; !
    },
    98 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(5),
        g = n(85),
        l = n(2),
        c = n.n(l),
        C = n(96),
        I = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } (),
        h = function(e) {
            function t(e) {
                i(this, t);
                var r = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return r.state = {
                    channel: n.i(A.a)("channel") || c.a.getItem("_channel") || "other",
                    siteMenuToggle: !1
                },
                r
            }
            return r(t, e),
            I(t, [{
                key: "eventBackBtnClickHandle",
                value: function() {
                    window.history.go( - 1)
                }
            },
            {
                key: "eventSiteMenuClickHandle",
                value: function() {
                    var e = this.state.siteMenuToggle;
                    this.setState({
                        siteMenuToggle: !e
                    })
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this.state;
                    return a.a.createElement("div", null, !n.i(g.a)(e.channel) && a.a.createElement("header", {
                        className: "new-header"
                    },
                    a.a.createElement("div", {
                        className: "left",
                        onClick: this.eventBackBtnClickHandle
                    },
                    a.a.createElement("span", {
                        className: "icon-back"
                    })), a.a.createElement("div", {
                        className: "right",
                        onClick: this.eventSiteMenuClickHandle.bind(this)
                    },
                    a.a.createElement("span", {
                        className: "icon-menu"
                    })), a.a.createElement("div", {
                        className: "auto"
                    },
                    a.a.createElement("a", {
                        className: "color1",
                        href: "//touch.lingji666.com/collect?channel=" + this.props.channel
                    },
                    "测算大全"), a.a.createElement("span", {
                        className: "icon-next"
                    }), a.a.createElement("span", null, this.props.forecastName))), a.a.createElement(C.a, {
                        toggle: e.siteMenuToggle
                    }))
                }
            }]),
            t
        } (s.Component),
        u = h;
        t.a = u; !
    },
    99 : function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function o(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function r(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var s = n(1),
        a = n.n(s),
        A = n(5),
        g = n(117),
        l = (n.n(g),
        function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
                }
            }
            return function(t, n, i) {
                return n && e(t.prototype, n),
                i && e(t, i),
                t
            }
        } ()),
        c = function(e) {
            function t(e) {
                i(this, t);
                var n = o(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {
                    fixedBtnDisplayFlag: !1
                },
                n
            }
            return r(t, e),
            l(t, [{
                key: "componentDidMount",
                value: function() {
                    this.wrapperOnScrollHandler(),
                    this.setFixedBtnStyle()
                }
            },
            {
                key: "wrapperOnScrollHandler",
                value: function() {
                    var e = this,
                    t = document.getElementsByTagName("body")[0],
                    i = document.getElementById("wrapper"),
                    o = document.getElementById("index-popupBtn"),
                    r = document.getElementById("fixed-scroll-hook"),
                    s = function() {
                        var n = t.scrollTop ? t: document.documentElement,
                        s = n.scrollTop,
                        a = i.clientWidth,
                        A = void 0,
                        g = r.offsetTop;
                        o.style.width = a + "px",
                        A = s >= g,
                        e.fixedBtnDisplayFlag !== A && (e.fixedBtnDisplayFlag = A, o.style.display = A ? "block": "none")
                    };
                    window.addEventListener ? window.addEventListener("scroll", n.i(A.f)(s, 300), !1) : window.attachEvent && window.attachEvent("onscroll", n.i(A.f)(s, 300))
                }
            },
            {
                key: "setFixedBtnStyle",
                value: function() {
                    if (this.state.fixedBtnDisplayFlag) {
                        var e = document.getElementById("wrapper"),
                        t = e.clientWidth;
                        document.getElementById("pay-popupBtn").style.width = t + "px"
                    }
                }
            },
            {
                key: "goToPayHook",
                value: function() {
                    0 != this.state.activeNavTab ? (this.setState({
                        activeNavTab: 0
                    }), setTimeout(function() {
                        n.i(A.g)("registry-btn-hook", document.getElementsByTagName("body")[0])
                    },
                    100)) : n.i(A.g)("registry-btn-hook", document.getElementsByTagName("body")[0])
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this.props,
                    t = e.btn_pic,
                    n = e.color,
                    i = e.bgColor,
                    o = e.btnText,
                    r = e.borderRadius,
                    s = e.fontWeight,
                    A = e.boxShadow;
                    return a.a.createElement("div", {
                        className: "index-popupBtn",
                        id: "index-popupBtn",
                        style: {
                            display: "none"
                        }
                    },
                    a.a.createElement("div", {
                        onClick: this.goToPayHook.bind(this),
                        className: "btn"
                    },
                    t ? a.a.createElement("img", {
                        src: t,
                        alt: "立即测算"
                    }) : a.a.createElement("p", {
                        style: {
                            backgroundColor: i,
                            color: n,
                            borderRadius: r,
                            fontWeight: s,
                            boxShadow: A
                        }
                    },
                    o || "立即测算")))
                }
            }]),
            t
        } (s.Component),
        C = c;
        t.a = C; !
    }
},
[345]);