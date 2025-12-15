/**
 * Permite desplegar o cerrar las listas de tareas al presionar el botón correspondiente.
 * @function toggleTaskDetails
 */
function toggleTaskDetails() {
    for (let i = 0; i < showListBtn.length; i++) {
        showListBtn[i].addEventListener('click', function () {
            taskColumns[i].classList.toggle('active');
        });
    }
}

/**
 * Permite arrastrar las tarjetas que no están marcadas como "done".
 * Permite inicar la acción de arrastrar asignando la clase Dragging.
 * @function dragTasks
 */
function dragTasks() {
    taskCards.forEach(card => {
        if (card.getAttribute('data-status') !== 'done') {
            card.setAttribute('draggable', true);

            card.addEventListener('dragstart', () => {
                setTimeout(() => card.classList.add('dragging'), 0);
            });

            card.addEventListener('dragend', () => {
                card.classList.remove('dragging');
            });
        }
    });
}

/**
 * Permite soltar las tarjetas en otras columnas y actualiza su estado al hacerlo.
 * Realiza acciones según sie stá encimad de una columna, se suelta fuera o dentor de una columna...
 * @function dropAndLoadTasks
 */
function dropAndLoadTasks() {
    taskColumns.forEach(column => {
        column.addEventListener('dragenter', e => {
            e.preventDefault();
            column.classList.add('drag-over');
        });

        column.addEventListener('dragover', e => {
            e.preventDefault();
        });

        column.addEventListener('dragleave', () => {
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

/**
 * Envía al servidor el nuevo estado de la tarea mediante fetch.
 * @function updateTaskStatus
 * @param {string} taskId - ID de la tarea.
 * @param {string} status - Estado de la columna donde se arrastró la tarea.
 */
function updateTaskStatus(taskId, status) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`http://localhost/Kanblue/public/updateStatus/${taskId}/${status}`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    });
}