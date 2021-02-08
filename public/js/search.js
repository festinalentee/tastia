const search = document.querySelector('input[placeholder="search recipe"]');
const recipeContainer = document.querySelector(".allRecipes");

search.addEventListener("keyup", function (event) {

    if (event.key === "Enter") {

        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (recipes) {
            recipeContainer.innerHTML = "";
            loadRecipes(recipes)
        });
    }
});

function loadRecipes(recipes) {

    recipes.forEach(recipe => {
        console.log(recipe);
        createRecipe(recipe);
    });
}

function createRecipe(recipe) {

    const template = document.querySelector("#recipe-template");

    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${recipe.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = recipe.title;
    const buttonValue = clone.querySelector(".recipe-id-button");
    buttonValue.value = recipe.id;

    recipeContainer.appendChild(clone);
}
