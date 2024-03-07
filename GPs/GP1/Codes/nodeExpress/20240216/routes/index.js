var express = require("express");
var router = express.Router();

/* GET home page. */
router.get("/", function (req, res, next) {
  res.render("index", { titol: "DAW2" });
});

router.get("/operacio", function (req, res, next) {
  // Use 4 different urls (suma, resta, mult, div).
  res.render("formulari", {});
});

router.get("/suma", function (req, res, next) {
  res.render("resultatOperacio", {
    titol: "suma",
    calcularSuma: parseInt(req.query.n1) + parseInt(req.query.n2),
  });
});

router.get("/resta", function (req, res, next) {
  res.render("resultatOperacio", {
    titol: "resta",
    calcularSuma: parseInt(req.query.n1) - parseInt(req.query.n2),
  });
});

router.get("/multipilicacio", function (req, res, next) {
  res.render("resultatOperacio", {
    titol: "multiplicacio",
    calcularSuma: parseInt(req.query.n1) * parseInt(req.query.n2),
  });
});

router.get("/divisio", function (req, res, next) {
  res.render("resultatOperacio", {
    titol: "divisio",
    calcularSuma: parseInt(req.query.n1) / parseInt(req.query.n2),
  });
});

module.exports = router;
