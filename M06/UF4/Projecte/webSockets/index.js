window.onload = () => {
  const socket = io();

  // https://stackoverflow.com/questions/14733374/how-to-generate-an-md5-hash-from-a-string-in-javascript-node-js#33486055.
  var MD5 = function (d) {
    var r = M(V(Y(X(d), 8 * d.length)));
    return r.toLowerCase();
  };
  function M(d) {
    for (var _, m = "0123456789ABCDEF", f = "", r = 0; r < d.length; r++)
      (_ = d.charCodeAt(r)), (f += m.charAt((_ >>> 4) & 15) + m.charAt(15 & _));
    return f;
  }
  function X(d) {
    for (var _ = Array(d.length >> 2), m = 0; m < _.length; m++) _[m] = 0;
    for (m = 0; m < 8 * d.length; m += 8)
      _[m >> 5] |= (255 & d.charCodeAt(m / 8)) << m % 32;
    return _;
  }
  function V(d) {
    for (var _ = "", m = 0; m < 32 * d.length; m += 8)
      _ += String.fromCharCode((d[m >> 5] >>> m % 32) & 255);
    return _;
  }
  function Y(d, _) {
    (d[_ >> 5] |= 128 << _ % 32), (d[14 + (((_ + 64) >>> 9) << 4)] = _);
    for (
      var m = 1732584193, f = -271733879, r = -1732584194, i = 271733878, n = 0;
      n < d.length;
      n += 16
    ) {
      var h = m,
        t = f,
        g = r,
        e = i;
      (f = md5_ii(
        (f = md5_ii(
          (f = md5_ii(
            (f = md5_ii(
              (f = md5_hh(
                (f = md5_hh(
                  (f = md5_hh(
                    (f = md5_hh(
                      (f = md5_gg(
                        (f = md5_gg(
                          (f = md5_gg(
                            (f = md5_gg(
                              (f = md5_ff(
                                (f = md5_ff(
                                  (f = md5_ff(
                                    (f = md5_ff(
                                      f,
                                      (r = md5_ff(
                                        r,
                                        (i = md5_ff(
                                          i,
                                          (m = md5_ff(
                                            m,
                                            f,
                                            r,
                                            i,
                                            d[n + 0],
                                            7,
                                            -680876936
                                          )),
                                          f,
                                          r,
                                          d[n + 1],
                                          12,
                                          -389564586
                                        )),
                                        m,
                                        f,
                                        d[n + 2],
                                        17,
                                        606105819
                                      )),
                                      i,
                                      m,
                                      d[n + 3],
                                      22,
                                      -1044525330
                                    )),
                                    (r = md5_ff(
                                      r,
                                      (i = md5_ff(
                                        i,
                                        (m = md5_ff(
                                          m,
                                          f,
                                          r,
                                          i,
                                          d[n + 4],
                                          7,
                                          -176418897
                                        )),
                                        f,
                                        r,
                                        d[n + 5],
                                        12,
                                        1200080426
                                      )),
                                      m,
                                      f,
                                      d[n + 6],
                                      17,
                                      -1473231341
                                    )),
                                    i,
                                    m,
                                    d[n + 7],
                                    22,
                                    -45705983
                                  )),
                                  (r = md5_ff(
                                    r,
                                    (i = md5_ff(
                                      i,
                                      (m = md5_ff(
                                        m,
                                        f,
                                        r,
                                        i,
                                        d[n + 8],
                                        7,
                                        1770035416
                                      )),
                                      f,
                                      r,
                                      d[n + 9],
                                      12,
                                      -1958414417
                                    )),
                                    m,
                                    f,
                                    d[n + 10],
                                    17,
                                    -42063
                                  )),
                                  i,
                                  m,
                                  d[n + 11],
                                  22,
                                  -1990404162
                                )),
                                (r = md5_ff(
                                  r,
                                  (i = md5_ff(
                                    i,
                                    (m = md5_ff(
                                      m,
                                      f,
                                      r,
                                      i,
                                      d[n + 12],
                                      7,
                                      1804603682
                                    )),
                                    f,
                                    r,
                                    d[n + 13],
                                    12,
                                    -40341101
                                  )),
                                  m,
                                  f,
                                  d[n + 14],
                                  17,
                                  -1502002290
                                )),
                                i,
                                m,
                                d[n + 15],
                                22,
                                1236535329
                              )),
                              (r = md5_gg(
                                r,
                                (i = md5_gg(
                                  i,
                                  (m = md5_gg(
                                    m,
                                    f,
                                    r,
                                    i,
                                    d[n + 1],
                                    5,
                                    -165796510
                                  )),
                                  f,
                                  r,
                                  d[n + 6],
                                  9,
                                  -1069501632
                                )),
                                m,
                                f,
                                d[n + 11],
                                14,
                                643717713
                              )),
                              i,
                              m,
                              d[n + 0],
                              20,
                              -373897302
                            )),
                            (r = md5_gg(
                              r,
                              (i = md5_gg(
                                i,
                                (m = md5_gg(
                                  m,
                                  f,
                                  r,
                                  i,
                                  d[n + 5],
                                  5,
                                  -701558691
                                )),
                                f,
                                r,
                                d[n + 10],
                                9,
                                38016083
                              )),
                              m,
                              f,
                              d[n + 15],
                              14,
                              -660478335
                            )),
                            i,
                            m,
                            d[n + 4],
                            20,
                            -405537848
                          )),
                          (r = md5_gg(
                            r,
                            (i = md5_gg(
                              i,
                              (m = md5_gg(m, f, r, i, d[n + 9], 5, 568446438)),
                              f,
                              r,
                              d[n + 14],
                              9,
                              -1019803690
                            )),
                            m,
                            f,
                            d[n + 3],
                            14,
                            -187363961
                          )),
                          i,
                          m,
                          d[n + 8],
                          20,
                          1163531501
                        )),
                        (r = md5_gg(
                          r,
                          (i = md5_gg(
                            i,
                            (m = md5_gg(m, f, r, i, d[n + 13], 5, -1444681467)),
                            f,
                            r,
                            d[n + 2],
                            9,
                            -51403784
                          )),
                          m,
                          f,
                          d[n + 7],
                          14,
                          1735328473
                        )),
                        i,
                        m,
                        d[n + 12],
                        20,
                        -1926607734
                      )),
                      (r = md5_hh(
                        r,
                        (i = md5_hh(
                          i,
                          (m = md5_hh(m, f, r, i, d[n + 5], 4, -378558)),
                          f,
                          r,
                          d[n + 8],
                          11,
                          -2022574463
                        )),
                        m,
                        f,
                        d[n + 11],
                        16,
                        1839030562
                      )),
                      i,
                      m,
                      d[n + 14],
                      23,
                      -35309556
                    )),
                    (r = md5_hh(
                      r,
                      (i = md5_hh(
                        i,
                        (m = md5_hh(m, f, r, i, d[n + 1], 4, -1530992060)),
                        f,
                        r,
                        d[n + 4],
                        11,
                        1272893353
                      )),
                      m,
                      f,
                      d[n + 7],
                      16,
                      -155497632
                    )),
                    i,
                    m,
                    d[n + 10],
                    23,
                    -1094730640
                  )),
                  (r = md5_hh(
                    r,
                    (i = md5_hh(
                      i,
                      (m = md5_hh(m, f, r, i, d[n + 13], 4, 681279174)),
                      f,
                      r,
                      d[n + 0],
                      11,
                      -358537222
                    )),
                    m,
                    f,
                    d[n + 3],
                    16,
                    -722521979
                  )),
                  i,
                  m,
                  d[n + 6],
                  23,
                  76029189
                )),
                (r = md5_hh(
                  r,
                  (i = md5_hh(
                    i,
                    (m = md5_hh(m, f, r, i, d[n + 9], 4, -640364487)),
                    f,
                    r,
                    d[n + 12],
                    11,
                    -421815835
                  )),
                  m,
                  f,
                  d[n + 15],
                  16,
                  530742520
                )),
                i,
                m,
                d[n + 2],
                23,
                -995338651
              )),
              (r = md5_ii(
                r,
                (i = md5_ii(
                  i,
                  (m = md5_ii(m, f, r, i, d[n + 0], 6, -198630844)),
                  f,
                  r,
                  d[n + 7],
                  10,
                  1126891415
                )),
                m,
                f,
                d[n + 14],
                15,
                -1416354905
              )),
              i,
              m,
              d[n + 5],
              21,
              -57434055
            )),
            (r = md5_ii(
              r,
              (i = md5_ii(
                i,
                (m = md5_ii(m, f, r, i, d[n + 12], 6, 1700485571)),
                f,
                r,
                d[n + 3],
                10,
                -1894986606
              )),
              m,
              f,
              d[n + 10],
              15,
              -1051523
            )),
            i,
            m,
            d[n + 1],
            21,
            -2054922799
          )),
          (r = md5_ii(
            r,
            (i = md5_ii(
              i,
              (m = md5_ii(m, f, r, i, d[n + 8], 6, 1873313359)),
              f,
              r,
              d[n + 15],
              10,
              -30611744
            )),
            m,
            f,
            d[n + 6],
            15,
            -1560198380
          )),
          i,
          m,
          d[n + 13],
          21,
          1309151649
        )),
        (r = md5_ii(
          r,
          (i = md5_ii(
            i,
            (m = md5_ii(m, f, r, i, d[n + 4], 6, -145523070)),
            f,
            r,
            d[n + 11],
            10,
            -1120210379
          )),
          m,
          f,
          d[n + 2],
          15,
          718787259
        )),
        i,
        m,
        d[n + 9],
        21,
        -343485551
      )),
        (m = safe_add(m, h)),
        (f = safe_add(f, t)),
        (r = safe_add(r, g)),
        (i = safe_add(i, e));
    }
    return Array(m, f, r, i);
  }
  function md5_cmn(d, _, m, f, r, i) {
    return safe_add(bit_rol(safe_add(safe_add(_, d), safe_add(f, i)), r), m);
  }
  function md5_ff(d, _, m, f, r, i, n) {
    return md5_cmn((_ & m) | (~_ & f), d, _, r, i, n);
  }
  function md5_gg(d, _, m, f, r, i, n) {
    return md5_cmn((_ & f) | (m & ~f), d, _, r, i, n);
  }
  function md5_hh(d, _, m, f, r, i, n) {
    return md5_cmn(_ ^ m ^ f, d, _, r, i, n);
  }
  function md5_ii(d, _, m, f, r, i, n) {
    return md5_cmn(m ^ (_ | ~f), d, _, r, i, n);
  }
  function safe_add(d, _) {
    var m = (65535 & d) + (65535 & _);
    return (((d >> 16) + (_ >> 16) + (m >> 16)) << 16) | (65535 & m);
  }
  function bit_rol(d, _) {
    return (d << _) | (d >>> (32 - _));
  }

  // https://developer.marvel.com/documentation/authorization.
  let hora = new Date().getTime();
  let clauApiPublica = "259739d55d281046e127f42ae4236545";
  let clauApiPrivada = "644d1d1f33e2505c06f2a394df96141f6f58d92b";
  let clauHash = MD5(hora + clauApiPrivada + clauApiPublica);

  // Function to fetch the logos from the superheroes.
  async function obtenirLogoSuperHeroi() {
    // dadesDesDelClient is the key.
    socket.emit("obtenirLogoSuperHeroi", {
      hora: hora,
      clauApiPublica: clauApiPublica,
      clauApiPrivada: clauApiPrivada,
      clauHash: clauHash,
    });

    // Each time the server gets new data.
    socket.on("dadesDesDelServidor", function (resposta) {
      console.log("Entro.");
      let dadesResposta = resposta.data.results;
      // console.log(dadesResposta);

      dadesResposta.forEach((superHeroi) => {
        // console.log(`${superHeroi.name}: ${superHeroi.id}`);

        let contenidorSuperHeroi = document.createElement("div");
        let imatge = document.createElement("img");
        imatge.src = `${
          superHeroi.thumbnail.path + "." + superHeroi.thumbnail.extension
        }`;
        imatge.id = "logo-superheroi";

        let nom = document.createElement("p");
        nom.textContent = superHeroi.name;

        // This is to add the ID of the superheroe as a paragraph.
        let idS = document.createElement("p");
        idS.setAttribute("id", "idS");
        idS.textContent = superHeroi.id;

        contenidorSuperHeroi.appendChild(imatge);
        contenidorSuperHeroi.appendChild(nom);
        contenidorSuperHeroi.append(idS);

        document
          .getElementById("logos-superherois")
          .appendChild(contenidorSuperHeroi);

        contenidorSuperHeroi.onclick = () => {
          console.log(contenidorSuperHeroi.childNodes.item(2).innerHTML);
          // console.log(superHeroi.name);

          obtenirComicsSuperHeroi(
            contenidorSuperHeroi.childNodes.item(2).innerHTML
          )
            .then((resposta) => {
              let dadesResposta = resposta.data.results;

              // This is to clear the previous commics that were on "comics".
              document.getElementById("comics").innerHTML = "";

              dadesResposta.forEach((comic) => {
                // console.log(`${comic.title}: ${comic.id}`)

                let contenidorComic = document.createElement("div");
                // Create an image element.
                let imatge = document.createElement("img");
                imatge.src = `${
                  comic.thumbnail.path + "." + comic.thumbnail.extension
                }`;
                imatge.id = "imatge-comic";

                // Create a paragraph element for the comic title.
                let titol = document.createElement("p");
                titol.textContent = comic.title;

                let idC = document.createElement("p");

                // This is to add an id to the paragraph, I use it on the css because I don't want this information to be shown.
                idC.setAttribute("id", "idC");
                idC.textContent = comic.id;

                // Append the image and title to the container
                contenidorComic.appendChild(imatge);
                contenidorComic.appendChild(titol);
                contenidorComic.append(idC);

                document.getElementById("comics").appendChild(contenidorComic);

                // This is to get the information from a specific comic.
                contenidorComic.onclick = () => {
                  // console.log(contenidorComic.childNodes.item(2).innerHTML);
                  obtenirDetallsComic(
                    contenidorComic.childNodes.item(2).innerHTML
                  )
                    // If there's an error, I print it.
                    .catch((e) => {
                      console.log("Ha ocorregut un error!");
                      console.log(e);
                    });
                };
              });
            })
            .catch((e) => {
              console.log("Ha ocorregut un error!");
              console.log(e);
            });
        };
      });
    });
  }

  // Async function to fetch some comics.
  async function obtenirComics() {
    let url = `https://gateway.marvel.com:443/v1/public/comics?characters=1011334%2C1017100%2C1009144%2C1010699%2C1009146%2C1016823%2C1009148%2C1009149%2C1010903%2C1011266&orderBy=title&limit=21&ts=${hora}&apikey=${clauApiPublica}&hash=${clauHash}`;
    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    return resposta.json();
  }

  // Async function to fetch the comics from a superheroe.
  async function obtenirComicsSuperHeroi(idSuperHeroi) {
    url = `https://gateway.marvel.com:443/v1/public/characters/${idSuperHeroi}/comics?orderBy=title&ts=${hora}&apikey=${clauApiPublica}&hash=${clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    return resposta.json();
  }

  // Async function to fetch the details from a comic.
  async function obtenirDetallsComic(idComic) {
    let url = `https://gateway.marvel.com:443/v1/public/comics/${idComic}?orderBy=title&ts=${hora}&apikey=${clauApiPublica}&hash=${clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    // This line is from ChatGPT.
    let dadesResposta = (await resposta.json()).data.results;

    dadesResposta.forEach((comic) => {
      let dataFormatada = new Date(comic.modified);
      let dia = dataFormatada.getMonth(),
        mes = dataFormatada.getMonth(),
        any = dataFormatada.getFullYear();
      dataFormatada = `${dia}/${mes}/${any}`;
      let preuComic = 0,
        escriptors = [],
        dibuixants = [];

      comic.prices.forEach((preu) => {
        if (preu.type == "printPrice") {
          preuComic = preu.price;
        }
      });

      comic.creators.items.forEach((escriptor) => {
        if (escriptor.role == "penciller") {
          dibuixants.push(escriptor.name);
        } else if (escriptor.role == "writer") {
          escriptors.push(escriptor.name);
        }
        // console.log(escriptors);
      });

      document.getElementById("detall-comic").innerHTML = `<img src="${
        comic.thumbnail.path + "." + comic.thumbnail.extension
      }" id="imatge-comic"><br>
    <b><u>${comic.title}</u></b><br>
    <b>Descripció</b>: ${comic.description}<br>
    <b>Publicat</b>: ${dataFormatada}<br>
    <b>Número de pàgines</b>: ${comic.pageCount}<br>
    <b>Preu</b>: ${preuComic}$<br>
    <br><b>Escriptors</b>: ${escriptors}<br>
    <b>Dibuixants</b>: ${dibuixants}
    <br>`;
    });
  }

  Promise.all([obtenirLogoSuperHeroi()]);
};
