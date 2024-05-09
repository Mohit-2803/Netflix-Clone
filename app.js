
const language = document.getElementById("language");
const lan_bar = document.querySelector('.language');
// const start = document.getElementById('started');

language.addEventListener(
    "click",
    language_func
);

let click = 1;
let langFlag = 0;

function language_func() {

    if (click == 1) {
        lan_bar.style.display = "block";
        language.style.marginTop = "3rem";
        langFlag = 1;
    }

    if (click == 2) {
        lan_bar.style.display = "none";
        language.style.marginTop = "0";
        langFlag = 0;
    }

    if (langFlag == 1) {
        click = 2;
    }
    else {
        click = 1;
    }
}

document.getElementById('hindi').onclick = () => {
    language.innerHTML = '<i class="bi bi-globe"></i> Hindi <i class="bi bi-caret-down-fill"></i>';
    lan_bar.style.display = "none";
    language.style.marginTop = "0";

    langFlag = 0;

    //changing page to hindi
    // document.getElementsByClassName('unlimit').style.display = "none";
}

document.getElementById('english').onclick = () => {
    language.innerHTML = '<i class="bi bi-globe"></i> English <i class="bi bi-caret-down-fill"></i>';
    lan_bar.style.display = "none";
    language.style.marginTop = "0";
    langFlag = 0;
}

function start() {
    // emailValue = document.getElementById('email').value;
    if (document.getElementById('email').value == "") {
        document.getElementById('required').style.display = "block";
        document.getElementById('email').style.borderColor = 'red';
    }
};


const plus1 = document.getElementById('plus1');
const plus2 = document.getElementById('plus2');
const plus3 = document.getElementById('plus3');
const plus4 = document.getElementById('plus4');
const plus5 = document.getElementById('plus5');
const plus6 = document.getElementById('plus6');

plus1.addEventListener('click', display1);
plus2.addEventListener('click', display2);
plus3.addEventListener('click', display3);
plus4.addEventListener('click', display4);
plus5.addEventListener('click', display5);
plus6.addEventListener('click', display6);

let plusClick1 = 1;
let plusFlag1 = 0;

let plusClick2 = 1;
let plusFlag2 = 0;

let plusClick3 = 1;
let plusFlag3 = 0;

let plusClick4 = 1;
let plusFlag4 = 0;

let plusClick5 = 1;
let plusFlag5 = 0;

let plusClick6 = 1;
let plusFlag6 = 0;



function display1() {
    if (plusClick1 == 1) {
        document.getElementById('answer1').style.display = 'block';
        document.getElementById('answer2').style.display = 'none';
        document.getElementById('answer3').style.display = 'none';
        document.getElementById('answer4').style.display = 'none';
        document.getElementById('answer5').style.display = 'none';
        document.getElementById('answer6').style.display = 'none';
        plusFlag1 = 1;
    }

    if (plusClick1 == 2) {
        document.getElementById('answer1').style.display = 'none';
        plusFlag1 = 0;
    }

    if (plusFlag1 == 1) {
        plusClick1 = 2;
    }
    else {
        plusClick1 = 1;
    }
}

function display2() {
    if (plusClick2 == 1) {
        document.getElementById('answer1').style.display = 'none';
        document.getElementById('answer2').style.display = 'block';
        document.getElementById('answer3').style.display = 'none';
        document.getElementById('answer4').style.display = 'none';
        document.getElementById('answer5').style.display = 'none';
        document.getElementById('answer6').style.display = 'none';
        plusFlag2 = 1;
    }

    if (plusClick2 == 2) {
        document.getElementById('answer2').style.display = 'none';
        plusFlag2 = 0;
    }

    if (plusFlag2 == 1) {
        plusClick2 = 2;
    }
    else {
        plusClick2 = 1;
    }
}

function display3() {
    if (plusClick3 == 1) {
        document.getElementById('answer1').style.display = 'none';
        document.getElementById('answer2').style.display = 'none';
        document.getElementById('answer3').style.display = 'block';
        document.getElementById('answer4').style.display = 'none';
        document.getElementById('answer5').style.display = 'none';
        document.getElementById('answer6').style.display = 'none';
        plusFlag3 = 1;
    }

    if (plusClick3 == 2) {
        document.getElementById('answer3').style.display = 'none';
        plusFlag3 = 0;
    }

    if (plusFlag3 == 1) {
        plusClick3 = 2;
    }
    else {
        plusClick3 = 1;
    }
}

function display4() {
    if (plusClick4 == 1) {
        document.getElementById('answer1').style.display = 'none';
        document.getElementById('answer2').style.display = 'none';
        document.getElementById('answer3').style.display = 'none';
        document.getElementById('answer4').style.display = 'block';
        document.getElementById('answer5').style.display = 'none';
        document.getElementById('answer6').style.display = 'none';
        plusFlag4 = 1;
    }

    if (plusClick4 == 2) {
        document.getElementById('answer4').style.display = 'none';
        plusFlag4 = 0;
    }

    if (plusFlag4 == 1) {
        plusClick4 = 2;
    }
    else {
        plusClick4 = 1;
    }
}

function display5() {
    if (plusClick5 == 1) {
        document.getElementById('answer1').style.display = 'none';
        document.getElementById('answer2').style.display = 'none';
        document.getElementById('answer3').style.display = 'none';
        document.getElementById('answer4').style.display = 'none';
        document.getElementById('answer5').style.display = 'block';
        document.getElementById('answer6').style.display = 'none';
        plusFlag5 = 1;
    }

    if (plusClick5 == 2) {
        document.getElementById('answer5').style.display = 'none';
        plusFlag5 = 0;
    }

    if (plusFlag5 == 1) {
        plusClick5 = 2;
    }
    else {
        plusClick5 = 1;
    }
}

function display6() {
    if (plusClick6 == 1) {
        document.getElementById('answer1').style.display = 'none';
        document.getElementById('answer2').style.display = 'none';
        document.getElementById('answer3').style.display = 'none';
        document.getElementById('answer4').style.display = 'none';
        document.getElementById('answer5').style.display = 'none';
        document.getElementById('answer6').style.display = 'block';
        plusFlag6 = 1;
    }

    if (plusClick6 == 2) {
        document.getElementById('answer6').style.display = 'none';
        plusFlag6 = 0;
    }

    if (plusFlag6 == 1) {
        plusClick6 = 2;
    }
    else {
        plusClick6 = 1;
    }
}

