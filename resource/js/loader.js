// Function to update the loading percentage
function updateLoaderPercentage(percentage) {
    const loaderText = document.querySelector('.loader-text');
    loaderText.textContent = `Loading ${percentage}%`;
}
// Function to hide and remove the loader
function hideLoader() {
    const loaderContainer = document.querySelector('.loader-container');
    loaderContainer.style.opacity = 0; // Hide with opacity transition
    setTimeout(function() {
        loaderContainer.remove(); // Remove the loader container from the DOM
    }, 500); // Adjust the delay to match your fade-out transition duration
}

// Simulate a loading process (replace this with your actual loading logic)
function simulateLoading() {
    let progress = 0;
    const duration = 1350; // Total duration of the loading in milliseconds
    const interval = 27; // Update interval in milliseconds
    const increment = (interval / duration) * 100; // Increment for each interval

    const progressBar = document.querySelector('.progress');

    const updateProgress = function() {
        progress += increment;
        progressBar.style.width = `${progress}%`;

        if (progress >= 100) {
            clearInterval(progressInterval);
            hideLoader(); // Hide and remove the loader
        }

        updateLoaderPercentage(Math.min(progress, 100)); // Cap at 100%
    };

    const progressInterval = setInterval(updateProgress, interval);
}

// To show the loader and start the loading process:
document.querySelector('.loader-container').classList.add('show');
simulateLoading();