const games = [
    {
        name: "skylife",
        extension: "dmg",
        windowsVersion: true,
        macVersion: true
    },
    {
        name: "nukeradiation",
        extension: undefined,
        windowsVersion: true,
        macVersion: false
    },
    {
        name: "thefinder",
        extension: undefined,
        windowsVersion: true,
        macVersion: false
    },
    {
        name: "townDawn",
        extension: undefined,
        windowsVersion: true,
        macVersion: false
    },
    {
        name: "buldo",
        extension: undefined,
        windowsVersion: true,
        macVersion: false
    }

];

const spanOs = document.querySelectorAll(".os-icons");

for (let index = 0; index < games.length; index++) {

    if (games[index].windowsVersion) {
        setWindows(index);
    }
    if (games[index].macVersion) {
        setMac(index);
    }
    
}

function setWindows(i) {
    let windowsIcon = document.createElement("img");
    windowsIcon.src = "assets/img/games/os-icons/windows.svg";
    windowsIcon.alt = "Windows Icon";
    windowsIcon.width = "20";
    spanOs[i].append(windowsIcon);
}

function setMac(i) {
    let macIcon = document.createElement("img");
    macIcon.src = "assets/img/games/os-icons/macos.svg";
    macIcon.alt = "MacOS Icon";
    macIcon.width = "20";
    spanOs[i].append(macIcon);
}

if(navigator.appVersion.indexOf("Mac") != -1){

    const buttonsCarroussel = document.querySelectorAll("#download")
    const buttonsCard = document.querySelectorAll("#download-card");

    function macGames(){
        for (let i = 0; i < 3; i++) {
            if(games[i].macVersion){
                buttonsCarroussel[i].href = `assets/games/${games[i].name}/macos/${games[i].name}.${games[i].extension}`;
            }
        }

        for (let index = 0; index < games.length; index++) {
            if(games[index].macVersion){
                buttonsCard[index].href = `assets/games/${games[index].name}/macos/${games[index].name}.${games[index].extension}`;
            }
        }
    }

    macGames();

}