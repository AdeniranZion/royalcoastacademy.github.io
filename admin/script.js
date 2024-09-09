let inactivityTime = function () {
    let time;
    const threeMinutes = 3 * 60 * 1000;

    // Redirect function
    const redirectToLogin = () => {
        // Send AJAX request to terminate the session
        fetch('http://localhost/royalcoastacademy/auth/logout.php', {
            method: 'POST',
        }).then(response => {
            if (response.ok) {
                // Redirect to login page after session termination
                window.location.href = 'http://localhost/royalcoastacademy/auth/login.php';
            }
        }).catch(error => {
            console.error('Error logging out:', error);
        });
    };

    // Reset timer on user interaction
    const resetTimer = () => {
        clearTimeout(time);
        time = setTimeout(redirectToLogin, threeMinutes);
    };

    // Events to reset timer
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.ontouchstart = resetTimer; // for mobile devices

    resetTimer();
};

inactivityTime();
