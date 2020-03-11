function confirmDelete(path) {
    const parentLocation = this.document.location.origin;

    if (confirm("Voulez-vous vraiment supprimer cet élément ?")) {
        const deleteUrl = parentLocation + '/' + path;
        location.replace(deleteUrl);
    }
}

var prevScrollpos = window.pageYOffset;

window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("top-bar").style.top = "0";
    } else {
        document.getElementById("top-bar").style.top = "-80px";
    }
    prevScrollpos = currentScrollPos;
}
