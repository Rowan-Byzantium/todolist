/*
                         +------------------------------------------+
                         |                Variables                 |
                         +------------------------------------------+ 
 */
const addBtn = document.querySelector(".img_add");
const addForm = document.querySelector(".add-task");
const backgroundForm = document.querySelector(".background-form");
const arrayTasks = document.querySelectorAll(".task");
const paramBtn = document.querySelector(".task_button-param");
const paramForm = document.querySelector(".modif-task");
const listOfTasks = document.querySelector(".tasks-list");
const taskFirstView = document.querySelectorAll(".first-view");
const taskSecondView = document.querySelector(".second-view");
const ulTask = document.querySelectorAll(".js-task");




//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*
                         +------------------------------------------+
                         |                Functions                 |
                         +------------------------------------------+ 
*/
function displayAddForm() {
    addBtn.addEventListener('click', function (e) {
        addForm.style.display = "flex"
        backgroundForm.style.display = "block"
    })
};
function displayModificationForm(element, brother, sister) {
    element.addEventListener('click', function (e) {
        brother.style.display = "flex"
        sister.style.display = "block"
    })
};

function changeSideOfTask(task) { 
    task.addEventListener('click', function (e) {
        this.firstElementChild.classList.toggle("display-none");
        this.lastElementChild.classList.toggle("display-none");
        let idTask = this.parentElement.id;
        document.querySelector('.id').value = idTask;
    })
};



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
+------------------------------------------+
|                Execution                 |
+------------------------------------------+ 
*/

displayAddForm();
ulTask.forEach(task => {
    changeSideOfTask(task);
    displayModificationForm(paramBtn, paramForm, backgroundForm);
});
