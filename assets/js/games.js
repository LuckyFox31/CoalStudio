import {list} from "./list.js";

const os = platform.os.family;
const buttonsCarroussel = document.querySelectorAll("#download");
const buttonsCard = document.querySelectorAll("#download-card");
const osIcons = document.querySelectorAll(".os-icons");

for (let index = 0; index < list.length; index++) {
    if(list[index].system.windows){
        setWindows(index);
        buttonsCard[index].href = `assets/games/${list[index].name}/windows/${list[index].name}.${list[index].extension.windows}`;
    }
    if(list[index].system.mac){
        setMac(index);
        if (os == "OS X") {
            buttonsCard[index].href = `assets/games/${list[index].name}/macos/${list[index].name}.${list[index].extension.mac}`;
        }
    }
    if (list[index].inCarroussel) {
        if (os == "OS X" && list[index].system.mac) {
            buttonsCarroussel[index].href = `assets/games/${list[index].name}/macos/${list[index].name}.${list[index].extension.mac}`;
        } else {
            buttonsCarroussel[index].href = `assets/games/${list[index].name}/windows/${list[index].name}.${list[index].extension.windows}`;
        }
    }
}

function setWindows(index){
    let windowsIcon = document.createElement("img");
    windowsIcon.src = "assets/img/games/os-icons/windows.svg";
    windowsIcon.alt = "Windows Icon";
    windowsIcon.width = "20";
    osIcons[index].append(windowsIcon);
}

function setMac(index) {
    let macIcon = document.createElement("img");
    macIcon.src = "assets/img/games/os-icons/macos.svg";
    macIcon.alt = "MacOS Icon";
    macIcon.width = "20";
    osIcons[index].append(macIcon);
}