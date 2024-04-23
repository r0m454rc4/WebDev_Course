var express = require("express");
var router = express.Router();

router.get("/", function (req, res, next) {
  res.render("dadesUsuaris", {
    titol: "dadesUsuaris",
    dadesUsuari: [req.query.nom, req.query.hobbie, req.query.anyPractica],
  });
});

module.exports = router;
