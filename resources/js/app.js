/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { create, remove } = require("lodash");

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});

let button = document.getElementById("add-ingredient");
let parentContainer = document.getElementById("ingredient-container");

button.addEventListener("click", () => {
    let rowParent = document.createElement("div");
    rowParent.className = "row mt-3";
    addIngredientToColumn(rowParent);
    addAmountToColumn(rowParent);
    addUnitToColumn(rowParent);
    addDeleteButton(rowParent);
});

function addIngredientToColumn(rowParent) {
    let column = document.createElement("div");
    column.className = "col";
    let ingredient = document.createElement("input");
    ingredient.className = "form-control";
    ingredient.setAttribute("type", "text");
    ingredient.setAttribute("name", "ingredient[]");
    ingredient.required = true;
    let ingredientLabel = document.createElement("label");
    ingredientLabel.innerHTML = "Ingredient";
    column.appendChild(ingredientLabel);
    column.appendChild(ingredient);
    rowParent.appendChild(column);
    parentContainer.appendChild(rowParent);
}

function addAmountToColumn(rowParent) {
    let column = document.createElement("div");
    column.className = "col";
    let amount = document.createElement("input");
    amount.className = "form-control";
    amount.setAttribute("type", "number");
    amount.setAttribute("name", "amount[]");
    amount.setAttribute("min", 0);
    amount.required = true;
    let amountLabel = document.createElement("label");
    amountLabel.innerHTML = "amount";
    column.appendChild(amountLabel);
    column.appendChild(amount);
    rowParent.appendChild(column);
    parentContainer.appendChild(rowParent);
}

function addUnitToColumn(rowParent) {
    let column = document.createElement("div");
    column.className = "col";
    let unit = document.createElement("select");
    unit.className = "form-control";
    unit.setAttribute("name", "unit[]");
    let tsp = document.createElement("option");
    tsp.innerHTML = "tsp";
    unit.appendChild(tsp);
    let tbsp = document.createElement("option");
    tbsp.innerHTML = "tbsp";
    unit.appendChild(tbsp);
    let g = document.createElement("option");
    g.innerHTML = "g";
    unit.appendChild(g);
    let kg = document.createElement("option");
    kg.innerHTML = "kg";
    unit.appendChild(kg);
    let ml = document.createElement("option");
    ml.innerHTML = "ml";
    unit.appendChild(ml);
    let dl = document.createElement("option");
    dl.innerHTML = "dl";
    unit.appendChild(dl);
    let liter = document.createElement("option");
    liter.innerHTML = "l";
    unit.appendChild(liter);
    let pc = document.createElement("option");
    pc.innerHTML = "pc";
    unit.appendChild(pc);
    let unitLabel = document.createElement("label");
    unitLabel.innerHTML = "Select unit";
    unit.required = true;
    column.appendChild(unitLabel);
    column.appendChild(unit);
    rowParent.appendChild(column);
    parentContainer.appendChild(rowParent);
}

function addDeleteButton(rowParent) {
    let column = document.createElement("div");
    column.className = "col";
    let deleteRow = document.createElement("button");
    deleteRow.className = "btn btn-warning mt-4";
    deleteRow.setAttribute("type", "button");
    deleteRow.id = "add-ingredient";
    deleteRow.innerHTML = "delete";
    column.appendChild(deleteRow);
    rowParent.appendChild(column);
    parentContainer.appendChild(rowParent);
    deleteRow.addEventListener("click", addListener);
}

let addListener = (e) => {
    let item = e.target.closest("div");
    item.parentElement.remove(item);
};
