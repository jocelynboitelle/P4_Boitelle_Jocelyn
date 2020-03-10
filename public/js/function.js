function confirmDelete(path) {
    const parentLocation = this.document.location.origin;

    if (confirm("Voulez-vous vraiment supprimer cet élément ?")) {
        const deleteUrl = parentLocation + '/' + path;
        location.replace(deleteUrl);
    }
}
