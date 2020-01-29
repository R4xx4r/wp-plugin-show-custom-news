// check of DOM is ready and then get all clickable labels and handle checked states
document.addEventListener("DOMContentLoaded", () => {

  let checkboxes = document.querySelectorAll('.item__content-toggler');
  let toggleElements = document.querySelectorAll('.item__content-toggle');

  toggleElements.forEach(toggleElement => {
    toggleElement.addEventListener('click', (event) => {
      
      checkboxes.forEach(checkbox => {
        // only uncheck if it is not the checkbox for the label we clicked right now
        if(event.currentTarget.getAttribute('for') != checkbox.id) {
          checkbox.checked = false;
        }
      });

      // scroll to start of entry (title)
      setTimeout(() => {
        event.target.scrollIntoView({
          behavior: 'smooth',
        });
      }, 300);

    });
  });

});
