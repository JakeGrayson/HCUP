function calculateAdultBMI() {
    const adultHeight = parseFloat(document.getElementById("adultHeight").value);
    const adultWeight = parseFloat(document.getElementById("adultWeight").value);

    if (isNaN(adultHeight) || isNaN(adultWeight)) {
        alert("Please enter valid values.");
        return;
    }

    const bmi = adultWeight / ((adultHeight / 100) ** 2);
    document.getElementById("adultResult").innerText = `Your BMI is: ${bmi.toFixed(2)}`;

    if (bmi < 18.5) {
        document.getElementById("adultInstructions").innerText = "You are in the Underweight category. To reach a healthy weight, consider increasing your calorie intake with nutrient-rich foods and consulting a healthcare professional for guidance.";
    } else if (bmi >= 18.5 && bmi < 24.9) {
        document.getElementById("adultInstructions").innerText = "You are in the Normal Range. Maintain a balanced diet and regular exercise to stay healthy.";
    } else if (bmi >= 25 && bmi < 29.9) {
        document.getElementById("adultInstructions").innerText = "You are in the Overweight category. Consider adopting a balanced diet and increasing physical activity to manage your weight.";
    } else {
        document.getElementById("adultInstructions").innerText = "You are in the Obese category. To reduce your BMI, consider consulting a healthcare professional for a personalized plan. General tips include adopting a balanced diet, increasing physical activity, and reducing calorie intake.";
    }
}