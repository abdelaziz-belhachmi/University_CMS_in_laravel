function toggleInfo(licenseElement) {
    var infoParagraph = licenseElement.querySelector('p');
    infoParagraph.style.display = (infoParagraph.style.display === 'block') ? 'none' : 'block';
}