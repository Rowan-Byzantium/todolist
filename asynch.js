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
                    if (e.target.dataset.idTask === element.closest('.task-list').dataset.id) {
                        e.target.closest('.task-list').remove()
                    }
                });
            });
    });
});

document.querySelectorAll('.button-param').forEach(btn => {
    btn.addEventListener("click", function (event) {
        const id = this.dataset.id; //récupère l'id de la tâche correspondante au bouton sur lequel on a cliqué
        const li = event.target.closest('li'); //récupère le plus proche li parent de l'event target
        const descri = li.querySelector('[data-description-id="' + id + '"]').innerText; //recupère le texte de la description de la tâche 

        const form = document.getElementById("modif-form") //récupère le formulaire fixe du HTML

        form.addEventListener('submit', e => {
            e.preventDefault(); //permet d'empêcher la fonction de réagir par défaut, en rechargeant la page
            changeDescription(id, form.querySelector('input[name=description]').value)
                .then(changeDescri => {
                    if (!changeDescri.result) {
                        console.error('Error');
                        return;
                    }
                    document.querySelector(`[data-description-id="${id}"]`).innerText = form.querySelector('input[name=description]').value;
                    document.querySelector(".modif-task").classList.add("display-none");
                    document.querySelector(".background-form").classList.add("display-none");
                    this.closest('.js-task').children[0].classList.remove("display-none");
                    this.closest('.js-task').children[1].classList.add("display-none");
                    
                });



        });
    });
});


function changeDescription(idTask, description) {
    const data = {
        action: 'changeDescription',
        idTask: idTask,
        description: description,
        token: getCsrfToken()
    }

    return callAPI('PUT', data);
}


function deleteTask(idTask, positionTask) {
    const data = {
        action: 'deleteTask',
        idTask: idTask,
        positionTask: positionTask,
        token: getCsrfToken()
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
function getCsrfToken() {
    return document.querySelector('#token-csrf').value;
}