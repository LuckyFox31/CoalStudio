const game = "skylife";
const extension = "zip";

const button = document.querySelector("#download");

if(navigator.appVersion.indexOf("Mac") != -1){
    button.href = `assets/games/skylife/macos/${game}.${extension}`;
}