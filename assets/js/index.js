import {list} from "./list.js";

const button = document.querySelector("#download");

const os = platform.os.family;
if(list[0].system.windows){
    button.href = `assets/games/${list[0].name}/windows/${list[0].name}.${list[0].extension.windows}`;
}
if(list[0].system.mac){
    if (os == "OS X") {
        button.href = `assets/games/${list[0].name}/macos/${list[0].name}.${list[0].extension.mac}`;
    }
}