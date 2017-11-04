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
    constructor(imageUrl, enabled) {
        this.imageUrl = imageUrl;
        this.enabled = enabled;
    }
}

const fashionImages = [
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false),
    new FashionImage('http://lorempixel.com/300/400/fashion/', false)
];

function enableFashionImage(begin, size) {
    const beginInt = parseInt(begin);
    const sizeInt = parseInt(size);
    let i = begin;
    makeAllFashionImagesDisabled();
    while (i < begin + size || i < fashionImages.length) {
        fashionImages[i].enabled = true;
        i++;
    }
}

function showFashionCards() {
    const fashionRow = document.getElementById('fashion-row');
    let rowIndex = 0;
    fashionRow.innerHTML = '';
    do {
        if (fashionImages[rowIndex].enabled) {
            fashionRow.innerHTML +=
                '  <div class="col s4"><img src= ' + fashionImages[rowIndex].imageUrl + '/></div>';
        }
        rowIndex++;
    } while (fashionImages[rowIndex] !== null);
}

function makeAllFashionImagesDisabled() {
    for (let i = 0; i < fashionImages.length; i++) {
        fashionImages[i].enabled = false;
    }
}

enableFashionImage(0, 3);
showFashionCards();