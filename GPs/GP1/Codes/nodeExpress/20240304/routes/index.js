var express = require("express");
var router = express.Router();

/* GET home page. */
router.get("/", function (req, res, next) {
  res.render("index", { titol: "DAW2" });
});
router.get("/suma", function (req, res, next) {
  res.render("formulari", { operacio: "calcularSuma" });
});
router.get("/resta", function (req, res, next) {
  res.render("formulari", { operacio: "calcularResta" });
});
router.get("/producte", function (req, res, next) {
  res.render("formulari", { operacio: "calcularProducte" });
});
router.get("/divisio", function (req, res, next) {
  res.render("formulari", { operacio: "calcularDivisio" });
});

module.exports = router;
