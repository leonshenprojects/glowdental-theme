function wrap(el, wrapper) {
    el.parentNode.insertBefore(wrapper, el);
    wrapper.appendChild(el);
}

function addLindaPageLink() {
    const anchor = document.createElement('a');
    anchor.href = '/about-linda';

    wrap(document.querySelector(".customStaffTile--linda"), anchor);
}

if (document.querySelector(".customStaffTile--linda")) {
    addLindaPageLink();
}