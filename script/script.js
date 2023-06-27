function WarnUser() {
    const button = document.getElementById('Warn');
    if (confirm("Are you sure you want to delete this code?")) { // Make prompt to confirm deletion of every single file
        button.setAttribute('name', 'deletecode'); // Change the name of the form to match the PHP code
        return true; // Yes delete all
    }
    else {
        return false; // No cancel
    }
}