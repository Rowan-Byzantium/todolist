document.querySelectorAll('.task_button-cross').forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation()
        deleteTask(e.target.dataset.idTask, e.target.dataset.pos)
            .then(deleteResponse => {
                if (!deleteResponse.result) {
                    console.error('Problème avec la requête.');
                    return;
                }
                document.querySelectorAll('.task-list').forEach(element => {
                    if (e.target.dataset.idTask === element.closest('.task-list').dataset.id){
                        e.target.closest('.task-list').remove()
                    }
                });
            });
    });
});


function deleteTask(idTask, positionTask) {
    const data = {
        action: 'deleteTask',
        idTask: idTask,
        positionTask: positionTask
    };
    return callAPI('DELETE', data);
}

async function callAPI(method, data) {
    try {
        const response = await fetch("queries/api.php", {
            method: method,
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return response.json();
    }
    catch (error) {
        console.error("Unable to load datas from the server : " + error);
    }
}