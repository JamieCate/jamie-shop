document.addEventListener('DOMContentLoaded', function () {
  const allSearches = document.querySelectorAll('.nav-search-input');

  allSearches.forEach((el) => bringSearchToLife(el));

  function bringSearchToLife(el) {
      const input = el.querySelector('input');
      const resultsContainer = el.querySelector(".search-results");

      input.addEventListener('input', handleChange);
      
      async function handleChange(e) {
          const ourValue = encodeURIComponent(e.target.value);
          const resultPromise = await fetch(`/wp-json/wp/v2/product?search=${ourValue}&_embed`);
          const results = await resultPromise.json();

          if (results.length) {
              resultsContainer.innerHTML = generateHTML(results);
              resultsContainer.style.display = "block"; 
          } else {
              resultsContainer.innerHTML = '';
              resultsContainer.style.display = "none"; 
          }
      }

      document.addEventListener("click", function (event) {
          if (!el.contains(event.target)) {
              resultsContainer.style.display = "none";
          }
      });
  }
});

function generateHTML(results) {
  let generatedHTML = "";
  console.log(results);

  results.forEach(item => {
      const imageUrl = item._embedded?.["wp:featuredmedia"]?.[0]?.source_url || 'default-image.jpg';

      generatedHTML += `<div class="item-container">
          <img class="search-result-img" src="${imageUrl}" alt="${item.title.rendered}">
          <h4 class="search-title"><a href="${item.link}">${item.title.rendered}</a></h4>
      </div>`;
  });

  return generatedHTML;
}
