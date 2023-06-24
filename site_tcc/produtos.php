<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Larol - Produtos</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon">
</head>
<body>
  <header>
    <div class="logo">
      <img src="img/favicon2.png" alt="logotipo T.I Lolja" width="100">
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Início</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="mycart.php">Carrinho</a></li>
        <li><a href="cadastro.php">Cadastro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </nav>
  </header>

  <div class="product-list">
    <div class="product-item">
      <div class="product-image">
        <a href="produtos.php">
          <img src="img/computer.png" alt="Computadores">
        </a>
      </div>
      <div class="product-description">
        <h3>Computadores</h3>
        <p>Monte o seu já!</p>
        <p>Preço: R$ 1200.0</p>
      </div>
      <div class="product-buttons">
        <button class="add-to-cart-button" onclick="addToCart(1)">Adicionar ao Carrinho</button>
      </div>
    </div>

    <div class="product-item">
      <div class="product-image">
        <a href="produtos.php">
          <img src="img/mobile.png" alt="Smartphone">
        </a>
      </div>
      <div class="product-description">
        <h3>Smartphone</h3>
        <p>De todas as marcas!</p>
        <p>Preço: R$ 1100.0</p>
      </div>
      <div class="product-buttons">
        <button class="add-to-cart-button" onclick="addToCart(2)">Adicionar ao Carrinho</button>
      </div>
    </div>

    <div class="product-item">
      <div class="product-image">
        <a href="produtos.php">
          <img src="img/headset2.png" alt="Headset Gamer P2 Cabo Nylon">
        </a>
      </div>
      <div class="product-description">
        <h3>Headset Gamer P2 Cabo Nylon</h3>
        <p>Headset de ótima qualidade, para seus jogos!</p>
        <p>Preço: R$ 134.1</p>
      </div>
      <div class="product-buttons">
        <button class="add-to-cart-button" onclick="addToCart(3)">Adicionar ao Carrinho</button>
      </div>
    </div>
  </div>

  <footer>
    <div class="rodape">
      <ul>
        <li><a href="index.html">Início</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="mycart.php">Carrinho</a></li>
        <li><a href="cadastro.php">Cadastro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </div>
    <div class="rodape">
      <p>Quadra 34 área especial 04</p>
      <p>Brazlândia, Brasília - DF, 72734-000</p>
    </div>
    <div class="rodape">
      <p>Siga as nossas Redes Sociais</p>
      <a href="#"><img src="img/facebook.png" alt="Facebook Larol"></a>
      <a href="#"><img src="img/instagram.png" alt="Instagram Larol"></a>
      <a href="#"><img src="img/youtube.png" alt="Youtube Larol"></a>
    </div>
  </footer>
<script>
  function addToCart(productId) {
  console.log('addToCart function called with productId:', productId);
  var productData = getProductData(productId);

  var product = {
    id: productId,
    name: productData.name,
    price: productData.price,
    quantity: 1
  };

  var cartItems = getCartItemsFromLocalStorage();
  
  
  var existingItem = cartItems.find(function (item) {
    return item.id === productId;
  });

  if (existingItem) {

    existingItem.quantity++;
  } else {
   
    cartItems.push(product);
  }

  saveCartItemsToLocalStorage(cartItems);


  window.location.href = "mycart.php";
}

function getProductData(productId) {
  var products = {
    1: { name: 'Computadores', price: 1200.0 },
    2: { name: 'Smartphone', price: 1100.0 },
    3: { name: 'Headset Gamer P2 Cabo Nylon', price: 134.1 }
  };

  return products[productId];
}

function getCartItemsFromLocalStorage() {
  var cartItemsJson = localStorage.getItem('cartItems');
  return cartItemsJson ? JSON.parse(cartItemsJson) : [];
}

function saveCartItemsToLocalStorage(cartItems) {
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
}
</script>
</body>
</html>
