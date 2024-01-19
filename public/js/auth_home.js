document.addEventListener('DOMContentLoaded', function() {

    document.body.addEventListener('click', function(event) {
      // Check if the clicked element is inside an element with class 'larg', has a parent div, and has an h3 child
      if (event.target.closest('.larg div h3')) {
        var h3Element = event.target.closest('.larg div h3');
        var spanElement = h3Element.querySelector('span');
        var pElement = h3Element.parentNode.querySelector('p');
  
        // Toggle the 'close' class for the span element
        if (spanElement.classList.contains('close')) {
          spanElement.classList.remove('close');
        } else {
          spanElement.classList.add('close');
        }
  
        // Toggle the display property of the p element
        if (pElement.style.display === 'none' || pElement.style.display === '') {
          pElement.style.display = 'block';
        } else {
          pElement.style.display = 'none';
        }
      }
  
      // Check if the clicked element is inside a 'nav ul li a' element
      if (event.target.closest('nav ul li a')) {
        var title = event.target.dataset.title;
  
        // Update the content of the h2 element with class 'title'
        document.querySelector('.title h2').innerHTML = title;
      }
    });
  
  });
  