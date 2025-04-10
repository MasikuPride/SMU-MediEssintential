$(document).ready(function () {
    const chatbox = $('#chatbox');
    const userInput = $('#userInput');
    const sendButton = $('#sendButton');

    const products = {
        "pink stethoscope": { name: "Pink Stethoscope", price: "R700", id: 1 },
        "black stethoscope": { name: "Black Stethoscope", price: "R650", id: 2 },
        "blue stethoscope": { name: "Blue Stethoscope", price: "R600", id: 3 },
        "green stethoscope": { name: "Green Stethoscope", price: "R800", id: 4 },
        "blue scrubs": { name: "Blue Scrubs", price: "R1800", id: 5 },
        "pink scrubs": { name: "Pink Scrubs", price: "R1800", id: 6 }
    };

    let selectedProduct = null;

    function getBotResponse(userMessage) {
        const message = userMessage.toLowerCase().trim();

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

        for (const [key, product] of Object.entries(products)) {
            if (new RegExp(key, 'i').test(message)) {
                selectedProduct = product;
                return {
                    text: `You selected ${product.name} for ${product.price}. Would you like to place an order?`,
                    quickReplies: ["Yes", "No"]
                };
            }
        }

        if (/yes/i.test(message) && selectedProduct) {
            placeOrder(selectedProduct);
            return { text: `Placing order for ${selectedProduct.name}...` };
        }

        return { text: "I can help you order products. Type 'view products' to get started." };
    }

    function addMessage(sender, message, quickReplies = []) {
        const messageClass = sender === 'You' ? 'user' : 'bot';
        const messageElement = $(`<div class="chatbox-message ${messageClass}"></div>`);
        messageElement.html(`<strong>${sender}:</strong> ${message.replace(/\n/g, '<br>')}`);

        if (quickReplies.length > 0) {
            const quickReplyContainer = $('<div class="chatbox-options"></div>');
            quickReplies.forEach(reply => {
                quickReplyContainer.append(`<span class="quick-reply">${reply}</span>`);
            });
            messageElement.append(quickReplyContainer);
        }

        chatbox.append(messageElement);
        chatbox.scrollTop(chatbox[0].scrollHeight);
    }

    function placeOrder(product) {
        $.ajax({
            url: 'order.php',
            type: 'POST',
            data: {
                productId: product.id,
                productName: product.name,
                productPrice: product.price
            },
            dataType: 'json',
            success: function (response) {
                addMessage("MediBot", response.message);
            },
            error: function () {
                addMessage("MediBot", "Error placing order. Please try again.");
            }
        });
    }

    $(document).on('click', '.quick-reply', function () {
        const replyText = $(this).text();
        userInput.val(replyText);
        handleUserInput();
    });

    function handleUserInput() {
        const userMessage = userInput.val().trim();
        if (userMessage === "") return;

        addMessage("You", userMessage);
        const botResponse = getBotResponse(userMessage);
        setTimeout(() => addMessage("MediBot", botResponse.text, botResponse.quickReplies), 800);
        userInput.val('').focus();
    }

    sendButton.on('click', handleUserInput);
    userInput.on('keypress', function (e) {
        if (e.which === 13) handleUserInput();
    });
});
