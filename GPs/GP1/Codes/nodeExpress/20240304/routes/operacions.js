var express = require("express");
var router = express.Router();

/* GET users listing. */
router.get("/", function (req, res, next) {
  res.send("respond with a resource");
});

router.get("/calcularSuma", function (req, res, next) {
  //logica
  res.render("resultat", {
    titol: "suma",
    resultat: parseInt(req.query.n1) + parseInt(req.query.n2),
  });
});
router.get("/calcularResta", function (req, res, next) {
  //logica
  res.render("resultat", {
    titol: "resta",
    resultat: parseInt(req.query.n1) - parseInt(req.query.n2),
  });
});
router.get("/calcularProducte", function (req, res, next) {
  //logica
  res.render("resultat", {
    titol: "producte",
    resultat: parseInt(req.query.n1) * parseInt(req.query.n2),
  });
});
router.get("/calcularDivisio", function (req, res, next) {
  //logica
  res.render("resultat", {
    titol: "divisio",
    resultat: parseInt(req.query.n1) / parseInt(req.query.n2),
  });
});

module.exports = router;
