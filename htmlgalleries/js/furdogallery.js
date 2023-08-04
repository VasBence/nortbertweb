// script.js
window.addEventListener('DOMContentLoaded', () => {
    const galleryContainer = document.querySelector('.gallery');
  
    // Fetch the list of images from the "butor.json" file
    fetchImages()
      .then(images => {
        // Check if images array is not empty
        if (Array.isArray(images) && images.length > 0) {
          // Create and append image elements to the gallery container
          images.forEach(image => {
            const imgElement = document.createElement('img');
            imgElement.src = '/img/Furdo/' + image; // Path to the Bútor folder
            galleryContainer.appendChild(imgElement);
          });
        } else {
          console.error('Error fetching images: No images found in the data.');
        }
      })
      .catch(error => {
        console.error('Error fetching images:', error);
      });
  
    // Function to fetch the list of images from the "butor.json" file
    function fetchImages() {
      return new Promise((resolve, reject) => {
        fetch('js/furdo.json')
          .then(response => response.json())
          .then(data => {
            // Check if "images" property exists in the data
            if (data && Array.isArray(data.images)) {
              resolve(data.images);
            } else {
              reject(new Error('Error fetching images: Invalid data format.'));
            }
          })
          .catch(error => reject(error));
      });
    }
  });
  