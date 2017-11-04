//document.writeln('<h1>Our new web page with JS!</h1>');

document.getElementById('users-table')
    .onclick = function () {
    window.alert('Lista jest aktualizowana codziennie o północy.')
};

const button = document.getElementById('button-js');
button.addEventListener('click', function () {
    console.log('alal')
    let allButtonsOnSite = document.getElementsByClassName('btn');
    for (let i = 0; i < allButtonsOnSite.length; i++) {
        let currentButton = allButtonsOnSite[i];
        if (currentButton.style.backgroundColor === 'blue') {
            allButtonsOnSite[i].style.backgroundColor = 'red';
        } else {
            allButtonsOnSite[i].style.backgroundColor = 'blue';
        }
    }
});

class FashionImage {
    constructor(imageUrl, imageEnabled) {
        this.imageUrl = imageUrl;
        this.imageEnabled = imageEnabled;
    }
}

let fashionImages = [
    new FashionImage('images/fashion1.jpg', false),
    new FashionImage('images/fashion2.jpg', false),
    new FashionImage('images/fashion3.jpg', false),
    new FashionImage('images/fashion4.jpg', false),
    new FashionImage('images/fashion5.jpg', false),
    new FashionImage('images/fashion6.jpg', false)
];

function enableFashionImage(begin, size) {
    const beginInt = parseInt(begin);
    const sizeInt = parseInt(size);
    let i = begin;
    makeAllFashionImagesDisabled();
    while (i < beginInt + sizeInt) {
        fashionImages[i].imageEnabled = true;
        i++;
    }
}

function showFashionCards() {
    const fashionRow = document.getElementById('fashion-row');
    let rowIndex = 0;
    fashionRow.innerHTML = '';
    do {
        if (fashionImages[rowIndex] && fashionImages[rowIndex].imageEnabled) {
            fashionRow.innerHTML +=
                '  <div class="col s4"><img src= ' + fashionImages[rowIndex].imageUrl + '/></div>';
        }
        rowIndex++;
    } while (rowIndex<fashionImages.length);
}

function makeAllFashionImagesDisabled() {
    for (let i = 0; i < fashionImages.length; i++) {
        fashionImages[i].imageEnabled = false;
    }
}

let actualStartImage = 0;
let showFashionImageCount = '3';

enableFashionImage(actualStartImage, showFashionImageCount);
showFashionCards();

