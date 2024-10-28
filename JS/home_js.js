function show(shoe) {
  var full = document.getElementById("imagebox");
  full.src = shoe.src;
}
// Định nghĩa mảng chứa đường dẫn của các hình ảnh
var images = [
  "img/home/red_shoes1.png",
  "img/home/red_shoes2.png",
  "img/home/red_shoes3.png",
  "img/home/red_shoes4.png",
];
var currentIndex = 0;
function autoChangeImage() {
  document.getElementById("imagebox").src = images[currentIndex];
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
}

setInterval(autoChangeImage, 3000);

//Xét menubar cho home
document.addEventListener("DOMContentLoaded", function () {
  fetch("menubar.html")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("menu-container").innerHTML = data;
    });
});

//Xét JS cho input cmt
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("reviewForm");
  const reviewBox = document.querySelector(".review_box");

  const ratingStars = document.querySelectorAll(".starRating .fa-star");

  ratingStars.forEach((star) => {
    star.addEventListener("click", function () {
      const rating = this.getAttribute("data-rating");
      resetStars();
      highlightStars(rating);
    });
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const comment = document.getElementById("comment").value;
    let rating = 0;
    // Lấy số sao đã chọn
    ratingStars.forEach((star) => {
      if (star.classList.contains("selected")) {
        rating = parseInt(star.getAttribute("data-rating"));
      }
    });

    const reviewCard = document.createElement("div");
    reviewCard.classList.add("review_card");
    reviewCard.innerHTML = `
              <div class="card_top">
                  <div class="profile">
                      <div class="profile_image">
                          <img src="./img/home/Cmt1.jpg">
                      </div>
                      <div class="name">
                          <strong>${name}</strong>
                          <div class="like">
                              ${getStarsHTML(rating)}
                          </div>
                      </div>
                  </div>
              </div>
              <div class="comment">
                  <p>${comment}</p>
              </div>
          `;

    reviewBox.appendChild(reviewCard);

    form.reset();
    resetStars();
  });

  function resetStars() {
    ratingStars.forEach((star) => {
      star.classList.remove("selected");
      star.style.color = "black";
    });
  }

  function highlightStars(rating) {
    for (let i = 0; i < rating; i++) {
      ratingStars[i].classList.add("selected");
      ratingStars[i].style.color = "orange";
    }
  }

  function getStarsHTML(rating) {
    let starsHTML = "";
    for (let i = 1; i <= 5; i++) {
      if (i <= rating) {
        starsHTML += '<i class="fa-solid fa-star"></i>';
      } else {
        starsHTML += '<i class="far fa-star"></i>';
      }
    }
    return starsHTML;
  }
});
