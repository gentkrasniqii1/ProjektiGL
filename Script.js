function showPlayers(group) {
    const container = document.getElementById("players-container");
    container.innerHTML = ""; // Pastroni përmbajtjen e mëparshme

    for (let i = 1; i <= 22; i++) {
        const playerBox = document.createElement("div");
        playerBox.className = "player-box";
        playerBox.innerHTML = `
            <h4>Emri: Lojtar ${i}</h4>
            <p>Mbiemri: Shembull</p>
            <p>Mosha: ${group.replace('u', '') - (21 - i)}</p>
            <p>Grupmosha: ${group.toUpperCase()}</p>
            <p>Pozita: Mesfushor</p>
            <p>Email: lojtar${i}@example.com</p>
        `;
        container.appendChild(playerBox);
    }

    // Shfaqni seksionin
    container.style.display = "flex";
    container.style.flexWrap = "wrap";
    container.style.justifyContent = "center";
}

// Të dhënat e lojtarëve të ndara sipas grupmoshës
const playersData = {
    u11: [
        { name: "Ardit", surname: "Krasniqi", age: 10, position: "Mbrojtës", email: "ardit.k@example.com" },
        { name: "Besnik", surname: "Gashi", age: 11, position: "Sulmues", email: "besnik.g@example.com" },
        { name: "Donat", surname: "Bakaj", age: 11, position: "Portier", email: "donat.b@example.com" },
        { name: "Blerim", surname: "Hoxha", age: 10, position: "Portier", email: "blerim.h@example.com" },
        { name: "Artan", surname: "Krasniqi", age: 11, position: "Qendër-Mbrojtës", email: "artan.k@example.com" },
        { name: "Eldion", surname: "Gashi", age: 10, position: "Qendër-Mbrojtës", email: "eldion.g@example.com" },
        { name: "Dion", surname: "Mehmeti", age: 11, position: "Qendër-Mbrojtës", email: "dion.m@example.com" },
        { name: "Arsim", surname: "Zeqiri", age: 10, position: "Qendër-Mbrojtës", email: "arsim.z@example.com" },
        { name: "Florian", surname: "Shala", age: 11, position: "Mbrojtës-Krahu", email: "florian.s@example.com" },
        { name: "Alban", surname: "Leka", age: 10, position: "Mbrojtës-Krahu", email: "alban.l@example.com" },
        { name: "Elion", surname: "Dervishi", age: 11, position: "Mbrojtës-Krahu", email: "elion.d@example.com" },
        { name: "Gent", surname: "Ismaili", age: 10, position: "Mbrojtës-Krahu", email: "gent.i@example.com" },
        { name: "Kreshnik", surname: "Rama", age: 11, position: "Mesfushor-Mbrojtës", email: "kreshnik.r@example.com" },
        { name: "Ardit", surname: "Beqiri", age: 11, position: "Mesfushor-Mbrojtës", email: "ardit.b@example.com" },
        { name: "Fisnik", surname: "Tahiri", age: 10, position: "Qendër-Mesfushor", email: "fisnik.t@example.com" },
        { name: "Bujar", surname: "Aliu", age: 11, position: "Qendër-Mesfushor", email: "bujar.a@example.com" },
        { name: "Altin", surname: "Hasani", age: 10, position: "Qendër-Mesfushor", email: "altin.h@example.com" },
        { name: "Granit", surname: "Bajrami", age: 11, position: "Qendër-Mesfushor", email: "granit.b@example.com" },
        { name: "Ermal", surname: "Selimi", age: 11, position: "Sulmues-Krahu", email: "ermal.s@example.com" },
        { name: "Erlis", surname: "Demiri", age: 10, position: "Sulmues-Krahu", email: "erlis.d@example.com" },
        { name: "Lirim", surname: "Kurti", age: 11, position: "Sulmues-Krahu", email: "lirim.k@example.com" },
        { name: "Fatos", surname: "Zeneli", age: 10, position: "Sulmues-Krahu", email: "fatos.z@example.com" },
        { name: "Astrit", surname: "Hoti", age: 11, position: "Qendër-Sulmues", email: "astrit.h@example.com" },
        { name: "Besnik", surname: "Morina", age: 10, position: "Qendër-Krahu", email: "besnik.m@example.com" },
        // Shto lojtarët e tjerë këtu...
    ],
    u12: [
        { name: "Blerim", surname: "Hasani", age: 12, position: "Portier", email: "blerim.h@example.com" },
        { name: "Fidan", surname: "Berisha", age: 12, position: "Mesfushor", email: "fidan.b@example.com" },
        { name: "Hekuran", surname: "Murati", age: 12, position: "Portier", email: "hekuran.m@example.com" },
        { name: "Gjergj", surname: "Kelmendi", age: 12, position: "Portier", email: "gjergj.k@example.com" },
        { name: "Ilir", surname: "Shabani", age: 12, position: "Qendër-Mbrojtës", email: "ilir.s@example.com" },
        { name: "Besnik", surname: "Lama", age: 11, position: "Qendër-Mbrojtës", email: "besnik.l@example.com" },
        { name: "Agron", surname: "Zeqiri", age: 12, position: "Qendër-Mbrojtës", email: "agron.z@example.com" },
        { name: "Artur", surname: "Selimi", age: 12, position: "Qendër-Mbrojtës", email: "artur.s@example.com" },
        { name: "Ardian", surname: "Miftari", age: 12, position: "Mbrojtës-Krahu", email: "ardian.m@example.com" },
        { name: "Valmir", surname: "Berisha", age: 12, position: "Mbrojtës-Krahu", email: "valmir.b@example.com" },
        { name: "Flamur", surname: "Islami", age: 12, position: "Mbrojtës-Krahu", email: "flamur.i@example.com" },
        { name: "Arjan", surname: "Gjini", age: 12, position: "Mbrojtës-Krahu", email: "arjan.g@example.com" },
        { name: "Kreshnik", surname: "Osmani", age: 12, position: "Mesfushor-Mbrojtës", email: "kreshnik.o@example.com" },
        { name: "Shpat", surname: "Dervishi", age: 12, position: "Mesfushor-Mbrojtës", email: "shpat.d@example.com" },
        { name: "Altin", surname: "Pajaziti", age: 11, position: "Qendër-Mesfushor", email: "altin.p@example.com" },
        { name: "Renis", surname: "Gjoni", age: 11, position: "Qendër-Mesfushor", email: "renis.g@example.com" },
        { name: "Artan", surname: "Lika", age: 12, position: "Qendër-Mesfushor", email: "artan.l@example.com" },
        { name: "Ermir", surname: "Bardhi", age: 12, position: "Qendër-Mesfushor", email: "ermir.b@example.com" },
        { name: "Genc", surname: "Metaj", age: 12, position: "Sulmues-Krahu", email: "genc.m@example.com" },
        { name: "Leart", surname: "Thaci", age: 12, position: "Sulmues-Krahu", email: "leart.t@example.com" },
        { name: "Edon", surname: "Xhaka", age: 12, position: "Sulmues-Krahu", email: "edon.x@example.com" },
        { name: "Fidan", surname: "Morina", age: 11, position: "Sulmues-Krahu", email: "fidan.m@example.com" },
        { name: "Endri", surname: "Deda", age: 12, position: "Qendër-Sulmues", email: "endri.d@example.com" },
        { name: "Arianit", surname: "Nika", age: 12, position: "Qendër-Krahu", email: "arianit.n@example.com" },
        // Shto lojtarët e tjerë këtu...
    ],
    u13: [
        { name: "Elton", surname: "Sadriu", age: 12, position: "Portier", email: "elton.s@example.com" },
        { name: "Kreshnik", surname: "Mataj", age: 13, position: "Portier", email: "kreshnik.m@example.com" },
        { name: "Erion", surname: "Shala", age: 12, position: "Qendër-Mbrojtës", email: "erion.s@example.com" },
        { name: "Altin", surname: "Berisha", age: 12, position: "Qendër-Mbrojtës", email: "altin.b@example.com" },
        { name: "Besmir", surname: "Gashi", age: 13, position: "Qendër-Mbrojtës", email: "besmir.g@example.com" },
        { name: "Flamur", surname: "Leka", age: 12, position: "Qendër-Mbrojtës", email: "flamur.l@example.com" },
        { name: "Adrian", surname: "Dervishi", age: 13, position: "Mbrojtës-Krahu", email: "adrian.d@example.com" },
        { name: "Gentian", surname: "Tafa", age: 12, position: "Mbrojtës-Krahu", email: "gentian.t@example.com" },
        { name: "Granit", surname: "Peci", age: 12, position: "Mbrojtës-Krahu", email: "granit.p@example.com" },
        { name: "Lirim", surname: "Sadiku", age: 13, position: "Mbrojtës-Krahu", email: "lirim.s@example.com" },
        { name: "Agim", surname: "Zeqiri", age: 12, position: "Mesfushor-Mbrojtës", email: "agim.z@example.com" },
        { name: "Arber", surname: "Ismaili", age: 13, position: "Mesfushor-Mbrojtës", email: "arber.i@example.com" },
        { name: "Valdrin", surname: "Bytyqi", age: 12, position: "Qendër-Mesfushor", email: "valdrin.b@example.com" },
        { name: "Kastriot", surname: "Rexha", age: 12, position: "Qendër-Mesfushor", email: "kastriot.r@example.com" },
        { name: "Arlind", surname: "Osmani", age: 13, position: "Qendër-Mesfushor", email: "arlind.o@example.com" },
        { name: "Dardan", surname: "Maloku", age: 12, position: "Qendër-Mesfushor", email: "dardan.m@example.com" },
        { name: "Blerim", surname: "Haziri", age: 13, position: "Sulmues-Krahu", email: "blerim.h@example.com" },
        { name: "Shpend", surname: "Mehmeti", age: 12, position: "Sulmues-Krahu", email: "shpend.m@example.com" },
        { name: "Ilir", surname: "Krasniqi", age: 12, position: "Sulmues-Krahu", email: "ilir.k@example.com" },
        { name: "Edison", surname: "Deda", age: 13, position: "Sulmues-Krahu", email: "edison.d@example.com" },
        { name: "Arben", surname: "Zeneli", age: 12, position: "Qendër-Sulmues", email: "arben.z@example.com" },
        { name: "Elton", surname: "Tahiri", age: 13, position: "Qendër-Sulmues", email: "elton.t@example.com" },
    ],
    u14: [
        { name: "Doni", surname: "Dervishi", age: 13, position: "Portier", email: "doni.d@example.com" },
        { name: "Besnik", surname: "Bajrami", age: 14, position: "Portier", email: "besnik.b@example.com" },
        { name: "Genc", surname: "Matoshi", age: 13, position: "Qendër-Mbrojtës", email: "genc.m@example.com" },
        { name: "Altin", surname: "Berisha", age: 14, position: "Qendër-Mbrojtës", email: "altin.b@example.com" },
        { name: "Shpend", surname: "Hoxha", age: 13, position: "Qendër-Mbrojtës", email: "shpend.h@example.com" },
        { name: "Ardit", surname: "Zeneli", age: 14, position: "Qendër-Mbrojtës", email: "ardit.z@example.com" },
        { name: "Ilir", surname: "Shabani", age: 14, position: "Mbrojtës-Krahu", email: "ilir.s@example.com" },
        { name: "Flamur", surname: "Peci", age: 13, position: "Mbrojtës-Krahu", email: "flamur.p@example.com" },
        { name: "Besart", surname: "Gashi", age: 14, position: "Mbrojtës-Krahu", email: "besart.g@example.com" },
        { name: "Edmir", surname: "Selimi", age: 13, position: "Mbrojtës-Krahu", email: "edmir.s@example.com" },
        { name: "Valdrin", surname: "Thaqi", age: 13, position: "Mesfushor-Mbrojtës", email: "valdrin.t@example.com" },
        { name: "Admir", surname: "Veliu", age: 14, position: "Mesfushor-Mbrojtës", email: "admir.v@example.com" },
        { name: "Lirim", surname: "Osmani", age: 13, position: "Qendër-Mesfushor", email: "lirim.o@example.com" },
        { name: "Bledar", surname: "Kodra", age: 14, position: "Qendër-Mesfushor", email: "bledar.k@example.com" },
        { name: "Fatos", surname: "Krasniqi", age: 13, position: "Qendër-Mesfushor", email: "fatos.k@example.com" },
        { name: "Granit", surname: "Beqiri", age: 14, position: "Qendër-Mesfushor", email: "granit.b@example.com" },
        { name: "Leonard", surname: "Miftari", age: 14, position: "Sulmues-Krahu", email: "leonard.m@example.com" },
        { name: "Arianit", surname: "Rexhepi", age: 13, position: "Sulmues-Krahu", email: "arianit.r@example.com" },
        { name: "Dardan", surname: "Kurti", age: 14, position: "Sulmues-Krahu", email: "dardan.k@example.com" },
        { name: "Agim", surname: "Leka", age: 13, position: "Sulmues-Krahu", email: "agim.l@example.com" },
        { name: "Ermal", surname: "Zeqiri", age: 14, position: "Qendër-Sulmues", email: "ermal.z@example.com" },
        { name: "Arjan", surname: "Nikolla", age: 13, position: "Qendër-Krahu", email: "arjan.n@example.com" },
        // Shto lojtarët e tjerë këtu...
    ],
    u15: [
        { name: "Lindi", surname: "Kallaku", age: 15, position: "Portier", email: "lindi.k@example.com" },
        { name: "Flamur", surname: "Hoxha", age: 14, position: "Portier", email: "flamur.h@example.com" },
        { name: "Granit", surname: "Selimi", age: 15, position: "Qendër-Mbrojtës", email: "granit.s@example.com" },
        { name: "Ilir", surname: "Krasniqi", age: 14, position: "Qendër-Mbrojtës", email: "ilir.k@example.com" },
        { name: "Alban", surname: "Gashi", age: 15, position: "Qendër-Mbrojtës", email: "alban.g@example.com" },
        { name: "Blendi", surname: "Dervishi", age: 14, position: "Qendër-Mbrojtës", email: "blendi.d@example.com" },
        { name: "Lirim", surname: "Demiri", age: 15, position: "Mbrojtës-Krahu", email: "lirim.d@example.com" },
        { name: "Agim", surname: "Morina", age: 14, position: "Mbrojtës-Krahu", email: "agim.m@example.com" },
        { name: "Ermal", surname: "Zeneli", age: 15, position: "Mbrojtës-Krahu", email: "ermal.z@example.com" },
        { name: "Blerim", surname: "Sadiku", age: 14, position: "Mbrojtës-Krahu", email: "blerim.s@example.com" },
        { name: "Gent", surname: "Shala", age: 15, position: "Mesfushor-Mbrojtës", email: "gent.s@example.com" },
        { name: "Leon", surname: "Veliu", age: 14, position: "Mesfushor-Mbrojtës", email: "leon.v@example.com" },
        { name: "Ardian", surname: "Zeqiri", age: 15, position: "Qendër-Mesfushor", email: "ardian.z@example.com" },
        { name: "Kreshnik", surname: "Ademi", age: 14, position: "Qendër-Mesfushor", email: "kreshnik.a@example.com" },
        { name: "Dren", surname: "Rexha", age: 15, position: "Qendër-Mesfushor", email: "dren.r@example.com" },
        { name: "Shpend", surname: "Bajraktari", age: 14, position: "Qendër-Mesfushor", email: "shpend.b@example.com" },
        { name: "Fisnik", surname: "Hasani", age: 15, position: "Sulmues-Krahu", email: "fisnik.h@example.com" },
        { name: "Arjan", surname: "Begaj", age: 14, position: "Sulmues-Krahu", email: "arjan.b@example.com" },
        { name: "Valton", surname: "Metaj", age: 15, position: "Sulmues-Krahu", email: "valton.m@example.com" },
        { name: "Shkëlzen", surname: "Haziri", age: 14, position: "Sulmues-Krahu", email: "shkelzen.h@example.com" },
        { name: "Edon", surname: "Ukaj", age: 15, position: "Qendër-Sulmues", email: "edon.u@example.com" },
        { name: "Luan", surname: "Kola", age: 14, position: "Qendër-Krahu", email: "luan.k@example.com" },
    ],


    u16: [
        { name: "Gezim", surname: "Ibri", age: 15, position: "Portier", email: "gezim.i@example.com" },
        { name: "Altin", surname: "Lila", age: 16, position: "Portier", email: "altin.l@example.com" },
        { name: "Besart", surname: "Dreshaj", age: 15, position: "Qendër-Mbrojtës", email: "besart.d@example.com" },
        { name: "Fatos", surname: "Zeneli", age: 15, position: "Qendër-Mbrojtës", email: "fatos.z@example.com" },
        { name: "Arianit", surname: "Kodra", age: 16, position: "Qendër-Mbrojtës", email: "arianit.k@example.com" },
        { name: "Admir", surname: "Berisha", age: 15, position: "Qendër-Mbrojtës", email: "admir.b@example.com" },
        { name: "Shpend", surname: "Gashi", age: 16, position: "Mbrojtës-Krahu", email: "shpend.g@example.com" },
        { name: "Lirim", surname: "Balaj", age: 15, position: "Mbrojtës-Krahu", email: "lirim.b@example.com" },
        { name: "Kujtim", surname: "Hasani", age: 15, position: "Mbrojtës-Krahu", email: "kujtim.h@example.com" },
        { name: "Valdrin", surname: "Thaçi", age: 16, position: "Mbrojtës-Krahu", email: "valdrin.th@example.com" },
        { name: "Ardian", surname: "Brahimi", age: 15, position: "Mesfushor-Mbrojtës", email: "ardian.b@example.com" },
        { name: "Shkelqim", surname: "Hoxha", age: 16, position: "Mesfushor-Mbrojtës", email: "shkelqim.h@example.com" },
        { name: "Florian", surname: "Metaj", age: 15, position: "Qendër-Mesfushor", email: "florian.m@example.com" },
        { name: "Ilir", surname: "Rexha", age: 16, position: "Qendër-Mesfushor", email: "ilir.r@example.com" },
        { name: "Dardan", surname: "Bytyqi", age: 15, position: "Qendër-Mesfushor", email: "dardan.b@example.com" },
        { name: "Alban", surname: "Zeka", age: 16, position: "Qendër-Mesfushor", email: "alban.z@example.com" },
        { name: "Gentian", surname: "Shyti", age: 15, position: "Sulmues-Krahu", email: "gentian.sh@example.com" },
        { name: "Besnik", surname: "Ahmeti", age: 16, position: "Sulmues-Krahu", email: "besnik.a@example.com" },
        { name: "Ardit", surname: "Selmani", age: 15, position: "Sulmues-Krahu", email: "ardit.s@example.com" },
        { name: "Festim", surname: "Osmani", age: 16, position: "Sulmues-Krahu", email: "festim.o@example.com" },
        { name: "Kreshnik", surname: "Leka", age: 15, position: "Qendër-Sulmues", email: "kreshnik.l@example.com" },
        { name: "Leonard", surname: "Pajaziti", age: 16, position: "Qendër-Sulmues", email: "leonard.p@example.com" },
    ],


    u17: [
        { name: "Alban", surname: "Shala", age: 16, position: "Portier", email: "alban.sh@example.com" },
        { name: "Artan", surname: "Hoxha", age: 16, position: "Portier", email: "artan.h@example.com" },
        { name: "Dion", surname: "Berisha", age: 17, position: "Qendër-Mbrojtës", email: "dion.b@example.com" },
        { name: "Eris", surname: "Kryeziu", age: 16, position: "Qendër-Mbrojtës", email: "eris.k@example.com" },
        { name: "Blerim", surname: "Rexhepi", age: 17, position: "Qendër-Mbrojtës", email: "blerim.r@example.com" },
        { name: "Florian", surname: "Gashi", age: 16, position: "Qendër-Mbrojtës", email: "florian.g@example.com" },
        { name: "Arlind", surname: "Nikqi", age: 17, position: "Mbrojtës-Krahu", email: "arlind.n@example.com" },
        { name: "Edvin", surname: "Hoti", age: 16, position: "Mbrojtës-Krahu", email: "edvin.h@example.com" },
        { name: "Leart", surname: "Bytyqi", age: 17, position: "Mbrojtës-Krahu", email: "leart.b@example.com" },
        { name: "Fjorel", surname: "Aliu", age: 16, position: "Mbrojtës-Krahu", email: "fjorel.a@example.com" },
        { name: "Granit", surname: "Zeqiri", age: 16, position: "Mesfushor-Mbrojtës", email: "granit.z@example.com" },
        { name: "Ermal", surname: "Shkreli", age: 17, position: "Mesfushor-Mbrojtës", email: "ermal.s@example.com" },
        { name: "Arian", surname: "Lluka", age: 16, position: "Qendër-Mesfushor", email: "arian.ll@example.com" },
        { name: "Samir", surname: "Kelmendi", age: 17, position: "Qendër-Mesfushor", email: "samir.k@example.com" },
        { name: "Lorik", surname: "Sadiku", age: 16, position: "Qendër-Mesfushor", email: "lorik.s@example.com" },
        { name: "Drilon", surname: "Mazrekaj", age: 17, position: "Qendër-Mesfushor", email: "drilon.m@example.com" },
        { name: "Fisnik", surname: "Rama", age: 16, position: "Sulmues-Krahu", email: "fisnik.r@example.com" },
        { name: "Valon", surname: "Shabani", age: 17, position: "Sulmues-Krahu", email: "valon.sh@example.com" },
        { name: "Ardit", surname: "Veseli", age: 16, position: "Sulmues-Krahu", email: "ardit.v@example.com" },
        { name: "Gezim", surname: "Demiri", age: 17, position: "Sulmues-Krahu", email: "gezim.d@example.com" },
        { name: "Lirim", surname: "Tahiri", age: 16, position: "Qendër-Sulmues", email: "lirim.t@example.com" },
        { name: "Ervin", surname: "Rexha", age: 17, position: "Qendër-Krahu", email: "ervin.r@example.com" },
    ],

    u18: [
        { name: "Ermal", surname: "Daka", age: 17, position: "Portier", email: "ermal.d@example.com" },
        { name: "Kreshnik", surname: "Leka", age: 18, position: "Portier", email: "kreshnik.l@example.com" },
        { name: "Ardit", surname: "Kryeziu", age: 18, position: "Qendër-Mbrojtës", email: "ardit.k@example.com" },
        { name: "Alban", surname: "Hoxha", age: 17, position: "Qendër-Mbrojtës", email: "alban.h@example.com" },
        { name: "Besart", surname: "Morina", age: 18, position: "Qendër-Mbrojtës", email: "besart.m@example.com" },
        { name: "Genc", surname: "Berisha", age: 17, position: "Qendër-Mbrojtës", email: "genc.b@example.com" },
        { name: "Flamur", surname: "Mazreku", age: 18, position: "Mbrojtës-Krahu", email: "flamur.m@example.com" },
        { name: "Arjon", surname: "Syla", age: 17, position: "Mbrojtës-Krahu", email: "arjon.s@example.com" },
        { name: "Fatjon", surname: "Krasniqi", age: 18, position: "Mbrojtës-Krahu", email: "fatjon.k@example.com" },
        { name: "Leonard", surname: "Gashi", age: 17, position: "Mbrojtës-Krahu", email: "leonard.g@example.com" },
        { name: "Adrian", surname: "Aliu", age: 18, position: "Mesfushor-Mbrojtës", email: "adrian.a@example.com" },
        { name: "Altin", surname: "Hoti", age: 17, position: "Mesfushor-Mbrojtës", email: "altin.h@example.com" },
        { name: "Arbër", surname: "Kastrati", age: 18, position: "Qendër-Mesfushor", email: "arber.k@example.com" },
        { name: "Dion", surname: "Kastrati", age: 17, position: "Qendër-Mesfushor", email: "dion.k@example.com" },
        { name: "Granit", surname: "Qelaj", age: 18, position: "Qendër-Mesfushor", email: "granit.q@example.com" },
        { name: "Ledian", surname: "Bytyqi", age: 17, position: "Qendër-Mesfushor", email: "ledian.b@example.com" },
        { name: "Shkelzen", surname: "Kalaja", age: 18, position: "Sulmues-Krahu", email: "shkelzen.k@example.com" },
        { name: "Almir", surname: "Hyseni", age: 17, position: "Sulmues-Krahu", email: "almir.h@example.com" },
        { name: "Blendi", surname: "Ahmeti", age: 18, position: "Sulmues-Krahu", email: "blendi.a@example.com" },
        { name: "Arion", surname: "Nuhiu", age: 17, position: "Sulmues-Krahu", email: "arion.n@example.com" },
        { name: "Fisnik", surname: "Saramati", age: 18, position: "Qendër-Sulmues", email: "fisnik.s@example.com" },
        { name: "Valdrin", surname: "Gashi", age: 17, position: "Qendër-Sulmues", email: "valdrin.g@example.com" },
    ],


    u19: [
        { name: "Ardit", surname: "Berisha", age: 18, position: "Portier", email: "ardit.b@example.com" },
        { name: "Ilir", surname: "Hoxha", age: 18, position: "Portier", email: "ilir.h@example.com" },
        { name: "Ervin", surname: "Krasniqi", age: 19, position: "Qendër-Mbrojtës", email: "ervin.k@example.com" },
        { name: "Flamur", surname: "Shabani", age: 18, position: "Qendër-Mbrojtës", email: "flamur.s@example.com" },
        { name: "Altin", surname: "Kurti", age: 19, position: "Qendër-Mbrojtës", email: "altin.k@example.com" },
        { name: "Besmir", surname: "Zeneli", age: 18, position: "Qendër-Mbrojtës", email: "besmir.z@example.com" },
        { name: "Alban", surname: "Pashaj", age: 18, position: "Mbrojtës-Krahu", email: "alban.p@example.com" },
        { name: "Gentian", surname: "Dervishi", age: 19, position: "Mbrojtës-Krahu", email: "gentian.d@example.com" },
        { name: "Arben", surname: "Rama", age: 18, position: "Mbrojtës-Krahu", email: "arben.r@example.com" },
        { name: "Ledian", surname: "Cani", age: 19, position: "Mbrojtës-Krahu", email: "ledian.c@example.com" },
        { name: "Kristian", surname: "Beqiri", age: 18, position: "Mesfushor-Mbrojtës", email: "kristian.b@example.com" },
        { name: "Arian", surname: "Demiri", age: 19, position: "Mesfushor-Mbrojtës", email: "arian.d@example.com" },
        { name: "Shkelzen", surname: "Hyseni", age: 18, position: "Qendër-Mesfushor", email: "shkelzen.h@example.com" },
        { name: "Valmir", surname: "Musa", age: 19, position: "Qendër-Mesfushor", email: "valmir.m@example.com" },
        { name: "Altin", surname: "Basha", age: 18, position: "Qendër-Mesfushor", email: "altin.b@example.com" },
        { name: "Elion", surname: "Gega", age: 19, position: "Qendër-Mesfushor", email: "elion.g@example.com" },
        { name: "Agon", surname: "Pali", age: 18, position: "Sulmues-Krahu", email: "agon.p@example.com" },
        { name: "Enis", surname: "Tafa", age: 19, position: "Sulmues-Krahu", email: "enis.t@example.com" },
        { name: "Rion", surname: "Mehmeti", age: 18, position: "Sulmues-Krahu", email: "rion.m@example.com" },
        { name: "Erjon", surname: "Lika", age: 19, position: "Sulmues-Krahu", email: "erjon.l@example.com" },
        { name: "Fisnik", surname: "Osmani", age: 18, position: "Qendër-Sulmues", email: "fisnik.o@example.com" },
        { name: "Kreshnik", surname: "Vokshi", age: 19, position: "Qendër-Krahu", email: "kreshnik.v@example.com" },
    ],

    u20: [
        { name: "Arben", surname: "Krasniqi", age: 20, position: "Portier", email: "arben.k@example.com" },
        { name: "Flamur", surname: "Berisha", age: 19, position: "Portier", email: "flamur.b@example.com" },
        { name: "Shkëlzen", surname: "Hasani", age: 19, position: "Qendër-Mbrojtës", email: "shkelzen.h@example.com" },
        { name: "Albion", surname: "Mehmeti", age: 20, position: "Qendër-Mbrojtës", email: "albion.m@example.com" },
        { name: "Erion", surname: "Shala", age: 20, position: "Qendër-Mbrojtës", email: "erion.s@example.com" },
        { name: "Adrian", surname: "Dervishi", age: 19, position: "Qendër-Mbrojtës", email: "adrian.d@example.com" },
        { name: "Ilir", surname: "Lika", age: 20, position: "Mbrojtës-Krahu", email: "ilir.l@example.com" },
        { name: "Kreshnik", surname: "Aliaj", age: 20, position: "Mbrojtës-Krahu", email: "kreshnik.a@example.com" },
        { name: "Besart", surname: "Gjini", age: 19, position: "Mbrojtës-Krahu", email: "besart.g@example.com" },
        { name: "Arlind", surname: "Zeqiri", age: 19, position: "Mbrojtës-Krahu", email: "arlind.z@example.com" },
        { name: "Fatjon", surname: "Beqiri", age: 20, position: "Mesfushor-Mbrojtës", email: "fatjon.b@example.com" },
        { name: "Granit", surname: "Morina", age: 19, position: "Mesfushor-Mbrojtës", email: "granit.m@example.com" },
        { name: "Erblin", surname: "Pajaziti", age: 19, position: "Qendër-Mesfushor", email: "erblin.p@example.com" },
        { name: "Kristian", surname: "Hoxha", age: 20, position: "Qendër-Mesfushor", email: "kristian.h@example.com" },
        { name: "Ardit", surname: "Kurti", age: 20, position: "Qendër-Mesfushor", email: "ardit.k@example.com" },
        { name: "Fisnik", surname: "Nikolli", age: 19, position: "Qendër-Mesfushor", email: "fisnik.n@example.com" },
        { name: "Dionis", surname: "Shehu", age: 19, position: "Sulmues-Krahu", email: "dionis.s@example.com" },
        { name: "Altin", surname: "Qyqalla", age: 20, position: "Sulmues-Krahu", email: "altin.q@example.com" },
        { name: "Visar", surname: "Metaj", age: 20, position: "Sulmues-Krahu", email: "visar.m@example.com" },
        { name: "Genc", surname: "Isufi", age: 19, position: "Sulmues-Krahu", email: "genc.i@example.com" },
        { name: "Liridon", surname: "Selimi", age: 20, position: "Qendër-Sulmues", email: "liridon.s@example.com" },
        { name: "Altin", surname: "Avdiaj", age: 19, position: "Qendër-Krahu", email: "altin.a@example.com" },
    ],

    u21: [
        { name: "Arbër", surname: "Dervishi", age: 20, position: "Portier", email: "arber.d@example.com" },
        { name: "Ilir", surname: "Kukaj", age: 21, position: "Portier", email: "ilir.k@example.com" },
        { name: "Besnik", surname: "Gashi", age: 21, position: "Qendër-Mbrojtës", email: "besnik.g@example.com" },
        { name: "Flamur", surname: "Hoxha", age: 20, position: "Qendër-Mbrojtës", email: "flamur.h@example.com" },
        { name: "Artan", surname: "Shala", age: 20, position: "Qendër-Mbrojtës", email: "artan.s@example.com" },
        { name: "Admir", surname: "Berisha", age: 21, position: "Qendër-Mbrojtës", email: "admir.b@example.com" },
        { name: "Arjan", surname: "Leka", age: 20, position: "Mbrojtës-Krahu", email: "arjan.l@example.com" },
        { name: "Blerim", surname: "Osmani", age: 21, position: "Mbrojtës-Krahu", email: "blerim.o@example.com" },
        { name: "Fidan", surname: "Krasniqi", age: 20, position: "Mbrojtës-Krahu", email: "fidan.k@example.com" },
        { name: "Mentor", surname: "Hoti", age: 21, position: "Mbrojtës-Krahu", email: "mentor.h@example.com" },
        { name: "Jeton", surname: "Selimi", age: 20, position: "Mesfushor-Mbrojtës", email: "jeton.s@example.com" },
        { name: "Nertil", surname: "Deda", age: 21, position: "Mesfushor-Mbrojtës", email: "nertil.d@example.com" },
        { name: "Altin", surname: "Hajdari", age: 21, position: "Qendër-Mesfushor", email: "altin.h@example.com" },
        { name: "Arion", surname: "Pashku", age: 20, position: "Qendër-Mesfushor", email: "arion.p@example.com" },
        { name: "Kreshnik", surname: "Bytyqi", age: 21, position: "Qendër-Mesfushor", email: "kreshnik.b@example.com" },
        { name: "Ermal", surname: "Selmani", age: 20, position: "Qendër-Mesfushor", email: "ermal.s@example.com" },
        { name: "Shkelzen", surname: "Rruci", age: 21, position: "Sulmues-Krahu", email: "shkelzen.r@example.com" },
        { name: "Valon", surname: "Mazrekaj", age: 20, position: "Sulmues-Krahu", email: "valon.m@example.com" },
        { name: "Ledion", surname: "Ramaj", age: 21, position: "Sulmues-Krahu", email: "ledion.r@example.com" },
        { name: "Arben", surname: "Nuza", age: 20, position: "Sulmues-Krahu", email: "arben.n@example.com" },
        { name: "Visar", surname: "Syla", age: 20, position: "Qendër-Sulmues", email: "visar.s@example.com" },
        { name: "Tomor", surname: "Shyti", age: 21, position: "Qendër-Krahu", email: "tomor.s@example.com" },
    ],
    // Shto më shumë grupmosha dhe lojtarë këtu...
};

// Funksioni për të shfaqur lojtarët e një grupmoshe
function showPlayers(group) {
    const container = document.getElementById("players-container");
    container.innerHTML = ""; // Pastroni përmbajtjen e mëparshme

    if (playersData[group]) {
        playersData[group].forEach((player, index) => {
            const playerBox = document.createElement("div");
            playerBox.className = "player-box";
            playerBox.innerHTML = `
                <h4>${index + 1}. Emri: ${player.name} ${player.surname}</h4>
                <p>Mosha: ${player.age}</p>
                <p>Grupmosha: ${group.toUpperCase()}</p>
                <p>Pozita: ${player.position}</p>
                <p>Email: ${player.email}</p>
            `;
            container.appendChild(playerBox);
        });
    } else {
        // Mesazh për grupmoshat pa lojtarë të definuar
        container.innerHTML = `<p>Nuk ka lojtarë të regjistruar për grupmoshën ${group.toUpperCase()}.</p>`;
    }

    // Shfaqni seksionin
    container.style.display = "flex";
    container.style.flexWrap = "wrap";
    container.style.justifyContent = "center";
}

function toggleMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');
}