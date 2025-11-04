let taskColumns = document.querySelectorAll('.taskList');
let showListBtn = document.querySelectorAll('.showList');
let taskCards = document.querySelectorAll('.taskCard');
toggleTaskDetails();
dragTasks();
dropAndLoadTasks();

/*Permite desplegar/cerrar las tablas de tareas, activando y desactivando su estado (clase) active*/
function toggleTaskDetails() {
    for (let i = 0; i < showListBtn.length; i++) {
        showListBtn[i].addEventListener('click', function () {
            taskColumns[i].classList.toggle('active');
        });
    }
}

/*Aplica la función de arrastre en las tarjetas*/
function dragTasks() {
    taskCards.forEach(card => {
        if (card.getAttribute('data-status') !== 'done') {
            card.addEventListener('dragstart', () => {
                card.classList.add('dragging');
            });
        }
    });
}

/*Añade el comportamiento para que las columnas puedan recibir las tarjetas, tabmién evita que se incluya contenido si el ratón 
está fuera de la columna*/
function dropAndLoadTasks() {
    taskColumns.forEach(column => {
        column.addEventListener('dragenter', e => {
            e.preventDefault();
            column.classList.add('drag-over');
        });

        column.addEventListener('dragover', e => {
            e.preventDefault();
            e.target.classList.add('drag-over');
        });

        column.addEventListener('dragleave', e => {
            e.target.classList.remove('drag-over');
        });

        column.addEventListener('drop', e => {
            e.preventDefault();
            const card = document.querySelector('.dragging');
            column.appendChild(card);
            card.dataset.status = column.getAttribute('data-status')

            let taskId = card.getAttribute('data-task-id');
            let status = column.getAttribute('data-status');

            /*Quita el evento de arrastre y la propiedad si esta en 'DONE'*/
            if (card.dataset.status == 'done'){
                card.setAttribute('draggable', false)
                card.removeEventListener('dragstart')
            }

            updateTaskStatus(taskId, status);
        });
    });
}

/*Al cambiar la tarjeta de columna, se prepara la request para el UPDATE a la BD con la ID de la tarea y el nuevo estado.*/
function updateTaskStatus(taskId, status) {
    fetch('/updateStatus/${taskId}', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id: taskId,
            status: status
        }),
    })
}