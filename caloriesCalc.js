function calculateTDEE() {
    const age = parseFloat(document.getElementById("age").value);
    const gender = document.getElementById("gender").value;
    const weight_kg = parseFloat(document.getElementById("weight").value);
    const height_cm = parseFloat(document.getElementById("height").value);
    const activity_level = document.getElementById("activity").value;

    // Harris-Benedict Equation for TDEE Calculation
    let bmr;
    if (gender.toLowerCase() === "male") {
      bmr = 88.362 + (13.397 * weight_kg) + (4.799 * height_cm) - (5.677 * age);
    } else if (gender.toLowerCase() === "female") {
      bmr = 447.593 + (9.247 * weight_kg) + (3.098 * height_cm) - (4.330 * age);
    } else {
      document.getElementById("result").textContent = "Invalid gender input";
      return;
    }

    const activityFactors = {
      "sedentary": 1.2,
      "lightly active": 1.375,
      "moderately active": 1.55,
      "very active": 1.725,
      "super active": 1.9
    };

    if (activity_level.toLowerCase() in activityFactors) {
      const tdee = bmr * activityFactors[activity_level.toLowerCase()];
      document.getElementById("result").textContent = `Your estimated Total Daily Energy Expenditure (TDEE) is ${tdee.toFixed(2)} calories per day.`;
    } else {
      document.getElementById("result").textContent = "Invalid activity level input";
    }
  }