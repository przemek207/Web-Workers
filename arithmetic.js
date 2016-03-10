function addNumbers(x,y) {
    return x + y;
}

function deductNumbers(x,y) {
    return x - y;
}

function mulNumbers(x,y) {
    return x*y;
}

function divideNumbers(x,y) {
    return x/y;
}

this.onmessage = function (event) {
    var data = event.data;

    switch(data.op) {
        case 'add':
            postMessage(addNumbers(data.x, data.y));
            break;
        case 'deduct':
            postMessage(deductNumbers(data.x, data.y));
            break;
        case 'mult':
            postMessage(mulNumbers(data.x, data.y));
            break;
        case 'divide':
            postMessage(divideNumbers(data.x, data.y));
            break;
        default:
            postMessage("Something Wrong.");
    }
};
