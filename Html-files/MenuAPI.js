let iconcartspan = document.querySelector('.cart-subscript');
const menuContainer = document.querySelector(".menu-container");

let categories = [];

// Function to fetch categories and menu items from the backend
async function fetchMenuData() {
    try {
        const response = await fetch('menu-data.php');
        const data = await response.json();

        // Extract categories and menu items from the response
        categories = data.categories;
        const menuItems = data.menuItems;

        renderPillsAndTabs(menuItems);
        renderMeals(menuItems, categories);
    } catch (error) {
        console.error("Error fetching menu data:", error);
        menuContainer.innerHTML = "Error loading menu.";
    }
}

// Function to render the navigation and tabs pane dynamically based on categories
function renderPillsAndTabs(menuItems) {
    let pillsDiv = document.getElementById("v-pills-tab");
    let tabsDiv = document.getElementById("pills-tabContent");

    if (categories.length === 0) {
        menuContainer.innerHTML = `MENU WILL BE UPDATED SOON`;
        return;
    }

    // Loop through categories and add navigation pills and tabs dynamically
    categories.forEach((category, index) => {
        pillsDiv.innerHTML += `<button class="nav-link ${index === 0 ? 'active' : ''}" id="v-pills-${category.name}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-${category.name}" type="button" role="tab" aria-controls="v-pills-${category.name}" aria-selected="true">${category.name}</button>`;
        tabsDiv.innerHTML += `<div class="tab-pane fade ${index === 0 ? 'show active' : ''}" id="v-pills-${category.name}" role="tabpanel" aria-labelledby="pills-${category.name}-tab" tabindex="0"></div>`;
    });
}

// Function to render meals based on the menuItems and categories
function renderMeals(menuItems, categories) {
    categories.forEach((category) => {
        const mealData = menuItems[category.name];
        if (mealData && mealData.length) {
            const renderedMeals = mealData.map((meal) => `
                <div class="col-sm-6 col-xl-4 item">
                    <div class="card">
                        <div class="card-thumbnail">
                            <div class="black-overlay">
                                <img src="${meal.image_url}" alt="${meal.name}" class="card-img-top">
                            </div>
                            <button class="btn btn-warning add-to-cart-button" data-product-id="${meal.id}" data-product-name="${meal.name}" data-product-price="${meal.price}" data-product-img-source="${meal.image_url}">+ Add to Cart</button>
                        </div>
                        <div class="card-body">
                            <h3>${meal.name}</h3>
                            <p>₹${meal.price}</p>
                        </div>
                    </div>
                </div>
            `).join("");

            const paneToBeRendered = document.getElementById(`v-pills-${category.name}`);
            paneToBeRendered.innerHTML = `<div class="row g-4">${renderedMeals}</div>`;
        }
    });
}

// Initialize the menu by fetching data from the backend
fetchMenuData();
