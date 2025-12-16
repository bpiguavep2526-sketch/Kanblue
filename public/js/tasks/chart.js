/**
 * Variables de los gráficos y contadores de tareas por estado y por usuario.
 */
let taskChart = document.querySelector("#taskChart")
let userChart = document.querySelector("#userChart")
let backlogTasks = 0, todoTasks = 0, inProgressTasks = 0, doneTasks = 0
let usersChart = null

getAllTasksStatus()
let seeUserdata = document.querySelector("#userChart")
seeUserdata.addEventListener("click", loadChartByUser)

/**
 * Configuración de datos y creación del gráfico de pastel (pie) del total de tareas con cada estado.
 */
const data = {
    labels: ["BACKLOG", "IN PROGRESS", "TODO", "DONE"],
    datasets: [{
        data: [backlogTasks, todoTasks, inProgressTasks, doneTasks],
        backgroundColor: [
            'rgb(31, 204, 242)',
            'rgb(242, 5, 5)',
            'rgb(242, 96, 5)',
            'rgb(50, 240, 63)'
        ],
        hoverOffset: 4
    }]
}

const myChart = new Chart(
    taskChart,
    {
        type: 'pie',
        data: data
    }
)

/**
 * Cuenta todas las tareas del proyecto según su estado.
 * @function getAllTasksStatus
 */
function getAllTasksStatus() {
    tasks.forEach(task => {
        switch (task.id_estado) {
            case '1':
                backlogTasks++;
                break;
            case '2':
                todoTasks++;
                break;
            case '3':
                inProgressTasks++;
                break;
            case '4':
                doneTasks++;
                break;
        }
    });
}

/**
 * Filtra las tareas según el usuario seleccionado, y carga un gráfico que indica
 * la cantidad de tareas x estado. Comprueba si ya existe un gráfico previo, si lo hay lo destruye.
 * @function loadChartByUser
 */
function loadChartByUser() {

    let userSelector = document.querySelector("#selectUser");
    let userId = userSelector.value;

    let userTasks = tasks.filter(task => task.id_usuario == userId);

    let userBacklogTasks = 0;
    let userTodoTasks = 0;
    let userInProgressTasks = 0;
    let userDoneTasks = 0;

    userTasks.forEach(task => {
        switch (task.id_estado) {
            case '1':
                userBacklogTasks++;
                break;
            case '2':
                userTodoTasks++;
                break;
            case '3':
                userInProgressTasks++;
                break;
            case '4':
                userDoneTasks++;
                break;
        }
    });

    const userdata = {
        labels: ["BACKLOG", "IN PROGRESS", "TODO", "DONE"],
        datasets: [{
            label: "Backlog",
            data: [userBacklogTasks, userTodoTasks, userInProgressTasks, userDoneTasks],
            backgroundColor: [
                'rgb(31, 204, 242)',
                'rgb(242, 5, 5)',
                'rgb(242, 96, 5)',
                'rgb(50, 240, 63)'
            ],
            hoverOffset: 4
        }]
    }
    
    let userChart = document.querySelector("#userChartStats")

    if (usersChart) {
        usersChart.destroy();
    }

    usersChart = new Chart(userChart, {
        type: 'bar',
        data: userdata,
        options: {
            indexAxis: 'y',
            responsive: true,
            scales: {
                x: { beginAtZero: true }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
}