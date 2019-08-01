(function($, Edge, compId) {
    var Composition = Edge.Composition,
        Symbol = Edge.Symbol;
    //Edge symbol: 'stage'
    (function(symbolName) {
        Symbol.bindElementAction(compId, symbolName, "${_close}", "click", function(sym, e) {
            Enabler.reportManualClose();
            Enabler.close();
        });
        //Edge binding end
        Symbol.bindElementAction(compId, symbolName, "${_logo}", "click", function(sym, e) {
            Enabler.exit('Logo_Clickthrough');
            Enabler.close();
        });
        //Edge binding end
        Symbol.bindSymbolAction(compId, symbolName, "creationComplete", function(sym, e) {
            console.log("15s Timer Start");
            setTimeout(function() {
                Enabler.close();
                console.log("AutoClose after 15s");
            }, 15000);
        });
        //Edge binding end
    })("stage");
    //Edge symbol end:'stage'
})(jQuery, AdobeEdge, "EDGE-334725474");