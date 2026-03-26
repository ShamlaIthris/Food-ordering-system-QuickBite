let cart = JSON.parse(localStorage.getItem("cart")) || [];

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

// Search Menu
function searchMenu() {
    const input = document.getElementById("menuSearch");
    const filter = input.value.toLowerCase();
    const items = document.querySelectorAll(".menu-item");

    items.forEach(item => {
        const text = item.innerText.toLowerCase();

        if (text.includes(filter)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

function addToCart(name, price) {
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name, price, quantity: 1 });
    }

    saveCart();

    const goToCart = confirm(name + " added to cart successfully!\n\nDo you want to view your cart now?");

    if (goToCart) {
        window.location.href = "cart.php";
    }
}

function displayCart() {
    const cartItemsContainer = document.getElementById("cart-items");
    const emptyCartMessage = document.getElementById("empty-cart-message");
    const subtotalElement = document.getElementById("cart-subtotal");
    const taxElement = document.getElementById("tax-amount");
    const totalElement = document.getElementById("cart-total");

    if (!cartItemsContainer) return;

    cartItemsContainer.innerHTML = "";

   if (cart.length === 0) {
    if (emptyCartMessage) emptyCartMessage.classList.remove("d-none");
    if (subtotalElement) subtotalElement.textContent = "Rs.0000";
    if (taxElement) taxElement.textContent = "Rs.0000";
    if (totalElement) totalElement.textContent = "Rs.0000";
    return;
} else {
    if (emptyCartMessage) emptyCartMessage.classList.add("d-none");
}

let subtotal = 0;
const deliveryFee = 350.00;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;

        cartItemsContainer.innerHTML += `
            <div class="cart-item">
                <div class="d-flex justify-content-between flex-wrap gap-3">
                    <div>
                        <h5>${item.name}</h5>
                        <p>Price: Rs.${item.price.toFixed(2)}</p>
                        <p>Total: Rs.${itemTotal.toFixed(2)}</p>

                        <div class="quantity-box">
                            <button class="qty-btn" onclick="changeQuantity(${index}, -1)">-</button>
                            <span>${item.quantity}</span>
                            <button class="qty-btn" onclick="changeQuantity(${index}, 1)">+</button>
                        </div>

                        <button class="remove-btn" onclick="removeItem(${index})">Remove</button>
                    </div>
                </div>
            </div>
        `;
    });

 
    const tax = subtotal * 0.03;
    const total = subtotal + deliveryFee + tax;

    if (subtotalElement) subtotalElement.textContent = "Rs." + subtotal.toFixed(2);
    if (taxElement) taxElement.textContent = "Rs." + tax.toFixed(2);
    if (totalElement) totalElement.textContent = "Rs." + total.toFixed(2);
}


function changeQuantity(index, change) {
    cart[index].quantity += change;

    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }

    saveCart();
    displayCart();
    displayOrderSummary();
}

function removeItem(index) {
    cart.splice(index, 1);
    saveCart();
    displayCart();
    displayOrderSummary();
}

function filterMenu(category, button) {
    const items = document.querySelectorAll(".menu-item");
    const buttons = document.querySelectorAll(".category-btn");

    buttons.forEach(btn => btn.classList.remove("active"));
    if (button) {
        button.classList.add("active");
    }

    items.forEach(item => {
        if (category === "all" || item.classList.contains(category)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}




function displayOrderSummary() {
    const orderItemsContainer = document.getElementById("order-items");
    const subtotalElement = document.getElementById("order-subtotal");
    const taxElement = document.getElementById("order-tax");
    const totalElement = document.getElementById("order-total");

    if (!orderItemsContainer) return;

    orderItemsContainer.innerHTML = "";

    if (cart.length === 0) {
    orderItemsContainer.innerHTML = `<p class="text-muted">No items in your order.</p>`;
    if (subtotalElement) subtotalElement.textContent = "Rs.0000";
    if (taxElement) taxElement.textContent = "Rs.0000";
    if (totalElement) totalElement.textContent = "Rs.0000";
    return;
    }

    let subtotal = 0;
    const deliveryFee = 350.00;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;

        orderItemsContainer.innerHTML += `
            <div class="order-summary-item">
                <h6>${item.name}</h6>
                <p>Qty: ${item.quantity} | Price: Rs.${itemTotal.toFixed(2)}</p>
            </div>
        `;
});

    const tax = subtotal * 0.03;
    const total = subtotal + deliveryFee + tax;

    if (subtotalElement) subtotalElement.textContent = "Rs." + subtotal.toFixed(2);
    if (taxElement) taxElement.textContent = "Rs." + tax.toFixed(2);
    if (totalElement) totalElement.textContent = "Rs." + total.toFixed(2);
}


function placeOrder(event) {
    const fullName = document.getElementById("fullName").value.trim();
    const phoneNumber = document.getElementById("phoneNumber").value.trim();
    const emailAddress = document.getElementById("emailAddress").value.trim();
    const streetAddress = document.getElementById("streetAddress").value.trim();
    const city = document.getElementById("city").value.trim();
    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked');

    if (cart.length === 0) {
        alert("Your cart is empty.");
        return false;
    }

    if (
        fullName === "" ||
        phoneNumber === "" ||
        emailAddress === "" ||
        streetAddress === "" ||
        city === ""
    ) {
        alert("Please fill in all required fields.");
        return false;
    }

    if (!paymentMethod) {
        alert("Please select a payment method.");
        return false;
    }

    if (paymentMethod.value === "Credit / Debit Card") {
        const cardName = document.getElementById("cardName").value.trim();
        const cardNumber = document.getElementById("cardNumber").value.trim();
        const expiryDate = document.getElementById("expiryDate").value.trim();
        const cvv = document.getElementById("cvv").value.trim();

        if (cardName === "" || cardNumber === "" || expiryDate === "" || cvv === "") {
            alert("Please fill in all card details.");
            return false;
        }
    }

    let subtotal = 0;
    const deliveryFee = 350.00;

    cart.forEach(item => {
        subtotal += item.price * item.quantity;
    });

    const tax = subtotal * 0.03;
    const total = subtotal + deliveryFee + tax;

    document.getElementById("order_items").value = JSON.stringify(cart);
    document.getElementById("order_subtotal_input").value = subtotal.toFixed(2);
    document.getElementById("order_tax_input").value = tax.toFixed(2);
    document.getElementById("order_total_input").value = total.toFixed(2);

    return true;
}



function togglePaymentFields() {
    const creditCard = document.getElementById("creditCard");
    const cardDetailsBox = document.getElementById("cardDetailsBox");

    if (!creditCard || !cardDetailsBox) return;

    if (creditCard.checked) {
        cardDetailsBox.classList.remove("d-none");
    } else {
        cardDetailsBox.classList.add("d-none");
    }
}



function validateContactForm() {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const message = document.getElementById("message");

    if (!name || !email || !message) return true;

    if (
        name.value.trim() === "" ||
        email.value.trim() === "" ||
        message.value.trim() === ""
    ) {
        alert("Please fill in all fields.");
        return false;
    }

    alert("Message sent successfully!");
    document.querySelector("form").reset();
    return false;
}

window.onload = function () {
    displayCart();
    displayOrderSummary();
};