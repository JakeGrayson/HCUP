function calculateHeartRate() {
    // Get the user's age
    var age = parseInt(document.getElementById("age").value);

    // Define the maximum heart rate (220 - age)
    var maxHeartRate = 220 - age;

    // Calculate the target heart rate range based on the Karvonen Formula
    var lowerRange = Math.round(0.5 * maxHeartRate);
    var upperRange = Math.round(0.85 * maxHeartRate);

    // Display the result
    document.getElementById("result").textContent = lowerRange + " - " + upperRange;
}