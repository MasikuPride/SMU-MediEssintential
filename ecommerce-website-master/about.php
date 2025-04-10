<!-- filepath: c:\xampp\htdocs\ecommerce-website-master\about.php -->
<?php
require("includes/common.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SMU MediEssential | About Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Delius+Swash+Caps' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      overflow-x: hidden;
      padding-bottom: 100px;
    }
    .chatbox {
      height: 300px;
      overflow-y: auto;
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 15px;
    }
    .chatbox-message {
      margin-bottom: 10px;
      padding: 8px 12px;
      border-radius: 15px;
      max-width: 80%;
      clear: both;
    }
    .chatbox-message.bot {
      background-color: #e9f7fe;
      float: left;
    }
    .chatbox-message.user {
      background-color: #f1f1f1;
      float: right;
    }
    .quick-reply {
      display: inline-block;
      margin: 3px;
      padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border-radius: 15px;
      cursor: pointer;
      font-size: 0.9em;
    }
    .quick-reply:hover {
      background-color: #0056b3;
    }
    .chatbox-options {
      margin-top: 10px;
      clear: both;
    }
    .chatbox-input {
      margin-top: 15px;
    }
    .chat-container {
      min-height: 400px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .chatbox {
        height: 250px;
      }
      .chatbox-message {
        font-size: 0.9em;
      }
      .quick-reply {
        font-size: 0.8em;
        padding: 4px 8px;
      }
    }

    @media (max-width: 576px) {
      .chatbox {
        height: 200px;
      }
      .chatbox-message {
        font-size: 0.8em;
      }
      .quick-reply {
        font-size: 0.7em;
        padding: 3px 6px;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <?php include 'includes/header_menu.php'; ?>
  <!-- Header ends -->

  <div class="container mt-5">
    <div class="row justify-content-around">
      <!-- Who We Are Section -->
      <div class="col-md-5 mt-3">
        <h3 class="text-warning pt-3 title">Who We Are?</h3>
        <hr />
        <img src="images/logo1.jpg" class="img-fluid d-block rounded mx-auto image-thumbnail" alt="SMU MediEssential Logo">
        <p class="mt-2">
          At SMU MediEssential, we are dedicated to providing high-quality medical essentials tailored to healthcare professionals and students. We specialize in supplying premium scrubs, lab coats, masks, gloves, and stethoscopes, ensuring comfort, durability, and protection in medical environments.
          Our mission is to support those on the frontlines of healthcare by offering reliable and affordable medical attire and equipment. Whether you're a doctor, nurse, medical student, or healthcare worker, SMU MediEssential is your trusted partner for professional-grade medical essentials.
        </p>
      </div>
      <!-- Live Support Section -->
      <div class="col-md-5 mt-3">
        <h1 class="text-warning pt-3 title">LIVE SUPPORT</h1>
        <h3>24 hours | 7 days a week | 365 days a year Live Technical Support</h3>
        <hr>
        <p>
          Our Live Technical Support is available 24/7, 365 days a year, ensuring uninterrupted assistance whenever you need it.
        </p>
      </div>
    </div>
  </div>

  <!-- Enhanced Chatbot Section -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm chat-container">
          <div class="card-body">
            <h3 class="text-warning text-center">Chat with Us</h3>
            <div id="chatbox" class="chatbox">
              <!-- Initial greeting -->
              <div class="chatbox-message bot">
                <strong>MediBot:</strong> Hi there! I'm MediBot, your SMU MediEssential assistant. How can I help you today?<br>
                <div class="chatbox-options">
                  <span class="quick-reply">View Products</span>
                </div>
              </div>
            </div>
            <div class="chatbox-input mt-3">
              <input type="text" id="userInput" class="form-control" placeholder="Type your message here..." autocomplete="off">
              <button id="sendButton" class="btn btn-primary mt-2 btn-block">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>
  <!-- Footer ends -->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(function () {
      const chatbox = $('#chatbox');
      const userInput = $('#userInput');
      const sendButton = $('#sendButton');

      // Product database
      const products = {
        "pink stethoscope": { name: "Pink Stethoscope", price: "R700", id: 1 },
        "black stethoscope": { name: "Black Stethoscope", price: "R650", id: 2 },
        "blue stethoscope": { name: "Blue Stethoscope", price: "R600", id: 3 },
        "green stethoscope": { name: "Green Stethoscope", price: "R800", id: 4 },
        "blue scrubs": { name: "Blue Scrubs", price: "R1800", id: 5 },
        "pink scrubs": { name: "Pink Scrubs", price: "R1800", id: 6 },
        "red scrubs": { name: "Red Scrubs", price: "R1800", id: 7 },
        "green scrubs": { name: "Green Scrubs", price: "R1800", id: 8 }
      };

      // Function to get chatbot response
      function getBotResponse(userMessage) {
        const message = userMessage.toLowerCase().trim();

        // View all products
        if (/view products|show products|products/i.test(message)) {
          let productList = "Here are our available products:\n";
          for (const [key, product] of Object.entries(products)) {
            productList += `- ${product.name}: ${product.price}\n`;
          }
          return {
            text: productList + "Type the product name to order.",
            quickReplies: Object.keys(products).map(key => products[key].name)
          };
        }

        // Order a specific product
        for (const [key, product] of Object.entries(products)) {
          if (new RegExp(key, 'i').test(message)) {
            return {
              text: `You selected ${product.name} for ${product.price}. Would you like to add it to your cart?`,
              quickReplies: ["Yes", "No"],
              product: product // Pass the selected product
            };
          }
        }

        // Add to cart confirmation
        if (/yes/i.test(message)) {
          return {
            text: "Product added to your cart! Type 'view products' to see more or 'checkout' to complete your order.",
            quickReplies: ["View Products", "Checkout"]
          };
        }

        // Default response
        return {
          text: "I can help you view and order products. Type 'view products' to get started.",
          quickReplies: ["View Products"]
        };
      }

      // Function to add a message to the chatbox
      function addMessage(sender, message, quickReplies = []) {
        const messageClass = sender === 'You' ? 'user' : 'bot';
        const messageElement = $(`<div class="chatbox-message ${messageClass}"></div>`);
        messageElement.html(`<strong>${sender}:</strong> ${message.replace(/\n/g, '<br>')}`);

        if (quickReplies && quickReplies.length > 0) {
          const quickReplyContainer = $('<div class="chatbox-options"></div>');
          quickReplies.forEach(reply => {
            quickReplyContainer.append(`<span class="quick-reply">${reply}</span>`);
          });
          messageElement.append(quickReplyContainer);
        }

        chatbox.append(messageElement);
        chatbox.scrollTop(chatbox[0].scrollHeight);
      }

      // Function to handle user input
      function handleUserInput() {
        const userMessage = userInput.val().trim();
        if (userMessage === "") return;

        // Add user's message to the chatbox
        addMessage("You", userMessage);

        // Get chatbot's response
        const botResponse = getBotResponse(userMessage);

        // Simulate typing delay
        setTimeout(() => {
          addMessage("MediBot", botResponse.text, botResponse.quickReplies);

          // If the response includes a product, handle adding to the cart
          if (botResponse.product) {
            handleAddToCart(botResponse.product);
          }
        }, 800);

        // Clear the input field
        userInput.val('').focus();
      }

      // Function to handle adding a product to the cart
      function handleAddToCart(product) {
        // Simulate adding to the cart with an AJAX request
        $.post('add_to_cart.php', { productId: product.id, productName: product.name, productPrice: product.price }, function (response) {
          addMessage("MediBot", response.message);
        }, 'json');
      }

      // Event listener for quick reply buttons
      $(document).on('click', '.quick-reply', function () {
        const replyText = $(this).text();
        userInput.val(replyText);
        handleUserInput();
      });

      // Event listener for the send button
      sendButton.on('click', handleUserInput);

      // Event listener for pressing Enter in the input field
      userInput.on('keypress', function (e) {
        if (e.which === 13) {
          handleUserInput();
        }
      });
    });
  </script>
</body>
</html>