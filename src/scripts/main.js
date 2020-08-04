import '../sass/style.scss';
// global $ as jQuery / wp jQuery v1.12.4

$ = jQuery;

import Router from "./utils/Router";
import common from "./routes/common";
import home from "./routes/home";
import singleProduct from "./routes/singleProduct";

const routes = new Router({
    common,
    home,
    singleProduct 
});

ready(function () {
    routes.loadEvents();
});

function ready(func) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        func();
    } else {
        document.addEventListener("DOMContentLoaded", func);
    }
}