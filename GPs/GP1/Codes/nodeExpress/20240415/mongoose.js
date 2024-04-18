const express = require("express");
const http = require("http");
const path = require("path");
const favicon = require("static-favicon");
const logger = require("morgan");
const cookieParser = require("cookie-parser");
const bodyParser = require("body-parser");
const mongoose = require("mongoose");

const routes = require("./routes");

mongoose.set("strictQuery", false);

main().catch((err) => console.log(err));
async function main() {
  await mongoose.connect("mongodb://127.0.0.1:27017/daw2");
}

async function consulta() {
  await AlumneModel.find({}).exec();
}

const Schema = mongoose.Schema;

//esquema alumne
const alumneSchema = new Schema({
  nom: String,
  email: String,
  nota: {
    type: Number,
    min: 0,
    max: 10,
    required: [true, "No pot ser no avaluat"],
  },
});

//model de dades
const AlumneModel = mongoose.model("Alumne", alumneSchema);
const alumne1 = new AlumneModel({ nom: "SERGI", email: "sergi", nota: 10 });
const alumne2 = new AlumneModel({ nom: "JOAN", email: "sergi", nota: 8 });

alumne1.save();
alumne2.save();

const c = consulta();

const gestionaError = (err) => console.log(err);

let app = express();

// view engine setup
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "jade");

app.use(favicon());
app.use(logger("dev"));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded());
app.use(cookieParser());
app.use(require("stylus").middleware(path.join(__dirname, "public")));
app.use(express.static(path.join(__dirname, "public")));

app.get("/", routes.index);

app.use(function (req, res, next) {
  let err = new Error("Not Found");
  err.status = 404;
  next(err);
});

if (app.get("env") === "development") {
  app.use(function (err, req, res, next) {
    res.render("error", {
      message: err.message,
      error: err,
    });
  });
}

app.use(function (err, req, res, next) {
  res.render("error", {
    message: err.message,
    error: {},
  });
});

module.exports = app;
