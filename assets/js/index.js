const game = "skylife";
const extension = "dmg";

const button = document.querySelector("#download");

const os = platform.os.family;
if (os == "OS X") {
    button.href = `assets/games/skylife/macos/${game}.${extension}`;
}