document.addEventListener("DOMContentLoaded", function () {

    const countInput = document.getElementById("countInput");
    const incrementBtn = document.getElementById("incrementBtn");
    const decrementBtn = document.getElementById("decrementBtn");

    let count = 1;
    function updateInputValue() {
        countInput.value = count;
    }
    function incrementCounter() {
        count++;
        updateInputValue();
    }
    function decrementCounter() {
        if (count > 1) { 
            count--;
            updateInputValue();
        }
    }

    incrementBtn.addEventListener("click", incrementCounter);
    decrementBtn.addEventListener("click", decrementCounter);
    updateInputValue();
});
