let wallet = 0,
    daily = 0;

function buyPlan(amount, reward) {
    let tax = Math.floor(amount / 1000) * 10;
    document.getElementById("pay").innerText = amount + tax;
    daily = reward;
    document.getElementById("modal").style.display = "flex";
}

function completePayment() {
    document.getElementById("modal").style.display = "none";
    document.getElementById("activePlan").innerText = "Active";
    document.getElementById("daily").innerText = daily;
}

setInterval(() => {
    if (daily > 0) {
        wallet += daily;
        document.getElementById("wallet").innerText = wallet;
    }
}, 5000);