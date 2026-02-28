
function clearForm() {
    if (confirm("Are you sure you want to clear all fields?")) {
        document.getElementById("title").value = "";
        document.getElementById("description").value = "";
    }
}

function preventDefault() {
    const title = document.getElementById('title');
    const description = document.getElementById('description');


    // Check if any field is empty
    if (!title.value.trim()){
        title.style.border="1pt solid orange";
        title.value="Please enter a title";
        title.style.color="red";
        alert('Please fill in all fields.');

        return false;
    }
    else{
        title.style.border="1pt solid gray";
        title.style.color="black";
    }
    if(!description.value.trim()){
        description.style.border="1pt solid orange";
        description.value="Please enter a description";
        description.style.color="red";
        alert('Please fill in all fields.');
        return false;
    }
    else{
        description.style.border="1pt solid gray";
        description.style.color="black";
    }
    return true; // Allow form submission
}
