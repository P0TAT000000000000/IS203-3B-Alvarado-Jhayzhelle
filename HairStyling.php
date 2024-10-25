<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Styling</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vue.js (Client-side) -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <style>
        :root {
          --hover-easing: cubic-bezier(0.23, 1, 0.32, 1);
          --return-easing: cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        body {
          margin: 0;
          font-family: "Raleway";
          font-size: 14px;
          font-weight: 500;
          background: url('images/Bg7.jpg') no-repeat center center fixed; /* Set background image */
          background-size: cover; /* Ensure the background covers the entire area */
          -webkit-font-smoothing: antialiased;
        }

        .title {
          font-family: "Lucida Handwriting";
          font-size: 24px;
          font-weight: 700;
          color: white;
          text-align: center;
          margin: 40px 0; /* Margin for the title */
        }

        p {
          line-height: 1.5em;
        }

        h1+p, p+p {
          margin-top: 10px;
          font-family: "Arial";
        }

        .container {
          padding: 40px 80px;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
        }

        .card-wrap {
          margin: 10px;
          transform: perspective(800px);
          transform-style: preserve-3d;
          cursor: pointer;
        }

        .card-wrap:hover .card-info {
          transform: translateY(0);
        }

        .card-wrap:hover .card-info p {
          opacity: 1;
        }

        .card-wrap:hover .card-info, .card-wrap:hover .card-info p {
          transition: 0.6s var(--hover-easing);
        }

        .card-wrap:hover .card-info:after {
          transition: 5s var(--hover-easing);
          opacity: 1;
          transform: translateY(0);
        }

        .card-wrap:hover .card-bg {
          transition: 0.6s var(--hover-easing), opacity 5s var(--hover-easing);
          opacity: 0.8;
        }

        .card-wrap:hover .card {
          transition: 0.6s var(--hover-easing), box-shadow 2s var(--hover-easing);
          box-shadow: rgba(255, 255, 255, 0.2) 0 0 40px 5px, rgba(255, 255, 255, 1) 0 0 0 1px, rgba(0, 0, 0, 0.66) 0 30px 60px 0, inset #333 0 0 0 5px, inset #fff 0 0 0 6px;
        }

        .card {
          position: relative;
          flex: 0 0 240px;
          width: 240px;
          height: 320px;
          background-color: #333;
          overflow: hidden;
          border-radius: 10px;
          box-shadow: rgba(0, 0, 0, 0.66) 0 30px 60px 0, inset #333 0 0 0 5px, inset rgba(255, 255, 255, 0.5) 0 0 0 6px;
          transition: 1s var(--return-easing);
        }

        .card-bg {
          opacity: 0.5;
          position: absolute;
          top: -20px;
          left: -20px;
          width: 100%;
          height: 100%;
          padding: 20px;
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
          transition: 1s var(--return-easing), opacity 5s 1s var(--return-easing);
          pointer-events: none;
        }

        .card-info {
          padding: 20px;
          position: absolute;
          bottom: 0;
          color: #fff;
          transform: translateY(40%);
          transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        .card-info p {
          opacity: 0;
          text-shadow: rgba(0, 0, 0, 1) 0 2px 3px;
          transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        .card-info * {
          position: relative;
          z-index: 1;
        }

        .card-info:after {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          z-index: 0;
          width: 100%;
          height: 100%;
          background-image: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
          background-blend-mode: overlay;
          opacity: 0;
          transform: translateY(100%);
          transition: 5s 1s var(--return-easing);
        }

        .card-info h1 {
          font-family: "Playfair Display";
          font-size: 36px;
          font-weight: 700;
          text-shadow: rgba(0, 0, 0, 0.5) 0 10px 10px;
        }


        /* General styles for the navigation bar */
  .w3-bar {
      background-color: #4E4E4E; /* Dark gray background */
      color: white; /* White text color */
  }

  .w3-bar-item {
      margin-top: 10px; /* Margin for items in the navigation bar */
  }

  .w3-button {
      font-size: medium; /* Medium font size for buttons */
  }

  /* Hides the log out and service links on small screens */
  .w3-hide-small {
      display: inline-block; /* Show on larger screens */
  }

  /* Styles for the mobile menu */
  .w3-bar-block {
      display: none; /* Initially hidden */
  }

  .w3-show {
      display: block; /* Show when the menu is active */
  }

  /* Responsive styles */
  @media (max-width: 600px) {
      .w3-hide-small {
          display: none; /* Hide items on small screens */
      }
  }

  @media (max-width: 900px) {
      .w3-hide-medium {
          display: none; /* Hide items on medium screens */
      }
  }

  @media (max-width: 1200px) {
      .w3-hide-large {
          display: none; /* Hide items on large screens */
      }
  }


  html {
            scroll-behavior: smooth;
            /* background-color: gray; */
        }
        h2 {
            font-family: "Lucida Handwriting";
            color: white; 
        }
        /* Additional styles for the navigation bar */
        .navbar {
            position: fixed; 
            top: 0; 
            width: 100%; 
            z-index: 1;
            background-color: #333;
        }
    </style>
</head>

<!-- <body class="w3-light-white w3-margin"> -->

<!-- Navigation bar with links -->
<div class="navbar w3-dark-gray w3-text-white">
    <h2 class="w3-left w3-tag w3-dark-gray w3-round w3-text-white">URBAN SHAVE</h2>
    <a href="#Contact" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">CONTACT</a>
    <a href="#SERVICES" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">SERVICES</a>
    <a href="#BARBERS" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">BARBERS</a>
    <a href="Home.php" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">HOME</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-medium w3-hide-large" style="margin-top:45px;" onclick="myFunction()">&#9776;</a>
</div>

<!-- Responsive mobile menu -->
<div id="demo" class="w3-bar-block w3-gray w3-hide w3-hide-large w3-small" style="margin-top:45px;">
    <a href="#Home" class="w3-bar-item w3-button">HOME</a>
    <a href="#BARBERS" class="w3-bar-item w3-button">BARBERS</a>
    <a href="#SERVICES" class="w3-bar-item w3-button">SERVICES</a>
    <a href="#Contact" class="w3-bar-item w3-button">CONTACT</a>
</div>

<script>
    // Script for toggling the mobile menu
    function myFunction() {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

<!-- Navigation bar -->
<!-- <div class="w3-bar w3-dark-gray w3-text-white" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
    <h2 class="w3-tag" style="margin: 0; font-family: Lucida Handwriting ">URBAN SHAVE</h2>
    <div>
        <a href="Home.php" class="w3-bar-item w3-button" style="color: white">HOME</a>
        <a href="#BARBERS" class="w3-bar-item w3-button" style="color: white">BARBERS</a>
        <a href="#SERVICES" class="w3-bar-item w3-button" style="color: white">SERVICES</a>
        <a href="#Contact" class="w3-bar-item w3-button" style="color: white">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button" style="color: white">LOG OUT</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-hide-medium w3-hide-large" onclick="toggleMenu()">&#9776;</a>
    </div>
</div>



<div id="mobileMenu" class="w3-bar-block w3-gray w3-hide w3-hide-large w3-small" style="margin-top: 45px;">
    <a href="#Home" class="w3-bar-item w3-button">HOME</a>
    <a href="#BARBERS" class="w3-bar-item w3-button">BARBERS</a>
    <a href="#SERVICES" class="w3-bar-item w3-button">SERVICES</a>
    <a href="#Contact" class="w3-bar-item w3-button">CONTACT</a>
    <a href="login.php" class="w3-bar-item w3-button">LOG OUT</a>
</div>

<script>
function toggleMenu() {
    const menu = document.getElementById("mobileMenu");
    if (menu.classList.contains("w3-hide")) {
        menu.classList.remove("w3-hide");
    } else {
        menu.classList.add("w3-hide");
    }
}
</script>
 -->

<br>
<br>
<br>
<br>
<br>
<br>
<h1 class="title">Here  are  the  reference  for  the  different  types  of Hair Styling</h1>

<div id="app" class="container">
  <card data-image="images/Hairwash.jpg">
    <h1 slot="header">Hair Wash</h1>
    <p slot="content">Product buildup can make hair slippery and hard to section, while natural oils can cause clumping. Clean hair allows for precise, confident cuts, resulting in a sharper, more polished look.</p>
  </card>
  <card data-image="images/BlowDrying.jpg">
    <h1 slot="header">Blow-drying</h1>
    <p slot="content">Air drying your hair can have unpredictable results sometimes. Blow drying helps you get smooth, manageable hair – and gives you way more control over how your hair looks.</p>
  </card>
  <card data-image="images/Pompadour.jpg">
    <h1 slot="header">Pompadour Styling</h1>
    <p slot="content">A man's style of hairdressing in which<br> the hair is combed into a high mound in front.</p>
  </card>
  <card data-image="images/Textured.jpg">
    <h1 slot="header">Textured Styles</h1>
    <p slot="content">This technique is not just about reducing weight or adding volume; it's about creating a hairstyle that perfectly suits.</p>
  </card>
</div>

<!-- JavaScript for Vue.js -->
<script>
Vue.config.devtools = true;

Vue.component('card', {
  template: `
    <div class="card-wrap"
      @mousemove="handleMouseMove"
      @mouseenter="handleMouseEnter"
      @mouseleave="handleMouseLeave"
      ref="card">
      <div class="card"
        :style="cardStyle">
        <div class="card-bg" :style="[cardBgTransform, cardBgImage]"></div>
        <div class="card-info">
          <slot name="header"></slot>
          <slot name="content"></slot>
        </div>
      </div>
    </div>`,
  mounted() {
    this.width = this.$refs.card.offsetWidth;
    this.height = this.$refs.card.offsetHeight;
  },
  props: ['dataImage'],
  data: () => ({
    width: 0,
    height: 0,
    mouseX: 0,
    mouseY: 0,
    mouseLeaveDelay: null
  }),
  computed: {
    mousePX() {
      return this.mouseX / this.width;
    },
    mousePY() {
      return this.mouseY / this.height;
    },
    cardStyle() {
      const rX = this.mousePX * 30;
      const rY = this.mousePY * -30;
      return {
        transform: `rotateY(${rX}deg) rotateX(${rY}deg)`
      };
    },
    cardBgTransform() {
      const tX = this.mousePX * -40;
      const tY = this.mousePY * -40;
      return {
        transform: `translateX(${tX}px) translateY(${tY}px)`
      }
    },
    cardBgImage() {
      return {
        backgroundImage: `url(${this.dataImage})`
      }
    }
  },
  methods: {
    handleMouseMove(e) {
      this.mouseX = e.pageX - this.$refs.card.offsetLeft - this.width / 2;
      this.mouseY = e.pageY - this.$refs.card.offsetTop - this.height / 2;
    },
    handleMouseEnter() {
      clearTimeout(this.mouseLeaveDelay);
    },
    handleMouseLeave() {
      this.mouseLeaveDelay = setTimeout(() => {
        this.mouseX = 0;
        this.mouseY = 0;
      }, 1000);
    }
  }
});

const app = new Vue({
  el: '#app'
});
</script>

</body>
</html>
