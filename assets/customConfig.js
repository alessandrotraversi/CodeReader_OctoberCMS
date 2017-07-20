var outputSelector = '.codebar-display',
    quaggaInitBox = '#interactiveQuagga';

function order_by_occurrence(arr) {
    var counts = {};
    arr.forEach(function(value){
        if(!counts[value]) {
            counts[value] = 0;
        }
        counts[value]++;
    });

    return Object.keys(counts).sort(function(curKey,nextKey) {
        return counts[curKey] < counts[nextKey];
    });
}
function load_quagga(){
    if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {

        var last_result = [];

        if (Quagga.initialized == undefined) {
            Quagga.onDetected(function(result) {
                var last_code = result.codeResult.code;
                last_result.push(last_code);
                if (last_result.length > 20) {
                    code = order_by_occurrence(last_result)[0];
                    last_result = [];
                    Quagga.stop();
                    document.querySelector(outputSelector).innerHTML = code;
                }
            });
        }

        Quagga.init({
            inputStream : {
                name : "Live",
                type : "LiveStream",
                target: document.querySelector(quaggaInitBox)
            },
            decoder: {
                readers : ['ean_reader','ean_8_reader','code_39_reader','code_39_vin_reader','codabar_reader','upc_reader','upc_e_reader']
            }
        },function(err) {
            if (err) { console.log(err); return }
            Quagga.initialized = true;
            Quagga.start();
        });

    }
}

load_quagga();