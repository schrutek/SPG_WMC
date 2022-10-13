function doSomething(myCallback) {
    console.log("timeout started...");
    setTimeout(() => {
        myCallback();
    }, 1000);
}

function callback01() {
    console.log("callback01 DONE!!!");
}

function callback02() {
    console.log("callback02 DONE!!!");
}

function callback03() {
    console.log("callback03 DONE!!!");
}

doSomething(function(callback01) { 
    doSomething(function(callback02) {
        doSomething(callback03)
    })
});

//doSomething(callback01);