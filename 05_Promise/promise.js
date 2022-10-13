function myPromiseFunction(executorFunc) { 
    return new Promise(function(resolve, reject) {
        setTimeout(() => {
            resolve(executorFunc);
        }, 2000);
    })
};

//let myPromise = MyPromiseFunction("EXECUTOR FUNCTION DONE!!!");
  
myPromiseFunction("EXECUTOR FUNCTION DONE!!!")
    .then(result1 => { console.log(result1); return result1; })
    .then(result2 => console.log(result2 + ' 2'));

console.log("Next Code Part");
