(function($, Edge, compId) {
    var _ = null,
        y = true,
        n = false,
        x1 = '4.0.0',
        c = 'color',
        x3 = 'rgba(0,0,0,0)',
        e19 = '${_logo}',
        a = 'Base State',
        x15 = 'hidden',
        x6 = 'solid',
        m = 'rect',
        dt = 'Default Timeline',
        i = 'none',
        rt = 'right',
        lf = 'left',
        x12 = 'rgba(102,102,102,1.00)',
        bc = 'border-color',
        x18 = 'pointer',
        x2 = '4.0.0.359',
        bg = 'background-color',
        e16 = '${_close}',
        x17 = 'auto',
        x5 = 'rgba(192,192,192,0)',
        e10 = '${_bg}',
        s = 'style',
        g = 'image',
        w = 'width',
        tp = 'top',
        x13 = 'rgba(255,255,255,1)',
        ov = 'overflow',
        e14 = '${_Stage}',
        h = 'height',
        x9 = 'stage',
        e11 = '${_border}';
    var im = 'http://www.fierros.com.co/funciones/images/';
    var g8 = 'close.png',
        g4 = 'bg.png',
        g7 = 'logo_dc.png';
    var fonts = {};
    var P = Edge.P,
        T = Edge.T,
        A = Edge.A;
    var opts = {
        'gAudioPreloadPreference': 'auto',
        'gVideoPreloadPreference': 'auto'
    };
    var resources = [];
    var symbols = {
        "stage": {
            v: x1,
            mv: x1,
            b: x2,
            bS: a,
            stf: i,
            cg: i,
            iS: a,
            gpu: n,
            rI: n,
            cn: {
                dom: [{
                    id: 'bg',
                    t: g,
                    r: ['0px', '0px', '398px', '398px', 'auto', 'auto'],
                    f: [x3, im + g4, '0px', '0px']
                }, {
                    id: 'border',
                    t: m,
                    r: ['0px', '0px', '398px', '398px', 'auto', 'auto'],
                    f: [x5],
                    s: [1, "rgba(102,102,102,1.00)", x6]
                }, {
                    id: 'logo',
                    t: g,
                    r: ['5px', '5px', '150px', '34px', 'auto', 'auto'],
                    cu: ['pointer'],
                    f: [x3, im + g7, '0px', '0px']
                }, {
                    id: 'close',
                    t: g,
                    r: ['auto', '5px', '20px', '18px', '5px', 'auto'],
                    cu: ['pointer'],
                    f: [x3, im + g8, '0px', '0px']
                }],
                sI: []
            },
            s: {},
            tl: {
                "Default Timeline": {
                    fS: a,
                    tS: "",
                    d: 0,
                    a: y,
                    tt: []
                }
            }
        }
    };
    var S1 = symbols[x9];
    var tl0 = S1.tl[dt].tt,
        st1 = S1.s[a] = {},
        A1 = A(_, tl0, st1);
    A1.A(e10).P(lf, 0).P(tp, 0);
    A1.A(e11).P(tp, 0).P(h, 398).P(bc, x12, c).P(lf, 0).P(w, 398);
    A1.A(e14).P(bg, x13, c).P(ov, x15).P(h, 400).P(w, 400);
    A1.A(e16).P(tp, 5).P(rt, 5).P(lf, x17).P("cursor", x18);
    A1.A(e19).P(tp, 5).P(lf, 5).P("cursor", x18);
    Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);
    $(window).ready(function() {
        Edge.launchComposition(compId);
    });
})(jQuery, AdobeEdge, "EDGE-334725474");