function test() {
    const inputValue = document.getElementsByTagName("input");
    const data = {
        name: inputValue["name"]["value"],
        description: inputValue["description"]["value"],
        price: inputValue["price"]["value"],
        categoryId: inputValue["categoryId"]["value"],
    };
    fetch("http://techshop.test/admin/products", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => {
            return response.json();
        })
        .then((response) => {
            if (response.id) {
                window.location.href = "/admin/products/" + response.id;
            } else {
                alert(JSON.stringify(response));
            }
        });
}

function editProduct(productId) {
    const inputValue = document.getElementsByTagName("input");
    const data = {
        name: inputValue["name"]["value"],
        description: inputValue["description"]["value"],
        price: inputValue["price"]["value"],
        category_id: inputValue["category_id"]["value"],
    };
    fetch("http://techshop.test/admin/products/" + productId, {
        method: "PUT",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    }).then(() => {
        window.location.href = "/admin/products/" + productId;
    });
}

function deleteProduct(productId) {
    fetch("http://techshop.test/admin/products/" + productId, {
        method: "DELETE",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
    }).then(() => {
        window.location.href = "/admin/products/";
    });
}

function addCategory() {
    const inputValue = document.getElementsByTagName("input");
    const data = {
        name: inputValue["name"]["value"],
        description: inputValue["description"]["value"],
    };
    fetch("http://techshop.test/admin/products-category", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.id) {
                window.location.href =
                    "/admin/products-category/" + response.id;
            } else {
                alert(JSON.stringify(response));
            }
        });
}

function updateCategory(categoryId) {
    const inputValue = document.getElementsByTagName("input");
    const data = {
        name: inputValue["name"]["value"],
        description: inputValue["description"]["value"],
    };
    fetch("http://techshop.test/admin/products-category/" + categoryId, {
        method: "PUT",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    }).then(() => {
        window.location.href = "/admin/products-category/" + categoryId;
    });
}

function deleteCategory(categoryId) {
    fetch("http://techshop.test/admin/products-category/" + categoryId, {
        method: "DELETE",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
    }).then(() => {
        window.location.href = "/admin/products-category/";
    });
}

function searchProducts() {
    const input = document.getElementById('search');
    const value = input["value"];
    console.log(value);

    window.location.href = `products/?search=${value}`;
}
