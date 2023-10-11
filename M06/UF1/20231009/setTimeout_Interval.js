// This will execute just one time.
setTimeout(function () {
  console.log("Han passat 5 segons.");
}, 5000);

// This executes every 5 seconds automatically.
setInterval(function () {
  console.log("Han passat 5 segons.");
}, 5000);

// You can use clearInterval() + id of interval, and you'll be able to kill it.
