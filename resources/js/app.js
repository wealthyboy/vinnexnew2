require("./bootstrap");







let token = document.head.querySelector('meta[name="csrf-token"]');
Window.token = token.content;







