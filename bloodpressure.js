function calculateMAP() {
    const systolicPressure = parseFloat(document.getElementById("systolic").value);
    const diastolicPressure = parseFloat(document.getElementById("diastolic").value);

    if (isNaN(systolicPressure) || isNaN(diastolicPressure)) {
        document.getElementById("result").innerHTML = "Please enter valid blood pressure values.";
        return;
    }

    const map = (systolicPressure + (2 * diastolicPressure)) / 3;
    const resultText = `Mean Arterial Pressure (MAP): ${map.toFixed(2)} mmHg`;

    // Determine if MAP indicates high, low, or normal blood pressure
    let message = "";
    if (map > 90) {
        message = "Your MAP indicates high blood pressure. Please consult a healthcare professional for better treatment.<br<To Avoid High Blood Pressure:<br>Reduce sodium (salt) intake<br>Eat a balanced diet rich in fruits and vegetables<br>Maintain a healthy weight through regular exercise.<br>Maintain a healthy weight through regular exercise.<br>Manage stress through relaxation techniques. ";
    } else if (map < 70) {
        message = "Your MAP indicates low blood pressure. Please consult a healthcare professional for better treatment.<br>To Avoid Low Blood Pressure:<br>Stay hydrated by drinking enough water.<br>Eat smaller, more frequent meals.<br>Avoid excessive caffeine intake.";
    } else {
        message = "Your blood pressure is within a normal or healthy range.";
    }

    // Display instructions and result
    document.getElementById("result").innerHTML = `
        <h2>Result:</h2>
        ${resultText}
        <p>${message}</p>`;

    // Scroll to the result
    document.getElementById("result").scrollIntoView();
}