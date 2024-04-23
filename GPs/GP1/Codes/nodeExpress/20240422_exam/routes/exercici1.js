var express = require("express");
var router = express.Router();

/* GET home page. */
router.get("/", function (req, res, next) {
  res.render("exercici1", { title: "Exercici1" });
});

module.exports = router;
