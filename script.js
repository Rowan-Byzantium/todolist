/*
                         +------------------------------------------+
                         |                Variables                 |
                         +------------------------------------------+ 
 */
const addBtn = document.querySelector(".img_add");
const addForm = document.querySelector(".add-task");
const backgroundForm = document.querySelector(".background-form");
const taskView = document.querySelector(".task-1");
const taskParam = document.querySelector(".task-2");
const paramBtn = document.querySelector(".task_button-param");
const paramForm = document.querySelector(".modif-task");
const listOfTasks = document.querySelector(".tasks-list");



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

function changeSideOfTask(element, brother) {
    element.addEventListener('click', function (e) {
        element.style.display = "none"
        brother.style.display = "flex"
    })
};
function changeSideOfTask2(element, brother) {
    element.addEventListener('click', function (e) {
        element.style.display = "none"
        brother.style.display = "flex"
    })
};



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
                         +------------------------------------------+
                         |                Execution                 |
                         +------------------------------------------+ 
*/

displayAddForm();
console.log(taskView);
console.log(taskParam);
taskView.forEach(task => {
    changeSideOfTask(task, taskView[task]);
    displayModificationForm(paramBtn, paramForm, backgroundForm);
});
taskParam.forEach(task => {
    changeSideOfTask(task, taskView);
    displayModificationForm(paramBtn, paramForm, backgroundForm);
});