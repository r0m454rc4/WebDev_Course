window.onload = function () {
  function paraulaAleatoria(llistaInsults) {
    for (let i in llistaInsults) {
      let nAleatori = Math.floor(Math.random() * llistaInsults.length);
      let pAleatoria = llistaInsults[nAleatori];

      // console.log(pAleatoria);
      return pAleatoria;
      break;
    }
  }

  document.getElementById("crearInsult").onclick = function () {
    let llistaInsults1 =
      "artless bawdy beslubbering bootless churlish cockered clouted craven currish dankish dissembling droning errant fawning fobbing froward frothy gleeking goatish gorbellied impertinent infectious jarring loggerheaded lumpish mammering mangled mewling paunchy pribbling puking puny qualling rank reeky roguish ruttish saucy spleeny spongy surly tottering unmuzzled vain venomed villainous warped wayward weedy yeasty cullionly fusty caluminous wimpled burly-boned misbegotten odiferous poisonous fishified Wart-necked";
    llistaInsults1 = llistaInsults1.split(" ");

    let llistaInsults2 =
      "base-court bat-fowling beef-witted beetle-headed boil-brained clapper-clawed clay-brained common-kissing crook-pated dismal-dreaming dizzy-eyed doghearted dread-bolted earth-vexing elf-skinned fat-kidneyed fen-sucked flap-mouthed fly-bitten folly-fallen fool-born full-gorged guts-griping half-faced hasty-witted hedge- born hell-hated idle-headed ill-breeding ill-nurtured knotty-pated milk-livered motley-minded onion-eyed plume-plucked pottle-deep pox-marked reeling-ripe rough-hewn rude-growing rump-fed shard-borne sheep- biting spur-galled swag-bellied tardy-gaited tickle-brained toad-spotted unchin-snouted weather-bitten whoreson malmsey-nosed rampallian lily-livered scurvy-valiant brazen-faced unwashd bunch-backd leaden- footed muddy-mettled pigeon-liverd scale-sided";
    llistaInsults2 = llistaInsults2.split(" ");

    let llistaInsults3 =
      "apple-john baggage barnacle bladder boar-pig bugbear bum-bailey canker-blossom clack-dish clotpole coxcomb codpiece death-token dewberry flap-dragon flax-wench flirt-gill foot-licker fustilarian giglet gudgeon haggard harpy hedge-pig horn-beast hugger-mugger joithead lewdster lout maggot-pie malt-worm mammet measle minnow miscreant moldwarp mumble-news nut-hook pigeon-egg pignut puttock pumpion ratsbane scut skainsmate strumpet varlot vassal whey-face wagtail knave blind-worm popinjay scullian jolt-head malcontent devil-monk toad rascal Basket-Cockle";
    llistaInsults3 = llistaInsults3.split(" ");

    let pAl1 = paraulaAleatoria(llistaInsults1);
    let pAl2 = paraulaAleatoria(llistaInsults2);
    let pAl3 = paraulaAleatoria(llistaInsults3);

    document.getElementById("label1").innerHTML =
      `Thou, ${pAl1} ${pAl2} ${pAl3}` + "<br><br>";
  };

  document.getElementById("esborrarInsult").onclick = function () {
    document.getElementById("label1").innerHTML = "";
  };
};
