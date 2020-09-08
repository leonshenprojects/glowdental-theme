function services() {
    var treamentLinks = document.querySelectorAll(".services__treatment .wpb_wrapper .text-with-icon a");

    treamentLinks.forEach(function(link) {
        link.removeAttribute("title");
    });
}

if (document.getElementsByClassName("services").length) {
    services();
}