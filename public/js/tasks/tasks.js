let tasklist = document.getElementsByClassName('taskList');
let showListBtn = document.getElementsByClassName('showList');
toggleTaskDetails();

function toggleTaskDetails() {
    for (let i = 0; i < showListBtn.length; i++) {
        showListBtn[i].addEventListener('click', function() {
            tasklist[i].classList.toggle('active');
        });
    }
}



