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
const taskValid = document.querySelectorAll(".task_valid");
const btnAccord = document.querySelector(".btn-accord")



//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*
                         +------------------------------------------+
                         |                Functions                 |
                         +------------------------------------------+ 
*/
function displayAddForm() {
    addBtn.addEventListener('click', function (e) {
        addForm.classList.remove("display-none")
        backgroundForm.classList.remove("display-none")
    })
};
function displayModificationForm(element, a, b) {
    element.lastElementChild.addEventListener('click', function (e) {
        e.stopPropagation()
        a.classList.remove("display-none")
        b.classList.remove("display-none")
    })
};

function deleteModificationForm(form, background) {
    background.addEventListener('click', function (e) {
        if (e.target !== background) {
            return
        } 
        form.classList.add("display-none")
        background.classList.add("display-none")

        e.stopPropagation()
    })
};
function deleteAddForm(addform, background) {
    background.addEventListener('click', function (e) {
        if (e.target !== background) {
            return
        }
        background.classList.add("display-none")
    });
    addform.addEventListener('click', function (e) {
        e.stopPropagation();
    });

};

function changeSideOfTask(task) {
    task.addEventListener('click', function (e) {
        if (e.target.tagName !== "H3") {
            return
        };
        this.classList.toggle("display-none");
        if (this.classList[1] === "second-view") {
            this.parentElement.children[0].classList.toggle("display-none")
        }
        else { this.parentElement.children[1].classList.toggle("display-none"); };
        let idTask = this.parentElement.parentElement.id;
        document.querySelector('.id').value = idTask;
    })


};

function openCloseAccord() {
    btnAccord.addEventListener('click', function (e) {
        if (btnAccord.dataset.open === "true") {
            document.querySelector(".accordeon").classList.toggle("display-none")
            document.querySelector(".plusMinus").src = ("img/plus.png")
            btnAccord.dataset.open = "false"
        }
        else if (btnAccord.dataset.open === "false") {
            document.querySelector(".accordeon").classList.toggle("display-none")
            document.querySelector(".plusMinus").src = ("img/minus.png")
            btnAccord.dataset.open = "true"
        }

    })
}

document.querySelectorAll(".task_button-up").forEach(element => {
    element.addEventListener('mouseenter', function (e) {
        this.src = ("img/chevron-UP-hover.png")
    });
    element.addEventListener('mouseout', function (e) {
        this.src = ("img/chevron-UP.png")
    })
})
document.querySelectorAll(".task_button-down").forEach(element => {
    element.addEventListener('mouseenter', function (e) {
        this.src = ("img/chevron-down-hover.png")
    });
    element.addEventListener('mouseout', function (e) {
        this.src = ("img/chevron-down.png")
    })
})



taskValid.forEach(element => {
    element.children[1].lastElementChild.style.display = "none"
    element.lastElementChild.style.display = "none";
});


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
+------------------------------------------+
|                Execution                 |
+------------------------------------------+ 
*/
openCloseAccord();
displayAddForm();
deleteAddForm(addForm, backgroundForm);
ulTask.forEach(task => {
    changeSideOfTask(task);
    displayModificationForm(task, paramForm, backgroundForm);
});
deleteModificationForm(paramForm, backgroundForm);

// window.addEventListener("click", (event) => {
//     if (
//         !event.target.matches('input[name=description]')
//     ) {
//         window.close('add.php')
//     }
// });

// let inputModif = 'form ';





// -----------------------------------------------------------/

// window.addEventListener("click", function(e) {

//   // Si ce n'est pas #ma_div ni un de ses enfants
//   if( !e.target.matches(inputModif)  ) {
//     console.log('test');
//   }
//   //target matches demande un sélecteur
// });
//mettre un stop propagation sur le event listener du form
// && !$.contains(inputModif[0],e.target)