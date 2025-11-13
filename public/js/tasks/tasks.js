let taskColumns = document.querySelectorAll('.taskList');
let showListBtn = document.querySelectorAll('.showList');
let taskCards = document.querySelectorAll('.taskCard');

toggleTaskDetails();
dragTasks();
dropAndLoadTasks();

/* Permite desplegar/cerrar las tablas de tareas */
function toggleTaskDetails() {
    for (let i = 0; i < showListBtn.length; i++) {
        showListBtn[i].addEventListener('click', function () {
            taskColumns[i].classList.toggle('active');
        });
    }
}

/* Aplica la función de arrastre en las tarjetas */
function dragTasks() {
    taskCards.forEach(card => {
        if (card.getAttribute('data-status') !== 'done') {
            card.setAttribute('draggable', true);

            card.addEventListener('dragstart', e => {
                setTimeout(() => card.classList.add('dragging'), 0);
            });

            card.addEventListener('dragend', e => {
                card.classList.remove('dragging');
            });
        }
    });
}

/* Añade el comportamiento para que las columnas puedan recibir las tarjetas */
function dropAndLoadTasks() {
    taskColumns.forEach(column => {
        column.addEventListener('dragenter', e => {
            e.preventDefault();
            column.classList.add('drag-over');
        });

        column.addEventListener('dragover', e => {
            e.preventDefault();
        });

        column.addEventListener('dragleave', e => {
            column.classList.remove('drag-over');
        });

        column.addEventListener('drop', e => {
            e.preventDefault();
            column.classList.remove('drag-over');

            const card = document.querySelector('.dragging');
            if (!card) return; 

            column.appendChild(card);
            const taskId = card.getAttribute('data-task-id');
            const status = column.getAttribute('data-status');

            card.dataset.status = status;

            if (status === 'done') {
                card.setAttribute('draggable', false);
            }

            updateTaskStatus(taskId, status);
        });
    });
}

/* Actualiza el estado de la tarea en la BD */
function updateTaskStatus(taskId, status) {
    fetch(`/updateStatus/${taskId}`, { 
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id: taskId,
            status: status
        }),
    });
}