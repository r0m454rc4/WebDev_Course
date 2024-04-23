var express = require("express");
var router = express.Router();
var path = require("path");

/* GET home page. */
router.get("/", function (req, res, next) {
  res.sendFile(path.join(__dirname + "/public", "llista_compra.html"));
});

router.get("/", function (req, res, next) {
  res.sendFile(path.join(__dirname + "/public", "llista_compra.html"));
});

module.exports = router;
