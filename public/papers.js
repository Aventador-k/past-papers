// nav bar
const menu = document.querySelector('#menu');
const navbar = document.querySelector('.navbar');

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
});


// object made

let data = [
    { year: '2023', exams: 'MATHS', class: 'pp1' },
    { year: '2006', exams: 'MATHS', class: 'pp1' },
    { year: '2003', exams: 'MATHS', class: 'pp1' },
    { year: '2024', exams: 'MATHS', class: 'pp1' },
    { year: '2005', exams: 'MATHS', class: 'pp1' },
    { year: '2004', exams: 'MATHS', class: 'pp1' },
    { year: '2015', exams: 'MATHS', class: 'pp1' },
    { year: '2013', exams: 'MATHS', class: 'pp1' }

];

// function to create a card element

// function createcards() {
//     let cardcontainer = document.getElementById('cardcontainer');


//     data.forEach(function (card) {
//         let cardelement = document.createElement('div');
//         cardelement.classList.add('card');

//         let h31element = document.createElement('h3');
//         h31element.textContent = 'class: ' + card.class;

//         let h3element = document.createElement('h3');
//         h3element.textContent = 'year: ' + card.year;

//         let pelement = document.createElement('p');
//         pelement.textContent = 'exams: ' + card.exams;

//         let btnelement = document.createElement('button');
//         btnelement.textContent = 'PURCHASE';
//         btnelement.classList.add('button');

//         cardelement.appendChild(h3element);
//         cardelement.appendChild(h31element);
//         cardelement.appendChild(pelement);
//         cardelement.appendChild(btnelement);

//         cardcontainer.appendChild(cardelement);
//     });

// }


// function to filter the cards based on search input

function filtercards() {
    let searchinput = document.getElementById('searchinput').value.toLowerCase();
    let cards = document.getElementsByClassName('card');

    for (let i = 0; i < cards.length; i++) {
        let card = cards[i];

        let h3 = card.querySelector('h3');
        let h3text = h3.textContent.toLowerCase();

        let h31 = card.querySelector('h3');
        let h31text = h31.textContent.toLowerCase();

        let p = card.querySelector('p');
        let ptext = p.textContent.toLowerCase();

        if (h3text.includes(searchinput) || h31text.includes(searchinput) || ptext.includes(searchinput)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }

    }
}


document.getElementById('searchinput').addEventListener('input', filtercards);



window.onload = createcards;
