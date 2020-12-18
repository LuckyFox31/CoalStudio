if(navigator.appVersion.indexOf("Mac") != -1){

    const games = [
        {
            name: "skylife",
            extension: "zip",
            macVersion: true
        },
        {
            name: "nukeradiation",
            extension: undefined,
            macVersion: false
        },
        {
            name: "thefinder",
            extension: undefined,
            macVersion: false
        },
        {
            name: "townDawn",
            extension: undefined,
            macVersion: false
        },
        {
            name: "buldo",
            extension: undefined,
            macVersion: false
        }
    
    ];

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