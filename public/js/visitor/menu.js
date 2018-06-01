var menuBoolean = false;

function menuAction() {




    if (menuBoolean == false) {
        menuBoolean = true;

        var b1 = document.getElementById('bodyMove1');
        var b2 = document.getElementById('bodyMove2');
        var b3 = document.getElementById('shadowMenu');

        b1.classList.add('bodyMove');
        b2.classList.add('bodyMove');
        b3.classList.add('display');

        b1.classList.add('active');
        b2.classList.add('active');

        setTimeout(function() {

            b3.classList.add('active');

        }, 10);


    } else {
        menuBoolean = false;

        var b1 = document.getElementById('bodyMove1');
        var b2 = document.getElementById('bodyMove2');
        var b3 = document.getElementById('shadowMenu');

        b1.classList.remove('active');
        b2.classList.remove('active');
        b3.classList.remove('active');

        setTimeout(function() {
            b1.classList.remove('bodyMove');
            b2.classList.remove('bodyMove');
            b3.classList.remove('display');
        }, 700);

    }
}