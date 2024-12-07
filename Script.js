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
        // Shto lojtarët e tjerë këtu...
    ],
    u12: [
        { name: "Blerim", surname: "Hasani", age: 12, position: "Portier", email: "blerim.h@example.com" },
        { name: "Fidan", surname: "Berisha", age: 12, position: "Mesfushor", email: "fidan.b@example.com" },
        // Shto lojtarët e tjerë këtu...
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