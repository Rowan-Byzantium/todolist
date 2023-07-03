/*
                         +------------------------------------------+
                         |                Variables                 |
                         +------------------------------------------+ 
 */
const addBtn = document.querySelector(".img_add");
const addForm = document.querySelector(".add-task");
const backgroundForm = document.querySelector(".background-form");
const arrayTasks = document.querySelectorAll(".task");
const allParamBtn = document.querySelectorAll(".task_button-param");
const paramBtn = document.querySelector(".task_button-param");
const paramForm = document.querySelector(".modif-task");
const listOfTasks = document.querySelector(".tasks-list");
const taskFirstView = document.querySelectorAll(".first-view");
const taskSecondView = document.querySelector(".second-view");
const ulTask = document.querySelectorAll(".task-itm");




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
        this.classList.toggle("display-none");
        if (this.children[1].src === "http://localhost/projet_duo/todolist/img/param.png") {
            this.parentElement.children[0].classList.toggle("display-none")
        }
        else { this.parentElement.children[1].classList.toggle("display-none"); };
        let idTask = this.parentElement.parentElement.id;
        document.querySelector('.id').value = idTask;
    })

};

function openCloseAccord() {
    document.querySelector(".accord").addEventListener('click', function (e) {
        if (document.querySelector(".plusMinus").src === ("http://localhost/todolist/img/plus.png")) {
            document.querySelector(".accordeon").classList.toggle("display-none")
            document.querySelector(".plusMinus").src = ("img/minus.png")
        }
        else if (document.querySelector(".plusMinus").src === ("http://localhost/todolist/img/minus.png")) {
            document.querySelector(".accordeon").classList.toggle("display-none")
            document.querySelector(".plusMinus").src = ("img/plus.png")
        }

    })
}
document.querySelectorAll(".task_button-up").forEach(element => {
    document.querySelector(".task_button-up").addEventListener('mouseenter', function (e) {
        this.src = ("img/chevron-UP-hover.png")
        setTimeout(function () {
            document.querySelector(".task_button-up").src = ("img/chevron-UP.png")
        }, 400);
    });
})
document.querySelectorAll(".task_button-down").forEach(element => {
    document.querySelector(".task_button-down").addEventListener('mouseenter', function (e) {
        this.src = ("img/chevron-down-hover.png")
        setTimeout(function () {
            document.querySelector(".task_button-down").src = ("img/chevron-down.png")

        }, 400);
    })
})



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
+------------------------------------------+
|                Execution                 |
+------------------------------------------+ 
*/
openCloseAccord();
displayAddForm();
ulTask.forEach(task => {
    console.log(task);
    changeSideOfTask(task);
    displayModificationForm(paramBtn, paramForm, backgroundForm);
});


