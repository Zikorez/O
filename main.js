
let balance = 0;
let timeLeft = 600; // 10 minutes in seconds
const balanceDisplay = document.getElementById("balance");
const timerDisplay = document.getElementById("timer");
const startButton = document.getElementById("startButton");

startButton.addEventListener("click", startFarming);

function startFarming() {
    startButton.disabled = true;
    const interval = setInterval(() => {
        if (timeLeft > 0) {
            timeLeft--;
            updateTimerDisplay();
        } else {
            balance += 0.01;
            balanceDisplay.textContent = balance.toFixed(2);
            timeLeft = 600;
            updateTimerDisplay();
        }
    }, 1000);
}

function updateTimerDisplay() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}
    