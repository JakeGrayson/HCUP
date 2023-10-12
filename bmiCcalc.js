function calculateChildBMI() {
    const childHeight = parseFloat(document.getElementById("childHeight").value);
    const childWeight = parseFloat(document.getElementById("childWeight").value);

    if (isNaN(childHeight) || isNaN(childWeight)) {
        alert("Please enter valid values.");
        return;
    }

    const bmi = childWeight / ((childHeight / 100) ** 2);
    document.getElementById("childResult").innerText = `Your BMI is: ${bmi.toFixed(2)}`;

    if (bmi < 18.5) {
        document.getElementById("childInstructions").innerText = "Your child is in the Underweight category. Consult a healthcare professional for guidance on managing your child's weight, and focus on a balanced diet and regular physical activity.";
    } else if (bmi >= 18.5 && bmi < 24.9) {
        document.getElementById("childInstructions").innerText = "Your child is in the Normal Range. Encourage a balanced diet and regular physical activity to promote a healthy lifestyle.";
    } else if (bmi >= 25 && bmi < 29.9) {
        document.getElementById("childInstructions").innerText = "Your child is in the Overweight category. It's important to consult a healthcare professional for guidance on managing your child's weight. Encourage a balanced diet and regular physical activity to promote a healthy lifestyle.";
    } else {
        document.getElementById("childInstructions").innerText = "Your child is in the Obese category. Consult a healthcare professional for guidance on managing your child's weight, and focus on a balanced diet, increased physical activity, and reduced calorie intake.";
    }
}